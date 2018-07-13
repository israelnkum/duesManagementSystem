-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2018 at 10:25 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duesMgmtSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment_log`
--

CREATE TABLE `payment_log` (
  `payment_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `amount_paid` decimal(10,0) NOT NULL,
  `arrears` decimal(10,0) NOT NULL,
  `amtInWord` varchar(10) NOT NULL,
  `receipt_id` int(11) NOT NULL,
  `refDate` varchar(20) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `datePaid` varchar(20) NOT NULL,
  `currentUser` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `pref_id` int(11) NOT NULL,
  `duesAmt` decimal(10,0) NOT NULL,
  `item` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`pref_id`, `duesAmt`, `item`) VALUES
(1, '25', 'lacost');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `std_id` int(11) NOT NULL,
  `firstName` varchar(199) NOT NULL,
  `lastName` varchar(199) NOT NULL,
  `otherName` varchar(199) DEFAULT NULL,
  `index_number` varchar(20) NOT NULL,
  `std_class` varchar(50) NOT NULL,
  `lacost` int(1) NOT NULL DEFAULT '0',
  `amount_paid` decimal(10,0) NOT NULL DEFAULT '0',
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_id`, `firstName`, `lastName`, `otherName`, `index_number`, `std_class`, `lacost`, `amount_paid`, `phone`) VALUES
(1, 'Israel', 'Nkum', 'Osikani', '07162734', 'HND Level 300', 0, '0', '0249051415');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(199) NOT NULL,
  `email` varchar(199) NOT NULL,
  `user_password` varchar(199) NOT NULL,
  `firstName` varchar(199) NOT NULL,
  `lastName` varchar(199) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `profileImg` char(1) DEFAULT '0',
  `updated` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `user_password`, `firstName`, `lastName`, `phone`, `user_type`, `profileImg`, `updated`) VALUES
(3, 'admin', 'taboo@me.com', '$2y$12$89VznqzMN5QqqLgOm.hA7u0KUz2m/wGcqL/c5uEi3gFNbvD4hksK.', 'Emmanuel', 'Ashon', '0000000000', 'Super Admin', '1', '1'),
(4, 'amoani', 'amoani@gmail.com', '$2y$12$CMRBrHwp9471AT5Ptb30QOHCeW18VkIWtJWhe6s1Vev0fzVmMGfRy', 'Frank', 'Arthur', '0000000000', 'Super Admin', '1', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_log`
--
ALTER TABLE `payment_log`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`pref_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_log`
--
ALTER TABLE `payment_log`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `pref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment_log`
--
ALTER TABLE `payment_log`
  ADD CONSTRAINT `payment_log_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `students` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
