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
-- Table structure for table `tabifrie_offer`
--

CREATE TABLE `tabifrie_offer` (
  `id` int NOT NULL,
  `sender` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `receiver` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `offer_date` datetime NOT NULL,
  `result` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabifrie_offer`
--

INSERT INTO `tabifrie_offer` (`id`, `sender`, `receiver`, `offer_date`, `result`) VALUES
(6, 'amber@email.com', 'test@email.com', '2024-10-02 19:47:07', 2),
(7, 'test@email.com', 'emily@email.com', '2024-10-02 20:15:29', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabifrie_offer`
--
ALTER TABLE `tabifrie_offer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabifrie_offer`
--
ALTER TABLE `tabifrie_offer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
