-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema MiCanasta
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema MiCanasta
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `MiCanasta` DEFAULT CHARACTER SET utf8 ;
USE `MiCanasta` ;

-- -----------------------------------------------------
-- Table `MiCanasta`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MiCanasta`.`usuario` (
  `idUsuario` INT NOT NULL,
  `nombreUsuario` VARCHAR(70) NOT NULL,
  `passwordUsuario` VARCHAR(30) NOT NULL,
  `direccionUsuario` VARCHAR(100) NOT NULL,
  `telefonoUsuario` VARCHAR(15) NOT NULL,
  `correoUsuario` VARCHAR(50) NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MiCanasta`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MiCanasta`.`administrador` (
  `idAdministrador` INT NOT NULL,
  `nombreAdministrador` VARCHAR(45) NOT NULL,
  `passwordAdministrador` VARCHAR(30) NOT NULL,
  `correoAdministrador` VARCHAR(45) NOT NULL,
  `telefonoAdministrador` VARCHAR(15) NULL,
  PRIMARY KEY (`idAdministrador`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MiCanasta`.`empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MiCanasta`.`empleado` (
  `idEmpleado` INT NOT NULL,
  `nombreEmpleado` VARCHAR(50) NOT NULL,
  `passwordEmpleado` VARCHAR(30) NOT NULL,
  `telefonoEmpleadp` VARCHAR(15) NOT NULL,
  `correoEmpleado` VARCHAR(45) NOT NULL,
  `ubicacionEmpleado` VARCHAR(25) NOT NULL,
  `fotoEmpleado` VARCHAR(150) NULL,
  PRIMARY KEY (`idEmpleado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MiCanasta`.`tienda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MiCanasta`.`tienda` (
  `idTienda` INT NOT NULL,
  `nombreTienda` VARCHAR(45) NOT NULL,
  `direccionTienda` VARCHAR(75) NOT NULL,
  PRIMARY KEY (`idTienda`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MiCanasta`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MiCanasta`.`producto` (
  `idProducto` INT NOT NULL,
  `nombreProducto` VARCHAR(45) NOT NULL,
  `precioProducto` FLOAT NOT NULL,
  `fotoProducto` VARCHAR(150) NULL,
  `pesoProducto` FLOAT NOT NULL,
  `categoriaProducto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProducto`))
ENGINE = InnoDB;


--INSERT INTO producto(`idProducto`, `nombreProducto`, `precioProducto`,`fotoProducto`, `pesoProducto`, `categoriaProducto`)
--VALUES ('1', 'Jitomate', '12.50', 'http://www.mujerde10.com/wp-content/uploads/2015/03/los-beneficios-del-jitomate.jpg', '1.0', 'Frutas y Verduras');


-- -----------------------------------------------------
-- Table `MiCanasta`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MiCanasta`.`pedido` (
  `idPedido` INT NOT NULL,
  `precioPedido` FLOAT NOT NULL,
  `direccionPedido` VARCHAR(100) NOT NULL,
  `destinatarioPedido` VARCHAR(45) NOT NULL,
  `pesoPedido` FLOAT NOT NULL,
  `estadoPedido` TINYINT(1) NOT NULL,
  `idUsuario` INT NOT NULL,
  `idEmpleado` INT NOT NULL,
  PRIMARY KEY (`idPedido`),
  INDEX `idUsuario_idx` (`idUsuario` ASC),
  INDEX `id_Empleado_idx` (`idEmpleado` ASC),
  CONSTRAINT `id_Usuario`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `MiCanasta`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `id_Empleado`
    FOREIGN KEY (`idEmpleado`)
    REFERENCES `MiCanasta`.`empleado` (`idEmpleado`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MiCanasta`.`tienda_has_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MiCanasta`.`tienda_has_producto` (
  `tienda_idTienda` INT NOT NULL,
  `producto_idProducto` INT NOT NULL,
  PRIMARY KEY (`tienda_idTienda`, `producto_idProducto`),
  INDEX `fk_tienda_has_producto_producto1_idx` (`producto_idProducto` ASC),
  INDEX `fk_tienda_has_producto_tienda1_idx` (`tienda_idTienda` ASC),
  CONSTRAINT `fk_tienda_has_producto_tienda1`
    FOREIGN KEY (`tienda_idTienda`)
    REFERENCES `MiCanasta`.`tienda` (`idTienda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tienda_has_producto_producto1`
    FOREIGN KEY (`producto_idProducto`)
    REFERENCES `MiCanasta`.`producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MiCanasta`.`producto_has_pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MiCanasta`.`producto_has_pedido` (
  `producto_idProducto` INT NOT NULL,
  `pedido_idPedido` INT NOT NULL,
  `cantidad` INT NOT NULL,
  PRIMARY KEY (`producto_idProducto`, `pedido_idPedido`),
  INDEX `fk_producto_has_pedido_pedido1_idx` (`pedido_idPedido` ASC),
  INDEX `fk_producto_has_pedido_producto1_idx` (`producto_idProducto` ASC),
  CONSTRAINT `fk_producto_has_pedido_producto1`
    FOREIGN KEY (`producto_idProducto`)
    REFERENCES `MiCanasta`.`producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_has_pedido_pedido1`
    FOREIGN KEY (`pedido_idPedido`)
    REFERENCES `MiCanasta`.`pedido` (`idPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
