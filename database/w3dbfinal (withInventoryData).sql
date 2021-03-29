-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 01:25 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `act_id` int(10) NOT NULL,
  `act_name` varchar(50) NOT NULL,
  `act_desc` varchar(50) NOT NULL,
  `act_date` varchar(15) NOT NULL,
  `act_complete` tinyint(1) NOT NULL,
  `act_quo` int(5) NOT NULL,
  `con_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `act_name`, `act_desc`, `act_date`, `act_complete`, `act_quo`, `con_id`) VALUES
(1, 'primary wood provision', 'diwan model #101', '2021-03-25', 1, 3, 1),
(2, 'item strcture', 'diwan model #101', '2021-03-25', 1, 3, 1),
(3, 'wood paint + lacker', 'diwan model #101', '2021-03-25', 0, 3, 1),
(4, 'wood polish', 'diwan model #101', '2021-03-25', 0, 3, 1),
(5, 'primary wood provision', 'single bed model bentota', '2021-03-25', 1, 4, 1),
(6, 'item strcture', 'single bed model bentota', '2021-03-25', 1, 4, 1),
(7, 'wood paint + lacker', 'single bed model bentota', '2021-03-25', 1, 4, 1),
(8, 'wood polish', 'single bed model bentota', '2021-03-25', 0, 4, 1),
(9, 'primary wood provision', 'double bed model#1 bentota', '2021-03-25', 1, 5, 1),
(10, 'item strcture', 'double bed model#1 bentota', '2021-03-25', 1, 5, 1),
(11, 'wood paint + lacker', 'double bed model#1 bentota', '2021-03-25', 0, 5, 1),
(12, 'wood polish', 'double bed model#1 bentota', '2021-03-25', 0, 5, 1),
(13, 'primary wood provision', 'frame size 100*100*50', '2021-03-25', 1, 6, 2),
(14, 'item strcture', 'frame size 100*100*50', '2021-03-25', 1, 6, 2),
(15, 'wood paint + lacker', 'frame size 100*100*50', '2021-03-25', 0, 6, 2),
(16, 'wood polish', 'frame size 100*100*50', '2021-03-25', 0, 6, 2),
(17, 'primary wood provision', 'frame size 100*100*100', '2021-03-25', 1, 7, 2),
(18, 'item strcture', 'frame size 100*100*100', '2021-03-25', 1, 7, 2),
(19, 'wood paint + lacker', 'frame size 100*100*100', '2021-03-25', 0, 7, 2),
(20, 'wood polish', 'frame size 100*100*100', '2021-03-25', 0, 7, 2),
(21, 'primary wood provision', 'KCC window #1', '2021-03-25', 1, 8, 3),
(22, 'item strcture', 'KCC window #1', '2021-03-25', 1, 8, 3),
(23, 'wood paint + lacker', 'KCC window #1', '2021-03-25', 0, 8, 3),
(24, 'wood polish', 'KCC window #1', '2021-03-25', 0, 8, 3),
(25, 'primary wood provision', 'KCC window #2', '2021-03-25', 1, 9, 3),
(26, 'item strcture', 'KCC window #2', '2021-03-25', 1, 9, 3),
(27, 'wood paint + lacker', 'KCC window #2', '2021-03-25', 0, 9, 3),
(28, 'wood polish', 'KCC window #2', '2021-03-25', 0, 9, 3),
(31, 'Check for quality test', 'Window and door model and interior', '2021-03-25', 1, 3, 1),
(32, 'primary wood provision', 'diwan model #101', '2021-03-25', 1, 10, 10),
(33, 'item strcture', 'diwan model #101', '2021-03-25', 1, 10, 10),
(34, 'wood paint + lacker', 'diwan model #101', '2021-03-25', 1, 10, 10),
(35, 'wood polish', 'diwan model #101', '2021-03-25', 0, 10, 10),
(36, 'primary wood provision', 'window frame #3 KCC', '2021-03-25', 1, 11, 3),
(37, 'item strcture', 'window frame #3 KCC', '2021-03-25', 1, 11, 3),
(38, 'wood paint + lacker', 'window frame #3 KCC', '2021-03-25', 0, 11, 3),
(39, 'wood polish', 'window frame #3 KCC', '2021-03-25', 0, 11, 3),
(40, 'primary wood provision', 'window frame #4 KCC', '2021-03-25', 1, 12, 3),
(41, 'item strcture', 'window frame #4 KCC', '2021-03-25', 1, 12, 3),
(42, 'wood paint + lacker', 'window frame #4 KCC', '2021-03-25', 0, 12, 3),
(43, 'wood polish', 'window frame #4 KCC', '2021-03-25', 0, 12, 3),
(44, 'primary wood provision', 'black wood stair case model #1', '2021-03-25', 1, 13, 10),
(45, 'item strcture', 'black wood stair case model #1', '2021-03-25', 0, 13, 10),
(46, 'wood paint + lacker', 'black wood stair case model #1', '2021-03-25', 0, 13, 10),
(47, 'wood polish', 'black wood stair case model #1', '2021-03-25', 0, 13, 10),
(48, 'primary wood provision', 'double diwan model #1', '2021-03-25', 1, 14, 10),
(49, 'item strcture', 'double diwan model #1', '2021-03-25', 0, 14, 10),
(50, 'wood paint + lacker', 'double diwan model #1', '2021-03-25', 0, 14, 10),
(51, 'wood polish', 'double diwan model #1', '2021-03-25', 0, 14, 10);

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `emp_id` int(10) NOT NULL,
  `a_id` int(10) NOT NULL,
  `man_hour` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_desc` varchar(50) NOT NULL,
  `cat_type` varchar(50) NOT NULL,
  `cat_flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_type`, `cat_flag`) VALUES
