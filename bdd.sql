CREATE DATABASE VisualNote;

CREATE TABLE Enseignants (
    ID_enseignant INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(255),
    Prenom VARCHAR(255),
    login VARCHAR(255),
    mdp VARCHAR(255),
    Role ENUM('enseignant', 'administrateur')
);

CREATE TABLE Etudiants (
    ID_etudiant INT AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(255),
    Prenom VARCHAR(255),
    Email VARCHAR(255),
    Mot_de_passe VARCHAR(255),
    adresse VARCHAR(255),
    Niveau VARCHAR(255) NOT NULL,
    Groupe INT NOT NULL, 
    promotion INT,
    FOREIGN KEY (Groupe) REFERENCES Groupes(ID_groupe)
);


CREATE TABLE Groupes (
    ID_groupe INT AUTO_INCREMENT PRIMARY KEY,
    Nom_groupe VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS Administrateur (
     idAdmin INT AUTO_INCREMENT PRIMARY KEY, 
     username VARCHAR(30) UNIQUE, 
     password VARCHAR(255) 
     );


--insertion des données
INSERT INTO Groupes (Nom_groupe) VALUES ('groupe A');
INSERT INTO Groupes (Nom_groupe) VALUES ('groupe B');
INSERT INTO Groupes (Nom_groupe) VALUES ('groupe C');
INSERT INTO Groupes (Nom_groupe) VALUES ('groupe D');
INSERT INTO Groupes (Nom_groupe) VALUES ('groupe E');
INSERT INTO Groupes (Nom_groupe) VALUES ('groupe F');

INSERT INTO Etudiants (Nom, Prenom, Email, Mot_de_passe, Niveau, Groupe, promotion)
VALUES ('Dupont', 'Jean', 'jean.dupont@example.com', 'password123', 'BUT1', 1, 2024);

INSERT INTO Etudiants (Nom, Prenom, Email, Mot_de_passe, Niveau, Groupe, promotion)
VALUES ('Martin', 'Marie', 'marie.martin@example.com', 'student123','BUT1', 1, 2024);

INSERT INTO Etudiants (Nom, Prenom, Email, Mot_de_passe, Niveau, Groupe, promotion)
VALUES ('Durand', 'Paul', 'paul.durand@example.com', 'mypassword', 'BUT1', 2, 2024);

INSERT INTO Etudiants (Nom, Prenom, Email, Mot_de_passe, Niveau, Groupe, promotion)
VALUES ('Leroy', 'Bart', 'bart.leroy@example.com', 'mmipass', 'BUT1',2, 2024);

INSERT INTO Etudiants (Nom, Prenom, Email, Mot_de_passe, Niveau, Groupe, promotion)
VALUES ('Moreau', 'Lucas', 'lucas.moreau@example.com', 'butmmi', 'BUT1',3, 2024);

INSERT INTO Etudiants (Nom, Prenom, Email, Mot_de_passe, Niveau, Groupe, promotion)
VALUES ('Petit', 'Leon', 'Leon.petit@example.com', 'student123', 'BUT1',3, 2024);

INSERT INTO Etudiants (Nom, Prenom, Email, Mot_de_passe, Niveau, Groupe, promotion)
VALUES ('Roux', 'Antoine', 'antoine.roux@example.com', 'student123', 'BUT1',4, 2024);

INSERT INTO Etudiants (Nom, Prenom, Email, Mot_de_passe, Niveau, Groupe, promotion)
VALUES ('Blanc', 'Emma', 'emma.blanc@example.com', 'student123', 'BUT1',4, 2024);

INSERT INTO Etudiants (Nom, Prenom, Email, Mot_de_passe, Niveau, Groupe, promotion)
VALUES ('Fournier', 'Léa', 'lea.fournier@example.com', 'student123', 'BUT1',5, 2024);

INSERT INTO Etudiants (Nom, Prenom, Email, Mot_de_passe, Niveau, Groupe, promotion)
VALUES ('Girard', 'jacky', 'jacky.girard@example.com', 'student123', 'BUT1',6, 2024);

INSERT INTO Enseignants (Nom, Prenom, login, mdp, Role) VALUES ('Al Salti', 'Nadia', 'nalsalti', 'teacher','enseignant');
INSERT INTO Enseignants (Nom, Prenom, login, mdp, Role) VALUES ('Laroussi', 'Reda', 'rlaroussi', 'teacher','enseignant');
INSERT INTO Enseignants (Nom, Prenom, login, mdp, Role) VALUES ('Boucetta', 'Cherifa', 'cboucetta', 'teacher' ,'enseignant');
INSERT INTO Enseignants (Nom, Prenom, login, mdp, Role) VALUES ('Louise-Alexandrine', 'Patrick', 'plouisealexandrine', 'teacher', 'enseignant');
INSERT INTO Enseignants (Nom, Prenom, login, mdp, Role) VALUES ('Zaidi', 'Fares', 'fzaidi', 'teacher','enseignant');
INSERT INTO Enseignants (Nom, Prenom, login, mdp, Role) VALUES ('Rachedi', 'Abderrezak', 'Rabderrezak', 'teacher','enseignant');
INSERT INTO Enseignants (Nom, Prenom, login, mdp, Role) VALUES ('M, D, ', 'NGUYEN', 'mnguyen', 'teacher', 'enseignant');
INSERT INTO Enseignants (Nom, Prenom, login, mdp, Role) VALUES ('Abdel', 'LHOCINE', 'alhocine', 'teacher','enseignant');
INSERT INTO Enseignants (Nom, Prenom, login, mdp, Role) VALUES ('Nadine', 'Lesseur', 'nlesseur', 'teacher','enseignant');


INSERT INTO administrateur( idAdmin, username ,password) VALUES ('1', 'admin','admin');
