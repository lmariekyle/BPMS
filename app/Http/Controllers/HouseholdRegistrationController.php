<?php

namespace App\Http\Controllers;

use App\Models\Households;
use App\Models\Resident;
use App\Models\ResidentList;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class HouseholdRegistrationController extends Controller
{
    /**
     * Store a newly created household in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mobileHouseholdStore(Request $request)
    {
        $household = new Households();
        $data = $request->only($household->getFillable());
        $household->fill($data);
        

        $initDate = strtotime($request->dateOfVisit);
        $date = date('Y-m-d', $initDate);

        $household['dateOfVisit']=$date;

        $household->save();

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Store a newly created resident in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mobileResidentStore(Request $request)
    {

        $memHouse=Households::where('sitioID',$request->sitioID)
                            ->where('houseNumber',$request->houseNumber)
                            ->first();
        
       
        $lastRes=Resident::orderBy('residentID','desc')->first();
        $tempArr=explode('-',$lastRes['residentID']);
        $currResID =(int)$tempArr[1];

        

        foreach ($request->members as $resident) {

        /*    $certRequirements = [];
            if ($resident->hasFile('supportingDocument')) {
                foreach ($resident->file('supportingDocument') as $file) {
                    if ($file->isValid()) {
                        $file_name = Str::slug($resident['lastName']+$resident['firstName'][0]) . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                        $file->storeAs('requirements', $file_name);
                        $path = $file_name;
                        $certRequirements[] = $path;
                    }
                }
                $reqJson = json_encode($certRequirements);
            } else {
                $reqJson = NULL;
            }*/

            
            $initDate = strtotime($resident['dateOfBirth']);
            $date = date('Y-m-d', $initDate);

            $newResident = new Resident();
            $newResident->fill([
                    'firstName'=>$resident['firstName'],
                    'middleName'=>$resident['middleName'],
                    'lastName'=>$resident['lastName'],
                    'dateOfBirth'=>$date,
                    'contactNumber'=>$resident['contactNumber'],
                    'email'=>$resident['email'],
                    'maritalStatus'=>$resident['maritalStatus'],
                    'gender'=>$resident['gender'],
                    'philHealthNumber'=>$resident['philHealthNumber'],
                    'occupation'=>$resident['occupation'],
                    'monthlyIncome'=>$resident['monthlyIncome'],
                    'ageClassification'=>$resident['ageClassification'],
                    'pregnancyClassification'=>$resident['pregnancyClassification'],
                    'registeredSeniorCitizen'=>$resident['registeredSeniorCitizen'],
                    'registeredPWD'=>$resident['registeredPWD'],
                    //'supportingDocument'=>$reqJson,

                'createdBy' => $resident['createdBy'],
                'revisedBy' => $resident['revisedBy'],
            ]);

            if($currResID<9){
                $newResident['residentID']='RES-000'.($currResID+1);
            }else if($currResID<99){
                $newResident['residentID']='RES-00'.($currResID+1);
            }else if($currResID<999){
                $newResident['residentID']='RES-0'.($currResID+1);
            }else{
                $newResident['residentID']='RES-'.($currResID+1);
            }
            
            $currResID++;

            $newResident->save();
        }

        
        $count = 1;
        $head = false;

        foreach ($request->members as $resident) {

            $memID=Resident::where('firstName', $resident['firstName'])
            ->where('middleName', $resident['middleName'])
            ->where('lastName', $resident['lastName'])
            ->where('dateOfBirth', $resident['dateOfBirth'])
            ->first();
            
            if($count==1){
                $head=true;
            }else{
                $head=false;
            }
            
        
            $connect=new ResidentList();
            
            $connect->fill([
                'residentID'=>$memID['id'],
                'houseID'=>$memHouse['id'],

                'houseNumber'=>$memHouse['houseNumber'], //to accomodate for the multiple households
                'householdHead'=>$head, //bool
                'memberNumber'=>$count,

                'createdBy' => $resident['createdBy'],
                'revisedBy' => $resident['revisedBy'],
            ]);
            $connect->save();
            
            $count++;
        }
        
        
         return response()->json([
            'success' => true
        ]);
    }

    
    
    /**
     * Store a newly created household in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mobileUpdateHouseholdStore(Request $request)
    {
        $household = new Households();

        $data = $request->only($household->getFillable());
        $household->fill($data);
        
        $initDate = strtotime($request->dateOfVisit);
        $date = date('Y-m-d', $initDate);

        $household['dateOfVisit']=$date;
        if(substr($household['houseNumber'],-1)=='B'){ 
            $find=Households::where('sitioID',$household['sitioID'])
            ->where('houseNumber',substr($household['houseNumber'],0,-1))
            ->orderBy('yearOfVisit','desc')
            ->get();

            foreach ($find as $house) {
                $resList=ResidentList::where('houseID',$house['id'])
                        ->first();

                $house['houseNumber']=substr($household['houseNumber'],0,-1).'A';
                $resList['houseNumber']=substr($household['houseNumber'],0,-1).'A';

                $house->update();
                $resList->update();
            }
        
            
        }
        $household->save();

        if($household['quarterNumber']==1){
            $house=Households::where('sitioID',$household['sitioID'])
                            ->where('houseNumber',$household['houseNumber'])
                            ->where('quarterNumber', 4)
                            ->orderBy('yearOfVisit','asc')
                            ->first();
            
            $yearsPassed = (int)now()->format('Y')-(int)$house['yearOfVisit'];
            if($yearsPassed<=6){
                Households::where('yearOfVisit',$house['yearOfVisit'])->delete();
            }
            

        }



        return response()->json([
            'success' => true
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mobileUpdateResident(Request $request)
    {
        
        $memHouse=Households::where('sitioID',$request->sitioID)
                            ->where('houseNumber',$request->houseNumber)
                            ->where('quarterNumber',$request->qtr)
                            ->where('yearOfVisit',$request->yearOfVisit)
                            ->first();
        
       
        $lastRes=Resident::orderBy('residentID','desc')->first();
        $tempArr=explode('-',$lastRes['residentID']);
        $currResID =(int)$tempArr[1];

        $head = false;
        $count = 1;

        foreach ($request->members as $resident) {
            $search=Resident::where('firstName', $resident['firstName'])
                            ->where('middleName', $resident['middleName'])
                            ->where('lastName', $resident['lastName'])
                            ->where('dateOfBirth', $resident['dateOfBirth'])
                            ->first();
            if(is_null($search)){

                $initDate = strtotime($resident['dateOfBirth']);
                $date = date('Y-m-d', $initDate);

                $newResident = new Resident();
                $newResident->fill([
                    'firstName'=>$resident['firstName'],
                    'middleName'=>$resident['middleName'],
                    'lastName'=>$resident['lastName'],
                    'dateOfBirth'=>$date,
                    'contactNumber'=>$resident['contactNumber'],
                    'email'=>$resident['email'],
                    'maritalStatus'=>$resident['maritalStatus'],
                    'gender'=>$resident['gender'],
                    'philHealthNumber'=>$resident['philHealthNumber'],
                    'occupation'=>$resident['occupation'],
                    'monthlyIncome'=>$resident['monthlyIncome'],
                    'ageClassification'=>$resident['ageClassification'],
                    'pregnancyClassification'=>$resident['pregnancyClassification'],
                    'registeredSeniorCitizen'=>$resident['registeredSeniorCitizen'],
                    'registeredPWD'=>$resident['registeredPWD'],
                    //'supportingDocument'=>$resident['supportingDocument']
                    

                    'createdBy' => $resident['createdBy'],
                    'revisedBy' => $resident['revisedBy'],
                ]);

                if($currResID<9){
                    $newResident['residentID']='RES-000'.($currResID+1);
                }else if($currResID<99){
                    $newResident['residentID']='RES-00'.($currResID+1);
                }else if($currResID<999){
                    $newResident['residentID']='RES-0'.($currResID+1);
                }else{
                    $newResident['residentID']='RES-'.($currResID+1);
                }
                
                $currResID++;

                $newResident->save();

                $memID=Resident::where('firstName', $resident['firstName'])
                ->where('middleName', $resident['middleName'])
                ->where('lastName', $resident['lastName'])
                ->where('dateOfBirth', $resident['dateOfBirth'])
                ->first();
                
                    
                if($count==1){
                    $head=true;
                }else{
                    $head=false;
                }

                $connect=new ResidentList();
                
                $connect->fill([
                    'residentID'=>$memID['id'],
                    'houseID'=>$memHouse['id'],

                    'houseNumber'=>$memHouse['houseNumber'], //to accomodate for the multiple households
                    'householdHead'=>$head, //bool
                    'memberNumber'=>$count,

                    'createdBy' => $resident['createdBy'],
                    'revisedBy' => $resident['revisedBy'],
                ]);
                $connect->save();
                
                $count++;
            }else{
                
                $initDate = strtotime($resident['dateOfBirth']);
                $birthdate = date('Y-m-d', $initDate);
                

                $updatedResident = new Resident();
                $updatedResident->fill([
                    'residentID'=>$resident['residentID'],
                    'firstName'=>$resident['firstName'],
                    'middleName'=>$resident['middleName'],
                    'lastName'=>$resident['lastName'],
                    'dateOfBirth'=>$birthdate,
                    'contactNumber'=>$resident['contactNumber'],
                    'email'=>$resident['email'],
                    'maritalStatus'=>$resident['maritalStatus'],
                    'gender'=>$resident['gender'],
                    'philHealthNumber'=>$resident['philHealthNumber'],
                    'occupation'=>$resident['occupation'],
                    'monthlyIncome'=>$resident['monthlyIncome'],
                    'ageClassification'=>$resident['ageClassification'],
                    'pregnancyClassification'=>$resident['pregnancyClassification'],
                    'registeredSeniorCitizen'=>$resident['registeredSeniorCitizen'],
                    'registeredPWD'=>$resident['registeredPWD'],
                    'dateOfDeath'=>$resident['dateOfDeath'],
                    //'supportingDocument'=>$resident['supportingDocument']
                    

                    'createdBy' => $resident['createdBy'],
                    'revisedBy' => $resident['revisedBy'],
                ]);
                $updatedResident->save();
               

                if($request->qtr==1){ 
                    $foundresident=Resident::where('residentID',$resident['residentID'])
                    ->orderBy('created_at','asc')
                    ->first();
                    
                    $date=new Carbon($foundresident['created_at']);

                    $yearsPassed = (int)now()->format('Y')-(int)$date->year;
                    if($yearsPassed<=6){

                        Resident::where('residentID',$resident['residentID'])
                                        ->whereYear('created_at', $date->year)
                                        ->delete();
                        
                    }
                    
        
                }

                    
                if($count==1){
                    $head=true;
                }else{
                    $head=false;
                }
                

                $memID=Resident::where('firstName', $resident['firstName'])
                ->where('middleName', $resident['middleName'])
                ->where('lastName', $resident['lastName'])
                ->where('dateOfBirth', $resident['dateOfBirth'])
                ->orderby('created_at','desc')
                ->first();
                
                $connect=new ResidentList();
                
                $connect->fill([
                    'residentID'=>$memID['id'],
                    'houseID'=>$memHouse['id'],

                    'houseNumber'=>$memHouse['houseNumber'], 
                    'householdHead'=>$head,
                    'memberNumber'=>$count,

                    'createdBy' => $resident['createdBy'],
                    'revisedBy' => $resident['revisedBy'],
                ]);
                $connect->save();
                
                
                $count++;
                
    
            }
        }

        
        return response()->json([
            'success' => true
        ]);
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
