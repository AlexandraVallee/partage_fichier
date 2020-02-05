-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 05 fév. 2020 à 15:59
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

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

CREATE TABLE `commentaire` (
  `ID` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_ajout` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`ID`, `contenu`, `date_ajout`, `id_user`, `id_image`) VALUES
(1, 'super chouette si ça marche !!', '2020-02-05 09:00:00', 2, 28),
(2, 'super chouette si ça marche !!', '2020-02-05 09:00:00', 2, 28),
(3, 'jhgfds hgfds', '2020-02-05 11:05:17', 2, 25),
(4, 'itititi', '2020-02-05 11:11:21', 2, 25),
(5, 'pas de bol\r\n', '2020-02-05 11:15:03', 2, 25),
(6, 'toto', '2020-02-05 11:30:35', 2, 25),
(7, 'kjhgf', '2020-02-05 11:38:33', 2, 25),
(8, 'vbghn,k;l:', '2020-02-05 12:10:01', 2, 25),
(9, 'tugjv, ', '2020-02-05 12:16:17', 2, 24),
(10, 'sss', '2020-02-05 12:19:52', 2, 28),
(11, 'titi', '2020-02-05 12:27:11', 2, 28),
(12, 'jhhjt,gfvc', '2020-02-05 12:27:40', 2, 28),
(13, 'sdfghjk rfghjk fghjk', '2020-02-05 14:07:42', 2, 28),
(14, 'Ã©Ã $Ã¹Ã§', '2020-02-05 14:41:07', 2, 28);

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE `fichier` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `lien_local` varchar(255) NOT NULL,
  `lien_url` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `lien_affichage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fichier`
--

INSERT INTO `fichier` (`ID`, `nom`, `lien_local`, `lien_url`, `statut`, `date_ajout`, `id_user`, `lien_affichage`) VALUES
(19, 'MÃ©o', 'librairies/uploads/cover-r4x3w1000-5e26d520a83f6-cat-3134990-1920.jpg', 'ccb546be920c2bc6e24f1ca1e5ebf758', 'public', '2020-02-04 14:44:21', 2, ''),
(20, 'toto', 'librairies/uploads/chat-drole-113730.jpg', 'ed90383cd0cae1122fd0b36d9f4311d5', 'public', '2020-02-04 14:44:46', 2, ''),
(22, 'thomas', 'librairies/uploads/Chat-clone7.jpg', '817ed1ef789124502a746709bc3aadc7', 'public', '2020-02-04 14:47:06', 2, ''),
(23, 'je', 'librairies/uploads/chat.jpg', '4459127068028a2d2bd3a2034233e334', 'public', '2020-02-04 14:48:43', 2, ''),
(24, 'MÃ©o', 'librairies/uploads/7798364446un-chat-et-son-proprietaire-illustration.jpg', '4459127068028a2d2bd3a2034233e334', 'public', '2020-02-04 14:53:17', 2, ''),
(25, 'Lulu', 'librairies/uploads/hisoka__hunter_x_hunter__minimalist_wallpaper_by_greenmapple17_d8imij3-fullview.jpg', '883db50180e41068fb0a9ec4b64dfb9a', 'public', '2020-02-04 15:05:33', 2, ''),
(26, 'Lulu', 'librairies/uploads/2805205-anime-artwork-fantasy-art-clouds-sky___anime-wallpapers.jpg', 'bc6af6fa6da4b65ad7cfcc039a3e5410', 'public', '2020-02-04 15:06:10', 2, ''),
(27, 'dd', 'librairies/uploads/5052756-akiho-shinomoto-sakura-kinomoto.png', '1690b40d10b59e53be8910baab8ebcb5', 'prive', '2020-02-04 15:08:07', 2, ''),
(28, 'suzette', 'librairies/uploads/abstraitarbrefeuillebriselunesoleilnuit.jpg', 'd2907e9bef3fabebf6afb3f2d5ea5b56', 'public', '2020-02-04 16:44:12', 2, '');

-- --------------------------------------------------------

--
-- Structure de la table `likefile`
--

CREATE TABLE `likefile` (
  `ID` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `mail`, `pseudo`, `password`) VALUES
(1, 'amandine@amandine.fr', 'amandine', '$2y$10$Q7xMSiY/tKjL0UZH0HZWme8WiLLYlakhQdg2trXSQV6t4SEtZNHiK'),
(2, 'aa@aa.aa', 'Alex', '$2y$10$ZD9CDxLdp3o.Ld71dzg8R.5NiItgneDnWuPaBFWkUVOtKAERHmV9u');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `ID` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`ID`, `vote`, `id_user`, `id_image`) VALUES
(1, -1, 2, 25),
(2, 1, 2, 23);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_image` (`id_image`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `likefile`
--
ALTER TABLE `likefile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_image` (`id_image`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_image` (`id_image`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `fichier`
--
ALTER TABLE `fichier`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `likefile`
--
ALTER TABLE `likefile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_image`) REFERENCES `fichier` (`ID`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`);

--
-- Contraintes pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD CONSTRAINT `fichier_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`);

--
-- Contraintes pour la table `likefile`
--
ALTER TABLE `likefile`
  ADD CONSTRAINT `likefile_ibfk_1` FOREIGN KEY (`id_image`) REFERENCES `fichier` (`ID`),
  ADD CONSTRAINT `likefile_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`ID`);

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
