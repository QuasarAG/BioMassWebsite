-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 15 mars 2019 à 09:17
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `biomass`
--

-- --------------------------------------------------------

--
-- Structure de la table `bosses`
--

DROP TABLE IF EXISTS `bosses`;
CREATE TABLE IF NOT EXISTS `bosses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) NOT NULL,
  `portrait_dir` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bosses`
--

INSERT INTO `bosses` (`ID`, `nick`, `portrait_dir`) VALUES
(1, 'Alduin', '../../images/icons/bosses/boss_ico1.png'),
(2, 'Azmodan', '../../images/icons/bosses/boss_ico2.png'),
(3, 'Abathur', '../../images/icons/bosses/boss_ico3.png'),
(4, 'John', '../../images/icons/bosses/boss_ico4.png'),
(5, 'CartmanTheDeceiver', '../../images/icons/bosses/boss_ico5.png'),
(6, 'La Mere De...', '../../images/icons/bosses/boss_ico6.png'),
(7, 'Controle de math', '../../images/icons/bosses/boss_ico7.png'),
(8, 'UnFilsDePoulpe', '../../images/icons/bosses/boss_ico8.png'),
(9, 'g pa didé', '../../images/icons/bosses/boss_ico9.png'),
(10, 'La BDD', '../../images/icons/bosses/boss_ico10.png');

-- --------------------------------------------------------

--
-- Structure de la table `completed_encounter_data`
--

DROP TABLE IF EXISTS `completed_encounter_data`;
CREATE TABLE IF NOT EXISTS `completed_encounter_data` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `bossID` int(11) NOT NULL,
  `duration` float NOT NULL,
  `build` varchar(255) NOT NULL,
  `ownerUserID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `OwnerUser_ID` (`ownerUserID`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `completed_encounter_data`
--

INSERT INTO `completed_encounter_data` (`ID`, `bossID`, `duration`, `build`, `ownerUserID`) VALUES
(37, 3, 455, '_0000_0000_0000_0000/', 1),
(38, 0, 2048, '_1212_3230_2312_3333/', 1),
(39, 1, 259, '_1212_3230_2312_3333/', 1),
(40, 2, 332, '_1212_3230_2312_3333/', 1),
(41, 4, 777, '_0212_3230_2312_0333/', 1),
(42, 7, 957, '_0000_0000_0000_0000/', 1),
(43, 6, 2814, '_2134_0000_2101_4411/', NULL),
(44, 5, 1095, '_0000_0000_0000_0000/', 1),
(45, 7, 390, '_0000_0000_0000_0000/', 1),
(46, 8, 363, '_0000_0000_0000_0000/', 1),
(47, 9, 289, '_0000_0000_0000_0000/', 1),
(53, 4, 1547, '_0000_0000_0000_0000/', NULL),
(54, 4, 11, '_0000_0000_0000_0000/', NULL),
(55, 4, 60, '_0000_0000_0000_0000/', NULL),
(56, 4, 14, '_0000_0000_0000_0000/', NULL),
(57, 4, 10, '_0000_0000_0000_0000/', NULL),
(58, 4, 14, '_0000_0000_0000_0000/', NULL),
(59, 4, 11, '_0000_0000_0000_0000/', NULL),
(60, 0, 204, '_0000_0000_0000_0000/', NULL),
(61, 0, 9, '_0000_0000_0000_0000/', NULL),
(62, 0, 16, '_0000_0000_0000_0000/', NULL),
(63, 0, 11, '_0000_0000_0000_0000/', NULL),
(64, 1, 157, '_0000_0000_0000_0000/', NULL),
(65, 1, 13, '_0000_0000_0000_0000/', NULL),
(66, 1, 13, '_0000_0000_0000_0000/', NULL),
(67, 0, 877, '_0000_0000_0000_0000/', 7),
(68, 0, 13, '_0000_0000_0000_0000/', 7),
(69, 3, 1174, '_3012_0231_0000_3231/', 7),
(70, 3, 16, '_3012_0231_0000_3231/', 7),
(71, 3, 57, '_3012_0231_0000_3231/', 7),
(72, 3, 19, '_3012_0231_0000_3231/', 7),
(73, 3, 6, '_3012_0231_0000_3231/', 7),
(74, 3, 26, '_3012_0231_0000_3231/', 7),
(75, 3, 18, '_3012_0231_0000_3231/', 7),
(76, 3, 6, '_3012_0231_0000_3231/', 7),
(77, 3, 14, '_3012_0231_0000_3231/', 7),
(78, 5, 351, '_3012_0231_0000_3231/', 7),
(79, 5, 14, '_3012_0231_0000_3231/', 7),
(80, 5, 16, '_3012_0231_0000_3231/', 7),
(81, 5, 8, '_3012_0231_0000_3231/', 7),
(82, 5, 9, '_3012_0231_0000_3231/', 7),
(83, 7, 337, '_3012_0231_0000_3231/', 7),
(84, 7, 13, '_3012_0231_0000_3231/', 7);

-- --------------------------------------------------------

--
-- Structure de la table `heroes`
--

DROP TABLE IF EXISTS `heroes`;
CREATE TABLE IF NOT EXISTS `heroes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) NOT NULL,
  `story` text NOT NULL,
  `portrait_dir` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `heroes`
