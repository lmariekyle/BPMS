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
            'sitioName' => 'Placeholder',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Cambangyao',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Catadman',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Guiwanon',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Hawlandia',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Hilltops',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Ilaya',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Krasher',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Labangon',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Lalin',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Lapaz',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Sto. Rosario',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Suba',
        ]);
        Sitio::create([
            'barangayID' => '2',
            'sitioName' => 'Tamsapa',
        ]);

    }
}
