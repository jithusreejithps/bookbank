-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2015 at 03:26 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`BatchCode`, `pgmId`, `s_date`, `e_date`, `status`) VALUES
('BLISc1415', 'P31', '2014-08-24', '2015-09-20', 'Pursuing'),
('MCA1215', 'P21', '2012-08-24', '2015-09-20', 'Pursuing'),
('MCA1316', 'P21', '2013-08-24', '2016-09-20', 'Pursuing'),
('MLISc1415', 'P31', '2014-08-24', '2015-09-20', 'Pursuing'),
('MSW1315', 'P11', '2013-08-24', '2015-09-20', 'Pursuing'),
('MSW1416', 'P11', '2014-08-24', '2016-09-20', 'Pursuing');

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

--
-- Dumping data for table `bookassignment`
--

INSERT INTO `bookassignment` (`ISBN`, `Cid`, `NoOfCopies`) VALUES
('12345', 'C211', 1),
('12345', 'C212', 2),
('12347', 'C213', 2),
('12347', 'C214', 2),
('12348', 'C215', 3),
('12348', 'C216', 3),
('12349', 'C217', 3),
('12349', 'C218', 1),
('12350', 'C219', 2),
('12350', 'C2110', 3),
('12351', 'C2111', 3),
('12351', 'C2112', 3),
('12352', 'C2113', 5),
('12352', 'C2114', 4),
('12353', 'C2115', 1),
('12353', 'C2116', 1),
('12354', 'C2117', 1),
('12354', 'C2118', 1),
('12354', 'C2119', 2),
('12353', 'C2120', 2),
('12354', 'C2121', 2),
('12355', 'C2122', 2),
('12356', 'C2123', 2),
('12355', 'C2124', 2),
('12356', 'C2125', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bookbanker`
--

CREATE TABLE IF NOT EXISTS `bookbanker` (
  `RegNo` varchar(10) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  KEY `RegNo` (`RegNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookbanker`
--

INSERT INTO `bookbanker` (`RegNo`, `from_date`, `to_date`) VALUES
('MCA401', '2012-08-24', '2015-05-25'),
('MCA402', '2012-08-24', '2015-05-25'),
('MCA501', '2013-08-24', '2016-05-25'),
('MCA502', '2013-08-24', '2016-05-25'),
('MCA601', '2014-08-24', '2017-05-25'),
('MCA602', '2014-08-24', '2017-05-25');

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

--
-- Dumping data for table `bookbanking`
--

INSERT INTO `bookbanking` (`BookNum`, `RegNo`, `SemId`, `iDate`, `rDate`, `Remarks`) VALUES
('12345B1', 'MCA401', 'MCA1215S5', '2015-04-02', NULL, 'Nothing'),
('12345B2', 'MCA402', 'MCA1215S5', '2015-04-02', NULL, 'Nothing'),
('12346B1', 'MCA403', 'MCA1215S5', '2015-04-02', NULL, 'Nothing'),
('12348B1', 'MCA404', 'MCA1215S5', '2015-04-02', NULL, 'Nothing'),
('12346B2', 'MCA405', 'MCA1215S5', '2015-04-02', NULL, 'Nothing'),
('12348B3', 'MCA406', 'MCA1215S5', '2015-04-02', NULL, 'Nothing'),
('12349B1', 'MCA407', 'MCA1215S5', '2015-04-02', NULL, 'Nothing'),
('12350B1', 'MCA408', 'MCA1215S5', '2015-04-02', NULL, 'Nothing'),
('12350B1', 'MCA409', 'MCA1215S5', '2015-04-02', NULL, 'Nothing'),
('12349B2', 'MCA410', 'MCA1215S5', '2015-04-02', NULL, 'Nothing'),
('12351B3', 'MCA411', 'MCA1215S5', '2015-04-02', NULL, 'Nothing'),
('12347B1', 'MCA412', 'MCA1215S5', '2015-04-02', NULL, 'Nothing'),
('12350B1', 'MCA501', 'MCA1215S3', '2015-04-02', NULL, 'Nothing'),
('12351B2', 'MCA502', 'MCA1215S3', '2015-04-02', NULL, 'Nothing'),
('12351B3', 'MCA601', 'MCA1215S2', '2015-04-02', NULL, 'Nothing'),
('12351B2', 'MCA602', 'MCA1215S2', '2015-04-02', NULL, 'Nothing');

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

--
-- Dumping data for table `bookcopies`
--

INSERT INTO `bookcopies` (`BookNum`, `ISBN`, `Status`, `Remarks`) VALUES
('12345B1', '12345', 'Available', 'Nothing'),
('12345B2', '12345', 'Available', 'Nothing'),
('12345B3', '12345', 'Available', 'Nothing'),
('12346B1', '12346', 'Available', 'Nothing'),
('12346B2', '12346', 'Available', 'Nothing'),
('12347B1', '12347', 'Available', 'Nothing'),
('12347B2', '12347', 'Available', 'Nothing'),
('12348B1', '12348', 'Available', 'Nothing'),
('12348B2', '12348', 'Available', 'Nothing'),
('12348B3', '12348', 'Available', 'Nothing'),
('12349B1', '12349', 'Available', 'Nothing'),
('12349B2', '12349', 'Available', 'Nothing'),
('12350B1', '12350', 'Available', 'Nothing'),
('12350B2', '12350', 'Available', 'Nothing'),
('12350B3', '12350', 'Available', 'Nothing'),
('12351B1', '12351', 'Available', 'Nothing'),
('12351B2', '12351', 'Available', 'Nothing'),
('12351B3', '12351', 'Available', 'Nothing'),
('12352B1', '12352', 'Available', 'Nothing'),
('12353B1', '12353', 'Available', 'Nothing'),
('12353B2', '12353', 'Available', 'Nothing'),
('12353B3', '12353', 'Available', 'Nothing'),
('12354B1', '12354', 'Available', 'Nothing'),
('12354B2', '12354', 'Available', 'Nothing'),
('12355B1', '12355', 'Available', 'Nothing'),
('12355B2', '12355', 'Available', 'Nothing'),
('12355B3', '12355', 'Available', 'Nothing'),
('12356B1', '12356', 'Available', 'Nothing');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `ISBN` varchar(20) NOT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `Author` varchar(50) DEFAULT NULL,
  `Edition` int(11) DEFAULT NULL,
  `Content` varchar(100) DEFAULT NULL,
  `NoOfCopies` int(11) DEFAULT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `Title`, `Author`, `Edition`, `Content`, `NoOfCopies`) VALUES
('12345', 'Fundamentals of statistics', 'S.C.Gupta', 6, 'D:\\book.txt', 3),
('12346', 'Introduction to Probability and Statistics', 'Medenhall', 12, 'D:\\book.txt', 2),
('12347', 'Introduction to Mathematical Statistics', 'Robert V', 6, 'D:\\book.txt', 2),
('12348', 'Fundamentals of data structures', 'Ellis Horowitz and Sartaj Sahni', 4, 'D:\\book.txt', 3),
('12349', 'Fundamentals of computer algorithms', 'Ellis Horowitz', 3, 'D:\\book.txt', 2),
('12350', 'Data Structure using C & C++', 'prentice hall', 5, 'D:\\book.txt', 3),
('12351', 'Data Structures and program design', ' R. L Kruse', 5, 'D:\\book.txt', 3),
('12352', 'Advanced Microprocessors and Peripherals', 'A.K. Ray and   K.M. Bhurchand', 1, 'D:\\book.txt', 1),
('12353', 'Embedded Systems', 'Raj Kamal', 3, 'D:\\book.txt', 3),
('12354', 'The Intel Microprocessors 8086/8088', ' Barry B Brey', 4, 'D:\\book.txt', 2),
('12355', 'Microprocessor x86 Programming', 'K.R. Venugopal and Raj Kumar', 3, 'D:\\book.txt', 3),
('12356', 'Fundamentals of data structures', 'Ellis Horowitz and Sartaj Sahni', 5, 'D:\\book.txt', 1);

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

--
-- Dumping data for table `booktxn`
--

INSERT INTO `booktxn` (`ISBN`, `dop`, `NoOfCopies`, `Price`) VALUES
('12345', '2015-04-21', 5, 250),
('12346', '2015-03-21', 3, 300),
('12347', '2015-02-21', 4, 245),
('12351', '2015-01-21', 4, 500),
('12354', '2015-03-21', 6, 250);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `Cid` varchar(10) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `PgmId` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Cid`),
  KEY `PgmId` (`PgmId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Cid`, `Name`, `PgmId`) VALUES
