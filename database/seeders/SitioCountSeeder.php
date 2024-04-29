<?php

namespace Database\Seeders;

use App\Models\SitioCount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitioCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //==================================================================================================================

        //Year:2023 Quarter:3
        //Cabangyao
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 7],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 4],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 7],
            ]
        );

        //Catadman
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 2],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 6],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 2],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 12],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 2],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 8],
            ]
        );

        //Guiwanon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 4],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 6],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 2],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 5],
            ]
        );

        //Hawlandia
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 8],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 3],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 2],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 2],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 5],
            ]
        );

        //Hilltops
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 3],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 5],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 4],
            ]
        );

        //Ilaya
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 4],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 2],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 2],
            ]
        );

        //Krasher
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 5],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 3],
            ]
        );

        //Labangon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 2],
            ]
        );

        //Lalin
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 2],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 2],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 2],
            ]
        );

        //Lapaz
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 2],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 2],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 2],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 14],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 8],
            ]
        );

        //Sto. Rosario
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 3],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 2],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 3],
            ]
        );

        //Suba
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 5],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 3],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 2],
            ]
        );

        //Tamsapa
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 3],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 2],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 2],
            ]
        );

        //==================================================================================================================
    
        //Year:2023 Quarter:4
        //Cabangyao
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 6],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 4],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 6],
            ]
        );

        //Catadman
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 2],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 3],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 7],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 13],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 3],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 9],
            ]
        );

        //Guiwanon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 4],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 6],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 2],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 5],
            ]
        );

        //Hawlandia
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 8],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 3],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 2],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 2],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 5],
            ]
        );

        //Hilltops
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 3],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 5],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 4],
            ]
        );

        //Ilaya
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 4],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 2],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 2],
            ]
        );

        //Krasher
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 5],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 3],
            ]
        );

        //Labangon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 2],
            ]
        );

        //Lalin
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 2],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 3],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 3],
            ]
        );

        //Lapaz
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 2],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 2],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 3],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 15],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 9],
            ]
        );

        //Sto. Rosario
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 3],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 2],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 3],
            ]
        );

        //Suba
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 6],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 3],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 3],
            ]
        );

        //Tamsapa
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 3],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 2],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 2],
            ]
        );

        //==================================================================================================================
        
        //Year:2024 Quarter:1
        //Cabangyao
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 7],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 5],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 2],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 7],
            ]
        );

        //Catadman
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 2],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 3],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 8],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 14],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 3],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 9],
            ]
        );

        //Guiwanon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 4],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 6],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 2],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 5],
            ]
        );

        //Hawlandia
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 8],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 4],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 3],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 2],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 6],
            ]
        );

        //Hilltops
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 3],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 5],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 4],
            ]
        );

        //Ilaya
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 4],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 2],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 3],
            ]
        );

        //Krasher
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 6],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 2],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 4],
            ]
        );

        //Labangon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 1],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 3],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 3],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 3],
            ]
        );

        //Lalin
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 2],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 3],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 3],
            ]
        );

        //Lapaz
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 2],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 2],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 4],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 16],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 11],
            ]
        );

        //Sto. Rosario
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 3],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 2],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 3],
            ]
        );

        //Suba
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 6],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 3],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 3],
            ]
        );

        //Tamsapa
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 4],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 3],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 3],
            ]
        );
        
        //==================================================================================================================
    
    }

    
}
