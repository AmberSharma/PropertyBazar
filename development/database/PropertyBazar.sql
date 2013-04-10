-- MySQL dump 10.13  Distrib 5.1.67, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: propertybazar
-- ------------------------------------------------------
-- Server version	5.1.67-0ubuntu0.11.10.1

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
-- Table structure for table `broker`
--

DROP TABLE IF EXISTS `broker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `broker` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique id ',
  `b_area` varchar(20) NOT NULL COMMENT 'area of broker where broker deals',
  `b_property_assign` int(11) NOT NULL COMMENT 'total no  of property assigned to broker',
  `b_property_done` int(11) NOT NULL COMMENT 'total no  of property done by broker',
  `b_id` int(11) NOT NULL COMMENT 'reference to user_registration1(user_id)',
  `status` enum('t','f') DEFAULT 't' COMMENT 'status for soft delete',
  PRIMARY KEY (`id`),
  KEY `broker_response_id` (`b_id`),
  CONSTRAINT `broker_response_id` FOREIGN KEY (`b_id`) REFERENCES `user_registration` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `broker`
--

LOCK TABLES `broker` WRITE;
/*!40000 ALTER TABLE `broker` DISABLE KEYS */;
/*!40000 ALTER TABLE `broker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commission`
--

DROP TABLE IF EXISTS `commission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commission` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique id for commission table',
  `buyer_amount` decimal(10,2) DEFAULT NULL,
  `seller_amount` decimal(10,2) DEFAULT NULL,
  `final_time` datetime NOT NULL COMMENT 'time when broker finally sold the property',
  `property_id` int(11) NOT NULL COMMENT 'reference to seller_table(property_id)',
  `status_d` enum('t','f') DEFAULT 't' COMMENT 'status for soft delete',
  PRIMARY KEY (`id`),
  KEY `property_response1_id` (`property_id`),
  CONSTRAINT `property_response1_id` FOREIGN KEY (`property_id`) REFERENCES `seller_table` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commission`
--

