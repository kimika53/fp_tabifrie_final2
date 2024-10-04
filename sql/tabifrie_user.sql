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
-- Table structure for table `tabifrie_user`
--

CREATE TABLE `tabifrie_user` (
  `id` int NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `age` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `hotel` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `flight` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `engaging` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `smoking` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `drinking` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `eating` varchar(128) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabifrie_user`
--

INSERT INTO `tabifrie_user` (`id`, `name`, `gender`, `age`, `email`, `password`, `hotel`, `flight`, `engaging`, `smoking`, `drinking`, `eating`) VALUES
(1, 'kimika', '女', '40代', 'kimika@email.com', 'kimika12', '2', '2', '1', '1', '3', '3'),
(2, 'emily', '女', '30代', 'emily@email.com', 'emily123', '2', '2', '1', '1', '1', '3'),
(3, 'amber', '女', '30代', 'amber@email.com', 'amber123', '1', '2', '1', '1', '3', '3'),
(8, 'alex', '男', '20代', 'alex@email.com', 'alex1234', '2', '1', '2', '2', '2', '2'),
(18, 'test', '女', '30代', 'test@email.com', 'test1234', '2', '2', '1', '1', '2', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabifrie_user`
--
ALTER TABLE `tabifrie_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabifrie_user`
--
ALTER TABLE `tabifrie_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
