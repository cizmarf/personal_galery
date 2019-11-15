CREATE TABLE `registrace2`.`uzivatel` (
	`id_uzivatel` INT(32) NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(123) NOT NULL ,
	`jmeno` VARCHAR(123) NOT NULL ,
	`heslo_SHA1` VARCHAR(123) NOT NULL ,
PRIMARY KEY (`id_uzivatel`) ENGINE = MyISAM;

CREATE TABLE `registrace2`.`slozky` (
	`id_slozky` INT(32) NOT NULL AUTO_INCREMENT,
	`id_uzivatel` INT(32) NOT NULL ,
	`nadslozka_id` INT(32) NULL ,
	`jmeno` VARCHAR(123) NOT NULL ,
PRIMARY KEY (`id_slozky`)) ENGINE = MyISAM;

CREATE TABLE `registrace2`.`obrazky` (
	`id_obrazky` INT(32) NOT NULL AUTO_INCREMENT ,
	`id_slozky` INT(32) NOT NULL ,
	`id_uzivatel` INT(32) NOT NULL ,
	`format` INT(32) NOT NULL ,
PRIMARY KEY (`id_obrazky`)) ENGINE = MyISAM;

CREATE TABLE `registrace2`.`formaty` (
	`id_formaty` INT NOT NULL ,
	`format` VARCHAR(7) NOT NULL ,
PRIMARY KEY (`id_formaty`)) ENGINE = MyISAM;

INSERT INTO `formaty` (id_formaty, format) VALUES (1, 'jpg'), (2, 'png'), (3, 'gif')
