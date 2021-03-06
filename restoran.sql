-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 03:11 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Admin','Kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `nama_lengkap`, `password`, `level`) VALUES
('admin', 'adminnn', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('admin2', 'sista', 'c84258e9c39059a89ab77d846ddab909', 'Admin'),
('daffa', 'Daffa Naufaldi AR', '135a4e22cda0e0a68499e6d6e2a861aa', 'Admin'),
('kasir', 'Asa', 'c7911af3adbd12a035b289556d96470a', 'Kasir'),
('kasir1', 'Joni', '29c748d4d8f4bd5cbc0f3f60cb7ed3d0', 'Kasir'),
('kasir2', 'wapol', '8c86013d8ba23d9b5ade4d6463f81c45', 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` char(3) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jenis` enum('food','drink') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `foto`, `deskripsi`, `harga`, `jenis`) VALUES
('M01', 'Mie ayam tok-tok', 'mie ayam tok-tok.jpg', 'mie ayam tanpa ayam', 20000, 'food'),
('M02', 'soda susu', 'boba.jpg', 'es jeruk sega', 5000, 'drink'),
('M03', 'Nasi goreng', 'bakso urat.jpg', 'nasi goreng pedas', 20000, 'food'),
('M04', 'Bubur ayam', 'bubur ayam.jpg', 'bubur ayam spesial', 15000, 'food'),
('M05', 'Teh hangat', 'teh.jpg', 'Teh hangat', 2000, 'drink'),
('M06', 'Bakso Urat', 'bakso urat.jpg', 'Bakso dengan urat ', 20000, 'food'),
('M07', 'Nasi goreng telur', 'nasi goreng gila.jpg', 'Nasi goreng dengan telur', 20000, 'food'),
('M08', 'Teh tarik', 'teh tarik.jpg', 'teh yang ditarik', 5000, 'drink'),
('M09', 'Air putih', 'airPutih.jpg', 'air putih', 2, 'drink'),
('M11', 'Burger', 'burger.jpg', 'mie ayam tanpa ayam', 20000, 'food');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pemesanan` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `id_menu` char(3) NOT NULL,
  `quantity` int(11) NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pemesanan`, `username`, `id_menu`, `quantity`, `waktu`) VALUES
('201205080426US1', 'US1', 'M02', 1, '201205080426'),
('201205080426US1', 'US1', 'M04', 1, '201205080426'),
('201205080426US1', 'US1', 'M07', 1, '201205080426'),
('201205080426US1', 'US1', 'M08', 1, '201205080426'),
('201205080426US1', 'US1', 'M09', 1, '201205080426'),
('201205080705US1', 'US1', 'M02', 2, '201205080705'),
('201205080705US1', 'US1', 'M05', 1, '201205080705'),
('201205080705US1', 'US1', 'M08', 2, '201205080705'),
('201205080705US1', 'US1', 'M09', 1, '201205080705'),
('201205203804US1', 'US1', 'M02', 1, '201205203804'),
('201205203804US1', 'US1', 'M04', 1, '201205203804'),
('201205203804US1', 'US1', 'M07', 1, '201205203804'),
('201205203804US1', 'US1', 'M08', 1, '201205203804'),
('201205203804US1', 'US1', 'M09', 2, '201205203804'),
('201206125550US1', 'US1', 'M04', 1, '201206125550'),
('201206125558US1', 'US1', 'M01', 1, '201206125558'),
('201206125558US1', 'US1', 'M02', 2, '201206125558'),
('201207162024US1', 'US1', 'M02', 1, '201207162024'),
('201207162024US1', 'US1', 'M07', 1, '201207162024'),
('201207162024US1', 'US1', 'M08', 1, '201207162024'),
('201208094721kasir1', 'kasir1', 'M03', 2, '201208094721'),
('201208094721kasir1', 'kasir1', 'M07', 1, '201208094721'),
('201208094721kasir1', 'kasir1', 'M09', 1, '201208094721'),
('201212130941kasir1', 'kasir1', 'M01', 2, '201212130941'),
('201212130941kasir1', 'kasir1', 'M11', 1, '201212130941'),
('201212135620kasir1', 'kasir1', 'M05', 1, '201212135620'),
('201212135620kasir1', 'kasir1', 'M07', 1, '201212135620'),
('201212135620kasir1', 'kasir1', 'M08', 1, '201212135620'),
('201228154158kasir', 'kasir', 'M01', 1, '2020-12-28'),
('201228154158kasir', 'kasir', 'M04', 1, '2020-12-28'),
('201228154158kasir', 'kasir', 'M05', 1, '2020-12-28'),
('201228154158kasir', 'kasir', 'M09', 1, '2020-12-28');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pesanan`
-- (See below for the actual view)
--
CREATE TABLE `v_pesanan` (
`id_pemesanan` varchar(255)
,`username` varchar(20)
,`quantity` int(11)
,`waktu` varchar(255)
,`nama` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_pesanan`
--
DROP TABLE IF EXISTS `v_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pesanan`  AS  select `pesanan`.`id_pemesanan` AS `id_pemesanan`,`pesanan`.`username` AS `username`,`pesanan`.`quantity` AS `quantity`,`pesanan`.`waktu` AS `waktu`,`menu`.`nama` AS `nama` from (`pesanan` join `menu` on(`pesanan`.`id_menu` = `menu`.`id`)) order by `pesanan`.`id_pemesanan` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`nama`) USING BTREE;

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pemesanan`,`id_menu`),
  ADD KEY `fk_menu` (`id_menu`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
