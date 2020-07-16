/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  SISTEMAS
 * Created: 11/02/2020
 */

drop database bd_protocolo_dr_house;
create database bd_protocolo_dr_house;
use bd_protocolo_dr_house;

CREATE TABLE admuser (
                IDUSER BIGINT AUTO_INCREMENT NOT NULL,
                NAME VARCHAR(100) NOT NULL,
                LASTNAME VARCHAR(100) NOT NULL,
                LASTNAME2 VARCHAR(100),
                MAIL VARCHAR(100) NOT NULL,
                USER VARCHAR(50) NOT NULL,
                CREDENTIAL VARCHAR(500) NOT NULL,
                STATE INT NOT NULL,
                PRIMARY KEY (IDUSER)
);


CREATE TABLE session (
                SID VARCHAR(500) NOT NULL,
                USER VARCHAR(100) NOT NULL,
                LASTUPDATE TIME NOT NULL,
                DATE DATE NOT NULL,
                PRIMARY KEY (SID)
);


CREATE TABLE role (
                IDROLE INT AUTO_INCREMENT NOT NULL,
                NAME VARCHAR(200) NOT NULL,
                NAMEEN VARCHAR(200) NOT NULL,
                PRIMARY KEY (IDROLE)
);


CREATE TABLE userroles (
                IDUSERROLES INT AUTO_INCREMENT NOT NULL,
                IDUSER BIGINT NOT NULL,
                IDROLE INT NOT NULL,
                PRIMARY KEY (IDUSERROLES)
);


CREATE INDEX usuario_rolusuario_fk USING BTREE
 ON userroles
 ( IDUSER ASC );

CREATE INDEX rol_rolusuario_fk USING BTREE
 ON userroles
 ( IDROLE ASC );

CREATE TABLE menu (
                IDMENU INT AUTO_INCREMENT NOT NULL,
                IDROLE INT NOT NULL,
                ICONO VARCHAR(200) NOT NULL,
                MENU VARCHAR(100) NOT NULL,
                MENUEN VARCHAR(100) NOT NULL,
                PRIMARY KEY (IDMENU)
);


CREATE INDEX rol_menu_fk USING BTREE
 ON menu
 ( IDROLE ASC );

CREATE TABLE submenu (
                IDSUBMENU INT AUTO_INCREMENT NOT NULL,
                NAME VARCHAR(100) NOT NULL,
                URL VARCHAR(256) NOT NULL,
                IDMENU INT NOT NULL,
                NAMEEN VARCHAR(100) NOT NULL,
                PRIMARY KEY (IDSUBMENU)
);


CREATE INDEX menu_submenu_fk USING BTREE
 ON submenu
 ( IDMENU ASC );

CREATE TABLE catalogs (
  IDCATALOG int(11) NOT NULL AUTO_INCREMENT,
  DOMAIN varchar(100) NOT NULL,
  CATALOGKEY int(10) NOT NULL,
  VALUEES varchar(255) DEFAULT NULL,
  VALUEEN varchar(255) DEFAULT NULL,
  CATALOGORDER int(10) NOT NULL NULL,
  DESCRIPTION varchar(300),
  STATE smallint NOT NULL,
  PRIMARY KEY (IDCATALOG)
);

 CREATE TABLE binnacle(
  IDBINNACLE BIGINT NOT NULL AUTO_INCREMENT,
  REFERENCEID BIGINT NOT NULL,
  TABLECATALOGKEY INT(10) NOT NULL,
  TABLEDOMAIN VARCHAR(100) NOT NULL,
  OPERATIONCATALOGKEY INT(10) NOT NULL,
  OPERATIONDOMAIN VARCHAR(100) NOT NULL,
  OPERATIONDATE DATE NOT NULL,
  OPERATIONTIME TIME NOT NULL,
  LASTVALUE TEXT NOT NULL,
  IDUSER BIGINT NOT NULL,
  PRIMARY KEY(IDBINNACLE)
);


ALTER TABLE userroles ADD CONSTRAINT usuario_rolusuario_fk
FOREIGN KEY (IDUSER)
REFERENCES admuser (IDUSER)
ON DELETE NO ACTION
ON UPDATE NO ACTION;


ALTER TABLE menu ADD CONSTRAINT rol_menu_fk
FOREIGN KEY (IDROLE)
REFERENCES role (IDROLE)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE userroles ADD CONSTRAINT rol_rolusuario_fk
FOREIGN KEY (IDROLE)
REFERENCES role (IDROLE)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE submenu ADD CONSTRAINT menu_submenu_fk
FOREIGN KEY (IDMENU)
REFERENCES menu (IDMENU)
ON DELETE NO ACTION
ON UPDATE NO ACTION;