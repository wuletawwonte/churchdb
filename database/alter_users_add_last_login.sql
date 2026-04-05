-- Optional: add last_login if you use an older dump (e.g. database/church.sql) and want the column.
--   mysql -u ... churchdb < database/alter_users_add_last_login.sql

ALTER TABLE `users`
  ADD COLUMN `last_login` timestamp NULL DEFAULT NULL AFTER `login_count`;
