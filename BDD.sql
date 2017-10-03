-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `art_article`
--
CREATE DATABASE mydb;
USE mydb;

DROP TABLE IF EXISTS `art_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `art_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_titre` varchar(45) DEFAULT NULL,
  `art_auteur` varchar(45) DEFAULT NULL,
  `art_genre` varchar(45) DEFAULT NULL,
  `art_date` datetime DEFAULT NULL,
  `art_content` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art_article`
--

LOCK TABLES `art_article` WRITE;
/*!40000 ALTER TABLE `art_article` DISABLE KEYS */;
INSERT INTO `art_article` VALUES (8,'titre1','auteur de l\'article1','genre de l\'article1','2017-09-22 21:22:48','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et tempor ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam at imperdiet dui. Quisque fringilla maximus risus, sit amet aliquet ex venenatis non. Pellentesque vel lectus magna. Ut lectus quam, dapibus vitae eros quis, porta elementum velit. Aenean congue blandit urna ut sodales. Nam velit nisi, accumsan id maximus efficitur, consectetur nec elit. Mauris vitae tincidunt ex. Morbi condimentum eros vel tortor tincidunt rutrum. In elit odio, posuere vitae vestibulum a, vulputate id ante. Sed ut neque ut dolor euismod vestibulum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ut erat quis tellus eleifend semper. Nam molestie sodales nullam.'),(9,'titre2','auteur de l\'article2','genre de l\'article2','2017-09-22 21:23:02','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et tempor ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam at imperdiet dui. Quisque fringilla maximus risus, sit amet aliquet ex venenatis non. Pellentesque vel lectus magna. Ut lectus quam, dapibus vitae eros quis, porta elementum velit. Aenean congue blandit urna ut sodales. Nam velit nisi, accumsan id maximus efficitur, consectetur nec elit. Mauris vitae tincidunt ex. Morbi condimentum eros vel tortor tincidunt rutrum. In elit odio, posuere vitae vestibulum a, vulputate id ante. Sed ut neque ut dolor euismod vestibulum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ut erat quis tellus eleifend semper. Nam molestie sodales nullam.'),(10,'titre3','auteur de l\'article3','genre de l\'article3','2017-09-22 21:23:10','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et tempor ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam at imperdiet dui. Quisque fringilla maximus risus, sit amet aliquet ex venenatis non. Pellentesque vel lectus magna. Ut lectus quam, dapibus vitae eros quis, porta elementum velit. Aenean congue blandit urna ut sodales. Nam velit nisi, accumsan id maximus efficitur, consectetur nec elit. Mauris vitae tincidunt ex. Morbi condimentum eros vel tortor tincidunt rutrum. In elit odio, posuere vitae vestibulum a, vulputate id ante. Sed ut neque ut dolor euismod vestibulum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ut erat quis tellus eleifend semper. Nam molestie sodales nullam.'),(11,'titre4','auteur de l\'article4','genre de l\'article4','2017-09-22 21:23:18','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et tempor ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam at imperdiet dui. Quisque fringilla maximus risus, sit amet aliquet ex venenatis non. Pellentesque vel lectus magna. Ut lectus quam, dapibus vitae eros quis, porta elementum velit. Aenean congue blandit urna ut sodales. Nam velit nisi, accumsan id maximus efficitur, consectetur nec elit. Mauris vitae tincidunt ex. Morbi condimentum eros vel tortor tincidunt rutrum. In elit odio, posuere vitae vestibulum a, vulputate id ante. Sed ut neque ut dolor euismod vestibulum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ut erat quis tellus eleifend semper. Nam molestie sodales nullam.'),(12,'titre5','auteur de l\'article5','genre de l\'article5','2017-09-22 21:23:26','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et tempor ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam at imperdiet dui. Quisque fringilla maximus risus, sit amet aliquet ex venenatis non. Pellentesque vel lectus magna. Ut lectus quam, dapibus vitae eros quis, porta elementum velit. Aenean congue blandit urna ut sodales. Nam velit nisi, accumsan id maximus efficitur, consectetur nec elit. Mauris vitae tincidunt ex. Morbi condimentum eros vel tortor tincidunt rutrum. In elit odio, posuere vitae vestibulum a, vulputate id ante. Sed ut neque ut dolor euismod vestibulum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ut erat quis tellus eleifend semper. Nam molestie sodales nullam.'),(13,'titre6','auteur de l\'article6','genre de l\'article6','2017-09-22 21:33:04','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et tempor ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam at imperdiet dui. Quisque fringilla maximus risus, sit amet aliquet ex venenatis non. Pellentesque vel lectus magna. Ut lectus quam, dapibus vitae eros quis, porta elementum velit. Aenean congue blandit urna ut sodales. Nam velit nisi, accumsan id maximus efficitur, consectetur nec elit. Mauris vitae tincidunt ex. Morbi condimentum eros vel tortor tincidunt rutrum. In elit odio, posuere vitae vestibulum a, vulputate id ante. Sed ut neque ut dolor euismod vestibulum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ut erat quis tellus eleifend semper. Nam molestie sodales nullam.'),(14,'titre7','auteur de l\'article7','genre de l\'article7','2017-09-22 21:33:12','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et tempor ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam at imperdiet dui. Quisque fringilla maximus risus, sit amet aliquet ex venenatis non. Pellentesque vel lectus magna. Ut lectus quam, dapibus vitae eros quis, porta elementum velit. Aenean congue blandit urna ut sodales. Nam velit nisi, accumsan id maximus efficitur, consectetur nec elit. Mauris vitae tincidunt ex. Morbi condimentum eros vel tortor tincidunt rutrum. In elit odio, posuere vitae vestibulum a, vulputate id ante. Sed ut neque ut dolor euismod vestibulum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ut erat quis tellus eleifend semper. Nam molestie sodales nullam.'),(15,'titre8','auteur de l\'article8','genre de l\'article8','2017-09-22 21:33:20','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et tempor ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam at imperdiet dui. Quisque fringilla maximus risus, sit amet aliquet ex venenatis non. Pellentesque vel lectus magna. Ut lectus quam, dapibus vitae eros quis, porta elementum velit. Aenean congue blandit urna ut sodales. Nam velit nisi, accumsan id maximus efficitur, consectetur nec elit. Mauris vitae tincidunt ex. Morbi condimentum eros vel tortor tincidunt rutrum. In elit odio, posuere vitae vestibulum a, vulputate id ante. Sed ut neque ut dolor euismod vestibulum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ut erat quis tellus eleifend semper. Nam molestie sodales nullam.'),(16,'titre9','auteur de l\'article9','genre de l\'article9','2017-09-23 11:20:07','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam et tempor ex. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam at imperdiet dui. Quisque fringilla maximus risus, sit amet aliquet ex venenatis non. Pellentesque vel lectus magna. Ut lectus quam, dapibus vitae eros quis, porta elementum velit. Aenean congue blandit urna ut sodales. Nam velit nisi, accumsan id maximus efficitur, consectetur nec elit. Mauris vitae tincidunt ex. Morbi condimentum eros vel tortor tincidunt rutrum. In elit odio, posuere vitae vestibulum a, vulputate id ante. Sed ut neque ut dolor euismod vestibulum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ut erat quis tellus eleifend semper. Nam molestie sodales nullam.');
/*!40000 ALTER TABLE `art_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_commentaires`
--

DROP TABLE IF EXISTS `com_commentaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_commentaires` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_pseudo` varchar(45) DEFAULT NULL,
  `com_date` datetime DEFAULT NULL,
  `com_content` varchar(255) DEFAULT NULL,
  `art_article_art_id` int(11) NOT NULL,
  PRIMARY KEY (`com_id`),
  KEY `fk_com_commentaires_art_article_idx` (`art_article_art_id`),
  CONSTRAINT `fk_com_commentaires_art_article` FOREIGN KEY (`art_article_art_id`) REFERENCES `art_article` (`art_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_commentaires`
--

LOCK TABLES `com_commentaires` WRITE;
/*!40000 ALTER TABLE `com_commentaires` DISABLE KEYS */;
INSERT INTO `com_commentaires` VALUES (6,'pseudo','2017-09-23 09:31:35','contentcom',8),(7,'pseudo','2017-09-23 09:31:38','contentcom',8),(8,'pseudo','2017-09-23 09:31:40','contentcom',8),(9,'pseudo','2017-09-23 09:31:41','contentcom',8),(10,'pseudo','2017-09-23 10:17:57','contentcom',8),(11,'pseudo','2017-09-23 10:17:59','contentcom',8),(14,'mystiich','2017-09-23 10:39:37','contentcom',15),(15,'mystiich','2017-09-23 10:39:38','contentcom',15),(16,'mystiich','2017-09-23 12:00:13','contentcom',15),(19,'mystiich','2017-09-23 12:21:32','contentcom',8);
/*!40000 ALTER TABLE `com_commentaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uti_utilisateur`
--

DROP TABLE IF EXISTS `uti_utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uti_utilisateur` (
  `uti_id` int(11) NOT NULL AUTO_INCREMENT,
  `uti_pseudo` varchar(45) DEFAULT NULL,
  `uti_email` varchar(255) DEFAULT NULL,
  `uti_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`uti_id`),
  UNIQUE KEY `uti_id_UNIQUE` (`uti_id`),
  UNIQUE KEY `uti_email_UNIQUE` (`uti_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uti_utilisateur`
--

LOCK TABLES `uti_utilisateur` WRITE;
/*!40000 ALTER TABLE `uti_utilisateur` DISABLE KEYS */;
INSERT INTO `uti_utilisateur` VALUES (1,'admin','admin@gmail.com','admin');
/*!40000 ALTER TABLE `uti_utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-24 12:05:03
