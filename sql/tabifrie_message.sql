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
-- Table structure for table `tabifrie_message`
--

CREATE TABLE `tabifrie_message` (
  `id` int NOT NULL,
  `name` varchar(12) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `to_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `to_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date_submit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabifrie_message`
--

INSERT INTO `tabifrie_message` (`id`, `name`, `email`, `to_name`, `to_email`, `content`, `date_submit`) VALUES
(13, 'amber', 'amber@email.com', 'test', 'test@email.com', 'こんにちは。', '2024-10-02 19:35:42'),
(14, 'test', 'test@email.com', 'amber', 'amber@email.com', 'こんにち。是非一緒に旅してください。', '2024-10-02 19:36:27'),
(16, 'test', 'test@email.com', 'emily', 'emily@email.com', 'こんにち。プロフィールを拝見しました。', '2024-10-02 20:15:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabifrie_message`
--
ALTER TABLE `tabifrie_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabifrie_message`
--
ALTER TABLE `tabifrie_message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
