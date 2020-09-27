-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 11:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpp_decima`
--

-- --------------------------------------------------------

--
-- Table structure for table `dim_wilayah`
--

CREATE TABLE `dim_wilayah` (
  `id` int(11) NOT NULL,
  `kelurahan` varchar(30) DEFAULT NULL,
  `kecamatan` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dim_wilayah`
--

INSERT INTO `dim_wilayah` (`id`, `kelurahan`, `kecamatan`, `created_at`, `updated_at`) VALUES
(1, 'Cilodong', 'CILODONG', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(2, 'Jatimulya', 'CILODONG', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(3, 'Kalibaru', 'CILODONG', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(4, 'Kalimulya', 'CILODONG', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(5, 'Sukamaju', 'CILODONG', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(6, 'Cisalak Pasar', 'CIMANGGIS', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(7, 'Curug', 'CIMANGGIS', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(8, 'Harjamukti', 'CIMANGGIS', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(9, 'Mekarsari', 'CIMANGGIS', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(10, 'Pasir Gunung Selatan', 'CIMANGGIS', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(11, 'Tugu', 'CIMANGGIS', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(12, 'Bojong Pondok Terong', 'CIPAYUNG', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(13, 'Cipayung', 'CIPAYUNG', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(14, 'Cipayung Jaya', 'CIPAYUNG', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(15, 'Pondok Jaya', 'CIPAYUNG', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(16, 'Ratu jaya', 'CIPAYUNG', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(17, 'Abadi Jaya', 'SUKMAJAYA', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(18, 'Baktijaya', 'SUKMAJAYA', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(19, 'Cisalak', 'SUKMAJAYA', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(20, 'Mekar Jaya', 'SUKMAJAYA', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(21, 'Sukmajaya', 'SUKMAJAYA', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(22, 'TirtaJaya', 'SUKMAJAYA', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(23, 'Cilangkap', 'TAPOS', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(24, 'Cimpaeun', 'TAPOS', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(25, 'Jatijajar', 'TAPOS', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(26, 'Leuwinanggung', 'TAPOS', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(27, 'Sukamaju Baru', 'TAPOS', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(28, 'Sukatani', 'TAPOS', '2020-09-27 02:39:38', '2020-09-27 02:39:38'),
(29, 'Tapos', 'TAPOS', '2020-09-27 02:39:38', '2020-09-27 02:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_import`
--

CREATE TABLE `laporan_import` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(40) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_npwp`
--

CREATE TABLE `master_npwp` (
  `id` int(11) NOT NULL,
  `npwp` varchar(20) DEFAULT NULL,
  `kd_kpp` varchar(4) DEFAULT NULL,
  `kd_cabang` varchar(4) DEFAULT NULL,
  `key_npwp` varchar(20) DEFAULT NULL,
  `nama_wp` varchar(50) DEFAULT NULL,
  `jenis_wp` varchar(20) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `propinsi` varchar(50) DEFAULT NULL,
  `nama_ar` varchar(50) DEFAULT NULL,
  `seksi` varchar(50) DEFAULT NULL,
  `nip_pendek` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_spt`
--

CREATE TABLE `master_spt` (
  `id` int(11) NOT NULL,
  `npwp` varchar(20) DEFAULT NULL,
  `kd_kpp` varchar(4) DEFAULT NULL,
  `kd_cabang` varchar(4) DEFAULT NULL,
  `key_npwp` varchar(20) DEFAULT NULL,
  `no_tandaterima` varchar(50) DEFAULT NULL,
  `jenis_spt` varchar(35) DEFAULT NULL,
  `pembetulan` int(11) DEFAULT NULL,
  `tgl_spt` varchar(20) DEFAULT NULL,
  `status_spt` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `target_capaian`
--

CREATE TABLE `target_capaian` (
  `id` int(11) NOT NULL,
  `target` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seksi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','pegawai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `name`, `seksi`, `email_verified_at`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '123456789', 'Admin Gundar', 'Seksi Pengawasan dan Konsultasi II', NULL, 'fajar@admin.com', '$2y$10$Rx.ecJqY7TCepYvf42jvIeTJMscIi.iXeggZLdz/jhhRHGOMuzKAe', 'admin', NULL, '2020-07-03 19:46:39', '2020-09-27 01:34:54'),
(7, '835010329', 'Fajar Ary Nugroho', 'Seksi Pengawasan dan Konsultasi II', NULL, NULL, '$2y$10$83N3hitFWfqza0/7LmX4u.mY36nj7avKT39IRO5JxGvY6YPznrls6', 'admin', NULL, '2020-07-09 08:45:37', '2020-07-09 08:45:37'),
(8, '060100179', 'Lisa Wahyu Hapsari Purwandani', 'Seksi Pengawasan dan Konsultasi II', NULL, NULL, '$2y$10$U5424Z0tL8U66EpSnOpyy.Sx7mqTCSL2/BD7sF3h8OuN8MGNwXtZa', 'pegawai', NULL, '2020-07-09 08:45:37', '2020-07-09 08:45:37'),
(9, '060098591', 'Tafsir Ma`Rup', 'Seksi Pengawasan dan Konsultasi II', NULL, NULL, '$2y$10$xfWHR/go0kuS8WBuHPrQ..Pcg3vgRBs4FPOSpG/Of9Z1i5lzKqRz6', 'pegawai', NULL, '2020-07-09 08:45:38', '2020-07-09 08:45:38'),
(10, '060082119', 'Sophia Sukmawati Dewi', 'Seksi Pengawasan dan Konsultasi II', NULL, NULL, '$2y$10$Ioat6rFlWO5RP8MKPST6FOnhcYM6XGx.49bAk15MhDduzmeLzeqtK', 'pegawai', NULL, '2020-07-09 08:45:38', '2020-07-09 08:45:38'),
(11, '930102249', 'Andi Fauzi', 'Seksi Pengawasan dan Konsultasi II', NULL, NULL, '$2y$10$K8jxLpRdmSmJr6MmytLJzeGTTKwLldBzPHXmYPzJerHuV5GsYeuLa', 'pegawai', NULL, '2020-07-09 08:45:38', '2020-07-09 08:45:38'),
(12, '060098761', 'Didi Mulyadi', 'Seksi Pengawasan dan Konsultasi II', NULL, NULL, '$2y$10$PPiA7mUZQyZcm3Woi2ZG7eW/7kB97b4cViGYxBmdDVNMxW1To1GUy', 'pegawai', NULL, '2020-07-09 08:45:38', '2020-07-09 08:45:38'),
(13, '060106757', 'Yohan Febrian', 'Seksi Pengawasan dan Konsultasi II', NULL, NULL, '$2y$10$0ZnZj0TUONEU6.1Oq2qx/O/YOUAiWuc/aFxiATNm3bUkCJ2/j36PG', 'pegawai', NULL, '2020-07-09 08:45:38', '2020-07-09 08:45:38'),
(14, '060105690', 'Alexander Santober', 'Seksi Pengawasan dan Konsultasi II', NULL, NULL, '$2y$10$K0MnAWPBSgDjmp1jtUMvKeBSdvrBEumSBjNn0VMXYl7w8hMSxysAG', 'pegawai', NULL, '2020-07-09 08:45:38', '2020-07-09 08:45:38'),
(15, '060082300', 'Supartinah', 'Seksi Pengawasan dan Konsultasi III', NULL, NULL, '$2y$10$4JdL24k8vU9Ug1kN8W1KK.B9Oou2lxqEBZ/UxjJ2Uqq6890YOjJa.', 'pegawai', NULL, '2020-07-09 08:45:39', '2020-07-09 08:45:39'),
(16, '060096318', 'Titik Sunarti', 'Seksi Pengawasan dan Konsultasi III', NULL, NULL, '$2y$10$PaJrKXiNOFmfJlxCweCYQuZgvLB0ABQcFG/DSy3IFQtqwGHNXd2T6', 'pegawai', NULL, '2020-07-09 08:45:39', '2020-07-09 08:45:39'),
(17, '060081979', 'Yayah Qodariyah', 'Seksi Pengawasan dan Konsultasi III', NULL, NULL, '$2y$10$mC4bUSnfuSy5LRbwNZuGPOdCBwUVSdhPo/3S9MFryaoB2R/Uz16D2', 'pegawai', NULL, '2020-07-09 08:45:39', '2020-07-09 08:45:39'),
(18, '922209788', 'Mega Isnaini Nauli', 'Seksi Pengawasan dan Konsultasi III', NULL, NULL, '$2y$10$LMHqHs9Se9v/XARrz6bxhud1cOU5/3Nifn43Zp9vPNq5EmF/0Mxdu', 'pegawai', NULL, '2020-07-09 08:45:39', '2020-07-09 08:45:39'),
(19, '802650038', 'Arna Kusumawati', 'Seksi Pengawasan dan Konsultasi III', NULL, NULL, '$2y$10$43IQN5Pfwv9l6NRmpMLlD.IUU2K2zQRUoHCHgQGEXmZgNb0TG7Mq6', 'pegawai', NULL, '2020-07-09 08:45:39', '2020-07-09 08:45:39'),
(20, '060096547', 'Euis Purnama Sari', 'Seksi Pengawasan dan Konsultasi III', NULL, NULL, '$2y$10$DHw76duGFFEIQCiyT5N/VOe9BiC40ylTv4/b2TE41QvB6OIH6d.ty', 'pegawai', NULL, '2020-07-09 08:45:39', '2020-07-09 08:45:39'),
(21, '060093643', 'Erni Nurdiana', 'Seksi Pengawasan dan Konsultasi III', NULL, NULL, '$2y$10$oqiFiuB/pHZiJmr6kqdMiuLfufcRkk.h3u5suH569u1q9nKWDH3Ua', 'pegawai', NULL, '2020-07-09 08:45:40', '2020-07-09 08:45:40'),
(22, '060084271', 'Kamalia', 'Seksi Pengawasan dan Konsultasi III', NULL, NULL, '$2y$10$ivxEGINcnL0EFAuBAYzhWeNmbhO2BWpXOuiAkV1zwqt/.GNw3r7f6', 'pegawai', NULL, '2020-07-09 08:45:40', '2020-07-09 08:45:40'),
(23, '060093765', 'Sri Utami', 'Seksi Pengawasan dan Konsultasi III', NULL, NULL, '$2y$10$YIsHQtf8E2OWgdkPsVF8.ujtkr68DSGyUtuL9KwUR7OM.HCngFOpa', 'pegawai', NULL, '2020-07-09 08:45:40', '2020-07-09 08:45:40'),
(24, '060098712', 'Sri Mulatsih', 'Seksi Pengawasan dan Konsultasi III', NULL, NULL, '$2y$10$tRlBzBYb6.DVeVKGeIbfBuKoYrxNgmX/8eHHqtCW71oesoyrX1Ew.', 'pegawai', NULL, '2020-07-09 08:45:40', '2020-07-09 08:45:40'),
(25, '060099873', 'Irwansyah', 'Seksi Pengawasan dan Konsultasi III', NULL, NULL, '$2y$10$E7/jjVxrCj/EZ7zHS1H57.kbwbfoLgNkr/gjmUE00FfUHhV5v/QoS', 'pegawai', NULL, '2020-07-09 08:45:40', '2020-07-09 08:45:40'),
(26, '060083801', 'Memet', 'Seksi Pengawasan dan Konsultasi IV', NULL, NULL, '$2y$10$9wBTkLPXchQrMTpvEMWmAeJiR4onNPXoR2FT/INnEJEI4xzVj73KS', 'pegawai', NULL, '2020-07-09 08:45:40', '2020-07-09 08:45:40'),
(27, '060088036', 'Watryana', 'Seksi Pengawasan dan Konsultasi IV', NULL, NULL, '$2y$10$pl4ilIIcIgjVI2NXejOEm.Mlra3VSe9dAZWpkGfbcrC6GgIu8kzFO', 'pegawai', NULL, '2020-07-09 08:45:41', '2020-07-09 08:45:41'),
(28, '120143851', 'Nina Windiati', 'Seksi Pengawasan dan Konsultasi IV', NULL, NULL, '$2y$10$jholS5z0S3J/UbNKmJbY7eh0VExZnN8O3OxgYCLnVh4oso1aSSy0K', 'pegawai', NULL, '2020-07-09 08:45:41', '2020-07-09 08:45:41'),
(29, '060088148', 'Natalinda Siahaan', 'Seksi Pengawasan dan Konsultasi IV', NULL, NULL, '$2y$10$9EJlXxHslDYOMmuYCyLvPe1dnjzgRMkpcqLIr1zl5lkBHfr8SV872', 'pegawai', NULL, '2020-07-09 08:45:41', '2020-07-09 08:45:41'),
(30, '060087567', 'Damar Andaruwati', 'Seksi Pengawasan dan Konsultasi IV', NULL, NULL, '$2y$10$xxsAvuY4TsPp8GMsxKJqO.03DXQ8XRQL0kJ506rQe74XIp6pJCSAa', 'pegawai', NULL, '2020-07-09 08:45:41', '2020-07-09 08:45:41'),
(31, '060082107', 'Enur Nurnaningsih', 'Seksi Pengawasan dan Konsultasi IV', NULL, NULL, '$2y$10$zUM.6zYHHAuBXZ2Vl/qc1ePXNz9/rQrEFXjRhzctK0E3aCr16yjPu', 'pegawai', NULL, '2020-07-09 08:45:41', '2020-07-09 08:45:41'),
(32, '901215316', 'Luh Rahmi Susanti', 'Seksi Pengawasan dan Konsultasi IV', NULL, NULL, '$2y$10$MqpQRsuJOVNvRETNB9QF/e63j4Dz.x6dZGbdBc52Q0AI.xcvRQQge', 'pegawai', NULL, '2020-07-09 08:45:42', '2020-07-09 08:45:42'),
(33, '863030412', 'Maria Jutensa Triade', 'Seksi Pengawasan dan Konsultasi IV', NULL, NULL, '$2y$10$8DbgK5Qo82J4DUEoZUKYz.Kqr35rcTvBSEwX4XGJ8QxLG/LSEywPa', 'pegawai', NULL, '2020-07-09 08:45:42', '2020-07-09 08:45:42'),
(34, '060083689', 'Ida Rosyida', 'Seksi Pengawasan dan Konsultasi IV', NULL, NULL, '$2y$10$rF.VAGKupwGXybW4OuYQjeLCl60ee8JzV6NOhqDx4OyHCpm3Qitty', 'pegawai', NULL, '2020-07-09 08:45:42', '2020-07-09 08:45:42'),
(35, '060098299', 'Ellya Rosa', 'Seksi Pengawasan dan Konsultasi IV', NULL, NULL, '$2y$10$20HUURVtLv5ft4A2i8lHB.iXuoNNAWymFbEkGYz6h3pCpgXIx3Gui', 'pegawai', NULL, '2020-07-09 08:45:42', '2020-07-09 08:45:42'),
(36, '060096256', 'Farida Rosida', 'Seksi Pengawasan dan Konsultasi IV', NULL, NULL, '$2y$10$F4DSiZEJh/L9EhhwIAR27ucOUZtyE6tBz4.C60/h.XyiFEoziSMtG', 'pegawai', NULL, '2020-07-09 08:45:42', '2020-07-09 08:45:42'),
(37, '060085398', 'Emi Hertati', 'Seksi Pengawasan dan Konsultasi IV', NULL, NULL, '$2y$10$wuHzkI7Wbq7jvPWNw/Zy1OM.4.Z5FTfEUyGo7YHdtOqd1P6H/PZKS', 'pegawai', NULL, '2020-07-09 08:45:42', '2020-07-09 08:45:42'),
(38, '060103922', 'Dian Eka Ferianti', 'Seksi Ekstensifikasi dan Penyuluhan', NULL, NULL, '$2y$10$LOcvMv6iuB2A099wobvZBOWGQ9kqXbnXhegeMMZHR8MuMJOtomUnS', 'pegawai', NULL, '2020-07-09 08:45:43', '2020-07-09 08:45:43'),
(39, '060078376', 'Evanita Widya Shanti', 'Seksi Ekstensifikasi dan Penyuluhan', NULL, NULL, '$2y$10$69p6mklxKMZ53RoSdkNyue.PlUntxaRHQsS4dbYkJwWs.ttFe8z8y', 'pegawai', NULL, '2020-07-09 08:45:43', '2020-07-09 08:45:43'),
(40, '060088224', 'Arif Fianto', 'Seksi Ekstensifikasi dan Penyuluhan', NULL, NULL, '$2y$10$tiiDYPP0e1DbTACXEw44O.NvxkvK2uKKZmdSh9A/WgxOkXT9lzhsy', 'pegawai', NULL, '2020-07-09 08:45:43', '2020-07-09 08:45:43'),
(41, '060103291', 'Abdul Rahmat', 'Seksi Ekstensifikasi dan Penyuluhan', NULL, NULL, '$2y$10$vYVI..2dXnEZOTWXkR4TQeVuJ6g3PASkaQjTfzJv3VSpkWLVw1g9S', 'pegawai', NULL, '2020-07-09 08:45:43', '2020-07-09 08:45:43'),
(42, '060114554', 'Rahmad Mudjianto', 'Seksi Ekstensifikasi dan Penyuluhan', NULL, NULL, '$2y$10$HupM5zWvj2Xyhp7Sm95P4unvKswWmbYt9rTRk8Ps4w5pvrN1H7Olq', 'pegawai', NULL, '2020-07-09 08:45:43', '2020-07-09 08:45:43'),
(43, '060108898', 'Dwi Lestari', 'Seksi Ekstensifikasi dan Penyuluhan', NULL, NULL, '$2y$10$QAZ65czycicH/EraAzlduOedcCHDZrbxMUDx5.5tikG0Fb.kn3gv.', 'pegawai', NULL, '2020-07-09 08:45:43', '2020-07-09 08:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `wajib_spt`
--

CREATE TABLE `wajib_spt` (
  `id` int(11) NOT NULL,
  `npwp` varchar(20) DEFAULT NULL,
  `nama_wp` varchar(50) DEFAULT NULL,
  `jenis_wp` varchar(30) DEFAULT NULL,
  `tahun` varchar(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dim_wilayah`
--
ALTER TABLE `dim_wilayah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_import`
--
ALTER TABLE `laporan_import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_npwp`
--
ALTER TABLE `master_npwp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key_npwp` (`key_npwp`),
  ADD UNIQUE KEY `npwp` (`npwp`);

--
-- Indexes for table `master_spt`
--
ALTER TABLE `master_spt`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `target_capaian`
--
ALTER TABLE `target_capaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wajib_spt`
--
ALTER TABLE `wajib_spt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dim_wilayah`
--
ALTER TABLE `dim_wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_import`
--
ALTER TABLE `laporan_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_npwp`
--
ALTER TABLE `master_npwp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_spt`
--
ALTER TABLE `master_spt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `target_capaian`
--
ALTER TABLE `target_capaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `wajib_spt`
--
ALTER TABLE `wajib_spt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
