-- 17-05-2017
INSERT INTO `bddanor`.`personne` (`pers_id`, `pers_nom`, `pers_prenom`, `pers_datenaissance`, `pers_adresse`, `pers_contact`, `pers_email`, `pers_poste`, `pers_infogenerale`, `pers_infodetaille`, `pers_experiences`, `pers_photo`) VALUES (NULL, 'RANOROHARISOA', 'Tiavina', '1972-11-17', 'Villa Anor Tsaraonenana ', NULL, NULL, 'Directeur Général', '', NULL, NULL, 'dg.jpg');
ALTER TABLE `accueil` ADD `acc_editeur` INT NOT NULL ;
UPDATE `bddanor`.`accueil` SET `acc_editeur` = '1' WHERE `accueil`.`acc_id` = 1;
