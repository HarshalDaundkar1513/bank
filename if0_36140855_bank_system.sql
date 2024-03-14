-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql112.byetcluster.com
-- Generation Time: Mar 11, 2024 at 09:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_36140855_bank_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_name` varchar(50) NOT NULL,
  `sender_email` varchar(100) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_email` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sender_name`, `sender_email`, `receiver_name`, `receiver_email`, `amount`, `timestamp`) VALUES
(1, 'Rahul Sharma', 'rahul@example.com', 'Priya Singh', 'priya@example.com', '5000.50', '2024-03-11 13:00:06'),
(2, 'Amit Verma', 'amit@example.com', 'Sneha Kapoor', 'sneha@example.com', '12000.75', '2024-03-11 13:00:06'),
(3, 'Neha Patel', 'neha@example.com', 'Raj Kapoor', 'raj@example.com', '800.00', '2024-03-11 13:00:06'),
(4, 'Suresh Mehta', 'suresh@example.com', 'Anita Gupta', 'anita@example.com', '3000.25', '2024-03-11 13:00:06'),
(5, 'Preeti Singh', 'preeti@example.com', 'Vikas Verma', 'vikas@example.com', '15000.00', '2024-03-11 13:00:06'),
(6, 'Rajat Gupta', 'rajat@example.com', 'Neha Sharma', 'neha@example.com', '6000.50', '2024-03-11 13:00:06'),
(7, 'Arun Mehta', 'arun@example.com', 'Shweta Verma', 'shweta@example.com', '2000.75', '2024-03-11 13:00:06'),
(8, 'Kiran Kapoor', 'kiran@example.com', 'Rahul Gupta', 'rahul@example.com', '4500.00', '2024-03-11 13:00:06'),
(9, 'Anjali Verma', 'anjali@example.com', 'Amit Kumar', 'amit@example.com', '750.25', '2024-03-11 13:00:06'),
(10, 'Sandeep Sharma', 'sandeep@example.com', 'Pooja Kapoor', 'pooja@example.com', '10000.50', '2024-03-11 13:00:06'),
(11, 'Ritu Gupta', 'ritu@example.com', 'Vivek Singh', 'vivek@example.com', '300.75', '2024-03-11 13:00:06'),
(12, 'Nitin Kapoor', 'nitin@example.com', 'Anu Mehta', 'anu@example.com', '1200.00', '2024-03-11 13:00:06'),
(13, 'Ayesha Singh', 'ayesha@example.com', 'Rajesh Sharma', 'rajesh@example.com', '9000.25', '2024-03-11 13:00:06'),
(14, 'Ravi Verma', 'ravi@example.com', 'Simran Gupta', 'simran@example.com', '600.50', '2024-03-11 13:00:06'),
(15, 'Kunal Mehta', 'kunal@example.com', 'Shreya Singh', 'shreya@example.com', '18000.75', '2024-03-11 13:00:06'),
(16, 'Mukesh Kapoor', 'mukesh@example.com', 'Naina Sharma', 'naina@example.com', '2500.00', '2024-03-11 13:00:06'),
(17, 'Pankaj Verma', 'pankaj@example.com', 'Aarti Mehta', 'aarti@example.com', '7000.25', '2024-03-11 13:00:06'),
(18, 'Smita Singh', 'smita@example.com', 'Rahul Verma', 'rahul@example.com', '3500.50', '2024-03-11 13:00:06'),
(19, 'Deepak Mehta', 'deepak@example.com', 'Neeta Kapoor', 'neeta@example.com', '11000.75', '2024-03-11 13:00:06'),
(20, 'Vikrant Gupta', 'vikrant@example.com', 'Sonia Singh', 'sonia@example.com', '4000.00', '2024-03-11 13:00:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
