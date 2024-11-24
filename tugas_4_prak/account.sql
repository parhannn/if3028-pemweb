-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 05:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `account`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_account`
--

CREATE TABLE `table_account` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_account`
--

INSERT INTO `table_account` (`id`, `nama`, `nim`) VALUES
(25, 'Nama1', 'NIM001'),
(26, 'Nama2', 'NIM002'),
(27, 'Nama3', 'NIM003'),
(28, 'Nama4', 'NIM004'),
(29, 'Nama5', 'NIM005'),
(30, 'Nama6', 'NIM006'),
(31, 'Nama7', 'NIM007'),
(32, 'Nama8', 'NIM008'),
(33, 'Nama9', 'NIM009'),
(34, 'Nama10', 'NIM010'),
(35, 'Nama11', 'NIM011'),
(36, 'Nama12', 'NIM012'),
(37, 'Nama13', 'NIM013'),
(38, 'Nama14', 'NIM014'),
(39, 'Nama15', 'NIM015'),
(40, 'Nama16', 'NIM016'),
(41, 'Nama17', 'NIM017'),
(42, 'Nama18', 'NIM018'),
(43, 'Nama19', 'NIM019'),
(44, 'Nama20', 'NIM020'),
(45, 'Nama21', 'NIM021'),
(46, 'Nama22', 'NIM022'),
(47, 'Nama23', 'NIM023'),
(48, 'Nama24', 'NIM024'),
(49, 'Nama25', 'NIM025'),
(50, 'Nama26', 'NIM026'),
(51, 'Nama27', 'NIM027'),
(52, 'Nama28', 'NIM028'),
(53, 'Nama29', 'NIM029'),
(54, 'Nama30', 'NIM030');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_account`
--
ALTER TABLE `table_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_account`
--
ALTER TABLE `table_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
