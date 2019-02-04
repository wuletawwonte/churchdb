-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2019 at 02:55 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `church`
--

-- --------------------------------------------------------

--
-- Table structure for table `cnfg`
--

CREATE TABLE `cnfg` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cnfg`
--

INSERT INTO `cnfg` (`id`, `name`, `value`) VALUES
(1, 'system_name', 'ቸርችdb'),
(3, 'system_name_short', 'ቸd'),
(4, 'default_password', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

CREATE TABLE `families` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subcity` varchar(50) NOT NULL,
  `kebele` varchar(50) NOT NULL,
  `house_number` int(11) NOT NULL,
  `wedding_year` int(11) NOT NULL,
  `home_phone` varchar(15) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `families`
--

INSERT INTO `families` (`id`, `name`, `subcity`, `kebele`, `house_number`, `wedding_year`, `home_phone`, `created`) VALUES
(2, 'ወንቴ ሚፃ', 'ነጭሳር', 'ዕድገት በር', 10, 1975, '468812436', '2019-02-01 11:49:20'),
(3, 'Tefera Gollona', 'ነጭሳር', 'ዕድገት በር', 11, 1976, '468812435', '2019-02-01 11:49:20'),
(7, 'ተካልኝ ቶማስ', 'ነጭሳር', 'ዕድገት በር', 45, 1986, '0468819955', '2019-02-01 11:49:20'),
(49, 'Endalkachew Hawaz', 'ነጭሳር', 'ዕድገት በር', 45, 4564564, '45654', '2019-02-03 15:09:27'),
(50, 'Abel Kussia', 'ነጭሳር', 'ዕድገት በር', 78987987, 1998, '456456', '2019-02-03 17:29:23'),
(51, 'Minale Zena', 'ነጭሳር', 'ዕድገት በር', 12, 1996, '0468812436', '2019-02-04 12:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `profile_color` varchar(10) NOT NULL DEFAULT '#6D7993',
  `family_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `birthdate`, `profile_color`, `family_id`, `created`) VALUES
(13, 'Meklit', 'Wonte', 'Mitsa', 'ሴት', '1987-05-06', '#6D7993', 2, '2019-02-04 09:27:16'),
(15, 'Eleni', 'Hailu', 'Getachew', 'ሴት', '1985-02-03', '#6D7993', -1, '2019-02-04 09:57:43'),
(16, 'Mulunesh', 'Tassew', 'Tolola', 'ሴት', '1970-06-05', '#000', -1, '2019-02-04 09:58:21'),
(18, 'Tizitaw', 'Adane', 'Samuel', 'ወንድ', '1968-04-05', '#6D7993', -1, '2019-02-04 09:59:35'),
(24, 'Moges', 'Behailu', 'Adane', 'ወንድ', '1988-05-06', '#FC4A1A', -1, '2019-02-04 12:40:13'),
(25, 'Minale', 'Zena', 'Getachew', 'ወንድ', '1975-07-08', '#07889B', -1, '2019-02-04 12:40:49'),
(26, 'Alem', 'Zerihun', 'Sorsa', 'ሴት', '1977-08-08', '#6D7993', -1, '2019-02-04 12:41:31'),
(27, 'Cherotaw', 'Kentib', 'Amakelew', 'ወንድ', '1976-06-08', '#6D7993', -1, '2019-02-04 12:42:07'),
(28, 'Zerfe', 'Kebede', 'Gezmu', 'ሴት', '1966-05-06', '#F7B733', -1, '2019-02-04 12:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `initials` varchar(10) NOT NULL,
  `skin` varchar(25) NOT NULL DEFAULT 'skin-yellow',
  `language` varchar(15) NOT NULL DEFAULT 'english',
  `login_count` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `user_type`, `initials`, `skin`, `language`, `login_count`, `created`, `modified`) VALUES
(2, 'Samuel', 'Azanaw', 'samuel.azanaw', 'e10adc3949ba59abbe56e057f20f883e', 'administrator', '', 'skin-yellow', 'english', 0, '2019-01-16 11:27:56', '2019-01-16 11:27:56'),
(3, 'Samson ', 'Alula', 'samson.alula', 'e10adc3949ba59abbe56e057f20f883e', 'administrator', '', 'skin-blue-light', 'amharic', 0, '2019-01-19 13:59:18', '2019-01-19 13:59:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnfg`
--
ALTER TABLE `cnfg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cnfg`
--
ALTER TABLE `cnfg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
