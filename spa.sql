-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 27 jan. 2024 à 14:44
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
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id_animal`, `nom`, `age`, `taille`, `poid`, `handicape`, `dateArrivee`, `id_spa`, `id_type`) VALUES
(92, 'Hubert', 14, '120', '8.0', 1, '2023-12-22', 16, 16),
(91, 'Rupert', 10, '70', '8.0', 0, '2023-12-22', 16, 16),
(94, 'Magic wizard', 5, '120', '6.0', 1, '2024-01-27', 16, 16);

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sousTitre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contenu` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dateCreation` datetime NOT NULL,
  `dateModification` datetime DEFAULT NULL,
  PRIMARY KEY (`id_blog`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`id_blog`, `titre`, `sousTitre`, `contenu`, `image`, `dateCreation`, `dateModification`) VALUES
(11, 'La triste réalité de l\'abandon des animaux en France', 'En France, la question de l\'abandon des animaux de compagnie demeure un problème majeur.', 'En France, la question de l\'**abandon** des animaux de compagnie demeure un problème **majeur**. Selon les dernières statistiques, le nombre d\'animaux **abandonnés** chaque année atteint des chiffres **alarmants**. Cette problématique souligne l\'**urgence** d\'une meilleure **sensibilisation** et de mesures concrètes pour protéger nos amis à quatre pattes, notamment ceux qui sont **âgés** ou **handicapés**. /\r\n\r\nEn France, environ 100 000 animaux sont **abandonnés** chaque année, selon les rapports de la Société Protectrice des Animaux (SPA). Parmi ces animaux, une proportion **notable** concerne des animaux plus **âgés** ou présentant des **handicaps**, rendant leur prise en charge plus délicate. Les raisons **principales** de ces **abandons** sont souvent liées à des problèmes **économiques**, des **déménagements**, ou encore des difficultés à assumer les besoins spécifiques de ces compagnons **particuliers**. /\r\n\r\nLa SPA et d\'autres organisations dévouées travaillent sans **relâche** pour sensibiliser le public, offrir des solutions d\'**adoption** responsable et promouvoir la **stérilisation** pour limiter la **surpopulation** animale. En tant que SPA spécialisée dans les animaux **âgés** et **handicapés**, notre **engagement** se renforce pour offrir une seconde chance à ces compagnons **vulnérables** et les aider à trouver des foyers **aimants**. /\r\n\r\nNotre SPA se consacre spécifiquement aux animaux **âgés** et **handicapés**, offrant un refuge, des soins **spécialisés** et des programmes d\'**adoption** adaptés. Pour en savoir plus sur notre **engagement** et sur la façon dont vous pouvez soutenir notre cause, explorez notre site et découvrez nos pensionnaires en attente d\'**adoption**.', '65b5161761e15.png', '2023-12-22 15:25:55', '2024-01-27 15:41:27'),
(10, 'L\'adoption d\'animaux en fin de vie : un acte de compassion', 'L\'adoption des animaux en fin de vie est un acte d\'une immense générosité.', 'L\'**adoption** des animaux en fin de vie est un acte d\'une immense **générosité**. Ces compagnons, souvent **délaissés** en raison de leur **âge avancé** ou de problèmes de santé, méritent une fin de vie **digne** et **aimante**. Au sein de notre SPA spécialisée, nous croyons **fermement** en l\'importance de cette démarche et de l\'impact positif qu\'elle peut avoir sur ces animaux. /\r\n\r\nEnviron 30% des animaux accueillis dans les refuges sont des **seniors** ou des animaux en fin de vie, d\'après les données recueillies par diverses organisations de protection animale. Malheureusement, ces animaux ont moins de chances d\'être **adoptés** en raison de **préjugés** sur leur âge ou leur état de santé. /\r\n\r\nAdopter un animal en fin de vie est une expérience **enrichissante**. Ces compagnons apportent une immense **gratitude** et un amour **inconditionnel** à ceux qui leur offrent un foyer aimant pour leurs derniers jours, semaines, ou années. Chaque moment passé avec eux est **précieux** et **significatif**. /\r\n\r\nNotre SPA se consacre spécifiquement à offrir une **seconde chance** aux animaux en fin de vie. Découvrez sur notre site nos programmes d\'adoption pour ces compagnons **spéciaux** et apprenez comment vous pouvez faire une **différence** dans la vie d\'un animal âgé ou handicapé en lui offrant un foyer aimant et sécurisé.', '65b516821a7b9.jpg', '2023-12-04 16:02:15', '2024-01-27 15:43:14');

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
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_image`, `uniqid_img`, `ordre`, `id_animal`) VALUES
(101, '65b5118b84809.jpg', 1, 92),
(100, '65b511dc87531.jpg', 1, 91),
(104, '65b51206281bb.jpg', 1, 94);

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `spa`
--

INSERT INTO `spa` (`id_spa`, `nom`, `localisation`) VALUES
(16, 'SPA 57', 'Mulhouse'),
(18, 'SPA 58', 'Colmar');

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
