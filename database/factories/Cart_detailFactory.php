<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart_detail>
 */
class Cart_detailFactory extends Factory
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
            'id_order' => fake()->numberBetween(0,10),
            'id_courses' => fake()->numberBetween(0,10),
        ];
    }
}
