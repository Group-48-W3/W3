-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 01:50 PM
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
(9, 'hill top', 'no 11, Udunuwara, Kandy', 'Hill Top Hotel', '+945678901', 'hilltop@example.com');

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
(12, 'Kandy HillTop', '2018-10-30', '2020-12-01', 'Kandy', 'veranda chairs', 'Active', 'Fixed Point', 9, 2);

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
  `iss_id` int(11) NOT NULL,
  `iss_date` date NOT NULL,
  `iss_qty` int(11) NOT NULL,
  `iss_desc` varchar(50) NOT NULL,
  `iss_time` time NOT NULL,
  `inv_code` int(11) NOT NULL,
  `inv_code_tool` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `m_id` int(10) NOT NULL,
  `tool_id` int(50) NOT NULL,
  `inv_code` int(50) NOT NULL,
  `cost` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '25000', 'Luxury Chair Outdoor for 5 Star Hotels ', '', 'Weesa Chair'),
(2, '38000', 'Outside Table Model', '', 'Weesa Table');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `inv_code` int(10) NOT NULL,
  `inv_desc` varchar(50) NOT NULL,
  `min_qty` varchar(10) NOT NULL,
  `mat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`inv_code`, `inv_desc`, `min_qty`, `mat_name`) VALUES
(1, 'All types of gum', '12', 'Gum'),
(2, 'All Hammers', '12', 'Hammer'),
(3, 'All types of Pencil', '50', 'Pencil'),
(4, 'All types of strings', '500', 'String'),
(5, 'All Types of Nails', '100', 'Nail'),
(6, 'All types of wood', '4700', 'Wood');

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_details`
--

CREATE TABLE `raw_material_details` (
  `mat_id` int(10) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `mat_type` varchar(50) NOT NULL,
  `mat_qty` int(10) NOT NULL,
  `inv_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_material_details`
--

INSERT INTO `raw_material_details` (`mat_id`, `unit_price`, `mat_type`, `mat_qty`, `inv_code`) VALUES
(1, 231, 'Ball Hammer', 21, 2),
(2, 22, '5 inch', 0, 5),
(3, 22, '2 inch', 0, 5),
(4, 34, '1.2 inch', 0, 5),
(5, 23, 'Cement Nail', 223, 5),
(6, 200, 'Nilon', 4750, 4),
(7, 80, 'Normal', 10, 1),
(8, 654, 'Wood Gum', 12, 1);

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
-- Table structure for table `tool`
--

CREATE TABLE `tool` (
  `inv_code` int(10) NOT NULL,
  `inv_desc` varchar(50) NOT NULL,
  `min_qty` int(10) NOT NULL,
  `tool_name` varchar(50) NOT NULL,
  `item_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tool_detail`
--

CREATE TABLE `tool_detail` (
  `tool_id` int(11) NOT NULL,
  `tool_manu` varchar(50) NOT NULL,
  `tool_avl` varchar(10) NOT NULL,
  `tool_qty` varchar(50) NOT NULL,
  `tool_value` int(10) NOT NULL,
  `inv_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 'john', 'doe', 'john_doe@example.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 2, 'Sahan', 'Dissanayaka', 'sahan@example.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 4, 'udara', 'weerasinghe', 'udara@example.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 4, 'supun', 'akalanka', 'supun@example.com', '827ccb0eea8a706c4c34a16891f84e7b');

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
  ADD PRIMARY KEY (`iss_id`),
  ADD KEY `inv_code` (`inv_code`),
  ADD KEY `inv_code_tool` (`inv_code_tool`),
  ADD KEY `emp_id` (`emp_id`);

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
  ADD PRIMARY KEY (`m_id`,`tool_id`,`inv_code`),
  ADD KEY `tool_id` (`tool_id`),
  ADD KEY `inv_code` (`inv_code`);

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
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`inv_code`);

--
-- Indexes for table `raw_material_details`
--
ALTER TABLE `raw_material_details`
  ADD PRIMARY KEY (`mat_id`),
  ADD KEY `inv_code` (`inv_code`);

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
-- Indexes for table `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`inv_code`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `tool_detail`
--
ALTER TABLE `tool_detail`
  ADD PRIMARY KEY (`tool_id`),
  ADD KEY `inv_code` (`inv_code`);

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
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `con_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `iss_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `m_id` int(10) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `inv_code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `raw_material_details`
--
ALTER TABLE `raw_material_details`
  MODIFY `mat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `tool`
--
ALTER TABLE `tool`
  MODIFY `inv_code` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tool_detail`
--
ALTER TABLE `tool_detail`
  MODIFY `tool_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`inv_code`) REFERENCES `raw_material` (`inv_code`),
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`inv_code_tool`) REFERENCES `tool` (`inv_code`),
  ADD CONSTRAINT `issue_ibfk_3` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

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
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`tool_id`) REFERENCES `tool_detail` (`tool_id`),
  ADD CONSTRAINT `maintenance_ibfk_2` FOREIGN KEY (`inv_code`) REFERENCES `tool` (`inv_code`);

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
-- Constraints for table `raw_material_details`
--
ALTER TABLE `raw_material_details`
  ADD CONSTRAINT `raw_material_details_ibfk_1` FOREIGN KEY (`inv_code`) REFERENCES `raw_material` (`inv_code`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `payment` (`p_id`);

--
-- Constraints for table `tool`
--
ALTER TABLE `tool`
  ADD CONSTRAINT `tool_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);

--
-- Constraints for table `tool_detail`
--
ALTER TABLE `tool_detail`
  ADD CONSTRAINT `tool_detail_ibfk_1` FOREIGN KEY (`inv_code`) REFERENCES `tool` (`inv_code`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `role` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
