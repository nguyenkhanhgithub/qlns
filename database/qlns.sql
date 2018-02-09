-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2018 at 09:16 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlns`
--

-- --------------------------------------------------------

--
-- Table structure for table `CAUTRALOI`
--

CREATE TABLE IF NOT EXISTS `CAUTRALOI` (
  `id` int(11) NOT NULL,
  `DapAn` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idCauHoi` int(11) DEFAULT NULL,
  `CauTraLoi` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `CAUTRALOI`
--

INSERT INTO `CAUTRALOI` (`id`, `DapAn`, `idCauHoi`, `CauTraLoi`) VALUES
(1, 'A', 1, 'Câu trả lời A'),
(2, 'B', 1, 'Câu trả lời B'),
(3, 'C', 1, 'Câu trả lời C'),
(4, 'D', 1, 'Câu trả lời D');

-- --------------------------------------------------------

--
-- Table structure for table `DANTOC`
--

CREATE TABLE IF NOT EXISTS `DANTOC` (
  `MaDanToc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenDanToc` varchar(30) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `DANTOC`
--

INSERT INTO `DANTOC` (`MaDanToc`, `TenDanToc`, `created_at`, `updated_at`) VALUES
('DT0001', 'Kinh', NULL, '2017-12-05 08:40:39'),
('DT0002', 'Hoa', NULL, NULL),
('DT0003', 'Khome', NULL, NULL),
('DT0004', 'Cham', NULL, NULL),
('DT0005', 'Sumerian', '2017-12-05 08:30:38', '2017-12-05 08:30:38'),
('DT006', 'Perian', '2017-12-05 08:32:26', '2017-12-05 08:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `DIEM`
--

CREATE TABLE IF NOT EXISTS `DIEM` (
  `STT` int(11) NOT NULL,
  `MaHocSinh` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocKy` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `MaNamHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaLoai` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `Diem` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `DIEM`
--

INSERT INTO `DIEM` (`STT`, `MaHocSinh`, `MaMonHoc`, `MaHocKy`, `MaNamHoc`, `MaLop`, `MaLoai`, `Diem`, `created_at`, `updated_at`) VALUES
(231, 'HS0002', 'MH0001', 'HK1', 'NH0708', 'LOP1010708', 'LD0001', 3, '2018-01-04 06:58:02', '2018-01-04 06:58:02'),
(232, 'HS0002', 'MH0001', 'HK1', 'NH0708', 'LOP1010708', 'LD0002', 3, '2018-01-04 06:58:02', '2018-01-04 06:58:02'),
(233, 'HS0002', 'MH0001', 'HK1', 'NH0708', 'LOP1010708', 'LD0003', 3, '2018-01-04 06:58:02', '2018-01-04 06:58:02'),
(234, 'HS0002', 'MH0001', 'HK1', 'NH0708', 'LOP1010708', 'LD0004', 1, '2018-01-04 06:58:02', '2018-01-04 06:58:02'),
(235, 'HS0002', 'MH0004', 'HK1', 'NH0708', 'LOP1010708', 'LD0001', 4, '2018-01-04 07:00:12', '2018-01-04 07:00:12'),
(236, 'HS0002', 'MH0004', 'HK1', 'NH0708', 'LOP1010708', 'LD0002', 4, '2018-01-04 07:00:12', '2018-01-04 07:00:12'),
(237, 'HS0002', 'MH0004', 'HK1', 'NH0708', 'LOP1010708', 'LD0003', 1, '2018-01-04 07:00:12', '2018-01-04 07:00:12'),
(238, 'HS0002', 'MH0004', 'HK1', 'NH0708', 'LOP1010708', 'LD0004', 3.5, '2018-01-04 07:00:12', '2018-01-04 07:00:12'),
(239, 'HS0002', 'MH0014', 'HK1', 'NH0708', 'LOP1010708', 'LD0001', 3, '2018-01-04 09:28:30', '2018-01-04 09:28:30'),
(240, 'HS0002', 'MH0014', 'HK1', 'NH0708', 'LOP1010708', 'LD0002', 3, '2018-01-04 09:28:30', '2018-01-04 09:28:30'),
(241, 'HS0002', 'MH0014', 'HK1', 'NH0708', 'LOP1010708', 'LD0003', 3, '2018-01-04 09:28:30', '2018-01-04 09:28:30'),
(242, 'HS0002', 'MH0014', 'HK1', 'NH0708', 'LOP1010708', 'LD0004', 3, '2018-01-04 09:28:30', '2018-01-04 09:28:30'),
(243, 'HS0002', 'MH0001', 'HK2', 'NH0708', 'LOP1010708', 'LD0001', 5, '2018-01-04 09:40:43', '2018-01-04 09:40:43'),
(244, 'HS0002', 'MH0001', 'HK2', 'NH0708', 'LOP1010708', 'LD0002', 5, '2018-01-04 09:40:43', '2018-01-04 09:40:43'),
(245, 'HS0002', 'MH0001', 'HK2', 'NH0708', 'LOP1010708', 'LD0003', 5, '2018-01-04 09:40:43', '2018-01-04 09:40:43'),
(246, 'HS0002', 'MH0001', 'HK2', 'NH0708', 'LOP1010708', 'LD0004', 5, '2018-01-04 09:40:43', '2018-01-04 09:40:43'),
(247, 'HS0002', 'MH0004', 'HK2', 'NH0708', 'LOP1010708', 'LD0001', 5, '2018-01-04 09:40:52', '2018-01-04 09:40:52'),
(248, 'HS0002', 'MH0004', 'HK2', 'NH0708', 'LOP1010708', 'LD0002', 5, '2018-01-04 09:40:53', '2018-01-04 09:40:53'),
(249, 'HS0002', 'MH0004', 'HK2', 'NH0708', 'LOP1010708', 'LD0003', 5, '2018-01-04 09:40:53', '2018-01-04 09:40:53'),
(250, 'HS0002', 'MH0004', 'HK2', 'NH0708', 'LOP1010708', 'LD0004', 5, '2018-01-04 09:40:53', '2018-01-04 09:40:53'),
(251, 'HS0002', 'MH0014', 'HK2', 'NH0708', 'LOP1010708', 'LD0001', 5, '2018-01-04 09:41:00', '2018-01-04 09:41:00'),
(252, 'HS0002', 'MH0014', 'HK2', 'NH0708', 'LOP1010708', 'LD0002', 5, '2018-01-04 09:41:00', '2018-01-04 09:41:00'),
(253, 'HS0002', 'MH0014', 'HK2', 'NH0708', 'LOP1010708', 'LD0003', 5, '2018-01-04 09:41:00', '2018-01-04 09:41:00'),
(254, 'HS0002', 'MH0014', 'HK2', 'NH0708', 'LOP1010708', 'LD0004', 5, '2018-01-04 09:41:00', '2018-01-04 09:41:00'),
(255, 'HS0003', 'MH0001', 'HK1', 'NH0708', 'LOP1010708', 'LD0001', 4, '2018-01-04 10:10:06', '2018-01-04 10:10:06'),
(256, 'HS0003', 'MH0001', 'HK1', 'NH0708', 'LOP1010708', 'LD0002', 4, '2018-01-04 10:10:06', '2018-01-04 10:10:06'),
(257, 'HS0003', 'MH0001', 'HK1', 'NH0708', 'LOP1010708', 'LD0003', 4, '2018-01-04 10:10:06', '2018-01-04 10:10:06'),
(258, 'HS0003', 'MH0001', 'HK1', 'NH0708', 'LOP1010708', 'LD0004', 4, '2018-01-04 10:10:06', '2018-01-04 10:10:06'),
(259, 'HS0003', 'MH0004', 'HK1', 'NH0708', 'LOP1010708', 'LD0001', 5, '2018-01-04 10:10:13', '2018-01-04 10:10:13'),
(260, 'HS0003', 'MH0004', 'HK1', 'NH0708', 'LOP1010708', 'LD0002', 5, '2018-01-04 10:10:13', '2018-01-04 10:10:13'),
(261, 'HS0003', 'MH0004', 'HK1', 'NH0708', 'LOP1010708', 'LD0003', 5, '2018-01-04 10:10:13', '2018-01-04 10:10:13'),
(262, 'HS0003', 'MH0004', 'HK1', 'NH0708', 'LOP1010708', 'LD0004', 5, '2018-01-04 10:10:13', '2018-01-04 10:10:13'),
(263, 'HS0003', 'MH0014', 'HK1', 'NH0708', 'LOP1010708', 'LD0001', 6, '2018-01-04 10:10:22', '2018-01-04 10:10:22'),
(264, 'HS0003', 'MH0014', 'HK1', 'NH0708', 'LOP1010708', 'LD0002', 6, '2018-01-04 10:10:22', '2018-01-04 10:10:22'),
(265, 'HS0003', 'MH0014', 'HK1', 'NH0708', 'LOP1010708', 'LD0003', 6, '2018-01-04 10:10:22', '2018-01-04 10:10:22'),
(266, 'HS0003', 'MH0014', 'HK1', 'NH0708', 'LOP1010708', 'LD0004', 6, '2018-01-04 10:10:23', '2018-01-04 10:10:23'),
(267, 'HS0003', 'MH0014', 'HK2', 'NH0708', 'LOP1010708', 'LD0001', 1, '2018-01-04 10:10:45', '2018-01-04 10:10:45'),
(268, 'HS0003', 'MH0014', 'HK2', 'NH0708', 'LOP1010708', 'LD0002', 1, '2018-01-04 10:10:45', '2018-01-04 10:10:45'),
(269, 'HS0003', 'MH0014', 'HK2', 'NH0708', 'LOP1010708', 'LD0003', 1, '2018-01-04 10:10:45', '2018-01-04 10:10:45'),
(270, 'HS0003', 'MH0014', 'HK2', 'NH0708', 'LOP1010708', 'LD0004', 1, '2018-01-04 10:10:45', '2018-01-04 10:10:45'),
(271, 'HS0003', 'MH0004', 'HK2', 'NH0708', 'LOP1010708', 'LD0001', 2, '2018-01-04 10:10:54', '2018-01-04 10:10:54'),
(272, 'HS0003', 'MH0004', 'HK2', 'NH0708', 'LOP1010708', 'LD0002', 2, '2018-01-04 10:10:54', '2018-01-04 10:10:54'),
(273, 'HS0003', 'MH0004', 'HK2', 'NH0708', 'LOP1010708', 'LD0003', 2, '2018-01-04 10:10:54', '2018-01-04 10:10:54'),
(274, 'HS0003', 'MH0004', 'HK2', 'NH0708', 'LOP1010708', 'LD0004', 2, '2018-01-04 10:10:54', '2018-01-04 10:10:54'),
(275, 'HS0003', 'MH0001', 'HK2', 'NH0708', 'LOP1010708', 'LD0001', 3, '2018-01-04 10:11:01', '2018-01-04 10:11:01'),
(276, 'HS0003', 'MH0001', 'HK2', 'NH0708', 'LOP1010708', 'LD0002', 3, '2018-01-04 10:11:01', '2018-01-04 10:11:01'),
(277, 'HS0003', 'MH0001', 'HK2', 'NH0708', 'LOP1010708', 'LD0003', 3, '2018-01-04 10:11:02', '2018-01-04 10:11:02'),
(278, 'HS0003', 'MH0001', 'HK2', 'NH0708', 'LOP1010708', 'LD0004', 3, '2018-01-04 10:11:02', '2018-01-04 10:11:02'),
(279, 'HS0004', 'MH0001', 'HK1', 'NH0708', 'LOP1010708', 'LD0001', 1, '2018-01-05 01:20:19', '2018-01-05 01:20:19'),
(280, 'HS0004', 'MH0001', 'HK1', 'NH0708', 'LOP1010708', 'LD0002', 3, '2018-01-05 01:20:19', '2018-01-05 01:20:19'),
(281, 'HS0004', 'MH0001', 'HK1', 'NH0708', 'LOP1010708', 'LD0003', 6, '2018-01-05 01:20:19', '2018-01-05 01:20:19'),
(282, 'HS0004', 'MH0001', 'HK1', 'NH0708', 'LOP1010708', 'LD0004', 9, '2018-01-05 01:20:19', '2018-01-05 01:20:19'),
(283, 'HS0004', 'MH0004', 'HK1', 'NH0708', 'LOP1010708', 'LD0001', 3, '2018-01-05 01:20:32', '2018-01-05 01:20:32'),
(284, 'HS0004', 'MH0004', 'HK1', 'NH0708', 'LOP1010708', 'LD0002', 3.5, '2018-01-05 01:20:32', '2018-01-05 01:20:32'),
(285, 'HS0004', 'MH0004', 'HK1', 'NH0708', 'LOP1010708', 'LD0003', 7, '2018-01-05 01:20:32', '2018-01-05 01:20:32'),
(286, 'HS0004', 'MH0004', 'HK1', 'NH0708', 'LOP1010708', 'LD0004', 3, '2018-01-05 01:20:32', '2018-01-05 01:20:32'),
(287, 'HS0004', 'MH0014', 'HK1', 'NH0708', 'LOP1010708', 'LD0001', 4.3, '2018-01-05 01:20:45', '2018-01-05 01:20:45'),
(288, 'HS0004', 'MH0014', 'HK1', 'NH0708', 'LOP1010708', 'LD0002', 5.5, '2018-01-05 01:20:45', '2018-01-05 01:20:45'),
(289, 'HS0004', 'MH0014', 'HK1', 'NH0708', 'LOP1010708', 'LD0003', 3, '2018-01-05 01:20:46', '2018-01-05 01:20:46'),
(290, 'HS0004', 'MH0014', 'HK1', 'NH0708', 'LOP1010708', 'LD0004', 8, '2018-01-05 01:20:46', '2018-01-05 01:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `DOCTRUYEN`
--

CREATE TABLE IF NOT EXISTS `DOCTRUYEN` (
  `id` int(11) NOT NULL,
  `MaSach` int(11) DEFAULT NULL,
  `Chuong` int(11) DEFAULT NULL,
  `Noidung` text COLLATE utf8_unicode_ci,
  `GioiThieu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `DOCTRUYEN`
--

INSERT INTO `DOCTRUYEN` (`id`, `MaSach`, `Chuong`, `Noidung`, `GioiThieu`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '<p>Biết kể g&igrave; về A Knight in Shining Armor đ&acirc;y khi c&oacute; qu&aacute; nhiều điều để n&oacute;i. Kể rằng c&oacute; một ch&agrave;ng hiệp sĩ đẹp trai trong bộ &aacute;o gi&aacute;p s&aacute;ng ngời (tất nhi&ecirc;n rồi&nbsp;<img alt=":D" src="https://i0.wp.com/baotangsach.com/wp-includes/images/smilies/icon_biggrin.gif" />&nbsp;) Rằng ch&agrave;ng c&oacute; nhiệm vụ phải cứu một c&ocirc; n&agrave;ng sầu khổ ra khỏi ho&agrave;n cảnh khốn c&ugrave;ng.</p>\n\n<p>Thế nhưng đ&acirc;y mới l&agrave; khi c&acirc;u truyện rắc rối bắt đầu. Liệu ch&agrave;ng sẽ cứu c&ocirc; n&agrave;ng đang kh&oacute;c như mưa n&agrave;y thế n&agrave;o khi ch&agrave;ng bị đem từ thời trung cổ, vượt qua hơn bốn trăm năm về thời hiện đại. Nơi m&agrave; đối với ch&agrave;ng quần &aacute;o may sẵn l&agrave; một điều kỳ diệu; kem l&agrave; một sản phẩm chỉ c&oacute; một ph&ugrave; thủy cao tay ấn mới c&oacute; thể tạo ra; v&agrave; chỉ một chiếc điều khiển ti vi nhỏ xinh cũng c&oacute; thể khiến ta phải m&ecirc; mải cả đ&ecirc;m&hellip;</p>\n\n<p>V&agrave; rồi ch&agrave;ng sẽ phản ứng ra sao khi nhận ra rằng m&igrave;nh được đem tới thời hiện đại kh&ocirc;ng phải để cứu một tiểu thư đang l&acirc;m nguy, m&agrave; ch&iacute;nh c&ocirc; tiểu thư tốt bụng n&agrave;y sẽ l&agrave; đ&aacute;p &aacute;n cho những rắc rối trong cuộc sống của ch&agrave;ng trong qu&aacute; khứ&hellip;<br />\nMời c&aacute;c ss đ&oacute;n đọc</p>\n\n<p>*****</p>\n\n<p>A knight in shining armor kh&ocirc;ng phải l&agrave; một c&acirc;u chuyện kể về một c&ocirc; g&aacute;i cứng cỏi, mạnh mẽ hay quật cường, m&agrave; l&agrave; về một c&ocirc; n&agrave;ng ngờ ngệch, gi&agrave;u l&ograve;ng trắc ẩn. Nhưng Dougless c&oacute; một đức t&iacute;nh rất đ&aacute;ng để ngưỡng mộ, đ&oacute; l&agrave; khi c&ocirc; ấy tin tưởng v&agrave;o điều g&igrave; rồi th&igrave; sẽ kh&ocirc;ng bao giờ bỏ cuộc. Ch&iacute;nh điều n&agrave;y đ&atilde; khiến một c&ocirc; n&agrave;ng ngốc nghếch đến kh&oacute; tin c&oacute; thể gi&uacute;p một ch&agrave;ng hiệp sĩ thay đổi lại cả lịch sử, tạo n&ecirc;n những điều tốt đẹp v&agrave; c&oacute; &yacute; nghĩa hơn. Để rồi đến cuối h&agrave;nh tr&igrave;nh, khi kh&eacute;p quyển truyện lại, c&aacute;c ss sẽ thấy Dougless đ&atilde; t&igrave;m thấy được sự tự tin, điều g&igrave; l&agrave; cần thiết trong cuộc đời m&igrave;nh, v&agrave; quan trọng nhất l&agrave; một t&igrave;nh y&ecirc;u m&atilde;nh liệt bất chấp cả 400 năm c&aacute;ch biệt. wind nghĩ, c&oacute; lẽ đ&oacute; l&agrave; điều m&agrave; c&acirc;u chuyện muốn kể.</p>', NULL, '2018-01-13 08:48:26', '2018-01-13 08:48:26'),
(2, 8, 2, '<p>*****</p>\n\n<p>A knight in shining armor kh&ocirc;ng phải l&agrave; một c&acirc;u chuyện kể về một c&ocirc; g&aacute;i cứng cỏi, mạnh mẽ hay quật cường, m&agrave; l&agrave; về một c&ocirc; n&agrave;ng ngờ ngệch, gi&agrave;u l&ograve;ng trắc ẩn. Nhưng Dougless c&oacute; một đức t&iacute;nh rất đ&aacute;ng để ngưỡng mộ, đ&oacute; l&agrave; khi c&ocirc; ấy tin tưởng v&agrave;o điều g&igrave; rồi th&igrave; sẽ kh&ocirc;ng bao giờ bỏ cuộc. Ch&iacute;nh điều n&agrave;y đ&atilde; khiến một c&ocirc; n&agrave;ng ngốc nghếch đến kh&oacute; tin c&oacute; thể gi&uacute;p một ch&agrave;ng hiệp sĩ thay đổi lại cả lịch sử, tạo n&ecirc;n những điều tốt đẹp v&agrave; c&oacute; &yacute; nghĩa hơn. Để rồi đến cuối h&agrave;nh tr&igrave;nh, khi kh&eacute;p quyển truyện lại, c&aacute;c ss sẽ thấy Dougless đ&atilde; t&igrave;m thấy được sự tự tin, điều g&igrave; l&agrave; cần thiết trong cuộc đời m&igrave;nh, v&agrave; quan trọng nhất l&agrave; một t&igrave;nh y&ecirc;u m&atilde;nh liệt bất chấp cả 400 năm c&aacute;ch biệt. wind nghĩ, c&oacute; lẽ đ&oacute; l&agrave; điều m&agrave; c&acirc;u chuyện muốn kể.</p>', NULL, '2018-01-13 08:49:13', '2018-01-13 08:49:13');

-- --------------------------------------------------------

--
-- Table structure for table `EVENT`
--

CREATE TABLE IF NOT EXISTS `EVENT` (
  `id` int(11) NOT NULL,
  `TenSuKien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `className` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `EVENT`
--

INSERT INTO `EVENT` (`id`, `TenSuKien`, `className`, `created_at`, `updated_at`) VALUES
(1, 'Sự kiện 1', 'bg-success', '2017-12-15 09:33:22', '2017-12-15 09:33:22'),
(2, 'Sự kiện 2', 'bg-danger', '2017-12-15 09:38:43', '2017-12-15 09:38:43'),
(3, 'Sự kiện 3', 'bg-warning', '2017-12-15 09:39:23', '2017-12-15 09:39:23'),
(4, 'Sự kiện 4', 'bg-inverse', '2017-12-15 09:39:37', '2017-12-15 09:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `EVENTMENT`
--

CREATE TABLE IF NOT EXISTS `EVENTMENT` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `start` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `end` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `GhiChu` text COLLATE utf8_bin,
  `className` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `EVENTMENT`
--

INSERT INTO `EVENTMENT` (`id`, `title`, `start`, `end`, `GhiChu`, `className`, `created_at`, `updated_at`) VALUES
(112, 'Sự kiện 12', '2017-12-06 06:00:00', '2017-12-06 08:30:00', NULL, 'bg-danger', '2017-12-16 07:27:12', '2017-12-24 04:23:43'),
(113, 'I need You', '2017-11-30 01:00:00', '2017-11-30 03:00:00', NULL, 'bg-danger', '2017-12-16 07:29:45', '2017-12-16 10:06:45'),
(114, 'Sự kiện 1', '2017-11-30 19:00:00', '2017-11-30 20:00:00', NULL, 'bg-success', '2017-12-16 07:31:30', '2017-12-16 10:06:40'),
(115, 'Sự kiện 3', '2017-11-30 15:00:00', '2017-11-30 16:00:00', NULL, 'bg-warning', '2017-12-16 07:31:51', '2017-12-16 10:06:41'),
(117, 'Sự kiện 2', '2017-11-30 18:00:00', '2017-11-30 19:00:00', NULL, 'bg-danger', '2017-12-16 07:33:50', '2017-12-16 10:07:01'),
(118, 'Sự kiện 4', '2017-11-30 12:00:00', '2017-11-30 18:00:00', NULL, 'bg-success', '2017-12-16 07:35:18', '2017-12-16 10:06:43'),
(119, 'Sự kiện 2', '2017-11-30 17:00:00', '2017-11-30 23:00:00', NULL, 'bg-primary', '2017-12-16 07:35:54', '2017-12-16 10:05:03'),
(120, 'Sự kiện 2', '2017-11-28', '2017-11-28', NULL, 'bg-danger', '2017-12-23 02:36:47', '2017-12-23 02:36:47'),
(121, 'Sự kiện 4', '2017-12-05', '2017-12-05', NULL, 'bg-inverse', '2017-12-24 04:23:51', '2017-12-24 04:23:51'),
(122, 'Sự kiện 1', '2017-12-16', '2017-12-16', NULL, 'bg-success', '2017-12-30 08:22:10', '2017-12-30 08:22:10'),
(123, 'Sự kiện 3', '2018-01-01', '2018-01-01', NULL, 'bg-warning', '2018-01-04 07:56:58', '2018-01-04 07:56:58'),
(124, 'Sự kiện 1', '2018-01-04', '2018-01-04', NULL, 'bg-success', '2018-01-04 07:57:17', '2018-01-04 07:57:17'),
(125, 'Sự kiện 4', '2018-01-10', '2018-01-10', NULL, 'bg-inverse', '2018-01-12 03:21:41', '2018-01-12 03:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `GIAOVIEN`
--

CREATE TABLE IF NOT EXISTS `GIAOVIEN` (
  `MaGiaoVien` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenGiaoVien` varchar(30) CHARACTER SET utf8 NOT NULL,
  `DiaChi` varchar(50) CHARACTER SET utf8 NOT NULL,
  `DienThoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaMonHoc` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `GIAOVIEN`
--

INSERT INTO `GIAOVIEN` (`MaGiaoVien`, `TenGiaoVien`, `DiaChi`, `DienThoai`, `Email`, `MaMonHoc`, `created_at`, `updated_at`) VALUES
('GV0001', 'Nguyen Hoang Tung', '100 Tran Hung Dao, Long Xuyen', '0975058876', 'nguyenkhanh29121995@gmail.com', 'MH0001', NULL, NULL),
('GV0002', 'Phan Hong Nhung', 'Lac Quoi - Tri Ton', '0976630315', '9872.linhnguyen@gmail.com', 'MH0002', NULL, NULL),
('GV0003', 'Huynh Thanh Truc', '10C Nguyen Trung Truc, Chau Doc', '0699015456', 'linhhap20fsa@gmail.com', 'MH0003', NULL, NULL),
('GV0004', 'Lam Trung Toan', 'Long Dien B, An Phu', '0845241566', NULL, 'MH0004', NULL, NULL),
('GV0005', 'Huynh Tuc Tri', 'Rach Gia, Kien Giang', '0123456789', NULL, 'MH0005', NULL, NULL),
('GV0006', 'Le Thi Minh Nguyet', '000 Long Xuyen, An Giang', '0123456789', NULL, 'MH0006', NULL, NULL),
('GV007', 'Nguyễn Đức Tuấn', 'Hà Nội', '01634967729', NULL, 'MH0001', '2017-12-07 01:17:29', '2017-12-07 01:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `GROUPGV`
--

CREATE TABLE IF NOT EXISTS `GROUPGV` (
  `MaGiaoVien` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `idSuKien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `GV_LICH_MON`
--

CREATE TABLE IF NOT EXISTS `GV_LICH_MON` (
  `id` int(11) NOT NULL,
  `MaGiaoVien` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaMonHoc` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idThu` int(11) DEFAULT NULL,
  `idTiet` int(11) DEFAULT NULL,
  `idTuan` int(11) DEFAULT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TrangThai` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `GV_LICH_MON`
--

INSERT INTO `GV_LICH_MON` (`id`, `MaGiaoVien`, `MaMonHoc`, `idThu`, `idTiet`, `idTuan`, `MaLop`, `TrangThai`, `created_at`, `updated_at`) VALUES
(28, 'GV0001', 'MH0001', 1, 1, 2, 'LOP1010708', 'sang', NULL, '2018-01-02 01:47:39');

-- --------------------------------------------------------

--
-- Table structure for table `HANHKIEM`
--

CREATE TABLE IF NOT EXISTS `HANHKIEM` (
  `MaHanhKiem` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenHanhKiem` varchar(30) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `HANHKIEM`
--

INSERT INTO `HANHKIEM` (`MaHanhKiem`, `TenHanhKiem`, `created_at`, `updated_at`) VALUES
('HK0001', 'Tot', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `HOCKY`
--

CREATE TABLE IF NOT EXISTS `HOCKY` (
  `MaHocKy` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `TenHocKy` varchar(30) CHARACTER SET utf8 NOT NULL,
  `HeSo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `HOCKY`
--

INSERT INTO `HOCKY` (`MaHocKy`, `TenHocKy`, `HeSo`, `created_at`, `updated_at`) VALUES
('HK1', 'Hoc ky 1', 1, NULL, NULL),
('HK2', 'Học kỳ 2', 2, '2017-11-28 07:17:04', '2017-11-28 07:17:04'),
('HK3', 'Học kỳ 3', 1, '2017-11-28 07:17:21', '2017-11-28 07:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `HOCLUC`
--

CREATE TABLE IF NOT EXISTS `HOCLUC` (
  `MaHocLuc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenHocLuc` varchar(30) CHARACTER SET utf8 NOT NULL,
  `DiemCanDuoi` float NOT NULL,
  `DiemCanTren` float NOT NULL,
  `DiemKhongChe` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `HOCLUC`
--

INSERT INTO `HOCLUC` (`MaHocLuc`, `TenHocLuc`, `DiemCanDuoi`, `DiemCanTren`, `DiemKhongChe`, `created_at`, `updated_at`) VALUES
('HL0001', 'Gioi', 8, 10, 6.5, NULL, NULL),
('HL0002', 'Kém', 3, 3, 3, '2017-12-18 03:16:04', '2017-12-18 03:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `HOCSINH`
--

CREATE TABLE IF NOT EXISTS `HOCSINH` (
  `MaHocSinh` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(30) CHARACTER SET utf8 NOT NULL,
  `GioiTinh` bit(1) DEFAULT NULL,
  `NgaySinh` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiSinh` varchar(50) CHARACTER SET utf8 NOT NULL,
  `MaDanToc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaTonGiao` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenCha` varchar(30) CHARACTER SET utf8 NOT NULL,
  `MaNNghiepCha` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenMe` varchar(30) CHARACTER SET utf8 NOT NULL,
  `MaNNghiepMe` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `HOCSINH`
--

INSERT INTO `HOCSINH` (`MaHocSinh`, `HoTen`, `GioiTinh`, `NgaySinh`, `NoiSinh`, `MaDanToc`, `MaTonGiao`, `HoTenCha`, `MaNNghiepCha`, `HoTenMe`, `MaNNghiepMe`, `created_at`, `updated_at`) VALUES
('HS0001', 'Nguyen Van Tu', b'1', '0000-00-00 00:00:00', 'Long Xuyen', 'DT0001', 'TG0005', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0002', NULL, NULL),
('HS0002', 'Nguyen Ngoc An', b'1', '0000-00-00 00:00:00', 'Ben Tre', 'DT0001', 'TG0002', 'Biet chet lien', 'NN0003', 'Biet chet lien', 'NN0001', NULL, '2017-11-30 03:00:06'),
('HS0003', 'Le Hoang Anh', b'1', '0000-00-00 00:00:00', 'Cho Moi', 'DT0001', 'TG0004', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0005', NULL, NULL),
('HS0004', 'Huynh Thien Chi', b'1', '0000-00-00 00:00:00', 'Dong Thap', 'DT0001', 'TG0003', 'Biet chet lien', 'NN0002', 'Biet chet lien', 'NN0004', NULL, NULL),
('HS0005', 'Ly Ngoc Duy', b'1', '0000-00-00 00:00:00', 'Long Xuyen', 'DT0001', 'TG0005', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0002', NULL, NULL),
('HS0006', 'Huynh Ngoc Diep', b'1', '0000-00-00 00:00:00', 'Ben Tre', 'DT0001', 'TG0002', 'Biet chet lien', 'NN0003', 'Biet chet lien', 'NN0001', NULL, NULL),
('HS0007', 'Tran Thi Hue', b'1', '0000-00-00 00:00:00', 'Cho Moi', 'DT0001', 'TG0004', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0005', NULL, NULL),
('HS0008', 'Nguyen Thanh Huy', b'1', '0000-00-00 00:00:00', 'Dong Thap', 'DT0001', 'TG0003', 'Biet chet lien', 'NN0002', 'Biet chet lien', 'NN0004', NULL, NULL),
('HS0009', 'Tran Phuoc Lap', b'1', '0000-00-00 00:00:00', 'Long Xuyen', 'DT0001', 'TG0005', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0002', NULL, NULL),
('HS0010', 'Truong Thi Nga', b'1', '0000-00-00 00:00:00', 'Ben Tre', 'DT0001', 'TG0002', 'Biet chet lien', 'NN0003', 'Biet chet lien', 'NN0001', NULL, NULL),
('HS0011', 'Nguyen Thi Nga', b'1', '0000-00-00 00:00:00', 'Cho Moi', 'DT0001', 'TG0004', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0005', NULL, NULL),
('HS0012', 'Tran Thi Hong Nghi', b'1', '0000-00-00 00:00:00', 'Dong Thap', 'DT0001', 'TG0003', 'Biet chet lien', 'NN0002', 'Biet chet lien', 'NN0001', NULL, '2017-11-29 07:55:27'),
('HS0013', 'Huynh Thi My Ngoc', b'1', '0000-00-00 00:00:00', 'Long Xuyen', 'DT0001', 'TG0005', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0002', NULL, NULL),
('HS0014', 'Tran Thi My Nhan', b'1', '0000-00-00 00:00:00', 'Ben Tre', 'DT0001', 'TG0002', 'Biet chet lien', 'NN0003', 'Biet chet lien', 'NN0001', NULL, NULL),
('HS0015', 'Truong Thi Ngoc Nhung', b'1', '0000-00-00 00:00:00', 'Cho Moi', 'DT0001', 'TG0004', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0005', NULL, NULL),
('HS0016', 'Huynh Quoc Phuong', b'1', '0000-00-00 00:00:00', 'Dong Thap', 'DT0001', 'TG0003', 'Biet chet lien', 'NN0002', 'Biet chet lien', 'NN0004', NULL, NULL),
('HS0017', 'Ly Ngoc Phuong', b'1', '0000-00-00 00:00:00', 'Long Xuyen', 'DT0001', 'TG0005', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0002', NULL, NULL),
('HS0018', 'Nguyen Thi Phuong', b'1', '0000-00-00 00:00:00', 'Ben Tre', 'DT0001', 'TG0002', 'Biet chet lien', 'NN0003', 'Biet chet lien', 'NN0001', NULL, NULL),
('HS0019', 'Nguyen Phu Quoc', b'1', '0000-00-00 00:00:00', 'Cho Moi', 'DT0001', 'TG0004', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0005', NULL, NULL),
('HS0020', 'Vo Thien Quoc', b'1', '0000-00-00 00:00:00', 'Dong Thap', 'DT0001', 'TG0003', 'Biet chet lien', 'NN0002', 'Biet chet lien', 'NN0004', NULL, NULL),
('HS0021', 'Tran Van Rang', b'1', '0000-00-00 00:00:00', 'Long Xuyen', 'DT0001', 'TG0005', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0002', NULL, NULL),
('HS0022', 'Vo Huu Tanh', b'1', '0000-00-00 00:00:00', 'Ben Tre', 'DT0001', 'TG0002', 'Biet chet lien', 'NN0003', 'Biet chet lien', 'NN0001', NULL, NULL),
('HS0023', 'Le Minh Tam', b'1', '0000-00-00 00:00:00', 'Cho Moi', 'DT0001', 'TG0004', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0005', NULL, NULL),
('HS0024', 'Nguyen Duc Tam', b'1', '0000-00-00 00:00:00', 'Dong Thap', 'DT0001', 'TG0003', 'Biet chet lien', 'NN0002', 'Biet chet lien', 'NN0004', NULL, NULL),
('HS0025', 'Nguyen Thanh Tam', b'1', '0000-00-00 00:00:00', 'Long Xuyen', 'DT0001', 'TG0005', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0002', NULL, NULL),
('HS0026', 'Tran Ngoc Minh Tan', b'1', '0000-00-00 00:00:00', 'Ben Tre', 'DT0001', 'TG0002', 'Biet chet lien', 'NN0003', 'Biet chet lien', 'NN0001', NULL, NULL),
('HS0027', 'Duong Kim Thanh', b'1', '0000-00-00 00:00:00', 'Cho Moi', 'DT0001', 'TG0004', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0005', NULL, NULL),
('HS0028', 'Vang Si Thanh', b'1', '0000-00-00 00:00:00', 'Dong Thap', 'DT0001', 'TG0003', 'Biet chet lien', 'NN0002', 'Biet chet lien', 'NN0004', NULL, NULL),
('HS0029', 'Do Thi Bich Thao', b'1', '0000-00-00 00:00:00', 'Long Xuyen', 'DT0001', 'TG0005', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0002', NULL, NULL),
('HS0030', 'Ho Minh Thien', b'1', '0000-00-00 00:00:00', 'Ben Tre', 'DT0001', 'TG0002', 'Biet chet lien', 'NN0003', 'Biet chet lien', 'NN0001', NULL, NULL),
('HS0031', 'Nguyen Thi Anh Thu', b'1', '0000-00-00 00:00:00', 'Cho Moi', 'DT0001', 'TG0004', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0005', NULL, NULL),
('HS0032', 'Pham Nguyen B.Trinh', b'1', '0000-00-00 00:00:00', 'Dong Thap', 'DT0001', 'TG0003', 'Biet chet lien', 'NN0002', 'Biet chet lien', 'NN0004', NULL, NULL),
('HS0033', 'Vo Ngoc Trinh', b'1', '0000-00-00 00:00:00', 'Long Xuyen', 'DT0001', 'TG0005', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0002', NULL, NULL),
('HS0034', 'Nguyen Huynh Minh Tri', b'1', '0000-00-00 00:00:00', 'Ben Tre', 'DT0001', 'TG0002', 'Biet chet lien', 'NN0003', 'Biet chet lien', 'NN0001', NULL, NULL),
('HS0035', 'Do Xuan Trinh', b'1', '0000-00-00 00:00:00', 'Cho Moi', 'DT0001', 'TG0004', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0005', NULL, NULL),
('HS0036', 'Nguyen Hieu Trung', b'1', '0000-00-00 00:00:00', 'Dong Thap', 'DT0001', 'TG0003', 'Biet chet lien', 'NN0002', 'Biet chet lien', 'NN0004', NULL, NULL),
('HS0037', 'Nguyen Thanh Trung', b'1', '0000-00-00 00:00:00', 'Long Xuyen', 'DT0001', 'TG0005', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0002', NULL, NULL),
('HS0038', 'Tran Thanh Truc', b'1', '0000-00-00 00:00:00', 'Ben Tre', 'DT0001', 'TG0002', 'Biet chet lien', 'NN0003', 'Biet chet lien', 'NN0001', NULL, NULL),
('HS0039', 'Cao Minh Tuan', b'1', '0000-00-00 00:00:00', 'Cho Moi', 'DT0001', 'TG0004', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0005', NULL, NULL),
('HS0040', 'Nguyen Hoang Tuan', b'1', '0000-00-00 00:00:00', 'Dong Thap', 'DT0001', 'TG0003', 'Biet chet lien', 'NN0002', 'Biet chet lien', 'NN0004', NULL, NULL),
('HS0041', 'Truong Minh Tuyen', b'1', '0000-00-00 00:00:00', 'Long Xuyen', 'DT0001', 'TG0005', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0002', NULL, NULL),
('HS0042', 'Le Thanh Tung', b'1', '0000-00-00 00:00:00', 'Ben Tre', 'DT0001', 'TG0002', 'Biet chet lien', 'NN0003', 'Biet chet lien', 'NN0001', NULL, NULL),
('HS0043', 'Pham Thi Bich Vi', b'1', '0000-00-00 00:00:00', 'Cho Moi', 'DT0001', 'TG0004', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0005', NULL, NULL),
('HS0044', 'Dang Quang Vinh', b'1', '0000-00-00 00:00:00', 'Dong Thap', 'DT0001', 'TG0003', 'Biet chet lien', 'NN0002', 'Biet chet lien', 'NN0004', NULL, NULL),
('HS0045', 'Au Ngoc Vu', b'1', '0000-00-00 00:00:00', 'Long Xuyen', 'DT0001', 'TG0005', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0002', NULL, NULL),
('HS0046', 'Ho Thanh Vu', b'1', '0000-00-00 00:00:00', 'Ben Tre', 'DT0001', 'TG0002', 'Biet chet lien', 'NN0003', 'Biet chet lien', 'NN0001', NULL, NULL),
('HS0047', 'Phan Quoc Vuong', b'1', '0000-00-00 00:00:00', 'Cho Moi', 'DT0001', 'TG0004', 'Biet chet lien', 'NN0005', 'Biet chet lien', 'NN0005', NULL, NULL),
('HS0048', 'nguyễn văn A', NULL, '29/121995', '', 'DT0001', 'TG0001', 'nguyễn văn B', 'NN0001', 'nguyễn thị C', 'NN0001', '2017-11-30 08:47:06', '2017-11-30 08:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `KETQUA`
--

CREATE TABLE IF NOT EXISTS `KETQUA` (
  `MaKetQua` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenKetQua` varchar(30) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `KETQUA`
--

INSERT INTO `KETQUA` (`MaKetQua`, `TenKetQua`, `created_at`, `updated_at`) VALUES
('KQ0001', 'học lại', '2017-12-08 03:17:29', '2017-12-08 03:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `KHOILOP`
--

CREATE TABLE IF NOT EXISTS `KHOILOP` (
  `MaKhoiLop` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenKhoiLop` varchar(30) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `KHOILOP`
--

INSERT INTO `KHOILOP` (`MaKhoiLop`, `TenKhoiLop`, `created_at`, `updated_at`) VALUES
('KHOI10', 'Khoi 20', NULL, '2017-11-23 01:39:19'),
('KHOI11', 'Khoi 11', NULL, NULL),
('KHOI12', 'Khoi 12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `KQ_CA_NAM_MON_HOC`
--

CREATE TABLE IF NOT EXISTS `KQ_CA_NAM_MON_HOC` (
  `MaHocSinh` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaNamHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `DiemThiLai` float DEFAULT NULL,
  `DTBCaNam` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `KQ_CA_NAM_TONG_HOP`
--

CREATE TABLE IF NOT EXISTS `KQ_CA_NAM_TONG_HOP` (
  `MaHocSinh` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaNamHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocLuc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaHanhKiem` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `DTBCaNam` float NOT NULL,
  `MaKetQua` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `KQ_HOC_KY_MON_HOC`
--

CREATE TABLE IF NOT EXISTS `KQ_HOC_KY_MON_HOC` (
  `MaHocSinh` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocKy` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `MaNamHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `DTBKiemTra` float DEFAULT NULL,
  `DTBMonHocKy` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `KQ_HOC_KY_MON_HOC`
--

INSERT INTO `KQ_HOC_KY_MON_HOC` (`MaHocSinh`, `MaLop`, `MaMonHoc`, `MaHocKy`, `MaNamHoc`, `DTBKiemTra`, `DTBMonHocKy`, `created_at`, `updated_at`) VALUES
('HS0002', 'LOP1010708', 'MH0001', 'HK1', 'NH0708', NULL, 2.14286, '2018-01-04 06:58:01', '2018-01-04 06:58:01'),
('HS0002', 'LOP1010708', 'MH0001', 'HK2', 'NH0708', NULL, 5, '2018-01-04 09:40:43', '2018-01-04 09:40:43'),
('HS0002', 'LOP1010708', 'MH0004', 'HK1', 'NH0708', NULL, 2.92857, '2018-01-04 07:00:12', '2018-01-04 07:00:12'),
('HS0002', 'LOP1010708', 'MH0004', 'HK2', 'NH0708', NULL, 5, '2018-01-04 09:40:52', '2018-01-04 09:40:52'),
('HS0002', 'LOP1010708', 'MH0014', 'HK1', 'NH0708', NULL, 3, '2018-01-04 09:28:29', '2018-01-04 09:28:29'),
('HS0002', 'LOP1010708', 'MH0014', 'HK2', 'NH0708', NULL, 5, '2018-01-04 09:41:00', '2018-01-04 09:41:00'),
('HS0003', 'LOP1010708', 'MH0001', 'HK1', 'NH0708', NULL, 4, '2018-01-04 10:10:05', '2018-01-04 10:10:05'),
('HS0003', 'LOP1010708', 'MH0001', 'HK2', 'NH0708', NULL, 3, '2018-01-04 10:11:01', '2018-01-04 10:11:01'),
('HS0003', 'LOP1010708', 'MH0004', 'HK1', 'NH0708', NULL, 5, '2018-01-04 10:10:12', '2018-01-04 10:10:12'),
('HS0003', 'LOP1010708', 'MH0004', 'HK2', 'NH0708', NULL, 2, '2018-01-04 10:10:54', '2018-01-04 10:10:54'),
('HS0003', 'LOP1010708', 'MH0014', 'HK1', 'NH0708', NULL, 6, '2018-01-04 10:10:22', '2018-01-04 10:10:22'),
('HS0003', 'LOP1010708', 'MH0014', 'HK2', 'NH0708', NULL, 1, '2018-01-04 10:10:45', '2018-01-04 10:10:45'),
('HS0004', 'LOP1010708', 'MH0001', 'HK1', 'NH0708', NULL, 6.14286, '2018-01-05 01:20:18', '2018-01-05 01:20:18'),
('HS0004', 'LOP1010708', 'MH0004', 'HK1', 'NH0708', NULL, 4.21429, '2018-01-05 01:20:32', '2018-01-05 01:20:32'),
('HS0004', 'LOP1010708', 'MH0014', 'HK1', 'NH0708', NULL, 5.68571, '2018-01-05 01:20:45', '2018-01-05 01:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `KQ_HOC_KY_TONG_HOP`
--

CREATE TABLE IF NOT EXISTS `KQ_HOC_KY_TONG_HOP` (
  `MaHocSinh` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocKy` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `MaNamHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocLuc` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaHanhKiem` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DTBMonHocKy` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `KQ_HOC_KY_TONG_HOP`
--

INSERT INTO `KQ_HOC_KY_TONG_HOP` (`MaHocSinh`, `MaLop`, `MaHocKy`, `MaNamHoc`, `MaHocLuc`, `MaHanhKiem`, `DTBMonHocKy`, `created_at`, `updated_at`) VALUES
('HS0002', 'LOP1010708', 'HK1', 'NH0708', NULL, NULL, 2.69048, '2018-01-04 09:39:44', '2018-01-04 09:39:44'),
('HS0002', 'LOP1010708', 'HK2', 'NH0708', NULL, NULL, 5, '2018-01-04 10:06:44', '2018-01-04 10:06:44'),
('HS0003', 'LOP1010708', 'HK1', 'NH0708', NULL, NULL, 5, '2018-01-04 10:11:22', '2018-01-04 10:11:22'),
('HS0003', 'LOP1010708', 'HK2', 'NH0708', NULL, NULL, 2, '2018-01-04 10:12:15', '2018-01-04 10:12:15'),
('HS0004', 'LOP1010708', 'HK1', 'NH0708', NULL, NULL, 5.34762, '2018-01-05 01:20:59', '2018-01-05 01:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `LOAIDIEM`
--

CREATE TABLE IF NOT EXISTS `LOAIDIEM` (
  `MaLoai` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenLoai` varchar(30) CHARACTER SET utf8 NOT NULL,
  `HeSo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `LOAIDIEM`
--

INSERT INTO `LOAIDIEM` (`MaLoai`, `TenLoai`, `HeSo`) VALUES
('LD0001', 'Kiem tra mieng', 1),
('LD0002', 'Kiem tra 15 phut', 1),
('LD0003', 'Kiem tra 1 tiet', 2),
('LD0004', 'Thi hoc ky', 1);

-- --------------------------------------------------------

--
-- Table structure for table `LOAINGUOIDUNG`
--

CREATE TABLE IF NOT EXISTS `LOAINGUOIDUNG` (
  `MaLoai` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenLoaiND` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `LOAINGUOIDUNG`
--

INSERT INTO `LOAINGUOIDUNG` (`MaLoai`, `TenLoaiND`) VALUES
('LND001', 'Ban giam hieu'),
('LND002', 'Giao vien'),
('LND003', 'Nhan vien giao vu');

-- --------------------------------------------------------

--
-- Table structure for table `LOAISACH`
--

CREATE TABLE IF NOT EXISTS `LOAISACH` (
  `id` int(11) NOT NULL,
  `TenLoaiSach` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `LOAISACH`
--

INSERT INTO `LOAISACH` (`id`, `TenLoaiSach`) VALUES
(1, 'Sách cũ'),
(2, 'Sách mới');

-- --------------------------------------------------------

--
-- Table structure for table `LOP`
--

CREATE TABLE IF NOT EXISTS `LOP` (
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenLop` varchar(30) CHARACTER SET utf8 NOT NULL,
  `MaKhoiLop` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaNamHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `SiSo` int(11) NOT NULL,
  `MaGiaoVien` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `LOP`
--

INSERT INTO `LOP` (`MaLop`, `TenLop`, `MaKhoiLop`, `MaNamHoc`, `SiSo`, `MaGiaoVien`, `created_at`, `updated_at`) VALUES
('LOP1010708', '10A1', 'KHOI10', 'NH0708', 35, 'GV0006', NULL, '2017-11-22 07:34:48'),
('LOP1020708', '10A2', 'KHOI10', 'NH0708', 36, 'GV0005', NULL, NULL),
('LOP1030708', '10A3', 'KHOI10', 'NH0708', 34, 'GV0004', NULL, NULL),
('LOP1110708', '11A1', 'KHOI11', 'NH0708', 37, 'GV0003', NULL, NULL),
('LOP1120708', '11A2', 'KHOI11', 'NH0708', 38, 'GV0002', NULL, NULL),
('LOP1210708', '12A1', 'KHOI12', 'NH0708', 39, 'GV0001', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_12_22_082819_create_jobs_table', 1),
(2, '2017_12_22_082927_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `MONHOC`
--

CREATE TABLE IF NOT EXISTS `MONHOC` (
  `MaMonHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenMonHoc` varchar(30) CHARACTER SET utf8 NOT NULL,
  `SoTiet` int(11) NOT NULL,
  `HeSo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `MONHOC`
--

INSERT INTO `MONHOC` (`MaMonHoc`, `TenMonHoc`, `SoTiet`, `HeSo`, `created_at`, `updated_at`) VALUES
('MH0001', 'Toán Học', 90, 2, NULL, '2017-11-24 02:20:28'),
('MH0002', 'Vật Lý', 60, 1, NULL, '2017-11-24 02:20:49'),
('MH0003', 'Hóa Học', 60, 1, NULL, '2017-11-24 02:21:01'),
('MH0004', 'Sinh Hoc', 60, 1, NULL, NULL),
('MH0005', 'Ngu Van', 90, 3, NULL, '2017-11-24 02:04:44'),
('MH0006', 'Lich Su', 45, 1, NULL, NULL),
('MH0007', 'Dia Ly', 45, 1, NULL, NULL),
('MH0008', 'Anh Van', 45, 1, NULL, NULL),
('MH0009', 'GD Cong Dan', 30, 1, NULL, NULL),
('MH0010', 'Tin Hoc', 30, 1, NULL, NULL),
('MH0011', 'The Duc', 30, 2, NULL, '2017-11-24 02:15:13'),
('MH0012', 'Quoc Phong', 30, 1, NULL, NULL),
('MH0013', 'Cong Nghe', 30, 1, NULL, NULL),
('MH0014', 'Môn test', 45, 1, '2017-11-23 10:30:24', '2017-11-23 10:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `MUONSACH`
--

CREATE TABLE IF NOT EXISTS `MUONSACH` (
  `id` int(11) NOT NULL,
  `MaHocSinh` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaSach` int(11) DEFAULT NULL,
  `NgayMuon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayTra` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `MUONSACH`
--

INSERT INTO `MUONSACH` (`id`, `MaHocSinh`, `MaSach`, `NgayMuon`, `NgayTra`, `created_at`, `updated_at`, `TrangThai`) VALUES
(3, 'HS0002', 7, '12/01/2018', '20/12/2018', '2018-01-12 03:05:55', '2018-01-12 09:55:32', 0),
(4, 'HS0001', 8, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(5, 'HS0001', 9, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(6, 'HS0001', 10, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(7, 'HS0001', 11, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(8, 'HS0001', 12, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(9, 'HS0002', 12, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(10, 'HS0003', 12, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(11, 'HS0004', 12, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(12, 'HS0005', 12, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(13, 'HS0006', 12, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(14, 'HS0007', 12, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(15, 'HS0008', 12, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(16, 'HS0009', 12, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(17, 'HS0010', 12, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(18, 'HS0011', 12, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(19, 'HS0011', 13, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(20, 'HS0011', 14, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', '2018-01-13 02:04:20', 0),
(22, 'HS0011', 16, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(23, 'HS0011', 17, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(24, 'HS0001', 17, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0),
(25, 'HS0001', 18, '09/01/2018', '15/01/2018', '2018-01-12 17:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `NAMHOC`
--

CREATE TABLE IF NOT EXISTS `NAMHOC` (
  `MaNamHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenNamHoc` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `NAMHOC`
--

INSERT INTO `NAMHOC` (`MaNamHoc`, `TenNamHoc`, `created_at`, `updated_at`) VALUES
('NH0708', '2007 - 2008', NULL, '2017-11-28 03:22:04'),
('NH0809', '2008 - 2009', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `NGHENGHIEP`
--

CREATE TABLE IF NOT EXISTS `NGHENGHIEP` (
  `MaNghe` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenNghe` varchar(30) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `NGHENGHIEP`
--

INSERT INTO `NGHENGHIEP` (`MaNghe`, `TenNghe`, `created_at`, `updated_at`) VALUES
('NN0001', 'Noi tro', NULL, '2017-12-05 09:10:05'),
('NN0002', 'Giao vien', NULL, NULL),
('NN0003', 'Cong nhan', NULL, NULL),
('NN0004', 'Lam ruong', NULL, NULL),
('NN0005', 'Buon ban', NULL, NULL),
('NN006', 'a', '2017-12-08 03:20:17', '2017-12-08 03:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `NGUOIDUNG`
--

CREATE TABLE IF NOT EXISTS `NGUOIDUNG` (
  `MaND` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaLoai` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenND` varchar(30) CHARACTER SET utf8 NOT NULL,
  `TenDNhap` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `NGUOIDUNG`
--

INSERT INTO `NGUOIDUNG` (`MaND`, `MaLoai`, `TenND`, `TenDNhap`, `MatKhau`) VALUES
('ND0001', 'LND001', 'Nguyen Hoang Tung', 'admin', 'hoangtung'),
('ND0002', 'LND002', 'Phan Hong Nhung', 'hongnhung', 'hongnhung'),
('ND0003', 'LND003', 'Lam Trung Toan', 'trungtoan', 'toantrung');

-- --------------------------------------------------------

--
-- Table structure for table `NHAXUATBAN`
--

CREATE TABLE IF NOT EXISTS `NHAXUATBAN` (
  `id` int(11) NOT NULL,
  `TenNXB` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `NHAXUATBAN`
--

INSERT INTO `NHAXUATBAN` (`id`, `TenNXB`) VALUES
(1, 'NXB Kim Đồng'),
(2, 'NXB Đại Nam');

-- --------------------------------------------------------

--
-- Table structure for table `PHANCONG`
--

CREATE TABLE IF NOT EXISTS `PHANCONG` (
  `STT` int(11) NOT NULL,
  `MaNamHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaMonHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaGiaoVien` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=368 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `PHANCONG`
--

INSERT INTO `PHANCONG` (`STT`, `MaNamHoc`, `MaLop`, `MaMonHoc`, `MaGiaoVien`) VALUES
(365, 'NH0708', 'LOP1010708', 'MH0001', 'GV0001'),
(366, 'NH0708', 'LOP1010708', 'MH0014', 'GV0001'),
(367, 'NH0708', 'LOP1010708', 'MH0004', 'GV0001');

-- --------------------------------------------------------

--
-- Table structure for table `PHANLOP`
--

CREATE TABLE IF NOT EXISTS `PHANLOP` (
  `MaNamHoc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaKhoiLop` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaHocSinh` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `PHANLOP`
--

INSERT INTO `PHANLOP` (`MaNamHoc`, `MaKhoiLop`, `MaLop`, `MaHocSinh`) VALUES
('NH0708', 'KHOI10', 'LOP1010708', 'HS0002'),
('NH0708', 'KHOI10', 'LOP1010708', 'HS0003'),
('NH0708', 'KHOI10', 'LOP1010708', 'HS0004'),
('NH0708', 'KHOI10', 'LOP1010708', 'HS0005'),
('NH0708', 'KHOI10', 'LOP1010708', 'HS0006'),
('NH0708', 'KHOI10', 'LOP1010708', 'HS0007'),
('NH0708', 'KHOI10', 'LOP1010708', 'HS0008'),
('NH0708', 'KHOI10', 'LOP1010708', 'HS0009'),
('NH0708', 'KHOI10', 'LOP1010708', 'HS0010'),
('NH0708', 'KHOI10', 'LOP1020708', 'HS0011'),
('NH0708', 'KHOI10', 'LOP1020708', 'HS0012'),
('NH0708', 'KHOI10', 'LOP1020708', 'HS0013'),
('NH0708', 'KHOI10', 'LOP1020708', 'HS0014'),
('NH0708', 'KHOI10', 'LOP1020708', 'HS0015'),
('NH0708', 'KHOI10', 'LOP1020708', 'HS0016'),
('NH0708', 'KHOI10', 'LOP1020708', 'HS0017'),
('NH0708', 'KHOI10', 'LOP1020708', 'HS0018'),
('NH0708', 'KHOI10', 'LOP1020708', 'HS0019'),
('NH0708', 'KHOI10', 'LOP1020708', 'HS0020'),
('NH0708', 'KHOI10', 'LOP1030708', 'HS0001'),
('NH0708', 'KHOI11', 'LOP1110708', 'HS0021'),
('NH0708', 'KHOI11', 'LOP1110708', 'HS0022'),
('NH0708', 'KHOI11', 'LOP1110708', 'HS0023'),
('NH0708', 'KHOI11', 'LOP1110708', 'HS0024'),
('NH0708', 'KHOI11', 'LOP1110708', 'HS0025'),
('NH0708', 'KHOI11', 'LOP1110708', 'HS0026'),
('NH0708', 'KHOI11', 'LOP1110708', 'HS0027'),
('NH0708', 'KHOI11', 'LOP1110708', 'HS0028'),
('NH0708', 'KHOI11', 'LOP1110708', 'HS0029'),
('NH0708', 'KHOI11', 'LOP1110708', 'HS0030'),
('NH0708', 'KHOI11', 'LOP1120708', 'HS0031'),
('NH0708', 'KHOI11', 'LOP1120708', 'HS0032'),
('NH0708', 'KHOI11', 'LOP1120708', 'HS0033'),
('NH0708', 'KHOI11', 'LOP1120708', 'HS0034'),
('NH0708', 'KHOI11', 'LOP1120708', 'HS0035'),
('NH0708', 'KHOI11', 'LOP1120708', 'HS0036'),
('NH0708', 'KHOI11', 'LOP1120708', 'HS0037'),
('NH0708', 'KHOI11', 'LOP1120708', 'HS0038'),
('NH0708', 'KHOI11', 'LOP1120708', 'HS0039'),
('NH0708', 'KHOI11', 'LOP1120708', 'HS0040'),
('NH0708', 'KHOI12', 'LOP1210708', 'HS0041'),
('NH0708', 'KHOI12', 'LOP1210708', 'HS0042'),
('NH0708', 'KHOI12', 'LOP1210708', 'HS0043'),
('NH0708', 'KHOI12', 'LOP1210708', 'HS0044'),
('NH0708', 'KHOI12', 'LOP1210708', 'HS0045'),
('NH0708', 'KHOI12', 'LOP1210708', 'HS0046'),
('NH0708', 'KHOI12', 'LOP1210708', 'HS0047');

-- --------------------------------------------------------

--
-- Table structure for table `QUYDINH`
--

CREATE TABLE IF NOT EXISTS `QUYDINH` (
  `TuoiCanDuoi` int(11) NOT NULL,
  `TuoiCanTren` int(11) NOT NULL,
  `SiSoCanDuoi` int(11) NOT NULL,
  `SiSoCanTren` int(11) NOT NULL,
  `ThangDiem` int(11) NOT NULL,
  `TenTruong` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `DiaChiTruong` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `SACH`
--

CREATE TABLE IF NOT EXISTS `SACH` (
  `id` int(11) NOT NULL,
  `idLoaiSach` int(11) DEFAULT NULL,
  `TenSach` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TacGia` text COLLATE utf8_unicode_ci,
  `GhiChu` text COLLATE utf8_unicode_ci,
  `XuatBan` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idNXB` int(11) DEFAULT NULL,
  `idTheLoaiSach` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Image` text COLLATE utf8_unicode_ci,
  `MaSach` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `SACH`
--

INSERT INTO `SACH` (`id`, `idLoaiSach`, `TenSach`, `TacGia`, `GhiChu`, `XuatBan`, `idNXB`, `idTheLoaiSach`, `SoLuong`, `created_at`, `updated_at`, `Image`, `MaSach`) VALUES
(7, 1, 'DAYBOOK of Critical Reading and Writing', 'Fran Claggett Louann Reid Ruth Vinz', NULL, '2008', 2, 1, 20, '2018-01-08 07:42:00', '2018-01-08 08:38:39', NULL, 'SACH7G1gR'),
(8, 1, 'Even Big Guys Cry', 'Fran Claggett Louann Reid Ruth Vinz', NULL, '2009', 1, 1, 50, '2018-01-08 08:16:59', '2018-01-08 08:38:19', NULL, 'SACH8P1Q0'),
(9, 1, 'A Knight in Shining Armor', 'Jude Deveraux', NULL, '2000', 2, 1, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7G6GR'),
(10, 1, 'Anh Chàng Hobbit', 'Tác giả: J. R. R. Tolkien', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7G9GR'),
(11, 2, 'Animorphs', 'Katherine Alice Applegate', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7G9GR'),
(12, 2, 'Artemis Fowl 1', 'Katherine Alice Applegate', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7F9GR'),
(13, 2, 'Artemis Fowl 2 ', 'Katherine Alice Applegate', NULL, '2000', 2, 1, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7F9FR'),
(14, 2, 'Bí mật Nicholas Flamel Bất tử 1', 'Pháp Sư', NULL, '2000', 2, 1, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7F91R'),
(15, 1, 'Bí mật Nicholas Flamel Bất tử 1', ' Nữ Phù Thủy', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7F91D'),
(16, 2, 'Bí mật Nicholas Flamel Bất tử 2', 'Ảo thuật gia', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7F21D'),
(17, 2, 'Bí Mật Nicholas Flamel Bất Tử 3', 'DEATH OF JOAN OF ARC', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7F31D'),
(18, 2, 'Bí Mật Nicholas Flamel Bất Tử 5 ', '', NULL, '2000', 2, 1, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7F41D'),
(19, 2, 'Bí mật Nicholas Flamel Bất tử ', 'Nhà Giả Kim', NULL, '2000', 2, 1, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7F51D'),
(20, 2, 'Biên niên sử Narnia 1: Cháu trai Pháp Sư ', 'CSLewis', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7F61D'),
(21, 2, 'Biên niên sử Narnia 2: Sư tử, Phù thủy và cái tủ áo ', 'CSLewis', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7F69D'),
(22, 2, 'Biên niên sử Narnia 3: Con ngựa và cậu bé', 'CSLewis', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7FT9D'),
(23, 2, 'Biên niên sử Narnia 4: Hoàng tử Caspian ', 'CSLewis', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7FC9D'),
(24, 2, 'Biên niên sử Narnia 5: Trên con tàu hướng tới bình minh', 'CSLewis', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7FG9D'),
(25, 2, 'Biên niên sử Narnia 6: Chiếc ghế bạc', 'CSLewis', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7FG9T'),
(26, 2, 'Biên niên sử Narnia 7: Trận chiến cuối cùng ', 'CSLewis', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7FG9C'),
(27, 2, 'Chạng Vạng ', 'Stephenie Mayer', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7FG9X'),
(28, 2, 'Chúa Tể Của Những Chiếc Nhẫn ', 'Tác giả: J. R. R. Tolkien', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7FG9R'),
(29, 2, 'Giờ Ra Chơi Của Nhóc Nicolas', 'Sempe Gosinny', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7FG9Y'),
(30, 2, 'Hải Tặc Ma Cà Rồng', 'Justin Somper', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7FG9O'),
(31, 2, 'Hừng Đông', ' Stephenie Meyer', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7FG9P'),
(32, 2, 'Kỵ Sĩ Rồng', 'Cornelia Funke', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7FG9K'),
(33, 2, 'Midnight Sun ', ' Stephenie Meyer', NULL, '2000', 2, 2, 50, '2018-01-12 17:00:00', NULL, NULL, 'SACH7FG9L');

-- --------------------------------------------------------

--
-- Table structure for table `THELOAISACH`
--

CREATE TABLE IF NOT EXISTS `THELOAISACH` (
  `id` int(11) NOT NULL,
  `TenTheLoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `THELOAISACH`
--

INSERT INTO `THELOAISACH` (`id`, `TenTheLoai`) VALUES
(1, 'Tự nhiên'),
(2, 'Lịch sử'),
(3, 'Tiểu thuyết');

-- --------------------------------------------------------

--
-- Table structure for table `THU`
--

CREATE TABLE IF NOT EXISTS `THU` (
  `id` int(11) NOT NULL,
  `TenThu` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `THU`
--

INSERT INTO `THU` (`id`, `TenThu`) VALUES
(1, 'Thứ 2'),
(2, 'Thứ 3'),
(3, 'Thứ 4'),
(4, 'Thứ 5'),
(5, 'Thứ 6');

-- --------------------------------------------------------

--
-- Table structure for table `TIETHOC`
--

CREATE TABLE IF NOT EXISTS `TIETHOC` (
  `id` int(11) NOT NULL,
  `TenTiet` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `TIETHOC`
--

INSERT INTO `TIETHOC` (`id`, `TenTiet`) VALUES
(1, 'Tiết 1'),
(2, 'Tiết 2'),
(3, 'Tiết 3'),
(4, 'Tiết 4'),
(5, 'Tiết 5');

-- --------------------------------------------------------

--
-- Table structure for table `TONGIAO`
--

CREATE TABLE IF NOT EXISTS `TONGIAO` (
  `MaTonGiao` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `TenTonGiao` varchar(30) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `TONGIAO`
--

INSERT INTO `TONGIAO` (`MaTonGiao`, `TenTonGiao`, `created_at`, `updated_at`) VALUES
('TG0001', 'Khong', NULL, '2017-12-05 08:49:59'),
('TG0002', 'Phat', NULL, NULL),
('TG0003', 'PG Hoa Hao', NULL, NULL),
('TG0004', 'Thien Chua', NULL, NULL),
('TG0005', 'Tin Lanh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `TRACNGHIEM`
--

CREATE TABLE IF NOT EXISTS `TRACNGHIEM` (
  `id` int(11) NOT NULL,
  `CauHoi` text COLLATE utf8_unicode_ci,
  `DapAn` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaMonHoc` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `TRACNGHIEM`
--

INSERT INTO `TRACNGHIEM` (`id`, `CauHoi`, `DapAn`, `MaMonHoc`) VALUES
(1, 'Câu hỏi 1', 'A', 'MH0001'),
(2, 'Câu hỏi 2', 'B', 'MH0001'),
(3, 'Câu hỏi 3', 'C', 'MH0001'),
(4, 'Câu hỏi 4', 'D', 'MH0001'),
(5, 'Câu hỏi 5', 'A', 'MH0001');

-- --------------------------------------------------------

--
-- Table structure for table `TUAN`
--

CREATE TABLE IF NOT EXISTS `TUAN` (
  `id` int(11) NOT NULL,
  `BatDau` date DEFAULT NULL,
  `KetThuc` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `TUAN`
--

INSERT INTO `TUAN` (`id`, `BatDau`, `KetThuc`) VALUES
(1, '2017-12-04', '2017-12-08'),
(2, '2018-01-01', '2018-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `permission`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bùi Đức Phú', 'linhhap20fsa@gmail.com', 'LND001', '$2y$10$CEdbdsSMU9Nv.6yjdRMEtOhR0kdIiOBWtNR2Bup9upjueOPbcsM9m', 'y3fGZ8eUjNA5FDWocVbMBxtxdp3uIstO0wRlQpwf79scTRXwecRmXCeNO0Y5', '2016-06-09 03:05:09', '2016-06-18 07:06:27'),
(2, 'User_23333', 'nguyenkhanh29121995@gmail.com', 'LND001', '$2y$10$CEdbdsSMU9Nv.6yjdRMEtOhR0kdIiOBWtNR2Bup9upjueOPbcsM9m', NULL, '2016-06-09 03:05:09', '2017-11-20 09:03:06'),
(3, 'User_3', '9872.linhnguyen@gmail.com', 'LND003', '$2y$10$CEdbdsSMU9Nv.6yjdRMEtOhR0kdIiOBWtNR2Bup9upjueOPbcsM9m', NULL, '2016-06-09 03:05:09', NULL),
(4, 'User_4', 'linhhap20fsa2@gmail.com', 'LND003', '$2y$10$CEdbdsSMU9Nv.6yjdRMEtOhR0kdIiOBWtNR2Bup9upjueOPbcsM9m', NULL, '2016-06-09 03:05:10', NULL),
(5, 'User_5', 'user_5@mymail.com', 'LND003', '$2y$10$CEdbdsSMU9Nv.6yjdRMEtOhR0kdIiOBWtNR2Bup9upjueOPbcsM9m', NULL, '2016-06-09 03:05:10', NULL),
(6, 'User_6', 'user_6@mymail.com', 'LND003', '$2y$10$CEdbdsSMU9Nv.6yjdRMEtOhR0kdIiOBWtNR2Bup9upjueOPbcsM9m', NULL, '2016-06-09 03:05:10', NULL),
(7, 'User_7', 'user_7@mymail.com', 'LND003', '$2y$10$CEdbdsSMU9Nv.6yjdRMEtOhR0kdIiOBWtNR2Bup9upjueOPbcsM9m', NULL, '2016-06-09 03:05:10', NULL),
(8, 'User_8', 'user_8@mymail.com', 'LND003', '$2y$10$CEdbdsSMU9Nv.6yjdRMEtOhR0kdIiOBWtNR2Bup9upjueOPbcsM9m', NULL, '2016-06-09 03:05:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CAUTRALOI`
--
ALTER TABLE `CAUTRALOI`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCauHoi` (`idCauHoi`);

--
-- Indexes for table `DANTOC`
--
ALTER TABLE `DANTOC`
  ADD PRIMARY KEY (`MaDanToc`);

--
-- Indexes for table `DIEM`
--
ALTER TABLE `DIEM`
  ADD PRIMARY KEY (`STT`),
  ADD KEY `F_DIEM_HS` (`MaHocSinh`),
  ADD KEY `F_DIEM_MH` (`MaMonHoc`),
  ADD KEY `F_DIEM_HK` (`MaHocKy`),
  ADD KEY `F_DIEM_NH` (`MaNamHoc`),
  ADD KEY `F_DIEM_LOP` (`MaLop`),
  ADD KEY `F_DIEM_LD` (`MaLoai`);

--
-- Indexes for table `DOCTRUYEN`
--
ALTER TABLE `DOCTRUYEN`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Indexes for table `EVENT`
--
ALTER TABLE `EVENT`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `EVENTMENT`
--
ALTER TABLE `EVENTMENT`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `GIAOVIEN`
--
ALTER TABLE `GIAOVIEN`
  ADD PRIMARY KEY (`MaGiaoVien`),
  ADD KEY `F_GV_MH` (`MaMonHoc`);

--
-- Indexes for table `GROUPGV`
--
ALTER TABLE `GROUPGV`
  ADD PRIMARY KEY (`MaGiaoVien`,`idSuKien`),
  ADD KEY `idSuKien` (`idSuKien`);

--
-- Indexes for table `GV_LICH_MON`
--
ALTER TABLE `GV_LICH_MON`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaGiaoVien` (`MaGiaoVien`),
  ADD KEY `MaMonHoc` (`MaMonHoc`),
  ADD KEY `idThu` (`idThu`),
  ADD KEY `idTiet` (`idTiet`),
  ADD KEY `idTuan` (`idTuan`),
  ADD KEY `MaLop` (`MaLop`);

--
-- Indexes for table `HANHKIEM`
--
ALTER TABLE `HANHKIEM`
  ADD PRIMARY KEY (`MaHanhKiem`);

--
-- Indexes for table `HOCKY`
--
ALTER TABLE `HOCKY`
  ADD PRIMARY KEY (`MaHocKy`);

--
-- Indexes for table `HOCLUC`
--
ALTER TABLE `HOCLUC`
  ADD PRIMARY KEY (`MaHocLuc`);

--
-- Indexes for table `HOCSINH`
--
ALTER TABLE `HOCSINH`
  ADD PRIMARY KEY (`MaHocSinh`),
  ADD KEY `F_HS_DT` (`MaDanToc`),
  ADD KEY `F_HS_TG` (`MaTonGiao`),
  ADD KEY `F_HS_NNC` (`MaNNghiepCha`),
  ADD KEY `F_HS_NNM` (`MaNNghiepMe`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`(191),`reserved_at`);

--
-- Indexes for table `KETQUA`
--
ALTER TABLE `KETQUA`
  ADD PRIMARY KEY (`MaKetQua`);

--
-- Indexes for table `KHOILOP`
--
ALTER TABLE `KHOILOP`
  ADD PRIMARY KEY (`MaKhoiLop`);

--
-- Indexes for table `KQ_CA_NAM_MON_HOC`
--
ALTER TABLE `KQ_CA_NAM_MON_HOC`
  ADD PRIMARY KEY (`MaHocSinh`,`MaLop`,`MaMonHoc`,`MaNamHoc`),
  ADD KEY `F_KQCNMH_LOP` (`MaLop`),
  ADD KEY `F_KQCNMH_MH` (`MaMonHoc`),
  ADD KEY `F_KQCNMH_NH` (`MaNamHoc`);

--
-- Indexes for table `KQ_CA_NAM_TONG_HOP`
--
ALTER TABLE `KQ_CA_NAM_TONG_HOP`
  ADD PRIMARY KEY (`MaHocSinh`,`MaLop`,`MaNamHoc`),
  ADD KEY `F_KQCN_LOP` (`MaLop`),
  ADD KEY `F_KQCN_NH` (`MaNamHoc`),
  ADD KEY `F_KQCN_HL` (`MaHocLuc`),
  ADD KEY `F_KQCN_HKIEM` (`MaHanhKiem`),
  ADD KEY `F_KQCN_KQ` (`MaKetQua`);

--
-- Indexes for table `KQ_HOC_KY_MON_HOC`
--
ALTER TABLE `KQ_HOC_KY_MON_HOC`
  ADD PRIMARY KEY (`MaHocSinh`,`MaLop`,`MaMonHoc`,`MaHocKy`,`MaNamHoc`),
  ADD KEY `F_KQHKMH_LO` (`MaLop`),
  ADD KEY `F_KQHKMH_MH` (`MaMonHoc`),
  ADD KEY `F_KQHKMH_HK` (`MaHocKy`),
  ADD KEY `F_KQHKMH_NH` (`MaNamHoc`);

--
-- Indexes for table `KQ_HOC_KY_TONG_HOP`
--
ALTER TABLE `KQ_HOC_KY_TONG_HOP`
  ADD PRIMARY KEY (`MaHocSinh`,`MaHocKy`,`MaLop`,`MaNamHoc`),
  ADD KEY `F_KQHK_LOP` (`MaLop`),
  ADD KEY `F_KQHK_HK` (`MaHocKy`),
  ADD KEY `F_KQHK_NH` (`MaNamHoc`),
  ADD KEY `F_KQHK_HL` (`MaHocLuc`),
  ADD KEY `F_KQHK_HKIEM` (`MaHanhKiem`);

--
-- Indexes for table `LOAIDIEM`
--
ALTER TABLE `LOAIDIEM`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `LOAINGUOIDUNG`
--
ALTER TABLE `LOAINGUOIDUNG`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `LOAISACH`
--
ALTER TABLE `LOAISACH`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `LOP`
--
ALTER TABLE `LOP`
  ADD PRIMARY KEY (`MaLop`),
  ADD KEY `F_LOP_KL` (`MaKhoiLop`),
  ADD KEY `F_LOP_NH` (`MaNamHoc`),
  ADD KEY `F_LOP_GV` (`MaGiaoVien`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MONHOC`
--
ALTER TABLE `MONHOC`
  ADD PRIMARY KEY (`MaMonHoc`);

--
-- Indexes for table `MUONSACH`
--
ALTER TABLE `MUONSACH`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaHocSinh` (`MaHocSinh`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Indexes for table `NAMHOC`
--
ALTER TABLE `NAMHOC`
  ADD PRIMARY KEY (`MaNamHoc`);

--
-- Indexes for table `NGHENGHIEP`
--
ALTER TABLE `NGHENGHIEP`
  ADD PRIMARY KEY (`MaNghe`);

--
-- Indexes for table `NGUOIDUNG`
--
ALTER TABLE `NGUOIDUNG`
  ADD PRIMARY KEY (`MaND`),
  ADD KEY `F_ND_LND` (`MaLoai`);

--
-- Indexes for table `NHAXUATBAN`
--
ALTER TABLE `NHAXUATBAN`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PHANCONG`
--
ALTER TABLE `PHANCONG`
  ADD PRIMARY KEY (`STT`),
  ADD KEY `F_PC_NH` (`MaNamHoc`),
  ADD KEY `P_PC_LOP` (`MaLop`),
  ADD KEY `P_PC_MH` (`MaMonHoc`),
  ADD KEY `P_PC_GV` (`MaGiaoVien`);

--
-- Indexes for table `PHANLOP`
--
ALTER TABLE `PHANLOP`
  ADD PRIMARY KEY (`MaNamHoc`,`MaKhoiLop`,`MaLop`,`MaHocSinh`),
  ADD KEY `F_PL_KHOI` (`MaKhoiLop`),
  ADD KEY `F_PL_LOP` (`MaLop`),
  ADD KEY `F_PL_HS` (`MaHocSinh`);

--
-- Indexes for table `SACH`
--
ALTER TABLE `SACH`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLoaiSach` (`idLoaiSach`),
  ADD KEY `sach_ibfk_3` (`idNXB`),
  ADD KEY `idTheLoaiSach` (`idTheLoaiSach`);

--
-- Indexes for table `THELOAISACH`
--
ALTER TABLE `THELOAISACH`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `THU`
--
ALTER TABLE `THU`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TIETHOC`
--
ALTER TABLE `TIETHOC`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TONGIAO`
--
ALTER TABLE `TONGIAO`
  ADD PRIMARY KEY (`MaTonGiao`);

--
-- Indexes for table `TRACNGHIEM`
--
ALTER TABLE `TRACNGHIEM`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaMonHoc` (`MaMonHoc`);

--
-- Indexes for table `TUAN`
--
ALTER TABLE `TUAN`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CAUTRALOI`
--
ALTER TABLE `CAUTRALOI`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `DIEM`
--
ALTER TABLE `DIEM`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=291;
--
-- AUTO_INCREMENT for table `DOCTRUYEN`
--
ALTER TABLE `DOCTRUYEN`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `EVENT`
--
ALTER TABLE `EVENT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `EVENTMENT`
--
ALTER TABLE `EVENTMENT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `GV_LICH_MON`
--
ALTER TABLE `GV_LICH_MON`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `LOAISACH`
--
ALTER TABLE `LOAISACH`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `MUONSACH`
--
ALTER TABLE `MUONSACH`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `NHAXUATBAN`
--
ALTER TABLE `NHAXUATBAN`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `PHANCONG`
--
ALTER TABLE `PHANCONG`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=368;
--
-- AUTO_INCREMENT for table `SACH`
--
ALTER TABLE `SACH`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `THELOAISACH`
--
ALTER TABLE `THELOAISACH`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `THU`
--
ALTER TABLE `THU`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `TIETHOC`
--
ALTER TABLE `TIETHOC`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `TRACNGHIEM`
--
ALTER TABLE `TRACNGHIEM`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `TUAN`
--
ALTER TABLE `TUAN`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `CAUTRALOI`
--
ALTER TABLE `CAUTRALOI`
  ADD CONSTRAINT `cautraloi_ibfk_1` FOREIGN KEY (`idCauHoi`) REFERENCES `TRACNGHIEM` (`id`);

--
-- Constraints for table `DIEM`
--
ALTER TABLE `DIEM`
  ADD CONSTRAINT `F_DIEM_HK` FOREIGN KEY (`MaHocKy`) REFERENCES `HOCKY` (`MaHocKy`),
  ADD CONSTRAINT `F_DIEM_HS` FOREIGN KEY (`MaHocSinh`) REFERENCES `HOCSINH` (`MaHocSinh`),
  ADD CONSTRAINT `F_DIEM_LD` FOREIGN KEY (`MaLoai`) REFERENCES `LOAIDIEM` (`MaLoai`),
  ADD CONSTRAINT `F_DIEM_LOP` FOREIGN KEY (`MaLop`) REFERENCES `LOP` (`MaLop`),
  ADD CONSTRAINT `F_DIEM_MH` FOREIGN KEY (`MaMonHoc`) REFERENCES `MONHOC` (`MaMonHoc`),
  ADD CONSTRAINT `F_DIEM_NH` FOREIGN KEY (`MaNamHoc`) REFERENCES `NAMHOC` (`MaNamHoc`);

--
-- Constraints for table `DOCTRUYEN`
--
ALTER TABLE `DOCTRUYEN`
  ADD CONSTRAINT `doctruyen_ibfk_1` FOREIGN KEY (`MaSach`) REFERENCES `SACH` (`id`);

--
-- Constraints for table `GIAOVIEN`
--
ALTER TABLE `GIAOVIEN`
  ADD CONSTRAINT `F_GV_MH` FOREIGN KEY (`MaMonHoc`) REFERENCES `MONHOC` (`MaMonHoc`);

--
-- Constraints for table `GROUPGV`
--
ALTER TABLE `GROUPGV`
  ADD CONSTRAINT `groupgv_ibfk_1` FOREIGN KEY (`MaGiaoVien`) REFERENCES `GIAOVIEN` (`MaGiaoVien`),
  ADD CONSTRAINT `groupgv_ibfk_2` FOREIGN KEY (`idSuKien`) REFERENCES `EVENTMENT` (`id`);

--
-- Constraints for table `GV_LICH_MON`
--
ALTER TABLE `GV_LICH_MON`
  ADD CONSTRAINT `gv_lich_mon_ibfk_1` FOREIGN KEY (`MaGiaoVien`) REFERENCES `GIAOVIEN` (`MaGiaoVien`),
  ADD CONSTRAINT `gv_lich_mon_ibfk_2` FOREIGN KEY (`MaMonHoc`) REFERENCES `MONHOC` (`MaMonHoc`),
  ADD CONSTRAINT `gv_lich_mon_ibfk_3` FOREIGN KEY (`idThu`) REFERENCES `THU` (`id`),
  ADD CONSTRAINT `gv_lich_mon_ibfk_4` FOREIGN KEY (`idTiet`) REFERENCES `TIETHOC` (`id`),
  ADD CONSTRAINT `gv_lich_mon_ibfk_5` FOREIGN KEY (`idTuan`) REFERENCES `TUAN` (`id`),
  ADD CONSTRAINT `gv_lich_mon_ibfk_6` FOREIGN KEY (`MaLop`) REFERENCES `LOP` (`MaLop`);

--
-- Constraints for table `HOCSINH`
--
ALTER TABLE `HOCSINH`
  ADD CONSTRAINT `F_HS_DT` FOREIGN KEY (`MaDanToc`) REFERENCES `DANTOC` (`MaDanToc`),
  ADD CONSTRAINT `F_HS_NNC` FOREIGN KEY (`MaNNghiepCha`) REFERENCES `NGHENGHIEP` (`MaNghe`),
  ADD CONSTRAINT `F_HS_NNM` FOREIGN KEY (`MaNNghiepMe`) REFERENCES `NGHENGHIEP` (`MaNghe`),
  ADD CONSTRAINT `F_HS_TG` FOREIGN KEY (`MaTonGiao`) REFERENCES `TONGIAO` (`MaTonGiao`);

--
-- Constraints for table `KQ_CA_NAM_MON_HOC`
--
ALTER TABLE `KQ_CA_NAM_MON_HOC`
  ADD CONSTRAINT `F_KQCNMH_HS` FOREIGN KEY (`MaHocSinh`) REFERENCES `HOCSINH` (`MaHocSinh`),
  ADD CONSTRAINT `F_KQCNMH_LOP` FOREIGN KEY (`MaLop`) REFERENCES `LOP` (`MaLop`),
  ADD CONSTRAINT `F_KQCNMH_MH` FOREIGN KEY (`MaMonHoc`) REFERENCES `MONHOC` (`MaMonHoc`),
  ADD CONSTRAINT `F_KQCNMH_NH` FOREIGN KEY (`MaNamHoc`) REFERENCES `NAMHOC` (`MaNamHoc`);

--
-- Constraints for table `KQ_CA_NAM_TONG_HOP`
--
ALTER TABLE `KQ_CA_NAM_TONG_HOP`
  ADD CONSTRAINT `F_KQCN_HKIEM` FOREIGN KEY (`MaHanhKiem`) REFERENCES `HANHKIEM` (`MaHanhKiem`),
  ADD CONSTRAINT `F_KQCN_HL` FOREIGN KEY (`MaHocLuc`) REFERENCES `HOCLUC` (`MaHocLuc`),
  ADD CONSTRAINT `F_KQCN_HS` FOREIGN KEY (`MaHocSinh`) REFERENCES `HOCSINH` (`MaHocSinh`),
  ADD CONSTRAINT `F_KQCN_KQ` FOREIGN KEY (`MaKetQua`) REFERENCES `KETQUA` (`MaKetQua`),
  ADD CONSTRAINT `F_KQCN_LOP` FOREIGN KEY (`MaLop`) REFERENCES `LOP` (`MaLop`),
  ADD CONSTRAINT `F_KQCN_NH` FOREIGN KEY (`MaNamHoc`) REFERENCES `NAMHOC` (`MaNamHoc`);

--
-- Constraints for table `KQ_HOC_KY_MON_HOC`
--
ALTER TABLE `KQ_HOC_KY_MON_HOC`
  ADD CONSTRAINT `F_KQHKMH_HK` FOREIGN KEY (`MaHocKy`) REFERENCES `HOCKY` (`MaHocKy`),
  ADD CONSTRAINT `F_KQHKMH_HS` FOREIGN KEY (`MaHocSinh`) REFERENCES `HOCSINH` (`MaHocSinh`),
  ADD CONSTRAINT `F_KQHKMH_LO` FOREIGN KEY (`MaLop`) REFERENCES `LOP` (`MaLop`),
  ADD CONSTRAINT `F_KQHKMH_MH` FOREIGN KEY (`MaMonHoc`) REFERENCES `MONHOC` (`MaMonHoc`),
  ADD CONSTRAINT `F_KQHKMH_NH` FOREIGN KEY (`MaNamHoc`) REFERENCES `NAMHOC` (`MaNamHoc`);

--
-- Constraints for table `KQ_HOC_KY_TONG_HOP`
--
ALTER TABLE `KQ_HOC_KY_TONG_HOP`
  ADD CONSTRAINT `F_KQHK_HK` FOREIGN KEY (`MaHocKy`) REFERENCES `HOCKY` (`MaHocKy`),
  ADD CONSTRAINT `F_KQHK_HKIEM` FOREIGN KEY (`MaHanhKiem`) REFERENCES `HANHKIEM` (`MaHanhKiem`),
  ADD CONSTRAINT `F_KQHK_HL` FOREIGN KEY (`MaHocLuc`) REFERENCES `HOCLUC` (`MaHocLuc`),
  ADD CONSTRAINT `F_KQHK_HS` FOREIGN KEY (`MaHocSinh`) REFERENCES `HOCSINH` (`MaHocSinh`),
  ADD CONSTRAINT `F_KQHK_LOP` FOREIGN KEY (`MaLop`) REFERENCES `LOP` (`MaLop`),
  ADD CONSTRAINT `F_KQHK_NH` FOREIGN KEY (`MaNamHoc`) REFERENCES `NAMHOC` (`MaNamHoc`);

--
-- Constraints for table `LOP`
--
ALTER TABLE `LOP`
  ADD CONSTRAINT `F_LOP_GV` FOREIGN KEY (`MaGiaoVien`) REFERENCES `GIAOVIEN` (`MaGiaoVien`),
  ADD CONSTRAINT `F_LOP_KL` FOREIGN KEY (`MaKhoiLop`) REFERENCES `KHOILOP` (`MaKhoiLop`),
  ADD CONSTRAINT `F_LOP_NH` FOREIGN KEY (`MaNamHoc`) REFERENCES `NAMHOC` (`MaNamHoc`);

--
-- Constraints for table `MUONSACH`
--
ALTER TABLE `MUONSACH`
  ADD CONSTRAINT `muonsach_ibfk_1` FOREIGN KEY (`MaHocSinh`) REFERENCES `HOCSINH` (`MaHocSinh`),
  ADD CONSTRAINT `muonsach_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `SACH` (`id`);

--
-- Constraints for table `NGUOIDUNG`
--
ALTER TABLE `NGUOIDUNG`
  ADD CONSTRAINT `F_ND_LND` FOREIGN KEY (`MaLoai`) REFERENCES `LOAINGUOIDUNG` (`MaLoai`);

--
-- Constraints for table `PHANCONG`
--
ALTER TABLE `PHANCONG`
  ADD CONSTRAINT `F_PC_NH` FOREIGN KEY (`MaNamHoc`) REFERENCES `NAMHOC` (`MaNamHoc`),
  ADD CONSTRAINT `P_PC_GV` FOREIGN KEY (`MaGiaoVien`) REFERENCES `GIAOVIEN` (`MaGiaoVien`),
  ADD CONSTRAINT `P_PC_LOP` FOREIGN KEY (`MaLop`) REFERENCES `LOP` (`MaLop`),
  ADD CONSTRAINT `P_PC_MH` FOREIGN KEY (`MaMonHoc`) REFERENCES `MONHOC` (`MaMonHoc`);

--
-- Constraints for table `PHANLOP`
--
ALTER TABLE `PHANLOP`
  ADD CONSTRAINT `F_PL_HS` FOREIGN KEY (`MaHocSinh`) REFERENCES `HOCSINH` (`MaHocSinh`),
  ADD CONSTRAINT `F_PL_KHOI` FOREIGN KEY (`MaKhoiLop`) REFERENCES `KHOILOP` (`MaKhoiLop`),
  ADD CONSTRAINT `F_PL_LOP` FOREIGN KEY (`MaLop`) REFERENCES `LOP` (`MaLop`),
  ADD CONSTRAINT `F_PL_NH` FOREIGN KEY (`MaNamHoc`) REFERENCES `NAMHOC` (`MaNamHoc`);

--
-- Constraints for table `SACH`
--
ALTER TABLE `SACH`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`idLoaiSach`) REFERENCES `LOAISACH` (`id`),
  ADD CONSTRAINT `sach_ibfk_3` FOREIGN KEY (`idNXB`) REFERENCES `NHAXUATBAN` (`id`),
  ADD CONSTRAINT `sach_ibfk_4` FOREIGN KEY (`idTheLoaiSach`) REFERENCES `THELOAISACH` (`id`);

--
-- Constraints for table `TRACNGHIEM`
--
ALTER TABLE `TRACNGHIEM`
  ADD CONSTRAINT `tracnghiem_ibfk_1` FOREIGN KEY (`MaMonHoc`) REFERENCES `MONHOC` (`MaMonHoc`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
