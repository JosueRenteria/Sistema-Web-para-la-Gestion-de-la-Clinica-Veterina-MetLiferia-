/*
SQLyog Community v12.2.0 (64 bit)
MySQL - 10.4.21-MariaDB : Database - sem20221
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sem20221` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sem20221`;

/*Table structure for table `alumno` */

DROP TABLE IF EXISTS `alumno`;

CREATE TABLE `alumno` (
  `boleta` varchar(10) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `primerApe` varchar(64) NOT NULL,
  `segundoApe` varchar(64) DEFAULT NULL,
  `correo` varchar(128) DEFAULT NULL,
  `telcel` varchar(16) DEFAULT NULL,
  `contrasena` varchar(32) NOT NULL,
  `auditoria` datetime DEFAULT NULL,
  PRIMARY KEY (`boleta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `alumno` */

insert  into `alumno`(`boleta`,`nombre`,`primerApe`,`segundoApe`,`correo`,`telcel`,`contrasena`,`auditoria`) values 
('2021630001','Juan','Pérez','Pérez','juan@juan.com','5512345678','d8578edf8458ce06fbc5bb76a58c5ca4','2021-11-18 13:17:25'),
('2021630002','Luis','López','López','luis@luis.com','5587654321','d8578edf8458ce06fbc5bb76a58c5ca4','2021-11-18 13:17:57'),
('2021630003','Maria','Mendez','Mendez','maria@maria.com','5524681012','d8578edf8458ce06fbc5bb76a58c5ca4','2021-11-18 13:46:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
