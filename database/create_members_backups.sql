-- Add missing table for member Excel export history (fixes "members_backups doesn't exist").
-- Run once on an existing database, for example:
--   mysql -u USER -p churchdb < database/create_members_backups.sql

SET NAMES utf8;

CREATE TABLE IF NOT EXISTS `members_backups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
