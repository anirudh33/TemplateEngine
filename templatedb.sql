-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2013 at 05:08 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `templatedb`
--
DROP DATABASE `templatedb`;
CREATE DATABASE `templatedb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `templatedb`;

-- --------------------------------------------------------

--
-- Table structure for table `templateinfo`
--

DROP TABLE IF EXISTS `templateinfo`;
CREATE TABLE IF NOT EXISTS `templateinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` char(100) NOT NULL,
  `field_type` char(20) NOT NULL,
  `field_id` char(20) NOT NULL,
  `field_label` char(100) NOT NULL,
  `field_value` char(100) DEFAULT NULL,  
  `field_validation`  varchar(100) DEFAULT NULL,
  `field_list` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
