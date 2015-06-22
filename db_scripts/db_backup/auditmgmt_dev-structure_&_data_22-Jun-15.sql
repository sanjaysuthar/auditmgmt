-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2015 at 04:13 PM
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
  `accidassigned` varchar(30) NOT NULL COMMENT 'Access Id Assigned',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 - Deactivated, 1 - Activated'
) ENGINE=InnoDB AUTO_INCREMENT=458 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_details`
--

INSERT INTO `access_details` (`accessid`, `uniqueid`, `team`, `fname`, `lname`, `systype`, `sysname`, `env`, `accresp`, `acctype`, `accprivilege`, `accidassigned`, `status`) VALUES
(51, 'ext.gvanangamudy', 'Lara Cargo', 'Gayathri', 'Vanangamudy', 'Application', 'RTC  [MRS-SV-02104 ( 10.0.101.188)]', 'PROD', 'CS-MRS', 'Personal', 'R/W', 'ext.gvanangamudy', 1),
(52, 'ext.gvanangamudy', 'Lara Cargo', 'Gayathri', 'Vanangamudy', 'Application', 'RQM [MRS-SV-02204 (10.0.144.17)]', 'PROD', 'CS', 'Personal', 'R/W', 'ext.gvanangamudy', 1),
(53, 'ext.gvanangamudy', 'Lara Cargo', 'Gayathri', 'Vanangamudy', 'Application', 'RTC  [MRS-DV-02203 (10.0.141.21)', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.gvanangamudy', 1),
(54, 'ext.gvanangamudy', 'Lara Cargo', 'Gayathri', 'Vanangamudy', 'Application', 'RQM [MRS-DV-02202 (10.0.141.22)]', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.gvanangamudy', 1),
(55, 'ext.gvanangamudy', 'Lara Cargo', 'Gayathri', 'Vanangamudy', 'Application', 'CITRIX VM - CMA-CGMDTX00110 [10.0.120.193]', 'PROD', 'CS', 'Personal', 'Read', 'ext.gvanangamudy', 1),
(56, 'ext.gvanangamudy', 'Lara Cargo', 'Gayathri', 'Vanangamudy', 'Database', 'MRS-DB-00043 (10.0.135.43)', 'PROD', 'CS', 'Personal', 'Read', 'ext.gvanangamudy', 1),
(57, 'ext.gvanangamudy', 'Lara Cargo', 'Gayathri', 'Vanangamudy', 'Database', 'MRS-PR-00043 (10.0.110.45)', 'PREPROD/TST', 'CS', 'Personal', 'Read', 'ext.gvanangamudy', 1),
(58, 'ext.mjaganathan', 'Lara Cargo', 'Mohanraj', 'Jaganathan', 'Application', 'RTC  [MRS-SV-02104 ( 10.0.101.188)]', 'PROD', 'CS', 'Personal', 'R/W', 'ext.mjaganathan', 1),
(59, 'ext.mjaganathan', 'Lara Cargo', 'Mohanraj', 'Jaganathan', 'Application', 'RQM [MRS-SV-02204 (10.0.144.17)]', 'PROD', 'CS', 'Personal', 'R/W', 'ext.mjaganathan', 1),
(60, 'ext.mjaganathan', 'Lara Cargo', 'Mohanraj', 'Jaganathan', 'Application', 'RTC  [MRS-DV-02203 (10.0.141.21)', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.mjaganathan', 1),
(61, 'ext.mjaganathan', 'Lara Cargo', 'Mohanraj', 'Jaganathan', 'Application', 'RQM [MRS-DV-02202 (10.0.141.22)]', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.mjaganathan', 1),
(62, 'ext.mjaganathan', 'Lara Cargo', 'Mohanraj', 'Jaganathan', 'Application', 'CITRIX VM - CMA-CGMDTX00009 [10.0.121.71]', 'PROD', 'CS', 'Personal', 'Read', 'ext.mjaganathan', 1),
(64, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Application', 'Citrix VM - CMA-CGMDTX00196 (10.0.121.23)', 'PROD', 'CS', 'Personal', 'R/W', 'ext.sanjkumar', 1),
(65, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Application', 'Jenkins - TBM', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'ext.sanjkumar', 1),
(66, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Application', 'SVN - TBM/MUST/CARGO', 'PROD', 'CS', 'Personal', 'R/W', 'ext.sanjkumar', 1),
(67, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'R/W', 'ext.sanjkumar', 1),
(68, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Database', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(69, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Application', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(70, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Database', 'Lara Cargo', 'UAT/QUA', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(71, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Database', 'Lara Cargo', 'PREPROD/TST', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(72, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Database', 'Lara TBM', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'CTB_ADMIN', 1),
(73, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Database', 'Lara TBM', 'UAT/QUA', 'CS', 'Common', 'R/W', 'CTB_ADMIN', 1),
(74, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Application', 'Lara TBM', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'CTB_ADMIN', 1),
(75, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Application', 'Lara TBM', 'UAT/QUA', 'CS', 'Common', 'R/W', 'CTB_ADMIN', 1),
(76, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Application', 'MR0555', 'UAT/QUA', 'CS', 'Common', 'R/W', 'weblogic', 1),
(77, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Database', 'CMAD & CMAQ', 'DEV/CMAD', 'CS', 'Common', 'R/W', 'SCE_WS', 1),
(78, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Application', 'MR0157', 'DEV/CMAD', 'CS', 'Common', 'R/W', 'weblogic', 1),
(79, 'ext.vjewlikar', 'Lara Cargo', 'Vishakha', 'Jewlikar', 'Database', 'LARAR,Webservices', 'UAT/QUA', 'CS', 'Common', 'R/W', 'SCE_WS', 0),
(80, 'ext.vjewlikar', 'Lara Cargo', 'Vishakha', 'Jewlikar', 'Application', 'MR0555', 'UAT/QUA', 'CS', 'Common', 'R/W', 'weblogic', 0),
(81, 'ext.vjewlikar', 'Lara Cargo', 'Vishakha', 'Jewlikar', 'Application', 'Jenkins', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'ext.vjewlikar', 0),
(82, 'ext.vjewlikar', 'Lara Cargo', 'Vishakha', 'Jewlikar', 'Database', 'CMAD &CMAQ', 'DEV/CMAD', 'CS', 'Common', 'R/W', 'SCE_WS', 0),
(83, 'ext.vjewlikar', 'Lara Cargo', 'Vishakha', 'Jewlikar', 'Application', 'MR0157', 'DEV/CMAD', 'CS', 'Common', 'R/W', 'weblogic', 0),
(84, 'ext.vjewlikar', 'Lara Cargo', 'Vishakha', 'Jewlikar', 'Application', 'Jenkins', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'ext.vjewlikar', 0),
(85, 'ext.stn', 'Lara Cargo', 'Savitha', 'TN', 'Application', 'Citrix VM - CMA-CGMDTX00196 (10.0.121.23)', 'PROD', 'CS', 'Personal', 'R/W', 'ext.stn', 1),
(86, 'ext.stn', 'Lara Cargo', 'Savitha', 'TN', 'Application', 'Jenkins - LARA CARGO', 'INT/CMAQ', 'CS', 'Personal', 'Read', 'ext.stn', 1),
(87, 'ext.stn', 'Lara Cargo', 'Savitha', 'TN', 'Application', 'SVN - LARA CARGO', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'ext.stn', 1),
(88, 'ext.stn', 'Lara Cargo', 'Savitha', 'TN', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'R/W', 'ext.stn', 1),
(89, 'ext.stn', 'Lara Cargo', 'Savitha', 'TN', 'Database', 'LARAR', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'ext.stn', 1),
(90, 'ext.stn', 'Lara Cargo', 'Savitha', 'TN', 'Database', 'CMAQ', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'ext.stn', 1),
(91, 'ext.stn', 'Lara Cargo', 'Savitha', 'TN', 'Database', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(92, 'ext.stn', 'Lara Cargo', 'Savitha', 'TN', 'Application', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(93, 'ext.stn', 'Lara Cargo', 'Savitha', 'TN', 'Database', 'Lara Cargo', 'UAT/QUA', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(94, 'ext.stn', 'Lara Cargo', 'Savitha', 'TN', 'Database', 'Lara Cargo', 'PREPROD/TST', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(95, 'ext.jmohanan', 'Lara Cargo', 'Jayachithra', 'Mohanan', 'Application', 'Citrix VM - CMA-CGMDTX00196 (10.0.121.23)', 'PROD', 'CS', 'Personal', 'R/W', 'ext.jmohanan', 1),
(96, 'ext.jmohanan', 'Lara Cargo', 'Jayachithra', 'Mohanan', 'Application', 'Jenkins - Lara Cargo', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'ext.jmohanan', 1),
(97, 'ext.jmohanan', 'Lara Cargo', 'Jayachithra', 'Mohanan', 'Application', 'SVN - CARGO', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'ext.jmohanan', 1),
(98, 'ext.jmohanan', 'Lara Cargo', 'Jayachithra', 'Mohanan', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'R/W', 'ext.jmohanan', 1),
(99, 'ext.jmohanan', 'Lara Cargo', 'Jayachithra', 'Mohanan', 'Database', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(100, 'ext.jmohanan', 'Lara Cargo', 'Jayachithra', 'Mohanan', 'Application', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(101, 'ext.jmohanan', 'Lara Cargo', 'Jayachithra', 'Mohanan', 'Database', 'Lara Cargo', 'UAT/QUA', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(102, 'ext.jmohanan', 'Lara Cargo', 'Jayachithra', 'Mohanan', 'Database', 'Lara Cargo', 'PREPROD/TST', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(103, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'CITRIX : cma-cgmdtx00264.cma-cgm.com', 'PROD', 'CS', 'Personal', 'Read', 'ext.pseshadri', 1),
(104, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'Citrix VM - CMA-CGMDTX00078.cma-cgm.com', 'PROD', 'CS', 'Personal', 'Read', 'ext.pseshadri', 1),
(105, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'LARA', 'PROD', 'CS', 'Personal', 'R/W', 'ext.pseshadri', 1),
(106, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'LARA', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'ext.pseshadri', 1),
(107, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'LARA', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'ext.pseshadri', 1),
(108, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'GAIA', 'PROD', 'CS', 'Personal', 'Read', 'ext.pseshadri', 1),
(109, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'LARA Cargo', 'PROD', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(110, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'LARA Cargo', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(111, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'LARA Cargo', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(112, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'RPM', 'PROD', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(113, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'RTC', 'PROD', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(114, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(115, 'ext.pseshadri', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'Jenkins - LARA CARGO', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(116, 'ext.jmohanan', 'Lara Cargo', 'Jaya', 'Mohanan', 'Database', 'LARA', 'PREPROD/TST', 'CS', 'Personal', 'Read', 'ext.jmohanan', 1),
(117, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Database', 'Lara', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'sanjkumar', 1),
(118, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Cargo', 'Application', 'Lara Cargo', 'DEV/CMAD', 'CS', 'Personal', 'R/W/X', 'Mike', 1),
(119, 'ext.chester', 'Lara Cargo', 'Sanjay', 'Kumar', 'Application', 'LARA', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'SKUMARTBM', 1),
(120, 'ext.mike', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'Citrix VM - CMA-CGMDTX00078.cma-cgm.com', 'PROD', 'CS', 'Personal', 'Read', 'ext.pseshadri', 1),
(121, 'ext.chester', 'Lara Cargo', 'Sanjay', 'Kumar', 'Application', 'LARA', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'SKUMARTBM', 1),
(122, 'ext.mike', 'Lara Cargo', 'Prabhu', 'Seshadri', 'Application', 'Citrix VM - CMA-CGMDTX00078.cma-cgm.com', 'PROD', 'CS', 'Personal', 'Read', 'ext.pseshadri', 1),
(125, 'ext.chester', 'Engine/ODI', 'Sanjay', 'Kumar', 'Application', 'LARA', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'SKUMARTBM', 1),
(126, 'ext.mike', 'Engine/ODI', 'Prabhu', 'Seshadri', 'Application', 'Citrix VM - CMA-CGMDTX00078.cma-cgm.com', 'PROD', 'CS', 'Personal', 'Read', 'ext.pseshadri', 1),
(127, 'ext.cshekarv', 'Lara Cargo', 'Chandrashekar', 'V', 'Application', 'RTC', 'PROD', 'CMA SYSTeM', 'Personal', 'Read', 'ext.cshekarv', 1),
(128, 'ext.mjaganathan', 'Lara Cargo', 'Mohanraj', 'Jaganathan', 'Application', 'RTC  [MRS-SV-02104 ( 10.0.101.188)]', 'PREPROD/TST', 'CS-MRS', 'Personal', 'R/W', 'ext.mjaganathan', 1),
(129, 'ext.sanjkumar', 'Lara Cargo', 'Sanjay', 'Kumar', 'Application', 'LARA', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'SKUMARTBM', 1),
(130, 'ext.mjaganathan', 'Lara Cargo', 'mohanraj', 'jaganathan', 'Application', 'RTC Pre', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.mjaganathan', 1),
(131, 'ext.gvanangamudy', 'ISU', 'Gayathri', 'Vanangamudy', 'Application', 'RTC  [MRS-SV-02104 ( 10.0.101.188)]', 'PROD', 'CS', 'Personal', 'R/W', 'ext.gvanangamudy', 1),
(132, 'ext.gvanangamudy', 'ISU', 'Gayathri', 'Vanangamudy', 'Application', 'RQM [MRS-SV-02204 (10.0.144.17)]', 'PROD', 'CS', 'Personal', 'R/W', 'ext.gvanangamudy', 1),
(133, 'ext.gvanangamudy', 'ISU', 'Gayathri', 'Vanangamudy', 'Application', 'RTC  [MRS-DV-02203 (10.0.141.21)', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.gvanangamudy', 1),
(134, 'ext.gvanangamudy', 'ISU', 'Gayathri', 'Vanangamudy', 'Application', 'RQM [MRS-DV-02202 (10.0.141.22)]', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.gvanangamudy', 1),
(135, 'ext.gvanangamudy', 'ISU', 'Gayathri', 'Vanangamudy', 'Application', 'CITRIX VM - CMA-CGMDTX00110 [10.0.120.193]', 'PROD', 'CS', 'Personal', 'Read', 'ext.gvanangamudy', 1),
(136, 'ext.gvanangamudy', 'ISU', 'Gayathri', 'Vanangamudy', 'Database', 'MRS-DB-00043 (10.0.135.43)', 'PROD', 'CS', 'Personal', 'Read', 'ext.gvanangamudy', 1),
(137, 'ext.gvanangamudy', 'ISU', 'Gayathri', 'Vanangamudy', 'Database', 'MRS-PR-00043 (10.0.110.45)', 'PREPROD/TST', 'CS', 'Personal', 'Read', 'ext.gvanangamudy', 1),
(138, 'ext.mjaganathan', 'ISU', 'Mohanraj', 'Jaganathan', 'Application', 'RTC  [MRS-SV-02104 ( 10.0.101.188)]', 'PROD', 'CS', 'Personal', 'R/W', 'ext.mjaganathan', 1),
(139, 'ext.mjaganathan', 'ISU', 'Mohanraj', 'Jaganathan', 'Application', 'RQM [MRS-SV-02204 (10.0.144.17)]', 'PROD', 'CS', 'Personal', 'R/W', 'ext.mjaganathan', 1),
(140, 'ext.mjaganathan', 'ISU', 'Mohanraj', 'Jaganathan', 'Application', 'RTC  [MRS-DV-02203 (10.0.141.21)', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.mjaganathan', 1),
(141, 'ext.mjaganathan', 'ISU', 'Mohanraj', 'Jaganathan', 'Application', 'RQM [MRS-DV-02202 (10.0.141.22)]', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ext.mjaganathan', 1),
(142, 'ext.mjaganathan', 'ISU', 'Mohanraj', 'Jaganathan', 'Application', 'CITRIX VM - CMA-CGMDTX00009 [10.0.121.71]', 'PROD', 'CS', 'Personal', 'Read', 'ext.mjaganathan', 1),
(143, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Application', 'LARA', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'SKUMARTBM', 1),
(144, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Application', 'Citrix VM - CMA-CGMDTX00196 (10.0.121.23)', 'PROD', 'CS', 'Personal', 'R/W', 'ext.sanjkumar', 1),
(145, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Application', 'Jenkins - TBM', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'ext.sanjkumar', 1),
(146, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Application', 'SVN - TBM/MUST/CARGO', 'PROD', 'CS', 'Personal', 'R/W', 'ext.sanjkumar', 1),
(147, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'R/W', 'ext.sanjkumar', 1),
(148, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Database', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(149, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Application', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(150, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Database', 'Lara Cargo', 'UAT/QUA', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(151, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Database', 'Lara Cargo', 'PREPROD/TST', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(152, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Database', 'Lara TBM', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'CTB_ADMIN', 1),
(153, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Database', 'Lara TBM', 'UAT/QUA', 'CS', 'Common', 'R/W', 'CTB_ADMIN', 1),
(154, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Application', 'Lara TBM', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'CTB_ADMIN', 1),
(155, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Application', 'Lara TBM', 'UAT/QUA', 'CS', 'Common', 'R/W', 'CTB_ADMIN', 1),
(156, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Application', 'MR0555', 'UAT/QUA', 'CS', 'Common', 'R/W', 'weblogic', 1),
(157, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Database', 'CMAD & CMAQ', 'DEV/CMAD', 'CS', 'Common', 'R/W', 'SCE_WS', 1),
(158, 'ext.sanjkumar', 'ISU', 'Sanjay', 'Kumar', 'Application', 'MR0157', 'DEV/CMAD', 'CS', 'Common', 'R/W', 'weblogic', 1),
(159, 'ext.vjewlikar', 'ISU', 'Vishakha', 'Jewlikar', 'Database', 'LARAR,Webservices', 'UAT/QUA', 'CS', 'Common', 'R/W', 'SCE_WS', 0),
(160, 'ext.vjewliar', 'ISU', 'Vishakha', 'Jewlikar', 'Application', 'MR0555', 'UAT/QUA', 'CS', 'Common', 'R/W', 'weblogic', 1),
(161, 'ext.vjewlikar', 'ISU', 'Vishakha', 'Jewlikar', 'Application', 'Jenkins', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'ext.vjewlikar', 0),
(162, 'ext.vjewlikar', 'ISU', 'Vishakha', 'Jewlikar', 'Database', 'CMAD &CMAQ', 'DEV/CMAD', 'CS', 'Common', 'R/W', 'SCE_WS', 0),
(163, 'ext.vjewliar', 'ISU', 'Vishakha', 'Jewlikar', 'Application', 'MR0157', 'DEV/CMAD', 'CS', 'Common', 'R/W', 'weblogic', 1),
(164, 'ext.vjewlikar', 'ISU', 'Vishakha', 'Jewlikar', 'Application', 'Jenkins', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'ext.vjewlikar', 0),
(165, 'ext.stn', 'ISU', 'Savitha', 'TN', 'Application', 'Citrix VM - CMA-CGMDTX00196 (10.0.121.23)', 'PROD', 'CS', 'Personal', 'R/W', 'ext.stn', 1),
(166, 'ext.stn', 'ISU', 'Savitha', 'TN', 'Application', 'Jenkins - LARA CARGO', 'INT/CMAQ', 'CS', 'Personal', 'Read', 'ext.stn', 1),
(167, 'ext.stn', 'ISU', 'Savitha', 'TN', 'Application', 'SVN - LARA CARGO', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'ext.stn', 1),
(168, 'ext.stn', 'ISU', 'Savitha', 'TN', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'R/W', 'ext.stn', 1),
(169, 'ext.stn', 'ISU', 'Savitha', 'TN', 'Database', 'LARAR', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'ext.stn', 1),
(170, 'ext.stn', 'ISU', 'Savitha', 'TN', 'Database', 'CMAQ', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'ext.stn', 1),
(171, 'ext.stn', 'ISU', 'Savitha', 'TN', 'Database', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(172, 'ext.stn', 'ISU', 'Savitha', 'TN', 'Application', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(173, 'ext.stn', 'ISU', 'Savitha', 'TN', 'Database', 'Lara Cargo', 'UAT/QUA', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(174, 'ext.stn', 'ISU', 'Savitha', 'TN', 'Database', 'Lara Cargo', 'PREPROD/TST', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(175, 'ext.jmohanan', 'ISU', 'Jayachithra', 'Mohanan', 'Application', 'Citrix VM - CMA-CGMDTX00196 (10.0.121.23)', 'PROD', 'CS', 'Personal', 'R/W', 'ext.jmohanan', 1),
(176, 'ext.jmohanan', 'ISU', 'Jayachithra', 'Mohanan', 'Application', 'Jenkins - TBM', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'ext.jmohanan', 1),
(177, 'ext.jmohanan', 'ISU', 'Jayachithra', 'Mohanan', 'Application', 'SVN - CARGO', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'ext.jmohanan', 1),
(178, 'ext.jmohanan', 'ISU', 'Jayachithra', 'Mohanan', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'R/W', 'ext.jmohanan', 1),
(179, 'ext.jmohanan', 'ISU', 'Jayachithra', 'Mohanan', 'Database', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(180, 'ext.jmohanan', 'ISU', 'Jayachithra', 'Mohanan', 'Application', 'Lara Cargo', 'INT/CMAQ', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(181, 'ext.jmohanan', 'ISU', 'Jayachithra', 'Mohanan', 'Database', 'Lara Cargo', 'UAT/QUA', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(182, 'ext.jmohanan', 'ISU', 'Jayachithra', 'Mohanan', 'Database', 'Lara Cargo', 'PREPROD/TST', 'CS', 'Common', 'R/W', 'LRA_ABCF', 1),
(183, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'CITRIX : cma-cgmdtx00264.cma-cgm.com', 'PROD', 'CS', 'Personal', 'Read', 'ext.pseshadri', 1),
(184, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'Citrix VM - CMA-CGMDTX00078.cma-cgm.com', 'PROD', 'CS', 'Personal', 'Read', 'ext.pseshadri', 1),
(185, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'LARA', 'PROD', 'CS', 'Personal', 'R/W', 'ext.pseshadri', 1),
(186, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'LARA', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'ext.pseshadri', 1),
(187, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'LARA', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'ext.pseshadri', 1),
(188, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'GAIA', 'PROD', 'CS', 'Personal', 'Read', 'ext.pseshadri', 1),
(189, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'LARA Cargo', 'PROD', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(190, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'LARA Cargo', 'UAT/QUA', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(191, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'LARA Cargo', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(192, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'RPM', 'PROD', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(193, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'RTC', 'PROD', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(194, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(195, 'ext.pseshadri', 'ISU', 'Prabhu', 'Seshadri', 'Application', 'Jenkins - LARA CARGO', 'INT/CMAQ', 'CS', 'Personal', 'R/W', 'pseshadri', 1),
(196, 'ext.ptapan', 'Lara UAT', 'Tapan', 'Pati', 'Application', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'TAPANQUA', 1),
(197, 'ext.ptapan', 'Lara UAT', 'Tapan', 'Pati', 'Application', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'TAPANPRE', 1),
(198, 'ext.ptapan', 'Lara UAT', 'Tapan', 'Pati', 'System', 'MIRA', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.ptapan', 1),
(199, 'ext.ptapan', 'Lara UAT', 'Tapan', 'Pati', 'Database', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'TAPANQUA', 1),
(200, 'ext.ptapan', 'Lara UAT', 'Tapan', 'Pati', 'Database', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'TAPANPRE', 1),
(201, 'ext.ptapan', 'Lara UAT', 'Tapan', 'Pati', 'Application', 'RPM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.tpati', 1),
(202, 'ext.ptapan', 'Lara UAT', 'Tapan', 'Pati', 'Application', 'RQM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.ptapan', 1),
(203, 'ext.ptapan', 'Lara UAT', 'Tapan', 'Pati', 'Application', 'ALM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'tpati', 1),
(204, 'ext.rkumar1', 'Lara UAT', 'Rakesh', 'Kumar', 'Application', 'LARA', 'UAT', 'CMA SYSTeM', 'Generic', 'Write', 'LARAIN11', 1),
(205, 'ext.rkumar1', 'Lara UAT', 'Rakesh', 'Kumar', 'Application', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Generic', 'Write', 'LARAIN11', 1),
(206, 'ext.rkumar1', 'Lara UAT', 'Rakesh', 'Kumar', 'System', 'MIRA', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.rkumar1', 1),
(207, 'ext.rkumar1', 'Lara UAT', 'Rakesh', 'Kumar', 'Database', 'LARA', 'UAT', 'CMA SYSTeM', 'Generic', 'Write', 'LARAIN11', 1),
(208, 'ext.rkumar1', 'Lara UAT', 'Rakesh', 'Kumar', 'Database', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Generic', 'Write', 'LARAIN11', 1),
(209, 'ext.rkumar1', 'Lara UAT', 'Rakesh', 'Kumar', 'Application', 'RPM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.rkumar1', 1),
(210, 'ext.rkumar1', 'Lara UAT', 'Rakesh', 'Kumar', 'Application', 'RQM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.rkumar1', 1),
(211, 'ext.rkumar1', 'Lara UAT', 'Rakesh', 'Kumar', 'Application', 'ALM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'rkumar6', 1),
(212, 'ext.rkumar1', 'Lara UAT', 'Rakesh', 'Kumar', 'Application', 'SVN', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'rkumar', 1),
(213, 'ext.tbhaduri', 'Lara UAT', 'Tushar', 'Bhaduri', 'Application', 'LARA', 'UAT/QUA', 'CMA SYSTeM', 'Personal', 'R/W', 'TUSHARQUA', 1),
(214, 'ext.tbhaduri', 'Lara UAT', 'Tushar', 'Bhaduri', 'Application', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'TUSHARPRE', 1),
(215, 'ext.tbhaduri', 'Lara UAT', 'Tushar', 'Bhaduri', 'System', 'MIRA', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.tbhaduri', 1),
(216, 'ext.tbhaduri', 'Lara UAT', 'Tushar', 'Bhaduri', 'Database', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'TUSHARQUA', 1),
(217, 'ext.tbhaduri', 'Lara UAT', 'Tushar', 'Bhaduri', 'Database', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'TUSHARPRE', 1),
(218, 'ext.tbhaduri', 'Lara UAT', 'Tushar', 'Bhaduri', 'Application', 'RPM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.tbhaduri', 1),
(219, 'ext.tbhaduri', 'Lara UAT', 'Tushar', 'Bhaduri', 'Application', 'RQM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.tbhaduri', 1),
(220, 'ext.psomuri', 'Lara UAT', 'Praveen', 'Somuri', 'Application', 'LARA', 'UAT', 'CMA SYSTeM', 'Generic', 'Write', 'LARAIN11', 1),
(221, 'ext.psomuri', 'Lara UAT', 'Praveen', 'Somuri', 'Application', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Generic', 'Write', 'LARAIN11', 1),
(222, 'ext.psomuri', 'Lara UAT', 'Praveen', 'Somuri', 'System', 'MIRA', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.psomuri', 1),
(223, 'ext.psomuri', 'Lara UAT', 'Praveen', 'Somuri', 'Database', 'LARA', 'UAT', 'CMA SYSTeM', 'Generic', 'Write', 'LARAIN11', 1),
(224, 'ext.psomuri', 'Lara UAT', 'Praveen', 'Somuri', 'Database', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Generic', 'Write', 'LARAIN11', 1),
(225, 'ext.psomuri', 'Lara UAT', 'Praveen', 'Somuri', 'Application', 'RPM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.psomuri', 1),
(226, 'ext.psomuri', 'Lara UAT', 'Praveen', 'Somuri', 'Application', 'RQM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.psomuri', 1),
(227, 'ext.psomuri', 'Lara UAT', 'Praveen', 'Somuri', 'Application', 'ALM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'prsomuri', 1),
(228, 'ext.psomuri', 'Lara UAT', 'Praveen', 'Somuri', 'Application', 'SVN', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'prsomuri', 1),
(229, 'ext.rmitra', 'Lara UAT', 'Rwiddha', 'Mitra', 'Application', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'RWIDDHAQUA', 1),
(230, 'ext.rmitra', 'Lara UAT', 'Rwiddha', 'Mitra', 'Application', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'RWIDDHAPRE', 1),
(231, 'ext.rmitra', 'Lara UAT', 'Rwiddha', 'Mitra', 'System', 'MIRA', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.rmitra', 1),
(232, 'ext.rmitra', 'Lara UAT', 'Rwiddha', 'Mitra', 'Database', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'RWIDDHAQUA', 1),
(233, 'ext.rmitra', 'Lara UAT', 'Rwiddha', 'Mitra', 'Database', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'RWIDDHAPRE', 1),
(234, 'ext.rmitra', 'Lara UAT', 'Rwiddha', 'Mitra', 'Application', 'RPM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.rmitra', 1),
(235, 'ext.rmitra', 'Lara UAT', 'Rwiddha', 'Mitra', 'Application', 'RQM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.rmitra', 1),
(236, 'ext.nbhattacharyya', 'Lara UAT', 'Nilanjana', 'Bhattacharyya', 'Application', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'NILANJANAQUA', 1),
(237, 'ext.nbhattacharyya', 'Lara UAT', 'Nilanjana', 'Bhattacharyya', 'Application', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'NILANJANAPRE', 1),
(238, 'ext.nbhattacharyya', 'Lara UAT', 'Nilanjana', 'Bhattacharyya', 'System', 'MIRA', 'PROD', 'CMA SYSTeM', 'Personal', 'Read', 'ext.nbhattacharyya', 1),
(239, 'ext.nbhattacharyya', 'Lara UAT', 'Nilanjana', 'Bhattacharyya', 'Database', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'NILANJANAQUA', 1),
(240, 'ext.nbhattacharyya', 'Lara UAT', 'Nilanjana', 'Bhattacharyya', 'Database', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'NILANJANAPRE', 1),
(241, 'ext.nbhattacharyya', 'Lara UAT', 'Nilanjana', 'Bhattacharyya', 'Application', 'RPM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.nbhattacharyya', 1),
(242, 'ext.nbhattacharyya', 'Lara UAT', 'Nilanjana', 'Bhattacharyya', 'Application', 'RQM', 'PROD', 'CMA SYSTeM', 'Personal', 'R/W', 'ext.nbhattacharyya', 1),
(243, 'ext.rranjan', 'Lara UAT', 'Rajiv', 'Ranjan', 'Application', 'LARA', 'DEV/CMAD', 'CMA SYSTeM', 'Personal', 'Read', 'LARAIN11', 1),
(244, 'ext.rranjan', 'Lara UAT', 'Rajiv', 'Ranjan', 'Application', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Generic', 'Write', 'LARAIN11', 1),
(245, 'ext.rranjan', 'Lara UAT', 'Rajiv', 'Ranjan', 'System', 'MIRA', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.rranjan', 1),
(246, 'ext.rranjan', 'Lara UAT', 'Rajiv', 'Ranjan', 'Database', 'LARA', 'UAT', 'CMA SYSTeM', 'Generic', 'Write', 'LARAIN11', 1),
(247, 'ext.rranjan', 'Lara UAT', 'Rajiv', 'Ranjan', 'Database', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Generic', 'Write', 'LARAIN11', 1),
(248, 'ext.rranjan', 'Lara UAT', 'Rajiv', 'Ranjan', 'Application', 'RPM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.rranjan', 1),
(249, 'ext.rranjan', 'Lara UAT', 'Rajiv', 'Ranjan', 'Application', 'RQM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.rranjan', 1),
(250, 'ext.rranjan', 'Lara UAT', 'Rajiv', 'Ranjan', 'Application', 'ALM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'rranjan', 1),
(251, 'ext.vsingh', 'Lara UAT', 'Vibha', 'Singh', 'Application', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'VIBHAQUA', 1),
(252, 'ext.vsingh', 'Lara UAT', 'Vibha', 'Singh', 'Application', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'VIBHAPRE', 1),
(253, 'ext.vsingh', 'Lara UAT', 'Vibha', 'Singh', 'System', 'MIRA', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.vsingh', 1),
(254, 'ext.vsingh', 'Lara UAT', 'Vibha', 'Singh', 'Database', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'VIBHAQUA', 1),
(255, 'ext.vsingh', 'Lara UAT', 'Vibha', 'Singh', 'Database', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'VIBHAPRE', 1),
(256, 'ext.vsingh', 'Lara UAT', 'Vibha', 'Singh', 'Application', 'RPM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.vsingh', 1),
(257, 'ext.vsingh', 'Lara UAT', 'Vibha', 'Singh', 'Application', 'RQM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.vsingh', 1),
(258, 'ext.smajhi', 'Lara UAT', 'Sukesini', 'Majhi', 'Application', 'LARA', 'DEV/CMAD', 'CMA SYSTeM', 'Personal', 'Read', 'SUKESINIQUA', 1),
(259, 'ext.smajhi', 'Lara UAT', 'Sukesini', 'Majhi', 'Application', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'SUKESINIPRE', 1),
(260, 'ext.smajhi', 'Lara UAT', 'Sukesini', 'Majhi', 'System', 'MIRA', 'PROD', 'CMA SYSTeM', 'Personal', 'Read', 'ext.smajhi', 1),
(261, 'ext.smajhi', 'Lara UAT', 'Sukesini', 'Majhi', 'Database', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'SUKESINIQUA', 1),
(262, 'ext.smajhi', 'Lara UAT', 'Sukesini', 'Majhi', 'Database', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'SUKESINIPRE', 1),
(263, 'ext.smajhi', 'Lara UAT', 'Sukesini', 'Majhi', 'Application', 'RPM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.smajhi', 1),
(264, 'ext.smajhi', 'Lara UAT', 'Sukesini', 'Majhi', 'Application', 'RQM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.smajhi', 1),
(265, 'ext.sadas', 'Lara UAT', 'Sayan', 'Das', 'Application', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'SAYANQUA', 1),
(266, 'ext.sadas', 'Lara UAT', 'Sayan', 'Das', 'Application', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'SAYANPRE', 1),
(267, 'ext.sadas', 'Lara UAT', 'Sayan', 'Das', 'System', 'MIRA', 'PROD', 'CMA SYSTeM', 'Personal', 'Read', 'ext.sadas', 1),
(268, 'ext.sadas', 'Lara UAT', 'Sayan', 'Das', 'Database', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'SAYANQUA', 1),
(269, 'ext.sadas', 'Lara UAT', 'Sayan', 'Das', 'Database', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'SAYANPRE', 1),
(270, 'ext.sadas', 'Lara UAT', 'Sayan', 'Das', 'Application', 'RPM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.sadas', 1),
(271, 'ext.sadas', 'Lara UAT', 'Sayan', 'Das', 'Application', 'RQM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.sadas', 1),
(272, 'ext.kmelgandi', 'Lara UAT', 'Kanhaiya', 'Melgandi', 'Application', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Write', 'KANHAIYAQUA', 1),
(273, 'ext.kmelgandi', 'Lara UAT', 'Kanhaiya', 'Melgandi', 'Application', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Write', 'KANHAIYAPRE', 1),
(274, 'ext.kmelgandi', 'Lara UAT', 'Kanhaiya', 'Melgandi', 'System', 'MIRA', 'PROD', 'CMA SYSTeM', 'Personal', 'Read', 'ext.kmelgandi', 1),
(275, 'ext.kmelgandi', 'Lara UAT', 'Kanhaiya', 'Melgandi', 'Database', 'LARA', 'UAT', 'CMA SYSTeM', 'Personal', 'Read', 'KANHAIYAQUA', 1),
(276, 'ext.kmelgandi', 'Lara UAT', 'Kanhaiya', 'Melgandi', 'Database', 'LARA', 'PREPROD', 'CMA SYSTeM', 'Personal', 'Read', 'KANHAIYAPRE', 1),
(277, 'ext.kmelgandi', 'Lara UAT', 'Kanhaiya', 'Melgandi', 'Application', 'RPM', 'PROD', 'CMA SYSTeM', 'Personal', 'Read', 'ext.kmelgandi', 1),
(278, 'ext.kmelgandi', 'Lara UAT', 'Kanhaiya', 'Melgandi', 'Application', 'RQM', 'PROD', 'CMA SYSTeM', 'Personal', 'Write', 'ext.kmelgandi', 1),
(355, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'Citrix', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(356, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'RTC', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(357, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'EZ Services', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(358, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'MIRA', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(359, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(360, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'RPM', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(361, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'Maximo', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(362, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'Quantum', 'UAT/QUA', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(363, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'Quantum', 'PREPROD/TST', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(364, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'Quantum', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(365, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'TRAX', 'UAT/QUA', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(366, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'TRAX', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'SMISHRA', 1),
(367, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'TRAX', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(368, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'TRAX TSG', 'UAT/QUA', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(369, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'TRAX TSG', 'PREPROD/TST', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(370, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'TRAX TSG', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(371, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'APRO V6', 'UAT/QUA', 'CS', 'PRIVELEDGED', 'Read/Write', 'SMISHRA', 1),
(372, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'APRO V5', 'UAT/QUA', 'CS', 'PRIVELEDGED', 'Read/Write', 'SMISHRA', 1),
(373, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'APRO V4', 'UAT/QUA', 'CS', 'PRIVELEDGED', 'Read/Write', 'SMISHRA', 1),
(374, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'APRO V6', 'PROD', 'CS', 'PRIVELEDGED', 'Read/Write', 'SMISHRA', 1),
(375, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'APRO V5', 'PROD', 'CS', 'PRIVELEDGED', 'Read/Write', 'SMISHRA', 1),
(376, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'APRO V4', 'PROD', 'CS', 'PRIVELEDGED', 'Read/Write', 'SMISHRA', 1),
(377, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'OeBS', 'BS7', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(378, 'ext.smishra', 'OEBS', 'Sonali', 'Mishra', 'Application', 'OeBS', 'BS6', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(379, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'Citrix', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(380, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'RTC', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(381, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'EZ Services', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(382, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'MIRA', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(383, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(384, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'RPM', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(385, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'Maximo', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(386, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'Quantum', 'UAT/QUA', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(387, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'Quantum', 'PREPROD/TST', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(388, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'Quantum', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(389, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'TRAX', 'UAT/QUA', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(390, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'TRAX', 'PREPROD/TST', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(391, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'TRAX', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(392, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'TRAX TSG', 'UAT/QUA', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(393, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'TRAX TSG', 'PREPROD/TST', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(394, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'TRAX TSG', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(395, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'APRO V6', 'UAT/QUA', 'CS', 'PRIVELEDGED', 'Read/Write', 'VPATANI', 1),
(396, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'APRO V5', 'UAT/QUA', 'CS', 'PRIVELEDGED', 'Read/Write', 'VPATANI', 1),
(397, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'APRO V4', 'UAT/QUA', 'CS', 'PRIVELEDGED', 'Read/Write', 'VPATANI', 1),
(398, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'APRO V6', 'PROD', 'CS', 'PRIVELEDGED', 'Read/Write', 'VPATANI', 1),
(399, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'APRO V5', 'PROD', 'CS', 'PRIVELEDGED', 'Read/Write', 'VPATANI', 1),
(400, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'APRO V4', 'PROD', 'CS', 'PRIVELEDGED', 'Read/Write', 'VPATANI', 1),
(401, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'OeBS', 'BS7', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(402, 'ext.vpatani', 'OEBS', 'Vasavi', 'Patani', 'Application', 'OeBS', 'BS6', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(403, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'Quantum', 'PREPROD/TST', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(404, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'Quantum', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(405, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'TRAX', 'UAT/QUA', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(406, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'TRAX', 'PREPROD/TST', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(407, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'TRAX', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(408, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'TRAX TSG', 'UAT/QUA', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(409, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'TRAX TSG', 'PREPROD/TST', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(410, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'TRAX TSG', 'PROD', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(411, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'APRO V6', 'UAT/QUA', 'CS', 'PRIVELEDGED', 'Read/Write', 'SMISHRA', 1),
(412, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'APRO V5', 'UAT/QUA', 'CS', 'PRIVELEDGED', 'Read/Write', 'SMISHRA', 1),
(413, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'APRO V4', 'UAT/QUA', 'CS', 'PRIVELEDGED', 'Read/Write', 'SMISHRA', 1),
(414, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'APRO V6', 'PROD', 'CS', 'PRIVELEDGED', 'Read/Write', 'SMISHRA', 1),
(415, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'APRO V5', 'PROD', 'CS', 'PRIVELEDGED', 'Read/Write', 'SMISHRA', 1),
(416, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'APRO V4', 'PROD', 'CS', 'PRIVELEDGED', 'Read/Write', 'SMISHRA', 1),
(417, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'OeBS', 'BS7', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(418, 'ext.smishra', 'Lara Cargo', 'Sonali', 'Mishra', 'Application', 'OeBS', 'BS6', 'CS', 'Personal', 'Read/Write', 'SMISHRA', 1),
(420, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'RTC', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(421, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'EZ Services', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(422, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'MIRA', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(423, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'RQM', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(424, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'RPM', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(425, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'Maximo', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(426, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'Quantum', 'UAT/QUA', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(427, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'Quantum', 'PREPROD/TST', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(428, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'Quantum', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(429, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'TRAX', 'UAT/QUA', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(430, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'TRAX', 'PREPROD/TST', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(431, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'TRAX', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(432, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'TRAX TSG', 'UAT/QUA', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(433, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'TRAX TSG', 'PREPROD/TST', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(434, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'TRAX TSG', 'PROD', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(435, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'APRO V6', 'UAT/QUA', 'CS', 'PRIVELEDGED', 'Read/Write', 'VPATANI', 1),
(436, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'APRO V5', 'UAT/QUA', 'CS', 'PRIVELEDGED', 'Read/Write', 'VPATANI', 1),
(437, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'APRO V4', 'UAT/QUA', 'CS', 'PRIVELEDGED', 'Read/Write', 'VPATANI', 1),
(438, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'APRO V6', 'PROD', 'CS', 'PRIVELEDGED', 'Read/Write', 'VPATANI', 1),
(439, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'APRO V5', 'PROD', 'CS', 'PRIVELEDGED', 'Read/Write', 'VPATANI', 1),
(440, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'APRO V4', 'PROD', 'CS', 'PRIVELEDGED', 'Read/Write', 'VPATANI', 1),
(441, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'OeBS', 'BS7', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(442, 'ext.vpatani', 'Lara Cargo', 'Vasavi', 'Patani', 'Application', 'OeBS', 'BS6', 'CS', 'Personal', 'Read/Write', 'VPATANI', 1),
(443, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Application', 'Citrix', 'PROD', 'CS', 'Personal', 'R/W', 'EXT.ASHANKAR', 1),
(444, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Application', 'EZ-Services', 'PROD', 'CS', 'Personal', 'R/W', 'CMA.EXT.ASHANKAR', 1),
(445, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Application', 'RPM', 'PROD', 'CS', 'Personal', 'R/W', 'EXT.ASHANKAR', 1),
(446, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Application', 'LDBS UAT', 'UAT/QUA', 'CS', 'Personal', 'Read', 'EXT.ASHANKAR', 1),
(447, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Application', 'LDBS PROD', 'PROD', 'CS', 'Personal', 'Read', 'EXT.ASHANKAR', 1),
(448, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Application', 'OCBS UAT', 'UAT/QUA', 'CS', 'Personal', 'Read', 'EXT.ASHANKAR', 1),
(449, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Application', 'OCBS MNT', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'EXT.ASHANKAR', 1),
(450, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Application', 'OCBS PROD', 'PROD', 'CS', 'Personal', 'R/W', 'EXT.ASHANKAR', 1),
(451, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Application', 'OCBS DEV', 'DEV/CMAD', 'CS', 'Personal', 'R/W', 'EXT.ASHANKAR', 1),
(452, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Application', 'OEBS_PRE_PROD/Test(BS7)', 'PREPROD/TST', 'CS', 'Personal', 'R/W', 'ASHANKAR', 1),
(453, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Application', 'OEBS_PROD(BS6)', 'PROD', 'CS', 'Personal', 'R/W', 'ASHANKAR', 1),
(454, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Database', 'OCBS MNT', 'DEV/CMAD', 'CS', 'Personal', 'Read', 'ASHANKAR', 1),
(455, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Database', 'OCBS PROD', 'PROD', 'CS', 'Personal', 'Read', 'ASHANKAR', 1),
(456, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Database', 'OEBS_PRE_PROD/Test(BS7)', 'PREPROD/TST', 'CS', 'Personal', 'Read', 'ASHANKAR', 1),
(457, 'ext.ashankar', 'Setup', 'Anand', 'Shankar', 'Database', 'OEBS_PROD(BS6)', 'PROD', 'CS', 'Personal', 'Read', 'ASHANKAR', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_details`
--

