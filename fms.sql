-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 12, 2022 at 09:33 AM
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
-- Database: `fms`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `branchId` char(5) NOT NULL,
  `vBranch` varchar(25) NOT NULL,
  PRIMARY KEY (`branchId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchId`, `vBranch`) VALUES
('B0001', 'Head Office'),
('B0002', 'Transport'),
('B0003', 'Accounts'),
('B0004', 'IT'),
('B0005', 'Production');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` char(5) NOT NULL,
  `vCategory` varchar(25) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `vCategory`) VALUES
('C0001', 'Mini Bus'),
('C0002', 'Car'),
('C0003', 'Van'),
('C0004', 'Cab'),
('C0005', 'Lorry');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `cityId` char(5) NOT NULL,
  `cityName` varchar(100) NOT NULL,
  `districtId` char(5) DEFAULT NULL,
  PRIMARY KEY (`cityId`),
  KEY `districtId` (`districtId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityId`, `cityName`, `districtId`) VALUES
('C0001', 'Colombo01', 'D0001'),
('C0002', 'Colombo02', 'D0001'),
('C0003', 'Colombo03', 'D0001'),
('C0004', 'Colombo04', 'D0001'),
('C0005', 'Colombo05', 'D0001'),
('C0006', 'Colombo06', 'D0001'),
('C0007', 'Colombo07', 'D0001'),
('C0008', 'Colombo08', 'D0001'),
('C0009', 'Colombo09', 'D0001'),
('C0010', 'Colombo10', 'D0001'),
('C0011', 'Negombo', 'D0002'),
('C0012', 'Katana', 'D0002'),
('C0013', 'Biyagama', 'D0002'),
('C0014', 'Kandy', 'D0003'),
('C0015', 'Ampitiya', 'D0003'),
('C0016', 'Balana', 'D0003'),
('C0017', 'Anuradhapura', 'D0004'),
('C0018', 'Angamuwa', 'D0004'),
('C0019', 'Bogahawewa', 'D0004');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `colorId` char(5) NOT NULL,
  `vColor` varchar(25) NOT NULL,
  PRIMARY KEY (`colorId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`colorId`, `vColor`) VALUES
('C0001', 'White'),
('C0002', 'Black'),
('C0003', 'Red'),
('C0004', 'Blue'),
('C0005', 'Silver'),
('C0006', 'Beige'),
('C0007', 'Brown'),
('C0008', 'Pink'),
('C0009', 'Maroon'),
('C0010', 'Green');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `districtId` char(5) NOT NULL,
  `districtName` varchar(50) NOT NULL,
  PRIMARY KEY (`districtId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`districtId`, `districtName`) VALUES
('D0001', 'Colombo'),
('D0002', 'Gampaha'),
('D0003', 'Kandy'),
('D0004', 'Anuradhapuara');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `driverId` char(5) NOT NULL,
  `driverFname` varchar(100) DEFAULT NULL,
  `driverLname` varchar(100) DEFAULT NULL,
  `driverDob` date DEFAULT NULL,
  `driverAddress` varchar(255) DEFAULT NULL,
  `driverMobile` char(10) DEFAULT NULL,
  `driverNic` char(12) DEFAULT NULL,
  `drivingLNo` char(8) DEFAULT NULL,
  `d_image` varchar(255) DEFAULT NULL,
  `userId` char(5) DEFAULT NULL,
  PRIMARY KEY (`driverId`),
  KEY `userid` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driverId`, `driverFname`, `driverLname`, `driverDob`, `driverAddress`, `driverMobile`, `driverNic`, `drivingLNo`, `d_image`, `userId`) VALUES
