CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `nivel` enum('1','2','3','4') NOT NULL,
  `senha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `aluno` (
  `idAluno` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `dataNascimento` date NOT NULL,
  `nacionalidade` varchar(30) DEFAULT 'Brasil',
  `informacoesAdicionais` varchar(255) NOT NULL,
  `foto` varchar(70) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `objetivo` varchar(255) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `codUsuario` int(11) NOT NULL,
  CONSTRAINT `fk_aluno_usuario` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `empresa` (
  `idEmpresa` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `cnpj` varchar(17) NOT NULL,
  `areaAtuacao` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `missao` varchar(255) NOT NULL,
  `visao` varchar(255) NOT NULL,
  `historia` text NOT NULL,
  `codUsuario` int(11) NOT NULL,
  CONSTRAINT `fk_empresa_usuario` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `valores`(
  `idValores` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `valor` VARCHAR(30) NOT NULL,
  `codEmpresa` INT NOT NULL,
  CONSTRAINT `fk_valores_empresa` FOREIGN KEY (`codEmpresa`) REFERENCES `empresa`(`idEmpresa`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `experiencias` (
  `idExperiencia` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `dataInicio` varchar(15) NOT NULL,
  `dataSaida` varchar(15) DEFAULT NULL,
  `cargo` varchar(30) NOT NULL,
  `empresa` varchar(20) not null,
  `codAluno` int(11) NOT NULL,
  CONSTRAINT `fk_experiencias_aluno` FOREIGN KEY (`codAluno`) REFERENCES `aluno` (`idAluno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `formacoes` (
  `idFormacao` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `anoConclusao` VARCHAR(4) NOT NULL,
  `curso` varchar(40) NOT NULL,
  `instituicao` varchar(40) NOT NULL,
  `codAluno` int(11) NOT NULL,
  CONSTRAINT `fk_formacoes_aluno` FOREIGN KEY (`codAluno`) REFERENCES `aluno` (`idAluno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `notificacoes` (
  `idMensagem` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo` varchar(40) NOT NULL,
  `de` varchar(40) NOT NULL,
  `data` datetime NOT NULL,
  `mensagem` text NOT NULL,
  `codUsuario` int(11) NOT NULL,
  CONSTRAINT `fk_mensagens_usuario` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `entrevistas`(
  `idEntrevista` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `hora` TIME NOT NULL,
  `local` VARCHAR(50) NOT NULL,
  `numero` VARCHAR(10) NOT NULL,
  `bairro` VARCHAR(20) NOT NULL,
  `complemento` VARCHAR(20),
  `cidade` VARCHAR(30) NOT NULL,
  `estado` CHAR(2) NOT NULL,
  `vaga` VARCHAR(45) NOT NULL,
  `salario` FLOAT(6,2),
  `cargaHoraria` INT(2) NOT NULL,
  `beneficios` VARCHAR(255),
  `descricao` VARCHAR(255) NOT NULL,
  `codAluno` INT NOT NULL,
  `codEmpresa` INT NOT NULL,
  CONSTRAINT `fk_entrevistas_empresa` FOREIGN KEY(`codEmpresa`) REFERENCES `empresa`(`idEmpresa`),
  CONSTRAINT `fk_entrevistas_aluno` FOREIGN KEY(`codAluno`) REFERENCES `aluno`(`idAluno`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `respostas`(
  `idResposta` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `resposta` TINYINT(1),
  `codEntrevista` INT NOT NULL,
  CONSTRAINT `fk_repostas_entrevistas` FOREIGN KEY(`codEntrevista`) REFERENCES `entrevistas`(`idEntrevista`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `beneficiosEntrevista`(
  `idBeneficioEntrevista` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `beneficio` VARCHAR(40) NOT NULL,
  `codEntrevista` INT NOT NULL,
  CONSTRAINT `fk_beneficiosVaga_entrevistas` FOREIGN KEY(`codEntrevista`) REFERENCES `entrevistas`(`idEntrevista`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `beneficiosVaga`(
  `idBeneficioVaga` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `beneficio` VARCHAR(40) NOT NULL,
  `codEmpresa` INT NOT NULL,
  CONSTRAINT `fk_beneficiosVaga_empresa` FOREIGN KEY(`codEmpresa`) REFERENCES `empresa`(`idEmpresa`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `professor` (
  `idProfessor` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `formacao` varchar(30) NOT NULL,
  `codUsuario` int(11) NOT NULL,
  CONSTRAINT `fk_professor_usuario` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `vaga` (
  `idVaga` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `cargaHoraria` float(3,1) NOT NULL,
  `salario` float(6,2) DEFAULT NULL,
  `requisitos` varchar(255) DEFAULT NULL,
  `codEmpresa` int(11) NOT NULL,
  CONSTRAINT `fk_vaga_empresa` FOREIGN KEY (`codEmpresa`) REFERENCES `empresa` (`idEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `enderecos` (
  `idEndereco` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `numero` varchar(10) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` char(9) NOT NULL,
  `complemento` varchar(40) DEFAULT NULL,
  `codUsuario` int(11) NOT NULL,
  CONSTRAINT `fk_enderecos_usuario` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `telefones` (
  `idTelefone` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `telefone` varchar(17) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `codUsuario` int(11) NOT NULL,
  CONSTRAINT `fk_telefones_aluno` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `qualificacoes`(
  `idQualificacoes` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `competencia` VARCHAR(20) NOT NULL,
  `codAluno` int not null,
  CONSTRAINT `fk_qualificacoes_usuario` FOREIGN KEY(`codAluno`) REFERENCES `aluno`(`idAluno`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER DATABASE `tcc` CHARSET = UTF8 COLLATE = utf8_general_ci;
