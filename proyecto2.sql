-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: proyecto
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_carrito`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (1),(2),(3);
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` char(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Estomacal'),(2,'Dolor'),(3,'Fiebre'),(4,'Suplementos alimenticios'),(5,'Gripa y tos'),(6,'Material de curacion'),(7,'Vitaminas y minerales'),(8,'Sueros'),(9,'Bienestar sexual'),(10,'Ginecologia');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_doc` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_cita`),
  KEY `fk_cituse` (`id_cliente`),
  KEY `fk_citdoc` (`id_doc`),
  CONSTRAINT `fk_citdoc` FOREIGN KEY (`id_doc`) REFERENCES `doctores` (`id_doc`),
  CONSTRAINT `fk_cituse` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,5,1,'13:00:00','2021-04-02'),(2,2,2,'11:00:00','2022-03-04');
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `user_clien` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `contrasena` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `id_reg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_client`),
  KEY `fk_cliente` (`id_reg`),
  CONSTRAINT `fk_cliente` FOREIGN KEY (`id_reg`) REFERENCES `clientes_datos_personales` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Manu22','sami',1),(2,'Juanii','juanitoo',2),(3,'gemaaa','gemita',3),(4,'viktor','vik',4),(5,'dylan1','dyl',5);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes_datos_personales`
--

DROP TABLE IF EXISTS `clientes_datos_personales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes_datos_personales` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `apellido_pat` varchar(500) DEFAULT NULL,
  `apellido_mat` varchar(500) DEFAULT NULL,
  `correo` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL,
  `RFC` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  CONSTRAINT `chk_gen` CHECK (`genero` = 'M' or `genero` = 'F')
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes_datos_personales`
--

LOCK TABLES `clientes_datos_personales` WRITE;
/*!40000 ALTER TABLE `clientes_datos_personales` DISABLE KEYS */;
INSERT INTO `clientes_datos_personales` VALUES (1,'Manuel David','Hernandez','Morales','manuel@gmail.com',21,'M','8715038326',NULL),(2,'Juan Angel','Castaneda','Chavez','juanl@gmail.com',21,'M','8715810980',NULL),(3,'Gema','Castaneda','Barraza','gema@gmail.com',24,'F','8736457897',NULL),(4,'Victor','Cabello','Rodriguez','victor@gmail.com',20,'M','8712647536',NULL),(5,'Dylan','Gonzales','Flores','dylan@gmail.com',23,'M','8714628710',NULL);
/*!40000 ALTER TABLE `clientes_datos_personales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_pers_user`
--

DROP TABLE IF EXISTS `datos_pers_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_pers_user` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) DEFAULT NULL,
  `apellido_pat` varchar(500) DEFAULT NULL,
  `apellido_mat` varchar(500) DEFAULT NULL,
  `correo` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_registro`),
  CONSTRAINT `chk_gen` CHECK (`genero` = 'M' or `genero` = 'F')
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_pers_user`
--

LOCK TABLES `datos_pers_user` WRITE;
/*!40000 ALTER TABLE `datos_pers_user` DISABLE KEYS */;
INSERT INTO `datos_pers_user` VALUES (1,'Samantha','Alcantara','Garcia','sammy@gmail.com',20,'F','8712657890'),(2,'Ricardo','Cabello','Rodriguez','rick@gmail.com',20,'M','1234567008'),(3,'Nicole','Cabello','Rodriguez','nicole@gmail.com',14,'F','0987654321'),(4,'Natalia','Cabello','Rodriguez','nataly@gmail',19,'F','1234567891');
/*!40000 ALTER TABLE `datos_pers_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_orden`
--

DROP TABLE IF EXISTS `detalle_orden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_orden` (
  `id_orden` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad_prod` int(11) DEFAULT NULL,
  KEY `fk_ord` (`id_orden`),
  KEY `fk_prod` (`id_producto`),
  CONSTRAINT `fk_ord` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`),
  CONSTRAINT `fk_prod` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_orden`
--

LOCK TABLES `detalle_orden` WRITE;
/*!40000 ALTER TABLE `detalle_orden` DISABLE KEYS */;
INSERT INTO `detalle_orden` VALUES (1,2,4),(1,1,1),(2,3,5),(2,1,4),(2,2,1),(3,2,1),(3,3,5),(3,1,2);
/*!40000 ALTER TABLE `detalle_orden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctores`
--

DROP TABLE IF EXISTS `doctores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctores` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuarios` int(11) DEFAULT NULL,
  `cedula` char(10) DEFAULT NULL,
  `especialidad` varchar(500) DEFAULT NULL,
  `universidad` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_doc`),
  KEY `fk_usu` (`id_usuarios`),
  CONSTRAINT `fk_usu` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctores`
--

LOCK TABLES `doctores` WRITE;
/*!40000 ALTER TABLE `doctores` DISABLE KEYS */;
INSERT INTO `doctores` VALUES (1,2,'a1a1a1',NULL,NULL),(2,3,'b1b1b1',NULL,NULL);
/*!40000 ALTER TABLE `doctores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden`
--

DROP TABLE IF EXISTS `orden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden` (
  `id_orden` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `direccion` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_orden`),
  KEY `fk_clienord` (`id_cliente`),
  CONSTRAINT `fk_clienord` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden`
--

LOCK TABLES `orden` WRITE;
/*!40000 ALTER TABLE `orden` DISABLE KEYS */;
INSERT INTO `orden` VALUES (1,2,'0000-00-00','CALZ. DE LA CANDELA'),(2,4,'2022-02-05','Valle Verde'),(3,3,'2022-03-12','SAN SALVADOR');
/*!40000 ALTER TABLE `orden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nom_producto` varchar(500) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `formula` varchar(600) CHARACTER SET utf8 DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_cat` (`id_cat`),
  CONSTRAINT `fk_cat` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Gomitas tropical punch',250,'2022-02-02','Carbonato de calcio',1,'Gomitas tropicales farmaceuticos','imagen.jpg'),(2,'Pepto bismol',490,'2022-05-03','Carbonato de calcio',2,'Producto farmaceutico de la farmacia','imagen.jpg'),(3,'Aspirinas',49,'2022-07-03','Carbonato de calcio',3,'Producto farmaceutico de la farmacia','imagen.jpg'),(31,'',0,'0000-00-00','',1,'','1.jpg'),(32,'',0,'0000-00-00','',1,'','1.jpg');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'administrador'),(2,'doctor'),(3,'cajero');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `contrasena` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `id_reg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_tu` (`tipo_usuario`),
  KEY `fk_us` (`id_reg`),
  CONSTRAINT `fk_tu` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo`),
  CONSTRAINT `fk_us` FOREIGN KEY (`id_reg`) REFERENCES `datos_pers_user` (`id_registro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'sami','abc',1,1),(2,'ricky','abc',2,2),(3,'nicky','abc',2,3),(4,'nati','abc',3,4);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-21  1:19:53
