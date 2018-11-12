-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:1024
-- Généré le :  Dim 21 oct. 2018 à 18:12
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'valid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `status`) VALUES
                                                                                               (7, 6, 'mitsune', 'lorem ipsum ', '2018-10-21 19:39:45', 'status');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `userLevel` varchar(20) NOT NULL,
  `inscription_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `nickname`, `password`, `mail`, `userLevel`, `inscription_date`) VALUES
                                                                                                     (1, 'mitsune', '$2y$10$r8bF6OmF2c4iU459ZjVrNeDD5o83S6Az.7qfplMohoXcR3a5M0J2u', 'tho.giott@gmail.com', 'admin', '2018-10-17');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `content`, `creation_date`) VALUES
                                                                                 (6, 'test 1 ', 'lorem 1 ', '<p>Lorem Elsass ipsum jetz gehts los Richard Schirmeck hopla id, ftomi! Chulia Roberstau wie leo auctor, r&eacute;chime gravida amet, schneck aliquam s\'guelt commodo mollis dui tristique habitant tellus schpeck quam. risus, und semper Yo d&ucirc;. kuglopf Wurschtsalad knack hopla vielmols, munster leverwurscht sit schnaps porta mamsell Verdammi turpis Pfourtz ! ac kougelhopf Strasbourg elementum barapli hop Morbi gewurztraminer hopla Gal ! wurscht ornare libero, rossbolla Coop&eacute; de Truchtersheim merci vielmols vulputate eleifend ullamcorper Carola ch\'ai picon bi&egrave;re ante hoplageiss amet Kabinetpapier lacus rhoncus Sp&auml;tzle sit DNA, salu Chulien kartoffelsalad suspendisse flammekueche Mauris rucksack id Oberschaeffolsheim libero, libero. dolor eget tchao bissame blottkopf, sagittis quam, ornare Heineken dignissim elit turpis, morbi Christkindelsm&auml;rik placerat ge&iuml;z ac Hans baeckeoffe Salut bisamme Huguette lotto-owe consectetur so senectus non tellus Racing.&nbsp; adipiscing geht\'s m&eacute;t&eacute;or pellentesque yeuh. sed Miss Dahlias in, bredele bissame sed nullam Pellentesque messti de Bischheim amet Gal. varius gal et hopla non knepfle chambon m&auml;nele n&uuml;dle Salu bissame sit leo condimentum purus Oberschaeffolsheim</p>', '2018-10-21 19:33:35');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
