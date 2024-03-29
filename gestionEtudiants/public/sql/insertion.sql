-- Insertion des universités
INSERT INTO Universites (nomU, villeU, paysU, webU)
VALUES 
('Université Toulouse Capitole', 'Toulouse', 'France', 'www.ut-capitole.fr'),
('Université de Madrid', 'Madrid', 'Espagne', 'www.universidadmadrid.es'),
('Université de Lisbonne', 'Lisbonne', 'Portugal', 'www.universidadelisboa.pt'),
('Université de Berlin', 'Berlin', 'Allemagne', 'www.universitatberlin.de'),
('Université de Paris', 'Paris', 'France', 'www.universiteparis.fr'),
('Université de Rome', 'Rome', 'Italie', 'www.universitaroma.it'),
('Université de Londres', 'Londres', 'Royaume-Uni', 'www.universitelondres.uk'),
('Université de New York', 'New York', 'États-Unis', 'www.universitynewyork.us');

-- Insertion des diplômes
INSERT INTO Diplomes (nomDiplome, niveauDiplome, codeU)
VALUES 
('Licence professionnelle RTAI', 'Licence professionnelle', 1),
('Licence Informatique', 'Licence', 1),
('Licence Mathématiques', 'Licence', 1),
('Licence Informatique', 'Licence', 2),
('Licence Mathématiques', 'Licence', 2),
('Licence Informatique', 'Licence', 3),
('Master Développement Web Avancé', 'Master', 3),
('Master Sécurité Informatique', 'Master', 3),
('Master Réseaux et Télécommunications', 'Master', 4),
('Master Systèmes Embarqués', 'Master', 4);

-- Insertion des programmes d'échange pour les diplômes informatiques
INSERT INTO Programmes (nomProgramme, dureeEchange, codeDiplome, codeDiplome_1)
VALUES 
('Programme d\'échange Toulouse-Madrid n°1', 6, 1, 4),
('Programme d\'échange Toulouse-Madrid n°2', 5, 1, 5),
('Programme d\'échange Toulouse-Lisbonne n°1', 7, 1, 6),
('Programme d\'échange Madrid-Toulouse n°1', 6, 4, 1),
('Programme d\'échange Madrid-Toulouse n°2', 7, 5, 1),
('Programme d\'échange Lisbonne-Toulouse', 5, 6, 1),
('Programme d\'échange Berlin-Toulouse', 8, 9, 1),
('Programme d\'échange Toulouse-Berlin', 6, 1, 9);

-- Insertion des programmes d'échange pour les diplômes mathématiques
INSERT INTO Programmes (nomProgramme, dureeEchange, codeDiplome, codeDiplome_1)
VALUES 
('Programme d\'échange Toulouse-Lisbonne n°1', 7, 2, 7),
('Programme d\'échange Toulouse-Lisbonne n°2', 6, 2, 8),
('Programme d\'échange Lisbonne-Toulouse n°1', 8, 7, 2),
('Programme d\'échange Lisbonne-Toulouse n°2', 6, 8, 2);

-- Insertion des cours
INSERT INTO Cours (LibelleCours, nbECTS, annee, codeDiplome)
VALUES 
('Développement Web avancé', '7', 2023, 1),
('Technologies PHP', '6', 2023, 1),
('Technologies Java', '6', 2023, 1),
('Base de données avancées', '7', 2023, 1),
('Algorithmique avancée', '7', 2023, 1),
('Intelligence artificielle', '8', 2023, 1),
('Analyse numérique', '7', 2023, 2),
('Probabilités et statistiques', '7', 2023, 2),
('Théorie des graphes', '7', 2023, 2),
('Programmation avancée', '8', 2023, 2),
('Systèmes distribués', '8', 2023, 2),
('Sécurité informatique', '8', 2023, 2),
('Logique mathématique', '6', 2023, 3),
('Théorie des ensembles', '6', 2023, 3),
('Calcul formel', '7', 2023, 3),
('Cryptographie', '7', 2023, 3),
('Théorie de la complexité', '7', 2023, 3),
('Systèmes dynamiques', '7', 2023, 3),
('Algorithmique répartie', '7', 2023, 4),
('Ingénierie du logiciel', '8', 2023, 4),
('Développement mobile', '8', 2023, 4),
('Cloud computing', '8', 2023, 4),
('Big data', '8', 2023, 4),
('Réseaux informatiques avancés', '8', 2023, 4),
('Architecture des ordinateurs', '7', 2023, 5),
('Systèmes d\'exploitation', '7', 2023, 5),
('Intelligence artificielle avancée', '8', 2023, 5),
('Génie logiciel', '8', 2023, 5),
('Systèmes embarqués', '8', 2023, 5),
('Ingénierie des données', '8', 2023, 5),
('Blockchain et cryptomonnaies', '7', 2023, 6),
('Analyse de données', '7', 2023, 6),
('Sécurité des systèmes informatiques', '7', 2023, 6),
('Applications mobiles avancées', '8', 2023, 6),
('Internet des objets', '8', 2023, 6),
('Développement d\'applications web avancées', '8', 2023, 6),
('Systèmes multi-agents', '7', 2023, 7),
('Intelligence artificielle distribuée', '7', 2023, 7),
('Informatique théorique', '7', 2023, 7),
('Robotique avancée', '8', 2023, 7),
('Systèmes de recommandation', '8', 2023, 7),
('Reconnaissance de formes', '8', 2023, 7),
('Analyse de données massives', '7', 2023, 8),
('Cloud computing avancé', '7', 2023, 8),
('Cybersécurité', '7', 2023, 8),
('Systèmes intelligents', '8', 2023, 8),
('Gestion de projet informatique', '8', 2023, 8);

