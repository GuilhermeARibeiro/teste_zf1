CREATE DATABASE  IF NOT EXISTS `teste_admissao` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `teste_admissao`;
-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: teste_admissao
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_produto` (
  `pk_produto` int(11) NOT NULL AUTO_INCREMENT,
  `fk_categoria` int(11) NOT NULL,
  `desc_produto` varchar(45) NOT NULL,
  `peso_produto` float(7,3) DEFAULT NULL,
  `status_produto` int(11) NOT NULL,
  `promocao_produto` int(11) NOT NULL,
  `porcentagem_produto` int(11) NOT NULL,
  PRIMARY KEY (`pk_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto`
--

LOCK TABLES `tb_produto` WRITE;
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
INSERT INTO `tb_produto` VALUES (1,1,'teste 1',NULL,1,1,30),(2,1,'teste 2',NULL,1,1,30),(3,1,'teste 3',NULL,1,1,30),(4,2,'teste 1',NULL,1,1,30),(5,2,'teste 2',NULL,1,1,30),(6,2,'teste 3',NULL,1,1,30),(7,3,'teste 1',NULL,1,1,30),(8,3,'teste 2',NULL,1,1,30),(9,3,'teste 3',NULL,1,1,30),(10,4,'teste 1',NULL,1,1,30),(11,4,'teste 2',NULL,1,1,30),(12,4,'teste 3',NULL,1,1,30),(13,5,'teste 1',NULL,1,1,30),(14,5,'teste 2',NULL,1,1,30),(15,5,'teste 3',NULL,1,1,30),(16,6,'teste 1',NULL,1,1,30),(17,6,'teste 2',NULL,1,1,30),(18,6,'teste 3',NULL,1,1,30),(19,1,'teste 4',NULL,1,1,30),(20,1,'teste 5',NULL,1,1,30);
/*!40000 ALTER TABLE `tb_produto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-20 16:36:28
