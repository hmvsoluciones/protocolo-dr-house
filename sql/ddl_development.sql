/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  SISTEMAS
 * Created: 27/08/2018
 */


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

CREATE TABLE catalogos (
                idCatalogo INT AUTO_INCREMENT NOT NULL,
                ClaveRubroCATS VARCHAR(8),
                ClaveEntidadCATS VARCHAR(8),
                EstatusRegistroCATS VARCHAR(1),
                DescripcionCATS VARCHAR(53),
                ClaveJustificadaCATS VARCHAR(1),
                ClasificadorNumerico01CATS DECIMAL(3,1),
                ClasificadorNumerico02CATS DECIMAL(3,1),
                ClasificadorAlfanumerico01CATS VARCHAR(7),
                ClasificadorAlfanumerico02CATS VARCHAR(1),
                ObservacionesCATS VARCHAR(17),
                FechaAltaCATS VARCHAR(21),
                FechaCambioCATS VARCHAR(21),
                IDUSERALTA BIGINT NOT NULL,
                IDUSERUPDATE BIGINT NOT NULL,
                PRIMARY KEY (idCatalogo)
);


ALTER TABLE userroles ADD CONSTRAINT usuario_rolusuario_fk
FOREIGN KEY (IDUSER)
REFERENCES admuser (IDUSER)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE catalogos ADD CONSTRAINT user_catalogos_fk
FOREIGN KEY (IDUSERALTA)
REFERENCES admuser (IDUSER)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE catalogos ADD CONSTRAINT user_catalogos_fk1
FOREIGN KEY (IDUSERUPDATE)
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