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
            'order_type-list',
            'order_type-create',
            'order_type-edit',
            'order_type-delete',
            'commodities-list',
            'commodities-create',
            'commodities-edit',
            'commodities-delete',
            'tractor-list',
            'tractor-create',
            'tractor-edit',
            'tractor-delete',
            'equipment-type-list',
            'equipment-type-create',
            'equipment-type-edit',
            'equipment-type-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
