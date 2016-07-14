-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Şub 2016, 13:34:01
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
  `servisci_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=116 ;

--
-- Tablo döküm verisi `arabayaatilan`
--

INSERT INTO `arabayaatilan` (`id`, `tarih`, `saat`, `arac_id`, `urun_id`, `adet`, `servis_id`, `servisci_id`) VALUES
(2, '24.01.2016', '16:25', 2, 22, 50, 1, 66),
(3, '24.01.2016', '16:25', 2, 23, 25, 1, 66),
(4, '24.01.2016', '16:26', 2, 24, 250, 1, 66),
(5, '24.01.2016', '16:26', 2, 25, 100, 1, 66),
(6, '24.01.2016', '16:26', 2, 26, 100, 1, 66),
(7, '24.01.2016', '16:26', 2, 33, 30, 1, 66),
(8, '24.01.2016', '17:27', 1, 23, 500, 1, 75),
(9, '24.01.2016', '18:48', 1, 22, 600, 1, 75),
(10, '24.01.2016', '18:48', 1, 24, 500, 1, 75),
(11, '24.01.2016', '18:48', 1, 25, 1500, 1, 75),
(12, '24.01.2016', '18:48', 1, 26, 1000, 1, 75),
(13, '24.01.2016', '18:48', 1, 33, 100, 1, 75),
(39, '30.01.2016', '23:55', 1, 22, 50, 1, 75),
(40, '30.01.2016', '23:56', 1, 23, 50, 1, 75),
(41, '30.01.2016', '23:56', 1, 24, 300, 1, 75),
(42, '30.01.2016', '23:56', 1, 25, 50, 1, 75),
(43, '30.01.2016', '23:56', 1, 26, 30, 1, 75),
(51, '31.01.2016', '00:45', 1, 24, 1000, 1, 75),
(54, '31.01.2016', '01:14', 1, 23, 500, 1, 75),
(55, '31.01.2016', '01:14', 1, 25, 300, 1, 75),
(56, '31.01.2016', '01:14', 1, 26, 10, 1, 75),
(57, '31.01.2016', '01:14', 1, 33, 25, 1, 75),
(58, '31.01.2016', '17:11', 1, 22, 100, 2, 75),
(59, '31.01.2016', '17:12', 1, 23, 500, 2, 75),
(60, '31.01.2016', '17:12', 1, 24, 700, 2, 75),
(62, '31.01.2016', '17:15', 1, 22, 150, 1, 75),
(81, '02.02.2016', '17:22', 1, 33, 850, 1, 75),
(82, '02.02.2016', '17:30', 1, 22, 1050, 1, 75),
(83, '03.02.2016', '17:11', 2, 22, 50, 1, 66),
(84, '03.02.2016', '17:12', 2, 23, 150, 1, 66),
(85, '03.02.2016', '17:12', 2, 24, 500, 1, 66),
(86, '03.02.2016', '17:12', 2, 25, 650, 1, 66),
(87, '03.02.2016', '17:12', 2, 26, 750, 1, 66),
(88, '03.02.2016', '17:12', 2, 33, 850, 1, 66),
(89, '03.02.2016', '19:16', 1, 22, 500, 2, 75),
(90, '03.02.2016', '19:16', 1, 23, 500, 2, 75),
(91, '03.02.2016', '19:16', 1, 24, 500, 2, 75),
(92, '03.02.2016', '19:16', 1, 25, 500, 2, 75),
(93, '03.02.2016', '19:16', 1, 26, 500, 2, 75),
(94, '03.02.2016', '19:16', 1, 33, 500, 2, 75),
(95, '03.02.2016', '20:31', 1, 22, 550, 1, 64),
(96, '03.02.2016', '20:31', 1, 23, 750, 1, 64),
(97, '03.02.2016', '20:32', 1, 25, 850, 1, 64),
(98, '05.02.2016', '16:29', 2, 22, 740, 1, 66),
(99, '05.02.2016', '16:29', 2, 23, 640, 1, 66),
(100, '05.02.2016', '16:30', 1, 22, 740, 2, 64),
(101, '05.02.2016', '16:31', 1, 23, 540, 2, 64),
(102, '05.02.2016', '18:09', 2, 25, 750, 1, 66),
(103, '05.02.2016', '19:45', 2, 24, 15, 1, 66),
(104, '06.02.2016', '14:09', 1, 22, 550, 1, 64),
(105, '06.02.2016', '14:09', 1, 23, 750, 1, 64),
(106, '06.02.2016', '14:09', 1, 24, 850, 1, 64),
(107, '06.02.2016', '14:09', 1, 25, 580, 1, 64),
(108, '06.02.2016', '14:09', 1, 26, 110, 1, 64),
(109, '06.02.2016', '14:09', 1, 33, 100, 1, 64),
(111, '06.02.2016', '14:10', 2, 23, 1000, 1, 66),
(112, '06.02.2016', '14:10', 2, 24, 750, 1, 66),
(113, '06.02.2016', '14:10', 2, 25, 580, 1, 66),
(114, '06.02.2016', '14:10', 2, 26, 1100, 1, 66),
(115, '06.02.2016', '14:10', 2, 33, 111, 1, 66);

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
(3, 'FORD', 'Focus', 2007, '68 AA 111', 'Dizel', 'Binek'),
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Tablo döküm verisi `members`
--

INSERT INTO `members` (`memberID`, `username`, `password`, `email`, `active`, `resetToken`, `resetComplete`, `rol`) VALUES
(76, 'yuvamkah.', '$2y$10$dOvhc74LIrMjcBFzB7TBkusT5AEm0di7V/nE04sfmfYo3AYu56Aw2', 'yuvam@kahvesi.com', '', NULL, 'No', 3),
(36, 'ahmetfikret', '$2y$10$.owshuQyy8tSsS2VXs/QDuebrjlPD88aET0Mdj8yYeYKMaA0WY6Fa', 'ahmet@hotmail.com', '', NULL, 'No', 1),
(35, 'Salih68', '$2y$10$Ljs1n/YseBtbMdvvXGQz5OSk5seV1Yq1clOqwlR9p4JJ6sIs.vFQi', 'salih@gmail.com', 'YES', NULL, 'No', 1),
(77, 'kebapciozcan', '$2y$10$Q3JjCTYSmtsn6YjYd8SvPuw6IkcJBDC7g04u7/U8wyCR4wK6pdJHW', 'kebapci@ozcan.com', '', NULL, 'No', 3),
(66, 'haydarfa6tih', '$2y$10$WSFm6K8JYpHj7ZXGlKEqJOoftili12n35ppzq/yJLdnpTlKo5mu/K', 'haydar@hotmail.com', '', NULL, 'No', 2),
(75, 'servisciemre', '$2y$10$eiXG83M3jhFGHnRKSWvxx.mCai7RllhVSaO0n2Mgan4Ktlkidfg.y', 'servisci@emre.com', '', NULL, 'No', 2),
(64, 'salihzeki', '$2y$10$hb9KR5qmeYoeemUGsmCySeQHvLQvTBsHtxynZd1cKtTlxm5O1z55C', 'belgemre@gmail.coms', '', NULL, 'No', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=107 ;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`m_id`, `userID`, `musteri`, `sahibi`, `m_adres`, `is_tel`, `cep_tel`, `liste`, `bakiye`, `sira`) VALUES
(105, 76, 'Yuvam Kahvehanesi', 'Ahmet YUVAM', 'Kurşunlu camii arkası', '3825556678', '5343266163', 66, 1575.00, 1),
(106, 77, 'Özcan Kebap', 'Özcan DENİZ', 'Aman buradan bir atlı geldi geçri cad. yarama bastı geldi geçti sok. No:66 Merkez / AKSARAY', '3822154452', '5789587892', 64, 1500.00, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `ozelfiyat`
--

INSERT INTO `ozelfiyat` (`ozelfiyat_id`, `musteri_id`, `urun_id`, `fiyat`, `tarih`) VALUES
(1, 105, 22, 19.75, '16.01.2016'),
(2, 105, 23, 20.00, '01.01.2016'),
(3, 105, 24, 6.50, '01.01.2016'),
(4, 105, 25, 7.50, '01.01.2016'),
(5, 106, 23, 14.00, '01.01.2016'),
(6, 105, 26, 15.00, '01.03.2016');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`per_id`, `userID`, `adi`, `soyadi`, `evtel`, `ceptel`, `adres`, `iban`, `maas`, `medenihal`, `csayisi`, `isbastar`, `rol`) VALUES
(5, 66, 'Haydar Fatih', 'BELGE', '03822129576', '05414112233', 'Taşpazar mah. Sancılıbaba cad. 841. sok.', '', 1000.00, 'Bekar', 0, '2012-01-01', 2),
(8, 64, 'Salih Zeki', 'BELGE', '03822121212', '05326463259', 'Taşpazar da oturur', '', 2000.00, 'Bekar', 0, '2016-01-01', 2),
(9, 75, 'Emre', 'BELGE', '03822151212', '05052223311', 'Aksaray', '', 5000.00, 'Bekar', 0, '2016-01-01', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roller`
--

