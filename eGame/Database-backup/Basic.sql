-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: eGaming
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.37-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `bill` (
  `B_ID` int(11) NOT NULL AUTO_INCREMENT,
  `B_date_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `P_method` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`B_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
INSERT INTO `bill` VALUES (1,'2018-11-29 20:41:21','Bank Transfer'),(2,'2018-11-29 20:42:23','Bank Transfer'),(3,'2018-11-29 20:48:52','Bank Transfer'),(4,'2018-11-29 20:48:59','Bank Transfer'),(5,'2018-11-29 20:50:53','Bank Transfer');
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `categorie` (
  `C_ID` int(11) NOT NULL AUTO_INCREMENT,
  `C_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`C_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Mobiles'),(2,'Montiers'),(3,'CPUS'),(4,'GPUS');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `has_1`
--

DROP TABLE IF EXISTS `has_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `has_1` (
  `O_ID` int(11) DEFAULT NULL,
  `B_ID` int(11) DEFAULT NULL,
  UNIQUE KEY `O_ID` (`O_ID`,`B_ID`),
  KEY `B_ID` (`B_ID`),
  CONSTRAINT `has_1_ibfk_1` FOREIGN KEY (`O_ID`) REFERENCES `orders` (`O_ID`),
  CONSTRAINT `has_1_ibfk_2` FOREIGN KEY (`B_ID`) REFERENCES `bill` (`B_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `has_1`
--

LOCK TABLES `has_1` WRITE;
/*!40000 ALTER TABLE `has_1` DISABLE KEYS */;
INSERT INTO `has_1` VALUES (2,3),(3,4),(4,5);
/*!40000 ALTER TABLE `has_1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `has_2`
--

DROP TABLE IF EXISTS `has_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `has_2` (
  `B_ID` int(11) DEFAULT NULL,
  `P_ID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  UNIQUE KEY `B_ID` (`B_ID`,`P_ID`),
  KEY `P_ID` (`P_ID`),
  CONSTRAINT `has_2_ibfk_1` FOREIGN KEY (`B_ID`) REFERENCES `bill` (`B_ID`),
  CONSTRAINT `has_2_ibfk_2` FOREIGN KEY (`P_ID`) REFERENCES `product` (`P_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `has_2`
--

LOCK TABLES `has_2` WRITE;
/*!40000 ALTER TABLE `has_2` DISABLE KEYS */;
INSERT INTO `has_2` VALUES (2,1,2),(3,1,5),(4,1,5),(5,1,9);
/*!40000 ALTER TABLE `has_2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders` (
  `O_ID` int(11) NOT NULL AUTO_INCREMENT,
  `O_Status` varchar(200) DEFAULT NULL,
  `U_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`O_ID`),
  KEY `U_ID` (`U_ID`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `users` (`U_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'Awating conformation',1),(2,'Awating conformation',1),(3,'Awating conformation',1),(4,'Awating conformation',1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `product` (
  `P_ID` int(11) NOT NULL AUTO_INCREMENT,
  `P_name` varchar(200) DEFAULT NULL,
  `P_desc` varchar(1000) DEFAULT NULL,
  `P_price` float DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'GTX 1080','GTX 1080',5000,'product_imgs/gtx1070.jpg','Avalible',5),(2,'GTX 1070','GTX 1070',2000,'product_imgs/gtx1080.jpg','',5);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sorted_under`
--

DROP TABLE IF EXISTS `sorted_under`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sorted_under` (
  `P_ID` int(11) DEFAULT NULL,
  `C_ID` int(11) DEFAULT NULL,
  UNIQUE KEY `P_ID` (`P_ID`,`C_ID`),
  KEY `C_ID` (`C_ID`),
  CONSTRAINT `sorted_under_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `product` (`P_ID`),
  CONSTRAINT `sorted_under_ibfk_2` FOREIGN KEY (`C_ID`) REFERENCES `categorie` (`C_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sorted_under`
--

LOCK TABLES `sorted_under` WRITE;
/*!40000 ALTER TABLE `sorted_under` DISABLE KEYS */;
/*!40000 ALTER TABLE `sorted_under` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `U_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Permission` int(11) NOT NULL,
  `N_first` varchar(10) NOT NULL,
  `N_middle` varchar(10) NOT NULL,
  `N_last` varchar(10) NOT NULL,
  `City_name` varchar(20) NOT NULL,
  `Zip_code` varchar(10) NOT NULL,
  `L_IP` varchar(200) DEFAULT NULL,
  `L_RNG_Cookie` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`U_ID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin',1,'admin','admin','admin','admin','admin','::1','423826694','admin','admin','admin'),(2,'x','x',0,'x','x','x','x','x',NULL,NULL,NULL,NULL,NULL);
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

-- Dump completed on 2018-11-29 21:02:41
