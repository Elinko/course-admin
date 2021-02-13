-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2021 at 01:28 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skolenia`
--
CREATE DATABASE IF NOT EXISTS `skolenia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `skolenia`;

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE IF NOT EXISTS `certificate` (
  `certificate_id` int(11) NOT NULL AUTO_INCREMENT,
  `evidence_num` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `types` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `os` date DEFAULT NULL,
  `aop` date DEFAULT NULL,
  `person_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`certificate_id`),
  KEY `course_id` (`course_id`),
  KEY `person_id` (`person_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`certificate_id`, `evidence_num`, `types`, `os`, `aop`, `person_id`, `course_id`) VALUES
(10, 'xxxxxx', 'dd', '2019-12-21', '2021-02-21', 1, 1),
(5, 'werwerwer', 'A', '2020-12-21', '2004-12-16', 1, 2),
(9, 'bbbbb', 'cd', '2020-12-21', '2020-12-15', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `phone` int(14) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ico` varchar(255) DEFAULT NULL,
  `dic` varchar(255) DEFAULT NULL,
  `company_address` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `phone`, `email`, `ico`, `dic`, `company_address`) VALUES
(16, 'elite solutions', 0, '', '098098098', '098098098', ''),
(15, 'company', 11111111, '', '7777777', '123123', ''),
(25, 'tttttttt', 0, '', '23423', '4234234', ''),
(2, 'eeeeeeeeeeee', 0, '', '123123', '123123123', ''),
(20, 'wwwwwwwwww', 0, '', '12', '12', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `os_time` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `aop_time` varchar(255) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `os_time`, `aop_time`) VALUES
(3, 'Testovaci', '22', '60'),
(4, 'Testovaci 2', '12', '60'),
(1, 'Revízia PHP', '24', '60'),
(2, 'Revízia hydrantov', '24', '60');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `birth` date DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `occupation` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`person_id`),
  KEY `company_id` (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `name`, `birth`, `address`, `occupation`, `company_id`) VALUES
(1, 'Test person', '2020-12-11', NULL, 'remeselnik', 2),
(2, 'Lukas urban', '2020-12-11', 'hlavna', 'grafik', 16),
(3, 'Joze uhercik', '2020-12-11', 'seredska 22', 'grafik', 16),
(10, 'ttttttttt', '2020-12-01', '', 'zlodej', 25),
(11, 'oooooooooo', '2020-12-18', '', 'zlodej', 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`) VALUES
(3, 'admin', 'd5bbdc5e7951c075a680af5427e18623'),
(4, 'roli', 'c378cfb0feea90966caea61a7352176f');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
