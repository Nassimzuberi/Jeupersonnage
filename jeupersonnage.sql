-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 24 sep. 2019 à 22:31
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jeupersonnage`
--

-- --------------------------------------------------------

--
-- Structure de la table `attaque`
--

DROP TABLE IF EXISTS `attaque`;
CREATE TABLE IF NOT EXISTS `attaque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_attaquant` int(11) NOT NULL,
  `id_victime` int(11) NOT NULL,
  `time_attaque` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_attaquant` (`id_attaquant`),
  KEY `id_victime` (`id_victime`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `attaque`
--

INSERT INTO `attaque` (`id`, `id_attaquant`, `id_victime`, `time_attaque`) VALUES
(71, 6, 13, '2019-09-22 10:57:10'),
(70, 6, 7, '2019-09-22 10:56:52'),
(3, 4, 5, '2019-09-21 18:09:21'),
(69, 6, 7, '2019-09-22 10:56:52'),
(5, 8, 4, '2019-09-21 18:49:28'),
(6, 8, 1, '2019-09-21 18:51:13'),
(7, 8, 7, '2019-09-21 18:53:59'),
(8, 1, 5, '2019-09-21 18:59:13'),
(9, 1, 8, '2019-09-21 18:59:28'),
(59, 15, 9, '2019-09-22 10:42:29'),
(68, 4, 7, '2019-09-22 10:54:12'),
(67, 4, 7, '2019-09-22 10:54:12'),
(13, 7, 8, '2019-09-21 20:00:23'),
(14, 7, 9, '2019-09-21 20:00:27'),
(15, 4, 9, '2019-09-21 21:15:15'),
(66, 4, 6, '2019-09-22 10:53:21'),
(17, 7, 8, '2019-09-21 21:59:40'),
(18, 5, 11, '2019-09-21 22:11:23'),
(19, 4, 8, '2019-09-21 22:27:39'),
(65, 4, 6, '2019-09-22 10:53:21'),
(64, 15, 1, '2019-09-22 10:46:52'),
(63, 15, 6, '2019-09-22 10:44:14'),
(62, 15, 6, '2019-09-22 10:43:51'),
(61, 15, 10, '2019-09-22 10:42:38'),
(60, 15, 11, '2019-09-22 10:42:33'),
(58, 15, 7, '2019-09-22 10:42:24'),
(27, 4, 1, '2019-09-22 09:20:43'),
(57, 15, 6, '2019-09-22 10:42:19'),
(56, 15, 1, '2019-09-22 10:42:13'),
(55, 15, 4, '2019-09-22 10:41:29'),
(54, 15, 4, '2019-09-22 10:39:55'),
(53, 15, 4, '2019-09-22 10:27:04'),
(52, 6, 4, '2019-09-22 10:17:30'),
(51, 4, 5, '2019-09-22 09:59:38'),
(50, 4, 5, '2019-09-22 09:59:34'),
(49, 4, 5, '2019-09-22 09:59:30'),
(48, 4, 5, '2019-09-22 09:59:26'),
(47, 4, 5, '2019-09-22 09:59:22'),
(46, 4, 5, '2019-09-22 09:59:18'),
(45, 4, 5, '2019-09-22 09:59:14'),
(44, 4, 5, '2019-09-22 09:59:10'),
(43, 5, 4, '2019-09-22 09:54:05'),
(72, 6, 13, '2019-09-22 10:57:10'),
(73, 6, 10, '2019-09-22 10:58:12'),
(74, 6, 10, '2019-09-22 10:58:12'),
(75, 6, 8, '2019-09-22 10:58:18'),
(76, 6, 8, '2019-09-22 10:58:18'),
(77, 6, 1, '2019-09-22 10:59:05'),
(78, 6, 1, '2019-09-22 10:59:05'),
(79, 1, 4, '2019-09-22 10:59:18'),
(80, 1, 4, '2019-09-22 10:59:18'),
(81, 14, 4, '2019-09-22 11:11:07'),
(82, 14, 4, '2019-09-22 11:11:07'),
(83, 7, 14, '2019-09-22 11:12:15'),
(84, 7, 14, '2019-09-22 11:12:15'),
(85, 4, 6, '2019-09-22 13:26:10'),
(86, 4, 6, '2019-09-22 13:26:10'),
(87, 4, 8, '2019-09-24 17:52:37'),
(88, 4, 8, '2019-09-24 17:52:37'),
(89, 4, 10, '2019-09-24 18:16:07'),
(90, 4, 10, '2019-09-24 18:16:07'),
(91, 18, 9, '2019-09-24 18:16:17'),
(92, 18, 9, '2019-09-24 18:16:17'),
(93, 1, 9, '2019-09-24 18:17:24'),
(94, 1, 9, '2019-09-24 18:17:24'),
(95, 6, 13, '2019-09-24 18:17:39'),
(96, 6, 10, '2019-09-24 18:17:45'),
(97, 6, 8, '2019-09-24 18:30:27'),
(98, 18, 10, '2019-09-24 18:30:52'),
(99, 18, 10, '2019-09-24 18:30:52'),
(100, 19, 6, '2019-09-24 19:15:12'),
(101, 19, 6, '2019-09-24 19:15:12'),
(102, 19, 9, '2019-09-24 19:15:21'),
(103, 19, 9, '2019-09-24 19:15:21'),
(104, 19, 7, '2019-09-24 19:15:30'),
(105, 19, 7, '2019-09-24 19:15:30'),
(106, 19, 9, '2019-09-24 19:15:36'),
(107, 19, 9, '2019-09-24 19:15:36'),
(108, 19, 1, '2019-09-24 19:16:59'),
(109, 19, 1, '2019-09-24 19:16:59'),
(110, 20, 6, '2019-09-24 20:14:45');

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

DROP TABLE IF EXISTS `personnage`;
CREATE TABLE IF NOT EXISTS `personnage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `degats` tinyint(4) DEFAULT NULL,
  `pills` int(11) DEFAULT '5',
  `potion` int(11) DEFAULT '0',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personnage`
--

INSERT INTO `personnage` (`id`, `nom`, `degats`, `pills`, `potion`, `id_user`) VALUES
(1, 'Julien', 60, 3, 0, 1),
(4, 'ZUBERI', 10, 0, 0, 1),
(7, 'Deltaplane', 50, 4, 0, 1),
(8, 'Francis', 40, 5, 0, 0),
(9, 'Hollande', 30, 5, 0, 0),
(10, 'Koh-Lanta', 20, 5, 0, 0),
(11, 'Delta', 10, 5, 0, 0),
(12, 'Voltaire', NULL, 5, 0, 0),
(13, 'Auguste', 5, 5, 0, 0),
(14, 'Californie', 0, 4, 1, 0),
(15, 'Catapulte', 0, 0, 0, 0),
(19, 'MoliÃ¨re', 0, 0, 0, 2),
(20, 'Patrick', 0, 4, 0, 2),
(21, 'Google', NULL, 5, 0, 2),
(22, 'Lilian', NULL, 5, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `passeword` varchar(255) NOT NULL,
  `max_slot` int(11) NOT NULL DEFAULT '4',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `passeword`, `max_slot`) VALUES
(1, 'natayoshi', 'a6fb9a9dd1656c1e62a7c82267e456b5e99e2094', 4),
(2, 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
