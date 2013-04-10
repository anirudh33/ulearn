-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2013 at 11:09 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ulearndb`
--
DROP DATABASE `ulearndb`;
CREATE DATABASE `ulearndb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ulearndb`;

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE IF NOT EXISTS `admindetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of admin',
  `firstname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'firstname of admin',
  `lastname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'lastname of admin',
  `gender` enum('m','f') DEFAULT NULL COMMENT 'gender of admin',
  `phone` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'phone number of admin',
  `dob` date NOT NULL COMMENT 'date of birth of admin',
  `qualification` enum('graduate','postgraduate','doctorate','others') NOT NULL COMMENT 'qualification of admin',
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'address of admin',
  `profilepicture` mediumblob COMMENT 'profile photo of admin',
  `createdby` int(11) DEFAULT '0' COMMENT 'specifies who created admin',
  `updatedby` int(11) DEFAULT '0' COMMENT 'specifies who updated admin',
  `createdon` date DEFAULT NULL COMMENT 'specifies date of created admin',
  `updatedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date of updation',
  `language_id` int(11) DEFAULT NULL COMMENT 'foreign key of language table that specifies the language id admin selects',
  `status` enum('0','1','2') DEFAULT '1' COMMENT 'specifies the record is 0=deleted, 1=active, 2=deactive',
  `user_id` int(11) DEFAULT NULL COMMENT 'foreign key of userdetails table to specify id of admin',
  PRIMARY KEY (`id`),
  KEY `language_id` (`language_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`id`, `firstname`, `lastname`, `gender`, `phone`, `dob`, `qualification`, `address`, `profilepicture`, `createdby`, `updatedby`, `createdon`, `updatedon`, `language_id`, `status`, `user_id`) VALUES
