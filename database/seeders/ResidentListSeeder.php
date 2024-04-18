<?php

namespace Database\Seeders;

use App\Models\ResidentList;
use Illuminate\Database\Seeder;

class ResidentListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        ResidentList::create([
            'residentID'=>'1',
            'houseID'=>'1',
            'houseNumber'=>1,
            //'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        //Miles
        ResidentList::create([
            'residentID' => '2',
            'houseID' => '2',
            'houseNumber'=>2,
            //'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        //Gwen
        ResidentList::create([
            'residentID' => '3',
            'houseID' => '8',
            'houseNumber'=>7,
            //'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        //Lourdes
        ResidentList::create([
            'residentID'=>'4',
            'houseID'=>'15',
            'houseNumber'=>13,
            //'householdHead'=>0,
            'memberNumber'=>2,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        ResidentList::create([
            'residentID'=>'5',
            'houseID'=>'16',
            'houseNumber'=>14,
            //'householdHead'=>0,
            'memberNumber'=>3,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        ResidentList::create([
            'residentID'=>'6',
            'houseID'=>'18',
            'houseNumber'=>16,
            //'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        //Peter
        ResidentList::create([
            'residentID' => '7',
            'houseID' => '14',
            'houseNumber'=>12,
            //'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        ResidentList::create([
            'residentID'=>'8',
            'houseID'=>'15',
            'houseNumber'=>13,
            //'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        ResidentList::create([
            'residentID'=>'9',
            'houseID'=>'3',
            'houseNumber'=>3,
            //'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        ResidentList::create([
            'residentID'=>'10',
            'houseID'=>'3',
            'houseNumber'=>3,
            //'householdHead'=>0,
            'memberNumber'=>2,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        ResidentList::create([
            'residentID'=>'11',
            'houseID'=>'3',
            'houseNumber'=>3,
            //'householdHead'=>0,
            'memberNumber'=>3,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        ResidentList::create([
            'residentID'=>'12',
            'houseID'=>'3',
            'houseNumber'=>3,
            //'householdHead'=>0,
            'memberNumber'=>4,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        ResidentList::create([
            'residentID'=>'13',
            'houseID'=>'3',
            'houseNumber'=>3,
            //'householdHead'=>0,
            'memberNumber'=>5,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        
        ResidentList::create([
            'residentID' => '14',
            'houseID' => '39',
            'houseNumber'=>2,
            //'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);   
        
        ResidentList::create([
            'residentID' => '15',
            'houseID' => '40',
            'houseNumber'=>2,
            //'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);   
        ResidentList::create([
            'residentID' => '16',
            'houseID' => '40',
            'houseNumber'=>2,
            //'householdHead'=>1,
            'memberNumber'=>2,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);   
    }
}
