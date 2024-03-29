-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 08:29 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentcode` varchar(120) NOT NULL,
  `departmentname` varchar(100) DEFAULT NULL,
  `company` varchar(400) DEFAULT NULL,
  `show` varchar(200) DEFAULT NULL,
  `smalldept` varchar(100) DEFAULT NULL,
  `smallnamesl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentcode`, `departmentname`, `company`, `show`, `smalldept`, `smallnamesl`) VALUES
('1', 'moshla', 'ruchi', 'yes', 'biriyani moshla', 1),
('2', 'Food', 'TK', 'yes', 'fruits', 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemcode` varchar(200) NOT NULL,
  `group` varchar(80) DEFAULT NULL,
  `itemname` varchar(80) DEFAULT NULL,
  `purchaseprice` double DEFAULT NULL,
  `sellingprice` double DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `rol` double DEFAULT NULL,
  `expiredate` datetime DEFAULT NULL,
  `suppliername` varchar(200) DEFAULT NULL,
  `departmentcode` varchar(50) DEFAULT NULL,
  `wholeprice` double DEFAULT NULL,
  `msu` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemcode`, `group`, `itemname`, `purchaseprice`, `sellingprice`, `qty`, `rol`, `expiredate`, `suppliername`, `departmentcode`, `wholeprice`, `msu`) VALUES
('1', 'petro', 'oil', 30, 50, 10, 5, '2023-09-04 00:00:00', 'murad', '2', 1000, '1'),
('10', 'ball', 'p', 30, 50, 10, 5, '2023-09-04 00:00:00', 'murad', '2', 1000, '1'),
('12', 'a', 'sdf', 0, 0, 0, 0, '0000-00-00 00:00:00', '', '2', 0, ''),
('2', 'hello', 'null', 100, 0, 100, 0, '0000-00-00 00:00:00', 'null', '2', 0, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `operationlineitems`
--

CREATE TABLE `operationlineitems` (
  `vrno` varchar(100) NOT NULL,
  `slno` int(11) NOT NULL,
  `itemcode` varchar(100) DEFAULT NULL,
  `itemname` varchar(100) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `mode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operationlineitems`
--

INSERT INTO `operationlineitems` (`vrno`, `slno`, `itemcode`, `itemname`, `qty`, `price`, `total`, `mode`) VALUES
('AC-001', 1, '1', 'blood cbc', 1, 160, 160, 'ok'),
('AC-002', 2, '1', 'Xray', 1, 300, 300, 'purchase'),
('AC-003', 3, '1', 'Dna', 1, 1000, 1000, 'purchase');

-- --------------------------------------------------------

--
-- Table structure for table `operationtotal`
--

CREATE TABLE `operationtotal` (
  `vrno` varchar(100) NOT NULL,
  `customername` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `net` double DEFAULT NULL,
  `paid` double DEFAULT NULL,
  `due` double DEFAULT NULL,
  `mode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operationtotal`
--

INSERT INTO `operationtotal` (`vrno`, `customername`, `date`, `total`, `discount`, `net`, `paid`, `due`, `mode`) VALUES
('AC-001', 'Rofiq', '2023-05-05 00:00:00', 300, 0, 300, 300, 0, 'sell'),
('AC-003', 'mujib sir', '1975-05-05 00:00:00', 5300, 0, 5300, 300, 0, 'sell'),
('AC-005', 'habib youtube', '2023-05-05 00:00:00', 300, 0, 300, 300, 0, 'sell');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentcode`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemcode`),
  ADD KEY `departmentCode` (`departmentcode`);

--
-- Indexes for table `operationlineitems`
--
ALTER TABLE `operationlineitems`
  ADD PRIMARY KEY (`vrno`,`slno`),
  ADD KEY `itemcode` (`itemcode`);

--
-- Indexes for table `operationtotal`
--
ALTER TABLE `operationtotal`
  ADD PRIMARY KEY (`vrno`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`departmentcode`) REFERENCES `department` (`departmentcode`);

--
-- Constraints for table `operationlineitems`
--
ALTER TABLE `operationlineitems`
  ADD CONSTRAINT `operationlineitems_ibfk_1` FOREIGN KEY (`itemcode`) REFERENCES `items` (`itemcode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
