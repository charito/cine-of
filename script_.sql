CREATE DATABASE  IF NOT EXISTS `dbcine` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbcine`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: dbcine
-- ------------------------------------------------------
-- Server version	5.7.9

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
-- Table structure for table `actores`
--

DROP TABLE IF EXISTS `actores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actores` (
  `id_Actor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Actor` varchar(100) DEFAULT NULL,
  `fecha_nacimiento_Actor` datetime DEFAULT NULL,
  `biografia_autor` varchar(500) DEFAULT NULL,
  `foto_Autor` blob,
  PRIMARY KEY (`id_Actor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actores`
--

LOCK TABLES `actores` WRITE;
/*!40000 ALTER TABLE `actores` DISABLE KEYS */;
INSERT INTO `actores` VALUES (1,'Marco','2012-12-12 00:00:00','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',NULL),(2,'polo','2012-12-12 00:00:00','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',NULL),(3,'Antonio','2011-11-11 00:00:00','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',NULL),(4,'Manuel','2010-10-10 00:00:00','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',NULL),(5,'Vargas','2009-09-09 00:00:00','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',NULL);
/*!40000 ALTER TABLE `actores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actores_peliculas`
--

DROP TABLE IF EXISTS `actores_peliculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actores_peliculas` (
  `id_Actor` int(11) NOT NULL,
  `id_Peli` int(11) NOT NULL,
  PRIMARY KEY (`id_Actor`,`id_Peli`),
  KEY `fk_Actores_has_Peliculas_Peliculas1_idx` (`id_Peli`),
  KEY `fk_Actores_has_Peliculas_Actores1_idx` (`id_Actor`),
  CONSTRAINT `fk_Actores_has_Peliculas_Actores1` FOREIGN KEY (`id_Actor`) REFERENCES `actores` (`id_Actor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Actores_has_Peliculas_Peliculas1` FOREIGN KEY (`id_Peli`) REFERENCES `peliculas` (`id_Peli`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actores_peliculas`
--

