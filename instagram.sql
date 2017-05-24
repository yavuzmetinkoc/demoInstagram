-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 May 2017, 10:01:59
-- Sunucu sürümü: 10.1.21-MariaDB
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `instagram`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `begeniler`
--

CREATE TABLE `begeniler` (
  `begeniID` int(11) NOT NULL,
  `sID` int(11) NOT NULL,
  `kullaniciID` int(11) NOT NULL,
  `kalp_yol` varchar(255) NOT NULL DEFAULT '..\\img\\heart_img.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `begeniler`
--

INSERT INTO `begeniler` (`begeniID`, `sID`, `kullaniciID`, `kalp_yol`) VALUES
(12, 154, 18, '..\\img\\heart-red.png'),
(14, 170, 16, '..\\img\\heart-red.png'),
(17, 154, 16, '..\\img\\heart-red.png'),
(24, 164, 16, '..\\img\\heart-red.png'),
(27, 166, 16, '..\\img\\heart-red.png'),
(28, 165, 16, '..\\img\\heart-red.png'),
(29, 154, 19, '..\\img\\heart-red.png'),
(32, 176, 19, '..\\img\\heart-red.png'),
(33, 160, 19, '..\\img\\heart-red.png'),
(34, 173, 19, '..\\img\\heart-red.png'),
(35, 167, 16, '..\\img\\heart-red.png'),
(37, 160, 16, '..\\img\\heart-red.png'),
(38, 169, 16, '..\\img\\heart-red.png'),
(40, 168, 17, '..\\img\\heart-red.png'),
(45, 181, 24, '..\\img\\heart-red.png'),
(52, 179, 16, '..\\img\\heart-red.png'),
(55, 154, 24, '..\\img\\heart-red.png'),
(58, 172, 17, '..\\img\\heart-red.png'),
(59, 165, 17, '..\\img\\heart-red.png'),
(63, 170, 17, '..\\img\\heart-red.png'),
(64, 160, 17, '..\\img\\heart-red.png'),
(65, 180, 17, '..\\img\\heart-red.png'),
(69, 183, 23, '..\\img\\heart-red.png'),
(70, 168, 18, '..\\img\\heart-red.png'),
(101, 170, 18, '..\\img\\heart-red.png'),
(108, 176, 26, '..\\img\\heart-red.png'),
(109, 177, 26, '..\\img\\heart-red.png'),
(118, 186, 26, '..\\img\\heart-red.png'),
(120, 185, 26, '..\\img\\heart-red.png'),
(121, 186, 27, '..\\img\\heart-red.png'),
(122, 174, 27, '..\\img\\heart-red.png'),
(123, 174, 18, '..\\img\\heart-red.png'),
(124, 176, 27, '..\\img\\heart-red.png'),
(125, 176, 18, '..\\img\\heart-red.png'),
(126, 189, 17, '..\\img\\heart-red.png'),
(127, 189, 18, '..\\img\\heart-red.png'),
(128, 189, 23, '..\\img\\heart-red.png'),
(129, 168, 23, '..\\img\\heart-red.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `Presim` varchar(255) NOT NULL,
  `pBiyografi` varchar(255) NOT NULL DEFAULT 'Henüz biyografi eklenmedi.',
  `durum` varchar(500) NOT NULL DEFAULT 'Henüz durum eklenmedi.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `username`, `fullname`, `email`, `password`, `Presim`, `pBiyografi`, `durum`) VALUES
(17, 'eminöz', 'Muhammed Emin Özkişi', 'muhammedemin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '../Profil-Photo/phototy744.jpg', 'Henüz biyografi eklenmedi.', 'Henüz durum eklenmedi.'),
(18, 'imenender', 'Ender İmen', 'enderimen@hotmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '../Profil-Photo/photofg1876.gif', 'Henüz biyografi eklenmedi.', 'Henüz durum eklenmedi.'),
(19, 'Muhammed Zahid', 'Zahid Özhan', 'zahid@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '../Profil-Photo/photofg7122.jpg', 'Henüz biyografi eklenmedi.', 'Henüz durum eklenmedi.'),
(23, 'imenerdi', 'Erdi İMEN', 'erdiimen@hotmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '../Profil-Photo/phototy9202.jpg', 'Henüz biyografi eklenmedi.', 'Henüz durum eklenmedi.'),
(25, 'Gogo', 'Gökhan İMEN', 'gokhan@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '../Share/phototy9198.jpg', 'Henüz biyografi eklenmedi.', 'Henüz durum eklenmedi.'),
(26, 'yarbayunus', 'Yunus YARBA', 'yunus@hotmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '../Share/phototy4665.jpg', 'Henüz biyografi eklenmedi.', 'Henüz durum eklenmedi.'),
(27, 'ahmetkorkmaz3', 'Ahmet KORKMAZ', 'ahmetkorkmaz3@hotmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '../Profil-Photo/photofg9412.jpg', 'KTU Yazılım Kulübü Fanlarındanım', 'Galatasaray');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `paylasimlar`
--

CREATE TABLE `paylasimlar` (
  `sID` int(11) NOT NULL,
  `kullaniciID` int(255) NOT NULL,
  `sTarih` datetime(6) NOT NULL,
  `sKonum` varchar(200) NOT NULL,
  `sYol` varchar(500) NOT NULL,
  `aciklama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `paylasimlar`
--

INSERT INTO `paylasimlar` (`sID`, `kullaniciID`, `sTarih`, `sKonum`, `sYol`, `aciklama`) VALUES
(160, 16, '2017-05-19 00:00:00.000000', '', '../Share/phototy4184.jpg', ''),
(163, 19, '2017-05-19 00:00:00.000000', 'Nevşehir', '../Share/photort3143.jpg', 'Örümcek'),
(164, 16, '2017-05-19 00:00:00.000000', 'İstanbul', '../Share/photofg7490.jpg', 'Van Kedisi'),
(166, 17, '2017-05-19 00:00:00.000000', 'Disney', '../Share/photort2108.jpg', 'Cartoon Network Characters'),
(168, 18, '2017-05-19 00:00:00.000000', 'Disney', '../Share/photort8425.jpg', 'Dafi Duck'),
(169, 18, '2017-05-19 00:00:00.000000', '', '../Share/phototy3100.jpg', 'Shrek'),
(170, 18, '2017-05-19 00:00:00.000000', '', '../Share/photofg4436.jpg', 'Papatya Çiçeği ????'),
(171, 23, '2017-05-19 00:00:00.000000', '', '../Share/phototy5973.jpg', ''),
(172, 23, '2017-05-19 00:00:00.000000', '', '../Share/photoyu9511.jpg', 'Cartoon Network'),
(173, 23, '2017-05-19 00:00:00.000000', '', '../Share/photort2474.jpg', ''),
(174, 25, '2017-05-19 00:00:00.000000', '', '../Share/photort4751.jpg', ''),
(175, 25, '2017-05-19 00:00:00.000000', '', '../Share/photort1047.jpg', ''),
(176, 25, '2017-05-19 00:00:00.000000', '', '../Share/phototy6791.jpg', ''),
(177, 25, '2017-05-19 00:00:00.000000', '', '../Share/photofg6037.jpg', ''),
(178, 24, '2017-05-19 00:00:00.000000', '', '../Share/photofg1639.jpg', ''),
(179, 24, '2017-05-19 00:00:00.000000', '', '../Share/photoyu9580.jpg', ''),
(180, 24, '2017-05-19 00:00:00.000000', '', '../Share/photort603.jpg', ''),
(181, 24, '2017-05-19 00:00:00.000000', '', '../Share/photoas2636.jpg', ''),
(184, 23, '2017-05-19 19:09:53.000000', 'Fatih/İstanbul', '../Share/photoyu478.jpg', 'sklsad'),
(185, 23, '2017-05-19 19:13:49.000000', 'İstanbul', '../Share/photort1304.jpg', 'Android'),
(186, 26, '2017-05-22 15:23:37.000000', '', '../Share/phototy8069.jpg', ''),
(187, 27, '2017-05-22 16:30:04.000000', 'Losangeles', '../Share/photofg9601.jpg', 'İguanaları çok severim...'),
(188, 18, '2017-05-23 14:34:34.000000', 'İstanbul', '../Share/photort8633.gif', 'Ördek'),
(189, 18, '2017-05-23 14:36:20.000000', 'Trabzon', '../Share/photoyu4076.gif', 'Buda benim kedi'),
(190, 27, '2017-05-23 23:13:43.000000', 'Tekirdağ', '../Share/phototy7359.jpg', 'Çiçek'),
(191, 27, '2017-05-23 23:14:09.000000', 'eee', '../Share/phototy3953.jpg', 'MİX'),
(192, 17, '2017-05-23 23:14:46.000000', 'Disney', '../Share/photoyu3471.jpg', 'Çizgi karakter'),
(193, 17, '2017-05-23 23:15:12.000000', 'Tropikal', '../Share/photort7594.jpg', 'iiiiiiiiiiiiiiiiiii');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takipciler`
--

CREATE TABLE `takipciler` (
  `id` int(11) NOT NULL,
  `takipci_id` int(11) NOT NULL,
  `takipci_adi` varchar(255) NOT NULL,
  `takip_edilen_id` int(11) NOT NULL,
  `takip_edilen_kisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `takipciler`
--

INSERT INTO `takipciler` (`id`, `takipci_id`, `takipci_adi`, `takip_edilen_id`, `takip_edilen_kisi`) VALUES
(5, 18, 'imenender', 18, 'imenender'),
(10, 17, 'eminöz', 17, 'eminöz'),
(14, 23, 'imenerdi', 23, 'imenerdi'),
(24, 25, 'Gogo', 25, 'Gogo'),
(29, 25, 'Gogo', 23, 'imenerdi'),
(72, 17, 'eminöz', 25, 'Gogo'),
(74, 23, 'imenerdi', 18, 'imenender'),
(75, 23, 'imenerdi', 19, 'Muhammed'),
(83, 26, 'yarbayunus', 26, 'yarbayunus'),
(86, 26, 'yarbayunus', 17, 'eminöz'),
(87, 26, 'yarbayunus', 23, 'imenerdi'),
(88, 19, 'Muhammed Zahid', 19, 'Muhammed Zahid'),
(89, 27, 'ahmetkorkmaz3', 27, 'ahmetkorkmaz3'),
(96, 18, 'imenender', 25, 'Gogo'),
(106, 17, 'eminöz', 18, 'imenender'),
(108, 17, 'eminöz', 27, 'ahmetkorkmaz3'),
(109, 27, 'ahmetkorkmaz3', 18, 'imenender');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoruma_yorum`
--

CREATE TABLE `yoruma_yorum` (
  `yoruma_yorumID` int(11) NOT NULL,
  `yorum` varchar(80) NOT NULL,
  `yorumID` int(11) NOT NULL,
  `kullaniciID` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `resimID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorumID` int(11) NOT NULL,
  `resimID` int(11) NOT NULL,
  `kullaniciID` int(255) NOT NULL,
  `yorum_yapan` varchar(255) NOT NULL,
  `yorum` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorumID`, `resimID`, `kullaniciID`, `yorum_yapan`, `yorum`) VALUES
(16, 169, 16, 'kerimow', 'Shrek en sevdiğim çizgi film'),
(17, 168, 16, 'kerimow', 'Shrek en sevdiğim çizgi film'),
(18, 168, 18, 'imenender', 'Dafiii'),
(27, 186, 26, 'yarbayunus', 'Merhaba'),
(29, 186, 27, 'ahmetkorkmaz3', 'Çok saçma bir resim yunus sana hiç yakıştıramadım....'),
(30, 174, 27, 'ahmetkorkmaz3', 'ACDC');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `begeniler`
--
ALTER TABLE `begeniler`
  ADD PRIMARY KEY (`begeniID`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `paylasimlar`
--
ALTER TABLE `paylasimlar`
  ADD PRIMARY KEY (`sID`);

--
-- Tablo için indeksler `takipciler`
--
ALTER TABLE `takipciler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yoruma_yorum`
--
ALTER TABLE `yoruma_yorum`
  ADD PRIMARY KEY (`yoruma_yorumID`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorumID`),
  ADD KEY `resimID` (`resimID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `begeniler`
--
ALTER TABLE `begeniler`
  MODIFY `begeniID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Tablo için AUTO_INCREMENT değeri `paylasimlar`
--
ALTER TABLE `paylasimlar`
  MODIFY `sID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- Tablo için AUTO_INCREMENT değeri `takipciler`
--
ALTER TABLE `takipciler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- Tablo için AUTO_INCREMENT değeri `yoruma_yorum`
--
ALTER TABLE `yoruma_yorum`
  MODIFY `yoruma_yorumID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD CONSTRAINT `yorumlar_ibfk_1` FOREIGN KEY (`resimID`) REFERENCES `paylasimlar` (`sID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
