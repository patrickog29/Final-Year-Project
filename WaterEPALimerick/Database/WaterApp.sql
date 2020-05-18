CREATE DATABASE  IF NOT EXISTS `waterapplim` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `waterapplim`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: waterapplim
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.11-MariaDB

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
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `waterbody_name` varchar(40) NOT NULL,
  `summary` text DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `image` longblob DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `userEmail` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkwaterbody_idx` (`waterbody_name`),
  CONSTRAINT `fkwaterbody` FOREIGN KEY (`waterbody_name`) REFERENCES `water_body` (`waterbody_name`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (55,'River Deel','Thousands of fish have been killed following a water pollution incident in Co Limerick.\r\n\r\nIt is believed slurry was the cause of the major fish kill in the Drumcamogue','2020-04-22 23:43:54',52.489964,-8.992458,'fish.jpg','Pollution','patrickogrady9@gmail.com'),(56,'River Camogue','It is classified as a valley fen and designated as an Area of Scientific Interest and a proposed Natural Heritage Area (NHA)','2020-04-22 23:46:50',52.338142,-8.188751,'flora.jpg','Flora','patrickogrady9@gmail.com'),(57,'River Shannon','Nationally important populations of a further sixteen species also occur, for example cormorant, Whooper Swan, Greylag Goose, wigeon, teal, curlew, greenshank and a number of plovers.','2020-04-22 23:49:32',52.650898,-9.089936,'geese.png','Fuana','patrickogrady9@gmail.com'),(58,'River Shannon','A combination of high tides, storm-force winds and wintry showers over the weekend resulted in the worst flooding Limerick city has experienced in living memory','2020-04-22 23:58:22',52.672600,-8.543431,'flood.jpg','Fuana','pxogrady@gmail.com');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parameters`
--

