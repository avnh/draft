-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: GIAOVIEN
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.04.1

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
-- Table structure for table `baibao`
--

DROP TABLE IF EXISTS `baibao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baibao` (
  `id_gv` int(11) NOT NULL,
  `tenBB` varchar(100) NOT NULL,
  `thamgia` varchar(100) NOT NULL,
  `tenB` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baibao`
--

LOCK TABLES `baibao` WRITE;
/*!40000 ALTER TABLE `baibao` DISABLE KEYS */;
INSERT INTO `baibao` VALUES (1,'TÃªn bÃ i bÃ¡o234','NgÆ°á»i tham gia','TÃªn bÃ¡o Ä‘Äƒng bÃ i'),(1,'TÃªÃ¡dfhungas','NgÆ°á»i tham giaÃ¡dfsdafdsaf','TÃªn bÃ¡o Ä‘Äƒng bÃ isadfsdafdasf');
/*!40000 ALTER TABLE `baibao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detainghiencuu`
--

DROP TABLE IF EXISTS `detainghiencuu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detainghiencuu` (
  `id_gv` int(11) NOT NULL,
  `tenDT` varchar(100) NOT NULL,
  `thoigian` varchar(100) NOT NULL,
  `mota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detainghiencuu`
--

LOCK TABLES `detainghiencuu` WRITE;
/*!40000 ALTER TABLE `detainghiencuu` DISABLE KEYS */;
INSERT INTO `detainghiencuu` VALUES (1,'AAA123','BBB12','CCC12'),(1,'AAAdkjashdfkjas','BBBdfsdfsdfs','CCdfasdfasdf');
/*!40000 ALTER TABLE `detainghiencuu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giangday`
--

DROP TABLE IF EXISTS `giangday`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `giangday` (
  `id_gv` int(11) NOT NULL,
  `maHP` varchar(100) NOT NULL,
  `tenHP` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giangday`
--

LOCK TABLES `giangday` WRITE;
/*!40000 ALTER TABLE `giangday` DISABLE KEYS */;
INSERT INTO `giangday` VALUES (1,'IT4800','Máº¡ng mÃ¡y tÃ­nh','http://soict.hust.edu.vn/~tungbt/it4800'),(1,'IT3480','An Ninh Máº¡ng','http://soict.hust.edu.vn/~tungbt/it3480');
/*!40000 ALTER TABLE `giangday` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `huongnghiencuu`
--

DROP TABLE IF EXISTS `huongnghiencuu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `huongnghiencuu` (
  `id_gv` int(11) NOT NULL,
  `tenHNC` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `huongnghiencuu`
--

LOCK TABLES `huongnghiencuu` WRITE;
/*!40000 ALTER TABLE `huongnghiencuu` DISABLE KEYS */;
INSERT INTO `huongnghiencuu` VALUES (1,'Malware');
/*!40000 ALTER TABLE `huongnghiencuu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sinhvienhd`
--

DROP TABLE IF EXISTS `sinhvienhd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sinhvienhd` (
  `id_gv` int(11) NOT NULL,
  `tenSV` varchar(100) NOT NULL,
  `detai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sinhvienhd`
--

LOCK TABLES `sinhvienhd` WRITE;
/*!40000 ALTER TABLE `sinhvienhd` DISABLE KEYS */;
INSERT INTO `sinhvienhd` VALUES (1,'Tráº§n Viá»‡t Anh','WAF');
/*!40000 ALTER TABLE `sinhvienhd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tt_gv`
--

DROP TABLE IF EXISTS `tt_gv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tt_gv` (
  `id_gv` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(100) NOT NULL,
  `chucvu` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bomon` varchar(500) NOT NULL,
  `vien` varchar(100) NOT NULL,
  `truong` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(500) NOT NULL,
  `anh` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_gv`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tt_gv`
--

LOCK TABLES `tt_gv` WRITE;
/*!40000 ALTER TABLE `tt_gv` DISABLE KEYS */;
INSERT INTO `tt_gv` VALUES (1,'Tráº§n HÃ¹ng Anh','Giáº£ng ViÃªn','hunganh','1234','An toÃ n thÃ´ng tin','CÃ´ng nghá»‡ thÃ´ng tin vÃ  truyá»n thÃ´ng','Äáº¡i Há»c BKHN','hunganh1803@gmail.com','B1-401',NULL),(2,'Tráº§n HÃ¹ng Anh','Giáº£ng ViÃªn','hunganh','1234','An toÃ n thÃ´ng tin','CÃ´ng nghá»‡ thÃ´ng tin vÃ  truyá»n thÃ´ng','Äáº¡i Há»c BKHN','hunganh1803@gmail.com','B1-401',NULL);
/*!40000 ALTER TABLE `tt_gv` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-23  6:30:41
