-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2023 at 11:51 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

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

DROP TABLE IF EXISTS `rs_subject_grade`;
CREATE TABLE IF NOT EXISTS `rs_subject_grade` (
  `rsrc_id` int(100) NOT NULL,
  `subject_id` int(3) NOT NULL,
  `grade_id` int(2) NOT NULL,
  PRIMARY KEY (`rsrc_id`),
  KEY `subject_id` (`subject_id`),
  KEY `grade_id` (`grade_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_subject_grade`
--

INSERT INTO `rs_subject_grade` (`rsrc_id`, `subject_id`, `grade_id`) VALUES
(16, 1, 2),
(14, 1, 2),
(19, 1, 1),
(17, 1, 1),
(4, 1, 1),
(3, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
