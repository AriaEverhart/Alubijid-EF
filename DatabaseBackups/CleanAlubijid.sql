-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for osx10.6 (i386)
--
-- Host: localhost    Database: CleanAlubijid
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `Community_Organization`
--

DROP TABLE IF EXISTS `Community_Organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Community_Organization` (
  `Community_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Community_Name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Community_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Community_Organization`
--

LOCK TABLES `Community_Organization` WRITE;
/*!40000 ALTER TABLE `Community_Organization` DISABLE KEYS */;
INSERT INTO `Community_Organization` VALUES (1,'Religious'),(2,'Youth'),(3,'Cultural'),(4,'Political'),(5,'Womens'),(6,'Agricultural'),(7,'Labor'),(8,'Civic'),(9,'Cooperatives'),(10,'Senior Citizens'),(11,'Others');
/*!40000 ALTER TABLE `Community_Organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nutritional_Status`
--

DROP TABLE IF EXISTS `Nutritional_Status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Nutritional_Status` (
  `Nutrition_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nutrition_Description` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Nutrition_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nutritional_Status`
--

LOCK TABLES `Nutritional_Status` WRITE;
/*!40000 ALTER TABLE `Nutritional_Status` DISABLE KEYS */;
INSERT INTO `Nutritional_Status` VALUES (1,'Above Normal'),(2,'Normal'),(3,'Below Normal(moderate)'),(4,'Below Normal(severe)');
/*!40000 ALTER TABLE `Nutritional_Status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Other_Comm_Orgs`
--

DROP TABLE IF EXISTS `Other_Comm_Orgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Other_Comm_Orgs` (
  `Other_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Other_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Other_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Other_Comm_Orgs`
--

LOCK TABLES `Other_Comm_Orgs` WRITE;
/*!40000 ALTER TABLE `Other_Comm_Orgs` DISABLE KEYS */;
/*!40000 ALTER TABLE `Other_Comm_Orgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Resident`
--

DROP TABLE IF EXISTS `Resident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Resident` (
  `Resident_ID` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Age` int(200) DEFAULT NULL,
  `Registered_Voter` varchar(1) DEFAULT NULL,
  `Voted` varchar(1) DEFAULT NULL,
  `Nutrition_ID` int(11) DEFAULT NULL,
  `Community_ID` int(11) DEFAULT NULL,
  `Other_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Resident_ID`),
  KEY `Nutrition_ID` (`Nutrition_ID`),
  KEY `Community_ID` (`Community_ID`),
  KEY `Other_ID` (`Other_ID`),
  CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`Nutrition_ID`) REFERENCES `Nutritional_Status` (`Nutrition_ID`),
  CONSTRAINT `resident_ibfk_2` FOREIGN KEY (`Community_ID`) REFERENCES `Community_Organization` (`Community_ID`),
  CONSTRAINT `resident_ibfk_3` FOREIGN KEY (`Other_ID`) REFERENCES `Other_Comm_Orgs` (`Other_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Resident`
--

LOCK TABLES `Resident` WRITE;
/*!40000 ALTER TABLE `Resident` DISABLE KEYS */;
/*!40000 ALTER TABLE `Resident` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-05 22:06:19
