-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 08:41 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `dt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `title`, `note`, `dt`) VALUES
(14, 11, 'title1 by skkkkHH', 'note 1 by skhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '2023-03-03'),
(15, 11, 'title2 by sk', 'note 2 by sk \r\ngggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', '2023-03-03'),
(17, 11, 'title 3 by sk', 'note 3 by sk \r\ngggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', '2023-03-03'),
(21, 11, 'title 4 by sk', 'note 4 by sk \r\nkllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll', '2023-03-03'),
(22, 12, 'title 4 by sahil', 'note 4 by sahilllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllmmmmmmmmmm', '2023-03-07'),
(26, 12, 'TITLE 5 BY SAHIL', 'NOTE 5 BY Sahil Kumar....', '2023-03-09'),
(30, 12, 'hhhccc', 'hhh', '2023-03-10'),
(31, 12, 'vvv', 'vvv', '2023-03-10'),
(32, 12, 'gg', 'gggg', '2023-03-10'),
(33, 12, 'llllllllll', 'llllllllllll', '2023-03-10'),
(34, 12, 'ooo', 'oo', '2023-03-10'),
(35, 12, 'hhhccc', 'hhh', '2023-03-10'),
(41, 12, 'ghgf', 'fffffff', '2023-03-10'),
(42, 11, '11111111111111111111111111111111', '1111111111111111111111111111111', '2023-03-10'),
(43, 11, '22222222222222222222222222222222222222', '222222222222222222222222222222222222222222', '2023-03-10'),
(44, 11, '333333333333333333333333333', '333333333333333333333333333333333', '2023-03-10'),
(45, 11, '44444444444444444444', '44444444444444444444', '2023-03-10'),
(46, 11, '55555555555555555555', '55555555555555555555', '2023-03-10'),
(47, 12, '111111', '111111111111\r\n', '2023-03-15'),
(48, 12, '2222222222222', '222222222222', '2023-03-15'),
(49, 12, '3333333333', '444444444', '2023-03-15'),
(51, 12, 'test at 2/5/2023', 'jkfjhhlglgkhahghjgagajhghjghal', '2023-05-02'),
(55, 12, 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2023-05-03'),
(58, 12, 'rrrrrrrrrrrrrrrrrrr', 'rrrrrrrrrr', '2023-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(11, 's', 'k', 's@gmail.com', '$2y$10$En8JUkvtzDy4sSK7sGLX1O9z.0dFgdTYkdczF3yd.CztjyK4Z7mKm'),
(12, 'sahil', 'kumar', 'sahil@gmail.com', '$2y$10$yGYpHrmuyLXjZk8gocQLCOclh5f0drDjERkPkXPm6y8FlD3lHIVle');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
