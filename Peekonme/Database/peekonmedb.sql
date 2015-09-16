-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2014 at 03:10 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

DROP SCHEMA `peekonmedb`;
CREATE SCHEMA `peekonmedb`;
USE `peekonmedb`;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `peekonmedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `imagetype`
--

CREATE TABLE IF NOT EXISTS `imagetype` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagetype`
--

INSERT INTO `imagetype` (`typeID`, `typeName`) VALUES
(0, 'PUBLIC'),
(1, 'PRIVATE');

-- --------------------------------------------------------

--
-- Table structure for table `userimages`
--

CREATE TABLE IF NOT EXISTS `userimages` (
  `user_name` varchar(50) DEFAULT NULL,
	`image_ID` int(11) NOT NULL,
  `imageName` varchar(50) NOT NULL,
  `type_ID` int(11) DEFAULT NULL,
  `imagePath` varchar(500) NOT NULL,
  `imageDesc` varchar(100) DEFAULT NULL,
  `imageType` varchar(10) DEFAULT NULL,
  `imageSize` bigint DEFAULT NULL,
  `imageData` mediumblob DEFAULT NULL,
  `imageCreated` datetime DEFAULT NULL,
  `imageLikes` bigint DEFAULT NULL
  
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `userimages`
--

INSERT INTO `userimages` (`user_name`, `image_ID`, `imageName`, `type_ID`, `imagePath`, `imageDesc`, `imageType`, `imageSize`, `imageData`, `imageCreated`, `imageLikes`) VALUES
('Hu0xing', 1, 'Hu01', 1, 'Picture/Public1.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('Hu0xing', 2, 'Hu02', 1, 'Picture/Public2.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('Hu0xing', 3, 'Hu03', 1, 'Picture/Public3.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('Hu0xing', 4, 'Hu04', 0, 'Picture/Private1.jpg', NULL, NULL, NULL, NULL, NULL, NULL),
('Hu0xing', 9, 'Hu05', 1, 'Picture/Public2.jpg', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userName` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `about` varchar(1000) DEFAULT NULL,
  `webpage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userName`, `name`, `email`, `password`, `salt`, `dob`, `about`, `webpage`) VALUES
('Hu0xing', 'Elson Ho', 'elson_ho@hotmail.com', '302e1e3333715c08a3f469bb3a2a4595919d1c80b78d66b244b560be1c1e7dd6', '31134410b999c79961bf4de0', '1992-08-29', 'Hello Im Elson from Singapore', 'www.hu0xing.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imagetype`
--
ALTER TABLE `imagetype`
 ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `userimages`
--
ALTER TABLE `userimages`
 ADD PRIMARY KEY (`image_ID`), ADD KEY `userImages` (`user_name`), ADD KEY `user_Images` (`type_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userimages`
--
ALTER TABLE `userimages`
MODIFY `image_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `userimages`
--
ALTER TABLE `userimages`
ADD CONSTRAINT `userimages_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `users` (`userName`),
ADD CONSTRAINT `userimages_ibfk_2` FOREIGN KEY (`type_ID`) REFERENCES `imagetype` (`typeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



select * from userimages;
select * from imagetype;
select * from users;

