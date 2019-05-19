-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 19, 2019 at 08:41 PM
-- Server version: 5.7.23
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
-- Database: `db_bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_details`
--

DROP TABLE IF EXISTS `books_details`;
CREATE TABLE IF NOT EXISTS `books_details` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`book_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `books_details`
--

INSERT INTO `books_details` (`book_id`, `book_name`, `price`) VALUES
(14, 'HHHsd', '3500'),
(15, 'jjjj', '20'),
(16, 'hello', '1000'),
(17, 'h', '344'),
(18, 'fgfgfg', '232323');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `status` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `status`) VALUES
(41, 0, 15, 'PENDING'),
(40, 0, 15, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT '0',
  `no_of_items` int(11) NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `user_id`, `amount`, `no_of_items`, `date`) VALUES
(3, 1, 1344, 2, '2019/05/19'),
(4, 1, 1344, 2, '2019/05/19'),
(5, 1, 20, 1, '2019/05/19'),
(6, 1, 1000, 1, '2019/05/19'),
(7, 1, 40, 2, '2019/05/19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Mobile_Number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `Address`, `Mobile_Number`) VALUES
('user5ce1a99927700', 'asas@asas', 'asas', 'aas', 'asas', 'asa'),
('user5ce1a9c2ee152', 'fsfs@fsfs', 'sfsf', 'fsf', 'sfsf', 'sfs'),
('user5ce1a951a0ef6', 'prasad@gmaaaail.com', 'aaxax', 'axax', 'axaxa', 'aaxax'),
('user5ce12f692a46d', 'prasad@gmail.com', '122323', 'pra', NULL, NULL),
('user5ce1aa33a7a7a', 'qdqd@wdd', 'wdwd', 'axaqdq', 'wdwd', 'wdw'),
('user5ce12f91a705d', 'sdsd@dsd', '232323', 'sdsdsd', NULL, NULL),
('user5ce1a8a4be0d0', 'sdsds@xcfsf', 'sfsf', 'sdsdsd', 'sfsf', 'sfsf'),
('user5ce1a92414133', 'xaa@dsds', 'sdsd', 'xaxax', 'sdsd', 'sdsd'),
('user5ce1a86aac16b', 'zxzzx@zxzx', 'ddsdsd', 'dcsc', 'sds', 'sdsdsd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
