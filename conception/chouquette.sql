-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 07 fév. 2020 à 10:13
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
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `date_ajout` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_image` (`id_image`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`ID`, `contenu`, `date_ajout`, `id_user`, `id_image`) VALUES
(15, 'trez erzter', '2020-02-06 08:12:42', 1, 36),
(16, 'tezr trez', '2020-02-06 08:12:55', 1, 36),
(17, 'rze rez', '2020-02-06 08:13:07', 1, 36),
(18, 'yyyy', '2020-02-06 08:13:58', 1, 36),
(19, 'try', '2020-02-06 08:14:34', 1, 36),
(20, 'uyut', '2020-02-06 08:15:18', 1, 36),
(21, 'u tu tr', '2020-02-06 08:25:18', 1, 36),
(22, 'treztze', '2020-02-06 08:29:30', 1, 36),
(23, 'trze rze', '2020-02-06 08:30:59', 1, 26),
(25, 'tezr rez', '2020-02-07 08:19:47', 1, 60),
(26, 'te erz', '2020-02-07 09:05:24', 1, 60);

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

DROP TABLE IF EXISTS `fichier`;
CREATE TABLE IF NOT EXISTS `fichier` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `lien_local` varchar(255) NOT NULL,
  `lien_url` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `lien_affichage` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fichier`
--

