<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => rtrim(fake()->sentence(), '.'),
            'description' => fake()->text(),
            'content' => fake()->text(800),
            'category_id' => rand(1, 10),
            'image' => 'img/' . rand(1, 5) . '.jpg',
            'status' => rand(1, 3),
            'user_id' => rand(1, 10),
        ];
    }
}
