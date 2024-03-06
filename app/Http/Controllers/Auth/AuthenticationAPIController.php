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

            $quarter = 1;
            $statistic = null;
            $year =  Statistics::max('year');
            $statisticsYear = Statistics::where('year', $year)->get();
            foreach($statisticsYear as $statistics){
                if($statistics->quarter > $quarter){
                    $statistic = $statistics;
                    $quarter = $statistic->quarter;
                }
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