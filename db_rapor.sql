-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2023 at 11:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dat_masyarakat`
--

INSERT INTO `dat_masyarakat` (`id`, `nik`, `nama`, `telp`, `alamat`, `username`, `password`) VALUES
(9, '3211171007990005', 'Dadang Sunarya', '089646329009', '', 'dadang', '1'),
(10, '3211171007990002', 'Santai', '089646329009', '', 'san', '1'),
(13, '3211160407040004', 'Ahid', '087731370962', '', 'maddhdyt', '1234'),
(14, 'qwreqwr', 'qwrqwr', 'qwrqwr', '', 'qwrqwr', 'qwrqr'),
(15, '3211160407040003', 'Rafly Firmansyah', '0877313709621', '', 'flyy', '1234'),
(16, '3211190311072834', 'ASEP GUNAWAN', '0373743', '', 'ahidyt', 'dukahilap'),
(17, '12349729384', 'Alexander Pandora', '0877313709621', 'Rancakalong', 'alex', '1234');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dat_pengaduan`
--

INSERT INTO `dat_pengaduan` (`id`, `nik`, `tgl_pengaduan`, `judul`, `gambar`, `deskripsi`, `status_pengaduan`) VALUES
(57, '3211160407040003', '2023-02-19', 'Atap Posyandu Berlubang seperti Hatimu', '2067318508_WhatsApp Image 2022-11-02 at 6.50.26 PM.jpeg', 'lorem sssqwqwijwefj wqirhwio e wqruqio rwoi qwiorufiqo qwrjqw ioqwirfuwq ior iwriwqo  qwiruqwio o iurw qoei qw ruiwoeuwoei qwoieruiwo eo weioruywiowqo rwioeurweoi rweioruioerfu eiw rwei rwei riwe r r  ', 'Ditolak'),
(75, '3211190311072834', '2023-02-19', 'Bang dadan kepergok pacaran dengan asep', '196983353_IMG-20230217-WA0013.jpg', 'Idiwiwifjdje', 'Diterima'),
(78, '3211160407040004', '2023-02-19', 'Pelayanan di BRI Rancakalong kurang baik', '1808311922_WhatsApp Image 2023-02-11 at 7.55.08 PM.jpeg', 'wqrqr', 'Diproses'),
(79, '3211160407040004', '2023-02-19', 'qwrqwr', '1746262679_WhatsApp Image 2023-02-18 at 12.30.31 PM.jpeg', 'qwrqwr', 'Diproses');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dat_petugas`
--

INSERT INTO `dat_petugas` (`id`, `nama_petugas`, `telp`, `level`, `username`, `password`) VALUES
(1, 'asep', '087777777', 'petugas', 'petugas', '1234'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dat_pengaduan`
--
ALTER TABLE `dat_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `dat_petugas`
--
ALTER TABLE `dat_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dat_tanggapan`
--
ALTER TABLE `dat_tanggapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
