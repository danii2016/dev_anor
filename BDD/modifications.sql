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

--07-06-2017
-- --------------------------------------------------------

--
-- Table structure for table `cadre`
--

CREATE TABLE IF NOT EXISTS `cadre` (
`cad_id` int(11) NOT NULL,
  `cad_titre` varchar(255) NOT NULL,
  `cad_repertoire` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cadre`
--

INSERT INTO `cadre` (`cad_id`, `cad_titre`, `cad_repertoire`) VALUES
(1, 'Bijouterie  Lapidairerie', 'Bijouterie  Lapidairerie'),
(2, 'Code Minier 2005 021', 'Code Minier 2005 021'),
(3, 'Collecte produits de Mines', 'Collecte produits de Mines'),
(4, 'Constitution', 'Constitution'),
(5, 'CTD', 'CTD'),
(6, 'Exportation', 'Exportation'),
(7, 'Exportation non commerciale', 'Exportation non commerciale'),
(8, 'Groupement', 'Groupement'),
(9, 'Laboratoire', 'Laboratoire'),
(10, 'Parafiscalite miniere', 'Parafiscalite miniere'),
(11, 'Textes filiere Or  ANOR', 'Textes filiere Or  ANOR'),
(12, 'Transactions', 'Transactions'),
(13, 'Valeur de reference', 'Valeur de reference');

-- --------------------------------------------------------

--
-- Table structure for table `galerie`
--

CREATE TABLE IF NOT EXISTS `galerie` (
`gal_id` int(11) NOT NULL,
  `gal_repertoire` varchar(50) NOT NULL,
  `gal_libelle` varchar(255) NOT NULL,
  `gal_imagemenu` varchar(255) NOT NULL,
  `gal_soutitre` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galerie`
--

INSERT INTO `galerie` (`gal_id`, `gal_repertoire`, `gal_libelle`, `gal_imagemenu`, `gal_soutitre`) VALUES
(1, 'Atelier_panorama', 'Atelier panorama', '20170421_121216.jpg', 'Atelier à l''hotel panorama Décembre 2016'),
(2, 'Atelier_Lanja_Miakatra', 'Atelier lanja miakatra', 'IMG_3394.JPG', ''),
(3, 'Dgoto_Dabolava', 'Dgoto Dabolava', 'SAM_4862.JPG', ''),
(4, 'FAMBOLEKAZO_Apangabe', 'Fambolen-kazo Ampangabe', 'IMG_20160205_115014.jpg', ''),
(5, 'Foir Betsiboka', 'Foir Betsiboka', 'IMG_4493.JPG', ''),
(6, 'Foire_Antsirabe', 'Foire Antsirabe', 'IMG_3335.JPG', ''),
(7, 'Guichet_Unique_MPMP', 'Guichet Unique Ministère auprès de la Présidence chargé des Mines et du Pétrole', 'IMG_4431.JPG\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `statistique`
--

CREATE TABLE IF NOT EXISTS `statistique` (
`stat_id` int(11) NOT NULL,
  `stat_annee` int(4) NOT NULL,
  `stat_repertoire` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistique`
--

INSERT INTO `statistique` (`stat_id`, `stat_annee`, `stat_repertoire`) VALUES
(1, 2016, '2016'),
(2, 2017, '2017');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadre`
--
ALTER TABLE `cadre`
 ADD PRIMARY KEY (`cad_id`);

--
-- Indexes for table `galerie`
--
ALTER TABLE `galerie`
 ADD PRIMARY KEY (`gal_id`);

--
-- Indexes for table `statistique`
--
ALTER TABLE `statistique`
 ADD PRIMARY KEY (`stat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadre`
--
ALTER TABLE `cadre`
MODIFY `cad_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `galerie`
--
ALTER TABLE `galerie`
MODIFY `gal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `statistique`
--
ALTER TABLE `statistique`
MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;