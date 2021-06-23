-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
--
-- Table structure for table `NBL_special_offers`
--

CREATE TABLE IF NOT EXISTS `NBL_special_offers` (
  `bookISBN` varchar(10) NOT NULL DEFAULT '',
  `bookTitle` varchar(255) DEFAULT NULL,
  `bookYear` varchar(4) DEFAULT NULL,
  `pubID` varchar(6) DEFAULT NULL,
  `catID` varchar(6) DEFAULT NULL,
  `bookPrice` decimal(4,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `NBL_special_offers`
--

INSERT INTO `NBL_special_offers` (`bookISBN`, `bookTitle`, `bookYear`, `pubID`, `catID`, `bookPrice`) VALUES
('0596004419', 'Oracle SQL*Plus Pocket Reference', '2006', 'OREILL', 'DB', '4.56'),
('1462974720', 'Ajax: the definitive guide', '2008', 'OREILL', 'WEBDEV', '12.00'),
('1506341574', 'PHP for Professionals', '2008', 'SAMS', 'DBWEB', '25.75'),
('1535076269', 'Head first PMP : a brain-friendly guide to passing the Project Management Professional Exam(2nd ed)', '2009', 'MSPRES', 'BUS', '20.00'),
('1762728680', 'YUI - Yahoo Javascript', '2009', 'MSPRES', 'WEBDEV', '9.99'),
('1884680365', 'Enterprise Application Development with Flex', '2008', 'SAMS', 'PROG', '10.00'),
('1886313197', 'ActionScript for multiplayer games and virtual worlds', '2009', 'MSPRES', 'PROG', '14.00'),
('1903337089', 'Databases (Computing Study Texts)', '2007', 'CRUCIA', 'DB', '9.00'),
('1954694274', 'XSL-FO', '2002', 'SAMS', 'PROG', '99.99'),
('1957187241', 'The Definitive Guide to Project Management: The fast track to getting the job done on time and on budget, 2nd edition 2008', '2008', 'MSPRES', 'BUS', '12.00'),
('1969335814', 'ActionScript 3.0 Game Programming University', '2007', 'SAMS', 'PROG', '15.00'),
('2027743377', 'Microsoft Office 2007 for Windows: Visual QuickStart Guide', '2007', 'MSPRES', 'BUS', '10.00'),
('2122290991', 'Sams teach yourself java 6 in 21 days', '2007', 'MSPRES', 'PROG', '12.00'),
('2290216917', 'XPath and XML', '2008', 'OREILL', 'DBWEB', '20.95'),
('2372100748', 'Programming in C (3rd edition)', '2004', 'OREILL', 'PROG', '15.00'),
('2586313197', 'Pro Drupal Development, Second Edition', '2008', 'OREILL', 'WEBDEV', '16.00'),
('3343877469', 'Ajax with PHP 5', '2007', 'SAMS', 'WEBDEV', '12.00'),
('3440712688', 'Using Drupral', '2008', 'OREILL', 'BUS', '14.00'),
('4816425101', 'FlexBuilder with AMFPHP', '2009', 'SAMS', 'FLEX', '20.95'),
('4886313197', 'Dreamweaver CS3 for windows and macintosh', '2007', 'MSPRES', 'WEBDEV', '20.00'),
('5063610941', 'Actionscript with PHP', '2006', 'SAMS', 'FLEX', '15.00'),
('5161992541', 'Beginning iPhone Development Exploring the iPhone SDK', '2008', 'MSPRES', 'PROG', '15.00');

