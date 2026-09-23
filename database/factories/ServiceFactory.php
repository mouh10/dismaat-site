<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->unique()->words(3, true)),
            'short_description' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'is_active' => true,
            'order' => $this->faker->numberBetween(0, 10),
        ];
    }
}
