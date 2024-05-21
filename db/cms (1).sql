-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 06:03 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', '20-05-2024 08:33:35 PM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` longtext NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Biological Hazards', 'Biological hazards are substances from people, animals, or plants that threaten health. ', '2024-05-19 17:01:53', ''),
(2, 'Chemical Hazards', ' When such releases involve dangerous chemicals, whether in solid, liquid, or gas form, they can trigger poisonings, evacuations, or decontamination projects.', '2024-05-19 17:04:00', ''),
(3, 'Security Hazard', '', '2024-05-20 15:08:06', ''),
(4, 'Safety Hazard', '', '2024-05-20 15:08:38', ''),
(5, 'Industrial Hazard', '', '2024-05-20 15:08:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(1, 1, 'in process', 'Thank you for bringing this urgent matter to my attention. The safety and well-being of our employees and visitors are our top priorities, and I appreciate your prompt action in addressing the situation and informing us.', '2024-05-19 17:20:25'),
(2, 2, 'in process', 'stage 1', '2024-05-20 15:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `stateName` varchar(255) NOT NULL,
  `stateDescription` tinytext NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `stateName`, `stateDescription`, `postingDate`, `updationDate`) VALUES
(1, 'IT Support Operator', '', '2024-05-19 17:09:45', '20-05-2024 08:42:20 PM'),
(2, 'Production Management Operator', '', '2024-05-19 17:10:03', '20-05-2024 08:42:44 PM'),
(3, 'First Aid Response Operator', '', '2024-05-20 15:13:27', ''),
(4, 'Electrical Systems Operator', '', '2024-05-20 15:13:36', ''),
(5, 'Physical Security Operator', '', '2024-05-20 15:13:44', ''),
(6, 'Quality Control Operate', '', '2024-05-20 15:13:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 1, 'Fecal matter', '2024-05-19 17:04:34', ''),
(2, 1, 'Blood', '2024-05-19 17:04:55', ''),
(3, 1, 'Bacteria and viruses', '2024-05-19 17:05:08', ''),
(4, 1, 'Mildew and molds', '2024-05-19 17:05:20', ''),
(5, 2, 'Chemical-resistant coveralls', '2024-05-19 17:08:46', ''),
(6, 2, 'Rubber gloves', '2024-05-19 17:09:01', ''),
(7, 2, 'Safety goggles', '2024-05-19 17:09:12', ''),
(8, 2, 'Respirators', '2024-05-19 17:09:24', ''),
(9, 5, 'Chemical Spills', '2024-05-20 15:09:19', ''),
(10, 5, '	 Gas Leaks', '2024-05-20 15:09:31', ''),
(11, 5, 'Building Structural Issues', '2024-05-20 15:10:01', ''),
(12, 3, 'Cyber Attacks', '2024-05-20 15:10:12', ''),
(13, 3, 'Unauthorized Access', '2024-05-20 15:10:40', ''),
(14, 4, 'Workplace Accidents', '2024-05-20 15:11:08', ''),
(15, 4, '	 Electrical Safety', '2024-05-20 15:11:24', ''),
(16, 3, 'Network  Hazards', '2024-05-20 15:11:45', ''),
(17, 5, 'Equipment Malfunctions', '2024-05-20 15:11:59', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `complaintType` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `noc` varchar(255) NOT NULL,
  `complaintDetails` mediumtext NOT NULL,
  `complaintFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `userId`, `category`, `subcategory`, `complaintType`, `state`, `noc`, `complaintDetails`, `complaintFile`, `regDate`, `status`, `lastUpdationDate`) VALUES
