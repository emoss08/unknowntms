<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissons = [
            [
                'name' => 'tractor-list',
                'display_name' => 'View Tractors',
                'description' => 'Viewing Tractors',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'tractor-create',
                'display_name' => 'Create Tractors',
                'description' => 'Creating Tractors',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'tractor-edit',
                'display_name' => 'Edit Tractors',
                'description' => 'Editing Tractors',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'tractor-delete',
                'display_name' => 'Delete Tractors',
                'description' => 'Deleting Tractors',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'trailer-list',
                'display_name' => 'View Trailers',
                'description' => 'Viewing Trailers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'trailer-create',
                'display_name' => 'Create Trailers',
                'description' => 'Creating Trailers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'trailer-edit',
                'display_name' => 'Edit Trailers',
                'description' => 'Editing Trailers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'trailer-delete',
                'display_name' => 'Delete Trailers',
                'description' => 'Deleteing Trailers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'order_type-list',
                'display_name' => 'View Order Types',
                'description' => 'Viewing Order Types',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'order_type-create',
                'display_name' => 'Create Order Types',
                'description' => 'Creating Order Types',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'order_type-edit',
                'display_name' => 'Edit Order Types',
                'description' => 'Editing Order Types',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'order_type-delete',
                'display_name' => 'Delete Order Types',
                'description' => 'Deleting Order Types',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'artisan-list',
                'display_name' => 'View Artisan Commands',
                'description' => 'Viewing Artisan Commands in the console',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'artisan-fire',
                'display_name' => 'Fire Artisan Commands',
                'description' => 'Fire Artisan Commands in the console',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'commodities-list',
                'display_name' => 'View Commodities',
                'description' => 'Viewing Commodities',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'commodities-create',
                'display_name' => 'Create Commodities',
                'description' => 'Creating Commodities',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'commodities-edit',
                'display_name' => 'Edit Commodities',
                'description' => 'Editing Commodities',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'commodities-delete',
                'display_name' => 'Delete Commodities',
                'description' => 'Deleting Commodities',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'equipment-type-list',
                'display_name' => 'View Equipment Types',
                'description' => 'Viewing Equipment Types',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'equipment-type-create',
                'display_name' => 'Create Equipment Types',
                'description' => 'Creating Equipment Types',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'equipment-type-edit',
                'display_name' => 'Edit Equipment Types',
                'description' => 'Editing Equipment Types',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'equipment-type-delete',
                'display_name' => 'Delete Equipment Types',
                'description' => 'Deleting Equipment Types',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('permissions')->insert($permissons);
    }
}
