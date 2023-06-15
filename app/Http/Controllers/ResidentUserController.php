<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Sitio;
use App\Models\Resident;
use App\Models\Household;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountMail;

class ResidentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $resident)
    {
        $sitios = Sitio::all();
        return view('auth.createaccount', compact('resident','sitios'));
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

        
        $check_res = DB::table('residents')
                ->where('firstName', '=', $request->firstname)
                ->where('middleName', '=', $request->middlename)
                ->where('lastName', '=', $request->lastname)
                ->where('dateOfBirth', '=', $request->dateOfBirth)
                ->get();

        if(isset($check_res)){
            return view('auth.accountnotice');
        }else{
            foreach($check_res as $verify){ 
                if($verify->firstName == $request->firstname && $verify->middleName == $request->middlename 
                    && $verify->lastName == $request->lastname && $verify->dateOfBirth == $request->dateOfBirth){
                        $user= User::create([
                            'residentID' => $verify->id,
                            'idNumber' => $request->idNumber,
                            'userlevel' => $request->userlevel,
                            'email' => $request->email,
                            'barangay' => $request->barangay,
                            'sitio' => $request->sitio,
                            'contactNumber' => $request->contactnumber,
                            'password' => Hash::make($request->password)
                        ]);
                        $user->assignRole($request->userlevel); //assign account role as User
                        event(new Registered($user)); //send email verification
                        return view('welcome');
                }
            }
        }
        
        // $resident = Resident::create([
        //     'firstname' => $request->firstname,
        //     'middlename' => $request->middlename,
        //     'lastname' => $request->lastname,
        //     'dateOfBirth' => $request->dateOfBirth,
        //     'contactNumber' => $request->contactnumber,
        //     'email' => $request->email,
        // ]);

        // $resident->user()->create([
        //     'idNumber' => $request->idNumber,
        //     'userlevel' => $request->userlevel,
        //     'email' => $request->email,
        //     'barangay' => $request->barangay,
        //     'sitio' => $request->sitio,
        //     'contactNumber' => $request->contactnumber,
        //     'password' => Hash::make($request->password)
        // ]);
        // $resident->user->assignRole($request->userlevel);
        // event(new Registered($resident->user));
        // return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
