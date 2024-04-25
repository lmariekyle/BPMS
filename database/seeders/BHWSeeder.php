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

        // accoutns ni mariekyle

        /*

        Admin - dbarangaypob@gmail.com
        Captain - lourdesmkc@gmail.com
        Secretary - rachelyoo09@gmail.com
        BHW - 19100340@usc.edu.ph

        resident na i demo mariekylec@gmail.com
        
        */

        //GWEN//
        User::create([
            'residentID' => '12',
            'sitioID' => '2',
            'assignedSitioID' => '2',
            'idNumber' => 'S-0001',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Secretary',
            'userstatus' => 'Active',
            'profileImage' => 'images/stacy.jpg',
            'email' => 'rachelyoo09@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('stacybpms'),
        ])->assignRole('Barangay Secretary');

        //Francine Marie//
        User::create([
            'residentID' => '18',
            'sitioID' => '2',
            'assignedSitioID' => '2',
            'idNumber' => 'C-0001',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Captain',
            'userstatus' => 'Active',
            'profileImage' => 'images/lourdes.jpg',
            'email' => 'lourdesmkc@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('lourdesbpms'),
        ])->assignRole('Barangay Captain');

        //Brendon - Lourdes
        User::create([
            'residentID' => '191',
            'sitioID' => '6',
            'assignedSitioID' => '6',
            'idNumber' => 'B-0005',
            'contactnumber' => '09876543211',
            'userlevel' => 'Barangay Health Worker',
            'userstatus' => 'Active',
            'profileImage' => 'images/brendon.jpg',
            'email' => '19100340@usc.edu.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('campomanesbpms'),
        ])->assignRole('Barangay Health Worker');


        // - - - - - - - - - - - - - - - - //
        // accounts ni krissy
        /*
        

        Captain - mimimarna@gmail.com
        Secretary - krponla@gmail.com
        BHW - 19101621@usc.edu.ph
        Resident - ksumho69@gmail.com
        
        */
        // Kris //
        User::create([
            'residentID' => '261',
            'sitioID' => '9',
            'assignedSitioID' => '9',
            'idNumber' => 'C-0002',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Captain',
            'userstatus' => 'Active',
            'profileImage' => 'images/ej.jpg',
            'email' => 'mimimarna@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('krisbpms'),
        ])->assignRole('Barangay Captain');

        // Peter Parker//
        User::create([
            'residentID' => '36',
            'sitioID' => '3',
            'assignedSitioID' => '3',
            'idNumber' => 'S-0002',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Secretary',
            'userstatus' => 'Active',
            'profileImage' => 'images/peter.jpg',
            'email' => 'krponla@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('tyronnebpms'),
        ])->assignRole('Barangay Secretary');

        // kristian
        User::create([
            'residentID' => '111',
            'sitioID' => '4',
            'assignedSitioID' => '4',
            'idNumber' => 'B-0004',
            'contactnumber' => '09876543211',
            'userlevel' => 'Barangay Health Worker',
            'userstatus' => 'Active',
            'profileImage' => 'images/ramon.jpg',
            'email' => '19101621@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('ponlabpms'),
        ])->assignRole('Barangay Health Worker');
        
        
        // JC //
        User::create([
            'residentID' => '110',
            'sitioID' => '4',
            'assignedSitioID' => '4',
            'idNumber' => '23102',
            'contactnumber' => '09876543212',
            'userlevel' => 'User',
            'userstatus' => 'Active',
            'profileImage' => 'images/roman.jpg',
            'email' => 'ksumho69@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('carlobpms'),
        ])->assignRole('User');


        // - - - - - - - - - - - - - - - - //
        // accounts ni cate
        /*
        

        Captain - catefranceszamora1325@gmail.com
        Secretary - zamora.cfc50@gmail.com
        BHW - 19100213@usc.edu.ph
        Resident - glcsaturday@gmail.com
        
        */
        
        //Ollie //
        User::create([
            'residentID' => '102',
            'sitioID' => '3',
            'assignedSitioID' => '3',
            'idNumber' => 'C-0003',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Captain',
            'userstatus' => 'Active',
            'profileImage' => 'images/fritz.jpg',
            'email' => 'catefranceszamora1325@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('olliebpms'),
        ])->assignRole('Barangay Captain');

        //Owen //
        User::create([
            'residentID' => '101',
            'sitioID' => '3',
            'assignedSitioID' => '3',
            'idNumber' => 'S-0003',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Secretary',
            'userstatus' => 'Active',
            'profileImage' => 'images/rommel.jpg',
            'email' => 'zamora.cfc50@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('owenbpms'),
        ])->assignRole('Barangay Secretary');

        //Cate - Cate
        User::create([
            'residentID' => '255',
            'sitioID' => '9',
            'assignedSitioID' => '9',
            'idNumber' => 'B-0002',
            'contactnumber' => '09876543211',
            'userlevel' => 'Barangay Health Worker',
            'userstatus' => 'Active',
            'profileImage' => 'images/symon.jpg',
            'email' => '19100213@usc.edu.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('zamorabpms'),
        ])->assignRole('Barangay Health Worker');
        
        
        //  //
        User::create([
            'residentID' => '103',
            'sitioID' => '3',
            'assignedSitioID' => '3',
            'idNumber' => '23103',
            'contactnumber' => '09876543212',
            'userlevel' => 'User',
            'userstatus' => 'Active',
            'profileImage' => 'images/stacey.jpg',
            'email' => 'glcsaturday@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('marjybpms'),
        ])->assignRole('User');


        // - - - - - - - - - - - - - - - - //
        // accounts ni inie
        /*
        
        Secretary - iniesabado@gmail.com
        BHW - 19101720@usc.edu.ph
        BHW - lemonskwer0@gmail.com
        Resident - saturday.toastghost@gmail.com
        
        */

        //Jobo //
        User::create([
            'residentID' => '249',
            'sitioID' => '8',
            'assignedSitioID' => '8',
            'idNumber' => 'S-0004',
            'contactnumber' => '09876543212',
            'userlevel' => 'Barangay Secretary',
            'userstatus' => 'Active',
            'profileImage' => 'images/jobo.jpg',
            'email' => 'iniesabado@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('jobobpms'),
        ])->assignRole('Barangay Secretary');

        //MILES
        User::create([
            'residentID' => '4',
            'sitioID' => '2',
            'assignedSitioID' => '2',
            'idNumber' => 'B-0001',
            'contactnumber' => '09876543211',
            'userlevel' => 'Barangay Health Worker',
            'userstatus' => 'Active',
            'profileImage' => 'images/morales.jpg',
            'email' => '19101720@usc.edu.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('moralesbpms'),
        ])->assignRole('Barangay Health Worker');

        //Janie
        User::create([
            'residentID' => '250',
            'sitioID' => '8',
            'assignedSitioID' => '8',
            'idNumber' => 'B-0003',
            'contactnumber' => '09179967720',
            'userlevel' => 'Barangay Health Worker',
            'userstatus' => 'Active',
            'profileImage' => 'images/hershey.jpg',
            'email' => 'lemonskwer0@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('sabadobpms'),
        ])->assignRole('Barangay Health Worker');

        // ---- //

        /*
        //PETER//
        User::create([
            'residentID' => '36',
            'sitioID' => '5',
            'assignedSitioID' => '5',
            'idNumber' => '23101',
            'contactnumber' => '09876543212',
            'userlevel' => 'User',
            'userstatus' => 'Active',
            'profileImage' => 'images/peter.jpg',
            'email' => '==----==@usc.edu.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('parkerbpms'),
        ])->assignRole('User');*/
    }
}
