ALTER TABLE `Articles` DROP FOREIGN KEY `Articles_fk0`;

ALTER TABLE `tags` DROP FOREIGN KEY `tags_fk0`;

DROP TABLE IF EXISTS `Articles`;

DROP TABLE IF EXISTS `user_meta`;

DROP TABLE IF EXISTS `tags`;

DROP TABLE IF EXISTS `type`;

