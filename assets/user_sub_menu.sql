-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 05:01 AM
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
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `model_menu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`, `model_menu`) VALUES
(1, 1, 'Data PO', 'index', 'zmdi zmdi-view-dashboard', 1, 2),
(2, 1, 'Form PO', 'form-po', 'zmdi zmdi-view-dashboard', 1, 2),
(3, 2, 'Barang Masuk', 'barangmasuk', 'zmdi zmdi-device-hub', 1, 2),
(4, 1, 'Form In', 'form-in', 'zmdi zmdi-shopping-cart', 1, 2),
(5, 2, 'Barang Keluar', 'barangkeluar', 'zmdi zmdi-money', 1, 2),
(6, 7, 'Supplier', 'supplier', 'zmdi zmdi-view-dashboard', 1, 2),
(7, 8, 'Menu', 'index', 'zmdi zmdi-view-dashboard', 1, 2),
(8, 7, 'Unit', 'unit', 'zmdi zmdi-view-dashboard', 1, 2),
(9, 7, 'Kategori Barang', 'kategori-barang', 'zmdi zmdi-view-dashboard', 1, 2),
(10, 7, 'Sub Kategori Barang', 'subkategori-barang', 'zmdi zmdi-view-dashboard', 1, 2),
(11, 7, 'Barang', 'barang', 'zmdi zmdi-view-dashboard', 1, 2),
(12, 7, 'Outlet', 'outlet', 'zmdi zmdi-view-dashboard', 0, 2),
(13, 6, 'Jabatan', 'jabatan', 'zmdi zmdi-view-dashboard', 1, 2),
(14, 8, 'Sub Menu', 'submenu', 'zmdi zmdi-view-dashboard', 1, 2),
(15, 6, 'Users', 'index', 'zmdi zmdi-view-dashboard', 1, 2),
(17, 4, 'Store CK', 'store-bahan', 'zmdi zmdi-view-dashboard', 1, 2),
(18, 5, 'Laporan Purchasing', 'index', 'zmdi zmdi-view-dashboard', 0, 2),
(19, 3, 'Data Produk', 'index', '', 1, 0),
(20, 3, 'Produk Masuk', 'produk-masuk', '', 1, 0),
(21, 3, 'Produk Keluar', 'produk-keluar', '', 1, 0),
(22, 5, 'Laporan Barang Masuk', 'laporanbarangmasuk', '', 1, 0),
(23, 5, 'Laporan Barang Keluar', 'laporanbarangkeluar', '', 1, 0),
(24, 3, 'Request Bahan', 'request-bahan', '', 1, 0),
(26, 4, 'Store Package', 'storepackage', '', 0, 0),
(27, 4, 'Retur', 'retur', '', 1, 0),
(29, 2, 'Data Barang', 'index', 'zmdi zmdi-money', 1, 2),
(30, 5, 'Laporan Faktur', 'laporanfaktur1', '', 1, 0),
(31, 1, 'Out Stock', 'outstok', '', 1, 0),
(32, 7, 'Customer', 'customer', '', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
