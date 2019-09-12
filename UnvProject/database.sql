CREATE DATABASE  IF NOT EXISTS `project1` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `project1`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: project1
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.28-MariaDB

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
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency` (
  `currency_id` varchar(20) NOT NULL,
  `currency_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES ('AED','AED'),('BHD','BHD'),('DKK','DKK'),('EUR','EUR'),('GBP','GBP'),('HKD','HKD'),('IDR','IDR'),('INR','INR'),('ISK','ISK'),('JPY','JPY'),('KWD','KWD'),('LYD','LYD'),('MXN','MXN'),('NZD','NZD'),('OMR','OMR'),('QAR','QAR'),('RUB','RUB'),('SAR','SAR'),('SEK','SEK'),('TRY','TRY'),('USD','USD');
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exchange_rate`
--

DROP TABLE IF EXISTS `exchange_rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exchange_rate` (
  `from_currency` varchar(20) DEFAULT NULL,
  `to_currency` varchar(20) DEFAULT NULL,
  `e_id` varchar(20) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exchange_rate`
--

LOCK TABLES `exchange_rate` WRITE;
/*!40000 ALTER TABLE `exchange_rate` DISABLE KEYS */;
INSERT INTO `exchange_rate` VALUES ('3.672767','0.272274','AED'),('0.377002','2.652506','BHD'),('6.254854','0.159876','DKK'),('0.840576','1.18966','EUR'),('0.742261','1.347235','GBP'),('7.811422','0.128018','HKD'),('13529.339','7.4E-5','IDR'),('64.53065','0.015497','INR'),('103.434685','0.009668','ISK'),('112.15771','0.008916','JPY'),('0.302125','3.309894','KWD'),('1.3637','0.733299','LYD'),('18.629335','0.053679','MXN'),('1.451951','0.688728','NZD'),('0.384531','2.600574','OMR'),('3.713499','0.269288','QAR'),('58.891926','0.01698','RUB'),('3.750209','0.266652','SAR'),('8.342682','0.119866','SEK'),('3.914765','0.255443','TRY'),('3.75','3.75','USD');
/*!40000 ALTER TABLE `exchange_rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rconvert`
--

DROP TABLE IF EXISTS `rconvert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rconvert` (
  `u_id` varchar(20) NOT NULL,
  `currency_id` varchar(20) NOT NULL,
  PRIMARY KEY (`u_id`,`currency_id`),
  KEY `currency_id` (`currency_id`),
  CONSTRAINT `rconvert_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`),
  CONSTRAINT `rconvert_ibfk_2` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rconvert`
--

LOCK TABLES `rconvert` WRITE;
/*!40000 ALTER TABLE `rconvert` DISABLE KEYS */;
/*!40000 ALTER TABLE `rconvert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rhas`
--

DROP TABLE IF EXISTS `rhas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rhas` (
  `e_id` varchar(20) NOT NULL,
  `currency_id` varchar(20) NOT NULL,
  PRIMARY KEY (`e_id`,`currency_id`),
  KEY `currency_id` (`currency_id`),
  CONSTRAINT `rhas_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `exchange_rate` (`e_id`),
  CONSTRAINT `rhas_ibfk_2` FOREIGN KEY (`currency_id`) REFERENCES `currency` (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rhas`
--

LOCK TABLES `rhas` WRITE;
/*!40000 ALTER TABLE `rhas` DISABLE KEYS */;
/*!40000 ALTER TABLE `rhas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `u_id` varchar(20) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','admin','admin',20,'admin@gmail.com');
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

-- Dump completed on 2017-12-02  5:54:13
