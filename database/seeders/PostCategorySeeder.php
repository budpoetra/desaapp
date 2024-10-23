<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostCategory::create(
            [
                'name' => 'Web Programming',
                'slug' => 'web-programming',
                'color' => 'color1'
            ]
        );

        PostCategory::create(
            [
                'name' => 'Mobile Programming',
                'slug' => 'mobile-programming',
                'color' => 'color2'
            ]
        );

        PostCategory::create(
            [
                'name' => 'Networking',
                'slug' => 'networking',
                'color' => 'color3'
            ]
        );
    }
}
