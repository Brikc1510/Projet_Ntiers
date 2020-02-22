-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 22 Février 2020 à 20:36
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `uha-2020-gr5`
--
CREATE DATABASE IF NOT EXISTS `uha-2020-gr5` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `uha-2020-gr5`;

-- --------------------------------------------------------

--
-- Structure de la table `interventions`
--

CREATE TABLE IF NOT EXISTS `interventions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commune` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `typeI` varchar(50) NOT NULL,
  `requerant` varchar(50) NOT NULL,
  `dateDebut` date NOT NULL,
  `heureDebut` time NOT NULL,
  `dateFin` date NOT NULL,
  `heureFin` time NOT NULL,
  `opm` tinyint(1) NOT NULL,
  `important` tinyint(1) NOT NULL,
  `dateDepart` date NOT NULL,
  `heureDepart` time NOT NULL,
  `dateArrivee` date NOT NULL,
  `heureArrivee` time NOT NULL,
  `dateRetour` date NOT NULL,
  `heureRetour` time NOT NULL,
  `responsable` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `interventions`
--

INSERT INTO `interventions` (`id`, `commune`, `adresse`, `typeI`, `requerant`, `dateDebut`, `heureDebut`, `dateFin`, `heureFin`, `opm`, `important`, `dateDepart`, `heureDepart`, `dateArrivee`, `heureArrivee`, `dateRetour`, `heureRetour`, `responsable`) VALUES
(1, 'c1', 'a1', 't1', 'r1', '2020-02-22', '16:00:00', '2020-02-22', '18:00:00', 1, 1, '2020-02-22', '16:15:00', '2020-02-22', '16:30:00', '2020-02-22', '19:00:00', 'r1'),
(2, 'c1', 'a2', 't2', 'r2', '2020-02-21', '07:00:00', '2020-02-21', '18:00:00', 1, 1, '2020-02-21', '08:00:00', '2020-02-21', '09:00:00', '2020-02-21', '13:00:00', 'r2'),
(3, 'c3', 'a3', 't2', 'r4', '2020-02-20', '09:00:00', '2020-02-20', '13:00:00', 1, 1, '2020-02-20', '10:00:00', '2020-02-20', '10:30:00', '2020-02-20', '14:00:00', 'r4'),
(4, 'c2', 'a4', 't2', 'r2', '2020-02-19', '07:00:00', '2020-02-19', '18:00:00', 1, 1, '2020-02-19', '07:10:00', '2020-02-19', '07:30:00', '2020-02-19', '19:00:00', 'r2'),
(5, 'c2', 'a5', 't4', 'r5', '2020-02-18', '09:00:00', '2020-02-18', '13:00:00', 1, 1, '2020-02-18', '09:30:00', '2020-02-18', '10:00:00', '2020-02-18', '14:00:00', 'r5');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE IF NOT EXISTS `participer` (
  `ID` int(10) NOT NULL,
  `TV_CODE` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`,`TV_CODE`),
  KEY `TV_CODE` (`TV_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participer`
--

INSERT INTO `participer` (`ID`, `TV_CODE`) VALUES
(1, 'TV_CODE1'),
(2, 'TV_CODE1'),
(4, 'TV_CODE1'),
(5, 'TV_CODE1'),
(1, 'TV_CODE2'),
(3, 'TV_CODE2'),
(4, 'TV_CODE2'),
(5, 'TV_CODE2'),
(1, 'TV_CODE3'),
(2, 'TV_CODE3'),
(3, 'TV_CODE3'),
(5, 'TV_CODE3'),
(2, 'TV_CODE4'),
(4, 'TV_CODE4'),
(5, 'TV_CODE4');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `P_CODE` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`P_CODE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`P_CODE`, `nom`, `prenom`) VALUES
(1, 'n1', 'p1'),
(2, 'n2', 'p2'),
(3, 'n3', 'p3'),
(4, 'n4', 'p4'),
(5, 'n5', 'n5'),
(6, 'n6', 'p6'),
(7, 'n7', 'p7'),
(8, 'n8', 'p8');

-- --------------------------------------------------------

--
-- Structure de la table `resetpassword`
--

CREATE TABLE IF NOT EXISTS `resetpassword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE IF NOT EXISTS `vehicules` (
  `TV_CODE` varchar(10) NOT NULL,
  PRIMARY KEY (`TV_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicules`
--

INSERT INTO `vehicules` (`TV_CODE`) VALUES
('TV_CODE1'),
('TV_CODE2'),
('TV_CODE3'),
('TV_CODE4');

-- --------------------------------------------------------

--
-- Structure de la table `voyager`
--

CREATE TABLE IF NOT EXISTS `voyager` (
  `P_CODE` int(10) NOT NULL,
  `TV_CODE` varchar(10) NOT NULL,
  PRIMARY KEY (`P_CODE`,`TV_CODE`),
  KEY `TV_CODE` (`TV_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `voyager`
--

INSERT INTO `voyager` (`P_CODE`, `TV_CODE`) VALUES
(1, 'TV_CODE1'),
(2, 'TV_CODE1'),
(3, 'TV_CODE1'),
(4, 'TV_CODE1'),
(6, 'TV_CODE1'),
(7, 'TV_CODE1'),
(1, 'TV_CODE2'),
(2, 'TV_CODE2'),
(5, 'TV_CODE2'),
(6, 'TV_CODE2'),
(7, 'TV_CODE2'),
(8, 'TV_CODE2'),
(5, 'TV_CODE3'),
(6, 'TV_CODE3'),
(8, 'TV_CODE3'),
(2, 'TV_CODE4'),
(3, 'TV_CODE4'),
(4, 'TV_CODE4'),
(5, 'TV_CODE4'),
(7, 'TV_CODE4'),
(8, 'TV_CODE4');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `interventions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`TV_CODE`) REFERENCES `vehicules` (`TV_CODE`) ON DELETE CASCADE;

--
-- Contraintes pour la table `voyager`
--
ALTER TABLE `voyager`
  ADD CONSTRAINT `voyager_ibfk_1` FOREIGN KEY (`P_CODE`) REFERENCES `personne` (`P_CODE`) ON DELETE CASCADE,
  ADD CONSTRAINT `voyager_ibfk_2` FOREIGN KEY (`TV_CODE`) REFERENCES `vehicules` (`TV_CODE`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
