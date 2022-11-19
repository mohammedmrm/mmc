-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2017 at 09:34 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mc`
--

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `college_id` int(11) NOT NULL,
  `college_name_e` varchar(100) NOT NULL,
  `college_name_a` varchar(100) CHARACTER SET utf32 NOT NULL,
  `college_desc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_id`, `college_name_e`, `college_name_a`, `college_desc`) VALUES
(6, 'College of Medicen', 'ÙƒÙ„ÙŠØ© Ø§Ù„Ø·Ø¨', 0),
(7, 'College of Pharmacy', 'ÙƒÙ„ÙŠØ© Ø§Ù„ØµÙŠØ¯Ù„Ø©', 0),
(8, 'College of Material Engineering', 'ÙƒÙ„ÙŠØ© Ù‡Ù†Ø¯Ø³Ø© Ø§Ù„Ù…ÙˆØ§Ø¯', 0),
(9, 'College of Dentistary', 'ÙƒÙ„ÙŠØ© Ø·Ø¨ Ø§Ù„Ø§Ø³Ù†Ø§Ù†', 0),
(10, 'College of Information Technology', 'ÙƒÙ„ÙŠØ© ØªÙƒÙ†ÙˆÙ„ÙˆØ¬ÙŠØ§ Ø§Ù„Ù…Ø¹Ù„ÙˆÙ…Ø§Øª', 0),
(11, 'College of Engineering', 'ÙƒÙ„ÙŠØ© Ø§Ù„Ù‡Ù†Ø¯Ø³Ø©', 0),
(12, 'College of Science WSCI', 'ÙƒÙ„ÙŠØ© Ø§Ù„Ø¹Ù„ÙˆÙ… Ø§Ù„Ø¨Ù†Ø§Øª', 0),
(13, 'College of Law', 'ÙƒÙ„ÙŠØ© Ø§Ù„Ù‚Ø§Ù†ÙˆÙ†', 0),
(14, 'College of Fine Art ', 'ÙƒÙ„ÙŠØ© Ø§Ù„ÙÙ†ÙˆÙ†', 0),
(15, 'College of physical Education and Sport Science', 'ÙƒÙ„ÙŠØ© Ø§Ù„ØªØ±Ø¨ÙŠØ© Ø§Ù„Ø¨Ø¯Ù†ÙŠØ© ÙˆØ¹Ù„ÙˆÙ… Ø§Ù„Ø±ÙŠØ§Ø¶Ø©', 0),
(16, 'College of Arts', 'ÙƒÙ„ÙŠØ© Ø§Ù„Ø£Ø¯Ø§Ø¨', 0),
(17, 'College of Education of Humanities studies', 'ÙƒÙ„ÙŠØ© Ø§Ù„ØªØ±Ø¨ÙŠØ© Ù„Ù„Ø¹Ù„ÙˆÙ… Ø§Ù„Ø§Ù†Ø³Ø§Ù†ÙŠÙ‡', 0),
(20, 'College of Education for Pure Science ', 'ÙƒÙ„ÙŠØ© Ø§Ù„ØªØ±Ø¨ÙŠØ© Ù„Ù„Ø¹Ù„ÙˆÙ… Ø§Ù„ØµØ±ÙØ©', 0),
(21, 'College of Basic Education', 'ÙƒÙ„ÙŠØ© Ø§Ù„ØªØ±Ø¨ÙŠØ© Ø§Ù„Ø§Ø³Ø§Ø³ÙŠØ©', 0),
(22, 'College of Quranic Studies', 'ÙƒÙ„ÙŠØ© Ø§Ù„Ø¯Ø±Ø§Ø³Ø§Øª Ø§Ù„Ù‚Ø±Ø§Ù†ÙŠØ©', 0),
(23, 'College of Administration and Economics', 'ÙƒÙ„ÙŠØ© Ø§Ù„Ø§Ø¯Ø§Ø±Ø© ÙˆØ§Ù„Ø§Ù‚ØµØ§Ø¯', 0),
(24, 'College of Nursing', 'ÙƒÙ„ÙŠØ© Ø§Ù„ØªÙ…Ø±ÙŠØ¶', 0),
(25, 'College of Engineering - Al-Musaib', 'ÙƒÙ„ÙŠØ© Ø§Ù„Ù‡Ù†Ø¯Ø³Ù‡ - Ø§Ù„Ù…Ø³ÙŠØ¨', 0),
(26, 'Others', 'Ø£Ø®Ø±Ù‰', 0),
(27, 'College of Science', 'ÙƒÙ„ÙŠØ© Ø§Ù„Ø¹Ù„ÙˆÙ…', 0);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_id` bigint(20) NOT NULL,
  `path` varchar(100) NOT NULL,
  `media_desc` varchar(300) NOT NULL,
  `college_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `display` int(1) NOT NULL,
  `snap_path` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_id`, `path`, `media_desc`, `college_id`, `teacher_id`, `title`, `display`, `snap_path`, `time`) VALUES
