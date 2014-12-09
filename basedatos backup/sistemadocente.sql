-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2014 a las 07:30:47
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistemadocente`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_alumno`(IN `Nombre` varchar(10), IN `ApellidoPaterno` varchar(10), IN `ApellidoMaterno` varchar(10),IN `Email` varchar(10), IN `op` integer)
if op=0 THEN
INSERT INTO alumno (Nombre,ApellidoPaterno,ApellidoMaterno,Email)
VALUES (Nombre,ApellidoPaterno,ApellidoMaterno,Email);
end if$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `IdAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(145) NOT NULL,
  `ApellidoPaterno` varchar(145) NOT NULL,
  `ApellidoMaterno` varchar(145) NOT NULL,
  `Email` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`IdAlumno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`IdAlumno`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Email`) VALUES
(29, 'Sara', 'Huaman', 'Medina', 'sara@gmail.com'),
(30, 'marlon', 'peralta', 'panduro', 'marlo@gmail.com'),
(31, 'hernan', 'bacalla', 'placencia', 'hernan@gmail.com'),
(32, 'anthony', 'ramirez', 'quintana', 'anthony@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `alumno_IdAlumno` int(11) NOT NULL,
  `clase_IdClase` int(11) NOT NULL,
  `Asistio` bit(1) NOT NULL,
  `Observaciones` varchar(145) NOT NULL,
  KEY `fk_alumno_has_clase_clase1_idx` (`clase_IdClase`),
  KEY `fk_alumno_has_clase_alumno1_idx` (`alumno_IdAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`alumno_IdAlumno`, `clase_IdClase`, `Asistio`, `Observaciones`) VALUES
(29, 1, '1', '--'),
(30, 1, '1', '--'),
(31, 1, '1', '--'),
(32, 1, '1', '--');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centroeducativo`
--

CREATE TABLE IF NOT EXISTS `centroeducativo` (
  `IdCentroEducativo` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(145) NOT NULL,
  `Ubicacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdCentroEducativo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `centroeducativo`
--

