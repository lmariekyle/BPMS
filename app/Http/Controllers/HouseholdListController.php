<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Households;
use App\Models\Resident;
use App\Models\ResidentList;
use App\Models\User;

use function PHPUnit\Framework\isEmpty;

class HouseholdListController extends Controller
{
    
    public function mobileHouseholds(Request $request)
    {
        /* This function asks for the sitioID and with it, gets all of the households under that sitioID */
        
        $tempHousehold=Households::select('houseNumber')
                                ->where('sitioID', $request->sitioID)
                                ->groupBy('houseNumber')
                                ->get();

        $households=[];
        

        foreach ($tempHousehold as $houseNum) {
            $house=Households::where('sitioID', $request->sitioID)
                                ->where('houseNumber', $houseNum['houseNumber'])
                                ->orderBy('created_at','desc')
                                ->first();
            $user=User::where('id', $house['revisedBy'])
                                ->first();
            $name=Resident::where('id',$user['residentID'])
                                ->first();
            $name->makeVisible('firstName','lastName');
            $house['revisedByName']=$name['firstName']. ' '.$name['lastName'];
            
            array_push($households,$house);
        }
        
        $houseNum = array_column($households, 'houseNumber');

        array_multisort($houseNum, SORT_ASC, $households);

        $response =[
            'households' => $households,
            'success' => true,
        ];
        
        return $response;
    }

    public function getHouseholdsPerYear(Request $request)
    {
        /* function will receive the assignedSitioID of the current user from the app then 
           return all households with that id
        */
        
        $households=Households::where('sitioID', $request->sitioID)
                            ->where('houseNumber', $request->houseNumber)
                            ->where('yearOfVisit', $request->year)
                            ->orderBy('created_at','desc')
                            ->get();

        $response =[
            'households' => $households,
            'success' => true,
        ];
        
        return $response;
    }


    
    public function mobileGetHouseNumber(Request $request)
    {
        
        $households=Households::select('houseNumber')
                                ->where('sitioID', $request->sitioID)
                                ->groupBy('houseNumber')
                                ->orderBy('created_at','desc')
                                ->get();
        $numbersList = [];
        $houseNumber = 0;
        
        if(count($households)!=0){

            foreach ($households as $numbers) {
                $houseNum = (is_numeric($numbers['houseNumber']))?$numbers['houseNumber']:substr($numbers['houseNumber'],0,-1);
                $tempObj['houseNumber']=$houseNum;
                
                array_push($numbersList,$tempObj);
            }

            $column = array_column($numbersList,'houseNumber');
            array_multisort($column, SORT_DESC,$numbersList);
            
            $houseNumber =(int)$numbersList[0]['houseNumber']+1;
        }else{
            $houseNumber = 0;
        }

        
        $response =[
            'houseNum' => (string)$houseNumber,
            'success' => true,
        ];
        
        return $response;
    }

    public function mobileMembers(Request $request)
    {

        $households=Households::where('sitioID', $request->sitioID)
                                ->where('houseNumber', $request->houseNumber)
                                ->where('quarterNumber', $request->qtr)
                                ->where('yearOfVisit', $request->year)
                                ->first();
        

        $resList=ResidentList::where('houseID', $households['id'])
                            ->orderBy('created_at','desc')
                            ->get();
        $members=[];
        
        foreach ($resList as $res) {
            $mem=Resident::where('id',$res['residentID'])
                        ->orderby('created_at','desc')
                        ->first();
            
            $mem->makeVisible('firstName','middleName','lastName','contactNumber');
        
            array_push($members,$mem);
        }
        
    
        $response =[
            'members' => $members,
            'success' => true
        ];
        
        return $response;
    }

    public function mobileRecentMembers(Request $request)
    {

        $households=Households::where('sitioID', $request->sitioID)
                                ->where('houseNumber', $request->houseNumber)
                                ->first();
        

        $resList=ResidentList::where('houseID', $households['id'])
                            ->orderBy('created_at','desc')
                            ->get();
        $members=[];

        
        foreach ($resList as $res) {
            $mem=Resident::where('id',$res['residentID'])
                        ->orderby('created_at','desc')
                        ->first();
            $mem->makeVisible('firstName','middleName','lastName','contactNumber');
        
            array_push($members,$mem);
        }
        
    
        $response =[
            'resList' => $resList,
            'members' => $members,
            'success' => true
        ];
        
        return $response;
    }

    public function getAddressList(Request $request)
    {
        
        $tempHousehold=Households::select('houseNumber')
                                ->where('sitioID', $request->sitioID)
                                ->groupBy('houseNumber')
                                ->get();

        $households=[];

        for ($i=0; $i < count($tempHousehold); $i++) {

            $house=Households::where('sitioID', $request->sitioID)
                                ->where('houseNumber', $tempHousehold[$i]['houseNumber'])
                                ->orderBy('created_at','desc')
                                ->first();
            
            $address=[
                'sitioID'=>$house['sitioID'],
                'houseNumber' => $house['houseNumber'],
                'street'=>$house['street'],
                'buildingName'=>$house['buildingName'],
                'residenceType'=>$house['residenceType']
                
            ];

            if(is_numeric($tempHousehold[$i]['houseNumber'])){
                array_push($households,$address);
            }else{
                if(count($tempHousehold)==$i+1){
                    array_push($households,$address);
                }else if(substr($tempHousehold[$i+1]['houseNumber'],0,1)!=substr($tempHousehold[$i]['houseNumber'],0,1)){
                    array_push($households,$address);
                }
            }
            
        }
        
        $houseNum = array_column($households, 'houseNumber');

        array_multisort($houseNum, SORT_ASC, $households);

        $response =[
            'households' => $households,
            'success' => true,
        ];
        
        return $response;
    }

}
