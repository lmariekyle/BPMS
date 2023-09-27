<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Households;

class HouseholdListController extends Controller
{
    public function mobileHouseholds(Request $request)
    {
        /* function will receive the assignedSitioID of the current user from the app then 
           return all households with that id
        */
        
        $households=Households::where('sitioID', $request->sitioID)->get();

        $response =[
            'households' => $households,
            'success' => true
        ];
        
        return $response;
    }

    
    public function mobileGetHouseNumber(Request $request)
    {
        /* function will receive the assignedSitioID of the current user from the app then 
           return all households with that id
        */
        
        $households=Households::where('sitioID', $request->sitioID)
                                ->orderBy('houseNumber','desc')->first();

        $response =[
            'houseNum' => $households['houseNumber']+1,
            'success' => true
        ];
        
        return $response;
    }
}
