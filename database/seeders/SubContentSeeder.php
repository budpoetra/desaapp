<?php

namespace Database\Seeders;

use App\Models\SubContent;
use Illuminate\Database\Seeder;

class SubContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubContent::create([
            'content_id' => 1,
            'title' => 'Fakultas Bahasa dan Komunikasi',
            'slug' => 'fakultas-bahasa-dan-komunikasi',
            'body' => '<p>Fakultas Bahasa dan Komunikasi merupakan salah satu fakultas di Universitas Harapan Medan yang berperan sebagai pendamping penguasaan bahasa asing dan sebagai wadah peningkatan berbahasa asing serta sebagai pengembang penelitian dan pengabdian pada masyarakat berkaitan dengan Bahasa, sastra dan budaya yang memiliki nilai pariwisata. Sesuai dengan logo Fakultas Bahasa dan Komunikasi, yaitu Putih yang bermakna kesungguhan dalam bekerja untuk meraih tujuan dan Ungu yang bermakna kemegahan.</p>',
            'image' => 'content-images/default-sub-content-image.png',
        ]);

        SubContent::create([
            'content_id' => 1,
            'title' => 'Fakultas Ekonomi dan Bisnis',
            'slug' => 'fakultas-ekonomi-dan-bisnis',
            'body' => '<p>Fakultas Ekonomi dan Bisnis merupakan salah satu fakultas di Universitas Harapan Medan yang berperan sebagai pendamping penguasaan ilmu ekonomi dan bisnis serta sebagai wadah peningkatan kewirausahaan dan sebagai pengembang penelitian dan pengabdian pada masyarakat berkaitan dengan ekonomi dan bisnis yang memiliki nilai pariwisata. Sesuai dengan logo Fakultas Ekonomi dan Bisnis, yaitu Putih yang bermakna kesungguhan dalam bekerja untuk meraih tujuan dan Biru yang bermakna keberanian.</p>',
            'image' => 'content-images/default-sub-content-image.png',
        ]);

        SubContent::create([
            'content_id' => 1,
            'title' => 'Fakultas Teknik dan Komputer',
            'slug' => 'fakultas-teknik-dan-komputer',
            'body' => '<p>Fakultas Teknik dan Komputer merupakan salah satu fakultas di Universitas Harapan Medan yang berperan sebagai pendamping penguasaan ilmu teknik dan komputer serta sebagai wadah peningkatan teknologi informasi dan sebagai pengembang penelitian dan pengabdian pada masyarakat berkaitan dengan teknik dan komputer yang memiliki nilai pariwisata. Sesuai dengan logo Fakultas Teknik dan Komputer, yaitu Putih yang bermakna kesungguhan dalam bekerja untuk meraih tujuan dan Hijau yang bermakna keberuntungan.</p>',
            'image' => 'content-images/default-sub-content-image.png',
        ]);

        SubContent::create([
            'content_id' => 1,
            'title' => 'Fakultas Hukum',
            'slug' => 'fakultas-hukum',
            'body' => '<p>Fakultas Hukum merupakan salah satu fakultas di Universitas Harapan Medan yang berperan sebagai pendamping penguasaan ilmu hukum dan sebagai wadah peningkatan keadilan serta sebagai pengembang penelitian dan pengabdian pada masyarakat berkaitan dengan hukum yang memiliki nilai pariwisata. Sesuai dengan logo Fakultas Hukum, yaitu Putih yang bermakna kesungguhan dalam bekerja untuk meraih tujuan dan Merah yang bermakna keberanian.</p>',
            'image' => 'content-images/default-sub-content-image.png',
        ]);
    }
}
