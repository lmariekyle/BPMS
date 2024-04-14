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
use App\Rules\StartsWith09;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Crypt;


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

    public function getUserInfo()
    {
        $user = Auth::user();
        $resId = $user->residentID;
        // Fetch related information
        $relatedInfo = Resident::find($resId);
        $relatedInfo->makeVisible('firstName', 'middleName', 'lastName','contactNumber');
        return response()->json(['user' => $user,'relatedInfo' => $relatedInfo]);
    }

    public function generateID(){

       return $userId = IdGenerator::generate(['table' => 'users', 'field' => 'id', 'length' => 6, 'prefix' => date('y')]);

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
            'firstname' => ['required','regex:/^[a-zA-Z]+$/u','max:12'],
            'middlename' => ['regex:/^[a-zA-Z]+$/u','max:18'],
            'lastname' => ['required','regex:/^[a-zA-Z]+$/u','max:18'],
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

        //Auto Generate ID 
        // $residentId = IdGenerator::generate(['table' => 'residents', 'field' => 'id', 'length' => 9, 'prefix' => 'RES-']);
        $userId = $this->generateID();
        //Image Upload 
        if ($request->hasFile('profileImage')) {
            $image_name = time() . '.' . $request->profileImage->getClientOriginalExtension();
            $request->profileImage->move(public_path('users'), $image_name);
            $path = "users/" . $image_name;
        } else {
            $path = "users/default.jpg";
        }
        

        $residents = Resident::all();
        $residents->makeVisible('firstName', 'middleName', 'lastName');

        $check_res = $residents->first(function ($resident) use ($request) {
            return (
                $resident->firstName == $request->firstname &&
                $resident->lastName == $request->lastname &&
                $resident->dateOfBirth == $request->dateOfBirth
            );
        });


        if ($check_res == null) {
            return view('auth.sorry-resident-notice');
        } else {
        
                    $user = User::create([
                        'residentID' => $check_res->id,
                        'idNumber' => $userId,
                        'profileImage' => $path,
                        'userlevel' => $request->userlevel,
                        'email' => $request->email,
                        'sitioID' => $request->sitio,
                        'assignedSitioID' => '1',
                        'contactNumber' => $request->contactNumber,
                        'password' => Hash::make($request->password)
                    ]);
                    $user->assignRole($request->userlevel); //assign account role as User
                    event(new Registered($user)); //send email verification
                    return Redirect::back()->with('success', 'Email verification has been sent');
                
           
        }

        // $check_res = DB::table('residents')
        // ->where('firstName', '=', $request->firstname)
        // ->where('middleName', '=', $request->middlename)
        // ->where('lastName', '=', $request->lastname)
        // ->where('dateOfBirth', '=', $request->dateOfBirth)
        // ->get();

        // $encryptionKey = base64_encode("qlIB9vAI/CHU1GdxywbhbPM8GNH2vLVtw10AyY5dELE=");

        // $check_res = DB::table('residents')
        // ->where(DB::raw("AES_DECRYPT(firstName, '{$encryptionKey}')"), '=', $request->firstname)
        // ->where(DB::raw("AES_DECRYPT(middleName, '{$encryptionKey}')"), '=', $request->middlename)
        // ->where(DB::raw("AES_DECRYPT(lastName, '{$encryptionKey}')"), '=', $request->lastname)
        // ->where('dateOfBirth', '=', $request->dateOfBirth)
        // ->get();
        


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

        $userId = $this->generateID();
        $initDate = strtotime($request->dateOfBirth);
        $date = date('Y-m-d', $initDate);

        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                if ($file->isValid()) {
                    $image_name = time() .  '.' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public', $image_name);
                    $file->move(public_path('users'), $image_name);
                    $pathImage = "users/" . $image_name;
                }
            }
            $path = $pathImage;
        } else {
            $path = "users/default.jpg";
        }

        $residents = Resident::all();
        $residents->makeVisible('firstName');
        $residents->makeVisible('lastName');
        
        $check_res = $residents->first(function ($resident) use ($request) {
            return (
                strcasecmp($resident->firstName, $request->firstName) == 0 &&
                strcasecmp($resident->lastName, $request->lastName) == 0 &&
                $resident->dateOfBirth == $request->dateOfBirth
            );
        });

        if ($check_res == null) {
            return response()->json([
                'success' => false
            ]);
        } else {
                
            $sitio = Sitio::where('sitioName', $request->sitio)->first();
            $user = User::create([
                'residentID' => $check_res->id,
                'idNumber' => $userId,
                'profileImage' => $path,
                'userlevel' => 'User',
                'email' => $request->email,
                'sitioID' => $sitio->id,
                'assignedSitioID' => '1',
                'contactNumber' => $request->contactNumber,
                'password' => Hash::make($request->password), 
            ]);
            $user->assignRole('User'); //assign account role as User
            event(new Registered($user)); //send email verification
            return response()->json([
                'success' => true
            ]);
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
        $notifications = auth()->user()->unreadNotifications->take(5);
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
        
        $request = AccountInfoChange::where('id',$id)->first();
        $user = User::where('id',$request->userID)->first();
        if ($request->file) {
            $filePaths = json_decode($request->file, true);
        } else {
            $filePaths = [];
        }   

        return view('auth.updateinfo',compact('user','request','filePaths'));
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
        $account = AccountInfoChange::where('id',$id)->first();
        $user = User::where('id',$account->userID)->first();
        $requested = $request->selectedInformation;
        $resident = Resident::where('id', $user->residentID)->first();
        if($request->status == "1"){        
            $resident->{$requested} = $request->requesteeNewInformation;
            if($requested == "email" || $requested == "contactNumber"){
                $user->{$requested} = $request->requesteeNewInformation;
            }
            $account->status ='DONE';
            $resident->save();
            $user->save();
            $account->save();
            return Redirect::back()->with('success', 'Account Updated');
        }else if($request->status == "2"){
            $account->status ='DENIED';
            $account->save();
            return Redirect::back();
        }
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
