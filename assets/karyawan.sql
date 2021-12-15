-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 07:47 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skutrs_srs`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `masukkerja` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `tanggungan` int(11) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `gajipokok` int(11) DEFAULT NULL,
  `tunjjabatan` int(11) DEFAULT NULL,
  `tunjrumah` int(11) DEFAULT NULL,
  `tunjpulsa` int(11) DEFAULT NULL,
  `tunjmakan` int(11) DEFAULT NULL,
  `bpjs` int(11) DEFAULT NULL,
  `totalgaji` int(11) DEFAULT NULL,
  `aktif` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `email`, `nama`, `jabatan`, `masukkerja`, `status`, `tanggungan`, `nip`, `gajipokok`, `tunjjabatan`, `tunjrumah`, `tunjpulsa`, `tunjmakan`, `bpjs`, `totalgaji`, `aktif`) VALUES
(3, 'tamuji@gmail.com', 'Tamuji', 'JAB001', '2013-01-01', 1, 2, '20130101003', 7000000, 0, 0, 0, 0, 0, 7000000, 1),
(8, 'santoso@gmail.com', 'Santoso', 'JAB002', '2016-08-08', 1, 2, '20160808007', 4050000, 0, 0, 0, 0, 0, 4050000, 1),
(9, 'logam@gmail.com', 'winarno', 'JAB003', '1970-01-01', 1, 2, '20170228008', 4050000, 0, 0, 0, 0, 0, 4050000, 1),
(13, 'afsablenk@gmail.com', 'A. Fani', 'JAB001', '2018-05-01', 1, 2, '20180501004', 5500000, 0, 0, 0, 0, 0, 5500000, 1),
(52, 'zidangibran14@gmail.com', 'Gibran', 'JAB004', '2021-11-20', 1, 3, '20211120001', 10000000, 0, 0, 0, 0, 0, 10000000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
