CREATE DATABASE  IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;
-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: test
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `parts`
--

DROP TABLE IF EXISTS `parts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parts`
--

LOCK TABLES `parts` WRITE;
/*!40000 ALTER TABLE `parts` DISABLE KEYS */;
INSERT INTO `parts` VALUES (3,'Fog Light Trim','Light','Ferrari',107.99),(6,'DIP Wheels Slack D66','Wheel','Ferrari',154.7),(8,'Rock Crawler 51 Wheel','Wheel','Ferrari',55.99),(9,'Air Flow Sensor Adapter','Inner Parts','Ferrari',29.36),(10,'Fuel Injector O-Ring','Inner Parts','Ferrari',17.87),(13,'Tie Rod End Boot','Inner Parts','Ferrari',11.83),(16,'Cowles Grille Trim','Exterior Parts','Ferrari',16.48),(17,'Leatherette Seat Cover','Exterior Parts','Honda',25.23),(18,'PCV Valve','Inner Parts','Honda',7.11),(19,'Fender','Exterior Parts','Honda',111.98),(20,'Brake Disc','Wheel','Honda',77.42),(21,'Temperature Sensor','Inner Parts','Honda',20.31),(22,'Fog Light ','Light','Honda',34.68),(23,'Hood Release Handle','Inner Parts','Lexus',24.57),(24,'Hood Bumper','Exterior Parts','Lexus',14.33),(25,'Wheels Spacer','Wheel','Lexus',20.37),(26,'Tailgate Handle','Inner Parts','Lexus',66.37),(27,'Proforged Chassis Parts','Inner Parts','Mazda',35.17),(28,'Fuel Cell','Inner Parts','Mazda',192.7),(29,'Cylinder Cover','Exterior Parts','Mazda',20.7),(30,'Door Open Warning Switch','Exterior Parts','Ford',18.08),(31,'Door Sill Plate Set','Exterior Part','Ford',115.99),(32,'Engine Cooling Fan','Exterior Parts','Ford',90.98),(33,'Wheel Assembly','wheel','Ford',168.33),(34,'Fuel Filter Cap','Exterior Part','Ford',29.95),(35,'Fuel Pressure Regulator','Inner Parts','Ford',125.33),
(36,'Head Light Switch','Light','Ford',63.33),(37,'Oil Drain Plug','Inner Parts','Ford',2.98),(38,'Parking Brake Hardware Kit','Inner Parts','Ford',17.73),(39,'Power Steering Pump','Inner Parts','Ford',164.33),(40,'Power Window Motor Connector','Exterior Parts','ford',15.08)
,(41,'Pressure Feedback Sensor','Inner Parts','Ford',63.33),(42,'Engine Mount','Inner Parts','Jaguar',200.48),(43,'Spark Plug','Inner Parts','Jaguar',13.48),(44,'Brake Rotor','Inner Parts','Jaguar',194.44),(45,'Radiator','Inner Parts','Audi',132.23);
/*!40000 ALTER TABLE `parts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin@admin','admin',2),(2,'pxs162330@utdallas.edu','salvatore',2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-17 18:31:16
