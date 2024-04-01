-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 06:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-waspas`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(2, 'Ilmu Komputer', '2023-01-17 23:00:46', '2023-01-17 23:00:46'),
(3, 'Teknik Sipil', '2023-01-17 23:01:00', '2023-01-17 23:01:00'),
(4, 'Teknik Mesin', '2023-01-17 23:01:10', '2023-01-17 23:01:10'),
(5, 'Teknik Arsitektur', '2023-01-17 23:01:20', '2023-01-17 23:01:20'),
(6, 'Teknik Pertambangan', '2023-01-17 23:01:30', '2023-01-17 23:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(28, 'Kota Radja', '2022-10-26 09:30:17', '2022-12-21 16:33:35'),
(29, 'Oebobo', '2022-10-26 09:30:29', '2022-12-21 16:33:55'),
(30, 'Kota Lama', '2022-10-26 09:30:48', '2022-12-21 16:36:21'),
(31, 'Kelapa Lima', '2022-10-26 09:31:00', '2022-10-26 20:33:00'),
(35, 'Maulafa', '2022-10-28 00:45:40', '2022-11-06 00:25:24'),
(37, 'Alak', '2022-10-29 13:22:17', '2022-12-21 16:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama`, `kecamatan_id`, `created_at`, `updated_at`) VALUES
(97, 'Tuak Daun Merah', 29, NULL, '2023-01-05 19:25:36'),
(98, 'Kayu Putih', 29, NULL, NULL),
(101, 'ddt', 28, '2023-01-05 13:31:15', '2023-01-05 13:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `role` varchar(20) NOT NULL,
  `bobot` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `role`, `bobot`, `updated_at`, `created_at`) VALUES
