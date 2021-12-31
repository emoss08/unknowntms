<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'display_name' => 'Admin',
                'description' => 'Can access all features!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Buyer',
                'display_name' => 'Buyer',
                'description' => 'Can access limited features!',
                'created_at' => now(),
                'updated_at' => now(),

            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
