<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    
        // Permissions for Admin

        $permissions =[
            'view profile',
            'create account',
            'update account',
            'archive account',
            'view account',
            'view request',
            'update request',
            'archive request',
            'approve request',
            'deny request',
            'forward request',
            'approve pickup',
            'search resident',
            'notify resident',
            'view bhw',
            'assign bhw', 
            'send request',
            'filter statistics',
            'print statistics',
            'register household',
            'register resident',
            'view household',
            'update household',
            'update resident',
            'view services',
            'make payment',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }


        $Admin = Role::where('name','Admin')->first();
        $Admin->givePermissionTo([
            'create account',
            'update account',
            'archive account',
            'view account',
            'view request',
            'update request',
            'archive request',
            'approve request',
            'deny request',
        ]);

        $BC = Role::where('name','Barangay Captain')->first();
        $BC->givePermissionTo([
            'view profile',
            'view account',
            'view request',
            'update request',
            'archive request',
            'approve request',
            'forward request',
            'approve pickup',
            'search resident',
            'notify resident',
            'view bhw', 
            'send request',
            'filter statistics',
            'print statistics',
        ]);

        $BS = Role::where('name','Barangay Secretary')->first();
        $BS->givePermissionTo([
            'view profile',
            'view account',
            'view request',
            'update request',
            'archive request',
            'approve request',
            'forward request',
            'approve pickup',
            'deny request',
            'search resident',
            'view bhw', 
            'assign bhw', 
            'send request',
            'filter statistics',
            'print statistics',
        ]);

        $BHW = Role::where('name','Barangay Health Worker')->first();
        $BHW->givePermissionTo([
            'view profile',
            'register household',
            'register resident',
            'view household',
            'update household',
            'update resident',
            'send request',
        ]);

        $Res = Role::where('name','User')->first();
        $Res->givePermissionTo([
            'view profile',
            'create account',
            'send request',
            'view services',
            'make payment',
        ]);

    
    }
}
