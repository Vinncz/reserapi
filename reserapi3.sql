-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 04:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reserapi`
--

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_07_090945_create_reservation_made_events_table', 1),
(6, '2023_08_07_090945_create_reservations_table', 1),
(7, '2023_08_07_090945_create_room_registered_events_table', 1),
(8, '2023_08_07_090945_create_rooms_table', 1),
(9, '2023_08_07_090948_add_foreign_keys_to_reservation_made_events_table', 1),
(10, '2023_08_07_090948_add_foreign_keys_to_reservations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL COMMENT 'targeting which room?',
  `reserver_name` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT 'unknown' COMMENT 'who''s the reserver? (optional)',
  `subject` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT 'undisclosed topic' COMMENT 'what''s the topic of this reservation?',
  `remark` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT 'no remark was left' COMMENT 'holds the reservation maker comment(s)',
  `start` datetime NOT NULL COMMENT 'indicating the start of the reservation period',
  `end` datetime NOT NULL COMMENT 'indicating the end of the reservation period',
  `pin` char(6) COLLATE utf8mb4_unicode_ci DEFAULT '123456' COMMENT 'to protect against unauthorized manipulation of the reservation info',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='reservation data for each of the room listed in rooms table';

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `room_id`, `reserver_name`, `subject`, `remark`, `start`, `end`, `pin`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dr. Shania Gutkowski IV', 'accusantium', 'Et quia placeat suscipit odit.', '1998-10-04 21:30:33', '2013-01-15 14:22:44', '542799', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(2, 4, 'Eric Ullrich', 'velit', 'Dicta quo quis et rerum.', '2000-05-04 17:33:57', '2020-12-16 22:11:26', '265638', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(3, 1, 'Daniella Nienow IV', 'odio', 'Mollitia et necessitatibus aliquid adipisci consequatur quae.', '2022-01-22 04:22:42', '1992-01-23 14:39:13', '190886', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(4, 2, 'Miss Jana Kessler', 'quas', 'Aliquam consequatur tempora quis sit quisquam aut tempore.', '1984-02-15 20:52:37', '2010-10-17 18:02:56', '60491', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(5, 2, 'Jakob Romaguera IV', 'vel', 'Aut alias quibusdam non quam id magni.', '2015-10-27 18:12:34', '1987-02-05 21:08:38', '242986', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(6, 3, 'Hellen Morissette', 'autem', 'Impedit consequatur sit dolorem et in quos voluptatem.', '1976-11-12 16:12:21', '2003-03-20 02:00:19', '253457', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(7, 1, 'Ollie Jones', 'sequi', 'Quibusdam consequatur tempora ea recusandae aperiam velit placeat.', '1993-08-27 14:23:47', '2020-01-26 10:45:15', '87385', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(8, 2, 'Marlen Koch', 'vel', 'Maiores hic eos illum ea nihil corrupti maiores.', '1997-04-15 04:37:50', '2003-01-05 19:02:06', '644356', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(9, 3, 'Walter Abernathy', 'perspiciatis', 'Voluptas deserunt dolorum id ut illo quibusdam delectus voluptatum.', '1993-04-22 15:54:33', '2020-01-15 16:26:42', '228067', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(10, 5, 'Vada Davis', 'quis', 'Tenetur ipsa ut est vel.', '1996-02-12 12:53:55', '2023-07-19 06:04:46', '955865', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(11, 1, 'unknown', 'asdadasd', 'no remark was left', '2023-08-15 16:35:00', '2023-08-15 17:00:00', '123456', '2023-08-15 16:32:37', '2023-08-15 16:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_made_events`
--

