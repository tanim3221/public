-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 07:50 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruaaa_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `activate`
--

CREATE TABLE `activate` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `expire` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activate`
--

INSERT INTO `activate` (`id`, `name`, `text`, `expire`) VALUES
(1, 'Registration Form', '', ''),
(2, 'Payment Form', '', '24/05/2020 - 09:25 pm'),
(3, 'Complain From', '', ''),
(4, 'Login Form', '', '31/12/2021 - 06:00 pm'),
(5, 'Participant\'s List', 'First Biennial Reunion-2020', ''),
(6, 'RUAAA Committee', 'RUAAA Committee ', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`id`, `name`) VALUES
(1, 'Saklayen');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `MemId` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Name` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `Subject` varchar(700) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `Image` varchar(100) NOT NULL,
  `PostingDate` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `MemId`, `Name`, `Subject`, `Message`, `Image`, `PostingDate`, `status`) VALUES
(151, 'LF00166', 'Md. Salim Uddin', 'Please Change Photo &  Occupation designation ', ' Dear sir. Please attach my recent photo & my current Occupation Designation : Senior Principal Officer .\r\n\r\nwith thanks \r\n\r\nMd. Salim Uddin', 'Md.Salim Uddin Information.doc', '2020-02-16 05:25:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `googlelogin`
--

CREATE TABLE `googlelogin` (
  `id` int(11) NOT NULL,
  `oauth_pro` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `oauthid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `googlelogin`
--

INSERT INTO `googlelogin` (`id`, `oauth_pro`, `oauthid`, `first_name`, `last_name`, `email_id`, `gender`, `picture`, `created_date`) VALUES
(3, 'google', '106319650370074899059', 'Saklayen', 'Ahmed', 'astanim.3221@gmail.com', '', 'https://lh3.googleusercontent.com/a-/AOh14Ghnx7D-EevrkLpie_LyHj16dPXvu-YW332f_fCu', '2020-05-17 22:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `lifemembers`
--

CREATE TABLE `lifemembers` (
  `id` int(11) NOT NULL,
  `MemId` char(11) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Mailing` varchar(1000) DEFAULT NULL,
  `Permanent` varchar(1000) DEFAULT NULL,
  `Profession` varchar(255) DEFAULT NULL,
  `Designation` varchar(300) DEFAULT NULL,
  `Organization` varchar(300) DEFAULT NULL,
  `Mobile` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Bachelor` varchar(300) DEFAULT NULL,
  `Master` varchar(300) DEFAULT NULL,
  `CategoryM` varchar(200) DEFAULT NULL,
  `RuaaaPost` varchar(300) DEFAULT NULL,
  `Image` varchar(150) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `participants` int(1) DEFAULT NULL,
  `Password` varchar(150) NOT NULL,
  `PassResetTime` varchar(200) NOT NULL,
  `active` int(1) NOT NULL,
  `DateM` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lifemembers`
--

INSERT INTO `lifemembers` (`id`, `MemId`, `Name`, `Mailing`, `Permanent`, `Profession`, `Designation`, `Organization`, `Mobile`, `Email`, `Bachelor`, `Master`, `CategoryM`, `RuaaaPost`, `Image`, `status`, `participants`, `Password`, `PassResetTime`, `active`, `DateM`) VALUES
(432, 'DDM0001', 'K M Quamruzzaman Korban', ' Head of Market Research and Development, GPH Ispat Ltd, Hamid Tower (3rd Floor), 24 Gulshan C/A, Circle-2, Dhaka-1212 ', 'Hiron Super Market(2nd floor), Vill+P.O- Rupdia, P/S- Kotwali, Upazila- Sadar, Jashore', 'Service', 'Head of Market Research and Development', 'GPH Ispat Ltd', '01611000848', 'korban1975@gmail.com', '1995', '1997', 'DDM', '', 'DDM00001.jpg', 0, 1, '', '', 1, '2020-02-25 00:31:52'),
(438, 'GDM0001', 'S M Ashraful Alam ', ' Plot No. 1088, Block No. 1 , Bashundhara, Residensial Area,\r\nDhaka- 1229', 'Plot#725-728, Road#11, Block#I, Bashundhara Residential Area, Dhaka-1229', 'Business', 'Managing Director', 'Walton Hi-Tech Industries Limited', '01678000471', 'alam@waltonbd.com', '1986', '1987', 'GDM', '', 'GDM00001.jpg', 0, 0, '', '', 1, '2020-02-25 01:19:06'),
(449, 'GM0001', 'Dr. Subhash Chandra Sil', ' Professor Department of Accounting and Information Systems, University of Rajshahi, Rajshahi-6205', 'Pirojpur, Kalibari Road, Pirojpur', 'Teaching and  Research', 'Professor ', 'Rajshahi University', '01922988955', 'subhaaisru@yahoo.com', '1977', '1978', 'GM', '', 'GM00001.jpg', 0, 1, '', '', 1, '2020-02-25 00:31:52'),
(468, 'GM0015', 'Hasan Imam Siddiki, ACA, ACS', 'Youth Tower, 822/2 Rokeya Sarani, Dhaka-1216\r\n', '', 'Service', 'Deputy General Manager', 'Youth Group', '01711701457', 'hasanaca@hotmail.com', '2007', '2008', 'GM', '', 'GM0015-new.jpg', 0, 1, '', '', 1, '2020-02-25 00:31:52'),
(473, 'LM 00293', 'Mohammad Ashraful Islam', 'Jamuna Sar Karkhana College, Tarakandi, Jamalpur\r\n', '36/1. Nuruddin Ahmed Road, Harisankappur, Mohinimills, Kushtia-7001\r\n', 'Teaching', 'Principal', 'Jamuna Sar Karkhana College', '01711227428', 'ashraful.bcic@gmail.com', '1982', '1983', 'LM', '', 'LM00293.jpg', 0, 1, '', '', 1, '2020-02-25 00:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `MemId` char(11) DEFAULT NULL,
  `Name` varchar(300) DEFAULT NULL,
  `Mailing` varchar(1000) DEFAULT NULL,
  `Permanent` varchar(1000) DEFAULT NULL,
  `Profession` varchar(255) DEFAULT NULL,
  `Designation` varchar(300) DEFAULT NULL,
  `Organization` varchar(300) DEFAULT NULL,
  `Mobile` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Bachelor` varchar(300) DEFAULT NULL,
  `Master` varchar(300) DEFAULT NULL,
  `YearM` year(4) DEFAULT NULL,
  `CategoryM` varchar(150) NOT NULL,
  `RuaaaPost` varchar(300) DEFAULT NULL,
  `Image` varchar(150) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `active` int(1) NOT NULL,
  `DateM` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `MemId`, `Name`, `Mailing`, `Permanent`, `Profession`, `Designation`, `Organization`, `Mobile`, `Email`, `Bachelor`, `Master`, `YearM`, `CategoryM`, `RuaaaPost`, `Image`, `status`, `active`, `DateM`) VALUES
(1, 'M00001', 'Md. Morshed Kabir', 'C/O- M A Majid, Topoban, Tetul Tola, Bogura-5800', 'C/O- M A Majid, Topoban, Tetul Tola, Bogura-5800', 'Private Service', 'AGM', '', '01911213227', 'morshed.kabir@gmail com', '1992', '1993', 2023, '', '', 'M00001.jpg', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `Serial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `DateM` varchar(100) NOT NULL,
  `CategoryM` varchar(150) NOT NULL,
  `Mobile` varchar(100) NOT NULL,
  `SlipAmount` varchar(100) NOT NULL,
  `GuestCount` varchar(300) DEFAULT NULL,
  `SlipNo` varchar(300) DEFAULT NULL,
  `DipositDate` varchar(200) DEFAULT NULL,
  `SlipImage` varchar(300) DEFAULT NULL,
  `Comments` varchar(150) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `YearM` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`Serial`, `id`, `DateM`, `CategoryM`, `Mobile`, `SlipAmount`, `GuestCount`, `SlipNo`, `DipositDate`, `SlipImage`, `Comments`, `status`, `YearM`) VALUES
(1, 432, '24-03-2020 07:36:36pm', 'DDM', '01912827857', '5000', '1', '68675646', '2020-03-05', '68675646_01912827857_1585056996.png', '', 1, 2018),
(2, 430, '24-03-2020 07:42:45pm', 'Member', '01912825857', '7000', '2', '68675647', '2020-03-18', '68675647_01912825857_1585057365.JPG', '', 1, 2020),
(3, 429, '24-03-2020 08:37:18pm', 'Member', '019100027857', '5000', '0', '68674445647', '2020-03-17', '68674445647_01912827857_1585060638.jpg', '', 1, 2020),
(5, 430, '24-03-2020 08:37:18pm', 'GDM', '01912827857', '5000', '0', '6867444445647', '2020-03-17', '68674445647_01912827857_1585060638.jpg', '', 1, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `Email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`Email`, `key`, `expDate`) VALUES
('saifuddink@ymail.com', '102895204250ca556e8f97296cb836ebeab89602d7', '2020-03-23 21:47:28'),
('mhossan2000@gmail.com', 'ebff77b6b6e2777cbb27ba51c0d798acb0035b7482', '2020-03-23 21:47:44'),
('milonmahi250311@gmail.com', 'dfa4d7315f04a69d0f3b33294c6451e3252e1dbe85', '2020-03-23 21:48:22'),
('myicche@gmail.com', 'bef50f152dbf8575bf75646517e22b922ec8c654cf', '2020-04-02 18:04:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activate`
--
ALTER TABLE `activate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `googlelogin`
--
ALTER TABLE `googlelogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lifemembers`
--
ALTER TABLE `lifemembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`Serial`),
  ADD UNIQUE KEY `SlipNo` (`SlipNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activate`
--
ALTER TABLE `activate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `googlelogin`
--
ALTER TABLE `googlelogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lifemembers`
--
ALTER TABLE `lifemembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
