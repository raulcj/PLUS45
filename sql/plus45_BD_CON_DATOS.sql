-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2020 a las 16:03:42
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plus45`
--

CREATE SCHEMA Plus45 CHARACTER SET Latin1 COLLATE latin1_spanish_ci;
USE Plus45;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `cif` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `tipo_sociedad` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`cif`, `password`, `nombre`, `tipo_sociedad`) VALUES
('A74832032', '$2y$10$oWtusNYZ1dMa7R0Z7sHbEeHPB1mQtmHnoF185WhtqOTUEsDdDas/6', 'Transportes Emilio', 'S.L'),
('B58393173', '$2y$10$00xYZX9wuLBDqpRO82PEdOshxeFHQSfT60XqpQweYcqKwkPD62oG6', 'Garaje Costa', 'S.L'),
('C37400241', '$2y$10$boYygg9LbVdc6rtKod/OjeJ8aWFJH6DcqMrZnVrEwAw3RUqKVs33S', 'Solitel', 'S.A'),
('H28304800', '$2y$10$szAcjAmgJqQrnJuFMz.oQOlu6kpK0GGRgnD3BSUJmB2dTBGG8rZVO', 'Restaurante El Lotero', 'S.L'),
('H83853322', '$2y$10$Do5ZTTiJ2BeX0dmfeaTrtOy4bQ4guhLOkZKBoHom3rQ.Wa/C1Bmz.', 'Catering Perea Rojas', 'S.L'),
('J38375332', '$2y$10$1x7a94h3n7xS06P//xJG0.mTfTXofrX1ZgGuhYuMLuQs8ZgDEPswy', 'Flores Lázaro', 'Autónomo'),
('U44831039', '$2y$10$jr7DM1KpLfJ7gc1AjziIPuBzIGuDk458reWwBrE8TxjVdkK5xrxTO', 'Construcción SIMA', 'S.A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `militares`
--

CREATE TABLE `militares` (
  `dicodef` varchar(7) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `dni` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `tim` varchar(12) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cod_unidad` varchar(7) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido1` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido2` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `codigopostal` int(11) DEFAULT NULL,
  `email` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `nivel_estudios` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `idiomas` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `experiencia` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `militares`
--

INSERT INTO `militares` (`dicodef`, `password`, `dni`, `tim`, `cod_unidad`, `nombre`, `apellido1`, `apellido2`, `edad`, `telefono`, `direccion`, `codigopostal`, `email`, `nivel_estudios`, `idiomas`, `experiencia`) VALUES
('vrivrub', '$2y$10$OlugTM7bPdwNihyAwovvdOBcfsMLLbcandknKnT5eSAHG9gob0yCi', '20483222L', '51420483222X', 'UCO-009', 'Verónica', 'Rivera', 'Rubio', 39, 693274832, 'Plaza Independencia, 9, 2A', 50385, 'verasrub@hotmail.com', 'EGB + Técnico de administración + FCT + Manipulador de alimentos', 'Inglés 1.1.1.1', '10 años en S1 de Regimiento de caballería: administración y contabilidad'),
('jgutmor', '$2y$10$jHlrBYiqExK7ulIKUyh9ZO04e09e7xla6Wf7TqNI5GFpCX62cFNaS', '48593393H', '51448593393U', 'UCO-003', 'José Manuel', 'Gutiérrez', 'Moreno', 38, 698485938, 'Calle Geranio, 18', 50300, 'jose_manuel_gm@gmail.es', 'Gradio medio en Electromecánica de vehículos', 'INGLES: 1.1+.1.2', '8 años cabo ILG, 4 años conductor VAMTAC'),
('sclacru', '$2y$10$BrIfriozSkejIfklynpIauM85b.V9p9Fe3JnZfmrsUP9SeFhG/vz.', '49217383S', '51449217383T', 'UCO-007', 'Sonia', 'Clavero', 'de la Cruz', 39, 694738223, 'Calle Rúa de los Marqueses, 39, 4A, I Derecha', 28992, 'sonia_clve30@gmail.com', 'Bachillerato Ciencias y Salud', 'Inglés B2, Portugués B1', '8 años en G3 comandancia de AAA, SAECO y S3'),
('atirgar', '$2y$10$1Pp5FYxq2cFJbin2nUcN.OuvyHzNfor22vqPx3tMvpKn/MjJq92mW', '74033135E', '51474033135E', 'UCO-006', 'Antonio', 'Tirado', 'García', 41, 659374837, 'Avd. de las Heras, 12, 3A', 50385, 'antonio_tir_gar3@yahoo.es', 'Bachillerato Sociales', 'Ninguno', '12 años en AALOG 41 como operador SIGLE, 8 años de mantenimiento mecánico'),
('admin', '$2y$10$uoDm0Iby2iYkYU8RQrwQE.jI.VvolioTLZ5SOkuJ8268qc6ePaCK6', 'admin-DNI', 'admin-TIM', 'UCO-001', '', '', '', 0, 876633175, NULL, 50300, 'rcabjai@et.mde.es', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `cod_puesto` varchar(4) COLLATE latin1_spanish_ci NOT NULL,
  `cif_empresa` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `dni_militar` varchar(9) COLLATE latin1_spanish_ci DEFAULT NULL,
  `ambito_profesional` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`cod_puesto`, `cif_empresa`, `dni_militar`, `ambito_profesional`, `descripcion`) VALUES
