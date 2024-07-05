-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 03:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_entry`
--

CREATE TABLE `data_entry` (
  `id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `pass_no` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `aadhar_no` varchar(20) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `permitted_area` varchar(100) DEFAULT NULL,
  `pass_requested_by` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `pass_valid_upto` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `pass_issued_date_upto` date DEFAULT NULL,
  `renewed` varchar(20) DEFAULT NULL,
  `pass_received_by` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_entry`
--

INSERT INTO `data_entry` (`id`, `category`, `pass_no`, `name`, `aadhar_no`, `mobile_no`, `dob`, `gender`, `address`, `permitted_area`, `pass_requested_by`, `photo`, `pass_valid_upto`, `status`, `pass_issued_date_upto`, `renewed`, `pass_received_by`, `remarks`) VALUES
(1, 'Domestic Helper', 'gxupm6765h', 'SUPARNA PRUSTY', '277174183455', '09861538625', '2023-12-22', 'Male', 'F.M.NAGAR , BALASORE ,ODISHA', 'ED/SED', 'Sourav Mahapatra', 'uploads/box8_image.jpg', '2024-07-10', 'Active', '2024-07-12', 'no', '09861538725', 'nigga smuggler'),
(8, 'Domestic Helper', 'dajja22', 'nigga dhruv', '123456789066', '5793567896', '2024-07-03', 'Other', 'hjqvjs gqwadj', 'hhSDGHSD', 'NIGGA', 'uploads/pathan.jpg', '2024-07-09', 'Active', '2024-07-25', 'NO', 'nigga 2456834565', 'haag dia');

-- --------------------------------------------------------

--
-- Table structure for table `movement`
--

CREATE TABLE `movement` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `permitted_area` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `through_gate` varchar(50) NOT NULL,
  `in_time` datetime NOT NULL,
  `out_time` datetime DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `pass_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movement`
--

INSERT INTO `movement` (`id`, `name`, `mobile_no`, `permitted_area`, `category`, `through_gate`, `in_time`, `out_time`, `image_path`, `status`, `pass_no`) VALUES
(1, 'SUPARNA PRUSTY', '09861538625', 'ED/SED', 'Domestic Helper', 'NAC', '2024-07-03 21:16:00', '2024-07-04 09:17:00', NULL, 'Active', 'gxupm6765h'),
(4, 'santosh mahapatra', '9438171405', 'jagannath market', 'Vendor', '', '2024-07-02 22:14:00', '2024-07-03 08:14:00', NULL, '', ''),
(5, 'SUPARNA PRUSTY', '09861538625', 'ED/SED', 'Domestic Helper', 'JERSYFARM', '2024-07-03 18:22:00', '2024-07-03 20:22:00', NULL, '', ''),
(7, 'SUPARNA PRUSTY', '09861538625', 'ED/SED', 'Domestic Helper', 'semiliguda', '2024-07-03 22:07:00', '2024-07-03 23:07:00', NULL, '', ''),
(14, '', '', '', '', 'chakroli', '2024-07-04 12:02:00', '2024-07-04 18:09:00', NULL, 'Active', 'gxupm6765h');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` text NOT NULL,
  `upwd` text NOT NULL,
  `role` text NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `upwd`, `role`, `added_date`) VALUES
(1, 'admin', 'admin', 'admin', '2024-07-02 09:30:21'),
(4, 'siddhant', 'abcd', 'controller', '2024-07-02 05:55:53'),
(5, 'sourav', '123', 'supervisor', '2024-07-02 06:03:01'),
(6, 'dhruv', '890', 'controller', '2024-07-02 06:10:45'),
(7, 'santosh', '771507', 'supervisor', '2024-07-02 09:53:58'),
(8, 'Suparna', '1234567890', 'supervisor', '2024-07-03 09:32:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_entry`
--
ALTER TABLE `data_entry`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pass_no` (`pass_no`),
  ADD UNIQUE KEY `aadhar_no` (`aadhar_no`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `movement`
--
ALTER TABLE `movement`
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
-- AUTO_INCREMENT for table `data_entry`
--
ALTER TABLE `data_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `movement`
--
ALTER TABLE `movement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
