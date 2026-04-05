-- Fix: "Unknown database 'churchdb'"
-- Run as MySQL administrator (creates DB + ensures app user can use it):
--   sudo mysql < database/create_database_only.sql
-- or:
--   mysql -u root -p < database/create_database_only.sql
--
-- Then load tables (optional):
--   mysql -u churchdb -pchurchdb_local churchdb < database/church.sql

CREATE DATABASE IF NOT EXISTS churchdb
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

GRANT ALL PRIVILEGES ON churchdb.* TO 'churchdb'@'localhost';
GRANT ALL PRIVILEGES ON churchdb.* TO 'churchdb'@'127.0.0.1';
FLUSH PRIVILEGES;
