-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 08:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pathology`
--

-- --------------------------------------------------------

--
-- Table structure for table `biochemical`
--

CREATE TABLE `biochemical` (
  `registrationid` varchar(255) NOT NULL,
  `slno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `receivedate` date DEFAULT NULL,
  `reportdate` date DEFAULT NULL,
  `patientname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `referdoctor` varchar(255) DEFAULT NULL,
  `testname` varchar(255) DEFAULT NULL,
  `SERUM_BIRIRUBIN_TOTAL` int(11) DEFAULT NULL,
  `SERUM_ALK_PHOSPHATASE` int(11) DEFAULT NULL,
  `SERUM_SGOT_AST` int(11) DEFAULT NULL,
  `SERUM_SGPT_ALT` int(11) DEFAULT NULL,
  `SERUM_ACID_PHOSPHATASE` int(11) DEFAULT NULL,
  `SERUM_CHOLESTEROL` int(11) DEFAULT NULL,
  `SERUM_TRYGLYCERIDE` int(11) DEFAULT NULL,
  `SERUM_UREA` int(11) DEFAULT NULL,
  `SERUM_URIC_ACID` int(11) DEFAULT NULL,
  `SERUM_CAL_CIUM` int(11) DEFAULT NULL,
  `SERUM_ALBUMIN` int(11) DEFAULT NULL,
  `CPK_MB` int(11) DEFAULT NULL,
  `HBA1C` int(11) DEFAULT NULL,
  `SERUM_LDH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biochemical`
--

INSERT INTO `biochemical` (`registrationid`, `slno`, `date`, `receivedate`, `reportdate`, `patientname`, `gender`, `age`, `referdoctor`, `testname`, `SERUM_BIRIRUBIN_TOTAL`, `SERUM_ALK_PHOSPHATASE`, `SERUM_SGOT_AST`, `SERUM_SGPT_ALT`, `SERUM_ACID_PHOSPHATASE`, `SERUM_CHOLESTEROL`, `SERUM_TRYGLYCERIDE`, `SERUM_UREA`, `SERUM_URIC_ACID`, `SERUM_CAL_CIUM`, `SERUM_ALBUMIN`, `CPK_MB`, `HBA1C`, `SERUM_LDH`) VALUES
('AC-00002', 2, '2023-09-05', '2023-09-05', '2023-09-05', 'Kamal', 'Male', 23, 'Dr. Hasan', 'B.S 2HRS ABF/PP WITH TAB/INSULIN', 1, 89, 35, 34, 23, 30, 100, 85, 5, 9, 4, 25, 6, 78),
('AC-00013', 1, '2023-09-17', '2023-09-17', '2023-09-17', '[object HTMLInputElement]', 'Female', 0, '', 'BILIRUBIN ', 12, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('asd', 4, '2023-09-06', '2023-09-02', '2023-09-11', 'Jamal', 'male', 24, 'dr. david', 'biochemical', 21, 32, 43, 53, 35, 36, 55, 45, 45, 47, 42, 47, 23, 34),
('ba52cd-12563', 2, '2023-09-06', '2023-09-02', '2023-09-11', 'abc', 'female', 24, 'dr. avcd', 'biochemical', 21, 32, 43, 53, 35, 36, 55, 45, 45, 47, 42, 47, 23, 34),
('saabcd-12563', 2, '2023-09-06', '2023-09-02', '2023-09-11', 'abc', 'female', 24, 'dr. avcd', 'biochemical', 21, 32, 43, 53, 35, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('sadasd-123', 4, '2023-09-06', '2023-09-02', '2023-09-11', 'abc', 'female', 24, '', 'biochemical', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('sadasd-12563', 7, '2023-09-06', '2023-09-02', '2023-09-11', 'abc', 'female', 24, 'dr. avcd', 'biochemical', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('sasd-123', 5, '2023-09-06', '2023-09-02', '2023-09-11', '', 'female', 24, '', 'biochemical', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `registrationid` varchar(225) NOT NULL,
  `Slno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `receivedate` date DEFAULT NULL,
  `reportdate` date DEFAULT NULL,
  `Patientname` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `referdoctor` varchar(100) DEFAULT NULL,
  `testname` varchar(100) DEFAULT NULL,
  `bloodgrouping` varchar(100) DEFAULT NULL,
  `RHfactor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`registrationid`, `Slno`, `date`, `receivedate`, `reportdate`, `Patientname`, `gender`, `age`, `referdoctor`, `testname`, `bloodgrouping`, `RHfactor`) VALUES
('004', 4, '2023-09-10', '2023-09-12', '2023-09-14', 'salina', 'female', 28, 'asad', 'RHfactor', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `e_c_g`
--

CREATE TABLE `e_c_g` (
  `registrationid` varchar(255) NOT NULL,
  `slno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `receivedate` date DEFAULT NULL,
  `reportdate` date DEFAULT NULL,
  `patientname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `referdoctor` varchar(255) DEFAULT NULL,
  `testname` varchar(255) DEFAULT NULL,
  `E_C_G` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `e_c_g`
--

INSERT INTO `e_c_g` (`registrationid`, `slno`, `date`, `receivedate`, `reportdate`, `patientname`, `gender`, `age`, `referdoctor`, `testname`, `E_C_G`) VALUES
('ac-001', 1, '2023-09-05', '2023-09-01', '2023-09-02', 'kamal', 'male', 21, 'dr. hasan', 'ecg', 'sadfsd');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `groupcode` varchar(120) NOT NULL,
  `groupname` varchar(100) DEFAULT NULL,
  `company` varchar(400) DEFAULT NULL,
  `SHOW` varchar(200) DEFAULT NULL,
  `smalldept` varchar(100) DEFAULT NULL,
  `smallnamesl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`groupcode`, `groupname`, `company`, `SHOW`, `smalldept`, `smallnamesl`) VALUES
