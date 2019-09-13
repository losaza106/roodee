-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 04:28 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roodee`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys_quiz`
--

CREATE TABLE `categorys_quiz` (
  `id_category` int(11) NOT NULL,
  `title_category` varchar(60) NOT NULL,
  `detail_category` varchar(60) NOT NULL,
  `img_category` varchar(60) NOT NULL,
  `img_category_thum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorys_quiz`
--

INSERT INTO `categorys_quiz` (`id_category`, `title_category`, `detail_category`, `img_category`, `img_category_thum`) VALUES
(1, 'C Quiz - คำถามภาษา C', 'ภาษา C', 'c_img.jpg', 'c_img80.jpg'),
(2, 'HTML Quiz - คำถามภาษา HTML', 'คำถามภาษา HTML', 'html_img.png', 'html_img80.png'),
(3, 'ComBasic Quiz - คำถามคอมพิวเตอร์เบื้องต้น', 'คำถามเกี่ยวกับคอมพิวเตอร์เบื้องต้น', 'comsci_img.jpg', 'comsci_img80.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` int(11) NOT NULL,
  `question_quiz` varchar(100) NOT NULL,
  `choice_1` varchar(100) NOT NULL,
  `choice_2` varchar(100) NOT NULL,
  `choice_3` varchar(100) NOT NULL,
  `choice_4` varchar(100) NOT NULL,
  `correct_answer` int(3) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `question_quiz`, `choice_1`, `choice_2`, `choice_3`, `choice_4`, `correct_answer`, `id_category`) VALUES
(1, 'คำสั่ง printf หมายถึงข้อใด', 'รับค่าข้อมูล', 'ประมวลผล', 'เคลียร์หน้าจอ', 'แสดงผล', 4, 1),
(2, 'โปรแกรมภาษาซีจะเริ่มทำงานจากฟังก์ชันใด', 'ฟังก์ชัน main', 'ฟังก์ชัน include', 'ฟังก์ชัน library', 'ฟังก์ชัน declare', 1, 1),
(3, 'ข้อใดไม่ใช่ประเภทของข้อมูลในภาษาซี', 'char', 'String', 'int', 'Float', 2, 1),
(4, 'ข้อใดเป็นคำสั่งการรับค่าจากทางแป้นพิมพ์ของภาษาซี', 'printf', 'present', 'scanf', 'show', 3, 1),
(5, 'ถ้าต้องการเขียนคำสั่งให้แสดงผลโดยการขึ้นบรรทัดใหม่ ควรใช้คำสั่งในข้อใด', '\\n', '/m', '/n', '\\m', 1, 1),
(6, 'ภาษา html เปรียบเหมือนภาษาใด ที่เป็นภาษากลางของมนุษย์', 'ภาษาฝรั่งเศษ', 'ภาษาไทย', 'ภาษาจีน', 'ภาษาอังกฤษ', 4, 2),
(10, 'แท็กใช้พิมพ์หัวเรื่องเว็บ', '<titer>', '<title>', '<tetle>', '<turtle>', 2, 2),
(11, 'ถ้าจะให้เว็บไซต์อ่านภาษาไทยได้ ต้องเลือกการอ่านค่าแบบใด', 'UFT-8', 'UTF-8', 'ANSI', 'Unicode', 2, 2),
(12, 'การบันทึกงาน ต้องพิมพ์ชื่องานแล้วตามด้วยสกุลใด TEST.????', 'TEST.haml', 'TEST.htle', 'TEST.html', 'TEST.hmlt', 3, 2),
(13, 'แท็กใดบ้างไม่ต้องมีแท็กปิด', '<br>', '<html>', '<center>', '<p>', 1, 2),
(14, 'ข้อใดคือความหมายของคอมพิวเตอร์', 'เครื่องคำนวณอัตโนมัติ', 'เครื่องใช้สำนักงานอัตโนมัติรุ่นใหม่', 'อุปกรณ์อิเล็กทรอนิกส์อย่างหนึ่ง', 'เป็นแผงวงจรอิเล็กทรอนิกส์อย่างหนึ่ง', 1, 3),
(15, 'คอมพิวเตอร์ได้เข้ามามีบทบาทที่เกี่ยวข้องกับชีวิตประจำวันของเราอย่างไร?', 'ถูกทุกข้อ', 'การถอนเงินจากเครื่อง atm', 'การจับจ่ายซื้อของในห้างสรรพสินค้าโดยใช้บัตรเครดิต', 'การสำรองที่นั่งเครื่องบินสื่อสาร’', 1, 3),
(16, 'เครื่องคอมพิวเตอร์ส่วนใหญ่ทำงานด้วยระบบใด?', 'Digital', 'Calculate', 'Analog', 'Numerical', 3, 3),
(17, 'ห้างสรรพสินค้าและร้านค้าปลีกนำเครื่องคอมพิวเตอร์มาใช้ในการบริการลูกค้าในเรื่องใด?', 'บริการ ATM', 'บริการ ณ จุดขาย', 'บริการด้านบัตรเครดิต', 'บริการสอบถามข้อมูลเกี่ยวกับสินค้า', 2, 3),
(18, 'Ram มีไว้ทำอะไร?', 'เก็บข้อมูล', 'แสดงผล', 'ประมวลผล', 'ส่งข้อมูล', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorys_quiz`
--
ALTER TABLE `categorys_quiz`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorys_quiz`
--
ALTER TABLE `categorys_quiz`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
