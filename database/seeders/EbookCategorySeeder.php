<?php

namespace Database\Seeders;

use App\Models\EbookCategory;
use Illuminate\Database\Seeder;

class EbookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EbookCategory::create(
            [
                'name' => 'Pengetahuan Umum',
                'slug' => 'pengetahuan-umum',
                'color' => 'color1'
            ]
        );

        EbookCategory::create(
            [
                'name' => 'Hacking',
                'slug' => 'hacking',
                'color' => 'color2'
            ]
        );

        EbookCategory::create(
            [
                'name' => 'Networking',
                'slug' => 'networking',
                'color' => 'color3'
            ]
        );

        EbookCategory::create(
            [
                'name' => 'Other',
                'slug' => 'other',
                'color' => 'color4'
            ]
        );
    }
}
