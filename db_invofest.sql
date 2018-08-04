-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2018 at 07:10 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_invofest`
--

-- --------------------------------------------------------

--
-- Table structure for table `kompetisis`
--

CREATE TABLE `kompetisis` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `jenis_lomba` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ketua_tim` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ketua_tim` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_ketua_tim` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ketua_tim` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_anggota_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_anggota_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_anggota_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_anggota_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_anggota_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_anggota_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_anggota_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_anggota_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berkas_konfirmasi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lock` tinyint(1) NOT NULL DEFAULT '0',
  `konfirmasi_bayar` tinyint(1) NOT NULL DEFAULT '0',
  `link_berkas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hapus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kompetisis`
--

INSERT INTO `kompetisis` (`id`, `user_id`, `jenis_lomba`, `asal_sekolah`, `nama_ketua_tim`, `no_ketua_tim`, `email_ketua_tim`, `foto_ketua_tim`, `nama_anggota_1`, `no_anggota_1`, `email_anggota_1`, `foto_anggota_1`, `nama_anggota_2`, `no_anggota_2`, `email_anggota_2`, `foto_anggota_2`, `berkas_konfirmasi`, `lock`, `konfirmasi_bayar`, `link_berkas`, `link_video`, `created_at`, `updated_at`, `hapus`) VALUES
(1, 2, 'WDC', 'SMK Telkom Sandhy Putra Purwokerto', 'Bayu Adi Prasetiyo', '085643281795', 'bayu28.bap@gmail.com', '1.jpg', 'Mark Zuckeberg', '085643281799', 'mark@facebook.com', '1.jpg', 'Olivia Claudia', '087887888', 'olive@gmail.com', '1.jpg', NULL, 0, 1, NULL, NULL, NULL, NULL, 0),
(2, 3, 'ADC', 'Citra Langgeng Surabaya University', 'Mario Wuysang', '085643281990', 'knights@indonesia.id', '1.jpg', 'Kaleb Ramot', '088998989899', 'kaleb@cls.com', '1.jpg', 'Isman Thoyib', '087887888', 'isman@cls.com', '1.jpg', NULL, 0, 1, NULL, NULL, NULL, NULL, 0),
(3, 4, 'DC', 'Politeknik Harapan Bersama', 'Rony Gunawan', '085645361612', 'rony@gunawan.com', '1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, 0);

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
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2018_07_04_012446_create_pesertas_table', 1),
(22, '2018_07_04_123708_create_kompetisis_table', 1),
(23, '2018_07_06_182349_create_posts_table', 1),
(24, '2018_07_06_182358_create_sponsors_table', 1),
(25, '2018_07_14_204409_add_hapus_to_posts_table', 2),
(26, '2018_07_14_225026_add_hapus_pesertas', 3),
(27, '2018_07_14_225048_add_hapus_kompetisis', 3),
(28, '2018_07_15_131331_add_hapus_to_sponsor', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesertas`
--

CREATE TABLE `pesertas` (
  `id_peserta` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_institusi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ktm` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workshop` tinyint(1) NOT NULL DEFAULT '0',
  `seminar` tinyint(1) NOT NULL DEFAULT '0',
  `talkshow` tinyint(1) NOT NULL DEFAULT '0',
  `kategori_workshop` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validasi_workshop` tinyint(1) NOT NULL DEFAULT '0',
  `validasi_seminar` tinyint(1) NOT NULL DEFAULT '0',
  `validasi_talkshow` tinyint(1) NOT NULL DEFAULT '0',
  `jenis_pembayaran` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `konfirmasi_bayar` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hapus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesertas`
--

INSERT INTO `pesertas` (`id_peserta`, `kategori`, `nama`, `asal_institusi`, `nomor_hp`, `email`, `jenis_kelamin`, `alamat`, `foto_ktm`, `workshop`, `seminar`, `talkshow`, `kategori_workshop`, `validasi_workshop`, `validasi_seminar`, `validasi_talkshow`, `jenis_pembayaran`, `konfirmasi_bayar`, `created_at`, `updated_at`, `hapus`) VALUES
('1', 'mahasiswa', 'Robert Downey Jr', 'Marvel', '08657575', 'robert@gmail.com', 'Laki-laki', 'Silicon Valley', '1.jpg', 1, 1, 0, 'Cyber Security', 0, 0, 0, 'Transfer', 1, NULL, '2018-07-14 16:04:57', 0),
('2', 'umum', 'Olivia', 'Universitas Surabaya', '081212122828', 'robert@gmail.com', 'Perempuan', 'Silicon Valley', '1.jpg', 1, 0, 1, 'Web Services', 0, 0, 0, 'Langsung', 1, NULL, '2018-07-14 15:54:50', 0),
('3', 'mahasiswa', 'Claudia', 'Universitas Negeri Semarang', '081212122828', 'claudia@gmail.com', 'Perempuan', 'Silicon Valley', '1.jpg', 1, 1, 1, 'Cyber Security', 0, 0, 0, 'Transfer', 1, NULL, '2018-07-07 14:01:26', 0),
('4', 'umum', 'Zuckeberg S', 'Harvard', '08121212282', 'as@gmail.com', 'Perempuan', 'Silicon Valley', '1.jpg', 1, 1, 1, 'UI/UX Design', 0, 0, 0, 'Langsung', 1, NULL, '2018-07-14 15:56:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hapus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `judul`, `gambar`, `deskripsi`, `created_at`, `updated_at`, `hapus`) VALUES
(1, 'Coba Post', '1.jpg', 'ini contoh post pertama', NULL, '2018-07-14 15:20:07', 1),
(2, 'Ini pasti Berhasil', 'gambarpost/48825.png', '<p><u>berhasil</u> <i>dong</i><b> pastinya :V</b></p>', '2018-07-14 06:20:58', '2018-07-14 15:16:04', 0),
(3, 'Ini pasti Berhasil', 'gambarpost/69426.png', '<p><u>berhasil</u> <i>dong</i><b> pastinya hha</b></p>', '2018-07-14 06:21:22', '2018-07-14 14:15:48', 0),
(4, 'post pertama', 'gambarpost/65338.png', '<p>qwqwq</p>', '2018-07-14 15:24:08', '2018-07-14 15:24:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hapus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`id`, `nama`, `logo`, `link`, `deskripsi`, `created_at`, `updated_at`, `hapus`) VALUES
(1, 'Balimacs', 'gambarsponsor/97217.png', 'balimac.co.ids', '<p>ini balimac lhoss</p>', '2018-07-15 06:11:31', '2018-07-15 06:36:45', 0),
(2, 'Invofest', 'gambarsponsor/42394.png', 'invofest.co.id', '<p>invo invo ye</p>', '2018-07-15 06:23:56', '2018-07-15 06:35:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activation_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `active`, `activation_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bayu Adi Prasetiyo', 'bayu28.bap@gmail.com', '$2y$10$hnGxp7Ia4o6Qa4y8cWEY/.LmXsmsZLr2Mac08G75g79iquDTtjl5q', 'admin', 1, NULL, 'GlaVS73icwikWjzrQt9AZpjG3eay4rVz035pJObQIeA3SXinorTCU1Pr4vYU', '2018-07-07 12:11:13', '2018-07-07 12:12:01'),
(2, 'RoyalBase', 'royalbase@gmail.com', '$2y$10$d8piloQnwpNG.SzhE2e2J.ngOMGh7UJcUQ9.bEFPqSGry65DJoVG6', 'member', 1, NULL, 'lgdTIJfuFL0g8wDXNldgdWKEgijk1RVOr2KOSb2HPeXm2vCNWYOOsP2dJwIE', '2018-07-11 14:50:03', '2018-07-11 14:51:57'),
(3, 'Knights', 'knight@indo.id', '$2y$10$Frb3xfJHhTH26ZkFL0x9D.vHkI/t9qsv9an7nDdV41cmdiOw9xAOC', 'member', 1, NULL, 'oQaql0CARYhvB7alMknmGpaZDzCXL16DH8RgWtj7f49HjJwOm2zzDnOp8Q9u', '2018-07-12 10:35:34', '2018-07-12 10:37:44'),
(4, 'Satria Muda', 'satria@muda.com', '$2y$10$QRTlDgyGuq9059l8.jh.HesV8Im9G7d5wN2PxnzPtQdYbagzKUdea', 'member', 1, NULL, '9PrsvNPVodKiukQbufkwXHQu0W1Y5gMs0fCrXBEeuNES0mYqKPgyvlJ0kAt7', '2018-07-12 10:38:23', '2018-07-12 10:38:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kompetisis`
--
ALTER TABLE `kompetisis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kompetisis_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pesertas`
--
ALTER TABLE `pesertas`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kompetisis`
--
ALTER TABLE `kompetisis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kompetisis`
--
ALTER TABLE `kompetisis`
  ADD CONSTRAINT `kompetisis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
