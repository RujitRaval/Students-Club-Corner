-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2012 at 04:15 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scc`
--
CREATE DATABASE `scc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `scc`;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `AlbumId` int(11) NOT NULL AUTO_INCREMENT,
  `AlbumName` varchar(200) NOT NULL,
  `AddUserId` int(11) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `StreamId` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`AlbumId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`AlbumId`, `AlbumName`, `AddUserId`, `AddDate`, `EditDate`, `StreamId`, `IsActive`) VALUES
(1, 'SAIT COLLASES 2009', 1, '2012-10-03 21:51:45', '0000-00-00 00:00:00', 34, 1),
(2, 'SAIT 2012', 1, '2012-10-27 12:20:54', '0000-00-00 00:00:00', 34, 1),
(7, 'SAIT Album 2012', 0, '2012-11-06 23:26:10', '0000-00-00 00:00:00', 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE IF NOT EXISTS `discussion` (
  `DiscussionId` int(11) NOT NULL AUTO_INCREMENT,
  `DiscussionSubject` varchar(200) NOT NULL,
  `DiscussionDescription` varchar(8000) NOT NULL,
  `AddUserId` int(11) NOT NULL,
  `AddDateTime` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`DiscussionId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `discussion`
--


-- --------------------------------------------------------

--
-- Table structure for table `discussion_reply`
--

CREATE TABLE IF NOT EXISTS `discussion_reply` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `DiscussionId` int(11) NOT NULL,
  `Description` varchar(8000) NOT NULL,
  `ReplyUserId` int(11) NOT NULL,
  `AddDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `discussion_reply`
--


-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
  `ElectionId` int(11) NOT NULL AUTO_INCREMENT,
  `ElectionName` varchar(100) NOT NULL,
  `ElectionTypeId` int(11) NOT NULL,
  `StreamId` int(11) NOT NULL,
  `ElectionStartDate` datetime NOT NULL,
  `ElectionEndDate` datetime NOT NULL,
  `AddUserId` int(11) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`ElectionId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`ElectionId`, `ElectionName`, `ElectionTypeId`, `StreamId`, `ElectionStartDate`, `ElectionEndDate`, `AddUserId`, `AddDate`, `EditDate`, `IsActive`) VALUES
