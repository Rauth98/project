-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2018 at 05:31 PM
-- Server version: 5.6.39
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bizzmana_cue`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `img_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `img_url`) VALUES
(1, 'CUE Admin ', 'admin', 'admin', 'a.png'),
(0, 'Shripal Jadhav', 'shripal', '123456', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(10) NOT NULL,
  `cname` text NOT NULL,
  `url` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `url`, `description`) VALUES
(1, 'food', 'category_img/163ca0b6c8.png', 'food related '),
(2, 'abc', 'category_img/f2076042bb.jpg', 'abc description'),
(3, 'abcd', 'category_img/e8a7f38d89.png', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(100) NOT NULL,
  `user_id` int(255) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `from_date` text NOT NULL,
  `exp_date` text NOT NULL,
  `remainder` text NOT NULL,
  `flag` int(100) NOT NULL,
  `prize` varchar(100) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `user_id`, `cat_id`, `from_date`, `exp_date`, `remainder`, `flag`, `prize`, `url`) VALUES
(1, 2, 1, '17/5/2018', '27/6/2018', '5', 1, '5000', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `dbo` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `location` text NOT NULL,
  `area` text NOT NULL,
  `zip_code` text NOT NULL,
  `family_members` int(11) NOT NULL,
  `brothers` int(10) NOT NULL,
  `prof_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `dbo`, `mobile`, `email`, `password`, `location`, `area`, `zip_code`, `family_members`, `brothers`, `prof_url`) VALUES
(2, 'shripal', 'jadhav', '15/10/1994', '9673212277', 'jadhavshripal510gmail.com', '123', 'pune', 'man', '102', 5, 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
