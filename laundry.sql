-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 04:04 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `register` (IN `nama` VARCHAR(100), IN `username` VARCHAR(100), IN `alamat` VARCHAR(100), IN `noHp` VARCHAR(20), IN `password` VARCHAR(100))  BEGIN 
	INSERT INTO `users`(`nama_lengkap`,`username`, `password`) VALUES (nama, username, password);
    INSERT INTO `pelanggan`(`pelanggan_nama`, `pelanggan_hp`, `pelanggan_alamat`) VALUES (nama, noHp, alamat);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `harga_per_kilo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`harga_per_kilo`) VALUES
(2000);

-- --------------------------------------------------------

--
-- Table structure for table `pakaian`
--

CREATE TABLE `pakaian` (
  `pakaian_id` int(11) NOT NULL,
  `pakaian_transaksi` int(11) NOT NULL,
  `pakaian_jenis` varchar(255) NOT NULL,
  `pakaian_jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pakaian`
--

INSERT INTO `pakaian` (`pakaian_id`, `pakaian_transaksi`, `pakaian_jenis`, `pakaian_jumlah`) VALUES
(192, 0, 'hoodie', 1),
(279, 61, 'Kaos', 1),
(280, 61, 'Celana', 10),
(283, 64, 'Hoodie', 10),
(292, 65, 'Celana', 10),
(293, 71, 'Kaos', 10),
(294, 66, 'Jaket ', 5),
(295, 72, 'Kaos', 6),
(296, 72, 'Jaket ', 4),
(297, 72, 'Celana', 4),
(298, 73, 'Kaos', 6),
(299, 73, 'Jaket ', 4),
(300, 73, 'Celana', 4),
(301, 74, 'Kaos', 6),
(302, 74, 'Jaket ', 4),
(303, 74, 'Celana', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `pelanggan_nama` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pelanggan_hp` varchar(20) CHARACTER SET latin1 NOT NULL,
  `pelanggan_alamat` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_hp`, `pelanggan_alamat`) VALUES
(2, 'Yusril Prayoga', '0639425111231313', 'Jalan jalan'),
(13, 'Daffa Aditya', '08435345335', 'jl. Mekarsari'),
(14, 'Prayoga', '043124124124', 'Jln HI. Mochsen'),
(31, 'Rayhan Naufal', '085719119891', 'Bakungan'),
(32, 'test nama', '0869696969', 'Kepo aja kamu');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_tgl` date NOT NULL,
  `transaksi_pelanggan` int(11) NOT NULL,
  `transaksi_harga` int(11) NOT NULL,
  `transaksi_berat` int(11) NOT NULL,
  `transaksi_tgl_selesai` date NOT NULL,
  `transaksi_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_tgl`, `transaksi_pelanggan`, `transaksi_harga`, `transaksi_berat`, `transaksi_tgl_selesai`, `transaksi_status`) VALUES
(64, '2023-05-14', 2, 4000, 2, '2023-05-21', 0),
(65, '2023-05-14', 13, 6000, 3, '2023-06-22', 2),
(66, '2023-05-14', 14, 2000, 1, '2023-05-20', 1),
(71, '2023-05-14', 31, 4000, 2, '2023-05-20', 2),
(74, '2023-05-22', 31, 10000, 5, '2023-05-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `password`, `role`) VALUES
(32, '', 'admin', '$2y$10$FMHMGjcnsHyeTmSTjJBA0ubdY2WWZcqAi/kWCqXwa7eB29mFo9UfO', 1),
(33, '', 'user', '$2y$10$JMpAItCirikprS93Wa1oc.ATofU.VBgtpZg2hBcF2V5VgfUKTXQom', 0),
(39, '', 'juki', '$2y$10$55nOQCr0.1fpbvaOXTiJSuzqdd8fYpRDDnX0YK8TzkF2iJq7HimcC', 0),
(47, 'Rayhan Naufal ', 'rayhan', '$2y$10$tjK9z9QTIwH2q6DNynmdMu72wNBpKynkYT0qfBTxvCsGLxup0.gVG', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`pakaian_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pakaian`
--
ALTER TABLE `pakaian`
  MODIFY `pakaian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
