-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 15 jan. 2026 à 19:28
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bisig`
--

-- --------------------------------------------------------

--
-- Structure de la table `mouvement`
--

CREATE TABLE `mouvement` (
  `priorité` int(11) NOT NULL,
  `angle` int(11) NOT NULL,
  `duree` int(11) NOT NULL,
  `id_choregraphie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `choregraphie`
--

CREATE TABLE `choregraphie` (
  `id` int(11) NOT NULL,
  `application` varchar(65) NOT NULL,
  `text` text DEFAULT NULL,
  `nom` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `son`
--

CREATE TABLE `son` (
  `id` int(11) NOT NULL,
  `nom` varchar(65) NOT NULL,
  `chemin` varchar(535) NOT NULL,
  `id_choregraphie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD KEY `id_choregraphie` (`id_choregraphie`);

--
-- Index pour la table `choregraphie`
--
ALTER TABLE `choregraphie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `son`
--
ALTER TABLE `son`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_choregraphie` (`id_choregraphie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `choregraphie`
--
ALTER TABLE `choregraphie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `son`
--
ALTER TABLE `son`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD CONSTRAINT `mouvement_ibfk_1` FOREIGN KEY (`id_choregraphie`) REFERENCES `choregraphie` (`id`);

--
-- Contraintes pour la table `son`
--
ALTER TABLE `son`
  ADD CONSTRAINT `son_ibfk_1` FOREIGN KEY (`id_choregraphie`) REFERENCES `choregraphie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
