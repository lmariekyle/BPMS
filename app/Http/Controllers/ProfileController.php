<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function change_password()
    {
        return view('auth.change-password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'old_password' => ['required', Rules\Password::defaults()],
            'new_password' => ['required', Rules\Password::defaults()],
            'confirm_password' => ['required', Rules\Password::defaults()],
        ]);

        $current_user = auth()->user();

        if (Hash::check($request->old_password, $current_user->password)) {
            $current_user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return view('auth.login')->with('success', 'Password Successfully Changed!');
        } else {
            return Redirect::back()->with('error', 'Old Password does not match!');
        }
    }
}
