/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - hackathon
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hackathon` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `hackathon`;

/*Table structure for table `tbl_analysis_data` */

DROP TABLE IF EXISTS `tbl_analysis_data`;

CREATE TABLE `tbl_analysis_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(1) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_analysis_data` */

insert  into `tbl_analysis_data`(`id`,`value`,`username`) values 
(1,-1,NULL),
(2,0,NULL),
(3,1,NULL),
(4,0,NULL),
(5,1,NULL),
(6,-1,NULL),
(7,-1,NULL),
(8,0,NULL),
(9,-1,NULL),
(10,-1,NULL),
(11,0,NULL),
(12,0,NULL),
(13,0,NULL),
(14,0,NULL),
(15,0,NULL),
(16,0,NULL),
(17,-1,NULL),
(18,0,NULL),
(19,0,NULL),
(20,-1,NULL),
(21,1,NULL),
(22,1,'pritam_640'),
(23,-1,'pritam_640'),
(24,-1,'pritam_640'),
(25,1,'pritam_640'),
(26,0,'pritam_640');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`username`,`password`,`email`) values 
(1,'pritam_640','12345678','pritamroy16062003@gmail.com'),
(2,'pritam_640','12345678','pritamroy16062003@gmail.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
