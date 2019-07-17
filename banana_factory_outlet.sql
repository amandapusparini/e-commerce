-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2019 at 06:21 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banana_factory_outlet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `gambar` varchar(255) NOT NULL DEFAULT 'default.png',
  `theme` varchar(20) NOT NULL DEFAULT 'sb_admin'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `nama`, `status`, `gambar`, `theme`) VALUES
(2, 'admin@admin.com', 'admin', 'admin', 1, 'default.png', 'sb_admin');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kategori`
--

CREATE TABLE IF NOT EXISTS `detail_kategori` (
`id_detail` int(3) NOT NULL,
  `id_sub_kategori` int(3) NOT NULL,
  `nama_detail` varchar(150) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(6) NOT NULL,
  `poin` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kategori`
--

INSERT INTO `detail_kategori` (`id_detail`, `id_sub_kategori`, `nama_detail`, `gambar`, `deskripsi`, `harga`, `poin`) VALUES
(8, 2, 'Nasi Goreng Biasa', '40335-nasgor_biasa.jpg', '<p>\r\n	Nasi Goreng dengan Telur, Acar, dan Kerupuk</p>\r\n', 11000, 0),
(9, 2, 'Nasi Goreng Ayam', '5ced0-nasgor_ayam.jpg', '<p>\r\n	Nasi Goreng dengan Telur, Ayam, Acar, dan Kerupuk</p>\r\n', 13000, 0),
(10, 2, 'Nasi Goreng Sosis', 'e2aba-nasgor_sosis.jpg', '<p>\r\n	Nasi Goreng dengan Telur, Sosis, Acar, dan Kerupuk</p>\r\n', 13000, 0),
(11, 2, 'Nasi Goreng Bakso', 'df3d6-nasgor_bakso.jpg', '<p>\r\n	Nasi Goreng dengan Telur, Bakso, Acar, dan Kerupuk</p>\r\n', 14000, 0),
(12, 2, 'Nasi Goreng Ati Ampela', '26bba-nasgor_ati_ampela.jpg', '<p>\r\n	Nasi Goreng dengan Ati Ampela, Sosis, Acar, dan Kerupuk</p>\r\n', 14000, 0),
(13, 2, 'Nasi Goreng Seafood', '8db31-nasgor_seafood.jpg', '<p>\r\n	Nasi Goreng dengan Telur, Udang,Cumi, Acar, dan Kerupuk</p>\r\n', 16000, 0),
(14, 2, 'Nasi Goreng Spesial', '9a801-nasgor_spesial.jpg', '<p>\r\n	Nasi Goreng dengan Telur, Ayam, Sosis, Bakso, Ati Ampela, Udang, Cumi, Acar, dan Kerupuk</p>\r\n', 18000, 0),
(15, 1, 'Mie Goreng Biasa', 'e744f-mie_goreng_biasa.jpg', '<p>\r\n	Mie Goreng dengan Telur, Sawi, Kol, Acar, dan Kerupuk</p>\r\n', 11000, 0),
(16, 1, 'Mie Goreng Ayam', 'c3c7f-mie_goreng_ayam.jpg', '<p>\r\n	Mie Goreng dengan Telur, Ayam, Sawi, Kol, Acar, dan Kerupuk</p>\r\n', 13000, 1),
(17, 1, 'Mie Goreng Sosis', 'dd746-mie_goreng_sosis.jpg', '<p>\r\n	Mie Goreng dengan Telur, Sosis, Sawi, Kol, Acar, dan Kerupuk</p>\r\n', 12000, 1),
(18, 1, 'Mie Goreng Bakso', '742ff-mie_goreng_bakso.jpg', '<p>\r\n	Mie Goreng dengan Telur, Bakso, Sawi, Kol, Acar, dan Kerupuk</p>\r\n', 14000, 0),
(19, 1, 'Mie Goreng Ati Ampela', 'ca795-mie_goreng_ati_ampela.jpg', '<p>\r\n	Mie Goreng dengan Telur, Ati Ampela, Sawi, Kubis, Acar, dan Kerupuk</p>\r\n', 14000, 0),
(20, 1, 'Mie Goreng Seafood', '13288-mie_rebus_seafood.jpg', '<p>\r\n	Mie Goreng dengan Telur, Udang, Cumi, Sawi, Kol, Acar, dan Kerupuk</p>\r\n', 16000, 0),
(21, 1, 'Mie Goreng Spesial', '8aabe-mie_goreng_spesial.jpg', '<p>\r\n	Mie Goreng dengan Telur, Ayam, Sosis, Bakso, Ati Ampela, Udang, Cumi, Sawi, Kol, Acar, dan Kerupuk</p>\r\n', 18000, 0),
(22, 3, 'Jus Alpukat', 'eab54-jus-alpukat.jpg', '<p>\n	Jus Alpukat dengan alpukat yang berkualitas</p>\n', 8000, 1),
(23, 3, 'Jus Jambu', '3eca0-jus-jambu.jpg', '<p>\n	Jus Jambu dengan Jambu yang Berkualitas</p>\n', 8000, 1),
(24, 3, 'Jus Mangga', '78756-jus-mangga.jpg', '<p>\n	Jus Mangga dengan Mangga yang bekualitas</p>\n', 8000, 2),
(25, 3, 'Jus Melon', '71f18-jus-melon.jpg', '<p>\n	Jus Melon dengan Melon yang bekualitas</p>\n', 8000, 1),
(26, 3, 'Jus Pisang', '6b10d-jus-pisang.jpg', '<p>\n	Jus Pisang dengan Pisang yang bekualitas</p>\n', 8000, 0),
(27, 3, 'Jus Tomat', 'ddfab-jus-tomat.jpg', '<p>\n	Jus Tomat dengan Tomat yang bekualitas</p>\n', 8000, 1),
(28, 1, 'Mie Ayam Jamur', '118a2-mie_ayam_jamur.jpg', '<p>\r\n	Mie dengan Ayam, Sawi, Jamur, dan Pangsit Goreng</p>\r\n', 10000, 0),
(29, 1, 'Mie Ayam Pangsit', 'cb893-mie_ayam_pangsit.jpg', '<p>\r\n	Mie dengan Ayam, Sawi, Pangsit Goreng, dan Pangsit Basah</p>\r\n', 10000, 0),
(30, 4, 'Pisang Bakar Original', '1c478-pisang_bakar.jpg', '<p>\r\n	Pisang yang dibakar dengan Pisang yang berkualitas</p>\r\n', 7000, 0),
(31, 4, 'Pisang Bakar Meises', 'e5a61-pisang_bakar_meses.jpg', '<p>\r\n	Pisang Bakar dengan Taburan Meises diatasnya</p>\r\n', 8000, 1),
(32, 4, 'Pisang Bakar Keju', 'c5bc8-pisang_bakar_keju.jpg', '<p>\r\n	Pisang Bakar dengan Taburan Keju diatasnya</p>\r\n', 9000, 0),
(33, 4, 'Pisang Bacok', 'e1211-pisang_bakar_meses.jpg', '<p>\r\n	Pisang Bacok (Banana Cokelat) adalah pisang dengan Kulit Lumpia yang ditaburi Saus Cokelet dan Meises</p>\r\n', 8000, 0),
(34, 4, 'Pisang Baju', '26b45-pisang_bakar_keju.jpg', '<p>\r\n	Pisang Baju (Banana Keju) adalah Pisang dengan Kulit Lumpia yang ditaburi Keju</p>\r\n', 9000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `detail_pemesanan` (
`id_detail_pemesanan` int(4) NOT NULL,
  `id_detail` int(3) NOT NULL,
  `id_pesanan` int(3) NOT NULL,
  `jml_detail` int(3) NOT NULL,
  `sub_total` int(8) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_pemesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail_pemesanan`, `id_detail`, `id_pesanan`, `jml_detail`, `sub_total`, `status`, `tgl_pemesanan`) VALUES
(17, 9, 1, 0, 0, '0', '2019-07-13 06:09:34'),
(18, 16, 1, 1, 13000, '0', '2019-07-13 06:09:34'),
(19, 17, 1, 1, 12000, '0', '2019-07-13 06:09:34'),
(20, 23, 1, 1, 8000, '0', '2019-07-13 06:09:34'),
(21, 27, 1, 1, 8000, '0', '2019-07-13 06:09:34'),
(22, 22, 2, 1, 8000, '0', '2019-07-13 06:25:07'),
(23, 25, 2, 1, 8000, '0', '2019-07-13 06:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(3) NOT NULL,
  `kategori` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
`id_pesanan` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `no_pesanan` varchar(10) NOT NULL,
  `tgl_pesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `no_pesanan`, `tgl_pesanan`) VALUES
(1, 4, '1307190', '2019-07-13 06:09:34'),
(2, 4, '1307191', '2019-07-13 06:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(1) NOT NULL,
  `kode` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode`) VALUES
(1, 'koad');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
`id_pelanggan` int(4) NOT NULL,
  `id_user` int(3) NOT NULL,
  `komentar` text NOT NULL,
  `tgl_komentar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_pelanggan`, `id_user`, `komentar`, `tgl_komentar`) VALUES
(1, 0, 'sdqw', '0000-00-00 00:00:00'),
(2, 4, 'wyqkw', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE IF NOT EXISTS `sub_kategori` (
`id_sub_kategori` int(3) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `nama_sub_kategori` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `id_kategori`, `nama_sub_kategori`) VALUES
(1, 1, 'Mie '),
(2, 1, 'Nasi Goreng'),
(3, 2, 'Jus'),
(4, 1, 'Pisang Bakar');

-- --------------------------------------------------------

--
-- Table structure for table `tjm_menu`
--

CREATE TABLE IF NOT EXISTS `tjm_menu` (
`id` int(11) NOT NULL,
  `parent_menu` int(11) NOT NULL DEFAULT '1',
  `nama_menu` varchar(50) NOT NULL,
  `url_menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `urutan` tinyint(3) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `type` enum('Admin') NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tjm_menu`
--

INSERT INTO `tjm_menu` (`id`, `parent_menu`, `nama_menu`, `url_menu`, `icon`, `urutan`, `status`, `type`) VALUES
(1, 1, 'root', '/', '', 0, 0, 'Admin'),
(2, 1, 'dashboard', 'admin/dashboard', 'fa fa-fw fa-dashboard', 1, 1, 'Admin'),
(3, 1, 'User Admin', 'admin/useradmin', 'fa fa-users', 99, 0, 'Admin'),
(4, 1, 'Menu', 'admin/menu', 'fa fa-gear', 100, 1, 'Admin'),
(25, 1, 'Master', 'admin/master', 'fa fa-ticket', 2, 0, 'Admin'),
(31, 1, 'Kategori', '', 'glyphicon glyphicon-list', 2, 1, 'Admin'),
(32, 31, 'Sub Kategori', 'admin/sub_kategori', 'glyphicon glyphicon-list', 2, 1, 'Admin'),
(33, 31, 'Kategori Menu', 'admin/kategori', '', 1, 1, 'Admin'),
(34, 31, 'Detail Kategori', 'admin/detail_kategori', '', 3, 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(4) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_tlp`, `username`, `password`, `email`, `gambar`) VALUES
(1, '4g', 'fsrfr', '5', 'rer', 'd44210dbe95c8501d3e3f3835dbdbaae', '', ''),
(2, 'amanda', 'komplek depag', '08128944669', 'amanda', '6209804952225ab3d14348307b5a4a27', '', ''),
(3, 'o', 'o', 'o', 'o', 'd95679752134a2d9eb61dbd7b91c4bcc', '', 'bihun_goreng_ati_ampela.JPG'),
(4, 'p', 'p', 'p', 'p', '83878c91171338902e0fe0fb97a8c47a', 'p', 'bihun_goreng_ati_ampela(1).JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_kategori`
--
ALTER TABLE `detail_kategori`
 ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
 ADD PRIMARY KEY (`id_detail_pemesanan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
 ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
 ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indexes for table `tjm_menu`
--
ALTER TABLE `tjm_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detail_kategori`
--
ALTER TABLE `detail_kategori`
MODIFY `id_detail` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
MODIFY `id_detail_pemesanan` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
MODIFY `id_pesanan` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
MODIFY `id_pelanggan` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
MODIFY `id_sub_kategori` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tjm_menu`
--
ALTER TABLE `tjm_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