--

INSERT INTO `heroes` (`ID`, `nick`, `story`, `portrait_dir`) VALUES
(1, 'José', 'Le Sex symbol', '../../images/icons/heroes/hero_ico1.png'),
(2, 'Lucien Bramar', 'Agent 117', '../../images/icons/heroes/hero_ico2.png'),
(3, 'DarkRoxXxor_Sasuke69', 'Kikoulol de ses morts', '../../images/icons/heroes/hero_ico3.png'),
(4, 'La BDD c\'est cancer quand t\'as pas suivis avec pierre', 'self explanatory title', '../../images/icons/heroes/hero_ico4.png');

-- --------------------------------------------------------

--
-- Structure de la table `spells_hero`
--

DROP TABLE IF EXISTS `spells_hero`;
CREATE TABLE IF NOT EXISTS `spells_hero` (
  `ID` int(80) NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `isPassive` tinyint(1) NOT NULL,
  `cooldown` float NOT NULL,
  `icon_dir` varchar(255) NOT NULL,
  `ownerID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ownerID` (`ownerID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `spells_hero`
--

INSERT INTO `spells_hero` (`ID`, `nick`, `description`, `isPassive`, `cooldown`, `icon_dir`, `ownerID`) VALUES
(1, 'Spell 1', 'Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1Description 1', 0, 10, '../../images/icons/spells/AbolishMagic.png', 1),
(2, 'Spell 2', 'description 2', 0, 4, '../../images/icons/spells/AbominationExplosion.png', 1),
(3, 'Spell 3', 'description 3', 0, 1337, '../../images/icons/spells/Absolution.png', 1),
(4, 'Spell 4', 'description 4', 0, 0.635, '../../images/icons/spells/Acid_01.png', 1),
(5, 'Spell 5', 'description 5', 0, 5, '../../images/icons/spells/AgitatingTotem.png', 1),
(6, 'Spell 6', 'description 6', 0, 10, '../../images/icons/spells/AncestralAwakening.png', 1),
(7, 'Spell 7', 'description 7', 1, 10, '../../images/icons/spells/AncestralGuardian.png', 1),
(8, 'Spell 8', 'description 8', 1, 10, '../../images/icons/spells/AnimateDead.png', 1),
(9, 'Spell 9', 'description 9', 0, 2, '../../images/icons/spells/AntiMagicShell.png', 1),
(10, 'Spell 10', 'description 10', 1, 10, '../../images/icons/spells/AntiMagicZone.png', 1),
(11, 'Spell 11', 'description 11', 0, 10, '../../images/icons/spells/AntiShadow.png', 1),
(12, 'Spell 12', 'description 12', 1, 10, '../../images/icons/spells/Arcane01.png', 1),
(13, 'Spell 13', 'description 13', 0, 0.13, '../../images/icons/spells/Arcane02.png', 1),
(14, 'Spell 14', 'description 14', 0, 10, '../../images/icons/spells/Arcane03.png', 1),
(15, 'Spell 15', 'description 15', 1, 10, '../../images/icons/spells/Arcane04.png', 1),
(16, 'Spell 16', 'description 16', 1, 10, '../../images/icons/spells/ArcaneIntellect.png', 1),
(17, 'Spell 17', 'description 17', 0, 0.00004, '../../images/icons/spells/ArcanePotency.png', 1),
(18, 'Spell 18', 'description 18', 0, 10, '../../images/icons/spells/ArcaneResilience.png', 1),
(19, 'Spell 19', 'description 19', 0, 10, '../../images/icons/spells/ArcaneTorrent.png', 1),
(20, 'Spell 20', 'description 20', 0, 10, '../../images/icons/spells/ArcticWinds.png', 1),
(21, 'Spell 21', 'description 21', 1, 10, '../../images/icons/spells/ArdentDefender.png', 2),
(22, 'Spell 22', 'description 22', 0, 10, '../../images/icons/spells/ArmyOfTheDead.png', 2),
(23, 'Spell 23', 'description 23', 0, 10, '../../images/icons/spells/AshesToAshes.png', 2),
(24, 'Spell 24', 'description 24', 0, 10, '../../images/icons/spells/Aspiration.png', 2),
(25, 'Spell 25', 'description 25', 0, 10, '../../images/icons/spells/AstralRecal.png', 2),
(26, 'Spell 26', 'description 26', 0, 10, '../../images/icons/spells/AstralRecalGroup.png', 2),
(27, 'Spell 27', 'description 27', 0, 10, '../../images/icons/spells/AstralShift.png', 2),
(28, 'Spell 28', 'description 28', 0, 10, '../../images/icons/spells/AuraMastery.png', 2),
(29, 'Spell 29', 'description 29', 0, 10, '../../images/icons/spells/AuraOfDarkness.png', 2),
(30, 'Spell 30', 'description 30', 0, 10, '../../images/icons/spells/AuraOfLight.png', 2),
(31, 'Spell 31', 'description 31', 0, 10, '../../images/icons/spells/AvengersShield.png', 2),
(32, 'Spell 32', 'description 32', 0, 10, '../../images/icons/spells/AVENGINEWRATH.png', 2),
(33, 'Spell 33', 'description 33', 0, 10, '../../images/icons/spells/BlackPlague.png', 2),
(34, 'Spell 34', 'description 34', 0, 10, '../../images/icons/spells/BladedArmor.png', 2),
(35, 'Spell 35', 'description 35', 0, 10, '../../images/icons/spells/Blast.png', 2),
(36, 'Spell 36', 'description 36', 0, 10, '../../images/icons/spells/BlessedLife.png', 2),
(37, 'Spell 37', 'description 37', 0, 10, '../../images/icons/spells/BlessedRecovery.png', 2),
(38, 'Spell 38', 'description 38', 0, 10, '../../images/icons/spells/BlessedResillience.png', 2),
(39, 'Spell 39', 'description 39', 0, 10, '../../images/icons/spells/BlessingOfAgility.png', 2),
(40, 'Spell 40', 'description 40', 0, 10, '../../images/icons/spells/BlessingOfEternals.png', 2),
(41, 'Spell 41', 'description 41', 0, 10, '../../images/icons/spells/BlessingOfProtection.png', 3),
(42, 'Spell 42', 'description 42', 0, 10, '../../images/icons/spells/BlessingOfStamina.png', 3),
(43, 'Spell 43', 'description 43', 0, 10, '../../images/icons/spells/BlessingOfStrength.png', 3),
(44, 'Spell 44', 'description 44', 0, 10, '../../images/icons/spells/BlessingOfTheEternals.png', 3),
(45, 'Spell 45', 'description 45', 0, 10, '../../images/icons/spells/BlindingHeal.png', 3),
(46, 'Spell 46', 'description 46', 0, 10, '../../images/icons/spells/Blink.png', 3),
(47, 'Spell 47', 'description 47', 0, 10, '../../images/icons/spells/BloodBoil.png', 3),
(48, 'Spell 48', 'description 48', 0, 10, '../../images/icons/spells/BloodLust.png', 3),
(49, 'Spell 49', 'description 49', 0, 10, '../../images/icons/spells/BloodPlague.png', 3),
(50, 'Spell 50', 'description 50', 0, 10, '../../images/icons/spells/BloodPresence.png', 3),
(51, 'Spell 51', 'description 51', 0, 10, '../../images/icons/spells/BloodTap.png', 3),
(52, 'Spell 52', 'description 52', 0, 10, '../../images/icons/spells/BlueCano.png', 3),
(53, 'Spell 53', 'description 53', 0, 10, '../../images/icons/spells/BlueFire.png', 3),
(54, 'Spell 54', 'description 54', 0, 10, '../../images/icons/spells/BlueFireNova.png', 3),
(55, 'Spell 55', 'description 55', 0, 10, '../../images/icons/spells/BlueFireward.png', 3),
(56, 'Spell 56', 'description 56', 0, 10, '../../images/icons/spells/BlueFlameBolt.png', 3),
(57, 'Spell 57', 'description 57', 0, 10, '../../images/icons/spells/BlueFlameBreath.png', 3),
(58, 'Spell 58', 'description 58', 0, 10, '../../images/icons/spells/BlueFlameRing.png', 3),
(59, 'Spell 59', 'description 59', 0, 10, '../../images/icons/spells/BlueFlameStrike.png', 3),
(60, 'Spell 60', 'description 60', 0, 10, '../../images/icons/spells/BlueHellfire.png', 3),
(61, 'Spell 61', 'description 61', 0, 10, '../../images/icons/spells/BlueImmolation.png', 4),
(62, 'Spell 62', 'description 62', 0, 10, '../../images/icons/spells/BluePyroblast.png', 4),
(63, 'Spell 63', 'description 63', 0, 10, '../../images/icons/spells/BlueRainOfFire.png', 4),
(64, 'Spell 64', 'description 64', 0, 10, '../../images/icons/spells/ChargeNegative.png', 4),
(65, 'Spell 65', 'description 65', 0, 10, '../../images/icons/spells/ChargePositive.png', 4),
(66, 'Spell 66', 'description 66', 0, 10, '../../images/icons/spells/Charm.png', 4),
(67, 'Spell 67', 'description 67', 0, 10, '../../images/icons/spells/Chastise.png', 4),
(68, 'Spell 68', 'description 68', 0, 10, '../../images/icons/spells/ChillingArmor.png', 4),
(69, 'Spell 69', 'description 69', 0, 10, '../../images/icons/spells/ChillingBlast.png', 4),
(70, 'Spell 70', 'description 70', 0, 10, '../../images/icons/spells/ChillingBolt.png', 4),
(71, 'Spell 71', 'description 71', 0, 10, '../../images/icons/spells/ChillTouch.png', 4),
(72, 'Spell 72', 'description 72', 0, 10, '../../images/icons/spells/CircleOfRenewal.png', 4),
(73, 'Spell 73', 'description 73', 0, 10, '../../images/icons/spells/ClassIcon.png', 4),
(74, 'Spell 74', 'description 74', 0, 10, '../../images/icons/spells/ColdHearted.png', 4),
(75, 'Spell 75', 'description 75', 0, 10, '../../images/icons/spells/ConeOfSilence.png', 4),
(76, 'Spell 76', 'description 76', 0, 10, '../../images/icons/spells/ConjureManaJewel.png', 4),
(77, 'Spell 77', 'description 77', 0, 10, '../../images/icons/spells/ConsumeMagic.png', 4),
(78, 'Spell 78', 'description 78', 0, 10, '../../images/icons/spells/Contagion.png', 4),
(79, 'Spell 79', 'description 79', 0, 10, '../../images/icons/spells/CorpseExplode.png', 4),
(80, 'Spell 80', 'description 80', 0, 10, '../../images/icons/spells/CorrosiveBreath.png', 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `nameUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUsers`, `nameUsers`, `emailUsers`, `pwdUsers`) VALUES
(1, 'test', 'test@gmail.com', '$2y$10$S.AftmQxlgCXkgoXKCGK.ucp8DLcvn9BGcFsQrrYgxuwtH1ZRYOxG'),
(7, 'Quasar', 'quasar@random.com', '$2y$10$fZFbpdqIC94FEO1WnVyYj.WJ.Yknnnq3zFMTZoMLKRvgCUwX0pTEi');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `completed_encounter_data`
--
ALTER TABLE `completed_encounter_data`
  ADD CONSTRAINT `OwnerUser_ID` FOREIGN KEY (`ownerUserID`) REFERENCES `users` (`idUsers`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `spells_hero`
--
ALTER TABLE `spells_hero`
  ADD CONSTRAINT `Owner_ID` FOREIGN KEY (`ownerID`) REFERENCES `heroes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
