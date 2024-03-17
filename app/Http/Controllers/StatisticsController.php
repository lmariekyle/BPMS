<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Statistics;
use App\Models\Sitio;
use App\Models\SitioCount;
use App\Models\Households;
use App\Models\Resident;
use App\Models\ResidentList;

use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StatisticsController extends Controller
{
    public function index()
    {   
        //Gets the statistic data that is the most recently added
        $currentYear = date('Y');
        $currentDate = date('m-d');

        //Establishes the static dates for determining the quarter to be used
        //Q = quarter | B = start or beginning | E = end
        $dateQoneB = '01-01';
        $dateQoneE = '03-31';
        $dateQtwoB = '04-01';
        $dateQtwoE = '06-30';
        $dateQthreeB = '07-01';
        $dateQthreeE = '09-30';
        //no need to make for quarter 4 because if such case happens, it implies that the current date provided
        //is later than the three comparisons done

        if($currentDate >= $dateQoneB && $currentDate <= $dateQoneE){
        //if currentDatetime is between Jan 1 and March 31
            $currentQuarter = 1;
        } else if($currentDate >= $dateQtwoB && $currentDate <= $dateQtwoE){
        //if currentDatetime is between April 1 and June 30
            $currentQuarter = 2;
        } else if($currentDate >= $dateQthreeB && $currentDate <= $dateQthreeE){
        //if currentDatetime is between July 1 and September 30
            $currentQuarter = 3;
        } else {
        //if currentDatetime is as early or later than October 1
            $currentQuarter = 4;
        }

        $statistics = Statistics::where('year', $currentYear)->where('quarter', $currentQuarter)->first();
        //if the statistics for the current period does not exist.
        if($statistics == NULL){
            //if the new statistics is the first for the year (Year: 2024 | Date: 01/01->03/31)
            if($currentQuarter == 1){
                $oldStatisticsData = Statistics::where('year', $currentYear - 1)->where('quarter', 4)->first();
            //if the new statistics is otherwise (e.g. : (Year: 2024 | Date: 04/01->06/30))
            } else{
                $oldStatisticsData = Statistics::where('year', $currentYear)->where('quarter', $currentQuarter - 1)->first();
            }
            $statistics = Statistics::create([
                'year' => $currentYear,
                'quarter' => $currentQuarter,
                'totalHouseholdsSitio' => $oldStatisticsData->totalHouseholdsSitio,
                'totalResidentsSitio' => $oldStatisticsData->totalResidentsSitio,
                'totalHouseholdsBarangay' => $oldStatisticsData->totalHouseholdsBarangay,
                'totalResidentsBarangay' => $oldStatisticsData->totalResidentsBarangay,
                'revisedBy' => $oldStatisticsData->revisedBy,
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
                    ]
                );
            }
        }

        $SitioCounts = SitioCount::whereIn('statID',[$statistics->id])->get();
        //insert on each Sitio Counter
        foreach($SitioCounts as $SitioCount){
            $sitioResCounter = DB::table('resident_lists')
                ->join('households','resident_lists.houseID','=','households.id')
                ->join('residents','resident_lists.residentID','=','residents.id')
                ->where('households.sitioID', '=', $SitioCount->sitioID)
                ->where('residents.gender', 'LIKE', $SitioCount->genderGroup)
                ->where('residents.ageClassification', 'LIKE', $SitioCount->ageGroup)
                ->count();
            $SitioCount->residentCount = $sitioResCounter;
            $SitioCount->save();
        }

        //-------------------------------------

        //Resident
        $dataResident = "";

        $maxValueResident = DB::table('sitio_counts')->where('residentCount','>',0)->max('sitioID');
        //maxValue gets the value from the sitio_counts table that HAS at least 1 resident the highest sitioID recorded

        $indexResident = 2;
        //index starts at 2 because 1 is the sitioFiller option

        //adds information for the Pie Chart for Resident
        while ($indexResident <= $maxValueResident) {
            $sitioName = Sitio::where('id', $indexResident)->value('sitioName');
            $sumRes = DB::table('sitio_counts')->where('sitioID', $indexResident)->where('statID',$statistics->id)->sum('residentCount');
            //if sumRes has no residents (0), then it should skip over to the next sitio
            if($sumRes > 0){
                $dataResident .= "['$sitioName'," . $sumRes . "],";
            }
            $indexResident++;
        }

        $chartdataResident = $dataResident;

        //-------------------------------------

        //Household
        $dataHousehold = "";

        $maxValueHousehold = DB::table('households')->max('sitioID');

        $indexHousehold = 2;

        //adds information for the Pie Chart for Household
        while ($indexHousehold <= $maxValueHousehold) {
            $sitioName = Sitio::where('id', $indexHousehold)->value('sitioName');
            $sumHousehold = DB::table('households')->where('sitioID', $indexHousehold)->count('houseNumber');
            $dataHousehold .= "['$sitioName'," . $sumHousehold . "],";

            $indexHousehold++;
        }

        $chartdataHousehold = $dataHousehold;

        //-------------------------------------

        //adds to the most recent statistic data row in the DB
        $totalResidentCount = DB::table('sitio_counts')->where('statID',$statistics->id)->sum('residentCount');
        $totalHouseholdCount = DB::table('households')->count('houseNumber');

        $statistics->totalResidentsBarangay = $totalResidentCount;
        $statistics->totalHouseholdsBarangay = $totalHouseholdCount;
        $statistics->save();

        return view('welcome', compact('statistics', 'chartdataResident', 'chartdataHousehold', 'SitioCounts'));
    }

    public function landingpage()
    {
        //Gets the statistic data that is the most recently added
        //Gets the statistic data that is the most recently added
        $currentYear = date('Y');
        $currentDate = date('m-d');

        //Establishes the static dates for determining the quarter to be used
        //Q = quarter | B = start or beginning | E = end
        $dateQoneB = '01-01';
        $dateQoneE = '03-31';
        $dateQtwoB = '04-01';
        $dateQtwoE = '06-30';
        $dateQthreeB = '07-01';
        $dateQthreeE = '09-30';
        //no need to make for quarter 4 because if such case happens, it implies that the current date provided
        //is later than the three comparisons done

        if($currentDate >= $dateQoneB && $currentDate <= $dateQoneE){
        //if currentDatetime is between Jan 1 and March 31
            $currentQuarter = 1;
        } else if($currentDate >= $dateQtwoB && $currentDate <= $dateQtwoE){
        //if currentDatetime is between April 1 and June 30
            $currentQuarter = 2;
        } else if($currentDate >= $dateQthreeB && $currentDate <= $dateQthreeE){
        //if currentDatetime is between July 1 and September 30
            $currentQuarter = 3;
        } else {
        //if currentDatetime is as early or later than October 1
            $currentQuarter = 4;
        }

        $statistics = Statistics::where('year', $currentYear)->where('quarter', $currentQuarter)->first();

        //-------------------------------------

        //Resident
        $dataResident = "";

        $maxValueResident = DB::table('sitio_counts')->max('sitioID');
        //maxValue gets the value of the highest sitioID recorded in the sitio_counts table

        $indexResident = 2;
        //index starts at 2 because 1 is the sitioFiller option

        //adds information for the Pie Chart for Resident
        while ($indexResident <= $maxValueResident) {
            $sitioName = Sitio::where('id', $indexResident)->value('sitioName');
            $sumRes = DB::table('sitio_counts')->where('sitioID', $indexResident)->sum('residentCount');
            $dataResident .= "['$sitioName'," . $sumRes . "],";

            $indexResident++;
        }

        $chartdataResident = $dataResident;

        //-------------------------------------

        //Household
        $dataHousehold = "";

        $maxValueHousehold = DB::table('households')->max('sitioID');

        $indexHousehold = 2;

        //adds information for the Pie Chart for Household
        while ($indexHousehold <= $maxValueHousehold) {
            $sitioName = Sitio::where('id', $indexHousehold)->value('sitioName');
            $sumHousehold = DB::table('households')->where('sitioID', $indexHousehold)->count('houseNumber');
            $dataHousehold .= "['$sitioName'," . $sumHousehold . "],";

            $indexHousehold++;
        }

        $chartdataHousehold = $dataHousehold;

        //-------------------------------------

        //adds to the most recent statistic data row in the DB
        $totalResidentCount = DB::table('sitio_counts')->sum('residentCount');
        $totalHouseholdCount = DB::table('households')->count('houseNumber');

        $statistics->totalResidentsBarangay = $totalResidentCount;
        $statistics->totalHouseholdsBarangay = $totalHouseholdCount;
        $statistics->save();

        return view('welcome', compact('statistics', 'chartdataResident', 'chartdataHousehold'));
    }

    public function reports(Request $request)
    {
        //Gets the statistic data that is the most recently added
        //Gets the statistic data that is the most recently added
        $currentYear = date('Y');
        $currentDate = date('m-d');

        //Establishes the static dates for determining the quarter to be used
        //Q = quarter | B = start or beginning | E = end
        $dateQoneB = '01-01';
        $dateQoneE = '03-31';
        $dateQtwoB = '04-01';
        $dateQtwoE = '06-30';
        $dateQthreeB = '07-01';
        $dateQthreeE = '09-30';
        //no need to make for quarter 4 because if such case happens, it implies that the current date provided
        //is later than the three comparisons done

        if($currentDate >= $dateQoneB && $currentDate <= $dateQoneE){
        //if currentDatetime is between Jan 1 and March 31
            $currentQuarter = 1;
        } else if($currentDate >= $dateQtwoB && $currentDate <= $dateQtwoE){
        //if currentDatetime is between April 1 and June 30
            $currentQuarter = 2;
        } else if($currentDate >= $dateQthreeB && $currentDate <= $dateQthreeE){
        //if currentDatetime is between July 1 and September 30
            $currentQuarter = 3;
        } else {
        //if currentDatetime is as early or later than October 1
            $currentQuarter = 4;
        }

        $statID = Statistics::where('year', $currentYear)->where('quarter', $currentQuarter)->value('id');

        $documents = Document::all();
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

        $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
            $join->on('sitio_counts.sitioID', "=", 'sitios.id');
        })
            ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
            ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
            ->where('sitio_counts.statID', $statID)->where('sitio_counts.sitioID', 'LIKE', "%$filterSitio%")->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.ageGroup', 'LIKE', "%$filterAgeGroup%")
            ->get();

        //get rid of duplicates since previous statement uses LIKE on filterSitio
        if ($request['sitio'] != "NULL") {
            $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
                $join->on('sitio_counts.sitioID', "=", 'sitios.id');
            })
                ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                ->where('sitio_counts.statID', $statID)->where('sitio_counts.sitioID', $filterSitio)->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.ageGroup', 'LIKE', "%$filterAgeGroup%")
                ->get();
        }

        //Inputs all the data into the array for the Resident Pie Chart
        $dataResident = "";

        foreach ($residentCount as $resCount) {
            $label = " " . $resCount->sitioName . " | " . $resCount->genderGroup . " | " . $resCount->ageGroup . " ";
            $resData = $resCount->residentCount;
            if($resData > 0 ){
                $dataResident .= "['" . $label . "'," . $resData . "],";
            }
        }

        $chartdataResident = $dataResident;

        //Calculates the total Residents
        $totalResidentCount = 0;

        foreach ($residentCount as $resCount) {
            $totalResidentCount = $totalResidentCount + $resCount->residentCount;
        }

        //-------------------------------------

        //For the select/option lists in the form
        $sitioList = Sitio::where('id', '>', 1)->get();

        $gender = SitioCount::select('genderGroup')->distinct()->orderBy('genderGroup')->get();

        $ageClassification = SitioCount::select('ageGroup')->distinct()->orderBy('ageGroup')->get();

        //-------------------------------------

        //Household
        $dataHousehold = "";

        $totalHouseholdCount = 0;

        //puts the household info ahead
        $maxValueHousehold = DB::table('households')->max('sitioID');

        $indexHousehold = 2;

        while ($indexHousehold <= $maxValueHousehold) {
            $sitioName = Sitio::where('id', $indexHousehold)->value('sitioName');
            $sumHousehold = DB::table('households')->where('sitioID', $indexHousehold)->count('houseNumber');
            $dataHousehold .= "['$sitioName'," . $sumHousehold . "],";

            $indexHousehold++;
        }

        $totalHouseholdCount = DB::table('households')->count('id');

        //checks if sitio has value, if there is then replaces the data in dataHousehold
        if ($request['sitio'] != "NULL") {
            $householdCount = DB::table('households')->where('sitioID', $filterSitio)->count('houseNumber');

            $label = Sitio::where('id', $filterSitio)->value('sitioName');

            $dataHousehold = "['" . $label . "'," . $householdCount . "]";

            $totalHouseholdCount = $householdCount;
        }

        //checks if gender and age has any value, if they have any then resets the dataHousehold
        if ($request['gender'] != "NULL" && $request['ageClass'] != "NULL") {
            $dataHousehold = "";
            $totalHouseholdCount = 0;
        }

        $chartdataHousehold = $dataHousehold;

        $nameSitio = "";

        if ($request['sitio'] != "NULL") {
            $nameSitio = Sitio::where('id', $filterSitio)->value('sitioName');
        }

        $upperCaseSitio = strtoupper($nameSitio);

        return view('dashboard', compact('documents', 'totalHouseholdCount', 'totalResidentCount', 'chartdataHousehold', 'chartdataResident', 'sitioList', 'gender', 'ageClassification', 'request', 'upperCaseSitio'));
    }

    public function exportpdf(Request $request)
    {
        //Gets the statistic data that is the most recently added
        //Gets the statistic data that is the most recently added
        $currentYear = date('Y');
        $currentDate = date('m-d');

        //Establishes the static dates for determining the quarter to be used
        //Q = quarter | B = start or beginning | E = end
        $dateQoneB = '01-01';
        $dateQoneE = '03-31';
        $dateQtwoB = '04-01';
        $dateQtwoE = '06-30';
        $dateQthreeB = '07-01';
        $dateQthreeE = '09-30';
        //no need to make for quarter 4 because if such case happens, it implies that the current date provided
        //is later than the three comparisons done

        if($currentDate >= $dateQoneB && $currentDate <= $dateQoneE){
        //if currentDatetime is between Jan 1 and March 31
            $currentQuarter = 1;
        } else if($currentDate >= $dateQtwoB && $currentDate <= $dateQtwoE){
        //if currentDatetime is between April 1 and June 30
            $currentQuarter = 2;
        } else if($currentDate >= $dateQthreeB && $currentDate <= $dateQthreeE){
        //if currentDatetime is between July 1 and September 30
            $currentQuarter = 3;
        } else {
        //if currentDatetime is as early or later than October 1
            $currentQuarter = 4;
        }

        $statID = Statistics::where('year', $currentYear)->where('quarter', $currentQuarter)->value('id');

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

        $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
            $join->on('sitio_counts.sitioID', "=", 'sitios.id');
        })
            ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
            ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
            ->where('sitio_counts.statID', $statID)->where('sitio_counts.sitioID', 'LIKE', "%$filterSitio%")->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.ageGroup', 'LIKE', "%$filterAgeGroup%")
            ->get();

        //get rid of duplicates since previous statement uses LIKE on filterSitio
        if ($request['sitio'] != "NULL") {
            $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
                $join->on('sitio_counts.sitioID', "=", 'sitios.id');
            })
                ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitios.sitioName', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                ->where('sitio_counts.statID', $statID)->where('sitio_counts.sitioID', $filterSitio)->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.ageGroup', 'LIKE', "%$filterAgeGroup%")
                ->get();
        }

        //Calculates the total Residents
        $totalResidentCount = 0;

        foreach ($residentCount as $resCount) {
            $totalResidentCount = $totalResidentCount + $resCount->residentCount;
        }

        if ($request['sitio'] != "NULL") {
            $request['sitio'] = Sitio::where('id', $filterSitio)->value('sitioName');
        }

        $maxValueHousehold = DB::table('households')->max('sitioID');

        $indexHousehold = 2;

        while ($indexHousehold <= $maxValueHousehold) {
            $sitioName = Sitio::where('id', $indexHousehold)->value('sitioName');
            $sumHousehold = DB::table('households')->where('sitioID', $indexHousehold)->count('houseNumber');
            $householdCount[] = array('sitio' => $sitioName, 'houseCount' => $sumHousehold);

            $indexHousehold++;
        }

        $totalHouseholdCount = DB::table('households')->count('id');

        if ($request['sitio'] != "NULL") {
            $householdCount = array();

            $sitioName = Sitio::where('id', $filterSitio)->value('sitioName');
            $sumHousehold = DB::table('households')->where('sitioID', $filterSitio)->count('houseNumber');
            $householdCount[] = array('sitio' => $sitioName, 'houseCount' => $sumHousehold);
            $totalHouseholdCount = $sumHousehold;
        }

        if ($request['gender'] != "NULL" && $request['ageClass'] != "NULL") {
            $householdCount = array();
            $totalHouseholdCount = 0;
        }

        $pdf = PDF::loadView('pdf.reports', compact('householdCount', 'totalHouseholdCount', 'residentCount', 'totalResidentCount', 'request'));
        return $pdf->stream('reports.pdf');
    }
}
