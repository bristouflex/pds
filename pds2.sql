-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 11 Février 2017 à 18:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pds`
--

-- --------------------------------------------------------

--
-- Structure de la table `activitehistorique`
--

CREATE TABLE IF NOT EXISTS `activitehistorique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `adresseIP` varchar(255) NOT NULL,
  `nomActivite` varchar(255) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `prenom`, `nom`, `email`, `password`, `statut`) VALUES
(1, 'Alexandre', 'Matousek', 'amatousek@email.com', '$2y$10$Ix3FGgCkl8TQSABsDJ88j.XCzCKVAtDdAKDLd.AgF6.xH7PSIagc2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `adresseIP` varchar(255) NOT NULL,
  `montant` float NOT NULL,
  `chemin` varchar(255) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `historiquetransaction`
--

CREATE TABLE IF NOT EXISTS `historiquetransaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `adresseIP` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `montant` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

CREATE TABLE IF NOT EXISTS `inscrit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `isMember` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `inscrit`
--

INSERT INTO `inscrit` (`id`, `nom`, `prenom`, `email`, `password`, `birth`, `genre`, `adresse`, `phone`, `identity`, `credit`, `statut`, `isMember`) VALUES
(1, 'aaaaaa', 'aaaaaa', 'azerty@email.com', '$2y$10$zy8K4SoBrr3vIwRTo8k1QeT4bg8OEF/6D2V9ZpoT7YFlIFEIG3V6S', '2017-02-09', 'Homme', 'azerty', 'azerty', 'blablabla', 0, 1, 0),
(2, 'bittan', 'patrick', 'bittan@live.fr', '$2y$10$S7rV7m6BCCYqNhwV30c62uQAnwny5vxzat7g.ON.QoZNukY8Bb3im', '0000-00-00', 'Homme', '55 rue de la montagne', '0638456875', 'blablabla', 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `messageprive`
--

CREATE TABLE IF NOT EXISTS `messageprive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEnvoi` int(11) NOT NULL,
  `idRecu` int(11) NOT NULL,
  `lu` tinyint(1) NOT NULL DEFAULT '0',
  `archive` tinyint(1) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idEnvoi` (`idEnvoi`),
  KEY `idRecu` (`idRecu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `messageprive`
--

INSERT INTO `messageprive` (`id`, `idEnvoi`, `idRecu`, `lu`, `archive`, `message`, `date`) VALUES
(1, 2, 1, 0, 0, 'bonjour', '2017-02-10 09:33:37'),
(2, 2, 1, 0, 0, 'wesh alors', '2017-02-10 09:33:44'),
(3, 2, 1, 0, 0, 'ok', '2017-02-10 09:37:08'),
(4, 2, 1, 0, 0, '<script> alert("sfds") </script>', '2017-02-10 09:37:48'),
(5, 2, 1, 0, 0, '<h1>ju</h1>', '2017-02-10 09:38:08');

-- --------------------------------------------------------

--
-- Structure de la table `servicehistorique`
--

CREATE TABLE IF NOT EXISTS `servicehistorique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `adresseIP` varchar(255) NOT NULL,
  `nomService` varchar(255) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `activitehistorique`
--
ALTER TABLE `activitehistorique`
  ADD CONSTRAINT `activitehistorique_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `inscrit` (`id`);

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
-- Contraintes pour la table `servicehistorique`
--
ALTER TABLE `servicehistorique`
  ADD CONSTRAINT `servicehistorique_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `inscrit` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
