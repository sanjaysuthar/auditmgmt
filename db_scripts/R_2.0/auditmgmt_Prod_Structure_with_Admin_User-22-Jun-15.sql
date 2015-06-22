-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2015 at 03:55 PM
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
  `team` varchar(20) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL COMMENT 'First Name',
  `lname` varchar(30) DEFAULT NULL COMMENT 'Last Name',
  `systype` varchar(30) NOT NULL COMMENT 'System Type',
  `sysname` varchar(100) NOT NULL COMMENT 'System Name/IP',
  `env` varchar(20) NOT NULL COMMENT 'Enviornment',
  `accresp` varchar(10) NOT NULL COMMENT 'Access Responsible',
  `acctype` varchar(20) NOT NULL COMMENT 'Access Type',
  `accprivilege` varchar(10) NOT NULL COMMENT 'Access Privilege',
  `accidassigned` varchar(30) NOT NULL COMMENT 'Access Id Assigned',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'auditor',
  `forgot_flag` int(11) NOT NULL DEFAULT '0',
  `teams_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `name`, `secret`, `email`, `contact`, `role`, `forgot_flag`, `teams_id`) VALUES
(1, 'sanjay', 'Sanjay Suthar', '$2a$10$xaTF/nu9qR147uMoiGHG0uU6jH9LCTJ/cip/QCi07QC..iINKJQRS', 'ss2445@gmail.com', '8722544411', 'admin', 0, 1);

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
-- Indexes for table `teams`
--
ALTER TABLE `teams`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

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
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