INSERT INTO `fichier` (`ID`, `nom`, `lien_local`, `lien_url`, `statut`, `date_ajout`, `id_user`, `lien_affichage`) VALUES
(20, 't zre zeqf ', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-05 19:34:44', NULL, 'librairies/uploads/16303_n.jpg'),
(22, 'titoutou Ã  la plage', 'librairies/uploads/20190215_123012.jpg', '1170344a9d18651a6d2dfec1437d8451', 'public', '2020-02-05 19:37:15', 1, 'librairies/uploads/20190215_123012.jpg'),
(24, 'titoutou et son nonos', 'librairies/uploads/20190101_135934.jpg', 'e8adfeac60417b2ec2583277c690feaf', 'public', '2020-02-05 19:39:08', 1, 'librairies/uploads/20190101_135934.jpg'),
(25, 'minion', 'librairies/uploads/13583_610157079096925_9126488467496572848_n.jpg', 'a4c20fcd189c33550b77c6a994c083c8', 'public', '2020-02-05 19:43:42', 1, 'librairies/uploads/13583_610157079096925_9126488467496572848_n.jpg'),
(26, 'loup', 'librairies/uploads/5758da87.jpg', '7a2c859e708b87c52528eba3d09cd582', 'public', '2020-02-05 19:46:05', 1, 'librairies/uploads/5758da87.jpg'),
(27, 'hate monday', 'librairies/uploads/garfield_monday-513.jpg', '4bafe986b5f2b647678697e4c5777311', 'public', '2020-02-05 19:46:41', 1, 'librairies/uploads/garfield_monday-513.jpg'),
(28, 'bonne nuit', 'librairies/uploads/renard-blanc-162211b6c.jpg', '9119157fa74e5bd1358a02dba6f4628e', 'public', '2020-02-05 19:47:27', 1, 'librairies/uploads/renard-blanc-162211b6c.jpg'),
(29, 'affiche', 'librairies/uploads/affiche-renard.pdf', 'd9383d89cbe51477cb8992368627c839', 'public', '2020-02-05 19:48:06', 1, 'librairies/uploads/typePDF.png'),
(30, 'hÃ© salut', 'librairies/uploads/20190215_123153.jpg', '25c7e0c21b784e99fa9e6f081f89230f', 'public', '2020-02-05 19:48:25', 1, 'librairies/uploads/20190215_123153.jpg'),
(31, 'je suis un mouton', 'librairies/uploads/20190401_173432.jpg', '99545f277d046dfd042c832c1b63d7fd', 'public', '2020-02-05 19:49:30', 1, 'librairies/uploads/20190401_173432.jpg'),
(32, 'je suis tout petit', 'librairies/uploads/20171006_132110.jpg', '4f2db5acc83a39c7c752624293730c99', 'public', '2020-02-05 19:50:36', 1, 'librairies/uploads/20171006_132110.jpg'),
(33, 'titoutou fait sa crise d\'ado', 'librairies/uploads/20171123_153638.jpg', '3500ce0a03e630b711fdddc8fc4b26fb', 'public', '2020-02-05 19:51:14', 1, 'librairies/uploads/20171123_153638.jpg'),
(34, 'je suis une lampe', 'librairies/uploads/20180122_183216.jpg', '6ced8a9d615ae7d8bf1cb84a741732dc', 'public', '2020-02-05 19:51:51', 1, 'librairies/uploads/20180122_183216.jpg'),
(35, 'je suis fluffy', 'librairies/uploads/IMG-20180829-WA0001.jpg', 'd796cc952bd942c174302ea9022ceb17', 'public', '2020-02-05 19:52:24', 1, 'librairies/uploads/IMG-20180829-WA0001.jpg'),
(36, 'pink fluffy unicorn', 'librairies/uploads/maxresdefault.jpg', '4f55fe96b15644f268eddfebffc62066', 'public', '2020-02-05 19:56:08', 1, 'librairies/uploads/maxresdefault.jpg'),
(37, 'ponyyy', 'librairies/uploads/My-Little-Pony.jpg', '9ed0f7d08cfa696a21a5687af80ed416', 'public', '2020-02-05 19:56:19', 1, 'librairies/uploads/My-Little-Pony.jpg'),
(38, 'avis recherche licorne', 'librairies/uploads/baceda108b93eaa7a6984dd1b68596f4.jpg', '04646b0087465ba05b02fa36d6445f8a', 'public', '2020-02-05 19:56:34', 1, 'librairies/uploads/baceda108b93eaa7a6984dd1b68596f4.jpg'),
(39, 'pioupiou', 'librairies/uploads/Baby_Tigers.jpg', '493299810cd9fdc4c3be589129b09f1d', 'prive', '2020-02-05 20:27:18', 1, 'librairies/uploads/Baby_Tigers.jpg'),
(40, 'trez', 'librairies/uploads/sparky.jpg', '8a853d368266fa28eca3f213733cefa7', 'public', '2020-02-06 09:54:04', 1, 'librairies/uploads/sparky.jpg'),
(41, 'reare', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-06 10:47:00', 1, 'librairies/uploads/16303_n.jpg'),
(42, 'reare', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-06 10:47:15', 1, 'librairies/uploads/16303_n.jpg'),
(43, 'reare', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-06 10:51:42', 1, 'librairies/uploads/16303_n.jpg'),
(44, 'reare', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-06 10:52:54', 1, 'librairies/uploads/16303_n.jpg'),
(45, 'reare', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-06 10:53:12', 1, 'librairies/uploads/16303_n.jpg'),
(46, 'tsettag', 'librairies/uploads/louveteau.jpg', 'c952a8cd8d01c21e84c2ab733d51c26a', 'public', '2020-02-06 10:53:58', 1, 'librairies/uploads/louveteau.jpg'),
(47, 'test2', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-06 11:02:27', 1, 'librairies/uploads/16303_n.jpg'),
(48, 'test2', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-06 11:03:31', 1, 'librairies/uploads/16303_n.jpg'),
(49, 'test2', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-06 11:03:56', 1, 'librairies/uploads/16303_n.jpg'),
(50, 'test2', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-06 11:06:05', 1, 'librairies/uploads/16303_n.jpg'),
(51, 'test2', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-06 11:06:51', 1, 'librairies/uploads/16303_n.jpg'),
(52, 'test2', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-06 11:08:39', 1, 'librairies/uploads/16303_n.jpg'),
(53, 'test3', 'librairies/uploads/sparky.jpg', '8a853d368266fa28eca3f213733cefa7', 'public', '2020-02-06 11:09:33', 1, 'librairies/uploads/sparky.jpg'),
(54, 'test4', 'librairies/uploads/13583_610157079096925_9126488467496572848_n.jpg', 'a4c20fcd189c33550b77c6a994c083c8', 'public', '2020-02-06 11:11:31', 1, 'librairies/uploads/13583_610157079096925_9126488467496572848_n.jpg'),
(55, 'test5', 'librairies/uploads/sparky.jpg', '8a853d368266fa28eca3f213733cefa7', 'public', '2020-02-06 11:13:33', 1, 'librairies/uploads/sparky.jpg'),
(56, 'test5bis', 'librairies/uploads/baceda108b93eaa7a6984dd1b68596f4.jpg', '04646b0087465ba05b02fa36d6445f8a', 'public', '2020-02-06 11:14:21', 1, 'librairies/uploads/baceda108b93eaa7a6984dd1b68596f4.jpg'),
(57, 'test6', 'librairies/uploads/maxresdefault.jpg', '4f55fe96b15644f268eddfebffc62066', 'public', '2020-02-06 11:18:25', 1, 'librairies/uploads/maxresdefault.jpg'),
(58, 'Ã©Ã©Ã©', 'librairies/uploads/fond-ecran-1393-loups.jpg', '0ab1de12980b1905ab6b55f7c972598a', 'public', '2020-02-06 11:18:59', 1, 'librairies/uploads/fond-ecran-1393-loups.jpg'),
(60, 'testtre', 'librairies/uploads/16303_n.jpg', 'd4f1ffa7e23612c65ef751c4a83f052e', 'public', '2020-02-06 15:54:06', 1, 'librairies/uploads/16303_n.jpg'),
(62, 'bidule', 'librairies/uploads/13583_610157079096925_9126488467496572848_n.jpg', 'a4c20fcd189c33550b77c6a994c083c8', 'public', '2020-02-07 10:09:19', NULL, 'librairies/uploads/13583_610157079096925_9126488467496572848_n.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`ID`, `nom`) VALUES
(5, '#loup'),
(6, '#mignon'),
(7, '#poney'),
(9, '#jaune'),
(12, '#truc'),
(13, '#machin'),
(16, '#mimi'),
(19, '#wouf'),
(20, '#woufy'),
(21, '#licorne'),
(22, '#whoufy'),
(24, '%23licorne'),
(25, '%23fluffy'),
(26, '%23fluff'),
(27, '%23teru+'),
(28, '%23tzertrze'),
(29, '%23terz'),
(30, '%23tzterz'),
(31, '%23tyzerf'),
(32, '%23tzersd'),
(33, '%23tzerd'),
(34, '%23trezsd'),
(35, '%23r%22%27%22'),
(36, '%23%28%27%22%C3%A9'),
(37, '%23-%28%27r'),
(38, '%23mignon'),
(39, '%23jaune'),
(40, '%23noeil');

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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tag_fichier`
--

INSERT INTO `tag_fichier` (`ID`, `id_tag`, `id_fichier`) VALUES
(44, 24, 57),
(45, 25, 57),
(46, 25, 57),
(47, 26, 57),
(51, 30, 60),
(52, 31, 60),
(53, 32, 60),
(54, 33, 60),
(55, 34, 60),
(59, 38, 62),
(60, 39, 62),
(61, 40, 62);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `mail`, `pseudo`, `password`) VALUES
(1, 'amandine@amandine.fr', 'amandine', '$2y$10$Q7xMSiY/tKjL0UZH0HZWme8WiLLYlakhQdg2trXSQV6t4SEtZNHiK'),
(2, 'test@test.t', 'test', '$2y$10$biCHgUhyvxHQtx32A/YVQ.tOYIJeakpzNvVHDqmlQAbZH6HGmuYnm');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `vote` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_image` (`id_image`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`ID`, `vote`, `id_user`, `id_image`) VALUES
(56, -1, 1, 34),
(57, 1, 1, 28),
(58, -1, 1, 39),
(59, 1, 1, 38),
(60, 1, 1, 37),
(61, 1, 1, 36),
(62, 1, 1, 35),
(63, -1, 1, 33),
(64, 1, 1, 45),
(65, 1, 1, 60),
(66, 1, 1, 52);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `id_image` FOREIGN KEY (`id_image`) REFERENCES `fichier` (`ID`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`);

--
-- Contraintes pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD CONSTRAINT `fichier_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`);

--
-- Contraintes pour la table `tag_fichier`
--
ALTER TABLE `tag_fichier`
  ADD CONSTRAINT `id_fichier` FOREIGN KEY (`id_fichier`) REFERENCES `fichier` (`ID`),
  ADD CONSTRAINT `id_tag` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`ID`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`id_image`) REFERENCES `fichier` (`ID`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
