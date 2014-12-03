/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : sistemadocente

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2014-12-03 13:08:54
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
INSERT INTO `alumno` VALUES ('29', 'Sara', 'Huaman', 'Medina', 'sara@gmail.com');
INSERT INTO `alumno` VALUES ('30', 'marlon', 'peralta', 'panduro', 'marlo@gmail.com');
INSERT INTO `alumno` VALUES ('31', 'hernan', 'bacalla', 'placencia', 'hernan@gmail.com');
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
  PRIMARY KEY (`alumno_IdAlumno`,`clase_IdClase`),
  KEY `fk_alumno_has_clase_clase1_idx` (`clase_IdClase`),
  KEY `fk_alumno_has_clase_alumno1_idx` (`alumno_IdAlumno`),
  CONSTRAINT `fk_alumno_has_clase_alumno1` FOREIGN KEY (`alumno_IdAlumno`) REFERENCES `alumno` (`IdAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_has_clase_clase1` FOREIGN KEY (`clase_IdClase`) REFERENCES `clase` (`IdClase`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `IdDocente` int(11) NOT NULL,
  `Descripcion` varchar(145) NOT NULL,
  `Ubicacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdCentroEducativo`),
  KEY `IdDocente_idx` (`IdDocente`),
  CONSTRAINT `IdDocente` FOREIGN KEY (`IdDocente`) REFERENCES `docente` (`IdDocente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of centroeducativo
-- ----------------------------
INSERT INTO `centroeducativo` VALUES ('1', '1', 'Ofelia Velasquez', '--');
INSERT INTO `centroeducativo` VALUES ('2', '2', 'Simon Bolivar', '--');
INSERT INTO `centroeducativo` VALUES ('3', '3', 'Jimenez Pimentel', '--');
INSERT INTO `centroeducativo` VALUES ('4', '4', '0620 Aplicacion', '--');

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
  `IdTipoCriterio` int(11) NOT NULL,
  `Descripcion` varchar(145) NOT NULL,
  PRIMARY KEY (`IdCriterio`),
  KEY `IdTipoCriterio_idx` (`IdTipoCriterio`),
  CONSTRAINT `IdTipoCriterio` FOREIGN KEY (`IdTipoCriterio`) REFERENCES `tipocriterio` (`IdTipoCriterio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of criterio
-- ----------------------------
INSERT INTO `criterio` VALUES ('1', '1', 'Resolucion de ejercicios');

-- ----------------------------
-- Table structure for `curso`
-- ----------------------------
DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `IdCurso` int(11) NOT NULL AUTO_INCREMENT,
  `IdCentroEducativo` int(11) NOT NULL,
  `Descripcion` varchar(145) NOT NULL,
  `Objetivo` varchar(145) NOT NULL,
  PRIMARY KEY (`IdCurso`),
  KEY `IdCentroEducativo_idx` (`IdCentroEducativo`),
  CONSTRAINT `IdCentroEducativo` FOREIGN KEY (`IdCentroEducativo`) REFERENCES `centroeducativo` (`IdCentroEducativo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of curso
-- ----------------------------
INSERT INTO `curso` VALUES ('1', '1', 'Matematica', '--');
INSERT INTO `curso` VALUES ('2', '2', 'Comunicacion', '--');
INSERT INTO `curso` VALUES ('3', '3', 'Actividad Artistica', '--');
INSERT INTO `curso` VALUES ('4', '4', 'Ciencia tecnologia y Ambiente', '--');

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
  PRIMARY KEY (`IdDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of docente
-- ----------------------------
INSERT INTO `docente` VALUES ('1', 'Anthony', 'Ramirez', 'Quintana', '999999999', 'anthony@gmail.com', '20', 'M', '11111111', '11111111');
INSERT INTO `docente` VALUES ('2', 'Marlon', 'Peralta', 'Panduro', '999999999', 'marlon@gmail.com', '19', 'M', '22222222', '22222222');
INSERT INTO `docente` VALUES ('3', 'Sara ', 'Huaman', 'Medina', '999999999', 'sara@gmail.com', '19', 'F', '76518229', '76518229');
INSERT INTO `docente` VALUES ('4', 'Hernan', 'Bacalla', 'Plasencia', '999999999', 'hernan@gmail.com', '19', 'M', '33333333', '33333333');

-- ----------------------------
-- Table structure for `especialidad`
-- ----------------------------
DROP TABLE IF EXISTS `especialidad`;
CREATE TABLE `especialidad` (
  `IdEspecialidad` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(145) NOT NULL,
  `IdDocente` int(11) NOT NULL,
  PRIMARY KEY (`IdEspecialidad`),
  KEY `fk_especialidad_docente1_idx` (`IdDocente`),
  CONSTRAINT `fk_especialidad_docente1` FOREIGN KEY (`IdDocente`) REFERENCES `docente` (`IdDocente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of especialidad
-- ----------------------------
INSERT INTO `especialidad` VALUES ('1', 'Fisico Matematico', '1');
INSERT INTO `especialidad` VALUES ('2', 'Quimico', '2');
INSERT INTO `especialidad` VALUES ('3', 'Comunicacion', '3');
INSERT INTO `especialidad` VALUES ('4', 'Biologo', '4');

-- ----------------------------
-- Table structure for `evaluacion`
-- ----------------------------
DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE `evaluacion` (
  `IdPeriodo` int(11) NOT NULL,
  `IdCriterio` int(11) NOT NULL,
  `Nota` double(2,0) NOT NULL,
  PRIMARY KEY (`IdPeriodo`,`IdCriterio`),
  KEY `fk_periodo_has_criterio_criterio1_idx` (`IdCriterio`),
  KEY `fk_periodo_has_criterio_periodo1_idx` (`IdPeriodo`),
  CONSTRAINT `fk_periodo_has_criterio_criterio1` FOREIGN KEY (`IdCriterio`) REFERENCES `criterio` (`IdCriterio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_periodo_has_criterio_periodo1` FOREIGN KEY (`IdPeriodo`) REFERENCES `periodo` (`IdPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of evaluacion
-- ----------------------------
INSERT INTO `evaluacion` VALUES ('1', '1', '20');

-- ----------------------------
-- Table structure for `grado`
-- ----------------------------
DROP TABLE IF EXISTS `grado`;
CREATE TABLE `grado` (
  `IdGrado` int(11) NOT NULL,
  `Descripcion` varchar(1) NOT NULL,
  `IdCurso` int(11) NOT NULL,
  PRIMARY KEY (`IdGrado`,`IdCurso`),
  KEY `fk_grado_curso1_idx` (`IdCurso`),
  CONSTRAINT `fk_grado_curso1` FOREIGN KEY (`IdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of grado
-- ----------------------------
INSERT INTO `grado` VALUES ('1', '1', '1');
INSERT INTO `grado` VALUES ('2', '2', '1');
INSERT INTO `grado` VALUES ('3', '3', '1');

-- ----------------------------
-- Table structure for `periodo`
-- ----------------------------
DROP TABLE IF EXISTS `periodo`;
CREATE TABLE `periodo` (
  `IdCurso` int(11) NOT NULL,
  `IdTipoPeriodo` int(11) NOT NULL,
  `IdPeriodo` int(11) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaTermino` date NOT NULL,
  PRIMARY KEY (`IdPeriodo`),
  KEY `fk_curso_has_tipoperiodo_tipoperiodo1_idx` (`IdTipoPeriodo`),
  KEY `fk_curso_has_tipoperiodo_curso1_idx` (`IdCurso`),
  CONSTRAINT `fk_curso_has_tipoperiodo_curso1` FOREIGN KEY (`IdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_curso_has_tipoperiodo_tipoperiodo1` FOREIGN KEY (`IdTipoPeriodo`) REFERENCES `tipoperiodo` (`IdTipoPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of periodo
-- ----------------------------
INSERT INTO `periodo` VALUES ('1', '1', '1', '2014-11-01', '2015-01-30');

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
  CONSTRAINT `IdGrado` FOREIGN KEY (`IdGrado`) REFERENCES `grado` (`IdGrado`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of seccion
-- ----------------------------
INSERT INTO `seccion` VALUES ('1', '1', 'A');
INSERT INTO `seccion` VALUES ('2', '1', 'C');

-- ----------------------------
-- Table structure for `tipocriterio`
-- ----------------------------
DROP TABLE IF EXISTS `tipocriterio`;
CREATE TABLE `tipocriterio` (
  `IdTipoCriterio` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`IdTipoCriterio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipocriterio
-- ----------------------------
INSERT INTO `tipocriterio` VALUES ('1', 'Razonamiento y Demostracion');
INSERT INTO `tipocriterio` VALUES ('2', 'Comunicacion ');
INSERT INTO `tipocriterio` VALUES ('3', 'Resolucion de Problemas');
INSERT INTO `tipocriterio` VALUES ('4', 'Actitud ante el area');

-- ----------------------------
-- Table structure for `tipoperiodo`
-- ----------------------------
DROP TABLE IF EXISTS `tipoperiodo`;
CREATE TABLE `tipoperiodo` (
  `IdTipoPeriodo` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(145) NOT NULL,
  PRIMARY KEY (`IdTipoPeriodo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipoperiodo
-- ----------------------------
INSERT INTO `tipoperiodo` VALUES ('1', 'Semestral');
INSERT INTO `tipoperiodo` VALUES ('2', 'Trimestral');

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
