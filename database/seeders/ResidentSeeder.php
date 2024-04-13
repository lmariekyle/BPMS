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
            'maritalStatus' => 'Single',
            'gender' => 'F',
            'occupation' => 'Account Manager',
            'monthlyIncome' => '39000',
            'ageClassification' => 'WRA',
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
            'dateOfBirth' => '2002-05-07',
            'contactNumber' => '09876543211',
            'email' => 'morales@gmail.com',
            'maritalStatus' => 'Single',
            'gender' => 'M',
            'occupation' => 'Barangay Health Worker',
            'monthlyIncome' => '12500',
            'ageClassification' => 'AB',
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
            'dateOfBirth' => '2001-02-20',
            'contactNumber' => '09876543212',
            'email' => 'stacy@gmail.com',
            'maritalStatus' => 'Single',
            'gender' => 'F',
            'occupation' => 'Barangay Secretary',
            'monthlyIncome' => '16000',
            'ageClassification' => 'WRA',
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
            'maritalStatus' => 'Married',
            'gender' => 'F',
            'occupation' => 'Barangay Captain',
            'monthlyIncome' => '21000',
            'ageClassification' => 'WRA',
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
            'maritalStatus' => 'Single',
            'gender' => 'M',
            'occupation' => 'Student',
            'monthlyIncome' => '0',
            'ageClassification' => 'A',
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
            'dateOfBirth' => '1997-10-09',
            'contactNumber' => '1234567890',
            'email' => 'residentbpms@gmail.com',
            'maritalStatus' => 'Single',
            'gender' => 'M',
            'occupation' => 'Doctor',
            'monthlyIncome' => '30000',
            'ageClassification' => 'AB',
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
            'dateOfBirth' => '1980-10-09',
            'contactNumber' => '1234567890',
            'email' => 'parker@bpms.com',
            'maritalStatus' => 'Single',
            'gender' => 'M',
            'occupation' => 'Architect',
            'monthlyIncome' => '31000',
            'ageClassification' => 'AB',
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
            'maritalStatus' => 'Married',
            'gender' => 'M',
            'occupation' => 'IT Programmer',
            'monthlyIncome' => '40000',
            'ageClassification' => 'AB',
        ]);

        Resident::create([
            'id' => '9',
            'residentID' => 'RES-00009',
            'firstName' => 'Mark',
            'middleName' => 'Sola',
            'lastName' => 'Tabangon',
            'dateOfBirth' => '1980-01-27',
            'contactNumber' => '0999913125',
            'email' => 'marktabangon@gmail.com',
            'maritalStatus' => 'Married',
            'gender' => 'M',
            'occupation' => 'Teacher',
            'monthlyIncome' => '20000',
            'ageClassification' => 'AB',
        ]);

        Resident::create([
            'id' => '10',
            'residentID' => 'RES-00010',
            'firstName' => 'Juniper',
            'middleName' => 'Lela',
            'lastName' => 'Tabangon',
            'dateOfBirth' => '1982-03-17',
            'contactNumber' => '0999819478',
            'email' => 'junilela@gmail.com',
            'maritalStatus' => 'Married',
            'gender' => 'F',
            'occupation' => 'Accountant',
            'monthlyIncome' => '17000',
            'ageClassification' => 'WRA',
        ]);

        Resident::create([
            'id' => '11',
            'residentID' => 'RES-00011',
            'firstName' => 'Earl',
            'middleName' => 'Fuente',
            'lastName' => 'Tabangon',
            'dateOfBirth' => '1943-06-12',
            'contactNumber' => '1234567890',
            'email' => 'earltabangon@gmail.com',
            'maritalStatus' => 'Single',
            'gender' => 'M',
            'occupation' => 'Unemployed',
            'monthlyIncome' => '0',
            'ageClassification' => 'SC',
        ]);

        Resident::create([
            'id' => '12',
            'residentID' => 'RES-00012',
            'firstName' => 'Leslie John',
            'middleName' => 'Lela',
            'lastName' => 'Tabangon',
            'dateOfBirth' => '2005-02-13',
            'contactNumber' => '1234567890',
            'email' => 'leslietabangon@gmail.com',
            'maritalStatus' => 'Single',
            'gender' => 'M',
            'occupation' => 'Student',
            'monthlyIncome' => '0',
            'ageClassification' => 'A',
        ]);

        Resident::create([
            'id' => '13',
            'residentID' => 'RES-00013',
            'firstName' => 'Ron',
            'middleName' => 'Lela',
            'lastName' => 'Tabangon',
            'dateOfBirth' => '2008-01-28',
            'contactNumber' => '1234567890',
            'email' => 'rontabangon@gmail.com',
            'maritalStatus' => 'Single',
            'gender' => 'M',
            'occupation' => 'Student',
            'monthlyIncome' => '0',
            'ageClassification' => 'A',
        ]);
    }
}
