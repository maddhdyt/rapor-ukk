-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 10:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rapor`
--

-- --------------------------------------------------------

--
-- Table structure for table `dat_masyarakat`
--

CREATE TABLE `dat_masyarakat` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dat_masyarakat`
--

INSERT INTO `dat_masyarakat` (`id`, `nik`, `nama`, `telp`, `alamat`, `username`, `password`) VALUES
(17, '12349729384', 'Alexander Pandora', '0877313709621', 'Rancakalong', 'alex', '1234'),
(18, '2374628734627834', 'Dandi Ramadhan', 'qwrqwr', 'qwrqwr', 'dandi', '1234'),
(19, '', '', '', '', '', ''),
(20, '3211190311072838', 'Dandi ganteng', '82913', 'Dayeuhluhur', 'danzz', '1234'),
(21, '001', 'Ammar', '08773173627476', 'Tangker', 'Marz', '1234'),
(22, '3211190311072832', 'Anwar Maulana', '083126902110', 'SITURAJA', 'away', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `dat_pengaduan`
--

CREATE TABLE `dat_pengaduan` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL,
  `status_pengaduan` enum('Diproses','Diterima','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dat_pengaduan`
--

INSERT INTO `dat_pengaduan` (`id`, `nik`, `tgl_pengaduan`, `judul`, `gambar`, `deskripsi`, `status_pengaduan`) VALUES
(81, '3211190311072838', '2023-02-21', 'Katel lengit', '834553679_IMG-20230220-WA0036.jpg', 'Tolong carikan katel saya', 'Diproses'),
(85, '001', '2023-02-21', 'Perbaikan Jalan', '1258303367_', 'Tolong jalan tanjungkerta diperbaiki ', 'Diproses'),
(86, '001', '2023-02-21', 'Puan Maharani', '284087670_', 'Mohon kepada Pak Jokowi segera memundurkan diri dari masa jababatannya menjadi presiden', 'Diproses'),
(87, '001', '2023-02-21', 'Fredin', '1393255760_', 'Jika baikmu disepelekan maju dan hancurkan\r\n\r\nMaju ketika benar mundur ketika salah\r\n\r\nyow kumaha barudak\r\n\r\nSIKATTTTTTTTTTTTTT!', 'Diproses'),
(88, '001', '2023-02-21', 'Dandi Ramadhan', '556390043_', 'Kata sandi hospot nn madd', 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `dat_petugas`
--

CREATE TABLE `dat_petugas` (
  `id` int(11) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dat_petugas`
--

INSERT INTO `dat_petugas` (`id`, `nama_petugas`, `telp`, `level`, `username`, `password`) VALUES
(1, 'asep', '087777777', 'petugas', 'petugas', 'petugas'),
(2, 'AsepKun', '083126902110', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dat_tanggapan`
--

CREATE TABLE `dat_tanggapan` (
  `id` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dat_tanggapan`
--

INSERT INTO `dat_tanggapan` (`id`, `id_pengaduan`, `id_petugas`, `tgl_tanggapan`, `tanggapan`) VALUES
(2, 82, 2, '2023-02-21', 'Gmau jual pulau lagi\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dat_masyarakat`
--
ALTER TABLE `dat_masyarakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_pengaduan`
--
ALTER TABLE `dat_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_petugas`
--
ALTER TABLE `dat_petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dat_tanggapan`
--
ALTER TABLE `dat_tanggapan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dat_masyarakat`
--
ALTER TABLE `dat_masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `dat_pengaduan`
--
ALTER TABLE `dat_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `dat_petugas`
--
ALTER TABLE `dat_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dat_tanggapan`
--
ALTER TABLE `dat_tanggapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
