/*
 Navicat Premium Data Transfer

 Source Server         : portal
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : sugarcrm3

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 24/12/2020 22:07:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for custom_module_1
-- ----------------------------
DROP TABLE IF EXISTS `custom_module_1`;
CREATE TABLE `custom_module_1`  (
  `id` char(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_AS` varchar(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_entered` datetime(0) DEFAULT NULL,
  `date_modified` datetime(0) DEFAULT NULL,
  `modified_user_id` char(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` char(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `assigned_user_id` char(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` enum('New','In Progress','Resolved') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `internal_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `reason` enum('Bug','User Error','New Requirement') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
