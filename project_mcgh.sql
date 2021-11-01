-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 07:34 PM
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
(1, 'AC-M-001', 'Hashem', 'Male', 'shamol@gmail.com', '01702315892', 'AC-M-001.jpg', '2021-08-21 10:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `account_variables`
--

CREATE TABLE `account_variables` (
  `AI_ID` int(11) NOT NULL,
  `Vat` float DEFAULT NULL,
  `Commission` float DEFAULT NULL,
  `Updater` longtext DEFAULT NULL,
  `Update_Date` date DEFAULT NULL,
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_variables`
--

INSERT INTO `account_variables` (`AI_ID`, `Vat`, `Commission`, `Updater`, `Update_Date`, `Time_Stamp`) VALUES
(1, 10, 20, 'AC-M-001', '2021-08-17', '2021-08-21 10:14:37');

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
  `OT_Confirmation` int(11) DEFAULT NULL,
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

--
-- Dumping data for table `admission_logs`
--

INSERT INTO `admission_logs` (`A_ID`, `P_ID`, `R_ID`, `B_ID`, `D_ID`, `Pre_Vill`, `Pre_PO`, `Pre_Upa`, `Pre_Dist`, `Per_Vill`, `Per_PO`, `Per_Upa`, `Per_Dist`, `Admission_Date`, `Religion`, `Consultant`, `Emergency_Rel_Add`, `Emergency_Number`, `Ward_Days`, `Cabin_Days`, `Payment_Confirmation`, `OT_Confirmation`, `Package_Confirmation`, `Ligation`, `Third_Seizure`, `Bed_Bill`, `Admission_Fee`, `Paid_Amount`, `Changes`, `Admission_Timestamp`, `Update_Timestamp`, `Update_Date`, `Discount`, `Discharge_Date`) VALUES
(6, 'C-23102021-001', 'R-A-007', '20', 'D-M-001', 'demo pre village 2', 'demo pre  po 2', 'demo pre  upa 2', 'demo pre  dist 2', 'demo per village 2', 'demo per po 2', 'demo per upa 2', 'demo per dist 2', '2021-10-23', 'demo religion 2', 'Brig Gen S M Mizanur Rahman', 'demo address 2', 'demo cell no 2', NULL, NULL, NULL, NULL, 'none', 'no', 'no', NULL, 300, 400, 100, '2021-10-23 08:49:43', NULL, NULL, NULL, NULL),
(7, 'F-23102021-009', 'R-A-007', '37', 'D-F-039', 'demo pre village', 'demo pre  po', 'demo pre  upa', 'demo pre  dist', 'demo per village', 'demo per po', 'demo per upa', 'demo per dist', '2021-10-23', 'demo religion', 'Dr Amena Bagum', 'demo address', 'demo cell no', NULL, NULL, NULL, NULL, 'maternity', 'yes', 'no', NULL, 1000, 1000, 0, '2021-10-23 08:50:58', NULL, NULL, NULL, NULL),
(8, 'M-23102021-010', 'R-A-007', ' ', 'D-M-001', 'demo pre village 2', 'demo pre  po 2', 'demo pre  upa 2', 'demo pre  dist 2', 'demo per village 2', 'demo per po 2', 'demo per upa 2', 'demo per dist 2', '2021-10-23', 'demo religion 2', 'Brig Gen S M Mizanur Rahman', 'demo address', 'demo cell no', NULL, NULL, NULL, NULL, 'none', 'no', 'no', NULL, 0, 0, 0, '2021-10-23 08:53:23', NULL, NULL, NULL, NULL),
(9, 'F-12092021-002', 'R-A-007', '15', 'D-F-025', 'demo pre village', 'demo pre  po', 'demo pre  upa', 'demo pre  dist', 'demo per village 2', 'demo per po 2', 'demo per upa 2', 'demo per dist 2', '2021-10-23', 'demo religion', 'Dr S. Parvin Sadeque', 'demo address', 'demo cell no', NULL, NULL, NULL, NULL, 'maternity', 'yes', 'yes', NULL, 300, 1000, 700, '2021-10-23 10:14:50', NULL, NULL, NULL, NULL),
(10, 'M-12092021-004', 'R-A-007', '4', 'D-M-006', 'demo pre village', 'demo pre  po', 'demo pre  upa 2', 'demo pre  dist', 'demo per village', 'demo per po 2', 'demo per upa', 'demo per dist', '2021-10-23', 'demo religion', 'Col Abu Daud Md Shariful Islam', 'demo address', 'demo cell no 2', NULL, NULL, NULL, NULL, 'none', 'no', 'no', NULL, 300, 500, 200, '2021-10-23 10:42:51', NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `anesthesiologist_logs`
--

INSERT INTO `anesthesiologist_logs` (`AI_ID`, `Ans_ID`, `O_ID`, `Anesthesiologist_Name`, `Anesthesiologist_Fee`, `Anesthesiologist_Discount`, `Anesthesiologist_Income`) VALUES
(3, 'D-M-017', 11, 'Dr Md Jahangir Alam', 1000, 200, 800);

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
(1, '210-1', 2, 210, 'Ward', 'Male', 'Window', '', 750, 0, 0, 1, 300),
(2, '210-2', 2, 210, 'Ward', 'Male', 'Besides Toilet', '', 750, 0, 0, 1, 300),
(3, '210-3', 2, 210, 'Ward', 'Male', 'Besides Toilet', '', 750, 0, 0, 1, 300),
(4, '210-4', 2, 210, 'Ward', 'Male', 'Besides Toilet', '', 750, 0, 0, 1, 300),
(5, '210-5', 2, 210, 'Ward', 'Male', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(6, '210-6', 2, 210, 'Ward', 'Male', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(7, '210-7', 2, 210, 'Ward', 'Male', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(8, '210-8', 2, 210, 'Ward', 'Male', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(9, '210-9', 2, 210, 'Ward', 'Male', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(10, '209-1', 2, 209, 'Ward', 'Female', 'Besides Toilet', '', 750, 0, 0, 1, 300),
(11, '209-2', 2, 209, 'Ward', 'Female', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(12, '209-3', 2, 209, 'Ward', 'Female', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(13, '209-4', 2, 209, 'Ward', 'Female', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(14, '209-5', 2, 209, 'Ward', 'Female', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(15, '209-4', 2, 209, 'Ward', 'Female', 'Besides Toilet', '', 750, 0, 0, 1, 300),
(16, '209-7', 2, 209, 'Ward', 'Female', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(17, '209-8', 2, 209, 'Ward', 'Female', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(18, '209-9', 2, 209, 'Ward', 'Female', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(19, '209-10', 2, 209, 'Ward', 'Female', 'Besides Toilet', '', 750, 0, 0, 0, 300),
(20, '313-1', 3, 313, 'Ward', 'Child', 'Door', '', 850, 0, 0, 1, 300),
(21, '313-2', 3, 313, 'Ward', 'Child', 'Door', '', 850, 0, 0, 0, 300),
(22, '313-3', 3, 313, 'Ward', 'Child', 'Door', '', 850, 0, 0, 0, 300),
(23, '313-4', 3, 313, 'Ward', 'Child', 'Door', '', 850, 0, 0, 0, 300),
(24, '313-5', 3, 313, 'Ward', 'Child', 'Door', '', 850, 0, 0, 0, 300),
(25, '313-6', 3, 313, 'Ward', 'Child', 'Door', '', 850, 0, 0, 0, 300),
(26, '313-7', 3, 313, 'Ward', 'Child', 'Door', '', 850, 0, 0, 0, 300),
(27, '313-8', 3, 313, 'Ward', 'Child', 'Door', '', 850, 0, 0, 0, 300),
(28, '313-9', 3, 313, 'Ward', 'Child', 'Door', '', 850, 0, 0, 0, 300),
(29, '216-1', 2, 216, 'Ward', 'Maternity', 'Inside Toilet', 'Maternity', 750, 14050, 3, 0, 300),
(30, '216-2', 2, 216, 'Ward', 'Maternity', 'Inside Toilet', 'Maternity', 750, 14050, 3, 0, 300),
(31, '216-3', 2, 216, 'Ward', 'Maternity', 'Inside Toilet', 'Maternity', 750, 14050, 3, 0, 300),
(32, '216-4', 2, 216, 'Ward', 'Maternity', 'Inside Toilet', 'Maternity', 750, 14050, 3, 0, 300),
(33, '216-5', 2, 216, 'Ward', 'Maternity', 'Inside Toilet', 'Maternity', 750, 14050, 3, 0, 300),
(34, '216-6', 2, 216, 'Ward', 'Maternity', 'Inside Toilet', 'Maternity', 750, 14050, 3, 0, 300),
(35, '216-7', 2, 216, 'Ward', 'Maternity', 'Inside Toilet', 'Maternity', 750, 14050, 3, 0, 300),
(36, '216-8', 2, 216, 'Ward', 'Maternity', 'Inside Toilet', 'Maternity', 750, 14050, 3, 0, 300),
(37, '204-1', 2, 204, 'Cabin', 'Normal', 'Outside Hospital', 'Maternity', 1300, 16700, 3, 1, 1000),
(38, '205-1', 2, 205, 'Cabin', 'Normal', 'Outside Hospital', 'Maternity', 1300, 16700, 3, 0, 1000),
(39, '206-1', 2, 206, 'Cabin', 'Normal', 'Outside Hospital', 'Maternity', 1300, 16700, 3, 0, 1000),
(40, '201-1', 2, 201, 'Cabin', 'AC', 'Under Flyover', 'Maternity', 1600, 17700, 3, 0, 1000),
(41, '202-1', 2, 202, 'Cabin', 'AC', 'Under Flyover', 'Maternity', 1600, 17700, 3, 0, 1000),
(42, '203-1', 2, 203, 'Cabin', 'AC', 'Under Flyover', 'Maternity', 1600, 17700, 3, 0, 1000),
(43, '212-1', 2, 212, 'Cabin', 'Double AC', 'BAIUST', 'Maternity', 2400, 20000, 3, 0, 1000),
(44, '213-1', 2, 213, 'Cabin', 'Double AC', 'BAIUST', 'Maternity', 2400, 20000, 3, 0, 1000),
(45, '213-1', 2, 213, 'Cabin', 'Double AC', 'BAIUST', 'Maternity', 2400, 20000, 3, 0, 1000),
(46, '301-1', 3, 301, 'Cabin', 'Double AC', 'Iffat', 'Maternity', 2400, 20000, 3, 0, 1000),
(47, '302-1', 3, 302, 'Cabin', 'Double AC', 'Iffat', 'Maternity', 2400, 20000, 3, 0, 1000),
(48, '303-1', 3, 303, 'Cabin', 'Double AC', 'Iffat', 'Maternity', 2400, 20000, 3, 0, 1000),
(49, '304-1', 3, 304, 'Cabin', 'Double AC', 'Iffat', 'Maternity', 2400, 20000, 3, 0, 1000),
(50, '305-1', 3, 305, 'Cabin', 'Double AC', 'Iffat', 'Maternity', 2400, 20000, 3, 0, 1000),
(51, '306-1', 3, 306, 'Cabin', 'Double AC', 'Iffat', 'Maternity', 2400, 20000, 3, 0, 1000),
(52, '307-1', 3, 307, 'Cabin', 'Double AC', 'Iffat', 'Maternity', 2400, 20000, 3, 0, 1000),
(53, '308-1', 3, 308, 'Cabin', 'Double AC', 'Iffat', 'Maternity', 2400, 20000, 3, 0, 1000),
(54, '309-1', 3, 309, 'Cabin', 'Double AC', 'Iffat', 'Maternity', 2400, 20000, 3, 0, 1000),
(55, '310-1', 3, 310, 'Cabin', 'Double AC', 'Iffat', 'Maternity', 2400, 20000, 3, 0, 1000),
(56, '311-1', 3, 311, 'Cabin', 'Double AC', 'Iffat', 'Maternity', 2400, 20000, 3, 0, 1000),
(57, '312-1', 3, 312, 'Cabin', 'Double AC', 'Iffat', 'Maternity', 2400, 20000, 3, 0, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `bed_invigilators`
--

CREATE TABLE `bed_invigilators` (
  `AI_ID` int(11) NOT NULL,
  `A_ID` longtext NOT NULL,
  `D_ID` longtext NOT NULL,
  `N_ID` longtext NOT NULL,
  `B_ID` longtext NOT NULL,
  `Visit_Date` date NOT NULL,
  `Visit_Charge` int(11) NOT NULL,
  `Others` longtext NOT NULL,
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
(1, 'D-M-001', 'Brig Gen S M Mizanur Rahman', 'Male', 'Adviser Spl', 'Medicine test', 'D-M-001.jpg', 190.4, 150, 20, 5, '2021-08-21 10:55:50'),
(3, 'D-M-003', 'Col Kazi Askar Lateef', 'Male', 'Cl Spl', 'Anesthesiology', NULL, 0, 230, 15, 0, '2021-08-21 10:55:50'),
(4, 'D-M-004', 'Col A K M Asaduzzaman', 'Male', 'Cl Spl', 'Otolaryngology', NULL, 0, 220, 3, 0, '2021-08-21 10:55:50'),
(5, 'D-M-005', 'Col Imrranul Hasan Murad', 'Male', 'Cl Spl', 'Dermatology', NULL, 0, 210, 5, 0, '2021-08-21 10:55:50'),
(6, 'D-M-006', 'Col Abu Daud Md Shariful Islam', 'Male', 'Cl Spl', 'Surgery', NULL, 0, 10, 7, 0, '2021-08-21 10:55:50'),
(7, 'D-F-007', 'Lt Col Julia Akter Nira', 'Female', 'Cl Spl', 'Gynae & Obs', NULL, 0, 20, 9, 0, '2021-08-21 10:55:50'),
(8, 'D-F-008', 'Lt Col Selina Begum', 'Female', 'Cl Spl', 'Gynae & Obs', NULL, 0, 30, 13, 0, '2021-08-21 10:55:50'),
(9, 'D-M-009', 'Lt Col Mohammad Shahnewa Hossain Khan', 'Male', 'Cl Spl', 'Orthopaedic', NULL, 0, 40, 10, 0, '2021-08-21 10:55:50'),
(13, 'D-F-013', 'Lt Col Shamim Ara Yeasmin', 'Female', 'Cl Spl ', 'Ophthalmology', NULL, 0, 80, 0, 0, '2021-08-21 10:55:50'),
(15, 'D-M-015', 'Lt Col Araul Gani Sarker', 'Male', 'Cl Spl', 'Oral and Maxilofacial Surgery', NULL, 0, 100, 5, 0, '2021-08-21 10:55:50'),
(16, 'D-M-016', 'Maj Mohammad Mamun-Ur-Rashid', 'Male', 'Cl Spl', 'Radiology', NULL, 0, 110, 5, 0, '2021-08-21 10:55:50'),
(17, 'D-M-017', 'Maj Mohammad Nafees Islam', 'Male', 'Gd Spl', 'Anesthesiology', NULL, 0, 120, 0, 0, '2021-08-21 10:55:50'),
(18, 'D-F-018', 'Maj Durdana Maheen', 'Female', 'Gd Spl', 'Pathology', NULL, 0, 130, 2, 0, '2021-08-21 10:55:50'),
(19, 'D-M-019', 'Maj F M Ashekullah', 'Male', 'Cl Spl', 'Ophthalmology', NULL, 0, 140, 0, 0, '2021-08-21 10:55:50'),
(21, 'D-F-021', 'Dr Saima Afroz Niru', 'Female', 'Spl', 'Gynae & Obs', NULL, 0, 160, 20, 0, '2021-08-21 10:55:50'),
(22, 'D-M-022', 'Dr Zahir Uddin Babar', 'Male', 'Spl', 'Dermatology', NULL, 0, 170, 0, 0, '2021-08-21 10:55:50'),
(23, 'D-M-023', 'Dr Md Jahangir Alam', 'Male', 'Spl', 'Eye', NULL, 0, 180, 4, 0, '2021-08-21 10:55:50'),
(25, 'D-F-025', 'Dr S. Parvin Sadeque', 'Female', 'Spl', 'Gynae & Obs', NULL, 0, 200, 4, 0, '2021-08-21 10:55:50'),
(26, 'D-M-026', 'Dr Anup Mustafa', 'Male', 'Spl', 'Orthopaedic', NULL, 0, 150, 2, 0, '2021-08-21 10:55:50'),
(27, 'D-M-027', 'Dr Mir Iftekhar Mostafiz', 'Male', 'Spl', 'Chest & Asthma', NULL, 0, 200, 0, 0, '2021-08-21 10:55:50'),
(28, 'D-F-028', 'Dr Farhana Parvin', 'Female', 'Spl', 'Gynae & Obs', NULL, 0, 50, 6, 0, '2021-08-21 10:55:50'),
(29, 'D-M-029', 'Dr Md Moniruzzaman', 'Male', 'Spl', 'Orthopaedic', NULL, 0, 80, 0, 0, '2021-08-21 10:55:50'),
(31, 'D-M-030', 'Dr. AKM Asaduzzaman Shohag', 'Male', '', 'DMO', NULL, 0, 0, 0, 0, '2021-10-18 14:31:33'),
(32, 'D-M-031', 'Dr. Al-Amin Sarkar', 'Male', '', 'DMO', NULL, 0, 0, 0, 0, '2021-10-18 14:32:36'),
(33, 'D-M-032', 'Dr. Naim Abdullah', 'Male', '', 'DMO', NULL, 0, 0, 0, 0, '2021-10-18 14:33:04'),
(35, 'D-A-007', 'Justin Bieber', 'None', '', NULL, NULL, 0, 0, 0, 0, '2021-10-18 15:17:02'),
(36, 'D-M-033', 'Maj Dr Shahadutth Ullah', 'Male', 'Surgeon', 'ENT', NULL, 0, 700, 0, 0, '2021-10-18 15:25:03'),
(37, 'D-M-034', 'Maj Al Amin', 'Male', '', 'Radiology', NULL, 0, 800, 0, 0, '2021-10-18 15:25:56'),
(38, 'D-M-035', 'Dr A.H.M Mohosin (Sujon)', 'Male', '', 'Pediatrics', NULL, 0, 700, 0, 0, '2021-10-18 15:27:41'),
(39, 'D-M-036', 'Dr. Md. Shah Alam', 'Male', '', 'Medicine', NULL, 0, 700, 0, 0, '2021-10-18 15:28:14'),
(40, 'D-F-037', 'Dr Tabbasum Trena', 'Female', 'Surgeon', 'DT', NULL, 0, 700, 0, 0, '2021-10-18 15:30:57'),
(41, 'D-F-038', 'Dr.Kamrun Nahar(Sathi)', 'Female', '', 'Radiology', NULL, 0, 700, 0, 0, '2021-10-18 15:31:30'),
(42, 'D-F-039', 'Dr Amena Bagum', 'Female', 'Surgeon', 'Gynae', NULL, 0, 700, 0, 0, '2021-10-18 15:32:03'),
(43, 'D-M-040', 'Lt.Col Dr Kaoser Jahan', 'Male', 'Surgeon', 'Gynae', '0', 0, 700, 0, 0, '2021-10-18 15:41:34');

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
  `Current_Balance` float DEFAULT 0,
  `Acc_ID` longtext DEFAULT NULL,
  `O_ID` int(11) NOT NULL,
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_balance_logs`
--

INSERT INTO `doctor_balance_logs` (`AI_ID`, `D_ID`, `B_Date`, `Debit`, `Credit`, `Commission`, `Income`, `Current_Balance`, `Acc_ID`, `O_ID`, `Time_Stamp`) VALUES
(3, 'D-M-001', '2021-08-25', 0, 2, 0.4, 1.4, 1.4, NULL, 0, '2021-08-25 13:59:30'),
(4, 'D-M-001', '2021-10-15', 0, 135, 27, 94.5, 95.9, NULL, 0, '2021-10-15 12:31:20'),
(5, 'D-M-001', '2021-10-15', 0, 135, 27, 94.5, 190.4, NULL, 0, '2021-10-15 13:02:52'),
(11, 'D-M-023', '2021-11-02', 0, 80, 0, 80, 80, 'OT-A-007', 11, '2021-11-01 18:13:39'),
(12, 'D-M-017', '2021-11-02', 0, 800, 0, 800, 800, 'OT-A-007', 11, '2021-11-01 18:15:46');

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
(380, 'D-M-001', '14:00:00', '17:00:00', '1', '3', '2', '2', '3', '1', 'N/A', '2021-08-21 11:53:30');

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

--
-- Dumping data for table `hospital_income_log`
--

INSERT INTO `hospital_income_log` (`AI_ID`, `Message`, `Debit`, `Credit`, `Vat`, `Service_Charge`, `Total_Income`, `Credit_Type`, `Entry_Date`, `Entry_Time`, `Entry_Year`, `User_ID`, `Time_Stamp`) VALUES
(3, 'Admission fee for patient: C-23102021-001', 0, 300, 30, 270, 270, 'Admission Fee', '2021-10-23', '14:49:43', 2021, 'R-A-007', '2021-10-23 08:49:43'),
(4, 'Admission fee for patient: F-23102021-009', 0, 1000, 100, 900, 900, 'Admission Fee', '2021-10-23', '14:50:58', 2021, 'R-A-007', '2021-10-23 08:50:58'),
(5, 'Admission fee for patient: M-23102021-010', 0, 0, 0, 0, 0, 'Admission Fee', '2021-10-23', '14:53:23', 2021, 'R-A-007', '2021-10-23 08:53:23'),
(6, 'Admission fee for patient: F-12092021-002', 0, 300, 30, 270, 270, 'Admission Fee', '2021-10-23', '16:14:50', 2021, 'R-A-007', '2021-10-23 10:14:50'),
(7, 'Admission fee for patient: M-12092021-004', 0, 300, 30, 270, 270, 'Admission Fee', '2021-10-23', '16:42:51', 2021, 'R-A-007', '2021-10-23 10:42:51');

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
(2, 'R-M-002', '2222', 0, '2021-08-21 11:07:04'),
(3, 'D-M-001', '3333', 1, '2021-08-21 11:07:04'),
(4, 'AC-M-001', '5555', 1, '2021-08-21 11:07:04'),
(5, 'D-M-002', '2222', 0, '2021-08-21 11:07:04'),
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
(26, 'D-M-001', '2713r1', 1, '2021-08-21 11:07:04'),
(27, 'D-M-002', 'u14kh9', 1, '2021-08-21 11:07:04'),
(28, 'D-M-003', '312kr6', 1, '2021-08-21 11:07:04'),
(29, 'D-M-004', '121z14', 1, '2021-08-21 11:07:04'),
(30, 'D-M-005', '9813ad', 1, '2021-08-21 11:07:04'),
(31, 'D-M-006', '414s91', 1, '2021-08-21 11:07:04'),
(32, 'D-F-007', 'a314ji', 1, '2021-08-21 11:07:04'),
(33, 'D-F-008', '31s5b9', 1, '2021-08-21 11:07:04'),
(34, 'D-M-009', 'k158u2', 1, '2021-08-21 11:07:04'),
(35, 'D-M-010', '8d3h96', 1, '2021-08-21 11:07:04'),
(36, 'D-F-011', 'j1f98k', 1, '2021-08-21 11:07:04'),
(37, 'D-M-012', 'm1258e', 1, '2021-08-21 11:07:04'),
(38, 'D-F-013', '98k6o3', 1, '2021-08-21 11:07:04'),
(39, 'D-F-014', 'nt26ku', 1, '2021-08-21 11:07:04'),
(40, 'D-M-015', 'k89624', 1, '2021-08-21 11:07:04'),
(41, 'D-M-016', '32589j', 1, '2021-08-21 11:07:04'),
(42, 'D-M-017', 'ji3553', 1, '2021-08-21 11:07:04'),
(43, 'D-F-018', '65lo80', 1, '2021-08-21 11:07:04'),
(44, 'D-M-019', '980a58', 1, '2021-08-21 11:07:04'),
(45, 'D-M-020', 'o698p3', 1, '2021-08-21 11:07:04'),
(46, 'D-F-021', 'j26mb1', 1, '2021-08-21 11:07:04'),
(47, 'D-M-022', '25i89h', 1, '2021-08-21 11:07:04'),
(48, 'D-M-023', 'h125j9', 1, '2021-08-21 11:07:04'),
(49, 'D-M-024', '846f2u', 1, '2021-08-21 11:07:04'),
(50, 'D-F-025', 'y4io58', 1, '2021-08-21 11:07:04'),
(51, 'D-M-026', 'k547p0', 1, '2021-08-21 11:07:04'),
(52, 'D-M-027', '6p9d28', 1, '2021-08-21 11:07:04'),
(53, 'D-F-028', '9i873w', 1, '2021-08-21 11:07:04'),
(54, 'D-M-029', 'm5u320', 1, '2021-08-21 11:07:04'),
(55, 'N-A-007', '7777', 1, '2021-10-18 15:13:54'),
(56, 'D-A-007', '7777', 1, '2021-10-18 15:17:48'),
(57, 'OT-A-007', '7777', 1, '2021-10-24 10:55:57');

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

--
-- Dumping data for table `ot_logs`
--

INSERT INTO `ot_logs` (`O_ID`, `P_ID`, `A_ID`, `D_ID`, `OTO_ID`, `OT_No`, `O_Type`, `Anesthesia_Type`, `O_Date`, `O_Time`, `O_Duration`, `OT_Charge`, `OT_Charge_Discount`, `OT_Charge_Income`, `Others`, `Others_Charges`, `Total`, `Timestamp`) VALUES
(9, 'M-12092021-004', '10', 'D-M-006', 'OT-A-007', 1, 'demo o type', 'demo a type', '2021-11-01', '14:22:00', '00 hr 00 min', 10, 5, 5, 'demo other', 7, 12, '2021-11-01 13:39:47'),
(10, 'M-12092021-004', '10', 'D-M-006', 'OT-A-007', 1, 'demo o type', 'demo a type', '2021-11-01', '14:22:00', '00 hr 00 min', 10, 5, 5, 'demo other', 7, 12, '2021-11-01 15:53:22'),
(11, 'M-12092021-004', '10', 'D-M-006', 'OT-A-007', 2, 'demo o type', 'demo a type', '2021-11-02', '12:00:00', '00 hr 00 min', 10, 5, 5, 'demo other', 7, 12, '2021-11-01 18:13:26');

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
(1, 'OT-A-007', 'Joe Baiden', 'Agent', 'none', '2021-10-24 11:00:06');

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

--
-- Dumping data for table `ot_schedules`
--

INSERT INTO `ot_schedules` (`AI_ID`, `P_ID`, `OT_No`, `Operation_Date`, `Operation_Start_Time`, `Operation_Type`, `Estimated_Duration`, `Surgeon_ID`, `Surgeon_Name`, `OTO_ID`, `Time_Stamp`) VALUES
(5, 'M-12092021-001', 4, '2021-10-04', '14:33:00', 'dummy operation', '00 hr 00 min', 'D-M-032', 'Dr. Naim Abdullah', 'OT-A-007', '2021-10-25 16:42:35'),
(6, 'M-12092021-001', 4, '2021-10-04', '14:33:00', 'dummy operation', '00 hr 00 min', 'D-M-032', 'Dr. Naim Abdullah', 'OT-A-007', '2021-10-25 16:43:44'),
(7, 'M-12092021-001', 4, '2021-10-04', '14:33:00', 'dummy operation', '00 hr 00 min', 'D-M-032', 'Dr. Naim Abdullah', 'OT-A-007', '2021-10-25 16:43:47'),
(8, 'M-12092021-001', 4, '2021-10-04', '14:33:00', 'dummy operation', '00 hr 00 min', 'D-M-032', 'Dr. Naim Abdullah', 'OT-A-007', '2021-10-31 07:52:53'),
(9, 'M-12092021-001', 4, '2021-10-04', '14:33:00', 'dummy operation', '00 hr 00 min', 'D-M-032', 'Dr. Naim Abdullah', 'OT-A-007', '2021-10-31 07:53:19'),
(10, 'M-12092021-001', 4, '2021-10-04', '14:33:00', 'dummy operation', '00 hr 00 min', 'D-M-032', 'Dr. Naim Abdullah', 'OT-A-007', '2021-10-31 07:54:13'),
(11, 'M-12092021-001', 4, '2021-10-04', '14:33:00', 'dummy operation', '00 hr 00 min', 'D-M-032', 'Dr. Naim Abdullah', 'OT-A-007', '2021-10-31 07:54:29'),
(12, 'M-12092021-001', 5, '2021-10-04', '14:33:00', 'dummy operation', '00 hr 00 min', 'D-M-032', 'Dr. Naim Abdullah', 'OT-A-007', '2021-10-31 07:54:31'),
(13, 'M-12092021-001', 4, '2021-10-04', '14:33:00', 'dummy operation', '00 hr 00 min', 'D-M-032', 'Dr. Naim Abdullah', 'OT-A-007', '2021-10-31 08:00:34');

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

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`AI_ID`, `P_ID`, `Patient_Name`, `Patient_Gender`, `Patient_Age`, `Cell_Number`, `NID`, `NID_Type`, `Ad_Date`, `Time_Stamp`) VALUES
(177, 'M-12092021-001', 'thasin', 'Male', 30, '161651658', '1981981', 'Own', '12092021', '2021-09-12 07:09:44'),
(178, 'F-12092021-002', 'Afia', 'Female', 30, '161651658', '8488668515', 'Own', '12092021', '2021-09-12 07:10:26'),
(179, 'M-12092021-003', 'Hanif', 'Male', 20, '181918618', '419814', 'Own', '12092021', '2021-09-12 07:11:01'),
(180, 'M-12092021-004', 'Jamil', 'Male', 30, '161651658', '8488668515', 'Own', '12092021', '2021-09-12 07:11:33'),
(181, 'M-12092021-005', 'Navid', 'Male', 20, '181918618', '151656548684', 'Own', '12092021', '2021-09-12 07:12:12'),
(182, 'M-11102021-001', 'Thasin', 'Male', 12, '1818138', '8488668515', 'Own', '11102021', '2021-10-11 11:05:21'),
(183, 'M-15102021-001', 'Hanif', 'Male', 30, '01982635147', '8488668515', 'Own', '15102021', '2021-10-15 12:24:26'),
(194, 'C-23102021-001', 'Jalal', 'Child', 12, '181918618', '8488668515', 'Own', '23102021', '2021-10-23 08:49:43'),
(195, 'F-23102021-009', 'firoja', 'Female', 20, '161651658', '8488668515', 'Own', '23102021', '2021-10-23 08:50:58'),
(196, 'M-23102021-010', 'Hanif', 'Male', 20, '181918618', '8488668515', 'Own', '23102021', '2021-10-23 08:53:23');

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

--
-- Dumping data for table `patient_logs`
--

INSERT INTO `patient_logs` (`AI_ID`, `P_ID`, `Ap_Date`, `Ap_Time`, `D_ID`, `Basic_Fee`, `Discount`, `Final_Fee`, `Received`, `Changes`, `Payment_Status`, `Treatment_Status`, `Treatment_Date_Time`, `Token`, `Random_code`, `R_ID`, `Time_Stamp`) VALUES
(123, 'M-12092021-001', '2021-09-12', '14:00:00-17:00:00', 'D-M-001', 2, 0, 2, 0, 0, 'Paid', 0, NULL, 1, 214236, 'R-M-001', '2021-09-12 07:09:44'),
(124, 'F-12092021-002', '2021-09-12', '14:00:00-17:00:00', 'D-M-001', 2, 0, 2, 0, 0, 'Paid', 0, NULL, 2, 708168, 'R-M-001', '2021-09-12 07:10:26'),
(125, 'M-12092021-003', '2021-09-12', '14:00:00-17:00:00', 'D-M-001', 2, 0, 2, 0, 0, 'Paid', 0, NULL, 3, 952693, 'R-M-001', '2021-09-12 07:11:01'),
(126, 'M-12092021-004', '2021-09-13', '14:00:00-17:00:00', 'D-M-001', 2, 0, 2, 0, 0, 'Paid', 0, NULL, 1, 672458, 'R-M-001', '2021-09-12 07:11:33'),
(127, 'M-12092021-005', '2021-09-02', '14:00:00-17:00:00', 'D-M-001', 2, 0, 2, 0, 0, 'Paid', 0, NULL, 1, 753159, 'R-M-001', '2021-09-12 07:12:12'),
(128, 'M-11102021-001', '2021-10-11', '14:00:00-17:00:00', 'D-M-001', 2, 0, 2, 0, 0, 'Paid', 0, NULL, 1, 719229, 'R-M-001', '2021-10-11 11:05:22'),
(129, 'M-11102021-001', '2021-10-11', '14:00:00-17:00:00', 'D-M-001', 150, 20, 120, 500, 380, 'Paid', 0, NULL, 2, 423080, 'R-M-001', '2021-10-11 13:31:47'),
(130, 'M-15102021-001', '2021-10-16', '14:00:00-17:00:00', 'D-M-001', 150, 10, 135, 500, 365, 'Paid', 1, NULL, 1, 535478, 'R-A-001', '2021-10-15 12:24:26');

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
(1, 'R-A-007', 'James Bond', 'None', NULL, '2021-10-13 07:07:16');

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
-- Dumping data for table `surgeon_logs`
--

INSERT INTO `surgeon_logs` (`AI_ID`, `D_ID`, `O_ID`, `Surgeon_Name`, `Surgeon_Fee`, `Surgeon_Discount`, `Surgeon_Income`) VALUES
(5, 'D-M-023', '11', 'Dr Md Jahangir Alam', 100, 20, 80);

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
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `anesthesiologist_logs`
--
ALTER TABLE `anesthesiologist_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;

--
-- AUTO_INCREMENT for table `hospital_income_log`
--
ALTER TABLE `hospital_income_log`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ot_assistant_logs`
--
ALTER TABLE `ot_assistant_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ot_logs`
--
ALTER TABLE `ot_logs`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ot_nurses_logs`
--
ALTER TABLE `ot_nurses_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ot_operator`
--
ALTER TABLE `ot_operator`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ot_schedules`
--
ALTER TABLE `ot_schedules`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `patient_logs`
--
ALTER TABLE `patient_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surgeon_logs`
--
ALTER TABLE `surgeon_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
