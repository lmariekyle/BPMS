<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            PermissionsSeeder::class,
            BarangaySeeder::class,
            SitioSeeder::class,
            ResidentSeeder::class,
            HouseholdSeeder::class,
            ResidentListSeeder::class,
            AdminSeeder::class,
            BHWSeeder::class,
        ]);
    }
}
