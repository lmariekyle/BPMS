<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Sitio;
use App\Models\Resident;
use App\Models\Barangay;
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
use Illuminate\Support\Facades\Redirect;

class ResidentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $resident)
    {
        $sitios = Sitio::where('barangayID','2')->get();
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

                
        if($check_res->isEmpty()){
            return view('auth.sorry-resident-notice');
        }else{
            foreach($check_res as $verify){ 
                if($verify->firstName == $request->firstname && $verify->middleName == $request->middlename 
                    && $verify->lastName == $request->lastname && $verify->dateOfBirth == $request->dateOfBirth){
                        $user= User::create([
                            'residentID' => $verify->id,
                            'idNumber' => $request->idNumber,
                            'userlevel' => $request->userlevel,
                            'email' => $request->email,
                            'sitioID' => $request->sitio,
                            'assignedSitioID' => '1',
                            'contactNumber' => $request->contactnumber,
                            'password' => Hash::make($request->password)
                        ]);
                        $user->assignRole($request->userlevel); //assign account role as User
                        event(new Registered($user)); //send email verification
                        return Redirect::back()->with('success','Email for registration has been sent!');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::id();
        $user=User::where('id',$id)->first();
        $personalInfo=Resident::where('id',$user->residentID)->first();
        $sitio=Sitio::where('id',$user->sitioID)->first();
        $barangay=Barangay::where('id',$sitio->barangayID)->first();
        $personalInfo->sitio=$sitio->sitioName;
        $personalInfo->barangay=$barangay->barangayName;

        return view('auth.profile',compact('user','personalInfo'));
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
