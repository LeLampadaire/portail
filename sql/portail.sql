-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 15 juin 2019 à 21:55
-- Version du serveur :  5.7.23
-- Version de PHP :  7.0.32

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
-- Structure de la table `agride`
--

DROP TABLE IF EXISTS `agride`;
CREATE TABLE IF NOT EXISTS `agride` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_agride` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `agride_cpt`
--

DROP TABLE IF EXISTS `agride_cpt`;
CREATE TABLE IF NOT EXISTS `agride_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_agride` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `atcham`
--

DROP TABLE IF EXISTS `atcham`;
CREATE TABLE IF NOT EXISTS `atcham` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_atcham` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `atcham_cpt`
--

DROP TABLE IF EXISTS `atcham_cpt`;
CREATE TABLE IF NOT EXISTS `atcham_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_atcham` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `brumen`
--

DROP TABLE IF EXISTS `brumen`;
CREATE TABLE IF NOT EXISTS `brumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_brumen` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `brumen_cpt`
--

DROP TABLE IF EXISTS `brumen_cpt`;
CREATE TABLE IF NOT EXISTS `brumen_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_brumen` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(120) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `choix` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `crocabulia`
--

DROP TABLE IF EXISTS `crocabulia`;
CREATE TABLE IF NOT EXISTS `crocabulia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_crocabulia` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `crocabulia_cpt`
--

DROP TABLE IF EXISTS `crocabulia_cpt`;
CREATE TABLE IF NOT EXISTS `crocabulia_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_crocabulia` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `echo`
--

DROP TABLE IF EXISTS `echo`;
CREATE TABLE IF NOT EXISTS `echo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_echo` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `echo_cpt`
--

DROP TABLE IF EXISTS `echo_cpt`;
CREATE TABLE IF NOT EXISTS `echo_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_echo` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `furye`
--

DROP TABLE IF EXISTS `furye`;
CREATE TABLE IF NOT EXISTS `furye` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_furye` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `furye_cpt`
--

DROP TABLE IF EXISTS `furye_cpt`;
CREATE TABLE IF NOT EXISTS `furye_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_furye` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ilyzaelle`
--

DROP TABLE IF EXISTS `ilyzaelle`;
CREATE TABLE IF NOT EXISTS `ilyzaelle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_ilyzaelle` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ilyzaelle_cpt`
--

DROP TABLE IF EXISTS `ilyzaelle_cpt`;
CREATE TABLE IF NOT EXISTS `ilyzaelle_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ilyzaelle` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `julith`
--

DROP TABLE IF EXISTS `julith`;
CREATE TABLE IF NOT EXISTS `julith` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_julith` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `julith_cpt`
--

DROP TABLE IF EXISTS `julith_cpt`;
CREATE TABLE IF NOT EXISTS `julith_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_julith` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `serveur` varchar(255) DEFAULT NULL,
  `photo` varchar(200) NOT NULL DEFAULT 'null.png',
  `fond` varchar(200) DEFAULT NULL,
  `validation_totale` int(100) NOT NULL DEFAULT '0',
  `report_totale` int(100) NOT NULL DEFAULT '0',
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mdp`, `serveur`, `photo`, `fond`, `validation_totale`, `report_totale`, `date_inscription`) VALUES
(1, 'Lampadaire', 'abe69765e701f25195cb17989da92a81', 'Nidas', '1.png', 'FecaM.jpg', 20, 6, '2019-02-05 14:48:13'),
(2, 'Zetrox', 'a899fc1b2db6eec48675fb1db13bb4e4', 'Nidas', 'null.png', 'SramM.jpg', 7, 2, '2019-06-15 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `meriana`
--

DROP TABLE IF EXISTS `meriana`;
CREATE TABLE IF NOT EXISTS `meriana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_meriana` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `meriana_cpt`
--

DROP TABLE IF EXISTS `meriana_cpt`;
CREATE TABLE IF NOT EXISTS `meriana_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_meriana` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `merkator`
--

DROP TABLE IF EXISTS `merkator`;
CREATE TABLE IF NOT EXISTS `merkator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_merkator` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `merkator_cpt`
--

DROP TABLE IF EXISTS `merkator_cpt`;
CREATE TABLE IF NOT EXISTS `merkator_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_merkator` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_nidas` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `nidas_cpt`
--