INSERT INTO `audit_details` (`auditid`, `access_detail_id`, `status`, `month`, `year`, `auditor`, `comments`, `evidence1`, `evidence2`) VALUES
(44, 64, 'Success', '4', 2017, 'ext.pseshadri', 'User has this access', 'Sanj_Citrix.JPG5527b6ceb7096.JPG', NULL),
(45, 107, 'Success', '4', 2015, 'ext.sanjkumar', 'User has this access', 'Prabhu_2.jpg5527b76e23d93.JPG', NULL),
(46, 96, 'Failed', '4', 2015, 'ext.sanjkumar', 'User doesn''t has this access', 'Jenkins -Jaya Login.png5527bf4207ec3.JPG', NULL),
(47, 98, 'Success', '4', 2015, 'ext.sanjkumar', 'User has this access', 'RQM -Jaya Login.png5527c1a36c793.JPG', NULL),
(48, 51, 'Failed', '4', 2015, 'ext.sanjkumar', 'Audit Failed : Access Violation', 'image001 (1).png552cd37a54bb0.JPG552dfa659ae05.JPG', NULL),
(49, 51, 'Success', '4', 2015, 'ext.sanjkumar', 'User has this access', 'me2.JPG552f9ef911b66.JPG', NULL),
(50, 51, 'Success', '5', 2015, 'ext.sanjkumar', 'User has this access', 'Citrix.png555097bf8b660.JPG55643e797aa1f.JPG', NULL),
(53, 123, 'Success', '6', 2015, 'ext.sanjkumar', 'User has this access', '888.jpg556dcec92ff6f.JPG', NULL),
(55, 125, 'Success', '7', 2015, 'ext.sanjkumar', 'User has this access', '888.jpg556e9cd482c72.JPG', NULL),
(56, 127, 'Success', '6', 2015, 'ext.cshekarv', 'User has this access', 'aced_1.jpg556ed3a618bdc.JPG', NULL),
(57, 51, 'Success', '5', 2015, 'ext.mjaganathan', 'user has this access', 'Prabhu_lara UAT.png55700330775c9.JPG', NULL),
(58, 51, 'Success', '5', 2015, 'ext.mjaganathan', 'user has this access', 'Prabhu_RPM.png557003c033c9d.JPG', NULL),
(59, 143, 'Success', '6', 2015, 'ext.pseshadri', 'User has this access', 'Prabhu_1.jpg55714113f1989.JPG', 'Prabhu_2.jpg5571411401d9a.JPG'),
(60, 131, 'Failed', '6', 2015, 'ext.pseshadri', 'Audit Failed : Access Violation', 'image001 (1).png5571421265d69.JPG', NULL),
(61, 177, 'Success', '7', 2015, 'ext.sanjkumar', 'User has this access', NULL, NULL),
(65, 219, 'Success', '6', 2015, 'ext.smajhi', '', 'RQM_Tushar.jpg5574788264b29.JPG', NULL),
(66, 235, 'Success', '6', 2015, 'ext.smajhi', '', 'RQM_Rwiddha.jpg55747910aba85.JPG', NULL),
(67, 242, 'Success', '6', 2015, 'ext.smajhi', '', 'RQM_Nilanjana.jpg55747abee1f1f.JPG', NULL),
(68, 264, 'Success', '6', 2015, 'ext.smajhi', '', 'RQM_Sukesini.jpg55747b55caf6a.JPG', NULL),
(69, 271, 'Success', '6', 2015, 'ext.smajhi', '', 'RQM_Sayan.jpg55747bcbdc65f.JPG', NULL),
(70, 278, 'Success', '6', 2015, 'ext.smajhi', '', 'RQM_Kanhiya.jpg55747c0b082b7.JPG', NULL),
(71, 218, 'Success', '6', 2015, 'ext.smajhi', '', 'Tushar_RPM.jpg55747c71a6454.JPG', NULL),
(72, 263, 'Success', '6', 2015, 'ext.smajhi', '', 'Sukesini_RPM.jpg55747ca9e2d77.JPG', NULL),
(73, 234, 'Success', '6', 2015, 'ext.smajhi', '', 'Rwiddha_RPM.jpg55747e6478c8a.JPG', NULL),
(74, 277, 'Success', '6', 2015, 'ext.smajhi', '', 'Kanhiya_RPM.jpg55747e9e555c1.JPG', NULL),
(75, 213, 'Success', '6', 2015, 'ext.smajhi', '', 'LARA QUA_Tushar.jpg55747fdc9488b.JPG', NULL),
(76, 258, 'Success', '6', 2015, 'ext.smajhi', '', 'LARA QUA_Sukesini.jpg5574802c56758.JPG', NULL),
(77, 265, 'Success', '6', 2015, 'ext.smajhi', '', 'LARA QUA_Sayan.jpg5574806b2f9e7.JPG', NULL),
(78, 236, 'Success', '6', 2015, 'ext.smajhi', '', 'LARA QUA_Nilanjana.jpg55748111cf045.JPG', NULL),
(79, 239, 'Success', '6', 2015, 'ext.smajhi', '', 'DB QUA_Nilanjana.jpg557481e96de4a.JPG', NULL),
(80, 268, 'Success', '6', 2015, 'ext.smajhi', '', 'DB QUA_Sayan.jpg55748263a2a1a.JPG', NULL),
(81, 261, 'Success', '6', 2015, 'ext.smajhi', '', 'DB QUA_Sukesini.jpg557483053ee57.JPG', NULL),
(82, 216, 'Success', '6', 2015, 'ext.smajhi', '', 'DB QUA_Tushar.jpg55748358a9c4b.JPG', NULL),
(84, 65, 'Success', '1', 2014, 'ext.sanjkumar', 'User has this access', NULL, NULL),
(85, 52, 'Success', '6', 2015, 'ext.sanjkumar', 'User has this access', NULL, NULL),
(86, 51, 'Success', '1', 2013, 'Sanjay', 'Success', 'image.jpg55815fe679ec3.JPG', NULL),
(87, 355, 'Success', '6', 2015, 'ext.vpatani', '', 'citrix.png55829f4a6d4d0.JPG', NULL),
(88, 356, 'Success', '6', 2015, 'ext.vpatani', '', 'RTC2.JPG5582a06f0961f.JPG', NULL),
(89, 357, 'Success', '6', 2015, 'ext.vpatani', '', 'ez.png5582a1728de9c.JPG', NULL),
(90, 358, 'Success', '6', 2015, 'ext.vpatani', '', 'mira.jpg5582a1a84acad.JPG', NULL),
(91, 359, 'Success', '6', 2015, 'ext.vpatani', '', 'rqm2.JPG5582a2200a8be.JPG', NULL),
(92, 361, 'Success', '6', 2015, 'ext.vpatani', '', 'maximo.jpg5582a2c111ec0.JPG', NULL),
(93, 362, 'Success', '6', 2015, 'ext.vpatani', '', 'quantum uat.png5582a2f4d7e94.JPG', NULL),
(94, 363, 'Success', '6', 2015, 'ext.vpatani', '', 'quantum pre.png5582a357db7db.JPG', NULL),
(95, 364, 'Success', '6', 2015, 'ext.vpatani', '', 'quantum prod.png5582a3a727b09.JPG', NULL),
(96, 365, 'Success', '6', 2015, 'ext.vpatani', '', 'trax uat.png5582a41ac128e.JPG', NULL),
(98, 367, 'Success', '6', 2015, 'ext.vpatani', '', 'trax prod.png5582a4fad61c7.JPG', NULL),
(99, 368, 'Success', '6', 2015, 'ext.vpatani', '', 'trax uat.png5582a61b7a704.JPG', NULL),
(100, 370, 'Success', '6', 2015, 'ext.vpatani', '', 'tsg prod.png5582a81126229.JPG', NULL),
(101, 377, 'Success', '6', 2015, 'ext.vpatani', '', 'bs7.png5582a8f38882e.JPG', NULL),
(102, 378, 'Success', '6', 2015, 'ext.vpatani', '', 'bs6.png5582a97bd9844.JPG', NULL),
(103, 371, 'Success', '6', 2015, 'ext.vpatani', '', 'APRO-6-uat.jpg5582bcb0edd6d.JPG', NULL),
(104, 372, 'Success', '6', 2015, 'ext.vpatani', '', 'APRO-5-uat.jpg5582bccdbee0d.JPG', NULL),
(105, 373, 'Success', '6', 2015, 'ext.vpatani', '', 'APRO-4-uat.jpg5582bce4c58c2.JPG', NULL),
(106, 374, 'Success', '6', 2015, 'ext.vpatani', '', 'APRO-6-Prod.jpg5582bcfc11b24.JPG', NULL),
(107, 443, 'Success', '6', 2015, 'ext.sthatikonda', '', 'CITRIX.png5583f8585cd81.JPG', NULL),
(108, 445, 'Success', '6', 2015, 'ext.sthatikonda', '', 'RPM.png5583f8e1c1962.JPG', NULL),
(109, 444, 'Success', '6', 2015, 'ext.sthatikonda', '', 'EZ-Service.png5583f93e08c34.JPG', NULL),
(110, 454, 'Success', '6', 2015, 'ext.sthatikonda', '', 'OCBS MNT.png5583f9d72c471.JPG', NULL),
(111, 455, 'Success', '6', 2015, 'ext.sthatikonda', '', 'Load2OEBS.png5583fa155105e.JPG', NULL),
(112, 457, 'Success', '6', 2015, 'ext.sthatikonda', '', 'BS6.png5583fa424345d.JPG', NULL),
(113, 456, 'Success', '6', 2015, 'ext.sthatikonda', '', 'BS7.png5583fa6947191.JPG', NULL),
(114, 450, 'Success', '6', 2015, 'ext.sthatikonda', '', 'OEBS PROD R12.PNG5583fc0d026e3.JPG', NULL),
(115, 449, 'Success', '6', 2015, 'ext.sthatikonda', '', 'OCBS-MNT R12.png5583fcc401ba5.JPG', NULL),
(116, 451, 'Success', '6', 2015, 'ext.sthatikonda', '', 'OCBS DEV.PNG5583fd21c1f4a.JPG', NULL),
(117, 448, 'Success', '6', 2015, 'ext.sthatikonda', '', 'OCBS-UAT.PNG5583fddec0925.JPG', NULL),
(118, 452, 'Success', '6', 2015, 'ext.sthatikonda', '', 'BS7 Application.png5583fe3343ffa.JPG', NULL),
(119, 453, 'Success', '6', 2015, 'ext.sthatikonda', '', 'BS6 Application.png5583fe7101e96.JPG', NULL),
(120, 446, 'Success', '6', 2015, 'ext.sthatikonda', '', NULL, NULL),
(121, 447, 'Success', '6', 2015, 'ext.sthatikonda', '', NULL, NULL),
(122, 446, 'Success', '6', 2015, 'ext.sthatikonda', '', 'LDBS_UAT.PNG55880143a3f6f.JPG', NULL),
(123, 447, 'Success', '6', 2015, 'ext.sthatikonda', '', 'LDBS_PROD.PNG5588017b4fc7e.JPG', NULL),
(124, 446, 'Success', '6', 2015, 'ext.sthatikonda', '', 'LDBS_UAT.PNG55880228c7641.JPG', NULL),
(125, 447, 'Success', '6', 2015, 'ext.sthatikonda', '', 'LDBS_PROD.PNG5588027fde947.JPG', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `remarks`) VALUES
(1, 'Lara Cargo', 'Java AMS Team'),
(4, 'DIVA', 'Cma Cgm Reporting Team'),
(5, 'Lara UAT', 'Lara UAT Testing Team Kolkata'),
(6, 'OEBS', 'OEBS Support Team'),
(7, 'Setup', 'OEBS Setup Team');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `name`, `secret`, `email`, `contact`, `role`, `forgot_flag`, `teams_id`) VALUES
(1, 'sanjay', 'Sanjay Suthar', '$2a$10$xaTF/nu9qR147uMoiGHG0uU6jH9LCTJ/cip/QCi07QC..iINKJQRS', 'ss2445@gmail.com', '8722544411', 'admin', 0, 1),
(9, 'prabhu', 'Prabhu Seshadri', '$2a$10$N8jtdAbzhh/ztvZNS3/rWe0Mny0VgF5ErsUppzEDUFrWP6E2RCP6u', 'ext.pseshadri@cma-systems.com', '8880777011', 'auditor', 0, 1),
(10, 'abdur', 'Abdur', '$2a$10$94IT.ICbDRaB49jAmw4v..R3Ydx4RamYyxkS/PyarafoRpZu9qY.W', 'ext.abdur@cma-systems.com', '9876543210', 'auditor', 0, 6),
(12, 'sukesini', 'Sukesini Majhi', '$2a$10$.HFBhMWo1ixKr.EclZLwJuPyHFepDQYO7dVTBCeBnToMl46dnJ7My', 'smajhi@in.ibm.com', '9876543210', 'auditor', 0, 5),
(14, 'sukumar', 'Sukumar', '$2a$10$ffZ/fHF0A8bPmKv3/AfDnuepq9iJGABiiqTUglRRl/RCYiT6qkWQ.', 'ext.sukumar@cma-systems.com', '9876543210', 'auditor', 0, 7),
(16, 'savitha', 'Savitha TN', '$2a$10$XSDQV5ONSU0Ly33khqh0jerr2ksQ0lCZ.qAkmHA8y2lcqPN.Xs73e', 'ext.stn@cma-systems.com', '9876543210', 'auditor', 1, 1),
(17, 'sindhu', 'Sindhusha', '$2a$10$3eR/QJCTKpe.BmRRRM/VHu7DxBN5nrS8s0STwKYxqzNZ1dVQg0Txe', 'ext.sindhu@cma-systems.com', '9876543210', 'auditor', 0, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_details_vw`
--
CREATE TABLE IF NOT EXISTS `user_details_vw` (
`uniqueid` varchar(30)
,`fname` varchar(30)
,`lname` varchar(30)
,`accesscount` bigint(21)
,`team` varchar(20)
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

-- --------------------------------------------------------

--
-- Structure for view `user_details_vw`
--
DROP TABLE IF EXISTS `user_details_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_details_vw` AS (select `access_details`.`uniqueid` AS `uniqueid`,`access_details`.`fname` AS `fname`,`access_details`.`lname` AS `lname`,count(0) AS `accesscount`,`access_details`.`team` AS `team` from `access_details` group by `access_details`.`uniqueid` order by `access_details`.`uniqueid`);

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
MODIFY `accessid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',AUTO_INCREMENT=458;
--
-- AUTO_INCREMENT for table `audit_details`
--
ALTER TABLE `audit_details`
MODIFY `auditid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Audit Id',AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
