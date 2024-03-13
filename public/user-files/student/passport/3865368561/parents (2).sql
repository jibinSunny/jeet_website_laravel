-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 06:49 AM
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
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(15) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext DEFAULT NULL,
  `phone2` varchar(55) DEFAULT NULL,
  `landline` varchar(55) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `district` varchar(55) DEFAULT NULL,
  `house_name` varchar(255) NOT NULL,
  `place` varchar(255) DEFAULT NULL,
  `zip` varchar(11) NOT NULL,
  `nationality` varchar(55) NOT NULL,
  `id_type` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `id_file` varchar(255) NOT NULL,
  `annual_income` varchar(255) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `usertype` varchar(15) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_usertype` varchar(60) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `code`, `first_name`, `last_name`, `email`, `phone`, `phone2`, `landline`, `address`, `country`, `state`, `district`, `house_name`, `place`, `zip`, `nationality`, `id_type`, `id_number`, `id_file`, `annual_income`, `photo`, `username`, `password`, `usertype`, `created_user`, `created_usertype`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '9697675437', 'Lithin', 'km', 'lithin.km@iroidtechnologies.com', '+91-12345', '+91-12345', '9090', NULL, 101, 19, 'kannur', 'Kollamvalappil', 'kym', '670581', 'Indian', 'Driving liecense', 'kl12002o2o', 'panel_title.pdf', '1000000', NULL, 'lithin.km@iroidtechnologies.com', '$2y$10$fmCE2WMX34yvNsCspIrt6ONSo5UUI9SxQL0ialniMnIjXGFEi9tAK', 'parent', 2, 'admin', 1, '2020-12-07 07:11:57', '2020-12-07 07:11:57', NULL),
(2, '6815834453', 'Madhu', 'pk', 'madhu@gmail,com', '+91-898989823', '-', NULL, NULL, 3, 119, 'kannur', 'kola', 'tdksc', '78787', '1212', 'Voter ID', '123', 'book_issues.sql', '1212', NULL, 'madhu@gmail,com', '$2y$10$tlE2l/LZK//35vOyQi3tleeAAFm7L8soUfsNy1sHf3ztU1/XuKzii', 'parent', 2, 'admin', 1, '2020-12-07 07:13:52', '2020-12-07 07:13:52', NULL),
(3, '3132464552', 'zX', 'ZX', 'ZXZX@gmail.com', '+971-123123', '-', NULL, NULL, 54, 885, 'qeqw', 'wqe', 'wqeqw', 'ewq', 'asdasd', 'Driving liecense', '21321', 'settings.sql', '213', NULL, 'ZXZX@gmail.com', NULL, 'parent', 2, 'admin', 1, '2020-12-07 07:29:28', '2020-12-07 07:29:28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
