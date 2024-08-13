-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/02/2024 às 22:58
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_sistema_carros`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carro`
--

CREATE TABLE `carro` (
  `ID_CARRO` int(11) NOT NULL,
  `NOME_CARRO` varchar(30) DEFAULT NULL,
  `MODELO` varchar(30) DEFAULT NULL,
  `MARCA` varchar(30) DEFAULT NULL,
  `PRECO` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `carro`
--

INSERT INTO `carro` (`ID_CARRO`, `NOME_CARRO`, `MODELO`, `MARCA`, `PRECO`) VALUES
(1, 'uno', 'way', 'fiat', 1000),
(3, 'civic', 'sport', 'honda', 10000);

-- --------------------------------------------------------

--
-- Estrutura para tabela `posse`
--

CREATE TABLE `posse` (
  `ID_POSSE` int(11) NOT NULL,
  `ID_CARRO_PK` int(11) NOT NULL,
  `ID_USUARIO_PK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOME_USUARIO` varchar(30) NOT NULL,
  `SENHA` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`ID_CARRO`);

--
-- Índices de tabela `posse`
--
ALTER TABLE `posse`
  ADD PRIMARY KEY (`ID_POSSE`),
  ADD KEY `ID_CARRO_PK` (`ID_CARRO_PK`),
  ADD KEY `ID_USUARIO_PK` (`ID_USUARIO_PK`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carro`
--
ALTER TABLE `carro`
  MODIFY `ID_CARRO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `posse`
--
ALTER TABLE `posse`
  MODIFY `ID_POSSE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `posse`
--
ALTER TABLE `posse`
  ADD CONSTRAINT `posse_ibfk_1` FOREIGN KEY (`ID_CARRO_PK`) REFERENCES `carro` (`ID_CARRO`),
  ADD CONSTRAINT `posse_ibfk_2` FOREIGN KEY (`ID_USUARIO_PK`) REFERENCES `usuario` (`ID_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
