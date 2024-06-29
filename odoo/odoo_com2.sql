-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 04:14 PM
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
-- Database: `odoo_com2`
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
(3, 'Learner', 'patniashish28@gmail.com', '$2y$10$x73HLBnrUlJ8n/tDlTGfJeczCjU1UxsGPVOIsW6IW5.jSxTA74ZJ6'),
(4, 'Raj Kapoor', 'Rajkapoor@gmail.com', '$2y$10$OujfUdogTR0iWNGlZOJDiedNhIw1sNA5gdmL6Rb7W/AFzyGKcgbkK'),
(5, 'Chirag Kapoor', 'chiragkapoor@gmail.com', '$2y$10$FSouR/3L5L.cWMH6i18LKeoV.605FBccKnXKVic0m5fkIFKcstqAy');

-- --------------------------------------------------------

--
-- Table structure for table `grievance_information`
--

CREATE TABLE `grievance_information` (
  `g_id` int(11) NOT NULL,
  `employeeName` varchar(255) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `homeAddress` text NOT NULL,
  `workAddress` text NOT NULL,
  `eventDetails` varchar(255) NOT NULL,
  `witnesses` varchar(255) DEFAULT NULL,
  `accountOfEvent` text NOT NULL,
  `violations` text NOT NULL,
  `proposedSolution` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `stutas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grievance_information`
--

INSERT INTO `grievance_information` (`g_id`, `employeeName`, `jobTitle`, `homeAddress`, `workAddress`, `eventDetails`, `witnesses`, `accountOfEvent`, `violations`, `proposedSolution`, `created_at`, `stutas`) VALUES
(5, 'parag2', 'employ', 'hh', 'hhh', 'ahmedabad', 'nun', 'Promotion', 'non', 'will review file agin', '2024-06-29 12:48:33', 'panding'),
(6, 'Raj Kapoor', 'employee', 'c-4, garden greens, opposite Zydus, Ahmedabad, 10', 'Office Building, Main Headquarters, corporate circle, Ahmedabad, 12', 'Office', 'none', 'Passed over for promotion', 'overlooked', 'review again', '2024-06-29 13:39:05', ''),
(7, 'Chirag Kapoor', 'Employee', 'q-10, Amrapali, Overhead tank, Manekbaug, 19', 'corporate office, main Headquarters, Circle office, Ahmedabad, 10', 'Office', '2', 'verbal abuse', 'Disrespect in workplace', 'reattend workplace etiquette', '2024-06-29 13:43:27', ''),
(8, 'Raj Kapoor', 'Employee', 'q-10, Home address, area, Ahmedabad, 18', 'office, area, ahmedabad, 10', 'Office', '1', 'was shunned by the manager', 'overlooked on account of not participating', 'has to attend HR seminar', '2024-06-29 13:45:17', '');

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
  ADD PRIMARY KEY (`g_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grievance_information`
--
ALTER TABLE `grievance_information`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
