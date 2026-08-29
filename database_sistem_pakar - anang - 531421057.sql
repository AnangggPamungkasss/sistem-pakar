-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2026 at 06:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_sistem_pakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_rule` varchar(10) NOT NULL,
  `gejala_id` bigint(20) UNSIGNED NOT NULL,
  `cedera_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`id`, `kode_rule`, `gejala_id`, `cedera_id`, `created_at`, `updated_at`) VALUES
(195, 'R017', 1, 1, '2025-12-25 02:51:55', '2025-12-25 02:51:55'),
(196, 'R017', 2, 1, '2025-12-25 02:51:55', '2025-12-25 02:51:55'),
(197, 'R017', 4, 1, '2025-12-25 02:51:55', '2025-12-25 02:51:55'),
(198, 'R017', 6, 1, '2025-12-25 02:51:55', '2025-12-25 02:51:55'),
(199, 'R017', 8, 1, '2025-12-25 02:51:55', '2025-12-25 02:51:55'),
(200, 'R017', 13, 1, '2025-12-25 02:51:55', '2025-12-25 02:51:55'),
(201, 'R017', 17, 1, '2025-12-25 02:51:55', '2025-12-25 02:51:55'),
(202, 'R017', 19, 1, '2025-12-25 02:51:55', '2025-12-25 02:51:55'),
(203, 'R017', 25, 1, '2025-12-25 02:51:55', '2025-12-25 02:51:55'),
(261, 'R024', 12, 4, '2025-12-25 05:53:50', '2025-12-25 05:53:50'),
(262, 'R024', 14, 4, '2025-12-25 05:53:50', '2025-12-25 05:53:50'),
(263, 'R024', 16, 4, '2025-12-25 05:53:50', '2025-12-25 05:53:50'),
(264, 'R024', 20, 4, '2025-12-25 05:53:50', '2025-12-25 05:53:50'),
(265, 'R024', 26, 4, '2025-12-25 05:53:50', '2025-12-25 05:53:50'),
(266, 'R024', 35, 4, '2025-12-25 05:53:50', '2025-12-25 05:53:50'),
(267, 'R024', 45, 4, '2025-12-25 05:53:50', '2025-12-25 05:53:50'),
(268, 'R025', 1, 6, '2026-01-06 23:43:57', '2026-01-06 23:43:57'),
(269, 'R025', 3, 6, '2026-01-06 23:43:57', '2026-01-06 23:43:57'),
(270, 'R025', 4, 6, '2026-01-06 23:43:57', '2026-01-06 23:43:57'),
(271, 'R025', 5, 6, '2026-01-06 23:43:57', '2026-01-06 23:43:57'),
(272, 'R025', 6, 6, '2026-01-06 23:43:57', '2026-01-06 23:43:57'),
(273, 'R025', 17, 6, '2026-01-06 23:43:57', '2026-01-06 23:43:57'),
(274, 'R025', 36, 6, '2026-01-06 23:43:57', '2026-01-06 23:43:57'),
(275, 'R025', 37, 6, '2026-01-06 23:43:57', '2026-01-06 23:43:57'),
(276, 'R025', 40, 6, '2026-01-06 23:43:57', '2026-01-06 23:43:57'),
(277, 'R025', 43, 6, '2026-01-06 23:43:57', '2026-01-06 23:43:57'),
(278, 'R025', 44, 6, '2026-01-06 23:43:57', '2026-01-06 23:43:57'),
(279, 'R026', 1, 2, '2026-01-09 07:09:38', '2026-01-09 07:09:38'),
(280, 'R026', 10, 2, '2026-01-09 07:09:38', '2026-01-09 07:09:38'),
(281, 'R026', 15, 2, '2026-01-09 07:09:38', '2026-01-09 07:09:38'),
(282, 'R026', 18, 2, '2026-01-09 07:09:38', '2026-01-09 07:09:38'),
(283, 'R026', 21, 2, '2026-01-09 07:09:38', '2026-01-09 07:09:38'),
(284, 'R026', 22, 2, '2026-01-09 07:09:38', '2026-01-09 07:09:38'),
(285, 'R026', 23, 2, '2026-01-09 07:09:38', '2026-01-09 07:09:38'),
(286, 'R026', 27, 2, '2026-01-09 07:09:38', '2026-01-09 07:09:38'),
(287, 'R026', 39, 2, '2026-01-09 07:09:38', '2026-01-09 07:09:38'),
(288, 'R027', 1, 3, '2026-01-09 07:09:51', '2026-01-09 07:09:51'),
(289, 'R027', 7, 3, '2026-01-09 07:09:51', '2026-01-09 07:09:51'),
(290, 'R027', 9, 3, '2026-01-09 07:09:51', '2026-01-09 07:09:51'),
(291, 'R027', 18, 3, '2026-01-09 07:09:51', '2026-01-09 07:09:51'),
(292, 'R027', 21, 3, '2026-01-09 07:09:51', '2026-01-09 07:09:51'),
(293, 'R027', 23, 3, '2026-01-09 07:09:51', '2026-01-09 07:09:51'),
(294, 'R027', 24, 3, '2026-01-09 07:09:51', '2026-01-09 07:09:51'),
(295, 'R027', 27, 3, '2026-01-09 07:09:51', '2026-01-09 07:09:51'),
(296, 'R027', 44, 3, '2026-01-09 07:09:51', '2026-01-09 07:09:51'),
(297, 'R028', 1, 5, '2026-01-09 07:09:59', '2026-01-09 07:09:59'),
(298, 'R028', 8, 5, '2026-01-09 07:09:59', '2026-01-09 07:09:59'),
(299, 'R028', 17, 5, '2026-01-09 07:09:59', '2026-01-09 07:09:59'),
(300, 'R028', 38, 5, '2026-01-09 07:09:59', '2026-01-09 07:09:59'),
(301, 'R028', 41, 5, '2026-01-09 07:09:59', '2026-01-09 07:09:59'),
(302, 'R028', 42, 5, '2026-01-09 07:09:59', '2026-01-09 07:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cedera`
--

CREATE TABLE `cedera` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_cedera` varchar(10) NOT NULL,
  `nama_cedera` varchar(225) NOT NULL,
  `penanganan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cedera`
--

INSERT INTO `cedera` (`id`, `kode_cedera`, `nama_cedera`, `penanganan`, `created_at`, `updated_at`) VALUES
(1, 'C001', 'Angkle', '[\"Istirahatkan pergelangan kaki dari aktivitas berat\",\"Kompres pergelangan kaki menggunakan es selama 15-20 menit setiap 3 jam sekali pada 3 hari pertama setelah cedera\",\"Posisikan kaki lebih tinggi dari jantung saat duduk atau tidur\",\"Hindari menapakkan kaki yang cedera selama 24\\u201348 jam pertama\",\"Gunakan tongkat saat berjalan untuk mengurangi tekanan pada pergelangan kaki\",\"Segera lakukan pemeriksaan MRI ke tenaga medis terdekat untuk mengetahui tingkat keparahan cedera\"]', '2025-08-24 11:05:45', '2025-11-29 06:11:39'),
(2, 'C002', 'Anterior Cruciate Ligament (ACL)', '[\"Istirahatkan lutut dari aktivitas berat\",\"Posisikan lutut lebih tinggi dari tubuh saat beristirahat\",\"Kompres lutut menggunakan es selama 15-20 menit setiap 6 jam sekali pada 3 hari pertama setelah cedera\",\"Hindari berlari dan melompat\",\"Hindari memijat bagian lutut secara langsung\",\"Hindari duduk dalam posisi lutut tertekuk dalam waktu lama\",\"Gunakan tongkat bantu jika terasa nyeri saat berjalan\",\"Segera lakukan pemeriksaan MRI ke tenaga medis terdekat untuk mengetahui tingkat keparahan cedera\"]', '2025-08-24 11:05:45', '2025-11-16 01:07:12'),
(3, 'C003', 'Meniskus', '[\"Istirahatkan lutut dari segala aktivitas berat\",\"Kompres lutut menggunakan es selama 15-20 menit setiap 6 jam sekali pada 3 hari pertama setelah cedera\",\"Hindari menekuk lutut terlalu dalam\",\"Hindari duduk dengan lutut tertekuk\",\"Hindari memijat bagian lutut secara langsung\",\"Hindari aktivitas naik turun tangga secara berulang\",\"Gunakan bantal pada bagian bawah lutut pada saat tidur\",\"segera lakukan pemeriksaan mri ke tenaga medis terdekat untuk mengetahui tingkat keparahan cedera\"]', '2025-08-24 11:05:45', '2025-12-16 06:30:47'),
(4, 'C004', 'Hamstring', '[\"istirahatkan kaki dari aktivitas berat\",\"Posisikan kaki lebih tinggi dari kepala saat beristirahat\",\"Kompres paha bagian dalam menggunakan es selama 15-20 menit setiap 6 jam sekali pada 3 hari pertama setelah cedera\",\"Hindari memijat bagian paha dalam\\/belakang secara langsung\",\"Hindari berlari terlalu kencang\",\"Hindari duduk terlalu lama tanpa mengganti posisi\",\"Gunakan bantal di bawah lutut saat tidur untuk mengurangi tekanan pada bagian belakang paha\",\"Segera lakukan pemeriksaan mri ke tenaga medis terdekat untuk mengetahui tingkat keparahan cedera\"]', '2025-08-24 11:05:45', '2025-12-16 07:20:04'),
(5, 'C005', 'Dislokasi', '[\"segera pergi ke fasilitas medis terdekat\",\"jangan mencoba mereposisi (memperbaiki) sendi sendiri\",\"hindari menggerakan bagian sendi yang cedera\",\"Tahan bagian yang cedera agar tidak terlalu banyak bergerak dengan menggunakan kain\",\"Hindari aktivitas yang melibatkan sendi yang baru direposisi selama minimal 2 minggu\",\"jangan memijat area sendi yang cedera\"]', '2025-08-24 11:05:45', '2025-11-16 01:57:45'),
(6, 'C006', 'Fraktur', '[\"segera pergi ke fasilitas medis terdekat untuk mendapatkan bantuan\",\"jangan memijat area tubuh yang patah\",\"Jangan menggerakkan bagian yang patah lalu usahakan agar tetap diam dan tidak berubah posisinya\",\"Hindari menopang beban berat pada bagian tubuh yang mengalami patah tulang\",\"Hindari mengangkat atau menggerakakan bagian tubuh yang mengalami patah tulang\"]', '2025-08-24 11:05:45', '2025-11-29 06:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(225) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `kode_gejala`, `nama_gejala`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'G001', 'Bengkak', 'gejala/qxJUWDmIFntrEBboHLX2VnAdxy4h2Cg8pHfpzdDr.jpg', '2025-08-24 11:00:24', '2025-09-04 07:14:21'),
(2, 'G002', 'Kaku pada otot sekitar cedera', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(3, 'G003', 'Mati rasa', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(4, 'G004', 'Memar', 'gejala/sGY27prIQOkAEd96I1mEQSshmGq3CIbgBzCwLRMv.jpg', '2025-08-24 11:00:24', '2025-09-04 07:14:40'),
(5, 'G005', 'Nyeri tajam mendadak saat cedera terjadi', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(6, 'G006', 'Nyeri saat disentuh', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(7, 'G007', 'Nyeri saat menekuk lutut', NULL, '2025-08-24 11:00:24', '2025-12-25 02:14:14'),
(8, 'G008', 'Nyeri saat berjalan', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(9, 'G009', 'Nyeri saat berlari', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(10, 'G010', 'Nyeri saat melompat', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(12, 'G011', 'Nyeri saat duduk atau berdiri lama', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(13, 'G012', 'Nyeri saat memutar pergelangan kaki', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(14, 'G013', 'Nyeri saat mengangkat kaki', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(15, 'G014', 'Nyeri saat tiba-tiba bergerak ke arah lain', '', '2025-08-24 11:00:24', '2025-09-04 07:15:52'),
(16, 'G015', 'Sensasi panas atau terbakar pada area cedera', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(17, 'G016', 'Sulit berdiri', NULL, '2025-08-24 11:00:24', '2026-01-09 07:11:58'),
(18, 'G017', 'Sulit menggerakan lutut', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(19, 'G018', 'Sulit menggerakan pergelangan kaki', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(20, 'G019', 'Sulit meluruskan kaki', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(21, 'G020', 'Sulit berdiri dari posisi jongkok', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(22, 'G021', 'Sensasi goyah atau tidak stabil pada area cedera', NULL, '2025-08-24 11:00:24', '2025-11-16 07:35:26'),
(23, 'G022', 'Tidak bisa berdiri saat terjadi cedera', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(24, 'G023', 'Lutut terasa mengunci saat digerakkan.', NULL, '2025-08-24 11:00:24', '2025-11-16 07:42:49'),
(25, 'G024', 'Terdengar bunyi saat digerakan', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(26, 'G025', 'Terasa tertarik di bagian belakang paha', 'gejala/bex54MKJ9Em8zdf512G5xTxHtZ0IGFR7nZrE76Xf.jpg', '2025-08-24 11:00:24', '2025-09-04 07:16:28'),
(27, 'G026', 'Terdengar bunyi tek atau pop saat cedera', NULL, '2025-08-24 11:00:24', '2025-08-24 11:00:24'),
(35, 'G027', 'Sensasi kram pada otot sekitar cedera', NULL, '2025-12-25 02:33:35', '2025-12-25 02:33:35'),
(36, 'G028', 'Nyeri tidak berkurang saat istirahat', NULL, '2025-12-25 02:48:03', '2025-12-25 02:48:03'),
(37, 'G029', 'Nyeri berdenyut pada area cedera', NULL, '2025-12-25 02:48:31', '2025-12-25 02:48:31'),
(38, 'G030', 'Sensasi tertekan dan terasa penuh pada area cedera', NULL, '2025-12-25 02:48:53', '2025-12-25 02:48:53'),
(39, 'G031', 'Lutut terasa tidak optimal saat digunakan', NULL, '2025-12-25 02:49:13', '2025-12-25 02:49:13'),
(40, 'G032', 'Bagian yang cedera tidak kuat menahan berat badan', NULL, '2025-12-25 02:49:31', '2025-12-25 02:49:31'),
(41, 'G033', 'Sendi yang cedera tidak bisa digerakkan', NULL, '2025-12-25 02:49:49', '2025-12-25 02:49:49'),
(42, 'G034', 'Sendi terasa bergeser dari posisi normal', NULL, '2025-12-25 02:50:06', '2025-12-25 02:50:06'),
(43, 'G035', 'Bentuk tulang tampak bengkok atau tidak normal', NULL, '2025-12-25 02:50:21', '2025-12-25 02:50:21'),
(44, 'G036', 'Nyeri terasa di satu sisi sendi saja', NULL, '2025-12-25 02:50:36', '2025-12-25 02:50:36'),
(45, 'G037', 'Nyeri menjalar ke otot sekitar', NULL, '2025-12-25 02:50:56', '2025-12-25 02:50:56'),
(46, 'G038', 'coba', NULL, '2026-01-06 21:50:52', '2026-01-06 21:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_11_162904_create_cedera_table', 1),
(5, '2025_08_11_172602_create_gejala_table', 1),
(6, '2025_08_11_173106_create_basis_pengetahuan_table', 1),
(7, '2025_08_16_160447_create_roles_table', 1),
(8, '2025_08_16_160718_add_role_id_to_users', 1),
(9, '2025_08_22_153946_update_basis_pengetahuan_drop_unique_table', 1),
(10, '2025_08_29_152305_add_gambar_to_gejala_table', 2),
(11, '2025_08_29_172732_create_riwayat_diagnosa_table', 3),
(12, '2025_10_17_151918_create_notifikasi_table', 4),
(13, '2025_11_16_080035_add_fields_to_notifikasi_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `target_role` bigint(20) UNSIGNED DEFAULT NULL,
  `dibuat_oleh` bigint(20) UNSIGNED DEFAULT NULL,
  `tipe` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `dibaca` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `target_role`, `dibuat_oleh`, `tipe`, `pesan`, `dibaca`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'aktivitas_pakar', 'Pakar Pakar memperbarui basis pengetahuan untuk cedera: cedera tes', 1, '2025-10-19 13:05:19', '2025-10-22 08:24:14'),
(2, NULL, NULL, 'aktivitas_pakar', 'Pakar Admin memperbarui basis pengetahuan untuk cedera: Hamstring', 1, '2025-10-22 09:03:55', '2025-10-25 12:39:18'),
(3, NULL, NULL, 'aktivitas_pakar', 'Pakar Admin menghapus cedera: cedera tes', 1, '2025-11-09 07:02:41', '2025-11-09 07:03:05'),
(4, NULL, NULL, 'aktivitas_pakar', 'Pakar Admin memperbarui cedera: Angkle', 0, '2025-11-16 01:02:31', '2025-11-16 01:02:31'),
(5, NULL, NULL, 'aktivitas_pakar', 'Pakar Admin memperbarui cedera: Anterior Cruciate Ligament (ACL)', 0, '2025-11-16 01:06:02', '2025-11-16 01:06:02'),
(6, NULL, NULL, 'aktivitas_pakar', 'Pakar Pakar memperbarui cedera: Anterior Cruciate Ligament (ACL)', 0, '2025-11-16 01:07:12', '2025-11-16 01:07:12'),
(7, NULL, NULL, 'aktivitas_pakar', 'Pakar memperbarui cedera: Meniskus', 0, '2025-11-16 01:22:37', '2025-11-16 01:22:37'),
(8, 1, 10, 'aktivitas_pakar', 'Pakar memperbarui cedera: Meniskus', 1, '2025-11-16 01:25:31', '2025-11-16 01:51:32'),
(9, 1, 10, 'aktivitas_pakar', 'Pakar memperbarui cedera: Hamstring', 1, '2025-11-16 01:40:39', '2025-11-16 01:51:42'),
(10, 1, 10, 'aktivitas_pakar', 'Pakar memperbarui cedera: Hamstring', 1, '2025-11-16 01:53:29', '2025-11-16 01:54:34'),
(11, 1, 13, 'registrasi', 'User baru Mendaftar: ucup gerso', 1, '2025-11-16 02:08:48', '2025-11-16 02:09:32'),
(12, 1, 10, 'aktivitas_pakar', 'Pakar memperbarui basis pengetahuan untuk cedera: Anterior Cruciate Ligament (ACL)', 1, '2025-11-18 19:41:36', '2025-11-23 10:27:59'),
(13, 1, 14, 'registrasi', 'Pasien baru Mendaftar: hanya', 1, '2026-01-06 22:55:40', '2026-01-07 20:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_diagnosa`
--

CREATE TABLE `riwayat_diagnosa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cedera_id` bigint(20) UNSIGNED NOT NULL,
  `gejala_dipilih` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`gejala_dipilih`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_diagnosa`
--

INSERT INTO `riwayat_diagnosa` (`id`, `user_id`, `cedera_id`, `gejala_dipilih`, `created_at`, `updated_at`) VALUES
(23, 11, 2, '[2,5,6,7,17,18,22,27]', '2025-11-18 19:38:11', '2025-11-18 19:38:11'),
(24, 11, 3, '[1,6,7,9,17,18,21,23,24,25,27]', '2025-12-08 07:45:24', '2025-12-08 07:45:24'),
(25, 11, 6, '[3,4,5,12,15,17,23]', '2025-12-08 07:50:28', '2025-12-08 07:50:28'),
(26, 11, 1, '[1,2,4,6,7,8,13,17,19,23]', '2025-12-08 07:55:33', '2025-12-08 07:55:33'),
(27, 11, 6, '[5,6,12,15,17,23]', '2025-12-19 00:18:29', '2025-12-19 00:18:29'),
(28, 11, 2, '[2,5,6,9,10,17,18,21,22,23,27]', '2025-12-19 00:19:07', '2025-12-19 00:19:07'),
(29, 11, 2, '[2,5,9,10,17,21,22,23]', '2025-12-19 00:20:01', '2025-12-19 00:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2025-10-09 16:33:17', '2025-10-09 16:33:17'),
(2, 'pasien', '2025-10-09 16:33:17', '2025-10-09 16:33:17'),
(3, 'pakar', '2025-10-09 16:33:17', '2025-10-09 16:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Pj8cixCIjilOopElnhkSYYc3otCYDCFFTa4oqKND', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSXBZaDN1M2NoQmdkQzQ0T1ZmUFRCWUU0cmsxbGVlTEI1UjlSa09VSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1773034621);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(9, 'Admin', 'admin123@gmail.com', NULL, '$2y$12$xcp/yZKrDRqWG4x0HB/dFuwgEkbgtlPCf0xzD8s0iLOI9490BP.ES', NULL, NULL, '2025-10-09 08:46:36', 1),
(10, 'Pakar', 'pakar123@gmail.com', NULL, '$2y$12$Pf0TD6SwnLocH.Y/T/pzG.ds/dDUiDrs5L79rlXvzkvT1Thyh3/bm', NULL, NULL, '2025-10-09 09:36:31', 2),
(11, 'Pasien', 'pasien123@gmail.com', NULL, '$2y$12$wwydLPkFSVvigG7g9IKJPuV/GweqFRIL4sbbfjMTpHag1w.hJDYPW', NULL, NULL, '2025-10-09 08:47:05', 3),
(13, 'ucup gerso', 'ucup77@gmail.com', NULL, '$2y$12$Xrg8oBsxow1JsmhT6Xy0UepCBuZhT04m9.HKXxykfv0seoNCGWxZS', NULL, '2025-11-16 02:08:48', '2025-11-16 02:08:48', 3),
(14, 'hanya', 'hanhya@gmail.com', NULL, '$2y$12$AbFTbYkQabPj0d3zuEaLyO7EU6W/2e2eIhvYlVc7fUjYjMjbtRhbG', NULL, '2026-01-06 22:55:40', '2026-01-06 22:55:40', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basis_pengetahuan_gejala_id_foreign` (`gejala_id`),
  ADD KEY `basis_pengetahuan_cedera_id_foreign` (`cedera_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cedera`
--
ALTER TABLE `cedera`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedera_kode_cedera_unique` (`kode_cedera`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gejala_kode_gejala_unique` (`kode_gejala`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `riwayat_diagnosa`
--
ALTER TABLE `riwayat_diagnosa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_diagnosa_user_id_foreign` (`user_id`),
  ADD KEY `riwayat_diagnosa_cedera_id_foreign` (`cedera_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `cedera`
--
ALTER TABLE `cedera`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `riwayat_diagnosa`
--
ALTER TABLE `riwayat_diagnosa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD CONSTRAINT `basis_pengetahuan_cedera_id_foreign` FOREIGN KEY (`cedera_id`) REFERENCES `cedera` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basis_pengetahuan_gejala_id_foreign` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat_diagnosa`
--
ALTER TABLE `riwayat_diagnosa`
  ADD CONSTRAINT `riwayat_diagnosa_cedera_id_foreign` FOREIGN KEY (`cedera_id`) REFERENCES `cedera` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_diagnosa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
