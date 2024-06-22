-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 02:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse`
--

-- --------------------------------------------------------

--
-- Table structure for table `feed_lab`
--

CREATE TABLE `feed_lab` (
  `parameters` text NOT NULL,
  `count` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feed_lab`
--

INSERT INTO `feed_lab` (`parameters`, `count`) VALUES
('Was the selection of experiment Commensurate with the theory?', 0),
('Was the experiment leading towards proper conclusions/ interpretations?', 0),
('Whether lab instructor helped you in understanding the experimental observations. Outcome and explaining the difficulties raised while performing the experiment?', 0),
('Whether the experiments trigger you for creative idea?', 0),
('Whether experimental set-up was well maintained, fully operational & adequate?', 0),
('Whether precise, updated & self explanatory was routine & repetitive?', 0),
('Whether lab instructor does assessment of experiment regularly and gives feedback?', 0),
('Whether the entire lab session was useful in clarifying you knowledge of the theory?', 0),
('Whether you are confident with the use of the concepts, instruments and their Applicatio in further studies?', 0),
('Whether submission of experimental write-up was routine & repetitive?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feed_sub`
--

CREATE TABLE `feed_sub` (
  `Parameters` text DEFAULT NULL,
  `count` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feed_sub`
--

INSERT INTO `feed_sub` (`Parameters`, `count`) VALUES
('Knowledge of the subject', 0),
('Coming well prepared for the class', 0),
('Giving clear explanations', 0),
('Command of language', 0),
('Clear and audible voice', 0),
('Holding the atention students through the class', 0),
('Providing more matter tahn in the textbooks', 0),
('Capability to clear the doubts of students', 0),
('Encouraging the students to ask questions and participate in discussion', 0),
('Appreciate students as and when deserving', 0),
('Willing to helpstudents even out of the class', 0),
('Return of valued test papers/records in time', 0),
('Punctuality and following timetable schedule', 0),
('Coverage of syllabus', 0),
('Impartial teaching all students alike', 0),
('count', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ii_ii_details`
--

CREATE TABLE `ii_ii_details` (
  `type` enum('Subject','Lab') NOT NULL,
  `name` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ii_ii_details`
--

INSERT INTO `ii_ii_details` (`type`, `name`, `faculty`) VALUES
('Subject', 'PPSC', 'Mr.T.Phaniraj kumar'),
('Lab', 'DATA WAREHOUSING AND MINING LAB', 'Y. VENUGOPAL');

-- --------------------------------------------------------

--
-- Table structure for table `ii_ii_feed_lab_1`
--

CREATE TABLE `ii_ii_feed_lab_1` (
  `parameters` text NOT NULL,
  `count` int(255) NOT NULL DEFAULT 0,
  `lab1` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ii_ii_feed_lab_1`
--

INSERT INTO `ii_ii_feed_lab_1` (`parameters`, `count`, `lab1`) VALUES
('Was the selection of experiment Commensurate with the theory?', 0, '0'),
('Was the experiment leading towards proper conclusions/ interpretations?', 0, '0'),
('Whether lab instructor helped you in understanding the experimental observations. Outcome and explaining the difficulties raised while performing the experiment?', 0, '0'),
('Whether the experiments trigger you for creative idea?', 0, '0'),
('Whether experimental set-up was well maintained, fully operational & adequate?', 0, '0'),
('Whether precise, updated & self explanatory was routine & repetitive?', 0, '0'),
('Whether lab instructor does assessment of experiment regularly and gives feedback?', 0, '0'),
('Whether the entire lab session was useful in clarifying you knowledge of the theory?', 0, '0'),
('Whether you are confident with the use of the concepts, instruments and their Applicatio in further studies?', 0, '0'),
('Whether submission of experimental write-up was routine & repetitive?', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `ii_ii_feed_sub_1`
--

CREATE TABLE `ii_ii_feed_sub_1` (
  `Parameters` text DEFAULT NULL,
  `count` int(255) NOT NULL DEFAULT 0,
  `subject1` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ii_ii_feed_sub_1`
--

INSERT INTO `ii_ii_feed_sub_1` (`Parameters`, `count`, `subject1`) VALUES
('Knowledge of the subject', 0, '0'),
('Coming well prepared for the class', 0, '0'),
('Giving clear explanations', 0, '0'),
('Command of language', 0, '0'),
('Clear and audible voice', 0, '0'),
('Holding the atention students through the class', 0, '0'),
('Providing more matter tahn in the textbooks', 0, '0'),
('Capability to clear the doubts of students', 0, '0'),
('Encouraging the students to ask questions and participate in discussion', 0, '0'),
('Appreciate students as and when deserving', 0, '0'),
('Willing to helpstudents even out of the class', 0, '0'),
('Return of valued test papers/records in time', 0, '0'),
('Punctuality and following timetable schedule', 0, '0'),
('Coverage of syllabus', 0, '0'),
('Impartial teaching all students alike', 0, '0'),
('count', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `i_i_details`
--

CREATE TABLE `i_i_details` (
  `type` enum('Subject','Lab') NOT NULL,
  `name` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `i_i_details`
--

INSERT INTO `i_i_details` (`type`, `name`, `faculty`) VALUES
('Subject', 'PPSC', 'Mr.T.Phaniraj kumar'),
('Subject', 'PROBABILITY AND STATISTICS', 'P. RAGHU RAM'),
('Subject', 'DWDM', 'Mr.Siva Krishna'),
('Lab', 'PPSC-lab', 'Mr.T.Phaniraj kumar'),
('Lab', 'DATA WAREHOUSING AND MINING LAB', 'Y. VENUGOPAL'),
('Lab', 'DWDM-LAB', 'Mr.Siva Krishna');

-- --------------------------------------------------------

--
-- Table structure for table `i_i_feed_lab_1`
--

CREATE TABLE `i_i_feed_lab_1` (
  `parameters` text NOT NULL,
  `count` int(255) NOT NULL DEFAULT 0,
  `lab1` varchar(255) DEFAULT '0',
  `lab2` varchar(255) DEFAULT '0',
  `lab3` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `i_i_feed_lab_1`
--

INSERT INTO `i_i_feed_lab_1` (`parameters`, `count`, `lab1`, `lab2`, `lab3`) VALUES
('Was the selection of experiment Commensurate with the theory?', 10, '10.164141414141413', '5.082070707070707', '0'),
('Was the experiment leading towards proper conclusions/ interpretations?', 10, '0', '5.082070707070707', '10.164141414141413'),
('Whether lab instructor helped you in understanding the experimental observations. Outcome and explaining the difficulties raised while performing the experiment?', 10, '5.082070707070707', '0', '10.164141414141413'),
('Whether the experiments trigger you for creative idea?', 10, '10.164141414141413', '5.082070707070707', '0'),
('Whether experimental set-up was well maintained, fully operational & adequate?', 10, '5.082070707070707', '10.164141414141413', '10.164141414141413'),
('Whether precise, updated & self explanatory was routine & repetitive?', 10, '0', '0', '5.082070707070707'),
('Whether lab instructor does assessment of experiment regularly and gives feedback?', 10, '10.164141414141413', '5.082070707070707', '5.082070707070707'),
('Whether the entire lab session was useful in clarifying you knowledge of the theory?', 10, '5.082070707070707', '10.164141414141413', '10.164141414141413'),
('Whether you are confident with the use of the concepts, instruments and their Applicatio in further studies?', 10, '10.164141414141413', '0', '5.082070707070707'),
('Whether submission of experimental write-up was routine & repetitive?', 1, '100', '0', '50');

-- --------------------------------------------------------

--
-- Table structure for table `i_i_feed_sub_1`
--

CREATE TABLE `i_i_feed_sub_1` (
  `Parameters` text DEFAULT NULL,
  `count` int(255) NOT NULL DEFAULT 0,
  `subject1` varchar(255) DEFAULT '0',
  `subject2` varchar(255) DEFAULT '0',
  `subject3` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `i_i_feed_sub_1`
--

INSERT INTO `i_i_feed_sub_1` (`Parameters`, `count`, `subject1`, `subject2`, `subject3`) VALUES
('Knowledge of the subject', 10, '10.164141414141413', '8.131313131313131', '8.131313131313131'),
('Coming well prepared for the class', 10, '8.131313131313131', '10.164141414141413', '6.098484848484848'),
('Giving clear explanations', 10, '6.098484848484848', '6.098484848484848', '10.164141414141413'),
('Command of language', 10, '10.164141414141413', '6.098484848484848', '4.065656565656566'),
('Clear and audible voice', 10, '2.032828282828283', '8.131313131313131', '10.164141414141413'),
('Holding the atention students through the class', 10, '8.131313131313131', '10.164141414141413', '4.065656565656566'),
('Providing more matter tahn in the textbooks', 10, '8.131313131313131', '2.032828282828283', '6.098484848484848'),
('Capability to clear the doubts of students', 10, '4.065656565656566', '6.098484848484848', '10.164141414141413'),
('Encouraging the students to ask questions and participate in discussion', 10, '6.098484848484848', '2.032828282828283', '8.131313131313131'),
('Appreciate students as and when deserving', 10, '6.098484848484848', '4.065656565656566', '4.065656565656566'),
('Willing to helpstudents even out of the class', 10, '4.065656565656566', '6.098484848484848', '4.065656565656566'),
('Return of valued test papers/records in time', 10, '6.098484848484848', '4.065656565656566', '10.164141414141413'),
('Punctuality and following timetable schedule', 10, '10.164141414141413', '2.032828282828283', '8.131313131313131'),
('Coverage of syllabus', 10, '4.065656565656566', '8.131313131313131', '10.164141414141413'),
('Impartial teaching all students alike', 10, '10.164141414141413', '6.098484848484848', '2.032828282828283'),
('count', 1, '100', '60', '20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