(1, 2, 1, 'Blood', ' Complaint', 'Eastern', 'Urgent: Biological Hazard Concern - Blood Contamination', 'I am writing to bring to your immediate attention a serious biological hazard that I encountered During my routine duties, I discovered a significant spill of blood on the floor and surrounding surfaces.', '1.JPG', '2024-05-19 17:16:11', 'in process', '2024-05-19 17:20:25'),
(2, 3, 1, 'Fecal matter', 'General Query', 'Eastern', '123', '123', 'Screenshot_19-5-2024_224748_localhost.jpeg', '2024-05-20 14:51:15', 'in process', '2024-05-20 15:14:56'),
(3, 3, 1, 'Mildew and molds', 'General Query', 'Eastern', '67657', '56767', '', '2024-05-20 14:52:56', NULL, '0000-00-00 00:00:00'),
(4, 3, 2, 'Chemical-resistant coveralls', ' Complaint', 'Eastern', '6567', 'tryr67', '', '2024-05-20 14:54:50', NULL, '0000-00-00 00:00:00'),
(5, 3, 1, 'Blood', 'General Query', 'Eastern', '7777', '88', 'Screenshot_19-5-2024_225053_localhost.jpeg', '2024-05-20 14:58:13', NULL, '0000-00-00 00:00:00'),
(6, 3, 1, 'Bacteria and viruses', 'General Query', 'Eastern', '78', '878', '', '2024-05-20 14:58:49', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 0, 'john@gmail.com', 0x3a3a3100000000000000000000000000, '2020-05-08 14:14:43', '', 0),
(2, 1, 'john@gmail.com', 0x3a3a3100000000000000000000000000, '2020-05-08 14:14:50', '08-05-2020 07:44:51 PM', 1),
(3, 1, 'john@gmail.com', 0x3a3a3100000000000000000000000000, '2020-05-08 14:16:30', '', 1),
(4, 2, 'shopi3100@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-19 08:37:53', '19-05-2024 02:08:23 PM', 1),
(5, 2, 'shopi3100@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-19 10:08:43', '', 1),
(6, 2, 'shopi3100@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-19 16:46:47', '19-05-2024 10:16:50 PM', 1),
(7, 2, 'shopi3100@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-19 17:10:45', '19-05-2024 10:47:06 PM', 1),
(8, 2, 'shopi3100@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-19 17:21:14', '19-05-2024 10:51:53 PM', 1),
(9, 2, 'shopi3100@gmail.com', 0x3a3a3100000000000000000000000000, '2024-05-19 17:23:56', '19-05-2024 10:55:23 PM', 1),
(10, 3, 'gayesha@mail.com', 0x3a3a3100000000000000000000000000, '2024-05-20 14:43:42', '20-05-2024 08:19:59 PM', 1),
(11, 3, 'gayesha@mail.com', 0x3a3a3100000000000000000000000000, '2024-05-20 14:50:08', '20-05-2024 08:22:29 PM', 1),
(12, 3, 'gayesha@mail.com', 0x3a3a3100000000000000000000000000, '2024-05-20 14:52:39', '20-05-2024 08:24:19 PM', 1),
(13, 3, 'gayesha@mail.com', 0x3a3a3100000000000000000000000000, '2024-05-20 14:54:29', '', 1),
(14, 3, 'gayesha@mail.com', 0x3a3a3100000000000000000000000000, '2024-05-20 14:57:15', '20-05-2024 08:32:39 PM', 1),
(15, 3, 'gayesha@mail.com', 0x3a3a3100000000000000000000000000, '2024-05-20 15:54:39', '20-05-2024 09:25:12 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `address` tinytext DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `address`, `State`, `country`, `pincode`, `userImage`, `regDate`, `updationDate`, `status`) VALUES
(1, 'John Smith', 'john@gmail.com', '202cb962ac59075b964b07152d234b70', 9999999999, NULL, NULL, NULL, NULL, NULL, '2020-05-08 14:10:50', '2020-05-08 14:16:22', 1),
(2, 'M Shopithan', 'shopi3100@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 123456, NULL, NULL, NULL, NULL, NULL, '2024-05-19 08:37:46', '0000-00-00 00:00:00', 1),
(3, 'Gayesha', 'gayesha@mail.com', '202cb962ac59075b964b07152d234b70', 774124569, NULL, NULL, NULL, NULL, NULL, '2024-05-20 14:43:22', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
