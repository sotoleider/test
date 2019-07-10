

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prueba` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `prueba`;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `contraseña` varchar(100) CHARACTER SET armscii8 NOT NULL,
  `nombres` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `apellidos` varchar(255) COLLATE latin1_bin NOT NULL,
  `perfil` varchar(255) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`email`,`contraseña`,`nombres`,`apellidos`,`perfil`) values (1,'leidersoto.s@gmail.com','$2y$10$PtxZWCnmBkOKD.AA2YzfyumK09ZsE0YLOIzBQxGy9VHR7qLnb3T.m','leider andres','soto betin','Administrador'),(7,'daniel@metricaw.com','$2y$10$zVU3UDPqbDNBLEG369WPC.G2hgotGt0fhB/FNuTTzii.3jNg/TNEK','Daniel ','Castañeda ','Administrador');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