CREATE TABLE `reservation_made_events` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `reserver_name` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT 'unknown',
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT 'unnamed_room' COMMENT 'the name of the room',
  `location` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT '{ floor: undefined, landmark: undefined, }' COMMENT 'JSON as follows:\r\n{\r\n  floor: number,\r\n  landmark?: string,\r\n}',
  `capacity` int(11) DEFAULT 0 COMMENT 'how many person can fit?',
  `facilities` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT '{ facilities: undefined, }' COMMENT 'JSON as follows:\r\n{\r\n  facilities: [\r\n    name,\r\n    name,\r\n    name,\r\n  ],\r\n}\r\n  ',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='master table for book-able rooms';

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `location`, `capacity`, `facilities`, `created_at`, `updated_at`) VALUES
(1, 'PapayaWhip', '{\"floor\":7,\"landmark\":\"Hauck Field\"}', 22, '{\"facilities\":[\"whiteboard\",\"sound system\",\"projector\"]}', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(2, 'OrangeRed', '{\"floor\":15,\"landmark\":\"Polly Stravenue\"}', 6, '{\"facilities\":[\"whiteboard\",\"sound system\",\"projector\"]}', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(3, 'FloralWhite', '{\"floor\":3,\"landmark\":\"Pollich Rapids\"}', 18, '{\"facilities\":[\"whiteboard\",\"sound system\",\"projector\"]}', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(4, 'DarkBlue', '{\"floor\":7,\"landmark\":\"Pfeffer Rest\"}', 20, '{\"facilities\":[\"whiteboard\",\"sound system\",\"projector\"]}', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(5, 'MistyRose', '{\"floor\":9,\"landmark\":\"Emmerich Street\"}', 17, '{\"facilities\":[\"whiteboard\",\"sound system\",\"projector\"]}', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(6, 'LightYellow', '{\"floor\":11,\"landmark\":\"Dorthy Valley\"}', 16, '{\"facilities\":[\"whiteboard\",\"sound system\",\"projector\"]}', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(7, 'OldLace', '{\"floor\":13,\"landmark\":\"Lynch Isle\"}', 14, '{\"facilities\":[\"whiteboard\",\"sound system\",\"projector\"]}', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(8, 'MidnightBlue', '{\"floor\":9,\"landmark\":\"Berenice Skyway\"}', 15, '{\"facilities\":[\"whiteboard\",\"sound system\",\"projector\"]}', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(9, 'Plum', '{\"floor\":10,\"landmark\":\"Ruben Bypass\"}', 11, '{\"facilities\":[\"whiteboard\",\"sound system\",\"projector\"]}', '2023-08-12 13:18:45', '2023-08-12 13:18:45'),
(10, 'SteelBlue', '{\"floor\":17,\"landmark\":\"Casper Oval\"}', 21, '{\"facilities\":[\"whiteboard\",\"sound system\",\"projector\"]}', '2023-08-12 13:18:45', '2023-08-12 13:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `room_registered_events`
--

CREATE TABLE `room_registered_events` (
  `id` int(11) NOT NULL,
  `room_name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unnamed_room',
  `room_location` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '{ floor: undefined, landmark: undefined, }',
  `room_capacity` int(11) NOT NULL DEFAULT 0,
  `room_facilities` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '{ facilities: undefined, }',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Kayden Koepp', 'Emilia Dooley', 'vida.halvorson@example.com', '2023-08-12 06:18:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CCuEUOV6ih', '2023-08-12 06:18:45', '2023-08-12 06:18:45'),
(2, 'Mr. Kadin Ernser', 'Angelo Keebler IV', 'dare.coralie@example.com', '2023-08-12 06:18:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SDyqbzWLnk', '2023-08-12 06:18:45', '2023-08-12 06:18:45'),
(3, 'Cornelius Rippin', 'Sunny Collins', 'rosalia.johns@example.net', '2023-08-12 06:18:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'glpK7pykka', '2023-08-12 06:18:45', '2023-08-12 06:18:45'),
(4, 'Brent Champlin', 'Vicenta Lebsack', 'xebert@example.net', '2023-08-12 06:18:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'r51VxdDuwD', '2023-08-12 06:18:45', '2023-08-12 06:18:45'),
(5, 'Reta Bernhard III', 'Harrison Ritchie', 'walker.karli@example.org', '2023-08-12 06:18:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YBBsKTWW1f', '2023-08-12 06:18:45', '2023-08-12 06:18:45'),
(6, 'Minnie Batz', 'Ashlee Von', 'joesph.hansen@example.org', '2023-08-12 06:18:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UFtyEMJVsq', '2023-08-12 06:18:45', '2023-08-12 06:18:45'),
(7, 'Rylee Ward DVM', 'Dr. Eliezer Ledner', 'trenton.howell@example.com', '2023-08-12 06:18:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Z2wiG6riIE', '2023-08-12 06:18:45', '2023-08-12 06:18:45'),
(8, 'Burley Carroll', 'Meta Considine', 'westley.jacobi@example.net', '2023-08-12 06:18:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YthQAFusNZ', '2023-08-12 06:18:45', '2023-08-12 06:18:45'),
(9, 'Sid Huel', 'Jack Oberbrunner', 'camden.ward@example.com', '2023-08-12 06:18:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'de1J3qBCtV', '2023-08-12 06:18:45', '2023-08-12 06:18:45'),
(10, 'Felicita Waters', 'Deshaun Buckridge', 'ryan.alexandra@example.org', '2023-08-12 06:18:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BIYOawL5cb', '2023-08-12 06:18:45', '2023-08-12 06:18:45'),
(11, 'Kodok', 'Kodok Ganteng', 'kodok@gmail.com', NULL, '$2y$10$F35RUhF2TlRZ1GpBtRjO9.p2D.8wH3YuUVl7ORBQxHrfHA3LWN4L.', NULL, '2023-08-12 06:37:20', '2023-08-12 06:37:20'),
(12, 'Kodok', 'Kodok23', 'kodok23@gmail.com', NULL, '$2y$10$mM6cGOa47gzRF.hzjDEeoOB0kT66BdO41ymTCRpsZQYQbyKitdmIe', NULL, '2023-08-12 06:43:04', '2023-08-12 06:43:04'),
(13, 'Kodok', 'Kodoks', 'kodok24@gmail.com', NULL, '$2y$10$ZQJpB2TA.1r61.2v3MDhUurXzrbgH23sFITFpaOjtfBnaJfMtBAk6', NULL, '2023-08-12 06:59:35', '2023-08-12 06:59:35'),
(14, 'kodok', 'Kodok', 'dok@gmail.com', NULL, '$2y$10$GQkgypAErc5XKRk042yzF..dPm2Zh.tMAkr7ICae4WRlavI6hEAXO', NULL, '2023-08-12 07:01:03', '2023-08-12 07:01:03'),
(15, 'Kodok', 'Kodok', 'kodok555@gmail.com', NULL, '$2y$10$AwI3BdE3Y5ak23cjyYlghuJg2PPVn82SmUHZZ/x3Tn3Up05w0EiSS', NULL, '2023-08-12 07:02:10', '2023-08-12 07:02:10'),
(16, 'Kebin', 'Kebean', 'vin@gmail.com', NULL, '$2y$10$JjLrxuKdIsj1QxLe4HwOTeaZw.yMgG/PxE7z8/DPe0OjqruUDkRT2', NULL, '2023-08-13 06:46:42', '2023-08-13 06:46:42'),
(17, 'asdfafasdf', 'asdfsadfadsfasdf', 'asdfsadfsad@gmail.com', NULL, '$2y$10$BUqtgZ68M5FuZkfc8JQHnuEyiBFHB5PAVvBECBoMo0YksAzHUydMW', NULL, '2023-08-13 07:01:13', '2023-08-13 07:01:13'),
(18, 'asdasgfgsdf', 'dasgfhdshdfsh', 'fdgfdshfdhf@gmail.com', NULL, '$2y$10$tifL7YKo1HqWl2/hAMuX3uii2BdcCtGOI54d6VSAw4PMo219bxM7y', NULL, '2023-08-13 07:01:54', '2023-08-13 07:01:54'),
(19, 'What the fuck', 'What the fuck', 'slddibgoidfgoibod@gmail.com', NULL, '$2y$10$p6yPw6Tls2CX2Goz4QDiT.XlO5FXrxWX1LjP92M4Xk3VHwReLA0rS', NULL, '2023-08-13 09:00:26', '2023-08-13 09:00:26'),
(20, 'What teh fuck', 'FOOKING', 'abby.jane@gmail.com', NULL, '$2y$10$8VkHaLcPjvkfrbia2RhU7upVGLZagsRg20T5NThpIjVEXXe/JhluS', NULL, '2023-08-15 03:59:13', '2023-08-15 03:59:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`room_id`);

--
-- Indexes for table `reservation_made_events`
--
ALTER TABLE `reservation_made_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_registered_events`
--
ALTER TABLE `room_registered_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservation_made_events`
--
ALTER TABLE `reservation_made_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room_registered_events`
--
ALTER TABLE `room_registered_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `associated_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `reservation_made_events`
--
ALTER TABLE `reservation_made_events`
  ADD CONSTRAINT `reservation_made_events_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
