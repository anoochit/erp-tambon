-- MySQL dump 10.13  Distrib 5.1.41, for pc-linux-gnu (i686)
--
-- Host: localhost    Database: sipa_mis
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `u_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pivilage` tinyint(1) unsigned DEFAULT '0',
  UNIQUE KEY `u_id` (`u_id`),
  KEY `u_id_2` (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin','Administrator',1),(2,'user1','user1','user1',0),(3,'admin1','admin','Administrator1',1),(4,'report','report','report',2);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `cat_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `c_id` (`cat_id`),
  KEY `c_id_2` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'ข้าราชการ'),(2,'ลูกจ้างประจำ'),(3,'พนักงานจ้างตามภารกิจ'),(4,'พนักงานจ้างทั่วไป');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `children`
--

DROP TABLE IF EXISTS `children`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `children` (
  `cd_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `lyceum` varchar(50) DEFAULT NULL,
  `office` varchar(50) DEFAULT NULL,
  `remark` tinytext,
  PRIMARY KEY (`cd_id`),
  KEY `children_Fl_1` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `children`
--

LOCK TABLES `children` WRITE;
/*!40000 ALTER TABLE `children` DISABLE KEYS */;
/*!40000 ALTER TABLE `children` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coin`
--

DROP TABLE IF EXISTS `coin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coin` (
  `co_id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `co_date` date DEFAULT '0000-00-00',
  `detail` tinytext,
  `remark` tinytext,
  PRIMARY KEY (`co_id`),
  KEY `reserve_Fl_1` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coin`
--

LOCK TABLES `coin` WRITE;
/*!40000 ALTER TABLE `coin` DISABLE KEYS */;
/*!40000 ALTER TABLE `coin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `come_late`
--

DROP TABLE IF EXISTS `come_late`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `come_late` (
  `l_id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `date_late` date DEFAULT NULL,
  `time_late` varchar(5) DEFAULT '00.00',
  `remark` tinytext,
  PRIMARY KEY (`l_id`),
  KEY `punish_Fl_1` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `come_late`
--

LOCK TABLES `come_late` WRITE;
/*!40000 ALTER TABLE `come_late` DISABLE KEYS */;
/*!40000 ALTER TABLE `come_late` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dep_sec`
--

DROP TABLE IF EXISTS `dep_sec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dep_sec` (
  `d_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `remark` tinytext,
  PRIMARY KEY (`d_id`),
  KEY `security_Fl_1` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dep_sec`
--

LOCK TABLES `dep_sec` WRITE;
/*!40000 ALTER TABLE `dep_sec` DISABLE KEYS */;
/*!40000 ALTER TABLE `dep_sec` ENABLE KEYS */;
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
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `education` (
  `e_id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(15) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `ps_edu_id` char(2) DEFAULT NULL,
  `academy` varchar(200) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `e_status` tinyint(1) unsigned DEFAULT '0',
  `land` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education`
--

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;
/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_detail`
--

DROP TABLE IF EXISTS `job_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_detail` (
  `j_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `date_add` date DEFAULT NULL,
  `detail` text NOT NULL,
  `remark` text NOT NULL,
  UNIQUE KEY `j_id` (`j_id`),
  KEY `j_id_2` (`j_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_detail`
--

LOCK TABLES `job_detail` WRITE;
/*!40000 ALTER TABLE `job_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `law`
--

DROP TABLE IF EXISTS `law`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `law` (
  `ll_id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ps_wrong_id` char(1) DEFAULT NULL,
  `remark` tinytext,
  `date_add` date DEFAULT '0000-00-00',
  PRIMARY KEY (`ll_id`),
  UNIQUE KEY `l_id` (`ll_id`),
  KEY `l_id_2` (`ll_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `law`
--

LOCK TABLES `law` WRITE;
/*!40000 ALTER TABLE `law` DISABLE KEYS */;
/*!40000 ALTER TABLE `law` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medal`
--

DROP TABLE IF EXISTS `medal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medal` (
  `m_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ps_medid` char(2) DEFAULT NULL,
  `remark` tinytext,
  `m_status` tinyint(1) DEFAULT '0',
  `date_add` date DEFAULT '0000-00-00',
  PRIMARY KEY (`m_id`),
  UNIQUE KEY `m_id` (`m_id`),
  KEY `m_id_2` (`m_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medal`
--

LOCK TABLES `medal` WRITE;
/*!40000 ALTER TABLE `medal` DISABLE KEYS */;
/*!40000 ALTER TABLE `medal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medim`
--

DROP TABLE IF EXISTS `medim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medim` (
  `m_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ps_medid` char(2) DEFAULT NULL,
  `remark` tinytext,
  `m_status` tinyint(1) DEFAULT '0',
  `date_add` date DEFAULT '0000-00-00',
  PRIMARY KEY (`m_id`),
  UNIQUE KEY `m_id` (`m_id`),
  KEY `m_id_2` (`m_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medim`
--

LOCK TABLES `medim` WRITE;
/*!40000 ALTER TABLE `medim` DISABLE KEYS */;
/*!40000 ALTER TABLE `medim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `user_id` int(10) NOT NULL DEFAULT '0',
  `div_id` int(5) DEFAULT NULL,
  `sub_id` varchar(20) DEFAULT NULL,
  `pos_id` char(2) DEFAULT NULL,
  `per_id` varchar(10) DEFAULT NULL,
  `ps_tname_id` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date_contain` date DEFAULT '0000-00-00',
  `date_start` date DEFAULT '0000-00-00',
  `birthday` date DEFAULT '0000-00-00',
  `fa_name` varchar(100) DEFAULT NULL,
  `fa_nation` varchar(50) DEFAULT NULL,
  `fa_faith` varchar(50) DEFAULT NULL,
  `fa_occu` varchar(50) DEFAULT NULL,
  `mo_name` varchar(100) DEFAULT NULL,
  `mo_nation` varchar(50) DEFAULT NULL,
  `mo_faith` varchar(50) DEFAULT NULL,
  `mo_occu` varchar(50) DEFAULT NULL,
  `id_person` varchar(20) DEFAULT NULL,
  `tax_id` varchar(31) DEFAULT NULL,
  `id_serv` varchar(20) DEFAULT NULL,
  `ss_id` varchar(31) DEFAULT NULL,
  `num_address` varchar(10) DEFAULT NULL,
  `moo` varchar(50) DEFAULT NULL,
  `road` varchar(100) DEFAULT NULL,
  `soi` varchar(100) DEFAULT NULL,
  `subdistrict` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `county` varchar(100) DEFAULT NULL,
  `zip_code` varchar(5) DEFAULT NULL,
  `address` tinytext,
  `phone` varchar(31) DEFAULT NULL,
  `blood` varchar(5) DEFAULT NULL,
  `race` varchar(20) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `faith` varchar(20) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `mate_name` varchar(100) DEFAULT NULL,
  `mate_nation` varchar(50) DEFAULT NULL,
  `mate_faith` varchar(50) DEFAULT NULL,
  `mate_occu` varchar(50) DEFAULT NULL,
  `office` varchar(50) DEFAULT NULL,
  `ruck` varchar(50) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `work_cease` date DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  `type_work` varchar(255) DEFAULT NULL,
  `reseve` char(1) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `type_mem` tinyint(1) unsigned DEFAULT '0',
  `status_ma` varchar(20) DEFAULT NULL,
  `num_address_old` varchar(50) DEFAULT NULL,
  `moo_old` varchar(50) DEFAULT NULL,
  `road_old` varchar(100) DEFAULT NULL,
  `subdistrict_old` varchar(100) DEFAULT NULL,
  `district_old` varchar(100) DEFAULT NULL,
  `county_old` varchar(100) DEFAULT NULL,
  `zip_code_old` varchar(10) DEFAULT NULL,
  `phone_old` varchar(20) DEFAULT NULL,
  `mobile_old` varchar(20) DEFAULT NULL,
  `place_con` varchar(100) DEFAULT NULL,
  `num_address_con` varchar(20) DEFAULT NULL,
  `moo_con` varchar(20) DEFAULT NULL,
  `road_con` varchar(50) DEFAULT NULL,
  `subdistrict_con` varchar(200) DEFAULT NULL,
  `district_con` varchar(200) DEFAULT NULL,
  `county_con` varchar(200) DEFAULT NULL,
  `phone_con` varchar(50) DEFAULT NULL,
  `mobile_con` varchar(50) DEFAULT NULL,
  `occu_old` varchar(100) DEFAULT NULL,
  `occu_new` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `position` (
  `pos_id` int(10) NOT NULL AUTO_INCREMENT,
  `pos_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (1,'หัวหน้าฝ่าย'),(3,'รองหัวหน้าฝ่าย'),(8,'เจ้าหน้าที่');
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_edu_ref`
--

DROP TABLE IF EXISTS `ps_edu_ref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_edu_ref` (
  `ps_edu_id` char(2) NOT NULL DEFAULT '',
  `ps_edu_item` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ps_edu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_edu_ref`
--

LOCK TABLES `ps_edu_ref` WRITE;
/*!40000 ALTER TABLE `ps_edu_ref` DISABLE KEYS */;
INSERT INTO `ps_edu_ref` VALUES ('00','ประถมศึกษา'),('01','มัธยมศึกษาตอนต้น'),('02','มัธยมศึกษาตอนปลาย'),('03','ประกาศนียบัตรวิชาชีพ'),('04','ประกาศนียบัตรวิชาชีพเทคนิค'),('05','ประกาศนียบัตรวิชาชีพชั้นสูง'),('06','ปริญญาตรี'),('07','สูงกว่าปริญญาตรี'),('08','ปริญญาโท'),('09','สูงกว่าปริญญาโท'),('10','ปริญญาเอก');
/*!40000 ALTER TABLE `ps_edu_ref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_latype`
--

DROP TABLE IF EXISTS `ps_latype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_latype` (
  `ps_latype_id` smallint(6) NOT NULL DEFAULT '0',
  `ps_latype_item` varchar(50) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`ps_latype_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_latype`
--

LOCK TABLES `ps_latype` WRITE;
/*!40000 ALTER TABLE `ps_latype` DISABLE KEYS */;
INSERT INTO `ps_latype` VALUES (1,'ลาป่วย',0),(2,'ลาคลอดบุตร',0),(3,'ลากิจส่วนตัว',0),(4,'ลาพักผ่อน',0),(5,'ลาอุปสมบท',0),(6,'ประกอบพิธีฮัจย์',1),(7,'ลาเข้ารับการตรวจเลือกทหาร',1),(8,'ศึกษาในประเทศ',1),(9,'ศึกษาต่างประเทศ',1),(10,'ลาปฎิบัติงานในองค์การระหว่างประเทศ',1),(11,'ลาติดตามคู่สมรส',1),(12,'ไปราชการในประเทศ',1),(13,'ไปราชการต่างประเทศ',1),(14,'อบรม',1),(15,'สัมนา',1),(16,'ประชุม',1),(17,'ดูงาน',1),(18,'อื่นๆ',0);
/*!40000 ALTER TABLE `ps_latype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_medal_ref`
--

DROP TABLE IF EXISTS `ps_medal_ref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_medal_ref` (
  `ps_medid` char(2) NOT NULL DEFAULT '',
  `ps_meditem` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ps_medid`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_medal_ref`
--

LOCK TABLES `ps_medal_ref` WRITE;
/*!40000 ALTER TABLE `ps_medal_ref` DISABLE KEYS */;
INSERT INTO `ps_medal_ref` VALUES ('01','เหรียญเงินมงกุฏไทย'),('02','เหรียญเงินช้างเผือก'),('03','เหรียญทองมงกุฏไทย'),('04','เหรียญทองช้างเผือก'),('05','เบญจมาภรณ์มงกุฏไทย'),('06','เบญจมาภรณช้างเผือก'),('07','จตุรถาภรณ์ณ์มงกุฏไทย'),('08','จตุรถาภรณ์ณ์ช้างเผือก'),('09','ตริตาภรณ์มงกุฏไทย'),('10','ตริตาภรณ์ช้างเผือก'),('11','ทวีติยาภรณ์มงกุฏไทย'),('12','ทวีติยาภรณ์ช้างเผือก'),('13','ประถมาภรณ์มงกุฏไทย'),('14','ประถมาภรณช้างเผือก'),('15','มหาวชิรมงกุฏ'),('16','มหาปรมาภรณ์ช้างเผือก');
/*!40000 ALTER TABLE `ps_medal_ref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_tname_ref`
--

DROP TABLE IF EXISTS `ps_tname_ref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_tname_ref` (
  `ps_tname_id` char(2) NOT NULL DEFAULT '',
  `ps_tname_item` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ps_tname_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_tname_ref`
--

LOCK TABLES `ps_tname_ref` WRITE;
/*!40000 ALTER TABLE `ps_tname_ref` DISABLE KEYS */;
INSERT INTO `ps_tname_ref` VALUES ('00','ไม่ระบุ'),('01','นาย'),('02','นางสาว'),('03','นาง'),('04','ม.ร.ว'),('05','ม.ล.'),('06','ว่าที่ ร.ต.'),('07','ว่าที่ พ.ต.'),('08','ส.อ.'),('09','ส.ท.'),('10','ส.ต.'),('11','พ.อ.'),('12','พ.ท.'),('13','พ.ต.'),('14','ดร.'),('15','ศ.'),('16','รศ.'),('17','ผศ.'),('18','นพ.'),('19','ผศ.นพ.'),('20','รศ.ดร.'),('21','ผศ.ดร.'),('22','ศ.ดร.'),('23','ด.ช.'),('24','ด.ญ.'),('25','ด.ต.'),('26','น.ต.'),('27','น.ต.หญิง'),('28','น.ท.'),('29','น.ท.หญิง'),('30','ผศ.ดร.'),('31','พ.ต.อ.'),('32','พ.ต.ท'),('33','พ.ต.ต'),('34','พ.ต.หญิง'),('35','พ.ต.อ.นพ.'),('36','พ.อ.อ.'),('37','ร.ต.'),('38','ร.ต.หญิง'),('39','ร.ต.อ.'),('40','ร.ท.'),('41','ร.ท.หญิง'),('42','ร.อ.'),('43','ร.อ.หญิง'),('44','ร.ต.ท.'),('45','ร.ต.อ.นพ.'),('46','ร.ต.อ.หญิง'),('47','รศ.นพ'),('48','ส.ต.ต'),('49','ส.ต.ท'),('50','ส.ต.อ.'),('51','ส.ต.อ.หญิง'),('52','ส.อ.หญิง'),('53','ทพ.ญ.'),('54','พ.ญ.'),('55','จ.ส.ต.'),('56','จ.ส.อ.'),('57','พลตำรวจ'),('58','จ.อ.'),('59','ทพ.'),('60','จ.ส.อ.หญิง'),('61','นายดาบตำรวจ'),('62','ศ.พ.ญ.'),('63','อ.'),('64','จ.ส.ท.');
/*!40000 ALTER TABLE `ps_tname_ref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_type_ref`
--

DROP TABLE IF EXISTS `ps_type_ref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_type_ref` (
  `ps_type_id` char(1) NOT NULL DEFAULT '',
  `ps_type_item` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ps_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_type_ref`
--

LOCK TABLES `ps_type_ref` WRITE;
/*!40000 ALTER TABLE `ps_type_ref` DISABLE KEYS */;
INSERT INTO `ps_type_ref` VALUES ('0','ข้าราชการสาย ก.'),('1','ข้าราชการสาย ข.'),('2','ข้าราชการสาย ค.'),('3','ลูกจ้างประจำ'),('4','ลูกจ้างชั่วคราว(เงินแผ่นดิน)'),('5','ลูกจ้างชั่วคราว(เงินรายได้)'),('6','พนักงานมหาวิทยาลัย'),('7','ข้าราชการบำนาญ'),('8','พนักงานสถานฯ');
/*!40000 ALTER TABLE `ps_type_ref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ps_wrong_ref`
--

DROP TABLE IF EXISTS `ps_wrong_ref`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ps_wrong_ref` (
  `ps_wrong_id` char(1) NOT NULL DEFAULT '',
  `ps_writem` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ps_wrong_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ps_wrong_ref`
--

LOCK TABLES `ps_wrong_ref` WRITE;
/*!40000 ALTER TABLE `ps_wrong_ref` DISABLE KEYS */;
INSERT INTO `ps_wrong_ref` VALUES ('0','ภาคทัณฑ์'),('1','ลดขั้นเงินเดือน'),('2','ตัดเงินเดือน'),('3','ให้ออก'),('4','ปลดออก'),('5','ไล่ออก');
/*!40000 ALTER TABLE `ps_wrong_ref` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subdivision`
--

DROP TABLE IF EXISTS `subdivision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subdivision` (
  `sub_id` varchar(20) NOT NULL DEFAULT '',
  `div_id` int(5) DEFAULT NULL,
  `sub_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subdivision`
--

LOCK TABLES `subdivision` WRITE;
/*!40000 ALTER TABLE `subdivision` DISABLE KEYS */;
INSERT INTO `subdivision` VALUES ('51001.1',51001,'ฝ่ายบริหารงานทั่วไป'),('51001.2',51001,'ฝ่ายบริหารงานบุคคล'),('51001.3',51001,'ฝ่ายนิติการและการพานิชย์'),('51001.4',51001,'ฝ่ายพัฒนาสังคม'),('51002.1',51002,'ฝ่ายการประชุมสภา '),('51002.2',51002,'ฝ่ายกิจการสภา '),('51002.3',51002,'ฝ่ายส่งเสริมการมีส่วนร่วมของประชาชน'),('51003.1',51003,'ฝ่ายนโยบายและแผน'),('51003.2',51003,'ฝ่ายงบประมาณและพัฒนารายได้'),('51003.3',51003,'ฝ่ายตรวจติดตามและประเมินผลแผนงานโครงการ'),('51004.1',51004,'ฝ่ายการเงิน'),('51004.2',51004,'ฝ่ายบัญชี'),('51004.3',51004,'ฝ่ายเร่งรัดและจัดเก็บรายได้'),('51004.4',51004,'งานธุรการ'),('51005.1',51005,'ฝ่ายสำรวจและออกแบบ'),('51005.2',51005,'ฝ่ายก่อสร้างและซ่อมบำรุง'),('51005.3',51005,'ฝ่ายเครื่องจักรกล'),('51005.4',51005,'ฝ่ายสาธารณภัยและสิ่งแวดล้อม'),('51008.1',51008,'ฝ่ายบริหารการศึกษา'),('51008.2',51008,'ฝ่ายวิชาการและส่งเสริมการศึกษา'),('51006.1',51006,'ฝ่ายจัดหาพัสดุและทรัพย์สิน'),('51006.2',51006,'ฝ่ายควบคุมตรวจสอบพัสดุและทรัพย์สิน'),('51007.1',51007,'ฝ่ายส่งเสริมพัฒนาการท่องเที่ยว'),('51007.2',51007,'ฝ่ายส่งเสริมการกีฬา'),('51007.3',51007,'ฝ่ายประชาสัมพันธ์'),('51007.4',51007,'งานเทคโนโลยีและสารสนเทศ'),('51010.1',51010,'ฝ่ายงานโรงพยาบาล'),('51010.2',51010,'ฝ่ายส่งเสริมสุขภาพฯ'),('51010.3',51010,'ฝ่ายวิชาการ แผนงานและประเมินผล'),('51010.4',51010,'งานธุรการ');
/*!40000 ALTER TABLE `subdivision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_plus`
--

DROP TABLE IF EXISTS `time_plus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_plus` (
  `ti_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `date_plus` date NOT NULL DEFAULT '0000-00-00',
  `detail` tinytext NOT NULL,
  `remark` tinytext NOT NULL,
  UNIQUE KEY `ti_id` (`ti_id`),
  KEY `ti_id_2` (`ti_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_plus`
--

LOCK TABLES `time_plus` WRITE;
/*!40000 ALTER TABLE `time_plus` DISABLE KEYS */;
/*!40000 ALTER TABLE `time_plus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training`
--

DROP TABLE IF EXISTS `training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `training` (
  `t_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `date_add` date DEFAULT '0000-00-00',
  `date_begin` date DEFAULT '0000-00-00',
  `date_end` date DEFAULT '0000-00-00',
  `place` tinytext,
  `qualification` varchar(100) DEFAULT NULL,
  `remark` tinytext,
  `dep` varchar(255) DEFAULT NULL,
  `garan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`t_id`),
  KEY `training_Fl_1` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training`
--

LOCK TABLES `training` WRITE;
/*!40000 ALTER TABLE `training` DISABLE KEYS */;
/*!40000 ALTER TABLE `training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `type_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `cat_id` tinyint(3) NOT NULL DEFAULT '0',
  `type_name` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `type_id` (`type_id`),
  KEY `type_id_2` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,1,'ระดับ 1'),(2,1,'ระดับ 2'),(3,1,'ระดับ 3'),(4,1,'ระดับ 4'),(5,1,'ระดับ 5'),(6,1,'ระดับ 6'),(7,1,'ระดับ 7'),(8,1,'ระดับ 8'),(9,1,'ระดับ 9'),(10,1,'ระดับ 10'),(11,1,'ระดับ 11'),(12,1,'ระดับ 12'),(13,1,'ระดับ 13'),(14,1,'ระดับ 14'),(15,2,'หมวดแรงงาน'),(16,2,'หมวดฝีมือพิเศษระดับกลาง'),(17,2,'หมวดฝีมือพิเศษระดับต้น'),(18,2,'หมวดอื่นๆ'),(19,3,'ผู้มีทักษะ'),(20,3,'ผู้มีคุณวุฒิ'),(21,4,'พนักงานจ้างทั่วไป');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacation`
--

DROP TABLE IF EXISTS `vacation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacation` (
  `v_id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `ps_latype_id` smallint(6) unsigned DEFAULT NULL,
  `la_for` varchar(255) DEFAULT NULL,
  `date_add` date DEFAULT NULL,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `find_me` varchar(255) DEFAULT NULL,
  `work_to` varchar(255) DEFAULT NULL,
  `remark` tinytext,
  PRIMARY KEY (`v_id`),
  KEY `vacation_Fl_1` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacation`
--

LOCK TABLES `vacation` WRITE;
/*!40000 ALTER TABLE `vacation` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work`
--

DROP TABLE IF EXISTS `work`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work` (
  `w_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `start_work` date DEFAULT '0000-00-00',
  `end_work` date DEFAULT '0000-00-00',
  `confirm_date` date DEFAULT '0000-00-00',
  `place` varchar(255) DEFAULT NULL,
  `div_id` int(5) DEFAULT NULL,
  `sub_id` varchar(20) DEFAULT NULL,
  `pos_id` char(3) DEFAULT NULL,
  `per_id` varchar(50) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `pay` double DEFAULT NULL,
  `pay_special` double DEFAULT NULL,
  `pay_month` double DEFAULT NULL,
  `pay_live` double DEFAULT NULL,
  `pay_posi` double DEFAULT NULL,
  `remark` tinytext,
  `w_status` tinyint(1) unsigned DEFAULT '0',
  `cat_id` tinyint(3) unsigned DEFAULT NULL,
  `type_id` tinyint(3) unsigned DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `pay_child` double DEFAULT NULL,
  `command` varchar(255) DEFAULT NULL,
  `date_command` date DEFAULT '0000-00-00',
  PRIMARY KEY (`w_id`),
  KEY `work_Fl_1` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work`
--

LOCK TABLES `work` WRITE;
/*!40000 ALTER TABLE `work` DISABLE KEYS */;
/*!40000 ALTER TABLE `work` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-09-22 16:10:15
