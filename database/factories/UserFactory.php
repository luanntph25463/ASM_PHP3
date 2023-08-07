<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('123456'),
            'phone' => fake()->text(),
            'address' => fake()->address(),
            'status' => 1,
            'role' => 1
        ];
    }
}
