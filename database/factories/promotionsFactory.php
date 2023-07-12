<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\promotions>
 */
class promotionsFactory extends Factory
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
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'discount' => fake()->numberBetween(0,100),
            'status' => 1,
        ];
    }
}
