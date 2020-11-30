-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 01:09 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lprux`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `subj_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `subj_name`, `topic`, `description`) VALUES
(3, 'พื้นฐานคณิตศาสตร์วิศวกรรม   ', 'czxczc', 'zxczxczxczxc'),
(4, 'Select subject', 'adasdad', 'adadadad'),
(5, 'ระบบฐานข้อมูลสำหรับการพัฒนาซอฟแวร์  ', 'xxxZXX', 'xzXZXZX'),
(7, 'Select subject', 'adasdad', 'asdadad'),
(11, 'พื้นฐานคณิตศาสตร์วิศวกรรม   ', 'asdasdadad', 'sdxfdfsdf'),
(12, 'การจัดการโครงการซอฟต์แวร์     ', 'บทที่ 1', 'บทที่ 1 ดหดหดหด');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `r_id` int(11) NOT NULL,
  `s_group` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `term` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `T_ID` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `s_group`, `term`, `subject_id`, `T_ID`) VALUES
(3, '591226601', '1/63', '5671102', 'P0001'),
(4, 'Group', '', 'Subject ID', 'Teacher ID');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `s_group` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id`, `s_group`, `student_name`, `birthday`, `address`, `email`, `status`) VALUES
(119, '59122660105', '591226601', 'Nupawat Chairat', '2020-10-17', '71/1 m.8 Phakeaw', 'Npwtps14_0720@hotmail.com', 'exist'),
(120, '59122660101', '591226601', 'Jakkapan sittikan', '2020-10-08', '5165-/56461', 'game@email.com', 'exist'),
(122, '60122660101', '601226601', 'Nupawat Chairat', '2020-11-04', '71/1 m.8 Phakeaw', 'Npwtps14_0720@hotmail.com', 'exist');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `subject_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credit` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_id`, `subject_name`, `credit`) VALUES
(37, '5671101', 'พื้นฐานคณิตศาสตร์วิศวกรรม  ', '3'),
(38, '5671102', 'คณิตศาสตร์ดิสครีต       ', '3'),
(39, '5671103', 'การออกแบบและการวิเคราะห์ขั้นตอนวิธี   ', '3'),
(40, '5671202', 'ระบบฐานข้อมูลสำหรับการพัฒนาซอฟแวร์  ', '3'),
(41, '5671203', 'วิศวกรรมเทคโนโลยีสื่อประสม', '3'),
(42, '5671204', 'การโปรแกรมภาษาคอมพิวเตอร์           ', '3'),
(43, '5671301', 'การโปรแกรมภาษาภาพ   ', '3');

-- --------------------------------------------------------

--
-- Table structure for table `subjectofteacher`
--

CREATE TABLE `subjectofteacher` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `active` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjectofteacher`
--

INSERT INTO `subjectofteacher` (`id`, `teacher_id`, `subject_id`, `active`) VALUES
(1, 30, 38, 'yes'),
(2, 30, 42, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `name_title` varchar(20) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Userlevel` varchar(15) NOT NULL,
  `t_email` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `T_ID` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `name_title`, `Fullname`, `Userlevel`, `t_email`, `branch`, `faculty`, `T_ID`) VALUES
(28, 'Paijit@g.lpru.ac.th', 'qwerty', 'ผศ.', 'ไพจิตร สุขสมบูรณ์', 'Teacher', 'Paijit@g.lpru.ac.th', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุตสาหกรรม', 'P0002'),
(27, 'Noppanun@g.lpru.ac.th', 'qwerty', 'ผศ.', 'นพนันท์ สุขสมบูรณ์', 'Teacher', 'Noppanun@g.lpru.ac.th', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุตสาหกรรม', 'P0001'),
(25, 'admin', '1234', 'นาย', 'Nupawat Chairat', 'Admin', 'Npwtps14_0720@hotmail.com', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุตสาหกรรม', '001'),
(29, 'Sakchai@g.lpru.ac.th', 'qwerty', 'อาจารย์', 'ศักดิ์ชัย ศรีมากรณ์', 'Teacher', 'Sakchai@g.lpru.ac.th', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุตสาหกรรม', 'P0003'),
(30, 'Yadamanee@g.lpru.ac.th', 'qwerty', 'อาจารย์', 'ญาดามณี เขื่อนใจ', 'Teacher', 'Yadamanee@g.lpru.ac.th', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุตสาหกรรม', 'P0004'),
(31, 'Nichanaphaphon@g.lpru.ac.th', 'qwerty', 'อาจารย์', 'ณิชานภาพร จงกะสิกิจ', 'Teacher', 'Nichanaphaphon@g.lpru.ac.th', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุตสาหกรรม', 'P0005'),
(32, 'Siyaphat@g.lpru.ac.th', 'qwerty', 'อาจารย์', 'ศิญาพัฒน์ เสนจันทร์ฒิไชย', 'Teacher', 'Siyaphat@g.lpru.ac.th', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุตสาหกรรม', 'P0006'),
(33, 'Nantavika@g.lpru.ac.th', 'qwerty', 'นางสาว', 'นันทวิกา สุทธิพันธ์', 'Admin', 'Nantavika@g.lpru.ac.th', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุตสาหกรรม', 'P0007'),
(37, 'user2', '1234', 'นาย', 'Nupawat Chairat', 'Admin', 'Npwtps14_0720@hotmail.com', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุตสาหกรรม', 'P0001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_group` (`s_group`,`status`) USING BTREE;

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjectofteacher`
--
ALTER TABLE `subjectofteacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`,`subject_id`,`active`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `subjectofteacher`
--
ALTER TABLE `subjectofteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
