-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2017 at 08:37 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `exe_manager`
--

CREATE TABLE `exe_manager` (
  `uid` int(10) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `upass` char(32) NOT NULL,
  `ukey` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exe_manager`
--

INSERT INTO `exe_manager` (`uid`, `uname`, `upass`, `ukey`) VALUES
(1, 'hashan', 'c361a838b88ff7bc456a912ef9cdef7b', '372f7f4885feaa5306450ceb2aee8834'),
(2, 'jackson', 'b41779690b83f182acc67d6388c7bac9', '587b5d0881e4ff1bf9a6980c1cfc46f2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exe_manager`
--
ALTER TABLE `exe_manager`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exe_manager`
--
ALTER TABLE `exe_manager`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
