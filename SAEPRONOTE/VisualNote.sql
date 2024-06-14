-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- HÃ´te : localhost
-- GÃ©nÃ©rÃ© le : sam. 08 juin 2024 Ã  00:17
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de donnÃ©es : `VisualNote`
--

-- --------------------------------------------------------

--
-- Structure de la table `Compte`
--
CREATE TABLE `Compte` (
  `Ordre` int NOT NULL AUTO_INCREMENT,
  `Role` varchar(255) NOT NULL,
  PRIMARY KEY (`Role`),
  UNIQUE KEY (`Ordre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Compte` (`Ordre`, `Role`) VALUES
(1, 'administrateur'),
(2, 'enseignant'),
(3, 'etudiant')
;


-- --------------------------------------------------------

--
-- Structure de la table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Role` varchar(30) NOT NULL,
  Primary key (`idAdmin`),
  FOREIGN KEY (`Role`) REFERENCES `Compte`(`Role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- DÃ©chargement des donnÃ©es de la table `Administrateur`
--

INSERT INTO `Administrateur` (`idAdmin`, `username`, `password`, `Role`) VALUES
(1, 'admin', '$2y$10$/yQWpNPH3YYhEMV/v4H9COctNJ1fkihspCOxPTgHkVEo/WDsa.m5W', 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `Enseignants`
--

CREATE TABLE `Enseignants` (
  `ID_enseignant` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `Role` varchar(30) NOT NULL,
  Primary key (`ID_enseignant`),
  FOREIGN KEY (`Role`) REFERENCES `Compte`(`Role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- DÃ©chargement des donnÃ©es de la table `Enseignants`
--

INSERT INTO `Enseignants` (`ID_enseignant`, `Nom`, `Prenom`, `login`, `mdp`, `Role`) VALUES
(1, 'Al Salti', 'Nadia', 'nalsalti', '$2y$10$09eLKQ04DJxiTvQwEC3oz.hdOESzlAKQD3J3xon4BwaFrL6d0Xliq', 'enseignant');

-- --------------------------------------------------------

CREATE TABLE Moyennes (
    ID_etudiant INT NOT NULL,
    moyenne DECIMAL(5,2) NOT NULL,
    PRIMARY KEY (`moyenne`),
    FOREIGN KEY (ID_etudiant) REFERENCES Etudiants(ID_etudiant)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Moyennes` (ID_etudiant, moyenne) VALUES
(SELECT ID_etudiant
FROM   Etudiants,
SELECT ID_etudiant, AVG(note) as moyenne
FROM Notes)
GROUP BY ID_etudiant;




------------------------
--
-- Structure de la table `Etudiants`
--
CREATE TABLE `Etudiants` (
  `ID_etudiant` int(11) NOT NULL AUTO_INCREMENT, 
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `Niveau` varchar(255) NOT NULL,
  `Groupe` int(11) NOT NULL,
  `promotion` int(11) DEFAULT NULL,
  `Role` varchar(30) NOT NULL,
  `Rang` int(11) NOT NULL,
  `moyenne` DECIMAL(5,2) NOT NULL,
  Primary key (`ID_etudiant`),
  FOREIGN KEY (`Role`) REFERENCES `Compte`(`Role`),
  FOREIGN KEY (`moyenne`) REFERENCES `Moyennes`(`moyenne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- DÃ©chargement des donnÃ©es de la table `Etudiants`
--

INSERT INTO `Etudiants` (`ID_etudiant`, `Nom`, `Prenom`, `username`, `password`, `adresse`, `Niveau`, `Groupe`, `promotion`, `Role`, `Rang`) VALUES
(1, 'Dupont', 'Jean', 'jean.du', '$2y$10$jNSw4nvM/utqjylaORfpeOhbl0O974B3emETZH9ONfSYLLweXwOR.', NULL, 'BUT1', 1, 2024, 'etudiant', Rank() Over(Order By moyenne Desc) );

-- --------------------------------------------------------

--
-- Structure de la table `Groupes`
--

CREATE TABLE `Groupes` (
  `ID_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_groupe` varchar(255) DEFAULT NULL,
  Primary key (`ID_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- DÃ©chargement des donnÃ©es de la table `Groupes`
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

-- --------------------------------------------------------

--
-- Structure de la table `Notes`
--

CREATE TABLE `Notes` (
  `ID_note` int(11) NOT NULL AUTO_INCREMENT,
  `ID_enseignant` int(11) NOT NULL,
  `ID_etudiant` int(11) NOT NULL,
  `note` float NOT NULL,
  `ressource` varchar(255) NOT NULL,
  Primary key (`ID_note`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Index pour les tables dÃ©chargÃ©es
--

-- Index pour la table `Administrateur`
ALTER TABLE `Administrateur`
  ADD UNIQUE KEY `username` (`username`);

-- Index pour la table `Enseignants`
ALTER TABLE `Enseignants`
  ADD UNIQUE KEY `login` (`login`);

-- Index pour la table `Etudiants`
ALTER TABLE `Etudiants`
  ADD UNIQUE KEY `username` (`username`);

-- Index pour la table `Groupes`
ALTER TABLE `Groupes`
  ADD PRIMARY KEY (`ID_groupe`);

-- Index pour la table `Notes`
ALTER TABLE `Notes`
  ADD PRIMARY KEY (`ID_note`);

-- Index pour la table `Compte`
ALTER TABLE `Compte`
  ADD PRIMARY KEY (`Role`);

-- --------------------------------------------------------

--
-- AUTO_INCREMENT pour les tables dÃ©chargÃ©es
--

-- AUTO_INCREMENT pour la table `Administrateur`
ALTER TABLE `Administrateur`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- AUTO_INCREMENT pour la table `Enseignants`
ALTER TABLE `Enseignants`
  MODIFY `ID_enseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- AUTO_INCREMENT pour la table `Etudiants`
ALTER TABLE `Etudiants`
  MODIFY `ID_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- AUTO_INCREMENT pour la table `Groupes`
ALTER TABLE `Groupes`
  MODIFY `ID_groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

-- AUTO_INCREMENT pour la table `Notes`
ALTER TABLE `Notes`
  MODIFY `ID_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
-- AUTO_INCREMENT pour les tables dÃ©chargÃ©es
ALTER TABLE Etudiants
ADD `Role` varchar(255) NOT NULL;
ALTER TABLE Etudiants
ADD CONSTRAINT fk_role
FOREIGN KEY (Role)
REFERENCES Compte(Role);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
