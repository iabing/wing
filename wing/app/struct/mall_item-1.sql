CREATE TABLE `mall_item` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `store_id` INT(11) NOT NULL,
  `url` CHAR(255) NOT NULL,
  `type` CHAR(255) NOT NULL,
  `tag` CHAR(255) NOT NULL,
  `title` CHAR(255) NOT NULL,
  `value` DECIMAL(7, 2) NOT NULL,
  `price` DECIMAL(7, 2) NOT NULL,
  `thumbnail` CHAR(255) NOT NULL,
  `body` TEXT NOT NULL,
  PRIMARY KEY (`id`)
)