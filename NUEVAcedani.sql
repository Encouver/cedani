-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2015 at 11:49 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cedani`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`id` int(11) NOT NULL,
  `nombre_razonsocial` varchar(255) NOT NULL,
  `domicilio_fiscal` varchar(255) NOT NULL,
  `rif` varchar(255) NOT NULL,
  `telefono1` varchar(255) DEFAULT NULL,
  `telefono2` varchar(255) DEFAULT NULL,
  `telefono3` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `nombre_encargado` varchar(255) DEFAULT NULL,
  `telefono_encargado` varchar(255) DEFAULT NULL,
  `otro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_razonsocial`, `domicilio_fiscal`, `rif`, `telefono1`, `telefono2`, `telefono3`, `correo`, `nombre_encargado`, `telefono_encargado`, `otro`) VALUES
(1, 'Industrias Randi K.B., C.A.', 'Esquina Cují a Romualda. La Candelaria. Caracas. Venezuela', 'J-30096192-3', '02125619677', '02125619509', '', 'industriasrandi@gmail.com', 'Carlos Kabchi', '04142428500', ''),
(2, 'Vario, C.A.', 'Los Ruices', 'J-30096192-4', '02125619678', '02125619500', '', '', 'Roberto Pardi', '04243791037', '');

-- --------------------------------------------------------

--
-- Table structure for table `cobranzas`
--

CREATE TABLE IF NOT EXISTS `cobranzas` (
`id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `forma_pago` varchar(255) DEFAULT NULL,
  `detalle_forma_pago` varchar(255) DEFAULT NULL,
  `status_pago` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cobranzas`
--

INSERT INTO `cobranzas` (`id`, `factura_id`, `fecha`, `forma_pago`, `detalle_forma_pago`, `status_pago`) VALUES
(2, 3, '2014-09-17 09:51:26', 'Efectivo', '', 'Verificado'),
(3, 2, '2015-03-19 18:58:10', 'Cheque', '', 'No verificado'),
(4, 5, '2014-06-06 07:33:03', 'Efectivo', NULL, 'No verificado'),
(5, 3, '2015-03-10 11:51:26', 'Cheque', 'Mercantil 0052784591223', 'Verificado'),
(6, 2, '2015-03-20 14:58:31', 'Cheque', 'qqq', 'No verificado'),
(7, 3, '2015-03-10 04:30:00', 'Efectivo', '', 'No verificado'),
(8, 3, '2015-05-02 04:30:00', 'Efectivo', 'q', 'No verificado'),
(9, 3, '2015-03-10 04:30:00', '', '', 'No verificado');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE IF NOT EXISTS `compras` (
`id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fraccion` int(11) DEFAULT NULL,
  `precio_unitario` decimal(20,2) NOT NULL,
  `descuento` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `configuraciones`
--

CREATE TABLE IF NOT EXISTS `configuraciones` (
`id` int(11) NOT NULL,
  `IVA` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `telefono1` varchar(255) DEFAULT NULL,
  `telefomo2` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `notas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `entregas`
--

