-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 02 Décembre 2015 à 13:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `aixplore`
--

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `Quizz_id` int(11) NOT NULL,
  `Exercices_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Answers_Quizz1_idx` (`Quizz_id`),
  KEY `fk_Answers_Exercices1_idx` (`Exercices_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`id`, `name`, `type`) VALUES
(1, 'atchoum', 'Classe');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `Topics_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Courses_Topics1_idx` (`Topics_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `exercices`
--

CREATE TABLE IF NOT EXISTS `exercices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `Courses_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Exercices_Courses_idx` (`Courses_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

CREATE TABLE IF NOT EXISTS `quizz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) DEFAULT NULL,
  `Courses_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Quizz_Courses1_idx` (`Courses_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `Class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Topics_Class1_idx` (`Class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `b_date` date DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `create_date`, `b_date`, `name`, `first_name`, `city`, `school`, `pseudo`, `status`, `photo`, `password`) VALUES
(1, 'test@test.fr', '2015-11-25', '2012-07-18', 'Testeur', 'jean-paul', 'aix en provence', 'ynov', 'Letesteur', 1, NULL, 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'test@test.fr', '2015-11-26', '0000-00-00', 'test', 'test', 'test', 'test', 'test', NULL, NULL, 'test'),
(3, 'test@test.fr', '2015-11-26', '0000-00-00', 'test', 'test', 'test', 'test', 'test', NULL, NULL, 'test'),
(4, 'test@test.fr', '2015-11-26', '0000-00-00', 'test', 'test', 'test', 'test', 'test', NULL, NULL, 'test'),
(5, 'dylan.cocheteux@ynov.com', '2015-12-02', '0000-00-00', 'cocheteux', 'dylan', 'Aix en Provence', 'Ynov', 'Monpseudo', NULL, NULL, 'Didou13840');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
