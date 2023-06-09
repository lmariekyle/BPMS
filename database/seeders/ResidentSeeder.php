<?php

namespace Database\Seeders;

use App\Models\Resident;
use Illuminate\Database\Seeder;

class ResidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Resident::create([
            'firstName' => 'Admin',
            'middleName' => 'PCSZ',
            'lastName' => 'Capstone',
            'dateOfBirth' => '2000-01-01',
            'contactNumber' => '1234567890',
            'email' => 'adminPersonalEmail@gmail.com',
            'gender' => 'Female',
            'maritalStatus' => 'Single',
        ]);

      
      
    }
}
