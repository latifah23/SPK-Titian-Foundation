-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2021 at 02:10 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.24

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
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `status`) VALUES
(3, 'Latifah Nur Hayati', 'Latifah', '202cb962ac59075b964b07152d234b70', '1');

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
(1, 'keaktifan', 'benefit', '0.20'),
(2, 'kemampuan adaptasi terhadap lingkungan', 'benefit', '0.25'),
(3, 'tindakan inisiatif', 'benefit', '0.25'),
(4, 'kesopanan dan kesantunan', 'benefit', '0.30'),
(5, 'sunday gathering', 'benefit', '0.225'),
(6, 'laporan SG', 'benefit', '0.10'),
(7, 'laporan triwulan', 'benefit', '0.225'),
(8, 'volunteer', 'benefit', '0.225'),
(9, 'konsultasi', 'benefit', '0.225');

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
(1, 1, 1, '0.150'),
(2, 1, 2, '0.220'),
(3, 1, 3, '0.220'),
(4, 1, 4, '0.300'),
(5, 1, 5, '0.225'),
(6, 1, 6, '0.100'),
(7, 1, 7, '0.225'),
(8, 1, 8, '0.225'),
(9, 1, 9, '0.225'),
(10, 2, 1, '0.150'),
(11, 2, 2, '0.190'),
(12, 2, 3, '0.220'),
(13, 2, 4, '0.300'),
(14, 2, 5, '0.225'),
(15, 2, 6, '0.100'),
(16, 2, 7, '0.225'),
(17, 2, 8, '0.225'),
(18, 2, 9, '0.225'),
(19, 3, 1, '0.200'),
(20, 3, 2, '0.220'),
(21, 3, 3, '0.220'),
(22, 3, 4, '0.300'),
(23, 3, 5, '0.190'),
(24, 3, 6, '0.800'),
(25, 3, 7, '0.225'),
(26, 3, 8, '0.225'),
(27, 3, 9, '0.225'),
(28, 4, 1, '0.150'),
(29, 4, 2, '0.220'),
(30, 4, 3, '0.220'),
(31, 4, 4, '0.300'),
(32, 4, 5, '0.225'),
(33, 4, 6, '0.900'),
(34, 4, 7, '0.225'),
(35, 4, 8, '0.225'),
(36, 4, 9, '0.225'),
(37, 5, 1, '0.180'),
(38, 5, 2, '0.220'),
(39, 5, 3, '0.250'),
(40, 5, 4, '0.300'),
(41, 5, 5, '0.160'),
(42, 5, 6, '0.900'),
(43, 5, 7, '0.225'),
(44, 5, 8, '0.225'),
(45, 5, 9, '0.225'),
(46, 6, 1, '0.200'),
(47, 6, 2, '0.250'),
(48, 6, 3, '0.250'),
(49, 6, 4, '0.300'),
(50, 6, 5, '0.225'),
(51, 6, 6, '0.100'),
(52, 6, 7, '0.225'),
(53, 6, 8, '0.190'),
(54, 6, 9, '0.225'),
(56, 7, 1, '0.200'),
(57, 7, 2, '0.250'),
(58, 7, 3, '0.250'),
(59, 7, 4, '0.300'),
(60, 7, 5, '0.190'),
(61, 7, 6, '0.800'),
(62, 7, 7, '0.225'),
(63, 7, 8, '0.225'),
(64, 7, 9, '0.225'),
(65, 8, 1, '0.150'),
(66, 8, 2, '0.190'),
(67, 8, 3, '0.220'),
(68, 8, 4, '0.300'),
(69, 8, 5, '0.225'),
(70, 8, 6, '0.100'),
(71, 8, 7, '0.225'),
(72, 8, 8, '0.225'),
(73, 8, 9, '0.150'),
(83, 9, 1, '0.200'),
(84, 9, 2, '0.250'),
(85, 9, 3, '0.250'),
(86, 9, 4, '0.300'),
(87, 9, 5, '0.180'),
(88, 9, 6, '0.800'),
(89, 9, 7, '0.225'),
(90, 9, 8, '0.225'),
(91, 9, 9, '0.225'),
(92, 10, 1, '0.150'),
(93, 10, 2, '0.220'),
(94, 10, 3, '0.220'),
(95, 10, 4, '0.300'),
(96, 10, 5, '0.225'),
(97, 10, 6, '0.100'),
(98, 10, 7, '0.215'),
(99, 10, 8, '0.225'),
(100, 10, 9, '0.140'),
(110, 19, 1, '0.150'),
(111, 19, 2, '0.150'),
(112, 19, 3, '0.150'),
(113, 19, 4, '0.150'),
(114, 19, 5, '0.150'),
(115, 19, 6, '0.150'),
(116, 19, 7, '0.150'),
(117, 19, 8, '0.150'),
(118, 19, 9, '0.255');

