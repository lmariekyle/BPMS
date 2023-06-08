<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=> 'Barangay Captain']);
        Role::create(['name'=> 'Barangay Secretary']);
        Role::create(['name'=> 'Barangay Health Worker']);
        Role::create(['name'=> 'User']);
        Role::create(['name'=> 'Admin']);
    }
}
