-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 04:37 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `spt`
--

CREATE TABLE `spt` (
  `id_spt` int(11) NOT NULL,
  `id_wp` int(11) NOT NULL,
  `npwp_wp` varchar(15) DEFAULT NULL,
  `status_lapor` varchar(20) DEFAULT 'Belum Lapor',
  `tanggal_lapor` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spt`
--

INSERT INTO `spt` (`id_spt`, `id_wp`, `npwp_wp`, `status_lapor`, `tanggal_lapor`, `created_at`, `updated_at`) VALUES
(1, 1, '121210291201921', 'Sudah Lapor', '07 June 2020', '2020-05-29 08:12:17', '2020-06-07 06:29:52'),
(2, 2, '131313131312121', 'Sudah Lapor', '07 June 2020', '2020-05-29 08:26:16', '2020-06-07 06:28:07'),
(4, 5, '222222222222222', 'Sudah Lapor', '24 June 2020', '2020-05-30 08:58:31', '2020-06-23 23:38:15'),
(10, 11, '115443594763313', 'Belum Lapor', NULL, '2020-06-22 03:41:22', '2020-06-22 03:41:22'),
(11, 12, '127217319078688', 'Belum Lapor', NULL, '2020-06-22 04:18:11', '2020-06-22 04:18:11'),
(12, 13, '126749227784511', 'Belum Lapor', NULL, '2020-06-22 04:18:11', '2020-06-22 04:18:11'),
(16, 17, '117510898314452', 'Sudah Lapor', '22 June 2020', '2020-06-22 04:22:30', '2020-06-22 04:43:07'),
(17, 18, '129646198797463', 'Belum Lapor', NULL, '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(18, 19, '130589478532067', 'Sudah Lapor', '22 June 2020', '2020-06-22 04:22:30', '2020-06-22 04:46:04'),
(19, 20, '130948281665758', 'Belum Lapor', NULL, '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(20, 21, '135016090749200', 'Belum Lapor', NULL, '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(22, 23, '110812237347641', 'Belum Lapor', NULL, '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(23, 24, '100784962856218', 'Belum Lapor', NULL, '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(26, 27, '110344366073805', 'Belum Lapor', NULL, '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(27, 28, '119245306593091', 'Belum Lapor', NULL, '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(28, 29, '265639772653368', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(29, 30, '435425031329474', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(30, 31, '523934683132161', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(31, 32, '996037962876214', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(32, 33, '395164149045748', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(33, 34, '504684549321301', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(34, 35, '677826030543498', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(35, 36, '465133412789228', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(36, 37, '193097760918197', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(37, 38, '963041842359616', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(38, 39, '808384061058910', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(39, 40, '626419712782043', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(40, 41, '341915318559278', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(41, 42, '136244373239458', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(42, 43, '278315284538088', 'Belum Lapor', NULL, '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(43, 44, '345796063734197', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(44, 45, '232858569173275', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(45, 46, '648027747094265', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(46, 47, '462034484980399', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(47, 48, '430910995840272', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(48, 49, '913936953620003', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(49, 50, '940023041928166', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(50, 51, '597639228071291', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(51, 52, '529056778986577', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(52, 53, '877065652456808', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(53, 54, '302874384833265', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(54, 55, '797515920771520', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(55, 56, '913023168736234', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(56, 57, '537859611279179', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(57, 58, '694840651782600', 'Belum Lapor', NULL, '2020-07-08 22:07:15', '2020-07-08 22:07:15');

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
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '123456789', 'Fajar Ary', 'Pengawasan dan Konsultasi II', NULL, 'fajar@admin.com', '$2y$10$Rx.ecJqY7TCepYvf42jvIeTJMscIi.iXeggZLdz/jhhRHGOMuzKAe', 'admin', NULL, '2020-07-03 19:46:39', '2020-07-03 19:46:39'),
(2, '060100179', 'Lisa Wahyu Hapsari Purwandani', 'Pengawasan dan Konsultasi II', NULL, 'lisa@admin.com', '$2y$10$BNOqJte.jNbxdYaFTM8F3Op1Vz5fivKvVCsVMsmxQMeO.ynfqDW2W', 'admin', NULL, '2020-07-09 06:04:15', '2020-07-09 06:04:15'),
(3, '060082119', 'Sophia Sukmawati Dewi', 'Pengawasan dan Konsultasi II', NULL, 'sophia@pegawai.com', '$2y$10$nObvZDMc6l7yLiOt99XrrOqkkx8h6Q1GimRz85iUMBiaq69xiDjze', 'pegawai', NULL, '2020-07-09 06:04:15', '2020-07-09 06:04:15'),
(4, '060098591', 'Tafsir Ma`Rup', 'Pengawasan dan Konsultasi II', NULL, 'tafsir@pegawai.com', '$2y$10$bplDy5Zw5JsIsjSMjcvvduxwhu9IqvLrMaP5klECMk1XAMlTYhWey', 'pegawai', NULL, '2020-07-09 06:04:16', '2020-07-09 06:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `wajib_pajak`
--

CREATE TABLE `wajib_pajak` (
  `id_wp` int(11) NOT NULL,
  `npwp` varchar(16) DEFAULT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `kategori_wp` varchar(40) NOT NULL,
  `jenis_spt` varchar(25) NOT NULL,
  `tahun_pajak` varchar(11) NOT NULL,
  `nama_seksi` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wajib_pajak`
--

INSERT INTO `wajib_pajak` (`id_wp`, `npwp`, `nama`, `alamat`, `kategori_wp`, `jenis_spt`, `tahun_pajak`, `nama_seksi`, `created_at`, `updated_at`) VALUES
(1, '121210291201921', 'Kris', 'Jakarta Selatan', 'Orang Pribadi (Karyawan)', '1770', '2018', 'Waskon 2', '2020-05-29 08:12:17', '2020-06-22 09:53:09'),
(2, '131313131312121', 'Budi', 'Depok', 'Orang Pribadi (Non-Karyawan)', '1771', '2019', 'Waskon 3', '2020-05-29 08:26:15', '2020-06-22 09:53:19'),
(5, '222222222222222', 'Susi Susanti', 'Jakarta Selatan', 'Badan', '1770', '2020', 'Waskon 1', '2020-05-30 08:58:31', '2020-06-22 09:53:49'),
(11, '115443594763313', 'User 61', 'QsFPd1GfRb2bTrc', 'Badan', '1779', '2015', 'waskon 4', '2020-06-22 03:41:22', '2020-06-22 03:41:22'),
(12, '127217319078688', 'User 40', 'uYV3m7lizGZFTPAkcPKz', 'Orang Pribadi (Karyawan)', '1774', '2019', 'waskon 2', '2020-06-22 04:18:11', '2020-06-22 04:18:11'),
(13, '126749227784511', 'User 35', 'PSKZhjz5iVfPLnRHSJEi', 'Badan', '1774', '2017', 'waskon 3', '2020-06-22 04:18:11', '2020-06-22 04:18:11'),
(17, '117510898314452', 'User 47', 'DLIm6Od32qB1HyjPbGIq', 'Badan', '1770', '2021', 'waskon 4', '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(18, '129646198797463', 'User 22', '8mTVmyO8Y1kgSqZXiGps', 'Orang Pribadi (Karyawan)', '1779', '2014', 'waskon 3', '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(19, '130589478532067', 'User 72', 'biYa661ndSCyxZH06LUO', 'Orang Pribadi (Non-Karyawan)', '1773', '2020', 'waskon 3', '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(20, '130948281665758', 'User 89', 'BmKvW1kFCXnOlKbPCIRt', 'Orang Pribadi (Karyawan)', '1778', '2015', 'waskon 3', '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(21, '135016090749200', 'User 25', '4Pwt0ViuUkDU5UAwmM78', 'Badan', '1779', '2021', 'waskon 3', '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(23, '110812237347641', 'User 40', 'NGFFos5ilTUb5DuNlH1f', 'Badan', '1776', '2020', 'waskon 3', '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(24, '100784962856218', 'User 89', 'sQOuo2uAGG9g7V9NJFBJ', 'Orang Pribadi (Karyawan)', '1778', '2014', 'waskon 3', '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(27, '110344366073805', 'User 31', 'oN4b27LVxQCMcvyKtth2', 'Badan', '1774', '2021', 'waskon 3', '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(28, '119245306593091', 'User 52', 'rzEZLUQSCXp9upMi1MU5', 'Orang Pribadi (Non-Karyawan)', '1770', '2021', 'waskon 2', '2020-06-22 04:22:30', '2020-06-22 04:22:30'),
(29, '265639772653368', 'User 14', 'dHr0rjiFDfahsgJXfAY8', 'Orang Pribadi (Karyawan)', '1776', '2017', 'waskon 1', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(30, '435425031329474', 'User 82', 'uP4S7NlwOZMRqWvOdcx6', 'Badan', '1774', '2015', 'waskon 1', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(31, '523934683132161', 'User 67', 'Na1s6L6gSpXP1fNcJx2g', 'Orang Pribadi (Non-Karyawan)', '1777', '2019', 'waskon 4', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(32, '996037962876214', 'User 54', 'kSPei3KTzY12xAyYlzeZ', 'Badan', '1771', '2018', 'waskon 3', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(33, '395164149045748', 'User 75', 'H1nieMQFtu0C8zBaCBX5', 'Orang Pribadi (Karyawan)', '1770', '2018', 'waskon 4', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(34, '504684549321301', 'User 13', '8KFdlxZ7YY7GQxY9X7nZ', 'Orang Pribadi (Non-Karyawan)', '1780', '2016', 'waskon 2', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(35, '677826030543498', 'User 98', 'cUeuFHCTXuTnw0xLmObJ', 'Orang Pribadi (Karyawan)', '1771', '2014', 'waskon 3', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(36, '465133412789228', 'User 93', 'PYwojlzgT8qka3qwTmH7', 'Badan', '1772', '2021', 'waskon 2', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(37, '193097760918197', 'User 25', 'ogYFCuWnY0ML1YG2SLno', 'Orang Pribadi (Non-Karyawan)', '1774', '2014', 'waskon 3', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(38, '963041842359616', 'User 19', 'kYb6sl2dluKJTMxAVtDi', 'Badan', '1775', '2015', 'waskon 3', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(39, '808384061058910', 'User 61', '0KIzWtICCz1SkeuMWeXu', 'Orang Pribadi (Karyawan)', '1779', '2019', 'waskon 1', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(40, '626419712782043', 'User 59', 'HI1lMwCzQSVzyMJuQKsd', 'Orang Pribadi (Non-Karyawan)', '1772', '2018', 'waskon 2', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(41, '341915318559278', 'User 58', 'ob62VZLgZqMw7VDbIXJ1', 'Orang Pribadi (Karyawan)', '1778', '2017', 'waskon 2', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(42, '136244373239458', 'User 90', '5aDHitmYWIR814Z9rHLT', 'Badan', '1772', '2020', 'waskon 3', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(43, '278315284538088', 'User 29', 'zK4sFamBEBU08S1GeSci', 'Orang Pribadi (Non-Karyawan)', '1774', '2018', 'waskon 4', '2020-07-08 22:07:09', '2020-07-08 22:07:09'),
(44, '345796063734197', 'User 63', '4mY9dSvQc5BMcg4rASTc', 'Orang Pribadi (Karyawan)', '1776', '2017', 'waskon 3', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(45, '232858569173275', 'User 82', 'eX6L3cEtd4KRaFIqm63u', 'Badan', '1774', '2014', 'waskon 1', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(46, '648027747094265', 'User 25', 'KXyjsWElLYLivAhG5dp5', 'Orang Pribadi (Non-Karyawan)', '1771', '2017', 'waskon 3', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(47, '462034484980399', 'User 7', 'VLNDvaStjthfDaC1xFwc', 'Badan', '1771', '2014', 'waskon 2', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(48, '430910995840272', 'User 72', 'CpuakWFcBXkGe4A19UrP', 'Orang Pribadi (Karyawan)', '1780', '2020', 'waskon 1', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(49, '913936953620003', 'User 89', 'MeJ3n0RLISHRFnEsEvOv', 'Orang Pribadi (Non-Karyawan)', '1779', '2017', 'waskon 1', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(50, '940023041928166', 'User 89', 'km24jtTGe9EpKJafGJmq', 'Orang Pribadi (Karyawan)', '1777', '2015', 'waskon 4', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(51, '597639228071291', 'User 84', 'vvXOAVk5YvV3viQsEIrG', 'Badan', '1775', '2018', 'waskon 2', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(52, '529056778986577', 'User 27', 'uNzmmNn5IbX5yxw3dYyD', 'Orang Pribadi (Non-Karyawan)', '1776', '2020', 'waskon 2', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(53, '877065652456808', 'User 14', 'Cfjh738cZwp4Y95YfhGL', 'Badan', '1773', '2015', 'waskon 4', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(54, '302874384833265', 'User 24', 'KDeqT18XwfAZHDe6Z5Es', 'Orang Pribadi (Karyawan)', '1778', '2014', 'waskon 2', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(55, '797515920771520', 'User 97', 'HIFJIIcuVbA3b1oTYisd', 'Orang Pribadi (Non-Karyawan)', '1772', '2014', 'waskon 2', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(56, '913023168736234', 'User 45', 'B9vN7IeoNbCGU1O2Ou4Z', 'Orang Pribadi (Karyawan)', '1771', '2021', 'waskon 3', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(57, '537859611279179', 'User 43', 'abYGPVPgOvzePtvW8Dcz', 'Badan', '1772', '2015', 'waskon 4', '2020-07-08 22:07:15', '2020-07-08 22:07:15'),
(58, '694840651782600', 'User 59', 'BsiQLqkIRvym9jbXTJvQ', 'Orang Pribadi (Non-Karyawan)', '1774', '2020', 'waskon 3', '2020-07-08 22:07:15', '2020-07-08 22:07:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `spt`
--
ALTER TABLE `spt`
  ADD PRIMARY KEY (`id_spt`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wajib_pajak`
--
ALTER TABLE `wajib_pajak`
  ADD PRIMARY KEY (`id_wp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spt`
--
ALTER TABLE `spt`
  MODIFY `id_spt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wajib_pajak`
--
ALTER TABLE `wajib_pajak`
  MODIFY `id_wp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
