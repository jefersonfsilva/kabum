-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/10/2020 às 09:14
-- Versão do servidor: 10.3.16-MariaDB
-- Versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kabum`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `attempt`
--

CREATE TABLE `attempt` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `dataNascimento` varchar(10) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `telefone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `clients`
--

INSERT INTO `clients` (`id`, `nome`, `dataNascimento`, `cpf`, `rg`, `telefone`) VALUES
(1, 'Angelina Jolie', '04/06/1975', '261.115.498-80', '43.699.408', '555-2016'),
(2, 'Brad Pitt', '18/12/1963', '766.291.928-50', '21.310.910', '555-1812'),
(4, 'Jeferson ferreira', '02/04/1977', '527.193.518-30', '19.139.460', '19996857030');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clients_address`
--

CREATE TABLE `clients_address` (
  `id` int(11) NOT NULL,
  `clienteId` int(11) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `municipio` varchar(30) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `tipo` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `clients_address`
--

INSERT INTO `clients_address` (`id`, `clienteId`, `logradouro`, `municipio`, `uf`, `tipo`) VALUES
(1, 1, '777, W48St', 'Los Angeles', 'CA', 'Residencial'),
(2, 1, '1400, E46 St', 'Los Angeles', 'CA', 'Comercial'),
(3, 2, 'Shawnee, Oklahoma, EUA', 'Shawnee', 'OK', 'Residencial'),
(4, 1, '777, S63 St', 'Los Angeles', 'CA', 'Comercial'),
(6, 4, 'Rua Campos Salles, 2035', 'Valinhos', 'SP', 'Residencial');

-- --------------------------------------------------------

--
-- Estrutura para tabela `confirmation`
--

CREATE TABLE `confirmation` (
  `id` int(11) NOT NULL,
  `email` varchar(90) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `confirmation`
--

INSERT INTO `confirmation` (`id`, `email`, `token`) VALUES
(3, 'jferrss@yahoo.com.br', '37ad457435bc89ba698be8911a6beeb61a891887fab22d24b2c3a26bf3ee3e128a32666352eaf25b355dcbdcc54f120fb01093fd9aa32cce5157dbbbf6cabe39'),
(8, 'jefersonfs@gmail.com', '48b5f482e2284969ced5107bfa0b282e07b29b8a1f4bbe5baa9c3018cfc13f7ab9881162c6688002c75283e3227a3f0f34a71da4ea75769aaad15d94a4a1b0c5'),
(9, 'contato@kabum.com.br', 'e4fcbd7ef2fb6a2b92383a599a57a6feb9d16b4b982581e7d338cf58329a7054825c62374bc8ad4c29ea09a8779df08b0a07b2d004b251eb5530d96fa3d02f7b');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `senha` varchar(90) NOT NULL,
  `dataNascimento` varchar(15) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `dataCriacao` datetime NOT NULL DEFAULT current_timestamp(),
  `permissoes` varchar(20) NOT NULL,
  `situacao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `senha`, `dataNascimento`, `cpf`, `dataCriacao`, `permissoes`, `situacao`) VALUES
(5, 'AP', 'jferrss@yahoo.com.br', '$2y$10$lMNfHhWA/XsY16sKQiBeSeAoOlgyrNZ72qC8I1FPXR2cT3b1DdBBO', '02/04/1977', '172.737.108-90', '2020-10-20 09:15:37', 'user', 'confirmation'),
(7, 'Jonas', 'j@gr.com.br', '$2y$10$AoIFB/Xwcok4ipTuaxuRAeAyqUTiPL2ZOPsV/WZ14SXiQPXkCMxaa', '25/10/1981', '172.737.108-90', '2020-10-20 09:17:33', 'user', 'confirmation'),
(9, 'XXX', 'xxx@gov.com', '$2y$10$B72sXLwOra9uehZeKpOWuOGmECsFWeXaHp9oemBMfV.1shyKmR7la', '14/07/1998', '172.737.108-90', '2020-10-20 09:22:14', 'user', 'confirmation'),
(10, 'Jeferson', 'jefersonfs@gmail.com', '$2y$10$2nHbUkULdxs8OhX7rzP1YOV8mSn2aeTOcShgz2PcXuukkU0Pjyo52', '02/04/1977', '172.737.108-90', '2020-10-20 00:00:00', 'user', 'confirmation'),
(11, 'Kabum', 'mecontrata@kabum.com.br', '$2y$10$Z.p4cCo5bZM/cmGLF97qhOPViy7g9FWR3PccLnqymB3DYttirqsxS', '01/01/2003', '796.942.488-09', '2020-10-22 22:53:58', 'user', 'confirmation');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `attempt`
--
ALTER TABLE `attempt`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clients_address`
--
ALTER TABLE `clients_address`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `confirmation`
--
ALTER TABLE `confirmation`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `attempt`
--
ALTER TABLE `attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clients_address`
--
ALTER TABLE `clients_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `confirmation`
--
ALTER TABLE `confirmation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
