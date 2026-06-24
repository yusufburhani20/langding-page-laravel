<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nama' => 'Administrator',
            'username' => 'admin',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Seed default settings
        \App\Models\Setting::set('hero_title', "Bangun Masa Depan\ndi Dunia Digital");
        \App\Models\Setting::set('hero_subtitle', "Program keahlian Teknik Jaringan Komputer dan Telekomunikasi SMK Fadris — tempat siswa menjadi profesional teknologi yang siap industri.");
        \App\Models\Setting::set('profil_text', 'Program keahlian Teknik Jaringan Komputer dan Telekomunikasi (TJKT) SMK Fadris mendidik siswa menjadi tenaga profesional dalam bidang perancangan, instalasi, dan maintenance jaringan komputer serta sistem telekomunikasi.');
        \App\Models\Setting::set('instagram_username', 'santri_networkers');
        \App\Models\Setting::set('site_name', 'TJKT SMK Fadris');
        \App\Models\Setting::set('site_tagline', 'Teknik Jaringan Komputer & Telekomunikasi');
        \App\Models\Setting::set('theme_primary_color', '#3b82f6');
        \App\Models\Setting::set('theme_secondary_color', '#1d4ed8');
        \App\Models\Setting::set('theme_border_radius', '0.5rem');

        // Seed default kontak
        \App\Models\Kontak::create([
            'email' => 'info@smkfadris.sch.id',
            'whatsapp' => '081234567890',
            'website' => 'https://smkfadris.sch.id',
            'alamat' => 'Jl. Kebon Manggu No. 42, Tasikmalaya, Jawa Barat',
            'maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.281858712165!2d108.2144729!3d-7.3222384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e61546b38c20557%3A0x4ef2894be6bc03e!2sSMK%20Fadris!5e0!3m2!1sid!2sid!4v1713280000000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        ]);

        // Seed Kurikulum
        $kurikulum = [
            ['nama_mapel' => 'Administrasi Infrastruktur Jaringan', 'modul_url' => '#', 'roadmap_url' => '#', 'urutan' => 1, 'aktif' => true],
            ['nama_mapel' => 'Teknologi Layanan Jaringan', 'modul_url' => '#', 'roadmap_url' => '#', 'urutan' => 2, 'aktif' => true],
            ['nama_mapel' => 'Sistem Komputer', 'modul_url' => '#', 'roadmap_url' => '#', 'urutan' => 3, 'aktif' => true],
            ['nama_mapel' => 'Keamanan Jaringan', 'modul_url' => '#', 'roadmap_url' => '#', 'urutan' => 4, 'aktif' => true],
            ['nama_mapel' => 'Cloud Computing', 'modul_url' => '#', 'roadmap_url' => '#', 'urutan' => 5, 'aktif' => true],
            ['nama_mapel' => 'Pemrograman Jaringan', 'modul_url' => '#', 'roadmap_url' => '#', 'urutan' => 6, 'aktif' => true],
        ];
        foreach ($kurikulum as $k) {
            \App\Models\Kurikulum::create($k);
        }

        // Seed Eservice
        $eservices = [
            ['nama' => 'Sistem Informasi Akademik', 'url' => 'https://sia.smkfadris.sch.id', 'deskripsi' => 'Akses nilai, jadwal pelajaran, dan absensi siswa secara realtime melalui portal akademik online.', 'icon' => 'fas fa-graduation-cap', 'warna' => '#00C8FF', 'urutan' => 1, 'aktif' => true],
            ['nama' => 'Portal Orang Tua', 'url' => 'https://parent.smkfadris.sch.id', 'deskripsi' => 'Pantau perkembangan belajar anak, kehadiran, dan komunikasi langsung dengan wali kelas.', 'icon' => 'fas fa-users', 'warna' => '#FF6B2B', 'urutan' => 2, 'aktif' => true],
            ['nama' => 'E-Learning Platform', 'url' => 'https://elearning.smkfadris.sch.id', 'deskripsi' => 'Materi pelajaran, video pembelajaran, dan tugas online tersedia 24/7 untuk siswa.', 'icon' => 'fas fa-book', 'warna' => '#633CB4', 'urutan' => 3, 'aktif' => true],
            ['nama' => 'Pendaftaran Online', 'url' => 'https://ppdb.smkfadris.sch.id', 'deskripsi' => 'Proses pendaftaran peserta didik baru secara digital, cepat, dan transparan tanpa antri.', 'icon' => 'fas fa-user-plus', 'warna' => '#00C8FF', 'urutan' => 4, 'aktif' => true],
            ['nama' => 'Bursa Kerja Siswa', 'url' => 'https://bkk.smkfadris.sch.id', 'deskripsi' => 'Database lowongan kerja dan magang dari mitra industri khusus untuk alumni dan siswa kelas XII.', 'icon' => 'fas fa-briefcase', 'warna' => '#FF6B2B', 'urutan' => 5, 'aktif' => true],
            ['nama' => 'Sertifikasi Kompetensi', 'url' => 'https://lsp.smkfadris.sch.id', 'deskripsi' => 'Pendaftaran dan jadwal uji kompetensi nasional serta sertifikasi Cisco dan MikroTik.', 'icon' => 'fas fa-certificate', 'warna' => '#633CB4', 'urutan' => 6, 'aktif' => true],
        ];
        foreach ($eservices as $e) {
            \App\Models\Eservice::create($e);
        }

        // Seed Keunggulan
        $keunggulans = [
            ['icon' => 'fas fa-award', 'judul' => 'Guru Bersertifikasi Industri', 'deskripsi' => 'Tenaga pengajar bersertifikat Cisco CCNA, MikroTik MTCNA, dan pengalaman industri aktif.', 'urutan' => 1, 'aktif' => true],
            ['icon' => 'fas fa-users-class', 'judul' => 'Kelas Kecil & Intensif', 'deskripsi' => 'Maksimal 30 siswa per kelas memastikan perhatian penuh dan pembelajaran yang efektif.', 'urutan' => 2, 'aktif' => true],
            ['icon' => 'fas fa-briefcase', 'judul' => 'Praktek Industri Nyata', 'deskripsi' => 'Program PKL di perusahaan teknologi terkemuka dengan bimbingan mentor industri berpengalaman.', 'urutan' => 3, 'aktif' => true],
            ['icon' => 'fas fa-laptop-code', 'judul' => 'Fasilitas Lab Lengkap', 'deskripsi' => 'Lab jaringan dengan perangkat Cisco, MikroTik, server rack, dan koneksi fiber optik dedicated.', 'urutan' => 4, 'aktif' => true],
        ];
        foreach ($keunggulans as $k) {
            \App\Models\Keunggulan::create($k);
        }
    }
}
