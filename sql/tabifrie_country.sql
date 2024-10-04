-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 10:02 AM
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
-- Database: `tabifrie`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabifrie_country`
--

CREATE TABLE `tabifrie_country` (
  `id` int(12) NOT NULL,
  `country` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabifrie_country`
--

INSERT INTO `tabifrie_country` (`id`, `country`) VALUES
(1, 'カナダ'),
(2, 'アメリカ'),
(3, '韓国'),
(4, '台湾'),
(5, 'タイ'),
(6, 'マレーシア'),
(7, 'ベトナム'),
(8, 'イギリス'),
(9, 'フランス'),
(10, 'イタリア'),
(11, 'スペイン'),
(12, 'ドイツ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabifrie_country`
--
ALTER TABLE `tabifrie_country`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabifrie_country`
--
ALTER TABLE `tabifrie_country`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
