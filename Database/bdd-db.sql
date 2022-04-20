-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 10:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

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
  `age` date NOT NULL,
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
(1, 'nabil', 'newaz', '7354528189', '01714940700', 'ab+', '1999-11-04', 'male', 'rajshahi', 'sirajganj', 'sirajganj sadar', 1),
(2, 'anika', 'tabassum', '2415229315', '01521491660', 'a+', '2000-01-31', 'female', 'rajshahi', 'bogura', 'bogra sadar', 1),
(3, 'naimur', 'rahman', '7362041282', '01761009030', 'o+', '2000-12-30', 'male', 'rajshahi', 'sirajganj', 'sirajganj sadar', 1),
(4, 'asif hassan', 'sabbir', '9161764387', '01761483596', 'b+', '2001-07-14', 'male', 'rajshahi', 'sirajganj', 'sirajganj sadar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `mainpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`user_id`, `email`, `password`, `donor_id`, `created_at`, `mainpass`) VALUES
(1, 'nabilnewaz@gmail.com', '$2y$10$0JUKG8nH978lkURaMb76GeH77RiUDP2W9l0jO81mH5JjbCse4H/li', 1, '2022-04-20 09:49:39', 'nabilnewaz123'),
(2, 'nisamarium9@gmail.com', '$2y$10$x632nJtpFyWLWjsNVdR9IuMG8g1AFKQlMR3.NJhOeZdgpFDVxxmVO', 2, '2022-04-20 09:52:35', 'nisamarium9'),
(3, 'naimurrahman9030@gmail.com', '$2y$10$kBDQjpgg3J9RMLnfsyRBm.MZYz7uAEH4bNRxdL1fS/5TXHGfrpLtu', 3, '2022-04-20 09:57:37', 'naimurrahman9030'),
(4, 'asifhassansabbir@gmail.com', '$2y$10$HCUJLXpSkmMvqYMdt10yHuCHDE1pgFC9ClOOVqlMW8FESvoLiYq6C', 4, '2022-04-20 10:01:45', 'asifhassansabbir');

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
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recipient_info`
--
ALTER TABLE `recipient_info`
  MODIFY `re_id` int(11) NOT NULL AUTO_INCREMENT;

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
