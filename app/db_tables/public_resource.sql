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
-- Table structure for table `public_resource`
--

CREATE TABLE `public_resource` (
  `id` int(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `location` varchar(200) DEFAULT NULL,
  `approved` varchar(1) DEFAULT NULL,
  `approved_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `public_resource`
--

INSERT INTO `public_resource` (`id`, `type`, `location`, `approved`, `approved_by`) VALUES
(4, 'other', '63865e7ebc0ea_pexels-johannes-plenio-1136454.jpg', NULL, NULL),
(7, 'quiz', NULL, NULL, NULL),
(19, 'other', '639f400636560hello.py', NULL, NULL),
(62, 'pdf', '63eca06f8cd64adasd.pdf', NULL, NULL),
(64, 'other', '63ee72cea84cellkll.exe', NULL, NULL),
(73, 'pdf', '63f33cfbc423ddadf.pdf', NULL, NULL),
(75, 'quiz', NULL, NULL, NULL),
(76, 'video', NULL, NULL, NULL),
(77, 'video', NULL, NULL, NULL),
(78, 'video', NULL, NULL, NULL),
(79, 'paper', '63fcce0860797hhh.pdf', NULL, NULL),
(80, 'other', '63ffa22a83df4sdfgsd.png', NULL, NULL),
(81, 'pdf', '640052228e4e3cbvb.pdf', 'Y', NULL),
(82, 'quiz', NULL, NULL, NULL),
(83, 'quiz', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `public_resource`
--
ALTER TABLE `public_resource`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approved_by` (`approved_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `public_resource`
--
ALTER TABLE `public_resource`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `public_resource`
--
ALTER TABLE `public_resource`
  ADD CONSTRAINT `public_resource_ibfk_1` FOREIGN KEY (`approved_by`) REFERENCES `admin` (`admin_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
