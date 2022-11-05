-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2013 at 06:39 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wpesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `completed`
--

CREATE TABLE IF NOT EXISTS `completed` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `payer_num` varchar(20) NOT NULL,
  `trans_code` varchar(15) NOT NULL,
  `amount_paid` float NOT NULL,
  `time_paid` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `completed`
--

INSERT INTO `completed` (`id`, `payer_num`, `trans_code`, `amount_paid`, `time_paid`) VALUES
(10, '+254725896684', 'DE98JK404', 1000, '02:00:57 AM'),
(9, '+254725896684', 'DE98KV404', 1000, '01:58:06 AM'),
(11, '+254725896684', 'DE98KV404', 1000, '02:02:26 AM'),
(12, '+254725896684', 'DE98KV404', 1000, '02:02:34 AM'),
(13, '+254725896684', 'DE98KV404', 1000, '02:09:48 AM'),
(14, '+254725896684', 'DE98JK404', 1000, '18:12:21 PM'),
(15, '+254725896684', 'DE98KV404', 1000, '12:13:33 PM'),
(16, '+254722492208', 'DC97IW484', 1030, '15:59:28 PM');

-- --------------------------------------------------------

--
-- Table structure for table `new_payments`
--

CREATE TABLE IF NOT EXISTS `new_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `trans_code` varchar(15) NOT NULL,
  `payer_name` varchar(50) NOT NULL,
  `payer_number` varchar(20) NOT NULL,
  `amount_paid` float NOT NULL,
  `raw_text` text NOT NULL,
  `time_paid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `new_payments`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
