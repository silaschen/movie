-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: film
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `cover` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(20) NOT NULL,
  `addtime` int(11) NOT NULL,
  `frameurl` varchar(150) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (3,'超人归来，我们的记忆','public/uploads/20180129/36cbb38db59147062d46b4d460b6aa52.jpg','奥术大师大所多<span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span><span>奥术大师大所多</span>','admin',1517197234,'https://v.qq.com/iframe/player.html?vid=t0014zg9ie6&tiny=0&auto=0','sdfsadfsadfsadfasdf'),(4,'新中国新气象','public/uploads/20180129/eb5dc4a51da3d5659a84ee6906fbc61d.jpg','新<span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span><span>新中国新气象</span>中国新气象','admin',1517201655,'https://v.qq.com/iframe/player.html?vid=t0014zg9ie6&tiny=0&auto=0',''),(5,'超人归来新时代的神','public/uploads/20180129/638ad71a3658bd6a4046825bc2a43979.jpg','<span>这是一个超级好看的电影，我们都是新时代的领路人。超人就是我们大家最爱的英雄，它无数次化解了危机，拯救了一代人。让我们走进好莱坞片场，共同见证<span>这是一个超级好看的电影，我们都是新时代的领路人。超人就是我们大家最爱的英雄，它无数次化解了危机，拯救了一代人。让我们走进好莱坞片场，共同见证</span><span>这是一个超级好看的电影，我们都是新时代的领路人。超人就是我们大家最爱的英雄，它无数次化解了危机，拯救了一代人。让我们走进好莱坞片场，共同见证</span><span>这是一个超级好看的电影，我们都是新时代的领路人。超人就是我们大家最爱的英雄，它无数次化解了危机，拯救了一代人。让我们走进好莱坞片场，共同见证</span><span>这是一个超级好看的电影，我们都是新时代的领路人。超人就是我们大家最爱的英雄，它无数次化解了危机，拯救了一代人。让我们走进好莱坞片场，共同见证</span></span>','admin',1517204660,'https://v.qq.com/iframe/player.html?vid=t0014zg9ie6&tiny=0&auto=0','这是一个超级好看的电影，我们都是新时代的领路人。超人就是我们大家最爱的英雄，它无数次化解了危机，拯救了一代人。让我们走进好莱坞片场，共同见证'),(6,'我们的神，什么是爱情','public/uploads/20180129/448347155f8a53ab70cd0ab301900092.jpg','哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的','admin',1517209503,'','哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的哈哈哈哈，我懂你说的'),(7,'日出江花红胜火','public/uploads/20180130/9d3e7a4884bf8cca53003b59a4b7094a.jpg','日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。日出江花红胜火，何不忆江南。江南好，风景旧曾谙。','admin',1517282703,'','日出江花红胜火，何不忆江南。江南好，风景旧曾谙。');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_comment`
--

DROP TABLE IF EXISTS `blog_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blogid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_comment`
--

LOCK TABLES `blog_comment` WRITE;
/*!40000 ALTER TABLE `blog_comment` DISABLE KEYS */;
INSERT INTO `blog_comment` VALUES (1,7,6,'adasd',1517541109),(2,7,6,'挺好，继续',1517542391),(3,7,6,'挺好，继续',1517542549),(4,7,6,'你是傻子吗',1517543204),(5,7,6,'you are my love',1517560737),(6,6,6,'Your comment...',1519456931),(7,6,6,'sfsdf',1519456946),(8,6,6,'I love you',1519456958),(9,6,6,'I wanna fuck you!!!',1519460113),(10,7,6,'fuck!!!',1519460130),(11,7,6,'Your comment...',1522468055);
/*!40000 ALTER TABLE `blog_comment` ENABLE KEYS */;
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
INSERT INTO `cinemas` VALUES (5,'北京华纳国际影城','huana','e10adc3949ba59abbe56e057f20f883e',0.00,'西直门23号华纳国际'),(6,'北京成龙耀武影院','cl','e10adc3949ba59abbe56e057f20f883e',0.00,'天门们广场'),(7,'郑州农业路凤城国际','cl','e10adc3949ba59abbe56e057f20f883e',0.00,'农业路与南阳路交叉口'),(8,'郑州AABB凤城国际','cl','e10adc3949ba59abbe56e057f20f883e',0.00,'农业路与南阳路交叉口100米');
/*!40000 ALTER TABLE `cinemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `film_order`
--

