--
-- Creating the table structure for table `NBL_category`
--

DROP TABLE IF EXISTS `NBL_category`;
CREATE TABLE IF NOT EXISTS `NBL_category` (
  `catID` varchar(6) NOT NULL default '',
  `catDesc` varchar(30) default NULL,
  PRIMARY KEY  (`catID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Insert data for table `NBL_category`
--

INSERT INTO `NBL_category` (`catID`, `catDesc`) VALUES
('PROG', 'Programming'),
('SYSD', 'Systems Design'),
('BUS', 'Business & Commerce'),
('WEBDEV', 'Web Development'),
('DB', 'Databases'),
('DBWEB', 'Databases and Web Development'),
('FICT', 'Fiction'),
('FLEX', 'Flex & Flash Programming'),
('NETW', 'Netorks');

--
-- Creating the table structure for table `NBL_books`
--

DROP TABLE IF EXISTS `NBL_books`;
CREATE TABLE IF NOT EXISTS `NBL_books` (
  `bookISBN` varchar(10) NOT NULL default '',
  `bookTitle` varchar(255) default NULL,
  `bookYear` varchar(4) default NULL,
  `pubID` varchar(6) default NULL,
  `catID` varchar(6) default NULL,
  `bookPrice` decimal(4,2) default NULL,
  PRIMARY KEY  (`bookISBN`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Insert data for table `NBL_books`
--

INSERT INTO `NBL_books` (`bookISBN`, `bookTitle`, `bookYear`, `pubID`, `catID`, `bookPrice`) VALUES
('0072193883', 'Oracle 9i: Web Development (Oracle Press)', '2000', 'OSBMCG', 'DBWEB', 31.81),
('0201708574', 'Database Systems: A Practical Approach to Design, Implementation and Management', '2006', 'ADDWES', 'DB', 34.99),
('0552134635', 'Moving Pictures', '1998', 'CORGI', 'FICT', 5.49),
('0552134651', 'Witches Abroad', '1999', 'CORGI', 'FICT', 5.59),
('0596001207', 'CSS Pocket Reference', '2005', 'OREILL', 'WEBDEV', 5.56),
('059600382X', 'HTML & XHTML: the Definitive Guide', '2001', 'OREILL', 'WEBDEV', 19.95),
('0596004419', 'Oracle SQL*Plus Pocket Reference', '2006', 'OREILL', 'DB', 5.56),
('0672326280', 'Sams Teach Yourself Java in 21 Days', '2006', 'SAMS', 'PROG', 14.49),
('0735619050', 'Visual Basic .NET Step-by-Step', '2007', 'MSPRES', 'PROG', 9.59),
('0764544004', 'Professional VB.NET 2e', '2006', 'WROX', 'PROG', 21.99),
('0886313197', 'Oracle PL/SQL Programming, 5th Edition', '2009', 'MSPRES', 'DB', 20.00),
('1012654901', 'The Data Warehouse Toolkit: The Complete Guide to Dimensional Modeling', '2004', 'MSPRES', 'DB', 20.00),
('1086146848', 'Asterisk: The Future of Telephony, 2nd Edition', '2007', 'MSPRES', 'PROG', 20.00),
('1098557004', 'Java in a nutshell (5th ed)', '2005', 'MSPRES', 'PROG', 20.00),
('1128483837', 'Programming ASP.NET 3.5 (4th edition)', '2008', 'MSPRES', 'WEBDEV', 20.00),
('1151138597', 'Understanding TCP/IP', '2008', 'OREILL', 'NETW', 24.99),
('1202902579', 'Head First Servlets and JSP, 2nd Edition', '2008', 'MSPRES', 'PROG', 20.00),
('1202959077', 'Visual modelling with IBM rational software architecture and UML', '2009', 'MSPRES', 'PROG', 20.00),
('1215671513', 'Ajax Design Patterns', '2006', 'SAMS', 'WEBDEV', 20.00),
('1234850781', 'XHML & Web 2', '2009', 'SAMS', 'WEBDEV', 14.95),
('1257055523', 'Java for programmers', '2009', 'MSPRES', 'PROG', 20.00),
('1270878867', 'XSLT 2.0 Web Development', '2004', 'SAMS', 'WEBDEV', 20.00),
('1294275728', 'Selling online with Drupal e-commerce', '2008', 'OREILL', 'WEBDEV', 20.00),
('1359569013', 'Patterns of Enterprise Application Architecture', '2002', 'SAMS', 'PROG', 20.00),
('1388747028', 'Solid Code: Optimizing the Software Development Life Cycle', '2009', 'MSPRES', 'PROG', 20.00),
('1442484806', 'Cisco IOS in a nutshell (2nd edition)', '2005', 'MSPRES', 'NETW', 20.00),
('1448011389', 'HTML, XHTML, & CSS, Sixth Edition: Visual QuickStart Guide', '2006', 'MSPRES', 'WEBDEV', 20.00),
('1454938470', 'PHP 5 unleashed', '2004', 'MSPRES', 'WEBDEV', 20.00),
('1462974720', 'Ajax: the definitive guide', '2008', 'OREILL', 'WEBDEV', 20.00),
('1506341574', 'PHP for Professionals', '2008', 'SAMS', 'DBWEB', 35.75),
('1535076269', 'Head first PMP : a brain-friendly guide to passing the Project Management Professional Exam(2nd ed)', '2009', 'MSPRES', 'BUS', 20.00),
('1559510187', 'Programming in objective C 2.0 (2nd ed)', '2003', 'MSPRES', 'PROG', 20.00),
('1565926102', 'Programming PHP', '2006', 'OREILL', 'WEBDEV', 19.95),
('1565926919', 'Building Oracle XML Applications', '2004', 'OREILL', 'DBWEB', 22.36),
('1565926920', 'Visual Basic 6 Professional Step-by-Step', '2006', 'MSPRES', 'PROG', 20.99),
('1565928628', 'HTTP Pocket Reference', '2004', 'OREILL', 'WEBDEV', 5.56),
('1590592433', 'Expert One-to-one Oracle', '2007', 'APRES', 'DB', 24.74),
('1691648973', 'Javascript Frameworks', '2009', 'OREILL', 'PROG', 18.00),
('1716457298', 'jQuery in action', '2007', 'OREILL', 'WEBDEV', 20.00),
('1762728680', 'YUI - Yahoo Javascript', '2009', 'MSPRES', 'WEBDEV', 19.99),
('1791402332', 'JavaScript : the definitive guide (5th ed)', '2006', 'MSPRES', 'WEBDEV', 20.00),
('186100172X', 'Beginning Visual Basic 6 Objects', '1998', 'WROX', 'PROG', 20.29),
('1884680365', 'Enterprise Application Development with Flex', '2008', 'SAMS', 'PROG', 20.00),
('1886313197', 'ActionScript for multiplayer games and virtual worlds', '2009', 'MSPRES', 'PROG', 20.00),
('1903337089', 'Databases (Computing Study Texts)', '2007', 'CRUCIA', 'DB', 12.00),
('1954694274', 'XSL-FO', '2002', 'SAMS', 'PROG', 20.00),
('1957187241', 'The Definitive Guide to Project Management: The fast track to getting the job done on time and on budget, 2nd edition 2008', '2008', 'MSPRES', 'BUS', 20.00),
('1969335814', 'ActionScript 3.0 Game Programming University', '2007', 'SAMS', 'PROG', 20.00),
('2027743377', 'Microsoft Office 2007 for Windows: Visual QuickStart Guide', '2007', 'MSPRES', 'BUS', 20.00),
('2122290991', 'Sams teach yourself java 6 in 21 days', '2007', 'MSPRES', 'PROG', 20.00),
('2290216917', 'XPath and XML', '2008', 'OREILL', 'DBWEB', 24.95),
('2372100748', 'Programming in C (3rd edition)', '2004', 'OREILL', 'PROG', 20.00),
('2386313197', 'Photoshop CS4 (Visual quickpro guide) vol2', '2009', 'MSPRES', 'WEBDEV', 20.00),
('2486313197', 'Photoshop CS4 (Visual quickpro guide) vol1', '2008', 'MSPRES', 'WEBDEV', 20.00),
('2586313197', 'Pro Drupal Development, Second Edition', '2008', 'OREILL', 'WEBDEV', 20.00),
('2686313197', 'Adobe AIR (Adobe Integrated Runtime) with Ajax: Visual QuickPro Guide', '2008', 'SAMS', 'FLEX', 20.00),
('2694134112', 'Advanced ActionScript 3 with Design Patterns', '2006', 'SAMS', 'FLEX', 20.00),
('2786313197', 'Web Accessibility: Web Standards and Regulatory Compliance', '2006', 'MSPRES', 'WEBDEV', 20.00),
('2886313197', 'CSS anthology', '2007', 'OREILL', 'WEBDEV', 20.00),
('3343877469', 'Ajax with PHP 5', '2007', 'SAMS', 'WEBDEV', 20.00),
('3440712688', 'Using Drupral', '2008', 'OREILL', 'BUS', 20.00),
('4086039351', 'PHP and Smarty on Large-Scale Web Development', '2007', 'SAMS', 'WEBDEV', 20.00),
('4816425101', 'FlexBuilder with AMFPHP', '2009', 'SAMS', 'FLEX', 24.95),
('4886313197', 'Dreamweaver CS3 for windows and macintosh', '2007', 'MSPRES', 'WEBDEV', 20.00),
('5063610941', 'Actionscript with PHP', '2006', 'SAMS', 'FLEX', 20.00),
('5161992541', 'Beginning iPhone Development Exploring the iPhone SDK', '2008', 'MSPRES', 'PROG', 20.00),
('5631651361', 'Project Managing Software', '2005', 'MSPRES', 'BUS', 34.75),
('5886313197', 'A GUIDE TO THE PROJECT MANAGEMENT BODY OF KNOWLEDGE', '2008', 'MSPRES', 'BUS', 20.00),
('6698738241', 'UML distilled (3rd ed)', '2003', 'MSPRES', 'PROG', 20.00),
('6852120569', 'Building Web Applications with UML Second Edition', '2002', 'SAMS', 'PROG', 20.00),
('6893500798', 'Unix Not GNU', '2004', 'OREILL', 'PROG', 15.75),
('7598368395', 'UML and Agile Development', '2009', 'SAMS', 'PROG', 28.90),
('7886313197', 'A Practical Guide to Linux Commands, Editors, and Shell Programming', '2005', 'SAMS', 'PROG', 20.00),
('8406317316', 'Adobe Dreamweaver CS3 How-tos : 100 essential techniques', '2007', 'MSPRES', 'WEBDEV', 20.00),
('8886313197', 'A Practical Guide to Ubuntu Linux', '2007', 'SAMS', 'PROG', 20.00),
('9265601531', 'OO Design & Development', '2010', 'OREILL', 'PROG', 35.90),
('9744122522', 'Object-Oriented PHP', '2006', 'SAMS', 'WEBDEV', 20.00),
('9886313197', 'The Web Application Hacker''s Handbook: Discovering and Exploiting Security Flaws', '2002', 'OREILL', 'WEBDEV', 20.00);

--
-- Creating the table structure for table `NBL_publisher`
--

DROP TABLE IF EXISTS `NBL_publisher`;
CREATE TABLE IF NOT EXISTS `NBL_publisher` (
  `pubID` varchar(6) NOT NULL default '',
  `pubName` varchar(40) default NULL,
  `location` varchar(30) default NULL,
  PRIMARY KEY (`pubID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Insert data for table `NBL_publisher`
--

INSERT INTO `NBL_publisher` (`pubID`, `pubName`, `location`) VALUES
('ADDWES', 'Addison Wesley', 'UK'),
('OSBMCG', 'Osborne McGraw-Hill', 'USA'),
('SAMS', 'Sams', 'USA'),
('WROX', 'Wrox', 'USA'),
('APRES', 'Apress', 'USA'),
('CORGI', 'Corgi', 'UK'),
('CRUCIA', 'Crucial', 'UK'),
('MSPRES', 'Microsoft Press International', 'USA'),
('OREILL', 'OReilly', 'UK');

--
-- Creating the table structure for table `NBL_users`
--

DROP TABLE IF EXISTS `NBL_users`;
CREATE TABLE IF NOT EXISTS `NBL_users` (
  `userID` int(11) NOT NULL auto_increment,
  `firstname` varchar(255) default NULL,
  `surname` varchar(255) default NULL,
  `username` varchar(50) NOT NULL,
  `passwordHash` varchar(255) NOT NULL,
  PRIMARY KEY  (`userID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Inserting data for table `NBL_users`
--

INSERT INTO `NBL_users` (`userID`, `firstname`, `surname`, `username`, `passwordHash`) VALUES
(1, 'Allison', 'Smith', 'admin1234', '$2y$10$241VguAQ6fD12z38.FQ/bul3NU8yYoIXPQSbeN6lU5nSlyJsLVjgG'),
(2, 'Mark', 'Jones', 'admin1235', '$2y$10$zbGZjS/gjvWLUjdlhKihx.rMzqaZ7ZSCGj3Maakb7Uxz43327Ag8.');










