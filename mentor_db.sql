-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 07:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `adminID` int(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`adminID`, `name`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `admission_form`
--

CREATE TABLE `admission_form` (
  `adid` int(6) UNSIGNED NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `g_mail` text NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `addres` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admission_form`
--

INSERT INTO `admission_form` (`adid`, `fname`, `lname`, `g_mail`, `father_name`, `phone`, `addres`) VALUES
(15, 'teena', 'rani', 'sainivarinder384@gmail.com', 'rajinder', 917009244019, 'xyz'),
(16, 'teena', 'rani', 'sainivarinder384@gmail.com', 'rajinder', 917009244019, 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(5) UNSIGNED NOT NULL,
  `cname` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` bigint(15) NOT NULL,
  `cimg` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`, `description`, `price`, `cimg`) VALUES
(17, 'hospital', 'tablat', 10000, 'events-1.jpg'),
(16, 'rohit saini', 'test', 700, 'course-1.jpg'),
(15, 'toy', 'test img', 10000, 'about.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event_data`
--

CREATE TABLE `event_data` (
  `eid` int(5) UNSIGNED NOT NULL,
  `ename` varchar(20) NOT NULL,
  `e_description` text NOT NULL,
  `e_date` date NOT NULL,
  `e_img` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `event_data`
--

INSERT INTO `event_data` (`eid`, `ename`, `e_description`, `e_date`, `e_img`) VALUES
(5, 'sunty', '      test', '2023-09-27', 'events-1.jpg'),
(6, 'harsh', 'harsh test', '2023-09-12', 'about.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `pid` int(5) UNSIGNED NOT NULL,
  `pname` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`pid`, `pname`, `description`) VALUES
(5, 'tvs', 'hero'),
(3, 'sports', 'boll');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `vid` int(10) UNSIGNED NOT NULL,
  `vname` varchar(50) NOT NULL,
  `vcourse` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `vimg` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`vid`, `vname`, `vcourse`, `description`, `vimg`) VALUES
(1, 'harsh saini', 'computer bss', '           my name is harsh.', 'trainer-2.jpg'),
(6, 'harsh', 'computer bassic', '       my name is harsh.', 'trainer-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(10) UNSIGNED NOT NULL,
  `sname` varchar(50) NOT NULL,
  `scourse` varchar(50) NOT NULL,
  `fee` int(10) NOT NULL,
  `e_mail` text NOT NULL,
  `phone` bigint(10) NOT NULL,
  `alt_phone` bigint(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admission_date` date NOT NULL,
  `student_img` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `scourse`, `fee`, `e_mail`, `phone`, `alt_phone`, `username`, `password`, `admission_date`, `student_img`) VALUES
(1, 'harsh', 'web', 12000, 'raman123@gmail.com', 8699902297, 8527859500, 'raman', 'raman@14', '2023-10-31', 'about.jpg'),
(2, '  kamal saini', '  developer', 8000, '  kamal25@gmail.com', 8527419630, 9888178916, '  kamal', '  kamal@12', '2023-10-16', 'trainer-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `tid` int(10) UNSIGNED NOT NULL,
  `cid` int(10) NOT NULL,
  `tname` varchar(20) NOT NULL,
  `t_details` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `timg` text NOT NULL,
  `t_mail` text NOT NULL,
  `phone` bigint(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`tid`, `cid`, `tname`, `t_details`, `description`, `timg`, `t_mail`, `phone`, `username`, `password`) VALUES
(35, 16, 'harsh', 'bike top best', 'this is testing', 'trainer-1.jpg', 'harinder@26gmail.com', 8699902297, 'HAR123', 'test34'),
(36, 15, 'Roy', 'dady', 'Description:', 'trainer-2.jpg', 'harsh@26gmail.com', 8527419630, 'kamal123', '789034'),
(29, 15, 'dady', 'bike test', 'this is testing', 'trainer-1.jpg', 'kamal@26gmail.com', 8699902297, 'harinder', 'test4'),
(31, 17, 'dady', 'bike test', 'testing', 'trainer-2.jpg', 'rohit@26gmail.com', 8699902297, 'harinder', 'test2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `admission_form`
--
ALTER TABLE `admission_form`
  ADD PRIMARY KEY (`adid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `event_data`
--
ALTER TABLE `event_data`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `adminID` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission_form`
--
ALTER TABLE `admission_form`
  MODIFY `adid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `event_data`
--
ALTER TABLE `event_data`
  MODIFY `eid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `pid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `vid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `tid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
