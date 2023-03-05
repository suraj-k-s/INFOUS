-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 04:30 PM
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
-- Database: `db_infous`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shedule_id` int(11) NOT NULL,
  `booking_amount` varchar(100) NOT NULL DEFAULT '0',
  `booking_status` varchar(100) NOT NULL DEFAULT '0',
  `booking_date` varchar(100) NOT NULL DEFAULT '0',
  `booked_date` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `user_id`, `shedule_id`, `booking_amount`, `booking_status`, `booking_date`, `booked_date`) VALUES
(20, 1, 1, '10000', '1', '2022-09-12', '2022-09-12'),
(21, 1, 1, '10000', '1', '2022-09-12', '2022-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus_service`
--

CREATE TABLE `tbl_bus_service` (
  `bs_id` int(11) NOT NULL,
  `bs_name` varchar(50) NOT NULL,
  `bs_contact` varchar(50) NOT NULL,
  `bs_email` varchar(50) NOT NULL,
  `bs_photo` varchar(50) NOT NULL,
  `bs_password` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bus_service`
--

INSERT INTO `tbl_bus_service` (`bs_id`, `bs_name`, `bs_contact`, `bs_email`, `bs_photo`, `bs_password`, `place_id`) VALUES
(1, 'Kalada', '9876543210', 'kalada@gmail.com', 'kalada.png', 'kalada@123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(10) UNSIGNED NOT NULL,
  `district_name` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`, `state_id`) VALUES
(1, 'Idukki', 5),
(2, 'Bengaluru ', 6),
(3, 'Ernakulam', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(1, 'Thodupuzha', 1),
(2, 'Kempegowda ', 2),
(3, 'Muvattupuzha', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_route`
--

CREATE TABLE `tbl_route` (
  `route_id` int(10) UNSIGNED NOT NULL,
  `route_name` varchar(50) NOT NULL,
  `place_from` int(10) UNSIGNED NOT NULL,
  `place_to` int(10) UNSIGNED NOT NULL,
  `route_time` varchar(50) NOT NULL,
  `route_km` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_route`
--

INSERT INTO `tbl_route` (`route_id`, `route_name`, `place_from`, `place_to`, `route_time`, `route_km`) VALUES
(1, 'Thodupuzha -  Kempegowda', 1, 2, '600', '562');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE `tbl_schedule` (
  `schedule_id` int(10) UNSIGNED NOT NULL,
  `route_id` int(10) UNSIGNED NOT NULL,
  `schedule_time` varchar(50) NOT NULL,
  `bus_name` varbinary(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`schedule_id`, `route_id`, `schedule_time`, `bus_name`) VALUES
(1, 1, '13:00', 0x526f61642053746172);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seat`
--

CREATE TABLE `tbl_seat` (
  `seat_id` int(11) NOT NULL,
  `seat_no` varchar(100) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `seat_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seat`
--

INSERT INTO `tbl_seat` (`seat_id`, `seat_no`, `booking_id`, `seat_status`) VALUES
(67, 's1', 20, 1),
(68, 's2', 20, 1),
(69, 's3', 21, 1),
(70, 's4', 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`state_id`, `state_name`) VALUES
(5, 'Kerala'),
(6, 'Karnataka');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stop`
--

CREATE TABLE `tbl_stop` (
  `stop_id` int(10) UNSIGNED NOT NULL,
  `route_id` int(10) UNSIGNED NOT NULL,
  `stop_number` int(10) UNSIGNED NOT NULL,
  `place_id` int(10) UNSIGNED NOT NULL,
  `stop_time` varchar(50) NOT NULL,
  `stop_km` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stop`
--

INSERT INTO `tbl_stop` (`stop_id`, `route_id`, `stop_number`, `place_id`, `stop_time`, `stop_km`) VALUES
(1, 1, 1, 1, '0', 0),
(2, 1, 2, 3, '30', 21),
(3, 1, 3, 2, '540', 541);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_contact` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_photo`, `user_email`, `user_password`) VALUES
(1, 'Suraj K S', '9876543210', 'kalada.png', 'surajks@gmail.com', 'suraj@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_bus_service`
--
ALTER TABLE `tbl_bus_service`
  ADD PRIMARY KEY (`bs_id`),
  ADD UNIQUE KEY `bs_email` (`bs_email`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_route`
--
ALTER TABLE `tbl_route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tbl_seat`
--
ALTER TABLE `tbl_seat`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tbl_stop`
--
ALTER TABLE `tbl_stop`
  ADD PRIMARY KEY (`stop_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_bus_service`
--
ALTER TABLE `tbl_bus_service`
  MODIFY `bs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_route`
--
ALTER TABLE `tbl_route`
  MODIFY `route_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schedule_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_seat`
--
ALTER TABLE `tbl_seat`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_stop`
--
ALTER TABLE `tbl_stop`
  MODIFY `stop_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
