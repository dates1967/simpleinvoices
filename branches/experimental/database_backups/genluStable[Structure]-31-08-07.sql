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

DELIMITER ;;
/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`german`@`localhost` */ /*!50003 TRIGGER `updateQtyDown` AFTER INSERT ON `genlu_purchase_invoice_lines` FOR EACH ROW BEGIN
  	UPDATE genlu_products SET qty_hand = qty_hand + NEW.quantity WHERE id = NEW.product_id;
  END */;;

/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO" */;;
/*!50003 CREATE */ /*!50017 DEFINER=`german`@`localhost` */ /*!50003 TRIGGER `deleteQtyDown` AFTER DELETE ON `genlu_purchase_invoice_lines` FOR EACH ROW BEGIN
  	UPDATE genlu_products SET qty_hand = qty_hand - OLD.quantity WHERE id = OLD.product_id;
  END */;;

-- Creo que nunca se llega a esto ya que los updates en realidad son deletes + inserts.

/*!50003 CREATE */ /*!50017 DEFINER=`german`@`localhost` */ /*!50003 TRIGGER `updateQtyDown_onUpdate`
AFTER UPDATE ON `genlu_purchase_invoice_lines` FOR EACH ROW BEGIN
  	UPDATE genlu_products SET qty_hand = qty_hand - OLD.quantity + NEW.quantity WHERE id = NEW.product_id;
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

-- Dump completed on 2007-08-31 17:33:51
