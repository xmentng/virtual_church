-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2012 at 04:17 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tutoriali`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments_tutor`
--

CREATE TABLE IF NOT EXISTS `comments_tutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `facebook_posting`
--

CREATE TABLE IF NOT EXISTS `facebook_posting` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `post` varchar(255) NOT NULL,
  `f_image` varchar(50) NOT NULL,
  `date-created` datetime NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `facebook_posts`
--

CREATE TABLE IF NOT EXISTS `facebook_posts` (
  `p_id` int(30) NOT NULL AUTO_INCREMENT,
  `TimeSpent` varchar(200) NOT NULL,
  `post` text NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `date_created` varchar(200) NOT NULL,
  `userip` varchar(200) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `facebook_posts`
--

INSERT INTO `facebook_posts` (`p_id`, `TimeSpent`, `post`, `f_name`, `date_created`, `userip`, `user_id`) VALUES
(8, '', 'hi', '99Points', '1334844981', '::1', ''),
(7, '', 'ben', '99Points', '1334842935', '::1', ''),
(6, '', 'kjsks', '99Points', '1334842815', '::1', '');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_posts_comments`
--

CREATE TABLE IF NOT EXISTS `facebook_posts_comments` (
  `c_id` int(200) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(200) NOT NULL,
  `CommentTimeSpent` varchar(200) NOT NULL,
  `comments` text NOT NULL,
  `date_created` varchar(200) NOT NULL,
  `userip` varchar(200) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `facebook_posts_comments`
--

INSERT INTO `facebook_posts_comments` (`c_id`, `post_id`, `CommentTimeSpent`, `comments`, `date_created`, `userip`) VALUES
(2, '1', '', 'hp', '1177544467', '::1'),
(3, '2', '', 'biooo', '1317384150', '::1'),
(4, '2', '', 'uuuu', '1317384159', '::1'),
(5, '1', '', 'tu', '1317392051', '::1'),
(6, '2', '', 'ben', '1325973070', '127.0.0.1'),
(7, '2', '', 'come fi', '1325973189', '127.0.0.1'),
(8, '2', '', 'hiojoo', '1325973868', '127.0.0.1'),
(9, '2', '', 'hhahahah', '1325973882', '127.0.0.1'),
(10, '1', '', 'jkl;', '1326704051', '127.0.0.1'),
(11, '3', '', 'hi', '1326723642', '127.0.0.1'),
(12, '7', '', 'jsjsjsj', '1334842978', '::1'),
(13, '7', '', 'jsjss', '1334842991', '::1'),
(14, '6', '', 'sjmsjskjsk', '1334843014', '::1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
