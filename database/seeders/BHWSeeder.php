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
        
        Resident::create([
            'firstName' => 'Miles',
            'middleName' => 'Davis',
            'lastName' => 'Morales',
            'dateOfBirth' => '2000-01-01',
            'contactNumber' => '09876543211',
            'email' => 'morales@gmail.com',
            'gender' => 'Male',
            'maritalStatus' => 'Single',
        ]);
        ResidentList::create([
            'residentID'=>'2',
            'houseID'=>'2'
        ]);
        User::create([
            'residentID' => '2',
            'idNumber' => 'A-002',
            'contactnumber' => '09876543211',
            'barangay' => 'Poblacion',
            'sitio' => 'Labangon',
            'userlevel' => 'Barangay Health Worker',
            'userstatus' => 'Active',
            'email' => 'morales@bpms.com',
            'email_verified_at' => now(),
            'password' => Hash::make('moralesbpms'),
        ])->assignRole('Barangay Health Worker');

        
        Resident::create([
            'firstName' => 'Gwen',
            'middleName' => 'Maxine',
            'lastName' => 'Stacy',
            'dateOfBirth' => '2000-01-01',
            'contactNumber' => '09876543212',
            'email' => 'stacy@gmail.com',
            'gender' => 'Feale',
            'maritalStatus' => 'Single',
        ]);
        ResidentList::create([
            'residentID'=>'3',
            'houseID'=>'2'
        ]);
        User::create([
            'residentID' => '3',
            'idNumber' => 'A-003',
            'contactnumber' => '09876543212',
            'barangay' => 'Poblacion',
            'sitio' => 'Labangon',
            'userlevel' => 'Barangay Health Worker',
            'userstatus' => 'Active',
            'email' => 'stacy@bpms.com',
            'email_verified_at' => now(),
            'password' => Hash::make('stacybpms'),
        ])->assignRole('Barangay Health Worker');
    }
}