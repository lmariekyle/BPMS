<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Sitio;
use App\Models\Barangay;
use App\Models\Resident;
use App\Models\Household;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountMail;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RegisteredUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::where('id', '<', 4)->paginate(5);
        $sitios = Sitio::where('barangayID','2')->get();
        return view('auth.register',compact('roles','sitios'));
    
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
            'profileImage' => ['image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);
        
 

        $residentId = IdGenerator::generate(['table' => 'residents','field'=>'id', 'length' => 9, 'prefix' =>'RES-']);
        
        // $image_name = time().'.'.$request->profileImage->extension();
        // $request->profileImage->move(public_path('users'),$image_name);
        // $path="users/".$image_name;

        if ($request->hasFile('profileImage')){
            $image_name = time().'.'.$request->profileImage->getClientOriginalExtension();
            $request->profileImage->move(public_path('users'),$image_name);
            $path="users/".$image_name;
        }else{
            $path="users/default.jpg";
        }

        $resident = Resident::create([
            'id'=> $residentId,
            'firstName' => $request->firstname,
            'middleName' => $request->middlename,
            'lastName' => $request->lastname,
            'dateOfBirth' => $request->dateOfBirth,
            'contactNumber' => $request->contactnumber,
            'email' => $request->email,
        ]);

        if($request->userlevel == "Barangay Captain"){
            $userId = IdGenerator::generate(['table' => 'users','field'=>'idNumber', 'length' => 6, 'prefix' =>'C-']);
        }else if($request->userlevel == "Barangay Secretary"){
            $userId = IdGenerator::generate(['table' => 'users','field'=>'idNumber', 'length' => 6, 'prefix' =>'S-']);
        }else if($request->userlevel == "Barangay Health Worker"){
            $userId = IdGenerator::generate(['table' => 'users','field'=>'idNumber', 'length' => 6, 'prefix' =>'B-']);
        }else{
            $userId = IdGenerator::generate(['table' => 'users','field'=>'idNumber', 'length' => 6, 'prefix' =>date('y')]);
        };

        $resident->user()->create([
            'idNumber' => $userId,
            'profileImage' => $path,
            'userlevel' => $request->userlevel,
            'email' => $request->email,
            'sitioID' => $request->sitio,
            'assignedSitioID' => '1',
            'contactNumber' => $request->contactnumber,
            'password' => Hash::make($request->password)
        ]);
        $resident->user->assignRole($request->userlevel);


        event(new Registered($resident->user));

        // Auth::login($user);
        Mail::to($request->email)->send(new AccountMail($resident->user));
        return Redirect::back()->with('success','Email for registration has been sent!');
    }
}