-- MySQL dump 10.13  Distrib 5.1.41, for pc-linux-gnu (i686)
--
-- Host: localhost    Database: sipa_inven
-- ------------------------------------------------------
-- Server version	5.1.41

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
-- Table structure for table `code`
--

DROP TABLE IF EXISTS `code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `code` (
  `c_id` int(30) unsigned NOT NULL AUTO_INCREMENT,
  `rd_id` int(10) unsigned NOT NULL DEFAULT '0',
  `code` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `remark` text,
  `serial` varchar(100) DEFAULT NULL,
  `num_machine` varchar(100) DEFAULT NULL,
  `num_box` varchar(100) DEFAULT NULL,
  `num_stamp` varchar(100) DEFAULT NULL,
  `colour` varchar(100) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `screen` varchar(100) DEFAULT NULL,
  `sale_date` date DEFAULT '0000-00-00',
  `sale_way` varchar(255) DEFAULT NULL,
  `sale_num` varchar(100) DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `sale_benefit` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_id`,`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2979 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `code`
--

LOCK TABLES `code` WRITE;
/*!40000 ALTER TABLE `code` DISABLE KEYS */;
/*!40000 ALTER TABLE `code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `division` (
  `div_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `div_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`div_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51011 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `division`
--

LOCK TABLES `division` WRITE;
/*!40000 ALTER TABLE `division` DISABLE KEYS */;
INSERT INTO `division` VALUES (51001,'สำนักปลัด'),(51002,'กองกิจการสภาฯ'),(51003,'กองแผนฯ'),(51004,'กองคลัง'),(51005,'กองช่าง'),(51006,'กองพัสดุฯ'),(51007,'กองการท่องเที่ยว'),(51010,'กองสาธารณสุข'),(51009,'หน่วยตรวจสอบภายใน');
/*!40000 ALTER TABLE `division` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `move`
--

DROP TABLE IF EXISTS `move`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `move` (
  `m_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_id` int(15) unsigned DEFAULT NULL,
  `year` int(4) NOT NULL DEFAULT '0',
  `department` text,
  `detail` text NOT NULL,
  `remark` text NOT NULL,
  `name_head` varchar(200) NOT NULL DEFAULT '',
  `user` text,
  UNIQUE KEY `m_id` (`m_id`),
  KEY `m_id_2` (`m_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `move`
--

LOCK TABLES `move` WRITE;
/*!40000 ALTER TABLE `move` DISABLE KEYS */;
/*!40000 ALTER TABLE `move` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `move_p`
--

DROP TABLE IF EXISTS `move_p`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `move_p` (
  `m_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rd_id` int(15) unsigned DEFAULT NULL,
  `year` int(4) NOT NULL DEFAULT '0',
  `department` text,
  `detail` text NOT NULL,
  `remark` text NOT NULL,
  `name_head` varchar(200) NOT NULL DEFAULT '',
  `user` text,
  UNIQUE KEY `m_id` (`m_id`),
  KEY `m_id_2` (`m_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `move_p`
--

LOCK TABLES `move_p` WRITE;
/*!40000 ALTER TABLE `move_p` DISABLE KEYS */;
/*!40000 ALTER TABLE `move_p` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receive`
--

DROP TABLE IF EXISTS `receive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receive` (
  `r_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `num_id` varchar(50) DEFAULT NULL,
  `shop_id` int(7) unsigned NOT NULL DEFAULT '0',
  `date_receive` date NOT NULL DEFAULT '0000-00-00',
  `come_in` int(2) NOT NULL DEFAULT '0',
  `paper_id` varchar(50) DEFAULT NULL,
  `type` tinyint(2) unsigned DEFAULT NULL,
  `planname` text,
  `project` text,
  `rep_id` varchar(50) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  UNIQUE KEY `r_id` (`r_id`),
  KEY `r_id_2` (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receive`
--

LOCK TABLES `receive` WRITE;
/*!40000 ALTER TABLE `receive` DISABLE KEYS */;
/*!40000 ALTER TABLE `receive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receive_detail`
--

DROP TABLE IF EXISTS `receive_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receive_detail` (
  `rd_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `r_id` int(10) unsigned NOT NULL DEFAULT '0',
  `type_id` int(10) NOT NULL DEFAULT '0',
  `rd_name` varchar(255) NOT NULL DEFAULT '',
  `amount` int(7) unsigned NOT NULL DEFAULT '0',
  `price` int(15) NOT NULL DEFAULT '0',
  `unit` varchar(255) NOT NULL DEFAULT '',
  `time_use` varchar(10) NOT NULL DEFAULT '',
  `brand_name` text,
  `type_name` varchar(200) DEFAULT NULL,
  `endDate_garan` date DEFAULT '0000-00-00',
  `garan_at` text,
  `date_garan` date DEFAULT '0000-00-00',
  `remark` text,
  `sale_date1` date DEFAULT '0000-00-00',
  `sale_way1` varchar(255) DEFAULT NULL,
  `sale_num1` varchar(100) DEFAULT NULL,
  `sale_price1` int(11) unsigned DEFAULT NULL,
  `sale_benefit1` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`rd_id`),
  KEY `id_2` (`rd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receive_detail`
--

LOCK TABLES `receive_detail` WRITE;
/*!40000 ALTER TABLE `receive_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `receive_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `sv_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_id` int(15) unsigned DEFAULT NULL,
  `date_ser` date NOT NULL DEFAULT '0000-00-00',
  `detail` text NOT NULL,
  `cost` float NOT NULL DEFAULT '0',
  `remark` text NOT NULL,
  `time` int(7) unsigned DEFAULT NULL,
  UNIQUE KEY `sv_id` (`sv_id`),
  KEY `sv_id_2` (`sv_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `t_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL,
  `time_use` int(3) DEFAULT NULL,
  `degen` float DEFAULT NULL,
  `type_id` tinyint(2) unsigned DEFAULT NULL,
  UNIQUE KEY `t_id` (`t_id`),
  KEY `t_id_2` (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'ครุภัณฑ์สำนักงาน ก',0,0,0),(2,'อาคารบ้านพัก',0,0,1),(3,'ครุภัณฑ์การศึกษา ข',0,0,0),(4,'อาคารสำนักงาน',0,0,1),(5,'ครุภัณฑ์ยานพาหนะและขนส่ง ค',0,0,0),(6,'ครุภัณฑ์การเกษตร ง',0,0,0),(7,'ครุภัณฑ์ก่อสร้าง จ',0,0,0),(8,'ครุภัณฑ์ไฟฟ้าและวิทยุ ฉ',0,0,0),(9,'ครุภัณฑ์โฆษณาและเผยแพร่ ช',0,0,0),(11,'ครุภัณฑ์งานบ้านงานครัว ฌ',0,0,0),(12,'ครุภัณฑ์โรงงาน ญ',0,0,0),(13,'ครุภัณฑ์เครื่องดับเพลิง ฎ',0,0,0),(14,'ครุภัณฑ์สำรวจ ฐ',0,0,0),(15,'ครุภัณฑ์คอมพิวเตอร์ ณ',0,0,0),(16,'อื่นๆ ด',0,0,0),(10,'ครุภัณฑ์วิทยาศาสตร์หรือการแพทย์ ซ',0,0,0),(17,'อาคารอบลำไย',0,0,1),(18,'อาคารโรงผลิตปุ๋ย',0,0,1),(19,'โรงเก็บรถยนตร์',0,0,1),(20,'รั้วและประตูบ้าน',0,0,1),(21,'อาคารโรงเก็บเครื่องมือกล',0,0,1),(22,'โรงงานผลิตปุ๋ยอินทรีย์',0,0,1),(23,'โครงการติดตั้งลิฟท์โดยสาร',0,0,1),(24,'ซุ้มเฉลิมพระเกรียติ',0,0,1);
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useful`
--

DROP TABLE IF EXISTS `useful`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useful` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_id` int(10) unsigned DEFAULT NULL,
  `year` int(4) unsigned DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `useful` text,
  `remark` text,
  UNIQUE KEY `u_id` (`u_id`),
  KEY `u_id_2` (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useful`
--

LOCK TABLES `useful` WRITE;
/*!40000 ALTER TABLE `useful` DISABLE KEYS */;
/*!40000 ALTER TABLE `useful` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useful_p`
--

DROP TABLE IF EXISTS `useful_p`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useful_p` (
  `u_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rd_id` int(10) unsigned DEFAULT NULL,
  `year` int(4) unsigned DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `useful` text,
  `remark` text,
  UNIQUE KEY `u_id` (`u_id`),
  KEY `u_id_2` (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useful_p`
--

LOCK TABLES `useful_p` WRITE;
/*!40000 ALTER TABLE `useful_p` DISABLE KEYS */;
/*!40000 ALTER TABLE `useful_p` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `u_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pivilage` tinyint(1) unsigned DEFAULT '0',
  UNIQUE KEY `id` (`u_id`),
  KEY `id_2` (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'demo','demo','administrator',0),(2,'admin','admin',NULL,0),(3,'report','report','-',1);
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

-- Dump completed on 2011-09-22 16:10:03
