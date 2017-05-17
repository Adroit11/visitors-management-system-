-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2016 at 06:54 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers_auth`
--

CREATE TABLE IF NOT EXISTS `customers_auth` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=190 ;

--
-- Dumping data for table `customers_auth`
--

INSERT INTO `customers_auth` (`uid`, `name`, `email`, `phone`, `password`, `address`, `city`, `created`) VALUES
(188, 'Ogundiji Bolade Adio', 'admin@yahoo.com', '08101010101', '$2a$10$6284386518ddc705777e7uJH6vQ7fRMP6Z52rGXtEqq/1PdIFWILG', 'Agege', 'Lagos', '2016-02-03 09:33:07'),
(189, 'ade', 'dd@YAHOO.COM', '0900909909', '$2a$10$828922de5c06cacfd6b20uLf7CpwCQ5rbH9hoqEcuPnGiNkaXqzG.', 'ketu', '', '2016-02-03 16:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adm_id` int(9) NOT NULL AUTO_INCREMENT,
  `adm_name` varchar(50) NOT NULL,
  `adm_code` varchar(11) NOT NULL,
  `adm_password` varchar(15) NOT NULL,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE IF NOT EXISTS `tbl_jobs` (
  `job_id` int(9) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(25) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`job_id`, `job_name`) VALUES
(1, 'Receptionist'),
(2, 'Programmer'),
(3, 'Human Resource '),
(4, 'Marketing Manag'),
(5, 'Web Developer'),
(6, 'Graphics Designer'),
(7, 'Data Analyst'),
(8, 'Database Engineer'),
(9, 'Database Administrator'),
(10, 'Database Designer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffs`
--

CREATE TABLE IF NOT EXISTS `tbl_staffs` (
  `staffs_id` int(9) NOT NULL AUTO_INCREMENT,
  `job_id` int(3) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `uname` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(15) NOT NULL,
  `state_origin` varchar(15) NOT NULL,
  `lga` varchar(20) NOT NULL,
  `admin_stat` tinyint(1) NOT NULL,
  PRIMARY KEY (`staffs_id`),
  KEY `post_id` (`job_id`),
  KEY `admin_stat` (`admin_stat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_staffs`
--

INSERT INTO `tbl_staffs` (`staffs_id`, `job_id`, `fname`, `mname`, `lname`, `email`, `password`, `uname`, `phone`, `address`, `state_origin`, `lga`, `admin_stat`) VALUES
(1, 1, 'Ogundiji', 'Bolade', 'Adio', 'admin@yahoo.com', 'admin', 'Adroit', '08011111111', '27 gshs strt, A', 'Osun', 'ilase', 1),
(2, 3, 'ade', 'dele', 'peter', 'aa@upperlink.com', 'ade', 'adex', '09011111111', '31 ketu', 'Lagos', 'Egbeda', 0),
(3, 9, 'admin', 'admin', 'admin', 'admin@gmail.com', 'upperlink', 'Admin Adio', '09088989898', '31 ketu', 'Osun', 'ilase', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitors`
--

CREATE TABLE IF NOT EXISTS `tbl_visitors` (
  `visitors_id` int(9) NOT NULL AUTO_INCREMENT,
  `visitors_fname` varchar(20) NOT NULL,
  `visitors_oname` varchar(20) NOT NULL,
  `visitors_email` varchar(20) NOT NULL,
  `visitors_address` varchar(50) NOT NULL,
  `visitors_contact` varchar(12) NOT NULL,
  `visitors_state` varchar(15) NOT NULL,
  `visitors_identity` varchar(20) NOT NULL,
  `visit_purpose` varchar(50) NOT NULL,
  `staffs_id` int(9) NOT NULL,
  `visitors_pic` varchar(50) NOT NULL,
  `visitors_timein` datetime NOT NULL,
  `visitors_timeout` time NOT NULL,
  `reg_by` int(9) NOT NULL,
  PRIMARY KEY (`visitors_id`),
  KEY `staffs_id` (`staffs_id`),
  KEY `reg_by` (`reg_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_visitors`
--

INSERT INTO `tbl_visitors` (`visitors_id`, `visitors_fname`, `visitors_oname`, `visitors_email`, `visitors_address`, `visitors_contact`, `visitors_state`, `visitors_identity`, `visit_purpose`, `staffs_id`, `visitors_pic`, `visitors_timein`, `visitors_timeout`, `reg_by`) VALUES
(1, 'ade', 'ade', 'admin@yahoo.com', 'xxxx', 'gdgg', 'Lagos', '47347tyeg', 'ghcghcgh', 1, 'banner.jpg', '0000-00-00 00:00:00', '00:00:00', 1),
(2, 'ade', 'ade', 'admin@yahoo.com', 'xxxx', 'gdgg', 'Lagos', '47347tyeg', 'ghcghcgh', 1, 'banner.jpg', '0000-00-00 00:00:00', '00:00:00', 1),
(3, 'Martins', 'Oladoyin', 'Mart@yahoo.com', 'agege', '09011223344', 'Ogun', '64667326326', 'Business', 1, 'grid-pic1.jpg', '0000-00-00 00:00:00', '00:00:00', 1),
(4, 'Arsene', 'Wenger', 'ars@gmail.com', 'London', '001828882828', 'Paris', '9893737733737', 'Personal', 1, 'grid-pic3.jpg', '0000-00-00 00:00:00', '00:00:00', 1),
(5, 'Arsene', 'Wenger', 'ars@gmail.com', 'London', '001828882828', 'Paris', '9893737733737', 'Personal', 1, 'grid-pic3.jpg', '0000-00-00 00:00:00', '00:00:00', 1),
(7, 'Bala', 'Ezekiel', 'b@judf', 'Ketu', '0922123223', 'Lagos', '97636785', 'Visiting', 2, 'port-pic9.jpg', '0000-00-00 00:00:00', '00:00:00', 1),
(8, 'Tunde', 'Maku', 't@gdgs', 'Surulere', '732626672', 'Kogi', '63632676', 'Visiting', 1, 'port-pic4.jpg', '0000-00-00 00:00:00', '00:00:00', 1),
(9, 'Olagunju', 'Dele', 'd@dfsf', 'Egbeda', '927388', 'Osun', '837738389', 'Business', 1, 'port-pic8.jpg', '0000-00-00 00:00:00', '00:00:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
