-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2019 a las 03:39:52
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cm_issemym_development`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admuser`
--

CREATE TABLE `admuser` (
  `IDUSER` bigint(20) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `LASTNAME2` varchar(100) DEFAULT NULL,
  `MAIL` varchar(100) NOT NULL,
  `USER` varchar(50) NOT NULL,
  `CREDENTIAL` varchar(500) NOT NULL,
  `STATE` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admuser`
--

INSERT INTO `admuser` (`IDUSER`, `NAME`, `LASTNAME`, `LASTNAME2`, `MAIL`, `USER`, `CREDENTIAL`, `STATE`) VALUES
(1, 'Luis Arturo', 'Munguia', 'Valdés', 'arturomv1930@gmail.com', 'arturomv1930@gmail.com', 'Uk9CVkFMU0lMTVVOTU9STVzyEjdiLA3SmfLWj1wWkxBitPh/7TkEsgjYxtsTu93LKHcxoOkPMuvHPEsDQENvuA==', 1),
(2, 'Felipe', 'Corona', 'Macotela', 'fcorona@gmail.com', 'fcorona@gmail.com', 'Uk9CVkFMU0lMTVVOTU9STVzyEjdiLA3SmfLWj1wWkxBitPh/7TkEsgjYxtsTu93LKHcxoOkPMuvHPEsDQENvuA==', 1),
(3, 'Rafael Eloy', 'Ricardez', 'Galindos', 'rricardez@grupofarmacos.com', 'rricardez', 'Uk9CVkFMU0lMTVVOTU9STVzyEjdiLA3SmfLWj1wWkxBitPh/7TkEsgjYxtsTu93LKHcxoOkPMuvHPEsDQENvuA==', 1),
(4, 'NOM', 'AP', 'AM', '', '', 'Uk9CVkFMU0lMTVVOTU9STVzyEjdiLA3SmfLWj1wWkxBitPh/7TkEsgjYxtsTu93LKHcxoOkPMuvHPEsDQENvuA==', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `ID` bigint(20) NOT NULL,
  `CLAVEALMACEN` varchar(8) NOT NULL,
  `NOMBREREAL` varchar(40) NOT NULL,
  `CLAVEACENDEP` varchar(50) DEFAULT NULL,
  `TIPO` varchar(1) NOT NULL,
  `CLAVEPERSONALRESPONSABLE` varchar(10) NOT NULL,
  `OBSERVACIONES` text,
  `CLAVEUSUARIOALTA` varchar(12) DEFAULT NULL,
  `FECHAALTA` datetime DEFAULT NULL,
  `CLAVEUSUARIOCAMBIO` varchar(12) DEFAULT NULL,
  `FECHACAMBIO` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `ID` bigint(20) NOT NULL,
  `IDREFERENCIA` bigint(20) NOT NULL,
  `CLAVETABLA` int(11) NOT NULL,
  `DOMINIOTABLA` varchar(255) NOT NULL,
  `CLAVEOPERACION` int(11) NOT NULL,
  `DOMINIOOPERACION` varchar(255) NOT NULL,
  `FECHA` date NOT NULL,
  `HORA` time NOT NULL,
  `LASTVALUE` text NOT NULL,
  `IDUSER` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`ID`, `IDREFERENCIA`, `CLAVETABLA`, `DOMINIOTABLA`, `CLAVEOPERACION`, `DOMINIOOPERACION`, `FECHA`, `HORA`, `LASTVALUE`, `IDUSER`) VALUES
(1, 3, 1, 'cat_tabla', 2, 'cat_operacion', '2018-11-06', '18:40:51', '{\"ID\":\"3\",\"MATRICULAMEDICO\":\"2\",\"ESTATUSREGISTRO\":\"1\",\"RFC\":\"2\",\"CURP\":\"2\",\"CEDULAPROFESIONAL\":\"2\",\"NOMBRE\":\"2\",\"APELLIDOPATERNO\":\"2\",\"APELLIDOMATERNO\":\"2\",\"CLAVERUBROESPECIALIDAD\":\"ESPECIAL\",\"CLAVEESPECIALIDAD\":\"PO\",\"TELEFONOS\":\"2\",\"FECHAINGRESO\":\"03-11-2018\",\"OBSERVACIONES\":\"2\",\"CLAVEUSUARIOALTA\":\"arturomv1930@gmail.com\",\"FECHAALTA\":\"02-11-2018\",\"CLAVEUSUARIOCAMBIO\":\"arturomv1930@gmail.com\",\"FECHACAMBIO\":\"06-11-2018\"}', 1),
(2, 3, 1, 'cat_tabla', 2, 'cat_operacion', '2018-11-06', '18:41:33', '{\"ID\":\"3\",\"MATRICULAMEDICO\":\"1\",\"ESTATUSREGISTRO\":\"1\",\"RFC\":\"1\",\"CURP\":\"1\",\"CEDULAPROFESIONAL\":\"1\",\"NOMBRE\":\"1\",\"APELLIDOPATERNO\":\"1\",\"APELLIDOMATERNO\":\"1\",\"CLAVERUBROESPECIALIDAD\":\"ESPECIAL\",\"CLAVEESPECIALIDAD\":\"PO\",\"TELEFONOS\":\"1\",\"FECHAINGRESO\":\"03-11-2018\",\"OBSERVACIONES\":\"1\",\"CLAVEUSUARIOALTA\":\"arturomv1930@gmail.com\",\"FECHAALTA\":\"02-11-2018\",\"CLAVEUSUARIOCAMBIO\":\"arturomv1930@gmail.com\",\"FECHACAMBIO\":\"06-11-2018\"}', 1),
(3, 3, 3, 'TABLAS', 2, 'CRUD', '2018-12-04', '22:42:54', '{\"ID\":\"3\",\"MATRICULAMEDICO\":\"3\",\"ESTATUSREGISTRO\":\"1\",\"RFC\":\"3\",\"CURP\":\"3\",\"CEDULAPROFESIONAL\":\"33\",\"NOMBRE\":\"3\",\"APELLIDOPATERNO\":\"33\",\"APELLIDOMATERNO\":\"3\",\"CLAVERUBROESPECIALIDAD\":\"ESPECIAL\",\"CLAVEESPECIALIDAD\":\"PO\",\"TELEFONOS\":\"3\",\"FECHAINGRESO\":\"03-11-2018\",\"OBSERVACIONES\":\"3\",\"CLAVEUSUARIOALTA\":\"arturomv1930@gmail.com\",\"FECHAALTA\":\"02-11-2018\",\"CLAVEUSUARIOCAMBIO\":\"arturomv1930@gmail.com\",\"FECHACAMBIO\":\"06-11-2018\"}', 1),
(4, 1, 11, 'TABLAS', 2, 'CRUD', '2018-12-04', '22:51:12', '{\"idCatalogo\":\"1\",\"ClaveRubroCATS\":\"AREATERA\",\"ClaveEntidadCATS\":\"NUTRI\",\"EstatusRegistroCATS\":\"1\",\"DescripcionCATS\":\"NUTRICION PARENTERAL\",\"ClaveJustificadaCATS\":\"N\",\"ClasificadorNumerico01CATS\":\"0.0\",\"ClasificadorNumerico02CATS\":\"0.0\",\"ClasificadorAlfanumerico01CATS\":\"*\",\"ClasificadorAlfanumerico02CATS\":\"*\",\"ObservacionesCATS\":\"NINGUNA\",\"IDUSERALTA\":\"1\",\"FechaAltaCATS\":\"1977\",\"IDUSERUPDATE\":\"1\",\"FechaCambioCATS\":\"2018-12-05\"}', 1),
(5, 14, 11, 'TABLAS', 2, 'CRUD', '2018-12-04', '22:51:59', '{\"idCatalogo\":\"14\",\"ClaveRubroCATS\":\"DIAGNOST\",\"ClaveEntidadCATS\":\"ASTROCP\",\"EstatusRegistroCATS\":\"A\",\"DescripcionCATS\":\"ASTROCITOMA POLIMIXOIDE\",\"ClaveJustificadaCATS\":\"N\",\"ClasificadorNumerico01CATS\":\"0.0\",\"ClasificadorNumerico02CATS\":\"0.0\",\"ClasificadorAlfanumerico01CATS\":\"*\",\"ClasificadorAlfanumerico02CATS\":\"*\",\"ObservacionesCATS\":\"NINGUNA\",\"IDUSERALTA\":\"1\",\"FechaAltaCATS\":\"1977\",\"IDUSERUPDATE\":\"1\",\"FechaCambioCATS\":\"1977\"}', 1),
(6, 1, 10, 'TABLAS', 2, 'CRUD', '2018-12-04', '22:59:06', '{\"IDUSER\":\"1\",\"NAME\":\"Luis Arturo\",\"LASTNAME\":\"Munguia\",\"LASTNAME2\":\"Valdu00e9s\",\"MAIL\":\"arturomv1930@gmail.com\",\"USER\":\"arturomv1930@gmail.com\",\"STATE\":\"1\"}', 1),
(7, 1, 10, 'TABLAS', 2, 'CRUD', '2018-12-18', '21:35:45', '{\"IDUSER\":\"1\",\"NAME\":\"Luis Arturo\",\"LASTNAME\":\"Munguia\",\"LASTNAME2\":\"Valdu00e9s\",\"MAIL\":\"arturomv1930@gmail.com\",\"USER\":\"arturomv1930@gmail.com\",\"STATE\":\"1\"}', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogos`
--

CREATE TABLE `catalogos` (
  `idCatalogo` int(11) NOT NULL,
  `NombreCatalogoCATS` varchar(100) NOT NULL,
  `ClaveRubroCATS` varchar(8) DEFAULT NULL,
  `ClaveEntidadCATS` varchar(8) DEFAULT NULL,
  `EstatusRegistroCATS` varchar(1) DEFAULT NULL,
  `DescripcionCATS` varchar(53) DEFAULT NULL,
  `ClaveJustificadaCATS` varchar(1) DEFAULT NULL,
  `ClasificadorNumerico01CATS` decimal(3,1) DEFAULT NULL,
  `ClasificadorNumerico02CATS` decimal(3,1) DEFAULT NULL,
  `ClasificadorAlfanumerico01CATS` varchar(7) DEFAULT NULL,
  `ClasificadorAlfanumerico02CATS` varchar(1) DEFAULT NULL,
  `ObservacionesCATS` varchar(17) DEFAULT NULL,
  `FechaAltaCATS` varchar(21) DEFAULT NULL,
  `FechaCambioCATS` varchar(21) DEFAULT NULL,
  `IDUSERALTA` bigint(20) NOT NULL,
  `IDUSERUPDATE` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogos`
--

INSERT INTO `catalogos` (`idCatalogo`, `NombreCatalogoCATS`, `ClaveRubroCATS`, `ClaveEntidadCATS`, `EstatusRegistroCATS`, `DescripcionCATS`, `ClaveJustificadaCATS`, `ClasificadorNumerico01CATS`, `ClasificadorNumerico02CATS`, `ClasificadorAlfanumerico01CATS`, `ClasificadorAlfanumerico02CATS`, `ObservacionesCATS`, `FechaAltaCATS`, `FechaCambioCATS`, `IDUSERALTA`, `IDUSERUPDATE`) VALUES
(1, 'AREATERA', 'AREATERA', 'NUTRI', '1', 'NUTRICION PARENTERAL', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '2018-12-05', 1, 1),
(2, 'AREATERA', 'AREATERA', 'ONCO', '2', 'ONCOLOGIA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '2018-12-05', 1, 1),
(3, 'CLASMEDT', 'CLASMEDT', 'ANTIBIO', '1', 'ANTIBIOTICOS', 'N', '0.0', '0.0', '001', '*', 'NINGUNA', '1977', '2018-12-05', 1, 1),
(4, 'CLASMEDT', 'CLASMEDT', 'ANTIMONO', 'A', 'ANTICUERPOS MONOCLONALES', 'N', '0.0', '0.0', '006', '*', 'NINGUNA', '1977', '1977', 1, 1),
(5, 'CLASMEDT', 'CLASMEDT', 'CAR001', 'A', 'CARFILZOMIB', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(6, 'CLASMEDT', 'CLASMEDT', 'ELECTRO', 'A', 'ELECTROLITO', 'N', '0.0', '0.0', '001', '*', 'NINGUNA', '1977', '1977', 1, 1),
(7, 'CLASMEDT', 'CLASMEDT', 'MEDICAM', 'A', 'MEDICAMENTO', 'N', '1.0', '1.0', '001', '1', 'NINGUNA', '1977', '1977', 1, 1),
(8, 'CLASMEDT', 'CLASMEDT', 'ONCO', 'A', 'ONCOLOGICOS', 'N', '0.0', '0.0', '005', '*', 'NINGUNA', '1977', '1977', 1, 1),
(9, 'CLASMEDT', 'CLASMEDT', 'SOLBASE', 'A', 'SOLUCION BASE', 'N', '0.0', '0.0', '004', '*', 'NINGUNA', '1977', '1977', 1, 1),
(10, 'CLASMEDT', 'CLASMEDT', 'TERBLANC', 'A', 'TERAPIA BLANCO', 'N', '0.0', '0.0', '007', '*', 'NINGUNA', '1977', '1977', 1, 1),
(11, 'CLASMEDT', 'CLASMEDT', 'VITAMINA', 'A', 'VITAMINAS', 'N', '0.0', '0.0', '003', '*', 'NINGUNA', '1977', '1977', 1, 1),
(12, 'DIAGNOST', 'DIAGNOST', 'AMILOIDO', 'A', 'AMILOIDOSIS RENAL', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(13, 'DIAGNOST', 'DIAGNOST', 'ANEMIADH', 'A', 'ANEMIA POR DEFICIENCIA DE HIERRO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(14, 'DIAGNOST', 'DIAGNOST', 'ASTROCP', '2', 'ASTROCITOMA POLIMIXOIDE', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '2018-12-05', 1, 1),
(15, 'DIAGNOST', 'DIAGNOST', 'BRONCOGE', 'A', 'CANCER BRONCOGENICO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(16, 'DIAGNOST', 'DIAGNOST', 'CAAMPVAT', 'A', 'CANCER DE AMPULA DE VATER', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(17, 'DIAGNOST', 'DIAGNOST', 'CAAPEND', 'A', 'CANCER DE APENDICE', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(18, 'DIAGNOST', 'DIAGNOST', 'CABCUELL', 'A', 'CANCER DE CABEZA Y CUELLO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(19, 'DIAGNOST', 'DIAGNOST', 'CABILIAR', 'A', 'CANCER DE VIAS BILIARES', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(20, 'DIAGNOST', 'DIAGNOST', 'CACERUTE', 'A', 'CANCER CERVICOUTERINO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(21, 'DIAGNOST', 'DIAGNOST', 'CACOLON', 'A', 'CANCER DE COLON', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(22, 'DIAGNOST', 'DIAGNOST', 'CACUERBU', 'A', 'CANCER DE CUERDAS BUCALES', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(23, 'DIAGNOST', 'DIAGNOST', 'CAENDO', 'A', 'CANCER DE ENDOMETRIO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(24, 'DIAGNOST', 'DIAGNOST', 'CAEPI', 'A', 'CANCER EPIDERMOIDE', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(25, 'DIAGNOST', 'DIAGNOST', 'CAESOFAG', 'A', 'CANCER DE ESOFAGO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(26, 'DIAGNOST', 'DIAGNOST', 'CAESTOM', 'A', 'CANCER DE ESTOMAGO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(27, 'DIAGNOST', 'DIAGNOST', 'CAFARING', 'A', 'CANCER DE FARINGE', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(28, 'DIAGNOST', 'DIAGNOST', 'CAGASTR', 'A', 'CANCER GASTRICO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(29, 'DIAGNOST', 'DIAGNOST', 'CAINT', 'A', 'CANCER DE INTESTINO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(30, 'DIAGNOST', 'DIAGNOST', 'CAINTES', 'A', '*', 'N', '0.0', '0.0', '*', '*', 'CANCER DE INTESTI', '1977', '1977', 1, 1),
(31, 'DIAGNOST', 'DIAGNOST', 'CALAB', 'A', 'CANCER DE LABIO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(32, 'DIAGNOST', 'DIAGNOST', 'CALARING', 'A', 'CANCER DE LARINGE', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(33, 'DIAGNOST', 'DIAGNOST', 'CALE', 'A', 'CANCER DE LENGUA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(34, 'DIAGNOST', 'DIAGNOST', 'CAMAMA', 'A', 'CANCER DE MAMA', 'N', '0.0', '0.0', '0', '0', 'NINGUNA', '1977', '1977', 1, 1),
(35, 'DIAGNOST', 'DIAGNOST', 'CAOVARIO', 'A', 'CANCER OVARIO', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(36, 'DIAGNOST', 'DIAGNOST', 'CAPANCRE', 'A', 'CANCER DE PANCREAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(37, 'DIAGNOST', 'DIAGNOST', 'CAPAROT', 'A', 'CANCER DE PAROTIDA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(38, 'DIAGNOST', 'DIAGNOST', 'CAPELV', 'A', 'CANCER PELVICO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(39, 'DIAGNOST', 'DIAGNOST', 'CAPENE', 'A', 'CANCER DE PENE', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(40, 'DIAGNOST', 'DIAGNOST', 'CAPERITO', 'A', 'CANCER DE PERITONEO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(41, 'DIAGNOST', 'DIAGNOST', 'CARECTO', 'A', 'CANCER DE RECTO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(42, 'DIAGNOST', 'DIAGNOST', 'CAREN', 'A', 'CANCER RENAL', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(43, 'DIAGNOST', 'DIAGNOST', 'CARENAL', 'A', 'CANCER DE RIÑON', 'N', '1.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(44, 'DIAGNOST', 'DIAGNOST', 'CATESTIC', 'A', 'CANCER DE TESTICULO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(45, 'DIAGNOST', 'DIAGNOST', 'CATIROID', 'A', 'CANCER DE TIROIDES', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(46, 'DIAGNOST', 'DIAGNOST', 'CAUROGEN', 'A', 'CANCER UROGENITAL', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(47, 'DIAGNOST', 'DIAGNOST', 'CAUTER', 'A', 'CANCER DE CUELLO DE UTERO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(48, 'DIAGNOST', 'DIAGNOST', 'CAVAGINA', 'A', 'CANCER DE VAGINA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(49, 'DIAGNOST', 'DIAGNOST', 'CAVEJIGA', 'A', 'CANCER DE VEJIGA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(50, 'DIAGNOST', 'DIAGNOST', 'CAVES', 'A', 'CANCER VESICAL', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(51, 'DIAGNOST', 'DIAGNOST', 'DISGERMO', 'A', 'DISGERMINOMA DE OVARIO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(52, 'DIAGNOST', 'DIAGNOST', 'ENFCASTL', 'A', 'ENFERMEDAD DE CASTLEMAN MIXTA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(53, 'DIAGNOST', 'DIAGNOST', 'FSARCOAB', 'A', 'FIBROSARCOMA ABDOMINAL ALTO RIESGO E III', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(54, 'DIAGNOST', 'DIAGNOST', 'GLIOTALL', 'A', 'GLIOMA DE TALLO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(55, 'DIAGNOST', 'DIAGNOST', 'HEMOF', 'A', 'HEMOFILIA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(56, 'DIAGNOST', 'DIAGNOST', 'HISTOC', 'A', 'HISTOCITIOSIS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(57, 'DIAGNOST', 'DIAGNOST', 'LAM', 'A', 'LEUCEMIA AGUDA MIELOBLASTICA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(58, 'DIAGNOST', 'DIAGNOST', 'LB', 'A', 'LINFOMA DE BURKITT', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(59, 'DIAGNOST', 'DIAGNOST', 'LEULINAG', 'A', 'LEUCEMIA LINFOCITICA AGUDA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(60, 'DIAGNOST', 'DIAGNOST', 'LEULINC', 'A', 'LEUCEMIA LINFOCITICA CRONICA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(61, 'DIAGNOST', 'DIAGNOST', 'LEUMC', 'A', 'LEUCEMIA MIELOMONOCITICA CRONICA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(62, 'DIAGNOST', 'DIAGNOST', 'LEUMIELA', 'A', 'LEUCEMIA MIELOBLASTICA AGUDA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(63, 'DIAGNOST', 'DIAGNOST', 'LEUNE', 'A', 'LEUCEMIA NO ESPECIFICADA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(64, 'DIAGNOST', 'DIAGNOST', 'LINFCGB', 'A', 'LINFOMA DE CELULAS GRANDES B', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(65, 'DIAGNOST', 'DIAGNOST', 'LINFFOL', 'A', 'LINFOMA FOLICULAR', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(66, 'DIAGNOST', 'DIAGNOST', 'LINFNODU', 'A', 'LINFOMA HODGKIN NODULAR', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(67, 'DIAGNOST', 'DIAGNOST', 'LINFPCEL', 'A', 'LINFOMA PERIFERICODE CELULAS T PERIFERICO EC IV', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(68, 'DIAGNOST', 'DIAGNOST', 'LINHOGNM', 'A', 'LINFOMA HODGKIN NO NODULAR', 'N', '0.0', '0.0', '*', '*', '', '1977', '1977', 1, 1),
(69, 'DIAGNOST', 'DIAGNOST', 'LINNOHOD', 'A', 'LINFOMA NO HODGKIN', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(70, 'DIAGNOST', 'DIAGNOST', 'LIPOMIXO', 'A', 'LIPOSARCOMA MIXOIDE', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(71, 'DIAGNOST', 'DIAGNOST', 'LLA', 'A', 'LEUCEMIA LINFOBLASTICA AGUDA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(72, 'DIAGNOST', 'DIAGNOST', 'LLAAR', 'A', 'LEUCEMIA LINFOBLASTICA AGUDA ALTO RIESGO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(73, 'DIAGNOST', 'DIAGNOST', 'LLAR', 'A', 'LEUCEMIA LINFOBLASTICA AGUDA EN RECAIDA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(74, 'DIAGNOST', 'DIAGNOST', 'LNHI', 'A', 'LINFOMA NO HODKIN INDIFERENCIADO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(75, 'DIAGNOST', 'DIAGNOST', 'MAGLOBWA', 'A', 'MACROGLOBULINEMIA WALDESTRÖM', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(76, 'DIAGNOST', 'DIAGNOST', 'MEDANAFP', 'A', 'MEDULOBLASTOMA ANAPLASICO FOSA POSTERIOR', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(77, 'DIAGNOST', 'DIAGNOST', 'MEDULOBF', 'A', 'MEDULOBLASTOMA EN FOSA POSTERIOR CRANEAL', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(78, 'DIAGNOST', 'DIAGNOST', 'MEDULOBL', 'A', 'MEDULOBLASTOMA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(79, 'DIAGNOST', 'DIAGNOST', 'MELANO', 'A', 'MELANOMA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(80, 'DIAGNOST', 'DIAGNOST', 'MESOTEL', 'A', 'MESOTELIOMA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(81, 'DIAGNOST', 'DIAGNOST', 'MIEMULT', 'A', 'MIELOMA MULTIPLE', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(82, 'DIAGNOST', 'DIAGNOST', 'OSTEOSAR', 'A', 'OSTEOSARCOMA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(83, 'DIAGNOST', 'DIAGNOST', 'OSTEOSIV', 'A', 'OSTEOSARCOMA E IV', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(84, 'DIAGNOST', 'DIAGNOST', 'PROSTATA', 'A', 'CANCER DE PROSTATA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(85, 'DIAGNOST', 'DIAGNOST', 'PTI', 'A', 'PURPURA TROMBOCITOPENICA IDEOPATICA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(86, 'DIAGNOST', 'DIAGNOST', 'PULMOND', 'A', 'CANCER PULMON DERECHO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(87, 'DIAGNOST', 'DIAGNOST', 'PULMONI', 'A', 'CANCER PULMON IZQUIERDO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(88, 'DIAGNOST', 'DIAGNOST', 'RABDOSAR', 'A', 'RABDOMIOSARCOMA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(89, 'DIAGNOST', 'DIAGNOST', 'RABDSARC', 'A', 'RABDOSARCOMA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(90, 'DIAGNOST', 'DIAGNOST', 'SAR', 'A', 'SARCOMA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(91, 'DIAGNOST', 'DIAGNOST', 'SARCSIN', 'A', 'SARCOMA SINOVIAL', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(92, 'DIAGNOST', 'DIAGNOST', 'SARCSINO', 'A', 'SARCOMA SINOVIAL', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(93, 'DIAGNOST', 'DIAGNOST', 'SEM', 'A', 'SARCOMA DE EDWING METASTASICO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(94, 'DIAGNOST', 'DIAGNOST', 'TERATMIX', 'A', 'TERATOMA MIXTO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(95, 'DIAGNOST', 'DIAGNOST', 'TIP', 'A', 'TROMBOCITOPENIA IDIOPÁTICA PRIMARIA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(96, 'DIAGNOST', 'DIAGNOST', 'TMHCA', 'A', 'TUMOR MALIGNO DEL HUESO Y DE CARTILAGO ARTICULAR', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(97, 'DIAGNOST', 'DIAGNOST', 'TNAREIV', 'A', 'TUMOR NEUROBLASTICOALTO RIESGO EIV', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(98, 'DIAGNOST', 'DIAGNOST', 'TSETI', 'A', 'TUMOR DE SEÑOS ENDODERMICOS DE TESTICULO IZQUIERDO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(99, 'DIAGNOST', 'DIAGNOST', 'TUFIPL', 'A', 'TUMOR FIBROSO DE PLEURA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(100, 'DIAGNOST', 'DIAGNOST', 'TUGER', 'A', 'TUMOR GERMINAL', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(101, 'DIAGNOST', 'DIAGNOST', 'TUMALABD', 'A', 'TUMOR MALIGNO DEL ABDOMEN', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(102, 'ENVASES', 'ENVASES', '0.1', 'A', 'JERINGA PRELLENADA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(103, 'ENVASES', 'ENVASES', '0001.00', 'A', 'ENVASE PARA VOLUMEN MAYOR A 100 ML', 'N', '40.6', '0.0', '*', '*', 'FRASCO DE 250 ML', '1977', '1977', 1, 1),
(104, 'ENVASES', 'ENVASES', '0275.00', 'A', 'ENVASE PARA VOLUMEN MAYOR A 275 ML', 'N', '52.6', '0.0', '*', '*', 'FRASCOS DE 500 ML', '1977', '1977', 1, 1),
(105, 'ENVASES', 'ENVASES', '0600.00', 'A', 'ENVASE PARA VOLUMEN MAYOR A 600 ML', 'N', '68.3', '0.0', '*', '*', 'FRASCO DE 1 LITRO', '1977', '1977', 1, 1),
(106, 'ENVASES', 'ENVASES', '1100.00', 'A', 'ENVASE PARA VOLUMEN MAYOR A 1100 ML', 'N', '59.0', '0.0', '*', '*', 'BOLSA DE 2 LITROS', '1977', '1977', 1, 1),
(107, 'ENVASES', 'ENVASES', '2100.00', 'A', 'ENVASE PARA VOLUMEN MAYOR A 2100 ML', 'N', '70.0', '0.0', '*', '*', 'BOLSA DE 3 L', '1977', '1977', 1, 1),
(108, 'ESPECIAL', 'ESPECIAL', 'CO', 'A', 'CIRUJANO ONCOLOGO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(109, 'ESPECIAL', 'ESPECIAL', 'MEDINT', 'A', 'MEDICO INTERNISTA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(110, 'ESPECIAL', 'ESPECIAL', 'MEDNEO', 'A', 'MEDICO NEONATOLOGO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(111, 'ESPECIAL', 'ESPECIAL', 'MEDPED', 'A', 'MEDICO PEDIATRA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(112, 'ESPECIAL', 'ESPECIAL', 'MEDUTI', 'A', 'MEDICO INTENSIVISTA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(113, 'ESPECIAL', 'ESPECIAL', 'OH', 'A', 'ONCO HEMATALOGO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(114, 'ESPECIAL', 'ESPECIAL', 'ONCO', 'A', 'ONCOLOGO CLINICO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(115, 'ESPECIAL', 'ESPECIAL', 'PO', 'A', 'PEDIATRA ONCOLOGO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(116, 'ESPECIAL', 'ESPECIAL', 'URINO', 'A', 'UROLOGO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(117, 'ESTADOS', 'ESTADOS', 'AGS', 'A', 'AGUASCALIENTES', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(118, 'ESTADOS', 'ESTADOS', 'BC', 'A', 'BAJA CALIFORNIA', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(119, 'ESTADOS', 'ESTADOS', 'BCS', 'A', 'BAJA CALIFORNIA SUR', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(120, 'ESTADOS', 'ESTADOS', 'CAMP', 'A', 'CAMPECHE', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(121, 'ESTADOS', 'ESTADOS', 'CHIA', 'A', 'CHIAPAS', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(122, 'ESTADOS', 'ESTADOS', 'CHIH', 'A', 'CHIHUAHUA', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(123, 'ESTADOS', 'ESTADOS', 'COAH', 'A', 'COAHUILA', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(124, 'ESTADOS', 'ESTADOS', 'COL', 'A', 'COLIMA', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(125, 'ESTADOS', 'ESTADOS', 'DF', 'A', 'DISTRITO FEDERAL', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(126, 'ESTADOS', 'ESTADOS', 'DGO', 'A', 'DURANGO', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(127, 'ESTADOS', 'ESTADOS', 'GRO', 'A', 'GUERRERO', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(128, 'ESTADOS', 'ESTADOS', 'GTO', 'A', 'GUANAJUATO', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(129, 'ESTADOS', 'ESTADOS', 'HGO', 'A', 'HIDALGO', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(130, 'ESTADOS', 'ESTADOS', 'JAL', 'A', 'JALISCO', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(131, 'ESTADOS', 'ESTADOS', 'MEX', 'A', 'ESTADO DE MEXICO', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(132, 'ESTADOS', 'ESTADOS', 'MICH', 'A', 'MICHOACAN', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(133, 'ESTADOS', 'ESTADOS', 'MOR', 'A', 'MORELOS', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(134, 'ESTADOS', 'ESTADOS', 'NAY', 'A', 'NAYARIT', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(135, 'ESTADOS', 'ESTADOS', 'NL', 'A', 'NUEVO LEON', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(136, 'ESTADOS', 'ESTADOS', 'OAX', 'A', 'OAXACA', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(137, 'ESTADOS', 'ESTADOS', 'PUE', 'A', 'PUEBLA', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(138, 'ESTADOS', 'ESTADOS', 'QR', 'A', 'QUINTANA ROO', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(139, 'ESTADOS', 'ESTADOS', 'QRO', 'A', 'QUERETARO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(140, 'ESTADOS', 'ESTADOS', 'SIN', 'A', 'SINALOA', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(141, 'ESTADOS', 'ESTADOS', 'SLP', 'A', 'SAN LUIS POTOSI', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(142, 'ESTADOS', 'ESTADOS', 'SON', 'A', 'SONORA', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(143, 'ESTADOS', 'ESTADOS', 'TAB', 'A', 'TABASCO', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(144, 'ESTADOS', 'ESTADOS', 'TAMPS', 'A', 'TAMAULIPAS', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(145, 'ESTADOS', 'ESTADOS', 'TLAX', 'A', 'TLAXCALA', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(146, 'ESTADOS', 'ESTADOS', 'VER', 'A', 'VERACRUZ', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(147, 'ESTADOS', 'ESTADOS', 'YUC', 'A', 'YUCATAN', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(148, 'ESTADOS', 'ESTADOS', 'ZAC', 'A', 'ZACATECAS', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(149, 'ETAPA', 'ETAPA', 'I', 'A', 'I', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(150, 'ETAPA', 'ETAPA', 'IA', 'A', 'IA', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(151, 'ETAPA', 'ETAPA', 'IB', 'A', 'IB', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(152, 'ETAPA', 'ETAPA', 'IC', 'A', 'IC', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(153, 'ETAPA', 'ETAPA', 'II', 'A', 'II', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(154, 'ETAPA', 'ETAPA', 'IIA', 'A', 'IIA', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(155, 'ETAPA', 'ETAPA', 'IIB', 'A', 'IIB', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(156, 'ETAPA', 'ETAPA', 'IIC', 'A', 'IIC', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(157, 'ETAPA', 'ETAPA', 'III', 'A', 'III', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(158, 'ETAPA', 'ETAPA', 'IIIA', 'A', 'IIIA', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(159, 'ETAPA', 'ETAPA', 'IIIB', 'A', 'IIIB', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(160, 'ETAPA', 'ETAPA', 'IIIC', 'A', 'IIIC', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(161, 'ETAPA', 'ETAPA', 'IV', 'A', 'IV', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(162, 'ETAPA', 'ETAPA', 'IVA', 'A', 'IVA', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(163, 'ETAPA', 'ETAPA', 'IVB', 'A', 'IVB', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(164, 'ETAPA', 'ETAPA', 'IVC', 'A', 'IVC', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(165, 'ETAPA', 'ETAPA', 'V', 'A', 'V', 'N', '0.0', '0.0', '*', '', 'NINGUNA', '1977', '1977', 1, 1),
(166, 'FAMILIAS', 'FAMILIAS', '1', 'A', 'AMPOLLETAS/JER/VIALES Y FCO AMP', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(167, 'FAMILIAS', 'FAMILIAS', '2', 'A', 'GEL  JALEAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(168, 'FAMILIAS', 'FAMILIAS', '3', 'A', 'SUPOSITORIOS/ OVULOS/ ENEMAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(169, 'FAMILIAS', 'FAMILIAS', '4', 'A', 'TABLETAS/ COMPRIMIDOS/ CAPSULAS/  PERLAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(170, 'FAMILIAS', 'FAMILIAS', '5', 'A', 'JARABE. SUSPENSION. POLVOS Y SOLUCIONES', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(171, 'FAMILIAS', 'FAMILIAS', '6', 'A', 'GOTAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(172, 'FREADMON', 'FREADMON', 'C/24HRS', 'A', 'CADA 24 HORAS', 'N', '1.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(173, 'FREADMON', 'FREADMON', 'C/8HRS', 'A', 'CADA 8 HORAS', 'N', '3.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(174, 'GENERAL', 'GENERAL', 'AREATERA', 'A', 'AREAS TERAPEUTICAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(175, 'GENERAL', 'GENERAL', 'CLASMEDT', 'A', 'GRUPOS FARMACOLOGICOS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(176, 'GENERAL', 'GENERAL', 'DIAGNOST', 'A', 'DIAGNOSTICOS DEL PACIENTE', 'N', '0.0', '0.0', '', '*', 'NINGUNA', '1977', '1977', 1, 1),
(177, 'GENERAL', 'GENERAL', 'ENVASES', 'A', 'ENVASES PARA MEZCLAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(178, 'GENERAL', 'GENERAL', 'ESPECIAL', 'A', 'ESPECIALIDADES MEDICAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(179, 'GENERAL', 'GENERAL', 'ESTADOS', 'A', 'ESTADOS O ENTIDAD FEDERATIVA', 'N', '0.0', '0.0', '', '*', 'NINGUNA', '1977', '1977', 1, 1),
(180, 'GENERAL', 'GENERAL', 'ETAPA', 'A', 'ETAPAS DEL CICLO', 'N', '0.0', '0.0', '', '*', 'NINGUNA', '1977', '1977', 1, 1),
(181, 'GENERAL', 'GENERAL', 'FAMILIAS', 'A', 'FAMILIAS DE MEDICAMENTOS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(182, 'GENERAL', 'GENERAL', 'FREADMON', 'A', 'FRECUENCIA DE ADMINISTRACION', 'N', '0.0', '0.0', '', '*', 'NINGUNA', '1977', '1977', 1, 1),
(183, 'GENERAL', 'GENERAL', 'LABORATO', 'A', 'LABORATORIOS', 'N', '0.0', '0.0', '', '*', 'NINGUNA', '1977', '1977', 1, 1),
(184, 'GENERAL', 'GENERAL', 'MOTICANC', 'A', 'MOTIVO DE CANCELACION', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(185, 'GENERAL', 'GENERAL', 'MOTIMOVI', 'A', 'MOVIMIENTOS A INVENTARIO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(186, 'GENERAL', 'GENERAL', 'OBSERVAC', 'A', 'OBSERVACIONES PARA IMPRESION DE ETIQUETA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(187, 'GENERAL', 'GENERAL', 'PRESENTA', 'A', 'TIPOS DE PRESENTACIONES', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(188, 'GENERAL', 'GENERAL', 'PROVEEDS', 'A', 'PROVEEDORES', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(189, 'GENERAL', 'GENERAL', 'TIPOGENE', 'A', 'TIPO DE GENERICOS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(190, 'GENERAL', 'GENERAL', 'TIPOUNID', 'A', 'TIPOS DE UNIDADES DE MEDIDA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(191, 'LABORATO', 'LABORATO', '*', 'A', 'TAKEDA MEXICO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(192, 'LABORATO', 'LABORATO', '3MM001', 'A', '3M MEXICO  S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(193, 'LABORATO', 'LABORATO', 'ABB001', 'A', 'ABBOTT LABORATORIES DE MEXICO S.A. DE C', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(194, 'LABORATO', 'LABORATO', 'AHR024', 'A', 'AH ROBINS  DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(195, 'LABORATO', 'LABORATO', 'ALC025', 'A', 'ALCON LABORATORIOS S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(196, 'LABORATO', 'LABORATO', 'ALL026', 'A', 'ALLEN S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(197, 'LABORATO', 'LABORATO', 'ALL027', 'A', 'ALLERGAN S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(198, 'LABORATO', 'LABORATO', 'ALT001', 'A', 'ALTANA PHARMA S.A. DE C.V.', 'N', '10.0', '10.0', '1', '1', 'NINGUNA', '1977', '1977', 1, 1),
(199, 'LABORATO', 'LABORATO', 'AMGEN', 'A', 'AMGEN', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(200, 'LABORATO', 'LABORATO', 'AND028', 'A', 'ANDROMACO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(201, 'LABORATO', 'LABORATO', 'ANT001', 'A', 'ANTIBIOTICOS DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(202, 'LABORATO', 'LABORATO', 'APL029', 'A', 'APLICACIONES FARMACEUTICAS S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(203, 'LABORATO', 'LABORATO', 'ARM030', 'A', 'ARMSTRONG LAB. DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(204, 'LABORATO', 'LABORATO', 'ASO031', 'A', 'ASOFARMA DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(205, 'LABORATO', 'LABORATO', 'AST022', 'A', 'ASTRA MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(206, 'LABORATO', 'LABORATO', 'ATL032', 'A', 'ATLANTIS S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(207, 'LABORATO', 'LABORATO', 'AVB198', 'A', 'AVENTIS BEHRING S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(208, 'LABORATO', 'LABORATO', 'AVE197', 'A', 'AVENTIS PHARMA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(209, 'LABORATO', 'LABORATO', 'AVP001', 'A', 'PM-C VACUNAS S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(210, 'LABORATO', 'LABORATO', 'BAJ135', 'A', 'LABORATORIOS BAJAMED S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(211, 'LABORATO', 'LABORATO', 'BAX033', 'A', 'BAXTER S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(212, 'LABORATO', 'LABORATO', 'BAY034', 'A', 'BAYER DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(213, 'LABORATO', 'LABORATO', 'BEX035', 'A', 'BEXALPHARMA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(214, 'LABORATO', 'LABORATO', 'BIO036', 'A', 'BIOCLOM S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(215, 'LABORATO', 'LABORATO', 'BIO037', 'A', 'BIORESEARCH DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(216, 'LABORATO', 'LABORATO', 'BIO081', 'A', 'LABORATORIOS BIOPHARMA S.A. DE C.V.', 'X', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(217, 'LABORATO', 'LABORATO', 'BIO200', 'A', 'BIOMEP S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(218, 'LABORATO', 'LABORATO', 'BOE038', 'A', 'BOEHRINGER INGELHEIM PROMECO S.A. DE C.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(219, 'LABORATO', 'LABORATO', 'BRI002', 'A', 'BRISTOL-MYERS SQUIBB DE MEXICO S.A. DE ', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(220, 'LABORATO', 'LABORATO', 'BYK003', 'A', 'BYK GULDEN S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(221, 'LABORATO', 'LABORATO', 'CAR040', 'A', 'CARTER WALLACE S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(222, 'LABORATO', 'LABORATO', 'CEN048', 'A', 'FARMACIA DE ESPECIALIDADES (SUC. CENTRO)', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(223, 'LABORATO', 'LABORATO', 'CEN078', 'A', 'LABORATORIOS CENTEON S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(224, 'LABORATO', 'LABORATO', 'CIE107', 'A', 'PRODUCTOS CIENTIFICOS S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(225, 'LABORATO', 'LABORATO', 'CIL004', 'A', 'CILAG DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(226, 'LABORATO', 'LABORATO', 'COL082', 'A', 'LABORATORIOS COLUMBIA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(227, 'LABORATO', 'LABORATO', 'CON197', 'A', 'CONTROLADORAS DE FARMACIAS DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(228, 'LABORATO', 'LABORATO', 'COR042', 'A', 'CORPORACION ANALITICA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(229, 'LABORATO', 'LABORATO', 'CRY043', 'A', 'CRYOPHARMA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(230, 'LABORATO', 'LABORATO', 'DEA134', 'A', 'DISTRIBUIDORA Y EXPORTADORA DE MEDICAMEN', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(231, 'LABORATO', 'LABORATO', 'DER079', 'A', 'LABORATORIOS DERMATOLOGICOS DARIER', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(232, 'LABORATO', 'LABORATO', 'DIS001', 'A', 'ORGANICA DISTRIBUIDORA', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(233, 'LABORATO', 'LABORATO', 'DIS002', 'A', 'DISTRIPHAR S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(234, 'LABORATO', 'LABORATO', 'DRO044', 'A', 'DROTASA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(235, 'LABORATO', 'LABORATO', 'DRO099', 'A', 'NACIONAL DE DROGAS S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(236, 'LABORATO', 'LABORATO', 'ELI005', 'A', 'ELI LILLY Y CIA. DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(237, 'LABORATO', 'LABORATO', 'EQU045', 'A', 'EQUIMED S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(238, 'LABORATO', 'LABORATO', 'EUR083', 'A', 'LABORATORIOS EUROMEX S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(239, 'LABORATO', 'LABORATO', 'FAN064', 'A', 'FARMACOS NACIONALES S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(240, 'LABORATO', 'LABORATO', 'FAR0003', 'A', 'FARMACIA DE ESPECIALIDADES MEDICAS SUR ', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(241, 'LABORATO', 'LABORATO', 'FAR006', 'A', 'LABORATORIOS FARMASA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(242, 'LABORATO', 'LABORATO', 'FAR046', 'A', 'FARMACEUTICA EHLINGER MEXICANA S.A. DE ', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(243, 'LABORATO', 'LABORATO', 'FAR062', 'A', 'FARMACOS ESPECIALIZADOS S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(244, 'LABORATO', 'LABORATO', 'FAR066', 'A', 'FARMASAN S.A. DE R.L.MI.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(245, 'LABORATO', 'LABORATO', 'FAR108', 'A', 'PRODUCTOS FARMACEUTICOS S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(246, 'LABORATO', 'LABORATO', 'FAR109', 'A', 'FARMAQRO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(247, 'LABORATO', 'LABORATO', 'FED068', 'A', 'FEDELE S.A.DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(248, 'LABORATO', 'LABORATO', 'FER007', 'A', 'FERRING S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(249, 'LABORATO', 'LABORATO', 'FIS069', 'A', 'FISIONS DE MEXICO .S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(250, 'LABORATO', 'LABORATO', 'FRE070', 'A', 'FRESENIUS MEDICAL CARE DE MEXICO S.A. D', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(251, 'LABORATO', 'LABORATO', 'FUS084', 'A', 'LABORATORIOS FUSTERY S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(252, 'LABORATO', 'LABORATO', 'GAL071', 'A', 'GALDERMA MEXICO', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(253, 'LABORATO', 'LABORATO', 'GAL085', 'A', 'LABORATORIOS GALEN S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(254, 'LABORATO', 'LABORATO', 'GEL008', 'A', 'GELCAPS S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(255, 'LABORATO', 'LABORATO', 'GLA009', 'A', 'GLAXO WELLCOME MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(256, 'LABORATO', 'LABORATO', 'GRI072', 'A', 'GRIFOLS MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(257, 'LABORATO', 'LABORATO', 'GRI086', 'A', 'LABORATORIOS GRIN S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(258, 'LABORATO', 'LABORATO', 'GRO010', 'A', 'LABORATORIOS GROSSMAN S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(259, 'LABORATO', 'LABORATO', 'HOE074', 'A', 'HOECHST MARION ROUSSEL S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(260, 'LABORATO', 'LABORATO', 'HOR087', 'A', 'LABORATORIOS HORMONA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(261, 'LABORATO', 'LABORATO', 'ICN075', 'A', 'I C N FARMACEUTICA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(262, 'LABORATO', 'LABORATO', 'IFU088', 'A', 'LABORATORIOS IFUSA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(263, 'LABORATO', 'LABORATO', 'IND076', 'A', 'INDUSTRIAS QUIMICO FARMACEUTICAS AMERICA', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(264, 'LABORATO', 'LABORATO', 'IQF001', 'A', 'INDUSTRIAS QUIMICO FARMACEUTICAS AMERICA', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(265, 'LABORATO', 'LABORATO', 'ITA077', 'A', 'ITALMEX S.A.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(266, 'LABORATO', 'LABORATO', 'IVA001', 'A', 'IVAX PHARMACEUTICALS MEXICO S.A. DE C.V', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(267, 'LABORATO', 'LABORATO', 'JAN011', 'A', 'JANSSEN CILAG S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(268, 'LABORATO', 'LABORATO', 'KEN136', 'A', 'LABORATORIOS KENDRICK S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(269, 'LABORATO', 'LABORATO', 'KEN169', 'A', 'LABORATORIOS KENER S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(270, 'LABORATO', 'LABORATO', 'KNO135', 'A', 'QUIMICA KNOLL DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(271, 'LABORATO', 'LABORATO', 'LAK095', 'A', 'LAKESIDE DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(272, 'LABORATO', 'LABORATO', 'LEM096', 'A', 'LEMERY S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(273, 'LABORATO', 'LABORATO', 'LIO089', 'A', 'LABORATORIOS LIOMONT S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(274, 'LABORATO', 'LABORATO', 'LUN001', 'A', 'LUNDBECK MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(275, 'LABORATO', 'LABORATO', 'MAV097', 'A', 'MAVI S.A. PRODUCTOS', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(276, 'LABORATO', 'LABORATO', 'MEA023', 'A', 'MEAD JOHNSON DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(277, 'LABORATO', 'LABORATO', 'MED109', 'A', 'PRODUCTOS MEDIX S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(278, 'LABORATO', 'LABORATO', 'MER098', 'A', 'MERCK-MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(279, 'LABORATO', 'LABORATO', 'MER099', 'A', 'M.Z. PHARMA DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(280, 'LABORATO', 'LABORATO', 'MSD012', 'A', 'M.S.D. DE MEXICO  S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(281, 'LABORATO', 'LABORATO', 'NES041', 'A', 'COMPAÑIA NESTLE S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(282, 'LABORATO', 'LABORATO', 'NOV013', 'A', 'NOVARTIS FARMACEUTICA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(283, 'LABORATO', 'LABORATO', 'NOV100', 'A', 'NOVAG INFANCIA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(284, 'LABORATO', 'LABORATO', 'NOV101', 'A', 'NOVARTIS NUTRITION S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(285, 'LABORATO', 'LABORATO', 'OCT135', 'A', 'OCTAPHARMA MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(286, 'LABORATO', 'LABORATO', 'OFI131', 'A', 'LABORATORIOS OFIMEX S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(287, 'LABORATO', 'LABORATO', 'ORG102', 'A', 'ORGANON MEXICANA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(288, 'LABORATO', 'LABORATO', 'ORG104', 'A', 'ORGANON SANOFI-SYNTHELABO MEXICO S.A. D', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(289, 'LABORATO', 'LABORATO', 'PAR103', 'A', 'PARKE-DAVIS', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(290, 'LABORATO', 'LABORATO', 'PFF001', 'A', 'PIERRE FABRE FARMA DE MEXICO S.A. DE C.V', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(291, 'LABORATO', 'LABORATO', 'PFI014', 'A', 'PFIZER S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(292, 'LABORATO', 'LABORATO', 'PFI015', 'A', 'PFIZER CONSUMER HEALTH CARE MEXICO S. D', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(293, 'LABORATO', 'LABORATO', 'PHA015', 'A', 'PHARMACIA & UPJOHN S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(294, 'LABORATO', 'LABORATO', 'PIS090', 'A', 'LABORATORIOS PISA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(295, 'LABORATO', 'LABORATO', 'PRE001', 'A', 'PRECIMEX S.A. DE C.V', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(296, 'LABORATO', 'LABORATO', 'PRE091', 'A', 'LABORATORIOS PRECIMEX S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(297, 'LABORATO', 'LABORATO', 'PRO105', 'A', 'PROBIFASA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(298, 'LABORATO', 'LABORATO', 'PRO106', 'A', 'PROCTER & GAMBLE DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(299, 'LABORATO', 'LABORATO', 'PRO110', 'A', 'PROINMUNE S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(300, 'LABORATO', 'LABORATO', 'PRO111', 'A', 'PROTEIN S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(301, 'LABORATO', 'LABORATO', 'PRO112', 'A', 'PROBIOMED S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(302, 'LABORATO', 'LABORATO', 'PSI113', 'A', 'PSICOFARMA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(303, 'LABORATO', 'LABORATO', 'QUI114', 'A', 'QUIMICA Y FARMACIA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(304, 'LABORATO', 'LABORATO', 'RAN136', 'A', 'RANDALL LABORATORIES S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(305, 'LABORATO', 'LABORATO', 'REP115', 'A', 'REPRESENTACIONES MEX-AMERICA S.A. DE C.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(306, 'LABORATO', 'LABORATO', 'RHO016', 'A', 'RHONE-POULENC RORER S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(307, 'LABORATO', 'LABORATO', 'RIK116', 'A', 'RIKER S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(308, 'LABORATO', 'LABORATO', 'RIM117', 'A', 'RIMSA REP. INV. MEDICAS S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(309, 'LABORATO', 'LABORATO', 'ROC017', 'A', 'PRODUCTOS ROCHE S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(310, 'LABORATO', 'LABORATO', 'RUD118', 'A', 'RUDEFSA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(311, 'LABORATO', 'LABORATO', 'SAN018', 'A', 'LABORATORIOS SANFER S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(312, 'LABORATO', 'LABORATO', 'SAN119', 'A', 'SANOFI WINTHROP S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(313, 'LABORATO', 'LABORATO', 'SCH120', 'A', 'SCHERING MEXICANA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(314, 'LABORATO', 'LABORATO', 'SCH121', 'A', 'SCHERING PLOUGH MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(315, 'LABORATO', 'LABORATO', 'SEA122', 'A', 'SEARLE DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(316, 'LABORATO', 'LABORATO', 'SEL123', 'A', 'SELECCIONES MEDICAS S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(317, 'LABORATO', 'LABORATO', 'SEN092', 'A', 'LABORATORIOS SENOSIAIN S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(318, 'LABORATO', 'LABORATO', 'SER002', 'A', 'LABORATORIOS SERRAL S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(319, 'LABORATO', 'LABORATO', 'SER124', 'A', 'SERONO DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(320, 'LABORATO', 'LABORATO', 'SIG125', 'A', 'SIGFRIED DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(321, 'LABORATO', 'LABORATO', 'SIL093', 'A', 'LABORATORIOS SILANES S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(322, 'LABORATO', 'LABORATO', 'SMT019', 'A', 'SMITHKLINE BEECHAM MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(323, 'LABORATO', 'LABORATO', 'SOP094', 'A', 'LABORATORIOS SOPHIA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(324, 'LABORATO', 'LABORATO', 'STA126', 'A', 'STAFFORD MILLER DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(325, 'LABORATO', 'LABORATO', 'STI127', 'A', 'STIEFEL MEXICANA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(326, 'LABORATO', 'LABORATO', 'SUI128', 'A', 'NOVARTIS FARMACEUTICA DIVISION SUIPHARM', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(327, 'LABORATO', 'LABORATO', 'SYN129', 'A', 'SYNGEL DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(328, 'LABORATO', 'LABORATO', 'SYN130', 'A', 'SYNTEX S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(329, 'LABORATO', 'LABORATO', 'TEC131', 'A', 'TECNOFARMA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(330, 'LABORATO', 'LABORATO', 'TEK112', 'A', 'PROVEEDORA TEKNIMEX S. A. DE C. V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(331, 'LABORATO', 'LABORATO', 'UCB132', 'A', 'UCB PHARMA DE MEXICO S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(332, 'LABORATO', 'LABORATO', 'VAL080', 'A', 'LABORATORIO VALDECASAS S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(333, 'LABORATO', 'LABORATO', 'VAN001', 'A', 'LABORATORIOS VANQUISH S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(334, 'LABORATO', 'LABORATO', 'VIM132', 'A', 'VICMA S.A.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(335, 'LABORATO', 'LABORATO', 'WAR073', 'A', 'GRUPO WARNER LAMBERT MEXICO S.A. DE C.V', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(336, 'LABORATO', 'LABORATO', 'WYE020', 'A', 'WYETH S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(337, 'LABORATO', 'LABORATO', 'ZA-Z136', 'A', 'ASTRAZENECA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(338, 'LABORATO', 'LABORATO', 'ZEN021', 'A', 'ZENECA MEXICANA S.A. DE C.V.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(339, 'LABORATO', 'LABORATO', 'ZER001', 'A', 'LABORATORIOS ZERBONI S.A.', 'N', '0.0', '0.0', '', '', 'NINGUNA', '1977', '1977', 1, 1),
(340, 'MOTICANC', 'MOTICANC', 'ERRCAPTU', 'A', 'ERROR DE CAPTURA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(341, 'MOTICANC', 'MOTICANC', 'SC', 'A', 'SIN CANCELAR', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(342, 'MOTIMOVI', 'MOTIMOVI', 'CARGINIC', 'A', 'CARGA INICIAL', 'N', '0.0', '0.0', 'E', '*', 'NINGUNA', '1977', '1977', 1, 1),
(343, 'MOTIMOVI', 'MOTIMOVI', 'COMPDIR', 'A', 'ENTRADA POR COMPRA DIRECTA', 'N', '0.0', '0.0', 'E', '*', 'NINGUNA', '1977', '1977', 1, 1),
(344, 'MOTIMOVI', 'MOTIMOVI', 'EFARMACI', 'A', 'ENTRADA DE FARMACIA GENERAL', 'N', '0.0', '0.0', 'E', '*', 'NINGUNA', '1977', '1977', 1, 1),
(345, 'MOTIMOVI', 'MOTIMOVI', 'ENTRAJUS', 'A', 'ENTRADA POR AJUSTE', 'N', '0.0', '0.0', 'E', '*', 'NINGUNA', '1977', '1977', 1, 1),
(346, 'MOTIMOVI', 'MOTIMOVI', 'ETRASPAS', 'A', 'ENTRADA POR TRASPASO', 'N', '0.0', '0.0', 'E', '*', 'NINGUNA', '1977', '1977', 1, 1),
(347, 'MOTIMOVI', 'MOTIMOVI', 'EXISINIC', 'A', 'EXISTENCIA INICIAL', 'N', '0.0', '0.0', 'E', '*', 'NINGUNA', '1977', '1977', 1, 1),
(348, 'MOTIMOVI', 'MOTIMOVI', 'OTRAENTR', 'A', 'OTRAS ENTRADAS', 'N', '0.0', '0.0', 'E', '*', 'NINGUNA', '1977', '1977', 1, 1),
(349, 'MOTIMOVI', 'MOTIMOVI', 'OTRASALI', 'A', 'OTRAS SALIDAS', 'N', '0.0', '0.0', 'S', '*', 'NINGUNA', '1977', '1977', 1, 1),
(350, 'MOTIMOVI', 'MOTIMOVI', 'SALIAJUS', 'A', 'SALIDA POR AJUSTE', 'N', '0.0', '0.0', 'S', '*', 'NINGUNA', '1977', '1977', 1, 1),
(351, 'MOTIMOVI', 'MOTIMOVI', 'SAPLITRA', 'A', 'SALIDA POR APLICACIÓN DE TRATAMIENTO', 'N', '0.0', '0.0', 'S', '', 'NINGUNA', '1977', '1977', 1, 1),
(352, 'MOTIMOVI', 'MOTIMOVI', 'SRECETAI', 'A', 'SALIDA POR RECETA INDIVIDUAL', 'N', '0.0', '0.0', 'S', '*', 'NINGUNA', '1977', '1977', 1, 1),
(353, 'MOTIMOVI', 'MOTIMOVI', 'STRASPAS', 'A', 'SALIDA POR TRASPASO', 'N', '0.0', '0.0', 'S', '', 'NINGUNA', '1977', '1977', 1, 1),
(354, 'MOTIMOVI', 'MOTIMOVI', 'SURTIDO', 'A', 'SALIDA POR SURTIDO', 'N', '0.0', '0.0', 'S', '*', 'NINGUNA', '1977', '1977', 1, 1),
(355, 'OBSERVAC', 'OBSERVAC', '0OBSMIV1', 'A', 'REFRIGERESE HASTA UNA HORA ANTES DE SU ADMINISTRACION', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(356, 'OBSERVAC', 'OBSERVAC', '0OBSMIV2', 'A', 'NO SE REFRIGERE MANTENGASE A TEMPERATURA AMBIENTE.', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(357, 'OBSERVAC', 'OBSERVAC', '0OBSMIV3', 'A', 'PROTEJASE DE LA LUZ', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(358, 'OBSERVAC', 'OBSERVAC', '0OBSMIV4', 'A', 'PRECAUCION: NO AGITAR', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(359, 'OBSERVAC', 'OBSERVAC', '0OBSMIV5', 'A', 'UTILICE FILTRO DE 0.22 MICRAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(360, 'OBSERVAC', 'OBSERVAC', '0OBSMIV6', 'A', 'UTILICE FILTRO DE 1.2 MICRAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(361, 'OBSERVAC', 'OBSERVAC', '0OBSMIV7', 'A', 'PRECAUCION: CONTIENE QUIMIOTERAPIA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(362, 'OBSERVAC', 'OBSERVAC', '0OBSMIV8', 'A', 'NO ADICIONE NINGUN OTRO MEDICAMENTO', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(363, 'OBSERVAC', 'OBSERVAC', '0OBSMIV9', 'A', 'VESICANTE', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(364, 'OBSERVAC', 'OBSERVAC', 'OBSMIV10', 'A', 'IRRITANTE', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(365, 'OBSERVAC', 'OBSERVAC', 'OBSMIV11', 'A', 'FRASCO DE VIDRIO CON FILTRO ESPECIAL', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(366, 'OBSERVAC', 'OBSERVAC', 'OBSVIN', 'A', 'BOLO/PROTEGER DE LA LUZ', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(367, 'PRESENTA', 'PRESENTA', 'AER', 'A', 'AEROSOL', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(368, 'PRESENTA', 'PRESENTA', 'AMP', 'A', 'AMPOLLETA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(369, 'PRESENTA', 'PRESENTA', 'BOQ', 'A', 'BOQUILLAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(370, 'PRESENTA', 'PRESENTA', 'BSA', 'A', 'BOLSA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA NINGUNA', '1977', '1977', 1, 1),
(371, 'PRESENTA', 'PRESENTA', 'CAP', 'A', 'CAPSULAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(372, 'PRESENTA', 'PRESENTA', 'CAPL', 'A', 'CAPLETAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(373, 'PRESENTA', 'PRESENTA', 'CART', 'A', 'CARTUCHOS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(374, 'PRESENTA', 'PRESENTA', 'CPR', 'A', 'COMPRIMIDOS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(375, 'PRESENTA', 'PRESENTA', 'CRA', 'A', 'CREMAS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(376, 'PRESENTA', 'PRESENTA', 'DSS', 'A', 'DOSIS', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(377, 'PRESENTA', 'PRESENTA', 'FCO AMP', 'A', 'FRASCO AMPULA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(378, 'PROVEEDS', 'PROVEEDS', '1', 'A', 'FARMACOS ESPECIALIZADOS S.A. DE C.V.', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(379, 'TIPOGENE', 'TIPOGENE', 'AZA1', 'A', 'AZACITIDINA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1),
(380, 'TIPOGENE', 'TIPOGENE', 'DEXTROSA', 'A', 'DEXTROSA', 'N', '0.0', '0.0', '*', '*', 'NINGUNA', '1977', '1977', 1, 1);
INSERT INTO `catalogos` (`idCatalogo`, `NombreCatalogoCATS`, `ClaveRubroCATS`, `ClaveEntidadCATS`, `EstatusRegistroCATS`, `DescripcionCATS`, `ClaveJustificadaCATS`, `ClasificadorNumerico01CATS`, `ClasificadorNumerico02CATS`, `ClasificadorAlfanumerico01CATS`, `ClasificadorAlfanumerico02CATS`, `ObservacionesCATS`, `FechaAltaCATS`, `FechaCambioCATS`, `IDUSERALTA`, `IDUSERUPDATE`) VALUES
(381, 'TIPOGENE', 'TIPOGENE', 'ELECTROL', 'A', 'ELECTROLITOS', 'N', '0.0', '0.0', '', '*', 'NINGUNA', '1977', '1977', 1, 1),
(382, 'TIPOGENE', 'TIPOGENE', 'LIPIDO', 'A', 'LIPIDO', 'N', '0.0', '0.0', '', '*', 'NINGUNA', '1977', '1977', 1, 1),
(383, 'TIPOGENE', 'TIPOGENE', 'MED', 'A', 'MEDICAMENTO', 'N', '0.0', '0.0', '', '*', 'NINGUNA', '1977', '1977', 1, 1),
(384, 'TIPOGENE', 'TIPOGENE', 'PROTEINA', 'A', 'PROTEINA', 'N', '0.0', '0.0', '', '*', 'NINGUNA', '1977', '1977', 1, 1),
(385, 'TIPOUNID', 'TIPOUNID', 'G', 'A', 'GRAMOS', 'N', '0.0', '0.0', 'PESO', '*', 'NINGUNA', '1977', '1977', 1, 1),
(386, 'TIPOUNID', 'TIPOUNID', 'LT', 'A', 'LITROS', 'N', '0.0', '0.0', 'VOLUMEN', '*', 'NINGUNA', '1977', '1977', 1, 1),
(387, 'TIPOUNID', 'TIPOUNID', 'MCG', 'A', 'MICROGRAMOS', 'N', '0.0', '0.0', 'PESO', '*', 'NINGUNA', '1977', '1977', 1, 1),
(388, 'TIPOUNID', 'TIPOUNID', 'MCG/ML', 'A', 'MICROGRAMOS POR MILILITRO', 'N', '0.0', '0.0', 'CONCENT', '*', 'NINGUNA', '1977', '1977', 1, 1),
(389, 'TIPOUNID', 'TIPOUNID', 'ME', 'A', 'MICRO EQUIVALENTE', 'N', '1.0', '1.0', 'PESO', '1', 'NINGUNA', '1977', '1977', 1, 1),
(390, 'TIPOUNID', 'TIPOUNID', 'MEQ', 'A', 'MILIEQUIVALENTE', 'N', '0.0', '0.0', 'PESO', '*', 'NINGUNA', '1977', '1977', 1, 1),
(391, 'TIPOUNID', 'TIPOUNID', 'MG', 'A', 'MILIGRAMOS', 'N', '0.0', '0.0', 'PESO', '*', 'NINGUNA', '1977', '1977', 1, 1),
(392, 'TIPOUNID', 'TIPOUNID', 'MG/ML', 'A', 'MILIGRAMOS POR MILILITRO', 'N', '0.0', '0.0', 'CONCENT', '*', 'NINGUNA', '1977', '1977', 1, 1),
(393, 'TIPOUNID', 'TIPOUNID', 'ML', 'A', 'MILILITROS', 'N', '0.0', '0.0', 'VOLUMEN', '*', 'NINGUNA', '1977', '1977', 1, 1),
(394, 'TIPOUNID', 'TIPOUNID', 'MMOL', 'A', 'MILIMOLES', 'N', '0.0', '0.0', 'PESO', '*', 'NINGUNA', '1977', '1977', 1, 1),
(395, 'TIPOUNID', 'TIPOUNID', 'UI', 'A', 'UNIDAD INTERNACIONAL', 'N', '0.0', '0.0', 'PESO', '*', 'NINGUNA', '1977', '1977', 1, 1),
(396, '', 'CLASMEDT', 'a', '1', 'a', 'a', '10.1', '12.0', 'a', 'a', 'a', '2018-12-05', NULL, 1, 0),
(397, '', 'AREATERA', 'a', '1', 'a', '2', '2.0', '2.0', 'a', 'a', 'a', '2018-12-05', NULL, 1, 0),
(398, '', 'AREATERA', '1', '1', '1', '1', '1.0', '1.0', '1', '1', '1', '2018-12-05', NULL, 1, 0),
(399, 'TABLAS', 'TABLAS', '11', '', 'catalogos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(400, 'TABLAS', 'TABLAS', '10', '', 'admuser', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(401, 'TABLAS', 'TABLAS', '9', '', 'almacenes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(402, 'TABLAS', 'TABLAS', '8', '', 'bitacora', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(403, 'TABLAS', 'TABLAS', '7', '', 'clavesectorsalud', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(404, 'TABLAS', 'TABLAS', '6', '', 'existenciasxalmacenlote', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(405, 'TABLAS', 'TABLAS', '5', '', 'generios', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(406, 'TABLAS', 'TABLAS', '4', '', 'medicamentos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(407, 'TABLAS', 'TABLAS', '3', '', 'medicos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(408, 'TABLAS', 'TABLAS', '2', '', 'menu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(409, 'TABLAS', 'TABLAS', '1', '', 'pacientes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(410, 'CRUD', 'CRUD', '1', NULL, 'CREATE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(411, 'CRUD', 'CRUD', '2', NULL, 'READ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(412, 'CRUD', 'CRUD', '4', NULL, 'UPDATE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(413, 'CRUD', 'CRUD', '3', NULL, 'DELETE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clavesectorsalud`
--

CREATE TABLE `clavesectorsalud` (
  `ID` bigint(20) NOT NULL,
  `CLAVESECTORSALUD` varchar(14) DEFAULT NULL,
  `CLAVEPRESENTACION` varchar(8) DEFAULT NULL,
  `CLAVERUBROPRESENTACION` varchar(8) DEFAULT NULL,
  `CANTIDADPRESENTACION` decimal(10,2) DEFAULT NULL,
  `CANTIDADUM` varchar(20) DEFAULT NULL,
  `CANTIDADUNIDADMEDIDA` float DEFAULT NULL,
  `CLAVEFAMILIA` varchar(8) DEFAULT NULL,
  `CLAVEUNIDADMEDIDA` varchar(8) DEFAULT NULL,
  `DESCRIPCION` text,
  `CLAVEUSUARIOALTA` varchar(12) DEFAULT NULL,
  `FECHAALTA` datetime DEFAULT NULL,
  `CLAVEUSUARIOCAMBIO` varchar(12) DEFAULT NULL,
  `FECHACAMBIO` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `existenciasxalmacenlote`
--

CREATE TABLE `existenciasxalmacenlote` (
  `ID` bigint(20) NOT NULL,
  `CLAVEACEN` varchar(15) NOT NULL,
  `CLAVELOTE` varchar(15) NOT NULL,
  `TOTALENTRADAS` decimal(10,2) DEFAULT NULL,
  `TOTALSALIDAS` decimal(10,2) DEFAULT NULL,
  `EXISTECIAINICIAL` smallint(6) DEFAULT NULL,
  `CLAVEUSUARIOALTA` varchar(12) DEFAULT NULL,
  `FECHAALTA` datetime DEFAULT NULL,
  `CLAVEUSUARIOCAMBIO` varchar(12) DEFAULT NULL,
  `FECHACAMBIO` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genericos`
--

CREATE TABLE `genericos` (
  `ID` bigint(20) NOT NULL,
  `CLAVEGERICO` varchar(18) NOT NULL,
  `NOMBRE` text NOT NULL,
  `NOMBRECORTO` varchar(20) DEFAULT NULL,
  `CLAVERUBROTIPO` varchar(8) DEFAULT NULL,
  `CLAVETIPO` varchar(8) DEFAULT NULL,
  `INTERCAMBIABLE` varchar(2) DEFAULT NULL,
  `CLAVEUSUARIOALTA` varchar(12) DEFAULT NULL,
  `FECHAALTA` datetime DEFAULT NULL,
  `CLAVEUSUARIOCAMBIO` varchar(12) DEFAULT NULL,
  `FECHACAMBIO` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `ID` bigint(20) NOT NULL,
  `CLAVEMEDICAMENTO` varchar(20) NOT NULL,
  `ESTATUSREGISTRO` varchar(1) DEFAULT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `DESCCOMER` varchar(50) DEFAULT NULL,
  `CLAVESECTORSALUD` varchar(14) DEFAULT NULL,
  `CLAVEERICO` varchar(18) DEFAULT NULL,
  `CLAVECODIGOBARRAS` varchar(14) DEFAULT NULL,
  `CLAVERUBROCLASIFICACION` varchar(8) DEFAULT NULL,
  `CLAVECLASIFICACION` varchar(8) DEFAULT NULL,
  `CLAVERUBROAREATERAPEUTICA` varchar(8) DEFAULT NULL,
  `CLAVEAREATERAPEUTICA` varchar(8) DEFAULT NULL,
  `CLAVERUBROFAMILIA` varchar(8) DEFAULT NULL,
  `CLAVEFAMILIA` varchar(8) DEFAULT NULL,
  `CLAVERUBROPRESENTACION` varchar(8) DEFAULT NULL,
  `CLAVEPRESENTACION` varchar(8) DEFAULT NULL,
  `CLAVERUBROPROVEEDOR` varchar(8) DEFAULT NULL,
  `CLAVEPROVEEDOR` varchar(8) DEFAULT NULL,
  `CLAVERUBROUNIDADMEDIDA` varchar(8) DEFAULT NULL,
  `CLAVEUNIDADMEDIDA` varchar(8) DEFAULT NULL,
  `COSTO` decimal(10,2) NOT NULL,
  `VOLUMEN` decimal(10,2) NOT NULL,
  `PESO` decimal(10,2) DEFAULT NULL,
  `OSMOLARIDAD` decimal(10,2) DEFAULT NULL,
  `DENSIDAD` decimal(10,2) DEFAULT NULL,
  `CALORIAS` decimal(10,2) DEFAULT NULL,
  `CONCENTRACION` decimal(10,2) DEFAULT NULL,
  `DOSISMAXIMAKILOGRAMO` decimal(10,2) DEFAULT NULL,
  `DOSISMAXIMAMETRO2` decimal(10,2) DEFAULT NULL,
  `VALENCIA` varchar(3) DEFAULT NULL,
  `CONFIGURADOR` varchar(6) DEFAULT NULL,
  `MOSTRARONCO` varchar(1) DEFAULT NULL,
  `MOSTRARNPT` varchar(1) DEFAULT NULL,
  `MOSTRARANTI` varchar(1) DEFAULT NULL,
  `CLAVEUSUARIOALTA` varchar(12) DEFAULT NULL,
  `FECHAALTA` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `ID` bigint(20) NOT NULL,
  `MATRICULAMEDICO` varchar(15) DEFAULT NULL,
  `ESTATUSREGISTRO` varchar(1) DEFAULT NULL,
  `RFC` varchar(15) DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `CEDULAPROFESIONAL` varchar(10) DEFAULT NULL,
  `NOMBRE` varchar(25) DEFAULT NULL,
  `APELLIDOPATERNO` varchar(25) DEFAULT NULL,
  `APELLIDOMATERNO` varchar(25) DEFAULT NULL,
  `CLAVERUBROESPECIALIDAD` varchar(8) DEFAULT NULL,
  `CLAVEESPECIALIDAD` varchar(8) DEFAULT NULL,
  `TELEFONOS` varchar(30) DEFAULT NULL,
  `FECHAINGRESO` date NOT NULL,
  `OBSERVACIONES` text,
  `CLAVEUSUARIOALTA` varchar(50) DEFAULT NULL,
  `FECHAALTA` date NOT NULL,
  `CLAVEUSUARIOCAMBIO` varchar(50) DEFAULT NULL,
  `FECHACAMBIO` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`ID`, `MATRICULAMEDICO`, `ESTATUSREGISTRO`, `RFC`, `CURP`, `CEDULAPROFESIONAL`, `NOMBRE`, `APELLIDOPATERNO`, `APELLIDOMATERNO`, `CLAVERUBROESPECIALIDAD`, `CLAVEESPECIALIDAD`, `TELEFONOS`, `FECHAINGRESO`, `OBSERVACIONES`, `CLAVEUSUARIOALTA`, `FECHAALTA`, `CLAVEUSUARIOCAMBIO`, `FECHACAMBIO`) VALUES
(1, '08650230', '1', 'MUVL901030JQ7', 'MUVL901030HMNNLS08', '08650230', 'Luis Arturo', 'Munguia', 'Valdes', 'ESPECIAL', 'OH', '5519166477', '2018-11-03', 'MEDIOC ESPECIALISTA', 'arturomv1930@gmail.com', '2018-11-02', 'arturomv1930@gmail.com', '2018-11-06 00:00:00'),
(2, '08650231', '1', 'FJMV', 'FJMV', '08650231', 'Francisco Javier', 'Munguia', 'Valdés', 'ESPECIAL', 'CO', '5519166477', '2018-11-03', 'OBSERVACIONES DE PRUEBA', 'arturomv1930@gmail.com', '2018-11-02', 'arturomv1930@gmail.com', '2018-11-06 00:00:00'),
(3, '3', '1', '3', '3', '33', '3', '33', '3', 'ESPECIAL', 'PO', '3', '2018-11-03', '3', 'arturomv1930@gmail.com', '2018-11-02', 'arturomv1930@gmail.com', '2018-12-04 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `IDMENU` int(11) NOT NULL,
  `IDROLE` int(11) NOT NULL,
  `ICONO` varchar(200) NOT NULL,
  `MENU` varchar(100) NOT NULL,
  `MENUEN` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`IDMENU`, `IDROLE`, `ICONO`, `MENU`, `MENUEN`) VALUES
(1, 1, 'fa fa-user', 'Usuarios', 'Users'),
(2, 1, 'fa fa-book', 'Catálogos', 'Catalogs'),
(3, 2, 'fa fa-table', 'Catálogos', 'Catalogs'),
(4, 1, 'fa fa-medkit', 'Medicamentos', 'Medicines'),
(5, 1, 'fa fa-hospital-o', 'Almacenes', 'Warehouses'),
(6, 1, 'fa fa-stethoscope', 'Clave sector salud', 'Healt sector key'),
(7, 1, 'fa fa-calculator', 'Conversion de sustancias', 'Substances converter'),
(8, 1, 'fa fa-book', 'Genericos', 'Generics'),
(9, 1, 'fa fa-users', 'Pacientes', 'Patients'),
(10, 1, 'fa fa-user-md', 'Medicos', 'Doctors'),
(11, 2, 'fa fa-search', 'Bitacora', 'Binnacle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `ID` bigint(20) NOT NULL,
  `NUMEROAFILIACIONPACIENTE` varchar(16) DEFAULT NULL,
  `ESTATUSREGISTRO` varchar(1) DEFAULT NULL,
  `RFC` varchar(15) DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `NOMBRE` varchar(25) DEFAULT NULL,
  `APELLIDOPATERNO` varchar(25) DEFAULT NULL,
  `APELLIDOMATERNO` varchar(25) DEFAULT NULL,
  `FECHANACIMIENTO` datetime DEFAULT NULL,
  `ESTATUS` varchar(1) DEFAULT NULL,
  `TELEFONOS` varchar(30) DEFAULT NULL,
  `FECHAINGRESO` datetime DEFAULT NULL,
  `PESO` decimal(10,2) DEFAULT NULL,
  `ESTATURA` decimal(10,2) DEFAULT NULL,
  `SEXO` varchar(1) DEFAULT NULL,
  `MATRICULAMEDICO` varchar(15) DEFAULT NULL,
  `TIPOTE` varchar(1) DEFAULT NULL,
  `CALLEYNUMERO` varchar(80) DEFAULT NULL,
  `COLONIA` varchar(75) DEFAULT NULL,
  `MUNIDELEG` varchar(40) DEFAULT NULL,
  `POBLACION` varchar(40) DEFAULT NULL,
  `ESTADO` varchar(35) DEFAULT NULL,
  `CODIGOPOSTAL` smallint(6) DEFAULT NULL,
  `EDEMA` tinyint(4) DEFAULT NULL,
  `PERIBRAN` decimal(10,2) DEFAULT NULL,
  `PERICEFAL` decimal(10,2) DEFAULT NULL,
  `RECUMBENT` decimal(10,2) DEFAULT NULL,
  `FECHAMEDICION` datetime DEFAULT NULL,
  `MUAC` decimal(10,2) DEFAULT NULL,
  `ALERGIAS` varchar(50) DEFAULT NULL,
  `CLAVERUBRODIAGNOSTICO` varchar(8) DEFAULT NULL,
  `CLAVEDIAGNOSTICO` varchar(8) DEFAULT NULL,
  `OBSERVACIONES` text,
  `CLAVEUSUARIOALTA` varchar(12) DEFAULT NULL,
  `FECHAALTA` datetime DEFAULT NULL,
  `CLAVEUSUARIOCAMBIO` varchar(12) DEFAULT NULL,
  `FECHACAMBIO` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `IDROLE` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `NAMEEN` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`IDROLE`, `NAME`, `NAMEEN`) VALUES
(1, 'ADMINISTRADOR', 'ADMIN'),
(2, 'REPORTES', 'REPORTS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `session`
--

CREATE TABLE `session` (
  `SID` varchar(500) NOT NULL,
  `USER` varchar(100) NOT NULL,
  `LASTUPDATE` time NOT NULL,
  `DATE` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE `submenu` (
  `IDSUBMENU` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `URL` varchar(256) NOT NULL,
  `IDMENU` int(11) NOT NULL,
  `NAMEEN` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`IDSUBMENU`, `NAME`, `URL`, `IDMENU`, `NAMEEN`) VALUES
(1, 'Admon. Catálogos', 'components/catalogs/index.php', 2, 'Admin Catalogs'),
(2, 'Admon. Usuarios', 'components/users/index.php', 1, 'Admin Users'),
(3, 'Admon. Catálogos', 'components/catalogs/index.php', 3, 'Admin Catalogs'),
(4, 'Admon. Medicamentos', 'components/medicines/index.php', 4, 'Admin Medicines'),
(5, 'Admon. Almacenes', 'components/wharehouses/index.php', 5, 'Admin Wharehouses'),
(6, 'Admon. Cve Sector salud', 'components/healtSectorKey/index.php', 6, 'Admin Healt sector key'),
(7, 'Admon. Conversion sustancias', 'components/substancesConverter/index.php', 7, 'Admin Substances converter'),
(8, 'Admon. Genericos', 'components/generics/index.php', 8, 'Admin Generics'),
(9, 'Admon. Pacientes', 'components/patients/index.php', 9, 'Admin Patients'),
(10, 'Admon. Medicos', 'components/doctors/index.php', 10, 'Admin Doctors'),
(11, 'Bitacora', 'components/binnacle/index.php', 11, 'Binnacle'),
(12, 'Soporte catálogos', 'components/catalogs/supportCatalogs.php', 2, 'Catalogs support');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userroles`
--

CREATE TABLE `userroles` (
  `IDUSERROLES` int(11) NOT NULL,
  `IDUSER` bigint(20) NOT NULL,
  `IDROLE` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `userroles`
--

INSERT INTO `userroles` (`IDUSERROLES`, `IDUSER`, `IDROLE`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 3, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admuser`
--
ALTER TABLE `admuser`
  ADD PRIMARY KEY (`IDUSER`);

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `catalogos`
--
ALTER TABLE `catalogos`
  ADD PRIMARY KEY (`idCatalogo`),
  ADD KEY `user_catalogos_fk` (`IDUSERALTA`),
  ADD KEY `user_catalogos_fk1` (`IDUSERUPDATE`);

--
-- Indices de la tabla `clavesectorsalud`
--
ALTER TABLE `clavesectorsalud`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `existenciasxalmacenlote`
--
ALTER TABLE `existenciasxalmacenlote`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `genericos`
--
ALTER TABLE `genericos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`IDMENU`),
  ADD KEY `rol_menu_fk` (`IDROLE`) USING BTREE;

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`IDROLE`);

--
-- Indices de la tabla `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`SID`);

--
-- Indices de la tabla `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`IDSUBMENU`),
  ADD KEY `menu_submenu_fk` (`IDMENU`) USING BTREE;

--
-- Indices de la tabla `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`IDUSERROLES`),
  ADD KEY `usuario_rolusuario_fk` (`IDUSER`) USING BTREE,
  ADD KEY `rol_rolusuario_fk` (`IDROLE`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admuser`
--
ALTER TABLE `admuser`
  MODIFY `IDUSER` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `catalogos`
--
ALTER TABLE `catalogos`
  MODIFY `idCatalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=414;

--
-- AUTO_INCREMENT de la tabla `clavesectorsalud`
--
ALTER TABLE `clavesectorsalud`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `existenciasxalmacenlote`
--
ALTER TABLE `existenciasxalmacenlote`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genericos`
--
ALTER TABLE `genericos`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `IDMENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `IDROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `submenu`
--
ALTER TABLE `submenu`
  MODIFY `IDSUBMENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `userroles`
--
ALTER TABLE `userroles`
  MODIFY `IDUSERROLES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
