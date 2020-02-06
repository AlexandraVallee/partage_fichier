-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 06 fév. 2020 à 14:47
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chouquette`
--

-- --------------------------------------------------------

--
-- Structure de la table `tag_fichier`
--

DROP TABLE IF EXISTS `tag_fichier`;
CREATE TABLE IF NOT EXISTS `tag_fichier` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `id_tag` int(11) NOT NULL,
  `id_fichier` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_fichier` (`id_fichier`),
  KEY `id_tag` (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tag_fichier`
--

INSERT INTO `tag_fichier` (`ID`, `id_tag`, `id_fichier`) VALUES
(44, 24, 57),
(45, 25, 57),
(46, 25, 57),
(47, 26, 57);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tag_fichier`
--
ALTER TABLE `tag_fichier`
  ADD CONSTRAINT `id_fichier` FOREIGN KEY (`id_fichier`) REFERENCES `fichier` (`ID`),
  ADD CONSTRAINT `id_tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
