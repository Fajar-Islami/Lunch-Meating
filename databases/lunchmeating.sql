-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 07:11 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lunchmeating`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nomor_telp` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `role`, `email`, `nomor_telp`, `role_id`, `foto`) VALUES
(1, 'tes8', '1234', 'Kelompok 8', 'Admin', 'tjakrabirawa65@gmail.com', '12345678', 1, 'Windows_Xp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(3, 'Meja & Waktu'),
(4, 'Reservasi');

-- --------------------------------------------------------

--
-- Table structure for table `admin_sub_menu`
--

CREATE TABLE `admin_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_sub_menu`
--

INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `judul`, `url`, `icon`) VALUES
(1, 1, 'Profil Saya', 'profile/index', 'fas fa-fw fa-id-card'),
(2, 1, 'Dashboard', 'admin/index', 'fas fa-fw fa-chart-line'),
(5, 3, 'Meja dan Kursi', 'mejakursi/index', 'fas fa-fw fa-chair'),
(6, 4, 'Daftar Reservasi', 'reservasi/index', 'fas fa-fw fa-address-book'),
(7, 4, 'Pemesanan Reservasi', 'reservasi/pemesanan', 'fas fa-fw fa-user-clock'),
(8, 3, 'Waktu Meja', 'waktumeja/index', 'far fa-fw fa-clock'),
(9, 1, 'Masukan, kritik dan saran', 'masukan/index', 'fas fa-fw fa-theater-masks');

-- --------------------------------------------------------

--
-- Table structure for table `admin_token`
--

CREATE TABLE `admin_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `tgl_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_galeri`
--

CREATE TABLE `app_galeri` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_galeri`
--

