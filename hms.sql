-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 08:44 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `total_amount` int(11) NOT NULL,
  `total_stay` int(11) NOT NULL,
  `total_people` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_type`, `starting_date`, `ending_date`, `total_amount`, `total_stay`, `total_people`, `room_number`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Single Room', '2016-11-23', '2016-11-26', 4572, 3, 3, 601, 8, '2016-11-22 01:13:17', '2016-11-22 01:13:17'),
(4, 'Single Room', '2016-11-24', '2016-11-30', 5215, 7, 4, 603, 9, '2016-11-22 02:12:02', '2016-11-22 02:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(77, '2014_10_12_000000_create_users_table', 1),
(78, '2014_10_12_100000_create_password_resets_table', 1),
(79, '2016_10_29_051530_create_roles_table', 1),
(80, '2016_10_29_051731_create_bookings_table', 1),
(81, '2016_10_29_053134_create_roomtypes_table', 1),
(82, '2016_10_29_053234_create_paths_table', 1),
(83, '2016_10_29_053331_create_rooms_table', 1),
(84, '2016_11_02_172023_create_user_activations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

CREATE TABLE `paths` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`id`, `path`, `room_id`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', 9, '2016-11-05 16:51:28', '2016-11-05 16:51:28'),
(2, '2.jpg', 9, '2016-11-05 16:51:28', '2016-11-05 16:51:28'),
(36, '1507909_545919105506875_1067818608_n.jpg', 11, '2016-11-15 11:38:14', '2016-11-15 11:38:14'),
(37, '1558760_612788695449781_719243410_n.jpg', 11, '2016-11-15 11:38:14', '2016-11-15 11:38:14'),
(38, '404-text-texture.jpg', 12, '2016-11-16 12:51:54', '2016-11-16 12:51:54'),
(39, 'blog-post2.jpg', 12, '2016-11-16 12:51:55', '2016-11-16 12:51:55'),
(40, '1.jpg', 13, '2016-11-16 12:54:39', '2016-11-16 12:54:39'),
(41, '2.jpg', 13, '2016-11-16 12:54:39', '2016-11-16 12:54:39'),
(42, 'room8.jpg', 14, '2016-11-16 12:56:08', '2016-11-16 12:56:08'),
(43, 'room9.jpg', 14, '2016-11-16 12:56:08', '2016-11-16 12:56:08'),
(44, 'room10.jpg', 14, '2016-11-16 12:56:08', '2016-11-16 12:56:08'),
(45, 'room11.jpg', 14, '2016-11-16 12:56:08', '2016-11-16 12:56:08'),
(46, 'room12.jpg', 14, '2016-11-16 12:56:08', '2016-11-16 12:56:08'),
(47, 'room-slider-thumb6.jpg', 15, '2016-11-16 13:00:35', '2016-11-16 13:00:35'),
(48, 'room-slider-thumb7.jpg', 15, '2016-11-16 13:00:36', '2016-11-16 13:00:36'),
(49, 'room-slider-thumb8.jpg', 15, '2016-11-16 13:00:36', '2016-11-16 13:00:36'),
(50, 'room-slider-thumb9.jpg', 15, '2016-11-16 13:00:36', '2016-11-16 13:00:36'),
(51, 'room-slider-thumb10.jpg', 15, '2016-11-16 13:00:36', '2016-11-16 13:00:36'),
(52, 'hero.jpg', 16, '2016-11-22 01:09:56', '2016-11-22 01:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Customer', NULL, NULL),
(2, 'Admin', NULL, NULL),
(3, 'Manager', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `ratings` double(8,2) NOT NULL,
  `roomtype_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `beds` int(11) NOT NULL,
  `sofabeds` int(11) NOT NULL,
  `room_size` int(11) NOT NULL,
  `max_people` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `room_service` int(11) NOT NULL DEFAULT '0',
  `laundary_service` int(11) NOT NULL DEFAULT '0',
  `pets` int(11) NOT NULL DEFAULT '0',
  `internet` int(11) NOT NULL DEFAULT '0',
  `security` int(11) NOT NULL DEFAULT '0',
  `bar` int(11) NOT NULL DEFAULT '0',
  `floor_number` int(11) NOT NULL,
  `booked` int(11) NOT NULL DEFAULT '0',
  `ending_date_of_booking` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `facilities_for_disabled` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `ratings`, `roomtype_id`, `price`, `beds`, `sofabeds`, `room_size`, `max_people`, `room_number`, `description`, `room_service`, `laundary_service`, `pets`, `internet`, `security`, `bar`, `floor_number`, `booked`, `ending_date_of_booking`, `status`, `facilities_for_disabled`, `created_at`, `updated_at`) VALUES
