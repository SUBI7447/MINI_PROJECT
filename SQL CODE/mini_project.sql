-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 12:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `QUESTION` varchar(100) NOT NULL,
  `ANS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`QUESTION`, `ANS`) VALUES
('What is 7 + 1?', '8'),
('What is 4 * 7?', '28'),
('What is 7 - 10?', '-3'),
('What is 9 / 2?', '4.5'),
('What is 10 / 4?', '2.5');

-- --------------------------------------------------------

--
-- Table structure for table `question_deatils`
--

CREATE TABLE `question_deatils` (
  `test_id` int(30) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(50) NOT NULL,
  `mark` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_deatils`
--

INSERT INTO `question_deatils` (`test_id`, `question`, `answer`, `mark`) VALUES
(1234, 'What is 6 / 6?', '1', 25),
(1234, 'What is 6 / 8?', '0.75', 25),
(1234, 'What is 6 + 2?', '8', 25),
(1234, 'What is 7 - 1?', '6', 25),
(2468, 'What is 9 * 4?', '36', 25),
(2468, '1+1', '2', 25),
(2468, 'What is 3 - 10?', '-7', 25),
(2468, '10-5', '5', 25),
(3702, '1+1', '2', 10),
(3702, '2+2', '4', 10),
(3702, '3+3', '6', 10),
(3702, '5+6-20 = ?', '-9', 10),
(3702, '7/7', '1', 10);

-- --------------------------------------------------------

--
-- Table structure for table `test_details`
--

CREATE TABLE `test_details` (
  `created_by` varchar(30) NOT NULL,
  `test_id` int(30) NOT NULL,
  `test_name` varchar(30) NOT NULL,
  `test_password` varchar(30) NOT NULL,
  `test_time` int(30) NOT NULL,
  `total_marks` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`created_by`, `test_id`, `test_name`, `test_password`, `test_time`, `total_marks`) VALUES
('subodhsubi362@gmail.com', 1234, 'MATH', '100', 5, 100),
('subodhsubi362@gmail.com', 2468, 'UNIT', '123', 60, 100),
('subodhsubi362@gmail.com', 3702, 'abc', '1234', 5, 50);

-- --------------------------------------------------------

--
-- Table structure for table `test_information`
--

CREATE TABLE `test_information` (
  `user_email` varchar(30) NOT NULL,
  `test_id` int(30) NOT NULL,
  `test_name` varchar(30) NOT NULL,
  `total_marks` int(30) NOT NULL,
  `marks_obtain` int(30) NOT NULL,
  `pass / fail` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_information`
--

INSERT INTO `test_information` (`user_email`, `test_id`, `test_name`, `total_marks`, `marks_obtain`, `pass / fail`, `date`) VALUES
('subodhsubi362@gmail.com', 1234, 'MATH', 100, 75, 'pass', '2023-12-06'),
('subodhsubi362@gmail.com', 2468, 'UNIT', 100, 50, 'pass', '2023-12-07'),
('subodhsubi362@gmail.com', 3702, 'abc', 50, 20, 'pass', '2023-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`NAME`, `EMAIL`, `PASSWORD`) VALUES
('abhi', 'abhirupnar24@gmail.com', '$2y$10$rMT3yRV8A5RStYrDhk0Z9OM9qbIthovby/mVJBgX24Getm8T3e0gu'),
('laxmi', 'laxmigane22@gmail.com', '$2y$10$uvuWgZGvfBDVY90/epYaY.O1dKp.lHq6nMw7dqHND1ecZ3LsgHiOy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_details`
--
ALTER TABLE `test_details`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`EMAIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