('C211', 'Mathematical Foundations of Co', 'P21'),
('C2110', 'Object Oriented Programming wi', 'P21'),
('C2111', 'Java and Web Programming', 'P21'),
('C2112', 'Software Engineering', 'P21'),
('C2113', 'System Software', 'P21'),
('C2114', 'Data Base Management Systems', 'P21'),
('C2115', 'Data Communications', 'P21'),
('C2116', 'Operations Research', 'P21'),
('C2117', 'Computer Networks', 'P21'),
('C2118', 'Linux and Shell Programming', 'P21'),
('C2119', 'Object Oriented Modeling and D', 'P21'),
('C212', 'Digital Systems & Logic Design', 'P21'),
('C2120', 'Management Information System', 'P21'),
('C2121', 'Computer Security', 'P21'),
('C2122', 'Internet Technology and Distri', 'P21'),
('C2123', 'Computer Graphics', 'P21'),
('C2124', 'Data Mining', 'P21'),
('C2125', 'User Interface Design', 'P21'),
('C213', 'Computer Organization & Archit', 'P21'),
('C214', 'Principles of Management and A', 'P21'),
('C215', 'Structured Programming in C', 'P21'),
('C216', 'Probability and Statistics', 'P21'),
('C217', 'Data Structures and Analysis o', 'P21'),
('C218', 'Microprocessors and Embedded S', 'P21'),
('C219', 'Operating Systems', 'P21');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `DeptId` varchar(10) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`DeptId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DeptId`, `Name`) VALUES
('D1', 'Social Works'),
('D2', 'Computer Sciences'),
('D3', 'Library and Information Sciences');

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

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Fid`, `Name`, `DeptId`, `email`, `password`) VALUES
('F211', 'Mr. K Ramakrishnan', 'D2', 'ramakrishnan@rajagir', 'Ramakrishnan');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE IF NOT EXISTS `fine` (
  `RegNo` varchar(10) DEFAULT NULL,
  `SemId` varchar(20) NOT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Details` varchar(50) DEFAULT NULL,
  KEY `RegNo` (`RegNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`RegNo`, `SemId`, `Amount`, `Date`, `Details`) VALUES
('MCA401', '', 100, '2015-04-18', 'book has been lost and paid the fine'),
('MCA407', '', 300, '2015-01-06', 'book has been damaged '),
('MCA502', '', 120, '2015-02-24', 'late returning');

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

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`PgmId`, `Name`, `DeptId`, `Duration`) VALUES
('P11', 'Master of Social Works', 'D1', 4),
('P12', 'Bachelor of Social Works', 'D1', 6),
('P13', 'PGDAHS', 'D1', 2),
('P21', 'Master of Computer Application', 'D2', 6),
('P31', 'Master of Library and Informat', 'D3', 2),
('P32', 'Bachelor of Library and Inform', 'D3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `semcourse`
--

CREATE TABLE IF NOT EXISTS `semcourse` (
  `SemId` varchar(20) DEFAULT NULL,
  `Cid` varchar(10) DEFAULT NULL,
  KEY `SemId` (`SemId`),
  KEY `Cid` (`Cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semcourse`
--

INSERT INTO `semcourse` (`SemId`, `Cid`) VALUES
('MCA1215S1', 'C211'),
('MCA1215S1', 'C212'),
('MCA1215S1', 'C213'),
('MCA1215S1', 'C214'),
('MCA1215S1', 'C215'),
('MCA1215S2', 'C216'),
('MCA1215S2', 'C217'),
('MCA1215S2', 'C218'),
('MCA1215S2', 'C219'),
('MCA1215S2', 'C2110'),
('MCA1215S3', 'C2111'),
('MCA1215S3', 'C2112'),
('MCA1215S3', 'C2113'),
('MCA1215S3', 'C2114'),
('MCA1215S3', 'C2115'),
('MCA1215S4', 'C2116'),
('MCA1215S4', 'C2117'),
('MCA1215S4', 'C2118'),
('MCA1215S4', 'C2119'),
('MCA1215S4', 'C2120'),
('MCA1215S5', 'C2121'),
('MCA1215S5', 'C2122'),
('MCA1215S5', 'C2123'),
('MCA1215S5', 'C2124'),
('MCA1215S5', 'C2125');

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

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SemId`, `BatchCode`, `status`) VALUES
('BLISc1415S1', 'BLISc1415', 'Completed'),
('BLISc1415S2', 'BLISc1415', 'Pursuing'),
('MCA1215S1', 'MCA1215', 'Completed'),
('MCA1215S2', 'MCA1215', 'Completed'),
('MCA1215S3', 'MCA1215', 'Completed'),
('MCA1215S4', 'MCA1215', 'Completed'),
('MCA1215S5', 'MCA1215', 'Pursuing'),
('MCA1215S6', 'MCA1215', 'Scheduled'),
('MLISc1415S1', 'MLISc1415', 'Completed'),
('MLISc1415S2', 'MLISc1415', 'Pursuing'),
('MSW1315S1', 'MSW1315', 'Completed'),
('MSW1315S2', 'MSW1315', 'Completed'),
('MSW1315S3', 'MSW1315', 'Pursuing'),
('MSW1315S4', 'MSW1315', 'Scheduled'),
('MSW1416S1', 'MSW1416', 'Completed'),
('MSW1416S2', 'MSW1416', 'Pursuing'),
('MSW1416S3', 'MSW1416', 'Scheduled'),
('MSW1416S4', 'MSW1416', 'Scheduled');

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
-- Dumping data for table `student`
--

