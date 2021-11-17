-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 06:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
  `Acc_ID` longtext DEFAULT NULL,
  `Acc_Name` longtext DEFAULT NULL,
  `Acc_Gender` longtext DEFAULT NULL,
  `Acc_Email` longtext DEFAULT NULL,
  `Acc_Phone` longtext DEFAULT NULL,
  `Acc_Image` longtext DEFAULT NULL,
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AI_ID`, `Acc_ID`, `Acc_Name`, `Acc_Gender`, `Acc_Email`, `Acc_Phone`, `Acc_Image`, `Time_Stamp`) VALUES
(1, 'AC-M-001', 'Hashem', 'Male', 'shamol@gmail.com', '01702315892', NULL, '2021-08-21 10:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `account_variables`
--

CREATE TABLE `account_variables` (
  `AI_ID` int(11) NOT NULL,
  `Vat` float DEFAULT NULL,
  `Commission` float DEFAULT NULL,
  `Invigilator_Fee` int(11) NOT NULL,
  `Updater` longtext DEFAULT NULL,
  `Update_Date` date DEFAULT NULL,
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_variables`
--

INSERT INTO `account_variables` (`AI_ID`, `Vat`, `Commission`, `Invigilator_Fee`, `Updater`, `Update_Date`, `Time_Stamp`) VALUES
(1, 10, 20, 500, 'AC-M-001', '2021-08-17', '2021-08-21 10:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `admission_logs`
--

CREATE TABLE `admission_logs` (
  `A_ID` int(11) NOT NULL,
  `P_ID` longtext NOT NULL,
  `R_ID` longtext NOT NULL,
  `B_ID` longtext NOT NULL,
  `D_ID` longtext NOT NULL,
  `Pre_Vill` longtext NOT NULL,
  `Pre_PO` longtext NOT NULL,
  `Pre_Upa` longtext NOT NULL,
  `Pre_Dist` longtext NOT NULL,
  `Per_Vill` longtext NOT NULL,
  `Per_PO` longtext NOT NULL,
  `Per_Upa` longtext NOT NULL,
  `Per_Dist` longtext NOT NULL,
  `Admission_Date` date NOT NULL,
  `Religion` longtext NOT NULL,
  `Consultant` longtext NOT NULL,
  `Emergency_Rel_Add` longtext NOT NULL,
  `Emergency_Number` longtext NOT NULL,
  `Ward_Days` int(11) DEFAULT NULL,
  `Cabin_Days` int(11) DEFAULT NULL,
  `Payment_Confirmation` int(11) DEFAULT NULL,
  `OT_Confirmation` int(11) DEFAULT NULL COMMENT '1 if confirmed',
  `Package_Confirmation` longtext NOT NULL,
  `Ligation` longtext NOT NULL,
  `Third_Seizure` longtext NOT NULL,
  `Bed_Bill` int(11) DEFAULT NULL,
  `Admission_Fee` int(11) NOT NULL,
  `Paid_Amount` int(11) NOT NULL,
  `Changes` int(11) NOT NULL,
  `Admission_Timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_Timestamp` timestamp NULL DEFAULT NULL,
  `Update_Date` date DEFAULT NULL,
  `Discount` int(11) DEFAULT NULL,
  `Discharge_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `anesthesiologist_logs`
--

CREATE TABLE `anesthesiologist_logs` (
  `AI_ID` int(11) NOT NULL,
  `Ans_ID` longtext NOT NULL,
  `O_ID` int(11) NOT NULL,
  `Anesthesiologist_Name` longtext NOT NULL,
  `Anesthesiologist_Fee` int(11) NOT NULL,
  `Anesthesiologist_Discount` int(11) NOT NULL,
  `Anesthesiologist_Income` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `B_ID` int(11) NOT NULL,
  `Bed_No` longtext NOT NULL,
  `Floor_No` int(11) NOT NULL,
  `Room_No` int(11) NOT NULL,
  `Bed_Type` longtext NOT NULL,
  `Quality` longtext NOT NULL,
  `B_Location` longtext NOT NULL,
  `Package_Name` longtext NOT NULL,
  `Normal_Pricing` int(11) NOT NULL DEFAULT 0,
  `Package_Pricing` int(11) NOT NULL DEFAULT 0,
  `Day_Range` int(11) NOT NULL DEFAULT 0,
  `Confirmation` int(11) NOT NULL DEFAULT 0,
  `Admission_Fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`B_ID`, `Bed_No`, `Floor_No`, `Room_No`, `Bed_Type`, `Quality`, `B_Location`, `Package_Name`, `Normal_Pricing`, `Package_Pricing`, `Day_Range`, `Confirmation`, `Admission_Fee`) VALUES
(1, '210-1', 2, 210, 'Ward', 'Male', 'Window', '', 750, 0, 0, 0, 300),
(2, '210-2', 2, 210, 'Ward', 'Male', 'Window', '', 750, 0, 0, 0, 300),
(3, '210-3', 2, 210, 'Ward', 'Male', 'Window', '', 750, 0, 0, 0, 300),
(4, '210-4', 2, 210, 'Ward', 'Male', 'Window', '', 750, 0, 0, 0, 300),
(5, '210-5', 2, 210, 'Ward', 'Male', 'Window', '', 750, 0, 0, 0, 300),
(6, '210-6', 2, 210, 'Ward', 'Male', 'Window', '', 750, 0, 0, 0, 300),
(7, '210-7', 2, 210, 'Ward', 'Male', 'Window', '', 750, 0, 0, 0, 300),
(8, '210-8', 2, 210, 'Ward', 'Male', 'Window', '', 750, 0, 0, 0, 300),
(9, '210-9', 2, 210, 'Ward', 'Male', 'Window', '', 750, 0, 0, 0, 300),
(10, '209-1', 2, 209, 'Ward', 'Female', 'Window', '', 750, 0, 0, 0, 300),
(11, '209-2', 2, 209, 'Ward', 'Female', 'Window', '', 750, 0, 0, 0, 300),
(12, '209-3', 2, 209, 'Ward', 'Female', 'Window', '', 750, 0, 0, 0, 300),
(13, '209-4', 2, 209, 'Ward', 'Female', 'Window', '', 750, 0, 0, 0, 300),
(14, '209-5', 2, 209, 'Ward', 'Female', 'Window', '', 750, 0, 0, 0, 300),
(15, '209-4', 2, 209, 'Ward', 'Female', 'Window', '', 750, 0, 0, 0, 300),
(16, '209-7', 2, 209, 'Ward', 'Female', 'Window', '', 750, 0, 0, 0, 300),
(17, '209-8', 2, 209, 'Ward', 'Female', 'Window', '', 750, 0, 0, 0, 300),
(18, '209-9', 2, 209, 'Ward', 'Female', 'Window', '', 750, 0, 0, 0, 300),
(19, '209-10', 2, 209, 'Ward', 'Female', 'Window', '', 750, 0, 0, 0, 300),
(20, '313-1', 3, 313, 'Ward', 'Child', 'Window', '', 850, 0, 0, 0, 300),
(21, '313-2', 3, 313, 'Ward', 'Child', 'Window', '', 850, 0, 0, 0, 300),
(22, '313-3', 3, 313, 'Ward', 'Child', 'Window', '', 850, 0, 0, 0, 300),
(23, '313-4', 3, 313, 'Ward', 'Child', 'Window', '', 850, 0, 0, 0, 300),
(24, '313-5', 3, 313, 'Ward', 'Child', 'Window', '', 850, 0, 0, 0, 300),
(25, '313-6', 3, 313, 'Ward', 'Child', 'Window', '', 850, 0, 0, 0, 300),
(26, '313-7', 3, 313, 'Ward', 'Child', 'Window', '', 850, 0, 0, 0, 300),
(27, '313-8', 3, 313, 'Ward', 'Child', 'Window', '', 850, 0, 0, 0, 300),
(28, '313-9', 3, 313, 'Ward', 'Child', 'Window', '', 850, 0, 0, 0, 300),
(29, '216-1', 2, 216, 'Ward', 'Maternity', 'Window', 'Maternity', 750, 14050, 3, 0, 300),
(30, '216-2', 2, 216, 'Ward', 'Maternity', 'Window', 'Maternity', 750, 14050, 3, 0, 300),
(31, '216-3', 2, 216, 'Ward', 'Maternity', 'Window', 'Maternity', 750, 14050, 3, 0, 300),
(32, '216-4', 2, 216, 'Ward', 'Maternity', 'Window', 'Maternity', 750, 14050, 3, 0, 300),
(33, '216-5', 2, 216, 'Ward', 'Maternity', 'Window', 'Maternity', 750, 14050, 3, 0, 300),
(34, '216-6', 2, 216, 'Ward', 'Maternity', 'Window', 'Maternity', 750, 14050, 3, 0, 300),
(35, '216-7', 2, 216, 'Ward', 'Maternity', 'Window', 'Maternity', 750, 14050, 3, 0, 300),
(36, '216-8', 2, 216, 'Ward', 'Maternity', 'Window', 'Maternity', 750, 14050, 3, 0, 300),
(37, '204-1', 2, 204, 'Cabin', 'Normal', 'Window', 'Maternity', 1300, 16700, 3, 0, 1000),
(38, '205-1', 2, 205, 'Cabin', 'Normal', 'Window', 'Maternity', 1300, 16700, 3, 0, 1000),
(39, '206-1', 2, 206, 'Cabin', 'Normal', 'Window', 'Maternity', 1300, 16700, 3, 0, 1000),
(40, '201-1', 2, 201, 'Cabin', 'AC', 'Window', 'Maternity', 1600, 17700, 3, 0, 1000),
(41, '202-1', 2, 202, 'Cabin', 'AC', 'Window', 'Maternity', 1600, 17700, 3, 0, 1000),
(42, '203-1', 2, 203, 'Cabin', 'AC', 'Window', 'Maternity', 1600, 17700, 3, 0, 1000),
(43, '212-1', 2, 212, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(44, '213-1', 2, 213, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(45, '213-1', 2, 213, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(46, '301-1', 3, 301, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(47, '302-1', 3, 302, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(48, '303-1', 3, 303, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(49, '304-1', 3, 304, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(50, '305-1', 3, 305, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(51, '306-1', 3, 306, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(52, '307-1', 3, 307, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(53, '308-1', 3, 308, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(54, '309-1', 3, 309, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(55, '310-1', 3, 310, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(56, '311-1', 3, 311, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(57, '312-1', 3, 312, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `bed_invigilators`
--

CREATE TABLE `bed_invigilators` (
  `AI_ID` int(11) NOT NULL,
  `A_ID` longtext NOT NULL,
  `D_ID` longtext DEFAULT 'None',
  `Duty_N_ID` longtext DEFAULT 'None',
  `Assistant_Name` longtext DEFAULT 'None',
  `Assistant_Fee` float DEFAULT 0,
  `N_ID` longtext NOT NULL,
  `B_ID` longtext NOT NULL,
  `Visit_Date` date NOT NULL,
  `Visit_Charge` int(11) NOT NULL,
  `Others` longtext NOT NULL DEFAULT 'None',
  `Others_Fee` float NOT NULL DEFAULT 0,
  `Others_Use_Count` float NOT NULL DEFAULT 0,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `AI_ID` int(11) NOT NULL,
  `D_ID` longtext DEFAULT NULL,
  `Dr_Name` longtext DEFAULT NULL,
  `Dr_Gender` longtext DEFAULT NULL,
  `Specialty` longtext NOT NULL,
  `Department` longtext DEFAULT NULL,
  `Dr_Image` longtext DEFAULT NULL,
  `Wallet` float NOT NULL DEFAULT 0,
  `Basic_Fee` int(11) NOT NULL DEFAULT 0,
  `Second_Visit_Discount` int(11) NOT NULL DEFAULT 0,
  `Patient_Cap` int(11) NOT NULL DEFAULT 0,
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`AI_ID`, `D_ID`, `Dr_Name`, `Dr_Gender`, `Specialty`, `Department`, `Dr_Image`, `Wallet`, `Basic_Fee`, `Second_Visit_Discount`, `Patient_Cap`, `Time_Stamp`) VALUES
(1, 'D-M-001', 'Brig Gen S M Mizanur Rahman', 'Male', 'Adviser Spl', 'Medicine test', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(3, 'D-M-003', 'Col Kazi Ashkar Lateef', 'Male', 'Cl Spl', 'Anesthesiology', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(4, 'D-M-004', 'Col A K M Asaduzzmaan', 'Male', 'Cl Spl', 'Otolaryngology', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(5, 'D-M-005', 'Col Imranul Hasan Murad', 'Male', 'Cl Spl', 'Dermatology', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(6, 'D-M-006', 'Col Abu Daud Md Shariful Islam', 'Male', 'Cl Spl', 'Surgery', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(7, 'D-F-007', 'Lt Col Julia Akter Nira', 'Female', 'Cl Spl', 'Gynae & Obs', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(8, 'D-F-008', 'Lt Col Selina Bagum', 'Female', 'Cl Spl', 'Gynae & Obs', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(9, 'D-M-009', 'Lt Col Mohammad Shahnewaz Hossain Khan', 'Male', 'Cl Spl', 'Orthopaedic', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(13, 'D-F-013', 'Lt Col Shamim Ara Yeasmin', 'Female', 'Cl Spl ', 'Ophthalmology', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(15, 'D-M-015', 'Lt Col Ataul Gani Sarker', 'Male', 'Cl Spl', 'Oral and Maxilofacial Surgery', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(16, 'D-M-016', 'Maj Mohammed Mamun-Ur-Rashid', 'Male', 'Cl Spl', 'Radiology', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(17, 'D-M-017', 'Maj Mohammed Nafees Islam', 'Male', 'Gd Spl', 'Anesthesiology', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(18, 'D-F-018', 'Maj Durdana Maheen', 'Female', 'Gd Spl', 'Pathology', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(19, 'D-M-019', 'Maj F M Ashekullah', 'Male', 'Cl Spl', 'Ophthalmology', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(21, 'D-F-021', 'Dr Saima Afroz Niru', 'Female', 'Spl', 'Gynae & Obs', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(22, 'D-M-022', 'Dr Zahir Uddin Babar', 'Male', 'Spl', 'Dermatology', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(23, 'D-M-023', 'Dr Md Jahangir Alam', 'Male', 'Spl', 'Eye', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(25, 'D-F-025', 'Dr S. Parvin Sadique', 'Female', 'Spl', 'Gynae & Obs', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(26, 'D-M-026', 'Dr Anup Mustafa', 'Male', 'Spl', 'Orthopaedic', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(27, 'D-M-027', 'Dr Mir Iftekhar Mostafiz', 'Male', 'Spl', 'Chest & Asthma', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(28, 'D-F-028', 'Dr Farhana Parveen', 'Female', 'Spl', 'Gynae & Obs', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(29, 'D-M-029', 'Dr Md Moniruzzaman', 'Male', 'Spl', 'Orthopaedic', NULL, 0, 1000, 20, 0, '2021-08-21 10:55:50'),
(31, 'D-M-030', 'Dr. AKM Asaduzzaman Shohag', 'Male', '', 'DMO', NULL, 0, 1000, 20, 0, '2021-10-18 14:31:33'),
(32, 'D-M-031', 'Dr. Al-Amin Sarkar', 'Male', '', 'DMO', NULL, 0, 1000, 20, 0, '2021-10-18 14:32:36'),
(33, 'D-M-032', 'Dr. Naim Abdullah', 'Male', '', 'DMO', NULL, 0, 1000, 20, 0, '2021-10-18 14:33:04'),
(36, 'D-M-033', 'Maj Dr Shahadutth Ullah', 'Male', 'Surgeon', 'ENT', NULL, 0, 1000, 20, 0, '2021-10-18 15:25:03'),
(37, 'D-M-034', 'Maj Al Amin', 'Male', '', 'Radiology', NULL, 0, 1000, 20, 0, '2021-10-18 15:25:56'),
(38, 'D-M-035', 'Dr A.H.M Mohosin (Sujon)', 'Male', '', 'Pediatrics', NULL, 0, 1000, 20, 0, '2021-10-18 15:27:41'),
(39, 'D-M-036', 'Dr. Md. Shah Alam', 'Male', '', 'Medicine', NULL, 0, 1000, 20, 0, '2021-10-18 15:28:14'),
(40, 'D-F-037', 'Dr Tabbasum Trena', 'Female', 'Surgeon', 'DT', NULL, 0, 1000, 20, 0, '2021-10-18 15:30:57'),
(41, 'D-F-038', 'Dr.Kamrun Nahar(Sathi)', 'Female', '', 'Radiology', NULL, 0, 1000, 20, 0, '2021-10-18 15:31:30'),
(42, 'D-F-039', 'Dr Amena Bagum', 'Female', 'Surgeon', 'Gynae', NULL, 0, 1000, 20, 0, '2021-10-18 15:32:03'),
(43, 'D-F-040', 'Lt.Col Dr Kaoser Jahan', 'Female', 'Surgeon', 'Gynae', '', 0, 1000, 20, 0, '2021-10-18 15:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_balance_logs`
--

CREATE TABLE `doctor_balance_logs` (
  `AI_ID` int(11) NOT NULL,
  `D_ID` longtext DEFAULT NULL,
  `B_Date` date DEFAULT NULL,
  `Debit` float DEFAULT 0,
  `Credit` float DEFAULT 0,
  `Commission` float DEFAULT 0,
  `Income` float DEFAULT 0,
  `Current_Balance` float DEFAULT NULL,
  `Acc_ID` longtext DEFAULT NULL,
  `O_ID` int(11) NOT NULL,
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedules`
--

CREATE TABLE `doctor_schedules` (
  `AI_ID` int(11) NOT NULL,
  `D_ID` longtext DEFAULT NULL,
  `F` time DEFAULT NULL,
  `T` time DEFAULT NULL,
  `Sat` varchar(20) DEFAULT 'N/A',
  `Sun` varchar(20) DEFAULT 'N/A',
  `Mon` varchar(20) DEFAULT 'N/A',
  `Tue` varchar(20) DEFAULT 'N/A',
  `Wed` varchar(20) DEFAULT 'N/A',
  `Thu` varchar(20) DEFAULT 'N/A',
  `Fri` varchar(20) DEFAULT 'N/A',
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_schedules`
--

INSERT INTO `doctor_schedules` (`AI_ID`, `D_ID`, `F`, `T`, `Sat`, `Sun`, `Mon`, `Tue`, `Wed`, `Thu`, `Fri`, `Time_Stamp`) VALUES
(383, 'D-M-001', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:26:51'),
(384, 'D-M-003', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(385, 'D-M-004', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(386, 'D-M-005', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(387, 'D-M-006', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(388, 'D-F-007', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(389, 'D-F-008', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(390, 'D-M-009', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(391, 'D-F-013', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(392, 'D-M-015', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(393, 'D-M-016', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(394, 'D-M-017', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(395, 'D-F-018', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(396, 'D-M-019', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(397, 'D-F-021', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(398, 'D-M-022', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(399, 'D-M-023', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(400, 'D-F-025', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(401, 'D-M-026', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(402, 'D-M-027', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(403, 'D-F-028', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(404, 'D-M-029', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(405, 'D-M-030', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(406, 'D-M-031', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(407, 'D-M-032', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(408, 'D-M-033', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(409, 'D-M-034', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(410, 'D-M-035', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(411, 'D-M-036', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(412, 'D-F-037', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(413, 'D-F-038', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(414, 'D-F-039', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(415, 'D-M-040', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_income_log`
--

CREATE TABLE `hospital_income_log` (
  `AI_ID` int(11) NOT NULL,
  `Message` longtext DEFAULT NULL,
  `Debit` float DEFAULT 0,
  `Credit` float DEFAULT 0,
  `Vat` float DEFAULT 0,
  `Service_Charge` float DEFAULT 0 COMMENT 'this is the profit',
  `Total_Income` float DEFAULT 0,
  `Credit_Type` longtext DEFAULT NULL,
  `Entry_Date` date DEFAULT NULL,
  `Entry_Time` time DEFAULT NULL,
  `Entry_Year` year(4) DEFAULT NULL,
  `User_ID` longtext DEFAULT NULL,
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `AI_ID` int(11) NOT NULL,
  `Emp_ID` longtext DEFAULT NULL,
  `Log_Password` longtext DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`AI_ID`, `Emp_ID`, `Log_Password`, `status`, `Time_Stamp`) VALUES
(1, 'R-A-007', '7777', 1, '2021-08-21 11:07:04'),
(4, 'AC-M-001', '5555', 1, '2021-08-21 11:07:04'),
(6, 'R-M-001', '111213', 1, '2021-08-21 11:07:04'),
(7, 'R-M-002', '999897', 1, '2021-08-21 11:07:04'),
(8, 'R-M-003', '595755', 1, '2021-08-21 11:07:04'),
(9, 'R-M-004', '123000', 1, '2021-08-21 11:07:04'),
(10, 'R-M-005', '507090', 1, '2021-08-21 11:07:04'),
(11, 'R-M-006', '975310', 1, '2021-08-21 11:07:04'),
(12, 'R-M-007', '200400', 1, '2021-08-21 11:07:04'),
(13, 'R-M-008', '314253', 1, '2021-08-21 11:07:04'),
(14, 'R-M-009', '900999', 1, '2021-08-21 11:07:04'),
(15, 'R-M-010', '331931', 1, '2021-08-21 11:07:04'),
(16, 'R-F-011', '113355', 1, '2021-08-21 11:07:04'),
(17, 'R-F-012', '886644', 1, '2021-08-21 11:07:04'),
(18, 'R-F-013', '203302', 1, '2021-08-21 11:07:04'),
(19, 'R-F-014', '142856', 1, '2021-08-21 11:07:04'),
(20, 'R-F-015', '907560', 1, '2021-08-21 11:07:04'),
(21, 'R-F-016', '160061', 1, '2021-08-21 11:07:04'),
(22, 'R-F-017', '717171', 1, '2021-08-21 11:07:04'),
(23, 'R-F-018', '800008', 1, '2021-08-21 11:07:04'),
(24, 'R-F-019', '975579', 1, '2021-08-21 11:07:04'),
(25, 'R-F-020', '212021', 1, '2021-08-21 11:07:04'),
(26, 'D-M-001', 'd58j', 1, '2021-08-21 11:07:04'),
(28, 'D-M-003', 'd78d', 1, '2021-08-21 11:07:04'),
(29, 'D-M-004', 'as56', 1, '2021-08-21 11:07:04'),
(30, 'D-M-005', '13ds', 1, '2021-08-21 11:07:04'),
(31, 'D-M-006', '79ud', 1, '2021-08-21 11:07:04'),
(32, 'D-F-007', '3d9s', 1, '2021-08-21 11:07:04'),
(33, 'D-F-008', 'n1l2', 1, '2021-08-21 11:07:04'),
(34, 'D-M-009', 's31t', 1, '2021-08-21 11:07:04'),
(38, 'D-F-013', 's6d5', 1, '2021-08-21 11:07:04'),
(40, 'D-M-015', 'spdf', 1, '2021-08-21 11:07:04'),
(41, 'D-M-016', 'op31', 1, '2021-08-21 11:07:04'),
(42, 'D-M-017', 'qw12', 1, '2021-08-21 11:07:04'),
(43, 'D-F-018', 'tr65', 1, '2021-08-21 11:07:04'),
(44, 'D-M-019', '98fs', 1, '2021-08-21 11:07:04'),
(46, 'D-F-021', 'd9da', 1, '2021-08-21 11:07:04'),
(47, 'D-M-022', 'c9d1', 1, '2021-08-21 11:07:04'),
(48, 'D-M-023', 'cv56', 1, '2021-08-21 11:07:04'),
(50, 'D-F-025', 'bm45', 1, '2021-08-21 11:07:04'),
(51, 'D-M-026', 'dm78', 1, '2021-08-21 11:07:04'),
(52, 'D-M-027', 'wp39', 1, '2021-08-21 11:07:04'),
(53, 'D-F-028', 'gy96', 1, '2021-08-21 11:07:04'),
(54, 'D-M-029', 'mo29', 1, '2021-08-21 11:07:04'),
(55, 'N-A-007', '7777', 1, '2021-10-18 15:13:54'),
(57, 'OT-A-007', '7777', 1, '2021-10-24 10:55:57'),
(58, 'D-M-032', 'na32', 1, '2021-11-15 07:19:25'),
(59, 'D-M-030', 'dmo5', 1, '2021-11-17 16:26:35'),
(60, 'D-M-031', '58jk', 1, '2021-11-17 16:26:35'),
(61, 'D-M-033', '89rk', 1, '2021-11-17 16:29:19'),
(62, 'D-M-034', 'ime5', 1, '2021-11-17 16:29:19'),
(63, 'D-M-035', 'mhm1', 1, '2021-11-17 16:29:19'),
(64, 'D-M-036', 'tmk5', 1, '2021-11-17 16:29:19'),
(65, 'D-F-040', 'mhuf', 1, '2021-11-17 16:29:19'),
(66, 'D-F-037', 'lk86', 1, '2021-11-17 16:29:19'),
(67, 'D-F-038', 'lo85', 1, '2021-11-17 16:29:19'),
(68, 'D-F-039', '52pl', 1, '2021-11-17 16:29:19'),
(69, 'N-F-001', 'n148', 1, '2021-11-17 17:02:32'),
(70, 'N-F-002', '25n8', 1, '2021-11-17 17:06:06'),
(71, 'N-F-003', '68n5', 1, '2021-11-17 17:06:06'),
(72, 'N-F-004', '47n8', 1, '2021-11-17 17:06:06'),
(73, 'N-F-005', 'n785', 1, '2021-11-17 17:06:06'),
(74, 'N-F-006', '56n5', 1, '2021-11-17 17:06:06'),
(75, 'N-F-007', '6n92', 1, '2021-11-17 17:06:06'),
(76, 'N-F-008', 'n3n6', 1, '2021-11-17 17:06:06'),
(77, 'N-F-009', 'm5n6', 1, '2021-11-17 17:06:06'),
(78, 'N-F-010', '69j5', 1, '2021-11-17 17:06:06'),
(79, 'N-F-011', 'gg69', 1, '2021-11-17 17:06:06'),
(80, 'OT-M-001', 'lm56', 1, '2021-11-17 17:43:04'),
(81, 'OT-M-002', '15jk', 1, '2021-11-17 17:44:07'),
(82, 'OT-F-003', '13kf', 1, '2021-11-17 17:44:07'),
(83, 'OT-F-004', '48j6', 1, '2021-11-17 17:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `AI_ID` int(11) NOT NULL,
  `N_ID` longtext NOT NULL,
  `N_Name` longtext NOT NULL,
  `N_Gender` longtext NOT NULL,
  `N_Image` longtext NOT NULL,
  `Wallet` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`AI_ID`, `N_ID`, `N_Name`, `N_Gender`, `N_Image`, `Wallet`, `Timestamp`) VALUES
(1, 'N-F-001', 'Kohinur Akter', 'Female', '', 0, '2021-10-18 14:15:53'),
(2, 'N-F-002', 'Shanta Mariya', 'Female', '', 0, '2021-10-18 14:17:48'),
(3, 'N-F-003', 'Kazi Maksuda Akter', 'Female', '', 0, '2021-10-18 14:17:48'),
(4, 'N-F-004', 'Neshat Akter', 'Female', '', 0, '2021-10-18 14:19:07'),
(5, 'N-F-005', 'Salma Akter', 'Female', '', 0, '2021-10-18 14:19:07'),
(6, 'N-F-006', 'Tanjina Akter', 'Female', '', 0, '2021-10-18 14:20:02'),
(7, 'N-F-007', 'Tithi Podder', 'Female', '', 0, '2021-10-18 14:20:02'),
(8, 'N-F-008', 'Fahima Parvin', 'Female', '', 0, '2021-10-18 14:20:55'),
(9, 'N-F-009', 'Popyara', 'Female', '', 0, '2021-10-18 14:20:55'),
(10, 'N-F-010', 'Sunjida AKter', 'Female', '', 0, '2021-10-18 14:21:22'),
(11, 'N-F-011', 'Shahanag Pervin', 'Female', '', 0, '2021-10-18 14:21:22'),
(12, 'N-A-007', 'Jason Bourn', 'None', '', 0, '2021-10-18 15:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_balance_logs`
--

CREATE TABLE `nurse_balance_logs` (
  `AI_ID` int(11) NOT NULL,
  `N_ID` longtext NOT NULL,
  `B_Date` date NOT NULL,
  `Debit` float NOT NULL DEFAULT 0,
  `Credit` float NOT NULL DEFAULT 0,
  `Current_Balance` float NOT NULL,
  `Acc_ID` longtext NOT NULL,
  `O_ID` longtext DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `others_info`
--

CREATE TABLE `others_info` (
  `AI_ID` int(11) NOT NULL,
  `Other_Name` longtext NOT NULL,
  `Unit` longtext NOT NULL,
  `Total` int(11) NOT NULL,
  `Hospital` int(11) DEFAULT 0,
  `DMO` int(11) DEFAULT 0,
  `Nurse` int(11) DEFAULT 0,
  `Assistant` int(11) DEFAULT 0,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `others_info`
--

INSERT INTO `others_info` (`AI_ID`, `Other_Name`, `Unit`, `Total`, `Hospital`, `DMO`, `Nurse`, `Assistant`, `Time_Stamp`) VALUES
(1, 'Nebulizer ', 'Use', 200, 200, 0, 0, 0, '2021-11-08 08:46:03'),
(2, 'Oxygen', 'Hour', 100, 100, 0, 0, 0, '2021-11-08 08:46:03'),
(3, 'NG Tube\r\n', 'Use', 200, 100, 100, 0, 0, '2021-11-08 08:46:03'),
(4, 'Cannula\r\n', 'Use', 200, 100, 0, 100, 0, '2021-11-08 08:46:03'),
(5, 'Anema\r\n', 'Use', 200, 100, 0, 0, 100, '2021-11-08 08:51:08'),
(6, 'Catheter', 'Use', 200, 100, 0, 0, 100, '2021-11-08 08:51:08'),
(7, 'Phototherapy', 'Day', 500, 500, 0, 0, 0, '2021-11-08 08:51:08'),
(8, 'Warmer', 'Day', 1500, 1500, 0, 0, 0, '2021-11-08 08:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `ot_assistant_logs`
--

CREATE TABLE `ot_assistant_logs` (
  `AI_ID` int(11) NOT NULL,
  `O_ID` int(11) NOT NULL,
  `Assistant_Name` longtext NOT NULL,
  `Assistant_Fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ot_logs`
--

CREATE TABLE `ot_logs` (
  `O_ID` int(11) NOT NULL,
  `P_ID` longtext NOT NULL,
  `A_ID` longtext NOT NULL,
  `D_ID` longtext NOT NULL,
  `OTO_ID` longtext NOT NULL,
  `OT_No` int(11) NOT NULL,
  `O_Type` longtext NOT NULL,
  `Anesthesia_Type` longtext NOT NULL,
  `O_Date` date NOT NULL,
  `O_Time` time NOT NULL,
  `O_Duration` longtext NOT NULL,
  `OT_Charge` int(11) NOT NULL,
  `OT_Charge_Discount` int(11) NOT NULL,
  `OT_Charge_Income` int(11) NOT NULL,
  `Others` longtext NOT NULL,
  `Others_Charges` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ot_nurses_logs`
--

CREATE TABLE `ot_nurses_logs` (
  `AI_ID` int(11) NOT NULL,
  `N_ID` longtext NOT NULL,
  `O_ID` int(11) NOT NULL,
  `Nurse_Name` longtext NOT NULL,
  `Nurse_Fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ot_operator`
--

CREATE TABLE `ot_operator` (
  `AI_ID` int(11) NOT NULL,
  `OTO_ID` longtext NOT NULL,
  `OTO_Name` longtext NOT NULL,
  `OTO_Gender` longtext NOT NULL,
  `OTO_Image` longtext NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ot_operator`
--

INSERT INTO `ot_operator` (`AI_ID`, `OTO_ID`, `OTO_Name`, `OTO_Gender`, `OTO_Image`, `Timestamp`) VALUES
(1, 'OT-A-007', 'Joe Baiden', 'Agent', 'none', '2021-10-24 11:00:06'),
(2, 'OT-M-001', '', 'Male', '', '2021-11-17 17:41:07'),
(3, 'OT-M-002', '', 'Male', '', '2021-11-17 17:41:23'),
(4, 'OT-F-003', '', 'Female', '', '2021-11-17 17:42:14'),
(5, 'OT-F-004', '', 'Female', '', '2021-11-17 17:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `ot_schedules`
--

CREATE TABLE `ot_schedules` (
  `AI_ID` int(11) NOT NULL,
  `P_ID` longtext NOT NULL,
  `OT_No` int(11) NOT NULL,
  `Operation_Date` date NOT NULL,
  `Operation_Start_Time` time NOT NULL,
  `Operation_Type` longtext NOT NULL,
  `Estimated_Duration` longtext NOT NULL,
  `Surgeon_ID` longtext NOT NULL,
  `Surgeon_Name` longtext NOT NULL,
  `OTO_ID` longtext NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `AI_ID` int(11) NOT NULL,
  `P_ID` longtext DEFAULT NULL,
  `Patient_Name` longtext DEFAULT NULL,
  `Patient_Gender` longtext DEFAULT NULL,
  `Patient_Age` int(11) NOT NULL,
  `Cell_Number` longtext DEFAULT NULL,
  `NID` longtext DEFAULT NULL,
  `NID_Type` longtext DEFAULT NULL,
  `Ad_Date` longtext DEFAULT NULL,
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_logs`
--

CREATE TABLE `patient_logs` (
  `AI_ID` int(11) NOT NULL,
  `P_ID` longtext DEFAULT NULL,
  `Ap_Date` date DEFAULT NULL,
  `Ap_Time` longtext DEFAULT NULL,
  `D_ID` longtext DEFAULT NULL,
  `Basic_Fee` int(11) DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `Final_Fee` float DEFAULT NULL,
  `Received` int(11) NOT NULL,
  `Changes` int(11) NOT NULL,
  `Payment_Status` longtext DEFAULT '\'Unpaid\'',
  `Treatment_Status` int(11) DEFAULT 0,
  `Treatment_Date_Time` longtext DEFAULT NULL,
  `Token` int(11) DEFAULT NULL,
  `Random_code` int(11) DEFAULT NULL,
  `R_ID` longtext DEFAULT NULL,
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `AI_ID` int(11) NOT NULL,
  `R_ID` longtext DEFAULT NULL,
  `R_Name` longtext DEFAULT NULL,
  `R_Gender` longtext DEFAULT NULL,
  `R_Image` longtext DEFAULT NULL,
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`AI_ID`, `R_ID`, `R_Name`, `R_Gender`, `R_Image`, `Time_Stamp`) VALUES
(1, 'R-A-007', 'James Bond', 'None', NULL, '2021-10-13 07:07:16'),
(3, 'R-M-001', NULL, 'Male', NULL, '2021-11-17 16:55:36'),
(4, 'R-M-002', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(5, 'R-A-003', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(6, 'R-M-004', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(7, 'R-M-005', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(8, 'R-M-006', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(9, 'R-M-007', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(10, 'R-M-008', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(11, 'R-M-009', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(12, 'R-M-010', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(13, 'R-F-011', NULL, 'Female', NULL, '2021-11-17 16:58:18'),
(14, 'R-F-012', NULL, 'Female', NULL, '2021-11-17 16:59:23'),
(15, 'R-F-013', NULL, 'Female', NULL, '2021-11-17 16:59:23'),
(16, 'R-F-014', NULL, 'Female', NULL, '2021-11-17 16:59:23'),
(17, 'R-F-015', NULL, 'Female', NULL, '2021-11-17 16:59:23'),
(18, 'R-F-016', NULL, 'Female', NULL, '2021-11-17 16:59:23'),
(19, 'R-F-017', NULL, 'Female', NULL, '2021-11-17 16:59:23'),
(20, 'R-F-018', NULL, 'Female', NULL, '2021-11-17 16:59:23'),
(21, 'R-F-019', NULL, 'Female', NULL, '2021-11-17 16:59:23'),
(22, 'R-F-020', NULL, 'Female', NULL, '2021-11-17 16:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `surgeon_logs`
--

CREATE TABLE `surgeon_logs` (
  `AI_ID` int(11) NOT NULL,
  `D_ID` longtext NOT NULL,
  `O_ID` longtext NOT NULL,
  `Surgeon_Name` longtext NOT NULL,
  `Surgeon_Fee` int(11) NOT NULL,
  `Surgeon_Discount` int(11) NOT NULL,
  `Surgeon_Income` int(11) NOT NULL
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
-- Indexes for table `admission_logs`
--
ALTER TABLE `admission_logs`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `anesthesiologist_logs`
--
ALTER TABLE `anesthesiologist_logs`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`B_ID`);

--
-- Indexes for table `bed_invigilators`
--
ALTER TABLE `bed_invigilators`
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
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `nurse_balance_logs`
--
ALTER TABLE `nurse_balance_logs`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `others_info`
--
ALTER TABLE `others_info`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `ot_assistant_logs`
--
ALTER TABLE `ot_assistant_logs`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `ot_logs`
--
ALTER TABLE `ot_logs`
  ADD PRIMARY KEY (`O_ID`);

--
-- Indexes for table `ot_nurses_logs`
--
ALTER TABLE `ot_nurses_logs`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `ot_operator`
--
ALTER TABLE `ot_operator`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `ot_schedules`
--
ALTER TABLE `ot_schedules`
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
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `surgeon_logs`
--
ALTER TABLE `surgeon_logs`
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
-- AUTO_INCREMENT for table `admission_logs`
--
ALTER TABLE `admission_logs`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `anesthesiologist_logs`
--
ALTER TABLE `anesthesiologist_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `bed_invigilators`
--
ALTER TABLE `bed_invigilators`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `doctor_balance_logs`
--
ALTER TABLE `doctor_balance_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;

--
-- AUTO_INCREMENT for table `hospital_income_log`
--
ALTER TABLE `hospital_income_log`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nurse_balance_logs`
--
ALTER TABLE `nurse_balance_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `others_info`
--
ALTER TABLE `others_info`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ot_assistant_logs`
--
ALTER TABLE `ot_assistant_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ot_logs`
--
ALTER TABLE `ot_logs`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ot_nurses_logs`
--
ALTER TABLE `ot_nurses_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ot_operator`
--
ALTER TABLE `ot_operator`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ot_schedules`
--
ALTER TABLE `ot_schedules`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_logs`
--
ALTER TABLE `patient_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `surgeon_logs`
--
ALTER TABLE `surgeon_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
