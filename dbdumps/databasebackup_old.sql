-- MySQL dump 10.13  Distrib 5.5.24, for Win64 (x86)
--
-- Host: localhost    Database: ulearndb
-- ------------------------------------------------------
-- Server version	5.5.24-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL COMMENT 'id of admin',
  `firstname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'firstname of admin',
  `lastname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'lastname of admin',
  `phone` int(11) DEFAULT NULL COMMENT 'phone number of admin',
  `d_o_b` date NOT NULL COMMENT 'date of birth of admin',
  `address` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'address of admin',
  `profilepicture` blob COMMENT 'profile photo of admin',
  `language` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'english' COMMENT 'specifies the language admin selects',
  `state` enum('0','1') DEFAULT '1' COMMENT 'specifies the record is deleted or not',
  `user_id` int(11) DEFAULT NULL COMMENT 'foreign key of users table to specify id of admin',
  `email` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'foreign key of users table to specify email id of admin',
  PRIMARY KEY (`admin_id`),
  KEY `user_id` (`user_id`),
  KEY `email` (`email`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL COMMENT 'course id',
  `coursename` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'course name',
  `description` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'description about course',
  `state` enum('0','1') DEFAULT '1' COMMENT 'specifies the record is deleted or not',
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrolls`
--

DROP TABLE IF EXISTS `enrolls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrolls` (
  `course_id` int(11) NOT NULL COMMENT 'course id',
  `student_id` int(11) NOT NULL COMMENT 'student id',
  PRIMARY KEY (`course_id`,`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrolls`
--

LOCK TABLES `enrolls` WRITE;
/*!40000 ALTER TABLE `enrolls` DISABLE KEYS */;
/*!40000 ALTER TABLE `enrolls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL COMMENT 'lesson id',
  `lesson_no` int(11) NOT NULL COMMENT 'lesson number',
  `lesson_name` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'lesson name',
  `location` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'specifies complete path of lesson',
  `lesson_body` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lesson text',
  `date_added` date NOT NULL COMMENT 'specifies date when lesson is created',
  `state` enum('0','1') DEFAULT '1' COMMENT 'specifies the record is deleted or not',
  `course_id` int(11) DEFAULT NULL COMMENT 'foreign key of teaches table to specify course id ',
  `teacher_id` int(11) DEFAULT NULL COMMENT 'foreign key of teaches table to specify teacher id',
  PRIMARY KEY (`lesson_id`),
  KEY `course_id` (`course_id`,`teacher_id`),
  CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`course_id`, `teacher_id`) REFERENCES `teaches` (`course_id`, `teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson`
--

LOCK TABLES `lesson` WRITE;
/*!40000 ALTER TABLE `lesson` DISABLE KEYS */;
/*!40000 ALTER TABLE `lesson` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `email` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'email id of user',
  `password` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'password of user',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `student_id` int(11) NOT NULL COMMENT 'id of student',
  `firstname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'firstname of student',
  `lastname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'lastname of student',
  `phone` int(11) DEFAULT NULL COMMENT 'phone number of student',
  `d_o_b` date NOT NULL COMMENT 'date of birth of student',
  `qualification` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'qualifications of student',
  `address` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'address of student',
  `profilepicture` blob COMMENT 'profile photo of student',
  `language` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'english' COMMENT 'specifies the language student selects',
  `state` enum('0','1') DEFAULT '1' COMMENT 'specifies the record is deleted or not',
  `user_id` int(11) DEFAULT NULL COMMENT 'foreign key of users table to specify id of student',
  `email` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'foreign key of users table to specify email id of student',
  PRIMARY KEY (`student_id`),
  KEY `user_id` (`user_id`),
  KEY `email` (`email`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `student_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentmessage`
--

DROP TABLE IF EXISTS `studentmessage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentmessage` (
  `message_id` int(11) NOT NULL COMMENT 'id of message',
  `body` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'message text',
  `subject` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'message subject',
  `sentfrom` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'foreign key of student table to specify email id of student',
  `sentto` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'foreign key of teacher table to specify email id of teacher',
  PRIMARY KEY (`message_id`),
  KEY `sentfrom` (`sentfrom`),
  KEY `sentto` (`sentto`),
  CONSTRAINT `studentmessage_ibfk_1` FOREIGN KEY (`sentfrom`) REFERENCES `student` (`email`),
  CONSTRAINT `studentmessage_ibfk_2` FOREIGN KEY (`sentto`) REFERENCES `teacher` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentmessage`
--

LOCK TABLES `studentmessage` WRITE;
/*!40000 ALTER TABLE `studentmessage` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentmessage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL COMMENT 'id of teacher',
  `firstname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'firstname of teacher',
  `lastname` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'lastname of teacher',
  `phone` int(11) DEFAULT NULL COMMENT 'phone number of teacher',
  `d_o_b` date NOT NULL COMMENT 'date of birth of teacher',
  `qualification` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'qualification of teacher',
  `address` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'address of teacher',
  `profilepicture` blob COMMENT 'profile photo of teacher',
  `language` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'english' COMMENT 'specifies the language teacher selects',
  `state` enum('0','1') DEFAULT '1' COMMENT 'specifies the record is deleted or not',
  `user_id` int(11) DEFAULT NULL COMMENT 'foreign key of users table to specify id of teacher',
  `email` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'foreign key of users table to specify email id of teacher',
  PRIMARY KEY (`teacher_id`),
  KEY `user_id` (`user_id`),
  KEY `email` (`email`),
  CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachermessage`
--

DROP TABLE IF EXISTS `teachermessage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachermessage` (
  `message_id` int(11) NOT NULL COMMENT 'id of message',
  `body` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'message text',
  `subject` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'message subject',
  `sentfrom` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'foreign key of teacher table to specify email id of teacher',
  `sentto` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'foreign key of student table to specify email id of student',
  PRIMARY KEY (`message_id`),
  KEY `sentfrom` (`sentfrom`),
  KEY `sentto` (`sentto`),
  CONSTRAINT `teachermessage_ibfk_1` FOREIGN KEY (`sentfrom`) REFERENCES `teacher` (`email`),
  CONSTRAINT `teachermessage_ibfk_2` FOREIGN KEY (`sentto`) REFERENCES `student` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachermessage`
--

LOCK TABLES `teachermessage` WRITE;
/*!40000 ALTER TABLE `teachermessage` DISABLE KEYS */;
/*!40000 ALTER TABLE `teachermessage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teaches`
--

DROP TABLE IF EXISTS `teaches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teaches` (
  `course_id` int(11) NOT NULL COMMENT 'course id',
  `teacher_id` int(11) NOT NULL COMMENT 'teacher id',
  PRIMARY KEY (`course_id`,`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teaches`
--

LOCK TABLES `teaches` WRITE;
/*!40000 ALTER TABLE `teaches` DISABLE KEYS */;
/*!40000 ALTER TABLE `teaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'id of teachers, students, admin',
  `email` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'email id of teachers, students, admin',
  `password` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'passwords of teachers, students, admin',
  `user_type` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'specifies type of user is teacher, student, admin',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-03  0:39:48
