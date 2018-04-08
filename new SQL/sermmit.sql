-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2017 at 03:33 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sermmit`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodmenu`
--

CREATE TABLE `foodmenu` (
  `food_id` int(4) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_price` int(11) NOT NULL,
  `type_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodmenu`
--

INSERT INTO `foodmenu` (`food_id`, `food_name`, `food_price`, `type_id`) VALUES
(30, 'ปลากระพงนึ่งมะนาว', 220, 15),
(31, 'ปลาหมึกนึ่งมะนาว', 250, 12),
(32, 'ทอดมันปลากราย', 120, 16),
(33, 'ทอดมันกุ้ง', 120, 16),
(34, 'ข้าวผัดกุ้ง', 120, 11),
(35, 'ต้มยำปลากระพง', 150, 17),
(36, 'ต้มยำรวมมิตร', 220, 17),
(37, 'ข้าวเปล่า', 10, 11),
(38, 'น้ำเปล่าเล็ก', 10, 13),
(39, 'น้ำเปล่าใหญ่', 25, 13),
(41, 'น้ำแข็งเปล่า(ถัง)', 20, 13),
(42, 'ข้าวผัดปู', 180, 11),
(43, 'ข้้าวผัดทะเล', 200, 11);

-- --------------------------------------------------------

--
-- Table structure for table `foodmenutype`
--

CREATE TABLE `foodmenutype` (
  `type_id` int(10) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodmenutype`
--

INSERT INTO `foodmenutype` (`type_id`, `type_name`) VALUES
(11, 'เมนูข้าว'),
(12, 'อาหารทะเล'),
(13, 'เครื่องดื่ม'),
(14, 'ของหวาน'),
(15, 'เมนูปลา'),
(16, 'เมนูทอด'),
(17, 'เมนูต้ม'),
(18, 'เมนูยำ');

-- --------------------------------------------------------

--
-- Table structure for table `foodorderinpput`
--

CREATE TABLE `foodorderinpput` (
  `order_id` int(5) NOT NULL,
  `date_input` time NOT NULL,
  `date` date NOT NULL,
  `numfood` int(5) NOT NULL,
  `food_id` varchar(4) NOT NULL,
  `foodname` varchar(20) NOT NULL,
  `price_sum` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodorderinpput`
--

INSERT INTO `foodorderinpput` (`order_id`, `date_input`, `date`, `numfood`, `food_id`, `foodname`, `price_sum`) VALUES
(1, '07:21:32', '2016-04-28', 2, '31', '????????????????', 500),
(1, '07:21:32', '2016-04-28', 2, '32', '?????????????', 240),
(1, '07:33:43', '2017-04-29', 0, '30', '?????????????????', 0),
(1, '07:33:43', '2017-04-29', 0, '31', '????????????????', 0),
(1, '07:33:43', '2017-04-29', 0, '32', '?????????????', 0),
(1, '08:05:16', '2016-05-12', 1, '30', '?????????????????', 220),
(1, '08:05:16', '2016-05-12', 2, '31', '????????????????', 500),
(1, '12:02:30', '2016-05-20', 1, '34', '???????????', 120),
(1, '12:02:30', '2016-05-20', 1, '35', '?????????????', 150),
(1, '12:02:30', '2016-05-20', 1, '36', '????????????', 220),
(3, '08:05:52', '2017-04-29', 0, '31', '????????????????', 0),
(3, '08:05:52', '2017-04-29', 0, '32', '?????????????', 0),
(3, '08:05:52', '2017-04-29', 0, '33', '??????????', 0),
(3, '08:05:52', '2017-04-29', 0, '34', '???????????', 0),
(3, '08:20:48', '2017-04-29', 5, '32', '?????????????', 600),
(3, '08:20:48', '2017-04-29', 2, '37', '?????????', 20),
(18, '02:12:57', '2016-03-23', 3, '42', '?????????', 540),
(19, '02:35:01', '2016-03-24', 1, '36', '????????????', 220),
(20, '04:16:55', '2016-03-24', 2, '30', '?????????????????', 440),
(20, '04:35:59', '2016-03-24', 2, '30', '?????????????????', 440),
(21, '03:00:30', '2016-03-25', 1, '30', '?????????????????', 220),
(30, '11:02:18', '2016-03-29', 1, '43', '????????', 10),
(254, '07:47:38', '2017-04-29', 0, '30', '?????????????????', 0),
(254, '07:47:38', '2017-04-29', 0, '31', '????????????????', 0),
(254, '07:47:38', '2017-04-29', 0, '38', '????????????', 0),
(254, '07:47:38', '2017-04-29', 0, '39', '????????????', 0),
(255, '07:45:57', '2017-04-29', 0, '30', '?????????????????', 0),
(255, '07:45:57', '2017-04-29', 0, '32', '?????????????', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `UserID` int(3) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `IdenID` varchar(13) NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `IdenID`, `Tel`, `Status`) VALUES
(1, 'admin', '1111', 'à¸§à¸£à¸´à¸¢à¸² à¸ˆà¸µà¸™à¸ªà¸¸à¸‚', '1102001883142', '0886450437', 'ADMIN'),
(2, 'cashier', '1111', 'à¸ªà¸¸à¸ à¸±à¸—à¸£à¸² à¸žà¸£à¸«à¸¡à¹€à¸¡à¸¨', '1102004339571', '0876543546', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `ordertype`
--

CREATE TABLE `ordertype` (
  `order_id` int(5) NOT NULL,
  `order_date` date NOT NULL,
  `open_date` time NOT NULL,
  `table_id` varchar(4) NOT NULL,
  `saleq` char(1) NOT NULL,
  `suma` int(10) NOT NULL,
  `sumo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ordertypecomplete`
--

CREATE TABLE `ordertypecomplete` (
  `order_id` int(5) NOT NULL,
  `orderdate` int(5) NOT NULL,
  `opentime` time(5) NOT NULL,
  `table_id` varchar(5) NOT NULL,
  `sale` varchar(5) NOT NULL,
  `bill_id` int(5) NOT NULL,
  `bookid` int(5) NOT NULL,
  `namec` varchar(20) NOT NULL,
  `addc` varchar(20) NOT NULL,
  `saleper` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertypecomplete`
--

INSERT INTO `ordertypecomplete` (`order_id`, `orderdate`, `opentime`, `table_id`, `sale`, `bill_id`, `bookid`, `namec`, `addc`, `saleper`) VALUES
(1, 2016, '12:02:15.00000', 'S01', '1', 3, 1, '', '', 0),
(2, 2017, '07:45:02.00000', 'A01', '1', 2, 1, '', '', 0),
(3, 2017, '07:45:25.00000', 'W01', '1', 1, 1, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tableall`
--

CREATE TABLE `tableall` (
  `table_id` varchar(4) NOT NULL,
  `table_id_type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tableall`
--

INSERT INTO `tableall` (`table_id`, `table_id_type`) VALUES
('A01', 'A'),
('A02', 'A'),
('S01', 'S'),
('W01', 'W'),
('A03', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tabletype`
--

CREATE TABLE `tabletype` (
  `table_id_type` char(1) NOT NULL,
  `table_type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabletype`
--

INSERT INTO `tabletype` (`table_id_type`, `table_type_name`) VALUES
('A', 'ห้องปรับอากาศ'),
('S', 'กลางแจ้ง'),
('W', 'ซุ้มไม้');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodmenu`
--
ALTER TABLE `foodmenu`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `foodmenutype`
--
ALTER TABLE `foodmenutype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `foodorderinpput`
--
ALTER TABLE `foodorderinpput`
  ADD PRIMARY KEY (`order_id`,`date_input`,`date`,`food_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `ordertype`
--
ALTER TABLE `ordertype`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ordertypecomplete`
--
ALTER TABLE `ordertypecomplete`
  ADD PRIMARY KEY (`order_id`,`table_id`,`bill_id`,`bookid`);

--
-- Indexes for table `tabletype`
--
ALTER TABLE `tabletype`
  ADD PRIMARY KEY (`table_id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodmenu`
--
ALTER TABLE `foodmenu`
  MODIFY `food_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `foodmenutype`
--
ALTER TABLE `foodmenutype`
  MODIFY `type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `UserID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ordertype`
--
ALTER TABLE `ordertype`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
