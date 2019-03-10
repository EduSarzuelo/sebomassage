-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 02:03 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `massage`
--

-- --------------------------------------------------------

--
-- Table structure for table `additionals`
--

CREATE TABLE IF NOT EXISTS `additionals` (
  `addid` int(3) NOT NULL,
  `addname` varchar(255) NOT NULL,
  `adddescription` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `flag` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additionals`
--

INSERT INTO `additionals` (`addid`, `addname`, `adddescription`, `price`, `flag`) VALUES
(14, 'None', 'None', '0.00', 0),
(19, 'Hotstone', '', '50.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `branchid` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_address` varchar(255) NOT NULL,
  `flag` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branchid`, `branch_name`, `branch_address`, `flag`) VALUES
(1, 'Sebo Maa', 'Maa, Davao City', 0),
(2, 'Sebo Uyanguren', 'Uyanguren, Davao City', 0),
(3, 'Sebo Cabantian', 'Cabantian, Davao City', 0),
(4, 'Sebo Tigatto', 'Tigatto, Davao City', 0),
(5, 'Sebo Acacia', 'Acacia, Davao City', 0),
(6, 'Sebo Camus', 'Camus, Davao City', 0),
(7, 'Sebo Bajada', 'Bajada, Davao City', 0),
(10, 'Sebo STI', 'Acacia', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerid` int(3) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `number` int(3) NOT NULL,
  `date` date NOT NULL,
  `time` int(3) NOT NULL,
  `rate` int(3) NOT NULL,
  `therapistid` int(3) NOT NULL,
  `roomid` int(3) NOT NULL,
  `serviceid` int(3) NOT NULL,
  `massagestyle` int(3) NOT NULL,
  `addid` int(3) NOT NULL,
  `total` int(3) NOT NULL,
  `branchid` int(3) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `massagestyle`
--

CREATE TABLE IF NOT EXISTS `massagestyle` (
  `styleid` int(3) NOT NULL,
  `stylename` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `massagestyle`
--

INSERT INTO `massagestyle` (`styleid`, `stylename`) VALUES
(2, 'Shiatsu Massage'),
(6, 'Swedish Massage'),
(7, 'Thai Massage');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `paymentid` varchar(100) NOT NULL,
  `payerid` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `paymentid`, `payerid`, `token`) VALUES
(31, 'edu sarzuelo', 'PAYID-LR7KABQ1EW2296600939861A', '6JYPREM4DRA7J', 'EC-6KE14523T92372418'),
(34, 'salahuddin said', 'PAYID-LR7K4FA9WG747918P641635T', '6JYPREM4DRA7J', 'EC-6RP12175TJ6732632'),
(40, 'wew wew', 'PAYID-LR7K7TI3VA77689LK524874U', '6JYPREM4DRA7J', 'EC-3S162970PR252014D'),
(41, 'mia califa', 'PAYID-LR7LBHQ6HM36816B68202545', '6JYPREM4DRA7J', 'EC-98X32488DM145691K'),
(42, 'atchup boulevard', 'PAYID-LR7LCKA3MR00768BD135504D', '6JYPREM4DRA7J', 'EC-5K907630LX185251F');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `rateid` int(3) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `rateprice` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rateid`, `rate`, `rateprice`) VALUES
(1, 'Morning', '0.00'),
(2, 'Afternoon', '50.00'),
(3, 'Evening', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `reservation-therapists`
--

CREATE TABLE IF NOT EXISTS `reservation-therapists` (
  `rtid` int(3) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `therapistid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `customerid` int(3) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `number` int(3) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(6) NOT NULL,
  `numberofhours` varchar(3) NOT NULL,
  `therapistid` int(3) NOT NULL,
  `roomid` int(3) NOT NULL,
  `serviceid` int(3) NOT NULL,
  `massagestyle` int(3) NOT NULL,
  `addid` int(3) NOT NULL,
  `branchid` int(3) NOT NULL,
  `type` int(3) NOT NULL,
  `reservation_status` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`customerid`, `firstname`, `lastname`, `number`, `date`, `time`, `numberofhours`, `therapistid`, `roomid`, `serviceid`, `massagestyle`, `addid`, `branchid`, `type`, `reservation_status`) VALUES
