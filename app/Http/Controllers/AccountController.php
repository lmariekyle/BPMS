<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Barangay;
use App\Models\Resident;
use App\Models\ResidentList;
use App\Models\Sitio;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '>', 1)->paginate(10);
        

        foreach ($users as $key) {
            $resident = Resident::where('id', $key->residentID)->first();
            $key->firstName = $resident->firstName;
            $key->middleName = $resident->middleName;
            $key->lastName = $resident->lastName;
        }
        return view('accounts.index')->with('accounts',$users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::where('id', $id)->first();
        $personalInfo = Resident::where('id', $user->residentID)->first();
        $sitio = Sitio::where('id', $user->sitioID)->first();
        $barangay = Barangay::where('id', $sitio->barangayID)->first();
        $personalInfo->sitio = $sitio->sitioName;
        $personalInfo->barangay = $barangay->barangayName;

        return view('accounts.show', compact('user', 'personalInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sitios = Sitio::where('barangayID', '2')->get();
        $roles = Role::where('id', '<', 4)->paginate(5);
        $user = User::where('id', $id)->first();
        $personalInfo = Resident::where('id', $user->residentID)->first();
        $sitio = Sitio::where('id', $user->sitioID)->first();
        $barangay = Barangay::where('id', $sitio->barangayID)->first();
        $personalInfo->sitio = $sitio->sitioName;
        $personalInfo->barangay = $barangay->barangayName;

        return view('accounts.edit', compact('user', 'personalInfo', 'sitios', 'roles'));
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
        // dd($request->all());
        $request->validate([
            'firstname' => ['regex:/^[a-zA-Z\s]+$/u','max:24'],
            'middlename' => ['nullable', 'regex:/^[a-zA-Z\s]+$/u', 'max:18'],
            'lastname' => ['regex:/^[a-zA-Z\s]+$/u','max:18'],
            'email' => ['required', 'string', 'email', 'max:255'],
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

        // $image_name=$request->file('profileImage')->getClientOriginalName();
        // dd($image_name);

        $user = User::where('id', $request->id)->first();

        if ($request->hasFile('profileImage')) {
            // unlink($user->profileImage);
            $image_name = time() . '.' . $request->profileImage->getClientOriginalExtension();
            $request->profileImage->move(public_path('users'), $image_name);
            $path = "users/" . $image_name;
        } else {
            $path = $user->profileImage;
        }

        if ($request->has('userLevel') && $request->userLevel !== null){
            $user->removeRole($user->userLevel); 
            $user->userLevel = $request->userLevel;
            $user->assignRole($request->userLevel);
            $user->idNumber = $this->idNumber($request->userLevel);
        }

        $user->profileImage = $path;
        $user->contactNumber = $request->contactNumber;
        $user->email = $request->email;
        $user->userLevel = $request->userLevel;
        $user->revisedBy = $id;
        $user->sitioID = $request->sitio;
        $user->save();

        $resident = Resident::where('id', $user->residentID)->first();
        $resident->firstName = $request->firstName;
        $resident->middleName = $request->middleName;
        $resident->lastName = $request->lastName;
        $resident->dateOfBirth = $request->dateOfBirth;

        $resident->save();

        $personalInfo = Resident::where('id', $user->residentID)->first();
        $sitio = Sitio::where('id', $user->sitioID)->first();
        $barangay = Barangay::where('id', $sitio->barangayID)->first();
        $personalInfo->sitio = $sitio->sitioName;
        $personalInfo->barangay = $barangay->barangayName;

        // return redirect('accounts.show',compact('user','personalInfo'))->with('success','Account has been Updated!');
        return Redirect::back()->with('success', 'Account has been Updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::where('id', $request->userID)->first();

        if ($user->userStatus == 'Active') {
            $user->reasonForArchive = $request->reason;
            $user->userStatus = "Archived";
            $user->isArchived = 1;
            $user->archivedBy = $id;
            $user->archiveDate = Carbon::now();
            $user->save();
            return redirect('/accounts')->with('success', 'User has been archived');
        } elseif ($user->userStatus == 'Archived' && $request->reason == 'Active') {
            $user->reasonForArchive = "Account is Active";
            $user->userStatus = "Active";
            $user->isArchived = 0;
            $user->archiveDate = NULL;
            $user->save();
            return redirect('/accounts')->with('success', 'User has been unarchived');
        }
        // $user->password=Hash::make('not active anymore'); /* temporary solution to 'deactivate' account*/

        // return view('accounts.index')->with('success', 'Account Archived');
    }

    public function search(Request $request)
    {
        $search=$request['search'];
        $users = [];
        $usersFirstName = Resident::all();
        $usersFirstName->makeVisible('firstName');

        foreach($usersFirstName as $x=>$userFirstName){
            if(strcasecmp($userFirstName->firstName,$search) != 0){
                unset($usersFirstName[$x]);
            }
        }

        $usersLastName = Resident::all(); 
        $usersLastName->makeVisible('lastName');

        foreach($usersLastName as $x=>$userLastName){
            if(strcasecmp($userLastName->lastName,$search) != 0){
                unset($usersLastName[$x]);
            }
        }

        $usersFullName = Resident::all(); 
        $usersFullName->makeVisible('firstName', 'lastName');

        foreach($usersFullName as $x=>$userFullName){
            $userFullName->fullName = $userFullName->firstName . ' ' . $userFullName->lastName;
            if(strcasecmp($userFullName->fullName,$search) != 0){
                unset($usersFullName[$x]);
            }
        }

        $usersName = $usersFirstName->concat($usersLastName)->concat($usersFullName);
        $usersName->makeVisible('firstName', 'middleName', 'lastName');

        if($usersName->isNotEmpty()){
            foreach ($usersName as $user) {
                $resident = User::where('residentID', $user->id)->first();
                $user->idNumber = $resident->idNumber;
                $user->userLevel = $resident->userLevel;
                $user->updated_at = $resident->updated_at;
                $user->userStatus = $resident->userStatus;
            }
            $users = $usersName;
        }
        
        if($search != NULL){
            $userLevel = User::where('userLevel', 'LIKE', "%$search%")->get();
        
            if($userLevel->isNotEmpty()){
                foreach($userLevel as $user){
                    $resident = Resident::where('id', $user->residentID)->first();
                    $resident->makeVisible('firstName', 'middleName', 'lastName');
                    $user->firstName = $resident->firstName;
                    $user->middleName = $resident->middleName;
                    $user->lastName = $resident->lastName;
                }
                if($usersName->isNotEmpty()){
                    $users = $usersName->concat($userLevel);
                }else{
                    $users = $userLevel;
                }
            }else{
                unset($userLevel);
            }
        }
        
        return view('accounts.index')->with('accounts', $users);
    }

    public function mobileUserData(Request $request)
    {
        $request->validate([
            'residentID' => 'required',
            'email' => 'required',
        ]);

        $userData = Resident::where('id', $request->residentID)->first();
        $userData->makeVisible('firstName', 'middleName', 'lastName', 'contactNumber');
        $userData->email = $request->email;
        $userData->success = true;

        return $userData;
    }
}
