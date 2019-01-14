-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema yehoshua
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema yehoshua
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `yehoshua` DEFAULT CHARACTER SET utf8 ;
USE `yehoshua` ;

-- -----------------------------------------------------
-- Table `yehoshua`.`catcancelacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`catcancelacion` (
  `idCatCancelacion` CHAR(3) NOT NULL,
  `DescripcionCatCancelacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCatCancelacion`),
  UNIQUE INDEX `idCatCancelacion_UNIQUE` (`idCatCancelacion` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yehoshua`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`cliente` (
  `idCliente` INT(11) NOT NULL,
  `NombreCliente` VARCHAR(45) NULL DEFAULT NULL,
  `ApellidoPCliente` VARCHAR(45) NULL DEFAULT NULL,
  `ApellidoMCliente` VARCHAR(45) NULL DEFAULT NULL,
  `EmailCliente` VARCHAR(45) NULL DEFAULT NULL,
  `CelularCliente` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yehoshua`.`cataprobacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`cataprobacion` (
  `idcataprobacion` CHAR(3) NOT NULL,
  `descripcionCatAprobacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcataprobacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yehoshua`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`usuarios` (
  `idusuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`idusuarios`),
  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `yehoshua`.`vendedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`vendedor` (
  `idVendedor` INT(11) NOT NULL AUTO_INCREMENT,
  `NombreVendedor` VARCHAR(150) NOT NULL,
  `DireccionVendedor` VARCHAR(300) NOT NULL,
  `EmailVendedor` VARCHAR(100) NOT NULL,
  `TelefonoVendedor` VARCHAR(25) NOT NULL,
  `cataprobacion_idcataprobacion` CHAR(3) NOT NULL,
  `usuarios_idusuarios` INT(11) NOT NULL,
  PRIMARY KEY (`idVendedor`),
  INDEX `fk_vendedor_cataprobacion1_idx` (`cataprobacion_idcataprobacion` ASC) VISIBLE,
  INDEX `fk_vendedor_usuarios1_idx` (`usuarios_idusuarios` ASC) VISIBLE,
  CONSTRAINT `fk_vendedor_cataprobacion1`
    FOREIGN KEY (`cataprobacion_idcataprobacion`)
    REFERENCES `yehoshua`.`cataprobacion` (`idcataprobacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vendedor_usuarios1`
    FOREIGN KEY (`usuarios_idusuarios`)
    REFERENCES `yehoshua`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yehoshua`.`eventoturistico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`eventoturistico` (
  `idEvento` INT(11) NOT NULL AUTO_INCREMENT,
  `NombreEvento` VARCHAR(45) NOT NULL,
  `FechaInicioEvento` DATETIME NOT NULL,
  `FechaFinEvento` DATETIME NULL DEFAULT NULL,
  `CapacidadEvento` INT NOT NULL,
  `DescripcionEvento` MEDIUMTEXT NOT NULL,
  `CostoEvento` DECIMAL(10,2) NOT NULL,
  `Vendedor_idVendedor` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idEvento`),
  INDEX `fk_Evento Turistico_Vendedor1_idx` (`Vendedor_idVendedor` ASC) VISIBLE,
  CONSTRAINT `fk_Evento Turistico_Vendedor1`
    FOREIGN KEY (`Vendedor_idVendedor`)
    REFERENCES `yehoshua`.`vendedor` (`idVendedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yehoshua`.`venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`venta` (
  `idVenta` INT(11) NOT NULL,
  `FechaVenta` DATETIME NOT NULL,
  `NoViajerosVenta` INT(11) NOT NULL,
  `Total` DECIMAL(2,0) NULL DEFAULT NULL,
  `idEvento` INT(11) NOT NULL,
  `idCliente` INT(11) NOT NULL,
  `idVendedor` INT(11) NULL,
  PRIMARY KEY (`idVenta`),
  INDEX `fk_Venta_Evento Turistico_idx` (`idEvento` ASC) VISIBLE,
  INDEX `idCliente_idx` (`idCliente` ASC) VISIBLE,
  CONSTRAINT `idCliente`
    FOREIGN KEY (`idCliente`)
    REFERENCES `yehoshua`.`cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idEvento`
    FOREIGN KEY (`idEvento`)
    REFERENCES `yehoshua`.`eventoturistico` (`idEvento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yehoshua`.`cancelaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`cancelaciones` (
  `idCancelaciones` INT(11) NOT NULL,
  `FechaCancelacion` DATETIME NULL DEFAULT NULL,
  `ComisiónCancelacion` INT(11) NULL DEFAULT NULL,
  `CatCancelacion_idCatCancelacion` CHAR(3) NOT NULL,
  `venta_idVenta` INT(11) NOT NULL,
  PRIMARY KEY (`idCancelaciones`),
  INDEX `fk_Cancelaciones_CatCancelacion1_idx` (`CatCancelacion_idCatCancelacion` ASC) VISIBLE,
  INDEX `fk_cancelaciones_venta1_idx` (`venta_idVenta` ASC) VISIBLE,
  CONSTRAINT `fk_Cancelaciones_CatCancelacion1`
    FOREIGN KEY (`CatCancelacion_idCatCancelacion`)
    REFERENCES `yehoshua`.`catcancelacion` (`idCatCancelacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cancelaciones_venta1`
    FOREIGN KEY (`venta_idVenta`)
    REFERENCES `yehoshua`.`venta` (`idVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yehoshua`.`lugar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`lugar` (
  `idLugar` INT(11) NOT NULL AUTO_INCREMENT,
  `DetalleLugar` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`idLugar`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yehoshua`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`roles` (
  `idroles` CHAR(3) NOT NULL,
  `Rol` VARCHAR(45) NULL DEFAULT NULL,
  `DescripcionRol` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idroles`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yehoshua`.`usuariorol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`usuariorol` (
  `idUsuario` INT(11) NOT NULL,
  `IdRol` CHAR(3) NOT NULL,
  INDEX `fk_usuarios_idx` (`idUsuario` ASC) VISIBLE,
  INDEX `fk_rol_idx` (`IdRol` ASC) VISIBLE,
  CONSTRAINT `fk_rol`
    FOREIGN KEY (`IdRol`)
    REFERENCES `yehoshua`.`roles` (`idroles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `yehoshua`.`usuarios` (`idusuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yehoshua`.`EventoLugar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`EventoLugar` (
  `idEventoLugar` INT NOT NULL AUTO_INCREMENT,
  `eventoturistico_idEvento` INT(11) NOT NULL,
  `lugar_idLugar` INT(11) NOT NULL,
  PRIMARY KEY (`idEventoLugar`),
  INDEX `fk_EventoLugar_evento turistico1_idx` (`eventoturistico_idEvento` ASC) VISIBLE,
  INDEX `fk_EventoLugar_lugar1_idx` (`lugar_idLugar` ASC) VISIBLE,
  CONSTRAINT `fk_EventoLugar_evento turistico1`
    FOREIGN KEY (`eventoturistico_idEvento`)
    REFERENCES `yehoshua`.`eventoturistico` (`idEvento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EventoLugar_lugar1`
    FOREIGN KEY (`lugar_idLugar`)
    REFERENCES `yehoshua`.`lugar` (`idLugar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yehoshua`.`Imagen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`Imagen` (
  `idImagen` INT NOT NULL AUTO_INCREMENT,
  `NombreArchivo` VARCHAR(255) NOT NULL,
  `Tipo` VARCHAR(100) NOT NULL,
  `FechaSubida` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Imagen` MEDIUMBLOB NOT NULL,
  PRIMARY KEY (`idImagen`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yehoshua`.`EventoImagen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`EventoImagen` (
  `idEventoImagen` INT NOT NULL AUTO_INCREMENT,
  `Imagen_idEventoImagen` INT NOT NULL,
  `eventoturistico_idEvento` INT(11) NOT NULL,
  PRIMARY KEY (`idEventoImagen`),
  INDEX `fk_EventoImagen_Imagen1_idx` (`Imagen_idEventoImagen` ASC) VISIBLE,
  INDEX `fk_EventoImagen_evento turistico1_idx` (`eventoturistico_idEvento` ASC) VISIBLE,
  CONSTRAINT `fk_EventoImagen_Imagen1`
    FOREIGN KEY (`Imagen_idEventoImagen`)
    REFERENCES `yehoshua`.`Imagen` (`idImagen`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EventoImagen_evento turistico1`
    FOREIGN KEY (`eventoturistico_idEvento`)
    REFERENCES `yehoshua`.`eventoturistico` (`idEvento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
