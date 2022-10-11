-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: whs_kalbe1
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_09_09_025443_process',1),(6,'2022_09_09_025630_create_on_goings_table',1),(7,'2022_09_09_025700_create_reports_table',1),(8,'2022_09_13_011837_create_warehouses_table',1),(9,'2022_09_23_085402_create_standards_table',1),(10,'2022_10_06_014247_create_session_tables_table',1),(11,'2022_10_06_014929_create_satuans_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `on_goings`
--

DROP TABLE IF EXISTS `on_goings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `on_goings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NIK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `process_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gudang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `active` tinyint(1) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `on_goings`
--

LOCK TABLES `on_goings` WRITE;
/*!40000 ALTER TABLE `on_goings` DISABLE KEYS */;
INSERT INTO `on_goings` VALUES (2,'K200400111','Idle','FG','09:51:17','09:51:28',0,'','2022-10-11 02:51:17','2022-10-11 02:51:28');
/*!40000 ALTER TABLE `on_goings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `processes`
--

DROP TABLE IF EXISTS `processes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `processes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `process_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `process_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gudang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `processes_process_id_unique` (`process_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `processes`
--

LOCK TABLES `processes` WRITE;
/*!40000 ALTER TABLE `processes` DISABLE KEYS */;
INSERT INTO `processes` VALUES (1,'Idle','Idle','','2022-10-10 18:16:07','2022-10-10 18:16:07'),(2,'Hold','Hold','','2022-10-10 18:16:07','2022-10-10 18:16:07'),(3,'LL','Lain-lain','','2022-10-10 18:16:07','2022-10-10 18:16:07'),(4,'FG-Loading','Loading','FG','2022-10-10 18:26:41','2022-10-10 18:26:41');
/*!40000 ALTER TABLE `processes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NIK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `process_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gudang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reports_time` datetime NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_time` time NOT NULL,
  `hold_time` time NOT NULL,
  `hold_count` int(11) NOT NULL,
  `performance` double(8,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuans`
--

DROP TABLE IF EXISTS `satuans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `satuans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuans`
--

LOCK TABLES `satuans` WRITE;
/*!40000 ALTER TABLE `satuans` DISABLE KEYS */;
INSERT INTO `satuans` VALUES (1,'2022-10-10 18:16:13','2022-10-10 18:16:13','Pallete'),(2,'2022-10-10 18:16:13','2022-10-10 18:16:13','Batch');
/*!40000 ALTER TABLE `satuans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session_tables`
--

DROP TABLE IF EXISTS `session_tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session_tables` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NIK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `process_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gudang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `hold_start` time DEFAULT NULL,
  `hold_end` time DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hold_status` tinyint(1) NOT NULL,
  `hold_count` int(11) NOT NULL,
  `holdtime` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `session_tables_nik_unique` (`NIK`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session_tables`
--

LOCK TABLES `session_tables` WRITE;
/*!40000 ALTER TABLE `session_tables` DISABLE KEYS */;
/*!40000 ALTER TABLE `session_tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `standards`
--

DROP TABLE IF EXISTS `standards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `standards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `process_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `standards_process_id_unique` (`process_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `standards`
--

LOCK TABLES `standards` WRITE;
/*!40000 ALTER TABLE `standards` DISABLE KEYS */;
INSERT INTO `standards` VALUES (1,'2022-10-10 18:26:41','2022-10-10 18:26:41','FG-Loading',1,1,'Pallete');
/*!40000 ALTER TABLE `standards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `NIK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gudang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logged_in` tinyint(1) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nik_unique` (`NIK`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'31209843','MUHAMAD ALFARABI SETIAWAN','alfarabis@gmail.com','FG',NULL,'$2y$10$6frdbKCy1UrOdN2kHCqkW.PY5LruU0LLYPwEfkP2Rs.FSJZ8RqixC',1,1,NULL,'2022-10-10 18:16:02','2022-10-10 18:26:09'),(2,'K210900228','ADE SUPRIATNO',NULL,'FG',NULL,'$2y$10$hLEPloklbJ0AxkrSbx3PZuQcH/jF2XnEPGQ5wlx2hRPpKaRVsgROa',NULL,0,NULL,'2022-10-10 18:16:02','2022-10-10 18:16:02'),(3,'K200500133','AHMAD HARISONNUDIN',NULL,'FG',NULL,'$2y$10$a8xBmizm0VS77bK5p/s0SeBZeTV8YD3chvR96lobqGwnl3q1ByQxK',NULL,0,NULL,'2022-10-10 18:16:02','2022-10-10 18:16:02'),(4,'K190500224','GHIFAR ANSYORI',NULL,'FG',NULL,'$2y$10$VJLbaF715gJE3Fh/rwOOa.E5IstjrgiqLEx7qsWAXLmdAY4skoOqS',NULL,0,NULL,'2022-10-10 18:16:02','2022-10-10 18:16:02'),(5,'K200400110','JAMALUDIN',NULL,'FG',NULL,'$2y$10$oC/7MZcTrMajrQc/a2mf6uLkjmTeAlFuDK7iY5nXTO0X3pPtfOlqW',NULL,0,NULL,'2022-10-10 18:16:02','2022-10-10 18:16:02'),(6,'K200500132','JEPI JAPARHADI',NULL,'FG',NULL,'$2y$10$Zd9081U3Ir26puz7CkwwR.eYzrrC22QfLavK.0mxSj5fZjPrjklbm',NULL,0,NULL,'2022-10-10 18:16:02','2022-10-10 18:16:02'),(7,'210100017','MUHAMMAD ARDANI',NULL,'FG',NULL,'$2y$10$NMm5eibq902IIMjpEwXheuySW2.y5DAkAbSws.mZkB3bgAwZqSqwO',NULL,0,NULL,'2022-10-10 18:16:02','2022-10-10 18:16:02'),(8,'210100014','MUHAMMAD HENDRIK HERIAWAN',NULL,'FG',NULL,'$2y$10$HrGPM1R1LrZkhvdbh2pO3O0d6jndor396ct6pP80odmC6/6o9KtQO',NULL,0,NULL,'2022-10-10 18:16:02','2022-10-10 18:16:02'),(9,'K210300089','MUHAMMAD RIZKI MUTAQIN',NULL,'FG',NULL,'$2y$10$B4AvQjl5Ye4tb0JISceLNOUzIdMvGXJeMQ1Eq9RaYdRSuCebvxs22',NULL,0,NULL,'2022-10-10 18:16:02','2022-10-10 18:16:02'),(10,'K200400111','YASIN FAOZI',NULL,'FG',NULL,'$2y$10$USO6ncLyvokmPgvINWhtIu.zEuwnn1Nl/ULSWJsdSe2d1JZho2Afu',1,0,NULL,'2022-10-10 18:16:02','2022-10-10 18:25:28'),(11,'210100016','TEDI ALI AJIS',NULL,'FG',NULL,'$2y$10$CnQb45RdUtfM/QyKqDKgceuc1zxBadBloTQlKz6VVCu2wyARt4Q6O',NULL,0,NULL,'2022-10-10 18:16:03','2022-10-10 18:16:03'),(12,'210100018','IMAL MALURI',NULL,'FG',NULL,'$2y$10$/voJHdzZhl9EKSsoQyfaReZQZaBVFM.HonnXHwAKxlNU9EGl2.VAi',NULL,1,NULL,'2022-10-10 18:16:03','2022-10-10 18:16:03'),(13,'K211000238','DILI MUKLIS',NULL,'FG',NULL,'$2y$10$PAwueL5PD7KV0ANm/Cg8i.j0mJS7pBPOl/ahg.KRobGuDHZQ4HQfa',NULL,0,NULL,'2022-10-10 18:16:03','2022-10-10 18:16:03'),(14,'K220300039','DENI KURNIA ALATAS',NULL,'RM',NULL,'$2y$10$cB/yjJbwxy6lVXYCg2vZAeWFMeiLIiBxgFTHS3IFq3fS98LBgTH.G',NULL,0,NULL,'2022-10-10 18:16:03','2022-10-10 18:16:03'),(15,'K211200254','TOPAN MUHAMMAD FATAH',NULL,'RM',NULL,'$2y$10$xtEY1JszdTlUpTbj.cPFCOAtBjySyC5K0pnxlWI/DO8fsTarIdC5C',NULL,0,NULL,'2022-10-10 18:16:03','2022-10-10 18:16:03'),(16,'180100027','HERMANSYAH',NULL,'RM',NULL,'$2y$10$sHypGNtrB1o6uRa8BTv0l.yqAirIVj5USEZwr1h0cns164dDBF3dC',NULL,0,NULL,'2022-10-10 18:16:03','2022-10-10 18:16:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gudang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gudang_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouses`
--

LOCK TABLES `warehouses` WRITE;
/*!40000 ALTER TABLE `warehouses` DISABLE KEYS */;
INSERT INTO `warehouses` VALUES (1,'FG','Finish Good',NULL,NULL),(2,'RM','Raw Material',NULL,NULL),(3,'PM','Packaging Material',NULL,NULL);
/*!40000 ALTER TABLE `warehouses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'whs_kalbe1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-11 10:07:31
