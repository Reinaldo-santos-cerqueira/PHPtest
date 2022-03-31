-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Mar-2022 às 04:44
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ceptest`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cep`
--

CREATE TABLE `cep` (
  `CEP_COD` int(11) NOT NULL,
  `LOGRADOURO` varchar(255) DEFAULT NULL,
  `CEP` char(8) DEFAULT NULL,
  `BAIRRO` varchar(255) DEFAULT NULL,
  `LOCALIDADE` varchar(255) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL,
  `IBGE` varchar(11) DEFAULT NULL,
  `GIA` varchar(11) DEFAULT NULL,
  `SIAFI` varchar(11) DEFAULT NULL,
  `DDD` char(2) DEFAULT NULL,
  `COMPLEMENTO` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cep`
--

INSERT INTO `cep` (`CEP_COD`, `LOGRADOURO`, `CEP`, `BAIRRO`, `LOCALIDADE`, `UF`, `IBGE`, `GIA`, `SIAFI`, `DDD`, `COMPLEMENTO`) VALUES
(1, 'Rua da Romã', '41205235', ' Tancredo Neves', 'Salvador', 'BA', '2927408', '', '3849', '71', '(Cj Hab Barreiras)'),
(2, 'Praça da Sé', '01001000', 'Sé', 'São Paulo', 'SP', '3550308', '1004', '7107', '11', 'lado ímpar'),
(3, 'Rua Rui Barbosa', '45712970', 'Rio do Meio', 'Itororó', 'BA', '2917102', '', '3643', '73', 's/n'),
(4, '', '', '', '', '', '', '', '', '', ''),
(5, 'Rua Ruy Barbosa', '47970970', 'Centro', 'Riachão das Neves', 'BA', '2926202', '', '3825', '77', 's/n'),
(6, 'Praça da Matriz', '46738970', 'Remédios', 'Novo Horizonte', 'BA', '2923035', '', '3013', '77', 's/n');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cep`
--
ALTER TABLE `cep`
  ADD PRIMARY KEY (`CEP_COD`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cep`
--
ALTER TABLE `cep`
  MODIFY `CEP_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
