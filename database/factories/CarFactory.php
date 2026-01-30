<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'brand' => fake()->word(),
            'model' => fake()->word(),
            'description' => fake()->text(),
            'year' => fake()->numberBetween(-10000, 10000),
            'is_available' => fake()->boolean(),
        ];
    }
}
