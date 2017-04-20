-- ALTER TABLE `Articles` DROP FOREIGN KEY `Articles_fk0`;
-- ALTER TABLE `tags` DROP FOREIGN KEY `tags_fk0`;
-- DROP TABLE IF EXISTS `Articles`;
-- DROP TABLE IF EXISTS `user_meta`;
-- DROP TABLE IF EXISTS `tags`;
-- DROP TABLE IF EXISTS `type`;

CREATE TABLE `Articles` (
	`art_id` varchar(7) NOT NULL,
	`typ_id` varchar(7) NOT NULL,
	`title` varchar(50) NOT NULL,
	`subtitle` varchar(50) NOT NULL,
	`content` varchar(350) NOT NULL,
	`author` varchar(7) NOT NULL,
	`header_image` varchar NOT NULL,
	`date` DATE NOT NULL,
	`time` TIME NOT NULL,
	PRIMARY KEY (`art_id`)
);

CREATE TABLE `user_meta` (
	`usr_id` varchar(7) NOT NULL,
	`ip` varchar(15) NOT NULL DEFAULT '0.0.0.0',
	`agent` varchar(256),
	`timestamp` TIMESTAMP NOT NULL,
	PRIMARY KEY (`usr_id`)
);

CREATE TABLE `tags` (
	`tag_id` varchar(7) NOT NULL,
	`blog_id` varchar(7) NOT NULL,
	`tag_name` varchar(30) NOT NULL,
	`tag_type` varchar(30) NOT NULL,
	PRIMARY KEY (`tag_id`)
);

CREATE TABLE `type` (
	`typ_id` varchar(7) NOT NULL,
	`type` varchar(7) NOT NULL DEFAULT 'project',
	PRIMARY KEY (`typ_id`)
);

ALTER TABLE `Articles` ADD CONSTRAINT `Articles_fk0` FOREIGN KEY (`typ_id`) REFERENCES `type`(`typ_id`);

ALTER TABLE `tags` ADD CONSTRAINT `tags_fk0` FOREIGN KEY (`blog_id`) REFERENCES `Articles`(`art_id`);

