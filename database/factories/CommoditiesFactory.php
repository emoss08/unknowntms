<?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;

    class CommoditiesFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            return [
                $factory->define(App\Commodities::class, function (Faker\Generator $faker) {
                    return [
                        'name' => $faker->name,
                        'description' => $faker->text,
                        'price' => $faker->randomNumber(2),
                        'quantity' => $faker->randomNumber(2),
                        'image' => $faker->imageUrl(640, 480, 'cats'),
                        'category_id' => $faker->numberBetween(1, 10),
                        'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
                        'updated_at' => $faker->dateTimeBetween('-1 years', 'now'),
                    ];
                }),
            ];
        }
    }
