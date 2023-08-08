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
            'residentID'=>'RES-00002',
            'houseID'=>'2'
        ]);

        User::create([
            'residentID' => 'RES-00002',
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
            'residentID'=>'RES-00003',
            'houseID'=>'2'
        ]);
        User::create([
            'residentID' => 'RES-00003',
            'sitioID' => '3',
            'assignedSitioID' => '3',
            'idNumber' => 'B-0002',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Health Worker',
            'userstatus' => 'Active',
            'email' => 'stacy@bpms.com',
            'email_verified_at' => now(),
            'password' => Hash::make('stacybpms'),
        ])->assignRole('Barangay Health Worker');
    }
}
