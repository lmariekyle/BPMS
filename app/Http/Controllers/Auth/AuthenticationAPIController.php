<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Sitio;
use DB;
use Carbon\Carbon;

class AuthenticationAPIController extends Controller
{
    public function mobileLogin(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required|string',
        ];
        $request->validate($rules);

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            $token = $user->createToken($user->residentID)->plainTextToken;
            if($user->userLevel == "Barangay Health Worker"){
                $quarter = 1;
                $year = Carbon::now()->format('Y');
                $sitio = Sitio::where('id', $user->assignedSitioID)->first();
                $user->assignedSitioID  = $sitio->sitioName;

                $statistic = null;
                $statistics=DB::select('select * from statistics where year = ' . $year ); 
                foreach($statistics as $stat){
                    if($stat->quarter > $quarter){
                        $statistic = $stat;
                        $quarter = $stat->quarter;
                    }
                }

                $response = ['user' => $user, 'statistics' => $statistic,'token' => $token, 'success' => true];
            }else{
                $response = ['user' => $user, 'token' => $token, 'success' => true];
            }
            return response()->json($response, 200);
        }else{
            $response = ['message' => 'Incorrect email or password', 'success' => false];
            return response()->json($response, 400);
        }
    }

    public function mobileLogout(Request $request){
        $rules = [
            'residentID' => 'required',
        ];
        $request->validate($rules);

        $token = DB::select('delete from personal_access_tokens where name = ' . $request->residentID); 
        $token = DB::select('select * from personal_access_tokens where name = ' . $request->residentID); 
        if($token == null){

            return $response = ['success' => true];
        }else{
            return $response = ['success' => false];
        }
    }
}
