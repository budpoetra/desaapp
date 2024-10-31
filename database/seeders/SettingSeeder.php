<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'app_name' => 'Desaapp',
            'app_logo' => 'logos/default-logo.png',
            'home_page_image' => 'home-images/default-home-image.jpg',
            'home_page_header_text' => 'Welcome to Desaapp.com',
            'home_page_second_text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quisquam molestias praesentium at repellat consectetur numquam earum quos impedit placeat, quod itaque ea dolor quis sed aperiam pariatur aliquam assumenda!',
            'app_logo_footer' => 'logos/default-footer-logo.png',
            'footer_text' => 'Suscipit mauris pede for con sectetuer sodales adipisci for cursus fames lectus tempor da blandit gravida sodales Suscipit mauris pede for con sectetuer sodales adipisci for cursus fames lectus tempor da blandit gravida sodales Suscipit mauris pede for sectetuer.',
            'footer_facebook' => 'www.facebook.com',
            'footer_instagram' => 'www.instagram.com',
            'footer_twitter' => 'www.twitter.com',
            'footer_whatsapp' => 'www.whatsapp.com',
            'footer_location' => 'www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17116.36694308702!2d96.79828859976723!3d4.731635818570225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303894f59eb63e21%3A0x1a6e8fb3cdcd994d!2sPante%20Raya%2C%20Wih%20Pesam%2C%20Bener%20Meriah%20Regency%2C%20Aceh!5e1!3m2!1sen!2sid!4v1726048663003!5m2!1sen!2sid',
            'footer_copyright' => 'Desaapp © 2024'
        ]);
    }
}
