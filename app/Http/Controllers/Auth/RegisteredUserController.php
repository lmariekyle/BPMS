<?php

namespace App\Http\Controllers\Auth;

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
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountMail;

class RegisteredUserController extends Controller
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
        ]);


        $resident = Resident::create([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'dateOfBirth' => $request->dateOfBirth,
            'contactNumber' => $request->contactnumber,
            'email' => $request->email,
        ]);

        $resident->user()->create([
            'idNumber' => $request->idNumber,
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
