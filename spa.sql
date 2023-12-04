-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 03 déc. 2023 à 20:06
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spa`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `id_animal` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `taille` decimal(15,0) NOT NULL,
  `poid` decimal(15,1) NOT NULL,
  `handicape` tinyint NOT NULL,
  `dateArrivee` date NOT NULL,
  `id_spa` int NOT NULL,
  `id_type` int NOT NULL,
  PRIMARY KEY (`id_animal`),
  KEY `id_spa` (`id_spa`),
  KEY `id_type` (`id_type`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `sousTitre` text COLLATE utf8mb4_general_ci NOT NULL,
  `contenu` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateModification` datetime,
  PRIMARY KEY (`id_blog`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id_blog`, `titre`, `sousTitre`, `contenu`, `image`, `dateCreation`) VALUES
(8, 'L\'abandon des animaux', 'C\'est les abandons', 'Salut aujourd\'hui je vais vous présenter l\'abandon des / animaux /, ce n\'est pas bien en vrai non ? *\r\nje sais c\'est peut être con mais voilà, il faut / pas / abandonner les / animaux / ', 'default.jpg', '2023-12-03 20:42:16');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id_utilisateur` int NOT NULL,
  `id_animal` int NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_animal`),
  KEY `id_animal` (`id_animal`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id_image` int NOT NULL AUTO_INCREMENT,
  `uniqid_img` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ordre` int NOT NULL,
  `id_animal` int NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `id_animal` (`id_animal`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `spa`
--

DROP TABLE IF EXISTS `spa`;
CREATE TABLE IF NOT EXISTS `spa` (
  `id_spa` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `localisation` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_spa`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `spa`
--

INSERT INTO `spa` (`id_spa`, `nom`, `localisation`) VALUES
(16, 'SPA 57', 'Colmar');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `libelle`) VALUES
(16, 'Chien');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `motDePasse` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `localisation` varchar(254) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `pseudo`, `motDePasse`, `localisation`, `role`) VALUES
(6, 'admin', 'admin', 'admin', '$2y$10$cwK35L/bs3mbqaWzSzgzkev8CcqMyL3c/tNtqrwnc26bS/Qemv3tG', 'Mulhouse', 'ADMIN'),
(8, 'user', 'user', 'user', '$2y$10$fonFF7N.RMrMJttQhU.plO6rAwb3PcQk9N3YFzZ4jAuy10oBqylw6', 'Colmar', 'USER');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
