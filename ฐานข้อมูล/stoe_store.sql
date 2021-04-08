-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 07:01 PM
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
  `cg_view` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cargo`
--

INSERT INTO `tbl_cargo` (`cg_id`, `cg_code`, `cg_name`, `cg_detail`, `cg_img`, `cg_type_id`, `cg_unit`, `cg_price`, `cg_amount`, `cg_view`) VALUES
(52, 'CG-10001', 'NMD_R1', 'รองเท้า NMD ในสไตล์คลาสสิก\r\nมุ่งไปข้างหน้าพร้อมกับบทเรียนในอดีต เพื่อก้าวขึ้นมาเป็นผู้นำแห่งอนาคต รองเท้า NMD_R1 คู่นี้ออกแบบมาเพื่อเป็นยกย่องนวัตกรรมรองเท้าวิ่งที่เต็มไปด้วยเรื่องราวความเป็นมา โดยได้แรงบันดาลใจจากรองเท้า NMD รุ่นต้นฉบับที่ถูกใจสายสตรีทตั้งแต่เปิดตัวครั้งแรก\r\n\r\nมาในดีไซน์ปราดเปรียว สวมใส่ได้หลากหลาย พร้อมสัมผัสสุดล้ำ แต่ยังคงความคลาสสิกที่เรียบง่ายเอาไว้ด้วยอัปเปอร์ผ้าถักสัมผัสเรียบ และพื้นชั้นกลาง Boost ที่จะมอบความสบายอย่างต่อเนื่อง ไม่ว่าจะเช้า สาย บ่าย ค่ำ คุณก็พร้อมลุย ยกระดับความเท่ในแบบยุคอวกาศด้วยปลั๊กสีเมทัลลิกบริเวณพื้นชั้นกลาง', '20210408012250_9930.png', '4', '40', '2760', '50', '19'),
(53, 'CG-10002', 'NMD_R1 SPECTOO', 'รองเท้า NMD สำหรับโลกดิจิทัลในปัจจุบัน\r\nแฟรนไชส์ adidas NMD ให้ความสำคัญกับอนาคตเสมอมาตั้งแต่ยุคแรกเริ่ม เพราะเป็นเรื่องของวิวัฒนาการ เป็นเรื่องของความก้าวหน้า\r\n\r\nรองเท้าอาดิดาส NMD_R1 Spectoo คู่นี้หยิบเอาสไตล์คลาสสิกของ NMD มาปรับโฉมใหม่โดยได้แรงบันดาลใจจากโลกแห่งข้อมูลสตรีมมิงของเราที่เชื่อมต่อกันอยู่ตลอดเวลา อัปเปอร์ดีไซน์ปราดเปรียวทำจากผ้าถัก แต่งกราฟิกข้อความและมีลูกเล่นโปร่งแสงด้านข้าง สื่อออกมาอย่างเรียบง่ายให้เห็นถึงช่วงเปลี่ยนผ่านจากยุคของนักสำรวจในเมืองไปสู่ยุคของนักเดินทางในโลกดิจิทัล พื้นชั้นกลาง Boost จากอาดิดาสมีความยืดหยุ่นและตอบสนองได้ดี มอบความสบายเหลือเชื่อให้คุณตั้งแต่ก้าวแรกจนก้าวสุดท้าย', '20210408012645_2195.png', '4', '42', '3500', '50', '2'),
(54, 'CG-10003', 'ADILETTE AQUA', 'รองเท้าแตะสำหรับใส่หลังว่ายน้ำ มาพร้อมความนุ่มที่มากขึ้น\r\nรองเท้าแตะที่จะให้คุณสัมผัสความแห้งสบายหลังว่ายน้ำ มาพร้อมความเรียบง่ายในสไตล์สลิปออน แต่งแถบ 3-Stripes ที่เป็นซิกเนเจอร์และดีเอ็นเอของอาดิดาส พื้นรองเท้าสุดนุ่ม สำหรับปรนนิบัติเท้าที่เมื่อยล้าของคุณ\r\n\r\n', '20210408013641_4054.png', '1', '39', '700', '39', '7'),
(55, 'CG-10004', 'TERREX SUMRA', 'รองเท้าแตะสำหรับใส่หลังว่ายน้ำ มาพร้อมความนุ่มที่มากขึ้น\r\nรองเท้าแตะที่จะให้คุณสัมผัสความแห้งสบายหลังว่ายน้ำ มาพร้อมความเรียบง่ายในสไตล์สลิปออน แต่งแถบ 3-Stripes ที่เป็นซิกเนเจอร์และดีเอ็นเอของอาดิดาส พื้นรองเท้าสุดนุ่ม สำหรับปรนนิบัติเท้าที่เมื่อยล้าของคุณ\r\n\r\n', '20210408013805_1805.png', '1', '44', '2200', '0', '3'),
(56, 'CG-10005', 'ADILETTE', 'รองเท้าแตะนุ่มสบายในสไตล์ลำลองแบบอาดิดาส\r\nสไตล์ที่สวมใส่สลับทำกิจกรรมได้สะดวก รองเท้าแตะคู่นี้มาพร้อมแถบรัดที่ปรับความกระชับได้และพื้นรองเท้าด้านในที่นุ่มเป็นพิเศษ สวมใส่สบายไม่ว่าจะอยู่ในห้องแต่งตัวหรือบนท้องถนน ดูเรียบง่ายในดีไซน์ทันสมัยที่ได้แรงบันดาลใจจากความสปอร์ต\r\n\r\n', '20210408021650_6431.png', '1', '40', '1300', '60', '0'),
(57, 'CG-10006', 'COMFORT', 'รองเท้าแตะสวมสบายที่รังสรรค์มาเพื่อความทนทาน\r\nรองเท้าแตะสำหรับช่วงหน้าร้อนที่สวมใส่ได้ตั้งแต่ริมสระไปจนถึงชายหาด รองเท้าแตะคู่นี้ผสานความแข็งแกร่งทนทานเข้ากับส่วนรับแรงกระแทกที่แห้งไวเพื่อให้คุณทำกิจกรรมต่าง ๆ ระหว่างวันได้อย่างสบาย อวดแรงบันดาลใจในอาดิดาสผ่านดีเทลจากอดีต\r\n\r\n', '20210408021753_4717.png', '1', '38', '1100', '70', '2');

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

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pm_id`, `pm_code`, `pm_img`, `pm_total`, `pm_u_id`, `pm_channel`, `pm_date`, `pm_address`, `pm_status`) VALUES
(37, 'P-10001', '20210408030721_3055.png', '700', 3, 'กสิกรไทย', '2021-04-08 20:06:35', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'รอตรวจสอบ');

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
(48, 'P-10001', '54', '1');

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
(1, 'รองเท้าแตะ'),
(4, 'รองเท้าผ้าใบ');

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
(1, 'admin', 'admin', 'แอดมิน', 'อิอิ', 'ชาย', '1150 ต.บางเหรียง อ.ควนเนียง จ.สงขลา 90220', 'admin@admin.com', '0869678973', 'admin'),
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
  MODIFY `cg_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pm_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_payment_list`
--
ALTER TABLE `tbl_payment_list`
  MODIFY `pl_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  MODIFY `sm_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_type_product`
--
ALTER TABLE `tbl_type_product`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
