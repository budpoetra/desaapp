<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EbookFactory extends Factory
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
            'image' => 'ebook-images/default-ebook-image' . rand(1, 5) . '.jpeg',
            'category_id' => rand(1, 4),
            'ebook' => 'ebook-files/default-ebook-file.pdf',
            'type' => 'application/pdf',
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(fn($p) => "<p>$p</p>")->implode(''),
            'download' => rand(0, 1),
            'user_id' => rand(2, 11)
        ];
    }
}
