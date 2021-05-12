-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 05:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcrsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `accountType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `custName` varchar(100) NOT NULL,
  `custPhone` varchar(12) NOT NULL,
  `custEmail` varchar(100) NOT NULL,
  `custAddress` varchar(500) NOT NULL,
  `custStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `serReqID` int(11) NOT NULL,
  `paymentType` varchar(50) NOT NULL,
  `paymentStatus` varchar(50) NOT NULL,
  `amountPay` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pick up delivery`
--

CREATE TABLE `pick up delivery` (
  `pickUpID` int(11) NOT NULL,
  `riderID` int(11) NOT NULL,
  `serReqID` int(11) NOT NULL,
  `pickUpDate` int(11) NOT NULL,
  `pickUpAddress` int(11) NOT NULL,
  `pickUpStatus` int(11) NOT NULL,
  `deliveryStatus` int(11) NOT NULL,
  `deliveryDate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `repairing staff`
--

CREATE TABLE `repairing staff` (
  `repairStaffID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `repairStaffName` varchar(100) NOT NULL,
  `certificate` longtext NOT NULL,
  `repairStaffPhone` varchar(12) NOT NULL,
  `repairStaffEmail` varchar(100) NOT NULL,
  `repairStaffAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `riderID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `riderName` varchar(100) NOT NULL,
  `vehicleType` varchar(20) NOT NULL,
  `riderPhone` varchar(12) NOT NULL,
  `license` varchar(50) NOT NULL,
  `riderEmail` varchar(100) NOT NULL,
  `riderAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service request quotation`
--

CREATE TABLE `service request quotation` (
  `serReqID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `repairStaffID` int(11) NOT NULL,
  `serviceType` varchar(15) NOT NULL,
  `symptom` varchar(100) NOT NULL,
  `damageInfo` varchar(100) NOT NULL,
  `requestStatus` varchar(100) NOT NULL,
  `requestDate` date NOT NULL,
  `requestTime` time NOT NULL,
  `amountPrice` float NOT NULL,
  `requestDetail` varchar(100) NOT NULL,
  `requestProgress` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `staffName` varchar(100) NOT NULL,
  `staffPhone` varchar(12) NOT NULL,
  `staffEmail` varchar(100) NOT NULL,
  `staffAddress` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `pick up delivery`
--
ALTER TABLE `pick up delivery`
  ADD PRIMARY KEY (`pickUpID`);

--
-- Indexes for table `repairing staff`
--
ALTER TABLE `repairing staff`
  ADD PRIMARY KEY (`repairStaffID`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`riderID`);

--
-- Indexes for table `service request quotation`
--
ALTER TABLE `service request quotation`
  ADD PRIMARY KEY (`serReqID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pick up delivery`
--
ALTER TABLE `pick up delivery`
  MODIFY `pickUpID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repairing staff`
--
ALTER TABLE `repairing staff`
  MODIFY `repairStaffID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `riderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service request quotation`
--
ALTER TABLE `service request quotation`
  MODIFY `serReqID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
