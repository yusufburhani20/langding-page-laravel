-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: landing
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('356a192b7913b04c54574d18c28d46e6395428ab','i:1;',1776246050),('356a192b7913b04c54574d18c28d46e6395428ab:timer','i:1776246050;',1776246050),('a17961fa74e9275d529f489537f179c05d50c2f3','i:2;',1776245926),('a17961fa74e9275d529f489537f179c05d50c2f3:timer','i:1776245926;',1776245926);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Administrasi Jaringan','administrasi-jaringan','Artikel seputar konfigurasi router, switch, server, dan infrastruktur jaringan.','2026-06-24 01:02:03','2026-06-24 01:02:03'),(2,'Cybersecurity','cybersecurity','Membahas tentang keamanan siber, enkripsi data, celah keamanan, dan cara mengamankan sistem.','2026-06-24 01:02:03','2026-06-24 01:02:03'),(3,'Kegiatan Jurusan','kegiatan-jurusan','Berita dan dokumentasi kegiatan siswa TJKT SMK Fadris.','2026-06-24 01:02:03','2026-06-24 01:02:03'),(4,'Tips & Tutorial','tips-tutorial','Tutorial praktis, trik konfigurasi, dan tips belajar teknologi informasi.','2026-06-24 01:02:03','2026-06-24 01:02:03');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eservice`
--

DROP TABLE IF EXISTS `eservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eservice` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `icon` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'fas fa-globe',
  `warna` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '#0d6efd',
  `urutan` int NOT NULL DEFAULT '0',
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eservice`
--

LOCK TABLES `eservice` WRITE;
/*!40000 ALTER TABLE `eservice` DISABLE KEYS */;
INSERT INTO `eservice` VALUES (1,'Sistem Administrasi Kelas','https://salirasmk.idrisiyyah.sch.id/login','Kelola administrasi kelas secara digital dan efisien','fas fa-school','#0ea5e9',1,1,'2026-04-13 00:47:40','2026-04-13 00:47:40'),(2,'Google Classroom','https://classroom.google.com/','Platform pembelajaran online interaktif','fas fa-graduation-cap','#8b5cf6',2,1,'2026-04-13 00:47:40','2026-04-13 00:47:40'),(3,'Website Resmi SMK Fadris','http://smk.idrisiyyah.sch.id/','Website yang menghimpun Informasi menyeluruh tentang SMK Fadris Tasikmalaya','fas fa-globe','#0ea5e9',3,1,NULL,NULL);
/*!40000 ALTER TABLE `eservice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `connection` text COLLATE utf8mb4_general_ci NOT NULL,
  `queue` text COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeri` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `foto_url` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instagram_url` varchar(500) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '#',
  `urutan` int NOT NULL DEFAULT '0',
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` VALUES (2,'Paskibraka SMK Fadris','/uploads/img_69f97a28b99ae.jpg','',0,1,NULL,NULL);
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_general_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keunggulan`
--

