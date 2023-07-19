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
}

?>