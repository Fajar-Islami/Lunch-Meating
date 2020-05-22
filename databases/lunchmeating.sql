-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 03:38 AM
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
(1, 'tes8', '12345', 'Kelompok 8', 'Admin', 'tjakrabirawa65@gmail.com', '012345678912', 1, 'default1.png');

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
(4, 'Transaksi');

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
(6, 4, 'Reservasi Tervalidasi', 'reservasi/index', 'fas fa-fw fa-address-book'),
(7, 4, 'Reservasi Sementara', 'reservasi/pemesanan', 'fas fa-fw fa-user-clock'),
(8, 3, 'Waktu Meja', 'waktumeja/index', 'far fa-fw fa-clock'),
(9, 1, 'Tanggapan Pelanggan', 'masukan/index', 'fas fa-fw fa-theater-masks');

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
-- Table structure for table `app_email`
--

CREATE TABLE `app_email` (
  `id_email` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `waktu_subs` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_email`
--

INSERT INTO `app_email` (`id_email`, `email`, `waktu_subs`) VALUES
(1, 'tjakrabirawa65@gmail.com', '2020-05-21 14:23:51');

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
(1, 'galeri_1', 'images/lunch3.jpg'),
(2, 'galeri_2', 'images/galeri2.jpg'),
(3, 'galeri_3', 'images/galeri3.jpg'),
(4, 'galeri_4', 'images/galeri4.jpg'),
(5, 'galeri_5', 'images/galeri5.jpg'),
(6, 'galeri_6', 'images/galeri6.jpeg'),
(7, 'galeri_7', 'images/galeri7.jpg'),
(8, 'galeri_8', 'images/galeri8.jpg'),
(9, 'galeri_9', 'images/galeri9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `app_masukan`
--

CREATE TABLE `app_masukan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kel` enum('Laki-laki','Perempuan') NOT NULL,
  `no_telp` int(13) UNSIGNED NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `waktu_diterima` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_masukan`
--

INSERT INTO `app_masukan` (`id`, `nama`, `email`, `jenis_kel`, `no_telp`, `alamat`, `pesan`, `waktu_diterima`) VALUES
(1, 'Faustino Bergstrom', 'chadd.greenholt@example.net', 'Perempuan', 4294967295, '507 Schamberger Mall Suite 416', 'Quia iusto eaque labore rerum illum velit aliquid. Dolorem consequatur occaecati non corporis quo et vel. Totam officia nostrum consequatur incidunt dolore tenetur blanditiis.', '2001-09-25 03:41:57'),
(2, 'Mr. Rocky Boyle DVM', 'yolanda.schultz@example.org', 'Laki-laki', 570076, '210 Colton Square', 'Quidem illum consequatur delectus autem consequuntur ut eveniet. Omnis consequuntur molestias dolores debitis similique expedita. Dolor corrupti quam ipsam.', '2019-05-08 19:46:59'),
(3, 'Benedict Ratke', 'haylie91@example.com', 'Perempuan', 0, '6161 Powlowski Place', 'In quis sint voluptatem molestias rerum expedita. Optio quis quia minima reiciendis veniam consequatur. Id qui praesentium dolorum ipsam.', '1983-09-26 05:31:18'),
(4, 'Miss Kyra Hane DVM', 'kihn.wade@example.net', 'Perempuan', 0, '23886 Schumm Burgs', 'Voluptatum eaque fugit accusamus quia reiciendis eius qui. Voluptatum possimus dignissimos voluptas ut. Adipisci unde nihil est nihil quasi explicabo.', '1981-12-28 23:50:06'),
(5, 'Bettie Morar', 'jules.ortiz@example.net', 'Perempuan', 1, '7761 Zoey Plains Apt. 426', 'Quibusdam illo ut esse saepe. Laborum excepturi aspernatur assumenda vitae et cumque quas.', '2013-07-20 10:23:11'),
(6, 'Winfield Schowalter', 'gage.wilkinson@example.org', 'Perempuan', 24, '80348 Lehner Springs', 'Vero alias qui temporibus magnam quasi est. Quibusdam temporibus sed odio mollitia. Non tenetur perspiciatis accusantium dolorum.', '1986-05-24 21:53:21'),
(7, 'Marquise Larson V', 'fabiola60@example.com', 'Laki-laki', 223990, '5633 Dorthy Greens Apt. 474', 'Blanditiis maxime dolores non sapiente. Optio velit quasi unde qui qui aspernatur. Et officiis corrupti quidem excepturi harum labore voluptatem. Rerum ullam porro quisquam aut aut qui temporibus.', '2007-10-06 09:40:27'),
(8, 'Prof. Bartholome Swift MD', 'ena02@example.com', 'Perempuan', 1, '3532 Susan Bypass', 'Quia ab inventore est laudantium rerum occaecati. Corporis sint ea perferendis et non quas. Est eaque nemo molestias at.', '2002-06-17 14:23:23'),
(9, 'Bertram McKenzie', 'nschimmel@example.com', 'Laki-laki', 13, '5935 Kris Lakes', 'Repellendus et qui quisquam nobis esse eaque saepe in. Unde ut consequatur magni et minima voluptatem. A explicabo aut omnis culpa culpa. Sunt incidunt qui et et et delectus.', '2002-02-14 21:48:03'),
(10, 'Zena Schuppe', 'cleta.reichert@example.com', 'Laki-laki', 167965, '0072 Milton Field Apt. 257', 'Quam soluta pariatur quo necessitatibus voluptas. Itaque provident dicta enim rem incidunt velit consequatur.', '1989-06-22 22:04:39'),
(11, 'Georgiana Durgan MD', 'gwalsh@example.com', 'Perempuan', 253708, '672 Johnathan Vista', 'Expedita ut tempora libero eveniet fugiat ea. Minima in rerum earum quia voluptatibus. Velit voluptatem perspiciatis vel ad. Ut ea alias dicta atque ut.', '2009-12-21 06:44:47'),
(12, 'Brannon Sanford', 'frederique74@example.com', 'Laki-laki', 1, '5592 Joanne Mews Suite 147', 'Porro velit et voluptatem est natus. Consequatur beatae et expedita est. Dicta qui dolorem atque.', '1999-08-10 12:43:26'),
(13, 'Ms. Natalia Von DVM', 'sean.halvorson@example.net', 'Perempuan', 591, '16069 Russ Freeway', 'Consequatur in explicabo rem quis deserunt. Vel asperiores est dolor ratione. Voluptatem aut recusandae dolorem exercitationem. Sit qui id voluptatem temporibus vel accusantium.', '1983-07-02 19:37:19'),
(14, 'Jasen Hilll IV', 'gswift@example.net', 'Perempuan', 542, '72321 Dashawn Ford', 'Quidem harum eius cumque ea. Ipsam nostrum eos aut repellendus quidem recusandae. Qui maxime sit et in dolorum. Fuga architecto cum reiciendis autem blanditiis voluptas et.', '2007-05-30 02:14:01'),
(15, 'Mrs. Danyka Lebsack', 'nicholaus.mosciski@example.com', 'Laki-laki', 1, '726 Bins Drive', 'Est qui veniam magni quis blanditiis quibusdam. Commodi eos qui rem quis qui molestias mollitia necessitatibus.', '1983-10-21 17:43:52'),
(16, 'Taya Reichel', 'cristal49@example.net', 'Perempuan', 0, '634 Gulgowski Rapids', 'Laborum eum atque excepturi qui. Quia aut odit eligendi odit minima omnis consectetur. Culpa culpa vero quibusdam numquam distinctio nam numquam. Corrupti ab sint in.', '1971-08-06 21:18:02'),
(17, 'Cielo Thompson', 'danika.satterfield@example.net', 'Perempuan', 1685007352, '78845 Hintz Drives Apt. 727', 'Quas et deserunt et et. Itaque et et quam quia. Ut eos error quia saepe aut. Blanditiis sed aliquam nemo soluta ea reiciendis veritatis.', '1992-11-18 02:17:50'),
(18, 'Jacquelyn Koss', 'alphonso.o\'hara@example.org', 'Laki-laki', 965468, '3789 Senger Shore Apt. 778', 'Ut vel repellat eaque dolore. Et quidem velit eum quibusdam impedit similique. Non veritatis a soluta dolore sit. Quam voluptatem molestiae totam non possimus magnam.', '1982-11-17 05:06:11'),
(19, 'Myrna Goyette III', 'bchristiansen@example.net', 'Laki-laki', 0, '21898 Haag Land Apt. 730', 'Eum quo vero cum rerum. Et qui doloremque corrupti. Doloremque dolorem quia aut atque quia officia.', '1994-06-08 06:35:45'),
(20, 'Prof. Fermin Kshlerin II', 'rrunte@example.com', 'Laki-laki', 1, '1975 Roscoe Branch Suite 518', 'Sunt fuga maxime quo nam. Quo repellat illo impedit porro numquam vel quae illo. Maxime occaecati deserunt eius est. Voluptatibus reprehenderit nostrum aliquam voluptatem eum aliquam.', '1991-11-14 17:38:52'),
(21, 'Josefina Bartell', 'harber.maximillian@example.com', 'Perempuan', 1, '31858 Hagenes Brooks Apt. 098', 'Ab voluptatibus distinctio consequatur et illum. Aperiam ea blanditiis ea. Molestiae sed blanditiis placeat aspernatur. Sint deleniti aliquid omnis sed eum dolores sed.', '1974-09-28 12:30:35'),
(22, 'Florian Rodriguez', 'conroy.darrell@example.org', 'Laki-laki', 0, '94671 Ledner Circles', 'Perspiciatis rerum qui animi. Qui earum aut voluptatum quasi id corrupti. Consequatur voluptas non qui id.', '1996-02-20 00:02:37'),
(23, 'Lacy Emmerich', 'dee.emmerich@example.com', 'Perempuan', 0, '0490 Jordi Keys Apt. 026', 'Qui ratione earum odit vero consectetur reiciendis sequi. Quia dolor dolore est cum. Sint incidunt nihil totam aperiam similique. Occaecati et non molestiae.', '1981-11-17 16:39:33'),
(24, 'Immanuel O\'Conner', 'lynch.beverly@example.com', 'Laki-laki', 41, '32618 Hartmann Island', 'Dolorem cum deleniti cumque vero in tenetur aliquid. Soluta beatae atque numquam quae sint qui et. Molestiae perferendis non molestiae quo.', '1983-07-04 09:22:46'),
(25, 'Hyman VonRueden', 'kbahringer@example.net', 'Laki-laki', 537108, '47833 Roy Falls Apt. 158', 'Molestiae sed quaerat assumenda totam. Quaerat culpa possimus quisquam voluptas harum asperiores. Earum maxime nihil odit voluptate quis. Cupiditate corrupti quisquam ullam fugiat.', '1998-07-31 16:33:13'),
(26, 'Alford Corkery I', 'maybell14@example.com', 'Laki-laki', 0, '913 Emerson Port', 'Qui tempora sapiente ratione vero dolore veritatis. Nemo possimus quam voluptatem ipsum autem earum. Perferendis facere quisquam aut nihil vitae voluptas.', '1976-10-19 18:44:27'),
(27, 'Pietro Buckridge', 'romaguera.kattie@example.net', 'Laki-laki', 331, '34986 Gislason Club Suite 332', 'Veniam nihil nam et atque. Atque eos nostrum quo. Quod quia id non.', '1982-03-02 14:29:43'),
(28, 'Prof. Skylar Stamm Sr.', 'laura75@example.org', 'Perempuan', 189348, '42212 Hallie Freeway Apt. 762', 'Ipsam officia dicta est praesentium sit blanditiis. Quo et rerum quis totam velit numquam dolores. Iusto ea magnam minus deleniti magni et. Dolores aliquam adipisci reiciendis laboriosam aut.', '2016-08-01 05:17:47'),
(29, 'Stuart Flatley', 'larson.janice@example.org', 'Laki-laki', 72956, '43571 O\'Conner Field Apt. 473', 'Velit exercitationem omnis rerum quidem. Autem optio et assumenda aut maxime nulla id. Placeat et molestiae culpa ut.', '1977-04-26 14:53:21'),
(30, 'Ernestine Casper', 'lela.metz@example.net', 'Perempuan', 0, '85060 Wiegand Freeway', 'Rerum et praesentium laborum labore. Qui optio molestiae amet consectetur aliquam sit nam.', '1978-03-13 11:01:49'),
(31, 'Fredrick Raynor', 'wrempel@example.net', 'Perempuan', 0, '13385 Talon Island', 'Odio ex doloremque enim perspiciatis eius occaecati. Aut culpa a fugit repudiandae. Omnis error nulla saepe quia. Officiis iure consectetur nemo sed.', '1975-05-09 16:33:37'),
(32, 'Stella McClure MD', 'abigail.wyman@example.org', 'Perempuan', 4294967295, '91261 Leanna View', 'Qui eos ad non omnis doloremque maxime blanditiis nisi. Necessitatibus ab optio voluptates aut aut accusamus.', '2011-08-24 07:38:32'),
(33, 'Dr. Lily Pacocha V', 'vanessa04@example.com', 'Laki-laki', 1, '20675 Vivien Mall Suite 041', 'Quidem veniam alias reiciendis. Mollitia quos consequatur dignissimos aliquam iure sit optio. Aspernatur vel et dignissimos ullam corrupti ut voluptas.', '1995-11-23 07:34:03'),
(34, 'Edwin Blanda', 'halvorson.chester@example.net', 'Perempuan', 0, '131 Weissnat Club Suite 860', 'Tenetur voluptatem id veniam eius accusantium est cum placeat. Laborum quia est totam earum laboriosam voluptatem. Placeat quo doloribus et autem.', '1978-01-31 21:23:53'),
(35, 'Dr. Parker Grimes IV', 'elwin.kulas@example.net', 'Laki-laki', 1, '635 Cierra Courts', 'Et laboriosam laboriosam dolorum dolorem nostrum ipsum excepturi. Itaque mollitia expedita ad voluptatem et. Eos molestiae enim porro dignissimos enim magni.', '2004-11-17 02:21:25'),
(36, 'Alberto Hartmann', 'maiya15@example.com', 'Perempuan', 362525, '565 Anita Isle Suite 121', 'Ratione quis non eveniet fugit aut molestiae incidunt. Quisquam aut id voluptas voluptas aut. Impedit a animi voluptas nihil quod accusamus dolor nobis. Deleniti est hic laboriosam saepe dignissimos.', '1999-01-31 17:52:05'),
(37, 'Miss Autumn Dicki DVM', 'pagac.myra@example.net', 'Laki-laki', 66227, '0677 Huel Bypass Apt. 379', 'Sed eaque inventore distinctio saepe. Dolores et eligendi a eos eos voluptatem aliquid. Est et molestiae enim odio quod. Asperiores voluptate placeat est.', '2011-11-21 21:00:28'),
(38, 'Oleta O\'Keefe DVM', 'ddooley@example.net', 'Laki-laki', 414, '734 Matilda Mall', 'Exercitationem pariatur doloremque omnis quo ut. Sint labore temporibus aliquid consequuntur sed ut consequuntur eius. Molestiae harum cumque harum deserunt est nostrum officiis non.', '2002-10-10 20:00:52'),
(39, 'Dr. Tony Flatley', 'alyson29@example.com', 'Laki-laki', 234756962, '9050 Reynolds Place Apt. 527', 'Autem aliquid placeat ipsum amet id cum nulla. Sint qui voluptatem est ad non. Libero dolores animi aspernatur commodi. Officia laborum et neque animi.', '1979-09-25 22:43:09'),
(40, 'Garrison McClure', 'schultz.eileen@example.net', 'Laki-laki', 488643, '49291 Elijah Point Suite 071', 'Earum eum facilis ratione voluptatem. Hic rerum voluptatibus perspiciatis pariatur est similique. Odit ipsam incidunt dolorem eum et.', '2004-05-14 15:26:20'),
(41, 'Esta Rath DVM', 'nitzsche.randal@example.net', 'Perempuan', 598735, '706 Wyman Mall', 'Consectetur est molestias eaque minus. Architecto qui a quidem dolorem. Eos facilis quibusdam ipsam debitis.', '1976-05-05 16:37:06'),
(42, 'River Kilback', 'zieme.candace@example.com', 'Laki-laki', 0, '40708 Ruben Lane Suite 838', 'Atque laboriosam est enim architecto reprehenderit ab. Minima ab possimus aut. Distinctio voluptate modi neque mollitia harum.', '2017-11-07 16:17:08'),
(43, 'Claude Boyle', 'ykozey@example.com', 'Perempuan', 1, '6566 O\'Connell Springs', 'Velit aperiam veniam molestias vitae molestias quibusdam. Mollitia nam quo in quia eligendi quisquam est. Iste odio porro eum excepturi.', '2017-05-10 12:12:08'),
(44, 'Daphnee Bergnaum', 'herta66@example.com', 'Laki-laki', 1, '75682 Oberbrunner Avenue', 'Deserunt aut laudantium ipsam voluptatem at error nostrum. Ipsum aperiam laborum consequuntur. Dolorum autem non exercitationem error aliquam. Voluptates voluptas facere et ducimus debitis nesciunt.', '1980-07-10 11:46:13'),
(45, 'Aisha Moen Jr.', 'hayden47@example.com', 'Laki-laki', 12, '9529 Dare Cliff', 'Vero et explicabo nobis suscipit ipsa. Voluptatem veritatis voluptatem corporis voluptatem eum ducimus placeat. Qui libero aut quo dolor ipsam. Sequi aut inventore et temporibus aut amet.', '1995-01-23 22:57:25'),
(46, 'Ramona Spencer', 'rolfson.quentin@example.com', 'Laki-laki', 601, '5824 Graham Mission', 'Architecto consequuntur ea magni quis nihil inventore. Quia ut dolores ea qui fugit. Velit voluptatibus expedita eos enim inventore voluptas explicabo rem.', '2019-07-16 21:27:51'),
(47, 'Kathlyn Aufderhar', 'jones.allison@example.com', 'Laki-laki', 1, '7037 Savannah Drive', 'Rerum earum voluptatibus accusamus modi dolor qui quos. Dolore repellendus beatae delectus voluptatum aspernatur quos et. Voluptas voluptate fugiat eos et. Cum eos deleniti provident aut.', '1974-08-20 12:49:54'),
(48, 'Michael Orn', 'aron.borer@example.com', 'Laki-laki', 263, '731 Reese Brooks', 'Soluta aliquid voluptatem quo labore. Beatae a eum adipisci et.\nIpsa quia voluptates corporis sequi. Ea libero asperiores dicta inventore reprehenderit facere iusto.', '2005-08-04 04:52:07'),
(49, 'Henderson Brown', 'mmann@example.net', 'Laki-laki', 1, '590 Carroll Islands Apt. 281', 'Omnis est nesciunt neque. Veritatis magni voluptates molestiae. Autem voluptatem ab inventore non voluptates et quis.', '1971-08-09 12:01:08'),
(50, 'Fabian Schaefer', 'augustus.quigley@example.com', 'Perempuan', 1, '70978 Osinski Brooks Apt. 570', 'Laudantium maiores nostrum sunt commodi iusto. Aut blanditiis et ipsum ducimus sint doloribus occaecati. Asperiores similique quia nostrum quia quisquam ut in voluptatibus.', '2002-03-25 08:00:06'),
(51, 'Elsie Schumm', 'marc67@example.net', 'Perempuan', 135452, '124 Conner Shoal', 'Odio qui et officiis. Sequi sit beatae omnis et culpa quia. Accusantium est magni eaque ipsam.', '1984-10-15 03:31:42'),
(52, 'Alison Hane V', 'devante77@example.org', 'Laki-laki', 1, '531 Herzog Center Apt. 055', 'Sapiente ullam est dolorum vel. Ab nobis ratione est beatae voluptatem ipsa ipsa. Sint non sed et soluta necessitatibus voluptatibus eius blanditiis.', '2002-11-09 04:07:54'),
(53, 'Rosario Morar', 'diego63@example.com', 'Laki-laki', 0, '5700 Hermann Ville', 'Quis a explicabo aperiam nemo. Consequatur architecto consequatur voluptatem et accusamus amet. Neque sunt est aliquid dicta incidunt quis.', '2014-06-27 17:19:48'),
(54, 'Jacklyn Cremin', 'dach.hans@example.com', 'Laki-laki', 1, '2900 Alberta Villages Apt. 903', 'Ratione nisi et tenetur quia qui repudiandae culpa. Architecto molestiae impedit qui. Nesciunt quia error beatae sequi. Dolore aliquid a et voluptas ipsam a.', '1974-10-07 03:55:22'),
(55, 'Mr. Justyn Gerhold DDS', 'eschaefer@example.com', 'Perempuan', 185, '39347 Jane Street', 'Quia ut porro minus. Animi cumque consequatur quis a occaecati.\nEx minus incidunt eaque ea consequatur. Et porro officiis ipsam. Sit eum quia magnam est et. Quam sed consequatur ut dolorem atque.', '2010-09-19 05:59:45'),
(56, 'Kraig Crooks MD', 'murphy.lloyd@example.com', 'Perempuan', 822, '58280 Harvey Shoals Suite 917', 'Excepturi qui incidunt sint numquam. Facere nihil cumque alias enim. Itaque delectus rerum qui est.', '2010-04-14 20:18:41'),
(57, 'Brianne Dickinson', 'treutel.josefina@example.net', 'Laki-laki', 4294967295, '8961 Jackie Spring', 'Qui sed provident ut alias rem. Beatae ducimus voluptatem autem cum id cum. Pariatur laudantium voluptas quod debitis.', '1972-11-10 06:28:08'),
(58, 'Mr. Melany Baumbach', 'lizeth00@example.net', 'Perempuan', 331, '25267 Weimann Heights', 'Quia numquam maiores dicta nesciunt repellendus. Voluptatum inventore ut consequatur sed et. Quia vero dolorem voluptatem consequuntur. Illo aut dolores quis sed. Nam et beatae et libero ullam.', '1973-10-05 20:44:46'),
(59, 'Eddie Terry', 'leopold.torphy@example.net', 'Perempuan', 37, '47752 Deron Mountain', 'Alias corrupti est voluptatem dolor enim. Omnis dolores voluptas accusamus incidunt assumenda nostrum iste. Dolorum cum autem et molestiae et.', '1993-02-28 11:06:44'),
(60, 'Evie Stehr', 'abbott.kailee@example.com', 'Perempuan', 613150, '567 Sylvester Ports', 'Consectetur laborum aut veritatis et voluptas. Illum non fuga ex sed. Vel pariatur deserunt et. Est tempora quia qui assumenda.', '1984-04-27 13:38:22'),
(61, 'Ephraim Monahan DVM', 'louie77@example.org', 'Laki-laki', 184928, '6417 Konopelski Mill', 'Consequatur nulla qui id et molestiae. Rerum sapiente eum repellendus explicabo eum. Earum veritatis est et ut voluptatum velit enim.', '1999-06-30 11:00:17'),
(62, 'Gerardo Runolfsdottir', 'weissnat.emile@example.com', 'Perempuan', 363, '3796 Marvin Lights', 'Praesentium qui sed temporibus autem esse quos. Est magni non animi delectus qui. Dolores vero iusto non reiciendis nobis. Sed porro accusantium ab.', '1999-12-24 09:42:10'),
(63, 'Madelynn Muller I', 'ted78@example.net', 'Perempuan', 25, '15266 Ashleigh Cove', 'Consequatur nostrum est cum iste autem sint quia. Inventore repudiandae error harum aperiam quis. Assumenda et consequatur debitis sit nisi.', '2014-12-04 22:39:44'),
(64, 'Mr. Roy Grimes Sr.', 'zulauf.bria@example.com', 'Laki-laki', 1, '9943 Purdy Estates Suite 808', 'In excepturi enim sit corporis. Iste aut dignissimos doloribus at voluptatem vero cupiditate fugiat. Minima quo fugiat doloremque maiores est corporis dolore. Nihil iste voluptatum enim fuga nostrum.', '1971-07-20 02:33:40'),
(65, 'Josiah Smitham', 'brendan89@example.com', 'Laki-laki', 0, '3642 Schamberger Extension Suite 586', 'Est aliquid debitis qui optio. Sunt totam doloremque sit error. Sint quae et officiis unde deleniti est aut cum.', '1992-03-02 20:15:24'),
(66, 'Mr. Madisen Stanton', 'bayer.jermey@example.net', 'Perempuan', 0, '12874 Mina Courts', 'Quis corporis doloribus assumenda. Inventore ut omnis est.\nUllam ut occaecati nemo quia minima sunt. Consectetur quod velit inventore. Quo harum maxime mollitia sequi itaque impedit id.', '1999-09-17 06:25:51'),
(67, 'Mary Luettgen', 'al74@example.com', 'Perempuan', 0, '752 Daniela Villages', 'Ullam aliquid eos dolor et rem. Inventore voluptates iure voluptatem est maiores ducimus aliquam. Quo quae voluptas fugit repellat corporis.', '2011-07-07 13:14:03'),
(68, 'Prof. Garnet Hartmann', 'sflatley@example.org', 'Perempuan', 96, '337 Padberg Trace', 'Alias aut dolorem repellat ab. Illum corrupti sed enim distinctio et. Est quia ipsam odio eaque asperiores repellat. Sed est aut earum explicabo.', '1979-08-24 10:23:31'),
(69, 'Abdullah Schowalter', 'fatima.medhurst@example.com', 'Perempuan', 877, '8471 Pollich Cape', 'Quis aut provident quae placeat nihil ut itaque. Autem blanditiis magnam aliquid et harum. Optio numquam nesciunt ut ipsam accusantium blanditiis.', '1997-10-06 19:03:20'),
(70, 'Tamia Lemke', 'zane.botsford@example.com', 'Laki-laki', 1, '3470 Miracle Forge', 'Corporis minima ad vel enim a minima. Autem rerum sit eligendi et voluptatem consequatur numquam.', '1986-02-09 03:55:01'),
(71, 'Deborah Bruen', 'wgoldner@example.org', 'Laki-laki', 666, '19370 Travis Run Suite 571', 'Velit vero odit sint facere. Quos facilis sint accusamus nihil quaerat sed mollitia. Alias dignissimos odio doloremque nulla temporibus et. Ut dolorum atque velit distinctio enim aperiam.', '1994-01-25 07:43:21'),
(72, 'Frankie McLaughlin', 'kay.kuhic@example.org', 'Perempuan', 366401264, '35122 Elmo Islands Suite 879', 'Et saepe fugiat et. Ad totam et quo asperiores excepturi quo repellendus. Facere et veniam id magni.', '1987-05-08 04:17:20'),
(73, 'Prof. Mittie Braun', 'gutmann.chandler@example.org', 'Perempuan', 915, '583 Adolf Crossing Suite 497', 'Et et velit enim vel voluptatem explicabo natus occaecati. Eligendi voluptatibus eligendi et iste. Sequi deleniti maxime expedita incidunt.', '2001-02-11 06:04:03'),
(74, 'Luigi Weimann', 'max.gusikowski@example.net', 'Laki-laki', 506, '12721 Rau Brooks Suite 917', 'Quia repudiandae accusamus commodi magni repellat sunt similique. Doloribus illo qui dolorum dolor.', '1991-05-29 00:40:40'),
(75, 'Minerva Hills DVM', 'utillman@example.org', 'Perempuan', 29, '369 Rosina Islands Apt. 663', 'Ut blanditiis eveniet dolorem qui. Qui totam repellendus esse ratione non. Voluptatem natus tenetur ex quis consequatur. Eos ducimus enim explicabo.', '1979-07-20 04:22:27'),
(76, 'Henderson Rice', 'howell99@example.net', 'Perempuan', 549283, '36439 Lola Row Suite 134', 'Repudiandae praesentium voluptas at. Ab repellat quod itaque consectetur qui culpa delectus. Provident delectus officiis veritatis minus consequatur ex ducimus.', '1972-04-21 09:44:27'),
(77, 'Tressie Gulgowski', 'donato.wuckert@example.net', 'Laki-laki', 76, '745 Milan Shoals Suite 566', 'Voluptatem alias harum dolores porro adipisci voluptas cum. Cum voluptate aut non. Ipsum rem magnam tempora in dolores rerum eius. Rem voluptas quis vel magni.', '2004-09-02 04:04:39'),
(78, 'Camylle Spinka', 'caleigh27@example.com', 'Laki-laki', 0, '6142 Thompson Gardens Apt. 094', 'Facilis corporis nulla adipisci possimus veritatis. Vel ut architecto officia velit aut vero. Ut sit et ut eum. Dolores cupiditate et blanditiis quos et eligendi odit dolorem.', '2012-03-25 01:54:05'),
(79, 'Jaycee Nitzsche', 'rod84@example.com', 'Perempuan', 735, '666 Jacobi Park Suite 817', 'Aut delectus omnis voluptatem sint quasi rem. Autem quibusdam officiis facilis nihil. Minima enim repudiandae suscipit non. Excepturi quasi maiores minus officiis eum cumque rem.', '1970-03-01 08:14:24'),
(80, 'Columbus Kirlin', 'earlene63@example.net', 'Perempuan', 309, '73601 Catalina Dale', 'Eum non voluptas magnam est modi voluptatibus. Velit optio in fugit voluptas eligendi accusantium vero.', '1972-08-09 00:33:47'),
(81, 'Roma Davis', 'tondricka@example.net', 'Laki-laki', 0, '229 Karlee Crest', 'Qui libero omnis magnam. Sint commodi quam nulla aut dolor blanditiis. Sed distinctio sit facilis animi. Eum quis aut sapiente quae saepe.', '1975-12-31 21:16:18'),
(82, 'Helene Hermiston', 'aleuschke@example.com', 'Laki-laki', 236520, '6594 Garett Villages', 'Fugit quia sed aspernatur et odit qui. Aliquam pariatur rerum deserunt. Aut optio culpa esse dolorum velit vitae. Repellat perferendis ut numquam facere provident inventore unde.', '1989-08-14 18:52:32'),
(83, 'Avis Bradtke', 'ulittle@example.com', 'Laki-laki', 0, '6527 Nitzsche Skyway', 'Quisquam earum sed ut est. Sunt ut dolores aliquid sit totam rerum. Aliquid dolor nam deserunt perspiciatis quae a. Ea recusandae explicabo provident blanditiis optio dolorum.', '1989-08-08 12:29:03'),
(84, 'Mr. Toy Zieme', 'payton.kohler@example.net', 'Perempuan', 1, '13080 Josue Neck Suite 824', 'Ipsam accusamus illo omnis dolores deserunt sint alias ut. Voluptas excepturi commodi qui est dicta. Et architecto qui perspiciatis ratione. Nulla quae ea laudantium sequi.', '1997-06-22 02:49:41'),
(85, 'George Veum II', 'huel.trudie@example.net', 'Perempuan', 22, '5969 Marvin Field', 'Qui ipsam eligendi saepe itaque accusantium quis. Molestiae facilis blanditiis sit soluta. Repellat qui consequatur et rem maiores dolores harum.', '2006-03-22 12:19:53'),
(86, 'Miss Marilou Lindgren', 'adrienne10@example.org', 'Laki-laki', 1, '96666 Evert Loop', 'Quia omnis aliquam numquam. Saepe ut et quia. Illum blanditiis impedit deserunt.', '2010-07-27 04:01:26'),
(87, 'Angel Bartell', 'vicenta.toy@example.org', 'Perempuan', 793784, '315 Queenie Port Suite 593', 'Porro alias natus et. Nihil nisi laborum debitis aspernatur sunt explicabo numquam. Totam animi odit dolorem ut aut nesciunt.', '1976-09-23 06:17:33'),
(88, 'Jasen Willms MD', 'harris.philip@example.org', 'Laki-laki', 248689, '33383 Margarett Wells', 'Nam dolorum vero eum voluptates et dolores. Sit nam non blanditiis voluptatem molestias architecto. Aut facilis rerum velit et dolores facilis natus.', '1985-04-11 10:03:12'),
(89, 'Jerod Hermann', 'qnikolaus@example.com', 'Laki-laki', 4294967295, '8596 Rowan Plain', 'Blanditiis placeat nobis aut. Natus sint repellendus dicta est. Explicabo molestias minus beatae aspernatur.', '1982-03-07 17:42:16'),
(90, 'Mr. Llewellyn Swift', 'jerrell.jakubowski@example.com', 'Perempuan', 417052, '511 Lou Stravenue', 'Iure pariatur sint voluptatem qui voluptatem odio. Aliquam eum est est et quibusdam qui minima. Laboriosam voluptatem doloribus illo est ea.', '2007-03-02 01:20:17'),
(91, 'Mr. Michel Moen', 'lveum@example.com', 'Perempuan', 4294967295, '16547 Swift Viaduct', 'Est sequi quasi in sunt qui. Nam qui tenetur eligendi accusamus perspiciatis laborum. Officia est occaecati dolorem.', '1975-08-24 02:22:48'),
(92, 'Chesley Satterfield', 'libbie34@example.net', 'Laki-laki', 146, '9828 Beier Neck Apt. 582', 'Dolores omnis est est culpa eos. Quaerat labore occaecati non. Aut error totam doloribus libero.', '1987-10-01 08:31:58'),
(93, 'Brayan Haley', 'dereck09@example.net', 'Perempuan', 4294967295, '875 Maggie Camp', 'Vero eveniet quod molestiae sapiente dicta. Officia quod necessitatibus impedit laudantium. Accusantium nostrum sit aut incidunt sint dolores tempora.', '1992-07-12 02:57:39'),
(94, 'Amely Balistreri', 'torp.bell@example.com', 'Laki-laki', 0, '15351 Spinka Mission Suite 510', 'Non voluptatibus quis voluptas qui aperiam. Incidunt eos pariatur pariatur ut quam qui id. Aliquid autem voluptatem consequuntur impedit.', '2010-11-27 03:04:35'),
(95, 'Alda Hane', 'sawayn.ellie@example.com', 'Perempuan', 308, '0125 Katherine Unions Suite 945', 'Quod reiciendis iusto quasi. Maxime vero dignissimos est alias ut ut magni est. Qui est officia reiciendis porro veniam. Illo aliquid tenetur sed voluptas.', '1970-03-23 18:06:00'),
(96, 'Chaz Shields', 'gkunde@example.com', 'Perempuan', 1, '3575 Turcotte Village', 'Ab ipsam dolorem distinctio cum ut. Recusandae voluptatem nihil natus ipsum nihil nulla. Aut optio a quo sit cupiditate optio. Harum modi sit est non animi enim.', '1983-04-18 12:54:18'),
(97, 'Adrianna Connelly', 'davon26@example.org', 'Perempuan', 534997, '2360 Duncan Court Apt. 484', 'Et in repudiandae quaerat eum dolores et unde. Quas perferendis illo dolores consequatur. Quis sit harum maxime maxime magni occaecati.', '2008-09-30 14:24:20'),
(98, 'Mr. Ernesto Powlowski', 'tomasa.schultz@example.com', 'Perempuan', 832, '88718 Arch Parkway', 'Beatae quo excepturi pariatur. Doloribus incidunt adipisci et. Aut possimus libero rerum sapiente sit explicabo ea.', '1989-09-25 03:29:23'),
(99, 'Destiny Deckow Jr.', 'jamison45@example.org', 'Perempuan', 1, '0962 Lueilwitz Mews', 'Sint tempora accusamus fuga voluptate. Voluptates doloribus eos voluptatibus excepturi et earum libero. Velit mollitia ducimus quidem facere non sequi. Ea asperiores quibusdam ut aliquam.', '1996-07-11 09:34:11'),
(100, 'Chadrick Sauer', 'keebler.brannon@example.org', 'Perempuan', 4294967295, '4629 Hyatt Ports Apt. 794', 'Temporibus fugiat sed ut accusamus quis. Deserunt dolorum dolorem qui sint facilis. Quasi exercitationem vero rerum. Voluptatem neque nihil ullam ex.', '1999-07-18 23:38:31'),
(102, 'aaaaa', 'a@gmail.com', 'Laki-laki', 12333, 'aa', 'a', '2020-05-09 22:13:01'),
(103, 'a', 'a@gmail.com', 'Laki-laki', 12333, 'a', 'a', '2020-05-09 22:17:17'),
(104, 'a', 'aa@ymal.com', 'Perempuan', 12333, 'xxxxxx', 'zxzzxz', '2020-05-19 13:46:47'),
(105, 'Fajar Islami', 'aa@ymal.com', 'Laki-laki', 123, 'tes', 'bagus', '2020-05-21 17:26:46'),
(106, 'Fajar Islami', 'tjakrabirawa65@gmail.com', 'Laki-laki', 123455, 'tes123', 'bagus', '2020-05-21 17:27:49');

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
(1, 'Kala Pagi 1', 'Semur Daging Spesial', 20000, 'Sarapan', 'images/sarapan1.jpg'),
(2, 'Kala Pagi 2', 'Combo Burger', 12500, 'Sarapan', 'images/sarapan2.jpg'),
(3, 'Kala Haus 1', 'Teh Manis Hangat', 5000, 'Minuman', 'images/minuman1.jpg'),
(4, 'Kala Haus 2', 'Es Segar Rasa Jambu', 7000, 'Minuman', 'images/minuman2.jpg'),
(5, 'Kala Siang 1', 'Potato Beef Sauce', 30000, 'Makan siang', 'images/lunch1.webp'),
(6, 'Kala Siang 2', 'Healthy Diet Beef', 27000, 'Makan siang', 'images/lunch3.jpg'),
(7, 'Kala Malam 1', 'Ini Makan malam 1', 14000, 'Makan malam', 'images/dinner1.jpg'),
(8, 'Makan malam 2', 'Sweet Roasted Beef', 35000, 'Makan malam', 'images/dinner2.jpg'),
(9, 'Kala Haus 3', 'Lemon Tea', 7000, 'Minuman', 'images/minuman3.jpg'),
(10, 'Kala Siang 3', 'Healthy Roasted Beef', 40000, 'Makan siang', 'images/lunch2.jpg'),
(11, 'Makan malam 3', 'Ini Makan malam 3', 150000, 'Makan malam', 'images/dinner3.jpg'),
(12, 'Kala Haus 4', 'Minuman Rasa Nanas Hangat Beraroma Kayu Manis', 7000, 'Minuman', 'images/minuman4.jpg'),
(13, 'Kala Haus 5', 'Jahe Hangat + Lemon', 7000, 'Minuman', 'images/minuman5.jpg'),
(14, 'Kala Haus 6', 'Hot Coffee Simple', 9000, 'Minuman', 'images/minuman6.jpg'),
(15, 'Kala Pagi 3', 'Roasted Beef with Potato', 40000, 'Sarapan', 'images/sarapan3.jpg'),
(16, 'Kala Haus 7', 'Hot Chocolate', 9000, 'Minuman', 'images/minuman7.jpg'),
(17, 'Kala Haus 8', 'Choco Ice Creamy', 11000, 'Minuman', 'images/minuman8.jpg'),
(18, 'Kala Haus 9', 'Dalgona Coffee', 15000, 'Minuman', 'images/minuman9.jpg'),
(19, 'Kala Siang 4', 'Extra Healthy Beef with Eggs', 50000, 'Makan siang', 'images/lunch4.jpg'),
(20, 'Kala Pagi 4', 'Daging Sapi Teriyaki', 40000, 'Sarapan', 'images/sarapan4.jpg'),
(21, 'Kala Pagi 5', 'Soto Daging Manis', 25000, 'Sarapan', 'images/sarapan5.jpg'),
(22, 'Kala Pagi 6', 'Big Beef Rolade', 28000, 'Sarapan', 'images/sarapan6.jfif'),
(23, 'Kala Malam 3', 'Fix and Mix Your Beef', 35000, 'Makan malam', 'images/dinner4.jpg'),
(24, 'Kala Siang 5', 'Smoothy Tacos Healthy Beef', 30000, 'Makan siang', 'images/lunch51.jpg'),
(25, 'Kala Siang 6', 'Combo Rolade', 28000, 'Makan siang', 'images/lunch6.jpg'),
(26, 'Kala Siang 7', 'Rolade Saus Tiram', 25000, 'Makan siang', 'images/lunch7.jpg'),
(27, 'Kala Pagi 7', 'Rolade Rendang', 30000, 'Sarapan', 'images/sarapan7.jpg'),
(28, 'Kala Pagi 7', 'Kebab Hitam Tortilla', 30000, 'Sarapan', 'images/sarapan8.jpg'),
(29, 'Kala Malam 5', 'Korean Barbeque', 60000, 'Makan malam', 'images/dinner5.jpg'),
(30, 'Kala Malam 6', 'Gyu Katsu Nikaido', 50000, 'Makan malam', 'images/dinner6.jpg');

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
(1, 'Ahmad Fajar Islami', 'Web Programmer', 'facebook.com', 'instagram.com', 'mail.google.com/mail/?view=cm&fs=1&to=ahmadfajarislami@protonmail.com', 'images/staf1.jpg'),
(2, 'Adnan', 'Web Designer', 'www.facebook.com/adnanelah', 'instagram.com/adnandoang?igshid=9pmiq7cwqhfh', 'gmail.com', 'images/staf2.jpg'),
(3, 'Mayang Pusfitasari', 'Web Dokumen', 'www.facebook.com/mayangpsf', 'instagram.com/mayangpsf?igshid=dt7logyhyohp', 'mail.google.com/mail/?view=cm&fs=1&to=mayangpsfitas13@gmail.com', 'images/staf3.jpg');

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
(18, 9, 100, 10, 100, 10, 20000, 4, 'tes8'),
(19, 13, 10, 50, 10, 50, 1200, 50000, 'tes8'),
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
(1, 1590080400);

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
  `tanggal_pesan` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `setuju_id_admin` varchar(100) NOT NULL,
  `waktu_setuju` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`kode_transaksi`, `id_waktu_reservasi`, `waktu_reservasi`, `jumlah_meja2`, `biaya_meja2`, `jumlah_meja4`, `biaya_meja4`, `total_biaya`, `nama_pelanggan`, `email`, `no_telp`, `alamat`, `tanggal_pesan`, `status`, `setuju_id_admin`, `waktu_setuju`) VALUES
