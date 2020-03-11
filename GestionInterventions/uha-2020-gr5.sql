-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2020 at 07:43 PM
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
  `responsable` varchar(50) NOT NULL,
  `idChef` int(11) NOT NULL,
  `etat` varchar(10) NOT NULL,
  `commentaire` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interventions`
--

INSERT INTO `interventions` (`id`, `commune`, `adresse`, `typeI`, `requerant`, `dateDebut`, `heureDebut`, `dateFin`, `heureFin`, `opm`, `important`, `responsable`, `idChef`, `etat`, `commentaire`) VALUES
(1, 'MULHOUSE', 'rue De Galfingue, 3 ème étage a gauche', 'GLISS', 'Alerte locale', '0015-12-15', '15:15:00', '0015-12-15', '15:15:00', 0, 0, '1234', 2, 'Validee', NULL),
(2, 'Colmar', '007 Rue Kaouach Abdrahmne ', 'INNO3', 'Alerte locale', '2020-12-15', '15:15:00', '1515-12-15', '15:15:00', 0, 0, '1234', 2, 'Validee', NULL),
(3, 'MULHOUSE', 'rue De Galfingue, 3 ème étage a gauche', 'MANOE', 'Alerte locale', '1515-12-15', '15:15:00', '2020-12-15', '15:15:00', 0, 0, '5', 2, 'aModifier', NULL),
(4, 'qsd', 'qsd', 'INNO1', 'Alerte locale', '0015-12-15', '15:15:00', '0011-12-15', '15:01:00', 1, 1, '5', 1234, 'Validee', NULL),
(5, 'qdqs', 'dqsd', 'ERDF', 'Alerte locale', '1515-12-15', '15:15:00', '1515-12-15', '15:15:00', 0, 0, '5', 1234, 'Validee', NULL),
(6, 'qsdqd', 'dqsdq', 'CHUTO', 'Alerte locale', '1515-12-15', '15:15:00', '0015-12-15', '05:15:00', 0, 1, '5', 1234, 'aModifier', ' blabla');

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

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`P_CODE`, `nom`, `prenom`, `V_ID`) VALUES
(2, 'badach', 'samy', 1),
(3, 'amiour', 'aimene', 1),
(3, 'amiour', 'aimene', 1),
(2, 'badach', 'samy', 1),
(15, 'rekaik', 'ahmed', 1),
(3, 'amiour', 'aimene', 1),
(1234, 'admin', 'admin', 1),
(15, 'rekaik', 'ahmed', 1),
(3, 'amiour', 'aimene', 1),
(1234, 'admin', 'admin', 1),
(15, 'rekaik', 'ahmed', 1),
(3, 'amiour', 'aimene', 1),
(1234, 'admin', 'admin', 1),
(15, 'rekaik', 'ahmed', 1),
(3, 'amiour', 'aimene', 1),
(1234, 'admin', 'admin', 1),
(1, 'abed', 'hocine', 1),
(15, 'rekaik', 'ahmed', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resetpassword`
--

INSERT INTO `resetpassword` (`id`, `code`, `email`) VALUES
(34, '15e693d986404f', 'ahmedrekaik@gmail.com'),
(35, '15e693efed629f', 'ahmedrekaik@gmail.com');

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
-- Dumping data for table `vehicules`
--

INSERT INTO `vehicules` (`V_ID`, `ID`, `TV_CODE`, `dateDepart`, `heureDepart`, `dateArrivee`, `heureArrivee`, `dateRetour`, `heureRetour`) VALUES
(1, 1, 'VSAV', '0001-01-01', '01:01:00', '0001-01-01', '01:01:00', '0001-01-01', '01:01:00'),
(1, 2, 'VSAV', '2000-02-20', '20:20:00', '1515-12-15', '15:15:00', '1515-12-15', '20:15:00'),
(1, 3, 'VSAV', '2020-03-10', '15:15:00', '0115-12-15', '15:15:00', '1151-12-15', '11:05:00'),
(1, 4, 'VSAV', '1515-12-15', '15:15:00', '0015-12-15', '15:15:00', '0015-12-15', '15:01:00'),
(1, 5, 'VSAV', '1151-12-15', '15:01:00', '0015-12-15', '15:11:00', '0015-12-15', '15:15:00'),
(1, 6, 'VSAV', '0151-05-15', '15:15:00', '5115-11-05', '15:15:00', '0151-12-15', '15:11:00');

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
