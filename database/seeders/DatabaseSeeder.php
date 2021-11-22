<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            PermissionTableSeeder::class,
            CommoditiesSeeder::class,
            TractorSeeder::class,
            EquipmentTypeSeeder::class,
            OrderTypeSeeder::class,
            TrailerSeeder::class,
        ]);
    }
}
