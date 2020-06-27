-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 03:39 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_matric_number` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `course_code`, `course_title`, `student_name`, `student_matric_number`, `time`, `date`) VALUES
(1, 'CSC201', 'Introduction to computer programming', 'John Doe', 'kasu/22/csc/2225', '15:50', '2020-04-01'),
(2, 'CSC201', 'Introduction to computer programming', 'Mary Ann', 'kasu/22/csc/2227', '15:55', '2020-04-01'),
(3, 'CSC301', 'Object Oriented Programming', 'Eric Dougherty', 'kasu/22/csc/2229', '11:15', '2020-04-03'),
(4, 'CSC301', 'Object Oriented Programming', 'Jill Mason', 'kasu/22/csc/2223', '11:16', '2020-04-03'),
(5, 'CSC301', 'Object Oriented Programming', 'Samantha Williams', 'kasu/22/csc/2228', '11:17', '2020-04-03'),
(6, 'CSC301', 'Object Oriented Programming', 'Joan Isaac', 'kasu/22/csc/2224', '11:20', '2020-04-03'),
(7, 'CSC301', 'Object Oriented Programming', 'Jade Hiroshima', 'kasu/22/csc/2222', '13:46', '2020-04-03'),
(8, 'CSC301', 'Object Oriented Programming', 'Samantha Williams', 'kasu/22/csc/2228', '14:20', '2020-04-03'),
(9, 'CSC301', 'Object Oriented Programming', 'Edna Connor', 'kasu/22/csc/2221', '14:22', '2020-04-03'),
(10, 'CSC301', 'Object Oriented Programming', 'Barry Cologne', 'kasu/22/csc/2230', '14:41', '2020-04-03'),
(11, 'CSC301', 'Object Oriented Programming', 'John Doe', 'kasu/22/csc/2225', '20:11', '2020-04-03'),
(12, 'CSC301', 'Object Oriented Programming', 'Mary Ann', 'kasu/22/csc/2227', '20:14', '2020-04-03'),
(13, 'CSC202', 'Java programming', 'Barry Cologne', 'kasu/22/csc/2230', '20:16', '2020-04-03'),
(14, 'CSC202', 'Java programming', 'Edna Connor', 'kasu/22/csc/2221', '20:17', '2020-04-03'),
(15, 'CSC202', 'Java programming', 'Eric Dougherty', 'kasu/22/csc/2229', '20:20', '2020-04-03'),
(16, 'CSC202', 'Java programming', 'Jade Hiroshima', 'kasu/22/csc/2222', '20:21', '2020-04-03'),
(17, 'CSC202', 'Java programming', 'Jill Mason', 'kasu/22/csc/2223', '20:31', '2020-04-03'),
(18, 'CSC202', 'Java programming', 'Jill Mason', 'kasu/22/csc/2223', '20:31', '2020-04-03'),
(19, 'CSC101', 'Introduction to computer science', 'Edna Connor', 'kasu/22/csc/2221', '20:46', '2020-04-03'),
(20, 'CSC101', 'Introduction to computer science', 'Barry Cologne', 'kasu/22/csc/2230', '20:47', '2020-04-03'),
(21, 'CSC101', 'Introduction to computer science', 'Jade Hiroshima', 'kasu/22/csc/2222', '22:05', '2020-04-03'),
(22, 'CSC101', 'Introduction to computer science', 'Joan Isaac', 'kasu/22/csc/2224', '22:38', '2020-04-03'),
(23, 'CSC101', 'Introduction to computer science', 'Joan Isaac', 'kasu/22/csc/2224', '22:52', '2020-04-03'),
(24, 'CSC202', 'Java programming', 'Jade Hiroshima', 'kasu/22/csc/2222', '10:41', '2020-05-08'),
(25, 'CSC202', 'Java programming', 'Edna Connor', 'kasu/22/csc/2221', '10:41', '2020-05-08'),
(26, 'CSC202', 'Java programming', 'John Doe', 'kasu/22/csc/2225', '10:41', '2020-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `title`) VALUES
(1, 'CSC101', 'Introduction to computer science'),
(2, 'CSC201', 'Introduction to computer programming'),
(4, 'CSC301', 'Object Oriented Programming'),
(5, 'CSC202', 'Java programming'),
(6, 'CSC202', 'Java programming');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `photograph` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `photo_name` varchar(20) NOT NULL,
  `matric_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `photograph`, `full_name`, `photo_name`, `matric_number`) VALUES
(1, './people_pictures/edna.jpg', 'Edna Connor', 'edna', 'kasu/22/csc/2221'),
(2, './people_pictures/jade.jpg', 'Jade Hiroshima', 'jade', 'kasu/22/csc/2222'),
(3, './people_pictures/jill.jpg', 'Jill Mason', 'jill', 'kasu/22/csc/2223'),
(4, './people_pictures/joan.jpg', 'Joan Isaac', 'joan', 'kasu/22/csc/2224'),
(5, './people_pictures/john.jpg', 'John Doe', 'john', 'kasu/22/csc/2225'),
(6, './people_pictures/lewis.jpg', 'Lewis Capaldi', 'lewis', 'kasu/22/csc/2226'),
(7, './people_pictures/mary.jpg', 'Mary Ann', 'mary', 'kasu/22/csc/2227'),
(8, './people_pictures/samantha.jpg', 'Samantha Williams', 'samantha', 'kasu/22/csc/2228'),
(10, './people_pictures/Eric.jpg', 'Eric Dougherty', 'eric', 'kasu/22/csc/2229'),
(11, './people_pictures/barry.jpg', 'Barry Cologne', 'barry', 'kasu/22/csc/2230');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
