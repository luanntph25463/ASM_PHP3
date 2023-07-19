<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\teachers>
 */
class teachersFactory extends Factory
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
        'address' => fake()->address(),
        'image' => fake()->imageUrl(),
        'email' => fake()->safeEmail(),
        'specialized' => fake()->text(),
        'phone' => fake()->phoneNumber(),
        ];
    }
}
