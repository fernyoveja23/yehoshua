-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

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
  UNIQUE INDEX `idCatCancelacion_UNIQUE` (`idCatCancelacion` ASC))
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
  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC))
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
  INDEX `fk_vendedor_cataprobacion1_idx` (`cataprobacion_idcataprobacion` ASC),
  INDEX `fk_vendedor_usuarios1_idx` (`usuarios_idusuarios` ASC),
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
-- Table `yehoshua`.`evento turistico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`evento turistico` (
  `idEvento` INT(11) NOT NULL AUTO_INCREMENT,
  `NombreEvento` VARCHAR(45) NOT NULL,
  `FechaInicioEvento` DATETIME NOT NULL,
  `FechaFinEvento` DATETIME NULL DEFAULT NULL,
  `CapacidadEvento` INT NOT NULL,
  `DescripcionEvento` MEDIUMTEXT NOT NULL,
  `CostoEvento` DECIMAL(10,2) NOT NULL,
  `Vendedor_idVendedor` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idEvento`),
  INDEX `fk_Evento Turistico_Vendedor1_idx` (`Vendedor_idVendedor` ASC),
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
  INDEX `fk_Venta_Evento Turistico_idx` (`idEvento` ASC),
  INDEX `idCliente_idx` (`idCliente` ASC),
  CONSTRAINT `idCliente`
    FOREIGN KEY (`idCliente`)
    REFERENCES `yehoshua`.`cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idEvento`
    FOREIGN KEY (`idEvento`)
    REFERENCES `yehoshua`.`evento turistico` (`idEvento`)
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
  INDEX `fk_Cancelaciones_CatCancelacion1_idx` (`CatCancelacion_idCatCancelacion` ASC),
  INDEX `fk_cancelaciones_venta1_idx` (`venta_idVenta` ASC),
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
  `idLugar` INT(11) NOT NULL,
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
  INDEX `fk_usuarios_idx` (`idUsuario` ASC),
  INDEX `fk_rol_idx` (`IdRol` ASC),
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
  `idEventoLugar` INT NOT NULL,
  `evento turistico_idEvento` INT(11) NOT NULL,
  `lugar_idLugar` INT(11) NOT NULL,
  PRIMARY KEY (`idEventoLugar`),
  INDEX `fk_EventoLugar_evento turistico1_idx` (`evento turistico_idEvento` ASC),
  INDEX `fk_EventoLugar_lugar1_idx` (`lugar_idLugar` ASC),
  CONSTRAINT `fk_EventoLugar_evento turistico1`
    FOREIGN KEY (`evento turistico_idEvento`)
    REFERENCES `yehoshua`.`evento turistico` (`idEvento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EventoLugar_lugar1`
    FOREIGN KEY (`lugar_idLugar`)
    REFERENCES `yehoshua`.`lugar` (`idLugar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
