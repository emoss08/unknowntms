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
                'display_name' => 'Administrator',
                'description' => 'Can access all features!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User',
                'display_name' => 'User',
                'description' => 'Can access limited features!',
                'created_at' => now(),
                'updated_at' => now(),

            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
