-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 mars 2023 à 19:46
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `phoenix_2023`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `ID_PAYEMENT` varchar(25) NOT NULL,
  `ID_USER` varchar(25) NOT NULL,
  `NUM_CARTE` int(11) DEFAULT NULL,
  `ADRESSE_FACTURATION` varchar(255) DEFAULT NULL,
  `TELEPHONE` int(11) DEFAULT NULL,
  `CONDITION_USE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`ID_PAYEMENT`, `ID_USER`, `NUM_CARTE`, `ADRESSE_FACTURATION`, `TELEPHONE`, `CONDITION_USE`) VALUES
('1', '641827a8d0ca4', 2, 'paris dakar', 2, 1),
('642540fa8bd7a', '641827a8d0ca4', 2, 'paris dakar', 1234, 1),
('642541128d975', '641827a8d0ca4', 2, 'paris dakar', 2, 1),
('6425c53c5edb9', '6425c14eb6433', 2147483647, '5634563', 697896836, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `ID_VOYAGE` varchar(25) NOT NULL,
  `ID_PAYEMENT` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`ID_VOYAGE`, `ID_PAYEMENT`) VALUES
('4', '6425c53c5edb9');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_user` varchar(25) NOT NULL,
  `id_reservation` varchar(20) NOT NULL,
  `email_voyage` varchar(255) NOT NULL,
  `semaine` int(11) NOT NULL,
  `participant` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `nom_commande` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `ID_TAG` varchar(25) NOT NULL,
  `LIBELLE_TAG` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`ID_TAG`, `LIBELLE_TAG`) VALUES
('6', 'A prix tout doux'),
('7', 'All'),
('3', 'Croisière'),
('2', 'Montagne'),
('1', 'Plage'),
('5', 'Urbaine'),
('4', 'Vos vacances de rêve');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `ID_VOYAGE` varchar(25) NOT NULL,
  `TAG_VOYAGE` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`ID_VOYAGE`, `TAG_VOYAGE`) VALUES
('1', 'Plage'),
('1', 'Plage'),
('2', 'Plage'),
('3', 'Plage'),
('3', 'Plage'),
('4', 'Plage'),
('3', 'Plage'),
('4', 'Plage'),
('5', 'Plage'),
('6', 'Plage');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_USER` varchar(25) NOT NULL,
  `EMAIL_USER` varchar(100) DEFAULT NULL,
  `PASSWORD_USER` varchar(100) DEFAULT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_USER`, `EMAIL_USER`, `PASSWORD_USER`, `Admin`) VALUES
