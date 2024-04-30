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
            'totalHouseholdsBarangay' => '53',
            'totalResidentsBarangay' => '148',
            'revisedBy' => '1',
            'created_at' => date('Y-m-d H:i:s', strtotime('2023-07-01 08:15:47')),
            'updated_at' => date('Y-m-d H:i:s', strtotime('2023-09-30 19:24:10')),
        ]);

        Statistics::create([
            'year' => '2023',
            'quarter' => '4',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '56',
            'totalResidentsBarangay' => '158',
            'revisedBy' => '1',
            'created_at' => date('Y-m-d H:i:s', strtotime('2023-10-01 10:24:43')),
            'updated_at' => date('Y-m-d H:i:s', strtotime('2023-12-31 19:43:02')),
        ]);

        Statistics::create([
            'year' => '2024',
            'quarter' => '1',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '64',
            'totalResidentsBarangay' => '182',
            'revisedBy' => '1',
            'created_at' => date('Y-m-d H:i:s', strtotime('2024-01-01 09:45:11')),
            'updated_at' => date('Y-m-d H:i:s', strtotime('2024-03-31 20:44:05')),
        ]);
    }
}
