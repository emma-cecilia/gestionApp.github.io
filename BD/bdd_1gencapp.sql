-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 04 déc. 2022 à 18:18
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_1gencapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

DROP TABLE IF EXISTS `affectation`;
CREATE TABLE IF NOT EXISTS `affectation` (
  `id_affectation` int(10) NOT NULL AUTO_INCREMENT,
  `date_affectation` date DEFAULT NULL,
  PRIMARY KEY (`id_affectation`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

DROP TABLE IF EXISTS `authentification`;
CREATE TABLE IF NOT EXISTS `authentification` (
  `id_authentication` int(10) NOT NULL AUTO_INCREMENT,
  `nom` text,
  `statut` text,
  `identifiant` text,
  `motDePasse` text,
  PRIMARY KEY (`id_authentication`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `authentification`
--

INSERT INTO `authentification` (`id_authentication`, `nom`, `statut`, `identifiant`, `motDePasse`) VALUES
(1, 'ADMIN', 'Administrateur', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `banque`
--

DROP TABLE IF EXISTS `banque`;
CREATE TABLE IF NOT EXISTS `banque` (
  `id_banque` int(10) NOT NULL AUTO_INCREMENT,
  `libelle_bank` text,
  PRIMARY KEY (`id_banque`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `banque`
--

INSERT INTO `banque` (`id_banque`, `libelle_bank`) VALUES
(1, 'ECOBANK'),
(2, 'UBA');

-- --------------------------------------------------------

--
-- Structure de la table `campus`
--

DROP TABLE IF EXISTS `campus`;
CREATE TABLE IF NOT EXISTS `campus` (
  `id_campus` int(10) NOT NULL AUTO_INCREMENT,
  `libelle_camp` text,
  `id_ville` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_campus`),
  KEY `FK_campus_id_ville` (`id_ville`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `campus`
--

INSERT INTO `campus` (`id_campus`, `libelle_camp`, `id_ville`) VALUES
(1, 'BZV', 1),
(2, 'PN', 2),
(3, 'OY', 3),
(4, 'DO', 4),
(5, 'OU', 5);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(10) NOT NULL AUTO_INCREMENT,
  `tel_client` text,
  `libelle_client` text,
  `email_client` text,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(10) NOT NULL AUTO_INCREMENT,
  `commentaire` text,
  `id_Auteur` int(10) DEFAULT NULL,
  `date_com` datetime DEFAULT NULL,
  `id_personnel` int(10) DEFAULT NULL,
  `id_etudiant` int(10) DEFAULT NULL,
  `id_SessiondeFormation` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `commentaire`, `id_Auteur`, `date_com`, `id_personnel`, `id_etudiant`, `id_SessiondeFormation`) VALUES
(2, 'Bonjour !', 1, '2022-11-28 20:26:34', NULL, 22, NULL),
(3, 'Salut!', 1, '2022-11-28 20:28:37', NULL, 23, NULL),
(4, 'Bonjour et Bienvenu à la GENC  .', 1, '2022-11-28 20:37:04', NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Structure de la table `compteglpi`
--

DROP TABLE IF EXISTS `compteglpi`;
CREATE TABLE IF NOT EXISTS `compteglpi` (
  `id_compteGPLI` int(10) NOT NULL AUTO_INCREMENT,
  `numero_compte` text,
  `personnel_id_personnel` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_compteGPLI`),
  KEY `FK_compteGLPI_personnel_id_personnel` (`personnel_id_personnel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `conge`
--

DROP TABLE IF EXISTS `conge`;
CREATE TABLE IF NOT EXISTS `conge` (
  `id_conge` int(10) NOT NULL AUTO_INCREMENT,
  `date_demand` date DEFAULT NULL,
  `date_debut_conge` date DEFAULT NULL,
  `date_fin_conge` date DEFAULT NULL,
  `statut_damand` text,
  `id_typeConge` int(10) NOT NULL,
  `id_personnel` int(10) NOT NULL,
  PRIMARY KEY (`id_conge`),
  KEY `FK_conge_id_typeConge` (`id_typeConge`),
  KEY `FK_conge_id_personnel` (`id_personnel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

DROP TABLE IF EXISTS `enseigner`;
CREATE TABLE IF NOT EXISTS `enseigner` (
  `id_sessionFormation` int(10) NOT NULL AUTO_INCREMENT,
  `id_personnel` int(10) NOT NULL,
  PRIMARY KEY (`id_sessionFormation`,`id_personnel`),
  KEY `FK_enseigner_id_personnel` (`id_personnel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_etudiant` int(10) NOT NULL AUTO_INCREMENT,
  `nom_etud` text,
  `prenom_etud` text,
  `email_etud` text,
  `tel_etud` text,
  `adresse_etud` text,
  `ville_test_etud` text,
  `date_test_etud` date DEFAULT NULL,
  `date_sessionForm_etud` date DEFAULT NULL,
  `date_insc_sess_etud` date DEFAULT NULL,
  `ville_form_etud` text,
  `vague_form_etud` text,
  `statut_etud` text,
  `date_nais_etud` date DEFAULT NULL,
  `lieu_nais_etud` text,
  `url_photo_etud` text,
  `url_pieceId_etud` text,
  `url_actNais_etud` text,
  `url_attNivo_etud` text,
  `groupeutilisateur_id_groupeutilisateur` int(10) DEFAULT NULL,
  `sessionformation_id_sessionformation` int(10) DEFAULT NULL,
  `modeldocument_id_modeldocument` int(10) DEFAULT NULL,
  `supprimer` int(1) DEFAULT '0',
  `ville_adresse` text,
  `tel2_etud` text,
  `note_finale` int(2) DEFAULT '0',
  `classe` text,
  `commentaire` text,
  `note_test` int(2) DEFAULT '0',
  PRIMARY KEY (`id_etudiant`),
  KEY `FK_etudiant_groupeutilisateur_id_groupeutilisateur` (`groupeutilisateur_id_groupeutilisateur`),
  KEY `FK_etudiant_sessionformation_id_sessionformation` (`sessionformation_id_sessionformation`),
  KEY `FK_etudiant_modeldocument_id_modeldocument` (`modeldocument_id_modeldocument`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom_etud`, `prenom_etud`, `email_etud`, `tel_etud`, `adresse_etud`, `ville_test_etud`, `date_test_etud`, `date_sessionForm_etud`, `date_insc_sess_etud`, `ville_form_etud`, `vague_form_etud`, `statut_etud`, `date_nais_etud`, `lieu_nais_etud`, `url_photo_etud`, `url_pieceId_etud`, `url_actNais_etud`, `url_attNivo_etud`, `groupeutilisateur_id_groupeutilisateur`, `sessionformation_id_sessionformation`, `modeldocument_id_modeldocument`, `supprimer`, `ville_adresse`, `tel2_etud`, `note_finale`, `classe`, `commentaire`, `note_test`) VALUES
(22, 'Mambou', 'Danielle', 'mambou.danielle@gmail.com', '0215897633', 'Résidence Raymond Aron 3 Rue  Robert Schuman', '1', '2019-10-16', '2019-11-12', NULL, '1', '1', 'Inscrit', '2021-07-14', 'Brazzaville', NULL, NULL, NULL, NULL, NULL, 10, NULL, 0, 'MASSY', '', 20, NULL, 'Bonjour!', 18),
(23, 'Bikoumou', 'Jeanne', 'bikoumou.jeanne@gmail.com', '1234578966', '2 Pl. des Italiens, 91300 Massy, France', '1', '2019-10-16', '2019-11-12', NULL, '1', '1', 'préinscription', '1998-06-16', 'Brazzaville', NULL, NULL, NULL, NULL, NULL, 10, NULL, 0, 'ST MICHEL SUR ORGE', '', 19, NULL, 'Salut', 17);

-- --------------------------------------------------------

--
-- Structure de la table `exercer`
--

DROP TABLE IF EXISTS `exercer`;
CREATE TABLE IF NOT EXISTS `exercer` (
  `id_personnel` int(10) NOT NULL AUTO_INCREMENT,
  `id_fonction` int(10) NOT NULL,
  PRIMARY KEY (`id_personnel`,`id_fonction`),
  KEY `FK_exercer_id_fonction` (`id_fonction`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id_facture` int(10) NOT NULL AUTO_INCREMENT,
  `montant_FF` int(20) DEFAULT NULL,
  `raison_FF` text,
  `reference_Paie_FF` text,
  `date_saisie_FF` date DEFAULT NULL,
  `date_Paie_FF` date DEFAULT NULL,
  `date_echeance_FF` date DEFAULT NULL,
  `commentaires` text,
  `id_campus` int(10) NOT NULL,
  `id_client` int(10) NOT NULL,
  `id_typePaiement` int(50) NOT NULL,
  `id_fournisseur` int(10) NOT NULL,
  PRIMARY KEY (`id_facture`),
  KEY `FK_facture_id_campus` (`id_campus`),
  KEY `FK_facture_id_client` (`id_client`),
  KEY `FK_facture_id_typePaiement` (`id_typePaiement`),
  KEY `FK_facture_id_fournisseur` (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `figurer`
--

DROP TABLE IF EXISTS `figurer`;
CREATE TABLE IF NOT EXISTS `figurer` (
  `id_etudiant` int(10) NOT NULL AUTO_INCREMENT,
  `id_presence` int(50) NOT NULL,
  `id_personnel` int(10) NOT NULL,
  PRIMARY KEY (`id_etudiant`,`id_presence`,`id_personnel`),
  KEY `FK_figurer_id_presence` (`id_presence`),
  KEY `FK_figurer_id_personnel` (`id_personnel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

DROP TABLE IF EXISTS `fonction`;
CREATE TABLE IF NOT EXISTS `fonction` (
  `id_fonction` int(10) NOT NULL AUTO_INCREMENT,
  `libelle_fonct` text,
  `abbreviation_fonct` text,
  PRIMARY KEY (`id_fonction`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fournisseur` int(10) NOT NULL AUTO_INCREMENT,
  `libelle_fourn` text,
  `tel_fourn` int(20) DEFAULT NULL,
  `email_fourn` text,
  `numRIB_fourn` int(30) DEFAULT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `grillesalaire`
--

DROP TABLE IF EXISTS `grillesalaire`;
CREATE TABLE IF NOT EXISTS `grillesalaire` (
  `id_grilleSalaire` int(20) NOT NULL AUTO_INCREMENT,
  `libelle_cat` text,
  `salaire_brut` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_grilleSalaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupeutilisateur`
--

DROP TABLE IF EXISTS `groupeutilisateur`;
CREATE TABLE IF NOT EXISTS `groupeutilisateur` (
  `id_groupeUtilisateur` int(10) NOT NULL AUTO_INCREMENT,
  `libelle_GU` text,
  `niveau_acces_GU` text,
  `description_droit_GU` text,
  PRIMARY KEY (`id_groupeUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lignefacture`
--

DROP TABLE IF EXISTS `lignefacture`;
CREATE TABLE IF NOT EXISTS `lignefacture` (
  `id_ligneFacture` int(10) NOT NULL AUTO_INCREMENT,
  `libellé_prod_LF` text,
  `pu_prod_LF` int(20) DEFAULT NULL,
  `pt_prod_LF` int(40) DEFAULT NULL,
  `qty_prod_LF` int(10) DEFAULT NULL,
  `id_facture` int(10) NOT NULL,
  PRIMARY KEY (`id_ligneFacture`),
  KEY `FK_ligneFacture_id_facture` (`id_facture`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `modeldocument`
--

DROP TABLE IF EXISTS `modeldocument`;
CREATE TABLE IF NOT EXISTS `modeldocument` (
  `id_modelDocument` int(10) NOT NULL AUTO_INCREMENT,
  `num_Ref_MD` text,
  `libelle_MD` text,
  PRIMARY KEY (`id_modelDocument`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `passer`
--

DROP TABLE IF EXISTS `passer`;
CREATE TABLE IF NOT EXISTS `passer` (
  `id_testSession` int(10) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(10) NOT NULL,
  `result_test_etud` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_testSession`,`id_etudiant`),
  KEY `FK_passer_id_etudiant` (`id_etudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int(10) NOT NULL AUTO_INCREMENT,
  `libelle_pays` text,
  PRIMARY KEY (`id_pays`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `libelle_pays`) VALUES
(1, 'CONGO');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

DROP TABLE IF EXISTS `personnel`;
CREATE TABLE IF NOT EXISTS `personnel` (
  `id_personnel` int(10) NOT NULL AUTO_INCREMENT,
  `nom_pers` text,
  `prenom_pers` text,
  `email_pers` text,
  `tel_pers` text,
  `adresse_pers` text,
  `date_naiss_pers` date DEFAULT NULL,
  `lieu_naiss_pers` text,
  `matricule_pers` text,
  `nbr_enfant_pers` int(3) DEFAULT NULL,
  `numRIB_pers` text,
  `id_groupeUtilisateur` int(10) DEFAULT NULL,
  `affectation_id_affectation` int(10) DEFAULT NULL,
  `id_service` int(10) DEFAULT NULL,
  `banque_id_banque` int(10) DEFAULT NULL,
  `compteglpi_id_comptegpli` int(10) DEFAULT NULL,
  `supprimer` int(1) NOT NULL DEFAULT '0',
  `ville_adresse` text NOT NULL,
  `tel2_pers` text NOT NULL,
  `affectation` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_personnel`),
  KEY `FK_personnel_id_groupeUtilisateur` (`id_groupeUtilisateur`),
  KEY `FK_personnel_affectation` (`affectation_id_affectation`),
  KEY `FK_personnel_id_service` (`id_service`),
  KEY `FK_personnel_banque_id_banque` (`banque_id_banque`),
  KEY `FK_personnel_compteglpi_id_comptegpli` (`compteglpi_id_comptegpli`),
  KEY `affectation_id_affectation` (`affectation_id_affectation`),
  KEY `affectation_id_affectation_2` (`affectation_id_affectation`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id_personnel`, `nom_pers`, `prenom_pers`, `email_pers`, `tel_pers`, `adresse_pers`, `date_naiss_pers`, `lieu_naiss_pers`, `matricule_pers`, `nbr_enfant_pers`, `numRIB_pers`, `id_groupeUtilisateur`, `affectation_id_affectation`, `id_service`, `banque_id_banque`, `compteglpi_id_comptegpli`, `supprimer`, `ville_adresse`, `tel2_pers`, `affectation`) VALUES
(8, 'Ngolo', 'Brédège', 'Ngolo.bredège@gmail.com', '0238745699', '2 avenue maya maya', '1998-06-30', 'Brazzaville', '8977', 1, '987456321', NULL, NULL, 1, NULL, NULL, 0, 'Plateau', '', 1),
(9, 'Boukaka', 'Cecilia Emmanuelle', 'boukaka.ceciliaemma@gmail.com', '0758170682', 'Résidence Raymond Aron 3 Rue  Robert Schuman', '1998-06-30', 'Brazzaville', '2234', 1, '0023698789', NULL, NULL, 1, NULL, NULL, 0, 'MASSY', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

DROP TABLE IF EXISTS `presence`;
CREATE TABLE IF NOT EXISTS `presence` (
  `id_presence` int(10) NOT NULL AUTO_INCREMENT,
  `date_GP` date DEFAULT NULL,
  `matricule_elt_GP` text,
  `heure_arr_GP` time DEFAULT NULL,
  `heure_dep_dem_GP` time DEFAULT NULL,
  `heure_retour_GP` time DEFAULT NULL,
  `heure_dep_fin_GP` time DEFAULT NULL,
  `justificatifs` text,
  `id_reporting` int(20) DEFAULT NULL,
  `id_personnel` int(11) DEFAULT NULL,
  `id_etudiant` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_presence`),
  KEY `FK_presence_id_reporting` (`id_reporting`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reporting`
--

DROP TABLE IF EXISTS `reporting`;
CREATE TABLE IF NOT EXISTS `reporting` (
  `id_reporting` int(20) NOT NULL AUTO_INCREMENT,
  `date_rep` date DEFAULT NULL,
  `numero_rep` date DEFAULT NULL,
  `retard_rep` time DEFAULT NULL,
  `absence_rep` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_reporting`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salaire`
--

DROP TABLE IF EXISTS `salaire`;
CREATE TABLE IF NOT EXISTS `salaire` (
  `id_salaire` int(20) NOT NULL AUTO_INCREMENT,
  `mois_salaire` text,
  `anne_salaire` int(10) DEFAULT NULL,
  `date_paie` date DEFAULT NULL,
  `reference_transact` text,
  `prime_transport` int(20) DEFAULT NULL,
  `prime_ponctualite` int(20) DEFAULT NULL,
  `prime_logement` int(20) DEFAULT NULL,
  `avance_salaire` int(20) DEFAULT NULL,
  `autres_retenus` int(20) DEFAULT NULL,
  `id_grilleSalaire` int(20) NOT NULL,
  `id_typePaiement` int(50) NOT NULL,
  `id_personnel` int(10) NOT NULL,
  PRIMARY KEY (`id_salaire`),
  KEY `FK_salaire_id_grilleSalaire` (`id_grilleSalaire`),
  KEY `FK_salaire_id_typePaiement` (`id_typePaiement`),
  KEY `FK_salaire_id_personnel` (`id_personnel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int(20) NOT NULL AUTO_INCREMENT,
  `numero_sall` text,
  `id_campus` int(10) NOT NULL,
  PRIMARY KEY (`id_salle`),
  KEY `FK_salle_id_campus` (`id_campus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(10) NOT NULL AUTO_INCREMENT,
  `libelle` text,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `libelle`) VALUES
(1, 'Formation'),
(2, 'Scolarité'),
(3, 'Technique'),
(4, 'Administration');

-- --------------------------------------------------------

--
-- Structure de la table `sessionformation`
--

DROP TABLE IF EXISTS `sessionformation`;
CREATE TABLE IF NOT EXISTS `sessionformation` (
  `id_sessionFormation` int(15) NOT NULL AUTO_INCREMENT,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `id1_formateur` int(10) DEFAULT NULL,
  `id2_formateur` int(10) DEFAULT NULL,
  `id_campus` int(10) DEFAULT NULL,
  `id_typeFormation` int(5) DEFAULT NULL,
  `classe` text,
  `supprimer` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sessionFormation`),
  KEY `FK_sessionFormation_id_campus` (`id_campus`),
  KEY `FK_sessionFormation_id_typeFormation` (`id_typeFormation`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sessionformation`
--

INSERT INTO `sessionformation` (`id_sessionFormation`, `date_debut`, `date_fin`, `id1_formateur`, `id2_formateur`, `id_campus`, `id_typeFormation`, `classe`, `supprimer`) VALUES
(10, '2019-11-12', '2020-06-23', 9, 8, 1, 1, 'Classe  1', 0);

-- --------------------------------------------------------

--
-- Structure de la table `testsession`
--

DROP TABLE IF EXISTS `testsession`;
CREATE TABLE IF NOT EXISTS `testsession` (
  `id_testSession` int(10) NOT NULL AUTO_INCREMENT,
  `Type_test` text,
  `date_debut_test` date DEFAULT NULL,
  `date_fin_test` date DEFAULT NULL,
  `nbr_candidat` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_testSession`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typeconge`
--

DROP TABLE IF EXISTS `typeconge`;
CREATE TABLE IF NOT EXISTS `typeconge` (
  `id_typeConge` int(10) NOT NULL AUTO_INCREMENT,
  `Libellé_type` text,
  PRIMARY KEY (`id_typeConge`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typeformation`
--

DROP TABLE IF EXISTS `typeformation`;
CREATE TABLE IF NOT EXISTS `typeformation` (
  `id_typeFormation` int(10) NOT NULL AUTO_INCREMENT,
  `libelle_typForm` text,
  `prix_typForm` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_typeFormation`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typeformation`
--

INSERT INTO `typeformation` (`id_typeFormation`, `libelle_typForm`, `prix_typForm`) VALUES
(1, 'Gratuite JOUR', 0),
(2, 'Payante Soir', 1000);

-- --------------------------------------------------------

--
-- Structure de la table `typepaiement`
--

DROP TABLE IF EXISTS `typepaiement`;
CREATE TABLE IF NOT EXISTS `typepaiement` (
  `id_typePaiement` int(50) NOT NULL AUTO_INCREMENT,
  `libelle_typPaie` text,
  PRIMARY KEY (`id_typePaiement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id_ville` int(10) NOT NULL AUTO_INCREMENT,
  `libelle_vil` text,
  `id_pays` int(10) NOT NULL,
  PRIMARY KEY (`id_ville`),
  KEY `FK_ville_id_pays` (`id_pays`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `libelle_vil`, `id_pays`) VALUES
(1, 'Brazzaville', 1),
(2, 'Pointe-Noire', 1),
(3, 'Oyo', 1),
(4, 'Dolisie', 1),
(5, 'Ouesso', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `campus`
--
ALTER TABLE `campus`
  ADD CONSTRAINT `FK_campus_id_ville` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`);

--
-- Contraintes pour la table `compteglpi`
--
ALTER TABLE `compteglpi`
  ADD CONSTRAINT `FK_compteGLPI_personnel_id_personnel` FOREIGN KEY (`personnel_id_personnel`) REFERENCES `personnel` (`id_personnel`);

--
-- Contraintes pour la table `conge`
--
ALTER TABLE `conge`
  ADD CONSTRAINT `FK_conge_id_personnel` FOREIGN KEY (`id_personnel`) REFERENCES `personnel` (`id_personnel`),
  ADD CONSTRAINT `FK_conge_id_typeConge` FOREIGN KEY (`id_typeConge`) REFERENCES `typeconge` (`id_typeConge`);

--
-- Contraintes pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD CONSTRAINT `FK_enseigner_id_personnel` FOREIGN KEY (`id_personnel`) REFERENCES `personnel` (`id_personnel`),
  ADD CONSTRAINT `FK_enseigner_id_sessionFormation` FOREIGN KEY (`id_sessionFormation`) REFERENCES `sessionformation` (`id_sessionFormation`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_etudiant_groupeutilisateur_id_groupeutilisateur` FOREIGN KEY (`groupeutilisateur_id_groupeutilisateur`) REFERENCES `groupeutilisateur` (`id_groupeUtilisateur`),
  ADD CONSTRAINT `FK_etudiant_modeldocument_id_modeldocument` FOREIGN KEY (`modeldocument_id_modeldocument`) REFERENCES `modeldocument` (`id_modelDocument`),
  ADD CONSTRAINT `FK_etudiant_sessionformation_id_sessionformation` FOREIGN KEY (`sessionformation_id_sessionformation`) REFERENCES `sessionformation` (`id_sessionFormation`);

--
-- Contraintes pour la table `exercer`
--
ALTER TABLE `exercer`
  ADD CONSTRAINT `FK_exercer_id_fonction` FOREIGN KEY (`id_fonction`) REFERENCES `fonction` (`id_fonction`),
  ADD CONSTRAINT `FK_exercer_id_personnel` FOREIGN KEY (`id_personnel`) REFERENCES `personnel` (`id_personnel`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `FK_facture_id_campus` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id_campus`),
  ADD CONSTRAINT `FK_facture_id_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `FK_facture_id_fournisseur` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`),
  ADD CONSTRAINT `FK_facture_id_typePaiement` FOREIGN KEY (`id_typePaiement`) REFERENCES `typepaiement` (`id_typePaiement`);

--
-- Contraintes pour la table `figurer`
--
ALTER TABLE `figurer`
  ADD CONSTRAINT `FK_figurer_id_etudiant` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `FK_figurer_id_personnel` FOREIGN KEY (`id_personnel`) REFERENCES `personnel` (`id_personnel`),
  ADD CONSTRAINT `FK_figurer_id_presence` FOREIGN KEY (`id_presence`) REFERENCES `presence` (`id_presence`);

--
-- Contraintes pour la table `lignefacture`
--
ALTER TABLE `lignefacture`
  ADD CONSTRAINT `FK_ligneFacture_id_facture` FOREIGN KEY (`id_facture`) REFERENCES `facture` (`id_facture`);

--
-- Contraintes pour la table `passer`
--
ALTER TABLE `passer`
  ADD CONSTRAINT `FK_passer_id_etudiant` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `FK_passer_id_testSession` FOREIGN KEY (`id_testSession`) REFERENCES `testsession` (`id_testSession`);

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `FK_personnel_affectation` FOREIGN KEY (`affectation_id_affectation`) REFERENCES `affectation` (`id_affectation`),
  ADD CONSTRAINT `FK_personnel_banque_id_banque` FOREIGN KEY (`banque_id_banque`) REFERENCES `banque` (`id_banque`),
  ADD CONSTRAINT `FK_personnel_compteglpi_id_comptegpli` FOREIGN KEY (`compteglpi_id_comptegpli`) REFERENCES `compteglpi` (`id_compteGPLI`),
  ADD CONSTRAINT `FK_personnel_id_groupeUtilisateur` FOREIGN KEY (`id_groupeUtilisateur`) REFERENCES `groupeutilisateur` (`id_groupeUtilisateur`),
  ADD CONSTRAINT `FK_personnel_id_service` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);

--
-- Contraintes pour la table `presence`
--
ALTER TABLE `presence`
  ADD CONSTRAINT `FK_presence_id_reporting` FOREIGN KEY (`id_reporting`) REFERENCES `reporting` (`id_reporting`);

--
-- Contraintes pour la table `salaire`
--
ALTER TABLE `salaire`
  ADD CONSTRAINT `FK_salaire_id_grilleSalaire` FOREIGN KEY (`id_grilleSalaire`) REFERENCES `grillesalaire` (`id_grilleSalaire`),
  ADD CONSTRAINT `FK_salaire_id_personnel` FOREIGN KEY (`id_personnel`) REFERENCES `personnel` (`id_personnel`),
  ADD CONSTRAINT `FK_salaire_id_typePaiement` FOREIGN KEY (`id_typePaiement`) REFERENCES `typepaiement` (`id_typePaiement`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `FK_salle_id_campus` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id_campus`);

--
-- Contraintes pour la table `sessionformation`
--
ALTER TABLE `sessionformation`
  ADD CONSTRAINT `FK_sessionFormation_id_campus` FOREIGN KEY (`id_campus`) REFERENCES `campus` (`id_campus`),
  ADD CONSTRAINT `FK_sessionFormation_id_typeFormation` FOREIGN KEY (`id_typeFormation`) REFERENCES `typeformation` (`id_typeFormation`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `FK_ville_id_pays` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
