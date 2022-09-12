-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 12 sep. 2022 à 15:04
-- Version du serveur :  8.0.29-0ubuntu0.20.04.3
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `helpdesk`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int NOT NULL,
  `libelle` text,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelle`, `dateAjout`, `etat`) VALUES
(1, 'Logiciel', '2022-08-25 11:26:09', 1),
(3, 'Matériel', '2022-08-25 16:22:30', 1);

-- --------------------------------------------------------

--
-- Structure de la table `priorite`
--

CREATE TABLE `priorite` (
  `idPriorite` int NOT NULL,
  `libelle` text,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `priorite`
--

INSERT INTO `priorite` (`idPriorite`, `libelle`, `dateAjout`, `etat`) VALUES
(2, 'Haute', '2022-08-29 22:11:53', 1),
(3, 'Moyenne', '2022-08-29 22:12:14', 1),
(4, 'Basse', '2022-08-29 23:04:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idRole` int NOT NULL,
  `libelle` text,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `libelle`, `dateAjout`, `etat`) VALUES
(1, 'Administrateur', '2022-08-20 23:52:22', 1),
(2, 'Agent', '2022-08-20 23:52:22', 1),
(3, 'Utilisateur simple', '2022-08-20 23:52:22', 1);

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `idStatus` int NOT NULL,
  `libelle` text,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`idStatus`, `libelle`, `dateAjout`, `etat`) VALUES
(1, 'Ouvert', '2022-08-25 12:01:41', 1),
(2, 'Fermé', '2022-08-25 12:21:03', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int NOT NULL,
  `description` text,
  `idAuteur` int NOT NULL,
  `idPriorite` int NOT NULL,
  `idCategorie` int NOT NULL,
  `idAssigne` int DEFAULT NULL,
  `idStatus` int NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`idTicket`, `description`, `idAuteur`, `idPriorite`, `idCategorie`, `idAssigne`, `idStatus`, `dateAjout`, `etat`) VALUES
(15, 'Problème d\'accès', 9, 2, 1, 8, 1, '2022-09-07 15:39:33', 1),
(16, 'Problème réseaux', 1, 9, 2, 15, 1, '2022-09-08 11:35:41', 1),
(17, 'Problème de connexion', 9, 4, 1, 15, 1, '2022-09-08 11:36:14', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int NOT NULL,
  `prenom` text,
  `nom` text,
  `email` varchar(300) DEFAULT NULL,
  `adresse` text,
  `telephone` varchar(80) DEFAULT NULL,
  `idRole` int DEFAULT NULL,
  `login` varchar(80) DEFAULT NULL,
  `motDePasse` text,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `prenom`, `nom`, `email`, `adresse`, `telephone`, `idRole`, `login`, `motDePasse`, `dateAjout`, `etat`) VALUES
