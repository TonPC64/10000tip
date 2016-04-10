-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2015 at 02:59 PM
-- Server version: 5.6.25
-- PHP Version: 5.5.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bakelay`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `bdate` date DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `profile` varchar(200) DEFAULT NULL,
  `lineid` varchar(100) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `status`, `name`, `surname`, `bdate`, `username`, `password`, `email`, `tel`, `address`, `profile`, `lineid`, `fb`) VALUES
(1, 'admin', 'Chanwit', 'Piromplad', '1994-07-26', 'admin', '5555', 'kingkong2103@gmail.com', '0805629799', '93/2 ', NULL, NULL, NULL),
(5, NULL, 'ang', 'chen', '1994-09-08', 'ang', '1234', 'kingkong2103@gmail.com', '0805629799', 'bkk', NULL, NULL, NULL),
(6, NULL, 'Chanwit', 'Piromplad', '1994-07-26', 'ton', '1234', 'kingkong2103@hotmail.com', '0805629799', '93/2 ม.1 ต.บ่อทอง', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `bill_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `shipping` varchar(20) NOT NULL,
  `track` varchar(20) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1011 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `total`, `shipping`, `track`, `address`, `date`, `user_id`, `status`) VALUES
(1002, 296, 'EMS', NULL, 'bkk', '2015-06-25', 5, 'รอการชำระ'),
(1003, 35, 'ลงทะเบียน', NULL, 'bkk', '2015-06-25', 5, 'รอการชำระ'),
(1004, 84, 'ลงทะเบียน', NULL, '93/2 ม.1 ต.บ่อทอง', '2015-06-26', 6, 'รอการชำระ'),
(1005, 85, 'EMS', NULL, '93/2 ม.1 ต.บ่อทอง', '2015-06-27', 6, 'รอการชำระ'),
(1006, 35, 'ลงทะเบียน', NULL, '93/2 ม.1 ต.บ่อทอง', '2015-06-27', 6, 'รอการชำระ'),
(1007, 75, 'EMS', NULL, '93/2 ม.1 ต.บ่อทอง 20270', '2015-06-28', 6, 'รอการชำระ'),
(1008, 75, 'EMS', NULL, '93/2 ม.1 ต.บ่อทอง', '2015-06-29', 6, 'รอการชำระ'),
(1009, 75, 'EMS', NULL, '222/130 The Most \r\nBKK Thailand ', '2015-06-29', 5, 'รอการชำระ'),
(1010, 80, 'EMS', NULL, '93/2 ม.1 ต.บ่อทอง', '2015-07-02', 6, 'รอการชำระ');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_id`, `amount`, `user_id`, `bill_id`) VALUES
(19, 6, 1, 6, 1004),
(22, 2, 1, 5, 1002),
(24, 1, 1, 5, 1002),
(25, 6, 4, 5, 1002),
(26, 1, 1, 5, 1003),
(27, 2, 1, 6, 1005),
(28, 1, 1, 6, 1005),
(29, 3, 1, 6, 1005),
(30, 2, 1, 6, 1006),
(31, 2, 1, 6, 1007),
(32, 0, 1, 6, 0),
(33, 1, 1, 6, 1008),
(35, 1, 1, 6, 1010),
(36, 1, 1, 5, 1009),
(37, 1, 3, 5, 0),
(38, 4, 2, 5, 0),
(39, 1, 1, 6, 1010);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `type` int(5) NOT NULL,
  `detail` varchar(300) CHARACTER SET utf8 NOT NULL,
  `price` int(10) NOT NULL,
  `unit` varchar(100) CHARACTER SET utf8 NOT NULL,
  `picture` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `type`, `detail`, `price`, `unit`, `picture`) VALUES
(1, 'อะไรไม่รู้', 4, '5', 5, 'ชิ้น', '1.jpg'),
(2, 'สักอย่าง', 3, 'สักอย่างสักอย่างสักอย่าง', 5, 'ชิ้น', '2.jpg'),
(3, 'anonym', 1, '5', 5, 'ชิ้น', '3.jpg'),
(4, 'Special', 2, '5', 55, 'ชิ้น', '4.jpg'),
(5, 'ไม่รู้', 2, 'อุปกรณ์ทำฟองดอง', 555, 'ชิ้น', '5.jpg'),
(6, '5464654', 2, '5464', 54, 'ชิ้น', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `picture` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `productid`, `picture`) VALUES
(1, 1, '1-1.jpg'),
(4, 1, '1-2.jpg'),
(5, 1, '1-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `typeproduct`
--

CREATE TABLE IF NOT EXISTS `typeproduct` (
  `typeid` int(11) NOT NULL,
  `typename` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeproduct`
--

INSERT INTO `typeproduct` (`typeid`, `typename`) VALUES
(1, 'เครื่องหั่นผลไม้'),
(2, 'อุปกรณ์ทำฟองดอง'),
(3, 'อุปกรณ์ทำเค้ก'),
(4, 'อะไรสักอย่าง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeproduct`
--
ALTER TABLE `typeproduct`
  ADD PRIMARY KEY (`typeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1011;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `typeid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
