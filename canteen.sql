-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2023 at 04:27 AM
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
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(5, 'Beverages'),
(1, 'Breakfast'),
(3, 'Curries'),
(6, 'Desserts'),
(2, 'Rice Dishes'),
(4, 'Snacks');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `category_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`category_id`, `id`, `name`, `price`, `quantity`) VALUES
(1, 7, 'Chappathi', 8.00, 20),
(1, 9, 'Porotta', 9.00, 12),
(1, 10, 'Dosa', 6.00, 19),
(1, 11, 'Idli', 7.00, 20),
(2, 12, 'Kerala Meals', 50.00, 30),
(2, 13, 'Veg Biriyani', 60.00, 13),
(2, 14, 'Chicken Biriyani', 90.00, 20),
(3, 15, 'Veg Curry', 30.00, 22),
(3, 16, 'Chicken Curry', 90.00, 9),
(3, 17, 'Beef Curry', 70.00, 16),
(4, 18, 'Samosa', 10.00, 15),
(4, 19, 'Vada', 10.00, 11),
(4, 20, 'Chicken Puffs', 15.00, 14),
(4, 21, 'Chicken Burger', 40.00, 7),
(5, 22, 'Tea', 10.00, 20),
(5, 23, 'Coffee', 12.00, 17),
(5, 24, 'Sharjah Shake', 50.00, 10),
(6, 25, 'Apple Pie', 40.00, 5),
(6, 26, 'Vanilla Scoop', 30.00, 19),
(6, 27, 'Chocobar', 30.00, 15),
(6, 28, 'Mangobar', 20.00, 10),
(6, 29, 'Pastry', 50.00, 12),
(6, 30, 'Cookies', 20.00, 15);

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ordered_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `preparing` tinyint(1) NOT NULL DEFAULT 0,
  `prepared` tinyint(1) NOT NULL DEFAULT 0,
  `delivered` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`id`, `user_id`, `ordered_on`, `preparing`, `prepared`, `delivered`) VALUES
(3, 9, '2023-06-11 02:14:56', 1, 1, 1),
(4, 9, '2023-06-11 02:21:49', 1, 1, 0),
(5, 9, '2023-06-11 02:29:53', 1, 0, 0),
(10, 9, '2023-06-11 02:45:04', 0, 0, 0),
(49, 9, '2023-06-11 09:27:50', 0, 0, 0),
(50, 9, '2023-06-11 09:28:20', 0, 0, 0),
(51, 9, '2023-06-11 09:34:51', 0, 0, 0),
(52, 9, '2023-06-11 09:35:55', 0, 0, 0),
(53, 9, '2023-06-12 06:20:38', 0, 0, 0),
(54, 9, '2023-06-12 06:23:11', 1, 0, 1),
(55, 9, '2023-06-12 13:57:12', 0, 0, 0),
(56, 9, '2023-06-12 13:59:42', 0, 0, 0),
(57, 9, '2023-06-12 14:59:33', 0, 0, 0),
(58, 9, '2023-06-12 18:01:57', 0, 0, 0),
(59, 9, '2023-06-12 18:03:03', 0, 0, 0),
(60, 9, '2023-04-21 02:16:46', 1, 1, 1),
(61, 9, '2023-04-29 02:17:29', 1, 1, 1),
(62, 9, '2023-05-17 15:24:01', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `item_id`, `item_name`, `item_price`, `item_quantity`) VALUES
(3, 20, 'Chicken Puffs', 15.00, 1),
(3, 21, 'Chicken Burger', 40.00, 1),
(3, 13, 'Veg Biriyani', 60.00, 1),
(49, 20, 'Chicken Puffs', 15.00, 1),
(49, 21, 'Chicken Burger', 40.00, 1),
(49, 13, 'Veg Biriyani', 60.00, 2),
(50, 20, 'Chicken Puffs', 15.00, 1),
(51, 20, 'Chicken Puffs', 15.00, 1),
(52, 13, 'Veg Biriyani', 60.00, 1),
(52, 18, 'Samosa', 10.00, 1),
(52, 19, 'Vada', 10.00, 1),
(52, 23, 'Coffee', 12.00, 1),
(52, 24, 'Sharjah Shake', 50.00, 1),
(53, 24, 'Sharjah Shake', 50.00, 3),
(54, 12, 'Kerala Meals', 50.00, 10),
(55, 12, 'Kerala Meals', 50.00, 2),
(55, 19, 'Vada', 10.00, 1),
(55, 13, 'Veg Biriyani', 60.00, 1),
(56, 17, 'Beef Curry', 70.00, 2),
(57, 16, 'Chicken Curry', 90.00, 4),
(58, 7, 'Chappathi', 8.00, 3),
(59, 13, 'Veg Biriyani', 60.00, 4),
(59, 23, 'Coffee', 12.00, 2),
(59, 24, 'Sharjah Shake', 50.00, 2),
(59, 25, 'Apple Pie', 40.00, 2),
(60, 17, 'Beef Curry', 70.00, 4),
(61, 16, 'Chicken Curry', 90.00, 5),
(61, 22, 'Tea', 10.00, 10),
(62, 17, 'Beef Curry', 70.00, 7),
(62, 23, 'Coffee', 12.00, 10);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_bills`
--

CREATE TABLE `teacher_bills` (
  `bill_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `billed_amt` decimal(10,2) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_bills`
--

INSERT INTO `teacher_bills` (`bill_id`, `teacher_id`, `month`, `year`, `billed_amt`, `paid`) VALUES
(1, 9, 6, 23, 1138.00, 0),
(6, 9, 5, 23, 2912.00, 0),
(7, 9, 4, 23, 1539.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_records`
--

CREATE TABLE `teacher_records` (
  `teacher_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_records`
--

INSERT INTO `teacher_records` (`teacher_id`, `order_id`, `paid`) VALUES
(9, 55, 0),
(9, 56, 0),
(9, 57, 0),
(9, 58, 0),
(9, 59, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(48) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(48) NOT NULL,
  `tokens` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `name`, `tokens`) VALUES
(6, 'chn20cs071@ceconline.edu', 'Mohammed Faris', '$2y$10$Ve37Nk5C3DlObfROFlrWDecxcvv7MycRb64Uhpc85DXSERWPGowsq', 'Faris ', 0.00),
(9, 'chn20cs070@ceconline.edu', 'miraz', '$2y$10$SRmMb3I3oj/ySXBkejuv/ezWNiGxj4aCzEt2YWyAs2HJd2fd1wGKy', 'Miraz J Naina', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category_id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `id` (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `teacher_bills`
--
ALTER TABLE `teacher_bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD UNIQUE KEY `teacher_id` (`teacher_id`,`month`,`year`);

--
-- Indexes for table `teacher_records`
--
ALTER TABLE `teacher_records`
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `tokens` (`tokens`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `teacher_bills`
--
ALTER TABLE `teacher_bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `order_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`id`) REFERENCES `order_history` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `teacher_bills`
--
ALTER TABLE `teacher_bills`
  ADD CONSTRAINT `teacher_bills_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teacher_records`
--
ALTER TABLE `teacher_records`
  ADD CONSTRAINT `teacher_records_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `teacher_records_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_history` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
