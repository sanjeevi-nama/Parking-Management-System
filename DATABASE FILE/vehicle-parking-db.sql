-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 06:48 AM
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
-- Database: `vehicle-parking-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Security_Code` int(55) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Security_Code`, `Email`, `Password`, `AdminRegdate`) VALUES
(2, 'admin pec', 'admin1', 9014619414, 1200, 'pragati@gmail.com', 'd00f5d5217896fb7fd601412cb890830', '2023-09-20 08:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(55) NOT NULL,
  `c_website` varchar(55) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `c_name`, `c_email`, `c_website`, `c_address`, `last_update`) VALUES
(1, 'Pragati Engineering College', 'pragati@gmail.com', 'pragati.ac.in', 'surampalem', '2021-06-08 20:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `vcategory`
--

CREATE TABLE `vcategory` (
  `ID` int(10) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `shortDescription` varchar(50) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vcategory`
--

INSERT INTO `vcategory` (`ID`, `VehicleCat`, `shortDescription`, `CreationDate`) VALUES
(13, 'Two Wheelers', 'These are two wheelers', '2023-10-24 06:29:12'),
(14, 'Three Wheelers', '6 wheels', '2023-10-24 06:38:12'),
(16, 'Four Wheelers', 'Four Wheeler Vehicles', '2024-09-17 17:09:16');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `ID` int(10) NOT NULL,
  `ParkingNumber` varchar(120) DEFAULT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `OwnerName` varchar(120) DEFAULT NULL,
  `OwnerContactNumber` bigint(10) DEFAULT NULL,
  `InTime` timestamp NULL DEFAULT current_timestamp(),
  `OutTime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ParkingCharge` varchar(120) NOT NULL,
  `Remark` mediumtext NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`ID`, `ParkingNumber`, `VehicleCategory`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `InTime`, `OutTime`, `ParkingCharge`, `Remark`, `Status`) VALUES
(23, '28678', 'Two Wheeler', 'ap01 em 2', 'warren buffet', 9999999999, '2023-09-20 08:48:01', '2023-09-20 08:48:28', '10', 'none', 'Out'),
(24, '15156', 'Four Wheeler', 'ap01 em 1', 'elon musk', 9999999999, '2023-09-21 06:17:44', '2023-09-21 06:29:30', '54', 'none', 'Out'),
(25, '81221', 'Four Wheeler', 'mh01 cs 0264', 'Rohit Sharma', 8000000000, '2023-09-21 06:18:51', NULL, '', '', ''),
(26, '69841', 'Four Wheeler', 'dl18 vk 0183', 'Virat Kohli', 9900000000, '2023-09-21 06:19:50', NULL, '', '', ''),
(27, '27332', 'Two Wheeler', 'jr07 ms 0007', 'MS Dhoni', 9990000000, '2023-09-21 06:20:48', NULL, '', '', ''),
(28, '27310', 'Four Wheeler', 'ap39 em 1234', 'Tarun', 9014619414, '2023-09-21 06:23:18', NULL, '', '', ''),
(29, '76858', 'Three Wheeler', 'tn01 ee 2023', 'Bhasha', 8000000001, '2023-09-21 06:24:03', '2023-09-21 06:30:31', '5', 'none', 'Out'),
(30, '30237', 'Two Wheeler', 'ap19sa1232', 'kesava', 9493168155, '2024-09-17 09:46:20', '2024-09-17 09:47:48', '55', 'nA', 'Out');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vcategory`
--
ALTER TABLE `vcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vcategory`
--
ALTER TABLE `vcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
