-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 09:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE `friendship` (
  `id` int(11) NOT NULL,
  `id_user1` int(11) NOT NULL,
  `user_name1` varchar(255) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `user_name2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friendship`
--

INSERT INTO `friendship` (`id`, `id_user1`, `user_name1`, `id_user2`, `user_name2`) VALUES
(3, 2, 'marija', 3, 'elena'),
(4, 2, 'marija', 5, 'eva'),
(5, 3, 'elena', 2, 'marija'),
(6, 3, 'elena', 4, 'ana'),
(7, 4, 'ana', 5, 'eva'),
(8, 5, 'eva', 2, 'marija'),
(9, 5, 'eva', 3, 'elena');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `public` int(11) NOT NULL,
  `friends` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `user_name`, `public`, `friends`) VALUES
(40, 'marija 3', 'marija', 0, 1),
(41, 'marija 4', 'marija', 0, 1),
(42, 'elena 1', 'elena', 0, 1),
(43, 'elena 2', 'elena', 0, 1),
(45, 'a 1', 'ana', 1, 0),
(46, 'a2', 'ana', 1, 0),
(47, 'eva11', 'eva', 1, 0),
(49, 'marija123', 'marija', 0, 1),
(50, 'marija321', 'marija', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(2, 'marija', 'cb74c183402afe708a490f0048af6e41', 'Marija'),
(3, 'elena', 'fadf17141f3f9c3389d10d09db99f757', 'Elena'),
(4, 'ana', '276b6c4692e78d4799c12ada515bc3e4', 'ana'),
(5, 'eva', '14bd76e02198410c078ab65227ea0794', 'eva');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `friendship`
--
ALTER TABLE `friendship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
