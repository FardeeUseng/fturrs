-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 31 พ.ค. 2022 เมื่อ 03:53 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18712931_fturrs`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `admin`
--

CREATE TABLE `admin` (
  `admin_Id` int(15) NOT NULL,
  `ad_email` varchar(255) NOT NULL,
  `ad_pass` varchar(255) NOT NULL,
  `ad_name` varchar(255) DEFAULT NULL,
  `ad_sex` varchar(20) DEFAULT NULL,
  `ad_phone` varchar(15) DEFAULT NULL,
  `ad_profile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `admin`
--

INSERT INTO `admin` (`admin_Id`, `ad_email`, `ad_pass`, `ad_name`, `ad_sex`, `ad_phone`, `ad_profile`) VALUES
(1, 'admin@gmail.com', '123456', 'admin', 'male', '0650505204', 'fardee.jpg'),
(4, 'admin2@gmail.com', '123456', 'Amin2', 'male', '0650505204', 'ding.jpg');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `building`
--

CREATE TABLE `building` (
  `bd_Id` int(15) NOT NULL,
  `bd_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `building`
--

INSERT INTO `building` (`bd_Id`, `bd_name`) VALUES
(15, 'อิสลามศึกษา'),
(16, 'ศิลปศาสตร์และสังคมศาสตร์'),
(17, 'วิทยาศาสตร์และเทคโนโลยี'),
(18, 'ศึกษาศาสตร์'),
(19, 'อาคารเรียนรวมเฉลิมพระเกียรติ'),
(20, 'สำนักวิทยบริการ');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `major`
--

CREATE TABLE `major` (
  `major_Id` int(15) NOT NULL,
  `major_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `major`
--

INSERT INTO `major` (`major_Id`, `major_name`) VALUES
(1, 'สำนักงานคณะวิทยาศาสตร์และเทคโนโลยี'),
(2, 'สาขาวิชาเทคโนโลยีสารสนเทศ'),
(3, 'สาขาวิชาวิจัยและพัฒนาผลิตภัณฑ์ฮาลาล'),
(4, 'สาขาวิชาวิทยาการข้อมูลและการวิเคราะห์'),
(5, 'กลุ่มสาขาวิชาวิทยาศาสตร์'),
(6, 'ศูนย์เครื่องมือวิทยาศาสตร์ คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยฟาฏอนี'),
(7, 'สาขาวิชาการสอนวิทยาศาสตร์ทั่วไป'),
(8, 'สาขาวิชาเคมี'),
(9, 'สโมสรนักศึกษา');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `organization`
--

CREATE TABLE `organization` (
  `org_Id` int(15) NOT NULL,
  `org_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `organization`
--

INSERT INTO `organization` (`org_Id`, `org_name`) VALUES
(1, 'คณะวิทยาศาสตร์และเทคโนโลยี'),
(2, 'คณะอิสลามศึกษาและนิติศาสตร์'),
(3, 'คณะศิลปศาสตร์และสังคมศาสตร์'),
(4, 'คณะศึกษาศาสตร์'),
(5, 'บัณฑิตวิทยาลัย'),
(6, 'โครงการจัดตั้งคณะพยาบาลศาสตร์'),
(7, 'สำนักงานอธิการบดี'),
(8, 'สำนักงานสภามหาวิทยาลัย'),
(9, 'สำนักพัฒนาศักยภาพนักศึกษา'),
(10, 'สำนักบริการการศึกษา'),
(11, 'สำนักวิทยบริการ'),
(12, 'สำนักแผนและประกันคุณภาพ'),
(13, 'สำนักวิจัยและพัฒนา'),
(14, 'สถาบันอัสสลาม'),
(15, 'ศูนย์ประสานงานสถาบันอัสสลาม มหาวิทยาลัยฟาฏอนี'),
(16, 'ศูนย์ประสานงานสถาบันอัสสลาม จังหวัด/เครือข่าย'),
(17, 'สมาคมศิษย์เก่าคณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยฟาฏอนี'),
(18, 'สมาคมศิษย์เก่ามหาวิทยาลัยฟาฏอนี'),
(19, 'องค์การบริหารองค์การนักศึกาษา'),
(20, 'สโมสรนักศึกษา');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `reservation`
--

CREATE TABLE `reservation` (
  `rserv_Id` int(15) NOT NULL,
  `bd_Id` int(15) NOT NULL,
  `room_Id` int(15) NOT NULL,
  `peoplename` varchar(255) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `numpeople` int(15) DEFAULT NULL,
  `people_Id` varchar(255) NOT NULL,
  `obj` varchar(500) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `org_Id` int(15) DEFAULT NULL,
  `major_Id` int(15) DEFAULT NULL,
  `rserv_status` varchar(255) DEFAULT NULL,
  `users_Id` int(15) DEFAULT NULL,
  `staff_Id` int(15) DEFAULT NULL,
  `admin_Id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `reservation`
--

INSERT INTO `reservation` (`rserv_Id`, `bd_Id`, `room_Id`, `peoplename`, `phone`, `numpeople`, `people_Id`, `obj`, `startdate`, `enddate`, `starttime`, `endtime`, `org_Id`, `major_Id`, `rserv_status`, `users_Id`, `staff_Id`, `admin_Id`) VALUES
(114, 17, 128, 'Fardee  Useng', '0650505204', 20, '601431004', '-', '2022-03-17', '2022-03-18', '15:20:00', '18:20:00', 3, 9, 'approve', NULL, NULL, 1),
(116, 16, 127, 'ฟัรดี อูเซ็ง', '0650505204', 50, '601431004', '-', '2022-03-30', '2022-03-31', '06:00:00', '17:00:00', 2, 3, 'pendingApproval', NULL, NULL, 1),
(117, 17, 128, 'Fardee  Useng', '0650505204', 50, '601431004', '-', '2022-03-30', '2022-03-31', '20:20:00', '22:20:00', 1, 2, 'pendingApproval', 107, NULL, 0),
(118, 15, 125, 'ฟัรดี', '0650505204', 20, '601431004', '-', '2022-04-01', '2022-04-02', '15:00:00', '16:00:00', 3, 2, 'pendingApproval', NULL, NULL, 1),
(119, 17, 128, 'test', '000000000000000', 60, '61254', '-', '2022-04-02', '2022-04-02', '20:20:00', '22:22:00', 3, 1, 'pendingApproval', NULL, NULL, 1),
(120, 15, 124, 'Fardee  Useng', '0650505204', 60, '601431004', '-', '2022-04-02', '2022-04-03', '10:10:00', '10:10:00', 18, 6, 'disapproved', NULL, 44, NULL),
(121, 17, 129, 'Fardee  Useng', '0650505204', 60, '601431004', '-', '2022-04-02', '2022-04-03', '20:20:00', '22:22:00', 3, 2, 'approve', 109, NULL, NULL);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `room`
--

CREATE TABLE `room` (
  `room_Id` int(15) NOT NULL,
  `bd_Id` int(15) NOT NULL,
  `staff_Id` int(15) NOT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `r_capacity` int(100) DEFAULT NULL,
  `r_img` varchar(255) DEFAULT NULL,
  `r_status` varchar(50) DEFAULT NULL,
  `r_code` varchar(100) DEFAULT NULL,
  `r_floor` int(15) DEFAULT NULL,
  `r_equipment` varchar(255) DEFAULT NULL,
  `r_note` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `room`
--

INSERT INTO `room` (`room_Id`, `bd_Id`, `staff_Id`, `r_name`, `r_capacity`, `r_img`, `r_status`, `r_code`, `r_floor`, `r_equipment`, `r_note`) VALUES
(124, 15, 44, 'ห้องประชุมใหญ่(02-304)', 200, '', 'available', '02-304', 3, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', 'กลางคืนเฉพาะมุสลีมีน(ชาย) และเวลาไม่เกิน 22.00 น.'),
(125, 15, 44, 'ห้องประชุมเล็ก(02-104)', 200, '', 'available', '02-104', 1, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(126, 16, 45, 'ห้องประชุมเล็ก', 20, 'IMG_25650303_145727.jpg', 'available', '-', 1, 'จอLED', ''),
(127, 16, 45, 'ห้องประชุมใหญ่(3-304)', 250, 'IMG_25650303_150316.jpg', 'available', '3-304', 3, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(128, 17, 43, 'ห้องประชุม(13-101)', 12, '', 'available', '13-101', 1, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์', ''),
(129, 17, 43, 'ห้องประชุม(13-401)	', 40, '', 'available', '13-401', 4, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง,จอLED', ''),
(130, 18, 46, 'ห้องประชุมเล็ก (16-207)', 20, '', 'available', '16-207', 2, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์', ''),
(131, 18, 46, 'ห้องประชุมใหญ่ (16-204)', 120, '', 'available', '16-204', 2, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(132, 18, 46, 'ห้องประชุมใหญ่ (16-304)', 200, '', 'available', '16-304', 3, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(133, 19, 47, 'ห้องประชุมใหญ่(21-203 )', 500, '126608.jpg', 'available', '21-203 ', 2, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(134, 19, 47, 'ห้องประชุมขนาดกลาง(21-211 )', 250, '126612.jpg', 'available', '21-211 ', 2, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(135, 19, 47, 'ห้องประชุมขนาดกลาง(21-212 )', 250, '126612.jpg', 'available', '21-212 ', 2, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(136, 20, 48, 'ห้องอภิปราย (04-202)', 24, '', 'available', '04-202', 2, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(137, 20, 48, 'ห้องประชุมเล็ก(ชั้น 2)', 10, '', 'available', '-', 2, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง,จอLED', ''),
(138, 20, 48, 'ห้องปฏิบัติการคอมพิวเตอร์(04-402)', 43, '', 'available', '04-402', 4, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(139, 20, 48, 'ห้องปฏิบัติการคอมพิวเตอร์(04-404)', 43, '', 'available', '04-404', 4, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(140, 20, 48, 'ห้องปฏิบัติการคอมพิวเตอร์(04-405)', 43, '', 'available', '04-405', 4, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(141, 20, 48, 'ห้องปฏิบัติการคอมพิวเตอร์(04-503)', 43, '', 'available', '04-503', 5, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(142, 20, 48, 'ห้องปฏิบัติการคอมพิวเตอร์(04-503)', 43, '', 'available', '04-503', 5, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(143, 20, 48, 'ห้องปฏิบัติการคอมพิวเตอร์(04-504)', 43, '', 'available', '04-504', 5, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(144, 20, 48, 'ห้องสัมมนา (04-602)', 100, '', 'available', '04-602', 6, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(145, 20, 48, 'ห้องประชุม (04-603)', 40, '', 'available', '04-603', 6, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', ''),
(146, 20, 48, 'ห้องบรรยาย (04-601)', 40, '', 'available', '04-601', 6, 'โปรเจคเตอร์,ที่ฉายโปรเจคเตอร์,ไมค์,ลำโพง', '');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `staff`
--

CREATE TABLE `staff` (
  `staff_Id` int(15) NOT NULL,
  `bd_Id` int(15) NOT NULL,
  `st_email` varchar(255) NOT NULL,
  `st_pass` varchar(255) NOT NULL,
  `st_name` varchar(255) DEFAULT NULL,
  `st_sex` varchar(20) DEFAULT NULL,
  `st_phone` varchar(15) DEFAULT NULL,
  `st_profile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `staff`
--

INSERT INTO `staff` (`staff_Id`, `bd_Id`, `st_email`, `st_pass`, `st_name`, `st_sex`, `st_phone`, `st_profile`) VALUES
(43, 17, 'staffscience@gmail.com', '123456', 'นายนิซอยบูลดิน นิเงาะ', 'male', '0650505205', NULL),
(44, 15, 'staffislamic@gmail.com', '123456', 'นายอุสมาน หิมะ', 'male', '0810933474', NULL),
(45, 16, 'staffsilp@gmail.com', '123456', 'นายมูฮำหมัดรุสลัน เซ๊ะ', 'male', '0850792546', NULL),
(46, 18, 'rus024@gmail.com', '123456', 'นายรุสลี สาดะ', 'female', '0898994115', NULL),
(47, 19, 'chalearm@gmail.com', '123456', 'นายมัดซับรีย์ แนแว', 'male', '0630856614', NULL),
(48, 20, 'witya@gmail.com', '123456', 'นายรุสดี สะอุ', 'male', '0869940023', NULL);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `users`
--

CREATE TABLE `users` (
  `users_Id` int(15) NOT NULL,
  `us_email` varchar(255) NOT NULL,
  `us_pass` varchar(255) NOT NULL,
  `us_name` varchar(255) DEFAULT NULL,
  `us_sex` varchar(20) DEFAULT NULL,
  `us_phone` varchar(15) DEFAULT NULL,
  `us_profile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `users`
--

INSERT INTO `users` (`users_Id`, `us_email`, `us_pass`, `us_name`, `us_sex`, `us_phone`, `us_profile`) VALUES
(105, 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'user1', 'male', '0650505205', NULL),
(106, 'user2@gmail.com', '123456', 'user2', 'female', '0650505204', NULL),
(107, 'user1@gmail.com', '123456', 'user1', 'male', '0650505204', ''),
(108, 'staff@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fardee  Useng', 'male', '0650505204', NULL),
(109, 'test60@gmail.com', '123456', 'Fardee  Useng', 'male', '0650505204', NULL),
(110, 'poktae90@gmail.com', '88888888', 'Nurdin Cheloh', 'male', '0828295307', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_Id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`bd_Id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_Id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`org_Id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`rserv_Id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_Id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `bd_Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rserv_Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_Id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
