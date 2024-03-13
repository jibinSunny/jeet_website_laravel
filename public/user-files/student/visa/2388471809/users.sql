-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 05:13 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
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
  `place` varchar(255) NOT NULL,
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
  `designation` int(11) NOT NULL,
  `certificate` varchar(510) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_usertype` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code`, `first_name`, `last_name`, `email`, `phone`, `phone2`, `dob`, `gender`, `blood`, `address`, `house`, `place`, `post`, `country`, `state`, `district`, `taluk`, `village`, `id_card`, `id_number`, `id_file`, `nationality`, `visa_number`, `visa_issued`, `visa_expiry`, `visa_file`, `passport_number`, `passport_file`, `education`, `designation`, `certificate`, `profile_image`, `username`, `usertype`, `active`, `created_user`, `created_usertype`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '6580866466', 'molly', 'm', 'superadmin@eximuz.com', '213-9495318841', '43-1212121212', '26-12-2020', 'male', 'A+', 'dsfd', '12', '11', '12', 14, 277, 'dfds', 'dsad', 'dsadsa', 'Adhaar', '1212121', 'panel_title.pdf', '1', 'asd', '22-12-2020', '22-12-2020', 'panel_title.pdf', '132132', 'panel_title.pdf', 'Graduated', 5, NULL, NULL, 'superadmin@eximuz.com', 'user', 1, 2, '1', '2020-12-11 05:46:57', '2020-12-11 05:46:57', NULL),
(2, '7459076550', 'fdsfds', 'm', 'superadmin@eximuz.com', '994-9495318841', '61-1212121212', '26-03-2021', 'male', 'A+', 'sdfcdsfsd', '12', '11', '12', 15, 297, 'dfds', 'dsad', 'dsadsa', 'Adhaar', '121321', 'Pronto Admin (93).pdf', '1', 'asd', '22-12-2020', '24-12-2020', 'panel_title.pdf', '132132', 'Pronto Admin - 2020-11-18T100858.207.pdf', 'Graduated', 5, 'panel_title.pdf', 'download.jpg', 'superadmin@eximuz.com', 'user', 1, 2, '1', '2020-12-12 08:02:54', '2020-12-12 08:02:54', NULL),
(3, '3004990390', 'dgfdgfdb', 'hffgh', 'admin@pronfghgfto.com', '973-9495318841', '43-1212121212', '31-12-2020', 'male', 'A+', 'fhgf', '12', '11', '12', 16, 324, 'dfds', 'dsad', 'dsadsa', 'Adhaar', '214324', 'panel_title.pdf', '2', 'asd', '30-12-2020', '31-12-2020', 'panel_title.pdf', '132132', 'panel_title.pdf', 'Graduated', 5, 'panel_title.pdf', '3.jpg', 'admin@pronfghgfto.com', 'user', 1, 2, '1', '2020-12-12 08:26:10', '2020-12-12 08:26:10', NULL),
(4, '9074643799', 'pk', 'hfghgf', 'addfgfdmin@ebfghfghgfhximuz.com', '994-11134567890', '61-1212123212', '19-12-2020', 'male', 'A+', 'fedfes', '11', '113', '1321', 14, 291, 'dfds', 'dsad', 'dsadsa', 'Adhaar', '12121', 'panel_title.pdf', '1', '232dds', '23-12-2020', '26-12-2020', 'panel_title.pdf', '1321323223', 'panel_title.pdf', 'Graduated', 5, 'panel_title.pdf', '9074643799/3.jpg', 'addfgfdmin@ebfghfghgfhximuz.com', 'user', 1, 2, '1', '2020-12-12 10:13:50', '2020-12-12 10:13:50', NULL),
(5, '9889222411', 'fhgrh', 'dfhdf', 'admin@mentodfhfgrtips.com', '994-949532218841', '994-1212121212', '29-12-2020', 'male', 'A+', 'dfgfd', '12', '11', '12', 15, 295, 'dfds', 'dsad', 'dsadsa', 'Adhaar', '1312', 'panel_title.pdf', '2', 'asd', '30-12-2020', '31-12-2020', 'panel_title.pdf', '1321323223', 'panel_title.pdf', 'Post Graduated', 5, 'panel_title.pdf', '9889222411/download.jpg', 'admin@mentodfhfgrtips.com', 'user', 1, 2, '1', '2020-12-12 10:58:43', '2020-12-12 10:58:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
