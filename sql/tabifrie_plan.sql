-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql3101.db.sakura.ne.jp
-- Generation Time: Oct 04, 2024 at 06:58 PM
-- Server version: 8.0.39
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs-dev27-34_fp_tabifrie`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabifrie_plan`
--

CREATE TABLE `tabifrie_plan` (
  `id` int NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `start` text COLLATE utf8mb4_general_ci NOT NULL,
  `end` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `area` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(64) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabifrie_plan`
--

INSERT INTO `tabifrie_plan` (`id`, `name`, `email`, `start`, `end`, `area`, `country`) VALUES
(1, 'kimika', 'kimika@email.com', '20241101', '20241130', '2', '3'),
(2, 'emily', 'emily@email.com', '20241101', '20241130', '2', '3'),
(3, 'amber', 'amber@email.com', '20241101', '20241130', '2', '3'),
(14, 'alex', 'alex@email.com', '20241201', '20241210', '1', '2'),
(18, 'test', 'test@email.com', '20241101', '20241130', '2', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabifrie_plan`
--
ALTER TABLE `tabifrie_plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabifrie_plan`
--
ALTER TABLE `tabifrie_plan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
