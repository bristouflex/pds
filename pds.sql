-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 01 Avril 2017 à 14:19
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pds`
--

-- --------------------------------------------------------

--
-- Structure de la table `abris`
--

CREATE TABLE `abris` (
  `nom` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `ht` float NOT NULL,
  `tva` float NOT NULL,
  `ttc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `abris`
--

INSERT INTO `abris` (`nom`, `type`, `ht`, `tva`, `ttc`) VALUES
('0.5 < M > 1T et 100m2 > S', 'interieur', 275, 55, 330),
('0.5 < M > 1T et 60m2 < S < 100m2', 'interieur', 225, 45, 270),
('0.5 < M > 1T et S < 60m2', 'interieur', 175, 35, 210),
('1T < 60m2 <= S < 100m2', 'interieur', 255, 51, 306),
('1T < M et 100m2 < S', 'interieur', 305, 61, 366),
('1T < M et S < 60m2', 'interieur', 205, 41, 246),
('Exterieur', 'exterieur', 2.3, 0.46, 2.76),
('M < 0.5T et 100m2 < S', 'interrieur', 250, 50, 300),
('M < 0.5T et 60m2 < S < 100m2', 'interieur', 200, 40, 240),
('M < 0.5T et S > 60m2', 'interieur', 150, 30, 180);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `prenom`, `nom`, `email`, `password`, `statut`) VALUES
(1, 'Alexandre', 'Matousek', 'amatousek@email.com', '$2y$10$Ix3FGgCkl8TQSABsDJ88j.XCzCKVAtDdAKDLd.AgF6.xH7PSIagc2', 1),
(2, 'Brice', 'Hounza', 'b.hounza@laposte.net', '$2y$10$xQyQHA7kWRqLjdVP5AK0AeKCDNYq33IGHZQGMBr/qjJ00hnPDSUN2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

CREATE TABLE `avion` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `ht` float NOT NULL,
  `tva` float NOT NULL,
  `ttc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `avion`
--

INSERT INTO `avion` (`id`, `type`, `periode`, `ht`, `tva`, `ttc`) VALUES
(1, 'mono-turbine', 'week-end_nb', 34.5, 6.9, 41.4),
(2, 'mono-turbine', 'semaine_nb', 31.17, 6.23, 37.4),
(3, 'mono-turbine', 'mensuel_ab', 113, 22.6, 135.6),
(4, 'mono-turbine', 'unite_ab', 15.25, 3.05, 21.6),
(5, 'reacteur', 'week-end_nb', 41.17, 8.23, 49.4),
(6, 'reacteur', 'semaine_nb', 37.17, 7.43, 44.6),
(7, 'reacteur', 'mensuel_ab', 120, 24, 144),
(8, 'reacteur', 'unite_ab', 18, 3.6, 21.6);

-- --------------------------------------------------------

--
-- Structure de la table `bapteme`
--

CREATE TABLE `bapteme` (
  `id` int(11) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bapteme`
--

INSERT INTO `bapteme` (`id`, `prix`) VALUES
(1, 195);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `ht` float NOT NULL,
  `ttc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `type`, `ht`, `ttc`) VALUES
(1, 'tarif_mensuel_aeronefs_bases', 'cat1', 150, 180),
(2, 'tarif_mensuel_aeronefs_bases', 'cat2', 116.67, 140),
(3, 'tarif_mensuel_aeronefs_bases', 'cat3', 70.83, 85),
(4, 'tarif_journalier_aeronefs_bases', 'cat1', 5.5, 6.6),
(5, 'tarif_journalier_aeronefs_bases', 'cat2', 4.33, 5.2),
(6, 'tarif_journalier_aeronefs_bases', 'cat3', 2.63, 3.15),
(7, 'tarif_journalier_aeronefs_non-base', 'cat1', 9.38, 11.25),
(8, 'tarif_journalier_aeronefs_non-base', 'cat2', 7.29, 8.75),
(9, 'tarif_journalier_aeronefs_non-base', 'cat3', 4.42, 5.3);

-- --------------------------------------------------------

--
-- Structure de la table `cotisation`
--

CREATE TABLE `cotisation` (
  `id` int(11) NOT NULL,
  `type` varchar(70) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cotisation`
--

INSERT INTO `cotisation` (`id`, `type`, `prix`) VALUES
(1, 'Cotisation Aero-Club -21ans', 178),
(2, 'Cotisation Aero-Club +21ans', 218),
(3, 'License + Assurance', 74),
(4, 'License + Assurance + Revue Mensuelle', 114);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `adresseIP` varchar(255) NOT NULL,
  `montant` float NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `ispaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`id`, `idUser`, `adresseIP`, `montant`, `chemin`, `ispaid`) VALUES
(3, 3, '::1', 1.08, 'blabla', 1),
(4, 3, '::1', 1.08, 'blabla', 1),
(5, 3, '::1', 102.925, 'blabla', 1),
(6, 3, '::1', 102.925, 'blabla', 0),
(7, 3, '::1', 102.925, 'blabla', 0),
(8, 3, '::1', 0.36, 'blabla', 1),
(9, 3, '::1', 0.9, 'blabla', 1),
(10, 4, '::1', 0.9, 'blabla', 1),
(11, 4, '::1', 0.9, 'blabla', 1),
(12, 4, '::1', 1.08, 'blabla', 1),
(13, 4, '::1', 1.63, 'blabla', 1),
(27, 3, '::1', 0.9, 'factures/alex@email.com_2017-03-25_11-31-06.pdf', 0),
(28, 3, '::1', 234.525, 'factures/alex@email.com_2017-03-25_11-39-30.pdf', 0),
(29, 5, '::1', 457.09, 'factures/alex.matousek@email.com_2017-03-25_12-04-02.pdf', 1),
(31, 4, '::1', 0.9, 'factures/aaaa@email.com_2017-03-27_12-38-15.pdf', 0),
(32, 4, '::1', 1.08, 'factures/aaaa@email.com_2017-04-01_11-23-05.pdf', 1),
(33, 4, '::1', 1.99, 'factures/aaaa@email.com_2017-04-01_11-25-57.pdf', 1),
(34, 7, '::1', 846.6, 'factures/alex.member@email.com_2017-04-01_14-05-49.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `grpacoustique`
--

CREATE TABLE `grpacoustique` (
  `numero` varchar(2) NOT NULL,
  `jour_soir` float NOT NULL,
  `nuit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `grpacoustique`
--

INSERT INTO `grpacoustique` (`numero`, `jour_soir`, `nuit`) VALUES
('1', 1.3, 4),
('2', 1.2, 1.8),
('3', 1.15, 1.725),
('4', 1, 1.5),
('5a', 0.85, 1.275),
('5b', 0.7, 1.05);

-- --------------------------------------------------------

--
-- Structure de la table `historiquetransaction`
--

CREATE TABLE `historiquetransaction` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `adresseIP` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `montant` float NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `historiquetransaction`
--

INSERT INTO `historiquetransaction` (`id`, `idUser`, `adresseIP`, `date`, `montant`, `link`) VALUES
(1, 2, '::1', '2017-02-05 23:00:00', 25, ''),
(2, 3, '::1', '2017-03-11 23:00:00', 30, ''),
(3, 3, '::1', '2017-03-12 23:00:00', -1.08, ''),
(4, 3, '::1', '2017-03-12 23:00:00', -1.08, ''),
(5, 3, '::1', '2017-03-12 23:00:00', -1.08, ''),
(6, 3, '::1', '2017-03-12 23:00:00', -1.08, ''),
(7, 3, '::1', '2017-03-12 23:00:00', -1.08, ''),
(8, 3, '::1', '2017-03-12 23:00:00', 45, ''),
(9, 3, '::1', '2017-03-12 23:00:00', -1.08, ''),
(10, 3, '::1', '2017-03-12 23:00:00', 90, ''),
(11, 3, '::1', '2017-03-12 23:00:00', -102.925, ''),
(12, 3, '::1', '2017-03-12 23:00:00', -0.9, ''),
(13, 3, '::1', '2017-03-12 23:00:00', -0.36, ''),
(14, 4, '::1', '2017-03-22 23:00:00', 20, ''),
(15, 4, '::1', '2017-03-22 23:00:00', -0.9, ''),
(16, 4, '::1', '2017-03-23 23:00:00', 25, ''),
(17, 4, '::1', '2017-03-23 23:00:00', -0.9, ''),
(18, 4, '::1', '2017-03-23 23:00:00', -1.63, ''),
(19, 4, '::1', '2017-03-23 23:00:00', -1.08, ''),
(20, 3, '::1', '2017-03-24 23:00:00', -0.9, ''),
(21, 3, '::1', '2017-03-25 10:59:18', 35, ''),
(22, 5, '::1', '2017-03-25 11:03:16', 1000, ''),
(23, 5, '::1', '2017-03-25 11:12:20', -457.09, 'factures/alex.matousek@email.com_2017-03-25_12-04-02.pdf'),
(24, 5, '::1', '2017-03-27 09:51:21', 50, ''),
(25, 6, '::1', '2017-03-27 10:08:51', 1000, ''),
(26, 7, '::1', '2017-04-01 09:22:11', 1000, ''),
(27, 4, '::1', '2017-04-01 09:23:27', -1.08, 'factures/aaaa@email.com_2017-04-01_11-23-05.pdf'),
(28, 4, '::1', '2017-04-01 09:26:04', -1.99, 'factures/aaaa@email.com_2017-04-01_11-25-57.pdf'),
(29, 7, '::1', '2017-04-01 12:16:59', -846.6, 'factures/alex.member@email.com_2017-04-01_14-05-49.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

CREATE TABLE `inscrit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `genre` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `identity` varchar(255) NOT NULL,
  `credit` float NOT NULL DEFAULT '0',
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  `isMember` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscrit`
--

INSERT INTO `inscrit` (`id`, `nom`, `prenom`, `email`, `password`, `birth`, `genre`, `adresse`, `phone`, `identity`, `credit`, `statut`, `isMember`) VALUES
(1, 'aaaaaa', 'aaaaaa', 'azerty@email.com', '$2y$10$zy8K4SoBrr3vIwRTo8k1QeT4bg8OEF/6D2V9ZpoT7YFlIFEIG3V6S', '2017-02-09', 'Homme', 'azerty', 'azerty', 'blablabla', 0, 1, 0),
(2, 'patrick', 'bittan', 'bittan@live.fr', '$2y$10$xQyQHA7kWRqLjdVP5AK0AeKCDNYq33IGHZQGMBr/qjJ00hnPDSUN2', '0000-00-00', 'Homme', '5 rue du bÃ©ri', '0156234874', 'blablabla', 65, 1, 0),
(3, 'alex', 'alex', 'alex@email.com', '$2y$10$PwXNnMbU1H256aL1yJPzO.zGvpkzjtnObWAON6dFeRBxSx5bIm8.a', '2017-03-09', 'Homme', 'Street', '0644233456', 'upload/0001-42.png', 88.435, 1, 0),
(4, 'aaaa', 'aaaa', 'aaaa@email.com', '$2y$10$aK6.EVMywdjbXrB5kzk8pOJWJCD87Z.dQNFWUKgt4StRD2ujNtn2K', '2017-03-09', 'Homme', 'aaaa', '0102030405', 'upload/dfLZ2lg.jpg', 37.42, 1, 0),
(5, 'alexandre', 'matousek', 'alex.matousek@email.com', '$2y$10$9fkDnDurhFh/4eicCObfHOfJc6UMb7qq9cvYk5u0N4FfSWzaf9VaC', '1997-06-08', 'Homme', '127.0.0.1', '0606060606', 'upload/dfLZ2lg.jpg', 592.91, 1, 0),
(6, 'frederic', 'sananes', 'f.sananes@email.com', '$2y$10$DBaSHDMJTpf/DZxtfMOkB.dHFIDT.y/KeJUukDA8cLSxlFkUQKd7y', '1978-10-25', 'Homme', '242 Faubourg Saint Antoine', '0601020304', 'upload/Theres-no-place-like-127.0.0.1_www.FullHDWpp.com_.jpg', 1000, 1, 0),
(7, 'membersek', 'alex', 'alex.member@email.com', '$2y$10$pCj8Ffg7grlfyvSr.8JePOm9Y1hWnDKWlg8uK7.zPYd60q5Lw2AIq', '1996-06-12', 'Homme', 'RAZERAR', '0101010101', 'upload/', 153.4, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `instructeur`
--

CREATE TABLE `instructeur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `instructeur`
--

INSERT INTO `instructeur` (`id`, `nom`, `prenom`) VALUES
(1, 'Pote', 'Alk'),
(2, 'Vald', 'Sullyvan');

-- --------------------------------------------------------

--
-- Structure de la table `lecon`
--

CREATE TABLE `lecon` (
  `id` int(11) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lecon`
--

INSERT INTO `lecon` (`id`, `prix`) VALUES
(1, 161.6);

-- --------------------------------------------------------

--
-- Structure de la table `location_ulm`
--

CREATE TABLE `location_ulm` (
  `id` int(11) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `location_ulm`
--

INSERT INTO `location_ulm` (`id`, `prix`) VALUES
(1, 100);

-- --------------------------------------------------------

--
-- Structure de la table `messageprive`
--

CREATE TABLE `messageprive` (
  `id` int(11) NOT NULL,
  `idEnvoi` int(11) NOT NULL,
  `idRecu` int(11) NOT NULL,
  `lu` tinyint(1) NOT NULL DEFAULT '0',
  `archive` tinyint(1) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messageprive`
--

INSERT INTO `messageprive` (`id`, `idEnvoi`, `idRecu`, `lu`, `archive`, `message`, `date`) VALUES
(1, 2, 1, 0, 0, 'ok', '2017-02-09 21:51:21'),
(2, 2, 1, 0, 0, 'deuxiÃ¨me test', '2017-02-09 21:52:52'),
(3, 2, 1, 0, 0, 'bonjour, j\'ai un problÃ¨me Ã  propos de ma reservation', '2017-02-09 21:53:15');

-- --------------------------------------------------------

--
-- Structure de la table `meteo`
--

CREATE TABLE `meteo` (
  `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `temperature` decimal(11,0) NOT NULL,
  `pressure` int(11) NOT NULL,
  `humidity` int(11) NOT NULL,
  `vitesse` decimal(11,0) NOT NULL,
  `inclinaison` int(11) NOT NULL,
  `precipitations` int(11) NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `meteo`
--

INSERT INTO `meteo` (`description`, `temperature`, `pressure`, `humidity`, `vitesse`, `inclinaison`, `precipitations`, `date`, `id`) VALUES
('clear sky', '279', 1018, 75, '2', 170, 0, '2017-02-06', 32),
('mist', '275', 1021, 93, '4', 50, 90, '2017-02-09', 33),
('overcast clouds', '284', 1019, 93, '6', 260, 90, '2017-02-21', 34),
('mist', '284', 1014, 93, '7', 240, 90, '2017-02-22', 35),
('peu nuageux', '282', 992, 70, '3', 290, 20, '2017-03-04', 36),
('ok', '0', 0, 0, '0', 0, 0, '0000-00-00', 37),
('peu nuageux', '282', 992, 70, '3', 290, 20, '2017-03-04', 38),
('peu nuageux', '282', 992, 70, '3', 290, 20, '2017-03-04', 39),
('peu nuageux', '282', 992, 70, '3', 290, 20, '2017-03-04', 40),
('peu nuageux', '282', 992, 70, '3', 290, 20, '2017-03-04', 41),
('peu nuageux', '283', 992, 66, '4', 270, 20, '2017-03-04', 42),
('peu nuageux', '283', 992, 66, '4', 270, 20, '2017-03-04', 43),
('ensoleillÃ©', '279', 999, 75, '6', 250, 0, '2017-03-05', 44);

-- --------------------------------------------------------

--
-- Structure de la table `options_atterissage`
--

CREATE TABLE `options_atterissage` (
  `id` int(11) NOT NULL,
  `grpacoustique` varchar(2) NOT NULL,
  `frais_dossier` tinyint(4) NOT NULL,
  `avion` int(11) NOT NULL,
  `facture` int(11) NOT NULL,
  `debut` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options_atterissage`
--

INSERT INTO `options_atterissage` (`id`, `grpacoustique`, `frais_dossier`, `avion`, `facture`, `debut`) VALUES
(1, '3', 0, 5, 5, '2020-02-02 01:01:00'),
(2, '3', 0, 5, 6, '2020-02-02 01:01:00'),
(3, '3', 0, 5, 7, '2020-02-02 01:01:00'),
(6, '3', 0, 6, 28, '2017-03-29 03:03:00'),
(7, '2', 0, 7, 29, '2017-03-30 03:03:00');

-- --------------------------------------------------------

--
-- Structure de la table `options_avitaillement`
--

CREATE TABLE `options_avitaillement` (
  `id` int(11) NOT NULL,
  `produit` varchar(30) NOT NULL,
  `facture` int(11) NOT NULL,
  `debut` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options_avitaillement`
--

INSERT INTO `options_avitaillement` (`id`, `produit`, `facture`, `debut`) VALUES
(1, 'jeta1_sans_tic', 5, '2019-01-01 00:03:00'),
(2, 'jeta1_sans_tic', 6, '2019-01-01 00:03:00'),
(3, 'jeta1_sans_tic', 7, '2019-01-01 00:03:00'),
(4, 'jeta1_a1_tic', 13, '2017-03-30 03:03:00'),
(10, 'jeta1_a1_tic', 28, '2017-03-30 03:03:00'),
(11, 'jeta1_sans_tic', 29, '2017-03-30 03:03:00'),
(12, 'jeta1_a1_tic', 33, '2017-04-19 03:03:00');

-- --------------------------------------------------------

--
-- Structure de la table `options_bapteme`
--

CREATE TABLE `options_bapteme` (
  `id` int(11) NOT NULL,
  `inscrit` int(11) NOT NULL,
  `instructeur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `facture` int(11) NOT NULL,
  `bapteme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options_bapteme`
--

INSERT INTO `options_bapteme` (`id`, `inscrit`, `instructeur`, `date`, `facture`, `bapteme`) VALUES
(1, 7, 2, '2017-04-20 03:04:00', 34, 1);

-- --------------------------------------------------------

--
-- Structure de la table `options_cotisation`
--

CREATE TABLE `options_cotisation` (
  `cotisation` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `inscrit` int(11) NOT NULL,
  `facture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `options_lecon`
--

CREATE TABLE `options_lecon` (
  `id` int(11) NOT NULL,
  `inscrit` int(11) NOT NULL,
  `instructeur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `lecon` int(11) NOT NULL,
  `facture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options_lecon`
--

INSERT INTO `options_lecon` (`id`, `inscrit`, `instructeur`, `date`, `lecon`, `facture`) VALUES
(1, 7, 1, '2017-04-11 05:03:00', 1, 34);

-- --------------------------------------------------------

--
-- Structure de la table `options_location_ulm`
--

CREATE TABLE `options_location_ulm` (
  `id` int(11) NOT NULL,
  `location_ulm` int(11) NOT NULL,
  `inscrit` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `facture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options_location_ulm`
--

INSERT INTO `options_location_ulm` (`id`, `location_ulm`, `inscrit`, `date`, `facture`) VALUES
(1, 1, 7, '2017-04-13 04:05:00', 34);

-- --------------------------------------------------------

--
-- Structure de la table `options_nettoyage`
--

CREATE TABLE `options_nettoyage` (
  `id` int(11) NOT NULL,
  `produits` varchar(30) NOT NULL,
  `facture` int(11) NOT NULL,
  `debut` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options_nettoyage`
--

INSERT INTO `options_nettoyage` (`id`, `produits`, `facture`, `debut`) VALUES
(2, 'ultra_clean', 3, '2017-12-27 03:05:00'),
(3, 'ultra_clean', 4, '2017-12-27 03:05:00'),
(4, 'super_clean', 5, '2017-11-04 04:14:00'),
(5, 'super_clean', 6, '2017-11-04 04:14:00'),
(6, 'super_clean', 7, '2017-11-04 04:14:00'),
(7, 'low_clean', 8, '2019-03-03 02:00:00'),
(8, 'super_clean', 9, '2019-02-04 01:00:00'),
(9, 'super_clean', 10, '2017-03-29 03:03:00'),
(10, 'super_clean', 11, '2017-03-30 03:02:00'),
(11, 'ultra_clean', 12, '2017-05-17 03:02:00'),
(22, 'super_clean', 27, '2017-03-30 22:23:00'),
(23, 'low_clean', 28, '2017-03-29 22:02:00'),
(24, 'ultra_clean', 29, '2017-03-31 03:03:00'),
(26, 'super_clean', 31, '2017-03-30 04:04:00'),
(27, 'ultra_clean', 32, '2017-04-27 03:03:00'),
(28, 'low_clean', 33, '2017-04-13 03:03:00');

-- --------------------------------------------------------

--
-- Structure de la table `options_parachute`
--

CREATE TABLE `options_parachute` (
  `id` int(11) NOT NULL,
  `parachute` int(11) NOT NULL,
  `debut` datetime NOT NULL,
  `inscrit` int(11) NOT NULL,
  `facture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options_parachute`
--

INSERT INTO `options_parachute` (`id`, `parachute`, `debut`, `inscrit`, `facture`) VALUES
(1, 390, '2017-04-12 03:04:00', 7, 34);

-- --------------------------------------------------------

--
-- Structure de la table `options_stationnement`
--

CREATE TABLE `options_stationnement` (
  `id` int(11) NOT NULL,
  `abris` varchar(30) NOT NULL,
  `categorie` int(11) NOT NULL,
  `facture` int(11) NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parachute`
--

CREATE TABLE `parachute` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `parachute`
--

INSERT INTO `parachute` (`id`, `nom`, `prix`) VALUES
(1, 'basique', 390);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `nom` varchar(30) NOT NULL,
  `type` varchar(15) NOT NULL,
  `ht` float NOT NULL,
  `tva` float NOT NULL,
  `ttc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`nom`, `type`, `ht`, `tva`, `ttc`) VALUES
('avgas_sans_tic', 'avitaillement', 1.5, 0.3, 1.8),
('avgas_tic', 'avitaillement', 1.92, 0.38, 2.3),
('clean', 'nettoyage', 0.5, 0.1, 0.6),
('jeta1_a1_tic', 'avitaillement', 1.36, 0.27, 1.63),
('jeta1_sans_tic', 'avitaillement', 1.01, 0.2, 1.21),
('low_clean', 'nettoyage', 0.3, 0.06, 0.36),
('super_clean', 'nettoyage', 0.75, 0.15, 0.9),
('ultra_clean', 'nettoyage', 0.9, 0.18, 1.08);

-- --------------------------------------------------------

--
-- Structure de la table `redevances`
--

CREATE TABLE `redevances` (
  `ht` float NOT NULL,
  `tva` float NOT NULL,
  `ttc` float NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `redevances`
--

INSERT INTO `redevances` (`ht`, `tva`, `ttc`, `nom`) VALUES
(13, 2.6, 15.6, 'balisage'),
(25.83, 5.17, 31, 'frais_dossiers');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`id`, `nom`, `type`) VALUES
(1, 'ULM1', 'ulm'),
(2, 'ULM2', 'ulm'),
(3, 'Robin DR 400 120cv F-GDES', 'avion'),
(4, 'PIPER PA 28 180cv F-GIDI', 'avion');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abris`
--
ALTER TABLE `abris`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bapteme`
--
ALTER TABLE `bapteme`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cotisation`
--
ALTER TABLE `cotisation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `grpacoustique`
--
ALTER TABLE `grpacoustique`
  ADD PRIMARY KEY (`numero`);

--
-- Index pour la table `historiquetransaction`
--
ALTER TABLE `historiquetransaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `inscrit`
--
ALTER TABLE `inscrit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `instructeur`
--
ALTER TABLE `instructeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lecon`
--
ALTER TABLE `lecon`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `location_ulm`
--
ALTER TABLE `location_ulm`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messageprive`
--
ALTER TABLE `messageprive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEnvoi` (`idEnvoi`),
  ADD KEY `idRecu` (`idRecu`);

--
-- Index pour la table `meteo`
--
ALTER TABLE `meteo`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `options_atterissage`
--
ALTER TABLE `options_atterissage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupe` (`grpacoustique`,`avion`),
  ADD KEY `avion` (`avion`),
  ADD KEY `achat` (`facture`);

--
-- Index pour la table `options_avitaillement`
--
ALTER TABLE `options_avitaillement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pro` (`produit`),
  ADD KEY `achat` (`facture`);

--
-- Index pour la table `options_bapteme`
--
ALTER TABLE `options_bapteme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscrit` (`inscrit`),
  ADD KEY `instructeur` (`instructeur`),
  ADD KEY `facture` (`facture`),
  ADD KEY `bapteme` (`bapteme`),
  ADD KEY `inscrit_2` (`inscrit`);

--
-- Index pour la table `options_cotisation`
--
ALTER TABLE `options_cotisation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cotisation` (`cotisation`),
  ADD KEY `inscrit` (`inscrit`),
  ADD KEY `facture` (`facture`);

--
-- Index pour la table `options_lecon`
--
ALTER TABLE `options_lecon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscrit` (`inscrit`),
  ADD KEY `instructeur` (`instructeur`),
  ADD KEY `lecon` (`lecon`),
  ADD KEY `facture` (`facture`);

--
-- Index pour la table `options_location_ulm`
--
ALTER TABLE `options_location_ulm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_ulm` (`location_ulm`),
  ADD KEY `inscrit` (`inscrit`),
  ADD KEY `facture` (`facture`);

--
-- Index pour la table `options_nettoyage`
--
ALTER TABLE `options_nettoyage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produits` (`produits`,`facture`),
  ADD KEY `achat` (`facture`);

--
-- Index pour la table `options_parachute`
--
ALTER TABLE `options_parachute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parachute` (`parachute`),
  ADD KEY `inscrit` (`inscrit`),
  ADD KEY `facture` (`facture`);

--
-- Index pour la table `options_stationnement`
--
ALTER TABLE `options_stationnement`
  ADD KEY `abris` (`abris`,`categorie`,`facture`),
  ADD KEY `categorie` (`categorie`),
  ADD KEY `achat` (`facture`);

--
-- Index pour la table `parachute`
--
ALTER TABLE `parachute`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `redevances`
--
ALTER TABLE `redevances`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `avion`
--
ALTER TABLE `avion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `bapteme`
--
ALTER TABLE `bapteme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `cotisation`
--
ALTER TABLE `cotisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `historiquetransaction`
--
ALTER TABLE `historiquetransaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `inscrit`
--
ALTER TABLE `inscrit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `instructeur`
--
ALTER TABLE `instructeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `lecon`
--
ALTER TABLE `lecon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `location_ulm`
--
ALTER TABLE `location_ulm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `messageprive`
--
ALTER TABLE `messageprive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `meteo`
--
ALTER TABLE `meteo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `options_atterissage`
--
ALTER TABLE `options_atterissage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `options_avitaillement`
--
ALTER TABLE `options_avitaillement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `options_bapteme`
--
ALTER TABLE `options_bapteme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `options_cotisation`
--
ALTER TABLE `options_cotisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `options_lecon`
--
ALTER TABLE `options_lecon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `options_location_ulm`
--
ALTER TABLE `options_location_ulm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `options_nettoyage`
--
ALTER TABLE `options_nettoyage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `options_parachute`
--
ALTER TABLE `options_parachute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `parachute`
--
ALTER TABLE `parachute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `inscrit` (`id`);

--
-- Contraintes pour la table `historiquetransaction`
--
ALTER TABLE `historiquetransaction`
  ADD CONSTRAINT `historiquetransaction_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `inscrit` (`id`);

--
-- Contraintes pour la table `messageprive`
--
ALTER TABLE `messageprive`
  ADD CONSTRAINT `messageprive_ibfk_1` FOREIGN KEY (`idEnvoi`) REFERENCES `inscrit` (`id`),
  ADD CONSTRAINT `messageprive_ibfk_2` FOREIGN KEY (`idRecu`) REFERENCES `inscrit` (`id`);

--
-- Contraintes pour la table `options_atterissage`
--
ALTER TABLE `options_atterissage`
  ADD CONSTRAINT `options_atterissage_ibfk_1` FOREIGN KEY (`grpacoustique`) REFERENCES `grpacoustique` (`numero`),
  ADD CONSTRAINT `options_atterissage_ibfk_2` FOREIGN KEY (`avion`) REFERENCES `avion` (`id`),
  ADD CONSTRAINT `options_atterissage_ibfk_3` FOREIGN KEY (`facture`) REFERENCES `facture` (`id`);

--
-- Contraintes pour la table `options_avitaillement`
--
ALTER TABLE `options_avitaillement`
  ADD CONSTRAINT `options_avitaillement_ibfk_1` FOREIGN KEY (`produit`) REFERENCES `produits` (`nom`),
  ADD CONSTRAINT `options_avitaillement_ibfk_2` FOREIGN KEY (`facture`) REFERENCES `facture` (`id`);

--
-- Contraintes pour la table `options_nettoyage`
--
ALTER TABLE `options_nettoyage`
  ADD CONSTRAINT `options_nettoyage_ibfk_1` FOREIGN KEY (`produits`) REFERENCES `produits` (`nom`),
  ADD CONSTRAINT `options_nettoyage_ibfk_2` FOREIGN KEY (`facture`) REFERENCES `facture` (`id`);

--
-- Contraintes pour la table `options_stationnement`
--
ALTER TABLE `options_stationnement`
  ADD CONSTRAINT `options_stationnement_ibfk_1` FOREIGN KEY (`abris`) REFERENCES `abris` (`nom`),
  ADD CONSTRAINT `options_stationnement_ibfk_2` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `options_stationnement_ibfk_3` FOREIGN KEY (`facture`) REFERENCES `facture` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
