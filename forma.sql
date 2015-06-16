-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 10 Des 2014 pada 00.04
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `forma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_Kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `Nama_Kategori`) VALUES
(1, 'Umum'),
(2, 'Khusus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(11) NOT NULL AUTO_INCREMENT,
  `isi_komentar` text NOT NULL,
  `id_thread` int(11) NOT NULL,
  `tanggal_komentar` datetime NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `isi_komentar`, `id_thread`, `tanggal_komentar`, `username`) VALUES
(1, '<p>Murah amat gan</p>\r\n', 2, '2014-12-09 08:28:28', 'Herdian'),
(2, '<p>hgjhjjlk</p>\r\n', 2, '2014-12-09 08:29:54', 'Herdian'),
(3, '', 0, '2014-12-09 11:26:07', 'giant'),
(7, '<p>iya gan</p>\r\n', 6, '2014-12-09 13:31:33', 'Herdian'),
(8, '<p>testing</p>\r\n', 6, '2014-12-09 13:32:02', 'Herdian'),
(9, '<p>sahdja</p>\r\n', 6, '2014-12-09 13:34:27', 'Herdian'),
(10, '<p>kljfdljg</p>\r\n', 6, '2014-12-09 13:35:22', 'Herdian'),
(12, '<p>&#39;</p>\r\n', 6, '2014-12-09 19:08:14', 'giant'),
(14, '<p><code><tt>coding<sup>p</sup></tt></code></p>\r\n', 6, '2014-12-09 19:10:20', 'giant'),
(16, '<p>Aku Dikomen orang</p>\r\n', 6, '2014-12-09 19:11:03', 'giant'),
(17, '<p>Njesss ....&nbsp;</p>\r\n', 6, '2014-12-09 19:11:26', 'giant'),
(18, '<p>Ga punya temen -.-</p>\r\n', 6, '2014-12-09 19:11:47', 'giant'),
(19, '<p>Ayo komen dong</p>\r\n', 6, '2014-12-09 19:12:03', 'giant'),
(20, '<p>Paperline Gold</p>\r\n', 6, '2014-12-09 19:12:16', 'giant');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `NIM` varchar(9) NOT NULL,
  `PK` varchar(50) NOT NULL,
  `JenisKelamin` varchar(1) NOT NULL,
  `status` int(11) NOT NULL,
  `ttl` date NOT NULL,
  `daftar` date NOT NULL,
  `JumlahPost` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'gambar_burung_garuda.png',
  PRIMARY KEY (`username`),
  UNIQUE KEY `NIM` (`NIM`),
  UNIQUE KEY `userID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`userID`, `username`, `password`, `Nama`, `NIM`, `PK`, `JenisKelamin`, `status`, `ttl`, `daftar`, `JumlahPost`, `photo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Momod', '', '', 'L', 2, '1987-06-03', '2014-12-07', 0, 'gambar_burung_garuda.png'),
(3, 'giant', '202cb962ac59075b964b07152d234b70', 'Husna Alliyus Dwi ', 'J3C112213', 'Manajemen Informatika', 'L', 1, '1994-12-21', '2014-12-09', 17, 'fd.jpg'),
(2, 'Herdian', '81dc9bdb52d04dc20036dbd8313ed055', 'Herdiyan Septa Nugroho', 'J3C112167', 'Manajemen Informatika', 'L', 1, '1994-08-12', '2008-08-12', 10, '10449471_690057117709836_2331743675218555014_n.png'),
(4, 'herdiandkun', '81dc9bdb52d04dc20036dbd8313ed055', 'Herdiyan Septa Nugroho', 'J3C112048', 'Manajemen Informatika', 'L', 1, '1994-12-21', '2014-12-10', 0, 'gambar_burung_garuda.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_program_keahlian`
--

