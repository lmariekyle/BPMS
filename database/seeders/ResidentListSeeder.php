<?php

namespace Database\Seeders;

use App\Models\ResidentList;
use Illuminate\Database\Seeder;

class ResidentListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResidentList::create([
            'residentID'=>'1',
            'houseID'=>'1',
            'houseNumber'=>0,
            'householdHead'=>1,
            'memberNumber'=>1,
            'createdBy'=>0,
            'revisedBy'=>0,
        ]);
    }
}
