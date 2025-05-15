-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Ago-2024 às 11:02
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
-- Banco de dados: `upload`
--
CREATE DATABASE IF NOT EXISTS `upload` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `upload`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--
-- Criação: 12-Ago-2024 às 07:50
-- Última actualização: 12-Ago-2024 às 08:53
--

DROP TABLE IF EXISTS `arquivo`;
CREATE TABLE IF NOT EXISTS `arquivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `data_upload` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Truncar tabela antes do insert `arquivo`
--

TRUNCATE TABLE `arquivo`;
--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`id`, `nome`, `caminho`, `data_upload`) VALUES
(1, '3.jpg', 'img/66b9cbf6785b7.jpg', '2024-08-12 09:46:46'),
(2, '4.jpg', 'img/66b9cc117f74d.jpg', '2024-08-12 09:47:13'),
(3, '5.jpg', 'img/66b9cc11e572c.jpg', '2024-08-12 09:47:13'),
(4, '7.jpg', 'img/66b9cc1308cc2.jpg', '2024-08-12 09:47:15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
