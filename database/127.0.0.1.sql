-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2016 at 05:49 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ucare`
--
CREATE DATABASE `ucare` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ucare`;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `org_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `org_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `org_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `org_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`org_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `user_id`, `org_name`, `org_image`, `org_description`, `created_date`) VALUES
(1, 2, 'Red Cross', '', 'Red Cross', '2016-08-06 17:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `purpose`
--

CREATE TABLE IF NOT EXISTS `purpose` (
  `purpose_id` int(5) NOT NULL AUTO_INCREMENT,
  `org_id` int(5) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purpose_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `long_lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_date` datetime NOT NULL,
  `funds` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `url_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isEnable` int(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`purpose_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `purpose`
--

INSERT INTO `purpose` (`purpose_id`, `org_id`, `name`, `purpose_image`, `long_lat`, `type`, `delivery_date`, `funds`, `description`, `url_name`, `isEnable`, `created_date`) VALUES
(8, 1, 'Earthquake in bohol test', 'assets/image/purpose_image/2764557a66794a3264.jpg', '10.315699:123.885437', 'Fire', '2016-08-30 00:00:00', '', 'Help Build typhoon victims hello world', 'earthquake-in-bohol-test', 1, '2016-08-06 22:41:24'),
(11, 1, 'walay tugpahay * 101', 'assets/image/purpose_image/232657a6673415b55.jpeg', '10.315699:123.885437', 'Fire', '2016-08-30 00:00:00', '', 'Help Build typhoon victims', 'walay-tugpahay--101', 1, '2016-08-06 22:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `purpose_id` int(5) NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `isUnknown` int(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `purpose_id`, `amount`, `message`, `isUnknown`, `created_date`) VALUES
(1, 1, 8, '20000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\nWhy do we use it?\n\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n', 0, '2016-08-07 03:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE IF NOT EXISTS `updates` (
  `update_id` int(5) NOT NULL AUTO_INCREMENT,
  `purpose_id` int(5) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`update_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`update_id`, `purpose_id`, `description`, `image`, `posted_date`) VALUES
(1, 0, 'dfghdghdgfhg dfghd', '', '2016-08-06 16:00:00'),
(2, 0, 'asafdsf', '', '2016-08-06 16:00:00'),
(3, 0, 'Lorem ipsum sinta buko ng papaya!Lorem ipsum sinta buko ng papaya!Lorem ipsum sinta buko ng papaya!Lorem ipsum sinta buko ng papaya!Lorem ipsum sinta buko ng papaya!Lorem ipsum sinta buko ng papaya!Lorem ipsum sinta buko ng papaya!Lorem ipsum sinta buko ng papaya!', '', '2016-08-07 03:25:14'),
(4, 8, 'purpose_img_idpurpose_img_idpurpose_img_idpurpose_img_idpurpose_img_idpurpose_img_idpurpose_img_idpurpose_img_idpurpose_img_idpurpose_img_idpurpose_img_idpurpose_img_idpurpose_img_idpurpose_img_idpurpose_img_id', '', '2016-08-07 03:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `lastname`, `firstname`, `user_type`) VALUES
(1, 'umbay.cm@gmail.com', 'abcd1234', 'Umbay', 'Carlo Marx', 'superadmin'),
(2, 'billy@gmail.com', 'asdfg', 'Pilapil', 'Billy Cris', 'superadmin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
