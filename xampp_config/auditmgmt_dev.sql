-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2015 at 09:31 AM
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
  `fname` varchar(30) DEFAULT NULL COMMENT 'First Name',
  `lname` varchar(30) DEFAULT NULL COMMENT 'Last Name',
  `systype` varchar(30) NOT NULL COMMENT 'System Type',
  `sysname` varchar(100) NOT NULL COMMENT 'System Name/IP',
  `env` varchar(20) NOT NULL COMMENT 'Enviornment',
  `accresp` varchar(10) NOT NULL COMMENT 'Access Responsible',
  `acctype` varchar(20) NOT NULL COMMENT 'Access Type',
  `accprivilege` varchar(10) NOT NULL COMMENT 'Access Privilege',
  `accidassigned` varchar(30) NOT NULL COMMENT 'Access Id Assigned'
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_details`
--

INSERT INTO `access_details` (`accessid`, `uniqueid`, `fname`, `lname`, `systype`, `sysname`, `env`, `accresp`, `acctype`, `accprivilege`, `accidassigned`) VALUES
(51, 'ext.gvanangamudy', 'Gayathri', 'Vanangamudy', 'Application', 'RTC  [MRS-SV-02104 ( 10.0.101.188)]', 'PROD', 'CS-MRS', 'Personal', 'R/W', 'ext.gvanangamudy'),
(52, 'ext.gvanangamudy', 'Gayathri', 'Vanangamudy', 'Application', 'RQM [MRS-SV-02204 (10.0.144.17)]', 'PROD', 'CS', 'Personal', 'R/W', 'ext.gvanangamudy'),
(53, 'ext.gvanangamudy', 'Gayathri', 'Vanangamudy', 'Application', 'RTC  [MRS-DV-02203 (10.0.141.21)', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.gvanangamudy'),
(54, 'ext.gvanangamudy', 'Gayathri', 'Vanangamudy', 'Application', 'RQM [MRS-DV-02202 (10.0.141.22)]', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.gvanangamudy'),
(55, 'ext.gvanangamudy', 'Gayathri', 'Vanangamudy', 'Application', 'CITRIX VM - CMA-CGMDTX00110 [10.0.120.193]', 'PROD', 'CS', 'Personal', 'Read', 'ext.gvanangamudy'),
(56, 'ext.gvanangamudy', 'Gayathri', 'Vanangamudy', 'Database', 'MRS-DB-00043 (10.0.135.43)', 'PROD', 'CS', 'Personal', 'Read', 'ext.gvanangamudy'),
(57, 'ext.gvanangamudy', 'Gayathri', 'Vanangamudy', 'Database', 'MRS-PR-00043 (10.0.110.45)', 'PREPROD/TST', 'CS', 'Personal', 'Read', 'ext.gvanangamudy'),
(58, 'ext.mjaganathan', 'Mohanraj', 'Jaganathan', 'Application', 'RTC  [MRS-SV-02104 ( 10.0.101.188)]', 'PROD', 'CS', 'Personal', 'R/W', 'ext.mjaganathan'),
(59, 'ext.mjaganathan', 'Mohanraj', 'Jaganathan', 'Application', 'RQM [MRS-SV-02204 (10.0.144.17)]', 'PROD', 'CS', 'Personal', 'R/W', 'ext.mjaganathan'),
(60, 'ext.mjaganathan', 'Mohanraj', 'Jaganathan', 'Application', 'RTC  [MRS-DV-02203 (10.0.141.21)', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.mjaganathan'),
(61, 'ext.mjaganathan', 'Mohanraj', 'Jaganathan', 'Application', 'RQM [MRS-DV-02202 (10.0.141.22)]', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.mjaganathan'),
(62, 'ext.mjaganathan', 'Mohanraj', 'Jaganathan', 'Application', 'CITRIX VM - CMA-CGMDTX00009 [10.0.121.71]', 'PROD', 'CS', 'Personal', 'Read', 'ext.mjaganathan'),
(63, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Application', 'LARA', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'SKUMARTBM'),
(64, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Application', 'Citrix VM - CMA-CGMDTX00196 (10.0.121.23)', 'PROD', 'CS', 'Personal', 'R/W', 'ext.sanjkumar'),
(65, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Application', 'Jenkins - TBM', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'ext.sanjkumar'),
(66, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Application', 'SVN - TBM/MUST/CARGO', 'PROD', 'CS', 'Personal', 'R/W', 'ext.sanjkumar'),
(67, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'R/W', 'ext.sanjkumar'),
(68, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Database', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF'),
(69, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Application', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF'),
(70, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Database', 'Lara Cargo', 'UAT/QUA', 'CS', 'Common', 'R/W', 'LRA_ABCF'),
(71, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Database', 'Lara Cargo', 'PREPROD/TST', 'CS', 'Common', 'R/W', 'LRA_ABCF'),
(72, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Database', 'Lara TBM', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'CTB_ADMIN'),
(73, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Database', 'Lara TBM', 'UAT/QUA', 'CS', 'Common', 'R/W', 'CTB_ADMIN'),
(74, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Application', 'Lara TBM', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'CTB_ADMIN'),
(75, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Application', 'Lara TBM', 'UAT/QUA', 'CS', 'Common', 'R/W', 'CTB_ADMIN'),
(76, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Application', 'MR0555', 'UAT/QUA', 'CS', 'Common', 'R/W', 'weblogic'),
(77, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Database', 'CMAD & CMAQ', 'DEV/CMAD', 'CS', 'Common', 'R/W', 'SCE_WS'),
(78, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Application', 'MR0157', 'DEV/CMAD', 'CS', 'Common', 'R/W', 'weblogic'),
(79, 'ext.vjewlikar', 'Vishakha', 'Jewlikar', 'Database', 'LARAR,Webservices', 'UAT/QUA', 'CS', 'Common', 'R/W', 'SCE_WS'),
(80, 'ext.vjewliar', 'Vishakha', 'Jewlikar', 'Application', 'MR0555', 'UAT/QUA', 'CS', 'Common', 'R/W', 'weblogic'),
(81, 'ext.vjewlikar', 'Vishakha', 'Jewlikar', 'Application', 'Jenkins', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'ext.vjewlikar'),
(82, 'ext.vjewlikar', 'Vishakha', 'Jewlikar', 'Database', 'CMAD &CMAQ', 'DEV/CMAD', 'CS', 'Common', 'R/W', 'SCE_WS'),
(83, 'ext.vjewliar', 'Vishakha', 'Jewlikar', 'Application', 'MR0157', 'DEV/CMAD', 'CS', 'Common', 'R/W', 'weblogic'),
(84, 'ext.vjewlikar', 'Vishakha', 'Jewlikar', 'Application', 'Jenkins', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'ext.vjewlikar'),
(85, 'ext.stn', 'Savitha', 'TN', 'Application', 'Citrix VM - CMA-CGMDTX00196 (10.0.121.23)', 'PROD', 'CS', 'Personal', 'R/W', 'ext.stn'),
(86, 'ext.stn', 'Savitha', 'TN', 'Application', 'Jenkins - LARA CARGO', 'INT/CMAQ', 'CS', 'Personal', 'Read', 'ext.stn'),
(87, 'ext.stn', 'Savitha', 'TN', 'Application', 'SVN - LARA CARGO', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'ext.stn'),
(88, 'ext.stn', 'Savitha', 'TN', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'R/W', 'ext.stn'),
(89, 'ext.stn', 'Savitha', 'TN', 'Database', 'LARAR', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'ext.stn'),
(90, 'ext.stn', 'Savitha', 'TN', 'Database', 'CMAQ', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'ext.stn'),
(91, 'ext.stn', 'Savitha', 'TN', 'Database', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF'),
(92, 'ext.stn', 'Savitha', 'TN', 'Application', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF'),
(93, 'ext.stn', 'Savitha', 'TN', 'Database', 'Lara Cargo', 'UAT/QUA', 'CS', 'Common', 'R/W', 'LRA_ABCF'),
(94, 'ext.stn', 'Savitha', 'TN', 'Database', 'Lara Cargo', 'PREPROD/TST', 'CS', 'Common', 'R/W', 'LRA_ABCF'),
(95, 'ext.jmohanan', 'Jayachithra', 'Mohanan', 'Application', 'Citrix VM - CMA-CGMDTX00196 (10.0.121.23)', 'PROD', 'CS', 'Personal', 'R/W', 'ext.jmohanan'),
(96, 'ext.jmohanan', 'Jayachithra', 'Mohanan', 'Application', 'Jenkins - Lara Cargo', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'ext.jmohanan'),
(97, 'ext.jmohanan', 'Jayachithra', 'Mohanan', 'Application', 'SVN - CARGO', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'ext.jmohanan'),
(98, 'ext.jmohanan', 'Jayachithra', 'Mohanan', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'R/W', 'ext.jmohanan'),
(99, 'ext.jmohanan', 'Jayachithra', 'Mohanan', 'Database', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF'),
(100, 'ext.jmohanan', 'Jayachithra', 'Mohanan', 'Application', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF'),
(101, 'ext.jmohanan', 'Jayachithra', 'Mohanan', 'Database', 'Lara Cargo', 'UAT/QUA', 'CS', 'Common', 'R/W', 'LRA_ABCF'),
(102, 'ext.jmohanan', 'Jayachithra', 'Mohanan', 'Database', 'Lara Cargo', 'PREPROD/TST', 'CS', 'Common', 'R/W', 'LRA_ABCF'),
(103, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'CITRIX : cma-cgmdtx00264.cma-cgm.com', 'PROD', 'CS', 'Personal', 'Read', 'ext.pseshadri'),
(104, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'Citrix VM - CMA-CGMDTX00078.cma-cgm.com', 'PROD', 'CS', 'Personal', 'Read', 'ext.pseshadri'),
(105, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'LARA', 'PROD', 'CS', 'Personal', 'R/W', 'ext.pseshadri'),
(106, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'LARA', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'ext.pseshadri'),
(107, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'LARA', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'ext.pseshadri'),
(108, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'GAIA', 'PROD', 'CS', 'Personal', 'Read', 'ext.pseshadri'),
(109, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'LARA Cargo', 'PROD', 'CS', 'Personal', 'R/W', 'pseshadri'),
(110, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'LARA Cargo', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'pseshadri'),
(111, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'LARA Cargo', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'pseshadri'),
(112, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'RPM', 'PROD', 'CS', 'Personal', 'R/W', 'pseshadri'),
(113, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'RTC', 'PROD', 'CS', 'Personal', 'R/W', 'pseshadri'),
(114, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'R/W', 'pseshadri'),
(115, 'ext.pseshadri', 'Prabhu', 'Seshadri', 'Application', 'Jenkins - LARA CARGO', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'pseshadri'),
(116, 'ext.jmohanan', 'Jaya', 'Mohanan', 'Database', 'LARA', 'PREPROD/TST', 'CS', 'Personal', 'Read', 'ext.jmohanan'),
(117, 'ext.sanjkumar', 'Sanjay', 'Kumar', 'Database', 'Lara', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'sanjkumar');

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
  `accessid` int(11) NOT NULL COMMENT 'Access Id FK Ref to Access_Details Table',
  `status` varchar(10) NOT NULL COMMENT 'Audit Status',
  `month` varchar(5) NOT NULL COMMENT 'Audit Month',
  `year` int(4) NOT NULL COMMENT 'Audit Year',
  `auditor` varchar(30) NOT NULL COMMENT 'Auditor',
  `comments` varchar(200) DEFAULT NULL COMMENT 'Comments',
  `evidence1` varchar(200) DEFAULT NULL COMMENT 'Screenshot',
  `evidence2` varchar(200) DEFAULT NULL COMMENT 'Screenshot'
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_details`
--