(14, 'Election 2013', 6, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '2012-11-06 22:53:37', '0000-00-00 00:00:00', 1),
(12, 'Election 2013', 1, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 39, '2012-11-06 20:08:43', '0000-00-00 00:00:00', 1),
(11, 'Election 2013', 2, 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '2012-11-06 20:04:17', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `election_participants`
--

CREATE TABLE IF NOT EXISTS `election_participants` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ElectionId` int(11) NOT NULL,
  `ParticipantId` int(11) NOT NULL,
  `AddUserId` int(11) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `election_participants`
--

INSERT INTO `election_participants` (`Id`, `ElectionId`, `ParticipantId`, `AddUserId`, `AddDate`, `EditDate`, `IsActive`) VALUES
(7, 6, 42, 39, '2012-11-06 14:58:35', '0000-00-00 00:00:00', 1),
(6, 4, 31, 3, '2012-11-06 11:24:52', '0000-00-00 00:00:00', 1),
(5, 4, 32, 3, '2012-11-06 11:24:45', '0000-00-00 00:00:00', 1),
(4, 3, 4, 2, '2012-11-06 11:02:38', '0000-00-00 00:00:00', 1),
(8, 6, 44, 39, '2012-11-06 15:00:43', '0000-00-00 00:00:00', 1),
(9, 7, 46, 39, '2012-11-06 15:05:56', '0000-00-00 00:00:00', 1),
(10, 7, 47, 39, '2012-11-06 15:06:02', '0000-00-00 00:00:00', 1),
(11, 6, 48, 39, '2012-11-06 17:10:56', '0000-00-00 00:00:00', 1),
(18, 13, 44, 1, '2012-11-06 22:50:09', '0000-00-00 00:00:00', 1),
(13, 10, 44, 1, '2012-11-06 20:03:47', '0000-00-00 00:00:00', 1),
(14, 11, 44, 1, '2012-11-06 20:04:25', '0000-00-00 00:00:00', 1),
(15, 11, 42, 1, '2012-11-06 20:04:31', '0000-00-00 00:00:00', 1),
(16, 12, 44, 39, '2012-11-06 20:08:51', '0000-00-00 00:00:00', 1),
(17, 12, 44, 39, '2012-11-06 20:08:54', '0000-00-00 00:00:00', 1),
(19, 13, 42, 1, '2012-11-06 22:50:15', '0000-00-00 00:00:00', 1),
(21, 14, 42, 39, '2012-11-07 08:20:15', '0000-00-00 00:00:00', 1),
(22, 14, 44, 39, '2012-11-07 09:19:48', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `election_type`
--

CREATE TABLE IF NOT EXISTS `election_type` (
  `ElectionTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `ElectionType` varchar(50) NOT NULL,
  `AddUserId` int(11) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`ElectionTypeId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `election_type`
--

INSERT INTO `election_type` (`ElectionTypeId`, `ElectionType`, `AddUserId`, `AddDate`, `EditDate`, `IsActive`) VALUES
(6, 'President', 0, '2012-11-06 22:49:13', '0000-00-00 00:00:00', 1),
(7, 'Vice President', 0, '2012-11-06 22:49:29', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `election_votelist`
--

CREATE TABLE IF NOT EXISTS `election_votelist` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ElectionId` int(11) NOT NULL,
  `ParticipantId` int(11) NOT NULL,
  `VoteUserId` int(11) NOT NULL,
  `AddDate` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `election_votelist`
--

INSERT INTO `election_votelist` (`Id`, `ElectionId`, `ParticipantId`, `VoteUserId`, `AddDate`) VALUES
(4, 6, 42, 39, '2012-11-06 17:01:51'),
(3, 4, 31, 3, '2012-11-06 12:23:00'),
(5, 13, 44, 1, '2012-11-06 22:51:23'),
(6, 14, 42, 53, '2012-11-07 09:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE IF NOT EXISTS `event_master` (
  `EventId` int(10) NOT NULL AUTO_INCREMENT,
  `StreamId` int(11) NOT NULL,
  `EventName` varchar(50) NOT NULL,
  `EventStartTime` datetime NOT NULL,
  `EventEndTime` datetime NOT NULL,
  `EventDescription` varchar(1000) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`EventId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`EventId`, `StreamId`, `EventName`, `EventStartTime`, `EventEndTime`, `EventDescription`, `AddDate`, `EditDate`, `IsActive`) VALUES
(10, 1, 'Culfest 2013-14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '2012-11-03 19:44:55', '0000-00-00 00:00:00', 1),
(16, 2, 'SAIT 2012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '								', '2012-11-06 15:23:52', '0000-00-00 00:00:00', 1),
(21, 34, 'Rockstar 2013', '2012-11-07 00:00:00', '2012-12-13 00:00:00', '', '2012-11-07 06:24:31', '0000-00-00 00:00:00', 1),
(20, 34, 'Cricket 2013', '2012-11-08 00:00:00', '2012-11-17 00:00:00', '', '2012-11-07 06:23:55', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_result`
--

CREATE TABLE IF NOT EXISTS `event_result` (
  `EventId` int(11) NOT NULL,
  `EventUserId` int(11) NOT NULL,
  `EventResult` varchar(30) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_result`
--


-- --------------------------------------------------------

--
-- Table structure for table `event_users`
--

CREATE TABLE IF NOT EXISTS `event_users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `EventId` int(11) NOT NULL,
  `EventUserId` int(11) NOT NULL,
  `EventUserType` int(11) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `event_users`
--

INSERT INTO `event_users` (`Id`, `EventId`, `EventUserId`, `EventUserType`, `AddDate`, `EditDate`, `IsActive`) VALUES
(9, 51, 45, 0, '2012-11-07 07:31:41', '0000-00-00 00:00:00', 1),
(8, 50, 45, 0, '2012-11-07 07:31:41', '0000-00-00 00:00:00', 1),
(6, 47, 45, 0, '2012-11-07 07:30:28', '0000-00-00 00:00:00', 1),
(7, 49, 45, 0, '2012-11-07 07:31:41', '0000-00-00 00:00:00', 1),
(10, 49, 44, 0, '2012-11-07 07:41:27', '0000-00-00 00:00:00', 1),
(11, 60, 45, 0, '2012-11-07 09:22:35', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `FeedBackId` int(11) NOT NULL AUTO_INCREMENT,
  `FeedBackTopic` varchar(200) NOT NULL,
  `FeedBackDescription` varchar(1000) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Zip` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `suggestion` varchar(2000) DEFAULT NULL,
  `Phone` varchar(13) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`FeedBackId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedBackId`, `FeedBackTopic`, `FeedBackDescription`, `Name`, `Address`, `City`, `State`, `Country`, `Zip`, `Email`, `suggestion`, `Phone`, `AddDate`, `EditDate`, `IsActive`) VALUES
(42, '', '', 'Maulik', '2,RanchhodNagar Society', 'Rajkot', 'Gujarat', '', '', 'maulikpatel0095@gmail.com', 'As Student This Website Is Speechless..!!', '8511111195', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum_ans`
--

CREATE TABLE IF NOT EXISTS `forum_ans` (
  `question_id` int(4) NOT NULL,
  `a_id` int(4) NOT NULL,
  `a_name` varchar(65) NOT NULL,
  `a_email` varchar(65) NOT NULL,
  `a_ans` longtext NOT NULL,
  `a_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_ans`
--

INSERT INTO `forum_ans` (`question_id`, `a_id`, `a_name`, `a_email`, `a_ans`, `a_datetime`) VALUES
(56, 4, 'Rujit Raval', '', 'Sorry', '2012-11-07 08:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `forum_question`
--

CREATE TABLE IF NOT EXISTS `forum_question` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `name` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `view` int(4) NOT NULL,
  `reply` int(4) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `forum_question`
--

INSERT INTO `forum_question` (`id`, `topic`, `detail`, `name`, `email`, `datetime`, `view`, `reply`, `IsActive`) VALUES
(57, 'Hello', 'Hello Everyone', '08dit201', '', '2006-11-12 11:33:01', 3, 0, 1),
(56, 'Are U Missing Nirma...????', 'Say Truly...!!!', '08dit201', '', '2006-11-12 10:13:16', 17, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `home_desc`
--

CREATE TABLE IF NOT EXISTS `home_desc` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(2000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `home_desc`
--

INSERT INTO `home_desc` (`ID`, `description`, `AddDate`, `EditDate`) VALUES
(7, '<p>\r\n	<strong style="color: rgb(255, 160, 122); ">Institute of Diploma Studies emphasizes the all round development of its students.&nbsp; It aims at producing not only good professionals, but also good and worthy citizens of a great country, aiding in its overall progress and development.</strong></p>\r\n<p>\r\n	<span style="color:#ffa07a;"><strong>It endeavours to treat every student as an individual, to recognize their potential and to ensure that they receive the best preparation and training for achieving their career ambitions and life goals.</strong></span></p>\r\n', '2012-11-01 00:51:45', '2012-11-07 09:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `NewsId` int(11) NOT NULL AUTO_INCREMENT,
  `NewsSubject` varchar(1000) NOT NULL,
  `NewsDescription` varchar(8000) NOT NULL,
  `StreamId` int(11) NOT NULL,
  `AddUserId` int(11) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`NewsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsId`, `NewsSubject`, `NewsDescription`, `StreamId`, `AddUserId`, `AddDate`, `EditDate`, `IsActive`) VALUES
(12, ' ', 'Institute took part in Green Ahmedabad Campaign initiated by Times of India with Gujarat Ecology Commission (GEC) on 9th August 2013. ', 1, 0, '2012-11-07 09:06:03', '0000-00-00 00:00:00', 1),
(10, 'SAIT', 'SAIT Student had organized a competition on Essay writing on 16th August, 2013.								', 1, 0, '2012-11-06 15:40:13', '0000-00-00 00:00:00', 1),
(13, 'ISTE', 'ISTE Student Chapter-NIDS had organized a competition on Poster making on 9th August, 2013											', 1, 0, '2012-11-07 09:06:42', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

CREATE TABLE IF NOT EXISTS `photo_gallery` (
  `PhotoId` int(10) NOT NULL AUTO_INCREMENT,
  `AlbumId` int(11) NOT NULL,
  `PhotoName` varchar(200) NOT NULL,
  `AddUserId` int(11) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `extention` varchar(8) NOT NULL,
  `filename` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PhotoId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `photo_gallery`
--

INSERT INTO `photo_gallery` (`PhotoId`, `AlbumId`, `PhotoName`, `AddUserId`, `AddDate`, `EditDate`, `IsActive`, `extention`, `filename`) VALUES
(27, 1, '', 39, '2012-11-06 17:11:26', '0000-00-00 00:00:00', 1, '', '100_2482.jpg'),
(26, 1, '', 39, '2012-11-06 15:12:16', '0000-00-00 00:00:00', 1, '', '100_2415.jpg'),
(25, 1, '', 39, '2012-11-06 15:11:52', '0000-00-00 00:00:00', 1, '', '100_2406.jpg'),
(24, 1, '', 39, '2012-11-06 15:11:34', '0000-00-00 00:00:00', 1, '', '100_2403.jpg'),
(23, 1, '', 39, '2012-11-06 15:11:12', '0000-00-00 00:00:00', 1, '', '100_2396.jpg'),
(22, 1, '', 39, '2012-11-06 15:10:39', '0000-00-00 00:00:00', 1, '', '100_2371.jpg'),
(21, 1, '', 39, '2012-11-06 15:10:19', '0000-00-00 00:00:00', 1, '', '100_2352.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE IF NOT EXISTS `stream` (
  `StreamId` int(2) NOT NULL AUTO_INCREMENT,
  `StreamName` varchar(50) NOT NULL,
  `StreamDescription` varchar(1000) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime DEFAULT NULL,
  PRIMARY KEY (`StreamId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`StreamId`, `StreamName`, `StreamDescription`, `IsActive`, `AddDate`, `EditDate`) VALUES
(35, 'CESA', 'The department, established in 2001, offer Diploma Programme in Computer Engineering. In order to achieve the expectations as stated in mission statement, a variety of pedagogical tools are adopted for integrated learning. They include lecture-cum-discussion, laboratory work, tutorials, home assignments, seminars, field visits and project work. The department offers the need base rigorous coaching and continuous evaluation. Department emphasizes on large number of Industry/field based projects and interaction with professionals. Student guidance and advisory system with faculty as counsellor and active participation of students in co-curricular and extracurricular activities is a major feature of this department.\r\n 																', 1, '2012-11-06 14:25:29', NULL),
(34, 'SAIT', 'Information Technology department started in year 2001. Department is focusing on quality education & all round development of the students. To update curriculum as per the industry requirement, department is constantly in touch with industry experts. Expert lectures, workshops and seminars are frequently arranged by the department which helps the students to enrich their knowledge about latest trends practices etc. Students are being rigorously counseled for their academic and overall excellence. \r\n \r\n																				', 1, '2012-11-06 14:24:23', NULL),
(36, 'ECON', 'The department, establishment in 2001, offers Diploma Programme in Electronics & Communication Engineering. \r\n								', 1, '2012-11-06 14:26:03', NULL),
(37, 'LEES', 'The department, established in 2003. The department has 3 years'' academic program offering Diploma in Electrical Engineering. The department is equipped with latest experimental & computational facilities and well qualified faculty base to cater the academic and other kinds of students'' needs to enforce mission and vision of the university. \r\n								', 1, '2012-11-06 14:26:25', NULL),
(38, 'MESO', 'The Mechanical Engineering department was established in the year 1997 to provide quality education to the students in the area of Mechanical Engineering and to cater the needs of industry. Department has well developed infrastructure for diploma program in Mechanical Engineering. The department has excellent laboratory facilities and workshops, well qualified and experienced staff in all the interdisciplinary areas of mechanical engineering. We create a conducive environment for teaching - learning process and our faculty members always strive hard for academic excellence and overall personality development of students.\r\n								', 1, '2012-11-06 14:26:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stream_subadmin_relation`
--

CREATE TABLE IF NOT EXISTS `stream_subadmin_relation` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `StreamId` int(2) NOT NULL,
  `UserId` varchar(10) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `stream_subadmin_relation`
--

INSERT INTO `stream_subadmin_relation` (`Id`, `StreamId`, `UserId`, `AddDate`, `EditDate`, `IsActive`) VALUES
(25, 34, '08dit005', '2012-11-06 15:04:04', '0000-00-00 00:00:00', 1),
(24, 34, '09dit005', '2012-11-06 15:03:25', '0000-00-00 00:00:00', 1),
(23, 35, '08dit201', '2012-11-06 15:02:18', '0000-00-00 00:00:00', 1),
(22, 34, '08dit020', '2012-11-06 14:59:25', '0000-00-00 00:00:00', 1),
(21, 34, 'anu', '2012-11-06 14:55:38', '0000-00-00 00:00:00', 1),
(20, 34, '08dit009', '2012-11-06 14:54:10', '0000-00-00 00:00:00', 1),
(19, 37, 'sub_lees', '2012-11-06 14:46:22', '0000-00-00 00:00:00', 1),
(13, 35, 'sub_cesa', '2012-11-06 14:34:56', '0000-00-00 00:00:00', 1),
(18, 38, 'sub_meso', '2012-11-06 14:45:12', '0000-00-00 00:00:00', 1),
(17, 34, 'sub_sait', '2012-11-06 14:44:09', '0000-00-00 00:00:00', 1),
(16, 36, 'sub_econ', '2012-11-06 14:40:22', '0000-00-00 00:00:00', 1),
(26, 34, '09dit045', '2012-11-06 15:06:56', '0000-00-00 00:00:00', 1),
(27, 34, '09dit005', '2012-11-07 09:07:47', '0000-00-00 00:00:00', 1),
(28, 34, '09dit005', '2012-11-07 09:08:22', '0000-00-00 00:00:00', 1),
(29, 34, '09dit005', '2012-11-07 09:10:16', '0000-00-00 00:00:00', 1),
(30, 34, '09dit002', '2012-11-07 09:14:07', '0000-00-00 00:00:00', 1),
(31, 34, '09dit050', '2012-11-07 09:18:30', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subevent_master`
--

CREATE TABLE IF NOT EXISTS `subevent_master` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `EventId` int(11) NOT NULL,
  `SubEventName` varchar(100) NOT NULL,
  `SubDesc` varchar(500) NOT NULL,
  `SEStart` datetime NOT NULL,
  `SEEnd` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `AddUserId` varchar(10) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `subevent_master`
--

INSERT INTO `subevent_master` (`Id`, `EventId`, `SubEventName`, `SubDesc`, `SEStart`, `SEEnd`, `IsActive`, `AddUserId`, `AddDate`, `EditDate`) VALUES
(1, 1, 'rr', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 09:15:25', '0000-00-00 00:00:00'),
(47, 10, 'Paper Presentation', 'Paper presentation for all students.																																								', '2012-11-07 00:00:00', '2012-11-15 00:00:00', 1, '', '2012-11-06 15:22:39', '0000-00-00 00:00:00'),
(49, 16, 'Robotics', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-06 15:24:14', '0000-00-00 00:00:00'),
(50, 16, 'Lan Gaming', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-06 15:24:28', '0000-00-00 00:00:00'),
(53, 0, 'Computer Quiz', 'Computer quiz for all students								', '2012-11-07 00:00:00', '2012-12-13 00:00:00', 1, '', '2012-11-07 00:28:32', '0000-00-00 00:00:00'),
(54, 0, 'Computer Quiz', 'Computer quiz for all students																', '2012-11-08 00:00:00', '2012-12-13 00:00:00', 1, '', '2012-11-07 00:28:51', '0000-00-00 00:00:00'),
(57, 0, 'rr', 'trtrwet			gffsdgfdgfdg																																													', '2012-11-07 00:00:00', '2012-12-13 00:00:00', 0, '', '2012-11-07 00:38:09', '0000-00-00 00:00:00'),
(60, 21, 'Singing', 'Single Singer,\r\nGroup of two																', '2012-11-07 00:00:00', '2012-12-13 00:00:00', 1, '', '2012-11-07 06:25:29', '0000-00-00 00:00:00'),
(61, 16, 'Card Making', '															', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-07 09:20:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(4) NOT NULL AUTO_INCREMENT,
  `UserId` varchar(10) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `UserFirstName` varchar(20) DEFAULT NULL,
  `UserLastName` varchar(20) DEFAULT NULL,
  `ActivationDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(13) NOT NULL,
  `UserType` int(1) NOT NULL,
  `EditUserId` int(11) NOT NULL,
  `EditDate` datetime NOT NULL,
  `ActivationUserId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `UserId` (`UserId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `UserId`, `Password`, `UserFirstName`, `UserLastName`, `ActivationDate`, `IsActive`, `CreateDate`, `Email`, `Phone`, `UserType`, `EditUserId`, `EditDate`, `ActivationUserId`) VALUES
(1, 'admin', 'rr', 'administrator', 'administrator', '2012-10-06 11:55:29', 1, '0000-00-00 00:00:00', 'rr@gmail.com', '999111119as', 1, 33, '0000-00-00 00:00:00', 0),
(44, '08dit020', '08DIT020', 'Chirag', 'Prajapati', '2012-11-06 14:59:25', 1, '0000-00-00 00:00:00', '08dit020@nirmauni.ac.in', '9974956153', 4, 0, '0000-00-00 00:00:00', 0),
(40, 'sub_meso', 'sub_meso', 'Anand', 'Patel', '2012-11-06 14:45:12', 1, '0000-00-00 00:00:00', 'anand.patel@nirmauni.ac.in', '9909939302', 2, 0, '0000-00-00 00:00:00', 0),
(41, 'sub_lees', 'sub_lees', 'Tejas', 'Gandhi', '2012-11-06 14:46:22', 1, '0000-00-00 00:00:00', 'tejas.gandhi@nirmauni.ac.in', '8511111195', 2, 0, '0000-00-00 00:00:00', 0),
(42, '08dit009', '08DIT009', 'Maulik', 'Sojitra', '2012-11-06 14:54:10', 1, '0000-00-00 00:00:00', '08dit009@nirmauni.ac.in', '9375555550', 4, 0, '0000-00-00 00:00:00', 0),
(43, 'anu', 'ANU', 'Ajay', 'Upadhyaya', '2012-11-06 14:55:38', 1, '0000-00-00 00:00:00', 'ajay.upadhyaya@nirmauni.ac.in', '9724507005', 3, 0, '0000-00-00 00:00:00', 0),
(38, 'sub_econ', 'sub_econ', 'Amit', 'Raval', '2012-11-06 14:40:22', 1, '0000-00-00 00:00:00', 'amit.c.raval@nirmauni.ac.in', '9724507005', 2, 0, '0000-00-00 00:00:00', 0),
(35, 'sub_cesa', 'sub_cesa', 'Ajay', 'Patel', '2012-11-06 14:34:56', 1, '0000-00-00 00:00:00', 'ajaypatel@nirmauni.ac.in', '9974956153', 2, 0, '0000-00-00 00:00:00', 0),
(39, 'sub_sait', 'sub_sait', 'Jashvant', 'Dave', '2012-11-06 14:44:09', 1, '0000-00-00 00:00:00', 'jashvant.dave@nirmauni.ac.in', '9998994950', 2, 0, '0000-00-00 00:00:00', 0),
(45, '08dit201', '08DIT201', 'Rujit', 'Raval', '2012-11-06 15:02:18', 1, '0000-00-00 00:00:00', '08dit201@nirmauni.ac.in', '9724507005', 4, 0, '0000-00-00 00:00:00', 0),
(52, '09dit002', '09DIT002', 'Devyani', 'Prajapati', '2012-11-07 09:14:07', 1, '0000-00-00 00:00:00', '09dit002@nirmauni.ac.in', '9909909999', 4, 0, '0000-00-00 00:00:00', 0),
(53, '09dit050', '11111', 'Darshan', 'Nayak', '2012-11-07 09:18:30', 1, '0000-00-00 00:00:00', '09dit050@nirmauni.ac.in', '9099013913', 4, 0, '0000-00-00 00:00:00', 0),
(48, '09dit045', '09DIT045', 'Vijay', 'Gajera', '2012-11-06 15:06:56', 1, '0000-00-00 00:00:00', '09dit045@nirmauni.ac.in', '9099150556', 4, 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Zip` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(13) NOT NULL,
  `JoinDate` datetime NOT NULL,
  `StreamId` int(11) NOT NULL,
  `Desgnation` varchar(20) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `photo` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

