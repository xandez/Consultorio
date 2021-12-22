-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Dez-2021 às 22:32
-- Versão do servidor: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultorio`
--
CREATE DATABASE IF NOT EXISTS `consultorio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `consultorio`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `funcionario` varchar(255) NOT NULL,
  `inicio` datetime NOT NULL,
  `fim` datetime NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `paciente` varchar(255) NOT NULL,
  `protocolo` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `funcionario`, `inicio`, `fim`, `tipo`, `paciente`, `protocolo`, `status`) VALUES
(10, 'ALEXANDRE RODOLFO', '2021-11-27 14:48:00', '2021-11-27 15:48:00', 'ATENDIMENTO', '798.797.987-79', 0, 'EXCLUIDO'),
(9, 'ALEXANDRE RODOLFO', '2021-11-27 14:41:00', '2021-11-27 15:41:00', 'ATENDIMENTO', '052.713.193-85', 0, 'ATIVO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimento`
--

CREATE TABLE `atendimento` (
  `id` int(11) NOT NULL,
  `paciente` varchar(255) NOT NULL,
  `dentista` varchar(255) NOT NULL,
  `dente` varchar(55) NOT NULL,
  `procedimento` varchar(255) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `custo` decimal(11,2) NOT NULL,
  `situacao` varchar(100) NOT NULL,
  `dt` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atendimento`
--

INSERT INTO `atendimento` (`id`, `paciente`, `dentista`, `dente`, `procedimento`, `valor`, `custo`, `situacao`, `dt`) VALUES
(15, '052.713.193-85', 'ALEXANDRE RODOLFO', '11', 'RESTAURAÃ‡ÃƒO', '80.00', '10.00', 'PENDENTE', '2021-11-27'),
(13, '798.797.987-79', 'ALEXANDRE RODOLFO', '14', 'RESTAURAÃ‡ÃƒO', '80.00', '10.00', 'PENDENTE', '2021-11-27'),
(12, '052.713.193-85', 'ALEXANDRE RODOLFO', '45', 'LIMPEZA', '80.00', '0.00', 'PENDENTE', '2021-11-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `funcao` varchar(255) NOT NULL,
  `admissao` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `rg` varchar(50) NOT NULL,
  `demissao` date NOT NULL,
  `salario` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`nome`, `cpf`, `funcao`, `admissao`, `status`, `rg`, `demissao`, `salario`) VALUES
('ALEXANDRE RODOLFO', '052.713.193-85', 'DENTISTA', '2021-11-15', 'ATIVO', '10.192.381-2', '0000-00-00', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `nome` varchar(255) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `idade` int(11) NOT NULL,
  `datanasc` date NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `bairro` varchar(250) NOT NULL,
  `cidade` varchar(250) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `civil` varchar(50) NOT NULL,
  `profissao` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `indicacao` varchar(250) NOT NULL,
  `obs` text NOT NULL,
  `datacadastro` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`nome`, `fone`, `idade`, `datanasc`, `sexo`, `endereco`, `cpf`, `rg`, `bairro`, `cidade`, `estado`, `civil`, `profissao`, `email`, `indicacao`, `obs`, `datacadastro`) VALUES
('Cliente 122', '(99)01239-1239', 25, '1995-04-11', 'Masculino', 'rua aurora', '052.713.193-85', '01.231.093-2', 'parque das palmeiras', 'imperatriz', 'MA', 'casado', 'analista', 'alexrodolf@hotmail.com', 'nÃ£o', 'Sertaneja\r\nAÃ§Ã£o', '2021-09-30'),
('Cliente 29', '(99)12323-1321', 26, '1995-07-11', 'Feminino', 'rua aurora', '052.713.123-13', '01.231.093-2', 'centro', 'imperatriz', 'MA', 'casado', 'analista', 'alexrodolf@hotmail.com', 'nÃ£o', 'teste', '2021-10-10'),
('Abigail Marinho', '(12)33112-3315', 15, '1955-04-11', 'Feminino', 'Rua 2', '798.797.987-79', '97.123.912-8', 'centro', 'Imperatriz', 'MA', 'casado', 'Dentista', 'bibi@hotmail.com', 'nÃ£o', 'teste', '2021-10-16'),
('FULADO DE TAL', '(12)38129-0938', 29, '2021-11-27', 'MASCULINO', 'RUA TAL', '050.505.050-50', '51.615.425-6', 'CEN', 'BREJAO', 'MA', 'SOLTEIRO', 'NADA', 'FULANO@GMAIL.COM', 'NÃƒO', 'TESTE 32', '2021-11-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(11) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `datalanc` datetime NOT NULL,
  `data` datetime NOT NULL,
  `tipo` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id`, `cpf`, `valor`, `datalanc`, `data`, `tipo`) VALUES
(1, '798.797.987-79', '5.00', '2021-11-15 13:01:00', '2021-11-15 14:01:01', 'DINHEIRO'),
(2, '798.797.987-79', '10.00', '2021-11-15 13:03:00', '2021-11-15 13:03:10', 'PIX'),
(3, '052.713.193-85', '250.00', '2021-11-27 15:58:00', '2021-11-27 15:58:15', 'DINHEIRO'),
(4, '052.713.193-85', '50.00', '2021-11-27 15:59:00', '2021-11-27 15:58:37', 'PIX');

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `valormin` decimal(11,2) NOT NULL,
  `valormax` decimal(11,2) NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `custo` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `procedimento`
--

INSERT INTO `procedimento` (`id`, `nome`, `valor`, `valormin`, `valormax`, `especialidade`, `custo`) VALUES
(6, 'LIMPEZA', '100.00', '80.00', '120.00', 'CIRURGIA E IMPLANTE', '0.00'),
(7, 'RESTAURAÃ‡ÃƒO', '50.00', '40.00', '80.00', 'CIRURGIA E IMPLANTE', '10.00'),
(8, 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', '100.00', '90.00', '150.00', 'CIRURGIA E IMPLANTE', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(50) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario`, `nome`, `senha`, `nivel`) VALUES
('xande', 'Alexandre Rodolfo', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atendimento`
--
ALTER TABLE `atendimento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedimento`
--
ALTER TABLE `procedimento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `atendimento`
--
ALTER TABLE `atendimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
