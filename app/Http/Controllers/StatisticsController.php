<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use App\Models\Sitio;
use App\Models\SitioCount;
use DB;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        $statistics=DB::select('select * from statistics');

        $data="";
        
        //foreach ($residentCount as $resCount){
         //   $data.="['".$resCount->id."','".$resCount->sitioID."','".$resCount->sitioName."',".$resCount->residentCount."],";
        //}
        
        $maxValue=DB::table('sitio_counts')->max('sitioID');
        //maxValue gets the value of the highest sitioID recorded in the sitio_counts table

        $index=2;
        //index starts at 2 because 1 is the sitioFiller option

        while ($index <= $maxValue){
            $sitioName=Sitio::where('id',$index)->value('sitioName');
            $sumRes=DB::table('sitio_counts')->where('sitioID', $index)->sum('residentCount');
            if ($sumRes !== 0){
                $data.="['$sitioName',".$sumRes."],";
            }
            $index++;
        }

        $chartdata=$data;

        return view('welcome', compact('statistics', 'chartdata'));
    }

    public function reports(Request $request)
    {
        $statistics=DB::select('select * from statistics');

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

        $data="";
        
        foreach ($residentCount as $resCount){
            $label=" ".$resCount->sitioName." | ".$resCount->genderGroup." | ".$resCount->ageGroup." ";
            $data.="['".$label."',".$resCount->residentCount."],";
        }
        
        $chartdata=$data;

        $sitioList=Sitio::where('id','>',1)->get();

        $gender=SitioCount::select('genderGroup')->distinct()->orderBy('genderGroup')->get();

        $ageClassification=SitioCount::select('ageGroup')->distinct()->orderBy('ageGroup')->get();

        return view('dashboard', compact('statistics', 'chartdata', 'sitioList', 'gender', 'ageClassification'));
    }
}

?>