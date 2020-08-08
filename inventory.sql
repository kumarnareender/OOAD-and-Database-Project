-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2018 at 09:35 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `carno` int(10) NOT NULL,
  `model` varchar(50) NOT NULL,
  `carname` varchar(50) NOT NULL,
  `cprice` int(10) NOT NULL,
  `qntty` int(4) NOT NULL,
  `year` int(10) NOT NULL,
  `makeid` int(10) NOT NULL,
  PRIMARY KEY (`carno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carno`, `model`, `carname`, `cprice`, `qntty`, `year`, `makeid`) VALUES
(1, 'A_45', 'Mercedes-AMG', 70000, 2, 2017, 10),
(2, 'BMW_F30', 'BMW Convertible 4-doors', 80000, 7, 2012, 3),
(3, 'BMW_F32', 'Compact luxury car', 110000, 2, 2016, 3),
(4, 'BMW_F34', 'BMW Gran_Turismo', 10000, 3, 2011, 3),
(5, 'C_43', 'Mercedes-AMG', 100000, 0, 2019, 10),
(6, 'dawn_2016', 'Rolls-Royce', 220000, 1, 2016, 13),
(7, 'GLA SUV', 'Mercedes-Benz', 34000, 10, 2017, 10),
(8, 'GLA-Class(X156)', 'Mercedes-Benz', 30000, 5, 2018, 10),
(9, 'GLA45_AMG', 'Mercedes-Benz', 60000, 3, 2019, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `email` varchar(50) NOT NULL,
  `compid` int(50) NOT NULL,
  `carno` int(10) NOT NULL,
  `qntty` int(10) NOT NULL,
  `totalamount` int(15) NOT NULL,
  `addingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`,`compid`,`carno`),
  KEY `compid` (`compid`),
  KEY `carno` (`carno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`email`, `compid`, `carno`, `qntty`, `totalamount`, `addingdate`) VALUES
('k163977@nu.edu.pk', 3, 2, 2, 160000, '2018-11-30 19:40:50'),
('k163977@nu.edu.pk', 10, 5, 3, 300000, '2018-12-01 10:14:03'),
('k163977@nu.edu.pk', 13, 6, 1, 220000, '2018-11-30 19:39:12'),
('k164008@nu.edu.pk', 3, 2, 1, 80000, '2018-12-01 20:46:32'),
('k164008@nu.edu.pk', 3, 4, 2, 20000, '2018-12-01 16:53:29'),
('k164008@nu.edu.pk', 10, 1, 1, 70000, '2018-12-01 20:47:46'),
('k164008@nu.edu.pk', 10, 5, 1, 100000, '2018-12-01 16:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `compid` int(10) NOT NULL AUTO_INCREMENT,
  `compname` varchar(50) NOT NULL,
  `createdate` int(50) NOT NULL,
  PRIMARY KEY (`compid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`compid`, `compname`, `createdate`) VALUES
(1, 'Audi', 1909),
(2, 'Aston Martin', 1914),
(3, 'BMW', 1912),
(4, 'Cadillac', 1902),
(5, 'Chevrolet', 1911),
(6, ' Datsun', 1931),
(7, 'Ferrari', 1947),
(8, 'Ford', 1903),
(9, 'Honda', 1941),
(10, 'Mercedes', 1886),
(11, 'Nissan', 1928),
(12, 'Porsche', 1931),
(13, 'Rolls-Royce', 1906),
(14, 'Toyota', 1937),
(15, 'Volkswagen', 1937);

-- --------------------------------------------------------

--
-- Table structure for table `company_off`
--

CREATE TABLE IF NOT EXISTS `company_off` (
  `compid` int(10) NOT NULL,
  `carno` int(10) NOT NULL,
  `createdate` varchar(50) NOT NULL,
  PRIMARY KEY (`compid`,`carno`),
  KEY `carno` (`carno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_off`
--

INSERT INTO `company_off` (`compid`, `carno`, `createdate`) VALUES
(3, 2, '2014'),
(3, 3, '2006'),
(3, 4, '1974'),
(10, 1, '1996'),
(10, 5, '1998'),
(10, 7, '2012'),
(10, 8, '1885'),
(10, 9, '1978'),
(13, 6, '1982');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `compid` int(10) NOT NULL,
  `carmodel` varchar(50) NOT NULL,
  `amount` bigint(50) NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`compid`,`carmodel`),
  KEY `compid` (`compid`),
  KEY `carmodel` (`carmodel`),
  KEY `carmodel_2` (`carmodel`),
  KEY `compid_2` (`compid`),
  KEY `compid_3` (`compid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `phone`, `password`) VALUES
('Hammad', 'ham.ali@gmail.com', '0212254668', 'b48e955718403d8afa81a5abe6066fc9'),
('Abdul Rehman', 'k163977@nu.edu.pk', '12355552222', '912ec803b2ce49e4a541068d495ab570'),
('Nareender Kumar', 'k164008@nu.edu.pk', '03325566335', '25f9e794323b453885f5181f1b624d0b');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_4` FOREIGN KEY (`carno`) REFERENCES `car` (`carno`),
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`compid`) REFERENCES `company` (`compid`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `company_off`
--
ALTER TABLE `company_off`
  ADD CONSTRAINT `company_off_ibfk_2` FOREIGN KEY (`carno`) REFERENCES `car` (`carno`),
  ADD CONSTRAINT `company_off_ibfk_1` FOREIGN KEY (`compid`) REFERENCES `company` (`compid`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`compid`) REFERENCES `company` (`compid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
