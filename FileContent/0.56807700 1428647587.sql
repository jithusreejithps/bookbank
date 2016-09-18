-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2015 at 07:09 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookmonger`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `BatchCode` varchar(15) NOT NULL,
  `pgmId` varchar(10) DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `e_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`BatchCode`),
  KEY `pgmId` (`pgmId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookassignment`
--

CREATE TABLE IF NOT EXISTS `bookassignment` (
  `ISBN` varchar(20) DEFAULT NULL,
  `Cid` varchar(10) DEFAULT NULL,
  `NoOfCopies` int(11) DEFAULT NULL,
  KEY `ISBN` (`ISBN`),
  KEY `Cid` (`Cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookbanker`
--

CREATE TABLE IF NOT EXISTS `bookbanker` (
  `RegNo` varchar(10) DEFAULT NULL,
  `BatchCode` varchar(15) DEFAULT NULL,
  KEY `RegNo` (`RegNo`),
  KEY `BatchCode` (`BatchCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookbanking`
--

CREATE TABLE IF NOT EXISTS `bookbanking` (
  `BookNum` varchar(20) DEFAULT NULL,
  `RegNo` varchar(10) DEFAULT NULL,
  `SemId` varchar(20) DEFAULT NULL,
  `iDate` date DEFAULT NULL,
  `rDate` date DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL,
  KEY `BookNum` (`BookNum`),
  KEY `RegNo` (`RegNo`),
  KEY `SemId` (`SemId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bookcopies`
--

CREATE TABLE IF NOT EXISTS `bookcopies` (
  `BookNum` varchar(20) NOT NULL,
  `ISBN` varchar(20) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`BookNum`),
  KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `ISBN` varchar(20) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Auther` varchar(50) DEFAULT NULL,
  `Edition` int(11) DEFAULT NULL,
  `Content` varchar(30) DEFAULT NULL,
  `NoOfCopies` int(11) DEFAULT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `Title`, `Auther`, `Edition`, `Content`, `NoOfCopies`) VALUES
('B101', 'ABC', 'XYZ', 4, 'E:/', 44),
('B102', 'ABC', 'XYZ', 4, 'E:/', 44);

-- --------------------------------------------------------

--
-- Table structure for table `booktxn`
--

CREATE TABLE IF NOT EXISTS `booktxn` (
  `ISBN` varchar(20) DEFAULT NULL,
  `dop` date DEFAULT NULL,
  `NoOfCopies` int(11) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `Cid` varchar(10) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `DeptId` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Cid`),
  KEY `DeptId` (`DeptId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `DeptId` varchar(10) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`DeptId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `Fid` varchar(10) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `DeptId` varchar(10) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Fid`),
  KEY `DeptId` (`DeptId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE IF NOT EXISTS `fine` (
  `RegNo` varchar(10) DEFAULT NULL,
  `SemId` varchar(20) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Details` varchar(50) DEFAULT NULL,
  KEY `RegNo` (`RegNo`),
  KEY `SemId` (`SemId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `PgmId` varchar(10) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `DeptId` varchar(10) DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  PRIMARY KEY (`PgmId`),
  KEY `DeptId` (`DeptId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sembooks`
--

CREATE TABLE IF NOT EXISTS `sembooks` (
  `SemId` varchar(20) DEFAULT NULL,
  `Cid` varchar(10) DEFAULT NULL,
  KEY `SemId` (`SemId`),
  KEY `Cid` (`Cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `SemId` varchar(20) NOT NULL,
  `BatchCode` varchar(15) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`SemId`),
  KEY `BatchCode` (`BatchCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `RegNo` varchar(10) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `SemId` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`RegNo`),
  KEY `SemId` (`SemId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`pgmId`) REFERENCES `program` (`PgmId`);

--
-- Constraints for table `bookassignment`
--
ALTER TABLE `bookassignment`
  ADD CONSTRAINT `bookassignment_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `bookassignment_ibfk_2` FOREIGN KEY (`Cid`) REFERENCES `course` (`Cid`);

--
-- Constraints for table `bookbanker`
--
ALTER TABLE `bookbanker`
  ADD CONSTRAINT `bookbanker_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `student` (`RegNo`),
  ADD CONSTRAINT `bookbanker_ibfk_2` FOREIGN KEY (`BatchCode`) REFERENCES `batch` (`BatchCode`);

--
-- Constraints for table `bookbanking`
--
ALTER TABLE `bookbanking`
  ADD CONSTRAINT `bookbanking_ibfk_1` FOREIGN KEY (`BookNum`) REFERENCES `bookcopies` (`BookNum`),
  ADD CONSTRAINT `bookbanking_ibfk_2` FOREIGN KEY (`RegNo`) REFERENCES `student` (`RegNo`),
  ADD CONSTRAINT `bookbanking_ibfk_3` FOREIGN KEY (`SemId`) REFERENCES `semester` (`SemId`);

--
-- Constraints for table `bookcopies`
--
ALTER TABLE `bookcopies`
  ADD CONSTRAINT `bookcopies_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`);

--
-- Constraints for table `booktxn`
--
ALTER TABLE `booktxn`
  ADD CONSTRAINT `booktxn_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`DeptId`) REFERENCES `department` (`DeptId`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`DeptId`) REFERENCES `department` (`DeptId`);

--
-- Constraints for table `fine`
--
ALTER TABLE `fine`
  ADD CONSTRAINT `fine_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `student` (`RegNo`),
  ADD CONSTRAINT `fine_ibfk_2` FOREIGN KEY (`SemId`) REFERENCES `semester` (`SemId`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`DeptId`) REFERENCES `department` (`DeptId`);

--
-- Constraints for table `sembooks`
--
ALTER TABLE `sembooks`
  ADD CONSTRAINT `sembooks_ibfk_1` FOREIGN KEY (`SemId`) REFERENCES `semester` (`SemId`),
  ADD CONSTRAINT `sembooks_ibfk_2` FOREIGN KEY (`Cid`) REFERENCES `course` (`Cid`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`BatchCode`) REFERENCES `batch` (`BatchCode`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`SemId`) REFERENCES `semester` (`SemId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
