CREATE TABLE `user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `weixin_id` CHAR(100) NULL,
  `phone` CHAR(100) NULL,
  `email` CHAR(100) NULL,
  `password` CHAR(100) NOT NULL,
  `nick` CHAR(100) NULL,
  `gender` CHAR(100) NULL,
  `age` INT(2) NULL,
  `addr` CHAR(255) NULL,
  PRIMARY KEY (`id`)
)