INSERT INTO `centroeducativo` (`IdCentroEducativo`, `Descripcion`, `Ubicacion`) VALUES
(1, 'Ofelia Velasquez', '--'),
(2, 'Simon Bolivar', '--'),
(3, 'Jimenez Pimentel', '--'),
(4, '0620 Aplicacion', '--'),
(5, 'Virgen Dolorosa', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE IF NOT EXISTS `clase` (
  `IdClase` int(11) NOT NULL AUTO_INCREMENT,
  `IdCurso` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`IdClase`),
  KEY `IdCurso_idx` (`IdCurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`IdClase`, `IdCurso`, `Fecha`) VALUES
(1, 1, '2014-11-20'),
(2, 2, '2014-11-19'),
(3, 3, '2014-11-18'),
(4, 4, '2014-11-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterio`
--

CREATE TABLE IF NOT EXISTS `criterio` (
  `IdCriterio` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(145) NOT NULL,
  PRIMARY KEY (`IdCriterio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `criterio`
--

INSERT INTO `criterio` (`IdCriterio`, `Descripcion`) VALUES
(1, 'Resolucion de ejercicios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `IdCurso` int(11) NOT NULL AUTO_INCREMENT,
  `IdSeccion` int(11) NOT NULL,
  `Descripcion` varchar(145) NOT NULL,
  `Objetivo` varchar(145) NOT NULL,
  PRIMARY KEY (`IdCurso`),
  KEY `IdCentroEducativo_idx` (`IdSeccion`),
  KEY `IdSeccion` (`IdSeccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`IdCurso`, `IdSeccion`, `Descripcion`, `Objetivo`) VALUES
(1, 2, 'Matematica', '--'),
(2, 2, 'Comunicacion', '--'),
(3, 2, 'Actividad Artistica', '--'),
(4, 2, 'Ciencia tecnologia y Ambiente', '--');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledocentecentroeducativo`
--

CREATE TABLE IF NOT EXISTS `detalledocentecentroeducativo` (
  `IdDocente` int(11) NOT NULL,
  `IdCentroEducativo` int(11) NOT NULL,
  KEY `IdDocente` (`IdDocente`,`IdCentroEducativo`),
  KEY `IdCentroEducativo` (`IdCentroEducativo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledocentecurso`
--

CREATE TABLE IF NOT EXISTS `detalledocentecurso` (
  `IdDocente` int(11) NOT NULL,
  `IdCurso` int(11) NOT NULL,
  KEY `IdDocente` (`IdDocente`,`IdCurso`),
  KEY `IdCurso` (`IdCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `IdDocente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(145) NOT NULL,
  `ApellidoPaterno` varchar(145) NOT NULL,
  `ApellidoMaterno` varchar(145) NOT NULL,
  `Celular` varchar(10) DEFAULT NULL,
  `Email` varchar(155) DEFAULT NULL,
  `Edad` varchar(2) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Dni` varchar(8) DEFAULT NULL,
  `Clave` varchar(200) DEFAULT NULL,
  `Especialidad` varchar(20) NOT NULL,
  PRIMARY KEY (`IdDocente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`IdDocente`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Celular`, `Email`, `Edad`, `Sexo`, `Dni`, `Clave`, `Especialidad`) VALUES
(1, 'Anthony', 'Ramirez', 'Quintana', '999999999', 'anthony@gmail.com', '20', 'M', '11111111', '11111111', 'Fisico Matematico'),
(2, 'Marlon', 'Peralta', 'Panduro', '999999999', 'marlon@gmail.com', '19', 'M', '22222222', '22222222', 'Quimica'),
(3, 'Sara ', 'Huaman', 'Medina', '999999999', 'sara@gmail.com', '19', 'F', '76518229', '76518229', 'Comunicacion'),
(4, 'Hernan', 'Bacalla', 'Plasencia', '999999999', 'hernan@gmail.com', '19', 'M', '33333333', '33333333', 'Biologo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
  `IdCurso` int(11) NOT NULL,
  `IdCriterio` int(11) NOT NULL,
  `IdAlumno` int(11) NOT NULL,
  `Nota` double(2,0) NOT NULL,
  KEY `fk_periodo_has_criterio_criterio1_idx` (`IdCriterio`),
  KEY `fk_periodo_has_criterio_periodo1_idx` (`IdCurso`),
  KEY `IdCurso` (`IdCurso`),
  KEY `IdAlumno` (`IdAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`IdCurso`, `IdCriterio`, `IdAlumno`, `Nota`) VALUES
(1, 1, 29, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE IF NOT EXISTS `grado` (
  `IdGrado` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(10) NOT NULL,
  `IdCentroEducativo` int(11) NOT NULL,
  PRIMARY KEY (`IdGrado`),
  KEY `IdCentroEducativo` (`IdCentroEducativo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`IdGrado`, `Descripcion`, `IdCentroEducativo`) VALUES
(1, '1', 1),
(2, '2do Grado', 2),
(3, '3', 3),
(4, '4to Grado', 2),
(5, '5to Grado', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `IdSeccion` int(11) NOT NULL AUTO_INCREMENT,
  `IdGrado` int(11) NOT NULL,
  `Descripcion` varchar(1) NOT NULL,
  PRIMARY KEY (`IdSeccion`),
  KEY `IdGrado_idx` (`IdGrado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`IdSeccion`, `IdGrado`, `Descripcion`) VALUES
(1, 2, 'A'),
(2, 2, 'C');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_alumno_has_clase_alumno1` FOREIGN KEY (`alumno_IdAlumno`) REFERENCES `alumno` (`IdAlumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alumno_has_clase_clase1` FOREIGN KEY (`clase_IdClase`) REFERENCES `clase` (`IdClase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `IdCurso` FOREIGN KEY (`IdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`IdSeccion`) REFERENCES `seccion` (`IdSeccion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalledocentecentroeducativo`
--
ALTER TABLE `detalledocentecentroeducativo`
  ADD CONSTRAINT `detalledocentecentroeducativo_ibfk_2` FOREIGN KEY (`IdCentroEducativo`) REFERENCES `centroeducativo` (`IdCentroEducativo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalledocentecentroeducativo_ibfk_1` FOREIGN KEY (`IdDocente`) REFERENCES `docente` (`IdDocente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalledocentecurso`
--
ALTER TABLE `detalledocentecurso`
  ADD CONSTRAINT `detalledocentecurso_ibfk_2` FOREIGN KEY (`IdCurso`) REFERENCES `clase` (`IdCurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalledocentecurso_ibfk_1` FOREIGN KEY (`IdDocente`) REFERENCES `docente` (`IdDocente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `evaluacion_ibfk_1` FOREIGN KEY (`IdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_ibfk_2` FOREIGN KEY (`IdCriterio`) REFERENCES `criterio` (`IdCriterio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacion_ibfk_3` FOREIGN KEY (`IdAlumno`) REFERENCES `alumno` (`IdAlumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `grado_ibfk_1` FOREIGN KEY (`IdCentroEducativo`) REFERENCES `centroeducativo` (`IdCentroEducativo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `IdGrado` FOREIGN KEY (`IdGrado`) REFERENCES `grado` (`IdGrado`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
