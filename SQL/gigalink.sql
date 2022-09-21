-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Set-2022 às 15:29
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gigalink`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `transportadora`
--

CREATE TABLE `transportadora` (
  `idTransportadora` int(11) NOT NULL,
  `nomeTransportadora` varchar(255) NOT NULL,
  `statusTransportadora` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `transportadora`
--

INSERT INTO `transportadora` (`idTransportadora`, `nomeTransportadora`, `statusTransportadora`) VALUES
(1, 'teste', 1),
(2, 'teste 2', 1),
(3, 'teste 3', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `transportadora`
--
ALTER TABLE `transportadora`
  ADD PRIMARY KEY (`idTransportadora`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `transportadora`
--
ALTER TABLE `transportadora`
  MODIFY `idTransportadora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
