-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2019 at 09:37 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbpakar`
--
CREATE DATABASE IF NOT EXISTS `dbpakar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbpakar`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nmuser` varchar(25) DEFAULT NULL,
  `nmlogin` varbinary(25) DEFAULT NULL,
  `pslogin` varchar(55) DEFAULT NULL,
  `level` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nmuser`, `nmlogin`, `pslogin`, `level`) VALUES
(5, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `analisa_hasil`
--

CREATE TABLE IF NOT EXISTS `analisa_hasil` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) NOT NULL,
  `kelamin` enum('P','W') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `kd_solusi` char(4) NOT NULL,
  `noip` varchar(60) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `analisa_hasil`
--

INSERT INTO `analisa_hasil` (`id`, `nama`, `kelamin`, `alamat`, `pekerjaan`, `kd_solusi`, `noip`, `tanggal`) VALUES
(0101, 'aaaa', 'P', 'Jambi', 'Swasta', 'P008', '::1', '2014-12-10 03:26:18'),
(0100, 'Mira', 'W', 'Jalan Samudra Kota Jambi', 'Swasta', 'P008', '::1', '2014-06-10 16:16:34'),
(0099, 'Bibi', 'P', 'Jambi', 'Swasta', 'P015', '::1', '2014-06-10 16:01:21'),
(0102, 'benjo', 'P', 'asjaas', 'asjd', 'P008', '::1', '2019-08-04 13:39:11'),
(0103, 'benjo', 'P', 'asjaas', 'asjd', 'P008', '::1', '2019-08-04 13:39:11'),
(0104, 'benjo', 'P', 'asjaas', 'asjd', 'P008', '::1', '2019-08-04 13:39:11'),
(0105, 'a', 'P', 'xx', 'xa', 'P001', '::1', '2019-08-04 20:29:03'),
(0106, 'a', 'W', 'xsCSV', 'DVAV', 'P001', '::1', '2019-08-09 19:49:49'),
(0107, 'b', 'W', 'm', 'm', 'P003', '::1', '2019-08-09 20:11:40'),
(0108, 'efe', 'W', 'wf1w', 'veqqq', 'P003', '::1', '2019-08-10 09:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `isi` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id`, `nama`, `email`, `isi`) VALUES
(1, 'Fery', 'f3rypurn4m4@gmail.com', 'Terima kasih atas bantuannya'),
(3, 'Niken', 'niken@gmail.com', 'Terima Kasih'),
(4, 'a', 'sa@a', 'aCS');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `kd_gejala` char(4) NOT NULL,
  `nm_gejala` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_gejala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `nm_gejala`) VALUES
