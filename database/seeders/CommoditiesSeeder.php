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
            ],
            [
                'status' => 'Active',
                'commodity_id' => 'PROD',
                'description' => 'Produce',
                'entered_by' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'Active',
                'commodity_id' => 'MEAT',
                'description' => 'Meat',
                'entered_by' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'Active',
                'commodity_id' => 'MED',
                'description' => 'Medical Supplies',
                'entered_by' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'Active',
                'commodity_id' => 'HAZ',
                'description' => 'General Hazmat Commodity',
                'entered_by' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'Active',
                'commodity_id' => 'GENR',
                'description' => 'General Commodity',
                'entered_by' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('commodities')->insert($commodities);
    }
}
