<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\News;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => rand(1, 10),
            'title'       => fake()->jobTitle(),
            'author'      => fake()->userName(),
            'status'      => News::DRAFT,
            'is_private'  => false,
            'image'       => fake()->imageUrl(),
            'description' => fake()->text(100),
        ];
    }
}
