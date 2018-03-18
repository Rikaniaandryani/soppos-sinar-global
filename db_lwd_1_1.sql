-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Jun 2017 pada 01.03
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lwd_1_1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_article`
--

CREATE TABLE `lwd_article` (
  `article_id` int(11) NOT NULL,
  `article_cat_id` int(11) NOT NULL,
  `article_tag` varchar(100) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_title_en` varchar(255) NOT NULL,
  `article_review` text NOT NULL,
  `article_review_en` text NOT NULL,
  `article_desc` text NOT NULL,
  `article_desc_en` text NOT NULL,
  `article_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `article_pub` enum('88','99') NOT NULL DEFAULT '88',
  `article_image` varchar(255) NOT NULL,
  `article_alt` varchar(255) NOT NULL,
  `article_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_article_cat`
--

CREATE TABLE `lwd_article_cat` (
  `article_cat_id` int(11) NOT NULL,
  `article_cat_name` varchar(255) NOT NULL,
  `article_cat_name_en` varchar(255) NOT NULL,
  `article_cat_pub` enum('88','99') NOT NULL DEFAULT '88'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_article_cat`
--

INSERT INTO `lwd_article_cat` (`article_cat_id`, `article_cat_name`, `article_cat_name_en`, `article_cat_pub`) VALUES
(2, 'Android', '', '99');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_bank`
--

CREATE TABLE `lwd_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_account` varchar(255) NOT NULL,
  `bank_no` varchar(100) NOT NULL,
  `bank_pub` enum('88','99') NOT NULL DEFAULT '88',
  `bank_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_banner`
--

CREATE TABLE `lwd_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_type` enum('banner','slide') NOT NULL DEFAULT 'slide',
  `banner_link` varchar(255) NOT NULL,
  `banner_alt` varchar(255) NOT NULL,
  `banner_pub` enum('88','99') NOT NULL DEFAULT '88',
  `banner_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_banner`
--

INSERT INTO `lwd_banner` (`banner_id`, `banner_type`, `banner_link`, `banner_alt`, `banner_pub`, `banner_image`) VALUES
(1, 'banner', '#', '#', '99', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_brand`
--

CREATE TABLE `lwd_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_link` varchar(255) NOT NULL,
  `brand_pub` enum('88','99') NOT NULL DEFAULT '88'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_brand`
--

INSERT INTO `lwd_brand` (`brand_id`, `brand_name`, `brand_link`, `brand_pub`) VALUES
(4, 'Samsung', 'samsung', '88');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_category`
--

CREATE TABLE `lwd_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_name_en` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_desc_en` text NOT NULL,
  `category_alt` varchar(255) NOT NULL,
  `category_seq` int(11) NOT NULL COMMENT 'sequence / urutan',
  `category_pub` enum('88','99') NOT NULL DEFAULT '88' COMMENT '99 = publis',
  `category_image` varchar(255) NOT NULL,
  `category_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_category`
--

INSERT INTO `lwd_category` (`category_id`, `category_name`, `category_name_en`, `category_desc`, `category_desc_en`, `category_alt`, `category_seq`, `category_pub`, `category_image`, `category_link`) VALUES
(4, 'Womens', '', '', '', '', 0, '88', '', 'womens');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_catinfo`
--

