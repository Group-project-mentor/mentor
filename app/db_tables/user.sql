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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(5) NOT NULL DEFAULT 'st',
  `image` longblob NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `type`, `image`) VALUES
(1, 'test4@test.com', '$2y$10$ccKiTrt8NObWoZAEmtXpYes5OhOGNQZxhsoSXxbTN.j1oyWIkxc5u', 'Nimal Kumara', 'st', ''),
(2, 'test@test.com', '$2y$10$DgqUSEVDT35nhe7DLuDis.4cQiQyi41JG/TZExNDHX/OK.pzSaT/2', 'Sula kavi', 'st', '');
INSERT INTO `user` (`id`, `email`, `password`, `name`, `type`, `image`) VALUES
(3, 'kss20001218@gmail.com', '$2y$10$DgqUSEVDT35nhe7DLuDis.4cQiQyi41JG/TZExNDHX/OK.pzSaT/2', 'Kavishka sulakshana', 'rc','');
INSERT INTO `user` (`id`, `email`, `password`, `name`, `type`, `image`) VALUES
(4, 'elama@elama.com', '$2y$10$Z6sYcbgVrcP1G6liWl.5bevez43K5..HDfpzXgEFr/4mp8jMpCARO', 'Amal Kumara', 'st', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
