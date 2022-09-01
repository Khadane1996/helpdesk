CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `prenom` text DEFAULT NULL,
  `nom` text DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `adresse` text DEFAULT NULL,
  `telephone` varchar(80) DEFAULT NULL,
  `idRole` int(11) DEFAULT NULL,
  `login` varchar(80) DEFAULT NULL,
  `motDePasse` text DEFAULT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `role` (
  `idRole` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `libelle` text DEFAULT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `ticket` (
  `idTicket` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `description` text DEFAULT NULL,
  `idAuteur` int(11) NOT NULL,
  `idPriorite` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `idAssigne` int(11) NULL,
  `idStatus` int(11) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `priorite` (
  `idPriorite` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `libelle` text DEFAULT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `categorie` (
  `idCategorie` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `libelle` text DEFAULT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `status` (
  `idStatus` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `libelle` text DEFAULT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE view vutilisateur as
SELECT u.*, r.libelle as role
FROM utilisateur u, role r
WHERE u.idRole = r.idRole


CREATE VIEW vticket AS
SELECT t.*, p.libelle as priorite, c.libelle as categorie, s.libelle as status, a.prenom as prenomAuteur
FROM ticket t, priorite p, categorie c, status s, utilisateur a
WHERE t.idPriorite = p.idPriorite AND t.idCategorie = c.idCategorie AND t.idStatus = s.idStatus AND t.idAuteur = a.idUtilisateur 