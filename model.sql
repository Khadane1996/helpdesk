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


CREATE VIEW vutilisateur AS
SELECT u.*, r.libelle as role
FROM utilisateur u, role r
WHERE u.idRole = r.idRole




CREATE OR REPLACE VIEW vticket AS
SELECT 
  t.*,
  p.libelle as priorite,
  c.libelle as categorie, 
  s.libelle as status, 
  a.prenom  as prenomAuteur,
  a.nom     as nomAuteur,
  b.prenom  as prenomAgent,
  b.nom     as nomAgent

FROM
  (SELECT * FROM ticket) t,
  (SELECT * FROM priorite) p,
  (SELECT * FROM categorie) c,
  (SELECT * FROM status) s,
  (SELECT * FROM utilisateur) a,
  (SELECT * FROM utilisateur) b

WHERE
    t.idPriorite = p.idPriorite AND 
    t.idCategorie = c.idCategorie AND 
    t.idStatus = s.idStatus AND 
    t.idAuteur = a.idUtilisateur AND
    t.idAssigne = b.idUtilisateur








CREATE OR REPLACE VIEW vagent AS
SELECT  DISTINCT 
  u.prenom,
  u.nom,
  u.email,
  u.etat,
  o.tickets_ouverts,
  f.tickets_fermes

FROM
  (SELECT * FROM utilisateur WHERE idRole='2') u,
  (SELECT count(*) AS tickets_ouverts FROM ticket WHERE idStatus='1') o,
  (SELECT count(*) AS tickets_fermes FROM ticket WHERE idStatus='2') f,
  (SELECT idAssigne FROM ticket) t

WHERE   
  u.idUtilisateur = t.idAssigne 




-- SELECT DISTINCT
--  t.*,
--  u.prenom,
--  u.nom


-- FROM
--  (SELECT * FROM ticket) t,
--  (SELECT * FROM utilisateur WHERE idRole='2') u

-- WHERE
--   u.idUtilisateur = t.idAssigne