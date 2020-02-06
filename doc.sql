-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 ม.ค. 2020 เมื่อ 03:35 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doc`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `hello`
--

CREATE TABLE `hello` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `data` varchar(255) NOT NULL,
  `downloadurl` varchar(255) NOT NULL,
  `postby` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- dump ตาราง `hello`
--

INSERT INTO `hello` (`id`, `name`, `comment`, `data`, `downloadurl`, `postby`) VALUES
(0, 'bbhn', 'test', 'บุคคลทั่วไป', 'old.jpg', 'admin');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `member`
--

CREATE TABLE `member` (
  `UserID` int(3) UNSIGNED ZEROFILL NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `LoginStatus` int(1) NOT NULL,
  `LastUpdate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- dump ตาราง `member`
--

INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `LoginStatus`, `LastUpdate`) VALUES
(001, 'admin', '123456', 'Admin', 0, '0000-00-00 00:00:00'),
(002, 'boyphongsakorn', '123456', 'Admin', 0, '0000-00-00 00:00:00'),
(003, 'eiei', 'eiei', 'eiei', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `settings`
--

CREATE TABLE `settings` (
  `adminid` varchar(255) NOT NULL,
  `logourl` varchar(255) NOT NULL,
  `headurl` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `titlecolor` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- dump ตาราง `settings`
--

INSERT INTO `settings` (`adminid`, `logourl`, `headurl`, `title`, `titlecolor`) VALUES
('001', 'kktech_logo.png', 'http://investinbelarus.by/kcfinder/upload/images/atos-ascent-How-to-simplify-IT-complexity-to-enable-innovation.jpg', 'ระบบเอกสาร', '#ff0000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hello`
--
ALTER TABLE `hello`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `UserID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
