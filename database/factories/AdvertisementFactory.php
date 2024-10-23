<?php

namespace Database\Factories;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'slug' => $this->faker->slug(),
            'type' => $this->faker->randomElement(['primary', 'seccondary']),
            'target' => $this->faker->boolean(),
            'url' => $this->faker->url(),
            'advertisement' => 'ad-banners/default-ads-banner' . rand(1, 5) . '.gif'
        ];
    }
}
