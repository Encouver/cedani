/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : cedani

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-02-01 16:39:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_razonsocial` varchar(255) NOT NULL,
  `domicilio_fiscal` varchar(255) NOT NULL,
  `rif` varchar(255) NOT NULL,
  `telefono1` varchar(255) DEFAULT NULL,
  `telefono2` varchar(255) DEFAULT NULL,
  `telefono3` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `nombre_encargado` varchar(255) DEFAULT NULL,
  `telefono_encargado` varchar(255) DEFAULT NULL,
  `otro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for cobranzas
-- ----------------------------
DROP TABLE IF EXISTS `cobranzas`;
CREATE TABLE `cobranzas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facturas_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `forma_pago` varchar(255) DEFAULT NULL,
  `detalle_forma_pago` varchar(255) DEFAULT NULL,
  `status_pago` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`facturas_id`),
  KEY `fk_cobranzas_facturas1_idx` (`facturas_id`),
  CONSTRAINT `fk_cobranzas_facturas1` FOREIGN KEY (`facturas_id`) REFERENCES `facturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for compras
-- ----------------------------
DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facturas_id` int(11) NOT NULL,
  `productos_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fraccion` int(11) DEFAULT NULL,
  `precio_unitario` decimal(20,2) NOT NULL,
  `descuento` int(11) DEFAULT '0',
  PRIMARY KEY (`id`,`facturas_id`,`productos_id`),
  KEY `fk_compras_facturas1_idx` (`facturas_id`),
  KEY `fk_compras_productos1_idx` (`productos_id`),
  CONSTRAINT `fk_compras_facturas1` FOREIGN KEY (`facturas_id`) REFERENCES `facturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_compras_productos1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for configuraciones
-- ----------------------------
DROP TABLE IF EXISTS `configuraciones`;
CREATE TABLE `configuraciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IVA` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for empleados
-- ----------------------------
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `telefono1` varchar(255) DEFAULT NULL,
  `telefomo2` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `notas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for entregas
-- ----------------------------
DROP TABLE IF EXISTS `entregas`;
CREATE TABLE `entregas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facturas_id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `nota` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`facturas_id`),
  KEY `fk_entregas_facturas1_idx` (`facturas_id`),
  CONSTRAINT `fk_entregas_facturas1` FOREIGN KEY (`facturas_id`) REFERENCES `facturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for facturas
-- ----------------------------
DROP TABLE IF EXISTS `facturas`;
CREATE TABLE `facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientes_id` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `numero_control` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_pago` varchar(255) DEFAULT NULL,
  `status_entrega` varchar(255) DEFAULT NULL,
  `condiciones_pago` varchar(255) DEFAULT NULL,
  `descuento_financiero` int(11) DEFAULT '0',
  `iva` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`,`clientes_id`),
  KEY `fk_facturas_clientes1_idx` (`clientes_id`),
  KEY `id` (`id`),
  CONSTRAINT `fk_facturas_clientes1` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for historico_precios
-- ----------------------------
DROP TABLE IF EXISTS `historico_precios`;
CREATE TABLE `historico_precios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `precio` decimal(20,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`producto_id`),
  KEY `producto_id` (`producto_id`),
  CONSTRAINT `histerico_precios_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for inventarios
-- ----------------------------
DROP TABLE IF EXISTS `inventarios`;
CREATE TABLE `inventarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productos_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`,`productos_id`),
  KEY `fk_inventarios_productos1_idx` (`productos_id`),
  CONSTRAINT `fk_inventarios_productos1` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for notas_de_credito
-- ----------------------------
DROP TABLE IF EXISTS `notas_de_credito`;
CREATE TABLE `notas_de_credito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facturas_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `compras_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`facturas_id`,`compras_id`),
  KEY `fk_notas_de_credito_facturas1_idx` (`facturas_id`),
  KEY `fk_notas_de_credito_compras1_idx` (`compras_id`),
  CONSTRAINT `fk_notas_de_credito_compras1` FOREIGN KEY (`compras_id`) REFERENCES `compras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_notas_de_credito_facturas1` FOREIGN KEY (`facturas_id`) REFERENCES `facturas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `marca` varchar(255) NOT NULL,
  `formato` int(11) NOT NULL,
  `formato2` int(11) NOT NULL,
  `kilo` tinyint(1) NOT NULL,
  `precio_venta` decimal(20,2) NOT NULL,
  `precio_costo` decimal(20,2) NOT NULL,
  `excento_de_iva` tinyint(1) NOT NULL,
  `productos_proveedores_id` int(11) NOT NULL,
  `productos_proveedores_proveedores_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`productos_proveedores_id`,`productos_proveedores_proveedores_id`),
  KEY `fk_productos_productos_proveedores1_idx` (`productos_proveedores_id`,`productos_proveedores_proveedores_id`),
  CONSTRAINT `fk_productos_productos_proveedores1` FOREIGN KEY (`productos_proveedores_id`, `productos_proveedores_proveedores_id`) REFERENCES `productos_proveedores` (`id`, `proveedores_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for productos_proveedores
-- ----------------------------
DROP TABLE IF EXISTS `productos_proveedores`;
CREATE TABLE `productos_proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proveedores_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`proveedores_id`),
  KEY `fk_productos_proveedores_proveedores1_idx` (`proveedores_id`),
  CONSTRAINT `fk_productos_proveedores_proveedores1` FOREIGN KEY (`proveedores_id`) REFERENCES `proveedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for proveedores
-- ----------------------------
DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `notas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tareas
-- ----------------------------
DROP TABLE IF EXISTS `tareas`;
CREATE TABLE `tareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `tarea` varchar(255) NOT NULL,
  `completado` tinyint(1) NOT NULL,
  `recordatorio` timestamp NULL DEFAULT NULL,
  `prioridad` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
