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
            'name' => fake()->name(),
            'id_user' => fake()->numberBetween(0,10),
            'id_course' => fake()->numberBetween(0,10),
            'quantity' => fake()->numberBetween(0,10),
            'order_date' => fake()->date(),
            'total_amount' => fake()->numberBetween(0,10),
            'status' => 1,
        ];
    }
}
