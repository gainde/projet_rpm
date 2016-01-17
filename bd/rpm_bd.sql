-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 17 Janvier 2016 à 20:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bysol958_rpm`
--
CREATE DATABASE IF NOT EXISTS `bysol958_rpm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bysol958_rpm`;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rue` varchar(50) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `numero` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Vider la table avant d'insérer `adresse`
--

TRUNCATE TABLE `adresse`;
--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`id`, `rue`, `code_postal`, `ville`, `province`, `pays`, `numero`) VALUES
(8, 'saint real', 'h3m2y8', 'Montreal', 'quebec', 'canada', '11786');

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_service` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` varchar(260) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_service` (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Vider la table avant d'insérer `domaine`
--

TRUNCATE TABLE `domaine`;
--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`id`, `id_service`, `titre`, `description`) VALUES
(1, 1, 'Génie Civil', NULL),
(2, 1, 'Génie Logiciel', NULL),
(3, 1, 'Génie Informatique', NULL),
(4, 1, 'Génie Mécanique', NULL),
(5, 1, 'Génie Électrique', NULL),
(6, 2, 'Médecin', NULL),
(7, 2, 'Infirmière', NULL),
(8, 3, 'Analyste Financier', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_projet` int(11) NOT NULL,
  `date_debut` int(11) NOT NULL,
  `date_fin` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vider la table avant d'insérer `participants`
--

TRUNCATE TABLE `participants`;
-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_fin` date DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Vider la table avant d'insérer `projets`
--

TRUNCATE TABLE `projets`;
-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` varchar(260) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titre` (`titre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Vider la table avant d'insérer `service`
--

TRUNCATE TABLE `service`;
--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id`, `titre`, `description`) VALUES
(1, 'Ingénieurie', NULL),
(2, 'Santé', NULL),
(3, 'Finance', NULL),
(4, 'Social', NULL),
(5, 'Agriculture', NULL),
(6, 'Communication', NULL),
(7, 'Divers', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `adresse` int(5) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `profession` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Vider la table avant d'insérer `user`
--

TRUNCATE TABLE `user`;
--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `username`, `password`, `telephone`, `adresse`, `date_naissance`, `profession`, `email`, `is_admin`, `is_active`, `is_verified`, `date_creation`, `last_update`) VALUES
(1, 'thimbo', 'moussa', 'test', 'test123', '5142099999', 8, NULL, 'programmeur', 'moussa@adress.ca', 0, 0, 0, '2015-11-11 23:16:37', '2015-11-11 23:16:37');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD CONSTRAINT `domaine_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
