<?php

namespace Database\Seeders;

use App\Models\SubContent;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\EbookSeeder;
use Database\Seeders\VideoSeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\AnnouncementSeeder;
use Database\Seeders\PostCategorySeeder;
use Database\Seeders\EbookCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'email' => 'desaapp.com@gmail.com',
            'password' =>
            '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'admin',
            'image' => 'user-images/default-user-image.jpg',
            'name' => 'Admin',
            'phone_number' => '081234567890',
            'ttl' => '2023-01-01',
            'gender' => '-',
            'job' => 'Admin Desa',
            'status' => 1,
        ]);

        User::factory(10)->create();
        $this->call([PostSeeder::class, PostCategorySeeder::class, EbookSeeder::class, EbookCategorySeeder::class, AnnouncementSeeder::class, VideoSeeder::class, SettingSeeder::class, AdvertisementSeeder::class, ContentSeeder::class, SubContentSeeder::class, SubSubContentSeeder::class, PlaylistVideoSeeder::class]);
    }
}
