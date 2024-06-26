<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use App\Models\Sitio;
use App\Models\SitioCount;
use App\Models\Households;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        //Population of Residents and Households

        //Gets the statistic data that is the most recently added
        $currentYear = date('Y');
        $currentDate = date('m-d');

        if($currentDate >= '01-01' && $currentDate <= '03-31'){
        //if currentDatetime is between Jan 1 and March 31
            $currentQuarter = 1;
        } else if($currentDate >= '04-01' && $currentDate <= '06-30'){
        //if currentDatetime is between April 1 and June 30
            $currentQuarter = 2;
        } else if($currentDate >= '07-01' && $currentDate <= '09-30'){
        //if currentDatetime is between July 1 and September 30
            $currentQuarter = 3;
        } else {
        //if currentDatetime is as early or later than October 1
            $currentQuarter = 4;
        }

        switch($currentQuarter){
            case 1:
                $dateB = $currentYear . '-' . '01-01';
                $dateE = $currentYear . '-' . '03-31';
                break;
            case 2:
                $dateB = $currentYear . '-' . '04-01';
                $dateE = $currentYear . '-' . '06-30';
                break;
            case 3:
                $dateB = $currentYear . '-' . '07-01';
                $dateE = $currentYear . '-' . '09-30';
                break;
            case 4:
                $dateB = $currentYear . '-' . '10-01';
                $dateE = $currentYear . '-' . '12-31';
                break;
            default:
                break;
        }

        $statistics = Statistics::where('year', $currentYear)->where('quarter', $currentQuarter)->first();
        //if the statistics for the current period does not exist.
        if($statistics == NULL){
            $statistics = Statistics::create([
                'year' => $currentYear,
                'quarter' => $currentQuarter,
                'totalHouseholdsSitio' => 0,
                'totalResidentsSitio' => 0,
                'totalHouseholdsBarangay' => 0,
                'totalResidentsBarangay' => 0,
                'revisedBy' => 1,
            ]);
            $statistics->save();
        }

        //gets the necessary rows from sitio_counts, which are the rows for the current statistics
        $SitioCounts = SitioCount::whereIn('statID',[$statistics->id])->get();
        //if there is no Sitio Counter for the current statistics, then make new rows 
        if($SitioCounts->isEmpty()){
            for($sInitializer=2; $sInitializer<15; $sInitializer++){
                DB::table('sitio_counts')->insert(
                    [
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                        ['sitioID' => $sInitializer, 'statID' => $statistics->id, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 0],
                    ]
                );
            }
        }

        //Gets all the Rows for counting Residents
        $SitioCountsRes = SitioCount::whereIn('statID',[$statistics->id])
                                   ->where('genderGroup', '!=', '--')
                                   ->where('ageGroup', '!=', '--')->get();
                                   
        //insert on each Sitio Counter for Residents
        foreach($SitioCountsRes as $SitioCount){
            $sitioResCounter = DB::table('resident_lists')
                ->join('households','resident_lists.houseID','=','households.id')
                ->join('residents','resident_lists.residentID','=','residents.id')
                ->where('households.dateOfVisit', '>=', $dateB)
                ->where('households.dateOfVisit', '<=', $dateE)
                ->where('residents.dateOfDeath', '=', NULL)
                ->where('households.sitioID', '=', $SitioCount->sitioID)
                ->where('residents.gender', '=', $SitioCount->genderGroup)
                ->where('residents.ageClassification', '=', $SitioCount->ageGroup)
                ->count();
            $SitioCount->residentCount = $sitioResCounter;
            $SitioCount->save();
        }

        //-------------------------------------

        //Gets all the Rows for counting Households
        $SitioCountsHh = SitioCount::whereIn('statID',[$statistics->id])
                                   ->where('genderGroup', '=', '--')
                                   ->where('ageGroup', '=', '--')
                                   ->get();
        //insert on each Sitio Counter for Households
        foreach($SitioCountsHh as $SitioCount){
            $sitioHhCounter = DB::table('households')
                ->where('sitioID', '=', $SitioCount->sitioID)
                ->where('dateOfVisit', '>=', $dateB)
                ->where('dateOfVisit', '<=', $dateE)
                ->count();
            $SitioCount->residentCount = $sitioHhCounter;
            $SitioCount->save();
        }

        //-------------------------------------

        //adds to the most recent statistic data row in the DB
        $totalResidentCount = DB::table('sitio_counts')->where('statID', $statistics->id)
                                                       ->where('genderGroup', '!=', '--')
                                                       ->where('ageGroup', '!=', '--')
                                                       ->sum('residentCount');
        $totalHouseholdCount = DB::table('sitio_counts')->where('statID', $statistics->id)
                                                        ->where('genderGroup', '=', '--')
                                                        ->where('ageGroup', '=', '--')
                                                        ->sum('residentCount');

        $statistics->totalResidentsBarangay = $totalResidentCount;
        $statistics->totalHouseholdsBarangay = $totalHouseholdCount;
        $statistics->save();

        //Charts------------------------------------------------------------------------------------------------


        //-------------------------------------

        $statID = $statistics->id;
        $statYear = $statistics->year;
        $statQuarter = $statistics->quarter;

        if($statID > 1){
            if($statQuarter == 1){
                $statistics = Statistics::where('year', $statYear - 1)->where('quarter', 4)->first();
            }else{
                $statistics = Statistics::where('year', $statYear)->where('quarter', $statQuarter - 1)->first();
            }
        }

        //Resident
        $dataResident = "";

        //gets the highest value of sitioID (this is the limit of how many Sitios in Poblacion there are currently)
        $maxValueResident = DB::table('sitio_counts')->where('statID', $statistics->id)
                                                     ->where('genderGroup', '!=', '--')
                                                     ->where('ageGroup', '!=', '--')
                                                     ->max('sitioID');

        $indexResident = 2;
        //index starts at 2 because 1 is the sitioFiller option

        //adds information for the Pie Chart for Resident
        while ($indexResident <= $maxValueResident) {
            $sitioName = Sitio::where('id', $indexResident)->value('sitioName');
            $sumRes = DB::table('sitio_counts')->where('statID',$statistics->id)
                                               ->where('sitioID', $indexResident)
                                               ->where('genderGroup', '!=', '--')
                                               ->where('ageGroup', '!=', '--')
                                               ->sum('residentCount');
            $dataResident .= "['$sitioName'," . $sumRes . "],";
            $indexResident++;
        }

        $chartdataResident = $dataResident;

        //-------------------------------------

        //Household
        $dataHousehold = "";

        $maxValueHousehold = DB::table('sitio_counts')->where('statID',$statistics->id)
                                                      ->where('genderGroup', '=', '--')
                                                      ->where('ageGroup', '=', '--')
                                                      ->max('sitioID');

        $indexHousehold = 2;

        //adds information for the Pie Chart for Household
        while ($indexHousehold <= $maxValueHousehold) {
            $sitioName = Sitio::where('id', $indexHousehold)->value('sitioName');
            $sumHousehold = DB::table('sitio_counts')->where('sitioID', $indexHousehold)
                                                     ->where('statID', $statistics->id)
                                                     ->where('genderGroup', '=', '--')
                                                     ->where('ageGroup', '=', '--')
                                                     ->value('residentCount');
            $dataHousehold .= "['$sitioName'," . $sumHousehold . "],";

            $indexHousehold++;
        }

        $chartdataHousehold = $dataHousehold;

        return view('welcome', compact('statistics', 'chartdataResident', 'chartdataHousehold'));
    }

    public function reports(Request $request)
    {
        $yearFilter = $request['year'];

        $quarterFilter = $request['quarter'];

        $statID = Statistics::where('year', $yearFilter)->where('quarter', $quarterFilter)->value('id');
        
        $documents = Document::all();

        //-------------------------------------

        //For the select/option lists in the form
        $sitioList = Sitio::where('id', '>', 1)->get();

        $gender = SitioCount::select('genderGroup')->distinct()->orderBy('genderGroup')->where('genderGroup', '!=', '--')->get();

        $ageClassification = SitioCount::select('ageGroup')->distinct()->orderBy('ageGroup')->where('ageGroup', '!=', '--')->get();

        $yearList = Statistics::select('year')->distinct()->orderBy('year')->get();

        //For displaying the Sitio if Sitio is selected
        $nameSitio = "";

        if ($request['sitio'] != "NULL") {
            $nameSitio = strtoupper(Sitio::where('id', $request['sitio'])->value('sitioName'));
        }

        //When the user tries to get data that does NOT exist (statID is Null)
        if (is_null($statID)){
            $totalHouseholdCount = 0; 
            $totalResidentCount = 0;
            $chartdataHousehold = ""; 
            $chartdataResident = "";
        //Otherwise (statID is NOT Null)
        }else{
            //checks if there is a value in the form inputs
            if ($request['sitio'] != "NULL") {
                $filterSitio = $request['sitio'];
            } else {
                $filterSitio = "";
            }

            if ($request['gender'] != "NULL") {
                $filterGender = $request['gender'];
            } else {
                $filterGender = "";
            }
            
            if ($request['ageclass'] != "NULL") {
                $filterAgeGroup = $request['ageclass'];
            } else {
                $filterAgeGroup = "";
            }

            //-------------------------------------

            $dataResident = "";

            //When the user didn't select any Sitio in the options
            if ($filterSitio == "") {
                //When the user didn't select any Age Group in the options
                if ($filterAgeGroup == ""){
                    $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
                        $join->on('sitio_counts.sitioID', "=", 'sitios.id');
                    })
                        ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->where('sitio_counts.statID', $statID)
                        ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                        ->where('sitio_counts.ageGroup', '!=', '--')
                        ->get();
                //Otherwise (Age Group)
                }else{
                    $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
                        $join->on('sitio_counts.sitioID', "=", 'sitios.id');
                    })
                        ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->where('sitio_counts.statID', $statID)
                        ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                        ->where('sitio_counts.ageGroup', '=', $filterAgeGroup)->where('sitio_counts.ageGroup', '!=', '--')
                        ->get(); 
                }

                //maxValue gets the value from the sitio_counts table that HAS at least 1 resident the highest sitioID recorded
                $maxValueResident = DB::table('sitio_counts')->where('statID', $statID)
                                                     ->where('genderGroup', '!=', '--')
                                                     ->where('ageGroup', '!=', '--')
                                                     ->max('sitioID');

                //index starts at 2 because 1 is a sitioFiller option (i.e. No option)
                $indexResident = 2;

                //adds information for the Pie Chart for Resident
                while ($indexResident <= $maxValueResident) {
                    $sumRes = 0;
                    $sitioName = Sitio::where('id', $indexResident)->value('sitioName');
                    foreach($residentCount as $resCount){
                        if ($resCount->sitioID == $indexResident){
                            $sumRes = $sumRes + $resCount->residentCount;
                        }
                    }
                    $dataResident .= "['$sitioName'," . $sumRes . "],";
                    $indexResident++;
                }
            //Otherwise (Sitio)
            }else{
                //When the user didn't select any Age Group in the options
                if ($filterAgeGroup == ""){
                    $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
                        $join->on('sitio_counts.sitioID', "=", 'sitios.id');
                    })
                        ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->where('sitio_counts.statID', $statID)
                        ->where('sitio_counts.sitioID', '=', $filterSitio)
                        ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                        ->where('sitio_counts.ageGroup', '!=', '--')
                        ->get();
                //Otherwise (Age Group)
                }else{
                    $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
                        $join->on('sitio_counts.sitioID', "=", 'sitios.id');
                    })
                        ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->where('sitio_counts.statID', $statID)
                        ->where('sitio_counts.sitioID', '=', $filterSitio)
                        ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                        ->where('sitio_counts.ageGroup', '=', $filterAgeGroup)->where('sitio_counts.ageGroup', '!=', '--')
                        ->get();
                }
                //Since the user selected a Sitio, it will display each row of the data, instead of combining them per Sitio
                foreach ($residentCount as $resCount) {
                    $sitioName = Sitio::where('id', $resCount->sitioID)->value('sitioName');
                    $label = $sitioName . ' (' . $resCount->genderGroup . ' - ' . $resCount->ageGroup . ')';
                    $dataResident .= "['$label'," . $resCount->residentCount . "],";
                }
            }

            $chartdataResident = $dataResident;

            //Calculates the total Residents
            $totalResidentCount = 0;

            foreach ($residentCount as $resCount) {
                $totalResidentCount = $totalResidentCount + $resCount->residentCount;
            }

            //-------------------------------------

            //Household
            $dataHousehold = "";
            $totalHouseholdCount = 0;

            //When the user didn't select both Gender and Age Group in the options
            if ($filterGender == "" && $filterAgeGroup == "") {
                //When the user didn't select any Sitio in the options
                if ($filterSitio == "") {
                    //puts the household info ahead
                    $maxValueHousehold = DB::table('sitio_counts')->where('statID',$statID)
                                                                  ->where('genderGroup', '=', '--')
                                                                  ->where('ageGroup', '=', '--')
                                                                  ->max('sitioID');

                    $indexHousehold = 2;
                    while ($indexHousehold <= $maxValueHousehold) {
                        $sitioName = Sitio::where('id', $indexHousehold)->value('sitioName');
                        $sumHousehold = DB::table('sitio_counts')->where('sitioID', $indexHousehold)
                                                                 ->where('statID', $statID)
                                                                 ->where('genderGroup', '=', '--')
                                                                 ->where('ageGroup', '=', '--')
                                                                 ->value('residentCount');
                        $dataHousehold .= "['$sitioName'," . $sumHousehold . "],";
                
                        $indexHousehold++;
                    }
                
                    $totalHouseholdCount = Statistics::where('id', $statID)->value('totalHouseholdsBarangay');
                //No filters for these 3 (Sitio, Age Group, Gender Group) are selected
                }else{
                    $householdCount = DB::table('sitio_counts')->where('sitioID', $filterSitio)
                                                               ->where('statID', $statID)
                                                               ->where('genderGroup', '=', '--')
                                                               ->where('ageGroup', '=', '--')
                                                               ->value('residentCount');
                    if($householdCount == NULL){
                        $householdCount = 0;
                    }else{       
                        $totalHouseholdCount = $householdCount;
                        $label = Sitio::where('id', $filterSitio)->value('sitioName');
                        $dataHousehold = "['" . $label . "'," . $householdCount . "]";
                    }

                    
                }
            }//No need to make an else statement if otherwise (Gender and Age Group) because it is already initialized above

            $chartdataHousehold = $dataHousehold;
        }
        return view('dashboard', compact('documents', 'totalHouseholdCount', 'totalResidentCount', 'chartdataHousehold', 'chartdataResident', 'sitioList', 'gender', 'ageClassification', 'yearList', 'request', 'nameSitio'));
    }

    public function exportpdf(Request $request)
    {
        $yearFilter = $request['year'];

        $quarterFilter = $request['quarter'];

        $statCheck = Statistics::where('year', $yearFilter)->where('quarter', $quarterFilter)->first();

        $nameSitio = "";
        if ($request['sitio'] != "NULL") {
            $nameSitio = Sitio::where('id', $request['sitio'])->value('sitioName');
        }

        //Two ways: 
        //1. If the statitics information is NOT found
        //2. The statistics information exists, BUT has no resident/households recorded (i.e. 0)
        if ($statCheck == NULL || ($statCheck->totalResidentsBarangay <= 0 || $statCheck->totalHouseholdsBarangay <= 0)){
            $householdCount = "";
            $totalHouseholdCount = 0; 
            $residentCount = "";
            $totalResidentCount = 0;
        //Otherwise (Both conditions are false)
        }else{
            if ($request['sitio'] != "NULL") {
                $filterSitio = $request['sitio'];
            } else {
                $filterSitio = "";
            }
    
            if ($request['gender'] != "NULL") {
                $filterGender = $request['gender'];
            } else {
                $filterGender = "";
            }
    
            if ($request['ageclass'] != "NULL") {
                $filterAgeGroup = $request['ageclass'];
            } else {
                $filterAgeGroup = "";
            }
    
            //-------------------------------------
            
            //Resident
            //When the user didn't select any Sitio in the options
            if ($filterSitio == "") {
                $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
                    $join->on('sitio_counts.sitioID', "=", 'sitios.id');
                })
                    ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                    ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                    ->where('sitio_counts.statID', $statCheck->id)
                    ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                    ->where('sitio_counts.ageGroup', 'LIKE', "%$filterAgeGroup%")->where('sitio_counts.ageGroup', '!=', '--')
                    ->get();
            //Otherwise (Sitio)
            }else{
                $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
                    $join->on('sitio_counts.sitioID', "=", 'sitios.id');
                })
                    ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                    ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                    ->where('sitio_counts.statID', $statCheck->id)
                    ->where('sitio_counts.sitioID', $filterSitio)
                    ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                    ->where('sitio_counts.ageGroup', 'LIKE', "%$filterAgeGroup%")->where('sitio_counts.ageGroup', '!=', '--')
                    ->get();
            }
    
            //Calculates the total Residents
            $totalResidentCount = 0;
    
            foreach ($residentCount as $resCount) {
                $totalResidentCount = $totalResidentCount + $resCount->residentCount;
            }
    
            //Household
            $householdCount = array();
            $totalHouseholdCount = 0;
    
            //Household data is added when BOTH Gender and Age Group filters are NOT selected
            if ($filterGender == "" && $filterAgeGroup == "") {
                //When the user didn't select any Sitio in the options
                if ($filterSitio == "") {
                    //puts the household info ahead
                    $maxValueHousehold = DB::table('sitio_counts')->where('statID',$statCheck->id)
                                                                  ->where('genderGroup', '=', '--')
                                                                  ->where('ageGroup', '=', '--')
                                                                  ->max('sitioID');

                    $indexHousehold = 2;

                    while ($indexHousehold <= $maxValueHousehold) {
                    $sitioName = Sitio::where('id', $indexHousehold)->value('sitioName');
                    $sumHousehold = DB::table('sitio_counts')->where('statID', $statCheck->id)
                                                             ->where('sitioID', $indexHousehold)
                                                             ->where('genderGroup', '=', '--')
                                                             ->where('ageGroup', '=', '--')
                                                             ->value('residentCount');
                    $householdCount[] = array('sitio' => $sitioName, 'houseCount' => $sumHousehold);
                    $indexHousehold++;
                    }

                    $totalHouseholdCount = DB::table('sitio_counts')->where('statID', $statCheck->id)
                                        ->where('genderGroup', '=', '--')
                                        ->where('ageGroup', '=', '--')
                                        ->sum('residentCount');
                //Otherwise (Sitio)
                }else{
                    $householdCount = array();
    
                    $sitioName = Sitio::where('id', $filterSitio)->value('sitioName');
                    $sumHousehold = DB::table('sitio_counts')->where('statID', $statCheck->id)
                                                             ->where('sitioID', $filterSitio)
                                                             ->where('genderGroup', '=', '--')
                                                             ->where('ageGroup', '=', '--')
                                                             ->value('residentCount');
                    $householdCount[] = array('sitio' => $sitioName, 'houseCount' => $sumHousehold);
                    $totalHouseholdCount = $sumHousehold;
                }
            }//No need to make an else statement if otherwise (Gender and Age Group) because it is already initialized above
        }

        $pdf = PDF::loadView('pdf.reports', compact('householdCount', 'totalHouseholdCount', 'residentCount', 'totalResidentCount', 'request', 'nameSitio'));
        return $pdf->stream('reports.pdf');
    }
}
