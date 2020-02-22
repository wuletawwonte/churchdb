-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2020 at 09:06 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.2.27-1+ubuntu16.04.1+deb.sury.org+1

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `gid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gid`, `name`, `type`, `created`) VALUES
(1, 'Maranatha', '??????? ???', '2020-02-17 15:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `job_type_id` int(11) NOT NULL,
  `job_type` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`job_type_id`, `job_type`) VALUES
(1, 'የመንግስት ሥራ'),
(2, 'ነጋዴ'),
(3, 'መንግስታዊ ያልሆነ ድርጅት'),
(4, 'የግል ሥራ'),
(5, 'የቤት እመቤት'),
(6, 'ተማሪ'),
(7, 'የጉልበት ሠራተኛ'),
(8, 'ሥራ የሌለው');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET latin1 NOT NULL,
  `firstname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `middlename` varchar(50) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `gender` varchar(5) NOT NULL,
  `job_type` int(11) NOT NULL,
  `workplace_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `workplace_phone` varchar(50) CHARACTER SET latin1 NOT NULL,
  `mobile_phone` varchar(15) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `birthdate` varchar(50) CHARACTER SET latin1 NOT NULL,
  `hide_age` tinyint(1) DEFAULT NULL,
  `birth_place` varchar(50) CHARACTER SET latin1 NOT NULL,
  `membership_year` int(11) NOT NULL,
  `membership_cause` int(11) NOT NULL,
  `membership_level` int(11) NOT NULL,
  `ministry` int(11) NOT NULL,
  `family_role` varchar(50) CHARACTER SET latin1 NOT NULL,
  `family_id` int(11) NOT NULL,
  `profile_color` varchar(20) CHARACTER SET latin1 NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `title`, `firstname`, `middlename`, `lastname`, `gender`, `job_type`, `workplace_name`, `workplace_phone`, `mobile_phone`, `email`, `birthdate`, `hide_age`, `birth_place`, `membership_year`, `membership_cause`, `membership_level`, `ministry`, `family_role`, `family_id`, `profile_color`, `created`) VALUES
