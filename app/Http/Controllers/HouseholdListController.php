<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Households;

class HouseholdListController extends Controller
{
    public function mobileHouseholds()
    {
        /* function will receive the assignedSitioID of the current user from the app then 
           return all households with that id
        */
       /* $user = User::where('id',2)->first();
        $assignedSitio = $user->assignedSitioID;*/
        $households=Households::where('sitioID', 2)->get();

        $response =[
            'households' => $households,
            'success' => true
        ];
        print($households);
        return $response;
    }
}
