<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
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
            'thumbnail' => 'thumbnail-videos/default-thumbnail-video' . rand(1, 3) . '.jpeg',
            'source' => 'upload',
            'video' => 'videos/default-video.mp4',
            'yt_link' => '',
            'type' => 'video/mp4',
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(fn($p) => "<p>$p</p>")->implode(''),
            'is_popular' => rand(0, 1),
            'user_id' => rand(2, 11),
            'playlist_video_id' => rand(1, 5)
        ];
    }
}