CREATE TABLE IF NOT EXISTS `entregas` (
`id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `nota` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
`id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `numero_control` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_pago` varchar(255) DEFAULT NULL,
  `status_entrega` varchar(255) DEFAULT NULL,
  `condiciones_pago` varchar(255) DEFAULT NULL,
  `descuento_financiero` int(11) DEFAULT '0',
  `iva` decimal(20,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facturas`
--

INSERT INTO `facturas` (`id`, `cliente_id`, `numero_factura`, `numero_control`, `fecha`, `status_pago`, `status_entrega`, `condiciones_pago`, `descuento_financiero`, `iva`) VALUES
(2, 1, 1, 1, '2015-02-27 22:08:36', '1', '0', 'Contado', 0, '12.00'),
(3, 2, 23, 25, '2015-02-27 22:26:34', '1', '0', 'Contado', 0, '12.00'),
(5, 2, 24, 26, '2015-02-27 03:25:00', '0', '0', 'Contado', 0, '12.00'),
(6, 1, 23123, 123, '2015-02-28 05:25:00', '0', '0', '', NULL, '12.00'),
(7, 1, 88, 99, '2015-03-02 14:15:00', '0', '1', '', NULL, '12.00'),
(8, 1, 8, 4, '2015-03-20 22:15:00', '0', '0', 'Contado', 0, '12.00'),
(9, 1, 8, 4, '2015-03-20 22:15:00', '0', '0', 'Contado', 0, '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `historico_precios`
--

CREATE TABLE IF NOT EXISTS `historico_precios` (
`id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `precio` decimal(20,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventarios`
--

CREATE TABLE IF NOT EXISTS `inventarios` (
`id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `proveedor_id` int(11) DEFAULT NULL,
  `precio_costo` double(20,2) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventarios`
--

INSERT INTO `inventarios` (`id`, `producto_id`, `cantidad`, `fecha`, `proveedor_id`, `precio_costo`, `observaciones`) VALUES
(1, 8, 0, '2015-05-07 15:46:16', NULL, NULL, NULL),
(2, 9, 0, '2015-05-07 15:47:07', NULL, NULL, NULL),
(3, 9, 66, '2015-05-07 15:49:45', NULL, NULL, ''),
(4, 8, 15, '2015-05-07 15:50:45', NULL, NULL, ''),
(5, 8, 65, '2015-05-07 16:38:30', 1, 50000.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `inventarios_actual`
--

CREATE TABLE IF NOT EXISTS `inventarios_actual` (
`id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventarios_actual`
--

INSERT INTO `inventarios_actual` (`id`, `producto_id`, `cantidad`) VALUES
(1, 8, 80),
(2, 9, 66);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notas_de_credito`
--

CREATE TABLE IF NOT EXISTS `notas_de_credito` (
`id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `compra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `marca` varchar(255) NOT NULL,
  `formato` int(11) NOT NULL,
  `formato2` int(11) NOT NULL,
  `kilo` tinyint(1) NOT NULL,
  `precio_venta` decimal(20,2) NOT NULL,
  `precio_costo` decimal(20,2) NOT NULL,
  `excento_de_iva` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `marca`, `formato`, `formato2`, `kilo`, `precio_venta`, `precio_costo`, `excento_de_iva`) VALUES
(8, 'Nestea PIÑA', 'Te de piña', 'Nestea', 12, 2, 1, '9000.00', '5000.00', 0),
(9, 'Nestea Limón', 'Te de limón', 'Nestea', 12, 2, 1, '80000.00', '8000.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `productos_proveedores`
--

CREATE TABLE IF NOT EXISTS `productos_proveedores` (
`id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `telefono1` varchar(255) DEFAULT NULL,
  `telefono2` varchar(255) DEFAULT NULL,
  `telefono3` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `cuenta_bancaria1` varchar(255) DEFAULT NULL,
  `banco_cuenta_bancaria1` varchar(255) DEFAULT NULL,
  `datos_cuenta_bancaria1` varchar(255) DEFAULT NULL,
  `cuenta_bancaria2` varchar(255) DEFAULT NULL,
  `banco_cuenta_bancaria2` varchar(255) DEFAULT NULL,
  `datos_cuenta_bancaria2` varchar(255) DEFAULT NULL,
  `cuenta_bancaria3` varchar(255) DEFAULT NULL,
  `banco_cuenta_bancaria3` varchar(255) DEFAULT NULL,
  `datos_cuenta_bancaria3` varchar(255) DEFAULT NULL,
  `notas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `apellido`, `telefono1`, `telefono2`, `telefono3`, `direccion`, `correo`, `cuenta_bancaria1`, `banco_cuenta_bancaria1`, `datos_cuenta_bancaria1`, `cuenta_bancaria2`, `banco_cuenta_bancaria2`, `datos_cuenta_bancaria2`, `cuenta_bancaria3`, `banco_cuenta_bancaria3`, `datos_cuenta_bancaria3`, `notas`) VALUES
(1, 'Rafael', 'López', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
`id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `tarea` varchar(255) NOT NULL,
  `completado` tinyint(1) NOT NULL,
  `recordatorio` timestamp NULL DEFAULT NULL,
  `prioridad` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'mantu', '-KIBWu1VhoE9qrFwhkj4z0ZORg1uJN1c', '$2y$13$0/L75KfNqC3eovgpd0OIR.bAgDArxkW37eCuJfj.NMbGkawrbvM4a', NULL, 'manturakabchi@gmail.com', 10, 1423690354, 1423690354);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cobranzas`
--
ALTER TABLE `cobranzas`
 ADD PRIMARY KEY (`id`,`factura_id`), ADD KEY `fk_cobranzas_facturas1_idx` (`factura_id`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
 ADD PRIMARY KEY (`id`,`factura_id`,`producto_id`), ADD KEY `fk_compras_facturas1_idx` (`factura_id`), ADD KEY `fk_compras_productos1_idx` (`producto_id`);

--
-- Indexes for table `configuraciones`
--
ALTER TABLE `configuraciones`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entregas`
--
ALTER TABLE `entregas`
 ADD PRIMARY KEY (`id`,`factura_id`), ADD KEY `fk_entregas_facturas1_idx` (`factura_id`);

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
 ADD PRIMARY KEY (`id`,`cliente_id`), ADD KEY `fk_facturas_clientes1_idx` (`cliente_id`), ADD KEY `id` (`id`);

--
-- Indexes for table `historico_precios`
--
ALTER TABLE `historico_precios`
 ADD PRIMARY KEY (`id`,`producto_id`), ADD KEY `producto_id` (`producto_id`);

--
-- Indexes for table `inventarios`
--
ALTER TABLE `inventarios`
 ADD PRIMARY KEY (`id`,`producto_id`), ADD KEY `fk_inventarios_productos1_idx` (`producto_id`), ADD KEY `fk_inventarios_proveedor1_idx` (`proveedor_id`);

--
-- Indexes for table `inventarios_actual`
--
ALTER TABLE `inventarios_actual`
 ADD PRIMARY KEY (`id`,`producto_id`), ADD KEY `fk_inventarios_productos1_idx` (`producto_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `notas_de_credito`
--
ALTER TABLE `notas_de_credito`
 ADD PRIMARY KEY (`id`,`factura_id`,`compra_id`), ADD KEY `fk_notas_de_credito_facturas1_idx` (`factura_id`), ADD KEY `fk_notas_de_credito_compras1_idx` (`compra_id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `productos_proveedores`
--
ALTER TABLE `productos_proveedores`
 ADD PRIMARY KEY (`id`,`proveedor_id`), ADD KEY `fk_productos_proveedores_proveedores1_idx` (`proveedor_id`), ADD KEY `producto_id` (`producto_id`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tareas`
--
ALTER TABLE `tareas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cobranzas`
--
ALTER TABLE `cobranzas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `configuraciones`
--
ALTER TABLE `configuraciones`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entregas`
--
ALTER TABLE `entregas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `historico_precios`
--
ALTER TABLE `historico_precios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventarios`
--
ALTER TABLE `inventarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `inventarios_actual`
--
ALTER TABLE `inventarios_actual`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notas_de_credito`
--
ALTER TABLE `notas_de_credito`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `productos_proveedores`
--
ALTER TABLE `productos_proveedores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tareas`
--
ALTER TABLE `tareas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cobranzas`
--
ALTER TABLE `cobranzas`
ADD CONSTRAINT `fk_cobranzas_facturas1` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
ADD CONSTRAINT `fk_compras_facturas1` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_compras_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `entregas`
--
ALTER TABLE `entregas`
ADD CONSTRAINT `fk_entregas_facturas1` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facturas`
--
ALTER TABLE `facturas`
ADD CONSTRAINT `fk_facturas_clientes1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `historico_precios`
--
ALTER TABLE `historico_precios`
ADD CONSTRAINT `histerico_precios_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventarios`
--
ALTER TABLE `inventarios`
ADD CONSTRAINT `fk_inventarios_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_inventarios_proveedores1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `inventarios_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`);

--
-- Constraints for table `notas_de_credito`
--
ALTER TABLE `notas_de_credito`
ADD CONSTRAINT `fk_notas_de_credito_compras1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_notas_de_credito_facturas1` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `productos_proveedores`
--
ALTER TABLE `productos_proveedores`
ADD CONSTRAINT `fk_productos_proveedores_proveedores1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `productos_proveedores_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
