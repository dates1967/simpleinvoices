-- MySQL dump 10.11
--
-- Host: localhost    Database: genluStable
-- ------------------------------------------------------
-- Server version	5.0.45-Debian_1-log

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
-- Current Database: `genluStable`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `genluStable` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `genluStable`;

--
-- Table structure for table `genlu_biller`
--

DROP TABLE IF EXISTS `genlu_biller`;
CREATE TABLE `genlu_biller` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `street_address` varchar(255) default NULL,
  `street_address2` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  `state` varchar(255) default NULL,
  `zip_code` varchar(255) default NULL,
  `country` varchar(255) default NULL,
  `phone` varchar(255) default NULL,
  `mobile_phone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `logo` varchar(255) default NULL,
  `footer` text,
  `notes` text,
  `custom_field1` varchar(255) default NULL,
  `custom_field2` varchar(255) default NULL,
  `custom_field3` varchar(255) default NULL,
  `custom_field4` varchar(255) default NULL,
  `enabled` varchar(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genlu_biller`
--

LOCK TABLES `genlu_biller` WRITE;
/*!40000 ALTER TABLE `genlu_biller` DISABLE KEYS */;
INSERT INTO `genlu_biller` VALUES (1,'Mr Plough','43 Evergreen Terace','','Springfield','New York','90245','','04 5689 0456','0456 4568 8966','04 5689 8956','homer@mrplough.com','ubuntulogo.png','','','','7898-87987-87','','','1'),(2,'Homer Simpson','43 Evergreen Terace',NULL,'Springfield','New York','90245',NULL,'04 5689 0456','0456 4568 8966','04 5689 8956','homer@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(3,'The Beer Baron','43 Evergreen Terace',NULL,'Springfield','New York','90245',NULL,'04 5689 0456','0456 4568 8966','04 5689 8956','beerbaron@yahoo.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(4,'Fawlty Towers','13 Seaside Drive',NULL,'Torquay','Brixton on Avon','65894','United Kingdom','089 6985 4569','0425 5477 8789','089 6985 4568','penny@fawltytowers.co.uk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `genlu_biller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genlu_customers`
--

DROP TABLE IF EXISTS `genlu_customers`;
CREATE TABLE `genlu_customers` (
  `id` int(10) NOT NULL auto_increment,
  `customer_short_id` char(255) default NULL,
  `attention` varchar(255) default NULL,
  `name` varchar(255) default NULL,
  `street_address` varchar(255) default NULL,
  `street_address2` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  `state` varchar(255) default NULL,
  `zip_code` varchar(255) default NULL,
  `country` varchar(255) default NULL,
  `phone` varchar(255) default NULL,
  `mobile_phone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `website` varchar(255) default NULL,
  `shipping_address` varchar(255) default NULL,
  `shipping_address2` varchar(255) default NULL,
  `shipping_city` varchar(255) default NULL,
  `shipping_state` varchar(255) default NULL,
  `shipping_zip_code` varchar(255) default NULL,
  `shipping_country` varchar(255) default NULL,
  `shipping_phone` varchar(255) default NULL,
  `shipping_fax` varchar(255) default NULL,
  `shipping_email` varchar(255) default NULL,
  `notes` text,
  `enabled` varchar(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genlu_customers`
--

LOCK TABLES `genlu_customers` WRITE;
/*!40000 ALTER TABLE `genlu_customers` DISABLE KEYS */;
INSERT INTO `genlu_customers` VALUES (1,'MI101','Salim','Watch Time Inc.','121 E Flagler St.',NULL,'Miami','FL','33132','USA','(305) 539-0515',NULL,'(305) 539-0515','sales@WatchTimeInc.com','http://www.watchtimeinc.com','121 E Flagler St.',NULL,'Miami','FL','33132','USA','(305) 539-0515',NULL,NULL,NULL,'1'),(2,'MI102','Ali','Watch Plaza','30 Ne 1st Avenue',NULL,'Miami','FL','33132','USA','305-358-0440',NULL,NULL,NULL,NULL,'30 Ne 1st Avenue',NULL,'Miami','FL','33132','USA',NULL,NULL,NULL,NULL,'1'),(6,'MI103','Pablo','Watchland',NULL,'Dolphin Mall','Miami','FL',NULL,'USA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(7,'MI111','Joey','Mr Watch','Aventura Mall','','Miami','FL','','USA','','','','','','Aventura Mall','','','','','','','','','','1'),(8,'MI143','Juan David','Time Station','1455 NW 107 Avenue',NULL,'Miami','FL','33172','USA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(9,'MI106',NULL,'Time Square','Dadeland Mall',NULL,'Miami','FL',NULL,'USA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(10,'VE101',NULL,'ITAPAL C.A.','AVE. MIRANDA ESTE #10',NULL,'MARACAY','EDO. ARAGUA',NULL,'VENEZUELA','0412-349-2992',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(11,'',NULL,'Ramiro Quinteros',NULL,NULL,'Bucaramanga',NULL,NULL,'Colombia',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(12,'Damasco II','Sra Anabel Monteiro','JoyerÃ­a Damasco II CA','Calle Dr. Carias Edf. Alfa, Mezanina,','Local #5','La Victoria','Edo. Aragua',NULL,'Venezuela',NULL,NULL,NULL,NULL,NULL,'Sra Anabel Monteiro','Calle Dr. Carias Edf. Alfa, Mezanina, Local #5','La Victoria','Edo. Aragua',NULL,'Venezuela',NULL,NULL,NULL,NULL,'1'),(13,'VE134','DANIEL CORONA','JoyerÃ­a Armenia','Av. Los Leones C.C. Paris','Local 1-21  P.B','Barquisimeto',NULL,NULL,'Venezuela','0058-251-2543067','0416-3585227',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Venezuela',NULL,NULL,NULL,NULL,'1'),(14,'VE164','Freddy Garcia','Adrian Joyas','Centro Comercial Las Americas','Planta Baja, Local 060','Maracay','Estado Aragua',NULL,'Venezuela','0414-4589515','0243-2323359','0243-2327724',NULL,NULL,'Centro Comercial Las Americas','Planta Baja, Local 060','Maracay','Estado Aragua',NULL,'Venezuela',NULL,NULL,NULL,NULL,'1'),(15,'VE444','SR SAMIH','Casa Odett',NULL,NULL,NULL,NULL,NULL,'Venezuela','58255-621-0985',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1'),(16,'MI001','Mr. Pablo','Genta Group LLC','Dolphin Mall',NULL,'Miami','Florida','33172','USA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `genlu_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genlu_info`
--

DROP TABLE IF EXISTS `genlu_info`;
CREATE TABLE `genlu_info` (
  `name` varchar(255) NOT NULL,
  `street_address` varchar(255) default NULL,
  `street_address2` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  `state` varchar(255) default NULL,
  `zip_code` varchar(255) default NULL,
  `country` varchar(255) default NULL,
  `contact` varchar(255) default NULL,
  `contact2` varchar(255) default NULL,
  `phone` varchar(255) default NULL,
  `phone2` varchar(255) default NULL,
  `mobile` varchar(255) default NULL,
  `mobile2` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `fax2` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `email2` varchar(255) default NULL,
  `website` varchar(255) default NULL,
  `logo` varchar(255) default NULL,
  `bank_name` varchar(255) default NULL,
  `bank_account_number` varchar(255) default NULL,
  `bank_aba` varchar(255) default NULL,
  `bank_swift` varchar(255) default NULL,
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genlu_info`
--

LOCK TABLES `genlu_info` WRITE;
/*!40000 ALTER TABLE `genlu_info` DISABLE KEYS */;
INSERT INTO `genlu_info` VALUES ('GENLU L.L.C.',NULL,NULL,'Miami','FL',NULL,'USA','Federico','Joseph','786-975-4482',' 0414-431-9805',NULL,NULL,NULL,NULL,'genludistributors@gmail.com',NULL,NULL,NULL,'Wachovia Bank','2000035992165','063000021','P N B P U S 33');
/*!40000 ALTER TABLE `genlu_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `genlu_inventory_purchases`
--

DROP TABLE IF EXISTS `genlu_inventory_purchases`;
/*!50001 DROP VIEW IF EXISTS `genlu_inventory_purchases`*/;
/*!50001 CREATE TABLE `genlu_inventory_purchases` (
  `product_id` int(10),
  `total_purchases` decimal(33,0)
) */;

--
-- Temporary table structure for view `genlu_inventory_sales`
--

DROP TABLE IF EXISTS `genlu_inventory_sales`;
/*!50001 DROP VIEW IF EXISTS `genlu_inventory_sales`*/;
/*!50001 CREATE TABLE `genlu_inventory_sales` (
  `product_id` int(10),
  `total_sales` decimal(32,0)
) */;

--
-- Temporary table structure for view `genlu_inventory_status`
--

DROP TABLE IF EXISTS `genlu_inventory_status`;
/*!50001 DROP VIEW IF EXISTS `genlu_inventory_status`*/;
/*!50001 CREATE TABLE `genlu_inventory_status` (
  `reference` varchar(255),
  `id` int(11),
  `total_purchases` decimal(33,0),
  `total_sales` decimal(32,0),
  `total` decimal(56,0)
) */;

--
-- Temporary table structure for view `genlu_product_cost_view`
--

DROP TABLE IF EXISTS `genlu_product_cost_view`;
/*!50001 DROP VIEW IF EXISTS `genlu_product_cost_view`*/;
/*!50001 CREATE TABLE `genlu_product_cost_view` (
  `reference` varchar(255),
  `last_unit_cost` decimal(25,2),
  `avg` decimal(59,2)
) */;

--
-- Table structure for table `genlu_products`
--

DROP TABLE IF EXISTS `genlu_products`;
CREATE TABLE `genlu_products` (
  `id` int(11) NOT NULL auto_increment,
  `reference` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(255) default NULL,
  `last_unit_cost` decimal(25,2) default NULL,
  `us_retail` decimal(25,2) default NULL,
  `price_level_A` decimal(25,2) default NULL,
  `price_level_B` decimal(25,2) default NULL,
  `price_level_C` decimal(25,2) default NULL,
  `price_level_D` decimal(25,2) default NULL,
  `qty_hand` int(10) default '0',
  `notes` text,
  `enabled` varchar(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `reference` (`reference`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genlu_products`
--

LOCK TABLES `genlu_products` WRITE;
/*!40000 ALTER TABLE `genlu_products` DISABLE KEYS */;
INSERT INTO `genlu_products` VALUES (1,'CSX02','Technomarine Watch','technomarine','128.17','300.00','156.00','0.00','0.00','0.00',0,'','1'),(2,'CSX05','Technomarine Watch','technomarine','126.00','300.00','156.00','0.00','0.00','0.00',-7,'','1'),(3,'CSX09','Technomarine Watch','technomarine','126.00','300.00','156.00','0.00','0.00','0.00',-1,'','1'),(4,'RSX02','Technomarine Watch','technomarine','130.20','310.00','186.00','170.55','0.00','0.00',11,'notitas','1'),(5,'RSX05','Technomarine Watch','technomarine','130.20','310.00','161.20','0.00','0.00','0.00',9,'','1'),(6,'RSX12','Technomarine Watch','technomarine','130.20','310.00','186.00','170.55','0.00','0.00',4,'','1'),(8,'SST11','Technomarine Watch','technomarine','0.00','350.00','182.00','0.00','0.00','0.00',-7,'','1'),(9,'SST14','Technomarine Watch','technomarine','0.00','350.00','182.00','0.00','0.00','0.00',-4,'','1'),(10,'SST16','Technomarine Watch','technomarine','147.00','350.00','182.00','0.00','0.00','0.00',-9,'','1'),(11,'RSX15','Technomarine Watch','technomarine','130.20','310.00','161.20','0.00','0.00','0.00',-3,'','1'),(12,'RSX18','Technomarine Watch','technomarine','130.20','310.00','161.20','0.00','0.00','0.00',4,'','1'),(13,'TMY05','Technomarine Watch','technomarine','205.36','475.00','247.00','0.00','0.00','0.00',1,'','1'),(14,'TMY02','Technomarine Watch','technomarine','213.17','475.00','247.00','0.00','0.00','0.00',-1,'','1'),(15,'TMAXS07','Technomarine Watch','technomarine','82.21','190.00','98.80','0.00','0.00','0.00',7,'','1'),(16,'TMAXS22','Technomarine Watch','technomarine','81.44','190.00','98.80','0.00','0.00','0.00',6,'','1'),(17,'CSX11','Technomarine Watch','technomarine','126.00','300.00','156.00','0.00','0.00','0.00',-1,'','1'),(18,'TMCS37','Technomarine Watch','technomarine','171.71','400.00','208.00','0.00','0.00','0.00',1,'','1'),(19,'TMCS05','Technomarine Watch','technomarine','171.71','400.00','208.00','0.00','0.00','0.00',0,'','1'),(20,'TMCX05','Technomarine Watch','technomarine','181.83','425.00','221.00','0.00','0.00','0.00',17,'','1'),(21,'TMCX02','Technomarine Watch','technomarine','183.00','425.00','221.00','0.00','0.00','0.00',1,'','1'),(22,'SST05','Technomarine Watch','technomarine','147.00','350.00','182.00','0.00','0.00','0.00',4,'','1'),(23,'TMAX07','Technomarine Watch','technomarine','89.13','210.00','108.80','0.00','0.00','0.00',3,'','1'),(24,'TMAX05','Technomarine Watch','technomarine','90.40','210.00','108.80','0.00','0.00','0.00',1,'','1'),(25,'TMAX11','Technomarine Watch','technomarine','0.00','210.00','108.80','0.00','0.00','0.00',-10,'','1'),(26,'SA24000','Swiss Army Watches','swiss','97.50','195.00','117.00','111.15','101.40','0.00',1,'','1'),(27,'SA24001','Swiss Army Watches','swiss','97.50','195.00','117.00','111.15','101.40','0.00',0,'','1'),(28,'SA24002','Swiss Army Watches','swiss','97.50','195.00','117.00','111.15','101.40','0.00',0,'','1'),(29,'SA24003','Swiss Army Watches','swiss','97.50','195.00','117.00','111.15','101.40','0.00',0,'','1'),(30,'SA24005','Swiss Army Watches','swiss','125.00','250.00','150.00','142.50','130.00','0.00',1,'','1'),(31,'SA24016','Swiss Army Watches','swiss','225.00','450.00','270.00','256.50','234.00','0.00',1,'','1'),(32,'SA24017','Swiss Army Watches','swiss','225.00','450.00','270.00','256.50','234.00','0.00',1,'','1'),(33,'SA24037','Swiss Army Watches','swiss','162.50','325.00','195.00','185.25','169.00','0.00',0,'','1'),(34,'SA24096','Swiss Army Watches','swiss','212.50','425.00','255.00','242.25','221.00','0.00',3,'','1'),(35,'SA241035','Swiss Army Watches','swiss','162.50','325.00','195.00','185.25','169.00','0.00',0,'&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;  <br />','1'),(36,'SA24104','Swiss Army Watches','swiss','97.50','195.00','117.00','111.15','101.40','0.00',0,'','1'),(37,'SA241048','Swiss Army Watches','swiss','225.00','450.00','270.00','256.50','234.00','0.00',2,'','1'),(38,'SA241053','Swiss Army Watches','swiss','197.50','395.00','237.00','225.15','205.40','0.00',0,'','1'),(39,'SA241054','Swiss Army Watches','swiss','197.50','395.00','237.00','225.15','205.40','0.00',1,'','1'),(40,'SA241067','Swiss Army Watches','swiss','175.00','350.00','210.00','199.50','182.00','0.00',1,'','1'),(41,'SA24008','Swiss Army Watches','swiss','125.00','250.00','150.00','142.50','130.00','0.00',-2,'','1'),(42,'SA241068','Swiss Army Watches','swiss','147.50','295.00','177.00','168.15','153.40','0.00',-2,'','1'),(43,'SA241069','Swiss Army Watches','swiss','175.00','350.00','210.00','199.50','182.00','0.00',2,'','1'),(44,'SA241070','Swiss Army Watches','swiss','175.00','350.00','210.00','199.50','182.00','0.00',2,'','1'),(45,'SA241120','Swiss Army Watches','swiss','212.50','425.00','255.00','242.25','221.00','0.00',1,'','1'),(46,'SA241121','Swiss Army Watches','swiss','212.50','425.00','255.00','242.25','221.00','0.00',1,'','1'),(47,'SA24126','Swiss Army Watches','swiss','97.50','195.00','117.00','111.15','101.40','0.00',0,'','1'),(48,'SA24135','Swiss Army Watches','swiss','137.50','275.00','165.00','156.75','143.00','0.00',-2,'','1'),(49,'SA24137','Swiss Army Watches','swiss','137.50','275.00','165.00','156.75','143.00','0.00',-2,'','1'),(50,'SA24138','Swiss Army Watches','swiss','162.50','325.00','195.00','185.25','169.00','0.00',0,'','1'),(51,'SA24141','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',1,'','1'),(52,'SA24144','Swiss Army Watches','swiss','212.50','425.00','255.00','242.25','221.00','0.00',2,'','1'),(53,'SA24162','Swiss Army Watches','swiss','597.50','1195.00','717.00','681.15','621.40','0.00',0,'','1'),(54,'SA24178','Swiss Army Watches','swiss','125.00','250.00','150.00','142.50','130.00','0.00',0,'','1'),(55,'SA24179','Swiss Army Watches','swiss','125.00','250.00','150.00','142.50','130.00','0.00',0,'','1'),(56,'SA24180','Swiss Army Watches','swiss','197.50','395.00','237.00','225.15','205.40','0.00',1,'','1'),(57,'SA24314','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',2,'','1'),(58,'SA24331','Swiss Army Watches','swiss','175.00','350.00','210.00','199.50','182.00','0.00',0,'','1'),(59,'SA24332','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',3,'','1'),(60,'SA24715','Swiss Army Watches','swiss','162.50','325.00','195.00','185.25','169.00','0.00',2,'','1'),(61,'SA24727','Swiss Army Watches','swiss','197.50','395.00','237.00','225.15','205.40','0.00',1,'','1'),(62,'SA24728','Swiss Army Watches','swiss','197.50','395.00','237.00','225.15','205.40','0.00',0,'','1'),(63,'SA24771','Swiss Army Watches','swiss','212.50','425.00','255.00','242.25','221.00','0.00',2,'','1'),(64,'SA24772','Swiss Army Watches','swiss','175.00','350.00','210.00','199.50','182.00','0.00',1,'','1'),(65,'SA24773','Swiss Army Watches','swiss','175.00','350.00','210.00','199.50','182.00','0.00',1,'','1'),(66,'SA24835','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',0,'','1'),(67,'SA241044','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',2,'','1'),(68,'SA241045','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',0,'','1'),(69,'SA241046','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',1,'','1'),(70,'SA241051','Swiss Army Watches','swiss','212.50','425.00','255.00','242.25','221.00','0.00',2,'','1'),(71,'SA24666','Swiss Army Watches','swiss','225.00','450.00','270.00','256.50','234.00','0.00',1,'','1'),(72,'SA24490','Swiss Army Watches','swiss','87.50','175.00','105.00','99.75','91.00','0.00',-1,'','1'),(73,'SA24491','Swiss Army Watches','swiss','87.50','175.00','105.00','99.75','91.00','0.00',-1,'','1'),(74,'SA24499','Swiss Army Watches','swiss','87.50','175.00','105.00','99.75','91.00','0.00',0,'','1'),(75,'SA24500','Swiss Army Watches','swiss','87.50','175.00','105.00','99.75','91.00','0.00',0,'','1'),(76,'SA24657','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',2,'','1'),(77,'SA24658','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',2,'','1'),(78,'SA24659','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',3,'','1'),(79,'SA24661','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',1,'','1'),(80,'SA24662','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',1,'','1'),(81,'SA24663','Swiss Army Watches','swiss','187.50','375.00','225.00','213.75','195.00','0.00',2,'','1'),(82,'SA24665','Swiss Army Watches','swiss','225.00','450.00','270.00','256.50','234.00','0.00',2,'','1'),(83,'SA24701','Swiss Army Watches','swiss','175.00','350.00','210.00','199.50','182.00','0.00',2,'','1'),(84,'SA24704','Swiss Army Watches','swiss','175.00','350.00','210.00','199.50','182.00','0.00',2,'','1'),(85,'SA24705','Swiss Army Watches','swiss','175.00','350.00','210.00','199.50','182.00','0.00',1,'','1'),(86,'SA24706','Swiss Army Watches','swiss','175.00','350.00','210.00','199.50','182.00','0.00',2,'','1'),(87,'SA24707','Swiss Army Watches','swiss','175.00','350.00','210.00','199.50','182.00','0.00',1,'','1'),(88,'SA24712','Swiss Army Watches','swiss','212.50','425.00','255.00','242.25','221.00','0.00',1,'','1'),(89,'7207','SS TMY 3 LINKS BAND W BUCKLE\r\n','techno','105.00','250.00',NULL,NULL,NULL,NULL,0,NULL,'1'),(90,'9000','TD/CR TRANSPARENT GEL W/ COVER\r\n','techno','10.50','25.00',NULL,NULL,NULL,NULL,-47,NULL,'1'),(91,'9001','TD/CR TURQUOISE GEL\r\n','techno','10.50','25.00',NULL,NULL,NULL,NULL,-53,NULL,'1'),(92,'9002','TD/CR BABY BLUE GEL\r\n','techno','10.50','25.00',NULL,NULL,NULL,NULL,-64,NULL,'1'),(93,'9003','TD/CR BLUE GEL STRAP W/ COVER\r\n','techno','10.50','25.00',NULL,NULL,NULL,NULL,-25,NULL,'1'),(94,'9004','TD/CR DEEP BLUE GEL\r\n','techno','10.50','25.00',NULL,NULL,NULL,NULL,8,NULL,'1'),(95,'9005','TD/CR BABY PINK GEL\r\n','techno','10.50','25.00',NULL,NULL,NULL,NULL,-15,NULL,'1'),(96,'9010','TD/CR RED GEL\r\n','techno','10.76','25.00',NULL,NULL,NULL,NULL,8,NULL,'1'),(97,'9017','TD/CR MAUVE GEL STRAP W/ COVER\r\n','techno','10.50','25.00',NULL,NULL,NULL,NULL,-35,NULL,'1'),(98,'9049','TD/CR WHITE GEL STRAP W/ COVER\r\n','techno','10.57','25.00',NULL,NULL,NULL,NULL,-56,NULL,'1'),(99,'9050','TD/CR BLACK GEL STRAP W/ COVER\r\n','techno','10.80','25.00',NULL,NULL,NULL,NULL,-20,NULL,'1'),(100,'9504','SST DEEP BLUE GEL SQUARE STRAP\r\n','techno','11.30','25.00',NULL,NULL,NULL,NULL,15,NULL,'1'),(101,'9550','SST BLACK GEL SQUARE W/ BUCKLE\r\n','techno','11.99','25.00',NULL,NULL,NULL,NULL,38,NULL,'1'),(102,'9800','YR TRANSPARENT GEL STRAP W/ COVER\r\n','techno','11.03','25.00',NULL,NULL,NULL,NULL,65,NULL,'1'),(103,'9802','YR BABY BLUE GEL\r\n','techno','10.50','25.00',NULL,NULL,NULL,NULL,-2,NULL,'1'),(104,'9803','YR BLUE GEL STRAP W/ COVER\r\n','techno','10.50','25.00',NULL,NULL,NULL,NULL,0,NULL,'1'),(105,'9804','YR DEEP BLUE GEL STRAP W/ COVER\r\n','techno','10.92','25.00',NULL,NULL,NULL,NULL,20,NULL,'1'),(106,'9811','YR YELLOW GEL STRAP W/ COVER\r\n','techno','10.50','25.00',NULL,NULL,NULL,NULL,0,NULL,'1'),(107,'9849','YR WHITE GEL STRAP W/ COVER\r\n','techno','10.50','25.00',NULL,NULL,NULL,NULL,-28,NULL,'1'),(108,'9850','YR BLACK GEL W/ COVER\r\n','techno','10.85','25.00',NULL,NULL,NULL,NULL,85,NULL,'1'),(109,'CSX13','Technomarine Watche','techno','126.00','300.00',NULL,NULL,NULL,NULL,0,NULL,'1'),(110,'CSX15','Technomarine Watch','techno','126.00','300.00',NULL,NULL,NULL,NULL,5,NULL,'1'),(111,'CSX55','Technomarine Watch','techno','126.00','300.00',NULL,NULL,NULL,NULL,1,NULL,'1'),(112,'KRA07','Technomarine Watch','techno','291.90','695.00',NULL,NULL,NULL,NULL,0,NULL,'1'),(113,'KRA11','Technomarine Watch','techno','291.90','695.00',NULL,NULL,NULL,NULL,0,NULL,'1'),(114,'M02','Technomarine Watch','techno','375.90','895.00',NULL,NULL,NULL,NULL,4,NULL,'1'),(115,'M05','Technomarine Watch','techno','375.90','895.00',NULL,NULL,NULL,NULL,3,NULL,'1'),(116,'NAUT02','Technomarine Watch','techno','291.90','695.00',NULL,NULL,NULL,NULL,4,NULL,'1'),(117,'NAUT05','Technomarine Watch','techno','296.09','695.00',NULL,NULL,NULL,NULL,4,NULL,'1'),(118,'REEF02','Technomarine Watch','techno','192.45','450.00',NULL,NULL,NULL,NULL,2,NULL,'1'),(119,'SST12','Technomarine Watch','techno','147.00','350.00',NULL,NULL,NULL,NULL,0,NULL,'1'),(120,'TLCN01','Technomarine Watch','techno','150.33','350.00',NULL,NULL,NULL,NULL,5,NULL,'1'),(121,'TLCN05','Technomarine Watch','techno','147.00','350.00',NULL,NULL,NULL,NULL,8,NULL,'1'),(122,'TLCN07','Technomarine Watch','techno','154.50','350.00',NULL,NULL,NULL,NULL,1,NULL,'1'),(123,'TMAXS05','Technomarine Watch','techno','79.80','190.00',NULL,NULL,NULL,NULL,-2,NULL,'1'),(124,'TMAX05-1','Technomarine Watch','techno','88.20','210.00',NULL,NULL,NULL,NULL,3,NULL,'1'),(125,'TMAXS21','Technomarine Watch','techno','81.03','190.00',NULL,NULL,NULL,NULL,14,NULL,'1'),(126,'TMCS02','Technomarine Watch','techno','171.71','400.00',NULL,NULL,NULL,NULL,2,NULL,'1'),(127,'TMCX07','Technomarine Watch','techno','178.50','425.00',NULL,NULL,NULL,NULL,2,NULL,'1'),(128,'TMD01','Technomarine Watch','techno','136.50','325.00',NULL,NULL,NULL,NULL,-3,NULL,'1'),(129,'TMY22','Technomarine Watch','techno','207.70','475.00',NULL,NULL,NULL,NULL,2,NULL,'1'),(130,'TMYC05C','Technomarine Watch','techno','819.00','1950.00',NULL,NULL,NULL,NULL,3,NULL,'1'),(131,'TMYMC02','Technomarine Watch\r\n','techno','207.90','495.00',NULL,NULL,NULL,NULL,0,NULL,'1'),(132,'TMYMC05','Technomarine Watch\r\n','techno','207.90','495.00',NULL,NULL,NULL,NULL,0,NULL,'1'),(133,'XS11','Technomarine Watch','techno','231.00','550.00',NULL,NULL,NULL,NULL,0,NULL,'1'),(134,'XSMSH','Technomarine Watch','techno','609.00','1450.00',NULL,NULL,NULL,NULL,0,NULL,'1'),(135,'XSMSHW','Technomarine Watch','techno','609.00','1450.00',NULL,NULL,NULL,NULL,1,NULL,'1'),(136,'XS02','Technomarine Watch','techno','231.00','550.00',NULL,NULL,NULL,NULL,1,NULL,'1'),(137,'XS05','Technomarine Watch','techno','231.00','550.00',NULL,NULL,NULL,NULL,0,NULL,'1'),(138,'CSX99','HOLA!!!!!!!!!!!!!!!!!!','technomarine','126.00','300.00','156.00','0.00','0.00','0.00',0,'notes','1'),(139,'9030','Techno Band<br /> ','techno','10.50','13.75','0.00','0.00','0.00','0.00',-35,NULL,'1'),(140,'CSX07','Technomarine Watch','technomarine','139.00','300.00','156.00','0.00','0.00','0.00',0,NULL,'1'),(141,'ABS02','Technomarine Watch','techno','196.00','0.00','0.00','0.00','0.00','0.00',-1,NULL,'1'),(142,'ABS05','Technomarine Watch','techno','0.00','0.00','0.00','0.00','0.00','0.00',0,NULL,'1'),(143,'REEF05','Technomarine Watch','techno','189.00','450.00','0.00','0.00','0.00','0.00',0,NULL,'1'),(144,'TMD05','Technomarine Watch','techno','136.50','325.00','0.00','0.00','0.00','0.00',0,NULL,'1'),(145,'REEF01','Technomarine Watch','techno','189.00','450.00','0.00','0.00','0.00','0.00',0,NULL,'1'),(146,'9006','Technomarine Band<br /> ','techno','10.50','25.00','0.00','0.00','0.00','0.00',0,NULL,'1'),(147,'9008','Technomarine Band<br /> ','techno','10.50','25.00','0.00','0.00','0.00','0.00',0,NULL,'1'),(148,'9018','TD/CR MAUVE GEL STRAP W/ COVER ','techno','10.50','25.00','0.00','0.00','0.00','0.00',0,NULL,'1'),(149,'9019','TD/CR MAUVE GEL STRAP W/ COVER ','techno','10.50','25.00','0.00','0.00','0.00','0.00',0,NULL,'1'),(150,'9031','Techno Band<br /> ','techno','10.50','13.75','0.00','0.00','0.00','0.00',0,NULL,'1'),(151,'TMYM05','Technomarine Watch<br /> ','techno','231.00','0.00','0.00','0.00','0.00','0.00',1,NULL,'1'),(152,'TMYM01','Technomarine Watch','techno','231.00','0.00','0.00','0.00','0.00','0.00',1,NULL,'1'),(153,'TMD02','Technomarine Watch','techno','136.50','325.00','0.00','0.00','0.00','0.00',1,NULL,'1');
/*!40000 ALTER TABLE `genlu_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genlu_purchase_invoice_lines`
--

DROP TABLE IF EXISTS `genlu_purchase_invoice_lines`;
CREATE TABLE `genlu_purchase_invoice_lines` (
  `id` int(10) NOT NULL auto_increment,
  `invoice_id` int(10) NOT NULL default '0',
  `product_id` int(10) default '0',
  `description` text,
  `quantity` int(10) unsigned NOT NULL default '0',
  `unit_cost` decimal(25,2) NOT NULL default '0.00',
  PRIMARY KEY  (`id`),
  KEY `invoice_id` (`invoice_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=475 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genlu_purchase_invoice_lines`
--

LOCK TABLES `genlu_purchase_invoice_lines` WRITE;
/*!40000 ALTER TABLE `genlu_purchase_invoice_lines` DISABLE KEYS */;
INSERT INTO `genlu_purchase_invoice_lines` VALUES (112,36,26,'Swiss Army Watches',4,'97.50'),(113,36,27,'Swiss Army Watches',2,'97.50'),(114,36,28,'Swiss Army Watches',2,'97.50'),(115,36,29,'Swiss Army Watches',2,'97.50'),(116,36,30,'Swiss Army Watches',5,'125.00'),(117,36,31,'Swiss Army Watches',3,'225.00'),(118,36,32,'Swiss Army Watches',3,'225.00'),(119,36,33,'Swiss Army Watches',3,'162.50'),(120,36,34,'Swiss Army Watches',4,'212.50'),(121,36,35,'Swiss Army Watches',2,'162.50'),(122,36,36,'Swiss Army Watches',2,'97.50'),(123,36,37,'Swiss Army Watches',3,'225.00'),(124,36,38,'Swiss Army Watches',2,'197.50'),(125,36,39,'Swiss Army Watches',2,'197.50'),(126,36,40,'Swiss Army Watches',2,'175.00'),(127,36,41,'Swiss Army Watches',4,'125.00'),(128,37,42,'Swiss Army Watches',2,'147.50'),(129,37,43,'Swiss Army Watches',3,'175.00'),(130,37,44,'Swiss Army Watches',3,'175.00'),(131,37,45,'Swiss Army Watches',3,'212.50'),(132,37,46,'Swiss Army Watches',3,'212.50'),(133,37,47,'Swiss Army Watches',4,'97.50'),(134,37,48,'Swiss Army Watches',2,'137.50'),(135,37,49,'Swiss Army Watches',2,'137.50'),(136,37,50,'Swiss Army Watches',2,'162.50'),(137,37,51,'Swiss Army Watches',2,'187.50'),(138,37,52,'Swiss Army Watches',3,'212.50'),(139,37,53,'Swiss Army Watches',1,'597.50'),(140,37,54,'Swiss Army Watches',3,'125.00'),(141,37,55,'Swiss Army Watches',1,'125.00'),(142,37,56,'Swiss Army Watches',2,'197.50'),(143,37,57,'Swiss Army Watches',3,'187.50'),(144,37,58,'Swiss Army Watches',1,'175.00'),(145,37,59,'Swiss Army Watches',3,'187.50'),(146,38,74,'Swiss Army Watches',2,'87.50'),(147,38,75,'Swiss Army Watches',3,'87.50'),(148,38,76,'Swiss Army Watches',3,'187.50'),(149,38,77,'Swiss Army Watches',3,'187.50'),(150,38,78,'Swiss Army Watches',4,'187.50'),(151,38,79,'Swiss Army Watches',2,'187.50'),(152,38,80,'Swiss Army Watches',2,'187.50'),(153,38,81,'Swiss Army Watches',3,'187.50'),(154,38,82,'Swiss Army Watches',3,'225.00'),(155,38,83,'Swiss Army Watches',3,'175.00'),(156,38,84,'Swiss Army Watches',4,'175.00'),(157,38,85,'Swiss Army Watches',4,'175.00'),(158,38,86,'Swiss Army Watches',4,'175.00'),(159,38,87,'Swiss Army Watches',3,'175.00'),(160,38,88,'Swiss Army Watches',3,'212.50'),(161,39,60,'Swiss Army Watches',3,'162.50'),(162,39,61,'Swiss Army Watches',5,'197.50'),(163,39,62,'Swiss Army Watches',4,'197.50'),(164,39,63,'Swiss Army Watches',3,'212.50'),(165,39,64,'Swiss Army Watches',3,'175.00'),(166,39,65,'Swiss Army Watches',3,'175.00'),(167,39,66,'Swiss Army Watches',2,'187.50'),(168,39,67,'Swiss Army Watches',4,'187.50'),(169,39,68,'Swiss Army Watches',2,'187.50'),(170,39,69,'Swiss Army Watches',2,'187.50'),(171,39,70,'Swiss Army Watches',3,'212.50'),(172,39,71,'Swiss Army Watches',3,'225.00'),(173,39,72,'Swiss Army Watches',4,'87.50'),(174,39,73,'Swiss Army Watches',4,'87.50'),(175,40,101,'SST BLACK GEL SQUARE W/ BUCKLE',40,'13.86'),(176,40,102,'YR TRANSPARENT GEL STRAP W/ COVER',50,'11.55'),(177,40,105,'YR DEEP BLUE GEL STRAP W/ COVER',20,'11.55'),(178,40,108,'YR BLACK GEL W/ COVER',50,'11.55'),(179,40,129,'Technomarine Watch',2,'220.00'),(180,40,14,'Technomarine Watch',2,'220.00'),(181,40,13,'Technomarine Watch',2,'220.00'),(182,40,120,'Technomarine Watch',2,'162.00'),(183,40,20,'Technomarine Watch',5,'196.50'),(184,40,118,'Technomarine Watch',2,'208.00'),(185,40,151,'Technomarine Watch<br /> ',1,'231.00'),(186,40,152,'Technomarine Watch',1,'231.00'),(187,40,21,'Technomarine Watch',2,'196.50'),(188,40,18,'Technomarine Watch',2,'181.00'),(189,40,126,'Technomarine Watch',2,'181.00'),(190,40,19,'Technomarine Watch',2,'181.00'),(191,40,122,'Technomarine Watch',2,'162.00'),(192,41,125,'Technomarine Watch',3,'88.00'),(193,41,16,'Technomarine Watch',4,'88.00'),(194,41,24,'Technomarine Watch',5,'97.00'),(195,41,140,'Technomarine Watch',2,'139.00'),(196,41,1,'Technomarine Watch',2,'139.00'),(197,41,15,'Technomarine Watch',5,'88.00'),(198,41,23,'Technomarine Watch',2,'97.00'),(199,41,141,'Technomarine Watch',1,'196.00'),(200,41,117,'Technomarine Watch',1,'321.20'),(201,41,99,'TD/CR BLACK GEL STRAP W/ COVER',20,'11.55'),(202,41,98,'TD/CR WHITE GEL STRAP W/ COVER',7,'11.55'),(203,41,96,'TD/CR RED GEL',10,'11.55'),(204,41,100,'SST DEEP BLUE GEL SQUARE STRAP',10,'13.86'),(408,1,89,'YR BLACK GEL W/ COVER',5,'105.00'),(409,1,90,'TD/CR TRANSPARENT GEL W/ COVER',50,'10.50'),(410,1,91,'TD/CR TURQUOISE GEL',100,'10.50'),(411,1,92,'TD/CR BABY BLUE GEL',50,'10.50'),(412,1,93,'TD/CR BLUE GEL STRAP W/ COVER',50,'10.50'),(413,1,94,'TD/CR DEEP BLUE GEL',48,'10.50'),(414,1,95,'TD/CR BABY PINK GEL',50,'10.50'),(415,1,96,'TD/CR RED GEL',30,'10.50'),(416,1,97,'TD/CR MAUVE GEL STRAP W/ COVER',50,'10.50'),(417,1,98,'TD/CR WHITE GEL STRAP W/ COVER',100,'10.50'),(418,1,99,'TD/CR BLACK GEL STRAP W/ COVER',50,'10.50'),(419,1,100,'SST DEEP BLUE GEL SQUARE STRAP W/ BUCKLE',32,'10.50'),(420,1,101,'SST BLACK GEL SQUARE W/ BUCKLE',50,'10.50'),(421,1,102,'YR TRANSPARENT GEL STRAP W/ COVER',50,'10.50'),(422,1,103,'YR BABY BLUE GEL',30,'10.50'),(423,1,104,'YR BLUE GEL STRAP W/ COVER',30,'10.50'),(424,1,105,'YR DEEP BLUE GEL STRAP W/ COVER',30,'10.50'),(425,1,106,'YR YELLOW GEL STRAP W/ COVER',30,'10.50'),(426,1,107,'YR WHITE GEL STRAP W/ COVER',50,'10.50'),(427,1,108,'YR BLACK GEL W/ COVER',100,'10.50'),(428,1,1,'Technomarine Watch',10,'126.00'),(429,1,2,'Technomarine Watch',20,'126.00'),(430,1,3,'Technomarine Watch',6,'126.00'),(431,1,17,'Technomarine Watch',7,'126.00'),(432,1,109,'Technomarine Watch',1,'126.00'),(433,1,110,'Technomarine Watch',8,'126.00'),(434,1,111,'Technomarine Watch',25,'126.00'),(435,1,112,'Technomarine Watch',3,'291.90'),(436,1,113,'Technomarine Watch',3,'291.90'),(437,1,114,'Technomarine Watch',5,'375.90'),(438,1,115,'Technomarine Watch',5,'375.90'),(439,1,116,'Technomarine Watch',6,'291.90'),(440,1,117,'Technomarine Watch',6,'291.90'),(441,1,118,'Technomarine Watch',9,'189.00'),(442,1,4,'Technomarine Watch',23,'130.20'),(443,1,5,'Technomarine Watch',28,'130.20'),(444,1,6,'Technomarine Watch',10,'130.20'),(445,1,11,'Technomarine Watch',8,'130.20'),(446,1,12,'Technomarine Watch',18,'130.20'),(447,1,22,'Technomarine Watch',20,'147.00'),(448,1,120,'Technomarine Watch',7,'147.00'),(449,1,121,'Technomarine Watch',15,'147.00'),(450,1,122,'Technomarine Watch',2,'147.00'),(451,1,24,'Technomarine Watch',15,'88.20'),(452,1,124,'Technomarine Watch',12,'88.20'),(453,1,23,'Technomarine Watch',17,'88.20'),(454,1,123,'Technomarine Watch',20,'79.80'),(455,1,15,'Technomarine Watch',12,'79.80'),(456,1,125,'Technomarine Watch',17,'79.80'),(457,1,16,'Technomarine Watch',16,'79.80'),(458,1,126,'Technomarine Watch',5,'168.00'),(459,1,19,'Technomarine Watch',5,'168.00'),(460,1,18,'Technomarine Watch',5,'168.00'),(461,1,21,'Technomarine Watch',6,'178.50'),(462,1,20,'Technomarine Watch',22,'178.50'),(463,1,127,'Technomarine Watch',6,'178.50'),(464,1,128,'Technomarine Watch',2,'136.50'),(465,1,13,'Technomarine Watch',5,'199.50'),(466,1,129,'Technomarine Watch',3,'199.50'),(467,1,130,'Technomarine Watch',3,'819.00'),(468,1,136,'Technomarine Watch',5,'231.00'),(469,1,137,'Technomarine Watch',5,'231.00'),(470,1,133,'Technomarine Watch',5,'231.00'),(471,1,134,'Technomarine Watch',2,'609.00'),(472,1,135,'Technomarine Watch',2,'609.00'),(473,1,153,'Technomarine Watch',1,'136.50'),(474,1,14,'Technomarine Watch',1,'199.50');
/*!40000 ALTER TABLE `genlu_purchase_invoice_lines` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`german`@`localhost` */ /*!50003 TRIGGER `updateQtyDown` AFTER INSERT ON `genlu_purchase_invoice_lines` FOR EACH ROW BEGIN
  	UPDATE genlu_products SET qty_hand = qty_hand + NEW.quantity WHERE id = NEW.product_id;
  END */;;

/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`german`@`localhost` */ /*!50003 TRIGGER `deleteQtyDown` AFTER DELETE ON `genlu_purchase_invoice_lines` FOR EACH ROW BEGIN
  	UPDATE genlu_products SET qty_hand = qty_hand - OLD.quantity WHERE id = OLD.product_id;
  END */;;

DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;

--
-- Temporary table structure for view `genlu_purchase_invoice_totals`
--

DROP TABLE IF EXISTS `genlu_purchase_invoice_totals`;
/*!50001 DROP VIEW IF EXISTS `genlu_purchase_invoice_totals`*/;
/*!50001 CREATE TABLE `genlu_purchase_invoice_totals` (
  `id` int(10),
  `invoice_number` varchar(255),
  `vendor_id` int(10),
  `date` date,
  `total` decimal(59,2)
) */;

--
-- Table structure for table `genlu_purchase_invoices`
--

DROP TABLE IF EXISTS `genlu_purchase_invoices`;
CREATE TABLE `genlu_purchase_invoices` (
  `id` int(10) NOT NULL auto_increment,
  `invoice_number` varchar(255) NOT NULL,
  `vendor_invoice_number` varchar(255) default NULL,
  `date` date NOT NULL default '0000-00-00',
  `vendor_id` int(10) NOT NULL default '0',
  `tax_id` int(10) NOT NULL default '0',
  `freight` decimal(10,2) default '0.00',
  `note` text,
  `terms` varchar(255) default NULL,
  `shipping_method` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `invoice_number` (`invoice_number`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genlu_purchase_invoices`
--

LOCK TABLES `genlu_purchase_invoices` WRITE;
/*!40000 ALTER TABLE `genlu_purchase_invoices` DISABLE KEYS */;
INSERT INTO `genlu_purchase_invoices` VALUES (1,'00010Z0003',NULL,'2007-08-07',1,0,'0.00','','Prepaid','Customer Pick Up'),(36,'00010Z0004',NULL,'2007-08-07',4,0,'0.00','',NULL,NULL),(37,'00010Z0005',NULL,'2007-08-07',4,0,'0.00','',NULL,NULL),(38,'00010Z0006',NULL,'2007-08-07',4,0,'0.00','',NULL,NULL),(39,'00010Z0007',NULL,'2007-08-07',4,0,'0.00','',NULL,NULL),(40,'00010Z0001','1208WL','2007-06-19',2,0,'0.00','Primera factura registrada.','NET 30 Days','Customer Pick Up'),(41,'00010Z0002','1219GE','2007-07-03',2,0,'0.00','','NET 30 Days','Customer Pick Up');
/*!40000 ALTER TABLE `genlu_purchase_invoices` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`german`@`localhost` */ /*!50003 TRIGGER `deletePurchaseLines` AFTER DELETE ON `genlu_purchase_invoices` FOR EACH ROW BEGIN
  	DELETE FROM genlu_purchase_invoice_lines WHERE invoice_id = OLD.id;
  END */;;

DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;

--
-- Table structure for table `genlu_reports`
--

DROP TABLE IF EXISTS `genlu_reports`;
CREATE TABLE `genlu_reports` (
  `id` int(10) NOT NULL auto_increment,
  `number` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `pl_number` (`number`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genlu_reports`
--

LOCK TABLES `genlu_reports` WRITE;
/*!40000 ALTER TABLE `genlu_reports` DISABLE KEYS */;
INSERT INTO `genlu_reports` VALUES (1,'00010R1001');
/*!40000 ALTER TABLE `genlu_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genlu_sales_invoice_lines`
--

DROP TABLE IF EXISTS `genlu_sales_invoice_lines`;
CREATE TABLE `genlu_sales_invoice_lines` (
  `id` int(10) NOT NULL auto_increment,
  `invoice_id` int(10) NOT NULL default '0',
  `product_id` int(10) default '0',
  `description` text,
  `quantity` int(11) NOT NULL default '0',
  `unit_price` double(25,2) default '0.00',
  PRIMARY KEY  (`id`),
  KEY `invoice_id` (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=762 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genlu_sales_invoice_lines`
--

LOCK TABLES `genlu_sales_invoice_lines` WRITE;
/*!40000 ALTER TABLE `genlu_sales_invoice_lines` DISABLE KEYS */;
INSERT INTO `genlu_sales_invoice_lines` VALUES (15,4,22,'Technomarine Watch',2,182.00),(16,4,8,'Technomarine Watch',2,182.00),(17,4,9,'Technomarine Watch',2,182.00),(18,4,10,'Technomarine Watch',2,182.00),(19,4,5,'Technomarine Watch',3,161.20),(20,4,11,'Technomarine Watch',3,161.20),(21,4,12,'Technomarine Watch',3,161.20),(22,4,14,'Technomarine Watch',2,247.00),(23,4,13,'Technomarine Watch',2,247.00),(24,4,24,'Technomarine Watch',5,109.20),(25,4,23,'Technomarine Watch',5,109.20),(26,4,15,'Technomarine Watch',3,98.80),(27,4,16,'Technomarine Watch',2,98.80),(28,4,1,'Technomarine Watch',3,156.00),(29,4,3,'Technomarine Watch',2,156.00),(30,4,17,'Technomarine Watch',1,156.00),(31,4,19,'Technomarine Watch',1,208.00),(32,4,18,'Technomarine Watch',1,208.00),(33,4,20,'Technomarine Watch',1,221.00),(34,4,21,'Technomarine Watch',1,221.00),(35,4,25,'Technomarine Watch',3,109.20),(36,4,2,'Technomarine Watch',1,156.00),(68,10,80,'Swiss Army Watches',1,225.00),(69,10,82,'Swiss Army Watches',1,270.00),(70,10,68,'Swiss Army Watches',1,225.00),(71,10,35,'Swiss Army Watches',1,225.00),(73,10,34,'Swiss Army Watches',1,255.00),(74,10,41,'Swiss Army Watches',1,150.00),(75,10,32,'Swiss Army Watches',1,270.00),(76,10,40,'Swiss Army Watches',1,210.00),(77,10,39,'Swiss Army Watches',1,237.00),(78,10,30,'Swiss Army Watches',1,150.00),(79,10,26,'Swiss Army Watches',1,117.00),(83,10,66,'Swiss Army Watches',1,225.00),(84,10,63,'Swiss Army Watches',1,255.00),(85,10,33,'Swiss Army Watches',1,195.00),(86,10,72,'Swiss Army Watches',1,105.00),(87,10,73,'Swiss Army Watches',1,105.00),(88,10,31,'Swiss Army Watches',1,270.00),(89,10,67,'Swiss Army Watches',1,225.00),(90,10,60,'Swiss Army Watches',1,195.00),(91,10,65,'Swiss Army Watches',1,210.00),(92,10,61,'Swiss Army Watches',1,237.00),(93,10,37,'Swiss Army Watches',1,270.00),(94,10,69,'Swiss Army Watches',1,225.00),(95,10,64,'Swiss Army Watches',1,210.00),(96,10,71,'Swiss Army Watches',1,270.00),(97,10,62,'Swiss Army Watches',1,237.00),(98,10,45,'Swiss Army Watches',1,255.00),(99,10,54,'Swiss Army Watches',1,150.00),(100,10,52,'Swiss Army Watches',1,255.00),(101,10,84,'Swiss Army Watches',1,210.00),(102,10,78,'Swiss Army Watches',1,225.00),(103,10,81,'Swiss Army Watches',1,225.00),(104,10,83,'Swiss Army Watches',1,210.00),(105,10,86,'Swiss Army Watches',1,210.00),(106,10,87,'Swiss Army Watches',1,210.00),(107,10,75,'Swiss Army Watches',1,105.00),(108,10,77,'Swiss Army Watches',1,225.00),(109,10,85,'Swiss Army Watches',1,210.00),(110,10,88,'Swiss Army Watches',1,255.00),(111,10,76,'Swiss Army Watches',1,225.00),(113,10,79,'Swiss Army Watches',1,225.00),(114,10,56,'Swiss Army Watches',1,237.00),(115,10,50,'Swiss Army Watches',1,195.00),(117,10,47,'Swiss Army Watches',1,117.00),(118,10,44,'Swiss Army Watches',1,210.00),(119,10,46,'Swiss Army Watches',1,255.00),(120,10,43,'Swiss Army Watches',1,210.00),(121,10,42,'Swiss Army Watches',1,177.00),(123,10,51,'Swiss Army Watches',1,225.00),(124,10,57,'Swiss Army Watches',1,225.00),(125,10,53,'Swiss Army Watches',1,717.00),(127,11,74,'Swiss Army Watches',1,105.00),(128,11,75,'Swiss Army Watches',1,105.00),(129,11,36,'Swiss Army Watches',1,117.00),(130,11,47,'Swiss Army Watches',1,117.00),(131,11,28,'Swiss Army Watches',1,117.00),(132,11,27,'Swiss Army Watches',1,117.00),(133,11,29,'Swiss Army Watches',1,117.00),(134,11,30,'Swiss Army Watches',1,150.00),(135,11,66,'Swiss Army Watches',1,225.00),(136,11,50,'Swiss Army Watches',1,195.00),(137,11,70,'Swiss Army Watches',1,255.00),(138,11,88,'Swiss Army Watches',1,255.00),(139,11,31,'Swiss Army Watches',1,270.00),(140,11,32,'Swiss Army Watches',1,270.00),(141,11,71,'Swiss Army Watches',1,270.00),(142,11,46,'Swiss Army Watches',1,255.00),(143,11,45,'Swiss Army Watches',1,255.00),(144,12,47,'Swiss Army Watches',1,111.15),(145,12,36,'Swiss Army Watches',1,111.15),(146,12,54,'Swiss Army Watches',1,142.50),(147,12,55,'Swiss Army Watches',1,142.50),(148,12,26,'Technomarine Watch',1,111.15),(149,12,28,'Swiss Army Watches',1,111.15),(150,12,27,'Swiss Army Watches',1,111.15),(151,12,29,'Swiss Army Watches',1,111.15),(152,12,30,'Swiss Army Watches',1,142.50),(153,12,33,'Swiss Army Watches',1,185.25),(154,12,41,'Swiss Army Watches',1,142.50),(155,12,85,'Swiss Army Watches',1,199.50),(156,12,65,'Swiss Army Watches',1,199.50),(157,12,87,'Swiss Army Watches',1,199.50),(158,12,86,'Swiss Army Watches',1,199.50),(159,12,35,'Swiss Army Watches',1,185.25),(160,12,68,'Swiss Army Watches',1,213.75),(161,12,67,'Swiss Army Watches',1,213.75),(162,12,38,'Swiss Army Watches',1,225.15),(163,13,74,'Swiss Army Watches',1,99.75),(164,13,72,'Swiss Army Watches',1,99.75),(165,13,75,'Swiss Army Watches',1,99.75),(166,13,73,'Swiss Army Watches',1,99.75),(167,13,47,'Swiss Army Watches',1,111.15),(168,13,54,'Swiss Army Watches',1,142.50),(169,13,58,'Swiss Army Watches',1,199.50),(170,13,26,'Swiss Army Watches',1,111.15),(171,13,30,'Swiss Army Watches',1,142.50),(172,13,41,'Swiss Army Watches',1,142.50),(173,13,33,'Swiss Army Watches',1,185.25),(174,13,48,'Swiss Army Watches',1,156.75),(175,13,49,'Swiss Army Watches',1,156.75),(176,13,84,'Swiss Army Watches',1,199.50),(177,13,64,'Swiss Army Watches',1,199.50),(178,13,85,'Swiss Army Watches',1,199.50),(179,13,38,'Swiss Army Watches',1,225.15),(183,27,90,'TD/CR TRANSPARENT GEL W/ COVER',40,13.75),(184,27,89,'SS TMY 3 LINKS BAND W BUCKLE',2,137.50),(185,27,91,'TD/CR TURQUOISE GEL',40,13.75),(186,27,92,'TD/CR BABY BLUE GEL',30,13.75),(187,27,93,'TD/CR BLUE GEL STRAP W/ COVER',30,13.75),(188,27,94,'TD/CR DEEP BLUE GEL',30,13.75),(189,27,95,'TD/CR BABY PINK GEL',30,13.75),(190,27,96,'TD/CR RED GEL',10,13.75),(191,27,97,'TD/CR MAUVE GEL STRAP W/ COVER',30,13.75),(192,27,98,'TD/CR WHITE GEL STRAP W/ COVER',40,13.75),(193,27,99,'TD/CR BLACK GEL STRAP W/ COVER',20,13.75),(194,27,100,'SST DEEP BLUE GEL SQUARE STRAP W/ BUCKLE',10,16.50),(195,27,101,'SST BLACK GEL SQUARE W/ BUCKLE',20,16.50),(196,27,102,'YR TRANSPARENT GEL STRAP W/ COVER',20,13.75),(197,27,103,'YR BABY BLUE GEL',20,13.75),(198,27,104,'YR BLUE GEL STRAP W/ COVER',30,13.75),(199,27,105,'YR DEEP BLUE GEL STRAP W/ COVER',20,13.75),(200,27,106,'YR YELLOW GEL STRAP W/ COVER',20,13.75),(201,27,107,'YR WHITE GEL STRAP W/ COVER',20,13.75),(202,27,108,'YR BLACK GEL W/ COVER',40,13.75),(203,28,90,'TD/CR TRANSPARENT GEL W/ COVER',5,13.75),(204,28,94,'TD/CR DEEP BLUE GEL',5,13.75),(205,28,92,'TD/CR BABY BLUE GEL',5,13.75),(206,28,93,'TD/CR BLUE GEL STRAP W/ COVER',5,13.75),(207,28,98,'TD/CR WHITE GEL STRAP W/ COVER',5,13.75),(208,28,96,'TD/CR RED GEL',5,13.75),(209,28,95,'TD/CR BABY PINK GEL',5,13.75),(210,28,97,'TD/CR MAUVE GEL STRAP W/ COVER',5,13.75),(211,28,91,'TD/CR TURQUOISE GEL',5,13.75),(212,28,99,'TD/CR BLACK GEL STRAP W/ COVER',5,13.75),(213,28,102,'YR TRANSPARENT GEL STRAP W/ COVER',5,13.75),(214,28,103,'YR BABY BLUE GEL',5,13.75),(215,28,105,'YR DEEP BLUE GEL STRAP W/ COVER',5,13.75),(216,28,108,'YR BLACK GEL W/ COVER',5,13.75),(217,28,106,'YR YELLOW GEL STRAP W/ COVER',5,13.75),(218,28,107,'YR WHITE GEL STRAP W/ COVER',5,13.75),(219,28,100,'SST DEEP BLUE GEL SQUARE STRAP',5,16.50),(220,28,101,'SST BLACK GEL SQUARE W/ BUCKLE',5,16.50),(221,29,111,'Technomarine Watch',1,156.00),(222,29,2,'Technomarine Watch',2,156.00),(223,29,1,'Technomarine Watch',1,156.00),(224,29,123,'Technomarine Watch',2,109.20),(225,29,23,'Technomarine Watch',1,109.20),(226,29,16,'Technomarine Watch',1,109.20),(227,29,98,'TD/CR WHITE GEL STRAP W/ COVER',10,13.75),(228,29,99,'TD/CR BLACK GEL STRAP W/ COVER',20,13.75),(229,29,90,'TD/CR TRANSPARENT GEL W/ COVER',20,13.75),(230,29,91,'TD/CR TURQUOISE GEL',20,13.75),(231,29,92,'TD/CR BABY BLUE GEL',10,13.75),(232,29,108,'YR BLACK GEL W/ COVER',10,13.75),(233,29,102,'YR TRANSPARENT GEL STRAP W/ COVER',10,13.75),(234,29,107,'YR WHITE GEL STRAP W/ COVER',5,13.75),(270,34,134,'Technomarine Watch',2,797.50),(271,34,135,'Technomarine Watch',1,797.50),(272,34,91,'TD/CR TURQUOISE GEL',20,13.75),(273,34,92,'TD/CR BABY BLUE GEL',15,13.75),(274,34,95,'TD/CR BABY PINK GEL',9,13.75),(275,34,98,'TD/CR WHITE GEL STRAP W/ COVER',10,13.75),(276,34,99,'TD/CR BLACK GEL STRAP W/ COVER',5,13.75),(277,35,99,'TD/CR BLACK GEL STRAP W/ COVER',25,13.75),(278,35,98,'TD/CR WHITE GEL STRAP W/ COVER',5,13.75),(279,35,96,'TD/CR RED GEL',10,13.75),(280,35,139,'Techno Band<br /> ',10,13.75),(281,35,91,'TD/CR TURQUOISE GEL',5,13.75),(282,35,92,'TD/CR BABY BLUE GEL',5,13.75),(283,35,93,'TD/CR BLUE GEL STRAP W/ COVER',10,13.75),(284,35,97,'TD/CR MAUVE GEL STRAP W/ COVER',10,13.75),(285,35,90,'TD/CR TRANSPARENT GEL W/ COVER',20,13.75),(286,35,101,'SST BLACK GEL SQUARE W/ BUCKLE',5,16.50),(287,35,100,'SST DEEP BLUE GEL SQUARE STRAP',5,16.50),(288,36,23,'Technomarine Watch',1,97.00),(289,36,15,'Technomarine Watch',1,88.00),(290,36,24,'Technomarine Watch',1,97.00),(291,36,16,'Technomarine Watch',1,88.00),(292,36,117,'',1,321.20),(293,36,0,'',1,196.00),(294,37,12,'Technomarine Watch',2,170.50),(295,37,141,'Technomarine Watch',1,343.75),(296,37,141,'Technomarine Watch',1,343.75),(297,37,118,'Technomarine Watch',2,247.50),(298,37,118,'Technomarine Watch',1,247.50),(299,37,128,'Technomarine Watch',2,178.75),(300,37,128,'Technomarine Watch',2,178.75),(301,37,1,'Technomarine Watch',3,165.00),(302,37,22,'Technomarine Watch',3,192.50),(303,37,8,'Technomarine Watch',3,192.50),(304,37,10,'Technomarine Watch',3,192.50),(305,37,118,'Technomarine Watch',1,247.50),(306,38,91,'TD/CR TURQUOISE GEL',3,13.75),(307,38,90,'TD/CR TRANSPARENT GEL W/ COVER',7,13.75),(308,38,92,'TD/CR BABY BLUE GEL',20,13.75),(309,38,93,'TD/CR BLUE GEL STRAP W/ COVER',15,13.75),(310,38,95,'TD/CR BABY PINK GEL',15,13.75),(311,38,97,'TD/CR MAUVE GEL STRAP W/ COVER',5,13.75),(312,38,97,'TD/CR MAUVE GEL STRAP W/ COVER',5,13.75),(313,38,97,'TD/CR MAUVE GEL STRAP W/ COVER',8,13.75),(314,38,107,'YR WHITE GEL STRAP W/ COVER',10,13.75),(315,38,139,'Techno Band<br /> ',15,13.75),(316,38,108,'YR BLACK GEL W/ COVER',10,13.75),(317,39,125,'Technomarine Watch',2,98.80),(318,39,16,'Technomarine Watch',2,98.80),(319,39,140,'Technomarine Watch',2,156.00),(320,40,91,'TD/CR TURQUOISE GEL',10,13.75),(321,40,92,'TD/CR BABY BLUE GEL',10,13.75),(322,40,97,'TD/CR MAUVE GEL STRAP W/ COVER',15,13.75),(323,40,139,'Techno Band',10,13.75),(324,40,98,'TD/CR WHITE GEL STRAP W/ COVER',40,13.75),(325,40,99,'TD/CR BLACK GEL STRAP W/ COVER',10,13.75),(326,40,101,'SST BLACK GEL SQUARE W/ BUCKLE',15,16.50),(327,40,2,'Technomarine Watch',6,156.00),(328,40,111,'Technomarine Watch',4,156.00),(329,40,123,'Technomarine Watch',4,98.80),(330,41,126,'Technomarine Watch',2,208.00),(331,41,19,'Technomarine Watch',2,208.00),(332,41,18,'Technomarine Watch',2,208.00),(333,41,122,'Technomarine Watch',1,182.00),(334,41,20,'Technomarine Watch',2,221.00),(335,41,123,'Technomarine Watch',2,98.80),(336,41,22,'Technomarine Watch',1,182.00),(337,41,8,'Technomarine Watch',1,182.00),(338,41,9,'Technomarine Watch',1,182.00),(339,41,10,'Technomarine Watch',1,182.00),(340,41,2,'Technomarine Watch',2,156.00),(341,41,111,'Technomarine Watch',2,156.00),(342,41,5,'Technomarine Watch',2,161.20),(343,41,14,'Technomarine Watch',1,247.00),(344,41,13,'Technomarine Watch',1,247.00),(345,41,129,'Technomarine Watch',1,247.00),(346,41,101,'SST BLACK GEL SQUARE W/ BUCKLE',2,16.50),(347,41,91,'TD/CR TURQUOISE GEL',2,13.75),(348,41,92,'TD/CR BABY BLUE GEL',2,13.75),(349,41,93,'TD/CR BLUE GEL STRAP W/ COVER',2,13.75),(350,41,99,'TD/CR BLACK GEL STRAP W/ COVER',2,13.75),(351,41,98,'TD/CR WHITE GEL STRAP W/ COVER',2,13.75),(476,42,24,'Technomarine Watch',3,126.00),(477,42,124,'Technomarine Watch',3,126.00),(478,42,123,'Technomarine Watch',3,126.00),(479,42,23,'Technomarine Watch',3,126.00),(480,42,15,'Technomarine Watch',3,126.00),(481,42,125,'Technomarine Watch',4,126.00),(482,42,16,'Technomarine Watch',4,126.00),(483,42,25,'Technomarine Watch',4,126.00),(484,42,4,'Technomarine Watch',3,186.00),(485,42,5,'Technomarine Watch',4,186.00),(486,42,6,'Technomarine Watch',3,186.00),(487,42,11,'Technomarine Watch',3,186.00),(488,42,12,'Technomarine Watch',4,186.00),(489,42,22,'Technomarine Watch',3,210.00),(490,42,120,'Technomarine Watch',2,210.00),(491,42,121,'Technomarine Watch',2,210.00),(492,42,126,'Technomarine Watch',2,240.00),(493,42,19,'Technomarine Watch',2,240.00),(494,42,18,'Technomarine Watch',2,240.00),(495,42,21,'Technomarine Watch',2,255.00),(496,42,20,'Technomarine Watch',3,255.00),(497,42,127,'Technomarine Watch',2,255.00),(498,42,13,'Technomarine Watch',2,285.00),(499,42,136,'Technomarine Watch',1,330.00),(500,42,137,'Technomarine Watch',1,330.00),(501,42,133,'Technomarine Watch',1,330.00),(502,42,1,'Technomarine Watch',2,180.00),(503,42,2,'Technomarine Watch',3,180.00),(504,42,3,'Technomarine Watch',2,180.00),(505,42,17,'Technomarine Watch',2,180.00),(506,42,110,'Technomarine Watche',2,180.00),(507,42,111,'Technomarine Watch',3,180.00),(508,42,114,'Technomarine Watch',1,537.00),(509,42,115,'Technomarine Watch',1,537.00),(510,42,116,'Technomarine Watch',2,417.00),(511,42,117,'Technomarine Watch',2,417.00),(512,42,118,'Technomarine Watch',2,270.00),(549,44,1,'Technomarine Watch',1,180.00),(550,44,2,'Technomarine Watch',1,180.00),(551,44,17,'Technomarine Watch',1,180.00),(552,44,111,'Technomarine Watch',2,180.00),(553,44,112,'Technomarine Watch',1,417.00),(554,44,113,'Technomarine Watch',1,417.00),(555,44,21,'Technomarine Watch',1,255.00),(556,44,20,'Technomarine Watch',1,255.00),(557,44,136,'Technomarine Watch',1,330.00),(558,44,137,'Technomarine Watch',1,330.00),(559,44,133,'Technomarine Watch',1,330.00),(560,44,4,'Technomarine Watch',2,186.00),(561,44,5,'Technomarine Watch',2,186.00),(562,44,11,'Technomarine Watch',2,186.00),(563,44,12,'Technomarine Watch',1,186.00),(564,44,22,'Technomarine Watch',1,210.00),(565,44,10,'Technomarine Watch',1,210.00),(566,44,120,'Technomarine Watch',1,210.00),(567,44,24,'Technomarine Watch',2,126.00),(568,44,124,'Technomarine Watch',2,126.00),(569,44,23,'Technomarine Watch',1,126.00),(570,44,123,'Technomarine Watch',2,126.00),(571,44,15,'Technomarine Watch',2,126.00),(572,44,16,'Technomarine Watch',2,126.00),(573,45,91,'TD/CR TURQUOISE GEL',2,15.00),(574,45,92,'TD/CR BABY BLUE GEL',2,15.00),(575,45,100,'SST DEEP BLUE GEL SQUARE STRAP',2,18.00),(576,45,103,'YR BABY BLUE GEL',2,15.00),(577,45,107,'YR WHITE GEL STRAP W/ COVER',3,15.00),(578,45,3,'Technomarine Watch',2,180.00),(579,45,111,'Technomarine Watch',2,180.00),(580,45,112,'Technomarine Watch',1,417.00),(581,45,113,'Technomarine Watch',1,417.00),(582,45,115,'Technomarine Watch',1,537.00),(583,45,4,'Technomarine Watch',2,186.00),(584,45,5,'Technomarine Watch',2,186.00),(585,45,12,'Technomarine Watch',1,186.00),(586,45,22,'Technomarine Watch',2,210.00),(587,45,24,'Technomarine Watch',2,126.00),(588,45,124,'Technomarine Watch',2,126.00),(589,45,23,'Technomarine Watch',2,126.00),(590,45,123,'Technomarine Watch',2,126.00),(591,45,128,'Technomarine Watch',1,195.00),(628,43,90,'TD/CR TRANSPARENT GEL W/ COVER',5,15.00),(629,43,91,'TD/CR TURQUOISE GEL',10,15.00),(630,43,92,'TD/CR BABY BLUE GEL',10,15.00),(631,43,93,'TD/CR BLUE GEL STRAP W/ COVER',5,15.00),(632,43,96,'TD/CR RED GEL',1,15.00),(633,43,97,'TD/CR MAUVE GEL STRAP W/ COVER',1,15.00),(634,43,98,'TD/CR WHITE GEL STRAP W/ COVER',1,15.00),(635,43,1,'Technomarine Watch',1,180.00),(636,43,2,'Technomarine Watch',3,180.00),(637,43,110,'Technomarine Watch',1,180.00),(638,43,3,'Technomarine Watch',1,180.00),(639,43,17,'Technomarine Watch',1,180.00),(640,43,111,'Technomarine Watch',3,180.00),(641,43,112,'Technomarine Watch',1,457.00),(642,43,113,'Technomarine Watch',1,457.00),(643,43,4,'Technomarine Watch',1,186.00),(644,43,5,'Technomarine Watch',2,186.00),(645,43,11,'Technomarine Watch',1,186.00),(646,43,12,'Technomarine Watch',1,186.00),(647,43,22,'Technomarine Watch',1,210.00),(648,43,10,'Technomarine Watch',1,210.00),(649,43,120,'Technomarine Watch',1,210.00),(650,43,121,'Technomarine Watch',1,210.00),(651,43,122,'Technomarine Watch',1,210.00),(652,43,24,'Technomarine Watch',2,126.00),(653,43,124,'Technomarine Watch',2,126.00),(654,43,23,'Technomarine Watch',1,126.00),(655,43,123,'Technomarine Watch',3,126.00),(656,43,15,'Technomarine Watch',1,126.00),(657,43,16,'Technomarine Watch',1,126.00),(658,43,126,'Technomarine Watch',1,240.00),(659,43,19,'Technomarine Watch',1,240.00),(660,43,18,'Technomarine Watch',1,240.00),(661,43,21,'Technomarine Watch',1,255.00),(662,43,20,'Technomarine Watch',1,255.00),(663,43,127,'Technomarine Watch',1,255.00),(664,46,111,'Technomarine Watch',3,156.00),(665,46,2,'Technomarine Watch',3,156.00),(666,46,17,'Technomarine Watch',3,156.00),(667,46,4,'Technomarine Watch',2,161.20),(668,46,5,'Technomarine Watch',2,161.20),(669,46,6,'Technomarine Watch',2,161.20),(670,46,12,'Technomarine Watch',2,161.20),(671,46,118,'Technomarine Watch',2,234.00),(672,46,22,'Technomarine Watch',2,182.00),(673,46,14,'Technomarine Watch',1,247.00),(674,46,13,'Technomarine Watch',1,247.00),(675,46,129,'Technomarine Watch',1,247.00),(676,46,21,'Technomarine Watch',1,221.00),(677,46,20,'Technomarine Watch',1,221.00),(678,46,24,'Technomarine Watch',3,109.20),(679,46,23,'Technomarine Watch',2,109.20),(680,46,25,'Technomarine Watch',1,109.20),(681,46,123,'Technomarine Watch',3,98.80),(682,47,91,'TD/CR TURQUOISE GEL',10,11.55),(683,47,93,'TD/CR BLUE GEL STRAP W/ COVER',8,11.55),(684,47,99,'TD/CR BLACK GEL STRAP W/ COVER',3,13.85),(685,47,25,'Technomarine Watch',2,97.00),(686,47,24,'Technomarine Watch',1,97.00),(687,47,111,'Technomarine Watch',2,139.00),(688,47,2,'Technomarine Watch',2,139.00),(689,48,97,'TD/CR MAUVE GEL STRAP W/ COVER',1,10.50),(690,48,91,'TD/CR TURQUOISE GEL',1,10.50),(691,48,95,'TD/CR BABY PINK GEL',1,10.50),(692,48,96,'TD/CR RED GEL',1,10.50),(693,48,111,'Technomarine Watch',2,126.00),(694,48,2,'Technomarine Watch',4,126.00),(695,48,109,'Technomarine Watche',1,126.00),(696,48,123,'Technomarine Watch',1,80.00),(697,48,16,'Technomarine Watch',1,80.00),(698,48,118,'Technomarine Watch',1,189.00),(699,48,4,'Technomarine Watch',1,131.00),(700,48,137,'Technomarine Watch',1,231.00),(701,48,133,'Technomarine Watch',1,231.00),(702,48,11,'Technomarine Watch',1,189.00),(703,48,5,'Technomarine Watch',1,189.00),(704,49,107,'YR WHITE GEL STRAP W/ COVER',5,10.50),(705,49,106,'YR YELLOW GEL STRAP W/ COVER',5,10.50),(706,49,103,'YR BABY BLUE GEL',5,10.50),(707,49,105,'YR DEEP BLUE GEL STRAP W/ COVER',5,10.50),(708,49,101,'SST BLACK GEL SQUARE W/ BUCKLE',5,12.60),(709,49,100,'SST DEEP BLUE GEL SQUARE STRAP',5,12.60),(710,49,94,'TD/CR DEEP BLUE GEL',5,10.50),(711,49,92,'TD/CR BABY BLUE GEL',5,10.50),(712,49,95,'TD/CR BABY PINK GEL',5,10.50),(713,49,97,'TD/CR MAUVE GEL STRAP W/ COVER',5,10.50),(714,49,96,'TD/CR RED GEL',5,10.50),(715,49,91,'TD/CR TURQUOISE GEL',10,10.50),(716,49,98,'TD/CR WHITE GEL STRAP W/ COVER',10,10.50),(717,50,4,'Technomarine Watch',1,130.20),(718,50,11,'Technomarine Watch',1,130.20),(719,50,121,'Technomarine Watch',1,147.00),(720,50,122,'Technomarine Watch',1,147.00),(721,50,20,'Technomarine Watch',1,147.00),(722,50,98,'TD/CR WHITE GEL STRAP W/ COVER',10,10.50),(723,50,22,'Technomarine Watch',1,147.00),(724,50,8,'Technomarine Watch',1,147.00),(725,50,9,'Technomarine Watch',1,147.00),(726,50,10,'Technomarine Watch',1,147.00),(727,51,121,'Technomarine Watch',3,182.00),(728,51,136,'Technomarine Watch',2,286.00),(729,51,137,'Technomarine Watch',2,286.00),(730,51,133,'Technomarine Watch',2,286.00),(750,52,89,'SS TMY 3 LINKS BAND W BUCKLE',1,137.50),(751,52,98,'TD/CR WHITE GEL STRAP W/ COVER',10,13.75),(752,52,107,'YR WHITE GEL STRAP W/ COVER',10,13.75),(753,52,91,'TD/CR TURQUOISE GEL',5,13.75),(754,52,42,'Swiss Army Watches',1,177.00),(755,52,72,'Swiss Army Watches',1,105.00),(756,52,73,'Swiss Army Watches',1,105.00),(757,52,41,'Swiss Army Watches',1,150.00),(758,52,48,'Swiss Army Watches',1,165.00),(759,52,49,'Swiss Army Watches',1,165.00),(760,52,61,'Swiss Army Watches',1,237.00),(761,52,62,'Swiss Army Watches',1,237.00);
/*!40000 ALTER TABLE `genlu_sales_invoice_lines` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`german`@`localhost` */ /*!50003 TRIGGER `updateQtyUp` AFTER INSERT ON `genlu_sales_invoice_lines` FOR EACH ROW BEGIN
  	UPDATE genlu_products SET qty_hand = qty_hand - NEW.quantity WHERE id = NEW.product_id;
  END */;;

/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`german`@`localhost` */ /*!50003 TRIGGER `deleteQtyUp` AFTER DELETE ON `genlu_sales_invoice_lines` FOR EACH ROW BEGIN
  	UPDATE genlu_products SET qty_hand = qty_hand + OLD.quantity WHERE id = OLD.product_id;
  END */;;

DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;

--
-- Temporary table structure for view `genlu_sales_invoice_totals`
--

DROP TABLE IF EXISTS `genlu_sales_invoice_totals`;
/*!50001 DROP VIEW IF EXISTS `genlu_sales_invoice_totals`*/;
/*!50001 CREATE TABLE `genlu_sales_invoice_totals` (
  `id` int(10),
  `invoice_number` varchar(255),
  `customer_id` int(10),
  `date` date,
  `total` double(19,2)
) */;

--
-- Table structure for table `genlu_sales_invoices`
--

DROP TABLE IF EXISTS `genlu_sales_invoices`;
CREATE TABLE `genlu_sales_invoices` (
  `id` int(10) NOT NULL auto_increment,
  `invoice_number` varchar(255) NOT NULL,
  `customer_id` int(10) NOT NULL default '0',
  `shipping_info` text,
  `tax_id` varchar(25) NOT NULL default '0',
  `freight` decimal(10,2) default '0.00',
  `date` date NOT NULL default '0000-00-00',
  `note` text,
  `terms` varchar(255) default 'COD',
  `shipping_method` varchar(255) default 'CUSTOMER PICK UP',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `invoice_number` (`invoice_number`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genlu_sales_invoices`
--

LOCK TABLES `genlu_sales_invoices` WRITE;
/*!40000 ALTER TABLE `genlu_sales_invoices` DISABLE KEYS */;
INSERT INTO `genlu_sales_invoices` VALUES (4,'00010A0008',2,'2','5','0.00','2007-07-31','','COD','CUSTOMER PICK UP'),(10,'00010A0010',7,'0','','30.00','2007-08-06','','COD','CUSTOMER PICK UP'),(11,'00010A0011',8,'0','','0.00','2007-08-06','','COD','CUSTOMER PICK UP'),(12,'00010A0012',9,'0','','0.00','2007-08-07','','COD 30 DAYS','CUSTOMER PICK UP'),(13,'00010A0013',9,'0','','0.00','2007-08-07','','COD 30 DAYS','CUSTOMER PICK UP'),(27,'00010A0014',10,'a:7:{i:0;s:11:\"ITAPAL C.A.\";i:1;s:21:\"AVE. MIRANDA ESTE #10\";i:2;s:0:\"\";i:3;s:33:\"MARACAY - EDO. ARAGUA (VENEZUELA)\";i:4;s:13:\"0412-349-2992\";i:5;s:0:\"\";i:6;s:0:\"\";}','0','0.00','2007-08-13','','Prepaid','Excell Express'),(28,'00010A0015',2,'a:7:{i:0;s:11:\"Watch Plaza\";i:1;s:16:\"30 Ne 1st Avenue\";i:2;s:0:\"\";i:3;s:23:\"Miami - FL, 33132 (USA)\";i:4;s:12:\"305-358-0440\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-14','','COD 45/60 Days','delivery'),(29,'00010A0016',7,'a:7:{i:0;s:8:\"Mr Watch\";i:1;s:13:\"Aventura Mall\";i:2;s:0:\"\";i:3;s:16:\"Miami - FL (USA)\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-14','','COD 30 Days','delivery'),(34,'00010A0017',1,'a:7:{i:0;s:15:\"Watch Time Inc.\";i:1;s:17:\"121 E Flagler St.\";i:2;s:0:\"\";i:3;s:23:\"Miami - FL, 33132 (USA)\";i:4;s:14:\"(305) 539-0515\";i:5;s:14:\"(305) 539-0515\";i:6;s:22:\"sales@WatchTimeInc.com\";}','','0.00','2007-08-15','','COD 30 Days','delivery'),(35,'00010A0004',7,'a:7:{i:0;s:8:\"Mr Watch\";i:1;s:13:\"Aventura Mall\";i:2;s:0:\"\";i:3;s:16:\"Miami - FL (USA)\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-15','','Prepaid','Courier'),(36,'00010A0005',6,'a:7:{i:0;s:9:\"Watchland\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:16:\"Miami - FL (USA)\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-15','','Net 30 days','Courier'),(37,'00010A0006',11,'a:7:{i:0;s:16:\"Ramiro Quinteros\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:22:\"Bucaramanga (Colombia)\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-15','','Prepaid','Courier'),(38,'00010A0007',1,'a:7:{i:0;s:15:\"Watch Time Inc.\";i:1;s:17:\"121 E Flagler St.\";i:2;s:0:\"\";i:3;s:23:\"Miami - FL, 33132 (USA)\";i:4;s:14:\"(305) 539-0515\";i:5;s:14:\"(305) 539-0515\";i:6;s:22:\"sales@WatchTimeInc.com\";}','','0.00','2007-08-15','','Prepaid','Courier'),(39,'00010A0003',2,'a:7:{i:0;s:11:\"Watch Plaza\";i:1;s:16:\"30 Ne 1st Avenue\";i:2;s:0:\"\";i:3;s:23:\"Miami - FL, 33132 (USA)\";i:4;s:12:\"305-358-0440\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-14','','Prepaid','courier'),(40,'00010A0001',1,'a:7:{i:0;s:15:\"Watch Time Inc.\";i:1;s:17:\"121 E Flagler St.\";i:2;s:0:\"\";i:3;s:23:\"Miami - FL, 33132 (USA)\";i:4;s:14:\"(305) 539-0515\";i:5;s:14:\"(305) 539-0515\";i:6;s:22:\"sales@WatchTimeInc.com\";}','','0.00','2007-08-14','','Prepaid','courier'),(41,'00010A0002',2,'a:7:{i:0;s:11:\"Watch Plaza\";i:1;s:16:\"30 Ne 1st Avenue\";i:2;s:0:\"\";i:3;s:23:\"Miami - FL, 33132 (USA)\";i:4;s:12:\"305-358-0440\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-14','','Prepaid','courier'),(42,'00010A0018',12,'a:7:{i:0;s:22:\"JoyerÃ­a Damasco II CA\";i:1;s:37:\"Calle Dr. Carias Edf. Alfa, Mezanina,\";i:2;s:8:\"Local #5\";i:3;s:37:\"La Victoria - Edo. Aragua (Venezuela)\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-16','','NET 30 Days','Excell Express'),(43,'00010A0019',13,'a:7:{i:0;s:16:\"Joyeri­a Armenia\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:9:\"Venezuela\";i:4;s:14:\"58251-254-3067\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-20','','NET 30 Days','Excell Express'),(44,'00010A0020',14,'a:7:{i:0;s:12:\"Adrian Joyas\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:9:\"Venezuela\";i:4;s:14:\"58243-232-2050\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-20','','NET 30 Days','Excell Express'),(45,'00010A0021',15,'a:7:{i:0;s:10:\"Casa Odett\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:9:\"Venezuela\";i:4;s:14:\"58255-621-0985\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-21','','NET 30 Days','Excell Express'),(46,'00010A0022',2,'a:7:{i:0;s:11:\"Watch Plaza\";i:1;s:16:\"30 Ne 1st Avenue\";i:2;s:0:\"\";i:3;s:23:\"Miami - FL, 33132 (USA)\";i:4;s:12:\"305-358-0440\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-21','','COD 30/60 Days','Hand Deliver'),(47,'00010A0023',16,'a:7:{i:0;s:15:\"Genta Group LLC\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:21:\"Miami - Florida (USA)\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-08','','NET 30 Days','Customer Pick Up'),(48,'00010A0024',16,'a:7:{i:0;s:15:\"Genta Group LLC\";i:1;s:12:\"Dolphin Mall\";i:2;s:0:\"\";i:3;s:28:\"Miami - Florida, 33172 (USA)\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-14','','NET 30 Days','Customer Pick Up'),(49,'00010A0025',16,'a:7:{i:0;s:15:\"Genta Group LLC\";i:1;s:12:\"Dolphin Mall\";i:2;s:0:\"\";i:3;s:28:\"Miami - Florida, 33172 (USA)\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-14','','NET 60 Days','Hand Deliver'),(50,'00010A0026',16,'a:7:{i:0;s:15:\"Genta Group LLC\";i:1;s:12:\"Dolphin Mall\";i:2;s:0:\"\";i:3;s:28:\"Miami - Florida, 33172 (USA)\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-21','','NET 60 Days','Hand Deliver'),(51,'00010A0027',2,'a:7:{i:0;s:11:\"Watch Plaza\";i:1;s:16:\"30 Ne 1st Avenue\";i:2;s:0:\"\";i:3;s:23:\"Miami - FL, 33132 (USA)\";i:4;s:12:\"305-358-0440\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-24','','COD 30 Days','Hand Deliver'),(52,'00010A0028',8,'a:7:{i:0;s:12:\"Time Station\";i:1;s:18:\"1455 NW 107 Avenue\";i:2;s:0:\"\";i:3;s:23:\"Miami - FL, 33172 (USA)\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-27','','COD 30 Days','Hand Deliver'),(53,'00010A0029',16,'a:7:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";i:4;s:0:\"\";i:5;s:0:\"\";i:6;s:0:\"\";}','','0.00','2007-08-31','','','');
/*!40000 ALTER TABLE `genlu_sales_invoices` ENABLE KEYS */;
UNLOCK TABLES;

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`german`@`localhost` */ /*!50003 TRIGGER `deleteSalesLines` AFTER DELETE ON `genlu_sales_invoices` FOR EACH ROW BEGIN
  	DELETE FROM genlu_sales_invoice_lines WHERE invoice_id = OLD.id;
  END */;;

DELIMITER ;
/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;

--
-- Table structure for table `genlu_shipping_methods`
--

DROP TABLE IF EXISTS `genlu_shipping_methods`;
CREATE TABLE `genlu_shipping_methods` (
  `method` varchar(255) NOT NULL,
  `type` varchar(255) default NULL,
  PRIMARY KEY  (`method`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genlu_shipping_methods`
--

LOCK TABLES `genlu_shipping_methods` WRITE;
/*!40000 ALTER TABLE `genlu_shipping_methods` DISABLE KEYS */;
INSERT INTO `genlu_shipping_methods` VALUES ('UPS Ground','standard'),('UPS Next Day Air','air'),('UPS 2nd Day Air','air'),('UPS 3 Day Select','standard'),('Customer Pick Up','standard'),('Hand Deliver','standard'),('Courier','standard'),('Excell Express','standard');
/*!40000 ALTER TABLE `genlu_shipping_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genlu_vendors`
--

DROP TABLE IF EXISTS `genlu_vendors`;
CREATE TABLE `genlu_vendors` (
  `id` int(10) NOT NULL auto_increment,
  `contact` varchar(255) default NULL,
  `name` varchar(255) NOT NULL,
  `street_address` varchar(255) default NULL,
  `street_address2` varchar(255) default NULL,
  `city` varchar(255) default NULL,
  `state` varchar(255) default NULL,
  `zip_code` varchar(255) default NULL,
  `country` varchar(255) default NULL,
  `phone` varchar(255) default NULL,
  `mobile_phone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `website` varchar(255) default NULL,
  `notes` text,
  `enabled` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genlu_vendors`
--

LOCK TABLES `genlu_vendors` WRITE;
/*!40000 ALTER TABLE `genlu_vendors` DISABLE KEYS */;
INSERT INTO `genlu_vendors` VALUES (1,'contacto','Diversify','address01','','montevideo','mon','11300','uruguay','telefono','','fax','','','',1),(2,'Martin','Magic Group','223 East Flagler Street','Suite 601','Miami','FL','33131','USA','305-379-7988','','305-379-7989','','','Magic',1),(4,'Ali','Watch Plaza','30 Ne 1st Avenue',NULL,'Miami','FL','33132','USA','305-358-0440',NULL,NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `genlu_vendors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `genluStable`
--

USE `genluStable`;

--
-- Final view structure for view `genlu_inventory_purchases`
--

/*!50001 DROP TABLE IF EXISTS `genlu_inventory_purchases`*/;
/*!50001 DROP VIEW IF EXISTS `genlu_inventory_purchases`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`german`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `genlu_inventory_purchases` AS select `genlu_purchase_invoice_lines`.`product_id` AS `product_id`,sum(`genlu_purchase_invoice_lines`.`quantity`) AS `total_purchases` from `genlu_purchase_invoice_lines` group by `genlu_purchase_invoice_lines`.`product_id` */;

--
-- Final view structure for view `genlu_inventory_sales`
--

/*!50001 DROP TABLE IF EXISTS `genlu_inventory_sales`*/;
/*!50001 DROP VIEW IF EXISTS `genlu_inventory_sales`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`german`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `genlu_inventory_sales` AS select `genlu_sales_invoice_lines`.`product_id` AS `product_id`,sum(`genlu_sales_invoice_lines`.`quantity`) AS `total_sales` from `genlu_sales_invoice_lines` group by `genlu_sales_invoice_lines`.`product_id` */;

--
-- Final view structure for view `genlu_inventory_status`
--

/*!50001 DROP TABLE IF EXISTS `genlu_inventory_status`*/;
/*!50001 DROP VIEW IF EXISTS `genlu_inventory_status`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`german`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `genlu_inventory_status` AS select `p`.`reference` AS `reference`,`p`.`id` AS `id`,`compras`.`total_purchases` AS `total_purchases`,`ventas`.`total_sales` AS `total_sales`,sum((ifnull(`compras`.`total_purchases`,0) - ifnull(`ventas`.`total_sales`,0))) AS `total` from ((`genlu_products` `p` left join `genlu_inventory_purchases` `compras` on((`p`.`id` = `compras`.`product_id`))) left join `genlu_inventory_sales` `ventas` on((`p`.`id` = `ventas`.`product_id`))) group by `p`.`id` order by `p`.`reference` */;

--
-- Final view structure for view `genlu_product_cost_view`
--

/*!50001 DROP TABLE IF EXISTS `genlu_product_cost_view`*/;
/*!50001 DROP VIEW IF EXISTS `genlu_product_cost_view`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`german`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `genlu_product_cost_view` AS select `p`.`reference` AS `reference`,`p`.`last_unit_cost` AS `last_unit_cost`,round((sum((`l`.`quantity` * `l`.`unit_cost`)) / sum(`l`.`quantity`)),2) AS `avg` from (`genlu_purchase_invoice_lines` `l` left join `genlu_products` `p` on((`l`.`product_id` = `p`.`id`))) group by `p`.`reference` */;

--
-- Final view structure for view `genlu_purchase_invoice_totals`
--

/*!50001 DROP TABLE IF EXISTS `genlu_purchase_invoice_totals`*/;
/*!50001 DROP VIEW IF EXISTS `genlu_purchase_invoice_totals`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`german`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `genlu_purchase_invoice_totals` AS select `i`.`id` AS `id`,`i`.`invoice_number` AS `invoice_number`,`i`.`vendor_id` AS `vendor_id`,`i`.`date` AS `date`,(sum((`l`.`quantity` * `l`.`unit_cost`)) + `i`.`freight`) AS `total` from (`genlu_purchase_invoice_lines` `l` left join `genlu_purchase_invoices` `i` on((`i`.`id` = `l`.`invoice_id`))) group by `l`.`invoice_id` */;

--
-- Final view structure for view `genlu_sales_invoice_totals`
--

/*!50001 DROP TABLE IF EXISTS `genlu_sales_invoice_totals`*/;
/*!50001 DROP VIEW IF EXISTS `genlu_sales_invoice_totals`*/;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`german`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `genlu_sales_invoice_totals` AS select `i`.`id` AS `id`,`i`.`invoice_number` AS `invoice_number`,`i`.`customer_id` AS `customer_id`,`i`.`date` AS `date`,(sum((`l`.`quantity` * `l`.`unit_price`)) + `i`.`freight`) AS `total` from (`genlu_sales_invoice_lines` `l` left join `genlu_sales_invoices` `i` on((`i`.`id` = `l`.`invoice_id`))) group by `l`.`invoice_id` */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2007-08-31 17:10:04
