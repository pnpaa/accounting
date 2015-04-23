-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table pnpaa.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pnpaa.migrations: ~1 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`migration`, `batch`) VALUES
	('2014_10_21_043715_create_pnpa_tables', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table pnpaa.pna_committee
CREATE TABLE IF NOT EXISTS `pna_committee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `committee_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `committee_content` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_archived` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pnpaa.pna_committee: ~4 rows (approximately)
/*!40000 ALTER TABLE `pna_committee` DISABLE KEYS */;
REPLACE INTO `pna_committee` (`id`, `committee_title`, `committee_content`, `created_at`, `updated_at`, `is_archived`) VALUES
	(1, 'Fianance', 'Fianance', '2015-03-06 16:07:19', '0000-00-00 00:00:00', 0),
	(2, 'Environment', 'Environment', '2015-03-06 16:07:19', '0000-00-00 00:00:00', 0),
	(3, 'Information', 'Information', '2015-03-06 16:07:19', '0000-00-00 00:00:00', 0),
	(4, 'Education', 'Education', '2015-03-06 16:07:19', '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `pna_committee` ENABLE KEYS */;


-- Dumping structure for table pnpaa.pna_folders
CREATE TABLE IF NOT EXISTS `pna_folders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `folder_owner` int(11) NOT NULL DEFAULT '0',
  `folder_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_desc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pnpaa.pna_folders: ~0 rows (approximately)
/*!40000 ALTER TABLE `pna_folders` DISABLE KEYS */;
/*!40000 ALTER TABLE `pna_folders` ENABLE KEYS */;


-- Dumping structure for table pnpaa.pna_inquiry
CREATE TABLE IF NOT EXISTS `pna_inquiry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_archived` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pnpaa.pna_inquiry: ~0 rows (approximately)
/*!40000 ALTER TABLE `pna_inquiry` DISABLE KEYS */;
/*!40000 ALTER TABLE `pna_inquiry` ENABLE KEYS */;


-- Dumping structure for table pnpaa.pna_mail
CREATE TABLE IF NOT EXISTS `pna_mail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `thread` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recepient` int(11) NOT NULL DEFAULT '0',
  `sender` int(11) NOT NULL DEFAULT '0',
  `message` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_archived` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pnpaa.pna_mail: ~0 rows (approximately)
/*!40000 ALTER TABLE `pna_mail` DISABLE KEYS */;
/*!40000 ALTER TABLE `pna_mail` ENABLE KEYS */;


-- Dumping structure for table pnpaa.pna_roles
CREATE TABLE IF NOT EXISTS `pna_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pnpaa.pna_roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `pna_roles` DISABLE KEYS */;
REPLACE INTO `pna_roles` (`id`, `role_id`, `role_name`, `created_at`, `updated_at`) VALUES
	(1, 1, 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 2, 'alumni', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 3, 'cashier', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `pna_roles` ENABLE KEYS */;


-- Dumping structure for table pnpaa.pna_tasks
CREATE TABLE IF NOT EXISTS `pna_tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `task_title` text COLLATE utf8_unicode_ci,
  `task_content` text COLLATE utf8_unicode_ci,
  `task_due` datetime DEFAULT NULL,
  `task_setter` int(11) DEFAULT NULL,
  `task_status` int(11) NOT NULL DEFAULT '0',
  `task_assign` int(11) NOT NULL DEFAULT '0',
  `archived` int(11) NOT NULL DEFAULT '0',
  `task_group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seenzone` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_archived` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pnpaa.pna_tasks: ~0 rows (approximately)
/*!40000 ALTER TABLE `pna_tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `pna_tasks` ENABLE KEYS */;


-- Dumping structure for table pnpaa.pna_transactions
CREATE TABLE IF NOT EXISTS `pna_transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniq_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `transaction_setter` int(11) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_purpose` text COLLATE utf8_unicode_ci NOT NULL,
  `transaction_amount` decimal(10,2) NOT NULL,
  `is_archived` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pnpaa.pna_transactions: ~0 rows (approximately)
/*!40000 ALTER TABLE `pna_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `pna_transactions` ENABLE KEYS */;


-- Dumping structure for table pnpaa.pna_updates
CREATE TABLE IF NOT EXISTS `pna_updates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `update_title` text COLLATE utf8_unicode_ci,
  `update_content` text COLLATE utf8_unicode_ci,
  `update_start` datetime NOT NULL,
  `update_end` datetime NOT NULL,
  `update_allday` tinyint(4) NOT NULL DEFAULT '0',
  `update_setter` int(11) NOT NULL,
  `update_status` int(11) NOT NULL DEFAULT '0',
  `update_type` int(11) NOT NULL DEFAULT '0',
  `update_category` int(11) NOT NULL DEFAULT '0',
  `update_classname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seenzone` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_archived` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pnpaa.pna_updates: ~0 rows (approximately)
/*!40000 ALTER TABLE `pna_updates` DISABLE KEYS */;
/*!40000 ALTER TABLE `pna_updates` ENABLE KEYS */;


-- Dumping structure for table pnpaa.pna_updates_category
CREATE TABLE IF NOT EXISTS `pna_updates_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_setter` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_archived` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pnpaa.pna_updates_category: ~7 rows (approximately)
/*!40000 ALTER TABLE `pna_updates_category` DISABLE KEYS */;
REPLACE INTO `pna_updates_category` (`id`, `category_name`, `category_color`, `category_setter`, `created_at`, `updated_at`, `is_archived`) VALUES
	(1, 'Generic', '#00AEFF', 1, '2015-03-06 16:07:19', '0000-00-00 00:00:00', 0),
	(2, 'Home', '#FF2968', 1, '2015-03-06 16:07:19', '0000-00-00 00:00:00', 0),
	(3, 'Overtime', '#711A76', 1, '2015-03-06 16:07:19', '0000-00-00 00:00:00', 0),
	(4, 'Job', '#882F00', 1, '2015-03-06 16:07:19', '0000-00-00 00:00:00', 0),
	(5, ' Off-site work', '#44A703', 1, '2015-03-06 16:07:19', '0000-00-00 00:00:00', 0),
	(6, 'To Do', '#FF3B30', 1, '2015-03-06 16:07:19', '0000-00-00 00:00:00', 0),
	(7, 'Cancelled', '#E6C800', 1, '2015-03-06 16:07:19', '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `pna_updates_category` ENABLE KEYS */;


-- Dumping structure for table pnpaa.pna_users
CREATE TABLE IF NOT EXISTS `pna_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL,
  `committee` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maidden_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'M',
  `birth_date` date NOT NULL,
  `work` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_working` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_working_hours` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_working_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype_contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linked_contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yahoo_contact` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_about` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_1_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_2_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `batch` int(11) NOT NULL,
  `activated` int(11) NOT NULL DEFAULT '1',
  `is_archived` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pnpaa.pna_users: ~3 rows (approximately)
/*!40000 ALTER TABLE `pna_users` DISABLE KEYS */;
REPLACE INTO `pna_users` (`id`, `role`, `committee`, `username`, `password`, `remember_token`, `email`, `first_name`, `last_name`, `maidden_name`, `gender`, `birth_date`, `work`, `company_working`, `company_working_hours`, `company_working_address`, `permanent_address`, `current_address`, `phone_contact`, `skype_contact`, `facebook_contact`, `linked_contact`, `twitter_contact`, `google_contact`, `yahoo_contact`, `user_about`, `user_photo`, `question_1`, `question_1_key`, `question_2`, `question_2_key`, `batch`, `activated`, `is_archived`, `created_at`, `updated_at`) VALUES
	(1, 1, 0, 'asasdev', '$2y$10$QKjIJlHJQtHSverf.xBbd..iKwUGjsDIRhdfCqcic4jtOmL7Qsly6', '', 'asasdev@pnpaa.com', 'asas', 'dev', NULL, 'M', '0000-00-00', 'dev', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1+1?', '2', '2+2?', '4', 0, 1, 0, '2015-03-07 00:07:19', '2015-03-07 00:07:19'),
	(2, 2, 0, 'dumodev', '$2y$10$tbgTGVcr3cK8UjsY7FuWGuknGz0eqM32iRmD.AGbRFebSJ3yP4RTe', '', 'dumodev@pnpaa.com', 'dumo', 'dev', NULL, 'M', '0000-00-00', 'dev', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1+1?', '2', '2+2?', '4', 0, 1, 0, '2015-03-07 00:07:19', '2015-03-07 00:07:19'),
	(3, 3, 0, 'wewedev', '$2y$10$tqrjJhGLQi1KBkjM3xBAP.hELXIuIDzl0OOrOOyHcX.jNPSLRWZte', '', 'wewedev@pnpaa.com', 'wewe', 'dev', NULL, 'M', '0000-00-00', 'dev', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1+1?', '2', '2+2?', '4', 0, 1, 0, '2015-03-07 00:07:19', '2015-03-07 00:07:19');
/*!40000 ALTER TABLE `pna_users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
