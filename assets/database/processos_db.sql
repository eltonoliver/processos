-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2014 at 07:23 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `processos_db`
--
CREATE DATABASE IF NOT EXISTS `processos_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `processos_db`;

-- --------------------------------------------------------

--
-- Table structure for table `adendos`
--

CREATE TABLE IF NOT EXISTS `adendos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adendos` varchar(145) NOT NULL,
  `processo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`processo_id`),
  KEY `fk_adendos_processo_idx` (`processo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `anexos`
--

CREATE TABLE IF NOT EXISTS `anexos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anexo` varchar(145) NOT NULL,
  `processo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`processo_id`),
  KEY `fk_Anexos_processo1_idx` (`processo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `anexos`
--

INSERT INTO `anexos` (`id`, `anexo`, `processo_id`) VALUES
(1, '59af2-listadeclassificadosed38aplicativograficonoit.pdf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('027776308616aab004c65f79d3944927', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', 1389377904, 'a:1:{s:10:"idProcesso";s:1:"4";}');

-- --------------------------------------------------------

--
-- Table structure for table `edital`
--

CREATE TABLE IF NOT EXISTS `edital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `edital` varchar(165) NOT NULL,
  `processo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`processo_id`),
  KEY `fk_edital_processo1_idx` (`processo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `modalidade`
--

CREATE TABLE IF NOT EXISTS `modalidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `modalidade`
--

INSERT INTO `modalidade` (`id`, `descricao`) VALUES
(1, 'Interno'),
(2, 'Externo');

-- --------------------------------------------------------

--
-- Table structure for table `processo`
--

CREATE TABLE IF NOT EXISTS `processo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `numeroEdital` varchar(80) NOT NULL,
  `objetivo` text NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `modalidade_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`modalidade_id`),
  KEY `fk_processo_modalidade1_idx` (`modalidade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `processo`
--

INSERT INTO `processo` (`id`, `descricao`, `data`, `numeroEdital`, `objetivo`, `idUsuario`, `status`, `modalidade_id`) VALUES
(4, 'teste', '2014-01-10', '3/2014', '<p>\r\n	asdasdasd</p>\r\n', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `resultados`
--

CREATE TABLE IF NOT EXISTS `resultados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resultado` varchar(145) DEFAULT NULL,
  `processo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`processo_id`),
  KEY `fk_resultados_processo1_idx` (`processo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adendos`
--
ALTER TABLE `adendos`
  ADD CONSTRAINT `fk_adendos_processo` FOREIGN KEY (`processo_id`) REFERENCES `processo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `anexos`
--
ALTER TABLE `anexos`
  ADD CONSTRAINT `fk_Anexos_processo1` FOREIGN KEY (`processo_id`) REFERENCES `processo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `edital`
--
ALTER TABLE `edital`
  ADD CONSTRAINT `fk_edital_processo1` FOREIGN KEY (`processo_id`) REFERENCES `processo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `processo`
--
ALTER TABLE `processo`
  ADD CONSTRAINT `fk_processo_modalidade1` FOREIGN KEY (`modalidade_id`) REFERENCES `modalidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `fk_resultados_processo1` FOREIGN KEY (`processo_id`) REFERENCES `processo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
