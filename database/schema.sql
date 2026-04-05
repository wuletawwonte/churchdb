-- ChurchDB database schema (DDL only)
-- Generated from database/mybackup.txt — structure without seed/data rows.
-- Import: mysql -u USER -p DATABASE < database/schema.sql

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

#
# TABLE STRUCTURE FOR: age_groups
#

DROP TABLE IF EXISTS `age_groups`;

CREATE TABLE `age_groups` (
  `ag_id` int NOT NULL AUTO_INCREMENT,
  `age_group_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `start_age` int NOT NULL,
  `end_age` int NOT NULL,
  PRIMARY KEY (`ag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: cnfg
#

DROP TABLE IF EXISTS `cnfg`;

CREATE TABLE `cnfg` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: group_members
#

DROP TABLE IF EXISTS `group_members`;

CREATE TABLE `group_members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `group_id` int NOT NULL,
  `member_id` int NOT NULL,
  `role` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: groups
#

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `gid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: job_types
#

DROP TABLE IF EXISTS `job_types`;

CREATE TABLE `job_types` (
  `job_type_id` int NOT NULL AUTO_INCREMENT,
  `job_type_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`job_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: kebeles
#

DROP TABLE IF EXISTS `kebeles`;

CREATE TABLE `kebeles` (
  `kebele_id` int NOT NULL AUTO_INCREMENT,
  `kebele_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kifle_ketema_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`kebele_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: kifle_ketemas
#

DROP TABLE IF EXISTS `kifle_ketemas`;

CREATE TABLE `kifle_ketemas` (
  `kifle_ketema_id` int NOT NULL AUTO_INCREMENT,
  `kifle_ketema_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`kifle_ketema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: members
#

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `kifle_ketema` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `kebele` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `mender` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `house_number` varchar(10) NOT NULL,
  `home_phone` varchar(15) NOT NULL,
  `level_of_education` varchar(50) NOT NULL DEFAULT 'አልተመረጠም',
  `field_of_study` varchar(100) NOT NULL,
  `job_type` int NOT NULL,
  `monthly_income` int DEFAULT NULL,
  `workplace_name` varchar(50) NOT NULL,
  `workplace_phone` varchar(50) NOT NULL,
  `mobile_phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `hide_age` tinyint(1) DEFAULT NULL,
  `birth_place` varchar(50) NOT NULL,
  `membership_year` int DEFAULT NULL,
  `membership_cause` varchar(50) DEFAULT NULL,
  `membership_level` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `ministry` varchar(50) DEFAULT NULL,
  `marital_status` varchar(50) NOT NULL,
  `spouse` int DEFAULT NULL,
  `avatar` text,
  `profile_color` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ያለ',
  `status_remark` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: membership_causes
#

DROP TABLE IF EXISTS `membership_causes`;

CREATE TABLE `membership_causes` (
  `membership_cause_id` int NOT NULL AUTO_INCREMENT,
  `membership_cause_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`membership_cause_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: membership_levels
#

DROP TABLE IF EXISTS `membership_levels`;

CREATE TABLE `membership_levels` (
  `membership_level_id` int NOT NULL AUTO_INCREMENT,
  `membership_level_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`membership_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: menders
#

DROP TABLE IF EXISTS `menders`;

CREATE TABLE `menders` (
  `mender_id` int NOT NULL AUTO_INCREMENT,
  `mender_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kebele_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`mender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: ministries
#

DROP TABLE IF EXISTS `ministries`;

CREATE TABLE `ministries` (
  `ministry_id` int NOT NULL AUTO_INCREMENT,
  `ministry_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ministry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: notes
#

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `note_id` int NOT NULL,
  `member_id` int NOT NULL,
  `note_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: payments
#

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `member_id` int NOT NULL,
  `payment_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `payment_amount` int NOT NULL,
  `date_issued` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: timelines
#

DROP TABLE IF EXISTS `timelines`;

CREATE TABLE `timelines` (
  `id` int NOT NULL,
  `by_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `change_occured` varchar(50) NOT NULL,
  `member_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `p_register_member` varchar(10) DEFAULT NULL,
  `p_edit_member` varchar(10) DEFAULT NULL,
  `p_delete_member` varchar(10) DEFAULT NULL,
  `p_manage_form` varchar(10) DEFAULT NULL,
  `p_manage_group` varchar(10) DEFAULT NULL,
  `p_generate_member_report` varchar(10) DEFAULT NULL,
  `login_count` int NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `profile_picture` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;
