-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2020 at 03:57 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gtrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `street`, `barangay`, `town`, `postal_code`, `created_at`, `updated_at`) VALUES
(3, 'Rotunda', 'Poblacion', 'Compostela', '6003', '2020-10-23 21:29:16', '2020-10-23 21:29:16'),
(4, 'Rotunda', 'Poblacion', 'Compostela', '6003', '2020-10-23 21:30:27', '2020-10-23 21:30:27'),
(5, 'backstreet', 'westlife', 'california', '6000', '2020-10-25 05:53:00', '2020-10-25 05:53:00'),
(6, 'asdasd', 'asdasd', 'asdasd', '123', '2020-10-26 05:41:02', '2020-10-26 05:41:02'),
(7, 'asda123123123', 'asdasd123123123', 'asdasd123123123', '123123123123', '2020-10-26 05:41:02', '2020-10-25 23:06:29'),
(8, 'asdasd123', 'asdasd123', 'asdasd123', '123123', '2020-10-25 22:58:12', '2020-10-25 22:58:12'),
(9, 'asdasd123', 'asdasd123', 'asdasd123', '123123', '2020-10-25 22:59:16', '2020-10-25 22:59:16'),
(10, 'asdasd123', 'asdasd123', 'asdasd123', '123123', '2020-10-25 23:06:29', '2020-10-25 23:06:29'),
(11, 'asdasd123', 'asdasd123', 'asdasd123', '123123', '2020-10-25 23:56:54', '2020-10-25 23:56:54'),
(13, 'asdasd', 'asdasd', 'asdasd', '123', '2020-10-26 00:01:26', '2020-10-26 00:01:26'),
(14, 'asdasd', 'asdasd', 'asdasd', '123', '2020-10-26 00:02:35', '2020-10-26 00:02:35'),
(15, 'asdasd', 'asdasd', 'asdasd', '123', '2020-10-26 00:11:02', '2020-10-26 00:11:02'),
(16, 'asdasd', 'asdasd', 'asdasd', '123', '2020-10-26 00:23:27', '2020-10-26 00:23:27'),
(17, 'Back', 'Konoha', 'Fire', '7', '2020-10-26 08:34:36', '2020-10-26 08:34:36'),
(18, 'Front', 'Konoha', 'zxczxc', '7', '2020-10-26 08:34:36', '2020-10-26 08:34:36'),
(19, 'asdasd', 'asdasd123', 'Fire', '7', '2020-10-26 08:35:39', '2020-10-26 08:35:39'),
(20, 'Front', 'asdasd123123', 'asdasd123', '7', '2020-10-26 08:35:39', '2020-10-26 08:35:39'),
(21, 'asdasd123', 'asdasd', 'asd', '7', '2020-10-26 08:37:13', '2020-10-26 08:37:13'),
(22, 'asd', 'asd', 'asd', '7', '2020-10-26 08:37:13', '2020-10-26 08:37:13'),
(24, 'Front', 'asdasd123123123', 'asdasd123123', '7', '2020-10-26 08:37:53', '2020-10-26 08:37:53'),
(25, 'asdasd123', 'asdasd', 'asd', '7', '2020-10-26 00:39:30', '2020-10-26 00:39:30'),
(27, 'Front', 'Konoha', 'asdasd123123', '7', '2020-10-26 14:33:09', '2020-10-26 14:33:09'),
(28, 'asd', 'asd', 'asd', '7', '2020-10-26 17:48:05', '2020-10-26 17:48:05'),
(29, 'asdasd123', 'asdasd123', 'asdasd123', '7', '2020-10-27 04:51:39', '2020-10-27 04:51:39'),
(30, 'Front', 'Konoha', 'asdasd123123123', '7', '2020-10-27 04:51:40', '2020-10-26 23:47:51'),
(32, 'asda123123', 'qweqwe', 'asdasd123123123', '7', '2020-10-27 08:31:41', '2020-10-27 08:31:41'),
(33, 'k', 'i', 'l', '666', '2020-11-08 22:46:50', '2020-11-08 22:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `user_id`, `title`, `content`, `image_id`, `created_at`, `updated_at`) VALUES
(19, 3, 'What’s new in Chrome 79', 'adasdasdasd', 15, '2020-10-26 20:45:24', '2020-10-26 20:45:24'),
(20, 3, 'asdasd', 'asdasd', 17, '2020-10-26 21:41:33', '2020-10-26 21:41:33'),
(21, 3, 'asdasd', 'asdasd', 19, '2020-10-26 22:01:30', '2020-10-26 22:56:50'),
(22, 3, 'asdasd', 'asdasd', NULL, '2020-10-26 22:07:14', '2020-10-26 22:07:14'),
(25, 3, 'asdasd123', 'asdasd123', 18, '2020-10-26 22:32:22', '2020-10-26 23:28:04'),
(26, 4, 'haha', 'kill me', NULL, '2020-11-08 23:46:20', '2020-11-08 23:46:20');

-- --------------------------------------------------------

--
-- Table structure for table `dumpsters`
--

CREATE TABLE `dumpsters` (
  `dumpter_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dumpsters`
--

INSERT INTO `dumpsters` (`dumpter_id`, `address_id`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 22, 'asdas', 'asd', '2020-10-26 10:30:59', '2020-10-26 10:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `participants` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `contact_person_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `address_id`, `event_name`, `description`, `image_id`, `participants`, `date`, `contact_person_id`, `status`, `created_at`, `updated_at`) VALUES
(19, 29, 'ahsfjhasdf', 'qwewe123', 16, 'asdasd123', '2020-11-28 00:00:00', 10, 1, '2020-10-26 20:51:40', '2020-11-09 01:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image_1`, `image_2`, `image_3`, `image_4`, `created_at`, `updated_at`) VALUES
(15, 'Nmxhefc7lwhEMs6s.png', 'VzDoZen9OGWtTj6N.png', '28UjZfRiwyP968tc.png', '0iMSeujGRFui5AkS.png', '2020-10-26 20:45:23', '2020-10-26 20:45:23'),
(16, '5WDWBkLcTp1apQKw.jpg', NULL, NULL, NULL, '2020-10-26 20:51:39', '2020-11-09 01:42:08'),
(17, 'KqrR0hrY2E4ov73i.png', 'y3bc8HJPSMcPUJ8v.png', 'NeFQlBHrcmvoVw4V.png', 'ngkgnTJKgKCBU7FV.png', '2020-10-26 21:41:33', '2020-10-26 21:41:33'),
(18, 'wW83rvdADw9EMQof.png', 'T1msFbcuqU7SZo86.png', 'ikQdx6OfPq2OUGow.png', 'xlBvnc08mXn49bua.png', '2020-10-26 22:32:22', '2020-10-26 23:28:04'),
(19, 'cipyHVnrqNHQPiSq.png', 't6tXp3QbsxmbH6M8.png', 'D4lCdumKHThKD5QQ.png', 'eLWzV0vEHqqgZGz3.png', '2020-10-26 22:56:50', '2020-10-26 22:56:50');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_12_083638_create_addresses_table', 1),
(5, '2020_10_12_083725_create_user_details_table', 1),
(6, '2020_10_12_083834_create_announcements_table', 1),
(7, '2020_10_12_083849_create_images_table', 1),
(8, '2020_10_12_084348_create_schedules_table', 1),
(9, '2020_10_12_084412_create_trucks_table', 1),
(10, '2020_10_12_085639_create_dumpsters_table', 1),
(11, '2020_10_12_085706_create_waste_collections_table', 1),
(12, '2020_10_12_085804_create_events_table', 1),
(13, '2020_10_12_085844_create_reports_table', 1),
(14, '2020_10_12_101020_add_to_announcement', 1),
(15, '2020_10_12_101215_create_truck_assignments_table', 1),
(16, '2020_10_12_101326_add_to_schedules', 1),
(17, '2020_10_12_101829_add_to_users', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` bigint(20) UNSIGNED NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `schedule` datetime NOT NULL,
  `garbage_type` enum('Nonbiodegradable','Biodegradable') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `truck_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plate_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`truck_id`, `user_id`, `plate_no`, `active`, `created_at`, `updated_at`) VALUES
(1, 2, 'XA3306', 1, '2020-10-26 10:12:20', '2020-11-10 06:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `truck_assignments`
--

CREATE TABLE `truck_assignments` (
  `assignment_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` bigint(20) UNSIGNED NOT NULL,
  `truck_id` bigint(20) UNSIGNED NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Poblacion',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_detail_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` enum('Admin','Driver') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_detail_id`, `email`, `user_type`, `email_verified_at`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'rjoliverio18@gmail.com', 'Admin', NULL, '$2y$10$8y8arG3oaQ0I8TBrsRCHT.yYDV2WCLy3kZBexMQH/xCoj7aAxZQ.u', NULL, 1, '2020-10-23 21:29:16', '2020-10-23 21:29:16'),
(2, 2, 'aljann3ondoy@gmail.com', 'Driver', NULL, '$2y$10$mGS4NtjVte7/7EfbJc0doO8hXEcq0Qr7YW3/cpmO9XOdRTQppiljK', NULL, 1, '2020-10-23 21:30:27', '2020-11-09 00:47:27'),
(3, 3, 'tonystark@yahoo.com', 'Admin', NULL, '$2y$10$uQohBaAi8q.7nJl4MoKDQ.BuAAjuFrJKS/QdgJzLqZoBuBjKJDBWi', NULL, 1, '2020-10-25 05:53:02', '2020-10-25 05:53:02'),
(4, 12, 'hu@me.com', 'Admin', NULL, '$2y$10$kd5Izc.oZ5RwY5jOVRa0eumktiatg9KtKKejtdHkgTpiwFzzFtvEC', NULL, 1, '2020-11-08 22:46:51', '2020-11-08 22:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_detail_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_detail_id`, `fname`, `lname`, `image`, `contact_no`, `address_id`, `age`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Rj', 'Oliverio', 'user.png', '09123456789', 3, 21, 'Male', '2020-10-23 21:29:16', '2020-10-23 21:29:16'),
(2, 'Aljann', 'Ondoy', 'user.png', '09123456789', 4, 21, 'Male', '2020-10-23 21:30:27', '2020-10-23 21:30:27'),
(3, 'tony', 'stark', 'user.png', '123456', 5, 50, 'Male', '2020-10-25 05:53:00', '2020-10-25 05:53:00'),
(4, 'asdasd', 'asdasd', '106-512.png', '123123', 7, 45, 'Male', '2020-10-26 05:41:02', '2020-10-26 00:23:27'),
(5, 'Hiruzen', 'Sarutobi', '106-512.png', '12345678', 18, 70, 'Male', '2020-10-26 08:34:36', '2020-10-26 08:34:36'),
(10, 'asdasd', 'asdasd123', 'bike1.jpg', '123123', 30, 50, 'Male', '2020-10-27 04:51:40', '2020-11-09 01:42:08'),
(12, 'Humera', 'Killme', 'user.png', '666', 33, 14, 'Female', '2020-11-08 22:46:51', '2020-11-08 22:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `waste_collections`
--

CREATE TABLE `waste_collections` (
  `weight_id` bigint(20) UNSIGNED NOT NULL,
  `collector_id` bigint(20) UNSIGNED NOT NULL,
  `garbage_weight` double(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waste_collections`
--

INSERT INTO `waste_collections` (`weight_id`, `collector_id`, `garbage_weight`, `created_at`, `updated_at`) VALUES
(1, 2, 14.00, '2020-10-26 09:31:31', '2020-10-26 09:31:31'),
(2, 1, 12.00, '2020-10-26 09:31:31', '2020-10-26 09:31:31'),
(3, 1, 15.00, '2020-10-29 09:31:31', '2020-10-29 09:31:31'),
(4, 3, 10.00, '2020-10-29 09:31:31', '2020-10-29 09:31:31'),
(5, 1, 11.00, '2020-10-31 09:31:31', '2020-10-31 09:31:31'),
(6, 1, 16.00, '2020-10-31 09:31:31', '2020-10-31 09:31:31'),
(7, 3, 14.00, '2020-11-18 09:31:31', '2020-11-18 09:31:31'),
(8, 1, 13.00, '2020-11-18 09:31:31', '2020-11-18 09:31:31'),
(9, 2, 16.00, '2020-11-19 09:31:31', '2020-11-19 09:31:31'),
(10, 1, 18.00, '2020-11-19 09:31:31', '2020-11-19 09:31:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `announcements_user_id_foreign` (`user_id`),
  ADD KEY `announcements_image_id_foreign` (`image_id`);

--
-- Indexes for table `dumpsters`
--
ALTER TABLE `dumpsters`
  ADD PRIMARY KEY (`dumpter_id`),
  ADD KEY `dumpsters_address_id_foreign` (`address_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `events_address_id_foreign` (`address_id`),
  ADD KEY `events_contact_person_id_foreign` (`contact_person_id`),
  ADD KEY `events_image_id_foreign` (`image_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `reports_driver_id_foreign` (`driver_id`),
  ADD KEY `reports_image_id_foreign` (`image_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `schedules_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`truck_id`),
  ADD KEY `trucks_user_id_foreign` (`user_id`);

--
-- Indexes for table `truck_assignments`
--
ALTER TABLE `truck_assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD UNIQUE KEY `schedule_id` (`schedule_id`),
  ADD KEY `truck_assignments_truck_id_foreign` (`truck_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_detail_id_foreign` (`user_detail_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_detail_id`);

--
-- Indexes for table `waste_collections`
--
ALTER TABLE `waste_collections`
  ADD PRIMARY KEY (`weight_id`),
  ADD KEY `waste_collections_collector_id_foreign` (`collector_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `dumpsters`
--
ALTER TABLE `dumpsters`
  MODIFY `dumpter_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `truck_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `truck_assignments`
--
ALTER TABLE `truck_assignments`
  MODIFY `assignment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `waste_collections`
--
ALTER TABLE `waste_collections`
  MODIFY `weight_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `announcements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `dumpsters`
--
ALTER TABLE `dumpsters`
  ADD CONSTRAINT `dumpsters_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_contact_person_id_foreign` FOREIGN KEY (`contact_person_id`) REFERENCES `user_details` (`user_detail_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reports_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `trucks`
--
ALTER TABLE `trucks`
  ADD CONSTRAINT `trucks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `truck_assignments`
--
ALTER TABLE `truck_assignments`
  ADD CONSTRAINT `truck_assignments_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`schedule_id`),
  ADD CONSTRAINT `truck_assignments_truck_id_foreign` FOREIGN KEY (`truck_id`) REFERENCES `trucks` (`truck_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_detail_id_foreign` FOREIGN KEY (`user_detail_id`) REFERENCES `user_details` (`user_detail_id`);

--
-- Constraints for table `waste_collections`
--
ALTER TABLE `waste_collections`
  ADD CONSTRAINT `waste_collections_collector_id_foreign` FOREIGN KEY (`collector_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
