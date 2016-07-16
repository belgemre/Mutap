-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Tem 2016, 17:34:27
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `mutap`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arabayaatilan`
--

CREATE TABLE IF NOT EXISTS `arabayaatilan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarih` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `saat` varchar(255) COLLATE utf8_bin NOT NULL,
  `arac_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `servis_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=296 ;

--
-- Tablo döküm verisi `arabayaatilan`
--

INSERT INTO `arabayaatilan` (`id`, `tarih`, `saat`, `arac_id`, `urun_id`, `adet`, `servis_id`) VALUES
(2, '24.01.2016', '16:25', 2, 22, 50, 1),
(3, '24.01.2016', '16:25', 2, 23, 25, 1),
(4, '24.01.2016', '16:26', 2, 24, 250, 1),
(5, '24.01.2016', '16:26', 2, 25, 100, 1),
(6, '24.01.2016', '16:26', 2, 26, 100, 1),
(7, '24.01.2016', '16:26', 2, 33, 30, 1),
(8, '24.01.2016', '17:27', 1, 23, 500, 1),
(9, '24.01.2016', '18:48', 1, 22, 600, 1),
(10, '24.01.2016', '18:48', 1, 24, 500, 1),
(11, '24.01.2016', '18:48', 1, 25, 1500, 1),
(12, '24.01.2016', '18:48', 1, 26, 1000, 1),
(13, '24.01.2016', '18:48', 1, 33, 100, 1),
(39, '30.01.2016', '23:55', 1, 22, 50, 1),
(40, '30.01.2016', '23:56', 1, 23, 50, 1),
(41, '30.01.2016', '23:56', 1, 24, 300, 1),
(42, '30.01.2016', '23:56', 1, 25, 50, 1),
(43, '30.01.2016', '23:56', 1, 26, 30, 1),
(51, '31.01.2016', '00:45', 1, 24, 1000, 1),
(54, '31.01.2016', '01:14', 1, 23, 500, 1),
(55, '31.01.2016', '01:14', 1, 25, 300, 1),
(56, '31.01.2016', '01:14', 1, 26, 10, 1),
(57, '31.01.2016', '01:14', 1, 33, 25, 1),
(58, '31.01.2016', '17:11', 1, 22, 100, 2),
(59, '31.01.2016', '17:12', 1, 23, 500, 2),
(60, '31.01.2016', '17:12', 1, 24, 700, 2),
(62, '31.01.2016', '17:15', 1, 22, 150, 1),
(81, '02.02.2016', '17:22', 1, 33, 850, 1),
(82, '02.02.2016', '17:30', 1, 22, 1050, 1),
(83, '03.02.2016', '17:11', 2, 22, 50, 1),
(84, '03.02.2016', '17:12', 2, 23, 150, 1),
(85, '03.02.2016', '17:12', 2, 24, 500, 1),
(86, '03.02.2016', '17:12', 2, 25, 650, 1),
(87, '03.02.2016', '17:12', 2, 26, 750, 1),
(88, '03.02.2016', '17:12', 2, 33, 850, 1),
(89, '03.02.2016', '19:16', 1, 22, 500, 2),
(90, '03.02.2016', '19:16', 1, 23, 500, 2),
(91, '03.02.2016', '19:16', 1, 24, 500, 2),
(92, '03.02.2016', '19:16', 1, 25, 500, 2),
(93, '03.02.2016', '19:16', 1, 26, 500, 2),
(94, '03.02.2016', '19:16', 1, 33, 500, 2),
(95, '03.02.2016', '20:31', 1, 22, 550, 1),
(96, '03.02.2016', '20:31', 1, 23, 750, 1),
(97, '03.02.2016', '20:32', 1, 25, 850, 1),
(98, '05.02.2016', '16:29', 2, 22, 740, 1),
(99, '05.02.2016', '16:29', 2, 23, 640, 1),
(100, '05.02.2016', '16:30', 1, 22, 740, 2),
(101, '05.02.2016', '16:31', 1, 23, 540, 2),
(102, '05.02.2016', '18:09', 2, 25, 750, 1),
(103, '05.02.2016', '19:45', 2, 24, 15, 1),
(104, '06.02.2016', '14:09', 1, 22, 550, 1),
(105, '06.02.2016', '14:09', 1, 23, 750, 1),
(106, '06.02.2016', '14:09', 1, 24, 850, 1),
(107, '06.02.2016', '14:09', 1, 25, 580, 1),
(108, '06.02.2016', '14:09', 1, 26, 110, 1),
(109, '06.02.2016', '14:09', 1, 33, 100, 1),
(111, '06.02.2016', '14:10', 2, 23, 1000, 1),
(112, '06.02.2016', '14:10', 2, 24, 750, 1),
(113, '06.02.2016', '14:10', 2, 25, 580, 1),
(114, '06.02.2016', '14:10', 2, 26, 1100, 1),
(115, '06.02.2016', '14:10', 2, 33, 111, 1),
(116, '07.02.2016', '00:03', 2, 22, 120, 1),
(117, '07.02.2016', '00:03', 2, 23, 100, 1),
(118, '07.02.2016', '00:03', 2, 24, 100, 1),
(119, '07.02.2016', '00:03', 2, 25, 100, 1),
(120, '07.02.2016', '00:03', 2, 26, 100, 1),
(121, '07.02.2016', '00:03', 2, 33, 500, 1),
(122, '07.02.2016', '16:15', 2, 22, 100, 2),
(123, '07.02.2016', '16:15', 2, 23, 100, 2),
(124, '07.02.2016', '16:15', 2, 24, 100, 2),
(125, '07.02.2016', '16:36', 1, 22, 33, 3),
(126, '07.02.2016', '16:36', 1, 23, 33, 3),
(127, '07.02.2016', '16:36', 1, 24, 33, 3),
(128, '07.02.2016', '18:27', 1, 22, 250, 1),
(129, '07.02.2016', '18:28', 1, 23, 250, 1),
(130, '07.02.2016', '18:28', 1, 24, 550, 1),
(131, '07.02.2016', '18:28', 1, 25, 500, 1),
(132, '07.02.2016', '18:28', 1, 26, 750, 1),
(133, '07.02.2016', '18:28', 1, 33, 12, 1),
(134, '10.02.2016', '11:38', 2, 22, 500, 1),
(135, '10.02.2016', '11:39', 2, 23, 233, 1),
(136, '10.02.2016', '11:39', 2, 24, 133, 1),
(137, '10.02.2016', '11:39', 2, 25, 321, 1),
(138, '10.02.2016', '11:39', 2, 26, 232, 1),
(139, '10.02.2016', '11:39', 2, 33, 112, 1),
(140, '10.02.2016', '11:47', 1, 33, 550, 1),
(141, '11.02.2016', '09:40', 2, 22, 150, 1),
(142, '11.02.2016', '09:40', 2, 24, 500, 1),
(143, '11.02.2016', '10:06', 1, 22, 122, 1),
(144, '11.02.2016', '10:06', 1, 23, 111, 1),
(145, '11.02.2016', '10:06', 1, 24, 112, 1),
(146, '11.02.2016', '10:06', 1, 25, 211, 1),
(147, '11.02.2016', '10:07', 1, 26, 222, 1),
(148, '11.02.2016', '10:07', 1, 33, 221, 1),
(149, '11.02.2016', '10:10', 1, 22, 111, 2),
(150, '11.02.2016', '10:10', 1, 23, 112, 2),
(151, '11.02.2016', '10:10', 1, 24, 121, 2),
(152, '11.02.2016', '10:10', 1, 25, 122, 2),
(153, '11.02.2016', '10:11', 1, 26, 222, 2),
(154, '11.02.2016', '10:11', 1, 33, 221, 2),
(155, '11.02.2016', '10:11', 1, 22, 111, 3),
(156, '11.02.2016', '10:11', 1, 23, 212, 3),
(157, '11.02.2016', '10:11', 1, 24, 111, 3),
(158, '11.02.2016', '10:11', 1, 25, 112, 3),
(159, '11.02.2016', '10:11', 1, 26, 222, 3),
(160, '11.02.2016', '10:12', 1, 33, 221, 3),
(161, '12.02.2016', '20:56', 2, 22, 150, 1),
(162, '12.02.2016', '20:56', 2, 23, 180, 1),
(163, '12.02.2016', '20:56', 2, 24, 250, 1),
(164, '12.02.2016', '20:56', 2, 25, 50, 1),
(165, '12.02.2016', '20:56', 2, 26, 175, 1),
(166, '12.02.2016', '20:56', 2, 33, 75, 1),
(167, '14.02.2016', '11:05', 2, 22, 500, 1),
(168, '14.02.2016', '11:06', 2, 23, 450, 1),
(169, '14.02.2016', '11:06', 2, 24, 750, 1),
(170, '14.02.2016', '11:06', 2, 25, 222, 1),
(171, '14.02.2016', '11:06', 2, 26, 111, 1),
(172, '14.02.2016', '11:06', 2, 33, 110, 1),
(174, '18.02.2016', '10:51', 2, 23, 122, 1),
(175, '18.02.2016', '10:51', 2, 24, 111, 1),
(176, '18.02.2016', '10:51', 2, 25, 111, 1),
(177, '18.02.2016', '10:52', 2, 26, 113, 1),
(178, '18.02.2016', '10:52', 2, 33, 112, 1),
(179, '18.02.2016', '14:25', 2, 22, 750, 1),
(180, '20.02.2016', '16:03', 2, 22, 125, 4),
(181, '20.02.2016', '19:36', 1, 22, 250, 1),
(182, '20.02.2016', '19:36', 1, 23, 100, 1),
(183, '20.02.2016', '19:36', 1, 24, 100, 1),
(184, '20.02.2016', '19:36', 1, 25, 250, 1),
(185, '20.02.2016', '19:36', 1, 26, 250, 1),
(186, '20.02.2016', '19:36', 1, 33, 50, 1),
(187, '11.03.2016', '15:50', 2, 22, 150, 1),
(188, '11.03.2016', '15:50', 2, 23, 250, 1),
(189, '11.03.2016', '15:50', 2, 24, 550, 1),
(191, '11.03.2016', '15:50', 2, 26, 750, 1),
(192, '11.03.2016', '15:50', 2, 33, 100, 1),
(193, '11.03.2016', '15:50', 2, 25, 300, 1),
(194, '17.03.2016', '15:49', 2, 22, 100, 1),
(195, '17.03.2016', '15:49', 2, 23, 500, 1),
(196, '17.03.2016', '15:49', 2, 24, 750, 1),
(197, '17.03.2016', '15:49', 2, 25, 500, 1),
(198, '17.03.2016', '15:49', 2, 26, 1000, 1),
(199, '17.03.2016', '15:49', 2, 33, 500, 1),
(200, '19.03.2016', '14:10', 2, 22, 250, 1),
(201, '19.03.2016', '14:10', 2, 23, 500, 1),
(202, '19.03.2016', '14:10', 2, 24, 750, 1),
(203, '19.03.2016', '14:11', 2, 25, 850, 1),
(204, '19.03.2016', '14:11', 2, 26, 950, 1),
(205, '19.03.2016', '14:11', 2, 33, 50, 1),
(206, '20.03.2016', '13:36', 2, 22, 250, 1),
(207, '20.03.2016', '13:36', 2, 23, 150, 1),
(208, '20.03.2016', '13:36', 2, 24, 100, 1),
(209, '20.03.2016', '13:36', 2, 25, 150, 1),
(210, '20.03.2016', '13:36', 2, 26, 100, 1),
(211, '20.03.2016', '13:36', 2, 33, 50, 1),
(213, '20.03.2016', '19:43', 1, 22, 450, 1),
(215, '20.03.2016', '19:54', 1, 33, 800, 1),
(216, '20.03.2016', '19:55', 1, 24, 750, 1),
(217, '20.03.2016', '20:28', 1, 26, 200, 1),
(218, '20.03.2016', '23:16', 1, 22, 100, 2),
(219, '21.03.2016', '11:37', 1, 22, 750, 1),
(220, '21.03.2016', '11:41', 2, 23, 100, 1),
(221, '22.03.2016', '16:24', 2, 22, 250, 1),
(222, '22.03.2016', '18:03', 1, 22, 100, 1),
(223, '22.03.2016', '18:03', 1, 23, 150, 1),
(224, '22.03.2016', '18:27', 2, 24, 500, 2),
(225, '30.04.2016', '14:38', 2, 22, 225, 1),
(226, '30.04.2016', '14:38', 2, 23, 100, 1),
(228, '02.05.2016', '10:43', 1, 22, 30, 1),
(229, '02.05.2016', '10:43', 1, 24, 175, 1),
(230, '02.05.2016', '10:43', 1, 25, 30, 1),
(231, '02.05.2016', '10:43', 1, 26, 30, 1),
(232, '02.05.2016', '10:44', 1, 33, 10, 1),
(233, '02.05.2016', '10:44', 1, 23, 20, 1),
(234, '02.05.2016', '10:55', 2, 22, 10, 1),
(235, '02.05.2016', '10:55', 2, 23, 10, 1),
(236, '02.05.2016', '10:55', 2, 24, 200, 1),
(237, '16.05.2016', '18:31', 1, 22, 10, 1),
(238, '16.05.2016', '18:31', 1, 23, 10, 1),
(239, '16.05.2016', '18:32', 1, 24, 180, 1),
(240, '16.05.2016', '18:32', 1, 25, 30, 1),
(241, '16.05.2016', '18:32', 1, 26, 30, 1),
(242, '16.05.2016', '18:32', 1, 33, 2, 1),
(243, '07.06.2016', '13:25', 1, 22, 225, 1),
(244, '08.06.2016', '17:42', 2, 22, 225, 3),
(245, '08.06.2016', '18:16', 1, 22, 10, 2),
(246, '08.06.2016', '18:16', 1, 23, 10, 2),
(247, '08.06.2016', '18:16', 1, 24, 180, 2),
(248, '08.06.2016', '18:16', 1, 25, 30, 2),
(249, '08.06.2016', '18:16', 1, 26, 25, 2),
(250, '08.06.2016', '18:16', 1, 33, 10, 2),
(251, '09.06.2016', '10:49', 1, 22, 10, 1),
(252, '09.06.2016', '10:49', 1, 23, 10, 1),
(253, '09.06.2016', '10:49', 1, 24, 170, 1),
(254, '09.06.2016', '10:49', 1, 25, 30, 1),
(255, '09.06.2016', '10:49', 1, 26, 25, 1),
(256, '09.06.2016', '10:50', 1, 33, 2, 1),
(257, '09.06.2016', '12:53', 2, 23, 8, 1),
(258, '09.06.2016', '12:53', 2, 24, 102, 1),
(259, '09.06.2016', '12:54', 2, 25, 8, 1),
(260, '09.06.2016', '12:54', 2, 26, 14, 1),
(261, '10.06.2016', '15:48', 1, 22, 5, 1),
(262, '10.06.2016', '15:48', 1, 23, 10, 1),
(263, '10.06.2016', '15:48', 1, 24, 180, 1),
(264, '10.06.2016', '15:48', 1, 25, 30, 1),
(265, '10.06.2016', '15:48', 1, 26, 25, 1),
(266, '10.06.2016', '15:48', 1, 33, 2, 1),
(267, '13.06.2016', '04:53', 1, 22, 10, 1),
(268, '13.06.2016', '04:53', 1, 23, 10, 1),
(269, '13.06.2016', '04:53', 1, 24, 180, 1),
(270, '13.06.2016', '04:53', 1, 25, 30, 1),
(271, '13.06.2016', '04:53', 1, 26, 25, 1),
(272, '13.06.2016', '04:53', 1, 33, 5, 1),
(273, '14.06.2016', '19:08', 2, 22, 5, 4),
(274, '14.06.2016', '19:08', 2, 23, 5, 4),
(275, '14.06.2016', '19:08', 2, 24, 102, 4),
(276, '14.06.2016', '19:08', 2, 25, 8, 4),
(277, '14.06.2016', '19:08', 2, 26, 14, 4),
(278, '14.06.2016', '19:09', 2, 33, 2, 4),
(279, '15.06.2016', '12:04', 1, 22, 10, 2),
(280, '15.06.2016', '12:04', 1, 23, 10, 2),
(281, '15.06.2016', '12:04', 1, 24, 180, 2),
(282, '15.06.2016', '12:04', 1, 25, 30, 2),
(283, '15.06.2016', '12:04', 1, 26, 25, 2),
(284, '15.06.2016', '12:04', 1, 33, 5, 2),
(285, '15.06.2016', '12:11', 2, 22, 5, 3),
(286, '15.06.2016', '12:11', 2, 23, 8, 3),
(287, '15.06.2016', '12:11', 2, 24, 100, 3),
(288, '18.06.2016', '18:34', 1, 22, 10, 1),
(289, '18.06.2016', '18:37', 2, 24, 200, 2),
(290, '20.06.2016', '14:06', 1, 22, 10, 1),
(291, '20.06.2016', '14:06', 1, 23, 10, 1),
(292, '20.06.2016', '14:06', 1, 24, 180, 1),
(293, '20.06.2016', '14:07', 1, 25, 30, 1),
(294, '20.06.2016', '14:07', 1, 26, 25, 1),
(295, '20.06.2016', '14:07', 1, 33, 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `araclar`
--

CREATE TABLE IF NOT EXISTS `araclar` (
  `arac_id` int(11) NOT NULL AUTO_INCREMENT,
  `marka` varchar(50) COLLATE utf8_bin NOT NULL,
  `model` varchar(50) COLLATE utf8_bin NOT NULL,
  `yil` smallint(4) NOT NULL,
  `plaka` varchar(10) COLLATE utf8_bin NOT NULL,
  `ytipi` varchar(20) COLLATE utf8_bin NOT NULL,
  `atipi` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`arac_id`),
  UNIQUE KEY `plaka` (`plaka`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Tablo döküm verisi `araclar`
--

INSERT INTO `araclar` (`arac_id`, `marka`, `model`, `yil`, `plaka`, `ytipi`, `atipi`) VALUES
(1, 'FORD', 'Transit T90', 2004, '68 HE 521', 'Dizel', 'Servis'),
(2, 'FORD', 'Connect', 2010, '68 EE 121', 'Dizel', 'Servis'),
(3, 'FORD', 'Focus', 2007, '68 AA 999', 'Dizel', 'Binek'),
(4, 'MERCEDES', 'Viano', 2004, '68 DD 311', 'Benzin', 'Binek'),
(8, 'MERCEDES', 's500', 2016, '68 HB 61', 'Benzin', 'Binek');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gunluksatilan`
--

