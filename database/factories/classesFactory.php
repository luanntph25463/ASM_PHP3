<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\classes>
 */
class classesFactory extends Factory
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
            'quantity_member' => fake()->numberBetween(0,10),
            'ca_hoc' => fake()->numberBetween(1,6),
            'status' => 1,
            'id_course' => 1,
        ];
    }
}
