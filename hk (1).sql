-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 10:13 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hk`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_leave`
--

CREATE TABLE `add_leave` (
  `leave_id` int(11) NOT NULL,
  `leave_type` varchar(100) NOT NULL,
  `status` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_leave`
--

INSERT INTO `add_leave` (`leave_id`, `leave_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Casual Leave', 1, '2018-08-09 05:08:20', '2018-08-09 05:08:20'),
(2, 'Restricted Holiday', 1, '2018-08-09 05:08:23', '2018-08-09 05:09:00'),
(3, 'Medical Leave tes', 1, '2018-08-09 05:09:18', '2018-08-09 05:09:18'),
(5, 'abcd', 1, '2018-08-09 05:44:55', '2018-08-09 07:01:57'),
(6, 'Medical Leave', 1, '2018-09-12 05:45:27', '2018-09-12 05:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `add_money`
--

CREATE TABLE `add_money` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `add_amount` int(10) NOT NULL,
  `cashopt_id` int(11) NOT NULL,
  `transfer_by` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_money`
--

INSERT INTO `add_money` (`id`, `user_id`, `user_name`, `user_email`, `add_amount`, `cashopt_id`, `transfer_by`, `created_at`) VALUES
(1, 2, 'parth mali', 'parth@gmail.com', 5000, 11, 'Money Deposit by Cash Operator', '2018-08-17 17:32:03'),
(3, 3, 'Ramesh', 'ramesh@gmail.com', 5000, 11, 'Money Deposit by Cash Operator', '2018-08-13 09:41:11'),
(4, 2, 'parth mali', 'parth@gmail.com', 2000, 11, 'Money Deposit by Cash Operator', '2018-08-13 09:41:55'),
(5, 1, 'Dharit', 'dharit@gmail.com', 1000, 11, 'Money Deposit by Cash Operator', '2018-08-13 09:52:07'),
(7, 1, 'Dharit', 'dharit@gmail.com', 1000, 11, 'Money Deposit by Cash Operator', '2018-08-13 09:52:59'),
(8, 1, 'Dharit', 'dharit@gmail.com', 1, 11, 'Money Deposit by Cash Operator', '2018-08-13 09:53:08'),
(9, 1, 'Dharit', 'dharit@gmail.com', 0, 11, 'Money Deposit by Cash Operator', '2018-08-13 09:53:24'),
(13, 1, 'Dharit', 'dharit@gmail.com', 1000, 11, 'Money Deposit by Cash Operator', '2018-08-13 09:55:44'),
(15, 1, 'Dharit', 'dharit@gmail.com', 1, 11, 'Money Deposit by Cash Operator', '2018-08-13 10:00:41'),
(16, 1, 'Dharit', 'dharit@gmail.com', 1, 11, 'Money Deposit by Cash Operator', '2018-08-13 10:03:48'),
(17, 1, 'Dharit', 'dharit@gmail.com', 10, 11, 'Money Deposit by Cash Operator', '2018-08-13 10:15:30'),
(18, 1, 'Dharit', 'dharit@gmail.com', 10, 11, 'Money Deposit by Cash Operator', '2018-08-13 10:28:21'),
(19, 1, 'Dharit', 'dharit@gmail.com', 1000, 11, 'Money Deposit by Cash Operator', '2018-08-13 10:45:58'),
(20, 4, 'abcd', 'abc@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 14:33:35'),
(21, 5, 'def', 'ddd@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 14:37:06'),
(22, 5, 'def', 'ddd@gmail.com', 10, 11, 'Money Deposit by Cash Operator', '2018-08-18 14:45:11'),
(23, 1, 'Dharit', 'dharit@gmail.com', 388, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:16:32'),
(24, 1, 'Dharit', 'dharit@gmail.com', 388, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:16:34'),
(25, 1, 'Dharit', 'dharit@gmail.com', 388, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:16:34'),
(26, 1, 'Dharit', 'dharit@gmail.com', 388, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:16:34'),
(27, 1, 'Dharit', 'dharit@gmail.com', 388, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:16:35'),
(28, 1, 'Dharit', 'dharit@gmail.com', 388, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:16:35'),
(29, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:16:59'),
(30, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:04'),
(31, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:06'),
(32, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:06'),
(33, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:29'),
(34, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:29'),
(35, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:29'),
(36, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:30'),
(37, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:30'),
(38, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:30'),
(39, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:30'),
(40, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:30'),
(41, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:31'),
(42, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:34'),
(43, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:34'),
(44, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:34'),
(45, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:35'),
(46, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:35'),
(47, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:35'),
(48, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:36'),
(49, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:17:55'),
(50, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:18:20'),
(51, 1, 'Dharit', 'dharit@gmail.com', 50, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:18:38'),
(52, 5, 'def', 'ddd@gmail.com', 10, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:19:22'),
(53, 5, 'def', 'ddd@gmail.com', 70, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:19:42'),
(54, 5, 'def', 'ddd@gmail.com', 70, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:19:43'),
(55, 5, 'def', 'ddd@gmail.com', 70, 11, 'Money Deposit by Cash Operator', '2018-08-18 15:19:43'),
(56, 1, 'Dharit', 'dharit@gmail.com', 10, 11, 'Money Deposit by Cash Operator', '2018-10-15 10:27:32'),
(57, 9, 'shaikh', 'zashaikh007@gmail.com', 500, 11, 'Money Deposit by Cash Operator', '2018-11-17 08:28:43'),
(58, 9, 'shaikh', 'zashaikh007@gmail.com', 500, 11, 'Money Deposit by Cash Operator', '2018-11-17 08:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int(5) DEFAULT NULL,
  `location_id` int(5) DEFAULT NULL,
  `block` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_id` int(5) UNSIGNED DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `job_title` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `location`, `branch`, `branch_id`, `location_id`, `block`, `pm_id`, `status`, `job_title`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$p71.NWT/ldazbWT/ArS0C.mDZHKCartx.ny9eNKSP.bWpjb1OA0Nq', NULL, NULL, 0, 0, NULL, NULL, 1, 'admin', 'TXOiX4pkO1NV7lAbOmGM86Po6Ib8tiz7nOiOXVNVuFNYc3s9r2qadPVaQz7o', '2018-07-24 04:12:49', '2018-11-23 12:08:42'),
(2, 'subadmin1', 'subadmin1@gmail.com', '$2y$10$8ED1Q/tra.dXLJdCa0oxe.6jGjJBIR04nup7RSEj6vGwWxNgtZ06e', NULL, NULL, 0, 0, NULL, NULL, 1, 'subadmin', 'BfQgx0Dd7v49gU7EeraJZ0V9cknTxcccnHtCd8MR5iJ6yBDTXI8sD3VHgpQL', '2018-07-31 06:08:39', '2018-08-18 06:04:26'),
(3, 'subadmin2', 'subadmin2@gmail.com', '$2y$10$mnbeG006WhhQZ7ic/kXKkOH11dkybSxfEypVn8ub2AiOfiONJ1twm', NULL, NULL, 0, 0, NULL, NULL, 1, 'subadmin', 'U2E1VzPueu8GSfZ9R6WywejPm61jhnnMt1yrzuh3uGiNgoHdLo3jyHH7dQvW', '2018-07-31 06:13:04', '2018-08-02 12:47:15'),
(6, 'emp1', 'emp1@gmail.com', '$2y$10$OQCiklOxXnZoTmsFIok6w.j2wQIvK7XUSHyO0pkt6Uui0Bcr1qWyW', NULL, NULL, 1, NULL, NULL, 10, 1, 'employee', 'qv29XGCtRp70ueYewT73GfnxXvJyK8uD9kgVrPGyfQKwMVyuxj726CmFDdgo', '2018-07-31 07:09:25', '2018-11-23 06:57:51'),
(7, 'emp2', 'emp2@gmail.com', '$2y$10$Q0dfIGlXM75vXItppZ1TnuNTKuN9ei3ceS68h8O4tiCyaA2HxAhF2', NULL, NULL, 1, NULL, NULL, 10, 1, 'employee', 'bvr7ujoaA170xi1KpioJ4IinBjAtpmoyMP0yI1hheF6MrbasDKFCBUalDDYR', '2018-07-31 07:11:41', '2018-11-23 12:10:34'),
(9, 'admin', 'admin2@gmail.com', '$2y$10$Tv/MheazhStwERzQNK7UNeLpf41DM6mMXB.lm9hG68sfuCCdfQduO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'admin', NULL, '2018-07-31 08:59:16', '2018-08-11 11:33:15'),
(10, 'pm2', 'pm2@gmail.com', '$2y$10$5.NvyMxhcMxrmQkj/3k4DeC3fvUgGyr06tSgGl0BPaWjRAqMutUE6', NULL, NULL, 4, 1, 'B', NULL, 1, 'projectmanager', 'IxFt6js23NHOdjNbpexv8HrEFkm1r00WTsb1woA554fKxHszpkg1sZSmQTvh', '2018-08-01 04:08:31', '2018-11-15 11:12:52'),
(11, 'cashop1', 'cashop1@gmail.com', '$2y$10$TQDIMiigKOtnfmEk97yzKOTC063yiy4BXr/ZVzXSiqKuzKgNbKJAe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'cashoperator', 'hAPMBuH0FnWFBCsSWa0g480TFYMciS4Ymk1v6WSEuYX8Jj02KMGW3PSKKch4', '2018-08-01 05:22:27', '2018-11-17 08:52:11'),
(13, 'cashop2', 'cashop2@gmail.com', '$2y$10$wX47MdE.Gn97kf.KqQFjtOl6PWtzlrTqiy2K5jMCTObRNcvr1/I5a', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'cashoperator', 'tGOExaZVFkVnM1cQAKwRPZnKKTOqWMvYaOBITurPDIHekfkZrtrmDuvTeV5D', '2018-08-01 06:10:14', '2018-08-06 10:41:04'),
(15, 'pm1', 'pm1@gmail.com', '$2y$10$2IFzpyKYUgQzFhiAYEXR3eEbHnGfxCNXSYYkCP1cQ6EEkjsyvnb2i', NULL, NULL, 2, 2, 'A', NULL, 1, 'projectmanager', 'UyHbG8AHccGq3bye4ubb8hNqJU2vJR3CuCi3cL518N7zH30pVKJ16IBwleCY', '2018-08-01 06:25:17', '2018-11-21 04:23:57'),
(20, 'emp3', 'emp3@gmail.com', '$2y$10$pfiy5OxpNGlF1HR19PmEze1yOrK10wgJQk3srVneSsGloh3JdUFtq', NULL, NULL, NULL, NULL, NULL, 15, 1, 'employee', 'tRfHOPCosW3SfSa61dn5KbJvLr591BOwjhOuGK0H15yvhZrIZtmw5eyntQmY', '2018-08-03 07:08:29', '2018-11-23 12:09:12'),
(21, 'emp4', 'emp4@gmail.com', '$2y$10$hqSOKFn/A7v7Myxh0JwJ7OrWln5maJShfj/gU/pBmNahH4aeJzD2m', NULL, NULL, NULL, NULL, NULL, 15, 1, 'employee', 'sVkrl3apx8KjjPJBDty5zAGbJVruAVImhB78sn019kyf0cWFCQThlmvUmzUF', '2018-08-03 07:08:52', '2018-11-21 05:56:09'),
(22, 'emp5', 'emp5@gmail.com', '$2y$10$5.k0vTWXhMCds0iuga2gD.5i6lXLnCsiu.KAix4Qss2Ek8uNFQi4u', NULL, NULL, NULL, NULL, NULL, 15, 1, 'employee', NULL, '2018-08-03 07:09:20', '2018-08-03 07:09:20'),
(23, 'demo', 'demo5@gmail.com', '$2y$10$gbqHlkX8S5kEDSKYhoEt2u1xPDRoY2Bz.JvxMJgzqQzqS.YUHwWeu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'admin', NULL, '2018-09-11 06:59:37', '2018-09-11 06:59:37'),
(24, 'demo6', 'demo6@gmail.com', '$2y$10$jq3K3wRQKxrmpUK6rIW6ueHTFO7hQcAxWkksN8mIhDEH9TjTNMVlC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'admin', NULL, '2018-09-11 07:00:49', '2018-09-11 07:00:49'),
(25, 'parth mali', 'parthmali@gmail.com', '$2y$10$F/JiqrJu96To56rwpxmYI.R8hMLtPWpIVip/K1gAPimNxTIna73si', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'admin', NULL, '2018-09-15 10:55:51', '2018-09-15 10:55:51'),
(26, 'demo786', 'demo@gmail.com', '$2y$10$YaGqdM1wkn7pFqzT16pDxupe92yKCYq7aAxkP2WRvJKCnPscc9ZZ.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'NEW', 'n2sXvh5neFWjcHqyz6j66VqIv3ONFm9HjrLYQXGlqu9G64ObqfsPOhtlAK9K', '2018-11-20 08:56:25', '2018-11-20 08:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `admin_messages`
--

CREATE TABLE `admin_messages` (
  `message_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `message_read` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_messages`
--

INSERT INTO `admin_messages` (`message_id`, `user_id`, `title`, `message`, `message_read`, `created_at`, `updated_at`) VALUES
(2, 7, 'Hello Friends', 'Hello Friend, how are you?', 0, '2018-08-07 09:47:16', '2018-08-07 09:47:16'),
(3, 20, 'Hello Friends', 'Hello Friend, how are you?', 1, '2018-08-07 09:47:16', '2018-08-07 09:47:16'),
(4, 21, 'Hello Friends', 'Hello Friend, how are you?', 0, '2018-08-07 09:47:16', '2018-08-07 09:47:16'),
(5, 22, 'Hello Friends', 'Hello Friend, how are you?', 0, '2018-08-07 09:47:16', '2018-08-07 09:47:16'),
(26, 2, 'abcd', 'dgffghfg', 0, '2018-08-13 12:38:34', '2018-08-13 12:38:34'),
(27, 3, 'abcd', 'dgffghfg', 0, '2018-08-13 12:38:34', '2018-08-13 12:38:34'),
(29, 7, 'abcd', 'gfgjhf', 0, '2018-08-13 12:40:04', '2018-08-13 12:40:04'),
(30, 20, 'abcd', 'gfgjhf', 1, '2018-08-13 12:40:04', '2018-08-13 12:40:04'),
(31, 21, 'abcd', 'gfgjhf', 0, '2018-08-13 12:40:04', '2018-08-13 12:40:04'),
(32, 22, 'abcd', 'gfgjhf', 0, '2018-08-13 12:40:04', '2018-08-13 12:40:04'),
(33, 2, 'floar cleanningt', 'trrrrrhfg', 0, '2018-08-13 13:42:28', '2018-08-13 13:42:28'),
(34, 3, 'floar cleanningt', 'trrrrrhfg', 0, '2018-08-13 13:42:28', '2018-08-13 13:42:28'),
(36, 7, 'qw', 'qwertyuiop', 0, '2018-08-13 13:53:37', '2018-08-13 13:53:37'),
(37, 20, 'qw', 'qwertyuiop', 1, '2018-08-13 13:53:37', '2018-08-13 13:53:37'),
(38, 21, 'qw', 'qwertyuiop', 0, '2018-08-13 13:53:37', '2018-08-13 13:53:37'),
(39, 22, 'qw', 'qwertyuiop', 0, '2018-08-13 13:53:38', '2018-08-13 13:53:38'),
(40, 2, 'abcd', 'dddddd', 0, '2018-08-13 14:33:30', '2018-08-13 14:33:30'),
(41, 3, 'abcd', 'dddddd', 0, '2018-08-13 14:33:31', '2018-08-13 14:33:31'),
(43, 15, 'Hello World', 'sfanckjwbvsdvwsb', 1, '2018-08-18 11:21:01', '2018-08-18 11:21:01'),
(45, 7, 'Hwllo Employee', 'How are you all', 0, '2018-08-18 11:26:44', '2018-08-18 11:26:44'),
(46, 20, 'Hwllo Employee', 'How are you all', 0, '2018-08-18 11:26:44', '2018-08-18 11:26:44'),
(47, 21, 'Hwllo Employee', 'How are you all', 0, '2018-08-18 11:26:44', '2018-08-18 11:26:44'),
(48, 22, 'Hwllo Employee', 'How are you all', 0, '2018-08-18 11:26:44', '2018-08-18 11:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `allocate_items`
--

CREATE TABLE `allocate_items` (
  `id` int(11) NOT NULL,
  `item_id` int(50) NOT NULL,
  `emp_id` int(11) NOT NULL DEFAULT '0',
  `allocate_qun` int(11) NOT NULL DEFAULT '0',
  `date` varchar(100) DEFAULT NULL,
  `return_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocate_items`
--

INSERT INTO `allocate_items` (`id`, `item_id`, `emp_id`, `allocate_qun`, `date`, `return_date`) VALUES
(1, 1, 6, 5, '2018-11-23 12:26:31pm', '2018-11-23 12:27:27pm'),
(2, 1, 7, 10, '2018-11-23 05:38:08pm', '2018-11-23 05:38:26pm'),
(3, 2, 6, 1, '2018-11-30 05:57:05pm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(5) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `location_id` int(5) DEFAULT NULL,
  `location_name` varchar(100) DEFAULT NULL,
  `creatd_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `location_id`, `location_name`, `creatd_at`, `updated_at`) VALUES
(2, 'geeta mandir', 2, 'Ahmedabad', '2018-10-19 05:02:53', '2018-10-19 05:03:19'),
(3, 'Kalupur', 2, 'Ahmedabad', '2018-07-31 05:29:23', '2018-10-19 05:02:09'),
(4, 'Maninagar', 1, 'Surat', '2018-07-31 06:00:24', '2018-08-01 12:27:33'),
(5, 'Paldi', 2, '2', '2018-09-11 07:04:11', '2018-09-15 09:49:15'),
(6, 'Ambawadi', 2, 'Gandhinagar', '2018-09-11 07:06:14', '2018-10-19 06:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(10) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_message` text NOT NULL,
  `shop_no` varchar(10) NOT NULL,
  `msg_read` int(1) NOT NULL DEFAULT '0',
  `created_at` varchar(50) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `user_fullname`, `user_email`, `user_message`, `shop_no`, `msg_read`, `created_at`, `updated_at`) VALUES
(1, 'PARTH MALI', 'parth@gmail.com', 'iiii i i  .  jhb , hbj;', '', 1, '2018-07-31 10:34:51', '2018-07-31 10:34:51'),
(2, 'Dharit Maniar', 'dharit@gmail.com', 'Using lorem ipsum to focus attention on graphic elements in a webpage design proposalIn publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document without relying on meaningful content (also called greeking). Replacing the actual content with placeholder text allows designers to design the form of the content before the content itself has been produced.The lorem ipsum text is typically a scrambled section of De finibus bonorum et malorum, a 1st-century BC Latin text by Cicero, with words altered, added, and removed to make it nonsensical, improper Latin.', '', 1, '2018-07-31 10:39:55', '2018-07-31 10:39:55'),
(3, 'Ramesh', 'raja@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 1, '2018-07-31 10:40:11', '2018-07-31 10:40:11'),
(4, 'Vijay', 'vijay@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 1, '2018-07-31 10:41:40', '2018-07-31 10:41:40'),
(5, 'khushi', 'shahkhushbu2410@gmail.com', 'hello,\r\n\r\nI want to clean my office', '', 1, '2018-11-13 08:06:40', '2018-11-13 08:06:40'),
(6, 'alpesh navadiya', 'alpesh@gmail.com', 'Clean the office', 'A-107', 0, '2018-11-15 12:43:42', '2018-11-15 07:13:42'),
(7, 'alpesh navadiya', 'alpesh@gmail.com', 'dfsdf', 'A-107', 0, '2018-11-17 11:45:26', '2018-11-17 06:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `dtask_management`
--

CREATE TABLE `dtask_management` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `pm_id` int(10) UNSIGNED DEFAULT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `assign_date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `emp_start_time` time DEFAULT NULL,
  `emp_end_time` time DEFAULT NULL,
  `priority` int(1) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leave_management`
--

CREATE TABLE `leave_management` (
  `id` int(11) NOT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `pm_id` int(11) DEFAULT NULL,
  `leave_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `discription` varchar(500) DEFAULT NULL,
  `posting_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_management`
--

INSERT INTO `leave_management` (`id`, `emp_id`, `pm_id`, `leave_id`, `from_date`, `to_date`, `discription`, `posting_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 10, 2, '2018-08-01', '2018-08-16', 'fgdhgg', '2018-08-09', 1, '2018-08-09 09:35:30', '2018-08-13 05:18:08'),
(2, 6, 10, 1, '2018-08-16', '2018-08-17', 'dsffg', '2018-08-09', 3, '2018-08-09 09:48:43', '2018-08-18 05:38:12'),
(3, 7, 10, 3, '2018-08-09', '2018-08-09', 'iuyuiuoioipi-0[po', '2018-08-09', 2, '2018-08-09 09:52:58', '2018-08-18 05:37:51'),
(4, 21, 15, 5, '2018-08-14', '2018-08-16', 'qwerty', '2018-08-10', 2, '2018-08-10 04:56:07', '2018-08-10 04:56:58'),
(5, NULL, 15, 5, '2018-08-01', '2018-08-04', 'abcdefghijklmnopqrstuvwxyz', '2018-08-11', 2, '2018-08-11 05:56:17', '2018-09-15 10:05:14'),
(6, 6, 10, 1, '2018-08-19', '2018-08-22', 'Personal Issue', '2018-08-18', 2, '2018-08-18 05:33:52', '2018-08-18 05:37:42'),
(7, 20, 15, 3, '2018-10-04', '2018-10-10', 'gbfbgf', '2018-10-19', 1, '2018-10-19 06:10:52', '2018-10-19 06:10:52');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(5) UNSIGNED NOT NULL,
  `location_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `created_at`, `updated_at`) VALUES
(1, 'Surat', '2018-07-31 05:22:34', '2018-07-31 05:22:34'),
(2, 'Ahmedabad', '2018-07-31 05:24:02', '2018-07-31 05:24:02'),
(3, 'Mehasana', '2018-07-31 05:25:03', '2018-07-31 05:25:03'),
(4, 'Vapi', '2018-07-31 05:25:11', '2018-07-31 05:25:11'),
(5, 'Vadodara', '2018-07-31 05:25:17', '2018-07-31 05:26:45'),
(6, 'Rajkot', '2018-07-31 05:25:26', '2018-07-31 05:25:26'),
(7, 'Gandhinagar', '2018-07-31 05:26:00', '2018-07-31 05:26:00'),
(8, 'Palanpur', '2018-09-11 07:03:31', '2018-09-11 07:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `title`, `message`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Hello Friends', 'Hello Friend, how are you?', 'employee', '2018-08-07 09:47:16', '2018-08-07 09:47:16'),
(4, 'abcd', 'abcd for employee', 'employee', '2018-08-13 12:17:27', '2018-08-13 12:17:27'),
(5, 'abcd', 'abcd for employee', 'employee', '2018-08-13 12:17:28', '2018-08-13 12:17:28'),
(6, 'abcd', 'abcd', 'employee', '2018-08-13 12:17:55', '2018-08-13 12:17:55'),
(7, 'abcd', 'abcd', 'employee', '2018-08-13 12:18:28', '2018-08-13 12:18:28'),
(8, 'aa', 'bbb', 'employee', '2018-08-13 12:19:04', '2018-08-13 12:19:04'),
(9, 'aa', 'bbb', 'employee', '2018-08-13 12:19:26', '2018-08-13 12:19:26'),
(12, 'abc', 'abcdefg', 'subadmin', '2018-08-13 12:28:06', '2018-08-13 12:28:06'),
(13, 'abcd', 'dgffghfg', 'subadmin', '2018-08-13 12:38:34', '2018-08-13 12:38:34'),
(14, 'abcd', 'gfgjhf', 'employee', '2018-08-13 12:40:03', '2018-08-13 12:40:03'),
(15, 'floar cleanningt', 'trrrrrhfg', 'subadmin', '2018-08-13 13:42:28', '2018-08-13 13:42:28'),
(16, 'qw', 'qwertyuiop', 'employee', '2018-08-13 13:53:37', '2018-08-13 13:53:37'),
(17, 'abcd', 'dddddd', 'subadmin', '2018-08-13 14:33:30', '2018-08-13 14:33:30'),
(18, 'Hello World', 'sfanckjwbvsdvwsb', 'projectmanager', '2018-08-18 11:18:36', '2018-08-18 11:18:36'),
(19, 'Hello World', 'sfanckjwbvsdvwsb', 'projectmanager', '2018-08-18 11:18:51', '2018-08-18 11:18:51'),
(20, 'Hello World', 'sfanckjwbvsdvwsb', 'projectmanager', '2018-08-18 11:21:01', '2018-08-18 11:21:01'),
(21, 'Hwllo Employee', 'How are you all', 'employee', '2018-08-18 11:26:44', '2018-08-18 11:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(2, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(3, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(4, '2016_06_01_000004_create_oauth_clients_table', 1),
(5, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(6, '2018_07_26_100031_create_admin_messages_table', 1),
(7, '2018_07_26_100046_create_branch_table', 1),
(8, '2018_07_26_100054_create_contacts_table', 1),
(9, '2018_07_26_100104_create_locations_table', 1),
(10, '2018_07_26_100115_create_messages_table', 1),
(11, '2018_07_26_100133_create_task_list_table', 1),
(12, '2018_07_26_100142_create_users_table', 1),
(13, '2018_07_26_103402_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('d7644b08-758f-4af8-a885-c4e03080f4bd', 'App\\Notifications\\RepliedToThread', 'App\\Models\\Admin', 1, '{\"repliedTime\":{\"date\":\"2018-08-13 12:40:04.048268\",\"timezone_type\":3,\"timezone\":\"Asia\\/Kolkata\"}}', NULL, '2018-08-13 07:10:04', '2018-08-13 07:10:04'),
('65715333-8b2c-493f-8041-18ee1a9af08d', 'App\\Notifications\\RepliedToThread', 'App\\Models\\Admin', 1, '{\"repliedTime\":{\"date\":\"2018-08-13 12:40:04.088271\",\"timezone_type\":3,\"timezone\":\"Asia\\/Kolkata\"}}', NULL, '2018-08-13 07:10:04', '2018-08-13 07:10:04'),
('2eadef3e-18ea-4c6d-9e23-13c554a4904e', 'App\\Notifications\\RepliedToThread', 'App\\Models\\Admin', 1, '{\"repliedTime\":{\"date\":\"2018-08-13 12:40:04.245280\",\"timezone_type\":3,\"timezone\":\"Asia\\/Kolkata\"}}', NULL, '2018-08-13 07:10:04', '2018-08-13 07:10:04'),
('d709c1ef-b119-4226-a0d0-66402cbcf943', 'App\\Notifications\\RepliedToThread', 'App\\Models\\Admin', 1, '{\"repliedTime\":{\"date\":\"2018-08-13 12:40:04.316284\",\"timezone_type\":3,\"timezone\":\"Asia\\/Kolkata\"}}', NULL, '2018-08-13 07:10:04', '2018-08-13 07:10:04'),
('dcf8a87c-3767-4466-af96-74f68d76e28f', 'App\\Notifications\\RepliedToThread', 'App\\Models\\Admin', 1, '{\"repliedTime\":{\"date\":\"2018-08-13 12:40:04.356286\",\"timezone_type\":3,\"timezone\":\"Asia\\/Kolkata\"}}', NULL, '2018-08-13 07:10:04', '2018-08-13 07:10:04'),
('4dd3eb7a-64a7-460b-ad6c-86df9abd83a9', 'App\\Notifications\\RepliedToThread', 'App\\Models\\Admin', 1, '{\"id\":101,\"title\":\"this is post title\"}', NULL, '2018-08-13 08:12:28', '2018-08-13 08:12:28'),
('7271ffb4-b0dc-4254-9fc2-d03c92f81998', 'App\\Notifications\\RepliedToThread', 'App\\Models\\Admin', 1, '{\"id\":101,\"title\":\"this is post title\"}', NULL, '2018-08-13 08:23:38', '2018-08-13 08:23:38'),
('41b63247-891a-438c-98c3-d3b8d83a5552', 'App\\Notifications\\RepliedToThread', 'App\\Models\\Admin', 1, '{\"id\":101,\"title\":\"this is abcd post title\"}', NULL, '2018-08-13 09:03:31', '2018-08-13 09:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'subadmin'),
(3, 'employee'),
(4, 'projectmanager'),
(5, 'cashoperator');

-- --------------------------------------------------------

--
-- Table structure for table `store_managment`
--

CREATE TABLE `store_managment` (
  `id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `qun` int(11) NOT NULL DEFAULT '0',
  `emp_id` int(11) NOT NULL DEFAULT '0',
  `allocate_qun` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

CREATE TABLE `task_list` (
  `tasklist_id` int(10) UNSIGNED NOT NULL,
  `task_name` varchar(250) NOT NULL,
  `task_price` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_list`
--

INSERT INTO `task_list` (`tasklist_id`, `task_name`, `task_price`, `created_at`, `updated_at`) VALUES
(1, 'floor cleanning', 500, '2018-08-06 11:38:26', '2018-09-12 05:36:24'),
(2, 'shop cleanning', 50, '2018-08-06 11:42:07', '2018-08-07 10:22:24'),
(3, 'toilet cleanning', 50000, '2018-08-07 10:20:35', '2018-08-07 10:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `task_management`
--

CREATE TABLE `task_management` (
  `task_id` int(10) UNSIGNED NOT NULL,
  `pm_id` int(10) UNSIGNED DEFAULT NULL,
  `emp_id` int(10) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `assign_date` date NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `emp_start_time` time DEFAULT NULL,
  `emp_end_time` time DEFAULT NULL,
  `priority` int(1) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `fixed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_management`
--

INSERT INTO `task_management` (`task_id`, `pm_id`, `emp_id`, `title`, `description`, `assign_date`, `start_time`, `end_time`, `emp_start_time`, `emp_end_time`, `priority`, `image`, `status`, `created_at`, `updated_at`, `fixed`) VALUES
(1, NULL, 6, 'floor cleanning', NULL, '2018-11-23', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-11-21 12:04:54', NULL, 1),
(2, NULL, 7, 'floor cleanning', NULL, '2018-11-23', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-11-21 12:04:54', NULL, 1),
(3, NULL, 20, 'floor cleanning', NULL, '2018-11-23', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-11-21 12:04:54', NULL, 1),
(4, NULL, 21, 'floor cleanning', NULL, '2018-11-23', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-11-21 12:04:54', NULL, 1),
(5, NULL, 22, 'floor cleanning', NULL, '2018-11-23', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-11-21 12:04:54', NULL, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `task_management_view`
-- (See below for the actual view)
--
CREATE TABLE `task_management_view` (
`task_id` int(10) unsigned
,`pm_id` int(10) unsigned
,`emp_id` int(10)
,`title` varchar(200)
,`description` text
,`assign_date` date
,`start_time` time
,`end_time` time
,`emp_start_time` time
,`emp_end_time` time
,`priority` int(1)
,`image` varchar(200)
,`status` int(1)
,`created_at` datetime
,`updated_at` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `block` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `alternate_mobile` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`, `password`, `address`, `location_id`, `branch_id`, `block`, `shop_no`, `floor_no`, `mobile`, `alternate_mobile`, `status`, `api_token`, `remember_token`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 'Dharit', 'dharit@gmail.com', 4110, '$2y$10$JK2LBPeDnzDoe7FVzVSP8.QkJttr4T2OTn5v//zcZUhE9SFwdtTPq', 'navrangpura', 1, 4, 'A', '105', '2', '1234567890', '1234567890', 1, NULL, 'wfFW3lYTInW598bJWpj2DqipsNyNHqA29VJMQyjdsoqEGtAseufbXvHBg620', 'Jce4MQ67n5C4XYRmltmFRBxHl9EGjv7MnY2mvxuk', '2018-08-06 10:58:03', '2018-11-16 10:19:37'),
(2, 'parth mali', 'parth@gmail.com', 5950, '$2y$10$CI25UG3HhPM9Z3djmqHXQOxrdWmmJYTh3yTqaEprlreDaVlwzndGW', 'kdm company', 2, 2, 'A', '127', '2', '9173821005', '1234569870', 1, NULL, 'hlnp6rBIreT0wrjQlF6acI6YMoxWgnL4S6GiskxAtcKzw1AVcwsp7HyQcV3h', 'e8j3MsWFQOyrWiWuClyye9O2X0iOfEx88kuqQ1ku', '2018-08-06 11:52:24', '2018-10-19 06:22:18'),
(3, 'Ramesh', 'ramesh@gmail.com', 5000, '$2y$10$URn8MTBbcwbOO7uhIhXgWu32zxQy1TgRRZyo6CNevj9hp63upz.Jq', 'Ahmedabad', 1, 4, 'A', '104', '1', '9227471002', '9824008426', 1, NULL, 'yfe1biSSGotZNxnvRu5CgBXqqrXKq3Ip51h5Q4X4PgdgyFvSP8DfaTwcyKPE', 'A6xFj9pgTnhNWx0fGdgDav1RiFasZVxQFjM38LNi', '2018-08-13 04:03:53', '2018-08-13 05:16:34'),
(4, 'abcd', 'abc@gmail.com', 150, '$2y$10$.z8jEX/0e9cnPXSNNLqaROdNtALC.MZue1OPmA10HWae8dcIFe5Vu', 'ahmedabad', 1, 4, 'A', '106', '1', '1234567890', '1234567890', 0, NULL, 'orjVElHTRkuda6VHCQKBIZGqmwnQRISsdqBvkl3zEPyGd4ILwCQgt4mZLYaT', NULL, '2018-08-17 18:30:00', '2018-10-19 05:50:49'),
(6, 'parth mali', 'parth123456789@gmail.com', 0, '$2y$10$/h5KqkxFfyFkKQyWiZe3Xek62HZxJJAF19pMD1X9gtYb3jjBT5XbC', 'kalupur', 2, 3, 'B', '201', '1', '9173821005', '9409556737', 1, NULL, 'Cu9Vy1t8V4QfhGaJXnuS2DKqe9OnHCYJZoiwpgrSY1DCu5gXM9cZfZugSNhC', NULL, '2018-10-15 09:40:19', '2018-10-15 04:35:27'),
(7, 'dharit', 'dharit123@gmail.com', 0, '$2y$10$tIQEtsksxODAmpV0vsSP3.VVsrzvGAGutcqfDEF.rGEej.8iRu0I.', 'na', 1, 4, 'A', '106', '9', '9876543210', '9876543210', 1, NULL, '85fKPEeOA2vMgnSkWDiFEiqcgjSJDOzTseIelJJkvX5Lqt2tgUUhVT3mpcqW', NULL, '2018-11-13 14:39:43', '2018-11-13 09:09:49'),
(8, 'demo', 'demo@gmail.com', 0, '$2y$10$zuTQCRm9h9DKwRfbH2FTbOoIcQ8o/AvSKxPJ9FWpko6Jdwh6iiuOO', '.', 1, 4, 'A', '111', '1', '9876543210', '9876543210', 1, NULL, 'c9aVH2WDibp7O8lVpzminagombGsRfQM8n6MW42meHL5SnfV00QCptMZQtJB', NULL, '2018-11-15 12:49:59', '2018-11-15 09:10:19'),
(9, 'shaikh', 'zashaikh007@gmail.com', 1000, '$2y$10$6nem.j47LEZi0Zg11TBxYOWLkKY9BOIn0cA1GXHXwwD/ogzKSQldS', 'hgh', 2, 3, 'B', '101', '1', '8672853811', '9824039008', 1, NULL, 'VqLphs0e0jtGC3WF8AqBupgIs8MPOCJEK0Krhj3MmFw7J7S6M1H8fJVRPu0u', NULL, '2018-11-17 13:53:56', '2018-11-17 08:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_service_request`
--

CREATE TABLE `user_service_request` (
  `service_req` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `pm_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `service_id` int(11) NOT NULL,
  `service_price` int(10) NOT NULL,
  `service_date` date NOT NULL,
  `service_start_time` time NOT NULL,
  `service_end_time` time NOT NULL,
  `emp_start_time` time DEFAULT NULL,
  `emp_end_time` time DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `location` int(5) NOT NULL,
  `branch` int(5) NOT NULL,
  `block` varchar(50) NOT NULL,
  `floor` varchar(50) DEFAULT NULL,
  `shop_no` int(11) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_service_request`
--

INSERT INTO `user_service_request` (`service_req`, `user_id`, `pm_id`, `emp_id`, `service_id`, `service_price`, `service_date`, `service_start_time`, `service_end_time`, `emp_start_time`, `emp_end_time`, `address`, `location`, `branch`, `block`, `floor`, `shop_no`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 15, 21, 1, 500, '2018-08-07', '15:54:00', '16:54:00', NULL, NULL, 'kdm company', 2, 2, 'A', '2', 127, NULL, 2, '2018-08-07 10:26:53', '2018-08-07 10:26:53'),
(2, 2, 15, 22, 2, 50, '2018-08-07', '15:54:00', '16:54:00', NULL, NULL, 'kdm company', 2, 2, 'A', '2', 127, NULL, 2, '2018-08-07 10:50:43', '2018-08-07 10:50:43'),
(3, 2, 15, NULL, 2, 50000, '2018-08-07', '15:54:00', '16:54:00', NULL, NULL, 'kdm company', 2, 2, 'A', '2', 127, NULL, 2, '2018-08-08 06:54:24', '2018-08-08 06:54:24'),
(4, 2, 15, NULL, 2, 1000, '2018-12-07', '15:54:00', '16:54:00', NULL, NULL, 'kdm company', 2, 2, 'A', '2', 127, NULL, 2, '2018-11-17 10:39:12', '2018-11-17 10:39:12'),
(5, 1, 15, 20, 1, 500, '2018-08-18', '11:36:00', '00:30:00', '11:47:43', '11:55:34', 'navrangpura', 1, 4, 'A', '2', 105, '49079.18-08-18.1534573534.jpg', 6, '2018-08-18 06:26:11', '2018-08-18 06:26:11'),
(6, 2, 15, NULL, 1, 500, '2018-10-20', '11:25:00', '12:25:00', NULL, NULL, 'kdm company', 2, 2, 'A', '2', 127, NULL, 1, '2018-10-19 04:58:05', '2018-10-19 04:58:05'),
(7, 2, 15, 20, 2, 50, '2018-10-20', '11:25:00', '12:25:00', '11:50:04', '11:51:01', 'kdm company', 2, 2, 'A', '2', 127, '', 6, '2018-10-19 06:22:18', '2018-10-19 06:22:18'),
(8, 2, 15, NULL, 3, 50000, '2018-10-20', '11:25:00', '12:25:00', NULL, NULL, 'kdm company', 2, 2, 'A', '2', 127, NULL, 1, '2018-10-19 04:58:05', '2018-10-19 04:58:05'),
(9, 2, 15, 20, 4, 1000, '2018-10-20', '11:25:00', '12:25:00', '11:03:04', '11:03:15', 'kdm company', 2, 2, 'A', '2', 127, '', 6, '2018-10-19 05:34:59', '2018-10-19 05:34:59'),
(10, 8, 15, NULL, 1, 500, '2018-11-15', '12:50:00', '12:59:00', NULL, NULL, '.', 1, 4, 'A', '1', 111, NULL, 1, '2018-11-15 07:21:30', '2018-11-15 07:21:30'),
(11, 1, 15, NULL, 2, 50, '2018-11-15', '14:45:00', '14:55:00', NULL, NULL, 'navrangpura', 1, 4, 'A', '2', 105, NULL, 1, '2018-11-15 09:15:45', '2018-11-15 09:15:45'),
(12, 9, 10, NULL, 1, 500, '2018-11-18', '14:54:00', '05:25:00', NULL, NULL, 'hgh', 2, 3, 'B', '1', 101, NULL, 1, '2018-11-17 08:24:34', '2018-11-17 08:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_transaction`
--

CREATE TABLE `user_transaction` (
  `trans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `service_name` text,
  `description` varchar(100) DEFAULT NULL,
  `credit_amount` int(10) DEFAULT NULL,
  `debit_amount` int(10) DEFAULT NULL,
  `current_balance` int(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_transaction`
--

INSERT INTO `user_transaction` (`trans_id`, `user_id`, `name`, `email`, `service_name`, `description`, `credit_amount`, `debit_amount`, `current_balance`, `created_at`, `updated_at`) VALUES
(1, 2, 'parth mali', 'parth@gmail.com', NULL, 'Money Deposit by Cash Operator', 5000, NULL, 5000, '2018-08-06 17:32:03', '2018-08-06 17:32:03'),
(2, 3, 'Ramesh', 'ramesh@gmail.com', NULL, 'Money Deposit by Cash Operator', -345345, NULL, -345345, '2018-08-13 09:38:51', '2018-08-13 09:38:51'),
(3, 3, 'Ramesh', 'ramesh@gmail.com', NULL, 'Money Deposit by Cash Operator', 5000, NULL, 5000, '2018-08-13 09:41:11', '2018-08-13 09:41:11'),
(4, 2, 'parth mali', 'parth@gmail.com', NULL, 'Money Deposit by Cash Operator', 2000, NULL, 7000, '2018-08-13 09:41:55', '2018-08-13 09:41:55'),
(5, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 1000, NULL, 1000, '2018-08-13 09:52:07', '2018-08-13 09:52:07'),
(6, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', -1000, NULL, 0, '2018-08-13 09:52:39', '2018-08-13 09:52:39'),
(7, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 1000, NULL, 1000, '2018-08-13 09:52:59', '2018-08-13 09:52:59'),
(8, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 1, NULL, 1001, '2018-08-13 09:53:08', '2018-08-13 09:53:08'),
(9, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 0, NULL, 1001, '2018-08-13 09:53:24', '2018-08-13 09:53:24'),
(10, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', -1, NULL, 1000, '2018-08-13 09:54:42', '2018-08-13 09:54:42'),
(11, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', -100, NULL, 900, '2018-08-13 09:55:03', '2018-08-13 09:55:03'),
(12, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', -900, NULL, 0, '2018-08-13 09:55:36', '2018-08-13 09:55:36'),
(13, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 1000, NULL, 1000, '2018-08-13 09:55:44', '2018-08-13 09:55:44'),
(14, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', -900, NULL, 100, '2018-08-13 09:55:52', '2018-08-13 09:55:52'),
(15, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 1, NULL, 101, '2018-08-13 10:00:41', '2018-08-13 10:00:41'),
(16, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 1, NULL, 102, '2018-08-13 10:03:48', '2018-08-13 10:03:48'),
(17, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 10, NULL, 112, '2018-08-13 10:15:30', '2018-08-13 10:15:30'),
(18, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 10, NULL, 122, '2018-08-13 10:28:21', '2018-08-13 10:28:21'),
(19, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 1000, NULL, 1122, '2018-08-13 10:45:58', '2018-08-13 10:45:58'),
(20, 4, 'abcd', 'abc@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 50, '2018-08-18 14:26:12', '2018-08-18 14:26:12'),
(21, 4, 'abcd', 'abc@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 100, '2018-08-18 14:26:31', '2018-08-18 14:26:31'),
(22, 4, 'abcd', 'abc@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 150, '2018-08-18 14:33:35', '2018-08-18 14:33:35'),
(23, 5, 'def', 'ddd@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 50, '2018-08-18 14:37:06', '2018-08-18 14:37:06'),
(24, 5, 'def', 'ddd@gmail.com', NULL, 'Money Deposit by Cash Operator', 10, NULL, 60, '2018-08-18 14:45:11', '2018-08-18 14:45:11'),
(25, 1, 'Dharit', 'dharit@gmail.com', 'floor cleanning', 'Money Debited by employee', NULL, 500, 622, '2018-08-18 11:56:10', '2018-08-18 11:56:10'),
(26, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 388, NULL, 1010, '2018-08-18 15:16:32', '2018-08-18 15:16:32'),
(27, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 388, NULL, 1398, '2018-08-18 15:16:34', '2018-08-18 15:16:34'),
(28, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 388, NULL, 1786, '2018-08-18 15:16:34', '2018-08-18 15:16:34'),
(29, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 388, NULL, 2174, '2018-08-18 15:16:34', '2018-08-18 15:16:34'),
(30, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 388, NULL, 2562, '2018-08-18 15:16:35', '2018-08-18 15:16:35'),
(31, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 388, NULL, 2950, '2018-08-18 15:16:35', '2018-08-18 15:16:35'),
(32, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3000, '2018-08-18 15:16:59', '2018-08-18 15:16:59'),
(33, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3050, '2018-08-18 15:17:04', '2018-08-18 15:17:04'),
(34, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3100, '2018-08-18 15:17:05', '2018-08-18 15:17:05'),
(35, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3150, '2018-08-18 15:17:06', '2018-08-18 15:17:06'),
(36, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3200, '2018-08-18 15:17:29', '2018-08-18 15:17:29'),
(37, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3250, '2018-08-18 15:17:29', '2018-08-18 15:17:29'),
(38, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3300, '2018-08-18 15:17:29', '2018-08-18 15:17:29'),
(39, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3350, '2018-08-18 15:17:30', '2018-08-18 15:17:30'),
(40, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3400, '2018-08-18 15:17:30', '2018-08-18 15:17:30'),
(41, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3450, '2018-08-18 15:17:30', '2018-08-18 15:17:30'),
(42, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3500, '2018-08-18 15:17:30', '2018-08-18 15:17:30'),
(43, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3550, '2018-08-18 15:17:30', '2018-08-18 15:17:30'),
(44, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3600, '2018-08-18 15:17:31', '2018-08-18 15:17:31'),
(45, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3650, '2018-08-18 15:17:34', '2018-08-18 15:17:34'),
(46, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3700, '2018-08-18 15:17:34', '2018-08-18 15:17:34'),
(47, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3750, '2018-08-18 15:17:34', '2018-08-18 15:17:34'),
(48, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3800, '2018-08-18 15:17:35', '2018-08-18 15:17:35'),
(49, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3850, '2018-08-18 15:17:35', '2018-08-18 15:17:35'),
(50, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3900, '2018-08-18 15:17:35', '2018-08-18 15:17:35'),
(51, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 3950, '2018-08-18 15:17:36', '2018-08-18 15:17:36'),
(52, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 4000, '2018-08-18 15:17:55', '2018-08-18 15:17:55'),
(53, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 4050, '2018-08-18 15:18:20', '2018-08-18 15:18:20'),
(54, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 50, NULL, 4100, '2018-08-18 15:18:38', '2018-08-18 15:18:38'),
(55, 5, 'def', 'ddd@gmail.com', NULL, 'Money Deposit by Cash Operator', 10, NULL, 70, '2018-08-18 15:19:22', '2018-08-18 15:19:22'),
(56, 5, 'def', 'ddd@gmail.com', NULL, 'Money Deposit by Cash Operator', 70, NULL, 140, '2018-08-18 15:19:42', '2018-08-18 15:19:42'),
(57, 5, 'def', 'ddd@gmail.com', NULL, 'Money Deposit by Cash Operator', 70, NULL, 210, '2018-08-18 15:19:43', '2018-08-18 15:19:43'),
(58, 5, 'def', 'ddd@gmail.com', NULL, 'Money Deposit by Cash Operator', 70, NULL, 280, '2018-08-18 15:19:43', '2018-08-18 15:19:43'),
(59, 1, 'Dharit', 'dharit@gmail.com', NULL, 'Money Deposit by Cash Operator', 10, NULL, 4110, '2018-10-15 10:27:32', '2018-10-15 10:27:32'),
(60, 2, 'parth mali', 'parth@gmail.com', 'abc', 'Money Debited by employee', NULL, 1000, 6000, '2018-10-19 05:34:59', '2018-10-19 05:34:59'),
(61, 2, 'parth mali', 'parth@gmail.com', 'shop cleanning', 'Money Debited by employee', NULL, 50, 5950, '2018-10-19 06:22:18', '2018-10-19 06:22:18'),
(62, 9, 'shaikh', 'zashaikh007@gmail.com', NULL, 'Money Deposit by Cash Operator', 500, NULL, 500, '2018-11-17 08:28:43', '2018-11-17 08:28:43'),
(63, 9, 'shaikh', 'zashaikh007@gmail.com', NULL, 'Money Deposit by Cash Operator', 500, NULL, 1000, '2018-11-17 08:28:47', '2018-11-17 08:28:47');

-- --------------------------------------------------------

--
-- Structure for view `task_management_view`
--
DROP TABLE IF EXISTS `task_management_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`namastejico`@`localhost` SQL SECURITY DEFINER VIEW `task_management_view`  AS  select `task_management`.`task_id` AS `task_id`,`task_management`.`pm_id` AS `pm_id`,`task_management`.`emp_id` AS `emp_id`,`task_management`.`title` AS `title`,`task_management`.`description` AS `description`,`task_management`.`assign_date` AS `assign_date`,`task_management`.`start_time` AS `start_time`,`task_management`.`end_time` AS `end_time`,`task_management`.`emp_start_time` AS `emp_start_time`,`task_management`.`emp_end_time` AS `emp_end_time`,`task_management`.`priority` AS `priority`,`task_management`.`image` AS `image`,`task_management`.`status` AS `status`,`task_management`.`created_at` AS `created_at`,`task_management`.`updated_at` AS `updated_at` from `task_management` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_leave`
--
ALTER TABLE `add_leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `add_money`
--
ALTER TABLE `add_money`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_email(50)_index` (`email`(50));

--
-- Indexes for table `admin_messages`
--
ALTER TABLE `admin_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `allocate_items`
--
ALTER TABLE `allocate_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `dtask_management`
--
ALTER TABLE `dtask_management`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `leave_management`
--
ALTER TABLE `leave_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_managment`
--
ALTER TABLE `store_managment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_list`
--
ALTER TABLE `task_list`
  ADD PRIMARY KEY (`tasklist_id`);

--
-- Indexes for table `task_management`
--
ALTER TABLE `task_management`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_service_request`
--
ALTER TABLE `user_service_request`
  ADD PRIMARY KEY (`service_req`);

--
-- Indexes for table `user_transaction`
--
ALTER TABLE `user_transaction`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_leave`
--
ALTER TABLE `add_leave`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `add_money`
--
ALTER TABLE `add_money`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `admin_messages`
--
ALTER TABLE `admin_messages`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `allocate_items`
--
ALTER TABLE `allocate_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dtask_management`
--
ALTER TABLE `dtask_management`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_management`
--
ALTER TABLE `leave_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `store_managment`
--
ALTER TABLE `store_managment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_list`
--
ALTER TABLE `task_list`
  MODIFY `tasklist_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task_management`
--
ALTER TABLE `task_management`
  MODIFY `task_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_service_request`
--
ALTER TABLE `user_service_request`
  MODIFY `service_req` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_transaction`
--
ALTER TABLE `user_transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
