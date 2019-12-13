-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 10 déc. 2019 à 15:21
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reservationsalles`
--
CREATE DATABASE IF NOT EXISTS `reservationsalles` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reservationsalles`;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(1, 'test', 'testestest', '2019-12-13 11:00:00', '2019-12-13 13:00:00', 1),
(2, 'greg party', 'la fete a gregou', '2019-12-10 22:00:00', '2019-12-10 00:00:00', 1),
(3, 'test', 'testestest', '2019-12-12 12:00:00', '2019-12-12 15:00:00', 1),
(4, 'test date anterieur', 'test date anterieur', '2019-10-12 00:00:00', '2109-10-12 05:00:00', 1),
(5, 'test heure anterieur', 'test heure anterieur', '2019-10-12 06:00:00', '2019-10-12 09:00:00', 1),
(6, 'test deja resa', 'test deja resa', '2019-12-13 12:00:00', '2019-12-14 13:00:00', 1),
(7, 'test deja resa', 'test deja resa', '2019-12-13 12:00:00', '2019-12-14 13:00:00', 1),
(8, 'test deja resa', 'test deja resa', '2019-10-13 12:00:00', '2019-10-13 13:00:00', 1),
(9, 'test deja resa', 'test deja resa', '2019-10-13 12:00:00', '2019-10-13 13:00:00', 1),
(10, 'NICO PARTY', 'LA FETE A NICO', '2019-12-24 05:00:00', '2019-12-24 13:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$12$yVx17MTPkbi4QCNmmw9J/esjkw4TY32kng684FTfDaODlN1iqaGfe');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
