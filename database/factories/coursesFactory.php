<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\courses>
 */
class coursesFactory extends Factory
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
            'description' => fake()->text(),
            'image' => fake()->imageUrl(),
            'price' => fake()->numberBetween(0,10),
            'id_category' => fake()->numberBetween(1,6),
            'id_promotions' => fake()->numberBetween(1,6),
            'id_teachers' => fake()->numberBetween(1,6),
            'id_class' => fake()->numberBetween(1,6),
            'status' => 1,
        ];

    }
}
