-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mer 25 Septembre 2013 à 16:30
-- Version du serveur: 5.5.32
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ecole`
--
CREATE DATABASE IF NOT EXISTS `ecole` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ecole`;

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE IF NOT EXISTS `activites` (
  `niveau` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `equipe` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`niveau`,`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `activites`
--

INSERT INTO `activites` (`niveau`, `nom`, `equipe`) VALUES
(1, 'Rugby', 'Equipe 1'),
(1, 'Surf', 'Equipe 2'),
(1, 'Volley ball', 'Equipe 5'),
(2, 'Rugby', 'Equipe 6'),
(2, 'Tennis', 'Equipe 3'),
(2, 'Volley ball', 'Equipe 7'),
(3, 'Tennis', 'Equipe 4');

-- --------------------------------------------------------

--
-- Structure de la table `activites_pratiquees`
--

CREATE TABLE IF NOT EXISTS `activites_pratiquees` (
  `num_eleve` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`num_eleve`,`niveau`,`nom`),
  KEY `FK_ACTIVITEPR_ACTIVITE` (`niveau`,`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `activites_pratiquees`
--

INSERT INTO `activites_pratiquees` (`num_eleve`, `niveau`, `nom`) VALUES
(1, 1, 'Rugby'),
(2, 1, 'Rugby'),
(5, 1, 'Rugby'),
(8, 1, 'Rugby'),
(9, 1, 'Rugby'),
(10, 1, 'Rugby'),
(1, 1, 'Surf'),
(4, 1, 'Surf'),
(5, 1, 'Surf'),
(1, 1, 'Volley ball'),
(5, 1, 'Volley ball'),
(8, 1, 'Volley ball'),
(3, 2, 'Rugby'),
(1, 2, 'Tennis'),
(2, 2, 'Tennis'),
(3, 2, 'Tennis'),
(10, 2, 'Tennis'),
(3, 2, 'Volley ball'),
(8, 2, 'Volley ball'),
(9, 2, 'Volley ball'),
(10, 2, 'Volley ball');

-- --------------------------------------------------------

--
-- Structure de la table `charge`
--

CREATE TABLE IF NOT EXISTS `charge` (
  `num_prof` int(11) NOT NULL,
  `num_cours` int(11) NOT NULL,
  PRIMARY KEY (`num_cours`,`num_prof`),
  KEY `FK_CHARGE_PROFESSEUR` (`num_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `charge`
--

INSERT INTO `charge` (`num_prof`, `num_cours`) VALUES
(1, 1),
(1, 4),
(2, 1),
(3, 2),
(3, 4),
(3, 5),
(4, 2),
(7, 4),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `num_cours` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `nbheures` int(11) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  PRIMARY KEY (`num_cours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`num_cours`, `nom`, `nbheures`, `annee`) VALUES
(1, 'C/C++', 15, 1),
(2, 'SQL', 30, 1),
(3, 'Dessin', 15, 1),
(4, 'Po', 30, 2),
(5, 'Cuisine', 60, 2);

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

CREATE TABLE IF NOT EXISTS `eleves` (
  `num_eleve` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `date_naissance` datetime DEFAULT NULL,
  `poids` int(11) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  PRIMARY KEY (`num_eleve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `eleves`
--

INSERT INTO `eleves` (`num_eleve`, `nom`, `prenom`, `date_naissance`, `poids`, `annee`) VALUES
(1, 'Burton', 'Tim', '1988-12-10 00:00:00', 35, 1),
(2, 'Canin', 'Ethan', '1988-04-10 00:00:00', 88, 1),
(3, 'Fast', 'Howard', '1987-06-28 00:00:00', 72, 2),
(4, 'Fergus', 'Jim', '1988-02-16 00:00:00', 78, 2),
(5, 'Horney', 'Karen', '1987-10-29 00:00:00', 45, 1),
(6, 'Irving', 'John', '1989-04-29 00:00:00', 75, 2),
(7, 'James', 'Henry', '1986-04-08 00:00:00', 61, 1),
(8, 'London', 'Jack', '1989-04-20 00:00:00', 60, 2),
(9, 'Miller', 'Arthur', '1987-09-07 00:00:00', 59, 1),
(10, 'Moody', 'Rick', '1988-02-15 00:00:00', 82, 2);

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE IF NOT EXISTS `professeurs` (
  `num_prof` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `specialite` varchar(20) DEFAULT NULL,
  `date_entree` datetime DEFAULT NULL,
  `der_prom` datetime DEFAULT NULL,
  `salaire_base` int(11) DEFAULT NULL,
  `salaire_actuel` int(11) DEFAULT NULL,
  PRIMARY KEY (`num_prof`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `professeurs`
--

INSERT INTO `professeurs` (`num_prof`, `nom`, `specialite`, `date_entree`, `der_prom`, `salaire_base`, `salaire_actuel`) VALUES
(1, 'Julien', 'Po', '1970-10-01 00:00:00', '1988-10-01 00:00:00', 20000, 26000),
(2, 'Emanuelle', 'SQL', '1968-11-15 00:00:00', '1998-10-01 00:00:00', 19000, 24680),
(3, 'Lucie', 'Cuisine', '1979-10-01 00:00:00', '1989-01-01 00:00:00', 19000, 23600),
(4, 'Edouard', 'Dessin', '1975-10-01 00:00:00', '1997-10-01 00:00:00', 25000, 25000),
(5, 'Arthur', 'C/C++', '1982-10-15 00:00:00', '1988-10-01 00:00:00', 19000, 19000),
(6, 'Jimmy', 'C/C++', '1990-04-25 00:00:00', '1994-06-05 00:00:00', 19000, 22000),
(7, 'Fran', NULL, '1975-10-01 00:00:00', '1998-01-11 00:00:00', 20000, 32000),
(8, 'Fabien', NULL, '1988-12-06 00:00:00', '1996-02-29 00:00:00', 20000, 25000);

-- --------------------------------------------------------

--
-- Structure de la table `resultats`
--

CREATE TABLE IF NOT EXISTS `resultats` (
  `num_eleve` int(11) NOT NULL,
  `num_cours` int(11) NOT NULL,
  `points` int(11) DEFAULT NULL,
  PRIMARY KEY (`num_eleve`,`num_cours`),
  KEY `FK_RESULTAT_COURS` (`num_cours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `resultats`
--

INSERT INTO `resultats` (`num_eleve`, `num_cours`, `points`) VALUES
(1, 1, 15),
(1, 2, 11),
(1, 4, 8),
(1, 5, 20),
(2, 1, 14),
(2, 2, 12),
(2, 4, 11),
(2, 5, 2),
(3, 1, 14),
(3, 2, 15),
(3, 4, 16),
(3, 5, 20),
(4, 1, 17),
(4, 2, 14),
(4, 4, 11),
(4, 5, 8),
(5, 1, 5),
(5, 2, 7),
(5, 4, 13),
(5, 5, 13),
(6, 1, 15),
(6, 2, 4),
(6, 4, 16),
(6, 5, 5),
(7, 1, 3),
(7, 2, 18),
(7, 4, 11),
(7, 5, 10),
(8, 1, 16),
(8, 2, 0),
(8, 4, 6),
(8, 5, 12),
(9, 1, 20),
(9, 2, 20),
(9, 4, 14),
(9, 5, 10),
(10, 1, 3),
(10, 2, 13),
(10, 4, 0),
(10, 5, 16);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `activites_pratiquees`
--
ALTER TABLE `activites_pratiquees`
  ADD CONSTRAINT `fk_activites_pratiquees_activites` FOREIGN KEY (`niveau`, `nom`) REFERENCES `activites` (`niveau`, `nom`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_activites_pratiquees_eleves` FOREIGN KEY (`num_eleve`) REFERENCES `eleves` (`num_eleve`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `charge`
--
ALTER TABLE `charge`
  ADD CONSTRAINT `fk_charge_cours` FOREIGN KEY (`num_cours`) REFERENCES `cours` (`num_cours`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_charge_professeurs` FOREIGN KEY (`num_prof`) REFERENCES `professeurs` (`num_prof`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `resultats`
--
ALTER TABLE `resultats`
  ADD CONSTRAINT `fk_resultats_eleves` FOREIGN KEY (`num_eleve`) REFERENCES `eleves` (`num_eleve`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resultats_cours` FOREIGN KEY (`num_cours`) REFERENCES `cours` (`num_cours`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
