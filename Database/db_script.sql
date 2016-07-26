-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema RusselioShoes
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema RusselioShoes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `RusselioShoes` DEFAULT CHARACTER SET utf8 ;
USE `RusselioShoes` ;

-- -----------------------------------------------------
-- Table `RusselioShoes`.`footwear`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RusselioShoes`.`footwear` (
  `idFootwear` INT NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(45) NOT NULL,
  `sex` VARCHAR(1) NOT NULL,
  `shortDescription` VARCHAR(140) NULL DEFAULT 'No Description Available',
  `longDescription` MEDIUMTEXT NULL,
  `price` DECIMAL NOT NULL,
  PRIMARY KEY (`idFootwear`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RusselioShoes`.`footwearStock`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RusselioShoes`.`footwearStock` (
  `idFootwearStock` INT NOT NULL AUTO_INCREMENT,
  `idFootwear` INT NOT NULL,
  `size` FLOAT NOT NULL,
  `stock` INT NOT NULL,
  `active` INT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idFootwearStock`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RusselioShoes`.`account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RusselioShoes`.`account` (
  `idAccount` INT NOT NULL AUTO_INCREMENT,
  `accountType` INT NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `firstName` VARCHAR(45) NOT NULL,
  `middleInitial` VARCHAR(5) NULL,
  `lastName` VARCHAR(45) NOT NULL,
  `emailAddress` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`idAccount`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RusselioShoes`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RusselioShoes`.`customer` (
  `idCustomer` INT NOT NULL AUTO_INCREMENT,
  `idAccount` INT NOT NULL,
  `idBilling` INT NULL DEFAULT 0,
  `idShipping` INT NULL DEFAULT 0,
  PRIMARY KEY (`idCustomer`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RusselioShoes`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RusselioShoes`.`address` (
  `idAddress` INT NOT NULL AUTO_INCREMENT,
  `houseNumber` INT NOT NULL,
  `street` VARCHAR(45) NOT NULL,
  `subdivision` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `postalCode` INT NOT NULL,
  `country` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAddress`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RusselioShoes`.`purchased`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RusselioShoes`.`purchased` (
  `idPurchased` INT NOT NULL AUTO_INCREMENT,
  `idCustomer` INT NOT NULL,
  `idFootwear` INT NOT NULL,
  `price` DECIMAL NOT NULL,
  `datePurchased` DATE NOT NULL,
  PRIMARY KEY (`idPurchased`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `RusselioShoes`.`reviews`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RusselioShoes`.`reviews` (
  `idReview` INT NOT NULL AUTO_INCREMENT,
  `idFootwear` INT NOT NULL,
  `idCustomer` INT NOT NULL,
  `review` MEDIUMTEXT NULL,
  `rating` INT NOT NULL,
  `dateReviewed` DATE NOT NULL,
  PRIMARY KEY (`idReview`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
