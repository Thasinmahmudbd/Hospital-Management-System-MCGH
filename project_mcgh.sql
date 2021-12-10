-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 08:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
  `Emergency_Fee` int(11) NOT NULL,
  `ER_Hospital_Percentage` int(11) NOT NULL,
  `Dental_Hospital_Percentage` int(11) NOT NULL,
  `Pathology_Hospital_Percentage` int(11) NOT NULL,
  `Physio_Hospital_Percentage` int(11) NOT NULL,
  `Updater` longtext DEFAULT NULL,
  `Update_Date` date DEFAULT NULL,
  `Time_Stamp` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_variables`
--

INSERT INTO `account_variables` (`AI_ID`, `Vat`, `Commission`, `Invigilator_Fee`, `Emergency_Fee`, `ER_Hospital_Percentage`, `Dental_Hospital_Percentage`, `Pathology_Hospital_Percentage`, `Physio_Hospital_Percentage`, `Updater`, `Update_Date`, `Time_Stamp`) VALUES
(1, 0, 25, 500, 200, 50, 50, 100, 50, 'AC-M-001', '2021-08-17', '2021-08-21 10:14:37');

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

--
-- Dumping data for table `admission_logs`
--

INSERT INTO `admission_logs` (`A_ID`, `P_ID`, `R_ID`, `B_ID`, `D_ID`, `Pre_Vill`, `Pre_PO`, `Pre_Upa`, `Pre_Dist`, `Per_Vill`, `Per_PO`, `Per_Upa`, `Per_Dist`, `Admission_Date`, `Religion`, `Consultant`, `Emergency_Rel_Add`, `Emergency_Number`, `Ward_Days`, `Cabin_Days`, `Payment_Confirmation`, `OT_Confirmation`, `Package_Confirmation`, `Ligation`, `Third_Seizure`, `Bed_Bill`, `Admission_Fee`, `Paid_Amount`, `Changes`, `Admission_Timestamp`, `Update_Timestamp`, `Update_Date`, `Discount`, `Discharge_Date`) VALUES
(15, 'M-18112021-002', 'R-A-007', '37', 'D-M-004', 'W', 'W', 'W', 'W', 'W', 'W', 'W', 'W', '2021-11-18', 'EE', 'Col A K M Asaduzzmaan', 'RR', '222222', 0, NULL, NULL, NULL, 'none', 'no', 'no', NULL, 1000, 1000, 300, '2021-11-18 08:45:04', '2021-11-18 08:46:52', '2021-11-18', NULL, NULL),
(16, 'M-18112021-005', 'R-A-007', '1', 'D-M-001', 'dsfaasd', 'fss', 'dffs', 'fsfs', 'dsfaasd', 'fss', 'dffs', 'fsfs', '2021-11-18', 'islam', 'Brig Gen S M Mizanur Rahman', 'sdfadf', 'dfsffs', NULL, 0, NULL, NULL, 'none', 'no', 'no', NULL, 300, 0, 700, '2021-11-18 09:04:05', '2021-11-18 09:05:02', '2021-11-18', NULL, NULL),
(17, 'F-18112021-010', 'R-F-012', ' ', 'D-M-001', 'Bara Shal Ghor', 'Bara Shal Ghor', 'debidwar', 'Comilla', 'Bara Shal Ghor', 'Bara Shal Ghor', 'debidwar', 'Comilla', '2021-11-18', 'islam', 'Brig Gen S M Mizanur Rahman', 'na', '017', NULL, NULL, NULL, NULL, 'none', 'no', 'no', NULL, 0, 0, 0, '2021-11-18 10:00:08', NULL, NULL, NULL, NULL),
(18, 'M-27112021-001', 'R-A-007', '46', 'D-F-025', 'demo pre village', 'demo pre  po', 'demo pre  upa', 'demo pre  dist', 'demo pre village 2', 'demo pre  po', 'demo pre  upa', 'demo pre  dist', '2021-11-27', 'demo religion', 'Dr S. Parvin Sadique', 'demo address', '019856589', NULL, 0, NULL, 1, 'maternity', 'yes', 'no', NULL, 1000, 0, 0, '2021-11-27 06:38:24', '2021-11-27 06:40:03', '2021-11-27', NULL, NULL);

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
(13, 'D-M-003', 1, 'Col Kazi Ashkar Lateef', 1000, 0, 1000);

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
(37, '204-1', 2, 204, 'Cabin', 'Normal', 'Window', 'Maternity', 1300, 16700, 3, 1, 1000),
(38, '205-1', 2, 205, 'Cabin', 'Normal', 'Window', 'Maternity', 1300, 16700, 3, 1, 1000),
(39, '206-1', 2, 206, 'Cabin', 'Normal', 'Window', 'Maternity', 1300, 16700, 3, 0, 1000),
(40, '201-1', 2, 201, 'Cabin', 'AC', 'Window', 'Maternity', 1600, 17700, 3, 0, 1000),
(41, '202-1', 2, 202, 'Cabin', 'AC', 'Window', 'Maternity', 1600, 17700, 3, 0, 1000),
(42, '203-1', 2, 203, 'Cabin', 'AC', 'Window', 'Maternity', 1600, 17700, 3, 0, 1000),
(43, '212-1', 2, 212, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(44, '213-1', 2, 213, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(45, '213-1', 2, 213, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 0, 1000),
(46, '301-1', 3, 301, 'Cabin', 'Double AC', 'Window', 'Maternity', 2400, 20000, 3, 1, 1000),
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

--
-- Dumping data for table `bed_invigilators`
--

INSERT INTO `bed_invigilators` (`AI_ID`, `A_ID`, `D_ID`, `Duty_N_ID`, `Assistant_Name`, `Assistant_Fee`, `N_ID`, `B_ID`, `Visit_Date`, `Visit_Charge`, `Others`, `Others_Fee`, `Others_Use_Count`, `Timestamp`) VALUES
(1, '15', 'D-M-030', 'None', 'None', 0, 'N-A-007', '37', '2021-11-18', 500, 'None', 0, 0, '2021-11-18 09:00:06'),
(2, '15', 'None', 'None', 'None', 0, 'N-A-007', '37', '2021-11-18', 0, 'Nebulizer ', 200, 1, '2021-11-18 09:02:09'),
(3, '16', 'D-M-006', 'None', 'None', 0, 'N-F-009', '1', '2021-11-18', 500, 'None', 0, 0, '2021-11-18 09:13:21'),
(4, '16', 'D-M-005', 'None', 'None', 0, 'N-F-002', '1', '2021-11-18', 500, 'None', 0, 0, '2021-11-18 09:19:17'),
(5, '16', 'D-M-030', 'None', 'None', 0, 'N-F-009', '1', '2021-11-18', 500, 'None', 0, 0, '2021-11-18 09:38:11'),
(6, '16', 'None', 'None', 'None', 0, 'N-F-009', '1', '2021-11-18', 0, 'Oxygen', 100, 1, '2021-11-18 09:40:05'),
(7, '16', 'D-F-039', 'None', 'None', 0, 'N-F-009', '1', '2021-11-18', 500, 'None', 0, 0, '2021-11-18 09:44:02'),
(8, '16', 'None', 'None', 'None', 0, 'N-F-009', '1', '2021-11-18', 0, 'Oxygen', 100, 1, '2021-11-18 09:45:10'),
(9, '16', 'None', 'None', 'None', 0, 'N-F-002', '1', '2021-11-18', 0, 'Nebulizer ', 200, 1, '2021-11-18 09:49:47'),
(10, '18', 'D-M-004', 'None', 'None', 0, 'N-A-007', '46', '2021-11-27', 500, 'None', 0, 0, '2021-11-27 07:08:50'),
(11, '18', 'None', 'None', 'None', 0, 'N-A-007', '46', '2021-11-27', 0, 'Nebulizer ', 400, 2, '2021-11-27 07:09:47'),
(12, '18', 'None', 'None', 'None', 0, 'N-A-007', '46', '2021-11-27', 0, 'Oxygen', 200, 2, '2021-11-27 07:10:19'),
(13, '18', 'D-F-028', 'None', 'None', 0, 'N-A-007', '46', '2021-11-27', 0, 'NG Tube\r\n', 1000, 5, '2021-11-27 07:10:44'),
(14, '18', 'None', 'None', 'halima', 100, 'N-A-007', '46', '2021-11-27', 0, 'Anema\r\n', 200, 1, '2021-11-27 07:11:11'),
(15, '18', 'None', 'N-F-004', 'None', 0, 'N-A-007', '46', '2021-11-27', 0, 'Cannula\r\n', 400, 2, '2021-11-27 07:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `dental_info`
--

CREATE TABLE `dental_info` (
  `AI_ID` int(11) NOT NULL,
  `Test_Name` longtext NOT NULL,
  `Rate` longtext NOT NULL,
  `State` int(11) NOT NULL DEFAULT 1,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dental_info`
--

