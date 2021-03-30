-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2021 at 08:02 AM
-- Server version: 10.3.20-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w3db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `act_id` int(10) NOT NULL AUTO_INCREMENT,
  `act_name` varchar(50) NOT NULL,
  `act_desc` varchar(50) NOT NULL,
  `act_date` varchar(15) NOT NULL,
  `act_complete` tinyint(1) NOT NULL,
  `act_quo` int(5) NOT NULL,
  `con_id` int(10) NOT NULL,
  PRIMARY KEY (`act_id`),
  KEY `con_id` (`con_id`),
  KEY `act_quo` (`act_quo`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `act_name`, `act_desc`, `act_date`, `act_complete`, `act_quo`, `con_id`) VALUES
(1, 'primary wood provision', 'diwan model #101', '2021-03-25', 1, 3, 1),
(2, 'item strcture', 'diwan model #101', '2021-03-25', 1, 3, 1),
(3, 'wood lacquer + courting + finishing', 'diwan model #101', '2021-03-25', 1, 3, 1),
(4, 'wood polish', 'diwan model #101', '2021-03-25', 1, 3, 1),
(5, 'primary wood provision', 'single bed model bentota', '2021-03-25', 1, 4, 1),
(6, 'item strcture', 'single bed model bentota', '2021-03-25', 1, 4, 1),
(7, 'wood lacquer + courting + finishing', 'single bed model bentota', '2021-03-25', 1, 4, 1),
(8, 'wood polish', 'single bed model bentota', '2021-03-25', 1, 4, 1),
(9, 'primary wood provision', 'double bed model#1 bentota', '2021-03-25', 1, 5, 1),
(10, 'item strcture', 'double bed model#1 bentota', '2021-03-25', 1, 5, 1),
(11, 'wood lacquer + courting + finishing', 'double bed model#1 bentota', '2021-03-25', 1, 5, 1),
(12, 'wood polish', 'double bed model#1 bentota', '2021-03-25', 1, 5, 1),
(13, 'primary wood provision', 'frame size 100*100*50', '2021-03-25', 1, 6, 2),
(14, 'item strcture', 'frame size 100*100*50', '2021-03-25', 1, 6, 2),
(15, 'wood lacquer + courting + finishing', 'frame size 100*100*50', '2021-03-25', 1, 6, 2),
(16, 'wood polish', 'frame size 100*100*50', '2021-03-25', 0, 6, 2),
(17, 'primary wood provision', 'frame size 100*100*100', '2021-03-25', 1, 7, 2),
(18, 'item strcture', 'frame size 100*100*100', '2021-03-25', 1, 7, 2),
(19, 'wood lacquer + courting + finishing', 'frame size 100*100*100', '2021-03-25', 0, 7, 2),
(20, 'wood polish', 'frame size 100*100*100', '2021-03-25', 0, 7, 2),
(21, 'primary wood provision', 'KCC window #1', '2021-03-25', 1, 8, 3),
(22, 'item strcture', 'KCC window #1', '2021-03-25', 1, 8, 3),
(23, 'wood lacquer + courting + finishing', 'KCC window #1', '2021-03-25', 0, 8, 3),
(24, 'wood polish', 'KCC window #1', '2021-03-25', 0, 8, 3),
(25, 'primary wood provision', 'KCC window #2', '2021-03-25', 1, 9, 3),
(26, 'item strcture', 'KCC window #2', '2021-03-25', 1, 9, 3),
(27, 'wood lacquer + courting + finishing', 'KCC window #2', '2021-03-25', 0, 9, 3),
(28, 'wood polish', 'KCC window #2', '2021-03-25', 0, 9, 3),
(31, 'Check for quality test', 'Window and door model and interior', '2021-03-25', 1, 3, 1),
(32, 'primary wood provision', 'diwan model #101', '2021-03-25', 1, 10, 10),
(33, 'item strcture', 'diwan model #101', '2021-03-25', 1, 10, 10),
(34, 'wood lacquer + courting + finishing', 'diwan model #101', '2021-03-25', 1, 10, 10),
(35, 'wood polish', 'diwan model #101', '2021-03-25', 1, 10, 10),
(36, 'primary wood provision', 'window frame #3 KCC', '2021-03-25', 1, 11, 3),
(37, 'item strcture', 'window frame #3 KCC', '2021-03-25', 1, 11, 3),
(38, 'wood lacquer + courting + finishing', 'window frame #3 KCC', '2021-03-25', 0, 11, 3),
(39, 'wood polish', 'window frame #3 KCC', '2021-03-25', 0, 11, 3),
(40, 'primary wood provision', 'window frame #4 KCC', '2021-03-25', 1, 12, 3),
(41, 'item strcture', 'window frame #4 KCC', '2021-03-25', 1, 12, 3),
(42, 'wood lacquer + courting + finishing', 'window frame #4 KCC', '2021-03-25', 0, 12, 3),
(43, 'wood polish', 'window frame #4 KCC', '2021-03-25', 0, 12, 3),
(44, 'primary wood provision', 'black wood stair case model #1', '2021-03-25', 1, 13, 10),
(45, 'item strcture', 'black wood stair case model #1', '2021-03-25', 1, 13, 10),
(46, 'wood lacquer + courting + finishing', 'black wood stair case model #1', '2021-03-25', 0, 13, 10),
(47, 'wood polish', 'black wood stair case model #1', '2021-03-25', 0, 13, 10),
(48, 'primary wood provision', 'double diwan model #1', '2021-03-25', 1, 14, 10),
(49, 'item strcture', 'double diwan model #1', '2021-03-25', 1, 14, 10),
(50, 'wood lacquer + courting + finishing', 'double diwan model #1', '2021-03-25', 0, 14, 10),
(51, 'wood polish', 'double diwan model #1', '2021-03-25', 0, 14, 10),
(52, 'primary wood provision', 'stair case model #1', '2021-03-25', 1, 15, 1),
(53, 'item strcture', 'stair case model #1', '2021-03-25', 0, 15, 1),
(54, 'wood lacquer + courting + finishing', 'stair case model #1', '2021-03-25', 0, 15, 1),
(55, 'wood polish', 'stair case model #1', '2021-03-25', 0, 15, 1),
(56, 'Check for quality test', 'Window and door model and interior', '2021-03-27', 1, 3, 1),
(57, 'primary wood provision', 'double bed model#1 dharama', '2021-03-28', 1, 16, 19),
(58, 'item strcture', 'double bed model#1 dharama', '2021-03-28', 1, 16, 19),
(59, 'wood lacquer + courting + finishing', 'double bed model#1 dharama', '2021-03-28', 1, 16, 19),
(60, 'wood polish', 'double bed model#1 dharama', '2021-03-28', 1, 16, 19),
(61, 'primary wood provision', 'Peacock Chair Model #1 Dharama', '2021-03-28', 1, 17, 19),
(62, 'item strcture', 'Peacock Chair Model #1 Dharama', '2021-03-28', 1, 17, 19),
(63, 'wood lacquer + courting + finishing', 'Peacock Chair Model #1 Dharama', '2021-03-28', 1, 17, 19),
(64, 'wood polish', 'Peacock Chair Model #1 Dharama', '2021-03-28', 1, 17, 19),
(65, 'deliver + package', 'all items', '2021-03-28', 1, 16, 19),
(66, 'primary wood provision', 'Mahogani Main Door + Frame', '2021-03-28', 1, 18, 20),
(67, 'item strcture', 'Mahogani Main Door + Frame', '2021-03-28', 1, 18, 20),
(68, 'wood lacquer + courting + finishing', 'Mahogani Main Door + Frame', '2021-03-28', 1, 18, 20),
(69, 'wood polish', 'Mahogani Main Door + Frame', '2021-03-28', 0, 18, 20),
(70, 'primary wood provision', 'maharagaman wall pogola ', '2021-03-28', 1, 19, 20),
(71, 'item strcture', 'maharagaman wall pogola ', '2021-03-28', 1, 19, 20),
(72, 'wood lacquer + courting + finishing', 'maharagaman wall pogola ', '2021-03-28', 0, 19, 20),
(73, 'wood polish', 'maharagaman wall pogola ', '2021-03-28', 0, 19, 20),
(74, 'primary wood provision', 'Hand Drill Iron', '2021-03-28', 1, 20, 20),
(75, 'item strcture', 'Hand Drill Iron', '2021-03-28', 1, 20, 20),
(76, 'wood lacquer + courting + finishing', 'Hand Drill Iron', '2021-03-28', 1, 20, 20),
(77, 'wood polish', 'Hand Drill Iron', '2021-03-28', 0, 20, 20),
(78, 'Iron Buying', '', '2021-03-28', 1, 20, 20),
(79, 'primary wood provision', 'Front Door', '2021-03-28', 1, 21, 19),
(80, 'item strcture', 'Front Door', '2021-03-28', 1, 21, 19),
(81, 'wood lacquer + courting + finishing', 'Front Door', '2021-03-28', 1, 21, 19),
(82, 'wood polish', 'Front Door', '2021-03-28', 1, 21, 19),
(83, 'primary wood provision', 'window frame #3 RJ', '2021-03-28', 1, 22, 21),
(84, 'item strcture', 'window frame #3 RJ', '2021-03-28', 1, 22, 21),
(85, 'wood lacquer + courting + finishing', 'window frame #3 RJ', '2021-03-28', 1, 22, 21),
(86, 'wood polish', 'window frame #3 RJ', '2021-03-28', 1, 22, 21),
(87, 'Check for quality test', 'all items', '2021-03-29', 1, 18, 20),
(88, 'primary wood provision', 'window frame #3 KCC', '2021-03-29', 1, 23, 20),
(89, 'item strcture', 'window frame #3 KCC', '2021-03-29', 0, 23, 20),
(90, 'wood lacquer + courting + finishing', 'window frame #3 KCC', '2021-03-29', 0, 23, 20),
(91, 'wood polish', 'window frame #3 KCC', '2021-03-29', 0, 23, 20);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` varchar(50) NOT NULL,
  `cat_type` varchar(50) NOT NULL,
  `cat_flag` int(1) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_type`, `cat_flag`) VALUES
