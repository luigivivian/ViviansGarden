-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: trab165137
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `comprovante`
--

create database trab165137;

DROP TABLE IF EXISTS `comprovante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprovante` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprovante`
--

LOCK TABLES `comprovante` WRITE;
/*!40000 ALTER TABLE `comprovante` DISABLE KEYS */;
INSERT INTO `comprovante` VALUES (1,'img_comprovante_1527741547'),(2,'img_comprovante_1527742058'),(3,'img_comprovante_1527742141'),(4,'img_comprovante_1527754739'),(5,'img_comprovante_1527757111'),(6,'img_comprovante_1527806641'),(7,'img_comprovante_1528153502'),(8,'img_comprovante_1528666124'),(9,'img_comprovante_1528669592'),(10,'img_comprovante_1528706701');
/*!40000 ALTER TABLE `comprovante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contato`
--

DROP TABLE IF EXISTS `contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `sobrenome` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `msg` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato`
--

LOCK TABLES `contato` WRITE;
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` VALUES (7,'Luigi','Vivian','luigivivian@hotmail.com','34441665','Olá, teria mudas de pessego ?'),(8,'Teste','Contato','testando@gmail.com','424242525','Olá, poderia me enviar o codigo de rastreamento do pedido 250252 ?'),(9,'Mussum','ipszun','ludwwr@gmail.com','64555','leo, vitae iaculis nisl. Não sou faixa preta cumpadi, sou preto inteiris, inteiris.'),(10,'Testado','teste','testeteste@gmail.com','6464646','Testando contato....');
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `icone`
--

DROP TABLE IF EXISTS `icone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `icone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPlanta` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idPlanta` (`idPlanta`),
  CONSTRAINT `icone_ibfk_1` FOREIGN KEY (`idPlanta`) REFERENCES `planta` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `icone`
--

