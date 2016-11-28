-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 28 Novembre 2016 à 08:51
-- Version du serveur :  5.7.16-0ubuntu0.16.10.1
-- Version de PHP :  7.0.8-3ubuntu3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `medialibrary`
--

-- --------------------------------------------------------

--
-- Structure de la table `alert`
--

CREATE TABLE `alert` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `alert`
--

INSERT INTO `alert` (`id`, `email`, `type`, `keyword`) VALUES
(1, 'jonathan@novaway.fr', 'actor', 'Leonardo Dicaprio'),
(2, 'jonathan@novaway.fr', 'actor', 'Jean Dujardin'),
(3, 'cedric@novaway.fr', 'director', 'Steven Spielberg'),
(4, 'cedric@novaway.fr', 'director', 'Woody Allen'),
(5, 'laurence@novaway.fr', 'author', 'Jean Anouilh'),
(6, 'laurence@novaway.fr', 'author', 'Guillaume Musso'),
(7, 'laurence@novaway.fr', 'author', 'Franz-Olivier Giesbert'),
(8, 'laurence@novaway.fr', 'actor', 'Edward Norton'),
(9, 'laurence@novaway.fr', 'actor', 'Jack nicholson'),
(10, 'laurence@novaway.fr', 'actor', 'Robert de Niro');

-- --------------------------------------------------------

--
-- Structure de la table `bluray`
--

CREATE TABLE `bluray` (
  `id` int(11) NOT NULL,
  `isan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_date` datetime NOT NULL,
  `duration` time NOT NULL,
  `summary` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `bluray`
--

INSERT INTO `bluray` (`id`, `isan`, `title`, `director`, `release_date`, `duration`, `summary`, `price`) VALUES
(1, 'chcghgfh65165srsdgdf', 'bluray1', 'director11', '1985-06-05 12:00:00', '02:10:00', 'dr gcfdgh fghfg hgfh fghfgh fg h', '25.00'),
(2, 'rrtre546fghgfh5', 'bluray2', 'director 1', '2005-02-08 00:00:00', '01:14:00', 'dfsdfsdf dsf dfsfsdf sdf', '10.00');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(10) NOT NULL,
  `isbn` bigint(50) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published_date` datetime NOT NULL,
  `page_number` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `book`
--

INSERT INTO `book` (`id`, `isbn`, `title`, `author`, `published_date`, `page_number`, `price`) VALUES
(1, 1254126351254, 'dfgdf gdfgdfg', 'gdfgfdgfdg', '1980-11-05 00:00:00', 265, '20.00'),
(2, 1464865135164, 'title 2', 'author 1', '1546-10-06 00:00:00', 264, '16.60'),
(3, 89748964561, 'title 3', 'author 2', '0485-05-23 00:00:00', 120, '5.99'),
(4, 5416851351646, 'title 4', 'author 3', '1560-06-03 00:00:00', 540, '1.23'),
(5, 854691516415, 'title5', 'author 4', '1798-08-23 00:00:00', 350, '25.20'),
(27, 7448464131546, 'Humulus le muet', 'Jean Anouilh', '1929-01-01 00:00:00', 368, '25.00');

-- --------------------------------------------------------

--
-- Structure de la table `dvd`
--

CREATE TABLE `dvd` (
  `id` int(11) NOT NULL,
  `isan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `release_date` datetime NOT NULL,
  `duration` time NOT NULL,
  `summary` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `dvd`
--

INSERT INTO `dvd` (`id`, `isan`, `title`, `director`, `release_date`, `duration`, `summary`, `price`) VALUES
(1, '15g1d56fgfdghf32', 'title1', 'director 1', '1650-04-25 00:00:00', '20:05:00', 'hkbngfkjdg fd gfkd g fdg  fdg fd g fdjgfdnbgkjrzjfojzeiorjfosdgdf ggfdrtgdfg', '12.66'),
(2, 'gcfgfd5g16515dfgfdg', 'dvd2', 'director 2', '1952-06-25 00:00:00', '01:20:00', 'dgdfgdfg dfg dfg dfg fdg dfgfdgdf gdf fdg f<\r\ndfgdfgfdg df gdfg df gdfgfdg dfgdfg df', '25.00'),
(3, 'gdgfd5648dfgffdg321b5', 'dvd3', 'director 3', '2010-03-25 00:00:00', '03:07:00', 'dgdf gdf gdf gfhgfhezrqgl,cxlkgjfnuifshgfnsiqodhbvnqfouidg dufhgip ccwgupihugnubic', '35.00'),
(4, 'fdstgf4148hdxwzqezr', 'dvd4', 'director 1', '2001-08-14 00:00:00', '02:25:00', 'cgbfhse rds gdfkgopdfpiogk podfkg kdfpokgopkdfopg df\r\ng dfg fdg\r\ndfg fd gdf dfg dfg\r\nfdg dfg df gdfg df', '12.00'),
(5, 'fsdrtdsf5986gdfgdf656', 'dvd5', 'director 2', '2009-09-09 00:00:00', '01:59:00', 'gddfg dfgd fgdnbvc nxvcb bnb', '8.50');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expire_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expire_at`) VALUES
(1, 'admin', 'admin', 'admin@example.com', 'admin@example.com', 1, 'bpi4hdgka8ocwwosg4wccogscwg0040', '$2y$13$a5DePRZwiWcozkh23cp0heQdwbZ6JTWsQdOqK35bA3Aoph2bNsH1W', '2016-11-27 23:04:27', 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bluray`
--
ALTER TABLE `bluray`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F697EA50E731A725` (`isan`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_CBE5A331CC1CF4E6` (`isbn`);

--
-- Index pour la table `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8325C1DFE731A725` (`isan`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `alert`
--
ALTER TABLE `alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `bluray`
--
ALTER TABLE `bluray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `dvd`
--
ALTER TABLE `dvd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