-- Insertion des étudiants
INSERT INTO Etudiants (numEtudiant, nomEtudiant, prenomEtudiant, mailEtudiant, annee, codeDiplome)
VALUES 
('123456', 'Dupont', 'Jean', 'jean.dupont@example.com', 2023, 1),
('654321', 'Durand', 'Marie', 'marie.durand@example.com', 2023, 2),
('789012', 'Martin', 'Pierre', 'pierre.martin@example.com', 2023, 3),
('210987', 'Lefevre', 'Sophie', 'sophie.lefevre@example.com', 2023, 4),
('111111', 'Garcia', 'Antonio', 'antonio.garcia@example.com', 2023, 5),
('222222', 'Russo', 'Giuseppe', 'giuseppe.russo@example.com', 2023, 6),
('333333', 'Smith', 'John', 'john.smith@example.com', 2023, 7),
('444444', 'Jones', 'Emily', 'emily.jones@example.com', 2023, 8),
('555555', 'Kim', 'Seo-yeon', 'seoyeon.kim@example.com', 2023, 1),
('666666', 'Li', 'Wei', 'wei.li@example.com', 2023, 2);

-- Insertion des demandes de mobilité
INSERT INTO DemandesMobilite (dateDepotDemandeM, etatDemandeM, numEtudiant, codeProgramme)
VALUES 
('2022-11-01', 'en cours', '123456', 1),
('2022-11-01', 'en cours', '654321', 2),
('2022-11-01', 'en cours', '789012', 3),
('2022-11-01', 'en cours', '210987', 4),
('2022-11-01', 'en cours', '111111', 5),
('2022-11-01', 'en cours', '222222', 6),
('2022-11-01', 'en cours', '333333', 7),
('2022-11-01', 'en cours', '444444', 8),
('2022-11-01', 'en cours', '555555', 9),
('2022-11-01', 'en cours', '666666', 10);

-- Insertion des contrats
/*
INSERT INTO Contrats (dureeContrat, etatContrat, codeDemandeM)
VALUES 
(6, 'à réaliser', 1),
(6, 'à réaliser', 2),
(6, 'à réaliser', 3),
(6, 'à réaliser', 4),
(6, 'à réaliser', 5),
(6, 'à réaliser', 6),
(6, 'à réaliser', 7),
(6, 'à réaliser', 8),
(6, 'à réaliser', 9),
(6, 'à réaliser', 10);

-- Insertion des demandes de financement
INSERT INTO DemandesFinancement (dateDepotDemandeF, etatDemandeF, montantDemandeF, codeContrat, numEtudiant)
VALUES 
('2022-12-01', 'en cours', 500, 1, '123456'),
('2022-12-01', 'en cours', 500, 2, '654321'),
('2022-12-01', 'en cours', 500, 3, '789012'),
('2022-12-01', 'en cours', 500, 4, '210987'),
('2022-12-01', 'en cours', 500, 5, '111111'),
('2022-12-01', 'en cours', 500, 6, '222222'),
('2022-12-01', 'en cours', 500, 7, '333333'),
('2022-12-01', 'en cours', 500, 8, '444444'),
('2022-12-01', 'en cours', 500, 9, '555555'),
('2022-12-01', 'en cours', 500, 10, '666666');

*/