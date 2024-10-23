<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
            'title' => 'Universitas Harapan Medan',
            'slug' => 'universitas-harapan-medan',
            'body' => '<p>Universitas Harapan Medan adalah universitas swasta di Medan, Sumatera Utara, Indonesia. Universitas ini didirikan pada tahun 2001 oleh Yayasan Pendidikan Harapan Medan. Universitas ini memiliki 4 fakultas.<p>',
            'image' => 'content-images/default-content-image.png',
        ]);
    }
}
