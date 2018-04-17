-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-04-2018 a las 18:35:25
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hanbai`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `precio` float DEFAULT '0',
  `fotografia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `fotografia`) VALUES
(1, 'Wok verduras/ternera', 20, '1.jpg'),
(2, 'Nachos', 45, '2.jpg'),
(3, 'Dulces', 15, '3.jpg'),
(4, 'Hamburguesas', 29, '4.jpg'),
(5, 'Ensalada pollo', 99, '5.jpg'),
(6, 'Tartaleta', 30, '6.jpg'),
(7, 'Bocadillos', 10, '7.jpg'),
(8, 'Sushi variado', 17, '8.jpg'),
(9, 'Wraps', 12, '9.jpg'),
(10, 'Ensalada', 5, '10.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

DROP TABLE IF EXISTS `resultados`;
CREATE TABLE IF NOT EXISTS `resultados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fechaCompra` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario` (`usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `usuario`, `total`, `fechaCompra`) VALUES
(21, 'Juan Antonio', '117.37', '2018-04-06 13:50:02'),
(20, 'Juan Antonio', '20.57', '2018-04-06 13:49:35'),
(19, 'Juan Antonio', '181.50', '2018-04-06 13:47:54'),
(18, 'Juan Antonio', '108.90', '2018-04-06 13:21:23'),
(22, 'Juan Antonio', '162.14', '2018-04-07 07:48:37'),
(23, 'Juan Antonio', '105.27', '2018-04-07 17:25:33'),
(24, 'Juan Antonio', '152.46', '2018-04-07 17:30:04'),
(25, 'Juan Antonio', '24.20', '2018-04-07 17:34:59'),
(28, 'Miguelito', '180.29', '2018-04-07 18:05:54'),
(27, 'Juan Antonio', '61.71', '2018-04-07 17:36:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `estado` int(8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `estado`) VALUES
(31, 'Demo', 'demo@demo.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 1),
(29, 'Miguel', 'miguel@hotmail.com', '6aef2943ac9981593380d9088d28405c', 1),
(25, 'Juan Antonio', 'masini2002@hotmail.com', '6aef2943ac9981593380d9088d28405c', 1),
(32, 'Miguelito', 'miguelito@hotmail.com', '6aef2943ac9981593380d9088d28405c', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
