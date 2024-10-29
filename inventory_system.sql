-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Oct 14, 2024 at 03:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `buying_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category`, `buying_price`, `selling_price`, `stock_quantity`, `supplier_id`) VALUES
(1, 'Rice 5kg', 'Food', 150.00, 180.00, 500, 1),
(2, 'Canned Tuna', 'Packaged Goods', 25.00, 35.00, 230, 2),
(3, 'Toothpaste 150g', 'Personal Care', 50.00, 65.00, 640, 3),
(4, 'Shampoo 400ml', 'Personal Care', 120.00, 150.00, 345, 3),
(5, 'Dishwashing Liquid 1L', 'Household Items', 70.00, 90.00, 190, 3),
(6, 'Detergent Powder 1kg', 'Household Items', 85.00, 110.00, 115, 4),
(7, 'Soda 1.5L', 'Beverages', 40.00, 60.00, 235, 5),
(8, 'Coffee 200g', 'Beverages', 90.00, 110.00, 100, 6),
(9, 'Milk 1L', 'Beverages', 70.00, 95.00, 150, 7),
(10, 'Bread Loaf 400g', 'Food', 45.00, 70.00, 260, 8),
(11, 'Sugar 1kg', 'Food', 45.00, 60.00, 200, 1),
(12, 'Cooking Oil 1L', 'Food', 90.00, 120.00, 160, 8),
(13, 'Tissue Roll (4pcs)', 'Household Items', 35.00, 50.00, 80, 4),
(14, 'Instant Noodles', 'Packaged Goods', 10.00, 15.00, 500, 9),
(15, 'Vinegar 1L', 'Food', 25.00, 40.00, 120, 2),
(16, 'Baby Diapers (Pack)', 'Non-food Items', 120.00, 150.00, 210, 10),
(17, 'Floor Cleaner 1L', 'Household Items', 60.00, 80.00, 50, 4),
(18, 'Tomato Sauce 250g', 'Packaged Goods', 20.00, 35.00, 340, 9),
(19, 'Pasta 500g', 'Packaged Goods', 35.00, 50.00, 87, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity_sold` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `product_id`, `quantity_sold`, `total_amount`, `date`) VALUES
(1, 14, 47, 705.00, '2024-10-14 12:03:05'),
(2, 5, 42, 3780.00, '2024-10-14 12:03:39'),
(3, 19, 82, 4100.00, '2024-10-14 12:04:36'),
(4, 18, 94, 3290.00, '2024-10-14 12:05:26'),
(5, 10, 54, 3780.00, '2024-10-14 12:06:28'),
(6, 1, 356, 64080.00, '2024-10-14 12:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `supplier_name` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `product_id`, `supplier_name`, `contact`) VALUES
(1, NULL, 'Grain Masters Inc.', '09171234567'),
(2, NULL, 'Oceanic Foods Co.', '09182345678'),
(3, NULL, 'Fresh Hygiene Supply', '09193456789'),
(4, NULL, 'Clean Solutions Inc.', '09204567890'),
(5, NULL, 'Drink Plus Beverages', '09215678901'),
(6, NULL, 'Morning Brew Corp.', '09226789012'),
(7, NULL, 'Dairy Delights Inc. ', ' 09237890123'),
(8, NULL, 'Golden Grain Foods', '09248901234'),
(9, NULL, 'Flavor Savers Corp.', '09304567890'),
(10, NULL, 'Family Care Supplies', '09437890123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `sales_ibfk_1` (`product_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
