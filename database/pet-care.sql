-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2022 at 08:52 PM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u345888559_petcaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `vision` longtext NOT NULL,
  `mission` longtext NOT NULL,
  `location` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vision_img` varchar(255) NOT NULL,
  `mission_img` varchar(255) NOT NULL,
  `location_img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `vision`, `mission`, `location`, `created_at`, `updated_at`, `vision_img`, `mission_img`, `location_img`) VALUES
(1, '\r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            <h2>Our vision</h2>\r\n              <p class=\"title\"></p>\r\n              <p>\r\n                To become the leader and the best veterinary healthcare provider\r\n                in the Middle East aasd</p>                                                                                                                                                            ', '\r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            <h2>Our Mission</h2>\r\n              <p class=\"title\"></p>\r\n              <p>\r\n                We promise to deliver medical and surgical care of the highest\r\n                quality in accordance with high standard ethical manners. We are\r\n                driven to define the future of pet healthcare in the Miiddle\r\n                East through compassion, respect, quality of service, education,\r\n                knowledge, and technology</p>                                                                                                                                                            ', '            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            <h2>Location:</h2>\r\n              <p class=\"title\"></p>\r\n              <p>Riyadh-city adsasdasneighbourhood </p>                                                                                                            ', '2022-05-23 20:08:18', '2022-05-23 20:08:18', 'profile_70819.png', 'services.jpg', 'gps.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `petName` varchar(50) NOT NULL,
  `dateOfBirth` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `spayed` varchar(50) NOT NULL,
  `vaccinationList` text NOT NULL,
  `medicalHistory` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `userId`, `petName`, `dateOfBirth`, `breed`, `gender`, `spayed`, `vaccinationList`, `medicalHistory`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'ddddd', '01/02/2014', '3333', 'Male', 'Yes', 'sdaadas', 'asddasdasda', 'pet_594863.png', 1, '2022-05-23 17:34:13', '2022-05-23 17:34:13'),
(2, 6, 'Koak', '22/10/2011', 'Horse', 'Male', 'Yes', 'nnn', 'jjj', 'pet_319032.png', 1, '2022-05-23 17:50:33', '2022-05-23 17:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `petId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `pet` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=accept',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `petId`, `userId`, `pet`, `service`, `date`, `time`, `details`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 'Cat', '3', '2022-05-25', '19:44', 'asdasdasasas', 1, '2022-05-23 17:45:00', '2022-05-23 17:45:00'),
(2, 1, 2, 'Cat', '3', '2022-05-25', '19:37', 'sfdsdfsdfsdfsdf', 1, '2022-05-23 17:45:13', '2022-05-23 17:45:13'),
(4, 2, 6, 'Cat', '1', '2022-06-02', '23:50', 'fh', 1, '2022-05-23 17:50:58', '2022-05-23 17:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `reservationId` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userId`, `reservationId`, `rating`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 5, 'testing....', 0, '2022-05-16 08:44:35', '2022-05-16 08:44:35'),
(2, 7, 2, 3, 'sds', 0, '2022-05-16 09:04:36', '2022-05-16 09:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `details` longtext NOT NULL,
  `price` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `details`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'grooming', 'pet_127827.png', 'tesd', '23', 0, '2022-05-13 00:09:11', '2022-05-13 00:09:11'),
(2, 'cat', 'pet_649865.png', 'test', '100', 0, '2022-05-15 16:10:27', '2022-05-15 16:10:27'),
(3, 'Dog', 'pet_47966.png', 'testing', '25', 0, '2022-05-16 10:26:20', '2022-05-16 10:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `services_appointment`
--

CREATE TABLE `services_appointment` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_appointment`
--

INSERT INTO `services_appointment` (`id`, `service_id`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-06-01', '20:54', 0, '2022-05-23 17:51:54', '2022-05-23 17:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0 COMMENT '0=user and 1 = admin',
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'img_avatar.png',
  `password` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `first_name`, `last_name`, `email`, `image`, `password`, `phone`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(8, 0, 'Jawad', 'Ahmad', 'mrjac1122@gmail.com', 'profile_920919.png', '123456', '2368386588', 'male', 'Active', '2022-05-23 17:08:43', '2022-05-23 17:08:43'),
(2, 1, 'Admin', 'Admin', 'admin@gmail.com', 'img_avatar.png', '123456789', '123456789', 'male', 'Active', '2022-05-16 10:24:27', '2022-05-16 10:24:27'),
(6, 0, 'Jawad', 'Ahmad', 'jawad.dvi@gmail.com', 'img_avatar.png', '123456789', '2368386588', 'male', 'Active', '2022-05-11 03:51:00', '2022-05-11 03:51:00'),
(7, 0, 'Jawad', 'Ahmad', 'mrjac1111@gmail.com', 'img_avatar.png', '123456', '2368386588', 'male', 'Active', '2022-05-12 07:58:30', '2022-05-12 07:58:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_appointment`
--
ALTER TABLE `services_appointment`
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
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services_appointment`
--
ALTER TABLE `services_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
