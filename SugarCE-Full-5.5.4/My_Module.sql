-- --------------------------------------------------------
-- Table structure for table `my_module`
-- --------------------------------------------------------
CREATE TABLE `my_module` (
	`id` CHAR(36) NOT NULL,
	`id_AS` VARCHAR(36) DEFAULT NULL,
	`name` VARCHAR(255) NOT NULL,
	`date_entered` DATETIME DEFAULT NULL,
	`date_modified` DATETIME DEFAULT NULL,
	`modified_user_id` CHAR(36) DEFAULT NULL,
	`created_by` CHAR(36) DEFAULT NULL,
	`deleted` TINYINT(1) DEFAULT '0',
	`assigned_user_id` CHAR(36) DEFAULT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
