-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema convocatoriasBD
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema convocatoriasBD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `convocatoriasBD` DEFAULT CHARACTER SET utf8 ;
USE `convocatoriasBD` ;

-- ----------------------------------a-------------------
-- Table `convocatoriasBD`.`entidad-institucion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`entidad-institucion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(70) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`rol` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `telefono` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NOT NULL,
  `idRol` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_rol1_idx` (`idRol` ASC) ,
  CONSTRAINT `fk_usuario_rol1`
    FOREIGN KEY (`idRol`)
    REFERENCES `convocatoriasBD`.`rol` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`convocatorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`convocatorias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `fechaRevision` DATETIME NOT NULL,
  `fechaCierre` DATE NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `objetivo` VARCHAR(200) NOT NULL,
  `observaciones` VARCHAR(200) NULL,
  `fkIdEntidad` INT NOT NULL,
  `idUsuario` INT NOT NULL,
  `fkIdInvestigador` INT NULL,
  PRIMARY KEY (`id`, `fkIdEntidad`, `idUsuario`),
  INDEX `fk_convocatorias_entidad-institucion1_idx` (`fkIdEntidad` ASC) ,
  INDEX `fk_convocatorias_usuario1_idx` (`idUsuario` ASC) ,
  CONSTRAINT `fk_convocatorias_entidad-institucion1`
    FOREIGN KEY (`fkIdEntidad`)
    REFERENCES `convocatoriasBD`.`entidad-institucion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_convocatorias_usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `convocatoriasBD`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`linea`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`linea` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `descripcion` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`tipo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`requisito-seleccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`requisito-seleccion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `idTipo` INT NOT NULL,
  PRIMARY KEY (`id`, `idTipo`),
  INDEX `fk_requisito-seleccion_tipo1_idx` (`idTipo` ASC) ,
  CONSTRAINT `fk_requisito-seleccion_tipo1`
    FOREIGN KEY (`idTipo`)
    REFERENCES `convocatoriasBD`.`tipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`Requisitos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`Requisitos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `obervaciones` VARCHAR(45) NULL,
  `idEntidad` INT NOT NULL,
  `idRequisitoSeleccion` INT NOT NULL,
  PRIMARY KEY (`id`, `idEntidad`, `idRequisitoSeleccion`),
  INDEX `fk_Requisitos_entidad-institucion1_idx` (`idEntidad` ASC) ,
  INDEX `fk_Requisitos_requisito-seleccion1_idx` (`idRequisitoSeleccion` ASC) ,
  CONSTRAINT `fk_Requisitos_entidad-institucion1`
    FOREIGN KEY (`idEntidad`)
    REFERENCES `convocatoriasBD`.`entidad-institucion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Requisitos_requisito-seleccion1`
    FOREIGN KEY (`idRequisitoSeleccion`)
    REFERENCES `convocatoriasBD`.`requisito-seleccion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`departamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`ciudades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`ciudades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `IdDepartamento` INT NOT NULL,
  PRIMARY KEY (`id`, `IdDepartamento`),
  INDEX `fk_ciudades_departamento1_idx` (`IdDepartamento` ASC) ,
  CONSTRAINT `fk_ciudades_departamento1`
    FOREIGN KEY (`IdDepartamento`)
    REFERENCES `convocatoriasBD`.`departamento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`empresa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `nit` VARCHAR(30) NULL,
  `razonSocial` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `paginaWeb` VARCHAR(100) NULL,
  `numEmpleados` INT NULL,
  `sectorEconomico` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `tiempoExistencia` INT NULL,
  `documentoLegal` VARCHAR(45) NULL,
  `nombreLegal` VARCHAR(45) NULL,
  `apelidoLegal` VARCHAR(45) NULL,
  `telefonoFijo` VARCHAR(45) NULL,
  `celularLegal` VARCHAR(45) NULL,
  `email` VARCHAR(100) NULL,
  `cargoLegal` VARCHAR(45) NULL,
  `fkIdCiudad` INT NOT NULL,
  `idUsuario` INT NOT NULL,
  PRIMARY KEY (`id`, `idUsuario`, `fkIdCiudad`),
  INDEX `fk_empresa_ciudades1_idx` (`fkIdCiudad` ASC) ,
  INDEX `fk_empresa_usuario1_idx` (`idUsuario` ASC) ,
  CONSTRAINT `fk_empresa_ciudades1`
    FOREIGN KEY (`fkIdCiudad`)
    REFERENCES `convocatoriasBD`.`ciudades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_usuario1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `convocatoriasBD`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`chequeo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`chequeo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `chequeo` TINYINT NOT NULL,
  `IdEmpresa` INT NOT NULL,
  `IdRequisito` INT NOT NULL,
  PRIMARY KEY (`id`, `IdEmpresa`, `IdRequisito`),
  INDEX `fk_cheks_empresa1_idx` (`IdEmpresa` ASC) ,
  INDEX `fk_chequeo_requisito-seleccion1_idx` (`IdRequisito` ASC) ,
  CONSTRAINT `fk_cheks_empresa1`
    FOREIGN KEY (`IdEmpresa`)
    REFERENCES `convocatoriasBD`.`empresa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_chequeo_requisito-seleccion1`
    FOREIGN KEY (`IdRequisito`)
    REFERENCES `convocatoriasBD`.`requisito-seleccion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`publicoObjetivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`publicoObjetivo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`lineas_convocatorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`lineas_convocatorias` (
  `linea_id` INT NOT NULL,
  `convocatorias_id` INT NOT NULL,
  PRIMARY KEY (`linea_id`, `convocatorias_id`),
  INDEX `fk_linea_has_convocatorias_convocatorias1_idx` (`convocatorias_id` ASC) ,
  INDEX `fk_linea_has_convocatorias_linea1_idx` (`linea_id` ASC) ,
  CONSTRAINT `fk_linea_has_convocatorias_linea1`
    FOREIGN KEY (`linea_id`)
    REFERENCES `convocatoriasBD`.`linea` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_linea_has_convocatorias_convocatorias1`
    FOREIGN KEY (`convocatorias_id`)
    REFERENCES `convocatoriasBD`.`convocatorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `convocatoriasBD`.`convocatorias_publicoObjetivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `convocatoriasBD`.`convocatorias_publicoObjetivo` (
  `convocatorias_id` INT NOT NULL,
  `publicoObjetivo_id` INT NOT NULL,
  PRIMARY KEY (`convocatorias_id`, `publicoObjetivo_id`),
  INDEX `fk_convocatorias_has_publicoObjetivo_publicoObjetivo1_idx` (`publicoObjetivo_id` ASC) ,
  INDEX `fk_convocatorias_has_publicoObjetivo_convocatorias1_idx` (`convocatorias_id` ASC) ,
  CONSTRAINT `fk_convocatorias_has_publicoObjetivo_convocatorias1`
    FOREIGN KEY (`convocatorias_id`)
    REFERENCES `convocatoriasBD`.`convocatorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_convocatorias_has_publicoObjetivo_publicoObjetivo1`
    FOREIGN KEY (`publicoObjetivo_id`)
    REFERENCES `convocatoriasBD`.`publicoObjetivo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