(1, 'Salary', 'Payment of Employee salary', 'Cash', 0);

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
(10, 'Sahan Dissanayaka', '75/7 Chandrasekara Road,Horethuduwa', 'Student', '0775365565', 'tsahandisaai@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `con_id` int(10) NOT NULL,
  `con_name` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `con_desc` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `con_progress` decimal(6,2) NOT NULL,
  `c_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`con_id`, `con_name`, `startdate`, `enddate`, `location`, `con_desc`, `status`, `payment_method`, `con_progress`, `c_id`, `u_id`) VALUES
(1, 'Bentota Beach', '2020-04-20', '2021-04-20', 'Bentota South Coastal ,Bentota', 'Hotel Renovation', 'Active', 'Pay As You Go', '61.54', 1, 1),
(2, 'Araliya Tangalle', '2019-08-29', '2020-08-29', 'Tangalle', 'Wood Floor', 'Active', 'Pay As You Go', '50.00', 1, 1),
(3, 'Kandy City Center', '2020-06-11', '2020-12-01', 'Kandy', 'Movie Complex', 'Active', 'Pay As You Go', '50.00', 1, 1),
(10, 'Project MatrixWood', '2018-10-27', '2020-10-27', 'Panadura', 'Wood Floor', 'Active', 'Fixed Point', '41.67', 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contract_progress`
--

CREATE TABLE `contract_progress` (
  `pro_id` int(10) NOT NULL,
  `con_id` int(10) NOT NULL,
  `progress_date` varchar(20) NOT NULL,
  `progress_val` int(10) NOT NULL,
  `progress_income` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(25, 1, '2021-03-25', 62, 0);

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
(1, '781992345V', 'Dharmesh Kumar', '1980-09-11', 'willorawatte', '+94728543217', 'permanent'),
(2, '661234567V', 'Sumith Mendis', '1966-08-05', 'horana gelanigama', '+94123456789', 'permanent'),
(3, '751234784V', 'Sunil Perera', '1978-04-29', 'koralawella east', '+94567897686', 'temporary'),
(7, '569001234V', 'Rohana Mallawaarchchi', '1980-07-20', 'rawatawatta dharamathne', '+94567897659', 'contract');

-- --------------------------------------------------------

--
-- Table structure for table `furniture_item`
--

CREATE TABLE `furniture_item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_category` varchar(50) NOT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture_item`
--

INSERT INTO `furniture_item` (`item_id`, `item_name`, `item_category`, `unit_price`) VALUES
(1, 'diwan_model#1', 'sofa', 22500),
(2, 'door_model#1', 'door', 25000),
(3, 'door_model#2', 'door', 30000),
(4, 'single_bed_model#1', 'single bed', 27000),
(5, 'double_bed_model#1', 'double bed', 45000),
(6, 'window#001', 'window', 18500),
(7, 'window#002', 'window', 32000),
(8, 'window#003', 'window', 36500),
(9, 'window#004', 'window', 41000),
(10, 'wood stair case model #1', 'stair case', 67500),
(11, 'diwan model #2', 'sofa', 41500);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `inc_id` int(10) NOT NULL,
  `inc_date` date DEFAULT NULL,
  `inc_desc` varchar(50) NOT NULL,
  `inc_amount` float DEFAULT NULL,
  `con_id` int(10) DEFAULT NULL,
  `inc_flag` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invo_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `total_before_tax` int(10) NOT NULL,
  `total_tax` int(11) NOT NULL,
  `tax_per` int(11) NOT NULL,
  `total_after_tax` int(11) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `note` varchar(50) NOT NULL,
  `con_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invo_id`, `date`, `company_name`, `total_before_tax`, `total_tax`, `tax_per`, `total_after_tax`, `amount_paid`, `amount_due`, `note`, `con_id`) VALUES
(1, '2021-03-25', 'Bentota Beach', 94500, 945, 1, 95445, 50000, 45445, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

CREATE TABLE `invoice_item` (
  `invo_item_id` int(11) NOT NULL,
  `invo_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_final_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_item`
--

INSERT INTO `invoice_item` (`invo_item_id`, `invo_id`, `item_id`, `item_name`, `item_quantity`, `item_price`, `item_final_amount`) VALUES
(1, 1, 1, 'diwan model #101', 1, 22500, 22500),
(2, 1, 2, 'single bed model bentota', 1, 27000, 27000),
(3, 1, 3, 'double bed model#1 bentota', 1, 45000, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `issue-machine`
--

CREATE TABLE `issue-machine` (
  `issue-id` int(10) NOT NULL,
  `machine-id` int(11) NOT NULL,
  `emp-id` int(10) NOT NULL,
  `issue-date` date NOT NULL,
  `received-date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue-machine`
--

INSERT INTO `issue-machine` (`issue-id`, `machine-id`, `emp-id`, `issue-date`, `received-date`) VALUES
(2, 4, 2, '2021-03-29', '2021-03-29'),
(3, 2, 3, '2021-03-29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `issue-raw-material`
--

CREATE TABLE `issue-raw-material` (
  `issue-id` int(10) NOT NULL,
  `inv-code` varchar(5) CHARACTER SET utf8mb4 NOT NULL,
  `quantity` int(20) NOT NULL,
  `employee` int(10) NOT NULL,
  `contract` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue-raw-material`
--

INSERT INTO `issue-raw-material` (`issue-id`, `inv-code`, `quantity`, `employee`, `contract`, `date`) VALUES
(1, 'RM006', 100, 7, 2, '2021-03-29'),
(2, 'RM007', 200, 7, 10, '2021-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `issue-tool`
--

CREATE TABLE `issue-tool` (
  `issue-id` int(11) NOT NULL,
  `tool-id` int(11) DEFAULT NULL,
  `issue-qty` int(20) NOT NULL,
  `emp-id` int(11) NOT NULL,
  `issue-date` date NOT NULL,
  `receive-qty` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue-tool`
--

INSERT INTO `issue-tool` (`issue-id`, `tool-id`, `issue-qty`, `emp-id`, `issue-date`, `receive-qty`) VALUES
(1, 1, 2, 3, '2021-03-29', 2),
(2, 6, 3, 7, '2021-03-29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(25) NOT NULL,
  `u_id` int(10) NOT NULL,
  `r_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `machine-detailed`
--

CREATE TABLE `machine-detailed` (
  `machine-id` int(11) NOT NULL,
  `inv-code` varchar(5) CHARACTER SET utf8mb4 NOT NULL,
  `machine-desc` varchar(255) NOT NULL,
  `reg-id` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `supplier` int(11) NOT NULL,
  `delivered-by` varchar(100) NOT NULL,
  `machine-location` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added-date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machine-detailed`
--

INSERT INTO `machine-detailed` (`machine-id`, `inv-code`, `machine-desc`, `reg-id`, `price`, `supplier`, `delivered-by`, `machine-location`, `status`, `added-date`) VALUES
(1, 'TL003', 'Jigsaw', 'RX971625', '5400.00', 6, 'Self', 'Rack 23 - Machine Room', 2, '2021-03-29'),
(2, 'TL003', 'Circular Saw', 'CS229456', '5200.00', 7, 'Self', 'Rack 8 - Machine Room', 0, '2021-03-29'),
(3, 'TL003', 'Circular Saw', 'CS621185', '5240.00', 6, 'Self', 'Rack 25- Machine Room', 1, '2021-03-29'),
(4, 'TL002', 'Power Hammer', 'D12HM13T', '3800.00', 6, 'Self', 'Rack 13 - Machine Room', 1, '2021-03-29'),
(5, 'TL004', 'e-Trimmer', 'PP223117', '1200.00', 11, 'Self', 'Rack 10 - Machine Room', 1, '2021-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `maintenance-id` int(11) NOT NULL,
  `tool` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `added-date` date NOT NULL,
  `pickup-date` date NOT NULL,
  `received-date` date DEFAULT NULL,
  `cost` int(20) DEFAULT NULL,
  `maintenance-by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`maintenance-id`, `tool`, `reason`, `added-date`, `pickup-date`, `received-date`, `cost`, `maintenance-by`) VALUES
(1, 1, 'Blade Error', '2021-03-29', '2021-04-09', NULL, NULL, 'Nihal Electricals, Moratuwa'),
(2, 5, 'Does not work when power supplied', '2021-03-29', '2021-03-30', '2021-03-31', 1200, 'S3 Electricals, Panadura');

-- --------------------------------------------------------

--
-- Table structure for table `need`
--

CREATE TABLE `need` (
  `emp_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `pay_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `need_to_add`
--

CREATE TABLE `need_to_add` (
  `con_id` int(10) NOT NULL,
  `q_id` int(10) NOT NULL,
  `quantity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(10) NOT NULL,
  `p_desc` varchar(50) NOT NULL,
  `p_type` varchar(20) NOT NULL,
  `p_date` date NOT NULL,
  `p_amount` float NOT NULL,
  `p_status` text DEFAULT NULL,
  `con_id` int(10) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `per_id` int(10) NOT NULL,
  `per_name` varchar(50) NOT NULL,
  `per_desc` varchar(50) NOT NULL,
  `per_module` varchar(50) NOT NULL,
  `u_id` int(10) NOT NULL,
  `r_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `q_id` int(10) NOT NULL,
  `q_item` int(10) NOT NULL,
  `q_name` varchar(255) NOT NULL,
  `q_desc` varchar(255) NOT NULL,
  `q_budget` varchar(255) NOT NULL,
  `q_quantity` int(5) NOT NULL,
  `q_discount` int(5) NOT NULL,
  `q_con_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(14, 11, 'double diwan model #1', 'diwan model #2', '41500', 1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `raw-material-batch`
--

CREATE TABLE `raw-material-batch` (
  `batch-id` int(11) NOT NULL,
  `added-date` date NOT NULL,
  `end-date` date NOT NULL,
  `unit-price` int(11) NOT NULL,
  `batch-quantity` int(11) NOT NULL,
  `stored-location` varchar(255) NOT NULL,
  `inv-code` varchar(5) NOT NULL,
  `delivered-by` varchar(100) NOT NULL,
  `supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `raw-material-batch`
--

INSERT INTO `raw-material-batch` (`batch-id`, `added-date`, `end-date`, `unit-price`, `batch-quantity`, `stored-location`, `inv-code`, `delivered-by`, `supplier`) VALUES
(2, '2020-11-27', '2020-11-28', 12, 500, 'Nail Rack', 'RM003', 'Self', 6),
(3, '2020-11-29', '2020-11-19', 10, 10000, 'Nail Rack', 'RM003', 'Domex Couriers', 7),
(4, '2020-11-25', '2040-12-31', 12, 300, 'Nail rack', 'RM004', 'Self', 6),
(5, '2020-11-25', '2040-12-27', 32, 190, 'Nail Rack', 'RM005', 'Self', 6),
(6, '2020-11-25', '2022-10-26', 1200, 2340, 'Wood Store Room', 'RM006', 'Domex Couriers', 5),
(7, '2020-11-25', '2023-10-26', 3490, 1432, 'Wood Store Room', 'RM007', 'Domex Couriers', 5),
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

CREATE TABLE `raw-material-category` (
  `inv-code` varchar(5) NOT NULL,
  `inv-desc` varchar(255) NOT NULL,
  `min-qty` int(10) NOT NULL,
  `mat-name` varchar(100) NOT NULL,
  `abc-category` char(1) NOT NULL
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

CREATE TABLE `rm-seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(12),
(13);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `r_id` int(10) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `r_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`r_id`, `r_name`, `r_desc`) VALUES
(1, 'Admin', 'system administrator'),
(2, 'Owner', 'manage contracts'),
(3, 'Accountant', 'expense handling'),
(4, 'Stock Keeper', 'manage inventory');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup-id` int(11) NOT NULL,
  `sup-name` varchar(50) NOT NULL,
  `sup-email` varchar(50) NOT NULL,
  `sup-mobile` varchar(20) NOT NULL,
  `sup-address` varchar(100) NOT NULL,
  `category` tinyint(1) NOT NULL DEFAULT 0,
  `sup-status` tinyint(1) NOT NULL,
  `sup-created-on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup-id`, `sup-name`, `sup-email`, `sup-mobile`, `sup-address`, `category`, `sup-status`, `sup-created-on`) VALUES
(5, 'Weerasinghe Woods', 'weerasinghewoods@example.com', '0724552364', 'No. 16, Mid Road, Moratuwa, Colombo', 1, 1, '2020-11-25 05:53:27'),
(6, 'Indika Hardware', 'indikahardware@example.com', '0712631477', 'No. 26, Madampitiya, Colombo 15', 0, 1, '2020-11-25 05:53:49'),
(7, 'Edirimuni Hardwares', 'edirimuni@example.com', '0755641255', 'Edirimuni Hardwares, Moratuwa, Colombo', 0, 1, '2020-11-25 05:58:07'),
(8, 'Lalith Woods', 'lalithwoods@example.com', '0762312444', 'No. 28, Willorawatta, Moratuwa, Colombo', 1, 0, '2020-11-26 02:53:18'),
(9, 'Good Wood Providers', 'gwprovider@example.com', '0771414213', 'No. 29, Deniyaya, Matara', 1, 1, '2020-11-25 11:19:48'),
(10, 'Dissanayake Woods', 'dissanayake@example.com', '0712324256', 'No. 30, Moratuwa, Colombo', 1, 1, '2020-11-29 06:30:14'),
(11, 'Nuwan Hardwares', 'nuwanh@gmail.com', '0758965234', 'Nuwan hardware, School road, Nugegoda', 2, 1, '2021-03-29 12:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `tl-seq`
--

CREATE TABLE `tl-seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `tool-category` (
  `inv-code` varchar(5) NOT NULL,
  `inv-desc` varchar(255) NOT NULL,
  `min-qty` int(11) NOT NULL,
  `tool-name` varchar(100) NOT NULL,
  `abc-category` char(1) NOT NULL
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

CREATE TABLE `tool-detailed` (
  `tool-id` int(11) NOT NULL,
  `delivered-by` varchar(100) NOT NULL,
  `supplier` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tool-qty` int(10) NOT NULL,
  `tool-location` varchar(255) NOT NULL,
  `inv-code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tool-detailed`
--

INSERT INTO `tool-detailed` (`tool-id`, `delivered-by`, `supplier`, `description`, `tool-qty`, `tool-location`, `inv-code`) VALUES
(1, 'Self', 6, 'Trim Hammer', 10, 'Hammer Rack - Room A', 'TL002'),
(2, 'Self', 7, 'Crack Hammer', 75, 'Hammer Rack - Room A', 'TL002'),
(3, 'Self', 6, 'Hand Saw', 40, 'Saw Rack - Room A', 'TL003'),
(4, 'Self', 6, 'Coping Saw', 40, 'Saw Rack - Room A', 'TL003'),
(5, 'Self', 11, 'Jointer Plane', 20, 'Plane Rack - Room A', 'TL004'),
(6, 'Pronto Currier Service', 7, 'Fore Planes', 100, 'Plane Rack - Room A', 'TL004');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL,
  `r_id` int(10) NOT NULL,
  `u_firstname` varchar(255) NOT NULL,
  `u_lastname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `r_id`, `u_firstname`, `u_lastname`, `u_email`, `u_password`) VALUES
(1, 1, 'john', 'doe', 'john_doe@example.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(2, 2, 'Sahan', 'Dissanayaka', 'sahan@example.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(4, 4, 'udara', 'weerasinghe', 'udara@example.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(5, 4, 'supun', 'akalanka', 'supun@example.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(14, 3, 'Shanuka', 'Fernando', 'shanuka@example.com', '8cb2237d0679ca88db6464eac60da96345513964');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_id`),
  ADD KEY `con_id` (`con_id`),
  ADD KEY `act_quo` (`act_quo`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`emp_id`,`a_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`con_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `contract_progress`
--
ALTER TABLE `contract_progress`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `furniture_item`
--
ALTER TABLE `furniture_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`inc_id`),
  ADD KEY `income_fk` (`con_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invo_id`),
  ADD KEY `con_id` (`con_id`);

--
-- Indexes for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD PRIMARY KEY (`invo_item_id`),
  ADD KEY `invo_id` (`invo_id`);

--
-- Indexes for table `issue-machine`
--
ALTER TABLE `issue-machine`
  ADD PRIMARY KEY (`issue-id`),
  ADD KEY `machine-id` (`machine-id`),
  ADD KEY `emp-id` (`emp-id`);

--
-- Indexes for table `issue-raw-material`
--
ALTER TABLE `issue-raw-material`
  ADD PRIMARY KEY (`issue-id`),
  ADD KEY `inv-code` (`inv-code`),
  ADD KEY `employee` (`employee`),
  ADD KEY `contract` (`contract`);

--
-- Indexes for table `issue-tool`
--
ALTER TABLE `issue-tool`
  ADD PRIMARY KEY (`issue-id`),
  ADD KEY `tool-id` (`tool-id`),
  ADD KEY `emp-id` (`emp-id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_name`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `machine-detailed`
--
ALTER TABLE `machine-detailed`
  ADD PRIMARY KEY (`machine-id`),
  ADD KEY `inv-code` (`inv-code`),
  ADD KEY `supplier` (`supplier`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`maintenance-id`),
  ADD KEY `tool` (`tool`);

--
-- Indexes for table `need`
--
ALTER TABLE `need`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `need_to_add`
--
ALTER TABLE `need_to_add`
  ADD PRIMARY KEY (`con_id`,`q_id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `con_id` (`con_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`per_id`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `q_item` (`q_item`),
  ADD KEY `q_con_id` (`q_con_id`);

--
-- Indexes for table `raw-material-batch`
--
ALTER TABLE `raw-material-batch`
  ADD PRIMARY KEY (`batch-id`),
  ADD KEY `raw-material-batch_ibfk_1` (`inv-code`),
  ADD KEY `supplier` (`supplier`);

--
-- Indexes for table `raw-material-category`
--
ALTER TABLE `raw-material-category`
  ADD PRIMARY KEY (`inv-code`);

--
-- Indexes for table `rm-seq`
--
ALTER TABLE `rm-seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup-id`);

--
-- Indexes for table `tl-seq`
--
ALTER TABLE `tl-seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tool-category`
--
ALTER TABLE `tool-category`
  ADD PRIMARY KEY (`inv-code`);

--
-- Indexes for table `tool-detailed`
--
ALTER TABLE `tool-detailed`
  ADD PRIMARY KEY (`tool-id`),
  ADD KEY `tool-detailed_ibfk_1` (`inv-code`),
  ADD KEY `supplier` (`supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `r_id` (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `act_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `con_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contract_progress`
--
ALTER TABLE `contract_progress`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `furniture_item`
--
ALTER TABLE `furniture_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `inc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_item`
--
ALTER TABLE `invoice_item`
  MODIFY `invo_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `issue-machine`
--
ALTER TABLE `issue-machine`
  MODIFY `issue-id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `issue-raw-material`
--
ALTER TABLE `issue-raw-material`
  MODIFY `issue-id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `issue-tool`
--
ALTER TABLE `issue-tool`
  MODIFY `issue-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `machine-detailed`
--
ALTER TABLE `machine-detailed`
  MODIFY `machine-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `maintenance-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `per_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `q_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `raw-material-batch`
--
ALTER TABLE `raw-material-batch`
  MODIFY `batch-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rm-seq`
--
ALTER TABLE `rm-seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tl-seq`
--
ALTER TABLE `tl-seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tool-detailed`
--
ALTER TABLE `tool-detailed`
  MODIFY `tool-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `assign_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `assign_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `activity` (`act_id`);

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `client` (`c_id`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `income_fk` FOREIGN KEY (`con_id`) REFERENCES `contract` (`con_id`) ON UPDATE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `contract` (`con_id`);

--
-- Constraints for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD CONSTRAINT `invoice_item_ibfk_1` FOREIGN KEY (`invo_id`) REFERENCES `invoice` (`invo_id`);

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
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`tool`) REFERENCES `machine-detailed` (`machine-id`);

--
-- Constraints for table `need`
--
ALTER TABLE `need`
  ADD CONSTRAINT `need_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `need_to_add`
--
ALTER TABLE `need_to_add`
  ADD CONSTRAINT `need_to_add_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `contract` (`con_id`),
  ADD CONSTRAINT `need_to_add_ibfk_2` FOREIGN KEY (`q_id`) REFERENCES `quotation` (`q_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `contract` (`con_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON UPDATE CASCADE;

--
-- Constraints for table `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `permission_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `role` (`r_id`),
  ADD CONSTRAINT `permission_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `login` (`user_name`),
  ADD CONSTRAINT `permission_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

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
