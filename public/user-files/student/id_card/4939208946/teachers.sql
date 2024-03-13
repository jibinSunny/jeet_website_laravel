-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 07:24 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeet`
--

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `blood` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `house` varchar(255) NOT NULL,
  `place` int(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(255) NOT NULL,
  `district` varchar(255) DEFAULT NULL,
  `taluk` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `id_card` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `id_file` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `visa_number` varchar(255) DEFAULT NULL,
  `visa_issued` varchar(255) DEFAULT NULL,
  `visa_expiry` varchar(255) DEFAULT NULL,
  `visa_file` varchar(510) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `passport_file` varchar(510) DEFAULT NULL,
  `education` varchar(510) NOT NULL,
  `department` int(11) NOT NULL,
  `classes` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `certificate` varchar(510) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_user` int(11) NOT NULL,
  `created_usertype` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
