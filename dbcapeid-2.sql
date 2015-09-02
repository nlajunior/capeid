-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2015 at 03:03 AM
-- Server version: 5.6.21
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
-- Table structure for table `acao`
--

CREATE TABLE IF NOT EXISTS `acao` (
`id` int(11) NOT NULL,
  `inicio` datetime DEFAULT NULL,
  `fim` datetime DEFAULT NULL,
  `datadocadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `situacao` varchar(12) DEFAULT 'PENDENTE',
  `datadaconclusao` datetime DEFAULT NULL,
  `plano_id` int(11) NOT NULL,
  `regra_id` int(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acao`
--

INSERT INTO `acao` (`id`, `inicio`, `fim`, `datadocadastro`, `situacao`, `datadaconclusao`, `plano_id`, `regra_id`, `ativo`) VALUES
(1, '2015-08-31 00:00:00', '2015-09-04 00:00:00', '2015-08-30 16:24:55', 'PENDENTE', '2015-09-11 00:00:00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`id` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `datadocadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `datadocadastro`, `ativo`) VALUES
(1, 'Leitura', '2015-05-03 19:31:35', 1),
(2, 'Video', '2015-05-03 19:31:35', 1),
(3, 'Treinamento', '2015-05-03 19:31:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `indicador`
--

CREATE TABLE IF NOT EXISTS `indicador` (
`id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indicador`
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
-- Table structure for table `meta`
--

CREATE TABLE IF NOT EXISTS `meta` (
`id` int(11) NOT NULL,
  `valorplanejado` decimal(9,2) NOT NULL,
  `valorexecutado` decimal(9,2) DEFAULT NULL,
  `datadocadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mes` smallint(6) NOT NULL,
  `ano` int(11) NOT NULL,
  `indicador_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta`
--

INSERT INTO `meta` (`id`, `valorplanejado`, `valorexecutado`, `datadocadastro`, `mes`, `ano`, `indicador_id`, `usuario_id`, `ativo`) VALUES
(1, '80000.00', '60000.00', '2015-05-03 19:43:00', 4, 2015, 1, 1, 1),
(2, '80000.00', '60000.00', '2015-05-03 19:43:00', 3, 2015, 1, 1, 0),
(3, '70.00', '60.00', '2015-05-03 19:43:00', 4, 2015, 4, 2, 1),
(4, '80.00', '50.00', '2015-05-03 19:43:00', 4, 2015, 3, 2, 1),
(7, '10.00', '1.00', '2015-08-26 22:16:31', 8, 2015, 1, 2, 1),
(8, '7.00', '7.00', '2015-08-27 09:07:50', 8, 2015, 2, 1, 1),
(9, '4.00', '2.00', '2015-08-27 09:15:15', 8, 2015, 1, 2, 1),
(10, '77.00', '11.00', '2015-08-27 09:17:15', 8, 2015, 2, 2, 1),
(11, '200.00', '50.00', '2015-08-27 09:18:53', 8, 2015, 1, 2, 1),
(12, '200.00', '50.00', '2015-08-27 09:20:27', 8, 2015, 1, 2, 1),
(13, '900.00', '1000.00', '2015-08-27 09:33:12', 8, 2015, 2, 2, 1),
(14, '100.00', '50.00', '2015-08-27 16:50:15', 8, 2015, 1, 2, 1),
(15, '2349.00', '4000.00', '2015-08-27 20:13:34', 8, 2015, 2, 1, 1),
(16, '100.00', '100.00', '2015-08-29 15:36:11', 8, 2015, 4, 2, 1),
(17, '100.00', '90.00', '2015-08-29 18:14:32', 10, 2015, 4, 1, 1),
(18, '200.00', '199.00', '2015-08-29 18:17:11', 10, 2015, 4, 1, 1),
(19, '89.00', '29.00', '2015-08-29 18:19:10', 9, 2015, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plano`
--

CREATE TABLE IF NOT EXISTS `plano` (
`id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT '0',
  `datadaaprovacao` datetime NOT NULL,
  `concluido` tinyint(1) DEFAULT '0',
  `datadaconclusao` datetime DEFAULT NULL,
  `responsavel` int(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plano`
--

INSERT INTO `plano` (`id`, `usuario_id`, `inicio`, `fim`, `aprovado`, `datadaaprovacao`, `concluido`, `datadaconclusao`, `responsavel`, `ativo`) VALUES
(1, 1, '2015-08-31', '2015-09-04', 0, '0000-00-00 00:00:00', 0, '2015-09-11 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `regra`
--

CREATE TABLE IF NOT EXISTS `regra` (
`id` int(11) NOT NULL,
  `descricao` varchar(40) DEFAULT NULL,
  `indicador_id` int(11) NOT NULL,
  `treinamento_id` int(11) NOT NULL,
  `prioridade` smallint(6) NOT NULL,
  `desempenho` int(11) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regra`
--

INSERT INTO `regra` (`id`, `descricao`, `indicador_id`, `treinamento_id`, `prioridade`, `desempenho`, `ativo`) VALUES
(1, 'Curso de orientação a objetos', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `treinamento`
--

CREATE TABLE IF NOT EXISTS `treinamento` (
`id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `ch` smallint(6) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `isbn` varchar(50) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `editora` varchar(80) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treinamento`
--

INSERT INTO `treinamento` (`id`, `nome`, `categoria_id`, `ch`, `ativo`, `isbn`, `autor`, `editora`) VALUES
(1, 'Curso de orientação a objetos', 1, 40, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `matricula` varchar(8) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `matricula`, `nome`, `email`, `senha`, `ativo`) VALUES
(1, '', 'rh', 'rh@cigel.com.br', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, '', 'Lidiane de Oliveira Pinheiro', 'liditutoria@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acao`
--
ALTER TABLE `acao`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_acao_01` (`plano_id`), ADD KEY `fk_acao_02` (`regra_id`);

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
-- Indexes for table `meta`
--
ALTER TABLE `meta`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_meta_01` (`usuario_id`), ADD KEY `fk_meta_02` (`indicador_id`);

--
-- Indexes for table `plano`
--
ALTER TABLE `plano`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_plano_01` (`usuario_id`);

--
-- Indexes for table `regra`
--
ALTER TABLE `regra`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_regra_01` (`indicador_id`), ADD KEY `fk_regra_02` (`treinamento_id`);

--
-- Indexes for table `treinamento`
--
ALTER TABLE `treinamento`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_treinamento_01` (`categoria_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acao`
--
ALTER TABLE `acao`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `meta`
--
ALTER TABLE `meta`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `plano`
--
ALTER TABLE `plano`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `regra`
--
ALTER TABLE `regra`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `treinamento`
--
ALTER TABLE `treinamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `acao`
--
ALTER TABLE `acao`
ADD CONSTRAINT `fk_acao01` FOREIGN KEY (`plano_id`) REFERENCES `plano` (`id`),
ADD CONSTRAINT `fk_acao_02` FOREIGN KEY (`regra_id`) REFERENCES `regra` (`id`);

--
-- Constraints for table `meta`
--
ALTER TABLE `meta`
ADD CONSTRAINT `fk_meta_01` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
ADD CONSTRAINT `fk_meta_02` FOREIGN KEY (`indicador_id`) REFERENCES `indicador` (`id`);

--
-- Constraints for table `plano`
--
ALTER TABLE `plano`
ADD CONSTRAINT `fk_plano_01` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Constraints for table `regra`
--
ALTER TABLE `regra`
ADD CONSTRAINT `fk_regra_01` FOREIGN KEY (`indicador_id`) REFERENCES `indicador` (`id`),
ADD CONSTRAINT `fk_regra_02` FOREIGN KEY (`treinamento_id`) REFERENCES `treinamento` (`id`);

--
-- Constraints for table `treinamento`
--
ALTER TABLE `treinamento`
ADD CONSTRAINT `fk_treinamento_01` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
