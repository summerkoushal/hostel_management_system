-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2022 at 04:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'admin', 'admin@gmail.com', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '2022-04-04 20:31:45', '2022-11-19'),
(2, 'Summer', 'summer@gmail.com', 'd3d497ac35e89161ffb3d1417f1320c1b40bb39273e85f1a5bf7c7f63a423c35b4113cf2fdca07741ea428e56af5f1ae55aa4192df72d06987103d376e193680', '2022-12-01 02:53:02', '2022-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_sn` varchar(255) DEFAULT NULL,
  `course_fn` varchar(255) DEFAULT NULL,
  `posting_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_sn`, `course_fn`, `posting_date`) VALUES
(1, 'B10992', 'CSE', 'Computer Science and Engineering', '2022-07-04 19:31:42'),
(2, 'BCOM1453', 'IT', 'Information Technology', '2022-07-04 19:31:42'),
(3, 'BSC12', 'EXTC', 'Electronics and telecommunication engineering ', '2022-07-04 19:31:42'),
(4, 'BC36356', 'MECH', 'Mechanical engineering', '2022-07-04 19:31:42'),
(5, 'MCA565', 'EE', 'Electrical engineering', '2022-07-04 19:31:42'),
(6, 'MBA75', 'PROD', 'Production Engineering', '2022-07-04 19:31:42'),
(7, 'BE765', 'TEXT', 'Textile Engineering', '2022-07-04 19:31:42'),
(8, 'CH01', 'CHEM', 'Chemical Engineering', '2022-11-19 18:21:24'),
(9, 'CV02', 'CIVIL', 'Civil Engineering', '2022-11-19 18:23:20'),
(10, 'INS', 'ISTRU', 'Instrumentation Engineering', '2022-11-19 18:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `roomno` int(11) DEFAULT NULL,
  `seater` int(11) DEFAULT NULL,
  `feespm` int(11) DEFAULT NULL,
  `foodstatus` int(11) DEFAULT NULL,
  `stayfrom` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `course` varchar(500) DEFAULT NULL,
  `regno` int(11) DEFAULT NULL,
  `firstName` varchar(500) DEFAULT NULL,
  `middleName` varchar(500) DEFAULT NULL,
  `lastName` varchar(500) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `emailid` varchar(500) DEFAULT NULL,
  `egycontactno` bigint(11) DEFAULT NULL,
  `guardianName` varchar(500) DEFAULT NULL,
  `guardianRelation` varchar(500) DEFAULT NULL,
  `guardianContactno` bigint(11) DEFAULT NULL,
  `corresAddress` varchar(500) DEFAULT NULL,
  `corresCIty` varchar(500) DEFAULT NULL,
  `corresState` varchar(500) DEFAULT NULL,
  `corresPincode` int(11) DEFAULT NULL,
  `pmntAddress` varchar(500) DEFAULT NULL,
  `pmntCity` varchar(500) DEFAULT NULL,
  `pmnatetState` varchar(500) DEFAULT NULL,
  `pmntPincode` int(11) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `roomno`, `seater`, `feespm`, `foodstatus`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `corresState`, `corresPincode`, `pmntAddress`, `pmntCity`, `pmnatetState`, `pmntPincode`, `postingDate`, `updationDate`) VALUES
