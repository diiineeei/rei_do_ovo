-- Versão do servidor: 5.6.46

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-03:00";

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` int(1) NOT NULL DEFAULT '1',
  `ativo` tinyint NOT NULL DEFAULT '1',
  `dt_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cpf` char(14) UNIQUE KEY NOT NULL,
  `celular` varchar(15) DEFAULT NULL
);

COMMIT;