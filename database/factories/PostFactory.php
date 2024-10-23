<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'image' => 'post-images/default-post-image' . rand(1, 5) . '.png',
            'category_id' => rand(1, 3),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(fn($p) => "<p>$p</p>")->implode(''),
            'user_id' => rand(2, 11)
        ];
    }
}
