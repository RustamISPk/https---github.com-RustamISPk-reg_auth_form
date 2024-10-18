-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: site_users
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `user_register_table`
--

DROP TABLE IF EXISTS `user_register_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_register_table` (
  `accounts` varchar(15) NOT NULL,
  `user_password` varchar(15) NOT NULL,
  `user_description` varchar(500) NOT NULL,
  `age` int NOT NULL,
  `register_date` varchar(8) NOT NULL,
  `register_time` varchar(8) NOT NULL,
  PRIMARY KEY (`accounts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_register_table`
--

LOCK TABLES `user_register_table` WRITE;
/*!40000 ALTER TABLE `user_register_table` DISABLE KEYS */;
INSERT INTO `user_register_table` VALUES ('admin','123@abc','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac venenatis nisi. Suspendisse felis mauris, ornare eu suscipit quis, vehicula at dolor. Nunc ut maximus justo, eget dictum augue. Quisque at mi commodo, tempus est non, blandit velit. In in nulla facilisis, aliquet lectus in, volutpat leo. Fusce tincidunt quis lorem ut pellentesque. Vestibulum iaculis sit amet tortor aliquam fermentum. ',12,'10.17.24','15:21:04'),('second_test','12SAD23@sad','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac venenatis nisi. Suspendisse felis mauris, ornare eu suscipit quis, vehicula at dolor. Nunc ut maximus justo, eget dictum augue. Quisque at mi commodo, tempus est non, blandit velit. In in nulla facilisis, aliquet lectus in, volutpat leo. Fusce tincidunt quis lorem ut pellentesque. Vestibulum iaculis sit amet tortor aliquam fermentum. ',19,'10.18.24','09:36:50'),('test_user','test_user_@1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac venenatis nisi. Suspendisse felis mauris, ornare eu suscipit quis, vehicula at dolor. Nunc ut maximus justo, eget dictum augue. Quisque at mi commodo, tempus est non, blandit velit. In in nulla facilisis, aliquet lectus in, volutpat leo. Fusce tincidunt quis lorem ut pellentesque. Vestibulum iaculis sit amet tortor aliquam fermentum. ',14,'10.18.24','09:36:18'),('third_test','123AD32@','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac venenatis nisi. Suspendisse felis mauris, ornare eu suscipit quis, vehicula at dolor. Nunc ut maximus justo, eget dictum augue. Quisque at mi commodo, tempus est non, blandit velit. In in nulla facilisis, aliquet lectus in, volutpat leo. Fusce tincidunt quis lorem ut pellentesque. Vestibulum iaculis sit amet tortor aliquam fermentum. ',27,'10.18.24','09:37:18');
/*!40000 ALTER TABLE `user_register_table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-18  9:41:01
