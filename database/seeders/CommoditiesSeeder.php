<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;

class CommoditiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 1000; $i++) {
            DB::table('commodities')->insert([
                'status' => 'Active',
                'commodity_id' => Str::random(4),
                'description' => 'Test Commodity',
                'entered_by' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
