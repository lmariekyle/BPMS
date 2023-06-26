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
            'idNumber' => 'A-002',
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
            'idNumber' => 'A-003',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Health Worker',
            'userstatus' => 'Active',
            'email' => 'stacy@bpms.com',
            'email_verified_at' => now(),
            'password' => Hash::make('stacybpms'),
        ])->assignRole('Barangay Health Worker');
    }
}
