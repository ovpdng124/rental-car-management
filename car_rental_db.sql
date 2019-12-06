-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 08:10 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `carRegNo` varchar(25) NOT NULL,
  `category` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dailyRate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`carRegNo`, `category`, `brand`, `dailyRate`) VALUES
('BB2222B', 'car', 'TOYOTA ALTIS 1.6L', '99.99'),
('GA5555E', 'truck', 'NISSAN CABSTAR 3.0L', '89.72'),
('GA6666F', 'van', 'OPEL COMBO 1.6L', '65.98'),
('SBA1111A', 'car', 'NISSAN SUNNY 1.6L', '99.99'),
('SBC3333C', 'car', 'HONDA CIVIC 1.8L', '99.99');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `discount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `customerName`, `address`, `phone`, `discount`) VALUES
(1, 'Ông Văn Phát', '324 Hà Huy Tập - Đà Nẵng', 905671240, '25.23'),
(2, 'Nguyễn Minh Nhật', '93 Nguyễn Thiện Kế - Đà Nẵng', 905731983, '22.43'),
(3, 'Nguyễn Duy Bảo', '384 Trần Cao Vân - Đà Nẵng', 902998309, '31.93'),
(4, 'Nguyễn Nhật Thiên', '77 Dũng Sĩ Thanh Khê - Đà Nẵng', 911873292, '11.36'),
(5, 'Nguyễn Kim Oanh', '163 Cần Giuộc - Đà Nẵng', 706277893, '18.93');

-- --------------------------------------------------------

--
-- Table structure for table `rentalrecords`
--

CREATE TABLE `rentalrecords` (
  `rentalID` int(11) NOT NULL,
  `carRegNo` varchar(25) DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `lastUpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentalrecords`
--

INSERT INTO `rentalrecords` (`rentalID`, `carRegNo`, `customerID`, `startDate`, `endDate`, `lastUpdate`) VALUES
(39, 'SBC3333C', 1, '2019-12-06', '2019-12-14', '2019-12-14'),
(40, 'GA5555E', 2, '2019-12-06', '2019-12-11', '2019-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`carRegNo`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `rentalrecords`
--
ALTER TABLE `rentalrecords`
  ADD PRIMARY KEY (`rentalID`),
  ADD KEY `carRegNo` (`carRegNo`),
  ADD KEY `customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rentalrecords`
--
ALTER TABLE `rentalrecords`
  MODIFY `rentalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentalrecords`
--
ALTER TABLE `rentalrecords`
  ADD CONSTRAINT `rentalrecords_ibfk_1` FOREIGN KEY (`carRegNo`) REFERENCES `cars` (`carRegNo`),
  ADD CONSTRAINT `rentalrecords_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
