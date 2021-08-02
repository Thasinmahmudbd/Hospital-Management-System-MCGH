-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 07:39 PM
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
  `Basic_Fee` int(11) DEFAULT NULL,
  `Second_Visit_Discount` int(11) NOT NULL,
  `Patient_Cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`AI_ID`, `D_ID`, `Dr_Name`, `Dr_Gender`, `Specialty`, `Department`, `Dr_Image`, `Balance`, `Basic_Fee`, `Second_Visit_Discount`, `Patient_Cap`) VALUES
(1, 'D-M-001', 'Brig Gen S M Mizanur Rahman', 'Male', 'Adviser Spl', 'Medicine test', 'D-M-001.jpg', NULL, 250, 10, 1),
(2, 'D-M-002', 'Col Mir Azimuddin Ahmed', 'Male', 'Cl Spl', 'Pathology', NULL, NULL, 240, 5, 0),
(3, 'D-M-003', 'Col Kazi Askar Lateef', 'Male', 'Cl Spl', 'Anaesthesiology', NULL, NULL, 230, 15, 0),
(4, 'D-M-004', 'Col A K M Asaduzzaman', 'Male', 'Cl Spl', 'Otolaryngology', NULL, NULL, 220, 3, 0),
(5, 'D-M-005', 'Col Imrranul Hasan Murad', 'Male', 'Cl Spl', 'Dermatology', NULL, NULL, 210, 5, 0),
(6, 'D-M-006', 'Col Abu Daud Md Shariful Islam', 'Male', 'Cl Spl', 'Surgery', NULL, NULL, 10, 7, 0),
(7, 'D-F-007', 'Lt Col Julia Akter Nira', 'Female', 'Cl Spl', 'Gynae & Obs', NULL, NULL, 20, 9, 0),
(8, 'D-F-008', 'Lt Col Selina Begum', 'Female', 'Cl Spl', 'Gynae & Obs', NULL, NULL, 30, 13, 0),
(9, 'D-M-009', 'Lt Col Mohammad Shahnewa Hossain Khan', 'Male', 'Cl Spl', 'Orthopaedic', NULL, NULL, 40, 10, 0),
(10, 'D-M-010', 'Lt Col Mohammad Sakhawat Sultan', 'Male', 'Gd Spl', 'Medicine', NULL, NULL, 50, 4, 0),
(11, 'D-F-011', 'Lt Col Kaoser Jahan', 'Female', 'Cl Spl', 'Gynae & Obs', NULL, NULL, 60, 0, 0),
(12, 'D-M-012', 'Lt Col Abdullah Mehedie', 'Male', 'Cl Spl', 'Surgery', NULL, NULL, 70, 0, 0),
(13, 'D-F-013', 'Lt Col Shamim Ara Yeasmin', 'Female', 'Cl Spl ', 'Ophthalmology', NULL, NULL, 80, 0, 0),
(14, 'D-F-014', 'Lt Col Naila Rehnuma', 'Female', 'Gd Spl', 'Paediatrics', NULL, NULL, 90, 0, 0),
(15, 'D-M-015', 'Lt Col Araul Gani Sarker', 'Male', 'Cl Spl', 'Oral and Maxilofacial Surgery', NULL, NULL, 100, 5, 0),
(16, 'D-M-016', 'Maj Mohammad Mamun-Ur-Rashid', 'Male', 'Cl Spl', 'Radiology', NULL, NULL, 110, 5, 0),
(17, 'D-M-017', 'Maj Mohammad Nafees Islam', 'Male', 'Gd Spl', 'Anaesthesiology', NULL, NULL, 120, 0, 0),
(18, 'D-F-018', 'Maj Durdana Maheen', 'Female', 'Gd Spl', 'Pathology', NULL, NULL, 130, 2, 0),
(19, 'D-M-019', 'Maj F M Ashekullah', 'Male', 'Cl Spl', 'Ophthalmology', NULL, NULL, 140, 0, 0),
(20, 'D-M-020', 'Dr Mohammad Sah Alom', 'Male', 'Spl', 'Medicine', NULL, NULL, 150, 0, 0),
(21, 'D-F-021', 'Dr Saima Afroz Niro', 'Female', 'Spl', 'Gynae & Obs', NULL, NULL, 160, 20, 0),
(22, 'D-M-022', 'Dr Zahir Uddin Md Babar', 'Male', 'Spl', 'Dermatology', NULL, NULL, 170, 0, 0),
(23, 'D-M-023', 'Dr Md Jahangir Alam', 'Male', 'Spl', 'Eye', NULL, NULL, 180, 4, 0),
(24, 'D-M-024', 'Dr Enamul Haque', 'Male', 'Surgeon', 'Dental', NULL, NULL, 190, 4, 0),
(25, 'D-F-025', 'Dr S. Parvin Sadeque', 'Female', 'Spl', 'Gynae & Obs', NULL, NULL, 200, 4, 0),
(26, 'D-M-026', 'Dr Anup Mustafa', 'Male', 'Spl', 'Orthopaedic', NULL, NULL, 150, 2, 0),
(27, 'D-M-027', 'Dr Mir Iftekhar Mostafiz', 'Male', 'Spl', 'Chest & Asthma', NULL, NULL, 200, 0, 0),
(28, 'D-F-028', 'Dr Farhana Parvin', 'Female', 'Spl', 'Gynae & Obs', NULL, NULL, 50, 6, 0),
(29, 'D-M-029', 'Dr Moniruzzaman', 'Male', 'Spl', 'Orthopaedic', NULL, NULL, 80, 0, 0);

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
  `F` time DEFAULT NULL,
  `T` time DEFAULT NULL,
  `Sat` varchar(20) DEFAULT 'N/A',
  `Sun` varchar(20) DEFAULT 'N/A',
  `Mon` varchar(20) DEFAULT 'N/A',
  `Tue` varchar(20) DEFAULT 'N/A',
  `Wed` varchar(20) DEFAULT 'N/A',
  `Thu` varchar(20) DEFAULT 'N/A',
  `Fri` varchar(20) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_schedules`
