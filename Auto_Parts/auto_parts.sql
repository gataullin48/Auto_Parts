CREATE DATABASE  IF NOT EXISTS `test`;
USE `test`;



DROP TABLE IF EXISTS `parts`;
CREATE TABLE `parts` (
 id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 name varchar(45) NOT NULL,
 position varchar(45) NOT NULL,
 type varchar(45) NOT NULL,
 price double NOT NULL,
 QUANTITY int(15) DEFAULT '5'
);


/*LOCK TABLES `parts` WRITE;*/
INSERT INTO `parts` VALUES (3,'Fog Light Trim','Light','Ferrari',107.99,5),(6,'DIP Wheels Slack D66','Wheel','Ferrari',154.7,7),(8,'Rock Crawler 51 Wheel','Wheel','Ferrari',55.99,5),(9,'Air Flow Sensor Adapter','Inner Parts','Ferrari',29.36,8),(10,'Fuel Injector O-Ring','Inner Parts','Ferrari',17.87,5),(13,'Tie Rod End Boot','Inner Parts','Ferrari',11.83,10),(16,'Cowles Grille Trim','Exterior Parts','Ferrari',16.48,12),(17,'Leatherette Seat Cover','Exterior Parts','Honda',25.23,21),(18,'PCV Valve','Inner Parts','Honda',7.11,10),(19,'Fender','Exterior Parts','Honda',111.98,5),(20,'Brake Disc','Wheel','Honda',77.42,18),(21,'Temperature Sensor','Inner Parts','Honda',20.31,70),(22,'Fog Light ','Light','Honda',34.68,54),(23,'Hood Release Handle','Inner Parts','Lexus',24.57,14),(24,'Hood Bumper','Exterior Parts','Lexus',14.33,7),(25,'Wheels Spacer','Wheel','Lexus',20.37,30),(26,'Tailgate Handle','Inner Parts','Lexus',66.37,75),(27,'Proforged Chassis Parts','Inner Parts','Mazda',35.17,20),(28,'Fuel Cell','Inner Parts','Mazda',192.7,10),(29,'Cylinder Cover','Exterior Parts','Mazda',20.7,20),(30,'Door Open Warning Switch','Exterior Parts','Ford',18.08,10),(31,'Door Sill Plate Set','Exterior Part','Ford',115.99,30),(32,'Engine Cooling Fan','Exterior Parts','Ford',90.98,25),(33,'Wheel Assembly','wheel','Ford',168.33,40),(34,'Fuel Filter Cap','Exterior Part','Ford',29.95,35),(35,'Fuel Pressure Regulator','Inner Parts','Ford',125.33,30),
(36,'Head Light Switch','Light','Ford',63.33,30),(37,'Oil Drain Plug','Inner Parts','Ford',2.98,30),(38,'Parking Brake Hardware Kit','Inner Parts','Ford',17.73,25),(39,'Power Steering Pump','Inner Parts','Ford',164.33,25),(40,'Power Window Motor Connector','Exterior Parts','ford',15.08,25)
,(41,'Pressure Feedback Sensor','Inner Parts','Ford',63.33,50),(42,'Engine Mount','Inner Parts','Jaguar',200.48,50),(43,'Spark Plug','Inner Parts','Jaguar',13.48,50),(44,'Brake Rotor','Inner Parts','Jaguar',194.44,50),(45,'Radiator','Inner Parts','Audi',132.23,50);
/*UNLOCK TABLES;*/

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
 id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 email varchar(45) NOT NULL,
 password varchar(45) NOT NULL,
 rank int(11) NOT NULL
);

CREATE TABLE ORDERS
(ORDERID INT(11) NOT NULL,
USERID INT(11) NOT NULL,
ITEMID INT(11) NOT NULL,
COUNT INT(11) NOT NULL,
ORDER_DATE DATETIME NOT NULL);

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
INSERT INTO `user` VALUES (1,'admin@admin','admin',2);
UNLOCK TABLES;

