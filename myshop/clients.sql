-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 05:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `address`, `created_at`) VALUES
(1, 'Bill Gates', 'bill.gates@microsoft.com', '+123456789', 'New York, USA', '2023-03-09 17:25:02'),
(2, 'Elon Musk', 'elon.musk@spacex.com', '+111222333', 'Florida, USA', '2023-03-09 17:25:02'),
(3, 'Will Smith', 'will.smith@gmail.com', '+111333555', 'California, USA', '2023-03-09 17:25:02'),
(4, 'Bob Marley', 'bob@gmail.com', '+111555999', 'Texas, USA', '2023-03-09 17:25:02'),
(5, 'Cristiano Ronaldo', 'cristiano.ronaldo@gmail.com', '+32447788993', 'Manchester, England', '2023-03-09 17:25:02'),
(6, 'Boris Johnson', 'boris.johnson@gmail.com', '+4499778855', 'London, England', '2023-03-09 17:25:02'),
(7, 'Blue ticker', 'dominicmburu034@gmail.com', '0797157648', '3432', '2023-03-09 18:28:40'),
(8, 'users', 'admin@gmail.com', '0797157648', '3432', '2023-03-12 18:36:35'),
(10, 'C025-01-0574/2020 Dominic mburu', 'mburu.dominic20@students.dkut.ac.ke', '0797157648', '3434', '2023-03-12 19:40:52'),
(11, 'C025-01-0574/2020 Dominic mburu', 'dominicmburu036@gmail.com', '0797157648', '3434', '2023-03-13 07:35:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
