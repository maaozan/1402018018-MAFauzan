-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 03:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_gitar`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk_gitar`
--

CREATE TABLE `produk_gitar` (
  `id_gitar` int(128) NOT NULL,
  `nama_gitar` varchar(128) NOT NULL,
  `harga_gitar` int(128) NOT NULL,
  `jenis_gitar` varchar(128) NOT NULL,
  `deskripsi_gitar` varchar(512) NOT NULL,
  `stok_gitar` int(128) NOT NULL,
  `gambar_gitar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_gitar`
--

INSERT INTO `produk_gitar` (`id_gitar`, `nama_gitar`, `harga_gitar`, `jenis_gitar`, `deskripsi_gitar`, `stok_gitar`, `gambar_gitar`) VALUES
(4, 'Fender Mexico Standard Stratocaster, Black', 6500000, 'Elektrik', 'Fender Mexico memang tidak sepopuler fender amerika, tapi untuk optional cukup banyak yang meminati Fender Mexico karena secara harga cukup terjangkau dengan kualitas yang cukup baik. dilengkapi dengan konfigurasi HSS dan Floyd rose tremolo membuat gitar ini mampu dimainkan untuk berbagai genre dengan harga yang cukup terjangkau untuk sekelas Fender.', 1, 'strat.png'),
(5, '1979 Peavey T-60 natural', 11000000, 'Elektrik', 'Peavey T-60 merupakan Gitar elektrik pertama yang di produksi Peavy. Di produksi dari tahun 1978-1988 gitar ini cukup melegenda di era tersebut, karena gitar ini sendiri memiliki design yang unik, gitar ini juga memiliki wiring yang unik yang termasuk modern di zamannya.', 1, 'peavey.png'),
(8, 'OKE', 9999000, 'Elektrik', '1965 oke', 1, 'gitar.png'),
(11, 'Mainot', 66600000, 'Elektrik', '1965 oke', 1, 'mainotgitar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk_gitar`
--
ALTER TABLE `produk_gitar`
  ADD PRIMARY KEY (`id_gitar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk_gitar`
--
ALTER TABLE `produk_gitar`
  MODIFY `id_gitar` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
