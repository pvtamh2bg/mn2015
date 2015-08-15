-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2015 at 02:57 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `managerwater172`
--

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE IF NOT EXISTS `thanhvien` (
  `masv` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`masv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`masv`, `firstname`, `lastname`, `email`, `class`, `address`, `created`, `updated`) VALUES
('DTC112120021', 'Tráº§n VÄƒn', 'Nam', 'namcnpm@gmail.com', 'CNPMK10A', 'Y&ecirc;n B&aacute;i', '2015-08-15 19:27:55', '0000-00-00 00:00:00'),
('DTC1151240025', 'Pháº¡m VÄƒn', 'T&acirc;m', 'pvtamitns.bg@gmail.com', 'MMT&amp;TTK10A', 'Báº¯c Giang', '2015-08-15 17:06:16', '2015-08-15 17:23:29'),
('DTC1151240026', 'Tráº§n Máº¡nh', 'Ninh', 'ninh1994@gmail.com', 'CNTTK11A', 'H&agrave; Nam', '2015-08-15 17:24:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` char(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `passwd`, `fullname`, `email`, `level`, `created`, `updated`) VALUES
(2, 'adminstrator', '123456', 'Admin', 'support172@gmai.com', '2', '2015-08-14 00:00:00', '2015-08-14 00:00:00'),
(9, 'pvtamh2bg', '01668731648', 'Pháº¡m VÄƒn T&acirc;m', 'pvtamitns.bg@gmail.com', '2', '2015-08-15 02:10:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `water`
--

CREATE TABLE IF NOT EXISTS `water` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `masv` varchar(50) NOT NULL,
  `soluong` int(1) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `createdid` int(11) NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `water`
--

INSERT INTO `water` (`id`, `masv`, `soluong`, `Description`, `created`, `createdid`, `updated`) VALUES
(1, 'DTC1151240025', 1, '', '2015-07-07 17:57:20', 0, '0000-00-00 00:00:00'),
(2, 'DTC1151240025', 2, '', '2015-08-15 17:58:25', 9, '0000-00-00 00:00:00'),
(3, 'DTC1151240026', 2, '', '2015-08-15 18:31:34', 9, '0000-00-00 00:00:00'),
(4, 'DTC112120021', 2, '', '2015-08-15 19:28:08', 9, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
