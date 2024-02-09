-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd_stream
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_famoso`
--

DROP TABLE IF EXISTS `tbl_famoso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_famoso` (
  `id_fmso` int NOT NULL AUTO_INCREMENT,
  `fmso_nom` varchar(45) DEFAULT NULL,
  `fmso_ape` varchar(45) DEFAULT NULL,
  `fmso_naci` date DEFAULT NULL,
  PRIMARY KEY (`id_fmso`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_famoso`
--

LOCK TABLES `tbl_famoso` WRITE;
/*!40000 ALTER TABLE `tbl_famoso` DISABLE KEYS */;
INSERT INTO `tbl_famoso` VALUES (1,'Tom','Hanks','1956-07-09'),(2,'Meryl','Streep','1949-06-22'),(3,'Leonardo','DiCaprio','1974-11-11'),(4,'Jennifer','Lawrence','1990-08-15'),(5,'Denzel','Washington','1954-12-28'),(6,'Charlize','Theron','1975-08-07'),(7,'Johnny','Depp','1963-06-09'),(8,'Natalie','Portman','1981-06-09'),(9,'Brad','Pitt','1963-12-18'),(10,'Scarlett','Johansson','1984-11-22'),(11,'Cate','Blanchett','1969-05-14'),(12,'Chris','Hemsworth','1983-08-11'),(13,'Anne','Hathaway','1982-11-12'),(14,'Javier','Bardem','1969-03-01'),(15,'Harrison','Ford','1942-07-13'),(16,'Ryan','Gosling','1980-11-12'),(19,'Christopher','Nolan','1970-07-30'),(25,'Keanu','Reeves','1964-09-02'),(26,'Steven','Spielberg','1946-12-18'),(27,'Jim','Carrey','1962-01-17'),(28,'Martin','Scorsese','1942-11-17'),(31,'James','Cameron','1954-08-16'),(32,'Alejandro','Iñárritu','1963-08-15'),(33,'Quentin','Tarantino','1963-03-27'),(34,'David','Fincher','1962-08-28'),(35,'Matthew','McConaughey','1969-11-04'),(36,'Wes','Anderson','1969-05-01'),(37,'Emma','Stone','1988-11-06'),(38,'Christian','Bale','1974-01-30'),(39,'Uma','Thurman','1970-04-29');
/*!40000 ALTER TABLE `tbl_famoso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_genero_movie`
--

DROP TABLE IF EXISTS `tbl_genero_movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_genero_movie` (
  `id_gen_mvi` int NOT NULL,
  `id_movie` int DEFAULT NULL,
  `id_gen` int DEFAULT NULL,
  PRIMARY KEY (`id_gen_mvi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_genero_movie`
--

LOCK TABLES `tbl_genero_movie` WRITE;
/*!40000 ALTER TABLE `tbl_genero_movie` DISABLE KEYS */;
INSERT INTO `tbl_genero_movie` VALUES (1,1,18),(2,3,5),(3,4,4),(4,5,2),(5,7,7),(6,8,1),(7,9,16),(8,11,3),(9,14,4),(10,15,4),(11,16,9),(12,17,17),(13,18,4),(14,20,7),(15,21,9),(16,22,12),(17,23,13),(18,24,15),(19,25,4),(20,26,2),(21,27,16),(22,28,1),(23,29,17),(24,30,3),(25,31,4),(26,32,3),(27,33,15),(28,34,10);
/*!40000 ALTER TABLE `tbl_genero_movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_generos`
--

DROP TABLE IF EXISTS `tbl_generos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_generos` (
  `id_generos` int NOT NULL AUTO_INCREMENT,
  `gen_nom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_generos`),
  KEY `genero` (`gen_nom`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_generos`
--

LOCK TABLES `tbl_generos` WRITE;
/*!40000 ALTER TABLE `tbl_generos` DISABLE KEYS */;
INSERT INTO `tbl_generos` VALUES (1,'Acción'),(6,'Animación'),(5,'Aventura'),(4,'Ciencia Ficción'),(2,'Comedia'),(17,'Crimen'),(15,'Documental'),(3,'Drama'),(9,'Fantasía'),(13,'Fantástico'),(18,'Guerra'),(14,'Histórico'),(11,'Misterio'),(16,'Musical'),(7,'Romance'),(8,'Suspense'),(12,'Terror'),(10,'Thriller'),(19,'Western');
/*!40000 ALTER TABLE `tbl_generos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_likes`
--

DROP TABLE IF EXISTS `tbl_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_likes` (
  `id_likes` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_movie` int DEFAULT NULL,
  PRIMARY KEY (`id_likes`),
  KEY `Likes_Movies` (`id_user`,`id_movie`),
  KEY `movie_like_idx` (`id_movie`),
  CONSTRAINT `movie_like` FOREIGN KEY (`id_movie`) REFERENCES `tbl_movie` (`id_movie`),
  CONSTRAINT `usuario_like` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_likes`
--

LOCK TABLES `tbl_likes` WRITE;
/*!40000 ALTER TABLE `tbl_likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_movie`
--

DROP TABLE IF EXISTS `tbl_movie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_movie` (
  `id_movie` int NOT NULL AUTO_INCREMENT,
  `mvi_nom` varchar(65) DEFAULT NULL,
  `mvi_desc` varchar(250) DEFAULT NULL,
  `mvi_dura` int DEFAULT NULL,
  `mvi_porta` varchar(45) DEFAULT NULL,
  `mvi_year` int DEFAULT NULL,
  PRIMARY KEY (`id_movie`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_movie`
--

LOCK TABLES `tbl_movie` WRITE;
/*!40000 ALTER TABLE `tbl_movie` DISABLE KEYS */;
INSERT INTO `tbl_movie` VALUES (1,'Training Day','Denzel Washington brilla en este thriller de crimen policial que desentraña la corrupción en las calles de Los Ángeles.',7320,'training_day.jpg',2001),(3,'The Hunger Games','Aventura distópica basada en la novela, donde Jennifer Lawrence se convierte en el símbolo de la rebelión.',8520,'the_hunger_game.jpg',2012),(4,'Inception','Thriller de ciencia ficción dirigido por Christopher Nolan, que explora los límites de la realidad y los sueños.',8880,'inception.jpg',2010),(5,'The Devil Wears Prada','Comedia dramática sobre la vida en la moda con Meryl Streep como la exigente editora de una revista de moda.',6540,'El_diablo_Vestida_de_Prada.jpg',2006),(7,'Lost in Translation','Drama romántico que narra la conexión especial entre Scarlett Johansson y Bill Murray en la efímera atmósfera de Tokio.',6060,'lost_in_translation.jpg',2003),(8,'Mad Max: Fury Road','Acción y caos reinan en este épico post-apocalíptico, con Charlize Theron liderando una huida desenfrenada.',7200,'mad_max.jpg',2015),(9,'Pirates of the Caribbean: The Curse of the Black Pearl','Aventura de piratas con Johnny Depp como el carismático Capitán Jack Sparrow en busca de un tesoro maldito.',8580,'pirates_of_caribbean.jpg',2003),(11,'Black Swan','Natalie Portman brilla en este thriller psicológico sobre la búsqueda de la perfección en el competitivo mundo del ballet.',6480,'black_swan.jpg',2010),(14,'The Matrix','Innovadora mezcla de ciencia ficción y acción con Keanu Reeves luchando contra la realidad virtual.',8160,'the_matrix.jpg',1999),(15,'Jurassic Park','Aventura épica de ciencia ficción de Steven Spielberg, donde dinosaurios vuelven a la vida en un parque temático.',7620,'jurassic_park.jpg',1993),(16,'Eternal Sunshine of the Spotless Mind','Jim Carrey y Kate Winslet en un drama romántico y sci-fi sobre la memoria y segundas oportunidades.',6480,'eternal_sunshine.jpg',2004),(17,'The Departed','Intrigante thriller de crimen dirigido por Martin Scorsese con Leonardo DiCaprio y Jack Nicholson en roles intensos.',9060,'the_departed.jpg',2006),(18,'Blade Runner 2049','Secuela de culto dirigida por Denis Villeneuve, donde Ryan Gosling y Harrison Ford exploran la complejidad de la identidad.',9840,'blade_runner_2049.jpg',2017),(20,'The Great Gatsby','Adaptación visualmente deslumbrante de la novela de Fitzgerald. Leonardo DiCaprio protagoniza en este relato de amor y decadencia en la Era del Jazz.',8580,'the_great_gatsby.jpg',2013),(21,'Avatar','Épica de ciencia ficción dirigida por James Cameron, que transporta a los espectadores a un mundo alienígena lleno de maravillas y conflictos.',9720,'avatar.jpg',2009),(22,'The Revenant','Intenso drama de supervivencia protagonizado por Leonardo DiCaprio, dirigido por Alejandro G. Iñárritu, basado en hechos reales en la frontera americana.',9360,'the_revenant.jpg',2015),(23,'Inglourious Basterds','Quentin Tarantino dirige esta película de guerra alternativa donde un grupo de soldados judíos planea venganza contra líderes nazis durante la Segunda Guerra Mundial.',9180,'inglourious_basterds.jpg',2009),(24,'The Social Network','David Fincher narra la creación de Facebook en este drama, explorando la amistad y traición en el auge de la era digital con Jesse Eisenberg y Andrew Garfield.',7200,'the_social_network.jpg',2010),(25,'Interstellar','Christopher Nolan dirige este épico espacial que sigue a un grupo de astronautas liderado por Matthew McConaughey en un viaje para salvar a la humanidad.',10140,'interstellar.jpg',2014),(26,'The Grand Budapest Hotel','Wes Anderson crea una comedia visualmente única ambientada en un hotel europeo, con Ralph Fiennes como el conserje y Tony Revolori como su aprendiz.',5940,'the_grand_budapest_hotel.jpg',2014),(27,'La La Land','Musical romántico dirigido por Damien Chazelle, que cuenta la historia de amor entre Emma Stone y Ryan Gosling mientras persiguen sus sueños en Los Ángeles.',7680,'la_la_land.jpg',2016),(28,'The Dark Knight Rises','Christopher Nolan concluye su trilogía de Batman con esta película llena de acción, donde Christian Bale se enfrenta a Tom Hardy como Bane en Gotham City.',9900,'the_dark_knight_rises.jpg',2012),(29,'Pulp Fiction','Quentin Tarantino dirige esta narrativa no lineal que entrelaza historias de criminales, con Uma Thurman, John Travolta y Samuel L. Jackson en papeles memorables.',9240,'pulp_fiction.jpg',1994),(30,'Forrest Gump','Tom Hanks protagoniza esta conmovedora odisea a través de décadas de historia americana, mostrando la vida de un hombre con discapacidad mental y corazón puro.',8520,'forrest_gump.jpg',1994),(32,'The Shawshank Redemption','Basada en la novela de Stephen King, esta poderosa película cuenta la historia de la redención de un hombre encarcelado, interpretado por Tim Robbins.',8520,'the_shawshank_redemption.jpg',1994),(33,'The Shape of Water','Ganadora del Oscar dirigida por Guillermo del Toro, esta fantasía romántica explora la conexión entre una mujer y una criatura misteriosa.',7380,'the_shape_of_water.jpg',2017),(34,'Fight Club','David Fincher dirige este thriller psicológico protagonizado por Edward Norton y Brad Pitt, explorando la identidad y la rebelión contra la sociedad.',8340,'fight_club.jpg',1999);
/*!40000 ALTER TABLE `tbl_movie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_rodaje`
--

DROP TABLE IF EXISTS `tbl_rodaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_rodaje` (
  `id_rod` int NOT NULL AUTO_INCREMENT,
  `id_famosos` int DEFAULT NULL,
  `id_movie` int DEFAULT NULL,
  `rod_rol` enum('Director','Actor') DEFAULT 'Actor',
  PRIMARY KEY (`id_rod`),
  KEY `Unic` (`id_famosos`,`id_movie`,`rod_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_rodaje`
--

LOCK TABLES `tbl_rodaje` WRITE;
/*!40000 ALTER TABLE `tbl_rodaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_rodaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user` (
  `id_usr` int NOT NULL AUTO_INCREMENT,
  `usr_nom` varchar(20) DEFAULT NULL,
  `usr_ape` varchar(45) DEFAULT NULL,
  `usr_mail` varchar(45) DEFAULT NULL,
  `usr_pwd` varchar(60) DEFAULT NULL,
  `usr_rol` enum('Admin','Activo','Espera') DEFAULT 'Espera',
  PRIMARY KEY (`id_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-09 18:34:59
