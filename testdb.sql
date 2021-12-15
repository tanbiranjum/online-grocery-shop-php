-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 08, 2020 at 04:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customerorder`
--

CREATE TABLE `customerorder` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_phone` int(11) NOT NULL,
  `order_city` varchar(64) NOT NULL,
  `oder_details` varchar(255) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerorder`
--

INSERT INTO `customerorder` (`order_id`, `user_id`, `order_date`, `order_phone`, `order_city`, `oder_details`, `order_status`, `order_price`) VALUES
(8, 1, '2020-11-06', 1703586871, 'Dhaka, Bangladesh', 'Hello', 'pending', 500);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `cart_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `order_quantity` int(5) NOT NULL,
  `order_price` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`cart_id`, `order_id`, `product_name`, `order_quantity`, `order_price`) VALUES
(1, 8, 'Guava', 1, 50),
(2, 8, 'Orange', 1, 80),
(3, 8, 'Apple', 1, 70),
(4, 8, 'Koi', 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_tag` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_catagory` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_tag`, `product_price`, `product_catagory`, `product_image`) VALUES
(1, 'Apple', 'Kg', 70, 'Fruits & Vegetables', 'public/images/apple.webp'),
(2, 'Orange', 'Kg', 80, 'Fruits & Vegetables', 'public/images/orange.webp'),
(3, 'Guava', 'Kg', 50, 'Fruits & Vegetables', 'public/images/guava.webp'),
(4, 'Malta', 'Kg', 90, 'Fruits & Vegetables', 'public/images/malta.webp'),
(5, 'Shrimp', 'Kg', 200, 'Meat & Fish', 'public/images/shrimp.webp'),
(6, 'Tilapia', 'Kg', 160, 'Meat & Fish', 'public/images/tilapia.webp'),
(7, 'Koi', 'Kg', 300, 'Meat & Fish', 'public/images/koi.webp'),
(8, 'Panghas', 'Kg', 160, 'Meat & Fish', 'public/images/pangas.webp'),
(9, 'Poa', 'Kg', 270, 'Meat & Fish', 'public/images/poa.webp'),
(10, 'Tengra', 'Kg', 490, 'Meat & Fish', 'public/images/tengra.webp'),
(11, 'Fruitika', 'Ltr', 90, 'Drink & Beverages', 'public/images/fruitika.webp'),
(12, 'Coca Cola', 'Ltr', 90, 'Drink & Beverages', 'public/images/cocacola.webp'),
(13, 'Coca Cola Can', 'Ltr', 80, 'Drink & Beverages', 'public/images/cocacolacan.webp'),
(14, 'Fanta', 'Ltr', 90, 'Drink & Beverages', 'public/images/fanta.webp'),
(15, 'Miranda', 'Ltr', 90, 'Drink & Beverages', 'public/images/miranda.webp'),
(16, 'Mountain Dew', 'Ltr', 70, 'Drink & Beverages', 'public/images/mountaindew.webp'),
(17, 'Pepsi', 'Ltr', 90, 'Drink & Beverages', 'public/images/pepsi.webp'),
(18, 'Sprite', 'Ltr', 90, 'Drink & Beverages', 'public/images/sprite.webp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `user_rule` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_phone`, `user_email`, `user_address`, `user_pwd`, `user_rule`) VALUES
(1, 'Tanbir', '1703586871', 'anjtanvir@gmail.com', 'Dhaka, Bangladesh', '1234', 'user'),
(3, 'Anjum', '1703596971', 'anjtanbir@gmail.com', 'dhaka', '1234', 'user'),
(5, 'Anjum', '01703596971', 'sayanthy@gmail.com', 'Chittagong', '1234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customerorder`
--
ALTER TABLE `customerorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerorder`
--
ALTER TABLE `customerorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `customerorder` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
