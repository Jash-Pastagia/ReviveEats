-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 12:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brts`
--

-- --------------------------------------------------------

--
-- Table structure for table `u_login`
--

CREATE TABLE `u_login` (
  `u_id` int(11) NOT NULL,
  `u_username` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `u_login`
--

INSERT INTO `u_login` (`u_id`, `u_username`, `u_email`, `u_password`) VALUES
(2, 'jash', 'jash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'j2', 'j2@gmail.com', '099ebea48ea9666a7da2177267983138'),
(4, 'wqe', 'abc@gmail.com', '1728efbda81692282ba642aafd57be3a'),
(5, 'vishnu', 'vishnu@gmail.com', 'b7b58836dc941cc4ba33d16dab6e3059'),
(6, 'dharmik', 'dharmik@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'er', 'ab@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'qwe', 'qwe@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(9, 'dhaval', 'dhaval@gmail.com', '3fea0cdd9f8c9c37570f52918c70d067'),
(10, 'asd', 'asd@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'yt', 'yt@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'qwerty', 'qwerty@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02'),
(13, 'zxcv', 'v@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(24, 'wer', 'wer@gmail.com', '22c276a05aa7c90566ae2175bcc2a9b0'),
(25, 'eee', 'eee@gmail.com', 'd2f2297d6e829cd3493aa7de4416a18f'),
(26, 'hall', 'hall@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `u_login`
--
ALTER TABLE `u_login`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_username` (`u_username`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `u_login`
--
ALTER TABLE `u_login`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
