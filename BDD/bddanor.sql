-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2017 at 05:34 AM
-- Server version: 5.5.55-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bddanor`
--

-- --------------------------------------------------------

--
-- Table structure for table `accueil`
--

CREATE TABLE IF NOT EXISTS `accueil` (
`acc_id` int(11) NOT NULL,
  `acc_lang` varchar(10) NOT NULL DEFAULT 'fr',
  `acc_title` varchar(255) NOT NULL,
  `acc_content` text NOT NULL,
  `acc_editeur` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accueil`
--

INSERT INTO `accueil` (`acc_id`, `acc_lang`, `acc_title`, `acc_content`, `acc_editeur`) VALUES
(1, 'fr', 'MOT DU DG', '<p>Bienvenue sur le site de l’Agence Nationale de la Filière Or, dénommée ANOR !</p><p>Depuis l’indépendance, la filière or a toujours été au cœur des activités d’une grande partie des opérateurs économiques nationaux ou internationaux basés à Madagascar. Pourtant, il manquait la structure adéquate qui permettrait d’avoir des résultats tangibles au profit, et de la population, et au sein de l’économie en général. Ce qui a induit les observateurs à une erreur que Madagascar est un pays riche par ses ressources naturelles, entre autres les ressources minières, mais pauvre eu égard aux indicateurs réunis dans les statistiques. </p><p>Parlant de la filière or, en particulier, l’Etat malagasy, par le biais du Ministère auprès de la Présidence chargé des Mines et Pétrole, conscient de cette situation, a fait preuve de détermination dans la mise en œuvre de sa politique minière, par la création et la mise en place  de l’Agence  ANOR en  Avril 2015.</p><p>L’objectif étant d’assurer des retombées tangibles pour l’Etat, les CTD et la population en général, et ceci ne peut être atteint sans la maitrise de la traçabilité de l’or, depuis l’extraction jusqu''à l’exportation.</p><p>Pour ce faire, l’on a prévu dans le texte portant régime de l’or, la réalisation des programmes de formalisation, l’appui aux CTD dans la gestion des activités d’orpaillage et de collecte d’or et également la mise en place de dispositifs juridiques et organisationnels pour l’harmonisation de la commercialisation de l’Or.</p><p>Depuis 2015, les mesures prises s’avèrent encourageantes et ont permis d’améliorer les résultats. Actuellement, on a enregistré auprès de l’administration minière plus de 1 tonne d’or et plus , exportée dans des conditions légales. Ces mesures méritent d’être renforcées, poursuivies et nécessitent encore des réflexions beaucoup plus approfondies et appropriées.</p><p>C’est ainsi que notre site se doit d’être plus près des opérateurs aurifères en vue de les orienter dans leurs activités par la vulgarisation de textes, le partage des expériences et les bonnes pratiques de certaines Régions à forte potentialité aurifère dans leurs activités et aussi de diffuser des informations essentielles pour une bonne organisation de la Filière.</p><p>Ainsi, je souhaiterais que dans toutes les activités entreprises par tous les opérateurs aurifères, ils  fassent leur notre slogan «  Formaliser la Filière Or pour le  développement de Madagascar » !</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `actu_actualite`
--

CREATE TABLE IF NOT EXISTS `actu_actualite` (
`aact_id` int(11) NOT NULL,
  `aact_dateajout` date NOT NULL,
  `aact_datemodification` date NOT NULL,
  `aact_titre` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actu_actualite`
--

INSERT INTO `actu_actualite` (`aact_id`, `aact_dateajout`, `aact_datemodification`, `aact_titre`) VALUES
(1, '2017-07-01', '2017-07-01', 'Les essentiels sur les activités aurifières'),
(2, '2017-07-02', '2017-07-01', 'ANOR  Réalisations 2016 et 1ere semestre 2017'),
(3, '2017-07-04', '2017-07-04', 'Gestion durable et impacts sur la génèration future'),
(4, '2017-07-17', '2017-07-17', 'Article web PND Mines');

-- --------------------------------------------------------

--
-- Table structure for table `actu_article`
--

CREATE TABLE IF NOT EXISTS `actu_article` (
`aart_id` int(11) NOT NULL,
  `aact_id` int(11) NOT NULL,
  `aart_titre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `aart_contenu` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actu_article`
--

INSERT INTO `actu_article` (`aart_id`, `aact_id`, `aart_titre`, `aart_contenu`) VALUES
(1, 1, 'AGENCE NATIONALE de la FILIERE OR', '<p>Depuis la République, les résultats afférents aux activités aurifères  demeurent insuffisants eu égard aux traffics et exploitations illicites dans ce domaine. Pour y faire face, le Ministère auprès de la Présidence  chargé des Mines et du Pétrole a mis en place  l’Agence Nationale de la filière Or (ANOR), Etablissement Public à caractère Industriel et Commercial,  créée en 2015 et  ayant  pour mission  l’appui au Ministère chargé des Mines dans la mise en œuvre de la politique du Ministère sur la Filière Or, notamment par la réalisation des programmes de formalisation, l’appui aux CTD dans la gestion des activités d’orpaillage et de collecte d’or et également la mise en place de dispositifs juridiques et organisationnels pour l’harmonisation de la commercialisation de l’Or notamment la mise en place de la SATO, le dernier maillon de la chaîne de valeur , qui permettrait de garantir la qualité de l’or exporté de Madagascar et d’asseoir la canalisation de l’or commercial vers la voie formelle.</p><p>L’objectif ultime consiste à assurer des retombées tangibles pour l’Etat, les CTD et la population en général, et ceci ne peut être atteint sans la maitrise de la traçabilité de l’or, depuis l’extraction jusqu''à l’exportation. </p><p>Cette envergure nous encourage à expliquer davantage sur les activités aurifères dont la formalisation relève de la compétence de l’ANOR concernant les chaînes de valeur des activités aurifères depuis l’orpaillage passant par la commercialisation et jusqu’à l’exportation.</p>'),
(2, 2, 'ANOR organisme rattaché auprès du Ministère en charge des Mines', '<p>Le Secteur aurifère malagasy demeure dominé par des trafics et des exploitations illicites et caractérisé par des phénomènes de ruées jusqu’ici pas assez maîtrisées et ce, malgré les efforts successifs entrepris depuis l’Indépendance. Certes, des résultats ont été enregistrés mais demeurent insuffisants et les retombées de ce produit aussi bien pour les Collectivités Territoriales Décentralisées (CTD) et l’Etat restent dérisoires.</p>\r\n<p>C’est pourquoi, l’Agence Nationale de la filière Or (ANOR), Etablissement Public à caractère Industriel et Commercial, a été créée en 2015.</p>'),
(3, 2, 'Mission', '<p>La mission de l’ANOR consiste à appuyer le  Ministère chargé des Mines dans la mise en œuvre de la politique du Ministère sur la Filière Or, notamment par la réalisation des programmes de formalisation, l’appui aux CTD dans la gestion des activités d’orpaillage et de collecte d’or et également la mise en place de dispositifs juridiques et organisationnels pour l’harmonisation de la commercialisation de l’Or. </p>\r\n<p>Pourtant, la  formalisation des orpailleurs et des collecteurs ne constitue en aucune manière une finalité mais plutôt une des étapes pour parvenir à l’objectif ultime qui consiste à assurer des retombées tangibles pour l’Etat, les CTD et la population en général, et ceci ne peut être atteint sans la maitrise de la traçabilité de l’or, depuis l’extraction jusqu''à l’exportation.</p>\r\n'),
(4, 2, 'Réalisation', '<p>Depuis 2016, début de l’opération entreprise par l’ANOR, l’on a enregistré les chiffres ci-après :</p><u>Au titre de l’Année 2016:</u><p>Orpailleurs formalisés: 3 838</p><p>Collecteurs formalisés : 56 pour la catégorie « 1 » dénommés Mpandanja et 18 pour la catégorie « 2 » dénommé Mpanangona ou  collecteurs affiliésAgrément  - Comptoirs commerciaux 06</p><u>Au titre de l’Année 2017:</u><p>Orpailleurs formalisés: 1427 (dont 1000 affilié avec un Comptoir) travaillant sur 5 Communes: Antsenavolo , Andranomainty, Androrangavola,   Sahakevo, Beanana </p><p>Collecteurs formalisés:Mpandanja : 12  et  Mpanangona: 7</p><p>Agrément – Comptoirs commerciaux :  05Pour sa visibilité et en complément de ses actions de formalisation, l’ANOR ont participé aux foires nationales et internationales.</p><p>Citons en exemple pour les foires nationales : la foire de  Menabe ( Morondava), Foire économique de Tamatave- Foire Agricole de Bongolava- Foire ZOVY de Vakinankaratra.</p><p>Pour son rayonnement à l’international, l’ANOR était présent au foires ci-après,</p><ul><li>Indaba en Afrique du Sud en 2016</li><li>Salon International des Mines et du Pétrole au CCI Ivato en septembre 2016</li><li>ASIA IO en 2016 et en 2017.</li></ul>'),
(5, 3, 'Des ateliers de suivi envisagés pour mettre au point  la « Stratégie de Gouvernance en la Filière OR » ', '<p>Tenu les 20 et 21 avril 2017, l’atelier sur  l’élaboration de Stratégie de la Filière or, organisé par le Ministère auprès de la Présidence, chargé des Mines et du Pétrole avec  l’Agence Nationale de la Filière Or (ANOR), a affiché des  résultats positifs eu égard d’une part, à la présence d’une centaine de participants actifs, issus de différentes entités touchées de loin ou de près par les activités aurifères, publiques ou privées,  et d’autre part, la satisfaction d’avoir franchi une étape dont  la conscientisation  de tout un chacun de l’importance de cet atelier en vue de sortir une stratégie de gouvernance.</p>\r\n<p>Les thèmes débattus à cet atelier portent sur les activités aurifères de l’exploitation à l’exportation. Il s’agit de l’orpaillage, la  fiscalité et parafiscalité, la commercialisation et exportation et la Société d’Affinage et Traitement de l’or ou SATO.</p>\r\n<p>Les objectifs que s’est fixé le Ministère,  de concert avec l’ANOR ont été atteints. </p>\r\n<p>Outre les recommandations dégagées des discussions au cours de cet atelier, et à  travers les 4 thèmes suscités,  les autres propositions seront toujours les bienvenues  pour pouvoir ajourner cette Stratégie ; le bureau de l’ANOR étant disponible du lundi au vendredi à  les recevoir.</p>\r\n<p>Au Ministre auprès de la Présidence en charge des Mines et du Pétrole d’avancer  quelques chiffres dont,  le nombre des orpailleurs, actuellement à 500 000 et l’exportation   du métal jaune évaluée à  1tonne et quelques  depuis 2016 jusqu’à présent. Le Ministre Ying Vah a affirmé  que ces données sont nécessaires et serviront de statistique. En outre, il a informé sur la possible   réalisation de ces recommandations, à court ou moyen terme, au profit des acteurs de la filière, publiques et privés. Ainsi,  des ateliers de suivi se tiendront avec des entités concernées. </p>'),
(6, 3, 'Manuel de procédure', '<p>Pour que tous les opérateurs aurifère soient au  même niveau d’informations, le Ministre auprès de la Présidence  en charge des Mines et du Pétrole propose la conception d’un manuel de procédure, y  englobant  notamment  les problèmes issus des cas à répétition fréquente dans  la filière or et  les éditant ainsi   selon les cibles (opérateurs, CTDs, ministères concernés, banque centrale, douanes etc…). </p>\r\n<p>Aussi, ce manuel serait-il  modifiable eu égard aux aléas qui se présenteront en route et surtout eu égard aux cultures de  chaque région aurifère.  </p>'),
(7, 3, 'Statistique', '<p>Suite à la déclaration sur les chiffres concernant l’exploitation dans la filière or, cette statistique permettrait d’avoir des base de données fiables et de prévoir un résultat au profit de  la réduction de la pauvreté. L’important est de ne pas simplement s’atteler sur les avoirs que pourraient bénéficier les opérateurs mais aussi de voir la manière dont il est question pour l’amélioration de vie de la population par la création d’emplois ou l’accord d’octroi d’un financement par exemple.</p>'),
(8, 1, 'DE L''ORPAILLAGE', '<p>L’orpaillage, extraction des gîtes d’or par des procédés artisanaux, est effectué en vertu d’une autorisation d’orpaillage, matérialisée par une carte d’orpailleur signée par le Maire de la Commune du ressort. Elle est valable uniquement à l’intérieur de la circonscription de la Commune qui l’a délivrée.</p>\r\n<p>La carte d’orpailleur rigoureusement personnelle  ne peut être  cédée, ni mutée, ni amodiée après sa délivrance.  </p>\r\n<p>Toute demande de carte d’orpailleur se fait auprès des Communes nécessitant la fourniture de dossiers comme le certificat de résidence, la copie certifiée de la CIN, 2 photos d’identité et le consentement du titulaire  de permis minier en cas d’orpaillage à l’intérieur d’un périmètre minier. </p>\r\n<p>La validité de la carte d’orpailleur est d’une durée d’une année à partir de la date d’octroi de la carte. Elle est renouvelable sous réserve du paiement du droit y afférent. Elle ne constitue pas un permis minier. Les orpailleurs sont sensibilisés à adhérer dans  un Groupement d’Orpailleurs légalement ; ceci en vue de faciliter toute opération les concernant et en particulier en vue des statistiques y afférentes.</p>\r\n<p>Cette carte d’orpailleur codifiée par l’ANOR est disponible auprès de tout bureau local de l’ANOR, qui les distribue exclusivement  au profit des Communes.</p>\r\n\r\n<p>Les Maires en tant que  partenaires techniques dans les Régions appuie de ANOR dans le cadre de la formalisation des orpailleurs et détiennent le  registre incluant   la production et  la liste des orpailleurs, inscrits dans sa localité et ce dossier est  remis  à l’ANOR trimestriellement .</p>'),
(9, 4, 'Rapport technique sur la mise en œuvre du PND au titre de l’année 2016', '<p>Hausse des valeurs de l’exportation  et de la redevance minières en 2016 pour le Secteur minier.</p>\r\n<p>La validation du rapport technique  de mise en œuvre des programmes du Plan National de Développement – PND  s’est effectué le vendredi 7 juillet 2017, dans les locaux du Ministère de l’Economie et du Plan à Anosy.  Cette réunion a mis en évidence des résultats pour les 20 programmes déterminés à travers des objectifs bien définis au titre de l’année 2016.</p>\r\n<p>Concernant  le secteur « Mines », 2016 a été marqué par une hausse de :\r\n<ul>\r\n<li>la valeur de l’exportation minière, or y compris, évaluée à 3697.3 Milliards d’Ariary contre 1,988.9 Milliards d’Ariary en 2015</li>\r\n<li>a redevance minière : 111.2  Milliards  contre 27 Milliards en 2015</li>\r\n</ul>\r\n</p>\r\n<p>La valorisation du capital naturel, est inscrite dans l’AXE 3 de la PND  et prévoit « la croissance inclusive et ancrage territorial du développement». </p>\r\n<p class = ''pull-right''>Lucette- Juillet 2017</p>');

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
`admin_id` int(11) NOT NULL,
  `admin_nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_role` int(11) NOT NULL,
  `admin_civilite` varchar(10) NOT NULL DEFAULT 'Monsieur'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`admin_id`, `admin_nom`, `admin_prenom`, `admin_role`, `admin_civilite`) VALUES
(2, 'SEVA MBOINY', 'Simon', 1, 'Monsieur'),
(3, 'RAFATRO RANDRIANEKENA', 'Malalanohirina Lovasoaniaina', 1, 'Madame'),
(4, 'PAGES', 'Sylvia', 2, 'Madame'),
(5, 'Tsihoara Eugène', 'FARATIANA', 3, 'Monsieur'),
(6, 'RAVAOARISOA', 'Jeanine', 4, 'Madame'),
(7, 'RAKOTONANDRASANA', 'Livaniaina', 4, 'Monsieur'),
(8, 'MANANTSARA', 'Anjara', 5, 'Madame'),
(9, 'VAN ASS', 'Guy', 6, 'Monsieur');

-- --------------------------------------------------------

--
-- Table structure for table `a_propos`
--

CREATE TABLE IF NOT EXISTS `a_propos` (
`ap_id` int(11) NOT NULL,
  `ap_lang` varchar(10) NOT NULL DEFAULT 'fr',
  `ap_titrepresentation` varchar(255) NOT NULL,
  `ap_presentation` text NOT NULL,
  `ap_titreobjectif` varchar(255) NOT NULL,
  `ap_objectifs` text NOT NULL,
  `ap_titrerole` varchar(255) NOT NULL,
  `ap_roles` text NOT NULL,
  `ap_titrebut` varchar(255) NOT NULL,
  `ap_but` text NOT NULL,
  `ap_titrerealisation` varchar(255) NOT NULL,
  `ap_realisation` text NOT NULL,
  `ap_titreorganigramme` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_propos`
--

INSERT INTO `a_propos` (`ap_id`, `ap_lang`, `ap_titrepresentation`, `ap_presentation`, `ap_titreobjectif`, `ap_objectifs`, `ap_titrerole`, `ap_roles`, `ap_titrebut`, `ap_but`, `ap_titrerealisation`, `ap_realisation`, `ap_titreorganigramme`) VALUES
(1, 'fr', 'PRESENTATION', '<p>L’or est le métal qui existe un peu partout à Madagascar.<br/>\r\nL’exploitation a tendance à être dominé par des entités informelles, par le non-respect des normes juridiques exigées dans les textes réglementaires, par la non application des procédures y afférentes. Aussi, les techniques d’exploitation se caractérisent par des méthodes non normalisés.</p>\r\n<p>Ainsi, l’Etat organise la filière or d’amont en aval et mettre en place un dispositif légal et organisationnel. La finalité étant d’augmenter la contribution de la filière or dans l’économie nationale. </p>\r\n<p>L’ANOR, créé  par décret n°2015-663 du 14 Avril 2015, dotée d’un statut d’Etablissement Public à caractère Industriel et Commercial, est placée sous tutelle technique du Ministère auprès de la Présidence chargé des Mines et du Pétrole et sous tutelle budgétaire et comptable du Ministère des Finances et du Budget.  </p>', 'OBJECTIFS DE LA MISE EN PLACE DE L’ANOR', 'Formaliser la filière or et réduire les impacts socio-économiques et environnementaux négatifs avec pour finalité d’augmenter les recettes d’exportation et assurer le développement local ;\r\nMise en œuvre de la politique du Ministère chargé des Mines concernant la réalisation des programmes de formalisation, l’appui aux Collectivités Territoriales Décentralisées et la gestion des activités d’orpaillage, de collecte, de commercialisation, de transformation et d’exportation de l’Or. ', 'ROLE DE L’ANOR', 'Recevoir et instruire les demandes de carte des collecteurs, les demandes d’agrément des comptoirs de collecte, des comptoirs de fonte, des laboratoires de traitement et d’affinage de l’or, ainsi que la délivrance des agréments correspondants \r\nConcevoir les cartes d’orpailleurs et les cartes de collecteurs ; \r\nAppuyer les opérateurs afin d’accroitre leur capacité de production ; \r\nGérer, valoriser et diffuser les informations concernant la filière or (Base De Données)\r\nSuivre la réalisation par les opérateurs des dispositions du cahier des charges des opérateurs miniers de la filière Or ;\r\nAppuyer les acteurs de la filière (Organisations de la Société Civile et Collectivités Territoriales Décentralisées) en leur fournissant les informations nécessaires à toutes les structures décentralisées pour le programme de développement ;\r\nSuivre la traçabilité et la qualité des produitS.', 'Pour atteindre ses objectifs les stratégies suivantes ont été définies', 'Réguler la filière or et mettre en place le cadre légal et réglementaire ;\r\nGérer la filière et délivrer de façon transparente les agréments et autorisations minières ;\r\nPromouvoir la filière à travers la diffusion des informations/ statistiques et appuyer/encadrer les opérateurs de la filière', 'REALISATIONS', '<p>Les études géologiques et minières ont montré qu’il existe plus de 300 Communes aurifères sur le territoire national. Dans ce cadre, l’ANOR a commencé à effectuer des missions de vulgarisation des textes et de recensement des opérateurs depuis 2015.</p>\r\n<p>La structuration et la formalisation de la filière or devraient permettre d’obtenir des statistiques fiables et de mieux la fiscaliser, afin que les activités puissent bénéficier à l’ensemble de la population, en particulier, celles des localités directement concernées.</p>', 'ORGANIGRAMME');

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
-- Table structure for table `cadre_rubrique`
--

CREATE TABLE IF NOT EXISTS `cadre_rubrique` (
`crub_id` int(11) NOT NULL,
  `crub_libelle` varchar(255) CHARACTER SET utf8 NOT NULL,
  `crub_repertoire` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cadre_rubrique`
--

INSERT INTO `cadre_rubrique` (`crub_id`, `crub_libelle`, `crub_repertoire`) VALUES
(1, 'Textes Filière OR', '1'),
(2, 'Textes mères', '2'),
(3, 'Autres Texte', '3');

-- --------------------------------------------------------

--
-- Table structure for table `collaborateur`
--

CREATE TABLE IF NOT EXISTS `collaborateur` (
`colb_id` int(11) NOT NULL,
  `colb_nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `colb_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `colb_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collaborateur`
--

INSERT INTO `collaborateur` (`colb_id`, `colb_nom`, `colb_url`, `colb_logo`) VALUES
(1, 'Ministère auprès de la Présidence chargé des Mines et du Pétrole', '', ''),
(2, 'BCMM', 'http://bcmm.mg/', 'logo_bcmm.png'),
(3, 'IGM', 'http://igm.mg/', 'logo_igm.png'),
(4, 'Chambre des mines', 'http://www.mineschamber.mg/', 'logo_cdmin.png'),
(5, 'Ministère des finances et du budget', 'http://www.mefb.gov.mg/', 'logo_mfb.png'),
(6, 'Douanes Malagasy', 'http://www.douanes.gov.mg/', 'logo_douanes.png'),
(7, 'EDBM', 'http://www.edbm.gov.mg/fr', 'logo_edm.png'),
(8, 'Ministère de l''intérieur et de la décentralisation', 'http://www.mid.gov.mg/', 'logo_mid.png');

-- --------------------------------------------------------

--
-- Table structure for table `comptoir`
--

CREATE TABLE IF NOT EXISTS `comptoir` (
`cptr_id` int(11) NOT NULL,
  `cptr_libelle` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comptoir`
--

INSERT INTO `comptoir` (`cptr_id`, `cptr_libelle`) VALUES
(1, 'ARES CONSEIL SARL'),
(2, 'MADGAMA INTERNATIONAL GROUPS SARL\r\n'),
(3, 'ROYAL GOLD & GEMS SARLU'),
(4, 'VOIE INTERNATIONALE MADAGASCAR'),
(5, 'TAHIRISAROBIDY SARL'),
(6, 'EGECORE SARL'),
(7, 'LVZ TANTERAKA SARL'),
(8, 'MINERAL DEVELOPMENT MADAGASCAR'),
(9, 'MARVEL SARLU'),
(10, 'LORETANA SARL'),
(11, 'SELANU INVESTMENT ARABIAN LIMITED SARL'),
(12, 'BMH GOLD'),
(13, 'ALMAKAH SARL'),
(14, 'ETOILE MADAGASCAR SARLU'),
(15, 'DREAMSEE co Ltd SARL'),
(16, 'VRKS INTERNATIONAL EXPORT SARLU'),
(17, 'COMPTOIR NATIONAL DE L’OR SARL (CNOR SARL)'),
(18, 'NANTANLO SARLU');

-- --------------------------------------------------------

--
-- Table structure for table `exp_exportateur`
--

CREATE TABLE IF NOT EXISTS `exp_exportateur` (
`eexp_id` int(11) NOT NULL,
  `eexp_nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `eexp_prenom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `eexp_type` varchar(10) CHARACTER SET utf8 NOT NULL,
  `eexp_adresse` varchar(255) CHARACTER SET utf8 NOT NULL,
  `eexp_contact` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exp_exportateur`
--

INSERT INTO `exp_exportateur` (`eexp_id`, `eexp_nom`, `eexp_prenom`, `eexp_type`, `eexp_adresse`, `eexp_contact`) VALUES
(1, 'RAKOTO', 'Benoit', 'Particulie', 'Aucun', '-'),
(2, 'CERBERT', 'VV', 'Entreprise', 'Aucun', '-');

-- --------------------------------------------------------

--
-- Table structure for table `exp_exportation`
--

CREATE TABLE IF NOT EXISTS `exp_exportation` (
`eexpt_id` int(11) NOT NULL,
  `eexp_id` int(11) NOT NULL,
  `eexpt_date` date NOT NULL,
  `eexpt_datemodif` date NOT NULL,
  `eexpt_image1` varchar(255) NOT NULL,
  `eexpt_image2` varchar(255) NOT NULL,
  `eexpt_image3` varchar(255) NOT NULL,
  `eexpt_image4` varchar(255) NOT NULL,
  `util_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exp_exportation`
--

INSERT INTO `exp_exportation` (`eexpt_id`, `eexp_id`, `eexpt_date`, `eexpt_datemodif`, `eexpt_image1`, `eexpt_image2`, `eexpt_image3`, `eexpt_image4`, `util_id`) VALUES
(1, 1, '2017-06-27', '2017-06-27', '1393863760_80748_large.jpg', '1393863940_80757_large.jpg', '1393863983_80760_large.jpg', '', 1),
(2, 2, '2017-06-27', '2017-06-27', '1393864576_80782_large.jpg', '', '', '', 1);

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
(1, '1 ATELIER ANOR PANORAMA', 'Atelier ANOR au PANORAMA', '1.PNG', 'Atelier à l''hotel panorama Décembre 2016'),
(2, '2 Guichet_Unique_MPMP', 'Guichet Unique MPMP – ANOR', '1.PNG', ''),
(3, '3 Foire_Antsirabe', 'ANOR - Foire Vakinankaratra', '1.PNG', ''),
(4, '4 Atelier_Lanja_Miakatra', 'ANOR - Atelier Miandrivazo', '1.PNG', ''),
(5, '5 Foir Betsiboka', 'ANOR - Foire Betsiboka', '1.PNG', ''),
(6, '6 Dgoto_Dabolava', 'ANOR_Commune Dabolava', '1.PNG', ''),
(7, '7 FAMBOLEKAZO_Apangabe', 'Fambolen-kazo Ampangabe', '1.PNG', '');

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
`pers_id` int(11) NOT NULL,
  `pers_nom` varchar(255) NOT NULL,
  `pers_prenom` varchar(255) NOT NULL,
  `pers_datenaissance` date NOT NULL,
  `pers_adresse` varchar(255) DEFAULT NULL,
  `pers_contact` varchar(20) DEFAULT NULL,
  `pers_email` varchar(100) DEFAULT NULL,
  `pers_poste` varchar(255) NOT NULL,
  `pers_infogenerale` varchar(255) NOT NULL,
  `pers_infodetaille` text,
  `pers_experiences` text,
  `pers_photo` varchar(255) NOT NULL DEFAULT 'silhouette.jpg'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`pers_id`, `pers_nom`, `pers_prenom`, `pers_datenaissance`, `pers_adresse`, `pers_contact`, `pers_email`, `pers_poste`, `pers_infogenerale`, `pers_infodetaille`, `pers_experiences`, `pers_photo`) VALUES
(1, 'RANOROHARISOA', 'Tiavina', '1972-11-17', 'Villa Anor Tsaraonenana ', NULL, NULL, 'Directeur Générale', '', NULL, NULL, 'dg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `proc_contenu`
--

CREATE TABLE IF NOT EXISTS `proc_contenu` (
`pcont_id` int(11) NOT NULL,
  `pproc_id` int(11) NOT NULL,
  `pcont_lang` varchar(5) NOT NULL,
  `pcont_contenu` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proc_contenu`
--

INSERT INTO `proc_contenu` (`pcont_id`, `pproc_id`, `pcont_lang`, `pcont_contenu`) VALUES
(1, 1, 'fr', '  <h3>Souhaitez-vous devenir orpailleur ?</h3>  <h4>I- Qui peut devenir orpailleur ? </h4><ol>  <li>Personne physique de nationalité Malagasy</li>  <li>Agé de plus de 18 ans</li>  <li>Individu ou groupe d’individus légalement constitué</li>  <li>Résidant dans la commune.</li>  </ol>  <h4>II- Quelle est la procédure à suivre ? </h4><p>Déposer une demande auprès de votre communePièces à fournir pour l’orpailleur individuel ?A votre demande, vous devez joindre un dossier qui comprendra</p>  <h5>1- Récépissé de versement d’impôt synthétique (Centre fiscal)</h5><p>Certificat de résidence.Copie CIN légalisée.Droit : 16 000 Ar.</p>  <h5>2- Carte orpailleur (Commune).</h5><p>Lettre de demande de carte adresse au Maire.Deux (02) photos d’identité.Certificat de résidence ou passeportCopie CIN légalisée.Droit d’octroi de la carte d’orpailleur : 6 000 Ar – 10 000Ar     </p>  <h5>Pièces à fournir pour le groupement d’orpailleurs ?</h5> <p>Statuts du groupement conservé au District.Lettre de demande de carte.Liste des membres.Récépissé du paiement de l’Impôt Synthétique par orpailleur.Deux (02) photos d’identité par individu.Lettre de demande de consentement du titulaire du permis minier.Certificat de résidence ou passeport par orpailleur.Droit d’octroi de la carte d’orpailleur : 4 000 Ar</p>  <h4>III- Quelles sont les avantages de la détention de la carte d’orpailleur ?</h4><p>Extraire librement l’Or dans les zones d’orpaillage.Vendre librement l’Or aux collecteurs formels.Valable un an et renouvelable.Bénéficier d’une formation (sur la demande du Maire)</p>  <h4>IV- Quelles sont les obligations de l’orpailleur ?</h4><p>Restaurer les sites après exploitation Respecter le code de conduite sur l''Hygiène, la Sécurité et la protection de l''EnvironnementVendre la production aux opérateurs agréésVendre la production au Titulaire du permis (Droit de préemption)Tenir à jour le registre de production (Groupement)   </p>  '),
(2, 1, 'mg', '<h3>Tianao ve ny hanao ny asa fanivanana volamena?</h3>\r\n\r\n<h4>I- Aiza no ahafahana manivam-bolamena ? </h4>\r\n<p>	\r\nAo amin’ny toerana voafaritra ao amin’ny Kaominina.\r\n</p>\r\n<h4>II-  Iza no afaka manivam-bolamena ? </h4>\r\n<ol>\r\n<li>Teratany Malagasy feno 18 taona,</li>\r\n</li>Miasa irery na anaty vondrona mpanivana volamena,</li>\r\n<li>Mipetraka ao amin’ny kaominina iasana.</li>\r\n</ol>\r\n<h4>III- Inona ny dingana arahina? </h4>\r\n<h5>A- Antotan-taratasy ilaina ho an’olontokana?</h5>\r\n<p>\r\nKaratra famantaran –ketra(Ivon-toeran-ketra)\r\nTaratasy fanamarinam-ponenana.\r\nDika mitovy voamarina ny kara-panondrom- pirenena.\r\nSarany :16 000 Ar.\r\nKaratra maha mpanivana(Kaominina).\r\nTaratasy fangatahana ny karatra maha mpanivana alefa amin’ny Ben’ny Tanàna.\r\nSary tapaka roa (02).\r\nFanamarinam-ponenana na pasipaoro\r\nDika mitovy ny kara-panondrom-pirenena\r\nVidin’ny karatra: 6 000 Ar – 10 000Ar.\r\n</p>  \r\n<h5>B- Antotan-taratasy ilaina ho an’ny olona miditra ao anaty vondron’ny mpanivam- bolamena?</h5> \r\n<p>Sata ny vondrona voatahiry ao amin’ny Distrika.\r\nTaratasy iombonana fangatahana ny karatra maha mpanivana.\r\nLisitr’ireo mpikambana.\r\nTaratasy famataran-ketra isaky ny mpanivana.\r\nSary tapaka roa (02) isaky ny mpikambana.\r\nTaratasy manamarina ny faneken’ny tompon’ny fahazoan-dalana hitrandraka harena an-kibon’ny tany raha tafiditra ao anaty toerana fitrandrahana.\r\nFanamarinam-ponenana isaky ny mpanivana. \r\nSaran’ny Karatra: 4000 Ar.\r\n</p>\r\n\r\n<h4>IV-   Inona avy ireo tombontsoan’ny mpanivana manana karatra?</h4>\r\n<p>Manivana volamena malalaka ao amin’ny faritra natokana ho amin’izany.\r\nMivarotra ny volamena malalaka any amin’ireo mpividy ara-dalana manana karatra.\r\nManankery iray taona ny karatra, azo avaozina.\r\nMahazo fiofanana (manao fangatahana ny Ben’ny Tanana)\r\n</p>\r\n<h4>V-     Inona avy ireo adidin’ny mpanivana manana karatra?</h4>\r\n<p>Mamerina amin’ny laoniny ny toerana avy niasana\r\nManaja ny didy amam-pitsipika mifehy ny tontolo iainana, ny fahasalamana ary ny fiahiana ny aina\r\nMitana ny boky firaketana ny vokatra sy ny lafo amin’ny volamenan’ny mpanivana (Vondrona)\r\nMivarotra ny volamena any amin’ireo mpividy volamena nahazo alalana amin’izany.\r\n</p>\r\n\r\n'),
(3, 2, 'fr', '<h3>SOUHAITEZ-VOUS DEVENIR COLLECTEUR CATEGORIE 1 (MPANDANJA) ?</h3><h4>I- Qui peut devenir Mpandanja? </h4>  	<ol><li>Personne physique, âgé de plus de 18 ans, </li><li>Nationalité Malagasy</li><li>Résider dans le Fokontany du lieu d''orpaillage.</li></ol><h4>II- Quelle est la procédure à suivre ? </h4><p>Déposer votre demande auprès de votre commune</p><h5>Quels sont les pièces à fournir ?<h5><p>1- Casier judiciaire, bulletin n°3 (Tribunal)Photocopie légalisée de la Carte d’Identité Nationale (CIN) ; Certificat de résidence ;Acte de naissance.</p><p>2- Carte statistique (Statistique)Photocopie légalisée de la Carte d’Identité Nationale (CIN) ; Certificat de résidence ;Casier judiciaire, bulletin n°3 ;Droit : 20 000 Ar</p><p>3- Récépissé de versement d’impôt synthétique (Centre fiscal)Certificat de résidence.Copie CIN légalisée.Droit : 16 000 Ar.</p><p>4- Carte mpandanja (Commune)Photocopie légalisée de la Carte d’Identité Nationale (CIN) ; Certificat de résidence ;Photocopie certifiée de la carte statistique ;Casier judiciaire, bulletin n°3 ;Certificat de régularité fiscale ;Formulaire de demande dûment complété, signé et approuvé par le demandeur adressé au Maire de la Commune concernée ; Deux (02) photos d’identité, format 4 x 4 ; Droit d’octroi : 200 000 Ar</p><h4>III- Quelles sont les avantages de la détention de la carte du Mpandanja ?</h4><p>Affiliation à un ComptoirAcheter l’Or des orpailleurs et de vendre sur la commune de résidence.Valable (01) an à partir de la date d’octroi, renouvelable une ou plusieurs fois</p><h4>IV- Quelles sont les obligations du Mpandanja ?</h4><p>Payer l''Impôt sur les Revenus Tenir à jours les Registres Entrées et Sorties d''Or visés mensuellement par le Maire de la Commune du ressort Faire une déclaration d''activité minimum (1kg par an) Remettre un rapport semestriel d''activités à la Direction Régionale ou Inter Régionale concernée ainsi qu''à l''ANOR </p>                  '),
(4, 2, 'mg', '<h3>Tianao ve ny hanao ny asa fandanjana volamena?<h3><h4>I- Aiza no afaka mandanja volamena?</h4><p>Eo amin’ny Kaominina manome ny karatra.</p><h4>II- Iza avy no afaka mandanja volamena?</h4><ol><li>Olon-tokana teratany Malagasy feno 18 taona,</li><li>Miankina na tsy miankina amin’ny Tobim-bolamena.</li><li>Mipetraka ao amin’ny kaominina iasana.</li></ol><h4>III-  Inona avy ireo dingana arahina?</h4><p>Taratasy firaketan-keloka na Bulletin N°3 (Tribonaly). Dika mitovy voamarina ny kara-panondrom-pirenena. Fanamarinam-ponenanaKopia ny nahaterahana. Karatra Statistika (Ivon-toerana Statistika).Dika mitovy voamarina ny kara-panondrom-pirenena. Fanamarinam-ponenanaTaratasy firaketan-keloka na Bulletin N°3.Sarany 20 000 ArKaratra famantaran-ketra (Ivon-toeran-ketra).                       Dika mitovy voamarina ny kara-panondrom-pirenena. Fanamarinam-ponenana.Dika mitovy voamarina ny karatra Statistika (CS). Sarany 16 000 Ariary.Karatra Mpandanja (Kaominina hiasana)                        Sary tapaka (02).Dika mitovy voamarina ny kara-panondrom-pirenena.Fanamarinam-ponenana.Dika mitovy voamarina ny karatra famantaran-ketra (CF).Dika mitovy ny karatra Statistika (CS).Mandoa ny saran’ny karatra maha mpandanja (200 000 Ar).</p><h4>IV- Inona avy ireo tombontsoa ny mpandanja manana karatra ? </h4> <p>Manankery iray taona eo amin’ny Kaominina voatondro ny karatra. Manavao ny karatra raha nahafeno sy nitandrina ny boky firaketana ny volamena voa angona.Miasa malalaka, mividy sy mivarotra volamena eo amin’ny Kaominina.</p>	V- Inona avy ireo adidy ny mpandanja manana karatra?Manao fanambarana ny vokatra fara faha keliny 1kg/taona;Tsy maintsy monina eo @ Kaominina iasana;Manao tatitra isam-bolana @ Kaominina;Mitana boky firaketana (vokatra miditra &mivoaka).'),
(5, 3, 'fr', '<h3>SOUHAITEZ-VOUS DEVENIR COLLECTEUR CATEGORIE 2 (MPANANGONA) ?</h3><h4>I- Qui peut devenir Mpanangona?</h4> <ol><li>Personne physique</li><li>Agé de plus de 18 ans</li> <li>Nationalité Malagasy</li><h4>II- Quelle est la procédure à suivre ? </h4>  <p>Déposer votre demande auprès de l’ANOR</p><h5>Quels sont les pièces à fournir ?</h5><p>1- Casier judiciaire, bulletin n°3 (Tribunal)Photocopie légalisée de la Carte d’Identité Nationale (CIN) ; Certificat de résidence ;Acte de naissance.</p><p>2- Déclaration d’activité (Direction régionale ou interrégionale des mines)</p><p>3- Certificat de régularité fiscale (Centre fiscal)Certificat de résidence.Copie CIN légalisée.Récépissé de déclaration d’activitéDroit : 16 000 Ar.</p><p>4- Carte statistique (Statistique)Photocopie légalisée de la Carte d’Identité Nationale (CIN) ; Certificat de résidence ;Casier judiciaire, bulletin n°3 ;Droit : 20 000 Ar</p><p>5- Carte mpanangona (ANOR)Lettre d’intention adressée à l’ANOR,Photocopie légalisée de la Carte d’Identité Nationale (CIN) ; Certificat de résidence ;Photocopie certifiée de la carte statistique ;Casier judiciaire, bulletin n°3 ;Certificat de régularité fiscale ;Formulaire de demande dûment complété, signé et approuvé par le demandeur ;Deux photos d’identité, format 4 x 4 ;Cahier des charges ;Droit : 500 000 Ar</p><h4>III- Quelles sont les avantages de la détention de la carte du Mpanangona ?</h4><p>Affiliation à un ComptoirAcheter et vendre l''Or des orpailleurs et des Mpandanja dans la Commune qui a délivré la carteCollecter l’Or sur (05) cinq Communes au maximum (5 cartes)Valable (01) an à partir de la date d’octroi, renouvelable une ou plusieurs fois</p><h4>IV- Quelles sont les obligations du Mpanangona ?</h4><p>Payer l''Impôt correspondantPayer les redevances minières correspondantesTenir à jours les Registres des Entrées et Sorties d''Or visés mensuellement par le Maire de la Commune du ressortFaire une déclaration d''activité minimum (3kg par an)Remettre un rapport semestriel d''activités, à la Direction Régionale ou Inter Régionale concernée ainsi qu''à l''ANOR.	</h4>'),
(6, 3, 'mg', '<h3>Tianao ve ny hanao ny asa fanangonana volamena?</h3><h4>I- Aiza no afaka manangom- bolamena?<h4><p>Eo amin’ny Kaominina voalaza ao amin’ny karatra.</p><h4>II- Iza avy no afaka manangom-bolamena? </h4>  	<ol><li>Olon-tokana teratany Malagasy feno 18 taona,</li> <li>miankina na tsy miankina amin’ny Tombim-bolamena.</lI></oL><h4>III- Inona avy ireo dingana arahina? </h4><p>Taratasy firaketan-keloka na Bulletin N°3 (Tribonaly). Dika mitovy voamarina ny kara-panondrom-pirenena. Fanamarinam-ponenanaKopia ny nahaterahana. </p><p>Fanambarana ny asa hatao (Birao ny Sampan-draharaha misahana ny Harena an-kibon’ny Tany sy ny Solika).</p><p>Karatra famantaran-ketra (Ivo toeran-ketra).Dika mitovy voamarina ny kara-panondrom-pirenena. Fanamarinam-ponenanaSarany 16 000 Ariary.Fanambarana ny asa hatao. </p><p>Karatra statisitika, (Ivo toerana statistika). Dika mitovy voamarina ny kara-panondrom-pirenena. Fanamarinam-ponenana.Taratasy firaketan-keloka na Bulletin N°3.Sarany 20 000 Ar.  </p><p>Misoratra anarana mialoha eny anivon’ny ANORDika mitovy ny kara-panondrom-pirenena.                                          Fanamarinam-ponenana.Sary tapaka (02).Taratasy firaketan-keloka na Bulletin N°3.Dika mitovy ary voamarina ny karatra famatarana ara-ketra (CF).Dika mitovy ary voamarina ny karatra statistika (CS).Dika mitovy voamarina fa voasoratra ao amin’ny RCSMandoa ny saram-pankatoavana 500 000 Ariary.Mandray ny karatra sy mameno ny Bokin’andraikitra.</p><p>Karatra sy bokin’andraikitra (Kaominina iasana).Mampanao Sonia ny bokin’andraikitra sy ny karatra.</p><h4>IV- Inona avy ireo tombontsoa ny mpanangona manana karatra?Manankery iray taona ny karatra.</h4><p>Karatra iray isakin’ny Kaominina iasana.Afaka maka karatra dimy(5) ny mpanangona iray.Afaka miankina amin’ny tobim-bolamena na Comptoir izay mandoa ny vidin’ny karatra.Miasa malalaka, mividy sy mivarotra volamenaAfaka tsy monina eo amin’ny Kaominina iasan’ny Mpanangona.</p><h4>V- Inona avy ireo adidin’ ny mpanangona manana karatra?</h4><p>Manao fanambarana ny vokatra fara faha keliny 3kg/taonaTsy maintsy manao tatitra isaky ny enim-bolana alefa amin’ny ANORTsy maintsy mitana boky firaketana miditra sy mivoakaMandoa ny tamberim-bidy (Ristournes) sy Sara efaina (Redevances minières)</p>'),
(7, 4, 'fr', '<h3>SOUHAITEZ-VOUS CREER COMPTOIR COMMERCIAL ?</h3><h4>I- Qui peut devenir Comptoir commercial?</h4><ol><li>Société de droit Malagasy </li><lI>Statuts permettant d’exercer l’activité d’achat, de vendre et d’exporter l’Or</li><lI>Avoir un Responsable résidant à Madagascar</li></ol><h4>II- Quels sont les critères d’octroi?</h4><p>Cahier de charges complété montrant les capacités techniques (matériel et technologie) et financières ;Dossier complet</p><h4>III- Quelle est la procédure à suivre ? </h4>  <p>Déposer votre demande auprès de l’ANOR<p><h5>Quels sont les pièces à fournir ?</h5><p>Demande complétée ;</p><p>Photocopie certifiée des Statuts de la société ;</p><p>Cahier des charges complété et signé par le responsable ;</p><p>Photocopie certifiée : Bulletin n°3, certificat de résidence, CIN/carte de résident du responsable ;</p><p>Photocopie certifiée : Carte d’Immatriculation Fiscale, Carte d’Identification Statistique, enregistrement au RCS Quittance de paiement du frais d''instruction (15% du droit d’agrément).</p><p>Droit d’agrément : 20 000 000 Ar</p><p>Délivrance de l’agrément : 15 jours suivant réception de dossier</p><h4>IV- Quelles sont les avantages du comptoir commercial ?</h4><p>Acheter l’or sur tout le territoire National   auprès de : Opérateurs qui lui sont affiliés,Opérateurs agrées de la filière Or,Titulaires de permis minier d’exploitation pour Or ;Exporter l’Or Agrément valable pour deux (02) ans renouvelables une ou plusieurs fois</p><h4>V- Quelles sont les obligations du comptoir commercial ?</h4><p>Respecter le cahier de charges ;Accomplir les obligations fiscales et parafiscales ;Faire un rapport semestriel d’activités à l’ANOR.</p>'),
(8, 5, 'fr', '<h3>SOUHAITEZ-VOUS CREER COMPTOIR DE FONTE ?</h3><h4>I- Qui peut devenir Comptoir de fonte?</h4> <ol><li>Société de droit Malagasy </li>0<li>Statuts permettant d’exercer l’activité d’acheter, de vendre et d’exporter l’Or</li><li>Avoir un Responsable résidant à  Madagascar</li></ol><h4>II- Quels sont les critères d’octroi?</h4><p>Cahier de charges complété montrant les capacités techniques (matériel et technologie) et financières ;Dossier complet</p><h4>III- Quelle est la procédure à suivre ? </h4>  <p>Déposer votre demande auprès de l’ANOR</p><h5>Quels sont les pièces à fournir ?</h5><p>Demande complétée ;</p><p>Photocopie certifiée des Statuts de la société ;</p><p>Cahier des charges complété et signé par le responsable ;</p><p>Photocopie certifiée : Bulletin n°3, certificat de résidence, CIN/carte de résident du responsable ;</p><p>Photocopie certifiée : Carte d’Immatriculation Fiscale, Carte d’Identification Statistique, enregistrement au RCS Quittance de paiement du frais d''instruction (15% du droit d’agrément).</p><p>Droit d’agrément : 30 000 000 Ar</p><p>Délivrance de l’agrément : 30 jours ouvrables suivant réception de dossier</p><h4>IV- Quelles sont les avantages du comptoir de fonte ?</h4><p>Acheter l’Or sur tout le territoire National auprès de : Opérateurs qui lui sont affiliés,Opérateurs de la filière or agréés,Titulaires de permis minier d’exploitation pour Or ;Transformer l’or en lingot ;Exporter l’Or lingoté après poinçonnageAgrément valable pour cinq (05) ans renouvelables une ou plusieurs fois</p><h4>V- Quelles sont les obligations du comptoir de fonte ?</h4><p>Respecter le cahier de charges ;Accomplir les obligations fiscales et parafiscales ;Faire un rapport semestriel d’activités à l’ANORSe conformer à la législation environnementale en vigueur.</p>'),
(9, 6, 'fr', '<h3>I- BIJOUTIERS</h3>Source d’information : DIR<h3>1. Procédures actuelles </h3><p>Attestation de déclaration au niveau des DIRCIF/STAT (Edbm ou centre fiscal et statistiques)Certificat de régularité fiscale (Centre fiscal)Certificat de résidence.Copie CIN légalisée.Récépissé de déclaration d’activitéDroit : 16 000 Ar.Carte statistique (Statistique)Photocopie légalisée de la Carte d’Identité Nationale (CIN) ; Certificat de résidence ;Casier judiciaire, bulletin n°3 ;Droit : 20 000 ArDemande de réception de l’atelier au niveau de la DIR concernéePJ : Photocopie légalisée Carte professionnelle Liste matériels à utiliserPlan atelier Plan de repérageLettre consentement autorité locale (Maire ou chef Fkt du lieu d’installationLettre consentement du propriétaire du local si locationObtention autorisation de mise en service par la DIR concernée</p><h4>2. Rapports/contrôle</h4><p>Rapport semestriel pour la DIRRegistre entrées et sortiesLPCarnet de poinçonnage</p><h3>II- DEMANDE D’AUTORISATION DE MISE EN SERVICE D’UN ATELIER DE TRANSFORMATION OU DE LAPIDAIRERIE</h3><h4>Quelles sont les pièces à fournir ?</h4><p>Photocopie légalisée de la carte professionnelle valideListe de matériels à utiliserPlan de local (Atelier)Plan de repérageLettre de consentement de l’autorité locale (Maire ou Chef Fokontany) du lieu d’installationLettre de consentement du propriétaire du local en cas de location par le requérant</p><h3>III- DEMANDE DE CERTIFICAT D’EPREUVE DE L’APPAREIL A PRESSION</h3><p>Un état descriptif de l’appareilUn plan côté de l’appareilUne note de calculUn certificat de visite avant épreuve</p>'),
(10, 7, 'fr', '<h3>PROCEDURE DE CREATION D’UNE SOCIETE</h3>Quelles sont les procédures à suivre pour créer une société ?<h4>I- Attestation de Déclaration (AD) au niveau de la Direction Interrégionale (Source d’information : DIR)</h4><p>AD : dossier indispensable pour la création de société à l’EDBMDossiers : Statuts de la société (personne morale) non enregistré, (majoritairement SARL ou SARLU), avec mention précise dans l’objet, entre autres,  de l’activité d’achat, de vente et d’exportation de métaux précieux OrFormulaire au niveau de la DIRPour chaque associé et gérant :Copie CIN ou passeport ou carte de résident (certifié)Certificat de résidence (moins de 3 mois)Bulletin numéro 3 (moins de 3 mois)CIF/ Stat si ancien opérateurChemiseCoûts : n/aTiming : maximum 3 jours (dossiers complets)</p><h4>II- Création de Société au niveau de l’EDBM (Source d’information : EDBM)</h4><p>Si société déjà existante : rajout de l’activité de commercialisation (si non indiquée encore dans les statuts), achat et vente, exportation de métaux précieux : OrDossiers :DésignationQtéProcédure de baseStatuts de la société (*)Paraphés par page et signés en dernière page par tous les associésLe lieu d’exercice doit être mentionné dans les statuts ou dans un PV8Copie de la Carte d’Identité Nationale (CIN)OU SI ETRANGER, copie du Passeport avec Visa long séjour du (des) gérant(s)34Certificat de résidence (original) du (des) gérant(s) <3 mois2Jouissance de local (siège et/ou lieu d’exercice) : contrat de bail OU contrat de sous-location (*) (y mentionner le numéro de téléphone du bailleur)A joindre :Copie intégrale du Titre de propriété du bailleur OU Certificat de situation juridique (CSJ) <3 mois (si bailleur = propriétaire inscrit)OU acte de notoriété du propriétaire inscrit et autorisation de louer par les cohéritiers (si bailleur = héritier ne figurant pas dans le CSJ ou le Titre foncier)Procuration donnée par le propriétaire (si bailleur = mandataire)Acte de vente enregistré <1 an (si bailleur = acheteur)Contrat de bail précédent et enregistré régulièrement avec autorisation expresse du propriétaire (si bailleur = locataire, c’est-à-dire il y a sous-location)Plan de repérage visé par le Fokontany52Procuration légalisée et copie de la CIN du mandataire2Déclaration de non-condamnation (gérant et co-gérant) (*)1Bordereau Impôt sur les Revenus (IR)2Attestation de filiation (UNIQUEMENT POUR gérant et co-gérant étranger) (*)1Attestation de Déclaration2Frais (Payable en espèces auprès du Front Office-EDBM)DésignationMontantEnregistrement des statuts0,5% du capital social (minimum de perception : 10.000 Ar)Enregistrement du bail commercial2% du montant total du loyer pendant la durée du bailImpôts sur les Revenus (IR)320.000 Ar (cf. Art 01.01.14 du Code Général des Impôts)PV-Procuration2.000 ArImmatriculation au Registre du Commerce et des Sociétés (RCS)16.000 ArImmatriculation statistique (STAT)40.000 ArTiming: 04 jours (dossiers complets)</p>'),
(11, 8, 'fr', '<h3>PROCEDURE D’EXPORTATION (GUICHET UNIQUE) (Source d’information : Guichet Unique Ampadrianomby)</h3><h4>I- Direction de la Gestion des Activités Minières (DGAM)</h4><p>Enregistrement des dossiers recevabilitésFiche de déclaration MinesFiche signalétiqueFactures en 08 exemplaires – domiciliées en banqueLP III ELP justifiant l’origine des pierres :LP I pour les brutesLP II pour les transformateursLP</p> <h4>III C pour les brutes et/ou taillées (pour les commerçants)Ou facture réglementaire<br/>II- Laboratoire National des MinesContrôle d nature et qualité par rapport à la déclaration de l’exportateurFiche signalétique ou/et certification des pierres délivrée par IGM (Laboratoire agréé par l’Etat)<br/>III- DEM (Division Exportation Minière)Constatation Contrôle du prix suivant appréciation du LaboratoireEnvoi à la banque pour domiciliationIV- Mines – Douanes – Gendarme – LaboratoireConstatation de la conformitéScellageV- Guichet UniquePaiement : redevance et du ristourne 2%Paiement droit de délivrance (100 000 Ar pour envoi commercial inferieur 50 000 000 Ar)<br/>VI- DGAMDélivrance Certificat de conformité (cc)<br/>VII- GU : Formalités douanièresPièces exigées :Fiche de déclaration douanière uniqueCertificat de conformitéPV de scellage, de contrôle et de constatationPhotocopie billet et passeport (Bagages accompagnés)<br/>VIII- LIEU D’EMBARQUEMENT : IVATO');

-- --------------------------------------------------------

--
-- Table structure for table `proc_procedure`
--

CREATE TABLE IF NOT EXISTS `proc_procedure` (
`pproc_id` int(11) NOT NULL,
  `pproc_libelle` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proc_procedure`
--

INSERT INTO `proc_procedure` (`pproc_id`, `pproc_libelle`) VALUES
(1, 'Orpailleur'),
(2, 'Collecteur 1'),
(3, 'Collecteur 2'),
(4, 'Comptoir commerciale'),
(5, 'Comptoir de fonte'),
(6, 'Bijoutier'),
(7, 'E.D.B.M'),
(8, 'Exportation');

-- --------------------------------------------------------

--
-- Table structure for table `role_administrateur`
--

CREATE TABLE IF NOT EXISTS `role_administrateur` (
`radm_id` int(11) NOT NULL,
  `radm_role` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_administrateur`
--

INSERT INTO `role_administrateur` (`radm_id`, `radm_role`) VALUES
(1, 'Au titre du Ministère des Mines'),
(2, 'Au titre de la Présidence de la République'),
(3, 'Au titre de la Primature'),
(4, 'Au titre du Ministère des Finances et du Budget'),
(5, 'Au titre du Ministère de l’Intérieur et de la Décentralisation '),
(6, 'Au titre de la Chambre des Mines de Madagascar');

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

-- --------------------------------------------------------

--
-- Table structure for table `uti_type`
--

CREATE TABLE IF NOT EXISTS `uti_type` (
`utype_id` int(11) NOT NULL,
  `utype_code` varchar(1) NOT NULL,
  `utype_libelle` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uti_type`
--

INSERT INTO `uti_type` (`utype_id`, `utype_code`, `utype_libelle`) VALUES
(1, 'A', 'administrateue'),
(2, 'D', 'Douane'),
(3, 'F', 'Finance'),
(4, 'I', 'Ivato'),
(5, 'M', 'MPMP');

-- --------------------------------------------------------

--
-- Table structure for table `uti_utilisateur`
--

CREATE TABLE IF NOT EXISTS `uti_utilisateur` (
`uti_id` int(11) NOT NULL,
  `utype_id` int(11) NOT NULL,
  `uti_login` varchar(50) CHARACTER SET utf8 NOT NULL,
  `uti_mdp` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uti_utilisateur`
--

INSERT INTO `uti_utilisateur` (`uti_id`, `utype_id`, `uti_login`, `uti_mdp`) VALUES
(1, 1, 'admin', '5abd7b6b485cec487ad40f390d10980a113cba3b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accueil`
--
ALTER TABLE `accueil`
 ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `actu_actualite`
--
ALTER TABLE `actu_actualite`
 ADD PRIMARY KEY (`aact_id`);

--
-- Indexes for table `actu_article`
--
ALTER TABLE `actu_article`
 ADD PRIMARY KEY (`aart_id`);

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `a_propos`
--
ALTER TABLE `a_propos`
 ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `cadre`
--
ALTER TABLE `cadre`
 ADD PRIMARY KEY (`cad_id`);

--
-- Indexes for table `cadre_rubrique`
--
ALTER TABLE `cadre_rubrique`
 ADD PRIMARY KEY (`crub_id`);

--
-- Indexes for table `collaborateur`
--
ALTER TABLE `collaborateur`
 ADD PRIMARY KEY (`colb_id`);

--
-- Indexes for table `comptoir`
--
ALTER TABLE `comptoir`
 ADD PRIMARY KEY (`cptr_id`);

--
-- Indexes for table `exp_exportateur`
--
ALTER TABLE `exp_exportateur`
 ADD PRIMARY KEY (`eexp_id`);

--
-- Indexes for table `exp_exportation`
--
ALTER TABLE `exp_exportation`
 ADD PRIMARY KEY (`eexpt_id`);

--
-- Indexes for table `galerie`
--
ALTER TABLE `galerie`
 ADD PRIMARY KEY (`gal_id`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
 ADD PRIMARY KEY (`pers_id`);

--
-- Indexes for table `proc_contenu`
--
ALTER TABLE `proc_contenu`
 ADD PRIMARY KEY (`pcont_id`);

--
-- Indexes for table `proc_procedure`
--
ALTER TABLE `proc_procedure`
 ADD PRIMARY KEY (`pproc_id`);

--
-- Indexes for table `role_administrateur`
--
ALTER TABLE `role_administrateur`
 ADD PRIMARY KEY (`radm_id`);

--
-- Indexes for table `statistique`
--
ALTER TABLE `statistique`
 ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `uti_type`
--
ALTER TABLE `uti_type`
 ADD PRIMARY KEY (`utype_id`);

--
-- Indexes for table `uti_utilisateur`
--
ALTER TABLE `uti_utilisateur`
 ADD PRIMARY KEY (`uti_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accueil`
--
ALTER TABLE `accueil`
MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `actu_actualite`
--
ALTER TABLE `actu_actualite`
MODIFY `aact_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `actu_article`
--
ALTER TABLE `actu_article`
MODIFY `aart_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `a_propos`
--
ALTER TABLE `a_propos`
MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cadre`
--
ALTER TABLE `cadre`
MODIFY `cad_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cadre_rubrique`
--
ALTER TABLE `cadre_rubrique`
MODIFY `crub_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `collaborateur`
--
ALTER TABLE `collaborateur`
MODIFY `colb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comptoir`
--
ALTER TABLE `comptoir`
MODIFY `cptr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `exp_exportateur`
--
ALTER TABLE `exp_exportateur`
MODIFY `eexp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `exp_exportation`
--
ALTER TABLE `exp_exportation`
MODIFY `eexpt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `galerie`
--
ALTER TABLE `galerie`
MODIFY `gal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
MODIFY `pers_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `proc_contenu`
--
ALTER TABLE `proc_contenu`
MODIFY `pcont_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `proc_procedure`
--
ALTER TABLE `proc_procedure`
MODIFY `pproc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `role_administrateur`
--
ALTER TABLE `role_administrateur`
MODIFY `radm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `statistique`
--
ALTER TABLE `statistique`
MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uti_type`
--
ALTER TABLE `uti_type`
MODIFY `utype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `uti_utilisateur`
--
ALTER TABLE `uti_utilisateur`
MODIFY `uti_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
