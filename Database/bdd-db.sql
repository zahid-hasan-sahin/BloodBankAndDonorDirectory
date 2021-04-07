-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 10:16 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor_info`
--

CREATE TABLE `donor_info` (
  `donor_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `phno` varchar(100) NOT NULL,
  `gp` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `divisions` varchar(100) NOT NULL,
  `district` varchar(255) NOT NULL,
  `thana` varchar(255) NOT NULL,
  `hide_data` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_info`
--

INSERT INTO `donor_info` (`donor_id`, `first_name`, `last_name`, `nid`, `phno`, `gp`, `age`, `gender`, `divisions`, `district`, `thana`, `hide_data`) VALUES
(1, 'nabil', 'newaz', '7354528189', '01714940700', 'b+', 23, 'male', 'rajshahi', 'sirajganj', 'sirajganj sadar', 1),
(2, 'rahat', 'islam', '7334524189', '01715427898', 'b+', 22, 'male', 'khulna', 'khulna', 'rupsa', 1),
(3, 'regone', 'hossain', '7357935189', '01795552887', 'a+', 19, 'male', 'khulna', 'satkhira', 'kaliganj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`user_id`, `email`, `password`, `donor_id`, `created_at`) VALUES
(1, 'nabilnewaz@gmail.com', '$2y$10$DpFHVW2e8z3SVBOe0WPQWeWWFGpLISmLf3UyfL2pFHiaqgMJqz9Gu', 1, NULL),
(2, 'skrahat@gmail.com', '$2y$10$xpolvv4O4gpxczLwpoAuGeiWLtY/OISP99ms7gs.D0r8NHD/SA8IK', 2, NULL),
(3, 'regone12345@gmail.com', '$2y$10$M2wRlK0WxPCBdOhoXMTsiO/JJig9z7PD/rBBaO8oul4WY07L9ZO/2', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recipient_info`
--

CREATE TABLE `recipient_info` (
  `re_id` int(11) NOT NULL,
  `re_name` varchar(50) NOT NULL,
  `re_phno` varchar(255) NOT NULL,
  `re_address` varchar(255) NOT NULL,
  `re_age` int(11) NOT NULL,
  `re_gender` varchar(255) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `bag_no` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipient_info`
--

INSERT INTO `recipient_info` (`re_id`, `re_name`, `re_phno`, `re_address`, `re_age`, `re_gender`, `hospital_name`, `bag_no`, `donor_id`) VALUES
(1, 'Shimul Islam', '01717769796', 'rajshahi', 25, 'Male', 'Islami Bank Medical College Hospital Rajshahi', 1, 1),
(2, 'Subel Islam', '01744100471', 'Sirajganj', 26, 'Male', 'Medinova Hospital Complex, sirajganj', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor_info`
--
ALTER TABLE `donor_info`
  ADD PRIMARY KEY (`donor_id`),
  ADD UNIQUE KEY `nid` (`nid`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `recipient_info`
--
ALTER TABLE `recipient_info`
  ADD PRIMARY KEY (`re_id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor_info`
--
ALTER TABLE `donor_info`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recipient_info`
--
ALTER TABLE `recipient_info`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_info`
--
ALTER TABLE `login_info`
  ADD CONSTRAINT `login_info_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor_info` (`donor_id`);

--
-- Constraints for table `recipient_info`
--
ALTER TABLE `recipient_info`
  ADD CONSTRAINT `recipient_info_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor_info` (`donor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