(1, 'anirudh', 'pandita', 'm', '7503342243', '1987-08-12', 'postgraduate', 'dwarka', NULL, 0, 0, NULL, '2013-04-02 16:56:43', NULL, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'course id',
  `coursename` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'course name',
  `description` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'description about course',
  `createdon` date DEFAULT NULL COMMENT 'specifies date of created course',
  `updatedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date of updation',
  `status` enum('0','1','2') DEFAULT '1' COMMENT 'specifies the record is 0=deleted, 1=active, 2=deactive',
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `enrolls`
--

CREATE TABLE IF NOT EXISTS `enrolls` (
  `course_id` int(11) DEFAULT NULL COMMENT 'course id',
  `student_id` int(11) DEFAULT NULL COMMENT 'student id',
  KEY `course_id` (`course_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of language',
  `language` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'english' COMMENT 'name of language',
  `user_id` int(11) DEFAULT NULL COMMENT 'user_id',
  PRIMARY KEY (`language_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `lesson_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'lesson id',
  `lesson_no` int(11) UNIQUE NOT NULL COMMENT 'lesson number',
  `lesson_name` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci UNIQUE NOT NULL COMMENT 'lesson name',
  `lesson_body` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lesson text',
  `createdon` date DEFAULT NULL COMMENT 'specifies date of created lesson',
  `updatedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date of updation',
  `status` enum('0','1','2') DEFAULT '1' COMMENT 'specifies the record is 0=deleted, 1=active, 2=deactive',
  `course_id` int(11) DEFAULT NULL COMMENT 'foreign key of course table to specify course id ',
  `teacher_id` int(11) DEFAULT NULL COMMENT 'foreign key of teacherdetails table to specify teacher id',
`location` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'specifies complete path of lesson',
  PRIMARY KEY (`lesson_id`),
  KEY `course_id` (`course_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE IF NOT EXISTS `studentdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of student',
  `firstname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'firstname of student',
  `lastname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'lastname of student',
  `gender` enum('m','f') DEFAULT NULL COMMENT 'gender of student',
  `phone` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'phone number of student',
  `dob` date NOT NULL COMMENT 'date of birth of student',
  `qualification` enum('graduate','postgraduate','doctorate','others') NOT NULL COMMENT 'qualifications of student',
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'address of student',
  `profilepicture` mediumblob COMMENT 'profile photo of student',
  `createdby` int(11) DEFAULT '0' COMMENT 'specifies who created student and 0=selfregistered',
  `updatedby` int(11) DEFAULT '0' COMMENT 'specifies who updated student and 0=selfregistered',
  `createdon` date DEFAULT NULL COMMENT 'specifies date of created student',
  `updatedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date of updation',
  `status` enum('0','1','2') DEFAULT '1' COMMENT 'specifies the record is 0=deleted, 1=active, 2=deactive',
  `language_id` int(11) DEFAULT NULL COMMENT 'foreign key of language table that specifies the language id student selects',
  `user_id` int(11) DEFAULT NULL COMMENT 'foreign key of userdetails table to specify id of student',
  PRIMARY KEY (`id`),
  KEY `language_id` (`language_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`id`, `firstname`, `lastname`, `gender`, `phone`, `dob`, `qualification`, `address`, `profilepicture`, `createdby`, `updatedby`, `createdon`, `updatedon`, `status`, `language_id`, `user_id`) VALUES
(1, 'kawaljeet', 'singh', NULL, NULL, '0000-00-00', 'postgraduate', NULL, NULL, 0, 0, NULL, '0000-00-00 00:00:00', '1', NULL, 3),
(2, 'rain', 'rain', 'm', '4444444444', '2013-04-02', 'graduate', 'nayi mumbai', NULL, 0, 0, '2013-04-02', '2013-04-02 12:48:15', '1', NULL, 15),
(3, 'Water', 'Man', 'm', '555555555', '1999-02-03', 'graduate', 'delhi', NULL, 0, 0, '2013-04-02', '2013-04-02 12:49:39', '1', NULL, 16),
(4, 'Blossom', 'Winger', 'f', '3333333333', '2013-04-02', 'graduate', 'sky', NULL, 0, 0, '2013-04-02', '2013-04-02 12:52:16', '1', NULL, 17),
(5, 'Pooja', 'kiven', 'f', '7474747474', '2013-04-02', 'others', 'punjab', NULL, 0, 0, '2013-04-02', '2013-04-02 12:52:16', '1', NULL, 18),
(6, 'Vidya', 'Balan', 'f', '212112122', '2013-04-02', 'others', 'mumbai', NULL, 0, 0, '2013-04-02', '2013-04-02 12:53:20', '1', NULL, 19);

-- --------------------------------------------------------

--
-- Table structure for table `studentmessage`
--

CREATE TABLE IF NOT EXISTS `studentmessage` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of message',
  `body` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'message text',
  `subject` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'message subject',
  `sentfrom` int(11) DEFAULT NULL COMMENT 'foreign key of studentdetails table to specify id of student',
  `sentto` int(11) DEFAULT NULL COMMENT 'foreign key of teacherdetails table to specify id of teacher',
  PRIMARY KEY (`message_id`),
  KEY `sentfrom` (`sentfrom`),
  KEY `sentto` (`sentto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacherdetails`
--

CREATE TABLE IF NOT EXISTS `teacherdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of teacher',
  `firstname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'firstname of teacher',
  `lastname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'lastname of teacher',
  `gender` enum('m','f') DEFAULT NULL COMMENT 'gender of teacher',
  `phone` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'phone number of teacher',
  `dob` date NOT NULL COMMENT 'date of birth of teacher',
  `qualification` enum('graduate','postgraduate','doctorate','others') NOT NULL COMMENT 'qualification of teacher',
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'address of teacher',
  `profilepicture` mediumblob COMMENT 'profile photo of teacher',
  `createdby` int(11) DEFAULT '0' COMMENT 'specifies who created teacher',
  `updatedby` int(11) DEFAULT '0' COMMENT 'specifies who updated teacher',
  `createdon` date DEFAULT NULL COMMENT 'specifies date of created teacher',
  `updatedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date of updation',
  `language_id` int(11) DEFAULT NULL COMMENT 'foreign key of language table that specifies the language id teacher selects',
  `status` enum('0','1','2') DEFAULT '1' COMMENT 'specifies the record is 0=deleted, 1=active, 2=deactive',
  `user_id` int(11) DEFAULT NULL COMMENT 'foreign key of userdetails table to specify id of teacher',
  PRIMARY KEY (`id`),
  KEY `language_id` (`language_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `teacherdetails`
--

INSERT INTO `teacherdetails` (`id`, `firstname`, `lastname`, `gender`, `phone`, `dob`, `qualification`, `address`, `profilepicture`, `createdby`, `updatedby`, `createdon`, `updatedon`, `language_id`, `status`, `user_id`) VALUES
(1, 'tanu', 'trehan', NULL, NULL, '0000-00-00', 'postgraduate', NULL, NULL, 0, 0, NULL, '0000-00-00 00:00:00', NULL, '1', 2),
(2, 'teacher2', 'habibi', 'f', '22344545', '2003-04-24', 'postgraduate', NULL, NULL, 0, 0, '2013-04-02', '2013-04-02 11:55:47', NULL, '1', 4),
(3, 'Rasmus', 'Lerdorf', 'm', '2222222', '1975-04-09', 'doctorate', 'uuuuu', NULL, 0, 0, '2013-03-01', '2013-04-02 12:15:49', NULL, '1', 5),
(4, 'ramandeep', 'mann', 'm', '898989898', '1988-05-12', 'postgraduate', 'janakpuri', NULL, 0, 0, '2013-04-01', '2013-04-02 12:17:46', NULL, '1', 6),
(5, 'teacher4', 'gamer', 'm', '8787798789', '2013-04-17', 'graduate', 'delhi', NULL, 0, 0, '2013-04-02', '2013-04-02 17:12:43', NULL, '1', 7),
(6, 'Khushi', 'sharma', 'f', '67689789789', '2013-04-09', 'others', 'new jersey', NULL, 0, 0, '2013-04-02', '2013-04-02 12:18:08', NULL, '1', 8),
(7, 'harihar', 'rajan', 'f', '66666666', '1970-04-02', 'postgraduate', 'usa', NULL, 0, 0, '2013-04-02', '2013-04-02 12:15:49', NULL, '1', 9),
(8, 'dennis', 'ritchie', 'm', '111223133', '1960-04-02', 'graduate', 'dwarka', NULL, 0, 0, '2013-04-02', '2013-04-02 12:15:49', NULL, '1', 10),
(9, 'Nasya', 'zubain', 'm', '5446444', '2004-04-13', 'others', 'auckland', NULL, 0, 0, '2013-04-02', '2013-04-02 12:18:26', NULL, '1', 11),
(10, 'raju', 'srivastava', 'm', '66565776', '2013-04-02', 'postgraduate', 'rohini', NULL, 0, 0, '2013-04-02', '2013-04-02 12:15:49', NULL, '1', 12),
(11, 'Robin', 'Schmulders', 'f', '55555555555', '2013-04-16', 'graduate', 'la', NULL, 0, 0, '2013-04-02', '2013-04-02 12:15:49', NULL, '1', 13),
(12, 'rajan', 'mathews', 'm', '776767676', '1999-04-20', 'graduate', 'mumbai', NULL, 0, 0, '2013-04-02', '2013-04-02 12:15:49', NULL, '1', 14);

-- --------------------------------------------------------

--
-- Table structure for table `teachermessage`
--

CREATE TABLE IF NOT EXISTS `teachermessage` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of message',
  `body` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'message text',
  `subject` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'message subject',
  `sentfrom` int(11) DEFAULT NULL COMMENT 'foreign key of teacherdetails table to specify id of teacher',
  `sentto` int(11) DEFAULT NULL COMMENT 'foreign key of studentdetails table to specify id of student',
  PRIMARY KEY (`message_id`),
  KEY `sentfrom` (`sentfrom`),
  KEY `sentto` (`sentto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE IF NOT EXISTS `teaches` (
  `course_id` int(11) DEFAULT NULL COMMENT 'course id',
  `teacher_id` int(11) DEFAULT NULL COMMENT 'teacher id',
  KEY `course_id` (`course_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
CREATE UNIQUE INDEX `user_index` ON `userdetails`(`user_id`);
CREATE UNIQUE INDEX `teacher_index` ON `userdetails`(`id`);
CREATE UNIQUE INDEX `student_index` ON `userdetails`(`id`);
--
-- Table structure for table `userdetails`
--

CREATE TABLE IF NOT EXISTS `userdetails` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of teachers, students, admin',
  `email` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'email id of teachers, students, admin',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'passwords of teachers, students, admin',
  `user_type` enum('superadmin','admin','teacher','student') NOT NULL COMMENT 'specifies type of user is teacher, student, admin',
  `confirm_code` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'confirm id of teachers, students, admin',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`user_id`, `email`, `password`, `user_type`, `confirm_code`) VALUES
(1, 'root@osscube.com', 'root', 'admin', 'sss'),
(2, 'teacher@osscube.com', 'root', 'teacher', 'ttt'),
(3, 'student@osscube.com', 'root', 'student', 'ggg'),
(4, 'teacher2@ulearn.com', 'root', 'teacher', 'hhhh'),
(5, 'teacher3@ulearn.com', 'root', 'teacher', 'hhhh'),
(6, 'raman@ulearn.com', 'apple', 'teacher', 'hh'),
(7, 'teacher4@ulearn.com', 'root', 'teacher', 'ggg'),
(8, 'teacher5@ulearn.com', 'root', 'teacher', 'gg'),
(9, 'teacher6@osscube.com', 'root', 'teacher', 'hhh'),
(10, 'teacher7@ulearn.com', 'root', 'teacher', 'ggg'),
(11, 'teacher8@ulearn.com', 'root', 'teacher', 'ggg'),
(12, 'teacher9@ulearn.com', 'tttt', 'teacher', 'h'),
(13, 'teacher10@ulearn.com', 'abc', 'teacher', 'aa'),
(14, 'teacher11@ulearn.com', 'asd', 'teacher', 'jj'),
(15, 'student@ulearn.com', 'uyu', 'student', 'iii'),
(16, 'student2@ulearn.com', 'hello', 'student', 'uuu'),
(17, 'student3@ulearn.com', 'uio', 'student', 'jjj'),
(18, 'student4@ulearn.com', 'yui', 'student', 'uu'),
(19, 'student5@ulearn.com', 'tyu', 'student', 'hhh');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD CONSTRAINT `admindetails_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
  ADD CONSTRAINT `admindetails_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`user_id`);

--
-- Constraints for table `enrolls`
--
ALTER TABLE `enrolls`
  ADD CONSTRAINT `enrolls_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `enrolls_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `studentdetails` (`id`);

--
-- Constraints for table `language`
--
ALTER TABLE `language`
  ADD CONSTRAINT `language_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`user_id`);

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `lesson_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacherdetails` (`id`);

--
-- Constraints for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD CONSTRAINT `studentdetails_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
  ADD CONSTRAINT `studentdetails_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`user_id`);

--
-- Constraints for table `studentmessage`
--
ALTER TABLE `studentmessage`
  ADD CONSTRAINT `studentmessage_ibfk_1` FOREIGN KEY (`sentfrom`) REFERENCES `studentdetails` (`id`),
  ADD CONSTRAINT `studentmessage_ibfk_2` FOREIGN KEY (`sentto`) REFERENCES `teacherdetails` (`id`);

--
-- Constraints for table `teacherdetails`
--
ALTER TABLE `teacherdetails`
  ADD CONSTRAINT `teacherdetails_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
  ADD CONSTRAINT `teacherdetails_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`user_id`);

--
-- Constraints for table `teachermessage`
--
ALTER TABLE `teachermessage`
  ADD CONSTRAINT `teachermessage_ibfk_1` FOREIGN KEY (`sentfrom`) REFERENCES `teacherdetails` (`id`),
  ADD CONSTRAINT `teachermessage_ibfk_2` FOREIGN KEY (`sentto`) REFERENCES `studentdetails` (`id`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacherdetails` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;