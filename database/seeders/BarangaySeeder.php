<?php

namespace Database\Seeders;

use App\Models\Barangay;
use Illuminate\Database\Seeder;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barangay::create([
            'barangayName' => 'Placeholder',
            'municipality' => 'Placeholder',
            'zipCode' => '0000',
            'createdBy' => '1',
            'revisedBy' => '1',
        ]);
        Barangay::create([
            'barangayName' => 'Poblacion',
            'municipality' => 'Dalaguete',
            'zipCode' => '6022',
            'createdBy' => '1',
            'revisedBy' => '1',
        ]);
    }
}
