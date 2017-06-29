-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2017 at 02:11 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibiscoblu`
--
CREATE DATABASE IF NOT EXISTS `ibiscoblu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ibiscoblu`;

-- --------------------------------------------------------

--
-- Table structure for table `ib_color`
--

CREATE TABLE IF NOT EXISTS `ib_color` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='IB_Color';

-- --------------------------------------------------------

--
-- Table structure for table `ib_dog`
--

CREATE TABLE IF NOT EXISTS `ib_dog` (
  `Id` int(11) NOT NULL COMMENT 'Unique ID',
  `Name` int(255) DEFAULT NULL COMMENT 'Name of the dog',
  `Gender` varchar(1) DEFAULT NULL COMMENT 'M or F',
  `DateOfBirth` date DEFAULT NULL COMMENT 'Date of birth',
  `Pedegree` tinyint(1) NOT NULL COMMENT 'The current dog ha the pedegree'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ib_dog_colors`
--

CREATE TABLE IF NOT EXISTS `ib_dog_colors` (
  `IdDog` int(11) NOT NULL COMMENT 'Id of the dog',
  `IdColor` int(11) NOT NULL COMMENT 'Id of the color'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ib_dog_race`
--

CREATE TABLE IF NOT EXISTS `ib_dog_race` (
  `IdDog` int(11) NOT NULL COMMENT 'Id of the dog',
  `IdRace` int(11) NOT NULL COMMENT 'Id of the race'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ib_race`
--

CREATE TABLE IF NOT EXISTS `ib_race` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ib_color`
--
ALTER TABLE `ib_color`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ib_dog`
--
ALTER TABLE `ib_dog`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ib_race`
--
ALTER TABLE `ib_race`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ib_color`
--
ALTER TABLE `ib_color`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ib_dog`
--
ALTER TABLE `ib_dog`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID';
--
-- AUTO_INCREMENT for table `ib_race`
--
ALTER TABLE `ib_race`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
