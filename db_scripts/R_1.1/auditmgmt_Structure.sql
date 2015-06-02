-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2015 at 05:06 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auditmgmt_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_details`
--

CREATE TABLE IF NOT EXISTS `access_details` (
`accessid` int(11) NOT NULL COMMENT 'Primary Key',
  `uniqueid` varchar(30) NOT NULL COMMENT 'Unique Id/User Id',
  `team` varchar(20) DEFAULT NULL COMMENT 'Team Name',
  `fname` varchar(30) DEFAULT NULL COMMENT 'First Name',
  `lname` varchar(30) DEFAULT NULL COMMENT 'Last Name',
  `systype` varchar(30) NOT NULL COMMENT 'System Type',
  `sysname` varchar(100) NOT NULL COMMENT 'System Name/IP',
  `env` varchar(20) NOT NULL COMMENT 'Enviornment',
  `accresp` varchar(10) NOT NULL COMMENT 'Access Responsible',
  `acctype` varchar(20) NOT NULL COMMENT 'Access Type',
  `accprivilege` varchar(10) NOT NULL COMMENT 'Access Privilege',
  `accidassigned` varchar(30) NOT NULL COMMENT 'Access Id Assigned'
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `acc_aud_max_year_vw`
--
CREATE TABLE IF NOT EXISTS `acc_aud_max_year_vw` (
`accessid` int(11)
,`max_year` int(4)
);
-- --------------------------------------------------------

--
-- Table structure for table `audit_details`
--

CREATE TABLE IF NOT EXISTS `audit_details` (
`auditid` int(11) NOT NULL COMMENT 'Audit Id',
  `access_detail_id` int(11) NOT NULL COMMENT 'Access Id FK Ref to Access_Details Table',
  `status` varchar(10) NOT NULL COMMENT 'Audit Status',
  `month` varchar(5) NOT NULL COMMENT 'Audit Month',
  `year` int(4) NOT NULL COMMENT 'Audit Year',
  `auditor` varchar(30) NOT NULL COMMENT 'Auditor',
  `comments` varchar(200) DEFAULT NULL COMMENT 'Comments',
  `evidence1` varchar(200) DEFAULT NULL COMMENT 'Screenshot',
  `evidence2` varchar(200) DEFAULT NULL COMMENT 'Screenshot'
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `latest_audit_details`
--
CREATE TABLE IF NOT EXISTS `latest_audit_details` (
`accessid` int(11)
,`latest_audit_month` varchar(5)
,`latest_audit_year` int(4)
);
-- --------------------------------------------------------

--
-- Structure for view `acc_aud_max_year_vw`
--
DROP TABLE IF EXISTS `acc_aud_max_year_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `acc_aud_max_year_vw` AS (select `acc`.`accessid` AS `accessid`,max(`aud`.`year`) AS `max_year` from (`access_details` `acc` left join `audit_details` `aud` on((`acc`.`accessid` = `aud`.`access_detail_id`))) group by `acc`.`accessid`);

-- --------------------------------------------------------

--
-- Structure for view `latest_audit_details`
--
DROP TABLE IF EXISTS `latest_audit_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `latest_audit_details` AS (select `acc`.`accessid` AS `accessid`,max(`aud`.`month`) AS `latest_audit_month`,`aud`.`year` AS `latest_audit_year` from (`access_details` `acc` left join `audit_details` `aud` on((`acc`.`accessid` = `aud`.`access_detail_id`))) where (`aud`.`year` = (select `acc_aud_max_year_vw`.`max_year` from `acc_aud_max_year_vw` where (`acc_aud_max_year_vw`.`accessid` = `acc`.`accessid`))) group by `acc`.`accessid`);

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
MODIFY `accessid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `audit_details`
--
ALTER TABLE `audit_details`
MODIFY `auditid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Audit Id',AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
