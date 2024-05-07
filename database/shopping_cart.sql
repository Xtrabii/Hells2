-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 04:27 PM
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
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `m_user` varchar(20) NOT NULL,
  `m_pass` varchar(20) NOT NULL,
  `m_level` varchar(50) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_email` varchar(100) NOT NULL,
  `m_tel` varchar(20) NOT NULL,
  `m_address` varchar(200) NOT NULL,
  `m_img` varchar(250) NOT NULL,
  `date_save` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `m_user`, `m_pass`, `m_level`, `m_name`, `m_email`, `m_tel`, `m_address`, `m_img`, `date_save`) VALUES
(1, 'admin', 'admin', 'admin', 'admin_aotINW007', 'aotkungzaza007@gmail.com', '0983738651', 'กรุงเทพมหานคร', '182105303020240506_213907.jpg', '2021-06-01 19:04:28'),
(2, 'member0', 'member0', 'member', 'codezero', 'codezero@gmail.com', '0000000000', 'กรุงเทพมหานคร', '99350598520240506_214209.png', '2021-06-01 19:05:54'),
(3, 'member1', 'member1', 'member', 'twoface', 'twoface@gmail.com', '0852134657', 'กรุงเทพมหานคร', '46611459620240506_214113.jpg', '2021-06-01 19:06:39'),
(4, 'admint', 'admint', 'admin', 'admint_JiankaiCheck', 'yingsumaidai@gmail.com', '0897444124', 'กรุงเทพมหานคร', '132345271520240506_213954.png', '2021-06-01 19:09:04'),
(6, 'Kojo', 'kojo1', 'member', 'Kojo Satori', 'sato@gmail.com', '1234567890', 'Shibuya', '77621952020240507_004115.png', '2024-05-06 17:41:15'),
(7, 'Kaiju', 'kaiju', 'member', 'Kaiju 8', 'kaiju@gmail.com', '5555555555', 'Hollowearth', '25593417420240507_004346.jpg', '2024-05-06 17:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL COMMENT 'เลขใบสั่งซื้อ',
  `cus_name` varchar(100) NOT NULL COMMENT 'ชื่อ-สกุล',
  `address` varchar(250) NOT NULL COMMENT 'ที่อยู่',
  `tel` varchar(10) NOT NULL COMMENT 'เบอร์',
  `total_price` int(11) NOT NULL COMMENT 'ราคารวม',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'สร้างใบสั่งซื้อวันที่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `cus_name`, `address`, `tel`, `total_price`, `created_at`) VALUES
(1, 'Kaiju 8', 'Pluto', '5555555555', 10122, '2024-05-07 10:55:03'),
(3, 'Kaiju 8', 'Luna', '5555555555', 8888, '2024-05-07 10:57:56'),
(4, 'Kaiju 8', 'Shibuya', '5555555555', 1789, '2024-05-07 11:03:35'),
(5, 'Kojo Satori', 'Hello Thailand', '1234567890', 19010, '2024-05-07 11:07:44'),
(6, 'Kojo Satori', 'ALLRED', '1234567890', 22220, '2024-05-07 11:09:23'),
(7, 'Kojo Satori', 'cargo', '1234567890', 1112, '2024-05-07 11:15:41'),
(8, 'Kojo Satori', 'Black', '1234567890', 27775, '2024-05-07 11:18:11'),
(9, 'Kojo Satori', 'QQQQQ', '1234567890', 1110, '2024-05-07 11:20:44'),
(10, 'Kojo Satori', 'ewqeq', '1234567890', 8888, '2024-05-07 11:21:20'),
(11, 'Kojo Satori', 'Test Print1', '1234567890', 8888, '2024-05-07 12:42:13'),
(12, 'Kojo Satori', '131311313113131131311313113131131311313113131131311313113131', '1234567890', 20676, '2024-05-07 12:56:22'),
(13, 'Kojo Satori', 'YY', '1234567890', 2901, '2024-05-07 12:59:48'),
(14, 'Kojo Satori', 'SuperGreen', '1234567890', 333, '2024-05-07 13:02:55'),
(15, 'Kojo Satori', '123 ม.กรุงเทพ รังสิต ปทุมตาดี 1150', '1234567890', 6554, '2024-05-07 13:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id` int(11) NOT NULL COMMENT 'ลำดับ',
  `order_id` int(11) NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `p_id` int(11) NOT NULL COMMENT 'รหัสสินค้า',
  `order_price` int(11) NOT NULL COMMENT 'ราคาสินค้าที่สั่งซื้อ',
  `order_qty` int(11) NOT NULL COMMENT 'จำนวนที่สั่งซื้อ',
  `Total` float NOT NULL COMMENT 'ราคารวม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id`, `order_id`, `p_id`, `order_price`, `order_qty`, `Total`) VALUES
