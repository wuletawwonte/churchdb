-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2020 at 07:31 AM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.2.29-1+ubuntu16.04.1+deb.sury.org+1

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
-- Table structure for table `age_groups`
--

CREATE TABLE `age_groups` (
  `ag_id` int(11) NOT NULL,
  `age_group_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `start_age` int(11) NOT NULL,
  `end_age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `age_groups`
--

INSERT INTO `age_groups` (`ag_id`, `age_group_name`, `start_age`, `end_age`) VALUES
(1, 'ህፃን', 0, 14),
(2, 'ወጣት', 14, 30),
(3, 'ጎልማሳ', 30, 45),
(4, 'አዋቂ', 45, 60),
(5, 'ሽማግሌ', 60, 130);

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
(3, 'system_name_short', 'ቸdb'),
(4, 'default_password', '123456'),
(5, 'church_name', 'የአርባምንጭ እናት መካነ ኢየሱስ ቤተክርስቲያን');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `gid` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gid`, `name`, `type`, `created`) VALUES
(3, 'Maranatha', 'መዘምራን', '2020-02-23 05:14:39'),
(4, 'ይሳኮር', 'የአገልግሎት ቡድን', '2020-03-09 07:50:43'),
(5, 'ወጣቶች ኮሚቴ', 'የአገልግሎት ቡድን', '2020-03-09 14:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `role` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `group_id`, `member_id`, `role`) VALUES
(7, 3, 32, 'አባል'),
(8, 3, 34, 'አባል'),
(9, 3, 22, 'መሪ'),
(11, 4, 22, 'አባል'),
(12, 4, 34, 'አባል'),
(14, 4, 9, 'አባል'),
(24, 5, 9, 'አባል'),
(25, 5, 34, 'አባል'),
(26, 5, 42, 'መሪ'),
(27, 5, 41, 'አባል'),
(28, 5, 43, 'አባል');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `job_type_id` int(11) NOT NULL,
  `job_type_title` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`job_type_id`, `job_type_title`) VALUES
(1, 'አልተመረጠም'),
(2, 'የመንግስት ሥራ'),
(3, 'ነጋዴ'),
(4, 'መንግስታዊ ያልሆነ ድርጅት'),
(5, 'የግል ሥራ'),
(6, 'የቤት እመቤት');

-- --------------------------------------------------------

--
-- Table structure for table `kebeles`
--

CREATE TABLE `kebeles` (
  `kebele_id` int(11) NOT NULL,
  `kebele_title` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kebeles`
--

INSERT INTO `kebeles` (`kebele_id`, `kebele_title`) VALUES
(0, 'አልተመረጠም'),
(2, 'ዕድገት በር'),
(3, 'ጉርባ'),
(4, 'ወዜ');

-- --------------------------------------------------------

--
-- Table structure for table `kifle_ketemas`
--

CREATE TABLE `kifle_ketemas` (
  `kifle_ketema_id` int(11) NOT NULL,
  `kifle_ketema_title` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kifle_ketemas`
--

INSERT INTO `kifle_ketemas` (`kifle_ketema_id`, `kifle_ketema_title`) VALUES
(0, 'አልተመረጠም'),
(2, 'ነጭ ሳር'),
(3, 'ሲቄላ'),
(4, 'ሴቻ'),
(5, 'ልማት');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `kifle_ketema` int(11) NOT NULL,
  `kebele` int(11) NOT NULL,
  `mender` int(11) NOT NULL,
  `house_number` varchar(10) NOT NULL,
  `home_phone` varchar(15) NOT NULL,
  `level_of_education` varchar(50) NOT NULL DEFAULT 'አልተመረጠም',
  `field_of_study` varchar(100) NOT NULL,
  `job_type` int(11) NOT NULL,
  `monthly_income` int(11) NOT NULL,
  `workplace_name` varchar(50) NOT NULL,
  `workplace_phone` varchar(50) NOT NULL,
  `mobile_phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `hide_age` tinyint(1) DEFAULT NULL,
  `birth_place` varchar(50) NOT NULL,
  `membership_year` int(11) DEFAULT NULL,
  `membership_cause` int(11) NOT NULL,
  `membership_level` int(11) NOT NULL,
  `ministry` int(11) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `spouse` int(11) DEFAULT NULL,
  `avatar` text,
  `profile_color` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ያለ',
  `status_remark` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `title`, `firstname`, `middlename`, `lastname`, `gender`, `kifle_ketema`, `kebele`, `mender`, `house_number`, `home_phone`, `level_of_education`, `field_of_study`, `job_type`, `monthly_income`, `workplace_name`, `workplace_phone`, `mobile_phone`, `email`, `birthdate`, `hide_age`, `birth_place`, `membership_year`, `membership_cause`, `membership_level`, `ministry`, `marital_status`, `spouse`, `avatar`, `profile_color`, `status`, `status_remark`, `created`) VALUES
(9, '', 'Betelihem', 'Wolde', 'Gebretsadik', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '0916253685', 'bety.wolde@yahoo.com', '1978-04-05', NULL, 'Nazreth', 0, 1, 1, 1, 'አልተመረጠም', 0, NULL, '#00c0ef', 'ያለ', '', '2020-02-21 18:48:33'),
(10, '', 'Tekeste', 'Getnet', 'Emiru', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 3, 0, '', '', '0921568748', 'tekeste.getnet@gmail.com', '1969-08-09', NULL, 'Amhara', 0, 3, 1, 4, 'አልተመረጠም', NULL, NULL, '#001f3f', 'ያለ', '', '2020-02-21 18:52:12'),
(11, '', 'ሞሜ', 'ወርቁ', 'ኦሌ', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 5, 0, '', '', '0916352487', 'mome.worku@gmail.com', '1988-09-09', NULL, 'Chencha', 1992, 2, 1, 1, 'አልተመረጠም', NULL, NULL, '#777777', 'ያለ', '', '2020-02-22 18:41:06'),
(12, '', 'Sara', 'Markos', 'Dibaba', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 4, 0, '2M Ergo Bet', '', '0916352478', 'sara.markos@yahoo.com', '1989-08-09', NULL, 'Chencha', 1985, 1, 1, 3, 'አልተመረጠም', 0, NULL, '#00a65a', 'ያለ', '', '2020-02-22 18:42:36'),
(13, '', 'Tamirat', 'Osake', 'Olle', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 4, 0, '', '', '0913258749', 'tamirat.osake@gmail.com', '1991-02-05', NULL, 'Boroda', 1999, 1, 1, 1, 'አልተመረጠም', 0, NULL, '#39cccc', 'ያለ', '', '2020-02-22 18:43:45'),
(14, '', 'Minayehu', 'Elias', 'Meseret', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, 'Arbaminch Zuria Wereda Astedadir', '(046) 881-2558', '1987456532', 'Mine.elu@gmail.com', '1974-08-05', NULL, 'Arbaminch', 1999, 1, 1, 4, 'አልተመረጠም', 0, NULL, '#00a65a', 'ያለ', '', '2020-02-22 18:45:14'),
(15, '', 'Mimi', 'Yanda', 'Elu', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 6, 0, '', '', '0916857485', 'mimi.yanda@gmail.com', '1985-08-05', NULL, 'Zerdo', 2001, 4, 1, 1, 'አልተመረጠም', 0, NULL, '#f39c12', 'ያለ', '', '2020-02-22 18:46:28'),
(16, '', 'Meklit', 'Wonte', 'Mitsa', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, 'Ethiopia Nigd Bank', '', '0933568974', 'meklitwonte@yahoo.com', '1990-08-09', NULL, 'Arbaminch', 2005, 1, 1, 3, 'አልተመረጠም', 0, NULL, '#777777', 'ያለ', '', '2020-02-22 18:47:56'),
(17, '', 'Merid', 'Tolba', 'Getto', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 2, 0, '', '', '0913235689', 'merid.tolba@gmail.com', '1976-08-09', NULL, 'Dita', 2007, 3, 1, 2, 'አልተመረጠም', 0, NULL, '#3c8dbc', 'ያለ', '', '2020-02-22 18:49:02'),
(18, '', 'Mirinda', 'Melkamu', 'Getu', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 2, 0, 'Yimegnu Cafeteria', '', '0915874852', 'mirinda.melkamu@gmail.com', '1985-04-05', NULL, 'Chencha', 1998, 1, 1, 2, 'አልተመረጠም', 0, NULL, '#ff851b', 'ያለ', '', '2020-02-22 18:59:26'),
(19, '', 'Hana', 'Tekle', 'Woldearegay', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 2, 0, '', '', '091125457585', 'hana.tekle@yahoo.com', '1970-08-07', 0, 'Addis Abeba', 1997, 3, 1, 3, 'አልተመረጠም', 0, NULL, '#00c0ef', 'ያለ', '', '2020-02-23 13:52:01'),
(20, '', 'Sitana', 'Desalegn', 'Zeleke', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '0915657898', 'sitana.desalegn@gmail.com', '2001-02-05', NULL, 'Chencha', 0, 1, 1, 1, 'የፈታች', NULL, NULL, '#01ff70', 'ያለ', '', '2020-02-25 17:16:03'),
(22, '', 'አዲሱ', 'ወርቁ', 'አድነው', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 4, 0, '', '', '0910253698', 'addisu.worku@gmail.com', '1968-05-09', NULL, 'አዲስ አበባ', 1992, 1, 1, 1, 'ያገባ', 0, NULL, '#f012be', 'ያለ', '', '2020-02-28 05:20:49'),
(23, '', 'አውታሩ', 'ከበደ', 'ወልደየስ', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 4, 0, '', '', '0911258978', 'awtaru.kebede@yahoo.com', '1982-08-08', NULL, 'ናዝሬት', 1983, 1, 1, 4, 'ያገባ/ች', 42, 'churchdb1583929638user2-160x160.jpg', '#00c0ef', 'የሌለ', 'በዝውውር ሌላ ሀገር በመሄድ', '2020-02-28 08:10:41'),
(24, '', 'Sosore', 'Toke', 'Misto', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1968-09-08', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, NULL, '#f012be', 'ያለ', '', '2020-02-28 10:45:51'),
(25, '', 'Nursing', 'College', 'Mulugeta', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1986-09-05', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, NULL, '#dd4b39', 'ያለ', '', '2020-03-02 06:04:31'),
(26, '', 'Shibe', 'Wonte', 'Mitsa', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1978-09-09', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, NULL, '#605ca8', 'ያለ', '', '2020-03-02 06:07:59'),
(27, '', 'Masresha', 'Belayneh', 'Getu', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1986-05-04', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, NULL, '#001f3f', 'የጠፋ', '', '2020-03-02 06:14:46'),
(28, '', 'Chin', 'Chua', 'Chok', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1986-05-04', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, NULL, '#dd4b39', 'ያለ', '', '2020-03-02 06:16:36'),
(29, '', 'Chyne', 'Tomas', 'Kebu', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1988-09-09', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, 'churchdb1583227588avatar5.png', '#39cccc', 'የጠፋ', '', '2020-03-02 06:19:54'),
(30, '', 'Eddy', 'Murphu', 'Tom', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1985-09-06', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, 'churchdb1583219732avatar5.png', '#f012be', 'የሌለ', 'adadfaadfa', '2020-03-02 06:21:07'),
(31, '', 'ሌሊሴ', 'ሙዳ', 'ቀጠሮ', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1985-09-08', NULL, '', 0, 1, 4, 1, 'አልተመረጠም', NULL, 'avatar3.png', '#f012be', 'ያለ', '', '2020-03-02 06:25:12'),
(32, '', 'ወንዱ', 'ተፈራ', 'ጎሎና', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1985-09-08', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, 'user6-128x128.jpg', '#39cccc', 'ያለ', '', '2020-03-02 07:01:58'),
(33, '', 'አለሚቱ', 'ሳምሶን', 'ከበደ', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1985-06-09', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, 'user7-128x128.jpg', '#00a65a', 'ያለ', '', '2020-03-02 08:19:15'),
(34, '', 'ፍስሀ', 'ድጀኔ', 'አለሙ', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1974-08-05', NULL, '', 0, 1, 1, 2, 'አልተመረጠም', NULL, 'churchdb1583163579user8-128x128.jpg', '#00a65a', 'ያለ', '', '2020-03-02 11:27:43'),
(35, '', 'ምናለ', 'ዜና', 'ሮባ', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1978-08-08', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, 'churchdb1583678817avatar04.png', '#777777', 'ያለ', '', '2020-03-02 11:28:50'),
(36, '', 'ክጅልክ', 'ጅክልጅ', 'ክልጅል', 'ሴት', 2, 2, 2, '10', '', '10ኛ ያጠናቀቀ', '', 2, 800, '', '', '', '', '1988-09-09', NULL, '', 1985, 3, 3, 3, 'አልተመረጠም', NULL, 'churchdb1583216316avatar5.png', '#3c8dbc', 'ያለ', '', '2020-03-02 11:29:52'),
(37, '', 'ሙሴ', 'ጎይዳ', 'ጎንጋሻ', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1985-09-09', NULL, '', 0, 1, 3, 1, 'አልተመረጠም', NULL, 'churchdb1583154589user8-128x128.jpg', '#39cccc', 'ያለ', '', '2020-03-02 11:34:12'),
(38, '', 'ቤተልሄም', 'ኦሎባ', 'Osake', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1985-09-08', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, 'churchdb1584365792avatar2.png', '#ff851b', 'ያለ', '', '2020-03-02 11:34:57'),
(39, '', 'ኪዳነማርያም', 'ፍቃዱ', 'ተክለማርያም', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1985-06-06', NULL, '', 1980, 1, 1, 1, 'አልተመረጠም', NULL, 'churchdb1583154524user6-128x128.jpg', '#605ca8', 'የጠፋ', '', '2020-03-02 11:36:22'),
(40, '', 'ታደሰ', 'እሸቴ', 'አላማ', 'ወንድ', 2, 3, 2, '15', '0468817578', 'ዲፕሎማ', 'ICT', 4, 3200, 'VITA', '(046) 881-2536', '0911253686', 'tadesse.eshete@gmail.com', '1985-09-06', NULL, 'ደምቢዶሎ', 1983, 2, 2, 4, 'ያላገባ/ች', NULL, 'churchdb1583930623user1-128x128.jpg', '#777777', 'ያለ', '', '2020-03-08 13:23:47'),
(41, '', 'ህሊና', 'አለሙ', 'ስንክሳር', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1978-09-08', NULL, 'አርባምንጭ', 0, 1, 2, 1, 'አልተመረጠም', NULL, 'churchdb1584111423user7-128x128.jpg', '#001f3f', 'ያለ', '', '2020-03-11 09:10:57'),
(42, '', 'አዜብ', 'ሀይሉ', 'አድነው', 'ሴት', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1985-mm-dd', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, NULL, '#00c0ef', 'ያለ', '', '2020-03-11 11:45:06'),
(43, '', 'ዙርያ', 'ሱማሌ', 'ዋሌሳ', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 4, 0, 'አርባ ምንጭ መካነ እየሱስ ማህበረ ምዕመናን', '(046) 881-0076', '0913913538', 'zuria_sume@yahoo.co.uk', '1980-04-20', NULL, 'ጊዶሌ', 1988, 3, 2, 5, 'አልተመረጠም', NULL, 'churchdb1584367969user8-128x128.jpg', '#605ca8', 'የሌለ', 'ወደ ፈጥኖ ካምፕ ተዛውሯል', '2020-03-16 14:08:07'),
(44, '', 'አለሚቱ', 'አርጋው', 'ጠናው', 'ሴት', 5, 4, 0, '', '', 'አልተመረጠም', '', 2, 0, 'የአርባ ምንጭ ከተማ መንግስት ሰራተኞች ማህበራዊ ዋስትና ኤጀንሲ', '(046) 881-2534', '0916859674', 'alemitu.argaw@yahoo.com', '1986-07-08', NULL, 'አርባምንጭ', 1990, 3, 2, 3, 'አልተመረጠም', NULL, NULL, '#777777', 'ያለ', '', '2020-03-17 09:20:06'),
(45, '', 'ዮሴፍ', 'አያሌው', 'ሙነር', 'ወንድ', 3, 4, 0, '122', '0468812526', 'ዲፕሎማ', 'Plumbing and wood works', 5, 8100, 'ዮሰፍ እንጨትና ብረታብረት', '(046) 881-8185', '0912457898', 'yosef.ayalew@yahoo.com', '1977-08-09', NULL, 'ናዝሬት', 1993, 2, 2, 6, 'አልተመረጠም', NULL, NULL, '#00a65a', 'ያለ', '', '2020-03-17 10:00:40'),
(46, '', 'አበባው', 'ላቦሬ', 'ሶርሶ', 'ወንድ', 2, 2, 3, '10', '0468812527', 'የመጀመርያ ዲግሪ', 'Computer Science', 2, 10000, 'አርባምንጭ ሆስፒታል', '(046) 881-0213', '0956857485', 'abebaw.argaw@yahoo.com', '1983-08-09', NULL, 'አርባምንጭ', 1996, 2, 2, 3, 'አልተመረጠም', NULL, NULL, '#dd4b39', 'ያለ', '', '2020-03-18 13:54:13'),
(47, '', 'China', 'Tomas', 'Kebu', 'ወንድ', 0, 0, 0, '', '', 'አልተመረጠም', '', 1, 0, '', '', '', '', '1988-08-08', NULL, '', 0, 1, 1, 1, 'አልተመረጠም', NULL, NULL, '#00a65a', 'የጠፋ', '', '2020-03-26 11:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `membership_causes`
--

CREATE TABLE `membership_causes` (
  `membership_cause_id` int(11) NOT NULL,
  `membership_cause_title` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_causes`
--

INSERT INTO `membership_causes` (`membership_cause_id`, `membership_cause_title`) VALUES
(1, 'አልተመረጠም'),
(2, 'በጥምቀት'),
(3, 'በእምነት ማጽኛ ትምህርት'),
(4, 'ከሌላ መ/ኢ/ማ/ም በዝውውር'),
(5, 'ከሌላ ወ/አ/ክርስቲያናት በመምጣት ');

-- --------------------------------------------------------

--
-- Table structure for table `membership_levels`
--

CREATE TABLE `membership_levels` (
  `membership_level_id` int(11) NOT NULL,
  `membership_level_title` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_levels`
--

INSERT INTO `membership_levels` (`membership_level_id`, `membership_level_title`) VALUES
(1, 'አልተመረጠም'),
(2, 'ቆራቢ አባል'),
(3, 'የደቀ መዝሙር ትምህርት ተማሪ'),
(4, 'የእምነት ማፅኛ ትምህርት ተማሪ');

-- --------------------------------------------------------

--
-- Table structure for table `menders`
--

CREATE TABLE `menders` (
  `mender_id` int(11) NOT NULL,
  `mender_title` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menders`
--

INSERT INTO `menders` (`mender_id`, `mender_title`) VALUES
(0, 'አልተመረጠም'),
(2, 'ሆስፒታል'),
(3, 'ኮንሶ'),
(4, 'ካባ');

-- --------------------------------------------------------

--
-- Table structure for table `ministries`
--

CREATE TABLE `ministries` (
  `ministry_id` int(11) NOT NULL,
  `ministry_title` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ministries`
--

INSERT INTO `ministries` (`ministry_id`, `ministry_title`) VALUES
(1, 'አልተመረጠም'),
(2, 'አያገለግሉም'),
(3, 'አስተናጋጅ'),
(4, 'ኳየር'),
(5, 'አስተዳደር'),
(6, 'ወንጌላዊ'),
(7, 'ቄስ');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `note_content` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `member_id`, `note_content`, `date`, `user_id`) VALUES
(1, 40, 'የዚህ ምዕመን መረጃ ብትክክል ስላልገባ እባካችሁ በትክክል አስገቡ።', '2020-03-16 10:23:27', 1),
(2, 40, 'ላክጅስድ፤ልፍክጅፍድልክ', '2020-03-16 10:24:43', 1),
(3, 40, 'ላመስግነው አምላኬን በሰማይ ላለው ለየሱስ ቅኔን ልቀኝለት', '2020-03-16 10:26:17', 1),
(4, 40, 'yenote memezgebya erroru betikikil astekakiyalew', '2020-03-16 10:28:08', 1),
(5, 39, 'ብቻ እየሱስ ቤቴ ካለ ሙሉ ነው ይበቃኛል። መዝሙር አለኝ ዜማ አለኝ፡ አንተ ወዳለህበት ወደ አደባባይህ ጌታ ', '2020-03-16 11:48:45', 1),
(6, 43, 'አጅክስድክፋጅልክጅስ ድፍልስክድጅፍ ስልድክጅ ፍ', '2020-03-16 17:18:27', 1),
(7, 19, 'ሀና ተክሌ የቤተክርስቲያኒቱ ዘማሪ ናት', '2020-04-06 19:34:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `payment_type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `date_issued` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `member_id`, `payment_type`, `payment_amount`, `date_issued`) VALUES
(25, 46, 'በኩራት', 5600, '2020-03-25 12:17:08'),
(26, 46, 'አስራት', 560, '2020-03-25 12:17:46'),
(27, 45, 'በኩራት', 8100, '2020-03-25 12:18:08'),
(28, 45, 'የፍቅር ስጦታ', 5000, '2020-03-25 12:18:20'),
(29, 44, 'በኩራት', 9560, '2020-03-25 12:19:03'),
(30, 44, 'አስራት', 960, '2020-03-25 12:19:12'),
(31, 44, 'የፍቅር ስጦታ', 5500, '2020-03-25 12:19:24'),
(32, 43, 'በኩራት', 10400, '2020-03-25 12:19:49'),
(33, 43, 'የፍቅር ስጦታ', 20580, '2020-03-25 12:20:01'),
(34, 35, 'አስራት', 400, '2020-03-25 12:20:38'),
(35, 9, 'አስራት', 8000, '2020-03-25 12:21:05'),
(36, 9, 'የፍቅር ስጦታ', 15000, '2020-03-25 12:21:17'),
(37, 41, 'በኩራት', 22000, '2020-03-25 12:24:31'),
(38, 41, 'አስራት', 2200, '2020-03-25 12:24:44'),
(39, 41, 'አስራት', 2200, '2020-03-25 12:24:54'),
(40, 41, 'የፍቅር ስጦታ', 8000, '2020-03-25 12:25:09'),
(41, 41, 'የፍቅር ስጦታ', 10000, '2020-03-25 12:25:21'),
(42, 41, 'የፍቅር ስጦታ', 7000, '2020-03-25 12:25:35'),
(43, 41, 'አስራት', 2200, '2020-03-25 12:26:44'),
(44, 41, 'አስራት', 2200, '2020-03-25 12:27:06'),
(45, 41, 'አስራት', 2200, '2020-03-25 12:28:23'),
(46, 41, 'የፍቅር ስጦታ', 900, '2020-03-25 12:28:31'),
(47, 41, 'የፍቅር ስጦታ', 15000, '2020-03-25 12:28:38'),
(48, 41, 'የፍቅር ስጦታ', 20000, '2020-03-25 12:28:46'),
(49, 39, 'የፍቅር ስጦታ', 50000, '2020-03-25 12:34:07'),
(50, 39, 'አስራት', 11000, '2020-03-25 12:39:26'),
(51, 38, 'በኩራት', 5600, '2020-03-25 13:27:17'),
(52, 28, 'በኩራት', 4200, '2020-03-26 06:09:48'),
(53, 28, 'የፍቅር ስጦታ', 12000, '2020-03-26 06:10:46'),
(54, 34, 'በኩራት', 4000, '2020-03-28 12:16:16'),
(55, 34, 'አስራት', 300, '2020-03-28 12:17:50'),
(56, 31, 'በኩራት', 8955, '2020-04-05 00:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `id` int(11) NOT NULL,
  `by_user` varchar(50) CHARACTER SET utf8 NOT NULL,
  `change_occured` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`id`, `by_user`, `change_occured`, `member_id`, `date`) VALUES
(58, 'Samson  Alula', 'updated', 39, '2020-03-02 13:03:15'),
(59, 'Samson  Alula', 'updated', 39, '2020-03-02 13:08:44'),
(60, 'Samson  Alula', 'updated', 39, '2020-03-02 13:08:54'),
(61, 'Samson  Alula', 'updated', 37, '2020-03-02 13:09:08'),
(62, 'Samson  Alula', 'updated', 37, '2020-03-02 13:09:34'),
(63, 'Samson  Alula', 'updated', 37, '2020-03-02 13:09:49'),
(64, 'Samson  Alula', 'updated', 39, '2020-03-02 13:27:45'),
(65, 'Samson  Alula', 'updated', 39, '2020-03-02 13:28:09'),
(66, 'Samson  Alula', 'updated', 39, '2020-03-02 13:28:18'),
(67, 'Samson  Alula', 'updated', 39, '2020-03-02 13:28:28'),
(68, 'Samson  Alula', 'updated', 39, '2020-03-02 13:28:32'),
(69, 'Samson  Alula', 'updated', 39, '2020-03-02 13:28:36'),
(70, 'Samson  Alula', 'updated', 39, '2020-03-02 13:28:42'),
(71, 'Samson  Alula', 'updated', 38, '2020-03-02 13:58:53'),
(72, 'Samson  Alula', 'updated', 34, '2020-03-02 15:38:48'),
(73, 'Samson  Alula', 'updated', 34, '2020-03-02 15:39:39'),
(74, 'Samson  Alula', 'updated', 37, '2020-03-02 15:40:12'),
(75, 'Samson  Alula', 'updated', 36, '2020-03-03 06:18:36'),
(76, 'Samson  Alula', 'updated', 34, '2020-03-03 06:21:26'),
(77, 'Samson  Alula', 'updated', 30, '2020-03-03 07:15:32'),
(78, 'Samson  Alula', 'updated', 30, '2020-03-03 07:15:40'),
(79, 'Samson  Alula', 'updated', 35, '2020-03-03 07:24:28'),
(80, 'Samson  Alula', 'updated', 35, '2020-03-03 07:24:39'),
(81, 'Samson  Alula', 'updated', 39, '2020-03-03 08:18:36'),
(82, 'Samson  Alula', 'updated', 38, '2020-03-03 08:31:43'),
(83, 'Samson  Alula', 'updated', 29, '2020-03-03 09:26:28'),
(84, 'Samson  Alula', 'updated', 37, '2020-03-03 11:45:50'),
(85, 'Samson  Alula', 'updated', 36, '2020-03-03 11:55:56'),
(86, 'Samson  Alula', 'updated', 35, '2020-03-03 12:22:21'),
(87, 'Samson  Alula', 'updated', 35, '2020-03-03 12:22:45'),
(88, 'Samson  Alula', 'updated', 35, '2020-03-03 12:26:07'),
(89, 'ሳምሶን  አሉላ', 'updated', 10, '2020-03-07 08:24:32'),
(90, 'ሳምሶን  አሉላ', 'updated', 10, '2020-03-07 08:27:09'),
(91, 'እንዳለ ወልደጊዮርጊስ', 'created', 40, '2020-03-08 13:23:47'),
(92, 'ሳምሶን  አሉላ', 'updated', 35, '2020-03-08 14:46:57'),
(93, 'ሳምሶን  አሉላ', 'updated', 34, '2020-03-11 08:57:25'),
(94, 'ሳምሶን  አሉላ', 'created', 41, '2020-03-11 09:10:57'),
(95, 'ሳምሶን  አሉላ', 'updated', 41, '2020-03-11 09:12:06'),
(96, 'ሳምሶን  አሉላ', 'created', 42, '2020-03-11 11:45:06'),
(97, 'ሳምሶን  አሉላ', 'updated', 41, '2020-03-11 11:48:39'),
(98, 'ሳምሶን  አሉላ', 'updated', 36, '2020-03-11 12:12:17'),
(99, 'ሳምሶን  አሉላ', 'updated', 23, '2020-03-11 12:21:06'),
(100, 'ሳምሶን  አሉላ', 'updated', 23, '2020-03-11 12:23:10'),
(101, 'ሳምሶን  አሉላ', 'updated', 23, '2020-03-11 12:23:26'),
(102, 'ሳምሶን  አሉላ', 'updated', 23, '2020-03-11 12:25:26'),
(103, 'ሳምሶን  አሉላ', 'updated', 23, '2020-03-11 12:27:18'),
(104, 'ሳምሶን  አሉላ', 'updated', 39, '2020-03-11 12:38:28'),
(105, 'ሳምሶን  አሉላ', 'updated', 40, '2020-03-11 12:43:26'),
(106, 'ሳምሶን  አሉላ', 'updated', 40, '2020-03-11 12:43:43'),
(107, 'ሳምሶን  አሉላ', 'updated', 11, '2020-03-11 13:57:34'),
(108, 'ሳምሶን አሉላ', 'updated', 41, '2020-03-13 14:57:03'),
(109, 'ሳምሶን አሉላ', 'updated', 37, '2020-03-15 18:44:30'),
(110, 'ሳምሶን አሉላ', 'updated', 31, '2020-03-15 18:44:47'),
(111, 'ሳምሶን አሉላ', 'updated', 34, '2020-03-15 18:45:19'),
(112, 'ሳምሶን አሉላ', 'updated', 40, '2020-03-16 10:50:57'),
(113, 'ሳምሶን አሉላ', 'updated', 38, '2020-03-16 13:36:32'),
(114, 'ሳምሶን አሉላ', 'created', 43, '2020-03-16 14:08:07'),
(115, 'ሳምሶን አሉላ', 'updated', 43, '2020-03-16 14:12:49'),
(116, 'ሳምሶን አሉላ', 'created', 44, '2020-03-17 09:20:07'),
(117, 'ሳምሶን አሉላ', 'created', 45, '2020-03-17 10:00:40'),
(118, 'ሳምሶን አሉላ', 'updated', 45, '2020-03-17 10:20:40'),
(119, 'ሳምሶን አሉላ', 'updated', 45, '2020-03-17 10:45:28'),
(120, 'ሳምሶን አሉላ', 'updated', 45, '2020-03-17 10:45:37'),
(121, 'ሳምሶን አሉላ', 'updated', 45, '2020-03-17 10:45:47'),
(122, 'ሳምሶን አሉላ', 'updated', 45, '2020-03-17 10:45:57'),
(123, 'ሳምሶን አሉላ', 'updated', 45, '2020-03-17 10:46:06'),
(124, 'ሳምሶን አሉላ', 'updated', 45, '2020-03-17 10:49:26'),
(125, 'ሳምሶን አሉላ', 'updated', 45, '2020-03-17 11:04:19'),
(126, 'ሳምሶን አሉላ', 'updated', 45, '2020-03-18 13:51:20'),
(127, 'ሳምሶን አሉላ', 'updated', 45, '2020-03-18 13:51:34'),
(128, 'ሳምሶን አሉላ', 'created', 46, '2020-03-18 13:54:13'),
(129, 'ሳምሶን አሉላ', 'updated', 46, '2020-03-18 14:12:20'),
(130, 'ሳምሶን አሉላ', 'updated', 46, '2020-03-18 14:13:35'),
(131, 'ሳምሶን አሉላ', 'updated', 46, '2020-03-18 14:23:11'),
(132, 'ሳምሶን አሉላ', 'updated', 46, '2020-03-18 14:23:26'),
(133, 'ሳምሶን አሉላ', 'updated', 46, '2020-03-18 14:23:37'),
(134, 'ሳምሶን አሉላ', 'updated', 45, '2020-03-18 14:31:25'),
(135, 'ሳምሶን አሉላ', 'updated', 40, '2020-03-20 18:01:35'),
(136, 'ሳምሶን አሉላ', 'created', 47, '2020-03-26 11:25:35'),
(137, 'ሳምሶን አሉላ', 'updated', 36, '2020-03-31 15:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) CHARACTER SET utf8 NOT NULL,
  `p_register_member` varchar(10) DEFAULT NULL,
  `p_edit_member` varchar(10) DEFAULT NULL,
  `p_delete_member` varchar(10) DEFAULT NULL,
  `p_manage_form` varchar(10) DEFAULT NULL,
  `p_manage_group` varchar(10) DEFAULT NULL,
  `p_generate_member_report` varchar(10) DEFAULT NULL,
  `login_count` int(11) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `profile_picture` text CHARACTER SET utf8,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `user_type`, `p_register_member`, `p_edit_member`, `p_delete_member`, `p_manage_form`, `p_manage_group`, `p_generate_member_report`, `login_count`, `last_login`, `profile_picture`, `created`, `modified`) VALUES
(1, 'ሳምሶን', 'አሉላ', 'samson.alula', 'fcea920f7412b5da7be0cf42b8c93759', 'ዋና የሲስተም አስተዳደር', '0', '0', '0', '0', '0', '0', 163, '2020-04-07 04:04:30', 'churchdb1584105612avatar041.png', '2019-01-19 13:59:18', '2019-01-19 13:59:18'),
(10, 'እንዳለ', 'ወልደጊዮርጊስ', 'endale.woldegiorgis', 'e10adc3949ba59abbe56e057f20f883e', 'የሲስተም አስተዳደር', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-03-08 00:03:01', NULL, '2020-03-07 06:18:39', '2020-03-07 06:18:39'),
(11, 'ካፍትሌ', 'ቶራይቶ', 'kaftile.torayto', 'e10adc3949ba59abbe56e057f20f883e', 'መደበኛ ተጠቃሚ', 'allow', NULL, NULL, NULL, NULL, NULL, 8, '2020-03-25 22:03:59', 'churchdb1584364923user8-128x128.jpg', '2020-03-07 12:24:02', '2020-03-07 12:24:02'),
(14, 'ዙርያ', 'ሱማሌው', 'zuria.sumale', 'e10adc3949ba59abbe56e057f20f883e', 'የሲስተም አስተዳደር', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-03-07 15:18:18', '2020-03-07 15:18:18'),
(15, 'በላቸው', 'ሀታ', 'belachew.hata', 'e10adc3949ba59abbe56e057f20f883e', 'መደበኛ ተጠቃሚ', NULL, 'allow', NULL, 'allow', NULL, NULL, 0, NULL, NULL, '2020-03-07 15:42:47', '2020-03-07 15:42:47'),
(16, 'ግዛቸው', 'ወርቁ', 'gizachew.worku', 'e10adc3949ba59abbe56e057f20f883e', 'መደበኛ ተጠቃሚ', NULL, NULL, NULL, NULL, NULL, NULL, 10, '2020-03-08 01:03:58', NULL, '2020-03-07 15:43:11', '2020-03-07 15:43:11'),
(17, 'ምንታምር', 'አየለ', 'mintamir.ayele', 'e10adc3949ba59abbe56e057f20f883e', 'መደበኛ ተጠቃሚ', NULL, NULL, 'allow', 'allow', NULL, 'allow', 0, NULL, NULL, '2020-03-07 15:43:28', '2020-03-07 15:43:28'),
(18, 'ልሳን', 'ሚልኪያስ', 'lisan.milkias', '5e8667a439c68f5145dd2fcbecf02209', 'መደበኛ ተጠቃሚ', 'allow', NULL, NULL, 'allow', NULL, NULL, 1, '2020-03-16 01:03:42', 'churchdb1584368988user1-128x128.jpg', '2020-03-16 14:26:40', '2020-03-16 14:26:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `age_groups`
--
ALTER TABLE `age_groups`
  ADD PRIMARY KEY (`ag_id`);

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
-- Indexes for table `kebeles`
--
ALTER TABLE `kebeles`
  ADD PRIMARY KEY (`kebele_id`);

--
-- Indexes for table `kifle_ketemas`
--
ALTER TABLE `kifle_ketemas`
  ADD PRIMARY KEY (`kifle_ketema_id`);

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
-- Indexes for table `menders`
--
ALTER TABLE `menders`
  ADD PRIMARY KEY (`mender_id`);

--
-- Indexes for table `ministries`
--
ALTER TABLE `ministries`
  ADD PRIMARY KEY (`ministry_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `age_groups`
--
ALTER TABLE `age_groups`
  MODIFY `ag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cnfg`
--
ALTER TABLE `cnfg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `job_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kebeles`
--
ALTER TABLE `kebeles`
  MODIFY `kebele_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kifle_ketemas`
--
ALTER TABLE `kifle_ketemas`
  MODIFY `kifle_ketema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `membership_causes`
--
ALTER TABLE `membership_causes`
  MODIFY `membership_cause_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `membership_levels`
--
ALTER TABLE `membership_levels`
  MODIFY `membership_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menders`
--
ALTER TABLE `menders`
  MODIFY `mender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ministries`
--
ALTER TABLE `ministries`
  MODIFY `ministry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
