<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Households;
use App\Models\Resident;
use App\Models\ResidentList;

class HouseholdListController extends Controller
{
    public function mobileHouseholds(Request $request)
    {
        /* function will receive the assignedSitioID of the current user from the app then 
           return all households with that id
        */
        
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
            
            array_push($households,$house);
        }
        $houseNum = array_column($households, 'houseNumber');

        array_multisort($houseNum, SORT_ASC, $households);

        $response =[
            'households' => $households,
            'success' => true
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
                                ->first();

        $houseNum = (is_numeric($households['houseNumber']))?$households['houseNumber']:substr($households['houseNumber'],0,-1);

        $houseNumber =(int)$houseNum+1;
        $response =[
            'houseNum' => (string)$houseNumber,
            'success' => true
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
        
            array_push($members,$mem);
        }
        
    
        $response =[
            'members' => $members,
            'success' => true
        ];
        
        return $response;
    }
}