('D0000', '', '', '2000-01-01', '', '', '', '', '', 'U0001'),
('D0001', 'Ajith', 'Ramanayaka', '1990-10-05', 'a', '0777898545', 's', 'a', 's', 'U0001'),
('D0002', 'Sunil', 'Hewage', '1975-12-22', 'Kalutara', '0172456321', '197532541290', 'LC123', '', 'U0002'),
('D0003', 'Mahesh', 'Kumara', NULL, '', '', '', '', '', 'U0003');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `jobId` char(5) NOT NULL,
  `vId` char(5) DEFAULT NULL,
  `driverId` char(5) DEFAULT NULL,
  `jobStartDate` date NOT NULL,
  `jobStartTime` time NOT NULL,
  `jobEndDate` date NOT NULL,
  `jobEndTime` time NOT NULL,
  `jobTask` varchar(255) NOT NULL,
  `noPassanger` int(2) NOT NULL,
  `estimateDistance` int(4) NOT NULL,
  `estimatedFuelQty` int(3) NOT NULL,
  `staffId` char(5) NOT NULL,
  `jobStartDistrictId` char(5) NOT NULL,
  `jobEndDistrictId` char(5) NOT NULL,
  `jobStartCityId` char(5) NOT NULL,
  `jobEndCityId` char(5) NOT NULL,
  `jobReqDate` date NOT NULL,
  `status` char(10) NOT NULL,
  PRIMARY KEY (`jobId`),
  KEY `vId` (`vId`),
  KEY `driverId` (`driverId`),
  KEY `staffId` (`staffId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='r,j_no_dates';

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `vId`, `driverId`, `jobStartDate`, `jobStartTime`, `jobEndDate`, `jobEndTime`, `jobTask`, `noPassanger`, `estimateDistance`, `estimatedFuelQty`, `staffId`, `jobStartDistrictId`, `jobEndDistrictId`, `jobStartCityId`, `jobEndCityId`, `jobReqDate`, `status`) VALUES
('J0001', 'V0000', 'D0001', '2022-06-21', '14:18:00', '2022-06-22', '18:16:00', 'gg', 5, 0, 0, 'E0001', '', 'a2', '', '', '2022-06-14', ''),
('J0002', 'V0000', 'D0001', '2022-06-20', '14:48:00', '2022-06-28', '14:49:00', 't1', 5, 0, 0, 'E0002', '', 'a2', '', '', '2022-06-15', ''),
('J0003', 'V0000', 'D0001', '2022-06-15', '18:11:00', '2022-06-07', '22:09:00', 'fdg', 1, 1, 1, 'E0001', '', 'a2', '', '', '2022-06-16', ''),
('J0004', 'V0000', 'D0000', '2022-06-14', '18:19:00', '2022-06-29', '20:16:00', 't1', 1, 0, 0, 'E0002', '', 'l2', '', '', '2022-06-29', ''),
('J0005', 'V0000', 'D0000', '2022-06-14', '12:11:00', '2022-06-22', '12:11:00', 't1', 1, 0, 0, 'E0001', '', 'D0001', 'C0001', 'C0001', '2022-06-22', ''),
('J0006', 'V0000', 'D0000', '2022-06-15', '12:23:00', '2022-06-07', '12:23:00', 't1', 11, 0, 0, 'E0001', '', 'D0003', 'C0001', 'C0001', '2022-06-15', ''),
('J0007', 'V0000', 'D0000', '2022-06-07', '00:00:00', '2022-06-14', '00:00:00', '', 1, 0, 0, 'E0002', 'D0001', 'D0003', 'Col', 'Kany', '2022-06-21', 'NO'),
('J0008', 'V0000', 'D0000', '2022-06-21', '00:00:00', '2022-06-13', '00:00:00', '', 1, 0, 0, 'E0001', 'D0002', 'D0001', 'C0013', 'C0010', '2022-06-16', 'NO'),
('J0009', 'V0000', 'D0000', '2022-06-14', '20:34:00', '2022-06-08', '23:32:00', 'fdg', 1, 0, 0, 'E0001', 'D0003', 'D0004', 'C0014', 'C0017', '2022-06-22', 'NO'),
('J0010', 'V0000', 'D0000', '2022-06-08', '21:31:00', '2022-06-27', '12:27:00', 't1', 1, 0, 0, 'E0002', 'D0003', 'D0002', 'C0015', 'C0011', '2022-06-28', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `rcId` char(5) NOT NULL,
  `vId` char(5) NOT NULL,
  `locTimestamp` timestamp NOT NULL,
  `locLongitude` int(10) DEFAULT NULL,
  `locLatitude` int(10) DEFAULT NULL,
  `locPlace` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rcId`,`vId`,`locTimestamp`),
  KEY `vId` (`vId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `maintenaceId` char(5) NOT NULL,
  `maintenaceType` varchar(100) NOT NULL,
  `maintenaceDate` date NOT NULL,
  `maintenaceDescription` varchar(255) NOT NULL,
  `vId` char(5) NOT NULL,
  PRIMARY KEY (`maintenaceId`),
  KEY `vId` (`vId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

DROP TABLE IF EXISTS `make`;
CREATE TABLE IF NOT EXISTS `make` (
  `vMakeId` char(5) NOT NULL,
  `vMake` varchar(25) NOT NULL,
  PRIMARY KEY (`vMakeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `make`
--

INSERT INTO `make` (`vMakeId`, `vMake`) VALUES
('MA001', 'Toyota'),
('MA002', 'Honda'),
('MA003', 'Nissan'),
('MA004', 'Suzuki'),
('MA005', 'BMW');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `vModelId` char(5) NOT NULL,
  `vMakeId` char(5) NOT NULL,
  `vModel` varchar(25) NOT NULL,
  PRIMARY KEY (`vModelId`),
  KEY `vMakeId` (`vMakeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`vModelId`, `vMakeId`, `vModel`) VALUES
('MO001', 'MA001', 'Hilux'),
('MO002', 'MA001', 'Prius'),
('MO003', 'MA001', 'Corolla'),
('MO004', 'MA001', 'A1'),
('MO005', 'MA001', 'A2'),
('MO006', 'MA002', 'Vessel'),
('MO007', 'MA002', 'Grace'),
('MO008', 'MA002', 'Insight'),
('MO009', 'MA002', 'Fit'),
('MO010', 'MA002', 'Civic'),
('MO011', 'MA003', 'Juke'),
('MO012', 'MA003', 'Altima'),
('MO013', 'MA003', 'Almera '),
('MO014', 'MA003', 'Leaf'),
('MO015', 'MA003', 'Passo'),
('MO016', 'MA004', 'Spacia'),
('MO017', 'MA004', 'WagonR'),
('MO018', 'MA004', 'Alto'),
('MO019', 'MA004', 'Celerio'),
('MO020', 'MA004', 'Swift'),
('MO021', 'MA005', 'ss'),
('MO022', 'MA005', 'A2'),
('MO023', 'MA005', 'q'),
('MO024', 'MA005', 'rt'),
('MO025', 'MA005', 'rr');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `provinceId` char(5) NOT NULL,
  `vProvince` varchar(25) NOT NULL,
  `provinceCode` char(4) NOT NULL,
  PRIMARY KEY (`provinceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`provinceId`, `vProvince`, `provinceCode`) VALUES
('P0001', 'Western', 'LK-1'),
('P0002', 'Central', 'LK-2'),
('P0003', 'Southern ', 'LK-3'),
('P0004', 'Nothern', 'LK-4'),
('P0005', 'Eastern', 'LK-5'),
('P0006', 'North Western', 'LK-6'),
('P0007', 'North Central', 'LK-7'),
('P0008', 'Uva', 'LK-8'),
('P0009', 'Sabaragamuwa', 'LK-9');

-- --------------------------------------------------------

--
-- Table structure for table `runningchart`
--

DROP TABLE IF EXISTS `runningchart`;
CREATE TABLE IF NOT EXISTS `runningchart` (
  `rcId` char(5) NOT NULL,
  `rcStartDate` date NOT NULL,
  `rcStartTime` time NOT NULL,
  `rcEndDate` date NOT NULL,
  `rcEndTime` time NOT NULL,
  `rcDistance` int(100) NOT NULL,
  `rcFuelQty` int(5) NOT NULL,
  `jobId` char(5) NOT NULL,
  PRIMARY KEY (`rcId`),
  KEY `jobId` (`jobId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT=',run_fuel_qty,j_id';

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `serviceId` char(5) NOT NULL,
  `vId` char(5) NOT NULL,
  `serviceType` varchar(100) NOT NULL,
  `serviceDate` date NOT NULL,
  `serviceMilage` int(10) NOT NULL,
  `serviceStation` varchar(255) NOT NULL,
  `MeterReading` int(10) NOT NULL,
  `serviceDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`serviceId`),
  KEY `vId` (`vId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='s_de';

-- --------------------------------------------------------

--
-- Table structure for table `staffofficer`
--

DROP TABLE IF EXISTS `staffofficer`;
CREATE TABLE IF NOT EXISTS `staffofficer` (
  `staffId` char(5) NOT NULL,
  `staffFname` varchar(50) NOT NULL,
  `staffLname` varchar(50) NOT NULL,
  `staffAddress` varchar(255) NOT NULL,
  `staffDob` date NOT NULL,
  `staffMobile` char(10) NOT NULL,
  `staffEmail` varchar(100) NOT NULL,
  `staffDesignation` varchar(100) NOT NULL,
  `branchId` varchar(100) NOT NULL,
  `userId` char(5) DEFAULT NULL,
  PRIMARY KEY (`staffId`),
  KEY `branchId` (`branchId`),
  KEY `userid` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffofficer`
--

INSERT INTO `staffofficer` (`staffId`, `staffFname`, `staffLname`, `staffAddress`, `staffDob`, `staffMobile`, `staffEmail`, `staffDesignation`, `branchId`, `userId`) VALUES
('E0001', 'Anura', 'Ranawaka', 'Maharagama', '1990-10-05', '0771042526', 'anura@gmail.com', 'Manager', 'B0001', 'U0002'),
('E0002', 'Daham', 'Amarasena', 'Moratuwa', '1985-10-05', '0714562354', 'daham@gmail.com', 'Accontant', 'B0002', 'U0001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` char(5) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `pwd` varchar(25) NOT NULL,
  `roleId` char(1) DEFAULT NULL,
  PRIMARY KEY (`userId`),
  KEY `roleId` (`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `userName`, `pwd`, `roleId`) VALUES
('U0001', 'user1', 'user1', '3'),
('U0002', 'user2', 'user2', '3'),
('U0003', 'user3', 'user3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `userlogs`
--

DROP TABLE IF EXISTS `userlogs`;
CREATE TABLE IF NOT EXISTS `userlogs` (
  `logId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` char(5) DEFAULT NULL,
  `logTimestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`logId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

DROP TABLE IF EXISTS `userrole`;
CREATE TABLE IF NOT EXISTS `userrole` (
  `roleId` char(1) NOT NULL,
  `roleName` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`roleId`, `roleName`) VALUES
('1', 'Transport Manager'),
('2', 'Staff Officer'),
('3', 'Driver');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `vId` char(5) NOT NULL,
  `vNo` char(10) DEFAULT NULL,
  `vEngNo` char(25) DEFAULT NULL,
  `vCategoryId` char(5) DEFAULT NULL,
  `vMakeId` char(5) DEFAULT NULL,
  `vModelId` char(5) DEFAULT NULL,
  `vNoSeat` int(2) DEFAULT NULL,
  `vManYear` int(4) DEFAULT NULL,
  `vRegDate` date DEFAULT NULL,
  `vPDate` date DEFAULT NULL,
  `vPPrice` int(11) DEFAULT NULL,
  `vChNo` char(25) DEFAULT NULL,
  `vFuelType` varchar(25) DEFAULT NULL,
  `vFCapacity` int(11) DEFAULT NULL,
  `vMRead` int(11) DEFAULT NULL,
  `vColorId` char(5) DEFAULT NULL,
  `vAbsOwner` varchar(255) DEFAULT NULL,
  `vBranchId` char(5) DEFAULT NULL,
  `vAC` char(10) DEFAULT NULL,
  `vProvinceId` char(5) DEFAULT NULL,
  `vCurrentOwner` varchar(25) DEFAULT NULL,
  `vStatus` varchar(25) DEFAULT NULL,
  `driverId` char(5) DEFAULT NULL,
  `vImage` varchar(255) DEFAULT NULL,
  `distancePerLitre` int(5) DEFAULT NULL,
  `LicenseDate` date DEFAULT NULL,
  `InsuranceDate` date DEFAULT NULL,
  `EmiTestDate` date DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  PRIMARY KEY (`vId`),
  KEY `vBranchId` (`vBranchId`),
  KEY `vCategoryId` (`vCategoryId`),
  KEY `vMakeId` (`vMakeId`),
  KEY `vModelId` (`vModelId`),
  KEY `vColorId` (`vColorId`),
  KEY `vProvinceId` (`vProvinceId`),
  KEY `driverId` (`driverId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vId`, `vNo`, `vEngNo`, `vCategoryId`, `vMakeId`, `vModelId`, `vNoSeat`, `vManYear`, `vRegDate`, `vPDate`, `vPPrice`, `vChNo`, `vFuelType`, `vFCapacity`, `vMRead`, `vColorId`, `vAbsOwner`, `vBranchId`, `vAC`, `vProvinceId`, `vCurrentOwner`, `vStatus`, `driverId`, `vImage`, `distancePerLitre`, `LicenseDate`, `InsuranceDate`, `EmiTestDate`, `active`) VALUES
('V0000', '', '', 'C0001', 'MA001', 'MO001', 0, 0, '2000-01-01', '2000-01-01', 0, '', '', 0, 0, 'C0001', '', 'B0001', '', 'P0001', '', '', 'D0001', '', 0, '2000-01-01', '2000-01-01', '2000-01-01', 0),
('V0001', 'WP-BAS7845', 'K9K430', 'C0002', 'MA003', 'MO012', 4, 1999, '2000-06-02', '2001-06-25', 4000000, '1', 'Petrol', 46, 200, 'C0001', 'w', 'B0001', 'Y', 'P0001', 'Secretary of the Ministry', 'w', 'D0001', 'w', 0, NULL, NULL, NULL, 0),
('V0002', 'SP-UAG4512', '222', 'C0002', 'MA001', 'MO001', 6, 2015, '2022-03-15', '2022-03-01', 45454, '456', 'Petrol', 7, 12, 'C0002', 'K.D Perera', 'B0001', 'Y', 'P0003', 'M.C Rathnam', 'Available', 'D0001', '', 100, NULL, NULL, NULL, 0),
('V0003', 'WP-TE3456', '45566', 'C0001', 'MA001', 'MO015', 20, 2015, '2022-03-07', '2022-03-02', 4444444, '34667', 'Diesel', 150, 500, 'C0001', 'M.B BANDARA', 'B0002', 'Y', 'P0001', 'M.B BANDARA', 'Available', 'D0001', '', 25, NULL, NULL, NULL, 0),
('V0004', 'SP-KAC2030', 'cc45', 'C0003', 'MA001', 'MO001', 14, 2013, '2022-04-18', '2022-04-24', 4000000, '6789', 'Petrol', 500, 788, 'C0001', 'R.S Senanayaka', 'B0001', 'Y', 'P0003', 'R.S Senanayaka', 'Available', 'D0001', 'E:Backup2020NovGayaniMITseminarOnImergingTechSampleseditVehicle.JPG', 200, NULL, NULL, NULL, 0),
('V0005', 'NP-RPG6012', '453', 'C0001', 'MA001', 'MO001', 30, 2020, '2022-03-01', '2022-04-24', 5000000, '4453', 'Petrol', 45, 788, 'C0001', 'N.Y Jayasekara', 'B0002', 'Y', 'P0004', 'N.Y Jayasekara', 'Available', 'D0001', 'homeImage.png', 75, NULL, NULL, NULL, 0),
('V0006', 'WP-TY4588', 'eee', 'C0003', 'MA002', 'MO003', 20, 2016, '2022-04-01', '2022-04-19', 5, '6789', 'Petrol', 45, 788, 'C0006', 'cvbg', 'B0005', 'Non AC', 'P0006', 'dfg', 'On Repair', 'D0001', 'C:wamp64wwwNewProjvehiclehomeimage.png', 200, '2022-04-06', '2022-04-19', '2022-04-19', 0),
('V0007', 'SB-LAC6512', 'ccccccccch', 'C0002', 'MA004', 'MO006', 12, 2015, '2022-04-04', '2022-04-19', 22, 'fhfd', 'Petrol', 12, 12, 'C0003', 'wwww', 'B0002', 'Y', 'P0009', 'K.D Perera', 'Available', 'D0001', '', 12, NULL, NULL, NULL, 0),
('V0008', 'NN-LAC6512', 'ccccccccch', 'C0002', 'MA004', 'MO006', 12, 2015, '2022-04-04', '2022-04-19', 22, 'fhfd', 'Petrol', 12, 12, 'C0003', 'wwww', 'B0002', 'Y', 'P0009', 'K.D Perera', 'Available', 'D0001', 'homeImage.png', 12, NULL, NULL, NULL, 0),
('V0009', 'BB-LAC6512', 'ccccccccch', 'C0003', 'MA004', 'MO006', 12, 2015, '2022-04-04', '2022-04-19', 22, 'fhfd', 'Petrol', 12, 12, 'C0003', 'wwww', 'B0003', 'AC', 'P0002', 'K.D Perera', 'On Repair', 'D0001', 'Images/van1.jpg', 12, '2022-04-26', '2022-04-19', '2022-04-19', 1),
('V0010', 'AA-LAC6512', 'ccccccccch', 'C0003', 'MA004', 'MO006', 12, 2015, '2022-04-04', '2022-04-19', 22, 'fhfd', 'Petrol', 12, 12, 'C0003', 'wwww', 'B0002', 'Y', 'P0009', 'K.D Perera', 'Available', 'D0001', 'Imagesvan1.jpg', 12, NULL, NULL, NULL, 0),
('V0011', 'AB-LAC6512', 'ccccccccch', 'C0003', 'MA004', 'MO006', 12, 2015, '2022-04-04', '2022-04-19', 22, 'fhfd', 'Petrol', 12, 12, 'C0003', 'wwww', 'B0002', 'Y', 'P0009', 'K.D Perera', 'Available', 'D0001', 'Images/van1.jpg', 12, NULL, NULL, NULL, 0),
('V0012', 'LL-FG9087', '4', 'C0001', 'MA003', 'MO007', 1, 2015, '2022-04-20', '2022-04-12', 12, 'fhfd', 'Petrol', 2, 788, 'C0003', 'cvbg', 'B0002', 'Non AC', 'P0003', 'K.D Perera', 'Available', 'D0001', 'dgf', 2, '2022-04-01', '2022-04-02', '2022-04-03', 1),
('V0013', 'SP-AKC4521', 'cz6700', 'C0002', 'MA001', 'MO002', 5, 2020, '2020-06-28', '2020-11-28', 0, 'cc5678', 'Petrol', 45, 1235, 'C0001', 'Aruna Gamage', 'B0003', 'AC', 'P0003', 'Aruna Gamage', 'Available', 'D0001', 'Images/car1.jpg', 200, '2021-06-28', '2021-02-03', '2021-01-13', 1),
('V0014', 'NP-AKC4521', 'cz500', 'C0004', 'MA001', 'MO001', 5, 2012, '2020-06-28', '2020-11-10', 12300008, 'cc5678', 'Diesel', 45, 1235, 'C0001', 'Aruna Gamage g', 'B0004', 'AC', 'P0003', 'Aruna Gamage g', 'Available', 'D0002', 'Images/cab1.jpg', 200, '2021-06-28', '2021-02-03', '2021-01-13', 1),
('V0015', 'TY-4588', 'eee', 'C0002', 'MA001', 'MO008', 12, 2015, '2022-04-12', '2022-04-18', 9, 'fhfd', 'Petrol', 50, 5, 'C0004', 'gh', 'B0004', 'AC', 'P0005', 'gfs', 'Available', 'D0003', 'Images/car1.jpg', 500, '2022-04-12', '2022-04-13', '2022-04-20', 1),
('V0016', 'KD-9562', 'vbb1263', 'C0002', 'MA001', 'MO002', 5, 2012, '2022-04-06', '2022-04-19', 45, 'cc4567', 'Petrol', 12, 788, 'C0001', 'M.S Nishantha', 'B0005', 'AC', 'P0005', 'M.S Nishantha', 'Available', 'D0003', 'Images/car1.jpg', 45, '2022-03-29', '2022-04-05', '2022-04-05', 1),
('V0017', 'FG-9082', 'eee', 'C0001', 'MA003', 'MO005', 12, 2015, '2022-04-19', '2022-04-05', 0, 'fhfd', 'Petrol', 45, 12, 'C0006', '', 'B0004', 'AC', 'P0005', '', 'Available', 'D0002', 'Images/bus1.jpg', 0, '2022-04-06', '2022-04-05', '2022-04-12', 1),
('V0018', 'KP-6040', '4', 'C0001', 'MA003', 'MO001', 20, 2015, '2022-04-14', '2022-04-12', 20, 'ccc', 'Petrol', 35, 5, 'C0007', 'cvbg', 'B0001', 'AC', 'P0003', 'jh', 'Available', 'D0002', 'Images/bus1.jpg', 20, '2022-03-30', '2022-04-12', '2022-04-18', 1),
('V0019', 'TY-4587', 'eee', 'C0003', 'MA003', 'MO007', 5, 2017, '2022-06-23', '2022-06-14', 2, 'ccc', 'Petrol', 2, 788, 'C0003', 'cvbg', 'B0002', 'Non AC', 'P0003', 'h', 'On Repair', 'D0002', 'jpo', 2, '2022-06-09', '2022-06-23', '2022-06-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclemilage`
--

DROP TABLE IF EXISTS `vehiclemilage`;
CREATE TABLE IF NOT EXISTS `vehiclemilage` (
  `vId` char(5) NOT NULL,
  `vmTimestamp` timestamp NOT NULL,
  `vmMilage` int(10) NOT NULL,
  PRIMARY KEY (`vmTimestamp`,`vId`),
  KEY `vId` (`vId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='vm_timestamp,vm_milage,v_id';

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_curr_location`
--

DROP TABLE IF EXISTS `vehicle_curr_location`;
CREATE TABLE IF NOT EXISTS `vehicle_curr_location` (
  `vehicle_ID` varchar(5) NOT NULL,
  `vehicle_loc_uptime` datetime NOT NULL,
  `vehicle_loc_lat` decimal(8,6) NOT NULL,
  `vehicle_loc_lon` decimal(9,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_location_history`
--

DROP TABLE IF EXISTS `vehicle_location_history`;
CREATE TABLE IF NOT EXISTS `vehicle_location_history` (
  `vehicle_ID` varchar(5) NOT NULL,
  `vehicle_loc_date` datetime NOT NULL,
  `vehicle_loc_lat` decimal(8,6) NOT NULL,
  `vehicle_loc_lon` decimal(9,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`driverId`) REFERENCES `driver` (`driverId`),
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`vId`) REFERENCES `vehicle` (`vId`),
  ADD CONSTRAINT `job_ibfk_3` FOREIGN KEY (`staffId`) REFERENCES `staffofficer` (`staffId`);

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`vId`) REFERENCES `vehicle` (`vId`);

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`vId`) REFERENCES `vehicle` (`vId`);

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`vMakeId`) REFERENCES `make` (`vMakeId`);

--
-- Constraints for table `runningchart`
--
ALTER TABLE `runningchart`
  ADD CONSTRAINT `runningchart_ibfk_1` FOREIGN KEY (`jobId`) REFERENCES `job` (`jobId`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`vId`) REFERENCES `vehicle` (`vId`);

--
-- Constraints for table `staffofficer`
--
ALTER TABLE `staffofficer`
  ADD CONSTRAINT `staffofficer_ibfk_1` FOREIGN KEY (`branchId`) REFERENCES `branch` (`branchId`),
  ADD CONSTRAINT `staffofficer_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `userrole` (`roleId`);

--
-- Constraints for table `userlogs`
--
ALTER TABLE `userlogs`
  ADD CONSTRAINT `userlogs_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`vCategoryId`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`vMakeId`) REFERENCES `make` (`vMakeId`),
  ADD CONSTRAINT `vehicle_ibfk_3` FOREIGN KEY (`vModelId`) REFERENCES `model` (`vModelId`),
  ADD CONSTRAINT `vehicle_ibfk_4` FOREIGN KEY (`vColorId`) REFERENCES `color` (`colorId`),
  ADD CONSTRAINT `vehicle_ibfk_5` FOREIGN KEY (`vBranchId`) REFERENCES `branch` (`branchId`),
  ADD CONSTRAINT `vehicle_ibfk_6` FOREIGN KEY (`vProvinceId`) REFERENCES `province` (`provinceId`),
  ADD CONSTRAINT `vehicle_ibfk_7` FOREIGN KEY (`driverId`) REFERENCES `driver` (`driverId`);

--
-- Constraints for table `vehiclemilage`
--
ALTER TABLE `vehiclemilage`
  ADD CONSTRAINT `vehiclemilage_ibfk_1` FOREIGN KEY (`vId`) REFERENCES `vehicle` (`vId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
