-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-02-2014 a las 16:56:40
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `farma_stock`
--
CREATE DATABASE IF NOT EXISTS `farma_stock` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `farma_stock`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidad`
--

CREATE TABLE IF NOT EXISTS `cantidad` (
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  KEY `id_pedido` (`id_pedido`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `dni` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `apellidos` varchar(11) NOT NULL,
  `direccion` varchar(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `nombre_login` varchar(20) NOT NULL,
  `contrasena` varchar(64) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `nombre_login`, `contrasena`, `email`) VALUES
(1, 8888997, 'Antonio', 'Molina Ruiz', 'Segura de L', 655853741, 'toniadmin', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'chiripa1992@gmail.co'),
(2, 8741236, 'Pedro', 'Navarro', 'Bollullos', 698741236, 'pedroadmin', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'montygas@gmail.com'),
(3, 2147483647, 'Ramon', 'Moya', 'Sevilla', 652314789, 'ramonadmin', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'ramon200390@gmail.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `Cantidad` varchar(2) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_empleado` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_empleado`, `fecha`, `Cantidad`) VALUES
(1, 1, '2014-01-21', '16'),
(2, 1, '2014-01-22', '24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  UNIQUE KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `stock`) VALUES
(1, 'Aspirina', 10),
(2, 'Termometro', 4),
(3, 'Hemoal', 3),
(4, 'Pañales', 6),
(5, 'Durex Sensitive', 12),
(6, 'Potito tern', 5),
(7, 'Biberones', 10),
(8, 'Reflex', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(11) NOT NULL,
  `direccion` varchar(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `direccion`, `telefono`, `email`) VALUES
(1, 'Bayer', 'Madrid', 902368741, 'bayer@info.net'),
(2, 'Amazon', 'Madrid', 902698532, 'amazon@info.net'),
(3, 'Vademecum', 'Barcelona', 907789412, 'vademecum@info.net'),
(4, 'Dodot', 'Valencia', 903741258, ''),
(5, 'Durex', 'Alemania', 2147483647, ''),
(6, 'Hero Baby', 'Sevilla', 955874123, ''),
(7, 'Biberones H', 'Madrid', 902485796, ''),
(8, 'Vitazita', 'Italia', 2147483647, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_producto`
--

CREATE TABLE IF NOT EXISTS `proveedor_producto` (
  `id_proveedor` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  KEY `id_proveedor` (`id_proveedor`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `id_empleado` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(4) NOT NULL,
  UNIQUE KEY `id_emple` (`id_empleado`,`id_producto`),
  KEY `id_product` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cantidad`
--
ALTER TABLE `cantidad`
  ADD CONSTRAINT `cantidad_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cantidad_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`);

--
-- Filtros para la tabla `proveedor_producto`
--
ALTER TABLE `proveedor_producto`
  ADD CONSTRAINT `proveedor_producto_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proveedor_producto_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
