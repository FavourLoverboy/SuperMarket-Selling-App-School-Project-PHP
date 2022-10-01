-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 01:35 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `victor`
--

-- --------------------------------------------------------

--
-- Table structure for table `mainsales`
--

CREATE TABLE `mainsales` (
  `msId` int(11) NOT NULL,
  `accountId` varchar(30) NOT NULL,
  `cusName` varchar(30) NOT NULL,
  `invNo` varchar(30) NOT NULL,
  `payMethod` varchar(30) NOT NULL,
  `total` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainsales`
--

INSERT INTO `mainsales` (`msId`, `accountId`, `cusName`, `invNo`, `payMethod`, `total`, `date`) VALUES
(1, 'vivian@gmail.com', 'vivian', '1637794344', 'Transfer', '2814', '2021-11-24 23:52:39'),
(2, 'kelly@gmail.com', 'john kenneth', '1637949646', 'Transfer', '703.5', '2021-11-26 19:00:53'),
(3, 'awo@gmail.com', 'favour', '1637969229', 'Cash', '251.25', '2021-11-27 00:27:19'),
(4, 'john@gmail.com', 'favy', '1638068038', 'Cash', '150.75', '2021-11-28 03:54:06'),
(5, 'john@gmail.com', 'bright', '1638068195', 'Cash', '1005', '2021-11-28 03:56:49'),
(6, 'anders@gmail.com', 'bright', '1638175831', 'Cash', '301.5', '2021-11-29 09:50:58'),
(7, 'victor@gmail.com', 'john kenneth', '1638176010', 'POS', '1206', '2021-11-29 09:54:03'),
(8, 'vivian@gmail.com', 'john kenneth', '1647350697', 'Cash', '1306.5', '2022-03-15 14:25:14'),
(9, 'vivian@gmail.com', 'man_date', '1650504483', 'POS', '9849', '2022-04-21 03:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `saleId` int(11) NOT NULL,
  `cusName` varchar(30) NOT NULL,
  `code` varchar(30) NOT NULL,
  `proName` varchar(30) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `amt` varchar(30) NOT NULL,
  `invNo` varchar(50) NOT NULL,
  `account` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`saleId`, `cusName`, `code`, `proName`, `qty`, `price`, `amt`, `invNo`, `account`, `date`) VALUES
(1, 'vivian', '1', 'INDOMIE', '1', '2200', '2200', '1637794344', '8', '2021-11-24 23:52:38'),
(2, 'vivian', '5', 'SWEET', '3', '200', '600', '1637794344', '8', '2021-11-24 23:52:38'),
(3, 'john kenneth', '4', 'APPLE', '4', '100', '400', '1637949646', '4', '2021-11-26 19:00:53'),
(4, 'john kenneth', '5', 'PAW PAW', '2', '150', '300', '1637949646', '4', '2021-11-26 19:00:53'),
(5, 'favour', '4', 'APPLE', '1', '100', '100', '1637969229', '11', '2021-11-27 00:27:18'),
(6, 'favour', '5', 'PAW PAW', '1', '150', '150', '1637969229', '11', '2021-11-27 00:27:18'),
(7, 'favy', '5', 'PAW PAW', '1', '150', '150', '1638068038', '13', '2021-11-28 03:54:05'),
(8, 'bright', '5', 'PAW PAW', '6', '150', '900', '1638068195', '13', '2021-11-28 03:56:49'),
(9, 'bright', '4', 'APPLE', '1', '100', '100', '1638068195', '13', '2021-11-28 03:56:49'),
(10, 'bright', '5', 'PAW PAW', '2', '150', '300', '1638175831', '15', '2021-11-29 09:50:58'),
(11, 'john kenneth', '5', 'PAW PAW', '6', '200', '1200', '1638176010', '14', '2021-11-29 09:54:03'),
(12, 'john kenneth', '4', 'APPLE', '3', '100', '300', '1647350697', '8', '2022-03-15 14:25:13'),
(13, 'john kenneth', '5', 'PAW PAW', '5', '200', '1000', '1647350697', '8', '2022-03-15 14:25:14'),
(14, 'man_date', '5', 'SWEET', '5', '200', '1000', '1650504483', '8', '2022-04-21 03:28:32'),
(15, 'man_date', '1', 'INDOMIE', '4', '2200', '8800', '1650504483', '8', '2022-04-21 03:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblitm`
--

CREATE TABLE `tblitm` (
  `itmId` int(11) NOT NULL,
  `proName` varchar(30) NOT NULL,
  `proPrice` varchar(10) NOT NULL,
  `proReg` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblitm`
--

INSERT INTO `tblitm` (`itmId`, `proName`, `proPrice`, `proReg`, `date`) VALUES
(4, 'APPLE', '100', 'BAS_VAN', '2021-11-24 23:59:28'),
(5, 'PAW PAW', '200', 'GD654HFGT7', '2021-11-26 18:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `position` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `username`, `password`, `position`, `date`, `status`) VALUES
(2, 'favour', 'favourehio2019@gmail.com', 'favour', 'favour', 'Admin', '2021-09-25 21:08:04', 'Active'),
(4, 'Kelly', 'kelly@gmail.com', 'Kelly', 'kelly', 'Admin', '2021-09-26 13:54:14', 'Active'),
(8, 'Vivian', 'vivian@gmail.com', 'Vivian', 'vivian', 'Admin', '2021-11-24 23:20:20', 'Active'),
(11, 'Awo john', 'awo@gmail.com', 'Awo', 'awo', 'Rep', '2021-11-26 18:59:05', 'Active'),
(13, 'John', 'john@gmail.com', 'John', 'john', 'Rep', '2021-11-27 00:35:49', 'Active'),
(14, 'Victor', 'victor@gmail.com', 'Victor deede', '12345', 'Admin', '2021-11-29 09:45:55', 'Active'),
(15, 'Anders', 'anders@gmail.com', 'Anders', '54321', 'Rep', '2021-11-29 09:48:20', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mainsales`
--
ALTER TABLE `mainsales`
  ADD PRIMARY KEY (`msId`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`saleId`);

--
-- Indexes for table `tblitm`
--
ALTER TABLE `tblitm`
  ADD PRIMARY KEY (`itmId`),
  ADD UNIQUE KEY `proName` (`proName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mainsales`
--
ALTER TABLE `mainsales`
  MODIFY `msId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `saleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblitm`
--
ALTER TABLE `tblitm`
  MODIFY `itmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
