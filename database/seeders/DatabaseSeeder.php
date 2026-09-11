<?php

namespace Database\Seeders;

use App\Models\Certification;
use App\Models\Experience;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with CV as Single Source of Truth.
     */
    public function run(): void
    {
        // 1. Seed Projects (4 projects exactly from CV)
        Project::truncate();

        $projects = [
            [
                'title' => 'Website E-Commerce Bewole Furniture Jepara',
                'slug' => 'bewole-furniture-jepara',
                'subtitle' => 'Platform E-Commerce Modern Mebel Khas Jepara',
                'description' => 'Mengembangkan website e-commerce menggunakan Laravel 13 dan Tailwind CSS.',
                'problem' => 'Kebutuhan akan sistem e-commerce modern dan responsif untuk memperluas jangkauan pemasaran mebel Jepara, mempermudah pelanggan memilih produk, dan menyederhanakan pengelolaan data transaksi toko.',
                'solution' => 'Membangun aplikasi e-commerce interaktif berbasis Laravel 13 dan Tailwind CSS yang dilengkapi autentikasi Laravel Breeze, katalog produk terstruktur, serta dashboard admin komprehensif.',
                'features' => [
                    'Mengembangkan website e-commerce menggunakan Laravel 13 dan Tailwind CSS',
                    'Membangun sistem autentikasi menggunakan Laravel Breeze',
                    'Membuat dashboard admin untuk mengelola data produk, layanan, dan pelanggan',
                    'Mendesain tampilan website yang responsif dan modern',
                ],
                'image' => '/images/projects/bewole-furniture.jpg',
                'category' => 'E-Commerce',
                'category_badges' => 'E-COMMERCE • LARAVEL 13',
                'technologies' => ['Laravel 13', 'Tailwind CSS', 'Laravel Breeze', 'MySQL', 'PHP'],
                'github_url' => 'https://github.com/reynoandreanwijaksono',
                'live_url' => null,
                'featured' => true,
                'card_style' => 'featured-large',
                'metrics' => [
                    ['label' => 'Framework', 'value' => 'Laravel 13'],
                    ['label' => 'Styling', 'value' => 'Tailwind CSS'],
                    ['label' => 'Auth System', 'value' => 'Breeze'],
                ],
                'challenges' => [
                    'Menyusun arsitektur basis data relasional MySQL untuk katalog mebel yang variatif.',
                    'Membuat antarmuka admin dan storefront yang ramah pengguna serta responsif di berbagai perangkat.',
                ],
                'results' => [
                    'Tersedianya platform katalog online mebel Jepara yang cepat, bersih, dan modern.',
                    'Pengelolaan data produk, layanan, dan pelanggan menjadi terpusat dan efisien.',
                ],
                'sort_order' => 1,
            ],
            [
                'title' => 'Website Portfolio Pribadi',
                'slug' => 'website-portfolio-pribadi',
                'subtitle' => 'Showcase Profil, Keahlian & Proyek Interaktif',
                'description' => 'Membuat website portfolio untuk menampilkan profil, keahlian, dan proyek.',
                'problem' => 'Membutuhkan wadah digital yang profesional dan representatif untuk menampilkan identitas diri, keterampilan web development, desain grafis, serta rekam jejak proyek secara terpadu.',
                'solution' => 'Mengembangkan website portfolio pribadi dengan performa tinggi menggunakan Laravel, Blade, Tailwind CSS, dan MySQL yang dilengkapi dashboard admin untuk mengelola konten portfolio.',
                'features' => [
                    'Membuat website portfolio untuk menampilkan profil, keahlian, dan proyek',
                    'Menggunakan Laravel, Blade, Tailwind CSS, dan MySQL',
                    'Mengimplementasikan fitur dashboard admin untuk mengelola konten portfolio',
                    'Mendukung tema Light Mode dan Dark Mode dengan transisi halus',
                ],
                'image' => '/images/projects/portfolio.jpg',
                'category' => 'Web Development',
                'category_badges' => 'PORTFOLIO • BLADE',
                'technologies' => ['Laravel', 'Blade', 'Tailwind CSS', 'MySQL', 'JavaScript'],
                'github_url' => 'https://github.com/reynoandreanwijaksono',
                'live_url' => config('app.url'),
                'featured' => true,
                'card_style' => 'blue-solid',
                'metrics' => [
                    ['label' => 'Framework', 'value' => 'Laravel'],
                    ['label' => 'Templating', 'value' => 'Blade'],
                    ['label' => 'Theme', 'value' => 'Light & Dark'],
                ],
                'challenges' => [
                    'Menerapkan estetika modern tanpa menggunakan template instan atau elemen kaku.',
                    'Mengintegrasikan form pesan interaktif dengan validasi yang aman.',
                ],
                'results' => [
                    'Menghadirkan identitas visual yang kuat dan memikat bagi pengunjung serta calon klien/mitra.',
                    'Informasi keahlian dan portofolio dapat diperbarui dengan mudah dan terstruktur.',
                ],
                'sort_order' => 2,
            ],
            [
                'title' => 'Desain Konten Media Sosial',
                'slug' => 'desain-konten-media-sosial',
                'subtitle' => 'Poster Promosi, Banner & Konten Visual Instagram',
                'description' => 'Mendesain poster promosi, banner, dan konten Instagram untuk berbagai kegiatan dan organisasi.',
                'problem' => 'Banyak kegiatan dan organisasi memerlukan materi visual promosi yang komunikatif, menarik perhatian audiens, dan selaras dengan identitas brand visual.',
                'solution' => 'Mendesain serangkaian poster promosi, banner digital, dan feed Instagram menggunakan Figma dan Canva dengan pendekatan desain grafis dan UI/UX yang modern.',
                'features' => [
                    'Mendesain poster promosi, banner, dan konten Instagram untuk berbagai kegiatan dan organisasi',
                    'Membuat desain menggunakan Figma, Canva, dan sesuai kebutuhan branding',
                    'Penerapan prinsip tipografi, hierarki visual, dan komposisi warna yang tepat',
                    'Penyesuaian aspek rasio dan resolusi tinggi untuk kebutuhan cetak maupun digital',
                ],
                'image' => '/images/projects/social-media-design.jpg',
                'category' => 'Graphic Design',
                'category_badges' => 'GRAPHIC DESIGN • FIGMA',
                'technologies' => ['Figma', 'Canva', 'UI/UX Design', 'Poster Design', 'Banner Design'],
                'github_url' => null,
                'live_url' => null,
                'featured' => true,
                'card_style' => 'standard',
                'metrics' => [
                    ['label' => 'Tools Utama', 'value' => 'Figma & Canva'],
                    ['label' => 'Fokus Desain', 'value' => 'Promosi & Branding'],
                    ['label' => 'Format', 'value' => 'Print & Digital'],
                ],
                'challenges' => [
                    'Menjaga konsistensi tone visual dan palet warna di setiap materi publikasi.',
                    'Menyampaikan pesan utama secara lugas melalui visual yang bersih dan menarik.',
                ],
                'results' => [
                    'Meningkatkan daya tarik visual publikasi acara dan organisasi.',
                    'Mendapatkan apresiasi positif atas kejelasan pesan dan keindahan tata letak desain.',
                ],
                'sort_order' => 3,
            ],
            [
                'title' => 'Website E-Commerce Aziziscakes',
                'slug' => 'website-ecommerce-aziziscakes',
                'subtitle' => 'Company Profile & Toko Kue Online Responsif',
                'description' => 'Mengembangkan website company profile menggunakan Laravel 13 dan Tailwind CSS.',
                'problem' => 'Pelaku usaha kuliner Aziziscakes memerlukan wadah digital resmi untuk memperkenalkan profil usaha, menampilkan katalog kue segar, dan mengelola pesanan pelanggan secara terorganisir.',
                'solution' => 'Membangun website company profile dan e-commerce berbasis Laravel 13 dan Tailwind CSS, menggunakan Laravel Starter Kit untuk autentikasi dan dashboard admin lengkap.',
                'features' => [
                    'Mengembangkan website company profile menggunakan Laravel 13 dan Tailwind CSS',
                    'Membangun sistem autentikasi menggunakan Laravel Starter Kit',
                    'Membuat dashboard admin untuk mengelola data produk, layanan, dan pelanggan',
                    'Mendesain tampilan website yang responsif dan modern',
                ],
                'image' => '/images/projects/azizicake.jpg',
                'category' => 'E-Commerce',
                'category_badges' => 'COMPANY PROFILE • LARAVEL 13',
                'technologies' => ['Laravel 13', 'Tailwind CSS', 'Laravel Starter Kit', 'MySQL', 'PHP'],
                'github_url' => 'https://github.com/reynoandreanwijaksono',
                'live_url' => null,
                'featured' => true,
                'card_style' => 'accent',
                'metrics' => [
                    ['label' => 'Framework', 'value' => 'Laravel 13'],
                    ['label' => 'Starter Kit', 'value' => 'Laravel Auth'],
                    ['label' => 'Tipe', 'value' => 'Company Profile'],
                ],
                'challenges' => [
                    'Menampilkan foto produk kue secara estetik dengan optimasi kecepatan muat halaman.',
                    'Menghubungkan alur pelanggan dari eksplorasi produk hingga kontak layanan.',
                ],
                'results' => [
                    'Menghadirkan profil bisnis online yang profesional dan terpercaya.',
                    'Mempermudah pemilik usaha memperbarui katalog produk kue secara mandiri.',
                ],
                'sort_order' => 4,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        // 2. Seed Experience & Organization (Exactly from CV)
        Experience::truncate();

        $experiences = [
            [
                'company' => 'SMK Negeri 1 Bangsri',
                'position' => 'Pengembangan Perangkat Lunak dan Gim (PPLG)',
                'period' => '2024 – Sekarang',
                'location' => 'Bangsri, Jepara, Jawa Tengah',
                'description' => 'Menempuh pendidikan kejuruan fokus pada pengembangan website, rekayasa perangkat lunak, dan desain grafis.',
                'responsibilities' => [
                    'Membangun website menggunakan Laravel, PHP, MySQL, HTML, CSS, JavaScript, dan Tailwind CSS.',
                    'Mendesain antarmuka visual, poster promosi, dan banner menggunakan Figma serta Canva.',
                    'Aktif mengerjakan proyek web development mandiri serta berkolaborasi dalam tim.',
                ],
                'is_current' => true,
                'technologies' => ['Laravel', 'PHP', 'MySQL', 'Tailwind CSS', 'JavaScript', 'Figma', 'Canva'],
                'sort_order' => 1,
            ],
            [
                'company' => 'Ekstrakurikuler Bola Voli SMKN 1 Bangsri',
                'position' => 'Anggota Ekstrakurikuler / Olahraga',
                'period' => '2024 – Sekarang',
                'location' => 'SMKN 1 Bangsri',
                'description' => 'Mengasah kemampuan kerja sama tim, komunikasi, sportivitas, dan disiplin melalui kegiatan ekstrakurikuler bola voli.',
                'responsibilities' => [
                    'Berpartisipasi aktif dalam sesi latihan rutin dan agenda kompetisi olahraga sekolah.',
                    'Menerapkan kerja sama dan komunikasi efektif antar anggota tim dalam situasi kompetitif.',
                    'Mengasah manajemen waktu yang baik antara studi akademik kejuruan dan aktivitas organisasi.',
                ],
                'is_current' => true,
                'technologies' => ['Kerja Sama', 'Komunikasi', 'Manajemen Waktu', 'Problem Solving', 'Cepat Beradaptasi'],
                'sort_order' => 2,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }

        // 3. Clear any fake Certifications
        Certification::truncate();
    }
}