(8, 'Serigne Saliou', 'Dione', 'serignesalioudione@esp.sn', 'yoff apecsy 1 n232', '774980254', 2, 'agent2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-09-06 10:33:54', 0),
(9, 'serigne', 'dione', 'papa.nho99@gmail.com', 'yoff apecsy 1 n232', '07 74 98 02 54', 1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-09-07 00:59:43', 1),
(15, 'prénomUser1', 'nomUser1', 'serignesalioudione1@esp.sn', 'dakar', '123456789', 3, 'user1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-09-08 11:32:23', 0),
(16, 'Abdou', 'Fall', 'abdoufall@gmail.com', 'Mbour', '772586941', 1, 'abdou', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2022-09-12 12:03:25', 1);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vagent`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vagent` (
`email` varchar(300)
,`etat` int
,`nom` text
,`prenom` text
,`tickets_fermes` bigint
,`tickets_ouverts` bigint
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vticket`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vticket` (
`categorie` text
,`dateAjout` timestamp
,`description` text
,`etat` int
,`idAssigne` int
,`idAuteur` int
,`idCategorie` int
,`idPriorite` int
,`idStatus` int
,`idTicket` int
,`nomAgent` text
,`nomAuteur` text
,`prenomAgent` text
,`prenomAuteur` text
,`priorite` text
,`status` text
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vutilisateur`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vutilisateur` (
`adresse` text
,`dateAjout` timestamp
,`email` varchar(300)
,`etat` int
,`idRole` int
,`idUtilisateur` int
,`login` varchar(80)
,`motDePasse` text
,`nom` text
,`prenom` text
,`role` text
,`telephone` varchar(80)
);

-- --------------------------------------------------------

--
-- Structure de la vue `vagent`
--
DROP TABLE IF EXISTS `vagent`;

CREATE ALGORITHM=UNDEFINED DEFINER=`phpmyadmin1`@`localhost` SQL SECURITY DEFINER VIEW `vagent`  AS  select distinct `u`.`prenom` AS `prenom`,`u`.`nom` AS `nom`,`u`.`email` AS `email`,`u`.`etat` AS `etat`,`o`.`tickets_ouverts` AS `tickets_ouverts`,`f`.`tickets_fermes` AS `tickets_fermes` from ((((select `utilisateur`.`idUtilisateur` AS `idUtilisateur`,`utilisateur`.`prenom` AS `prenom`,`utilisateur`.`nom` AS `nom`,`utilisateur`.`email` AS `email`,`utilisateur`.`adresse` AS `adresse`,`utilisateur`.`telephone` AS `telephone`,`utilisateur`.`idRole` AS `idRole`,`utilisateur`.`login` AS `login`,`utilisateur`.`motDePasse` AS `motDePasse`,`utilisateur`.`dateAjout` AS `dateAjout`,`utilisateur`.`etat` AS `etat` from `utilisateur` where (`utilisateur`.`idRole` = '2')) `u` join (select count(0) AS `tickets_ouverts` from `ticket` where (`ticket`.`idStatus` = '1')) `o`) join (select count(0) AS `tickets_fermes` from `ticket` where (`ticket`.`idStatus` = '2')) `f`) join (select `ticket`.`idAssigne` AS `idAssigne` from `ticket`) `t`) where (`u`.`idUtilisateur` = `t`.`idAssigne`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vticket`
--
DROP TABLE IF EXISTS `vticket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`phpmyadmin1`@`localhost` SQL SECURITY DEFINER VIEW `vticket`  AS  select `t`.`idTicket` AS `idTicket`,`t`.`description` AS `description`,`t`.`idAuteur` AS `idAuteur`,`t`.`idPriorite` AS `idPriorite`,`t`.`idCategorie` AS `idCategorie`,`t`.`idAssigne` AS `idAssigne`,`t`.`idStatus` AS `idStatus`,`t`.`dateAjout` AS `dateAjout`,`t`.`etat` AS `etat`,`p`.`libelle` AS `priorite`,`c`.`libelle` AS `categorie`,`s`.`libelle` AS `status`,`a`.`prenom` AS `prenomAuteur`,`a`.`nom` AS `nomAuteur`,`b`.`prenom` AS `prenomAgent`,`b`.`nom` AS `nomAgent` from ((((((select `ticket`.`idTicket` AS `idTicket`,`ticket`.`description` AS `description`,`ticket`.`idAuteur` AS `idAuteur`,`ticket`.`idPriorite` AS `idPriorite`,`ticket`.`idCategorie` AS `idCategorie`,`ticket`.`idAssigne` AS `idAssigne`,`ticket`.`idStatus` AS `idStatus`,`ticket`.`dateAjout` AS `dateAjout`,`ticket`.`etat` AS `etat` from `ticket`) `t` join (select `priorite`.`idPriorite` AS `idPriorite`,`priorite`.`libelle` AS `libelle`,`priorite`.`dateAjout` AS `dateAjout`,`priorite`.`etat` AS `etat` from `priorite`) `p`) join (select `categorie`.`idCategorie` AS `idCategorie`,`categorie`.`libelle` AS `libelle`,`categorie`.`dateAjout` AS `dateAjout`,`categorie`.`etat` AS `etat` from `categorie`) `c`) join (select `status`.`idStatus` AS `idStatus`,`status`.`libelle` AS `libelle`,`status`.`dateAjout` AS `dateAjout`,`status`.`etat` AS `etat` from `status`) `s`) join (select `utilisateur`.`idUtilisateur` AS `idUtilisateur`,`utilisateur`.`prenom` AS `prenom`,`utilisateur`.`nom` AS `nom`,`utilisateur`.`email` AS `email`,`utilisateur`.`adresse` AS `adresse`,`utilisateur`.`telephone` AS `telephone`,`utilisateur`.`idRole` AS `idRole`,`utilisateur`.`login` AS `login`,`utilisateur`.`motDePasse` AS `motDePasse`,`utilisateur`.`dateAjout` AS `dateAjout`,`utilisateur`.`etat` AS `etat` from `utilisateur`) `a`) join (select `utilisateur`.`idUtilisateur` AS `idUtilisateur`,`utilisateur`.`prenom` AS `prenom`,`utilisateur`.`nom` AS `nom`,`utilisateur`.`email` AS `email`,`utilisateur`.`adresse` AS `adresse`,`utilisateur`.`telephone` AS `telephone`,`utilisateur`.`idRole` AS `idRole`,`utilisateur`.`login` AS `login`,`utilisateur`.`motDePasse` AS `motDePasse`,`utilisateur`.`dateAjout` AS `dateAjout`,`utilisateur`.`etat` AS `etat` from `utilisateur`) `b`) where ((`t`.`idPriorite` = `p`.`idPriorite`) and (`t`.`idCategorie` = `c`.`idCategorie`) and (`t`.`idStatus` = `s`.`idStatus`) and (`t`.`idAuteur` = `a`.`idUtilisateur`) and (`t`.`idAssigne` = `b`.`idUtilisateur`)) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vutilisateur`
--
DROP TABLE IF EXISTS `vutilisateur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`phpmyadmin1`@`localhost` SQL SECURITY DEFINER VIEW `vutilisateur`  AS  select `u`.`idUtilisateur` AS `idUtilisateur`,`u`.`prenom` AS `prenom`,`u`.`nom` AS `nom`,`u`.`email` AS `email`,`u`.`adresse` AS `adresse`,`u`.`telephone` AS `telephone`,`u`.`idRole` AS `idRole`,`u`.`login` AS `login`,`u`.`motDePasse` AS `motDePasse`,`u`.`dateAjout` AS `dateAjout`,`u`.`etat` AS `etat`,`r`.`libelle` AS `role` from (`utilisateur` `u` join `role` `r`) where (`u`.`idRole` = `r`.`idRole`) ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `priorite`
--
ALTER TABLE `priorite`
  ADD PRIMARY KEY (`idPriorite`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idStatus`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `priorite`
--
ALTER TABLE `priorite`
  MODIFY `idPriorite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `idStatus` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
