-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 02:01 AM
-- Server version: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vista`
--
CREATE DATABASE IF NOT EXISTS `vista` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vista`;

-- --------------------------------------------------------

--
-- Table structure for table `alugueis`
--

CREATE TABLE `alugueis` (
  `IdAluguel` int(11) NOT NULL,
  `IdImoveis` int(11) NOT NULL DEFAULT '0',
  `vencimento` date NOT NULL DEFAULT '0000-00-00',
  `status` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contratos`
--

CREATE TABLE `contratos` (
  `IdContrato` int(11) NOT NULL,
  `IdImoveis` int(11) NOT NULL DEFAULT '0',
  `IdLocadores` int(11) DEFAULT NULL,
  `IdLocatarios` int(11) NOT NULL DEFAULT '0',
  `dataInicio` date NOT NULL DEFAULT '0000-00-00',
  `dataFim` date NOT NULL DEFAULT '0000-00-00',
  `aluguel` float(9,2) NOT NULL DEFAULT '0.00',
  `condominio` float(9,2) NOT NULL DEFAULT '0.00',
  `iptu` float(9,2) NOT NULL DEFAULT '0.00',
  `taxaAdm` float(9,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `imoveis`
--

CREATE TABLE `imoveis` (
  `IdImoveis` int(11) NOT NULL,
  `Rua` varchar(512) NOT NULL DEFAULT '',
  `Numero` int(11) NOT NULL DEFAULT '0',
  `complemento` varchar(512) NOT NULL DEFAULT 'Casa',
  `cidade` varchar(255) NOT NULL DEFAULT '',
  `uf` varchar(2) NOT NULL DEFAULT '',
  `cep` varchar(8) NOT NULL DEFAULT '00000000',
  `IdLocatarios` int(11) NOT NULL DEFAULT '0',
  `IdLocadores` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locadores`
--

CREATE TABLE `locadores` (
  `IdLocadores` int(11) NOT NULL,
  `NomeLocadores` varchar(512) NOT NULL DEFAULT '',
  `EmailLocadores` varchar(255) NOT NULL DEFAULT '',
  `TelefoneLocadores` varchar(11) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `locatarios`
--

CREATE TABLE `locatarios` (
  `IdLocatarios` int(11) NOT NULL,
  `NomeLocatarios` varchar(512) NOT NULL DEFAULT '',
  `EmailLocatarios` varchar(255) NOT NULL DEFAULT '',
  `TelefoneLocatarios` varchar(11) NOT NULL DEFAULT '0',
  `diaRepasse` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paginas`
--

CREATE TABLE `paginas` (
  `Idpagina` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `canonical` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `card` varchar(255) DEFAULT NULL,
  `alt` varchar(512) DEFAULT NULL,
  `css` varchar(1024) NOT NULL DEFAULT 'login',
  `js` varchar(1024) NOT NULL DEFAULT 'login'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paginas`
--

INSERT INTO `paginas` (`Idpagina`, `nome`, `title`, `description`, `canonical`, `keywords`, `card`, `alt`, `css`, `js`) VALUES
(1, 'home', 'Página inicial', 'Página inicial da plataforma', NULL, NULL, 'home', 'Descrição da imagem', 'login', 'login'),
(2, 'usuarios', 'Gestão de usuários', 'Gestão de usuários da plataforma', 'usuarios', NULL, 'usuarios', 'Descrição do card da página usuários', 'login', 'login, usuarios'),
(3, 'locadores', 'Gestão de locadores', 'Página de gestão de locadores', 'locadores', NULL, 'locadores', 'Descrição da imagem', 'login', 'login,locadores'),
(4, 'locatarios', 'Gestão de locatários', 'Página de gestão de locatários', 'locatarios', NULL, 'locatarios', 'Desc', 'login', 'login,locatarios'),
(5, 'imoveis', 'Gestão de imóveis', 'Página de gestão de imóveis', 'imoveis', NULL, 'imoveis', 'Descrição', 'login', 'login,imoveis');

-- --------------------------------------------------------

--
-- Table structure for table `repasses`
--

CREATE TABLE `repasses` (
  `IdRepasses` int(11) NOT NULL,
  `IdImoveis` int(11) NOT NULL DEFAULT '0',
  `dataRepasse` date NOT NULL DEFAULT '0000-00-00',
  `status` varchar(1) NOT NULL DEFAULT 'N',
  `valorRepasse` float(9,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `IdUser` int(11) NOT NULL,
  `NomeUser` varchar(255) DEFAULT NULL,
  `EmailUser` varchar(255) NOT NULL DEFAULT '',
  `TelefoneUser` varchar(11) NOT NULL DEFAULT '',
  `SenhaUser` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IdUser`, `NomeUser`, `EmailUser`, `TelefoneUser`, `SenhaUser`) VALUES
(1, 'Joe Doe', 'john@doe.com', '48987654321', '460a203a467bcf92e4b6ea91fabda732');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alugueis`
--
ALTER TABLE `alugueis`
  ADD PRIMARY KEY (`IdAluguel`);

--
-- Indexes for table `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`IdContrato`);

--
-- Indexes for table `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`IdImoveis`);

--
-- Indexes for table `locadores`
--
ALTER TABLE `locadores`
  ADD PRIMARY KEY (`IdLocadores`);

--
-- Indexes for table `locatarios`
--
ALTER TABLE `locatarios`
  ADD PRIMARY KEY (`IdLocatarios`);

--
-- Indexes for table `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`Idpagina`);

--
-- Indexes for table `repasses`
--
ALTER TABLE `repasses`
  ADD PRIMARY KEY (`IdRepasses`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alugueis`
--
ALTER TABLE `alugueis`
  MODIFY `IdAluguel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contratos`
--
ALTER TABLE `contratos`
  MODIFY `IdContrato` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `IdImoveis` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locadores`
--
ALTER TABLE `locadores`
  MODIFY `IdLocadores` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locatarios`
--
ALTER TABLE `locatarios`
  MODIFY `IdLocatarios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paginas`
--
ALTER TABLE `paginas`
  MODIFY `Idpagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `repasses`
--
ALTER TABLE `repasses`
  MODIFY `IdRepasses` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
