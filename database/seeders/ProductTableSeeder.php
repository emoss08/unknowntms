<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use DB;

    class ProductTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $products = [
                [
                    'name' => 'Barbie',
                    'price' => 19.99,
                ],
                [
                    'name' => 'Lego',
                    'price' => 49.99,
                ]
            ];

            DB::table('products')->insert($products);
        }
    }
