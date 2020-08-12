-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 11:17 PM
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
(1, 'Cilodong', 'CILODONG', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(2, 'Jatimulya', 'CILODONG', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(3, 'Kalibaru', 'CILODONG', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(4, 'Kalimulya', 'CILODONG', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(5, 'Sukamaju', 'CILODONG', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(6, 'Cisalak Pasar', 'CIMANGGIS', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(7, 'Curug', 'CIMANGGIS', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(8, 'Harjamukti', 'CIMANGGIS', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(9, 'Mekarsari', 'CIMANGGIS', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(10, 'Pasir Gunung Selatan', 'CIMANGGIS', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(11, 'Tugu', 'CIMANGGIS', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(12, 'Bojong Pondok Terong', 'CIPAYUNG', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(13, 'Cipayung', 'CIPAYUNG', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(14, 'Cipayung Jaya', 'CIPAYUNG', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(15, 'Pondok Jaya', 'CIPAYUNG', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(16, 'Ratu jaya', 'CIPAYUNG', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(17, 'Abadi Jaya', 'SUKMAJAYA', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(18, 'Baktijaya', 'SUKMAJAYA', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(19, 'Cisalak', 'SUKMAJAYA', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(20, 'Mekar Jaya', 'SUKMAJAYA', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(21, 'Sukmajaya', 'SUKMAJAYA', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(22, 'TirtaJaya', 'SUKMAJAYA', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(23, 'Cilangkap', 'TAPOS', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(24, 'Cimpaeun', 'TAPOS', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(25, 'Jatijajar', 'TAPOS', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(26, 'Leuwinanggung', 'TAPOS', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(27, 'Sukamaju Baru', 'TAPOS', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(28, 'Sukatani', 'TAPOS', '2020-07-18 01:22:53', '2020-07-18 01:22:53'),
(29, 'Tapos', 'TAPOS', '2020-07-18 01:22:53', '2020-07-18 01:22:53');

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

--
-- Dumping data for table `master_npwp`
--

INSERT INTO `master_npwp` (`id`, `npwp`, `kd_kpp`, `kd_cabang`, `key_npwp`, `nama_wp`, `jenis_wp`, `kota`, `kelurahan`, `kecamatan`, `propinsi`, `nama_ar`, `seksi`, `nip_pendek`, `created_at`, `updated_at`) VALUES
(1, '588239597', '412', '000', '588239597412000', 'HUSE', 'OP', 'KOTA DEPOK', 'Cilodong', 'CILODONG', 'JAWA BARAT', 'Nina Windiati', 'Seksi Pengawasan dan Konsultasi IV', '120143851', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(2, '282616512', '412', '000', '282616512412000', 'SUHA', 'OP', 'KOTA DEPOK', 'Jatimulya', 'CILODONG', 'JAWA BARAT', 'Farida Rosida', 'Seksi Pengawasan dan Konsultasi IV', '060096256', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(3, '384601551', '412', '000', '384601551412000', 'RIKY', 'OP', 'KOTA DEPOK', 'Kalibaru', 'CILODONG', 'JAWA BARAT', 'Damar Andaruwati', 'Seksi Pengawasan dan Konsultasi IV', '060087567', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(4, '317126489', '412', '000', '317126489412000', 'ZENI', 'OP', 'KOTA DEPOK', 'Kalimulya', 'CILODONG', 'JAWA BARAT', 'Enur Nurnaningsih', 'Seksi Pengawasan dan Konsultasi IV', '060082107', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(5, '525649852', '412', '000', '525649852412000', 'ASNI', 'OP', 'KOTA DEPOK', 'Sukamaju', 'CILODONG', 'JAWA BARAT', 'Watryana', 'Seksi Pengawasan dan Konsultasi IV', '060088036', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(6, '285333053', '412', '000', '285333053412000', 'HERR', 'OP', 'KOTA DEPOK', 'Cisalak Pasar', 'CIMANGGIS', 'JAWA BARAT', 'Arif Fianto', 'Seksi Ekstensifikasi dan Penyuluhan', '060088224', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(7, '268950554', '412', '000', '268950554412000', 'SITI', 'OP', 'KOTA DEPOK', 'Curug', 'CIMANGGIS', 'JAWA BARAT', 'Dwi Lestari', 'Seksi Ekstensifikasi dan Penyuluhan', '060108898', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(8, '365617724', '412', '000', '365617724412000', 'ARI ', 'OP', 'KOTA DEPOK', 'Harjamukti', 'CIMANGGIS', 'JAWA BARAT', 'Abdul Rahmat', 'Seksi Ekstensifikasi dan Penyuluhan', '060103291', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(9, '545513477', '412', '000', '545513477412000', 'IWAN', 'OP', 'KOTA DEPOK', 'Mekarsari', 'CIMANGGIS', 'JAWA BARAT', 'Evanita Widya Shanti', 'Seksi Ekstensifikasi dan Penyuluhan', '060078376', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(10, '148656807', '412', '000', '148656807412000', 'SIGI', 'OP', 'KOTA DEPOK', 'Pasir Gunung Selatan', 'CIMANGGIS', 'JAWA BARAT', 'Dian Eka Ferianti', 'Seksi Ekstensifikasi dan Penyuluhan', '060103922', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(11, '486832818', '412', '000', '486832818412000', 'AHMA', 'OP', 'KOTA DEPOK', 'Tugu', 'CIMANGGIS', 'JAWA BARAT', 'Rahmad Mudjianto', 'Seksi Ekstensifikasi dan Penyuluhan', '060114554', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(12, '895219332', '412', '000', '895219332412000', 'ATIK', 'OP', 'KOTA DEPOK', 'Bojong Pondok Terong', 'CIPAYUNG', 'JAWA BARAT', 'Mega Isnaini Nauli', 'Seksi Pengawasan dan Konsultasi III', '922209788', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(13, '505102763', '412', '000', '505102763412000', 'LA J', 'OP', 'KOTA DEPOK', 'Cipayung', 'CIPAYUNG', 'JAWA BARAT', 'Sri Utami', 'Seksi Pengawasan dan Konsultasi III', '060093765', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(14, '147898565', '412', '000', '147898565412000', 'ANTO', 'OP', 'KOTA DEPOK', 'Cipayung Jaya', 'CIPAYUNG', 'JAWA BARAT', 'Yayah Qodariyah', 'Seksi Pengawasan dan Konsultasi III', '060081979', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(15, '959872741', '412', '000', '959872741412000', 'YUDH', 'OP', 'KOTA DEPOK', 'Pondok Jaya', 'CIPAYUNG', 'JAWA BARAT', 'Arna Kusumawati', 'Seksi Pengawasan dan Konsultasi III', '802650038', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(16, '504404460', '412', '000', '504404460412000', 'MUHA', 'OP', 'KOTA DEPOK', 'Ratu jaya', 'CIPAYUNG', 'JAWA BARAT', 'Euis Purnama Sari', 'Seksi Pengawasan dan Konsultasi III', '060096547', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(17, '795034912', '412', '000', '795034912412000', 'DERI', 'OP', 'KOTA DEPOK', 'Abadi Jaya', 'SUKMAJAYA', 'JAWA BARAT', 'Titik Sunarti', 'Seksi Pengawasan dan Konsultasi III', '060096318', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(18, '532413014', '412', '000', '532413014412000', 'YAND', 'OP', 'KOTA DEPOK', 'Baktijaya', 'SUKMAJAYA', 'JAWA BARAT', 'Kamalia', 'Seksi Pengawasan dan Konsultasi III', '060084271', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(19, '675571901', '412', '000', '675571901412000', 'GILA', 'OP', 'KOTA DEPOK', 'Cisalak', 'SUKMAJAYA', 'JAWA BARAT', 'Erni Nurdiana', 'Seksi Pengawasan dan Konsultasi III', '060093643', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(20, '845787137', '412', '000', '845787137412000', 'ADIT', 'OP', 'KOTA DEPOK', 'Mekar Jaya', 'SUKMAJAYA', 'JAWA BARAT', 'Irwansyah', 'Seksi Pengawasan dan Konsultasi III', '060099873', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(21, '546881788', '412', '000', '546881788412000', 'URIP', 'OP', 'KOTA DEPOK', 'Sukmajaya', 'SUKMAJAYA', 'JAWA BARAT', 'Sri Mulatsih', 'Seksi Pengawasan dan Konsultasi III', '060098712', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(22, '974767181', '412', '000', '974767181412000', 'NURY', 'OP', 'KOTA DEPOK', 'TirtaJaya', 'SUKMAJAYA', 'JAWA BARAT', 'Supartinah', 'Seksi Pengawasan dan Konsultasi III', '060082300', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(23, '799059142', '412', '000', '799059142412000', 'RIDW', 'OP', 'KOTA DEPOK', 'Cilangkap', 'TAPOS', 'JAWA BARAT', 'Luh Rahmi Susanti', 'Seksi Pengawasan dan Konsultasi IV', '901215316', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(24, '389414991', '412', '000', '389414991412000', 'LULU', 'OP', 'KOTA DEPOK', 'Cimpaeun', 'TAPOS', 'JAWA BARAT', 'Ida Rosyida', 'Seksi Pengawasan dan Konsultasi IV', '060083689', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(25, '826728627', '412', '000', '826728627412000', 'NURB', 'OP', 'KOTA DEPOK', 'Jatijajar', 'TAPOS', 'JAWA BARAT', 'Memet', 'Seksi Pengawasan dan Konsultasi IV', '060083801', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(26, '569422072', '412', '000', '569422072412000', 'YOHA', 'OP', 'KOTA DEPOK', 'Leuwinanggung', 'TAPOS', 'JAWA BARAT', 'Natalinda Siahaan', 'Seksi Pengawasan dan Konsultasi IV', '060088148', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(27, '359540681', '412', '000', '359540681412000', 'HASN', 'OP', 'KOTA DEPOK', 'Sukamaju Baru', 'TAPOS', 'JAWA BARAT', 'Ellya Rosa', 'Seksi Pengawasan dan Konsultasi IV', '060098299', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(28, '451813321', '412', '000', '451813321412000', 'MONI', 'OP', 'KOTA DEPOK', 'Sukatani', 'TAPOS', 'JAWA BARAT', 'Maria Jutensa Triade', 'Seksi Pengawasan dan Konsultasi IV', '863030412', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(29, '337499972', '412', '000', '337499972412000', 'WEND', 'OP', 'KOTA DEPOK', 'Tapos', 'TAPOS', 'JAWA BARAT', 'Emi Hertati', 'Seksi Pengawasan dan Konsultasi IV', '060085398', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(30, '135563724', '412', '000', '135563724412000', 'HERU', 'OP', 'KAB. BOYOLALI', 'MADU', 'MOJOSONGO', 'JAWA TENGAH', 'Yayah Qodariyah', 'Seksi Pengawasan dan Konsultasi III', '060081979', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(31, '215889896', '412', '000', '215889896412000', 'FAUZ', 'OP', 'KAB. BOYOLALI', 'SINGOSARI', 'MOJOSONGO', 'JAWA TENGAH', 'Yayah Qodariyah', 'Seksi Pengawasan dan Konsultasi III', '060081979', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(32, '940830217', '412', '000', '940830217412000', 'KRIS', 'OP', 'KAB. BOYOLALI', 'KARANGJATI', 'WONOSEGORO', 'JAWA TENGAH', 'Yayah Qodariyah', 'Seksi Pengawasan dan Konsultasi III', '060081979', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(33, '781948175', '412', '000', '781948175412000', 'JOHA', 'OP', 'KAB. BOYOLALI', 'SIWODIPURAN', 'BOYOLALI', 'JAWA TENGAH', 'Yayah Qodariyah', 'Seksi Pengawasan dan Konsultasi III', '060081979', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(34, '311629067', '412', '000', '311629067412000', 'JULI', 'OP', 'Luar Area KPP', 'BUKAN WILAYAH KPP', 'Bukan Wilayah KPP', 'Bukan Wilayah KPP', 'Yayah Qodariyah', 'Seksi Pengawasan dan Konsultasi III', '060081979', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(35, '829095881', '412', '000', '829095881412000', 'NITA', 'OP', 'Luar Area KPP', 'BUKAN WILAYAH KPP', 'Bukan Wilayah KPP', 'Bukan Wilayah KPP', 'Yayah Qodariyah', 'Seksi Pengawasan dan Konsultasi III', '060081979', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(36, '783094684', '412', '000', '783094684412000', 'KARI', 'OP', 'KOTA DEPOK', 'Kalimulya', 'CILODONG', 'JAWA BARAT', 'Fajar Ary Nugroho', 'Seksi Pengawasan dan Konsultasi II', '835010329', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(37, '643560716', '412', '000', '643560716412000', 'UTAM', 'OP', 'KOTA DEPOK', 'Sukamaju', 'CILODONG', 'JAWA BARAT', 'Lisa Wahyu Hapsari Purwandani', 'Seksi Pengawasan dan Konsultasi II', '060100179', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(38, '880131386', '412', '000', '880131386412000', 'NURD', 'OP', 'KOTA DEPOK', 'Cisalak Pasar', 'CIMANGGIS', 'JAWA BARAT', 'Tafsir Ma`Rup', 'Seksi Pengawasan dan Konsultasi II', '060098591', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(39, '438730502', '412', '000', '438730502412000', 'ANAN', 'OP', 'KOTA DEPOK', 'Curug', 'CIMANGGIS', 'JAWA BARAT', 'Sophia Sukmawati Dewi', 'Seksi Pengawasan dan Konsultasi II', '060082119', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(40, '914012385', '412', '000', '914012385412000', 'RISK', 'OP', 'KOTA DEPOK', 'Sukmajaya', 'SUKMAJAYA', 'JAWA BARAT', 'Andi Fauzi', 'Seksi Pengawasan dan Konsultasi II', '930102249', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(41, '676844409', '412', '000', '676844409412000', 'SAGI', 'OP', 'KOTA DEPOK', 'TirtaJaya', 'SUKMAJAYA', 'JAWA BARAT', 'Didi Mulyadi', 'Seksi Pengawasan dan Konsultasi II', '060098761', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(42, '275523173', '412', '000', '275523173412000', 'FANI', 'OP', 'KOTA DEPOK', 'Cilangkap', 'TAPOS', 'JAWA BARAT', 'Yohan Febrian', 'Seksi Pengawasan dan Konsultasi II', '060106757', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(43, '146898097', '412', '000', '146898097412000', 'FATA', 'OP', 'KOTA DEPOK', 'Cipayung', 'CIPAYUNG', 'JAWA BARAT', 'Alexander Santober', 'Seksi Pengawasan dan Konsultasi II', '060105690', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(44, '147191531', '412', '000', '147191531412000', 'SUTA', 'OP', 'KOTA DEPOK', 'Cilodong', 'CILODONG', 'JAWA BARAT', 'Nina Windiati', 'Seksi Pengawasan dan Konsultasi IV', '120143851', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(45, '216906146', '412', '000', '216906146412000', 'GITA', 'OP', 'KOTA DEPOK', 'Jatimulya', 'CILODONG', 'JAWA BARAT', 'Farida Rosida', 'Seksi Pengawasan dan Konsultasi IV', '060096256', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(46, '991733615', '412', '000', '991733615412000', 'TANI', 'OP', 'KOTA DEPOK', 'Kalibaru', 'CILODONG', 'JAWA BARAT', 'Damar Andaruwati', 'Seksi Pengawasan dan Konsultasi IV', '060087567', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(47, '779323504', '412', '000', '779323504412000', 'FITR', 'OP', 'KOTA DEPOK', 'Kalimulya', 'CILODONG', 'JAWA BARAT', 'Enur Nurnaningsih', 'Seksi Pengawasan dan Konsultasi IV', '060082107', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(48, '378726554', '412', '000', '378726554412000', 'DILI', 'OP', 'KOTA DEPOK', 'Sukamaju', 'CILODONG', 'JAWA BARAT', 'Watryana', 'Seksi Pengawasan dan Konsultasi IV', '060088036', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(49, '775786307', '412', '000', '775786307412000', 'ANNI', 'OP', 'KOTA DEPOK', 'Cisalak Pasar', 'CIMANGGIS', 'JAWA BARAT', 'Arif Fianto', 'Seksi Ekstensifikasi dan Penyuluhan', '060088224', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(50, '347326415', '412', '000', '347326415412000', 'ANEU', 'OP', 'KOTA DEPOK', 'Curug', 'CIMANGGIS', 'JAWA BARAT', 'Dwi Lestari', 'Seksi Ekstensifikasi dan Penyuluhan', '060108898', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(51, '443250236', '412', '000', '443250236412000', 'NONI', 'BADAN', 'KOTA DEPOK', 'Harjamukti', 'CIMANGGIS', 'JAWA BARAT', 'Abdul Rahmat', 'Seksi Ekstensifikasi dan Penyuluhan', '060103291', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(52, '528895521', '412', '000', '528895521412000', 'SURO', 'BADAN', 'KOTA DEPOK', 'Mekarsari', 'CIMANGGIS', 'JAWA BARAT', 'Evanita Widya Shanti', 'Seksi Ekstensifikasi dan Penyuluhan', '060078376', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(53, '468133449', '412', '000', '468133449412000', 'MUHA', 'BADAN', 'KOTA DEPOK', 'Pasir Gunung Selatan', 'CIMANGGIS', 'JAWA BARAT', 'Dian Eka Ferianti', 'Seksi Ekstensifikasi dan Penyuluhan', '060103922', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(54, '455977836', '412', '000', '455977836412000', 'MARY', 'BADAN', 'KOTA DEPOK', 'Tugu', 'CIMANGGIS', 'JAWA BARAT', 'Rahmad Mudjianto', 'Seksi Ekstensifikasi dan Penyuluhan', '060114554', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(55, '249051811', '412', '000', '249051811412000', 'SYAR', 'BADAN', 'KOTA DEPOK', 'Bojong Pondok Terong', 'CIPAYUNG', 'JAWA BARAT', 'Mega Isnaini Nauli', 'Seksi Pengawasan dan Konsultasi III', '922209788', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(56, '239219229', '412', '000', '239219229412000', 'GALI', 'BADAN', 'KOTA DEPOK', 'Cipayung', 'CIPAYUNG', 'JAWA BARAT', 'Sri Utami', 'Seksi Pengawasan dan Konsultasi III', '060093765', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(57, '150683604', '412', '000', '150683604412000', 'UMAN', 'BADAN', 'KOTA DEPOK', 'Cipayung Jaya', 'CIPAYUNG', 'JAWA BARAT', 'Yayah Qodariyah', 'Seksi Pengawasan dan Konsultasi III', '060081979', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(58, '659272138', '412', '000', '659272138412000', 'R. S', 'BADAN', 'KOTA DEPOK', 'Pondok Jaya', 'CIPAYUNG', 'JAWA BARAT', 'Arna Kusumawati', 'Seksi Pengawasan dan Konsultasi III', '802650038', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(59, '866538956', '412', '000', '866538956412000', 'DARM', 'BADAN', 'KOTA DEPOK', 'Ratu jaya', 'CIPAYUNG', 'JAWA BARAT', 'Euis Purnama Sari', 'Seksi Pengawasan dan Konsultasi III', '060096547', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(60, '318200260', '412', '000', '318200260412000', 'IRWA', 'BADAN', 'KOTA DEPOK', 'Abadi Jaya', 'SUKMAJAYA', 'JAWA BARAT', 'Titik Sunarti', 'Seksi Pengawasan dan Konsultasi III', '060096318', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(61, '604579455', '412', '000', '604579455412000', 'ANNI', 'BADAN', 'KOTA DEPOK', 'Baktijaya', 'SUKMAJAYA', 'JAWA BARAT', 'Kamalia', 'Seksi Pengawasan dan Konsultasi III', '060084271', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(62, '610963306', '412', '000', '610963306412000', 'MUTI', 'BADAN', 'KOTA DEPOK', 'Cisalak', 'SUKMAJAYA', 'JAWA BARAT', 'Erni Nurdiana', 'Seksi Pengawasan dan Konsultasi III', '060093643', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(63, '446650364', '412', '000', '446650364412000', 'JAKA', 'BADAN', 'KOTA DEPOK', 'Mekar Jaya', 'SUKMAJAYA', 'JAWA BARAT', 'Irwansyah', 'Seksi Pengawasan dan Konsultasi III', '060099873', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(64, '217948945', '412', '000', '217948945412000', 'DWI ', 'BADAN', 'KOTA DEPOK', 'Sukmajaya', 'SUKMAJAYA', 'JAWA BARAT', 'Sri Mulatsih', 'Seksi Pengawasan dan Konsultasi III', '060098712', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(65, '337028581', '412', '000', '337028581412000', 'ANIT', 'BADAN', 'KOTA DEPOK', 'TirtaJaya', 'SUKMAJAYA', 'JAWA BARAT', 'Supartinah', 'Seksi Pengawasan dan Konsultasi III', '060082300', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(66, '882641797', '412', '000', '882641797412000', 'ZAIN', 'BADAN', 'KOTA DEPOK', 'Cilangkap', 'TAPOS', 'JAWA BARAT', 'Luh Rahmi Susanti', 'Seksi Pengawasan dan Konsultasi IV', '901215316', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(67, '731338219', '412', '000', '731338219412000', 'RESA', 'BADAN', 'KOTA DEPOK', 'Cimpaeun', 'TAPOS', 'JAWA BARAT', 'Ida Rosyida', 'Seksi Pengawasan dan Konsultasi IV', '060083689', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(68, '150488448', '412', '000', '150488448412000', 'EKO ', 'BADAN', 'KOTA DEPOK', 'Jatijajar', 'TAPOS', 'JAWA BARAT', 'Memet', 'Seksi Pengawasan dan Konsultasi IV', '060083801', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(69, '578856115', '412', '000', '578856115412000', 'AWAL', 'BADAN', 'KAB. BOYOLALI', 'SIWODIPURAN', 'BOYOLALI', 'JAWA TENGAH', 'Yayah Qodariyah', 'Seksi Pengawasan dan Konsultasi III', '060081979', '2020-07-17 09:41:59', '2020-07-17 09:41:59'),
(70, '737810672', '412', '000', '737810672412000', 'AGUS', 'BADAN', 'Luar Area KPP', 'BUKAN WILAYAH KPP', 'Bukan Wilayah KPP', 'Bukan Wilayah KPP', 'Yayah Qodariyah', 'Seksi Pengawasan dan Konsultasi III', '060081979', '2020-07-17 09:41:59', '2020-07-17 09:41:59');

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

--
-- Dumping data for table `master_spt`
--

INSERT INTO `master_spt` (`id`, `npwp`, `kd_kpp`, `kd_cabang`, `key_npwp`, `no_tandaterima`, `jenis_spt`, `pembetulan`, `tgl_spt`, `status_spt`, `created_at`, `updated_at`) VALUES
(1, '150683604', '412', '000', '150683604412000', 'S-68721494/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 0, '19,Apr 2020', 'Kurang Bayar', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(2, '659272138', '412', '000', '659272138412000', 'S-52242820/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(3, '866538956', '412', '000', '866538956412000', 'S-40083633/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(4, '318200260', '412', '000', '318200260412000', 'S-44575839/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(5, '604579455', '412', '000', '604579455412000', 'S-50549262/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(6, '610963306', '412', '000', '610963306412000', 'S-75948186/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(7, '446650364', '412', '000', '446650364412000', 'S-45800886/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 0, '19,Apr 2020', 'Lebih Bayar', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(8, '217948945', '412', '000', '217948945412000', 'S-51607259/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(9, '337028581', '412', '000', '337028581412000', 'S-51575306/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(10, '882641797', '412', '000', '882641797412000', 'S-63008427/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(11, '731338219', '412', '000', '731338219412000', 'S-37339106/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 1, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(12, '150488448', '412', '000', '150488448412000', 'S-62864413/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(13, '578856115', '412', '000', '578856115412000', 'S-47081592/PPWBIDR/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Badan', 0, '19,Apr 2018', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(14, '147191531', '412', '000', '147191531412000', 'S-74336622/PPTOPS/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(15, '216906146', '412', '000', '216906146412000', 'S-36267060/PPTOP/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(16, '991733615', '412', '000', '991733615412000', 'S-33616536/PPTOP/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(17, '779323504', '412', '000', '779323504412000', 'S-66417176/PPTOPS/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(18, '525649852', '412', '000', '525649852412000', 'S-73072952/PPTOPS/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(19, '285333053', '412', '000', '285333053412000', 'S-13635191/PPTOPSS/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(20, '268950554', '412', '000', '268950554412000', 'S-64865648/PPTOPSS/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(21, '365617724', '412', '000', '365617724412000', 'S-85932381/PPTOPSS/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 2, '19,Apr 2020', 'Kurang Bayar', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(22, '545513477', '412', '000', '545513477412000', 'S-68286269/PPTOP/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Kurang Bayar', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(23, '148656807', '412', '000', '148656807412000', 'S-25458213/PPTOP/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Kurang Bayar', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(24, '486832818', '412', '000', '486832818412000', 'S-85742142/PPTOPSS/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(25, '895219332', '412', '000', '895219332412000', 'S-76185881/PPTOPSS/WPJ.33/KP.0603/2016', 'SPT Tahunan PPh Orang Pribadi', 0, '15,Mar 2019', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(26, '505102763', '412', '000', '505102763412000', 'S-86851785/PPTOPS/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(27, '588239597', '412', '000', '588239597412000', 'S-90319736/PPTOP/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(28, '282616512', '412', '000', '282616512412000', 'S-74418013/PPTOP/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(29, '384601551', '412', '000', '384601551412000', 'S-71081065/PPTOPS/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(30, '317126489', '412', '000', '317126489412000', 'S-83306158/PPTOPSS/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(31, '318200260', '412', '000', '318200260412000', 'S-71088065/PPTOPS/WPJ.33/KP.0603/2020', 'SPT Tahunan PPh Orang Pribadi', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(32, '849340076', '412', '000', '849340076412000', 'S-47081512/PPH2114/WPJ.33/KP.0603/2019', 'SPT Masa PPh Pasal 21/26', 0, '19,Apr 2019', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(33, '939000000', '412', '000', '939000000412000', 'S-74332622/PPH42/WPJ.33/KP.0603/2019', 'SPT Masa PPh Pasal 4 ayat (2)', 2, '20,Jun 2018', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(34, '960832156', '412', '000', '960832156412000', 'S-36267000/PPH23/WPJ.33/KP.0603/2020', 'SPT Masa PPh Pasal 23/26', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(35, '349318583', '412', '000', '349318583412000', 'S-33616236/PPN1111/WPJ.33/KP.0603/2017', 'SPT Masa PPN dan PPnBM', 1, '19,Dec 2017', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04'),
(36, '268950554', '412', '000', '268950554412000', 'S-64865648/PPTOPSS/WPJ.33/KP.0603/2020', 'SPT Masa PPh Pasal 21/26', 0, '19,Apr 2020', 'Nihil', '2020-08-10 06:53:04', '2020-08-10 06:53:04');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '123456789', 'Fajar Ary', 'Pengawasan dan Konsultasi II', NULL, 'fajar@admin.com', '$2y$10$Rx.ecJqY7TCepYvf42jvIeTJMscIi.iXeggZLdz/jhhRHGOMuzKAe', 'admin', NULL, '2020-07-03 19:46:39', '2020-07-03 19:46:39'),
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Dumping data for table `wajib_spt`
--

INSERT INTO `wajib_spt` (`id`, `npwp`, `nama_wp`, `jenis_wp`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '578856115412000', 'AWAL', 'BADAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(2, '737810672412000', 'AGUS', 'BADAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(3, '588239597412000', 'HUSE', 'OP NON KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(4, '282616512412000', 'SUHA', 'OP NON KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(5, '384601551412000', 'RIKY', 'OP NON KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(6, '317126489412000', 'ZENI', 'OP NON KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(7, '525649852412000', 'ASNI', 'OP NON KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(8, '285333053412000', 'HERR', 'OP NON KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(9, '268950554412000', 'SITI', 'OP NON KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(10, '365617724412000', 'ARI ', 'OP NON KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(11, '545513477412000', 'IWAN', 'OP NON KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(12, '148656807412000', 'SIGI', 'OP NON KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(13, '486832818412000', 'AHMA', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(14, '895219322412000', 'KITA', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(15, '505102763412000', 'LA J', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(16, '147898565412000', 'ANTO', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(17, '959872741412000', 'YUDH', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(18, '504404460412000', 'MUHA', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(19, '795034912412000', 'DERI', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(20, '532413014412000', 'YAND', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(21, '675571901412000', 'GILA', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(22, '845787137412000', 'ADIT', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(23, '546881788412000', 'URIP', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(24, '974767181412000', 'NURY', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(25, '799059142412000', 'RIDW', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(26, '389414991412000', 'LULU', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(27, '826728627412000', 'NURB', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(28, '569422072412000', 'YOHA', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(29, '359540681412000', 'HASN', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(30, '451813321412000', 'MONI', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(31, '337499972412000', 'WEND', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(32, '783094684412000', 'KARI', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(33, '643560716412000', 'UTAM', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(34, '880131386412000', 'NURD', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(35, '438730502412000', 'ANAN', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(36, '914012385412000', 'RISK', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(37, '676844409412000', 'SAGI', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(38, '275523173412000', 'FANI', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(39, '146898097412000', 'FATA', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(40, '378726554412000', 'DILI', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(41, '775786307412000', 'ANNI', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(42, '347326415412000', 'ANEU', 'OP KARYAWAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(43, '443250236412000', 'NONI', 'BADAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(44, '528895521412000', 'SURO', 'BADAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(45, '468133449412000', 'MUHA', 'BADAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(46, '455977836412000', 'MARY', 'BADAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(47, '249051811412000', 'SYAR', 'BADAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(48, '239219229412000', 'GALI', 'BADAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(49, '150683604412000', 'UMAN', 'BADAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48'),
(50, '659272138412000', 'R. S', 'BADAN', '2020', '2020-07-16 09:55:48', '2020-07-16 09:55:48');

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
-- AUTO_INCREMENT for table `master_npwp`
--
ALTER TABLE `master_npwp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `master_spt`
--
ALTER TABLE `master_spt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spt`
--
ALTER TABLE `spt`
  MODIFY `id_spt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `wajib_pajak`
--
ALTER TABLE `wajib_pajak`
  MODIFY `id_wp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wajib_spt`
--
ALTER TABLE `wajib_spt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
