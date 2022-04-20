-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 08:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

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
(1, 'nabil', 'newaz', '7354528189', '01714940700', 'b+', '1999-11-04', 'male', 'rajshahi', 'sirajganj', 'sirajganj sadar', 1),
(2, 'rahat', 'islam', '7334524189', '01715427898', 'b+', '0000-00-00', 'male', 'khulna', 'khulna', 'rupsa', 1),
(3, 'regone', 'hossain', '7357935189', '01795552887', 'a+', '0000-00-00', 'male', 'khulna', 'satkhira', 'kaliganj', 1),
(4, 'kjhsd', 'asdhiasud', '9567489761', '01710145646', 'b+', '0000-00-00', 'male', 'rajshahi', 'rajshahi', 'bagha', 1),
(5, 'uyrtutyu', 'ytuytutyu', '9777487761', '01946789155', 'b+', '2015-01-22', 'male', 'rajshahi', 'sirajganj', 'sirajganj sadar', 1),
(6, 'uyrtutyu', 'dsafsdfsf', '9567589761', '01549784655', 'b+', '1999-11-04', 'female', 'rajshahi', 'sirajganj', 'sirajganj sadar', 1),
(7, 'uyrtutyu', 'uytuytuy', '9567799761', '04567895411', 'a-', '2014-10-15', 'female', 'khulna', 'bagerhat', 'bagerhat sadar', 1),
(8, 'uyrtutyu', 'fdgfdgdf', '9567489734', '04567894511', 'a-', '2017-06-21', 'male', 'dhaka', 'dhaka', 'dohar', 1);

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
(1, 'nabilnewaz@gmail.com', '$2y$10$DpFHVW2e8z3SVBOe0WPQWeWWFGpLISmLf3UyfL2pFHiaqgMJqz9Gu', 1, NULL, ''),
(2, 'skrahat@gmail.com', '$2y$10$xpolvv4O4gpxczLwpoAuGeiWLtY/OISP99ms7gs.D0r8NHD/SA8IK', 2, NULL, ''),
(3, 'regone12345@gmail.com', '$2y$10$M2wRlK0WxPCBdOhoXMTsiO/JJig9z7PD/rBBaO8oul4WY07L9ZO/2', 3, NULL, ''),
(4, 'm_hasan3209@yahoo.com', '$2y$10$WG1UM3f0Sx04wWkn7ORkYO3pgm8/aLCUJE8YG41ZGJFj3.sl9Cxxe', 4, NULL, ''),
(5, 'newaz@gmail.com', '$2y$10$WVUmOmb5tT1UVH8SFnUIgepDOPrSNYGFyLhByVisMD/bfs6OXEeQG', 5, NULL, ''),
(6, 'test@gmail.com', '$2y$10$/kbcjYbeUNXNvYkmClE/LOYOUiZLVctFIuJmZZ/06wiUpT0fS26fu', 6, NULL, 'testtest'),
(7, 'testpass@gmail.com', '$2y$10$RqtLa8Ag16zevVPFaQ0qxuKeVmb3yANNimFhdcNYq.RCFLbkAn1Dm', 7, NULL, 'testpass'),
(8, 'testtime@gmail.com', '$2y$10$rpkjakfxgy.ujvlSeK36oOCoQkssQEIOsEJ.lOivkCdLL7.idJQ2m', 8, '2021-04-22 11:35:54', 'testtime');

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
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