-- --------------------------------------------------------

--
-- Table structure for table `rangking`
--

CREATE TABLE `rangking` (
  `id_rangking` int(11) NOT NULL,
  `rangking` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nilai` varchar(11) NOT NULL,
  `keputusan` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rangking`
--

INSERT INTO `rangking` (`id_rangking`, `rangking`, `nama_siswa`, `nilai`, `keputusan`, `tanggal`) VALUES
(1, 1, 'Ambrosius Suryawan', '0.81', 'Satu Tahun', '2021-10-31'),
(2, 2, 'Anas Mujahidin', '0.78', 'Enam Bulan', '2021-10-31'),
(3, 3, 'Akmal Khoirul H', '0.73', 'Tidak', '2021-10-31'),
(4, 4, 'Alvian Rizky Arga Pratama', '0.71', 'Tidak', '2021-10-31'),
(5, 5, 'Alvin Surya Mahendra', '0.68', 'Tidak', '2021-10-31'),
(6, 6, 'Alya Fitri Khasanah', '0.52', 'Tidak', '2021-10-31'),
(7, 7, 'Afrizal Syifa Kurnianto', '0.45', 'Tidak', '2021-10-31'),
(8, 8, 'Ajeng Rahmawati', '0.42', 'Tidak', '2021-10-31'),
(9, 9, 'Andreas Novyanto', '0.32', 'Enam Bulan', '2021-10-31'),
(10, 10, 'An Nisa\' Nur Ahsani', '0.31', 'Tidak', '2021-10-31'),
(11, 1, 'Ambrosius Suryawan', '0.81', 'Enam Bulan', '2021-11-01'),
(12, 2, 'Anas Mujahidin', '0.78', 'Satu Tahun', '2021-11-01'),
(13, 3, 'Akmal Khoirul H', '0.73', 'Enam Bulan', '2021-11-01'),
(14, 4, 'Alvian Rizky Arga Pratama', '0.71', 'Tiga Bulan', '2021-11-01'),
(15, 5, 'Alvin Surya Mahendra', '0.68', 'Tidak', '2021-11-01'),
(16, 6, 'Alya Fitri Khasanah', '0.52', 'Tidak', '2021-11-01'),
(17, 7, 'Afrizal Syifa Kurnianto', '0.45', 'Tidak', '2021-11-01'),
(18, 8, 'Ajeng Rahmawati', '0.42', 'Tidak', '2021-11-01'),
(19, 9, 'Andreas Novyanto', '0.32', 'Tidak', '2021-11-01'),
(20, 10, 'An Nisa\' Nur Ahsani', '0.31', 'Satu Tahun', '2021-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `asal_sekolah`) VALUES
(1, 'Afrizal Syifa Kurnianto\r\n', ''),
(2, 'Ajeng Rahmawati\r\n', ''),
(3, 'Akmal Khoirul H\r\n', ''),
(4, 'Alvian Rizky Arga Pratama\r\n', ''),
(5, 'Alvin Surya Mahendra\r\n', ''),
(6, 'Alya Fitri Khasanah\r\n', ''),
(7, 'Ambrosius Suryawan\r\n', ''),
(8, 'An Nisa\' Nur Ahsani\r\n', ''),
(9, 'Anas Mujahidin\r\n', ''),
(10, 'Andreas Novyanto\r\n', 'Amikom Yogya');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `rangking`
--
ALTER TABLE `rangking`
  MODIFY `id_rangking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