CREATE TABLE `lwd_catinfo` (
  `catinfo_id` int(11) NOT NULL,
  `catinfo_name` varchar(255) NOT NULL,
  `catinfo_pub` enum('88','99') NOT NULL DEFAULT '88' COMMENT '99 = publis'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_catinfo`
--

INSERT INTO `lwd_catinfo` (`catinfo_id`, `catinfo_name`, `catinfo_pub`) VALUES
(1, 'about', '99'),
(2, 'term and condition', '99'),
(3, 'faq', '99'),
(4, 'how to buy', '99');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_city`
--

CREATE TABLE `lwd_city` (
  `city_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_city`
--

INSERT INTO `lwd_city` (`city_id`, `province_id`, `city_name`) VALUES
(1, 21, 'Kabupaten Aceh Barat'),
(2, 21, 'Kabupaten Aceh Barat Daya'),
(3, 21, 'Kabupaten Aceh Besar'),
(4, 21, 'Kabupaten Aceh Jaya'),
(5, 21, 'Kabupaten Aceh Selatan'),
(6, 21, 'Kabupaten Aceh Singkil'),
(7, 21, 'Kabupaten Aceh Tamiang'),
(8, 21, 'Kabupaten Aceh Tengah'),
(9, 21, 'Kabupaten Aceh Tenggara'),
(10, 21, 'Kabupaten Aceh Timur'),
(11, 21, 'Kabupaten Aceh Utara'),
(12, 32, 'Kabupaten Agam'),
(13, 23, 'Kabupaten Alor'),
(14, 19, 'Kota Ambon'),
(15, 34, 'Kabupaten Asahan'),
(16, 24, 'Kabupaten Asmat'),
(17, 1, 'Kabupaten Badung'),
(18, 13, 'Kabupaten Balangan'),
(19, 15, 'Kota Balikpapan'),
(20, 21, 'Kota Banda Aceh'),
(21, 18, 'Kota Bandar Lampung'),
(22, 9, 'Kabupaten Bandung'),
(23, 9, 'Kota Bandung'),
(24, 9, 'Kabupaten Bandung Barat'),
(25, 29, 'Kabupaten Banggai'),
(26, 29, 'Kabupaten Banggai Kepulauan'),
(27, 2, 'Kabupaten Bangka'),
(28, 2, 'Kabupaten Bangka Barat'),
(29, 2, 'Kabupaten Bangka Selatan'),
(30, 2, 'Kabupaten Bangka Tengah'),
(31, 11, 'Kabupaten Bangkalan'),
(32, 1, 'Kabupaten Bangli'),
(33, 13, 'Kabupaten Banjar'),
(34, 9, 'Kota Banjar'),
(35, 13, 'Kota Banjarbaru'),
(36, 13, 'Kota Banjarmasin'),
(37, 10, 'Kabupaten Banjarnegara'),
(38, 28, 'Kabupaten Bantaeng'),
(39, 5, 'Kabupaten Bantul'),
(40, 33, 'Kabupaten Banyuasin'),
(41, 10, 'Kabupaten Banyumas'),
(42, 11, 'Kabupaten Banyuwangi'),
(43, 13, 'Kabupaten Barito Kuala'),
(44, 14, 'Kabupaten Barito Selatan'),
(45, 14, 'Kabupaten Barito Timur'),
(46, 14, 'Kabupaten Barito Utara'),
(47, 28, 'Kabupaten Barru'),
(48, 17, 'Kota Batam'),
(49, 10, 'Kabupaten Batang'),
(50, 8, 'Kabupaten Batang Hari'),
(51, 11, 'Kota Batu'),
(52, 34, 'Kabupaten Batu Bara'),
(53, 30, 'Kota Bau-Bau'),
(54, 9, 'Kabupaten Bekasi'),
(55, 9, 'Kota Bekasi'),
(56, 2, 'Kabupaten Belitung'),
(57, 2, 'Kabupaten Belitung Timur'),
(58, 23, 'Kabupaten Belu'),
(59, 21, 'Kabupaten Bener Meriah'),
(60, 26, 'Kabupaten Bengkalis'),
(61, 12, 'Kabupaten Bengkayang'),
(62, 4, 'Kota Bengkulu'),
(63, 4, 'Kabupaten Bengkulu Selatan'),
(64, 4, 'Kabupaten Bengkulu Tengah'),
(65, 4, 'Kabupaten Bengkulu Utara'),
(66, 15, 'Kabupaten Berau'),
(67, 24, 'Kabupaten Biak Numfor'),
(68, 22, 'Kabupaten Bima'),
(69, 22, 'Kota Bima'),
(70, 34, 'Kota Binjai'),
(71, 17, 'Kabupaten Bintan'),
(72, 21, 'Kabupaten Bireuen'),
(73, 31, 'Kota Bitung'),
(74, 11, 'Kabupaten Blitar'),
(75, 11, 'Kota Blitar'),
(76, 10, 'Kabupaten Blora'),
(77, 7, 'Kabupaten Boalemo'),
(78, 9, 'Kabupaten Bogor'),
(79, 9, 'Kota Bogor'),
(80, 11, 'Kabupaten Bojonegoro'),
(81, 31, 'Kabupaten Bolaang Mongondow (Bolmong)'),
(82, 31, 'Kabupaten Bolaang Mongondow Selatan'),
(83, 31, 'Kabupaten Bolaang Mongondow Timur'),
(84, 31, 'Kabupaten Bolaang Mongondow Utara'),
(85, 30, 'Kabupaten Bombana'),
(86, 11, 'Kabupaten Bondowoso'),
(87, 28, 'Kabupaten Bone'),
(88, 7, 'Kabupaten Bone Bolango'),
(89, 15, 'Kota Bontang'),
(90, 24, 'Kabupaten Boven Digoel'),
(91, 10, 'Kabupaten Boyolali'),
(92, 10, 'Kabupaten Brebes'),
(93, 32, 'Kota Bukittinggi'),
(94, 1, 'Kabupaten Buleleng'),
(95, 28, 'Kabupaten Bulukumba'),
(96, 16, 'Kabupaten Bulungan (Bulongan)'),
(97, 8, 'Kabupaten Bungo'),
(98, 29, 'Kabupaten Buol'),
(99, 19, 'Kabupaten Buru'),
(100, 19, 'Kabupaten Buru Selatan'),
(101, 30, 'Kabupaten Buton'),
(102, 30, 'Kabupaten Buton Utara'),
(103, 9, 'Kabupaten Ciamis'),
(104, 9, 'Kabupaten Cianjur'),
(105, 10, 'Kabupaten Cilacap'),
(106, 3, 'Kota Cilegon'),
(107, 9, 'Kota Cimahi'),
(108, 9, 'Kabupaten Cirebon'),
(109, 9, 'Kota Cirebon'),
(110, 34, 'Kabupaten Dairi'),
(111, 24, 'Kabupaten Deiyai (Deliyai)'),
(112, 34, 'Kabupaten Deli Serdang'),
(113, 10, 'Kabupaten Demak'),
(114, 1, 'Kota Denpasar'),
(115, 9, 'Kota Depok'),
(116, 32, 'Kabupaten Dharmasraya'),
(117, 24, 'Kabupaten Dogiyai'),
(118, 22, 'Kabupaten Dompu'),
(119, 29, 'Kabupaten Donggala'),
(120, 26, 'Kota Dumai'),
(121, 33, 'Kabupaten Empat Lawang'),
(122, 23, 'Kabupaten Ende'),
(123, 28, 'Kabupaten Enrekang'),
(124, 25, 'Kabupaten Fakfak'),
(125, 23, 'Kabupaten Flores Timur'),
(126, 9, 'Kabupaten Garut'),
(127, 21, 'Kabupaten Gayo Lues'),
(128, 1, 'Kabupaten Gianyar'),
(129, 7, 'Kabupaten Gorontalo'),
(130, 7, 'Kota Gorontalo'),
(131, 7, 'Kabupaten Gorontalo Utara'),
(132, 28, 'Kabupaten Gowa'),
(133, 11, 'Kabupaten Gresik'),
(134, 10, 'Kabupaten Grobogan'),
(135, 5, 'Kabupaten Gunung Kidul'),
(136, 14, 'Kabupaten Gunung Mas'),
(137, 34, 'Kota Gunungsitoli'),
(138, 20, 'Kabupaten Halmahera Barat'),
(139, 20, 'Kabupaten Halmahera Selatan'),
(140, 20, 'Kabupaten Halmahera Tengah'),
(141, 20, 'Kabupaten Halmahera Timur'),
(142, 20, 'Kabupaten Halmahera Utara'),
(143, 13, 'Kabupaten Hulu Sungai Selatan'),
(144, 13, 'Kabupaten Hulu Sungai Tengah'),
(145, 13, 'Kabupaten Hulu Sungai Utara'),
(146, 34, 'Kabupaten Humbang Hasundutan'),
(147, 26, 'Kabupaten Indragiri Hilir'),
(148, 26, 'Kabupaten Indragiri Hulu'),
(149, 9, 'Kabupaten Indramayu'),
(150, 24, 'Kabupaten Intan Jaya'),
(151, 6, 'Kota Jakarta Barat'),
(152, 6, 'Kota Jakarta Pusat'),
(153, 6, 'Kota Jakarta Selatan'),
(154, 6, 'Kota Jakarta Timur'),
(155, 6, 'Kota Jakarta Utara'),
(156, 8, 'Kota Jambi'),
(157, 24, 'Kabupaten Jayapura'),
(158, 24, 'Kota Jayapura'),
(159, 24, 'Kabupaten Jayawijaya'),
(160, 11, 'Kabupaten Jember'),
(161, 1, 'Kabupaten Jembrana'),
(162, 28, 'Kabupaten Jeneponto'),
(163, 10, 'Kabupaten Jepara'),
(164, 11, 'Kabupaten Jombang'),
(165, 25, 'Kabupaten Kaimana'),
(166, 26, 'Kabupaten Kampar'),
(167, 14, 'Kabupaten Kapuas'),
(168, 12, 'Kabupaten Kapuas Hulu'),
(169, 10, 'Kabupaten Karanganyar'),
(170, 1, 'Kabupaten Karangasem'),
(171, 9, 'Kabupaten Karawang'),
(172, 17, 'Kabupaten Karimun'),
(173, 34, 'Kabupaten Karo'),
(174, 14, 'Kabupaten Katingan'),
(175, 4, 'Kabupaten Kaur'),
(176, 12, 'Kabupaten Kayong Utara'),
(177, 10, 'Kabupaten Kebumen'),
(178, 11, 'Kabupaten Kediri'),
(179, 11, 'Kota Kediri'),
(180, 24, 'Kabupaten Keerom'),
(181, 10, 'Kabupaten Kendal'),
(182, 30, 'Kota Kendari'),
(183, 4, 'Kabupaten Kepahiang'),
(184, 17, 'Kabupaten Kepulauan Anambas'),
(185, 19, 'Kabupaten Kepulauan Aru'),
(186, 32, 'Kabupaten Kepulauan Mentawai'),
(187, 26, 'Kabupaten Kepulauan Meranti'),
(188, 31, 'Kabupaten Kepulauan Sangihe'),
(189, 6, 'Kabupaten Kepulauan Seribu'),
(190, 31, 'Kabupaten Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(191, 20, 'Kabupaten Kepulauan Sula'),
(192, 31, 'Kabupaten Kepulauan Talaud'),
(193, 24, 'Kabupaten Kepulauan Yapen (Yapen Waropen)'),
(194, 8, 'Kabupaten Kerinci'),
(195, 12, 'Kabupaten Ketapang'),
(196, 10, 'Kabupaten Klaten'),
(197, 1, 'Kabupaten Klungkung'),
(198, 30, 'Kabupaten Kolaka'),
(199, 30, 'Kabupaten Kolaka Utara'),
(200, 30, 'Kabupaten Konawe'),
(201, 30, 'Kabupaten Konawe Selatan'),
(202, 30, 'Kabupaten Konawe Utara'),
(203, 13, 'Kabupaten Kotabaru'),
(204, 31, 'Kota Kotamobagu'),
(205, 14, 'Kabupaten Kotawaringin Barat'),
(206, 14, 'Kabupaten Kotawaringin Timur'),
(207, 26, 'Kabupaten Kuantan Singingi'),
(208, 12, 'Kabupaten Kubu Raya'),
(209, 10, 'Kabupaten Kudus'),
(210, 5, 'Kabupaten Kulon Progo'),
(211, 9, 'Kabupaten Kuningan'),
(212, 23, 'Kabupaten Kupang'),
(213, 23, 'Kota Kupang'),
(214, 15, 'Kabupaten Kutai Barat'),
(215, 15, 'Kabupaten Kutai Kartanegara'),
(216, 15, 'Kabupaten Kutai Timur'),
(217, 34, 'Kabupaten Labuhan Batu'),
(218, 34, 'Kabupaten Labuhan Batu Selatan'),
(219, 34, 'Kabupaten Labuhan Batu Utara'),
(220, 33, 'Kabupaten Lahat'),
(221, 14, 'Kabupaten Lamandau'),
(222, 11, 'Kabupaten Lamongan'),
(223, 18, 'Kabupaten Lampung Barat'),
(224, 18, 'Kabupaten Lampung Selatan'),
(225, 18, 'Kabupaten Lampung Tengah'),
(226, 18, 'Kabupaten Lampung Timur'),
(227, 18, 'Kabupaten Lampung Utara'),
(228, 12, 'Kabupaten Landak'),
(229, 34, 'Kabupaten Langkat'),
(230, 21, 'Kota Langsa'),
(231, 24, 'Kabupaten Lanny Jaya'),
(232, 3, 'Kabupaten Lebak'),
(233, 4, 'Kabupaten Lebong'),
(234, 23, 'Kabupaten Lembata'),
(235, 21, 'Kota Lhokseumawe'),
(236, 32, 'Kabupaten Lima Puluh Koto/Kota'),
(237, 17, 'Kabupaten Lingga'),
(238, 22, 'Kabupaten Lombok Barat'),
(239, 22, 'Kabupaten Lombok Tengah'),
(240, 22, 'Kabupaten Lombok Timur'),
(241, 22, 'Kabupaten Lombok Utara'),
(242, 33, 'Kota Lubuk Linggau'),
(243, 11, 'Kabupaten Lumajang'),
(244, 28, 'Kabupaten Luwu'),
(245, 28, 'Kabupaten Luwu Timur'),
(246, 28, 'Kabupaten Luwu Utara'),
(247, 11, 'Kabupaten Madiun'),
(248, 11, 'Kota Madiun'),
(249, 10, 'Kabupaten Magelang'),
(250, 10, 'Kota Magelang'),
(251, 11, 'Kabupaten Magetan'),
(252, 9, 'Kabupaten Majalengka'),
(253, 27, 'Kabupaten Majene'),
(254, 28, 'Kota Makassar'),
(255, 11, 'Kabupaten Malang'),
(256, 11, 'Kota Malang'),
(257, 16, 'Kabupaten Malinau'),
(258, 19, 'Kabupaten Maluku Barat Daya'),
(259, 19, 'Kabupaten Maluku Tengah'),
(260, 19, 'Kabupaten Maluku Tenggara'),
(261, 19, 'Kabupaten Maluku Tenggara Barat'),
(262, 27, 'Kabupaten Mamasa'),
(263, 24, 'Kabupaten Mamberamo Raya'),
(264, 24, 'Kabupaten Mamberamo Tengah'),
(265, 27, 'Kabupaten Mamuju'),
(266, 27, 'Kabupaten Mamuju Utara'),
(267, 31, 'Kota Manado'),
(268, 34, 'Kabupaten Mandailing Natal'),
(269, 23, 'Kabupaten Manggarai'),
(270, 23, 'Kabupaten Manggarai Barat'),
(271, 23, 'Kabupaten Manggarai Timur'),
(272, 25, 'Kabupaten Manokwari'),
(273, 25, 'Kabupaten Manokwari Selatan'),
(274, 24, 'Kabupaten Mappi'),
(275, 28, 'Kabupaten Maros'),
(276, 22, 'Kota Mataram'),
(277, 25, 'Kabupaten Maybrat'),
(278, 34, 'Kota Medan'),
(279, 12, 'Kabupaten Melawi'),
(280, 8, 'Kabupaten Merangin'),
(281, 24, 'Kabupaten Merauke'),
(282, 18, 'Kabupaten Mesuji'),
(283, 18, 'Kota Metro'),
(284, 24, 'Kabupaten Mimika'),
(285, 31, 'Kabupaten Minahasa'),
(286, 31, 'Kabupaten Minahasa Selatan'),
(287, 31, 'Kabupaten Minahasa Tenggara'),
(288, 31, 'Kabupaten Minahasa Utara'),
(289, 11, 'Kabupaten Mojokerto'),
(290, 11, 'Kota Mojokerto'),
(291, 29, 'Kabupaten Morowali'),
(292, 33, 'Kabupaten Muara Enim'),
(293, 8, 'Kabupaten Muaro Jambi'),
(294, 4, 'Kabupaten Muko Muko'),
(295, 30, 'Kabupaten Muna'),
(296, 14, 'Kabupaten Murung Raya'),
(297, 33, 'Kabupaten Musi Banyuasin'),
(298, 33, 'Kabupaten Musi Rawas'),
(299, 24, 'Kabupaten Nabire'),
(300, 21, 'Kabupaten Nagan Raya'),
(301, 23, 'Kabupaten Nagekeo'),
(302, 17, 'Kabupaten Natuna'),
(303, 24, 'Kabupaten Nduga'),
(304, 23, 'Kabupaten Ngada'),
(305, 11, 'Kabupaten Nganjuk'),
(306, 11, 'Kabupaten Ngawi'),
(307, 34, 'Kabupaten Nias'),
(308, 34, 'Kabupaten Nias Barat'),
(309, 34, 'Kabupaten Nias Selatan'),
(310, 34, 'Kabupaten Nias Utara'),
(311, 16, 'Kabupaten Nunukan'),
(312, 33, 'Kabupaten Ogan Ilir'),
(313, 33, 'Kabupaten Ogan Komering Ilir'),
(314, 33, 'Kabupaten Ogan Komering Ulu'),
(315, 33, 'Kabupaten Ogan Komering Ulu Selatan'),
(316, 33, 'Kabupaten Ogan Komering Ulu Timur'),
(317, 11, 'Kabupaten Pacitan'),
(318, 32, 'Kota Padang'),
(319, 34, 'Kabupaten Padang Lawas'),
(320, 34, 'Kabupaten Padang Lawas Utara'),
(321, 32, 'Kota Padang Panjang'),
(322, 32, 'Kabupaten Padang Pariaman'),
(323, 34, 'Kota Padang Sidempuan'),
(324, 33, 'Kota Pagar Alam'),
(325, 34, 'Kabupaten Pakpak Bharat'),
(326, 14, 'Kota Palangka Raya'),
(327, 33, 'Kota Palembang'),
(328, 28, 'Kota Palopo'),
(329, 29, 'Kota Palu'),
(330, 11, 'Kabupaten Pamekasan'),
(331, 3, 'Kabupaten Pandeglang'),
(332, 9, 'Kabupaten Pangandaran'),
(333, 28, 'Kabupaten Pangkajene Kepulauan'),
(334, 2, 'Kota Pangkal Pinang'),
(335, 24, 'Kabupaten Paniai'),
(336, 28, 'Kota Parepare'),
(337, 32, 'Kota Pariaman'),
(338, 29, 'Kabupaten Parigi Moutong'),
(339, 32, 'Kabupaten Pasaman'),
(340, 32, 'Kabupaten Pasaman Barat'),
(341, 15, 'Kabupaten Paser'),
(342, 11, 'Kabupaten Pasuruan'),
(343, 11, 'Kota Pasuruan'),
(344, 10, 'Kabupaten Pati'),
(345, 32, 'Kota Payakumbuh'),
(346, 25, 'Kabupaten Pegunungan Arfak'),
(347, 24, 'Kabupaten Pegunungan Bintang'),
(348, 10, 'Kabupaten Pekalongan'),
(349, 10, 'Kota Pekalongan'),
(350, 26, 'Kota Pekanbaru'),
(351, 26, 'Kabupaten Pelalawan'),
(352, 10, 'Kabupaten Pemalang'),
(353, 34, 'Kota Pematang Siantar'),
(354, 15, 'Kabupaten Penajam Paser Utara'),
(355, 18, 'Kabupaten Pesawaran'),
(356, 18, 'Kabupaten Pesisir Barat'),
(357, 32, 'Kabupaten Pesisir Selatan'),
(358, 21, 'Kabupaten Pidie'),
(359, 21, 'Kabupaten Pidie Jaya'),
(360, 28, 'Kabupaten Pinrang'),
(361, 7, 'Kabupaten Pohuwato'),
(362, 27, 'Kabupaten Polewali Mandar'),
(363, 11, 'Kabupaten Ponorogo'),
(364, 12, 'Kabupaten Pontianak'),
(365, 12, 'Kota Pontianak'),
(366, 29, 'Kabupaten Poso'),
(367, 33, 'Kota Prabumulih'),
(368, 18, 'Kabupaten Pringsewu'),
(369, 11, 'Kabupaten Probolinggo'),
(370, 11, 'Kota Probolinggo'),
(371, 14, 'Kabupaten Pulang Pisau'),
(372, 20, 'Kabupaten Pulau Morotai'),
(373, 24, 'Kabupaten Puncak'),
(374, 24, 'Kabupaten Puncak Jaya'),
(375, 10, 'Kabupaten Purbalingga'),
(376, 9, 'Kabupaten Purwakarta'),
(377, 10, 'Kabupaten Purworejo'),
(378, 25, 'Kabupaten Raja Ampat'),
(379, 4, 'Kabupaten Rejang Lebong'),
(380, 10, 'Kabupaten Rembang'),
(381, 26, 'Kabupaten Rokan Hilir'),
(382, 26, 'Kabupaten Rokan Hulu'),
(383, 23, 'Kabupaten Rote Ndao'),
(384, 21, 'Kota Sabang'),
(385, 23, 'Kabupaten Sabu Raijua'),
(386, 10, 'Kota Salatiga'),
(387, 15, 'Kota Samarinda'),
(388, 12, 'Kabupaten Sambas'),
(389, 34, 'Kabupaten Samosir'),
(390, 11, 'Kabupaten Sampang'),
(391, 12, 'Kabupaten Sanggau'),
(392, 24, 'Kabupaten Sarmi'),
(393, 8, 'Kabupaten Sarolangun'),
(394, 32, 'Kota Sawah Lunto'),
(395, 12, 'Kabupaten Sekadau'),
(396, 28, 'Kabupaten Selayar (Kepulauan Selayar)'),
(397, 4, 'Kabupaten Seluma'),
(398, 10, 'Kabupaten Semarang'),
(399, 10, 'Kota Semarang'),
(400, 19, 'Kabupaten Seram Bagian Barat'),
(401, 19, 'Kabupaten Seram Bagian Timur'),
(402, 3, 'Kabupaten Serang'),
(403, 3, 'Kota Serang'),
(404, 34, 'Kabupaten Serdang Bedagai'),
(405, 14, 'Kabupaten Seruyan'),
(406, 26, 'Kabupaten Siak'),
(407, 34, 'Kota Sibolga'),
(408, 28, 'Kabupaten Sidenreng Rappang/Rapang'),
(409, 11, 'Kabupaten Sidoarjo'),
(410, 29, 'Kabupaten Sigi'),
(411, 32, 'Kabupaten Sijunjung (Sawah Lunto Sijunjung)'),
(412, 23, 'Kabupaten Sikka'),
(413, 34, 'Kabupaten Simalungun'),
(414, 21, 'Kabupaten Simeulue'),
(415, 12, 'Kota Singkawang'),
(416, 28, 'Kabupaten Sinjai'),
(417, 12, 'Kabupaten Sintang'),
(418, 11, 'Kabupaten Situbondo'),
(419, 5, 'Kabupaten Sleman'),
(420, 32, 'Kabupaten Solok'),
(421, 32, 'Kota Solok'),
(422, 32, 'Kabupaten Solok Selatan'),
(423, 28, 'Kabupaten Soppeng'),
(424, 25, 'Kabupaten Sorong'),
(425, 25, 'Kota Sorong'),
(426, 25, 'Kabupaten Sorong Selatan'),
(427, 10, 'Kabupaten Sragen'),
(428, 9, 'Kabupaten Subang'),
(429, 21, 'Kota Subulussalam'),
(430, 9, 'Kabupaten Sukabumi'),
(431, 9, 'Kota Sukabumi'),
(432, 14, 'Kabupaten Sukamara'),
(433, 10, 'Kabupaten Sukoharjo'),
(434, 23, 'Kabupaten Sumba Barat'),
(435, 23, 'Kabupaten Sumba Barat Daya'),
(436, 23, 'Kabupaten Sumba Tengah'),
(437, 23, 'Kabupaten Sumba Timur'),
(438, 22, 'Kabupaten Sumbawa'),
(439, 22, 'Kabupaten Sumbawa Barat'),
(440, 9, 'Kabupaten Sumedang'),
(441, 11, 'Kabupaten Sumenep'),
(442, 8, 'Kota Sungaipenuh'),
(443, 24, 'Kabupaten Supiori'),
(444, 11, 'Kota Surabaya'),
(445, 10, 'Kota Surakarta (Solo)'),
(446, 13, 'Kabupaten Tabalong'),
(447, 1, 'Kabupaten Tabanan'),
(448, 28, 'Kabupaten Takalar'),
(449, 25, 'Kabupaten Tambrauw'),
(450, 16, 'Kabupaten Tana Tidung'),
(451, 28, 'Kabupaten Tana Toraja'),
(452, 13, 'Kabupaten Tanah Bumbu'),
(453, 32, 'Kabupaten Tanah Datar'),
(454, 13, 'Kabupaten Tanah Laut'),
(455, 3, 'Kabupaten Tangerang'),
(456, 3, 'Kota Tangerang'),
(457, 3, 'Kota Tangerang Selatan'),
(458, 18, 'Kabupaten Tanggamus'),
(459, 34, 'Kota Tanjung Balai'),
(460, 8, 'Kabupaten Tanjung Jabung Barat'),
(461, 8, 'Kabupaten Tanjung Jabung Timur'),
(462, 17, 'Kota Tanjung Pinang'),
(463, 34, 'Kabupaten Tapanuli Selatan'),
(464, 34, 'Kabupaten Tapanuli Tengah'),
(465, 34, 'Kabupaten Tapanuli Utara'),
(466, 13, 'Kabupaten Tapin'),
(467, 16, 'Kota Tarakan'),
(468, 9, 'Kabupaten Tasikmalaya'),
(469, 9, 'Kota Tasikmalaya'),
(470, 34, 'Kota Tebing Tinggi'),
(471, 8, 'Kabupaten Tebo'),
(472, 10, 'Kabupaten Tegal'),
(473, 10, 'Kota Tegal'),
(474, 25, 'Kabupaten Teluk Bintuni'),
(475, 25, 'Kabupaten Teluk Wondama'),
(476, 10, 'Kabupaten Temanggung'),
(477, 20, 'Kota Ternate'),
(478, 20, 'Kota Tidore Kepulauan'),
(479, 23, 'Kabupaten Timor Tengah Selatan'),
(480, 23, 'Kabupaten Timor Tengah Utara'),
(481, 34, 'Kabupaten Toba Samosir'),
(482, 29, 'Kabupaten Tojo Una-Una'),
(483, 29, 'Kabupaten Toli-Toli'),
(484, 24, 'Kabupaten Tolikara'),
(485, 31, 'Kota Tomohon'),
(486, 28, 'Kabupaten Toraja Utara'),
(487, 11, 'Kabupaten Trenggalek'),
(488, 19, 'Kota Tual'),
(489, 11, 'Kabupaten Tuban'),
(490, 18, 'Kabupaten Tulang Bawang'),
(491, 18, 'Kabupaten Tulang Bawang Barat'),
(492, 11, 'Kabupaten Tulungagung'),
(493, 28, 'Kabupaten Wajo'),
(494, 30, 'Kabupaten Wakatobi'),
(495, 24, 'Kabupaten Waropen'),
(496, 18, 'Kabupaten Way Kanan'),
(497, 10, 'Kabupaten Wonogiri'),
(498, 10, 'Kabupaten Wonosobo'),
(499, 24, 'Kabupaten Yahukimo'),
(500, 24, 'Kabupaten Yalimo'),
(501, 5, 'Kota Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_contact`
--

CREATE TABLE `lwd_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_fax` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_address` text NOT NULL,
  `contact_maps` text NOT NULL,
  `contact_fb` varchar(255) NOT NULL,
  `contact_tw` varchar(255) NOT NULL,
  `contact_ig` varchar(255) NOT NULL,
  `contact_in` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_contact`
--

INSERT INTO `lwd_contact` (`contact_id`, `contact_phone`, `contact_fax`, `contact_email`, `contact_address`, `contact_maps`, `contact_fb`, `contact_tw`, `contact_ig`, `contact_in`) VALUES
(1, '0215554478', '02154745896', 'example@mail.com', 'Address', 'Maps', 'fb', 'tw', 'ig', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_image`
--

CREATE TABLE `lwd_image` (
  `image_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `image_parent_name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_seq` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_image`
--

INSERT INTO `lwd_image` (`image_id`, `parent_id`, `image_parent_name`, `image_name`, `image_seq`) VALUES
(1, 1, 'about', 'names-7528.png', 0),
(2, 1, 'logo', 'logo-a-2736.png', 0),
(3, 1, 'favicon', 'fav-a-9275.png', 0),
(9, 4, 'category', 'women-1836.jpg', 0),
(13, 4, 'brand', 'samsung-3701.jpg', 0),
(14, 1, 'product', '-121.jpg', 0),
(15, 1, 'product', '', 1),
(16, 1, 'product', '', 2),
(17, 1, 'product', '', 3),
(18, 1, 'product', '', 4),
(19, 1, 'product', '', 5),
(20, 1, 'slide', '-2837.jpg', 0),
(21, 1, 'banner', '-4647.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_info`
--

CREATE TABLE `lwd_info` (
  `info_id` int(11) NOT NULL,
  `catinfo_id` int(11) NOT NULL,
  `info_name` varchar(255) NOT NULL,
  `info_name_en` varchar(255) NOT NULL,
  `info_desc` text NOT NULL,
  `info_desc_en` text NOT NULL,
  `info_pub` enum('88','99') NOT NULL DEFAULT '88' COMMENT '99 = publish',
  `info_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_info`
--

INSERT INTO `lwd_info` (`info_id`, `catinfo_id`, `info_name`, `info_name_en`, `info_desc`, `info_desc_en`, `info_pub`, `info_image`) VALUES
(1, 1, 'About small description for home page', '', '<p>About full description for about page</p>\r\n', '', '88', 'name-4567.png'),
(3, 2, 'Title', '', '<p>Description</p>\r\n', '', '99', ''),
(5, 3, 'Questions', '', 'Answer', '', '99', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_member`
--

CREATE TABLE `lwd_member` (
  `member_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `reason_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_phone` varchar(255) NOT NULL,
  `member_address` text NOT NULL,
  `member_postcode` varchar(10) NOT NULL,
  `member_password` varchar(255) NOT NULL,
  `member_status` enum('verified','unverified') NOT NULL DEFAULT 'unverified',
  `member_block` enum('active','block') NOT NULL DEFAULT 'active',
  `member_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_order`
--

CREATE TABLE `lwd_order` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_price` decimal(10,0) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_subtotal` decimal(10,0) NOT NULL,
  `order_weight` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_payment`
--

CREATE TABLE `lwd_payment` (
  `payment_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `payment_account` varchar(255) NOT NULL,
  `payment_no` varchar(100) NOT NULL,
  `payment_bank` varchar(100) NOT NULL,
  `payment_total` decimal(10,0) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_confirm_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` enum('88','99') NOT NULL DEFAULT '88'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_product`
--

CREATE TABLE `lwd_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `statusprd_id` varchar(50) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_name_en` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_desc_en` text NOT NULL,
  `product_alt` varchar(255) NOT NULL COMMENT 'alt untuk gambar',
  `product_price` decimal(10,0) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_price_strip` decimal(10,0) NOT NULL,
  `product_weight` float NOT NULL,
  `product_dimension` varchar(50) NOT NULL,
  `product_pub` enum('88','99') NOT NULL COMMENT '99 = publish',
  `product_seq` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `product_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_product`
--

INSERT INTO `lwd_product` (`product_id`, `category_id`, `subcat_id`, `brand_id`, `statusprd_id`, `product_code`, `product_name`, `product_name_en`, `product_desc`, `product_desc_en`, `product_alt`, `product_price`, `product_stock`, `product_price_strip`, `product_weight`, `product_dimension`, `product_pub`, `product_seq`, `product_image`, `product_link`) VALUES
(1, 4, 0, 4, '1,2', 'ac342', 'Axers', '', '<p>tes</p>\r\n', '', 'Axers', '1200000', 3, '1100000', 1, '10, 15, 15', '99', 0, '', 'axers');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_province`
--

CREATE TABLE `lwd_province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_province`
--

INSERT INTO `lwd_province` (`province_id`, `province_name`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_reason`
--

CREATE TABLE `lwd_reason` (
  `reason_id` int(11) NOT NULL,
  `reason_name` varchar(255) NOT NULL,
  `reason_name_en` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_seo`
--

CREATE TABLE `lwd_seo` (
  `seo_id` int(11) NOT NULL,
  `seo_page` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keyword` text NOT NULL,
  `seo_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_shipment`
--

CREATE TABLE `lwd_shipment` (
  `shipment_id` int(11) NOT NULL,
  `shipment_name` varchar(255) NOT NULL,
  `shipment_web` text NOT NULL,
  `shipment_pub` enum('88','99') NOT NULL DEFAULT '88',
  `shipment_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_site`
--

CREATE TABLE `lwd_site` (
  `site_id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_desc` text NOT NULL,
  `site_keyword` text NOT NULL,
  `site_favicon` varchar(255) NOT NULL,
  `site_logo` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_site`
--

INSERT INTO `lwd_site` (`site_id`, `site_name`, `site_title`, `site_desc`, `site_keyword`, `site_favicon`, `site_logo`, `site_email`) VALUES
(1, 'Lawave Design', 'Lawave Design', 'Lawave Design', 'Lawave Design', '', '', 'info@lawavedesign.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_statusprd`
--

CREATE TABLE `lwd_statusprd` (
  `statusprd_id` int(11) NOT NULL,
  `statusprd_name` varchar(255) NOT NULL COMMENT 'status produk (best seller, sale dll)',
  `statusprd_name_en` varchar(255) NOT NULL,
  `statusprd_pub` enum('88','99') NOT NULL COMMENT '99 = publish'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_subcat`
--

CREATE TABLE `lwd_subcat` (
  `subcat_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcat_name` varchar(255) NOT NULL,
  `subcat_name_en` varchar(255) NOT NULL,
  `subcat_desc` text NOT NULL,
  `subcat_desc_en` text NOT NULL,
  `subcat_alt` varchar(255) NOT NULL,
  `subcat_seq` int(11) NOT NULL,
  `subcat_pub` enum('88','99') NOT NULL,
  `subcat_image` varchar(255) NOT NULL,
  `subcat_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_tag`
--

CREATE TABLE `lwd_tag` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `tag_name_en` varchar(255) NOT NULL,
  `tag_pub` enum('88','99') NOT NULL DEFAULT '88',
  `tag_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_tag`
--

INSERT INTO `lwd_tag` (`tag_id`, `tag_name`, `tag_name_en`, `tag_pub`, `tag_link`) VALUES
(1, 'Android', '', '99', 'android'),
(2, 'Ekonomi', '', '88', 'ekonomi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_transaction`
--

CREATE TABLE `lwd_transaction` (
  `transaction_id` int(11) NOT NULL,
  `order_no` varchar(100) NOT NULL,
  `member_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `trans_status_id` int(11) NOT NULL,
  `transaction_cancel` enum('99','88') NOT NULL DEFAULT '88',
  `transaction_hide` enum('99','88') NOT NULL DEFAULT '88',
  `transaction_no` varchar(100) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_name` varchar(255) NOT NULL,
  `transaction_email` varchar(255) NOT NULL,
  `transaction_phone` varchar(255) NOT NULL,
  `transaction_address` text NOT NULL,
  `transaction_shipping` varchar(255) NOT NULL,
  `transaction_shipping_cost` decimal(10,0) NOT NULL,
  `transaction_cost` decimal(10,0) NOT NULL,
  `transaction_weight` int(11) NOT NULL,
  `transaction_total` decimal(10,0) NOT NULL,
  `transaction_shipping_date` date NOT NULL,
  `transaction_shipping_no` varchar(255) NOT NULL,
  `transaction_note` text NOT NULL,
  `transaction_receive_note` text NOT NULL,
  `transaction_receive_date` date NOT NULL,
  `transaction_close_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_transaction_item`
--

CREATE TABLE `lwd_transaction_item` (
  `transaction_item_id` int(11) NOT NULL,
  `order_no` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `transaction_item_price` decimal(10,0) NOT NULL,
  `transaction_item_qty` int(11) NOT NULL,
  `transaction_item_subtotal` decimal(10,0) NOT NULL,
  `transaction_item_weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_trans_status`
--

CREATE TABLE `lwd_trans_status` (
  `trans_status_id` int(11) NOT NULL,
  `trans_status_name` varchar(100) NOT NULL,
  `trans_status_name_en` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lwd_user`
--

CREATE TABLE `lwd_user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_level` enum('owner','admin','user') NOT NULL DEFAULT 'owner',
  `user_status` enum('active','block') NOT NULL DEFAULT 'active',
  `user_image` varchar(255) NOT NULL,
  `user_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lwd_user`
--

INSERT INTO `lwd_user` (`user_id`, `user_username`, `user_password`, `user_name`, `user_email`, `user_level`, `user_status`, `user_image`, `user_session`) VALUES
(2, 'syarifsyabana', 'e6980d3379562a6b464ada71870793acb0d6b629', 'Syarif Syabana', 'muhamadsyarif8@gmail.com', 'owner', 'active', '', '8e736e30d55c0275683a9c4a37f9d19836307cdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lwd_article`
--
ALTER TABLE `lwd_article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `article_cat_id` (`article_cat_id`),
  ADD KEY `article_id_2` (`article_id`);

--
-- Indexes for table `lwd_article_cat`
--
ALTER TABLE `lwd_article_cat`
  ADD PRIMARY KEY (`article_cat_id`),
  ADD KEY `article_cat_id` (`article_cat_id`);

--
-- Indexes for table `lwd_bank`
--
ALTER TABLE `lwd_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `lwd_banner`
--
ALTER TABLE `lwd_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `lwd_brand`
--
ALTER TABLE `lwd_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `lwd_category`
--
ALTER TABLE `lwd_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `lwd_catinfo`
--
ALTER TABLE `lwd_catinfo`
  ADD PRIMARY KEY (`catinfo_id`);

--
-- Indexes for table `lwd_city`
--
ALTER TABLE `lwd_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `lwd_contact`
--
ALTER TABLE `lwd_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `lwd_image`
--
ALTER TABLE `lwd_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `lwd_info`
--
ALTER TABLE `lwd_info`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `lwd_member`
--
ALTER TABLE `lwd_member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `reason_id` (`reason_id`);

--
-- Indexes for table `lwd_order`
--
ALTER TABLE `lwd_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `lwd_payment`
--
ALTER TABLE `lwd_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `lwd_product`
--
ALTER TABLE `lwd_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `lwd_province`
--
ALTER TABLE `lwd_province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `lwd_reason`
--
ALTER TABLE `lwd_reason`
  ADD PRIMARY KEY (`reason_id`);

--
-- Indexes for table `lwd_seo`
--
ALTER TABLE `lwd_seo`
  ADD PRIMARY KEY (`seo_id`);

--
-- Indexes for table `lwd_shipment`
--
ALTER TABLE `lwd_shipment`
  ADD PRIMARY KEY (`shipment_id`);

--
-- Indexes for table `lwd_site`
--
ALTER TABLE `lwd_site`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `lwd_statusprd`
--
ALTER TABLE `lwd_statusprd`
  ADD PRIMARY KEY (`statusprd_id`);

--
-- Indexes for table `lwd_subcat`
--
ALTER TABLE `lwd_subcat`
  ADD PRIMARY KEY (`subcat_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `category_id_2` (`category_id`);

--
-- Indexes for table `lwd_tag`
--
ALTER TABLE `lwd_tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `lwd_transaction`
--
ALTER TABLE `lwd_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `trans_status_id` (`trans_status_id`);

--
-- Indexes for table `lwd_transaction_item`
--
ALTER TABLE `lwd_transaction_item`
  ADD PRIMARY KEY (`transaction_item_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `lwd_trans_status`
--
ALTER TABLE `lwd_trans_status`
  ADD PRIMARY KEY (`trans_status_id`);

--
-- Indexes for table `lwd_user`
--
ALTER TABLE `lwd_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lwd_article`
--
ALTER TABLE `lwd_article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_article_cat`
--
ALTER TABLE `lwd_article_cat`
  MODIFY `article_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lwd_bank`
--
ALTER TABLE `lwd_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_banner`
--
ALTER TABLE `lwd_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lwd_brand`
--
ALTER TABLE `lwd_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lwd_category`
--
ALTER TABLE `lwd_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lwd_catinfo`
--
ALTER TABLE `lwd_catinfo`
  MODIFY `catinfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lwd_city`
--
ALTER TABLE `lwd_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;
--
-- AUTO_INCREMENT for table `lwd_contact`
--
ALTER TABLE `lwd_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lwd_image`
--
ALTER TABLE `lwd_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `lwd_info`
--
ALTER TABLE `lwd_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lwd_member`
--
ALTER TABLE `lwd_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_order`
--
ALTER TABLE `lwd_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_payment`
--
ALTER TABLE `lwd_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_product`
--
ALTER TABLE `lwd_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lwd_province`
--
ALTER TABLE `lwd_province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `lwd_reason`
--
ALTER TABLE `lwd_reason`
  MODIFY `reason_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_seo`
--
ALTER TABLE `lwd_seo`
  MODIFY `seo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_shipment`
--
ALTER TABLE `lwd_shipment`
  MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_statusprd`
--
ALTER TABLE `lwd_statusprd`
  MODIFY `statusprd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_subcat`
--
ALTER TABLE `lwd_subcat`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_tag`
--
ALTER TABLE `lwd_tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lwd_transaction`
--
ALTER TABLE `lwd_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_transaction_item`
--
ALTER TABLE `lwd_transaction_item`
  MODIFY `transaction_item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_trans_status`
--
ALTER TABLE `lwd_trans_status`
  MODIFY `trans_status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lwd_user`
--
ALTER TABLE `lwd_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
