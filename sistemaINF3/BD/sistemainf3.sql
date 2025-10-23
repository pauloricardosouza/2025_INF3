-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/08/2025 às 22:55
-- Versão do servidor: 8.0.41
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemainf3`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int NOT NULL,
  `fotoProduto` varchar(100) NOT NULL,
  `nomeProduto` varchar(20) NOT NULL,
  `descricaoProduto` varchar(200) NOT NULL,
  `valorProduto` decimal(10,2) NOT NULL,
  `statusProduto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`idProduto`, `fotoProduto`, `nomeProduto`, `descricaoProduto`, `valorProduto`, `statusProduto`) VALUES
(1, 'img/xbox360.webp', 'Xbox 360', 'Console Microsoft Xbox 360 modelo Slim.', 500.00, 'disponivel'),
(2, 'img/Fusca_Azul.jpeg', 'Fusca Azul', 'Veículo Volkswagen Fusca ano 1972, na cor azul metálico em excelente estado de conservação.', 20000.00, 'disponivel'),
(3, 'img/tenisVans.jpg', 'Tênis Vans', 'Calçado Tênis Vans, modelo Oldschool, preto, número 40, novo na caixa.', 200.00, 'esgotado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `fotoUsuario` varchar(100) NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `dataNascimentoUsuario` date NOT NULL,
  `cidadeUsuario` varchar(30) NOT NULL,
  `telefoneUsuario` varchar(20) NOT NULL,
  `emailUsuario` varchar(50) NOT NULL,
  `senhaUsuario` varchar(100) NOT NULL,
  `tipoUsuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `fotoUsuario`, `nomeUsuario`, `dataNascimentoUsuario`, `cidadeUsuario`, `telefoneUsuario`, `emailUsuario`, `senhaUsuario`, `tipoUsuario`) VALUES
(1, 'img/Classico_2D.webp', 'Sonic', '2025-04-17', 'telemacoBorba', '(42) 99999-9999', 'sonic@gmail.com', '202cb962ac59075b964b07152d234b70', 'administrador'),
(2, 'img/mario.png', 'Mario Mario', '1985-08-13', 'imbau', '(42) 99999-5555', 'mario@gmail.com', '202cb962ac59075b964b07152d234b70', 'cliente'),
(3, 'img/Luigi.png', 'Luigi Mario', '1987-03-30', 'ortigueira', '(42) 99999-7777', 'luigi@gmail.com', '202cb962ac59075b964b07152d234b70', 'cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
