-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 02:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakweb_item_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `sneaker`
--

CREATE TABLE `sneaker` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `available_size` varchar(100) NOT NULL,
  `image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sneaker`
--

INSERT INTO `sneaker` (`id`, `user_id`, `name`, `price`, `available_size`, `image`) VALUES
(3, 9, 'vans', 1200, '42', NULL),
(4, 10, 'Air jordahhhhn', 50055, '39', 0x363139623462646633633933302e6a7067),
(5, 10, 'Air Jordan 2', 500000, '39', 0x363139623465336437326366312e6a7067),
(8, 10, 'blabla', 23333, '40', 0x363139626632653431373837312e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `email`, `username`, `password`) VALUES
(9, 'coco@gmail.com', 'admin2', '$2y$10$R9Tnur7BnIHW3qocgcfXpekfqI7NvWLRZ9TC/F/1cl1i/25PmgNcy'),
(10, 'indonesiamerdeka@gmail.com', 'admin123', '$2y$10$cf1TC55x5STqANPcn/EAe.FWksL5QLPTPd802E.dHCh8e4Buj.oWO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sneaker`
--
ALTER TABLE `sneaker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sneaker`
--
ALTER TABLE `sneaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sneaker`
--
ALTER TABLE `sneaker`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `user_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
