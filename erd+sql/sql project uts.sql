CREATE DATABASE  IF NOT EXISTS `project_uts_fsp` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `project_uts_fsp`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: project_uts_fsp
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cerita`
--

DROP TABLE IF EXISTS `cerita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cerita` (
  `idcerita` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) DEFAULT NULL,
  `iduser_pembuat_awal` varchar(40) NOT NULL,
  PRIMARY KEY (`idcerita`),
  KEY `fk_cerita_users_idx` (`iduser_pembuat_awal`),
  CONSTRAINT `fk_cerita_users` FOREIGN KEY (`iduser_pembuat_awal`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cerita`
--

LOCK TABLES `cerita` WRITE;
/*!40000 ALTER TABLE `cerita` DISABLE KEYS */;
INSERT INTO `cerita` VALUES (7,'Cerita 1','160421058'),(8,'Cerita 2','160421058');
/*!40000 ALTER TABLE `cerita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paragraf`
--

DROP TABLE IF EXISTS `paragraf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paragraf` (
  `idparagraf` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` varchar(40) NOT NULL,
  `idcerita` int(11) NOT NULL,
  `isi_paragraf` varchar(100) DEFAULT NULL,
  `tanggal_buat` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idparagraf`),
  KEY `fk_paragraf_users1_idx` (`iduser`),
  KEY `fk_paragraf_cerita1_idx` (`idcerita`),
  CONSTRAINT `fk_paragraf_cerita1` FOREIGN KEY (`idcerita`) REFERENCES `cerita` (`idcerita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_paragraf_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paragraf`
--

LOCK TABLES `paragraf` WRITE;
/*!40000 ALTER TABLE `paragraf` DISABLE KEYS */;
INSERT INTO `paragraf` VALUES (13,'160421058',7,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sagittis tellus vitae massa sollicitudi','2023-10-06 10:48:25'),(14,'160421058',7,'Mauris vitae orci a velit ultricies porttitor vel id quam','2023-10-06 10:48:53'),(15,'160421058',7,'Donec pellentesque a lectus vel interdum. Integer neque orci, mattis id lorem non','2023-10-06 10:51:21'),(16,'160421058',7,'Donec in nunc in velit rutrum scelerisque vel nec ipsum.','2023-10-06 10:56:30'),(17,'160421058',7,'Donec in nunc in velit rutrum scelerisque vel nec ipsum.','2023-10-06 10:57:47'),(18,'160421058',8,'Sed finibus auctor velit, vel laoreet velit aliquam nec. Aliquam scelerisque tortor ut','2023-10-06 11:39:53'),(19,'160421058',8,'Pellentesque condimentum, lacus id scelerisque laoreet, nisl arcu tristique nulla,','2023-10-06 11:41:39'),(20,'160421058',7,'vel lacinia lorem velit non dolor. Sed in ipsum eget eros scelerisque finibus','2023-10-06 11:51:03'),(21,'160421058',7,'vel lacinia lorem velit non dolor. Sed in ipsum eget eros scelerisque finibus','2023-10-06 11:52:22'),(22,'160421058',7,'Morbi non purus eget arcu consectetur rutrum','2023-10-06 11:52:59'),(23,'160421058',8,'Morbi non purus eget arcu consectetur rutrum','2023-10-06 11:53:11'),(24,'160421058',8,'Morbi non purus eget arcu consectetur rutrum.','2023-10-06 11:56:23');
/*!40000 ALTER TABLE `paragraf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `iduser` varchar(40) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `salt` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('160421001','Steven','76ac3dfe1c56494f249567210ed1bb62','HkPvSrdntI'),('160421058','Bayu','aff83a5da6a2df9acf9a4a1a80d3fd24','kvnHStPrId'),('160421072','Vincent','f2f736fcb1d3f4602b7d7ebd76837544','rnPtvHISkd');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-06 19:00:29
