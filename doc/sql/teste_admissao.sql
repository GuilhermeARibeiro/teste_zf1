CREATE TABLE `tb_categoria` (
  `pk_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `desc_categoria` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`pk_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
 
 
CREATE TABLE `tb_produto` (
  `pk_produto` int(11) NOT NULL AUTO_INCREMENT,
  `fk_categoria` int(11) NOT NULL,
  `desc_produto` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `peso_produto` float(7,3) DEFAULT NULL,
  `status_produto` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`pk_produto`),
  KEY `fk_tb_produtos_tb_categoria1_idx` (`fk_categoria`),
  CONSTRAINT `fk_tb_produtos_tb_categoria1` FOREIGN KEY (`fk_categoria`) REFERENCES `tb_categoria` (`pk_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2340;
 
CREATE TABLE `tb_preco` (
  `pk_preco` int(11) NOT NULL AUTO_INCREMENT COMMENT 'chave primaria da tabela de preco',
  `fk_produto` int(11) NOT NULL COMMENT 'chave secundaria identificandoo valor do produto',
  `dta_inc_preco` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'data q foi incluido o valor',
  `dta_validade_preco` date DEFAULT NULL COMMENT 'dta validade da tabela de preco',
  `vlr_preco` float DEFAULT NULL COMMENT 'valor a ser cobrado no produto',
  `dta_vigente_preco` date DEFAULT NULL COMMENT 'data a ser vigorada a tabela de preco',
  `obs_preco` text COMMENT 'texto descritibo para manter um histórico dos reajuste',
  PRIMARY KEY (`pk_preco`),
  UNIQUE KEY `preco_id_UNIQUE` (`pk_preco`),
  KEY `fk_tb_precos_tb_produtos1_idx` (`fk_produto`),
  CONSTRAINT `fk_tb_precos_tb_produtos1` FOREIGN KEY (`fk_produto`) REFERENCES `tb_produto` (`pk_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;