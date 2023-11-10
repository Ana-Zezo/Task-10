-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 02:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `doctor_id` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` enum('No','Yes') DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `phone`, `user_id`, `doctor_id`, `date`, `status`) VALUES
(1, 'mezo', 1061167326, 2, 3, '2023-11-20', 'Yes'),
(2, 'mezo', 1061167326, 2, 6, '2023-11-15', 'Yes'),
(3, 'mezo', 1061167326, 2, 6, '2023-11-15', 'Yes'),
(4, 'mezo', 1061167326, 2, 6, '2023-11-15', 'Yes'),
(5, 'mezo', 1061167326, 2, 5, '2023-11-15', 'Yes'),
(6, 'abdallah', 1061167326, 3, 9, NULL, 'No'),
(7, 'abdallah', 1061167326, 3, 8, NULL, 'No'),
(8, 'abdallah', 1061167326, 3, 7, NULL, 'No'),
(9, 'mezo', 1061167326, 2, 4, NULL, 'No'),
(10, 'mezo', 1061167326, 2, 8, NULL, 'No'),
(11, 'mohmamed', 1061167326, 2, 8, NULL, 'No'),
(12, 'abdallah', 1153005820, 4, 10, NULL, 'No'),
(13, 'mezo', 1061167326, 2, 7, NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `subject`, `message`) VALUES
(3, 'mezo', '01061167326', 'alaabdelhamid4899@gmail.com', 'service', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bio` varchar(75) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `major_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `bio`, `price`, `image`, `status`, `major_id`) VALUES
(3, 'omr', 'my motto is to provide a healthy life for you.', 250, '654a55f13fda31.84537560.jpg', '1', 12),
(4, 'ali', 'Don&amp;rsquo;t fear&amp;hellip;just treat it.', 180, '654a561dd9b052.74938135.jpg', '1', 8),
(5, 'nada', 'I am a follower of true ethics.', 170, '654a5659bea959.02478595.jpg', '1', 6),
(6, 'mahmoud', 'Doctors believe that comforting', 400, '654a56cae56381.63444739.jpg', '1', 11),
(7, 'gamal', 'We are very proud as a doctor. #proudasadoctor', 240, '654a5715039993.84063005.jpg', '1', 5),
(8, 'kamal', 'I am absolutely committed to humanity!', 250, '654a5748628840.46582337.jpg', '1', 9),
(9, 'marie', 'I am absolutely committed to humanity!', 250, '654a578cdae5d5.79186082.jpg', '1', 10),
(10, 'ivana', 'We are the best healers of your wound.', 360, '654a57c5d56f97.30558423.jpg', '1', 7),
(12, 'test', 'my motto is to', 150, '654e1bc426ebb9.41018566.png', '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `name`, `status`, `image`) VALUES
(5, 'Cardiology', '1', '654baa2334cad9.60429847.jpeg'),
(6, 'Dentistry', '1', '654a54a0e5f8b1.35698197.jpeg'),
(7, 'Rheumatology', '1', '654a54d3c86c30.47088761.jpeg'),
(8, 'Pediatrics', '1', '654a54f5cfcc68.78134952.jpeg'),
(9, 'Otorhinolaryngology', '1', '654a54fe088342.71235207.jpeg'),
(10, 'Infectious diseases', '1', '654a5507632746.57358711.jpeg'),
(11, 'Neurology', '1', '654a5511e6f371.24009091.jpeg'),
(12, 'Dietetics', '1', '654a5528d314d2.09608922.jpeg'),
(15, 'test', '1', '654e1b4791ec09.90649577.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `role`) VALUES
(1, 'mezo', '01061167326', 'mahmoudzakarya94@yahoo.com', '$2y$10$IKEZD0FOw9CLxElsk2U1EeGH0CnNJy63NRw8N6mM/in3pwc.Rp3wG', '1'),
(2, 'alaa', '01061167326', 'alaabdelhamid4899@gmail.com', '$2y$10$AlikgPUpeLsOPjw/jZmJ5eW.tdfDBVowuIV4O.yTfI3t.Q0YUy.xC', '0'),
(3, 'abdallah', '01061167326', 'abdallahzakarya@yahoo.com', '$2y$10$8PR.1mCTjzbVNaWSylyi.O8Gkm.6QCyLoc4NdI6pPfvawnUdrxXrC', '0'),
(4, 'abdallah', '01153005820', '4d3c583d53@fireboxmail.lol', '$2y$10$.z4EpknC4d23N7ndZJzGnOdv7vN8yMDonh36C2WQxBFYzghczcU2i', '0'),
(5, 'abdallah', '01061167326', 'user@gmail.com', '$2y$10$gXZ/qmnw7yw0Yb0lZnO0XeiISOTr1kXIP2usutJbTA.I8asuEnte2', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_ibfk_1` (`user_id`),
  ADD KEY `booking_ibfk_2` (`doctor_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_ibfk_1` (`major_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
