<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Sitio;
use App\Models\Resident;
use App\Models\Statistics;
use DB;
use Carbon\Carbon;

class AuthenticationAPIController extends Controller
{
    public function mobileLogin(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $resident = Resident::where('id', $user->residentID)->first();
        $user->username = $resident->firstName . ' ' . $resident->lastName;
        if($user->userLevel == "Barangay Health Worker"){
            $sitio = Sitio::where('id', $user->assignedSitioID)->first();
            $user->assignedSitio  = $sitio->sitioName;

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
            $statistic = null;
            //if the statistics for the current period does not exist.
            if($statistics == NULL){
                //if the new statistics is the first for the year (Year: 2024 | Date: 01/01->03/31)
                    $quarter = 1;
                    $year =  Statistics::max('year');
                    $statisticsYear = Statistics::where('year', $year)->get();
                    foreach($statisticsYear as $statistics){
                        if($statistics->quarter > $quarter){
                            $statistic = $statistics;
                            $quarter = $statistic->quarter;
                        }
                    }
            }else{               
                $statistic = $statistics;
            }
            $response = ['user' => $user, 'statistics' => $statistic,'success' => true];
        }else{
            $response = ['user' => $user, 'success' => true];
        }
        return response()->json($response, 200);
    }

    public function sanctumLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            $token = $user->createToken($request->device_name)->plainTextToken;
            $resident = Resident::where('id', $user->residentID)->first();
            $user->username = $resident->firstName . ' ' . $resident->lastName;
            $response = ['user' => $user, 'token' => $token, 'success' => true];
            return response()->json($response, 200);
        }else{
            $response = ['message' => 'Incorrect email or password', 'success' => false];
            return response()->json($response, 200);
        }
    }
}
