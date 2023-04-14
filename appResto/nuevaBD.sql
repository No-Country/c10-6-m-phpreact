SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
  `tipo` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `id_estado` tinyint UNSIGNED NOT NULL,
  `descripcion` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='estado pedidos';

INSERT INTO `estado` (`id`, `tipo`, `id_estado`, `descripcion`) VALUES
(1, 'pedido', 0, 'libre'),
(2, 'pedido', 1, 'pedido sin entregar'),
(3, 'pedido', 3, 'Pago en proceso medio digital'),
(4, 'pedido', 4, 'Pago efectuado'),
(5, 'pedido', 5, 'Anulado'),
(6, 'pedido', 6, 'Adeudado'),
(7, 'mesa', 20, 'libre'),
(8, 'mesa', 21, 'ocupada sin consumo'),
(9, 'mesa', 22, 'pedido efectuado pendiente'),
(10, 'mesa', 23, 'llamo mozo'),
(11, 'mesa', 24, 'pago en proceso medio digital'),
(12, 'mesa', 25, 'ocupada con pedidos pagos');

DROP TABLE IF EXISTS `mesas`;
CREATE TABLE IF NOT EXISTS `mesas` (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado_mesa` tinyint UNSIGNED NOT NULL COMMENT '0 - libre \r\n1 - iniciada s/pedido pendiente\r\n2 - pedido pediente\r\n3 - pedido mozo\r\n4 - proceso de pago / cierre\r\n5 - cerrada no libre\r\n',
  `pedidos` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `qr` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `mesas` (`id`, `estado_mesa`, `pedidos`, `qr`) VALUES
(1, 0, '', '/qr/mesa_1.png'),
(2, 0, '', '/qr/mesa_2.png'),
(3, 0, '', '/qr/mesa_3.png'),
(4, 0, '', '/qr/mesa_4.png');

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `mesa` tinyint UNSIGNED NOT NULL,
  `producto` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio` int NOT NULL,
  `descuento` tinyint UNSIGNED NOT NULL,
  `estado` int UNSIGNED NOT NULL COMMENT '0 - cobrado\r\n1 - activo sin entregar\r\n2 - activo entregado \r\n3 - proceso de pago\r\n4 - pagado\r\n5 - anulado\r\n6 - deuda\r\n',
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pedidos` (`id`, `mesa`, `producto`, `cantidad`, `precio`, `descuento`, `estado`, `creado`, `modificado`) VALUES
(1, 1, 1, 1, 750, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(2, 1, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(3, 1, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(4, 2, 1, 1, 750, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(5, 1, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(6, 2, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(7, 4, 1, 1, 750, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(8, 1, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(9, 5, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(10, 2, 1, 1, 750, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(11, 6, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '2023-04-11 23:01:50'),
(12, 2, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(13, 1, 1, 1, 750, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(14, 1, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(15, 1, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(16, 2, 1, 1, 750, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(17, 1, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(18, 2, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(19, 4, 1, 1, 750, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(20, 1, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(21, 5, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(22, 2, 1, 1, 750, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00'),
(23, 6, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '2023-04-11 23:01:50'),
(24, 2, 3, 1, 1300, 0, 1, '2023-04-11 15:06:43', '0000-00-00 00:00:00');

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precio` decimal(6,2) UNSIGNED NOT NULL,
  `descuento` tinyint UNSIGNED NOT NULL,
  `imagen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'url de imagen',
  `categoria` tinyint UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL COMMENT '0: desactivado\r\n1: activado',
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `productos` (`id`, `nombre_producto`, `descripcion`, `precio`, `descuento`, `imagen`, `categoria`, `estado`, `creado`) VALUES
(1, 'Milanesa a lo pobre', 'Milanesa de ternera, con 2 huevos  fritos, papas fritas doble', '2050.00', 1, 'productos/prod_1.jpg', 3, 0, '2023-03-29 11:19:49'),
(2, 'Coca Cola 1L', 'botella vidrio', '850.00', 1, 'productos/prod_2.jpg', 1, 0, '2023-03-29 11:23:45'),
(3, 'Lomito completo', 'pan frances, lomito con tomate, lechuga huevoy queso y papas fritas\r\ncomen 2', '1300.00', 1, 'productos/prod_3.jpg', 5, 0, '2023-03-29 11:27:48'),
(4, 'Milanesa voladora', 'Milanesa de Pollo, con 2 huevos  fritos, papas fritas doble', '1050.00', 1, 'productos/prod_4.jpg', 3, 0, '2023-03-29 11:19:49'),
(5, 'Cerveza 1L', 'botella vidrio', '950.00', 1, 'productos/prod_5.jpg', 1, 0, '2023-03-29 11:23:45'),
(6, 'Sandwich J y Q', 'pan frances, Jamon Queso Tomate', '1050.00', 1, 'productos/prod_6.jpg', 5, 0, '2023-03-29 11:27:48'),
(7, 'Flan casero', 'Flan casero con dulce leche o crema', '850.00', 1, 'productos/prod_7.jpg', 2, 0, '2023-03-29 11:19:49'),
(8, 'Cassata', 'helado 3 sabores', '650.00', 1, 'productos/prod_8.jpg', 2, 0, '2023-03-29 11:23:45'),
(9, 'Mixta', 'Tomate, Lechuga, Cebolla', '750.00', 1, 'productos/prod_9.jpg', 4, 0, '2023-03-29 11:27:48'),
(10, 'Waldorf', 'Ensalada, apio, nuez, queso duro y crema leche', '1200.00', 1, 'productos/prod_10.jpg', 4, 0, '2023-03-29 11:19:49'),
(11, 'Cerveza 350cm', 'Lata', '550.00', 1, 'productos/prod_11.jpg', 1, 0, '2023-03-29 11:23:45'),
(12, 'Sandwich Salame y Queso', 'pan frances, Salame Queso Tomate', '1050.00', 1, 'productos/prod_12.jpg', 5, 0, '2023-03-29 11:27:48');

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `mesa` tinyint UNSIGNED NOT NULL,
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
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nivel` tinyint UNSIGNED NOT NULL COMMENT '0: gerente\r\n1: admin\r\n2 : mozo',
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `user` (`id`, `nombre`, `apodo`, `pass`, `email`, `nivel`, `creado`) VALUES
(1, 'Joe Fuerte', 'JOSE', '1234', 'jose@gmail.com', 1, '2023-03-29 11:16:00'),
(2, 'Jose Perez', 'JOSE Perez', '1234', 'jose1@gmail.com', 1, '2023-03-29 11:16:00'),
(3, 'Natalia Gimenez', 'Nati', '1234', 'nati@gmail.com', 1, '2023-03-29 11:16:00'),
(4, 'Marcela Smitch', 'marce', '1234', 'marce@gmail.com', 1, '2023-03-29 11:16:00');

DROP TABLE IF EXISTS `user_control`;
CREATE TABLE IF NOT EXISTS `user_control` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` tinyint UNSIGNED NOT NULL COMMENT '0:logout\r\n1:login',
  `creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` tinyint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='control login user';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;