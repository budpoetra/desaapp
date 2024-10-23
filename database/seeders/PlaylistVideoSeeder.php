<?php

namespace Database\Seeders;

use App\Models\PlaylistVideo;
use Illuminate\Database\Seeder;

class PlaylistVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlaylistVideo::factory(5)->create();
    }
}
