-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2021 às 00:08
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbdog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbraca`
--

CREATE TABLE `tbraca` (
  `id` int(11) NOT NULL,
  `raca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbraca`
--

INSERT INTO `tbraca` (`id`, `raca`) VALUES
(1, 'Pitbull'),
(2, 'Rottweiler'),
(3, 'Labrador'),
(4, 'Pastor Alemão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdog`
--

CREATE TABLE `tbdog` (
  `id` int(11) NOT NULL,
  `idraca` int(11) NOT NULL,
  `porte` varchar(50) NOT NULL,
  `nac` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbdog`
--

INSERT INTO `tbdog` (`id`, `idraca`, `porte`, `nac`) VALUES
(1, 1, 'medio', 'America do Norte'),
(2, 2, 'grande', 'Canada'),
(3, 3, 'grande', 'Brasil'),
(4, 4, 'grande', 'Australia');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbraca`
--
ALTER TABLE `tbraca`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbdog`
--
ALTER TABLE `tbdog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbraca`
--
ALTER TABLE `tbraca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbdog`
--
ALTER TABLE `tbdog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
