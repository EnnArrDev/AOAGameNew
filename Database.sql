-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 26, 2020 at 09:03 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `user_id`, `slot_id`, `item_id`, `item_amount`) VALUES
(1, 2, 0, NULL, 0),
(2, 2, 1, 4, 1),
(3, 2, 2, NULL, 0),
(4, 2, 3, NULL, 0),
(5, 2, 4, NULL, 0),
(6, 2, 5, NULL, 0),
(7, 2, 6, NULL, 0),
(8, 2, 7, NULL, 0),
(9, 2, 8, NULL, 0),
(10, 2, 9, NULL, 0),
(11, 2, 19, 8, 10),
(12, 2, 18, 9, 10),
(13, 2, 17, 10, 5),
(14, 2, 16, 6, 1),
(15, 2, 15, NULL, 0),
(16, 2, 14, NULL, 0),
(17, 2, 13, 2, 1),
(18, 2, 12, NULL, 0),
(19, 2, 11, NULL, 0),
(20, 2, 10, 8, 5),
(21, 2, 20, 10, 5),
(22, 2, 21, 7, 10),
(23, 2, 22, 11, 5),
(24, 2, 23, 4, 1),
(25, 2, 24, 5, 1),
(26, 2, 25, 3, 1),
(27, 2, 26, 7, 20),
(28, 2, 27, NULL, 0),
(29, 2, 28, NULL, 0),
(30, 2, 29, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_accessed_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `user_creation_date`, `user_accessed_date`) VALUES
(1, 'demo', '$2y$10$DCUdYDAUCqSzbDrOhJeTQuRG/JxCSnYaI6haH6Zk5SWHxlhoa3Z.W', '2020-02-25 09:37:10', '2020-02-25 09:37:10'),
(2, 'neil', '$2y$10$pmQVmiXCO1P5QaQt6ilLbeifYppr4n6zNZiv2xVSmWjMGD01LqUVK', '2020-02-25 10:13:19', '2020-02-25 10:13:19'),
(3, 'jaryth', '$2y$10$EH9proyvB/UvKENe5ryoIOsiMiQ9rKdsXF6sIIQsaavrUiJ51eed2', '2020-02-25 10:13:19', '2020-02-25 10:13:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
