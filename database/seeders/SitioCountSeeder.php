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
            'ageGroup' => 'N',
            'residentCount' => '7',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => 'N',
            'residentCount' => '5',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => 'I',
            'residentCount' => '6',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => 'I',
            'residentCount' => '5',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => 'U',
            'residentCount' => '4',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => 'U',
            'residentCount' => '7',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => 'S',
            'residentCount' => '8',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => 'S',
            'residentCount' => '9',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => 'A',
            'residentCount' => '3',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => 'A',
            'residentCount' => '5',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => 'WRA',
            'residentCount' => '11',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => 'P',
            'residentCount' => '6',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => 'AP',
            'residentCount' => '10',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => 'PP',
            'residentCount' => '11',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => 'AB',
            'residentCount' => '12',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'M',
            'ageGroup' => 'SC',
            'residentCount' => '22',
        ]);

        SitioCount::create([
            'sitioID' => '2',
            'statID' => '4',
            'genderGroup' => 'F',
            'ageGroup' => 'SC',
            'residentCount' => '0',
        ]);
    }
}
