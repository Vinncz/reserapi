-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 11:58 PM
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
  `reserver_name` varchar(1024) DEFAULT 'Unknown' COMMENT 'who''s the reserver? (optional)',
  `subject` varchar(1024) DEFAULT 'Undisclosed' COMMENT 'what''s the topic of this reservation?',
  `remark` varchar(2048) DEFAULT 'No remark was left' COMMENT 'holds the reservation maker comment(s)',
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
(1, 1, 'Oppenheimer', 'undisclosed topic', 'no remark was left', '2023-07-30 00:26:20', '2023-07-30 01:26:20', '123456', '2023-07-30 00:27:00', '2023-07-30 00:27:00'),
(2, 1, 'Kevin Gunawan', 'Belajar Laravel', 'Latihan terus!', '2023-08-07 17:19:00', '2023-08-07 18:19:00', '123456', '2023-08-07 09:58:22', '2023-08-07 11:31:20');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `associated_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
