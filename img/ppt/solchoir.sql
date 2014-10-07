-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2014 at 12:51 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `solchoir`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--
USE 1708604_solchoir;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `prova_id` int(11) NOT NULL,
  `attend` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `prova_id`, `attend`) VALUES
(5, 2, 13, 1),
(6, 2, 20, 1),
(7, 2, 21, 0),
(8, 2, 22, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` varchar(900) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `date`, `time`) VALUES
(1, 'First Post', 'This is the first post', '2014-10-01', '00:00:00'),
(2, 'Second Post', 'This is the Second  Post', '2014-10-01', '23:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `prova`
--

CREATE TABLE IF NOT EXISTS `prova` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `content` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `prova`
--

INSERT INTO `prova` (`id`, `date`, `content`) VALUES
(13, '2014-10-10', 'First prova'),
(20, '2014-10-17', 'تانو وحده'),
(21, '2014-10-18', 'adas'),
(22, '2014-10-25', 'Tarnimet يسوع بيدور عليا');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `post_id`, `user_id`, `content`) VALUES
(4, 2, 2, 'hii'),
(7, 2, 2, 'hii tany'),
(8, 2, 2, 'e'),
(9, 2, 4, 'eih dah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `task` varchar(20) NOT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `bonus` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `avatar` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `birthday`, `task`, `facebook`, `bonus`, `points`, `avatar`, `address`, `isAdmin`, `mobile`) VALUES
(2, 'Mina Ezzat Rawi', 'mina1ezzat@gmail.com', 'Iband123', '1992-07-27', '', 'https://www.facebook.com/minaezzatt', NULL, NULL, 'img/users/998237_10152622587398475_871043874_n.jpg', '19 dr ahmed zaki st', 1, '01203567043'),
(4, 'Arsan Ezzat ', 'arsan.ezzat@hotmail.com', '1234', '2001-03-21', '', 'https://www.facebook.com/minaezzatt', NULL, NULL, 'img/users/998237_10152622587398475_871043874_n.jpg', '19 dr ahmed zaki st', NULL, '01203567043');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
