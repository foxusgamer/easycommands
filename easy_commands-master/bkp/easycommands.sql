-- MySQL Script generated by MySQL Workbench
-- Thu Jun 13 20:05:05 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema easycommands
-- -----------------------------------------------------
-- Autores: 
-- Descrição: 
-- Data Criação: 10/06/2019

-- -----------------------------------------------------
-- Schema easycommands
--
-- Autores: 
-- Descrição: 
-- Data Criação: 10/06/2019
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `easycommands` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `easycommands` ;

-- -----------------------------------------------------
-- Table `easycommands`.`setores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easycommands`.`setores` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `easycommands`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easycommands`.`categorias` (
  `id` TINYINT(3) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(10) NOT NULL,
  `setores_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_categoria_produtos_setores1_idx` (`setores_id` ASC),
  CONSTRAINT `fk_categoria_produtos_setores1`
    FOREIGN KEY (`setores_id`)
    REFERENCES `easycommands`.`setores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `easycommands`.`mesas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easycommands`.`mesas` (
  `id` INT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero` TINYINT(3) UNSIGNED NOT NULL,
  `preferencia` TINYINT(1) NOT NULL COMMENT '0 - SALGADO\n1 - DOCE',
  `status` TINYINT(1) UNSIGNED NOT NULL COMMENT '0 - DISPONIVEL\n1 - OCUPADO\n2 - RESERVADO\n3 - INDISPONIVEL',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `easycommands`.`comandas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easycommands`.`comandas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `status` TINYINT(1) UNSIGNED NOT NULL COMMENT '0 - ATENDIMENTO\n1 - PAGO',
  `mesas_id` INT(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comandas_mesas1_idx` (`mesas_id` ASC),
  CONSTRAINT `fk_comandas_mesas1`
    FOREIGN KEY (`mesas_id`)
    REFERENCES `easycommands`.`mesas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `easycommands`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easycommands`.`produtos` (
  `id` TINYINT(3) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(20) NOT NULL,
  `preco` DECIMAL(6,2) NOT NULL,
  `categorias_id` TINYINT(3) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produtos_categorias1_idx` (`categorias_id` ASC),
  CONSTRAINT `fk_produtos_categorias1`
    FOREIGN KEY (`categorias_id`)
    REFERENCES `easycommands`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `easycommands`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easycommands`.`pedidos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantidade` TINYINT(2) UNSIGNED NOT NULL,
  `status` TINYINT(1) UNSIGNED NOT NULL COMMENT '0 - A FAZER\n1 - EM PRODUÇÃO\n2 - FINALIZADO',
  `observacoes` VARCHAR(100) NULL DEFAULT NULL,
  `comandas_id` INT UNSIGNED NOT NULL,
  `produtos_id` TINYINT(3) NOT NULL,
  `pedidos_hora` TIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pedidos_comandas1_idx` (`comandas_id` ASC),
  INDEX `fk_pedidos_produtos1_idx` (`produtos_id` ASC),
  CONSTRAINT `fk_pedidos_comandas1`
    FOREIGN KEY (`comandas_id`)
    REFERENCES `easycommands`.`comandas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_produtos1`
    FOREIGN KEY (`produtos_id`)
    REFERENCES `easycommands`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `easycommands`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easycommands`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(20) NOT NULL,
  `nivel_de_permissao` TINYINT(1) UNSIGNED NOT NULL COMMENT '0 - ADM\n1 - COMUM',
  `senha` CHAR(32) NOT NULL,
  `email` VARCHAR(90) NOT NULL,
  `setores_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_funcionarios_setores1_idx` (`setores_id` ASC),
  CONSTRAINT `fk_funcionarios_setores1`
    FOREIGN KEY (`setores_id`)
    REFERENCES `easycommands`.`setores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