INSERT INTO `audit_details` (`auditid`, `accessid`, `status`, `month`, `year`, `auditor`, `comments`, `evidence1`, `evidence2`) VALUES
(44, 64, 'Success', '4', 2015, 'ext.pseshadri', 'User has this access', 'Sanj_Citrix.JPG5527b6ceb7096.JPG', NULL),
(45, 107, 'Success', '4', 2015, 'ext.sanjkumar', 'User has this access', 'Prabhu_2.jpg5527b76e23d93.JPG', NULL),
(46, 96, 'Failed', '4', 2015, 'ext.sanjkumar', 'User doesn''t has this access', 'Jenkins -Jaya Login.png5527bf4207ec3.JPG', NULL),
(47, 98, 'Success', '4', 2015, 'ext.sanjkumar', 'User has this access', 'RQM -Jaya Login.png5527c1a36c793.JPG', NULL),
(48, 51, 'Failed', '4', 2015, 'ext.sanjkumar', 'Audit Failed : Access Violation', 'image001 (1).png552cd37a54bb0.JPG552dfa659ae05.JPG', NULL),
(49, 51, 'Success', '4', 2015, 'ext.sanjkumar', 'User has this access', 'me2.JPG552f9ef911b66.JPG', NULL),
(50, 51, 'Success', '5', 2015, 'ext.sanjkumar', 'User has this access', 'Citrix.png555097bf8b660.JPG55643e797aa1f.JPG', NULL);

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `acc_aud_max_year_vw` AS (select `acc`.`accessid` AS `accessid`,max(`aud`.`year`) AS `max_year` from (`access_details` `acc` left join `audit_details` `aud` on((`acc`.`accessid` = `aud`.`accessid`))) group by `acc`.`accessid`);

-- --------------------------------------------------------

--
-- Structure for view `latest_audit_details`
--
DROP TABLE IF EXISTS `latest_audit_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `latest_audit_details` AS (select `acc`.`accessid` AS `accessid`,max(`aud`.`month`) AS `latest_audit_month`,`aud`.`year` AS `latest_audit_year` from (`access_details` `acc` left join `audit_details` `aud` on((`acc`.`accessid` = `aud`.`accessid`))) where (`aud`.`year` = (select `acc_aud_max_year_vw`.`max_year` from `acc_aud_max_year_vw` where (`acc_aud_max_year_vw`.`accessid` = `acc`.`accessid`))) group by `acc`.`accessid`);

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
MODIFY `accessid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `audit_details`
--
ALTER TABLE `audit_details`
MODIFY `auditid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Audit Id',AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
