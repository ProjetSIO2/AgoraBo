-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 09 oct. 2019 à 10:39
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeux`
--
CREATE DATABASE IF NOT EXISTS `jeux` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jeux`;

-- --------------------------------------------------------

--
-- Structure de la table `animateurtournoi`
--

DROP TABLE IF EXISTS `animateurtournoi`;
CREATE TABLE IF NOT EXISTS `animateurtournoi` (
  `anneeTournoi` char(4) NOT NULL,
  `numTournoi` int(4) NOT NULL,
  `idPersonne` int(11) NOT NULL,
  PRIMARY KEY (`anneeTournoi`,`numTournoi`,`idPersonne`),
  KEY `fk_animateurTournoi_tournoi` (`anneeTournoi`,`numTournoi`) USING BTREE,
  KEY `fk_animateurTournoi_personne` (`idPersonne`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animateurtournoi`
--

INSERT INTO `animateurtournoi` (`anneeTournoi`, `numTournoi`, `idPersonne`) VALUES
('2018', 1, 1),
('2018', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `libCategorie` varchar(32) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libCategorie`) VALUES
(1, 'Junior'),
(2, 'Senior'),
(3, 'Master');

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
CREATE TABLE IF NOT EXISTS `equipement` (
  `refEquipement` char(5) NOT NULL,
  `libEquipement` varchar(40) NOT NULL,
  PRIMARY KEY (`refEquipement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`refEquipement`, `libEquipement`) VALUES
('2568', 'salle Vinci'),
('6212', 'salle info'),
('B1258', 'kit sono-micro'),
('E2856', 'grand écran blanc'),
('K458', 'kit sono-micro');

-- --------------------------------------------------------

--
-- Structure de la table `equipementtournoi`
--

DROP TABLE IF EXISTS `equipementtournoi`;
CREATE TABLE IF NOT EXISTS `equipementtournoi` (
  `anneeTournoi` char(4) NOT NULL,
  `numTournoi` int(4) NOT NULL,
  `refEquipement` char(5) NOT NULL,
  PRIMARY KEY (`anneeTournoi`,`numTournoi`,`refEquipement`),
  KEY `fk_equipementTournoi_tournoi` (`anneeTournoi`,`numTournoi`) USING BTREE,
  KEY `fk_equipementTournoi_equipement` (`refEquipement`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipementtournoi`
--

INSERT INTO `equipementtournoi` (`anneeTournoi`, `numTournoi`, `refEquipement`) VALUES
('2018', 1, '6212'),
('2018', 1, 'E2856');

-- --------------------------------------------------------

--
-- Structure de la table `format`
--

DROP TABLE IF EXISTS `format`;
CREATE TABLE IF NOT EXISTS `format` (
  `idFormat` int(11) NOT NULL AUTO_INCREMENT,
  `nomFormat` varchar(40) NOT NULL,
  `descFormat` varchar(400) NOT NULL,
  PRIMARY KEY (`idFormat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `format`
--

INSERT INTO `format` (`idFormat`, `nomFormat`, `descFormat`) VALUES
(1, 'Bracket', 'Le format Bracket est un tournoi avec arborescence qui peut être joué en élimination directe ou en double élimination, et au cours duquel deux joueurs ou deux équipes se rencontrent à chaque tour.\r\nÀ l\'issue de la rencontre, le gagnant passe au niveau suivant et son adversaire est soit définitivement éliminé, soit envoyé en looser bracket\r\n'),
(2, 'Round robin group', 'Chaque groupe affronte les autres groupes'),
(3, 'Système suisse', 'Selon ce système, les joueurs d\'un tournoi affrontent des joueurs ayant un rapport victoires/défaites équivalent au leur. Les joueurs n\'affrontent pas d\'adversaires qu\'ils ont déjà rencontrés.');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `idGenre` int(11) NOT NULL AUTO_INCREMENT,
  `libGenre` varchar(24) NOT NULL,
  `idGerant` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idGenre`),
  KEY `fk_genre_gerant` (`idGerant`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`idGenre`, `libGenre`, `idGerant`) VALUES
(1, 'Action', 1),
(2, 'Aventure', 2),
(3, 'Combat', 1),
(4, 'Course', 5),
(5, 'Gestion', 2),
(6, 'Jeu de rôle', 4),
(7, 'Ligue fantasy', 3),
(8, 'Réflexion', 1),
(9, 'Simulation', 2),
(10, 'Sport', 4),
(11, 'Simulation', 2),
(12, 'Sport', 4),
(13, 'Stratégie', 5),
(14, 'Porte-monstre-trésor', 1);

-- --------------------------------------------------------

--
-- Structure de la table `jeu_video`
--

DROP TABLE IF EXISTS `jeu_video`;
CREATE TABLE IF NOT EXISTS `jeu_video` (
  `refJeu` varchar(16) NOT NULL,
  `idPlateforme` int(11) DEFAULT NULL,
  `idPegi` int(11) DEFAULT NULL,
  `idGenre` int(11) DEFAULT NULL,
  `idMarque` int(11) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  `dateParution` date NOT NULL DEFAULT '2018-03-16',
  PRIMARY KEY (`refJeu`),
  KEY `fk_jeu_video_genre` (`idGenre`) USING BTREE,
  KEY `fk_jeu_video_pegi` (`idPegi`) USING BTREE,
  KEY `fk_jeu_video_marque` (`idMarque`) USING BTREE,
  KEY `fk_jeu_video_plateforme` (`idPlateforme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jeu_video`
--

INSERT INTO `jeu_video` (`refJeu`, `idPlateforme`, `idPegi`, `idGenre`, `idMarque`, `nom`, `prix`, `dateParution`) VALUES
('BF8763098765', 2, 3, 10, 2, 'FIFA 18 - Edition essentielles', '59.99', '2017-09-29'),
('CF47563837YG', 3, 1, 13, 8, 'Paddington : escapades à Londres', '18.30', '2015-06-19'),
('EG763547598RF', 3, 2, 6, 13, 'Pokémon X', '39.90', '2013-10-12'),
('ER493746Y78', 8, 5, 1, 3, 'Rise of the Tomb Raider', '19.90', '2015-11-13'),
('ER6753FG987', 3, 3, 2, 1, 'Minecraft Story Mode - L\'aventure Complète -', '39.89', '2016-12-16'),
('ES47562098754', 4, 2, 2, 13, 'The Legend of Zelda - The Wind Waker HD ', '29.80', '2016-04-15'),
('ET86987453T5', 7, 5, 1, 10, 'La terre de milieu : L\'Ombre de la Guerre', '59.90', '2017-10-10'),
('RT4958673II2', 4, 2, 2, 13, 'New Super Mario Bros.', '18.90', '2016-04-15'),
('TF98653JU8', 15, 3, 2, 1, 'Minecraft Story Mode - L\'aventure Complète -', '39.89', '2016-12-16'),
('U174645475GT', 2, 3, 10, 1, 'Gran Turismo 6', '21.50', '2013-06-12'),
('YT65487BJI', 3, 1, 2, 13, 'Mario Kart 7 ', '39.90', '2012-11-28');

-- --------------------------------------------------------

--
-- Structure de la table `journee`
--

DROP TABLE IF EXISTS `journee`;
CREATE TABLE IF NOT EXISTS `journee` (
  `anneeTournoi` char(4) NOT NULL,
  `numTournoi` int(4) NOT NULL,
  `dateJournee` date NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  PRIMARY KEY (`anneeTournoi`,`numTournoi`,`dateJournee`),
  KEY `fk_journee_tournoi` (`anneeTournoi`,`numTournoi`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `idMarque` int(11) NOT NULL AUTO_INCREMENT,
  `nomMarque` varchar(40) NOT NULL,
  PRIMARY KEY (`idMarque`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='Les marques des produits';

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`idMarque`, `nomMarque`) VALUES
(1, 'Sony'),
(2, 'Electronic arts'),
(3, 'Square Enix'),
(4, 'Konami'),
(5, 'Bandai Namco Entertainment'),
(6, 'Rockstar Games'),
(7, 'Séga'),
(8, 'Techland'),
(9, 'Ubisoft'),
(10, 'Warner Bros'),
(11, 'Bensimon'),
(12, 'Hori'),
(13, 'Nintendo'),
(15, 'Kid\'s Mania');

-- --------------------------------------------------------

--
-- Structure de la table `pegi`
--

DROP TABLE IF EXISTS `pegi`;
CREATE TABLE IF NOT EXISTS `pegi` (
  `idPegi` int(11) NOT NULL AUTO_INCREMENT,
  `ageLimite` int(11) NOT NULL,
  `descPegi` varchar(400) NOT NULL,
  PRIMARY KEY (`idPegi`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pegi`
--

INSERT INTO `pegi` (`idPegi`, `ageLimite`, `descPegi`) VALUES
(1, 3, '« adapté à toutes les classes d’âge ». En effet, il ne comporte pas de sons ou d’images susceptibles d’effrayer ou de faire peur à de jeunes enfants. Les formes de violence très modérées dans un contexte comique ou enfantin sont toutefois acceptées, mais le langage grossier n\'est pas autoris.'),
(2, 7, 'Déconseillé aux moins de 7 ans. Il contient des scènes ou sons potentiellement effrayants. La violence très modérée (c\'est-à-dire implicite, non détaillée ou non réaliste) est accepté.'),
(3, 12, 'Déconseillé aux moins de 12 ans. Il peut montrer « de la violence sous une forme plus graphique par rapport à des personnages imaginaires et/ou une violence non graphique envers des personnages à figure humaine ». Il peut également présenter des insinuations à caractère sexuel ou des postures de type sexuelles dans un cadre léger. Enfin, il peut aussi proposer des jeux de hasard.'),
(4, 16, 'Déconseillé aux moins de 16 ans. Contenus possibles : la violence et/ou la sexualité sont représentés de manière semblable à ce que l\'on pourrait retrouver dans la réalité. Le jeu peut ainsi contenir de la violence explicite, un mauvais langage, des références ou contenus à caractères sexuels, mais aussi des jeux de hasard ou l\'utilisation d\'alcool, tabac et drogue (forme d\'incitation).'),
(5, 18, '« destinée aux adultes ». Il peut contenir un degré de violence extrême avec une représentation de violence crue, de meurtre sans motivation, de violence contre des personnages sans défense ou de la discrimination. Il peut aussi glorifier la prise des drogues illégales et les contacts sexuels explicites ainsi que des jeux de hasard.');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `nomPersonne` varchar(32) NOT NULL,
  `prenomPersonne` varchar(20) NOT NULL,
  `mailPersonne` varchar(50) NOT NULL,
  `telPersonne` varchar(10) NOT NULL,
  `ruePersonne` varchar(36) NOT NULL,
  `villePersonne` varchar(30) NOT NULL,
  `CPPersonne` varchar(5) NOT NULL,
  PRIMARY KEY (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`idPersonne`, `nomPersonne`, `prenomPersonne`, `mailPersonne`, `telPersonne`, `ruePersonne`, `villePersonne`, `CPPersonne`) VALUES
(1, 'Dubois', 'Didier', 'dubois.didier@gmail.com', '0685451236', '48 rue des acacias', 'Metz', '57000'),
(2, 'Celon', 'Elodie', 'elodie35@gmail.com', '0689451235', '18 rue des Tilleuls', 'Metz', '57000'),
(3, 'Garance', 'Kevin', 'garance@gmail.com', '0678451236', '5 avenue Victor hugo', 'Metz', '57000'),
(4, 'Rabbit', 'Roger', 'roger.rabbit@hotmail.com', '0614568956', '45 Rue des Papillons', 'Agar', '45689'),
(5, 'Pan', 'Peter', 'peter.pan@hotmail.com', '0650467834', '1 Rue de l\'Arbre', 'Neverland', '34789');

-- --------------------------------------------------------

--
-- Structure de la table `plateforme`
--

DROP TABLE IF EXISTS `plateforme`;
CREATE TABLE IF NOT EXISTS `plateforme` (
  `idPlateforme` int(11) NOT NULL AUTO_INCREMENT,
  `libPlateforme` varchar(24) NOT NULL,
  `nbPlateformesDispo` int(11) NOT NULL,
  PRIMARY KEY (`idPlateforme`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `plateforme`
--

INSERT INTO `plateforme` (`idPlateforme`, `libPlateforme`, `nbPlateformesDispo`) VALUES
(1, 'PlayStation 4', 5),
(2, 'PlayStation 3', 3),
(3, 'Nintendo 3DS', 0),
(4, 'Nintendo Wii', 3),
(5, 'PC', 8),
(6, 'Sony PSP', 0),
(7, 'Xbox 360', 3),
(8, 'Xbox One', 4),
(9, 'Nintendo 2DS', 0),
(11, 'Nintendo DS', 0),
(13, 'Nintendo Switch', 1),
(15, 'Nintendo Wii U', 2),
(17, 'PlayStation Vita', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tournoi`
--

DROP TABLE IF EXISTS `tournoi`;
CREATE TABLE IF NOT EXISTS `tournoi` (
  `anneeTournoi` char(4) NOT NULL,
  `numTournoi` int(4) NOT NULL,
  `nomTournoi` varchar(40) NOT NULL,
  `nbParticipants` int(4) NOT NULL,
  `gain` varchar(50) NOT NULL,
  `refJeu` varchar(16) DEFAULT NULL,
  `idFormat` int(11) DEFAULT NULL,
  `idJuge` int(11) DEFAULT NULL,
  PRIMARY KEY (`anneeTournoi`,`numTournoi`),
  KEY `fk_tournoi_jeu_video` (`refJeu`) USING BTREE,
  KEY `fk_tournoi_format` (`idFormat`) USING BTREE,
  KEY `fk_tournoi_personne` (`idJuge`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tournoi`
--

INSERT INTO `tournoi` (`anneeTournoi`, `numTournoi`, `nomTournoi`, `nbParticipants`, `gain`, `refJeu`, `idFormat`, `idJuge`) VALUES
('2018', 1, 'Droit au but', 30, '10 places de cinéma', 'BF8763098765', 1, 3),
('2018', 2, 'History', 20, '100 € en bons d\'achats Cora', 'ES47562098754', 3, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animateurtournoi`
--
ALTER TABLE `animateurtournoi`
  ADD CONSTRAINT `fk_animateurTournoi_personne` FOREIGN KEY (`idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_animateurTournoi_tournoi` FOREIGN KEY (`anneeTournoi`,`numTournoi`) REFERENCES `tournoi` (`anneeTournoi`, `numTournoi`) ON DELETE CASCADE;

--
-- Contraintes pour la table `equipementtournoi`
--
ALTER TABLE `equipementtournoi`
  ADD CONSTRAINT `fk_equipementTournoi_equipement` FOREIGN KEY (`refEquipement`) REFERENCES `equipement` (`refEquipement`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_equipementTournoi_tournoi` FOREIGN KEY (`anneeTournoi`,`numTournoi`) REFERENCES `tournoi` (`anneeTournoi`, `numTournoi`) ON DELETE CASCADE;

--
-- Contraintes pour la table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `fk_genre_gerant` FOREIGN KEY (`idGerant`) REFERENCES `personne` (`idPersonne`);

--
-- Contraintes pour la table `jeu_video`
--
ALTER TABLE `jeu_video`
  ADD CONSTRAINT `fk_jeu_video_genre` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_jeu_video_marque` FOREIGN KEY (`idMarque`) REFERENCES `marque` (`idMarque`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_jeu_video_pegi` FOREIGN KEY (`idPegi`) REFERENCES `pegi` (`idPegi`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_jeu_video_plateforme` FOREIGN KEY (`idPlateforme`) REFERENCES `plateforme` (`idPlateforme`) ON DELETE SET NULL;

--
-- Contraintes pour la table `journee`
--
ALTER TABLE `journee`
  ADD CONSTRAINT `fk_journee_tournoi` FOREIGN KEY (`anneeTournoi`,`numTournoi`) REFERENCES `tournoi` (`anneeTournoi`, `numTournoi`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tournoi`
--
ALTER TABLE `tournoi`
  ADD CONSTRAINT `fk_tournoi_format` FOREIGN KEY (`idFormat`) REFERENCES `format` (`idFormat`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_tournoi_jeu_video` FOREIGN KEY (`refJeu`) REFERENCES `jeu_video` (`refJeu`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_tournoi_personne` FOREIGN KEY (`idJuge`) REFERENCES `personne` (`idPersonne`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
