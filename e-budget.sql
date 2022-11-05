-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 03:18 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_state`
--

CREATE TABLE `account_state` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cust_id` bigint(20) DEFAULT NULL,
  `supp_id` bigint(20) DEFAULT NULL,
  `state` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_state`
--

INSERT INTO `account_state` (`id`, `cust_id`, `supp_id`, `state`) VALUES
(1, 1, NULL, 'confirmed'),
(14, NULL, 7, 'confirmed'),
(13, NULL, 6, 'confirmed'),
(20, NULL, 8, 'confirmed'),
(19, 19, NULL, 'confirmed'),
(21, 20, NULL, 'confirmed'),
(22, NULL, 9, 'confirmed'),
(23, 21, NULL, 'confirmed'),
(24, NULL, 11, 'confirmed'),
(25, 22, NULL, 'not confirmed'),
(26, NULL, 12, 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(70) NOT NULL,
  `access_level` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `access_level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 5);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `id_number` varchar(10) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `password` varchar(60) NOT NULL,
  `createdon` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `id_number`, `gender`, `email`, `phone_number`, `password`, `createdon`) VALUES
(1, 'David', 'Syengo', '27872760', 'male', 'david.syengo019@gmail.com', '0712594022', '46CCADC1C6A44552C3B767D4E7B321759C36DF4F', '2021-04-25 12:56:32'),
(19, 'Philip', 'Litu', '26675609', 'male', 'phillitu@gmail.com', '+254723540487', 'cc3efda6d1414d8f6d2fd9af496c294a1dc9bde7', '2021-04-25 12:56:32'),
(20, 'Hacker', '1234', '34567892', 'male', 'hacker@gmail.com', '0723456789', 'c30221802ad4e123b1e3a58b975d5a453765ca3b', '2021-04-25 12:56:32'),
(21, 'Gabriel', 'Jesus', '134500JI', 'male', 'gjesus17@gmail.com', '+6178900125', '46ccadc1c6a44552c3b767d4e7b321759c36df4f', '2021-04-25 12:56:32'),
(22, 'Nancy', 'Mutekwa', '30309998', 'female', 'nmutekwa@safaricom.co.ke', '0734567890', '46ccadc1c6a44552c3b767d4e7b321759c36df4f', '2021-08-07 00:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` varchar(15) NOT NULL,
  `time_of_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivered` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cart_id`, `time_of_order`, `delivered`) VALUES
(1, 'DS09:00 PM', '2014-03-01 20:01:09', 'NO'),
(2, 'DS09:00 PM', '2014-03-01 20:03:15', 'NO'),
(3, 'DS02:52 PM', '2021-04-27 12:53:06', 'NO'),
(4, 'DS02:52 PM', '2021-04-27 12:53:15', 'NO'),
(5, 'DS02:52 PM', '2021-04-27 12:53:37', 'NO'),
(6, '', '2021-04-27 13:01:36', 'NO'),
(7, '', '2021-04-27 13:02:13', 'NO'),
(8, '', '2021-04-27 13:02:40', 'NO'),
(9, '', '2021-04-27 13:03:00', 'NO'),
(10, '', '2021-04-27 13:03:21', 'NO'),
(11, '', '2021-04-27 13:03:36', 'NO'),
(12, '', '2021-04-27 13:05:06', 'NO'),
(13, '', '2021-04-27 13:05:16', 'NO'),
(14, '0', '2021-04-27 13:08:27', 'NO'),
(15, '0', '2021-04-27 13:45:53', 'NO'),
(16, '', '2021-04-27 13:47:52', 'NO'),
(17, 'DS03:48 PM', '2021-04-27 13:49:13', 'NO'),
(18, 'DS08:09 PM', '2021-04-28 18:11:13', 'NO'),
(19, '0', '2021-07-08 12:46:15', 'NO'),
(20, 'DS02:49 PM', '2021-07-08 12:49:09', 'NO'),
(21, 'DS08:05 PM', '2021-08-03 18:05:12', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trans_code` varchar(12) NOT NULL,
  `payer_name` varchar(40) NOT NULL,
  `payer_number` varchar(15) NOT NULL,
  `amount_paid` float NOT NULL,
  `time_paid` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_id` bigint(20) DEFAULT NULL,
  `confirmed` varchar(7) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `trans_code`, `payer_name`, `payer_number`, `amount_paid`, `time_paid`, `order_id`, `confirmed`) VALUES
(2, 'WD3453', 'DAVID SYENGO', '0712594022', 53105, '2013-04-28 05:56:56', 1, 'YES'),
(3, 'ER4567Y', 'NEW USER', '+254733456789', 5760, '2013-04-28 09:07:27', 17, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `physical_addresses`
--

CREATE TABLE `physical_addresses` (
  `customer_id` bigint(20) NOT NULL,
  `town` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `street_estate` varchar(50) NOT NULL,
  `plot_no_name` varchar(30) NOT NULL,
  `door_no` varchar(5) NOT NULL,
  `add_details` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physical_addresses`
--

INSERT INTO `physical_addresses` (`customer_id`, `town`, `area`, `street_estate`, `plot_no_name`, `door_no`, `add_details`) VALUES
(1, 'Nairobi', 'Roysambu', 'TRM Drive', 'Amani Apartments', 'G2', 'Along the lane leading to Lumumba drive.'),
(19, 'nairobi', 'mathare', 'edens', 'jozi flats', '18', 'opposite breweries'),
(20, 'Entebbe', 'Uringi', 'Crescent', '42', '2', 'Along state house house 500m past it infact. Good sport!'),
(21, 'Nairobi', 'Roysambu', 'Site2', 'Amani Apartments', 'G2', 'ppppp'),
(22, 'Nairobi', 'South B', 'Hapo Tu', '67', 'B2', 'Apartment 32');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `product_id` bigint(20) NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`product_id`, `price`) VALUES
(1, 35),
(2, 75),
(3, 20),
(4, 60),
(5, 55),
(6, 120),
(7, 90),
(9, 88),
(10, 179),
(25, 300),
(21, 85),
(20, 27),
(19, 295),
(18, 235),
(16, 13400),
(17, 12995),
(26, 45),
(28, 51995),
(29, 7999),
(30, 45),
(31, 65),
(32, 134),
(33, 23),
(34, 195),
(36, 8400),
(37, 1390),
(38, 1390),
(39, 1390),
(40, 410),
(41, 3700),
(42, 30),
(43, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(80) NOT NULL,
  `category_id` int(3) NOT NULL,
  `subcategory_id` int(4) NOT NULL,
  `quantity` varchar(40) DEFAULT NULL,
  `store_id` int(5) NOT NULL,
  `image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `description`, `category_id`, `subcategory_id`, `quantity`, `store_id`, `image`) VALUES
(1, 'cogate toothpaste fresh', 101, 1011, '300ml', 1, 'images/products/colgate-toothpaste.jpg'),
(2, 'cogate toothpaste herbal', 101, 1011, '500ml', 1, 'images/products/colgate-herbal.jpg'),
(3, 'bic ballpoint pen (blue,red,black)', 103, 1031, 'normal size', 1, 'images/products/bic_cristal_ballpoint_pent.jpg'),
(4, 'geisha new soap', 101, 1014, '500mg', 2, 'images/products/geisha_new.jpg'),
(5, 'geisha herbal', 101, 1014, '250mg', 2, 'images/products/geisha.jpg'),
(6, 'omo washing powder', 101, 1014, '500g', 2, 'images/products/OMO-500x500.jpg'),
(7, 'tomatoes', 105, 1052, '1kg', 2, 'images/products/tomatoes.jpg'),
(10, 'Mumias sugar (White)', 104, 1044, '2kg', 5, 'images/products/Mumias sugar old-500x500.jpg'),
(9, 'soko maize meal', 104, 1041, '2kg', 2, 'images/products/soko.png'),
(17, 'SAMSUNG CAM (Blue)', 200, 2001, '1 Piece', 6, 'images/products/SAMSUNG CAM.png'),
(16, 'SONY DIGITAL CAMERA ZY90i', 200, 2001, 'one piece', 6, 'images/products/SONY DIGITAL CAMERA ZY90i.png'),
(18, 'Nivea Lotion (MEN)', 102, 1021, '300ml', 6, 'images/products/Nivea Lotion (MEN).png'),
(19, 'NIVEA LOTION BODY MILK', 102, 1021, '250ml', 7, 'images/products/NIVEA LOTION BODY MILK.png'),
(20, 'Sukuma Wiki (Fresh)', 105, 1051, 'bunch', 6, 'images/products/Sukuma Wiki (Fresh).png'),
(21, 'Geisha Soap', 101, 1014, '200g', 2, 'images/products/Geisha Soap.png'),
(26, 'Tuzo fresh milk', 106, 1061, '500ml', 8, 'images/products/Tuzo fresh milk.png'),
(25, 'nivea', 102, 1021, '300ml', 6, 'images/products/nivea.png'),
(28, 'Sony Television LCD', 200, 2002, '32 inch', 8, 'images/products/Sony Television LCD.png'),
(29, 'Samsung DUOS', 200, 2003, '1 piece', 8, 'images/products/Samsung DUOS.png'),
(30, 'KCC Flavoured milk', 106, 1062, '250ml', 8, 'images/products/KCC Flavoured milk.png'),
(31, 'Baked White bread', 104, 1043, '400g', 8, 'images/products/Baked White bread.png'),
(32, 'Sony sugar', 104, 1044, '1kg', 8, 'images/products/Sony sugar.png'),
(33, 'blue biros', 103, 1031, '45pack', 6, 'images/products/blue biros.png'),
(34, 'Cornflakes', 104, 1046, '150g', 6, 'images/products/Cornflakes.png'),
(35, 'Von Sub-Woofer 2.1', 200, 2007, '30', 8, 'not set'),
(36, 'Von Sub-Woofer 2.1', 200, 2007, '35', 8, 'images/products/Von Sub-Woofer 2.1.png'),
(40, '1 Packet of 4 Kiwi Fruits', 107, 10701, '4 Kiwis', 11, 'images/products/1 Packet of 4 Kiwi Fruits.png'),
(39, 'Generic Big Vibrator For Woman', 900, 9001, '500', 11, 'images/products/Generic Big Vibrator For Woman.png'),
(41, 'Johnny Walker Black Label', 106, 106002, '700ml', 12, 'images/products/Johnny Walker Black Label 700ml.png'),
(42, 'Indomie Chicken Noodles', 104, 10405, '70g', 12, 'images/products/Indomie Chicken Noodles 70g.png'),
(43, 'Turkish Cotton Towels', 150, 15001, 'Large', 12, 'images/products/Turkish Cotton Towels.png');

-- --------------------------------------------------------

--
-- Table structure for table `p_categories`
--

CREATE TABLE `p_categories` (
  `id` int(3) NOT NULL,
  `description` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_categories`
--

INSERT INTO `p_categories` (`id`, `description`) VALUES
(101, 'toiletry'),
(103, 'stationery'),
(102, 'cosmetics'),
(105, 'vegetables'),
(104, 'foods-stuffs'),
(107, 'fruits'),
(200, 'Electronics'),
(106, 'drinks'),
(900, 'Other Products'),
(150, 'Clothings'),
(160, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `p_subcategories`
--

CREATE TABLE `p_subcategories` (
  `id` int(3) NOT NULL,
  `description` varchar(80) NOT NULL,
  `category_id` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_subcategories`
--

INSERT INTO `p_subcategories` (`id`, `description`, `category_id`) VALUES
(1011, 'toothpastes', 101),
(1031, 'pens & writers', 103),
(1014, 'soaps and detergents', 101),
(1021, 'ointments', 102),
(1051, 'leafy vegetables', 105),
(1041, 'flours', 104),
(1052, 'other vegetables', 105),
(1044, 'Sugars', 104),
(2001, 'Cameras', 200),
(2002, 'Television sets', 200),
(1061, 'milk', 106),
(1046, 'Cereals', 104),
(2003, 'Mobile Phones', 200),
(1043, 'cakes and bread', 104),
(1062, 'Flavored milk', 106),
(2007, 'stereos and sound systems', 200),
(9001, 'Sex Toys', 900),
(10701, 'Packed Fresh Fruits', 107),
(106002, 'Alcoholic drinks', 106),
(10405, 'Packaged Snacks', 104),
(15001, 'Personal clothings', 150);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` varchar(15) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `store_id` int(5) NOT NULL,
  `quantity` int(3) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `price_per_item` int(6) NOT NULL,
  `amount_payable` int(9) NOT NULL,
  `checked` varchar(6) NOT NULL,
  `addedon` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `product_id`, `store_id`, `quantity`, `customer_id`, `price_per_item`, `amount_payable`, `checked`, `addedon`) VALUES
('DS09:00 PM', 1, 1, 2, 1, 35, 70, 'yes', '2021-04-25 12:59:52'),
('DS09:00 PM', 7, 2, 6, 1, 90, 540, 'yes', '2021-04-25 12:59:52'),
('DS09:00 PM', 18, 6, 1, 1, 235, 235, 'yes', '2021-04-25 12:59:52'),
('DS09:00 PM', 28, 8, 1, 1, 51995, 51995, 'yes', '2021-04-25 12:59:52'),
('DS09:00 PM', 31, 8, 1, 1, 65, 65, 'yes', '2021-04-25 12:59:52'),
('GJ11:53 AM', 1, 1, 2, 21, 35, 70, 'no', '2021-04-25 12:59:52'),
('DS02:52 PM', 39, 11, 4, 1, 1390, 5560, 'yes', '2021-04-27 15:52:12'),
('DS03:48 PM', 6, 2, 2, 1, 120, 240, 'yes', '2021-04-27 16:48:55'),
('DS03:48 PM', 7, 2, 6, 1, 90, 540, 'yes', '2021-04-27 16:48:59'),
('DS03:48 PM', 9, 2, 5, 1, 88, 440, 'yes', '2021-04-27 16:49:06'),
('DS08:05 PM', 6, 2, 2, 1, 120, 240, 'no', '2021-08-03 21:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `smscodes`
--

CREATE TABLE `smscodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `store_id` int(5) DEFAULT NULL,
  `code` varchar(7) NOT NULL,
  `send` varchar(5) NOT NULL,
  `createdon` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smscodes`
--

INSERT INTO `smscodes` (`id`, `customer_id`, `store_id`, `code`, `send`, `createdon`) VALUES
(13, 19, NULL, '34670', 'YES', '2021-04-25 12:55:42'),
(14, NULL, 8, '148482', 'YES', '2021-04-25 12:55:42'),
(15, 20, NULL, '136291', 'NO', '2021-04-25 12:55:42'),
(16, 0, NULL, '277530', 'NO', '2021-04-25 12:55:42'),
(17, 9, NULL, '165547', 'NO', '2021-04-25 12:55:42'),
(18, 21, NULL, '247620', 'NO', '2021-04-25 12:55:42'),
(19, 0, NULL, '15924', 'NO', '2021-04-25 13:03:06'),
(20, 0, NULL, '237683', 'NO', '2021-04-25 13:24:13'),
(21, 0, NULL, '25468', 'NO', '2021-04-25 13:35:46'),
(22, 0, NULL, '176558', 'NO', '2021-04-25 13:58:51'),
(23, 11, NULL, '14176', 'NO', '2021-04-25 14:07:51'),
(24, 22, NULL, '177125', 'NO', '2021-08-07 00:43:13'),
(25, 12, NULL, '33717', 'NO', '2021-08-31 15:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `logo` varchar(60) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `logo`, `phone`, `email`, `password`) VALUES
(1, 'Uchumi Supermarkets', 'images/stores/uchumi.png', '0756432123', 'uchumistores@yahoo.com', '966ac4713e4bb0197e2e032068d7c057c2065e1f'),
(2, 'Nakumatt Holdings', 'images/stores/nakumatt.gif', '0789654321', 'nakumatt@yahoo.com', 'ac58bf0f87ca48bf8c0754b4d2f48a7e904450fb'),
(5, 'Naivas Supermarkets', 'images/stores/Naivas Supermarkets_logo.png', '0206754322', 'naivas@nstores.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(6, 'Tuskys Supermarkets', 'images/stores/Tuskys_logo.png', '0788952515', 'tuskys@gmail.com', 'e0c5537a98a7c81d14eebcc833e1ad00c37f5b98'),
(7, 'Ukwala Supermarket', 'images/stores/Ukwala Supermarket_logo.png', '0712594021', 'ukwala@gmail.com', '36f657ecf56705dab5161eb897db55fa6298fc87'),
(8, 'Wyda and Sons', 'images/stores/Wyda and Sons_logo.png', '+254712594022', 'wysha@gmail.com', '46CCADC1C6A44552C3B767D4E7B321759C36DF4F'),
(11, 'Shoprite Supermart', 'images/stores/shoprite.png', '+254700909090', 'admin@shoprite.co.ke', '46ccadc1c6a44552c3b767d4e7b321759c36df4f'),
(12, 'CarreFour', 'images/stores/carrefour.png', '0709001122', 'admin@carrefour.com', '46ccadc1c6a44552c3b767d4e7b321759c36df4f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_state`
--
ALTER TABLE `account_state`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`trans_code`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `p_categories`
--
ALTER TABLE `p_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_subcategories`
--
ALTER TABLE `p_subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD KEY `id` (`id`);

--
-- Indexes for table `smscodes`
--
ALTER TABLE `smscodes`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_state`
--
ALTER TABLE `account_state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `smscodes`
--
ALTER TABLE `smscodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
