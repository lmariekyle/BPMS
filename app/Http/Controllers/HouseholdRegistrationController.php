<?php

namespace App\Http\Controllers;

use App\Models\Households;
use App\Models\Resident;
use App\Models\ResidentList;
use DateTime;
use Illuminate\Http\Request;
use DB;
use Symfony\Component\Console\Input\Input;

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
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mobileHouseholds(Request $request)
    {
        /* function will receive the assignedSitioID of the current user from the app then 
           return all households with that id
        */
        $households=Households::where('sitioID', $request->assignedSitioID)->get();

        $response =[
            'households' => $households,
            'success' => true
        ];
        print('hey');
        return $response;
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

        /*
            This is to save household
            then the family members of said household
            then connecting them together through residents list
        
        */

    /*    $jsonData=$request->getContent();
        $datum= json_decode($jsonData,true);
        dd($datum);

        $household = new Households();
        $data = $datum['household']->only($household->getFillable());
        $household->fill($data)->save();
        

        $resident = new Resident();
        $data = $members->only($resident->getFillable());
        $resident->fill($data)->save();
        */
        //hypothetical soln


        $houseInfo=$request->household;
        $members=$request->members;

        //$initDate = strtotime($houseInfo['dateOfVisit']);
        $date = DateTime::createFromFormat('Y-m-d', $houseInfo['dateOfVisit']);
        //$date = date('Y-m-d', $initDate);
        //print_r($initDate);

        $household=Households::create([
            'sitioID' => $houseInfo['sitioID'],
            'houseNumber' => $houseInfo['houseNumber'],
            
            'respondentName' => $houseInfo['respondentName'],
            'dateOfVisit' => $date,
            'yearOfVisit' => (int)$houseInfo['yearOfVisit'],
            'quarterNumber' => $houseInfo['quarterNumber'],

            'street' => $houseInfo['street'],
            'buildingName' => $houseInfo['buildingName'],
            'unitNumber' => $houseInfo['unitNumber'],
            'floorNumber' => $houseInfo['floorNumber'],
            'residenceType' => $houseInfo['residenceType'],

            'nHTS' => $houseInfo['nHTS'],
            'IP' => $houseInfo['IP'],
            'householdToiletFacilities' => $houseInfo['householdToiletFacilities'],
            'accessToWaterSupply' => $houseInfo['accessToWaterSupply'],
            'remarksOfWaterSupply' => $houseInfo['remarksOfWaterSupply'],
            
            'createdBy' => $houseInfo['createdBy'],
            'revisedBy' => $houseInfo['revisedBy'],
        ]);

        $household->save();
        $memHouse=Households::where('sitioID',$houseInfo['sitioID'])
                            ->where('houseNumber',$houseInfo['houseNumber']);

        $count = 1;
        $head = false;
        
        foreach ($members as $member) {
            $birth = DateTime::createFromFormat('Y-m-d', $member['dateOfBirth']);


            $resident=Resident::create([
                'firstName' => $member['firstName'],
                'middleName' => $member['middleName'],
                'lastName' => $member['lastName'],
                'dateOfBirth' => $birth,
                'contactNumber' => $member['contactNumber'],
                'email' => $member['email'],
                'maritalStatus' => $member['maritalStatus'],
                'gender' => $member['gender'],
                'philHealthNumber' => $member['philHealthNumber'],
                'occupation' => $member['occupation'],
                'monthlyIncome' => $member['monthlyIncome'],
                'ageClassification' => $member['ageClassification'],
                'pregnancyClassification' => $member['pregnancyClassification'],
                'registeredSeniorCitizen' => $member['registeredSeniorCitizen'],
                'registeredPWD' => $member['registeredPWD'],
                'createdBy' => $member['createdBy'],
                'revisedBy' => $member['revisedBy'],
                //'supportingDocument' => $member->firstName,
        
            ]);
            $resident->save();

            $memID=Resident::where('firstName', '=', $member['firstName'])
                    ->where('middleName', '=', $member['middleName'])
                    ->where('lastName', '=', $member['lastName'])
                    ->where('dateOfBirth', '=', $member['dateOfBirth']);

            if($count==1){
                $head=true;
            }else{
                $head=false;
            }


            $connect=ResidentList::create([
                'residentID'=>$memID->id,
                'houseID'=>$memHouse->id,

                'houseNumber'=>$memHouse->houseNumber, //to accomodate for the multiple households
                'householdHead'=>$head, //bool
                'memberNumber'=>$count,

                'createdBy' => $member->createdBy,
                'revisedBy' => $member->revisedBy,
            ]);

            $count++;
            
        }

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