INSERT INTO `student` (`RegNo`, `Name`, `SemId`, `email`, `password`) VALUES
('MCA401', 'Amal Dev Sabu', 'MCA1215S5', 'amaldevsabu@gmail.com', 'MCA401'),
('MCA402', 'Anisha S', 'MCA1215S5', 'sanisha42@yahoo.com', 'MCA402'),
('MCA403', 'Anitta J Mukkumkal', 'MCA1215S5', 'anittamjose@gmail.com', 'MCA403'),
('MCA404', 'Anjali Thomas', 'MCA1215S5', 'anjalithomas6@gmail.com', 'MCA404'),
('MCA405', 'Anju Joseph', 'MCA1215S5', 'anjusdoc@gmail.com', 'MCA405'),
('MCA406', 'Arathi Raj', 'MCA1215S5', 'arathi.raj12@yahoo.com', 'MCA406'),
('MCA407', 'Arjun Gopi', 'MCA1215S5', 'arjunscache@gmail.com', 'MCA407'),
('MCA408', 'Arunima Siby', 'MCA1215S5', 'arunimasiby@gmail.com', 'MCA408'),
('MCA409', 'Asha Jacob', 'MCA1215S5', 'ashajacobhnl@gmail.com', 'MCA409'),
('MCA410', 'Aswathy S Pillai', 'MCA1215S5', 'spillai.aswathy12@gmail.com', 'MCA410'),
('MCA411', 'Azeez Rahman', 'MCA1215S5', 'azeezrahman5@gmail.com', 'MCA411'),
('MCA412', 'Chinnu Susan Joseph', 'MCA1215S5', 'chinnususan328@gmail.com', 'MCA412'),
('MCA501', 'ANJU MATHEW', 'MCA1215S2', 'anjumathewchennoth@gmail.com', 'MCA501'),
('MCA502', 'ANJU SHAJI', 'MCA1215S2', 'anjukaduthodil@gmail.com', 'MCA502'),
('MCA601', 'BOBAN M V', 'MCA1215S3', 'bobanmv0007@gmail.com', 'MCA601'),
('MCA602', 'CHRISTIE VARGHESE THOMAS', 'MCA1215S3', 'christievthomas@gmail.com', 'MCA602');

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
  ADD CONSTRAINT `bookbanker_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `student` (`RegNo`);

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
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`PgmId`) REFERENCES `program` (`PgmId`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`DeptId`) REFERENCES `department` (`DeptId`);

--
-- Constraints for table `fine`
--
ALTER TABLE `fine`
  ADD CONSTRAINT `fine_ibfk_1` FOREIGN KEY (`RegNo`) REFERENCES `student` (`RegNo`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `program_ibfk_1` FOREIGN KEY (`DeptId`) REFERENCES `department` (`DeptId`);

--
-- Constraints for table `semcourse`
--
ALTER TABLE `semcourse`
  ADD CONSTRAINT `semcourse_ibfk_1` FOREIGN KEY (`SemId`) REFERENCES `semester` (`SemId`),
  ADD CONSTRAINT `semcourse_ibfk_2` FOREIGN KEY (`Cid`) REFERENCES `course` (`Cid`);

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
