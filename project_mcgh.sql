-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 11:18 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_mcgh`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `AI_ID` int(11) NOT NULL,
  `Acc_ID` varchar(8) DEFAULT NULL,
  `Acc_Name` varchar(50) DEFAULT NULL,
  `Acc_Gender` varchar(10) DEFAULT NULL,
  `Acc_Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `AI_ID` int(11) NOT NULL,
  `D_ID` varchar(10) DEFAULT NULL,
  `Dr_Name` varchar(50) DEFAULT NULL,
  `Dr_Gender` varchar(10) DEFAULT NULL,
  `Specialty` varchar(255) DEFAULT NULL,
  `Department` varchar(50) NOT NULL,
  `Dr_Image` varchar(100) DEFAULT NULL,
  `Balance` float DEFAULT NULL,
  `Basic_Fee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`AI_ID`, `D_ID`, `Dr_Name`, `Dr_Gender`, `Specialty`, `Department`, `Dr_Image`, `Balance`, `Basic_Fee`) VALUES
(1, 'D-M-001', 'Brig Gen S M Mizanur Rahman', 'Male', 'Adviser Spl', 'Medicine', NULL, NULL, 250),
(2, 'D-M-002', 'Col Mir Azimuddin Ahmed', 'Male', 'Cl Spl', 'Pathology', NULL, NULL, 240),
(3, 'D-M-003', 'Col Kazi Askar Lateef', 'Male', 'Cl Spl', 'Anaesthesiology', NULL, NULL, 230),
(4, 'D-M-004', 'Col A K M Asaduzzaman', 'Male', 'Cl Spl', 'Otolaryngology', NULL, NULL, 220),
(5, 'D-M-005', 'Col Imrranul Hasan Murad', 'Male', 'Cl Spl', 'Dermatology', NULL, NULL, 210),
(6, 'D-M-006', 'Col Abu Daud Md Shariful Islam', 'Male', 'Cl Spl', 'Surgery', NULL, NULL, 10),
(7, 'D-F-007', 'Lt Col Julia Akter Nira', 'Female', 'Cl Spl', 'Gynae & Obs', NULL, NULL, 20),
(8, 'D-F-008', 'Lt Col Selina Begum', 'Female', 'Cl Spl', 'Gynae & Obs', NULL, NULL, 30),
(9, 'D-M-009', 'Lt Col Mohammad Shahnewa Hossain Khan', 'Male', 'Cl Spl', 'Orthopaedic', NULL, NULL, 40),
(10, 'D-M-010', 'Lt Col Mohammad Sakhawat Sultan', 'Male', 'Gd Spl', 'Medicine', NULL, NULL, 50),
(11, 'D-F-011', 'Lt Col Kaoser Jahan', 'Female', 'Cl Spl', 'Gynae & Obs', NULL, NULL, 60),
(12, 'D-M-012', 'Lt Col Abdullah Mehedie', 'Male', 'Cl Spl', 'Surgery', NULL, NULL, 70),
(13, 'D-F-013', 'Lt Col Shamim Ara Yeasmin', 'Female', 'Cl Spl ', 'Ophthalmology', NULL, NULL, 80),
(14, 'D-F-014', 'Lt Col Naila Rehnuma', 'Female', 'Gd Spl', 'Paediatrics', NULL, NULL, 90),
(15, 'D-M-015', 'Lt Col Araul Gani Sarker', 'Male', 'Cl Spl', 'Oral and Maxilofacial Surgery', NULL, NULL, 100),
(16, 'D-M-016', 'Maj Mohammad Mamun-Ur-Rashid', 'Male', 'Cl Spl', 'Radiology', NULL, NULL, 110),
(17, 'D-M-017', 'Maj Mohammad Nafees Islam', 'Male', 'Gd Spl', 'Anaesthesiology', NULL, NULL, 120),
(18, 'D-F-018', 'Maj Durdana Maheen', 'Female', 'Gd Spl', 'Pathology', NULL, NULL, 130),
(19, 'D-M-019', 'Maj F M Ashekullah', 'Male', 'Cl Spl', 'Ophthalmology', NULL, NULL, 140),
(20, 'D-M-020', 'Dr Mohammad Sah Alom', 'Male', 'Spl', 'Medicine', NULL, NULL, 150),
(21, 'D-F-021', 'Dr Saima Afroz Niro', 'Female', 'Spl', 'Gynae & Obs', NULL, NULL, 160),
(22, 'D-M-022', 'Dr Zahir Uddin Md Babar', 'Male', 'Spl', 'Dermatology', NULL, NULL, 170),
(23, 'D-M-023', 'Dr Md Jahangir Alam', 'Male', 'Spl', 'Eye', NULL, NULL, 180),
(24, 'D-M-024', 'Dr Enamul Haque', 'Male', 'Surgeon', 'Dental', NULL, NULL, 190),
(25, 'D-F-025', 'Dr S. Parvin Sadeque', 'Female', 'Spl', 'Gynae & Obs', NULL, NULL, 200),
(26, 'D-M-026', 'Dr Anup Mustafa', 'Male', 'Spl', 'Orthopaedic', NULL, NULL, 150),
(27, 'D-M-027', 'Dr Mir Iftekhar Mostafiz', 'Male', 'Spl', 'Chest & Asthma', NULL, NULL, 200),
(28, 'D-F-028', 'Dr Farhana Parvin', 'Female', 'Spl', 'Gynae & Obs', NULL, NULL, 50),
(29, 'D-M-029', 'Dr Moniruzzaman', 'Male', 'Spl', 'Orthopaedic', NULL, NULL, 80);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_balance_logs`
--