('TR-LM-200310-M1-0001', '26', 'Malam (20:45 - 21:45)', 10, 500000, 0, 0, 500000, 'sa', 'a@gmail.com', 12333, 'aa', '2020-03-10 14:17:19', 1, 'tes8', '2020-03-10 14:18:49'),
('TR-LM-200410-M1-0002', '26', 'Malam (20:45 - 21:45)', 2, 100000, 0, 0, 100000, 'sa', 'tjakrabirawa65@gmail.com', 12333, '2', '2020-04-10 14:17:30', 1, 'tes8', '2020-04-10 14:18:54'),
('TR-LM-200510-M1-0001', '26', 'Malam (20:45 - 21:45)', 9, 450000, 0, 0, 450000, 'aaaaa', 'a@gmail.com', 2, 'aa', '2020-05-10 14:20:10', 1, 'tes8', '2020-05-10 14:21:21'),
('TR-LM-200510-SR1-0001', '25', 'Sore (15:00 - 16:00)', 3, 3000, 0, 0, 3000, 'aaaaa', 'aa@ymal.com', 15, 'aa', '2020-05-10 14:17:50', 1, 'tes8', '2020-05-10 14:18:58'),
('TR-LM-200510-SR1-0002', '25', 'Sore (15:00 - 16:00)', 0, 0, 13, 13000, 13000, 'aaaaa', 'tjakrabirawa65@gmail.com', 12333, 'aa', '2020-05-10 14:20:21', 1, 'tes8', '2020-05-10 14:21:25'),
('TR-LM-200510-SR1-0004', '25', 'Sore (15:00 - 16:00)', 15, 15000, 0, 0, 15000, 'qwert', 'fajar@gmail.com', 12333, 'x', '2020-05-10 13:52:47', 1, 'tes8', '2020-05-10 13:53:04'),
('TR-LM-200511-M1-0001', '26', 'Malam (20:45 - 21:45)', 9, 450000, 0, 0, 450000, 'aaaaa', 'aa@ymal.com', 2, 'a', '2020-05-11 16:40:45', 1, 'tes8', '2020-05-11 16:40:55'),
('TR-LM-200517-M1-0001', '26', 'Malam (20:45 - 21:45)', 12, 600000, 0, 0, 600000, 'aaaaa', 'a@gmail.com', 12333, 'aa', '2020-05-17 15:09:00', 1, 'tes8', '2020-05-17 15:09:15'),
('TR-LM-200517-M1-0002', '26', 'Malam (20:45 - 21:45)', 14, 700000, 0, 0, 700000, 'a', 'aa@ymal.com', 1, 'a', '2020-05-17 15:10:00', 1, 'tes8', '2020-05-17 15:10:45'),
('TR-LM-200517-M1-0003', '26', 'Malam (20:45 - 21:45)', 0, 0, 9, 180000, 180000, 'q', 'a@gmail.com', 12333, 'a', '2020-05-17 15:10:18', 1, 'tes8', '2020-05-17 15:10:39'),
('TR-LM-200517-M3-0001', '18', 'Malam (23:26 - 23:59)', 7, 28, 0, 0, 28, 'aaaaa', 'a@gmail.com', 12333, 'aa', '2020-05-17 13:52:06', 1, 'tes8', '2020-05-17 13:53:11'),
('TR-LM-200519-M1-0001', '26', 'Malam (20:45 - 21:45)', 1, 50000, 0, 0, 50000, 'aaaaa', 'tjakrabirawa65@gmail.com', 1, 'aa', '2020-05-19 18:14:07', 1, 'tes8', '2020-05-19 18:17:46'),
('TR-LM-200519-M3-0001', '18', 'Malam (23:26 - 23:59)', 0, 0, 9, 180000, 180000, 'aaaaa', 'tjakrabirawa65@gmail.com', 12333, 'aa', '2020-05-19 18:06:17', 1, 'tes8', '2020-05-19 18:11:49'),
('TR-LM-200519-Sore-0001', '27', 'Sore (17:34 - 18:34)', 2, 200000, 0, 0, 200000, 'aaaaa', 'a@gmail.com', 1, 'aa', '2020-05-19 16:35:40', 1, 'tes8', '2020-05-19 16:43:48'),
('TR-LM-200521-Sore-0001', '28', 'Sore (17:34 - 18:34)', 0, 0, 1, 20000, 20000, 'aaaaa', 'tjakrabirawa65@gmail.com', 12333, 'a', '2020-05-21 15:06:49', 1, 'tes8', '2020-05-21 15:11:49');

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
  `token` int(10) UNSIGNED NOT NULL,
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
(9, 'Siang', 43200, 46800, 'S1', 'tes8'),
(10, 'Sore', 54000, 57600, 'SR1', 'tes8'),
(11, 'Malam', 74700, 78300, 'M1', 'tes8'),
(13, 'Malam', 84360, 86340, 'M3', 'tes8'),
(14, 'Malam', 86100, 86280, 'M4', 'tes8'),
(21, 'Sore', 61200, 65040, 'SR2', 'tes8');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `email` (`email`);

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
-- Indexes for table `app_email`
--
ALTER TABLE `app_email`
  ADD PRIMARY KEY (`id_email`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

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
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `email` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `app_email`
--
ALTER TABLE `app_email`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_galeri`
--
ALTER TABLE `app_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `app_masukan`
--
ALTER TABLE `app_masukan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tbl_meja`
--
ALTER TABLE `tbl_meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
