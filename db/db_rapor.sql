-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 06:43 PM
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
  `profile` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dat_masyarakat`
--

INSERT INTO `dat_masyarakat` (`id`, `nik`, `nama`, `telp`, `alamat`, `profile`, `username`, `password`) VALUES
(43, '3211190311072830', 'Ahmad Hidayat', '083126902110', 'Rancakalong', '347660336_The Wind Rises ↝ Jiro Horikoshi _ Hanako Satomi _ Honjo _ Kayo Horikoshi _ Kurokawa.jpg', 'amadkun', '81dc9bdb52d04dc20036dbd8313ed055'),
(44, '3211160407040004', 'Erika Sukmawati', '08731370962', 'Nalegong', '498538852_𝗏𝖾𝗅𝗈𝗎𝗍_.png', 'jaegf', '6a40cf245cb3250a41e457bebb9bf561'),
(45, '321119031017381', 'Masyarakat 1', '083126902261', 'Konoha', '', 'masyarakat1', '81dc9bdb52d04dc20036dbd8313ed055'),
(46, '321119031816317', 'Rafly Doank', '083126294828', 'Situraja', '', 'rflygntng', '81dc9bdb52d04dc20036dbd8313ed055');

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
  `status_pengaduan` enum('Diproses','Diterima','Ditolak') NOT NULL,
  `kategori` enum('private','public') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dat_pengaduan`
--

INSERT INTO `dat_pengaduan` (`id`, `nik`, `tgl_pengaduan`, `judul`, `gambar`, `deskripsi`, `status_pengaduan`, `kategori`) VALUES
(177, '3211190311072830', '2023-03-12', 'Jalan rusak', '2085843501_images (1).jpeg', 'Ada jalan berlubang disekitaran cibiru, mohon segera diperbaiki karena sangat menggangu lalu lintas', 'Diproses', 'public'),
(178, '3211190311072830', '2023-03-12', 'Fasilitas rusak', '1924825854_IMG-20230312-WA0075.jpg', 'Tanda lalu lintas roboh, mohon segera diperbaiki ', 'Diproses', 'public'),
(179, '321119031017381', '2023-03-12', 'Atap bocor', '1951965538_IMG-20230312-WA0072.jpg', 'Atap di bangunan desa Rancakalong berlubang, harap segera diperbaiki', 'Diproses', 'public'),
(180, '321119031816317', '2023-03-12', 'Jalan rusak', '1094441428_IMG-20230312-WA0074.jpg', 'Jalan rusak menghabat aktivitas warga sekitar cibiru mohon segera diperbaiki', 'Diterima', 'public'),
(181, '3211190311072830', '2023-03-12', 'Karyawan bank dicurigai bobol atm', '782719387_IMG-20230312-WA0077.jpg', 'Atm di dekat rumah saya semalam kebobolan, saya curiga ke salah satu karyawan di BRI itu karena gerak geriknya yang mencurigakan, mohon segera diidentifikasi pelakunya', 'Diproses', 'private');

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
(6, 'Petugas Baru', '080', 'petugas', 'petugas', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'Admin Ahmad', '083126902110', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
-- Dumping data for table `dat_tanggapan`
--

INSERT INTO `dat_tanggapan` (`id`, `id_pengaduan`, `id_petugas`, `tgl_tanggapan`, `tanggapan`) VALUES
(30, 175, 7, '2023-03-12', 'qwfrqwf'),
(31, 180, 7, '2023-03-12', 'oke akan segera kami tindak lanjut segera\r\n');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `dat_pengaduan`
--
ALTER TABLE `dat_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `dat_petugas`
--
ALTER TABLE `dat_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dat_tanggapan`
--
ALTER TABLE `dat_tanggapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
