<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EquipmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipment_types =
            [
                [
                    'status' => 'Active',
                    'equip_type_id' => 'DV',
                    'description' => 'Dry Van Trailers',
                    'entered_by' => 'system',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'FB',
                    'description' => 'Flat Bed Trailers',
                    'entered_by' => 'system',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'CT',
                    'description' => 'Conestoga Trailers',
                    'entered_by' => 'system',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'RGN',
                    'description' => 'RGN (Removable Gooseneck) Trailers',
                    'entered_by' => 'system',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'SRGN',
                    'description' => 'Stretch RGN Trailers',
                    'entered_by' => 'system',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'LT',
                    'description' => 'Lowboy Trailer',
                    'entered_by' => 'system',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'RF',
                    'description' => 'Refrigerated (Reefer) Trailers',
                    'entered_by' => 'system',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'status' => 'Active',
                    'equip_type_id' => 'ST',
                    'description' => 'Specialized Trailers',
                    'entered_by' => 'system',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ];

        DB::table('equipment_type')->insert($equipment_types);
    }
}
