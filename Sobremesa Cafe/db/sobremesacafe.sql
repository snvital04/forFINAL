-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 12:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sobremesacafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductPrice` decimal(10,2) NOT NULL,
  `Quantity` int(11) DEFAULT 1,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartId`, `UserId`, `ProductId`, `ProductName`, `ProductPrice`, `Quantity`, `CreatedAt`) VALUES
(9, 4, 2, 'Hot kape', 20.00, 5, '2024-11-26 22:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `lookup`
--

CREATE TABLE `lookup` (
  `LookUpId` int(11) NOT NULL,
  `LookUpName` varchar(50) DEFAULT NULL,
  `LookUpCategory` varchar(50) DEFAULT NULL,
  `CreatedByUserId` int(11) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lookup`
--

INSERT INTO `lookup` (`LookUpId`, `LookUpName`, `LookUpCategory`, `CreatedByUserId`, `CreatedAt`) VALUES
(1, 'male', 'gender', NULL, NULL),
(2, 'female', 'gender', NULL, NULL),
(3, 'Food', 'ProductCategory', NULL, NULL),
(4, 'Drinks', 'ProductCategory', NULL, NULL),
(5, 'Cake', 'ProductCategory', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL,
  `OrderStatus` varchar(50) DEFAULT 'pending',
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductDescription` text DEFAULT NULL,
  `ProductPrice` decimal(10,2) NOT NULL,
  `ProductImage` varchar(255) DEFAULT NULL,
  `ProductStock` int(11) DEFAULT 0,
  `ProductCategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductId`, `ProductName`, `ProductDescription`, `ProductPrice`, `ProductImage`, `ProductStock`, `ProductCategory`) VALUES
(1, 'Bacon', 'Bacon yummy', 20.00, NULL, 2, 3),
(2, 'Hot kape', 'masarap ito', 20.00, 'https://tse1.mm.bing.net/th?id=OIP.BSP4bZJ0kWXLzrBgU_L0IQHaE8&pid=Api&P=0&h=220', NULL, 4),
(6, 'Hot Cake', 'Matamis', 20.00, 'https://drivemehungry.com/wp-content/uploads/2022/09/strawberry-cake-5.jpg', 2, 5),
(7, 'Hot kape 2', 'Pogi', 50.00, 'https://tse1.mm.bing.net/th?id=OIP.BSP4bZJ0kWXLzrBgU_L0IQHaE8&pid=Api&P=0&h=220', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `useraccess`
--

CREATE TABLE `useraccess` (
  `UserAccessId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccess`
--

INSERT INTO `useraccess` (`UserAccessId`, `UserId`, `Username`, `Password`, `Active`, `DateCreated`) VALUES
(1, 3, '123', '$2y$10$J9o6m0lwTjGEr.NZdKO5BOLck.Ju7OuwFeKT93/fdDr', 1, '2024-11-27 03:39:05'),
(2, 4, 'sen', '$2y$10$FAQMiO7PYsc0p.7azc3Ev.jt8bjs1UNqEL6pPrApZku', 1, '2024-11-27 03:40:08'),
(3, 5, '1', '$2y$10$DJuXngeZ6UfvvZhmdnNGv.xLkDGP4NCQf4NDUQF51Ht', 1, '2024-11-27 03:42:28'),
(4, 6, '2', '$2y$10$9I71fRsDkQTSMk5ZxXYkyOVPM1ys94KCNfARHBJDSjQ', 1, '2024-11-27 03:45:27'),
(5, 7, '3', '$2y$10$RRqJKw7202Cz/g09Z9vUAu8s2ZU1iIxt27q4ro534Bw', 1, '2024-11-27 03:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `useraccesspage`
--

CREATE TABLE `useraccesspage` (
  `Name` varchar(50) DEFAULT NULL,
  `LookUpId` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `EmailAddress` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(50) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `DateVerified` datetime DEFAULT NULL,
  `VerifiedUser` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserId`, `FirstName`, `LastName`, `Birthdate`, `EmailAddress`, `PhoneNumber`, `Address`, `Gender`, `DateVerified`, `VerifiedUser`) VALUES
(3, 'sen', 'vital', '0023-12-31', 'sen@gmail.com', '09670695966', '', 1, NULL, 0),
(4, 'sen', 'vital', '0023-12-31', 'senvital04@gmail.com', '09670695966', '', 1, NULL, 0),
(5, 'sen', 'vital', '0011-11-11', '123@123', '123', '', 1, NULL, 0),
(6, '2', '2', '0002-02-22', '2@2', '2', '', 1, NULL, 0),
(7, '3', '3', '0033-03-31', '3@3', '3', '', 1, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartId`),
  ADD UNIQUE KEY `UniqueCartItem` (`UserId`,`ProductId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indexes for table `lookup`
--
ALTER TABLE `lookup`
  ADD PRIMARY KEY (`LookUpId`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailId`),
  ADD KEY `OrderId` (`OrderId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `fk_ProductCategory` (`ProductCategory`);

--
-- Indexes for table `useraccess`
--
ALTER TABLE `useraccess`
  ADD PRIMARY KEY (`UserAccessId`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `Gender` (`Gender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lookup`
--
ALTER TABLE `lookup`
  MODIFY `LookUpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetailId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `useraccess`
--
ALTER TABLE `useraccess`
  MODIFY `UserAccessId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `userinfo` (`UserId`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `products` (`ProductId`) ON DELETE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`OrderId`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `products` (`ProductId`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `userinfo` (`UserId`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_ProductCategory` FOREIGN KEY (`ProductCategory`) REFERENCES `lookup` (`LookUpId`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_1` FOREIGN KEY (`Gender`) REFERENCES `lookup` (`LookUpId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
