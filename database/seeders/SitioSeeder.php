<?php

namespace Database\Seeders;

use App\Models\Sitio;
use Illuminate\Database\Seeder;

class SitioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'sitioName',
        ]);

    }
}
