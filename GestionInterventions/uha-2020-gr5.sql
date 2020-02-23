-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2020 at 10:33 PM
-- Server version: 5.7.23-log
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uha-2020-gr5`
--

-- --------------------------------------------------------

--
-- Table structure for table `interventions`
--

DROP TABLE IF EXISTS `interventions`;
CREATE TABLE IF NOT EXISTS `interventions` (
  `id` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `P_CODE` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `V_ID` int(11) NOT NULL,
  KEY `V_ID` (`V_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

DROP TABLE IF EXISTS `resetpassword`;
CREATE TABLE IF NOT EXISTS `resetpassword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicules`
--

DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `V_ID` int(10) NOT NULL,
  `ID` int(10) NOT NULL,
  `TV_CODE` varchar(10) NOT NULL,
  `dateDepart` date NOT NULL,
  `heureDepart` time NOT NULL,
  `dateArrivee` date NOT NULL,
  `heureArrivee` time NOT NULL,
  `dateRetour` date NOT NULL,
  `heureRetour` time NOT NULL,
  PRIMARY KEY (`V_ID`,`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `personne_ibfk_1` FOREIGN KEY (`V_ID`) REFERENCES `vehicules` (`V_ID`);

--
-- Constraints for table `vehicules`
--
ALTER TABLE `vehicules`
  ADD CONSTRAINT `vehicules_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `interventions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
