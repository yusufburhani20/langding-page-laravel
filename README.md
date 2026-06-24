# Website Landing Page & Admin Panel - TJKT SMK Fadris

Website resmi Program Keahlian **Teknik Jaringan Komputer dan Telekomunikasi (TJKT) SMK Fadris**. Proyek ini dikembangkan menggunakan framework Laravel dengan desain modern premium (kombinasi tema terang pada konten dan gradasi biru pada hero/header) serta dilengkapi dengan fitur portal berita (blog) dan panel administrasi (admin dashboard) yang lengkap.

---

## 🚀 Fitur Utama

### 1. Landing Page Publik
* **Hero Banner Premium**: Latar belakang animasi video interaktif, teks dengan tipografi *Space Grotesk*, animasi SVG grafis jaringan yang berputar, dan panel statistik dinamis.
* **Kurikulum & Modul**: Menampilkan program studi secara dinamis per kelas (X, XI, XII) lengkap dengan tombol unduh modul dan roadmap belajar.
* **Portal E-Service**: Akses cepat satu pintu menuju berbagai aplikasi internal sekolah (SIAKAD, E-Learning, Portal Orang Tua, BKK, PPDB).
* **Galeri Foto Asimetris**: Dokumentasi kegiatan jurusan dengan tata letak grid Instagram (asimetris modern).
* **Mutu Lulusan (Keunggulan)**: Pencapaian lulusan disertai diagram progress bar tingkat penyerapan kerja dan kesiapan industri.
* **Kontak & Google Maps**: Detail kontak terintegrasi tombol aksi cepat WhatsApp/Website, beserta peta lokasi interaktif.

### 2. Portal Berita & Artikel (`/blog`)
* **Halaman Berita**: Artikel yang terorganisir rapi dengan filter kategori dinamis, pagination, dan widget sidebar (kategori dan artikel terbaru).
* **Detail Artikel**: Halaman baca artikel premium dengan dukungan galeri foto di dalam postingan dan tombol bagikan cepat ke WhatsApp / Facebook.
* **Responsif**: Dioptimalkan sepenuhnya agar tampil sempurna di perangkat mobile maupun desktop.

### 3. Panel Admin Dashboard (`/admin`)
* **Autentikasi Aman**: Login khusus dengan role control (Admin, Editor, Author).
* **Manajemen Konten**: Kelola data Kurikulum, Layanan E-Service, Galeri, Keunggulan, dan Kontak secara dinamis.
* **Manajemen Berita**: CRUD artikel blog lengkap dengan editor teks (WYSIWYG), upload galeri foto pendukung, pengaturan featured image, status draft/publish, dan pengelolaan kategori.
* **Role Restrict**: Penulis (*Author*) hanya dapat mengedit dan mengelola artikel milik mereka sendiri, sementara Administrator memiliki kontrol penuh.
* **Pengaturan Umum & Kustomisasi Tema**: Ubah nama situs, logo, warna primer/sekunder tema, kelengkungan sudut (*border-radius*), dan upload **Favicon Website** langsung dari dashboard.

---

## 🛠️ Spesifikasi Teknologi
* **Framework**: Laravel 11/12/13
* **Bahasa**: PHP >= 8.2 (Kompatibel penuh dengan PHP 8.4)
* **Database**: MySQL / MariaDB
* **Frontend**: HTML5, Blade Templates, Vanilla CSS, FontAwesome 6, Swiper.js, Google Fonts (Space Grotesk & Inter)

---

## 📥 Panduan Instalasi (Lokal / Development)

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di lingkungan lokal Anda:

### 1. Clone Repositori
```bash
git clone https://github.com/yusufburhani20/langding-page-laravel.git
cd langding-page-laravel
```

### 2. Instalasi Dependensi PHP
```bash
composer install
```

### 3. Konfigurasi Environment (`.env`)
Salin file `.env.example` menjadi `.env`:
```bash
copy .env.example .env
```
Buka file `.env` dan konfigurasikan koneksi database Anda (sesuaikan dengan nama DB lokal Anda):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=landing
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Hubungkan Folder Penyimpanan (Storage Link)
Buat symlink agar file gambar yang diunggah di admin panel dapat diakses secara publik:
```bash
php artisan storage:link
```

### 6. Impor Database (`tkj.sql`)
Impor file database yang sudah dikonfigurasi (`tkj.sql` di root direktori project) ke server database lokal Anda:
* **Menggunakan CLI (MySQL/MariaDB)**:
  ```bash
  mysql -u root -p landing < tkj.sql
  ```
* **Atau melalui phpMyAdmin**: Buat database baru bernama `landing`, klik tab **Import**, pilih file `tkj.sql`, lalu klik **Import/Go**.

*Note: Jika ingin memulai dengan database kosongan baru dan membuat data contoh awal, jalankan perintah:*
```bash
php artisan migrate
php artisan db:seed --class=DatabaseSeeder
php artisan db:seed --class=BlogSeeder
```

### 7. Jalankan Server Lokal
```bash
php artisan serve
```
Aplikasi kini dapat diakses di browser melalui alamat: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🔐 Akun Login Dashboard Admin Default
* **Halaman Login**: [http://127.0.0.1:8000/admin/login](http://127.0.0.1:8000/admin/login)
* **Username**: `admin`
* **Password**: `admin123`
*(Sangat disarankan untuk memperbarui password admin di menu Pengguna setelah login pertama).*
