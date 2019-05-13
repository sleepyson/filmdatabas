-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 01:37 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmdatabas`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(10) UNSIGNED NOT NULL,
  `category` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `category`) VALUES
(0, 'Thriller'),
(1, 'Romance'),
(2, 'Swedish'),
(3, 'Animated'),
(4, 'Comedy'),
(5, 'Sci-Fi'),
(6, 'Drama'),
(7, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) NOT NULL,
  `director` varchar(64) NOT NULL,
  `year` year(4) NOT NULL,
  `category` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `director`, `year`, `category`) VALUES
(1, 'The Shawshank Redemption', 'Frank Darabont', 1994, 6),
(2, 'The Godfather', 'Francis Ford Coppola', 1972, 6),
(3, 'Starship Troopers', 'Paul Verhoeven', 1997, 4),
(4, '12 Angry Men', 'Sidney Lumet', 1957, 6),
(5, 'The Lord of the Rings: The Fellowship of the Ring', 'Peter Jackson', 2001, 7),
(6, 'The Matrix', 'Lana Wachowski, Lilly Wachowski', 1999, 5),
(7, 'The Lion King', 'Roger Allers, Rob Minkoff', 1994, 3),
(8, 'Toy Story', 'John Lasseter', 1995, 3),
(9, 'Interstellar', 'Christopher Nolan', 2014, 5),
(10, 'Hipp Hipp Hora!', 'Teresa Fabik', 2004, 2),
(11, 'The Silence of the Lambs', 'Jonathan Demme', 1991, 0),
(12, 'The Notebook', 'Nick Cassavetes', 2004, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
