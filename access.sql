-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Sam 04 Avril 2020 à 16:50
-- Version du serveur :  10.3.22-MariaDB-0+deb10u1
-- Version de PHP :  7.3.14-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `access`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id` int(11) NOT NULL,
  `identifient` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `identifient`, `pass`) VALUES
(1, 'alexandre', 'alexandre'),
(2, 'test', 'tes'),
(4, 'victor', 'victor');

-- --------------------------------------------------------

--
-- Structure de la table `listouverture`
--

CREATE TABLE `listouverture` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `rfid` varchar(10) NOT NULL,
  `moment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `persautorise`
--

CREATE TABLE `persautorise` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `rfid` varchar(10) NOT NULL,
  `minheure` int(11) NOT NULL,
  `maxheure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `persautorise`
--

INSERT INTO `persautorise` (`id`, `nom`, `prenom`, `rfid`, `minheure`, `maxheure`) VALUES
(11, 'davy', 'alexandre', '0123456789', 0, 24),
(12, 'davy', 'jp', '9876543210', 10, 22),
(14, 'doelsch', 'carine', '653179026', 2, 6),
(15, 'test', 'test', '0000', 0, 22);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `listouverture`
--
ALTER TABLE `listouverture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `persautorise`
--
ALTER TABLE `persautorise`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `listouverture`
--
ALTER TABLE `listouverture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `persautorise`
--
ALTER TABLE `persautorise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
