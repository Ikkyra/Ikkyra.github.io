-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 12:02 PM
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
-- Database: `campsite`
--
CREATE DATABASE IF NOT EXISTS `campsite` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `campsite`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `no_id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `nama_campsite` varchar(50) NOT NULL,
  `number_of_night` varchar(10) NOT NULL,
  `number_of_people` varchar(10) NOT NULL,
  `payment` varchar(30) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`no_id`, `nama`, `nama_campsite`, `number_of_night`, `number_of_people`, `payment`, `img`) VALUES
(1, 'Rifki Abiyan', 'suimeiso', '2', '1', 'card', '2024-10-16_04.44.01.jpeg'),
(13, 'rifki abiyannn', 'fumuto', '2', '1', 'card', '2024-10-16 04.10.28.jpeg'),
(14, 'tame', 'suimeiso', '1', '1', 'cash', '2024-10-23 11.10.56.png'),
(15, 'impala', 'fumuto', '2', '2', 'card', '2024-10-23 11.10.41.png'),
(16, 'eren', 'paradis', '1', '2', 'cash', '2024-10-23 11.10.07.png'),
(17, 'yamashita', 'sparkle', '1', '1', 'cash', '2024-10-23 11.10.05.jpg'),
(18, 'tatsuro', 'kura', '1', '1', '1', '2024-10-23 11.10.11.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Password`, `Email`) VALUES
(1, 'halim', '123', 'halim@gmail.com'),
(2, 'genta', '123', 'genta@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`no_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `no_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
