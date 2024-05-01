<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Sitio;
use App\Models\Resident;
use App\Models\Statistics;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Facades\Mail;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Storage;
use Svg\Gradient\Stop;

class AuthenticationAPIController extends Controller
{
    public function mobileLogin(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $resident = Resident::where('id', $user->residentID)->first();
        $user->username = $resident->firstName . ' ' . $resident->lastName;
        $image =$this->mobileProfilePic($request);
        $response = ['success' => false];
        
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
            $response = ['user' => $user, 'statistics' => $statistics, 'image' => $image, 'success' => true];
        }else{
            $response = ['user' => $user, 'image' => $image, 'success' => true];
        }
        return response()->json($response, 200);
    }

    
    public function mobileProfilePic(Request $request){
        $user = User::where('id', $request->id)->first();
        $image = Storage::url($user->profileImage);
        $imageUrl = "http://10.0.2.2:8000" . $image;
        return $imageUrl;
    }

    public function sanctumLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'device_name' => 'required',
            'otp' => 'required'
        ]);

        if($request->otp != 'Not Applicable'){
            $details = (new Otp)->validate($request->email, $request->otp);
            if($details->status == false){
                $response = ['message' => 'One Time Pin Failed', 'success' => false];
                return response()->json($response, 200);
            }
        }
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken($request->device_name)->plainTextToken;
        $resident = Resident::where('id', $user->residentID)->first();
        $user->username = $resident->firstName . ' ' . $resident->lastName;
        $response = ['user' => $user, 'token' => $token, 'success' => true];
        return response()->json($response, 200);
    }

    public function mobileOTP(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user != null && $user->userStatus == "Active"){
            if($user && Hash::check($request->password, $user->password)){
                if($user->userLevel == "Barangay Health Worker"){
                    $details = (new Otp)->generate($request->email, 'numeric', 6);
                    Mail::to($request->email)->send(new OTPMail($user));
                    $response = ['otp' => true, 'success' => true];
                    return response()->json($response, 200);
                }else if ($user->userLevel == "User"){
                    $response = ['otp' => false, 'success' => true];
                    return response()->json($response, 200);
                }else{
                    $response = ['message' => 'Features Not Available', 'success' => false];
                    return response()->json($response, 200);
                }
            }else{
                $response = ['message' => 'Incorrect email or password', 'success' => false];
                return response()->json($response, 200);
            }
        }else{
            $response = ['message' => 'Credentials Not Found', 'success' => false];
            return response()->json($response, 200);
        }
    }

}
