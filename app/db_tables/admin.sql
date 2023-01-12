-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 09:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(10) DEFAULT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `mobile_no`, `password`) VALUES
(5, 'sandu', 'abc@gmai.com', NULL, 'pWMnkjfM'),
(6, 'thimira', 'xyz@gmail.com', NULL, '4s8Q8uCF'),
(9, 'sanduni', 'dfg@gmail.com', NULL, 'Vb3QhtKM'),
(13, 'kasun', 'kasun@gmail.com', NULL, 'iDBnBaNO'),
(14, 'randima', 'sdfg@gmail.com', NULL, 'Xh4nFSiS'),
(15, 'kumara', 'kumara@gmail.com', NULL, 'PZ4EeIln'),
(16, 'thanduni', 'thanduni@gmail.com', NULL, 'Qbby8Cyy'),
(17, '', '', NULL, 'QndBw8vC'),
(18, 'sandu', 'gale@gmail.com', NULL, 'iSkJSqlY'),
(19, 'sanduni', 'sasankag@gmail.com', NULL, '9WjFKWSy'),
(20, 'sss', 'sss@gmail.com', NULL, 'l1R7C5kK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
