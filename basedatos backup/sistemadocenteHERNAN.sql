/*
Navicat MySQL Data Transfer

Source Server         : conexion
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : sistemadocente

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2014-12-11 01:30:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `alumno`
-- ----------------------------
DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno` (
  `IdAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(145) NOT NULL,
  `ApellidoPaterno` varchar(145) NOT NULL,
  `ApellidoMaterno` varchar(145) NOT NULL,
  `Email` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`IdAlumno`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alumno
-- ----------------------------
INSERT INTO `alumno` VALUES ('29', 'Sarita', 'Huaman', 'Medina', 'sara@gmail.com');
INSERT INTO `alumno` VALUES ('30', 'marlon', 'peralta', 'panduro', 'marlo@gmail.com');
INSERT INTO `alumno` VALUES ('31', 'Hernan', 'bacalla', 'placencia', 'hernan@gmail.com');
INSERT INTO `alumno` VALUES ('32', 'anthony', 'ramirez', 'quintana', 'anthony@gmail.com');

-- ----------------------------
-- Table structure for `asistencia`
-- ----------------------------
DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE `asistencia` (
  `alumno_IdAlumno` int(11) NOT NULL,
  `clase_IdClase` int(11) NOT NULL,
  `Asistio` bit(1) NOT NULL,
  `Observaciones` varchar(145) NOT NULL,
  KEY `fk_alumno_has_clase_clase1_idx` (`clase_IdClase`),
  KEY `fk_alumno_has_clase_alumno1_idx` (`alumno_IdAlumno`),
  CONSTRAINT `fk_alumno_has_clase_alumno1` FOREIGN KEY (`alumno_IdAlumno`) REFERENCES `alumno` (`IdAlumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_alumno_has_clase_clase1` FOREIGN KEY (`clase_IdClase`) REFERENCES `clase` (`IdClase`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asistencia
-- ----------------------------
INSERT INTO `asistencia` VALUES ('29', '1', '', '--');
INSERT INTO `asistencia` VALUES ('30', '1', '', '--');
INSERT INTO `asistencia` VALUES ('31', '1', '', '--');
INSERT INTO `asistencia` VALUES ('32', '1', '', '--');

-- ----------------------------
-- Table structure for `centroeducativo`
-- ----------------------------
DROP TABLE IF EXISTS `centroeducativo`;
CREATE TABLE `centroeducativo` (
  `IdCentroEducativo` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(145) NOT NULL,
  `Ubicacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdCentroEducativo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of centroeducativo
-- ----------------------------
INSERT INTO `centroeducativo` VALUES ('1', 'Ofelia Velasquez', '--');
INSERT INTO `centroeducativo` VALUES ('2', 'Simon Bolivar', '--');
INSERT INTO `centroeducativo` VALUES ('3', 'Jimenez Pimentel', '--');
INSERT INTO `centroeducativo` VALUES ('4', '0620 Aplicacion', '--');
INSERT INTO `centroeducativo` VALUES ('5', 'Virgen Dolorosa', null);
INSERT INTO `centroeducativo` VALUES ('19', 'Abilia Ocampo', null);

-- ----------------------------
-- Table structure for `clase`
-- ----------------------------
DROP TABLE IF EXISTS `clase`;
CREATE TABLE `clase` (
  `IdClase` int(11) NOT NULL AUTO_INCREMENT,
  `IdCurso` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`IdClase`),
  KEY `IdCurso_idx` (`IdCurso`),
  CONSTRAINT `IdCurso` FOREIGN KEY (`IdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clase
-- ----------------------------
INSERT INTO `clase` VALUES ('1', '1', '2014-11-20');
INSERT INTO `clase` VALUES ('2', '2', '2014-11-19');
INSERT INTO `clase` VALUES ('3', '3', '2014-11-18');
INSERT INTO `clase` VALUES ('4', '4', '2014-11-17');

-- ----------------------------
-- Table structure for `criterio`
-- ----------------------------
DROP TABLE IF EXISTS `criterio`;
CREATE TABLE `criterio` (
  `IdCriterio` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(145) NOT NULL,
  PRIMARY KEY (`IdCriterio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of criterio
-- ----------------------------
INSERT INTO `criterio` VALUES ('1', 'Resolucion de ejercicios');

-- ----------------------------
-- Table structure for `curso`
-- ----------------------------
DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `IdCurso` int(11) NOT NULL AUTO_INCREMENT,
  `IdSeccion` int(11) NOT NULL,
  `Descripcion` varchar(145) NOT NULL,
  `Objetivo` varchar(145) NOT NULL,
  PRIMARY KEY (`IdCurso`),
  KEY `IdCentroEducativo_idx` (`IdSeccion`),
  KEY `IdSeccion` (`IdSeccion`),
  CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`IdSeccion`) REFERENCES `seccion` (`IdSeccion`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of curso
-- ----------------------------
INSERT INTO `curso` VALUES ('1', '2', 'Matematica', '--');
INSERT INTO `curso` VALUES ('2', '2', 'Comunicacion', '--');
INSERT INTO `curso` VALUES ('3', '2', 'Actividad Artistica', '--');
INSERT INTO `curso` VALUES ('4', '2', 'Ciencia tecnologia y Ambiente', '--');

-- ----------------------------
-- Table structure for `detallealumnocurso`
-- ----------------------------
DROP TABLE IF EXISTS `detallealumnocurso`;
CREATE TABLE `detallealumnocurso` (
  `IdAlumno` int(11) NOT NULL,
  `IdCurso` int(11) NOT NULL,
  KEY `IdAlumno` (`IdAlumno`),
  KEY `IdCurso` (`IdCurso`),
  CONSTRAINT `detallealumnocurso_ibfk_1` FOREIGN KEY (`IdAlumno`) REFERENCES `alumno` (`IdAlumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detallealumnocurso_ibfk_2` FOREIGN KEY (`IdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of detallealumnocurso
-- ----------------------------

-- ----------------------------
-- Table structure for `detalledocentecentroeducativo`
-- ----------------------------
DROP TABLE IF EXISTS `detalledocentecentroeducativo`;
CREATE TABLE `detalledocentecentroeducativo` (
  `IdDocente` int(11) NOT NULL,
  `IdCentroEducativo` int(11) NOT NULL,
  KEY `IdDocente` (`IdDocente`,`IdCentroEducativo`),
  KEY `IdCentroEducativo` (`IdCentroEducativo`),
  CONSTRAINT `detalledocentecentroeducativo_ibfk_1` FOREIGN KEY (`IdDocente`) REFERENCES `docente` (`IdDocente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalledocentecentroeducativo_ibfk_2` FOREIGN KEY (`IdCentroEducativo`) REFERENCES `centroeducativo` (`IdCentroEducativo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of detalledocentecentroeducativo
-- ----------------------------
INSERT INTO `detalledocentecentroeducativo` VALUES ('1', '1');
INSERT INTO `detalledocentecentroeducativo` VALUES ('2', '2');
INSERT INTO `detalledocentecentroeducativo` VALUES ('4', '19');

-- ----------------------------
-- Table structure for `detalledocentecurso`
-- ----------------------------
DROP TABLE IF EXISTS `detalledocentecurso`;
CREATE TABLE `detalledocentecurso` (
  `IdDocente` int(11) NOT NULL,
  `IdCurso` int(11) NOT NULL,
  KEY `IdDocente` (`IdDocente`,`IdCurso`),
  KEY `IdCurso` (`IdCurso`),
  CONSTRAINT `detalledocentecurso_ibfk_1` FOREIGN KEY (`IdDocente`) REFERENCES `docente` (`IdDocente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalledocentecurso_ibfk_2` FOREIGN KEY (`IdCurso`) REFERENCES `clase` (`IdCurso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of detalledocentecurso
-- ----------------------------

-- ----------------------------
-- Table structure for `docente`
-- ----------------------------
DROP TABLE IF EXISTS `docente`;
CREATE TABLE `docente` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of docente
-- ----------------------------
INSERT INTO `docente` VALUES ('1', 'Anthony', 'Ramirez', 'Quintana', '942656397', 'anthony@gmail.com', '21', 'M', '74088887', 'ramirez740', 'Fisico Matematico');
INSERT INTO `docente` VALUES ('2', 'Marlon', 'Peralta', 'Panduro', '999999999', 'marlon@gmail.com', '19', 'M', '22222222', '22222222', 'Quimica');
INSERT INTO `docente` VALUES ('3', 'Sara ', 'Huaman', 'Medina', '999999999', 'sara@gmail.com', '19', 'F', '76518229', '76518229', 'Comunicacion');
INSERT INTO `docente` VALUES ('4', 'Hernan ', 'Bacalla', 'Plasencia', '971437259', 'hernan@gmail.com', '20', 'M', '70614303', 'hernan1', 'Estudiante');

-- ----------------------------
-- Table structure for `evaluacion`
-- ----------------------------
DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE `evaluacion` (
  `IdCurso` int(11) NOT NULL,
  `IdCriterio` int(11) NOT NULL,
  `IdAlumno` int(11) NOT NULL,
  `Nota` double(2,0) NOT NULL,
  KEY `fk_periodo_has_criterio_criterio1_idx` (`IdCriterio`),
  KEY `fk_periodo_has_criterio_periodo1_idx` (`IdCurso`),
  KEY `IdCurso` (`IdCurso`),
  KEY `IdAlumno` (`IdAlumno`),
  CONSTRAINT `evaluacion_ibfk_1` FOREIGN KEY (`IdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `evaluacion_ibfk_2` FOREIGN KEY (`IdCriterio`) REFERENCES `criterio` (`IdCriterio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `evaluacion_ibfk_3` FOREIGN KEY (`IdAlumno`) REFERENCES `alumno` (`IdAlumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of evaluacion
-- ----------------------------
INSERT INTO `evaluacion` VALUES ('1', '1', '29', '20');

-- ----------------------------
-- Table structure for `grado`
-- ----------------------------
DROP TABLE IF EXISTS `grado`;
CREATE TABLE `grado` (
  `IdGrado` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(10) NOT NULL,
  `IdCentroEducativo` int(11) NOT NULL,
  PRIMARY KEY (`IdGrado`),
  KEY `IdCentroEducativo` (`IdCentroEducativo`),
  CONSTRAINT `grado_ibfk_1` FOREIGN KEY (`IdCentroEducativo`) REFERENCES `centroeducativo` (`IdCentroEducativo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of grado
-- ----------------------------
INSERT INTO `grado` VALUES ('1', '1', '1');
INSERT INTO `grado` VALUES ('2', '2do Grado', '2');
INSERT INTO `grado` VALUES ('3', '3', '3');
INSERT INTO `grado` VALUES ('4', '4to Grado', '2');
INSERT INTO `grado` VALUES ('5', '5to Grado', '2');
INSERT INTO `grado` VALUES ('10', '5to grado', '19');

-- ----------------------------
-- Table structure for `seccion`
-- ----------------------------
DROP TABLE IF EXISTS `seccion`;
CREATE TABLE `seccion` (
  `IdSeccion` int(11) NOT NULL AUTO_INCREMENT,
  `IdGrado` int(11) NOT NULL,
  `Descripcion` varchar(1) NOT NULL,
  PRIMARY KEY (`IdSeccion`),
  KEY `IdGrado_idx` (`IdGrado`),
  CONSTRAINT `IdGrado` FOREIGN KEY (`IdGrado`) REFERENCES `grado` (`IdGrado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of seccion
-- ----------------------------
INSERT INTO `seccion` VALUES ('1', '2', 'A');
INSERT INTO `seccion` VALUES ('2', '2', 'C');
INSERT INTO `seccion` VALUES ('5', '10', 'D');

-- ----------------------------
-- Procedure structure for `pa_insertar_alumno`
-- ----------------------------
DROP PROCEDURE IF EXISTS `pa_insertar_alumno`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_alumno`(IN `Nombre` varchar(10), IN `ApellidoPaterno` varchar(10), IN `ApellidoMaterno` varchar(10),IN `Email` varchar(10), IN `op` integer)
if op=0 THEN
INSERT INTO alumno (Nombre,ApellidoPaterno,ApellidoMaterno,Email)
VALUES (Nombre,ApellidoPaterno,ApellidoMaterno,Email);
end if
;;
DELIMITER ;
