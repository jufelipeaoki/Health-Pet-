-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/10/2023 às 00:17
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
-- Banco de dados: `comenta1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mensagem` text NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentario`
--

INSERT INTO `comentario` (`id`, `nome`, `email`, `mensagem`, `data`) VALUES
(1, '0', '0', '123', '2023-10-17 22:06:31'),
(2, '0', '0', '123', '2023-10-17 22:10:13'),
(3, '0', '0', '15282454', '2023-10-17 22:18:41'),
(4, 'gustavo', 'gu@gmail.com', 'eu sou o melhor', '2023-10-17 22:21:07'),
(5, 'nicholas', 'sffed@gmail', '123', '2023-10-17 22:25:50'),
(6, 'pedro', 'sffed@gmail', '123', '2023-10-17 22:29:35'),
(7, 'pedro', 'sffed@gmail', '1235', '2023-10-17 22:34:05'),
(8, 'pedro', 'sffed@gmail', '12345', '2023-10-17 22:35:42'),
(9, 'pedro', 'jao@gmail.com', '12345', '2023-10-17 22:37:14'),
(10, 'pedro', 'sffed@gmail', 'olh', '2023-10-17 22:43:43'),
(11, 'pedro', 'sffed@gmail', '223', '2023-10-17 22:45:38'),
(12, 'pedro', 'sffed@gmail', 'ola mundo', '2023-10-17 22:47:31'),
(13, 'pedro', 'wiltonP@gmail.com', '123', '2023-10-17 22:49:52'),
(14, 'pedro', 'sffed@gmail', '123', '2023-10-17 22:52:10'),
(15, 'pedro', 'sffed@gmail', '123', '2023-10-17 22:52:34'),
(16, 'pedro', 'sffed@gmail', '123', '2023-10-17 22:55:15'),
(17, 'pedro', 'sffed@gmail', '123', '2023-10-17 22:57:02'),
(18, 'pedro', 'sffed@gmail', '123', '2023-10-17 23:00:38'),
(19, 'pedro', 'sffed@gmail', '123', '2023-10-17 23:11:58');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
