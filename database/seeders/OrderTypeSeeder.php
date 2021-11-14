<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_types = [
            [
                'status' => 'Active',
                'order_type_id' => 'TEST',
                'description' => 'Test Order Type',
                'entered_by' => 'system',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'Active',
                'order_type_id' => 'INV',
                'description' => 'Invoice Order Type',
                'entered_by' => 'system',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('order_types')->insert($order_types);
    }
}