INSERT INTO `app_galeri` (`id`, `nama`, `foto`) VALUES
(1, 'galeri_1', 'images/gallery-img-01.jpg'),
(2, 'galeri_2', 'images/gallery-img-02.jpg'),
(3, 'galeri_3', 'images/gallery-img-03.jpg'),
(4, 'galeri_4', 'images/gallery-img-04.jpg'),
(5, 'galeri_5', 'images/gallery-img-05.jpg'),
(6, 'galeri_6', 'images/gallery-img-06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `app_masukan`
--

CREATE TABLE `app_masukan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jenis_kel` enum('Laki-laki','Perempuan','','') NOT NULL,
  `no_telp` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `pesan` text NOT NULL,
  `waktu_diterima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_masukan`
--

INSERT INTO `app_masukan` (`id`, `nama`, `email`, `jenis_kel`, `no_telp`, `alamat`, `pesan`, `waktu_diterima`) VALUES
(1, 'fajar,fajar,fajar,fajar,fajar,fajar,', 'tjakrabirawa65@gmail.com', 'Laki-laki', 12333, 'qq', 'aaaa', 1586082873),
(2, 'fajar', 'tjakrabirawa65@gmail.com', 'Laki-laki', 12345, 'aaa', 'tes123', 1586814691),
(3, 'fajar', 'tjakrabirawa65@gmail.com', 'Laki-laki', 12344, 'aaaaaaa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....', 1586814799),
(4, 'fajar', 'tjakrabirawa65@gmail.com', 'Laki-laki', 1234, 'a', 'a', 1586815127),
(5, 'aaaaa', 'tjakrabirawa65@gmail.com', 'Laki-laki', 123, 'a', 'a', 1586815578),
(6, 'fajar', 'tjakrabirawa65@gmail.com', 'Laki-laki', 123, 'aa', 'aaa', 1586815695);

-- --------------------------------------------------------

--
-- Table structure for table `app_menu`
--

CREATE TABLE `app_menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `jenis` enum('Sarapan','Makan siang','Makan malam','Minuman') NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_menu`
--

INSERT INTO `app_menu` (`id`, `nama`, `keterangan`, `harga`, `jenis`, `foto`) VALUES
(1, 'Sarapan 1', 'Ini Sarapan 1', 10000, 'Sarapan', 'images/blog-img-02.jpg'),
(2, 'Sarapan 2', 'Ini Sarapan 2', 12200, 'Sarapan', 'images/img-04.jpg'),
(3, 'Minuman 1', 'Ini minuman 1', 2000, 'Minuman', 'images/img-01.jpg'),
(4, 'Minuman 2', 'Ini minuman 2', 1500, 'Minuman', 'images/img-02.jpg'),
(5, 'Makan siang 1', 'Ini Makan siang 1', 2000, 'Makan siang', 'images/img-04.jpg'),
(6, 'Makan siang 2', 'Ini Makan siang 2', 15900, 'Makan siang', 'images/img-05.jpg'),
(7, 'Makan malam 1', 'Ini Makan malam 1', 14000, 'Makan malam', 'images/img-08.jpg'),
(8, 'Makan malam 2', 'Ini Makan malam 2', 4500, 'Makan malam', 'images/img-09.jpg'),
(9, 'Minuman 3', 'Ini minuman 3', 1500, 'Minuman', 'images/img-03.jpg'),
(10, 'Makan siang 3', 'Ini Makan siang 3', 20000, 'Makan siang', 'images/img-06.jpg'),
(11, 'Makan malam 3', 'Ini Makan malam 3', 150000, 'Makan malam', 'images/img-07.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `app_staf`
--

CREATE TABLE `app_staf` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `facebook` varchar(1000) NOT NULL,
  `instagram` varchar(1000) NOT NULL,
  `gmail` varchar(1000) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_staf`
--

INSERT INTO `app_staf` (`id`, `nama`, `jabatan`, `facebook`, `instagram`, `gmail`, `foto`) VALUES
(1, 'Fajar', 'Web Programmer', 'facebook.com', 'instagram.com', 'mail.google.com/mail/?view=cm&fs=1&to=ahmadfajarislami@protonmail.com', 'images/stuff-img-01.jpg'),
(2, 'Adnan', 'Web Designer', 'www.facebook.com/adnanelah', 'instagram.com/adnandoang?igshid=9pmiq7cwqhfh', 'gmail.com', 'images/stuff-img-02.jpg'),
(3, 'Mayang', 'Web Dokumen', 'www.facebook.com/mayang.pusfitaelf', 'instagram.com/mayangpsf?igshid=dt7logyhyohp', 'mail.google.com/mail/?view=cm&fs=1&to=mayangpsfitas13@gmail.com', 'images/stuff-img-03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meja`
--

CREATE TABLE `tbl_meja` (
  `id_meja` int(11) NOT NULL,
  `id_waktu_meja` int(11) NOT NULL,
  `meja_4` int(11) NOT NULL,
  `meja_2` int(11) NOT NULL,
  `default_meja4` int(11) NOT NULL,
  `default_meja2` int(11) NOT NULL,
  `harga_meja_4` int(11) NOT NULL,
  `harga_meja_2` int(11) NOT NULL,
  `meja_id_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_meja`
--

INSERT INTO `tbl_meja` (`id_meja`, `id_waktu_meja`, `meja_4`, `meja_2`, `default_meja4`, `default_meja2`, `harga_meja_4`, `harga_meja_2`, `meja_id_admin`) VALUES
(17, 14, 20, 20, 20, 20, 1000, 2000, 'tes8'),
(18, 13, 100, 10, 100, 10, 20000, 4, 'tes8'),
(19, 9, 10, 50, 10, 50, 1200, 50000, 'tes8'),
(25, 10, 100, 100, 100, 100, 1000, 1000, 'tes8'),
(26, 11, 10, 100, 10, 100, 20000, 50000, 'tes8');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tgl`
--

CREATE TABLE `tbl_tgl` (
  `id` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tgl`
--

INSERT INTO `tbl_tgl` (`id`, `tanggal`) VALUES
(1, 1587340800);

--
-- Triggers `tbl_tgl`
--
DELIMITER $$
CREATE TRIGGER `default_meja` AFTER UPDATE ON `tbl_tgl` FOR EACH ROW UPDATE `tbl_meja` SET 
`tbl_meja`.`meja_4` = `tbl_meja`.`default_meja4`,
`tbl_meja`.`meja_2` = `tbl_meja`.`default_meja2`
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `kode_transaksi` varchar(100) NOT NULL,
  `id_waktu_reservasi` varchar(11) NOT NULL,
  `waktu_reservasi` varchar(200) NOT NULL,
  `jumlah_meja2` int(11) NOT NULL,
  `biaya_meja2` int(11) NOT NULL,
  `jumlah_meja4` int(11) NOT NULL,
  `biaya_meja4` int(11) NOT NULL,
  `total_biaya` int(11) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_telp` int(12) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `tanggal_pesan` int(20) NOT NULL,
  `status` int(1) NOT NULL,
  `setuju_id_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`kode_transaksi`, `id_waktu_reservasi`, `waktu_reservasi`, `jumlah_meja2`, `biaya_meja2`, `jumlah_meja4`, `biaya_meja4`, `total_biaya`, `nama_pelanggan`, `email`, `no_telp`, `alamat`, `tanggal_pesan`, `status`, `setuju_id_admin`) VALUES
('TR-M3-LM-200404-0001', '18', 'Malam (23:26 - 23:59)', 6, 24, 9, 180000, 180024, 'sa', 'tjakrabirawa65@gmail.com', 2, 'a', 1586015467, 1, 'tes8'),
('TR-M3-LM-200404-0004', '18', 'Malam (23:26 - 23:59)', 0, 0, 2, 40000, 40000, 'sa', 'a@gmail.com', 2, '2', 1586015794, 1, 'tes8'),
('TR-M3-LM-200419-0001', '18', 'Malam (23:26 - 23:59)', 1, 4, 0, 0, 4, 'aaaaa', 'tjakrabirawa65@gmail.com', 12333, 'aa', 1587272818, 1, 'tes8'),
('TR-M3-LM-200419-0002', '18', 'Malam (23:26 - 23:59)', 9, 36, 95, 1900, 1936, 'a', 'a@gmail.com', 12333, '2', 1587272917, 1, 'tes8'),
('TR-M3-LM-200419-0003', '18', 'Malam (23:26 - 23:59)', 1, 4, 10, 200000, 200004, 'aaaaa', 'a@gmail.com', 12333, 'a', 1587289117, 1, 'tes8'),
('TR-M4-LM-200419-0001', '17', 'Malam (23:55 - 23:58)', 9, 18000, 0, 0, 18000, 'aaaaaaaaaaaaaaaaaaaaaaaaaa', 'aa@ymal.com', 1, 'a', 1587289642, 1, 'tes8'),
('TR-M4-LM-200419-0002', '17', 'Malam (23:55 - 23:58)', 8, 16000, 0, 0, 16000, 'a', 'a@gmail.com', 2, 'aa', 1587306898, 1, 'tes8');

--
-- Triggers `tbl_transaksi`
--
DELIMITER $$
CREATE TRIGGER `update_sisa_meja` AFTER UPDATE ON `tbl_transaksi` FOR EACH ROW UPDATE `tbl_meja` SET 
`tbl_meja`.`meja_4` = `tbl_meja`.`meja_4` - NEW.jumlah_meja4, 
`tbl_meja`.`meja_2` = `tbl_meja`.`meja_2` - NEW.jumlah_meja2
WHERE `tbl_meja`.`id_meja` = NEW.id_waktu_reservasi
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_token`
--

CREATE TABLE `tbl_transaksi_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `tgl_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_waktu_meja`
--

CREATE TABLE `tbl_waktu_meja` (
  `id_waktu` int(11) NOT NULL,
  `waktu` enum('Pagi','Siang','Sore','Malam') NOT NULL,
  `jam_mulai` int(11) NOT NULL,
  `jam_selesai` int(11) NOT NULL,
  `kode_waktu` varchar(128) NOT NULL,
  `waktu_id_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_waktu_meja`
--

INSERT INTO `tbl_waktu_meja` (`id_waktu`, `waktu`, `jam_mulai`, `jam_selesai`, `kode_waktu`, `waktu_id_admin`) VALUES
(7, 'Pagi', 0, 3600, 'P1', 'tes8'),
(9, 'Siang', 43200, 46800, 'S1', 'tes8'),
(10, 'Sore', 54000, 57600, 'SR1', 'tes8'),
(11, 'Malam', 74700, 78300, 'M1', 'tes8'),
(13, 'Malam', 84360, 86340, 'M3', 'tes8'),
(14, 'Malam', 86100, 86280, 'M4', 'tes8');

--
-- Triggers `tbl_waktu_meja`
--
DELIMITER $$
CREATE TRIGGER `hapus_meja` BEFORE DELETE ON `tbl_waktu_meja` FOR EACH ROW DELETE FROM tbl_meja WHERE tbl_meja.id_waktu_meja = old.id_waktu
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_sub_menu`
--
ALTER TABLE `admin_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_token`
--
ALTER TABLE `admin_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_galeri`
--
ALTER TABLE `app_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_masukan`
--
ALTER TABLE `app_masukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_menu`
--
ALTER TABLE `app_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_staf`
--
ALTER TABLE `app_staf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_meja`
--
ALTER TABLE `tbl_meja`
  ADD PRIMARY KEY (`id_meja`),
  ADD KEY `id_waktu_meja` (`id_waktu_meja`) USING BTREE,
  ADD KEY `id_waktu_meja_2` (`id_waktu_meja`);

--
-- Indexes for table `tbl_tgl`
--
ALTER TABLE `tbl_tgl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `tbl_transaksi_token`
--
ALTER TABLE `tbl_transaksi_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_waktu_meja`
--
ALTER TABLE `tbl_waktu_meja`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_sub_menu`
--
ALTER TABLE `admin_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin_token`
--
ALTER TABLE `admin_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `app_galeri`
--
ALTER TABLE `app_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `app_masukan`
--
ALTER TABLE `app_masukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `app_menu`
--
ALTER TABLE `app_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `app_staf`
--
ALTER TABLE `app_staf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_meja`
--
ALTER TABLE `tbl_meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_tgl`
--
ALTER TABLE `tbl_tgl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaksi_token`
--
ALTER TABLE `tbl_transaksi_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_waktu_meja`
--
ALTER TABLE `tbl_waktu_meja`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
