SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `cedani` ;
USE `cedani` ;

-- -----------------------------------------------------
-- Table `cedani`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_razonsocial` VARCHAR(255) NOT NULL,
  `domicilio_fiscal` VARCHAR(255) NOT NULL,
  `rif` VARCHAR(255) NOT NULL,
  `telefono1` VARCHAR(255) NULL DEFAULT NULL,
  `telefono2` VARCHAR(255) NULL DEFAULT NULL,
  `telefono3` VARCHAR(255) NULL DEFAULT NULL,
  `correo` VARCHAR(255) NULL DEFAULT NULL,
  `nombre_encargado` VARCHAR(255) NULL DEFAULT NULL,
  `telefono_encargado` VARCHAR(255) NULL DEFAULT NULL,
  `otro` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedani`.`facturas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`facturas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `clientes_id` INT(11) NOT NULL,
  `numero_factura` INT(11) NOT NULL,
  `numero_control` INT(11) NOT NULL,
  `fecha` TIMESTAMP NOT NULL,
  `status_pago` VARCHAR(255) NULL DEFAULT NULL,
  `status_entrega` VARCHAR(255) NULL DEFAULT NULL,
  `condiciones_pago` VARCHAR(255) NULL DEFAULT NULL,
  `descuento_financiero` INT(11) NULL DEFAULT 0,
  `iva` DECIMAL(20,2) NOT NULL,
  PRIMARY KEY (`id`, `clientes_id`),
  INDEX `fk_facturas_clientes1_idx` (`clientes_id` ASC),
  INDEX `id` (`id` ASC),
  CONSTRAINT `fk_facturas_clientes1`
    FOREIGN KEY (`clientes_id`)
    REFERENCES `cedani`.`clientes` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedani`.`cobranzas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`cobranzas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `facturas_id` INT(11) NOT NULL,
  `fecha` DATETIME NOT NULL,
  `forma_pago` VARCHAR(255) NULL DEFAULT NULL,
  `detalle_forma_pago` VARCHAR(255) NULL DEFAULT NULL,
  `status_pago` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `facturas_id`),
  INDEX `fk_cobranzas_facturas1_idx` (`facturas_id` ASC),
  CONSTRAINT `fk_cobranzas_facturas1`
    FOREIGN KEY (`facturas_id`)
    REFERENCES `cedani`.`facturas` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedani`.`proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`proveedores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `apellido` VARCHAR(255) NULL,
  `telefono1` VARCHAR(255) NULL,
  `telefono2` VARCHAR(255) NULL,
  `telefono3` VARCHAR(255) NULL,
  `direccion` VARCHAR(255) NULL,
  `correo` VARCHAR(255) NULL,
  `cuenta_bancaria1` VARCHAR(255) NULL,
  `banco_cuenta_bancaria1` VARCHAR(255) NULL,
  `datos_cuenta_bancaria1` VARCHAR(255) NULL,
  `cuenta_bancaria2` VARCHAR(255) NULL,
  `banco_cuenta_bancaria2` VARCHAR(255) NULL,
  `datos_cuenta_bancaria2` VARCHAR(255) NULL,
  `cuenta_bancaria3` VARCHAR(255) NULL,
  `banco_cuenta_bancaria3` VARCHAR(255) NULL,
  `datos_cuenta_bancaria3` VARCHAR(255) NULL,
  `notas` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedani`.`productos_proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`productos_proveedores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `proveedores_id` INT NOT NULL,
  PRIMARY KEY (`id`, `proveedores_id`),
  INDEX `fk_productos_proveedores_proveedores1_idx` (`proveedores_id` ASC),
  CONSTRAINT `fk_productos_proveedores_proveedores1`
    FOREIGN KEY (`proveedores_id`)
    REFERENCES `cedani`.`proveedores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedani`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`productos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `descripcion` VARCHAR(255) NULL DEFAULT NULL,
  `marca` VARCHAR(255) NOT NULL,
  `formato` INT(11) NOT NULL,
  `formato2` INT(11) NOT NULL,
  `kilo` TINYINT(1) NOT NULL,
  `precio_venta` DECIMAL(20,2) NOT NULL,
  `precio_costo` DECIMAL(20,2) NOT NULL,
  `excento_de_iva` TINYINT(1) NOT NULL,
  `productos_proveedores_id` INT NOT NULL,
  `productos_proveedores_proveedores_id` INT NOT NULL,
  PRIMARY KEY (`id`, `productos_proveedores_id`, `productos_proveedores_proveedores_id`),
  INDEX `fk_productos_productos_proveedores1_idx` (`productos_proveedores_id` ASC, `productos_proveedores_proveedores_id` ASC),
  CONSTRAINT `fk_productos_productos_proveedores1`
    FOREIGN KEY (`productos_proveedores_id` , `productos_proveedores_proveedores_id`)
    REFERENCES `cedani`.`productos_proveedores` (`id` , `proveedores_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedani`.`compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`compras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `facturas_id` INT(11) NOT NULL,
  `productos_id` INT(11) NOT NULL,
  `cantidad` INT(11) NOT NULL,
  `fraccion` INT(11) NULL DEFAULT NULL,
  `precio_unitario` DECIMAL(20,2) NOT NULL,
  `descuento` INT(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`, `facturas_id`, `productos_id`),
  INDEX `fk_compras_facturas1_idx` (`facturas_id` ASC),
  INDEX `fk_compras_productos1_idx` (`productos_id` ASC),
  CONSTRAINT `fk_compras_productos1`
    FOREIGN KEY (`productos_id`)
    REFERENCES `cedani`.`productos` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_compras_facturas1`
    FOREIGN KEY (`facturas_id`)
    REFERENCES `cedani`.`facturas` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedani`.`configuraciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`configuraciones` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `IVA` DECIMAL(20,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedani`.`empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`empleados` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `apellido` VARCHAR(255) NOT NULL,
  `cedula` VARCHAR(255) NULL DEFAULT NULL,
  `telefono1` VARCHAR(255) NULL DEFAULT NULL,
  `telefomo2` VARCHAR(255) NULL DEFAULT NULL,
  `direccion` VARCHAR(255) NULL DEFAULT NULL,
  `cargo` VARCHAR(255) NULL DEFAULT NULL,
  `notas` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedani`.`entregas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`entregas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `facturas_id` INT(11) NOT NULL,
  `nombre` VARCHAR(255) NULL DEFAULT NULL,
  `direccion` VARCHAR(255) NULL DEFAULT NULL,
  `telefono` VARCHAR(255) NULL DEFAULT NULL,
  `nota` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `facturas_id`),
  INDEX `fk_entregas_facturas1_idx` (`facturas_id` ASC),
  CONSTRAINT `fk_entregas_facturas1`
    FOREIGN KEY (`facturas_id`)
    REFERENCES `cedani`.`facturas` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedani`.`historico_precios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`historico_precios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `producto_id` INT(11) NOT NULL,
  `precio` DECIMAL(20,2) NOT NULL,
  `fecha` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`, `producto_id`),
  INDEX `producto_id` (`producto_id` ASC),
  CONSTRAINT `histerico_precios_ibfk_1`
    FOREIGN KEY (`producto_id`)
    REFERENCES `cedani`.`productos` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedani`.`inventarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`inventarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `productos_id` INT(11) NOT NULL,
  `cantidad` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `productos_id`),
  INDEX `fk_inventarios_productos1_idx` (`productos_id` ASC),
  CONSTRAINT `fk_inventarios_productos1`
    FOREIGN KEY (`productos_id`)
    REFERENCES `cedani`.`productos` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cedani`.`tareas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`tareas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha` DATETIME NOT NULL,
  `tarea` VARCHAR(255) NOT NULL,
  `completado` TINYINT(1) NOT NULL,
  `recordatorio` TIMESTAMP NULL DEFAULT NULL,
  `prioridad` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cedani`.`notas_de_credito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cedani`.`notas_de_credito` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `facturas_id` INT(11) NOT NULL,
  `fecha` TIMESTAMP NOT NULL,
  `compras_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `facturas_id`, `compras_id`),
  INDEX `fk_notas_de_credito_facturas1_idx` (`facturas_id` ASC),
  INDEX `fk_notas_de_credito_compras1_idx` (`compras_id` ASC),
  CONSTRAINT `fk_notas_de_credito_facturas1`
    FOREIGN KEY (`facturas_id`)
    REFERENCES `cedani`.`facturas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notas_de_credito_compras1`
    FOREIGN KEY (`compras_id`)
    REFERENCES `cedani`.`compras` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