DROP TABLE IF EXISTS `nidas_cpt`;
CREATE TABLE IF NOT EXISTS `nidas_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_nidas` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ombre`
--

DROP TABLE IF EXISTS `ombre`;
CREATE TABLE IF NOT EXISTS `ombre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_ombre` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ombre_cpt`
--

DROP TABLE IF EXISTS `ombre_cpt`;
CREATE TABLE IF NOT EXISTS `ombre_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ombre` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `oto_mustam`
--

DROP TABLE IF EXISTS `oto_mustam`;
CREATE TABLE IF NOT EXISTS `oto_mustam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_oto_mustam` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `oto_mustam_cpt`
--

DROP TABLE IF EXISTS `oto_mustam_cpt`;
CREATE TABLE IF NOT EXISTS `oto_mustam_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_oto_mustam` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pandore`
--

DROP TABLE IF EXISTS `pandore`;
CREATE TABLE IF NOT EXISTS `pandore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_pandore` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pandore_cpt`
--

DROP TABLE IF EXISTS `pandore_cpt`;
CREATE TABLE IF NOT EXISTS `pandore_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pandore` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rubilax`
--

DROP TABLE IF EXISTS `rubilax`;
CREATE TABLE IF NOT EXISTS `rubilax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_rubalix` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rubilax_cpt`
--

DROP TABLE IF EXISTS `rubilax_cpt`;
CREATE TABLE IF NOT EXISTS `rubilax_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rubalix` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ush`
--

DROP TABLE IF EXISTS `ush`;
CREATE TABLE IF NOT EXISTS `ush` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portail` varchar(255) NOT NULL,
  `positionX` int(11) DEFAULT NULL,
  `positionY` int(11) DEFAULT NULL,
  `utilisation` int(11) NOT NULL,
  `modificateur` varchar(255) DEFAULT NULL,
  `id_membre` int(11) NOT NULL,
  `temps` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_membre_ush` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ush_cpt`
--

DROP TABLE IF EXISTS `ush_cpt`;
CREATE TABLE IF NOT EXISTS `ush_cpt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pos` int(100) NOT NULL,
  `id_membre` int(100) NOT NULL,
  `validation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ush` (`id_pos`),
  KEY `id_membre` (`id_membre`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agride`
--
ALTER TABLE `agride`
  ADD CONSTRAINT `id_portail_agride` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `agride_cpt`
--
ALTER TABLE `agride_cpt`
  ADD CONSTRAINT `id_agride` FOREIGN KEY (`id_pos`) REFERENCES `agride` (`id`),
  ADD CONSTRAINT `id_membre_agride` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `atcham`
--
ALTER TABLE `atcham`
  ADD CONSTRAINT `id_portail_atcham` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `atcham_cpt`
--
ALTER TABLE `atcham_cpt`
  ADD CONSTRAINT `id_atcham` FOREIGN KEY (`id_pos`) REFERENCES `atcham` (`id`),
  ADD CONSTRAINT `id_membre_atcham` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `brumen`
--
ALTER TABLE `brumen`
  ADD CONSTRAINT `id_portail_brumen` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `brumen_cpt`
--
ALTER TABLE `brumen_cpt`
  ADD CONSTRAINT `id_brumen` FOREIGN KEY (`id_pos`) REFERENCES `brumen` (`id`),
  ADD CONSTRAINT `id_membre_brumen` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `crocabulia`
--
ALTER TABLE `crocabulia`
  ADD CONSTRAINT `id_portail_crocabulia` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `crocabulia_cpt`
--
ALTER TABLE `crocabulia_cpt`
  ADD CONSTRAINT `id_crocabulia` FOREIGN KEY (`id_pos`) REFERENCES `crocabulia` (`id`),
  ADD CONSTRAINT `id_membre_crocabulia` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `echo`
--
ALTER TABLE `echo`
  ADD CONSTRAINT `id_portail_echo` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `echo_cpt`
--
ALTER TABLE `echo_cpt`
  ADD CONSTRAINT `id_echo` FOREIGN KEY (`id_pos`) REFERENCES `echo` (`id`),
  ADD CONSTRAINT `id_membre_echo` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `furye`
--
ALTER TABLE `furye`
  ADD CONSTRAINT `id_portail_furye` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `furye_cpt`
--
ALTER TABLE `furye_cpt`
  ADD CONSTRAINT `id_furye` FOREIGN KEY (`id_pos`) REFERENCES `furye` (`id`),
  ADD CONSTRAINT `id_membre_furye` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `ilyzaelle`
--
ALTER TABLE `ilyzaelle`
  ADD CONSTRAINT `id_portail_ilyzaelle` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `ilyzaelle_cpt`
--
ALTER TABLE `ilyzaelle_cpt`
  ADD CONSTRAINT `id_ilyzaelle` FOREIGN KEY (`id_pos`) REFERENCES `ilyzaelle` (`id`),
  ADD CONSTRAINT `id_membre_ilyzaelle` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `julith`
--
ALTER TABLE `julith`
  ADD CONSTRAINT `id_portail_julith` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `julith_cpt`
--
ALTER TABLE `julith_cpt`
  ADD CONSTRAINT `id_julith` FOREIGN KEY (`id_pos`) REFERENCES `julith` (`id`),
  ADD CONSTRAINT `id_membre_julith` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `meriana`
--
ALTER TABLE `meriana`
  ADD CONSTRAINT `id_portail_meriana` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `meriana_cpt`
--
ALTER TABLE `meriana_cpt`
  ADD CONSTRAINT `id_membre_meriana` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`),
  ADD CONSTRAINT `id_meriana` FOREIGN KEY (`id_pos`) REFERENCES `meriana` (`id`);

