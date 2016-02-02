-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2016 at 04:09 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prepavenir_allocine`
--
CREATE DATABASE IF NOT EXISTS `prepavenir_allocine` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `prepavenir_allocine`;

-- --------------------------------------------------------

--
-- Table structure for table `acteur`
--

CREATE TABLE `acteur` (
  `id` int(11) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `nom` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acteur`
--

INSERT INTO `acteur` (`id`, `prenom`, `nom`) VALUES
(1, 'Michael', 'Keaton'),
(2, 'Paul', 'Guilfoyle'),
(3, 'Samuel', 'L Jackson'),
(4, 'Dana', 'Gourrier');

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `ville` varchar(60) NOT NULL,
  `nb_salles` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `ville`, `nb_salles`) VALUES
(1, 'Paris', 10),
(2, 'Sannois', 3);

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `realisateur` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `titre`, `realisateur`) VALUES
(1, 'Les huits salopards', 'Quentin Tarantino'),
(2, 'Spotlight', 'Mc Carty');

-- --------------------------------------------------------

--
-- Table structure for table `film_has_acteur`
--

CREATE TABLE `film_has_acteur` (
  `film_id` int(11) NOT NULL,
  `acteur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film_has_acteur`
--

INSERT INTO `film_has_acteur` (`film_id`, `acteur_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

CREATE TABLE `seance` (
  `id` int(11) NOT NULL,
  `horaire` datetime NOT NULL,
  `salle` varchar(40) NOT NULL,
  `film_id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seance`
--

INSERT INTO `seance` (`id`, `horaire`, `salle`, `film_id`, `cinema_id`) VALUES
(1, '2016-02-04 17:15:00', '8', 1, 1),
(2, '2016-02-04 19:00:00', '8', 1, 1),
(3, '2016-02-03 19:00:00', '5', 1, 2),
(4, '2016-02-03 15:00:00', '3', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film_has_acteur`
--
ALTER TABLE `film_has_acteur`
  ADD PRIMARY KEY (`film_id`,`acteur_id`),
  ADD KEY `fk_film_has_acteur_acteur1_idx` (`acteur_id`),
  ADD KEY `fk_film_has_acteur_film_idx` (`film_id`);

--
-- Indexes for table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seance_film1_idx` (`film_id`),
  ADD KEY `fk_seance_cinema1_idx` (`cinema_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seance`
--
ALTER TABLE `seance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `film_has_acteur`
--
ALTER TABLE `film_has_acteur`
  ADD CONSTRAINT `fk_film_has_acteur_acteur1` FOREIGN KEY (`acteur_id`) REFERENCES `acteur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_film_has_acteur_film` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `fk_seance_cinema1` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_seance_film1` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
