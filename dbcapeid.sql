-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 05-Abr-2015 às 15:17
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbcapeid`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acao`
--

CREATE TABLE IF NOT EXISTS `acao` (
`id` int(11) NOT NULL,
  `meta_id` int(11) NOT NULL,
  `regra_id` int(11) DEFAULT NULL,
  `plano_id` int(11) NOT NULL,
  `concluida` tinyint(1) DEFAULT '0',
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `datadaconclusao` date DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`id` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `ativo`) VALUES
(1, 'Leitura', 1),
(2, 'Video', 1),
(3, 'Treinamento', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `indicador`
--

CREATE TABLE IF NOT EXISTS `indicador` (
`id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `indicador`
--

INSERT INTO `indicador` (`id`, `nome`, `ativo`) VALUES
(1, 'Faturamento por vendedor', 1),
(2, 'Positivação', 1),
(3, 'Elevação do mix', 1),
(4, 'Abertura de novos clientes', 1),
(5, 'Número de visitas aos clientes', 1),
(6, 'Número de clientes perdidos para concorrência', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `intervalo`
--

CREATE TABLE IF NOT EXISTS `intervalo` (
`id` smallint(6) NOT NULL,
  `descricao` varchar(40) DEFAULT NULL,
  `inicio` decimal(9,2) NOT NULL,
  `fim` decimal(9,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `intervalo`
--

INSERT INTO `intervalo` (`id`, `descricao`, `inicio`, `fim`) VALUES
(1, '0% >=Valor realizado < 51%', '0.00', '51.00'),
(2, '51% >= Valor realizado <=90%', '51.00', '90.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
`id` int(11) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `autor` varchar(80) NOT NULL,
  `edicao` smallint(6) DEFAULT NULL,
  `editora` varchar(80) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `categoria_id` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id`, `titulo`, `autor`, `edicao`, `editora`, `ativo`, `categoria_id`) VALUES
(1, 'AdministraÃ§Ã£o de vendas', 'Marcos Cobra', 5, 'Atlass', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
`id` int(11) NOT NULL,
  `valorplanejado` decimal(9,2) NOT NULL,
  `valorexecutado` decimal(9,2) DEFAULT NULL,
  `mes` smallint(6) NOT NULL,
  `indicador_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `atingiu` tinyint(1) DEFAULT '0',
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `meta`
--

INSERT INTO `meta` (`id`, `valorplanejado`, `valorexecutado`, `mes`, `indicador_id`, `usuario_id`, `atingiu`, `ativo`) VALUES
(1, '80000.00', '60000.00', 3, 1, 1, 0, 1),
(2, '80000.00', '60000.00', 3, 1, 1, 0, 0),
(3, '70.00', '60.00', 3, 4, 2, 0, 1),
(4, '80.00', '50.00', 3, 3, 2, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano`
--

CREATE TABLE IF NOT EXISTS `plano` (
`id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `concluido` tinyint(1) DEFAULT '0',
  `datadaconclusao` date DEFAULT NULL,
  `responsavel` int(11) DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT '0',
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recurso`
--

CREATE TABLE IF NOT EXISTS `recurso` (
`id` int(11) NOT NULL,
  `livro_id` int(11) DEFAULT NULL,
  `treinamento_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `categoria_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinamento`
--

CREATE TABLE IF NOT EXISTS `treinamento` (
`id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `ch` smallint(6) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `ativo`) VALUES
(1, 'rh', 'rh@cigel.com.br', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Lidiane de Oliveira Pinheiro', 'liditutoria@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `video`
--

CREATE TABLE IF NOT EXISTS `video` (
`id` int(11) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `autor` varchar(80) DEFAULT NULL,
  `duracao` smallint(6) DEFAULT NULL,
  `midia` varchar(10) NOT NULL,
  `detalhes` varchar(80) DEFAULT NULL,
  `categoria_id` smallint(6) NOT NULL DEFAULT '2',
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `video`
--

INSERT INTO `video` (`id`, `titulo`, `autor`, `duracao`, `midia`, `detalhes`, `categoria_id`, `ativo`) VALUES
(1, 'VÃ­deo de teste', 'Desconhecido', 60, 'Youtube', '', 2, 1),
(2, 'A arte da guerra', 'Desconhecido', 60, 'Youtube', '', 2, 1),
(3, 'ffdsfsdfd', 'fdasfsd', 50, 'DVD', '', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acao`
--
ALTER TABLE `acao`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicador`
--
ALTER TABLE `indicador`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intervalo`
--
ALTER TABLE `intervalo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta`
--
ALTER TABLE `meta`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_meta_01` (`usuario_id`), ADD KEY `fk_meta_02` (`indicador_id`);

--
-- Indexes for table `plano`
--
ALTER TABLE `plano`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recurso`
--
ALTER TABLE `recurso`
 ADD PRIMARY KEY (`id`), ADD KEY `recurso_fk_01` (`livro_id`), ADD KEY `recurso_fk_02` (`video_id`);

--
-- Indexes for table `treinamento`
--
ALTER TABLE `treinamento`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acao`
--
ALTER TABLE `acao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `indicador`
--
ALTER TABLE `indicador`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `intervalo`
--
ALTER TABLE `intervalo`
MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `plano`
--
ALTER TABLE `plano`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recurso`
--
ALTER TABLE `recurso`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `treinamento`
--
ALTER TABLE `treinamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `meta`
--
ALTER TABLE `meta`
ADD CONSTRAINT `fk_meta_01` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
ADD CONSTRAINT `fk_meta_02` FOREIGN KEY (`indicador_id`) REFERENCES `indicador` (`id`);

--
-- Limitadores para a tabela `recurso`
--
ALTER TABLE `recurso`
ADD CONSTRAINT `recurso_fk_01` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`),
ADD CONSTRAINT `recurso_fk_02` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
