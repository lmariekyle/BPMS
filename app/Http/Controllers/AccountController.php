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
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

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
        // $users = User::where('id', '>', 1)->get();

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
        $personalInfo->makeVisible('firstName','lastName');
        $sitio = Sitio::where('id', $user->sitioID)->first();
        $barangay = Barangay::where('id', $sitio->barangayID)->first();
        $personalInfo->sitio = $sitio->sitioName;
        $personalInfo->barangay = $barangay->barangayName;
        
        if($user->archivedBy !== NULL){
            $archived = User::where('id',$user->archivedBy)->first();
            $archivedBy =Resident::where('id', $archived->residentID)->first();
            $archivedBy->makeVisible('firstName','lastName');
            return view('accounts.show', compact('user', 'personalInfo','archivedBy'));
        }else{
            return view('accounts.show', compact('user', 'personalInfo'));
        }
        
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

        // if ($request->has('userLevel') && $request->userLevel !== null){
        //     $user->removeRole($user->userLevel); 
        //     $user->userLevel = $request->userLevel;
        //     $user->assignRole($request->userLevel);
        //     $user->idNumber = $this->idNumber($request->userLevel);
        // }

        $user->profileImage = $path;
        $user->contactNumber = $request->contactNumber;
        $user->email = $request->email;
        // $user->userLevel = $request->userLevel;
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

    // public function search(Request $request)
    // {
    //     $search=$request['search'];
    //     if(empty($search)){
    //         return $this->index();
    //     }

    //     $users = [];

    //     //$resultUsers = User::where('id', '>', 1)->paginate(10);
    //     $resultUsers = User::where('id', '>', 1)->get();
    //     //$resultUsers = User::all();
    //     foreach($resultUsers as $user){
    //         $resident = Resident::where('id', $user->residentID)->first();
    //         $resident->makeVisible('firstName');
    //         $resident->makeVisible('middleName');
    //         $resident->makeVisible('lastName');
    //         $fullName = $resident->firstName . ' ' . $resident->lastName;
    //         if (Str::contains(strtolower($fullName), strtolower($search))){
    //             $user->firstName = $resident->firstName;
    //             $user->middleName = $resident->middleName;
    //             $user->lastName = $resident->lastName;
    //             $users[] = $user;
    //         }
    //     }
    //     //$users = $this->paginate($users);
    //     return view('accounts.index')->with('accounts', $users);
    // }

    public function search(Request $request)
{
    $search = $request->input('search');
    
    // If search term is empty, return to the index page
    if(empty($search)){
        return $this->index();
    }

    // Initialize an empty array to store users
    $users = [];

    // Get the initial set of users based on your criteria
    $resultUsers = User::where('id', '>', 1)->get();

    // Loop through each user and perform the search
    foreach($resultUsers as $user){
        $resident = Resident::where('id', $user->residentID)->first();
        $resident->makeVisible(['firstName', 'middleName', 'lastName']);
        $fullName = $resident->firstName . ' ' . $resident->lastName;
        
        // If the full name contains the search term, add the user to the $users array
        if (Str::contains(strtolower($fullName), strtolower($search))){
            $user->firstName = $resident->firstName;
            $user->middleName = $resident->middleName;
            $user->lastName = $resident->lastName;
            $users[] = $user;
        }
    }

    // Paginate the $users array
    $perPage = 10; // Number of items per page
    $page = $request->input('page', 1); // Get the current page from the request, default to 1 if not provided

    // Use Laravel's Collection class to create a collection from the array
    $usersCollection = collect($users);

    // Paginate the collection
    $paginatedUsers = $usersCollection->slice(($page - 1) * $perPage, $perPage)->all();

    // Create a paginator instance
    $paginator = new LengthAwarePaginator(
        $paginatedUsers, // Items for the current page
        count($usersCollection), // Total count of all items
        $perPage, // Items per page
        $page, // Current page
        ['path' => $request->url(), 'query' => $request->query()] // Additional options for the paginator
    );

    return view('accounts.index')->with('accounts', $paginator);
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
