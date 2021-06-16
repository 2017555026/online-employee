-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Haz 2021, 20:27:25
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `employeedb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cagrimerkezi`
--

CREATE TABLE `cagrimerkezi` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `TCKN` varchar(11) NOT NULL,
  `pozisyon` varchar(50) NOT NULL,
  `baslama_tarihi` date NOT NULL,
  `sicil_no` varchar(13) NOT NULL,
  `sozlesme_suresi` varchar(10) NOT NULL,
  `aylik_maas` int(11) NOT NULL,
  `statuscode` tinyint(4) NOT NULL,
  `departman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `cagrimerkezi`
--

INSERT INTO `cagrimerkezi` (`id`, `ad`, `soyad`, `TCKN`, `pozisyon`, `baslama_tarihi`, `sicil_no`, `sozlesme_suresi`, `aylik_maas`, `statuscode`, `departman_id`) VALUES
(5, 'Esra', 'Eker', '12345654321', 'Çağrı Merkezi Müdürü', '2019-06-12', '1023102310231', 'Yok', 10000, 1, 2),
(6, 'Ahmet', 'Öz', '98765678909', 'Müşteri Temsilcisi', '2019-09-18', '2301250456320', '3 yıl', 5500, 1, 2),
(11, 'Emre', 'Yağız', '32476555644', 'Müşteri Temsilcisi', '2019-10-18', '2135646564328', 'Yok', 4500, 1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `departman_bilgi`
--

CREATE TABLE `departman_bilgi` (
  `departman_id` int(11) NOT NULL,
  `departman_ad` varchar(50) NOT NULL,
  `tablo_ad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `departman_bilgi`
--

