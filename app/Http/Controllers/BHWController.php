<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use App\Models\Barangay;
use App\Models\Resident;
use App\Models\ResidentList;
use App\Models\Sitio;
use App\Models\User;
use Illuminate\Http\Request;

class BHWController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bhws = User::where('userlevel','Barangay Health Worker')->paginate();

        foreach ($bhws as $key) {
            $resident=Resident::where('id',$key->residentID)->first();
            $sitio=Sitio::where('id',$key->assignedSitioID)->first();


            $key->firstName=$resident->firstName;
            $key->middleName=$resident->middleName;
            $key->lastName=$resident->lastName;
            $key->assignedSitioName=$sitio->sitioName;

        }
        
        
        return view('bhw.index')->with('bhws',$bhws);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::where('id',$id)->first();
        $personalInfo=Resident::where('id',$user->residentID)->first();
        $sitio=Sitio::where('id',$user->sitioID)->first();
        $barangay=Barangay::where('id',$sitio->barangayID)->first();
        $personalInfo->sitio=$sitio->sitioName;
        $personalInfo->barangay=$barangay->barangayName;
        $sitio=Sitio::where('id',$user->assignedSitioID)->first();
        $personalInfo->assignedSitioName=$sitio->sitioName;


        return view('bhw.show',compact('user','personalInfo'));
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


    public function search(Request $request)
    { 
        $search=$request['search'];
        $bhwsFirstName = Resident::all();
        $bhwsFirstName->makeVisible('firstName');

        foreach($bhwsFirstName as $x=>$bhwFirstName){
            if(strcasecmp($bhwFirstName->firstName,$search) != 0){
                unset($bhwsFirstName[$x]);
            }
        }

        $bhwsLastName = Resident::all();
        $bhwsLastName->makeVisible('lastName');

        foreach($bhwsLastName as $x=>$bhwLastName){
            if(strcasecmp($bhwLastName->lastName,$search) != 0){
                unset($bhwsLastName[$x]);
            }
        }

        $bhwsFullName = Resident::all();
        $bhwsFullName->makeVisible('firstName', 'lastName');

        foreach($bhwsFullName as $x=>$bhwFullName){
            $bhwFullName->fullName = $bhwFullName->firstName . ' ' . $bhwFullName->lastName;
            if(strcasecmp($bhwFullName->fullName,$search) != 0){
                unset($bhwsFullName[$x]);
            }
        }

        $bhws = $bhwsFirstName->concat($bhwsLastName)->concat($bhwsFullName);
        
        foreach($bhws as $x=>$bhw){
            $resident=User::where('residentID',$bhw->id)->first();
            if($resident->userLevel== "Barangay Health Worker") {
                $bhw->id=$resident->id;
                $bhw->idNumber=$resident->idNumber;
                $bhw->userLevel=$resident->userLevel;
                $bhw->updated_at=$resident->updated_at;
                $bhw->userStatus=$resident->userStatus;
                $sitio=Sitio::where('id',$resident->assignedSitioID)->first();
                $bhw->assignedSitioName=$sitio->sitioName;
            }else{
                unset($bhws[$x]);
            }
        }

        return view('bhw.index')->with('bhws',$bhws);
    }

    public function mobileDashboard(){
        $dashboardInfo = Statistics::all()->where('year', 2023);
        //add assigned sitio and barangay

        return $dashboardInfo;

    }

}