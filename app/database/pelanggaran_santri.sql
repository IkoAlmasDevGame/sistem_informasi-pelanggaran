-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 06:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelanggaran_santri`
--

-- --------------------------------------------------------

--
-- Table structure for table `keamanan`
--

CREATE TABLE `keamanan` (
  `id` int(11) NOT NULL,
  `id_keamanan` varchar(5) NOT NULL,
  `id_ketua` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `no_hp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ketua`
--

CREATE TABLE `ketua` (
  `id` int(11) NOT NULL,
  `id_ketua` varchar(5) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `no_hp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `no_pelanggaran` varchar(5) NOT NULL,
  `nama_pelanggaran` varchar(25) NOT NULL,
  `no_sanksi` varchar(5) NOT NULL,
  `id_keamanan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `repassword` varchar(255) NOT NULL,
  `role` enum('ketua','keamanan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanksi`
--

CREATE TABLE `sanksi` (
  `id_sanksi` int(11) NOT NULL,
  `no_sanksi` varchar(5) NOT NULL,
  `nama_sanksi` varchar(25) NOT NULL,
  `jenis_sanksi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_pelanggaran` varchar(5) NOT NULL,
  `no_sanksi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `laporan_diskusi`
--

CREATE TABLE `laporan_diskusi` (
  `id` int(11) NOT NULL,
  `nama_santri` varchar(40) NOT NULL,
  `no_pelanggaran` varchar(5) NOT NULL,
  `no_sanksi` varchar(5) NOT NULL,
  `id_ketua` varchar(5) NOT NULL,
  `id_keamanan` varchar(5) NOT NULL,
  `hasil_diskusi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keamanan`
--
ALTER TABLE `keamanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_keamanan` (`id_keamanan`) USING BTREE,
  ADD KEY `id_ketua` (`id_ketua`) USING BTREE;

--
-- Indexes for table `ketua`
--
ALTER TABLE `ketua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ketua` (`id_ketua`) USING BTREE;

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `no_pelanggaran` (`no_pelanggaran`),
  ADD KEY `no_sanksi` (`no_sanksi`) USING BTREE,
  ADD KEY `id_keamanan` (`id_keamanan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD PRIMARY KEY (`id_sanksi`),
  ADD KEY `no_sanksi` (`no_sanksi`) USING BTREE;

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`) USING BTREE,
  ADD KEY `no_sanksi` (`no_sanksi`) USING BTREE,
  ADD KEY `no_pelanggaran` (`no_pelanggaran`) USING BTREE;
  
--
-- Indexes for table `laporan_diskusi`
--
ALTER TABLE `laporan_diskusi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_pelanggaran` (`no_pelanggaran`),
  ADD KEY `no_sanksi` (`no_sanksi`),
  ADD KEY `nama_santri` (`nama_santri`) USING BTREE;
  ADD KEY `id_keamanan` (`id_keamanan`) USING BTREE,
  ADD KEY `id_ketua` (`id_ketua`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keamanan`
--
ALTER TABLE `keamanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ketua`
--
ALTER TABLE `ketua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanksi`
--
ALTER TABLE `sanksi`
  MODIFY `id_sanksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_diskusi`
--
ALTER TABLE `laporan_diskusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- Constraints for dumped tables
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;