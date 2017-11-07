-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: report
-- Source Schemata: report
-- Created: Tue Nov  7 09:43:37 2017
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;;

-- ----------------------------------------------------------------------------
-- Schema report
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `report` ;
CREATE SCHEMA IF NOT EXISTS `report` ;

-- ----------------------------------------------------------------------------
-- Table report.reports
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `report`.`reports` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `sensorID` INT(11) NOT NULL,
  `value` DOUBLE NOT NULL,
  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 85
DEFAULT CHARACTER SET = utf8;

-- ----------------------------------------------------------------------------
-- Table report.sensors
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `report`.`sensors` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `unit` VARCHAR(255) NOT NULL,
  `lat` DOUBLE(10,6) NOT NULL,
  `lng` DOUBLE(10,6) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 40
DEFAULT CHARACTER SET = utf8;
SET FOREIGN_KEY_CHECKS = 1;;
