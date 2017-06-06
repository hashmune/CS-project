-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2017 at 01:09 PM
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
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dis_id` int(11) NOT NULL,
  `dis_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dis_id`, `dis_name`) VALUES
(1, 'Colombo'),
(2, 'Kandy'),
(3, 'Kalutara'),
(4, 'Gampaha'),
(5, 'Galle'),
(6, 'Matara'),
(7, 'Ratnapura'),
(8, 'Badulla'),
(9, 'Anuradhapura');

-- --------------------------------------------------------

--
-- Table structure for table `exe_manager`
--

CREATE TABLE `exe_manager` (
  `uid` int(10) NOT NULL,
  `name` varchar(120) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `upass` char(32) NOT NULL,
  `ukey` char(32) NOT NULL,
  `role` varchar(150) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exe_manager`
--

INSERT INTO `exe_manager` (`uid`, `name`, `uname`, `upass`, `ukey`, `role`, `branch`, `telephone`, `email`) VALUES
(1, 'H. Munasinghe', 'hashan', 'c361a838b88ff7bc456a912ef9cdef7b', '372f7f4885feaa5306450ceb2aee8834', 'Product Manager', 'Wadduwa', '+94711234567', 'hashan@gmail.ccom'),
(2, 'C.N. Ariyasiri', 'chamith', '91542b13fb830e4803ff9fa7eaff59b8', '39765e6184884422806989f37433c419', 'Product Manager', 'Horana', '+94771337699', 'chamithniroshanacn@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dis_id`);

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
