-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2023 at 07:37 PM
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
-- Database: `basic-fit`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_data`
--

DROP TABLE IF EXISTS `form_data`;
CREATE TABLE IF NOT EXISTS `form_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `homeclub_id` int(11) NOT NULL,
  `membership_type` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `extras` text,
  `email` varchar(50) NOT NULL,
  `submission_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `homeclub_id` (`homeclub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`id`, `homeclub_id`, `membership_type`, `duration`, `extras`, `email`, `submission_datetime`) VALUES
(1, 4, 'basic', 'monthly', 'gym,swimming_pool', 'test@gamil.com', '2023-03-03 20:36:07'),
(2, 5, 'premium', 'yearly', 'gym,swimming_pool,sauna', 'test@gamil.com', '2023-03-03 20:36:21'),
(3, 6, 'basic', 'monthly', 'gym,swimming_pool,sauna', '337118@student.mboutrecht.nl', '2023-03-03 20:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `homeclub_options`
--

DROP TABLE IF EXISTS `homeclub_options`;
CREATE TABLE IF NOT EXISTS `homeclub_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homeclub_options`
--

INSERT INTO `homeclub_options` (`id`, `name`) VALUES
(4, 'Moreelshoek 2'),
(5, 'Europaplein 705'),
(6, 'Zonnebaan 22');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_data`
--
ALTER TABLE `form_data`
  ADD CONSTRAINT `form_data_ibfk_1` FOREIGN KEY (`homeclub_id`) REFERENCES `homeclub_options` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
