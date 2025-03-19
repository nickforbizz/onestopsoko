-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: onestopsoko
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'walk-in, loyalty member',
  `active` tinyint DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Walk-In customer','0707722232',NULL,'Walk-In','Walk-In',NULL,NULL,'2025-03-16 08:24:15','2025-03-16 08:24:15',NULL),(2,'Hotel Peter Chips','0789764234',NULL,'Melphi','Member',NULL,NULL,'2025-03-16 08:25:27','2025-03-16 08:25:54',NULL),(3,'MERCY SHOP','0796891933',NULL,'UWANJA WA WOTA','Member',NULL,NULL,'2025-03-17 16:23:29','2025-03-17 16:23:29',NULL);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint unsigned NOT NULL,
  `created_by` bigint unsigned NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `comments_created_by_foreign` (`created_by`),
  CONSTRAINT `comments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,5,4,'Suscipit rerum sit ipsa temporibus id.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(2,7,4,'Aut cum facere dignissimos magnam est.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(3,13,1,'Reiciendis et iure rem ipsum.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(4,11,1,'Assumenda aut exercitationem numquam nisi earum eos modi.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(5,8,4,'Totam dolores tempora maiores magnam soluta eaque.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(6,5,4,'Nihil voluptas autem voluptatem ut fugit.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(7,9,3,'Iste soluta quibusdam cumque et et quia cupiditate officia.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(8,4,4,'Molestiae et minima veritatis distinctio minima molestiae.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(9,13,1,'Molestiae autem atque officia.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(10,11,4,'Et recusandae vero atque cupiditate dolorem eum eaque deleniti.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(11,5,4,'Eos est assumenda sint sed.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(12,1,3,'Voluptas fuga et fuga iusto nam.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(13,13,1,'Consectetur minima sed et.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(14,11,3,'Quia facere dignissimos ut occaecati.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(15,3,2,'Sed necessitatibus fugit hic officia repudiandae saepe.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(16,5,2,'Animi tempore odit laboriosam molestiae saepe et et.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(17,13,2,'Eius repudiandae voluptate voluptatibus sapiente qui aut.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(18,6,1,'Corrupti cupiditate quis et recusandae ipsam est.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(19,10,4,'Aliquam voluptate minus error dolore qui optio aut.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(20,1,2,'Magnam fugiat ex temporibus repellat et sed.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(21,6,4,'Veritatis nam quo assumenda quasi.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(22,7,4,'Quae provident error consequuntur ea in perspiciatis.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(23,6,1,'Nemo eos esse repellat dolorum unde.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(24,2,1,'Ratione excepturi numquam laboriosam ea.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(25,9,1,'Cupiditate saepe molestiae iusto quis et.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(26,12,3,'Corporis qui recusandae velit hic eligendi vel animi.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(27,9,1,'Dolores quo similique a ut consequatur ex.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(28,10,1,'Eum omnis itaque nobis facere non aut.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(29,8,3,'Voluptatem temporibus dolor rem consequatur aut molestias.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(30,3,3,'Animi occaecati minima illum officia labore.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(31,11,3,'Eveniet provident fugiat similique repellat.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(32,6,3,'Maiores et dolore fugit aliquam.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(33,1,4,'Occaecati doloribus qui qui repellat sint maxime.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(34,3,1,'Odio nobis odit doloribus doloremque sit.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(35,5,3,'Optio voluptatum architecto odit laborum nam rerum tempora esse.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(36,6,4,'Qui nulla dolores quae officiis voluptatem est nihil.',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `guards`
--

DROP TABLE IF EXISTS `guards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guards` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `guards_created_by_foreign` (`created_by`),
  CONSTRAINT `guards_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guards`
--

LOCK TABLES `guards` WRITE;
/*!40000 ALTER TABLE `guards` DISABLE KEYS */;
INSERT INTO `guards` VALUES (1,'web',1,3,'2025-03-16 05:23:32','2025-03-16 05:23:32');
/*!40000 ALTER TABLE `guards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quantity_available` int DEFAULT '0',
  `last_updated` timestamp NULL DEFAULT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'of other stores',
  `product_id` bigint unsigned DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` smallint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventory_products_FK` (`product_id`),
  KEY `inventory_users_FK` (`created_by`),
  CONSTRAINT `inventory_products_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `inventory_users_FK` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1,-1,'2025-03-18 12:11:35',NULL,1,1,'2025-03-18 12:11:35','2025-03-18 12:15:35',NULL,NULL);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(5,'2019_08_19_000000_create_failed_jobs_table',1),(6,'2019_12_14_000001_create_personal_access_tokens_table',1),(7,'2023_03_26_084305_create_permission_tables',1),(8,'2023_03_31_114218_create_post_categories_table',1),(9,'2023_03_31_114652_create_posts_table',1),(10,'2023_04_09_115055_create_guards_table',1),(11,'2023_04_13_153510_create_notifications_table',1),(12,'2023_04_21_103844_create_product_categories_table',1),(13,'2023_04_21_103856_create_products_table',1),(14,'2023_04_22_060907_create_comments_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',1),(3,'App\\Models\\User',1),(4,'App\\Models\\User',1),(2,'App\\Models\\User',2),(3,'App\\Models\\User',2),(4,'App\\Models\\User',2),(3,'App\\Models\\User',3),(4,'App\\Models\\User',3),(4,'App\\Models\\User',4);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  `total_amount` int DEFAULT '0',
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'pending, completed, cancelled',
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` smallint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_clients_FK` (`client_id`),
  KEY `order_users_FK` (`created_by`),
  CONSTRAINT `order_clients_FK` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `order_users_FK` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `quantity` int DEFAULT '0',
  `price_per_unit` int DEFAULT '0',
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` smallint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_FK` (`order_id`),
  KEY `order_details_products_FK` (`product_id`),
  KEY `order_details_users_FK` (`created_by`),
  CONSTRAINT `order_details_order_FK` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  CONSTRAINT `order_details_products_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `order_details_users_FK` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint unsigned NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  KEY `permissions_created_by_foreign` (`created_by`),
  CONSTRAINT `permissions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create users','web',2,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(2,'edit users','web',1,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(3,'delete users','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(4,'activate users','web',2,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(5,'deactivate users','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(6,'create post categories','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(7,'edit post categories','web',1,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(8,'delete post categories','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(9,'publish post categories','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(10,'unpublish post categories','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(11,'create posts','web',2,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(12,'edit posts','web',1,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(13,'delete posts','web',2,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(14,'publish posts','web',2,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(15,'unpublish posts','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(16,'create product categories','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(17,'edit product categories','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(18,'delete product categories','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(19,'create product','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(20,'edit product','web',1,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(21,'delete product','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(22,'create supplier','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(23,'edit supplier','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(24,'delete supplier','web',1,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(25,'create client','web',1,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(26,'edit client','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(27,'delete client','web',1,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(28,'create inventory','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(29,'edit inventory','web',1,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(30,'delete inventory','web',1,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(31,'create order','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(32,'edit order','web',1,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(33,'delete order','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(34,'create order_detail','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(35,'edit order_detail','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(36,'delete order_detail','web',2,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(37,'create transaction','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(38,'edit transaction','web',2,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(39,'delete transaction','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(40,'create request','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(41,'edit request','web',1,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(42,'delete request','web',2,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(43,'create roles','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(44,'edit roles','web',2,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(45,'delete roles','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(46,'create permissions','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(47,'edit permissions','web',2,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(48,'delete permissions','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(49,'create params','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(50,'edit params','web',3,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(51,'delete params','web',4,'1','2025-03-16 06:41:01','2025-03-16 06:41:01'),(52,'create customer request','web',1,'1','2025-03-16 09:24:26','2025-03-16 09:24:26'),(53,'edit customer request','web',1,'1','2025-03-16 09:24:57','2025-03-16 09:24:57'),(54,'delete customer request','web',1,'1','2025-03-16 09:25:09','2025-03-16 09:25:09'),(55,'create sale','web',1,'1','2025-03-16 17:04:53','2025-03-16 17:04:53'),(56,'edit sale','web',1,'1','2025-03-16 17:05:06','2025-03-16 17:05:06'),(57,'delete sale','web',1,'1','2025-03-16 17:05:18','2025-03-16 17:05:18'),(58,'create supply','web',1,'1','2025-03-17 14:14:15','2025-03-17 14:14:15'),(59,'edit supply','web',1,'1','2025-03-17 14:14:30','2025-03-17 14:14:30'),(60,'delete supply','web',1,'1','2025-03-17 14:14:45','2025-03-17 14:14:45');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint unsigned NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_categories_slug_unique` (`slug`),
  KEY `post_categories_created_by_foreign` (`created_by`),
  CONSTRAINT `post_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_categories`
--

LOCK TABLES `post_categories` WRITE;
/*!40000 ALTER TABLE `post_categories` DISABLE KEYS */;
INSERT INTO `post_categories` VALUES (1,'ipsum','ipsum','Et voluptatem iusto qui.',3,'0',NULL,'2025-03-16 05:23:31','2025-03-16 05:23:31'),(2,'est','est','Est dolor sint qui velit commodi laboriosam sit.',4,'0',NULL,'2025-03-16 05:23:31','2025-03-16 05:23:31'),(3,'eaque','eaque','Iure enim delectus id ex tempora.',2,'0',NULL,'2025-03-16 05:23:31','2025-03-16 05:23:31'),(4,'aut','aut','In nemo quia maiores ipsum iure veritatis.',3,'0',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32');
/*!40000 ALTER TABLE `post_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_post.png',
  `created_by` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1.)Draft 2.)Published 3.)Archived',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_created_by_foreign` (`created_by`),
  KEY `posts_category_id_foreign` (`category_id`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `post_categories` (`id`),
  CONSTRAINT `posts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Eos quo atque cupiditate consequatur dolores.','eos-quo-atque-cupiditate-consequatur-dolores','Cum quo dolor quo odio consequatur. Sequi optio aliquam accusamus odio debitis explicabo nemo suscipit. Occaecati est reprehenderit earum sed placeat modi quia. Aliquam quos aut vel tenetur.','default_post.png',3,3,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(2,'Aut ratione inventore cumque eveniet reiciendis sed.','aut-ratione-inventore-cumque-eveniet-reiciendis-sed','Inventore commodi nulla nam delectus explicabo possimus ea. Quo consequatur dolorem iste voluptas.','default_post.png',2,1,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(3,'Dolorem et culpa error illo facere autem.','dolorem-et-culpa-error-illo-facere-autem','Unde velit nam itaque ipsum. Laboriosam ducimus occaecati iusto voluptatem eaque autem officiis. Ipsa sequi molestias qui. Sunt est enim qui earum rerum non commodi corporis. Voluptatibus est ratione molestiae delectus in.','default_post.png',1,3,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(4,'Unde sed error et dicta.','unde-sed-error-et-dicta','Omnis et laudantium repellendus rerum repudiandae. Reiciendis qui amet culpa omnis architecto provident. Enim odio minus et quia perspiciatis aut.','default_post.png',1,2,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(5,'Cumque at officiis reprehenderit et.','cumque-at-officiis-reprehenderit-et','Eligendi architecto eius odio facilis odio natus et minus. Aspernatur modi dolore omnis omnis quos necessitatibus. Et temporibus dolorum delectus placeat eum. Soluta numquam distinctio est tempora a.','default_post.png',4,3,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(6,'Aliquam odit voluptatum maiores dolor reprehenderit sit.','aliquam-odit-voluptatum-maiores-dolor-reprehenderit-sit','Odio qui et modi nobis iste. Quibusdam dolor ex nostrum beatae est quo. Sed nam aut tempore ducimus ut. Eum rerum aliquid quo explicabo.','default_post.png',4,4,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(7,'Asperiores commodi mollitia ducimus tempora repellendus.','asperiores-commodi-mollitia-ducimus-tempora-repellendus','Saepe similique dolores tempora nihil. Deserunt quam dolor enim molestiae. Quis at facere qui hic nihil.','default_post.png',1,2,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(8,'Voluptas et sapiente et dolorem.','voluptas-et-sapiente-et-dolorem','Aut vero corporis omnis et dolore culpa. Nihil asperiores dolorem aut dolorem sed. Asperiores totam vero a omnis saepe corporis quibusdam.','default_post.png',4,1,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(9,'Expedita doloribus quia recusandae ducimus odit.','expedita-doloribus-quia-recusandae-ducimus-odit','Dolore eius eius enim nesciunt occaecati et voluptatum. Alias amet accusamus est unde veniam iure molestiae. Non suscipit ex dolores quas aliquam minima possimus. Voluptate maiores magnam tenetur eos ut a.','default_post.png',1,4,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(10,'Quia accusamus deleniti adipisci voluptatem voluptas sint sequi.','quia-accusamus-deleniti-adipisci-voluptatem-voluptas-sint-sequi','Voluptatibus sint dolor voluptas eveniet. Eum sed numquam quo odit.','default_post.png',1,4,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(11,'Dolor numquam doloremque sed ut adipisci quia facilis architecto.','dolor-numquam-doloremque-sed-ut-adipisci-quia-facilis-architecto','Eveniet sunt minus vitae hic et qui eaque. Eos esse molestiae voluptatum. Dolores ratione aut est. Facere non aut fugiat qui doloremque necessitatibus.','default_post.png',3,3,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(12,'Non nostrum modi ut illum nostrum.','non-nostrum-modi-ut-illum-nostrum','Voluptas sit omnis laudantium hic facilis voluptates. Magni sit placeat provident alias aut ipsum. Omnis doloribus dolores odio quos.','default_post.png',3,2,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32'),(13,'Odit pariatur assumenda voluptatem tenetur impedit.','odit-pariatur-assumenda-voluptatem-tenetur-impedit','Nisi esse reiciendis dolorem et quos. Earum est asperiores necessitatibus quis. Enim eum qui numquam dolor. Accusamus inventore porro quod ea quia.','default_post.png',2,2,'0','1',NULL,'2025-03-16 05:23:32','2025-03-16 05:23:32');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_by` bigint unsigned NOT NULL,
  `active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_categories_slug_unique` (`slug`),
  KEY `product_categories_created_by_foreign` (`created_by`),
  CONSTRAINT `product_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,'Fruits','fruits',NULL,1,'1',NULL,'2025-03-18 12:09:51','2025-03-18 12:09:51'),(2,'Perishable','perishable',NULL,1,'1',NULL,'2025-03-18 12:10:14','2025-03-18 12:10:14'),(3,'Non Perishable','non-perishable',NULL,1,'1',NULL,'2025-03-18 12:10:42','2025-03-18 12:10:42'),(4,'Moderate Perishable','moderate-perishable',NULL,1,'1',NULL,'2025-03-18 12:10:53','2025-03-18 12:10:53');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cost` int DEFAULT '0',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `quantity_alert` int DEFAULT '0',
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default_post.png',
  `created_by` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1.)In Stock 2.)Cooming soon 3.)Sold 4.) Returned 5.)Discounted 6.) Archived',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_created_by_foreign` (`created_by`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Bananas - 15','bananas-15',NULL,0,'15','-1',5,'default.png',1,1,'0','1',NULL,'2025-03-18 12:11:35','2025-03-18 12:15:35');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned DEFAULT NULL,
  `request_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'inquiry, complaint, return request',
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'pending, resolved',
  `DateSubmitted` date DEFAULT NULL,
  `Response` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` smallint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requests_clients_FK` (`client_id`),
  CONSTRAINT `requests_clients_FK` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (1,2,'Complaint','test','Resolved','2025-03-16',NULL,1,'2025-03-16 09:44:00','2025-03-16 09:47:32',NULL,NULL),(2,1,'Inquiry','test 002','Resolved','2025-03-16',NULL,NULL,'2025-03-16 09:44:19','2025-03-16 09:44:19',NULL,NULL);
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'superadmin','web','1','2025-03-16 05:23:30','2025-03-16 05:23:30'),(2,'admin','web','1','2025-03-16 05:23:30','2025-03-16 05:23:30'),(3,'writer','web','1','2025-03-16 05:23:30','2025-03-16 05:23:30'),(4,'user','web','1','2025-03-16 05:23:30','2025-03-16 05:23:30');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned DEFAULT NULL,
  `sales_date` date DEFAULT NULL,
  `quantity` int DEFAULT '0',
  `amount` int DEFAULT NULL,
  `total_amount` int DEFAULT '0',
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'pending, cancelled, fullfilled, return',
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` smallint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_clients_FK` (`client_id`),
  KEY `sales_products_FK` (`product_id`),
  KEY `sales_users_FK` (`created_by`),
  CONSTRAINT `sales_clients_FK` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `sales_products_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `sales_users_FK` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,1,1,'2025-03-18',3,15,45,'Fullfilled',NULL,'2025-03-18 12:15:35','2025-03-18 12:15:35',NULL,NULL);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ratings` smallint DEFAULT '0',
  `paymentterms` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `active` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'nik','0707722234','ciwyb@mailinator.com','Libby Barron',0,'M-pesa',1,NULL,'2025-03-16 07:24:44',NULL,'2025-03-16 07:28:55'),(2,'Jael kim','0789678673',NULL,'Msa',0,'M-pesa',1,NULL,'2025-03-16 07:43:33',NULL,'2025-03-16 07:47:53'),(3,'willy wainainana','0722536967',NULL,'NAIROBI',0,'M-pesa',NULL,NULL,'2025-03-17 16:04:21',NULL,'2025-03-17 16:04:21'),(4,'willy wainainana','0722536967',NULL,'NAIROBI',0,'M-pesa',NULL,NULL,'2025-03-17 16:04:22','2025-03-17 16:05:02','2025-03-17 16:05:02'),(5,'willy wainainana','0722536967',NULL,'NAIROBI',0,'M-pesa',NULL,NULL,'2025-03-17 16:04:22','2025-03-17 16:05:10','2025-03-17 16:05:10'),(6,'willy wainainana','0722536967',NULL,'NAIROBI',0,'M-pesa',NULL,NULL,'2025-03-17 16:04:23','2025-03-17 16:04:58','2025-03-17 16:04:58'),(7,'willy wainainana','0722536967',NULL,'NAIROBI',0,'M-pesa',NULL,NULL,'2025-03-17 16:04:24','2025-03-17 16:04:47','2025-03-17 16:04:47'),(8,'willy wainainana','0722536967',NULL,'NAIROBI',0,'M-pesa',NULL,NULL,'2025-03-17 16:04:24','2025-03-17 16:04:53','2025-03-17 16:04:53');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplies`
--

DROP TABLE IF EXISTS `supplies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned DEFAULT NULL,
  `supplier_id` bigint unsigned DEFAULT NULL,
  `supply_date` date DEFAULT NULL,
  `quantity` int DEFAULT '0',
  `amount` int DEFAULT NULL,
  `total_amount` int DEFAULT '0',
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'pending, cancelled, fullfilled, return',
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` smallint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_clients_FK` (`supplier_id`) USING BTREE,
  KEY `sales_products_FK` (`product_id`) USING BTREE,
  KEY `sales_users_FK` (`created_by`) USING BTREE,
  CONSTRAINT `sales_products_FK_copy` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `sales_users_FK_copy` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `supplies_suppliers_FK` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplies`
--

LOCK TABLES `supplies` WRITE;
/*!40000 ALTER TABLE `supplies` DISABLE KEYS */;
/*!40000 ALTER TABLE `supplies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'sale, return, adjustment, transfer',
  `date` date DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `amount` int DEFAULT '0',
  `notes` text COLLATE utf8_unicode_ci,
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` smallint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_products_FK` (`product_id`),
  KEY `transactions_users_FK` (`created_by`),
  CONSTRAINT `transactions_products_FK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `transactions_users_FK` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `avator` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_avator.png',
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super','Admin','','Superadmin User','superadmin@admin.com','2025-03-16 05:23:31','$2y$10$5mm86VFwW9Cr2GLIVIcI7O5TM2LcnG6WE/DcNkKS0ONLeTOTDTesW',NULL,NULL,NULL,'default_avator.png','1',NULL,NULL,'2025-03-16 05:23:31','2025-03-16 05:23:31'),(2,'Just','Admin','','Admin','admin@admin.com','2025-03-16 05:23:31','$2y$10$E9EnvzDs7P2QekeWxmeiN.ihinr6TW7ENbLHJzTmtrRKQJkGDOhqO',NULL,NULL,NULL,'default_avator.png','1',NULL,NULL,'2025-03-16 05:23:31','2025-03-16 05:23:31'),(3,'Just','Writer','','Writer','writer@admin.com','2025-03-16 05:23:31','$2y$10$.HVdEsreY61SNCBVrYKul.Vdn1X6Nrckrch.iPA2hT/fHeiUySCtC',NULL,NULL,NULL,'default_avator.png','1',NULL,NULL,'2025-03-16 05:23:31','2025-03-16 05:23:31'),(4,'Just','User','','User','user@admin.com','2025-03-16 05:23:31','$2y$10$F/H9zs3JCyaD/DR3W/3rGOcs9kF5g8S7sZfcrY1tOXgiezndGjJFq',NULL,NULL,NULL,'default_avator.png','1',NULL,NULL,'2025-03-16 05:23:31','2025-03-16 05:23:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallet_transactions`
--

DROP TABLE IF EXISTS `wallet_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wallet_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `wallet_id` bigint unsigned DEFAULT NULL,
  `transaction_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '''sale'', ''expense'', ''adjustment''',
  `amount` decimal(10,0) DEFAULT '0',
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` smallint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wallet_transactions_wallets_FK` (`wallet_id`),
  CONSTRAINT `wallet_transactions_wallets_FK` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallet_transactions`
--

LOCK TABLES `wallet_transactions` WRITE;
/*!40000 ALTER TABLE `wallet_transactions` DISABLE KEYS */;
INSERT INTO `wallet_transactions` VALUES (1,1,'sale',45,'Sale ID: 1',NULL,'2025-03-18 12:15:35','2025-03-18 12:15:35',NULL,NULL);
/*!40000 ALTER TABLE `wallet_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wallets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `balance` decimal(10,0) DEFAULT '0',
  `created_by` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` smallint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallets`
--

LOCK TABLES `wallets` WRITE;
/*!40000 ALTER TABLE `wallets` DISABLE KEYS */;
INSERT INTO `wallets` VALUES (1,45,1,NULL,'2025-03-18 12:15:35',NULL,1);
/*!40000 ALTER TABLE `wallets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'onestopsoko'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-18 18:51:49