INSERT INTO `dental_info` (`AI_ID`, `Test_Name`, `Rate`, `State`, `Time_Stamp`) VALUES
(1, 'Dental X-ray (Intra Oral Film)', '150', 1, '2021-11-25 13:06:30'),
(2, 'Ultrasonic Scaling', '1000-1500', 1, '2021-11-25 13:18:48'),
(3, 'Temporary Filling/Dressing', '500', 1, '2021-11-25 13:18:48'),
(4, 'Permanent Filling Amalgam', '1000-1200', 1, '2021-11-25 13:18:48'),
(5, 'Root Canal Treatment (Single Root)', '3500', 1, '2021-11-25 13:18:48'),
(6, 'Root Canal Treatment (Multi Root)', '4000', 1, '2021-11-25 13:18:48'),
(7, 'Extraction (Deciduous) Single Tooth', '500', 1, '2021-11-25 13:18:48'),
(8, 'Extraction (Permanent) Single Tooth', '1500-2000', 1, '2021-11-25 13:18:48'),
(9, 'Surgical Extraction/Impacted Tooth Under L/A', '4000-6000', 1, '2021-11-25 13:18:48'),
(10, 'Minor Oral Surgery Under L/A', '5000-7000', 1, '2021-11-25 13:18:48'),
(11, 'Fracture Mandible/Maxilla (Close Reduction) Under L/A', '8000-10000', 1, '2021-11-25 13:18:48'),
(12, 'Partial Denture (Per Teeth)', '1000-1500', 1, '2021-11-25 13:18:48'),
(13, 'Porcelin Crown (Per Unit)', '3000-4000', 1, '2021-11-25 13:18:48'),
(14, 'Light Cured Filling', '1000-1500', 1, '2021-11-25 13:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `dental_log`
--

CREATE TABLE `dental_log` (
  `AI_ID` int(11) NOT NULL,
  `Dental_Test_No` int(11) NOT NULL,
  `P_ID` longtext NOT NULL,
  `R_ID` longtext NOT NULL,
  `D_ID` longtext DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `Paid` int(11) DEFAULT NULL,
  `Received` int(11) DEFAULT NULL,
  `Changes` int(11) DEFAULT NULL,
  `Payment_Status` longtext DEFAULT NULL,
  `Due_Amount` int(11) DEFAULT NULL,
  `Total_Amount` int(11) DEFAULT NULL,
  `Payable_Amount` int(11) DEFAULT NULL,
  `Reg_Date` date DEFAULT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dental_log`
--

INSERT INTO `dental_log` (`AI_ID`, `Dental_Test_No`, `P_ID`, `R_ID`, `D_ID`, `Discount`, `Paid`, `Received`, `Changes`, `Payment_Status`, `Due_Amount`, `Total_Amount`, `Payable_Amount`, `Reg_Date`, `Time_Stamp`) VALUES
(29, 1, 'M-04122021-001', 'R-A-007', 'D-M-015', 20, 5000, 1000, -80, NULL, 80, 6350, 5080, '2021-12-04', '2021-12-04 08:00:12'),
(30, 30, 'M-04122021-002', 'R-A-007', 'D-F-037', 10, 4000, 3000, -2000, NULL, 4730, 9700, 8730, '2021-12-04', '2021-12-04 08:40:02'),
(31, 31, 'M-07122021-001', 'R-A-007', 'D-M-015', 10, 4000, 1000, -5000, 'Paid', 5000, 10000, 9000, '2021-12-07', '2021-12-07 14:55:37'),
(33, 32, 'M-09122021-006', 'R-A-007', 'D-M-015', 35, 150, 150, 50, 'Paid', -50, 150, 100, '2021-12-09', '2021-12-09 17:59:48'),
(34, 34, 'M-10122021-001', 'R-A-007', 'D-M-015', 20, 1000, 1000, -7000, 'Paid', 7000, 10000, 8000, '2021-12-10', '2021-12-09 18:01:49'),
(35, 35, 'M-10122021-002', 'R-A-007', 'D-M-015', 16.65, 10500, 1500, 500, 'Paid', -500, 12000, 10000, '2021-12-10', '2021-12-09 18:19:24'),
(36, 36, 'M-10122021-003', 'R-A-007', 'D-M-015', 20, 6400, 1000, 600, 'Paid', -600, 8000, 6400, '2021-12-10', '2021-12-09 18:35:15'),
(37, 37, 'M-10122021-004', 'R-A-007', 'D-M-015', 20, 8000, 1500, 500, 'Paid', 0, 10000, 8000, '2021-12-10', '2021-12-09 18:46:30'),
(38, 38, 'M-10122021-005', 'R-A-007', 'D-M-015', 20, 8000, 1500, 500, 'Paid', 0, 10000, 8000, '2021-12-10', '2021-12-09 19:05:10'),
(39, 39, 'M-10122021-006', 'R-A-007', 'D-M-015', 0, 2000, 1500, 500, 'Paid', 0, 2000, 2000, '2021-12-10', '2021-12-09 19:09:25'),
(40, 40, 'M-10122021-007', 'R-A-007', 'D-M-015', 0, 500, 500, 350, 'Paid', 0, 150, 150, '2021-12-10', '2021-12-09 19:10:59'),
(41, 41, 'M-10122021-008', 'R-A-007', 'D-M-015', 0, 150, 500, 350, 'Paid', 0, 150, 150, '2021-12-10', '2021-12-09 19:17:43'),
(42, 42, 'M-10122021-009', 'R-A-007', 'D-M-015', 20, 8000, 7000, 1000, 'Paid', 0, 10000, 8000, '2021-12-10', '2021-12-09 19:18:53'),
(43, 43, 'M-10122021-012', 'R-A-007', 'D-M-015', 20, 4800, 3000, 200, 'Paid', 0, 6000, 4800, '2021-12-10', '2021-12-10 13:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `dental_test_log`
--

CREATE TABLE `dental_test_log` (
  `AI_ID` int(11) NOT NULL,
  `Dental_Info_AI_ID` int(11) NOT NULL,
  `Dental_Test_No` int(11) NOT NULL,
  `Fee` int(11) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dental_test_log`
--

INSERT INTO `dental_test_log` (`AI_ID`, `Dental_Info_AI_ID`, `Dental_Test_No`, `Fee`, `Time_Stamp`) VALUES
(47, 1, 1, 150, '2021-12-04 08:00:18'),
(48, 12, 1, 1200, '2021-12-04 08:00:27'),
(49, 9, 1, 5000, '2021-12-04 08:00:34'),
(50, 7, 30, 500, '2021-12-04 08:40:08'),
(51, 8, 30, 2000, '2021-12-04 08:40:16'),
(52, 14, 30, 1000, '2021-12-04 08:40:27'),
(53, 12, 30, 1200, '2021-12-04 08:40:33'),
(54, 5, 30, 3500, '2021-12-04 08:40:49'),
(55, 2, 30, 1500, '2021-12-04 08:40:55'),
(56, 11, 31, 10000, '2021-12-07 14:55:47'),
(57, 1, 32, 150, '2021-12-09 17:59:59'),
(58, 8, 34, 2000, '2021-12-09 18:01:55'),
(59, 10, 34, 6000, '2021-12-09 18:02:01'),
(60, 2, 34, 1500, '2021-12-09 18:02:07'),
(61, 7, 34, 500, '2021-12-09 18:02:15'),
(62, 11, 35, 8000, '2021-12-09 18:19:32'),
(63, 6, 35, 4000, '2021-12-09 18:19:41'),
(64, 11, 36, 8000, '2021-12-09 18:35:25'),
(65, 11, 37, 10000, '2021-12-09 18:46:37'),
(66, 11, 38, 10000, '2021-12-09 19:05:17'),
(67, 8, 39, 2000, '2021-12-09 19:09:33'),
(68, 1, 40, 150, '2021-12-09 19:11:05'),
(69, 1, 41, 150, '2021-12-09 19:17:49'),
(70, 11, 42, 10000, '2021-12-09 19:19:00'),
(71, 8, 43, 2000, '2021-12-10 13:12:23'),
(72, 6, 43, 4000, '2021-12-10 13:12:29');

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
(3, 'D-M-003', 'Col Kazi Ashkar Lateef', 'Male', 'Cl Spl', 'Anesthesiology', NULL, 1000, 700, 20, 0, '2021-08-21 10:55:50'),
(4, 'D-M-004', 'Col A K M Asaduzzmaan', 'Male', 'Cl Spl', 'Otolaryngology', NULL, 500, 800, 20, 0, '2021-08-21 10:55:50'),
(5, 'D-M-005', 'Col Imranul Hasan Murad', 'Male', 'Cl Spl', 'Dermatology', NULL, 0, 700, 20, 0, '2021-08-21 10:55:50'),
(6, 'D-M-006', 'Col Abu Daud Md Shariful Islam', 'Male', 'Cl Spl', 'Surgery', NULL, 0, 700, 20, 0, '2021-08-21 10:55:50'),
(7, 'D-F-007', 'Lt Col Julia Akter Nira', 'Female', 'Cl Spl', 'Gynae & Obs', NULL, 0, 600, 20, 0, '2021-08-21 10:55:50'),
(8, 'D-F-008', 'Lt Col Selina Bagum', 'Female', 'Cl Spl', 'Gynae & Obs', NULL, 0, 600, 20, 0, '2021-08-21 10:55:50'),
(9, 'D-M-009', 'Lt Col Mohammad Shahnewaz Hossain Khan', 'Male', 'Cl Spl', 'Orthopaedic', NULL, 0, 600, 20, 0, '2021-08-21 10:55:50'),
(13, 'D-F-013', 'Lt Col Shamim Ara Yeasmin', 'Female', 'Cl Spl ', 'Ophthalmology', NULL, 0, 600, 20, 0, '2021-08-21 10:55:50'),
(15, 'D-M-015', 'Lt Col Ataul Gani Sarker', 'Male', 'Oral and Maxilofacial Surgery', 'Dental', NULL, 25550, 600, 20, 0, '2021-08-21 10:55:50'),
(16, 'D-M-016', 'Maj Mohammed Mamun-Ur-Rashid', 'Male', 'Cl Spl', 'Radiology', NULL, 0, 0, 20, 0, '2021-08-21 10:55:50'),
(17, 'D-M-017', 'Maj Mohammed Nafees Islam', 'Male', 'Gd Spl', 'Anesthesiology', NULL, 0, 0, 20, 0, '2021-08-21 10:55:50'),
(18, 'D-F-018', 'Maj Durdana Maheen', 'Female', 'Gd Spl', 'Pathology', NULL, 0, 0, 20, 0, '2021-08-21 10:55:50'),
(19, 'D-M-019', 'Maj F M Ashekullah', 'Male', 'Cl Spl', 'Ophthalmology', NULL, 0, 600, 20, 0, '2021-08-21 10:55:50'),
(21, 'D-F-021', 'Dr Saima Afroz Niru', 'Female', 'Spl', 'Gynae & Obs', NULL, 0, 700, 20, 0, '2021-08-21 10:55:50'),
(22, 'D-M-022', 'Dr Zahir Uddin Babar', 'Male', 'Spl', 'Dermatology', NULL, 0, 700, 20, 0, '2021-08-21 10:55:50'),
(23, 'D-M-023', 'Dr Md Jahangir Alam', 'Male', 'Spl', 'Eye', NULL, 0, 600, 20, 0, '2021-08-21 10:55:50'),
(25, 'D-F-025', 'Dr S. Parvin Sadique', 'Female', 'Spl', 'Gynae & Obs', NULL, 800, 600, 20, 0, '2021-08-21 10:55:50'),
(26, 'D-M-026', 'Dr Anup Mustafa', 'Male', 'Spl', 'Orthopaedic', NULL, 0, 700, 20, 0, '2021-08-21 10:55:50'),
(27, 'D-M-027', 'Dr Mir Iftekhar Mostafiz', 'Male', 'Spl', 'Chest & Asthma', NULL, 0, 700, 20, 0, '2021-08-21 10:55:50'),
(28, 'D-F-028', 'Dr Farhana Parveen', 'Female', 'Spl', 'Gynae & Obs', NULL, 500, 600, 20, 0, '2021-08-21 10:55:50'),
(29, 'D-M-029', 'Dr Md Moniruzzaman', 'Male', 'Spl', 'Orthopaedic', NULL, 0, 600, 20, 0, '2021-08-21 10:55:50'),
(31, 'D-M-030', 'Dr. AKM Asaduzzaman Shohag', 'Male', '', 'DMO', NULL, 0, 0, 0, 0, '2021-10-18 14:31:33'),
(32, 'D-M-031', 'Dr. Al-Amin Sarkar', 'Male', '', 'DMO', NULL, 0, 0, 0, 0, '2021-10-18 14:32:36'),
(33, 'D-M-032', 'Dr. Naim Abdullah', 'Male', '', 'DMO', NULL, 100, 0, 0, 0, '2021-10-18 14:33:04'),
(36, 'D-M-033', 'Maj Dr Shahadutth Ullah', 'Male', 'Surgeon', 'ENT', NULL, 0, 600, 20, 0, '2021-10-18 15:25:03'),
(37, 'D-M-034', 'Lt Col Dr. Asim Kumar Dotto', 'Male', 'Surgeon', 'Surgery', NULL, 0, 600, 20, 0, '2021-10-18 15:25:56'),
(38, 'D-M-035', 'Dr A.H.M Mohosin (Sujon)', 'Male', '', 'Pediatrics', NULL, 0, 600, 20, 0, '2021-10-18 15:27:41'),
(39, 'D-M-036', 'Dr. Md. Shah Alam', 'Male', '', 'Medicine', NULL, 0, 700, 20, 0, '2021-10-18 15:28:14'),
(40, 'D-F-037', 'Dr Nashid Tabbasum Trena', 'Female', 'Surgeon', 'Dental', NULL, 4000, 600, 20, 0, '2021-10-18 15:30:57'),
(41, 'D-F-038', 'Brig Gen Dr. Sabina Yeasmin', 'Female', '', 'Pediatrics', NULL, 500, 800, 20, 0, '2021-10-18 15:31:30'),
(42, 'D-F-039', 'Dr Amena Bagum', 'Female', 'Surgeon', 'Gynae', NULL, 0, 600, 20, 0, '2021-10-18 15:32:03'),
(43, 'D-F-040', 'Lt.Col Dr Kaoser Jahan', 'Female', 'Surgeon', 'Gynae', '', 0, 600, 20, 0, '2021-10-18 15:41:34'),
(44, 'D-M-002', 'Maj Dr. Mohammad Bayejid', 'Male', 'Medicine', 'Cardiology', NULL, 0, 600, 20, 0, '2021-11-18 10:16:10'),
(45, 'D-M-041', 'MD. Abul Basher', 'Male', '', 'Physiology', NULL, 1250, 0, 0, 0, '2021-12-10 15:29:50'),
(46, 'D-M-042', 'Lt Col Md. Abdul Mannan', 'Male', '', 'Dental', NULL, 0, 600, 20, 0, '2021-12-10 15:29:50');

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

--
-- Dumping data for table `doctor_balance_logs`
--

INSERT INTO `doctor_balance_logs` (`AI_ID`, `D_ID`, `B_Date`, `Debit`, `Credit`, `Commission`, `Income`, `Current_Balance`, `Acc_ID`, `O_ID`, `Time_Stamp`) VALUES
(7, 'D-M-032', '2021-11-27', 0, 100, 0, 100, 100, 'R-A-007', 0, '2021-11-26 18:13:33'),
(8, 'D-F-025', '2021-11-27', 0, 800, 0, 800, 800, 'OT-A-007', 1, '2021-11-27 06:56:53'),
(9, 'D-F-038', '2021-11-27', 0, 500, 0, 500, 500, 'OT-A-007', 1, '2021-11-27 06:57:14'),
(10, 'D-M-004', '2021-11-27', 0, 4800, 0, 4800, 4800, 'OT-A-007', 1, '2021-11-27 06:57:59'),
(11, 'D-M-004', '2021-11-27', 4800, 0, 0, 0, 0, 'OT-A-007', 1, '2021-11-27 06:58:08'),
(12, 'D-M-003', '2021-11-27', 0, 1000, 0, 1000, 1000, 'OT-A-007', 1, '2021-11-27 06:58:38'),
(13, 'D-M-004', '2021-11-27', 0, 500, 0, 500, 500, 'N-A-007', 0, '2021-11-27 07:08:51'),
(14, 'D-F-028', '2021-11-27', 0, 500, 0, 500, 500, 'N-A-007', 0, '2021-11-27 07:10:44'),
(16, 'D-M-015', '2021-12-01', 0, 250, 0, 250, 250, 'R-A-007', 0, '2021-12-01 10:43:46'),
(17, 'D-M-015', '2021-12-01', 0, 500, 0, 500, 750, 'R-A-007', 0, '2021-12-01 10:49:42'),
(18, 'D-F-037', '2021-12-03', 0, 1000, 0, 1000, 1000, 'R-A-007', 0, '2021-12-03 13:21:58'),
(19, 'D-F-037', '2021-12-03', 0, 1000, 0, 1000, 2000, 'R-A-007', 0, '2021-12-03 13:34:30'),
(20, 'D-M-015', '2021-12-04', 0, 2000, 0, 2000, 2750, 'R-A-007', 0, '2021-12-04 08:01:01'),
(21, 'D-F-037', '2021-12-04', 0, 1000, 0, 1000, 3000, 'R-A-007', 0, '2021-12-04 08:41:15'),
(22, NULL, '2021-12-07', 0, 500, 0, 500, 500, 'R-A-007', 0, '2021-12-07 14:44:36'),
(23, 'D-F-037', '2021-12-07', 0, 500, 0, 500, 3500, 'R-A-007', 0, '2021-12-07 14:51:35'),
(24, 'D-F-037', '2021-12-07', 0, 500, 0, 500, 4000, 'R-A-007', 0, '2021-12-07 14:54:16'),
(25, 'D-M-015', '2021-12-07', 0, 500, 0, 500, 3250, 'R-A-007', 0, '2021-12-07 14:56:04'),
(26, 'D-M-015', '2021-12-07', 0, 500, 0, 500, 3750, 'R-A-007', 0, '2021-12-07 14:57:59'),
(27, 'D-M-015', '2021-12-07', 0, 500, 0, 500, 4250, 'R-A-007', 0, '2021-12-07 15:02:38'),
(28, 'D-M-015', '2021-12-07', 0, 500, 0, 500, 4750, 'R-A-007', 0, '2021-12-07 15:05:22'),
(29, NULL, '2021-12-09', 0, 1250, 0, 1250, 1750, 'R-A-007', 0, '2021-12-09 17:34:49'),
(30, 'D-M-015', '2021-12-09', 0, 50, 0, 50, 4800, 'R-A-007', 0, '2021-12-09 18:00:40'),
(31, 'D-M-015', '2021-12-10', 0, -3000, 0, -3000, 1800, 'R-A-007', 0, '2021-12-09 18:02:39'),
(32, 'D-M-015', '2021-12-10', 0, 500, 0, 500, 2300, 'R-A-007', 0, '2021-12-09 18:20:45'),
(33, 'D-M-015', '2021-12-10', 0, 500, 0, 500, 2800, 'R-A-007', 0, '2021-12-09 18:27:59'),
(34, 'D-M-015', '2021-12-10', 0, 3500, 0, 3500, 6300, 'R-A-007', 0, '2021-12-09 18:29:01'),
(35, 'D-M-015', '2021-12-10', 0, 500, 0, 500, 6800, 'R-A-007', 0, '2021-12-09 18:30:13'),
(36, 'D-M-015', '2021-12-10', 0, 3000, 0, 3000, 9800, 'R-A-007', 0, '2021-12-09 18:35:45'),
(37, 'D-M-015', '2021-12-10', 0, 200, 0, 200, 10000, 'R-A-007', 0, '2021-12-09 18:36:11'),
(38, 'D-M-015', '2021-12-10', 0, 500, 0, 500, 10500, 'R-A-007', 0, '2021-12-09 18:47:55'),
(39, 'D-M-015', '2021-12-10', 0, 3000, 0, 3000, 13500, 'R-A-007', 0, '2021-12-09 18:49:13'),
(40, 'D-M-015', '2021-12-10', 0, 500, 0, 500, 14000, 'R-A-007', 0, '2021-12-09 18:49:40'),
(41, 'D-M-015', '2021-12-10', 0, 500, 0, 500, 14500, 'R-A-007', 0, '2021-12-09 19:05:30'),
(42, 'D-M-015', '2021-12-10', 0, 500, 0, 500, 15000, 'R-A-007', 0, '2021-12-09 19:06:11'),
(43, 'D-M-015', '2021-12-10', 0, 2500, 0, 2500, 17500, 'R-A-007', 0, '2021-12-09 19:06:47'),
(44, 'D-M-015', '2021-12-10', 0, 500, 0, 500, 18000, 'R-A-007', 0, '2021-12-09 19:07:28'),
(45, 'D-M-015', '2021-12-10', 0, 500, 0, 500, 18500, 'R-A-007', 0, '2021-12-09 19:09:47'),
(46, 'D-M-015', '2021-12-10', 0, 500, 0, 500, 19000, 'R-A-007', 0, '2021-12-09 19:10:20'),
(47, 'D-M-015', '2021-12-10', 0, 75, 0, 75, 19075, 'R-A-007', 0, '2021-12-09 19:11:16'),
(48, 'D-M-015', '2021-12-10', 0, 75, 0, 75, 19150, 'R-A-007', 0, '2021-12-09 19:18:02'),
(49, 'D-M-015', '2021-12-10', 0, 1000, 0, 1000, 20150, 'R-A-007', 0, '2021-12-09 19:19:13'),
(50, 'D-M-015', '2021-12-10', 0, 3000, 0, 3000, 23150, 'R-A-007', 0, '2021-12-09 19:21:10'),
(51, 'D-M-015', '2021-12-10', 0, 500, 0, 500, 23650, 'R-A-007', 0, '2021-12-10 13:12:51'),
(52, 'D-M-015', '2021-12-10', 0, 500, 0, 500, 24150, 'R-A-007', 0, '2021-12-10 13:13:21'),
(53, 'D-M-015', '2021-12-10', 0, 1400, 0, 1400, 25550, 'R-A-007', 0, '2021-12-10 13:14:03'),
(54, 'D-M-041', '2021-12-11', 0, 500, 0, 500, 500, 'R-A-007', 0, '2021-12-10 18:11:56'),
(55, 'D-M-041', '2021-12-11', 0, 250, 0, 250, 750, 'R-A-007', 0, '2021-12-10 18:20:20'),
(56, 'D-M-041', '2021-12-11', 0, 250, 0, 250, 1000, 'R-A-007', 0, '2021-12-10 18:45:39'),
(57, 'D-M-041', '2021-12-11', 0, 250, 0, 250, 1250, 'R-A-007', 0, '2021-12-10 19:21:04');

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
(383, 'D-M-001', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', '4', 'A', '2021-11-17 17:26:51'),
(384, 'D-M-003', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(385, 'D-M-004', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', '5', 'A', '2021-11-17 17:34:25'),
(386, 'D-M-005', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', '0', 'A', 'A', '2021-11-17 17:34:25'),
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
(414, 'D-F-039', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', '4', 'A', '2021-11-17 17:34:25'),
(415, 'D-M-040', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-17 17:34:25'),
(416, 'D-M-002', '16:00:00', '20:00:00', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '2021-11-18 10:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_log`
--

CREATE TABLE `emergency_log` (
  `AI_ID` int(11) NOT NULL,
  `D_ID` longtext NOT NULL,
  `R_ID` longtext NOT NULL,
  `Name` longtext DEFAULT NULL,
  `Ref_Name` longtext NOT NULL,
  `Ref_Cell_Number` longtext NOT NULL,
  `Bill` int(11) NOT NULL,
  `Received` int(11) NOT NULL,
  `Changes` int(11) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_log`
--

INSERT INTO `emergency_log` (`AI_ID`, `D_ID`, `R_ID`, `Name`, `Ref_Name`, `Ref_Cell_Number`, `Bill`, `Received`, `Changes`, `Time_Stamp`) VALUES
(2, 'D-M-032', 'R-A-007', 'Potol', 'Mahin salar put', '01821420420', 200, 1000, 800, '2021-11-26 18:13:33');

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
(13, 'Emergency Fee for: Potol', 0, 100, 0, 100, 100, 'Emergency', '2021-11-26', '18:13:33', 2021, 'R-A-007', '2021-11-26 18:13:33'),
(14, 'Admission fee for patient: M-27112021-001', 0, 1000, 0, 1000, 1000, 'Admission Fee', '2021-11-27', '12:38:24', 2021, 'R-A-007', '2021-11-27 06:38:24'),
(15, 'Bed change for patient: M-27112021-001', 1000, 0, -0, 0, 0, 'Bed change', '2021-11-27', '12:40:03', 2021, 'R-A-007', '2021-11-27 06:40:03'),
(16, 'New Admission fee for patient: M-27112021-001. Old admission fee debited.', 0, 1000, 0, 1000, 1000, 'Admission Fee', '2021-11-27', '12:40:03', 2021, 'R-A-007', '2021-11-27 06:40:03'),
(17, 'Nebulizer  fee from patient: M-27112021-001', 0, 400, 0, 400, 400, 'Nebulizer ', '2021-11-27', '07:09:47', 2021, 'N-A-007', '2021-11-27 07:09:47'),
(18, 'Oxygen fee from patient: M-27112021-001', 0, 200, 0, 200, 200, 'Oxygen', '2021-11-27', '07:10:20', 2021, 'N-A-007', '2021-11-27 07:10:20'),
(19, 'NG Tube\r\n fee from patient: M-27112021-001', 0, 500, 0, 500, 500, 'NG Tube\r\n', '2021-11-27', '07:10:44', 2021, 'N-A-007', '2021-11-27 07:10:44'),
(20, 'Anema\r\n fee from patient: M-27112021-001', 0, 100, 0, 100, 100, 'Anema\r\n', '2021-11-27', '07:11:11', 2021, 'N-A-007', '2021-11-27 07:11:11'),
(21, 'Cannula\r\n fee from patient: M-27112021-001', 0, 200, 0, 200, 200, 'Cannula\r\n', '2021-11-27', '07:11:42', 2021, 'N-A-007', '2021-11-27 07:11:42'),
(24, 'Dental services for: M-01122021-002, given by: D-M-015', 0, 500, 0, 250, 500, 'Dental', '2021-12-01', '10:43:46', 2021, 'R-A-007', '2021-12-01 10:43:46'),
(25, 'Dental services for: M-01122021-003, given by: D-M-015', 0, 1000, 0, 500, 500, 'Dental', '2021-12-01', '10:49:42', 2021, 'R-A-007', '2021-12-01 10:49:42'),
(26, 'Dental services for: M-03122021-002, given by: D-F-037', 0, 2000, 0, 1000, 1000, 'Dental', '2021-12-03', '13:21:58', 2021, 'R-A-007', '2021-12-03 13:21:58'),
(27, 'Dental services for: M-03122021-005, given by: D-F-037', 0, 2000, 0, 1000, 1000, 'Dental', '2021-12-03', '13:34:29', 2021, 'R-A-007', '2021-12-03 13:34:29'),
(28, 'Dental services for: M-04122021-001, given by: D-M-015', 0, 4000, 0, 2000, 2000, 'Dental', '2021-12-04', '08:01:01', 2021, 'R-A-007', '2021-12-04 08:01:01'),
(29, 'Dental services for: M-04122021-002, given by: D-F-037', 0, 2000, 0, 1000, 1000, 'Dental', '2021-12-04', '08:41:15', 2021, 'R-A-007', '2021-12-04 08:41:15'),
(30, 'Dental services for: M-04122021-001, given by: , Due payment.', 0, 1000, 0, 500, 500, 'Dental', '2021-12-07', '14:44:36', 2021, 'R-A-007', '2021-12-07 14:44:36'),
(31, 'Dental services for: M-04122021-002, given by: D-F-037, Due payment.', 0, 1000, 0, 500, 500, 'Dental', '2021-12-07', '14:51:35', 2021, 'R-A-007', '2021-12-07 14:51:35'),
(32, 'Dental services for: M-04122021-002, given by: D-F-037, Due payment.', 0, 1000, 0, 500, 500, 'Dental', '2021-12-07', '14:54:16', 2021, 'R-A-007', '2021-12-07 14:54:16'),
(33, 'Dental services for: M-07122021-001, given by: D-M-015', 0, 1000, 0, 500, 500, 'Dental', '2021-12-07', '14:56:04', 2021, 'R-A-007', '2021-12-07 14:56:04'),
(34, 'Dental services for: M-07122021-001, given by: D-M-015, Due payment.', 0, 1000, 0, 500, 500, 'Dental', '2021-12-07', '14:57:59', 2021, 'R-A-007', '2021-12-07 14:57:59'),
(35, 'Dental services for: M-07122021-001, given by: D-M-015, Due payment.', 0, 1000, 0, 500, 500, 'Dental', '2021-12-07', '15:02:38', 2021, 'R-A-007', '2021-12-07 15:02:38'),
(36, 'Dental services for: M-07122021-001, given by: D-M-015, Due payment.', 0, 1000, 0, 500, 500, 'Dental', '2021-12-07', '15:05:21', 2021, 'R-A-007', '2021-12-07 15:05:21'),
(37, 'Dental services for: M-09122021-002, given by: ', 0, 2500, 0, 1250, 1250, 'Dental', '2021-12-09', '17:34:49', 2021, 'R-A-007', '2021-12-09 17:34:49'),
(38, 'Pathology services for: M-09122021-003, referred by: self', 0, 3000, 0, 0, 0, 'Dental', '2021-12-09', '17:39:39', 2021, 'R-A-007', '2021-12-09 17:39:39'),
(39, 'Pathology services for: M-09122021-004, referred by: self', 0, 1000, 0, 1000, 1000, 'Dental', '2021-12-09', '17:45:30', 2021, 'R-A-007', '2021-12-09 17:45:30'),
(40, 'Pathology services for: M-09122021-005, referred by: self', 0, 150, 0, 100, 100, 'Dental', '2021-12-09', '17:54:40', 2021, 'R-A-007', '2021-12-09 17:54:40'),
(41, 'Dental services for: M-09122021-006, given by: D-M-015', 0, 150, 0, 50, 50, 'Dental', '2021-12-09', '18:00:40', 2021, 'R-A-007', '2021-12-09 18:00:40'),
(42, 'Dental services for: M-10122021-001, given by: D-M-015', 0, 1000, -0, -3000, -3000, 'Dental', '2021-12-09', '18:02:39', 2021, 'R-A-007', '2021-12-09 18:02:39'),
(43, 'Dental services for: M-10122021-002, given by: D-M-015', 0, 1000, 0, 500, 500, 'Dental', '2021-12-09', '18:20:45', 2021, 'R-A-007', '2021-12-09 18:20:45'),
(44, 'Dental services for: M-10122021-002, given by: D-M-015, Due payment.', 0, 1000, 0, 500, 500, 'Dental', '2021-12-09', '18:27:59', 2021, 'R-A-007', '2021-12-09 18:27:59'),
(45, 'Dental services for: M-10122021-002, given by: D-M-015, Due payment.', 0, 7000, 0, 3500, 3500, 'Dental', '2021-12-09', '18:29:00', 2021, 'R-A-007', '2021-12-09 18:29:00'),
(46, 'Dental services for: M-10122021-002, given by: D-M-015, Due payment.', 0, 1500, 0, 500, 500, 'Dental', '2021-12-09', '18:30:13', 2021, 'R-A-007', '2021-12-09 18:30:13'),
(47, 'Dental services for: M-10122021-003, given by: D-M-015', 0, 6000, 0, 3000, 3000, 'Dental', '2021-12-09', '18:35:44', 2021, 'R-A-007', '2021-12-09 18:35:44'),
(48, 'Dental services for: M-10122021-003, given by: D-M-015, Due payment.', 0, 1000, 0, 200, 200, 'Dental', '2021-12-09', '18:36:11', 2021, 'R-A-007', '2021-12-09 18:36:11'),
(49, 'Dental services for: M-10122021-004, given by: D-M-015', 0, 1000, 0, 500, 500, 'Dental', '2021-12-09', '18:47:55', 2021, 'R-A-007', '2021-12-09 18:47:55'),
(50, 'Dental services for: M-10122021-004, given by: D-M-015, Due payment.', 0, 6000, 0, 3000, 3000, 'Dental', '2021-12-09', '18:49:13', 2021, 'R-A-007', '2021-12-09 18:49:13'),
(51, 'Dental services for: M-10122021-004, given by: D-M-015, Due payment.', 0, 1500, 0, 500, 500, 'Dental', '2021-12-09', '18:49:40', 2021, 'R-A-007', '2021-12-09 18:49:40'),
(52, 'Dental services for: M-10122021-005, given by: D-M-015', 0, 1000, 0, 500, 500, 'Dental', '2021-12-09', '19:05:30', 2021, 'R-A-007', '2021-12-09 19:05:30'),
(53, 'Dental services for: M-10122021-005, given by: D-M-015, Due payment.', 0, 1000, 0, 500, 500, 'Dental', '2021-12-09', '19:06:11', 2021, 'R-A-007', '2021-12-09 19:06:11'),
(54, 'Dental services for: M-10122021-005, given by: D-M-015, Due payment.', 0, 5000, 0, 2500, 2500, 'Dental', '2021-12-09', '19:06:47', 2021, 'R-A-007', '2021-12-09 19:06:47'),
(55, 'Dental services for: M-10122021-005, given by: D-M-015, Due payment.', 0, 1500, 0, 500, 500, 'Dental', '2021-12-09', '19:07:28', 2021, 'R-A-007', '2021-12-09 19:07:28'),
(56, 'Dental services for: M-10122021-006, given by: D-M-015', 0, 1000, 0, 500, 500, 'Dental', '2021-12-09', '19:09:47', 2021, 'R-A-007', '2021-12-09 19:09:47'),
(57, 'Dental services for: M-10122021-006, given by: D-M-015, Due payment.', 0, 1000, 0, 500, 500, 'Dental', '2021-12-09', '19:10:20', 2021, 'R-A-007', '2021-12-09 19:10:20'),
(58, 'Dental services for: M-10122021-007, given by: D-M-015', 0, 150, 0, 75, 75, 'Dental', '2021-12-09', '19:11:16', 2021, 'R-A-007', '2021-12-09 19:11:16'),
(59, 'Dental services for: M-10122021-008, given by: D-M-015', 0, 150, 0, 75, 75, 'Dental', '2021-12-09', '19:18:02', 2021, 'R-A-007', '2021-12-09 19:18:02'),
(60, 'Dental services for: M-10122021-009, given by: D-M-015', 0, 2000, 0, 1000, 1000, 'Dental', '2021-12-09', '19:19:13', 2021, 'R-A-007', '2021-12-09 19:19:13'),
(61, 'Dental services for: M-10122021-009, given by: D-M-015, Due payment.', 0, 6000, 0, 3000, 3000, 'Dental', '2021-12-09', '19:21:10', 2021, 'R-A-007', '2021-12-09 19:21:10'),
(62, 'Pathology services for: M-10122021-010, referred by: self', 0, 1000, 0, 1000, 1000, 'Dental', '2021-12-10', '10:16:13', 2021, 'R-A-007', '2021-12-10 10:16:13'),
(63, 'Pathology services for: M-10122021-011, referred by: self', 0, 2000, 0, 2000, 2000, 'Dental', '2021-12-10', '11:15:14', 2021, 'R-A-007', '2021-12-10 11:15:14'),
(64, 'Pathology services for: M-10122021-011, given by: self, Due payment.', 0, 1000, 0, 1000, 1000, 'Dental', '2021-12-10', '13:00:09', 2021, 'R-A-007', '2021-12-10 13:00:09'),
(65, 'Pathology services for: M-10122021-011, given by: self, Due payment.', 0, 1540, 0, 1540, 1540, 'Dental', '2021-12-10', '13:00:35', 2021, 'R-A-007', '2021-12-10 13:00:35'),
(66, 'Dental services for: M-10122021-012, given by: D-M-015', 0, 1000, 0, 500, 500, 'Dental', '2021-12-10', '13:12:51', 2021, 'R-A-007', '2021-12-10 13:12:51'),
(67, 'Dental services for: M-10122021-012, given by: D-M-015, Due payment.', 0, 1000, 0, 500, 500, 'Dental', '2021-12-10', '13:13:21', 2021, 'R-A-007', '2021-12-10 13:13:21'),
(68, 'Dental services for: M-10122021-012, given by: D-M-015, Due payment.', 0, 2800, 0, 1400, 1400, 'Dental', '2021-12-10', '13:14:03', 2021, 'R-A-007', '2021-12-10 13:14:03'),
(69, 'Physio services for: M-11122021-003, given by: D-M-041', 0, 500, 0, 0, 0, 'Physio', '2021-12-11', '00:11:56', 2021, 'R-A-007', '2021-12-10 18:11:56'),
(70, 'Physio services for: M-11122021-004, given by: D-M-041', 0, 500, 0, 250, 250, 'Physio', '2021-12-11', '00:20:20', 2021, 'R-A-007', '2021-12-10 18:20:20'),
(71, 'Physio services for: M-11122021-005, given by: D-M-041', 0, 500, 0, 250, 250, 'Physio', '2021-12-11', '00:45:39', 2021, 'R-A-007', '2021-12-10 18:45:39'),
(72, 'Physio services for: M-11122021-006, given by: D-M-041', 0, 500, 0, 250, 250, 'Physio', '2021-12-11', '01:21:04', 2021, 'R-A-007', '2021-12-10 19:21:04');

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
(83, 'OT-F-004', '48j6', 1, '2021-11-17 17:44:07'),
(84, 'D-M-002', 'jk36', 1, '2021-11-18 10:19:01'),
(85, 'D-M-041', '524a', 1, '2021-12-10 15:31:53'),
(86, 'D-M-042', '19g3', 1, '2021-12-10 15:31:53');

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
(4, 'N-F-004', 'Neshat Akter', 'Female', '', 200, '2021-10-18 14:19:07'),
(5, 'N-F-005', 'Salma Akter', 'Female', '', 0, '2021-10-18 14:19:07'),
(6, 'N-F-006', 'Tanjina Akter', 'Female', '', 0, '2021-10-18 14:20:02'),
(7, 'N-F-007', 'Tithi Podder', 'Female', '', 500, '2021-10-18 14:20:02'),
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

--
-- Dumping data for table `nurse_balance_logs`
--

INSERT INTO `nurse_balance_logs` (`AI_ID`, `N_ID`, `B_Date`, `Debit`, `Credit`, `Current_Balance`, `Acc_ID`, `O_ID`, `Timestamp`) VALUES
(1, 'N-F-007', '2021-11-27', 0, 500, 500, 'OT-A-007', '1', '2021-11-27 06:59:00'),
(2, 'N-F-004', '2021-11-27', 0, 200, 200, 'N-A-007', NULL, '2021-11-27 07:11:42');

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

--
-- Dumping data for table `ot_assistant_logs`
--

INSERT INTO `ot_assistant_logs` (`AI_ID`, `O_ID`, `Assistant_Name`, `Assistant_Fee`) VALUES
(5, 1, 'halima', 100);

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
(1, 'M-27112021-001', '18', 'D-F-025', 'OT-A-007', 2, 'demo o type', 'demo a type', '2021-11-27', '15:00:00', '01 hr 00 min', 10, 5, 5, 'demo other', 7, 12, '2021-11-27 06:56:36');

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

--
-- Dumping data for table `ot_nurses_logs`
--

INSERT INTO `ot_nurses_logs` (`AI_ID`, `N_ID`, `O_ID`, `Nurse_Name`, `Nurse_Fee`) VALUES
(8, 'N-F-007', 1, 'Tithi Podder', 500);

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
(2, 'OT-M-001', 'Mission', 'Male', '', '2021-11-18 10:20:34'),
(3, 'OT-M-002', 'Babu', 'Male', '', '2021-11-18 10:20:52'),
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

--
-- Dumping data for table `ot_schedules`
--

INSERT INTO `ot_schedules` (`AI_ID`, `P_ID`, `OT_No`, `Operation_Date`, `Operation_Start_Time`, `Operation_Type`, `Estimated_Duration`, `Surgeon_ID`, `Surgeon_Name`, `OTO_ID`, `Time_Stamp`) VALUES
(7, 'M-27112021-001', 2, '2021-11-27', '15:33:00', 'dummy operation', '01 hr 00 min', 'D-F-025', 'Dr S. Parvin Sadique', 'OT-A-007', '2021-11-27 06:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `pathology_info`
--

CREATE TABLE `pathology_info` (
  `AI_ID` int(11) NOT NULL,
  `Groups` longtext NOT NULL,
  `Room_No` int(11) NOT NULL,
  `Test_Name` longtext NOT NULL,
  `Test_Fee` int(11) NOT NULL,
  `State` int(11) NOT NULL DEFAULT 1,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pathology_info`
--

INSERT INTO `pathology_info` (`AI_ID`, `Groups`, `Room_No`, `Test_Name`, `Test_Fee`, `State`, `Time_Stamp`) VALUES
(1, 'PATHOLOGY', 119, 'TIBC', 900, 1, '2021-11-25 19:08:48'),
(2, 'PATHOLOGY', 119, 'FERRITIN', 1000, 1, '2021-11-25 19:37:36'),
(3, 'PATHOLOGY', 119, 'IRON PROFILE', 2400, 1, '2021-11-25 19:37:36'),
(4, 'PATHOLOGY', 119, 'CPK', 800, 1, '2021-11-25 19:37:36'),
(5, 'PATHOLOGY', 119, 'ICT FOR FILARIA', 900, 1, '2021-11-25 19:37:36'),
(6, 'PATHOLOGY', 119, 'ALBUMIN', 300, 1, '2021-11-25 19:37:36'),
(7, 'PATHOLOGY', 119, 'PLEURAL FLUID PROTEN', 350, 1, '2021-11-25 19:37:36'),
(8, 'PATHOLOGY', 119, 'WOUND SWAB C/S', 500, 1, '2021-11-25 19:37:36'),
(9, 'PATHOLOGY', 119, 'STOOL FOR R/S', 200, 1, '2021-11-25 19:37:36'),
(10, 'PATHOLOGY', 119, 'D-Dimar', 2400, 1, '2021-11-25 19:37:36'),
(11, 'PATHOLOGY', 119, 'STOOL FOR RE', 100, 1, '2021-11-25 19:37:36'),
(12, 'PATHOLOGY', 119, 'STOOL FOR OBT', 250, 1, '2021-11-25 19:37:36'),
(13, 'PATHOLOGY', 119, 'STOOL FOR C/S', 500, 1, '2021-11-25 19:37:36'),
(14, 'PATHOLOGY', 119, 'SPUTUM FOR AFB', 250, 1, '2021-11-25 19:37:36'),
(15, 'PATHOLOGY', 119, 'ALDCHYDC TEST', 300, 1, '2021-11-25 19:37:36'),
(16, 'PATHOLOGY', 119, 'NAIL SCRAPINC FUNGUS M/E', 350, 1, '2021-11-25 19:37:36'),
(17, 'PATHOLOGY', 119, 'SKIN SCRAPINC FUNGUS M/E', 350, 1, '2021-11-25 19:37:36'),
(18, 'PATHOLOGY', 119, 'P/S FOR GRAM STAIN C/S', 500, 1, '2021-11-25 19:37:36'),
(19, 'PATHOLOGY', 119, 'EAR SAWB C/S', 500, 1, '2021-11-25 19:37:36'),
(20, 'PATHOLOGY', 119, 'PUS FOR AFB', 250, 1, '2021-11-25 19:37:36'),
(21, 'PATHOLOGY', 119, 'P/S FOR GRAM STAIN', 350, 1, '2021-11-25 19:37:36'),
(22, 'PATHOLOGY', 119, 'URINE PROTEIN(Micro)', 350, 1, '2021-11-25 19:37:36'),
(23, 'PATHOLOGY', 119, 'BONE MARROW STUDY', 1500, 1, '2021-11-25 19:37:36'),
(24, 'PATHOLOGY', 119, 'GROUPING & Rh FACTOR', 150, 1, '2021-11-25 19:37:36'),
(25, 'PATHOLOGY', 119, 'PCV', 150, 1, '2021-11-25 19:37:36'),
(26, 'PATHOLOGY', 119, 'MCV', 100, 1, '2021-11-25 19:37:36'),
(27, 'PATHOLOGY', 119, 'MCHC', 100, 1, '2021-11-25 19:37:36'),
(28, 'PATHOLOGY', 119, 'MCH', 100, 1, '2021-11-25 19:37:36'),
(29, 'PATHOLOGY', 119, 'MP', 150, 1, '2021-11-25 19:37:36'),
(30, 'PATHOLOGY', 119, 'LDH', 900, 1, '2021-11-25 19:37:36'),
(31, 'PATHOLOGY', 119, 'BT(Bleeding Time)', 120, 1, '2021-11-25 19:37:36'),
(32, 'PATHOLOGY', 119, 'HDL-CHOLESTEROL', 300, 1, '2021-11-25 19:37:36'),
(33, 'PATHOLOGY', 119, 'CSF FOR SUGAR', 120, 1, '2021-11-25 19:37:36'),
(34, 'PATHOLOGY', 119, 'CSF FOR PROTIEN', 900, 1, '2021-11-25 19:37:36'),
(35, 'PATHOLOGY', 119, 'CREATININE', 350, 1, '2021-11-25 19:37:36'),
(36, 'PATHOLOGY', 119, 'BUN(BLOOD UREA NITROGEN)', 300, 1, '2021-11-25 19:37:36'),
(37, 'PATHOLOGY', 119, 'UREA', 300, 1, '2021-11-25 19:37:36'),
(38, 'PATHOLOGY', 119, 'HBsAg(ELISA)', 1000, 1, '2021-11-25 19:37:36'),
(39, 'PATHOLOGY', 119, 'G 6-PD ACTIVITIES', 1100, 1, '2021-11-25 19:37:36'),
(40, 'PATHOLOGY', 119, 'BEFORE DINNER', 120, 1, '2021-11-25 19:37:36'),
(41, 'PATHOLOGY', 119, 'BEFORE LUNCH', 120, 1, '2021-11-25 19:37:36'),
(42, 'PATHOLOGY', 119, '2Hrs AFTER DINNER', 120, 1, '2021-11-25 19:37:36'),
(43, 'PATHOLOGY', 119, 'B-HCG', 1600, 1, '2021-11-25 19:37:36'),
(44, 'PATHOLOGY', 119, 'PROTINE PROFILE', 900, 1, '2021-11-25 19:37:36'),
(45, 'PATHOLOGY', 119, 'ALKALINE PROSPHATASE', 260, 1, '2021-11-25 19:37:36'),
(46, 'PATHOLOGY', 119, 'HAV IgM(ICT)', 900, 1, '2021-11-25 19:37:36'),
(47, 'PATHOLOGY', 119, 'ASO+CRP+RA', 1650, 1, '2021-11-25 19:37:36'),
(48, 'PATHOLOGY', 119, '2Hrs AFTER LUNCH', 120, 1, '2021-11-25 19:37:36'),
(49, 'PATHOLOGY', 119, 'THROST SWAB C/S', 500, 1, '2021-11-25 19:37:36'),
(50, 'PATHOLOGY', 119, 'PC', 150, 1, '2021-11-25 19:37:36'),
(51, 'PATHOLOGY', 119, 'MALARIA(ICT)', 900, 1, '2021-11-25 19:37:36'),
(52, 'PATHOLOGY', 119, 'VDRL-QUANTITATIVE TEST(Q&Q)', 450, 1, '2021-11-25 19:37:36'),
(53, 'PATHOLOGY', 119, 'RA/RF TEST(RHEUMATOID FACTOR)', 550, 1, '2021-11-25 19:37:36'),
(54, 'PATHOLOGY', 119, 'ICT FOR TB', 900, 1, '2021-11-25 19:37:36'),
(55, 'PATHOLOGY', 119, 'ICT FOR KALA AZAR', 900, 1, '2021-11-25 19:37:36'),
(56, 'PATHOLOGY', 119, 'ICT FOR MALARIA', 900, 1, '2021-11-25 19:37:36'),
(57, 'PATHOLOGY', 119, 'COOMBS TEST(Direct & Indirect)', 1000, 1, '2021-11-25 19:37:36'),
(58, 'PATHOLOGY', 119, 'CFT FOR KALA AZAR', 800, 1, '2021-11-25 19:37:36'),
(59, 'PATHOLOGY', 119, 'CFT FOR FILARIA', 800, 1, '2021-11-25 19:37:36'),
(60, 'PATHOLOGY', 119, 'CRP', 550, 1, '2021-11-25 19:37:36'),
(61, 'PATHOLOGY', 119, 'TOTAL RBC COUNT', 150, 1, '2021-11-25 19:37:36'),
(62, 'PATHOLOGY', 119, 'TC DC OF WBC', 300, 1, '2021-11-25 19:37:36'),
(63, 'PATHOLOGY', 119, 'PROTHROMBIN TIME(PT)', 500, 1, '2021-11-25 19:37:36'),
(64, 'PATHOLOGY', 119, 'PLATELET COUNT(TPC)', 150, 1, '2021-11-25 19:37:36'),
(65, 'PATHOLOGY', 119, 'SYNOVIAL FLUID STUDY', 900, 1, '2021-11-25 19:37:36'),
(66, 'PATHOLOGY', 119, 'ESR', 100, 1, '2021-11-25 19:37:36'),
(67, 'PATHOLOGY', 119, 'CT(Clotting Time)', 120, 1, '2021-11-25 19:37:36'),
(68, 'PATHOLOGY', 119, 'Culating Eosinophil Count(TCEC)', 150, 1, '2021-11-25 19:37:36'),
(69, 'PATHOLOGY', 119, 'SGPT(ALT)', 250, 1, '2021-11-25 19:37:36'),
(70, 'PATHOLOGY', 119, 'VDRL', 260, 1, '2021-11-25 19:37:36'),
(71, 'PATHOLOGY', 119, 'DENGO IgG-IgM(ICT)', 900, 1, '2021-11-25 19:37:36'),
(72, 'PATHOLOGY', 119, 'FBS', 120, 1, '2021-11-25 19:37:36'),
(73, 'PATHOLOGY', 119, 'CREATININE', 300, 1, '2021-11-25 19:37:36'),
(74, 'PATHOLOGY', 119, 'LIPID PROFILE(F)', 940, 1, '2021-11-25 19:37:36'),
(75, 'PATHOLOGY', 119, 'WIDAL TEST', 360, 1, '2021-11-25 19:37:36'),
(76, 'PATHOLOGY', 119, 'TRIGLYECRIDE(Tg)', 300, 1, '2021-11-25 19:37:36'),
(77, 'PATHOLOGY', 119, 'CP+MP+PC', 750, 1, '2021-11-25 19:37:36'),
(78, 'PATHOLOGY', 119, 'RBS', 120, 1, '2021-11-25 19:37:36'),
(79, 'PATHOLOGY', 119, 'UREA CREATININE', 600, 1, '2021-11-25 19:37:36'),
(80, 'ULTRASONOGRAPHY', 110, 'W/A(COLOUR)', 1100, 1, '2021-11-25 13:27:32'),
(81, 'ULTRASONOGRAPHY', 110, 'PELVIC ORGAN', 1100, 1, '2021-11-25 13:43:12'),
(82, 'ULTRASONOGRAPHY', 110, 'KNEE', 1100, 1, '2021-11-25 13:43:12'),
(83, 'ULTRASONOGRAPHY', 110, 'PELVIC ORGAN (Colour)', 1100, 1, '2021-11-25 13:43:12'),
(84, 'ULTRASONOGRAPHY', 110, 'KUB (Colour)', 1100, 1, '2021-11-25 13:43:12'),
(85, 'ULTRASONOGRAPHY', 110, 'HBS (Colour)', 1100, 1, '2021-11-25 13:43:12'),
(86, 'ULTRASONOGRAPHY', 110, 'PREGNANCY PROFILE (Colour)', 1100, 1, '2021-11-25 13:43:12'),
(87, 'ULTRASONOGRAPHY', 110, 'CAROTIED (Colour)', 1100, 1, '2021-11-25 13:43:12'),
(88, 'ULTRASONOGRAPHY', 110, 'BREST (Colour)', 1100, 1, '2021-11-25 13:43:12'),
(89, 'ULTRASONOGRAPHY', 110, 'THYROID (Colour)', 1500, 1, '2021-11-25 13:43:12'),
(90, 'ULTRASONOGRAPHY', 110, 'THIGT (Colour)', 1100, 1, '2021-11-25 13:43:12'),
(91, 'ULTRASONOGRAPHY', 110, 'W/A', 1100, 1, '2021-11-25 13:43:12'),
(92, 'ULTRASONOGRAPHY', 110, 'PAROTIED (Colour)', 1100, 1, '2021-11-25 13:43:12'),
(93, 'ULTRASONOGRAPHY', 110, 'HBS', 1100, 1, '2021-11-25 13:43:12'),
(94, 'ULTRASONOGRAPHY', 110, 'KUB', 1100, 1, '2021-11-25 13:43:12'),
(95, 'ULTRASONOGRAPHY', 110, 'PREGNANCY PROFILE', 1100, 1, '2021-11-25 13:43:12'),
(96, 'ULTRASONOGRAPHY', 110, 'L/A', 1100, 1, '2021-11-25 13:43:12'),
(97, 'ULTRASONOGRAPHY', 110, 'SCROTUM', 1100, 1, '2021-11-25 13:43:12'),
(98, 'ULTRASONOGRAPHY', 110, 'PANIS', 1100, 1, '2021-11-25 13:43:12'),
(99, 'ULTRASONOGRAPHY', 110, 'KUB & PELVIC', 1100, 1, '2021-11-25 13:43:12'),
(100, 'ULTRASONOGRAPHY', 110, 'MSK', 1500, 1, '2021-11-25 13:43:12'),
(101, 'OTHERS', 119, 'ENDOSCOPY', 1700, 1, '2021-11-25 13:43:12'),
(102, 'OTHERS', 117, 'ECG', 300, 1, '2021-11-25 13:43:12'),
(103, 'HORMONE', 119, 'PROGESTERONE', 1200, 1, '2021-11-25 14:00:16'),
(104, 'HORMONE', 119, 'OESTROGEN', 1200, 1, '2021-11-25 14:00:16'),
(105, 'HORMONE', 119, 'DNA', 1600, 1, '2021-11-25 14:00:16'),
(106, 'HORMONE', 119, 'ANA', 1200, 1, '2021-11-25 14:00:16'),
(107, 'HORMONE', 119, 'Anti CCP', 2200, 1, '2021-11-25 14:00:16'),
(108, 'HORMONE', 119, 'TESTOSTERONE', 1200, 1, '2021-11-25 14:00:16'),
(109, 'HORMONE', 119, 'T3 T4 TSH', 2700, 1, '2021-11-25 14:00:16'),
(110, 'HORMONE', 119, 'PROLACTIN(PRL)', 1200, 1, '2021-11-25 14:00:16'),
(111, 'HORMONE', 119, 'IgE', 1100, 1, '2021-11-25 14:00:16'),
(112, 'HORMONE', 119, 'LH', 1200, 1, '2021-11-25 14:00:16'),
(113, 'HORMONE', 119, 'FSH', 1200, 1, '2021-11-25 14:00:16'),
(114, 'HORMONE', 119, 'FT4', 1200, 1, '2021-11-25 14:00:16'),
(115, 'HORMONE', 119, 'FT3', 1200, 1, '2021-11-25 14:00:16'),
(116, 'HORMONE', 119, 'T4', 900, 1, '2021-11-25 14:00:16'),
(117, 'HORMONE', 119, 'T3', 900, 1, '2021-11-25 14:00:16'),
(118, 'HORMONE', 119, 'TSH', 900, 1, '2021-11-25 14:00:16'),
(119, 'HORMONE', 119, 'PSA', 1200, 1, '2021-11-25 14:00:16'),
(120, 'X-RAY', 111, 'X-RAY PALVIS WITH BOTH HIP JT', 500, 1, '2021-11-25 20:17:04'),
(121, 'X-RAY', 111, 'X-RAY THIGHT LT B/V', 600, 1, '2021-11-25 20:23:05'),
(122, 'X-RAY', 111, 'X-RAY THIGHT LT B/V', 600, 1, '2021-11-25 20:23:05'),
(123, 'X-RAY', 111, 'X-RAY HUMERUS(ARM)RT B/V', 400, 1, '2021-11-25 20:23:05'),
(124, 'X-RAY', 111, 'X-RAY HUMERUS(ARM)RT B/V', 400, 1, '2021-11-25 20:23:05'),
(125, 'X-RAY', 111, 'X-RAY HP LT L/V', 400, 1, '2021-11-25 20:23:05'),
(126, 'X-RAY', 111, 'X-RAY HP RT L/V', 400, 1, '2021-11-25 20:23:05'),
(127, 'X-RAY', 111, 'X-RAY ABDOMEN SUPPER POSITION', 500, 1, '2021-11-25 20:23:05'),
(128, 'X-RAY', 111, 'X-RAY BOTH SI JT A/P', 500, 1, '2021-11-25 20:23:05'),
(129, 'X-RAY', 111, 'X-RAY CHEST OBLIQUE VIEW (CHILD)', 400, 1, '2021-11-25 20:23:05'),
(130, 'X-RAY', 111, 'X-RAY FISTOLOGRAM', 2000, 1, '2021-11-25 20:23:05'),
(131, 'X-RAY', 111, 'X-RAY SI JOINT', 1000, 1, '2021-11-25 20:23:05'),
(132, 'X-RAY', 111, 'X-RAY RGU & MCU', 2000, 1, '2021-11-25 20:23:05'),
(133, 'X-RAY', 111, 'X-RAY FACT B/V', 800, 1, '2021-11-25 20:23:05'),
(134, 'X-RAY', 111, 'X-RAY RT SI JOINT', 700, 1, '2021-11-25 20:23:05'),
(135, 'X-RAY', 111, 'X-RAY ORBIT B/V', 600, 1, '2021-11-25 20:23:05'),
(136, 'X-RAY', 111, 'X-RAY PNS', 400, 1, '2021-11-25 07:32:12'),
(137, 'X-RAY', 111, 'X-RAY DORSAL LUMBER SPINE B/V', 800, 1, '2021-11-25 07:35:54'),
(138, 'X-RAY', 111, 'X-RAY CHEST OBLIQUE VIEW', 500, 1, '2021-11-25 07:36:53'),
(139, 'X-RAY', 111, 'X-RAY CHEST A/P VIEW', 500, 1, '2021-11-25 07:38:43'),
(140, 'X-RAY', 111, 'X-RAY STENUM L/V', 450, 1, '2021-11-25 07:39:27'),
(141, 'X-RAY', 111, 'X-RAY CHEST L/V(CHILD)', 400, 1, '2021-11-25 07:40:19'),
(142, 'X-RAY', 111, 'X-RAY CERVICAL SPINE B/V', 700, 1, '2021-11-25 07:41:34'),
(143, 'X-RAY', 111, 'X-RAY MASTOIDA TOWNES & STENVERS VIEW ', 800, 1, '2021-11-25 07:47:51'),
(144, 'X-RAY', 111, 'X-RAY SACRO - COCCYGEAL B/VIEW', 700, 1, '2021-11-25 07:47:51'),
(145, 'X-RAY', 111, 'X-RAY ABDOMEN ERECT POSITION ', 550, 1, '2021-11-25 08:04:40'),
(146, 'X-RAY', 111, 'X-RAY SKULL A/P ', 450, 1, '2021-11-25 08:04:40'),
(147, 'X-RAY', 111, 'X-RAY SKULL A/P & LN', 800, 1, '2021-11-25 08:04:40'),
(148, 'X-RAY', 111, 'X-RAY ANKLE LT B/V', 400, 1, '2021-11-25 08:04:40'),
(149, 'X-RAY', 111, 'X-RAY ANKLE RT B/V', 400, 1, '2021-11-25 08:04:40'),
(150, 'X-RAY', 111, 'X-RAY FOOT LT B/V', 400, 1, '2021-11-25 08:04:40'),
(151, 'X-RAY', 111, 'X-RAY CHEST P/A VIEW(CHILD)', 400, 1, '2021-11-25 08:04:40'),
(152, 'X-RAY', 111, 'X-RAY NECK A/P & L/V', 700, 1, '2021-11-25 08:04:40'),
(153, 'X-RAY', 111, 'X-RAY NECK L/V', 400, 1, '2021-11-25 08:04:40'),
(154, 'X-RAY', 111, 'X-RAY FOREARM LT B/V', 400, 1, '2021-11-25 08:04:40'),
(155, 'X-RAY', 111, 'X-RAY FOREARM RT B/V ', 400, 1, '2021-11-25 08:04:40'),
(156, 'X-RAY', 111, 'X-RAY HEEL(CALCANE LT WV', 400, 1, '2021-11-25 08:04:40'),
(157, 'X-RAY', 111, 'X-RAY HEEL CALCANEUM)RT B/V', 400, 1, '2021-11-25 08:04:40'),
(158, 'X-RAY', 111, 'X-RAY TIBIA & FIBULA LT', 600, 1, '2021-11-25 08:04:40'),
(159, 'X-RAY', 111, 'X-RAY NOSALBONE', 400, 1, '2021-11-25 08:04:40'),
(160, 'X-RAY', 111, 'X-RAY NASOPHARYNX L/V', 400, 1, '2021-11-25 08:04:40'),
(161, 'X-RAY', 111, 'X-RAY LEG RT B/V', 600, 1, '2021-11-25 08:04:40'),
(162, 'X-RAY', 111, 'X-RAY LEG LT B/V', 600, 1, '2021-11-25 08:04:40'),
(163, 'X-RAY', 111, 'X-RAY KNEE RT B/V', 400, 1, '2021-11-25 08:04:40'),
(164, 'X-RAY', 111, 'X-RAY KNEE LT B/V', 700, 1, '2021-11-25 08:04:40'),
(165, 'X-RAY', 111, 'X-RAY HUMERUS RT B/V', 400, 1, '2021-11-25 08:06:56'),
(166, 'X-RAY', 111, 'X-RAY HUMERUS LT B/V', 400, 1, '2021-11-25 08:06:56'),
(167, 'X-RAY', 111, 'X-RAY HIP RT B/V', 800, 1, '2021-11-25 08:25:47'),
(168, 'X-RAY', 111, 'X-RAY HIP LT B/V', 800, 1, '2021-11-25 08:25:47'),
(169, 'X-RAY', 111, 'X-RAY CALCANEUM LT B/V', 400, 1, '2021-11-25 08:25:47'),
(170, 'X-RAY', 111, 'X-RAY HAND RT B/V', 400, 1, '2021-11-25 08:25:47'),
(171, 'X-RAY', 111, 'X-RAY CLAVICLE RT AP/V', 400, 1, '2021-11-25 08:25:47'),
(172, 'X-RAY', 111, 'X-RAY CHEST P/A VIEW', 500, 1, '2021-11-25 08:25:47'),
(173, 'X-RAY', 111, 'X-RAY WRIST RT B/V', 400, 1, '2021-11-25 08:25:47'),
(174, 'X-RAY', 111, 'X-RAY CLAVICLE LT B/V', 400, 1, '2021-11-25 08:25:47'),
(175, 'X-RAY', 111, 'X-RAY L/S SPINE B/V', 800, 1, '2021-11-25 08:25:47'),
(176, 'X-RAY', 111, 'X-RAY CHEST L/V', 500, 1, '2021-11-25 08:25:47'),
(177, 'X-RAY', 111, 'X-RAY CHEST A/P VIEW', 500, 1, '2021-11-25 08:25:47'),
(178, 'X-RAY', 111, 'X-RAY CHEST OBLIQUE VIEW', 500, 1, '2021-11-25 08:25:47'),
(179, 'X-RAY', 111, 'X-RAY MANDIBLE', 1000, 1, '2021-11-25 08:25:47'),
(180, 'X-RAY', 111, 'X-RAY TM JT B/V', 1200, 1, '2021-11-25 08:25:47'),
(181, 'X-RAY', 111, 'X-RAY D/L SPINE B/V', 800, 1, '2021-11-25 08:25:47'),
(182, 'X-RAY', 111, 'X-RAY KUB REIGON (PLAIN)', 550, 1, '2021-11-25 08:25:47'),
(183, 'X-RAY', 111, 'X-RAY SHOULDER RT B/V', 650, 1, '2021-11-25 08:25:47'),
(184, 'X-RAY', 111, 'X-RAY ELBOW LT B/V', 400, 1, '2021-11-25 08:25:47'),
(185, 'X-RAY', 111, 'X-RAY IVU', 2800, 1, '2021-11-25 08:25:47'),
(186, 'X-RAY', 111, 'X-RAY DORSAL SPINE', 800, 1, '2021-11-25 08:25:47'),
(187, 'X-RAY', 111, 'X-RAY FEMAR LT B/V', 600, 1, '2021-11-25 08:25:47'),
(188, 'X-RAY', 111, 'X-RAY FEMAR RT WV', 600, 1, '2021-11-25 08:25:47'),
(189, 'X-RAY', 111, 'X-RAY HAND LT B/V', 400, 1, '2021-11-25 08:25:47'),
(190, 'X-RAY', 111, 'X-RAY SUBMANDIBULA REGION', 800, 1, '2021-11-25 08:25:47'),
(191, 'X-RAY', 111, 'X-RAY MCU', 1800, 1, '2021-11-25 08:25:47'),
(192, 'X-RAY', 111, 'X-RAY RGU', 1800, 1, '2021-11-25 08:25:47'),
(193, 'X-RAY', 111, 'X-RAY FOOT RT B/V', 400, 1, '2021-11-25 08:25:47'),
(194, 'X-RAY', 111, 'X-RAY WRIST LT B/V', 400, 1, '2021-11-25 08:25:47'),
(195, 'X-RAY', 111, 'X-RAY ELBOW RT B/V', 400, 1, '2021-11-25 08:25:47'),
(196, 'X-RAY', 111, 'X-RAY SKULL L/V', 400, 1, '2021-11-25 08:25:47'),
(197, 'X-RAY', 111, 'X-RAY NECK A/P VIEW', 400, 1, '2021-11-25 08:25:47'),
(198, 'X-RAY', 111, 'X-RAY TIBIA & FIULA RT B/V', 600, 1, '2021-11-25 08:25:47'),
(199, 'X-RAY', 111, 'X-RAY CALCANEUM RT B/V', 400, 1, '2021-11-25 08:25:47'),
(200, 'X-RAY', 111, 'X-RAY SHOULDER LT B/V', 650, 1, '2021-11-25 08:25:47'),
(201, 'X-RAY', 111, 'X-RAY PALVIS A/P VIEW', 500, 1, '2021-11-25 08:25:47'),
(202, 'PATHOLOGY', 119, 'FNAC', 720, 1, '2021-11-25 07:33:28'),
(203, 'PATHOLOGY', 119, 'PAPF SMER', 500, 1, '2021-11-25 07:35:54'),
(204, 'PATHOLOGY', 119, 'CARDIAC EANZIME', 2500, 1, '2021-11-25 07:38:01'),
(205, 'PATHOLOGY', 119, 'SPUTUM FOR GRAM STAIN', 300, 1, '2021-11-25 07:39:35'),
(206, 'PATHOLOGY', 119, 'CSF STUDY', 900, 1, '2021-11-25 07:40:40'),
(207, 'PATHOLOGY', 119, '24hr URINE TOTAL PROTIEN', 500, 1, '2021-11-25 07:43:44'),
(208, 'PATHOLOGY', 119, 'URINE FOR ALBUMIN', 120, 1, '2021-11-25 07:43:44'),
(209, 'PATHOLOGY', 119, 'URINE SUGAR', 120, 1, '2021-11-25 07:43:44'),
(210, 'PATHOLOGY', 119, 'URINE C/S', 500, 1, '2021-11-25 07:58:14'),
(211, 'PATHOLOGY', 119, 'URINE RE', 100, 1, '2021-11-25 07:58:14'),
(212, 'PATHOLOGY', 119, 'ANTIBODY HSV2 ', 1100, 1, '2021-11-25 07:58:14'),
(213, 'PATHOLOGY', 119, 'ANTIBODY HSBI', 1100, 1, '2021-11-25 07:58:14'),
(214, 'PATHOLOGY', 119, 'HBeAg(ICT)', 900, 1, '2021-11-25 07:58:14'),
(215, 'PATHOLOGY', 119, 'CA-242', 1600, 1, '2021-11-25 07:58:14'),
(216, 'PATHOLOGY', 119, 'CA-153', 1600, 1, '2021-11-25 07:58:14'),
(217, 'PATHOLOGY', 119, 'CA-199', 1600, 1, '2021-11-25 07:58:14'),
(218, 'PATHOLOGY', 119, 'CA-125', 1600, 1, '2021-11-25 07:58:14'),
(219, 'PATHOLOGY', 119, 'HCV(ICT)', 900, 1, '2021-11-25 07:58:14'),
(220, 'PATHOLOGY', 119, 'DENGU(ICT)', 900, 1, '2021-11-25 07:58:14'),
(221, 'PATHOLOGY', 119, 'HEV IgM(ICT)', 900, 1, '2021-11-25 07:58:14'),
(222, 'PATHOLOGY', 119, 'HIV(I+II)ICT ', 900, 1, '2021-11-25 07:58:14'),
(223, 'PATHOLOGY', 119, 'ALFA FETO PROTIEN', 1600, 1, '2021-11-25 07:58:14'),
(224, 'PATHOLOGY', 119, 'MT(MATOUX TEST)', 300, 1, '2021-11-25 08:04:37'),
(225, 'PATHOLOGY', 119, 'VEGANA SWAB C/S', 500, 1, '2021-11-25 08:04:37'),
(226, 'PATHOLOGY', 119, 'VIRAL PROFILE\r\n', 4200, 1, '2021-11-25 08:04:37'),
(227, 'PATHOLOGY', 119, 'HDAIC', 1000, 1, '2021-11-25 08:04:37'),
(228, 'PATHOLOGY', 119, 'HBsAg(ICT)', 420, 1, '2021-11-25 08:04:37'),
(229, 'PATHOLOGY', 119, 'IRON', 900, 1, '2021-11-25 08:04:37'),
(230, 'PATHOLOGY', 119, 'SGOT(AST)', 250, 1, '2021-11-25 08:04:37'),
(231, 'PATHOLOGY', 119, 'LIVER FUNCTION TEST(LFT)', 850, 1, '2021-11-25 08:04:37'),
(232, 'PATHOLOGY', 119, 'CKMB', 950, 1, '2021-11-25 08:12:11'),
(233, 'PATHOLOGY', 119, 'PERITIAL BLOOD FLIM(PBF)', 420, 1, '2021-11-25 08:12:11'),
(234, 'PATHOLOGY', 119, 'TROPININ-I\r\n', 1000, 1, '2021-11-25 08:12:11'),
(235, 'PATHOLOGY', 119, 'HB%', 150, 1, '2021-11-25 08:12:11'),
(236, 'PATHOLOGY', 119, 'BTCT', 220, 1, '2021-11-25 08:12:11'),
(237, 'PATHOLOGY', 119, 'TCEC', 150, 1, '2021-11-25 08:12:11'),
(238, 'PATHOLOGY', 119, 'TPC', 150, 1, '2021-11-25 08:12:11'),
(239, 'PATHOLOGY', 119, 'URIC ACID', 300, 1, '2021-11-25 08:12:11'),
(240, 'PATHOLOGY', 119, 'SPUTUM FOR AFB(3 day)', 750, 1, '2021-11-25 08:12:11'),
(241, 'PATHOLOGY', 119, 'Rh-Antibody Titre', 800, 1, '2021-11-25 08:22:36'),
(242, 'PATHOLOGY', 119, 'URINE PT', 200, 1, '2021-11-25 08:22:36'),
(243, 'PATHOLOGY', 119, 'TC DC\r\n', 300, 1, '2021-11-25 08:22:36'),
(244, 'PATHOLOGY', 119, 'ELECTROLYTES', 950, 1, '2021-11-25 08:22:36'),
(245, 'PATHOLOGY', 119, 'SEMEN ANALYSIS', 450, 1, '2021-11-25 08:22:36'),
(246, 'PATHOLOGY', 119, 'CHOLOSTROL', 300, 1, '2021-11-25 08:22:36'),
(247, 'PATHOLOGY', 119, 'GLUCOMATER', 100, 1, '2021-11-25 08:22:36'),
(248, 'PATHOLOGY', 119, 'CPC/CP', 600, 1, '2021-11-25 08:22:36'),
(249, 'PATHOLOGY', 119, 'SYNOVIAL FLUID C/S', 500, 1, '2021-11-25 08:22:36'),
(250, 'PATHOLOGY', 119, 'TORCH PANCL TEST', 6000, 1, '2021-11-25 08:29:22'),
(251, 'PATHOLOGY', 119, 'SGPT+SGOT+BILIRUBIN', 700, 1, '2021-11-25 08:29:22'),
(252, 'PATHOLOGY', 119, 'BILIRUBIN\r\n', 250, 1, '2021-11-25 08:29:22'),
(253, 'PATHOLOGY', 119, 'CALCIUM', 350, 1, '2021-11-25 08:29:22'),
(254, 'PATHOLOGY', 119, 'PUS FOR C/S', 500, 1, '2021-11-25 08:29:22'),
(255, 'PATHOLOGY', 119, '2 ABF', 100, 1, '2021-11-25 08:29:22'),
(256, 'PATHOLOGY', 119, 'COAGULATION PROFILA', 900, 1, '2021-11-25 08:29:22'),
(257, 'PATHOLOGY', 119, 'CEA', 1400, 1, '2021-11-25 08:29:22'),
(258, 'PATHOLOGY', 119, 'BILIRUBIN(Total+Direct+Indirect)', 700, 1, '2021-11-25 08:29:22'),
(259, 'PATHOLOGY', 119, 'AMYLASE', 800, 1, '2021-11-25 08:38:37'),
(260, 'PATHOLOGY', 119, 'GTT', 360, 1, '2021-11-25 08:38:37'),
(261, 'PATHOLOGY', 119, 'ASO\r\n', 550, 1, '2021-11-25 08:38:37'),
(262, 'PATHOLOGY', 119, 'RA/RF TEST', 550, 1, '2021-11-25 08:38:37'),
(263, 'PATHOLOGY', 119, 'FILIARIA(ICT)', 900, 1, '2021-11-25 08:38:37'),
(264, 'PATHOLOGY', 119, 'TPHA(ICT)', 500, 1, '2021-11-25 08:38:37'),
(265, 'PATHOLOGY', 119, 'APTT', 700, 1, '2021-11-25 08:38:37'),
(266, 'PATHOLOGY', 119, 'GC PC', 350, 1, '2021-11-25 08:38:37'),
(267, 'PATHOLOGY', 119, 'LIPID PROFILEⓇ', 940, 1, '2021-11-25 08:38:37'),
(268, 'PATHOLOGY', 119, 'UMBILICAL C/S', 500, 1, '2021-11-25 08:38:37'),
(269, 'PATHOLOGY', 119, 'ORAL SWAB ME', 100, 1, '2021-11-25 08:38:37'),
(270, 'PATHOLOGY', 119, 'ORAL SWAB C/S', 500, 1, '2021-11-25 08:38:37'),
(271, 'PATHOLOGY', 119, 'TOTAL PROTIEN', 350, 1, '2021-11-25 08:38:37'),
(272, 'PATHOLOGY', 119, 'SPUTUM FOR C/S', 500, 1, '2021-11-25 08:43:20'),
(273, 'PATHOLOGY', 119, 'ASCITIC FLUID FOR RE', 900, 1, '2021-11-25 08:43:20'),
(274, 'PATHOLOGY', 119, 'HBsAg(Confermatory)\r\n', 900, 1, '2021-11-25 08:43:20'),
(275, 'PATHOLOGY', 119, 'Screening Test, Cross matching & collection', 1000, 1, '2021-11-25 08:43:20'),
(276, 'PATHOLOGY', 119, 'Dengo NSI', 500, 1, '2021-11-25 08:43:20'),
(277, 'PATHOLOGY', 119, 'Vaccum Tube & Needle', 30, 1, '2021-11-25 08:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `pathology_log`
--

CREATE TABLE `pathology_log` (
  `AI_ID` int(11) NOT NULL,
  `Test_No` int(11) NOT NULL,
  `P_ID` longtext NOT NULL,
  `R_ID` longtext NOT NULL,
  `D_ID` longtext DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `Paid` int(11) DEFAULT NULL,
  `Received` int(11) DEFAULT NULL,
  `Changes` int(11) DEFAULT NULL,
  `Payment_Status` longtext DEFAULT NULL,
  `Due_Amount` int(11) DEFAULT NULL,
  `Total_Amount` int(11) DEFAULT NULL,
  `Payable_Amount` int(11) DEFAULT NULL,
  `Reg_Date` date DEFAULT NULL,
  `Delivery_Date` date DEFAULT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pathology_log`
--

INSERT INTO `pathology_log` (`AI_ID`, `Test_No`, `P_ID`, `R_ID`, `D_ID`, `Discount`, `Paid`, `Received`, `Changes`, `Payment_Status`, `Due_Amount`, `Total_Amount`, `Payable_Amount`, `Reg_Date`, `Delivery_Date`, `Time_Stamp`) VALUES
(11, 1, 'M-10122021-011', 'R-A-007', 'self', 25, 4540, 2000, 460, 'Due', 0, 6050, 4540, '2021-12-10', '2021-12-13', '2021-12-10 11:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `pathology_test_log`
--

CREATE TABLE `pathology_test_log` (
  `AI_ID` int(11) NOT NULL,
  `Test_Info_AI_ID` int(11) NOT NULL,
  `Test_No` int(11) NOT NULL,
  `Fee` int(11) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pathology_test_log`
--

INSERT INTO `pathology_test_log` (`AI_ID`, `Test_Info_AI_ID`, `Test_No`, `Fee`, `Time_Stamp`) VALUES
(34, 223, 1, 1600, '2021-12-10 11:14:02'),
(35, 47, 1, 1650, '2021-12-10 11:14:06'),
(36, 101, 1, 1700, '2021-12-10 11:14:09'),
(37, 98, 1, 1100, '2021-12-10 11:14:14');

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
(1, 'F-18112021-001', 'Taslima', 'Female', 25, '012345658586', NULL, 'None', '18112021', '2021-11-18 08:44:22'),
(2, 'M-18112021-002', 'TEST', 'Male', 50, '01732323232', '1234567891', 'Own', '18112021', '2021-11-18 08:45:04'),
(3, 'M-18112021-003', 'Md Abu Sayem', 'Male', 20, '01726706721', NULL, 'None', '18112021', '2021-11-18 08:51:14'),
(4, 'M-18112021-004', 'Abdal Kadir', 'Male', 20, '01726706721', NULL, 'None', '18112021', '2021-11-18 08:55:27'),
(5, 'M-18112021-005', 'tania', 'Male', 55, '0', NULL, 'None', '18112021', '2021-11-18 09:04:05'),
(6, 'M-18112021-006', 'Ma Abul Kalam', 'Male', 45, '01726706721', NULL, 'None', '18112021', '2021-11-18 09:11:32'),
(7, 'M-18112021-007', 'Kalam', 'Male', 20, '01726706170', NULL, 'None', '18112021', '2021-11-18 09:28:46'),
(8, 'M-18112021-008', 'POPY', 'Male', 25, '0160824947122', NULL, 'None', '18112021', '2021-11-18 09:34:09'),
(9, 'M-18112021-009', 'ttgxg', 'Male', 22, 'hnbj2225', NULL, 'None', '18112021', '2021-11-18 09:37:20'),
(10, 'F-18112021-010', 'sharmin akter', 'Female', 22, '01968482975', '0', 'None', '18112021', '2021-11-18 10:00:08'),
(11, 'M-27112021-001', 'Jalal', 'Male', 20, '01982635147', NULL, 'None', '27112021', '2021-11-27 06:38:24'),
(42, 'M-01122021-001', 'dental test', 'Male', 20, '01982635147', NULL, 'None', '01122021', '2021-12-01 10:24:04'),
(43, 'M-01122021-002', 'dental test 01', 'Male', 20, '01982635147', NULL, 'None', '01122021', '2021-12-01 10:42:25'),
(44, 'M-01122021-003', 'dental test 02', 'Male', 20, '161651658', NULL, 'None', '01122021', '2021-12-01 10:48:37'),
(45, 'M-03122021-001', 'dental test', 'Male', 20, '01982635147', '1981981', 'Own', '03122021', '2021-12-03 12:10:46'),
(46, 'M-03122021-002', 'dental test', 'Male', 20, '01982635147', '1235446981', 'None', '03122021', '2021-12-03 13:20:52'),
(47, 'M-03122021-003', 'dental test', 'Male', 20, '01982635147', '1235446981', 'Own', '03122021', '2021-12-03 13:27:28'),
(48, 'M-03122021-004', 'dental test', 'Male', 20, '01982635147', '1235446981', 'Own', '03122021', '2021-12-03 13:28:19'),
(49, 'M-03122021-005', 'dental test 1', 'Male', 20, '01982635147', NULL, 'None', '03122021', '2021-12-03 13:33:34'),
(50, 'M-04122021-001', 'Jamsed', 'Male', 20, '01982635147', '1235446981', 'Own', '04122021', '2021-12-04 08:00:12'),
(51, 'M-04122021-002', 'Mohin', 'Male', 25, '181918618', '1981981', 'None', '04122021', '2021-12-04 08:40:02'),
(52, 'M-07122021-001', 'Jalal', 'Male', 12, '181918618', '1235446981', 'None', '07122021', '2021-12-07 14:55:37'),
(53, 'M-07122021-002', 'dental test', 'Male', 12, '181918618', '1235446981', 'None', '07122021', '2021-12-07 15:41:29'),
(54, 'M-08122021-001', 'thasin', 'Male', 20, '01982635147', NULL, 'None', '08122021', '2021-12-07 19:22:52'),
(55, 'M-08122021-002', 'thasin', 'Male', 20, '01982635147', NULL, 'None', '08122021', '2021-12-07 19:23:50'),
(56, 'M-08122021-003', 'thasin', 'Male', 20, '01982635147', NULL, 'None', '08122021', '2021-12-07 19:24:28'),
(57, 'M-08122021-004', 'thasin', 'Male', 20, '01982635147', NULL, 'None', '08122021', '2021-12-07 19:24:49'),
(58, 'M-08122021-005', 'thasin', 'Male', 20, '01982635147', NULL, 'None', '08122021', '2021-12-07 19:30:55'),
(59, 'M-08122021-006', 'pathology test', 'Male', 20, '01982635147', NULL, 'None', '08122021', '2021-12-08 05:32:28'),
(60, 'M-08122021-007', 'pathology test 2', 'Male', 20, '01982635147', NULL, 'None', '08122021', '2021-12-08 06:43:29'),
(61, 'M-08122021-008', 'pathology test 3', 'Male', 20, '01982635147', NULL, 'None', '08122021', '2021-12-08 09:44:00'),
(62, 'M-09122021-001', 'pathology test 4', 'Male', 20, '01982635147', NULL, 'None', '09122021', '2021-12-09 15:23:47'),
(63, 'M-09122021-002', 'p Test 01', 'Male', 20, '01982635147', NULL, 'None', '09122021', '2021-12-09 17:33:55'),
(64, 'M-09122021-003', 'p Test 02', 'Male', 20, '01982635147', NULL, 'None', '09122021', '2021-12-09 17:38:56'),
(65, 'M-09122021-004', 'p Test 03', 'Male', 20, '01982635147', NULL, 'None', '09122021', '2021-12-09 17:45:10'),
(66, 'M-09122021-005', 'p Test 04', 'Male', 20, '01982635147', NULL, 'None', '09122021', '2021-12-09 17:54:20'),
(67, 'M-09122021-006', 'dental test', 'Male', 12, '01982635147', NULL, 'None', '09122021', '2021-12-09 17:59:48'),
(68, 'M-10122021-001', 'dental test', 'Male', 20, '01982635147', NULL, 'None', '10122021', '2021-12-09 18:01:48'),
(69, 'M-10122021-002', 'dental test', 'Male', 20, '01982635147', NULL, 'None', '10122021', '2021-12-09 18:19:24'),
(70, 'M-10122021-003', 'dental test', 'Male', 20, '01982635147', '1235446981', 'None', '10122021', '2021-12-09 18:35:15'),
(71, 'M-10122021-004', 'dental test 10', 'Male', 20, '181918618', NULL, 'None', '10122021', '2021-12-09 18:46:30'),
(72, 'M-10122021-005', 'dental test 20', 'Male', 20, '181918618', NULL, 'None', '10122021', '2021-12-09 19:05:10'),
(73, 'M-10122021-006', 'Jalal', 'Male', 20, '01982635147', NULL, 'None', '10122021', '2021-12-09 19:09:25'),
(74, 'M-10122021-007', 'dental test', 'Male', 20, '01982635147', NULL, 'None', '10122021', '2021-12-09 19:10:59'),
(75, 'M-10122021-008', 'dental test', 'Male', 20, '01982635147', NULL, 'None', '10122021', '2021-12-09 19:17:42'),
(76, 'M-10122021-009', 'dental test', 'Male', 20, '01982635147', '1235446981', 'None', '10122021', '2021-12-09 19:18:53'),
(77, 'M-10122021-010', 'pathology test 01', 'Male', 20, '01982635147', '1235446981', 'Own', '10122021', '2021-12-10 10:14:01'),
(78, 'M-10122021-011', 'Pathology 01', 'Male', 20, '01982635147', NULL, 'None', '10122021', '2021-12-10 11:13:55'),
(79, 'M-10122021-012', 'dental test', 'Male', 20, '01982635147', NULL, 'None', '10122021', '2021-12-10 13:12:17'),
(80, 'M-10122021-013', 'physio test', 'Male', 20, '01982635147', NULL, 'None', '10122021', '2021-12-10 17:12:17'),
(81, 'M-11122021-001', 'physio 2', 'Male', 20, '01982635147', NULL, 'None', '11122021', '2021-12-10 18:10:23'),
(82, 'M-11122021-002', 'physio 2', 'Male', 20, '01982635147', NULL, 'None', '11122021', '2021-12-10 18:10:51'),
(83, 'M-11122021-003', 'physio 2', 'Male', 20, '01982635147', NULL, 'None', '11122021', '2021-12-10 18:11:56'),
(84, 'M-11122021-004', 'physio 3', 'Male', 20, '01982635147', NULL, 'None', '11122021', '2021-12-10 18:20:20'),
(85, 'M-11122021-005', 'physio 4', 'Male', 20, '01982635147', NULL, 'None', '11122021', '2021-12-10 18:45:38'),
(86, 'M-11122021-006', 'physio 5', 'Male', 20, '01982635147', '1981981', 'Own', '11122021', '2021-12-10 19:21:04');

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
(1, 'F-18112021-001', '2021-11-18', '16:00:00-20:00:00', 'D-M-001', 1000, 0, 1000, 2000, 1000, 'Paid', 0, NULL, 1, 612590, 'R-A-007', '2021-11-18 08:44:22'),
(2, 'M-18112021-003', '2021-11-18', '16:00:00-20:00:00', 'D-M-001', 1000, 20, 800, 0, 0, 'Paid', 0, NULL, 2, 929481, 'R-A-007', '2021-11-18 08:51:14'),
(4, 'M-18112021-006', '2021-11-18', '16:00:00-20:00:00', 'D-M-001', 900, 25, 675, 800, 125, 'Paid', 0, NULL, 3, 879369, 'R-M-001', '2021-11-18 09:11:32'),
(5, 'M-18112021-007', '2021-11-18', '16:00:00-20:00:00', 'D-M-001', 900, 10, 810, 1000, 190, 'Paid', 0, NULL, 4, 743904, 'R-M-003', '2021-11-18 09:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `physio_log`
--

CREATE TABLE `physio_log` (
  `AI_ID` int(11) NOT NULL,
  `P_ID` longtext NOT NULL,
  `R_ID` longtext NOT NULL,
  `D_ID` longtext NOT NULL,
  `Received` int(11) NOT NULL,
  `Changes` int(11) NOT NULL,
  `Fee` int(11) NOT NULL,
  `Reg_Date` date NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physio_log`
--

INSERT INTO `physio_log` (`AI_ID`, `P_ID`, `R_ID`, `D_ID`, `Received`, `Changes`, `Fee`, `Reg_Date`, `Time_Stamp`) VALUES
(1, 'M-10122021-013', 'R-A-007', 'D-M-041', 1000, 500, 0, '2021-12-10', '2021-12-10 17:12:17'),
(2, 'M-11122021-002', 'R-A-007', 'D-M-041', 1000, 500, 0, '2021-12-11', '2021-12-10 18:10:51'),
(3, 'M-11122021-003', 'R-A-007', 'D-M-041', 1000, 500, 0, '2021-12-11', '2021-12-10 18:11:56'),
(4, 'M-11122021-004', 'R-A-007', 'D-M-041', 1000, 500, 250, '2021-12-11', '2021-12-10 18:20:20'),
(5, 'M-11122021-005', 'R-A-007', 'D-M-041', 700, 200, 250, '2021-12-11', '2021-12-10 18:45:39'),
(6, 'M-11122021-006', 'R-A-007', 'D-M-041', 1000, 500, 500, '2021-12-11', '2021-12-10 19:21:04');

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
(3, 'R-M-001', 'Shahidul', 'Male', NULL, '2021-11-17 16:55:36'),
(4, 'R-M-002', '', 'Male', NULL, '2021-11-17 16:57:37'),
(5, 'R-M-003', 'Sayem', 'Male', NULL, '2021-11-17 16:57:37'),
(6, 'R-M-004', '', 'Male', NULL, '2021-11-17 16:57:37'),
(7, 'R-M-005', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(8, 'R-M-006', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(9, 'R-M-007', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(10, 'R-M-008', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(11, 'R-M-009', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(12, 'R-M-010', NULL, 'Male', NULL, '2021-11-17 16:57:37'),
(13, 'R-F-011', NULL, 'Female', NULL, '2021-11-17 16:58:18'),
(14, 'R-F-012', 'Yeasmin', 'Female', NULL, '2021-11-17 16:59:23'),
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
-- Dumping data for table `surgeon_logs`
--

INSERT INTO `surgeon_logs` (`AI_ID`, `D_ID`, `O_ID`, `Surgeon_Name`, `Surgeon_Fee`, `Surgeon_Discount`, `Surgeon_Income`) VALUES
(18, 'D-F-025', '1', 'Dr S. Parvin Sadique', 1000, 200, 800),
(19, 'D-F-038', '1', 'Brig Gen Dr. Sabina Yeasmin', 500, 0, 500);

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
-- Indexes for table `dental_info`
--
ALTER TABLE `dental_info`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `dental_log`
--
ALTER TABLE `dental_log`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `dental_test_log`
--
ALTER TABLE `dental_test_log`
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
-- Indexes for table `emergency_log`
--
ALTER TABLE `emergency_log`
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
-- Indexes for table `pathology_info`
--
ALTER TABLE `pathology_info`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `pathology_log`
--
ALTER TABLE `pathology_log`
  ADD PRIMARY KEY (`AI_ID`);

--
-- Indexes for table `pathology_test_log`
--
ALTER TABLE `pathology_test_log`
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
-- Indexes for table `physio_log`
--
ALTER TABLE `physio_log`
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
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `anesthesiologist_logs`
--
ALTER TABLE `anesthesiologist_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `bed_invigilators`
--
ALTER TABLE `bed_invigilators`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dental_info`
--
ALTER TABLE `dental_info`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dental_log`
--
ALTER TABLE `dental_log`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `dental_test_log`
--
ALTER TABLE `dental_test_log`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `doctor_balance_logs`
--
ALTER TABLE `doctor_balance_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;

--
-- AUTO_INCREMENT for table `emergency_log`
--
ALTER TABLE `emergency_log`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital_income_log`
--
ALTER TABLE `hospital_income_log`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nurse_balance_logs`
--
ALTER TABLE `nurse_balance_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `others_info`
--
ALTER TABLE `others_info`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ot_assistant_logs`
--
ALTER TABLE `ot_assistant_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ot_logs`
--
ALTER TABLE `ot_logs`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ot_nurses_logs`
--
ALTER TABLE `ot_nurses_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ot_operator`
--
ALTER TABLE `ot_operator`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ot_schedules`
--
ALTER TABLE `ot_schedules`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pathology_info`
--
ALTER TABLE `pathology_info`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `pathology_log`
--
ALTER TABLE `pathology_log`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pathology_test_log`
--
ALTER TABLE `pathology_test_log`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `patient_logs`
--
ALTER TABLE `patient_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `physio_log`
--
ALTER TABLE `physio_log`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `surgeon_logs`
--
ALTER TABLE `surgeon_logs`
  MODIFY `AI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
