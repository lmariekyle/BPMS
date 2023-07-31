<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response = ['user' => $user, 'token' => $token, 'success' => true];
            return response()->json($response, 200);
        }else{
            $response = ['message' => 'Incorrect email or password', 'success' => false];
            return response()->json($response, 400);
        }
    }
}
