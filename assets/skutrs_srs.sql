-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 06:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

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
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kodeabs` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `hadir` int(11) DEFAULT NULL,
  `lembur` int(11) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL,
  `ijin` int(11) DEFAULT NULL,
  `alfa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `tanggal`, `kodeabs`, `nama`, `nip`, `hadir`, `lembur`, `sakit`, `ijin`, `alfa`) VALUES
(1, '2021-10-01', 'ABS20211101001', 'A. Fani', '20180501004', 0, 0, 0, 0, 1),
(2, '2021-10-01', 'ABS20211101002', 'Muhammad ZIdan Khalil Gibran', '20211120001', 1, 0, 0, 0, 0),
(3, '2021-10-01', 'ABS20211101003', 'Santoso', '20160808007', 0, 0, 0, 0, 1),
(4, '2021-10-01', 'ABS20211101004', 'Tamuji', '20130101003', 1, 0, 0, 0, 0),
(5, '2021-10-01', 'ABS20211101005', 'Winarno', '20170228008', 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `userlevel` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userrole` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `userlevel`, `password`, `userrole`) VALUES
(1, 'afsablenk@gmail.com', 'SG', 1, '$2y$10$iN8JXV8HbVIXcdNNBfW1.eul70D5g2AK0ZNtXb0kjNFxY4yNz/YLW', 'master');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
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

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `kodejabatan` varchar(50) DEFAULT NULL,
  `namajabatan` varchar(50) DEFAULT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `kodejabatan`, `namajabatan`, `status`) VALUES
(1, 'JAB001', 'Manager', 1),
(4, 'JAB002', 'Accounting', 1),
(5, 'JAB003', 'Administrasi', 1),
(6, 'JAB004', 'Kepala Proyek', 1),
(7, 'JAB000', 'super user', 1);

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
(38, 'zidangibran14@gmail.com', 'Muhammad ZIdan Khalil Gibran', 'JAB000', '0000-00-00', 0, 0, '20211120001', 30000000, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kodekas` varchar(50) DEFAULT NULL,
  `kodebulan` varchar(50) DEFAULT NULL,
  `kodetr` varchar(50) DEFAULT NULL,
  `payto` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `input` int(11) DEFAULT NULL,
  `output` int(11) DEFAULT NULL,
  `saldo` int(11) DEFAULT NULL,
  `kodeakun` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id`, `tanggal`, `kodekas`, `kodebulan`, `kodetr`, `payto`, `keterangan`, `input`, `output`, `saldo`, `kodeakun`) VALUES
(37, '2021-04-01', 'KM', '2104', '0001', 'Dwi', 'saldo Bulang Maret 2021', 1226750, 0, 1226750, '434'),
(38, '2021-04-01', 'KK', '2104', '0001', 'Hapiz', 'Ganti uang ops hapiz tasik ', 0, 580000, 646750, '522'),
(39, '2021-04-01', 'KK', '2104', '0002', 'Hapiz', 'Ops hapiz pamulang', 0, 100000, 546750, '522'),
(41, '2021-04-01', 'KK', '2104', '0003', 'Yoyon', 'Beli platstrip', 0, 100000, 446750, '524'),
(42, '2021-04-01', 'KK', '2104', '0004', 'Anam', 'Bensin ', 0, 100000, 346750, '522'),
(43, '2021-04-01', 'KK', '2104', '0005', 'Anam', 'e tol', 0, 52000, 294750, '522'),
(44, '2021-04-01', 'KK', '2104', '0006', 'joy', 'Bensin k orlando Pamulang', 0, 20000, 274750, '522'),
(45, '2021-04-01', 'KK', '2104', '0007', 'wawan', 'Bensin k orlando Pamulang', 0, 20000, 254750, '522'),
(49, '2021-04-01', 'KM', '2104', '0002', 'PAK HASAN', 'MAsuk dr Pak Hasan', 5000000, 0, 5254750, '434'),
(50, '2021-04-01', 'KK', '2104', '0008', 'pak lani', 'kirim barang k pamulang ', 0, 700000, 4554750, '522'),
(51, '2021-04-01', 'KK', '2104', '0009', 'kris', 'Uang jln kris k ricat', 0, 100000, 4454750, '522'),
(52, '2021-04-01', 'KK', '2104', '0010', 'dwi', 'ss mirror 201 4lembar', 0, 3440000, 1014750, '524'),
(53, '2021-04-01', 'KK', '2104', '0011', 'dwi yoyon', 'bensin k glodok', 0, 100000, 914750, '522'),
(54, '2021-04-01', 'KK', '2104', '0012', 'dwi yoyon', 'e tol glodok', 0, 102000, 812750, '522'),
(55, '2021-04-01', 'KK', '2104', '0013', 'supir', 'ngasih orang wijaya', 0, 20000, 792750, '5202'),
(56, '2021-04-01', 'KK', '2104', '0014', 'tukang', 'ngasih orang bersama jaya', 0, 20000, 772750, '5202'),
(57, '2021-04-01', 'KK', '2104', '0015', 'yoyon', 'parkir', 0, 15000, 757750, '522'),
(58, '2021-04-01', 'KK', '2104', '0016', 'dwi yoyon', 'aqua', 0, 35000, 722750, '523'),
(59, '2021-04-02', 'KK', '2104', '0017', 'anam', 'bensin buaran anam', 0, 100000, 622750, '522'),
(60, '2021-04-02', 'KK', '2104', '0018', 'anam', 'e tol anam', 0, 52000, 570750, '522'),
(61, '2021-04-12', 'KK', '2104', '0019', 'yoyon', 'bensin pamulang yoyon', 0, 100000, 470750, '522'),
(62, '2021-04-02', 'KK', '2104', '0020', 'yoyon', 'e tol yoyon ', 0, 52000, 418750, '522'),
(63, '2021-04-12', 'KK', '2104', '0021', 'yoyon', 'aqua yoyon', 0, 20000, 398750, '523'),
(64, '2021-04-02', 'KK', '2104', '0022', 'anam', 'aqua anam', 0, 20000, 378750, '523'),
(66, '2021-04-02', 'KM', '2104', '0003', 'PAK HASAN', 'Masuk dr Pak Hasan', 55000000, 0, 55378750, '434'),
(68, '2021-04-02', 'KK', '2104', '0023', 'joy', 'gaji joy bca', 0, 6612750, 48766000, '511'),
(69, '2021-04-02', 'KK', '2104', '0024', 'adi', 'gaji adi bca', 0, 5871000, 42895000, '511'),
(70, '2021-04-02', 'KK', '2104', '0025', 'kris', 'gaji kris bri', 0, 7728500, 35166500, '511'),
(71, '2021-04-02', 'KK', '2104', '0026', 'kris', 'bri kris', 0, 6500, 35160000, '517'),
(72, '2021-04-02', 'KK', '2104', '0027', 'yoyon', 'gaji yoyon bca', 0, 4186250, 30973750, '511'),
(73, '2021-04-02', 'KK', '2104', '0028', 'hafiz', 'gaji hafiz bca', 0, 5156000, 25817750, '511'),
(74, '2021-04-02', 'KK', '2104', '0029', 'wawan', 'gaji wawan bca', 0, 3802500, 22015250, '511'),
(75, '2021-04-02', 'KK', '2104', '0030', 'dwi', 'gaji dwi bca', 0, 4755000, 17260250, '511'),
(76, '2021-04-02', 'KK', '2104', '0031', 'david', 'gaji david bca', 0, 3542500, 13717750, '511'),
(77, '2021-04-02', 'KK', '2104', '0032', 'anam', 'gaji anam bca', 0, 4570000, 9147750, '511'),
(78, '2021-04-02', 'KK', '2104', '0033', 'wawan', 'gaji pak wawan', 0, 4152500, 4995250, '511'),
(79, '2021-04-02', 'KK', '2104', '0034', 'dede iwan', 'gaji dede iwan', 0, 3352500, 1642750, '511'),
(80, '2021-04-02', 'KK', '2104', '0035', 'pak ahmad', 'gaji pak ahmad', 0, 600000, 1042750, '511'),
(81, '2021-04-02', 'KK', '2104', '0036', 'pak rt', 'gaji pak rt', 0, 300000, 742750, '511'),
(82, '2021-04-03', 'KM', '2104', '0004', 'PAK HASAN', 'Masuk dr Pak Hasan', 8000000, 0, 8742750, '434'),
(83, '2021-04-03', 'KK', '2104', '0037', 'yoyon', 'bensin glodok-dadak yoyon', 0, 100000, 8642750, '522'),
(84, '2021-04-03', 'KK', '2104', '0038', 'yoyon', 'e tol yoyon', 0, 102000, 8540750, '522'),
(86, '2021-04-03', 'KK', '2104', '0040', 'toko', 'belnja sperepart listrik', 0, 7177000, 1338750, '524'),
(87, '2021-04-03', 'KM', '2104', '0005', 'PAK HASAN', 'Masuk dr Pak Hasan', 1000000, 0, 2338750, '434'),
(88, '2021-04-03', 'KK', '2104', '0041', 'lestari', 'exp u ricat tex 5', 0, 1700000, 638750, '524'),
(89, '2021-04-03', 'KK', '2104', '0042', 'kris', 'ganti uang kris beli alat jambi dan baut&quot;', 0, 600000, 38750, '521'),
(90, '2021-04-03', 'KK', '2104', '0043', 'yoyon', 'aqua yoyon', 0, 20000, 18750, '523'),
(91, '2021-04-05', 'KM', '2104', '0006', 'PAK HASAN', 'Masuk dr Pak Hasan', 2000000, 0, 2018750, '434'),
(92, '2021-04-05', 'KK', '2104', '0044', 'pak lani', 'ongkos pak lani k legok ', 0, 1200000, 818750, '522'),
(93, '2021-04-05', 'KK', '2104', '0045', 'yoyon', 'bensin yoyon+ anak&quot; k legok', 0, 100000, 718750, '522'),
(94, '2021-04-05', 'KK', '2104', '0046', 'yoyon', 'e tol yoyon', 0, 102000, 616750, '522'),
(95, '2021-04-05', 'KK', '2104', '0047', 'yoyon', 'aqua yoyon', 0, 20000, 596750, '523'),
(96, '2021-04-05', 'KK', '2104', '0048', 'dede iwan', 'tinner 3lter', 0, 51000, 545750, '524'),
(97, '2021-04-05', 'KK', '2104', '0049', 'joy', 'uang jln joy k orlando', 0, 50000, 495750, '522'),
(98, '2021-04-05', 'KK', '2104', '0050', 'joy', 'ganti uang joy beli alat', 0, 50000, 445750, '521'),
(99, '2021-04-05', 'KK', '2104', '0051', 'anam', 'bensin anam k karya logam ', 0, 50000, 395750, '522'),
(100, '2021-04-05', 'KK', '2104', '0052', 'tukang', 'ngasih orang karya logam', 0, 20000, 375750, '5202'),
(101, '2021-04-05', 'KK', '2104', '0053', 'ogsigin', 'bayar n2 2tbg', 0, 200000, 175750, '524'),
(102, '2021-04-06', 'KM', '2104', '0007', 'PAK HASAN', 'Masuk dr Pak Hasan', 4000000, 0, 4175750, '434'),
(104, '2021-04-06', 'KK', '2104', '0055', 'dwi', 'aqua anak&quot;+snack', 0, 150000, 1025750, '523'),
(105, '2021-04-06', 'KK', '2104', '0056', 'yoyon', 'bensin anter anak&quot; k terminal+swangan', 0, 100000, 925750, '522'),
(106, '2021-04-06', 'KK', '2104', '0057', 'mas agung', 'ongkos kirim jambi', 0, 3000000, -2074250, '522'),
(107, '2021-04-06', 'KK', '2104', '0058', 'yoyon', 'e tol yoyon', 0, 102000, -2176250, '522'),
(108, '2021-04-06', 'KK', '2104', '0059', 'anam', 'ganti uang anam beli sperepart', 0, 100000, -2276250, '524'),
(109, '2021-04-06', 'KK', '2104', '0060', 'anam', 'uang jln anam+adi k najib', 0, 50000, -2326250, '522'),
(110, '2021-04-06', 'KK', '2104', '0061', 'yoyon', 'aqua yoyon', 0, 20000, -2346250, '523'),
(111, '2021-04-06', 'KK', '2104', '0062', 'anam', 'aqua anam', 0, 20000, -2366250, '523'),
(113, '2021-04-07', 'KK', '2104', '0063', 'joy', 'bensin joy k orlando', 0, 20000, -2386250, '522'),
(114, '2021-04-07', 'KK', '2104', '0064', 'joy', 'beli pipa pembuangan ', 0, 89000, -2475250, '524'),
(115, '2021-04-07', 'KK', '2104', '0065', 'hisyam', 'isi aqua galon 5', 0, 90000, -2565250, '523'),
(116, '2021-04-07', 'KK', '2104', '0066', 'yoyon', 'beli rollan cat', 0, 20000, -2585250, '524'),
(117, '2021-04-07', 'KK', '2104', '0067', 'yoyon', 'bensin motor sonic', 0, 20000, -2605250, '522'),
(118, '2021-04-07', 'KK', '2104', '0068', 'yoyon', 'bensin yoyon k cengkareng anter mesin', 0, 100000, -2705250, '522'),
(119, '2021-04-07', 'KK', '2104', '0069', 'yoyon', 'e tol yoyon', 0, 52000, -2757250, '522'),
(120, '2021-04-08', 'KK', '2104', '0070', 'yoyon', 'e tol yoyon k orlando', 0, 52000, -2809250, '522'),
(121, '2021-04-07', 'KK', '2104', '0071', 'yoyon', 'aqua yoyon', 0, 20000, -2829250, '523'),
(122, '2021-04-08', 'KK', '2104', '0072', 'yoyon', 'aqua yoyon', 0, 20000, -2849250, '523'),
(123, '2021-04-09', 'KK', '2104', '0073', 'joy', 'bensin joy k orlando', 0, 20000, -2869250, '522'),
(124, '2021-04-10', 'KM', '2104', '0008', 'PAK HASAN', 'Masuk dr Pak Hasan', 1000000, 0, -1869250, '434'),
(125, '2021-04-10', 'KM', '2104', '0009', 'dwi', 'kw servis sacha paso+legoso', 1600000, 0, -269250, '434'),
(126, '2021-04-10', 'KK', '2104', '0074', 'yoyon', 'bensin semua k orlando', 0, 100000, -369250, '522'),
(127, '2021-04-10', 'KK', '2104', '0075', 'yoyon', 'e tol yoyon', 0, 52000, -421250, '522'),
(128, '2021-04-10', 'KK', '2104', '0076', 'yoyon', 'aqua yoyon', 0, 20000, -441250, '523'),
(129, '2021-04-10', 'KK', '2104', '0077', 'joy', 'beli oli suniso 32sl', 0, 850000, -1291250, '524'),
(130, '2021-04-10', 'KK', '2104', '0078', 'joy', 'beli r12', 0, 200000, -1491250, '524'),
(131, '2021-04-10', 'KK', '2104', '0079', 'joy', 'bensin joy k orlando', 0, 20000, -1511250, '522'),
(132, '2021-04-10', 'KK', '2104', '0080', 'agus', 'ongkos agus ambil rell sledding', 0, 250000, -1761250, '522'),
(133, '2021-04-10', 'KK', '2104', '0081', 'karya logam', 'bayar tekukan karya logam', 0, 300000, -2061250, '527'),
(134, '2021-04-12', 'KK', '2104', '0082', 'joy', 'bensin joy k orlando', 0, 20000, -2081250, '522'),
(135, '2021-04-12', 'KK', '2104', '0083', 'joy', 'beli baut monting', 0, 80000, -2161250, '524'),
(136, '2021-04-12', 'KK', '2104', '0084', 'anam', 'ganti uang anam beli klem pipa', 0, 15000, -2176250, '524'),
(137, '2021-04-12', 'KK', '2104', '0085', 'pak pur', 'ganti uang pak pur beli kawat las listrik', 0, 100000, -2276250, '524'),
(138, '2021-04-12', 'KK', '2104', '0086', 'yoyon', 'ngasih orang sporing', 0, 25000, -2301250, '5202'),
(139, '2021-04-12', 'KK', '2104', '0087', 'yoyon', 'ngasih orang sporing', 0, 25000, -2326250, '5202'),
(140, '2021-04-12', 'KK', '2104', '0088', 'yoyon', 'bensin yoyon k orlando', 0, 100000, -2426250, '522'),
(141, '2021-04-12', 'KK', '2104', '0089', 'yoyon', 'e tol yoyon', 0, 52000, -2478250, '522'),
(142, '2021-04-12', 'KK', '2104', '0090', 'yoyon', 'aqua yoyon', 0, 20000, -2498250, '523'),
(143, '2021-04-12', 'KK', '2104', '0091', 'pak ariis', 'grab barang k orlando', 0, 100000, -2598250, '522'),
(144, '2021-04-13', 'KK', '2104', '0092', 'joy', 'bensin joy k orlando', 0, 20000, -2618250, '522'),
(145, '2021-04-13', 'KK', '2104', '0093', 'yoyon', 'Bensin+etol yoyon adi Bandung pak deni', 0, 400000, -3018250, '522'),
(148, '2021-04-14', 'KM', '2104', '0010', 'PAK HASAN', 'Masuk dr Pak Hasan', 533000, 0, -2485250, '434'),
(149, '2021-04-14', 'KK', '2104', '0094', 'yoyon', 'bensin yoyon k mangga dua+glodok', 0, 100000, -2585250, '522'),
(150, '2021-04-14', 'KK', '2104', '0095', 'yoyon', 'e tol yoyon', 0, 102000, -2687250, '522'),
(151, '2021-04-14', 'KK', '2104', '0096', 'yoyon', 'aqua yoyon', 0, 20000, -2707250, '523'),
(153, '2021-04-14', 'KK', '2104', '0097', 'yoyon', 'parkir glodok+mangga dua', 0, 30000, -2737250, '522'),
(155, '2021-04-14', 'KK', '2104', '0098', 'anam', 'bensin anam k tambun', 0, 100000, -2837250, '522'),
(156, '2021-04-14', 'KK', '2104', '0099', 'anam', 'e tol anam', 0, 52000, -2889250, '522'),
(157, '2021-04-14', 'KK', '2104', '0100', 'anam', 'aqua anam', 0, 20000, -2909250, '523'),
(158, '2021-04-14', 'KK', '2104', '0101', 'wijaya', 'bayar belanja wijaya', 0, 40000, -2949250, '526'),
(159, '2021-04-14', 'KK', '2104', '0102', 'wijaya', 'ngasih orang wijaya', 0, 20000, -2969250, '5202'),
(160, '2021-04-14', 'KK', '2104', '0103', 'tukang', 'bantuan masjid', 0, 50000, -3019250, '526'),
(161, '2021-04-15', 'KM', '2104', '0011', 'PAK HASAN', 'Masuk dr Pak Hasan', 700000, 0, -2319250, '434'),
(162, '2021-04-15', 'KK', '2104', '0104', 'yoyon', 'ganti uang yoyon beli manifold', 0, 200000, -2519250, '524'),
(163, '2021-04-15', 'KK', '2104', '0105', 'yoyon', 'bensin yoyon k cimanggu ', 0, 10000, -2529250, '522'),
(164, '2021-04-15', 'KK', '2104', '0106', 'yoyon', 'e tol yoyon', 0, 102000, -2631250, '522'),
(165, '2021-04-15', 'KK', '2104', '0107', 'yoyon', 'aqua yoyon', 0, 20000, -2651250, '523'),
(166, '2021-04-15', 'KK', '2104', '0108', 'anam', 'bensin anam k pamulang', 0, 50000, -2701250, '522'),
(167, '2021-04-15', 'KK', '2104', '0109', 'anam', 'e tol anam', 0, 52000, -2753250, '522'),
(168, '2021-04-15', 'KK', '2104', '0110', 'anam', 'aqua anam', 0, 20000, -2773250, '523'),
(169, '2021-04-15', 'KK', '2104', '0111', 'dwi', 'beli baut&quot; pintu+baut tem bus', 0, 55000, -2828250, '524'),
(170, '2021-04-15', 'KK', '2104', '0112', 'pak ahmad', 'bayar keamanan', 0, 50000, -2878250, '5202'),
(171, '2021-04-16', 'KM', '2104', '0012', 'PAK HASAN', 'Masuk dr Pak Hasan', 1500000, 0, -1378250, '434'),
(172, '2021-04-16', 'KK', '2104', '0113', 'trans jambi', 'kirim barang jambi', 0, 750000, -2128250, '522'),
(173, '2021-04-16', 'KK', '2104', '0114', 'anam', 'bensin anam pamulang-buaran', 0, 100000, -2228250, '522'),
(174, '2021-04-16', 'KK', '2104', '0115', 'anam', 'e tol anam', 0, 102000, -2330250, '522'),
(175, '2021-04-16', 'KK', '2104', '0116', 'anam', 'aqua anam', 0, 20000, -2350250, '523'),
(176, '2021-04-16', 'KK', '2104', '0117', 'yoyon', 'bensin fortuner glodok-manggadua', 0, 100000, -2450250, '522'),
(178, '2021-04-16', 'KK', '2104', '0118', 'yoyon', 'e tol yoyon', 0, 102000, -2552250, '522'),
(179, '2021-04-16', 'KK', '2104', '0119', 'yoyon', 'parkir glodok', 0, 15000, -2567250, '5202'),
(180, '2021-04-16', 'KK', '2104', '0120', 'yoyon', 'aqua yoyon', 0, 20000, -2587250, '523'),
(181, '2021-04-16', 'KK', '2104', '0121', 'yoyon', 'parkir hjs', 0, 5000, -2592250, '5202'),
(182, '2021-04-16', 'KK', '2104', '0122', 'yoyon', 'parkir alpin', 0, 5000, -2597250, '5202'),
(183, '2021-04-16', 'KK', '2104', '0123', 'dwi', 'beli nepel oli', 0, 150000, -2747250, '524'),
(184, '2021-04-17', 'KK', '2104', '0124', 'yoyon', 'bensin cimanggu-pamulang', 0, 100000, -2847250, '522'),
(185, '2021-04-17', 'KK', '2104', '0125', 'yoyon', 'e tol yoyon', 0, 102000, -2949250, '522'),
(186, '2021-04-17', 'KK', '2104', '0126', 'yoyon', 'aqua yoyon', 0, 20000, -2969250, '523'),
(187, '2021-04-19', 'KM', '2104', '0013', 'PAK HASAN', 'Masuk dr Pak Hasan', 300000, 0, -2669250, '434'),
(188, '2021-04-19', 'KK', '2104', '0127', 'yoyon', 'bensin yoyon sawangan', 0, 100000, -2769250, '522'),
(189, '2021-04-19', 'KK', '2104', '0128', 'yoyon', 'e tol yoyon', 0, 102000, -2871250, '522'),
(190, '2021-04-19', 'KK', '2104', '0129', 'yoyon', 'aqua yoyon', 0, 20000, -2891250, '523'),
(191, '2021-04-19', 'KM', '2104', '0014', 'PAK HASAN', 'Masuk dr Pak Hasan', 900000, 0, -1991250, '434'),
(192, '2021-04-19', 'KK', '2104', '0130', 'wawan', 'bayar kontrakan sawangn april 2021', 0, 850000, -2841250, '527'),
(193, '2021-04-19', 'KK', '2104', '0131', 'wawan', 'bensin motor sawangan', 0, 20000, -2861250, '5201'),
(194, '2021-04-19', 'KM', '2104', '0015', 'PAK HASAN', 'Masuk dr Pak Hasan', 1000000, 0, -1861250, '434'),
(195, '2021-04-19', 'KK', '2104', '0132', 'dwi', 'grab joy jagakarsa', 0, 70000, -1931250, '522'),
(196, '2021-04-19', 'KK', '2104', '0133', 'dwi', 'beli las kuningan', 0, 30000, -1961250, '524'),
(197, '2021-04-19', 'KK', '2104', '0134', 'yoyon', 'longdrat ring+mur sawangan', 0, 190000, -2151250, '524'),
(199, '2021-04-20', 'KK', '2104', '0136', 'yoyon', 'e tol yoyon', 0, 102000, -2263250, '522'),
(200, '2021-04-20', 'KK', '2104', '0137', 'yoyon', 'aqua yoyon', 0, 20000, -2283250, '523'),
(201, '2021-04-20', 'KK', '2104', '0138', 'joy', 'beli longdrat+ring+mur', 0, 200000, -2483250, '524'),
(202, '2021-04-20', 'KK', '2104', '0139', 'yoyon', 'isi ulang ogsigin', 0, 100000, -2583250, '524'),
(203, '2021-04-20', 'KK', '2104', '0140', 'wawan', 'bensin wawan sawangan', 0, 20000, -2603250, '522'),
(204, '2021-04-20', 'KK', '2104', '0141', 'yoyon', 'bensin yoyon awangan-daya kenari', 0, 100000, -2703250, '522'),
(206, '2021-04-21', 'KM', '2104', '0017', 'PAK HASAN', 'Masuk dr Pak Hasan', 1000000, 0, -1688250, '434'),
(207, '2021-04-21', 'KK', '2104', '0142', 'dwi', 'beli terpal 4x6 2lm lmbr', 0, 600000, -2288250, '5202'),
(208, '2021-04-21', 'KK', '2104', '0143', 'anam', 'e tol anam k sawangan', 0, 102000, -2390250, '522'),
(209, '2021-04-21', 'KK', '2104', '0144', 'anam', 'bensin sawangan', 0, 50000, -2440250, '522'),
(210, '2021-04-21', 'KK', '2104', '0145', 'anam', 'aqua anam', 0, 20000, -2460250, '523'),
(211, '2021-04-21', 'KK', '2104', '0146', 'joy', 'bensin yoyo n joy k standle', 0, 30000, -2490250, '522'),
(213, '2021-04-21', 'KK', '2104', '0147', 'joy', 'beli solar buat pamulang', 0, 50000, -2540250, '5202'),
(214, '2021-04-22', 'KK', '2104', '0148', 'anam', 'beli ogsigin besar 1,beli n2 besar 1,beli ogsigin kecil 4', 0, 350000, -2890250, '5202'),
(215, '2021-04-23', 'KK', '2104', '0149', 'anam', 'aqua anam', 0, 20000, -2910250, '523'),
(216, '2021-04-24', 'KM', '2104', '0018', 'pak hasan', 'Masuk dr Pak Hasan', 1000000, 0, -1910250, '434'),
(217, '2021-04-24', 'KK', '2104', '0150', 'pak pur', 'ganti uang pak pur bensin 23 april 2021', 0, 50000, -1960250, '5202'),
(218, '2021-04-24', 'KK', '2104', '0151', 'anam', 'bensin anam k sawangan', 0, 100000, -2060250, '522'),
(219, '2021-04-24', 'KK', '2104', '0152', 'anam', 'e tol anam', 0, 102000, -2162250, '522'),
(220, '2021-04-24', 'KK', '2104', '0153', 'joy', 'beli oli motor supra', 0, 50000, -2212250, '5202'),
(221, '2021-04-24', 'KK', '2104', '0154', 'pak pur', 'beli mur baut monting sawangan', 0, 50000, -2262250, '5202'),
(222, '2021-04-24', 'KK', '2104', '0155', 'anam', 'aqua anam', 0, 20000, -2282250, '523'),
(223, '2021-04-24', 'KK', '2104', '0156', 'joy', 'bensin joy k sacha paso + robert', 0, 20000, -2302250, '522'),
(224, '2021-04-24', 'KK', '2104', '0157', 'dwi', 'beli masker ,pewangi ruangan dll', 0, 95000, -2397250, '5202'),
(225, '2021-04-26', 'KK', '2104', '0158', 'anam', 'bensin anam k sawangan', 0, 100000, -2497250, '522'),
(226, '2021-04-26', 'KK', '2104', '0159', 'anam', 'e tol anam k sawangan', 0, 102000, -2599250, '522'),
(227, '2021-04-26', 'KK', '2104', '0160', 'anam', 'aqua anam', 0, 20000, -2619250, '523'),
(228, '2021-04-26', 'KK', '2104', '0161', 'joy', 'bensin joy k p hassanudin + standle', 0, 20000, -2639250, '522'),
(230, '2021-04-26', 'KK', '2104', '0162', 'joy', 'beli selang steam', 0, 100000, -2739250, '5202'),
(231, '2021-04-26', 'KK', '2104', '0163', 'adi', 'beli baut hand valve ', 0, 65000, -2804250, '5202'),
(232, '2021-04-27', 'KM', '2104', '0019', 'joy', 'masuk dr servise d hassanudin', 600000, 0, -2204250, '434'),
(233, '2021-04-27', 'KK', '2104', '0164', 'yoyon', 'bensin yoyon k sawangan pamulang glodok', 0, 100000, -2304250, '522'),
(235, '2021-04-27', 'KK', '2104', '0165', 'yoyon', 'e tol yoyon', 0, 102000, -2406250, '522'),
(236, '2021-04-27', 'KK', '2104', '0166', 'yoyon', 'aqua yoyon', 0, 20000, -2426250, '523'),
(237, '2021-04-27', 'KK', '2104', '0167', 'yoyon', 'parkir yoyon dll', 0, 50000, -2476250, '5202'),
(238, '2021-04-27', 'KK', '2104', '0168', 'joy', 'bensin joy k pamulang', 0, 20000, -2496250, '522'),
(239, '2021-04-27', 'KK', '2104', '0169', 'mbh ahmad', 'ngasih dana k masjid al ihklas', 0, 200000, -2696250, '5202'),
(244, '2021-04-28', 'KK', '2104', '0170', 'anam', 'bensin anam sawangan-pamulang-buaran', 0, 100000, -2796250, '522'),
(245, '2021-04-30', 'KM', '2104', '0020', 'pak hasan', 'Masuk dr Pak Hasan', 200000, 0, -2596250, '434'),
(246, '2021-04-28', 'KK', '2104', '0171', 'anam', 'e tol anam', 0, 102000, -2698250, '522'),
(247, '2021-04-28', 'KK', '2104', '0172', 'anam', 'aqua anam', 0, 20000, -2718250, '523'),
(248, '2021-04-28', 'KK', '2104', '0173', 'pak pur', 'ganti uang grab pak pur', 0, 100000, -2818250, '5202'),
(249, '2021-04-28', 'KK', '2104', '0174', 'joy', 'bensin joy k pamulang+Sacha', 0, 20000, -2838250, '522'),
(250, '2021-04-29', 'KM', '2104', '0021', 'pak hasan', 'Masuk dr Pak Hasan', 400000, 0, -2438250, '434'),
(252, '2021-04-29', 'KK', '2104', '0175', 'yoyon', 'bensin yoyon k sawangan-sentul', 0, 100000, -2538250, '522'),
(253, '2021-04-29', 'KK', '2104', '0176', 'yoyon', 'e tol yoyon', 0, 102000, -2640250, '522'),
(254, '2021-04-29', 'KK', '2104', '0177', 'yoyon', 'aqua yoyon', 0, 20000, -2660250, '523'),
(255, '2021-04-29', 'KK', '2104', '0178', 'pak pur', 'ganti uang pak pur beli sperepart', 0, 23000, -2683250, '5202'),
(262, '2021-05-02', 'KK', '2105', '0001', 'admin', 'kantor', 0, 100000, -1783250, '513');

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id` int(11) NOT NULL,
  `kodeklien` varchar(50) DEFAULT NULL,
  `namaklien` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `nohp` varchar(50) DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `norek` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id`, `kodeklien`, `namaklien`, `nama`, `alamat`, `nohp`, `bank`, `norek`) VALUES
(1, 'K001', 'Bpk Romadhon', '0', '0', '0', '0', '0'),
(2, 'K002', 'Bpk Sacha Darwin', '0', '0', '0', '0', '0'),
(3, 'K003', 'Bpk Najib', '0', '0', '0', '0', '0'),
(4, 'K004', 'Bpk Sacha Darwin', '0', '0', '0', '0', '0'),
(5, 'K005', 'Bpk Ende', '0', '0', '0', '0', '0'),
(6, 'K006', 'Bpk Budi', '0', '0', '0', '0', '0'),
(7, 'K007', 'Bpk Budi Darma', '0', '0', '0', '0', '0'),
(8, 'K008', 'Bpk Robert', '0', '0', '0', '0', '0'),
(9, 'K009', 'Bpk Robert', '0', '0', '0', '0', '0'),
(10, 'K009', 'Bpk Robert', '0', '0', '0', '0', '0'),
(11, 'K010', 'Bpk Standle', '0', '0', '0', '0', '0'),
(12, 'K011', 'Bpk Hassanudin', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `kodeakun`
--

CREATE TABLE `kodeakun` (
  `id` int(11) NOT NULL,
  `kodeakun1` int(11) DEFAULT NULL,
  `ketkode1` varchar(50) DEFAULT NULL,
  `kodeakun2` int(11) DEFAULT NULL,
  `ketkode2` varchar(50) DEFAULT NULL,
  `kodeakun3` int(11) DEFAULT NULL,
  `ketkode3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kodeakun`
--

INSERT INTO `kodeakun` (`id`, `kodeakun1`, `ketkode1`, `kodeakun2`, `ketkode2`, `kodeakun3`, `ketkode3`) VALUES
(1, 1, 'aktiva', 11, 'kas', 111, 'kas ditangan'),
(2, 1, 'aktiva', 11, 'kas', 112, 'kas bank'),
(3, 1, 'aktiva', 12, 'piutang', 121, 'piutang proyek'),
(4, 1, 'aktiva', 12, 'piutang', 122, 'piutang maintenance'),
(5, 1, 'aktiva', 12, 'piutang', 123, 'piutang yanto'),
(6, 1, 'aktiva', 13, 'perlengkapan', 131, 'perlengkapan kantor'),
(7, 1, 'aktiva', 14, 'kendaraan', 141, 'aset mobil'),
(8, 1, 'aktiva', 14, 'kendaraan', 142, 'aset motor'),
(9, 1, 'aktiva', 15, 'penyusutan', 151, 'penyusutan mobil'),
(10, 1, 'aktiva', 15, 'penyusutan', 152, 'penyusutan motor'),
(11, 2, 'kewajiban', 21, 'hutang', 211, 'hutang supplier'),
(12, 2, 'kewajiban', 21, 'hutang', 212, 'hutang vendor'),
(13, 2, 'kewajiban', 21, 'hutang', 213, 'hutang yanto'),
(14, 2, 'kewajiban', 21, 'hutang', 214, 'hutang bank'),
(15, 3, 'modal', 31, 'modal pemilik', 311, 'modal yanto'),
(16, 3, 'modal', 32, 'laba', 321, 'laba periode berjalan'),
(17, 4, 'pendapatan', 41, 'jasa', 411, 'proyek'),
(18, 4, 'pendapatan', 41, 'jasa', 412, 'maintenance'),
(19, 4, 'pendapatan', 42, 'retail', 421, 'toko'),
(20, 4, 'pendapatan', 43, 'operasional', 431, 'kasbon'),
(21, 4, 'pendapatan', 43, 'operasional', 432, 'pinjaman karyawan'),
(22, 5, 'biaya', 51, 'kantor', 511, 'gaji'),
(23, 5, 'biaya', 51, 'kantor', 512, 'bonus'),
(24, 5, 'biaya', 51, 'kantor', 513, 'listrik speedy'),
(25, 5, 'biaya', 51, 'kantor', 514, 'perlengkapan gudang'),
(26, 5, 'biaya', 52, 'operasional', 521, 'peralatan'),
(27, 5, 'biaya', 52, 'operasional', 522, 'uang jalan'),
(28, 5, 'biaya', 52, 'operasional', 523, 'makan dan minum'),
(29, 5, 'biaya', 52, 'operasional', 528, 'service kendaraaan'),
(30, 5, 'biaya', 52, 'operasional', 524, 'spare part'),
(31, 5, 'biaya', 52, 'operasional', 525, 'serba serbi'),
(32, 5, 'biaya', 52, 'operasional', 526, 'kas kecil'),
(33, 5, 'biaya', 51, 'kantor', 515, 'santunan'),
(34, 5, 'biaya', 51, 'kantor', 516, 'vendor'),
(35, 5, 'biaya', 51, 'kantor', 517, 'admin bank'),
(36, 5, 'biaya', 51, 'kantor', 518, ' transfer antar bank'),
(37, 4, 'pendapatan', 43, 'operasional', 433, 'sisa uang jalan'),
(38, 5, 'biaya', 52, 'operasional', 527, 'administrasi'),
(39, 5, 'biaya', 51, 'kantor', 519, 'biaya marketing'),
(40, 5, 'biaya', 51, 'kantor', 520, 'biaya pajak'),
(41, 5, 'biaya', 51, 'kantor', 5201, 'supplier'),
(42, 1, 'aktiva', 12, 'piutang', 124, 'piutang karyawan'),
(43, 0, 'input', 0, 'input', 0, 'input'),
(44, 5, 'biaya', 52, 'operasional', 5202, 'fee & promosi'),
(45, 1, 'aktiva', 16, 'gedung', 161, 'aset gedung'),
(46, 1, 'aktiva', 15, 'penyusutan', 153, 'penyusutan gedung'),
(47, 4, 'pendapatan', 43, 'operasional', 434, 'Kas Kecil');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `tanggalpro` date NOT NULL,
  `tanggalpjt` date DEFAULT NULL,
  `noproposal` varchar(50) NOT NULL,
  `noproyek` varchar(50) DEFAULT NULL,
  `namaklien` varchar(50) DEFAULT NULL,
  `outlet` varchar(255) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `nilaiproyek` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `tanggalpro`, `tanggalpjt`, `noproposal`, `noproyek`, `namaklien`, `outlet`, `tempat`, `pekerjaan`, `nilaiproyek`, `keterangan`, `status`, `diskon`) VALUES
(1, '2021-10-25', '2021-10-25', 'PRO1021001', 'MSRS0011021', 'K006', 'Tes', 'Tes', '1', '10000000', 'dor\r\n', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `namabank`
--

CREATE TABLE `namabank` (
  `id` int(11) NOT NULL,
  `kodebank` varchar(50) NOT NULL,
  `namabank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `namabank`
--

INSERT INTO `namabank` (`id`, `kodebank`, `namabank`) VALUES
(1, 'BAN001', 'BCA'),
(2, 'BAN002', 'MANDIRI'),
(3, 'BAN003', 'BRI'),
(4, 'BAN004', 'BNI');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kodekas` varchar(50) DEFAULT NULL,
  `kodebulan` varchar(50) DEFAULT NULL,
  `kodetr` varchar(50) DEFAULT NULL,
  `kodeproyek` varchar(50) DEFAULT NULL,
  `payto` varchar(50) DEFAULT NULL,
  `kodeakun` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `input` varchar(50) DEFAULT NULL,
  `output` varchar(50) DEFAULT NULL,
  `saldo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `tanggal`, `kodekas`, `kodebulan`, `kodetr`, `kodeproyek`, `payto`, `kodeakun`, `keterangan`, `input`, `output`, `saldo`) VALUES
