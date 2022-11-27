-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 10:45 AM
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
-- Database: `pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `pro_registration`
--

CREATE TABLE `pro_registration` (
  `id` int(8) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `course` varchar(255) NOT NULL,
  `gender` int(3) NOT NULL COMMENT '1=male\r\n2=female',
  `email` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `call_code` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(5) NOT NULL DEFAULT 0 COMMENT '0=clients\r\n1=admin',
  `request_data` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pro_registration`
--

INSERT INTO `pro_registration` (`id`, `first_name`, `middle_name`, `last_name`, `course`, `gender`, `email`, `mobile`, `call_code`, `address`, `password`, `is_admin`, `request_data`, `created_at`, `status`) VALUES
(1, 'first', 'middle', 'last', 'java', 1, 'test@test.com', '23232323233', '', 'Street:  301 Adarsh Mahal, A, Bassein Road(vasai Road)\r\nCity:   Mumbai\r\nState/province/area:    Maharashtra\r\nPhone number  95250234566\r\nZip code  401202\r\nCountry calling code  +91\r\nCountry  India', '16d7a4fca7442dda3ad93c9a726597e4', 0, '{\"first_name\":\"first\",\"middle_name\":\"middle\",\"last_name\":\"last\",\"course\":\"java\",\"gender\":\"1\",\"email\":\"test@test.com\",\"mobile\":\"23232323233\",\"full_number\":\"23232323233\",\"address\":\"Street:\\u00a0\\u00a0301 Adarsh Mahal, A, Bassein Road(vasai Road)\\r\\nCity:   Mumbai\\r\\nState\\/province\\/area:    Maharashtra\\r\\nPhone number\\u00a0\\u00a095250234566\\r\\nZip code\\u00a0\\u00a0401202\\r\\nCountry calling code\\u00a0\\u00a0+91\\r\\nCountry\\u00a0\\u00a0India\",\"call_code\":\"\",\"reg_update\":\"Update\"}', '2022-11-27 09:25:29', 1),
(2, 'Dinesh', 'Kumar', 'M', 'javascript', 1, 'dinesh@test.com', '43324234343', '', 'Street:  1828, Bhaghirath Palace\r\nCity:   Delhi\r\nState/province/area:    Delhi\r\nPhone number  23863957\r\nZip code  110006\r\nCountry calling code  +91\r\nCountry  India', 'cc03e747a6afbbcbf8be7668acfebee5', 0, '{\"first_name\":\"Dinesh\",\"middle_name\":\"Kumar\",\"last_name\":\"M\",\"course\":\"javascript\",\"gender\":\"1\",\"email\":\"dinesh@test.com\",\"mobile\":\"43324234343\",\"full_number\":\"43324234343\",\"address\":\"Street:\\u00a0\\u00a01828, Bhaghirath Palace\\r\\nCity:   Delhi\\r\\nState\\/province\\/area:    Delhi\\r\\nPhone number\\u00a0\\u00a023863957\\r\\nZip code\\u00a0\\u00a0110006\\r\\nCountry calling code\\u00a0\\u00a0+91\\r\\nCountry\\u00a0\\u00a0India\",\"call_code\":\"\",\"reg_update\":\"Update\"}', '2022-11-27 09:28:16', 1),
(3, 'Vedha', 'Moorthy', 'H', 'php', 1, 'vedha@test.com', '2343243233', '+502', 'Street:  9 C 5-53 Z-1\r\nCity:  Guatemala\r\nState/province/area:   Mazatenango\r\nPhone number  78725858\r\nCountry calling code  +502\r\nCountry  Guatemala', 'e3afed0047b08059d0fada10f400c1e5', 1, '{\"first_name\":\"Vedha\",\"middle_name\":\"Moorthy\",\"last_name\":\"H\",\"course\":\"php\",\"gender\":\"1\",\"email\":\"vedha@test.com\",\"mobile\":\"2343243233\",\"full_number\":\"\",\"address\":\"Street:\\u00a0\\u00a09 C 5-53 Z-1\\r\\nCity:\\u00a0\\u00a0Guatemala\\r\\nState\\/province\\/area:   Mazatenango\\r\\nPhone number\\u00a0\\u00a078725858\\r\\nCountry calling code\\u00a0\\u00a0+502\\r\\nCountry\\u00a0\\u00a0Guatemala\",\"password\":\"Admin\",\"password2\":\"Admin\",\"call_code\":\"+502\",\"reg_submit\":\"submit\"}', '2022-11-27 09:29:50', 1),
(4, 'Nila', 'M', 'K', 'javascript', 2, 'nila@test.com', '3454334444', '', 'Street:  Svay Kngou Village, Svay Chrum Commune, Svay Chrum District\r\nCity:   Svay Chrum District\r\nState/province/area:    Svay Rieng\r\nPhone number  Mobile phone(855) 12 923 770\r\nCountry calling code  +855\r\nCountry  Cambodia', 'c06db68e819be6ec3d26c6038d8e8d1f', 0, '{\"first_name\":\"Nila\",\"middle_name\":\"M\",\"last_name\":\"K\",\"course\":\"javascript\",\"gender\":\"2\",\"email\":\"nila@test.com\",\"mobile\":\"3454334444\",\"full_number\":\"3454334444\",\"address\":\"Street:\\u00a0\\u00a0Svay Kngou Village, Svay Chrum Commune, Svay Chrum District\\r\\nCity:   Svay Chrum District\\r\\nState\\/province\\/area:    Svay Rieng\\r\\nPhone number\\u00a0\\u00a0Mobile phone(855) 12 923 770\\r\\nCountry calling code\\u00a0\\u00a0+855\\r\\nCountry\\u00a0\\u00a0Cambodia\",\"call_code\":\"\",\"reg_update\":\"Update\"}', '2022-11-27 09:31:09', 1),
(5, 'Emma', 'Stander', 'J', 'cpp', 2, 'emma@test.com', '43553443543', '+53', 'Street:  C. de la Guardia No. 157 D\'Beche\r\nCity:   Havana\r\nState/province/area:    Havana\r\nPhone number  97 7070\r\nCountry calling code  +53\r\nCountry  Cuba', '60474c9c10d7142b7508ce7a50acf414', 0, '{\"first_name\":\"Emma\",\"middle_name\":\"Stander\",\"last_name\":\"J\",\"course\":\"cpp\",\"gender\":\"2\",\"email\":\"emma@test.com\",\"mobile\":\"43553443543\",\"full_number\":\"\",\"address\":\"Street:\\u00a0\\u00a0C. de la Guardia No. 157 D\'Beche\\r\\nCity:   Havana\\r\\nState\\/province\\/area:    Havana\\r\\nPhone number\\u00a0\\u00a097 7070\\r\\nCountry calling code\\u00a0\\u00a0+53\\r\\nCountry\\u00a0\\u00a0Cuba\",\"password\":\"test12\",\"password2\":\"test12\",\"call_code\":\"+53\",\"reg_submit\":\"submit\"}', '2022-11-27 09:51:23', 1),
(6, 'Oliver', 'Smith', 'v', 'javascript', 1, 'oliver@test.com', '380380380', '', 'Updated Test address', 'cc03e747a6afbbcbf8be7668acfebee5', 1, '{\"first_name\":\"Oliver\",\"middle_name\":\"Smith\",\"last_name\":\"v\",\"course\":\"javascript\",\"gender\":\"1\",\"email\":\"oliver@test.com\",\"mobile\":\"380380380\",\"full_number\":\"380380380\",\"address\":\"Updated Test address\",\"call_code\":\"\",\"reg_update\":\"Update\"}', '2022-11-27 14:11:34', 1),
(7, 'Evelyn', 'gre', 'M', 'c', 2, 'evelyn@test.com', '42343224333', '+504', 'Test address', '16d7a4fca7442dda3ad93c9a726597e4', 0, '{\"first_name\":\"Evelyn\",\"middle_name\":\"gre\",\"last_name\":\"M\",\"course\":\"c\",\"gender\":\"2\",\"email\":\"evelyn@test.com\",\"mobile\":\"42343224333\",\"full_number\":\"\",\"address\":\"Test address\",\"password\":\"test1234\",\"password2\":\"test1234\",\"call_code\":\"+504\",\"reg_submit\":\"submit\"}', '2022-11-27 14:46:46', 1),
(8, 'Henry', 'gty', 'I', 'javascript', 1, 'henry@test.com', '3443454333', '', '132, My Street,\r\nKingston, New York 12401\r\nUnited States.', '5a105e8b9d40e1329780d62ea2265d8a', 0, '{\"first_name\":\"Henry\",\"middle_name\":\"gty\",\"last_name\":\"I\",\"course\":\"javascript\",\"gender\":\"1\",\"email\":\"henry@test.com\",\"mobile\":\"3443454333\",\"full_number\":\"3443454333\",\"address\":\"132, My Street,\\r\\nKingston, New York 12401\\r\\nUnited States.\",\"call_code\":\"\",\"reg_update\":\"Update\"}', '2022-11-27 14:49:02', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pro_registration`
--
ALTER TABLE `pro_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pro_registration`
--
ALTER TABLE `pro_registration`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
