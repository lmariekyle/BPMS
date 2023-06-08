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
            'sitioID' => '1',
            'houseNumber' => '1'
        ]);
        
    }
}