(1, 'Semester', 'Cost', 30, '2023-01-07 21:00:44', NULL),
(2, 'IPK', 'Benefit', 20, '2023-01-07 21:01:06', NULL),
(4, 'UKT', 'Cost', 15, '2023-01-07 21:01:22', '2023-01-05 08:42:08'),
(8, 'Pekerjaan Ortu', 'Cost', 15, '2023-01-07 21:01:41', '2023-01-07 21:01:41'),
(9, 'Penghasilan Ortu', 'Cost', 10, '2023-01-07 21:01:57', '2023-01-07 21:01:57'),
(10, 'Jenis Transportasi', 'Cost', 10, '2023-01-07 21:02:13', '2023-01-07 21:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nim` bigint(20) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tgl_lahir` int(20) NOT NULL,
  `bln_lahir` varchar(128) NOT NULL,
  `thn_lahir` int(20) NOT NULL,
  `jurusan_id` bigint(20) DEFAULT NULL,
  `kecamatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelurahan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `jk`, `tgl_lahir`, `bln_lahir`, `thn_lahir`, `jurusan_id`, `kecamatan_id`, `kelurahan_id`, `updated_at`, `created_at`) VALUES
(1, 'A1', 2423424, 'Laki - Laki', 2, 'Maret', 1899, 2, 29, 97, '2023-02-09 21:31:35', NULL),
(5, 'A2', 3534534, 'Perempuan', 2, 'Mei', 1902, 3, 29, 98, '2023-02-09 21:26:58', '2023-01-05 15:09:25'),
(6, 'A3', 234, 'Laki - Laki', 0, '0', 0, 4, 28, 101, '2023-01-17 23:13:16', '2023-01-05 19:39:10'),
(7, 'A4', 5345, 'Perempuan', 0, '0', 0, NULL, 29, 97, '2023-01-07 20:58:28', '2023-01-05 19:42:52'),
(8, 'A5', 453453, 'Laki - Laki', 0, '0', 0, NULL, 29, 97, '2023-01-07 20:58:46', '2023-01-07 20:58:46'),
(9, 'A6', 35435, 'Perempuan', 5, 'Maret', 1899, 2, 28, 101, '2023-01-19 02:52:48', '2023-01-07 20:58:58'),
(10, 'A7', 543534, 'Perempuan', 0, '0', 0, NULL, 29, 98, '2023-01-07 20:59:08', '2023-01-07 20:59:08'),
(11, 'A8', 35345, 'Perempuan', 0, '0', 0, NULL, 28, 101, '2023-01-07 20:59:18', '2023-01-07 20:59:18'),
(12, 'A9', 6776, 'Perempuan', 0, '0', 0, NULL, 29, 97, '2023-01-07 20:59:28', '2023-01-07 20:59:28'),
(13, 'A10', 5646, 'Perempuan', 0, '0', 0, NULL, 29, 97, '2023-01-07 20:59:38', '2023-01-07 20:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_sub_kriteria`
--

CREATE TABLE `mahasiswa_sub_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `sub_kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_sub_kriteria`
--

INSERT INTO `mahasiswa_sub_kriteria` (`id`, `mahasiswa_id`, `sub_kriteria_id`, `updated_at`, `created_at`) VALUES
(12, 1, 38, '2023-01-07 22:35:32', '2023-01-07 21:56:21'),
(13, 1, 59, '2023-01-07 22:17:03', '2023-01-07 22:17:03'),
(14, 1, 42, '2023-01-07 22:17:19', '2023-01-07 22:17:19'),
(15, 1, 46, '2023-01-07 22:17:56', '2023-01-07 22:17:56'),
(16, 1, 52, '2023-01-07 22:18:14', '2023-01-07 22:18:14'),
(17, 1, 58, '2023-01-07 22:18:27', '2023-01-07 22:18:27'),
(18, 5, 38, '2023-01-07 22:18:57', '2023-01-07 22:18:57'),
(20, 5, 59, '2023-01-07 22:29:36', '2023-01-07 22:29:36'),
(21, 5, 42, '2023-01-07 22:30:01', '2023-01-07 22:30:01'),
(22, 5, 45, '2023-01-07 22:30:18', '2023-01-07 22:30:18'),
(23, 5, 51, '2023-01-07 22:33:03', '2023-01-07 22:33:03'),
(24, 5, 58, '2023-01-07 22:33:33', '2023-01-07 22:33:33'),
(25, 6, 38, '2023-01-07 22:35:39', '2023-01-07 22:34:14'),
(26, 6, 59, '2023-01-07 22:34:37', '2023-01-07 22:34:37'),
(27, 6, 42, '2023-01-07 22:35:08', '2023-01-07 22:35:08'),
(28, 6, 47, '2023-01-07 22:36:25', '2023-01-07 22:36:25'),
(29, 6, 52, '2023-01-07 22:37:08', '2023-01-07 22:37:08'),
(30, 6, 56, '2023-01-07 22:37:21', '2023-01-07 22:37:21'),
(31, 7, 38, '2023-01-07 22:37:44', '2023-01-07 22:37:44'),
(32, 7, 41, '2023-01-07 22:38:04', '2023-01-07 22:38:04'),
(33, 7, 42, '2023-01-07 22:38:16', '2023-01-07 22:38:16'),
(34, 7, 45, '2023-01-07 22:38:33', '2023-01-07 22:38:33'),
(35, 7, 50, '2023-01-07 22:38:44', '2023-01-07 22:38:44'),
(36, 7, 56, '2023-01-07 22:38:57', '2023-01-07 22:38:57'),
(37, 8, 37, '2023-01-07 22:40:01', '2023-01-07 22:39:50'),
(38, 8, 59, '2023-01-07 22:40:43', '2023-01-07 22:40:43'),
(39, 8, 42, '2023-01-07 22:40:55', '2023-01-07 22:40:55'),
(40, 8, 45, '2023-01-07 22:41:07', '2023-01-07 22:41:07'),
(41, 8, 51, '2023-01-07 22:41:18', '2023-01-07 22:41:18'),
(42, 8, 57, '2023-01-07 22:41:31', '2023-01-07 22:41:31'),
(43, 9, 37, '2023-01-07 22:42:01', '2023-01-07 22:42:01'),
(44, 9, 59, '2023-01-07 22:42:19', '2023-01-07 22:42:19'),
(45, 9, 42, '2023-01-07 22:42:36', '2023-01-07 22:42:36'),
(46, 9, 45, '2023-01-07 22:42:50', '2023-01-07 22:42:50'),
(47, 9, 50, '2023-01-07 22:43:03', '2023-01-07 22:43:03'),
(48, 9, 56, '2023-01-07 22:43:15', '2023-01-07 22:43:15'),
(49, 10, 36, '2023-01-07 22:43:27', '2023-01-07 22:43:27'),
(50, 10, 59, '2023-01-07 22:43:48', '2023-01-07 22:43:48'),
(51, 10, 43, '2023-01-07 22:44:05', '2023-01-07 22:44:05'),
(52, 10, 45, '2023-01-07 22:44:16', '2023-01-07 22:44:16'),
(53, 10, 51, '2023-01-07 22:44:27', '2023-01-07 22:44:27'),
(54, 10, 58, '2023-01-07 22:44:40', '2023-01-07 22:44:40'),
(55, 11, 36, '2023-01-07 22:45:00', '2023-01-07 22:45:00'),
(56, 11, 59, '2023-01-07 22:45:19', '2023-01-07 22:45:19'),
(57, 11, 42, '2023-01-07 22:45:32', '2023-01-07 22:45:32'),
(58, 11, 45, '2023-01-07 22:45:49', '2023-01-07 22:45:49'),
(59, 11, 50, '2023-01-07 22:46:01', '2023-01-07 22:46:01'),
(60, 11, 58, '2023-01-07 22:46:13', '2023-01-07 22:46:13'),
(61, 12, 35, '2023-01-07 22:46:38', '2023-01-07 22:46:38'),
(62, 12, 59, '2023-01-07 22:46:54', '2023-01-07 22:46:54'),
(63, 12, 43, '2023-01-07 22:47:11', '2023-01-07 22:47:11'),
(64, 12, 46, '2023-01-07 22:47:25', '2023-01-07 22:47:25'),
(65, 12, 54, '2023-01-07 22:47:42', '2023-01-07 22:47:42'),
(66, 12, 58, '2023-01-07 22:47:53', '2023-01-07 22:47:53'),
(67, 13, 35, '2023-01-07 22:48:05', '2023-01-07 22:48:05'),
(68, 13, 59, '2023-01-07 22:48:21', '2023-01-07 22:48:21'),
(69, 13, 43, '2023-01-07 22:48:36', '2023-01-07 22:48:36'),
(70, 13, 47, '2023-01-07 22:48:47', '2023-01-07 22:48:47'),
(71, 13, 53, '2023-01-07 22:49:00', '2023-01-07 22:49:00'),
(72, 13, 58, '2023-01-07 22:49:10', '2023-01-07 22:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_09_19_134504_make_kasus_table', 1),
(3, '2022_09_19_145703_create_puskesmas_table', 2),
(4, '2022_09_19_150923_create_kecamatan_table', 3),
(6, '2022_09_19_151045_create_kelurahan_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bobot` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `nama`, `kriteria_id`, `bobot`, `updated_at`, `created_at`) VALUES
(27, '500.000 - 1.000.000', 4, 1, '2023-01-07 21:22:52', '2023-01-05 08:49:24'),
(34, '01 - 50', 2, 1, '2023-01-07 21:42:12', '2023-01-07 21:02:45'),
(35, '3 / 4', 1, 1, '2023-01-07 21:41:03', '2023-01-07 21:03:08'),
(36, '5 / 6', 1, 2, '2023-01-07 21:41:41', '2023-01-07 21:03:48'),
(37, '7 / 8', 1, 3, '2023-01-07 21:41:50', '2023-01-07 21:04:13'),
(38, '>9 / >10', 1, 4, '2023-01-07 21:41:58', '2023-01-07 21:04:51'),
(39, '1.51 - 1.99', 2, 2, '2023-01-07 21:42:19', '2023-01-07 21:06:56'),
(40, '2.00 - 2.49', 2, 3, '2023-01-07 21:42:35', '2023-01-07 21:21:51'),
(41, '2.50 - 2.99', 2, 4, '2023-01-07 21:42:58', '2023-01-07 21:22:19'),
(42, '1.250.000 - 2.000.000', 4, 2, '2023-01-07 21:43:38', '2023-01-07 21:23:15'),
(43, '2.250.000 - 3.000.000', 4, 3, '2023-01-07 21:43:45', '2023-01-07 21:23:45'),
(44, '3.250.000 - 5.000.000', 4, 4, '2023-01-07 21:43:52', '2023-01-07 21:24:05'),
(45, 'Petani / Nelayan / Buruh', 8, 1, '2023-01-07 21:43:58', '2023-01-07 21:25:30'),
(46, 'Wiraswasta', 8, 2, '2023-01-07 21:44:05', '2023-01-07 21:25:48'),
(47, 'Pensiunan', 8, 3, '2023-01-07 21:44:11', '2023-01-07 21:26:04'),
(48, 'Karyawan swasta', 8, 4, '2023-01-07 21:44:18', '2023-01-07 21:26:18'),
(49, 'PNS / TNI / Polri', 8, 5, '2023-01-07 21:44:23', '2023-01-07 21:26:47'),
(50, '< 500.000', 9, 1, '2023-01-07 21:29:00', '2023-01-07 21:29:00'),
(51, '500.000 - 999.999', 9, 2, '2023-01-07 21:29:18', '2023-01-07 21:29:18'),
(52, '1.000.000 - 1.999.999', 9, 3, '2023-01-07 21:29:35', '2023-01-07 21:29:35'),
(53, '2.000.000 - 4.999.999', 9, 4, '2023-01-07 21:29:48', '2023-01-07 21:29:48'),
(54, '5.000.000 - 20.000.000', 9, 5, '2023-01-07 21:30:00', '2023-01-07 21:30:00'),
(55, 'Jalan kaki', 10, 1, '2023-01-07 21:45:27', '2023-01-07 21:30:13'),
(56, 'Angkutan umum / Bus / Pete-pete', 10, 2, '2023-01-07 21:45:33', '2023-01-07 21:30:37'),
(57, 'Ojek', 10, 3, '2023-01-07 21:45:40', '2023-01-07 21:30:46'),
(58, 'Mobil / Motor', 10, 4, '2023-01-07 21:45:47', '2023-01-07 21:30:59'),
(59, '3.00 - 4.00', 2, 5, '2023-01-07 22:28:16', '2023-01-07 21:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$sjWmdMvt.0bQg77O/iIaA.faFUEyusZ.GiBpRJTwc8WLUOFIVwVCC', NULL, '2023-01-03 22:09:15'),
(4, 'a', '$2y$10$lu1Ibcq/9kgnu/YWbNWOTOLBnxempp4qjSH8X6tYhtEeWX3hurGC.', '2023-01-03 22:21:43', '2023-01-03 22:21:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `puskesmas_id` (`kecamatan_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`),
  ADD KEY `kelurahan_id` (`kelurahan_id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indexes for table `mahasiswa_sub_kriteria`
--
ALTER TABLE `mahasiswa_sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`,`sub_kriteria_id`),
  ADD KEY `sub_kriteria_id` (`sub_kriteria_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mahasiswa_sub_kriteria`
--
ALTER TABLE `mahasiswa_sub_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa_sub_kriteria`
--
ALTER TABLE `mahasiswa_sub_kriteria`
  ADD CONSTRAINT `mahasiswa_sub_kriteria_ibfk_1` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_sub_kriteria_ibfk_2` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