('641827a8d0ca4', 'Quentin.cheron26200@gmail.com', '$2y$10$l6TaoDUH3O1RxQZeAYTcO.lCHc6TqvYtM6lddl6KsGZfh5ryllJeG', 1),
('6425c14eb6433', 'lmoinel@edenschool.fr', '$2y$10$UGcYG4oQcytiGNlVNiY.a.Rrl66mM5z5CsiBBTD3w03y9whmgxW5i', 1),
('6425cabf168cb', 'orollet@edenschool.fr', '$2y$10$KzYLaEknuaTTOM44FhvVSeZN.hDKbI0/G5bNea5cchMMw1WNa9Iey', 1);

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE `voyage` (
  `ID_VOYAGE` varchar(25) NOT NULL,
  `LIBELLE_VOYAGE` varchar(50) DEFAULT NULL,
  `DESC_VOYAGE` longtext DEFAULT NULL,
  `PRIX_VOYAGE` int(11) DEFAULT NULL,
  `IMAGE_VOYAGE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `voyage`
--

INSERT INTO `voyage` (`ID_VOYAGE`, `LIBELLE_VOYAGE`, `DESC_VOYAGE`, `PRIX_VOYAGE`, `IMAGE_VOYAGE`) VALUES
('1', '1', 'Après les eaux calmes, partez à la découverte des spectaculaire cascades des gorges de la Falaise, à Trinité', 750, 'caraibes_martinique_boucaniers.jpg'),
('10', '2', 'Au coeur de l\'Ile, un swig au golf l\'adrénaline du trapèze volant ou la beauté des fons marins ... que choisir ?', 620, 'maurice_albion.jpg'),
('11', '3', 'Ile-jardin posée sur des eaux turquises, découvrez le paradis au coeur de l\'archipel des Maldives.', 925, 'maldives_kani.jpg'),
('12', '4', 'L\'île d\'Eubée est un oasis entre mer et oliviers ... plongez dans les eaux azures de la mer Egée ... en ski nautique', 835, 'grece_gregolimano.jpg'),
('13', '5', 'Bienvenue au pays de l\'Etna où ruelles escarpées et places en fleur s\'ouvrent sur la Méditerranée !', 830, 'sicile_kamarina.jpg'),
('14', '6', 'Instants inoubliables sur une île privative où luxe et charme naturel des Maldives s\'équilibrent à merveille.', 640, 'maldives_fino.jpg'),
('15', '7', 'Au coeur de l\'Ile, un swig au golf l\'adrénaline du trapèze volant ou la beauté des fons marins ... que choisir ?', 620, 'maurice_albion.jpg'),
('16', '8', 'Ile-jardin posée sur des eaux turquises, découvrez le paradis au coeur de l\'archipel des Maldives.', 925, 'maldives_kani.jpg'),
('17', '9', 'L\'île d\'Eubée est un oasis entre mer et oliviers ... plongez dans les eaux azures de la mer Egée ... en ski nautique', 835, 'grece_gregolimano.jpg'),
('19', 'Les 10', 'Après les eaux calmes, partez à la découverte des spectaculaire cascades des gorges de la Falaise, à Trinité', 750, 'caraibes_martinique_boucaniers.jpg'),
('2', '11', 'Bienvenue au pays de l\'Etna où ruelles escarpées et places en fleur s\'ouvrent sur la Méditerranée !', 830, 'sicile_kamarina.jpg'),
('3', '12', 'Instants inoubliables sur une île privative où luxe et charme naturel des Maldives s\'équilibrent à merveille.', 640, 'maldives_fino.jpg'),
('4', 'Albion 12', 'Au coeur de l\'Ile, un swig au golf l\'adrénaline du trapèze volant ou la beauté des fons marins ... que choisir ?', 620, 'maurice_albion.jpg'),
('5', '13', 'Ile-jardin posée sur des eaux turquises, découvrez le paradis au coeur de l\'archipel des Maldives.', 925, 'maldives_kani.jpg'),
('6', '14', 'L\'île d\'Eubée est un oasis entre mer et oliviers ... plongez dans les eaux azures de la mer Egée ... en ski nautique', 835, 'grece_gregolimano.jpg'),
('64181cd3342df', 'Les Boucaniers', 'Après les eaux calmes, partez à la découverte des spectaculaire cascades des gorges de la Falaise, à Trinité', 750, 'caraibes_martinique_boucaniers.jpg'),
('64181dcb56538', 'Kamarina', 'Bienvenue au pays de l\'Etna où ruelles escarpées et places en fleur s\'ouvrent sur la Méditerranée !', 830, 'sicile_kamarina.jpg'),
('64181e3b145ab', 'Finahlu', 'Instants inoubliables sur une île privative où luxe et charme naturel des Maldives s\'équilibrent à merveille.', 640, 'maldives_fino.jpg'),
('64181e9d28540', 'Albion sauvage', 'Au coeur de l\'Ile, un swig au golf l\'adrénaline du trapèze volant ou la beauté des fons marins ... que choisir ?', 620, 'maurice_albion.jpg'),
('64181efaa5c09', 'Kani', 'Ile-jardin posée sur des eaux turquises, découvrez le paradis au coeur de l\'archipel des Maldives.', 925, 'maldives_kani.jpg'),
('64181f3f1821a', 'Gregolimano', 'L\'île d\'Eubée est un oasis entre mer et oliviers ... plongez dans les eaux azures de la mer Egée ... en ski nautique', 835, 'grece_gregolimano.jpg'),
('7', 'Les 15', 'Après les eaux calmes, partez à la découverte des spectaculaire cascades des gorges de la Falaise, à Trinité', 750, 'caraibes_martinique_boucaniers.jpg'),
('8', '19', 'Bienvenue au pays de l\'Etna où ruelles escarpées et places en fleur s\'ouvrent sur la Méditerranée !', 830, 'sicile_kamarina.jpg'),
('9', '16', 'Instants inoubliables sur une île privative où luxe et charme naturel des Maldives s\'équilibrent à merveille.', 640, 'maldives_fino.jpg'),
('e', 'e', 'Instants inoubliables sur une île privative où luxe et charme naturel des Maldives s\'équilibrent à merveille.', 800, 'maldives_fino.jpg'),
('f', 'f', 'f', NULL, 'maldives_fino.jpg'),
('g', 'g', 'g', NULL, 'maldives_fino.jpg'),
('j', 'j', 'j', NULL, 'maldives_fino.jpg'),
('n', 'n', 'n', NULL, 'maldives_fino.jpg'),
('rr', 'r', 'r', NULL, 'maldives_fino.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID_PAYEMENT`),
  ADD KEY `FK_COMMANDER` (`ID_USER`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`ID_VOYAGE`,`ID_PAYEMENT`),
  ADD KEY `FK_CONTENIR` (`ID_PAYEMENT`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`ID_TAG`),
  ADD KEY `LIBELLE_TAG` (`LIBELLE_TAG`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD KEY `ID_VOYAGE` (`ID_VOYAGE`),
  ADD KEY `TAG_VOYAGE` (`TAG_VOYAGE`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Index pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`ID_VOYAGE`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_COMMANDER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `FK_CONTENIR` FOREIGN KEY (`ID_PAYEMENT`) REFERENCES `commande` (`ID_PAYEMENT`),
  ADD CONSTRAINT `FK_CONTENIR2` FOREIGN KEY (`ID_VOYAGE`) REFERENCES `voyage` (`ID_VOYAGE`);

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`ID_VOYAGE`) REFERENCES `voyage` (`ID_VOYAGE`),
  ADD CONSTRAINT `type_ibfk_2` FOREIGN KEY (`TAG_VOYAGE`) REFERENCES `tag` (`LIBELLE_TAG`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
