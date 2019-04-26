-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 12:43 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedgenerate`
--

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`user_id`, `user_name`, `user_pass`) VALUES
(1, 'sdfr', 'rt'),
(2, 'dfgh', 'nm'),
(3, 'fghj', 'admin'),
(4, 'fghj', 'admin'),
(5, 'hii', 'admin'),
(6, 'asdf', 'admin'),
(7, 'asdfghj', 'admin'),
(8, 'C1002', 'admin'),
(9, 'ghjk', 'admin'),
(10, 'xcvbnm', 'admin'),
(11, 'qwertyuiop', 'admin'),
(12, 'C1002', 'admin'),
(13, 'user', 'admin'),
(14, 'sdfghj', 'admin'),
(15, 'C1001', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `transactionfiles`
--

CREATE TABLE `transactionfiles` (
  `file_id` int(11) NOT NULL,
  `files` text NOT NULL,
  `file_name` text NOT NULL,
  `file_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactionfiles`
--

INSERT INTO `transactionfiles` (`file_id`, `files`, `file_name`, `file_status`) VALUES
(1, 'http://localhost/FeedGeneration/upload/successv - Sheet1 - successv - Sheet1.csv', 'successv - Sheet1 - successv - Sheet1.csv', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `transactionfiles`
--
ALTER TABLE `transactionfiles`
  ADD PRIMARY KEY (`file_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transactionfiles`
--
ALTER TABLE `transactionfiles`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
