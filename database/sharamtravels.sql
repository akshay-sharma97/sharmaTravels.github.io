-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 10:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharamtravels`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabs`
--

CREATE TABLE `cabs` (
  `cab_id` int(11) NOT NULL,
  `cab_name` varchar(20) NOT NULL,
  `cab_image` text NOT NULL,
  `cab_feature` text NOT NULL,
  `cab_price_perkm` int(11) NOT NULL,
  `discount_rate` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cabs`
--

INSERT INTO `cabs` (`cab_id`, `cab_name`, `cab_image`, `cab_feature`, `cab_price_perkm`, `discount_rate`) VALUES
(1, 'Sedan', 'cabs/sedan.png', 'AC | 4 Seater | 3 Bags', 10, 0),
(2, 'Suv Sedan', 'cabs/suv_sedan.png', 'AC | 6 Seater | 4 Bags', 15, 5),
(3, 'Innova', 'cabs/innova.png', 'AC | 6 Seater | 6 Bags', 17, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cab_models`
--

CREATE TABLE `cab_models` (
  `cab_model_id` int(11) NOT NULL,
  `cab_id` int(11) NOT NULL,
  `model_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cab_models`
--

INSERT INTO `cab_models` (`cab_model_id`, `cab_id`, `model_name`) VALUES
(1, 1, 'Desire'),
(2, 1, 'Honda'),
(3, 1, 'Tata'),
(4, 1, 'Amaze'),
(5, 2, 'Ertiga'),
(6, 2, 'Mahindra'),
(7, 2, 'Tawera'),
(8, 3, 'Innvoa');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_us_id`, `name`, `email`, `subject`, `message`, `created_date`) VALUES
(3, 'ultron', 'ultron@gmail.com', 'subject', 'Test Text', '2022-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `password`, `mobile_no`, `created_date`) VALUES
(1, 'B. Sharma', 'sharmatest001122@gmail.com', 'test0001', '9988776644', '2022-12-17'),
(2, 'Ultron', 'ultron@gmail.com', 'ultron001', '9977884455', '2022-12-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabs`
--
ALTER TABLE `cabs`
  ADD PRIMARY KEY (`cab_id`);

--
-- Indexes for table `cab_models`
--
ALTER TABLE `cab_models`
  ADD PRIMARY KEY (`cab_model_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_us_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabs`
--
ALTER TABLE `cabs`
  MODIFY `cab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cab_models`
--
ALTER TABLE `cab_models`
  MODIFY `cab_model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
