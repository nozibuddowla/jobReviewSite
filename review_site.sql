-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 06:00 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `review_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'anik', 'anik.raihan@hotmail.com', 1841434022, 'hi'),
(8, 'jon', 'jon@yahoo.com', 1532112264, 'hey just testing this feature');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `message`, `name`) VALUES
(8, 'Maecenas ullamcorper, dui et placerat feugiat, eros pede varius nisi, condimentum viverra felis nunc et lorem. Phasellus tempus. Maecenas vestibulum mollis diam. Ut id nisl quis enim dignissim sagittis. In enim justo, rhoncus ut, imperdiet a, venenatis vi', 'Admin'),
(9, 'Duis lobortis massa imperdiet quam', 'Nujhat'),
(10, 'Nullam dictum felis eu pede mollis pretium. Nunc nonummy metus. Etiam rhoncus. Donec interdum, metus et hendrerit aliquet, dolor diam sagittis ligula, eget egestas libero turpis vel mi. In hac habitasse platea dictumst.', 'Ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `admin`) VALUES
(3, 'Nujhat', 'nujhat.nower@northsouth.edu', 'Amijanin@96', ''),
(4, 'admin', 'admin@admin.com', 'Amijanin@96', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `email` varchar(100) NOT NULL,
  `reviewId` int(11) NOT NULL,
  `jobCatagory` varchar(200) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL,
  `jobDuration` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `experience` varchar(1000) NOT NULL,
  `rating` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`email`, `reviewId`, `jobCatagory`, `companyName`, `post`, `salary`, `jobDuration`, `type`, `address`, `experience`, `rating`) VALUES
('admin@admin.com', 10, 'Developer', 'Tiger Softt', 'Senior Account', 100000, '18', 'Full Time', 'Gulshan', ' This is a test message with d', 9),
('admin@admin.com', 25, 'HR', 'Asia Market', 'Digital Marketer', 20036, '56', 'Full Time', 'India', '  Best', 1),
('nujhat.nower@northsouth.edu', 30, 'HR', 'test', 'test', 5000, '12', 'Full Time', 'TES', 'test', 10),
('nujhat.nower@northsouth.edu', 31, 'Developer', 'test', 'test', 1111, '2', 'Full Time', 'test2', 'test2', 10),
('nujhat.nower@northsouth.edu', 32, 'HR', 'xxx', 'admin', 5000, '1', 'Full Time', 'test', 'test', 8),
('nujhat.nower@northsouth.edu', 33, 'HR', 'jjjjj', 'jjj', 1232, '4', 'Part Time', 'dfd', 'fdfd', 7),
('nujhat.nower@northsouth.edu', 34, 'Developer', 'Asia Market', 'test', 3333, '3', 'Full Time', 'TES', 'dfddf', 7),
('nujhat.nower@northsouth.edu', 35, 'HR', 'Asia Market', 'Digital Marketer', 500000, '9', 'Full Time', 'Gulshan', 'demo text', 9),
('nujhat.nower@northsouth.edu', 36, 'Finance', 'jjjjj', 'admin', 10000, '12', 'Full Time', 'Dhanmondi', 'demo exp', 8),
('nujhat.nower@northsouth.edu', 37, 'Finance', 'Asia Market', 'Relationship Manager', 620000, '54', 'Full Time', 'Dhanmondi', 'demo', 8),
('nujhat.nower@northsouth.edu', 38, 'HR', 'jjjjj', 'Digital Marketer', 123456, '2', 'Full Time', 'Dhanmondi', 'demo text', 9),
('nujhat.nower@northsouth.edu', 39, 'Marketing', 'Tiger Softt', 'admin', 3333, '3', 'Full Time', 'Dhanmondi', 'tedt', 3),
('nujhat.nower@northsouth.edu', 40, 'Marketing', 'Tiger Softt', 'admin', 3333, '3', 'Full Time', 'Dhanmondi', 'gdfgd', 1),
('nujhat.nower@northsouth.edu', 41, 'Developer', 'Tiger Softt', 'admin', 3333, '3', 'Full Time', 'Dhanmondi', 'dfsdf', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
