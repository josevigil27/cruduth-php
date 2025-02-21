/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `personas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL,
  `cedula` varchar(15) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `creado` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `creado` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `cedula`, `telefono`, `fecha_nac`, `creado`) VALUES
(1, 'Jose', 'Vigil', '0501200107919', '89682102', '2001-05-27', '2025-02-21');


INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `correo`, `usuario`, `password`, `creado`) VALUES
(1, 'Jose', 'Vigil', '89682102', 'jsntnvigil@gmail.com', 'correo@correo.com', '$2y$10$DOwW86TRkpCgbGa/WWHv0.9T.Tta/rZDNV4j7bi78ons/yRIQNMYi', '2025-02-21');
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `correo`, `usuario`, `password`, `creado`) VALUES
(2, 'Gabriel', 'Vigil', '89682103', 'gvigil18@gmail.com', 'gvigil18', '$2y$10$7sJUsSKU4FWOhGaEGknUg.aUyf6EgrnnHr.H22e1mPxU7yOSrM/He', '2025-02-21');
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `telefono`, `correo`, `usuario`, `password`, `creado`) VALUES
(3, 'Admin', 'Usuario', '00000000', 'admin@usuario.com', 'adminusuario', '$2y$10$GmjZxLSoo0VtCpGwHOz1Qe42ISb.r16GQynrmoe/nNtTcm1k9qEVm', '2025-02-21');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;