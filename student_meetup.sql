-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 03:19 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_meetup`
--

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id_report` int(11) NOT NULL,
  `id_student_reported` int(11) NOT NULL,
  `id_student_reportee` int(11) NOT NULL,
  `reason` enum('abusive','spamming_bot','','') NOT NULL,
  `desc_reason` varchar(220) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id_session` int(11) NOT NULL,
  `course` varchar(20) NOT NULL,
  `session_title` varchar(220) NOT NULL,
  `session_id_admin` int(11) NOT NULL,
  `session_admin` varchar(220) NOT NULL,
  `session_date` date NOT NULL,
  `session_time` time NOT NULL,
  `session_location` varchar(220) NOT NULL,
  `session_tags` varchar(220) NOT NULL,
  `session_descr` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id_session`, `course`, `session_title`, `session_id_admin`, `session_admin`, `session_date`, `session_time`, `session_location`, `session_tags`, `session_descr`) VALUES
(70, 'IT', ' Big Data', 26, ' adminJames', '2020-04-05', '15:00:00', 'Library', 'big data,it', 'Hi Guys I will be in the library today studying Big data, if anyone want to join me..!'),
(83, 'Business', ' TESTE', 25, ' adminAlejandro', '2020-04-05', '02:02:00', '0202', '020', '0202\r\n'),
(84, 'Business', ' JAVASCRIPT', 25, ' adminAlejandro', '0060-06-06', '06:06:00', '06060', '060', '0666'),
(86, 'IT', ' JAVASCRIPT', 7, ' Sue', '2020-04-05', '16:06:00', 'Library', 'javascript,web', 'Hi Guys I will be in the library today studying javascript, if anyone want to join me..!');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_student` int(11) NOT NULL,
  `student_firstName` varchar(220) NOT NULL,
  `student_nickname` varchar(220) NOT NULL,
  `student_email` varchar(220) NOT NULL,
  `student_password` varchar(220) NOT NULL,
  `student_course` varchar(30) NOT NULL,
  `student_description` varchar(220) NOT NULL,
  `student_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_student`, `student_firstName`, `student_nickname`, `student_email`, `student_password`, `student_course`, `student_description`, `student_foto`) VALUES
(7, 'Suelen', 'Sue', 'suelenfiorelo@hotmail.com', '123', 'IT', 's', ''),
(25, 'Alejandro', 'adminAlejandro', 'adminalejandro@hotmail.com', '123', 'Business', '123', ''),
(26, 'James', 'adminJames', 'adminjames@hotmail.com', '123', 'IT', '123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id_report`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id_session`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_student`),
  ADD UNIQUE KEY `student_email` (`student_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id_session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
