-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: film
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `pwd` char(32) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'jiajia','e10adc3949ba59abbe56e057f20f883e',1516676921,1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cinemas`
--

DROP TABLE IF EXISTS `cinemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cinemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pwd` char(32) NOT NULL,
  `money` decimal(8,2) DEFAULT '0.00',
  `address` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cinemas`
--

LOCK TABLES `cinemas` WRITE;
/*!40000 ALTER TABLE `cinemas` DISABLE KEYS */;
INSERT INTO `cinemas` VALUES (5,'北京华纳国际影城','huana','202cb962ac59075b964b07152d234b70',0.00,'西直门23号华纳国际'),(6,'北京成龙耀武影院','cl','e10adc3949ba59abbe56e057f20f883e',0.00,'天门们广场'),(7,'郑州农业路凤城国际','cl','e10adc3949ba59abbe56e057f20f883e',0.00,'农业路与南阳路交叉口'),(8,'郑州AABB凤城国际','cl','e10adc3949ba59abbe56e057f20f883e',0.00,'农业路与南阳路交叉口100米');
/*!40000 ALTER TABLE `cinemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cover` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (1,'public/uploads/20180123/276f20b93fc2bc63f167317698c560fc.jpg'),(2,'public/uploads/20180123/8a69ad6109176ef35a51c9596ba42b29.jpg'),(3,'public/uploads/20180123/a44df6ab917dc3cadbc0af8b3a0b1d48.jpg');
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `videoid` int(11) NOT NULL,
  `cinemaid` int(11) NOT NULL,
  `time` varchar(200) NOT NULL,
  `addtime` varchar(11) NOT NULL,
  `btime` int(11) DEFAULT NULL,
  `etime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,8,5,'[\"03:33\",\"04:33\"]','1516848758',1516636800,1517328000),(2,8,6,'[\"03:22\",\"23:33\"]','1516848758',1516636800,1519228800),(3,9,5,'[\"03:33\",\"04:33\"]','1516849323',1516636800,1517328000),(4,9,6,'[\"03:22\",\"23:33\",\"15:30\"]','1516849323',1516636800,1519228800),(5,10,5,'[\"03:33\",\"04:33\"]','1516849689',1516636800,1517328000),(6,10,6,'[\"03:22\",\"23:33\",\"15:30\"]','1516849689',1516636800,1519228800),(7,10,7,'[\"11:30\",\"16:30\",\"17:30\",\"22:30\"]','1516849689',1516636800,1519228800),(8,11,5,'[\"10:30\",\"14:30\",\"21:01\",\"22:01\"]','1516856283',1517414400,1517587200),(9,11,7,'[\"11:00\",\"12:00\",\"13:00\",\"18:00\"]','1516856283',1517414400,1517587200),(10,12,5,'[\"10:30\",\"14:30\",\"21:01\",\"22:01\"]','1516856673',1517414400,1517587200),(11,12,7,'[\"11:00\",\"12:00\",\"13:00\",\"18:00\"]','1516856673',1517414400,1517587200),(12,12,8,'[\"18:00\",\"19:00\",\"22:00\"]','1516856673',1517414400,1517587200);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (6,'silaschen','chensiwei1@outlook.com','18811174687','e10adc3949ba59abbe56e057f20f883e',1,1516702381),(7,'asd','ads','','922ec9531b1f94add983a8ce2ebdc97b',1,1516763715),(8,'jiajia','jiajia@135.com','18611174687','e10adc3949ba59abbe56e057f20f883e',2,1516773549),(9,'mary','mary123@mm.com','8897761212','e10adc3949ba59abbe56e057f20f883e',2,1516929861);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `score` float(2,1) DEFAULT '5.0',
  `cover` varchar(150) NOT NULL,
  `publishtime` int(11) NOT NULL,
  `director` varchar(20) NOT NULL,
  `price` decimal(8,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (9,'超人归来',5.0,'public/uploads/20180125/86edaffb4b31a7b1f3547a13f78bb951.jpg',1516550400,'徐佳佳',0.00),(10,'太空英雄',5.0,'public/uploads/20180125/8b7099b0a8becc3276c47abe1505190d.jpg',1517500800,'silaschen',200.00),(11,'INside out cat and jerry',5.0,'public/uploads/20180125/3b23c916968793a55c8a3bc0ac5a51a0.jpg',1517414400,'Jerry.li',100.00),(12,'my pet dog and my son',5.0,'public/uploads/20180125/83180820b82dd44554b2b13516724005.jpg',1517414400,'Jerry.li',200.00);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-26  3:28:01