(2, 100, 5, 8000, 1, '2020-08-01', 6, 'Bachelor  of Technology', 10806121, 'Anuj', '', 'kumar', 'male', 1234567890, 'ak@gmail.com', 1236547890, 'ABC', 'XYZ', 98756320000, 'ABC 12345 XYZ Street', 'New Delhi', 'Delhi (NCT)', 110001, 'ABC 12345 XYZ Street', 'New Delhi', 'Delhi (NCT)', 110001, '2020-07-20 14:58:26', NULL),
(3, 101, 2, 15002, 1, '2022-11-20', 6, 'Computer Science and Engineering', 2020, 'Shreyash', 'Shriram', 'Patil', 'male', 8600384693, 'shreyashpatil256@gmail.com', 1234567890, '-', '-', 0, 'Nanded', 'nanded', 'Maharashtra', 431606, 'Nanded', 'nanded', 'Maharashtra', 431606, '2022-11-19 19:00:30', NULL),
(4, 103, 3, 15003, 1, '2022-11-20', 9, 'Computer Science and Engineering', 2020, 'Pavan ', 'Narayan ', 'Pabitwar ', 'male', 9999999999, 'pavan@gamil.com', 1234567890, 'noi', 'noi', 0, 'Ned', 'nanded', 'Madhya Pradesh', 431606, 'Ned', 'nanded', 'Madhya Pradesh', 431606, '2022-11-19 19:02:11', NULL),
(5, 100, 1, 15000, 0, '2022-12-01', 4, 'Electronics and telecommunication engineering ', 2020, 'Devid', 's', 'Patle', 'male', 9999999999, 'devidd@gamil.com', 1234567890, '-', '-', 0, 'Mumbai', 'Mumbai', 'Maharashtra', 431322, 'bikochu', 'delac', 'West Bengal', 321234, '2022-11-19 19:11:29', NULL),
(6, 100, 1, 15000, 0, '2022-11-23', 4, 'Mechanical engineering', 123, 'aakash', 'sunil', 'devkar', 'male', 9999999999, 'akn@gamil.com', 1234567890, 'noi', '-', 0, 'neri', 'neri', 'Nagaland', 232213, 'dekla', 'duklo', 'Arunachal Pradesh', 879879, '2022-11-19 19:13:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `seater` int(11) DEFAULT NULL,
  `room_no` int(11) DEFAULT NULL,
  `fees` int(11) DEFAULT 15000,
  `posting_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `posting_date`) VALUES
(1, 2, 101, 15002, '2022-11-19 18:29:46'),
(2, 1, 102, 15000, '2022-11-19 18:29:31'),
(3, 3, 103, 15003, '2022-11-19 18:30:02'),
(4, 4, 104, 1400, '2022-11-19 18:30:16'),
(5, 5, 105, 10000, '2022-11-19 18:30:37'),
(6, 1, 106, 15000, '2022-11-19 18:30:54'),
(7, 2, 107, 17000, '2022-11-19 18:31:07'),
(8, 3, 108, 18000, '2022-11-19 18:31:19'),
(9, 4, 109, 19000, '2022-11-19 18:31:30'),
(10, 5, 110, 15000, '2022-11-19 18:31:48'),
(11, 5, 201, 15000, '2022-11-19 18:33:28'),
(12, 4, 202, 15000, '2022-11-19 18:26:23'),
(13, 4, 203, 15000, '2022-11-19 18:26:23'),
(14, 2, 204, 15000, '2022-11-19 18:26:23'),
(15, 5, 205, 10000, '2022-11-19 18:30:37'),
(16, 3, 206, 10000, '2022-11-19 18:30:37'),
(17, 1, 207, 10000, '2022-11-19 18:30:37'),
(18, 3, 208, 10000, '2022-11-19 18:30:37'),
(20, 2, 210, 10000, '2022-11-19 18:30:37'),
(21, 2, 301, 10000, '2022-11-19 18:30:37'),
(22, 2, 302, 10000, '2022-11-19 18:30:37'),
(23, 4, 303, 10000, '2022-11-19 18:30:37'),
(24, 3, 304, 10000, '2022-11-19 18:30:37'),
(25, 3, 305, 10000, '2022-11-19 18:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `State` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `State`) VALUES
(1, 'Andaman and Nicobar Island (UT)'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh (UT)'),
(7, 'Chhattisgarh'),
(8, 'Dadra and Nagar Haveli (UT)'),
(9, 'Daman and Diu (UT)'),
(10, 'Delhi (NCT)'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu and Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Lakshadweep (UT)'),
(20, 'Madhya Pradesh'),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Puducherry (UT)'),
(28, 'Punjab'),
(29, 'Rajastha'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttarakhand'),
(35, 'Uttar Pradesh'),
(36, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(10, 10, 'jjj@gmail.com', 0x3a3a31, '', '', '2022-11-30 06:15:35'),
(11, 13, 'pavan@gmail.com', 0x3a3a31, '', '', '2022-11-30 06:20:58'),
(12, 15, 'alpha@gmail.com', 0x3a3a31, '', '', '2022-11-30 07:19:03'),
(13, 15, 'alpha@gmail.com', 0x3a3a31, '', '', '2022-11-30 07:20:33'),
(14, 13, 'pavan@gmail.com', 0x3a3a31, '', '', '2022-12-01 02:36:46'),
(15, 19, 'arpan@gmail.com', 0x3a3a31, '', '', '2022-12-01 02:50:39'),
(16, 13, 'pavan@gmail.com', 0x3a3a31, '', '', '2022-12-01 02:50:51'),
(17, 13, 'pavan@gmail.com', 0x3a3a31, '', '', '2022-12-01 02:51:55'),
(18, 19, 'arpan@gmail.com', 0x3a3a31, '', '', '2022-12-01 02:52:03'),
(19, 13, 'pavan@gmail.com', 0x3a3a31, '', '', '2022-12-01 02:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `regNo` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `contactNo` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(45) DEFAULT NULL,
  `passUdateDate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `regNo`, `firstName`, `middleName`, `lastName`, `gender`, `contactNo`, `email`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(13, '001', 'Pavan', 'Narayan', 'Pabitwar', 'male', 7688768675, 'pavan@gmail.com', '4b57b881eed14e4bd9f6c5d3848df7b42aa041919d68a9ecf396070191c6fc2285659e3f1ca5f0b6725fd7612f01ef0a432fceecbb33953f85836431bd802c2d', '2022-11-30 06:19:28', NULL, NULL),
(19, '002', 'Arpan', 'Kumar', 'Chandel', 'male', 210381230, 'arpan@gmail.com', '9e99e2ce623f08b688adb7864da91e04217acabda8eee481e47f055a5214f577dc148f13cb7634d78ca0ffa2ec521b79fec31b9adb5d57de1ec849a169abffa8', '2022-12-01 02:50:26', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
