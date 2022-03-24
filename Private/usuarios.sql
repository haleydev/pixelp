-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Mar-2022 às 14:43
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `phpmyadmin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sobrenome` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `telefone` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `senha` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acesso` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `data_cadastro` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `email`, `telefone`, `senha`, `acesso`, `data_cadastro`) VALUES
(1, 'haley', 'rodrigues', 'haleytrader@hotmail.com', '954961651651', '$2y$10$vbi6WDqo70eZFPBZ9Gs51OlV/VSlZ0/MtWEDpJqhI3qc5WUoUj17O', 'master', '01/01/2077 às 00:00'),
(2, 'pixelp', 'Soluções Digitais', 'pixelp@hotmail.com', '9999999999', '$2y$10$G9/NDn2x.IWyIG9nyTWVnuVkC/jaNT/tbfzY68chubfPTwwPM5bj6', 'master', '24/03/2022 às 10:34'),
(3, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(4, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(5, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(6, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(7, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(8, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(9, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(10, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(11, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(12, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(13, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(14, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(15, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(16, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(17, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(18, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(19, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(20, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(21, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(22, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(23, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(24, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(25, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(26, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(27, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(28, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(29, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(30, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(31, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(32, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(33, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(34, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(35, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(36, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(37, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(38, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(39, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(40, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(41, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(42, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(43, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(44, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(45, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(46, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(47, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(48, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(49, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(50, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(51, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(52, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(53, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(54, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(55, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37'),
(56, 'administrador', 'de teste', 'admteste@hotmail.com', '7777777777', '$2y$10$nT4H2A19lEDsF7wLOE2MVepr65DknT8G3W6mdBY9Ngfzs.jp0vRXO', 'adm', '24/03/2022 às 10:37'),
(57, 'usuario', 'de teste', 'usuarioteste@hotmail.com', '8888888888', '$2y$10$.j54Ioce7tuPMLH6U.zTyOgVGvEuyWrDRh07lmxqHccbI4xBKYbZm', 'user', '24/03/2022 às 10:37');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
