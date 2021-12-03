-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2020 at 08:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `careforu`
--

-- --------------------------------------------------------

--
-- Table structure for table `buydata`
--

CREATE TABLE `buydata` (
  `buy_id` int(11) NOT NULL,
  `buy_med_id` int(11) NOT NULL,
  `buy_date` datetime NOT NULL,
  `exp_date` datetime NOT NULL,
  `buy_qty` int(11) NOT NULL,
  `remain_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buydata`
--

INSERT INTO `buydata` (`buy_id`, `buy_med_id`, `buy_date`, `exp_date`, `buy_qty`, `remain_qty`) VALUES
(1, 1, '2019-06-07 12:39:40', '2020-06-15 00:00:00', 30, 15),
(2, 2, '2020-03-01 12:39:40', '2020-06-15 00:00:00', 20, 0),
(4, 2, '2020-06-10 05:42:10', '2020-06-15 00:00:00', 10, 5),
(5, 4, '2020-06-10 06:07:33', '2020-08-10 00:00:00', 5, 2),
(6, 4, '2020-06-11 04:38:42', '2020-10-08 00:00:00', 1, 1),
(7, 6, '2020-06-10 04:55:52', '2020-12-10 00:00:00', 5, 2),
(8, 3, '2020-06-11 04:58:48', '2021-06-11 00:00:00', 10, 10),
(9, 6, '2020-06-11 05:00:21', '2021-11-11 00:00:00', 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `medname` varchar(255) NOT NULL,
  `add_date` datetime NOT NULL,
  `sell_point` varchar(255) NOT NULL,
  `or_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `del_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `medname`, `add_date`, `sell_point`, `or_price`, `sell_price`, `del_status`) VALUES
(1, 'Paracap', 'Paracetamol', '2020-06-08 12:11:54', 'For curing fever', 2800, 3000, 0),
(2, 'Biogesic', 'Paracetamol', '2020-06-08 12:14:11', 'For curing fever', 1300, 1500, 0),
(3, 'Neoplast', 'Tan Plastic Bandage', '2020-06-08 12:16:15', 'For recovering cuts and bruises', 1800, 2000, 0),
(4, 'Meditone', 'Multivitamin tablets', '2020-06-08 12:19:22', 'For revitalizing', 4700, 5000, 0),
(5, 'testbrand', 'testmad', '2020-06-07 09:31:31', 'testpoint', 8000, 8500, 1),
(6, 'Enervon-C', 'Vitamin C Tablets', '2020-06-08 12:25:00', 'For revitalizing Vitamin C', 3300, 3500, 0),
(7, 'test2brand', 'test2med', '2020-06-05 14:38:11', 'testsellpoint', 1000, 1200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patiencedatas`
--

CREATE TABLE `patiencedatas` (
  `pt_id` int(11) NOT NULL,
  `pt_p_id` int(11) NOT NULL,
  `pt_date` datetime NOT NULL,
  `pt_bloodtest` varchar(255) NOT NULL,
  `pt_urinetest` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patiencedatas`
--

INSERT INTO `patiencedatas` (`pt_id`, `pt_p_id`, `pt_date`, `pt_bloodtest`, `pt_urinetest`) VALUES
(1, 1, '2020-06-08 01:48:12', '10', '12'),
(2, 2, '2020-06-09 01:48:50', '13', '14'),
(3, 3, '2020-06-10 01:49:12', '16', '17'),
(4, 1, '2020-06-11 01:49:58', '9', '10');

-- --------------------------------------------------------

--
-- Table structure for table `patiences`
--

CREATE TABLE `patiences` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_father` varchar(255) NOT NULL,
  `p_age` int(11) NOT NULL,
  `p_nrc` varchar(255) NOT NULL,
  `p_phone` varchar(255) NOT NULL,
  `p_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patiences`
--

INSERT INTO `patiences` (`p_id`, `p_name`, `p_father`, `p_age`, `p_nrc`, `p_phone`, `p_address`) VALUES
(1, 'Aung Aung', 'U Aung', 25, '12/kmd(N)12345', '091234567', 'Kyimyindine'),
(2, 'Kyaw Kyaw', 'U Kyaw', 18, '12/LMD(N)54321', '097654321', 'Lanmadaw'),
(3, 'Maung Maung', 'U Maung', 30, '12/KMY(N)32154', '094321765', 'Kamayut');

-- --------------------------------------------------------

--
-- Table structure for table `selldata`
--

CREATE TABLE `selldata` (
  `sell_id` int(11) NOT NULL,
  `sell_med_id` int(11) NOT NULL,
  `sell_buy_id` int(11) NOT NULL,
  `sell_date` datetime NOT NULL,
  `sell_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selldata`
--

INSERT INTO `selldata` (`sell_id`, `sell_med_id`, `sell_buy_id`, `sell_date`, `sell_qty`) VALUES
(1, 1, 1, '2020-06-08 12:56:23', 5),
(2, 1, 1, '2020-06-08 12:58:02', 10),
(4, 2, 2, '2020-06-10 12:32:24', 20),
(5, 4, 5, '2020-06-11 04:33:42', 3),
(7, 6, 7, '2020-06-11 05:10:59', 3),
(8, 2, 4, '2020-06-11 05:17:32', 5);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `stocks_id` int(11) NOT NULL,
  `stocks_med_id` int(11) NOT NULL,
  `stocks_exp_date` datetime NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stocks_id`, `stocks_med_id`, `stocks_exp_date`, `qty`) VALUES
(1, 1, '2020-06-15 00:00:00', 15),
(2, 2, '2020-06-15 00:00:00', 5),
(3, 4, '2020-08-10 00:00:00', 2),
(4, 4, '2020-10-08 00:00:00', 1),
(5, 6, '2020-12-10 00:00:00', 2),
(6, 3, '2021-06-11 00:00:00', 10),
(7, 6, '2021-11-11 00:00:00', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_role` varchar(255) NOT NULL,
  `u_ban_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_pass`, `u_role`, `u_ban_status`) VALUES
(1, 'superadmin', '$2y$10$RGDr77EDawhhf07tteeDweypWUPbMhh2cNqWHAG7MqSspwv3Ap.r6', 'super', 0),
(2, 'buyselladmin', '$2y$10$RGDr77EDawhhf07tteeDweypWUPbMhh2cNqWHAG7MqSspwv3Ap.r6', 'buysell', 0),
(3, 'stockadmin', '$2y$10$RGDr77EDawhhf07tteeDweypWUPbMhh2cNqWHAG7MqSspwv3Ap.r6', 'stockadmin', 0),
(4, 'patienceadmin', '$2y$10$RGDr77EDawhhf07tteeDweypWUPbMhh2cNqWHAG7MqSspwv3Ap.r6', 'patience', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buydata`
--
ALTER TABLE `buydata`
  ADD PRIMARY KEY (`buy_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patiencedatas`
--
ALTER TABLE `patiencedatas`
  ADD PRIMARY KEY (`pt_id`);

--
-- Indexes for table `patiences`
--
ALTER TABLE `patiences`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_nrc` (`p_nrc`);

--
-- Indexes for table `selldata`
--
ALTER TABLE `selldata`
  ADD PRIMARY KEY (`sell_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stocks_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_name` (`u_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buydata`
--
ALTER TABLE `buydata`
  MODIFY `buy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patiencedatas`
--
ALTER TABLE `patiencedatas`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patiences`
--
ALTER TABLE `patiences`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `selldata`
--
ALTER TABLE `selldata`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stocks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
