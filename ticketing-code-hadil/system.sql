-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 11:27 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` bigint(20) NOT NULL,
  `department_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `status`) VALUES
(0, NULL, 0),
(1, 'Marckting', 1),
(2, 'Sales', 1),
(3, 'IT', 1),
(4, 'Accounting', 1),
(5, 'sales', 1);

-- --------------------------------------------------------

--
-- Table structure for table `direct_manager`
--

CREATE TABLE `direct_manager` (
  `manager_id` bigint(20) NOT NULL,
  `manager_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `direct_manager`
--

INSERT INTO `direct_manager` (`manager_id`, `manager_name`) VALUES
(0, ''),
(2, 'sajamma');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `day`, `hour`, `priority`, `status`) VALUES
(3, 'r1', '2', '1', 'important', 1),
(4, 'r2', '0', '1', 'normal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_user`
--

CREATE TABLE `request_user` (
  `user_id` bigint(20) DEFAULT NULL,
  `request_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_user`
--

INSERT INTO `request_user` (`user_id`, `request_id`) VALUES
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `setting_joptitle`
--

CREATE TABLE `setting_joptitle` (
  `jopTitle_id` bigint(20) NOT NULL,
  `jopTitle_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_joptitle`
--

INSERT INTO `setting_joptitle` (`jopTitle_id`, `jopTitle_name`) VALUES
(1, 'user'),
(2, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_joptitle` bigint(20) DEFAULT NULL,
  `department_id` bigint(20) DEFAULT 0,
  `Direct_manager` bigint(20) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `code` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_email`, `password`, `permission`, `setting_joptitle`, `department_id`, `Direct_manager`, `status`, `code`) VALUES
(1, 'ahmed', 'ahmed@gmail.com', '12345678', 'user', 1, 3, 2, 1, NULL),
(2, 'sajamma', 'sajamma1998@gmail.com', '0856ea7fb5c4a574cf49a11102d9b04e', 'user', 1, 0, 0, 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `direct_manager`
--
ALTER TABLE `direct_manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_user`
--
ALTER TABLE `request_user`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `setting_joptitle`
--
ALTER TABLE `setting_joptitle`
  ADD PRIMARY KEY (`jopTitle_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_joptitle` (`setting_joptitle`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `Direct_manager` (`Direct_manager`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request_user`
--
ALTER TABLE `request_user`
  ADD CONSTRAINT `request_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `request_user_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`setting_joptitle`) REFERENCES `setting_joptitle` (`jopTitle_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`Direct_manager`) REFERENCES `direct_manager` (`manager_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
