-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2010 at 10:57 AM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_anggota` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tglmasuk` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor_anggota` (`nomor_anggota`),
  KEY `nama` (`nama`,`tglmasuk`,`alamat`,`telpon`,`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `anggota`
--


-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_pinjaman`
--

CREATE TABLE IF NOT EXISTS `pembayaran_pinjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pinjaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `ip_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `jumlah_pembayaran` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pinjaman` (`id_pinjaman`,`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pembayaran_pinjaman`
--


-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE IF NOT EXISTS `pinjaman` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `ip_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `jumlah_pinjaman` decimal(10,0) NOT NULL,
  `saldo` decimal(10,0) NOT NULL COMMENT 'saldo = jumlah_pinjaman + jasa',
  `jumlah_jasa` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE IF NOT EXISTS `tabungan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jumlah_in` decimal(10,0) NOT NULL,
  `jumlah_out` decimal(10,0) NOT NULL,
  `ip_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_user` (`id_user`),
  KEY `tgl_transaksi` (`tgl_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tabungan`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`,`email`),
  KEY `password` (`password`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `email`, `id_anggota`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'satiri.a@gmail.com', NULL);