(1, '2021-11-17', 'KBMP', '2111', '0001', 'PSRS0020121', 'SkutRS', 411, 'Bpk Sacha Darwin / CV PANDAWA EXPRES - I', '10000000', '0', '10000000'),
(2, '2021-11-17', 'KBMP', '2111', '0002', 'PSRS0020121', 'SkutRS', 411, 'Bpk Sacha Darwin / CV PANDAWA EXPRES - I', '10000000', '0', '20000000'),
(4, '2021-11-17', 'KBMP', '2111', '0003', 'PSRS0010321', 'SkutRS', 411, 'Bpk Budi Darma / CV. SUPER FOOD MANDIRI - I', '10000', '0', '20010000'),
(13, '2021-11-17', 'KBMP', '2111', '0006', 'PSRS0010321', 'SkutRS', 411, 'Bpk Budi Darma / CV. SUPER FOOD MANDIRI - II', '200', '0', '20022200'),
(18, '2021-11-17', 'KBMP', '2111', '0008', 'MSRS0011021', 'SkutRS', 411, 'Bpk Budi / Tes - I', '100', '0', '20022300'),
(19, '2021-11-17', 'KBMP', '2111', '0009', 'MSRS0011021', 'SkutRS', 411, 'Bpk Budi / Tes - II', '1000', '0', '20023300');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id` int(11) NOT NULL,
  `tanggalpro` date NOT NULL,
  `tanggalpjt` date DEFAULT NULL,
  `noproposal` varchar(50) NOT NULL,
  `noproyek` varchar(50) DEFAULT NULL,
  `namaklien` varchar(50) DEFAULT NULL,
  `outlet` varchar(255) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `nilaiproyek` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `tanggalpro`, `tanggalpjt`, `noproposal`, `noproyek`, `namaklien`, `outlet`, `tempat`, `pekerjaan`, `nilaiproyek`, `keterangan`, `status`, `diskon`) VALUES
(2, '2021-01-05', '2021-01-05', 'PRO0121001', 'PSRS0010121', 'K001', 'PD SRI REJEKI INTERNASIONAL', 'Pabuaran Puspitex Tangerang', '1', '1011174000', '1.			Coldstorage Airblast Freezer : Temperature -40 Â° Celcius \r\n  \r\nSpesifikasi	:\r\n- Ruangan	:  Second\r\n  Ukuran		:  3,7 Meter x 5 Meter x 4 Meter\r\n  Panel dinding  	:  Zincalume color bond 15 cm density 38 m2\r\n  Pintu 		:  1 Unit Swing Door. 200 cm x 10', 0, 0),
(3, '2021-02-25', '2021-02-25', 'PRO0221001', 'PSRS0010221', 'K005', 'Bpk Ende', 'Tasik, Jawa Barat', '1', '90000000', ': Second\r\n Ukuran : 6 Meter x 2,4 Meter x 3 Meter\r\n Kapasitas : 12 Ton\r\n Panel dinding : Zincalume color bond 10 cm density 38 m2\r\n Pintu : Swing door Uk. 200 cm x 100 cm\r\n Include : Plastic curtain ,Ventilator, Heater door.\r\n- Mesin : Baru\r\n Type : Bitze', 0, 0),
(4, '2021-01-08', '2021-01-08', 'PRO0121001', 'PSRS0020121', 'K002', 'CV PANDAWA EXPRES', 'Sawangan Depok', '1', '1200000000', 'Spesifikasi	\r\n- Ruangan	:  Baru  \r\n  Ukuran		:  19,5 Meter x 10 Meter x 7 Meter\r\n  Panel dinding  	:  Zincalume color bond 15 cm density 38 m2\r\n  Pintu 		:  1 Unit Sledding Door. 250 cm x 350 cm\r\n  Include		:  Plastic curtain, Door Heater, Ventilator, Air', 0, 0),
(5, '2021-03-13', '2021-03-13', 'PRO0321001', 'PSRS0010321', 'K007', 'CV. SUPER FOOD MANDIRI', 'Muaro Bungo Jambi', '1', '475000000', '- Ruangan : Baru\r\n Ukuran : 12 Meter x 6 Meter x 4 Meter (Freezer)\r\n 3 Meter x 6 Meter x 4 Meter (Anteroom)\r\n Panel dinding : Zincalume color bond 10 cm density 38 m2\r\n Pintu : 1 Unit Swing Door. 100 cm x 200 cm \r\n Lantai : PU Slab lapis alumunium foil\r\n ', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kodesupplier` varchar(50) DEFAULT NULL,
  `namasupplier` varchar(50) DEFAULT NULL,
  `nohp` text NOT NULL,
  `alamatsupplier` varchar(255) DEFAULT NULL,
  `kodebank` varchar(50) NOT NULL,
  `norek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kodesupplier`, `namasupplier`, `nohp`, `alamatsupplier`, `kodebank`, `norek`) VALUES
