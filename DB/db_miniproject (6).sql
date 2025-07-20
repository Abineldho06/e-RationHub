-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 12:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(6, 'Abin Eldhose', 'abin2164@gmail.com', 'abin123'),
(9, 'Jibin Vinu', 'jibinvinu@gmail.com', 'jibin456'),
(10, 'Basil sabu', 'basil123@gmail.com', 'basil123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `ration_id` int(11) NOT NULL,
  `booking_date` varchar(70) NOT NULL,
  `booking_status` varchar(100) NOT NULL,
  `booking_amount` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `ration_id`, `booking_date`, `booking_status`, `booking_amount`, `user_id`, `booking_token`) VALUES
(10, 12, '2024-11-30', '', '260', 13, '5277051148');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card`
--

CREATE TABLE `tbl_card` (
  `card_id` int(11) NOT NULL,
  `card_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_card`
--

INSERT INTO `tbl_card` (`card_id`, `card_name`) VALUES
(4, 'AAY(YELLOW)'),
(6, 'BPL'),
(7, 'Non-Priority(WHITE)'),
(8, 'APL(priority)'),
(9, 'APL(non-priority)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(6, 'Rice'),
(7, 'Wheat'),
(8, 'Coal oil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(60) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `complaint_reply` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_reply`, `user_id`) VALUES
(3, 'Password', '     password was not updating', 'ok we will solve it as soon as possible', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(5, 'Ernakulam'),
(6, 'Kannur'),
(9, 'Idukki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(60) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'kaloor', 5),
(2, 'adimali', 9),
(5, 'irutti', 6),
(6, 'kakkanad', 5),
(9, 'kallar', 9),
(11, 'Muvattupuzha', 0),
(12, 'Muvattupuzha', 5),
(13, 'kothamangalam', 5),
(14, '200Acer', 9),
(15, 'kallarkutty', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_status`) VALUES
(1, 'Rice', 0),
(2, 'Wheat', 0),
(3, 'Flour', 0),
(4, 'Kerosene', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ration`
--

CREATE TABLE `tbl_ration` (
  `ration_id` int(11) NOT NULL,
  `ration_date` varchar(60) NOT NULL,
  `card_id` int(11) NOT NULL,
  `ration_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ration`
--

INSERT INTO `tbl_ration` (`ration_id`, `ration_date`, `card_id`, `ration_amount`) VALUES
(9, '2024-10', 7, '80'),
(10, '2024-10', 4, '80'),
(11, '2024-10', 8, '100'),
(12, '2024-09', 9, '200'),
(14, '2024-11', 6, '100'),
(15, '2024-12', 4, '100');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rationlist`
--

CREATE TABLE `tbl_rationlist` (
  `rationlist_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` varchar(100) NOT NULL,
  `product_price` varchar(60) NOT NULL,
  `ration_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rationlist`
--

INSERT INTO `tbl_rationlist` (`rationlist_id`, `product_id`, `product_qty`, `product_price`, `ration_id`) VALUES
(15, 4, '5ltr', '70', 0),
(17, 1, '15kg', '100', 8),
(20, 1, '10kg', '50', 14),
(21, 2, '15kg', '150', 14),
(22, 3, '4pkt', '40', 14),
(23, 4, '5ltr', '50', 14),
(24, 1, '10kg', '200', 9),
(25, 2, '5kg', '160', 9),
(26, 3, '5pkt', '100', 9),
(27, 1, '10kg', '100', 11),
(28, 2, '5kg', '50', 11),
(29, 4, '1ltr', '50', 11),
(30, 3, '3pkt', '30', 11),
(31, 1, '5', '100', 12),
(32, 2, '4kg', '70', 12),
(33, 4, '500ml', '50', 12),
(34, 3, '2pkt', '40', 12),
(35, 1, '10kg', '100', 10),
(36, 2, '5kg', '100', 10),
(37, 4, '1ltr', '30', 10),
(38, 3, '5pkt', '50', 10),
(39, 2, '3kg', '50', 15),
(40, 4, '1lt', '20', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rationproduct`
--

CREATE TABLE `tbl_rationproduct` (
  `rationproduct_id` int(11) NOT NULL,
  `rationproduct_status` int(11) NOT NULL DEFAULT 1,
  `product_id` int(11) NOT NULL,
  `rationshop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rationproduct`
--

INSERT INTO `tbl_rationproduct` (`rationproduct_id`, `rationproduct_status`, `product_id`, `rationshop_id`) VALUES
(15, 1, 1, 6),
(16, 1, 2, 6),
(17, 2, 4, 6),
(18, 1, 3, 6),
(19, 1, 1, 4),
(20, 1, 2, 4),
(21, 1, 4, 4),
(22, 1, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rationshop`
--

CREATE TABLE `tbl_rationshop` (
  `rationshop_id` int(11) NOT NULL,
  `rationshop_name` varchar(70) NOT NULL,
  `rationshop_licensee` varchar(60) NOT NULL,
  `rationshop_email` varchar(90) NOT NULL,
  `rationshop_password` varchar(60) NOT NULL,
  `place_id` int(11) NOT NULL,
  `rationshop_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rationshop`
--

INSERT INTO `tbl_rationshop` (`rationshop_id`, `rationshop_name`, `rationshop_licensee`, `rationshop_email`, `rationshop_password`, `place_id`, `rationshop_number`) VALUES
(4, 'Ration Shop,Perumattom', 'Rajappan', 'raju21@gmail.com', 'Raju@2164', 12, 108),
(6, 'Ration Shop,OCB', 'Arun', 'arun@gmail.com', 'arun12', 12, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcate`
--

CREATE TABLE `tbl_subcate` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(40) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcate`
--

INSERT INTO `tbl_subcate` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(8, 'Kurua', 6),
(9, 'Matta', 0),
(10, 'Matta', 6),
(11, 'Jaya', 6),
(13, 'Row wheat', 7),
(14, 'Flour Packet', 7),
(15, 'Kerosene', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_cardnumber` varchar(60) NOT NULL,
  `card_id` int(11) NOT NULL,
  `user_question` varchar(300) NOT NULL,
  `user_answer` varchar(300) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_cardnumber`, `card_id`, `user_question`, `user_answer`, `user_password`, `user_status`) VALUES
(13, 'Abin Eldhose', 'abineldhose30@gmail.com', '54342167', 9, 'Enter a Car Name', 'fronx', 'Abin@2004', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_card`
--
ALTER TABLE `tbl_card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_ration`
--
ALTER TABLE `tbl_ration`
  ADD PRIMARY KEY (`ration_id`);

--
-- Indexes for table `tbl_rationlist`
--
ALTER TABLE `tbl_rationlist`
  ADD PRIMARY KEY (`rationlist_id`);

--
-- Indexes for table `tbl_rationproduct`
--
ALTER TABLE `tbl_rationproduct`
  ADD PRIMARY KEY (`rationproduct_id`);

--
-- Indexes for table `tbl_rationshop`
--
ALTER TABLE `tbl_rationshop`
  ADD PRIMARY KEY (`rationshop_id`);

--
-- Indexes for table `tbl_subcate`
--
ALTER TABLE `tbl_subcate`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_card`
--
ALTER TABLE `tbl_card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_ration`
--
ALTER TABLE `tbl_ration`
  MODIFY `ration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_rationlist`
--
ALTER TABLE `tbl_rationlist`
  MODIFY `rationlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_rationproduct`
--
ALTER TABLE `tbl_rationproduct`
  MODIFY `rationproduct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_rationshop`
--
ALTER TABLE `tbl_rationshop`
  MODIFY `rationshop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_subcate`
--
ALTER TABLE `tbl_subcate`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
