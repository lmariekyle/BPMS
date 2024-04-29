<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use App\Models\Barangay;
use App\Models\Resident;
use App\Models\ResidentList;
use App\Models\Sitio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BHWController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bhws = User::where('userlevel','Barangay Health Worker')->paginate(10);

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
        if(empty($search)){
            return $this->index();
        }

        $bhws = [];

        $resultbhws = User::where('userlevel','Barangay Health Worker')->paginate(10);

        foreach($resultbhws as $bhw){
            $resident = Resident::where('id', $bhw->residentID)->first();
            $resident->makeVisible('firstName');
            $resident->makeVisible('middleName');
            $resident->makeVisible('lastName');
            $fullName = $resident->firstName . ' ' . $resident->lastName;
            if (Str::contains(strtolower($fullName), strtolower($search))){
                $sitio=Sitio::where('id',$bhw->assignedSitioID)->first();
                $bhw->firstName = $resident->firstName;
                $bhw->middleName = $resident->middleName;
                $bhw->lastName = $resident->lastName;
                $bhw->assignedSitioName=$sitio->sitioName;
                $bhws[] = $bhw;
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