(9, '', 'Betelihem', 'Wolde', 'Gebretsadik', 'ሴት', 1, '', '', '0916253685', 'bety.wolde@yahoo.com', '1978-04-05', NULL, 'Nazreth', 0, 1, 1, 1, '???????', 0, '#00c0ef', '2020-02-21 18:48:33'),
(10, '', 'Tekeste', 'Getnet', 'Emiru', 'ወንድ', 3, '', '', '0921568748', 'tekeste.getnet@gmail.com', '1969-08-09', NULL, 'Amhara', 0, 3, 3, 4, '???????', 0, '#001f3f', '2020-02-21 18:52:12'),
(11, '', 'Mome', 'Worku', 'Olle', 'ሴት', 5, '', '', '0916352487', '', '1988-09-09', NULL, 'Chencha', 1992, 2, 1, 1, '???????', 0, '#777777', '2020-02-22 18:41:06'),
(12, '', 'Sara', 'Markos', 'Dibaba', 'ሴት', 4, '2M Ergo Bet', '', '0916352478', 'sara.markos@yahoo.com', '1989-08-09', NULL, 'Chencha', 1985, 1, 1, 3, '???????', 0, '#00a65a', '2020-02-22 18:42:36'),
(13, '', 'Tamirat', 'Osake', 'Olle', 'ወንድ', 4, '', '', '0913258749', 'tamirat.osake@gmail.com', '1991-02-05', 0, 'Boroda', 1999, 2, 1, 1, '???????', 0, '#39cccc', '2020-02-22 18:43:45'),
(14, '', 'Minayehu', 'Elias', 'Meseret', 'ወንድ', 1, 'Arbaminch Zuria Wereda Astedadir', '(046) 881-2558', '1987456532', 'Mine.elu@gmail.com', '1974-08-05', NULL, 'Arbaminch', 1999, 1, 1, 5, '???????', 0, '#00a65a', '2020-02-22 18:45:14'),
(15, '', 'Mimi', 'Yanda', 'Elu', 'ሴት', 6, '', '', '0916857485', 'mimi.yanda@gmail.com', '1985-08-05', NULL, 'Zerdo', 2001, 4, 2, 1, '???????', 0, '#f39c12', '2020-02-22 18:46:28'),
(16, '', 'Meklit', 'Wonte', 'Mitsa', 'ሴት', 1, 'Ethiopia Nigd Bank', '', '0933568974', 'meklitwonte@yahoo.com', '1990-08-09', NULL, 'Arbaminch', 2005, 2, 1, 4, '???????', 0, '#777777', '2020-02-22 18:47:56'),
(17, '', 'Merid', 'Tolba', 'Getto', 'ወንድ', 2, '', '', '0913235689', 'merid.tolba@gmail.com', '1976-08-09', NULL, 'Dita', 2007, 3, 1, 2, '???????', 0, '#3c8dbc', '2020-02-22 18:49:02'),
(18, '', 'Mirinda', 'Melkamu', 'Getu', 'ሴት', 2, 'Yimegnu Cafeteria', '', '0915874852', 'mirinda.melkamu@gmail.com', '1985-04-05', NULL, 'Chencha', 1998, 1, 1, 2, '???????', 0, '#ff851b', '2020-02-22 18:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `membership_causes`
--

CREATE TABLE `membership_causes` (
  `membership_cause_id` int(11) NOT NULL,
  `membership_cause` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_causes`
--

INSERT INTO `membership_causes` (`membership_cause_id`, `membership_cause`) VALUES
(1, 'በጥምቀት'),
(2, 'በእምነት ማጽኛ ትምህርት'),
(3, 'ከሌላ መ/ኢ/ማ/ም በዝውውር'),
(4, 'ከሌላ ወ/አ/ክርስቲያናት በመምጣት ');

-- --------------------------------------------------------

--
-- Table structure for table `membership_levels`
--

CREATE TABLE `membership_levels` (
  `membership_level_id` int(11) NOT NULL,
  `membership_level` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_levels`
--

INSERT INTO `membership_levels` (`membership_level_id`, `membership_level`) VALUES
(1, 'ቆራቢ አባል'),
(2, 'የድነት ትምህርት ተማሪ'),
(3, 'የእምነት ማጽኛ ተማሪ');

-- --------------------------------------------------------

--
-- Table structure for table `ministries`
--

CREATE TABLE `ministries` (
  `ministry_id` int(11) NOT NULL,
  `ministry` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ministries`
--

INSERT INTO `ministries` (`ministry_id`, `ministry`) VALUES
(1, 'አያገለግሉም'),
(2, 'አስተናጋጅ'),
(3, 'ኳየር'),
(4, 'አስተዳደር'),
(5, 'ወንጌላዊ');

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `id` int(11) NOT NULL,
  `by_user` varchar(50) NOT NULL,
  `change_occured` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`id`, `by_user`, `change_occured`, `member_id`, `date`) VALUES
(1, 'Samson  Alula', 'created', 2, '2020-02-22 05:02:09'),
(2, 'Samson  Alula', 'created', 3, '2020-02-22 05:02:09'),
(3, 'Samson  Alula', 'created', 4, '2020-02-22 05:02:09'),
(4, 'Samson  Alula', 'created', 5, '2020-02-22 05:02:09'),
(5, 'Samson  Alula', 'created', 6, '2020-02-22 05:02:09'),
(6, 'Samson  Alula', 'created', 7, '2020-02-22 05:02:09'),
(7, 'Samson  Alula', 'created', 8, '2020-02-22 05:02:09'),
(8, 'Samson  Alula', 'created', 9, '2020-02-22 05:02:09'),
(9, 'Samson  Alula', 'created', 10, '2020-02-22 05:02:09'),
(10, 'Samson  Alula', 'created', 11, '2020-02-22 18:41:07'),
(11, 'Samson  Alula', 'created', 12, '2020-02-22 18:42:36'),
(12, 'Samson  Alula', 'created', 13, '2020-02-22 18:43:45'),
(13, 'Samson  Alula', 'created', 14, '2020-02-22 18:45:15'),
(14, 'Samson  Alula', 'created', 15, '2020-02-22 18:46:28'),
(15, 'Samson  Alula', 'created', 16, '2020-02-22 18:47:56'),
(16, 'Samson  Alula', 'created', 17, '2020-02-22 18:49:02'),
(17, 'Samson  Alula', 'created', 18, '2020-02-22 18:59:26');

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
  `login_count` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `user_type`, `initials`, `login_count`, `created`, `modified`) VALUES
(2, 'Samuel', 'Azanaw', 'samuel.azanaw', 'e10adc3949ba59abbe56e057f20f883e', 'administrator', '', 0, '2019-01-16 11:27:56', '2019-01-16 11:27:56'),
(3, 'Samson ', 'Alula', 'samson.alula', 'e10adc3949ba59abbe56e057f20f883e', 'administrator', '', 0, '2019-01-19 13:59:18', '2019-01-19 13:59:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnfg`
--
ALTER TABLE `cnfg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`job_type_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_causes`
--
ALTER TABLE `membership_causes`
  ADD PRIMARY KEY (`membership_cause_id`);

--
-- Indexes for table `membership_levels`
--
ALTER TABLE `membership_levels`
  ADD PRIMARY KEY (`membership_level_id`);

--
-- Indexes for table `ministries`
--
ALTER TABLE `ministries`
  ADD PRIMARY KEY (`ministry_id`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
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
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `job_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `membership_causes`
--
ALTER TABLE `membership_causes`
  MODIFY `membership_cause_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `membership_levels`
--
ALTER TABLE `membership_levels`
  MODIFY `membership_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ministries`
--
ALTER TABLE `ministries`
  MODIFY `ministry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