('C011', '<p>Dahi tidak terlalu lebar</p>'),
('C012', '<p>Ukuran wajah satu setengah lebih panjang dari lebar wajah</p>'),
('C013', '<p>Ukuran rahang lebih sempit dari ukuran pada ukuran dahi</p>'),
('C014', '<p>Dagu terlihat membulat</p>'),
('C015', '<p>Dahi melebar</p>'),
('C016', '<p>Ukuran wajah antara panjang dan lebar sama</p>'),
('C017', '<p>Garis rahang tidak sama</p>'),
('C018', '<p>Dagu membentuk setengah lingkaran</p>'),
('C019', '<p>Dagu tidak lancip</p>'),
('C020', '<p>Garis rahang tajam</p>'),
('C021', '<p>Dagu sempit</p>'),
('C022', '<p>Ukuran rahang lebih lebar dari ukuran dahi</p>'),
('C023', '<p>Dahi lebih panjang kebawah dari pada lebar kesamping</p>'),
('C024', '<p>Ukuran wajah lebih panjang dari lebar</p>'),
('C025', '<p>Wajah terkesan sempit</p>'),
('C026', '<p>Jarak pelipis lebih lebar dibandingkan dengan jarak pangkal rahang</p>'),
('C027', '<p>Dahi meruncing</p>'),
('C028', '<p>Tulang pipi lebih menonjol</p>'),
('C029', '<p>Dagu lancip</p>');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE IF NOT EXISTS `rule` (
  `kd_solusi` char(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`kd_solusi`, `kd_gejala`) VALUES
('P010', 'C029'),
('P010', 'C028'),
('P010', 'C027'),
('P010', 'C024'),
('P009', 'C026'),
('P009', 'C024'),
('P009', 'C021'),
('P009', 'C015'),
('P008', 'C025'),
('P008', 'C024'),
('P008', 'C023'),
('P008', 'C019'),
('P007', 'C022'),
('P007', 'C021'),
('P007', 'C020'),
('P006', 'C020'),
('P004', 'C014'),
('P004', 'C013'),
('P004', 'C012'),
('P004', 'C011'),
('P005', 'C017'),
('P005', 'C016'),
('P005', 'C015'),
('P006', 'C019'),
('P006', 'C016'),
('P006', 'C015'),
('P005', 'C018');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE IF NOT EXISTS `solusi` (
  `kd_solusi` char(4) NOT NULL,
  `nm_solusi` varchar(300) NOT NULL,
  `solusi` text NOT NULL,
  PRIMARY KEY (`kd_solusi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`kd_solusi`, `nm_solusi`, `solusi`) VALUES
('P005', 'Wajah Bulat', '<table style="height: 97px;" width="488">\r\n<tbody>\r\n<tr>\r\n<td>Blush On</td>\r\n<td>Pulaskan blush on yang memiliki warna lembut secara tipis dan hindari pemakaian yang berlebih pada bagian bantalan pipi</td>\r\n</tr>\r\n<tr>\r\n<td>Foundation</td>\r\n<td>Gunakkan dengan warna yang gelap dibandingkan contour, pakai secara merata pada bagian tulang pipi dan rahang</td>\r\n</tr>\r\n<tr>\r\n<td>Eyeliner</td>\r\n<td>Untuk lebih mempercantik mata gunakkan eyeliner untuk membingkai wajah terkesan lebih dalam</td>\r\n</tr>\r\n<tr>\r\n<td>Lipstik</td>\r\n<td>Gunakkan warna yang lembut agar bibir terlihat lebih manis dan cantik</td>\r\n</tr>\r\n<tr>\r\n<td>Contour</td>\r\n<td>Gunakkan contour membentuk angka 3 (dari dahi, pipi, dagu) dan highlighter agar terkesan lebih ramping</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
('P004', 'Wajah Oval', '<table style="height: 104px;" width="660">\r\n<tbody>\r\n<tr>\r\n<td>Shading</td>\r\n<td>Teknik penggunaan diaplikasikan diatas kening dan daerah dagu agak lancip agar</td>\r\n</tr>\r\n<tr>\r\n<td>Alis</td>\r\n<td>Pertebal alis dengan warna yang gelap dan aplikasikan pada alis yang sudah ada supaya tidak terlalu mencolok dan terkesan aneh</td>\r\n</tr>\r\n<tr>\r\n<td>Blush On</td>\r\n<td>Gunakkan blush on secara merata pada bagian bantalan pipi</td>\r\n</tr>\r\n<tr>\r\n<td>Contour</td>\r\n<td>Gunakan contour warna coklat pada cekungan pipi serta dahi dan bagian tengah wajah dengan highlighter</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
('P006', 'Wajah Pear', '<table style="height: 21px;" width="359">\r\n<tbody>\r\n<tr>\r\n<td>Blush On</td>\r\n<td>Sapukan kea rah samping atas sedikit verikal&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
('P007', 'Wajah Segi Empat', '<table style="height: 59px;" width="363">\r\n<tbody>\r\n<tr>\r\n<td>Lipstik</td>\r\n<td>Dengan menggunakkan warna cerah dan terang dengan tujuan mengalihkan perhatian dari garis rahang</td>\r\n</tr>\r\n<tr>\r\n<td>Foundation</td>\r\n<td>Gunakka dengan warna yang gelap dan aplikasikan pada tulang rahang dan pelipis</td>\r\n</tr>\r\n<tr>\r\n<td>Contour</td>\r\n<td>Aplikasikan contour di sepanjang dahi, menyamping dipipi serta dagu dan hindari highlighter pada dahi</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
('P008', 'Wajah Segitiga', '<table style="height: 66px;" width="547">\r\n<tbody>\r\n<tr>\r\n<td>Blush On</td>\r\n<td>Aplikasikan pada kedua tulang pipi, diarahkan menyamping&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>Alis</td>\r\n<td>Titik awal sama dengan titik awal mata. Diawal tebal kemudian melengkung dibagian selanjutnya</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
('P009', 'Wajah Panjang', '<table style="height: 40px;" width="395">\r\n<tbody>\r\n<tr>\r\n<td>Eyeshadow</td>\r\n<td>Gunakkan eyeshadow dengan warna yang terang dan sedikit berani</td>\r\n</tr>\r\n<tr>\r\n<td>Blush On</td>\r\n<td>Teknik penggunaan Blush on dari atas tulang pipi sampai dagu</td>\r\n</tr>\r\n</tbody>\r\n</table>'),
('P010', 'Wajah Belah Ketupat', '<table style="height: 40px;" width="666">\r\n<tbody>\r\n<tr>\r\n<td>Shading</td>\r\n<td>Aplikasikan memanjang vertical pada tulang pipi dan dagu agar dapat merampingkan wajah&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>Blush On</td>\r\n<td>Aplikasikan pada tulang pipi dengan membaur samar-samar</td>\r\n</tr>\r\n</tbody>\r\n</table>');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('127.0.0.2', '2009-09-11', 1, '1252681630'),
('::1', '2014-12-09', 10, '1418156879'),
('::1', '2014-07-08', 1, '1404811988'),
('::1', '2014-07-04', 2, '1404441411'),
('::1', '2014-06-17', 4, '1402973989'),
('::1', '2014-06-13', 7, '1402651504'),
('127.0.0.1', '2010-04-16', 11, '1271389426'),
('::1', '2014-06-10', 90, '1402399216'),
('::1', '2019-08-04', 11, '1564951179'),
('::1', '2019-08-05', 109, '1564976996'),
('::1', '2019-08-09', 14, '1565387994'),
('::1', '2019-08-10', 163, '1565465789');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_analisa`
--

CREATE TABLE IF NOT EXISTS `tmp_analisa` (
  `noip` varchar(60) NOT NULL DEFAULT '',
  `kd_solusi` char(4) NOT NULL DEFAULT '',
  `kd_gejala` char(4) NOT NULL DEFAULT '',
  `status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE IF NOT EXISTS `tmp_gejala` (
  `kd_gejala` char(4) NOT NULL,
  `noip` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_pasien`
--

CREATE TABLE IF NOT EXISTS `tmp_pasien` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `noip` varchar(60) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=162 ;

--
-- Dumping data for table `tmp_pasien`
--

INSERT INTO `tmp_pasien` (`id`, `nama`, `alamat`, `pekerjaan`, `noip`, `tanggal`) VALUES
(0161, 'aku', 'sa', 'ad', '::1', '2019-08-10 12:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_solusi`
--

CREATE TABLE IF NOT EXISTS `tmp_solusi` (
  `kd_solusi` char(4) NOT NULL,
  `noip` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
