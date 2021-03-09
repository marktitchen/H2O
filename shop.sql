-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 01:11 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s0238905`
--
CREATE DATABASE IF NOT EXISTS `s0238905` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `s0238905`;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `contactNumber` int(11) NOT NULL,
  `eventType` varchar(55) COLLATE utf8mb4_bin NOT NULL,
  `contactAddress` varchar(55) COLLATE utf8mb4_bin NOT NULL,
  `town` varchar(55) COLLATE utf8mb4_bin NOT NULL,
  `postCode` varchar(55) COLLATE utf8mb4_bin NOT NULL,
  `startTime` int(11) NOT NULL,
  `endTime` int(11) NOT NULL,
  `contactUs` text COLLATE utf8mb4_bin NOT NULL,
  `contactUsDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userID` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contactNumber`, `eventType`, `contactAddress`, `town`, `postCode`, `startTime`, `endTime`, `contactUs`, `contactUsDate`, `userID`) VALUES
(1, 1, 'Wedding', 'j', 'x', 'h016 5BL', 2, 4, 'jjj', '2018-12-21 16:56:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `process_order`
--

DROP TABLE IF EXISTS `process_order`;
CREATE TABLE IF NOT EXISTS `process_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` int(11) NOT NULL,
  `userID` int(7) NOT NULL,
  `purchaseTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `process_order`
--

INSERT INTO `process_order` (`id`, `total`, `userID`, `purchaseTime`) VALUES
(1, 1, 3, '2018-12-21 17:18:29'),
(2, 1, 3, '2018-12-21 17:19:35'),
(3, 1, 5, '2018-12-21 17:36:09'),
(4, 1, 4, '2018-12-21 19:20:06'),
(5, 78, 7, '2019-01-01 22:43:55'),
(6, 4, 7, '2019-01-01 22:49:06'),
(7, 223, 7, '2019-01-16 13:37:14'),
(8, 10, 9, '2019-01-17 06:58:43'),
(9, 1999, 7, '2019-01-17 12:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `pictureName` varchar(225) COLLATE utf8mb4_bin NOT NULL,
  `uploaded_file` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `price` int(12) NOT NULL,
  `userID` int(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `pictureName`, `uploaded_file`, `price`, `userID`) VALUES
(2, 'test 2', 'picture2.jpeg', 2, 5),
(3, 'test 3', 'picture3.jpeg', 3, 5),
(4, 'test 26', 'icon.jpeg', 78, 4),
(20, 'z', 'picture2.jpeg', 1, 6),
(21, '16jan', 'picture7.jpeg', 222, 4),
(22, 'mark person test', 'picture4.jpeg', 1, 6),
(25, 'mark person test 17', 'juniorGolf.png', 999, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(7) NOT NULL AUTO_INCREMENT,
  `fName` varchar(55) COLLATE utf8mb4_bin NOT NULL,
  `lName` varchar(55) COLLATE utf8mb4_bin NOT NULL,
  `userPassword` varchar(55) COLLATE utf8mb4_bin NOT NULL,
  `emailAddress` varchar(55) COLLATE utf8mb4_bin NOT NULL,
  `accountCategory` varchar(12) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fName`, `lName`, `userPassword`, `emailAddress`, `accountCategory`) VALUES
(4, '', '', 'admin', 'admin', 'A'),
(7, 'michael', 'titchen', 'password', 'michael@titchen', 'C'),
(8, 'james', 'titchen', 'password', 'james@titchen', 'P'),
(9, 'garry', 'renolds', 'password', 'garry@renolds', 'C'),
(10, 'laura', 'scott', 'password', 'laura@scott', 'P'),
(11, 'monster', 'drink', 'password', 'monster@drink', 'C'),
(13, 'dan', 'test dan', 'password', 'dan@test', 'C');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