(1, 'Salary', 'Payment of Employee salary', 'Cash', 0),
(11, 'Meal', 'Food Expense', 'Primary', 1),
(12, 'Lunch', 'Lunch packet', 'Additional', 1),
(13, 'Transport', 'Site visiting', 'Additional', 1),
(14, 'delivery', 'transport delivery', 'Additional', 1),
(15, 'Wood Stock', 'Stocking of furniture', 'Compulsory', 1),
(16, 'Raw material', 'replenish of raw material batch', 'Compulsory', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(50) NOT NULL,
  `c_address` varchar(225) NOT NULL,
  `c_company` varchar(50) NOT NULL,
  `c_mobile` varchar(20) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

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
-- Table structure for table `contract`
--

DROP TABLE IF EXISTS `contract`;
CREATE TABLE IF NOT EXISTS `contract` (
  `con_id` int(10) NOT NULL AUTO_INCREMENT,
  `con_name` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `con_desc` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `con_progress` decimal(6,2) NOT NULL,
  `c_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  PRIMARY KEY (`con_id`),
  KEY `c_id` (`c_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`con_id`, `con_name`, `startdate`, `enddate`, `location`, `con_desc`, `status`, `payment_method`, `con_progress`, `c_id`, `u_id`) VALUES
(1, 'Bentota Beach', '2020-04-20', '2021-04-20', 'Bentota South Coastal ,Bentota', 'Hotel Renovation', 'Active', 'Pay As You Go', '83.33', 1, 1),
(2, 'Araliya Tangalle', '2019-08-29', '2020-08-29', 'Tangalle', 'Wood Floor', 'Active', 'Pay As You Go', '62.50', 1, 1),
(3, 'Kandy City Center', '2020-06-11', '2020-12-01', 'Kandy', 'Movie Complex', 'Active', 'Pay As You Go', '50.00', 1, 1),
(10, 'Project MatrixWood', '2018-10-27', '2020-10-27', 'Panadura', 'Wood Floor', 'Active', 'Fixed Point', '66.67', 7, 2),
(19, 'Dharamarathne Road', '2021-03-28', '2021-07-28', 'Moratuwa', 'Home Wood Management', 'Active', 'Pay as you go', '100.00', 19, 2),
(20, 'Maharagama Residence', '2021-01-13', '2021-03-27', 'Maharagama', 'Home Wood Management', 'Active', 'Pay as you go', '61.11', 20, 2),
(21, 'Raveen Home', '2021-03-28', '2021-06-28', 'Colombo', 'Home Wood Management', 'Active', 'Pay as you go', '100.00', 21, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contract_progress`
--

DROP TABLE IF EXISTS `contract_progress`;
CREATE TABLE IF NOT EXISTS `contract_progress` (
  `pro_id` int(10) NOT NULL AUTO_INCREMENT,
  `con_id` int(10) NOT NULL,
  `progress_date` varchar(20) NOT NULL,
  `progress_val` int(10) NOT NULL,
  `progress_income` int(10) NOT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `con_id` (`con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract_progress`
--

INSERT INTO `contract_progress` (`pro_id`, `con_id`, `progress_date`, `progress_val`, `progress_income`) VALUES
(1, 1, '2021-03-25', 8, 0),
(2, 1, '2021-03-25', 17, 0),
(3, 1, '2021-03-25', 25, 0),
(4, 2, '2021-03-25', 25, 0),
(5, 2, '2021-03-25', 25, 0),
(6, 3, '2021-03-25', 25, 0),
(7, 1, '2021-03-25', 31, 0),
(8, 10, '2021-03-25', 25, 0),
(9, 10, '2021-03-25', 50, 0),
(10, 10, '2021-03-25', 75, 0),
(11, 3, '2021-03-25', 13, 0),
(12, 3, '2021-03-25', 19, 0),
(13, 3, '2021-03-25', 25, 0),
(14, 10, '2021-03-25', 33, 0),
(15, 10, '2021-03-25', 42, 0),
(16, 2, '2021-03-25', 38, 0),
(17, 2, '2021-03-25', 50, 0),
(18, 3, '2021-03-25', 31, 0),
(19, 3, '2021-03-25', 38, 0),
(20, 3, '2021-03-25', 44, 0),
(21, 3, '2021-03-25', 50, 0),
(22, 1, '2021-03-25', 38, 0),
(23, 1, '2021-03-25', 46, 0),
(24, 1, '2021-03-25', 54, 0),
(25, 1, '2021-03-25', 62, 0),
(26, 1, '2021-03-25', 53, 0),
(27, 1, '2021-03-25', 53, 0),
(28, 1, '2021-03-27', 56, 0),
(29, 19, '2021-03-28', 13, 0),
(30, 19, '2021-03-28', 25, 0),
(31, 19, '2021-03-28', 38, 0),
(32, 19, '2021-03-28', 50, 0),
(33, 19, '2021-03-28', 56, 0),
(34, 19, '2021-03-28', 67, 0),
(35, 19, '2021-03-28', 78, 0),
(36, 19, '2021-03-28', 89, 0),
(37, 19, '2021-03-28', 100, 0),
(38, 20, '2021-03-28', 13, 0),
(39, 20, '2021-03-28', 25, 0),
(40, 20, '2021-03-28', 25, 0),
(41, 20, '2021-03-28', 31, 0),
(42, 1, '2021-03-28', 61, 0),
(43, 1, '2021-03-28', 67, 0),
(44, 1, '2021-03-28', 72, 0),
(45, 10, '2021-03-28', 50, 0),
(46, 19, '2021-03-28', 77, 0),
(47, 19, '2021-03-28', 85, 0),
(48, 19, '2021-03-28', 92, 0),
(49, 19, '2021-03-28', 100, 0),
(50, 21, '2021-03-28', 25, 0),
(51, 21, '2021-03-28', 50, 0),
(52, 21, '2021-03-28', 75, 0),
(53, 21, '2021-03-28', 100, 0),
(54, 21, '2021-03-28', 100, 0),
(55, 21, '2021-03-28', 100, 0),
(56, 21, '2021-03-28', 100, 0),
(57, 20, '2021-03-29', 54, 0),
(58, 2, '2021-03-29', 63, 0),
(59, 20, '2021-03-29', 64, 0),
(60, 20, '2021-03-29', 64, 0),
(61, 20, '2021-03-29', 64, 0),
(62, 20, '2021-03-29', 56, 0),
(63, 1, '2021-03-29', 83, 0),
(64, 1, '2021-03-29', 83, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(10) NOT NULL AUTO_INCREMENT,
  `nic` varchar(15) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `emp_address` varchar(50) NOT NULL,
  `contact_num` varchar(20) NOT NULL,
  `emp_type` varchar(20) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `nic`, `emp_name`, `dob`, `emp_address`, `contact_num`, `emp_type`) VALUES
(1, '781992345V', 'Dharmesh Kumar', '1980-09-11', 'Willorawatte', '+94728543217', 'permanent'),
(2, '661234567V', 'Sumith Mendis', '1966-08-05', 'horana gelanigama', '+94123456789', 'permanent'),
(3, '751234784V', 'Sunil Perera', '1978-04-29', 'koralawella east', '+94567897686', 'temporary'),
(7, '569001234V', 'Rohana Mallawaarchchi', '1980-07-20', 'rawatawatta dharamathne', '+94567897659', 'contract'),
(8, '981602838V', 'Piyal Samantha', '1996-12-24', 'Moratuwa', '+9412345678', 'temporary');

-- --------------------------------------------------------

--
-- Table structure for table `furniture_item`
--

DROP TABLE IF EXISTS `furniture_item`;
CREATE TABLE IF NOT EXISTS `furniture_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `item_category` varchar(50) NOT NULL,
  `unit_price` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture_item`
--

INSERT INTO `furniture_item` (`item_id`, `item_name`, `item_category`, `unit_price`) VALUES
(1, 'diwan_model#1', 'sofa', 22500),
(2, 'door_model#1', 'door', 25000),
(3, 'door_model#2', 'door', 30000),
(4, 'single_bed_model#1', 'single bed', 27000),
(5, 'double_bed_model#1', 'double bed', 45000),
(6, 'window#001', 'window', 21500),
(7, 'window#002', 'window', 32000),
(8, 'window#003', 'window', 36500),
(9, 'window#004', 'window', 41000),
(10, 'wood stair case model #1', 'stair case', 67500),
(11, 'diwan model #2', 'sofa', 41500),
(12, 'chair_model#1', 'chair', 11000),
(13, 'DD1_Mahogani', 'door', 55000),
(14, 'Pogola Partition', 'Partition', 375),
(15, 'Hand Drill I Type', 'Hand Drill', 1850);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
CREATE TABLE IF NOT EXISTS `income` (
  `inc_id` int(10) NOT NULL AUTO_INCREMENT,
  `inc_date` date DEFAULT NULL,
  `inc_desc` varchar(50) NOT NULL,
  `inc_amount` float DEFAULT NULL,
  `con_id` int(10) DEFAULT NULL,
  `inc_flag` int(1) DEFAULT NULL,
  PRIMARY KEY (`inc_id`),
  KEY `income_fk` (`con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`inc_id`, `inc_date`, `inc_desc`, `inc_amount`, `con_id`, `inc_flag`) VALUES
(5, '2021-03-28', 'Advance', 20000, 20, 1),
(6, '2021-03-30', 'Gift', 7000, 10, 1),
(7, '2020-12-12', 'Christmas Bonus', 12000, 2, 1),
(8, '2021-02-15', 'Advance', 30000, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invo_id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `total_before_tax` int(10) NOT NULL,
  `total_tax` int(11) NOT NULL,
  `tax_per` int(11) NOT NULL,
  `total_after_tax` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `note` varchar(50) NOT NULL,
  `con_id` int(11) NOT NULL,
  PRIMARY KEY (`invo_id`),
  KEY `con_id` (`con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invo_id`, `date`, `company_name`, `total_before_tax`, `total_tax`, `tax_per`, `total_after_tax`, `amount_paid`, `amount_due`, `note`, `con_id`) VALUES
(1, '2021-03-25', 'Bentota Beach', 94500, 945, 1, 95445, 50000, 45445, '', 1),
(2, '2021-03-25', 'Project MatrixWood', 154000, 3080, 2, 157080, 80000, 77080, '', 10),
(3, '2021-03-25', 'Bentota Beach', 162000, 3240, 2, 165240, 60000, 105240, 'no additional notes', 1),
(4, '2021-03-28', 'Araliya Tangalle', 55000, 547, 1, 55550, 49997, 5553, 'month sept', 2),
(5, '2021-03-28', 'Dharamarathne Road', 56000, 1120, 2, 57120, 20000, 37120, 'advance payment', 19),
(7, '2021-03-29', 'Maharagama Residence', 610000, 12200, 2, 622200, 100000, 622200, '', 20),
(8, '2021-03-30', 'Maharagama Residence', 385000, 19250, 5, 404250, 200000, 204250, 'march', 20);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

DROP TABLE IF EXISTS `invoice_item`;
CREATE TABLE IF NOT EXISTS `invoice_item` (
  `invo_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `invo_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_final_amount` int(11) NOT NULL,
  PRIMARY KEY (`invo_item_id`),
  KEY `invo_id` (`invo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_item`
--

INSERT INTO `invoice_item` (`invo_item_id`, `invo_id`, `item_id`, `item_name`, `item_quantity`, `item_price`, `item_final_amount`) VALUES
(1, 1, 1, 'diwan model #101', 1, 22500, 22500),
(2, 1, 2, 'single bed model bentota', 1, 27000, 27000),
(3, 1, 3, 'double bed model#1 bentota', 1, 45000, 45000),
(4, 2, 1, 'diwan model #101', 2, 22500, 45000),
(5, 2, 2, 'black wood stair case model #1', 1, 67500, 67500),
(6, 2, 3, 'double diwan model #1', 1, 41500, 41500),
(7, 3, 1, 'diwan model #101', 1, 22500, 22500),
(8, 3, 2, 'single bed model bentota', 1, 27000, 27000),
(9, 3, 3, 'double bed model#1 bentota', 1, 45000, 45000),
(10, 3, 4, 'stair case model #1', 1, 67500, 67500),
(11, 4, 1, 'frame size 100*100*50', 1, 25000, 25000),
(12, 4, 2, 'frame size 100*100*100', 1, 30000, 30000),
(13, 5, 1, 'double bed model#1 dharama', 1, 45000, 45000),
(14, 5, 2, 'Peacock Chair Model #1 Dharama', 1, 11000, 11000),
(16, 7, 1, 'Mahogani Main Door + Frame', 7, 55000, 385000),
(17, 7, 2, 'maharagaman wall pogola ', 600, 375, 225000),
(18, 8, 1, 'Mahogani Main Door + Frame', 7, 55000, 385000);

-- --------------------------------------------------------

--
-- Table structure for table `issue-machine`
--

DROP TABLE IF EXISTS `issue-machine`;
CREATE TABLE IF NOT EXISTS `issue-machine` (
  `issue-id` int(10) NOT NULL AUTO_INCREMENT,
  `machine-id` int(11) NOT NULL,
  `emp-id` int(10) NOT NULL,
  `issue-date` date NOT NULL,
  `received-date` date DEFAULT NULL,
  PRIMARY KEY (`issue-id`),
  KEY `machine-id` (`machine-id`),
  KEY `emp-id` (`emp-id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue-machine`
--

INSERT INTO `issue-machine` (`issue-id`, `machine-id`, `emp-id`, `issue-date`, `received-date`) VALUES
(2, 4, 2, '2021-03-29', '2021-03-29'),
(3, 2, 3, '2021-03-29', NULL),
(4, 3, 2, '2021-03-29', '2021-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `issue-raw-material`
--

DROP TABLE IF EXISTS `issue-raw-material`;
CREATE TABLE IF NOT EXISTS `issue-raw-material` (
  `issue-id` int(10) NOT NULL AUTO_INCREMENT,
  `inv-code` varchar(5) CHARACTER SET utf8mb4 NOT NULL,
  `quantity` int(20) NOT NULL,
  `employee` int(10) NOT NULL,
  `contract` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`issue-id`),
  KEY `inv-code` (`inv-code`),
  KEY `employee` (`employee`),
  KEY `contract` (`contract`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue-raw-material`
--

INSERT INTO `issue-raw-material` (`issue-id`, `inv-code`, `quantity`, `employee`, `contract`, `date`) VALUES
(1, 'RM006', 100, 7, 2, '2021-03-29'),
(2, 'RM007', 200, 7, 10, '2021-03-29'),
(3, 'RM007', 500, 2, 2, '2021-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `issue-tool`
--

DROP TABLE IF EXISTS `issue-tool`;
CREATE TABLE IF NOT EXISTS `issue-tool` (
  `issue-id` int(11) NOT NULL AUTO_INCREMENT,
  `tool-id` int(11) DEFAULT NULL,
  `issue-qty` int(20) NOT NULL,
  `emp-id` int(11) NOT NULL,
  `issue-date` date NOT NULL,
  `receive-qty` int(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`issue-id`),
  KEY `tool-id` (`tool-id`),
  KEY `emp-id` (`emp-id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue-tool`
--

INSERT INTO `issue-tool` (`issue-id`, `tool-id`, `issue-qty`, `emp-id`, `issue-date`, `receive-qty`) VALUES
(1, 1, 2, 3, '2021-03-29', 2),
(2, 6, 3, 7, '2021-03-29', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(25) NOT NULL,
  `u_id` int(10) NOT NULL,
  `r_id` int(10) NOT NULL,
  PRIMARY KEY (`user_name`),
  KEY `r_id` (`r_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `machine-detailed`
--

DROP TABLE IF EXISTS `machine-detailed`;
CREATE TABLE IF NOT EXISTS `machine-detailed` (
  `machine-id` int(11) NOT NULL AUTO_INCREMENT,
  `inv-code` varchar(5) CHARACTER SET utf8mb4 NOT NULL,
  `machine-desc` varchar(255) NOT NULL,
  `reg-id` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `supplier` int(11) NOT NULL,
  `delivered-by` varchar(100) NOT NULL,
  `machine-location` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added-date` date NOT NULL,
  PRIMARY KEY (`machine-id`),
  KEY `inv-code` (`inv-code`),
  KEY `supplier` (`supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machine-detailed`
--

INSERT INTO `machine-detailed` (`machine-id`, `inv-code`, `machine-desc`, `reg-id`, `price`, `supplier`, `delivered-by`, `machine-location`, `status`, `added-date`) VALUES
(1, 'TL003', 'Jigsaw', 'RX971625', '5400.00', 6, 'Self', 'Rack 23 - Machine Room', 1, '2021-03-29'),
(2, 'TL003', 'Circular Saw', 'CS229456', '5200.00', 7, 'Self', 'Rack 8 - Machine Room', 0, '2021-03-29'),
(3, 'TL003', 'Circular Saw', 'CS621185', '5240.00', 6, 'Self', 'Rack 25- Machine Room', 1, '2021-03-29'),
(4, 'TL002', 'Power Hammer', 'D12HM13T', '3800.00', 6, 'Self', 'Rack 13 - Machine Room', 2, '2021-03-29'),
(5, 'TL004', 'e-Trimmer', 'PP223117', '1200.00', 11, 'Self', 'Rack 10 - Machine Room', 1, '2021-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `maintenance-id` int(11) NOT NULL AUTO_INCREMENT,
  `tool` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `added-date` date NOT NULL,
  `pickup-date` date NOT NULL,
  `received-date` date DEFAULT NULL,
  `cost` int(20) DEFAULT NULL,
  `maintenance-by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`maintenance-id`),
  KEY `tool` (`tool`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenance-id`, `tool`, `reason`, `added-date`, `pickup-date`, `received-date`, `cost`, `maintenance-by`) VALUES
(1, 1, 'Blade Error', '2021-03-29', '2021-04-09', '2021-04-09', 1200, 'Nihal Electricals, Moratuwa'),
(2, 5, 'Does not work when power supplied', '2021-03-29', '2021-03-30', '2021-03-31', 1200, 'S3 Electricals, Panadura'),
(3, 4, 'Blade Error', '2021-03-29', '2021-04-06', NULL, NULL, 'Nihal Electricals, Moratuwa');

-- --------------------------------------------------------

--
-- Table structure for table `need`
--

DROP TABLE IF EXISTS `need`;
CREATE TABLE IF NOT EXISTS `need` (
  `emp_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `pay_date` date NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `p_id` (`p_id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `need`
--

INSERT INTO `need` (`emp_id`, `p_id`, `pay_date`) VALUES
(7, 20, '2021-03-28'),
(2, 21, '2021-03-28'),
(7, 22, '2021-02-05'),
(1, 33, '2021-03-30'),
(8, 34, '2021-03-31'),
(3, 35, '2021-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_desc` varchar(50) NOT NULL,
  `p_type` varchar(20) NOT NULL,
  `p_date` date NOT NULL,
  `p_amount` float NOT NULL,
  `p_status` text DEFAULT NULL,
  `con_id` int(10) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_flag` int(1) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `con_id` (`con_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `p_desc`, `p_type`, `p_date`, `p_amount`, `p_status`, `con_id`, `cat_id`, `p_flag`) VALUES
(19, 'food expense', 'Cash', '2021-03-28', 3000, 'Paid', 20, 11, 1),
(20, 'daily payment', 'Cash', '2021-03-28', 3000, 'Paid', 20, 1, 1),
(21, 'daily payment', 'Cash', '2021-03-28', 3000, 'Paid', 10, 1, 1),
(22, 'daily payment', 'Cash', '2021-02-05', 3000, 'Paid', 20, 1, 1),
(23, 'food expense', 'Cash', '2021-03-28', 3000, 'Paid', 21, 11, 1),
(24, 'lunch time', 'Cash', '2021-02-28', 1300, 'Paid', 2, 12, 1),
(25, 'transport of workers', 'Cash', '2021-03-28', 850, 'Paid', 2, 13, 1),
(26, 'woodstock expenses', 'Cash', '2021-02-28', 10500, 'Paid', 2, 15, 1),
(27, 'lunch time', 'Cash', '2021-03-26', 1250, 'Paid', 21, 12, 1),
(28, 'transport of workers', 'cash', '2021-03-26', 1000, 'Paid', 21, 13, 1),
(29, 'Raw material expenses', 'Cash', '2021-03-30', 4300, 'Paid', 20, 16, 1),
(30, 'site visiting', 'Cash', '2021-03-02', 2250, 'Paid', 3, 13, 1),
(31, 'woodstock expenses', 'Cash', '2021-03-30', 12000, 'Paid', 20, 15, 1),
(32, 'woodstock expenses', 'Cash', '2021-03-31', 12000, 'Paid', 10, 15, 1),
(33, 'daily payment', 'cash', '2021-03-30', 5000, 'Paid', 20, 1, 1),
(34, 'full day payment', 'Cash', '2021-03-31', 9400, 'Paid', 10, 1, 1),
(35, 'daily payment + ot', 'cash', '2021-03-29', 6000, 'Paid', 21, 1, 1),
(36, 'lunch time', 'Cash', '2021-03-29', 1250, 'Paid', 10, 12, 1),
(37, 'raw material', 'Cash', '2021-04-04', 35000, 'Pending', 19, 16, 1),
(38, 'woodstock expenses', 'Cash', '2021-04-12', 22000, 'Pending', 21, 15, 1),
(39, 'delivery expenses', 'cash', '2021-03-30', 3500, 'Paid', 10, 14, 1),
(40, 'woodstock expenses', 'Cash', '2021-04-10', 30000, 'Pending', 10, 15, 1),
(41, 'Raw material expenses', 'Cash', '2021-04-10', 21000, 'Pending', 21, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

DROP TABLE IF EXISTS `quotation`;
CREATE TABLE IF NOT EXISTS `quotation` (
  `q_id` int(10) NOT NULL AUTO_INCREMENT,
  `q_item` int(10) NOT NULL,
  `q_name` varchar(255) NOT NULL,
  `q_desc` varchar(255) NOT NULL,
  `q_budget` varchar(255) NOT NULL,
  `q_quantity` int(5) NOT NULL,
  `q_discount` int(5) NOT NULL,
  `q_con_id` int(10) NOT NULL,
  PRIMARY KEY (`q_id`),
  KEY `q_item` (`q_item`),
  KEY `q_con_id` (`q_con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`q_id`, `q_item`, `q_name`, `q_desc`, `q_budget`, `q_quantity`, `q_discount`, `q_con_id`) VALUES
(3, 1, 'diwan model #101', 'diwan_model#1', '22500', 1, 1, 1),
(4, 4, 'single bed model bentota', 'single_bed_model#1', '27000', 1, 1, 1),
(5, 5, 'double bed model#1 bentota', 'double_bed_model#1', '45000', 1, 1, 1),
(6, 2, 'frame size 100*100*50', 'door_model#1', '25000', 1, 2, 2),
(7, 3, 'frame size 100*100*100', 'door_model#2', '30000', 1, 2, 2),
(8, 6, 'KCC window #1', 'window#001', '18500', 1, 1, 3),
(9, 7, 'KCC window #2', 'window#002', '32000', 1, 2, 3),
(10, 1, 'diwan model #101', 'diwan_model#1', '22500', 1, 0, 10),
(11, 8, 'window frame #3 KCC', 'window#003', '36500', 1, 1, 3),
(12, 9, 'window frame #4 KCC', 'window#004', '41000', 1, 1, 3),
(13, 10, 'black wood stair case model #1', 'wood stair case model #1', '67500', 1, 2, 10),
(14, 11, 'double diwan model #1', 'diwan model #2', '41500', 1, 1, 10),
(15, 10, 'stair case model #1', 'wood stair case model #1', '67500', 1, 2, 1),
(16, 5, 'double bed model#1 dharama', 'double_bed_model#1', '45000', 2, 2, 19),
(17, 12, 'Peacock Chair Model #1 Dharama', 'chair_model#1', '11000', 6, 2, 19),
(18, 13, 'Mahogani Main Door + Frame', 'DD1_Mahogani', '55000', 7, 1, 20),
(19, 14, 'maharagaman wall pogola ', 'Pogola Partition', '375', 600, 0, 20),
(20, 15, 'Hand Drill Iron', 'Hand Drill I Type', '1850', 1, 0, 20),
(21, 13, 'Front Door', 'DD1_Mahogani', '55000', 1, 1, 19),
(22, 6, 'window frame #3 RJ', 'window#001', '21500', 1, 2, 21),
(23, 9, 'window frame #3 KCC', 'window#004', '41000', 1, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `raw-material-batch`
--

DROP TABLE IF EXISTS `raw-material-batch`;
CREATE TABLE IF NOT EXISTS `raw-material-batch` (
  `batch-id` int(11) NOT NULL AUTO_INCREMENT,
  `added-date` date NOT NULL,
  `end-date` date NOT NULL,
  `unit-price` int(11) NOT NULL,
  `batch-quantity` int(11) NOT NULL,
  `stored-location` varchar(255) NOT NULL,
  `inv-code` varchar(5) NOT NULL,
  `delivered-by` varchar(100) NOT NULL,
  `supplier` int(11) NOT NULL,
  PRIMARY KEY (`batch-id`),
  KEY `raw-material-batch_ibfk_1` (`inv-code`),
  KEY `supplier` (`supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raw-material-batch`
--

INSERT INTO `raw-material-batch` (`batch-id`, `added-date`, `end-date`, `unit-price`, `batch-quantity`, `stored-location`, `inv-code`, `delivered-by`, `supplier`) VALUES
(2, '2020-11-27', '2020-11-28', 12, 500, 'Nail Rack', 'RM003', 'Self', 6),
(3, '2020-11-29', '2020-11-19', 10, 10000, 'Nail Rack', 'RM003', 'Domex Couriers', 7),
(4, '2020-11-25', '2040-12-31', 12, 300, 'Nail rack', 'RM004', 'Self', 6),
(5, '2020-11-25', '2040-12-27', 32, 190, 'Nail Rack', 'RM005', 'Self', 6),
(6, '2020-11-25', '2022-10-26', 1200, 2440, 'Wood Store Room', 'RM006', 'Domex Couriers', 5),
(7, '2020-11-25', '2023-10-26', 3490, 1632, 'Wood Store Room', 'RM007', 'Domex Couriers', 5),
(8, '2020-11-25', '2026-10-13', 325, 290, 'Glue Rack', 'RM008', 'Self', 6),
(9, '2020-11-25', '2027-06-26', 200, 600, 'Glue Store', 'RM009', 'Domes Couriers', 7),
(10, '2020-11-25', '2024-09-25', 150, 2450, 'Glue Store', 'RM010', 'Domex Couriers', 7),
(11, '2020-11-25', '2025-06-17', 2300, 200, 'Paint Rack', 'RM011', 'Domex Couriers', 6),
(12, '2020-11-25', '2028-05-26', 2780, 1300, 'Paint rack', 'RM012', 'Self', 6),
(13, '2020-11-25', '2028-06-26', 4200, 2000, 'Wood Store Room', 'RM006', 'Domex Couriers', 9),
(14, '2020-11-25', '2031-06-26', 1300, 500, 'Wood Store Room', 'RM006', 'Self', 5),
(15, '2020-11-25', '2026-06-25', 350, 2300, 'Glue Rack', 'RM008', 'Self', 7),
(16, '2020-11-28', '2020-12-30', 123, 89, 'rag 123#', 'RM004', 'me', 6),
(17, '2020-11-28', '2020-11-12', 123, 89, 'rag 123#', 'RM007', 'me', 7),
(18, '2020-11-29', '2020-11-30', 12, 100, 'Nail Rack', 'RM004', 'Self', 6);

-- --------------------------------------------------------

--
-- Table structure for table `raw-material-category`
--

DROP TABLE IF EXISTS `raw-material-category`;
CREATE TABLE IF NOT EXISTS `raw-material-category` (
  `inv-code` varchar(5) NOT NULL,
  `inv-desc` varchar(255) NOT NULL,
  `min-qty` int(10) NOT NULL,
  `mat-name` varchar(100) NOT NULL,
  `abc-category` char(1) NOT NULL,
  PRIMARY KEY (`inv-code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raw-material-category`
--

INSERT INTO `raw-material-category` (`inv-code`, `inv-desc`, `min-qty`, `mat-name`, `abc-category`) VALUES
('RM003', 'Round headed and used for joining timber', 100, 'Common Nail', 'C'),
('RM004', 'Smaller heads and used for finishing', 200, 'Finishing Nails', 'C'),
('RM005', 'Provides better grip in the timber and a more secure attachment', 40, 'Ring Shank Nails', 'B'),
('RM006', 'Gives the sound of a warm tone', 2000, 'Mahogany Wood', 'B'),
('RM007', 'Color ranges from light brown to pink-red with a swirling or striped grain', 1000, 'Oak Wood', 'A'),
('RM008', 'Waterproof and makes a good filler', 500, 'Epoxy', 'B'),
('RM009', 'Great for gluing wedges to pieces and using them for clamping assistance', 100, 'Cyanoacrylate Glue', 'A'),
('RM010', 'Common type of wood glue. Usually called “carpenter’s glue”', 950, 'PVA Glue', 'C'),
('RM011', 'Easy to apply and it dries quickly in about 1½ to 2 hours', 650, 'Emulsion Paint', 'B'),
('RM012', 'Dries slowly and forms a hard and durable surface', 400, 'Enamel Paint', 'B');

--
-- Triggers `raw-material-category`
--
DROP TRIGGER IF EXISTS `tg_raw_material_category_insert`;
DELIMITER $$
CREATE TRIGGER `tg_raw_material_category_insert` BEFORE INSERT ON `raw-material-category` FOR EACH ROW BEGIN
  INSERT INTO `rm-seq` VALUES (NULL);
  SET NEW.`inv-code` = CONCAT('RM', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rm-seq`
--

DROP TABLE IF EXISTS `rm-seq`;
CREATE TABLE IF NOT EXISTS `rm-seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rm-seq`
--

INSERT INTO `rm-seq` (`id`) VALUES
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(50) NOT NULL,
  `r_desc` varchar(50) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`r_id`, `r_name`, `r_desc`) VALUES
(1, 'Admin', 'system administrator'),
(2, 'Owner', 'manage contracts'),
(3, 'Accountant', 'expense handling'),
(4, 'Stock Keeper', 'manage inventory'),
(5, 'Manager', 'manage contract,inventory,expense');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `sup-id` int(11) NOT NULL AUTO_INCREMENT,
  `sup-name` varchar(50) NOT NULL,
  `sup-email` varchar(50) NOT NULL,
  `sup-mobile` varchar(20) NOT NULL,
  `sup-address` varchar(100) NOT NULL,
  `category` tinyint(1) NOT NULL DEFAULT 0,
  `sup-status` tinyint(1) NOT NULL,
  `sup-created-on` datetime NOT NULL,
  PRIMARY KEY (`sup-id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup-id`, `sup-name`, `sup-email`, `sup-mobile`, `sup-address`, `category`, `sup-status`, `sup-created-on`) VALUES
(5, 'Weerasinghe Woods ', 'weerasinghewoods@example.com', '0724552364 ', 'No. 25, Moratuwa, Colombo', 1, 1, '2020-11-25 05:53:27'),
(6, 'Indika Hardware ', 'indikahardware@example.com', '0712631477 ', 'No. 26, Kandana, Colmbo', 0, 1, '2020-11-25 05:53:49'),
(7, 'Edirimuni Hardwares ', 'edirimuni@example.com', '0755641255 ', 'No. 27, Madampe, Colombo', 0, 1, '2020-11-25 05:58:07'),
(8, 'Nuwan Woods ', 'nuwanwoods@example.com', '0762312444 ', 'No. 28, Padukka, Colombo', 1, 0, '2020-11-26 02:53:18'),
(9, 'Good Wood Providers ', 'gwprovider@example.com', '0771414213 ', 'No. 29, Deniyaya, Matara', 1, 1, '2020-11-25 11:19:48'),
(10, 'Dissanayake Woods ', 'dissanayake@example.com', '0712324256 ', 'No. 30, Willorawatte, Moratuwa ', 1, 1, '2020-11-29 06:30:14'),
(11, 'Nuwan Hardwares', 'nuwanh@gmail.com', '0758965234', 'Nuwan hardware, School road, Nugegoda', 2, 1, '2021-03-29 12:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `tl-seq`
--

DROP TABLE IF EXISTS `tl-seq`;
CREATE TABLE IF NOT EXISTS `tl-seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tl-seq`
--

INSERT INTO `tl-seq` (`id`) VALUES
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `tool-category`
--

DROP TABLE IF EXISTS `tool-category`;
CREATE TABLE IF NOT EXISTS `tool-category` (
  `inv-code` varchar(5) NOT NULL,
  `inv-desc` varchar(255) NOT NULL,
  `min-qty` int(11) NOT NULL,
  `tool-name` varchar(100) NOT NULL,
  `abc-category` char(1) NOT NULL,
  PRIMARY KEY (`inv-code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tool-category`
--

INSERT INTO `tool-category` (`inv-code`, `inv-desc`, `min-qty`, `tool-name`, `abc-category`) VALUES
('TL002', 'Used to create sudden impact force to drive or remove nails, fits parts, forge metal and breaking up objects', 100, 'Hammer', 'C'),
('TL003', 'Used to cut pieces of wood into different shapes', 50, 'Saw', 'B'),
('TL004', 'Used for removing rough surfaces on wood and for reducing it to size', 35, 'Plane', 'A');

--
-- Triggers `tool-category`
--
DROP TRIGGER IF EXISTS `tg_tool_category_insert`;
DELIMITER $$
CREATE TRIGGER `tg_tool_category_insert` BEFORE INSERT ON `tool-category` FOR EACH ROW BEGIN
  INSERT INTO `tl-seq` VALUES (NULL);
  SET NEW.`inv-code` = CONCAT('TL', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tool-detailed`
--

DROP TABLE IF EXISTS `tool-detailed`;
CREATE TABLE IF NOT EXISTS `tool-detailed` (
  `tool-id` int(11) NOT NULL AUTO_INCREMENT,
  `delivered-by` varchar(100) NOT NULL,
  `supplier` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tool-qty` int(10) NOT NULL,
  `tool-location` varchar(255) NOT NULL,
  `inv-code` varchar(5) NOT NULL,
  PRIMARY KEY (`tool-id`),
  KEY `tool-detailed_ibfk_1` (`inv-code`),
  KEY `supplier` (`supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tool-detailed`
--

INSERT INTO `tool-detailed` (`tool-id`, `delivered-by`, `supplier`, `description`, `tool-qty`, `tool-location`, `inv-code`) VALUES
(1, 'Self', 6, 'Trim Hammer', 10, 'Hammer Rack - Room A', 'TL002'),
(2, 'Self', 7, 'Crack Hammer', 75, 'Hammer Rack - Room A', 'TL002'),
(3, 'Self', 6, 'Hand Saw', 40, 'Saw Rack - Room A', 'TL003'),
(4, 'Self', 6, 'Coping Saw', 40, 'Saw Rack - Room A', 'TL003'),
(5, 'Self', 11, 'Jointer Plane', 20, 'Plane Rack - Room A', 'TL004'),
(6, 'Pronto Currier Service', 7, 'Fore Planes', 100, 'Plane Rack - Room A', 'TL004'),
(7, 'Self', 7, 'Normal Hammer', 75, 'Hammer Rack - Room A', 'TL003');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `r_id` int(10) NOT NULL,
  `u_firstname` varchar(255) NOT NULL,
  `u_lastname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `last_login` bigint(20) NOT NULL,
  PRIMARY KEY (`u_id`),
  KEY `r_id` (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `r_id`, `u_firstname`, `u_lastname`, `u_email`, `u_password`, `last_login`) VALUES
(1, 1, 'Thiwanka', 'Sahan', 't.sahan998@gmail.com', '50208d0e48ddf8fc44e8a462d1ac424625d572bb', 1617031839),
(2, 2, 'Sahan', 'Dissanayaka', 'tsahandisaai@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1617031922),
(4, 4, 'udara', 'weerasinghe', 'udara@example.com', '8cb2237d0679ca88db6464eac60da96345513964', 0),
(5, 4, 'supun', 'akalanka', 'supun@example.com', '8cb2237d0679ca88db6464eac60da96345513964', 0),
(14, 3, 'Shanuka', 'Fernando', 'shanuka@example.com', '8cb2237d0679ca88db6464eac60da96345513964', 0),
(16, 5, 'Nipun', 'Fernando', 'lwnvfernando@gmail.com', '50208d0e48ddf8fc44e8a462d1ac424625d572bb', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `contract` (`con_id`),
  ADD CONSTRAINT `activity_ibfk_2` FOREIGN KEY (`act_quo`) REFERENCES `quotation` (`q_id`);

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `client` (`c_id`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `contract_progress`
--
ALTER TABLE `contract_progress`
  ADD CONSTRAINT `contract_progress_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `contract` (`con_id`);

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_fk` FOREIGN KEY (`con_id`) REFERENCES `contract` (`con_id`) ON UPDATE CASCADE;

--
-- Constraints for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD CONSTRAINT `invoice_item_ibfk_1` FOREIGN KEY (`invo_id`) REFERENCES `invoice` (`invo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issue-machine`
--
ALTER TABLE `issue-machine`
  ADD CONSTRAINT `issue-machine_ibfk_2` FOREIGN KEY (`emp-id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `issue-machine_ibfk_3` FOREIGN KEY (`machine-id`) REFERENCES `machine-detailed` (`machine-id`);

--
-- Constraints for table `issue-raw-material`
--
ALTER TABLE `issue-raw-material`
  ADD CONSTRAINT `issue-raw-material_ibfk_1` FOREIGN KEY (`inv-code`) REFERENCES `raw-material-category` (`inv-code`),
  ADD CONSTRAINT `issue-raw-material_ibfk_2` FOREIGN KEY (`employee`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `issue-raw-material_ibfk_3` FOREIGN KEY (`contract`) REFERENCES `contract` (`con_id`);

--
-- Constraints for table `issue-tool`
--
ALTER TABLE `issue-tool`
  ADD CONSTRAINT `issue-tool_ibfk_2` FOREIGN KEY (`tool-id`) REFERENCES `tool-detailed` (`tool-id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `issue-tool_ibfk_3` FOREIGN KEY (`emp-id`) REFERENCES `employee` (`emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `role` (`r_id`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `machine-detailed`
--
ALTER TABLE `machine-detailed`
  ADD CONSTRAINT `machine-detailed_ibfk_1` FOREIGN KEY (`inv-code`) REFERENCES `tool-category` (`inv-code`),
  ADD CONSTRAINT `machine-detailed_ibfk_2` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`sup-id`);

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`tool`) REFERENCES `machine-detailed` (`machine-id`) ON UPDATE CASCADE;

--
-- Constraints for table `need`
--
ALTER TABLE `need`
  ADD CONSTRAINT `need_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `contract` (`con_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON UPDATE CASCADE;

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `quotation_ibfk_1` FOREIGN KEY (`q_item`) REFERENCES `furniture_item` (`item_id`),
  ADD CONSTRAINT `quotation_ibfk_2` FOREIGN KEY (`q_con_id`) REFERENCES `contract` (`con_id`);

--
-- Constraints for table `raw-material-batch`
--
ALTER TABLE `raw-material-batch`
  ADD CONSTRAINT `raw-material-batch_ibfk_1` FOREIGN KEY (`inv-code`) REFERENCES `raw-material-category` (`inv-code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `raw-material-batch_ibfk_2` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`sup-id`) ON UPDATE CASCADE;

--
-- Constraints for table `tool-detailed`
--
ALTER TABLE `tool-detailed`
  ADD CONSTRAINT `tool-detailed_ibfk_1` FOREIGN KEY (`inv-code`) REFERENCES `tool-category` (`inv-code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tool-detailed_ibfk_2` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`sup-id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `role` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
