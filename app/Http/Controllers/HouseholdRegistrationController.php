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
use Haruncpi\LaravelIdGenerator\IdGenerator;
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

        return response()->json([
            'householdID' => $household->id,
            'houseNum' => $household->houseNumber,
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
        $residentID = 0;
        $resident=$request->all();
        $deathdate = null;
        
        
        $initDate = strtotime($resident['dateOfBirth']);
        $birthdate = date('Y-m-d', $initDate);
        
        if($resident['dateOfDeath']!="NotDead"){
            $dateOfDeath = strtotime($resident['dateOfDeath']);
            $deathdate = date('Y-m-d', $dateOfDeath);

        }

        $certRequirements = '';

        $allResidents=Resident::all(); //configure this pa -> residentID
        $allResidents->makeVisible('firstName','middleName','lastName');

        $search=$allResidents->where('residentID', $resident['residentID'])
                        ->first();

        //does this resident exist
        
        if(is_null($search)){

            
            if ($request->hasFile('file')) {
                $file=$request->file('file');
                if ($file->isValid()) {
                    $file_name = Str::slug($resident['lastName']) . '_SupportingDoc_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    
                    $file->storeAs('supportingDocuments', $file_name);
                    $path = $file_name;
                    $certRequirements = $path;
                }
                $reqJson = json_encode($certRequirements);
            } else {
                $reqJson = NULL;
            }
            
            $newResident = new Resident();
            $newResident->fill([
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
                'familyRole'=>$resident['familyRole'],
                'educationalAttainment'=>$resident['educationalAttainment'],
                'ageClassification'=>$resident['ageClassification'],
                'pregnancyClassification'=>$resident['pregnancyClassification'],
                'registeredSeniorCitizen'=>$resident['registeredSeniorCitizen'],
                'registeredPWD'=>$resident['registeredPWD'],
                'supportingDocument'=>$reqJson,
                

                'createdBy' => $resident['createdBy'],
                'revisedBy' => $resident['revisedBy'],
            ]);


            $newResident['residentID']= IdGenerator::generate(['table'=>'residents','field'=>'residentID','length'=>9,'prefix'=>'RES-']);              

            $newResident->save();
            $residentID=$newResident->id;
            
            
        }else{
            
            
            if ($request->hasFile('file')) {
                $file=$request->file('file');
                if ($file->isValid()) {
                    $file_name = Str::slug($resident['lastName']) . '_SupportingDoc_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    
                    $file->storeAs('supportingDocuments', $file_name);
                    $path = $file_name;
                    $certRequirements = $path;
                }
                $reqJson = json_encode($certRequirements);
            } else {
                $reqJson = NULL;
            }
            

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
                'familyRole'=>$resident['familyRole'],
                'educationalAttainment'=>$resident['educationalAttainment'],
                'ageClassification'=>$resident['ageClassification'],
                'pregnancyClassification'=>$resident['pregnancyClassification'],
                'registeredSeniorCitizen'=>$resident['registeredSeniorCitizen'],
                'registeredPWD'=>$resident['registeredPWD'],
                'dateOfDeath'=>$deathdate,
                'supportingDocument'=>$reqJson,
                

                'createdBy' => $resident['createdBy'],
                'revisedBy' => $resident['revisedBy'],
            ]);
            $updatedResident->save();
            $residentID=$updatedResident->id;
                            
                
        }
        

        
        return response()->json([
            'resident' => $residentID,
            'success' => true
        ]);
    }

    /**
     * This function is to connect the residents to their household
     * $request has the fields of {householdID,houseNumber,userID,residents}
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mobileConnectResToHouse(Request $request)
    {
        $count=1;

        foreach ($request->residents as $memID) {
            $connect=new ResidentList();
                
            $connect->fill([
                'residentID'=>$memID,
                'houseID'=>$request->householdID,
    
                'houseNumber'=>$request->houseNumber,
                'memberNumber'=>$count,
    
                'createdBy' => $request->userID,
                'revisedBy' => $request->userID,
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
     * Deprecated
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
     * Deprecated
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
                    'familyRole'=>$resident['familyRole'],
                    'educationalAttainment'=>$resident['educationalAttainment'],
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

        foreach ($request->members as $resident) {

            $memID=Resident::where('firstName', $resident['firstName'])
            ->where('middleName', $resident['middleName'])
            ->where('lastName', $resident['lastName'])
            ->where('dateOfBirth', $resident['dateOfBirth'])
            ->first();
            
            $connect=new ResidentList();
            
            $connect->fill([
                'residentID'=>$memID['id'],
                'houseID'=>$memHouse['id'],

                'houseNumber'=>$memHouse['houseNumber'], //to accomodate for the multiple households
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function oldUpdateResident(Request $request, $id)
    {
        
        $memHouse=Households::where('sitioID',$request->sitioID)
                            ->where('houseNumber',$request->houseNumber)
                            ->where('quarterNumber',$request->qtr)
                            ->where('yearOfVisit',$request->yearOfVisit)
                            ->orderby('created_at','DESC')
                            ->first();

        $formData = $request->all();
        $count = 1;

        $members = $formData['members'];
        return $request->all();
        $allResidents=Resident::all(); //configure this pa -> residentID
        $allResidents->makeVisible('firstName','middleName','lastName');

        foreach ($members as $resident) {

            $search=$allResidents->where('firstName', $resident['firstName'])
                            ->where('middleName', $resident['middleName'])
                            ->where('lastName', $resident['lastName'])
                            ->where('dateOfBirth', $resident['dateOfBirth'])
                            ->first();

            //does this resident exist
            if(is_null($search)){

                $initDate = strtotime($resident['dateOfBirth']);
                $date = date('Y-m-d', $initDate);
                
                if ($resident->hasFile('file')) {
                    foreach ($resident->file('file') as $file) {
                        if ($file->isValid()) {
                            $file_name = Str::slug($resident->lastName) . '_SupportingDoc_' . uniqid() . '.' . $file->getClientOriginalExtension();
                            
                            $file->storeAs('supportingDocuments', $file_name);
                            $path = $file_name;
                            $certRequirements[] = $path;
                        }
                    }
                    $reqJson = json_encode($certRequirements);
                } else {
                    $reqJson = NULL;
                }
                
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
                    'familyRole'=>$resident['familyRole'],
                    'educationalAttainment'=>$resident['educationalAttainment'],
                    'ageClassification'=>$resident['ageClassification'],
                    'pregnancyClassification'=>$resident['pregnancyClassification'],
                    'registeredSeniorCitizen'=>$resident['registeredSeniorCitizen'],
                    'registeredPWD'=>$resident['registeredPWD'],
                    'supportingDocument'=>$reqJson,
                    

                    'createdBy' => $resident['createdBy'],
                    'revisedBy' => $resident['revisedBy'],
                ]);


                $newResident['residentID']= IdGenerator::generate(['table'=>'residents','field'=>'residentID','length'=>9,'prefix'=>'RES-']);              

                $newResident->save();
               
                $connect=new ResidentList();
                
                $connect->fill([
                    'residentID'=>$newResident->id,
                    'houseID'=>$memHouse['id'],

                    'houseNumber'=>$memHouse['houseNumber'], //to accomodate for the multiple households
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
                    'familyRole'=>$resident['familyRole'],
                    'educationalAttainment'=>$resident['educationalAttainment'],
                    'ageClassification'=>$resident['ageClassification'],
                    'pregnancyClassification'=>$resident['pregnancyClassification'],
                    'registeredSeniorCitizen'=>$resident['registeredSeniorCitizen'],
                    'registeredPWD'=>$resident['registeredPWD'],
                    'dateOfDeath'=>($resident['dateOfDeath']=='NotDead')?null:$resident['dateOfDeath'],
                    //'supportingDocument'=>$resident['supportingDocument']
                    

                    'createdBy' => $resident['createdBy'],
                    'revisedBy' => $resident['revisedBy'],
                ]);
                $updatedResident->save();
               
                    
                                
                $connect=new ResidentList();

                $connect->fill([
                    'residentID'=>$updatedResident->id,
                    'houseID'=>$memHouse['id'],

                    'houseNumber'=>$memHouse['houseNumber'], 
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