--

INSERT INTO `doctor_schedules` (`AI_ID`, `D_ID`, `F`, `T`, `Sat`, `Sun`, `Mon`, `Tue`, `Wed`, `Thu`, `Fri`) VALUES
(377, 'D-M-001', '14:00:00', '18:00:00', '1', 'A', 'A', 'A', 'A', 'A', 'A');

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
  `Ad_Date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`AI_ID`, `P_ID`, `Patient_Name`, `Patient_Gender`, `Cell_Number`, `NID`, `NID_Type`, `Ad_Date`) VALUES
(158, 'M-02082021-000', 'Thasin', 'Male', '181918618', '8488668515', 'Own', '02082021'),
(159, 'M-02082021-001', 'Nusrat', 'Male', '181918618', '8488668515', 'Own', '02082021'),
(160, 'M-02082021-002', 'Hanif', 'Male', '161651658', '419814', 'Own', '02082021'),
(161, 'M-02082021-003', 'Jakir', 'Male', '01936521487', '289818494881', 'Own', '02082021');

-- --------------------------------------------------------

--
-- Table structure for table `patient_logs`
--

CREATE TABLE `patient_logs` (
  `AI_ID` int(11) NOT NULL,
  `P_ID` varchar(20) DEFAULT NULL,
  `Ap_Date` date DEFAULT NULL,
  `Ap_Time` varchar(50) DEFAULT NULL,
  `D_ID` varchar(10) DEFAULT NULL,
  `Basic_Fee` int(11) DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `Final_Fee` float DEFAULT NULL,
  `Payment_Status` varchar(10) NOT NULL DEFAULT 'Unpaid',
  `Treatment_Status` int(11) NOT NULL DEFAULT 0,
  `Treatment_Date_Time` varchar(50) DEFAULT NULL,
  `Token` int(11) NOT NULL,
  `Random_code` int(11) NOT NULL,
  `R_ID` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_logs`
--

INSERT INTO `patient_logs` (`AI_ID`, `P_ID`, `Ap_Date`, `Ap_Time`, `D_ID`, `Basic_Fee`, `Discount`, `Final_Fee`, `Payment_Status`, `Treatment_Status`, `Treatment_Date_Time`, `Token`, `Random_code`, `R_ID`) VALUES
(100, 'M-02082021-000', '2021-08-02', '00:00:00-15:00:00', 'D-M-001', 250, 0, 250, 'Paid', 0, NULL, 1, 136547, 'R-M-001'),
(101, 'M-02082021-001', '2021-08-02', '00:00:00-15:00:00', 'D-M-001', 250, 0, 250, 'Paid', 0, NULL, 2, 536214, 'R-M-001'),
(102, 'M-02082021-002', '2021-08-02', '00:00:00-15:00:00', 'D-M-001', 250, 0, 250, 'Paid', 0, NULL, 3, 524523, 'R-M-001'),
(103, 'M-02082021-003', '2021-08-02', '00:00:00-15:00:00', 'D-M-001', 250, 0, 250, 'Paid', 1, NULL, 4, 204832, 'R-M-001');

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
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `patient_logs`
--
ALTER TABLE `patient_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `receiptionists`
--
ALTER TABLE `receiptionists`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
