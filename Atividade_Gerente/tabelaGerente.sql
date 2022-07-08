-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 01-Maio-2017 às 21:25
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `banco1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabelaGerente`
--
CREATE DATABASE banco1;
USE banco1;

CREATE TABLE IF NOT EXISTS `tabelagerente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Endereco` varchar(50) NOT NULL,
  `Depto` varchar(20) NOT NULL,
  `DataNasc` date NOT NULL,
  `Foto` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tabelaGerente`
--

INSERT INTO `tabelaGerente` (`id`, `codigo`, `Nome`, `Endereco`, `Depto`, `DataNasc`, `Foto`) VALUES
(1, 112233, 'Antônio Carlos dos Santos', 'Rua José Domingues 57, Santa Rosália', 'Administrativo', '1973-06-02', 'AntônioCarlos.png'),
(2, 302010, 'José Figueiredo Neto', 'Rua Joaquim Silveira 34, Jd. Romano', 'Financeiro', '1969-12-17', 'JoseFigueiredo.png'),
(3, 332211, 'Jeferson Conceição', 'Rua Comendador Pasqual 103, Wanel Ville 1', 'Comercial', '1978-05-27', 'JefersonConceicao.png'),
(4, 102030, 'Marcos Machado da Rocha', 'Rua Rodrigues Pacheco 307, Jd. Nogueira', 'Marketing', '1980-02-01', 'MarcosMachado.jpg'),
(5, 123456, 'Dulce Brunetti Poli', 'Rua Antônio Augusto de Lima 1506, Jd. Camila', 'Recursos Humanos', '1967-08-10', 'DulceBrunetti.jpg');


