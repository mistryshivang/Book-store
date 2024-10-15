-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Generation Time: Oct 15, 2024 at 09:41 AM
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
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookdata`
--

CREATE TABLE `bookdata` (
  `bid` int(5) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `aname` varchar(60) NOT NULL,
  `price` int(5) NOT NULL,
  `image` varchar(100) NOT NULL,
  `qty` int(5) NOT NULL,
  `regid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookdata`
--

INSERT INTO `bookdata` (`bid`, `bname`, `aname`, `price`, `image`, `qty`, `regid`) VALUES
(1, 'ramayan', 'valmiki', 599, 'ramayan.jpeg', 29, 1),
(2, 'Mahabharat', 'vedvyas', 799, 'mahabharat.jpeg', 100, 1),
(3, 'rugved', 'abcde', 499, 'rugved.jpeg', 79, 1);

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cardid` int(5) NOT NULL,
  `cardnum` varchar(16) DEFAULT NULL,
  `cardhol` varchar(30) DEFAULT NULL,
  `exmo` varchar(5) DEFAULT NULL,
  `exye` varchar(5) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `regid` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`cardid`, `cardnum`, `cardhol`, `exmo`, `exye`, `cvv`, `regid`) VALUES
(1, '1234567891234567', 'rajumodi', '09', '2029', '4545', 4),
(2, '9876543210321654', 'rAJU MODI', '09', '2040', '1234', 4),
(3, '1239876547891235', 'Raju n modi', '08', '2038', '5464', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(5) NOT NULL,
  `bid` int(5) NOT NULL,
  `qty` int(10) NOT NULL,
  `regid` int(5) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `paydate` date DEFAULT NULL,
  `orderid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `bid`, `qty`, `regid`, `status`, `paydate`, `orderid`) VALUES
(13, 1, 5, 4, 'success', '2024-10-14', 'ORDER_670d0ce33bcf7'),
(14, 1, 1, 4, 'success', '2024-10-14', 'ORDER_670d0e4f068a1'),
(15, 3, 1, 4, 'success', '2024-10-14', 'ORDER_670d0e4f068a1'),
(16, 1, 2, 4, 'success', '2024-10-15', 'ORDER_670dfa3bc7a4f'),
(17, 3, 2, 4, 'success', '2024-10-15', 'ORDER_670dfa3bc7a4f');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payid` int(5) NOT NULL,
  `regid` int(5) NOT NULL,
  `cardid` int(5) NOT NULL,
  `total` int(10) DEFAULT NULL,
  `paydate` date DEFAULT NULL,
  `orderid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payid`, `regid`, `cardid`, `total`, `paydate`, `orderid`) VALUES
(7, 4, 2, 2995, '2024-10-14', 'ORDER_670d0ce33bcf7'),
(8, 4, 1, 1098, '2024-10-14', 'ORDER_670d0e4f068a1'),
(9, 4, 3, 2196, '2024-10-15', 'ORDER_670dfa3bc7a4f');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` int(12) NOT NULL,
  `query` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `email`, `mob`, `query`) VALUES
(1, 'mistryshivang3003@gmail.com', 2147483647, 'its work properly.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `regid` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `utype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`regid`, `name`, `email`, `password`, `address`, `utype`) VALUES
(1, 'shivang', 'mistryshivang3003@gmail.com', 'Shivang123@', 'surat', 'seller'),
(2, 'Admin', 'admin@gmail.com', 'Admin123@', 'Admin office', 'Admin'),
(4, 'rajumodi', 'raju@gmail.com', 'Rajumodi123@', 'Porbander', 'client'),
(5, 'shiv', 'Shiv@gmail.com', 'Shiv123@', 'Navsari', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookdata`
--
ALTER TABLE `bookdata`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cardid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`regid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookdata`
--
ALTER TABLE `bookdata`
  MODIFY `bid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `cardid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `regid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
