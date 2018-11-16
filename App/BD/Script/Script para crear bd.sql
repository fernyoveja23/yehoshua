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
-- Table `yehoshua`.`Vendedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`Vendedor` (
  `idVendedor` INT NOT NULL,
  `NombreVendedor` VARCHAR(45) NULL,
  `DireccionVendedor` VARCHAR(45) NULL,
  `EmailVendedor` VARCHAR(45) NULL,
  `TelefonoVendedor` VARCHAR(45) NULL,
  PRIMARY KEY (`idVendedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yehoshua`.`Evento Turistico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`Evento Turistico` (
  `idEvento` INT NOT NULL AUTO_INCREMENT,
  `NombreEvento` VARCHAR(45) NOT NULL,
  `FechaInicioEvento` DATETIME NOT NULL,
  `FechaFinEvento` DATETIME NULL,
  `CapacidadEvento` VARCHAR(45) NOT NULL,
  `DescripciónEvento` VARCHAR(100) NOT NULL,
  `CostoEvento` DECIMAL NOT NULL,
  `Vendedor_idVendedor` INT NULL,
  PRIMARY KEY (`idEvento`),
  INDEX `fk_Evento Turistico_Vendedor1_idx` (`Vendedor_idVendedor` ASC),
  CONSTRAINT `fk_Evento Turistico_Vendedor1`
    FOREIGN KEY (`Vendedor_idVendedor`)
    REFERENCES `yehoshua`.`Vendedor` (`idVendedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yehoshua`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`Cliente` (
  `idCliente` INT NOT NULL,
  `NombreCliente` VARCHAR(45) NULL,
  `ApellidoPCliente` VARCHAR(45) NULL,
  `ApellidoMCliente` VARCHAR(45) NULL,
  `EmailCliente` VARCHAR(45) NULL,
  `CelularCliente` VARCHAR(45) NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yehoshua`.`Venta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`Venta` (
  `idVenta` INT NOT NULL,
  `FechaVenta` DATETIME NOT NULL,
  `NoViajerosVenta` INT NOT NULL,
  `Total` DECIMAL(2) NULL,
  `idEvento` INT NOT NULL,
  `idCliente` INT NOT NULL,
  PRIMARY KEY (`idVenta`),
  INDEX `fk_Venta_Evento Turistico_idx` (`idEvento` ASC),
  INDEX `idCliente_idx` (`idCliente` ASC),
  CONSTRAINT `idEvento`
    FOREIGN KEY (`idEvento`)
    REFERENCES `yehoshua`.`Evento Turistico` (`idEvento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idCliente`
    FOREIGN KEY (`idCliente`)
    REFERENCES `yehoshua`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yehoshua`.`CatCancelacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`CatCancelacion` (
  `idCatCancelacion` CHAR(3) NOT NULL,
  `DescripcionCatCancelacion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCatCancelacion`),
  UNIQUE INDEX `idCatCancelacion_UNIQUE` (`idCatCancelacion` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yehoshua`.`Cancelaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`Cancelaciones` (
  `idCancelaciones` INT NOT NULL,
  `FechaCancelacion` DATETIME NULL,
  `ComisiónCancelacion` INT NULL,
  `idVenta` INT NOT NULL,
  `CatCancelacion_idCatCancelacion` CHAR(3) NOT NULL,
  PRIMARY KEY (`idCancelaciones`),
  INDEX `fk_Cancelaciones_Venta1_idx` (`idVenta` ASC),
  INDEX `fk_Cancelaciones_CatCancelacion1_idx` (`CatCancelacion_idCatCancelacion` ASC),
  CONSTRAINT `idVenta`
    FOREIGN KEY (`idVenta`)
    REFERENCES `yehoshua`.`Venta` (`idVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cancelaciones_CatCancelacion1`
    FOREIGN KEY (`CatCancelacion_idCatCancelacion`)
    REFERENCES `yehoshua`.`CatCancelacion` (`idCatCancelacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yehoshua`.`Lugar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yehoshua`.`Lugar` (
  `idLugar` INT NOT NULL,
  `Evento Turistico_idEvento` INT NOT NULL,
  `DetalleLugar` VARCHAR(45) NULL,
  PRIMARY KEY (`idLugar`),
  INDEX `fk_Lugar_Evento Turistico1_idx` (`Evento Turistico_idEvento` ASC),
  CONSTRAINT `fk_Lugar_Evento Turistico1`
    FOREIGN KEY (`Evento Turistico_idEvento`)
    REFERENCES `yehoshua`.`Evento Turistico` (`idEvento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE USER 'admin' IDENTIFIED BY 'admin';

GRANT ALL ON `yehoshua`.* TO 'admin';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
