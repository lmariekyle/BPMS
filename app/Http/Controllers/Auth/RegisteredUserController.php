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
use Carbon\Carbon;
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
        $user = User::where('id', $id)->first();
        $personalInfo = Resident::where('id', $user->residentID)->first();
        $sitio = Sitio::where('id', $user->sitioID)->first();
        $barangay = Barangay::where('id', $sitio->barangayID)->first();
        $personalInfo->sitio = $sitio->sitioName;
        $personalInfo->barangay = $barangay->barangayName;

        return view('auth.profile', compact('user', 'personalInfo'));
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::where('id', '<', 4)->paginate(5);
        $sitios = Sitio::where('barangayID', '2')->get();
        return view('auth.register', compact('roles', 'sitios'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function idNumber($role){
        if($role == "Barangay Captain"){
            $id = IdGenerator::generate(['table' => 'users','field'=>'idNumber', 'length' => 6, 'prefix' =>'C-']);
        }else if($role == "Barangay Secretary"){
            $id = IdGenerator::generate(['table' => 'users','field'=>'idNumber', 'length' => 6, 'prefix' =>'S-']);
        }else if($role == "Barangay Health Worker"){
            $id = IdGenerator::generate(['table' => 'users','field'=>'idNumber', 'length' => 6, 'prefix' =>'B-']);
        }
        return $id;
    }


    public function store(Request $request)
    {

        $request->validate([
            'firstname' => ['required','regex:/^[a-zA-Z\s]+$/u','max:24'],
            'middlename' => ['nullable', 'regex:/^[a-zA-Z\s]+$/u', 'max:18'],
            'lastname' => ['required','regex:/^[a-zA-Z\s]+$/u','max:18'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'profileImage' => ['image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'dateOfBirth' => 'required|date|before:' . Carbon::now()->subYears(18),
            'contactNumber' => ['required', 'numeric', 'digits:11',new \App\Rules\StartsWith09],
        ],
        [
            'firstname.regex' => 'Use only alphabetical characters in your first name',
            'middlename.regex' => 'Use only alphabetical characters in your middle name',
            'lastname.regex' => 'Use only alphabetical characters in your last name',
            'contactNumber.required' =>'Invalid Contact Number',
            'dateOfBirth.before' => 'User must be 18 Years Old and Above to Register!',
            'profileImage.required' => 'File Types must only be jpeg, png, jpg'
        ]);



        $residentId = IdGenerator::generate(['table' => 'residents','field'=>'residentID', 'length' => 9, 'prefix' =>'RES-']);
        
        // $image_name = time().'.'.$request->profileImage->extension();
        // $request->profileImage->move(public_path('users'),$image_name);
        // $path="users/".$image_name;

        if ($request->hasFile('profileImage')) {
            $image_name = time() . '.' . $request->profileImage->getClientOriginalExtension();
            $request->profileImage->move(public_path('users'), $image_name);
            $path = "users/" . $image_name;
        } else {
            $path = "users/default.jpg";
        }


    if ($request->has('middlename') && $request->middlename !== null) {
            // The middlename input is present and not null
            $resident = Resident::create([
                'residentID'=> $residentId,
                'firstName' => $request->firstname,
                'middleName' => $request->middlename,
                'lastName' => $request->lastname,
                'dateOfBirth' => $request->dateOfBirth,
                'contactNumber' => $request->contactNumber,
                'email' => $request->email,
            ]);
        } else {
            // The middlename input is either absent or null
            $resident = Resident::create([
                'residentID'=> $residentId,
                'firstName' => $request->firstname,
                'middleName' => 'N/A',
                'lastName' => $request->lastname,
                'dateOfBirth' => $request->dateOfBirth,
                'contactNumber' => $request->contactNumber,
                'email' => $request->email,
            ]);
        }

        if ($request->userlevel == "Barangay Captain") {
            $lastCaptain = User::where('userlevel', 'Barangay Captain')->orderBy('idNumber', 'desc')->first();
            $lastId = $lastCaptain ? (int)substr($lastCaptain->idNumber, 2) : 0;
            $userId = 'C-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        } else if ($request->userlevel == "Barangay Secretary") {
            $lastSecretary = User::where('userlevel', 'Barangay Secretary')->orderBy('idNumber', 'desc')->first();
            $lastId = $lastSecretary ? (int)substr($lastSecretary->idNumber, 2) : 0;
            $userId = 'S-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        } else if ($request->userlevel == "Barangay Health Worker") {
            $lastWorker = User::where('userlevel', 'Barangay Health Worker')->orderBy('idNumber', 'desc')->first();
            $lastId = $lastWorker ? (int)substr($lastWorker->idNumber, 2) : 0;
            $userId = 'B-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        } else {
            // For other user levels, you can use the current year as a prefix
            $yearPrefix = date('y');
            $lastUser = User::where('userlevel', '<>', 'Barangay Captain')
                             ->where('userlevel', '<>', 'Barangay Secretary')
                             ->where('userlevel', '<>', 'Barangay Health Worker')
                             ->where('idNumber', 'like', $yearPrefix . '%')
                             ->orderBy('idNumber', 'desc')
                             ->first();
            $lastId = $lastUser ? (int)substr($lastUser->idNumber, 2) : 0;
            $userId = $yearPrefix . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        }


        $resident->user()->create([
            'residentID' => $resident->id,
            'idNumber' => $userId,
            'residentID' => $resident->id,
            'profileImage' => $path,
            'userlevel' => $request->userlevel,
            'email' => $request->email,
            'sitioID' => $request->sitio,
            'assignedSitioID' => '1',
            'contactNumber' => $request->contactNumber,
            'password' => Hash::make($request->password)
        ]);
        $resident->user->assignRole($request->userlevel);


        event(new Registered($resident->user));
        Mail::to($request->email)->send(new AccountMail($resident->user));
        return Redirect::back()->with('success', 'Email verification has been sent');
    }
}
