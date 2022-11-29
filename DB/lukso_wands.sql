-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 07:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lukso_wands`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin 1', 'admin1@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_item_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(69) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_item_id`, `name`, `price`, `image`, `user_id`) VALUES
(8, 'Hermione\'s wand', 750.00, 'Hermione_Granger.jpg', 3),
(9, 'Justine\'s Wand', 500.50, 'Elder-wand.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `image`, `short_description`, `description`, `date_created`, `is_active`) VALUES
(3, 'Justine\'s Wand', 500.50, 'Elder-wand.jpg', 'short desc', 'LOOOOOOOONGGGG DESC', '2022-11-27 05:13:23', 1),
(4, 'Cedric Diggory\'s wand', 750.00, 'Cedric-Diggorys-wand.jpg', 'People who are in tune with the natural world gravitate toward the substance known as lancewood, which was utilized in the construction of this wand. ', 'People who are in tune with the natural world gravitate toward the substance known as lancewood, which was utilized in the construction of this wand. Elder Wood, which is employed in the crafting of the handle, has a liking for persons who are agile and s', '2022-11-27 06:50:08', 1),
(5, 'Hermione\'s wand', 750.00, 'Hermione_Granger.jpg', 'People who are in tune with the natural world gravitate toward the substance known as lancewood, which was utilized in the construction of this wand. ', 'People who are in tune with the natural world gravitate toward the substance known as lancewood, which was utilized in the construction of this wand. Elder Wood, which is employed in the crafting of the handle, has a liking for persons who are agile and s', '2022-11-27 07:01:46', 1),
(6, 'Harry Potter\'s wands', 1000.00, 'Harry-Potters-wands.jpg', 'Ivy Wood, the material out of which this wand is crafted, is known to bestow its benefits on those who have a compassionate disposition toward all living things. The handle is crafted from hazelnut wood, which, in turn, is often preferred by those who are', 'Ivy Wood, the material out of which this wand is crafted, is known to bestow its benefits on those who have a compassionate disposition toward all living things. The handle is crafted from hazelnut wood, which, in turn, is often preferred by those who are', '2022-11-27 14:41:03', 1),
(7, 'Ron\'s Wand', 450.00, 'Ron_Weasley.jpg', 'This wand, which was crafted from poplar wood, is useful even for those who have little to no interest in the shady arts. The handle is often crafted from fiddlewood, which is a kind of wood favored by those who are strong and physically capable. This str', 'This wand, which was crafted from poplar wood, is useful even for those who have little to no interest in the shady arts. The handle is often crafted from fiddlewood, which is a kind of wood favored by those who are strong and physically capable. This str', '2022-11-28 09:36:29', 1),
(8, 'James Potter\'s Wand', 400.00, 'James-Potters-wand.jpg', 'The majority of wands have three cores, however this particular one only has one. An infusion of phoenix feather at the spell\'s center increases its destructive potential.\r\n', 'This wand, which was crafted from poplar wood, is useful even for those who have little to no interest in the shady arts. The handle is often crafted from fiddlewood, which is a kind of wood favored by those who are strong and physically capable. This str', '2022-11-28 09:37:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(69) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `birthday` varchar(15) NOT NULL,
  `active` int(2) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `address`, `number`, `email`, `password`, `gender`, `birthday`, `active`, `code`) VALUES
(4, 'Rome', 'Guillermo', '130 shanghai street', 12345, 'justineguillermo00@gmail.com', 'password', 'male', '2022-11-04', 1, '8JC96m4Ms7bY'),
(5, 'Kyla', 'Cabantac', 'dito lang pre basta doon', 6393213, 'kylacabantac@gmail.com', 'password', 'female', '2022-11-04', 1, 'd1212d12d12asdd2asd'),
(17, 'anjo', 'guillermo', '130 shanghai ', 631234, '201810094@fit.edu.ph', 'password', 'male', '2022-11-16', 0, 'snboZTAjpJkR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
