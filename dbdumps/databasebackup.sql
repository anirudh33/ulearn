-- MySQL dump 10.13  Distrib 5.5.29, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ulearndb
-- ------------------------------------------------------
-- Server version	5.5.29-0ubuntu0.12.04.1-log

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
-- Table structure for table `admindetails`
--
DROP DATABASE IF EXISTS `ulearndb`;
CREATE DATABASE `ulearndb`;
USE `ulearndb`;
DROP TABLE IF EXISTS `admindetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admindetails` (
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
  KEY `user_id` (`user_id`),
  CONSTRAINT `admindetails_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
  CONSTRAINT `admindetails_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admindetails`
--

LOCK TABLES `admindetails` WRITE;
/*!40000 ALTER TABLE `admindetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `admindetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'course id',
  `coursename` char(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'course name',
  `description` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'description about course',
  `createdon` date DEFAULT NULL COMMENT 'specifies date of created course',
  `updatedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date of updation',
  `status` enum('0','1','2') DEFAULT '1' COMMENT 'specifies the record is 0=deleted, 1=active, 2=deactive',
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
  `course_id` int(11) DEFAULT NULL COMMENT 'course id',
  `student_id` int(11) DEFAULT NULL COMMENT 'student id',
  KEY `course_id` (`course_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `enrolls_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  CONSTRAINT `enrolls_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `studentdetails` (`id`)
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
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of language',
  `language` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'english' COMMENT 'name of language',
  `user_id` int(11) DEFAULT NULL COMMENT 'user_id',
  PRIMARY KEY (`language_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `language_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson` (
  `lesson_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'lesson id',
  `lesson_no` int(11) NOT NULL COMMENT 'lesson number',
  `lesson_name` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'lesson name',
  `location` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'specifies complete path of lesson',
  `lesson_body` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lesson text',
  `createdon` date DEFAULT NULL COMMENT 'specifies date of created lesson',
  `updatedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date of updation',
  `status` enum('0','1','2') DEFAULT '1' COMMENT 'specifies the record is 0=deleted, 1=active, 2=deactive',
  `course_id` int(11) DEFAULT NULL COMMENT 'foreign key of course table to specify course id ',
  `teacher_id` int(11) DEFAULT NULL COMMENT 'foreign key of teacherdetails table to specify teacher id',
  PRIMARY KEY (`lesson_id`),
  KEY `course_id` (`course_id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `lesson_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacherdetails` (`id`),
  CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`)
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
-- Table structure for table `studentdetails`
--

DROP TABLE IF EXISTS `studentdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentdetails` (
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
  KEY `user_id` (`user_id`),
  CONSTRAINT `studentdetails_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
  CONSTRAINT `studentdetails_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentdetails`
--

LOCK TABLES `studentdetails` WRITE;
/*!40000 ALTER TABLE `studentdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentmessage`
--

DROP TABLE IF EXISTS `studentmessage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentmessage` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of message',
  `body` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'message text',
  `subject` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'message subject',
  `sentfrom` int(11) DEFAULT NULL COMMENT 'foreign key of studentdetails table to specify id of student',
  `sentto` int(11) DEFAULT NULL COMMENT 'foreign key of teacherdetails table to specify id of teacher',
  PRIMARY KEY (`message_id`),
  KEY `sentfrom` (`sentfrom`),
  KEY `sentto` (`sentto`),
  CONSTRAINT `studentmessage_ibfk_1` FOREIGN KEY (`sentfrom`) REFERENCES `studentdetails` (`id`),
  CONSTRAINT `studentmessage_ibfk_2` FOREIGN KEY (`sentto`) REFERENCES `teacherdetails` (`id`)
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
-- Table structure for table `teacherdetails`
--

DROP TABLE IF EXISTS `teacherdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacherdetails` (
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
  KEY `user_id` (`user_id`),
  CONSTRAINT `teacherdetails_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`),
  CONSTRAINT `teacherdetails_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userdetails` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacherdetails`
--

LOCK TABLES `teacherdetails` WRITE;
/*!40000 ALTER TABLE `teacherdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `teacherdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachermessage`
--

DROP TABLE IF EXISTS `teachermessage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachermessage` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of message',
  `body` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'message text',
  `subject` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'message subject',
  `sentfrom` int(11) DEFAULT NULL COMMENT 'foreign key of teacherdetails table to specify id of teacher',
  `sentto` int(11) DEFAULT NULL COMMENT 'foreign key of studentdetails table to specify id of student',
  PRIMARY KEY (`message_id`),
  KEY `sentfrom` (`sentfrom`),
  KEY `sentto` (`sentto`),
  CONSTRAINT `teachermessage_ibfk_1` FOREIGN KEY (`sentfrom`) REFERENCES `teacherdetails` (`id`),
  CONSTRAINT `teachermessage_ibfk_2` FOREIGN KEY (`sentto`) REFERENCES `studentdetails` (`id`)
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
  `course_id` int(11) DEFAULT NULL COMMENT 'course id',
  `teacher_id` int(11) DEFAULT NULL COMMENT 'teacher id',
  KEY `course_id` (`course_id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacherdetails` (`id`)
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
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdetails` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of teachers, students, admin',
  `email` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'email id of teachers, students, admin',
  `password` char(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'passwords of teachers, students, admin',
  `user_type` enum('superadmin','admin','teacher','student') NOT NULL COMMENT 'specifies type of user is teacher, student, admin',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdetails`
--

LOCK TABLES `userdetails` WRITE;
/*!40000 ALTER TABLE `userdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `userdetails` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

INSERT INTO userdetails VALUES (1,'root@osscube.com','root','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-04 17:58:28
