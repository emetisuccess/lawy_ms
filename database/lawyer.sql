-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 07:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_db`
--

CREATE TABLE `admin_db` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_db`
--

INSERT INTO `admin_db` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'Emeti Sunday Etim', 'admin', '202cb962ac59075b964b07152d234b70'),
(2, 'Mercy Udo', 'mercy', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'Chandler Mccoy', 'mccoy', '*0');

-- --------------------------------------------------------

--
-- Table structure for table `client_db`
--

CREATE TABLE `client_db` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `files_db`
--

CREATE TABLE `files_db` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `number` varchar(150) NOT NULL,
  `clientID` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `openingDate` datetime NOT NULL,
  `files` varchar(150) NOT NULL,
  `lawyerID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_db`
--

CREATE TABLE `lawyer_db` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lawyerID` varchar(60) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `practiceArea` varchar(255) NOT NULL,
  `officeAddress` varchar(200) NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `zipCode` varchar(50) NOT NULL,
  `image_name` text NOT NULL,
  `courts` varchar(150) NOT NULL,
  `website` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','blocked') NOT NULL,
  `gender` enum('m','f','o') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lawyer_db`
--

INSERT INTO `lawyer_db` (`id`, `fullname`, `mobile`, `email`, `password`, `lawyerID`, `experience`, `practiceArea`, `officeAddress`, `city`, `state`, `zipCode`, `image_name`, `courts`, `website`, `description`, `status`, `gender`) VALUES
(7, 'Eve Owens', '976', 'wibexejida@mailinator.com', 'f200e955d9625e9fcab2d70ea1c30075', '33232', 'Autem facilis do eiu', 'Et rem qui facilis t', 'Et est porro culpa', 'Doloremque id nulla', 'Ut consequatur quae', '82926', 'images (1).jfif', 'Necessitatibus sit', 'https://www.vumimegaru.net', 'Quis distinctio Sun', 'active', 'o'),
(8, 'Vivian Daniels', '529', 'musa@mailinator.com', 'fbcee0f8caa1e32be14ebb4472c4eeec', '343434', 'Et facere quaerat ip', 'Sint aut magnam nihi', 'In ex non sit illo', 'Ex eum sunt et volu', 'Et voluptatem quam', '72824', 'post2.jfif', 'Id sequi dolore aut', 'https://www.rodemonecopu.cm', 'Error iure id ut deb', 'active', 'm'),
(9, 'Selma Kemp', '365', 'lolehu@mailinator.com', 'c80e038eb3795f28e21910da0d7395af', '849433', 'Accusamus corrupti', 'Iure exercitation te', 'Id id quasi non qua', 'Omnis dolor ut qui i', 'Quae dolorem non ame', '97614', 'download.jfif', 'Reprehenderit anim i', 'https://www.sif.biz', 'Quae et nesciunt su', 'blocked', 'm'),
(10, 'Carly Jones', '972', 'fafyvama@mailinator.com', 'c039caa6da8ca45cccffd0bd5e2a19ba', '78347', 'Itaque sunt natus q', 'Ipsum laboris tempor', 'Cupidatat ex nihil s', 'Accusantium voluptat', 'Elit velit laborum', '74082', 'post4.jfif', 'Non quo ut cillum ea', 'https://www.lavu.cc', 'Doloribus est assume', 'active', 'f'),
(11, 'Macaulay Murphy', '402', 'zuqabukosu@mailinator.com', '6eb621b6357e12991979fdbae9dc25ca', '43434', 'Reiciendis vitae dol', 'Aspernatur accusamus', 'Autem aut laboris ut', 'Accusantium ut quis', 'Molestiae dolores in', '41704', 'post7.jfif', 'Ex laborum Quam id', 'https://www.byvys.com', 'Fuga Ea deserunt hi', 'active', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `library_db`
--

CREATE TABLE `library_db` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `type` varchar(150) NOT NULL,
  `uploadDate` datetime NOT NULL,
  `files` varchar(150) NOT NULL,
  `lawyerID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_db`
--
ALTER TABLE `admin_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_db`
--
ALTER TABLE `client_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files_db`
--
ALTER TABLE `files_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_db`
--
ALTER TABLE `lawyer_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_db`
--
ALTER TABLE `library_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_db`
--
ALTER TABLE `admin_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_db`
--
ALTER TABLE `client_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files_db`
--
ALTER TABLE `files_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lawyer_db`
--
ALTER TABLE `lawyer_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `library_db`
--
ALTER TABLE `library_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
