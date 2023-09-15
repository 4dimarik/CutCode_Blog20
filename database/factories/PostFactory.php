<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'title' => ucfirst(fake()->words(2, true)),
            'text' => fake()->text,
        ];
    }
    public function configure(): static
    {
        return $this->afterCreating(function (Post $post) {
            $post->postCategories()->sync([PostCategory::query()->inRandomOrder()->value('id')]);
        });
    }
}
