-- MySQL dump 10.13  Distrib 5.6.15, for Win64 (x86_64)
--
-- Host: localhost    Database: study
-- ------------------------------------------------------
-- Server version	5.6.15

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
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `blog_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `author` varchar(20) NOT NULL DEFAULT '',
  `title` varchar(100) NOT NULL,
  `content` varchar(200) DEFAULT NULL,
  `createtime` date DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `kind` int(5) DEFAULT NULL,
  `is_delete` int(11) DEFAULT '0',
  PRIMARY KEY (`blog_id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`uid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (5,8,'','www','wwww','2016-07-13',1,NULL,1),(6,8,'','www','wwww','2016-07-13',0,NULL,1),(7,8,'','yang','yangyangddddddddddddddddddddddddddddddddd','2016-07-13',0,NULL,1),(8,8,'','2222','22222','2016-07-13',0,NULL,1),(9,8,'44444','ccccccccc','cccccccccc','2016-07-13',0,NULL,1),(10,8,'44444','1','1','2016-07-13',1,NULL,1),(11,6,'vvvvv','eeeee','eeeee','2016-07-13',5,NULL,0),(14,8,'44444','11','11111','2016-07-13',1,NULL,1),(15,8,'44444','hello','hi','2016-07-13',33,NULL,1),(25,10,'33333','111111111111','111111111111111111111','2016-07-13',0,NULL,1),(26,10,'33333','22222222222222222222','22222222222222222','2016-07-13',7,NULL,1),(27,9,'11111','22222222222222222222','22222222222222222','2016-07-14',5,NULL,1),(28,9,'11111','hello','hi','2016-07-14',7,NULL,1),(29,9,'11111','hello','hi','2016-07-14',0,NULL,1),(30,9,'11111','22222222222222222222','22222222222222222','2016-07-14',1,NULL,1),(31,9,'11111','22222222222222222222','22222222222222222','2016-07-14',1,NULL,1),(32,9,'11111','22222222222222222222','22222222222222222','2016-07-14',1,NULL,1),(33,9,'11111','22222222222222222222','22222222222222222','2016-07-14',4,NULL,1),(34,9,'11111','yag','yyyy','2016-07-16',0,NULL,1),(35,9,'11111','羊羊羊','巴拉巴拉巴','2016-07-16',2,NULL,1),(36,9,'11111','杨向杰','红红火火恍恍惚惚','2016-07-16',6,NULL,0),(37,6,'vvvvv','呜呜呜呜呜呜呜呜呜呜呜呜','对对对','2016-07-16',2,0,0),(38,6,'vvvvv','羊羊羊','哈哈哈','2016-07-16',1,2,1),(39,6,'vvvvv','羊羊羊','哈哈哈','2016-07-16',1,2,1),(40,6,'vvvvv','lol','kengknekengdadadadacafeweag','2016-07-16',0,5,1),(41,11,'55555','yangxiangjie','yangxxxxxx','2016-07-16',6,1,1),(42,11,'55555','www','wwwwwwww','2016-07-16',1,1,1),(43,10,'33333','hahaahaahahah','哈啊哈','2016-07-16',1,1,1),(44,10,'33333','www','wwwwwwww','2016-07-16',2,1,1),(45,6,'vvvvv','我的老家','就是这个屯儿','2016-07-16',2,1,1),(46,11,'55555','啦啦啦','啦啦啦','2016-07-17',0,1,1),(47,11,'55555','www','wwwwwwww','2016-07-17',0,1,1),(48,10,'33333','everyday','different','2016-07-18',6,4,0),(49,10,'33333','我的老家','就是这个屯儿','2016-07-18',83,1,0),(50,10,'33333','dadad','dadadadada','2016-07-18',0,1,1),(51,10,'33333','hello','dadad','2016-07-18',1,1,1),(54,6,'vvvvv','我的老家','就是这个屯儿','2016-07-18',2,1,1),(55,6,'vvvvv','下午好','啦啦啦','2016-07-20',3,5,1),(56,6,'vvvvv','下午好','啦啦啦','2016-07-20',3,5,1),(57,6,'vvvvv','hhh','wwwww','2016-07-20',2,1,1),(58,6,'vvvvv','hhh','wwwww','2016-07-20',0,1,1),(59,11,'55555','dadad','dadad','2016-07-20',0,1,1),(60,11,'55555','撸代码','撸啊撸','2016-07-20',1,1,1),(61,11,'55555','下午好','啦啦啦啦','2016-07-20',0,1,1),(62,15,'杨向杰','对对对','叼叼叼','2016-07-20',2,1,1),(63,6,'vvvvv','dadadadd','dasdadadadad','2016-07-21',3,1,1),(64,6,'vvvvv','dadadadd','dasdadadadad','2016-07-21',0,1,1);
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collect`
--