(152, 'edu', 'sarzuelo', 2147483647, '2019-03-06', '14:00', '3', 1, 1, 10, 6, 19, 1, 0, 0),
(155, 'salahuddin', 'said', 21364851, '2019-03-06', '16:00', '3', 1, 1, 11, 2, 19, 1, 0, 0),
(161, 'wew', 'wew', 123141214, '2019-03-06', '16:00', '2', 1, 1, 9, 2, 14, 1, 0, 0),
(163, 'atchup', 'boulevard', 2147483647, '2019-03-06', '08:00', '2', 1, 10, 10, 6, 19, 1, 0, 1),
(166, 'Mox', 'Dalos', 123123, '2019-03-15', '3:00', '3', 20, 14, 9, 2, 19, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `roomid` int(3) NOT NULL,
  `roomname` varchar(255) NOT NULL,
  `availability` int(3) NOT NULL,
  `branchid` int(3) NOT NULL,
  `flag` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomid`, `roomname`, `availability`, `branchid`, `flag`) VALUES
(1, 'None', 1, 0, 0),
(10, 'Room 1', 0, 1, 0),
(11, 'Room 2', 2, 1, 0),
(12, 'Room 1', 0, 7, 0),
(13, 'Room 3', 0, 1, 0),
(14, 'Room 4', 0, 1, 0),
(15, 'Room 5', 0, 1, 0),
(16, 'Room 1', 0, 4, 0),
(17, 'Room 6', 0, 1, 0),
(18, 'Room 7', 0, 1, 0),
(20, 'Room 8', 0, 1, 0),
(21, 'Room 9', 0, 1, 0),
(23, 'Room 10', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `serviceid` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `flag` int(3) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceid`, `service_name`, `price`, `flag`, `status`) VALUES
(9, 'Foot Massage', '80.00', 0, 1),
(10, 'Whole Body Massage', '100.00', 0, 0),
(11, 'Head Massage', '90.00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tallysheet`
--

CREATE TABLE IF NOT EXISTS `tallysheet` (
  `customerid` int(3) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `number` int(3) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestarted` varchar(255) NOT NULL,
  `numberofhours` int(3) NOT NULL,
  `timeended` time NOT NULL,
  `rate` int(3) NOT NULL,
  `total` int(11) NOT NULL,
  `therapistid` int(3) NOT NULL,
  `roomid` int(3) NOT NULL,
  `serviceid` int(3) NOT NULL,
  `massagestyle` int(3) NOT NULL,
  `addid` int(3) NOT NULL,
  `branchid` int(3) NOT NULL,
  `type` int(3) NOT NULL,
  `status` int(3) NOT NULL,
  `flag` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tallysheets`
--

CREATE TABLE IF NOT EXISTS `tallysheets` (
  `customerid` int(3) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `number` int(3) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestarted` varchar(255) NOT NULL,
  `numberofhours` int(3) NOT NULL,
  `timeended` time NOT NULL,
  `rate` int(3) NOT NULL,
  `total` int(11) NOT NULL,
  `therapistid` int(3) NOT NULL,
  `roomid` int(3) NOT NULL,
  `serviceid` int(3) NOT NULL,
  `massagestyle` int(3) NOT NULL,
  `addid` int(3) NOT NULL,
  `branchid` int(3) NOT NULL,
  `type` int(3) NOT NULL,
  `status` int(3) NOT NULL,
  `flag` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tallysheets`
--

INSERT INTO `tallysheets` (`customerid`, `firstname`, `lastname`, `number`, `date`, `timestarted`, `numberofhours`, `timeended`, `rate`, `total`, `therapistid`, `roomid`, `serviceid`, `massagestyle`, `addid`, `branchid`, `type`, `status`, `flag`) VALUES
(61, 'zxxzcxz', 'zczxczxczx', 6656656, '0000-00-00', '06:40:44am', 1, '00:00:00', 3, 0, 20, 10, 10, 2, 19, 1, 2, 1, 1),
(62, 'Sala', 'Said', 12312321, 'February 15,2019', '05:53:39am', 8, '00:00:00', 2, 0, 20, 11, 10, 2, 19, 1, 2, 1, 1),
(63, 'Rodmar', 'Zambas', 12312312, '2019-02-14', '06:36:29am', 6, '00:00:00', 2, 0, 26, 11, 10, 2, 19, 1, 2, 1, 1),
(64, 'czxczxc', 'czczx', 123123, '2019-02-14', '06:41:42am', 6, '00:00:00', 2, 0, 27, 11, 10, 2, 19, 1, 2, 1, 1),
(65, 'okoko', 'koko', 23123, '2019-02-14', '06:45:26am', 6, '00:00:00', 3, 0, 18, 11, 11, 2, 19, 1, 2, 1, 1),
(66, 'asdasdnasj', 'nakjaksnd', 1312321, '2019-02-14', '06:47:39am', 6, '00:00:00', 1, 0, 20, 10, 11, 2, 19, 1, 2, 1, 1),
(67, 'pogi', 'ako', 12312, '2019-02-14', '07:07:10am', 7, '00:00:00', 2, 0, 20, 11, 10, 3, 19, 1, 2, 1, 1),
(68, 'Edu', 'Sarzuelo', 31231, '2019-02-14', '11:29:47am', 7, '00:00:00', 2, 0, 26, 11, 11, 2, 19, 1, 2, 1, 1),
(69, 'llklklll', 'mkmkm', 878789, '2019-02-15', '07:43:06pm', 8, '00:00:00', 2, 0, 18, 11, 10, 2, 14, 1, 2, 1, 1),
(70, 'jiji', 'jii', 12312312, '2019-02-17', '08:21:34am', 8, '00:00:00', 2, 0, 0, 0, 11, 2, 19, 1, 2, 0, 1),
(71, 'zxzzxz', 'zxzxz', 123123, '2019-02-17', '08:22:41am', 8, '00:00:00', 2, 0, 26, 0, 10, 2, 19, 1, 2, 0, 1),
(72, 'jiji', 'jii', 12312312, '2019-02-17', '08:34:15am', 8, '00:00:00', 2, 0, 0, 0, 11, 2, 19, 1, 2, 0, 1),
(73, 'asdasdnasj', 'nakjaksnd', 1312321, '2019-02-17', '08:35:31am', 6, '00:00:00', 1, 0, 18, 10, 11, 2, 19, 1, 2, 1, 1),
(74, 'jiji', 'jii', 12312312, '2019-02-17', '08:35:59am', 8, '00:00:00', 2, 0, 0, 0, 11, 2, 19, 1, 2, 0, 1),
(75, 'pogi', 'ako', 3131, '2019-02-18', '12:20:57am', 12, '00:00:00', 2, 0, 0, 0, 10, 3, 19, 1, 2, 0, 1),
(76, 'pogi', 'japn', 12321, '2019-02-18', '12:21:53am', 12, '00:00:00', 2, 0, 18, 0, 10, 2, 19, 1, 2, 0, 1),
(77, 'Client', 'ko', 13123, '2019-02-18', '12:41:33am', 12, '00:00:00', 1, 0, 0, 10, 9, 1, 14, 1, 2, 0, 1),
(78, 'frit', 'frit', 12312, '2019-02-18', '01:04:18am', 1, '00:00:00', 1, 0, 27, 10, 9, 1, 14, 1, 2, 1, 1),
(79, 'asdasd', 'e13123', 12312, '2019-02-18', '01:05:14am', 1, '00:00:00', 1, 0, 0, 10, 9, 1, 14, 1, 2, 0, 1),
(80, 'coco', 'coco', 12312, '2019-02-18', '01:05:42am', 1, '00:00:00', 2, 0, 0, 10, 10, 2, 19, 1, 2, 0, 1),
(81, 'gogo', 'gogo', 12312, '2019-02-18', '01:10:05am', 1, '00:00:00', 2, 0, 20, 10, 9, 1, 14, 1, 2, 1, 1),
(82, 'Facebook', 'Twitter', 13123, '2019-02-18', '01:36:50am', 1, '00:00:00', 1, 0, 20, 10, 9, 1, 14, 1, 2, 0, 1),
(83, 'asdasd', 'adasd', 12312, '2019-02-18', '01:40:17am', 1, '00:00:00', 2, 0, 20, 11, 10, 2, 19, 1, 2, 1, 1),
(84, 'huh', 'huhu', 12321, '2019-02-18', '01:42:04am', 1, '00:00:00', 3, 0, 20, 10, 10, 2, 19, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temptally`
--

CREATE TABLE IF NOT EXISTS `temptally` (
  `customerid` int(3) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `number` int(3) NOT NULL,
  `date` varchar(255) NOT NULL,
  `timestarted` varchar(255) NOT NULL,
  `numberofhours` int(3) NOT NULL,
  `timeended` time NOT NULL,
  `rate` int(3) NOT NULL,
  `total` int(11) NOT NULL,
  `therapistid` int(3) NOT NULL,
  `roomid` int(3) NOT NULL,
  `serviceid` int(3) NOT NULL,
  `massagestyle` int(3) NOT NULL,
  `addid` int(3) NOT NULL,
  `branchid` int(3) NOT NULL,
  `type` int(3) NOT NULL,
  `status` int(3) NOT NULL,
  `flag` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temptally`
--

INSERT INTO `temptally` (`customerid`, `firstname`, `lastname`, `number`, `date`, `timestarted`, `numberofhours`, `timeended`, `rate`, `total`, `therapistid`, `roomid`, `serviceid`, `massagestyle`, `addid`, `branchid`, `type`, `status`, `flag`) VALUES
(180, 'jojo', 'joj', 12312321, '2019-02-28', '12:01:42pm', 2, '00:00:00', 2, 350, 29, 14, 10, 6, 19, 1, 2, 1, 1),
(181, 'kiki', 'kiki', 312312, '2019-02-28', '12:02:25pm', 2, '00:00:00', 1, 160, 29, 11, 9, 1, 14, 1, 2, 1, 1),
(182, 'njn', 'jnj', 213123, '2019-02-28', '12:02:42pm', 2, '00:00:00', 1, 160, 30, 10, 9, 2, 14, 1, 2, 1, 1),
(183, 'asdjasdn', 'asnda', 123123, '2019-02-28', '12:13:02pm', 2, '00:00:00', 2, 310, 31, 16, 9, 2, 19, 4, 2, 1, 0),
(184, 'fjsdnfj', 'jdnsdnasd', 13123, '2019-03-02', '01:56:28am', 3, '00:00:00', 2, 390, 29, 10, 9, 2, 14, 1, 2, 1, 1),
(185, 'zczxczxcxz', 'zxczxc', 12312, '2019-03-02', '01:59:25am', 2, '00:00:00', 1, 160, 27, 13, 9, 2, 14, 1, 2, 1, 1),
(186, 'zxczxczx', 'zxczxczx', 312312, '2019-03-02', '09:32:51am', 2, '00:00:00', 3, 450, 29, 11, 10, 6, 19, 1, 2, 1, 1),
(187, 'zxczxczx', 'zxczxczx', 312312, '2019-03-02', '09:32:51am', 2, '00:00:00', 3, 450, 29, 11, 10, 6, 19, 1, 2, 1, 1),
(188, 'Akoy', 'Pogs', 213123, '2019-03-07', '03:30:00.000000', 12, '00:00:00', 2, 1610, 27, 10, 9, 6, 19, 1, 0, 1, 1),
(190, 'superman', 'mana', 123123, '2019-03-03', '06:02:02am', 2, '00:00:00', 1, 160, 27, 11, 9, 2, 14, 1, 2, 1, 1),
(191, 'superman', 'mana', 123123, '2019-03-03', '06:02:57am', 2, '00:00:00', 1, 160, 27, 11, 9, 2, 14, 1, 2, 1, 1),
(192, 'Akoy', 'Pogs', 213123, '2019-03-07', '03:30:00.000000', 12, '00:00:00', 2, 1610, 29, 10, 9, 6, 19, 1, 0, 1, 1),
(193, 'Akoy', 'Pogs', 213123, '2019-03-07', '03:30:00.000000', 12, '00:00:00', 2, 1610, 29, 10, 9, 6, 19, 1, 0, 1, 1),
(194, 'Mox', 'Dalos', 123123, '2019-03-15', '3:00:0', 3, '00:00:00', 2, 440, 20, 13, 9, 2, 19, 1, 1, 1, 1),
(195, 'mia', 'califa', 69696969, '2019-03-06', '06:09', 6, '00:00:00', 2, 950, 29, 15, 10, 6, 19, 1, 0, 1, 1),
(196, 'edu', 'sarzuelo', 2147483647, '2019-03-10', '08:00:35am', 2, '00:00:00', 2, 310, 29, 10, 9, 6, 19, 1, 2, 1, 1),
(197, 'Rodmar', 'Zambas', 2147483647, '2019-03-10', '11:42:46am', 2, '00:00:00', 2, 0, 29, 11, 10, 6, 19, 1, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `therapistattendance`
--

CREATE TABLE IF NOT EXISTS `therapistattendance` (
  `attendanceid` int(3) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `availability` int(3) NOT NULL,
  `therapistid` int(3) NOT NULL,
  `branchid` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `therapistattendance`
--

INSERT INTO `therapistattendance` (`attendanceid`, `firstname`, `lastname`, `availability`, `therapistid`, `branchid`) VALUES
(10, 'Christian', 'Corbita', 0, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `therapists`
--

CREATE TABLE IF NOT EXISTS `therapists` (
  `therapistid` int(3) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `relationshipstatus` int(1) NOT NULL COMMENT '1-Single , 2-Married, 3-Widdow , 3-Divorce',
  `contactnumber` int(3) NOT NULL,
  `address` varchar(255) NOT NULL,
  `availability` int(3) NOT NULL,
  `flag` int(3) NOT NULL,
  `branchid` int(11) DEFAULT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `therapists`
--

INSERT INTO `therapists` (`therapistid`, `firstname`, `lastname`, `birthday`, `relationshipstatus`, `contactnumber`, `address`, `availability`, `flag`, `branchid`, `status`) VALUES
(1, 'None', 'None', '0000-00-00', 0, 0, 'none', 1, 0, 0, 0),
(18, 'Salahuddin', 'Said', '1995-01-05', 1, 2147483647, 'Panabo City', 0, 0, 1, 0),
(19, 'Edu', 'Sarzuelo', '2019-01-09', 3, 2312312, 'Davao City', 0, 1, 1, 0),
(20, 'Christian', 'Corbita', '2019-01-17', 3, 12312312, 'Davao City', 1, 0, 1, 0),
(21, 'Charles', 'Suner', '2019-01-16', 3, 312312321, 'dasdadas', 0, 1, 1, 0),
(22, 'Edu', 'Sarzuelo', '2019-01-17', 3, 12312312, 'Agdao, Davao City', 0, 0, 7, 0),
(24, '', '', '0000-00-00', 0, 0, '', 0, 0, 0, 0),
(25, 'None', 'None', '2019-02-13', 0, 0, '0', 0, 0, 0, 0),
(26, 'Rodmar', 'Zambas', '2019-02-16', 1, 12312321, 'Davao City', 0, 0, 1, 0),
(27, 'Edu', 'Sarzuelo', '1996-02-13', 1, 912345678, 'Agdao, Davao City', 0, 0, 1, 0),
(28, 'Japeth', 'Palma', '1994-12-28', 1, 131231, 'Panabo City, Davao del Norte', 0, 0, 1, 0),
(29, 'Abra', 'Abra', '2019-02-21', 2, 231231, 'dasasdsa', 1, 0, 1, 0),
(30, 'aa', 'aa', '2019-02-20', 3, 312312, '1312321312', 0, 1, 1, 0),
(31, 'Chan', 'Chan', '2019-02-26', 3, 12312312, 'Roxas', 0, 0, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `usertype` int(11) NOT NULL,
  `typename` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`usertype`, `typename`) VALUES
(1, 'Front Desk'),
(2, 'VIP');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` bigint(3) unsigned zerofill NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` int(11) NOT NULL COMMENT '0-admin 1-frontdesk',
  `branchid` int(11) NOT NULL COMMENT '0-admin',
  `status` int(11) NOT NULL,
  `flagg` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `contact`, `username`, `password`, `usertype`, `branchid`, `status`, `flagg`) VALUES
(011, 'Sebo', 'Maa', 0, 'sebo_maa', 'maa', 1, 1, 1, 0),
(017, 'Sebo', 'Tigatto', 12345678, 'sebo_tigatto', 'tigatto', 1, 4, 0, 0),
(021, '', 'Admin', 949231969, 'admin', 'admin', 0, 0, 0, 0),
(022, 'Sebo', 'Bajada', 2147483647, 'sebo_bajada', 'bajada', 1, 7, 1, 0),
(024, 'Salah', 'Said', 2147483647, 'vip', 'vip', 2, 1, 0, 0),
(028, 'bajada', 'bajada', 123123, 'bajada', 'bajada', 2, 7, 0, 0),
(030, 'edu', 'sarzuelo', 2147483647, 'edu_soy', 'edusoy', 2, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additionals`
--
ALTER TABLE `additionals`
  ADD PRIMARY KEY (`addid`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branchid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `massagestyle`
--
ALTER TABLE `massagestyle`
  ADD PRIMARY KEY (`styleid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rateid`);

--
-- Indexes for table `reservation-therapists`
--
ALTER TABLE `reservation-therapists`
  ADD PRIMARY KEY (`rtid`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `tallysheet`
--
ALTER TABLE `tallysheet`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `tallysheets`
--
ALTER TABLE `tallysheets`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `temptally`
--
ALTER TABLE `temptally`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `therapistattendance`
--
ALTER TABLE `therapistattendance`
  ADD PRIMARY KEY (`attendanceid`);

--
-- Indexes for table `therapists`
--
ALTER TABLE `therapists`
  ADD PRIMARY KEY (`therapistid`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`usertype`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additionals`
--
ALTER TABLE `additionals`
  MODIFY `addid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branchid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `massagestyle`
--
ALTER TABLE `massagestyle`
  MODIFY `styleid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rateid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reservation-therapists`
--
ALTER TABLE `reservation-therapists`
  MODIFY `rtid` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `customerid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tallysheet`
--
ALTER TABLE `tallysheet`
  MODIFY `customerid` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tallysheets`
--
ALTER TABLE `tallysheets`
  MODIFY `customerid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `temptally`
--
ALTER TABLE `temptally`
  MODIFY `customerid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=198;
--
-- AUTO_INCREMENT for table `therapistattendance`
--
ALTER TABLE `therapistattendance`
  MODIFY `attendanceid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `therapists`
--
ALTER TABLE `therapists`
  MODIFY `therapistid` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `usertype` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` bigint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
