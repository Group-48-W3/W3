-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 01:34 PM
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
-- Database: `w3db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `a_id` int(10) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `a_desc` varchar(50) NOT NULL,
  `weight` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `con_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `cat_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_desc`, `cat_type`) VALUES
(3, 'Insurance', 'insurance payment', 'primary');

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
  `c_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`con_id`, `con_name`, `startdate`, `enddate`, `location`, `con_desc`, `status`, `payment_method`, `c_id`, `u_id`) VALUES
(1, 'Bentota Beach', '2020-04-20', '2021-04-20', 'Bentota South Coastal ,Bentota', 'Hotel Renovation', 'Active', 'Pay As You Go', 1, 1),
(2, 'Araliya Tangalle', '2019-08-29', '2020-08-29', 'Tangalle', 'Wood Floor', 'Active', 'Pay As You Go', 1, 1),
(3, 'Kandy City Center', '2020-06-11', '2020-12-01', 'Kandy', 'Movie Complex', 'Active', 'Pay As You Go', 1, 1),
(7, 'Project Euler', '2020-06-11', '2020-12-31', 'Moratuwa', 'Wood Floor', 'Inactive', 'Fixed Point', 4, 2),
(10, 'Project MatrixWood', '2018-10-27', '2020-10-27', 'Panadura', 'Wood Floor', 'Inactive', 'Fixed Point', 7, 2),
(12, 'Kandy HillTop', '2018-10-30', '2020-12-01', 'Kandy', 'veranda chairs', 'Active', 'Fixed Point', 9, 2),
(13, 'Demo', '2020-11-28', '2021-01-28', 'Colombo', 'Wood Floor', 'Active', 'Pay As You Go', 10, 2);

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
(7, '569001234V', 'Mallawaarchchi', '1980-07-20', 'rawatawatta dharamathne', '+94567897659', 'contract');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_num` int(10) NOT NULL,
  `date` date NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `con_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issue-id` int(11) NOT NULL,
  `mat-id` varchar(5) DEFAULT NULL,
  `tool-id` int(11) DEFAULT NULL,
  `issue-qty` int(20) NOT NULL,
  `emp-id` int(11) NOT NULL,
  `issue-date` date NOT NULL,
  `issue-time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_desc` varchar(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `q_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `maintenance-id` int(11) NOT NULL,
  `tool` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `added-date` date NOT NULL,
  `received-date` date DEFAULT NULL,
  `cost` int(20) DEFAULT NULL,
  `maintenance-by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `p_amount` varchar(10) NOT NULL,
  `con_id` int(10) NOT NULL,
  `cat_id` int(11) NOT NULL
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
  `q_budget` varchar(255) NOT NULL,
  `q_desc` varchar(255) NOT NULL,
  `q_img` varchar(255) NOT NULL,
  `q_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`q_id`, `q_budget`, `q_desc`, `q_img`, `q_name`) VALUES
(1, '25000', 'Luxury Chair Outdoor for 5 Star Hotels ', '', 'Chair #Q001'),
(2, '38000', 'Outside Table Model', '', 'Table #Q001');

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
(12);

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
(1, 'admin', 'system administrator'),
(2, 'owner', 'manage contracts'),
(3, 'accountant', 'expense handling'),
(4, 'stock keeper', 'manage inventory');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `s_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `s_note` varchar(50) NOT NULL,
  `s_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `sup-status` tinyint(1) NOT NULL,
  `sup-created-on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup-id`, `sup-name`, `sup-email`, `sup-mobile`, `sup-address`, `sup-status`, `sup-created-on`) VALUES
(5, 'Weerasinghe Woods', 'weerasinghewoods@example.com', '0724552364', 'No. 25, Maradana', 1, '2020-11-25 05:53:27'),
(6, 'Indika Hardware', 'indikahardware@example.com', '0712631477', 'No. 26, Kandana', 1, '2020-11-25 05:53:49'),
(7, 'Edirimuni Hardwares', 'edirimuni@example.com', '0755641255', 'No. 27, Madampe', 1, '2020-11-25 05:58:07'),
(8, 'Nuwan Woods', 'nuwanwoods@example.com', '0762312444', 'No. 28, Padukka', 0, '2020-11-26 02:53:18'),
(9, 'Good Wood Providers', 'gwprovider@example.com', '0771414213', 'No. 29, Deniyaya', 1, '2020-11-25 11:19:48'),
(10, 'Dissanayake Woods', 'dissanayake@example.com', '0712324256', 'No. 30, Moratuwa', 1, '2020-11-29 06:30:14');

-- --------------------------------------------------------

--
-- Table structure for table `tl-seq`
--

CREATE TABLE `tl-seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `tool-code` varchar(100) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `price` int(20) NOT NULL,
  `image` blob NOT NULL,
  `description` varchar(255) NOT NULL,
  `tool-qty` int(10) NOT NULL,
  `tool-location` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `inv-code` varchar(5) NOT NULL,
  `added-date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `con_id` (`con_id`);

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
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_num`),
  ADD KEY `con_id` (`con_id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issue-id`),
  ADD KEY `mat-id` (`mat-id`),
  ADD KEY `tool-id` (`tool-id`),
  ADD KEY `emp-id` (`emp-id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_name`),
  ADD KEY `r_id` (`r_id`),
  ADD KEY `u_id` (`u_id`);

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
  ADD PRIMARY KEY (`emp_id`,`p_id`),
  ADD KEY `p_id` (`p_id`);

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
  ADD PRIMARY KEY (`q_id`);

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
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`s_id`,`p_id`),
  ADD KEY `p_id` (`p_id`);

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
  ADD KEY `tool-detailed_ibfk_1` (`inv-code`);

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
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issue-id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `maintenance-id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `per_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `q_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `raw-material-batch`
--
ALTER TABLE `raw-material-batch`
  MODIFY `batch-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rm-seq`
--
ALTER TABLE `rm-seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tl-seq`
--
ALTER TABLE `tl-seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tool-detailed`
--
ALTER TABLE `tool-detailed`
  MODIFY `tool-id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `contract` (`con_id`);

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `assign_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `assign_ibfk_2` FOREIGN KEY (`a_id`) REFERENCES `activity` (`a_id`);

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `client` (`c_id`),
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `contract` (`con_id`);

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`mat-id`) REFERENCES `raw-material-category` (`inv-code`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`tool-id`) REFERENCES `tool-detailed` (`tool-id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_ibfk_3` FOREIGN KEY (`emp-id`) REFERENCES `employee` (`emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `quotation` (`q_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `role` (`r_id`),
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`tool`) REFERENCES `tool-detailed` (`tool-id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `need`
--
ALTER TABLE `need`
  ADD CONSTRAINT `need_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `need_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `payment` (`p_id`);

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
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `contract` (`con_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Constraints for table `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `permission_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `role` (`r_id`),
  ADD CONSTRAINT `permission_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `login` (`user_name`),
  ADD CONSTRAINT `permission_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `raw-material-batch`
--
ALTER TABLE `raw-material-batch`
  ADD CONSTRAINT `raw-material-batch_ibfk_1` FOREIGN KEY (`inv-code`) REFERENCES `raw-material-category` (`inv-code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `raw-material-batch_ibfk_2` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`sup-id`) ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `payment` (`p_id`);

--
-- Constraints for table `tool-detailed`
--
ALTER TABLE `tool-detailed`
  ADD CONSTRAINT `tool-detailed_ibfk_1` FOREIGN KEY (`inv-code`) REFERENCES `tool-category` (`inv-code`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `role` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
