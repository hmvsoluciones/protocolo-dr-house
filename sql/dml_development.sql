/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  SISTEMAS
 * Created: 27/08/2018
 */

INSERT INTO `admuser` (`NAME`, `LASTNAME`, `LASTNAME2`, `MAIL`, `USER`, `CREDENTIAL`, `STATE`) VALUES
('Luis Arturo', 'Munguia', 'Valdés', 'arturomv1930@gmail.com', 'arturomv1930@gmail.com', 'Uk9CVkFMU0lMTVVOTU9STVzyEjdiLA3SmfLWj1wWkxBitPh/7TkEsgjYxtsTu93LKHcxoOkPMuvHPEsDQENvuA==', 1);


INSERT INTO role(NAME,NAMEEN) VALUES
('ADMINISTRADOR', 'ADMIN'),
('REPORTES', 'REPORTS');


INSERT INTO menu(IDROLE, ICONO, MENU, MENUEN) VALUES
((SELECT IDROLE from role WHERE NAMEEN LIKE 'ADMIN'), 'fa fa-user', 'Usuarios', 'Users'),
((SELECT IDROLE from role WHERE NAMEEN LIKE 'ADMIN'), 'fa fa-book', 'Catálogos', 'Catalogs'),
((SELECT IDROLE from role WHERE NAMEEN LIKE 'REPORTS'), 'fa fa-user', 'Catálogos', 'Catalogs'),
((SELECT IDROLE from role WHERE NAMEEN LIKE 'ADMIN'), 'fa fa-table', 'Bitácora', 'Binnacle');


INSERT INTO submenu(NAME, URL, IDMENU, NAMEEN) VALUES
('Admon. Catálogos', 'components/catalogs/index.php', (SELECT IDMENU FROM menu WHERE MENUEN LIKE 'Catalogs'  AND IDROLE  = (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'ADMIN')), 'Admin Catalogs'),
('Admon. Usuarios', 'components/users/index.php', (SELECT IDMENU FROM menu WHERE MENUEN LIKE 'Users'  AND IDROLE  = (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'ADMIN')), 'Admin Users'),
('Admon. Catálogos', 'components/catalogs/index.php', (SELECT IDMENU FROM menu WHERE MENUEN LIKE 'Catalogs'  AND IDROLE  = (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'REPORTS')), 'Admin Catalogs'),
('Admon. Bitácora', 'components/binnacle/index.php', (SELECT IDMENU FROM menu WHERE MENUEN LIKE 'Binnacle'  AND IDROLE  = (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'ADMIN')), 'Admin Binnacle');

INSERT INTO userroles(IDUSER, IDROLE)VALUES
((SELECT IDUSER FROM admuser WHERE user LIKE 'arturomv1930@gmail.com'), (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'ADMIN')),
((SELECT IDUSER FROM admuser WHERE user LIKE 'arturomv1930@gmail.com'), (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'REPORTS'));

INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_STATE', 1, 'ACTIVO', 'ACTIVE', 1, 'Active Value', 1);
INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES ('CAT_STATE', 2, 'INACTIVO', 'INACTIVE', 2, 'Not Active', 1);


INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_TABLES', 1, 'admuser', 'admuser',  0, 'Application tables', 1);
INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_TABLES', 2, 'binnacle', 'binnacle', 0, 'Application tables', 1);
INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_TABLES', 3, 'catalogs', 'catalogs', 0, 'Application tables', 1);
INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_TABLES', 4, 'menu', 'menu', 0, 'Application tables', 1);
INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_TABLES', 5, 'role','role', 0, 'Application tables', 1);
INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_TABLES', 6, 'session', 'session', 0, 'Application tables', 1);
INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_TABLES', 7, 'submenu', 'submenu', 0, 'Application tables', 1);
INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_TABLES', 8, 'userroles', 'userroles',0, 'Application tables', 1);

INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_CRUD', 1, 'CREATE', 'CREATE',  1, 'INSERT DATA', 1);
INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_CRUD', 2, 'READ', 'READ', 2, 'SELECT DATA', 1);
INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_CRUD', 3, 'UPDATE', 'UPDATE', 3, 'UPDATE DATA', 1);
INSERT INTO catalogs(`DOMAIN`, `CATALOGKEY`, `VALUEES`, `VALUEEN`, `CATALOGORDER`, `DESCRIPTION`, `STATE`) VALUES('CAT_CRUD', 4, 'DELETE', 'DELETE', 4, 'DELETE DATA', 1);