CREATE TABLE IF NOT EXISTS `tbl_program_keahlian` (
  `id_pk` varchar(3) NOT NULL,
  `nama_pk` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_program_keahlian`
--

INSERT INTO `tbl_program_keahlian` (`id_pk`, `nama_pk`) VALUES
('KMN', 'Komunikasi'),
('EKW', 'Ekowisata'),
('INF', 'Manajemen Informatika'),
('TEK', 'Teknik Komputer'),
('GZI', 'Manajemen Industri Makanan dan Gizi'),
('JMP', 'Superviser Jaminan Mutu Pangan'),
('PVT', 'Paramedik Veteriner'),
('MNI', 'Manajemen Industri'),
('PKS', 'Perkebunan Kelapa Sawit'),
('MAB', 'Manajemen Agribisnis'),
('TIB', 'Teknologi Industri Benih'),
('IKN', 'Teknologi Produksi dan Manajemen Perikanan Budiday'),
('TNK', 'Teknologi Manajemen Ternak'),
('ANK', 'Analisis Kimia'),
('LNK', 'Teknik Manajemen Lingkungan'),
('AKN', 'Akuntansi'),
('TMP', 'Teknologi dan Manajemen Produksi Perkebunan'),
('PPP', 'Produksi dan Pengembangan Pertanian Terpadu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id_thread` int(11) NOT NULL AUTO_INCREMENT,
  `Judul` varchar(100) NOT NULL,
  `isi_thread` text NOT NULL,
  `id_topik` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(50) NOT NULL,
  `jml_komen` int(11) NOT NULL,
  `viewer` int(11) NOT NULL,
  PRIMARY KEY (`id_thread`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `thread`
--

INSERT INTO `thread` (`id_thread`, `Judul`, `isi_thread`, `id_topik`, `tanggal`, `username`, `jml_komen`, `viewer`) VALUES
(2, 'I Phone 5', '<p>Jual I Phone 5&nbsp;5000. nego sadis. komen ya gan</p>\r\n', 2, '2014-12-09 08:28:09', 'Herdian', 6, 34),
(3, 'PHP', '<p>Gan ane pusing dengan pehape</p>\r\n', 6, '2014-12-09 09:34:39', 'Herdian', 0, 5),
(4, 'klklcsdjl', '<p>jflsdkjflds</p>\r\n', 6, '2014-12-09 09:53:07', 'Herdian', 0, 3),
(5, 'PanBer', '<p>Minggu Depan Naik Gunung ya</p>\r\n', 5, '2014-12-09 09:53:37', 'Herdian', 0, 0),
(6, 'Ayo Kenalan', '<p>Nama Saya Her...di....an<img alt="heart" src="http://localhost/for/assets/js/plugins/ckeditor/plugins/smiley/images/heart.png" style="height:23px; width:23px" title="heart" />dhfHer...di....an<img alt="heart" src="http://localhost/for/assets/js/plugins/ckeditor/plugins/smiley/images/heart.png" style="height:23px; width:23px" title="heart" />dhfNama Saya Her...di....an<img alt="heart" src="http://localhost/for/assets/js/plugins/ckeditor/plugins/smiley/images/heart.png" style="height:23px; width:23px" title="heart" />dhfNama Saya Her...di....an<img alt="heart" src="http://localhost/for/assets/js/plugins/ckeditor/plugins/smiley/images/heart.png" style="height:23px; width:23px" title="heart" />dhfNama Saya Her...di....an<img alt="heart" src="http://localhost/for/assets/js/plugins/ckeditor/plugins/smiley/images/heart.png" style="height:23px; width:23px" title="heart" />dhf</p>\r\n', 1, '2014-12-09 17:58:27', 'giant', 16, 55),
(7, 'kdflsdkfs', '<p>kjflsd</p>\r\n', 13, '2014-12-09 19:18:32', 'giant', 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `topik`
--

CREATE TABLE IF NOT EXISTS `topik` (
  `id_topik` int(11) NOT NULL AUTO_INCREMENT,
  `Judul` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jumlah_thread` int(11) NOT NULL,
  PRIMARY KEY (`id_topik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `topik`
--

INSERT INTO `topik` (`id_topik`, `Judul`, `id_kategori`, `jumlah_thread`) VALUES
(1, 'Perkenalan Member', 1, 1),
(2, 'Forum Jual Beli', 1, 1),
(4, 'Komunikasi', 2, 0),
(5, 'Ekowisata', 2, 1),
(6, 'Manajemen Informtika', 2, 2),
(7, 'Teknik Komputer', 2, 0),
(9, 'Kucing Ala Uek', 1, 0),
(10, 'Manajemen Agribisnis', 2, 0),
(11, 'Teknik Lingkungan', 2, 0),
(13, 'Baka Lovers', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
