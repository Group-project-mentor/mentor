-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2023 at 11:52 PM
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
-- Table structure for table `public_resource`
--

DROP TABLE IF EXISTS `public_resource`;
CREATE TABLE IF NOT EXISTS `public_resource` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL,
  `location` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `public_resource`
--

INSERT INTO `public_resource` (`id`, `type`, `location`) VALUES
(3, 'other', '6385b4a76a1a4_9.pdf'),
(4, 'other', '63865e7ebc0ea_pexels-johannes-plenio-1136454.jpg'),
(19, 'other', '639f400636560hello.py'),
(14, 'pdf', '639b5227ae9f0This is sample.pdf'),
(17, 'pdf', '639b5814183b8Helo.pdf'),
(16, 'other', '639b52e0e4469hello.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
