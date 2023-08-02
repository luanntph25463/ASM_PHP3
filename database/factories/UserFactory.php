<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'ten_kh' => fake()->name(),
            'name' => fake()->name(),
            'image' => fake()->imageUrl(),
            'email' => fake()->safeEmail(),
            'password' => fake()->password(),
            'phone' => fake()->text(),
            'address' => fake()->address(),
            'status' => 1,
            'role' => 1
        ];
    }
}
