-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 05:12 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w3dbfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_address` varchar(225) NOT NULL,
  `c_company` varchar(50) NOT NULL,
  `c_mobile` varchar(20) NOT NULL,
  `c_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_id`, `c_name`, `c_address`, `c_company`, `c_mobile`, `c_email`) VALUES
(1, 'dumidu perera', 'Collombo 5, Colombo', 'Access Construction', '+94112786543', 'access@con.org'),
(4, 'sumedha gamage', '75/7 Chandrasekara Road,Horethuduwa', 'TechNed Pvt Ltd', '0775365565', 'sumedha@example.com'),
(7, 'rajindu cooray', 'no 10, Willorawatte', 'CircleCI Pvt Ltd', '+94775365565', 'rajindu@example.com'),
(9, 'hill top', 'no 11, Udunuwara, Kandy', 'Hill Top Hotel', '+945678901', 'hilltop@example.com'),
(10, 'Sahan Dissanayaka', '75/7 Chandrasekara Road,Horethuduwa', 'Student', '0775365565', 'tsahandisaai@gmail.com'),
(11, 'Sumedha Gamage', 'Chandrasekara Road', 'Personal ', '0775365565', 'tsahandisaai@gmail.com'),
(17, 'UCSC', 'Chandrasekara Road', 'Student', '+94775365565', 'tsahandisaai@gmail.com'),
(18, 'UCSC', 'Chandrasekara Road', 'Student', '+94775365565', 'tsahandisaai@gmail.com'),
(19, 'Malithya Fernando', 'No 20, Dharamathne Road, Rawathawatte', 'Home', '+94768661379', 'malithyafernando@gmail.com'),
(20, 'Dushan Fernando', 'Wattegedara Maharagama', 'Home', '+9423456789', 'lwnvfernando@gmail.com'),
(21, 'Raveen jayawardene', 'Malabe', 'Home', '+9774459170', 'raveensjayawardene@gmail.com'),
(22, 'Shanuka Fernando', 'Gampaha', 'Home', '+9412345678', 'shanuka2809@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(10) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `emp_address` varchar(50) NOT NULL,
  `contact_num` varchar(20) NOT NULL,
  `emp_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `nic`, `emp_name`, `dob`, `emp_address`, `contact_num`, `emp_type`) VALUES
(1, '781992345V', 'dharmesh', '1980-09-11', 'willorawatte', '+94728543217', 'permanent'),
(2, '661234567V', 'sumith mendis', '1966-08-05', 'horana gelanigama', '+94123456789', 'permanent'),
(3, '751234784V', 'sunil perera', '1978-04-29', 'koralawella east', '+94567897686', 'temporary'),
(7, '569001234V', 'Mallawaarchchi', '1980-07-20', 'rawatawatta dharamathne', '+94567897659', 'contract'),
(8, '981602838V', 'piyal', '1996-12-24', 'moratuwa', '+9412345678', 'temporary');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
