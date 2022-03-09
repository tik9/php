
DROP TABLE IF EXISTS `todo`;

CREATE TABLE `todo` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` varchar(255) not null,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `todo` DISABLE KEYS */;
INSERT INTO `todo` VALUES (1,'Item first','My first important item'),(2,'Clean the house','today No easy todo, but I will manage.'),(3,'Todo Nr. 2 is here','I have to fetch bread - bread is out.');

