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

        foreach ($bhws as $bhw) {
            $resident=Resident::where('id',$bhw->residentID)->first();

            $bhw->firstname=$resident->firstName;
            $bhw->middlename=$resident->middleName;
            $bhw->lastname=$resident->lastName;

            $assignedSitio=Sitio::where('id',$bhw->assignedSitioID)->first();
            $bhw->assignedSitio=$assignedSitio->sitioName;

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
        $count=count($request->bhwID);
        for($x=0;$x<$count;$x++){
            $bhw=User::where('id',$request->bhwID[$x])->first();
            $bhw->fill([
                'assignedSitioID' => $request->sitio[$x],
                'revisedBy' => $id,
            ]);
            $bhw->save();
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