--
-- Contraintes pour la table `merkator`
--
ALTER TABLE `merkator`
  ADD CONSTRAINT `id_portail_merkator` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `merkator_cpt`
--
ALTER TABLE `merkator_cpt`
  ADD CONSTRAINT `id_membre_merkator` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`),
  ADD CONSTRAINT `id_merkator` FOREIGN KEY (`id_pos`) REFERENCES `merkator` (`id`);

--
-- Contraintes pour la table `nidas`
--
ALTER TABLE `nidas`
  ADD CONSTRAINT `id_portail_nidas` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `nidas_cpt`
--
ALTER TABLE `nidas_cpt`
  ADD CONSTRAINT `id_membre_nidas` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`),
  ADD CONSTRAINT `id_nidas` FOREIGN KEY (`id_pos`) REFERENCES `nidas` (`id`);

--
-- Contraintes pour la table `ombre`
--
ALTER TABLE `ombre`
  ADD CONSTRAINT `id_portail_ombre` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `ombre_cpt`
--
ALTER TABLE `ombre_cpt`
  ADD CONSTRAINT `id_membre_ombre` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`),
  ADD CONSTRAINT `id_ombre` FOREIGN KEY (`id_pos`) REFERENCES `ombre` (`id`);

--
-- Contraintes pour la table `oto_mustam`
--
ALTER TABLE `oto_mustam`
  ADD CONSTRAINT `id_portail_oto_mustam` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `oto_mustam_cpt`
--
ALTER TABLE `oto_mustam_cpt`
  ADD CONSTRAINT `id_membre_oto_mustam` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`),
  ADD CONSTRAINT `id_oto_mustam` FOREIGN KEY (`id_pos`) REFERENCES `oto_mustam` (`id`);

--
-- Contraintes pour la table `pandore`
--
ALTER TABLE `pandore`
  ADD CONSTRAINT `id_portail_pandore` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `pandore_cpt`
--
ALTER TABLE `pandore_cpt`
  ADD CONSTRAINT `id_membre_pandore` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`),
  ADD CONSTRAINT `id_pandore` FOREIGN KEY (`id_pos`) REFERENCES `pandore` (`id`);

--
-- Contraintes pour la table `rubilax`
--
ALTER TABLE `rubilax`
  ADD CONSTRAINT `id_portail_rubalix` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `rubilax_cpt`
--
ALTER TABLE `rubilax_cpt`
  ADD CONSTRAINT `id_membre_rubalix` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`),
  ADD CONSTRAINT `id_rubalix` FOREIGN KEY (`id_pos`) REFERENCES `rubilax` (`id`);

--
-- Contraintes pour la table `ush`
--
ALTER TABLE `ush`
  ADD CONSTRAINT `id_portail_ush` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `ush_cpt`
--
ALTER TABLE `ush_cpt`
  ADD CONSTRAINT `id_membre_ush` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`),
  ADD CONSTRAINT `id_ush` FOREIGN KEY (`id_pos`) REFERENCES `ush` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
