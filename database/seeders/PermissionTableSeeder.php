<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

           'customer-list',
           'customer-create',
           'customer-edit',
           'customer-delete',

           'truck-list',
           'truck-create',
           'truck-edit',
           'truck-delete',

           'report-list',
           'report-create',
           'report-edit',
           'report-delete',

           'location-list',
           'location-create',
           'location-edit',
           'location-delete',

           'shipment-list',
           'shipment-create',
           'shipment-edit',
           'shipment-delete',

           'driver-assessment-list',
           'driver-assessment-create',
           'driver-assessment-edit',
           'driver-assessment-delete',

           
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
