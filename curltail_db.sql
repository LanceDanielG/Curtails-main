-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 04:21 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curltail_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE DATABASE curltail_db;
USE curltail_db;


CREATE TABLE `admin_account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `categoryName`) VALUES
(5, 'Dry Dog Food'),
(6, 'Dry Cat Food'),
(7, 'Cat Food'),
(12, 'Cat'),
(13, 'Pogi');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_ImagePath` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` varchar(255) NOT NULL,
  `productStocks` bigint(255) DEFAULT NULL,
  `productSales` bigint(255) DEFAULT NULL,
  `productDescription` varchar(255) NOT NULL,
  `prodCategory` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_ImagePath`, `productName`, `productPrice`, `productStocks`, `productSales`, `productDescription`, `prodCategory`) VALUES
(2, '/IS_Elective/Resources/src/img/uploads/PEDIGREE_Dog_Food_Dry_Adult_Beef_and_Vegetable_Flavour_1.5_Kg_1_480x480.webp', 'Supot si Ethan Totoo', '290', 5, 0, 'TESTTEST', 'Dry Dog Food'),
(4, '/IS_Elective/Resources/src/img/uploads/abformal.jpg', 'Dax', '1', 0, 0, 'Mabait, Matulungin, Matalino, Pogi at Makadiyos ~', 'Pogi');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `ID` int(11) NOT NULL,
  `transactionDate` varchar(255) NOT NULL,
  `productID` varchar(255) NOT NULL,
  `productQuantity` varchar(255) NOT NULL,
  `productPrice` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`ID`, `transactionDate`, `productID`, `productQuantity`, `productPrice`, `productName`, `customer`) VALUES
(1, '04-12-2022', '2 ', '2', '290', 'Pedigree Adult Beef and Vegetables  1.5kg', ''),
(2, '10-12-2022', '4 ', '1', '1', 'Dax', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `age` varchar(5) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `street1` varchar(400) NOT NULL,
  `street2` varchar(400) NOT NULL,
  `baranggay` varchar(400) NOT NULL,
  `zipcode` varchar(400) NOT NULL,
  `city` varchar(200) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `firstname`, `middlename`, `lastname`, `age`, `birthdate`, `gender`, `street1`, `street2`, `baranggay`, `zipcode`, `city`, `phonenumber`, `email`, `username`, `password`) VALUES
(31, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test'),
(32, 'Lance Daniel', 'Gipit', 'Gallos', '21', '2001-06-04', 'Male', 'Lot 581 Neighborhood Association Bagumbong Caloocan City', 'N/A', 'Barangay 171', '1421', 'Caloocan City', '927-348-3171', 'lancedanielgallos4@gmail.com', 'Zildjian', 'Password#4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