DROP TABLE IF EXISTS `collect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collect` (
  `collect_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `collect_user_id` int(11) DEFAULT NULL,
  `collect_author` varchar(20) NOT NULL DEFAULT '',
  `collect_title` varchar(100) NOT NULL,
  `collect_content` varchar(200) DEFAULT NULL,
  `createtime` date DEFAULT NULL,
  PRIMARY KEY (`collect_id`),
  UNIQUE KEY `collect_user_id` (`collect_user_id`,`collect_author`),
  CONSTRAINT `collect_ibfk_1` FOREIGN KEY (`collect_user_id`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collect`
--

LOCK TABLES `collect` WRITE;
/*!40000 ALTER TABLE `collect` DISABLE KEYS */;
INSERT INTO `collect` VALUES (1,9,'11111','hello','hi','2016-07-14'),(5,9,'33333','22222222222222222222','22222222222222222','2016-07-14'),(6,10,'55555','www','wwwwwwww','2016-07-16'),(7,10,'vvvvv','羊羊羊','哈哈哈','2016-07-16'),(8,10,'33333','我的老家','就是这个屯儿','2016-07-18'),(10,6,'33333','我的老家','就是这个屯儿','2016-07-18'),(11,6,'vvvvv','下午好','啦啦啦','2016-07-20'),(13,11,'55555','下午好','啦啦啦啦','2016-07-20'),(15,11,'33333','我的老家','就是这个屯儿','2016-07-20'),(24,6,'11111','杨向杰','红红火火恍恍惚惚','2016-07-21'),(27,15,'vvvvv','dadadadd','dasdadadadad','2016-07-21');
/*!40000 ALTER TABLE `collect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concern`
--

DROP TABLE IF EXISTS `concern`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concern` (
  `concern_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `home_id` int(11) DEFAULT NULL,
  `whom_id` int(11) DEFAULT NULL,
  `whom_name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`concern_id`),
  UNIQUE KEY `home_id` (`home_id`,`whom_id`),
  KEY `whom_id` (`whom_id`),
  CONSTRAINT `concern_ibfk_1` FOREIGN KEY (`home_id`) REFERENCES `user` (`uid`),
  CONSTRAINT `concern_ibfk_2` FOREIGN KEY (`whom_id`) REFERENCES `blog` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concern`
--

LOCK TABLES `concern` WRITE;
/*!40000 ALTER TABLE `concern` DISABLE KEYS */;
INSERT INTO `concern` VALUES (28,9,9,'11111'),(33,9,8,'44444'),(35,11,6,'vvvvv'),(37,10,10,'33333'),(38,6,6,'vvvvv'),(40,6,10,'33333'),(43,10,11,'55555'),(47,11,10,'33333');
/*!40000 ALTER TABLE `concern` ENABLE KEYS */;
UNLOCK TABLES;



--
-- Table structure for table `say`
--

DROP TABLE IF EXISTS `say`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `say` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(5) DEFAULT NULL,
  `say_id` int(5) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `content` varchar(200) NOT NULL,
  `addtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `say`
--

LOCK TABLES `say` WRITE;
/*!40000 ALTER TABLE `say` DISABLE KEYS */;
INSERT INTO `say` VALUES (1,NULL,NULL,NULL,'dadadad',1468847211),(2,NULL,NULL,NULL,'dadad',1468847270),(3,NULL,NULL,NULL,'cdd',1468847513),(4,NULL,NULL,NULL,'dddddd',1468847553),(5,NULL,NULL,NULL,'ddddddddddddd',1468847602),(6,NULL,NULL,NULL,'ddd',1468847708),(7,NULL,NULL,NULL,'hhh',1468847906),(8,NULL,NULL,NULL,'dddd',1468848061),(9,NULL,NULL,NULL,'sss',1468849749),(10,NULL,NULL,NULL,'sss',1468849754),(11,NULL,NULL,NULL,'ddd',1468849786),(12,NULL,NULL,NULL,'hhh',1468849923),(13,NULL,NULL,NULL,'sss',1468849969),(14,NULL,NULL,'','sss',1468850332),(15,NULL,NULL,'','hhh',1468850454),(16,NULL,NULL,'55555','ddd',1468850728),(17,NULL,NULL,'55555','dddddddd',1468850808),(18,NULL,NULL,'55555','hhh',1468850848),(19,NULL,NULL,'','qqqqq',1468850867),(20,NULL,NULL,'','dddd',1468850890),(21,NULL,NULL,'55555','qqq',1468850931),(22,NULL,NULL,'55555','ddddd',1468851016),(23,NULL,NULL,'55555','wwww',1468851043),(24,NULL,NULL,'55555','ggg',1468851161),(25,NULL,NULL,'55555','dadadadasd',1468851907),(26,NULL,NULL,'55555','dddddddddddddddddd',1468852127),(27,49,NULL,'55555','yangyangyang',1468852635),(28,48,NULL,'55555','xxxxxx',1468852674),(29,49,NULL,'55555','hhhh',1468852872),(30,49,NULL,'55555','ddd',1468852901),(31,49,NULL,'vvvvv','dddd',1468852956),(32,56,NULL,'vvvvv','对对对',1468999429),(33,49,NULL,'vvvvv','哈哈哈',1469004075),(34,57,NULL,'vvvvv','dadada',1469004957),(35,49,NULL,'vvvvv','张景卓是个傻逼',1469005848),(36,49,NULL,'vvvvv','说的很对',1469005855),(37,60,NULL,'55555','王瑞是个逗比',1469007997),(38,60,NULL,'55555','同意',1469008001),(39,60,NULL,'55555','非常同意',1469008006),(40,49,NULL,'55555','aaaa',1469008213),(41,49,NULL,'55555','dadadadadad',1469012372),(42,48,NULL,'杨向杰','刘畅是个逗比',1469023270),(43,48,NULL,'杨向杰','同意',1469023276),(44,48,NULL,'杨向杰','非常同意',1469023283),(45,48,NULL,'杨向杰','不能再同意了',1469023291),(46,62,NULL,'杨向杰','认识一个学妹好开心',1469085261),(47,62,NULL,'杨向杰','楼上说的很对',1469085275),(48,62,NULL,'杨向杰','说的非常对',1469085282),(49,49,6,'vvvvv','ddd',1469196771),(50,49,6,'vvvvv','dadad',1469205858),(51,49,6,'vvvvv','ddd',1469256968),(52,49,6,'vvvvv','ddd',1469256997),(53,49,6,'vvvvv','ddd',1469257400);
/*!40000 ALTER TABLE `say` ENABLE KEYS */;
UNLOCK TABLES;



DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `regdate` int(10) unsigned NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `identifier` varchar(32) DEFAULT NULL,
  `timeout` int(10) unsigned DEFAULT NULL,
  `salt` varchar(32) DEFAULT NULL,
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'222222','96e79218965eb72c92a549dd5a330112','976026187@qq.com',1468379080,'2999da66a0d55d654a492ca3b5b242fc','adeabd6c084bb221144786fc077bf5cc',1468983880,'cELxRB7iMSUBQt3wrKEzp653OwEIe0yN',1),(6,'vvvvv','96e79218965eb72c92a549dd5a330112','976026187@qq.com',1468387118,'479776e8aef4d9df1faab3040aaf21ac','cf47f7b24040de5f9143d74718d66372',1468991918,'D0gnVIgItuEpnjmk7PEY5BbIeSJFvFon',0),(8,'44444','96e79218965eb72c92a549dd5a330112','976026187@qq.com',1468394272,'b39d63032eb99b30d064fa085a984f22','32d2acb0b464c0ba8956e13295936bc0',1468999072,'WqkIVQwCCQZYhdiYq9zQKuayo8YCBWzo',1),(9,'11111','96e79218965eb72c92a549dd5a330112','976026187@qq.com',1468397998,'9797f6229d386b18e4626a6e4cb8c629','2f0d9c2d6158d3026753c362a5dc9b7f',1469002798,'AjBa1od36V6kxEOci0yhhS7sWfqaRwfS',1),(10,'33333','96e79218965eb72c92a549dd5a330112','976026187@qq.com',1468408011,'ada14716ea8ac0b08bea884cd855cc59','c105c1e5b3215d869dba37468c67941e',1469012811,'W94evRB56rKefmqGb7DBlAPGHwVYdIPI',1),(11,'55555','96e79218965eb72c92a549dd5a330112','976026187@qq.com',1468670040,'1dd37a784c0bb32366378592805a389a','5c292f0ce912c95fa2eb47682b01338e',1469274840,'hiES6dPX2eEWdyWGWaMJvDVOuugOgpkQ',1),(13,'66666','96e79218965eb72c92a549dd5a330112','976026187@qq.com',1469016702,'f21d0218235c40d369d9424f569cb3c0','bd4edab532da0a37adefec042f1c4881',1469621502,'A77HAG1t7RWa1SsSmhQW1rJ6cGuANZ93',1),(14,'77777','96e79218965eb72c92a549dd5a330112','976026187@qq.com',1469016735,'c4d93b0af35d973cfa75019bd05056f7','1f94640ac83cbd2fb2cf3bac6e05e54b',1469621535,'dUxH2LMwTBXZ6NUHfMVpFTPh0uLV7ZZf',1),(15,'杨向杰','96e79218965eb72c92a549dd5a330112','976026187@qq.com',1469016760,'e87fd180cb591256e3e82d9544ede880','5ad3fa838b3bfe59ccdc84f8b4aff30a',1469621560,'4PIFWPg7HM51UB03UlfwBDguUsG9m6NF',1);
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

-- Dump completed on 2016-07-23 15:38:48
