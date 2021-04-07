-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 10:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stoe_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cargo`
--

CREATE TABLE `tbl_cargo` (
  `cg_id` int(20) NOT NULL,
  `cg_code` varchar(255) NOT NULL,
  `cg_name` varchar(255) NOT NULL,
  `cg_detail` text NOT NULL,
  `cg_img` varchar(255) NOT NULL,
  `cg_type_id` varchar(50) NOT NULL,
  `cg_unit` varchar(50) NOT NULL,
  `cg_price` varchar(50) NOT NULL,
  `cg_amount` varchar(50) NOT NULL,
  `cg_promotion_status` varchar(255) NOT NULL,
  `cg_promotion_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cargo`
--

INSERT INTO `tbl_cargo` (`cg_id`, `cg_code`, `cg_name`, `cg_detail`, `cg_img`, `cg_type_id`, `cg_unit`, `cg_price`, `cg_amount`, `cg_promotion_status`, `cg_promotion_value`) VALUES
(49, 'CG-10001', 'SKECHERS', 'รองเท้าแตะ SKECHERS\r\nรองเท้าแตะแบบหูคีบ SKECHERS\r\nรองเท้าแตะแบบหูหนีบ SKECHERS สำหรับสวมใส่ได้ทุกวัน\r\nพื้นรองเท้าด้านในช่วยซัพพอร์ตเท้าและมอบความนุ่มสบายขณะสวมใส่', '20210404030937_9521.png', '1', '40', '690', '28', 'off', ''),
(50, 'CG-10002', 'รองเท้าแตะ ADILETTE AQUA', 'รองเท้าแตะสำหรับใส่หลังว่ายน้ำ มาพร้อมความนุ่มที่มากขึ้น\r\nรองเท้าแตะที่จะให้คุณสัมผัสความแห้งสบายหลังว่ายน้ำ มาพร้อมความเรียบง่ายในสไตล์สลิปออน แต่งแถบ 3-Stripes ที่เป็นซิกเนเจอร์และดีเอ็นเอของอาดิดาส พื้นรองเท้าสุดนุ่ม สำหรับปรนนิบัติเท้าที่เมื่อยล้าของคุณ\r\n\r\n', '20210404031044_5527.png', '1', '39', '700', '37', 'off', ''),
(51, 'CG-10003', 'S Sports', 'S SPORTS Cross 07 รองเท้าแตะผู้ชาย\r\nรองเท้าแตะ S SPORTS\r\nรองเท้าแตะรัดส้น S SPORTS สไตล์แฟชั่น\r\nอัปเปอร์ตัดเย็บจากวัสดุสังเคราะห์และผ้ามีความทนทานสูง\r\nสายรัดส้นปรับกระชับได้ ช่วยให้สวมใส่กระชับพอดีและถอดออกง่าย', '20210404031157_1981.png', '1', '41', '390', '92', 'off', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pm_id` int(50) NOT NULL,
  `pm_code` varchar(255) NOT NULL,
  `pm_img` varchar(255) NOT NULL,
  `pm_total` varchar(255) NOT NULL,
  `pm_u_id` int(50) NOT NULL,
  `pm_channel` varchar(255) NOT NULL,
  `pm_date` varchar(255) NOT NULL,
  `pm_address` text NOT NULL,
  `pm_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_list`
--

CREATE TABLE `tbl_payment_list` (
  `pl_id` int(50) NOT NULL,
  `pl_pm_code` varchar(255) NOT NULL,
  `pl_cg_id` varchar(255) NOT NULL,
  `pl_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipment`
--

CREATE TABLE `tbl_shipment` (
  `sm_id` int(50) NOT NULL,
  `sm_company` varchar(255) NOT NULL,
  `sm_code` varchar(255) NOT NULL,
  `sm_pm_code` varchar(255) NOT NULL,
  `sm_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type_product`
--

CREATE TABLE `tbl_type_product` (
  `tp_id` int(11) NOT NULL,
  `tp_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type_product`
--

INSERT INTO `tbl_type_product` (`tp_id`, `tp_name`) VALUES
(1, 'รองเท้าแตะ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(10) NOT NULL COMMENT 'ID',
  `u_username` varchar(255) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `u_password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `u_fname` varchar(255) NOT NULL COMMENT 'ชื่อ',
  `u_lname` varchar(255) NOT NULL COMMENT 'นามสกุล',
  `u_sex` varchar(50) NOT NULL COMMENT 'เพศ',
  `u_address` text NOT NULL COMMENT 'ที่อยู่',
  `u_email` varchar(255) NOT NULL COMMENT 'อีเมล์',
  `u_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `u_role` varchar(50) NOT NULL COMMENT 'บทบาท'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `u_username`, `u_password`, `u_fname`, `u_lname`, `u_sex`, `u_address`, `u_email`, `u_tel`, `u_role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'ชาย', 'admin', 'admin@admin.com', '0869678973', 'admin'),
(2, 'user', 'user', 'user', 'user', 'ชาย', 'user', 'user@user.com', '0888888888', 'user'),
(3, 'test', 'test', 'ทดสอบ', 'เทสเทส', 'ชาย', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'test@test.com', '0888888889', 'member'),
(7, '1', '1', '1', '1', 'ชาย', '1', '1@gmail.com', '123', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cargo`
--
ALTER TABLE `tbl_cargo`
  ADD PRIMARY KEY (`cg_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `tbl_payment_list`
--
ALTER TABLE `tbl_payment_list`
  ADD PRIMARY KEY (`pl_id`);

--
-- Indexes for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `tbl_type_product`
--
ALTER TABLE `tbl_type_product`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cargo`
--
ALTER TABLE `tbl_cargo`
  MODIFY `cg_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pm_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_payment_list`
--
ALTER TABLE `tbl_payment_list`
  MODIFY `pl_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  MODIFY `sm_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_type_product`
--
ALTER TABLE `tbl_type_product`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
