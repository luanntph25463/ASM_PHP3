<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\carts>
 */
class cartsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'id_user' => fake()->numberBetween(0,10),
            'comment' => fake()->text(),
            'order_date' => fake()->date(),
            'total_amount' => fake()->numberBetween(0,10),
            'status' => 1,
        ];
    }
}
