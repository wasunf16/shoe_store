-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 05:07 AM
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
  `cg_id` int(20) NOT NULL COMMENT 'ID',
  `cg_code` varchar(255) NOT NULL COMMENT 'รหัสสินค้า',
  `cg_name` varchar(255) NOT NULL COMMENT 'ชื่อสินค้า',
  `cg_detail` text NOT NULL COMMENT 'รายละเอียด',
  `cg_img` varchar(255) NOT NULL COMMENT 'รูปภาพ',
  `cg_type_id` varchar(50) NOT NULL COMMENT 'ID ประเภทสินค้า',
  `cg_price` varchar(50) NOT NULL COMMENT 'ราคา',
  `cg_amount` varchar(50) NOT NULL COMMENT 'จำนวนในคลัง',
  `cg_view` varchar(50) NOT NULL DEFAULT '0' COMMENT 'การดูสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cargo`
--

INSERT INTO `tbl_cargo` (`cg_id`, `cg_code`, `cg_name`, `cg_detail`, `cg_img`, `cg_type_id`, `cg_price`, `cg_amount`, `cg_view`) VALUES
(52, 'CG-10001', 'NMD_R1', 'รองเท้า NMD ในสไตล์คลาสสิก\r\nมุ่งไปข้างหน้าพร้อมกับบทเรียนในอดีต เพื่อก้าวขึ้นมาเป็นผู้นำแห่งอนาคต รองเท้า NMD_R1 คู่นี้ออกแบบมาเพื่อเป็นยกย่องนวัตกรรมรองเท้าวิ่งที่เต็มไปด้วยเรื่องราวความเป็นมา โดยได้แรงบันดาลใจจากรองเท้า NMD รุ่นต้นฉบับที่ถูกใจสายสตรีทตั้งแต่เปิดตัวครั้งแรก\r\n\r\nมาในดีไซน์ปราดเปรียว สวมใส่ได้หลากหลาย พร้อมสัมผัสสุดล้ำ แต่ยังคงความคลาสสิกที่เรียบง่ายเอาไว้ด้วยอัปเปอร์ผ้าถักสัมผัสเรียบ และพื้นชั้นกลาง Boost ที่จะมอบความสบายอย่างต่อเนื่อง ไม่ว่าจะเช้า สาย บ่าย ค่ำ คุณก็พร้อมลุย ยกระดับความเท่ในแบบยุคอวกาศด้วยปลั๊กสีเมทัลลิกบริเวณพื้นชั้นกลาง', '20210408012250_9930.png', '4', '2760', '49', '46'),
(53, 'CG-10002', 'NMD_R1 SPECTOO', 'รองเท้า NMD สำหรับโลกดิจิทัลในปัจจุบัน\r\nแฟรนไชส์ adidas NMD ให้ความสำคัญกับอนาคตเสมอมาตั้งแต่ยุคแรกเริ่ม เพราะเป็นเรื่องของวิวัฒนาการ เป็นเรื่องของความก้าวหน้า\r\n\r\nรองเท้าอาดิดาส NMD_R1 Spectoo คู่นี้หยิบเอาสไตล์คลาสสิกของ NMD มาปรับโฉมใหม่โดยได้แรงบันดาลใจจากโลกแห่งข้อมูลสตรีมมิงของเราที่เชื่อมต่อกันอยู่ตลอดเวลา อัปเปอร์ดีไซน์ปราดเปรียวทำจากผ้าถัก แต่งกราฟิกข้อความและมีลูกเล่นโปร่งแสงด้านข้าง สื่อออกมาอย่างเรียบง่ายให้เห็นถึงช่วงเปลี่ยนผ่านจากยุคของนักสำรวจในเมืองไปสู่ยุคของนักเดินทางในโลกดิจิทัล พื้นชั้นกลาง Boost จากอาดิดาสมีความยืดหยุ่นและตอบสนองได้ดี มอบความสบายเหลือเชื่อให้คุณตั้งแต่ก้าวแรกจนก้าวสุดท้าย', '20210408012645_2195.png', '4', '3500', '48', '73'),
(54, 'CG-10003', 'ADILETTE AQUA', 'รองเท้าแตะสำหรับใส่หลังว่ายน้ำ มาพร้อมความนุ่มที่มากขึ้น\r\nรองเท้าแตะที่จะให้คุณสัมผัสความแห้งสบายหลังว่ายน้ำ มาพร้อมความเรียบง่ายในสไตล์สลิปออน แต่งแถบ 3-Stripes ที่เป็นซิกเนเจอร์และดีเอ็นเอของอาดิดาส พื้นรองเท้าสุดนุ่ม สำหรับปรนนิบัติเท้าที่เมื่อยล้าของคุณ\r\n\r\n', '20210409021825_5148.png', '1', '700', '35', '19'),
(55, 'CG-10004', 'TERREX SUMRAs', 'รองเท้าแตะสำหรับใส่หลังว่ายน้ำ มาพร้อมความนุ่มที่มากขึ้น\r\nรองเท้าแตะที่จะให้คุณสัมผัสความแห้งสบายหลังว่ายน้ำ มาพร้อมความเรียบง่ายในสไตล์สลิปออน แต่งแถบ 3-Stripes ที่เป็นซิกเนเจอร์และดีเอ็นเอของอาดิดาส พื้นรองเท้าสุดนุ่ม สำหรับปรนนิบัติเท้าที่เมื่อยล้าของคุณs\r\n\r\n', '20210408013805_1805.png', '1', '2250', '15', '20'),
(56, 'CG-10005', 'ADILETTE', 'รองเท้าแตะนุ่มสบายในสไตล์ลำลองแบบอาดิดาส\r\nสไตล์ที่สวมใส่สลับทำกิจกรรมได้สะดวก รองเท้าแตะคู่นี้มาพร้อมแถบรัดที่ปรับความกระชับได้และพื้นรองเท้าด้านในที่นุ่มเป็นพิเศษ สวมใส่สบายไม่ว่าจะอยู่ในห้องแต่งตัวหรือบนท้องถนน ดูเรียบง่ายในดีไซน์ทันสมัยที่ได้แรงบันดาลใจจากความสปอร์ต\r\n\r\n', '20210409022120_5992.png', '1', '1300', '59', '23'),
(57, 'CG-10006', 'COMFORT', 'รองเท้าแตะสวมสบายที่รังสรรค์มาเพื่อความทนทาน\r\nรองเท้าแตะสำหรับช่วงหน้าร้อนที่สวมใส่ได้ตั้งแต่ริมสระไปจนถึงชายหาด รองเท้าแตะคู่นี้ผสานความแข็งแกร่งทนทานเข้ากับส่วนรับแรงกระแทกที่แห้งไวเพื่อให้คุณทำกิจกรรมต่าง ๆ ระหว่างวันได้อย่างสบาย อวดแรงบันดาลใจในอาดิดาสผ่านดีเทลจากอดีต\r\n\r\n', '20210409021915_3434.png', '1', '2200', '37', '19'),
(60, 'CG-10007', 'DURAMO SL', 'รองเท้า DURAMO SL\r\nรองเท้าวิ่งอาดิดาสพร้อมส่วนรับแรงกระแทกน้ำหนักเบา\r\nความหลากหลายจะคอยสร้างแรงกระตุ้นให้กับคุณ รองเท้าวิ่งคู่นี้คือความสบายมากประสิทธิภาพสำหรับการวิ่ง ยกเวท และเล่นกีฬาอย่างเพลิดเพลิน มีน้ำหนักเบา รับแรงกระแทกด้วยความนุ่มเป็นพิเศษ โอเวอร์เลย์แบบไร้รอยเย็บจะช่วยซัพพอร์ตเท้าของคุณระหว่างระเบิดความไวและเคลื่อนที่ในทิศทางด้านข้าง\r\n\r\n', '20210411052143_6120.png', '8', '1200', '24', '12'),
(61, 'CG-10008', 'ADIZERO RC 2.0', 'รองเท้า ADIZERO RC 2.0\r\nรองเท้าวิ่งน้ำหนักเบาเป็นพิเศษที่สวมใส่ได้ทุกวัน\r\nตบเท้าเข้าสู่เส้นปล่อยตัวไปกับความคลาสสิกสำหรับวันแข่งขัน รองเท้าวิ่งอาดิดาสคู่นี้มาพร้อมส่วนรับแรงกระแทกที่ตอบสนองได้ดีเพื่อความไวและความคล่องตัว เสริมความแข็งแรงด้านในรองเท้าเพื่อสัมผัสล็อคกระชับ ทำจากวัสดุที่มีน้ำหนักเบาเป็นพิเศษ ให้คุณเร่งฝีเท้าเข้าสู่เส้นชัยได้อย่างว่องไว', '20210411053517_5978.png', '8', '1700', '40', '76'),
(62, 'CG-10009', 'ADILETTE LITE', 'รองเท้าแตะ ADILETTE LITE\r\nรองเท้าแตะสวมง่ายสำหรับช่วงเวลาแห่งการพักผ่อน\r\nสัมผัสบรรยากาศแห่งวันพักผ่อนเต็มรูปแบบ รองเท้าแตะ Adilette Lite คู่นี้พร้อมปลดเปลื้องเท้าของคุณให้เป็นอิสระ สวมสบายได้ทันทีด้วยพื้นรองเท้าสุดนุ่ม สัมผัสความสปอร์ตได้แม้ในยามพักผ่อนผ่านโลโก้ Trefoil บนแถบสวม (เลือกสวมใส่คู่ถุงเท้าได้)', '20210411054325_1030.png', '1', '720', '61', '29'),
(63, 'CG-10010', 'NEW BALANCE Fresh Foam Roav Haze', 'NEW BALANCE Fresh Foam Roav Haze รองเท้าวิ่งผู้ชาย\r\nอัปเปอร์ทำจากผ้าตาข่ายน้ำหนักเบาและระบายอากาศได้ดี\r\nเสริมอัปเปอร์ด้วยวัสดุสังเคราะห์เพิ่มความทนทาน\r\nส่วนข้อรูปขึ้นรูปเพิ่มความกระชับมั่นคง\r\nพื้นรองเท้าชั้นกลางทำจากโฟม Fresh Foam มอบความนุ่มสบายและการเคลื่อนไหวลงน้ำหนักได้อย่างเป็นธรรมชาติ', '20210411100546_7829.png', '8', '1377', '34', '17'),
(64, 'CG-10011', 'SKECHERS Chinatown Market Stamina 2.0', 'SKECHERS Chinatown Market Stamina 2.0 รองเท้าลำลองผู้ชาย\r\nอัปเปอร์เป็นวัสดุสังเคราะห์\r\nบุนุ่มรอบข้อเท้าและลิ้นรองเท้า\r\nพื้นรองเท้ามี Memory foam มอบความนุ่มสบาย\r\nพื้นรองเท้าด้านนอกน้ำหนักเบาและยึดเกาะ\r\nรองเท้า Skechers', '20210411101344_8424.png', '4', '2443', '27', '176'),
(65, 'CG-10012', 'CROCS Crocband Flip', 'CROCS Crocband Flip รองเท้าแตะผู้ใหญ่\r\nโฟม Croslite™ ที่พื้นรองเท้าช่วยรองรับแรงกระแทกมอบสัมผัสนุ่มเบาสบายตลอดวัน\r\nสายรัดผลิตจากวัสดุ TPU\r\nตกแต่งพื้นรองเท้าด้วยลายเส้นในลุคสปอร์ต\r\nน้ำหนักเบา สวมใส่สะดวกสบาย\r\nพื้นรองเท้ามีแท็กเจอร์แบบปุ่มช่วยเพิ่มความสบายในทุกสัมผัส\r\nทำความสะอาดง่ายและแห้งตัวเร็ว\r\nลอยน้ำได้ไม่จม\r\n', '20210411101815_6938.png', '1', '790', '59', '87'),
(66, 'CG-10013', 'CROCS Crocband III Slide', 'CROCS Crocband III Slide รองเท้าแตะผู้ใหญ่\r\nให้ลุค sport สวมใส่ง่าย\r\nนวัตกรรม Croslite สวมใส่สบายและซัพพอร์ทเท้าได้ดี\r\nมีน้ำหนักเบา ระบายอากาสได้ดีและไม่อุ้มน้ำ', '20210411101935_7804.png', '1', '1032', '50', '2'),
(67, 'CG-10014', 'NIKE React Miler', 'NIKE React Miler รองเท้าวิ่งผู้ชาย\r\nรองเท้าวิ่ง NIKE สำหรับวิ่งออกกำลังกายและแข่งขัน\r\nอัปเปอร์ตัดเย็บจากผ้าตาข่าย เนื้อผ้านุ่มยืดหยุ่นน้ำหนักเบาระบายอากาศได้ดีและกระชับไปตามรูปเท้า\r\nเทคโนโลยี NIKE React ให้ความรู้สึกนุ่มนวลและรองรับแรงกระแทกได้ดี\r\nลิ้นรองเท้าบุนุ่มด้วยโฟมระบายอากาศชั้นดี ลดแรงกดจากเชือกผูก ใส่แล้วไม่อึดอัด\r\nพื้นรองเท้าส่วนนอกทำจากยางมีความยืดหยุ่นและทนทานสูง ช่วยยึดเกาะพื้นผิวได้มั่นคง\r\nส้นรองเท้าออกแบบใหม่ให้นุ่มสบายเท้ายิ่งขึ้น\r\nทรงรองเท้ากว้างขึ้น ช่วยให้เท้ามีพื้นที่ได้ผ่อนคลายและวิ่งได้ยาวนานยิ่งขึ้น\r\nมีแถบดึงตรงส้นเท้าช่วยให้สวมใส่และถอดออกง่าย\r\nแต่งโลโก้ NIKE Swoosh ที่ด้านข้าง ดีไซน์โดดเด่น\r\nแต่งดีเทลสะท้อนแสงเพื่อการมองเห็นในที่มืดหรือในสภาวะแสงน้อย\r\nสไตล์ผูกเชือกปรับกระชับได้ช่วยให้สวมใส่พอดี', '20210411102102_2531.png', '8', '5000', '0', '3'),
(68, 'CG-10015', 'CROCS Literide', 'CROCS Literide รองเท้าแตะผู้ใหญ่\r\nเทคโนโลยี Matlite™ ให้ความรู้สึกนุ่มเบา สบายเท้าและระบายอากาศได้ดี\r\nโฟม Croslite ให้ความรู้สึกนุ่มสบายพร้อมทั้งมีความทนทาน รองรับแรงกระแทกได้ดี\r\nเทคโนโลยีโฟม LiteRide ที่พื้นรองเท้าให้สัมผัสที่นุ่มสบายและเบา', '20210411105346_4971.png', '1', '1600', '53', '52'),
(69, 'CG-10016', 'SKECHERS 8790075', 'รองเท้าแตะแบบสวม SKECHERS\r\nรองเท้าแตะ SKECHERS แบบสวม สำหรับสวมใส่ได้ทุกวัน\r\nดีไซน์แบบสวมช่วยให้สวมใส่และถอดออกได้ง่าย\r\nอัปเปอร์ทำจากวัสดุสังเคราะห์ มีความทนทานสูง\r\nบุด้านในด้วยผ้าช่วยเพิ่มความนุ่มสบายขณะสวมใส่\r\nพื้นรองเท้าด้านในมีน้ำหนักเบาและนุ่มสบาย\r\nพื้นรองเท้าส่วนนอกทำจากวัสดุสังเคราะห์แต่งแพทเทิร์นช่วยยึดเกาะพื้นผิวได้ดี\r\nแต่งโลโก้ S ที่อัปเปอร์และชื่อแบรนด์ SKECHERS ที่พื้นรองเท้าด้านใน', '20210420100616_8229.png', '1', '790', '55', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pm_id` int(50) NOT NULL COMMENT 'ID',
  `pm_code` varchar(255) NOT NULL COMMENT 'รหัสการสั่งซื้อ',
  `pm_img` varchar(255) NOT NULL COMMENT 'รูปภาพการโอน',
  `pm_total` varchar(255) NOT NULL COMMENT 'ยอดรวม',
  `pm_u_id` int(50) NOT NULL COMMENT 'ID ผู้ชื้อ',
  `pm_channel` varchar(255) DEFAULT NULL,
  `pm_date` varchar(255) NOT NULL COMMENT 'วันเวลาที่สั่งซื้อ',
  `pm_address` text NOT NULL COMMENT 'ที่อยู่',
  `pm_status` varchar(255) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pm_id`, `pm_code`, `pm_img`, `pm_total`, `pm_u_id`, `pm_channel`, `pm_date`, `pm_address`, `pm_status`) VALUES
