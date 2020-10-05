-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 05, 2020 at 06:40 PM
-- Server version: 5.7.28
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
-- Database: `w3`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `a_id` int(10) NOT NULL AUTO_INCREMENT,
  `topic` varchar(50) NOT NULL,
  `a_desc` varchar(50) NOT NULL,
  `weight` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `con_id` int(10) NOT NULL,
  PRIMARY KEY (`a_id`),
  KEY `con_id` (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

DROP TABLE IF EXISTS `assign`;
CREATE TABLE IF NOT EXISTS `assign` (
  `emp_id` int(10) NOT NULL,
  `a_id` int(10) NOT NULL,
  `man_hour` int(10) NOT NULL,
  PRIMARY KEY (`emp_id`,`a_id`),
  KEY `a_id` (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `p_id` int(10) NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `c_id` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(50) NOT NULL,
  `c_address` varchar(50) NOT NULL,
  `c_company` varchar(50) NOT NULL,
  `c_mobile` varchar(20) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

DROP TABLE IF EXISTS `contract`;
CREATE TABLE IF NOT EXISTS `contract` (
  `con_id` int(10) NOT NULL AUTO_INCREMENT,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `con_desc` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `c_id` int(10) NOT NULL,
  `u_id` int(10) NOT NULL,
  PRIMARY KEY (`con_id`),
  KEY `c_id` (`c_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(10) NOT NULL AUTO_INCREMENT,
  `nic` varchar(15) NOT NULL,
  `emp_name` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `emp_address` varchar(50) NOT NULL,
  `contact_num` varchar(20) NOT NULL,
  `emp_type` varchar(20) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_num` int(10) NOT NULL,
  `date` date NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `con_id` int(11) NOT NULL,
  PRIMARY KEY (`invoice_num`),
  KEY `con_id` (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_price` int(11) NOT NULL,
  `item_desc` varchar(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `q_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `q_id` (`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `m_id` int(10) NOT NULL AUTO_INCREMENT,
  `tool_id` int(50) NOT NULL,
  `inv_code` int(50) NOT NULL,
  `cost` int(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`m_id`,`tool_id`,`inv_code`),
  KEY `tool_id` (`tool_id`),
  KEY `inv_code` (`inv_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `need`
--

DROP TABLE IF EXISTS `need`;
CREATE TABLE IF NOT EXISTS `need` (
  `emp_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `pay_date` date NOT NULL,
  PRIMARY KEY (`emp_id`,`p_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `need_to_add`
--

DROP TABLE IF EXISTS `need_to_add`;
CREATE TABLE IF NOT EXISTS `need_to_add` (
  `con_id` int(10) NOT NULL,
  `q_id` int(10) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  PRIMARY KEY (`con_id`,`q_id`),
  KEY `q_id` (`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `p_amount` varchar(10) NOT NULL,
  `con_id` int(10) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `con_id` (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `per_id` int(10) NOT NULL AUTO_INCREMENT,
  `per_name` varchar(50) NOT NULL,
  `per_desc` varchar(50) NOT NULL,
  `per_module` varchar(50) NOT NULL,
  `u_id` int(10) NOT NULL,
  `r_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  PRIMARY KEY (`per_id`),
  KEY `r_id` (`r_id`),
  KEY `user_name` (`user_name`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

DROP TABLE IF EXISTS `quotation`;
CREATE TABLE IF NOT EXISTS `quotation` (
  `q_id` int(10) NOT NULL AUTO_INCREMENT,
  `q_budget` varchar(10) NOT NULL,
  `q_desc` varchar(50) NOT NULL,
  `q_img` varchar(10) NOT NULL,
  `q_name` varchar(50) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

DROP TABLE IF EXISTS `raw_material`;
CREATE TABLE IF NOT EXISTS `raw_material` (
  `inv_code` int(10) NOT NULL AUTO_INCREMENT,
  `inv_desc` varchar(50) NOT NULL,
  `min_qty` varchar(10) NOT NULL,
  `mat_name` varchar(50) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`inv_code`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_details`
--

DROP TABLE IF EXISTS `raw_material_details`;
CREATE TABLE IF NOT EXISTS `raw_material_details` (
  `mat_id` int(10) NOT NULL AUTO_INCREMENT,
  `unit_price` int(10) NOT NULL,
  `mat_type` varchar(50) NOT NULL,
  `mat_qty` int(10) NOT NULL,
  `inv_code` int(10) NOT NULL,
  PRIMARY KEY (`mat_id`),
  KEY `inv_code` (`inv_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(50) NOT NULL,
  `r_desc` varchar(50) NOT NULL,
  `u_id` int(10) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `p_id` int(10) NOT NULL,
  `s_note` varchar(50) NOT NULL,
  `s_date` date NOT NULL,
  PRIMARY KEY (`s_id`,`p_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

DROP TABLE IF EXISTS `tool`;
CREATE TABLE IF NOT EXISTS `tool` (
  `inv_code` int(10) NOT NULL AUTO_INCREMENT,
  `inv_desc` varchar(50) NOT NULL,
  `min_qty` int(10) NOT NULL,
  `tool_name` varchar(50) NOT NULL,
  `item_id` int(10) NOT NULL,
  PRIMARY KEY (`inv_code`),
  KEY `item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tool_detail`
--

DROP TABLE IF EXISTS `tool_detail`;
CREATE TABLE IF NOT EXISTS `tool_detail` (
  `tool_id` int(11) NOT NULL AUTO_INCREMENT,
  `tool_manu` varchar(50) NOT NULL,
  `tool_avl` varchar(10) NOT NULL,
  `tool_qty` varchar(50) NOT NULL,
  `tool_value` int(10) NOT NULL,
  `inv_code` int(11) NOT NULL,
  PRIMARY KEY (`tool_id`),
  KEY `inv_code` (`inv_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_address` varchar(50) NOT NULL,
  `u_mobile` varchar(20) NOT NULL,
  `u_fullname` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `r_id` int(10) NOT NULL,
  PRIMARY KEY (`u_id`),
  KEY `r_id` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `payment` (`p_id`);

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
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`con_id`) REFERENCES `contract` (`con_id`);

--
-- Constraints for table `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `permission_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `role` (`r_id`),
  ADD CONSTRAINT `permission_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `login` (`user_name`),
  ADD CONSTRAINT `permission_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD CONSTRAINT `raw_material_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);

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
