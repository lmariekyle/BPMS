<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'residentID' => '1',
            'sitioID' => '2',
            'assignedSitioID' => '1',
            'idNumber' => 'A-001',
            'contactnumber' => '1234567890',
            'userlevel' => 'Admin',
            'userstatus' => 'Active',
            'email' => 'admin@bpms.com',
            'email_verified_at' => now(),
            'password' => Hash::make('adminbpms'),
        ])->assignRole('Admin');
       
        
    }
}
