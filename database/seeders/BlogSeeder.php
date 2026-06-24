<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure we have at least one user
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'nama' => 'Administrator',
                'username' => 'admin',
                'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
                'role' => 'admin',
            ]);
        }

        // Seed Categories
        $categories = [
            [
                'name' => 'Administrasi Jaringan',
                'slug' => 'administrasi-jaringan',
                'description' => 'Artikel seputar konfigurasi router, switch, server, dan infrastruktur jaringan.'
            ],
            [
                'name' => 'Cybersecurity',
                'slug' => 'cybersecurity',
                'description' => 'Membahas tentang keamanan siber, enkripsi data, celah keamanan, dan cara mengamankan sistem.'
            ],
            [
                'name' => 'Kegiatan Jurusan',
                'slug' => 'kegiatan-jurusan',
                'description' => 'Berita dan dokumentasi kegiatan siswa TJKT SMK Fadris.'
            ],
            [
                'name' => 'Tips & Tutorial',
                'slug' => 'tips-tutorial',
                'description' => 'Tutorial praktis, trik konfigurasi, dan tips belajar teknologi informasi.'
            ],
        ];

        $catModels = [];
        foreach ($categories as $cat) {
            $catModels[] = Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }

        // Seed Posts
        $posts = [
            [
                'title' => 'Kunjungan Industri TJKT SMK Fadris ke Data Center Modern',
                'slug' => 'kunjungan-industri-tjkt-smk-fadris-ke-data-center-modern',
                'excerpt' => 'Siswa-siswi TJKT SMK Fadris melakukan kunjungan industri untuk melihat langsung operasional server dan infrastruktur cloud di data center modern.',
                'content' => '<p>Kunjungan industri merupakan salah satu program wajib jurusan TJKT SMK Fadris untuk mendekatkan siswa dengan kultur kerja nyata di dunia industri teknologi. Pada kunjungan kali ini, siswa berkesempatan melihat bagaimana server-server berskala besar dikelola, sistem pendingin presisi bekerja, dan keamanan fisik serta logis dari data center dijaga ketat 24/7.</p><p>Siswa juga mendapatkan pemaparan langsung dari Network Engineer setempat mengenai tren teknologi Cloud Computing dan pentingnya efisiensi jaringan fiber optik antardata center.</p>',
                'status' => 'published',
                'category_id' => $catModels[2]->id, // Kegiatan Jurusan
                'user_id' => $user->id,
                'featured_image' => null,
            ],
            [
                'title' => 'Panduan Lengkap Belajar Cisco CCNA bagi Pemula di Tahun 2026',
                'slug' => 'panduan-lengkap-belajar-cisco-ccna-bagi-pemula-di-tahun-2026',
                'excerpt' => 'Ingin berkarir di bidang jaringan? CCNA adalah sertifikasi paling populer. Berikut roadmap belajar terlengkap bagi pemula.',
                'content' => '<p>Cisco Certified Network Associate (CCNA) adalah langkah awal yang sangat baik untuk memvalidasi pemahaman Anda tentang konsep dasar jaringan komputer. Di kurikulum baru CCNA 200-301, materi tidak hanya berfokus pada routing dan switching, tetapi juga mencakup dasar-dasar otomatisasi jaringan (Network Automation) dan keamanan.</p><p>Langkah awal belajar mencakup pemahaman model OSI, subnetting IP Address (IPv4 & IPv6), pengenalan perintah dasar IOS Cisco, serta praktik simulasi menggunakan Cisco Packet Tracer.</p>',
                'status' => 'published',
                'category_id' => $catModels[3]->id, // Tips & Tutorial
                'user_id' => $user->id,
                'featured_image' => null,
            ],
            [
                'title' => 'Mengapa Cybersecurity Sangat Penting di Era Artificial Intelligence?',
                'slug' => 'mengapa-cybersecurity-sangat-penting-di-era-artificial-intelligence',
                'excerpt' => 'Keamanan siber bukan lagi kebutuhan tambahan melainkan pilar utama sistem informasi di era perkembangan AI yang pesat.',
                'content' => '<p>Perkembangan teknologi kecerdasan buatan (AI) membawa kemudahan yang luar biasa, namun di sisi lain juga menghadirkan ancaman siber yang semakin canggih. Para penyerang kini menggunakan AI untuk membuat malware adaptif dan melakukan serangan phishing yang sangat personal.</p><p>Oleh karena itu, keamanan siber (Cybersecurity) menjadi sangat vital. Siswa TJKT dibekali pengetahuan dasar tentang pertahanan jaringan (Network Defense), konfigurasi firewall, enkripsi data, serta etika hacking (Ethical Hacking) untuk melindungi aset digital dari serangan siber.</p>',
                'status' => 'published',
                'category_id' => $catModels[1]->id, // Cybersecurity
                'user_id' => $user->id,
                'featured_image' => null,
            ],
        ];

        foreach ($posts as $post) {
            Post::firstOrCreate(['slug' => $post['slug']], $post);
        }

        $this->command->info('BlogSeeder completed successfully!');
    }
}
