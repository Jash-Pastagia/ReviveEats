-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Feb 11, 2023 at 09:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `u_persnoldetail`
--

CREATE TABLE `u_persnoldetail` (
  `u_id` int(255) NOT NULL,
  `u_firstname` varchar(1000) NOT NULL,
  `u_lastname` varchar(1000) NOT NULL,
  `u_phonenumber` varchar(1000) NOT NULL,
  `u_email` varchar(1000) NOT NULL,
  `u_gender` varchar(1000) NOT NULL,
  `u_dob` varchar(1000) NOT NULL,
  `u_city` varchar(1000) NOT NULL,
  `u_address` varchar(1000) NOT NULL,
  `u_landmark` varchar(1000) NOT NULL,
  `u_pin` varchar(1000) NOT NULL,
  `u_category` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `u_persnoldetail`
--

INSERT INTO `u_persnoldetail` (`u_id`, `u_firstname`, `u_lastname`, `u_phonenumber`, `u_email`, `u_gender`, `u_dob`, `u_city`, `u_address`, `u_landmark`, `u_pin`, `u_category`) VALUES
(1, 'Dharmik', 'Patel', '9104287985', 'dharmik@gmail.com', 'male', '26/8/4', 'Surat', 'a 401 shaligram heights althancanal road ', 'atlanta shopping center', '35097', 'Student'),
(2, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k'),
(3, 'Jash', 'Pastagiya', '1239874563', 'jash@gmail.com', 'male', '26/5/2000', 'Surat', 'l654jj', 'dmart', '987654', 'Handicap');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `u_persnoldetail`
--
ALTER TABLE `u_persnoldetail`
  ADD KEY `test` (`u_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `u_persnoldetail`
--
ALTER TABLE `u_persnoldetail`
  ADD CONSTRAINT `test` FOREIGN KEY (`u_id`) REFERENCES `u_login` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
