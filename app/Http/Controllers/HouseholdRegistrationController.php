<?php

namespace App\Http\Controllers;

use App\Models\Households;
use App\Models\Resident;
use App\Models\ResidentList;
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

        //actually works lmao

        /*$household = new Households();
        $data = $request->only($household->getFillable());
        $household->fill($data)->save();*/
        
        
        //hypothetical soln

        $houseInfo=$request->household;
        $members=$request->members;

        $initDate = strtotime($houseInfo->dateOfVisit);
        $date = date('Y-m-d', $initDate);

        $household=Households::create([
            'sitioID' => $houseInfo->sitioID,
            'houseNumber' => $houseInfo->houseNumber,
            
            'respondentName' => $houseInfo->respondentName,
            'dateOfVisit' => $date,
            'yearOfVisit' => (int)$houseInfo->yearOfVisit,
            'quarterNumber' => $houseInfo->quarterNumber,

            'street' => $houseInfo->street,
            'buildingName' => $houseInfo->buildingName,
            'unitNumber' => $houseInfo->unitNumber,
            'floorNumber' => $houseInfo->floorNumber,
            'residentType' => $houseInfo->residentType,

            'nHTS' => $houseInfo->nHTS,
            'IP' => $houseInfo->IP,
            'householdToiletFacilities' => $houseInfo->householdToiletFacilities,
            'accessToWaterSupply' => $houseInfo->accessToWaterSupply,
            'remarksOfWaterSupply' => $houseInfo->remarksOfWaterSupply,
            
            'yearOfVisit' => $houseInfo->yearOfVisit,
            'quarterNumber' => $houseInfo->quarterNumber,

            'street' => $houseInfo->street,
            'buildingName' => $houseInfo->buildingName,
            'unitNumber' => $houseInfo->unitNumber,
            'floorNumber' => $houseInfo->floorNumber,
            'residenceType' => $houseInfo->residenceType,

            'nHTS' => $houseInfo->nHTS,
            'IP' => $houseInfo->IP,
            'householdToiletFacilities' => $houseInfo->householdToiletFacilities,
            'accessToWaterSupply' => $houseInfo->accessToWaterSupply,
            'remarksOfWaterSupply' => $houseInfo->remarksOfWaterSupply,
            
            'createdBy' => $houseInfo->createdBy,
            'revisedBy' => $houseInfo->revisedBy,
        ]);

        $household->save();
        $memHouse=Households::where('sitioID',$houseInfo->sitioID)
                            ->where('houseNumber',$houseInfo->houseNumber);

        $count = 1;
        $head = 0;
        /*
        foreach ($members as $member) {
            $initDate = strtotime($member->dateOfBirth);
            $birth = date('Y-m-d', $initDate);

            $resident=Resident::create([
                'firstname' => $member->firstName,
                'middlename' => $member->middleName,
                'lastname' => $member->lastName,
                'dateOfBirth' => $birth,
                'contactNumber' => $member->contactNumber,
                'barangay' => $member->firstName,
                'email' => $member->email,
                'maritalStatus' => $member->maritalStatus,
                'gender' => $member->gender,
                'philHealthNumber' => $member->philHealthNumber,
                'occupation' => $member->occupation,
                'monthlyIncome' => $member->monthlyIncome,
                'ageClassification' => $member->ageClassification,
                'pregnancyClassification' => $member->pregnancyClassification,
                'registeredSeniorCitizen' => $member->registeredSeniorCitizen,
                'registeredPWD' => $member->ageClass,
                'createdBy' => $member->createdBy,
                'revisedBy' => $member->revisedBy,
                //'supportingDocument' => $member->firstName,
        
            ]);
            $resident->save;

            $memID=Resident::where('firstName', '=', $member->firstname)
                    ->where('middleName', '=', $member->middlename)
                    ->where('lastName', '=', $member->lastname)
                    ->where('dateOfBirth', '=', $member->dateOfBirth);

            if($count==1){
                $head=$memID->id;
            }
        

            $connect=ResidentList::create([
                'residentID'=>$memID->id,
                'houseID'=>$memHouse->id,

                'householdHead'=>$head,
                'memberNumber'=>$count,

                'createdBy' => $member->createdBy,
                'revisedBy' => $member->revisedBy,
            ]);

            $count++;
            
        }*/

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