CREATE TABLE IF NOT EXISTS `gunluksatilan` (
  `gs_id` int(11) NOT NULL AUTO_INCREMENT,
  `tarih` varchar(255) COLLATE utf8_bin NOT NULL,
  `ayran` int(11) NOT NULL,
  `bayran` int(11) NOT NULL,
  `doruk` int(11) NOT NULL,
  `kasar` int(11) NOT NULL,
  `tulum` int(11) NOT NULL,
  `tereyag` int(11) NOT NULL,
  PRIMARY KEY (`gs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `guzergahlar`
--

CREATE TABLE IF NOT EXISTS `guzergahlar` (
  `guzergah_id` int(11) NOT NULL AUTO_INCREMENT,
  `guzergah_adi` varchar(255) COLLATE utf8_bin NOT NULL,
  `tanim` varchar(255) COLLATE utf8_bin NOT NULL,
  `sil` int(1) NOT NULL,
  PRIMARY KEY (`guzergah_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `guzergahlar`
--

INSERT INTO `guzergahlar` (`guzergah_id`, `guzergah_adi`, `tanim`, `sil`) VALUES
(1, 'Sanayii Bölgesi', 'Sanayii bölgesi servisi', 0),
(2, 'Çarşı Bölgesi', 'Çarşı bölgesi servisi', 0),
(3, 'Üniversite Bölgesi', 'Üniversite bölgesi servisi', 0),
(4, 'Hastahane Bölgesi', 'Hastahane bölgesi servisi', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

CREATE TABLE IF NOT EXISTS `hizmetler` (
  `hizmet_id` int(11) NOT NULL,
  `hizmet` varchar(255) COLLATE utf8_bin NOT NULL,
  `tanim` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `hizmetler`
--

INSERT INTO `hizmetler` (`hizmet_id`, `hizmet`, `tanim`) VALUES
(0, 'Dolap', 'Müşterilerin dükkanlarına bırakılır.'),
(0, 'Tabela', 'Müşterilerin dükkanları için yaptırılır.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  `rol` int(1) NOT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Tablo döküm verisi `members`
--

INSERT INTO `members` (`memberID`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`, `rol`) VALUES
(76, 'yuvamkahvesi.', '$2y$10$0wT6.YVj08UiRqsBpzDTfOJZCamnHj6rkHZiwxHL01rQtjOoiravW', 'yuvamkahvesi@kahvesi.com', '', NULL, 'No', 3),
(87, 'edirilik', '$2y$10$aKH6KmL90zBmYHkubDQ9eeGzs4AfMxkoam5g1IEG/wMjWnAVphwYW', 'edirilik@gmail.com', '', NULL, 'No', 2),
(35, 'Salih68', '$2y$10$Ljs1n/YseBtbMdvvXGQz5OSk5seV1Yq1clOqwlR9p4JJ6sIs.vFQi', 'salih@gmail.com', 'YES', NULL, 'No', 1),
(89, 'hacimahmud', '$2y$10$kUecRA12e4n9ycIvDxcg.ejBongw4rkHX/wKRW2Uw7WGj4hRt.9da', 'hacimahmud@gmail.com', '', NULL, 'No', 3),
(90, 'uzunpide', '$2y$10$oYMgVcU0VPeEQjrJM8ItjuVKq1i7UcjNPe1I99xYWUH4CTxWbCaPW', 'uzunpide@hotmail.com', '', NULL, 'No', 3),
(84, 'farukbelge', '$2y$10$dZOoHyy3iWGoxlETPEsu5OkDeSxZA9wfk125zKbPvdNwl6WIfEH7a', 'farukbelge@hotmail.com', '', NULL, 'No', 2),
(77, 'kebapciozcan', '$2y$10$N8Hz4vTYPfvsE8eIA7aei.DnpVTvWnfGklTccrPO0VLVGuMgZJusu', 'kebapci@ozcan.com', '', NULL, 'No', 3),
(66, 'haydarfatih', '$2y$10$WSFm6K8JYpHj7ZXGlKEqJOoftili12n35ppzq/yJLdnpTlKo5mu/K', 'haydar@hotmail.com', '', NULL, 'No', 2),
(64, 'salihzeki', '$2y$10$0Y/e4cbzS9eRt4nynr8dquky25hl0HbSCjI.OuvxhB/FHzSyy4XoG', 'salihzeki@hotmail.com', '', NULL, 'No', 2),
(81, 'belgemre', '$2y$10$jw2DyCvkA.3Ny6oBO/TKpOmbxVZej.gaiF2EWSPA/Ds1JgYp.prgy', 'belgemre@gmail.com', 'YES', NULL, 'No', 1),
(82, 'ahmetfikret', '$2y$10$j1JESZr50FPZ4KakhoIXyumw0gODP.WOcNTGKv0juKVp.Znq1EH3q', 'ahmetfikret@gmail.com', '', NULL, 'No', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE IF NOT EXISTS `musteriler` (
  `m_id` int(20) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `musteri` varchar(200) COLLATE utf8_bin NOT NULL,
  `sahibi` varchar(255) COLLATE utf8_bin NOT NULL,
  `m_adres` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `is_tel` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `cep_tel` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `liste` int(11) NOT NULL,
  `bakiye` double(10,2) DEFAULT NULL,
  `sira` int(11) DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  UNIQUE KEY `m_id` (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=110 ;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`m_id`, `userID`, `musteri`, `sahibi`, `m_adres`, `is_tel`, `cep_tel`, `liste`, `bakiye`, `sira`) VALUES
(105, 76, 'Yuvam Kahvehanesi', 'Ahmet YUVAM', 'Kurşunlu camii arkası', '3825556678', '5343266163', 1, 1575.00, 3),
(106, 77, 'Özcan Kebap', 'Özcan DENİZ', 'Aman buradan bir atlı geldi geçti cad. yarama bastı geldi geçti sok. No:66 Merkez / AKSARAY', '3822154452', '5789587892', 1, 1500.00, 2),
(108, 89, 'Mahmudun yeri', 'Hacı Mahmud Amca', 'Kurşunlu camii arkası orası burası', '3822151212', '5658889963', 1, 110.00, 1),
(109, 90, 'Uzun Pide', 'Hasan UZUN', 'Hacılar harmanı No:28 Merkez / AKSARAY', '03822141414', '05464665859', 3, 0.00, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ozelfiyat`
--

CREATE TABLE IF NOT EXISTS `ozelfiyat` (
  `ozelfiyat_id` int(10) NOT NULL AUTO_INCREMENT,
  `musteri_id` int(10) NOT NULL,
  `urun_id` int(10) NOT NULL,
  `fiyat` double(11,2) NOT NULL,
  `tarih` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ozelfiyat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Tablo döküm verisi `ozelfiyat`
--

INSERT INTO `ozelfiyat` (`ozelfiyat_id`, `musteri_id`, `urun_id`, `fiyat`, `tarih`) VALUES
(1, 105, 22, 19.75, '16.01.2016'),
(2, 105, 23, 20.00, '01.01.2016'),
(3, 105, 24, 6.50, '01.01.2016'),
(4, 105, 25, 7.50, '01.01.2016'),
(5, 106, 23, 14.00, '01.01.2016'),
(6, 105, 26, 15.00, '01.03.2016'),
(7, 105, 22, 19.90, '20.02.2016'),
(8, 106, 26, 5.00, '01.07.2016');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

CREATE TABLE IF NOT EXISTS `personel` (
  `per_id` int(10) NOT NULL AUTO_INCREMENT,
  `userID` int(10) NOT NULL,
  `adi` varchar(50) COLLATE utf8_bin NOT NULL,
  `soyadi` varchar(50) COLLATE utf8_bin NOT NULL,
  `evtel` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `ceptel` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `iban` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `maas` double(10,2) DEFAULT NULL,
  `medenihal` varchar(5) COLLATE utf8_bin NOT NULL,
  `csayisi` int(2) DEFAULT NULL,
  `isbastar` varchar(10) COLLATE utf8_bin NOT NULL,
  `rol` int(11) NOT NULL,
  PRIMARY KEY (`per_id`),
  UNIQUE KEY `memberID` (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`per_id`, `userID`, `adi`, `soyadi`, `evtel`, `ceptel`, `adres`, `iban`, `maas`, `medenihal`, `csayisi`, `isbastar`, `rol`) VALUES
(5, 66, 'Haydar Fatih', 'BELGE', '03822129576', '05414112233', 'Taşpazar mah. Sancılıbaba cad. 841. sok.', '', 4000.00, 'Bekar', 0, '2016-02-01', 2),
(8, 64, 'Salih Zeki', 'BELGE', '03822121212', '05326463259', 'Taşpazar da oturur', '', 2000.00, 'Bekar', 0, '2016-01-01', 2),
(10, 84, 'Faruk', 'BELGE', '', '05055474946', 'Ankara / Etlik', '', 5000.00, 'Evli', 1, '2016-02-01', 9),
(13, 87, 'Erhan', 'DİRİLİK', '', '5054055005', 'Ankara / Ulus', '', 2500.00, 'Evli', 1, '2016-02-19', 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roller`
--

CREATE TABLE IF NOT EXISTS `roller` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `konum` varchar(100) COLLATE utf8_bin NOT NULL,
  `tanim` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sil` int(1) NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Tablo döküm verisi `roller`
--

INSERT INTO `roller` (`rol_id`, `konum`, `tanim`, `sil`) VALUES
(2, 'Servisçi', 'Servis işleriyle uğraşır.', 1),
(5, 'Depocu', 'Depoya mal giriş çıkışını kontrol eder.', 0),
(7, 'Ahçı', 'Yemek yapar mutfağı temizler.', 0),
(9, 'Bilgisayar İşletmeni', 'Bilgisayarda işleri yürütür.', 0),
(10, 'Temizlikçi', 'Temizlik yapar...', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satisdetaylari`
--

CREATE TABLE IF NOT EXISTS `satisdetaylari` (
  `sd_id` int(11) NOT NULL AUTO_INCREMENT,
  `bs_id` int(11) NOT NULL,
  `musteri_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `tarih` varchar(20) COLLATE utf8_bin NOT NULL,
  `saat` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`sd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=65 ;

--
-- Tablo döküm verisi `satisdetaylari`
--

INSERT INTO `satisdetaylari` (`sd_id`, `bs_id`, `musteri_id`, `urun_id`, `adet`, `tarih`, `saat`) VALUES
(1, 25, 106, 23, 15, '08.06.2016', '13:35'),
(2, 25, 106, 22, 45, '08.06.2016', '13:43'),
(3, 25, 108, 22, 45, '08.06.2016', '13:56'),
(4, 25, 108, 23, 75, '08.06.2016', '13:56'),
(5, 25, 108, 24, 10, '08.06.2016', '13:57'),
(6, 25, 108, 26, 10, '08.06.2016', '14:06'),
(7, 25, 106, 24, 15, '08.06.2016', '17:38'),
(8, 27, 106, 24, 5, '08.06.2016', '18:17'),
(9, 27, 108, 23, 2, '08.06.2016', '18:44'),
(10, 27, 108, 24, 2, '08.06.2016', '18:44'),
(11, 27, 105, 22, 5, '08.06.2016', '18:48'),
(12, 28, 106, 22, 15, '09.06.2016', '10:46'),
(13, 28, 108, 23, 2, '09.06.2016', '10:47'),
(14, 28, 105, 24, 2, '09.06.2016', '10:47'),
(15, 29, 106, 22, 2, '09.06.2016', '12:02'),
(16, 29, 108, 22, 2, '09.06.2016', '12:03'),
(17, 29, 108, 23, 2, '09.06.2016', '12:03'),
(18, 29, 108, 24, 2, '09.06.2016', '12:03'),
(19, 29, 108, 25, 2, '09.06.2016', '12:03'),
(20, 29, 105, 22, 2, '09.06.2016', '12:03'),
(21, 29, 105, 23, 3, '09.06.2016', '12:03'),
(22, 29, 105, 24, 3, '09.06.2016', '12:03'),
(23, 30, 106, 23, 2, '09.06.2016', '12:56'),
(24, 30, 106, 24, 1, '09.06.2016', '12:56'),
(25, 30, 108, 23, 5, '09.06.2016', '12:59'),
(26, 30, 108, 24, 2, '09.06.2016', '13:00'),
(27, 30, 108, 25, 2, '09.06.2016', '13:00'),
(28, 30, 105, 23, 1, '09.06.2016', '13:43'),
(29, 30, 105, 26, 15, '09.06.2016', '13:43'),
(30, 31, 106, 22, 5, '10.06.2016', '16:03'),
(32, 31, 108, 24, 4, '10.06.2016', '16:23'),
(33, 31, 108, 25, 2, '10.06.2016', '16:33'),
(34, 31, 108, 26, 1, '10.06.2016', '16:36'),
(35, 31, 105, 25, 2, '10.06.2016', '16:38'),
(36, 31, 105, 26, 2, '10.06.2016', '17:10'),
(37, 31, 105, 33, 3, '10.06.2016', '17:12'),
(38, 31, 105, 23, 1, '10.06.2016', '17:16'),
(39, 31, 105, 24, 179, '10.06.2016', '17:20'),
(40, 31, 106, 23, 1, '10.06.2016', '17:36'),
(41, 32, 106, 22, 2, '13.06.2016', '04:54'),
(42, 32, 106, 23, 2, '13.06.2016', '04:55'),
(43, 32, 106, 24, 1, '13.06.2016', '04:55'),
(44, 32, 106, 25, 1, '13.06.2016', '04:55'),
(45, 32, 106, 26, 1, '13.06.2016', '04:55'),
(46, 32, 106, 33, 1, '13.06.2016', '04:55'),
(47, 32, 108, 22, 1, '13.06.2016', '05:19'),
(48, 32, 108, 23, 2, '13.06.2016', '05:19'),
(49, 32, 108, 24, 1, '13.06.2016', '05:19'),
(50, 32, 105, 22, 4, '13.06.2016', '05:42'),
(51, 33, 106, 22, 5, '14.06.2016', '19:09'),
(52, 33, 106, 23, 5, '14.06.2016', '19:10'),
(53, 34, 106, 22, 1, '15.06.2016', '12:05'),
(54, 34, 106, 23, 1, '15.06.2016', '12:05'),
(55, 34, 106, 24, 5, '15.06.2016', '12:06'),
(56, 34, 108, 24, 10, '15.06.2016', '12:09'),
(57, 34, 105, 22, 1, '15.06.2016', '12:10'),
(58, 35, 106, 22, 1, '15.06.2016', '12:12'),
(59, 35, 108, 22, 1, '15.06.2016', '12:13'),
(60, 35, 105, 22, 1, '15.06.2016', '12:16'),
(61, 37, 106, 22, 5, '18.06.2016', '18:35'),
(62, 39, 108, 22, 1, '20.06.2016', '14:14'),
(63, 39, 106, 22, 1, '20.06.2016', '14:24'),
(64, 39, 106, 23, 2, '20.06.2016', '14:24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satishesaptakip`
--

CREATE TABLE IF NOT EXISTS `satishesaptakip` (
  `sht_id` int(11) NOT NULL AUTO_INCREMENT,
  `bs_id` int(11) NOT NULL,
  `musteri_id` int(11) NOT NULL,
  `tutar` double(11,2) NOT NULL,
  `alinan` double(11,2) NOT NULL,
  `tarih` varchar(20) COLLATE utf8_bin NOT NULL,
  `saat` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`sht_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=30 ;

--
-- Tablo döküm verisi `satishesaptakip`
--

INSERT INTO `satishesaptakip` (`sht_id`, `bs_id`, `musteri_id`, `tutar`, `alinan`, `tarih`, `saat`) VALUES
(1, 25, 106, 1267.50, 1267.50, '08.06.2016', '17:40'),
(2, 27, 106, 35.00, 35.00, '08.06.2016', '18:17'),
(3, 27, 108, 49.00, 49.00, '08.06.2016', '18:45'),
(4, 27, 105, 100.00, 12.00, '08.06.2016', '18:56'),
(5, 28, 106, 300.00, 300.00, '09.06.2016', '10:47'),
(6, 28, 108, 35.00, 35.00, '09.06.2016', '10:47'),
(7, 28, 105, 14.00, 14.00, '09.06.2016', '10:47'),
(8, 29, 106, 40.00, 40.00, '09.06.2016', '12:02'),
(9, 29, 108, 103.00, 100.00, '09.06.2016', '12:03'),
(10, 29, 105, 113.50, 110.00, '09.06.2016', '12:03'),
(11, 30, 106, 42.00, 42.00, '09.06.2016', '12:56'),
(12, 30, 108, 115.50, 115.50, '09.06.2016', '13:01'),
(13, 30, 105, 107.50, 100.00, '09.06.2016', '13:43'),
(14, 31, 106, 100.00, 100.00, '10.06.2016', '16:03'),
(15, 31, 108, 44.50, 44.50, '10.06.2016', '16:37'),
(16, 31, 105, 1386.50, 1386.50, '10.06.2016', '17:20'),
(17, 32, 106, 87.50, 125.00, '13.06.2016', '06:34'),
(18, 32, 108, 62.00, 0.00, '13.06.2016', '05:19'),
(19, 32, 105, 20.00, 80.00, '13.06.2016', '06:04'),
(20, 33, 106, 107.50, 187.50, '14.06.2016', '19:38'),
(21, 34, 106, 72.50, 72.50, '15.06.2016', '12:06'),
(22, 34, 108, 70.00, 70.00, '15.06.2016', '12:09'),
(23, 34, 105, 20.00, 20.00, '15.06.2016', '12:10'),
(24, 35, 106, 20.00, 20.00, '15.06.2016', '12:12'),
(25, 35, 108, 20.00, 20.00, '15.06.2016', '12:13'),
(26, 35, 105, 20.00, 20.00, '15.06.2016', '12:16'),
(27, 37, 106, 100.00, 80.00, '18.06.2016', '18:35'),
(28, 39, 108, 20.00, 20.00, '20.06.2016', '14:21'),
(29, 39, 106, 55.00, 55.00, '20.06.2016', '14:24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `serviscesit`
--

CREATE TABLE IF NOT EXISTS `serviscesit` (
  `servis_id` int(11) NOT NULL AUTO_INCREMENT,
  `servis_adi` varchar(100) COLLATE utf8_bin NOT NULL,
  `tanim` varchar(255) COLLATE utf8_bin NOT NULL,
  `sil` int(1) NOT NULL,
  PRIMARY KEY (`servis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `serviscesit`
--

INSERT INTO `serviscesit` (`servis_id`, `servis_adi`, `tanim`, `sil`) VALUES
(1, 'Sabah Servisi', 'Sabah çıkılan servistir.', 1),
(2, 'Gündüz Servis 1', 'Normal servis dışında çıkılan ilk servistir.', 0),
(3, 'Gündüz Servis 2', 'Normal servis dışında çıkılan ikinci servistir.', 0),
(4, 'Akşam Servisi', 'Akşam çıkılan servistir.', 0),
(5, 'Gündüz Servis 3', 'Normal servis dışında çıkılan üçüncü servistir.', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE IF NOT EXISTS `urunler` (
  `urun_id` int(11) NOT NULL AUTO_INCREMENT,
  `marka` varchar(50) COLLATE utf8_bin NOT NULL,
  `urun_adi` varchar(50) COLLATE utf8_bin NOT NULL,
  `maliyet` double(11,2) NOT NULL,
  `satis_fiyati` double(11,2) NOT NULL,
  `barkod_no` varchar(13) COLLATE utf8_bin NOT NULL,
  `birimi` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`urun_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=34 ;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `marka`, `urun_adi`, `maliyet`, `satis_fiyati`, `barkod_no`, `birimi`) VALUES
(22, 'BELGEM', 'Belgem Tulum Peyniri', 15.00, 20.00, '8495698521111', 'kg'),
(23, 'BELGEM', 'Belgem Kaşar Peyniri', 14.00, 17.50, '8495698521212', 'kg'),
(24, 'BELGEM', 'Belgem Ayran 200ml x 20 (1 Koli)', 6.50, 7.00, '8495698521313', 'koli'),
(25, 'BELGEM', 'Belgem Ayran 300ml x 12 (1 Koli)', 5.00, 7.00, '8495698521414', 'koli'),
(26, 'BELGEM', 'Doruk Ayran 200ml x 20 (1 Koli)', 5.00, 6.00, '8495698521515', 'koli'),
(33, 'BELGEM', 'Belgem Tereyağ', 22.00, 30.00, '8495698521116', 'kg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yapilanservisler`
--

CREATE TABLE IF NOT EXISTS `yapilanservisler` (
  `bs_id` int(11) NOT NULL AUTO_INCREMENT,
  `servisci_id` int(3) NOT NULL,
  `servis_id` int(3) NOT NULL,
  `arac_id` int(3) NOT NULL,
  `guzergah_id` int(3) NOT NULL,
  `tarih` varchar(20) COLLATE utf8_bin NOT NULL,
  `baslangic_saati` varchar(10) COLLATE utf8_bin NOT NULL,
  `bitis_saati` varchar(10) COLLATE utf8_bin NOT NULL,
  `durum` int(1) NOT NULL,
  PRIMARY KEY (`bs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=40 ;

--
-- Tablo döküm verisi `yapilanservisler`
--

INSERT INTO `yapilanservisler` (`bs_id`, `servisci_id`, `servis_id`, `arac_id`, `guzergah_id`, `tarih`, `baslangic_saati`, `bitis_saati`, `durum`) VALUES
(7, 64, 1, 1, 1, '22.03.2016', '11:42', '18:59', 1),
(8, 66, 1, 2, 3, '22.03.2016', '16:25', '18:24', 1),
(14, 66, 2, 2, 3, '22.03.2016', '18:27', '18:29', 1),
(15, 66, 1, 2, 1, '22.03.2016', '18:34', '18:59', 1),
(16, 66, 1, 2, 1, '22.03.2016', '18:35', '18:35', 1),
(17, 66, 1, 1, 1, '22.03.2016', '18:55', '18:58', 1),
(18, 64, 1, 1, 1, '22.03.2016', '18:55', '19:10', 1),
(19, 66, 1, 2, 1, '22.03.2016', '18:58', '19:10', 1),
(20, 64, 1, 1, 1, '22.03.2016', '19:11', '10:31', 1),
(21, 66, 1, 2, 1, '30.04.2016', '14:40', '10:30', 1),
(22, 66, 1, 1, 1, '02.05.2016', '10:44', '18:30', 1),
(23, 64, 1, 2, 1, '02.05.2016', '10:59', '11:00', 1),
(24, 66, 1, 1, 1, '16.05.2016', '18:32', '20:06', 1),
(25, 64, 1, 1, 1, '07.06.2016', '13:25', '18:15', 1),
(26, 66, 3, 2, 1, '08.06.2016', '17:42', '18:15', 1),
(27, 64, 2, 1, 1, '08.06.2016', '18:16', '18:56', 1),
(28, 64, 3, 2, 1, '08.06.2016', '18:57', '10:48', 1),
(29, 66, 1, 1, 1, '09.06.2016', '10:50', '12:53', 1),
(30, 64, 1, 2, 1, '09.06.2016', '12:54', '13:45', 1),
(31, 64, 1, 1, 1, '10.06.2016', '15:49', '18:13', 1),
(32, 64, 1, 1, 1, '13.06.2016', '04:53', '19:06', 1),
(33, 64, 4, 2, 1, '14.06.2016', '19:09', '12:04', 1),
(34, 64, 2, 1, 1, '15.06.2016', '12:05', '12:11', 1),
(35, 66, 3, 2, 1, '15.06.2016', '12:11', '12:18', 1),
(36, 66, 3, 2, 1, '15.06.2016', '13:16', '13:24', 1),
(37, 64, 1, 1, 1, '18.06.2016', '18:34', '18:36', 1),
(38, 66, 2, 2, 1, '18.06.2016', '18:37', '11:54', 1),
(39, 64, 1, 1, 1, '20.06.2016', '14:07', '15:43', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
