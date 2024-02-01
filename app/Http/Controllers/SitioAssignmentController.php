<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\Households;
use App\Models\Sitio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            $bhw->firstName=$resident->firstName;
            $bhw->middleName=$resident->middleName;
            $bhw->lastName=$resident->lastName;

            $assignedSitio=Sitio::where('id',$bhw->assignedSitioID)->first();
            $bhw->assignedSitio=$assignedSitio->sitioName;

        }
        
        return view('bhw.assign',compact('bhws','sitios'));
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

       
        return redirect()->back()->with('success','Sitio Assignment Approved!');
    }

    public function mobileSitios()
    {
        $sitios=DB::select('select sitioName from sitios');
        
        $response = ['sitios'=>$sitios, 'success'=>true];

        return $response;
    }

    public function mobileSitiosAssignment(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $assignedSitio = $user->assignedSitioID;


        $response = ['assignedSitioID' => $assignedSitio, 'success' => true];
        
        return $response;
    }
}