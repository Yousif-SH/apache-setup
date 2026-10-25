-- Adminer 4.8.1 MySQL 8.0.36-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `codes`;
CREATE TABLE `codes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `used` int NOT NULL COMMENT '0',
  `amount` double NOT NULL COMMENT '0',
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL UNIQUE,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);

INSERT INTO `users` (`email`, `name`, `password`, `role`, `amount`) VALUES
('alice@gmail.com',	'alice',	'd106b29303767527fc11214f1b325fb6',	'user',	2000),
('bob@gmail.com',	'bob',	'd106b29303767527fc11214f1b325fb6',	'user',	100),
('charlie@gmail.com',	'charlie',	'd106b29303767527fc11214f1b325fb6',	'admin',	900);

INSERT INTO `items` (`id`, `name`, `price`, `quantity`) VALUES
(1,	'apple',	1,	1),
(2,	'banana',	1,	1),
(3,	'orange',	1,	1),
(4,	'avacado',	1,	1);

-- 2024-02-20 08:52:54
-- users password is P@ssword1
