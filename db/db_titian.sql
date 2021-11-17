-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 04:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_titian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `level` enum('manajer','admin','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `status`, `level`) VALUES
(3, 'Latifah Nur Hayati', 'latifah', '8ba20a588da71148c5f54589b4f0b900', '1', 'manajer'),
(4, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 'admin'),
(5, 'superadmin', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', '1', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(200) NOT NULL,
  `atribut` varchar(100) NOT NULL,
  `bobot` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `atribut`, `bobot`) VALUES
(1, 'keaktifan', 'benefit', '20'),
(2, 'kemampuan adaptasi terhadap lingkungan', 'benefit', '25'),
(3, 'tindakan inisiatif', 'benefit', '25'),
(4, 'kesopanan dan kesantunan', 'benefit', '30'),
(5, 'sunday gathering', 'benefit', '22.5'),
(6, 'laporan SG', 'benefit', '10'),
(7, 'laporan triwulan', 'benefit', '22.5'),
(8, 'volunteer', 'benefit', '22.5'),
(9, 'konsultasi', 'benefit', '22.5');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_nilai`, `id_siswa`, `id_kriteria`, `nilai`) VALUES
(1, 1, 1, '1'),
(2, 1, 2, '2'),
(3, 1, 3, '3'),
(4, 1, 4, '4'),
(5, 1, 5, '5'),
(6, 1, 6, '6'),
(7, 1, 7, '7'),
(8, 1, 8, '8'),
(9, 1, 9, '9'),
(10, 2, 1, '1'),
(11, 2, 2, '2'),
(12, 2, 3, '2'),
(13, 2, 4, '2'),
(14, 2, 5, '2'),
(15, 2, 6, '1'),
(16, 2, 7, '1'),
(17, 2, 8, '1'),
(18, 2, 9, '1');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `generasi` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `generasi`, `tahun`) VALUES
(1, '1', 2020),
(2, '2', 2021),
(3, '3', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `rangking`
--

CREATE TABLE `rangking` (
  `id_rangking` int(11) NOT NULL,
  `rangking` int(11) NOT NULL,
  `id_siswa` varchar(50) NOT NULL,
  `nilai` varchar(11) NOT NULL,
  `keputusan` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rangking`
--

INSERT INTO `rangking` (`id_rangking`, `rangking`, `id_siswa`, `nilai`, `keputusan`, `tanggal`) VALUES
(1, 1, '1', '1.00', 'Tidak', '2021-11-16'),
(2, 2, '2', '0.00', 'Tidak', '2021-11-16'),
(3, 1, '1', '1.00', 'Tiga Bulan', '2021-11-16'),
(4, 2, '2', '0.00', 'Satu Bulan', '2021-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `id_periode` int(4) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `id_periode`, `asal_sekolah`) VALUES
(1, 'Budi Gan', 1, 'SMA N 1 Grabag'),
(2, 'Adithya', 1, 'SMA N 2 Grabag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `rangking`
--
ALTER TABLE `rangking`
  ADD PRIMARY KEY (`id_rangking`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rangking`
--
ALTER TABLE `rangking`
  MODIFY `id_rangking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
