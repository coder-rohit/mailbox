-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 09:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mailbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `draft`
--

CREATE TABLE `draft` (
  `id` int(100) NOT NULL,
  `Receiver` varchar(100) DEFAULT NULL,
  `Subject` varchar(500) DEFAULT NULL,
  `Message` varchar(1000) DEFAULT NULL,
  `Sender` varchar(100) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `draft`
--

INSERT INTO `draft` (`id`, `Receiver`, `Subject`, `Message`, `Sender`, `datetime`) VALUES
(6, 'Vaibhav', 'Dardfc', 'dvssFVsfv', 'Rohit Panchal', '2021-02-22 07:32:49'),
(7, 'Karan', 'DdsFw', 'wrvfervf', 'Rohit', '2021-02-22 07:32:49'),
(9, 'Vimo', 'vervsf', 'verfsvvrsf', 'Rohit', '2021-02-22 07:32:49'),
(10, 'Vaibhav', 'veSRFVZC', 'SVFERFSVAAER', 'Rohit', '2021-02-22 07:32:49'),
(11, 'Vaibhav', 'veSRFVZC', 'SVFERFSVAAER', 'Rohit', '2021-02-22 07:32:49'),
(12, 'Vaibhav', 'veSRFVZC', 'SVFERFSVAAER', 'Rohit', '2021-02-22 07:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `uid` int(11) NOT NULL,
  `Receiver` varchar(100) DEFAULT NULL,
  `Sender` varchar(100) DEFAULT NULL,
  `Subject` varchar(200) DEFAULT NULL,
  `Message` varchar(2000) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`uid`, `Receiver`, `Sender`, `Subject`, `Message`, `datetime`) VALUES
(1, 'Karan', 'Rohit Panchal', 'Rohitmarsk', 'ADVdfsvz', '2021-02-22 06:19:33'),
(2, 'Karan', 'Rohit Panchal', 'Rohitmarsk', 'ADVdfsvz', '2021-02-22 06:23:46'),
(3, 'Vaibhav', 'Rohit Panchal', 'Helloe', 'dca', '2021-02-22 06:27:02'),
(4, 'Vaibhav', 'Rohit Panchal', 'Helloe', 'dca', '2021-02-22 06:47:19'),
(5, 'Sethi', 'Rohit', 'DSAVafv', 'aedfveafvrea', '2021-02-22 07:14:39'),
(6, 'Rohit', 'Karan', 'hello', 'dafcvklsD', '2021-02-22 07:44:10'),
(7, 'Rohit', 'Aman', 'AECFD', 'ADVSFv', '2021-02-22 07:44:27'),
(8, 'Rohit', 'Vaibhav', 'DFKJvads', 'vsdfvkjs', '2021-02-22 07:44:48'),
(9, 'Rohit', 'Vimo', 'dACs', 'dVCSdvsdvc', '2021-02-22 07:45:21'),
(10, 'Rohit', 'Sethi', 'Hello brother', 'How are you', '2021-02-22 07:49:55'),
(11, 'Aman', 'Rohit', 'hesds', 'vsdvcs', '2021-02-22 07:50:40'),
(12, 'Rohit', 'Rohit', 'sdv', 'vsdv', '2021-02-22 07:50:45'),
(13, 'Karan', 'Rohit', 'csdv', 'svcsdv', '2021-02-22 07:50:51'),
(14, 'Vimo', 'Rohit', 'csdv', 'sdvzcsdv', '2021-02-22 07:51:00'),
(15, 'Vaibhav', 'Rohit', 'ervgdsf', 'vervgerfv', '2021-02-22 07:51:19'),
(16, 'Karan', 'Rohit', 'Hiii', 'Hello ', '2021-02-22 08:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `phone`, `dob`, `gender`, `country`) VALUES
(3, 'Aman', 'amanb', '1234', '9080789789', '2021-02-20', 'Male', 'Australia'),
(4, 'Rohit Panchal', 'rpanchal', '12345678', '7876582345', '2021-02-26', 'Male', 'Azerbaijan'),
(5, 'Karan', 'karanb', '1234', '9306586248', '2021-02-10', 'Male', 'Armenia'),
(6, 'Vaibhav', 'Vaibhavk', '1234', '9658745216', '2021-02-24', 'Male', 'Angola'),
(7, 'Sethi', 'sethip', '1234', '8574698745', '2016-03-03', 'Male', 'Faroe Islands'),
(8, 'Vimo', 'vimos', '1234', '7876456123', '2018-01-31', 'Male', 'Morocco'),
(9, 'Rohit', 'rohitp', '1234', '7876123777', '2021-02-16', 'Male', 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `draft`
--
ALTER TABLE `draft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `draft`
--
ALTER TABLE `draft`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
