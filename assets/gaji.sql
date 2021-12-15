-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2021 pada 11.10
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

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
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kodeabs` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) NOT NULL,
  `gp` varchar(50) DEFAULT NULL,
  `tjabatan` varchar(50) DEFAULT NULL,
  `tpulsa` varchar(50) DEFAULT NULL,
  `tmakan` varchar(50) DEFAULT NULL,
  `bpjs` varchar(50) DEFAULT NULL,
  `lembur` varchar(50) DEFAULT NULL,
  `totalgaji` varchar(50) DEFAULT NULL,
  `cicilan` varchar(50) DEFAULT NULL,
  `alfa` varchar(50) DEFAULT NULL,
  `ijin` varchar(50) NOT NULL,
  `sakit` varchar(50) NOT NULL,
  `totalbon` varchar(50) DEFAULT NULL,
  `pph21` varchar(50) DEFAULT NULL,
  `totalbayar` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
