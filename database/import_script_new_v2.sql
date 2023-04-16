-- MySQL Script generated by MySQL Workbench
-- Sun Apr 16 17:08:03 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Student` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `email` VARCHAR(64) NOT NULL,
  `birthDate` DATE NOT NULL,
  `pkk` VARCHAR(20) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idKursant_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `pkk_UNIQUE` (`pkk` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`Teacher`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Teacher` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `birthDate` DATE NOT NULL,
  `phoneNumber` INT NOT NULL,
  `email` VARCHAR(64) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idInstruktor_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Vehicle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Vehicle` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `brand` VARCHAR(45) NOT NULL,
  `model` VARCHAR(45) NOT NULL,
  `numberplate` VARCHAR(8) NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  `Teacher_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idPojazd_UNIQUE` (`id` ASC) VISIBLE,
  UNIQUE INDEX `nrRejestracyjny_UNIQUE` (`numberplate` ASC) VISIBLE,
  INDEX `fk_Vehicle_Teacher1_idx` (`Teacher_id` ASC) VISIBLE,
  CONSTRAINT `fk_Vehicle_Teacher1`
    FOREIGN KEY (`Teacher_id`)
    REFERENCES `mydb`.`Teacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Drive`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Drive` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `dateTime` DATETIME NULL,
  `idTeacher` INT NOT NULL,
  `idStudent` INT NOT NULL,
  PRIMARY KEY (`id`, `idTeacher`),
  UNIQUE INDEX `idJazdy_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_Jazdy_Instruktor1_idx` (`idTeacher` ASC) VISIBLE,
  INDEX `fk_Jazdy_Kursant1_idx` (`idStudent` ASC) VISIBLE,
  CONSTRAINT `fk_Jazdy_Instruktor1`
    FOREIGN KEY (`idTeacher`)
    REFERENCES `mydb`.`Teacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Jazdy_Kursant1`
    FOREIGN KEY (`idStudent`)
    REFERENCES `mydb`.`Student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Opinions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Opinions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `score` INT NOT NULL,
  `opinionText` VARCHAR(128) NULL,
  `idStudent` INT NOT NULL,
  PRIMARY KEY (`id`, `idStudent`),
  UNIQUE INDEX `idOpinie_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_Opinie_Kursant1_idx` (`idStudent` ASC) VISIBLE,
  CONSTRAINT `fk_Opinie_Kursant1`
    FOREIGN KEY (`idStudent`)
    REFERENCES `mydb`.`Student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TeachingMaterials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TeachingMaterials` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `file` VARCHAR(45) NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idMaterialyDydaktyczne_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`CourseRecords`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`CourseRecords` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(2) NOT NULL,
  `price` FLOAT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idEwidencjaKursow_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`QuestionsDatabase`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`QuestionsDatabase` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `questionText` VARCHAR(256) NOT NULL,
  `answer1` VARCHAR(256) NOT NULL,
  `naswer2` VARCHAR(256) NULL,
  `answer3` VARCHAR(256) NULL,
  `correctAnswer` VARCHAR(256) NOT NULL,
  `questionScore` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idPytania_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`TestScore`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TestScore` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `score` INT NULL,
  `idStudent` INT NOT NULL,
  PRIMARY KEY (`id`, `idStudent`),
  UNIQUE INDEX `idWynikiTest_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_WynikiTest_Kursant1_idx` (`idStudent` ASC) VISIBLE,
  CONSTRAINT `fk_WynikiTest_Kursant1`
    FOREIGN KEY (`idStudent`)
    REFERENCES `mydb`.`Student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`EnrolledStudent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`EnrolledStudent` (
  `idCourseRecords` INT NOT NULL,
  `idStudent` INT NOT NULL,
  PRIMARY KEY (`idCourseRecords`, `idStudent`),
  INDEX `fk_EwidencjaKursow_has_Kursant_Kursant1_idx` (`idStudent` ASC) VISIBLE,
  INDEX `fk_EwidencjaKursow_has_Kursant_EwidencjaKursow1_idx` (`idCourseRecords` ASC) VISIBLE,
  CONSTRAINT `fk_EwidencjaKursow_has_Kursant_EwidencjaKursow1`
    FOREIGN KEY (`idCourseRecords`)
    REFERENCES `mydb`.`CourseRecords` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EwidencjaKursow_has_Kursant_Kursant1`
    FOREIGN KEY (`idStudent`)
    REFERENCES `mydb`.`Student` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`TeacherPermissons`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`TeacherPermissons` (
  `idCourseRecords` INT NOT NULL,
  `idTeacher` INT NOT NULL,
  PRIMARY KEY (`idCourseRecords`, `idTeacher`),
  INDEX `fk_EwidencjaKursow_has_Instruktor_Instruktor1_idx` (`idTeacher` ASC) VISIBLE,
  INDEX `fk_EwidencjaKursow_has_Instruktor_EwidencjaKursow1_idx` (`idCourseRecords` ASC) VISIBLE,
  CONSTRAINT `fk_EwidencjaKursow_has_Instruktor_EwidencjaKursow1`
    FOREIGN KEY (`idCourseRecords`)
    REFERENCES `mydb`.`CourseRecords` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_EwidencjaKursow_has_Instruktor_Instruktor1`
    FOREIGN KEY (`idTeacher`)
    REFERENCES `mydb`.`Teacher` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`AssignedMaterials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`AssignedMaterials` (
  `idTeachingMaterials` INT NOT NULL,
  `idCourseRecords` INT NOT NULL,
  PRIMARY KEY (`idTeachingMaterials`, `idCourseRecords`),
  INDEX `fk_MaterialyDydaktyczne_has_EwidencjaKursow_EwidencjaKursow_idx` (`idCourseRecords` ASC) VISIBLE,
  INDEX `fk_MaterialyDydaktyczne_has_EwidencjaKursow_MaterialyDydakt_idx` (`idTeachingMaterials` ASC) VISIBLE,
  CONSTRAINT `fk_MaterialyDydaktyczne_has_EwidencjaKursow_MaterialyDydaktyc1`
    FOREIGN KEY (`idTeachingMaterials`)
    REFERENCES `mydb`.`TeachingMaterials` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_MaterialyDydaktyczne_has_EwidencjaKursow_EwidencjaKursow1`
    FOREIGN KEY (`idCourseRecords`)
    REFERENCES `mydb`.`CourseRecords` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Admin` (
  `idAdmin` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(64) NULL,
  `password` VARCHAR(64) NULL,
  PRIMARY KEY (`idAdmin`),
  UNIQUE INDEX `idAdmin_UNIQUE` (`idAdmin` ASC) VISIBLE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
