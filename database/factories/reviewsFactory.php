<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reviews>
 */
class reviewsFactory extends Factory
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
            'course_id' => fake()->numberBetween(0,10),
            'id_user' => fake()->numberBetween(0,10),
            'rating' => fake()->numberBetween(0,10),
            'user_name' => fake()->name(),
            'content' => fake()->text(),
        ];
    }
}
