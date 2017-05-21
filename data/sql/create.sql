-- ALTER TABLE `Articles` DROP FOREIGN KEY `Articles_fk0`;
-- ALTER TABLE `tags` DROP FOREIGN KEY `tags_fk0`;
-- DROP TABLE IF EXISTS `Articles`;
-- DROP TABLE IF EXISTS `user_meta`;
-- DROP TABLE IF EXISTS `tags`;
-- DROP TABLE IF EXISTS `type`;

CREATE TABLE `articles` (
  `art_id`        INT             NOT NULL AUTO_INCREMENT,
  `type`          VARCHAR(7)      NOT NULL,
  `title`         VARCHAR(50)     NOT NULL,
  `content`       VARCHAR(350)    NOT NULL,
  `author`        VARCHAR(7)      NOT NULL,
  `header_image`  VARCHAR(250)    NOT NULL,
  `date`          DATE            NOT NULL,
  `time`          TIME            NOT NULL,
  PRIMARY KEY (`art_id`)
);

CREATE TABLE `user_meta` (
  `usr_id`        INT             NOT NULL AUTO_INCREMENT,
  `ip`            VARCHAR(15)     NOT NULL DEFAULT '0.0.0.0',
  `agent`         VARCHAR(256),
  `timestamp`     TIMESTAMP       NOT NULL,
  PRIMARY KEY (`usr_id`)
);

CREATE TABLE `tags` (
  `tag_id`        INT             NOT NULL AUTO_INCREMENT,
  `art_id`        INT             NOT NULL,
  `tag_name`      VARCHAR(30)     NOT NULL,
  `tag_type`      VARCHAR(30)     NOT NULL,
  PRIMARY KEY (`tag_id`)
);

ALTER TABLE `tags` ADD CONSTRAINT `tags_fk0` FOREIGN KEY (`art_id`) REFERENCES `Articles`(`art_id`);