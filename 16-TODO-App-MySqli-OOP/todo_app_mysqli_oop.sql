-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 20, 2024 at 01:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo_app_mysqli_oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `is_completed`, `created_at`) VALUES
(23, 'Buy bread', 0, '2024-09-19 20:12:54'),
(29, 'rtewrtewrt', 0, '2024-09-19 20:36:15'),
(30, 'wertwert', 0, '2024-09-19 20:36:16'),
(31, 'sdfgdsfg', 0, '2024-09-19 20:36:17'),
(32, 'sdfgsdfg', 1, '2024-09-19 20:36:19'),
(33, 'sdgsd', 1, '2024-09-19 20:36:20'),
(34, 'dsfgdsf', 0, '2024-09-19 20:39:06'),
(35, 'dsfgdsf', 0, '2024-09-19 20:41:07'),
(36, 'gfhdf', 1, '2024-09-19 20:41:09'),
(39, 'asDad', 0, '2024-09-19 20:42:37'),
(40, 'dgfhdfh', 1, '2024-09-19 20:45:18'),
(41, 'fdgds', 0, '2024-09-19 20:46:04'),
(43, 'asd', 1, '2024-09-19 20:46:48'),
(44, 'sadfa', 0, '2024-09-19 20:49:51'),
(45, 'asdfs', 1, '2024-09-19 20:49:52'),
(46, 'dsafasf', 1, '2024-09-19 20:50:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
