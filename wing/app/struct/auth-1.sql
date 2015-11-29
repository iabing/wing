CREATE TABLE `auth` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `name` CHAR(100) NOT NULL,
  `auth` CHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
)