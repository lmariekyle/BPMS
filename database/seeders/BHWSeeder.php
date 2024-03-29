<?php

namespace Database\Seeders;

use App\Models\Households;
use App\Models\Resident;
use App\Models\ResidentList;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BHWSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Households::create([
            'sitioID' => '2',
            'houseNumber' => '2',
            'street'=>'TOOOOOOO',
            'buildingName'=>'NULL',
            'unitNumber'=>'NULL',
            'floorNumber'=>'NULL',
            'residenceType'=>'Residential Home',
            'nHTS'=>'NHTS',
            'householdToiletFacilities'=>'None',
            'IP'=>'IP',
            'accessToWaterSupply'=>'L2',
            'remarksOfWaterSupply'=>'no remarks',
            'yearOfVisit'=>2022,
            'quarterNumber'=>4,
            'dateOfVisit'=>'2022-10-15',
            'respondentName'=>'Rook',
            'createdBy'=>2,
            'revisedBy'=>2
        ]);

        //MILES//
        ResidentList::create([
            'residentID' => '2',
            'houseID' => '25',
            'houseNumber'=>2,
            'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);

        User::create([
            'residentID' => '2',
            'sitioID' => '2',
            'assignedSitioID' => '2',
            'idNumber' => 'B-0001',
            'contactnumber' => '09876543211',
            'userlevel' => 'Barangay Health Worker',
            'userstatus' => 'Active',
            'profileImage' => 'images/morales.jpg',
            'email' => 'lourdeskyle9@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('moralesbpms'),
        ])->assignRole('Barangay Health Worker');


        //GWEN//
        ResidentList::create([
            'residentID' => '3',
            'houseID' => '25',
            'houseNumber'=>2,
            'householdHead'=>0,
            'memberNumber'=>2,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);
        User::create([
            'residentID' => '3',
            'sitioID' => '3',
            'assignedSitioID' => '3',
            'idNumber' => 'S-0001',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Secretary',
            'userstatus' => 'Active',
            'profileImage' => 'images/stacy.jpg',
            'email' => 'rachelyoo09@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('stacybpms'),
        ])->assignRole('Barangay Secretary');

        //PETER//
        ResidentList::create([
            'residentID' => '7',
            'houseID' => '25',
            'houseNumber'=>2,
            'householdHead'=>0,
            'memberNumber'=>3,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);
        User::create([
            'residentID' => '7',
            'sitioID' => '3',
            'assignedSitioID' => '3',
            'idNumber' => '23101',
            'contactnumber' => '09876543212',
            'userlevel' => 'User',
            'userstatus' => 'Active',
            'profileImage' => 'images/peter.webp',
            'email' => '19100340@usc.edu.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('parkerbpms'),
        ])->assignRole('User');

        //Lourdes//
        ResidentList::create([
            'residentID'=>'4',
            'houseID'=>'3',
            'houseNumber'=>4,
            'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>1,
            'revisedBy'=>1,
        ]);
        User::create([
            'residentID' => '4',
            'sitioID' => '4',
            'assignedSitioID' => '4',
            'idNumber' => 'C-0001',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Captain',
            'userstatus' => 'Active',
            'profileImage' => 'images/bc.jpg',
            'email' => 'lourdesmkc@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('lourdesbpms'),
        ])->assignRole('Barangay Captain');
    }
}
