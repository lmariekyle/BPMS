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
            'year' => '2021',
            'quarter' => '1',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '0',
            'totalResidentsBarangay' => '0',
            'revisedBy' => '1',
        ]);

        Statistics::create([
            'year' => '2022',
            'quarter' => '2',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '0',
            'totalResidentsBarangay' => '0',
            'revisedBy' => '1',
        ]);

        Statistics::create([
            'year' => '2023',
            'quarter' => '3',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '0',
            'totalResidentsBarangay' => '0',
            'revisedBy' => '1',
        ]);

        Statistics::create([
            'year' => '2023',
            'quarter' => '4',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '75',
            'totalResidentsBarangay' => '271',
            'revisedBy' => '1',
        ]);
    }
}
