-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Out-2021 às 02:26
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

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
CREATE DATABASE IF NOT EXISTS `consultorio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
