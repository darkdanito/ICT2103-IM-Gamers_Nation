-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2015 at 10:01 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamernationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `UserID` varchar(255) NOT NULL DEFAULT '',
  `Total_Expenditure` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `GameID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Publisher` varchar(255) DEFAULT NULL,
  `Year_Released` int(11) DEFAULT NULL,
  `Platform` varchar(255) DEFAULT NULL,
  `Region` varchar(255) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `ImagePath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`GameID`, `Title`, `Publisher`, `Year_Released`, `Platform`, `Region`, `Price`, `ImagePath`) VALUES
(1, 'Diablo 3', 'Blizzard', 2015, 'PC', 'Asia', 100, 'Picture/diablo_3.jpg'),
(2, 'SC2', 'Blizzard', 2000, 'PC', 'US', 100, 'Picture/SC2_Heart_of_the_Swarm_cover.jpg'),
(3, 'Total War Rome', 'No idea', 2000, 'PC', 'Europe', 200, 'Picture/Total_War_Rome_II_cover.jpg'),
(4, 'Airline Tycoon', 'No idea too', 5021, 'XBOX', 'SG', 60000, 'Picture/Airline_Tycoon_2_Gold_Edition_Cover.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `imagetype`
--

CREATE TABLE `imagetype` (
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
-- Table structure for table `ordered_product`
--

CREATE TABLE `ordered_product` (
  `Supplier_UserID` varchar(255) NOT NULL DEFAULT '',
  `GameID` int(11) NOT NULL,
  `OrderID` varchar(255) NOT NULL DEFAULT '',
  `Buyer_UserID` varchar(255) NOT NULL DEFAULT '',
  `Quantity` int(11) DEFAULT NULL,
  `Price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_make`
--

CREATE TABLE `order_make` (
  `OrderID` varchar(255) NOT NULL,
  `Buyer_UserID` varchar(255) DEFAULT NULL,
  `Purchare_Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review_have`
--

CREATE TABLE `review_have` (
  `GameID` int(11) NOT NULL,
  `UserID` varchar(255) NOT NULL DEFAULT '',
  `Rating` float DEFAULT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `TimeStamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_have`
--

INSERT INTO `review_have` (`GameID`, `UserID`, `Rating`, `Comment`, `TimeStamp`) VALUES
(1, 'necrodiverTesting', 3.5, 'Gaaaaa', '2015-10-31 08:32:07'),
(1, 'necrodiverTesting2', 3, 'OMT', '2015-10-31 08:35:22'),
(1, 'necrodiverTesting3', 0, 'hmmm', '2015-10-31 08:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `UserID` varchar(255) NOT NULL DEFAULT '',
  `Total_Sales` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`UserID`, `Total_Sales`) VALUES
('necrodiverTesting', 102700);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_own_game`
--

CREATE TABLE `supplier_own_game` (
  `Supplier_UserID` varchar(255) NOT NULL DEFAULT '',
  `GameID` int(11) NOT NULL,
  `Stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_own_game`
--

INSERT INTO `supplier_own_game` (`Supplier_UserID`, `GameID`, `Stock`) VALUES
('necrodiverTesting', 1, 5),
('necrodiverTesting', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` varchar(255) NOT NULL,
  `Hashed_Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Salt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Hashed_Password`, `Email`, `Salt`) VALUES
('necrodiver', '3587ed34811992df70eaa554448bdb3684efd8ed8353a2644f27f3e44889ecd2', 'mehmeh@gmail.com', '9c914132540914a5c34c807d'),
('necrodiverTesting', 'a3c69166757134256ac5b9ea63bc9900fe80698f283e122db12327b86402852a', 'darkdanito@hotmail.com', '25cbdda0f4273d4a3a683522'),
('necrodiverTesting2', '3c02876333e088bcbefbc741a73b07157dd0bc9ae9088d3e5886501ce66c8f1a', 'sadasdas@erewrw.com', 'd54c6968645e7d48b6da60fb'),
('necrodiverTesting3', '8686cce505624e4e1e46e89ccca9fbbe3bce4120ac5fa5889d5625a03cdf5fe7', 'assdasda@gdffere.com', '1a98e3076ca04a13a0afabbc'),
('pewpewbeam', '694884e11e14a6650802a048ac8751843555819e5f00927737169b991f82dd5e', 'sadsadas@hotmail.com', 'b66f907425b6549db70ba157');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`GameID`),
  ADD UNIQUE KEY `GameID` (`GameID`);

--
-- Indexes for table `imagetype`
--
ALTER TABLE `imagetype`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `ordered_product`
--
ALTER TABLE `ordered_product`
  ADD PRIMARY KEY (`Supplier_UserID`,`GameID`,`OrderID`,`Buyer_UserID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `Buyer_UserID` (`Buyer_UserID`);

--
-- Indexes for table `order_make`
--
ALTER TABLE `order_make`
  ADD PRIMARY KEY (`OrderID`),
  ADD UNIQUE KEY `OrderID` (`OrderID`),
  ADD KEY `Buyer_UserID` (`Buyer_UserID`);

--
-- Indexes for table `review_have`
--
ALTER TABLE `review_have`
  ADD PRIMARY KEY (`GameID`,`UserID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `supplier_own_game`
--
ALTER TABLE `supplier_own_game`
  ADD PRIMARY KEY (`Supplier_UserID`,`GameID`),
  ADD KEY `GameID` (`GameID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `ordered_product`
--
ALTER TABLE `ordered_product`
  ADD CONSTRAINT `ordered_product_ibfk_1` FOREIGN KEY (`Supplier_UserID`,`GameID`) REFERENCES `supplier_own_game` (`Supplier_UserID`, `GameID`);

--
-- Constraints for table `order_make`
--
ALTER TABLE `order_make`
  ADD CONSTRAINT `order_make_ibfk_1` FOREIGN KEY (`Buyer_UserID`) REFERENCES `buyer` (`UserID`) ON DELETE NO ACTION;

--
-- Constraints for table `review_have`
--
ALTER TABLE `review_have`
  ADD CONSTRAINT `review_have_ibfk_1` FOREIGN KEY (`GameID`) REFERENCES `game` (`GameID`) ON DELETE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `supplier_own_game`
--
ALTER TABLE `supplier_own_game`
  ADD CONSTRAINT `supplier_own_game_ibfk_1` FOREIGN KEY (`Supplier_UserID`) REFERENCES `supplier` (`UserID`),
  ADD CONSTRAINT `supplier_own_game_ibfk_2` FOREIGN KEY (`GameID`) REFERENCES `game` (`GameID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
