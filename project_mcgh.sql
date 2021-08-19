-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 02:26 AM
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
  `Acc_ID` varchar(10) DEFAULT NULL,
  `Acc_Name` varchar(50) DEFAULT NULL,
  `Acc_Gender` varchar(10) DEFAULT NULL,
  `Acc_Email` varchar(50) DEFAULT NULL,
  `Acc_Phone` varchar(11) DEFAULT NULL,
  `Acc_Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AI_ID`, `Acc_ID`, `Acc_Name`, `Acc_Gender`, `Acc_Email`, `Acc_Phone`, `Acc_Image`) VALUES
(1, 'AC-M-001', 'Mr. Shamol', 'Male', 'shamol@gmail.com', '01702315892', 'AC-M-001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `account_variables`
--

CREATE TABLE `account_variables` (
  `AI_ID` int(11) NOT NULL,
  `Vat` float DEFAULT NULL,
  `Commission` float DEFAULT NULL,
  `Updater` varchar(20) NOT NULL,
  `Update_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_variables`
--

INSERT INTO `account_variables` (`AI_ID`, `Vat`, `Commission`, `Updater`, `Update_Date`) VALUES
(1, 10, 20, 'AC-M-001', '2021-08-17');

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
  `Wallet` float DEFAULT NULL,
  `Basic_Fee` int(11) DEFAULT NULL,
  `Second_Visit_Discount` int(11) NOT NULL,
  `Patient_Cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`AI_ID`, `D_ID`, `Dr_Name`, `Dr_Gender`, `Specialty`, `Department`, `Dr_Image`, `Wallet`, `Basic_Fee`, `Second_Visit_Discount`, `Patient_Cap`) VALUES
(1, 'D-M-001', 'Brig Gen S M Mizanur Rahman', 'Male', 'Adviser Spl', 'Medicine test', NULL, NULL, 2, 20, 1),
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
  `D_ID` varchar(10) DEFAULT NULL,
  `B_Date` date DEFAULT NULL,
  `Debit` float DEFAULT 0,
  `Credit` float DEFAULT 0,
  `Gov_Vat` float DEFAULT 0,
  `Commission` float DEFAULT 0,
  `Income` float DEFAULT 0,
  `Current_Balance` float NOT NULL DEFAULT 0,
  `Acc_ID` varchar(20) DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `hospital_income_log`
--

CREATE TABLE `hospital_income_log` (
  `AI_ID` int(11) NOT NULL,
  `Message` varchar(250) NOT NULL,
  `Debit` float NOT NULL,
  `Credit` float NOT NULL,
  `Vat` float NOT NULL,
  `Service_Charge` float NOT NULL,
  `Total_Income` float NOT NULL,
  `Total_Profit` float NOT NULL,
  `Entry_Date` date NOT NULL,
  `Entry_Time` time NOT NULL,
  `Entry_Year` year(4) NOT NULL,
  `Acc_ID` varchar(10) NOT NULL
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
(1, 'R-M-001', '1111', 0),
(2, 'R-M-002', '2222', 0),
(3, 'D-M-001', '3333', 0),
(4, 'AC-M-001', '5555', 0),
(5, 'D-M-002', '2222', 0),
(6, 'R-M-001', '111213', 1),
(7, 'R-M-002', '999897', 1),
(8, 'R-M-003', '595755', 1),
(9, 'R-M-004', '123000', 1),
(10, 'R-M-005', '507090', 1),
(11, 'R-M-006', '975310', 1),
(12, 'R-M-007', '200400', 1),
(13, 'R-M-008', '314253', 1),
(14, 'R-M-009', '900999', 1),
(15, 'R-M-010', '331931', 1),
(16, 'R-F-011', '113355', 1),
(17, 'R-F-012', '886644', 1),
(18, 'R-F-013', '203302', 1),
(19, 'R-F-014', '142856', 1),
(20, 'R-F-015', '907560', 1),
(21, 'R-F-016', '160061', 1),
(22, 'R-F-017', '717171', 1),
(23, 'R-F-018', '800008', 1),
(24, 'R-F-019', '975579', 1),
(25, 'R-F-020', '212021', 1),
(26, 'D-M-001', '2713r1', 1),
(27, 'D-M-002', 'u14kh9', 1),
(28, 'D-M-003', '312kr6', 1),
(29, 'D-M-004', '121z14', 1),
(30, 'D-M-005', '9813ad', 1),
(31, 'D-M-006', '414s91', 1),
(32, 'D-F-007', 'a314ji', 1),
(33, 'D-F-008', '31s5b9', 1),
(34, 'D-M-009', 'k158u2', 1),
(35, 'D-M-010', '8d3h96', 1),
(36, 'D-F-011', 'j1f98k', 1),
(37, 'D-M-012', 'm1258e', 1),
(38, 'D-F-013', '98k6o3', 1),
(39, 'D-F-014', 'nt26ku', 1),
(40, 'D-M-015', 'k89624', 1),
(41, 'D-M-016', '32589j', 1),
(42, 'D-M-017', 'ji3553', 1),
(43, 'D-F-018', '65lo80', 1),
(44, 'D-M-019', '980a58', 1),
(45, 'D-M-020', 'o698p3', 1),
(46, 'D-F-021', 'j26mb1', 1),
(47, 'D-M-022', '25i89h', 1),
(48, 'D-M-023', 'h125j9', 1),
(49, 'D-M-024', '846f2u', 1),
(50, 'D-F-025', 'y4io58', 1),
(51, 'D-M-026', 'k547p0', 1),
(52, 'D-M-027', '6p9d28', 1),
(53, 'D-F-028', '9i873w', 1),
(54, 'D-M-029', 'm5u320', 1);

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
-- Indexes for table `account_variables`
--
ALTER TABLE `account_variables`
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
-- Indexes for table `hospital_income_log`
--
ALTER TABLE `hospital_income_log`
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
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_variables`
--
ALTER TABLE `account_variables`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `doctor_balance_logs`
--
ALTER TABLE `doctor_balance_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT for table `hospital_income_log`
--
ALTER TABLE `hospital_income_log`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `patient_logs`
--
ALTER TABLE `patient_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `receiptionists`
--
ALTER TABLE `receiptionists`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
