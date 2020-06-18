-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 09:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` varchar(4) NOT NULL,
  `department_name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
('ACCT', 'Accounting'),
('CHEM', 'Chemistry'),
('ENGL', 'English'),
('HIST', 'History'),
('MATH', 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` varchar(4) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `department_id` varchar(4) DEFAULT NULL,
  `school_id` smallint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `first_name`, `last_name`, `department_id`, `school_id`) VALUES
('bh01', 'Brody', 'Haney', 'ENGL', 6398),
('bs03', 'Bridie', 'Smith', 'CHEM', 6398),
('gh95', 'Gino', 'Hagan', 'MATH', 8887),
('ng02', 'Nafisa', 'Gates', 'HIST', 6398),
('rm33', 'Rachel', 'Mcneil', 'ENGL', 9788),
('sl32', 'Samah', 'Lees', 'ENGL', 9788),
('td96', 'Tala', 'Dupont', 'ACCT', 8887),
('um97', 'Uwais', 'McKinney', 'MATH', 8887),
('we31', 'Winnie', 'Esparza', 'CHEM', 9788);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(4) UNSIGNED NOT NULL,
  `student_id` varchar(40) NOT NULL,
  `instructor_id` varchar(4) NOT NULL,
  `school_id` smallint(4) NOT NULL,
  `results_1` varchar(20) DEFAULT NULL,
  `results_2` varchar(10) DEFAULT NULL,
  `results_3` varchar(60) DEFAULT NULL,
  `results_4` varchar(60) DEFAULT NULL,
  `results_5` varchar(3) DEFAULT NULL,
  `results_6` varchar(200) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `student_id`, `instructor_id`, `school_id`, `results_1`, `results_2`, `results_3`, `results_4`, `results_5`, `results_6`, `date`) VALUES
(1, '3', 'bh01', 6398, 'Brody Haney', 'Excellent', 'He takes the time to listen.', 'Do not listen enough', 'yes', '', '2020-06-18 07:33:48'),
(2, '6', 'we31', 9788, 'Winnie', 'good', 'She likes turtles', 'Not fish', 'yes', '\"\"', '2020-06-18 07:33:48'),
(6, '29', 'bs02', 6398, 'Nafisa Gates', 'Excellent', ' Always helpful in zoom meetings', 'microwaves fish', 'yes', 'Instructor Nafisa microwaved fish one time, did not end well', '2020-06-18 07:33:48'),
(8, '33', 'bs02', 6398, 'Nafisa Gates', 'Excellent', ' Take notes well', 'microwave a fish ', 'yes', 'Don\'t let the instructor microwave a fish', '2020-06-18 07:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` smallint(4) NOT NULL,
  `school_name` varchar(40) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `address`, `state`) VALUES
(6398, 'Clark College', '1933 Fort Vancouver Way', 'Washington'),
(8887, 'Portland State University', '724 SW Harrison', 'Oregon'),
(9788, 'Washington State University Vancouver', '14204 NE Salmon Creek Ave', 'Washington');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(200) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(130) NOT NULL,
  `major` varchar(30) NOT NULL,
  `school_id` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `username`, `password`, `major`, `school_id`) VALUES
(29, 'dave', 'hawk', 'dhawk', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 'math', 6398),
(32, 'Tony', 'Hawk', 'thawk', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', 'english', 8887),
(33, 'rich', 'mora', 'rmora', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 'web', 6398);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD UNIQUE KEY `student_id` (`student_id`) USING BTREE,
  ADD KEY `instructor_id` (`instructor_id`) USING BTREE,
  ADD KEY `school_id` (`school_id`) USING BTREE;

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `school_id` (`school_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
