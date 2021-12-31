<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->is_admin = true;
        $admin->is_active = true;
        $admin->first_name = 'Eric';
        $admin->last_name = 'Moss';
        $admin->username = "admin";
        $admin->email = "admin@gmail.com";
        $admin->password=encrypt('password');
        $admin->save();
    }
}
