-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 14 juin 2019 à 22:42
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portail`
--

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `serveur` varchar(255) DEFAULT NULL,
  `validation_totale` int(100) NOT NULL DEFAULT '0',
  `report_totale` int(100) NOT NULL DEFAULT '0',
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `serveur`, `validation_totale`, `report_totale`, `date_inscription`) VALUES
(1, 'Lampadaire', 'Nidas', 5, 1, '2019-02-05 14:48:13'),
(2, 'Zetrox', 'Nidas', 1, 0, '2019-06-15 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `nidas`
--

DROP TABLE IF EXISTS `nidas`;
CREATE TABLE IF NOT EXISTS `nidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_nidas` (`id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nidas`
--

INSERT INTO `nidas` (`id`, `portail`, `positionX`, `positionY`, `utilisation`, `modificateur`, `id_membre`, `temps`) VALUES
(1, 'enutrosor', NULL, NULL, 0, 'PR', 2, '2019-06-14 14:44:02'),
(2, 'enutrosor', NULL, NULL, 0, 'DI', 1, '2019-06-15 00:35:04');

-- --------------------------------------------------------

--
-- Structure de la table `nidas_cpt`
--

DROP TABLE IF EXISTS `nidas_cpt`;
CREATE TABLE IF NOT EXISTS `nidas_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `validation` int(1) NOT NULL DEFAULT '0',
  `report` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_nidas` (`id_pos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nidas_cpt`
--

INSERT INTO `nidas_cpt` (`id`, `id_pos`, `validation`, `report`) VALUES
(1, 1, 5, 1),
(2, 2, 1, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `nidas`
--
ALTER TABLE `nidas`
  ADD CONSTRAINT `id_membre_nidas` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `nidas_cpt`
--
ALTER TABLE `nidas_cpt`
  ADD CONSTRAINT `id_nidas` FOREIGN KEY (`id_pos`) REFERENCES `nidas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
