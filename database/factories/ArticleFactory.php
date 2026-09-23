<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => ucfirst($this->faker->unique()->sentence(6)),
            'excerpt' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(3, true),
            'author' => 'DISMAT',
            'is_published' => true,
            'published_at' => now(),
        ];
    }
}
