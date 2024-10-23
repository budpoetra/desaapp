<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
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
            'image' => 'announcement-images/default-announcement-image.jpg',
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(fn($p) => "<p>$p</p>")->implode('')
        ];
    }
}
