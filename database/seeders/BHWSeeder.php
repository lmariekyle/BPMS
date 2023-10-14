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
            'houseNumber' => '2'
        ]);
        
        //MILES//
        ResidentList::create([
            'residentID'=>'2',
            'houseID'=>'2'
        ]);

        User::create([
            'residentID' => '2',
            'sitioID' => '2',
            'assignedSitioID' => '2',
            'idNumber' => 'B-0001',
            'contactnumber' => '09876543211',
            'userlevel' => 'Barangay Health Worker',
            'userstatus' => 'Active',
            'email' => 'morales@bpms.com',
            'email_verified_at' => now(),
            'password' => Hash::make('moralesbpms'),
        ])->assignRole('Barangay Health Worker');

        
        //GWEN//
        ResidentList::create([
            'residentID'=>'3',
            'houseID'=>'2'
        ]);
        User::create([
            'residentID' => '3',
            'sitioID' => '3',
            'assignedSitioID' => '3',
            'idNumber' => 'B-0002',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Secretary',
            'userstatus' => 'Active',
            'email' => 'stacy@bpms.com',
            'email_verified_at' => now(),
            'password' => Hash::make('stacybpms'),
        ])->assignRole('Barangay Secretary');
        
        //PETER//
        ResidentList::create([
            'residentID'=>'7',
            'houseID'=>'2'
        ]);
        User::create([
            'residentID' => '7',
            'sitioID' => '3',
            'assignedSitioID' => '3',
            'idNumber' => 'S-001',
            'contactnumber' => '09876543212',
            'userlevel' => 'User',
            'userstatus' => 'Active',
            'email' => 'parker@bpms.com',
            'email_verified_at' => now(),
            'password' => Hash::make('parkerbpms'),
        ])->assignRole('User');

        //PETER//
        ResidentList::create([
            'residentID'=>'4',
            'houseID'=>'3'
        ]);
        User::create([
            'residentID' => '4',
            'sitioID' => '4',
            'assignedSitioID' => '4',
            'idNumber' => 'C-001',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Captain',
            'userstatus' => 'Active',
            'email' => 'lourdeskyle09@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('lourdesbpms'),
        ])->assignRole('Barangay Captain');
    }
}
