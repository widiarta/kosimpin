-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 24. September 2010 jam 14:02
-- Versi Server: 5.1.30
-- Versi PHP: 5.2.8

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
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_anggota` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tglmasuk` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `ip_input` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor_anggota` (`nomor_anggota`),
  KEY `nama` (`nama`,`tglmasuk`,`alamat`,`telpon`,`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `anggota`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_pinjaman`
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
-- Dumping data untuk tabel `pembayaran_pinjaman`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `id` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jumlah` decimal(10,0) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ip_input` varchar(30) NOT NULL DEFAULT '',
  `tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
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
-- Dumping data untuk tabel `pinjaman`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tabungan`
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
-- Dumping data untuk tabel `tabungan`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `tgl_input` datetime NOT NULL,
  `ip_input` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`,`email`),
  KEY `password` (`password`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `email`, `id_anggota`, `tgl_input`, `ip_input`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'satiri.a@gmail.com', NULL, '0000-00-00 00:00:00', '');