CREATE TABLE `doctor_balance_logs` (
  `AI_ID` int(11) NOT NULL,
  `Dr_ID` varchar(10) DEFAULT NULL,
  `B_Date` date DEFAULT NULL,
  `Debit` float DEFAULT NULL,
  `Credit` float DEFAULT NULL,
  `Balance` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedules`
--

CREATE TABLE `doctor_schedules` (
  `AI_ID` int(11) NOT NULL,
  `D_ID` varchar(10) DEFAULT NULL,
  `F` varchar(10) DEFAULT NULL,
  `T` varchar(10) DEFAULT NULL,
  `sat` varchar(20) DEFAULT 'N/A',
  `sun` varchar(20) DEFAULT 'N/A',
  `mon` varchar(20) DEFAULT 'N/A',
  `tue` varchar(20) DEFAULT 'N/A',
  `wed` varchar(20) DEFAULT 'N/A',
  `thu` varchar(20) DEFAULT 'N/A',
  `fri` varchar(20) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_schedules`
--

INSERT INTO `doctor_schedules` (`AI_ID`, `D_ID`, `F`, `T`, `sat`, `sun`, `mon`, `tue`, `wed`, `thu`, `fri`) VALUES
(1, 'D-M-001', '8:00', '8:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(2, 'D-M-001', '8:15', '8:30', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(3, 'D-M-001', '8:30', '8:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(4, 'D-M-001', '8:45', '9:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(5, 'D-M-002', '14:00', '14:15', 'A', 'N/A', 'M-23072021-001', 'N/A', 'A', 'N/A', 'N/A'),
(6, 'D-M-002', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(7, 'D-M-002', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(8, 'D-M-002', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(9, 'D-M-003', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(10, 'D-M-003', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(11, 'D-M-003', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(12, 'D-M-003', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(13, 'D-M-004', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(14, 'D-M-004', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(15, 'D-M-004', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(16, 'D-M-004', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(17, 'D-M-005', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(18, 'D-M-005', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(19, 'D-M-005', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(20, 'D-M-005', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(21, 'D-M-006', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(22, 'D-M-006', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(23, 'D-M-006', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(24, 'D-M-006', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(25, 'D-M-006', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(26, 'D-M-006', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(27, 'D-M-006', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(28, 'D-M-006', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(29, 'D-F-007', '16:00', '16:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(30, 'D-F-007', '16:15', '16:30', 'N/A', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A'),
(31, 'D-F-007', '16:30', '16:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(32, 'D-F-007', '16:45', '17:00', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(33, 'D-F-008', '16:00', '16:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(34, 'D-F-008', '16:15', '16:30', 'N/A', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A'),
(35, 'D-F-008', '16:30', '16:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(36, 'D-F-008', '16:45', '17:00', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(37, 'D-M-009', '12:00', '12:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(38, 'D-M-009', '12:15', '12:30', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(39, 'D-M-010', '12:30', '12:45', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(40, 'D-M-010', '12:45', '13:00', 'A', 'N/A', 'A', 'N/A', 'M-24072021-000', 'N/A', 'N/A'),
(41, 'D-M-010', '12:00', '12:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(42, 'D-M-010', '12:15', '12:30', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(43, 'D-M-009', '12:30', '12:45', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(44, 'D-M-009', '12:45', '13:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(45, 'D-F-011', '16:00', '16:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(46, 'D-F-011', '16:15', '16:30', 'N/A', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A'),
(47, 'D-F-011', '16:30', '16:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(48, 'D-F-011', '16:45', '17:00', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(49, 'D-M-012', '10:00', '10:15', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(50, 'D-M-012', '10:15', '10:30', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(51, 'D-M-012', '10:30', '10:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(52, 'D-M-012', '10:45', '11:00', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(53, 'D-F-014', '16:00', '16:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(54, 'D-F-014', '16:15', '16:30', 'N/A', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A'),
(55, 'D-F-014', '16:30', '16:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(56, 'D-F-014', '16:45', '17:00', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(57, 'D-F-013', '17:00', '17:15', 'N/A', 'A', 'N/A', 'A', 'A', 'N/A', 'A'),
(58, 'D-F-013', '17:15', '17:30', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A', 'A'),
(59, 'D-F-013', '17:30', '17:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A', 'A'),
(60, 'D-F-013', '17:45', '18:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(61, 'D-M-015', '14:00', '14:15', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(62, 'D-M-015', '14:15', '14:30', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(63, 'D-M-015', '14:30', '14:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(64, 'D-M-015', '14:45', '15:00', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(65, 'D-M-019', '18:00', '18:15', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(66, 'D-M-019', '18:15', '18:30', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(67, 'D-M-019', '18:30', '18:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(68, 'D-M-019', '18:45', '19:00', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(69, 'D-F-018', '17:00', '17:15', 'N/A', 'A', 'N/A', 'A', 'A', 'N/A', 'A'),
(70, 'D-F-018', '17:15', '17:30', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A', 'A'),
(71, 'D-F-018', '17:30', '17:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A', 'A'),
(72, 'D-F-018', '17:45', '18:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(73, 'D-M-016', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(74, 'D-M-016', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(75, 'D-M-016', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(76, 'D-M-016', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(77, 'D-M-017', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(78, 'D-M-017', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(79, 'D-M-017', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(80, 'D-M-017', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(81, 'D-M-019', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(82, 'D-M-019', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(83, 'D-M-019', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(84, 'D-M-019', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(85, 'D-M-020', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(86, 'D-M-020', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(87, 'D-M-020', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(88, 'D-M-020', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(89, 'D-F-021', '17:00', '17:15', 'N/A', 'A', 'N/A', 'A', 'A', 'N/A', 'A'),
(90, 'D-F-021', '17:15', '17:30', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A', 'A'),
(91, 'D-F-021', '17:30', '17:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A', 'A'),
(92, 'D-F-021', '17:45', '18:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(93, 'D-M-022', '10:00', '10:15', 'N/A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'A'),
(94, 'D-M-022', '10:15', '10:30', 'N/A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'A'),
(95, 'D-M-022', '10:30', '10:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(96, 'D-M-022', '10:45', '11:00', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(97, 'D-M-023', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(98, 'D-M-023', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(99, 'D-M-023', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(100, 'D-M-023', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(101, 'D-M-024', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(102, 'D-M-024', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(103, 'D-M-024', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(104, 'D-M-024', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(105, 'D-F-025', '16:00', '16:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(106, 'D-F-025', '16:15', '16:30', 'N/A', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A'),
(107, 'D-F-025', '16:30', '16:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(108, 'D-F-025', '16:45', '17:00', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(109, 'D-F-028', '17:00', '17:15', 'N/A', 'A', 'N/A', 'A', 'A', 'N/A', 'A'),
(110, 'D-F-028', '17:15', '17:30', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A', 'A'),
(111, 'D-F-028', '17:30', '17:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A', 'A'),
(112, 'D-F-028', '17:45', '18:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(113, 'D-M-026', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(114, 'D-M-026', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(115, 'D-M-026', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(116, 'D-M-026', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(117, 'D-M-027', '14:00', '14:15', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'N/A'),
(118, 'D-M-027', '14:15', '14:30', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(119, 'D-M-027', '14:30', '14:45', 'A', 'N/A', 'N/A', 'A', 'N/A', 'A', 'N/A'),
(120, 'D-M-027', '14:45', '15:00', 'A', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A'),
(121, 'D-M-029', '8:00', '8:15', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(122, 'D-M-029', '8:15', '8:30', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(123, 'D-M-029', '8:30', '8:45', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A'),
(124, 'D-M-029', '8:45', '9:00', 'N/A', 'A', 'N/A', 'A', 'N/A', 'A', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `AI_ID` int(11) NOT NULL,
  `Emp_ID` varchar(12) DEFAULT NULL,
  `Log_Password` varchar(10) DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`AI_ID`, `Emp_ID`, `Log_Password`, `status`) VALUES
(1, 'R-M-001', '1111', 1),
(2, 'R-M-002', '2222', 0),
(3, 'D-M-001', '3333', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `AI_ID` int(11) NOT NULL,
  `P_ID` varchar(20) DEFAULT NULL,
  `Patient_Name` varchar(50) DEFAULT NULL,
  `Patient_Gender` varchar(6) DEFAULT NULL,
  `Cell_Number` varchar(11) DEFAULT NULL,
  `NID` varchar(20) DEFAULT NULL,
  `NID_Type` varchar(10) DEFAULT NULL,
  `Ad_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`AI_ID`, `P_ID`, `Patient_Name`, `Patient_Gender`, `Cell_Number`, `NID`, `NID_Type`, `Ad_Date`) VALUES
(106, 'M-24072021-000', 'Thasin', 'Male', '0178965321', '8488668515', 'Own', '2021-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `patient_logs`
--

CREATE TABLE `patient_logs` (
  `AI_ID` int(11) NOT NULL,
  `P_ID` varchar(20) DEFAULT NULL,
  `Ap_Date` date DEFAULT NULL,
  `Ap_Time` varchar(15) DEFAULT NULL,
  `D_ID` varchar(10) DEFAULT NULL,
  `Basic_Fee` int(11) DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `Final_Fee` float DEFAULT NULL,
  `Payment_Status` varchar(10) NOT NULL DEFAULT 'Unpaid',
  `R_ID` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_logs`
--

INSERT INTO `patient_logs` (`AI_ID`, `P_ID`, `Ap_Date`, `Ap_Time`, `D_ID`, `Basic_Fee`, `Discount`, `Final_Fee`, `Payment_Status`, `R_ID`) VALUES
(28, 'M-24072021-000', '2021-07-31', '12:45-13:00', 'D-M-010', 50, 5, 47.5, 'Unpaid', 'R-M-001');

-- --------------------------------------------------------

--
-- Table structure for table `receiptionists`
--

CREATE TABLE `receiptionists` (
  `AI_ID` int(11) NOT NULL,
  `R_ID` varchar(10) DEFAULT NULL,
  `R_Name` varchar(50) DEFAULT NULL,
  `R_Gender` varchar(10) DEFAULT NULL,
  `R_Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `doctor_balance_logs`
--
ALTER TABLE `doctor_balance_logs`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `patient_logs`
--
ALTER TABLE `patient_logs`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `receiptionists`
--
ALTER TABLE `receiptionists`
  ADD PRIMARY KEY (`AI_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `doctor_balance_logs`
--
ALTER TABLE `doctor_balance_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `patient_logs`
--
ALTER TABLE `patient_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `receiptionists`
--
ALTER TABLE `receiptionists`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
