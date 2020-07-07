-- MySQL dump 10.16  Distrib 10.1.31-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: dbapwcos_eia
-- ------------------------------------------------------
-- Server version	10.1.31-MariaDB

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
-- Current Database: `dbapwcos_eia`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `dbapwcos_eia` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbapwcos_eia`;

--
-- Table structure for table `categoria_emp`
--

DROP TABLE IF EXISTS `categoria_emp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_emp` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `profesion` varchar(50) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_emp`
--

LOCK TABLES `categoria_emp` WRITE;
/*!40000 ALTER TABLE `categoria_emp` DISABLE KEYS */;
INSERT INTO `categoria_emp` VALUES (1,'Ing AP','Ingenieros de jefes de áreas de instalaciones de w',1),(2,'Ing AR','Ingenieros para mantenimiento de cámaras e instala',1),(3,'TSU RD','Técnicos superiores en informática para redes de t',1);
/*!40000 ALTER TABLE `categoria_emp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_servicio`
--

DROP TABLE IF EXISTS `categoria_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_servicio` (
  `idcategoria` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `t_servicio` varchar(50) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `condicion` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_servicio`
--

LOCK TABLES `categoria_servicio` WRITE;
/*!40000 ALTER TABLE `categoria_servicio` DISABLE KEYS */;
INSERT INTO `categoria_servicio` VALUES (1,'instalación de wifi','instalacion de antena',1),(2,'video e interfones','videos e instalción de intefonez',1),(3,'mantenimiento','manrenimiento alas camaras de seguiridad',1),(4,'Manual de usuarios 2','Se realizan manuales de usuarios',1),(7,'Pruebas de funcionalidad','Se esta realizando pruebas de la funcionalidad de ',1);
/*!40000 ALTER TABLE `categoria_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `apellidos` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `fechanac` date NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  PRIMARY KEY (`idcliente`),
  KEY `FK_clientes_users` (`id_user`),
  CONSTRAINT `FK_clientes_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Jilberto',5,' Martínez Vásquez',23,'1996-06-21',998408529,'jilvasquez@hotmail.com','Tacuba Nueva'),(2,'carlos ',6,'gomez perez',30,'2000-10-20',741852963,'carlos.90@gmail.com','mexico'),(3,'Miguel',6,' perez Sanchez',20,'1958-12-29',741852963,'miguel@gmail.com','ocosingo');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cotizacion`
--

DROP TABLE IF EXISTS `cotizacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cotizacion` (
  `idcotizacion` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL DEFAULT '',
  `mensaje` text NOT NULL,
  `archivo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idcotizacion`),
  KEY `idcliente` (`idcliente`),
  CONSTRAINT `FK_cotizacion_clientes` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizacion`
--

LOCK TABLES `cotizacion` WRITE;
/*!40000 ALTER TABLE `cotizacion` DISABLE KEYS */;
INSERT INTO `cotizacion` VALUES (1,3,'','necesito una cotización','word');
/*!40000 ALTER TABLE `cotizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleserv`
--

DROP TABLE IF EXISTS `detalleserv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleserv` (
  `id_detalle_ser` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_categoria` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_detalle_ser`),
  KEY `FK__categoria_servicio` (`id_categoria`),
  KEY `FK__servicio` (`id_cliente`),
  CONSTRAINT `FK__categoria_servicio` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_servicio` (`idcategoria`) ON UPDATE CASCADE,
  CONSTRAINT `FK__servicio` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`idcliente`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleserv`
--

LOCK TABLES `detalleserv` WRITE;
/*!40000 ALTER TABLE `detalleserv` DISABLE KEYS */;
INSERT INTO `detalleserv` VALUES (3,2,3);
/*!40000 ALTER TABLE `detalleserv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `idempleado` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `fechanac` date NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `genero` char(2) NOT NULL,
  `ciudad` varchar(250) NOT NULL,
  `srealizado` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`idempleado`),
  KEY `idcategoriaemp` (`idcategoria`),
  CONSTRAINT `FK_empleados_categoria_emp` FOREIGN KEY (`idcategoria`) REFERENCES `categoria_emp` (`idcategoria`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (3,3,'Julian','Martínez Vásques','2020-06-10','julian65@gmail.com',8765432,'B. Nuevo','M','Chilón',12,'Activo'),(4,3,'aaaaa','aaaaa','2020-06-15','aaaaaaaa12@gmail.com',1234567890,'aaaaaaa','m','aaaaaaa',11,'Activo'),(5,2,'aaaa','manuel gomez perez','2020-06-24','ffffff@gmail.com',123456789,'tacuba NB','g','MEXICO',4,'Activo'),(6,1,'CARLOS','MENDEZ SANCHEZ','2020-07-01','manuel@gmail.com',9876543,'Manuel lucas','y','ocosingo',4,'Activo'),(7,2,'MANUEL','FLORES MENDEZ','2020-06-27','SS87@HOTMAIL.COM',98765,'CASE DE CORSO','M','MEXICO',5,'Activo');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificacion` (
  `idnotificacion` char(50) NOT NULL DEFAULT 'AUTO_INCREMENT',
  `type` varchar(200) NOT NULL,
  `notifiable_id` int(11) unsigned NOT NULL,
  `notifiable_type` varchar(50) NOT NULL,
  `data_tex` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idnotificacion`),
  KEY `notifiable_type` (`notifiable_type`),
  KEY `notifiable_id` (`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacion`
--

LOCK TABLES `notificacion` WRITE;
/*!40000 ALTER TABLE `notificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('nmvaquez94@gmail.com','a686cf8fdd2390d8d9bc89319f9c88e2a43856b03792a13be98980da370397ad','2020-06-10 04:26:55'),('administrador23@gmail.com','4f2ac0b329c390d0d56d2f368289e44bdcfab9480a3f6906b2c735a36d2bf04e','2020-06-16 17:27:12');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recuperar_contraseña`
--

DROP TABLE IF EXISTS `recuperar_contraseña`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recuperar_contraseña` (
  `email` varchar(50) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recuperar_contraseña`
--

LOCK TABLES `recuperar_contraseña` WRITE;
/*!40000 ALTER TABLE `recuperar_contraseña` DISABLE KEYS */;
/*!40000 ALTER TABLE `recuperar_contraseña` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `condicion` char(50) NOT NULL,
  PRIMARY KEY (`idrol`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrador','gestión de todo el sistema','1'),(2,'cliente','modulo de servicio','1');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) unsigned NOT NULL,
  `idcliente` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`idservicio`),
  KEY `id_servicio` (`idcategoria`),
  KEY `id_cliente` (`idcliente`),
  CONSTRAINT `FK_servicio_categoria_servicio` FOREIGN KEY (`idcategoria`) REFERENCES `categoria_servicio` (`idcategoria`) ON UPDATE CASCADE,
  CONSTRAINT `FK_servicio_clientes` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` VALUES (1,1,2,'gpguadalupe','2020-06-02','20:25:14'),(2,2,1,'carlos quinto','2020-06-02','20:27:20'),(3,2,3,'1111111','2020-07-02','13:11:23');
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK_users_roles` (`id_rol`),
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`idrol`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,1,'Administrador','administrador23@gmail.com','$2y$10$.F2eo.If2zVc7HDln6NfEOsFBM4e3EJxijrScF3W8SH7xo1U.pYl2','yJjPpJsZEW4qAGsI54FRokiLllWhVpmagzIdf9nLp5ILqvbRd7VUPIH7ltQc','2020-06-10 18:26:34','2020-06-11 00:15:09'),(6,2,'Jilberto','administrador96@gmail.com','$2y$10$79D4Xa6YBZubCquL4Jp.Aer5UyY5A6C2DTRoeSSvE/lncclO1T8U2','1HfDBqgVJ9FP07rnwEVsatAqeWXDoWsp2sE2KVdvdRfZyzzcEiLWcM9sNt7x','2020-06-16 17:28:35','2020-07-06 20:26:07');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-07 12:21:08
