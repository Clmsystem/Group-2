-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 07:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_department` int(11) NOT NULL,
  `name_department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_department`, `name_department`) VALUES
(1, 'ผู้อำนวยการและรองผู้อำนวยการ'),
(2, 'ฝ่ายบริหารทั่วไปและธุรการ'),
(3, 'ฝ่ายพัฒนาทรัพยากรสารสนเทศ'),
(4, 'ฝ่ายส่งเสริมการเรียนรู้และให้บริการการศึกษา'),
(5, 'ฝ่ายสนับสนุนการเรียนการสอนและสื่อการศึกษา');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL,
  `name_employee` varchar(255) NOT NULL,
  `id_position` int(11) NOT NULL,
  `id_department` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `username` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id_employee`, `name_employee`, `id_position`, `id_department`, `status`, `password`, `username`) VALUES
(1, 'ผศ.ดร.ศิวนาถ นันทพิชัย', 3, 1, 3, '1234', 'ssadmin'),
(2, 'ผศ.ดร.ฐิมาพร เพชรแก้ว', 4, 1, 3, '1234', 'sadmin');

-- --------------------------------------------------------

--
-- Table structure for table `position_list`
--

CREATE TABLE `position_list` (
  `id_position` int(11) NOT NULL,
  `name_position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position_list`
--

INSERT INTO `position_list` (`id_position`, `name_position`) VALUES
(1, 'หัวหน้าฝ่าย'),
(2, 'พนักงานทั่วไป'),
(3, 'ผู้อำนวยการศูนย์บรรณสารและสื่อการศึกษา'),
(4, 'รองผู้อำนวยการศูนย์บรรณสารและสื่อการศึกษา');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`,`id_position`,`id_department`);

--
-- Indexes for table `position_list`
--
ALTER TABLE `position_list`
  ADD PRIMARY KEY (`id_position`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id_department` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `position_list`
--
ALTER TABLE `position_list`
  MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
