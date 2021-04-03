-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 02:33 PM
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
  `cg_code` int(50) NOT NULL,
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
(12, 1001, 'รองเท้าช้างดาว', 'ราคาประหยัด', '20210331045445_7828.png', '1', '39', '65', '12', 'off', ''),
(13, 1002, 'ADIDAS Adilette Aqua', 'รองเท้าแตะผู้ใหญ่', '20210331045938_3709.jpg', '1', '42', '240', '9', 'off', ''),
(14, 1003, 'TERREX SUMRA', '..', '20210331050130_6272.jpg', '1', '41', '2200', '0', 'off', ''),
(15, 1004, 'รองเท้ารูปปลา', '..', '20210331050428_8826.jpg', '1', '42', '130', '44', 'off', ''),
(16, 1005, 'MEN UNIQLO U', 'รองเท้าแตะ มีสายรัด (Unisex)', '20210331050633_1998.jpg', '1', '44', '250', '18', 'off', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pm_id` int(50) NOT NULL,
  `pm_code` varchar(255) NOT NULL,
  `pm_img` varchar(255) NOT NULL,
  `pm_total` varchar(255) NOT NULL,
  `pm_channel` varchar(255) NOT NULL,
  `pm_date` varchar(255) NOT NULL,
  `pm_address` text NOT NULL,
  `pm_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pm_id`, `pm_code`, `pm_img`, `pm_total`, `pm_channel`, `pm_date`, `pm_address`, `pm_status`) VALUES
(20, 'P-10008', '20210403125755_8022.jpg', '250', 'ไทยพาณิชย์', '2021-04-03 17:57:50', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'รอตรวจสอบ'),
(21, 'P-10009', '20210403010427_5618.jpg', '65', 'ทหารไทย', '2021-04-03 18:04:23', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'รอตรวจสอบ'),
(22, 'P-10010', '20210403010510_8974.jpg', '65', 'กรุงไทย', '2021-04-03 18:05:02', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'รอตรวจสอบ'),
(23, 'P-10011', '20210403021305_4394.jpg', '815', 'กรุงไทย', '2021-04-03 19:12:55', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'รอตรวจสอบ');

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

--
-- Dumping data for table `tbl_payment_list`
--

INSERT INTO `tbl_payment_list` (`pl_id`, `pl_pm_code`, `pl_cg_id`, `pl_amount`) VALUES
(6, 'P-10001', '21', '4'),
(7, 'P-10001', '14', '3'),
(8, 'P-10002', '12', '5'),
(9, 'P-10003', '21', '4'),
(10, 'P-10004', '15', '1'),
(11, 'P-10005', '15', '1'),
(12, 'P-10006', '15', '1'),
(13, 'P-10007', '15', '1'),
(14, 'P-10008', '16', '1'),
(15, 'P-10009', '12', '1'),
(16, 'P-10010', '12', '1'),
(17, 'P-10011', '16', '1'),
(18, 'P-10011', '12', '1'),
(19, 'P-10011', '13', '1'),
(20, 'P-10011', '15', '2');

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
  MODIFY `cg_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pm_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_payment_list`
--
ALTER TABLE `tbl_payment_list`
  MODIFY `pl_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
