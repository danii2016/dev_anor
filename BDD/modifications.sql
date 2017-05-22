-- 17-05-2017
INSERT INTO `bddanor`.`personne` (`pers_id`, `pers_nom`, `pers_prenom`, `pers_datenaissance`, `pers_adresse`, `pers_contact`, `pers_email`, `pers_poste`, `pers_infogenerale`, `pers_infodetaille`, `pers_experiences`, `pers_photo`) VALUES (NULL, 'RANOROHARISOA', 'Tiavina', '1972-11-17', 'Villa Anor Tsaraonenana ', NULL, NULL, 'Directeur Général', '', NULL, NULL, 'dg.jpg');
ALTER TABLE `accueil` ADD `acc_editeur` INT NOT NULL ;
UPDATE `bddanor`.`accueil` SET `acc_editeur` = '1' WHERE `accueil`.`acc_id` = 1;

-- 22-05-2017
CREATE TABLE IF NOT EXISTS `a_propos` (
`ap_id` int(11) NOT NULL,
  `ap_lang` varchar(10) NOT NULL DEFAULT 'fr',
  `ap_titrepresentation` varchar(255) NOT NULL,
  `ap_presentation` text NOT NULL,
  `ap_titreobjectif` varchar(255) NOT NULL,
  `ap_objectifs` text NOT NULL,
  `ap_titrerole` varchar(255) NOT NULL,
  `ap_roles` text NOT NULL,
  `ap_titreorganigramme` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_propos`
--

INSERT INTO `a_propos` (`ap_id`, `ap_lang`, `ap_titrepresentation`, `ap_presentation`, `ap_titreobjectif`, `ap_objectifs`, `ap_titrerole`, `ap_roles`, `ap_titreorganigramme`) VALUES
(1, 'fr', 'PRESENTATION', 'Etablissement Public à caractère Industriel et Commercial placé sous la tutelle technique du Ministère chargé des Mines et sous la tutelle budgétaire du Ministre chargé du Budget ayant son siège social à Ampanotokana- Antananarivo. ', 'OBJECTIF', 'Formaliser la filière or et réduire les impacts socio-économiques et environnementaux négatifs avec pour finalité d’augmenter les recettes d’exportation et assurer le développement local ;\r\nMise en œuvre de la politique du Ministère chargé des Mines concernant la réalisation des programmes de formalisation, l’appui aux Collectivités Territoriales Décentralisées et la gestion des activités d’orpaillage, de collecte, de commercialisation, de transformation et d’exportation de l’Or. ', 'ROLES DE L’ANOR', 'Délivrer les agréments des comptoirs commerciaux, des comptoirs de fonte, des laboratoires de traitement et d’affinage de l’or ;\r\nConcevoir les cartes d’orpailleurs et les cartes de collecteurs ; \r\nAppuyer les opérateurs afin d’accroitre leur capacité de production ; \r\nGérer les bases de données et les statistiques relatives à la filière or ; \r\nSuivre la traçabilité et la qualité des produits.', 'ORGANIGRAMME');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_propos`
--
ALTER TABLE `a_propos`
 ADD PRIMARY KEY (`ap_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_propos`
--
ALTER TABLE `a_propos`
MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;