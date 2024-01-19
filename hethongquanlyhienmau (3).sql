-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 03:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hethongquanlyhienmau`
--
CREATE DATABASE IF NOT EXISTS `hethongquanlyhienmau` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `hethongquanlyhienmau`;

-- --------------------------------------------------------

--
-- Table structure for table `benhvien`
--

DROP TABLE IF EXISTS `benhvien`;
CREATE TABLE `benhvien` (
  `id` int(11) NOT NULL,
  `TenVien` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `TrangThai` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benhvien`
--

INSERT INTO `benhvien` (`id`, `TenVien`, `DiaChi`, `TrangThai`) VALUES
(1, 'Bệnh viện Bạch Mai', 'Hai Bà Trưng, Hà Nội', NULL),
(2, 'Bệnh viện phụ sản trung ương', 'Hà Nội', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi`
--

DROP TABLE IF EXISTS `cauhoi`;
CREATE TABLE `cauhoi` (
  `id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cauhoi`
--

INSERT INTO `cauhoi` (`id`, `content`) VALUES
(1, 'Anh/chị đã từng hiến máu chưa?'),
(2, 'Hiện tại, anh/chị có bị các bệnh: viêm khớp, dạ dày, viêm gan/vàng da, bệnh tim, huyết áp thấp/cao'),
(3, 'Trong vòng 12 tháng gần đây, anh/chị có mắc các bệnh và đã được điều trị khỏi'),
(4, 'Trong vòng 06 tháng gần đây, anh/chị có bị một trong số các triệu chứng sau không?'),
(5, 'Trong 01 tháng gần đây anh/chị có'),
(6, 'Trong 07 ngày gần đây anh/chị có'),
(7, 'Câu hỏi dành cho phụ nữ'),
(8, 'Anh/chị có đồng ý xét nghiệm HIV, nhận thông báo và được tư vấn khi kết quả xét nghiệm HIV nghi ngờ '),
(9, 'Bạn đã tiêm vaccine Covid chưa?');

-- --------------------------------------------------------

--
-- Table structure for table `cungungmau`
--

DROP TABLE IF EXISTS `cungungmau`;
CREATE TABLE `cungungmau` (
  `id` int(11) NOT NULL,
  `id_vien` int(11) NOT NULL,
  `id_emp` varchar(12) DEFAULT NULL,
  `MaMau` int(11) NOT NULL,
  `LuongMau` int(11) DEFAULT NULL,
  `NgayCungUng` date DEFAULT current_timestamp(),
  `TrangThai` tinyint(4) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cungungmau`
--

INSERT INTO `cungungmau` (`id`, `id_vien`, `id_emp`, `MaMau`, `LuongMau`, `NgayCungUng`, `TrangThai`, `updated_at`, `created_at`) VALUES
(27, 1, '03082004888', 1, 0, '2024-01-18', 1, '2024-01-18 14:02:43', '2024-01-18 14:02:43'),
(28, 1, '03082004888', 2, 250, '2024-01-18', 1, '2024-01-18 14:02:43', '2024-01-18 14:02:43'),
(29, 1, '03082004888', 3, 0, '2024-01-18', 1, '2024-01-18 14:02:43', '2024-01-18 14:02:43'),
(30, 1, '03082004888', 4, 5595, '2024-01-18', 1, '2024-01-18 14:02:43', '2024-01-18 14:02:43'),
(31, 1, '03082004888', 5, 0, '2024-01-18', 1, '2024-01-18 14:02:43', '2024-01-18 14:02:43'),
(32, 1, '03082004888', 6, 86, '2024-01-18', 1, '2024-01-18 14:02:43', '2024-01-18 14:02:43'),
(33, 1, '03082004888', 7, 0, '2024-01-18', 1, '2024-01-18 14:02:43', '2024-01-18 14:02:43'),
(34, 1, '03082004888', 8, 8989, '2024-01-18', 1, '2024-01-18 14:02:43', '2024-01-18 14:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `donkham`
--

DROP TABLE IF EXISTS `donkham`;
CREATE TABLE `donkham` (
  `id` int(11) NOT NULL,
  `MaCauTL` int(11) DEFAULT NULL,
  `CanNang` float DEFAULT NULL,
  `NhietDo` float DEFAULT NULL,
  `Time1` datetime DEFAULT current_timestamp(),
  `HuyetAp1` float DEFAULT NULL,
  `Mach1` float DEFAULT NULL,
  `Time2` datetime DEFAULT current_timestamp(),
  `HuyetAp2` float DEFAULT NULL,
  `Mach2` float DEFAULT NULL,
  `Hemoglobine` float DEFAULT NULL,
  `ViemGanB` float DEFAULT NULL,
  `TrangThaiKham` tinyint(4) DEFAULT 0,
  `TrangThai` tinyint(4) DEFAULT NULL COMMENT '1:khỏe, 2:không đủ sk',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_phieudangky` int(11) NOT NULL,
  `user_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donkham`
--

INSERT INTO `donkham` (`id`, `MaCauTL`, `CanNang`, `NhietDo`, `Time1`, `HuyetAp1`, `Mach1`, `Time2`, `HuyetAp2`, `Mach2`, `Hemoglobine`, `ViemGanB`, `TrangThaiKham`, `TrangThai`, `created_at`, `updated_at`, `id_phieudangky`, `user_id`) VALUES
(1, 1, 48, 36.6, '2024-01-02 21:47:45', 110, 90, '2024-01-02 21:47:45', 110, 90, 123, 123, 0, 1, NULL, NULL, 1, '03475611111'),
(3, 13, 46, 36, '2024-01-05 10:28:19', 150, 90, '2024-01-05 10:28:19', 150, 100, 123, 123, 0, 1, '2024-01-05 03:28:19', '2024-01-05 03:28:19', 18, '033576'),
(19, 2, 50, 36, '2024-01-17 21:23:17', 120, 90, '2024-01-17 21:23:17', 121, 90, 123, 123, 0, 1, '2024-01-17 14:23:17', '2024-01-17 14:23:17', 8, '000999888777');

-- --------------------------------------------------------

--
-- Table structure for table `giaychungnhan`
--

DROP TABLE IF EXISTS `giaychungnhan`;
CREATE TABLE `giaychungnhan` (
  `id` int(11) NOT NULL,
  `MaDK` int(11) NOT NULL,
  `NgayCap` date NOT NULL DEFAULT current_timestamp(),
  `TrangThai` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: Da cap, 0: Chua cap',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giaychungnhan`
--

INSERT INTO `giaychungnhan` (`id`, `MaDK`, `NgayCap`, `TrangThai`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-12-14', 1, '2024-01-16 23:47:20', '2024-01-16 23:47:20'),
(2, 18, '2024-01-17', 1, '2024-01-17 08:17:11', '2024-01-17 08:17:11'),
(3, 8, '2024-01-17', 1, '2024-01-17 14:34:54', '2024-01-17 14:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `lichhienmau`
--

DROP TABLE IF EXISTS `lichhienmau`;
CREATE TABLE `lichhienmau` (
  `id` int(11) NOT NULL,
  `NgayHien` date NOT NULL,
  `SoNguoiCanHien` int(11) DEFAULT NULL,
  `TongLuongMau` int(11) DEFAULT NULL,
  `SoNguoiDKy` int(11) DEFAULT NULL,
  `SoNguoiDaHien` int(11) DEFAULT NULL,
  `LuongMauDaNhan` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT current_timestamp(),
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lichhienmau`
--

INSERT INTO `lichhienmau` (`id`, `NgayHien`, `SoNguoiCanHien`, `TongLuongMau`, `SoNguoiDKy`, `SoNguoiDaHien`, `LuongMauDaNhan`, `updated_at`, `created_at`) VALUES
(1, '2023-12-14', 50, 10000, 50, 25, 5000, '2023-12-22', '2023-12-22'),
(2, '2023-12-15', 50, 15000, 10, 0, 0, '2023-12-22', '2023-12-22'),
(3, '2023-12-16', 30, 5000, 10, 0, 0, '2023-12-22', '2023-12-22'),
(4, '2023-12-17', 40, 10000, 23, 0, 0, '2023-12-22', '2023-12-22'),
(6, '2023-12-23', NULL, NULL, NULL, NULL, NULL, '2023-12-21', '2023-12-21'),
(7, '2023-12-24', 20, 10000, 0, 0, 0, '2023-12-21', '2023-12-21'),
(9, '2023-12-26', NULL, NULL, NULL, NULL, NULL, '2023-12-21', '2023-12-21'),
(10, '2023-12-27', NULL, NULL, NULL, NULL, NULL, '2023-12-21', '2023-12-21'),
(11, '2023-12-28', NULL, NULL, NULL, NULL, NULL, '2023-12-21', '2023-12-21'),
(12, '2023-12-29', NULL, NULL, NULL, NULL, NULL, '2023-12-21', '2023-12-21'),
(13, '2023-12-30', NULL, NULL, NULL, NULL, NULL, '2023-12-21', '2023-12-21'),
(14, '2023-12-31', NULL, NULL, NULL, NULL, NULL, '2023-12-21', '2023-12-21'),
(15, '2024-01-02', NULL, NULL, NULL, NULL, NULL, '2023-12-21', '2023-12-21'),
(16, '2024-01-17', NULL, NULL, NULL, NULL, NULL, '2023-12-21', '2023-12-21'),
(17, '2024-01-18', NULL, NULL, NULL, NULL, NULL, '2023-12-21', '2023-12-21'),
(20, '2024-01-09', NULL, NULL, NULL, NULL, NULL, '2023-12-21', '2023-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhommau`
--

DROP TABLE IF EXISTS `nhommau`;
CREATE TABLE `nhommau` (
  `MaMau` int(11) NOT NULL,
  `NhomMau` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhommau`
--

INSERT INTO `nhommau` (`MaMau`, `NhomMau`) VALUES
(0, '0'),
(1, 'A-'),
(2, 'B-'),
(3, 'O-'),
(4, 'AB-'),
(5, 'A+'),
(6, 'B+'),
(7, 'O+'),
(8, 'AB+');

-- --------------------------------------------------------

--
-- Table structure for table `phieudangky`
--

DROP TABLE IF EXISTS `phieudangky`;
CREATE TABLE `phieudangky` (
  `id` int(11) NOT NULL,
  `id_lich` int(11) NOT NULL,
  `NgayDK` date NOT NULL DEFAULT current_timestamp(),
  `LuongMau` int(11) DEFAULT NULL,
  `TrangThaiHien` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1: Da hien, 0: Chua hien',
  `Ykienbacsi` tinyint(4) DEFAULT NULL,
  `user_id` varchar(12) NOT NULL,
  `MaCauTL` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phieudangky`
--

INSERT INTO `phieudangky` (`id`, `id_lich`, `NgayDK`, `LuongMau`, `TrangThaiHien`, `Ykienbacsi`, `user_id`, `MaCauTL`, `created_at`, `updated_at`) VALUES
(1, 16, '2023-12-15', 250, 1, 1, '03475611111', 1, '2023-12-23', '2024-01-03'),
(8, 17, '2024-01-04', 350, 1, 1, '000999888777', 2, '2024-01-04', '2024-01-04'),
(18, 17, '2024-01-05', 250, 1, 1, '033576', 13, '2024-01-05', '2024-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `phieutraloi`
--

DROP TABLE IF EXISTS `phieutraloi`;
CREATE TABLE `phieutraloi` (
  `q1` text NOT NULL,
  `q2` text NOT NULL,
  `q3` text NOT NULL,
  `q4` text NOT NULL,
  `q5` text NOT NULL,
  `q6` text NOT NULL,
  `q7` text NOT NULL,
  `q8` text NOT NULL,
  `q9` text NOT NULL,
  `MaCauTL` int(11) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phieutraloi`
--

INSERT INTO `phieutraloi` (`q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `MaCauTL`, `user_id`, `created_at`, `updated_at`) VALUES
('[\"\\u0110\\u00e3 t\\u1eebng\"]\r\n', '[\"C\\u00f3\"]\r\n', '[\"S\\u1ed1t r\\u00e9t, giang mai, lao, vi\\u00eam n\\u00e3o, ph\\u1eabu thu\\u1eadt ngo\\u1ea1i khoa?\",\"\\u0110\\u01b0\\u1ee3c truy\\u1ec1n m\\u00e1u v\\u00e0 c\\u00e1c ch\\u1ebf ph\\u1ea9m m\\u00e1u?\",\"abc\"]\n', '[\"S\\u00fat c\\u00e2n nhanh kh\\u00f4ng r\\u00f5 nguy\\u00ean nh\\u00e2n?\",\"N\\u1ed5i h\\u1ea1ch k\\u00e9o d\\u00e0i?\",\"X\\u0103m m\\u00ecnh, x\\u1ecf l\\u1ed7 tai, l\\u1ed7 m\\u0169i.\"]\n', '[\"Kh\\u1ecfi b\\u1ec7nh sau khi m\\u1eafc b\\u1ec7nh vi\\u00eam \\u0111\\u01b0\\u1eddng ti\\u1ebft ni\\u1ec7u, vi\\u00eam da nhi\\u1ec5m tr\\u00f9ng, vi\\u00eam ph\\u00ea qu\\u1ea3n, vi\\u00eam ph\\u1ed5i, s\\u1edfi, quai b\\u1ecb, Rubella, Kh\\u00e1c\"]\n', '[\"B\\u1ecb c\\u1ea3m c\\u00fam (ho, nh\\u1ee9c \\u0111\\u1ea7u, s\\u1ed1t...)?\"]\n', '[\"Kh\\u00f4ng\"]\r\n', '[\"C\\u00f3\"]\r\n', '[\"\\u0110\\u00e3 ti\\u00eam\"]\r\n', 1, '03475611111', '2024-01-02 14:48:07', '2024-01-02 14:48:07'),
('[\"\\u0110\\u00e3 t\\u1eebng\"]\r\n', '[\"C\\u00f3\"]\r\n', '[\"S\\u1ed1t r\\u00e9t, giang mai, lao, vi\\u00eam n\\u00e3o, ph\\u1eabu thu\\u1eadt ngo\\u1ea1i khoa?\",\"\\u0110\\u01b0\\u1ee3c truy\\u1ec1n m\\u00e1u v\\u00e0 c\\u00e1c ch\\u1ebf ph\\u1ea9m m\\u00e1u?\",\"abc\"]\r\n', '[\"S\\u00fat c\\u00e2n nhanh kh\\u00f4ng r\\u00f5 nguy\\u00ean nh\\u00e2n?\",\"N\\u1ed5i h\\u1ea1ch k\\u00e9o d\\u00e0i?\",\"X\\u0103m m\\u00ecnh, x\\u1ecf l\\u1ed7 tai, l\\u1ed7 m\\u0169i.\"]\r\n', '[\"Kh\\u1ecfi b\\u1ec7nh sau khi m\\u1eafc b\\u1ec7nh vi\\u00eam \\u0111\\u01b0\\u1eddng ti\\u1ebft ni\\u1ec7u, vi\\u00eam da nhi\\u1ec5m tr\\u00f9ng, vi\\u00eam ph\\u00ea qu\\u1ea3n, vi\\u00eam ph\\u1ed5i, s\\u1edfi, quai b\\u1ecb, Rubella, Kh\\u00e1c\"]\r\n', '[\"B\\u1ecb c\\u1ea3m c\\u00fam (ho, nh\\u1ee9c \\u0111\\u1ea7u, s\\u1ed1t...)?\"]\r\n', '[\"Kh\\u00f4ng\"]\r\n', '[\"C\\u00f3\"]\r\n', '[\"\\u0110\\u00e3 ti\\u00eam\"]\r\n', 2, '000999888777', '2024-01-04 04:05:06', '2024-01-04 04:05:06'),
('[\"\\u0110\\u00e3 t\\u1eebng\"]', '[\"Kh\\u00f4ng\"]', '[\"Kh\\u00f4ng\"]', '[\"Kh\\u00f4ng\"]', '[\"Kh\\u00f4ng\"]', '[\"Kh\\u00f4ng\"]', '[\"Kh\\u00f4ng\"]', '[\"C\\u00f3\"]', '[\"\\u0110\\u00e3 ti\\u00eam\"]', 13, '033576', '2024-01-05 03:27:19', '2024-01-05 03:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'Nhân viên (Y tá, lễ '),
(2, 'Bác sĩ'),
(3, 'Admin'),
(4, 'Khách hàng'),
(5, 'Quản lí cung ứng');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` tinyint(4) DEFAULT 1 COMMENT '1: nam, 0:nữ',
  `birthday` date DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `workplace` varchar(100) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `MaMau` int(11) DEFAULT 0,
  `role` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `birthday`, `address`, `workplace`, `job`, `phone`, `note`, `MaMau`, `role`, `created_at`, `updated_at`) VALUES
('000999888777', 'Bùi Duy Đông', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 4, '2024-01-04 10:04:05', '2024-01-04 10:04:05'),
('0011223344', 'Nguyễn Anh Linh', NULL, '$2y$12$jtpjrmj3OjtCfpE6xhi1m.H9MBseHCL9tQNTpl3BMkKT83LvVMDQi', 1, '2000-11-11', 'Ninh Thuận', NULL, NULL, '0762365464', NULL, 0, 2, '2023-12-29 03:58:44', '2023-12-29 03:58:44'),
('03082004888', 'Nguyễn Khánh Vân', NULL, '$2y$12$NpIJkvHMCMFaqPDU/4Sd/e..vrPNyJeATxqxamFjTZi.j51ttqfXi', 0, '2004-03-08', 'Hà Nội', NULL, NULL, '0559165167', NULL, 0, 5, '2024-01-03 13:09:51', '2024-01-03 13:09:51'),
('033576', 'Nguyễn Diệu Linh', 'linh@gmail.com', '$2y$12$3N4/JQQigx6rWXlE9fIcWOS0O2JOqFmlg.YAnlb8rsiR2ZCXksrHW', 0, '2003-01-02', 'Đông Anh, Hà Nội', NULL, 'Sinh viên', '0657345634', NULL, 3, 4, '2024-01-05 03:06:14', '2024-01-05 03:06:14'),
('03475611111', 'Nguyễn Khánh Vy', NULL, NULL, 0, '2000-11-06', 'Sơn La', 'Hải Phòng', NULL, '034753467', NULL, 2, 4, NULL, '2024-01-04 02:23:43'),
('1000000000', 'Trịnh Thanh Huế', NULL, '$2y$12$GaoqLP8pPz.139ikyTmbBuCfyn8/c31oZzR9.Pj/UAAbkvSlJ5EEq', 0, '1999-11-11', 'Hà Nội', 'Quảng Ninh', NULL, '0960002803', NULL, 5, 1, '2023-12-29 03:05:10', '2024-01-03 14:00:07'),
('111111', 'Bùi Minh Thư', NULL, '$2y$12$zvUSN4Ovy6r1isPsrtdQtO22F1d8Vra0xOExUixq0ljkYKObTAgqG', 0, '2001-02-22', 'Đà Nẵng', NULL, NULL, '097778899', NULL, 0, 2, '2023-12-30 15:15:03', '2023-12-30 15:15:03'),
('123456', 'Viện truyền máu huyết học Trung ương', 'huyethoccc@gmail.com', '$2y$12$k/xnXio6LJFfJhZSSvnhu.vIgQCcDxk2MXJXXmQ2K2UDTcQyE5ka6', 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, '2023-12-29 02:38:25', '2023-12-29 02:38:25'),
('1234567', 'Nguyễn Diệu Thúy', NULL, '$2y$12$r2gyAbgmema85bqMykCfHOIwP4ypxxWvdVbgK59HMMwfTl2T0skA.', 0, '2000-11-11', 'Phú Thọ', NULL, NULL, '0987654321', NULL, 0, 2, '2023-12-29 15:44:44', '2023-12-29 15:44:44');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwcungung`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwcungung`;
CREATE TABLE `vwcungung` (
`id` int(11)
,`id_vien` int(11)
,`id_emp` varchar(12)
,`MaMau` int(11)
,`LuongMau` int(11)
,`NgayCungUng` date
,`TrangThai` tinyint(4)
,`TenVien` varchar(100)
,`NhomMau` varchar(10)
,`name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwemp`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwemp`;
CREATE TABLE `vwemp` (
`id` varchar(12)
,`name` varchar(50)
,`email` varchar(50)
,`password` varchar(100)
,`gender` tinyint(4)
,`birthday` date
,`address` varchar(200)
,`workplace` varchar(100)
,`job` varchar(50)
,`phone` varchar(12)
,`note` text
,`MaMau` int(11)
,`role` int(11)
,`created_at` datetime
,`updated_at` datetime
,`roles` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwhistorydonateblood`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwhistorydonateblood`;
CREATE TABLE `vwhistorydonateblood` (
`LuongMau` int(11)
,`TrangThaiHien` tinyint(4)
,`id` varchar(12)
,`name` varchar(50)
,`email` varchar(50)
,`password` varchar(100)
,`gender` tinyint(4)
,`birthday` date
,`address` varchar(200)
,`workplace` varchar(100)
,`job` varchar(50)
,`phone` varchar(12)
,`note` mediumtext
,`MaMau` int(11)
,`role` int(11)
,`created_at` datetime
,`updated_at` datetime
,`NgayHien` date
,`NhomMau` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwinday`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwinday`;
CREATE TABLE `vwinday` (
`id` int(11)
,`id_lich` int(11)
,`NgayDK` date
,`LuongMau` int(11)
,`TrangThaiHien` tinyint(4)
,`Ykienbacsi` tinyint(4)
,`user_id` varchar(12)
,`MaCauTL` int(11)
,`name` varchar(50)
,`gender` tinyint(4)
,`NhomMau` varchar(10)
,`NgayHien` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwindaynew`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwindaynew`;
CREATE TABLE `vwindaynew` (
`id` int(11)
,`id_lich` int(11)
,`NgayDK` date
,`LuongMau` int(11)
,`TrangThaiHien` tinyint(4)
,`Ykienbacsi` tinyint(4)
,`user_id` varchar(12)
,`MaCauTL` int(11)
,`created_at` date
,`updated_at` date
,`NgayHien` date
,`name` varchar(50)
,`gender` tinyint(4)
,`NhomMau` varchar(10)
,`TrangThai` tinyint(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwinfoclient`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwinfoclient`;
CREATE TABLE `vwinfoclient` (
`id` varchar(12)
,`name` varchar(50)
,`email` varchar(50)
,`password` varchar(100)
,`gender` tinyint(4)
,`birthday` date
,`address` varchar(200)
,`workplace` varchar(100)
,`job` varchar(50)
,`phone` varchar(12)
,`note` text
,`MaMau` int(11)
,`role` int(11)
,`created_at` datetime
,`updated_at` datetime
,`NhomMau` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtongmau`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwtongmau`;
CREATE TABLE `vwtongmau` (
`Tongmau` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtongmauabminus`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwtongmauabminus`;
CREATE TABLE `vwtongmauabminus` (
`TongmauABminus` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtongmauabplus`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwtongmauabplus`;
CREATE TABLE `vwtongmauabplus` (
`TongmauABplus` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtongmauaminus`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwtongmauaminus`;
CREATE TABLE `vwtongmauaminus` (
`TongmauAminus` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtongmauaplus`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwtongmauaplus`;
CREATE TABLE `vwtongmauaplus` (
`TongmauAplus` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtongmaubminus`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwtongmaubminus`;
CREATE TABLE `vwtongmaubminus` (
`TongmauBminus` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtongmaubplus`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwtongmaubplus`;
CREATE TABLE `vwtongmaubplus` (
`TongmauBplus` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtongmauominus`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwtongmauominus`;
CREATE TABLE `vwtongmauominus` (
`TongmauOminus` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtongmauoplus`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwtongmauoplus`;
CREATE TABLE `vwtongmauoplus` (
`TongmauOplus` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtonguser`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vwtonguser`;
CREATE TABLE `vwtonguser` (
`TongUser` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `vwcungung`
--
DROP TABLE IF EXISTS `vwcungung`;

DROP VIEW IF EXISTS `vwcungung`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwcungung`  AS SELECT `c`.`id` AS `id`, `c`.`id_vien` AS `id_vien`, `c`.`id_emp` AS `id_emp`, `c`.`MaMau` AS `MaMau`, `c`.`LuongMau` AS `LuongMau`, `c`.`NgayCungUng` AS `NgayCungUng`, `c`.`TrangThai` AS `TrangThai`, `b`.`TenVien` AS `TenVien`, `n`.`NhomMau` AS `NhomMau`, `s`.`name` AS `name` FROM (((`cungungmau` `c` join `benhvien` `b` on(`c`.`id_vien` = `b`.`id`)) join `nhommau` `n` on(`n`.`MaMau` = `c`.`MaMau`)) join `users` `s` on(`s`.`id` = `c`.`id_emp`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vwemp`
--
DROP TABLE IF EXISTS `vwemp`;

DROP VIEW IF EXISTS `vwemp`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwemp`  AS SELECT `s`.`id` AS `id`, `s`.`name` AS `name`, `s`.`email` AS `email`, `s`.`password` AS `password`, `s`.`gender` AS `gender`, `s`.`birthday` AS `birthday`, `s`.`address` AS `address`, `s`.`workplace` AS `workplace`, `s`.`job` AS `job`, `s`.`phone` AS `phone`, `s`.`note` AS `note`, `s`.`MaMau` AS `MaMau`, `s`.`role` AS `role`, `s`.`created_at` AS `created_at`, `s`.`updated_at` AS `updated_at`, `r`.`roles` AS `roles` FROM (`users` `s` join `roles` `r` on(`r`.`id` = `s`.`role`)) WHERE `s`.`role` = 1 OR `s`.`role` = 2 OR `s`.`role` = 5 ;

-- --------------------------------------------------------

--
-- Structure for view `vwhistorydonateblood`
--
DROP TABLE IF EXISTS `vwhistorydonateblood`;

DROP VIEW IF EXISTS `vwhistorydonateblood`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwhistorydonateblood`  AS SELECT `p`.`LuongMau` AS `LuongMau`, `p`.`TrangThaiHien` AS `TrangThaiHien`, `s`.`id` AS `id`, `s`.`name` AS `name`, `s`.`email` AS `email`, `s`.`password` AS `password`, `s`.`gender` AS `gender`, `s`.`birthday` AS `birthday`, `s`.`address` AS `address`, `s`.`workplace` AS `workplace`, `s`.`job` AS `job`, `s`.`phone` AS `phone`, `s`.`note` AS `note`, `s`.`MaMau` AS `MaMau`, `s`.`role` AS `role`, `s`.`created_at` AS `created_at`, `s`.`updated_at` AS `updated_at`, `l`.`NgayHien` AS `NgayHien`, `n`.`NhomMau` AS `NhomMau` FROM (((`users` `s` left join `phieudangky` `p` on(`s`.`id` = `p`.`user_id`)) join `lichhienmau` `l` on(`l`.`id` = `p`.`id_lich`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) WHERE `s`.`role` = 4unionselect `p`.`LuongMau` AS `LuongMau`,`p`.`TrangThaiHien` AS `TrangThaiHien`,`s`.`id` AS `id`,`s`.`name` AS `name`,`s`.`email` AS `email`,`s`.`password` AS `password`,`s`.`gender` AS `gender`,`s`.`birthday` AS `birthday`,`s`.`address` AS `address`,`s`.`workplace` AS `workplace`,`s`.`job` AS `job`,`s`.`phone` AS `phone`,`s`.`note` AS `note`,`s`.`MaMau` AS `MaMau`,`s`.`role` AS `role`,`s`.`created_at` AS `created_at`,`s`.`updated_at` AS `updated_at`,`l`.`NgayHien` AS `NgayHien`,`n`.`NhomMau` AS `NhomMau` from (((`phieudangky` `p` left join `users` `s` on(`s`.`id` = `p`.`user_id`)) join `lichhienmau` `l` on(`l`.`id` = `p`.`id_lich`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) where `s`.`role` = 4  ;

-- --------------------------------------------------------

--
-- Structure for view `vwinday`
--
DROP TABLE IF EXISTS `vwinday`;

DROP VIEW IF EXISTS `vwinday`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwinday`  AS SELECT `p`.`id` AS `id`, `p`.`id_lich` AS `id_lich`, `p`.`NgayDK` AS `NgayDK`, `p`.`LuongMau` AS `LuongMau`, `p`.`TrangThaiHien` AS `TrangThaiHien`, `p`.`Ykienbacsi` AS `Ykienbacsi`, `p`.`user_id` AS `user_id`, `p`.`MaCauTL` AS `MaCauTL`, `s`.`name` AS `name`, `s`.`gender` AS `gender`, `n`.`NhomMau` AS `NhomMau`, `l`.`NgayHien` AS `NgayHien` FROM (((`phieudangky` `p` join `users` `s` on(`s`.`id` = `p`.`user_id`)) join `lichhienmau` `l` on(`l`.`id` = `p`.`id_lich`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) WHERE `l`.`NgayHien` = curdate() ;

-- --------------------------------------------------------

--
-- Structure for view `vwindaynew`
--
DROP TABLE IF EXISTS `vwindaynew`;

DROP VIEW IF EXISTS `vwindaynew`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwindaynew`  AS SELECT `p`.`id` AS `id`, `p`.`id_lich` AS `id_lich`, `p`.`NgayDK` AS `NgayDK`, `p`.`LuongMau` AS `LuongMau`, `p`.`TrangThaiHien` AS `TrangThaiHien`, `p`.`Ykienbacsi` AS `Ykienbacsi`, `p`.`user_id` AS `user_id`, `p`.`MaCauTL` AS `MaCauTL`, `p`.`created_at` AS `created_at`, `p`.`updated_at` AS `updated_at`, `h`.`NgayHien` AS `NgayHien`, `s`.`name` AS `name`, `s`.`gender` AS `gender`, `n`.`NhomMau` AS `NhomMau`, `g`.`TrangThai` AS `TrangThai` FROM (`giaychungnhan` `g` left join (((`phieudangky` `p` join `lichhienmau` `h` on(`h`.`id` = `p`.`id_lich`)) join `users` `s` on(`s`.`id` = `p`.`user_id`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) on(`g`.`MaDK` = `p`.`id`))union select `p`.`id` AS `id`,`p`.`id_lich` AS `id_lich`,`p`.`NgayDK` AS `NgayDK`,`p`.`LuongMau` AS `LuongMau`,`p`.`TrangThaiHien` AS `TrangThaiHien`,`p`.`Ykienbacsi` AS `Ykienbacsi`,`p`.`user_id` AS `user_id`,`p`.`MaCauTL` AS `MaCauTL`,`p`.`created_at` AS `created_at`,`p`.`updated_at` AS `updated_at`,`h`.`NgayHien` AS `NgayHien`,`s`.`name` AS `name`,`s`.`gender` AS `gender`,`n`.`NhomMau` AS `NhomMau`,`g`.`TrangThai` AS `TrangThai` from ((((`phieudangky` `p` join `lichhienmau` `h` on(`h`.`id` = `p`.`id_lich`)) join `users` `s` on(`s`.`id` = `p`.`user_id`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) left join `giaychungnhan` `g` on(`g`.`MaDK` = `p`.`id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vwinfoclient`
--
DROP TABLE IF EXISTS `vwinfoclient`;

DROP VIEW IF EXISTS `vwinfoclient`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwinfoclient`  AS SELECT `u`.`id` AS `id`, `u`.`name` AS `name`, `u`.`email` AS `email`, `u`.`password` AS `password`, `u`.`gender` AS `gender`, `u`.`birthday` AS `birthday`, `u`.`address` AS `address`, `u`.`workplace` AS `workplace`, `u`.`job` AS `job`, `u`.`phone` AS `phone`, `u`.`note` AS `note`, `u`.`MaMau` AS `MaMau`, `u`.`role` AS `role`, `u`.`created_at` AS `created_at`, `u`.`updated_at` AS `updated_at`, `n`.`NhomMau` AS `NhomMau` FROM (`users` `u` join `nhommau` `n` on(`n`.`MaMau` = `u`.`MaMau`)) WHERE `u`.`role` = 4 ;

-- --------------------------------------------------------

--
-- Structure for view `vwtongmau`
--
DROP TABLE IF EXISTS `vwtongmau`;

DROP VIEW IF EXISTS `vwtongmau`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtongmau`  AS SELECT sum(`p`.`LuongMau`) AS `Tongmau` FROM `phieudangky` AS `p` WHERE `p`.`TrangThaiHien` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `vwtongmauabminus`
--
DROP TABLE IF EXISTS `vwtongmauabminus`;

DROP VIEW IF EXISTS `vwtongmauabminus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtongmauabminus`  AS SELECT sum(`p`.`LuongMau`) AS `TongmauABminus` FROM ((`phieudangky` `p` join `users` `s` on(`s`.`id` = `p`.`user_id`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) WHERE `p`.`TrangThaiHien` = 1 AND `n`.`NhomMau` = 'AB-' ;

-- --------------------------------------------------------

--
-- Structure for view `vwtongmauabplus`
--
DROP TABLE IF EXISTS `vwtongmauabplus`;

DROP VIEW IF EXISTS `vwtongmauabplus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtongmauabplus`  AS SELECT sum(`p`.`LuongMau`) AS `TongmauABplus` FROM ((`phieudangky` `p` join `users` `s` on(`s`.`id` = `p`.`user_id`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) WHERE `p`.`TrangThaiHien` = 1 AND `n`.`NhomMau` = 'AB+' ;

-- --------------------------------------------------------

--
-- Structure for view `vwtongmauaminus`
--
DROP TABLE IF EXISTS `vwtongmauaminus`;

DROP VIEW IF EXISTS `vwtongmauaminus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtongmauaminus`  AS SELECT sum(`p`.`LuongMau`) AS `TongmauAminus` FROM ((`phieudangky` `p` join `users` `s` on(`s`.`id` = `p`.`user_id`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) WHERE `p`.`TrangThaiHien` = 1 AND `n`.`NhomMau` = 'A-' ;

-- --------------------------------------------------------

--
-- Structure for view `vwtongmauaplus`
--
DROP TABLE IF EXISTS `vwtongmauaplus`;

DROP VIEW IF EXISTS `vwtongmauaplus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtongmauaplus`  AS SELECT sum(`p`.`LuongMau`) AS `TongmauAplus` FROM ((`phieudangky` `p` join `users` `s` on(`s`.`id` = `p`.`user_id`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) WHERE `p`.`TrangThaiHien` = 1 AND `n`.`NhomMau` = 'A+' ;

-- --------------------------------------------------------

--
-- Structure for view `vwtongmaubminus`
--
DROP TABLE IF EXISTS `vwtongmaubminus`;

DROP VIEW IF EXISTS `vwtongmaubminus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtongmaubminus`  AS SELECT sum(`p`.`LuongMau`) AS `TongmauBminus` FROM ((`phieudangky` `p` join `users` `s` on(`s`.`id` = `p`.`user_id`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) WHERE `p`.`TrangThaiHien` = 1 AND `n`.`NhomMau` = 'B-' ;

-- --------------------------------------------------------

--
-- Structure for view `vwtongmaubplus`
--
DROP TABLE IF EXISTS `vwtongmaubplus`;

DROP VIEW IF EXISTS `vwtongmaubplus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtongmaubplus`  AS SELECT sum(`p`.`LuongMau`) AS `TongmauBplus` FROM ((`phieudangky` `p` join `users` `s` on(`s`.`id` = `p`.`user_id`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) WHERE `p`.`TrangThaiHien` = 1 AND `n`.`NhomMau` = 'B+' ;

-- --------------------------------------------------------

--
-- Structure for view `vwtongmauominus`
--
DROP TABLE IF EXISTS `vwtongmauominus`;

DROP VIEW IF EXISTS `vwtongmauominus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtongmauominus`  AS SELECT sum(`p`.`LuongMau`) AS `TongmauOminus` FROM ((`phieudangky` `p` join `users` `s` on(`s`.`id` = `p`.`user_id`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) WHERE `p`.`TrangThaiHien` = 1 AND `n`.`NhomMau` = 'O-' ;

-- --------------------------------------------------------

--
-- Structure for view `vwtongmauoplus`
--
DROP TABLE IF EXISTS `vwtongmauoplus`;

DROP VIEW IF EXISTS `vwtongmauoplus`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtongmauoplus`  AS SELECT sum(`p`.`LuongMau`) AS `TongmauOplus` FROM ((`phieudangky` `p` join `users` `s` on(`s`.`id` = `p`.`user_id`)) join `nhommau` `n` on(`n`.`MaMau` = `s`.`MaMau`)) WHERE `p`.`TrangThaiHien` = 1 AND `n`.`NhomMau` = 'O+' ;

-- --------------------------------------------------------

--
-- Structure for view `vwtonguser`
--
DROP TABLE IF EXISTS `vwtonguser`;

DROP VIEW IF EXISTS `vwtonguser`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtonguser`  AS SELECT count(0) AS `TongUser` FROM `users` AS `s` WHERE `s`.`role` = 4 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benhvien`
--
ALTER TABLE `benhvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cungungmau`
--
ALTER TABLE `cungungmau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vien` (`id_vien`),
  ADD KEY `MaMau` (`MaMau`),
  ADD KEY `id_emp` (`id_emp`);

--
-- Indexes for table `donkham`
--
ALTER TABLE `donkham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ANSWER_ID` (`MaCauTL`),
  ADD KEY `FK_ID_PHIEUDANGKY` (`id_phieudangky`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `giaychungnhan`
--
ALTER TABLE `giaychungnhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaDK` (`MaDK`);

--
-- Indexes for table `lichhienmau`
--
ALTER TABLE `lichhienmau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhommau`
--
ALTER TABLE `nhommau`
  ADD PRIMARY KEY (`MaMau`);

--
-- Indexes for table `phieudangky`
--
ALTER TABLE `phieudangky`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaLich` (`id_lich`),
  ADD KEY `FK_USER_ID` (`user_id`),
  ADD KEY `FK__ANSWER__ID` (`MaCauTL`);

--
-- Indexes for table `phieutraloi`
--
ALTER TABLE `phieutraloi`
  ADD PRIMARY KEY (`MaCauTL`),
  ADD KEY `FK__USER_ID` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MaMau` (`MaMau`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benhvien`
--
ALTER TABLE `benhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cungungmau`
--
ALTER TABLE `cungungmau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `donkham`
--
ALTER TABLE `donkham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `giaychungnhan`
--
ALTER TABLE `giaychungnhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lichhienmau`
--
ALTER TABLE `lichhienmau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhommau`
--
ALTER TABLE `nhommau`
  MODIFY `MaMau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phieudangky`
--
ALTER TABLE `phieudangky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `phieutraloi`
--
ALTER TABLE `phieutraloi`
  MODIFY `MaCauTL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cungungmau`
--
ALTER TABLE `cungungmau`
  ADD CONSTRAINT `cungungmau_ibfk_1` FOREIGN KEY (`id_vien`) REFERENCES `benhvien` (`id`),
  ADD CONSTRAINT `cungungmau_ibfk_2` FOREIGN KEY (`MaMau`) REFERENCES `nhommau` (`MaMau`),
  ADD CONSTRAINT `cungungmau_ibfk_3` FOREIGN KEY (`id_emp`) REFERENCES `users` (`id`);

--
-- Constraints for table `donkham`
--
ALTER TABLE `donkham`
  ADD CONSTRAINT `FK_ANSWER_ID` FOREIGN KEY (`MaCauTL`) REFERENCES `phieutraloi` (`MaCauTL`),
  ADD CONSTRAINT `FK_ID_PHIEUDANGKY` FOREIGN KEY (`id_phieudangky`) REFERENCES `phieudangky` (`id`),
  ADD CONSTRAINT `donkham_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `giaychungnhan`
--
ALTER TABLE `giaychungnhan`
  ADD CONSTRAINT `giaychungnhan_ibfk_1` FOREIGN KEY (`MaDK`) REFERENCES `phieudangky` (`id`);

--
-- Constraints for table `phieudangky`
--
ALTER TABLE `phieudangky`
  ADD CONSTRAINT `FK_USER_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK__ANSWER__ID` FOREIGN KEY (`MaCauTL`) REFERENCES `phieutraloi` (`MaCauTL`),
  ADD CONSTRAINT `phieudangky_ibfk_2` FOREIGN KEY (`id_lich`) REFERENCES `lichhienmau` (`id`);

--
-- Constraints for table `phieutraloi`
--
ALTER TABLE `phieutraloi`
  ADD CONSTRAINT `FK__USER_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`MaMau`) REFERENCES `nhommau` (`MaMau`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
