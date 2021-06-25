-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 02:38 PM
-- Server version: 5.7.18-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netflix_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `casts`
--

CREATE TABLE `casts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `casts`
--

INSERT INTO `casts` (`id`, `name`, `avatar`, `description`) VALUES
(1, 'Anna', 'assets/default/cast/1.jpg', 'this is description'),
(2, 'Robert', 'assets/default/cast/1.jpg', 'this is just a description about the actor and stuff');

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE `entities` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `background` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trailer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre` json NOT NULL,
  `IMDB` float NOT NULL,
  `guidelines` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cast` json NOT NULL,
  `tags` json NOT NULL,
  `views` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `entities`
--

INSERT INTO `entities` (`id`, `name`, `thumbnail`, `background`, `trailer`, `genre`, `IMDB`, `guidelines`, `summary`, `cast`, `tags`, `views`) VALUES
(1, 'The Express', 'assets/entities/1/thumb/asset-1.jpg', 'assets/entities/1/back/asset-1.jpg', 'https://www.youtube.com/watch?v=LXb3EKWsInQ', '[\"1\", \"2\"]', 4.8, 'PG-14', 'thi is long stuff about the movie or a tv show or who know what else and stuiff', '[\"1\", \"2\"]', '[\"1\", \"2\"]', 0),
(2, 'The Express 2', 'assets/entities/1/thumb/asset-1.jpg', 'assets/entities/1/back/asset-1.jpg', 'https://www.youtube.com/watch?v=LXb3EKWsInQ', '[\"1\", \"2\"]', 4.8, 'PG-14', 'thi is long stuff about the movie or a tv show or who know what else and stuiff', '[\"1\", \"2\"]', '[\"1\", \"2\"]', 20),
(3, 'The Express 3', 'assets/entities/1/thumb/asset-1.jpg', 'assets/entities/1/back/asset-1.jpg', 'https://www.youtube.com/watch?v=LXb3EKWsInQ', '[\"1\", \"2\"]', 4.8, 'PG-14', 'thi is long stuff about the movie or a tv show or who know what else and stuiff', '[\"1\", \"2\"]', '[\"1\", \"2\"]', 204);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` bigint(20) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Annimation'),
(3, 'Mystery'),
(4, 'Family');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `description`, `status`) VALUES
(1, 'app.version', '1.0.0', 'Current application version', 1),
(2, 'app.name', 'Stream', 'Application name', 1),
(3, 'app.description', 'Online streaming app', 'Application description', 1),
(4, 'app.theme', 'default', 'Application themes', 1),
(5, 'mail.host', 'mail.tweekersnut.in', 'SMTP mail host', 1),
(6, 'mail.username', 'hosting@tweekersnut.in', 'SMTP mail username', 1),
(7, 'mail.password', 'mElf(69y?N-j', 'SMTP mail password', 1),
(8, 'mail.enc', 'ssl', 'SMTP encryption', 1),
(9, 'mail.port', '465', 'SMTP port', 1),
(10, 'admin.email', 'hosting@tweekersnut.in', 'Admin email', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, '4K'),
(2, 'Hero'),
(3, 'King'),
(4, 'Dubbing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `account_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_subscribed` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `role` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `password`, `created_at`, `avatar`, `last_login`, `account_key`, `is_subscribed`, `role`, `ip`, `status`) VALUES
(3, 'fear126', 'fear126@live.com', 'Faer', 'Fear', 'c2RBbDgwSjNFbmkrUlI2UG1JMGh6dz09', '2021-06-23 11:43:11', 'http://netflix.local//assets/default/images/avatars/default.png', '2021-06-23 13:43:11', '60d45173e4088', '0', '0', '127.0.0.1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casts`
--
ALTER TABLE `casts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `casts`
--
ALTER TABLE `casts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `entities`
--
ALTER TABLE `entities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
