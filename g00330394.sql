-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 11:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g00330394`
--
CREATE DATABASE IF NOT EXISTS `g00330394` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `g00330394`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Airwaves', 0.75, 'images/airwave.png'),
(2, 'Candy Cane', 1, 'images/candyCane.png'),
(3, 'Crunchie', 1.25, 'images/crunchie.png'),
(4, 'Dairymilk', 1.15, 'images/dairyMilk.jfif'),
(5, 'Freddo', 0.25, 'images/freddo.jpg'),
(6, 'Jelly Beans', 3, 'images/jellyBeans.jfif'),
(7, 'Lollipop', 1.25, 'images/lollipop.jfif'),
(8, 'Love Hearts', 0.25, 'images/loveHearts.jfif'),
(9, 'Refresher', 0.25, 'images/refresher.png'),
(10, 'Snickers', 1.55, 'images/snickers.jfif'),
(11, 'Wispa', 1.55, 'images/wispa.png'),
(12, 'Werthers Original', 1.25, 'images/werthers.jfif'),
(13, 'Terrys Chocolate Orange', 1.55, 'images/terryChoc.jfif'),
(14, 'Kinder Surprise Egg', 1, 'images/kinderSurprise.jfif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
