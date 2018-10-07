-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2017 at 08:16 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `woc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'kartik.gowda55@gmail.com', 'kartik'),
(2, 'shreyas@gmail.com', 'shreyas');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Cars'),
(2, 'Currency'),
(3, 'Comics'),
(4, 'Stamps'),
(5, 'Toys'),
(6, 'Books');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` bigint(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(4, 'Kartik', 'kartik.gowda55@gmail.com', 'kartik', 'India', 'Mumbai', 8976391629, 'C-1,34, Asmita Jyothi CHS, Marve Road , Malad West.', 'profile_img.png', 0),
(5, 'bhavin', 'b108@gmail.com', 'sammy123', 'India', 'Mumbai', 9619614218, 'C-1,34, Asmita Jyothi CHS, Marve Road , Malad West.', 'Penguins.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(10, 4, 13600, 2008799861, 1, '2017-06-02 10:41:55', 'Complete'),
(12, 4, 13611, 1156087803, 2, '2017-06-02 13:18:35', 'Complete'),
(13, 4, 20, 505882426, 1, '2017-06-07 09:59:37', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(2, 1486377325, 13600, 'Paypal', 1111, 3213123, '12-05-17'),
(3, 2008799861, 13600, 'EasyPaisa', 3121312, 3123, '25-06-2014'),
(4, 1475196673, 13213, 'EasyPaisa', 1111, 1111, '12-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(100) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(11, 4, 1156087803, 9, 1, 'Pending'),
(12, 4, 505882426, 6, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `status`) VALUES
(1, 3, '2017-05-10 10:14:46', 'CAPTAIN MARVEL #95', 'marvel.jpg', '', '', 40, 'GOod', 'captain, marvel comic', 'on'),
(2, 1, '2017-05-28 09:53:42', '1998 Jaguar XJ8 Exec', '4-27-762x456.jpg', '', '', 19901, 'This very luxurious saloon from Jaguar as a V8 engine with 281HP. Recently, the whole distributionset  including fan belt idler was replaced by a modified distributionset. This car has driven 56.000 real kms since 1998 and is in a really magnificent original condition, as good as new.', 'car jaguar 1998 used', 'on'),
(4, 1, '2017-05-10 06:22:04', '1992 Lamborghini Diablo', '3089_main_l.jpg', '3089_p3_l.jpg', '3089_p7_l.jpg', 13600, '1992 Lamborghini Diablo: A highly collectible modern classic super-car This 1992 Lamborghini Diablo is a beautiful original example and a California car with 26k kilometers.  This first generation Diablo comes finished in black with cream interior. Itâ€™s a three owner car accompanied by its books and tools. It also benefits from a new clutch just 1,000 km ago. After 17 years in production, the legendary Countach was replaced by the Diablo, which on its arrival was the fastest, most advanced, and expensive Lamborghini ever built. ', '1992 Lamborghini Diablo Car', 'on'),
(6, 4, '2017-05-10 06:21:46', 'India Scott # 676', 'thumbnail.jpg', '', '', 20, 'Gandhi Stamp', 'Stamp Gandhi Indian', 'on'),
(7, 4, '2017-05-10 06:21:36', '1993 Canvasbacks ', '$_57.jpg', '', '', 57, '$15 Stamp FDC Olde-Well HandPainted S#RW60', '1993 Canvasbacks Stamp', 'on'),
(8, 4, '2017-05-10 06:21:10', '1998 Lunar Tiger New Year', '!CD8BHmgEGk-$(KGrHqV,!jkE0CsEOTISBNQNu)tUoQ--_35.jpg', '', '', 4, '3179 Asian 1998 Lunar Tiger New Year MNH Plate 4 Stamps', '1998 Lunar Year Stamps', 'on'),
(9, 6, '2017-05-10 06:20:43', 'COLLECTING BAYONETS', 's-l1600.jpg', 's-l1600 (2).jpg', 's-l1600 (1).jpg', 11, 'condition:Like New\r\nVery light rub marks on corners. Otherwise the book appears new', 'books Books Collecting', 'on'),
(10, 6, '2017-05-10 06:20:57', '1936 DONALD DUCK BOOK', 's-l500.jpg', 's-l64 (1).jpg', 's-l64.jpg', 49, 'RARE VINTAGE 1936 DONALD DUCK BOOK GROSSET & DUNLAP WALT DISNEY 1st Hard Cover', 'books book donald duck 1936', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