(24, '../media/10/3/5888fd9123a3e.mov', '', 10, 3, 'Web Development', 1, 'snap/5888fd923532f.jpg', '2017-01-25 19:33:37'),
(25, '../media/6/4/5888ff0827f7c.mov', '', 6, 4, 'Heart care', 1, 'snap/5888ff0840cb4.jpg', '2017-01-25 19:39:52'),
(26, '../media/11/5/58899376360c2.mov', '', 11, 5, 'Engineering skills ', 1, 'snap/58899376cf73b.jpg', '2017-01-26 06:13:10'),
(27, '../media/21/8/5889941abc6f6.avi', '', 21, 8, 'Math Education', 1, 'snap/5889941b812b2.jpg', '2017-01-26 06:15:54'),
(28, '../media/13/6/5889987faf82cmp4', '', 13, 6, 'Law Basic roles', 1, 'snap/5889987fcc234.jpg', '2017-01-26 06:34:39'),
(29, '../media/24/7/58899934a4911mp4', '', 24, 7, 'Kids Care', 1, 'snap/58899934d6d6a.jpg', '2017-01-26 06:37:40'),
(31, '../media/14/9/58899a3e76149mp4', '', 14, 9, 'Art History', 1, 'snap/58899a3eb6906.jpg', '2017-01-26 06:42:06'),
(32, '../media/6/4/5889a13fa795emp4', '', 6, 4, 'Hear Care', 1, 'snap/5889a13fc8960.jpg', '2017-01-26 07:11:59'),
(33, '../media/6/4/5889a1567b2bemp4', '', 6, 4, 'Feet Care', 1, 'snap/5889a1568ea1d.jpg', '2017-01-26 07:12:22'),
(34, '../media/6/4/5889a202d074fmp4', '', 6, 4, 'Eye Care', 1, 'snap/5889a202e6aa3.jpg', '2017-01-26 07:15:14'),
(35, '../media/6/4/588a5f5493badmp4', 'Skin Care we going for description of skin  layers and how match the weather can effect on the body skin ', 6, 4, 'Skin Care', 1, 'snap/588a5f54a7d4f.jpg', '2017-01-26 20:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name_e` varchar(100) NOT NULL,
  `teacher_name_a` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `college_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name_e`, `teacher_name_a`, `email`, `college_id`) VALUES
(3, 'Moahmmed Ridha Mohammed', 'Ù…Ø­Ù…Ø¯ Ø±Ø¶Ø§ Ù…Ø­Ù…Ø¯', 'mohammed.rbn4@yahoo.com', 10),
(4, 'Rusol Jasem', 'Ø±Ø³Ù„ Ø¬Ø§Ø³Ù…', 'rusol@yahoo.com', 6),
(5, 'Ali Shuper', 'Ø¹Ù„ÙŠ Ø´Ø¨Ø±', 'alishuper@yahoo.com', 11),
(6, 'Asraa Ali', 'Ø§Ø³Ø±Ø§Ø¡ Ø¹Ù„ÙŠ', 'asraaalwaisi@yahoo.com', 13),
(7, 'Zahraa Kadhim abass', 'Ø²Ù‡Ø±Ø§Ø¡ ÙƒØ§Ø¸Ù… Ø¹Ø¨Ø§Ø³', 'mohammed.rbn4@yahoo.com', 24),
(8, 'Mohammed Kadhim ', 'Ù…Ø­Ù…Ø¯ ÙƒØ§Ø¸Ù…', 'mohammed.rbn4@yahoo.com', 21),
(9, 'Ridha Mohammed', 'Ø±Ø¶Ø§ Ù…Ø­Ù…Ø¯', 'mohammed.rbn4@yahoo.com', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `permission`) VALUES
(1, 'POn9sYAXY4sh/yGpyuovpWQ0zmVmZv+C3aN3pimU1FU=', '$2a$07$4UHi5TM9R72Ti4ZGgCiXd.2Zi03nyGMMzKUU4NYnocMeyLqA.QCGe', 'pQpV9rnQ/UtMHFD+krBgcGe9K/m8Jc60bPK8cN1eI4I=', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`);
ALTER TABLE `media` ADD FULLTEXT KEY `media_desc` (`media_desc`,`title`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
