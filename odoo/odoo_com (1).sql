-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 12:16 PM
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
-- Database: `odoo_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `employ`
--

CREATE TABLE `employ` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employ`
--

INSERT INTO `employ` (`id`, `Name`, `Email`, `Password`) VALUES
(1, 'parag2', 'a2@gmail.com', '$2y$10$dWlTillmvX1Dt4eg3RRKB.pb8Fh5ymOLsLdddDmMuoHR3N1KE.7gu'),
(2, 'TEST22', 'a@gmail.com', '$2y$10$.j81ZQgXQwegdpDTdotw.esI7zlfO3.7zTVkw74if0IqMlzaxuVa2'),
(3, 'Learner', 'patniashish28@gmail.com', '$2y$10$x73HLBnrUlJ8n/tDlTGfJeczCjU1UxsGPVOIsW6IW5.jSxTA74ZJ6');

-- --------------------------------------------------------

--
-- Table structure for table `grievance_information`
--

CREATE TABLE `grievance_information` (
  `e_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `employeeName` varchar(255) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `homeAddress` text NOT NULL,
  `workAddress` text NOT NULL,
  `eventDetails` varchar(255) NOT NULL,
  `witnesses` varchar(255) DEFAULT NULL,
  `accountOfEvent` text NOT NULL,
  `violations` text NOT NULL,
  `proposedSolution` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `h_id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`h_id`, `Name`, `Email`, `Password`) VALUES
(1, 'Rohit', 'test2@gmail.com', '123'),
(2, 'parag2', 'a2@gmail.com', '123'),
(3, 'jannat', 'SHAHNISHI4120@GMAIL.COM', '123'),
(4, 'Ashish', 'patniashish28@gmail.com', '$2y$10$fSBxOmvSQILmqkrsAu9JMOt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employ`
--
ALTER TABLE `employ`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grievance_information`
--
ALTER TABLE `grievance_information`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`h_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employ`
--
ALTER TABLE `employ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grievance_information`
--
ALTER TABLE `grievance_information`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
