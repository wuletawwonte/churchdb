-- Local development: database + user for churchdb (CodeIgniter .env).
--
-- Run as MySQL admin, for example:
--   sudo mysql < database/setup_local.sql
-- or:
--   mysql -u root -p < database/setup_local.sql
--
-- Then import schema + sample data (optional):
--   mysql -u churchdb -pchurchdb_local churchdb < database/church.sql

CREATE DATABASE IF NOT EXISTS churchdb
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER IF NOT EXISTS 'churchdb'@'localhost' IDENTIFIED BY 'churchdb_local';
CREATE USER IF NOT EXISTS 'churchdb'@'127.0.0.1' IDENTIFIED BY 'churchdb_local';

GRANT ALL PRIVILEGES ON churchdb.* TO 'churchdb'@'localhost';
GRANT ALL PRIVILEGES ON churchdb.* TO 'churchdb'@'127.0.0.1';

FLUSH PRIVILEGES;