('G-001', 'BioChemical', 'square', 'Yes', 'Pharmarcy', 1),
('G-002', 'Blood Analysis', 'RENATA', 'NO', 'R1', 1),
('G-003', 'Blood Rotine', 'Beximco', 'No', 'B1', 0),
('G-004', 'E.C.G', 'SQuare', 'No', 'S2', 1),
('G-005', 'Echocardiography', NULL, NULL, NULL, NULL),
('G-006', 'Endoscopy', 'Square', 'No', 'S2', 0),
('G-007', 'General', NULL, NULL, NULL, NULL),
('G-008', 'General Store', NULL, NULL, NULL, NULL),
('G-009', 'Hepatitis Pannel', NULL, NULL, NULL, NULL),
('G-010', 'Hormon', NULL, NULL, NULL, NULL),
('G-011', 'IMMUNOGLOBULIN', NULL, NULL, NULL, NULL),
('G-012', 'Others', NULL, NULL, NULL, NULL),
('G-013', 'SERUM HDL CHOLESTEROL', NULL, NULL, NULL, NULL),
('G-014', 'Stool', NULL, NULL, NULL, NULL),
('G-015', 'STOOL EXAMINATION', NULL, NULL, NULL, NULL),
('G-016', 'Ultrasonography', NULL, NULL, NULL, NULL),
('G-017', 'URINE EXAMINATION', NULL, NULL, NULL, NULL),
('G-018', 'X-Ray', 'Incepta', 'No', 'I1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lipidprofile`
--

CREATE TABLE `lipidprofile` (
  `registrationid` varchar(225) NOT NULL,
  `Slno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `receivedate` date DEFAULT NULL,
  `reportdate` date DEFAULT NULL,
  `Patientname` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `referdoctor` varchar(100) DEFAULT NULL,
  `testname` varchar(100) DEFAULT NULL,
  `SERUM_Cholesterol` int(11) DEFAULT NULL,
  `SERUM_Triglycerides` int(11) DEFAULT NULL,
  `HDL_Cholesterol` int(11) DEFAULT NULL,
  `LDL_Cholesterol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lipidprofile`
--

INSERT INTO `lipidprofile` (`registrationid`, `Slno`, `date`, `receivedate`, `reportdate`, `Patientname`, `gender`, `age`, `referdoctor`, `testname`, `SERUM_Cholesterol`, `SERUM_Triglycerides`, `HDL_Cholesterol`, `LDL_Cholesterol`) VALUES
('001', 1, '2023-09-10', '2023-09-10', '2023-09-12', 'Karim Uddin', 'Male', 25, 'Dr.Abul kalam', 'HDL_Cholesterol', NULL, NULL, NULL, NULL),
('003', 3, '2023-09-10', '2023-09-12', '2023-09-14', 'salma', 'female', 26, 'Dr. Razia', 'RHfactor ', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pregnancy`
--

CREATE TABLE `pregnancy` (
  `registrationid` varchar(255) NOT NULL,
  `slno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `receivedate` date DEFAULT NULL,
  `reportdate` date DEFAULT NULL,
  `patientname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `referdoctor` varchar(255) DEFAULT NULL,
  `testname` varchar(255) DEFAULT NULL,
  `Pregnancy_test` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pregnancy`
--

INSERT INTO `pregnancy` (`registrationid`, `slno`, `date`, `receivedate`, `reportdate`, `patientname`, `gender`, `age`, `referdoctor`, `testname`, `Pregnancy_test`) VALUES
('123', 2, '2023-09-02', '2023-09-05', '2023-09-05', '1324gjh', 'emale', 27, 'asghkjkll;k', 'dsgfhj', '-ve'),
('asd-123', 4, '2023-09-06', '2023-09-02', '2023-09-11', 'abc gender=female age=24', '', 0, 'dr. avcd', 'peganancy Pregnancy_test=positive', ''),
('bsd-123', 2, '2023-09-06', '2023-09-02', '2023-09-11', 'abc gender=female', '', 24, 'dr. avcd', 'peganancy', 'positive'),
('csd-123', 3, '2023-09-06', '2023-09-02', '2023-09-11', 'Selina', 'female', 24, 'dr. avcd', 'peganancy', 'negative');

-- --------------------------------------------------------

--
-- Table structure for table `purcheslineitems`
--

CREATE TABLE `purcheslineitems` (
  `vrno` varchar(100) NOT NULL,
  `slno` int(11) NOT NULL,
  `itemcode` int(100) DEFAULT NULL,
  `itemname` varchar(100) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purcheslineitems`
--

INSERT INTO `purcheslineitems` (`vrno`, `slno`, `itemcode`, `itemname`, `qty`, `price`, `total`) VALUES
('AC-00007', 0, 23, 'Siring', 1, 5, 5),
('AC-00008', 0, 23, 'Siring', 1, 5, 5),
('AC-00009', 0, 23, 'Siring', 1, 5, 5),
('AC-00010', 0, 23, 'ECG TRACING', 1, 100, 100),
('AC-00010', 0, 24, ' SERUM SGPT (ALT) SERUM SGOT (AST)', 1, 130, 130),
('AC-00011', 0, 23, 'ECG TRACING', 1, 100, 100),
('AC-00011', 0, 12, 'BLOOD SUGAR TEST', 1, 70, 70);

-- --------------------------------------------------------

--
-- Table structure for table `purchestotal`
--

CREATE TABLE `purchestotal` (
  `vrno` varchar(100) NOT NULL,
  `suppliername` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `net` double DEFAULT NULL,
  `paid` double DEFAULT NULL,
  `due` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchestotal`
--

INSERT INTO `purchestotal` (`vrno`, `suppliername`, `date`, `total`, `discount`, `net`, `paid`, `due`) VALUES
('A-001', 'karim', '2023-09-18', 200, 20, 180, 100, 80),
('A-002', 'jamal', '2023-09-18', 200, 20, 180, 100, 80),
('AC-00003', '', '2023-09-18', 5, 0, 5, 5, 0),
('AC-00004', '', '2023-09-18', 50, 0, 50, 50, 0),
('AC-00005', 'sdfds', '2023-09-18', 5, 0, 5, 0, 5),
('AC-00006', 'asdesa', '2023-09-18', 5, 0, 5, 5, 0),
('AC-00007', 'esdsa', '2023-09-18', 5, 0, 5, 3, 2),
('AC-00008', '', '2023-09-18', 0, 0, 0, 0, 0),
('AC-00009', '', '2023-09-19', 5, 0, 0, 0, 0),
('AC-00010', '', '2023-09-19', 230, 30, 200, 100, 100),
('AC-00011', 'sdfds', '2023-09-19', 170, 10, 160, 100, 60);

-- --------------------------------------------------------

--
-- Table structure for table `saleslineitems`
--

CREATE TABLE `saleslineitems` (
  `vrno` varchar(100) NOT NULL,
  `slno` int(11) NOT NULL,
  `itemcode` varchar(100) DEFAULT NULL,
  `itemname` varchar(100) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saleslineitems`
--

INSERT INTO `saleslineitems` (`vrno`, `slno`, `itemcode`, `itemname`, `qty`, `price`, `total`) VALUES
('AC-00001', 1, '10', 'X-Ray sdfdsf', 1, 160, 160),
('AC-00001', 2, '11', 'NIGHT FEE', 1, 160, 160),
('AC-00001', 3, '12', ' FASTING BLOOD SUGAR ', 1, 70, 70),
('AC-00002', 1, '14', 'B.S 2HRS ABF/PP ', 1, 100, 100),
('AC-00002', 2, '15', 'B.S 2HRS ABF/PP WITH TAB/INSULIN', 1, 90, 90),
('AC-00002', 3, '16', ' ECG (AUTO)', 1, 160, 160),
('AC-00003', 1, '10', 'X-Ray sdfdsf', 1, 160, 160),
('AC-00003', 2, '14', 'B.S 2HRS ABF/PP ', 1, 100, 100),
('AC-00003', 3, '17', 'BILIRUBIN ', 1, 500, 500),
('AC-00004', 1, '15', 'B.S 2HRS ABF/PP WITH TAB/INSULIN', 2, 90, 180),
('AC-00004', 2, '15', 'B.S 2HRS ABF/PP WITH TAB/INSULIN', 1, 90, 90),
('AC-00004', 3, '15', 'B.S 2HRS ABF/PP WITH TAB/INSULIN', 2, 90, 180),
('AC-00004', 4, '13', 'B.S 2HRS ABF/PP ', 1, 100, 100),
('AC-00004', 5, '10', 'X-Raydd', 1, 160, 160),
('AC-00004', 6, '11', 'Night Fee', 1, 160, 160),
('AC-00004', 7, '15', 'B.S 2HRS ABF/PP WITH TAB/INSULIN', 1, 90, 90),
('AC-00005', 1, '13', 'B.S 2HRS ABF/PP ', 1, 100, 100),
('AC-00005', 2, '13', 'B.S 2HRS ABF/PP ', 2, 100, 200),
('AC-00005', 3, '17', 'BILIRUBIN ', 1, 500, 500),
('AC-00006', 1, '10', 'X-Raydd', 1, 160, 160),
('AC-00006', 2, '11', 'Night Fee', 1, 160, 160),
('AC-00006', 3, '13', 'B.S 2HRS ABF/PP ', 1, 100, 100),
('AC-00006', 4, '14', 'B.S 2HRS ABF/PP ', 1, 100, 100),
('AC-00008', 1, '10', 'X-Raydd', 1, 160, 160),
('AC-00008', 2, '12', ' FASTING BLOOD SUGAR ', 1, 70, 70),
('AC-00008', 3, '12', ' FASTING BLOOD SUGAR ', 2, 70, 140),
('AC-00008', 4, '17', 'BILIRUBIN ', 1, 500, 500),
('AC-00009', 1, '10', 'X-Raydd', 2, 160, 320),
('AC-00009', 2, '11', 'Night Fee', 2, 160, 320),
('AC-00010', 1, '10', 'X-Raydd', 1, 160, 160),
('AC-00010', 2, '14', 'B.S 2HRS ABF/PP ', 2, 100, 200),
('AC-00011', 1, '11', 'Night Fee', 1, 160, 160),
('AC-00011', 2, '12', ' FASTING BLOOD SUGAR ', 1, 70, 70),
('AC-00013', 1, '17', 'BILIRUBIN ', 1, 500, 500),
('AC-00013', 2, '10', 'X-Raydd', 1, 160, 160),
('AC-00014', 1, '35', 'Serological', 1, 100, 100),
('AC-00014', 2, '31', 'Pregnancy', 1, 160, 160),
('AC-00015', 1, '41', ' FASTING BLOOD SUGAR ', 1, 200, 200),
('AC-00015', 2, '43', 'LIPID_PROFILE', 1, 70, 70);

-- --------------------------------------------------------

--
-- Table structure for table `salestotal`
--

CREATE TABLE `salestotal` (
  `vrno` varchar(100) NOT NULL,
  `CustomerName` varchar(100) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `Dicount` double DEFAULT NULL,
  `Net` double DEFAULT NULL,
  `Paid` double DEFAULT NULL,
  `Due` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salestotal`
--

INSERT INTO `salestotal` (`vrno`, `CustomerName`, `Date`, `Total`, `Dicount`, `Net`, `Paid`, `Due`) VALUES
('AC-00001', 'Jamal', '2023-09-05 00:00:00', 390, 20, 370, 300, 70),
('AC-00002', 'Kamal', '2023-09-05 00:00:00', 350, 50, 300, 250, 50),
('AC-00003', 'Jamal', '2023-09-05 00:00:00', 760, 10, 750, 700, 50),
('AC-00004', 'AShrin', '2021-05-03 00:00:00', 960, 50, 910, 900, 10),
('AC-00005', 'AShrin', '2023-09-05 00:00:00', 800, 50, 750, 700, 50),
('AC-00006', 'Jamal', '2023-09-16 00:00:00', 520, 20, 500, 270, 230),
('AC-00007', 'Jamal', '2023-09-09 00:00:00', 370, 10, 360, 50, 310),
('AC-00008', 'Jamal', '2023-09-16 00:00:00', 480, 20, 460, 400, 60),
('AC-00009', 'awewr', '2023-09-16 00:00:00', 640, 60, 420, 400, 20),
('AC-00010', 'Jamal', '2023-09-16 00:00:00', 360, 30, 330, 300, 30),
('AC-00011', 'Kamal', '2023-09-16 00:00:00', 230, 30, 200, 50, 150),
('AC-00012', '', '2023-09-17 00:00:00', 680, 50, 630, 10, 620),
('AC-00013', 'Kamal', '2023-09-17 00:00:00', 660, 20, 640, 400, 240),
('AC-00014', 'kamal', '2023-09-19 00:00:00', 260, 10, 250, 250, 0),
('AC-00015', 'abdul', '2023-09-19 00:00:00', 270, 0, 270, 27, 243);

-- --------------------------------------------------------

--
-- Table structure for table `serological`
--

CREATE TABLE `serological` (
  `registrationid` varchar(100) NOT NULL,
  `slno` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `receivedate` date DEFAULT NULL,
  `reportdate` date DEFAULT NULL,
  `patientname` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `referdoctor` varchar(100) DEFAULT NULL,
  `testname` varchar(100) DEFAULT NULL,
  `ASO_TITRE` int(11) DEFAULT NULL,
  `R_A_Factor` int(11) DEFAULT NULL,
  `HBs_Ag_Screenning` int(11) DEFAULT NULL,
  `HBs_Ag_Confirmatory` int(11) DEFAULT NULL,
  `VDRL_TEST_Qualiitive` int(11) DEFAULT NULL,
  `VDRL_TEST_Quantative` int(11) DEFAULT NULL,
  `TPHA` int(11) DEFAULT NULL,
  `HbATC` int(11) DEFAULT NULL,
  `CRP` int(11) DEFAULT NULL,
  `MICRO_Albumin_Urine` int(11) DEFAULT NULL,
  `Vitamin_B_12` int(11) DEFAULT NULL,
  `BLOOD_GROUP_RH_D_TYPE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serological`
--

INSERT INTO `serological` (`registrationid`, `slno`, `date`, `receivedate`, `reportdate`, `patientname`, `gender`, `age`, `referdoctor`, `testname`, `ASO_TITRE`, `R_A_Factor`, `HBs_Ag_Screenning`, `HBs_Ag_Confirmatory`, `VDRL_TEST_Qualiitive`, `VDRL_TEST_Quantative`, `TPHA`, `HbATC`, `CRP`, `MICRO_Albumin_Urine`, `Vitamin_B_12`, `BLOOD_GROUP_RH_D_TYPE`) VALUES
('N-006', 2, '2023-09-16', '2023-09-16', '2023-09-19', 'Mili', 'female', 65, 'dr.shahana', 'CRP', 0, 0, 90, 70, 9, 9, 90, 0, 0, 0, 0, 95);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `Code` varchar(100) NOT NULL,
  `TestCode` varchar(500) DEFAULT NULL,
  `Type` varchar(100) DEFAULT NULL,
  `GroupCode` varchar(100) DEFAULT NULL,
  `Investigation` varchar(100) DEFAULT NULL,
  `Details` varchar(50) DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`Code`, `TestCode`, `Type`, `GroupCode`, `Investigation`, `Details`, `Amount`, `picture`) VALUES
('10', 'CXR-01', 'X-Ray', 'G-018', 'X-Raydd', 'X-Raydd', 160, 'young-asian-female-dentist-white-coat-posing-clinic-equipment.jpg'),
('11', 'CXR-02', 'X-Ray', 'G-018', 'Night Fee', 'Night Fee', 160, '150px-Flag_of_Germany.svg.jpg'),
('12', 'BIO-01', 'Pathology', 'G-001', 'BLOOD SUGAR TEST', 'BLOOD SUGAR TEST', 70, 'Borcelle logo.png'),
('13', 'BIO-02\r\n', 'Pathology\r\n', 'G-001', 'B.S 2HRS ABF/PP & CUS', 'BioChemical\r\n', 100, NULL),
('14', 'BIO-03\r\n', 'Pathology\r\n', 'G-001', 'B.S 2HRS ABF/PP & CUS', 'BioChemical\r\n', 100, NULL),
('15', 'BIO-03\r\n', 'Pathology\r\n', 'G-001', 'B.S 2HRS ABF/PP WITH TAB/INSULIN\r\n\r\n', 'BioChemical\r\n', 90, NULL),
('16', 'ECG-01', 'E.C.G\r\n', 'G-004', ' ECG (AUTO)', 'E.C.G', 160, NULL),
('17', 'BIO-05', 'Pathology', 'G-001', 'BILIRUBIN & SGPT & SGOT', 'BioChemical', 500, NULL),
('20', 'BIO-08\r\n', 'Pathology\r\n', 'G-001', 'SIRUM BILIRUBIN (TOTAL/DIRECT/INDIRECT)\r\n', 'BioChemical\r\n', 600, NULL),
('21', 'ECG-03', 'E.C.G\r\n', 'G-004', 'ECG (JO)', 'E.C.G', 150, NULL),
('22', 'BIO-09\r\n', 'Pathology\r\n', 'G-001', ' SERUM SGPT (ALT)\r\n\r\n\r\n', ' SERUM SGPT (ALT)\r\n', 130, NULL),
('23', 'ECG-04', 'E.C.G\r\n', 'G-004', 'ECG TRACING', 'E.C.G', 100, NULL),
('24', 'BIO-10\r\n', 'Pathology\r\n', 'G-001', ' SERUM SGPT (ALT) SERUM SGOT (AST)', ' SERUM SGPT (ALT)\r\n', 130, NULL),
('25', 'BIO-11\r\n', 'Pathology\r\n', 'G-001', 'SERUM ALKALINE PHOSPHATASE', 'BioChemical\r\n', 250, NULL),
('26', 'BIO-05', 'Pathology', 'G-001', 'BILIRUBIN ', 'BioChemical', 500, 'woman-wearing-mask-face-closeup-covid-19-green-background.jpeg'),
('27', 'CXR-02', 'Pathology', 'G-001', 'BioChemical', 'BioChemical', 150, 'medium-shot-man-getting-vaccine.jpg'),
('28', 'CXR-02', 'X-Ray', 'G-018', 'X-RAY CHEST A/P VIEW', 'X-Ray', 160, 'female-doctor-with-presenting-hand-gesture.jpg'),
('29', 'CXR-02', 'Pathology', 'G-001', 'BioChemical', 'BioChemical', 150, 'portrait-successful-mid-adult-doctor-with-crossed-arms.jpg'),
('30', 'CXR-01', 'X-Ray', 'G-018', 'X-RAY CHEST A/P VIEW', 'X-Ray', 160, 'doctor-s-hand-holding-stethoscope-closeup.jpg'),
('31', 'CXR-01', 'X-Ray', 'G-018', 'Pregnancy', 'Pregnancy', 160, 'young-asian-female-dentist-white-coat-posing-clinic-equipment.jpg'),
('32', 'CXR-02\n', 'X-Ray\n', 'G-018', 'Pregnancy FEE\r\n', 'Pregnancy\r\n', 160, NULL),
('33', 'BIO-01\n', 'Pathology\n', 'G-001', 'Pregnancy\r\n', 'Pregnancy Test\r\n', 70, NULL),
('34', 'BIO-02\r\n', 'Pathology\r\n', 'G-001', 'B.S 2HRS ABF/PP & CUS', 'BioChemical\r\n', 100, NULL),
('35', 'BIO-03\r\n', 'Pathology\r\n', 'G-001', 'Serological', 'Serological\r\n', 100, NULL),
('36', 'BIO-03\r\n', 'Pathology\r\n', 'G-001', 'Serological Test\r\n\r\n', 'Serological Test\r\n', 90, NULL),
('37', 'ECG-01', 'Serological\r\n', 'G-004', '(AUTO)', 'Serological', 160, NULL),
('41', 'CR-02', 'blood_group\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nphathology', 'G-001', ' FASTING BLOOD SUGAR & CUS', 'blood_group', 200, 'picture2.jpg'),
('42', 'IMM-07', 'Pathology', 'G-001', ' HBSAG (SCREENING)', 'SERELOGICAL', 160, NULL),
('43', 'phathology', 'BIO-CHEMICAL', 'G-001', 'LIPID_PROFILE', 'LIPID_PROFILE', 70, ''),
('44', 'Pathology', 'BIO-1', 'G-001', ' SERUM CHOLESTEROL', ' SERUM CHOLESTEROL', 1200, NULL),
('45', 'E.C.G-003', 'E.C.G', 'G-001', 'E.C.G', 'E.C.G', 150, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin', 'Admin', 'admin'),
(2, 'cashier', 'cashier', 'Cashier Pharmacy', 'Cashier'),
(3, 'admin', 'admin123', 'Administrator', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biochemical`
--
ALTER TABLE `biochemical`
  ADD PRIMARY KEY (`registrationid`,`slno`);

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`registrationid`,`Slno`);

--
-- Indexes for table `e_c_g`
--
ALTER TABLE `e_c_g`
  ADD PRIMARY KEY (`registrationid`,`slno`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupcode`);

--
-- Indexes for table `lipidprofile`
--
ALTER TABLE `lipidprofile`
  ADD PRIMARY KEY (`registrationid`,`Slno`);

--
-- Indexes for table `pregnancy`
--
ALTER TABLE `pregnancy`
  ADD PRIMARY KEY (`registrationid`,`slno`);

--
-- Indexes for table `saleslineitems`
--
ALTER TABLE `saleslineitems`
  ADD PRIMARY KEY (`vrno`,`slno`),
  ADD KEY `itemcode` (`itemcode`);

--
-- Indexes for table `salestotal`
--
ALTER TABLE `salestotal`
  ADD PRIMARY KEY (`vrno`);

--
-- Indexes for table `serological`
--
ALTER TABLE `serological`
  ADD PRIMARY KEY (`registrationid`,`slno`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`Code`),
  ADD KEY `GroupCode` (`GroupCode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `saleslineitems`
--
ALTER TABLE `saleslineitems`
  ADD CONSTRAINT `saleslineitems_ibfk_1` FOREIGN KEY (`itemcode`) REFERENCES `tests` (`Code`);

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`GroupCode`) REFERENCES `groups` (`groupcode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
