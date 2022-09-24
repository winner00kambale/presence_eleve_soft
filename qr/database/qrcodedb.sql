-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 24 sep. 2022 à 21:32
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `qrcodedb`
--

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_annee` (IN `design` VARCHAR(50))   BEGIN
IF design IN (SELECT t_annee.designation FROM t_annee)THEN
UPDATE t_annee SET t_annee.designation=design WHERE t_annee.designation=design;
ELSE
INSERT INTO t_annee(t_annee.designation)VALUES(design);
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_option` (IN `design` VARCHAR(50))   BEGIN
IF design IN (SELECT t_option.designation FROM t_option)THEN
UPDATE t_option SET t_option.designation=design WHERE t_option.designation=design;
ELSE
INSERT INTO t_option(t_option.designation)VALUES(design);
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_photo` (IN `date` VARCHAR(50))   BEGIN
DECLARE id int;
SET id =(SELECT MAX(t_presence.id) FROM t_presence);
SELECT * FROM t_presence LEFT JOIN t_eleve ON t_eleve.matricule=t_presence.matriculle_eleve WHERE t_presence.id=id AND t_presence.LOGDATE=date;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_presence` (IN `matricule` VARCHAR(50), IN `timein` VARCHAR(50), IN `logdate` VARCHAR(50))   BEGIN
	IF matricule NOT IN (SELECT t_presence.matriculle_eleve FROM t_presence WHERE t_presence.LOGDATE=CURDATE()) THEN
    INSERT INTO `t_presence`(`matriculle_eleve`, `TIMEIN`, `LOGDATE`, `status`) 	
    VALUES(matricule,timein,logdate,'1');
  END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `affclasse`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `affclasse` (
`classe` varchar(103)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `aff_anee`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `aff_anee` (
`annee` varchar(12)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `aff_classe`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `aff_classe` (
`id` int(11)
,`designation` varchar(50)
,`_option` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `aff_eleve`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `aff_eleve` (
`id` int(11)
,`Nom` varchar(50)
,`Postnom` varchar(50)
,`Prenom` varchar(50)
,`sexe` varchar(1)
,`adresse` varchar(100)
,`telephone` varchar(50)
,`nompere` varchar(50)
,`nommere` varchar(50)
,`fonction` varchar(50)
,`age` int(5)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `aff_eleve_non_inscrit`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `aff_eleve_non_inscrit` (
`id` int(11)
,`Nom` varchar(50)
,`Postnom` varchar(50)
,`Prenom` varchar(50)
,`sexe` varchar(1)
,`adresse` varchar(100)
,`telephone` varchar(50)
,`nompere` varchar(50)
,`nommere` varchar(50)
,`fonction` varchar(50)
,`age` int(5)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `aff_users`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `aff_users` (
`id` int(11)
,`nom` varchar(50)
,`postnom` varchar(50)
,`prenom` varchar(50)
,`sexe` varchar(1)
,`photo` blob
,`username` varchar(50)
,`password` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la table `attendance`
--

CREATE TABLE `attendance` (
  `ID` int(11) NOT NULL,
  `STUDENTID` varchar(250) NOT NULL,
  `TIMEIN` varchar(250) NOT NULL,
  `TIMEOUT` varchar(250) NOT NULL,
  `LOGDATE` varchar(250) NOT NULL,
  `STATUS` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `attendance`
--

INSERT INTO `attendance` (`ID`, `STUDENTID`, `TIMEIN`, `TIMEOUT`, `LOGDATE`, `STATUS`) VALUES
(160, 'SY01-1122', '17:56:25', '17:57:00', '2021-05-03', '1'),
(161, 'SY02-1133', '17:56:29', '17:56:54', '2021-05-03', '1'),
(162, 'SY03-1144', '17:56:34', '17:56:49', '2021-05-03', '1'),
(163, 'SY04-1155', '17:56:37', '17:56:40', '2021-05-03', '1'),
(165, 'SY02-1133', '06:52:06', '', '2021-05-04', '0'),
(166, '', '02:35:48', '', '2021-05-07', '0'),
(167, '1122121200004', '02:36:38', '02:38:15', '2021-05-07', '1'),
(168, '4802000000006', '02:38:02', '02:38:06', '2021-05-07', '1'),
(169, 'SY02-1133', '11:38:57 AM', '11:40:11 AM', '2022-09-18', '1'),
(170, 'SY03-1144', '11:41:34 AM', '12:01:06 PM', '2022-09-18', '1');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `carte_eleve`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `carte_eleve` (
`id` int(11)
,`Nom` varchar(50)
,`Postnom` varchar(50)
,`Prenom` varchar(50)
,`sexe` varchar(8)
,`photo` blob
,`matricule` varchar(50)
,`classe` varchar(50)
,`option_` varchar(50)
,`annee` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `getclasse`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `getclasse` (
`id` int(11)
,`classe` varchar(102)
);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ref_enseignant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `ref_enseignant`) VALUES
(2, 'winner', 'winner', 1),
(4, 'masika', 'masika', 2);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `rapport`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `rapport` (
`id` bigint(21)
,`noms` varchar(156)
,`classe` varchar(50)
,`option_` varchar(50)
,`annee` varchar(50)
,`LOGDATE` date
,`statut` int(1)
);

-- --------------------------------------------------------

--
-- Structure de la table `schedules`
--

CREATE TABLE `schedules` (
  `ID` int(11) NOT NULL,
  `TIMEIN` time NOT NULL,
  `TIMEOUT` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `schedules`
--

INSERT INTO `schedules` (`ID`, `TIMEIN`, `TIMEOUT`) VALUES
(1, '07:00:00', '16:00:00'),
(2, '08:00:00', '17:00:00'),
(3, '09:00:00', '18:00:00'),
(4, '10:00:00', '19:00:00');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `showeleve`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `showeleve` (
`id` int(11)
,`Nom` varchar(50)
,`Postnom` varchar(50)
,`Prenom` varchar(50)
,`sexe` varchar(8)
,`adresse` varchar(100)
,`telephone` varchar(50)
,`nompere` varchar(50)
,`nommere` varchar(50)
,`fonction` varchar(50)
,`age` int(5)
,`photo` blob
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `show_eleve`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `show_eleve` (
`id` int(11)
,`Nom` varchar(50)
,`Postnom` varchar(50)
,`Prenom` varchar(50)
,`sexe` varchar(8)
,`adresse` varchar(100)
,`telephone` varchar(50)
,`nompere` varchar(50)
,`nommere` varchar(50)
,`fonction` varchar(50)
,`age` int(5)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `show_scan`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `show_scan` (
`id` int(11)
,`eleve` varchar(154)
,`sexe` varchar(1)
,`photo` blob
,`matricule` varchar(50)
,`classe` varchar(50)
,`option_` varchar(50)
,`annee` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `STUDENTID` varchar(250) NOT NULL,
  `FIRSTNAME` varchar(250) NOT NULL,
  `MNAME` varchar(250) NOT NULL,
  `LASTNAME` varchar(250) NOT NULL,
  `AGE` varchar(250) NOT NULL,
  `GENDER` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`ID`, `STUDENTID`, `FIRSTNAME`, `MNAME`, `LASTNAME`, `AGE`, `GENDER`) VALUES
(1, 'SY01-1122', 'John', 'P', 'Cena', '45', 'Male'),
(2, 'SY02-1133', 'Andres', 'P', 'Jario', '31', 'Male'),
(3, 'SY03-1144', 'Crischel', 'T', 'Amorio', '26', 'Female'),
(4, 'SY04-1155', 'Source', 'S', 'Code', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `t_annee`
--

CREATE TABLE `t_annee` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `t_annee`
--

INSERT INTO `t_annee` (`id`, `designation`) VALUES
(1, '2021 - 2022');

-- --------------------------------------------------------

--
-- Structure de la table `t_classe`
--

CREATE TABLE `t_classe` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ref_option` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `t_classe`
--

INSERT INTO `t_classe` (`id`, `designation`, `ref_option`) VALUES
(2, '3 eme', 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_eleve`
--

CREATE TABLE `t_eleve` (
  `id` int(11) NOT NULL,
  `Nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Postnom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `datenaiss` date NOT NULL,
  `nompere` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nommere` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fonction` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `photo` blob NOT NULL,
  `matricule` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `t_eleve`
--

INSERT INTO `t_eleve` (`id`, `Nom`, `Postnom`, `Prenom`, `sexe`, `datenaiss`, `nompere`, `nommere`, `fonction`, `adresse`, `telephone`, `photo`, `matricule`) VALUES
(3, 'kambale', 'karahire', 'Winner', 'M', '1995-08-05', 'kibwana', 'mulisha', 'commercant', 'Katoyi 2', '+243 997604471', 0x3836323932313037392e6a7067, '2022/Win/003'),
(4, 'Baraka', 'salama', 'moise', 'M', '1999-06-09', 'aaa', 'aaaaa', 'comm', 'Katoyi 2', '+243 997604472', 0x313032363833373637342e6a7067, '2022/moi/004'),
(5, 'jered', 'jered', 'jered', 'M', '1984-06-24', 'jered', 'jered', 'etudiant', 'himbi 2', '+243 997604486', 0x39343335363533302e6a7067, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `t_enseignant`
--

CREATE TABLE `t_enseignant` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `postnom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `fonction` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `t_enseignant`
--

INSERT INTO `t_enseignant` (`id`, `nom`, `postnom`, `prenom`, `sexe`, `fonction`, `adresse`, `telephone`, `photo`) VALUES
(1, 'kambale', 'karahire', 'Winner', 'M', 'commercant', '3 Lampes', '+243 997604471', 0x3838333738303532382e6a7067),
(2, 'masika', 'makasi', 'laurence', 'F', 'etudiante', 'makoro', '+243 997604472', 0x39373039303633362e6a7067);

-- --------------------------------------------------------

--
-- Structure de la table `t_inscription`
--

CREATE TABLE `t_inscription` (
  `id` int(11) NOT NULL,
  `datejour` date DEFAULT NULL,
  `ref_classe` int(11) DEFAULT NULL,
  `ref_annee` int(11) DEFAULT NULL,
  `ref_et` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `t_inscription`
--

INSERT INTO `t_inscription` (`id`, `datejour`, `ref_classe`, `ref_annee`, `ref_et`) VALUES
(12, '2022-09-22', 2, 1, 4),
(13, '2022-09-22', 2, 1, 3);

--
-- Déclencheurs `t_inscription`
--
DELIMITER $$
CREATE TRIGGER `add_matricule` AFTER INSERT ON `t_inscription` FOR EACH ROW BEGIN
DECLARE matricul varchar(50);
DECLARE mat varchar(50);
DECLARE refcli int;
SET refcli = (SELECT t_inscription.ref_et  FROM `t_inscription` WHERE t_inscription.id = (SELECT MAX(t_inscription.id) FROM t_inscription));
SET mat=(SELECT matricule FROM t_eleve WHERE t_eleve.id=refcli);
SET matricul = (SELECT CONCAT(YEAR(t_inscription.datejour),'/',SUBSTRING(Prenom,1,3),'/00',t_eleve.id) FROM `t_eleve` INNER JOIN t_inscription ON t_inscription.ref_et=t_eleve.id WHERE t_inscription.id=(SELECT MAX(t_inscription.id) FROM t_inscription));
IF mat IS NULL OR mat='' THEN
UPDATE t_eleve SET t_eleve.matricule=matricul WHERE id=refcli;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `t_option`
--

CREATE TABLE `t_option` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `t_option`
--

INSERT INTO `t_option` (`id`, `designation`) VALUES
(3, 'INFORMATIQUE');

-- --------------------------------------------------------

--
-- Structure de la table `t_presence`
--

CREATE TABLE `t_presence` (
  `id` int(11) NOT NULL,
  `matriculle_eleve` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TIMEIN` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LOGDATE` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `t_presence`
--

INSERT INTO `t_presence` (`id`, `matriculle_eleve`, `TIMEIN`, `LOGDATE`, `status`) VALUES
(1, '2022/moi/004', '16:14:26 PM', '2022-09-24', '1');

-- --------------------------------------------------------

--
-- Structure de la vue `affclasse`
--
DROP TABLE IF EXISTS `affclasse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `affclasse`  AS SELECT concat(`t_classe`.`designation`,'   ',`t_option`.`designation`) AS `classe` FROM (`t_classe` join `t_option` on(`t_option`.`id` = `t_classe`.`ref_option`))  ;

-- --------------------------------------------------------

--
-- Structure de la vue `aff_anee`
--
DROP TABLE IF EXISTS `aff_anee`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aff_anee`  AS SELECT concat(year(curdate()) - 1,' - ',year(curdate())) AS `annee``annee`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `aff_classe`
--
DROP TABLE IF EXISTS `aff_classe`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aff_classe`  AS SELECT `t_classe`.`id` AS `id`, `t_classe`.`designation` AS `designation`, `t_option`.`designation` AS `_option` FROM (`t_classe` join `t_option` on(`t_option`.`id` = `t_classe`.`ref_option`))  ;

-- --------------------------------------------------------

--
-- Structure de la vue `aff_eleve`
--
DROP TABLE IF EXISTS `aff_eleve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aff_eleve`  AS SELECT `t_eleve`.`id` AS `id`, `t_eleve`.`Nom` AS `Nom`, `t_eleve`.`Postnom` AS `Postnom`, `t_eleve`.`Prenom` AS `Prenom`, `t_eleve`.`sexe` AS `sexe`, `t_eleve`.`adresse` AS `adresse`, `t_eleve`.`telephone` AS `telephone`, `t_eleve`.`nompere` AS `nompere`, `t_eleve`.`nommere` AS `nommere`, `t_eleve`.`fonction` AS `fonction`, year(curdate()) - year(`t_eleve`.`datenaiss`) AS `age` FROM `t_eleve``t_eleve`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `aff_eleve_non_inscrit`
--
DROP TABLE IF EXISTS `aff_eleve_non_inscrit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aff_eleve_non_inscrit`  AS SELECT `aff_eleve`.`id` AS `id`, `aff_eleve`.`Nom` AS `Nom`, `aff_eleve`.`Postnom` AS `Postnom`, `aff_eleve`.`Prenom` AS `Prenom`, `aff_eleve`.`sexe` AS `sexe`, `aff_eleve`.`adresse` AS `adresse`, `aff_eleve`.`telephone` AS `telephone`, `aff_eleve`.`nompere` AS `nompere`, `aff_eleve`.`nommere` AS `nommere`, `aff_eleve`.`fonction` AS `fonction`, `aff_eleve`.`age` AS `age` FROM `aff_eleve` WHERE !(`aff_eleve`.`id` in (select `t_inscription`.`ref_et` from `t_inscription` where year(`t_inscription`.`ref_annee`) = year(curdate())))  ;

-- --------------------------------------------------------

--
-- Structure de la vue `aff_users`
--
DROP TABLE IF EXISTS `aff_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aff_users`  AS SELECT `login`.`id` AS `id`, `t_enseignant`.`nom` AS `nom`, `t_enseignant`.`postnom` AS `postnom`, `t_enseignant`.`prenom` AS `prenom`, `t_enseignant`.`sexe` AS `sexe`, `t_enseignant`.`photo` AS `photo`, `login`.`username` AS `username`, `login`.`password` AS `password` FROM (`login` join `t_enseignant` on(`t_enseignant`.`id` = `login`.`ref_enseignant`))  ;

-- --------------------------------------------------------

--
-- Structure de la vue `carte_eleve`
--
DROP TABLE IF EXISTS `carte_eleve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `carte_eleve`  AS SELECT `t_inscription`.`id` AS `id`, `t_eleve`.`Nom` AS `Nom`, `t_eleve`.`Postnom` AS `Postnom`, `t_eleve`.`Prenom` AS `Prenom`, CASE WHEN `t_eleve`.`sexe` = 'M' THEN 'Masculin' ELSE 'Feminin' END AS `sexe`, `t_eleve`.`photo` AS `photo`, `t_eleve`.`matricule` AS `matricule`, `t_classe`.`designation` AS `classe`, `t_option`.`designation` AS `option_`, `t_annee`.`designation` AS `annee` FROM ((((`t_inscription` join `t_eleve` on(`t_eleve`.`id` = `t_inscription`.`ref_et`)) join `t_classe` on(`t_classe`.`id` = `t_inscription`.`ref_classe`)) join `t_option` on(`t_option`.`id` = `t_classe`.`ref_option`)) join `t_annee` on(`t_annee`.`id` = `t_inscription`.`ref_annee`))  ;

-- --------------------------------------------------------

--
-- Structure de la vue `getclasse`
--
DROP TABLE IF EXISTS `getclasse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `getclasse`  AS SELECT `t_classe`.`id` AS `id`, concat(`t_classe`.`designation`,'  ',`t_option`.`designation`) AS `classe` FROM (`t_classe` join `t_option` on(`t_option`.`id` = `t_classe`.`ref_option`))  ;

-- --------------------------------------------------------

--
-- Structure de la vue `rapport`
--
DROP TABLE IF EXISTS `rapport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rapport`  AS SELECT row_number() over ( order by `t_eleve`.`Nom` desc) AS `id`, concat(`t_eleve`.`Nom`,'   ',`t_eleve`.`Postnom`,'   ',`t_eleve`.`Prenom`) AS `noms`, `t_classe`.`designation` AS `classe`, `t_option`.`designation` AS `option_`, `t_annee`.`designation` AS `annee`, CASE WHEN `t_presence`.`LOGDATE` = curdate() THEN curdate() ELSE curdate() END AS `LOGDATE`, CASE WHEN `t_presence`.`status` is null THEN 0 ELSE 1 END AS `statut` FROM (((((`t_eleve` left join `t_presence` on(`t_eleve`.`matricule` = `t_presence`.`matriculle_eleve`)) join `t_inscription` on(`t_inscription`.`ref_et` = `t_eleve`.`id`)) join `t_classe` on(`t_classe`.`id` = `t_inscription`.`ref_classe`)) join `t_option` on(`t_option`.`id` = `t_classe`.`ref_option`)) join `t_annee` on(`t_annee`.`id` = `t_inscription`.`ref_annee`))  ;

-- --------------------------------------------------------

--
-- Structure de la vue `showeleve`
--
DROP TABLE IF EXISTS `showeleve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `showeleve`  AS SELECT `t_eleve`.`id` AS `id`, `t_eleve`.`Nom` AS `Nom`, `t_eleve`.`Postnom` AS `Postnom`, `t_eleve`.`Prenom` AS `Prenom`, CASE WHEN `t_eleve`.`sexe` = 'M' THEN 'Masculin' ELSE 'Feminin' END AS `sexe`, `t_eleve`.`adresse` AS `adresse`, `t_eleve`.`telephone` AS `telephone`, `t_eleve`.`nompere` AS `nompere`, `t_eleve`.`nommere` AS `nommere`, `t_eleve`.`fonction` AS `fonction`, year(curdate()) - year(`t_eleve`.`datenaiss`) AS `age`, `t_eleve`.`photo` AS `photo` FROM `t_eleve``t_eleve`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `show_eleve`
--
DROP TABLE IF EXISTS `show_eleve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `show_eleve`  AS SELECT `aff_eleve`.`id` AS `id`, `aff_eleve`.`Nom` AS `Nom`, `aff_eleve`.`Postnom` AS `Postnom`, `aff_eleve`.`Prenom` AS `Prenom`, CASE WHEN `aff_eleve`.`sexe` = 'M' THEN 'masculin' ELSE 'Feminin' END AS `sexe`, `aff_eleve`.`adresse` AS `adresse`, `aff_eleve`.`telephone` AS `telephone`, `aff_eleve`.`nompere` AS `nompere`, `aff_eleve`.`nommere` AS `nommere`, `aff_eleve`.`fonction` AS `fonction`, `aff_eleve`.`age` AS `age` FROM `aff_eleve``aff_eleve`  ;

-- --------------------------------------------------------

--
-- Structure de la vue `show_scan`
--
DROP TABLE IF EXISTS `show_scan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `show_scan`  AS SELECT `t_inscription`.`id` AS `id`, concat(`t_eleve`.`Nom`,'  ',`t_eleve`.`Postnom`,'  ',`t_eleve`.`Prenom`) AS `eleve`, `t_eleve`.`sexe` AS `sexe`, `t_eleve`.`photo` AS `photo`, `t_eleve`.`matricule` AS `matricule`, `t_classe`.`designation` AS `classe`, `t_option`.`designation` AS `option_`, `t_annee`.`designation` AS `annee` FROM ((((`t_inscription` join `t_eleve` on(`t_eleve`.`id` = `t_inscription`.`ref_et`)) join `t_annee` on(`t_annee`.`id` = `t_inscription`.`ref_annee`)) join `t_classe` on(`t_classe`.`id` = `t_inscription`.`ref_classe`)) join `t_option` on(`t_option`.`id` = `t_classe`.`ref_option`))  ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `un_user` (`ref_enseignant`);

--
-- Index pour la table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `t_annee`
--
ALTER TABLE `t_annee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designation` (`designation`);

--
-- Index pour la table `t_classe`
--
ALTER TABLE `t_classe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_classe_option` (`ref_option`);

--
-- Index pour la table `t_eleve`
--
ALTER TABLE `t_eleve`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- Index pour la table `t_enseignant`
--
ALTER TABLE `t_enseignant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `un_enseignat` (`nom`,`postnom`,`prenom`),
  ADD UNIQUE KEY `un_tele_enseignat` (`telephone`),
  ADD UNIQUE KEY `un_telEnseign` (`telephone`);

--
-- Index pour la table `t_inscription`
--
ALTER TABLE `t_inscription`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `un_eleve_inscr` (`ref_et`,`ref_annee`),
  ADD KEY `fk_ins_classe` (`ref_classe`),
  ADD KEY `fk_ins_anne` (`ref_annee`);

--
-- Index pour la table `t_option`
--
ALTER TABLE `t_option`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designation` (`designation`);

--
-- Index pour la table `t_presence`
--
ALTER TABLE `t_presence`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_annee`
--
ALTER TABLE `t_annee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_classe`
--
ALTER TABLE `t_classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_eleve`
--
ALTER TABLE `t_eleve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `t_enseignant`
--
ALTER TABLE `t_enseignant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_inscription`
--
ALTER TABLE `t_inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `t_option`
--
ALTER TABLE `t_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_presence`
--
ALTER TABLE `t_presence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_enseignat_log` FOREIGN KEY (`ref_enseignant`) REFERENCES `t_enseignant` (`id`);

--
-- Contraintes pour la table `t_classe`
--
ALTER TABLE `t_classe`
  ADD CONSTRAINT `fk_classe_option` FOREIGN KEY (`ref_option`) REFERENCES `t_option` (`id`);

--
-- Contraintes pour la table `t_inscription`
--
ALTER TABLE `t_inscription`
  ADD CONSTRAINT `fk_ins_anne` FOREIGN KEY (`ref_annee`) REFERENCES `t_annee` (`id`),
  ADD CONSTRAINT `fk_ins_classe` FOREIGN KEY (`ref_classe`) REFERENCES `t_classe` (`id`),
  ADD CONSTRAINT `fk_inscr_elev` FOREIGN KEY (`ref_et`) REFERENCES `t_eleve` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