CREATE TABLE IF NOT EXISTS `roller` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(100) COLLATE utf8_bin NOT NULL,
  `tanim` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `mevkii` varchar(50) COLLATE utf8_bin NOT NULL,
  `sil` int(1) NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `roller`
--

INSERT INTO `roller` (`rol_id`, `rol`, `tanim`, `mevkii`, `sil`) VALUES
(1, 'Yönetici', 'Bütün yetkilerin sahibidir.', 'personel-ekle.php', 1),
(2, 'Servisçi', 'Servis işleriyle uğraşır.', 'servis-elemani-ekle.php', 1),
(3, 'Müşteri', 'Mal ve hizmetin satılan kişi ya da kurum.', 'musteri-ekle.php', 1),
(4, 'Firma', 'Mal ve ya hizmet satın alınan kişi ya da kurum.', 'firma-ekle.php', 1),
(5, 'Depocu', 'Depoya mal giriş çıkışını kontrol eder.', 'personel-ekle.php', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `serviscesit`
--

INSERT INTO `serviscesit` (`servis_id`, `servis_adi`, `tanim`, `sil`) VALUES
(1, 'Sabah Servisi', 'Sabah çıkılan servistir.', 1),
(2, 'Gündüz Servis 1', 'Normal servis dışında çıkılan ilk servistir.', 0),
(3, 'Gündüz Servis 2', 'Normal servis dışında çıkılan ikinci servistir.', 0);

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
(22, 'BELGEM', 'Belgem Tulum Peyniri', 18.00, 20.00, '84956985211', 'kg'),
(23, 'BELGEM', 'Belgem Kaşar Peyniri', 17.00, 20.00, '84956985212', 'kg'),
(24, 'BELGEM', 'Belgem Ayran 200ml x 20 (1 Koli)', 6.00, 7.00, '84956985213', 'koli'),
(25, 'BELGEM', 'Belgem Ayran 300ml x 12 (1 Koli)', 5.00, 7.00, '84956985214', 'koli'),
(26, 'BELGEM', 'Doruk Ayran 200ml x 20 (1 Koli)', 5.00, 6.00, '84956985215', 'koli'),
(33, 'BELGEM', 'Belgem Tereyağ', 22.00, 25.00, '8495698521177', 'kg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
