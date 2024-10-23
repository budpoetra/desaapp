<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaylistVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'user_id' => rand(2, 11)
        ];
    }
}
