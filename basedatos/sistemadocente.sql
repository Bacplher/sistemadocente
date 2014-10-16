CREATE DATABASE  IF NOT EXISTS `sistemadocente` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistemadocente`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: sistemadocente
-- ------------------------------------------------------
-- Server version	5.5.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `IdAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(145) NOT NULL,
  `ApellidoPaterno` varchar(145) NOT NULL,
  `ApellidoMaterno` varchar(145) NOT NULL,
  `Email` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`IdAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centroeducativo`
--

DROP TABLE IF EXISTS `centroeducativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centroeducativo` (
  `IdCentroEducativo` int(11) NOT NULL,
  `IdDocente` int(11) NOT NULL,
  `Descripcion` varchar(145) NOT NULL,
  `Ubicacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdCentroEducativo`),
  KEY `IdDocente_idx` (`IdDocente`),
  CONSTRAINT `IdDocente` FOREIGN KEY (`IdDocente`) REFERENCES `docente` (`IdDocente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centroeducativo`
--

LOCK TABLES `centroeducativo` WRITE;
/*!40000 ALTER TABLE `centroeducativo` DISABLE KEYS */;
/*!40000 ALTER TABLE `centroeducativo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase`
--

DROP TABLE IF EXISTS `clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase` (
  `IdClase` int(11) NOT NULL AUTO_INCREMENT,
  `IdCurso` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`IdClase`),
  KEY `IdCurso_idx` (`IdCurso`),
  CONSTRAINT `IdCurso` FOREIGN KEY (`IdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase`
--

LOCK TABLES `clase` WRITE;
/*!40000 ALTER TABLE `clase` DISABLE KEYS */;
/*!40000 ALTER TABLE `clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `criterio`
--

DROP TABLE IF EXISTS `criterio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `criterio` (
  `IdCriterio` int(11) NOT NULL AUTO_INCREMENT,
  `IdTipoCriterio` int(11) NOT NULL,
  `Descripcion` varchar(145) NOT NULL,
  PRIMARY KEY (`IdCriterio`),
  KEY `IdTipoCriterio_idx` (`IdTipoCriterio`),
  CONSTRAINT `IdTipoCriterio` FOREIGN KEY (`IdTipoCriterio`) REFERENCES `tipocriterio` (`IdTipoCriterio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criterio`
--

LOCK TABLES `criterio` WRITE;
/*!40000 ALTER TABLE `criterio` DISABLE KEYS */;
/*!40000 ALTER TABLE `criterio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `IdCurso` int(11) NOT NULL AUTO_INCREMENT,
  `IdCentroEducativo` int(11) NOT NULL,
  `Descipcion` varchar(145) NOT NULL,
  `Objetivo` varchar(145) NOT NULL,
  PRIMARY KEY (`IdCurso`),
  KEY `IdCentroEducativo_idx` (`IdCentroEducativo`),
  CONSTRAINT `IdCentroEducativo` FOREIGN KEY (`IdCentroEducativo`) REFERENCES `centroeducativo` (`IdCentroEducativo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docente`
--

DROP TABLE IF EXISTS `docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente` (
  `IdDocente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(145) NOT NULL,
  `ApellidoPaterno` varchar(145) NOT NULL,
  `ApellidoMaterno` varchar(145) NOT NULL,
  `Celular` varchar(10) DEFAULT NULL,
  `Email` varchar(155) DEFAULT NULL,
  `Edad` varchar(2) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Dni` varchar(8) NOT NULL,
  `Contraseña` varchar(200) NOT NULL,
  PRIMARY KEY (`IdDocente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente`
--

LOCK TABLES `docente` WRITE;
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidad` (
  `IdEspecialidad` int(11) NOT NULL,
  `Descripcion` varchar(145) NOT NULL,
  `IdDocente` int(11) NOT NULL,
  PRIMARY KEY (`IdEspecialidad`),
  KEY `fk_especialidad_docente1_idx` (`IdDocente`),
  CONSTRAINT `fk_especialidad_docente1` FOREIGN KEY (`IdDocente`) REFERENCES `docente` (`IdDocente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad`
--

LOCK TABLES `especialidad` WRITE;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion` (
  `IdPeriodo` int(11) NOT NULL,
  `IdCriterio` int(11) NOT NULL,
  `Nota` decimal(2,2) NOT NULL,
  PRIMARY KEY (`IdPeriodo`,`IdCriterio`),
  KEY `fk_periodo_has_criterio_criterio1_idx` (`IdCriterio`),
  KEY `fk_periodo_has_criterio_periodo1_idx` (`IdPeriodo`),
  CONSTRAINT `fk_periodo_has_criterio_periodo1` FOREIGN KEY (`IdPeriodo`) REFERENCES `periodo` (`IdPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_periodo_has_criterio_criterio1` FOREIGN KEY (`IdCriterio`) REFERENCES `criterio` (`IdCriterio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado` (
  `IdGrado` int(11) NOT NULL,
  `Descripcion` varchar(1) NOT NULL,
  `IdCurso` int(11) NOT NULL,
  PRIMARY KEY (`IdGrado`,`IdCurso`),
  KEY `fk_grado_curso1_idx` (`IdCurso`),
  CONSTRAINT `fk_grado_curso1` FOREIGN KEY (`IdCurso`) REFERENCES `curso` (`IdCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodo`
--

DROP TABLE IF EXISTS `periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodo`
--

LOCK TABLES `periodo` WRITE;
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccion` (
  `IdSeccion` int(11) NOT NULL AUTO_INCREMENT,
  `IdGrado` int(11) NOT NULL,
  `Descripcion` varchar(1) NOT NULL,
  PRIMARY KEY (`IdSeccion`),
  KEY `IdGrado_idx` (`IdGrado`),
  CONSTRAINT `IdGrado` FOREIGN KEY (`IdGrado`) REFERENCES `grado` (`IdGrado`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocriterio`
--

DROP TABLE IF EXISTS `tipocriterio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocriterio` (
  `IdTipoCriterio` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`IdTipoCriterio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocriterio`
--

LOCK TABLES `tipocriterio` WRITE;
/*!40000 ALTER TABLE `tipocriterio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipocriterio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoperiodo`
--

DROP TABLE IF EXISTS `tipoperiodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoperiodo` (
  `IdTipoPeriodo` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(145) NOT NULL,
  PRIMARY KEY (`IdTipoPeriodo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoperiodo`
--

LOCK TABLES `tipoperiodo` WRITE;
/*!40000 ALTER TABLE `tipoperiodo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipoperiodo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-06 18:50:04