('1569', 'J38375332', NULL, 'Comercial', 'Venta al público, 8h mañanas, L-V'),
('2117', 'C37400241', NULL, 'Informática', 'Programador jornada completa: 6 días seguidos, 4 de descanso'),
('5092', 'H28304800', NULL, 'Hostelería', 'Barista 4h tardes viernes y sábado'),
('5683', 'H83853322', NULL, 'Comercial', 'Marketing, publicidad, serigrafia, L-V, completa'),
('6611', 'J38375332', NULL, 'Jardinería', 'Zonas verdes Urbanización La Riviera. Jornada completa'),
('7180', 'C37400241', NULL, 'Informática', 'Testeador de aplicaciones, media jornada'),
('7807', 'A74832032', NULL, 'Transporte', 'Conductor carnet C, jornada completa'),
('7956', 'H83853322', NULL, 'Alimentación', 'Auxiliar de cocina, 40h semana'),
('8488', 'U44831039', NULL, 'Construcción', 'Capataz construcción subterránea, jornada completa'),
('8509', 'H83853322', NULL, 'Transporte', 'Conductor B+E , BTP'),
('9077', 'H28304800', NULL, 'Hostelería', 'Camarero jornada partida fines de semana'),
('9307', 'A74832032', NULL, 'Logística', 'Operador logístico en zona de carga, 4h al día'),
('9534', 'B58393173', NULL, 'Mecánica', 'Chapa y pintura, 8h L-V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `cod_puesto` varchar(4) COLLATE latin1_spanish_ci NOT NULL,
  `dni_militar` varchar(9) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`cod_puesto`, `dni_militar`) VALUES
('1569', '74033135E'),
('5092', '20483222L'),
('5683', '20483222L'),
('5683', '48593393H'),
('5683', '49217383S'),
('6611', '20483222L'),
('6611', '48593393H'),
('6611', '74033135E'),
('7180', '49217383S'),
('7807', '48593393H'),
('7807', '74033135E'),
('7956', '49217383S'),
('8488', '74033135E'),
('8509', '20483222L'),
('8509', '49217383S'),
('8509', '74033135E'),
('9077', '48593393H'),
('9077', '49217383S'),
('9534', '48593393H'),
('9534', '74033135E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `cod_unidad` varchar(7) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
  `localizacion` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`cod_unidad`, `nombre`, `localizacion`) VALUES
('UCO-001', 'ACLOG', 'Calatayud, Zaragoza'),
('UCO-002', 'AGRUSAN 3', 'Zaragoza'),
('UCO-003', 'ARAGON 1', 'Zaragoza'),
('UCO-004', 'BHELMA III', 'Agoncillo, La Rioja'),
('UCO-005', 'BHELMA IV', 'Dos Hermanas, Sevilla'),
('UCO-006', 'CENAD San Gregorio', 'Zaragoza'),
('UCO-007', 'CGMAAA', 'Madrid'),
('UCO-008', 'RACTA 4', 'San Fernando, Cádiz'),
('UCO-009', 'RC ESPAÑA 11', 'Zaragoza'),
('UCO-010', 'REW 31', 'Madrid'),
('UCO-011', 'REW 32', 'Dos Hermanas, Sevilla'),
('UCO-012', 'RICZM AMÉRICA 66', 'Pamplona'),
('UCO-013', 'RING 1', 'Burgos'),
('UCO-014', 'RPEI 12', 'Monzalbarba, Zaragoza'),
('UCO-015', 'RT 21', 'Marines, Valencia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`cif`);

--
-- Indices de la tabla `militares`
--
ALTER TABLE `militares`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `militares_fk` (`cod_unidad`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`cod_puesto`),
  ADD KEY `puestos_fk_1` (`cif_empresa`),
  ADD KEY `puestos_fk_2` (`dni_militar`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`cod_puesto`,`dni_militar`),
  ADD KEY `solicitudes_fk_2` (`dni_militar`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`cod_unidad`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `militares`
--
ALTER TABLE `militares`
  ADD CONSTRAINT `militares_fk` FOREIGN KEY (`cod_unidad`) REFERENCES `unidades` (`cod_unidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD CONSTRAINT `puestos_fk_1` FOREIGN KEY (`cif_empresa`) REFERENCES `empresas` (`cif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puestos_fk_2` FOREIGN KEY (`dni_militar`) REFERENCES `militares` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_fk_1` FOREIGN KEY (`cod_puesto`) REFERENCES `puestos` (`cod_puesto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitudes_fk_2` FOREIGN KEY (`dni_militar`) REFERENCES `militares` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
