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
            'quarter' => '1',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '1588',
            'totalResidentsBarangay' => '6587',
            'revisedBy' => '1',
        ]);

        Statistics::create([
            'year' => '2023',
            'quarter' => '2',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '1605',
            'totalResidentsBarangay' => '6669',
            'revisedBy' => '1',
        ]);

        Statistics::create([
            'year' => '2023',
            'quarter' => '3',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '1620',
            'totalResidentsBarangay' => '6749',
            'revisedBy' => '1',
        ]);

        Statistics::create([
            'year' => '2023',
            'quarter' => '4',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '1641',
            'totalResidentsBarangay' => '6839',
            'revisedBy' => '1',
        ]);

        Statistics::create([
            'year' => '2024',
            'quarter' => '1',
            'totalHouseholdsSitio' => '0',
            'totalResidentsSitio' => '0',
            'totalHouseholdsBarangay' => '1662',
            'totalResidentsBarangay' => '6929',
            'revisedBy' => '1',
        ]);
    }
}