LOCK TABLES `commission` WRITE;
/*!40000 ALTER TABLE `commission` DISABLE KEYS */;
/*!40000 ALTER TABLE `commission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique id for feedback table ',
  `feedback_by` varchar(20) NOT NULL COMMENT 'user login name',
  `feedback_time` datetime NOT NULL COMMENT 'time when feedback is given',
  `feedback_subject` varchar(30) NOT NULL COMMENT 'Subject of Feedback',
  `feedback_content` varchar(500) NOT NULL COMMENT 'Content of Feedback',
  `status` enum('t','f') DEFAULT 't' COMMENT 'status for soft delete',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `feedback_by` (`feedback_by`),
  KEY `fk` (`user_id`),
  KEY `feedback_by_2` (`feedback_by`),
  CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_registration` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'amber','2013-03-21 00:03:09','oss','hi friends....','t',1);
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `login`
--

DROP TABLE IF EXISTS `login`;
/*!50001 DROP VIEW IF EXISTS `login`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `login` (
  `user_name` varchar(20),
  `password` varchar(15),
  `user_type` enum('u','b','a')
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique id for each message',
  `property_id` int(11) NOT NULL COMMENT 'reference to seller_table(property_id)',
  `assigned_by` int(11) NOT NULL COMMENT 'reference to user_registration(user_id)',
  `assigned_to` int(11) NOT NULL COMMENT 'reference to user_registration(user_id)',
  `message_time` datetime NOT NULL COMMENT 'time when message is given',
  `message_subject` varchar(30) NOT NULL COMMENT 'Subject of message',
  `message_content` varchar(500) NOT NULL COMMENT 'Content of message',
  `message_type` enum('m','t') DEFAULT NULL COMMENT 'status for msg type m for message and t for transaction',
  `status` enum('t','f') DEFAULT 't' COMMENT 'status for soft delete',
  PRIMARY KEY (`msg_id`),
  KEY `assigned_by_id` (`assigned_by`),
  KEY `assigned_to_id` (`assigned_to`),
  KEY `property_response2_id` (`property_id`),
  CONSTRAINT `assigned_by_id` FOREIGN KEY (`assigned_by`) REFERENCES `user_registration` (`user_id`),
  CONSTRAINT `assigned_to_id` FOREIGN KEY (`assigned_to`) REFERENCES `user_registration` (`user_id`),
  CONSTRAINT `property_response2_id` FOREIGN KEY (`property_id`) REFERENCES `seller_table` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_buy`
--

DROP TABLE IF EXISTS `property_buy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_buy` (
  `buy_id` int(11) NOT NULL DEFAULT '0' COMMENT 'id for buying',
  `user_id` int(11) DEFAULT NULL COMMENT 'foreign key for user_registration',
  `property_id` int(11) DEFAULT NULL COMMENT 'foreign key for seller table',
  `min_price` int(11) DEFAULT NULL COMMENT 'minimum range of amount for buying',
  `max_price` int(11) DEFAULT NULL COMMENT 'maximum price for buying',
  `property_feature` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`buy_id`),
  KEY `user_id` (`user_id`),
  KEY `property_id` (`property_id`),
  CONSTRAINT `property_buy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_registration` (`user_id`),
  CONSTRAINT `property_buy_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `seller_table` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_buy`
--

LOCK TABLES `property_buy` WRITE;
/*!40000 ALTER TABLE `property_buy` DISABLE KEYS */;
INSERT INTO `property_buy` VALUES (0,2,2,3000000,4000000,'Private villa');
/*!40000 ALTER TABLE `property_buy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_image`
--

DROP TABLE IF EXISTS `property_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) DEFAULT NULL COMMENT 'foreign key refering to seller table',
  `image` blob,
  PRIMARY KEY (`image_id`),
  KEY `image_id` (`image_id`),
  KEY `property_id` (`property_id`),
  CONSTRAINT `property_image_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `seller_table` (`property_id`),
  CONSTRAINT `property_image_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `seller_table` (`property_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_image`
--

LOCK TABLES `property_image` WRITE;
/*!40000 ALTER TABLE `property_image` DISABLE KEYS */;
INSERT INTO `property_image` VALUES (2,4,'/var/www/PropertyBazar/trunk/development/trulia_files/home1.jpg'),(3,4,'/var/www/PropertyBazar/trunk/development/trulia_files/home2.jpg'),(4,6,'/var/www/PropertyBazar/trunk/development/trulia_files/home3.jpg'),(5,4,'/var/www/PropertyBazar/trunk/development/trulia_files/kitchen.jpg');
/*!40000 ALTER TABLE `property_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seller_table`
--

DROP TABLE IF EXISTS `seller_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seller_table` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique id of saler',
  `user_id` int(11) DEFAULT NULL COMMENT 'name of  user',
  `deal_type` enum('Sale','Rent') DEFAULT NULL COMMENT 'sale type',
  `address` varchar(100) DEFAULT NULL COMMENT 'address of seller',
  `property_type` varchar(15) DEFAULT NULL COMMENT 'this is type of property',
  `transaction_type` varchar(15) DEFAULT NULL COMMENT 'type of sale ',
  `property_area` int(11) DEFAULT NULL,
  `facility` varchar(30) DEFAULT NULL COMMENT 'facility provided',
  `direction` enum('N','E','S','W','NE','NW','SE','SW') DEFAULT NULL COMMENT 'location of property',
  `property_feature` varchar(30) DEFAULT NULL COMMENT 'type of room',
  `price` int(11) DEFAULT NULL COMMENT 'rate of property',
  `bargain_amount` int(11) DEFAULT NULL COMMENT 'min amount for sale',
  `furnished_item` varchar(20) DEFAULT NULL COMMENT 'material included with property',
  `description` varchar(200) DEFAULT NULL COMMENT 'key feature of propety',
  `bhk` int(11) DEFAULT NULL,
  `property_status` enum('inactive','active','pending','done') DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `sector` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`property_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `sellertable_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_registration` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller_table`
--

LOCK TABLES `seller_table` WRITE;
/*!40000 ALTER TABLE `seller_table` DISABLE KEYS */;
INSERT INTO `seller_table` VALUES (2,1,'Sale','noida 62','house','resale',160,'Near vaishali metro station','NE','Private Villa',3200000,3000000,'fully-furnished','fully AC',1,'pending','noida',NULL),(3,1,'Sale','noida 62','house','resale',150,'Near vaishali metro station','NE','Private Villa',4000000,5000000,'fully-furnished','fully AC',1,'pending',NULL,NULL),(4,1,'Sale','A-510','flat','resale',200,'Near vaishali metro station','N','Private Villa',3500000,3200000,'furnished','fully AC',2,'active','noida','62'),(5,2,'Sale','d-123','flat','resale',200,'Near vaishali metro station','S','Private Villa',6000000,5800000,'fully furnished','centralized AC',2,'pending','noida','63'),(6,2,'Sale','c-123','flat','resale',200,'Near vaishali metro station','S','Private Villa',6000000,5800000,'fully furnished','centralized AC',2,'pending','noida','62');
/*!40000 ALTER TABLE `seller_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_registration`
--

DROP TABLE IF EXISTS `user_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_registration` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique user response id',
  `name` varchar(20) NOT NULL COMMENT 'user name',
  `contact_no` varchar(10) NOT NULL COMMENT 'user contact number',
  `email` varchar(50) DEFAULT NULL,
  `user_name` varchar(20) NOT NULL COMMENT 'user login name',
  `password` varchar(15) NOT NULL COMMENT 'user password for login',
  `status` enum('t','f') DEFAULT 't' COMMENT 'status for soft delete',
  `user_type` enum('u','b','a') DEFAULT NULL,
  PRIMARY KEY (`user_id`,`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_registration`
--

LOCK TABLES `user_registration` WRITE;
/*!40000 ALTER TABLE `user_registration` DISABLE KEYS */;
INSERT INTO `user_registration` VALUES (1,'Amber Sharma','9910670050','amber.sharma@osscube.com','amber','12345','t','a'),(2,'Mohit Gupta','1234567890','mohit.gupta@osscube.','mohit','123457','t','b'),(3,'Satyavir Sinha','1234567891','satyavir.sinha@osscu','satyavir','123458','t','u'),(4,'Chandan Kumar','1234567892','chandan.kumar@osscub','chandan','123459','t','u'),(14,'debanshu','8888888888','debanshu@osscube.com','debanshu','123123','f','u'),(15,'debanshu','8888888888','debanshu@gmail.com','debanshu','121212','f','u'),(20,'debanshu','9312640379','mohit.gupta@osscube.com','mohitmink','k3efvv','t','u');
/*!40000 ALTER TABLE `user_registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_search`
--

DROP TABLE IF EXISTS `user_search`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique id for search table ',
  `feedback_by` int(11) NOT NULL COMMENT 'reference to user_registration(user_id)',
  `property_id` int(11) NOT NULL COMMENT 'reference to seller_table(property_id)',
  `search_time` datetime NOT NULL COMMENT 'time when user search the property',
  `status` enum('buy','pending') DEFAULT 'pending' COMMENT 'status of user search',
  `status_d` enum('t','f') DEFAULT 't' COMMENT 'status for soft delete',
  PRIMARY KEY (`id`),
  KEY `property_response_id` (`property_id`),
  CONSTRAINT `property_response_id` FOREIGN KEY (`property_id`) REFERENCES `seller_table` (`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_search`
--

LOCK TABLES `user_search` WRITE;
/*!40000 ALTER TABLE `user_search` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_search` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `login`
--

/*!50001 DROP TABLE IF EXISTS `login`*/;
/*!50001 DROP VIEW IF EXISTS `login`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_swedish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `login` AS select `user_registration`.`user_name` AS `user_name`,`user_registration`.`password` AS `password`,`user_registration`.`user_type` AS `user_type` from `user_registration` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-21 20:40:07
