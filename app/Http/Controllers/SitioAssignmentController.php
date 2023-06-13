<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\ResidentList;
use App\Models\Sitio;
use App\Models\User;
use Illuminate\Http\Request;

class SitioAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bhws = User::where('userlevel','Barangay Health Worker')->get();
        $sitios= Sitio::where('barangayID','2')->get();
                                    
        foreach ($bhws as $key) {
            $resident=Resident::where('id',$key->residentID)->first();

            $key->firstname=$resident->firstName;
            $key->middlename=$resident->middleName;
            $key->lastname=$resident->lastName;

            $assignedSitio=Sitio::where('id',$key->assignedSitioID)->first();
            $key->assignedSitio=$assignedSitio->sitioName;

        }
        
        return view('bhw.assign',compact('bhws','sitios'));
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
        //
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
        foreach ($request->bhw as $key) {
            $bhw=User::where('id',$request->bhw[$key])->first();
            $bhw->assignedSitioID=$request->sitio[$key];
            
            $bhw->update();
        }
        
        return redirect()->back();
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
