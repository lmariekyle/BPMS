<?php

namespace App\Http\Controllers;

use App\Models\Households;
use Illuminate\Http\Request;

class HouseholdRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mobileStore(Request $request)
    {

        $initDate = strtotime($request->dateOfVisit);
        $date = date('Y-m-d', $initDate);

        $household=Households::create([
            'sitioID' => $request->sitioID,
            'houseNumber' => $request->houseNumber,
            
            'respondentName' => $request->respondentName,
            'dateOfVisit' => $date,
            'yearOfVisit' => (int)$request->yearOfVisit,
            'quarterNumber' => $request->quarterNumber,

            'street' => $request->street,
            'buildingName' => $request->buildingName,
            'unitNumber' => $request->unitNumber,
            'floorNumber' => $request->floorNumber,
            'residentType' => $request->residentType,

            'nHTS' => $request->nHTS,
            'IP' => $request->IP,
            'householdToiletFacilities' => $request->householdToiletFacilities,
            'accessToWaterSupply' => $request->accessToWaterSupply,
            'remarksOfWaterSupply' => $request->remarksOfWaterSupply,
            
            'yearOfVisit' => $request->yearOfVisit,
            'quarterNumber' => $request->quarterNumber,

            'street' => $request->street,
            'buildingName' => $request->buildingName,
            'unitNumber' => $request->unitNumber,
            'floorNumber' => $request->floorNumber,
            'residentType' => $request->residentType,

            'nHTS' => $request->nHTS,
            'IP' => $request->IP,
            'householdToiletFacilities' => $request->householdToiletFacilities,
            'accessToWaterSupply' => $request->accessToWaterSupply,
            'remarksOfWaterSupply' => $request->remarksOfWaterSupply,
            
            'createdBy' => $request->createdBy,
            'revisedBy' => $request->revisedBy,
        ]);

        $household->save();

        return $response = 'it worked!';
        

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
}
