<?php

namespace App\Http\Controllers;

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

        $request->validate([
            'profileImage' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
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

        $user->profileImage = $path;
        $user->contactNumber = $request->contactNumber;
        $user->email = $request->email;
        $user->userLevel = $request->userLevel;
        $user->revisedBy = $id;
        $user->sitioID = $request->sitio;

        $user->assignRole($request->userLevel);
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
        } elseif ($user->userStatus == 'Archived' && $request->reason == 'Active') {
            $user->reasonForArchive = "Account is Active";
            $user->userStatus = "Active";
            $user->isArchived = 0;
            $user->archiveDate = NULL;
        }
        // $user->password=Hash::make('not active anymore'); /* temporary solution to 'deactivate' account*/

        $user->save();

        return redirect('/accounts')->with('success', 'Account Archived');
    }

    public function search(Request $request)
    {
        $search = $request['search'];
        $users = Resident::where('firstName', 'LIKE', "%$search%")->orWhere('lastName', 'LIKE', "%$search%")->paginate(10);

        foreach ($users as $user) {
            $resident = User::where('residentID', $user->id)->first();
            $user->idNumber = $resident->idNumber;
            $user->userLevel = $resident->userLevel;
            $user->updated_at = $resident->updated_at;
            $user->userStatus = $resident->userStatus;
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
        $userData->makeVisible('firstName', 'middleName', 'lastName');
        $userData->email = $request->email;
        $userData->success = true;

        return $userData;
    }
}
