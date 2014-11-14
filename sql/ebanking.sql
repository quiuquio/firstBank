-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2014 at 08:00 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ebanking`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `acct_type` varchar(30) NOT NULL,
  `min_balance` float NOT NULL,
  `mgt_fee` float NOT NULL,
  `interbank_trans_fee` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `street` varchar(100) NOT NULL,
  `district` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `time_saved` time NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_numbers`
--

CREATE TABLE IF NOT EXISTS `contact_numbers` (
  `telephone` varchar(20) NOT NULL,
  `u_id` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `time_saved` time NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `u_id` varchar(20) NOT NULL,
  `md5_pw1` varchar(20) NOT NULL,
  `pw2` varchar(20) NOT NULL,
  `facial_user_TID` geometrycollection NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timed_transfers`
--

CREATE TABLE IF NOT EXISTS `timed_transfers` (
  `from_account` varchar(20) NOT NULL,
  `to_account` varchar(20) NOT NULL,
  `t_type` varchar(20) NOT NULL,
  `t_amount` decimal(10,0) NOT NULL,
  `starting_time` time NOT NULL,
  `interval` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `t_type` varchar(30) NOT NULL,
  `t_ID` varchar(20) NOT NULL,
  `t_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `account1_number` varchar(20) NOT NULL,
  `account2_number` varchar(20) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `status` varchar(20) NOT NULL,
  `remarks` varchar(300) NOT NULL,
  `t_fees` decimal(10,0) NOT NULL,
  `current_balance` decimal(10,0) NOT NULL,
  PRIMARY KEY (`t_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_name` varchar(60) NOT NULL,
  `p_address_1` varchar(60) NOT NULL,
  `p_address_2` varchar(60) NOT NULL,
  `p_address_3` varchar(60) NOT NULL,
  `p_address_4` varchar(60) NOT NULL,
  `p_address_5` varchar(60) NOT NULL,
  `c_address_1` varchar(60) NOT NULL,
  `c_address_2` varchar(60) NOT NULL,
  `c_address_3` varchar(60) NOT NULL,
  `c_address_4` varchar(60) NOT NULL,
  `c_address_5` varchar(60) NOT NULL,
  `doc_type` varchar(60) NOT NULL,
  `doc_num` varchar(20) NOT NULL,
  `edu_level` varchar(10) NOT NULL,
  `martial_status` varchar(10) NOT NULL,
  `user_num` varchar(12) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `sex` varchar(1) NOT NULL,
  PRIMARY KEY (`user_num`),
  UNIQUE KEY `doc_num` (`doc_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
