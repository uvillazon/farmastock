-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-01-2014 a las 20:32:56
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

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
  `id_empleado` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `apellidos` varchar(11) NOT NULL,
  `direccion` varchar(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `nombre_login` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `repetcontraseña` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `nombre_login`, `contrasena`, `repetcontraseña`, `email`) VALUES
(1, 53277112, 'pedro', 'navarro', 'guadiana', 0, 'pedro', 'pedro', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `entrega` varchar(2) NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `stock` int(11) NOT NULL,
  UNIQUE KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(11) NOT NULL,
  `direccion` varchar(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_producto`
--

CREATE TABLE IF NOT EXISTS `proveedor_producto` (
  `id_proveedor` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `id_emple` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` int(4) NOT NULL,
  `ventdiaria` int(11) NOT NULL,
  `ventsemanal` int(11) NOT NULL,
  `ventmensual` int(11) NOT NULL,
  UNIQUE KEY `id_emple` (`id_emple`,`id_product`),
  KEY `id_product` (`id_product`)
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
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_emple`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
