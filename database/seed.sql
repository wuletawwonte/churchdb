-- ChurchDB seed data (DML only)
-- Run after database/schema.sql on an empty schema, or to reset demo data.
--
--   mysql -u USER -p churchdb < database/seed.sql
--
-- Default login: username  admin   password  123456   (MD5 as stored in DB)
-- Change the password immediately in production.

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE TABLE `group_members`;
TRUNCATE TABLE `notes`;
TRUNCATE TABLE `payments`;
TRUNCATE TABLE `timelines`;
TRUNCATE TABLE `members`;
TRUNCATE TABLE `groups`;
TRUNCATE TABLE `users`;
TRUNCATE TABLE `menders`;
TRUNCATE TABLE `kebeles`;
TRUNCATE TABLE `kifle_ketemas`;
TRUNCATE TABLE `ministries`;
TRUNCATE TABLE `membership_levels`;
TRUNCATE TABLE `membership_causes`;
TRUNCATE TABLE `job_types`;
TRUNCATE TABLE `age_groups`;
TRUNCATE TABLE `cnfg`;

SET FOREIGN_KEY_CHECKS = 1;

-- Application settings (read by Cnfg model / login)
INSERT INTO `cnfg` (`name`, `value`) VALUES
('system_name', 'ChurchDB'),
('system_name_short', 'CDB'),
('default_password', '123456'),
('church_name', 'የአርባምንጭ እናት መካነ ኢየሱስ ቤተክርስቲያን');

-- Age bands (member forms / reports)
INSERT INTO `age_groups` (`age_group_name`, `start_age`, `end_age`) VALUES
('ህፃን', 0, 14),
('ወጣት', 14, 30),
('ጎልማሳ', 30, 45),
('አዋቂ', 45, 60),
('ሽማግሌ', 60, 130);

-- Employment types (members.job_type references job_type_id)
INSERT INTO `job_types` (`job_type_title`) VALUES
('አልተመረጠም'),
('የመንግስት ሥራ'),
('ነጋዴ'),
('መንግስታዊ ያልሆነ ድርጅት'),
('የግል ሥራ'),
('የቤት እመቤት');

-- Sub-cities and kebeles (address dropdowns)
INSERT INTO `kifle_ketemas` (`kifle_ketema_title`) VALUES
('ነጭ ሳር'),
('ሲቄላ'),
('ሴቻ'),
('ልማት'),
('አባያ');

INSERT INTO `kebeles` (`kebele_title`, `kifle_ketema_title`) VALUES
('ዕድገት በር', 'ነጭ ሳር'),
('ጉርባ', 'ነጭ ሳር'),
('ወዜ', 'ሲቄላ'),
('ውሀ ምንጭ', 'ነጭ ሳር'),
('መናሔርያ', 'ሲቄላ'),
('ኩልፎ', 'አባያ');

INSERT INTO `menders` (`mender_title`, `kebele_title`) VALUES
('ሆስፒታል', 'ዕድገት በር'),
('ኮንሶ', 'ወዜ'),
('ካባ', 'ዕድገት በር'),
('ተሀድሶ', 'ዕድገት በር'),
('ኮንሶ', 'ዕድገት በር'),
('ቴሌ', 'ውሀ ምንጭ'),
('ቶታ', 'ውሀ ምንጭ'),
('ፍርድ ቤት ', 'መናሔርያ'),
('ጣቢያ', 'ኩልፎ'),
('ሚካኤል', 'ኩልፎ');

-- How members joined
INSERT INTO `membership_causes` (`membership_cause_title`) VALUES
('በጥምቀት'),
('በእምነት ማጽኛ ትምህርት'),
('ከሌላ መ/ኢ/ማ/ም በዝውውር'),
('ከሌላ ወ/አ/ክርስቲያናት በመምጣት ');

-- Membership level labels
INSERT INTO `membership_levels` (`membership_level_title`) VALUES
('የሙከራ ደረጃ'),
('ቆራቢ አባል'),
('የደቀ መዝሙር ትምህርት ተማሪ'),
('የእምነት ማፅኛ ትምህርት ተማሪ');

-- Ministry / service roles
INSERT INTO `ministries` (`ministry_title`) VALUES
('አያገለግሉም'),
('አስተናጋጅ'),
('ኳየር'),
('አስተዳደር'),
('ወንጌላዊ'),
('ቄስ');

-- users.id is NOT AUTO_INCREMENT in schema — fixed primary key for bootstrap admin
-- password = MD5('123456')
INSERT INTO `users` (
  `id`, `firstname`, `lastname`, `username`, `password`, `user_type`,
  `p_register_member`, `p_edit_member`, `p_delete_member`,
  `p_manage_form`, `p_manage_group`, `p_generate_member_report`,
  `login_count`, `last_login`, `profile_picture`, `modified`
) VALUES (
  1,
  'Admin',
  'User',
  'admin',
  'e10adc3949ba59abbe56e057f20f883e',
  'ዋና የሲስተም አስተዳደር',
  '0', '0', '0', '0', '0', '0',
  0,
  NULL,
  NULL,
  NULL
);

-- Sample members (job_type = 1 = አልተመረጠም)
INSERT INTO `members` (
  `title`, `firstname`, `middlename`, `lastname`, `gender`,
  `kifle_ketema`, `kebele`, `mender`,
  `house_number`, `home_phone`, `level_of_education`, `field_of_study`,
  `job_type`, `monthly_income`, `workplace_name`, `workplace_phone`,
  `mobile_phone`, `email`, `birthdate`, `hide_age`, `birth_place`,
  `membership_year`, `membership_cause`, `membership_level`, `ministry`,
  `marital_status`, `spouse`, `avatar`, `profile_color`, `status`, `status_remark`
) VALUES
(
  '', 'አብርሃም', 'ለማ', 'ተክለ', 'ወንድ',
  'ነጭ ሳር', 'ዕድገት በር', NULL,
  '', '', 'አልተመረጠም', '',
  1, NULL, '', '',
  '0912345678', 'abreham@example.com', '1990-01-15', NULL, 'አርባምንጭ',
  2010, 'በጥምቀት', NULL, 'ኳየር',
  'አልተመረጠም', NULL, NULL, '#00a65a', 'ያለ', ''
),
(
  '', 'ሳራ', 'ምንጊዜው', 'ወልደ', 'ሴት',
  'ሲቄላ', 'ወዜ', NULL,
  '', '', 'አልተመረጠም', '',
  1, NULL, '', '',
  '0922345678', 'sara@example.com', '1992-05-20', NULL, 'አርባምንጭ',
  2012, 'በጥምቀት', NULL, 'አስተናጋጅ',
  'አልተመረጠም', NULL, NULL, '#3c8dbc', 'ያለ', ''
);

-- Sample group and memberships (gid / member ids start at 1 after truncate)
INSERT INTO `groups` (`name`, `type`) VALUES
('የወንጌል አገልግሎት', 'የአገልግሎት ቡድን');

INSERT INTO `group_members` (`group_id`, `member_id`, `role`) VALUES
(1, 1, 'መሪ'),
(1, 2, 'አባል');
