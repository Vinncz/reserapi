-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2023 at 04:05 PM
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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL COMMENT 'targeting which room?',
  `reserver_name` varchar(1024) DEFAULT 'unknown' COMMENT 'who''s the reserver? (optional)',
  `subject` varchar(1024) DEFAULT 'undisclosed topic' COMMENT 'what''s the topic of this reservation?',
  `remark` varchar(2048) DEFAULT 'no remark was left' COMMENT 'holds the reservation maker comment(s)',
  `start` datetime NOT NULL COMMENT 'indicating the start of the reservation period',
  `end` datetime NOT NULL COMMENT 'indicating the end of the reservation period',
  `pin` char(6) DEFAULT '123456' COMMENT 'to protect against unauthorized manipulation of the reservation info',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='reservation data for each of the room listed in rooms table';

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `room_id`, `reserver_name`, `subject`, `remark`, `start`, `end`, `pin`, `created_at`, `updated_at`) VALUES
(1, 1, 'Oppenheimer', 'undisclosed topic', 'no remark was left', '2023-07-30 00:26:20', '2023-07-30 01:26:20', '123456', '2023-07-30 00:27:00', '2023-07-30 00:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_made_events`
--

CREATE TABLE `reservation_made_events` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `reserver_name` varchar(1024) DEFAULT 'unknown',
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(512) DEFAULT 'unnamed_room' COMMENT 'the name of the room',
  `location` varchar(2048) DEFAULT '{ floor: undefined, landmark: undefined, }' COMMENT 'JSON as follows:\r\n{\r\n  floor: number,\r\n  landmark?: string,\r\n}',
  `capacity` int(11) DEFAULT 0 COMMENT 'how many person can fit?',
  `facilities` varchar(2048) DEFAULT '{ facilities: undefined, }' COMMENT 'JSON as follows:\r\n{\r\n  facilities: [\r\n    name,\r\n    name,\r\n    name,\r\n  ],\r\n}\r\n  ',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='master table for book-able rooms';

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `location`, `capacity`, `facilities`, `created_at`, `updated_at`) VALUES
(1, 'Trinity', '{\"floor\": 3, \"landmark\": undefined}', 16, '{ \"facilities\": [\"projector\", \"whiteboard\", \"sound system\"], }', '2023-07-30 00:23:02', '2023-07-30 00:23:02'),
(2, 'Little Boy', '{\"floor\": 3, \"landmark\": undefined}', 24, '{ \"facilities\": [\"projector\", \"whiteboard\", \"sound system\"], }', '2023-07-30 00:24:09', '2023-07-30 00:24:09'),
(3, 'Fat Man', '{\"floor\": 3, \"landmark\": undefined}', 28, '{ \"facilities\": [\"projector\", \"whiteboard\", \"sound system\"], }', '2023-07-30 00:24:18', '2023-07-30 00:24:18');

-- --------------------------------------------------------

--
-- Table structure for table `room_registered_events`
--

CREATE TABLE `room_registered_events` (
  `id` int(11) NOT NULL,
  `room_name` varchar(512) NOT NULL DEFAULT 'unnamed_room',
  `room_location` varchar(2048) NOT NULL DEFAULT '{ floor: undefined, landmark: undefined, }',
  `room_capacity` int(11) NOT NULL DEFAULT 0,
  `room_facilities` varchar(2048) NOT NULL DEFAULT '{ facilities: undefined, }',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`room_id`) USING BTREE;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation_made_events`
--
ALTER TABLE `reservation_made_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room_registered_events`
--
ALTER TABLE `room_registered_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
