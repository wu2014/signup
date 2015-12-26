-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2015 at 08:38 PM
-- Server version: 5.5.42-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `datebase2`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL DEFAULT '0',
  `lastName` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userID`, `firstName`, `lastName`, `email`, `username`, `password`) VALUES
(1, 'Yinyuan', 'Wu', 'yinyuanwu@gmail.com', 'qqq', '202cb962ac59075b964b07152d234b70'),
(2, 'Yinyuan', 'Wu', 'yinyuanwu@gmail.com', 'root', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Yinyuan', 'Wu', 'yinyuanwu@gmail.com', 'rrr', '202cb962ac59075b964b07152d234b70'),
(12, 'yy', 'ee', 'yinyuanwu@gmail.com', 'ee', '202cb962ac59075b964b07152d234b70'),
(13, 'wu', 'yyy', 'yinyuanwu@gmail.com', 'wyy', '81dc9bdb52d04dc20036dbd8313ed055');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