(1, 'SUP001', 'lifes good', '08546', 'Jakarta Selatan', 'BAN001', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id` int(11) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id`, `nama_mahasiswa`, `alamat`, `jenis_kelamin`, `tgl_masuk`, `jurusan`) VALUES
(1, 'Dewan Komputer', 'Cilacap', 'Laki-laki', '2019-01-01', 'Sistem Infomasi'),
(2, 'Sule', 'Jakarta', 'Laki-laki', '2019-01-01', 'Teknik Informatika'),
(3, 'Maemunah', 'Yogyakarta', 'Perempuan', '2019-01-01', 'Sistem Infomasi'),
(4, 'Siti ED', 'Semarang', 'Perempuan', '2020-01-01', 'Teknik Informatika'),
(5, 'Andre', 'Purwokerto', 'Laki-laki', '2020-01-01', 'Sistem Infomasi'),
(6, 'Tukul Arwana', 'Surabaya', 'Laki-laki', '2021-01-01', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sample`
--

CREATE TABLE `tbl_sample` (
  `id` int(3) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sample`
--

INSERT INTO `tbl_sample` (`id`, `first_name`, `last_name`, `gender`) VALUES
(1, 'dfghd3', 'dfghdfgh', 'male'),
(8, 'sdfgsdgfd', 'lkjls', 'male'),
(9, 'ABDUL', 'FANI', 'male'),
(10, 'ABDUL', 'FANI', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`) VALUES
(1, 'dfghd3', 'dfghdfgh'),
(8, 'sdfgsdgfd', 'lkjls'),
(9, 'ABDUL', 'FANI'),
(10, 'ABDUL', 'FANI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kodeakun`
--
ALTER TABLE `kodeakun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `namabank`
--
ALTER TABLE `namabank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kodeakun`
--
ALTER TABLE `kodeakun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `namabank`
--
ALTER TABLE `namabank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sample`
--
ALTER TABLE `tbl_sample`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