DROP TABLE IF EXISTS `parameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parameters` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `waterbody_name` varchar(40) NOT NULL,
  `DO` float(4,2) DEFAULT NULL,
  `pH` float(4,2) DEFAULT NULL,
  `nitrate` float(3,1) DEFAULT NULL,
  `alkalinity` int(4) DEFAULT NULL,
  `NH3` float(4,2) DEFAULT NULL,
  `BOD` float(4,2) DEFAULT NULL,
  `phosphate` float(4,2) DEFAULT NULL,
  `SS` int(4) DEFAULT NULL,
  `q` varchar(25) DEFAULT NULL,
  `sample_date` date DEFAULT NULL,
  PRIMARY KEY (`id`,`waterbody_name`),
  KEY `fk_chemical parameters_water_body1_idx` (`waterbody_name`),
  CONSTRAINT `watebodyFK` FOREIGN KEY (`waterbody_name`) REFERENCES `water_body` (`waterbody_name`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parameters`
--

LOCK TABLES `parameters` WRITE;
/*!40000 ALTER TABLE `parameters` DISABLE KEYS */;
INSERT INTO `parameters` VALUES (36,'River Shannon',7.00,5.80,2.1,7,0.30,2.40,3.50,3,'Good Status','2019-04-21'),(37,'River Camogue',0.20,7.20,0.3,12,0.01,2.40,0.60,4,'Good','0000-00-00'),(38,'River Deel',8.88,4.33,6.6,9,0.30,2.40,4.00,3,'Moderate','2020-03-31'),(39,'Lough Gur',7.70,6.40,2.1,13,0.20,4.70,2.10,3,'Good','2020-02-22');
/*!40000 ALTER TABLE `parameters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'$2y$10$iWP7zk/UCUEYJjqFKQma3OkLq87P.kkNfsDookc2zQ81Hnc6dr/yK','Patrick','O Grady','patrickogrady9@gmail.com',1,2,'6602294be910b1e3c4571bd98c4d5484'),(5,'$2y$10$V.i5hny0Oug.c/E6.r2y6efrv4L7MukgdvpTdhwJCwDpoNuHOlVcW','Patrick','O Grady','patrickogrady8@gmail.com',0,2,'bbf94b34eb32268ada57a3be5062fe7d'),(6,'$2y$10$F9C3JKhmu1EDiAq36zHCHeWOqxVxh3Ko0.jBwXHtDBuBn1sQme7Dm','Patrick','O Grady','hotmail@hotmail.com',0,NULL,'839ab46820b524afda05122893c2fe8e'),(7,'$2y$10$hnjNWf.FZ2fZo1BMyYHDUO5H66LCw.nH7BfwxOes.3OrAkgYZ1q8.','Patrick','O Grady','par@gmail.com',0,NULL,'a01a0380ca3c61428c26a231f0e49a09'),(8,'$2y$10$VUrGOIaSG35YmCn7Nk3zJurAisePTrKRg/rZR1upQ6TZOcMUwanZi','Patrick','O Grady','Patrick@hotmail.com',0,NULL,'f76a89f0cb91bc419542ce9fa43902dc'),(9,'$2y$10$Giv18xrkAhT9dH044OOmd.STa9/Nqw1AyBcW1rlbGQ.loawa4j7y6','Patrick','O Grady','patrickograd@gmail.com',0,NULL,'4e4b5fbbbb602b6d35bea8460aa8f8e5'),(10,'$2y$10$jQ3lq5JHZaQP73OYe2tpPeVZ1KRmQaN.QZi.tRAQNSUsGPPxQYi3S','Patrick','O Grady','coll@gmail.com',0,NULL,'6602294be910b1e3c4571bd98c4d5484'),(11,'$2y$10$uUr3MetlAI/FOPz7IckB.O8bgRtF0FJXSM6nfUhvbPgEY3BoGO2Ey','Patrick','O Grady','Patrick@gmail.com',0,NULL,'37bc2f75bf1bcfe8450a1a41c200364c'),(12,'$2y$10$4BgE6JM.es7ZZsNUptzcH.MB55KX1h.FCQYAkU5hczvQrUALMVYMC','Patrick','O Grady','patrickogrady2@gmail.com',0,NULL,'aba3b6fd5d186d28e06ff97135cade7f'),(13,'$2y$10$V81QaOKGT0rV4RoW.cEu/.Cw49TzgwbPmQPnATAu3wU5Ztz7S7h22','Patrick','O Grady','callum@gmail.com',0,NULL,'f8c1f23d6a8d8d7904fc0ea8e066b3bb'),(14,'$2y$10$Ox36ATF0W9kPQk6RI72HBOGDAtBECHffCHyRsFhn.LECS35agyYI.','Patrick','O Grady','Patrick23@gmail.com',0,NULL,'7eacb532570ff6858afd2723755ff790'),(15,'$2y$10$b6RRD7lqRP7krNZh9Q3Pt.OHAG0AIlB8CJl4UTZk9XGJkU2gZhbay','Patrick','O Grady','padj@gmail.com',0,NULL,'e6cb2a3c14431b55aa50c06529eaa21b'),(16,'$2y$10$W1TshUfByesJgMw5wb1dcOPuuDz2lNYMooC8kBiMLpu.VQKauD4EG','Patrick','O Grady','pol@gmail.com',0,NULL,'4a47d2983c8bd392b120b627e0e1cab4'),(17,'$2y$10$CMNF27rLm6ekhp6tYJ1Yd.c/Zd9qDP47sMmz/Iy9hj3sDsnB.Ra.W','Patrick','O Grady','col@hotmail.com',0,NULL,'e5841df2166dd424a57127423d276bbe'),(18,'$2y$10$tz12OMbKM6CLLhFX4w8DluSxneAbixdw1nVg2P8P9M4NezY.OP3Si','Patrick','O Grady','jgjh@hotmail.com',0,NULL,'cedebb6e872f539bef8c3f919874e9d7'),(19,'$2y$10$zOY8rqu97jJtKOuqSqgUZ.bHgfDmLCWYzZ9X3Aj9Wfm2mdOveCIYy','John','O Grady','jj@hotmail.com',0,NULL,'15de21c670ae7c3f6f3f1f37029303c9'),(20,'$2y$10$iCL5GUmC04A0l.fcZ8BGJOYfoWd5VOx0R7sGMxz/QBWAjIrEhzA/K','caroline','O Grady','caoline@gmail.com',0,NULL,'4311359ed4969e8401880e3c1836fbe1'),(21,'$2y$10$C0ocYE5M/CMDIHZT8u8UUeT59I5LgHSyYpkmwwFr9J8v./9nqPuYy','noel','sean','noes@gmail.com',0,NULL,'3493894fa4ea036cfc6433c3e2ee63b0'),(22,'$2y$10$B5NRr7dxaF5jnm634T3xI.PrAzuA/mgq2M8H0Y4O2lY97GamJlj5u','Patrick','O Grady','killamin@gmail.com',0,NULL,'b1a59b315fc9a3002ce38bbe070ec3f5'),(23,'$2y$10$tKVsYu7.Y3Jl4w1GaerlfuwjdkGXchFzZUGUa7vgKs5y6kjH7vO4.','Patrick','O Grady','thtgj@gmail.com',0,NULL,'ad13a2a07ca4b7642959dc0c4c740ab6'),(24,'$2y$10$AfxBXFI/cFsaCmGzRFQZ6eHZYBzKrvCH7u0NgGn6MjaKc3K6BCgga','Patrick','O Grady','girl@gmail.com',0,NULL,'912d2b1c7b2826caf99687388d2e8f7c'),(25,'$2y$10$Qx/hXfkT.3gg9uEr359oHeKDZYmQBXEzTUyclraiN71ZXy/7r0EIC','Patrick','O Grady','gimmy@gmail.com',0,NULL,'24681928425f5a9133504de568f5f6df'),(26,'$2y$10$h7ufdK9zK/SPjnC1QTLr1OWRN5sL93lDnyJE41Hc.BRuoiRn4E9Ei','alan ','o ryan','alan@studen.lit.ie',0,NULL,'d6baf65e0b240ce177cf70da146c8dc8'),(27,'$2y$10$yGJ62e9ZlVfYR1gGKVOMLu8z61WkG7N53c53tTH/ArlyXv/3Yo/bi','Sean ','Egan','00245046@student.lit.ie',0,NULL,'b0b183c207f46f0cca7dc63b2604f5cc'),(28,'$2y$10$O11SVOilvjM4Id0IsEDJ5Os.bMwwhy9Yw4Rik.W6cJEAfKTmioN/m','Patrick','O Grady','Xaverius@hotmail.com',0,NULL,'289dff07669d7a23de0ef88d2f7129e7'),(29,'$2y$10$yRPfxqjQY5wI/qLRp4XUieETw10LjNIIEMIetapD2F0MDn9HK9Qw.','Patrick','O Grady','Patrick@hotj.com',0,NULL,'5ef0b4eba35ab2d6180b0bca7e46b6f9'),(30,'$2y$10$qOMBdLLQHLCk308Rkhlb8.3sx9KZLhdQtFT3iG1IoTE.SXYqdRGzO','Patrick','O Grady','ghtj@hotmail.com',0,NULL,'e96ed478dab8595a7dbda4cbcbee168f'),(31,'$2y$10$vNKnp22mmuvlvWZu4a2.Ae4bJBEc7Y1BSBBwKhTkCO6XkQhfrvCK6','Patrick','O Grady','Patrickhjkj@gmail.com',0,NULL,'9431c87f273e507e6040fcb07dcb4509'),(32,'$2y$10$SyHYoaSTZFG4Gb5hQIqN9O3I.uvJxI3j/bS33q98P2om.5Esz/tZ6','patrick','ffuejw','dejejr@gmail.com',0,NULL,'6883966fd8f918a4aa29be29d2c386fb'),(33,'$2y$10$0tmiEDkafIz3WAq7FSrmUOa5FY1tRewvDwMBO0C/CCDX8bOvlBr3e','Patrick','O Grady','killian@gmail.com',0,NULL,'e6cb2a3c14431b55aa50c06529eaa21b'),(34,'$2y$10$mAt.nr/Q7acILQZH4bZYnOHm7j58J685FfS1knMeTMF3m8By6l8oK','Patrick','O Grady','killian345@gmail.com',0,NULL,'f7664060cc52bc6f3d620bcedc94a4b6'),(35,'$2y$10$M3UTLgbW4RSdrzt2nQKZZubn1DT0WFRKcjO0bJ7xKNLM5cIOIn4e.','Patrick','O Grady','pxogrady@gmail.com',1,1,'2ca65f58e35d9ad45bf7f3ae5cfd08f1'),(36,'$2y$10$/toEOZfLSdYTEzkNsCj3XuzL2c1JoDIGMfornyUuZS/osmtHr2i5u','Patrick','O Grady','limerick.water.lit@gmail.com',1,2,'28267ab848bcf807b2ed53c3a8f8fc8a');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `water_body`
--

