-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2019 at 11:06 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evs`
--

-- --------------------------------------------------------

--
-- Table structure for table `serviced`
--

CREATE TABLE `serviced` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` varchar(4) COLLATE utf8_lithuanian_ci NOT NULL,
  `servicedTime` time NOT NULL,
  `startTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `serviced`
--

INSERT INTO `serviced` (`id`, `userid`, `status`, `servicedTime`, `startTime`) VALUES
(18, 7, 'taip', '08:07:00', '08:00:00'),
(19, 1, 'taip', '08:16:00', '08:07:00'),
(20, 3, 'taip', '08:27:00', '08:16:00'),
(21, 4, 'taip', '08:35:00', '08:27:00'),
(22, 5, 'taip', '08:47:00', '08:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(160) COLLATE utf8_lithuanian_ci NOT NULL,
  `lastname` varchar(160) COLLATE utf8_lithuanian_ci NOT NULL,
  `time` time NOT NULL,
  `number` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `time`, `number`) VALUES
(1, 'Petras', 'Petraitis', '07:50:00', 101),
(3, 'vardenis', 'Bepavardenis', '07:52:00', 103),
(4, 'Jonas', 'Jonaitis', '07:53:00', 104),
(5, 'Antanas', 'Antanaitis', '07:54:00', 105),
(6, 'Ponas', 'Ponaitis', '08:55:00', 106),
(7, 'Vardenė', 'Vardenė', '07:49:00', 100),
(9, 'Ponas', 'Ponaitis', '09:05:00', 108),
(10, 'Petras', 'Jonaitis', '09:22:00', 110),
(11, 'vardenis', 'Jonaitis', '09:02:00', 107),
(25, 'Jonas', 'Petrauskas', '09:31:00', 111),
(26, 'Zenonas23', 'Zenonas23', '16:35:00', 113),
(27, 'TrysTrys', 'Keturi', '08:11:00', 112),
(28, 'vienas', 'vienas', '09:54:00', 114);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `serviced`
--
ALTER TABLE `serviced`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `serviced`
--
ALTER TABLE `serviced`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
