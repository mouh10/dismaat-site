<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->unique()->words(3, true)),
            'brand' => $this->faker->company(),
            'reference' => strtoupper($this->faker->bothify('REF-####??')),
            'short_description' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomElement([null, $this->faker->numberBetween(5000, 1500000)]),
            'is_active' => true,
            'is_featured' => false,
            'order' => $this->faker->numberBetween(0, 20),
        ];
    }
}
