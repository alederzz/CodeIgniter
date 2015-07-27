-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2015 a las 03:20:24
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ci_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`id` int(150) NOT NULL,
  `tipo_persona` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_doc` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `nro_documento` int(150) unsigned NOT NULL,
  `razon_social` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(150) NOT NULL,
  `celular` int(150) NOT NULL,
  `representante` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `localidad` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `tienda` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `tipo_persona`, `tipo_doc`, `nro_documento`, `razon_social`, `direccion`, `email`, `telefono`, `celular`, `representante`, `localidad`, `tienda`) VALUES
(1, 'Juridico', 'RUC', 1073061479, 'Desarrollo de Softawre y Sitios Web SAC', 'AV Lima 180 stand 50 - Lima Lima', 'gerencia@gerencia.com', 1234654, 989456321, 'Renzo Carlos', 'Lima - Lima', 'Tienda 1'),
(2, 'Natural', 'RUC', 1009104942, 'Creaciones y Diseños Pepito EIRL', 'Av. Los Olvidados de Dios 440 - Lima - Lima', 'ventas@creacionesp.com', 4567984, 987654312, 'Pepito Vargas', 'Lima - Lima', 'Global'),
(110, 'juridico', '', 4294967295, 'Prueba Final', 'Av. Bolivia 180 lima', 'ikarus_94@hotmail.com', 45465456, 954789123, 'dsafasdfdsaf', 'dsafdsfadsf', 'tienda1'),
(111, 'juridico', 'RUC', 4294967295, 'FIna Final', 'Av. Bolivia 180 lima', 'email_e@asd.com', 2147483647, 12365498, 'Abecedario', 'asdfdasfdsa', 'tienda1'),
(112, 'natural', 'RUC', 73061647, 'Agencia Uando', 'Av. Huaylas 744', 'ale.derzz@outlook.com', 0, 975, 'Renzo Carlos Castañeda', 'Chorrillos - Lima - Lima', 'tienda1'),
(113, 'juridico', 'RUC', 73061647, 'ZTa Ceces Oca', 'Av. Puno 457', 'asdsaddsa@safsad.com', 0, 987, 'Renzo Carlos Castañeda', 'Lima - Lima', 'tienda2'),
(114, 'juridico', 'RUC', 789546213, 'Xyz ozner', 'Av. Calle Ocho 450', 'email_e@asd.com', 0, 465, 'dsafdsafds', 'Lima - Lima', 'global');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE IF NOT EXISTS `facturacion` (
  `id_factura` int(9) unsigned zerofill NOT NULL,
  `id_cliente` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `serie` int(3) unsigned zerofill NOT NULL,
  `correlativo` int(6) unsigned zerofill NOT NULL,
  `moneda` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `monto` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`id_factura`, `id_cliente`, `serie`, `correlativo`, `moneda`, `monto`, `fecha`) VALUES
(001000001, '1', 001, 000001, 'soles', '50.00', '26/07/2015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id_factura` int(9) unsigned zerofill NOT NULL,
  `id_producto` int(11) unsigned zerofill NOT NULL,
  `cantidad` int(4) NOT NULL,
  `precio_unit` text NOT NULL,
  `precio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id_factura`, `id_producto`, `cantidad`, `precio_unit`, `precio`) VALUES
(001000001, 00000000000, 5, '1.5', '7.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(200) NOT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `pass`) VALUES
(1, 'demo', 'demo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id_producto` int(11) unsigned zerofill NOT NULL,
  `sku` int(10) unsigned zerofill NOT NULL,
  `nombre_producto` text NOT NULL,
  `cantidad` int(20) NOT NULL,
  `vendidos` int(20) NOT NULL,
  `precio_unit` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `sku`, `nombre_producto`, `cantidad`, `vendidos`, `precio_unit`) VALUES
(00000000001, 0000000001, 'Hosting Nivel 1 500MB', 100, 0, 150),
(00000000002, 0000000000, 'sadsa', 45, 0, 45),
(00000000003, 0000000002, 'Hosting Nivel 2 1000MB', 50, 0, 200),
(00000000004, 0000000003, 'Hosting Nivel 3 1500MB', 50, 0, 250),
(00000000005, 0000000008, 'Hosting Nivel 4 2000 MB', 50, 0, 95),
(00000000006, 0000045789, 'Desodorante Aval', 3, 0, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(200) NOT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `email`) VALUES
(1, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'ikarus_94@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
 ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
MODIFY `id` int(150) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
MODIFY `id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `id_producto` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
