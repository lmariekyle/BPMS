<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Statistics;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statistics::create([
            'year' => '2023',
            'quarter' => '3',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '43',
            'totalResidentsBarangay' => '124',
            'revisedBy' => '1',
        ]);

        Statistics::create([
            'year' => '2023',
            'quarter' => '4',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '43',
            'totalResidentsBarangay' => '126',
            'revisedBy' => '1',
        ]);

        Statistics::create([
            'year' => '2024',
            'quarter' => '1',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '44',
            'totalResidentsBarangay' => '132',
            'revisedBy' => '1',
        ]);
    }
}
