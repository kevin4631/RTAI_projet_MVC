-- Suppression des données des tables
-- Désactivation des contraintes de clé étrangère
SET FOREIGN_KEY_CHECKS = 0;

-- Suppression des données des tables avec TRUNCATE
TRUNCATE TABLE Concerner;
TRUNCATE TABLE Compatible;
TRUNCATE TABLE DemandesFinancement;
TRUNCATE TABLE Contrats;
TRUNCATE TABLE DemandesMobilite;
TRUNCATE TABLE Etudiants;
TRUNCATE TABLE Cours;
TRUNCATE TABLE Programmes;
TRUNCATE TABLE Diplomes;
TRUNCATE TABLE Universites;

-- Réactivation des contraintes de clé étrangère
SET FOREIGN_KEY_CHECKS = 1;