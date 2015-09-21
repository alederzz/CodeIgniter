-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2015 a las 01:55:17
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
`id` int(6) NOT NULL,
  `id_factura` int(9) unsigned zerofill NOT NULL,
  `id_cliente` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `razon_social` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `serie` int(3) unsigned zerofill NOT NULL,
  `correlativo` int(6) unsigned zerofill NOT NULL,
  `moneda` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `monto` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `igv` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`id`, `id_factura`, `id_cliente`, `razon_social`, `tipo_documento`, `serie`, `correlativo`, `moneda`, `monto`, `fecha`, `estado`, `igv`) VALUES
(1, 001000013, '2', 'Creaciones y Diseños Pepito EIRL', 'Factura', 001, 000013, 'soles', '20.00', '29/07/2015', 0, 0),
(2, 001000014, '112', 'Agencia Uando', 'Boleta', 001, 000014, 'soles', '25.00', '29/07/2015', 1, 0),
(3, 001000015, '1', 'Desarrollo de Softawre y Sitios Web SAC', 'Boleta', 001, 000015, 'soles', '50.00', '29/07/2015', 0, 0),
(4, 001000016, '110', 'Prueba Final', 'Factura', 001, 000016, 'soles', '50.00', '29/07/2015', 1, 0),
(5, 001000017, '113', 'ZTa Ceces Oca', 'Guía de Remision', 002, 000017, 'soles', '10', '29/07/2015', 1, 0),
(6, 000100004, '114', 'Xyz ozner', 'Boleta', 001, 000004, 'soles', '6.00', '15/07/2015', 1, 0),
(7, 000000118, '2', 'Creaciones y Diseños Pepito EIRL', 'Guía de Remisión', 001, 000018, 'soles', '10.50', '31/07/2015', 1, 0),
(8, 010000045, '110', 'Prueba Final', 'Factura', 001, 000045, 'soles', '150.00', '02/08/2015', 1, 0),
(9, 001000024, '1', 'Desarrollo de Softawre y Sitios Web SAC', 'Factura', 001, 000024, 'soles', '300.00', '04/08/2015', 0, 0),
(10, 001000025, '110', 'Prueba Final', 'Factura', 001, 000025, 'soles', '300.00', '04/08/2015', 1, 0),
(12, 001000026, '2', 'Creaciones y Diseños Pepito EIRL', 'Factura', 001, 000026, 'soles', '300.00', '04/08/2015', 0, 0),
(13, 001000028, '2', 'Creaciones y Diseños Pepito EIRL', 'Factura', 001, 000028, 'soles', '300.00', '04/08/2015', 0, 0),
(14, 001000029, '110', 'Prueba Final', 'Factura', 001, 000029, 'soles', '300.00', '04/08/2015', 1, 0),
(15, 001000030, '1', 'Desarrollo de Softawre y Sitios Web SAC', 'Factura', 001, 000030, 'soles', '300.00', '04/08/2015', 1, 0),
(16, 001000031, '111', 'FIna Final', 'Factura', 001, 000031, 'soles', '150.00', '04/08/2015', 1, 0),
(17, 001000032, '111', 'FIna Final', 'Factura', 001, 000032, 'soles', '200.00', '04/08/2015', 1, 0),
(18, 001000033, '1', 'Desarrollo de Softawre y Sitios Web SAC', 'Factura', 001, 000033, 'soles', '80.00', '24/08/2015', 0, 0),
(19, 001000034, '2', 'Creaciones y Diseños Pepito EIRL', 'Factura', 001, 000034, 'soles', '160.00', '24/08/2015', 1, 1),
(20, 001000035, '110', 'Prueba Final', 'Factura', 001, 000035, 'soles', '240.00', '25/08/2015', 1, 1),
(21, 002000050, '111', 'FIna Final', 'Factura', 002, 000050, 'soles', '10.50', '25/08/2015', 1, 1),
(22, 001456789, '2', 'Creaciones y Diseños Pepito EIRL', 'Factura', 001, 456789, 'soles', '26.55', '26/08/2015', 1, 0),
(23, 001564897, '110', 'Prueba Final', 'Factura', 001, 564897, 'soles', '214.76', '26/08/2015', 1, 9),
(24, 001874521, '114', 'Xyz ozner', 'Factura', 001, 874521, 'soles', '194.46', '26/08/2015', 1, 1),
(25, 001235689, '113', 'ZTa Ceces Oca', 'Factura', 001, 235689, 'soles', '145.85', '26/08/2015', 1, 0),
(26, 001142536, '1', 'Desarrollo de Softawre y Sitios Web SAC', 'Factura', 001, 142536, 'soles', '14.87', '26/08/2015', 1, 9),
(27, 001325847, '2', 'Creaciones y Diseños Pepito EIRL', 'Factura', 001, 325847, 'soles', '14.87', '26/08/2015', 1, 0),
(28, 001000045, '1', 'Desarrollo de Softawre y Sitios Web SAC', 'Factura', 001, 000045, 'soles', '11.33', '06/09/2015', 1, 0),
(29, 001000038, '2', 'Creaciones y Diseños Pepito EIRL', 'Factura', 001, 000038, 'soles', '14.87', '06/09/2015', 1, 0),
(30, 001000039, '1', 'Desarrollo de Softawre y Sitios Web SAC', 'Factura', 001, 000039, 'soles', '14.87', '06/09/2015', 1, 0),
(31, 001000040, '1', 'Desarrollo de Softawre y Sitios Web SAC', 'Factura', 001, 000040, 'soles', '14.87', '06/09/2015', 1, 0),
(32, 001000040, '1', 'Desarrollo de Softawre y Sitios Web SAC', 'Factura', 001, 000040, 'soles', '14.87', '06/09/2015', 1, 0),
(33, 001000041, '1', 'Desarrollo de Softawre y Sitios Web SAC', 'Factura', 001, 000041, 'soles', '19.47', '06/09/2015', 1, 0),
(34, 001000042, '113', 'ZTa Ceces Oca', 'Factura', 001, 000042, 'soles', '885.00', '06/09/2015', 1, 0),
(35, 001000043, '2', 'Creaciones y Diseños Pepito EIRL', 'Factura', 001, 000043, 'soles', '40.00', '06/09/2015', 1, 1),
(36, 001000043, '2', 'Creaciones y Diseños Pepito EIRL', '000043', 001, 000043, 'soles', '40.00', '06/09/2015', 1, 0),
(37, 003000040, '2', 'Creaciones y Diseños Pepito EIRL', 'Factura', 003, 000040, 'soles', '380.00', '13/09/2015', 1, 1),
(38, 002000015, '2', 'Creaciones y Diseños Pepito EIRL', 'Factura', 002, 000015, 'soles', '135.00', '13/09/2015', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`id` int(6) NOT NULL,
  `id_factura` int(9) unsigned zerofill NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `precio_unit` decimal(8,2) NOT NULL,
  `precio` decimal(13,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `id_factura`, `producto`, `cantidad`, `precio_unit`, `precio`) VALUES
(1, 001000013, '00000000055', 2, '4.00', '7.00'),
(2, 001000014, '00000000000', 5, '2.00', '9.00'),
(3, 001000015, '00000000000', 5, '1.00', '6.00'),
(4, 001000011, '00000000054', 3, '3.00', '9.00'),
(5, 001000010, '00000000053', 2, '5.00', '10.00'),
(6, 001000016, '00000000052', 3, '3.00', '9.90'),
(7, 001000013, '00000000057', 2, '4.80', '9.60'),
(8, 001000013, '00000000055', 2, '5.27', '10.54'),
(9, 001000014, '00000000051', 3, '999.99', '1369998.36'),
(10, 001000014, '00000000010', 3, '456888.12', '1370664.36'),
(11, 001000015, '00000000054', 5, '10.55', '52.73'),
(12, 001000015, '00000000055', 3, '1.00', '3.00'),
(13, 001000016, '00000000000', 5, '10.55', '52.75'),
(14, 001000017, '00000000000', 2, '1.00', '2.00'),
(15, 000100004, '00000000000', 5, '1.20', '6.00'),
(16, 000000118, '00000000000', 7, '1.50', '10.50'),
(17, 010000045, '00000000000', 3, '33.33', '99.99'),
(18, 001000024, '00000000000', 0, '5.00', '0.00'),
(19, 001000025, '00000000000', 0, '3.00', '0.00'),
(20, 001000028, '00000000000', 7, '9.87', '69.09'),
(21, 001000029, '00000000000', 3, '6.54', '19.62'),
(22, 001000030, '00000000000', 5, '9.87', '49.35'),
(23, 001000031, '00000000000', 4, '1.50', '6.00'),
(24, 001000031, '00000000000', 3, '2.30', '6.90'),
(25, 001000031, '00000000000', 5, '3.20', '16.00'),
(26, 001000032, 'Plasticos de XYZ', 100, '9.10', '910.00'),
(27, 001000032, 'Vidrio', 20, '10.50', '210.00'),
(28, 001000032, 'Madera', 5, '4.80', '24.00'),
(29, 001000034, 'Millar, Tarjetas de Presentación en Mate', 2, '80.00', '160.00'),
(30, 001000035, 'Millares, Tarjetas de Presentación en Mate', 3, '80.00', '240.00'),
(31, 002000050, 'Unidades de Fotochecks', 3, '3.50', '10.50'),
(32, 001456789, 'Producto Dos', 5, '4.50', '22.50'),
(33, 001564897, 'Producto Uno', 4, '45.50', '182.00'),
(34, 001874521, 'Producto Dos', 4, '41.20', '164.80'),
(35, 001235689, 'Producto Dos', 3, '41.20', '123.60'),
(36, 001142536, 'Producto Dos', 3, '4.20', '12.60'),
(37, 001325847, 'Producto Dos', 3, '4.20', '12.60'),
(38, 001000045, 'Producto Dos', 3, '3.20', '9.60'),
(39, 001000038, 'Producto Dos', 3, '4.20', '12.60'),
(40, 001000039, 'Producto Tres', 3, '4.20', '12.60'),
(41, 001000040, 'Producto Dos', 3, '4.20', '12.60'),
(42, 001000040, 'Producto Dos', 3, '4.20', '12.60'),
(43, 001000041, 'Producto Uno', 3, '5.50', '16.50'),
(44, 001000042, 'Ladrillos', 5, '150.00', '750.00'),
(45, 001000043, 'Metales', 4, '10.00', '40.00'),
(46, 003000040, 'Pantalones Talla 33', 3, '30.00', '90.00'),
(47, 003000040, 'Polos Talla L', 4, '25.00', '100.00'),
(48, 003000040, 'Zapatillas Talla 41', 2, '95.00', '190.00'),
(49, 002000015, 'Chompas', 3, '45.00', '135.00');

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
  `email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `avatar_uri` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `email`, `rol`, `nombre`, `avatar_uri`) VALUES
(1, 'admin', 'fe01ce2a7fbac8fafaed7c982a04e229', 'ikarus_94@hotmail.com', 'administrador', 'Admin', '');

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
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
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