DROP TABLE IF EXISTS `water_body`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `water_body` (
  `waterbody_name` varchar(40) NOT NULL,
  `waterbody_type` varchar(15) DEFAULT NULL,
  `townland` varchar(40) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  PRIMARY KEY (`waterbody_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `water_body`
--

LOCK TABLES `water_body` WRITE;
/*!40000 ALTER TABLE `water_body` DISABLE KEYS */;
INSERT INTO `water_body` VALUES ('Lough Gur','Lake','Herbertstown','Lake located in the center of Co. Liemrick',52.847401,-8.626700),('River Camogue','River','Hospital','The River Camogue rises in County Tipperary near Emly. It enters County Limerick and is bridged by the R513 , R514 and R516 outside Hospital, and meets the Mahore River. It flows northwards through Herbertstown and then turns westwards, flowing under the R514, R512 and R511 before entering Greybridge, where it gives its name to the Camogue Rovers GAA club. The Camogue flows on under the R516 and drains into the Maigue in Anhid East, about one mile (1.6 km) upriver of Croom.',52.367332,-8.186359),('River Deel','River','Askeaton','The River Deel is in County Cork and County Limerick, Ireland. The river rises near Dromina in north County Cork and flows north into County Limerick for over 60 km to enter the Shannon Estuary at Askeaton.',52.466408,-9.205751),('River Mulkear','River','Annacotty','The River Mulcair, or Mulkear, rises in the Slieve Felim Mountains and Silvermine Mountains in Ireland, flows through the east of County Limerick before joining the River Shannon near Annacotty. It flows through Counties Limerick and Tipperary',52.658260,-8.544432),('River Shannon','River','Limerick City','The River Shannon (Irish: Abha na Sionainne, an tSionainn, an tSionna) is the longest river in Ireland at 360.5 km (224 miles).[1] It drains the Shannon River Basin which has an area of 16,865 km2 (6,512 sq mi),[2] one fifth of the area of Ireland.\r\n\r\nThe Shannon divides the west of Ireland (principally the province of Connacht) from the east and south (Leinster and most of Munster). County Clare, being west of the Shannon but part of the province of Munster, is the major exception. The river represents a major physical barrier between east and west, with fewer than thirty-five crossing-points between Limerick city in the south and the village of Dowra in the north.\r\n\r\nThe river is named after Sionna, a Celtic goddess.[3]',52.680882,-8.813904);
/*!40000 ALTER TABLE `water_body` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-23 15:23:56
