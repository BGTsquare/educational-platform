<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(4);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(100, 1000),
            'youtube_embed_url' => 'https://www.youtube.com/embed/example',
        ];
    }
}