LOCK TABLES `actores_peliculas` WRITE;
/*!40000 ALTER TABLE `actores_peliculas` DISABLE KEYS */;
INSERT INTO `actores_peliculas` VALUES (1,4),(2,4),(3,4),(4,4),(5,4),(1,5),(3,5),(5,5),(2,6),(4,6);
/*!40000 ALTER TABLE `actores_peliculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Categoria` varchar(45) DEFAULT NULL,
  `desc_Categoria` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_Categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'accion',NULL),(2,'comedia',NULL),(3,'suspenso',NULL);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_peliculas`
--

DROP TABLE IF EXISTS `categoria_peliculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_peliculas` (
  `id_Categoria` int(11) NOT NULL,
  `id_Peli` int(11) NOT NULL,
  PRIMARY KEY (`id_Categoria`,`id_Peli`),
  KEY `fk_Categoria_has_Peliculas_Peliculas1_idx` (`id_Peli`),
  KEY `fk_Categoria_has_Peliculas_Categoria1_idx` (`id_Categoria`),
  CONSTRAINT `fk_Categoria_has_Peliculas_Categoria1` FOREIGN KEY (`id_Categoria`) REFERENCES `categoria` (`id_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Categoria_has_Peliculas_Peliculas1` FOREIGN KEY (`id_Peli`) REFERENCES `peliculas` (`id_Peli`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_peliculas`
--

LOCK TABLES `categoria_peliculas` WRITE;
/*!40000 ALTER TABLE `categoria_peliculas` DISABLE KEYS */;
INSERT INTO `categoria_peliculas` VALUES (1,4),(2,4),(3,4);
/*!40000 ALTER TABLE `categoria_peliculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_perfil`
--

DROP TABLE IF EXISTS `categoria_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_perfil` (
  `Categoria_id_Categoria` int(11) NOT NULL,
  `Perfil_id_Perfil` int(11) NOT NULL,
  PRIMARY KEY (`Categoria_id_Categoria`,`Perfil_id_Perfil`),
  KEY `fk_Categoria_has_Perfil_Perfil1_idx` (`Perfil_id_Perfil`),
  KEY `fk_Categoria_has_Perfil_Categoria1_idx` (`Categoria_id_Categoria`),
  CONSTRAINT `fk_Categoria_has_Perfil_Categoria1` FOREIGN KEY (`Categoria_id_Categoria`) REFERENCES `categoria` (`id_Categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Categoria_has_Perfil_Perfil1` FOREIGN KEY (`Perfil_id_Perfil`) REFERENCES `perfil` (`id_Perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_perfil`
--

LOCK TABLES `categoria_perfil` WRITE;
/*!40000 ALTER TABLE `categoria_perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `id_Comentarios` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(250) DEFAULT NULL,
  `fecha_comentario` datetime DEFAULT NULL,
  `calificaci├│n_comentario` decimal(10,0) DEFAULT NULL,
  `id_Resena` int(11) NOT NULL,
  PRIMARY KEY (`id_Comentarios`),
  KEY `fk_Comentarios_Rese├▒a1_idx` (`id_Resena`),
  CONSTRAINT `fk_Comentarios_Rese├▒a1` FOREIGN KEY (`id_Resena`) REFERENCES `resena` (`id_Resena`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (4,'Que cheverenguee','2012-12-12 00:00:00',1,1),(5,'naaa','2011-11-11 00:00:00',2,1),(6,'la batalla duró 7 minutos :v','2010-10-10 00:00:00',3,1),(7,'Batman es muy recio','2009-09-09 00:00:00',4,1);
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `director`
--

DROP TABLE IF EXISTS `director`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `director` (
  `id_Director` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Director` varchar(100) DEFAULT NULL,
  `foto_Director` blob,
  PRIMARY KEY (`id_Director`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `director`
--

LOCK TABLES `director` WRITE;
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
INSERT INTO `director` VALUES (1,'Peru',NULL);
/*!40000 ALTER TABLE `director` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiquetas`
--

DROP TABLE IF EXISTS `etiquetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etiquetas` (
  `id_Etiquetas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Etiqueta` varchar(45) DEFAULT NULL,
  `desc_Etiqueta` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_Etiquetas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiquetas`
--

LOCK TABLES `etiquetas` WRITE;
/*!40000 ALTER TABLE `etiquetas` DISABLE KEYS */;
/*!40000 ALTER TABLE `etiquetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiquetas_noticias`
--

DROP TABLE IF EXISTS `etiquetas_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etiquetas_noticias` (
  `id_Etiquetas` int(11) NOT NULL,
  `id_Noticia` int(11) NOT NULL,
  PRIMARY KEY (`id_Etiquetas`,`id_Noticia`),
  KEY `fk_etiquetas_has_Noticias_Noticias1_idx` (`id_Noticia`),
  KEY `fk_etiquetas_has_Noticias_etiquetas1_idx` (`id_Etiquetas`),
  CONSTRAINT `fk_etiquetas_has_Noticias_Noticias1` FOREIGN KEY (`id_Noticia`) REFERENCES `noticias` (`id_Noticia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_etiquetas_has_Noticias_etiquetas1` FOREIGN KEY (`id_Etiquetas`) REFERENCES `etiquetas` (`id_Etiquetas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiquetas_noticias`
--

LOCK TABLES `etiquetas_noticias` WRITE;
/*!40000 ALTER TABLE `etiquetas_noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `etiquetas_noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etiquetas_resena`
--

DROP TABLE IF EXISTS `etiquetas_resena`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etiquetas_resena` (
  `id_Etiquetas` int(11) NOT NULL,
  `id_Resena` int(11) NOT NULL,
  PRIMARY KEY (`id_Etiquetas`,`id_Resena`),
  KEY `fk_etiquetas_has_Rese├▒a_Rese├▒a1_idx` (`id_Resena`),
  KEY `fk_etiquetas_has_Rese├▒a_etiquetas1_idx` (`id_Etiquetas`),
  CONSTRAINT `fk_etiquetas_has_Rese├▒a_Rese├▒a1` FOREIGN KEY (`id_Resena`) REFERENCES `resena` (`id_Resena`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_etiquetas_has_Rese├▒a_etiquetas1` FOREIGN KEY (`id_Etiquetas`) REFERENCES `etiquetas` (`id_Etiquetas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etiquetas_resena`
--

LOCK TABLES `etiquetas_resena` WRITE;
/*!40000 ALTER TABLE `etiquetas_resena` DISABLE KEYS */;
/*!40000 ALTER TABLE `etiquetas_resena` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logros`
--

DROP TABLE IF EXISTS `logros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logros` (
  `id_Logros` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Logro` varchar(45) DEFAULT NULL,
  `imagen_Logro` blob,
  `desc_Logro` varchar(250) DEFAULT NULL,
  `recompensa_Logro` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_Logros`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logros`
--

LOCK TABLES `logros` WRITE;
/*!40000 ALTER TABLE `logros` DISABLE KEYS */;
/*!40000 ALTER TABLE `logros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticias` (
  `id_Noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_Noticia` varchar(45) DEFAULT NULL,
  `subtitulo_Noticia` varchar(250) DEFAULT NULL,
  `fecha_Noticia` datetime DEFAULT NULL,
  `imagen_Noticia` blob,
  `cuerpo_Noticia` varchar(1000) DEFAULT NULL,
  `url_Noticia` varchar(300) DEFAULT NULL,
  `tags` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_Noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peliculas` (
  `id_Peli` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_Peli` varchar(45) DEFAULT NULL,
  `duracion_Peli` varchar(45) DEFAULT NULL,
  `estreno_Peli` date DEFAULT NULL,
  `imagen_Portada_Peli` blob,
  `logo_Peli` blob,
  `id_Director` int(11) NOT NULL,
  `vistos_Peli` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_Peli`),
  KEY `fk_Peliculas_Director1_idx` (`id_Director`),
  CONSTRAINT `fk_Peliculas_Director1` FOREIGN KEY (`id_Director`) REFERENCES `director` (`id_Director`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peliculas`
--

LOCK TABLES `peliculas` WRITE;
/*!40000 ALTER TABLE `peliculas` DISABLE KEYS */;
INSERT INTO `peliculas` VALUES (4,'Batman vs Superman','1:45','2011-11-11','?','?',1,NULL),(5,'Big Hero 6','1:45','2015-12-21','?','?',1,NULL),(6,'Planeta de los Simios','1:45','2012-12-12','?','?',1,NULL),(7,'Lego la Pelicula','1:45','2012-12-12','?','?',1,NULL),(8,'Los Vengadores','1:45','2016-12-12','?','?',1,NULL);
/*!40000 ALTER TABLE `peliculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id_Perfil` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_Perfil` varchar(45) DEFAULT NULL,
  `clave_Perfil` varchar(16) DEFAULT NULL,
  `nombre_Perfil` varchar(45) DEFAULT NULL,
  `apellidos_Perfil` varchar(45) DEFAULT NULL,
  `nacionalidad_Perfil` varchar(45) DEFAULT NULL,
  `cantidad_comentarios` int(11) DEFAULT NULL,
  `categoria_Perfil` varchar(45) DEFAULT NULL,
  `foto_Perfil` blob,
  PRIMARY KEY (`id_Perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_comentarios`
--

DROP TABLE IF EXISTS `perfil_comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_comentarios` (
  `id_Perfil` int(11) NOT NULL,
  `id_Comentarios` int(11) NOT NULL,
  PRIMARY KEY (`id_Perfil`,`id_Comentarios`),
  KEY `fk_Perfil_has_Comentarios_Comentarios1_idx` (`id_Comentarios`),
  KEY `fk_Perfil_has_Comentarios_Perfil1_idx` (`id_Perfil`),
  CONSTRAINT `fk_Perfil_has_Comentarios_Comentarios1` FOREIGN KEY (`id_Comentarios`) REFERENCES `comentarios` (`id_Comentarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Perfil_has_Comentarios_Perfil1` FOREIGN KEY (`id_Perfil`) REFERENCES `perfil` (`id_Perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_comentarios`
--

LOCK TABLES `perfil_comentarios` WRITE;
/*!40000 ALTER TABLE `perfil_comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil_comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil_logros`
--

DROP TABLE IF EXISTS `perfil_logros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil_logros` (
  `id_Perfil` int(11) NOT NULL,
  `id_Logros` int(11) NOT NULL,
  PRIMARY KEY (`id_Perfil`,`id_Logros`),
  KEY `fk_Perfil_has_Logros_Logros1_idx` (`id_Logros`),
  KEY `fk_Perfil_has_Logros_Perfil1_idx` (`id_Perfil`),
  CONSTRAINT `fk_Perfil_has_Logros_Logros1` FOREIGN KEY (`id_Logros`) REFERENCES `logros` (`id_Logros`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Perfil_has_Logros_Perfil1` FOREIGN KEY (`id_Perfil`) REFERENCES `perfil` (`id_Perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil_logros`
--

LOCK TABLES `perfil_logros` WRITE;
/*!40000 ALTER TABLE `perfil_logros` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil_logros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resena`
--

DROP TABLE IF EXISTS `resena`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resena` (
  `id_Resena` int(11) NOT NULL AUTO_INCREMENT,
  `sinopsis_Resena` varchar(600) DEFAULT NULL,
  `Peliculas_id_Peli` int(11) NOT NULL,
  `url_trailer` varchar(300) DEFAULT NULL,
  `url_latino1` varchar(300) DEFAULT NULL,
  `url_latino2` varchar(300) DEFAULT NULL,
  `url_espanol` varchar(300) DEFAULT NULL,
  `url_sub` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_Resena`),
  KEY `fk_Rese├▒a_Peliculas1_idx` (`Peliculas_id_Peli`),
  CONSTRAINT `fk_Rese├▒a_Peliculas1` FOREIGN KEY (`Peliculas_id_Peli`) REFERENCES `peliculas` (`id_Peli`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resena`
--

LOCK TABLES `resena` WRITE;
/*!40000 ALTER TABLE `resena` DISABLE KEYS */;
INSERT INTO `resena` VALUES (1,'Esto está en la base de datos ... Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',4,'https://www.youtube.com/watch?v=I1MFkzLv_HA','b','ñ','a','1'),(2,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',5,'a','a','a','a','a');
/*!40000 ALTER TABLE `resena` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-11 19:38:28