LOCK TABLES `icone` WRITE;
/*!40000 ALTER TABLE `icone` DISABLE KEYS */;
INSERT INTO `icone` VALUES (27,1,'img_icone_1528706078'),(28,2,'img_icone_1528706270'),(29,3,'img_icone_1528706460'),(30,4,'img_icone_1528706560'),(31,5,'img_icone_1528706626'),(32,6,'img_icone_1528710949'),(33,7,'img_icone_1528710994'),(34,8,'img_icone_1528711057'),(35,9,'img_icone_1528711345'),(36,10,'img_icone_1528711570');
/*!40000 ALTER TABLE `icone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imgs`
--

DROP TABLE IF EXISTS `imgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPlanta` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idPlanta` (`idPlanta`),
  CONSTRAINT `imgs_ibfk_1` FOREIGN KEY (`idPlanta`) REFERENCES `planta` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imgs`
--

LOCK TABLES `imgs` WRITE;
/*!40000 ALTER TABLE `imgs` DISABLE KEYS */;
INSERT INTO `imgs` VALUES (102,1,'img_01528706078'),(103,1,'img_11528706078'),(104,1,'img_21528706078'),(105,2,'img_01528706270'),(106,2,'img_11528706270'),(107,2,'img_21528706270'),(108,3,'img_01528706460'),(109,3,'img_11528706460'),(110,3,'img_21528706460'),(111,4,'img_01528706560'),(112,5,'img_01528706626'),(113,6,'img_01528710949'),(114,6,'img_11528710949'),(115,7,'img_01528710994'),(116,7,'img_11528710994'),(117,7,'img_21528710994'),(118,8,'img_01528711057'),(119,8,'img_11528711057'),(120,9,'img_01528711345'),(121,9,'img_11528711345'),(122,10,'img_01528711570'),(123,10,'img_11528711570');
/*!40000 ALTER TABLE `imgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itens_pedido`
--

DROP TABLE IF EXISTS `itens_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itens_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPedido` int(11) DEFAULT NULL,
  `idPlanta` int(11) DEFAULT NULL,
  `valorUnidade` decimal(10,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idPlanta` (`idPlanta`),
  KEY `idPedido` (`idPedido`),
  CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`idPlanta`) REFERENCES `planta` (`id`),
  CONSTRAINT `itens_pedido_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itens_pedido`
--

LOCK TABLES `itens_pedido` WRITE;
/*!40000 ALTER TABLE `itens_pedido` DISABLE KEYS */;
INSERT INTO `itens_pedido` VALUES (24,10,1,80.00,1),(25,10,3,69.00,2);
/*!40000 ALTER TABLE `itens_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `valorTotal` decimal(10,2) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idComprovante` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idComprovante` (`idComprovante`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`idComprovante`) REFERENCES `comprovante` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (1,8500.00,1,1,'2018-05-31','Pedido não aprovado.'),(2,27250.00,1,2,'2018-05-31','Pedido não aprovado.'),(3,28750.00,1,3,'2018-05-31','Pedido não aprovado.'),(4,31950.00,1,4,'2018-05-31','Pedido não aprovado.'),(5,28750.00,1,5,'2018-05-31','Pedido não aprovado.'),(6,9639.00,1,6,'2018-05-31','Pedido não aprovado.'),(7,14000.00,1,7,'2018-06-04','Pedido não aprovado.'),(8,8500.00,1,8,'2018-06-10','Pedido aprovado.'),(9,3533.00,1,9,'2018-06-10','Pedido não aprovado.'),(10,218.00,1,10,'2018-06-11','Em análise.');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planta`
--

DROP TABLE IF EXISTS `planta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomePopular` varchar(40) DEFAULT NULL,
  `nomeCientifico` varchar(50) DEFAULT NULL,
  `alturaMax` varchar(20) DEFAULT NULL,
  `cuidados` varchar(300) DEFAULT NULL,
  `descricao` varchar(300) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planta`
--

LOCK TABLES `planta` WRITE;
/*!40000 ALTER TABLE `planta` DISABLE KEYS */;
INSERT INTO `planta` VALUES (1,'Mirtilo','Mirtilis cacilds','10','Não se adapta ao frio intenso.','Planta frutifera, rica em vitaminas.',14,80.00),(2,'Pessegueiro','Pessegus sinistrus','15','Não se adapta ao frio intenso','Árvore frutífera, pêssegos doces.',6,60.00),(3,'Laranjeira','Laranjis graudis graudis','10','Não se adapta ao clima desertico','Frutos graúdos e doce',23,69.00),(4,'Palmeira Azul','Bismark nobilis','20','Não gosta de muita umidade, requer bastante luz solar','Palmeira exótica usada para decorar jardins',10,3000.00),(5,'Tamareira das canarias','Phoenix canariensis','30','Não se adapta ao frio intenso','Palmeira exótica usada para decoração de jardim',16,1500.00),(6,'Abacaxi','abacaxi cabulosis sinistrus','2','Não gosta de frio','Fruta doce',15,30.00),(7,'Pitanga cabreira','Pintangus tupi','10','Não gosta de frio e muita agua','Fruta rica em vitaminas',30,150.00),(8,'Bergamota raiz','Pokan nakop','10','Precisa de bastante luz solar','Frutos sem sementes.',60,300.00),(9,'Abóbora','Abrobrinis maisomenos','15','Gosta de agua e sol','Rica em vitaminas',20,30.00),(10,'Ameixa','Ameixis cabreris','15','Não gosta de frio','Fruto doce',30,150.00);
/*!40000 ALTER TABLE `planta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senha` varchar(255) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `sobrenome` varchar(30) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `adm` int(11) DEFAULT '0',
  `complemento` varchar(150) DEFAULT NULL,
  `cep` varchar(80) DEFAULT NULL,
  `rua` varchar(80) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `cidade` varchar(90) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'$2y$10$xKDpcXJjuhaCBQmfZahtYeGXFiC1jHsjJgZhbE9rVMaO7gxfG./YK','Luigi','Vivian2','luigivivian','luigivivian@hotmail.com','996780830',1,'Casa','99250000','Av Arthur Oscar','centro','Serafina Corrêa','1897'),(2,'$2y$12$jYz1G2BHMH0i0NM12rbasOge9SimGjuL5OrNNELsWZ.VXx9sCL7Oi','Administrador','adm','admin','admin@upf.br','32323232',1,NULL,NULL,NULL,NULL,NULL,NULL),(3,'40bd001563085fc35165329ea1ff5c5ecbdbbeef','Pedro','Jamelao','pedrojamelao','pjameao@gmail.com','4567885',0,NULL,NULL,NULL,NULL,NULL,NULL),(4,'$2y$10$3cSPoPBGndK2O0hM5qudEukJtBiIWE3lwNOtvCjeHfqvFEgK/W2Oi','Teste','Vivian','luigivivian2332','luigivivia22n@hotmail.com','41414141',0,'dawdaw','dwadwadaw','4adwadaw','dawdwadawdaw','dwadwadwa','14'),(5,'$2y$10$QOKKu3yRD0O0odOFVrzi/eXIgeHDU2OagXtaalCdqxX5Mjj9Ie38a','Testando','teste','testeteste','2312312@gmail.com','9950002',0,'Casaaa','995949449','Av Arthur Oscar','centro','Porto alegre','24252');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-10  14:20:49
