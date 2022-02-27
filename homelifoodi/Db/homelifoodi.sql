-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 05:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homelifoodi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `prdt_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `quantity` int(20) NOT NULL,
  `unit_price` varchar(20) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `prdt_id`, `login_id`, `quantity`, `unit_price`, `total_price`, `cart_status`) VALUES
(13, 2, 4, 10, '250', '2500', 0),
(31, 1, 1, 1, '250', '250', 1),
(32, 4, 1, 4, '130', '520', 1),
(33, 3, 1, 1, '180', '180', 1),
(40, 4, 5, 1, '130', '130', 1),
(41, 4, 5, 1, '130', '130', 1),
(42, 3, 5, 2, '180', '360', 1),
(43, 4, 5, 2, '130', '260', 1),
(44, 3, 5, 1, '180', '180', 0),
(45, 2, 1, 2, '200', '400', 1),
(46, 1, 1, 1, '250', '250', 1),
(47, 4, 1, 1, '130', '130', 1),
(48, 4, 1, 1, '130', '130', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_address` varchar(50) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `cust_mobile` varchar(20) NOT NULL,
  `login_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_address`, `cust_email`, `cust_mobile`, `login_id`) VALUES
(1, 'Aadam', 'Kerala', 'aadam@gmail.com', '7902429601', 1),
(2, 'Akshay', 'Delhi', 'akshay@gmail.com', '7865984512', 4),
(3, 'Amal', 'Kottayam', 'amal@gmail.com', '9887542356', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `prdt_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `chefs_id` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `del_name` varchar(20) NOT NULL,
  `del_phone` varchar(20) NOT NULL,
  `del_addr` varchar(50) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `order_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `prdt_id`, `cart_id`, `login_id`, `chefs_id`, `order_time`, `del_name`, `del_phone`, `del_addr`, `payment_method`, `order_status`) VALUES
(3, 4, 40, 5, 1, '0000-00-00 00:00:00', 'Amal', '9854786589', 'Idukki', 'card', 0),
(4, 4, 40, 5, 1, '0000-00-00 00:00:00', 'Amal', '7845986512', 'Idukki', 'upi', 0),
(5, 4, 43, 5, 1, '0000-00-00 00:00:00', 'Amal', '9878459865', 'Idukki', 'upi', 0),
(6, 3, 44, 5, 1, '2022-02-27 15:41:32', 'Akshay', '9887545698', 'Idukki', 'cod', 0),
(7, 3, 44, 5, 1, '2022-02-27 15:42:01', 'Akshay', '9878456598', 'Kottayam', 'cod', 0),
(8, 1, 31, 1, 1, '2022-02-27 15:44:05', 'aadam', '9878456598', 'Kottayam', 'cod', 0),
(9, 2, 45, 1, 1, '2022-02-27 15:47:11', 'Tom', '9854782365', 'Kanjirappally', 'card', 0),
(10, 1, 46, 1, 1, '2022-02-27 15:51:04', 'Ashish', '5698548732', 'Kannur', 'card', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prdt_id` int(11) NOT NULL,
  `chefs_id` int(11) NOT NULL,
  `prdt_name` varchar(25) NOT NULL,
  `prdt_price` varchar(30) NOT NULL,
  `prdt_image` varchar(500) NOT NULL,
  `prdt_description` varchar(50) NOT NULL,
  `prdt_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prdt_id`, `chefs_id`, `prdt_name`, `prdt_price`, `prdt_image`, `prdt_description`, `prdt_status`) VALUES
(1, 1, 'Broasted Chicken', '250', 'post-img-02.jpg', 'Freshly Broasted chicken.Provides better taste and', 0),
(2, 1, 'Pazzta', '200', 'home-bg.jpg', 'fresh pazzta', 0),
(3, 2, 'Heathy salad', '180', 'Lunch Box - 900x802.png', 'Healthy salad', 0),
(4, 2, 'Noodles', '130', 'eaters-collective-12eHC6FxPyg-unsplash.jpg', 'Tasty Noodles', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chefs`
--

CREATE TABLE `tbl_chefs` (
  `chefs_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `chef_name` varchar(25) NOT NULL,
  `chef_address` varchar(50) NOT NULL,
  `chef_email` varchar(30) NOT NULL,
  `chef_mobile` varchar(20) NOT NULL,
  `chef_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chefs`
--

INSERT INTO `tbl_chefs` (`chefs_id`, `login_id`, `chef_name`, `chef_address`, `chef_email`, `chef_mobile`, `chef_image`) VALUES
(1, 2, 'Faizy', 'Kottayam', 'faizy@gmail.com', '6282849292', 'stuff-img-04.jpg'),
(2, 3, 'Saya', 'Kochi', 'saya@gmail.com', '6282849292', 'stuff-img-05.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `username`, `password`, `status`, `role`) VALUES
(1, 'aadam', 'aadam123#', 1, 'customer'),
(2, 'faizy', 'faizy123#', 0, 'chef'),
(3, 'saya', 'saya123#', 0, 'chef'),
(4, 'akshay', '3b00e8e8000ebe8e0ce3', 0, 'customer'),
(5, 'amal', 'd151b23896805bc99ee3', 0, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `login_id` (`login_id`),
  ADD KEY `prdt_id` (`prdt_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `cust_username` (`login_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `chefs_id` (`chefs_id`),
  ADD KEY `prdt_id` (`prdt_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prdt_id`),
  ADD KEY `chef_id` (`chefs_id`);

--
-- Indexes for table `tbl_chefs`
--
ALTER TABLE `tbl_chefs`
  ADD PRIMARY KEY (`chefs_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prdt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_chefs`
--
ALTER TABLE `tbl_chefs`
  MODIFY `chefs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`prdt_id`) REFERENCES `products` (`prdt_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `chefs_id` FOREIGN KEY (`chefs_id`) REFERENCES `tbl_chefs` (`chefs_id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`),
  ADD CONSTRAINT `prdt_id` FOREIGN KEY (`prdt_id`) REFERENCES `products` (`prdt_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `chef_id` FOREIGN KEY (`chefs_id`) REFERENCES `tbl_chefs` (`chefs_id`);

--
-- Constraints for table `tbl_chefs`
--
ALTER TABLE `tbl_chefs`
  ADD CONSTRAINT `login_id` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
