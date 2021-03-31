-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 05:36 PM
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
(12, 1001, 'รองเท้าช้างดาว', 'ราคาประหยัด', '20210331045445_7828.png', '1', '40', '65', '20', 'off', ''),
(13, 2, 'ADIDAS Adilette Aqua', 'รองเท้าแตะผู้ใหญ่', '20210331045938_3709.jpg', '1', '42', '240', '10', 'off', ''),
(14, 3, 'TERREX SUMRAAAAAAAAAAAAAAAAAAAAaaaaaaa', '..', '20210331050130_6272.jpg', '1', '41', '2200', '5', 'off', ''),
(15, 4, 'รองเท้ารูปปลา', '..', '20210331050428_8826.jpg', '1', '42', '130', '50', 'off', ''),
(16, 5, 'MEN UNIQLO U', 'รองเท้าแตะ มีสายรัด (Unisex)', '20210331050633_1998.jpg', '1', '44', '250', '20', 'off', '');

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
(3, 'test', 'test', 'เทส', 'อยู่สบาย', 'ชาย', '1150 หาดใหญ่ สงขลา', 'test@test.com', '0888888888', 'member'),
(7, '12312', '312', '23123', '1', 'ชาย', '123123', 'wasun.f35@gmail.com', '2312312312', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cargo`
--
ALTER TABLE `tbl_cargo`
  ADD PRIMARY KEY (`cg_id`);

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
  MODIFY `cg_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_type_product`
--
ALTER TABLE `tbl_type_product`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
