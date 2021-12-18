-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 05:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citramandiri`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `url`, `icon`, `gambar`) VALUES
(1, 'Purchasing', 'purchasing', 'zmdi zmdi-shopping-cart', 'purchasing.png'),
(2, 'Inventory', 'inventory', 'zmdi zmdi-format-list-bulleted', 'inventory1.png'),
(3, 'Administrasi', 'administrasi', 'zmdi zmdi-refresh', 'administrasi1.png'),
(4, 'Akuntansi', 'akuntansi', 'zmdi zmdi-mall', 'accounting.jpg'),
(5, 'Report', 'report', 'zmdi zmdi-assignment', 'report.png'),
(6, 'User', 'users', 'zmdi zmdi-accounts-add', 'user.png'),
(7, 'Data Master', 'datamaster', 'zmdi zmdi-view-list', 'datamaster.png'),
(8, 'Administrator', 'administrator', 'zmdi zmdi-settings', 'administrator.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
