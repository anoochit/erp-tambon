-- MySQL dump 10.13  Distrib 5.1.41, for pc-linux-gnu (i686)
--
-- Host: localhost    Database: sipa_store
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
-- Table structure for table `delete_detail`
--

DROP TABLE IF EXISTS `delete_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delete_detail` (
  `d_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `detail1` varchar(200) NOT NULL DEFAULT '',
  `detail2` varchar(200) NOT NULL DEFAULT '',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_del` varchar(50) NOT NULL DEFAULT '',
  `type` char(2) NOT NULL DEFAULT '',
  UNIQUE KEY `d_id` (`d_id`),
  KEY `d_id_2` (`d_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delete_detail`
--

LOCK TABLES `delete_detail` WRITE;
/*!40000 ALTER TABLE `delete_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `delete_detail` ENABLE KEYS */;
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
INSERT INTO `division` VALUES (51001,'สำนักปลัด อบจ.'),(51002,'กองกิจการสภาฯ'),(51003,'กองแผนฯ'),(51004,'กองคลัง'),(51005,'กองช่าง'),(51008,'กองการศึกษา ศาสนา วัฒนธรรม'),(51006,'กองพัสดุฯ'),(51007,'กองการท่องเที่ยว'),(51010,'กองสาธารณสุข'),(51009,'หน่วยตรวจสอบภายใน');
/*!40000 ALTER TABLE `division` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay`
--

DROP TABLE IF EXISTS `pay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay` (
  `p_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pay_id` varchar(50) NOT NULL DEFAULT '',
  `pay_type` varchar(10) DEFAULT NULL,
  `pay_date` date NOT NULL DEFAULT '0000-00-00',
  `open_name` varchar(100) NOT NULL DEFAULT '',
  `user_add` varchar(100) NOT NULL DEFAULT '',
  `date_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `plan_work` varchar(255) DEFAULT NULL,
  `project_name` tinytext,
  `detail` text NOT NULL,
  `paper_id` varchar(50) DEFAULT NULL,
  `div_id` int(5) NOT NULL DEFAULT '0',
  `dep_name` int(5) unsigned NOT NULL DEFAULT '0',
  UNIQUE KEY `p_id` (`p_id`),
  KEY `p_id_2` (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay`
--

LOCK TABLES `pay` WRITE;
/*!40000 ALTER TABLE `pay` DISABLE KEYS */;
/*!40000 ALTER TABLE `pay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_detail`
--

DROP TABLE IF EXISTS `pay_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_detail` (
  `pd_id` int(20) NOT NULL AUTO_INCREMENT,
  `p_id` int(10) unsigned NOT NULL DEFAULT '0',
  `product_id` int(10) NOT NULL DEFAULT '0',
  `product` varchar(200) NOT NULL DEFAULT '',
  `amount` float NOT NULL DEFAULT '0',
  `unit` varchar(100) NOT NULL DEFAULT '',
  `p_type` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`pd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_detail`
--

LOCK TABLES `pay_detail` WRITE;
/*!40000 ALTER TABLE `pay_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `pay_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `p_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `t_id` int(5) unsigned NOT NULL DEFAULT '0',
  `pro_name` varchar(200) DEFAULT NULL,
  `c_cost` float DEFAULT NULL,
  `unit1` varchar(50) DEFAULT NULL,
  `unit2` varchar(50) DEFAULT NULL,
  `amount` int(20) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned DEFAULT '0',
  `a_unit1` int(10) unsigned DEFAULT NULL,
  `a_unit2` int(10) unsigned DEFAULT NULL,
  `limite` int(5) unsigned DEFAULT '0',
  UNIQUE KEY `id` (`p_id`),
  KEY `id_2` (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=131 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (24,10,'กระดาษถ่ายเอกสาร 70g/A4/500 แผ่น',0,'แผ่น','โหล',0,0,1,12,0),(25,10,'กระดาษโรเนียว 34 K/A4/300 แผ่น',0,'ชิ้น','โหล',0,0,1,12,0),(26,10,'กระดาษถ่ายเอกสาร 70g/A3/500 แผ่น',0,'แผ่น','โหล',0,0,1,12,0),(27,10,'กระดาษชาร์ททำปก 110 แกรม/A4/180 แผ่น',0,'แผ่น','โหล',0,0,1,12,0),(28,10,'กระดาษสติ๊กโน๊ต',0,'แผ่น','โหล',0,0,1,12,0),(29,10,'กระดาษคาร์บอนสำหรับพิมพ์',0,'แผ่น','โหล',0,0,1,12,0),(30,10,'หมึกปริ้นเตอร์ HP 12 A ยี่ห้อ Canon / MP',0,'อัน','โหล',0,0,1,12,0),(31,10,'หมึกปริ้นเตอร์ HP 92 A ยี่ห้อ Canon LPP 1120/HP 92',0,'อัน','โหล',0,0,1,12,0),(32,10,'หมึกถ่ายเอกสาร ยี่ห้อ Canon LBP 2900/3030',0,'อัน','โหล',0,0,1,12,0),(33,10,'หมึกถ่ายเอกสาร ยี่ห้อ Canon 3135/NPG-28',0,'อัน','โหล',0,0,1,12,0),(34,10,'ซองขาวพับ 4 มีครุฑ',0,'ซอง','โหล',0,0,1,12,0),(35,10,'ซองน้ำตาลพับ 2 ตราครุฑ',0,'ซอง','โหล',0,0,1,12,0),(36,10,'ซองน้ำตาล 9x12',0,'ซอง','โหล',0,0,1,12,0),(37,10,'ซองน้ำตาลขยายข้าง 9x12',0,'ซอง','โหล',0,0,1,12,0),(38,10,'ซองประกวดราคาพับ 2',0,'ซอง','โหล',0,0,1,12,0),(39,10,'ซองประกวดราคาพับ 4',0,'ซอง','โหล',0,0,1,12,0),(40,10,'ซองประกวดราคา A4',0,'ซอง','โหล',0,0,1,12,0),(41,10,'แฟ้มสันหนา 3 นิ้ว ตราช้าง',0,'อัน','โหล',0,0,1,12,0),(42,10,'แฟ้มห่วงตราช้าง',0,'อัน','โหล',0,0,1,12,0),(43,10,'แฟ้มอ่อน',0,'อัน','โหล',0,0,1,12,0),(44,10,'แฟ้มหนีบพลาสติก ตราช้าง',0,'อัน','โหล',0,0,1,12,0),(45,10,'แฟ้มเสนอเซ็นต์',0,'อัน','โหล',0,0,1,12,0),(46,10,'แผ่นดิสก์โซนี่ กล่องกระดาษ(10 แผ่น)',0,'แผ่น','โหล',0,0,1,12,0),(47,10,'เทปปิดสันหนังสือ ขนาด 2',0,'อัน','โหล',0,0,1,12,0),(48,10,'เทปใส 1 นิ้ว',0,'อัน','โหล',0,0,1,12,0),(49,10,'สมุดปกแข็งน้ำเงิน เบอร์ 2/60',0,'เล่ม','โหล',0,0,1,12,0),(50,10,'สมุดปกแข็งน้ำเงิน เบอร์ 4/70',0,'เล่ม','โหล',0,0,1,12,0),(51,10,'ดินสอดำ/สเต็ดเลอร์',0,'แท่ง','โหล',0,0,1,12,0),(52,10,'ใบมีดคัตเตอร์ / 45 องศาใบใหญ่ / 6 ใบ',0,'ใบ','โหล',0,0,1,12,0),(53,10,'ผ้าหมึกพิมพ์ดีดแกนคู่ / ม้า',0,'อัน','โหล',0,0,1,12,0),(54,10,'คลีบหนีบดำ No108 Elren',0,'กล่อง','โหล',0,0,1,12,0),(55,10,'คลีบหนีบดำ No109 Elren',0,'กล่อง','โหล',0,0,1,12,0),(56,10,'คลีบหนีบดำ No112 Elren',0,'กล่อง','โหล',0,0,1,12,0),(57,10,'ลวดเย็บกระดาษ เบอร์ 10/MAX',0,'กล่อง','โหล',0,0,1,12,0),(58,10,'ลวดเย็บกระดาษ เบอร์ 3/MAX',0,'กล่อง','โหล',0,0,1,12,0),(59,10,'ทะเบียนหนังสือรับ A4 ปกแข็ง',0,'เล่ม','โหล',0,0,1,12,0),(60,10,'ทะเบียนหนังสือส่ง A4 ปกแข็ง',0,'เล่ม','โหล',0,0,1,12,0),(61,10,'แฮนดี้ไดรว์',0,'อัน','โหล',0,0,1,12,0),(62,10,'น้ำยาลบคำผิดลิควิดเปเปอร์/แบบปากกา',0,'อัน','โหล',0,0,1,12,0),(63,10,'ตรายาง',0,'อัน','โหล',0,0,1,12,0),(64,10,'ปากกาเพ้นท์ใหญ่/ซากุระ',0,'อัน','โหล',0,0,1,12,0),(65,10,'ปากกาเพ้นท์เล็ก/ซากุระ',0,'อัน','โหล',0,0,1,12,0),(66,10,'ปากกาลูกลื่น ดำ - นำเงิน - แดง',0,'อัน','โหล',0,0,1,12,0),(67,10,'ปากกาเน้นข้อความ / สเต็ดเลอร์',0,'อัน','โหล',0,0,1,12,0),(68,10,'เครื่องคิดเลข 12 หลัก ยี่ห้อ canon',0,'เครื่อง','โหล',0,0,1,12,0),(69,10,'เครื่องเจาะ 2 รู / เท่นใหญ่ / KW 952',0,'เครื่อง','โหล',0,0,1,12,0),(70,10,'ตรายางวันที่ภาษาไทย ตราช้าง',0,'อัน','โหล',0,0,1,12,0),(71,10,'เม้าท์คอมพิวเตอร์',0,'อัน','โหล',0,0,1,12,15),(72,10,'ไส้ปากกาปาร์คเกอร์ สีดำ 0.7',0,'อัน','โหล',0,0,1,12,0),(73,10,'เครื่องเจาะกระดาษ NO 912 TRIO',0,'เครื่อง','โหล',0,0,1,12,0),(74,10,'กาวน้ำ UHU /50 ML',0,'อัน','โหล',0,0,1,12,0),(75,10,'กาวแท่ง UHU /21 ML',0,'อัน','โหล',0,0,1,12,0),(77,11,'แปรงล้างห้องน้ำ',0,'อัน','โหล',0,0,1,12,0),(78,11,'แปรงใยขัดกะทะ สมารท',0,'อัน','โหล',0,0,1,12,0),(79,11,'แปรงใยขัดสองทาง',0,'อัน','โหล',0,0,1,12,0),(80,11,'สก็อตไบร์ 3M',0,'อัน','โหล',0,0,1,12,0),(81,11,'สก็อตไบร์ฟองน้ำขาว ไม่มีแผง',0,'อัน','โหล',0,0,1,12,0),(82,11,'ถุงขยะดำตราเสือ ขนาด 36x45 นิ้ว',0,'อัน','โหล',0,0,1,12,0),(83,11,'ถุงพลาสติกสีขาวใส(แพค)',0,'แพค','โหล',0,0,1,12,0),(84,11,'น้ำยาเช็ดกระจก วินเดอช์(5.2 ลิตร)',0,'ขวด','โหล',0,0,1,12,0),(85,11,'น้ำยาเช็ดกระจก วินเดอช์ ชนิดปั้ม(520 มล.)',0,'ขวด','โหล',0,0,1,12,0),(86,11,'น้ำยาเช็ดกระจก วินเดอช์ ชนิดปั้ม(270 มล.)',0,'ขวด','โหล',0,0,1,12,0),(87,11,'น้ำยาถูพื้นวิช(แกลลอน)',0,'แกลลอน','โหล',0,0,1,12,0),(88,11,'น้ำยาล้างจานซันไลต์ 500 ML (ขวด)',0,'ขวด','โหล',0,0,1,12,0),(89,11,'น้ำยาล้างจานซันไลต์ 650 ML (ถุง)',0,'ถุง','โหล',0,0,1,12,0),(90,11,'น้ำยาล้างห้องน้ำเป็ดโปร(ขวด)',0,'ขวด','โหล',0,0,1,12,0),(91,11,'แว๊กซี่',0,'อัน','โหล',0,0,1,12,0),(92,11,'น้ำยาดันฝุ่น',0,'อัน','โหล',0,0,1,12,0),(93,11,'ยาฉีดกันยุงแมลงเรดด์ 600 ม.ล ลาเวนเดอร์',0,'ขวด','โหล',0,0,1,12,0),(94,11,'กระดาษทิชชู ชิลด์ดอดตอน (แพค 24 ม้วน)',0,'แพค','โหล',0,0,1,12,0),(95,11,'กระดาษทิชชู เช็ดหน้า (กล่อง)',0,'กล่อง','โหล',0,0,1,12,0),(96,11,'กระดาษทิชชู เบลล์ (สีชมพู)',0,'กล่อง','โหล',0,0,1,12,0),(97,11,'ผงซักฟอก(ถุงใหญ่)',0,'ถุง','โหล',0,0,1,12,0),(98,11,'สบู่ (ก้อน)',0,'ก้อน','โหล',0,0,1,12,0),(99,11,'ลูกเหม็น 1000 กรัม',0,'อัน','โหล',0,0,1,12,0),(100,11,'เมลันก้อนดับกลิ่น (ก้อน)',0,'ก้อน','โหล',0,0,1,12,0),(101,11,'สเปรย์ปรับอากาศ',0,'ขวด','โหล',0,0,1,12,0),(102,11,'ไม้กวาดดอกหญ้า',0,'ด้าม','โหล',0,0,1,12,0),(103,11,'ไม้กวาดทางมะพร้าว',0,'ด้าม','โหล',0,0,1,12,0),(104,11,'ไม้ขนไก่ ด้ามพลาสติกยาว',0,'ด้าม','โหล',0,0,1,12,0),(105,11,'มู่ลี่',0,'อัน','โหล',0,0,1,12,0),(106,11,'พรมเช็ดเท้า (ชนิดใยมะพร้าว)',0,'ผืน','โหล',0,0,1,12,0),(107,11,'ที่โกยผงด้ามอลูมิเนียม',0,'อัน','โหล',0,0,1,12,0),(108,11,'ไม้ม๊อบดันฝุ่น พร้อมผ้า ขนาด 24 นิ้ว ชุด',0,'ด้าม','โหล',0,0,1,12,0),(109,11,'ไม้ม๊อบเปียก พร้อมผ้า ขนาด 10 นิ้ว ชุด',0,'ด้าม','โหล',0,0,1,12,0),(110,11,'อะไหล่ผ้าม๊อบดันฝุ่น',0,'อัน','โหล',0,0,1,12,0),(111,11,'เนสกาแฟ กล่องคู่',0,'กล่อง','โหล',0,0,1,12,12),(112,11,'คอฟฟี่เมต กล่องคู่',0,'กล่อง','โหล',0,0,1,12,0),(113,11,'น้ำตาลทรายขาว ลินท์',0,'ถุง','โหล',0,0,1,12,0),(114,11,'โอวัลติน ทรี อิน วัน',0,'ถุง','โหล',0,0,1,12,0),(115,11,'ชาลิปตัน',0,'ถุง','โหล',0,0,1,12,0),(116,11,'โอวัลติน ขนาด 800 กรัม',0,'ถุง','โหล',0,0,1,12,0),(117,11,'เนสกาแฟ ทรี อิน วัน',0,'ถุง','โหล',0,0,1,12,0),(118,11,'น้ำยาล้างห้องน้ำเอนกประสงค์ (แชมพู)',0,'อัน','โหล',0,0,1,12,0),(119,10,'คัดเตอร์ /LASER ขนาดเล็ก',0,'อัน','โหล',0,0,1,12,0),(120,10,'แท่นประทับตราเบอร์ 2 LANCER',0,'อัน','โหล',0,0,1,12,0),(121,10,'กาวน้ำชนิดเติม',0,'อัน','โหล',0,0,1,12,0),(122,10,'ที่ถอนลวด EAGLE รุ่น 1039A',0,'อัน','โหล',0,0,1,12,0),(123,10,'กระดาษชาร์คสี ขนาด 120 แกรม',0,'แผ่น','โหล',0,0,1,12,0),(124,10,'ฟิวเจอร์บอร์ด',0,'อัน','โหล',0,0,1,12,0),(125,10,'ยางลบ STAEDTLER',0,'อัน','โหล',0,0,1,12,0),(126,10,'ขี้ผึ้นับกระดาษ',0,'อัน','โหล',0,0,1,12,0),(127,10,'ไม้บรรทัดเหล็ก 12 นิ้ว',0,'อัน','โหล',0,0,1,12,0),(128,10,'หมึกตลับชาร์ท สีน้ำเงิน สีแดง',0,'อัน','โหล',0,0,1,12,0),(129,10,'ที่แขวงตรายาง',0,'อัน','โหล',0,0,1,12,0),(130,10,'เครื่องเย็บกระดาษ',0,'อัน','โหล',0,0,1,12,0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receive`
--

DROP TABLE IF EXISTS `receive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receive` (
  `r_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `num_id` varchar(50) NOT NULL DEFAULT '',
  `shop_id` int(7) NOT NULL DEFAULT '0',
  `date_receive` date NOT NULL DEFAULT '0000-00-00',
  `come_in` int(2) NOT NULL DEFAULT '0',
  `paper_id` varchar(50) NOT NULL DEFAULT '',
  `remark` text NOT NULL,
  `div_id` int(5) unsigned NOT NULL DEFAULT '0',
  `pay_id` int(10) unsigned NOT NULL DEFAULT '0',
  `shop_name` varchar(255) DEFAULT NULL,
  UNIQUE KEY `r_id` (`r_id`),
  KEY `r_id_2` (`r_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
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
  `p_id` int(20) unsigned NOT NULL DEFAULT '0',
  `amount` int(10) unsigned DEFAULT NULL,
  `cost` float NOT NULL DEFAULT '0',
  `vat` char(1) DEFAULT NULL,
  `a_cost` float NOT NULL DEFAULT '0',
  `unit` varchar(50) DEFAULT NULL,
  `pd_id` int(7) unsigned DEFAULT NULL,
  PRIMARY KEY (`rd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receive_detail`
--

LOCK TABLES `receive_detail` WRITE;
/*!40000 ALTER TABLE `receive_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `receive_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_card`
--

DROP TABLE IF EXISTS `stock_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_card` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `s_date` date NOT NULL DEFAULT '0000-00-00',
  `s_time` time NOT NULL DEFAULT '00:00:00',
  `s_type` char(2) NOT NULL DEFAULT '',
  `num_id` int(7) NOT NULL DEFAULT '0',
  `p_id` int(7) unsigned NOT NULL DEFAULT '0',
  `amount` mediumint(4) NOT NULL DEFAULT '0',
  `remain` mediumint(4) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned DEFAULT '0',
  `remark` varchar(200) NOT NULL DEFAULT '',
  `div_id` int(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_card`
--

LOCK TABLES `stock_card` WRITE;
/*!40000 ALTER TABLE `stock_card` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `t_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `p_type` varchar(200) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  UNIQUE KEY `id` (`t_id`),
  KEY `id_2` (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (10,'วัสดุสำนักงาน',0),(11,'วัสดุงานบ้านงานครัว',0),(12,'วัสดุเชื้อเพลิง',0),(13,'วัสดุยานพาหนะและขนส่ง',0),(14,'วัสดุวิทยาศาสตร์',0),(15,'วัสดุไฟฟ้า',0),(16,'วัสดุก่อสร้าง',0);
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `u_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `div_id` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=tis620;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin','ผู้ดูแลระบบส่วนกลาง','',0),(2,'div1','div1','สำนักปลัด','',51001),(3,'div2','div2','','',51002),(5,'div3','div3','admin3','',51003),(6,'report','report',' ',' ',1);
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

-- Dump completed on 2011-09-22 16:10:28
