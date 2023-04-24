-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2023 at 12:04 PM
-- Server version: 10.5.18-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Table structure for table `gol_url`
--

CREATE TABLE `gol_url` (
  `id` int(10) NOT NULL,
  `l_url` varchar(250) DEFAULT NULL,
  `s_url` varchar(250) DEFAULT NULL,
  `unique_id` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gol_url`
--

INSERT INTO `gol_url` (`id`, `l_url`, `s_url`, `unique_id`, `time_stamp`) VALUES
(4, 'https://stackoverflow.com/questions/23067336/trying-to-access-a-required-files-array-in-a-php-class-constructor', 'localhost/php/Shorten/wpgmCkPN1dWhM', '187b186b9fd', '2023-04-24 06:07:25.972788'),
(5, 'https://stackoverflow.com/questions/23067336/trying-to-access-a-required-files-array-in-a-php-class-constructor', 'localhost/php/Shorten/ewsVuAWROq4rj', '187b186b9fd', '2023-04-24 06:07:33.156338');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gol_url`
--
ALTER TABLE `gol_url`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gol_url`
--
ALTER TABLE `gol_url`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
