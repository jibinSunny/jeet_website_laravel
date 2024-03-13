-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2020 at 08:44 AM
-- Server version: 5.6.47
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_analytica`
--

-- --------------------------------------------------------

--
-- Table structure for table `aadts`
--

CREATE TABLE `aadts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route` bigint(20) UNSIGNED NOT NULL,
  `route_direction` bigint(20) UNSIGNED NOT NULL,
  `start_mp` double(19,3) NOT NULL,
  `end_mp` double(19,3) NOT NULL,
  `aadt` int(11) NOT NULL,
  `growth_rate` float DEFAULT NULL,
  `geometry` geometry DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aadts`
--

INSERT INTO `aadts` (`id`, `route`, `route_direction`, `start_mp`, `end_mp`, `aadt`, `growth_rate`, `geometry`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 33, 8, 14.000, 20.000, 19789, 3, NULL, '2020-11-29 20:17:21', '2020-11-29 20:17:21', NULL),
(2, 35, 7, 21.850, 28.403, 21987, 3, NULL, '2020-11-29 20:17:21', '2020-11-29 20:17:21', NULL),
(3, 40, 8, 0.000, 6.730, 18765, 2, NULL, '2020-11-29 20:17:21', '2020-11-29 20:17:21', NULL),
(4, 41, 8, 6.910, 11.760, 16758, 3, NULL, '2020-11-29 20:17:22', '2020-11-29 20:17:22', NULL),
(5, 32, 8, 0.000, 7.564, 23765, 3, NULL, '2020-12-05 08:44:56', '2020-12-05 08:44:56', NULL),
(6, 33, 8, 7.564, 14.000, 23765, 3, NULL, '2020-12-05 08:44:56', '2020-12-05 08:44:56', NULL),
(7, 33, 8, 20.100, 21.200, 19789, 3, NULL, '2020-12-05 08:44:56', '2020-12-05 08:44:56', NULL),
(8, 34, 8, 21.200, 28.440, 18976, 4, NULL, '2020-12-05 08:44:56', '2020-12-05 08:44:56', NULL),
(9, 36, 6, 0.000, 2.532, 45678, 6, NULL, '2020-12-05 08:44:56', '2020-12-05 08:44:56', NULL),
(10, 37, 6, 2.532, 17.840, 45678, 6, NULL, '2020-12-05 08:44:56', '2020-12-05 08:44:56', NULL),
(11, 38, 7, 0.000, 2.520, 46789, 6, NULL, '2020-12-05 08:44:56', '2020-12-05 08:44:56', NULL),
(12, 39, 7, 2.520, 17.840, 46789, 6, NULL, '2020-12-05 08:44:56', '2020-12-05 08:44:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_date` datetime DEFAULT NULL,
  `image` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/profiles/default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `code`, `name`, `email`, `mobile`, `user_type`, `email_verified_at`, `password`, `token`, `reset_date`, `image`, `remember_token`, `status`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2234234234234', 'Lithin km', 'admin@gmail.com', '9747282318', 1, NULL, '$2y$10$6WUepwqzr1aysSv/aVnyjuEnrYTy96tnCkvkK0JJBqX9Rs0Oe6zya', NULL, NULL, '/profiles/default.png', NULL, 1, 1, '2020-01-10 07:57:54', '2020-10-22 15:03:42', NULL),
(2, '1578699587267', 'Sai', 'rockyheat2004@gmail.com', '123456789', 1, NULL, NULL, NULL, NULL, '/profiles/default.png', NULL, 1, 1, '2020-01-10 23:39:47', '2020-01-16 00:21:58', '2020-01-16 00:21:58'),
(3, '1579134053950', 'PB', 'udaymanepalli59@gmail.com', '5733089089', 1, NULL, NULL, '118615791340989650', NULL, '/profiles/default.png', NULL, 1, 1, '2020-01-16 00:20:53', '2020-10-14 23:22:10', '2020-10-14 23:22:10'),
(4, '1579373505294', 'rao', 'rockyheat2004@gmail.com', '533333333', 1, NULL, NULL, NULL, NULL, '/profiles/default.png', NULL, 1, 1, '2020-01-18 18:51:45', '2020-04-05 05:03:36', '2020-04-05 05:03:36'),
(5, '1597649649843', 'Test Admin', 'lithinkm@icloud.com', '9747282310', 1, NULL, '$2y$10$lndkqKYArIJ2.85GLRULjuQpWUz3OccJCoPMfDUWvn3QrmdsDcuBe', '970316026593034815', '2020-08-17 13:07:02', '/profiles/default.png', NULL, 1, 1, '2020-08-17 07:34:09', '2020-10-14 07:08:23', NULL),
(6, '1597650428762', 'Analyst', 'niharika@ashtech.ooo', '123456789', 3, NULL, '$2y$10$0m4uohYfiiiHA2YWQOZnyO17XSZhSEbNFJHMud4pTUK1Q35CEZl/e', NULL, '2020-08-17 13:23:19', '/profiles/default.png', NULL, 1, 1, '2020-08-17 07:47:08', '2020-10-14 18:24:36', '2020-10-14 18:24:36'),
(7, '1602699985704', 'Niharika', 'niharika@ashtech.ooo', '123456789', 1, NULL, '$2y$10$iKIwAVZqe8RZuypWB2RyreQReS3ptsaASsFQ89vFmmGdyeBeK.5kW', NULL, '2020-11-03 23:55:55', '/profiles/default.png', NULL, 1, 1, '2020-10-14 18:26:25', '2020-11-20 09:04:02', NULL),
(8, '1602700293246', 'Project Users', 'projects@ashtech.ooo', '1234567891', 5, NULL, '$2y$10$3.TV5mD4bWmIh4ykeSp8fuEDaH7R5Pvr3RnMaSEP92EcgixxmBaXu', NULL, '2020-10-15 17:25:15', '/profiles/default.png', NULL, 1, 1, '2020-10-14 18:31:33', '2020-10-15 11:55:15', NULL),
(9, '1602717788164', 'Uday Manepalli', 'udaymanepalli59@gmail.com', '5733089089', 3, NULL, '$2y$10$iCti8iK93IwGxWXKNj2OUepwwnfiQ3AEAtgXf0ea2Tc1C76ipd6WG', '624016044169437330', '2020-10-15 05:04:45', '/profiles/default.png', NULL, 1, 1, '2020-10-14 23:23:08', '2020-11-03 15:26:12', '2020-11-03 15:26:12'),
(10, '1602760026556', 'Lithin km', 'lithinkm123@gmail.com', '9747561111', 1, NULL, '$2y$10$a3XFf9UlaXpwpi/0uZEozenvj0BMzDCq.r./RIeGB/v4mVWGcTVse', NULL, '2020-11-17 14:33:58', '/profiles/default.png', NULL, 1, 1, '2020-10-15 11:07:06', '2020-11-17 09:03:58', NULL),
(11, '1602761166126', 'Screening User', 'niharika@yopmail.com', '0987654432', 4, NULL, '$2y$10$nzJLbtO4FEmh4Io/ge7lgezPfhWXfgGXBkyYFfT6eQ33yx3OMnz4i', NULL, '2020-10-15 17:16:27', '/profiles/default.png', NULL, 1, 1, '2020-10-15 11:26:06', '2020-11-06 08:40:33', '2020-11-06 08:40:33'),
(12, '1604417359586', 'Uday Manepalli', 'udaymanepalli59@gmail.com', '5733089089', 5, NULL, '$2y$10$OnoXcb6bn850LvhguQxBb.mPUCYitjs9jPdDNnfnc7uGn6DsKXmPW', '593116050222969667', '2020-11-04 04:22:11', '/profiles/default.png', NULL, 1, 1, '2020-11-03 15:29:19', '2020-11-15 14:03:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_privilages`
--

CREATE TABLE `admin_privilages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin` bigint(20) UNSIGNED NOT NULL,
  `privilage` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_privilages`
--

INSERT INTO `admin_privilages` (`id`, `admin`, `privilage`, `created_at`, `updated_at`) VALUES
(13, 1, 1, '2020-01-16 00:22:26', '2020-01-16 00:22:26'),
(21, 5, 3, '2020-08-17 07:34:09', '2020-08-17 07:34:09'),
(22, 5, 9, '2020-08-17 07:34:09', '2020-08-17 07:34:09'),
(23, 5, 7, '2020-08-17 07:34:09', '2020-08-17 07:34:09'),
(24, 5, 8, '2020-08-17 07:34:09', '2020-08-17 07:34:09'),
(25, 5, 2, '2020-08-17 07:34:09', '2020-08-17 07:34:09'),
(26, 5, 1, '2020-08-17 07:34:09', '2020-08-17 07:34:09'),
(27, 5, 4, '2020-08-17 07:34:09', '2020-08-17 07:34:09'),
(28, 5, 6, '2020-08-17 07:34:09', '2020-08-17 07:34:09'),
(29, 5, 5, '2020-08-17 07:34:09', '2020-08-17 07:34:09'),
(30, 5, 10, '2020-08-17 07:34:09', '2020-08-17 07:34:09'),
(61, 8, 1, '2020-10-15 11:51:28', '2020-10-15 11:51:28'),
(62, 8, 2, '2020-10-15 11:51:28', '2020-10-15 11:51:28'),
(63, 8, 5, '2020-10-15 11:51:28', '2020-10-15 11:51:28'),
(64, 8, 7, '2020-10-15 11:51:28', '2020-10-15 11:51:28'),
(65, 8, 8, '2020-10-15 11:51:28', '2020-10-15 11:51:28'),
(234, 12, 1, '2020-11-15 14:03:50', '2020-11-15 14:03:50'),
(235, 12, 2, '2020-11-15 14:03:50', '2020-11-15 14:03:50'),
(236, 12, 5, '2020-11-15 14:03:50', '2020-11-15 14:03:50'),
(237, 12, 6, '2020-11-15 14:03:50', '2020-11-15 14:03:50'),
(238, 12, 7, '2020-11-15 14:03:50', '2020-11-15 14:03:50'),
(239, 12, 8, '2020-11-15 14:03:50', '2020-11-15 14:03:50'),
(260, 7, 1, '2020-11-20 09:04:03', '2020-11-20 09:04:03'),
(261, 7, 2, '2020-11-20 09:04:03', '2020-11-20 09:04:03'),
(262, 7, 3, '2020-11-20 09:04:03', '2020-11-20 09:04:03'),
(263, 7, 4, '2020-11-20 09:04:03', '2020-11-20 09:04:03'),
(264, 7, 5, '2020-11-20 09:04:03', '2020-11-20 09:04:03'),
(265, 7, 6, '2020-11-20 09:04:03', '2020-11-20 09:04:03'),
(266, 7, 7, '2020-11-20 09:04:03', '2020-11-20 09:04:03'),
(267, 7, 8, '2020-11-20 09:04:03', '2020-11-20 09:04:03'),
(268, 7, 9, '2020-11-20 09:04:03', '2020-11-20 09:04:03'),
(269, 7, 10, '2020-11-20 09:04:03', '2020-11-20 09:04:03'),
(270, 10, 1, '2020-11-22 13:59:56', '2020-11-22 13:59:56'),
(271, 10, 2, '2020-11-22 13:59:56', '2020-11-22 13:59:56'),
(272, 10, 3, '2020-11-22 13:59:56', '2020-11-22 13:59:56'),
(273, 10, 4, '2020-11-22 13:59:56', '2020-11-22 13:59:56'),
(274, 10, 5, '2020-11-22 13:59:56', '2020-11-22 13:59:56'),
(275, 10, 6, '2020-11-22 13:59:56', '2020-11-22 13:59:56'),
(276, 10, 7, '2020-11-22 13:59:56', '2020-11-22 13:59:56'),
(277, 10, 8, '2020-11-22 13:59:56', '2020-11-22 13:59:56'),
(278, 10, 9, '2020-11-22 13:59:56', '2020-11-22 13:59:56'),
(279, 10, 10, '2020-11-22 13:59:56', '2020-11-22 13:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `age_groups`
--

CREATE TABLE `age_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `age_groups`
--

INSERT INTO `age_groups` (`id`, `name`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, '0-18', 0, 18, '2020-01-10 07:32:15', '2020-01-10 07:32:15'),
(2, '19-23', 19, 23, '2020-01-10 07:32:15', '2020-01-10 07:32:15'),
(3, '24-29', 24, 29, '2020-01-10 07:32:15', '2020-01-10 07:32:15'),
(4, '30-35', 30, 35, '2020-01-10 07:32:15', '2020-01-10 07:32:15'),
(5, '36-41', 36, 41, '2020-01-10 07:32:15', '2020-01-10 07:32:15'),
(6, '42-47', 42, 47, '2020-01-10 07:32:15', '2020-01-10 07:32:15'),
(7, '48-53', 48, 53, '2020-01-10 07:32:15', '2020-01-10 07:32:15'),
(8, '54-59', 54, 59, '2020-01-10 07:32:15', '2020-01-10 07:32:15'),
(9, '60-65', 60, 65, '2020-01-10 07:32:15', '2020-01-10 07:32:15'),
(10, '65+', 66, 100, '2020-01-10 07:32:15', '2020-01-10 07:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `collision_types`
--

CREATE TABLE `collision_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collision_types`
--

INSERT INTO `collision_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Head-on', '2020-02-12 09:53:43', '2020-02-12 09:53:43', NULL),
(2, 'RearEnd', '2020-02-12 09:53:43', '2020-02-12 09:53:43', NULL),
(3, 'SideswipeSameDirection', '2020-02-12 09:53:43', '2020-02-12 09:53:43', NULL),
(4, 'SideswipeOppositeDirection', '2020-02-12 09:53:43', '2020-02-12 09:53:43', NULL),
(5, 'Angle', '2020-02-12 09:53:43', '2020-02-12 09:53:43', NULL),
(6, 'Single Vehicle ', '2020-03-04 10:51:53', '2020-03-04 10:51:53', NULL),
(7, 'Multi Vehicle', '2020-03-04 10:51:53', '2020-03-04 10:51:53', NULL),
(8, 'Side Impact', '2020-03-04 10:51:53', '2020-03-04 10:51:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Red', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(2, 'White', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(3, 'Grey', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(4, 'Black', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(5, 'blue', '2020-03-05 11:52:09', '2020-03-05 11:52:09', NULL),
(6, 'Silver', NULL, NULL, NULL),
(7, 'Gray', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` bigint(20) UNSIGNED NOT NULL,
  `district` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `name`, `state`, `district`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'EBR', 1, 1, '2020-01-10 07:32:35', '2020-01-10 07:32:35', NULL),
(2, 'Putnam', 1, 2, '2020-01-10 07:32:35', '2020-01-10 07:32:35', NULL),
(3, 'Ouchita', 1, 2, '2020-01-10 07:32:35', '2020-01-10 07:32:35', NULL),
(5, 'Dallas', 1, 1, '2020-03-05 11:59:12', '2020-03-05 11:59:12', NULL),
(6, 'Kanawha', 1, 1, '2020-08-24 11:01:48', '2020-08-24 11:01:48', NULL),
(8, 'Jackson', 1, 14, '2020-10-26 18:36:59', '2020-10-26 18:36:59', NULL),
(9, 'Boone', 1, 1, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(10, 'Mason', 1, 1, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(11, 'Cabell', 1, 2, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(12, 'Lincoln', 1, 2, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(13, 'Mingo', 1, 2, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(14, 'Wayne', 1, 2, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(15, 'Calhoun', 1, 14, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(16, 'Pleasants', 1, 14, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(17, 'Ritchie', 1, 14, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(18, 'Roane', 1, 14, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(19, 'Wirt', 1, 14, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(20, 'Wood', 1, 14, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(21, 'Doddridge', 1, 6, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(22, 'Harrison', 1, 6, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(23, 'Marion', 1, 6, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(24, 'Monongalia', 1, 6, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(25, 'Preston', 1, 6, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(26, 'Taylor', 1, 6, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(27, 'Berkely', 1, 7, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(28, 'Grant', 1, 7, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(29, 'Hampshire', 1, 7, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(30, 'Hardy', 1, 7, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(31, 'Jefferson', 1, 7, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(32, 'Mineral', 1, 7, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(33, 'Morgan', 1, 7, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(40, 'Barbour', 1, 12, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(41, 'Gilmer', 1, 12, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(42, 'Lewis', 1, 12, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(43, 'Upshur', 1, 12, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(44, 'Webster', 1, 12, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(45, 'Pendleton', 1, 9, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(46, 'Pocahontas', 1, 9, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(47, 'Randolph', 1, 9, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(48, 'Tucker', 1, 9, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(49, 'Fayette', 1, 10, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(50, 'Greenbier', 1, 10, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(51, 'Monroe', 1, 10, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(52, 'Nicholas', 1, 10, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(53, 'Summers', 1, 10, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(54, 'McDowell', 1, 11, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(55, 'Mercer', 1, 11, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(56, 'Raleigh', 1, 11, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(57, 'Wyoming', 1, 11, '2020-10-26 18:38:56', '2020-10-26 18:38:56', NULL),
(58, 'Clay', 1, 1, '2020-11-01 13:03:51', '2020-11-01 13:03:51', NULL),
(59, 'Braxton', 1, 12, '2020-11-01 13:03:51', '2020-11-01 13:03:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `state`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'District 1', 1, '2020-03-05 12:12:36', '2020-03-05 12:12:36', NULL),
(2, 'District 2', 1, '2020-03-05 12:12:36', '2020-03-05 12:12:36', NULL),
(6, 'District 4', 1, '2020-10-26 18:30:10', '2020-10-26 18:30:10', NULL),
(7, 'District 5', 1, '2020-10-26 18:30:10', '2020-10-26 18:30:10', NULL),
(8, 'District 6', 1, '2020-10-26 18:30:10', '2020-10-26 18:30:10', NULL),
(9, 'District 8', 1, '2020-10-26 18:30:10', '2020-10-26 18:30:10', NULL),
(10, 'District 9', 1, '2020-10-26 18:30:10', '2020-10-26 18:30:10', NULL),
(11, 'District 10', 1, '2020-10-26 18:30:10', '2020-10-26 18:30:10', NULL),
(12, 'District 7', 1, '2020-10-26 18:30:10', '2020-10-26 18:30:10', NULL),
(14, 'District 3', 1, '2020-10-26 18:32:02', '2020-10-26 18:32:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_conditions`
--

CREATE TABLE `driver_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_conditions`
--

INSERT INTO `driver_conditions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Normal', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(2, 'Drug', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(3, 'Alcohol', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_distraction_types`
--

CREATE TABLE `driver_distraction_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_distraction_types`
--

INSERT INTO `driver_distraction_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cellphone', '2020-01-10 07:32:15', '2020-01-10 07:32:15', NULL),
(2, 'Passenger', '2020-01-10 07:32:15', '2020-01-10 07:32:15', NULL),
(3, 'Billboard', '2020-01-10 07:32:15', '2020-01-10 07:32:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `environmental_conditions`
--

CREATE TABLE `environmental_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `environmental_conditions`
--

INSERT INTO `environmental_conditions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Animal', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(2, 'Glare', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(3, 'Obstruction', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `highway_classes`
--

CREATE TABLE `highway_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `highway_classes`
--

INSERT INTO `highway_classes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Interstate', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(2, 'US', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(3, 'State', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(4, 'County', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `horz_curves`
--

CREATE TABLE `horz_curves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route` bigint(20) UNSIGNED NOT NULL,
  `route_direction` bigint(20) UNSIGNED NOT NULL,
  `start_mp` double(19,3) NOT NULL,
  `end_mp` double(19,3) NOT NULL,
  `curve_length` double(19,3) NOT NULL,
  `curve_direction` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geometry` geometry DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `horz_curves`
--

INSERT INTO `horz_curves` (`id`, `route`, `route_direction`, `start_mp`, `end_mp`, `curve_length`, `curve_direction`, `geometry`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 32, 8, 1.200, 2.400, 1.200, 'Left', NULL, '2020-11-29 20:17:56', '2020-11-29 20:17:56', NULL),
(2, 32, 8, 3.600, 4.200, 0.600, 'Left', NULL, '2020-11-29 20:17:56', '2020-11-29 20:17:56', NULL),
(3, 34, 8, 21.400, 22.200, 0.800, 'Right', NULL, '2020-11-29 20:17:56', '2020-11-29 20:17:56', NULL),
(4, 35, 7, 24.500, 25.000, 0.500, 'Left', NULL, '2020-11-29 20:17:56', '2020-11-29 20:17:56', NULL),
(5, 37, 6, 5.600, 5.800, 0.200, 'Left', NULL, '2020-11-29 20:17:56', '2020-11-29 20:17:56', NULL),
(6, 37, 6, 11.200, 11.470, 0.270, 'Left', NULL, '2020-11-29 20:17:56', '2020-11-29 20:17:56', NULL),
(7, 38, 7, 0.000, 0.900, 0.900, 'Right', NULL, '2020-11-29 20:17:56', '2020-11-29 20:17:56', NULL),
(8, 39, 7, 11.120, 11.450, 0.330, 'Right', NULL, '2020-11-29 20:17:56', '2020-11-29 20:17:56', NULL),
(9, 39, 7, 17.600, 17.840, 0.240, 'Right', NULL, '2020-11-29 20:17:56', '2020-11-29 20:17:56', NULL),
(10, 40, 8, 1.000, 1.650, 0.650, 'Left', NULL, '2020-11-29 20:17:56', '2020-11-29 20:17:56', NULL),
(11, 40, 8, 5.120, 5.920, 0.400, 'Right', NULL, '2020-11-29 20:17:56', '2020-11-29 20:17:56', NULL),
(12, 41, 8, 10.890, 11.310, 0.420, 'Left', NULL, '2020-11-29 20:17:56', '2020-11-29 20:17:56', NULL),
(14, 36, 6, 2.200, 2.500, 0.300, 'Right', NULL, '2020-12-05 08:56:21', '2020-12-05 08:56:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotspots`
--

CREATE TABLE `hotspots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `s_screening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_screening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_to_reports` int(11) DEFAULT '0',
  `highway_class` bigint(20) UNSIGNED DEFAULT NULL,
  `route` bigint(20) UNSIGNED DEFAULT NULL,
  `start_mp` double(19,3) NOT NULL,
  `end_mp` double(19,3) NOT NULL,
  `collision_type` bigint(20) UNSIGNED DEFAULT NULL,
  `light_condition` bigint(20) UNSIGNED DEFAULT NULL,
  `intersection_type` bigint(20) UNSIGNED DEFAULT NULL,
  `interchange_junction_type` bigint(20) UNSIGNED DEFAULT NULL,
  `route_direction` bigint(20) UNSIGNED DEFAULT NULL,
  `crash_count` int(11) DEFAULT NULL,
  `no_of_fatalities` int(11) DEFAULT NULL,
  `no_of_injuries` int(11) DEFAULT NULL,
  `no_of_typea` int(11) DEFAULT NULL,
  `no_of_typeb` int(11) DEFAULT NULL,
  `no_of_typec` int(11) DEFAULT NULL,
  `no_of_pdo` int(11) DEFAULT NULL,
  `crash_rate_aadt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_year` double NOT NULL DEFAULT '1',
  `epdo` double DEFAULT NULL,
  `euab` double DEFAULT NULL COMMENT 'Equivalent Benefits',
  `euac` double DEFAULT NULL COMMENT 'Equivalent Costs',
  `ben_costs` double DEFAULT NULL COMMENT 'Benefit/Cost',
  `geometry` text COLLATE utf8mb4_unicode_ci COMMENT 'Geometry of the Route',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotspots`
--

INSERT INTO `hotspots` (`id`, `user`, `s_screening`, `t_screening`, `status`, `added_to_reports`, `highway_class`, `route`, `start_mp`, `end_mp`, `collision_type`, `light_condition`, `intersection_type`, `interchange_junction_type`, `route_direction`, `crash_count`, `no_of_fatalities`, `no_of_injuries`, `no_of_typea`, `no_of_typeb`, `no_of_typec`, `no_of_pdo`, `crash_rate_aadt`, `no_of_year`, `epdo`, `euab`, `euac`, `ben_costs`, `geometry`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', NULL, 1, 1, 1, 46.390, 47.390, 2, 2, NULL, NULL, 5, 2, 1, 1, 0, 0, 1, 4, '0.011', 6.002739726, 552, NULL, NULL, NULL, NULL, '2020-11-11 17:16:21', '2020-11-17 23:58:57', NULL),
(2, 1, NULL, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', NULL, 1, 1, 1, 46.890, 47.890, 2, 2, NULL, NULL, 5, 2, 1, 1, 0, 0, 1, 4, '0.011', 6.002739726, 552, NULL, NULL, NULL, NULL, '2020-11-11 17:16:21', '2020-11-17 23:58:57', NULL),
(3, 1, NULL, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', NULL, 1, 1, 1, 47.390, 48.390, 3, 2, NULL, NULL, 5, 1, 0, 2, 1, 1, 0, 1, '0.006', 6.002739726, 41, NULL, NULL, NULL, NULL, '2020-11-11 17:16:21', '2020-11-17 23:58:57', NULL),
(4, 1, NULL, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', NULL, 1, 1, 1, 47.890, 48.890, 3, 2, NULL, NULL, 5, 1, 0, 2, 1, 1, 0, 1, '0.006', 6.002739726, 41, NULL, NULL, NULL, NULL, '2020-11-11 17:16:21', '2020-11-17 23:58:57', NULL),
(5, 1, NULL, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', NULL, 1, 1, 1, 48.890, 49.890, 3, 2, NULL, NULL, 5, 1, 1, 1, 0, 0, 1, 2, '0.006', 6.002739726, 550, NULL, NULL, NULL, NULL, '2020-11-11 17:16:21', '2020-11-17 23:58:57', NULL),
(6, 1, NULL, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', NULL, 1, 1, 1, 49.390, 50.390, 3, 2, NULL, NULL, 5, 1, 1, 1, 0, 0, 1, 2, '0.006', 6.002739726, 550, NULL, NULL, NULL, NULL, '2020-11-11 17:16:21', '2020-11-17 23:58:57', NULL),
(7, 1, NULL, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '2', 1, 1, 1, 56.390, 57.390, 3, 2, NULL, NULL, 5, 2, 0, 8, 0, 5, 3, 4, '0.011', 6.002739726, 77, 25414.79, 39034.36, 0.65109, NULL, '2020-11-11 17:16:21', '2020-11-17 23:58:57', NULL),
(8, 1, NULL, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '2', 1, 1, 1, 56.890, 57.890, 6, 2, NULL, NULL, 5, 9, 1, 25, 4, 12, 9, 18, '0.051', 6.002739726, 862, 1329026.92, 781426.29, 1.70077, NULL, '2020-11-11 17:16:21', '2020-11-17 23:58:57', NULL),
(9, 1, NULL, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '2', 1, 1, 1, 57.390, 58.390, 6, 2, NULL, NULL, 5, 31, 11, 51, 9, 17, 25, 55, '0.177', 6.002739726, 6615, 7306581.39, 878856, 8.31374, NULL, '2020-11-11 17:16:21', '2020-11-17 23:58:57', NULL),
(10, 1, NULL, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', NULL, 1, 1, 1, 57.890, 58.780, 3, 3, NULL, NULL, 5, 26, 11, 34, 5, 10, 19, 44, '0.167', 6.002739726, 6375, NULL, NULL, NULL, NULL, '2020-11-11 17:16:21', '2020-11-17 23:58:57', NULL),
(11, 1, NULL, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', NULL, 1, 1, 1, 58.390, 58.780, 6, 2, NULL, NULL, 5, 2, 1, 0, 0, 0, 0, 3, '0.029', 6.002739726, 545, NULL, NULL, NULL, NULL, '2020-11-11 17:16:21', '2020-11-17 23:58:57', NULL),
(12, 1, NULL, 'Traditional Screening-SW-R79-01/01/2020-11/13/2020 - Lithin km - 11/13/2020', '2', 0, 1, 14, 42.600, 43.200, 3, NULL, NULL, NULL, 6, 1, 2, 0, 0, 0, 0, 0, '0.064', 0.8684931507, 1084, 11653137.91, 171674.86, 67.87912, NULL, '2020-11-13 11:51:33', '2020-11-13 11:56:50', NULL),
(13, 1, NULL, 'Traditional Screening-SW-R79-01/01/2020-11/13/2020 - Lithin km - 11/13/2020', NULL, 0, 1, 14, 42.900, 43.500, 3, NULL, NULL, NULL, 6, 1, 2, 0, 0, 0, 0, 0, '0.064', 0.8684931507, 1084, NULL, NULL, NULL, NULL, '2020-11-13 11:51:33', NULL, NULL),
(14, 1, NULL, 'Traditional Screening-SR-SR_Route33-01/01/2020-12/31/2020 - Lithin km - 11/17/2020', NULL, 0, 2, 9, 21.090, 22.090, 3, 2, NULL, NULL, 5, 1, 0, 1, 1, 0, 0, 1, '0.220', 1, 30, NULL, NULL, NULL, NULL, '2020-11-17 16:14:33', NULL, NULL),
(15, 1, NULL, 'Traditional Screening-SR-64_Kan_11_18_2020-01/01/2016-12/31/2018 - Lithin km - 11/19/2020', NULL, 0, 1, 1, 46.390, 47.390, 2, 2, NULL, NULL, 5, 2, 1, 1, 0, 0, 1, 4, '0.023', 3, 552, NULL, NULL, NULL, NULL, '2020-11-18 20:31:51', NULL, NULL),
(16, 1, NULL, 'Traditional Screening-SR-64_Kan_11_18_2020-01/01/2016-12/31/2018 - Lithin km - 11/19/2020', NULL, 0, 1, 1, 47.390, 48.390, 3, 2, NULL, NULL, 5, 1, 0, 2, 1, 1, 0, 1, '0.011', 3, 41, NULL, NULL, NULL, NULL, '2020-11-18 20:31:51', NULL, NULL),
(17, 1, NULL, 'Traditional Screening-SR-64_Kan_11_18_2020-01/01/2016-12/31/2018 - Lithin km - 11/19/2020', '2', 0, 1, 1, 49.390, 50.390, 3, 2, NULL, NULL, 5, 1, 1, 1, 0, 0, 1, 2, '0.011', 3, 550, 1088255.42, 812890.36, 1.33875, NULL, '2020-11-18 20:31:51', '2020-11-18 20:44:41', NULL),
(18, 1, NULL, 'Traditional Screening-SR-64_Kan_11_18_2020-01/01/2016-12/31/2018 - Lithin km - 11/19/2020', NULL, 0, 1, 1, 56.390, 57.390, 3, 2, NULL, NULL, 5, 2, 0, 8, 0, 5, 3, 4, '0.023', 3, 77, NULL, NULL, NULL, NULL, '2020-11-18 20:31:51', NULL, NULL),
(19, 1, NULL, 'Traditional Screening-SR-64_Kan_11_18_2020-01/01/2016-12/31/2018 - Lithin km - 11/19/2020', NULL, 0, 1, 1, 57.390, 58.390, 6, 2, NULL, NULL, 5, 23, 8, 40, 7, 13, 20, 43, '0.263', 3, 4845, NULL, NULL, NULL, NULL, '2020-11-18 20:31:51', NULL, NULL),
(20, 1, NULL, 'Traditional Screening-SR-64_Kan_11_18_2020-01/01/2016-12/31/2018 - Lithin km - 11/19/2020', NULL, 0, 1, 1, 58.390, 58.780, 6, 2, NULL, NULL, 5, 1, 0, 0, 0, 0, 0, 2, '0.029', 3, 2, NULL, NULL, NULL, NULL, '2020-11-18 20:31:51', NULL, NULL),
(21, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 95.740, 96.040, 3, 2, NULL, NULL, 6, 2, 0, 5, 0, 2, 3, 3, '0.056', 5.002739726, 43, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(22, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 95.840, 96.140, 3, 2, NULL, NULL, 6, 2, 0, 5, 0, 2, 3, 3, '0.056', 5.002739726, 43, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(23, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 95.940, 96.240, 3, 2, NULL, NULL, 6, 2, 0, 5, 0, 2, 3, 3, '0.056', 5.002739726, 43, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(24, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 96.240, 96.540, 3, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, '0.028', 5.002739726, 7, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(25, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 96.340, 96.640, 3, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, '0.028', 5.002739726, 7, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(26, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 96.440, 96.740, 3, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, '0.028', 5.002739726, 7, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(27, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 96.740, 97.040, 2, 2, NULL, NULL, 6, 1, 0, 0, 0, 0, 0, 1, '0.028', 5.002739726, 1, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(28, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 96.840, 97.140, 2, 2, NULL, NULL, 6, 1, 0, 0, 0, 0, 0, 1, '0.028', 5.002739726, 1, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(29, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 96.940, 97.240, 2, 2, NULL, NULL, 6, 1, 0, 0, 0, 0, 0, 1, '0.028', 5.002739726, 1, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(30, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 97.740, 98.040, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, '0.028', 5.002739726, 30, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(31, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 97.840, 98.140, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, '0.028', 5.002739726, 30, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(32, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 97.940, 98.240, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, '0.028', 5.002739726, 30, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(33, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 98.040, 98.340, 3, 2, NULL, NULL, 6, 1, 0, 0, 0, 0, 0, 1, '0.028', 5.002739726, 1, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(34, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 98.140, 98.440, 3, 2, NULL, NULL, 6, 2, 1, 0, 0, 0, 0, 2, '0.056', 5.002739726, 544, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(35, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 98.240, 98.540, 3, 2, NULL, NULL, 6, 2, 1, 0, 0, 0, 0, 2, '0.056', 5.002739726, 544, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(36, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 98.340, 98.640, 3, 2, NULL, NULL, 6, 1, 1, 0, 0, 0, 0, 1, '0.028', 5.002739726, 543, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(37, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 98.740, 99.040, 3, 2, NULL, NULL, 6, 2, 2, 0, 0, 0, 0, 2, '0.056', 5.002739726, 1086, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(38, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 98.840, 99.140, 3, 2, NULL, NULL, 6, 2, 2, 0, 0, 0, 0, 2, '0.056', 5.002739726, 1086, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(39, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 98.940, 99.240, 3, 2, NULL, NULL, 6, 2, 2, 0, 0, 0, 0, 2, '0.056', 5.002739726, 1086, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(40, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 99.540, 99.840, 3, 2, NULL, NULL, 6, 1, 0, 3, 0, 2, 1, 2, '0.028', 5.002739726, 30, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(41, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 99.640, 99.940, 6, 2, NULL, NULL, 6, 2, 0, 4, 0, 2, 2, 3, '0.056', 5.002739726, 37, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(42, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 99.740, 100.040, 6, 2, NULL, NULL, 6, 6, 1, 11, 0, 7, 4, 9, '0.169', 5.002739726, 652, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(43, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 99.840, 100.140, 6, 2, NULL, NULL, 6, 5, 1, 8, 0, 5, 3, 7, '0.141', 5.002739726, 622, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(44, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 99.940, 100.240, 2, 2, NULL, NULL, 6, 4, 1, 7, 0, 5, 2, 6, '0.113', 5.002739726, 615, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(45, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 100.540, 100.840, 6, 2, NULL, NULL, 6, 4, 5, 4, 1, 2, 1, 5, '0.113', 5.002739726, 2772, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(46, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 100.640, 100.940, 6, 2, NULL, NULL, 6, 4, 5, 4, 1, 2, 1, 5, '0.113', 5.002739726, 2772, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(47, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 100.740, 101.040, 6, 2, NULL, NULL, 6, 6, 6, 6, 1, 4, 1, 7, '0.169', 5.002739726, 3338, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(48, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 100.840, 101.140, 2, 4, NULL, NULL, 6, 2, 1, 2, 0, 2, 0, 2, '0.056', 5.002739726, 566, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(49, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 100.940, 101.240, 2, 4, NULL, NULL, 6, 2, 1, 2, 0, 2, 0, 2, '0.056', 5.002739726, 566, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(50, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 101.740, 102.040, 6, 2, NULL, NULL, 6, 2, 0, 4, 0, 3, 1, 3, '0.056', 5.002739726, 42, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(51, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 101.840, 102.140, 6, 2, NULL, NULL, 6, 2, 0, 4, 0, 3, 1, 3, '0.056', 5.002739726, 42, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(52, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 2, 101.940, 102.240, 6, 2, NULL, NULL, 6, 2, 0, 4, 0, 3, 1, 3, '0.056', 5.002739726, 42, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(53, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 3, 107.202, 107.502, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, '0.021', 5.002739726, 30, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(54, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 3, 107.302, 107.602, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, '0.021', 5.002739726, 30, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(55, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 3, 107.402, 107.702, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, '0.021', 5.002739726, 30, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(56, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 3, 113.702, 114.002, 6, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, '0.021', 5.002739726, 7, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(57, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 3, 113.802, 114.102, 6, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, '0.021', 5.002739726, 7, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(58, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 3, 113.902, 114.202, 6, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, '0.021', 5.002739726, 7, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(59, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 3, 116.202, 116.502, 2, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, '0.021', 5.002739726, 7, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(60, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 3, 116.302, 116.602, 2, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, '0.021', 5.002739726, 7, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(61, 1, NULL, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', NULL, 0, 1, 3, 116.402, 116.702, 2, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, '0.021', 5.002739726, 7, NULL, NULL, NULL, NULL, '2020-11-18 20:33:24', NULL, NULL),
(62, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 1, 46.390, 47.390, 2, 2, NULL, NULL, 5, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 1, 47.390, 48.390, 3, 2, NULL, NULL, 5, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 1, 49.390, 50.390, 3, 2, NULL, NULL, 5, 1, 1, 1, 0, 0, 1, 2, '0.034', 0.997260274, 550, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 1, 56.390, 57.390, 3, 2, NULL, NULL, 5, 1, 0, 4, 0, 2, 2, 2, '0.034', 0.997260274, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, '2', 0, 1, 1, 57.390, 58.390, 6, 2, NULL, NULL, 5, 8, 2, 12, 3, 3, 6, 14, '0.275', 0.997260274, 1254, 8072526.68, 75757.89, 106.55691, NULL, NULL, '2020-11-18 20:46:30', NULL),
(67, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 1, 58.390, 58.780, 6, 2, NULL, NULL, 5, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 95.340, 96.340, 3, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 96.340, 97.340, 2, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 97.340, 98.340, 3, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 98.340, 99.340, 3, 2, NULL, NULL, 6, 1, 1, 0, 0, 0, 0, 1, '0.042', 0.997260274, 543, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 99.340, 100.340, 6, 2, NULL, NULL, 6, 3, 0, 6, 0, 5, 1, 4, '0.127', 0.997260274, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 100.340, 101.340, 6, 2, NULL, NULL, 6, 1, 3, 2, 1, 1, 0, 2, '0.042', 0.997260274, 1668, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 101.340, 102.340, 6, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 9.091, 10.091, 2, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 10.091, 11.091, 3, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 11.091, 12.091, 3, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 12.091, 13.091, 3, 2, NULL, NULL, 6, 7, 0, 6, 2, 0, 4, 7, '2.410', 0.997260274, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 13.091, 14.091, 3, 2, NULL, NULL, 6, 6, 0, 5, 0, 2, 3, 7, '2.065', 0.997260274, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 14.091, 15.091, 3, 2, NULL, NULL, 6, 4, 0, 4, 1, 1, 2, 8, '1.377', 0.997260274, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 15.091, 16.091, 3, 3, NULL, NULL, 6, 5, 0, 3, 0, 2, 1, 3, '1.721', 0.997260274, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 16.091, 17.091, 3, 3, NULL, NULL, 6, 18, 0, 12, 2, 3, 7, 19, '6.196', 0.997260274, 152, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 6, 17.820, 18.820, 6, 3, NULL, NULL, 6, 7, 0, 3, 0, 1, 2, 5, '2.281', 0.997260274, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 6, 18.820, 19.820, 3, 2, NULL, NULL, 6, 1, 0, 0, 0, 0, 0, 1, '0.326', 0.997260274, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 6, 19.820, 20.820, 2, 2, NULL, NULL, 6, 1, 0, 1, 0, 1, 0, 0, '0.326', 0.997260274, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 1, 'Systemic Screening - Urban – Roadway Departure - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 6, 21.820, 22.340, 3, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 1, 46.390, 47.390, 2, 2, NULL, NULL, 5, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 1, 47.390, 48.390, 3, 2, NULL, NULL, 5, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 1, 49.390, 50.390, 3, 2, NULL, NULL, 5, 1, 1, 1, 0, 0, 1, 2, '0.034', 0.997260274, 550, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 1, 56.390, 57.390, 3, 2, NULL, NULL, 5, 1, 0, 4, 0, 2, 2, 2, '0.034', 0.997260274, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 1, 57.390, 58.390, 6, 2, NULL, NULL, 5, 8, 2, 12, 3, 3, 6, 14, '0.275', 0.997260274, 1254, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 1, 58.390, 58.780, 6, 2, NULL, NULL, 5, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 95.340, 96.340, 3, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 96.340, 97.340, 2, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 97.340, 98.340, 3, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 98.340, 99.340, 3, 2, NULL, NULL, 6, 1, 1, 0, 0, 0, 0, 1, '0.042', 0.997260274, 543, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 99.340, 100.340, 6, 2, NULL, NULL, 6, 3, 0, 6, 0, 5, 1, 4, '0.127', 0.997260274, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 100.340, 101.340, 6, 2, NULL, NULL, 6, 1, 3, 2, 1, 1, 0, 2, '0.042', 0.997260274, 1668, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 1, 2, 101.340, 102.340, 6, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 9.091, 10.091, 2, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 10.091, 11.091, 3, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 11.091, 12.091, 3, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 12.091, 13.091, 3, 2, NULL, NULL, 6, 7, 0, 6, 2, 0, 4, 7, '2.410', 0.997260274, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 13.091, 14.091, 3, 2, NULL, NULL, 6, 6, 0, 5, 0, 2, 3, 7, '2.065', 0.997260274, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 14.091, 15.091, 3, 2, NULL, NULL, 6, 4, 0, 4, 1, 1, 2, 8, '1.377', 0.997260274, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 15.091, 16.091, 3, 3, NULL, NULL, 6, 5, 0, 3, 0, 2, 1, 3, '1.721', 0.997260274, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 1, 'Systemic Screening - Urban - Speed & Divided Highways - 01/01/2018 to 12/31/2018 - Lithin km - 11/19/2020', NULL, NULL, 0, 2, 5, 16.091, 17.091, 3, 3, NULL, NULL, 6, 18, 0, 12, 2, 3, 7, 19, '6.196', 0.997260274, 152, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 36, 1.000, 2.000, 2, 4, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 0, NULL, 4.9178082192, 29, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(109, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 36, 2.000, 2.532, 2, 2, NULL, NULL, 6, 2, 0, 0, 0, 0, 0, 3, NULL, 4.9178082192, 3, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(110, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 2.532, 3.532, 2, 2, NULL, NULL, 6, 5, 0, 9, 0, 3, 6, 2, NULL, 4.9178082192, 71, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(111, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', '2', 0, 2, 37, 3.532, 4.532, 2, 2, NULL, NULL, 6, 5, 0, 4, 2, 1, 1, 3, NULL, 4.9178082192, 78, 0, 817020.97, 0, NULL, '2020-11-29 21:41:07', '2020-11-29 22:06:36', NULL),
(112, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', '2', 0, 2, 37, 4.532, 5.532, 6, 2, NULL, NULL, 6, 5, 0, 3, 1, 0, 2, 5, NULL, 4.9178082192, 46, 0, 812890.36, 0, NULL, '2020-11-29 21:41:07', '2020-11-29 22:07:22', NULL),
(113, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 5.532, 6.532, 2, 2, NULL, NULL, 6, 4, 0, 6, 0, 3, 3, 7, NULL, 4.9178082192, 58, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(114, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 6.532, 7.532, 2, 2, NULL, NULL, 6, 2, 0, 1, 0, 0, 1, 1, NULL, 4.9178082192, 7, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(115, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 7.532, 8.532, 6, 2, NULL, NULL, 6, 7, 0, 9, 3, 2, 4, 5, NULL, 4.9178082192, 138, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(116, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 8.532, 9.532, 2, 2, NULL, NULL, 6, 4, 1, 5, 1, 3, 1, 3, NULL, 4.9178082192, 613, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(117, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 9.532, 10.532, 2, 2, NULL, NULL, 6, 7, 0, 4, 0, 1, 3, 7, NULL, 4.9178082192, 36, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(118, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 10.532, 11.532, 3, 2, NULL, NULL, 6, 6, 0, 7, 4, 1, 2, 4, NULL, 4.9178082192, 143, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(119, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 11.532, 12.532, 3, 2, NULL, NULL, 6, 6, 0, 3, 1, 0, 2, 4, NULL, 4.9178082192, 45, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(120, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 12.532, 13.532, 3, 2, NULL, NULL, 6, 29, 0, 33, 4, 11, 18, 25, NULL, 4.9178082192, 370, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(121, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 13.532, 14.532, 3, 2, NULL, NULL, 6, 22, 0, 10, 0, 6, 4, 26, NULL, 4.9178082192, 116, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(122, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 14.532, 15.532, 3, 2, NULL, NULL, 6, 15, 0, 18, 5, 5, 8, 15, NULL, 4.9178082192, 263, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(123, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 15.532, 16.532, 2, 2, NULL, NULL, 6, 39, 0, 30, 1, 13, 16, 45, NULL, 4.9178082192, 313, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(124, 1, NULL, 'Traditional Screening-SR-35test-01/01/2016-11/30/2020 - Lithin km - 11/30/2020', NULL, 0, 2, 37, 16.532, 17.532, 3, 2, NULL, NULL, 6, 18, 0, 17, 3, 6, 8, 12, NULL, 4.9178082192, 213, NULL, NULL, NULL, NULL, '2020-11-29 21:41:07', NULL, NULL),
(125, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 2.532, 3.532, 2, 2, NULL, NULL, 6, 1, 0, 2, 0, 0, 2, 0, NULL, 0.997260274, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 3.532, 4.532, 2, 2, NULL, NULL, 6, 3, 0, 3, 2, 1, 0, 2, NULL, 0.997260274, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 4.532, 5.532, 6, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 5.532, 6.532, 2, 2, NULL, NULL, 6, 3, 0, 6, 0, 3, 3, 4, NULL, 0.997260274, 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 6.532, 7.532, 2, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 7.532, 8.532, 6, 2, NULL, NULL, 6, 1, 0, 2, 1, 0, 1, 0, NULL, 0.997260274, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 8.532, 9.532, 2, 2, NULL, NULL, 6, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 9.532, 10.532, 2, 2, NULL, NULL, 6, 3, 0, 3, 0, 0, 3, 4, NULL, 0.997260274, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 10.532, 11.532, 3, 2, NULL, NULL, 6, 3, 0, 5, 2, 1, 2, 2, NULL, 0.997260274, 83, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 11.532, 12.532, 3, 2, NULL, NULL, 6, 2, 0, 2, 0, 0, 2, 0, NULL, 0.997260274, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 12.532, 13.532, 3, 2, NULL, NULL, 6, 5, 0, 6, 0, 2, 4, 4, NULL, 0.997260274, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 13.532, 14.532, 3, 2, NULL, NULL, 6, 6, 0, 1, 0, 0, 1, 6, NULL, 0.997260274, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 14.532, 15.532, 3, 2, NULL, NULL, 6, 3, 0, 8, 4, 2, 2, 5, NULL, 0.997260274, 155, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 15.532, 16.532, 2, 2, NULL, NULL, 6, 11, 0, 9, 0, 3, 6, 11, NULL, 0.997260274, 80, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 37, 16.532, 17.532, 3, 2, NULL, NULL, 6, 5, 0, 7, 0, 3, 4, 4, NULL, 0.997260274, 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 2.520, 3.520, 3, 2, NULL, NULL, 7, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 3.520, 4.520, 3, 2, NULL, NULL, 7, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 4.520, 5.520, 3, 2, NULL, NULL, 7, 2, 1, 2, 0, 0, 2, 4, NULL, 0.997260274, 558, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 5.520, 6.520, 6, 2, NULL, NULL, 7, 2, 1, 1, 0, 0, 1, 4, NULL, 0.997260274, 552, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 6.520, 7.520, 2, 2, NULL, NULL, 7, 2, 1, 6, 0, 4, 2, 5, NULL, 0.997260274, 603, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 7.520, 8.520, 2, 2, NULL, NULL, 7, 2, 0, 5, 2, 2, 1, 3, NULL, 0.997260274, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 8.520, 9.520, 6, 2, NULL, NULL, 7, 3, 1, 4, 0, 1, 3, 4, NULL, 0.997260274, 575, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 9.520, 10.520, 2, 3, NULL, NULL, 7, 2, 1, 3, 0, 1, 2, 3, NULL, 0.997260274, 568, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 10.520, 11.520, 3, 2, NULL, NULL, 7, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 11.520, 12.520, 3, 2, NULL, NULL, 7, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 12.520, 13.520, 3, 2, NULL, NULL, 7, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 13.520, 14.520, 6, 2, NULL, NULL, 7, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 14.520, 15.520, 6, 2, NULL, NULL, 7, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 15.520, 16.520, 2, 4, NULL, NULL, 7, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 16.520, 17.520, 3, 4, NULL, NULL, 7, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 11/30/2020', NULL, NULL, 0, 2, 39, 17.520, 17.840, 3, 2, NULL, NULL, 7, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 1, 'Systemic Screening - Rural – Roadway Departure - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 3, 35, 21.850, 22.850, 2, 2, NULL, NULL, 7, 1, 0, 0, 0, 0, 0, 2, '0.136', 0.9150684932, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 1, 'Systemic Screening - Rural – Roadway Departure - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 3, 35, 23.850, 24.850, 6, 2, NULL, NULL, 7, 1, 0, 1, 0, 0, 1, 0, '0.136', 0.9150684932, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 1, 'Systemic Screening - Rural – Roadway Departure - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 3, 35, 24.850, 25.850, 3, 2, NULL, NULL, 7, 1, 0, 1, 1, 0, 0, 1, '0.136', 0.9150684932, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 1, 'Systemic Screening - Rural – Roadway Departure - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 3, 35, 25.850, 26.850, 6, NULL, NULL, NULL, 7, 1, 0, 2, 0, 1, 1, 0, '0.136', 0.9150684932, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 1, 'Systemic Screening - Rural – Roadway Departure - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 3, 35, 27.850, 28.403, 6, NULL, NULL, NULL, 7, 1, 2, 0, 0, 0, 0, 1, '0.246', 0.9150684932, 1085, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 1, 'Systemic Screening - Rural – Roadway Departure - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 4, 40, 1.000, 2.000, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, '0.160', 0.9150684932, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 1, 'Systemic Screening - Rural – Roadway Departure - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 4, 40, 2.000, 3.000, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, '0.160', 0.9150684932, 572, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 1, 'Systemic Screening - Rural – Roadway Departure - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 4, 40, 4.000, 5.000, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, '0.160', 0.9150684932, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 1, 'Systemic Screening - Rural – Roadway Departure - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 4, 41, 6.910, 7.910, 2, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 2, '0.179', 0.9150684932, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 1, 'Systemic Screening - Rural – Roadway Departure - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 4, 41, 10.910, 11.760, 3, NULL, NULL, NULL, 8, 2, 2, 1, 0, 0, 0, 3, '0.420', 0.9150684932, 1087, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 1, 'Systemic Screening - Rural – Speed & Divided Highways - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 3, 35, 21.850, 22.850, 2, 2, NULL, NULL, 7, 1, 0, 0, 0, 0, 0, 2, '0.136', 0.9150684932, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 1, 'Systemic Screening - Rural – Speed & Divided Highways - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 3, 35, 23.850, 24.850, 6, 2, NULL, NULL, 7, 1, 0, 1, 0, 0, 1, 0, '0.136', 0.9150684932, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 1, 'Systemic Screening - Rural – Speed & Divided Highways - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 3, 35, 24.850, 25.850, 3, 2, NULL, NULL, 7, 1, 0, 1, 1, 0, 0, 1, '0.136', 0.9150684932, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 1, 'Systemic Screening - Rural – Speed & Divided Highways - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 3, 35, 25.850, 26.850, 6, NULL, NULL, NULL, 7, 1, 0, 2, 0, 1, 1, 0, '0.136', 0.9150684932, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 1, 'Systemic Screening - Rural – Speed & Divided Highways - 01/01/2020 to 11/30/2020 - Lithin km - 11/30/2020', NULL, NULL, 0, 3, 35, 27.850, 28.403, 6, NULL, NULL, NULL, 7, 1, 2, 0, 0, 0, 0, 1, '0.246', 0.9150684932, 1085, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 1, NULL, 'Traditional Screening-SR-Replace_Test1-01/01/2016-12/01/2020 - Lithin km - 12/01/2020', NULL, 0, NULL, 35, 21.850, 23.850, NULL, NULL, NULL, NULL, 7, 1, 0, 0, 0, 0, 0, 2, '0.013', 4.9205479452, 2, NULL, NULL, NULL, NULL, '2020-12-01 10:02:24', NULL, NULL),
(172, 1, NULL, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 0.900, 1.400, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, '0.058', 5.0109589041, 1, NULL, NULL, NULL, NULL, '2020-12-05 10:21:20', NULL, NULL),
(173, 1, NULL, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 2.100, 2.600, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, '0.058', 5.0109589041, 572, NULL, NULL, NULL, NULL, '2020-12-05 10:21:20', NULL, NULL),
(174, 1, NULL, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 3.900, 4.400, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, '0.058', 5.0109589041, 40, NULL, NULL, NULL, NULL, '2020-12-05 10:21:20', NULL, NULL),
(175, 1, NULL, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 4.200, 4.700, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, '0.058', 5.0109589041, 40, NULL, NULL, NULL, NULL, '2020-12-05 10:21:20', NULL, NULL),
(176, 1, NULL, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 6.910, 7.410, 2, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 2, '0.065', 5.0109589041, 8, NULL, NULL, NULL, NULL, '2020-12-05 10:21:20', NULL, NULL),
(177, 1, NULL, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 10.510, 11.010, 3, NULL, NULL, NULL, 8, 1, 2, 0, 0, 0, 0, 0, '0.065', 5.0109589041, 1084, NULL, NULL, NULL, NULL, '2020-12-05 10:21:20', NULL, NULL),
(178, 1, NULL, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 10.810, 11.310, 3, NULL, NULL, NULL, 8, 1, 2, 0, 0, 0, 0, 0, '0.065', 5.0109589041, 1084, NULL, NULL, NULL, NULL, '2020-12-05 10:21:20', NULL, NULL),
(179, 1, NULL, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 11.410, 11.760, 6, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 0, 3, '0.093', 5.0109589041, 3, NULL, NULL, NULL, NULL, '2020-12-05 10:21:20', NULL, NULL),
(180, 1, NULL, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 11.710, 11.760, 6, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 0, 3, '0.653', 5.0109589041, 3, NULL, NULL, NULL, NULL, '2020-12-05 10:21:20', NULL, NULL),
(181, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 32, 0.000, 1.000, 6, 2, NULL, NULL, 8, 2, 1, 0, 0, 0, 0, 2, '0.039', 5.9178082192, 544, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(182, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 32, 1.000, 2.000, 6, 2, NULL, NULL, 8, 3, 0, 5, 0, 2, 3, 4, '0.058', 5.9178082192, 44, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(183, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 32, 2.000, 3.000, 2, 3, NULL, NULL, 8, 3, 1, 7, 1, 4, 2, 4, '0.058', 5.9178082192, 631, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(184, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 32, 3.000, 4.000, 6, 3, NULL, NULL, 8, 2, 0, 1, 0, 0, 1, 2, '0.039', 5.9178082192, 8, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(185, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 32, 4.000, 5.000, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, '0.019', 5.9178082192, 543, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(186, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 32, 5.000, 6.000, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 2, '0.019', 5.9178082192, 544, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(187, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 33, 9.564, 10.564, 3, 2, NULL, NULL, 8, 1, 0, 4, 0, 2, 2, 2, '0.019', 5.9178082192, 36, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(188, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 33, 11.564, 12.564, 6, 2, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 1, '0.019', 5.9178082192, 7, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(189, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 33, 12.564, 13.564, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, '0.019', 5.9178082192, 543, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(190, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 33, 13.564, 14.564, 3, 2, NULL, NULL, 8, 1, 0, 3, 0, 2, 1, 2, NULL, 5.9178082192, 30, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL);
INSERT INTO `hotspots` (`id`, `user`, `s_screening`, `t_screening`, `status`, `added_to_reports`, `highway_class`, `route`, `start_mp`, `end_mp`, `collision_type`, `light_condition`, `intersection_type`, `interchange_junction_type`, `route_direction`, `crash_count`, `no_of_fatalities`, `no_of_injuries`, `no_of_typea`, `no_of_typeb`, `no_of_typec`, `no_of_pdo`, `crash_rate_aadt`, `no_of_year`, `epdo`, `euab`, `euac`, `ben_costs`, `geometry`, `created_at`, `updated_at`, `deleted_at`) VALUES
(191, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 33, 16.564, 17.564, 2, 4, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, '0.023', 5.9178082192, 1, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(192, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 33, 18.564, 19.564, 6, 2, NULL, NULL, 8, 3, 3, 6, 2, 4, 0, 4, '0.070', 5.9178082192, 1732, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(193, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 34, 21.200, 22.200, 2, 4, NULL, NULL, 8, 2, 1, 1, 0, 1, 0, 2, '0.049', 5.9178082192, 555, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(194, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 34, 27.200, 28.200, 2, 3, NULL, NULL, 8, 3, 0, 3, 0, 1, 2, 3, '0.073', 5.9178082192, 26, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(195, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 3, 34, 28.200, 28.440, 6, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, '0.102', 5.9178082192, 543, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(196, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 1.000, 2.000, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, '0.025', 5.9178082192, 1, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(197, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 2.000, 3.000, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, '0.025', 5.9178082192, 572, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(198, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 4.000, 5.000, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, '0.025', 5.9178082192, 40, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(199, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 6.910, 7.910, 2, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 2, '0.028', 5.9178082192, 8, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(200, 1, NULL, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 10.910, 11.760, 3, NULL, NULL, NULL, 8, 2, 2, 1, 0, 0, 0, 3, '0.065', 5.9178082192, 1087, NULL, NULL, NULL, NULL, '2020-12-05 16:09:32', NULL, NULL),
(201, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 36, 0.000, 1.000, 2, 4, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 0, '0.010', 5.9178082192, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 36, 1.000, 2.000, 2, 4, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 0, '0.010', 5.9178082192, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 36, 2.000, 2.532, 2, 2, NULL, NULL, 6, 2, 0, 0, 0, 0, 0, 3, '0.038', 5.9178082192, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 2.532, 3.532, 2, 2, NULL, NULL, 6, 5, 0, 9, 0, 3, 6, 2, '0.051', 5.9178082192, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 3.532, 4.532, 2, 2, NULL, NULL, 6, 5, 0, 4, 2, 1, 1, 3, '0.051', 5.9178082192, 78, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 4.532, 5.532, 6, 2, NULL, NULL, 6, 5, 0, 3, 1, 0, 2, 5, '0.051', 5.9178082192, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 5.532, 6.532, 2, 2, NULL, NULL, 6, 4, 0, 6, 0, 3, 3, 7, '0.041', 5.9178082192, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 6.532, 7.532, 2, 2, NULL, NULL, 6, 2, 0, 1, 0, 0, 1, 1, '0.020', 5.9178082192, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 7.532, 8.532, 6, 2, NULL, NULL, 6, 7, 0, 9, 3, 2, 4, 5, '0.071', 5.9178082192, 138, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 8.532, 9.532, 2, 2, NULL, NULL, 6, 4, 1, 5, 1, 3, 1, 3, '0.041', 5.9178082192, 613, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 9.532, 10.532, 2, 2, NULL, NULL, 6, 7, 0, 4, 0, 1, 3, 7, '0.071', 5.9178082192, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 10.532, 11.532, 3, 2, NULL, NULL, 6, 6, 0, 7, 4, 1, 2, 4, '0.061', 5.9178082192, 143, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 11.532, 12.532, 3, 2, NULL, NULL, 6, 6, 0, 3, 1, 0, 2, 4, '0.061', 5.9178082192, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 12.532, 13.532, 3, 2, NULL, NULL, 6, 29, 0, 33, 4, 11, 18, 25, '0.294', 5.9178082192, 370, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 13.532, 14.532, 3, 2, NULL, NULL, 6, 22, 0, 10, 0, 6, 4, 26, '0.223', 5.9178082192, 116, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 14.532, 15.532, 3, 2, NULL, NULL, 6, 15, 0, 18, 5, 5, 8, 15, '0.152', 5.9178082192, 263, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 15.532, 16.532, 2, 2, NULL, NULL, 6, 39, 0, 30, 1, 13, 16, 45, '0.395', 5.9178082192, 313, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 37, 16.532, 17.532, 3, 2, NULL, NULL, 6, 18, 0, 17, 3, 6, 8, 12, '0.182', 5.9178082192, 213, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 38, 0.000, 1.000, 2, 2, NULL, NULL, 7, 2, 1, 2, 1, 1, 0, 4, '0.020', 5.9178082192, 586, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 38, 1.000, 2.000, 6, 2, NULL, NULL, 7, 3, 3, 7, 2, 3, 2, 7, '0.030', 5.9178082192, 1736, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 38, 2.000, 2.520, 2, 2, NULL, NULL, 7, 3, 4, 7, 2, 3, 2, 6, '0.057', 5.9178082192, 2277, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 2.520, 3.520, 3, 2, NULL, NULL, 7, 2, 0, 2, 1, 1, 0, 3, '0.020', 5.9178082192, 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 3.520, 4.520, 3, 2, NULL, NULL, 7, 2, 0, 2, 0, 0, 2, 4, '0.020', 5.9178082192, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 4.520, 5.520, 3, 2, NULL, NULL, 7, 2, 1, 2, 0, 0, 2, 4, '0.020', 5.9178082192, 558, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 5.520, 6.520, 6, 2, NULL, NULL, 7, 2, 1, 1, 0, 0, 1, 4, '0.020', 5.9178082192, 552, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 6.520, 7.520, 2, 2, NULL, NULL, 7, 2, 1, 6, 0, 4, 2, 5, '0.020', 5.9178082192, 603, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 7.520, 8.520, 2, 2, NULL, NULL, 7, 3, 0, 5, 2, 2, 1, 4, '0.030', 5.9178082192, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 8.520, 9.520, 6, 2, NULL, NULL, 7, 3, 1, 4, 0, 1, 3, 4, '0.030', 5.9178082192, 575, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 9.520, 10.520, 2, 3, NULL, NULL, 7, 2, 1, 3, 0, 1, 2, 3, '0.020', 5.9178082192, 568, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 10.520, 11.520, 3, 2, NULL, NULL, 7, 3, 1, 2, 0, 0, 2, 5, '0.030', 5.9178082192, 559, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 11.520, 12.520, 3, 2, NULL, NULL, 7, 2, 1, 4, 0, 2, 2, 4, '0.020', 5.9178082192, 580, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 12.520, 13.520, 3, 2, NULL, NULL, 7, 2, 0, 9, 3, 3, 3, 4, '0.020', 5.9178082192, 142, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(233, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 13.520, 14.520, 6, 2, NULL, NULL, 7, 2, 0, 1, 0, 0, 1, 3, '0.020', 5.9178082192, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 14.520, 15.520, 6, 2, NULL, NULL, 7, 2, 1, 2, 0, 0, 2, 3, '0.020', 5.9178082192, 557, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 15.520, 16.520, 2, 4, NULL, NULL, 7, 2, 1, 0, 0, 0, 0, 4, '0.020', 5.9178082192, 546, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 16.520, 17.520, 3, 4, NULL, NULL, 7, 1, 0, 5, 0, 2, 3, 2, '0.010', 5.9178082192, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(237, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2015 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 2, 39, 17.520, 17.840, 3, 2, NULL, NULL, 7, 3, 1, 4, 1, 2, 1, 4, '0.093', 5.9178082192, 603, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(238, 1, 'Systemic Screening - Rural – Collision Type - 01/01/2020 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 3, 35, 21.850, 22.850, 2, 2, NULL, NULL, 7, 1, 0, 0, 0, 0, 0, 2, '0.136', 0.9150684932, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(239, 1, 'Systemic Screening - Rural – Collision Type - 01/01/2020 to 11/30/2020 - Lithin km - 12/05/2020', NULL, '2', 0, 3, 35, 23.850, 24.850, 6, 2, NULL, NULL, 7, 1, 0, 1, 0, 0, 1, 0, '0.136', 0.9150684932, 6, 70448.32, 1629911.33, 0.04322, NULL, NULL, '2020-12-05 16:25:28', NULL),
(240, 1, 'Systemic Screening - Rural – Collision Type - 01/01/2020 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 3, 35, 24.850, 25.850, 3, 2, NULL, NULL, 7, 1, 0, 1, 1, 0, 0, 1, '0.136', 0.9150684932, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(241, 1, 'Systemic Screening - Rural – Collision Type - 01/01/2020 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 3, 35, 25.850, 26.850, 6, NULL, NULL, NULL, 7, 1, 0, 2, 0, 1, 1, 0, '0.136', 0.9150684932, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(242, 1, 'Systemic Screening - Rural – Collision Type - 01/01/2020 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 3, 35, 27.850, 28.403, 6, NULL, NULL, NULL, 7, 1, 2, 0, 0, 0, 0, 1, '0.246', 0.9150684932, 1085, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(243, 1, 'Systemic Screening - Rural – Collision Type - 01/01/2020 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 4, 40, 1.000, 2.000, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, '0.160', 0.9150684932, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(244, 1, 'Systemic Screening - Rural – Collision Type - 01/01/2020 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 4, 40, 2.000, 3.000, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, '0.160', 0.9150684932, 572, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(245, 1, 'Systemic Screening - Rural – Collision Type - 01/01/2020 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 4, 40, 4.000, 5.000, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, '0.160', 0.9150684932, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(246, 1, 'Systemic Screening - Rural – Collision Type - 01/01/2020 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 4, 41, 6.910, 7.910, 2, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 2, '0.179', 0.9150684932, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(247, 1, 'Systemic Screening - Rural – Collision Type - 01/01/2020 to 11/30/2020 - Lithin km - 12/05/2020', NULL, NULL, 0, 4, 41, 10.910, 11.760, 3, NULL, NULL, NULL, 8, 2, 2, 1, 0, 0, 0, 3, '0.420', 0.9150684932, 1087, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(248, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 0.600, 1.300, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, '0.042', 5.0054794521, 1, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(249, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 0.800, 1.500, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, '0.042', 5.0054794521, 1, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(250, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 1.000, 1.700, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, '0.042', 5.0054794521, 1, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(251, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 1.800, 2.500, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, '0.042', 5.0054794521, 572, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(252, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 2.000, 2.700, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, '0.042', 5.0054794521, 572, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(253, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 2.200, 2.900, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, '0.042', 5.0054794521, 572, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(254, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 3.600, 4.300, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, '0.042', 5.0054794521, 40, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(255, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 3.800, 4.500, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, '0.042', 5.0054794521, 40, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(256, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 4.000, 4.700, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, '0.042', 5.0054794521, 40, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(257, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 40, 4.200, 4.900, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, '0.042', 5.0054794521, 40, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(258, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 6.910, 7.610, 2, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 2, '0.047', 5.0054794521, 8, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(259, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 10.310, 11.010, 3, NULL, NULL, NULL, 8, 1, 2, 0, 0, 0, 0, 0, '0.047', 5.0054794521, 1084, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(260, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 10.510, 11.210, 3, NULL, NULL, NULL, 8, 1, 2, 0, 0, 0, 0, 0, '0.047', 5.0054794521, 1084, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(261, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 10.710, 11.410, 3, NULL, NULL, NULL, 8, 1, 2, 0, 0, 0, 0, 0, '0.047', 5.0054794521, 1084, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(262, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 10.910, 11.610, 3, NULL, NULL, NULL, 8, 1, 2, 0, 0, 0, 0, 0, '0.047', 5.0054794521, 1084, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(263, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 11.110, 11.760, 6, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 0, 3, '0.050', 5.0054794521, 3, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(264, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 11.310, 11.760, 6, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 0, 3, '0.073', 5.0054794521, 3, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(265, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 11.510, 11.760, 6, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 0, 3, '0.131', 5.0054794521, 3, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(266, 1, NULL, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', NULL, 0, 4, 41, 11.710, 11.760, 6, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 0, 3, '0.653', 5.0054794521, 3, NULL, NULL, NULL, NULL, '2020-12-05 16:34:49', NULL, NULL),
(267, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 36, 1.000, 2.000, 2, 4, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 0, '0.010', 5.9178082192, 29, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(268, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 36, 2.000, 2.532, 2, 2, NULL, NULL, 6, 2, 0, 0, 0, 0, 0, 3, '0.038', 5.9178082192, 3, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(269, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 2.532, 3.532, 2, 2, NULL, NULL, 6, 5, 0, 9, 0, 3, 6, 2, '0.051', 5.9178082192, 71, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(270, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 3.532, 4.532, 2, 2, NULL, NULL, 6, 5, 0, 4, 2, 1, 1, 3, '0.051', 5.9178082192, 78, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(271, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 4.532, 5.532, 6, 2, NULL, NULL, 6, 5, 0, 3, 1, 0, 2, 5, '0.051', 5.9178082192, 46, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(272, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 5.532, 6.532, 2, 2, NULL, NULL, 6, 4, 0, 6, 0, 3, 3, 7, '0.041', 5.9178082192, 58, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(273, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 6.532, 7.532, 2, 2, NULL, NULL, 6, 2, 0, 1, 0, 0, 1, 1, '0.020', 5.9178082192, 7, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(274, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 7.532, 8.532, 6, 2, NULL, NULL, 6, 7, 0, 9, 3, 2, 4, 5, '0.071', 5.9178082192, 138, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(275, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 8.532, 9.532, 2, 2, NULL, NULL, 6, 4, 1, 5, 1, 3, 1, 3, '0.041', 5.9178082192, 613, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(276, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 9.532, 10.532, 2, 2, NULL, NULL, 6, 7, 0, 4, 0, 1, 3, 7, '0.071', 5.9178082192, 36, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(277, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 10.532, 11.532, 3, 2, NULL, NULL, 6, 6, 0, 7, 4, 1, 2, 4, '0.061', 5.9178082192, 143, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(278, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 11.532, 12.532, 3, 2, NULL, NULL, 6, 6, 0, 3, 1, 0, 2, 4, '0.061', 5.9178082192, 45, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(279, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 12.532, 13.532, 3, 2, NULL, NULL, 6, 29, 0, 33, 4, 11, 18, 25, '0.294', 5.9178082192, 370, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(280, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 13.532, 14.532, 3, 2, NULL, NULL, 6, 22, 0, 10, 0, 6, 4, 26, '0.223', 5.9178082192, 116, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(281, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 14.532, 15.532, 3, 2, NULL, NULL, 6, 15, 0, 18, 5, 5, 8, 15, '0.152', 5.9178082192, 263, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(282, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 15.532, 16.532, 2, 2, NULL, NULL, 6, 39, 0, 30, 1, 13, 16, 45, '0.395', 5.9178082192, 313, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(283, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 37, 16.532, 17.532, 3, 2, NULL, NULL, 6, 18, 0, 17, 3, 6, 8, 12, '0.182', 5.9178082192, 213, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(284, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 38, 0.000, 1.000, 2, 2, NULL, NULL, 7, 1, 0, 0, 0, 0, 0, 2, '0.010', 5.9178082192, 2, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(285, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 38, 1.000, 2.000, 6, 2, NULL, NULL, 7, 2, 1, 5, 1, 3, 1, 4, '0.020', 5.9178082192, 614, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(286, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 38, 2.000, 2.520, 2, 2, NULL, NULL, 7, 3, 4, 7, 2, 3, 2, 6, '0.057', 5.9178082192, 2277, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(287, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 2.520, 3.520, 3, 2, NULL, NULL, 7, 1, 0, 2, 1, 1, 0, 1, '0.010', 5.9178082192, 41, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(288, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 3.520, 4.520, 3, 2, NULL, NULL, 7, 2, 0, 2, 0, 0, 2, 4, '0.020', 5.9178082192, 16, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(289, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 4.520, 5.520, 3, 2, NULL, NULL, 7, 2, 1, 2, 0, 0, 2, 4, '0.020', 5.9178082192, 558, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(290, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 5.520, 6.520, 6, 2, NULL, NULL, 7, 2, 1, 1, 0, 0, 1, 4, '0.020', 5.9178082192, 552, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(291, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 6.520, 7.520, 2, 2, NULL, NULL, 7, 2, 1, 6, 0, 4, 2, 5, '0.020', 5.9178082192, 603, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(292, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 7.520, 8.520, 2, 2, NULL, NULL, 7, 3, 0, 5, 2, 2, 1, 4, '0.030', 5.9178082192, 90, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(293, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 8.520, 9.520, 6, 2, NULL, NULL, 7, 2, 0, 3, 0, 0, 3, 3, '0.020', 5.9178082192, 21, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(294, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 9.520, 10.520, 2, 3, NULL, NULL, 7, 2, 1, 3, 0, 1, 2, 3, '0.020', 5.9178082192, 568, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(295, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 10.520, 11.520, 3, 2, NULL, NULL, 7, 3, 1, 2, 0, 0, 2, 5, '0.030', 5.9178082192, 559, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(296, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 11.520, 12.520, 3, 2, NULL, NULL, 7, 2, 1, 4, 0, 2, 2, 4, '0.020', 5.9178082192, 580, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(297, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 12.520, 13.520, 3, 2, NULL, NULL, 7, 2, 0, 9, 3, 3, 3, 4, '0.020', 5.9178082192, 142, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(298, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 13.520, 14.520, 6, 2, NULL, NULL, 7, 2, 0, 1, 0, 0, 1, 3, '0.020', 5.9178082192, 9, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(299, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 14.520, 15.520, 6, 2, NULL, NULL, 7, 2, 1, 2, 0, 0, 2, 3, '0.020', 5.9178082192, 557, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(300, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 15.520, 16.520, 2, 4, NULL, NULL, 7, 2, 1, 0, 0, 0, 0, 4, '0.020', 5.9178082192, 546, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(301, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 16.520, 17.520, 3, 4, NULL, NULL, 7, 1, 0, 5, 0, 2, 3, 2, '0.010', 5.9178082192, 42, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(302, 1, NULL, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', NULL, 0, 2, 39, 17.520, 17.840, 3, 2, NULL, NULL, 7, 2, 1, 1, 1, 0, 0, 2, '0.062', 5.9178082192, 573, NULL, NULL, NULL, NULL, '2020-12-06 04:35:26', NULL, NULL),
(303, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 12/06/2020', NULL, NULL, 0, 3, 32, 0.000, 1.000, 6, 2, NULL, NULL, 8, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(304, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 12/06/2020', NULL, NULL, 0, 3, 32, 1.000, 2.000, 6, 2, NULL, NULL, 8, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(305, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 12/06/2020', NULL, NULL, 0, 3, 32, 2.000, 3.000, 2, 3, NULL, NULL, 8, 3, 0, 5, 1, 3, 1, 4, '0.347', 0.997260274, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(306, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 12/06/2020', NULL, NULL, 0, 3, 32, 3.000, 4.000, 6, 3, NULL, NULL, 8, 2, 0, 1, 0, 0, 1, 2, '0.231', 0.997260274, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(307, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 12/06/2020', NULL, NULL, 0, 3, 32, 4.000, 5.000, 3, 2, NULL, NULL, 8, 2, 2, 0, 0, 0, 0, 3, '0.231', 0.997260274, 1087, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(308, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 12/06/2020', NULL, NULL, 0, 3, 32, 5.000, 6.000, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 2, '0.116', 0.997260274, 544, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(309, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 12/06/2020', NULL, NULL, 0, 3, 33, 9.564, 10.564, 3, 2, NULL, NULL, 8, 1, 0, 4, 0, 2, 2, 2, '0.116', 0.997260274, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(310, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 12/06/2020', NULL, NULL, 0, 3, 33, 11.564, 12.564, 6, 2, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 1, '0.116', 0.997260274, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(311, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 12/06/2020', NULL, NULL, 0, 3, 33, 12.564, 13.564, 3, 2, NULL, NULL, 8, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(312, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 12/06/2020', NULL, NULL, 0, 3, 33, 13.564, 14.564, 3, 2, NULL, NULL, 8, 0, 0, 0, 0, 0, 0, 0, NULL, 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(313, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 12/06/2020', NULL, NULL, 0, 3, 33, 16.564, 17.564, 2, 4, NULL, NULL, 8, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(314, 1, 'Systemic Screening - Urban – Collision Type - 01/01/2017 to 12/31/2017 - Lithin km - 12/06/2020', NULL, NULL, 0, 3, 33, 18.564, 19.564, 6, 2, NULL, NULL, 8, 0, 0, 0, 0, 0, 0, 0, '0.000', 0.997260274, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(315, 1, NULL, 'Traditional Screening-SR-Test_Save-12/03/2015-12/09/2020 - Lithin km - 12/09/2020', NULL, 0, 4, 40, 1.000, 2.000, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, '0.029', 5.0219178082, 1, NULL, NULL, NULL, NULL, '2020-12-09 09:45:49', NULL, NULL),
(316, 1, NULL, 'Traditional Screening-SR-Test_Save-12/03/2015-12/09/2020 - Lithin km - 12/09/2020', NULL, 0, 4, 40, 2.000, 3.000, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, '0.029', 5.0219178082, 572, NULL, NULL, NULL, NULL, '2020-12-09 09:45:49', NULL, NULL),
(317, 1, NULL, 'Traditional Screening-SR-Test_Save-12/03/2015-12/09/2020 - Lithin km - 12/09/2020', NULL, 0, 4, 40, 4.000, 5.000, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, '0.029', 5.0219178082, 40, NULL, NULL, NULL, NULL, '2020-12-09 09:45:49', NULL, NULL),
(318, 1, NULL, 'Traditional Screening-SR-Test_Save-12/03/2015-12/09/2020 - Lithin km - 12/09/2020', NULL, 0, 4, 41, 6.910, 7.910, 2, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 2, '0.033', 5.0219178082, 8, NULL, NULL, NULL, NULL, '2020-12-09 09:45:49', NULL, NULL),
(319, 1, NULL, 'Traditional Screening-SR-Test_Save-12/03/2015-12/09/2020 - Lithin km - 12/09/2020', NULL, 0, 4, 41, 10.910, 11.760, 3, NULL, NULL, NULL, 8, 2, 2, 1, 0, 0, 0, 3, '0.077', 5.0219178082, 1087, NULL, NULL, NULL, NULL, '2020-12-09 09:45:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotspot_treatments`
--

CREATE TABLE `hotspot_treatments` (
  `id` int(11) NOT NULL,
  `hotspot` int(11) NOT NULL,
  `treatment` int(11) NOT NULL,
  `service_life` varchar(100) DEFAULT NULL,
  `cmf` varchar(255) DEFAULT NULL,
  `crf` varchar(255) DEFAULT NULL,
  `salvage_percent` varchar(255) DEFAULT NULL,
  `interest_rate` varchar(255) DEFAULT NULL,
  `total_treatment_cost` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotspot_treatments`
--

INSERT INTO `hotspot_treatments` (`id`, `hotspot`, `treatment`, `service_life`, `cmf`, `crf`, `salvage_percent`, `interest_rate`, `total_treatment_cost`, `created_at`, `updated_at`) VALUES
(1, 9, 2, '12', '0.84', '0.160', '4', '7', '15000', '2020-11-11 17:18:56', '2020-11-11 17:18:56'),
(2, 9, 6, '10', '0.76', '0.240', '6', '6', '128976', '2020-11-11 17:18:56', '2020-11-11 17:18:56'),
(3, 12, 2, '10', '0.85', '0.150', '4', '5', '25000', '2020-11-13 11:56:49', '2020-11-13 11:56:49'),
(4, 12, 4, '2', '0.65', '0.350', '12', '6', '1250', '2020-11-13 11:56:49', '2020-11-13 11:56:49'),
(5, 12, 7, '5', '0.89', '0.110', '2', '3', '13000', '2020-11-13 11:56:49', '2020-11-13 11:56:49'),
(6, 8, 4, '2', '0.65', '0.350', '12', '6', '1239', '2020-11-17 16:25:26', '2020-11-17 16:25:26'),
(7, 8, 6, '10', '0.76', '0.240', '6', '6', '128976', '2020-11-17 16:25:26', '2020-11-17 16:25:26'),
(8, 7, 7, '5', '0.89', '0.110', '2', '3', '12999', '2020-11-17 23:57:46', '2020-11-17 23:57:46'),
(9, 17, 6, '10', '0.76', '0.240', '6', '6', '128976', '2020-11-18 20:44:41', '2020-11-18 20:44:41'),
(10, 17, 7, '5', '0.89', '0.110', '2', '3', '12999', '2020-11-18 20:44:41', '2020-11-18 20:44:41'),
(11, 66, 4, '2', '0.65', '0.350', '12', '6', '12399', '2020-11-18 20:46:30', '2020-11-18 20:46:30'),
(12, 111, 5, '3', '0.23', '0.770', '4', '6', '135789', '2020-11-29 22:06:36', '2020-11-29 22:06:36'),
(13, 112, 6, '10', '0.76', '0.240', '6', '6', '128976', '2020-11-29 22:07:22', '2020-11-29 22:07:22'),
(14, 112, 7, '5', '0.89', '0.110', '2', '3', '12999', '2020-11-29 22:07:22', '2020-11-29 22:07:22'),
(15, 239, 5, '3', '0.23', '0.770', '4', '6', '135789', '2020-12-05 16:25:28', '2020-12-05 16:25:28'),
(16, 239, 6, '10', '0.76', '0.240', '6', '6', '128976', '2020-12-05 16:25:28', '2020-12-05 16:25:28'),
(17, 239, 7, '5', '0.89', '0.110', '2', '3', '12999', '2020-12-05 16:25:28', '2020-12-05 16:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `interchange_junction_types`
--

CREATE TABLE `interchange_junction_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interchange_junction_types`
--

INSERT INTO `interchange_junction_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'RampExit', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(2, 'RampEntrance', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(3, 'Merge_DivergeArea', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(4, 'Intersection', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(5, 'CloverLeaf', '2020-03-06 08:38:54', '2020-03-06 08:38:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `intersection_types`
--

CREATE TABLE `intersection_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intersection_types`
--

INSERT INTO `intersection_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Y intersection', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(2, 'T intersection', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(3, 'Roundabout', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(4, '4 way intersection', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(5, '5 way intersection', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `light_conditions`
--

CREATE TABLE `light_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `light_conditions`
--

INSERT INTO `light_conditions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dawn', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(2, 'Dark', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(3, 'Dusk', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(4, 'Daylight', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_27_061645_create_user_types_table', 1),
(5, '2019_11_27_062650_create_admins_table', 1),
(6, '2019_11_27_062717_create_privilages_table', 1),
(7, '2019_11_27_062750_create_admin_privilages_table', 1),
(8, '2019_11_27_123806_create_interchange_junction_types_table', 1),
(9, '2019_11_27_125304_create_environmental_conditions_table', 1),
(10, '2019_11_27_125323_create_intersection_types_table', 1),
(11, '2019_11_27_125345_create_road_surface_conditions_table', 1),
(12, '2019_11_27_125414_create_weather_conditions_table', 1),
(13, '2019_11_27_125429_create_light_conditions_table', 1),
(14, '2019_11_27_125501_create_road_surface_types_table', 1),
(15, '2019_11_27_125539_create_highway_classes_table', 1),
(16, '2019_11_27_144654_create_severity_types_table', 1),
(17, '2019_11_27_152345_create_colors_table', 1),
(18, '2019_11_27_172657_create_collision_types_table', 1),
(19, '2019_11_27_173539_create_vehicle_make_models_table', 1),
(20, '2019_11_27_174716_create_vehicle_types_table', 1),
(21, '2019_11_27_175035_create_driver_conditions_table', 1),
(22, '2019_11_27_175205_create_driver_distraction_types_table', 1),
(23, '2019_11_27_183312_create_route_directions_table', 1),
(24, '2019_11_27_183333_create_valid_routes_table', 1),
(25, '2019_11_28_125329_create_states_table', 1),
(26, '2019_11_28_125549_create_districts_table', 1),
(27, '2019_11_28_125614_create_counties_table', 1),
(28, '2019_11_28_132127_create_t_screenings_table', 1),
(29, '2019_11_28_143028_create_s_screenings_table', 1),
(30, '2019_11_28_143633_create_hotspots_table', 1),
(31, '2019_11_28_145532_create_treatments_table', 1),
(32, '2019_11_28_150217_create_crashes_table', 1),
(33, '2019_11_28_155447_create_vehicles_table', 1),
(34, '2019_11_28_160050_create_age_groups_table', 1),
(35, '2019_11_28_160051_create_persons_table', 1),
(36, '2019_11_28_161453_create_aadts_table', 1),
(37, '2019_11_28_161918_create_horz_curves_table', 1),
(38, '2019_11_28_162220_create_vert_curves_table', 1),
(39, '2019_11_28_162948_create_projects_table', 1),
(40, '2019_11_28_163627_create_project_treatments_table', 1),
(41, '2020_01_08_123834_create_saved_results_table', 1),
(42, '2020_01_23_100104_create_saved_scenarios_table', 2),
(43, '2020_02_18_110418_update_hotspots_table', 3),
(44, '2020_02_18_122634_update_t_screenings_table', 3),
(45, '2020_02_26_120335_update_persons_table', 4),
(47, '2020_02_26_132224_update_vehicles_table', 5),
(48, '2020_02_26_145508_create_speed_limits_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privilages`
--

CREATE TABLE `privilages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privilages`
--

INSERT INTO `privilages` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Query Crash Data', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(2, 'Crash Statistics', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(3, 'Traditional Screening', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(4, 'Systemic Screening', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(5, 'Hotspots', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(6, 'REA Segment', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(7, 'Projects', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(8, 'Reports', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(9, 'Data Importer', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(10, 'User Management', '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotspot` int(11) DEFAULT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_phase` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` bigint(20) UNSIGNED NOT NULL,
  `start_mp` double(19,3) NOT NULL,
  `end_mp` double(19,3) NOT NULL,
  `crash_from` date DEFAULT NULL,
  `crash_to` date DEFAULT NULL,
  `emphasis_area` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crash_count` int(11) DEFAULT NULL,
  `no_of_fatalities` int(11) DEFAULT NULL,
  `no_of_injuries` int(11) DEFAULT NULL,
  `no_of_typea` int(11) DEFAULT NULL,
  `no_of_typeb` int(11) DEFAULT NULL,
  `no_of_typec` int(11) DEFAULT NULL,
  `no_of_pdo` int(11) DEFAULT NULL,
  `crash_rate_aadt` double DEFAULT NULL,
  `epdo` double DEFAULT NULL,
  `euab` double DEFAULT NULL COMMENT 'Equivalent Benefits',
  `euac` double DEFAULT NULL COMMENT 'Equivalent Costs',
  `ben_costs` double DEFAULT NULL COMMENT 'Benefit/Cost',
  `geometry` geometry DEFAULT NULL COMMENT 'Geometry of the Route',
  `project_start_date` date DEFAULT NULL,
  `project_end_date` date DEFAULT NULL,
  `project_authorized_date` date DEFAULT NULL,
  `project_completed_date` date DEFAULT NULL,
  `program_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highway_class` bigint(20) UNSIGNED DEFAULT NULL,
  `route_direction` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `comment` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user`, `code`, `name`, `hotspot`, `number`, `status`, `sub_phase`, `route`, `start_mp`, `end_mp`, `crash_from`, `crash_to`, `emphasis_area`, `crash_count`, `no_of_fatalities`, `no_of_injuries`, `no_of_typea`, `no_of_typeb`, `no_of_typec`, `no_of_pdo`, `crash_rate_aadt`, `epdo`, `euab`, `euac`, `ben_costs`, `geometry`, `project_start_date`, `project_end_date`, `project_authorized_date`, `project_completed_date`, `program_name`, `program_number`, `highway_class`, `route_direction`, `created_at`, `updated_at`, `deleted_at`, `comment`) VALUES
(1, 1, '8958875587', '20100640000EB-57.39-58.39-E-1', 9, NULL, 'Authorized', 'Design', 1, 57.390, 58.390, '2015-01-01', '2020-12-31', NULL, 31, 11, 51, 9, 17, 25, 55, 0.177, 6615, 7306581.39, 3446210.4893092, 8.31374, NULL, '2020-11-16', '2024-11-22', NULL, NULL, '64 Program', 'A4567', 1, 5, '2020-11-11 17:18:56', '2020-11-12 15:08:09', NULL, NULL),
(2, 1, '6220933887', 'REA_Segment_1_11-11-2020', NULL, '2', 'Initiation', '', 3, 107.500, 108.500, '2015-01-01', '2020-12-31', NULL, 1, 0, 1, 1, 0, 0, 1, 0.018, 30, 10210.369390122, 38996.237595308, 0.26183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, '2020-11-11 20:24:37', '2020-11-15 13:45:26', NULL, 'Added from Route, Event, Asset Segmentation Screen'),
(3, 1, '6688822480', '77 Project', NULL, NULL, 'Initiation', NULL, 3, 107.000, 108.000, '2015-01-01', '2020-12-31', 'Age Group Risk,Rural Roadway Risk,Roadway Departure', 1, 0, 1, 1, 0, 0, 1, 0.018, 30, NULL, 7738601.9983563, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, '2020-11-11 20:40:55', '2020-11-11 20:41:12', NULL, NULL),
(4, 1, '7899522505', 'REA_Segment_3_11-12-2020', NULL, '4', 'Initiation', NULL, 6, 19.850, 20.850, '2016-01-01', '2020-12-31', NULL, 1, 0, 1, 0, 1, 0, 0, 0.065, 11, 15492.842627638, 2523855.9998356, 0.00614, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, '2020-11-12 15:00:29', '2020-11-13 12:18:26', NULL, 'Added from Route, Event, Asset Segmentation Screen'),
(5, 12, '5995636202', 'REA_Segment_4_11-12-2020', NULL, '5', 'Initiation', NULL, 9, 12.200, 13.200, '2016-01-01', '2020-12-31', NULL, 1, 0, 0, 0, 0, 0, 2, 0.023, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2020-11-12 15:07:02', '2020-11-12 15:07:02', NULL, 'Added from Route, Event, Asset Segmentation Screen'),
(6, 12, '8866120001', '119 Project', NULL, NULL, 'Initiation', NULL, 5, 12.000, 13.000, '2016-01-01', '2020-12-31', 'Age Group Risk', 23, 0, 25, 5, 7, 13, 17, 1.578, 317, NULL, 75813.77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, '2020-11-12 15:11:00', '2020-11-12 15:11:13', NULL, NULL),
(7, 1, '6046163873', 'Project 33', NULL, NULL, 'Initiation', '', 9, 12.000, 13.000, '2016-01-01', '2020-12-31', 'Rural Roadway Risk', 1, 0, 0, 0, 0, 0, 2, 0.023, 2, 2239.1003910636, 2523855.9998356, 0.00089, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2020-11-12 15:29:30', '2020-11-13 12:11:05', NULL, NULL),
(8, 1, '2772167849', '08100790000NB-42.60-43.20-N-1', 12, NULL, 'Initiation', '', 14, 42.600, 43.200, '2020-01-01', '2020-11-13', NULL, 1, 2, 0, 0, 0, 0, 0, 0.064, 1084, 11653137.91, 171674.86, 67.87912, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, '2020-11-13 11:56:50', '2020-11-16 06:14:50', NULL, NULL),
(9, 1, '6206254919', 'Admin_Test', NULL, NULL, 'Authorized', 'ROW', 1, 47.000, 48.000, '2016-01-01', '2017-01-01', '', 2, 0, 2, 1, 1, 0, 3, 0.068, 43, 647295.78062729, 1590876.9751948, 0.40688, NULL, '2021-05-01', '2024-11-06', NULL, NULL, NULL, NULL, 1, 5, '2020-11-15 13:51:55', '2020-11-17 10:55:13', NULL, NULL),
(10, 12, '5512876905', 'REA_Segment_9_11-15-2020', NULL, '10', 'Initiation', NULL, 1, 57.230, 58.230, '2016-01-01', '2016-12-30', NULL, 6, 3, 13, 2, 6, 5, 13, 0.206, 1793, 12166875.537901, 878855.99983172, 13.84399, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2020-11-15 14:01:04', '2020-11-17 09:36:35', NULL, 'Added from Route, Event, Asset Segmentation Screen'),
(11, 1, '7108478692', '20100640000EB-56.89-57.89-E-1', 8, NULL, 'Initiation', NULL, 1, 56.890, 57.890, '2015-01-01', '2020-12-31', NULL, 9, 1, 25, 4, 12, 9, 18, 0.051, 862, 1329026.92, 781426.29, 1.70077, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2020-11-17 16:25:26', '2020-11-17 16:25:26', NULL, NULL),
(12, 1, '2978378276', 'Jackson County 33 Project', NULL, NULL, 'Initiation', NULL, 9, 13.000, 15.000, '2020-01-01', '2020-12-31', 'Roadway Departure', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 781426.29256992, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2020-11-17 16:35:43', '2020-12-01 16:09:51', NULL, NULL),
(13, 1, '5357588475', '20100640000EB-56.39-57.39-E-1', 7, NULL, 'Initiation', '', 1, 56.390, 57.390, '2015-01-01', '2020-12-31', NULL, 2, 0, 8, 0, 5, 3, 4, 0.011, 77, 25414.79, 39034.36, 0.65109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2020-11-17 23:57:46', '2020-11-18 00:07:47', NULL, NULL),
(14, 1, '3786432960', '20100640000EB-49.39-50.39-E-1', 17, NULL, 'Initiation', NULL, 1, 49.390, 50.390, '2016-01-01', '2018-12-31', NULL, 1, 1, 1, 0, 0, 1, 2, 0.011, 550, 1088255.42, 812890.36, 1.33875, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2020-11-18 20:44:41', '2020-11-18 20:44:41', NULL, NULL),
(15, 1, '1860967738', '20100640000EB-57.39-58.39-E-1', 66, NULL, 'Initiation', NULL, 1, 57.390, 58.390, '2018-01-01', '2018-12-31', NULL, 8, 2, 12, 3, 3, 6, 14, 0.275, 1254, 8072526.68, 75757.89, 106.55691, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2020-11-18 20:46:30', '2020-11-18 20:46:30', NULL, NULL),
(16, 1, '6522117124', '33 Jackson County project', NULL, '16', 'Authorized', 'ROW', 9, 22.050, 23.050, '2016-01-01', '2020-12-30', NULL, 1, 0, 1, 1, 0, 0, 1, 0.044, 30, 24167.672831445, 1184619.1233884, 0.0204, NULL, '2021-11-17', '2024-11-29', NULL, NULL, NULL, NULL, 1, 5, '2020-11-18 20:48:53', '2020-11-18 20:52:24', NULL, 'Added from Route, Event, Asset Segmentation Screen'),
(17, 12, '3703884685', '33new', NULL, NULL, 'Initiation', '', 9, 12.000, 12.500, '2020-01-01', '2020-12-31', '', 1, 0, 0, 0, 0, 0, 2, 0.44, 2, 0, 812890.36039958, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2020-11-21 16:15:54', '2020-11-29 22:08:49', NULL, NULL),
(18, 12, '2968605631', 'Good test', NULL, NULL, 'Initiation', '', 1, 47.000, 48.000, '2017-01-01', '2018-12-31', '', 1, 1, 1, 0, 0, 1, 2, 0.017, 550, 1414382.7416176, 1750000, 0.80822, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 5, '2020-11-22 22:57:44', '2020-11-22 22:59:18', NULL, NULL),
(19, 1, '5540064087', '40200350000NB-3.53-4.53-N-1', 111, NULL, 'Initiation', NULL, 37, 3.532, 4.532, '2016-01-01', '2020-11-30', NULL, 5, 0, 4, 2, 1, 1, 3, NULL, 78, 0, 817020.97, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 6, '2020-11-29 22:06:36', '2020-11-29 22:06:36', NULL, NULL),
(20, 1, '2342872468', '40200350000NB-4.53-5.53-N-1', 112, NULL, 'Initiation', NULL, 37, 4.532, 5.532, '2016-01-01', '2020-11-30', NULL, 5, 0, 3, 1, 0, 2, 5, NULL, 46, 0, 812890.36, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 6, '2020-11-29 22:07:22', '2020-11-29 22:07:22', NULL, NULL),
(21, 1, '1829423741', 'sad', NULL, NULL, 'Initiation', NULL, 36, 2.000, 2.200, '2020-12-02', '2020-12-15', '', 0, 0, 0, 0, 0, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, '2020-12-01 03:01:26', '2020-12-01 03:01:26', NULL, NULL),
(22, 1, '9450604762', 'REA_Segment_21_12-01-2020', NULL, '22', 'Initiation', NULL, 40, 4.200, 5.200, '2016-01-01', '2020-11-30', NULL, 1, 0, 2, 1, 1, 0, 0, 0.03, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 8, '2020-12-01 15:58:03', '2020-12-01 15:58:03', NULL, 'Added from Route, Event, Asset Segmentation Screen'),
(23, 1, '4663002704', 'P_Dec_test', NULL, NULL, 'Initiation', NULL, 37, 2.600, 5.000, '2015-12-03', '2017-12-31', '', 5, 0, 9, 2, 1, 6, 3, 0.06, 108, 332444.58937564, 1789037.3607036, 0.18582, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, '2020-12-05 10:40:08', '2020-12-05 10:40:32', NULL, NULL),
(24, 1, '2227389311', '20300610000SB-23.85-24.85-S-1', 239, NULL, 'Initiation', NULL, 35, 23.850, 24.850, '2020-01-01', '2020-11-30', NULL, 1, 0, 1, 0, 0, 1, 0, 0.136, 6, 70448.32, 1629911.33, 0.04322, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 7, '2020-12-05 16:25:28', '2020-12-05 16:25:28', NULL, NULL),
(25, 1, '4981759232', 'REA_Segment_24_12-05-2020', NULL, '25', 'Initiation', '', 40, 1.120, 2.120, '2015-01-01', '2020-11-30', NULL, 1, 0, 0, 0, 0, 0, 1, 0.025, 1, 402.7239455755, 1750000, 0.00023, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 8, '2020-12-05 16:26:08', '2020-12-05 16:26:39', NULL, 'Added from Route, Event, Asset Segmentation Screen'),
(26, 12, '6958660347', 'idontknow', NULL, NULL, 'Initiation', '', 36, 1.000, 2.000, '2015-01-01', '2020-11-30', '', 1, 0, 1, 1, 0, 0, 0, 0.01, 29, 73029.756852242, 2567020.9726249, 0.02845, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 6, '2020-12-06 04:53:25', '2020-12-06 05:04:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_selected_treatments`
--

CREATE TABLE `project_selected_treatments` (
  `id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `treatment` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service_life` varchar(50) DEFAULT NULL,
  `cmf` varchar(255) DEFAULT NULL,
  `crf` varchar(255) DEFAULT NULL,
  `salvage_percent` varchar(255) DEFAULT NULL,
  `interest_rate` varchar(255) DEFAULT NULL,
  `total_treatment_cost` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project_treatments`
--

CREATE TABLE `project_treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `treatment` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` int(11) NOT NULL,
  `service_life` int(11) NOT NULL,
  `crf` double(8,3) NOT NULL,
  `cmf` double(8,3) NOT NULL,
  `salvage_percent` double(8,3) NOT NULL,
  `interest_rate` double(8,3) NOT NULL,
  `total_treatment_cost` double NOT NULL,
  `om_cost` double(8,3) DEFAULT NULL COMMENT 'Opearation & Maintenance Cost',
  `treatment_cost` double(8,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_treatments`
--

INSERT INTO `project_treatments` (`id`, `treatment`, `project`, `service_life`, `crf`, `cmf`, `salvage_percent`, `interest_rate`, `total_treatment_cost`, `om_cost`, `treatment_cost`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '6', 3, 10, 0.240, 0.760, 6.000, 6.000, 1289767, NULL, NULL, '2020-11-11 20:41:12', '2020-11-11 20:41:12', NULL),
(7, '1', 1, 15, 0.210, 0.790, 12.000, 7.000, 250000, NULL, NULL, '2020-11-12 15:08:09', '2020-11-12 15:08:09', NULL),
(8, '2', 1, 12, 0.160, 0.840, 4.000, 7.000, 15000, NULL, NULL, '2020-11-12 15:08:09', '2020-11-12 15:08:09', NULL),
(9, '5', 1, 3, 0.770, 0.230, 4.000, 6.000, 135789, NULL, NULL, '2020-11-12 15:08:09', '2020-11-12 15:08:09', NULL),
(10, '6', 1, 10, 0.240, 0.760, 6.000, 6.000, 128976, NULL, NULL, '2020-11-12 15:08:09', '2020-11-12 15:08:09', NULL),
(11, '4', 6, 2, 0.350, 0.650, 12.000, 6.000, 12398, NULL, NULL, '2020-11-12 15:11:13', '2020-11-12 15:11:13', NULL),
(16, '2', 8, 10, 0.150, 0.850, 4.000, 5.000, 25000, NULL, NULL, '2020-11-13 11:56:50', '2020-11-13 11:56:50', NULL),
(17, '4', 8, 2, 0.350, 0.650, 12.000, 6.000, 1250, NULL, NULL, '2020-11-13 11:56:50', '2020-11-13 11:56:50', NULL),
(18, '7', 8, 5, 0.110, 0.890, 2.000, 3.000, 13000, NULL, NULL, '2020-11-13 11:56:50', '2020-11-13 11:56:50', NULL),
(19, '3', 7, 25, 0.280, 0.720, 3.000, 7.000, 250000, NULL, NULL, '2020-11-13 12:11:05', '2020-11-13 12:11:05', NULL),
(20, '6', 7, 10, 0.240, 0.760, 6.000, 6.000, 128976, NULL, NULL, '2020-11-13 12:11:05', '2020-11-13 12:11:05', NULL),
(21, '3', 4, 25, 0.280, 0.720, 3.000, 7.000, 250000, NULL, NULL, '2020-11-13 12:18:25', '2020-11-13 12:18:25', NULL),
(22, '6', 4, 10, 0.240, 0.760, 6.000, 6.000, 128976, NULL, NULL, '2020-11-13 12:18:25', '2020-11-13 12:18:25', NULL),
(23, '7', 2, 5, 0.110, 0.890, 2.000, 3.000, 12999, NULL, NULL, '2020-11-15 13:45:22', '2020-11-15 13:45:22', NULL),
(28, '2', 10, 10, 0.170, 0.830, 4.000, 7.000, 15000, NULL, NULL, '2020-11-17 09:36:35', '2020-11-17 09:36:35', NULL),
(29, '6', 10, 10, 0.240, 0.760, 6.000, 6.000, 128976, NULL, NULL, '2020-11-17 09:36:35', '2020-11-17 09:36:35', NULL),
(30, '5', 9, 3, 0.770, 0.230, 4.000, 6.000, 135789, NULL, NULL, '2020-11-17 10:55:13', '2020-11-17 10:55:13', NULL),
(31, '6', 9, 10, 0.240, 0.760, 6.000, 6.000, 128976, NULL, NULL, '2020-11-17 10:55:13', '2020-11-17 10:55:13', NULL),
(32, '4', 11, 2, 0.350, 0.650, 12.000, 6.000, 1239, NULL, NULL, '2020-11-17 16:25:26', '2020-11-17 16:25:26', NULL),
(33, '6', 11, 10, 0.240, 0.760, 6.000, 6.000, 128976, NULL, NULL, '2020-11-17 16:25:26', '2020-11-17 16:25:26', NULL),
(35, '7', 13, 5, 0.110, 0.890, 2.000, 3.000, 12999, NULL, NULL, '2020-11-17 23:57:46', '2020-11-17 23:57:46', NULL),
(36, '6', 14, 10, 0.240, 0.760, 6.000, 6.000, 128976, NULL, NULL, '2020-11-18 20:44:41', '2020-11-18 20:44:41', NULL),
(37, '7', 14, 5, 0.110, 0.890, 2.000, 3.000, 12999, NULL, NULL, '2020-11-18 20:44:41', '2020-11-18 20:44:41', NULL),
(38, '4', 15, 2, 0.350, 0.650, 12.000, 6.000, 12399, NULL, NULL, '2020-11-18 20:46:30', '2020-11-18 20:46:30', NULL),
(39, '6', 16, 10, 0.240, 0.760, 6.000, 6.000, 128976, NULL, NULL, '2020-11-18 20:51:07', '2020-11-18 20:51:07', NULL),
(40, '7', 16, 5, 0.110, 0.890, 2.000, 3.000, 136790, NULL, NULL, '2020-11-18 20:51:07', '2020-11-18 20:51:07', NULL),
(41, '3', 18, 25, 0.280, 0.720, 3.000, 7.000, 250000, NULL, NULL, '2020-11-22 22:57:58', '2020-11-22 22:57:58', NULL),
(42, '5', 19, 3, 0.770, 0.230, 4.000, 6.000, 135789, NULL, NULL, '2020-11-29 22:06:36', '2020-11-29 22:06:36', NULL),
(43, '6', 20, 10, 0.240, 0.760, 6.000, 6.000, 128976, NULL, NULL, '2020-11-29 22:07:22', '2020-11-29 22:07:22', NULL),
(44, '7', 20, 5, 0.110, 0.890, 2.000, 3.000, 12999, NULL, NULL, '2020-11-29 22:07:22', '2020-11-29 22:07:22', NULL),
(45, '6', 17, 10, 0.240, 0.760, 6.000, 6.000, 128976, NULL, NULL, '2020-11-29 22:08:38', '2020-11-29 22:08:38', NULL),
(46, '7', 17, 5, 0.110, 0.890, 2.000, 3.000, 12999, NULL, NULL, '2020-11-29 22:08:38', '2020-11-29 22:08:38', NULL),
(47, '4', 12, 2, 0.350, 0.650, 12.000, 6.000, 1239, NULL, NULL, '2020-12-01 16:09:51', '2020-12-01 16:09:51', NULL),
(48, '6', 12, 10, 0.240, 0.760, 6.000, 6.000, 128976, NULL, NULL, '2020-12-01 16:09:51', '2020-12-01 16:09:51', NULL),
(49, '3', 23, 25, 0.280, 0.720, 3.000, 7.000, 250000, NULL, NULL, '2020-12-05 10:40:32', '2020-12-05 10:40:32', NULL),
(50, '7', 23, 5, 0.110, 0.890, 2.000, 3.000, 13000, NULL, NULL, '2020-12-05 10:40:32', '2020-12-05 10:40:32', NULL),
(51, '5', 24, 3, 0.770, 0.230, 4.000, 6.000, 135789, NULL, NULL, '2020-12-05 16:25:28', '2020-12-05 16:25:28', NULL),
(52, '6', 24, 10, 0.240, 0.760, 6.000, 6.000, 128976, NULL, NULL, '2020-12-05 16:25:28', '2020-12-05 16:25:28', NULL),
(53, '7', 24, 5, 0.110, 0.890, 2.000, 3.000, 12999, NULL, NULL, '2020-12-05 16:25:28', '2020-12-05 16:25:28', NULL),
(54, '1', 25, 15, 0.210, 0.790, 12.000, 7.000, 250000, NULL, NULL, '2020-12-05 16:26:36', '2020-12-05 16:26:36', NULL),
(55, '3', 26, 25, 0.280, 0.720, 3.000, 7.000, 250000, NULL, NULL, '2020-12-06 05:02:00', '2020-12-06 05:02:00', NULL),
(56, '5', 26, 3, 0.770, 0.230, 4.000, 6.000, 135789, NULL, NULL, '2020-12-06 05:02:00', '2020-12-06 05:02:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `road_surface_conditions`
--

CREATE TABLE `road_surface_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `road_surface_conditions`
--

INSERT INTO `road_surface_conditions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dry', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(2, 'Ice', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(3, 'Dirt', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(4, 'Snow', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(5, 'Wet', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(6, 'Slush', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(7, 'Asphalt', '2020-08-24 11:05:19', '2020-08-24 11:05:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `road_surface_types`
--

CREATE TABLE `road_surface_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `road_surface_types`
--

INSERT INTO `road_surface_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Asphalt', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(2, 'Concrete', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(3, 'Dirt', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(4, 'Dry', '2020-08-24 11:07:35', '2020-08-24 11:07:35', NULL),
(5, 'Wet', '2020-08-24 11:07:35', '2020-08-24 11:07:35', NULL),
(6, 'Ice', '2020-08-24 11:07:35', '2020-08-24 11:07:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `route_directions`
--

CREATE TABLE `route_directions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `route_directions`
--

INSERT INTO `route_directions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'E', '2020-08-24 11:10:18', '2020-08-24 11:10:18', NULL),
(6, 'N', '2020-08-24 11:10:18', '2020-08-24 11:10:18', NULL),
(7, 'S', '2020-08-24 11:10:18', '2020-08-24 11:10:18', NULL),
(8, 'Both', '2020-11-27 11:24:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saved_results`
--

CREATE TABLE `saved_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saved_scenarios`
--

CREATE TABLE `saved_scenarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route` bigint(20) UNSIGNED NOT NULL,
  `route_direction` bigint(20) UNSIGNED NOT NULL,
  `crash_count` int(11) NOT NULL,
  `no_of_fatalities` int(11) NOT NULL,
  `no_of_injuries` int(11) NOT NULL,
  `no_of_typea` int(11) NOT NULL,
  `no_of_typeb` int(11) NOT NULL,
  `no_of_typec` int(11) NOT NULL,
  `no_of_pdo` int(11) NOT NULL,
  `crash_rate` double(19,3) NOT NULL,
  `epdo` double(19,3) NOT NULL,
  `aadt` double(19,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `severity_types`
--

CREATE TABLE `severity_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double(19,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `severity_types`
--

INSERT INTO `severity_types` (`id`, `name`, `cost`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fatal', 5049808.580, '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(2, 'TypeA', 272084.280, '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(3, 'TypeB', 99512.300, '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(4, 'TypeC', 56558.260, '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(5, 'PDO', 9321.410, '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `speed_limits`
--

CREATE TABLE `speed_limits` (
  `id` int(20) UNSIGNED NOT NULL,
  `route` bigint(20) UNSIGNED NOT NULL,
  `route_direction` bigint(20) UNSIGNED NOT NULL,
  `start_mp` double(19,3) NOT NULL,
  `end_mp` double(19,3) NOT NULL,
  `speed_limit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geometry` geometry DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `speed_limits`
--

INSERT INTO `speed_limits` (`id`, `route`, `route_direction`, `start_mp`, `end_mp`, `speed_limit`, `geometry`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 35, 7, 21.850, 28.403, '50mph', NULL, '2020-11-29 20:16:50', '2020-11-29 20:16:50', NULL),
(2, 40, 8, 0.000, 6.730, '35mph', NULL, '2020-11-29 20:16:50', '2020-11-29 20:16:50', NULL),
(3, 41, 8, 6.910, 11.760, '55mph', NULL, '2020-11-29 20:16:50', '2020-11-29 20:16:50', NULL),
(4, 32, 8, 0.000, 7.564, '35mph', NULL, '2020-12-05 09:08:43', '2020-12-05 09:08:43', NULL),
(5, 33, 8, 7.564, 14.000, '45mph ', NULL, '2020-12-05 09:08:44', '2020-12-05 09:08:44', NULL),
(6, 33, 8, 20.100, 21.200, '45mph ', NULL, '2020-12-05 09:08:44', '2020-12-05 09:08:44', NULL),
(7, 34, 8, 21.200, 28.440, '50mph', NULL, '2020-12-05 09:08:44', '2020-12-05 09:08:44', NULL),
(8, 36, 6, 0.000, 2.532, '40mph', NULL, '2020-12-05 09:08:44', '2020-12-05 09:08:44', NULL),
(9, 37, 6, 2.532, 17.840, '40mph', NULL, '2020-12-05 09:08:44', '2020-12-05 09:08:44', NULL),
(10, 38, 7, 0.000, 2.520, '45mph ', NULL, '2020-12-05 09:08:44', '2020-12-05 09:08:44', NULL),
(11, 39, 7, 2.520, 17.840, '45mph ', NULL, '2020-12-05 09:08:44', '2020-12-05 09:08:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'WV', '2020-01-10 07:32:35', '2020-01-10 07:32:35', NULL),
(2, 'LA', '2020-01-10 07:32:35', '2020-01-10 07:32:35', NULL),
(3, 'WO', '2020-03-06 10:49:20', '2020-03-06 10:49:20', NULL),
(4, 'MO', NULL, NULL, NULL),
(5, 'OH', NULL, NULL, NULL),
(6, 'IL', NULL, NULL, NULL),
(7, 'TX', NULL, NULL, NULL),
(8, 'LA', NULL, NULL, NULL),
(9, 'CA', NULL, NULL, NULL),
(10, 'AR', NULL, NULL, NULL),
(11, 'CT', NULL, NULL, NULL),
(12, 'NY', '0000-00-00 00:00:00', NULL, NULL),
(13, 'FL', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `s_screenings`
--

CREATE TABLE `s_screenings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `screening_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_segment_length` double(8,3) NOT NULL,
  `window_length` double(8,3) NOT NULL,
  `slide_length` double(8,3) NOT NULL,
  `route_filter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_filter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highway_class` bigint(20) UNSIGNED NOT NULL,
  `route` bigint(20) UNSIGNED NOT NULL,
  `start_mp` double(19,3) NOT NULL,
  `end_mp` double(19,3) NOT NULL,
  `collision_type` bigint(20) UNSIGNED NOT NULL,
  `light_condition` bigint(20) UNSIGNED NOT NULL,
  `intersection_type` bigint(20) UNSIGNED NOT NULL,
  `interchange_junction_type` bigint(20) UNSIGNED NOT NULL,
  `route_direction` bigint(20) UNSIGNED NOT NULL,
  `crash_count` int(11) NOT NULL,
  `no_of_fatalities` int(11) NOT NULL,
  `no_of_injuries` int(11) NOT NULL,
  `no_of_typea` int(11) NOT NULL,
  `no_of_typeb` int(11) NOT NULL,
  `no_of_typec` int(11) NOT NULL,
  `no_of_pdo` int(11) NOT NULL,
  `crash_rate_aadt` double(8,3) NOT NULL,
  `epdo` double(8,3) NOT NULL,
  `geometry` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_life` int(11) NOT NULL,
  `crf` double(8,3) NOT NULL,
  `cmf` double(8,3) NOT NULL,
  `salvage_percent` double(8,3) NOT NULL,
  `interest_rate` double(8,3) NOT NULL,
  `total_treatment_cost` double NOT NULL,
  `om_cost` double(8,3) NOT NULL COMMENT 'Opearation & Maintenance Cost',
  `treatment_cost` double(8,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`id`, `name`, `service_life`, `crf`, `cmf`, `salvage_percent`, `interest_rate`, `total_treatment_cost`, `om_cost`, `treatment_cost`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Traffic Signal', 15, 0.210, 0.790, 12.000, 7.000, 250000, 0.000, 0.000, '2020-11-13 04:48:25', '2020-11-13 04:48:25', NULL),
(2, 'Sign', 10, 0.170, 0.830, 4.000, 7.000, 15000, 0.000, 0.000, '2020-11-15 14:17:27', '2020-11-15 14:17:27', NULL),
(3, 'Roundabout', 25, 0.280, 0.720, 3.000, 7.000, 250000, 0.000, 0.000, '2020-11-13 04:48:25', '2020-11-13 04:48:25', NULL),
(4, 'Delineartors', 2, 0.350, 0.650, 12.000, 6.000, 1239, 0.000, 0.000, '2020-11-13 04:48:25', '2020-11-13 04:48:25', NULL),
(5, 'Median', 3, 0.770, 0.230, 4.000, 6.000, 135789, 0.000, 0.000, '2020-11-13 04:48:25', '2020-11-13 04:48:25', NULL),
(6, 'RumbleStrips', 10, 0.240, 0.760, 6.000, 6.000, 128976, 0.000, 0.000, '2020-11-13 04:48:25', '2020-11-13 04:48:25', NULL),
(7, 'Winter Weather Treatment', 5, 0.110, 0.890, 2.000, 3.000, 12999, 2500.000, 0.000, '2020-11-13 04:48:25', '2020-11-13 04:48:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_screenings`
--

CREATE TABLE `t_screenings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `screening_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_segment_length` double(8,3) NOT NULL,
  `window_length` double(8,3) NOT NULL,
  `slide_length` double(8,3) NOT NULL,
  `route_filter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_filter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highway_class` bigint(20) UNSIGNED DEFAULT NULL,
  `route` bigint(20) UNSIGNED DEFAULT NULL,
  `start_mp` double(19,3) NOT NULL,
  `end_mp` double(19,3) NOT NULL,
  `collision_type` bigint(20) UNSIGNED DEFAULT NULL,
  `light_condition` bigint(20) UNSIGNED DEFAULT NULL,
  `intersection_type` bigint(20) UNSIGNED DEFAULT NULL,
  `interchange_junction_type` bigint(20) UNSIGNED DEFAULT NULL,
  `route_direction` bigint(20) UNSIGNED DEFAULT NULL,
  `crash_count` int(11) NOT NULL,
  `no_of_fatalities` int(11) NOT NULL,
  `no_of_injuries` int(11) NOT NULL,
  `no_of_typea` int(11) NOT NULL,
  `no_of_typeb` int(11) NOT NULL,
  `no_of_typec` int(11) NOT NULL,
  `no_of_pdo` int(11) NOT NULL,
  `crash_rate_aadt` double DEFAULT NULL,
  `epdo` int(11) NOT NULL,
  `geometry` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_screenings`
--

INSERT INTO `t_screenings` (`id`, `user`, `name`, `status`, `start_date`, `end_date`, `screening_method`, `max_segment_length`, `window_length`, `slide_length`, `route_filter`, `additional_filter`, `highway_class`, `route`, `start_mp`, `end_mp`, `collision_type`, `light_condition`, `intersection_type`, `interchange_junction_type`, `route_direction`, `crash_count`, `no_of_fatalities`, `no_of_injuries`, `no_of_typea`, `no_of_typeb`, `no_of_typec`, `no_of_pdo`, `crash_rate_aadt`, `epdo`, `geometry`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Traditional Screening-SR-Kanawha County 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Simple Ranking', 1.000, 0.000, 0.000, '1', NULL, 1, 1, 46.390, 47.390, 2, 2, NULL, NULL, 5, 2, 1, 1, 0, 0, 1, 4, 0.011, 552, NULL, '2020-11-11 17:15:04', NULL, NULL),
(2, 1, 'Traditional Screening-SR-Kanawha County 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Simple Ranking', 1.000, 0.000, 0.000, '1', NULL, 1, 1, 47.390, 48.390, 3, 2, NULL, NULL, 5, 1, 0, 2, 1, 1, 0, 1, 0.006, 41, NULL, '2020-11-11 17:15:04', NULL, NULL),
(3, 1, 'Traditional Screening-SR-Kanawha County 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Simple Ranking', 1.000, 0.000, 0.000, '1', NULL, 1, 1, 49.390, 50.390, 3, 2, NULL, NULL, 5, 1, 1, 1, 0, 0, 1, 2, 0.006, 550, NULL, '2020-11-11 17:15:04', NULL, NULL),
(4, 1, 'Traditional Screening-SR-Kanawha County 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Simple Ranking', 1.000, 0.000, 0.000, '1', NULL, 1, 1, 56.390, 57.390, 3, 2, NULL, NULL, 5, 2, 0, 8, 0, 5, 3, 4, 0.011, 77, NULL, '2020-11-11 17:15:04', NULL, NULL),
(5, 1, 'Traditional Screening-SR-Kanawha County 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Simple Ranking', 1.000, 0.000, 0.000, '1', NULL, 1, 1, 57.390, 58.390, 6, 2, NULL, NULL, 5, 31, 11, 51, 9, 17, 25, 55, 0.177, 6615, NULL, '2020-11-11 17:15:04', NULL, NULL),
(6, 1, 'Traditional Screening-SR-Kanawha County 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Simple Ranking', 1.000, 0.000, 0.000, '1', NULL, 1, 1, 58.390, 58.780, 6, 2, NULL, NULL, 5, 2, 1, 0, 0, 0, 0, 3, 0.029, 545, NULL, '2020-11-11 17:15:04', NULL, NULL),
(7, 1, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Sliding Window', 0.000, 1.000, 0.500, '1', NULL, 1, 1, 46.390, 47.390, 2, 2, NULL, NULL, 5, 2, 1, 1, 0, 0, 1, 4, 0.011, 552, NULL, '2020-11-11 17:16:24', NULL, NULL),
(8, 1, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Sliding Window', 0.000, 1.000, 0.500, '1', NULL, 1, 1, 46.890, 47.890, 2, 2, NULL, NULL, 5, 2, 1, 1, 0, 0, 1, 4, 0.011, 552, NULL, '2020-11-11 17:16:24', NULL, NULL),
(9, 1, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Sliding Window', 0.000, 1.000, 0.500, '1', NULL, 1, 1, 47.390, 48.390, 3, 2, NULL, NULL, 5, 1, 0, 2, 1, 1, 0, 1, 0.006, 41, NULL, '2020-11-11 17:16:24', NULL, NULL),
(10, 1, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Sliding Window', 0.000, 1.000, 0.500, '1', NULL, 1, 1, 47.890, 48.890, 3, 2, NULL, NULL, 5, 1, 0, 2, 1, 1, 0, 1, 0.006, 41, NULL, '2020-11-11 17:16:24', NULL, NULL),
(11, 1, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Sliding Window', 0.000, 1.000, 0.500, '1', NULL, 1, 1, 48.890, 49.890, 3, 2, NULL, NULL, 5, 1, 1, 1, 0, 0, 1, 2, 0.006, 550, NULL, '2020-11-11 17:16:24', NULL, NULL),
(12, 1, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Sliding Window', 0.000, 1.000, 0.500, '1', NULL, 1, 1, 49.390, 50.390, 3, 2, NULL, NULL, 5, 1, 1, 1, 0, 0, 1, 2, 0.006, 550, NULL, '2020-11-11 17:16:24', NULL, NULL),
(13, 1, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Sliding Window', 0.000, 1.000, 0.500, '1', NULL, 1, 1, 56.390, 57.390, 3, 2, NULL, NULL, 5, 2, 0, 8, 0, 5, 3, 4, 0.011, 77, NULL, '2020-11-11 17:16:24', NULL, NULL),
(14, 1, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Sliding Window', 0.000, 1.000, 0.500, '1', NULL, 1, 1, 56.890, 57.890, 6, 2, NULL, NULL, 5, 9, 1, 25, 4, 12, 9, 18, 0.051, 862, NULL, '2020-11-11 17:16:24', NULL, NULL),
(15, 1, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Sliding Window', 0.000, 1.000, 0.500, '1', NULL, 1, 1, 57.390, 58.390, 6, 2, NULL, NULL, 5, 31, 11, 51, 9, 17, 25, 55, 0.177, 6615, NULL, '2020-11-11 17:16:24', NULL, NULL),
(16, 1, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Sliding Window', 0.000, 1.000, 0.500, '1', NULL, 1, 1, 57.890, 58.780, 3, 3, NULL, NULL, 5, 26, 11, 34, 5, 10, 19, 44, 0.167, 6375, NULL, '2020-11-11 17:16:24', NULL, NULL),
(17, 1, 'Traditional Screening-SW-Route 64-01/01/2015-12/31/2020 - Lithin km - 11/11/2020', '1', '2015-01-01', '2020-12-31', 'Sliding Window', 0.000, 1.000, 0.500, '1', NULL, 1, 1, 58.390, 58.780, 6, 2, NULL, NULL, 5, 2, 1, 0, 0, 0, 0, 3, 0.029, 545, NULL, '2020-11-11 17:16:24', NULL, NULL),
(18, 7, 'Traditional Screening-SR-Scr_User-01/01/2020-11/13/2020 - Niharika - 11/13/2020', '1', '2020-01-01', '2020-11-13', 'Simple Ranking', 1.000, 0.000, 0.000, '9', NULL, 2, 9, 11.090, 12.090, 6, 2, NULL, NULL, 5, 1, 0, 1, 0, 0, 1, 0, 0.253, 6, NULL, '2020-11-13 11:29:25', NULL, NULL),
(19, 7, 'Traditional Screening-SR-Scr_User-01/01/2020-11/13/2020 - Niharika - 11/13/2020', '1', '2020-01-01', '2020-11-13', 'Simple Ranking', 1.000, 0.000, 0.000, '9', NULL, 2, 9, 12.090, 13.090, 2, 2, NULL, NULL, 5, 1, 0, 0, 0, 0, 0, 2, 0.253, 2, NULL, '2020-11-13 11:29:25', NULL, NULL),
(20, 7, 'Traditional Screening-SR-Scr_User-01/01/2020-11/13/2020 - Niharika - 11/13/2020', '1', '2020-01-01', '2020-11-13', 'Simple Ranking', 1.000, 0.000, 0.000, '9', NULL, 2, 9, 15.090, 16.090, 6, NULL, NULL, NULL, 5, 1, 0, 2, 0, 1, 1, 0, 0.253, 17, NULL, '2020-11-13 11:29:25', NULL, NULL),
(21, 7, 'Traditional Screening-SR-Scr_User-01/01/2020-11/13/2020 - Niharika - 11/13/2020', '1', '2020-01-01', '2020-11-13', 'Simple Ranking', 1.000, 0.000, 0.000, '9', NULL, 2, 9, 21.090, 22.090, 3, 2, NULL, NULL, 5, 1, 0, 1, 1, 0, 0, 1, 0.253, 30, NULL, '2020-11-13 11:29:25', NULL, NULL),
(22, 7, 'Traditional Screening-SR-Scr_User-01/01/2020-11/13/2020 - Niharika - 11/13/2020', '1', '2020-01-01', '2020-11-13', 'Simple Ranking', 1.000, 0.000, 0.000, '9', NULL, 2, 9, 24.090, 24.760, 6, NULL, NULL, NULL, 5, 1, 2, 0, 0, 0, 0, 1, 0.378, 1085, NULL, '2020-11-13 11:29:25', NULL, NULL),
(23, 1, 'Traditional Screening-SW-R79-01/01/2020-11/13/2020 - Lithin km - 11/13/2020', '1', '2020-01-01', '2020-11-13', 'Sliding Window', 0.000, 0.600, 0.300, '14', NULL, 1, 14, 42.600, 43.200, 3, NULL, NULL, NULL, 6, 1, 2, 0, 0, 0, 0, 0, 0.064, 1084, NULL, '2020-11-13 11:51:30', NULL, NULL),
(24, 1, 'Traditional Screening-SW-R79-01/01/2020-11/13/2020 - Lithin km - 11/13/2020', '1', '2020-01-01', '2020-11-13', 'Sliding Window', 0.000, 0.600, 0.300, '14', NULL, 1, 14, 42.900, 43.500, 3, NULL, NULL, NULL, 6, 1, 2, 0, 0, 0, 0, 0, 0.064, 1084, NULL, '2020-11-13 11:51:30', NULL, NULL),
(25, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 95.740, 96.040, 3, 2, NULL, NULL, 6, 1, 0, 4, 0, 2, 2, 2, 0.047, 36, NULL, '2020-11-17 16:16:30', NULL, NULL),
(26, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 95.840, 96.140, 3, 2, NULL, NULL, 6, 1, 0, 4, 0, 2, 2, 2, 0.047, 36, NULL, '2020-11-17 16:16:30', NULL, NULL),
(27, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 95.940, 96.240, 3, 2, NULL, NULL, 6, 1, 0, 4, 0, 2, 2, 2, 0.047, 36, NULL, '2020-11-17 16:16:30', NULL, NULL),
(28, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.140, 98.440, 3, 2, NULL, NULL, 6, 1, 1, 0, 0, 0, 0, 1, 0.047, 543, NULL, '2020-11-17 16:16:30', NULL, NULL),
(29, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.240, 98.540, 3, 2, NULL, NULL, 6, 1, 1, 0, 0, 0, 0, 1, 0.047, 543, NULL, '2020-11-17 16:16:30', NULL, NULL),
(30, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.340, 98.640, 3, 2, NULL, NULL, 6, 1, 1, 0, 0, 0, 0, 1, 0.047, 543, NULL, '2020-11-17 16:16:30', NULL, NULL),
(31, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.740, 99.040, 3, 2, NULL, NULL, 6, 1, 1, 0, 0, 0, 0, 1, 0.047, 543, NULL, '2020-11-17 16:16:30', NULL, NULL),
(32, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.840, 99.140, 3, 2, NULL, NULL, 6, 1, 1, 0, 0, 0, 0, 1, 0.047, 543, NULL, '2020-11-17 16:16:30', NULL, NULL),
(33, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.940, 99.240, 3, 2, NULL, NULL, 6, 1, 1, 0, 0, 0, 0, 1, 0.047, 543, NULL, '2020-11-17 16:16:30', NULL, NULL),
(34, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 99.540, 99.840, 3, 2, NULL, NULL, 6, 1, 0, 3, 0, 2, 1, 2, 0.047, 30, NULL, '2020-11-17 16:16:30', NULL, NULL),
(35, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 99.640, 99.940, 6, 2, NULL, NULL, 6, 1, 0, 3, 0, 2, 1, 2, 0.047, 30, NULL, '2020-11-17 16:16:30', NULL, NULL),
(36, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 99.740, 100.040, 6, 2, NULL, NULL, 6, 2, 1, 3, 0, 2, 1, 4, 0.094, 574, NULL, '2020-11-17 16:16:30', NULL, NULL),
(37, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 99.840, 100.140, 6, 2, NULL, NULL, 6, 1, 1, 0, 0, 0, 0, 2, 0.047, 544, NULL, '2020-11-17 16:16:30', NULL, NULL),
(38, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 99.940, 100.240, 2, 2, NULL, NULL, 6, 1, 1, 0, 0, 0, 0, 2, 0.047, 544, NULL, '2020-11-17 16:16:30', NULL, NULL),
(39, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '3', NULL, 1, 3, 107.202, 107.502, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, 0.035, 30, NULL, '2020-11-17 16:16:30', NULL, NULL),
(40, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '3', NULL, 1, 3, 107.302, 107.602, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, 0.035, 30, NULL, '2020-11-17 16:16:30', NULL, NULL),
(41, 1, 'Traditional Screening-SW-SW_Route77-01/01/2016-12/31/2018 - Lithin km - 11/17/2020', '1', '2016-01-01', '2018-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '3', NULL, 1, 3, 107.402, 107.702, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, 0.035, 30, NULL, '2020-11-17 16:16:30', NULL, NULL),
(42, 1, 'Traditional Screening-SR-64_Kan_11_18_2020-01/01/2016-12/31/2018 - Lithin km - 11/19/2020', '1', '2016-01-01', '2018-12-31', 'Simple Ranking', 1.000, 0.000, 0.000, '1', NULL, 1, 1, 46.390, 47.390, 2, 2, NULL, NULL, 5, 2, 1, 1, 0, 0, 1, 4, 0.023, 552, NULL, '2020-11-18 20:31:43', NULL, NULL),
(43, 1, 'Traditional Screening-SR-64_Kan_11_18_2020-01/01/2016-12/31/2018 - Lithin km - 11/19/2020', '1', '2016-01-01', '2018-12-31', 'Simple Ranking', 1.000, 0.000, 0.000, '1', NULL, 1, 1, 47.390, 48.390, 3, 2, NULL, NULL, 5, 1, 0, 2, 1, 1, 0, 1, 0.011, 41, NULL, '2020-11-18 20:31:43', NULL, NULL),
(44, 1, 'Traditional Screening-SR-64_Kan_11_18_2020-01/01/2016-12/31/2018 - Lithin km - 11/19/2020', '1', '2016-01-01', '2018-12-31', 'Simple Ranking', 1.000, 0.000, 0.000, '1', NULL, 1, 1, 49.390, 50.390, 3, 2, NULL, NULL, 5, 1, 1, 1, 0, 0, 1, 2, 0.011, 550, NULL, '2020-11-18 20:31:43', NULL, NULL),
(45, 1, 'Traditional Screening-SR-64_Kan_11_18_2020-01/01/2016-12/31/2018 - Lithin km - 11/19/2020', '1', '2016-01-01', '2018-12-31', 'Simple Ranking', 1.000, 0.000, 0.000, '1', NULL, 1, 1, 56.390, 57.390, 3, 2, NULL, NULL, 5, 2, 0, 8, 0, 5, 3, 4, 0.023, 77, NULL, '2020-11-18 20:31:43', NULL, NULL),
(46, 1, 'Traditional Screening-SR-64_Kan_11_18_2020-01/01/2016-12/31/2018 - Lithin km - 11/19/2020', '1', '2016-01-01', '2018-12-31', 'Simple Ranking', 1.000, 0.000, 0.000, '1', NULL, 1, 1, 57.390, 58.390, 6, 2, NULL, NULL, 5, 23, 8, 40, 7, 13, 20, 43, 0.263, 4845, NULL, '2020-11-18 20:31:43', NULL, NULL),
(47, 1, 'Traditional Screening-SR-64_Kan_11_18_2020-01/01/2016-12/31/2018 - Lithin km - 11/19/2020', '1', '2016-01-01', '2018-12-31', 'Simple Ranking', 1.000, 0.000, 0.000, '1', NULL, 1, 1, 58.390, 58.780, 6, 2, NULL, NULL, 5, 1, 0, 0, 0, 0, 0, 2, 0.029, 2, NULL, '2020-11-18 20:31:43', NULL, NULL),
(48, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 95.740, 96.040, 3, 2, NULL, NULL, 6, 2, 0, 5, 0, 2, 3, 3, 0.056, 43, NULL, '2020-11-18 20:33:19', NULL, NULL),
(49, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 95.840, 96.140, 3, 2, NULL, NULL, 6, 2, 0, 5, 0, 2, 3, 3, 0.056, 43, NULL, '2020-11-18 20:33:19', NULL, NULL),
(50, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 95.940, 96.240, 3, 2, NULL, NULL, 6, 2, 0, 5, 0, 2, 3, 3, 0.056, 43, NULL, '2020-11-18 20:33:19', NULL, NULL),
(51, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 96.240, 96.540, 3, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, 0.028, 7, NULL, '2020-11-18 20:33:19', NULL, NULL),
(52, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 96.340, 96.640, 3, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, 0.028, 7, NULL, '2020-11-18 20:33:19', NULL, NULL),
(53, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 96.440, 96.740, 3, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, 0.028, 7, NULL, '2020-11-18 20:33:19', NULL, NULL),
(54, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 96.740, 97.040, 2, 2, NULL, NULL, 6, 1, 0, 0, 0, 0, 0, 1, 0.028, 1, NULL, '2020-11-18 20:33:19', NULL, NULL),
(55, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 96.840, 97.140, 2, 2, NULL, NULL, 6, 1, 0, 0, 0, 0, 0, 1, 0.028, 1, NULL, '2020-11-18 20:33:19', NULL, NULL),
(56, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 96.940, 97.240, 2, 2, NULL, NULL, 6, 1, 0, 0, 0, 0, 0, 1, 0.028, 1, NULL, '2020-11-18 20:33:19', NULL, NULL),
(57, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 97.740, 98.040, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, 0.028, 30, NULL, '2020-11-18 20:33:19', NULL, NULL),
(58, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 97.840, 98.140, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, 0.028, 30, NULL, '2020-11-18 20:33:19', NULL, NULL),
(59, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 97.940, 98.240, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, 0.028, 30, NULL, '2020-11-18 20:33:19', NULL, NULL),
(60, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.040, 98.340, 3, 2, NULL, NULL, 6, 1, 0, 0, 0, 0, 0, 1, 0.028, 1, NULL, '2020-11-18 20:33:19', NULL, NULL),
(61, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.140, 98.440, 3, 2, NULL, NULL, 6, 2, 1, 0, 0, 0, 0, 2, 0.056, 544, NULL, '2020-11-18 20:33:19', NULL, NULL),
(62, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.240, 98.540, 3, 2, NULL, NULL, 6, 2, 1, 0, 0, 0, 0, 2, 0.056, 544, NULL, '2020-11-18 20:33:19', NULL, NULL),
(63, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.340, 98.640, 3, 2, NULL, NULL, 6, 1, 1, 0, 0, 0, 0, 1, 0.028, 543, NULL, '2020-11-18 20:33:19', NULL, NULL),
(64, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.740, 99.040, 3, 2, NULL, NULL, 6, 2, 2, 0, 0, 0, 0, 2, 0.056, 1086, NULL, '2020-11-18 20:33:19', NULL, NULL),
(65, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.840, 99.140, 3, 2, NULL, NULL, 6, 2, 2, 0, 0, 0, 0, 2, 0.056, 1086, NULL, '2020-11-18 20:33:19', NULL, NULL),
(66, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 98.940, 99.240, 3, 2, NULL, NULL, 6, 2, 2, 0, 0, 0, 0, 2, 0.056, 1086, NULL, '2020-11-18 20:33:19', NULL, NULL),
(67, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 99.540, 99.840, 3, 2, NULL, NULL, 6, 1, 0, 3, 0, 2, 1, 2, 0.028, 30, NULL, '2020-11-18 20:33:19', NULL, NULL),
(68, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 99.640, 99.940, 6, 2, NULL, NULL, 6, 2, 0, 4, 0, 2, 2, 3, 0.056, 37, NULL, '2020-11-18 20:33:19', NULL, NULL),
(69, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 99.740, 100.040, 6, 2, NULL, NULL, 6, 6, 1, 11, 0, 7, 4, 9, 0.169, 652, NULL, '2020-11-18 20:33:19', NULL, NULL),
(70, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 99.840, 100.140, 6, 2, NULL, NULL, 6, 5, 1, 8, 0, 5, 3, 7, 0.141, 622, NULL, '2020-11-18 20:33:19', NULL, NULL),
(71, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 99.940, 100.240, 2, 2, NULL, NULL, 6, 4, 1, 7, 0, 5, 2, 6, 0.113, 615, NULL, '2020-11-18 20:33:19', NULL, NULL),
(72, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 100.540, 100.840, 6, 2, NULL, NULL, 6, 4, 5, 4, 1, 2, 1, 5, 0.113, 2772, NULL, '2020-11-18 20:33:19', NULL, NULL),
(73, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 100.640, 100.940, 6, 2, NULL, NULL, 6, 4, 5, 4, 1, 2, 1, 5, 0.113, 2772, NULL, '2020-11-18 20:33:19', NULL, NULL),
(74, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 100.740, 101.040, 6, 2, NULL, NULL, 6, 6, 6, 6, 1, 4, 1, 7, 0.169, 3338, NULL, '2020-11-18 20:33:19', NULL, NULL),
(75, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 100.840, 101.140, 2, 4, NULL, NULL, 6, 2, 1, 2, 0, 2, 0, 2, 0.056, 566, NULL, '2020-11-18 20:33:19', NULL, NULL),
(76, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 100.940, 101.240, 2, 4, NULL, NULL, 6, 2, 1, 2, 0, 2, 0, 2, 0.056, 566, NULL, '2020-11-18 20:33:19', NULL, NULL),
(77, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 101.740, 102.040, 6, 2, NULL, NULL, 6, 2, 0, 4, 0, 3, 1, 3, 0.056, 42, NULL, '2020-11-18 20:33:19', NULL, NULL),
(78, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 101.840, 102.140, 6, 2, NULL, NULL, 6, 2, 0, 4, 0, 3, 1, 3, 0.056, 42, NULL, '2020-11-18 20:33:19', NULL, NULL),
(79, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '2', NULL, 1, 2, 101.940, 102.240, 6, 2, NULL, NULL, 6, 2, 0, 4, 0, 3, 1, 3, 0.056, 42, NULL, '2020-11-18 20:33:19', NULL, NULL),
(80, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '3', NULL, 1, 3, 107.202, 107.502, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, 0.021, 30, NULL, '2020-11-18 20:33:19', NULL, NULL),
(81, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '3', NULL, 1, 3, 107.302, 107.602, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, 0.021, 30, NULL, '2020-11-18 20:33:19', NULL, NULL),
(82, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '3', NULL, 1, 3, 107.402, 107.702, 3, 2, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 1, 0.021, 30, NULL, '2020-11-18 20:33:19', NULL, NULL),
(83, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '3', NULL, 1, 3, 113.702, 114.002, 6, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, 0.021, 7, NULL, '2020-11-18 20:33:19', NULL, NULL),
(84, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '3', NULL, 1, 3, 113.802, 114.102, 6, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, 0.021, 7, NULL, '2020-11-18 20:33:19', NULL, NULL),
(85, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '3', NULL, 1, 3, 113.902, 114.202, 6, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, 0.021, 7, NULL, '2020-11-18 20:33:19', NULL, NULL),
(86, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '3', NULL, 1, 3, 116.202, 116.502, 2, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, 0.021, 7, NULL, '2020-11-18 20:33:19', NULL, NULL),
(87, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '3', NULL, 1, 3, 116.302, 116.602, 2, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, 0.021, 7, NULL, '2020-11-18 20:33:19', NULL, NULL),
(88, 1, 'Traditional Screening-SW-77_UM_11_18_2020-01/01/2016-12/31/2020 - Lithin km - 11/19/2020', '1', '2016-01-01', '2020-12-31', 'Sliding Window', 0.000, 0.300, 0.100, '3', NULL, 1, 3, 116.402, 116.702, 2, 2, NULL, NULL, 6, 1, 0, 1, 0, 0, 1, 1, 0.021, 7, NULL, '2020-11-18 20:33:19', NULL, NULL),
(89, 1, 'Traditional Screening-SR-Replace_Test1-01/01/2016-12/01/2020 - Lithin km - 12/01/2020', '1', '2016-01-01', '2020-12-01', 'Simple Ranking', 2.000, 0.000, 0.000, '35', NULL, NULL, 35, 21.850, 23.850, NULL, NULL, NULL, NULL, 7, 1, 0, 0, 0, 0, 0, 2, 0.013, 2, NULL, '2020-12-01 10:02:21', NULL, NULL),
(90, 1, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-03', '2020-12-05', 'Sliding Window', 0.000, 0.500, 0.300, '40', NULL, 4, 40, 0.900, 1.400, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.058, 1, NULL, '2020-12-05 10:21:23', NULL, NULL),
(91, 1, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-03', '2020-12-05', 'Sliding Window', 0.000, 0.500, 0.300, '40', NULL, 4, 40, 2.100, 2.600, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, 0.058, 572, NULL, '2020-12-05 10:21:23', NULL, NULL),
(92, 1, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-03', '2020-12-05', 'Sliding Window', 0.000, 0.500, 0.300, '40', NULL, 4, 40, 3.900, 4.400, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, 0.058, 40, NULL, '2020-12-05 10:21:23', NULL, NULL),
(93, 1, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-03', '2020-12-05', 'Sliding Window', 0.000, 0.500, 0.300, '40', NULL, 4, 40, 4.200, 4.700, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, 0.058, 40, NULL, '2020-12-05 10:21:23', NULL, NULL),
(94, 1, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-03', '2020-12-05', 'Sliding Window', 0.000, 0.500, 0.300, '41', NULL, 4, 41, 6.910, 7.410, 2, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 2, 0.065, 8, NULL, '2020-12-05 10:21:23', NULL, NULL),
(95, 1, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-03', '2020-12-05', 'Sliding Window', 0.000, 0.500, 0.300, '41', NULL, 4, 41, 10.510, 11.010, 3, NULL, NULL, NULL, 8, 1, 2, 0, 0, 0, 0, 0, 0.065, 1084, NULL, '2020-12-05 10:21:23', NULL, NULL),
(96, 1, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-03', '2020-12-05', 'Sliding Window', 0.000, 0.500, 0.300, '41', NULL, 4, 41, 10.810, 11.310, 3, NULL, NULL, NULL, 8, 1, 2, 0, 0, 0, 0, 0, 0.065, 1084, NULL, '2020-12-05 10:21:23', NULL, NULL),
(97, 1, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-03', '2020-12-05', 'Sliding Window', 0.000, 0.500, 0.300, '41', NULL, 4, 41, 11.410, 11.760, 6, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 0, 3, 0.093, 3, NULL, '2020-12-05 10:21:23', NULL, NULL),
(98, 1, 'Traditional Screening-SW-Dec_Test2-12/03/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-03', '2020-12-05', 'Sliding Window', 0.000, 0.500, 0.300, '41', NULL, 4, 41, 11.710, 11.760, 6, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 0, 3, 0.653, 3, NULL, '2020-12-05 10:21:23', NULL, NULL),
(99, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '32', NULL, 3, 32, 0.000, 1.000, 6, 2, NULL, NULL, 8, 2, 1, 0, 0, 0, 0, 2, 0.039, 544, NULL, '2020-12-05 16:09:29', NULL, NULL),
(100, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '32', NULL, 3, 32, 1.000, 2.000, 6, 2, NULL, NULL, 8, 3, 0, 5, 0, 2, 3, 4, 0.058, 44, NULL, '2020-12-05 16:09:29', NULL, NULL),
(101, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '32', NULL, 3, 32, 2.000, 3.000, 2, 3, NULL, NULL, 8, 3, 1, 7, 1, 4, 2, 4, 0.058, 631, NULL, '2020-12-05 16:09:29', NULL, NULL),
(102, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '32', NULL, 3, 32, 3.000, 4.000, 6, 3, NULL, NULL, 8, 2, 0, 1, 0, 0, 1, 2, 0.039, 8, NULL, '2020-12-05 16:09:29', NULL, NULL),
(103, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '32', NULL, 3, 32, 4.000, 5.000, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, 0.019, 543, NULL, '2020-12-05 16:09:29', NULL, NULL),
(104, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '32', NULL, 3, 32, 5.000, 6.000, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 2, 0.019, 544, NULL, '2020-12-05 16:09:29', NULL, NULL),
(105, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '33', NULL, 3, 33, 9.564, 10.564, 3, 2, NULL, NULL, 8, 1, 0, 4, 0, 2, 2, 2, 0.019, 36, NULL, '2020-12-05 16:09:29', NULL, NULL),
(106, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '33', NULL, 3, 33, 11.564, 12.564, 6, 2, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 1, 0.019, 7, NULL, '2020-12-05 16:09:29', NULL, NULL),
(107, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '33', NULL, 3, 33, 12.564, 13.564, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, 0.019, 543, NULL, '2020-12-05 16:09:29', NULL, NULL),
(108, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '33', NULL, 3, 33, 13.564, 14.564, 3, 2, NULL, NULL, 8, 1, 0, 3, 0, 2, 1, 2, NULL, 30, NULL, '2020-12-05 16:09:29', NULL, NULL),
(109, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '33', NULL, 3, 33, 16.564, 17.564, 2, 4, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.023, 1, NULL, '2020-12-05 16:09:29', NULL, NULL),
(110, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '33', NULL, 3, 33, 18.564, 19.564, 6, 2, NULL, NULL, 8, 3, 3, 6, 2, 4, 0, 4, 0.07, 1732, NULL, '2020-12-05 16:09:29', NULL, NULL),
(111, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '34', NULL, 3, 34, 21.200, 22.200, 2, 4, NULL, NULL, 8, 2, 1, 1, 0, 1, 0, 2, 0.049, 555, NULL, '2020-12-05 16:09:29', NULL, NULL),
(112, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '34', NULL, 3, 34, 27.200, 28.200, 2, 3, NULL, NULL, 8, 3, 0, 3, 0, 1, 2, 3, 0.073, 26, NULL, '2020-12-05 16:09:29', NULL, NULL),
(113, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '34', NULL, 3, 34, 28.200, 28.440, 6, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, 0.102, 543, NULL, '2020-12-05 16:09:29', NULL, NULL),
(114, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '40', NULL, 4, 40, 1.000, 2.000, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.025, 1, NULL, '2020-12-05 16:09:29', NULL, NULL),
(115, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '40', NULL, 4, 40, 2.000, 3.000, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, 0.025, 572, NULL, '2020-12-05 16:09:29', NULL, NULL),
(116, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '40', NULL, 4, 40, 4.000, 5.000, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, 0.025, 40, NULL, '2020-12-05 16:09:29', NULL, NULL),
(117, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '41', NULL, 4, 41, 6.910, 7.910, 2, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 2, 0.028, 8, NULL, '2020-12-05 16:09:29', NULL, NULL),
(118, 1, 'Traditional Screening-SR-o-01/01/2015-11/30/2020 - Lithin km - 12/05/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '41', NULL, 4, 41, 10.910, 11.760, 3, NULL, NULL, NULL, 8, 2, 2, 1, 0, 0, 0, 3, 0.065, 1087, NULL, '2020-12-05 16:09:29', NULL, NULL),
(119, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '40', NULL, 4, 40, 0.600, 1.300, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.042, 1, NULL, '2020-12-05 16:34:45', NULL, NULL),
(120, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '40', NULL, 4, 40, 0.800, 1.500, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.042, 1, NULL, '2020-12-05 16:34:45', NULL, NULL),
(121, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '40', NULL, 4, 40, 1.000, 1.700, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.042, 1, NULL, '2020-12-05 16:34:45', NULL, NULL),
(122, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '40', NULL, 4, 40, 1.800, 2.500, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, 0.042, 572, NULL, '2020-12-05 16:34:45', NULL, NULL),
(123, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '40', NULL, 4, 40, 2.000, 2.700, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, 0.042, 572, NULL, '2020-12-05 16:34:45', NULL, NULL),
(124, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '40', NULL, 4, 40, 2.200, 2.900, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, 0.042, 572, NULL, '2020-12-05 16:34:45', NULL, NULL),
(125, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '40', NULL, 4, 40, 3.600, 4.300, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, 0.042, 40, NULL, '2020-12-05 16:34:45', NULL, NULL),
(126, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '40', NULL, 4, 40, 3.800, 4.500, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, 0.042, 40, NULL, '2020-12-05 16:34:45', NULL, NULL),
(127, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '40', NULL, 4, 40, 4.000, 4.700, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, 0.042, 40, NULL, '2020-12-05 16:34:45', NULL, NULL),
(128, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '40', NULL, 4, 40, 4.200, 4.900, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, 0.042, 40, NULL, '2020-12-05 16:34:45', NULL, NULL),
(129, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '41', NULL, 4, 41, 6.910, 7.610, 2, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 2, 0.047, 8, NULL, '2020-12-05 16:34:45', NULL, NULL),
(130, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '41', NULL, 4, 41, 10.310, 11.010, 3, NULL, NULL, NULL, 8, 1, 2, 0, 0, 0, 0, 0, 0.047, 1084, NULL, '2020-12-05 16:34:45', NULL, NULL),
(131, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '41', NULL, 4, 41, 10.510, 11.210, 3, NULL, NULL, NULL, 8, 1, 2, 0, 0, 0, 0, 0, 0.047, 1084, NULL, '2020-12-05 16:34:45', NULL, NULL),
(132, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '41', NULL, 4, 41, 10.710, 11.410, 3, NULL, NULL, NULL, 8, 1, 2, 0, 0, 0, 0, 0, 0.047, 1084, NULL, '2020-12-05 16:34:45', NULL, NULL),
(133, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '41', NULL, 4, 41, 10.910, 11.610, 3, NULL, NULL, NULL, 8, 1, 2, 0, 0, 0, 0, 0, 0.047, 1084, NULL, '2020-12-05 16:34:45', NULL, NULL),
(134, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '41', NULL, 4, 41, 11.110, 11.760, 6, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 0, 3, 0.05, 3, NULL, '2020-12-05 16:34:45', NULL, NULL),
(135, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '41', NULL, 4, 41, 11.310, 11.760, 6, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 0, 3, 0.073, 3, NULL, '2020-12-05 16:34:45', NULL, NULL),
(136, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '41', NULL, 4, 41, 11.510, 11.760, 6, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 0, 3, 0.131, 3, NULL, '2020-12-05 16:34:45', NULL, NULL),
(137, 1, 'Traditional Screening-SW-Ash_test-12/05/2015-12/05/2020 - Lithin km - 12/05/2020', '1', '2015-12-05', '2020-12-05', 'Sliding Window', 0.000, 0.700, 0.200, '41', NULL, 4, 41, 11.710, 11.760, 6, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 0, 3, 0.653, 3, NULL, '2020-12-05 16:34:45', NULL, NULL),
(138, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '36', NULL, 2, 36, 1.000, 2.000, 2, 4, NULL, NULL, 6, 1, 0, 1, 1, 0, 0, 0, 0.01, 29, NULL, '2020-12-06 04:35:30', NULL, NULL),
(139, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '36', NULL, 2, 36, 2.000, 2.532, 2, 2, NULL, NULL, 6, 2, 0, 0, 0, 0, 0, 3, 0.038, 3, NULL, '2020-12-06 04:35:30', NULL, NULL),
(140, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 2.532, 3.532, 2, 2, NULL, NULL, 6, 5, 0, 9, 0, 3, 6, 2, 0.051, 71, NULL, '2020-12-06 04:35:30', NULL, NULL),
(141, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 3.532, 4.532, 2, 2, NULL, NULL, 6, 5, 0, 4, 2, 1, 1, 3, 0.051, 78, NULL, '2020-12-06 04:35:30', NULL, NULL),
(142, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 4.532, 5.532, 6, 2, NULL, NULL, 6, 5, 0, 3, 1, 0, 2, 5, 0.051, 46, NULL, '2020-12-06 04:35:30', NULL, NULL),
(143, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 5.532, 6.532, 2, 2, NULL, NULL, 6, 4, 0, 6, 0, 3, 3, 7, 0.041, 58, NULL, '2020-12-06 04:35:30', NULL, NULL),
(144, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 6.532, 7.532, 2, 2, NULL, NULL, 6, 2, 0, 1, 0, 0, 1, 1, 0.02, 7, NULL, '2020-12-06 04:35:30', NULL, NULL),
(145, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 7.532, 8.532, 6, 2, NULL, NULL, 6, 7, 0, 9, 3, 2, 4, 5, 0.071, 138, NULL, '2020-12-06 04:35:30', NULL, NULL),
(146, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 8.532, 9.532, 2, 2, NULL, NULL, 6, 4, 1, 5, 1, 3, 1, 3, 0.041, 613, NULL, '2020-12-06 04:35:30', NULL, NULL),
(147, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 9.532, 10.532, 2, 2, NULL, NULL, 6, 7, 0, 4, 0, 1, 3, 7, 0.071, 36, NULL, '2020-12-06 04:35:30', NULL, NULL),
(148, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 10.532, 11.532, 3, 2, NULL, NULL, 6, 6, 0, 7, 4, 1, 2, 4, 0.061, 143, NULL, '2020-12-06 04:35:30', NULL, NULL),
(149, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 11.532, 12.532, 3, 2, NULL, NULL, 6, 6, 0, 3, 1, 0, 2, 4, 0.061, 45, NULL, '2020-12-06 04:35:30', NULL, NULL),
(150, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 12.532, 13.532, 3, 2, NULL, NULL, 6, 29, 0, 33, 4, 11, 18, 25, 0.294, 370, NULL, '2020-12-06 04:35:30', NULL, NULL),
(151, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 13.532, 14.532, 3, 2, NULL, NULL, 6, 22, 0, 10, 0, 6, 4, 26, 0.223, 116, NULL, '2020-12-06 04:35:30', NULL, NULL),
(152, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 14.532, 15.532, 3, 2, NULL, NULL, 6, 15, 0, 18, 5, 5, 8, 15, 0.152, 263, NULL, '2020-12-06 04:35:30', NULL, NULL),
(153, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 15.532, 16.532, 2, 2, NULL, NULL, 6, 39, 0, 30, 1, 13, 16, 45, 0.395, 313, NULL, '2020-12-06 04:35:30', NULL, NULL),
(154, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '37', NULL, 2, 37, 16.532, 17.532, 3, 2, NULL, NULL, 6, 18, 0, 17, 3, 6, 8, 12, 0.182, 213, NULL, '2020-12-06 04:35:30', NULL, NULL),
(155, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '38', NULL, 2, 38, 0.000, 1.000, 2, 2, NULL, NULL, 7, 1, 0, 0, 0, 0, 0, 2, 0.01, 2, NULL, '2020-12-06 04:35:30', NULL, NULL),
(156, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '38', NULL, 2, 38, 1.000, 2.000, 6, 2, NULL, NULL, 7, 2, 1, 5, 1, 3, 1, 4, 0.02, 614, NULL, '2020-12-06 04:35:30', NULL, NULL),
(157, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '38', NULL, 2, 38, 2.000, 2.520, 2, 2, NULL, NULL, 7, 3, 4, 7, 2, 3, 2, 6, 0.057, 2277, NULL, '2020-12-06 04:35:30', NULL, NULL),
(158, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 2.520, 3.520, 3, 2, NULL, NULL, 7, 1, 0, 2, 1, 1, 0, 1, 0.01, 41, NULL, '2020-12-06 04:35:30', NULL, NULL),
(159, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 3.520, 4.520, 3, 2, NULL, NULL, 7, 2, 0, 2, 0, 0, 2, 4, 0.02, 16, NULL, '2020-12-06 04:35:30', NULL, NULL),
(160, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 4.520, 5.520, 3, 2, NULL, NULL, 7, 2, 1, 2, 0, 0, 2, 4, 0.02, 558, NULL, '2020-12-06 04:35:30', NULL, NULL),
(161, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 5.520, 6.520, 6, 2, NULL, NULL, 7, 2, 1, 1, 0, 0, 1, 4, 0.02, 552, NULL, '2020-12-06 04:35:30', NULL, NULL),
(162, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 6.520, 7.520, 2, 2, NULL, NULL, 7, 2, 1, 6, 0, 4, 2, 5, 0.02, 603, NULL, '2020-12-06 04:35:30', NULL, NULL),
(163, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 7.520, 8.520, 2, 2, NULL, NULL, 7, 3, 0, 5, 2, 2, 1, 4, 0.03, 90, NULL, '2020-12-06 04:35:30', NULL, NULL),
(164, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 8.520, 9.520, 6, 2, NULL, NULL, 7, 2, 0, 3, 0, 0, 3, 3, 0.02, 21, NULL, '2020-12-06 04:35:30', NULL, NULL),
(165, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 9.520, 10.520, 2, 3, NULL, NULL, 7, 2, 1, 3, 0, 1, 2, 3, 0.02, 568, NULL, '2020-12-06 04:35:30', NULL, NULL),
(166, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 10.520, 11.520, 3, 2, NULL, NULL, 7, 3, 1, 2, 0, 0, 2, 5, 0.03, 559, NULL, '2020-12-06 04:35:30', NULL, NULL),
(167, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 11.520, 12.520, 3, 2, NULL, NULL, 7, 2, 1, 4, 0, 2, 2, 4, 0.02, 580, NULL, '2020-12-06 04:35:30', NULL, NULL),
(168, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 12.520, 13.520, 3, 2, NULL, NULL, 7, 2, 0, 9, 3, 3, 3, 4, 0.02, 142, NULL, '2020-12-06 04:35:30', NULL, NULL);
INSERT INTO `t_screenings` (`id`, `user`, `name`, `status`, `start_date`, `end_date`, `screening_method`, `max_segment_length`, `window_length`, `slide_length`, `route_filter`, `additional_filter`, `highway_class`, `route`, `start_mp`, `end_mp`, `collision_type`, `light_condition`, `intersection_type`, `interchange_junction_type`, `route_direction`, `crash_count`, `no_of_fatalities`, `no_of_injuries`, `no_of_typea`, `no_of_typeb`, `no_of_typec`, `no_of_pdo`, `crash_rate_aadt`, `epdo`, `geometry`, `created_at`, `updated_at`, `deleted_at`) VALUES
(169, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 13.520, 14.520, 6, 2, NULL, NULL, 7, 2, 0, 1, 0, 0, 1, 3, 0.02, 9, NULL, '2020-12-06 04:35:30', NULL, NULL),
(170, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 14.520, 15.520, 6, 2, NULL, NULL, 7, 2, 1, 2, 0, 0, 2, 3, 0.02, 557, NULL, '2020-12-06 04:35:30', NULL, NULL),
(171, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 15.520, 16.520, 2, 4, NULL, NULL, 7, 2, 1, 0, 0, 0, 0, 4, 0.02, 546, NULL, '2020-12-06 04:35:30', NULL, NULL),
(172, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 16.520, 17.520, 3, 4, NULL, NULL, 7, 1, 0, 5, 0, 2, 3, 2, 0.01, 42, NULL, '2020-12-06 04:35:30', NULL, NULL),
(173, 1, 'Traditional Screening-SR-h-01/01/2015-11/30/2020 - Lithin km - 12/06/2020', '1', '2015-01-01', '2020-11-30', 'Simple Ranking', 1.000, 0.000, 0.000, '39', NULL, 2, 39, 17.520, 17.840, 3, 2, NULL, NULL, 7, 2, 1, 1, 1, 0, 0, 2, 0.062, 573, NULL, '2020-12-06 04:35:30', NULL, NULL),
(174, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 0.200, 0.500, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.055, 1, NULL, '2020-12-08 17:10:45', NULL, NULL),
(175, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 0.300, 0.600, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.055, 1, NULL, '2020-12-08 17:10:45', NULL, NULL),
(176, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 0.400, 0.700, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.055, 1, NULL, '2020-12-08 17:10:45', NULL, NULL),
(177, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 0.600, 0.900, 2, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, 0.055, 543, NULL, '2020-12-08 17:10:45', NULL, NULL),
(178, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 0.700, 1.000, 2, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, 0.055, 543, NULL, '2020-12-08 17:10:45', NULL, NULL),
(179, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 0.800, 1.100, 2, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, 0.055, 543, NULL, '2020-12-08 17:10:45', NULL, NULL),
(180, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 1.000, 1.300, 6, 2, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 1, 0.055, 7, NULL, '2020-12-08 17:10:45', NULL, NULL),
(181, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 1.100, 1.400, 6, 2, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 1, 0.055, 7, NULL, '2020-12-08 17:10:45', NULL, NULL),
(182, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 1.200, 1.500, 6, 2, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 1, 0.055, 7, NULL, '2020-12-08 17:10:45', NULL, NULL),
(183, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 1.300, 1.600, 2, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.055, 1, NULL, '2020-12-08 17:10:45', NULL, NULL),
(184, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 1.400, 1.700, 2, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.055, 1, NULL, '2020-12-08 17:10:45', NULL, NULL),
(185, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 1.500, 1.800, 2, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.055, 1, NULL, '2020-12-08 17:10:45', NULL, NULL),
(186, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 1.600, 1.900, 2, 2, NULL, NULL, 8, 1, 0, 4, 0, 2, 2, 2, 0.055, 36, NULL, '2020-12-08 17:10:45', NULL, NULL),
(187, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 1.700, 2.000, 2, 2, NULL, NULL, 8, 1, 0, 4, 0, 2, 2, 2, 0.055, 36, NULL, '2020-12-08 17:10:45', NULL, NULL),
(188, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 1.800, 2.100, 2, 2, NULL, NULL, 8, 1, 0, 4, 0, 2, 2, 2, 0.055, 36, NULL, '2020-12-08 17:10:45', NULL, NULL),
(189, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 1.900, 2.200, 2, 3, NULL, NULL, 8, 1, 1, 2, 0, 1, 1, 1, 0.055, 560, NULL, '2020-12-08 17:10:45', NULL, NULL),
(190, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 2.000, 2.300, 2, 3, NULL, NULL, 8, 1, 1, 2, 0, 1, 1, 1, 0.055, 560, NULL, '2020-12-08 17:10:45', NULL, NULL),
(191, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 2.100, 2.400, 2, 3, NULL, NULL, 8, 1, 1, 2, 0, 1, 1, 1, 0.055, 560, NULL, '2020-12-08 17:10:45', NULL, NULL),
(192, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 2.200, 2.500, 6, 2, NULL, NULL, 8, 1, 0, 4, 0, 3, 1, 2, 0.055, 41, NULL, '2020-12-08 17:10:45', NULL, NULL),
(193, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 2.300, 2.600, 6, 2, NULL, NULL, 8, 1, 0, 4, 0, 3, 1, 2, 0.055, 41, NULL, '2020-12-08 17:10:45', NULL, NULL),
(194, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 2.400, 2.700, 6, 2, NULL, NULL, 8, 2, 0, 5, 1, 3, 1, 3, 0.11, 71, NULL, '2020-12-08 17:10:45', NULL, NULL),
(195, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 2.500, 2.800, 3, 2, NULL, NULL, 8, 1, 0, 1, 1, 0, 0, 1, 0.055, 30, NULL, '2020-12-08 17:10:45', NULL, NULL),
(196, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 2.600, 2.900, 3, 2, NULL, NULL, 8, 1, 0, 1, 1, 0, 0, 1, 0.055, 30, NULL, '2020-12-08 17:10:45', NULL, NULL),
(197, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 2.800, 3.100, 6, 3, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.055, 1, NULL, '2020-12-08 17:10:45', NULL, NULL),
(198, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 2.900, 3.200, 6, 3, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.055, 1, NULL, '2020-12-08 17:10:45', NULL, NULL),
(199, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 3.000, 3.300, 6, 3, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.055, 1, NULL, '2020-12-08 17:10:45', NULL, NULL),
(200, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 3.200, 3.500, 2, 2, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 1, 0.055, 7, NULL, '2020-12-08 17:10:45', NULL, NULL),
(201, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 3.300, 3.600, 2, 2, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 1, 0.055, 7, NULL, '2020-12-08 17:10:45', NULL, NULL),
(202, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 3.400, 3.700, 2, 2, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 1, 0.055, 7, NULL, '2020-12-08 17:10:45', NULL, NULL),
(203, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 4.000, 4.300, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, 0.055, 543, NULL, '2020-12-08 17:10:45', NULL, NULL),
(204, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 4.100, 4.400, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, 0.055, 543, NULL, '2020-12-08 17:10:45', NULL, NULL),
(205, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 4.200, 4.500, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, 0.055, 543, NULL, '2020-12-08 17:10:45', NULL, NULL),
(206, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 4.800, 5.100, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 2, 0.055, 544, NULL, '2020-12-08 17:10:45', NULL, NULL),
(207, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 4.900, 5.200, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 2, 0.055, 544, NULL, '2020-12-08 17:10:45', NULL, NULL),
(208, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '32', NULL, 3, 32, 5.000, 5.300, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 2, 0.055, 544, NULL, '2020-12-08 17:10:45', NULL, NULL),
(209, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 9.764, 10.064, 3, 2, NULL, NULL, 8, 1, 0, 4, 0, 2, 2, 2, 0.055, 36, NULL, '2020-12-08 17:10:45', NULL, NULL),
(210, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 9.864, 10.164, 3, 2, NULL, NULL, 8, 1, 0, 4, 0, 2, 2, 2, 0.055, 36, NULL, '2020-12-08 17:10:45', NULL, NULL),
(211, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 9.964, 10.264, 3, 2, NULL, NULL, 8, 1, 0, 4, 0, 2, 2, 2, 0.055, 36, NULL, '2020-12-08 17:10:45', NULL, NULL),
(212, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 11.764, 12.064, 6, 2, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 1, 0.055, 7, NULL, '2020-12-08 17:10:45', NULL, NULL),
(213, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 11.864, 12.164, 6, 2, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 1, 0.055, 7, NULL, '2020-12-08 17:10:45', NULL, NULL),
(214, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 11.964, 12.264, 6, 2, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 1, 0.055, 7, NULL, '2020-12-08 17:10:45', NULL, NULL),
(215, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 12.764, 13.064, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, 0.055, 543, NULL, '2020-12-08 17:10:45', NULL, NULL),
(216, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 12.864, 13.164, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, 0.055, 543, NULL, '2020-12-08 17:10:45', NULL, NULL),
(217, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 12.964, 13.264, 3, 2, NULL, NULL, 8, 1, 1, 0, 0, 0, 0, 1, 0.055, 543, NULL, '2020-12-08 17:10:45', NULL, NULL),
(218, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 14.064, 14.364, 3, 2, NULL, NULL, 8, 1, 0, 3, 0, 2, 1, 2, 0.066, 30, NULL, '2020-12-08 17:10:45', NULL, NULL),
(219, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 14.164, 14.464, 3, 2, NULL, NULL, 8, 1, 0, 3, 0, 2, 1, 2, 0.066, 30, NULL, '2020-12-08 17:10:45', NULL, NULL),
(220, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 14.264, 14.564, 3, 2, NULL, NULL, 8, 1, 0, 3, 0, 2, 1, 2, 0.066, 30, NULL, '2020-12-08 17:10:45', NULL, NULL),
(221, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 16.464, 16.764, 2, 4, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.066, 1, NULL, '2020-12-08 17:10:45', NULL, NULL),
(222, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 16.564, 16.864, 2, 4, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.066, 1, NULL, '2020-12-08 17:10:45', NULL, NULL),
(223, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 16.664, 16.964, 2, 4, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.066, 1, NULL, '2020-12-08 17:10:45', NULL, NULL),
(224, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 18.664, 18.964, 6, 2, NULL, NULL, 8, 1, 3, 2, 1, 1, 0, 2, 0.066, 1668, NULL, '2020-12-08 17:10:45', NULL, NULL),
(225, 1, 'Traditional Screening-SW-test-12/18/2013-12/10/2020 - Lithin km - 12/08/2020', '1', '2013-12-18', '2020-12-10', 'Sliding Window', 0.000, 0.300, 0.100, '33', NULL, 3, 33, 18.764, 19.064, 6, 2, NULL, NULL, 8, 1, 3, 2, 1, 1, 0, 2, 0.066, 1668, NULL, '2020-12-08 17:10:45', NULL, NULL),
(226, 1, 'Traditional Screening-SR-Test_Save-12/03/2015-12/09/2020 - Lithin km - 12/09/2020', '1', '2015-12-03', '2020-12-09', 'Simple Ranking', 1.000, 0.000, 0.000, '40', NULL, 4, 40, 1.000, 2.000, 6, 2, NULL, NULL, 8, 1, 0, 0, 0, 0, 0, 1, 0.029, 1, NULL, '2020-12-09 09:45:44', NULL, NULL),
(227, 1, 'Traditional Screening-SR-Test_Save-12/03/2015-12/09/2020 - Lithin km - 12/09/2020', '1', '2015-12-03', '2020-12-09', 'Simple Ranking', 1.000, 0.000, 0.000, '40', NULL, 4, 40, 2.000, 3.000, 6, 2, NULL, NULL, 8, 1, 1, 1, 1, 0, 0, 1, 0.029, 572, NULL, '2020-12-09 09:45:44', NULL, NULL),
(228, 1, 'Traditional Screening-SR-Test_Save-12/03/2015-12/09/2020 - Lithin km - 12/09/2020', '1', '2015-12-03', '2020-12-09', 'Simple Ranking', 1.000, 0.000, 0.000, '40', NULL, 4, 40, 4.000, 5.000, 3, 2, NULL, NULL, 8, 1, 0, 2, 1, 1, 0, 0, 0.029, 40, NULL, '2020-12-09 09:45:44', NULL, NULL),
(229, 1, 'Traditional Screening-SR-Test_Save-12/03/2015-12/09/2020 - Lithin km - 12/09/2020', '1', '2015-12-03', '2020-12-09', 'Simple Ranking', 1.000, 0.000, 0.000, '41', NULL, 4, 41, 6.910, 7.910, 2, NULL, NULL, NULL, 8, 1, 0, 1, 0, 0, 1, 2, 0.033, 8, NULL, '2020-12-09 09:45:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(2, 'Master Users', NULL, '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(3, 'Analyst', NULL, '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(4, 'Screening Users', NULL, '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(5, 'Project Users', NULL, '2020-01-10 07:32:13', '2020-01-10 07:32:13', NULL),
(6, 'DB Admin', 'DB Admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `valid_routes`
--

CREATE TABLE `valid_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_mp` double(19,3) NOT NULL,
  `end_mp` double(19,3) NOT NULL,
  `start_latitude` double DEFAULT NULL,
  `start_longitude` double DEFAULT NULL,
  `end_latitude` double DEFAULT NULL,
  `end_longitude` double DEFAULT NULL,
  `route_direction` bigint(20) UNSIGNED DEFAULT NULL,
  `divided` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geom` geometry DEFAULT NULL,
  `object_id` int(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `valid_routes`
--

INSERT INTO `valid_routes` (`id`, `name`, `start_mp`, `end_mp`, `start_latitude`, `start_longitude`, `end_latitude`, `end_longitude`, `route_direction`, `divided`, `geom`, `object_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '20100640000EB', 45.390, 58.780, 38.2131, -81.66, 38.6264, -84.3806, 5, 'divided', NULL, 40097, '2020-09-07 08:49:28', '2020-10-19 17:33:03', NULL),
(2, '20100770000NB', 95.340, 105.002, 38.251, -82.0553, 38.6103, -81.5595, 6, 'divided', NULL, 40146, '2020-09-07 08:49:28', '2020-10-19 17:33:03', NULL),
(3, '20100770000NB', 105.002, 117.500, 38.6006, -82.0494, 38.7272, -81.9225, 6, 'undivided', NULL, 40147, '2020-09-07 08:49:28', '2020-10-19 17:33:04', NULL),
(4, '20201190000NB', 0.000, 1.120, 38.36, -81.6292, 38.26, -81.7292, 6, 'divided', NULL, 40283, '2020-09-07 08:49:28', '2020-10-19 17:33:04', NULL),
(5, '20201190000NB', 7.091, 17.640, 38.2017, -86.711, 38.9117, -81.1339, 6, 'divided', NULL, 40285, '2020-09-07 08:49:28', '2020-10-19 17:33:04', NULL),
(6, '20201190000NB', 17.820, 22.340, 38.2128, -81.6503, 38.3972, -81.3646, 6, 'undivided', NULL, 40286, '2020-09-07 08:49:28', '2020-10-19 17:33:04', NULL),
(7, '20201190000NB', 25.460, 36.240, 38.3606, -81.6356, 38.4375, -81.4889, 6, 'undivided', NULL, 40288, '2020-09-07 08:49:28', '2020-10-19 17:33:04', NULL),
(8, '20201190000NB', 36.240, 39.973, 38.3692, -810.343, 38.5378, -81.4103, 6, 'divided', NULL, 40289, '2020-09-07 08:49:28', '2020-10-19 17:33:04', NULL),
(9, '18200330000EB', 11.090, 24.760, 38.92937, 38.937223, -81.724363, -81.754441, 5, 'divided', NULL, 39000, '2020-10-26 18:46:00', '2020-10-27 17:58:56', NULL),
(10, '10100770016NB', 52.580, 67.210, NULL, NULL, NULL, NULL, 6, 'divided', NULL, 34748, '2020-10-26 18:47:13', '2020-10-27 17:58:51', NULL),
(11, '20100770016NB', 67.210, 77.980, NULL, NULL, NULL, NULL, 6, 'undivided', NULL, NULL, '2020-10-26 18:47:13', '2020-10-26 18:47:13', NULL),
(12, '28100770016NB', 8.980, 14.010, NULL, NULL, NULL, NULL, 6, 'divided', NULL, NULL, '2020-10-26 18:47:13', '2020-10-26 18:47:13', NULL),
(13, '41100770016NB', 27.260, 52.580, NULL, NULL, NULL, NULL, 6, 'divided', NULL, NULL, '2020-10-26 18:47:13', '2020-10-26 18:47:13', NULL),
(14, '08100790000NB', 36.000, 44.600, 38.586639, 38.615295, -81.109435, -80.978745, 6, 'divided', NULL, 34178, '2020-11-01 13:04:16', '2020-11-01 13:57:10', NULL),
(15, '04100790000NB', 44.600, 83.150, 38.615, 38.904463, -80.97905, -80.60699, 6, 'undivided', NULL, 32120, '2020-11-01 13:04:16', '2020-11-01 13:57:07', NULL),
(32, '2030060000000', 0.000, 7.564, NULL, NULL, NULL, NULL, 8, 'undivided', NULL, NULL, '2020-11-29 19:43:45', '2020-11-29 19:43:45', NULL),
(33, '2030060000000', 7.564, 21.200, NULL, NULL, NULL, NULL, 8, 'undivided', NULL, NULL, '2020-11-29 19:43:45', '2020-11-29 19:43:45', NULL),
(34, '2030060000000', 21.200, 28.440, NULL, NULL, NULL, NULL, 8, 'undivided', NULL, NULL, '2020-11-29 19:43:45', '2020-11-29 19:43:45', NULL),
(35, '20300610000SB', 21.850, 28.403, NULL, NULL, NULL, NULL, 7, 'divided', NULL, 40331, '2020-11-29 19:43:45', '2020-11-29 19:45:22', NULL),
(36, '40200350000NB', 0.000, 2.532, NULL, NULL, NULL, NULL, 6, 'divided', NULL, 52508, '2020-11-29 19:43:45', '2020-11-29 19:45:35', NULL),
(37, '40200350000NB', 2.532, 17.840, NULL, NULL, NULL, NULL, 6, 'divided', NULL, 52509, '2020-11-29 19:43:45', '2020-11-29 19:45:36', NULL),
(38, '40200350000SB', 0.000, 2.520, NULL, NULL, NULL, NULL, 7, 'divided', NULL, 52510, '2020-11-29 19:43:45', '2020-11-29 19:45:36', NULL),
(39, '40200350000SB', 2.520, 17.840, NULL, NULL, NULL, NULL, 7, 'divided', NULL, 52511, '2020-11-29 19:43:45', '2020-11-29 19:45:36', NULL),
(40, '4040000000000', 0.000, 6.730, NULL, NULL, NULL, NULL, 8, 'undivided', NULL, NULL, '2020-11-29 19:43:45', '2020-11-29 19:43:45', NULL),
(41, '4040000000000', 6.910, 11.760, NULL, NULL, NULL, NULL, 8, 'undivided', NULL, NULL, '2020-11-29 19:43:45', '2020-11-29 19:43:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_number` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crash` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` bigint(20) UNSIGNED DEFAULT NULL,
  `make` bigint(20) UNSIGNED DEFAULT NULL,
  `model` bigint(20) UNSIGNED DEFAULT NULL,
  `type` bigint(20) UNSIGNED DEFAULT NULL,
  `vin_number` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_state` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_number`, `crash`, `color`, `make`, `model`, `type`, `vin_number`, `owner_state`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'R202011111', 4, 10, 10, 2, NULL, 1, '2020-11-29 20:27:37', '2020-11-29 20:27:37', NULL),
(2, '1', 'R202022222', 4, 18, 18, 2, NULL, 1, '2020-11-29 20:27:37', '2020-11-29 20:27:37', NULL),
(3, '2', 'R202022222', 3, 25, 25, 1, NULL, 1, '2020-11-29 20:27:37', '2020-11-29 20:27:37', NULL),
(4, '1', 'R202033333', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:37', '2020-11-29 20:27:37', NULL),
(5, '2', 'R202033333', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:37', '2020-11-29 20:27:37', NULL),
(6, '1', 'R202044444', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(7, '1', 'R202055555', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(8, '2', 'R202055555', 1, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(9, '1', 'R202012345', 4, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(10, '2', 'R202012345', 4, 18, 18, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(11, '1', 'R202023456', 3, 25, 25, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(12, '2', 'R202023456', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(13, '1', 'R202034567', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(14, '1', 'R202045678', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(15, '1', 'R201600127', 2, 5, 5, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(16, '2', 'R201600127', 7, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(17, '1', 'R201601659', 4, 9, 9, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(18, '2', 'R201601659', 2, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(19, '2', 'R201602602', 1, 18, 18, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(20, '1', 'R201602602', 2, 25, 25, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(21, '2', 'R201602608', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(22, '1', 'R201602608', 3, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(23, '1', 'R201602610', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(24, '2', 'R201602610', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(25, '2', 'R201602624', 7, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(26, '1', 'R201602624', 2, 21, 21, 3, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(27, '1', 'R201602631', 6, 5, 5, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(28, '2', 'R201602631', 1, 21, 21, 3, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(29, '2', 'R201602643', 2, 11, 11, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(30, '1', 'R201602643', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(31, '1', 'R201602648', 2, 9, 9, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(32, '2', 'R201602648', 1, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(33, '2', 'R201602669', 4, 18, 18, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(34, '1', 'R201602669', 3, 25, 25, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(35, '2', 'R201602672', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(36, '1', 'R201602672', 6, 21, 21, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(37, '1', 'R201602694', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(38, '2', 'R201602694', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(39, '2', 'R201602695', 1, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(40, '1', 'R201602695', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(41, '1', 'R201602702', 4, 5, 5, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(42, '2', 'R201602702', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(43, '2', 'R201602716', 1, 11, 11, 3, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(44, '1', 'R201602716', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(45, '1', 'R201602723', 3, 9, 9, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(46, '2', 'R201602723', 4, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(47, '2', 'R201602739', 5, 18, 18, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(48, '1', 'R201602739', 6, 25, 25, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(49, '2', 'R201602759', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(50, '1', 'R201602759', 2, 21, 21, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(51, '1', 'R201602814', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(52, '2', 'R201602814', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(53, '2', 'R201602878', 2, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(54, '1', 'R201602878', 4, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(55, '1', 'R201602953', 2, 5, 5, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(56, '2', 'R201602953', 1, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(57, '2', 'R201602956', 4, 11, 11, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(58, '1', 'R201602956', 3, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(59, '2', 'R201603415', 7, 18, 18, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(60, '1', 'R201603415', 2, 25, 25, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(61, '2', 'R201603675', 1, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(62, '1', 'R201603675', 2, 21, 21, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(63, '1', 'R201603832', 3, 5, 5, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(64, '2', 'R201603832', 4, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(65, '2', 'R201603974', 5, 11, 11, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(66, '1', 'R201603974', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(67, '1', 'R201604020', 2, 9, 9, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(68, '2', 'R201604020', 7, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(69, '2', 'R201604378', 1, 18, 18, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(70, '1', 'R201604378', 6, 25, 25, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(71, '2', 'R201604395', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(72, '1', 'R201604395', 4, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(73, '1', 'R201604562', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(74, '2', 'R201604562', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(75, '2', 'R201604847', 4, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(76, '1', 'R201604847', 3, 21, 21, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(77, '1', 'R201604906', 6, 5, 5, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(78, '2', 'R201604906', 5, 21, 21, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(79, '2', 'R201605011', 7, 11, 11, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(80, '1', 'R201605011', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(81, '1', 'R201605130', 6, 9, 9, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(82, '2', 'R201605130', 1, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(83, '2', 'R201605180', 2, 18, 18, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(84, '1', 'R201605180', 4, 25, 25, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(85, '2', 'R201605284', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(86, '1', 'R201605284', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(87, '1', 'R201605305', 3, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(88, '2', 'R201605305', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(89, '2', 'R201605308', 5, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(90, '1', 'R201605308', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(91, '1', 'R201605321', 2, 5, 5, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(92, '2', 'R201605321', 7, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(93, '2', 'R201605449', 1, 11, 11, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(94, '1', 'R201605449', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(95, '1', 'R201605757', 4, 9, 9, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(96, '2', 'R201605757', 2, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(97, '2', 'R201605909', 1, 18, 18, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(98, '1', 'R201605909', 2, 25, 25, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(99, '2', 'R201605985', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(100, '1', 'R201605985', 3, 21, 21, 3, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(101, '1', 'R201606217', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(102, '2', 'R201606217', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(103, '2', 'R201606260', 7, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(104, '1', 'R201606260', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(105, '1', 'R201606300', 6, 5, 5, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(106, '2', 'R201606300', 1, 21, 21, 3, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(107, '2', 'R201606508', 2, 11, 11, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(108, '1', 'R201606508', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(109, '1', 'R201606584', 2, 9, 9, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(110, '2', 'R201606584', 1, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(111, '2', 'R201606662', 4, 18, 18, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(112, '1', 'R201606662', 3, 25, 25, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(113, '2', 'R201606665', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(114, '1', 'R201606665', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(115, '1', 'R201606666', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(116, '2', 'R201606666', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(117, '2', 'R201606995', 1, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(118, '1', 'R201606995', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(119, '1', 'R201607613', 4, 5, 5, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(120, '2', 'R201607613', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(121, '2', 'R201607682', 1, 11, 11, 3, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(122, '1', 'R201607682', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(123, '2', 'R201607805', 5, 18, 18, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(124, '1', 'R201607805', 6, 25, 25, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(125, '2', 'R201607973', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(126, '1', 'R201607973', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(127, '1', 'R201708059', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(128, '2', 'R201708059', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(129, '2', 'R201708198', 2, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(130, '1', 'R201708198', 4, 21, 21, 3, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(131, '1', 'R201708313', 2, 5, 5, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(132, '2', 'R201708313', 1, 21, 21, 3, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(133, '2', 'R201708405', 4, 11, 11, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(134, '1', 'R201708405', 3, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(135, '1', 'R201708631', 6, 9, 9, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(136, '2', 'R201708631', 5, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(137, '2', 'R201708657', 7, 18, 18, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(138, '1', 'R201708657', 2, 25, 25, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(139, '2', 'R201708987', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(140, '1', 'R201708987', 6, 21, 21, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(141, '1', 'R201709033', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(142, '2', 'R201709033', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(143, '2', 'R201709217', 1, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(144, '1', 'R201709217', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(145, '1', 'R201709444', 3, 5, 5, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(146, '2', 'R201709444', 4, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(147, '2', 'R201709494', 5, 11, 11, 3, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(148, '1', 'R201709494', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(149, '1', 'R201709609', 2, 9, 9, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(150, '2', 'R201709609', 7, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(151, '2', 'R201709738', 1, 18, 18, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(152, '1', 'R201709738', 6, 25, 25, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(153, '2', 'R201709943', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(154, '1', 'R201709943', 4, 21, 21, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(155, '1', 'R201710030', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(156, '2', 'R201710030', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(157, '2', 'R201710419', 4, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(158, '1', 'R201710419', 3, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(159, '1', 'R201710441', 6, 5, 5, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(160, '2', 'R201710441', 5, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(161, '2', 'R201710907', 7, 11, 11, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(162, '1', 'R201710907', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(163, '2', 'R201711072', 2, 18, 18, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(164, '1', 'R201711072', 4, 25, 25, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(165, '2', 'R201711073', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(166, '1', 'R201711073', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(167, '1', 'R201711075', 3, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(168, '2', 'R201711075', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(169, '2', 'R201711077', 5, 1, 1, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(170, '1', 'R201711077', 6, 21, 21, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(171, '1', 'R201711372', 2, 5, 5, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(172, '2', 'R201711372', 7, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(173, '2', 'R201711470', 1, 11, 11, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(174, '1', 'R201711470', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(175, '1', 'R201711472', 4, 9, 9, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(176, '2', 'R201711472', 2, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(177, '2', 'R201711624', 1, 18, 18, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(178, '1', 'R201711624', 2, 25, 25, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(179, '2', 'R201711691', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(180, '1', 'R201711691', 3, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(181, '1', 'R201711702', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(182, '2', 'R201711702', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(183, '2', 'R201711843', 7, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(184, '1', 'R201711843', 2, 21, 21, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(185, '1', 'R201711981', 6, 5, 5, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(186, '2', 'R201711981', 1, 21, 21, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(187, '2', 'R201712107', 2, 11, 11, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(188, '1', 'R201712107', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(189, '1', 'R201712629', 2, 9, 9, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(190, '2', 'R201712629', 1, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(191, '2', 'R201712726', 4, 18, 18, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(192, '1', 'R201712726', 3, 25, 25, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(193, '2', 'R201712924', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(194, '1', 'R201712924', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(195, '1', 'R201712980', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(196, '2', 'R201712980', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(197, '2', 'R201713020', 1, 1, 1, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(198, '1', 'R201713020', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(199, '1', 'R201713061', 4, 5, 5, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(200, '2', 'R201713061', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(201, '2', 'R201713159', 1, 11, 11, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(202, '1', 'R201713159', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(203, '1', 'R201713482', 3, 9, 9, 1, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(204, '2', 'R201713482', 4, 10, 10, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(205, '2', 'R201713487', 5, 18, 18, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(206, '1', 'R201713487', 6, 25, 25, 2, NULL, 1, '2020-11-29 20:27:38', '2020-11-29 20:27:38', NULL),
(207, '2', 'R201713571', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(208, '1', 'R201713571', 2, 21, 21, 3, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(209, '2', 'R201714066', 2, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(210, '1', 'R201714066', 4, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(211, '1', 'R201714102', 2, 5, 5, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(212, '2', 'R201714102', 1, 21, 21, 3, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(213, '2', 'R201714106', 4, 11, 11, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(214, '1', 'R201714106', 3, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(215, '1', 'R201714207', 6, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(216, '2', 'R201714207', 5, 10, 10, 2, NULL, 5, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(217, '2', 'R201714277', 7, 18, 18, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(218, '1', 'R201714277', 2, 25, 25, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(219, '2', 'R201714388', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(220, '1', 'R201714388', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(221, '1', 'R201714468', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(222, '2', 'R201714468', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(223, '2', 'R201714589', 1, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(224, '1', 'R201714589', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(225, '1', 'R201714692', 3, 5, 5, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(226, '2', 'R201714692', 4, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(227, '2', 'R201714765', 5, 11, 11, 3, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(228, '1', 'R201714765', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(229, '1', 'R201714852', 2, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(230, '2', 'R201714852', 7, 10, 10, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(231, '2', 'R201714972', 1, 18, 18, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(232, '1', 'R201714972', 6, 25, 25, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(233, '2', 'R201714986', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(234, '1', 'R201714986', 4, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(235, '1', 'R201715212', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(236, '2', 'R201715212', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(237, '2', 'R201715423', 4, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(238, '1', 'R201715423', 3, 21, 21, 3, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(239, '1', 'R201715495', 6, 5, 5, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(240, '2', 'R201715495', 5, 21, 21, 3, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(241, '2', 'R201715629', 7, 11, 11, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(242, '1', 'R201715629', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(243, '1', 'R201715726', 6, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(244, '2', 'R201715726', 1, 10, 10, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(245, '2', 'R201715826', 2, 18, 18, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(246, '1', 'R201715826', 4, 25, 25, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(247, '2', 'R201716013', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(248, '1', 'R201716013', 2, 21, 21, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(249, '1', 'R201716233', 3, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(250, '2', 'R201716233', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(251, '2', 'R201716245', 5, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(252, '1', 'R201716245', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(253, '1', 'R201716287', 2, 5, 5, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(254, '2', 'R201716287', 7, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(255, '2', 'R201716288', 1, 11, 11, 3, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(256, '1', 'R201716288', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(257, '1', 'R201716654', 4, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(258, '2', 'R201716654', 2, 10, 10, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(259, '2', 'R201816658', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(260, '1', 'R201816658', 3, 21, 21, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(261, '1', 'R201817034', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(262, '2', 'R201817034', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(263, '2', 'R201817636', 7, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(264, '1', 'R201817636', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(265, '1', 'R201817768', 6, 5, 5, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(266, '2', 'R201817768', 1, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(267, '2', 'R201817832', 2, 11, 11, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(268, '1', 'R201817832', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(269, '1', 'R201818319', 2, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(270, '2', 'R201818319', 1, 10, 10, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(271, '2', 'R201818442', 4, 18, 18, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(272, '1', 'R201818442', 3, 25, 25, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(273, '2', 'R201818731', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(274, '1', 'R201818731', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(275, '1', 'R201818795', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(276, '2', 'R201818795', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(277, '2', 'R201818859', 1, 1, 1, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(278, '1', 'R201818859', 6, 21, 21, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(279, '1', 'R201818972', 4, 5, 5, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(280, '2', 'R201818972', 2, 21, 21, 2, NULL, 6, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(281, '2', 'R201819446', 1, 11, 11, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(282, '1', 'R201819446', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(283, '1', 'R201819556', 3, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(284, '2', 'R201819556', 4, 10, 10, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(285, '2', 'R201819564', 5, 18, 18, 1, NULL, 11, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(286, '1', 'R201819564', 6, 25, 25, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(287, '1', 'R201820101', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(288, '2', 'R201820101', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(289, '2', 'R201820133', 2, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(290, '1', 'R201820133', 4, 21, 21, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(291, '1', 'R201820411', 2, 5, 5, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(292, '2', 'R201820411', 1, 21, 21, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(293, '2', 'R201820619', 4, 11, 11, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(294, '1', 'R201820619', 3, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(295, '2', 'R201821416', 7, 18, 18, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(296, '1', 'R201821416', 2, 25, 25, 1, NULL, 9, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(297, '2', 'R201821463', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(298, '1', 'R201821463', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(299, '1', 'R201821464', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(300, '2', 'R201821464', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(301, '2', 'R201821540', 1, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(302, '1', 'R201821540', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(303, '1', 'R201821854', 3, 5, 5, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(304, '2', 'R201821854', 4, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(305, '2', 'R201821892', 5, 11, 11, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(306, '1', 'R201821892', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(307, '1', 'R201822189', 2, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(308, '2', 'R201822189', 7, 10, 10, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(309, '2', 'R201822403', 1, 18, 18, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(310, '1', 'R201822403', 6, 25, 25, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(311, '2', 'R201822547', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(312, '1', 'R201822547', 4, 21, 21, 3, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(313, '1', 'R201822595', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(314, '2', 'R201822595', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(315, '2', 'R201823052', 4, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(316, '1', 'R201823052', 3, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(317, '1', 'R201823156', 6, 5, 5, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(318, '2', 'R201823156', 5, 21, 21, 3, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(319, '2', 'R201823327', 7, 11, 11, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(320, '1', 'R201823327', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(321, '1', 'R201823369', 6, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(322, '2', 'R201823369', 1, 10, 10, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(323, '2', 'R201823508', 2, 18, 18, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(324, '1', 'R201823508', 4, 25, 25, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(325, '2', 'R201823633', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(326, '1', 'R201823633', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(327, '1', 'R201823642', 3, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(328, '2', 'R201823642', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(329, '2', 'R201823709', 5, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(330, '1', 'R201823709', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(331, '1', 'R201823852', 2, 5, 5, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(332, '2', 'R201823852', 7, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(333, '2', 'R201824264', 1, 11, 11, 3, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(334, '1', 'R201824264', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(335, '1', 'R201824360', 4, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(336, '2', 'R201824360', 2, 10, 10, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(337, '2', 'R201824396', 1, 18, 18, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(338, '1', 'R201824396', 2, 25, 25, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(339, '2', 'R201824600', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(340, '1', 'R201824600', 3, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(341, '1', 'R201824633', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(342, '2', 'R201824633', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(343, '2', 'R201825019', 7, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(344, '1', 'R201825019', 2, 21, 21, 3, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(345, '1', 'R201825395', 6, 5, 5, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(346, '2', 'R201825395', 1, 21, 21, 3, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(347, '2', 'R201825402', 2, 11, 11, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(348, '1', 'R201825402', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(349, '2', 'R201825828', 4, 18, 18, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(350, '1', 'R201825828', 3, 25, 25, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(351, '2', 'R201826009', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(352, '1', 'R201826009', 6, 21, 21, 1, NULL, 4, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(353, '1', 'R201826231', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(354, '2', 'R201826231', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(355, '2', 'R201826249', 1, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(356, '1', 'R201826249', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(357, '1', 'R201826301', 4, 5, 5, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(358, '2', 'R201826301', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(359, '2', 'R201826369', 1, 11, 11, 3, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(360, '1', 'R201826369', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(361, '1', 'R201826394', 3, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(362, '2', 'R201826394', 4, 10, 10, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(363, '2', 'R201826769', 5, 18, 18, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(364, '1', 'R201826769', 6, 25, 25, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(365, '2', 'R201826770', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(366, '1', 'R201826770', 2, 21, 21, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(367, '1', 'R201826948', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(368, '2', 'R201826948', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(369, '2', 'R201826998', 2, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(370, '1', 'R201826998', 4, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(371, '1', 'R201826999', 2, 5, 5, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(372, '2', 'R201826999', 1, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(373, '2', 'R201827397', 4, 11, 11, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(374, '1', 'R201827397', 3, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(375, '1', 'R201827412', 6, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(376, '2', 'R201827412', 5, 10, 10, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(377, '2', 'R201828028', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(378, '1', 'R201828028', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(379, '1', 'R201828169', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(380, '2', 'R201828169', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(381, '2', 'R201828217', 1, 1, 1, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(382, '1', 'R201828217', 2, 21, 21, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(383, '1', 'R201828247', 3, 5, 5, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(384, '2', 'R201828247', 4, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(385, '2', 'R201828310', 5, 11, 11, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(386, '1', 'R201828310', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(387, '1', 'R201828536', 2, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(388, '2', 'R201828536', 7, 10, 10, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(389, '2', 'R202028573', 1, 18, 18, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(390, '1', 'R202028573', 6, 25, 25, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(391, '2', 'R202028648', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(392, '1', 'R202028648', 4, 21, 21, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(393, '1', 'R202028664', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(394, '2', 'R202028664', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(395, '2', 'R202028778', 4, 1, 1, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(396, '1', 'R202028778', 3, 21, 21, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(397, '1', 'R202028826', 6, 5, 5, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(398, '2', 'R202028826', 5, 21, 21, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(399, '2', 'R202028870', 7, 11, 11, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(400, '1', 'R202028870', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(401, '1', 'R202028883', 6, 9, 9, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(402, '2', 'R202028883', 1, 10, 10, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(403, '2', 'R202028915', 2, 18, 18, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(404, '1', 'R202028915', 4, 25, 25, 1, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(405, '2', 'R202029023', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:39', '2020-11-29 20:27:39', NULL),
(406, '1', 'R202029023', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(407, '1', 'R202029073', 3, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(408, '2', 'R202029073', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(409, '2', 'R202029102', 5, 1, 1, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(410, '1', 'R202029102', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(411, '1', 'R202029350', 2, 5, 5, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(412, '2', 'R202029350', 7, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(413, '2', 'R202029360', 1, 11, 11, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(414, '1', 'R202029360', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(415, '1', 'R202029597', 4, 9, 9, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(416, '2', 'R202029597', 2, 10, 10, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(417, '2', 'R202029836', 1, 18, 18, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(418, '1', 'R202029836', 2, 25, 25, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(419, '2', 'R202030055', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(420, '1', 'R202030055', 3, 21, 21, 3, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(421, '2', 'R202030152', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(422, '1', 'R202030152', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(423, '1', 'R202030171', 6, 5, 5, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(424, '2', 'R202030171', 1, 21, 21, 3, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(425, '1', 'R202030208', 2, 9, 9, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(426, '2', 'R202030208', 1, 10, 10, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(427, '2', 'R202030212', 4, 18, 18, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(428, '1', 'R202030212', 3, 25, 25, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(429, '2', 'R202030358', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(430, '1', 'R202030358', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(431, '2', 'R202030373', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(432, '1', 'R202030373', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(433, '1', 'R202030626', 4, 5, 5, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(434, '2', 'R202030626', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(435, '2', 'R202030910', 1, 11, 11, 3, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(436, '1', 'R202030910', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(437, '2', 'R202031006', 5, 18, 18, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(438, '1', 'R202031006', 6, 25, 25, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(439, '2', 'R202031163', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(440, '1', 'R202031163', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(441, '2', 'R202031718', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(442, '3', 'R202031718', 4, 21, 21, 3, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(443, '1', 'R202031811', 2, 1, 1, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(444, '2', 'R202031811', 2, 5, 5, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(445, '3', 'R202031811', 1, 21, 21, 3, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(446, '3', 'R202031911', 6, 9, 9, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(447, '2', 'R202031911', 4, 11, 11, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(448, '1', 'R202031911', 3, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(449, '1', 'R202032254', 5, 10, 10, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(450, '3', 'R202032254', 7, 18, 18, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(451, '2', 'R202032254', 2, 25, 25, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(452, '2', 'R202032626', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(453, '3', 'R202032626', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(454, '1', 'R202032626', 6, 21, 21, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(455, '1', 'R202032776', 2, 16, 16, 2, NULL, 12, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(456, '2', 'R202032776', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(457, '1', 'R202032926', 1, 1, 1, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(458, '2', 'R202032926', 3, 5, 5, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(459, '3', 'R202032926', 4, 21, 21, 2, NULL, 2, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(460, '3', 'R202032928', 2, 9, 9, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(461, '2', 'R202032928', 5, 11, 11, 3, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(462, '1', 'R202032928', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(463, '1', 'R202032930', 7, 10, 10, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(464, '3', 'R202032930', 1, 18, 18, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(465, '2', 'R202032930', 6, 25, 25, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(466, '2', 'R202032931', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(467, '3', 'R202032931', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(468, '1', 'R202032931', 4, 21, 21, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(469, '3', 'R202032932', 4, 1, 1, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(470, '1', 'R202032932', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(471, '2', 'R202032932', 3, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(472, '1', 'R202032952', 6, 5, 5, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(473, '3', 'R202032952', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(474, '2', 'R202032952', 5, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(475, '2', 'R202032965', 6, 9, 9, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(476, '3', 'R202032965', 1, 10, 10, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(477, '1', 'R202032965', 7, 11, 11, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(478, '2', 'R202032979', 2, 18, 18, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(479, '3', 'R202032979', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(480, '1', 'R202032979', 4, 25, 25, 2, NULL, 7, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(481, '1', 'R202033004', 1, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(482, '2', 'R202033004', 3, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(483, '1', 'R202033153', 5, 1, 1, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(484, '2', 'R202033153', 2, 5, 5, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(485, '3', 'R202033153', 7, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(486, '1', 'R202033158', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(487, '1', 'R202033167', 4, 9, 9, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(488, '2', 'R202033167', 2, 10, 10, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(489, '3', 'R202033167', 2, 25, 25, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(490, '3', 'R202033222', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(491, '1', 'R202033222', 1, 18, 18, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(492, '2', 'R202033222', 3, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(493, '1', 'R202033659', 6, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(494, '2', 'R202033659', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(495, '3', 'R202033659', 2, 21, 21, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(496, '1', 'R202033670', 7, 1, 1, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(497, '2', 'R202033670', 6, 5, 5, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(498, '3', 'R202033670', 1, 21, 21, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(499, '2', 'R202033865', 4, 18, 18, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(500, '1', 'R202033865', 3, 25, 25, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(501, '2', 'R202034083', 5, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(502, '1', 'R202034083', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(503, '1', 'R202034119', 2, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(504, '2', 'R202034119', 7, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(505, '2', 'R202034401', 1, 1, 1, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(506, '1', 'R202034401', 6, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL);
INSERT INTO `vehicles` (`id`, `vehicle_number`, `crash`, `color`, `make`, `model`, `type`, `vin_number`, `owner_state`, `created_at`, `updated_at`, `deleted_at`) VALUES
(507, '1', 'R202034642', 4, 5, 5, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(508, '2', 'R202034642', 2, 21, 21, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(509, '2', 'R202034715', 1, 11, 11, 1, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(510, '2', 'R202034756', 5, 18, 18, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(511, '1', 'R202034756', 6, 25, 25, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(512, '1', 'R202056789', 4, 10, 10, 2, NULL, NULL, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(513, '1', 'R202034715', 4, 16, 16, 2, NULL, 1, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(514, '1', 'R202034716', 3, 9, 9, 1, NULL, 5, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL),
(515, '2', 'R202034716', 2, 10, 10, 2, NULL, 6, '2020-11-29 20:27:40', '2020-11-29 20:27:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_make_models`
--

CREATE TABLE `vehicle_make_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `make_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_make_models`
--

INSERT INTO `vehicle_make_models` (`id`, `make_name`, `model_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Audi', 'A4', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(2, 'Audi', 'A6', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(3, 'Audi', 'A8', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(4, 'Audi', 'Q7', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(5, 'BMW', '325i', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(6, 'BMW', '528xi', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(7, 'BMW', 'x3', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(8, 'BMW', 'x5', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(9, 'Chrysler', 'Jeep', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(10, 'Fiat', '500e', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(11, 'Ford', 'Escape', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(12, 'Ford', 'F150', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(13, 'Ford', 'Focus', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(14, 'Ford', 'Fusion', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(15, 'Ford', 'Taurus', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(16, 'Honda', 'Accord', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(17, 'Honda', 'Civic', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(18, 'Subaru', 'Forester', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(19, 'Subaru', 'Legacy', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(20, 'Subaru', 'Outback', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(21, 'Toyota', 'Camry', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(22, 'Toyota', 'Corolla', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(23, 'Toyota', 'Tacoma', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(24, 'Toyota', 'Tundra', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(25, 'Volvo', 'S60', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(26, 'Volvo', 'S90', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(27, 'Volvo', 'XC40', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(28, 'Volvo', 'XC60', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL),
(29, 'Volvo', 'XC80', '2020-08-24 11:50:04', '2020-08-24 11:50:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SUV', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(2, 'Sedan', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(3, 'Truck', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vert_curves`
--

CREATE TABLE `vert_curves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route` bigint(20) UNSIGNED NOT NULL,
  `route_direction` bigint(20) UNSIGNED NOT NULL,
  `start_mp` double(19,3) NOT NULL,
  `end_mp` double(19,3) NOT NULL,
  `curve_length` double(19,3) NOT NULL,
  `curve_type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slope_start_pct` double(19,3) NOT NULL,
  `slope_end_pct` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geometry` geometry DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vert_curves`
--

INSERT INTO `vert_curves` (`id`, `route`, `route_direction`, `start_mp`, `end_mp`, `curve_length`, `curve_type`, `slope_start_pct`, `slope_end_pct`, `geometry`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 32, 8, 3.800, 4.100, 0.300, 'Crest', 3.000, '-2.5', NULL, '2020-11-29 20:18:30', '2020-11-29 20:18:30', NULL),
(2, 34, 8, 27.110, 27.610, 0.500, 'Sag', -1.500, '-2', NULL, '2020-11-29 20:18:30', '2020-11-29 20:18:30', NULL),
(3, 37, 6, 2.600, 3.000, 0.400, 'Sag', -2.000, '2.5', NULL, '2020-11-29 20:18:30', '2020-11-29 20:18:30', NULL),
(4, 37, 6, 16.450, 17.050, 0.600, 'Crest', 3.000, '4', NULL, '2020-11-29 20:18:30', '2020-11-29 20:18:30', NULL),
(5, 39, 7, 11.220, 11.420, 0.200, 'Sag', -1.500, '-2', NULL, '2020-11-29 20:18:30', '2020-11-29 20:18:30', NULL),
(6, 39, 7, 17.320, 17.520, 0.200, 'Sag', -2.000, '2.5', NULL, '2020-11-29 20:18:30', '2020-11-29 20:18:30', NULL),
(7, 40, 8, 1.100, 1.400, 0.300, 'Crest', 4.000, '-4.5', NULL, '2020-11-29 20:18:30', '2020-11-29 20:18:30', NULL),
(8, 40, 8, 4.000, 4.400, 0.400, 'Crest', 4.500, '5', NULL, '2020-11-29 20:18:30', '2020-11-29 20:18:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weather_conditions`
--

CREATE TABLE `weather_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weather_conditions`
--

INSERT INTO `weather_conditions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rain', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(2, 'Cloudy', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(3, 'Snow', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(4, 'Fog', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL),
(5, 'Clear', '2020-01-10 07:32:14', '2020-01-10 07:32:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aadts`
--
ALTER TABLE `aadts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aadts_route_direction_foreign` (`route_direction`),
  ADD KEY `aadts_route_foreign` (`route`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_type_foreign` (`user_type`);

--
-- Indexes for table `admin_privilages`
--
ALTER TABLE `admin_privilages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_privilages_admin_foreign` (`admin`),
  ADD KEY `admin_privilages_privilage_foreign` (`privilage`);

--
-- Indexes for table `age_groups`
--
ALTER TABLE `age_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collision_types`
--
ALTER TABLE `collision_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counties_state_foreign` (`state`),
  ADD KEY `counties_district_foreign` (`district`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_state_foreign` (`state`);

--
-- Indexes for table `driver_conditions`
--
ALTER TABLE `driver_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_distraction_types`
--
ALTER TABLE `driver_distraction_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `environmental_conditions`
--
ALTER TABLE `environmental_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highway_classes`
--
ALTER TABLE `highway_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horz_curves`
--
ALTER TABLE `horz_curves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horz_curves_route_foreign` (`route`),
  ADD KEY `horz_curves_route_direction_foreign` (`route_direction`);

--
-- Indexes for table `hotspots`
--
ALTER TABLE `hotspots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotspots_highway_class_foreign` (`highway_class`),
  ADD KEY `hotspots_route_foreign` (`route`),
  ADD KEY `hotspots_collision_type_foreign` (`collision_type`),
  ADD KEY `hotspots_light_condition_foreign` (`light_condition`),
  ADD KEY `hotspots_intersection_type_foreign` (`intersection_type`),
  ADD KEY `hotspots_interchange_junction_type_foreign` (`interchange_junction_type`),
  ADD KEY `hotspots_route_direction_foreign` (`route_direction`);

--
-- Indexes for table `hotspot_treatments`
--
ALTER TABLE `hotspot_treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interchange_junction_types`
--
ALTER TABLE `interchange_junction_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intersection_types`
--
ALTER TABLE `intersection_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `light_conditions`
--
ALTER TABLE `light_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `privilages`
--
ALTER TABLE `privilages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_route_foreign` (`route`),
  ADD KEY `projects_highway_class_foreign` (`highway_class`),
  ADD KEY `projects_route_direction_foreign` (`route_direction`);

--
-- Indexes for table `project_selected_treatments`
--
ALTER TABLE `project_selected_treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_treatments`
--
ALTER TABLE `project_treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `road_surface_conditions`
--
ALTER TABLE `road_surface_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `road_surface_types`
--
ALTER TABLE `road_surface_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route_directions`
--
ALTER TABLE `route_directions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_results`
--
ALTER TABLE `saved_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_scenarios`
--
ALTER TABLE `saved_scenarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_scenarios_route_foreign` (`route`),
  ADD KEY `saved_scenarios_route_direction_foreign` (`route_direction`);

--
-- Indexes for table `severity_types`
--
ALTER TABLE `severity_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speed_limits`
--
ALTER TABLE `speed_limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_screenings`
--
ALTER TABLE `s_screenings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_screenings_highway_class_foreign` (`highway_class`),
  ADD KEY `s_screenings_route_foreign` (`route`),
  ADD KEY `s_screenings_collision_type_foreign` (`collision_type`),
  ADD KEY `s_screenings_light_condition_foreign` (`light_condition`),
  ADD KEY `s_screenings_intersection_type_foreign` (`intersection_type`),
  ADD KEY `s_screenings_interchange_junction_type_foreign` (`interchange_junction_type`),
  ADD KEY `s_screenings_route_direction_foreign` (`route_direction`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_screenings`
--
ALTER TABLE `t_screenings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t_screenings_highway_class_foreign` (`highway_class`),
  ADD KEY `t_screenings_route_foreign` (`route`),
  ADD KEY `t_screenings_collision_type_foreign` (`collision_type`),
  ADD KEY `t_screenings_light_condition_foreign` (`light_condition`),
  ADD KEY `t_screenings_route_direction_foreign` (`route_direction`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `valid_routes`
--
ALTER TABLE `valid_routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `valid_routes_route_direction_foreign` (`route_direction`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_make_models`
--
ALTER TABLE `vehicle_make_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vert_curves`
--
ALTER TABLE `vert_curves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vert_curves_route_foreign` (`route`),
  ADD KEY `vert_curves_route_direction_foreign` (`route_direction`);

--
-- Indexes for table `weather_conditions`
--
ALTER TABLE `weather_conditions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aadts`
--
ALTER TABLE `aadts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin_privilages`
--
ALTER TABLE `admin_privilages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `age_groups`
--
ALTER TABLE `age_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `collision_types`
--
ALTER TABLE `collision_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `driver_conditions`
--
ALTER TABLE `driver_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `driver_distraction_types`
--
ALTER TABLE `driver_distraction_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `environmental_conditions`
--
ALTER TABLE `environmental_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `highway_classes`
--
ALTER TABLE `highway_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `horz_curves`
--
ALTER TABLE `horz_curves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hotspots`
--
ALTER TABLE `hotspots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT for table `hotspot_treatments`
--
ALTER TABLE `hotspot_treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `interchange_junction_types`
--
ALTER TABLE `interchange_junction_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `intersection_types`
--
ALTER TABLE `intersection_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `light_conditions`
--
ALTER TABLE `light_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `privilages`
--
ALTER TABLE `privilages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `project_selected_treatments`
--
ALTER TABLE `project_selected_treatments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_treatments`
--
ALTER TABLE `project_treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `road_surface_conditions`
--
ALTER TABLE `road_surface_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `road_surface_types`
--
ALTER TABLE `road_surface_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `route_directions`
--
ALTER TABLE `route_directions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `saved_results`
--
ALTER TABLE `saved_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saved_scenarios`
--
ALTER TABLE `saved_scenarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `severity_types`
--
ALTER TABLE `severity_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `speed_limits`
--
ALTER TABLE `speed_limits`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `s_screenings`
--
ALTER TABLE `s_screenings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_screenings`
--
ALTER TABLE `t_screenings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `valid_routes`
--
ALTER TABLE `valid_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- AUTO_INCREMENT for table `vehicle_make_models`
--
ALTER TABLE `vehicle_make_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vert_curves`
--
ALTER TABLE `vert_curves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `weather_conditions`
--
ALTER TABLE `weather_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aadts`
--
ALTER TABLE `aadts`
  ADD CONSTRAINT `aadts_route_direction_foreign` FOREIGN KEY (`route_direction`) REFERENCES `route_directions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aadts_route_foreign` FOREIGN KEY (`route`) REFERENCES `valid_routes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_type_foreign` FOREIGN KEY (`user_type`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_privilages`
--
ALTER TABLE `admin_privilages`
  ADD CONSTRAINT `admin_privilages_admin_foreign` FOREIGN KEY (`admin`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_privilages_privilage_foreign` FOREIGN KEY (`privilage`) REFERENCES `privilages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `counties`
--
ALTER TABLE `counties`
  ADD CONSTRAINT `counties_district_foreign` FOREIGN KEY (`district`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counties_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_state_foreign` FOREIGN KEY (`state`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `horz_curves`
--
ALTER TABLE `horz_curves`
  ADD CONSTRAINT `horz_curves_route_direction_foreign` FOREIGN KEY (`route_direction`) REFERENCES `route_directions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `horz_curves_route_foreign` FOREIGN KEY (`route`) REFERENCES `valid_routes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_highway_class_foreign` FOREIGN KEY (`highway_class`) REFERENCES `highway_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_route_direction_foreign` FOREIGN KEY (`route_direction`) REFERENCES `route_directions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_route_foreign` FOREIGN KEY (`route`) REFERENCES `valid_routes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `s_screenings`
--
ALTER TABLE `s_screenings`
  ADD CONSTRAINT `s_screenings_collision_type_foreign` FOREIGN KEY (`collision_type`) REFERENCES `collision_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_screenings_highway_class_foreign` FOREIGN KEY (`highway_class`) REFERENCES `highway_classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_screenings_interchange_junction_type_foreign` FOREIGN KEY (`interchange_junction_type`) REFERENCES `interchange_junction_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_screenings_intersection_type_foreign` FOREIGN KEY (`intersection_type`) REFERENCES `intersection_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_screenings_light_condition_foreign` FOREIGN KEY (`light_condition`) REFERENCES `light_conditions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_screenings_route_direction_foreign` FOREIGN KEY (`route_direction`) REFERENCES `route_directions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `s_screenings_route_foreign` FOREIGN KEY (`route`) REFERENCES `valid_routes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `valid_routes`
--
ALTER TABLE `valid_routes`
  ADD CONSTRAINT `valid_routes_route_direction_foreign` FOREIGN KEY (`route_direction`) REFERENCES `route_directions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vert_curves`
--
ALTER TABLE `vert_curves`
  ADD CONSTRAINT `vert_curves_route_direction_foreign` FOREIGN KEY (`route_direction`) REFERENCES `route_directions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vert_curves_route_foreign` FOREIGN KEY (`route`) REFERENCES `valid_routes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
