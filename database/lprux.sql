-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 08:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

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
  `id` int(11) NOT NULL,
  `register_id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `register_id`, `topic`, `description`, `deadline`, `create_at`) VALUES
(75, 'f8be9de6fa60c3e1b1e9bef0c7e9f2d2', 'เขียนโปรแกรมด้วย Java', 'hello world example', '2020-05-12', '2020-12-04 10:39:13'),
(90, 'd3e1c1cbd5c5e1010420b3cecfa46823', ' พัฒนาเว็บไซต์เป็นกลุ่ม ', 'ไม่จำกัด ภาษาและเทคโนโลยี', '2020-12-13', '2020-12-04 10:37:27'),
(91, '71c10952fd7ac56181565d9cab0dc847', 'Black box and white box testing ', ' ทดสอบโปรแกรมด้วยกระบวนการ Black box and white box testing ', '2020-12-15', '2020-12-04 10:40:43'),
(92, 'e598322aa0f84e6d6b447814bebaf41f', 'พัฒนาโครงการด้วยกระบวนการทางวิศวกรรมซอฟต์แวร์', ' เว็บไซต์ เกม และอนิเมชั่น', '2020-12-30', '2020-12-04 10:51:44'),
(93, 'd3e1c1cbd5c5e1010420b3cecfa46823', 'Web developing ', ' การพัฒนาเว็บไซต์', '2020-12-14', '2020-12-04 12:12:04'),
(94, 'f8be9de6fa60c3e1b1e9bef0c7e9f2d2', 'Java debug', ' เขียนโปรแกรมด้วย Java', '2020-12-13', '2020-12-04 13:07:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `register_id` (`register_id`,`deadline`,`topic`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
