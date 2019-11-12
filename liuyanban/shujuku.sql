/*
SQLyog Enterprise - MySQL GUI v6.15
MySQL - 5.0.45-community-nt : Database - messages
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `messages`;

USE `messages`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `adminId` int(11) NOT NULL auto_increment,
  `adminName` varchar(20) collate utf8_unicode_ci NOT NULL,
  `adminPwd` varchar(50) collate utf8_unicode_ci NOT NULL,
  `adminPhone` varchar(20) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`adminId`,`adminName`,`adminPwd`,`adminPhone`) values (1,'tom','123','');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `messageId` int(10) NOT NULL auto_increment,
  `author` varchar(20) collate utf8_unicode_ci NOT NULL,
  `title` varchar(100) collate utf8_unicode_ci NOT NULL,
  `content` varchar(500) collate utf8_unicode_ci NOT NULL,
  `face` char(10) collate utf8_unicode_ci default '1.gif',
  `reply` varchar(200) collate utf8_unicode_ci default NULL,
  `addTime` datetime default NULL,
  PRIMARY KEY  (`messageId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `message` */

insert  into `message`(`messageId`,`author`,`title`,`content`,`face`,`reply`,`addTime`) values (2,'jarry','喝了一杯咖啡','我一直认为,咖啡就要苦苦的,在品咖啡前先喝一口冰水,再慢慢的轻呷一口浓醇四溢的咖啡,然后细细的品味,你会发现,咖啡苦中带着酸、酸中带着柔、柔中带着醇、醇中带着甘......就像体会了人生的酸甜苦辣,心中五味杂陈。','1.gif','haha','2019-03-02 00:00:00'),(8,'美女','今天买了一个围巾','好看','22.gif',NULL,'2019-10-30 16:49:58'),(9,'美女','黄头发少年','123','1.gif',NULL,'2019-10-30 20:16:46'),(10,'dsadsa','dsadsa','dsadsa','1.gif',NULL,'2019-10-31 11:36:55'),(11,'wqewq','qwewqe','qwewqewq','1.gif',NULL,'2019-10-31 11:37:01'),(12,'fdasf','fdsafd','fadsfdsa','1.gif',NULL,'2019-10-31 16:36:55');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