(12, 5.00, 1, 99999, 1, 2, 156, 3, 601, 'Awesome Room !! Excellent Sea View. It really is one of the finest in our lot. ', 1, 1, 0, 1, 1, 1, 2, 1, '2016-11-26', 1, 0, '2016-11-16 12:51:54', '2016-11-22 02:12:47'),
(13, 4.50, 2, 1200, 2, 4, 145, 5, 602, 'Amazing Services, View, Food . ', 1, 1, 1, 1, 1, 1, 3, 0, NULL, 1, 0, '2016-11-16 12:54:38', '2016-11-22 02:14:36'),
(14, 3.50, 1, 745, 5, 6, 124, 5, 603, 'Cozy and Comfortable !! Just the thing you are looking for in a Hotel Room. ', 1, 1, 0, 0, 1, 1, 8, 1, '2016-11-30', 1, 0, '2016-11-16 12:56:08', '2016-11-22 02:12:02'),
(15, 4.50, 3, 1000, 4, 5, 145, 6, 604, 'Amazing ', 1, 1, 1, 1, 1, 1, 6, 0, NULL, 1, 1, '2016-11-16 13:00:35', '2016-11-16 13:01:06'),
(16, 4.50, 2, 234, 3, 4, 123, 3, 567, ' awesome', 1, 1, 1, 0, 0, 1, 2, 0, NULL, 1, 0, '2016-11-22 01:09:55', '2016-11-22 01:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `roomtypes`
--

CREATE TABLE `roomtypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roomtypes`
--

INSERT INTO `roomtypes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Single Room', NULL, NULL),
(2, 'Double Room', NULL, NULL),
(3, 'Suite', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `activated`, `name`, `path`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 2, 1, 'Admin', 'admin.jpg', 'admin@admin.com', '$2y$10$ttyD5lMDI262vpzeRC/PUeGl8lwYK9dVOiNR3QJ60gUZ3fNm0IhWe', 'B5fE5oIlstchPZlVqi2mEcgKAUhmFpF2nf4iWEf1xzwtoz74jMN6hc3fgDjX', '2016-11-04 17:11:49', '2016-11-22 02:13:10'),
(6, 3, 1, 'Manager', 'manager.jpg', 'manager@manager.com', '$2y$10$6cEMCwLXlhz4XsmHrrtgz.6Kdn7fX8hcfMObioldOggjf5cAWsrw6', 'T3FRnBWQMqJNgyyRWS84febSD4DUbaqm315Vcdefzz1GiQjh3aZY95MWa6ig', '2016-11-04 17:37:56', '2016-11-22 02:14:50'),
(8, 1, 1, 'Asad Mahmood', 'avatar04.png', 'asad007mahmood@gmail.com', '$2y$10$xc8qH8BeNUjijsZokBUGBevpNNtri9Hzxujcf9Xk2phpehuOSrZVy', 'IjPDIIWwxardWyAfTmxllX2pyVaa37GvLiZUPgaVdd3Uv8aBsxHYMW7D8hq5', '2016-11-19 10:15:00', '2016-11-30 04:56:07'),
(16, 1, 1, '<script>', 'avatar04.png', 'asad1996172@gmail.com', '$2y$10$YH.blU4k7.P/Hl5zOKx9hugXfslo5cCTVficJ5XZkDfadyH67IVsy', 'bbz1Pmrrp7mUCR1ifNcOyyuGrdRd7QW2FoZjTzOlrdltjA1zwNyJBr0GX85F', '2016-11-30 12:00:57', '2016-12-01 06:49:48'),
(17, 1, 0, 'Asad Mahmood', 'avatar04.png', 'chikiya@gmail.com', '$2y$10$vY/RUITsignBrn0WGmjZB./VyeVVBolqDaL6jSH3wrVfDlC45gVx.', NULL, '2017-01-22 13:45:48', '2017-01-22 13:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_activations`
--

INSERT INTO `user_activations` (`id`, `id_user`, `token`, `created_at`, `updated_at`) VALUES
(1, 17, 'gCKPT00XJUNmteObq49DS767Io5gcZ', '2017-01-22 13:45:48', '2017-01-22 13:45:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
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
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `paths`
--
ALTER TABLE `paths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_room_number_unique` (`room_number`);

--
-- Indexes for table `roomtypes`
--
ALTER TABLE `roomtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activations_id_user_foreign` (`id_user`),
  ADD KEY `user_activations_token_index` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `paths`
--
ALTER TABLE `paths`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `roomtypes`
--
ALTER TABLE `roomtypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD CONSTRAINT `user_activations_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
