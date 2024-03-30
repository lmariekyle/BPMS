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
        //Year:2023 Quarter:1
        //Cabangyao
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 26],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 33],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 63],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 35],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 205],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 5],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 3],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 196],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 45],
                ['sitioID' => 2, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 144],
            ]
        );

        //Catadman
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 15],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 10],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 15],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 40],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 18],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 122],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 116],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 22],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 19],
                ['sitioID' => 3, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 92],
            ]
        );

        //Guiwanon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 4],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 37],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 14],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 43],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 88],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 31],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 249],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 6],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 4],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 237],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 32],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 52],
                ['sitioID' => 4, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 196],
            ]
        );

        //Hawlandia
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 20],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 18],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 30],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 20],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 49],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 40],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 186],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 5],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 178],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 38],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 26],
                ['sitioID' => 5, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 143],
            ]
        );

        //Hilltops
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 18],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 22],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 47],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 32],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 165],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 4],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 157],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 27],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 29],
                ['sitioID' => 6, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 128],
            ]
        );

        //Ilaya
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 10],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 14],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 13],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 16],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 29],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 21],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 104],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 99],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 3],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 30],
                ['sitioID' => 7, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 80],
            ]
        );

        //Krasher
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 11],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 22],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 11],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 37],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 19],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 118],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 112],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 20],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 18],
                ['sitioID' => 8, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 91],
            ]
        );

        //Labangon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 12],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 13],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 15],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 43],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 22],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 135],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 4],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 3],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 129],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 24],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 29],
                ['sitioID' => 9, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 120],
            ]
        );

        //Lalin
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 14],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 17],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 37],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 25],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 130],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 3],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 124],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 22],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 20],
                ['sitioID' => 10, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 115],
            ]
        );

        //Lapaz
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 4],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 28],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 27],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 36],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 38],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 95],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 33],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 267],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 7],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 5],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 255],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 28],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 59],
                ['sitioID' => 11, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 220],
            ]
        );

        //Sto. Rosario
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 5],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 15],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 15],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 13],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 23],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 25],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 99],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 2],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 95],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 10],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 25],
                ['sitioID' => 12, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 74],
            ]
        );

        //Suba
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 8],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 14],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 16],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 27],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 21],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 101],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 96],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 8],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 25],
                ['sitioID' => 13, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 90],
            ]
        );

        //Tamsapa
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 12],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 7],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 16],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 25],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 33],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 22],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 108],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 103],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 2],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 25],
                ['sitioID' => 14, 'statID' => 1, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 95],
            ]
        );

        //==================================================================================================================
        
        //Year:2023 Quarter:2
        //Cabangyao
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 4],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 26],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 33],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 63],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 33],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 208],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 5],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 199],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 45],
                ['sitioID' => 2, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 146],
            ]
        );

        //Catadman
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 11],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 15],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 12],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 44],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 21],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 123],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 118],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 22],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 19],
                ['sitioID' => 3, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 93],
            ]
        );

        //Guiwanon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 40],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 42],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 80],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 31],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 252],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 5],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 245],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 32],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 52],
                ['sitioID' => 4, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 197],
            ]
        );

        //Hawlandia
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 22],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 17],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 30],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 21],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 49],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 37],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 189],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 2],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 1],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 5],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 175],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 41],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 30],
                ['sitioID' => 5, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 145],
            ]
        );

        //Hilltops
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 19],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 23],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 47],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 32],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 167],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 147],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 37],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 29],
                ['sitioID' => 6, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 128],
            ]
        );

        //Ilaya
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 10],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 15],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 16],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 33],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 25],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 107],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 104],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 8],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 25],
                ['sitioID' => 7, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 84],
            ]
        );

        //Krasher
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 14],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 11],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 11],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 40],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 18],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 120],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 2],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 112],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 16],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 14],
                ['sitioID' => 8, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 87],
            ]
        );

        //Labangon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 12],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 17],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 13],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 18],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 40],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 22],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 138],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 131],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 25],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 27],
                ['sitioID' => 9, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 120],
            ]
        );

        //Lalin
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 15],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 14],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 37],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 25],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 134],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 125],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 21],
                ['sitioID' => 10, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 117],
            ]
        );

        //Lapaz
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 4],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 29],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 30],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 36],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 38],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 100],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 37],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 268],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 4],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 259],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 25],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 58],
                ['sitioID' => 11, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 224],
            ]
        );

        //Sto. Rosario
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 5],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 15],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 16],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 13],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 25],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 26],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 102],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 96],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 12],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 26],
                ['sitioID' => 12, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 77],
            ]
        );

        //Suba
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 9],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 12],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 17],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 29],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 21],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 105],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 97],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 7],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 26],
                ['sitioID' => 13, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 91],
            ]
        );

        //Tamsapa
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 10],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 8],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 15],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 23],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 37],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 23],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 112],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 101],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 6],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 14, 'statID' => 2, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 96],
            ]
        );

        //==================================================================================================================

        //Year:2023 Quarter:3
        //Cabangyao
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 30],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 17],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 31],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 68],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 36],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 212],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 199],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 21],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 40],
                ['sitioID' => 2, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 148],
            ]
        );

        //Catadman
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 14],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 11],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 17],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 12],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 40],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 21],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 120],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 121],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 22],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 3, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 93],
            ]
        );

        //Guiwanon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 4],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 39],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 17],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 44],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 25],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 76],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 31],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 253],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 3],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 254],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 31],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 54],
                ['sitioID' => 4, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 198],
            ]
        );

        //Hawlandia
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 23],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 18],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 31],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 21],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 50],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 37],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 197],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 3],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 177],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 40],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 28],
                ['sitioID' => 5, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 147],
            ]
        );

        //Hilltops
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 17],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 15],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 26],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 45],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 32],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 165],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 152],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 37],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 33],
                ['sitioID' => 6, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 129],
            ]
        );

        //Ilaya
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 8],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 14],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 15],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 35],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 27],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 105],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 100],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 12],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 27],
                ['sitioID' => 7, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 84],
            ]
        );

        //Krasher
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 11],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 11],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 40],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 18],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 121],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 111],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 18],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 16],
                ['sitioID' => 8, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 88],
            ]
        );

        //Labangon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 4],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 12],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 18],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 13],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 40],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 22],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 140],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 4],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 132],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 26],
                ['sitioID' => 9, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 121],
            ]
        );

        //Lalin
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 15],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 20],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 34],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 25],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 134],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 129],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 20],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 10, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 118],
            ]
        );

        //Lapaz
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 5],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 30],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 33],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 36],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 36],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 106],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 37],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 276],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 6],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 3],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 259],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 30],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 59],
                ['sitioID' => 11, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 228],
            ]
        );

        //Sto. Rosario
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 12],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 18],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 16],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 25],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 22],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 104],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 95],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 11],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 28],
                ['sitioID' => 12, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 77],
            ]
        );

        //Suba
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 10],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 12],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 17],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 29],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 21],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 106],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 98],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 8],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 26],
                ['sitioID' => 13, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 92],
            ]
        );

        //Tamsapa
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 10],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 8],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 15],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 23],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 37],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 25],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 113],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 102],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 6],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 14, 'statID' => 3, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 97],
            ]
        );

        //==================================================================================================================
    
        //Year:2023 Quarter:4
        //Cabangyao
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 30],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 19],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 32],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 60],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 34],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 216],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 2],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 3],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 205],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 21],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 40],
                ['sitioID' => 2, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 150],
            ]
        );

        //Catadman
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 12],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 10],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 13],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 44],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 24],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 122],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 4],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 124],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 21],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 3, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 96],
            ]
        );

        //Guiwanon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 4],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 37],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 40],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 84],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 35],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 257],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 253],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 31],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 52],
                ['sitioID' => 4, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 199],
            ]
        );

        //Hawlandia
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 20],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 34],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 23],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 52],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 42],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 201],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 4],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 180],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 39],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 25],
                ['sitioID' => 5, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 150],
            ]
        );

        //Hilltops
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 17],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 15],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 22],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 49],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 29],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 171],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 152],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 35],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 32],
                ['sitioID' => 6, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 130],
            ]
        );

        //Ilaya
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 9],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 15],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 22],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 14],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 38],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 26],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 107],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 2],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 1],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 99],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 10],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 26],
                ['sitioID' => 7, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 85],
            ]
        );

        //Krasher
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 18],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 11],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 13],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 40],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 20],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 122],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 110],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 18],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 17],
                ['sitioID' => 8, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 89],
            ]
        );

        //Labangon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 18],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 13],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 43],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 22],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 139],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 131],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 22],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 26],
                ['sitioID' => 9, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 122],
            ]
        );

        //Lalin
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 15],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 21],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 36],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 26],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 142],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 131],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 22],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 24],
                ['sitioID' => 10, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 120],
            ]
        );

        //Lapaz
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 6],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 29],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 28],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 38],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 41],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 110],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 39],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 285],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 3],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 261],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 32],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 61],
                ['sitioID' => 11, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 231],
            ]
        );

        //Sto. Rosario
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 14],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 12],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 18],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 15],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 26],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 24],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 102],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 4],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 93],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 11],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 27],
                ['sitioID' => 12, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 78],
            ]
        );

        //Suba
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 11],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 11],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 17],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 32],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 23],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 109],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 99],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 8],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 25],
                ['sitioID' => 13, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 93],
            ]
        );

        //Tamsapa
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 8],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 8],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 13],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 21],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 41],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 28],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 114],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 2],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 3],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 104],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 6],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 14, 'statID' => 4, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 98],
            ]
        );

        //==================================================================================================================
        /*
        //Year:2024 Quarter:1
        //Cabangyao
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 4],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 30],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 19],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 33],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 60],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 35],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 222],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 207],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 21],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 38],
                ['sitioID' => 2, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 151],
            ]
        );

        //Catadman
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 11],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 15],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 46],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 24],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 129],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 3],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 127],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 22],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 3, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 99],
            ]
        );

        //Guiwanon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 37],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 17],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 38],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 24],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 88],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 35],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 260],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 254],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 30],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 49],
                ['sitioID' => 4, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 201],
            ]
        );

        //Hawlandia
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 20],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 34],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 26],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 49],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 42],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 202],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 4],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 181],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 41],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 25],
                ['sitioID' => 5, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 151],
            ]
        );

        //Hilltops
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 14],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 23],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 25],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 50],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 28],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 174],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 152],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 34],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 32],
                ['sitioID' => 6, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 131],
            ]
        );

        //Ilaya
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 2],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 9],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 22],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 16],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 36],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 27],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 110],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 102],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 10],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 25],
                ['sitioID' => 7, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 86],
            ]
        );

        //Krasher
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 18],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 11],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 13],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 41],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 20],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 127],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 113],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 18],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 18],
                ['sitioID' => 8, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 91],
            ]
        );

        //Labangon
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 5],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 18],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 10],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 19],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 48],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 23],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 139],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 2],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 128],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 21],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 9, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 124],
            ]
        );

        //Lalin
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 12],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 16],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 22],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 22],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 36],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 26],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 140],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 127],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 21],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 24],
                ['sitioID' => 10, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 121],
            ]
        );

        //Lapaz
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 4],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 8],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 29],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 28],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 38],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 41],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 117],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 43],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 295],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 2],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 267],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 29],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 58],
                ['sitioID' => 11, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 235],
            ]
        );

        //Sto. Rosario
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 2],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 10],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 20],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 17],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 26],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 25],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 109],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 4],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 1],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 0],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 99],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 11],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 27],
                ['sitioID' => 12, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 79],
            ]
        );

        //Suba
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 11],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 13],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 11],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 17],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 32],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 23],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 111],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 107],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 8],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 13, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 94],
            ]
        );

        //Tamsapa
        DB::table('sitio_counts')->insert(
            [
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'N', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'N', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'I', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'I', 'residentCount' => 3],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'U', 'residentCount' => 6],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'U', 'residentCount' => 8],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'S', 'residentCount' => 15],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'S', 'residentCount' => 21],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'A', 'residentCount' => 42],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'A', 'residentCount' => 28],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'WRA', 'residentCount' => 120],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'P', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'AP', 'residentCount' => 0],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'PP', 'residentCount' => 1],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'AB', 'residentCount' => 108],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'M', 'ageGroup' => 'SC', 'residentCount' => 5],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => 'F', 'ageGroup' => 'SC', 'residentCount' => 23],
                ['sitioID' => 14, 'statID' => 5, 'genderGroup' => '--', 'ageGroup' => '--', 'residentCount' => 99],
            ]
        );
        */
        //==================================================================================================================
    
    }

    
}
