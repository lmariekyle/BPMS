<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Statistics;
use App\Models\Sitio;
use App\Models\SitioCount;
use App\Models\Households;
use App\Models\Resident;
use App\Models\ResidentList;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
// use Barryvdh\DomPDF\Facade\PDF;
use DateTime;
use PDF;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StatisticsController extends Controller
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

        if($statID > 1 && ($statistics->totalResidentsBarangay <= 0 && $statistics->totalHouseholdsBarangay <= 0)){
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

    public function landingpage()
    {
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

        $statistics = Statistics::where('year', $currentYear)->where('quarter', $currentQuarter)->first();

        //-------------------------------------

        //Resident
        $dataResident = "";

        $maxValueResident = DB::table('sitio_counts')->where('statID', $statistics->id)
                                                     ->where('genderGroup', '!=', '--')
                                                     ->where('ageGroup', '!=', '--')
                                                     ->where('residentCount','>',0)
                                                     ->max('sitioID');
        //maxValue gets the value from the sitio_counts table that HAS at least 1 resident the highest sitioID recorded

        $indexResident = 2;
        //index starts at 2 because 1 is the sitioFiller option

        //adds information for the Pie Chart for Resident
        while ($indexResident <= $maxValueResident) {
            $sitioName = Sitio::where('id', $indexResident)->value('sitioName');
            $sumRes = DB::table('sitio_counts')->where('sitioID', $indexResident)
                                               ->where('statID',$statistics->id)
                                               ->where('genderGroup', '!=', '--')
                                               ->where('ageGroup', '!=', '--')
                                               ->sum('residentCount');
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

        $maxValueHousehold = DB::table('sitio_counts')->where('statID',$statistics->id)
                                                      ->where('genderGroup', '=', '--')
                                                      ->where('ageGroup', '=', '--')
                                                      ->where('residentCount','>',0)
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

        return view('welcome', compact('statistics', 'chartdataResident', 'chartdataHousehold'));
    }

    public function reports(Request $request)
    {
        //Get statistical information on that specific time period (Year, Quarter)
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

        $chartdataHousehold = ""; 
        $chartdataResident = "";
        $chartAllRes = "";
        $chartAllHh = "";
        $chartAllIncome = "";
        $chartAllEdu = "";
        $payAllChart = "";
        $refundAllChart = "";
        $prAllChart = "";
        $chartAllIP = "";
        $chartAllNHTS = "";
        $chartWater = "";
        $chartToilet = "";
        $chartPreg = "";

        //When the user tries to get data that does NOT exist (statID is Null)
        if (is_null($statID)){
            $totalHouseholdCount = 0; 
            $totalResidentCount = 0;
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

            $maxValueSitio = Sitio::max('id');
            //When the user didn't select any Sitio in the options
            if ($filterSitio == "") {
                //When the user didn't select any Age Group in the options
                if ($filterAgeGroup == ""){
                    $residentCount = DB::table('sitio_counts')
                        ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->where('sitio_counts.statID', '=', $statID)
                        ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                        ->where('sitio_counts.ageGroup', '!=', '--')
                        ->get();
                //Otherwise (Age Group)
                }else{
                    $residentCount = DB::table('sitio_counts')
                        ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->where('sitio_counts.statID', '=', $statID)
                        ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                        ->where('sitio_counts.ageGroup', '=', $filterAgeGroup)->where('sitio_counts.ageGroup', '!=', '--')
                        ->get(); 
                }

                //adds information for the Pie Chart for Resident
                for($x=2;$x<=$maxValueSitio;$x++) {
                    $sumRes = 0;
                    $sitioName = Sitio::where('id', $x)->value('sitioName');
                    foreach($residentCount as $resCount){
                        if ($resCount->sitioID == $x){
                            $sumRes = $sumRes + $resCount->residentCount;
                        }
                    }
                    $dataResident .= "['$sitioName'," . $sumRes . "],";
                }
            //Otherwise (Sitio)
            }else{
                //When the user didn't select any Age Group in the options
                if ($filterAgeGroup == ""){
                    $residentCount = DB::table('sitio_counts')
                        ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->where('sitio_counts.statID', '=', $statID)
                        ->where('sitio_counts.sitioID', '=', $filterSitio)
                        ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                        ->where('sitio_counts.ageGroup', '!=', '--')
                        ->get();
                //Otherwise (Age Group)
                }else{
                    $residentCount = DB::table('sitio_counts')
                        ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                        ->where('sitio_counts.statID', '=', $statID)
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
                    for($x=2;$x<=$maxValueSitio;$x++) {
                        $sitioName = Sitio::where('id', $x)->value('sitioName');
                        $sumHousehold = DB::table('sitio_counts')->where('sitioID', '=', $x)
                                                                 ->where('statID', '=', $statID)
                                                                 ->where('genderGroup', '=', '--')
                                                                 ->where('ageGroup', '=', '--')
                                                                 ->value('residentCount');
                        $dataHousehold .= "['$sitioName'," . $sumHousehold . "],";
                    }
                    $totalHouseholdCount = Statistics::where('id', $statID)->value('totalHouseholdsBarangay');
                //Sitio is selected
                }else{
                    $householdCount = DB::table('sitio_counts')->where('sitioID', '=', $filterSitio)
                                                               ->where('statID', '=', $statID)
                                                               ->where('genderGroup', '=', '--')
                                                               ->where('ageGroup', '=', '--')
                                                               ->value('residentCount');
                    if($householdCount == NULL){
                        $householdCount = 0;
                    }
                    $totalHouseholdCount = $householdCount;
                    $label = Sitio::where('id', $filterSitio)->value('sitioName');
                    $dataHousehold = "['" . $label . "'," . $householdCount . "]";
                }
            }else{
                //The user picked either the Gender or Age Group (or both)
                $SAID = Statistics::where('id', '=', $statID)->value('id');
                $SAYear = Statistics::where('id', '=', $statID)->value('year');
                $SAQuarter = Statistics::where('id', '=', $statID)->value('quarter');
                switch($SAQuarter){
                    case 1:
                        $dateB = $SAYear . '-' . '01-01';
                        $dateE = $SAYear . '-' . '03-31';
                        break;
                    case 2:
                        $dateB = $SAYear . '-' . '04-01';
                        $dateE = $SAYear . '-' . '06-30';
                        break;
                    case 3:
                        $dateB = $SAYear . '-' . '07-01';
                        $dateE = $SAYear . '-' . '09-30';
                        break;
                    case 4:
                        $dateB = $SAYear . '-' . '10-01';
                        $dateE = $SAYear . '-' . '12-31';
                        break;
                    default:
                        break;
                }
                //w/o Sitio Filter applied
                if ($filterSitio == ""){
                    //The user selected any Gender or Age Group Filter
                    for($x=2;$x<=$maxValueSitio;$x++){
                        $sitioName = Sitio::where('id', $x)->value('sitioName');
                        $sumHousehold = 0;
                        $houseList = Households::where('sitioID', '=', $x)
                                        ->where('dateOfVisit', '>=', $dateB)
                                        ->where('dateOfVisit', '<=', $dateE)
                                        ->get();
                        foreach ($houseList as $HL){
                            //User didn't select Age Group Filter
                            if ($filterAgeGroup == ""){
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->first();
                            //Otherwise
                            }else{
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->where('residents.ageClassification', '=', $filterAgeGroup)
                                    ->first();
                            }
                            if($residentCheck != NULL){
                                $sumHousehold++;
                                $totalHouseholdCount++;
                                }
                        }
                        $dataHousehold .= "['$sitioName'," . $sumHousehold . "],";
                    }
                //Otherwise
                }else{
                    //The user selected didn't any Age Group Filter
                    $sitioName = Sitio::where('id', $filterSitio)->value('sitioName');
                    $sumHousehold = 0;
                    $houseList = Households::where('sitioID', '=', $filterSitio)
                                    ->where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->get();
                    foreach ($houseList as $HL){
                        //User didn't select Age Group Filter
                        if ($filterAgeGroup == ""){
                            $residentCheck = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('resident_lists.houseID', '=', $HL->id)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->first();
                        //Otherwise
                        }else{
                            $residentCheck = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('resident_lists.houseID', '=', $HL->id)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.ageClassification', '=', $filterAgeGroup)
                                ->first();
                        }
                        if($residentCheck != NULL){
                            $sumHousehold++;
                            $totalHouseholdCount++;
                        }
                    }
                    $dataHousehold .= "['$sitioName'," . $sumHousehold . "],";
                }
            }

            $chartdataHousehold = $dataHousehold;
            //--------------------------------------------------------------------------------------------------------------------
        
            //Get the records of the population per quarter from selected to 3 (or less) previous ones; at most 4 is displayed
            
            $header = "";

            $minID = $statID - 3;

            //Resident
            $AllResData = "";

            //Household
            $AllHhData = "";
            
            //Monthly Income (Resident)
            $dataIncome = "";
            $MonthlyIncome = array(
                "None",
                "less than 9,100",
                "9,100 - 18,200",
                "18,200 - 36,400",
                "36,400 - 63,700",
                "63,700 - 109,200",
                "109,200 - 182,000",
                "above 182,000"
                );
            $miaSize = count($MonthlyIncome);

            //Educational Attainment (Resident)
            $dataEducation = "";
            $EducationAtt = array(
                "Undergraduate",
                "Elementary Graduate",
                "Junior High School Graduate",
                "Senior High School Graduate",
                "College Graduate",
                );
            $eaSize = count($EducationAtt);

            //Payment (Resident)
            $paymentData = "";
            $refundData = "";
            $prData = "";

            //Pregancy (Resident)
            $dataPreg = "";
            $Pregnancy = array("N","P","PP");
            $pSize = count($Pregnancy);

            //Indigenous (Household)
            $dataIP = "";
            $IP = array("IP","nonIP");
            $ipSize = count($IP);

            //NHTS (Household)
            $dataNHTS = "";
            $NHTS = array("NHTS","nonNHTS");
            $nhtsSize = count($NHTS);

            //Water Access (Household)
            $dataWater = "";
            $WaterAccess = array("Doubtful","L1","L2","L3");
            $wSize = count($WaterAccess);

            //Toilet Facilities (Household)
            $dataToilet = "";
            $ToiletFacilities = array("Sanitary","Insanitary","None","Shared");
            $toiletSize = count($ToiletFacilities);

            
            //No sitio is selected
            if($filterSitio == ""){
                for($x=2; $x<=$maxValueSitio; $x++){
                    $label = Sitio::where('id','=',$x)->value('sitioName');
                    $header .= "'" . $label . "',";
                }
                $header = "'Year-Quarter'," . $header;
                $labelChart = "[$header],";
                for($x=$statID; $x>0 && $x>=$minID; $x--){
                    $SAID = Statistics::where('id', '=', $x)->value('id');
                    $SAYear = Statistics::where('id', '=', $x)->value('year');
                    $SAQuarter = Statistics::where('id', '=', $x)->value('quarter');
                    switch($SAQuarter){
                        case 1:
                            $QDesc = "Jan-Mar";
                            $dateB = $SAYear . '-' . '01-01';
                            $dateE = $SAYear . '-' . '03-31';
                            break;
                        case 2:
                            $QDesc = "April-June";
                            $dateB = $SAYear . '-' . '04-01';
                            $dateE = $SAYear . '-' . '06-30';
                            break;
                        case 3:
                            $QDesc = "July-Sept";
                            $dateB = $SAYear . '-' . '07-01';
                            $dateE = $SAYear . '-' . '09-30';
                            break;
                        case 4:
                            $QDesc = "Oct-Dec";
                            $dateB = $SAYear . '-' . '10-01';
                            $dateE = $SAYear . '-' . '12-31';
                            break;
                        default:
                            break;
                    }
                    $YQ = $SAYear . ' ' . $QDesc;
    
                    //Resident
                    $dataRes = "";
                    //Household
                    $dataHh = "";
                    //Monthly Income (Resident)
                    $dataInc = "";
                    //Educational Attainment (Resident)
                    $dataEdu = "";
                    //Payment/Refunds (Resident)
                    $sumPay = 0;
                    $sumRefund = 0;
                    $payCtr = 0;
                    $refundCtr = 0;
                    //Pregancy (Resident)
                    $dPreg = "";
                    //Indigenous (Household)
                    $dIP = "";
                    //NHTS (Household)
                    $dNHTS = "";
                    //Water Access (Household)
                    $dWater = "";
                    //Toilet Facilities (Household)
                    $dToilet = "";
                    
                    if ($filterAgeGroup == ""){
                        $residentCount = DB::table('sitio_counts')
                                ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                                ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                                ->where('sitio_counts.statID', $x)
                                ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                                ->where('sitio_counts.ageGroup', '!=', '--')
                                ->get();
                    }else{
                        $residentCount = DB::table('sitio_counts')
                                ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                                ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                                ->where('sitio_counts.statID', $x)
                                ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                                ->where('sitio_counts.ageGroup', '=', $filterAgeGroup)->where('sitio_counts.ageGroup', '!=', '--')
                                ->get();
                    }
                    //adds information for the Column Graph (Resident & Household)
                    //Start at 2 since 1 is the NULL option
                    for($y=2;$y<=$maxValueSitio;$y++) {
                        //Resident
                        $sumRes = 0;
                        foreach($residentCount as $resCount){
                            if ($resCount->sitioID == $y){
                                $sumRes = $sumRes + $resCount->residentCount;
                            }
                        }
                        $dataRes .= $sumRes . ",";
    
                        //Household
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $sumHousehold = DB::table('sitio_counts')->where('sitioID', $y)
                                                                ->where('statID', $SAID)
                                                                ->where('genderGroup', '=', '--')
                                                                ->where('ageGroup', '=', '--')
                                                                ->value('residentCount');
                            $dataHh .= $sumHousehold . ",";
                        } else {
                            $sumHousehold = 0;
                            $houseList = Households::where('sitioID', '=', $y)
                                            ->where('dateOfVisit', '>=', $dateB)
                                            ->where('dateOfVisit', '<=', $dateE)
                                            ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $sumHousehold++;
                                }
                            }
                            $dataHh .= $sumHousehold . ",";
                        }
                        
                    }
                    $AllResData .= "['" . $YQ . "'," . $dataRes . "],";
                    $AllHhData .= "['" . $YQ . "'," . $dataHh . "],";
    
                    //Monthly Income
                    for($y=0; $y<$miaSize; $y++){
                        //Age Group Filter not Selected
                        if($filterAgeGroup == ""){
                            $resIncome = DB::table('resident_lists')
                            ->join('households','resident_lists.houseID','=','households.id')
                            ->join('residents','resident_lists.residentID','=','residents.id')
                            ->where('households.dateOfVisit', '>=', $dateB)
                            ->where('households.dateOfVisit', '<=', $dateE)
                            ->where('residents.dateOfDeath', '=', NULL)
                            ->where('residents.gender', 'LIKE', "%$filterGender%")
                            ->where('residents.monthlyIncome', '=', $MonthlyIncome[$y])
                            ->count();
                        //Otherwise
                        }else{
                            $resIncome = DB::table('resident_lists')
                            ->join('households','resident_lists.houseID','=','households.id')
                            ->join('residents','resident_lists.residentID','=','residents.id')
                            ->where('households.dateOfVisit', '>=', $dateB)
                            ->where('households.dateOfVisit', '<=', $dateE)
                            ->where('residents.dateOfDeath', '=', NULL)
                            ->where('residents.gender', 'LIKE', "%$filterGender%")
                            ->where('residents.ageClassification', '=', $filterAgeGroup)
                            ->where('residents.monthlyIncome', '=', $MonthlyIncome[$y])
                            ->count();  
                        }
                        $dataInc .= $resIncome . ",";
                    }
                    $dataIncome .= "['" . $YQ . "'," . $dataInc . "],";
    
                    //Educational Attainment
                    for($y=0; $y<$eaSize; $y++){
                        //Age Group Filter not Selected
                        if($filterAgeGroup == ""){
                            $resEdu = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('households.dateOfVisit', '>=', $dateB)
                                ->where('households.dateOfVisit', '<=', $dateE)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.educationalAttainment', '=', $EducationAtt[$y])
                                ->count();
                        //Otherwise
                        }else{
                            $resEdu = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('households.dateOfVisit', '>=', $dateB)
                                ->where('households.dateOfVisit', '<=', $dateE)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.ageClassification', '=', $filterAgeGroup)
                                ->where('residents.educationalAttainment', '=', $EducationAtt[$y])
                                ->count();
                        }
                        $dataEdu .= $resEdu . ",";
                    }
                    $dataEducation .= "['" . $YQ . "'," . $dataEdu . "],";
    
                    //Payment/Refund
                    //Age Group Filter Not Selected
                    if($filterAgeGroup == ""){
                        $payStats = Payment::join('transactions', function ($join) {
                            $join->on('payments.id', '=', 'transactions.paymentID');
                        })
                        ->join('users', function ($join) {
                            $join->on('transactions.userID', '=', 'users.id');
                        })
                        ->join('residents', function ($join) {
                            $join->on('users.residentID', '=', 'residents.id');
                        })
                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                        ->select('payments.*') 
                        ->get();
                    //Otherwise
                    }else{
                        $payStats = Payment::join('transactions', function ($join) {
                            $join->on('payments.id', '=', 'transactions.paymentID');
                        })
                        ->join('users', function ($join) {
                            $join->on('transactions.userID', '=', 'users.id');
                        })
                        ->join('residents', function ($join) {
                            $join->on('users.residentID', '=', 'residents.id');
                        })
                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                        ->select('payments.*') 
                        ->get();
                    }
                    foreach($payStats as $PS){
                        $date = new DateTime($PS->paymentDate);
                        $year = $date->format('Y');
                        $md = $date->format('m-d');
                        if($md >= '01-01' && $md <= '03-31'){
                            $Q = 1;
                        }elseif($md >= '04-01' && $md <= '06-30'){
                            $Q = 2;
                        }elseif($md >= '07-01' && $md <= '09-30'){
                            $Q = 3;
                        }else{
                            $Q = 4;
                        }
    
                        //This is to check if the payment is done at a certain quarter
                        if($year == $SAYear && $Q == $SAQuarter){
                            if($PS->paymentStatus == 'Paid'){
                                $sumPay = $sumPay + $PS->amountPaid;
                                $payCtr++;
                            }elseif($PS->paymentStatus == 'Refunded'){
                                $sumRefund = $sumRefund + $PS->amountPaid;
                                $refundCtr++;
                            }
                        }
                    }
                    $paymentData .= "['" . $YQ . "'," . $sumPay . "],";
                    $refundData .= "['" . $YQ . "'," . $sumRefund . "],";
                    $prData .= "['" . $YQ . "'," . $payCtr . "," . $refundCtr . "],";
    
                    //Pregnancy
                    for($y=0; $y<$pSize; $y++){
                        //Age Group Filter Not Selected
                        if($filterAgeGroup == ""){
                            $resPreg = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('households.dateOfVisit', '>=', $dateB)
                                ->where('households.dateOfVisit', '<=', $dateE)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.gender', '!=', 'M')
                                ->where('residents.pregnancyClassification', '=', $Pregnancy[$y])
                                ->count();
                        //Otherwise
                        }else{
                            $resPreg = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('households.dateOfVisit', '>=', $dateB)
                                ->where('households.dateOfVisit', '<=', $dateE)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.gender', '!=', 'M')
                                ->where('residents.ageClassification', '=', $filterAgeGroup)
                                ->where('residents.pregnancyClassification', '=', $Pregnancy[$y])
                                ->count();
                        }
                        $dPreg .= $resPreg . ",";
                    }
                    $dataPreg .= "['" . $YQ . "'," . $dPreg . "],";
    
                    //Indigenous Households
                    for($y=0; $y<$ipSize; $y++){
                        //No Gender or/and Age Group Filter Selected
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $hhIP = DB::table('households')
                            ->where('dateOfVisit', '>=', $dateB)
                            ->where('dateOfVisit', '<=', $dateE)
                            ->where('IP', '=', $IP[$y])
                            ->count();
                        //Otherwise
                        }else{
                            $hhIP = 0;
                            $houseList = Households::where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->where('IP', '=', $IP[$y])
                                    ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $hhIP++;
                                }
                            }
                        }
                        $dIP .= $hhIP . ",";
                    }
                    $dataIP .= "['" . $YQ . "'," . $dIP . "],";
    
                    //NHTS Households
                    for($y=0; $y<$nhtsSize; $y++){
                        //No Gender or/and Age Group Filter Selected
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $hhNHTS = DB::table('households')
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('nHTS', '=', $NHTS[$y])
                                ->count();
                        //Otherwise
                        }else{
                            $hhNHTS = 0;
                            $houseList = Households::where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->where('nHTS', '=', $NHTS[$y])
                                    ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $hhNHTS++;
                                }
                            }
                        }
                        $dNHTS .= $hhNHTS . ",";
                    }
                    $dataNHTS .= "['" . $YQ . "'," . $dNHTS . "],";
    
                    //Water Access
                    for($y=0; $y<$wSize; $y++){
                        //No Gender or/and Age Group Filter Selected
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $hhWater = DB::table('households')
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('accessToWaterSupply', '=', $WaterAccess[$y])
                                ->count();
                        //Otherwise
                        }else{
                            $hhWater = 0;
                            $houseList = Households::where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->where('accessToWaterSupply', '=', $WaterAccess[$y])
                                    ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $hhWater++;
                                }
                            }
                        }
                        $dWater .= $hhWater . ",";
                    }
                    $dataWater .= "['" . $YQ . "'," . $dWater . "],";
    
                    //Toilet Facilities
                    for($y=0; $y<$toiletSize; $y++){
                        //No Gender or/and Age Group Filter Selected
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $hhToilet = DB::table('households')
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('householdToiletFacilities', '=', $ToiletFacilities[$y])
                                ->count();
                        //Otherwise
                        }else{
                            $hhToilet = 0;
                            $houseList = Households::where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->where('householdToiletFacilities', '=', $ToiletFacilities[$y])
                                    ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $hhToilet++;
                                }
                            }
                        }
                        $dToilet .= $hhToilet . ",";
                    }
                    $dataToilet .= "['" . $YQ . "'," . $dToilet . "],";
                }
            //Otherwise (Sitio Filter Selected)
            }else{
                for($x=$statID; $x>0 && $x>=$minID; $x--){
                    $SAID = Statistics::where('id', '=', $x)->value('id');
                    $SAYear = Statistics::where('id', '=', $x)->value('year');
                    $SAQuarter = Statistics::where('id', '=', $x)->value('quarter');
                    switch($SAQuarter){
                        case 1:
                            $QDesc = "Jan-Mar";
                            $dateB = $SAYear . '-' . '01-01';
                            $dateE = $SAYear . '-' . '03-31';
                            break;
                        case 2:
                            $QDesc = "April-June";
                            $dateB = $SAYear . '-' . '04-01';
                            $dateE = $SAYear . '-' . '06-30';
                            break;
                        case 3:
                            $QDesc = "July-Sept";
                            $dateB = $SAYear . '-' . '07-01';
                            $dateE = $SAYear . '-' . '09-30';
                            break;
                        case 4:
                            $QDesc = "Oct-Dec";
                            $dateB = $SAYear . '-' . '10-01';
                            $dateE = $SAYear . '-' . '12-31';
                            break;
                        default:
                            break;
                    }
                    $YQ = $SAYear . ' ' . $QDesc;
    
                    //Resident
                    $dataRes = "";
                    //Household
                    $dataHh = "";
                    //Monthly Income (Resident)
                    $dataInc = "";
                    //Educational Attainment (Resident)
                    $dataEdu = "";
                    //Payment/Refunds (Resident)
                    $sumPay = 0;
                    $sumRefund = 0;
                    $payCtr = 0;
                    $refundCtr = 0;
                    //Pregancy (Resident)
                    $dPreg = "";
                    //Indigenous (Household)
                    $dIP = "";
                    //NHTS (Household)
                    $dNHTS = "";
                    //Water Access (Household)
                    $dWater = "";
                    //Toilet Facilities (Household)
                    $dToilet = "";

                    //When the user didn't select any Age Group in the options
                    if ($filterAgeGroup == ""){
                        $residentCount = DB::table('sitio_counts')
                            ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                            ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                            ->where('sitio_counts.statID', '=', $x)
                            ->where('sitio_counts.sitioID', '=', $filterSitio)
                            ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                            ->where('sitio_counts.ageGroup', '!=', '--')
                            ->get();
                    //Otherwise (Age Group)
                    }else{
                        $residentCount = DB::table('sitio_counts')
                            ->select('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                            ->groupBy('sitio_counts.id', 'sitio_counts.sitioID', 'sitio_counts.ageGroup', 'sitio_counts.genderGroup', 'sitio_counts.residentCount')
                            ->where('sitio_counts.statID', '=', $x)
                            ->where('sitio_counts.sitioID', '=', $filterSitio)
                            ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                            ->where('sitio_counts.ageGroup', '=', $filterAgeGroup)->where('sitio_counts.ageGroup', '!=', '--')
                            ->get();
                    }

                    //Since the user selected a Sitio, it will display each row of the data, instead of combining them per Sitio
                    foreach ($residentCount as $resCount) {
                        $dataRes .= $resCount->residentCount . ",";
                    }
                    $AllResData .= "['" . $YQ . "'," . $dataRes . "],";

                    //Household
                    if ($filterGender == "" && $filterAgeGroup == "") {
                        $sumHousehold = DB::table('sitio_counts')->where('statID', $x)
                                                            ->where('sitioID', '=', $filterSitio)
                                                            ->where('genderGroup', '=', '--')
                                                            ->where('ageGroup', '=', '--')
                                                            ->value('residentCount');
                        $dataHh .= $sumHousehold . ",";
                    }else{
                        $sumHousehold = 0;
                        $houseList = Households::where('sitioID', '=', $filterSitio)
                                        ->where('dateOfVisit', '>=', $dateB)
                                        ->where('dateOfVisit', '<=', $dateE)
                                        ->get();
                        foreach ($houseList as $HL){
                            //User didn't select Age Group Filter
                            if ($filterAgeGroup == ""){
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->first();
                            //Otherwise
                            }else{
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->where('residents.ageClassification', '=', $filterAgeGroup)
                                    ->first();
                            }
                            if($residentCheck != NULL){
                                $sumHousehold++;
                            }
                        }
                        $dataHh .= $sumHousehold . ",";
                    }
                    $AllHhData .= "['" . $YQ . "'," . $dataHh ."],";

                    //Monthly Income
                    for($y=0; $y<$miaSize; $y++){
                        //Age Group Filter not Selected
                        if($filterAgeGroup == ""){
                            $resIncome = DB::table('resident_lists')
                            ->join('households','resident_lists.houseID','=','households.id')
                            ->join('residents','resident_lists.residentID','=','residents.id')
                            ->where('households.dateOfVisit', '>=', $dateB)
                            ->where('households.dateOfVisit', '<=', $dateE)
                            ->where('households.sitioID', '=', $filterSitio)
                            ->where('residents.dateOfDeath', '=', NULL)
                            ->where('residents.gender', 'LIKE', "%$filterGender%")
                            ->where('residents.monthlyIncome', '=', $MonthlyIncome[$y])
                            ->count();
                        //Otherwise
                        }else{
                            $resIncome = DB::table('resident_lists')
                            ->join('households','resident_lists.houseID','=','households.id')
                            ->join('residents','resident_lists.residentID','=','residents.id')
                            ->where('households.dateOfVisit', '>=', $dateB)
                            ->where('households.dateOfVisit', '<=', $dateE)
                            ->where('households.sitioID', '=', $filterSitio)
                            ->where('residents.dateOfDeath', '=', NULL)
                            ->where('residents.gender', 'LIKE', "%$filterGender%")
                            ->where('residents.ageClassification', '=', $filterAgeGroup)
                            ->where('residents.monthlyIncome', '=', $MonthlyIncome[$y])
                            ->count();
                        }
                        $dataInc .= $resIncome . ",";
                    }
                    $dataIncome .= "['" . $YQ . "'," . $dataInc . "],";

                    //Educational Attainment
                    for($y=0; $y<$eaSize; $y++){
                        //Age Group Filter not Selected
                        if($filterAgeGroup == ""){
                            $resEdu = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('households.dateOfVisit', '>=', $dateB)
                                ->where('households.dateOfVisit', '<=', $dateE)
                                ->where('households.sitioID', '=', $filterSitio)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.educationalAttainment', '=', $EducationAtt[$y])
                                ->count();
                        //Otherwise
                        }else{
                            $resEdu = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('households.dateOfVisit', '>=', $dateB)
                                ->where('households.dateOfVisit', '<=', $dateE)
                                ->where('households.sitioID', '=', $filterSitio)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.ageClassification', '=', $filterAgeGroup)
                                ->where('residents.educationalAttainment', '=', $EducationAtt[$y])
                                ->count();
                        }
                        $dataEdu .= $resEdu . ",";
                    }
                    $dataEducation .= "['" . $YQ . "'," . $dataEdu . "],";

                    //Payment/Refund
                    //Age Group Filter Not Selected
                    if($filterAgeGroup == ""){
                        $payStats = Payment::join('transactions', function ($join) {
                            $join->on('payments.id', '=', 'transactions.paymentID');
                        })
                        ->join('users', function ($join) {
                            $join->on('transactions.userID', '=', 'users.id');
                        })
                        ->join('residents', function ($join) {
                            $join->on('users.residentID', '=', 'residents.id');
                        })
                        ->where('users.sitioID', '=', $filterSitio)
                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                        ->select('payments.*') 
                        ->get();
                    //Otherwise
                    }else{
                        $payStats = Payment::join('transactions', function ($join) {
                            $join->on('payments.id', '=', 'transactions.paymentID');
                        })
                        ->join('users', function ($join) {
                            $join->on('transactions.userID', '=', 'users.id');
                        })
                        ->join('residents', function ($join) {
                            $join->on('users.residentID', '=', 'residents.id');
                        })
                        ->where('users.sitioID', '=', $filterSitio)
                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                        ->select('payments.*') 
                        ->get();
                    }
                    foreach($payStats as $PS){
                        $date = new DateTime($PS->paymentDate);
                        $year = $date->format('Y');
                        $md = $date->format('m-d');
                        if($md >= '01-01' && $md <= '03-31'){
                            $Q = 1;
                        }elseif($md >= '04-01' && $md <= '06-30'){
                            $Q = 2;
                        }elseif($md >= '07-01' && $md <= '09-30'){
                            $Q = 3;
                        }else{
                            $Q = 4;
                        }
    
                        //This is to check if the payment is done at a certain quarter
                        if($year == $SAYear && $Q == $SAQuarter){
                            if($PS->paymentStatus == 'Paid'){
                                $sumPay = $sumPay + $PS->amountPaid;
                                $payCtr++;
                            }elseif($PS->paymentStatus == 'Refunded'){
                                $sumRefund = $sumRefund + $PS->amountPaid;
                                $refundCtr++;
                            }
                        }
                    }
                    $paymentData .= "['" . $YQ . "'," . $sumPay . "],";
                    $refundData .= "['" . $YQ . "'," . $sumRefund . "],";
                    $prData .= "['" . $YQ . "'," . $payCtr . "," . $refundCtr . "],";

                    //Pregnancy
                    for($y=0; $y<$pSize; $y++){
                        //Age Group Filter Not Selected
                        if($filterAgeGroup == ""){
                            $resPreg = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('households.dateOfVisit', '>=', $dateB)
                                ->where('households.dateOfVisit', '<=', $dateE)
                                ->where('households.sitioID', '=', $filterSitio)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.gender', '!=', 'M')
                                ->where('residents.pregnancyClassification', '=', $Pregnancy[$y])
                                ->count();
                        //Otherwise
                        }else{
                            $resPreg = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('households.dateOfVisit', '>=', $dateB)
                                ->where('households.dateOfVisit', '<=', $dateE)
                                ->where('households.sitioID', '=', $filterSitio)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.gender', '!=', 'M')
                                ->where('residents.ageClassification', '=', $filterAgeGroup)
                                ->where('residents.pregnancyClassification', '=', $Pregnancy[$y])
                                ->count();
                        }
                        $dPreg .= $resPreg . ",";
                    }
                    $dataPreg .= "['" . $YQ . "'," . $dPreg . "],";

                    //Indigenous Households
                    for($y=0; $y<$ipSize; $y++){
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $hhIP = DB::table('households')
                            ->where('sitioID', '=', $filterSitio)
                            ->where('dateOfVisit', '>=', $dateB)
                            ->where('dateOfVisit', '<=', $dateE)
                            ->where('IP', '=', $IP[$y])
                            ->count();
                        }else{
                            $hhIP = 0;
                            $houseList = Households::where('sitioID', '=', $filterSitio)
                                    ->where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->where('IP', '=', $IP[$y])
                                    ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $hhIP++;
                                }
                            }
                        }
                        $dIP .= $hhIP . ",";
                    }
                    $dataIP .= "['" . $YQ . "'," . $dIP . "],";

                    //NHTS Households
                    for($y=0; $y<$nhtsSize; $y++){
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $hhNHTS = DB::table('households')
                                ->where('sitioID', '=', $filterSitio)
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('nHTS', '=', $NHTS[$y])
                                ->count();
                        }else{
                            $hhNHTS = 0;
                            $houseList = Households::where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->where('nHTS', '=', $NHTS[$y])
                                    ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $hhNHTS++;
                                }
                            }
                        }
                        $dNHTS .= $hhNHTS . ",";
                    }
                    $dataNHTS .= "['" . $YQ . "'," . $dNHTS . "],";

                    //Water Access
                    for($y=0; $y<$wSize; $y++){
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $hhWater = DB::table('households')
                                ->where('sitioID', '=', $filterSitio)
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('accessToWaterSupply', '=', $WaterAccess[$y])
                                ->count();
                        }else{
                            $hhWater = 0;
                            $houseList = Households::where('sitioID', '=', $filterSitio)
                                    ->where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->where('accessToWaterSupply', '=', $WaterAccess[$y])
                                    ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $hhWater++;
                                }
                            }
                        }
                        $dWater .= $hhWater . ",";
                    }
                    $dataWater .= "['" . $YQ . "'," . $dWater . "],";

                    //Toilet Facilities
                    for($y=0; $y<$toiletSize; $y++){
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $hhToilet = DB::table('households')
                                ->where('sitioID', '=', $filterSitio)
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('householdToiletFacilities', '=', $ToiletFacilities[$y])
                                ->count();
                        //Otherwise
                        }else{
                            $hhToilet = 0;
                            $houseList = Households::where('sitioID', '=', $filterSitio)
                                    ->where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->where('householdToiletFacilities', '=', $ToiletFacilities[$y])
                                    ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $hhToilet++;
                                }
                            }
                        }
                        $dToilet .= $hhToilet . ",";
                    }
                    $dataToilet .= "['" . $YQ . "'," . $dToilet . "],";
                }

                //Labeling purposes Only
                foreach ($residentCount as $resCount) {
                    $label = $resCount->genderGroup . '-' . $resCount->ageGroup;
                    $header .= "'" . $label . "',";
                }
                $header = "'Year-Quarter'," . $header;
                $labelChart = "[$header],";

                $labelHh = "'Year-Quarter','Households'";
                $labelChartHh = "[$labelHh],";
            }

            $chartAllRes = $labelChart . $AllResData;
            if($filterSitio == ""){
                $chartAllHh = $labelChart . $AllHhData;
            }else{
                $chartAllHh = $labelChartHh . $AllHhData;
            }
            //dd($chartAllHh);
            $chartAllIncome = $dataIncome;
            $chartAllEdu = $dataEducation;
            $payAllChart = $paymentData;
            $refundAllChart = $refundData;
            $prAllChart = $prData;
            $chartAllIP = $dataIP;
            $chartAllNHTS = $dataNHTS;
            $chartWater = $dataWater;
            $chartToilet = $dataToilet;
            $chartPreg = $dataPreg;
            
            //-----------------------------------------------------------------------------------------------------------
        }

        return view('dashboard', compact('documents', 'totalHouseholdCount', 'totalResidentCount', 'chartdataHousehold', 'chartdataResident', 'sitioList', 'gender', 'ageClassification', 'yearList', 'request', 'nameSitio', 'chartAllRes', 'chartAllHh', 'chartAllIncome', 'chartPreg', 'payAllChart', 'refundAllChart', 'prAllChart', 'chartAllEdu', 'chartAllIP', 'chartAllNHTS', 'chartWater', 'chartToilet'));
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

        //Monthly Income of each resident
        $dataIncome = array();
        $MonthlyIncome = array(
            "None",
            "less than 9,100",
            "9,100 - 18,200",
            "18,200 - 36,400",
            "36,400 - 63,700",
            "63,700 - 109,200",
            "109,200 - 182,000",
            "above 182,000"
            );

        //Payment/Refunds (Resident)
        $sumPay = 0;
        $sumRefund = 0;
        $payCtr = 0;
        $refundCtr = 0;
        $prInfo = array();

        //Educational Attainment (Resident)
        $dataEducation = array();
        $EducationAtt = array(
            "Undergraduate",
            "Elementary Graduate",
            "Junior High School Graduate",
            "Senior High School Graduate",
            "College Graduate",
            );

        //Pregancy (Resident)
        $dataPreg = array();
        $Pregnancy = array("N","P","PP");
        
        //Indigenous (Household)
        $dataIP = array();
        $IP = array("IP","nonIP");

        //NHTS (Household)
        $dataNHTS = array();
        $NHTS = array("NHTS","nonNHTS");

        //Water Access (Household)
        $dataWater = array();
        $WaterAccess = array("Doubtful","L1","L2","L3");
        
        //Toilet Facilities (Household)
        $dataToilet = array();
        $ToiletFacilities = array("Sanitary","Insanitary","None","Shared");

        //Two ways: 
        //1. If the statitics information is NOT found
        //2. The statistics information exists, BUT has no resident/households recorded (i.e. 0)
        if ($statCheck == NULL){
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

            $maxValueSitio = Sitio::max('id');
    
            //-------------------------------------
            
            //Resident
            //When the user didn't select any Sitio in the options
            if ($filterSitio == "") {
                if($filterAgeGroup == ""){
                    $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
                        $join->on('sitio_counts.sitioID', "=", 'sitios.id');
                    })
                    ->select('sitios.sitioName', 'sitio_counts.ageGroup',
                    DB::raw('SUM(CASE WHEN sitio_counts.genderGroup = "M" THEN sitio_counts.residentCount ELSE 0 END) as maleResident'),
                    DB::raw('SUM(CASE WHEN sitio_counts.genderGroup = "F" THEN sitio_counts.residentCount ELSE 0 END) as femaleResident'),
                    DB::raw('SUM(sitio_counts.residentCount) as totalResident'))
                    ->where('sitio_counts.statID', $statCheck->id)
                    ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                    ->where('sitio_counts.ageGroup', '!=', '--')
                    ->groupBy('sitios.sitioName', 'sitio_counts.ageGroup')
                    ->get();
                }else{
                    $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
                        $join->on('sitio_counts.sitioID', "=", 'sitios.id');
                    })
                    ->select('sitios.sitioName', 'sitio_counts.ageGroup',
                    DB::raw('SUM(CASE WHEN sitio_counts.genderGroup = "M" THEN sitio_counts.residentCount ELSE 0 END) as maleResident'),
                    DB::raw('SUM(CASE WHEN sitio_counts.genderGroup = "F" THEN sitio_counts.residentCount ELSE 0 END) as femaleResident'),
                    DB::raw('SUM(sitio_counts.residentCount) as totalResident'))
                    ->where('sitio_counts.statID', $statCheck->id)
                    ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                    ->where('sitio_counts.ageGroup', '=', $filterAgeGroup)->where('sitio_counts.ageGroup', '!=', '--')
                    ->groupBy('sitios.sitioName', 'sitio_counts.ageGroup')
                    ->get();
                }
            //Otherwise (Sitio)
            }else{
                if($filterAgeGroup == ""){
                    $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
                        $join->on('sitio_counts.sitioID', "=", 'sitios.id');
                    })
                    ->select('sitios.sitioName', 'sitio_counts.ageGroup',
                    DB::raw('SUM(CASE WHEN sitio_counts.genderGroup = "M" THEN sitio_counts.residentCount ELSE 0 END) as maleResident'),
                    DB::raw('SUM(CASE WHEN sitio_counts.genderGroup = "F" THEN sitio_counts.residentCount ELSE 0 END) as femaleResident'),
                    DB::raw('SUM(sitio_counts.residentCount) as totalResident'))
                    ->where('sitio_counts.statID', $statCheck->id)
                    ->where('sitio_counts.sitioID', $filterSitio)
                    ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                    ->where('sitio_counts.ageGroup', '!=', '--')
                    ->groupBy('sitios.sitioName', 'sitio_counts.ageGroup')
                    ->get();
                }else{
                    $residentCount = DB::table('sitio_counts')->leftJoin('sitios', function ($join) {
                        $join->on('sitio_counts.sitioID', "=", 'sitios.id');
                    })
                    ->select('sitios.sitioName', 'sitio_counts.ageGroup',
                    DB::raw('SUM(CASE WHEN sitio_counts.genderGroup = "M" THEN sitio_counts.residentCount ELSE 0 END) as maleResident'),
                    DB::raw('SUM(CASE WHEN sitio_counts.genderGroup = "F" THEN sitio_counts.residentCount ELSE 0 END) as femaleResident'),
                    DB::raw('SUM(sitio_counts.residentCount) as totalResident'))
                    ->where('sitio_counts.statID', $statCheck->id)
                    ->where('sitio_counts.sitioID', $filterSitio)
                    ->where('sitio_counts.genderGroup', 'LIKE', "%$filterGender%")->where('sitio_counts.genderGroup', '!=', '--')
                    ->where('sitio_counts.ageGroup', '=', $filterAgeGroup)->where('sitio_counts.ageGroup', '!=', '--')
                    ->groupBy('sitios.sitioName', 'sitio_counts.ageGroup')
                    ->get();
                }
            }
            //Calculates the total Residents
            $totalResidentCount = 0;
    
            foreach ($residentCount as $resCount) {
                $totalResidentCount = $totalResidentCount + $resCount->totalResident;
            }

            //For checking purposes
            $SAID = Statistics::where('id', '=', $statCheck->id)->value('id');
            $SAYear = Statistics::where('id', '=', $statCheck->id)->value('year');
            $SAQuarter = Statistics::where('id', '=', $statCheck->id)->value('quarter');
            switch($SAQuarter){
                case 1:
                    $dateB = $SAYear . '-' . '01-01';
                    $dateE = $SAYear . '-' . '03-31';
                    break;
                case 2:
                    $dateB = $SAYear . '-' . '04-01';
                    $dateE = $SAYear . '-' . '06-30';
                    break;
                case 3:
                    $dateB = $SAYear . '-' . '07-01';
                    $dateE = $SAYear . '-' . '09-30';
                    break;
                case 4:
                    $dateB = $SAYear . '-' . '10-01';
                    $dateE = $SAYear . '-' . '12-31';
                    break;
                default:
                    break;
            }
            
            //No Sitio Filter Selected
            if($filterSitio == ""){
                for($x=2;$x<=$maxValueSitio;$x++){
                    $sitioName = Sitio::where('id', $x)->value('sitioName');

                    //Monthly Income
                    $dataIncome[$sitioName] = array();
                    foreach($MonthlyIncome as $MI){
                        if($filterAgeGroup == ""){
                            $resIncome = DB::table('resident_lists')
                            ->join('households','resident_lists.houseID','=','households.id')
                            ->join('residents','resident_lists.residentID','=','residents.id')
                            ->where('households.sitioID', '=', $x)
                            ->where('households.dateOfVisit', '>=', $dateB)
                            ->where('households.dateOfVisit', '<=', $dateE)
                            ->where('residents.dateOfDeath', '=', NULL)
                            ->where('residents.gender', 'LIKE', "%$filterGender%")
                            ->where('residents.monthlyIncome', '=', $MI)
                            ->count();
                        }else{
                            $resIncome = DB::table('resident_lists')
                            ->join('households','resident_lists.houseID','=','households.id')
                            ->join('residents','resident_lists.residentID','=','residents.id')
                            ->where('households.sitioID', '=', $x)
                            ->where('households.dateOfVisit', '>=', $dateB)
                            ->where('households.dateOfVisit', '<=', $dateE)
                            ->where('residents.dateOfDeath', '=', NULL)
                            ->where('residents.gender', 'LIKE', "%$filterGender%")
                            ->where('residents.ageClassification', '=', $filterAgeGroup)
                            ->where('residents.monthlyIncome', '=', $MI)
                            ->count();
                        }
                        $dataIncome[$sitioName][$MI] = $resIncome;
                    }

                    //Payment/Refund Transactions
                    $sumPay = 0;
                    $sumRefund = 0;
                    $payCtr = 0;
                    $refundCtr = 0;
                    if($filterAgeGroup == ""){
                        $payStats = Payment::join('transactions', function ($join) {
                            $join->on('payments.id', '=', 'transactions.paymentID');
                        })
                        ->join('users', function ($join) {
                            $join->on('transactions.userID', '=', 'users.id');
                        })
                        ->join('residents', function ($join) {
                            $join->on('users.residentID', '=', 'residents.id');
                        })
                        ->where('users.sitioID', '=', $x)
                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                        ->select('payments.*') 
                        ->get();
                    }else{
                        $payStats = Payment::join('transactions', function ($join) {
                            $join->on('payments.id', '=', 'transactions.paymentID');
                        })
                        ->join('users', function ($join) {
                            $join->on('transactions.userID', '=', 'users.id');
                        })
                        ->join('residents', function ($join) {
                            $join->on('users.residentID', '=', 'residents.id');
                        })
                        ->where('users.sitioID', '=', $x)
                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                        ->select('payments.*') 
                        ->get();
                    }
                    foreach($payStats as $PS){
                        $date = new DateTime($PS->paymentDate);
                        $year = $date->format('Y');
                        $md = $date->format('m-d');
                        if($md >= '01-01' && $md <= '03-31'){
                            $Q = 1;
                        }elseif($md >= '04-01' && $md <= '06-30'){
                            $Q = 2;
                        }elseif($md >= '07-01' && $md <= '09-30'){
                            $Q = 3;
                        }else{
                            $Q = 4;
                        }
    
                        //This is to check if the payment is done at a certain quarter
                        if($year == $SAYear && $Q == $SAQuarter){
                            if($PS->paymentStatus == 'Paid'){
                                $sumPay = $sumPay + $PS->amountPaid;
                                $payCtr++;
                            }elseif($PS->paymentStatus == 'Refunded'){
                                $sumRefund = $sumRefund + $PS->amountPaid;
                                $refundCtr++;
                            }
                        }
                    }
                    $prInfo[] = array('sitio' => $sitioName, 'pCtr' => $payCtr, 'pAmount' => $sumPay, 'rCtr' => $refundCtr, 'rAmount' => $sumRefund);

                    //Educational Attainment
                    $dataEducation[$sitioName] = array();
                    foreach($EducationAtt as $EA){
                        //Age Group Filter not Selected
                        if($filterAgeGroup == ""){
                            $resEdu = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('households.sitioID', '=', $x)
                                ->where('households.dateOfVisit', '>=', $dateB)
                                ->where('households.dateOfVisit', '<=', $dateE)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.educationalAttainment', '=', $EA)
                                ->count();
                        //Otherwise
                        }else{
                            $resEdu = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('households.sitioID', '=', $x)
                                ->where('households.dateOfVisit', '>=', $dateB)
                                ->where('households.dateOfVisit', '<=', $dateE)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.ageClassification', '=', $filterAgeGroup)
                                ->where('residents.educationalAttainment', '=', $EA)
                                ->count();
                        }
                        $dataEducation[$sitioName][$EA] = $resEdu;
                    }

                    //Pregnancy
                    $dataPreg[$sitioName] = array();
                    foreach($Pregnancy as $P){
                        //Age Group Filter not Selected
                        if($filterAgeGroup == ""){
                            $resPreg = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('households.sitioID', '=', $x)
                                ->where('households.dateOfVisit', '>=', $dateB)
                                ->where('households.dateOfVisit', '<=', $dateE)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.gender', '!=', 'M')
                                ->where('residents.pregnancyClassification', '=', $P)
                                ->count();
                        //Otherwise
                        }else{
                            $resPreg = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('households.sitioID', '=', $x)
                                ->where('households.dateOfVisit', '>=', $dateB)
                                ->where('households.dateOfVisit', '<=', $dateE)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.gender', '!=', 'M')
                                ->where('residents.ageClassification', '=', $filterAgeGroup)
                                ->where('residents.pregnancyClassification', '=', $P)
                                ->count();
                        }
                        $dataPreg[$sitioName][$P] = $resPreg;
                    }

                    //Indigenous Households
                    $dataIP[$sitioName] = array();
                    foreach($IP as $I){
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $hhIP = DB::table('households')
                            ->where('sitioID', '=', $x)
                            ->where('dateOfVisit', '>=', $dateB)
                            ->where('dateOfVisit', '<=', $dateE)
                            ->where('IP', '=', $I)
                            ->count();
                        }else{
                            $hhIP = 0;
                            $houseList = Households::where('sitioID', '=', $x)
                                    ->where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->where('IP', '=', $I)
                                    ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $hhIP++;
                                }
                            }
                        }
                        $dataIP[$sitioName][$I] = $hhIP;
                    }

                    //NHTS Households
                    $dataNHTS[$sitioName] = array();
                    foreach($NHTS as $N){
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $hhNHTS = DB::table('households')
                                ->where('sitioID', '=', $x)
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('nHTS', '=', $N)
                                ->count();
                        }else{
                            $hhNHTS = 0;
                            $houseList = Households::where('sitioID', '=', $x)
                                    ->where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->where('nHTS', '=', $N)
                                    ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $hhNHTS++;
                                }
                            }
                        }
                        $dataNHTS[$sitioName][$N] = $hhNHTS;
                    }

                    //Water Access
                    $dataWater[$sitioName] = array();
                    foreach($WaterAccess as $WA){
                        //No Gender or/and Age Group Filter Selected
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $hhWater = DB::table('households')
                                ->where('sitioID', '=', $x)
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('accessToWaterSupply', '=', $WA)
                                ->count();
                        //Otherise
                        }else{
                            $hhWater = 0;
                            $houseList = Households::where('sitioID', '=', $x)
                                    ->where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->where('accessToWaterSupply', '=', $WA)
                                    ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $hhWater++;
                                }
                            }
                        }
                        $dataWater[$sitioName][$WA] = $hhWater;   
                    }

                    //Toilet
                    $dataToilet[$sitioName] = array();
                    foreach($ToiletFacilities as $TF){
                        //No Gender or/and Age Group Filter Selected
                        if ($filterGender == "" && $filterAgeGroup == "") {
                            $hhToilet = DB::table('households')
                                ->where('sitioID', '=', $x)
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('householdToiletFacilities', '=', $TF)
                                ->count();
                        //Otherwise
                        }else{
                            $hhToilet = 0;
                            $houseList = Households::where('sitioID', '=', $x)
                                    ->where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->where('householdToiletFacilities', '=', $TF)
                                    ->get();
                            foreach ($houseList as $HL){
                                //User didn't select Age Group Filter
                                if ($filterAgeGroup == ""){
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->first();
                                //Otherwise
                                }else{
                                    $residentCheck = DB::table('resident_lists')
                                        ->join('households','resident_lists.houseID','=','households.id')
                                        ->join('residents','resident_lists.residentID','=','residents.id')
                                        ->where('resident_lists.houseID', '=', $HL->id)
                                        ->where('residents.dateOfDeath', '=', NULL)
                                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                                        ->first();
                                }
                                if($residentCheck != NULL){
                                    $hhToilet++;
                                }
                            }
                        }
                        $dataToilet[$sitioName][$TF] = $hhToilet;
                    }
                }
            //Otherwise (Sitio Selected)
            }else{
                $sitioName = Sitio::where('id', $filterSitio)->value('sitioName');
                $dataIncome[$sitioName] = array();
                foreach($MonthlyIncome as $MI){
                    if($filterAgeGroup == ""){
                        $resIncome = DB::table('resident_lists')
                        ->join('households','resident_lists.houseID','=','households.id')
                        ->join('residents','resident_lists.residentID','=','residents.id')
                        ->where('households.sitioID', '=', $filterSitio)
                        ->where('households.dateOfVisit', '>=', $dateB)
                        ->where('households.dateOfVisit', '<=', $dateE)
                        ->where('residents.dateOfDeath', '=', NULL)
                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                        ->where('residents.monthlyIncome', '=', $MI)
                        ->count();
                    }else{
                        $resIncome = DB::table('resident_lists')
                        ->join('households','resident_lists.houseID','=','households.id')
                        ->join('residents','resident_lists.residentID','=','residents.id')
                        ->where('households.sitioID', '=', $filterSitio)
                        ->where('households.dateOfVisit', '>=', $dateB)
                        ->where('households.dateOfVisit', '<=', $dateE)
                        ->where('residents.dateOfDeath', '=', NULL)
                        ->where('residents.gender', 'LIKE', "%$filterGender%")
                        ->where('residents.ageClassification', '=', $filterAgeGroup)
                        ->where('residents.monthlyIncome', '=', $MI)
                        ->count();
                    }
                    $dataIncome[$sitioName][$MI] = $resIncome;
                }

                //Payment/Refund Transactions
                $sumPay = 0;
                $sumRefund = 0;
                $payCtr = 0;
                $refundCtr = 0;
                if($filterAgeGroup == ""){
                    $payStats = Payment::join('transactions', function ($join) {
                        $join->on('payments.id', '=', 'transactions.paymentID');
                    })
                    ->join('users', function ($join) {
                        $join->on('transactions.userID', '=', 'users.id');
                    })
                    ->join('residents', function ($join) {
                        $join->on('users.residentID', '=', 'residents.id');
                    })
                    ->where('users.sitioID', '=', $filterSitio)
                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                    ->select('payments.*') 
                    ->get();
                }else{
                    $payStats = Payment::join('transactions', function ($join) {
                        $join->on('payments.id', '=', 'transactions.paymentID');
                    })
                    ->join('users', function ($join) {
                        $join->on('transactions.userID', '=', 'users.id');
                    })
                    ->join('residents', function ($join) {
                        $join->on('users.residentID', '=', 'residents.id');
                    })
                    ->where('users.sitioID', '=', $filterSitio)
                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                    ->where('residents.ageClassification', '=', $filterAgeGroup)
                    ->select('payments.*') 
                    ->get();
                }
                foreach($payStats as $PS){
                    $date = new DateTime($PS->paymentDate);
                    $year = $date->format('Y');
                    $md = $date->format('m-d');
                    if($md >= '01-01' && $md <= '03-31'){
                        $Q = 1;
                    }elseif($md >= '04-01' && $md <= '06-30'){
                        $Q = 2;
                    }elseif($md >= '07-01' && $md <= '09-30'){
                        $Q = 3;
                    }else{
                        $Q = 4;
                    }

                    //This is to check if the payment is done at a certain quarter
                    if($year == $SAYear && $Q == $SAQuarter){
                        if($PS->paymentStatus == 'Paid'){
                            $sumPay = $sumPay + $PS->amountPaid;
                            $payCtr++;
                        }elseif($PS->paymentStatus == 'Refunded'){
                            $sumRefund = $sumRefund + $PS->amountPaid;
                            $refundCtr++;
                        }
                    }
                }
                $prInfo[] = array('sitio' => $sitioName, 'pCtr' => $payCtr, 'pAmount' => $sumPay, 'rCtr' => $refundCtr, 'rAmount' => $sumRefund);

                //Educational Attainment
                $dataEducation[$sitioName] = array();
                foreach($EducationAtt as $EA){
                    //Age Group Filter not Selected
                    if($filterAgeGroup == ""){
                        $resEdu = DB::table('resident_lists')
                            ->join('households','resident_lists.houseID','=','households.id')
                            ->join('residents','resident_lists.residentID','=','residents.id')
                            ->where('households.sitioID', '=', $filterSitio)
                            ->where('households.dateOfVisit', '>=', $dateB)
                            ->where('households.dateOfVisit', '<=', $dateE)
                            ->where('residents.dateOfDeath', '=', NULL)
                            ->where('residents.gender', 'LIKE', "%$filterGender%")
                            ->where('residents.educationalAttainment', '=', $EA)
                            ->count();
                    //Otherwise
                    }else{
                        $resEdu = DB::table('resident_lists')
                            ->join('households','resident_lists.houseID','=','households.id')
                            ->join('residents','resident_lists.residentID','=','residents.id')
                            ->where('households.sitioID', '=', $filterSitio)
                            ->where('households.dateOfVisit', '>=', $dateB)
                            ->where('households.dateOfVisit', '<=', $dateE)
                            ->where('residents.dateOfDeath', '=', NULL)
                            ->where('residents.gender', 'LIKE', "%$filterGender%")
                            ->where('residents.ageClassification', '=', $filterAgeGroup)
                            ->where('residents.educationalAttainment', '=', $EA)
                            ->count();
                    }
                    $dataPreg[$sitioName][$EA] = $resEdu;
                }

                //Pregnancy
                $dataPreg[$sitioName] = array();
                foreach($Pregnancy as $P){
                    //Age Group Filter not Selected
                    if($filterAgeGroup == ""){
                        $resPreg = DB::table('resident_lists')
                            ->join('households','resident_lists.houseID','=','households.id')
                            ->join('residents','resident_lists.residentID','=','residents.id')
                            ->where('households.sitioID', '=', $filterSitio)
                            ->where('households.dateOfVisit', '>=', $dateB)
                            ->where('households.dateOfVisit', '<=', $dateE)
                            ->where('residents.dateOfDeath', '=', NULL)
                            ->where('residents.gender', 'LIKE', "%$filterGender%")
                            ->where('residents.gender', '!=', 'M')
                            ->where('residents.pregnancyClassification', '=', $P)
                            ->count();
                    //Otherwise
                    }else{
                        $resPreg = DB::table('resident_lists')
                            ->join('households','resident_lists.houseID','=','households.id')
                            ->join('residents','resident_lists.residentID','=','residents.id')
                            ->where('households.sitioID', '=', $filterSitio)
                            ->where('households.dateOfVisit', '>=', $dateB)
                            ->where('households.dateOfVisit', '<=', $dateE)
                            ->where('residents.dateOfDeath', '=', NULL)
                            ->where('residents.gender', 'LIKE', "%$filterGender%")
                            ->where('residents.gender', '!=', 'M')
                            ->where('residents.ageClassification', '=', $filterAgeGroup)
                            ->where('residents.pregnancyClassification', '=', $P)
                            ->count();
                    }
                    $dataPreg[$sitioName][$P] = $resPreg;
                }

                //Indigenous Households
                $dataIP[$sitioName] = array();
                foreach($IP as $I){
                    if ($filterGender == "" && $filterAgeGroup == "") {
                        $hhIP = DB::table('households')
                        ->where('households.sitioID', '=', $filterSitio)
                        ->where('dateOfVisit', '>=', $dateB)
                        ->where('dateOfVisit', '<=', $dateE)
                        ->where('IP', '=', $I)
                        ->count();
                    }else{
                        $hhIP = 0;
                        $houseList = Households::where('households.sitioID', '=', $filterSitio)
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('IP', '=', $I)
                                ->get();
                        foreach ($houseList as $HL){
                            //User didn't select Age Group Filter
                            if ($filterAgeGroup == ""){
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->first();
                            //Otherwise
                            }else{
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->where('residents.ageClassification', '=', $filterAgeGroup)
                                    ->first();
                            }
                            if($residentCheck != NULL){
                                $hhIP++;
                            }
                        }
                    }
                    $dataIP[$sitioName][$I] = $hhIP;
                }

                //NHTS Households
                $dataNHTS[$sitioName] = array();
                foreach($NHTS as $N){
                    if ($filterGender == "" && $filterAgeGroup == "") {
                        $hhNHTS = DB::table('households')
                            ->where('sitioID', '=', $filterSitio)
                            ->where('dateOfVisit', '>=', $dateB)
                            ->where('dateOfVisit', '<=', $dateE)
                            ->where('nHTS', '=', $N)
                            ->count();
                    }else{
                        $hhNHTS = 0;
                        $houseList = Households::where('sitioID', '=', $filterSitio)
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('nHTS', '=', $N)
                                ->get();
                        foreach ($houseList as $HL){
                            //User didn't select Age Group Filter
                            if ($filterAgeGroup == ""){
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->first();
                            //Otherwise
                            }else{
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->where('residents.ageClassification', '=', $filterAgeGroup)
                                    ->first();
                            }
                            if($residentCheck != NULL){
                                $hhNHTS++;
                            }
                        }
                    }
                    $dataNHTS[$sitioName][$N] = $hhNHTS;
                }

                //Water Access
                $dataWater[$sitioName] = array();
                foreach($WaterAccess as $WA){
                    if ($filterGender == "" && $filterAgeGroup == "") {
                        $hhWater = DB::table('households')
                            ->where('sitioID', '=', $filterSitio)
                            ->where('dateOfVisit', '>=', $dateB)
                            ->where('dateOfVisit', '<=', $dateE)
                            ->where('accessToWaterSupply', '=', $WA)
                            ->count();
                    }else{
                        $hhWater = 0;
                        $houseList = Households::where('sitioID', '=', $filterSitio)
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('accessToWaterSupply', '=', $WA)
                                ->get();
                        foreach ($houseList as $HL){
                            //User didn't select Age Group Filter
                            if ($filterAgeGroup == ""){
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->first();
                            //Otherwise
                            }else{
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->where('residents.ageClassification', '=', $filterAgeGroup)
                                    ->first();
                            }
                            if($residentCheck != NULL){
                                $hhWater++;
                            }
                        }
                    }
                    $dataWater[$sitioName][$WA] = $hhWater;   
                }

                //Toilet
                $dataToilet[$sitioName] = array();
                foreach($ToiletFacilities as $TF){
                    //No Gender or/and Age Group Filter Selected
                    if ($filterGender == "" && $filterAgeGroup == "") {
                        $hhToilet = DB::table('households')
                            ->where('sitioID', '=', $filterSitio)
                            ->where('dateOfVisit', '>=', $dateB)
                            ->where('dateOfVisit', '<=', $dateE)
                            ->where('householdToiletFacilities', '=', $TF)
                            ->count();
                    //Otherwise
                    }else{
                        $hhToilet = 0;
                        $houseList = Households::where('sitioID', '=', $filterSitio)
                                ->where('dateOfVisit', '>=', $dateB)
                                ->where('dateOfVisit', '<=', $dateE)
                                ->where('householdToiletFacilities', '=', $TF)
                                ->get();
                        foreach ($houseList as $HL){
                            //User didn't select Age Group Filter
                            if ($filterAgeGroup == ""){
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->first();
                            //Otherwise
                            }else{
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->where('residents.ageClassification', '=', $filterAgeGroup)
                                    ->first();
                            }
                            if($residentCheck != NULL){
                                $hhToilet++;
                            }
                        }
                    }
                    $dataToilet[$sitioName][$TF] = $hhToilet;
                }
            }

            //Household
            $householdCount = array();
            $totalHouseholdCount = 0;
    
            //Household data is added when BOTH Gender and Age Group filters are NOT selected
            if ($filterGender == "" && $filterAgeGroup == "") {
                //When the user didn't select any Sitio in the options
                if ($filterSitio == "") {
                    //puts the household info
                    for($x=2;$x<=$maxValueSitio;$x++) {
                    $sitioName = Sitio::where('id', $x)->value('sitioName');
                    $sumHousehold = DB::table('sitio_counts')->where('statID', $statCheck->id)
                                                             ->where('sitioID', $x)
                                                             ->where('genderGroup', '=', '--')
                                                             ->where('ageGroup', '=', '--')
                                                             ->value('residentCount');
                    $householdCount[] = array('sitio' => $sitioName, 'houseCount' => $sumHousehold);
                    }

                    $totalHouseholdCount = DB::table('sitio_counts')->where('statID', $statCheck->id)
                                        ->where('genderGroup', '=', '--')
                                        ->where('ageGroup', '=', '--')
                                        ->sum('residentCount');
                //Otherwise (Sitio)
                }else{ 
                    $sitioName = Sitio::where('id', $filterSitio)->value('sitioName');
                    $sumHousehold = DB::table('sitio_counts')->where('statID', $statCheck->id)
                                                             ->where('sitioID', $filterSitio)
                                                             ->where('genderGroup', '=', '--')
                                                             ->where('ageGroup', '=', '--')
                                                             ->value('residentCount');
                    $householdCount[] = array('sitio' => $sitioName, 'houseCount' => $sumHousehold);
                    $totalHouseholdCount = $sumHousehold;
                }
            //The user picked either the Gender or Age Group (or both)
            }else{
                //w/o Sitio Filter applied
                if ($filterSitio == ""){
                    //The user selected any Gender or Age Group Filter
                    for($x=2;$x<=$maxValueSitio;$x++){
                        $sitioName = Sitio::where('id', $x)->value('sitioName');
                        $sumHousehold = 0;
                        $houseList = Households::where('sitioID', '=', $x)
                                        ->where('dateOfVisit', '>=', $dateB)
                                        ->where('dateOfVisit', '<=', $dateE)
                                        ->get();
                        foreach ($houseList as $HL){
                            //User didn't select Age Group Filter
                            if ($filterAgeGroup == ""){
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->first();
                            //Otherwise
                            }else{
                                $residentCheck = DB::table('resident_lists')
                                    ->join('households','resident_lists.houseID','=','households.id')
                                    ->join('residents','resident_lists.residentID','=','residents.id')
                                    ->where('resident_lists.houseID', '=', $HL->id)
                                    ->where('residents.dateOfDeath', '=', NULL)
                                    ->where('residents.gender', 'LIKE', "%$filterGender%")
                                    ->where('residents.ageClassification', '=', $filterAgeGroup)
                                    ->first();
                            }
                            if($residentCheck != NULL){
                                $sumHousehold++;
                                $totalHouseholdCount++;
                                }
                        }
                        $householdCount[] = array('sitio' => $sitioName, 'houseCount' => $sumHousehold);
                    }
                //Otherwise
                }else{
                    //The user selected didn't any Age Group Filter
                    $sitioName = Sitio::where('id', $filterSitio)->value('sitioName');
                    $sumHousehold = 0;
                    $houseList = Households::where('sitioID', '=', $filterSitio)
                                    ->where('dateOfVisit', '>=', $dateB)
                                    ->where('dateOfVisit', '<=', $dateE)
                                    ->get();
                    foreach ($houseList as $HL){
                        //User didn't select Age Group Filter
                        if ($filterAgeGroup == ""){
                            $residentCheck = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('resident_lists.houseID', '=', $HL->id)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->first();
                        //Otherwise
                        }else{
                            $residentCheck = DB::table('resident_lists')
                                ->join('households','resident_lists.houseID','=','households.id')
                                ->join('residents','resident_lists.residentID','=','residents.id')
                                ->where('resident_lists.houseID', '=', $HL->id)
                                ->where('residents.dateOfDeath', '=', NULL)
                                ->where('residents.gender', 'LIKE', "%$filterGender%")
                                ->where('residents.ageClassification', '=', $filterAgeGroup)
                                ->first();
                        }
                        if($residentCheck != NULL){
                            $sumHousehold++;
                            $totalHouseholdCount++;
                        }
                    }
                    $householdCount[] = array('sitio' => $sitioName, 'houseCount' => $sumHousehold);
                }
            }
        }

        $pdf = PDF::loadView('pdf.reports', compact('householdCount', 'totalHouseholdCount', 'residentCount', 'totalResidentCount', 'request', 'nameSitio', 'MonthlyIncome', 'dataIncome', 'prInfo', 'EducationAtt', 'dataEducation', 'Pregnancy', 'dataPreg', 'IP', 'dataIP', 'NHTS', 'dataNHTS', 'WaterAccess', 'dataWater', 'ToiletFacilities', 'dataToilet'));
        return $pdf->stream('reports.pdf');
    }
}
