CREATE TABLE `mall_store` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` CHAR(255) NOT NULL,
  `url` CHAR(255) NOT NULL,
  `type` CHAR(255) NOT NULL,
  `tag` CHAR(255) NOT NULL,
  `tel` CHAR(255) NOT NULL,
  `addr` CHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
)