SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `resto_nocountry` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `resto_nocountry`;

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `categoria` (`id`, `categoria`, `creado`) VALUES
(1, 'BEBIDAS', '2023-03-29 11:20:50'),
(2, 'POSTRES', '2023-03-29 11:21:04'),
(3, 'MINUTAS', '2023-03-29 11:21:40'),
(4, 'ENSALADAS', '2023-03-29 11:21:40'),
(5, 'EMPAREDADOS', '2023-03-29 11:22:03');

DROP TABLE IF EXISTS `descuento`;
CREATE TABLE IF NOT EXISTS `descuento` (
  `id_descuento` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `descuento` int UNSIGNED NOT NULL,
  `descripcion` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_caducidad` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_descuento`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `descuento` (`id_descuento`, `descuento`, `descripcion`, `fecha_caducidad`, `activo`) VALUES
(1, 20, 'descuento pago efectivo', '2050-03-31 11:31:05', 1);

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='estado pedidos';

INSERT INTO `estado` (`id`, `descripcion`) VALUES
(1, 'libre'),
(2, 'cobrada'),
(3, 'llamar mozo');

DROP TABLE IF EXISTS `mesas`;
CREATE TABLE IF NOT EXISTS `mesas` (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado_mesa` tinyint UNSIGNED NOT NULL COMMENT '1-libre / cerrada /cobrada\r\n2- iniciada\r\n3 pedido mozo/ cobro\r\n',
  `qr` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `mesas` (`id`, `estado_mesa`, `qr`) VALUES
(1, 0, '/qr/mesa_1.png');

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `mesa` tinyint UNSIGNED NOT NULL,
  `detalle` json NOT NULL,
  `importe_total` decimal(9,2) UNSIGNED NOT NULL,
  `descuento` tinyint UNSIGNED NOT NULL,
  `estado` int UNSIGNED NOT NULL COMMENT '0 - cerrado-cobrado\r\n 1 activo-sin pagar\r\n 2 - activo-en-proceso-de-pago',
  `cliente` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cerrado` datetime NOT NULL,
  `observacion` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precio` decimal(6,2) UNSIGNED NOT NULL,
  `descuento` tinyint UNSIGNED NOT NULL,
  `imagen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'url de imagen',
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoria` tinyint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `productos` (`id`, `nombre_producto`, `descripcion`, `precio`, `descuento`, `imagen`, `creado`, `categoria`) VALUES
(1, 'Milanesa a lo pobre', 'Milanesa de ternera, con 2 huevos  fritos, papas fritas doble', '1050.00', 1, 'productos/prod_1.jpg', '2023-03-29 11:19:49', 3),
(2, 'Coca Cola 1L', 'botella vidrio', '0.00', 1, 'productos/prod_2.jpg', '2023-03-29 11:23:45', 1),
(3, 'Lomito completo', 'pan frances, lomito con tomate, lechuga huevoy queso y papas fritas\r\ncomen 2', '1300.00', 1, 'productos/prod_3.jpg', '2023-03-29 11:27:48', 5);

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `pedido` int UNSIGNED NOT NULL,
  `monto` double(9,2) NOT NULL,
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apodo` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nivel` tinyint UNSIGNED NOT NULL,
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `user` (`id`, `nombre`, `apodo`, `pass`, `email`, `nivel`, `creado`) VALUES
(1, 'Joe Fuerte', 'JOSE', '1234', 'jose@gmial.com', 2, '2023-03-29 11:16:00');

DROP TABLE IF EXISTS `user_control`;
CREATE TABLE IF NOT EXISTS `user_control` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` tinyint UNSIGNED NOT NULL COMMENT '0:logout\r\n1:login',
  `creado` datetime NOT NULL,
  `user` tinyint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='control login user';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
