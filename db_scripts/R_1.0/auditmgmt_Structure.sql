-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2015 at 07:45 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auditmgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_details`
--

CREATE TABLE IF NOT EXISTS `access_details` (
`accessid` int(11) NOT NULL COMMENT 'Primary Key',
  `uniqueid` varchar(30) NOT NULL COMMENT 'Unique Id/User Id',
  `fname` varchar(30) DEFAULT NULL COMMENT 'First Name',
  `lname` varchar(30) DEFAULT NULL COMMENT 'Last Name',
  `systype` varchar(30) NOT NULL COMMENT 'System Type',
  `sysname` varchar(100) NOT NULL COMMENT 'System Name/IP',
  `env` varchar(20) NOT NULL COMMENT 'Enviornment',
  `accresp` varchar(10) NOT NULL COMMENT 'Access Responsible',
  `acctype` varchar(20) NOT NULL COMMENT 'Access Type',
  `accprivilege` varchar(10) NOT NULL COMMENT 'Access Privilege',
  `accidassigned` varchar(30) NOT NULL COMMENT 'Access Id Assigned'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audit_details`
--

CREATE TABLE IF NOT EXISTS `audit_details` (
`auditid` int(11) NOT NULL COMMENT 'Audit Id',
  `accessid` int(11) NOT NULL COMMENT 'Access Id FK Ref to Access_Details Table',
  `status` varchar(10) NOT NULL COMMENT 'Audit Status',
  `month` varchar(5) NOT NULL COMMENT 'Audit Month',
  `year` int(4) NOT NULL COMMENT 'Audit Year',
  `auditor` varchar(30) NOT NULL COMMENT 'Auditor',
  `comments` varchar(200) DEFAULT NULL COMMENT 'Comments',
  `evidence1` blob COMMENT 'Screenshot',
  `evidence2` blob COMMENT 'Screenshot'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_details`
--
ALTER TABLE `access_details`
 ADD PRIMARY KEY (`accessid`);

--
-- Indexes for table `audit_details`
--
ALTER TABLE `audit_details`
 ADD PRIMARY KEY (`auditid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_details`
--
ALTER TABLE `access_details`
MODIFY `accessid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key';
--
-- AUTO_INCREMENT for table `audit_details`
--
ALTER TABLE `audit_details`
MODIFY `auditid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Audit Id';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
