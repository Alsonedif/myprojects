-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: egaming
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
INSERT INTO `bill` VALUES (1,'2018-11-29 20:41:21','Bank Transfer'),(2,'2018-11-29 20:42:23','Bank Transfer'),(3,'2018-11-29 20:48:52','Bank Transfer'),(4,'2018-11-29 20:48:59','Bank Transfer'),(5,'2018-11-29 20:50:53','Bank Transfer'),(6,'2018-11-30 12:44:06','Bank Transfer'),(7,'2018-11-30 16:22:40','Bank Transfer'),(8,'2018-11-30 16:23:29','Bank Transfer'),(9,'2018-11-30 18:22:56','Bank Transfer'),(10,'2018-11-30 18:23:59','Bank Transfer'),(11,'2018-12-01 23:58:59','Bank Transfer'),(12,'2018-12-01 23:59:07','Bank Transfer');
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
INSERT INTO `has_1` VALUES (2,3),(3,4),(4,5),(5,6),(6,7),(7,8),(8,9),(9,10),(10,11),(11,12);
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
INSERT INTO `has_2` VALUES (2,1,2),(3,1,5),(4,1,5),(5,1,9),(6,1,4),(7,2,5),(8,2,5),(9,2,6),(10,2,5),(11,17,1),(12,15,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'Awating conformation',1),(2,'Canceld',1),(3,'Awating conformation',1),(4,'Canceld',1),(5,'Awating conformation',3),(6,'Awating conformation',1),(7,'Canceld',1),(8,'Canceld',1),(9,'Canceld',1),(10,'Awating conformation',1),(11,'Awating conformation',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'GTX 1080','GTX 1080',5000,'product_imgs/gtx1070.jpg','Avalible',5),(2,'GTX 1070','GTX 1070',2000,'product_imgs/gtx1080.jpg','',5),(3,'Xbox One','Xbox One',2000,'product_imgs/xboxOne.jpg','',2),(4,'Iphone 10','Iphone 10',3999,'product_imgs/iphone10.png','',2),(5,'GTX 1070 ZOTAC','GTX 1070 ZOTAC',2000,'product_imgs/gtx1070 ZOTAC.jpg','',5),(6,'ASUS Gaming Laptop','ASUS Gaming Laptop',3500,'product_imgs/asus gaming laptop.jpg','',5),(7,'PS4 SLIM','PS4 SLIM',2000,'product_imgs/ps4-slim.jpg','',5),(8,'PS3','PS3',2500,'product_imgs/ps3-spechil.jpg','',3),(9,'PS3 SLIM','PS3 SLIM',2500,'product_imgs/ps3.png','',2),(10,'Iphone 4S','Iphone 4S',999,'product_imgs/iphone 4s.png','',5),(11,'GTX 1070 PNY','GTX 1070 PNY',2500,'product_imgs/gtx1070-PNY.jpg','',2),(12,'GTX 1080 ASUS','GTX 1080 ASUS',2500,'product_imgs/gtx1080-asus.jpg','',2),(13,'GTX 1070 GIGYBATE','GTX 1070 GIGYBATE',2555,'product_imgs/gtx1070-gigabyte.jpg','',2),(14,'GTX 1080 STRIX','GTX 1080 STRIX',2555,'product_imgs/gtx1080-asus-strix.jpg','',2),(15,'I5-6600k CPU','I5-6600k CPU',2222,'product_imgs/i5-6600k.jpg','',2),(16,'I7-7700K CPU','I7-7700K CPU',2222,'product_imgs/i7-7700k.jpg','',5),(17,'I7 8700K CPU','I7 8700K CPU',3333,'product_imgs/i7-8700k.png','',2),(18,'GTX 1080 MSI','GTX 1080 MSI',2500,'product_imgs/gtx1080-MSI.jpg','',2),(19,'GTX 1080 Ti MSI','GTX 1080 Ti MSI',3000,'product_imgs/gtx1080-MSI.jpg','',2),(20,'GTX 1070 STOCK','GTX 1070 STOCK',2222,'product_imgs/gtx1070.jpg','',5),(21,'GTX 1080 TI ASUS','GTX 1080 TI ASUS',3333,'product_imgs/gtx1080-asus-strix.jpg','',5),(22,'GTX 1080 TI MSI','GTX 1080 TI MSI',3333,'product_imgs/gtx1080-MSI.jpg','',5),(23,'GTX 1080 TI ZOTAC','GTX 1080 TI ZOTAC',3333,'product_imgs/gtx1070 ZOTAC.jpg','',5),(24,'PS4 PRO','PS4 PRO',2555,'product_imgs/ps4-slim.jpg','',5);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin',1,'admin','admin','admin','admin','admin','::1','580999432','admin','admin','admin'),(2,'x','x',0,'x','x','x','x','x',NULL,NULL,NULL,NULL,NULL),(3,'testmyself','123456',0,'d','d','d','ddd','8888','::1','1068606829','test@test.test','dddd','Afghanistan');
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

-- Dump completed on 2018-12-02 13:52:02
