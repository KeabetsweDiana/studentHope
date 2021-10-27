-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2021 at 09:08 PM
-- Server version: 10.2.37-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studegix_tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `name`, `surname`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin@tutor.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `Module` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`Module`) VALUES
('DSO17AT'),
('DSO17BT'),
('TPG201T'),
('DSO23BT'),
('SSF24AT'),
('SSF24BT'),
('ISY32AT'),
('DSO34AT'),
('ISY34BT'),
('DSO34BT'),
('CFS10AT'),
('CGS10AT '),
('CMK10AT'),
('CFS10BT'),
('CGS10BT '),
('CMK10BT'),
('DSO23AT'),
('ISY23AT '),
('TPG111T'),
('IDC30AT '),
('ISY34AT ');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notID` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `article` varchar(2000) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notID`, `topic`, `article`, `img`, `date`) VALUES
(1, 'Student', '', 'images/students-using-laptop-together-outdoors-royalty-free-image-1571774615.jpg', '2121-03-19'),
(2, 'test1', '<p>gfd</p>', 'images/Capture.PNG', '2121-03-19'),
(3, 'test 2', '<p>jfhskjsdh</p>', 'images/Capture1.PNG', '2121-03-19'),
(4, 'test 3', '<p>&nbsp;hhj</p>', 'images/number validation.PNG', '2121-03-19'),
(5, 'test 4', '<p>ghfhfhgfgh</p>', 'images/WhatsApp Image 2020-11-09 at 8.56.00 PM_LI.jpg', '2121-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sessionID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `cellNumber` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `sessionType` varchar(255) NOT NULL,
  `tutor` varchar(255) NOT NULL,
  `stdNum` varchar(255) NOT NULL,
  `Topic` varchar(255) NOT NULL,
  `bookedDate` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sessionID`, `name`, `surname`, `cellNumber`, `module`, `time`, `date`, `sessionType`, `tutor`, `stdNum`, `Topic`, `bookedDate`, `status`, `url`) VALUES
(86, 'Simphiwe', 'Mthanti', '0724283941', 'SSF24BT', '16', '2021-03-08', 'GROUP', 'N/A', '216599390', 'Routing Protocol Unit1', '2021-03-06', 'CANCELLED', 'N/A'),
(91, 'Jansen', 'Mundlovu', '0793647155', 'DSO17AT', '09', '2021-03-10', 'GROUP', ' Cebolihle', '216921542', 'Basic Programming Unit1', '2021-03-06', 'ACCEPTED', 'sddsddsdsdgffgfgfgf'),
(93, 'Simphiwe', 'Mthanti', '0724283941', 'DSO17BT', '12', '2021-03-13', 'GROUP', 'N/A', '216599390', 'Function Unit1', '2021-03-06', 'CANCELLED', 'N/A'),
(99, 'Simphiwe', 'Mthanti', '0724283941', 'DSO17BT', '16', '2021-03-07', 'INDIVIDUAL', 'N/A', '216599390', 'Function Unit1', '2021-03-06', 'CANCELLED', 'N/A'),
(107, 'Thabo', 'mnisi', '0653572171', 'DSO17AT', '09', '2021-03-18', 'INDIVIDUAL', 'Thabomnisi', '216448154', 'Basic Programming Unit1', '2021-03-08', 'ACCEPTED', 'jalli'),
(108, 'Thabo', 'mnisi', '0653572171', 'DSO17AT', '12', '2021-03-18', 'INDIVIDUAL', ' jali', '216448154', 'Basic Programming Unit1', '2021-03-08', 'ACCEPTED', 'https://www.youtube.com/'),
(109, 'Thabo', 'mnisi', '0653572171', 'DSO17AT', '09', '2021-03-10', 'GROUP', 'N/A', '216448154', 'Basic Programming Unit1', '2021-03-08', 'CANCELLED', 'N/A'),
(110, 'jali', 'mnisi', '0653572172', 'DSO17BT', '12', '2021-03-11', 'INDIVIDUAL', 'N/A', '216448154', 'Function Unit1', '2021-03-10', 'CANCELLED', 'N/A'),
(111, '', 'mnisi', '0653572172', 'DSO17BT', '09', '2021-03-26', 'INDIVIDUAL', ' Simphiwe', '216448154', 'Function Unit1', '2021-03-10', 'ACCEPTED', 'Hghgg'),
(112, 'Simphiwe', 'Mthanti', '0724283941', 'TPG201T', '16', '2021-03-11', 'INDIVIDUAL', 'N/A', '216599390', 'Database Unit1', '2021-03-10', 'CANCELLED', 'N/A'),
(113, 'Simphiwe', 'Mthanti', '0724283941', 'DSO17BT', '12', '2022-04-11', 'INDIVIDUAL', ' jali', '216599390', 'Function Unit1', '2021-03-11', 'ACCEPTED', 'https://www.youtube.com/'),
(114, 'Simphiwe', 'Mthanti', '0724283941', 'DSO17AT', '12', '2021-03-12', 'GROUP', 'N/A', '216599390', 'Basic Programming Unit1', '2021-03-11', 'CANCELLED', 'N/A'),
(115, 'Chailock', 'Maseko', '0735135428', 'SSF24AT', '12', '2021-03-17', 'GROUP', ' ', '213564870', 'Manage Groups Unit1', '2021-03-13', 'ACCEPTED', 'Ggvggvvvj vxhkcthdtf'),
(116, 'jali', 'mnisi', '0653572172', 'DSO17AT', '09', '2021-03-16', 'GROUP', ' jali', '216448155', 'Basic Programming Unit1', '2021-03-15', 'ACCEPTED', 'https://outlook.office.com/mail/inbox'),
(118, 'ismael', 'mours', '0730662618', 'DSO17AT', '12', '2021-03-17', 'INDIVIDUAL', 'N/A', '218242421', 'Basic Programming Unit1', '2021-03-16', 'CANCELLED', 'N/A'),
(119, 'Siya', 'Gumede', '0647707188', 'DSO17BT', '12', '2021-03-17', 'GROUP', ' Simphiwe', '216843818', 'Function Unit1', '2021-03-16', 'ACCEPTED', 'Gvvvvvvhhbb'),
(120, 'simphiwe', 'mthanti', '0724283941', 'DSO17AT', '16', '2021-03-17', 'GROUP', 'N/A', '216599390', 'Basic Programming Unit1', '2021-03-16', 'CANCELLED', 'N/A'),
(121, 'simphiwe', 'mthanti', '0724283941', 'DSO17BT', '16', '2021-03-18', 'INDIVIDUAL', 'N/A', '216599390', 'Function Unit1', '2021-03-16', 'CANCELLED', 'N/A'),
(122, 'simphiwe', 'mthanti', '0724283941', 'DSO17BT', '12', '2021-03-19', 'INDIVIDUAL', ' Siya', '216599390', 'Function Unit1', '2021-03-16', 'ACCEPTED', 'https://www.flashscore24.co.za/'),
(123, 'simphiwe', 'mthanti', '0724283941', 'SSF24AT', '16', '2021-03-18', 'GROUP', 'N/A', '216599390', 'Manage Groups Unit1', '2021-03-16', 'CANCELLED', 'N/A'),
(125, 'simphiwe', 'mthanti', '0724283941', 'DSO17BT', '09', '2021-03-18', 'INDIVIDUAL', 'N/A', '216599390', 'Function Unit1', '2021-03-17', 'CANCELLED', 'N/A'),
(126, 'simphiwe', 'mthanti', '0724283941', 'DSO17AT', '12', '2021-03-27', 'GROUP', ' simphiwe', '216599390', 'concepts and arithmetic', '2021-03-19', 'ACCEPTED', 'https://teams.microsoft.com/dl/launcher/launcher.html?url=%2F_%23%2Fl%2Fmeetup-join%2F19%3Ameeting_NGEwNTkwNzItNzQ0My00ZDdjLTg0ZDAtYmI2YTc4YmQ5NzQ0%40thread.v2%2F0%3Fcontext%3D%257b%2522Tid%2522%253a%25223df74539-9453-4d03-bb9d-b9102cb9ce9c%2522%252c%2522'),
(127, 'ismael', 'mours', '0730662618', 'DSO17AT', '09', '2021-03-21', 'GROUP', ' simphiwe', '218242421', 'concepts and arithmetic', '2021-03-20', 'ACCEPTED', 'https://teams.microsoft.com/l/meetup-join/19%3ameeting_NGEwNTkwNzItNzQ0My00ZDdjLTg0ZDAtYmI2YTc4YmQ5NzQ0%40thread.v2/0?context=%7b%22Tid%22%3a%223df74539-9453-4d03-bb9d-b9102cb9ce9c%22%2c%22Oid%22%3a%22dfbc32cf-4c6f-4689-963d-1f9bbefc9b64%22%7d'),
(128, 'simphiwe', 'mthanti', '0724283941', 'DSO17AT', '09', '2021-03-21', 'GROUP', ' simphiwe', '216599390', 'concepts and arithmetic', '2021-03-20', 'ACCEPTED', 'https://teams.microsoft.com/l/meetup-join/19%3ameeting_NGEwNTkwNzItNzQ0My00ZDdjLTg0ZDAtYmI2YTc4YmQ5NzQ0%40thread.v2/0?context=%7b%22Tid%22%3a%223df74539-9453-4d03-bb9d-b9102cb9ce9c%22%2c%22Oid%22%3a%22dfbc32cf-4c6f-4689-963d-1f9bbefc9b64%22%7d'),
(129, 'Michael', 'Malandule', '0725335234', 'DSO17AT', '09', '2021-03-23', 'GROUP', ' Michael', '215450147', 'concepts and arithmetic', '2021-03-20', 'ACCEPTED', 'Dhdjfhejdjdd'),
(131, 'Chailock', 'Maseko', '0735135428', 'DSO17AT', '12', '2021-03-26', 'GROUP', ' simphiwe', '213564870', 'concepts and arithmetic', '2021-03-20', 'ACCEPTED', 'https://teams.microsoft.com/l/meetup-join/19%3ameeting_NGEwNTkwNzItNzQ0My00ZDdjLTg0ZDAtYmI2YTc4YmQ5NzQ0%40thread.v2/0?context=%7b%22Tid%22%3a%223df74539-9453-4d03-bb9d-b9102cb9ce9c%22%2c%22Oid%22%3a%22dfbc32cf-4c6f-4689-963d-1f9bbefc9b64%22%7d'),
(132, 'Chailock', 'Maseko', '0735135428', 'DSO17AT', '12', '2021-03-25', 'INDIVIDUAL', ' simphiwe', '213564870', 'concepts and arithmetic', '2021-03-20', 'ACCEPTED', 'https://teams.microsoft.com/l/meetup-join/19%3ameeting_NGEwNTkwNzItNzQ0My00ZDdjLTg0ZDAtYmI2YTc4YmQ5NzQ0%40thread.v2/0?context=%7b%22Tid%22%3a%223df74539-9453-4d03-bb9d-b9102cb9ce9c%22%2c%22Oid%22%3a%22dfbc32cf-4c6f-4689-963d-1f9bbefc9b64%22%7d'),
(133, 'Jansen', 'Mundlovu', '0614612717', 'DSO17AT', '16', '2021-03-21', 'INDIVIDUAL', ' simphiwe', '216921542', 'concepts and arithmetic', '2021-03-20', 'ACCEPTED', 'https://teams.microsoft.com/l/meetup-join/19%3ameeting_NGEwNTkwNzItNzQ0My00ZDdjLTg0ZDAtYmI2YTc4YmQ5NzQ0%40thread.v2/0?context=%7b%22Tid%22%3a%223df74539-9453-4d03-bb9d-b9102cb9ce9c%22%2c%22Oid%22%3a%22dfbc32cf-4c6f-4689-963d-1f9bbefc9b64%22%7d'),
(134, '', '', '', 'DSO17AT', '16', '2021-03-21', 'INDIVIDUAL', 'N/A', '', 'concepts and arithmetic', '2021-03-20', 'CANCELLED', 'N/A'),
(135, 'Michael', 'Malandule', '0725335234', 'TPG201T', '09', '2021-03-23', 'INDIVIDUAL', ' simphiwe', '215450147', 'Advanced OOP', '2021-03-22', 'ACCEPTED', 'https://www.google.com/search?q=ms+teams+download+windows+10&rlz=1C1CHBD_enZA945ZA945&oq=ms&aqs=chrome.0.69i59j69i57j0i131i433j0j0i131i433j0i433j0j46i131i433j46i433j0i433.2999j0j7&sourceid=chrome&ie=UTF-8'),
(136, 'Jali', 'Mnisi', '0653572171', 'DSO17AT', '16', '2021-03-22', 'INDIVIDUAL', '', '216448154', ' selection and  iteration control structures', '2021-03-22', 'ACCEPTED', 'meet.google.com/qsz-odhu-kax'),
(137, 'simphiwe', 'mthanti', '0724283941', 'DSO17AT', '12', '2021-03-23', 'INDIVIDUAL', ' Michael', '216599390', ' selection and  iteration control structures', '2021-03-22', 'ACCEPTED', 'Fkfmfjcmfjdxj'),
(138, 'simphiwe', 'mthanti', '0724283941', 'DSO17AT', '16', '2021-03-24', 'GROUP', ' Michael', '216599390', 'concepts and arithmetic', '2021-03-22', 'ACCEPTED', 'Ixjdyhxydydhh6'),
(141, 'Jali', 'Mnisi', '0653572171', 'DSO17AT', '15', '2021-03-22', 'INDIVIDUAL', '', '216448154', ' selection and  iteration control structures', '2021-03-22', 'ACCEPTED', 'https://www.google.com/search?q=ms+teams+download+windows+10&rlz=1C1CHBD_enZA945ZA945&oq=ms&aqs=chrome.0.69i59j69i57j0i131i433j0j0i131i433j0i433j0j46i131i433j46i433j0i433.2999j0j7&sourceid=chrome&ie=UTF-8'),
(142, 'Michael', 'Malandule', '0725335234', 'TPG201T', '16', '2021-03-23', 'INDIVIDUAL', ' Chailock', '215450147', 'Advanced OOP', '2021-03-22', 'ACCEPTED', 'dfghtrfhj'),
(143, 'Jali', 'Mnisi', '0653572171', 'DSO17AT', '09', '2021-03-26', 'INDIVIDUAL', ' Michael', '216448154', ' selection and  iteration control structures', '2021-03-22', 'ACCEPTED', 'drgdgfhjcgfhfhdrg'),
(144, 'Michael', 'Malandule', '0725335234', 'TPG201T', '12', '2021-03-23', 'INDIVIDUAL', ' Simphiwe', '215450147', 'Relational database application', '2021-03-22', 'ACCEPTED', 'https://www.youtube.com/watch?v=9ayDyr8h12s'),
(145, 'Chailock', 'Maseko', '0735135428', 'DSO17BT', '12', '2021-03-23', 'INDIVIDUAL', ' Michael', '213564870', 'one-dimensional arrays', '2021-03-22', 'ACCEPTED', 'ffghfjgjgkjkjk'),
(146, 'Michael', 'Malandule', '0725335234', 'DSO17AT', '09', '2021-03-27', 'INDIVIDUAL', ' Simphiwe', '215450147', ' selection and  iteration control structures', '2021-03-22', 'ACCEPTED', 'https://www.youtube.com/watch?v=9ayDyr8h12s'),
(147, 'Michael', 'Malandule', '0725335234', 'DSO17AT', '16', '2021-03-26', 'INDIVIDUAL', '', '215450147', ' selection and  iteration control structures', '2021-03-22', 'PENDING', ''),
(148, 'Michael', 'Malandule', '0725335234', 'DSO17AT', '12', '2021-03-24', 'INDIVIDUAL', '', '215450147', ' selection and  iteration control structures', '2021-03-22', 'PENDING', ''),
(149, 'Jali', 'Mnisi', '0653572171', 'DSO17BT', '09', '2021-03-26', 'GROUP', '', '216448154', 'functions and sub-procedures', '2021-03-22', 'PENDING', ''),
(150, 'admin', 'Mnisi', '0653572171', 'DSO17AT', '09', '2021-03-31', 'INDIVIDUAL', '', '216448154', ' selection and  iteration control structures', '2021-03-22', 'PENDING', ''),
(151, 'Simphiwe', 'Mthanti', '0724283941', 'DSO17BT', '16', '2021-03-23', 'INDIVIDUAL', '', '216599390', 'one-dimensional arrays', '2021-03-22', 'PENDING', ''),
(152, 'Simphiwe', 'Mthanti', '0724283941', 'DSO17BT', '16', '2021-03-23', 'GROUP', 'admin Siya', '216599390', 'functions and sub-procedures', '2021-03-22', 'ACCEPTED', 'Ggvggvvvj vxhkcthdtf');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `module` varchar(11) NOT NULL,
  `topic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `module`, `topic`) VALUES
