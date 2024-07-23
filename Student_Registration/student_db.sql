-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 08:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentd`
--

CREATE TABLE `studentd` (
  `id` int(11) NOT NULL,
  `stdname` varchar(30) NOT NULL,
  `stdemail` varchar(50) NOT NULL,
  `stdphonenum` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentd`
--

INSERT INTO `studentd` (`id`, `stdname`, `stdemail`, `stdphonenum`) VALUES
(1, 'agnik', 'agnuk@gmail.com', '1234567891'),
(2, 'ayanabha', 'ayanabha@gmail.com', '9876543212'),
(3, 'neelakgandu', 'ganduneelak@gmail.com', '56789342167');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentd`
--
ALTER TABLE `studentd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentd`
--
ALTER TABLE `studentd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
