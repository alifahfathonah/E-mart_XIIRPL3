-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 10:26 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_e-mart`
--
CREATE DATABASE IF NOT EXISTS `db_e-mart` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_e-mart`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `katasandi` varchar(128) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_det_akun`
--

CREATE TABLE `tbl_det_akun` (
  `id_det_akun` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `img_profil` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_det_produk`
--

CREATE TABLE `tbl_det_produk` (
  `id_det_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `img_produk` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_det_transaksi`
--

CREATE TABLE `tbl_det_transaksi` (
  `id_det_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `harga_total` varchar(25) NOT NULL,
  `jumlah_produk` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jenis_pembayaran` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = Belum dibayar, 2 = Sudah Dibayar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_akun`
--

CREATE TABLE `tbl_role_akun` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `id_role` (`id_role`);

--
-- Indexes for table `tbl_det_akun`
--
ALTER TABLE `tbl_det_akun`
  ADD PRIMARY KEY (`id_det_akun`),
  ADD UNIQUE KEY `id_akun` (`id_akun`);

--
-- Indexes for table `tbl_det_produk`
--
ALTER TABLE `tbl_det_produk`
  ADD PRIMARY KEY (`id_det_produk`),
  ADD UNIQUE KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tbl_det_transaksi`
--
ALTER TABLE `tbl_det_transaksi`
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD UNIQUE KEY `id_produk` (`id_produk`),
  ADD UNIQUE KEY `id_akun` (`id_akun`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_role_akun`
--
ALTER TABLE `tbl_role_akun`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_keranjang` (`id_keranjang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_det_akun`
--
ALTER TABLE `tbl_det_akun`
  MODIFY `id_det_akun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_det_produk`
--
ALTER TABLE `tbl_det_produk`
  MODIFY `id_det_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_role_akun`
--
ALTER TABLE `tbl_role_akun`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD CONSTRAINT `tbl_akun_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tbl_role_akun` (`id_role`);

--
-- Constraints for table `tbl_det_akun`
--
ALTER TABLE `tbl_det_akun`
  ADD CONSTRAINT `tbl_det_akun_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `tbl_akun` (`id_akun`);

--
-- Constraints for table `tbl_det_produk`
--
ALTER TABLE `tbl_det_produk`
  ADD CONSTRAINT `tbl_det_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`);

--
-- Constraints for table `tbl_det_transaksi`
--
ALTER TABLE `tbl_det_transaksi`
  ADD CONSTRAINT `tbl_det_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`);

--
-- Constraints for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD CONSTRAINT `tbl_keranjang_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`),
  ADD CONSTRAINT `tbl_keranjang_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `tbl_akun` (`id_akun`);

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`);

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`);

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_keranjang`) REFERENCES `tbl_keranjang` (`id_keranjang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
