<?php

namespace Database\Seeders;

use App\Models\SitioCount;
use Illuminate\Database\Seeder;

class SitioCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => '41-60',
            'residentCount' => '7',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => '0-20',
            'residentCount' => '5',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => '21-40',
            'residentCount' => '6',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => '21-40',
            'residentCount' => '5',
        ]);

        SitioCount::create([
            'sitioID' => '3',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => '0-20',
            'residentCount' => '4',
        ]);

        SitioCount::create([
            'sitioID' => '3',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => '0-20',
            'residentCount' => '7',
        ]);

        SitioCount::create([
            'sitioID' => '3',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => '21-40',
            'residentCount' => '8',
        ]);

        SitioCount::create([
            'sitioID' => '3',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => '21-40',
            'residentCount' => '9',
        ]);

        SitioCount::create([
            'sitioID' => '4',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => '0-20',
            'residentCount' => '3',
        ]);

        SitioCount::create([
            'sitioID' => '4',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => '0-20',
            'residentCount' => '5',
        ]);

        SitioCount::create([
            'sitioID' => '4',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => '21-40',
            'residentCount' => '11',
        ]);

        SitioCount::create([
            'sitioID' => '4',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => '21-40',
            'residentCount' => '6',
        ]);

        SitioCount::create([
            'sitioID' => '5',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => '0-20',
            'residentCount' => '10',
        ]);

        SitioCount::create([
            'sitioID' => '6',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => '0-20',
            'residentCount' => '11',
        ]);

        SitioCount::create([
            'sitioID' => '7',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => '21-40',
            'residentCount' => '12',
        ]);

        SitioCount::create([
            'sitioID' => '8',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => '21-40',
            'residentCount' => '22',
        ]);

        SitioCount::create([
            'sitioID' => '9',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => '0-20',
            'residentCount' => '0',
        ]);

        SitioCount::create([
            'sitioID' => '10',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => '41-60',
            'residentCount' => '24',
        ]);

        SitioCount::create([
            'sitioID' => '11',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => '21-40',
            'residentCount' => '8',
        ]);

        SitioCount::create([
            'sitioID' => '11',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => '21-40',
            'residentCount' => '7',
        ]);

        SitioCount::create([
            'sitioID' => '12',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => '41-60',
            'residentCount' => '20',
        ]);

        SitioCount::create([
            'sitioID' => '13',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => '21-40',
            'residentCount' => '31',
        ]);

        SitioCount::create([
            'sitioID' => '14',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => '21-40',
            'residentCount' => '50',
        ]);
    }
}
