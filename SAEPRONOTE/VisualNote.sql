-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 15 juin 2024 à 16:49
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
-- Base de données : `VisualNote`
--

-- --------------------------------------------------------

--
-- Structure de la table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `idAdmin` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Administrateur`
--

INSERT INTO `Administrateur` (`idAdmin`, `username`, `password`, `Role`) VALUES
(1, 'admin', '$2y$10$/yQWpNPH3YYhEMV/v4H9COctNJ1fkihspCOxPTgHkVEo/WDsa.m5W', 'administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `Compte`
--

CREATE TABLE `Compte` (
  `Ordre` int(11) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Compte`
--

INSERT INTO `Compte` (`Ordre`, `Role`) VALUES
(1, 'administrateur'),
(2, 'enseignant'),
(3, 'etudiant');

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
  `Role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Enseignants`
--

INSERT INTO `Enseignants` (`ID_enseignant`, `Nom`, `Prenom`, `login`, `mdp`, `Role`) VALUES
(1, 'Al Salti', 'Nadia', 'nalsalti', '$2y$10$09eLKQ04DJxiTvQwEC3oz.hdOESzlAKQD3J3xon4BwaFrL6d0Xliq', 'enseignant'),
(2, 'Podolski', 'Lukas', 'Plukas', '$2y$10$KjG9KTlXvthRysN5ExLRhenMMjgZ5/8sTKN3kW63qL03uDMPRPXjW', 'enseignant');

-- --------------------------------------------------------

--
-- Structure de la table `Etudiants`
--

CREATE TABLE `Etudiants` (
  `ID_etudiant` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Niveau` varchar(255) NOT NULL,
  `Groupe` int(11) NOT NULL,
  `promotion` int(11) DEFAULT NULL,
  `Role` varchar(30) NOT NULL,
  `classement` int(11) DEFAULT NULL,
  `moyenne_generale` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Etudiants`
--

INSERT INTO `Etudiants` (`ID_etudiant`, `Nom`, `Prenom`, `username`, `password`, `Niveau`, `Groupe`, `promotion`, `Role`, `classement`, `moyenne_generale`) VALUES
(1, 'Dupont', 'Jean', 'jean.du', '$2y$10$jNSw4nvM/utqjylaORfpeOhbl0O974B3emETZH9ONfSYLLweXwOR.', 'BUT1', 1, 2024, 'etudiant', 1, 20),
(2, 'Mhoumadi', 'Makine', 'Mmakine', 'makine', 'BUT1', 1, 2024, 'etudiant', 2, 15.5),
(3, 'David', 'Julien', 'Djulien', 'julien', 'BUT1', 1, 2024, 'etudiant', 2, NULL),
(4, 'Antunes', 'Enzo', 'Aenzo', '$2y$10$gTmuyY2xR6BxVS0L/JxyUerrSko8G/T4SHzBglUqpzGXkvAwx1PhO', 'BUT1', 1, 2024, 'etudiant', 2, NULL),
(5, 'jack', 'hanma', 'jhanma', '$2y$10$W.XGEjDFk7WNK6F5LSRZEemaSVp0waAyRqnRvlS7HHmR4nQT6/2/.', 'BUT1', 1, 2024, 'etudiant', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Notes`
--

CREATE TABLE `Notes` (
  `ID_note` int(11) NOT NULL,
  `ID_enseignant` int(11) NOT NULL,
  `ID_etudiant` int(11) NOT NULL,
  `note` float NOT NULL,
  `ressource` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Notes`
--

INSERT INTO `Notes` (`ID_note`, `ID_enseignant`, `ID_etudiant`, `note`, `ressource`) VALUES
(7, 1, 1, 20, 'math'),
(8, 1, 2, 17, 'math'),
(9, 1, 2, 14, 'sport');

--
-- Déclencheurs `Notes`
--
DELIMITER $$
CREATE TRIGGER `after_insert_note` AFTER INSERT ON `Notes` FOR EACH ROW BEGIN
    DECLARE avg_grade DECIMAL(5,2);

    -- Calculer la nouvelle moyenne pour l'étudiant concerné
    SELECT AVG(note) INTO avg_grade
    FROM Notes
    WHERE ID_etudiant = NEW.ID_etudiant;

    -- Mettre à jour la moyenne générale de l'étudiant dans la table Etudiants
    UPDATE Etudiants
    SET moyenne_generale = avg_grade
    WHERE ID_etudiant = NEW.ID_etudiant;
END
$$
DELIMITER ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `Role` (`Role`);

--
-- Index pour la table `Compte`
--
ALTER TABLE `Compte`
  ADD PRIMARY KEY (`Role`),
  ADD UNIQUE KEY `Ordre` (`Ordre`);

--
-- Index pour la table `Enseignants`
--
ALTER TABLE `Enseignants`
  ADD PRIMARY KEY (`ID_enseignant`),
  ADD KEY `Role` (`Role`);

--
-- Index pour la table `Etudiants`
--
ALTER TABLE `Etudiants`
  ADD PRIMARY KEY (`ID_etudiant`),
  ADD KEY `Role` (`Role`);

--
-- Index pour la table `Notes`
--
ALTER TABLE `Notes`
  ADD PRIMARY KEY (`ID_note`),
  ADD KEY `ID_etudiant` (`ID_etudiant`),
  ADD KEY `ID_enseignant` (`ID_enseignant`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Compte`
--
ALTER TABLE `Compte`
  MODIFY `Ordre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Enseignants`
--
ALTER TABLE `Enseignants`
  MODIFY `ID_enseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Etudiants`
--
ALTER TABLE `Etudiants`
  MODIFY `ID_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Notes`
--
ALTER TABLE `Notes`
  MODIFY `ID_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`Role`) REFERENCES `Compte` (`Role`);

--
-- Contraintes pour la table `Enseignants`
--
ALTER TABLE `Enseignants`
  ADD CONSTRAINT `enseignants_ibfk_1` FOREIGN KEY (`Role`) REFERENCES `Compte` (`Role`);

--
-- Contraintes pour la table `Etudiants`
--
ALTER TABLE `Etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`Role`) REFERENCES `Compte` (`Role`);

--
-- Contraintes pour la table `Notes`
--
ALTER TABLE `Notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`ID_etudiant`) REFERENCES `Etudiants` (`ID_etudiant`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`ID_enseignant`) REFERENCES `Enseignants` (`ID_enseignant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
