<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountMail;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::where('id', '<', 4)->paginate(5);
        return view('auth.register',compact('roles'));
    
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'date_of_birth' => $request->date_of_birth,
            'contactnumber' => $request->contactnumber,
            'barangay' => $request->barangay,
            'sitio' => $request->sitio,
            'userlevel' => $request->userlevel,
            'userstatus' => $request->userstatus,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->assignRole($request->userlevel);
        event(new Registered($user));

        // Auth::login($user);
        Mail::to($request->email)->send(new AccountMail($user));

        if($user->hasanyrole('Admin|Barangay Captain|Barangay Secretary|Barangay Health Worker')){
            return view('dashboard');
        }else{
            return view('login');
        };
    }
}
