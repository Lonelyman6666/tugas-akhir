-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 09:10 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lestari`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nama_admin`, `email_admin`, `password_admin`, `created_at`, `updated_at`) VALUES
(3, 'Cepi Cahyana', 'cepic6666@gmail.com', '$2y$10$zZcGiY/ylqstVV7RtyEqb.o0dBXJTqy60vXzyhsWIaypcoL5J9St2', '2021-06-06 20:30:53', '2021-08-08 11:08:56'),
(5, 'Admin', 'admin@gmail.com', '$2y$10$4.B8bKRNv6zL.1txbrKCrOQZSiuHMFgOrtkMCr7EN.94yiZONNrAG', '2021-06-15 23:36:40', '2021-06-15 23:36:40'),
(7, 'Ucup', 'ucup@gmail.com', '$2y$10$WYiM116/EaPOeBX72K65i.5iv6.mINnpmhLbRghi.D43xTzZDpBki', '2021-07-18 19:13:46', '2021-07-18 19:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cabang`
--

CREATE TABLE `tbl_cabang` (
  `id` int(11) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cabang`
--

INSERT INTO `tbl_cabang` (`id`, `nama_cabang`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Lestari 1', 'Lestari 1', '2021-06-07 17:47:02', '2021-06-07 17:47:02'),
(2, 'Lestari 2', 'Lestari 2', '2021-06-07 17:47:17', '2021-06-07 17:47:17'),
(3, 'Lestari 3', 'Lestari 3', '2021-06-07 17:47:32', '2021-06-07 17:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_penghuni`
--

CREATE TABLE `tbl_detail_penghuni` (
  `penghuni_id` int(11) NOT NULL,
  `nik_penghuni` int(20) DEFAULT NULL,
  `nama_penghuni` varchar(50) DEFAULT NULL,
  `alamat_penghuni` text DEFAULT NULL,
  `wa_penghuni` varchar(20) DEFAULT NULL,
  `ktp_penghuni` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_penghuni`
--

INSERT INTO `tbl_detail_penghuni` (`penghuni_id`, `nik_penghuni`, `nama_penghuni`, `alamat_penghuni`, `wa_penghuni`, `ktp_penghuni`, `created_at`, `updated_at`) VALUES
(11, 123123123, 'Wantrisnadi Gusti', 'Bekasi', '082118580955', 'Wantris.jpg', '2021-08-08 00:13:55', '2021-08-08 00:13:55'),
(12, 1234567, 'Cepi Cahyana', 'Kp. peer Rt.03 Rw.23 kec.Ciwidey Des.Ciwidey Kab.Bandung', '082118480955', 'image.jpg', '2021-08-18 23:30:28', '2021-08-18 16:30:28'),
(15, NULL, NULL, NULL, NULL, NULL, '2021-08-18 16:48:09', '2021-08-18 16:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fasilitas`
--

CREATE TABLE `tbl_fasilitas` (
  `id` int(11) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fasilitas`
--

INSERT INTO `tbl_fasilitas` (`id`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Biasa', '2021-06-07 17:20:48', '2021-06-07 17:20:48'),
(2, 'AC', '2021-06-07 17:21:53', '2021-06-07 17:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kamar`
--

CREATE TABLE `tbl_kamar` (
  `id` int(11) NOT NULL,
  `no_kamar` int(10) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `status_kamar` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`id`, `no_kamar`, `id_fasilitas`, `id_cabang`, `status_kamar`, `created_at`, `updated_at`) VALUES
(9, 1, 2, 1, 'Terisi', '2021-07-22 05:06:17', '2021-07-28 18:10:27'),
(10, 2, 2, 1, 'Terisi', '2021-07-22 05:06:24', '2021-08-01 19:55:48'),
(11, 3, 2, 1, 'Kosong', '2021-07-22 05:06:31', '2021-08-21 03:19:27'),
(12, 4, 1, 1, 'Terisi', '2021-07-22 05:06:35', '2021-08-18 17:09:33'),
(13, 5, 1, 1, 'Kosong', '2021-07-22 05:06:39', '2021-07-22 05:06:39'),
(14, 6, 1, 1, 'Kosong', '2021-07-22 05:06:43', '2021-07-22 05:06:43'),
(15, 7, 1, 1, 'Kosong', '2021-07-22 05:06:47', '2021-07-22 05:06:47'),
(16, 8, 1, 1, 'Kosong', '2021-07-22 05:06:51', '2021-07-22 05:06:51'),
(17, 9, 1, 1, 'Kosong', '2021-07-22 05:06:55', '2021-07-22 05:06:55'),
(18, 10, 1, 1, 'Kosong', '2021-07-22 05:06:58', '2021-07-22 05:06:58'),
(19, 11, 1, 1, 'Kosong', '2021-07-22 05:07:04', '2021-07-22 05:07:04'),
(20, 12, 1, 1, 'Kosong', '2021-07-22 05:07:08', '2021-07-22 05:07:08'),
(21, 13, 1, 1, 'Kosong', '2021-07-22 05:07:14', '2021-07-22 05:07:14'),
(22, 14, 1, 1, 'Kosong', '2021-07-22 05:07:18', '2021-07-22 05:07:18'),
(23, 15, 1, 1, 'Kosong', '2021-07-22 05:07:22', '2021-07-22 05:07:22'),
(24, 16, 1, 1, 'Kosong', '2021-07-22 05:07:27', '2021-07-22 05:07:27'),
(25, 17, 1, 1, 'Kosong', '2021-07-22 05:07:31', '2021-07-22 05:07:31'),
(26, 18, 1, 1, 'Kosong', '2021-07-22 05:07:37', '2021-07-22 05:07:37'),
(27, 19, 1, 1, 'Kosong', '2021-07-22 05:07:41', '2021-07-22 05:07:41'),
(28, 20, 1, 1, 'Kosong', '2021-07-22 05:07:52', '2021-07-22 05:07:52'),
(29, 21, 1, 1, 'Kosong', '2021-07-22 05:07:58', '2021-07-22 05:07:58'),
(30, 1, 1, 2, 'Kosong', '2021-07-22 05:09:45', '2021-07-22 05:09:45'),
(31, 2, 1, 2, 'Kosong', '2021-07-22 05:09:54', '2021-07-22 05:09:54'),
(32, 3, 1, 2, 'Kosong', '2021-07-22 05:10:01', '2021-07-22 05:10:01'),
(33, 4, 1, 2, 'Kosong', '2021-07-22 05:10:07', '2021-07-22 05:10:07'),
(34, 5, 1, 2, 'Kosong', '2021-07-22 05:10:12', '2021-07-22 05:10:12'),
(35, 6, 1, 2, 'Kosong', '2021-07-22 05:10:18', '2021-07-22 05:10:18'),
(36, 7, 1, 2, 'Kosong', '2021-07-22 05:10:24', '2021-07-22 05:10:24'),
(37, 8, 1, 2, 'Kosong', '2021-07-22 05:10:29', '2021-07-22 05:10:29'),
(38, 9, 1, 2, 'Kosong', '2021-07-22 05:10:38', '2021-07-22 05:10:38'),
(39, 10, 1, 2, 'Kosong', '2021-07-22 05:10:44', '2021-07-22 05:10:44'),
(40, 11, 1, 2, 'Kosong', '2021-07-22 05:10:50', '2021-07-22 05:10:50'),
(41, 12, 1, 2, 'Kosong', '2021-07-22 05:10:55', '2021-07-22 05:10:55'),
(42, 13, 1, 2, 'Kosong', '2021-07-22 05:11:01', '2021-07-22 05:11:01'),
(43, 14, 1, 2, 'Kosong', '2021-07-22 05:11:06', '2021-07-22 05:11:06'),
(44, 15, 1, 2, 'Kosong', '2021-07-22 05:11:12', '2021-07-22 05:11:12'),
(45, 16, 1, 2, 'Kosong', '2021-07-22 05:11:17', '2021-07-22 05:11:17'),
(46, 1, 1, 3, 'Kosong', '2021-07-22 05:14:02', '2021-07-22 05:14:02'),
(47, 2, 1, 3, 'Kosong', '2021-07-22 05:14:07', '2021-07-22 05:14:07'),
(48, 3, 1, 3, 'Kosong', '2021-07-22 05:14:12', '2021-07-22 05:14:12'),
(49, 4, 1, 3, 'Kosong', '2021-07-22 05:14:17', '2021-07-22 05:14:17'),
(50, 5, 1, 3, 'Kosong', '2021-07-22 05:14:22', '2021-07-22 05:14:22'),
(51, 6, 1, 3, 'Kosong', '2021-07-22 05:14:27', '2021-07-22 05:14:27'),
(52, 8, 1, 3, 'Kosong', '2021-07-22 05:14:35', '2021-07-22 05:14:35'),
(53, 9, 1, 3, 'Kosong', '2021-07-22 05:14:40', '2021-07-22 05:14:40'),
(54, 10, 1, 3, 'Kosong', '2021-07-22 05:14:47', '2021-07-22 05:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluhan`
--

CREATE TABLE `tbl_keluhan` (
  `id` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_keluhan`
--

INSERT INTO `tbl_keluhan` (`id`, `id_sewa`, `keluhan`, `status`, `created_at`, `updated_at`) VALUES
(2, 11, 'Lampu Mati', 'Selesai', '2021-07-31 17:30:08', '2021-08-07 17:25:14'),
(3, 15, 'Kipas Angin Mati', 'Menunggu', '2021-08-18 16:38:28', '2021-08-18 16:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `bayar_sewa` int(20) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `sisa_pembayaran` int(20) DEFAULT NULL,
  `status_pembayaran` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id`, `id_sewa`, `bayar_sewa`, `tanggal_pembayaran`, `sisa_pembayaran`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(9, 11, 400000, '2021-08-04', 150000, 'Belum Lunas', '2021-08-03 19:35:08', '2021-08-03 19:35:08'),
(11, 15, 800000, '2021-08-05', 100000, 'Belum Lunas', '2021-08-05 02:00:22', '2021-08-05 02:00:22'),
(14, 17, 550000, '2021-09-01', 0, 'Lunas', '2021-08-21 04:50:14', '2021-08-21 04:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengeluaran`
--

CREATE TABLE `tbl_pengeluaran` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `biaya` int(25) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengeluaran`
--

INSERT INTO `tbl_pengeluaran` (`id`, `keterangan`, `biaya`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 'Bayar WIFI', 500000, '2021-08-02', '2021-08-06 17:58:16', '2021-08-06 17:58:16'),
(2, 'Beli Lampu', 10000, '2021-08-02', '2021-08-06 18:00:59', '2021-08-06 18:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penghuni`
--

CREATE TABLE `tbl_penghuni` (
  `id` int(11) NOT NULL,
  `username_penghuni` varchar(50) NOT NULL,
  `password_penghuni` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penghuni`
--

INSERT INTO `tbl_penghuni` (`id`, `username_penghuni`, `password_penghuni`, `status`, `updated_at`, `created_at`) VALUES
(11, 'wacik', '$2y$10$3x9fIyp02ufeKfs7/EktH.F/3qBiZrnIx1iiUrTYZx7M87tTN/Wmu', 'Aktif', '2021-07-31 17:14:46', '2021-06-06 19:20:59'),
(12, 'cepi', '$2y$10$9ypVfFGisLt9d13P50K7NeVmi/f7fxdVihHB53kwgr6wQYRbxfSZy', 'Aktif', '2021-07-29 02:02:34', '2021-07-18 18:02:50'),
(15, 'test', '$2y$10$cPFLjUaSElRIGMBntxUslehES/ICdM6FPZeOckuf/FLbfI0elM5Aq', 'Non-Aktif', '2021-08-20 16:45:10', '2021-08-18 16:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id`, `nama`, `alamat`, `no_wa`, `id_fasilitas`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ucup', 'Ciwidey', '082118480955', 1, 'Ditolak', '2021-08-12 23:54:01', '2021-07-22 04:58:11'),
(2, 'Tatang', 'Garut', '082118480955', 1, 'Ditolak', '2021-08-05 23:54:09', '2021-07-25 18:48:13'),
(3, 'Dadang', 'Cianjur', '082118480955', 2, 'Diterima', '2021-08-06 23:54:15', '2021-07-25 18:53:11'),
(4, 'TOTO', 'Cinajur', '082118480955', 1, 'Diterima', '2021-08-10 16:50:14', '2021-08-18 17:21:16'),
(8, 'test', 'Garut', '082118480955', 2, 'Diterima', '2021-08-18 15:50:00', '2021-08-20 01:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sewa`
--

CREATE TABLE `tbl_sewa` (
  `id` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_penghuni` int(11) NOT NULL,
  `kost_bareng` varchar(25) DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `jangka_waktu` varchar(25) NOT NULL,
  `bayar_sewa` int(25) DEFAULT NULL,
  `tenggak_waktu` date DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sewa`
--

INSERT INTO `tbl_sewa` (`id`, `id_kamar`, `id_penghuni`, `kost_bareng`, `tanggal_masuk`, `jangka_waktu`, `bayar_sewa`, `tenggak_waktu`, `status`, `created_at`, `updated_at`) VALUES
(11, 9, 11, NULL, '2021-07-29', 'Bulan', 550000, '2021-09-26', 'Aktif', '2021-07-28 18:08:17', '2021-08-18 17:14:30'),
(15, 10, 12, NULL, '2021-08-02', 'Bulan', 900000, '2021-08-30', 'Aktif', '2021-08-01 19:55:48', '2021-08-05 02:00:22'),
(17, 12, 15, NULL, '2021-08-19', 'Bulan', 550000, '2021-10-19', 'Aktif', '2021-08-18 17:09:33', '2021-08-21 04:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site`
--

CREATE TABLE `tbl_site` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(25) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cabang`
--
ALTER TABLE `tbl_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_detail_penghuni`
--
ALTER TABLE `tbl_detail_penghuni`
  ADD UNIQUE KEY `penghuni_id` (`penghuni_id`),
  ADD KEY `id` (`penghuni_id`);

--
-- Indexes for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fasilitas` (`id_fasilitas`,`id_cabang`),
  ADD KEY `id_cabang` (`id_cabang`);

--
-- Indexes for table `tbl_keluhan`
--
ALTER TABLE `tbl_keluhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indexes for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_penghuni`
--
ALTER TABLE `tbl_penghuni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sewa`
--
ALTER TABLE `tbl_sewa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kamar` (`id_kamar`,`id_penghuni`),
  ADD KEY `id_penghuni` (`id_penghuni`);

--
-- Indexes for table `tbl_site`
--
ALTER TABLE `tbl_site`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_cabang`
--
ALTER TABLE `tbl_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_keluhan`
--
ALTER TABLE `tbl_keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_pengeluaran`
--
ALTER TABLE `tbl_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_penghuni`
--
ALTER TABLE `tbl_penghuni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_sewa`
--
ALTER TABLE `tbl_sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_site`
--
ALTER TABLE `tbl_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail_penghuni`
--
ALTER TABLE `tbl_detail_penghuni`
  ADD CONSTRAINT `tbl_detail_penghuni_ibfk_1` FOREIGN KEY (`penghuni_id`) REFERENCES `tbl_penghuni` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kamar`
--
ALTER TABLE `tbl_kamar`
  ADD CONSTRAINT `tbl_kamar_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `tbl_fasilitas` (`id`),
  ADD CONSTRAINT `tbl_kamar_ibfk_2` FOREIGN KEY (`id_cabang`) REFERENCES `tbl_cabang` (`id`);

--
-- Constraints for table `tbl_keluhan`
--
ALTER TABLE `tbl_keluhan`
  ADD CONSTRAINT `tbl_keluhan_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `tbl_sewa` (`id`);

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `tbl_sewa` (`id`);

--
-- Constraints for table `tbl_sewa`
--
ALTER TABLE `tbl_sewa`
  ADD CONSTRAINT `tbl_sewa_ibfk_1` FOREIGN KEY (`id_penghuni`) REFERENCES `tbl_penghuni` (`id`),
  ADD CONSTRAINT `tbl_sewa_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `tbl_kamar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
