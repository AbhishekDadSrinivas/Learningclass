-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learningclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `aname` varchar(40) DEFAULT NULL,
  `sdob` date NOT NULL,
  `ldob` date NOT NULL,
  `tid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`aid`, `aname`, `sdob`, `ldob`, `tid`) VALUES
(1, 'ASIGN1', '2021-05-05', '2021-12-05', 2),
(4, 'ASIGN2', '2021-08-28', '2021-09-10', 3),
(5, 'ASIGN3', '2021-09-20', '2021-09-30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `sfname` varchar(30) NOT NULL,
  `slname` varchar(30) NOT NULL,
  `pno` bigint(15) NOT NULL,
  `semailid` varchar(40) NOT NULL,
  `sgender` varchar(15) NOT NULL,
  `sdob` date NOT NULL,
  `scrtpswd` varchar(20) NOT NULL,
  `sconpswd` varchar(20) NOT NULL,
  `tid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sfname`, `slname`, `pno`, `semailid`, `sgender`, `sdob`, `scrtpswd`, `sconpswd`, `tid`) VALUES
(8, 'kureshi', 'c', 1593578526, 'kureshi1@gmail.com', 'male', '2000-05-05', 'kureshi123', 'kureshi123', 2),
(10, 'Girish', 'Kumar', 7539514568, 'girish1@gmail.com', 'male', '2000-05-06', 'girish123', 'girish123', 2),
(11, 'Mahesh', 'Kumar', 9513578256, 'mahe12@gmail.com', 'male', '2000-02-06', 'mahesh123', 'mahesh123', 0),
(12, 'Mahesh', 'Kumar', 9513578256, 'mahe12@gmail.com', 'male', '2000-02-06', 'mahesh123', 'mahesh123', 4),
(13, 'Mahesh', 'Kumar', 9513578256, 'mahe12@gmail.com', 'male', '2000-02-06', 'mahesh123', 'mahesh123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `tfname` varchar(15) NOT NULL,
  `tlname` varchar(15) NOT NULL,
  `tpno` bigint(20) NOT NULL,
  `temailid` varchar(30) NOT NULL,
  `teachingsub` varchar(40) NOT NULL,
  `tgender` varchar(15) NOT NULL,
  `tdob` date NOT NULL,
  `tcrtpswd` varchar(20) NOT NULL,
  `tconpswd` varchar(20) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `tfname`, `tlname`, `tpno`, `temailid`, `teachingsub`, `tgender`, `tdob`, `tcrtpswd`, `tconpswd`) VALUES
(2, 'Harish', 'Kumar', 8527419635, 'harish1@gmail.com', 'Social Science', 'male', '1990-02-04', 'harish123', 'harish123'),
(3, 'Manoj', 'Kumar', 1234567895, 'manoj2@gmail.com', 'Computer science', 'male', '1992-08-08', 'manoj123', 'manoj123'),
(4, 'Tejaswini', '.S', 7896541235, 'tejas3@gmail.com', 'Biology', 'female', '1990-05-05', 'tejas123', 'tejas123');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `testid` int(11) NOT NULL AUTO_INCREMENT,
  `testname` varchar(50) DEFAULT NULL,
  `edob` date DEFAULT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`testid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`testid`, `testname`, `edob`, `tid`) VALUES
(1, 'TEST1', '2021-02-05', 2),
(2, 'TEST2', '2021-09-25', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
