-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 04 juin 2024 à 11:34
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Structure de la table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `idAdmin` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Administrateur`
--

INSERT INTO `Administrateur` (`idAdmin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$/yQWpNPH3YYhEMV/v4H9COctNJ1fkihspCOxPTgHkVEo/WDsa.m5W');

-- --------------------------------------------------------

--
-- Structure de la table `Enseignants`
--

CREATE TABLE `Enseignants` (
  `ID_enseignant` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `Role` enum('enseignant','administrateur') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Enseignants`
--

INSERT INTO `Enseignants` (`ID_enseignant`, `Nom`, `Prenom`, `login`, `mdp`, `Role`) VALUES
((1, 'Al Salti', 'Nadia', 'nalsalti', '$2y$10$09eLKQ04DJxiTvQwEC3oz.hdOESzlAKQD3J3xon4BwaFrL6d0Xliq', 'enseignant')
);

-- --------------------------------------------------------

--
-- Structure de la table `Etudiants`
--

CREATE TABLE `Etudiants` (
  `ID_etudiant` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mot_de_passe` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `Niveau` varchar(255) NOT NULL,
  `Groupe` int(11) NOT NULL,
  `promotion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Etudiants`
--

INSERT INTO `Etudiants` (`ID_etudiant`, `Nom`, `Prenom`, `Email`, `Mot_de_passe`, `adresse`, `Niveau`, `Groupe`, `promotion`) VALUES
((1, 'Dupont', 'Jean', 'jean.dupont@example.com', 'password123', NULL, 'BUT1', 1, 2024)
);

-- --------------------------------------------------------

--
-- Structure de la table `Groupes`
--

CREATE TABLE `Groupes` (
  `ID_groupe` int(11) NOT NULL,
  `Nom_groupe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Groupes`
--

INSERT INTO `Groupes` (`ID_groupe`, `Nom_groupe`) VALUES
(1, 'groupe A'),
(2, 'groupe B'),
(3, 'groupe C'),
(4, 'groupe D'),
(5, 'groupe E'),
(6, 'groupe F'),
(7, 'groupe A'),
(8, 'groupe B'),
(9, 'groupe C'),
(10, 'groupe D'),
(11, 'groupe E'),
(12, 'groupe F'),
(13, 'groupe A'),
(14, 'groupe B'),
(15, 'groupe C'),
(16, 'groupe D'),
(17, 'groupe E'),
(18, 'groupe F');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `Enseignants`
--
ALTER TABLE `Enseignants`
  ADD PRIMARY KEY (`ID_enseignant`);

--
-- Index pour la table `Etudiants`
--
ALTER TABLE `Etudiants`
  ADD PRIMARY KEY (`ID_etudiant`);

--
-- Index pour la table `Groupes`
--
ALTER TABLE `Groupes`
  ADD PRIMARY KEY (`ID_groupe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Enseignants`
--
ALTER TABLE `Enseignants`
  MODIFY `ID_enseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `Etudiants`
--
ALTER TABLE `Etudiants`
  MODIFY `ID_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `Groupes`
--
ALTER TABLE `Groupes`
  MODIFY `ID_groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
