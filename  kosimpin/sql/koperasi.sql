-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 01. Oktober 2010 jam 10:13
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nomor_anggota`, `nama`, `tglmasuk`, `alamat`, `telpon`, `email`, `tgl_input`, `ip_input`) VALUES
(1, '07030001', 'Ahmad Satiri', '2007-01-31', '-', '-', '-', '2010-09-27 12:36:06', ''),
(2, '07030002', 'Farid Ma''ruf', '2000-09-05', 'telaga Mas', '-', '-', '2010-09-28 15:42:52', '127.0.0.1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_tabungan`
--

CREATE TABLE IF NOT EXISTS `jenis_tabungan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_tabungan` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `jenis_tabungan` (`jenis_tabungan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `jenis_tabungan`
--

INSERT INTO `jenis_tabungan` (`id`, `jenis_tabungan`) VALUES
(1, 'Sukarela'),
(2, 'Wajib'),
(3, 'Pokok');

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `ip_input` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `jumlah_pinjaman` decimal(10,0) NOT NULL,
  `saldo` decimal(10,0) NOT NULL COMMENT 'saldo = jumlah_pinjaman + jasa',
  `jumlah_jasa` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`id`, `id_anggota`, `id_user`, `tgl_transaksi`, `ip_input`, `tgl_input`, `jumlah_pinjaman`, `saldo`, `jumlah_jasa`) VALUES
(1, 1, 1, '2010-10-01', '127.0.0.1', '2010-10-01 08:59:46', 1000000, 1000000, 100000);

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
  `id_jenis_tabungan` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_user` (`id_user`),
  KEY `tgl_transaksi` (`tgl_transaksi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `tabungan`
--

INSERT INTO `tabungan` (`id`, `id_anggota`, `id_user`, `tgl_transaksi`, `jumlah_in`, `jumlah_out`, `ip_input`, `tgl_input`, `id_jenis_tabungan`) VALUES
(1, 1, 1, '2010-09-27', 10000, 0, '127.0.0.1', '2010-09-27 12:36:41', 1),
(2, 1, 1, '2010-09-28', 10000, 0, '127.0.0.1', '2010-09-02 12:22:25', 2),
(3, 1, 1, '2010-09-28', 10000, 0, '127.0.0.1', '2010-09-02 12:22:25', 3),
(4, 2, 1, '2010-09-28', 10000, 0, '127.0.0.1', '2010-09-28 15:43:32', 1),
(5, 2, 1, '2010-09-28', 10000, 0, '127.0.0.1', '2010-09-28 15:43:32', 1),
(6, 2, 1, '2010-09-28', 10000, 0, '127.0.0.1', '2010-09-28 15:43:32', 1),
(7, 2, 1, '2010-09-28', 10000, 0, '127.0.0.1', '2010-09-28 15:43:32', 1),
(8, 2, 1, '2010-09-28', 10000, 0, '127.0.0.1', '2010-09-28 15:43:32', 1),
(9, 2, 1, '2010-09-28', 10000, 0, '127.0.0.1', '2010-09-28 15:43:32', 1),
(10, 2, 1, '2010-09-28', 10000, 0, '127.0.0.1', '2010-09-28 15:43:32', 1),
(11, 2, 1, '2010-09-28', 10000, 0, '127.0.0.1', '2010-09-28 15:43:32', 1),
(12, 2, 1, '2010-09-28', 10000, 0, '127.0.0.1', '2010-09-28 15:43:32', 1),
(13, 1, 0, '2010-01-02', 13500, 0, 'localhost', '2010-09-28 18:19:43', 1),
(14, 1, 0, '2010-01-02', 13500, 0, 'localhost', '2010-09-28 18:22:09', 1),
(15, 2, 0, '2010-01-02', 14500, 0, 'localhost', '2010-09-28 18:22:31', 1);

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
