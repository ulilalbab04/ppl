-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Jul 2015 pada 04.19
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tongsis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_event`
--

CREATE TABLE IF NOT EXISTS `file_event` (
  `id_event` int(4) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(4) NOT NULL,
  `tgl_event` date NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(200) NOT NULL,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `file_event`
--

INSERT INTO `file_event` (`id_event`, `id_pengguna`, `tgl_event`, `judul`, `isi`) VALUES
(3, 1, '2015-09-05', 'Gath Moge Semarang', 'Ayo gan dateng ke gathering club moge'),
(11, 1, '2015-07-11', 'Sunmor ceria', 'Akan diadakan sunmor di undip'),
(13, 1, '2015-07-31', 'Marathon Gathering', 'Sukseskan\r\n'),
(15, 2, '2015-07-16', 'Merbabu Challenge', 'Ayo gabung...');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_foto`
--

CREATE TABLE IF NOT EXISTS `file_foto` (
  `id_foto` int(6) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(4) NOT NULL,
  `nama_file` varchar(30) NOT NULL,
  `tgl_foto` date NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data untuk tabel `file_foto`
--

INSERT INTO `file_foto` (`id_foto`, `id_pengguna`, `nama_file`, `tgl_foto`) VALUES
(1, 2, 'tongsis.jpg', '2015-05-05'),
(2, 2, 'kerbau.jpg', '2015-05-22'),
(3, 2, 'sungai.jpg', '2015-05-22'),
(5, 2, 'Bestfriend.jpg', '2015-05-06'),
(6, 2, 'Tembak.jpg', '2015-05-15'),
(7, 1, 'Kuda Lumping.jpg', '2015-05-15'),
(9, 1, 'Simbah Uti.jpg', '2015-05-13'),
(10, 0, 'Simbah Lanang.jpg', '2015-05-06'),
(11, 0, 'Mbak Lena.jpg', '2015-05-06'),
(12, 0, 'Kesederhanaan.jpg', '2015-05-14'),
(13, 0, 'Perjuangan.jpg', '2015-05-14'),
(15, 1, 'Alam.jpg', '2015-05-14'),
(16, 1, 'Terasering.jpg', '2015-05-14'),
(34, 1, 'Indonesia.jpg', '2015-06-13'),
(35, 3, 'Emirates Std.jpg', '2015-06-13'),
(37, 2, 'hutan.jpg', '2015-06-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_komentar`
--

CREATE TABLE IF NOT EXISTS `file_komentar` (
  `id_komentar` int(6) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(4) NOT NULL,
  `id_foto` int(6) NOT NULL,
  `isi_komentar` varchar(140) NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data untuk tabel `file_komentar`
--

INSERT INTO `file_komentar` (`id_komentar`, `id_pengguna`, `id_foto`, `isi_komentar`) VALUES
(1, 3, 1, 'bagus jon, tingkatkan!'),
(2, 2, 1, 'up'),
(3, 1, 1, 'harga nett berapa bang?'),
(4, 3, 1, 'nego jangan disini lah!'),
(14, 1, 3, 'kebo relaksasi'),
(15, 1, 15, 'super sekaliii :D'),
(16, 1, 7, 'bahagiaaaaa :D'),
(17, 1, 10, 'mbak lenaa huehehe'),
(23, 3, 14, 'asas'),
(24, 2, 14, 'ppopipo'),
(29, 3, 2, 'assdf'),
(30, 3, 10, 'hahaha'),
(31, 3, 10, ':v'),
(33, 1, 27, 'as'),
(34, 1, 28, 'as'),
(35, 1, 0, 'haha'),
(38, 1, 31, 'wertyui'),
(41, 1, 34, ',merdekaa!!!'),
(42, 2, 11, 'ayuneee :D'),
(43, 3, 35, 'Yuhuuuu....'),
(45, 1, 36, 'aaa'),
(46, 2, 37, 'ssss'),
(47, 1, 38, 'gfgf'),
(48, 1, 39, 'try'),
(49, 1, 40, 'try'),
(50, 1, 41, 'wefw'),
(51, 1, 42, 'sd'),
(52, 1, 43, 'efw'),
(53, 1, 44, 'wef'),
(54, 1, 45, 'rgrt'),
(55, 1, 46, 'ewf'),
(56, 1, 47, 'dfgd'),
(57, 1, 39, 'dsf'),
(58, 1, 38, 'sadd'),
(59, 1, 38, 'sukses'),
(60, 1, 40, 'sukses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_pengguna`
--

CREATE TABLE IF NOT EXISTS `file_pengguna` (
  `id_pengguna` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lhr` varchar(30) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `foto` varchar(60) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `file_pengguna`
--

INSERT INTO `file_pengguna` (`id_pengguna`, `username`, `email`, `password`, `nama`, `tempat_lhr`, `tgl_lhr`, `foto`, `level`) VALUES
(1, 'superadmin', 'superadmin@tongsis.com', '2c7b0576873ffcbb4ca61c5a225b94e7', 'Robbyaaa', 'papua', '1979-11-22', 'shoe_size_chart.jpg', 1),
(2, 'admin', 'admin@tongsis.com', 'e00cf25ad42683b3df678c61f42c6bda', 'Brotos', 'Maluku', '1995-07-01', 'logo.png', 2),
(3, 'member', 'member@tongsis.com', 'c7764cfed23c5ca3bb393308a0da2306', 'Margo', 'Gorontalo', '2015-05-09', 'lena_color.jpg', 3),
(4, 'gugun', 'mbuh@tongsis.com', 'b322ea5706d4d949df649a6ea0c7f6c2', 'Gugun', 'majene', '2015-05-08', '', 3),
(6, 'faschal', 'mbuh@tongsis.com', 'ba59a2d46bd8266646909f7c6eb780a6', 'Faschal', 'majene', '2015-05-12', '', 3),
(7, 'beni', 'mbuh@tongsis.com', '105ebb30cb786a16b500bcdcddf3c687', 'beni', 'majene', '2015-05-12', '', 3),
(13, 'dara', 'dara@gmail.com', '0326d546018a8e6999267b8007e1d082', 'Dara', 'semarang', '2015-07-02', '2.jpg', 0),
(15, 'ahmad', 'ahmad@gmail.com', '75600638af31e25be331e95daf8bb130', 'Ahmad', 'semarang', '1970-01-01', '08ElishaGray1878.jpeg', 0),
(16, 'harman', 'harman@gmail.com', '2ff6f9e243c073d5cc14f0c6b2b88eb0', 'Harman', 'semarang', '2015-07-01', 'warning.png', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
