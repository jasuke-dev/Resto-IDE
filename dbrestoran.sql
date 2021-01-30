-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 03:53 AM
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
-- Database: `dbrestoran`
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
('daffa', 'Daffa Naufaldi AR', '135a4e22cda0e0a68499e6d6e2a861aa', 'Admin'),
('ilham', 'Ilham Surya Negara', 'b63d204bf086017e34d8bd27ab969f28', 'Kasir'),
('kasir1', 'kasir', 'de28f8f7998f23ab4194b51a6029416f', 'Kasir');

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
('M01', 'Mie ayam tok-tok', 'mie ayam tok-tok.jpg', 'mie ayam tanpa ayam', 2000, 'food'),
('M02', 'soda susu', 'es jeruk.jpg', 'es jeruk sega', 5000, 'drink'),
('M03', 'Nasi goreng', 'nasgor.jpg', 'nasi goreng pedas', 20000, 'food'),
('M04', 'Bubur ayam', 'bubur ayam.jpg', 'bubur ayam spesial', 5000, 'food'),
('M05', 'Teh hangat', 'teh.jpg', 'Teh hangat', 2000, 'drink'),
('M06', 'Bakso Urat', 'bakso urat.jpg', 'Bakso dengan urat ', 20000, 'food'),
('M07', 'Nasi goreng telur', 'nasi goreng gila.jpg', 'Nasi goreng dengan telur', 20000, 'food'),
('M08', 'Teh tarik', 'teh tarik.jpg', 'teh yang ditarik', 5000, 'drink'),
('M09', 'Air putih', 'airPutih.jpg', 'air putih', 2, 'drink'),
('M10', 'Boba', 'boba.jpg', 'boba aja', 20000, 'drink'),
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
('201206125728US1', 'US1', 'M10', 3, '201206125728'),
('201207162024US1', 'US1', 'M02', 1, '201207162024'),
('201207162024US1', 'US1', 'M07', 1, '201207162024'),
('201207162024US1', 'US1', 'M08', 1, '201207162024'),
('201208094721kasir1', 'kasir1', 'M03', 2, '201208094721'),
('201208094721kasir1', 'kasir1', 'M07', 1, '201208094721'),
('201208094721kasir1', 'kasir1', 'M09', 1, '201208094721');

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
