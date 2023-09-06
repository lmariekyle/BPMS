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
            'id' => 'RES-00001',
            'firstName' => 'Admin',
            'middleName' => 'PCSZ',
            'lastName' => 'Capstone',
            'dateOfBirth' => '2000-01-01',
            'contactNumber' => '1234567890',
            'email' => 'adminPersonalEmail@gmail.com',
            'gender' => 'Female',
            'maritalStatus' => 'Single',
        ]);

        Resident::create([
            'id' => 'RES-00002',
            'firstName' => 'Miles',
            'middleName' => 'Davis',
            'lastName' => 'Morales',
            'dateOfBirth' => '2000-01-01',
            'contactNumber' => '09876543211',
            'email' => 'morales@gmail.com',
            'gender' => 'Male',
            'maritalStatus' => 'Single',
        ]);


        Resident::create([
            'id' => 'RES-00003',
            'firstName' => 'Gwen',
            'middleName' => 'Maxine',
            'lastName' => 'Stacy',
            'dateOfBirth' => '2000-01-01',
            'contactNumber' => '09876543212',
            'email' => 'stacy@gmail.com',
            'gender' => 'Feale',
            'maritalStatus' => 'Single',
        ]);


        Resident::create([
            'id' => 'RES-00004',
            'firstName' => 'Lourdes',
            'middleName' => 'Marie',
            'lastName' => 'Kyle',
            'dateOfBirth' => '2000-11-11',
            'contactNumber' => '1234567890',
            'email' => 'lourdeskyle09@gmail.com',
            'gender' => 'Female',
            'maritalStatus' => 'Single',
        ]);

        Resident::create([
            'id' => 'RES-00005',
            'firstName' => 'Weinstein',
            'middleName' => 'Tein',
            'lastName' => 'Dumlao',
            'dateOfBirth' => '2004-06-04',
            'contactNumber' => '1234567890',
            'email' => 'mariekylec@gmail.com',
            'gender' => 'Male',
            'maritalStatus' => 'Single',
        ]);

        Resident::create([
            'id' => 'RES-00006',
            'firstName' => 'John',
            'middleName' => 'Smith',
            'lastName' => 'Doe',
            'dateOfBirth' => '1999-10-09',
            'contactNumber' => '1234567890',
            'email' => 'residentbpms@gmail.com',
            'gender' => 'Male',
            'maritalStatus' => 'Single',
        ]);


    }
}
