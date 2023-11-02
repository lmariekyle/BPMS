<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Sitio;
use App\Models\Resident;
use App\Models\Barangay;
use App\Models\Household;
use App\Models\Document;
use App\Models\AccountInfoChange;
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
use Haruncpi\LaravelIdGenerator\IdGenerator;

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
        $sitios = Sitio::where('barangayID', '2')->get();
        return view('auth.createaccount', compact('resident', 'sitios'));
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
            'profileImage' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        //Auto Generate ID 
        // $residentId = IdGenerator::generate(['table' => 'residents', 'field' => 'id', 'length' => 9, 'prefix' => 'RES-']);
        $userId = IdGenerator::generate(['table' => 'users', 'field' => 'id', 'length' => 6, 'prefix' => date('y')]);

        //Image Upload 
        if ($request->hasFile('profileImage')) {
            $image_name = time() . '.' . $request->profileImage->getClientOriginalExtension();
            $request->profileImage->move(public_path('users'), $image_name);
            $path = "users/" . $image_name;
        } else {
            $path = "users/default.jpg";
        }

        $check_res = DB::table('residents')
            ->where('firstName', '=', $request->firstname)
            ->where('middleName', '=', $request->middlename)
            ->where('lastName', '=', $request->lastname)
            ->where('dateOfBirth', '=', $request->dateOfBirth)
            ->get();


        if ($check_res->isEmpty()) {
            return view('auth.sorry-resident-notice');
        } else {
            foreach ($check_res as $verify) {
                if (
                    $verify->firstName == $request->firstname && $verify->middleName == $request->middlename
                    && $verify->lastName == $request->lastname && $verify->dateOfBirth == $request->dateOfBirth
                ) {
                    $user = User::create([
                        'residentID' => $verify->id,
                        'idNumber' => $userId,
                        'profileImage' => $path,
                        'userlevel' => $request->userlevel,
                        'email' => $request->email,
                        'sitioID' => $request->sitio,
                        'assignedSitioID' => '1',
                        'contactNumber' => $request->contactnumber,
                        'password' => Hash::make($request->password)
                    ]);
                    $user->assignRole($request->userlevel); //assign account role as User
                    event(new Registered($user)); //send email verification
                    return Redirect::back()->with('success', 'Email for registration has been sent!');
                }
            }
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function mobileStore(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'same:passwordConfirm', Rules\Password::defaults()],
        ]);

        $initDate = strtotime($request->dateOfBirth);
        $date = date('Y-m-d', $initDate);

        $check_res = DB::table('residents')
            ->where('firstName', '=', $request->firstName)
            ->where('middleName', '=', $request->middleName)
            ->where('lastName', '=', $request->lastName)
            ->where('dateOfBirth', '=', $date)
            ->get();

        if ($check_res->isEmpty()) {
            return response()->json([
                'success' => false
            ]);
        } else {
            foreach ($check_res as $verify) {
                if (
                    $verify->firstName == $request->firstName && $verify->middleName == $request->middleName
                    && $verify->lastName == $request->lastName && $verify->dateOfBirth == $request->dateOfBirth
                ) {
                    $sitio = Sitio::where('sitioName', $request->sitio)->first();
                    $user = User::create([
                        'residentID' => $verify->id,
                        'idNumber' => $verify->id,
                        'userlevel' => 'User',
                        'email' => $request->email,
                        'sitioID' => $sitio->id,
                        'assignedSitioID' => '1',
                        'contactNumber' => $request->contactNumber,
                        'password' => Hash::make($request->password)
                    ]);
                    $user->assignRole('User'); //assign account role as User
                    event(new Registered($user)); //send email verification
                    return response()->json([
                        'success' => true
                    ]);
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
        $notifications = auth()->user()->unreadNotifications;
        foreach($notifications as $notification){
            $notification->user = User::where('id', $notification->data['transaction']['userID'])->first();
            $notification->resident = Resident::where('id',$notification->user['residentID'])->first();
            $notification->document = Document::where('id',$notification->data['transaction']['documentID'])->first();
        }

        return view('auth.profile',compact('user','personalInfo', 'notifications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('residentID',$id)->first();
        $request = AccountInfoChange::where('userID',$user->id)->first();
        
        return view('auth.updateinfo',compact('user','request'));
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
        $account = AccountInfoChange::where('userID',$id)->first();
        $requested = $request->selectedInformation;
        $user = User::where('id',$id)->first();
        if($request->status == "1"){
            $user->{$requested} = $request->requesteeNewInformation;
            $account->status ='DONE';
            $user->save();
            $account->save();
        }else if($request->status == "2"){
            $account->status ='DONE';
            $user->save();
        }
        return back();
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
