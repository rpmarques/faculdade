DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 PACK_KEYS=0;
LOCK TABLES `cliente` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `ctpag`;
CREATE TABLE `ctpag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datac` date NOT NULL,
  `nrodoc` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `valor` float(9,2) NOT NULL,
  `pago` tinyint(1) NOT NULL,
  `datap` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 PACK_KEYS=0;


LOCK TABLES `ctpag` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `ctrec`;
CREATE TABLE `ctrec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datac` date DEFAULT NULL,
  `fornec_id` int(11) DEFAULT NULL,
  `valor` float(9,2) DEFAULT NULL,
  `pago` tinyint(1) DEFAULT NULL,
  `datap` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 PACK_KEYS=0;
LOCK TABLES `ctrec` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `fornec`;
CREATE TABLE `fornec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 PACK_KEYS=0;
LOCK TABLES `fornec` WRITE;
UNLOCK TABLES;

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `senha` char(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 PACK_KEYS=0;
LOCK TABLES `usuario` WRITE;
UNLOCK TABLES;

INSERT INTO `usuario` (email,senha,nome) VALUES ('ricardo80@gmail.com',md5('123'),'Ricardo');