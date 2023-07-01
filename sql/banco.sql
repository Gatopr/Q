-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: GYMPLANNER
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `exercicios`
--

DROP TABLE IF EXISTS `exercicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exercicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `series` int DEFAULT NULL,
  `repeticao` int DEFAULT NULL,
  `descricao` text,
  `imagem` varchar(255) DEFAULT NULL,
  `TEMPO` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercicios`
--

LOCK TABLES `exercicios` WRITE;
/*!40000 ALTER TABLE `exercicios` DISABLE KEYS */;
INSERT INTO `exercicios` VALUES (52,'Peito','Flexões de braço',10,3,'O movimento é feito em posição de prancha, com os braços estendidos e as palmas das mãos alinhadas na largura dos ombros.','flexao de braço.gif',NULL),(53,'Peito','Flexões diamante',6,3,'Você coloca as mãos em forma de diamante, abaixar-se no chão e empurra seu corpo de volta para cima. Este exercício tem enfoque no peitoral e no abdômen.','flexao de bracos diamante.gif',NULL),(55,'Peito','Flexões inclinadas',12,3,'Com os braços estendidos seguindo a linha dos ombros, pés separados na mesma largura dos ombros e tronco reto. Então, contraia o abdômen e desça lentamente, dobrando os cotovelos e sustentando os quadris e o abdômen. Os cotovelos podem ficar um pouco voltados para fora no momento da flexão.','flexao de bracos inclinada.gif',NULL),(56,'Peito','Flexões declinadas',10,3,'Dobre os cotovelos para descer o tronco em direção ao chão, sempre mantendo as costas e o pescoço retos, em uma linha reta única. Empurre os braços movendo seu corpo para cima em direção a posição inicial.','flexão declinado.gif',NULL),(57,'Pernas','Agachamentos',10,3,'É um movimento que se assemelha ao sentar e levantar, que tantas vezes realizamos em nosso dia a dia.','Pernas 1 - (Agachamento).gif',NULL),(58,'Pernas','Lunges',10,3,'Dobre os dois joelhos a aproximadamente 90 graus enquanto o seu corpo é abaixado. Mantenha a coluna reta o tempo todo e ative o core. Não deixe o joelho de trás tocar o chão ao abaixar o corpo. Mantenha a posição na parte inferior do movimento por um segundo.','Pernas 2 - (Lunges ).gif',NULL),(59,'Pernas','Afundos',12,3,'Flexione o joelho lentamente até que o joelho da perna de trás quase toque o chão; Depois disso, estenda o joelho até a posição inicial, mas atenção: evite estender completamente para não perder a tensão sob os músculos que estão sendo trabalhados; Repita o movimento, enquanto troca a posição das pernas.','Pernas 3 - (Afundos).gif',NULL),(60,'Pernas','Elevação de panturrilhas',20,3,'Os dedos devem ficar voltados para a frente. Deixe o corpo reto, especialmente a coluna. Então, comece o exercício empurrando os quadris para cima e estendendo os joelhos para subir o aparelho. Mantenha as pernas retas e evite encolher os ombros durante o movimento','Pernas 4 - (ElavaçãoPanturrilha).gif',NULL),(61,'Pernas','Step-ups',15,3,'É um exercício que aumenta a contração do bumbum por meio do movimento de subida e descida de uma caixa ou um degrau. Seus benefícios também incluem o trabalho de equilíbrio e de ativação dos glúteos médios, que ficam ao lado do quadril.','Pernas 5 - (StetUps).gif',NULL),(62,'Costa','Remada invertida',15,3,'É um exercício de puxar com foco nas costas, na posição invertida, o atleta deve manter o corpo reto e puxá-lo até a barra com os pés no chão.','remada invertida.gif',NULL),(63,'Braço','Rosca martelo',12,3,'Segure os halteres com mãos em pegada neutra; Flexione os cotovelos, contraindo o bíceps braquial; Retorne o movimento devagar, estendendo os cotovelos de maneira controlada, retornando à posição inicial','Braços 5 - (RoscaScott).gif',NULL),(64,'Braço','Extensões de tríceps com halteres',12,3,'Apoie o corpo todo no banco, exceto as pernas. Os joelhos devem ficar dobrados e os pés apoiados no chão. Segure um halter em cada mão de modo que as palmas das mãos fiquem viradas uma para a outra. Em seguida, estenda os braços para cima levantando o peso.','Braços 3 - (ExtensãoTrpiceps).jpg',NULL),(65,'SEILA','SEI',12,12,NULL,'Captura de tela de 2023-06-28 23-25-31.png',12),(66,'BO','BI',12,12,NULL,'Captura de tela de 2023-06-28 14-23-33.png',1444),(67,'pernas','panturrilha',3,10,NULL,'Captura de tela de 2023-06-29 14-36-20.png',50);
/*!40000 ALTER TABLE `exercicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercicios_usuarios`
--

DROP TABLE IF EXISTS `exercicios_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exercicios_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `series` int DEFAULT NULL,
  `repeticoes` int DEFAULT NULL,
  `tempo` int DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  `gifs` blob,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `exercicios_usuarios_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercicios_usuarios`
--

LOCK TABLES `exercicios_usuarios` WRITE;
/*!40000 ALTER TABLE `exercicios_usuarios` DISABLE KEYS */;
INSERT INTO `exercicios_usuarios` VALUES (152,'ombros','crucifixo-inverso',544444444,133333,5333333,1,NULL),(153,'ullll','jdjjdjdjdjd',5,1,5,NULL,NULL),(154,'abdomem','abdominal-infra',5,1,5,NULL,NULL),(155,'peito','supino',5,1,5,NULL,NULL),(156,'braços','biceps',5,1,5,NULL,NULL),(157,'braços','biceps',5,1,5,NULL,NULL),(158,'aleatorio','jdjjdjdjdjd',5,1,5,1,NULL),(161,'pernas','agachamento',5,1,5,4,NULL),(162,'pernas','agachamento',5,1,5,4,NULL),(163,'pernas','agachamento',5,1,5,4,NULL),(164,'pernas','agachamento',5,1,5,4,NULL),(166,'pernas','agachamento',5,1,5,4,NULL),(167,'abdomem','abdominal-infra',5,133333,5,11,NULL),(189,'costas','voador-dorsal',5,1,5,13,NULL),(214,'glúteos','agachamento-sumô',5,1,5,14,NULL),(215,'glúteos','agachamento-sumô',5,1,5,14,NULL),(217,'costas','voador-dorsal',5,1,5,14,NULL);
/*!40000 ALTER TABLE `exercicios_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'vi','','1','2003-02-02','masculino',NULL),(2,'bigggggg','bighenrique225@gmail.com','1212','2005-03-31','masculino',NULL),(3,'vi','bighenrique225@gmail.com','1212','1212-12-12','masculino',NULL),(11,'bif','qwer1@gmail.com','12','2000-12-12','masculino','../img/Captura de tela de 2023-06-23 12-01-59.png'),(12,'victor','qwer2@gmail.com','12','2002-12-12','masculino',NULL),(13,'big','big@gameil.com','12','1212-12-12','masculino',NULL),(14,'bigfff','vi1@gmail.com','1','2000-03-03','feminino','../img/Captura de tela de 2023-06-26 13-36-11.png'),(15,'gato','gato@gmail.com','1','2012-12-12','feminino','../img/Captura de tela de 2023-06-29 14-36-05.png'),(16,'po','pokk@gmail.com','1','2099-12-12','masculino','../img/Captura de tela de 2023-06-29 14-36-05.png');
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

-- Dump completed on 2023-06-30 21:23:10
