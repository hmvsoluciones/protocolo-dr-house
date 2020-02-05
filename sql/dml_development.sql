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
('Luis Arturo', 'Munguia', 'Valdés', 'arturomv1930@gmail.com', 'arturomv1930@gmail.com', 'Uk9CVkFMU0lMTVVOTU9STVzyEjdiLA3SmfLWj1wWkxBitPh/7TkEsgjYxtsTu93LKHcxoOkPMuvHPEsDQENvuA==', 1),
('Felipe', 'Corona', 'Macotela', 'fcorona@gmail.com', 'fcorona@gmail.com', 'Uk9CVkFMU0lMTVVOTU9STVzyEjdiLA3SmfLWj1wWkxBitPh/7TkEsgjYxtsTu93LKHcxoOkPMuvHPEsDQENvuA==', 1),
('Rafael Eloy', 'Ricardez', 'Galindos', 'rricardez@grupofarmacos.com', 'rricardez', 'Uk9CVkFMU0lMTVVOTU9STVzyEjdiLA3SmfLWj1wWkxBitPh/7TkEsgjYxtsTu93LKHcxoOkPMuvHPEsDQENvuA==', 1);


INSERT INTO role(NAME,NAMEEN) VALUES
('ADMINISTRADOR', 'ADMIN'),
('REPORTES', 'REPORTS');


INSERT INTO menu(IDROLE, ICONO, MENU, MENUEN) VALUES
((SELECT IDROLE from role WHERE NAMEEN LIKE 'ADMIN'), 'fa fa-user', 'Usuarios', 'Users'),
((SELECT IDROLE from role WHERE NAMEEN LIKE 'ADMIN'), 'fa fa-book', 'Catálogos', 'Catalogs'),
((SELECT IDROLE from role WHERE NAMEEN LIKE 'REPORTS'), 'fa fa-user', 'Catálogos', 'Catalogs');


INSERT INTO submenu(NAME, URL, IDMENU, NAMEEN) VALUES
('Admon. Catálogos', 'components/catalogs/index.php', (SELECT IDMENU FROM menu WHERE MENUEN LIKE 'Catalogs'  AND IDROLE  = (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'ADMIN')), 'Admin Catalogs'),
('Admon. Usuarios', 'components/users/index.php', (SELECT IDMENU FROM menu WHERE MENUEN LIKE 'Users'  AND IDROLE  = (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'ADMIN')), 'Admin Users'),
('Admon. Catálogos', 'components/catalogs/index.php', (SELECT IDMENU FROM menu WHERE MENUEN LIKE 'Catalogs'  AND IDROLE  = (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'REPORTS')), 'Admin Catalogs');

INSERT INTO userroles(IDUSER, IDROLE)VALUES
((SELECT IDUSER FROM admuser WHERE user LIKE 'arturomv1930@gmail.com'), (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'ADMIN')),
((SELECT IDUSER FROM admuser WHERE user LIKE 'arturomv1930@gmail.com'), (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'REPORTS')),
((SELECT IDUSER FROM admuser WHERE user LIKE 'fcorona@gmail.com'), (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'ADMIN')),
((SELECT IDUSER FROM admuser WHERE user LIKE 'fcorona@gmail.com'), (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'REPORTS')),
((SELECT IDUSER FROM admuser WHERE user LIKE 'rricardez'), (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'ADMIN')),
((SELECT IDUSER FROM admuser WHERE user LIKE 'rricardez'), (SELECT IDROLE FROM role WHERE NAMEEN LIKE 'REPORTS'));

