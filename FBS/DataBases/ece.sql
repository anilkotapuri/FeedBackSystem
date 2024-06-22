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
-- Database: `ece`
--

-- --------------------------------------------------------

--
-- Table structure for table `feed_lab`
--

CREATE TABLE `feed_lab` (
  `parameters` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feed_lab`
--

INSERT INTO `feed_lab` (`parameters`) VALUES
('Was the selection of experiment Commensurate with the theory?'),
('Was the experiment leading towards proper conclusions/ interpretations?'),
('Whether lab instructor helped you in understanding the experimental observations. Outcome and explaining the difficulties raised while performing the experiment?'),
('Whether the experiments trigger you for creative idea?'),
('Whether experimental set-up was well maintained, fully operational & adequate?'),
('Whether precise, updated & self explanatory was routine & repetitive?'),
('Whether lab instructor does assessment of experiment regularly and gives feedback?'),
('Whether the entire lab session was useful in clarifying you knowledge of the theory?'),
('Whether you are confident with the use of the concepts, instruments and their Applicatio in further studies?'),
('Whether submission of experimental write-up was routine & repetitive?'),
('count');

-- --------------------------------------------------------

--
-- Table structure for table `feed_sub`
--

CREATE TABLE `feed_sub` (
  `Parameters` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feed_sub`
--

INSERT INTO `feed_sub` (`Parameters`) VALUES
('Knowledge of the subject'),
('Coming well prepared for the class'),
('Giving clear explanations'),
('Command of language'),
('Clear and audible voice'),
('Holding the atention students through the class'),
('Providing more matter tahn in the textbooks'),
('Capability to clear the doubts of students'),
('Encouraging the students to ask questions and participate in discussion'),
('Appreciate students as and when deserving'),
('Willing to helpstudents even out of the class'),
('Return of valued test papers/records in time'),
('Punctuality and following timetable schedule'),
('Coverage of syllabus'),
('Impartial teaching all students alike'),
('count');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
