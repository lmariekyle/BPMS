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
        //MILES//
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
        User::create([
            'residentID' => '3',
            'sitioID' => '4',
            'assignedSitioID' => '4',
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
        User::create([
            'residentID' => '7',
            'sitioID' => '5',
            'assignedSitioID' => '5',
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
        User::create([
            'residentID' => '4',
            'sitioID' => '6',
            'assignedSitioID' => '6',
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
