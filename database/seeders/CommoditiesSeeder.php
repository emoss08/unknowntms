<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CommoditiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commodities = [
            [
                'status' => 'Active',
                'commodity_id' => 'TEST',
                'description' => 'Test Commodity',
                'entered_by' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('commodities')->insert($commodities);
    }
}
