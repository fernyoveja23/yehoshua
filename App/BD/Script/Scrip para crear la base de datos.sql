-- MySQL Workbench Synchronization
-- Generated: 2019-01-17 16:23
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Josh

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

ALTER TABLE `yehoshua`.`eventoturistico` 
DROP FOREIGN KEY `Vendedor_idVendedor`;

ALTER TABLE `yehoshua`.`cliente` 
CHANGE COLUMN `idCliente` `idCliente` INT(11) NOT NULL AUTO_INCREMENT ;

ALTER TABLE `yehoshua`.`eventoturistico` 
ADD CONSTRAINT `Vendedor_idVendedor`
  FOREIGN KEY (`Vendedor_idVendedor`)
  REFERENCES `yehoshua`.`vendedor` (`idVendedor`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
