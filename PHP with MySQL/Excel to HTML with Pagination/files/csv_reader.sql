-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='';

-- -----------------------------------------------------
-- Schema csv_reader
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema csv_reader
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `csv_reader` DEFAULT CHARACTER SET utf8 ;
USE `csv_reader` ;

-- -----------------------------------------------------
-- Table `csv_reader`.`files`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `csv_reader`.`files` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `file_name` VARCHAR(255) NOT NULL,
  `location` VARCHAR(255) NULL,
  `created_at` DATETIME NULL,
  `updated_At` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `file_name_UNIQUE` (`file_name` ASC) VISIBLE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