DROP TABLE IF EXISTS `keunggulan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `keunggulan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'fas fa-star',
  `judul` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `urutan` int NOT NULL DEFAULT '0',
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keunggulan`
--

LOCK TABLES `keunggulan` WRITE;
/*!40000 ALTER TABLE `keunggulan` DISABLE KEYS */;
INSERT INTO `keunggulan` VALUES (1,'fas fa-briefcase','Lulusan Siap Kerja & Kompeten','Alumni kami telah terserap di berbagai perusahaan teknologi terkemuka di Indonesia.',1,1,'2026-04-13 00:47:40','2026-04-13 00:47:40'),(2,'fas fa-handshake','Kerja Sama Dunia Industri','Bermitra dengan perusahaan-perusahaan teknologi dan industri untuk program magang dan rekrutmen.',2,1,'2026-04-13 00:47:40','2026-04-13 00:47:40'),(3,'fas fa-tools','Fasilitas Praktik Modern','Lab komputer lengkap, jaringan fiber optik, dan peralatan praktik terkini.',3,1,'2026-04-13 00:47:40','2026-04-13 00:47:40'),(4,'fas fa-trophy','Program Magang & Pelatihan','Program magang intensif bersertifikat di perusahaan mitra selama 3-6 bulan.',4,1,'2026-04-13 00:47:40','2026-04-13 00:47:40');
/*!40000 ALTER TABLE `keunggulan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kontak`
--

DROP TABLE IF EXISTS `kontak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kontak` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'tkjfaris@smk.idrisiyyah.sch.id',
  `whatsapp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '08xx-xxxx-xxxx',
  `website` varchar(200) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'www.smk.idrisiyyah.sch.id',
  `alamat` text COLLATE utf8mb4_general_ci,
  `maps_embed` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kontak`
--

LOCK TABLES `kontak` WRITE;
/*!40000 ALTER TABLE `kontak` DISABLE KEYS */;
INSERT INTO `kontak` VALUES (1,'tjktsmkidrisiyyah@gmail.com','6281122871122','https://smk.idrisiyyah.sch.id','Pagendingan, Jatihurip, Cisayong, Tasikmalaya 46153',NULL,'2026-04-13 00:47:40','2026-04-13 00:47:40');
/*!40000 ALTER TABLE `kontak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kurikulum`
--

DROP TABLE IF EXISTS `kurikulum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kurikulum` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `kelas` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modul_url` varchar(500) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '#',
  `roadmap_url` varchar(500) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '#',
  `urutan` int NOT NULL DEFAULT '0',
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kurikulum`
--

LOCK TABLES `kurikulum` WRITE;
/*!40000 ALTER TABLE `kurikulum` DISABLE KEYS */;
INSERT INTO `kurikulum` VALUES (1,'Keamanan Jaringan',NULL,NULL,'https://roadmap.sh/r/roadmap-network-5lrg9','https://roadmap.sh/r/roadmap-network-5lrg9',1,1,'2026-04-13 00:47:39','2026-04-13 00:47:39'),(2,'Sistem Komputer',NULL,NULL,'https://drive.google.com/drive/folders/1SqCDgFVRYfUWMUFk_WYI295NqKJtwd-c','https://roadmap.sh/r/roadmap-network-5lrg9',2,1,'2026-04-13 00:47:39','2026-04-13 00:47:39'),(3,'Pemrograman Web',NULL,NULL,'https://drive.google.com/drive/folders/1hG4ErzhuYimdO8AHEw_kqpoqVgPeIIj2','https://roadmap.sh/r/roadmap-network-5lrg9',3,1,'2026-04-13 00:47:39','2026-04-13 00:47:39'),(4,'Perencanaan dan Pengalamatan Jaringan',NULL,NULL,'https://drive.google.com/drive/folders/1AEtctW6tsvxddMJRk3pGvkMYjWL-w5WW','https://roadmap.sh/r/roadmap-network-5lrg9',4,1,'2026-04-13 00:47:39','2026-04-13 00:47:39'),(5,'Administrasi Sistem Jaringan',NULL,NULL,'https://drive.google.com/drive/folders/1_ABnZoANWgdOyuddbyboSmVztUFdjX-G','https://roadmap.sh/r/roadmap-network-5lrg9',6,1,'2026-04-13 00:47:39','2026-04-13 00:47:39'),(6,'Pemrograman Web Lanjutan',NULL,NULL,'https://drive.google.com/drive/folders/1Kta9RTAcYkzJiE8zdML73lQzbxk5UJMw','https://roadmap.sh/r/roadmap-network-5lrg9',8,1,'2026-04-13 00:47:39','2026-04-13 00:47:39'),(7,'Jaringan Dasar',NULL,NULL,'https://drive.google.com/drive/folders/1WaXxK1BamQrc6mfxejZf-IQaGCCSb3rf','https://roadmap.sh/r/roadmap-network-5lrg9',9,1,'2026-04-13 00:47:40','2026-04-13 00:47:40'),(8,'Teknologi Jaringan Kabel dan Nirkabel',NULL,NULL,'https://roadmap.sh/r/roadmap-network-5lrg9','https://roadmap.sh/r/roadmap-network-5lrg9',10,1,'2026-04-13 00:47:40','2026-04-13 00:47:40'),(9,'Design Grafis',NULL,NULL,'https://roadmap.sh/r/roadmap-network-5lrg9','https://roadmap.sh/r/roadmap-network-5lrg9',11,1,'2026-04-13 00:47:40','2026-04-13 00:47:40'),(10,'Digital Marketing',NULL,NULL,'https://drive.google.com/file/d/1iLygS96MEQlcL2tMDj3aH_2mA_wFZfCu/view','https://drive.google.com/file/d/1iLygS96MEQlcL2tMDj3aH_2mA_wFZfCu/view',11,1,'2026-04-13 00:47:40','2026-04-13 00:47:40');
/*!40000 ALTER TABLE `kurikulum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(6,'2026_04_15_142459_add_role_to_users_table',1),(7,'2026_06_24_000001_create_settings_table',1),(8,'2026_06_24_000002_create_kurikulum_table',1),(9,'2026_06_24_000003_create_galeri_table',1),(10,'2026_06_24_000004_create_eservice_table',1),(11,'2026_06_24_000005_create_keunggulan_table',1),(12,'2026_06_24_000006_create_kontak_table',1),(13,'2026_04_15_142725_create_categories_table',2),(14,'2026_04_15_142725_create_posts_table',2),(15,'2026_04_15_143116_create_pages_table',2),(16,'2026_04_15_144812_create_post_images_table',2),(17,'2026_06_24_045128_add_deskripsi_kelas_to_kurikulum',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_images`
--

DROP TABLE IF EXISTS `post_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint unsigned NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_images_post_id_foreign` (`post_id`),
  CONSTRAINT `post_images_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_images`
--

LOCK TABLES `post_images` WRITE;
/*!40000 ALTER TABLE `post_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,3,'Kunjungan Industri TJKT SMK Fadris ke Data Center Modern','kunjungan-industri-tjkt-smk-fadris-ke-data-center-modern','Siswa-siswi TJKT SMK Fadris melakukan kunjungan industri untuk melihat langsung operasional server dan infrastruktur cloud di data center modern.','<p>Kunjungan industri merupakan salah satu program wajib jurusan TJKT SMK Fadris untuk mendekatkan siswa dengan kultur kerja nyata di dunia industri teknologi. Pada kunjungan kali ini, siswa berkesempatan melihat bagaimana server-server berskala besar dikelola, sistem pendingin presisi bekerja, dan keamanan fisik serta logis dari data center dijaga ketat 24/7.</p><p>Siswa juga mendapatkan pemaparan langsung dari Network Engineer setempat mengenai tren teknologi Cloud Computing dan pentingnya efisiensi jaringan fiber optik antardata center.</p>',NULL,'published','2026-06-24 01:02:03','2026-06-24 01:02:03'),(2,1,4,'Panduan Lengkap Belajar Cisco CCNA bagi Pemula di Tahun 2026','panduan-lengkap-belajar-cisco-ccna-bagi-pemula-di-tahun-2026','Ingin berkarir di bidang jaringan? CCNA adalah sertifikasi paling populer. Berikut roadmap belajar terlengkap bagi pemula.','<p>Cisco Certified Network Associate (CCNA) adalah langkah awal yang sangat baik untuk memvalidasi pemahaman Anda tentang konsep dasar jaringan komputer. Di kurikulum baru CCNA 200-301, materi tidak hanya berfokus pada routing dan switching, tetapi juga mencakup dasar-dasar otomatisasi jaringan (Network Automation) dan keamanan.</p><p>Langkah awal belajar mencakup pemahaman model OSI, subnetting IP Address (IPv4 & IPv6), pengenalan perintah dasar IOS Cisco, serta praktik simulasi menggunakan Cisco Packet Tracer.</p>',NULL,'published','2026-06-24 01:02:03','2026-06-24 01:02:03'),(3,1,2,'Mengapa Cybersecurity Sangat Penting di Era Artificial Intelligence?','mengapa-cybersecurity-sangat-penting-di-era-artificial-intelligence','Keamanan siber bukan lagi kebutuhan tambahan melainkan pilar utama sistem informasi di era perkembangan AI yang pesat.','<p>Perkembangan teknologi kecerdasan buatan (AI) membawa kemudahan yang luar biasa, namun di sisi lain juga menghadirkan ancaman siber yang semakin canggih. Para penyerang kini menggunakan AI untuk membuat malware adaptif dan melakukan serangan phishing yang sangat personal.</p><p>Oleh karena itu, keamanan siber (Cybersecurity) menjadi sangat vital. Siswa TJKT dibekali pengetahuan dasar tentang pertahanan jaringan (Network Defense), konfigurasi firewall, enkripsi data, serta etika hacking (Ethical Hacking) untuk melindungi aset digital dari serangan siber.</p>',NULL,'published','2026-06-24 01:02:03','2026-06-24 01:02:03');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_general_ci,
  `payload` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('hBuvXTIf7osGUvwjSbZ7svGLpwtnffg0drn2aH7D',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoia21PdEFUQzlrZlpyRFJjMElQYTV1Z0p0Mk5qUGdkMTV1czIyRTdjVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wb3N0cy9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJDdnSVRwYTJONUtzTlZ4VTFuTDlCa3VhMGI5UTguekREQTY4eTdhY1dyeGxpMUlRelJ4cVdLIjtzOjg6ImZpbGFtZW50IjthOjA6e319',1776072521),('XrK0llBXVEUiF4Pgtsdq0wLV1DzBtoyb3sVpbPYt',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTo3OntzOjY6Il90b2tlbiI7czo0MDoibjNSWDlwQlpLbTdqdXcwWnJiRlh3YldpWU82VjdEblNLdWxzSzd4TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkN2dJVHBhMk41S3NOVnhVMW5MOUJrdWEwYjlROC56RERBNjh5N2FjV3J4bGkxSVF6UnhxV0siO3M6ODoiZmlsYW1lbnQiO2E6MDp7fX0=',1776246041);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `setting_value` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_setting_key_unique` (`setting_key`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'hero_title','Selamat Datang di TJKT SMK Fadris','2026-04-13 00:47:16','2026-04-13 00:47:16'),(2,'hero_subtitle','Saatnya bergabung bersama sekolah vokasi unggulan yang siap mencetak lulusan terampil, berdaya saing tinggi, dan siap kerja!','2026-04-13 00:47:16','2026-04-13 00:47:16'),(3,'profil_text','Jurusan TJKT SMK Fadris adalah jurusan sekolah menengah kejuruan negeri yang memiliki fokus pada pengembangan keterampilan praktis sesuai kebutuhan dunia kerja dan industri saat ini.','2026-04-13 00:47:16','2026-04-13 00:47:16'),(4,'instagram_username','santri_networkers','2026-04-13 00:47:16','2026-04-13 00:47:16'),(5,'site_name','TJKT SMK Fadris','2026-04-13 00:47:16','2026-04-13 00:47:16'),(6,'site_tagline','Teknik Jaringan Komputer dan Telekomunikasi','2026-04-13 00:47:16','2026-04-13 00:47:16'),(7,'site_logo','uploads/img_69f9773ce9316.png','2026-04-13 00:47:16','2026-04-13 00:47:16'),(8,'site_favicon','uploads/img_69f979bd479a8.png','2026-04-13 01:15:44','2026-04-13 01:15:44'),(29,'instagram_widget_code','',NULL,NULL),(30,'profil_image','uploads/img_69f9c85739d9f.jfif',NULL,NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'author',
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Yusuf Burhani, S.Kom','admin','admin',NULL,'$2y$12$mO5S8OsCc4wJ5a1lAzIs3uZJAG7Zrn7KU3KPNznveWanQYZghmRrm',NULL,'2026-04-13 00:47:16','2026-04-13 00:51:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-24 15:02:04
