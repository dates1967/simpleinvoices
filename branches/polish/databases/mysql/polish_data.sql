-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.61-2


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema simpleinvoices
--

--
-- Definition of table `simpleinvoices`.`si_custom_fields`
--

DROP TABLE IF EXISTS `simpleinvoices`.`si_custom_fields`;
CREATE TABLE  `simpleinvoices`.`si_custom_fields` (
  `cf_id` int(11) NOT NULL AUTO_INCREMENT,
  `cf_custom_field` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cf_custom_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cf_display` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `domain_id` int(11) NOT NULL,
  PRIMARY KEY (`cf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `simpleinvoices`.`si_custom_fields`
--
INSERT INTO `simpleinvoices`.`si_custom_fields` (`cf_id`,`cf_custom_field`,`cf_custom_label`,`cf_display`,`domain_id`) VALUES 
 (1,'biller_cf1','Konto bankowe','0',1),
 (2,'biller_cf2','NIP','0',1),
 (3,'biller_cf3',NULL,'0',1),
 (4,'biller_cf4',NULL,'0',1),
 (5,'customer_cf1','NIP','0',1),
 (6,'customer_cf2',NULL,'0',1),
 (7,'customer_cf3',NULL,'0',1),
 (8,'customer_cf4',NULL,'0',1),
 (9,'product_cf1','Słownie','0',1),
 (10,'product_cf2',NULL,'0',1),
 (11,'product_cf3',NULL,'0',1),
 (12,'product_cf4',NULL,'0',1),
 (13,'invoice_cf1','ORYGINAŁ | KOPIA','0',1),
 (14,'invoice_cf2','Data wystawienia','0',1),
 (15,'invoice_cf3',NULL,'0',1),
 (16,'invoice_cf4',NULL,'0',1);

--
-- Definition of table `simpleinvoices`.`si_payment_types`
--

DROP TABLE IF EXISTS `simpleinvoices`.`si_payment_types`;
CREATE TABLE  `simpleinvoices`.`si_payment_types` (
  `pt_id` int(10) NOT NULL AUTO_INCREMENT,
  `domain_id` int(11) NOT NULL DEFAULT '1',
  `pt_description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `pt_enabled` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`domain_id`,`pt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `simpleinvoices`.`si_payment_types`
--
INSERT INTO `simpleinvoices`.`si_payment_types` (`pt_id`,`domain_id`,`pt_description`,`pt_enabled`) VALUES 
 (1,1,'Gotówka','1'),
 (2,1,'Przelew 14 dniowy','1');

--
-- Definition of table `simpleinvoices`.`si_preferences`
--

DROP TABLE IF EXISTS `simpleinvoices`.`si_preferences`;
CREATE TABLE  `simpleinvoices`.`si_preferences` (
  `pref_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_id` int(11) NOT NULL DEFAULT '1',
  `pref_description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pref_currency_sign` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pref_inv_heading` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pref_inv_wording` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pref_inv_detail_heading` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pref_inv_detail_line` text COLLATE utf8_unicode_ci,
  `pref_inv_payment_method` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pref_inv_payment_line1_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pref_inv_payment_line1_value` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pref_inv_payment_line2_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pref_inv_payment_line2_value` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pref_enabled` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `index_group` int(11) NOT NULL,
  `currency_code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `include_online_payment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_position` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`domain_id`,`pref_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `simpleinvoices`.`si_preferences`
--
INSERT INTO `simpleinvoices`.`si_preferences` (`pref_id`,`domain_id`,`pref_description`,`pref_currency_sign`,`pref_inv_heading`,`pref_inv_wording`,`pref_inv_detail_heading`,`pref_inv_detail_line`,`pref_inv_payment_method`,`pref_inv_payment_line1_name`,`pref_inv_payment_line1_value`,`pref_inv_payment_line2_name`,`pref_inv_payment_line2_value`,`pref_enabled`,`status`,`locale`,`language`,`index_group`,`currency_code`,`include_online_payment`,`currency_position`) VALUES 
 (1,1,'Faktura VAT','PLN ','Faktura VAT','Faktura VAT','Faktura','','','Płatność przelewem','14 dni','','','1',1,NULL,NULL,1,'PLN ','','left'),
 (2,1,'Paragon','$','Receipt','Receipt','Details','<br />This transaction has been paid in full, please keep this receipt as proof of purchase.<br /> Thank you','','','','','','1',1,NULL,NULL,1,'USD','','left');

--
-- Definition of table `simpleinvoices`.`si_system_defaults`
--

DROP TABLE IF EXISTS `simpleinvoices`.`si_system_defaults`;
CREATE TABLE  `simpleinvoices`.`si_system_defaults` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `domain_id` int(5) NOT NULL DEFAULT '0',
  `extension_id` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`domain_id`,`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `simpleinvoices`.`si_system_defaults`
--
INSERT INTO `simpleinvoices`.`si_system_defaults` (`id`,`name`,`value`,`domain_id`,`extension_id`) VALUES 
 (1,'biller','4',1,1),
 (2,'customer','3',1,1),
 (3,'tax','2',1,1),
 (4,'preference','1',1,1),
 (5,'line_items','5',1,1),
 (6,'template','poland',1,1),
 (7,'payment_type','2',1,1),
 (8,'language','pl_PL',1,1),
 (9,'dateformate','Y-m-d',1,1),
 (10,'spreadsheet','xls',1,1),
 (11,'wordprocessor','doc',1,1),
 (12,'pdfscreensize','800',1,1),
 (13,'pdfpapersize','A4',1,1),
 (14,'pdfleftmargin','15',1,1),
 (15,'pdfrightmargin','15',1,1),
 (16,'pdftopmargin','15',1,1),
 (17,'pdfbottommargin','15',1,1),
 (18,'emailhost','localhost',1,1),
 (19,'emailusername','',1,1),
 (20,'emailpassword','',1,1),
 (21,'logging','1',1,1),
 (22,'delete','1',1,1),
 (23,'tax_per_line_item','1',1,1),
 (24,'inventory','0',1,1);

--
-- Definition of table `simpleinvoices`.`si_tax`
--

DROP TABLE IF EXISTS `simpleinvoices`.`si_tax`;
CREATE TABLE  `simpleinvoices`.`si_tax` (
  `tax_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_percentage` decimal(25,6) DEFAULT '0.000000',
  `type` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_enabled` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `domain_id` int(11) NOT NULL,
  PRIMARY KEY (`domain_id`,`tax_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `simpleinvoices`.`si_tax`
--
INSERT INTO `simpleinvoices`.`si_tax` (`tax_id`,`tax_description`,`tax_percentage`,`type`,`tax_enabled`,`domain_id`) VALUES 
 (2,'VAT 23%','23.000000','%','1',1),
 (4,'VAT 7%','7.000000','%','1',1);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
