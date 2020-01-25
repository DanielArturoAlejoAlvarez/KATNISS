-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2020 at 12:04 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cisale_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CATE_Code` int(11) NOT NULL,
  `CATE_Name` varchar(100) NOT NULL,
  `CATE_Desc` text NOT NULL,
  `CATE_Flag` tinyint(1) NOT NULL,
  `CATE_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `CLIE_Code` int(11) NOT NULL,
  `CLIE_Fullname` varchar(100) NOT NULL,
  `CLIE_Phone` varchar(128) NOT NULL,
  `CLIE_Address` varchar(256) NOT NULL,
  `CLIE_Ruc` varchar(100) NOT NULL,
  `CLIE_Company` varchar(128) NOT NULL,
  `CLIE_Flag` tinyint(1) NOT NULL,
  `CLIE_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_sales`
--

CREATE TABLE `detail_sales` (
  `DETA_Code` int(11) NOT NULL,
  `PROD_Code` int(11) NOT NULL,
  `SALE_Code` int(11) NOT NULL,
  `PROD_Price` float NOT NULL,
  `DETA_Qty` int(11) NOT NULL,
  `DETA_Subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doc_types`
--

CREATE TABLE `doc_types` (
  `DOC_Code` int(11) NOT NULL,
  `DOC_Name` varchar(100) NOT NULL,
  `DOC_Qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `PROD_Code` int(11) NOT NULL,
  `CATE_Code` int(11) NOT NULL,
  `PROD_Name` varchar(100) NOT NULL,
  `PROD_Excerpt` varchar(256) NOT NULL,
  `PROD_Desc` text NOT NULL,
  `PROD_Price` float NOT NULL,
  `PROD_Stock` int(11) NOT NULL,
  `PROD_Picture` varchar(512) NOT NULL,
  `PROD_Flag` tinyint(1) NOT NULL,
  `PROD_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ROLE_Code` int(11) NOT NULL,
  `ROLE_Name` varchar(100) NOT NULL,
  `ROLE_Desc` varchar(256) NOT NULL,
  `ROLE_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SALE_Code` int(11) NOT NULL,
  `CLIE_Code` int(11) NOT NULL,
  `DOC_Code` int(11) NOT NULL,
  `USER_Code` int(11) NOT NULL,
  `SALE_Date` datetime NOT NULL,
  `SALE_Total` float NOT NULL,
  `IGV` float NOT NULL,
  `SALE_Serial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_Code` int(11) NOT NULL,
  `ROLE_Code` int(11) NOT NULL,
  `USER_Fullname` varchar(100) NOT NULL,
  `USER_Email` varchar(128) NOT NULL,
  `USER_Username` varchar(100) NOT NULL,
  `USER_Password` varchar(256) NOT NULL,
  `USER_Avatar` varchar(512) NOT NULL,
  `USER_Flag` tinyint(1) NOT NULL,
  `USER_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CATE_Code`),
  ADD UNIQUE KEY `CATE_Name` (`CATE_Name`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`CLIE_Code`),
  ADD UNIQUE KEY `CLIE_Ruc` (`CLIE_Ruc`,`CLIE_Company`);

--
-- Indexes for table `detail_sales`
--
ALTER TABLE `detail_sales`
  ADD PRIMARY KEY (`DETA_Code`),
  ADD KEY `PROD_Code` (`PROD_Code`,`SALE_Code`),
  ADD KEY `fk_sale_detail_sale` (`SALE_Code`);

--
-- Indexes for table `doc_types`
--
ALTER TABLE `doc_types`
  ADD PRIMARY KEY (`DOC_Code`),
  ADD UNIQUE KEY `DOC_Name` (`DOC_Name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PROD_Code`),
  ADD UNIQUE KEY `PROD_Name` (`PROD_Name`),
  ADD KEY `CATE_Code` (`CATE_Code`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ROLE_Code`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SALE_Code`),
  ADD UNIQUE KEY `SERIAL` (`SALE_Serial`),
  ADD KEY `CLIE_Code` (`CLIE_Code`,`DOC_Code`,`USER_Code`),
  ADD KEY `fk_doc_type_sale` (`DOC_Code`),
  ADD KEY `fk_user_sale` (`USER_Code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_Code`),
  ADD UNIQUE KEY `USER_Email` (`USER_Email`,`USER_Username`),
  ADD KEY `ROLE_Code` (`ROLE_Code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CATE_Code` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `CLIE_Code` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_sales`
--
ALTER TABLE `detail_sales`
  MODIFY `DETA_Code` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doc_types`
--
ALTER TABLE `doc_types`
  MODIFY `DOC_Code` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `PROD_Code` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ROLE_Code` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SALE_Code` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_Code` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_sales`
--
ALTER TABLE `detail_sales`
  ADD CONSTRAINT `fk_product_detail_sale` FOREIGN KEY (`PROD_Code`) REFERENCES `products` (`PROD_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sale_detail_sale` FOREIGN KEY (`SALE_Code`) REFERENCES `sales` (`SALE_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category_product` FOREIGN KEY (`CATE_Code`) REFERENCES `categories` (`CATE_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_client_sale` FOREIGN KEY (`CLIE_Code`) REFERENCES `clients` (`CLIE_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_doc_type_sale` FOREIGN KEY (`DOC_Code`) REFERENCES `doc_types` (`DOC_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_sale` FOREIGN KEY (`USER_Code`) REFERENCES `users` (`USER_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role_user` FOREIGN KEY (`ROLE_Code`) REFERENCES `roles` (`ROLE_Code`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