DROP TABLE IF EXISTS `film_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `film_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `videoid` int(11) NOT NULL,
  `cinemaid` int(11) NOT NULL,
  `time` char(5) NOT NULL,
  `money` decimal(8,2) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ticketid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `orderid` varchar(32) NOT NULL,
  `payinfo` varchar(100) NOT NULL,
  `num` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `film_order`
--

LOCK TABLES `film_order` WRITE;
/*!40000 ALTER TABLE `film_order` DISABLE KEYS */;
INSERT INTO `film_order` VALUES (1,28,6,'19:00',100.00,1519625305,2,23,6,'fef631e06f339bc945c06036aecafa90','{\"banknum\":\"wqeqwe234\",\"bankname\":\"we\"}',0),(2,28,5,'12:00',100.00,1519625446,3,22,6,'7c24868b8c28269afd77906607af8d33','{\"banknum\":\"234444444\",\"bankname\":\"qw\"}',0),(3,28,5,'22:00',100.00,1519625512,3,22,6,'da24baab9269260784a18a028a5a1da0','{\"banknum\":\"55667788767656556\",\"bankname\":\"chensiwei\"}',0),(4,28,6,'15:00',100.00,1519709485,2,23,10,'13e1f2ca5ab2981e5b17be9b91d41535','{\"banknum\":\"123456789\",\"bankname\":\"jiajia\"}',0),(5,29,5,'12:00',50.00,1519710480,3,24,10,'e84701bcba01b68c0a6b5bccaa8357b1','{\"banknum\":\"34535435\",\"bankname\":\"34\"}',0),(6,15,5,'10:30',123.00,1522475069,2,15,6,'da62deebe93d0552bdf7e2691548d927','{\"banknum\":\"qwe\",\"bankname\":\"23423\"}',0),(7,15,5,'10:30',123.00,1522475146,2,15,6,'b37fbd306ee8fb24e038cda6fba7af35','{\"banknum\":\"qwe\",\"bankname\":\"23423\"}',0),(8,15,5,'10:30',123.00,1522475147,2,15,6,'b4e0a4edf7f90b2167a27b250748c193','{\"banknum\":\"qwe\",\"bankname\":\"23423\"}',0),(9,32,5,'18:00',240.00,1527085652,2,28,6,'23873d75217806b49587ce77e60c3b08','{\"banknum\":\"sdd3\",\"bankname\":\"34534\"}',2),(10,32,5,'18:00',3600.00,1527085839,2,28,6,'20af9028b6d0ddb9b7f095e332473086','{\"banknum\":\"33\",\"bankname\":\"342\"}',30);
/*!40000 ALTER TABLE `film_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blogid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,7,6,1521550966),(2,5,6,1521551007),(3,6,6,1521551010),(4,7,6,1521603880),(5,6,6,1521603883),(6,5,6,1521603885),(7,7,0,1521630424),(8,6,0,1521630425),(9,5,0,1521630426),(10,6,6,1522136665),(11,3,6,1522136668),(12,4,6,1522136669),(13,5,6,1522136670),(14,6,6,1522467974),(15,5,6,1522467976),(16,3,6,1522476309),(17,3,0,1522485636),(18,4,0,1522485639),(19,5,0,1522485643),(20,6,0,1522485646),(21,7,0,1522485650);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice`
--

LOCK TABLES `notice` WRITE;
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
INSERT INTO `notice` VALUES (1,'++影视正式上线，注册有奖','<p>\r\n	佳佳影视正式上线啦！\r\n</p>\r\n<p>\r\n	前100名注册用户，惊喜送不停！\r\n</p>\r\n<p>\r\n	别再犹豫，现在就加入我们！\r\n</p>\r\n<p>\r\n	平台内容为佳佳影视所有，不得任何形式的侵权！\r\n</p>\r\n<p>\r\n	若您发现我们的内容有违规行为，请您及时联系我们，我们深表感激。\r\n</p>\r\n<p>\r\n	佳佳影视成立于2018年，主要提供在线视频，在线购票，影视博客方面的内容。\r\n</p>\r\n<p>\r\n	若您发现我们的内容有违规行为，请您及时联系我们，我们深表感激。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>',1519715698),(2,'关于购买在线影票的说明','<p>\r\n	佳佳影视为了方便广大会员，推出了在线购票。\r\n</p>\r\n<p>\r\n	在线购票，请您仔细阅读相关政策。\r\n</p>\r\n<p>\r\n	不退票，不支持改签。请您务必认真确认后再付款。\r\n</p>',1519715803),(3,'积分政策即将推出，征集意见','阿斯蒂芬第三',1519715837),(4,'平台使用指南','沙发',1519715864),(5,'关于购票退款的声明','阿达',1519715912),(6,'关于焦作丹尼斯巨幕影城合作的公告','<p>\r\n	焦作丹尼斯巨幕影城现在已经成为我们的合作伙伴！\r\n</p>\r\n<p>\r\n	你可以。。。\r\n</p>',1519718604);
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;
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
  `stock` int(5) DEFAULT '30',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,8,5,'[\"03:33\",\"04:33\"]','1516848758',1516636800,1517328000,30),(2,8,6,'[\"03:22\",\"23:33\"]','1516848758',1516636800,1519228800,30),(3,9,5,'[\"03:33\",\"04:33\"]','1516849323',1516636800,1517328000,30),(4,9,6,'[\"03:22\",\"23:33\",\"15:30\"]','1516849323',1516636800,1519228800,30),(5,10,5,'[\"03:33\",\"04:33\"]','1516849689',1516636800,1517328000,30),(6,10,6,'[\"03:22\",\"23:33\",\"15:30\"]','1516849689',1516636800,1519228800,30),(7,10,7,'[\"11:30\",\"16:30\",\"17:30\",\"22:30\"]','1516849689',1516636800,1519228800,30),(8,11,5,'[\"10:30\",\"14:30\",\"21:01\",\"22:01\"]','1516856283',1517414400,1517587200,30),(9,11,7,'[\"11:00\",\"12:00\",\"13:00\",\"18:00\"]','1516856283',1517414400,1517587200,30),(10,12,5,'[\"10:30\",\"14:30\",\"21:01\",\"22:01\"]','1516856673',1517414400,1517587200,30),(11,12,7,'[\"11:00\",\"12:00\",\"13:00\",\"18:00\"]','1516856673',1517414400,1517587200,30),(12,12,8,'[\"18:00\",\"19:00\",\"22:00\"]','1516856673',1517414400,1517587200,30),(13,13,5,'[\"10:30\",\"13:30\",\"16:30\"]','1516949225',1516896000,1517328000,30),(14,14,5,'[\"10:30\",\"13:30\",\"16:30\"]','1516949575',1516896000,1517328000,30),(15,15,5,'[\"10:30\",\"13:30\",\"16:30\"]','1516949863',1516896000,1517328000,30),(16,16,5,'[\"10:30\",\"13:30\",\"16:30\"]','1516950004',1516896000,1517328000,30),(17,17,5,'[\"10:30\",\"13:30\",\"16:30\"]','1516951000',1516896000,1517328000,30),(18,17,6,'[\"15:00\",\"18:00\"]','1516951000',1516896000,1517414400,30),(19,18,5,'[\"10:30\",\"13:30\",\"16:30\"]','1516951558',1516896000,1517328000,30),(20,18,6,'[\"15:00\",\"18:00\"]','1516951558',1516896000,1517414400,30),(21,19,5,'[\"21:01\",\"17:01\",\"21:01\"]','1517554855',1517500800,1518105600,30),(22,28,5,'[\"10:00\",\"12:00\",\"16:00\",\"22:00\"]','1519611557',1519660800,1519747200,30),(23,28,6,'[\"13:00\",\"15:00\",\"19:00\",\"21:00\"]','1519611557',1519660800,1519747200,30),(24,29,5,'[\"12:00\",\"15:00\",\"19:00\",\"22:00\"]','1519710451',1519660800,1520006400,30),(25,30,5,'[\"12:00\",\"15:00\",\"19:00\",\"22:00\"]','1519710555',1519660800,1520006400,30),(26,30,6,'[\"10:00\",\"15:00\",\"20:00\"]','1519710555',1519660800,1520006400,30),(27,31,5,'[\"00:00\",\"01:00\"]','1522487959',1522425600,1522512000,30),(28,32,5,'[\"\",\"\",\"10:00\",\"13:00\",\"18:00\"]','1527083290',1527004800,1527696000,30),(29,33,5,'[\"10:00\",\"20:00\"]','1527086418',1527091200,1527696000,50);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (6,'silaschen','chensiwei1@outlook.com','18811174687','e10adc3949ba59abbe56e057f20f883e',1,1516702381),(7,'asd','ads','','922ec9531b1f94add983a8ce2ebdc97b',1,1516763715),(8,'jiajia','jiajia@135.com','18611174687','e10adc3949ba59abbe56e057f20f883e',2,1516773549),(9,'mary','mary123@mm.com','8897761212','e10adc3949ba59abbe56e057f20f883e',2,1516929861),(10,'jiajia','jiajia@163.com','18811175676','e10adc3949ba59abbe56e057f20f883e',2,1519709443),(11,'abc','12345@123.com','18811174687','e10adc3949ba59abbe56e057f20f883e',2,1522484752),(12,'werwerwer','jiajiaweewrwer','','e10adc3949ba59abbe56e057f20f883e',1,1522485129),(13,'silas','chensiwei1@outlook.com','18811174687','e10adc3949ba59abbe56e057f20f883e',1,1527082990),(14,'hhh','123@123.com','18811174687','e10adc3949ba59abbe56e057f20f883e',1,1527171130);
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
  `cate` tinyint(1) DEFAULT '1',
  `address` varchar(150) DEFAULT NULL,
  `view` int(8) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (9,'超人归来',5.0,'public/uploads/20180125/86edaffb4b31a7b1f3547a13f78bb951.jpg',1516550400,'徐佳佳',0.00,1,NULL,7),(10,'太空英雄',5.0,'public/uploads/20180125/8b7099b0a8becc3276c47abe1505190d.jpg',1517500800,'silaschen',200.00,1,NULL,7),(11,'INside out cat and jerry',5.0,'public/uploads/20180125/3b23c916968793a55c8a3bc0ac5a51a0.jpg',1517414400,'Jerry.li',100.00,1,NULL,8),(12,'my pet dog and my son',5.0,'public/uploads/20180125/83180820b82dd44554b2b13516724005.jpg',1517414400,'Jerry.li',200.00,1,NULL,7),(13,'新大陆之争',5.0,'public/uploads/20180126/5d44f756eae117b6dffe991d1d81a76b.jpg',1516896000,'徐佳佳',123.00,1,NULL,2),(14,'年轻的爱恋',5.0,'public/uploads/20180126/39ef6290649993c25ad98601caf50e44.jpg',1517068800,'徐佳佳',123.00,1,NULL,4),(15,'大鱼的孩子',5.0,'public/uploads/20180126/482fb0e9a948caf8248e6547bf493023.jpg',1516982400,'徐佳佳',123.00,1,NULL,8),(16,'快乐家族',5.0,'public/uploads/20180126/17ec17fa293292b222cc88c501067690.jpg',1516896000,'徐佳佳',200.00,1,NULL,5),(17,'FBI侦查专家',5.0,'public/uploads/20180126/ebdd3d0c03925a2e67570587229a550d.jpg',1516896000,'徐佳佳',200.00,1,NULL,5),(18,'VALHA ARISING',5.0,'public/uploads/20180126/c4d5f6e40c2ac106a25fd2d1a1c52c05.jpg',1517068800,'徐佳佳',200.00,1,NULL,8),(19,'外星来的小哥哥',5.0,'public/uploads/20180202/cf452dad2cfc5d3228bfdce10ae9a6d5.jpg',1517500800,'徐佳佳',100.00,1,NULL,5),(20,'Love me like you do',5.0,'public/uploads/20180202/cfdd83782389ddd7664921e1a6f98e24.jpg',1519315200,'xujiaja',0.00,2,'http://p3igpphkm.bkt.clouddn.com/Ellie%20Goulding%20-%20Love%20Me%20Like%20You%20Do%20%28Vevo%20Presents-%20Live%20in%20London%29%20%281%29.mp4',7),(21,'测试数据，小绵羊',5.0,'public/uploads/20180202/efbc8a126ab671f02c5bc0f5cb46c628.jpeg',1517932800,'佳佳四伟',0.00,2,'http://p3igpphkm.bkt.clouddn.com/Ellie%20Goulding%20-%20Love%20Me%20Like%20You%20Do%20%28Vevo%20Presents-%20Live%20in%20London%29%20%281%29.mp4',5),(22,'测试数据，日本',5.0,'public/uploads/20180202/8c26cf0f960792a0b412442ceb5b951e.jpg',1517932800,'佳佳四伟',0.00,2,'http://p3igpphkm.bkt.clouddn.com/Ellie%20Goulding%20-%20Love%20Me%20Like%20You%20Do%20%28Vevo%20Presents-%20Live%20in%20London%29%20%281%29.mp4',9),(23,'test movie',5.0,'public/uploads/20180202/8b7e002982af8f783f7ae8c4d5facd2d.jpeg',1518710400,'asdsaf',322.00,1,NULL,3),(24,'test movie',5.0,'public/uploads/20180202/8b7e002982af8f783f7ae8c4d5facd2d.jpeg',1518710400,'asdsaf',322.00,1,NULL,0),(25,'蜘蛛侠，强势袭来',5.0,'public/uploads/20180226/e29542adbb4c86cf107ceec7d69d9320.jpg',1519660800,'hekl siwei',0.00,2,'http://p3igpphkm.bkt.clouddn.com/Ellie%20Goulding%20-%20Love%20Me%20Like%20You%20Do%20%28Vevo%20Presents-%20Live%20in%20London%29%20%281%29.mp4',0),(26,'唐人街探案预告片',5.0,'public/uploads/20180226/225ec8cd3500683054c88d90ee1eedd1.jpg',1519660800,'hekl siwei',0.00,2,'http://p3igpphkm.bkt.clouddn.com/Ellie%20Goulding%20-%20Love%20Me%20Like%20You%20Do%20%28Vevo%20Presents-%20Live%20in%20London%29%20%281%29.mp4',2),(27,'捉妖记，全网独播',5.0,'public/uploads/20180226/66feb1c162265c240c68bdef005d83d6.jpg',1519660800,'hekl siwei',0.00,2,'http://p3igpphkm.bkt.clouddn.com/Ellie%20Goulding%20-%20Love%20Me%20Like%20You%20Do%20%28Vevo%20Presents-%20Live%20in%20London%29%20%281%29.mp4',7),(28,'西游记之女儿国',5.0,'public/uploads/20180226/c1c5e00efbd39c7f7b58c6ccf09e033f.jpg',1519660800,'许诚毅',100.00,1,NULL,9),(29,'祖宗十九代',5.0,'public/uploads/20180227/5103f23dac7a59ca216e22828e7582ca.jpg',1519660800,'郭德纲',50.00,1,NULL,3),(30,'保罗·维尔奇',5.0,'public/uploads/20180227/33eda068f4a1d949ce74929648118e09.jpg',1519660800,'保罗·维尔奇：',50.00,1,NULL,0),(31,'qweqwe',5.0,'public/uploads/20180331/9289f48db2ebcd1454737de9e452ac5d.jpg',1522425600,'qwerqwe',0.00,1,NULL,0),(32,'hahha',5.0,'public/uploads/20180523/9435a4fb2d0410495b57e4187ff2c522.jpg',1527004800,'chenou',120.00,1,NULL,5),(33,'sdw',5.0,'public/uploads/20180523/b9013135b93dac10031062b019710707.jpg',1527091200,'as',33.00,1,NULL,9);
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

-- Dump completed on 2018-06-03  9:28:53