(1, 1, 5, 1234, 1, 1234),
(2, 2, 5, 1234, 1, 1234),
(3, 3, 6, 4444, 1, 4444),
(4, 3, 4, 4444, 1, 4444),
(5, 4, 3, 555, 1, 555),
(6, 4, 5, 1234, 1, 1234),
(7, 5, 5, 1234, 1, 1234),
(8, 5, 4, 4444, 4, 17776),
(9, 6, 4, 4444, 5, 22220),
(10, 7, 2, 1112, 1, 1112),
(11, 8, 1, 5555, 5, 27775),
(12, 9, 3, 555, 2, 1110),
(13, 10, 6, 4444, 2, 8888),
(14, 11, 6, 4444, 2, 8888),
(15, 12, 6, 4444, 3, 13332),
(16, 12, 1, 5555, 1, 5555),
(17, 12, 5, 1234, 1, 1234),
(18, 12, 3, 555, 1, 555),
(19, 13, 3, 555, 1, 555),
(20, 13, 5, 1234, 1, 1234),
(21, 13, 2, 1112, 1, 1112),
(22, 14, 7, 333, 1, 333),
(23, 15, 1, 5555, 1, 5555),
(24, 15, 7, 333, 3, 999);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `type_id` int(11) NOT NULL,
  `p_detail` text NOT NULL,
  `p_img` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` varchar(11) NOT NULL,
  `p_unit` varchar(20) NOT NULL,
  `p_view` int(10) NOT NULL DEFAULT 0,
  `datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `type_id`, `p_detail`, `p_img`, `p_price`, `p_qty`, `p_unit`, `p_view`, `datesave`) VALUES
(1, 'Black Hell Collection', 1, 'Black Hell Collection เสื้อ Collection ใหม่จากทาง Hells Shop มี 6 สีให้เลือกซื้อตามใจชอบ!!', '3208557320240506_214609.png', 5555, '548', 'ชิ้น', 11, '2021-06-26 16:38:28'),
(2, 'Cargo Pant', 2, 'กางเกง Cargo Collection ใหม่จากทาง Hells Shop', '182013336220240506_214653.png', 1112, '119', 'ชิ้น', 1, '2021-06-26 16:46:13'),
(3, 'Black Sweat Pants', 2, 'กางเกงวอร์มขายาวสีดำ จากร้าน Hells Shop', '98804056120240506_214747.png', 555, '1318', 'ชิ้น', 0, '2021-06-26 16:46:35'),
(4, 'Red Hell Collection', 1, 'Red Hell Collection เสื้อ Collection ใหม่จากทาง Hells Shop มี 6 สีให้เลือกซื้อตามใจชอบ!!', '121589944720240506_214849.png', 4444, '110', 'ชิ้น', 0, '2021-06-26 16:46:51'),
(5, 'White Hell Collection', 1, 'White Hell Collection เสื้อ Collection ใหม่จากทาง Hells Shop มี 6 สีให้เลือกซื้อตามใจชอบ!!', '179737688620240506_214941.png', 1234, '538', 'ชิ้น', 6, '2024-05-06 14:49:41'),
(6, 'Grey Hell Collection', 1, 'Grey Hell Collection เสื้อ Collection ใหม่จากทาง Hells Shop มี 6 สีให้เลือกซื้อตามใจชอบ!!', '72260522220240506_235320.png', 4444, '420', 'ชิ้น', 49, '2024-05-06 16:53:20'),
(7, 'Green Hell Collection', 1, 'Green Green', '62776626320240507_200224.png', 333, '884', 'ชิ้น', 1, '2024-05-07 13:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, 'เสื้อผ้า'),
(2, 'กางเกง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'เลขใบสั่งซื้อ', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
