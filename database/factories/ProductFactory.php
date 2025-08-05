<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_product' => fake()->name(),
            'description' => fake()->text(),
            'detail_price' => fake()->randomFloat(2, 10, 200),
            'wholesale_price'=>fake()->randomFloat(2, 10, 200),

            //'avatar' => fake()->lastName(),


        ];
    }


}
