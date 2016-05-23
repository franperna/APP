-- MySQL Script generated by MySQL Workbench
-- 04/06/16 12:00:49
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema le_site_du_sport
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema le_site_du_sport
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `le_site_du_sport` DEFAULT CHARACTER SET utf8 ;
USE `le_site_du_sport` ;

-- -----------------------------------------------------
-- Table `le_site_du_sport`.`Adresse_has_Utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`Adresse_has_Utilisateur` (
  `Adresse_idAdresse` INT NOT NULL,
  `Utilisateur_idUtilisateur` INT NOT NULL,
  PRIMARY KEY (`Adresse_idAdresse`, `Utilisateur_idUtilisateur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`adresse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`adresse` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `rue` VARCHAR(255) NOT NULL,
  `numero` INT NOT NULL,
  `code_postal` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`utilisateur` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `prenom` VARCHAR(255) NULL,
  `photo` VARCHAR(255) NULL,
  `mail` VARCHAR(255) NOT NULL,
  `mot_de_passe` VARCHAR(255) NOT NULL,
  `age` INT UNSIGNED NULL,
  `description` LONGTEXT NULL,
  `avertissement` INT NULL,
  `civilite` VARCHAR(255) NOT NULL,
  `id_adresse` INT UNSIGNED NOT NULL,
  `privilege` TINYINT UNSIGNED NOT NULL DEFAULT 2,
  `pseudo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_utilisateur_adresse1_idx` (`id_adresse` ASC),
  UNIQUE INDEX `mail_UNIQUE` (`mail` ASC),
  UNIQUE INDEX `pseudo_UNIQUE` (`pseudo` ASC),
  CONSTRAINT `fk_utilisateur_adresse1`
    FOREIGN KEY (`id_adresse`)
    REFERENCES `le_site_du_sport`.`adresse` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`categorie` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_sport` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`club` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NULL,
  `id_adresse` INT UNSIGNED NOT NULL,
  `note` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_club_adresse1_idx` (`id_adresse` ASC),
  CONSTRAINT `fk_club_adresse1`
    FOREIGN KEY (`id_adresse`)
    REFERENCES `le_site_du_sport`.`adresse` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`sport`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`sport` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `photo` VARCHAR(255) NULL,
  `id_categorie` INT UNSIGNED NOT NULL,
  `id_club` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sport_categorie1_idx` (`id_categorie` ASC),
  INDEX `fk_sport_club1_idx` (`id_club` ASC),
  CONSTRAINT `fk_sport_categorie1`
    FOREIGN KEY (`id_categorie`)
    REFERENCES `le_site_du_sport`.`categorie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sport_club1`
    FOREIGN KEY (`id_club`)
    REFERENCES `le_site_du_sport`.`club` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`leader`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`leader` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` VARCHAR(255) NULL,
  `code` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `pseudo_UNIQUE` (`pseudo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`groupe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`groupe` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `leader` VARCHAR(255) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `photo` VARCHAR(255) NOT NULL,
  `pseudo` VARCHAR(255) NOT NULL,
  `id_sport` INT UNSIGNED NOT NULL,
  `id_leader` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_groupe_sport1_idx` (`id_sport` ASC),
  INDEX `fk_groupe_leader1_idx` (`id_leader` ASC),
  CONSTRAINT `fk_groupe_sport1`
    FOREIGN KEY (`id_sport`)
    REFERENCES `le_site_du_sport`.`sport` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_groupe_leader1`
    FOREIGN KEY (`id_leader`)
    REFERENCES `le_site_du_sport`.`leader` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`evenement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`evenement` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL,
  `description` VARCHAR(255) NULL,
  `titre` VARCHAR(255) NULL,
  `nb_max_pers` VARCHAR(255) NOT NULL,
  `id_groupe` INT UNSIGNED NOT NULL,
  `id_adresse` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_evenement_groupe2_idx` (`id_groupe` ASC),
  INDEX `fk_evenement_adresse1_idx` (`id_adresse` ASC),
  CONSTRAINT `fk_evenement_groupe2`
    FOREIGN KEY (`id_groupe`)
    REFERENCES `le_site_du_sport`.`groupe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evenement_adresse1`
    FOREIGN KEY (`id_adresse`)
    REFERENCES `le_site_du_sport`.`adresse` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`administrateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`administrateur` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `prenom` VARCHAR(255) NOT NULL,
  `mail` VARCHAR(255) NOT NULL,
  `mot_de_passe` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`utilisateur_groupe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`utilisateur_groupe` (
  `id_utilisateur` INT UNSIGNED NOT NULL,
  `id_groupe` INT UNSIGNED NOT NULL,
  INDEX `fk_utilisateur/groupe_utilisateur1_idx` (`id_utilisateur` ASC),
  INDEX `fk_utilisateur/groupe_groupe1_idx` (`id_groupe` ASC),
  CONSTRAINT `fk_utilisateur/groupe_utilisateur1`
    FOREIGN KEY (`id_utilisateur`)
    REFERENCES `le_site_du_sport`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateur/groupe_groupe1`
    FOREIGN KEY (`id_groupe`)
    REFERENCES `le_site_du_sport`.`groupe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`liste_de_participant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`liste_de_participant` (
  `id_utilisateur` INT UNSIGNED NOT NULL,
  `id_evenement` INT UNSIGNED NOT NULL,
  INDEX `fk_liste de participant_utilisateur1_idx` (`id_utilisateur` ASC),
  INDEX `fk_liste de participant_evenement1_idx` (`id_evenement` ASC),
  CONSTRAINT `fk_liste de participant_utilisateur1`
    FOREIGN KEY (`id_utilisateur`)
    REFERENCES `le_site_du_sport`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_liste de participant_evenement1`
    FOREIGN KEY (`id_evenement`)
    REFERENCES `le_site_du_sport`.`evenement` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`sujet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`sujet` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `texte` VARCHAR(255) NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`rubrique`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`rubrique` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(255) NULL,
  `description` VARCHAR(255) NULL,
  `id_sujet` INT UNSIGNED NOT NULL,
  `id_utilisateur` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Rubrique_sujet2_idx` (`id_sujet` ASC),
  INDEX `fk_Rubrique_utilisateur1_idx` (`id_utilisateur` ASC),
  CONSTRAINT `fk_Rubrique_sujet2`
    FOREIGN KEY (`id_sujet`)
    REFERENCES `le_site_du_sport`.`sujet` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Rubrique_utilisateur1`
    FOREIGN KEY (`id_utilisateur`)
    REFERENCES `le_site_du_sport`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`message` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `texte` VARCHAR(255) NOT NULL,
  `position` SMALLINT NOT NULL,
  `date` DATETIME NOT NULL,
  `id_utilisateur` INT UNSIGNED NOT NULL,
  `id_rubrique` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_message_utilisateur1_idx` (`id_utilisateur` ASC),
  INDEX `fk_message_Rubrique2_idx` (`id_rubrique` ASC),
  CONSTRAINT `fk_message_utilisateur1`
    FOREIGN KEY (`id_utilisateur`)
    REFERENCES `le_site_du_sport`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_Rubrique2`
    FOREIGN KEY (`id_rubrique`)
    REFERENCES `le_site_du_sport`.`rubrique` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`utilisateur_sport`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`utilisateur_sport` (
  `id_utilisateur` INT UNSIGNED NOT NULL,
  `id_sport` INT UNSIGNED NOT NULL,
  INDEX `fk_utilisateur_has_sport_utilisateur2_idx` (`id_utilisateur` ASC),
  INDEX `fk_utilisateur_has_sport_sport2_idx` (`id_sport` ASC),
  CONSTRAINT `fk_utilisateur_has_sport_utilisateur2`
    FOREIGN KEY (`id_utilisateur`)
    REFERENCES `le_site_du_sport`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateur_has_sport_sport2`
    FOREIGN KEY (`id_sport`)
    REFERENCES `le_site_du_sport`.`sport` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `le_site_du_sport`.`FAQ`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `le_site_du_sport`.`FAQ` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` VARCHAR(255) NOT NULL,
  `reponse` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;