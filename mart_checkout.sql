-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 04, 2018 at 07:07 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mart_checkout`
--
CREATE DATABASE IF NOT EXISTS `mart_checkout` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mart_checkout`;

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--
-- Creation: May 08, 2018 at 12:40 AM
--

DROP TABLE IF EXISTS `approvals`;
CREATE TABLE `approvals` (
  `barcode` varchar(255) NOT NULL,
  `banner_id` varchar(11) NOT NULL,
  `date_issued` varchar(10) NOT NULL,
  `date_due` varchar(10) NOT NULL,
  `notes` varchar(5000) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = false = not approved, 1 = true = approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `checked_out`
--
-- Creation: May 08, 2018 at 12:40 AM
--

DROP TABLE IF EXISTS `checked_out`;
CREATE TABLE `checked_out` (
  `checkout_id` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `banner_id` varchar(11) NOT NULL,
  `date_issued` varchar(10) NOT NULL,
  `date_due` varchar(10) NOT NULL,
  `notes` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--
-- Creation: May 08, 2018 at 12:40 AM
--

DROP TABLE IF EXISTS `clearance`;
CREATE TABLE `clearance` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `class` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--
-- Creation: May 08, 2018 at 04:37 AM
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `barcode` varchar(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `clearance` varchar(20) NOT NULL,
  `notes` varchar(5000) NOT NULL,
  `account_purchased_from` varchar(500) NOT NULL,
  `status` enum('out of commission','available for checkout','reserved','available after class','out for repair') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--
-- Creation: May 08, 2018 at 09:12 PM
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `student_id` varchar(11) NOT NULL COMMENT 'barcode from id',
  `date_pickup` varchar(255) NOT NULL,
  `date_due` varchar(255) NOT NULL,
  `notes` varchar(5000) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `date_time` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `barcode`, `student_id`, `date_pickup`, `date_due`, `notes`, `user_id`, `date_time`) VALUES
(5, '1234', '1234', '05/09/2018 9:30 AM', '05/11/2018 4:00 PM', '', '1234', 'Tue, 08 May 18 03:25:26pm');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--
-- Creation: May 08, 2018 at 03:04 AM
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `banner_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `clearance_level` int(5) NOT NULL,
  `amount_owed` decimal(10,0) NOT NULL DEFAULT '0',
  `enrollment` enum('inactive','active') NOT NULL,
  `eligibility` enum('ineligible','eligible') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: May 08, 2018 at 12:40 AM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `banner_id` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` enum('Manager','Assistant','Student Employee') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`banner_id`, `name`, `role`) VALUES
('1234', 'Manager', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`barcode`);

--
-- Indexes for table `checked_out`
--
ALTER TABLE `checked_out`
  ADD PRIMARY KEY (`checkout_id`),
  ADD UNIQUE KEY `Unique` (`barcode`) USING BTREE;

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`barcode`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD UNIQUE KEY `Unique` (`barcode`) USING BTREE;

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`banner_id`),
  ADD UNIQUE KEY `banner_id` (`banner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checked_out`
--
ALTER TABLE `checked_out`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
