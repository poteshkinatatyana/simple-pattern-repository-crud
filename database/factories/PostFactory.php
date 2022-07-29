<?php

namespace Database\Factories;

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
    public function definition()
        {
            return [
                'author'         => $this->faker->name(),
                'content'       => $this->faker->sentences(4, true),
                'published' => $this->faker->boolean(),
            ];
        }
}
