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
            'id' => '1',
            'residentID' => 'RES-00001',
            'firstName' => 'Admin',
            'middleName' => 'PCSZ',
            'lastName' => 'Capstone',
            'dateOfBirth' => '2000-01-01',
            'contactNumber' => '1234567890',
            'email' => 'adminPersonalEmail@gmail.com',
            'gender' => 'F',
            'maritalStatus' => 'Single',
            'dateOfDeath' => null,
            'createdBy' => 2,
            'revisedBy' => 2,
        ]);

        Resident::create([
            'id' => '2',
            'residentID' => 'RES-00002',
            'firstName' => 'Miles',
            'middleName' => 'Davis',
            'lastName' => 'Morales',
            'dateOfBirth' => '2000-01-01',
            'contactNumber' => '09876543211',
            'email' => 'morales@gmail.com',
            'gender' => 'M',
            'maritalStatus' => 'Single',
            'dateOfDeath' => null,
            'createdBy' => 2,
            'revisedBy' => 2,
        ]);


        Resident::create([
            'id' => '3',
            'residentID' => 'RES-00003',
            'firstName' => 'Gwen',
            'middleName' => 'Maxine',
            'lastName' => 'Stacy',
            'dateOfBirth' => '2000-01-01',
            'contactNumber' => '09876543212',
            'email' => 'stacy@gmail.com',
            'gender' => 'F',
            'maritalStatus' => 'Single',
            'dateOfDeath' => null,
            'createdBy' => 2,
            'revisedBy' => 2,
        ]);


        Resident::create([
            'id' => '4',
            'residentID' => 'RES-00004',
            'firstName' => 'Francine',
            'middleName' => 'Marie',
            'lastName' => 'Kyle',
            'dateOfBirth' => '2000-11-11',
            'contactNumber' => '1234567890',
            'email' => 'francine@gmail.com',
            'gender' => 'F',
            'maritalStatus' => 'Single',
            'dateOfDeath' => null,
            'createdBy' => 2,
            'revisedBy' => 2,
        ]);

        Resident::create([
            'id' => '5',
            'residentID' => 'RES-00005',
            'firstName' => 'Zen Christopher',
            'middleName' => 'Camp',
            'lastName' => 'Alonso',
            'dateOfBirth' => '2004-06-04',
            'contactNumber' => '1234567890',
            'email' => 'mariekylec@gmail.com',
            'gender' => 'M',
            'maritalStatus' => 'Single',
            'dateOfDeath' => null,
            'createdBy' => 2,
            'revisedBy' => 2,
        ]);

        Resident::create([
            'id' => '6',
            'residentID' => 'RES-00006',
            'firstName' => 'John',
            'middleName' => 'Smith',
            'lastName' => 'Doe',
            'dateOfBirth' => '1999-10-09',
            'contactNumber' => '1234567890',
            'email' => 'residentbpms@gmail.com',
            'gender' => 'M',
            'maritalStatus' => 'Single',
            'dateOfDeath' => null,
            'createdBy' => 2,
            'revisedBy' => 2,
        ]);

        Resident::create([
            'id' => '7',
            'residentID' => 'RES-00007',
            'firstName' => 'Peter',
            'middleName' => 'Benjamin',
            'lastName' => 'Parker',
            'dateOfBirth' => '1999-10-09',
            'contactNumber' => '1234567890',
            'email' => 'parker@bpms.com',
            'gender' => 'M',
            'maritalStatus' => 'Single',
            'dateOfDeath' => null,
            'createdBy' => 2,
            'revisedBy' => 2,
        ]);

        Resident::create([
            'id' => '8',
            'residentID' => 'RES-00008',
            'firstName' => 'Horeb',
            'middleName' => 'Mendez',
            'lastName' => 'Barriga',
            'dateOfBirth' => '2001-11-18',
            'contactNumber' => '1234567890',
            'email' => 'horeb@bpms.com',
            'gender' => 'M',
            'maritalStatus' => 'Married',
        ]);
    }
}