(26, 'DSO17AT', ' selection and  iteration control structures'),
(27, 'DSO17AT', 'concepts and arithmetic'),
(28, 'DSO17BT', 'one-dimensional arrays'),
(29, 'DSO17BT', 'functions and sub-procedures'),
(30, 'TPG201T', 'Relational database application'),
(31, 'TPG201T', 'Advanced OOP'),
(32, 'DSO34BT', 'project management'),
(33, 'SSF24AT', 'basic system administration'),
(34, 'CFS10BT', ' computer organisation');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `stdNum` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `studentEmail` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cellNumber` varchar(11) NOT NULL,
  `account_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`stdNum`, `name`, `surname`, `studentEmail`, `role`, `password`, `cellNumber`, `account_date`) VALUES
(213564870, 'Chailock', 'Maseko', '213564870@tut4life.ac.za', 'student', '5b74e7fde4abee54841fba079b6a40b4', '0735135428', '2021-03-13'),
(215450147, 'Michael', 'Malandule', '215450147@tut4life.ac.za', 'tutor', '0054d4886f65fb5f335434b2fdaf4b03', '0725335234', '2021-03-20'),
(216448154, 'Jali', 'Mnisi', '216448154@tut4life.ac.za', 'student', '4192362abe5b833aa06f536de8300273', '0653572171', '2021-03-22'),
(216599390, 'Simphiwe', 'Mthanti', '216599390@tut4life.ac.za', 'tutor', 'c36a1385ff84646bfb7db817bc16e759', '0724283941', '2021-03-22'),
(216843818, 'Siya', 'Gumede', '216843818@tut4life.ac.za', 'tutor', 'c36a1385ff84646bfb7db817bc16e759', '0647707188', '2021-03-16'),
(216921542, 'Jansen', 'Mundlovu', '216921542@tut4life.ac.za', 'student', 'f22cef03bd5ee15bc642d6db0d2d8dc9', '0614612717', '2021-03-20'),
(216945549, 'Keabetswe', 'Mokwena', '216945549@tut4life.ac.za', 'student', '2e930d04a2c6d3728d403702cacd0550', '0659723218', '2021-03-12'),
(218242421, 'ismael', 'mours', '218242421@tut4life.ac.za', 'student', '17bc5be3e4ac7ee4e6aa91010aa11ccd', '0730662618', '2021-03-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notID`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sessionID`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`stdNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `sessionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
