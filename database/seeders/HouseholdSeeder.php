<?php

namespace Database\Seeders;

use App\Models\Households;
use Illuminate\Database\Seeder;

class HouseholdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Households::create([
            'sitioID' => '2',
            'houseNumber' => '1'
        ]);

        Households::create([
            'sitioID' => '2',
            'houseNumber' => '3'
        ]);
        
        Households::create([
            'sitioID' => '2',
            'houseNumber' => '4'
        ]);

        Households::create([
            'sitioID' => '2',
            'houseNumber' => '5'
        ]);

        Households::create([
            'sitioID' => '2',
            'houseNumber' => '6A'
        ]);

        Households::create([
            'sitioID' => '2',
            'houseNumber' => '6B'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '8'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '9'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '10'
        ]);
        
        Households::create([
            'sitioID' => '3',
            'houseNumber' => '11'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '12'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '13'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '14'
        ]);

        Households::create([
            'sitioID' => '3',
            'houseNumber' => '15'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '16'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '17'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '18'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '19'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '20'
        ]);

        Households::create([
            'sitioID' => '4',
            'houseNumber' => '21'
        ]);

        Households::create([
            'sitioID' => '5',
            'houseNumber' => '22'
        ]);

        Households::create([
            'sitioID' => '5',
            'houseNumber' => '23'
        ]);

        Households::create([
            'sitioID' => '5',
            'houseNumber' => '24'
        ]);

        Households::create([
            'sitioID' => '6',
            'houseNumber' => '25'
        ]);
    }
}
