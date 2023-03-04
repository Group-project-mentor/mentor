-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 05:51 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentor`
--

-- --------------------------------------------------------

--
-- Table structure for table `rs_subject_grade`
--

CREATE TABLE `rs_subject_grade` (
  `rsrc_id` int(100) NOT NULL,
  `subject_id` int(3) NOT NULL,
  `grade_id` int(2) NOT NULL,
  `creator_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rs_subject_grade`
--

INSERT INTO `rs_subject_grade` (`rsrc_id`, `subject_id`, `grade_id`, `creator_id`) VALUES
(7, 1, 2, 3),
(19, 1, 1, 3),
(22, 1, 2, 3),
(24, 1, 1, 3),
(26, 1, 1, 3),
(28, 1, 1, 3),
(29, 1, 1, 3),
(30, 1, 1, 3),
(32, 1, 1, 3),
(33, 1, 1, 3),
(35, 1, 1, 3),
(36, 1, 1, 3),
(37, 1, 1, 3),
(50, 1, 1, 3),
(51, 1, 1, 3),
(52, 1, 1, 3),
(53, 1, 1, 3),
(54, 1, 1, 3),
(55, 1, 1, 3),
(56, 1, 1, 3),
(57, 1, 1, 3),
(60, 1, 1, 3),
(61, 1, 1, 33),
(62, 1, 1, 3),
(64, 1, 1, 3),
(73, 1, 2, 3),
(75, 1, 1, 33),
(76, 1, 3, 3),
(77, 1, 3, 3),
(78, 1, 1, 3),
(79, 1, 1, 3),
(80, 1, 2, 3),
(81, 1, 1, 3),
(83, 1, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rs_subject_grade`
--
ALTER TABLE `rs_subject_grade`
  ADD PRIMARY KEY (`rsrc_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rs_subject_grade`
--
ALTER TABLE `rs_subject_grade`
  ADD CONSTRAINT `rs_subject_grade_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rs_subject_grade_ibfk_2` FOREIGN KEY (`rsrc_id`) REFERENCES `public_resource` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rs_subject_grade_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rs_subject_grade_ibfk_4` FOREIGN KEY (`creator_id`) REFERENCES `resource_creator` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