(56, 'P-10001', '20210419054504_9145.jpg', '3200', 3, 'กสิกรไทย', '2021-04-19 05:44:54', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'ยืนยันแล้ว'),
(57, 'P-10002', '20210419054638_7779.jpg', '3883', 18, 'กสิกรไทย', '2021-04-19 05:46:31', 'เลขที่ 112 ต.คลองแห อ.หาดใหญ่ จ.สงขลา 90110', 'ยืนยันแล้ว'),
(58, 'P-10003', '20210419054806_4458.jpg', '4060', 3, 'กสิกรไทย', '2021-04-19 05:47:58', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'ยืนยันแล้ว'),
(59, 'P-10004', '20210419054932_8441.jpg', '1377', 3, 'กสิกรไทย', '2021-04-19 05:49:26', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'ยืนยันแล้ว'),
(60, 'P-10005', '20210420090332_6534.jpg', '1600', 3, 'ทหารไทย', '2021-04-20 09:03:09', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'รอตรวจสอบ'),
(61, 'P-10006', '20210420092043_1507.jpg', '1600', 3, NULL, '2021-04-20 09:20:29', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'ยืนยันแล้ว'),
(62, 'P-10007', '20210420094947_8515.jpg', '1700', 3, NULL, '2021-04-20 09:49:38', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'ยืนยันแล้ว'),
(63, 'P-10008', '20210420095914_6938.jpg', '1600', 3, NULL, '2021-04-20 09:59:07', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'รอตรวจสอบ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_list`
--

CREATE TABLE `tbl_payment_list` (
  `pl_id` int(50) NOT NULL COMMENT 'ID',
  `pl_pm_code` varchar(255) NOT NULL COMMENT 'รหัสการสั่งซื้อ',
  `pl_cg_id` varchar(255) NOT NULL COMMENT 'ID สินค้า',
  `pl_amount` varchar(255) NOT NULL COMMENT 'จำนวน',
  `pl_size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment_list`
--

INSERT INTO `tbl_payment_list` (`pl_id`, `pl_pm_code`, `pl_cg_id`, `pl_amount`, `pl_size`) VALUES
(77, 'P-10001', '68', '2', '40'),
(78, 'P-10002', '62', '2', '40'),
(79, 'P-10002', '64', '1', '42'),
(80, 'P-10003', '52', '1', '40'),
(81, 'P-10003', '56', '1', '40'),
(82, 'P-10004', '63', '1', '41'),
(83, 'P-10005', '68', '1', '38'),
(84, 'P-10006', '68', '1', '41'),
(85, 'P-10007', '61', '1', '41'),
(86, 'P-10008', '68', '1', '41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipment`
--

CREATE TABLE `tbl_shipment` (
  `sm_id` int(50) NOT NULL COMMENT 'ID',
  `sm_company` varchar(255) NOT NULL COMMENT 'บริษัทจัดส่ง',
  `sm_code` varchar(255) NOT NULL COMMENT 'เลขพัสดุ',
  `sm_date` varchar(255) NOT NULL COMMENT 'วันเวลาที่จัดส่ง',
  `sm_date_receive` varchar(255) NOT NULL COMMENT 'วันเวลาที่ได้รับ',
  `sm_pm_code` varchar(255) NOT NULL COMMENT 'รหัสการสั่งซื้อ',
  `sm_status` varchar(255) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shipment`
--

INSERT INTO `tbl_shipment` (`sm_id`, `sm_company`, `sm_code`, `sm_date`, `sm_date_receive`, `sm_pm_code`, `sm_status`) VALUES
(20, 'ไปรษณีย์ไทย EMS', 'EMS15245874561', '2021-04-19 05:45:50', '2021-04-19 05:46:07', 'P-10001', 'ได้รับสินค้าแล้ว'),
(21, 'Kerry Express', 'KR0542457864684', '2021-04-19 05:47:16', '', 'P-10002', 'จัดส่งแล้ว'),
(22, 'DHL Express', 'DHL15245665874', '2021-04-19 05:48:54', '', 'P-10003', 'จัดส่งแล้ว'),
(23, 'Ninja Van', 'NJ1123356643', '2021-04-20 09:41:58', '', 'P-10004', 'จัดส่งแล้ว'),
(24, 'Ninja Van', 'NJ1231233', '2021-04-20 09:48:11', '', 'P-10006', 'จัดส่งแล้ว'),
(25, 'Kerry Express', 'KR78312354', '2021-04-20 09:50:25', '', 'P-10007', 'จัดส่งแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type_product`
--

CREATE TABLE `tbl_type_product` (
  `tp_id` int(11) NOT NULL COMMENT 'ID',
  `tp_name` varchar(255) NOT NULL COMMENT 'ชื่อประเภทสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_type_product`
--

INSERT INTO `tbl_type_product` (`tp_id`, `tp_name`) VALUES
(1, 'รองเท้าแตะ'),
(4, 'รองเท้าผ้าใบ'),
(8, 'รองเท้ากีฬา');

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
(2, 'user', 'user', 'พนักงาน', 'อิอิ', 'ชาย', '1112 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90110', 'user@user.com', '0888888888', 'user'),
(3, 'm1', 'm1', 'สมชาย', 'อิอิ', 'ชาย', 'เลขที่ 1150 ต.ควนลัง อ.หาดใหญ่ จ.สงขลา 90000', 'test@test.com', '0845752458', 'member'),
(18, 'm2', 'm2', 'สมหญิง', 'อิอิ', 'หญิง', 'เลขที่ 112 ต.คลองแห อ.หาดใหญ่ จ.สงขลา 90110', 'm2@gmail.com', '0854758695', 'member'),
(20, 'm3', 'm3', 'สมพร', 'อิอิ', 'ชาย', '165 ต.รัตภูมิ อ.รัตภูมิ จ.สงขลา 90220', 'sumporn@gmail.com', '0856967678', 'member');

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
  MODIFY `cg_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pm_id` int(50) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_payment_list`
--
ALTER TABLE `tbl_payment_list`
  MODIFY `pl_id` int(50) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  MODIFY `sm_id` int(50) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_type_product`
--
ALTER TABLE `tbl_type_product`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
