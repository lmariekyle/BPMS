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
            'residentID'=>'RES-00001',
            'houseID'=>'1'
        ]);
    }
}
