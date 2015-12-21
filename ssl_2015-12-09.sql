# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: ssl
# Generation Time: 2015-12-10 03:42:43 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table users101
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users101`;

CREATE TABLE `users101` (
  `userid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users101` WRITE;
/*!40000 ALTER TABLE `users101` DISABLE KEYS */;

INSERT INTO `users101` (`userid`, `username`, `password`, `avatar`)
VALUES
	(27,'Mark','f5898b9941c00795c6be18460acf243d','avatarnin.png'),
	(28,'Patrick','ce5c0f6a91439eb9380e7c33e967a54d','avatarnin.png'),
	(29,'Tom','2e00191db42a2d9f7dfe2bf56f0b4653','avatarnin.png'),
	(30,'Pat','b21bf682e04ddfe9453376c60e82589f','avatarnin.png'),
	(31,'p','321a1573adef5c97625e2ca85f27ce46','avatarnin.png'),
	(32,'Pat','b21bf682e04ddfe9453376c60e82589f','kapslock_logo-01.png');

/*!40000 ALTER TABLE `users101` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
