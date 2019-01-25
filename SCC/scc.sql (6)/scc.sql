-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2012 at 07:03 AM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`AlbumId`, `AlbumName`, `AddUserId`, `AddDate`, `EditDate`, `StreamId`, `IsActive`) VALUES
(1, 'SAIT COLLASE 2009', 1, '2012-10-03 21:51:45', '0000-00-00 00:00:00', 1, 1),
(2, 'SAIT 2012', 1, '2012-10-27 12:20:54', '0000-00-00 00:00:00', 1, 1),
(3, 'RUJIT', 1, '2012-10-27 15:06:22', '0000-00-00 00:00:00', 1, 1),
(4, 'Yamraj', 1, '2012-10-03 21:51:45', '0000-00-00 00:00:00', 1, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`ElectionId`, `ElectionName`, `ElectionTypeId`, `StreamId`, `ElectionStartDate`, `ElectionEndDate`, `AddUserId`, `AddDate`, `EditDate`, `IsActive`) VALUES
(5, 'Election 2013', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '2012-11-06 11:51:53', '0000-00-00 00:00:00', 1),
(4, 'Election 2013', 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, '2012-11-06 11:24:04', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `election_participants`
--

INSERT INTO `election_participants` (`Id`, `ElectionId`, `ParticipantId`, `AddUserId`, `AddDate`, `EditDate`, `IsActive`) VALUES
(6, 4, 31, 3, '2012-11-06 11:24:52', '0000-00-00 00:00:00', 1),
(5, 4, 32, 3, '2012-11-06 11:24:45', '0000-00-00 00:00:00', 1),
(4, 3, 4, 2, '2012-11-06 11:02:38', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `election_type`
--

INSERT INTO `election_type` (`ElectionTypeId`, `ElectionType`, `AddUserId`, `AddDate`, `EditDate`, `IsActive`) VALUES
(3, 'Vice President', 0, '2012-11-06 08:15:09', '0000-00-00 00:00:00', 1),
(4, 'Vice President2', 0, '2012-11-06 08:15:59', '0000-00-00 00:00:00', 1),
(5, 'President 2', 0, '2012-11-06 08:17:37', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `election_votelist`
--

INSERT INTO `election_votelist` (`Id`, `ElectionId`, `ParticipantId`, `VoteUserId`, `AddDate`) VALUES
(3, 4, 31, 3, '2012-11-06 12:23:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`EventId`, `StreamId`, `EventName`, `EventStartTime`, `EventEndTime`, `EventDescription`, `AddDate`, `EditDate`, `IsActive`) VALUES
(10, 1, 'Culfest 2012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '2012-11-03 19:44:55', '0000-00-00 00:00:00', 1);

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
  `EventId` int(11) NOT NULL,
  `EventUserId` int(11) NOT NULL,
  `EventUserType` int(11) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_users`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `feedback`
--


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
(0, 1, '', '', '', '2012-11-01 14:59:02'),
(53, 3, '', '', 'scxnvs', '2012-11-06 11:50:55'),
(53, 2, '', '', 'ajbxdj', '2012-11-06 11:50:50'),
(35, 1, 'maulik', 'sdaq', 'yes..', '2012-11-03 14:17:18'),
(53, 1, '', '', 'hwfdw', '2012-11-06 11:50:47');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `forum_question`
--

INSERT INTO `forum_question` (`id`, `topic`, `detail`, `name`, `email`, `datetime`, `view`, `reply`, `IsActive`) VALUES
(46, 'IS NIRMA GOOD?', 'say yes or no ...', '', '', '2005-11-12 08:48:08', 0, 0, 0),
(53, 'rr', 'sqs', 'admin', '', '2005-11-12 08:56:42', 15, 3, 1),
(52, 'sdd', '', 'admin', '', '2005-11-12 08:55:03', 0, 0, 0),
(51, 'rujit', 'wirh', 'admin', '', '2005-11-12 08:52:17', 0, 0, 0),
(50, 'rujit', 'wirh', 'admin', '', '2005-11-12 08:51:07', 0, 0, 0),
(49, 'rujit', 'wirh', 'admin', '', '2005-11-12 08:50:03', 0, 0, 0),
(48, 'IS NIRMA GOOD?', 'say yes or no ...', 'admin', '', '2005-11-12 08:49:50', 0, 0, 0),
(35, 'IS nirma good?', 'whwhfuwhf', '08DIT201', 'qjeiqj', '2003-11-12 08:46:53', 3, 1, 0),
(47, 'IS NIRMA GOOD?', 'say yes or no ...', 'admin', '', '2005-11-12 08:49:16', 0, 0, 0),
(45, 'IS NIRMA GOOD?', 'say yes or no ...', '', '', '2005-11-12 08:47:39', 0, 0, 0);

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
(7, '<p>\r\n	<span style="color:#d3d3d3;"><span style="font-family: Arial; font-size: 12px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; display: inline !important; float: none; ">From a humble beginning of one Hindi Edition from Bhopal in 1958, group today has grown to become India&#39;s Largest newspaper group.. The group has a strong presence in newspapers, radio, event marketing, printing, short code, internet portal. With its flagship Hindi daily newspaper, Dainik Bhaskar, Gujarati daily, Divya Bhaskar, Marathi dialy Divya Marathi and English daily - DNA, it covers 13 States with 65 editions. In addition to these, it also publishes Business Bhaskar, DB Star and Magazines like Aha! Zindagi, Balbhaskar, Young Bhaskar and Lakshay. The other media businesses includes MY FM (radio channel), 54567 (Short Code), IMCL (internet services). - YAMRAJ PANDYA</span></span></p>\r\n', '2012-11-01 00:51:45', '2012-11-05 18:59:31');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsId`, `NewsSubject`, `NewsDescription`, `StreamId`, `AddUserId`, `AddDate`, `EditDate`, `IsActive`) VALUES
(2, 'Rujit', 'Heelloofoedhfuj', 1, 0, '2012-11-01 19:44:10', '0000-00-00 00:00:00', 1),
(4, 'Presentation is on 7....', 'on 29,30,1', 0, 0, '2012-11-01 19:44:25', '0000-00-00 00:00:00', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `photo_gallery`
--

INSERT INTO `photo_gallery` (`PhotoId`, `AlbumId`, `PhotoName`, `AddUserId`, `AddDate`, `EditDate`, `IsActive`, `extention`, `filename`) VALUES
(2, 1, 'test2', 1, '2012-10-03 21:51:45', '0000-00-00 00:00:00', 1, '', '1.jpg'),
(3, 2, 'test3', 1, '2012-10-27 12:20:54', '0000-00-00 00:00:00', 1, '', '2.jpg'),
(5, 3, 't4', 0, '2012-10-27 12:20:54', '0000-00-00 00:00:00', 1, '', '4.jpg'),
(7, 1, 't6', 0, '2012-10-27 12:20:54', '0000-00-00 00:00:00', 1, '', '6.jpg'),
(8, 1, 't8', 1, '2012-10-03 21:51:45', '0000-00-00 00:00:00', 1, '', '9.jpg'),
(10, 1, 't11', 0, '2012-10-03 21:51:45', '0000-00-00 00:00:00', 1, '', '12.jpg'),
(11, 3, '', 0, '2012-10-27 12:20:54', '0000-00-00 00:00:00', 1, '', '13.jpg'),
(12, 1, '', 0, '2012-10-03 21:51:45', '0000-00-00 00:00:00', 1, '', '14.jpg'),
(13, 1, '', 0, '2012-10-27 12:20:54', '0000-00-00 00:00:00', 1, '', '15.jpg'),
(14, 1, '', 0, '2012-10-03 21:51:45', '0000-00-00 00:00:00', 0, '', '16.jpg'),
(15, 1, '', 0, '2012-10-27 12:20:54', '0000-00-00 00:00:00', 0, '', '17.jpg'),
(16, 0, '', 0, '2012-11-05 20:07:48', '0000-00-00 00:00:00', 1, '', '33.jpg'),
(17, 1, '', 0, '2012-11-05 21:10:21', '0000-00-00 00:00:00', 1, '', 'rr.jpg'),
(18, 1, '', 0, '2012-11-05 21:12:17', '0000-00-00 00:00:00', 1, '', 'xx.jpg'),
(19, 2, '', 0, '2012-11-05 22:31:45', '0000-00-00 00:00:00', 0, '', '2.jpg'),
(20, 4, '', 0, '2012-11-05 22:32:42', '0000-00-00 00:00:00', 1, '', 'm.jpg');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`StreamId`, `StreamName`, `StreamDescription`, `IsActive`, `AddDate`, `EditDate`) VALUES
(31, 'ss', '								', 1, '2012-11-06 02:45:48', NULL),
(30, 'das', '								', 1, '2012-11-06 02:43:42', NULL),
(3, 'RRR', 'ee								', 1, '2012-10-03 22:08:52', NULL),
(23, 'SAIT', 'dwdbwqud								', 1, '2012-11-04 22:51:51', NULL),
(24, 'CESA', 'dwDAdwqdwq													', 1, '2012-11-04 22:53:13', NULL),
(32, 'dqd', '		dqd						', 1, '2012-11-06 07:55:10', NULL),
(26, 'MESSI', 'jndwindfi2																', 1, '2012-11-04 22:55:32', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `stream_subadmin_relation`
--

INSERT INTO `stream_subadmin_relation` (`Id`, `StreamId`, `UserId`, `AddDate`, `EditDate`, `IsActive`) VALUES
(1, 1, 'ss', '2012-10-03 21:51:45', '0000-00-00 00:00:00', 1),
(2, 2, 'yam1', '2012-11-03 07:15:15', '0000-00-00 00:00:00', 1),
(3, 1, 'sub_cesa', '2012-11-03 07:16:05', '0000-00-00 00:00:00', 1),
(4, 2, 'yam123', '2012-11-03 07:17:13', '0000-00-00 00:00:00', 1),
(5, 2, 'yam1234', '2012-11-03 07:19:25', '0000-00-00 00:00:00', 1),
(6, 1, 'd2w', '2012-11-03 07:27:40', '0000-00-00 00:00:00', 3),
(7, 23, 'rr', '2012-11-04 22:57:10', '0000-00-00 00:00:00', 1),
(8, 23, 'rr', '2012-11-05 19:00:13', '0000-00-00 00:00:00', 1),
(9, 31, 'dd', '2012-11-06 02:46:05', '0000-00-00 00:00:00', 1),
(10, 1, 'mp', '2012-11-06 11:21:11', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subevent_master`
--

CREATE TABLE IF NOT EXISTS `subevent_master` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `EventId` int(11) NOT NULL,
  `SubEventName` varchar(100) NOT NULL,
  `Desc` varchar(500) NOT NULL,
  `SEStart` datetime NOT NULL,
  `SEEnd` datetime NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `AddUserId` varchar(10) NOT NULL,
  `AddDate` datetime NOT NULL,
  `EditDate` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `subevent_master`
--

INSERT INTO `subevent_master` (`Id`, `EventId`, `SubEventName`, `Desc`, `SEStart`, `SEEnd`, `IsActive`, `AddUserId`, `AddDate`, `EditDate`) VALUES
(1, 1, 'rr', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 09:15:25', '0000-00-00 00:00:00'),
(2, 0, 'rr2', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 19:01:27', '0000-00-00 00:00:00'),
(3, 0, 'Dance', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 19:08:22', '0000-00-00 00:00:00'),
(4, 0, 'Singing', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 19:08:42', '0000-00-00 00:00:00'),
(5, 0, 'Mime', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 19:08:58', '0000-00-00 00:00:00'),
(6, 0, 'Skit', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 19:09:08', '0000-00-00 00:00:00'),
(7, 0, 'Drama', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 19:09:19', '0000-00-00 00:00:00'),
(8, 0, 'Mimicry', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 19:09:51', '0000-00-00 00:00:00'),
(9, 0, 'Drama', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 19:09:57', '0000-00-00 00:00:00'),
(29, 0, 'rr2', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 22:59:07', '0000-00-00 00:00:00'),
(30, 0, 'rr2', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 22:59:18', '0000-00-00 00:00:00'),
(31, 0, 'rer', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 22:59:33', '0000-00-00 00:00:00'),
(32, 0, 'rr', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 22:59:36', '0000-00-00 00:00:00'),
(33, 0, 'rr', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 23:04:49', '0000-00-00 00:00:00'),
(34, 0, 'rr', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 23:05:07', '0000-00-00 00:00:00'),
(35, 0, 'rr', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 23:08:53', '0000-00-00 00:00:00'),
(36, 0, 'rr2', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 23:08:57', '0000-00-00 00:00:00'),
(37, 0, 'rr3', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-03 23:09:00', '0000-00-00 00:00:00'),
(42, 10, 'gg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '', '2012-11-04 20:00:15', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `UserId`, `Password`, `UserFirstName`, `UserLastName`, `ActivationDate`, `IsActive`, `CreateDate`, `Email`, `Phone`, `UserType`, `EditUserId`, `EditDate`, `ActivationUserId`) VALUES
(1, 'admin', 'rr', 'administrator', 'administrator', '2012-10-06 11:55:29', 1, '0000-00-00 00:00:00', 'rr@gmail.com', '999111119as', 1, 33, '0000-00-00 00:00:00', 0),
(2, 'ss', 'ss', 'sait', 'sait1', '2012-10-06 16:10:37', 1, '0000-00-00 00:00:00', 'rr', '65656', 2, 1, '0000-00-00 00:00:00', 0),
(3, 'sub_cesa', 'sub_cesa', 'cesa1', 'cesa', '2012-10-06 16:10:37', 1, '0000-00-00 00:00:00', 'rr', '444', 2, 2, '0000-00-00 00:00:00', 0),
(4, '08dit201', '99', 'Rujitiyo', 'Raval', '2012-10-28 14:21:19', 1, '0000-00-00 00:00:00', '', '', 4, 0, '0000-00-00 00:00:00', 0),
(31, 'rraval', 'rr', 'Rujit', 'Raval', '2012-11-06 11:18:23', 1, '0000-00-00 00:00:00', 'rr@gma.com', '89999', 4, 0, '0000-00-00 00:00:00', 0),
(32, 'mp', 'mp', 'Maulik', 'Patel', '2012-11-06 11:21:11', 1, '0000-00-00 00:00:00', 'mp@gmail.com', '9999', 4, 0, '0000-00-00 00:00:00', 0);

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

