<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use App\Models\Sitio;
use App\Models\SitioCount;
use App\Models\Households;
use DB;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        //Gets the statistic data that is the most recently added
        $currentYear=date('Y');
        $currentQuarter=Statistics::max('quarter');

        $statistics=Statistics::where('year', $currentYear)->where('quarter', $currentQuarter)->first();

        //-------------------------------------

        //Resident
        $dataResident="";
        
        $maxValueResident=DB::table('sitio_counts')->max('sitioID');
        //maxValue gets the value of the highest sitioID recorded in the sitio_counts table

        $indexResident=2;
        //index starts at 2 because 1 is the sitioFiller option

        //adds information for the Pie Chart for Resident
        while ($indexResident <= $maxValueResident){
            $sitioName=Sitio::where('id',$indexResident)->value('sitioName');
            $sumRes=DB::table('sitio_counts')->where('sitioID', $indexResident)->sum('residentCount');
            $dataResident.="['$sitioName',".$sumRes."],";

            $indexResident++;
        }

        $chartdataResident=$dataResident;

        //-------------------------------------

        //Household
        $dataHousehold="";

        $maxValueHousehold=DB::table('households')->max('sitioID');

        $indexHousehold=2;

        //adds information for the Pie Chart for Household
        while ($indexHousehold <= $maxValueHousehold){
            $sitioName=Sitio::where('id',$indexHousehold)->value('sitioName');
            $sumHousehold=DB::table('households')->where('sitioID', $indexHousehold)->count('houseNumber');
            $dataHousehold.="['$sitioName',".$sumHousehold."],";

            $indexHousehold++;
        }

        $chartdataHousehold=$dataHousehold;

        //-------------------------------------

        //adds to the most recent statistic data row in the DB
        $totalResidentCount=DB::table('sitio_counts')->sum('residentCount');
        $totalHouseholdCount=DB::table('households')->count('id');

        $statistics->totalResidentsBarangay=$totalResidentCount;
        $statistics->totalHouseholdsBarangay=$totalHouseholdCount;
        $statistics->save();

        return view('welcome', compact('statistics', 'chartdataResident', 'chartdataHousehold'));
    }

    public function reports(Request $request)
    {
        //checks if there is a value in the form inputs
        if($request['sitio']!="NULL"){
            $filterSitio=$request['sitio'];
        }
        else{$filterSitio="";}

        if($request['gender']!="NULL"){
            $filterGender=$request['gender'];
        }
        else{$filterGender="";}

        if($request['ageclass']!="NULL"){
            $filterAgeGroup=$request['ageclass'];
        }
        else{$filterAgeGroup="";}
        
        $residentCount=DB::table('sitio_counts')->leftJoin('sitios', function($join){
            $join->on('sitio_counts.sitioID', "=", 'sitios.id');
        })
        ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
        ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
        ->where('sitio_counts.sitioID', 'LIKE', "%$filterSitio%")->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.ageGroup', 'LIKE', "%$filterAgeGroup%")
        ->get();

        //get rid of duplicates since previous statement uses LIKE on filterSitio
        if($request['sitio']!="NULL"){
            $residentCount=DB::table('sitio_counts')->leftJoin('sitios', function($join){
                $join->on('sitio_counts.sitioID', "=", 'sitios.id');
            })
            ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
            ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
            ->where('sitio_counts.sitioID', $filterSitio)->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.ageGroup', 'LIKE', "%$filterAgeGroup%")
            ->get();
        }

        //Inputs all the data into the array for the Resident Pie Chart
        $dataResident="";
        
        foreach ($residentCount as $resCount){
            $label=" ".$resCount->sitioName." | ".$resCount->genderGroup." | ".$resCount->ageGroup." ";
            $resData=$resCount->residentCount;
            $dataResident.="['".$label."',".$resData."],";
        }

        $chartdataResident=$dataResident;

        //Calculates the total Residents
        $totalResidentCount=0;

        foreach ($residentCount as $resCount){
            $totalResidentCount=$totalResidentCount+$resCount->residentCount;
        }

        //-------------------------------------

        //For the select/option lists in the form
        $sitioList=Sitio::where('id','>',1)->get();

        $gender=SitioCount::select('genderGroup')->distinct()->orderBy('genderGroup')->get();

        $ageClassification=SitioCount::select('ageGroup')->distinct()->orderBy('ageGroup')->get();

        //-------------------------------------

        //Household
        $dataHousehold="";

        $totalHouseholdCount=0;

        //puts the household info ahead
        $maxValueHousehold=DB::table('households')->max('sitioID');

        $indexHousehold=2;

        while ($indexHousehold <= $maxValueHousehold){
            $sitioName=Sitio::where('id',$indexHousehold)->value('sitioName');
            $sumHousehold=DB::table('households')->where('sitioID', $indexHousehold)->count('houseNumber');
            $dataHousehold.="['$sitioName',".$sumHousehold."],";

            $indexHousehold++;
        }

        $totalHouseholdCount=DB::table('households')->count('id');

        //checks if sitio has value, if there is then replaces the data in dataHousehold
        if($request['sitio']!="NULL"){
            $householdCount=DB::table('households')->where('sitioID', $filterSitio)->count('houseNumber');

            $label=Sitio::where('id',$filterSitio)->value('sitioName');

            $dataHousehold="['".$label."',".$householdCount."]";

            $totalHouseholdCount=$householdCount;
        }

        //checks if gender or age has any value, if they have any then resets the dataHousehold
        if($request['gender']!="NULL" && $request['ageClass']!="NULL"){
            $dataHousehold="";
            $totalHouseholdCount=0;
        }

        $chartdataHousehold=$dataHousehold;

        $nameSitio="";

        if($request['sitio']!="NULL"){
            $nameSitio=Sitio::where('id',$filterSitio)->value('sitioName');
        }
        
        $upperCaseSitio=strtoupper($nameSitio);

        return view('dashboard', compact('totalHouseholdCount', 'totalResidentCount', 'chartdataHousehold', 'chartdataResident', 'sitioList', 'gender', 'ageClassification', 'request', 'upperCaseSitio'));
    }

    public function exportpdf(Request $request)
    {
        if($request['sitio']!="NULL"){
            $filterSitio=$request['sitio'];
        }
        else{$filterSitio="";}

        if($request['gender']!="NULL"){
            $filterGender=$request['gender'];
        }
        else{$filterGender="";}

        if($request['ageclass']!="NULL"){
            $filterAgeGroup=$request['ageclass'];
        }
        else{$filterAgeGroup="";}

        $residentCount=DB::table('sitio_counts')->leftJoin('sitios', function($join){
            $join->on('sitio_counts.sitioID', "=", 'sitios.id');
        })
        ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
        ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
        ->where('sitio_counts.sitioID', 'LIKE', "%$filterSitio%")->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.ageGroup', 'LIKE', "%$filterAgeGroup%")
        ->get();

        //get rid of duplicates since previous statement uses LIKE on filterSitio
        if($request['sitio']!="NULL"){
            $residentCount=DB::table('sitio_counts')->leftJoin('sitios', function($join){
                $join->on('sitio_counts.sitioID', "=", 'sitios.id');
            })
            ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
            ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
            ->where('sitio_counts.sitioID', $filterSitio)->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.ageGroup', 'LIKE', "%$filterAgeGroup%")
            ->get();
        }

        //Calculates the total Residents
        $totalResidentCount=0;

        foreach ($residentCount as $resCount){
            $totalResidentCount=$totalResidentCount+$resCount->residentCount;
        }

        if($request['sitio']!="NULL"){
        $request['sitio']=Sitio::where('id', $filterSitio)->value('sitioName');
        }

        $maxValueHousehold=DB::table('households')->max('sitioID');

        $indexHousehold=2;

        while ($indexHousehold <= $maxValueHousehold){
            $sitioName=Sitio::where('id', $indexHousehold)->value('sitioName');
            $sumHousehold=DB::table('households')->where('sitioID', $indexHousehold)->count('houseNumber');
            $householdCount[]=array('sitio'=>$sitioName, 'houseCount'=>$sumHousehold);

            $indexHousehold++;
        }

        $totalHouseholdCount=DB::table('households')->count('id');

        if($request['sitio']!="NULL"){
            $householdCount=array();

            $sitioName=Sitio::where('id', $filterSitio)->value('sitioName');
            $sumHousehold=DB::table('households')->where('sitioID', $filterSitio)->count('houseNumber');
            $householdCount[]=array('sitio'=>$sitioName, 'houseCount'=>$sumHousehold);
            $totalHouseholdCount=$sumHousehold;
        }

        if($request['gender']!="NULL" && $request['ageClass']!="NULL"){
            $householdCount=array();
            $totalHouseholdCount=0;
        }

        $pdf = PDF::loadView('pdf.reports', compact('householdCount', 'totalHouseholdCount', 'residentCount', 'totalResidentCount', 'request'));
        return $pdf->stream('reports.pdf');
    }
}

?>