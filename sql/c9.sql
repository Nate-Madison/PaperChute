-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 06:27 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c9`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `customerID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneNumber` varchar(12) NOT NULL,
  `affliation` varchar(50) NOT NULL,
  `user` varchar(96) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`customerID`, `firstName`, `lastName`, `age`, `gender`, `email`, `address`, `phoneNumber`, `affliation`, `user`) VALUES
(1, 'Alex', 'Alex', '78', 'male', 'email@example.com', '179 Street Rd', '898-898-8989', 'individual', 'ca6945bb1044d1b5b09b3feb4da76b5119f492aff3056841668ec59886b570cb1531822466c6542b62e0893e71b63664'),
(3, 'Dillon', 'Fancher', '16', 'male', 'red@red.red', 'red redstreet', '333-333-3313', 'individual', 'af8e94738cb7c0fcd89f8bfa8e79a8cd8163f512cb66711a9c80a3fffb7cd94b4d45618a9378cd82a77870fd1c3d731f'),
(8, 'Nate', 'Madison', '15', 'male', 'email@example.com', '179 Allen Ave. Jackson TN', '999-999-9999', 'individual', 'b3086f90df1a3eadb5ae3ed135e6a32e4aa5ffca6bc14c249822f8b7be03c4cb95193659429e898e4f473eec94a51800');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `employeeID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phoneNumber` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`employeeID`, `firstName`, `lastName`, `age`, `gender`, `phoneNumber`, `email`) VALUES
(1, 'Resdartov', 'Kroustinski', '47', 'Male', '111-111-2123', 'RKrousti@paperchute.com'),
(2, 'Henry', 'Carthargic', '23', 'Other', '111-111-3412', 'HCarth@paperchute.com'),
(3, 'Reschanskov', 'Ivanov', '32', 'Male', '111-111-2343', 'RIvan@paperchute.com'),
(4, 'Helga', 'Kroustinski', '35', 'Female', '111-111-9465', 'HKrousti@paperchute.com'),
(5, 'Reeda', 'Reeves', '57', 'Female', '111-111-7305', 'RReeve@paperchute.com'),
(6, 'Red', 'Reeves', '27', 'Male', '111-111-9346', 'RReeves@paperchute.com'),
(7, 'Robert', 'Dew', '38', 'Male', '111-111-0234', 'RDew@paperchute.com'),
(8, 'Travis', 'Czechovich', '21', 'Male', '111-111-3496', 'TCzech@paperchute.com'),
(9, 'Emily', 'Redford', '23', 'Female', '111-111-5207', 'ERed@paperchute.com'),
(10, 'Henson', 'Surface', '43', 'Male', '111-111-3456', 'RSurf@paperchute.com'),
(11, 'Emalgia', 'Creed', '32', 'Female', '111-111-8048', 'ECree@paperchute.com');

-- --------------------------------------------------------

--
-- Table structure for table `PaperOrder`
--

CREATE TABLE IF NOT EXISTS `PaperOrder` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `shipping` varchar(50) NOT NULL,
  `user` varchar(96) NOT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `quantity` (`quantity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `PaperOrder`
--

INSERT INTO `PaperOrder` (`OrderID`, `firstName`, `lastName`, `email`, `productName`, `quantity`, `weight`, `shipping`, `user`) VALUES
(13, 'Alex', 'Alex', 'email@example.com', 'Paper ANSI A - In Reams', '12', '10lb', '179 Street Rd.', 'ca6945bb1044d1b5b09b3feb4da76b5119f492aff3056841668ec59886b570cb1531822466c6542b62e0893e71b63664'),
(14, 'Alex', 'Alex', 'email@example.com', 'Metal Pencil - Individual', '12', '4oz', '179 Street Rd.', 'ca6945bb1044d1b5b09b3feb4da76b5119f492aff3056841668ec59886b570cb1531822466c6542b62e0893e71b63664'),
(15, 'Dillon', 'Fancher', 'red@red.red', 'Paper ANSI A - In Reams', '4', '10lb', 'red redstreet', 'af8e94738cb7c0fcd89f8bfa8e79a8cd8163f512cb66711a9c80a3fffb7cd94b4d45618a9378cd82a77870fd1c3d731f'),
(21, 'Nate', 'Madison', 'email@example.com', 'Mechanical Pencils - 12 Package', '2', '2oz', '179 Allen Ave. Jackson TN', 'b3086f90df1a3eadb5ae3ed135e6a32e4aa5ffca6bc14c249822f8b7be03c4cb95193659429e898e4f473eec94a51800');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE IF NOT EXISTS `Product` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `pricePerItem` varchar(50) NOT NULL,
  `salesTax` varchar(50) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`productID`, `name`, `stock`, `weight`, `pricePerItem`, `salesTax`) VALUES
(1, 'Paper ANSI A - In Reams', 2300, '10lb', '25.99', '0.07'),
(2, 'Mechanical Pencils - 12 Package', 12000, '2oz', '2.99', '0.07'),
(3, 'Wooden Pencil - 30 Package', 12000, '1.5oz', '5.69', '0.07'),
(4, 'Metal Pencil - Individual', 10000, '4oz', '1.99', '0.07'),
(5, 'Pen - 15 Package', 12000, '2oz', '5.69', '0.07'),
(6, 'Space Pen - Individual', 1000, '4oz', '24.99', '0.07'),
(7, 'Cardboard ANSI A - In Bales (250)', 3000, '125lb', '19.99', '0.07'),
(8, 'Cardboard ANSI B - In Bales (250)', 3000, '150lb', '24.99', '0.07'),
(9, 'Cardboard ANSI C - In Bales (250)', 3000, '175lb', '29.99', '0.07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