INSERT INTO `departman_bilgi` (`departman_id`, `departman_ad`, `tablo_ad`) VALUES
(1, 'Yönetim', 'yonetim'),
(2, 'Çağrı Merkezi', 'cagrimerkezi'),
(3, 'İnsan Kaynakları', 'insan_kaynaklari'),
(4, 'Kalite Kontrol', 'kalite_kontrol'),
(5, 'Muhasebe ve Finans', 'muhasebe_finans'),
(6, 'Sekreterlik', 'sekreterlik'),
(7, 'Satış Pazarlama', 'satis_pazarlama'),
(8, 'Yazılım Mühendisliği', 'yazilim_muhendisligi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `insan_kaynaklari`
--

CREATE TABLE `insan_kaynaklari` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `TCKN` varchar(11) NOT NULL,
  `pozisyon` varchar(50) NOT NULL,
  `baslama_tarihi` date NOT NULL,
  `sicil_no` varchar(13) NOT NULL,
  `sozlesme_suresi` varchar(10) NOT NULL,
  `aylik_maas` int(11) NOT NULL,
  `statuscode` tinyint(4) NOT NULL,
  `departman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `insan_kaynaklari`
--

INSERT INTO `insan_kaynaklari` (`id`, `ad`, `soyad`, `TCKN`, `pozisyon`, `baslama_tarihi`, `sicil_no`, `sozlesme_suresi`, `aylik_maas`, `statuscode`, `departman_id`) VALUES
(1, 'Yasemin', 'Güral', '66666666666', 'İnsan Kaynakları Uzmanı', '2019-11-13', '1365421342013', '1 yıl', 5000, 1, 3),
(2, 'Remzi', 'Uyar', '44444444444', 'İnsan Kaynakları Yöneticisi', '2020-07-17', '3214123201234', '6 ay', 10000, 0, 3),
(3, 'Burcu', 'Türkmenoğlu', '68671247784', 'İnsan Kaynakları Personeli', '2020-06-19', '2214567964322', '1 yıl', 3000, 0, 3),
(4, 'Emel', 'Zor', '78327898345', 'İnsan Kaynakları Müdürü', '2019-05-16', '1234569853332', 'Yok', 15000, 1, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `isten_cikanlar`
--

CREATE TABLE `isten_cikanlar` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `TCKN` varchar(11) NOT NULL,
  `neden_1` int(11) NOT NULL,
  `neden_2` int(11) NOT NULL,
  `neden_3` int(11) NOT NULL,
  `ozel_neden` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `isten_cikanlar`
--

INSERT INTO `isten_cikanlar` (`id`, `ad`, `soyad`, `TCKN`, `neden_1`, `neden_2`, `neden_3`, `ozel_neden`) VALUES
(16, 'Fulya', 'Büyük', '88888888888', 3, 5, 10, ''),
(19, 'Fatih', 'Koç', '67456423473', 1, 0, 0, 'Çalışan şirketten kendisi ayrıldı.'),
(20, 'Cemal', 'Güven', '12332112332', 3, 5, 9, ''),
(21, 'Hayrullah', 'Bilir', '26673310034', 6, 8, 0, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `isten_cıkma_nedenleri`
--

CREATE TABLE `isten_cıkma_nedenleri` (
  `id` int(11) NOT NULL,
  `neden` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `isten_cıkma_nedenleri`
--

INSERT INTO `isten_cıkma_nedenleri` (`id`, `neden`) VALUES
(0, 'Belirtilmedi'),
(1, 'İşçinin işe girerken, sahip olduğu özellikler hakkında yalan/yanlış bilgi verildiğinin tespit edilmiş olması'),
(2, 'İşçinin işverene ya da ailesine hakaret etmesi, asılsız ihbar ve iftirada bulunması'),
(3, 'Ahlak dışı davranış, genel ahlak kurallarına uymamak'),
(4, 'Yıllık izin, mazeret izni ve ücretsiz izinlerin sürelerini ihlal etmek ve zamanında işe başlamamak'),
(5, 'Agresif davranışlarda bulunmak, amirlere ve emre uymamak'),
(6, 'İş yerine sarhoş ya da uyuşturucu madde etkisinde gelmesi ya da bunları iş yerinde kullanması'),
(7, 'İşverenin meslek sırlarını açıklaması ya da buna benzer doğrulukla ve bağlılıkla uyuşmayan işler yapması'),
(8, 'İşçinin kendi hatası nedeniyle iş güvenliğini tehlikeye atması'),
(9, 'İşçinin yapmakla ödevli bulunduğu görevleri kendisine hatırlatıldığı halde yapmamakta ısrar etmesi'),
(10, 'İşçiyi işyerinde bir haftadan fazla süre ile çalışmaktan alıkoyan zorlayıcı bir sebebin ortaya çıkması');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kalite_kontrol`
--

CREATE TABLE `kalite_kontrol` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `TCKN` varchar(11) NOT NULL,
  `pozisyon` varchar(50) NOT NULL,
  `baslama_tarihi` date NOT NULL,
  `sicil_no` varchar(13) NOT NULL,
  `sozlesme_suresi` varchar(10) NOT NULL,
  `aylik_maas` int(11) NOT NULL,
  `statuscode` tinyint(4) NOT NULL,
  `departman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kalite_kontrol`
--

INSERT INTO `kalite_kontrol` (`id`, `ad`, `soyad`, `TCKN`, `pozisyon`, `baslama_tarihi`, `sicil_no`, `sozlesme_suresi`, `aylik_maas`, `statuscode`, `departman_id`) VALUES
(1, 'Eren', 'Erdoğan', '22222222222', 'Kalite Kontrol Uzmanı', '2019-05-15', '3332145796542', 'Yok', 9500, 1, 4),
(2, 'Can', 'Bozok', '36222346789', 'Kalite Kontrol Personeli', '2020-01-02', '1573437837447', '3 yıl', 6000, 0, 4),
(3, 'Zeynep', 'Üstün', '32782126578', 'Kalite Kontrol Mühendisi', '2020-01-17', '1757878378544', '3 yıl', 12000, 0, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `k_ad` varchar(50) NOT NULL,
  `k_soyad` varchar(50) NOT NULL,
  `TCKN` varchar(11) NOT NULL,
  `sifre` char(32) NOT NULL,
  `rol_id` tinyint(4) NOT NULL,
  `departman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `k_ad`, `k_soyad`, `TCKN`, `sifre`, `rol_id`, `departman_id`) VALUES
(1, 'Ahmet', 'Öz', '98765678909', '81dc9bdb52d04dc20036dbd8313ed055', 2, 2),
(2, 'Esra', 'Eker', '12345654321', '827ccb0eea8a706c4c34a16891f84e7b', 2, 2),
(6, 'Hakan', 'Bircan', '55555555555', '21232f297a57a5a743894a0e4a801fc3', 2, 1),
(8, 'Eren', 'Erdoğan', '22222222222', '764e3cc1c8deb1b922f7ae3ce959d354', 2, 4),
(9, 'Yasemin', 'Güral', '66666666666', '428ae27d8fab45d4882b12d39724a5ea', 2, 3),
(12, 'Furkan', 'Hacıbebekoğlu', '52213466616', 'dbbac1a1f37624735935e861ecd8e165', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `muhasebe_finans`
--

CREATE TABLE `muhasebe_finans` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `TCKN` varchar(11) NOT NULL,
  `pozisyon` varchar(50) NOT NULL,
  `baslama_tarihi` date NOT NULL,
  `sicil_no` varchar(13) NOT NULL,
  `sozlesme_suresi` varchar(10) NOT NULL,
  `aylik_maas` int(11) NOT NULL,
  `statuscode` tinyint(4) NOT NULL,
  `departman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `muhasebe_finans`
--

INSERT INTO `muhasebe_finans` (`id`, `ad`, `soyad`, `TCKN`, `pozisyon`, `baslama_tarihi`, `sicil_no`, `sozlesme_suresi`, `aylik_maas`, `statuscode`, `departman_id`) VALUES
(1, 'Osman', 'Öztürk', '94257943487', 'Mali Müşavir', '2019-08-02', '1346765437688', 'Yok', 8500, 1, 5),
(2, 'Volkan', 'İğneci', '59237927344', 'Muhasebe Uzmanı', '2020-04-10', '3775778754444', '1 yıl', 3500, 0, 5),
(3, 'İsmet', 'Arabacı', '32238901200', 'Muhasebe Şefi', '2020-03-14', '2411190060676', 'Yok', 8000, 0, 5),
(4, 'Ahmet', 'Taşpınar', '43523724568', 'Finans Uzmanı', '2020-01-22', '2346724646845', 'Yok', 7000, 0, 5),
(5, 'Ömer', 'Kurtuluş', '23523824829', 'Mali İşler Direktörü', '2019-09-13', '2135743237433', 'Yok', 20000, 1, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roller`
--

CREATE TABLE `roller` (
  `rol_id` tinyint(4) NOT NULL,
  `rol_ad` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `roller`
--

INSERT INTO `roller` (`rol_id`, `rol_ad`) VALUES
(1, 'Yönetici'),
(2, 'Kullanıcı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satis_pazarlama`
--

CREATE TABLE `satis_pazarlama` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `TCKN` varchar(11) NOT NULL,
  `pozisyon` varchar(50) NOT NULL,
  `baslama_tarihi` date NOT NULL,
  `sicil_no` varchar(13) NOT NULL,
  `sozlesme_suresi` varchar(10) NOT NULL,
  `aylik_maas` int(11) NOT NULL,
  `statuscode` tinyint(4) NOT NULL,
  `departman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `satis_pazarlama`
--

INSERT INTO `satis_pazarlama` (`id`, `ad`, `soyad`, `TCKN`, `pozisyon`, `baslama_tarihi`, `sicil_no`, `sozlesme_suresi`, `aylik_maas`, `statuscode`, `departman_id`) VALUES
(1, 'Emel', 'Uğur', '33767554247', 'Satış Pazarlama Yöneticisi', '2020-08-24', '1755334577942', '3 yıl', 10000, 1, 7),
(2, 'Pelin', 'İnan', '88966543442', 'Satış Pazarlama Personeli', '2019-09-20', '1235475241377', 'Yok', 5500, 1, 7),
(3, 'Tuncay', 'Akar', '37333242627', 'Satış Pazarlama Uzmanı', '2019-10-16', '1234587747377', 'Yok', 7500, 1, 7),
(4, 'Fethi', 'Aslan', '32452624534', 'Satış Pazarlama Müdürü', '2019-07-12', '2312768453282', 'Yok', 15000, 1, 7);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sekreterlik`
--

CREATE TABLE `sekreterlik` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `TCKN` varchar(11) NOT NULL,
  `pozisyon` varchar(50) NOT NULL,
  `baslama_tarihi` date NOT NULL,
  `sicil_no` varchar(13) NOT NULL,
  `sozlesme_suresi` varchar(10) NOT NULL,
  `aylik_maas` int(11) NOT NULL,
  `statuscode` tinyint(4) NOT NULL,
  `departman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sekreterlik`
--

INSERT INTO `sekreterlik` (`id`, `ad`, `soyad`, `TCKN`, `pozisyon`, `baslama_tarihi`, `sicil_no`, `sozlesme_suresi`, `aylik_maas`, `statuscode`, `departman_id`) VALUES
(2, 'Ece', 'Şahin', '77777777777', 'Asistan', '2020-08-20', '2214567852017', '6 ay', 2500, 0, 6),
(3, 'Tuana', 'Deniz', '59349872497', 'Ofis Asistanı', '2020-02-07', '4221216896787', '3 yıl', 4000, 1, 6),
(4, 'Leyla', 'Ciğerci', '29450110394', 'Sekreter', '2020-02-01', '2458744747452', '3 yıl', 4000, 1, 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `status`
--

CREATE TABLE `status` (
  `statuscode` tinyint(4) NOT NULL,
  `status_info` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `status`
--

INSERT INTO `status` (`statuscode`, `status_info`) VALUES
(0, 'Yeni çalışan'),
(1, 'Mevcut çalışan'),
(2, 'İzinli');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilim_muhendisligi`
--

CREATE TABLE `yazilim_muhendisligi` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `TCKN` varchar(11) NOT NULL,
  `pozisyon` varchar(50) NOT NULL,
  `baslama_tarihi` date NOT NULL,
  `sicil_no` varchar(13) NOT NULL,
  `sozlesme_suresi` varchar(10) NOT NULL,
  `aylik_maas` int(11) NOT NULL,
  `statuscode` tinyint(4) NOT NULL,
  `departman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `yazilim_muhendisligi`
--

INSERT INTO `yazilim_muhendisligi` (`id`, `ad`, `soyad`, `TCKN`, `pozisyon`, `baslama_tarihi`, `sicil_no`, `sozlesme_suresi`, `aylik_maas`, `statuscode`, `departman_id`) VALUES
(1, 'Murat', 'Demir', '67676767676', 'Asistan Yazılımcı', '2020-08-22', '2233576854123', '6 ay', 2500, 0, 8),
(2, 'Kemal', 'Güney', '96436798334', 'Yazılım Uzmanı', '2019-10-19', '3443325677345', 'Yok', 7500, 1, 8),
(3, 'Berk', 'Erdemir', '12544433254', 'Stajyer', '2020-08-26', '1232342345465', 'Yok', 1000, 0, 8),
(4, 'Gizem', 'Kara', '23458754359', 'Stajyer', '2020-08-22', '2155343678489', 'Yok', 1000, 0, 8),
(5, 'Uğur', 'Yayla', '21341341923', 'Yazılım Müdürü', '2019-06-12', '1230067856443', '3 yıl', 13500, 1, 8);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetim`
--

CREATE TABLE `yonetim` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `TCKN` varchar(11) NOT NULL,
  `pozisyon` varchar(50) NOT NULL,
  `baslama_tarihi` date NOT NULL,
  `sicil_no` varchar(13) NOT NULL,
  `sozlesme_suresi` varchar(10) NOT NULL,
  `aylik_maas` int(11) NOT NULL,
  `statuscode` tinyint(4) NOT NULL,
  `departman_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `yonetim`
--

INSERT INTO `yonetim` (`id`, `ad`, `soyad`, `TCKN`, `pozisyon`, `baslama_tarihi`, `sicil_no`, `sozlesme_suresi`, `aylik_maas`, `statuscode`, `departman_id`) VALUES
(2, 'Hakan', 'Bircan', '55555555555', 'CEO', '2019-01-01', '1112439775234', 'Yok', 45000, 1, 1),
(4, 'Mustafa', 'Türkoğlu', '23876487384', 'Genel Müdür Yardımcısı', '2019-02-14', '1256689345956', 'Yok', 15000, 1, 1),
(6, 'Furkan', 'Hacıbebekoğlu', '52213466616', 'Her Şeyin Sahibi', '1998-12-04', '1111111111111', 'Yok', 1000000, 2, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `cagrimerkezi`
--
ALTER TABLE `cagrimerkezi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuscode` (`statuscode`),
  ADD KEY `departman_id` (`departman_id`);

--
-- Tablo için indeksler `departman_bilgi`
--
ALTER TABLE `departman_bilgi`
  ADD PRIMARY KEY (`departman_id`);

--
-- Tablo için indeksler `insan_kaynaklari`
--
ALTER TABLE `insan_kaynaklari`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuscode` (`statuscode`),
  ADD KEY `departman_id` (`departman_id`);

--
-- Tablo için indeksler `isten_cikanlar`
--
ALTER TABLE `isten_cikanlar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `neden_1` (`neden_1`,`neden_2`,`neden_3`),
  ADD KEY `neden_2` (`neden_2`),
  ADD KEY `neden_3` (`neden_3`);

--
-- Tablo için indeksler `isten_cıkma_nedenleri`
--
ALTER TABLE `isten_cıkma_nedenleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kalite_kontrol`
--
ALTER TABLE `kalite_kontrol`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuscode` (`statuscode`),
  ADD KEY `departman_id` (`departman_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `departman_id` (`departman_id`);

--
-- Tablo için indeksler `muhasebe_finans`
--
ALTER TABLE `muhasebe_finans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuscode` (`statuscode`),
  ADD KEY `departman_id` (`departman_id`);

--
-- Tablo için indeksler `roller`
--
ALTER TABLE `roller`
  ADD PRIMARY KEY (`rol_id`);

--
-- Tablo için indeksler `satis_pazarlama`
--
ALTER TABLE `satis_pazarlama`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuscode` (`statuscode`),
  ADD KEY `departman_id` (`departman_id`);

--
-- Tablo için indeksler `sekreterlik`
--
ALTER TABLE `sekreterlik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuscode` (`statuscode`),
  ADD KEY `departman_id` (`departman_id`);

--
-- Tablo için indeksler `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statuscode`);

--
-- Tablo için indeksler `yazilim_muhendisligi`
--
ALTER TABLE `yazilim_muhendisligi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuscode` (`statuscode`),
  ADD KEY `statuscode_2` (`statuscode`),
  ADD KEY `departman_id` (`departman_id`);

--
-- Tablo için indeksler `yonetim`
--
ALTER TABLE `yonetim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuscode` (`statuscode`),
  ADD KEY `statuscode_2` (`statuscode`),
  ADD KEY `departman_id` (`departman_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `cagrimerkezi`
--
ALTER TABLE `cagrimerkezi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `departman_bilgi`
--
ALTER TABLE `departman_bilgi`
  MODIFY `departman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `insan_kaynaklari`
--
ALTER TABLE `insan_kaynaklari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `isten_cikanlar`
--
ALTER TABLE `isten_cikanlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `isten_cıkma_nedenleri`
--
ALTER TABLE `isten_cıkma_nedenleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `kalite_kontrol`
--
ALTER TABLE `kalite_kontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `muhasebe_finans`
--
ALTER TABLE `muhasebe_finans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `roller`
--
ALTER TABLE `roller`
  MODIFY `rol_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `satis_pazarlama`
--
ALTER TABLE `satis_pazarlama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `sekreterlik`
--
ALTER TABLE `sekreterlik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `yazilim_muhendisligi`
--
ALTER TABLE `yazilim_muhendisligi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `yonetim`
--
ALTER TABLE `yonetim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `cagrimerkezi`
--
ALTER TABLE `cagrimerkezi`
  ADD CONSTRAINT `cagrimerkezi_ibfk_1` FOREIGN KEY (`statuscode`) REFERENCES `status` (`statuscode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cagrimerkezi_ibfk_2` FOREIGN KEY (`departman_id`) REFERENCES `departman_bilgi` (`departman_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `insan_kaynaklari`
--
ALTER TABLE `insan_kaynaklari`
  ADD CONSTRAINT `insan_kaynaklari_ibfk_1` FOREIGN KEY (`statuscode`) REFERENCES `status` (`statuscode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `insan_kaynaklari_ibfk_2` FOREIGN KEY (`departman_id`) REFERENCES `departman_bilgi` (`departman_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `isten_cikanlar`
--
ALTER TABLE `isten_cikanlar`
  ADD CONSTRAINT `isten_cikanlar_ibfk_1` FOREIGN KEY (`neden_1`) REFERENCES `isten_cıkma_nedenleri` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `isten_cikanlar_ibfk_2` FOREIGN KEY (`neden_2`) REFERENCES `isten_cıkma_nedenleri` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `isten_cikanlar_ibfk_3` FOREIGN KEY (`neden_3`) REFERENCES `isten_cıkma_nedenleri` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `kalite_kontrol`
--
ALTER TABLE `kalite_kontrol`
  ADD CONSTRAINT `kalite_kontrol_ibfk_1` FOREIGN KEY (`statuscode`) REFERENCES `status` (`statuscode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `kalite_kontrol_ibfk_2` FOREIGN KEY (`departman_id`) REFERENCES `departman_bilgi` (`departman_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD CONSTRAINT `kullanicilar_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roller` (`rol_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `kullanicilar_ibfk_2` FOREIGN KEY (`departman_id`) REFERENCES `departman_bilgi` (`departman_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `muhasebe_finans`
--
ALTER TABLE `muhasebe_finans`
  ADD CONSTRAINT `muhasebe_finans_ibfk_1` FOREIGN KEY (`statuscode`) REFERENCES `status` (`statuscode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `muhasebe_finans_ibfk_2` FOREIGN KEY (`departman_id`) REFERENCES `departman_bilgi` (`departman_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `satis_pazarlama`
--
ALTER TABLE `satis_pazarlama`
  ADD CONSTRAINT `satis_pazarlama_ibfk_1` FOREIGN KEY (`statuscode`) REFERENCES `status` (`statuscode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `satis_pazarlama_ibfk_2` FOREIGN KEY (`departman_id`) REFERENCES `departman_bilgi` (`departman_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `sekreterlik`
--
ALTER TABLE `sekreterlik`
  ADD CONSTRAINT `sekreterlik_ibfk_1` FOREIGN KEY (`statuscode`) REFERENCES `status` (`statuscode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sekreterlik_ibfk_2` FOREIGN KEY (`departman_id`) REFERENCES `departman_bilgi` (`departman_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `yazilim_muhendisligi`
--
ALTER TABLE `yazilim_muhendisligi`
  ADD CONSTRAINT `yazilim_muhendisligi_ibfk_1` FOREIGN KEY (`statuscode`) REFERENCES `status` (`statuscode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `yazilim_muhendisligi_ibfk_2` FOREIGN KEY (`departman_id`) REFERENCES `departman_bilgi` (`departman_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `yonetim`
--
ALTER TABLE `yonetim`
  ADD CONSTRAINT `yonetim_ibfk_1` FOREIGN KEY (`statuscode`) REFERENCES `status` (`statuscode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `yonetim_ibfk_2` FOREIGN KEY (`departman_id`) REFERENCES `departman_bilgi` (`departman_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
