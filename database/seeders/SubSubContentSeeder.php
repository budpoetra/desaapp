<?php

namespace Database\Seeders;

use App\Models\SubSubContent;
use Illuminate\Database\Seeder;

class SubSubContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubSubContent::create([
            'sub_content_id' => 1,
            'title' => 'Sastra Inggris',
            'slug' => 'sastra-inggris',
            'body' => '<p>Visi: Menjadi Program Studi unggulan yang mampu menyelenggarakan Tridarma Perguruan Tinggi dengan lulusan bermutu di bidang Ilmu Bahasa dan Sastra Inggris yang mandiri, berwawasan pariwisata budaya (cultural tourism), berdaya saing dengan program studi sejenis di tingkat nasional dan mendapat pengakuan Nasional tahun 2028.</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 1,
            'title' => 'D3 Bahasa Jepang',
            'slug' => 'd3-bahasa-jepang',
            'body' => '<p>Visi: Menjadi Program Studi yang unggul dalam memberi Solusi di bidang Vokasi Manajemen Perkantoran bagi Provinsi Sumatera Utara dan Nasional pada Tahun 2025</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 2,
            'title' => 'Magister Management',
            'slug' => 'magister-management',
            'body' => '<p>Visi: Menjadi Program Studi Yang Mampu Menghasilkan Lulusan Profesional, Kompetitif, Berjiwa Entrepreneur Yang Bermoral Serta Berdasarkan Nilai-Nilai Agama, Serta Mampu Memanfaatkan Teknologi Informasi Untuk Memenuhi Kebutuhan Bisnis Dan Kegiatan Ekonomi Terkini</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 2,
            'title' => 'Akuntansi',
            'slug' => 'akuntansi',
            'body' => '<p>Visi: Menjadi Program Studi yang Unggul dalam memberikan SOLUSI di bidang ilmu Akuntansi bagi Provinsi Sumatera Utara dan Nasional</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 2,
            'title' => 'Management',
            'slug' => 'management',
            'body' => '<p>Visi: Program Studi yang Unggul Melalui Kekompetensian dan Keprofesionalan di Bidang Manajemen dengan Berpijak pada Nilai-Nilai Ketimuran Tahun 2025 di Sumatera Utara dan Nasional</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 2,
            'title' => 'Management Perkantoran',
            'slug' => 'management-perkantoran',
            'body' => '<p>Visi: Menjadi Program Studi yang unggul dalam memberi Solusi di bidang Vokasi Manajemen Perkantoran bagi Provinsi Sumatera Utara dan Nasional pada Tahun 2025</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 3,
            'title' => 'D3 Manajemen Informatika',
            'slug' => 'd3-manajemen-informatika',
            'body' => '<p>Visi: Menjadi Program Studi Vokasi yang Unggul dalam Bidang Rekayasa Komputer, Menghasilkan Sumber Daya Manusia yang Cerdas, Bermoral dan Profesional serta Berjiwa Entrepreneur pada Tingkat Nasional</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 3,
            'title' => 'Sistem Informasi',
            'slug' => 'sistem-informasi',
            'body' => '<p>Visi: Menjadi Program Studi Sistem Informasi yang unggul dalam pengembangan sumber daya manusia berkualitas, menghasilkan lulusan yang kompeten, inovatif, dan adaptif dalam memenuhi kebutuhan industri dan masyarakat di era transformasi digital di tingkat Provinsi Sumatera Utara dan Nasional</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 3,
            'title' => 'Teknik Informatika',
            'slug' => 'teknik-informatika',
            'body' => '<p>Visi: Menjadi Program Studi Teknik Informatika yang unggul dalam bidang Rekayasa dan Komputer Pada Tingkat Nasional</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 3,
            'title' => 'Teknik Elektro',
            'slug' => 'teknik-elektro',
            'body' => '<p>Visi: Menjadi Program Studi Teknik Elektro yang unggul dalam bidang Konversi Energi Listrik dan Telekomunikasi dan dapat memberikan solusi bagi provinsi Sumatera Utara dan Nasional yang berlandaskan Iman, Ilmu dan Amal</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 3,
            'title' => 'Teknik Sipil',
            'slug' => 'teknik-sipil',
            'body' => '<p>Visi: Menjadi Program Studi yang Unggul dan Profesional di Bidang Rekayasa Struktur dan Manajemen Konstruksi Teknik Sipil yang Berstandar Nasional</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 3,
            'title' => 'Teknik Industri',
            'slug' => 'teknik-industri',
            'body' => '<p>Visi: Menjadi Program Studi Teknik Industri yang Unggul dalam Bidang Manufaktur, Perancangan Sistem Kerja dan Mampu Memberikan Solusi secara Berkelanjutan dalam Pengembangan dan Pemberdayaan Potensi Daerah Sumatera Utara</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 3,
            'title' => 'Teknik Mesin',
            'slug' => 'teknik-mesin',
            'body' => '<p>Visi: Menjadi Program Studi Unggul dan Inovatif di Bidang Konversi Energi, Teknik Produksi dan Material, Serta Teknik Pemeliharaan yang mampu Memberikan Solusi Bagi Nasional</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);

        SubSubContent::create([
            'sub_content_id' => 4,
            'title' => 'Hukum',
            'slug' => 'hukum',
            'body' => '<p>Visi: Menjadi Program Studi Hukum yang Unggul dalam Memberikan Solusi di bidang Hukum Bisnis Berstandar Nasional, Menghasilkan Lulusan yang Memiliki Keunggulan Intelektual, Mental, Moral dan Profesional bagi Provinsi Sumatera Utara dan Nasional pada Tahun 2025.</p>',
            'image' => 'content-images/default-sub-sub-content-image.png',
        ]);
    }
}
