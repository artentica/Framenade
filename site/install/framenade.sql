--
-- Structure de la table `data`
--

CREATE TABLE `data` (
  `id` int(11)  AUTO_INCREMENT PRIMARY KEY,
  `identifiant` varchar(255),
  `nom_fils` varchar(255) ,
  `prenom_fils` varchar(255),
  `ddn_fils` varchar(256),
  `tel_mobile` varchar(256),
  `courriel` varchar(256),
  `date` datetime,
  `ip` varchar(32) 
) ENGINE=InnoDB AUTO_INCREMENT=1 ;

--
-- Structure de la table `promo`
--

CREATE TABLE `promo` (
  `id`      int(3)       AUTO_INCREMENT,
  `libelle` varchar(60),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id`      int(11)       AUTO_INCREMENT,
  `rang`    int(11),
  `promo`   int(20),
  `libelle` varchar(256),
  `fichier` varchar(256),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`promo`) REFERENCES promo(id)
) ENGINE=InnoDB AUTO_INCREMENT=63;


-- --------------------------------------------------------

--
-- Contenu de la table `promo`
--

INSERT INTO `promo` (`id`, `libelle`) VALUES
(1, '1ère année, Cycle Sciences de l''Ingénieur'),
(2, '1ère année, Cycle Informatique et Réseaux (Brest)'),
(3, '1ère année, Cycle Informatique et Réseaux (Rennes)'),
(4, '1ère année, BTS Prépa'),
(5, '2ème année, Cycle Sciences de l''Ingénieur'),
(6, '2ème année, Cycle Informatique et Réseaux (Brest)'),
(7, '2ème année, Cycle Informatique et Réseaux (Rennes)'),
(8, '2ème année, BTS Prépa'),
(9, '3ème année, Cycle Sciences de l''Ingénieur'),
(10, '3ème année, Cycle Informatique et Réseaux (alternant)'),
(11, '3ème année, Cycle Informatique et Réseaux (non alternant)'),
(12, '3ème année, Apprentissage (ITII)'),
(13, '4ème année, Majeure (M1)'),
(14, '4ème année, Apprentissage (ITII)'),
(15, '5ème année, Majeure (M2, alternant)'),
(16, '5ème année, Majeure (M2, non alternant)'),
(17, '5ème année, Apprentissage (ITII)'),
(18, 'All');


--
-- Contenu de la table `document`
--

INSERT INTO `document` (`id`, `rang`, `promo`, `libelle`, `fichier`) VALUES
(1, 1, 18, 'Dates des rentrées à l''ISEN-Brest/Rennes', 'datesRentreesISENBrestRennes1213.pdf'),
(2, 2, 18, 'Sécurité Sociale étudiante mode d''emploi', 'secuModeEmploi1213.pdf'),
(3, 3, 18, 'LMDE', 'LMDErentree2012.pdf'),
(4, 4, 18, 'SMEBA', 'SMEBArentree2012.pdf'),
(5, 8, 18, 'Isenien : mode d’emploi !', 'livretAccueilBDE.pdf'),
(6, 5, 18, 'Offre banque BNP', 'BNPOffreRentree2012.pdf'),
(7, 6, 18, 'Offre banque CMB', 'CMBOffreRentree2012.pdf'),
(8, 7, 18, 'Offre banque Société Générale', 'SocieteGeneraleOffreRentree2012.pdf'),
(9, 1, 1, 'Informations pratiques', 'A12/infosPratiquesCSI1-CSI2.pdf'),
(10, 1, 5, 'Informations pratiques', 'A12/infosPratiquesCSI1-CSI2.pdf'),
(11, 3, 1, 'Calendrier Classes Préparatoires', 'A12/calendrier1213CSI1-CSI2.pdf'),
(12, 2, 5, 'Calendrier Classes Préparatoires', 'A12/calendrier1213CSI1-CSI2.pdf'),
(13, 3, 2, 'Calendrier CIR', 'A12/calendrier1213CIR1-CIR2-Brest.pdf'),
(14, 3, 3, 'Calendrier CIR', 'A12/calendrier1213CIR1-CIR2-Rennes.pdf'),
(15, 2, 6, 'Calendrier CIR', 'A12/calendrier1213CIR1-CIR2-Brest.pdf'),
(16, 2, 7, 'Calendrier CIR', 'A12/calendrier1213CIR1-CIR2-Rennes.pdf'),
(18, 1, 10, 'Informations pratiques', 'A345/infosPratiquesCIR3.pdf'),
(19, 1, 11, 'Informations pratiques', 'A345/infosPratiquesCIR3.pdf'),
(20, 2, 9, 'Calendrier CSI3', 'A345/calendrier1213CSI3.pdf'),
(21, 2, 10, 'Calendrier CIR3 alternant', 'A345/calendrier1213CIR3alternant.pdf'),
(22, 2, 11, 'Calendrier CIR3 non alternant', 'A345/calendrier1213CIR3nonAlternant.pdf'),
(23, 1, 12, 'Calendrier ITII3', 'A345/calendrier1213ITII3.pdf'),
(24, 7, 12, 'Intégration rentrée', 'A345/integrationRentree2012ITII3-ITII4.pdf'),
(25, 2, 14, 'Intégration rentrée', 'A345/integrationRentree2012ITII3-ITII4.pdf'),
(26, 1, 14, 'Calendrier ITII4', 'A345/calendrier1213ITII4.pdf'),
(27, 1, 17, 'Calendrier ITII5', 'A345/calendrier1213ITII5.pdf'),
(28, 2, 13, 'Calendrier M1', 'A345/calendrier1213M1.pdf'),
(29, 1, 9, 'Informations pratiques', 'A345/infosPratiquesCSI3-M1-M2.pdf'),
(30, 1, 13, 'Informations pratiques', 'A345/infosPratiquesCSI3-M1-M2.pdf'),
(31, 1, 15, 'Informations pratiques', 'A345/infosPratiquesCSI3-M1-M2.pdf'),
(32, 1, 16, 'Informations pratiques', 'A345/infosPratiquesCSI3-M1-M2.pdf'),
(33, 2, 15, 'Calendrier M2 alternant', 'A345/calendrier1213M2alternant.pdf'),
(34, 2, 16, 'Calendrier M2 non alternant', 'A345/calendrier1213M2nonAlternant.pdf'),
(35, 4, 2, 'Annonce ordinateur portable', 'A12/courrierAnnoncePortable2012CIR1.pdf'),
(36, 4, 3, 'Annonce ordinateur portable', 'A12/courrierAnnoncePortable2012CIR1.pdf'),
(37, 5, 2, 'Contrat de mise à disposition ordinateur portable', 'A12/contratMiseDispositionPortable2012CIR1.pdf'),
(38, 5, 3, 'Contrat de mise à disposition ordinateur portable', 'A12/contratMiseDispositionPortable2012CIR1.pdf'),
(39, 6, 2, 'Note d''information assurance ordinateur portable', 'A12/noteInformationAssurancePortable2012CIR1.pdf'),
(40, 6, 3, 'Note d''information assurance ordinateur portable', 'A12/noteInformationAssurancePortable2012CIR1.pdf'),
(41, 1, 2, 'Informations pratiques', 'A12/infosPratiquesCIR1-CIR2.pdf'),
(42, 1, 3, 'Informations pratiques', 'A12/infosPratiquesCIR1-CIR2.pdf'),
(43, 1, 6, 'Informations pratiques', 'A12/infosPratiquesCIR1-CIR2.pdf'),
(44, 1, 7, 'Informations pratiques', 'A12/infosPratiquesCIR1-CIR2.pdf'),
(45, 2, 1, 'Affaires sociales étudiantes', 'A12/affairesSocialesEtudiantesCSI1-CIR1-BTS1.pdf'),
(46, 2, 2, 'Affaires sociales étudiantes', 'A12/affairesSocialesEtudiantesCSI1-CIR1-BTS1.pdf'),
(47, 2, 3, 'Affaires sociales étudiantes', 'A12/affairesSocialesEtudiantesCSI1-CIR1-BTS1.pdf'),
(48, 1, 4, 'Affaires sociales étudiantes', 'A12/affairesSocialesEtudiantesCSI1-CIR1-BTS1.pdf'),
(49, 4, 1, 'Intégration', 'A12/integrationCSI1-BTS1-CIR1-Brest.pdf'),
(50, 2, 4, 'Intégration', 'A12/integrationCSI1-BTS1-CIR1-Brest.pdf'),
(51, 7, 2, 'Intégration', 'A12/integrationCSI1-BTS1-CIR1-Brest.pdf'),
(52, 3, 9, 'Annonce ordinateur portable', 'A345/courrierAnnoncePortable2012CSI3-ITII3.pdf'),
(53, 2, 12, 'Annonce ordinateur portable', 'A345/courrierAnnoncePortable2012CSI3-ITII3.pdf'),
(54, 4, 9, 'Dossier ordinateur portable', 'A345/dossierOrdinateurPortable2012CSI3-ITII3.pdf'),
(55, 3, 12, 'Dossier ordinateur portable', 'A345/dossierOrdinateurPortable2012CSI3-ITII3.pdf'),
(56, 5, 9, 'Bon de commande ordinateur portable', 'A345/bonDeCommandePortable2012CSI3-ITII3.pdf'),
(57, 4, 12, 'Bon de commande ordinateur portable', 'A345/bonDeCommandePortable2012CSI3-ITII3.pdf'),
(58, 6, 9, 'Note d''information assurance ordinateur portable', 'A345/noteInformationAssurancePortable2012CSI3-ITII3.pdf'),
(59, 5, 12, 'Note d''information assurance ordinateur portable', 'A345/noteInformationAssurancePortable2012CSI3-ITII3.pdf'),
(60, 7, 9, 'Fiche d''adhésion assurance ordinateur portable', 'A345/ficheAdhesionAssurancePortable2012CSI3-ITII3.pdf'),
(61, 6, 12, 'Fiche d''adhésion assurance ordinateur portable', 'A345/ficheAdhesionAssurancePortable2012CSI3-ITII3.pdf'),
(62, 9, 18, 'Le mot du bureau des sports', 'BDS.pdf');