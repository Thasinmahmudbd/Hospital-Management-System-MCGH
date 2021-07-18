-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 05:20 PM
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
  `Dr_Image` varchar(100) DEFAULT NULL,
  `Balance` float DEFAULT NULL,
  `Basic_Fee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`AI_ID`, `D_ID`, `Dr_Name`, `Dr_Gender`, `Specialty`, `Dr_Image`, `Balance`, `Basic_Fee`) VALUES
(1, 'D-M-001', 'Brig Gen S M Mizanur Rahman', 'Male', 'Adviser Spl in Medicine', NULL, NULL, 250),
(2, 'D-M-002', 'Col Mir Azimuddin Ahmed', 'Male', 'Cl Spl in Pahtology', NULL, NULL, 240),
(3, 'D-M-003', 'Col Kazi Askar Lateef', 'Male', 'Cl Spl in Anaestheisology', NULL, NULL, 230),
(4, 'D-M-004', 'Col A K M Asaduzzaman', 'Male', 'Cl Spl in Otolaryngology', NULL, NULL, 220),
(5, 'D-M-005', 'Col Imrranul Hasan Murad', 'Male', 'Cl Spl in Dermatology', NULL, NULL, 210),
(6, 'D-M-006', 'Col Abu Daud Md Shariful Islam', 'Male', 'Cl Spl in Surgery', NULL, NULL, 10),
(7, 'D-F-007', 'Lt Col Julia Akter Nira', 'Female', 'Cl Spl in Gynae & Obs', NULL, NULL, 20),
(8, 'D-F-008', 'Lt Col Selina Begum', 'Female', 'Cl Spl in Gynae & Obs', NULL, NULL, 30),
(9, 'D-M-009', 'Lt Col Mohammad Shahnewa Hossain Khan', 'Male', 'Cl Spl in Orthopaedic', NULL, NULL, 40),
(10, 'D-M-010', 'Lt Col Mohammad Sakhawat Sultan', 'Male', 'Gd Spl in Medicine', NULL, NULL, 50),
(11, 'D-F-011', 'Lt Col Kaoser Jahan', 'Female', 'Cl Spl in Gynae & Obs', NULL, NULL, 60),
(12, 'D-M-012', 'Lt Col Abdullah Mehedie', 'Male', 'Cl Spl in Surgery', NULL, NULL, 70),
(13, 'D-F-013', 'Lt Col Shamim Ara Yeasmin', 'Female', 'Cl Spl in Opthalmology', NULL, NULL, 80),
(14, 'D-F-014', 'Lt Col Naila Rehnuma', 'Female', 'Gd Spl in Paediatrics', NULL, NULL, 90),
(15, 'D-M-015', 'Lt Col Araul Gani Sarker', 'Male', 'Cl Spl in Oral and Maxilofacial Surgery', NULL, NULL, 100),
(16, 'D-M-016', 'Maj Mohammad Mamun-Ur-Rashid', 'Male', 'Cl Spl in Radiology', NULL, NULL, 110),
(17, 'D-M-017', 'Maj Mohammad Nafees Islam', 'Male', 'Gd Spl in Anaesthesiology', NULL, NULL, 120),
(18, 'D-F-018', 'Maj Durdana Maheen', 'Female', 'Gd Spl in Pathology', NULL, NULL, 130),
(19, 'D-M-019', 'Maj F M Ashekullah', 'Male', 'Cl Spl in Opthalmology', NULL, NULL, 140),
(20, 'D-M-020', 'Dr Mohammad Sah Alom', 'Male', 'Spl in Medicine', NULL, NULL, 150),
(21, 'D-F-021', 'Dr Saima Afroz Niro', 'Female', 'Spl in Gynae & Obs', NULL, NULL, 160),
(22, 'D-M-022', 'Dr Zahir Uddin Md Babar', 'Male', 'Spl in Dermatology', NULL, NULL, 170),
(23, 'D-M-023', 'Dr Md Jahangir Alam', 'Male', 'Spl in Eye', NULL, NULL, 180),
(24, 'D-M-024', 'Dr Enamul Haque', 'Male', 'Dental Surgeon', NULL, NULL, 190),
(25, 'D-F-025', 'Dr S. Parvin Sadeque', 'Female', 'Spl in Gynae & Obs', NULL, NULL, 200),
(26, 'D-M-026', 'Dr Anup Mustafa', 'Male', 'Spl in Orthopaedic', NULL, NULL, NULL),
(27, 'D-M-027', 'Dr Mir Iftekhar Mostafiz', 'Male', 'Spl in Chest & Asthma', NULL, NULL, NULL),
(28, 'D-F-028', 'Dr Farhana Parvin', 'Female', 'Spl in Gynae & Obs', NULL, NULL, NULL),
(29, 'D-M-029', 'Dr Moniruzzaman', 'Male', 'Spl in Orthopaedic', NULL, NULL, NULL);

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
  `Day` varchar(5) DEFAULT NULL,
  `Slot` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'R-M-002', '2222', 0);

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
(92, 'M-18072021-000', 'thasin', 'male', '181918618', '419814', 'own', '2021-07-18');

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
  `R_ID` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `doctor_balance_logs`
--
ALTER TABLE `doctor_balance_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `patient_logs`
--
ALTER TABLE `patient_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `receiptionists`
--
ALTER TABLE `receiptionists`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
