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
-- Database: `cse-aiml`
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
('Whether submission of experimental write-up was routine & repetitive?', 0),
('count', 0);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
