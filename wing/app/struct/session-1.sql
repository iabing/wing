CREATE TABLE `session` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `useragent` CHAR(255) NULL,
  `time` CHAR(100) NULL,
  PRIMARY KEY (`id`)
)