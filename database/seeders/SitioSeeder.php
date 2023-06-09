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
            'sitioName' => 'Cambangyao',
        ]);
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'Catadman',
        ]);
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'Guiwanon',
        ]);
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'Hawlandia',
        ]);
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'Hilltops',
        ]);
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'Ilaya',
        ]);
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'Krasher',
        ]);
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'Labangon',
        ]);
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'Lalin',
        ]);
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'Lapaz',
        ]);
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'Sto. Rosario',
        ]);
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'Suba',
        ]);
        Sitio::create([
            'barangayID' => '1',
            'sitioName' => 'Tamsapa',
        ]);

    }
}
