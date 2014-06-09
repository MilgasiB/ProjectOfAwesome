-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 09 jun 2014 kl 13:49
-- Serverversion: 5.5.16
-- PHP-version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `poa`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `summary_id` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumpning av Data i tabell `comments`
--

INSERT INTO `comments` (`id`, `date`, `content`, `summary_id`, `name`) VALUES
(9, '2014-05-14 14:16:57', 'dwa', 51, 'dwa'),
(10, '2014-05-14 14:17:12', 'da', 50, 'dwa'),
(11, '2014-05-14 14:18:46', 'da', 50, 'dwa'),
(12, '2014-05-14 14:18:57', 'dada', 50, 'dwad'),
(13, '2014-05-14 14:19:51', 'dada', 50, 'dwad'),
(14, '2014-05-14 14:21:03', 'dada', 50, 'dwad'),
(15, '2014-05-14 14:23:12', 'dada', 50, 'dwad'),
(16, '2014-05-14 14:23:47', 'dada', 50, 'dwad'),
(17, '2014-05-14 14:25:45', 'Oj grym sammanfattning! Reprot rito! Hehehe YÃ…Ã…Ã…Ã…Ã… OP! HiHO heeee', 52, 'Benjamin'),
(18, '2014-05-27 13:09:24', 'AINT NO DANISH LUCK', 48, 'Lucas'),
(19, '2014-06-09 13:42:04', 'HHHEHHE', 48, 'Gustav');

-- --------------------------------------------------------

--
-- Tabellstruktur `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumpning av Data i tabell `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(7, 'Matematik'),
(8, 'Engelska'),
(9, 'Svenska'),
(11, 'Idrott och hÃ¤lsa'),
(12, 'Fysik'),
(13, 'Danska'),
(14, 'Engelska 7');

-- --------------------------------------------------------

--
-- Tabellstruktur `summaries`
--

CREATE TABLE IF NOT EXISTS `summaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `date` datetime NOT NULL,
  `subject_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_index` (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumpning av Data i tabell `summaries`
--

INSERT INTO `summaries` (`id`, `title`, `date`, `subject_id`, `content`, `name`) VALUES
(48, 'Denske helvede', '2014-05-14 10:35:50', 13, 'Fohelveedeee', 'Benjamin'),
(49, 'Svenska', '2014-05-14 13:19:55', 13, '', ''),
(50, 'Skrivuppgift', '2014-05-14 13:20:37', 9, 'Hej ho okeoakdowkadamwwwwwwaadkwodkowadkwaodowaodwoadokwoadawodkwdwadwadadawdadadwadwadwadwadijwjdijwaldjilwajdlwajldjwaljdlwajdlwdjwldlawjlidwaljdlwdwlajdliwadlwjlidwladljwaljdljwladlwjajdiwjlaidjlaidjlaiwjdlaijdlaijwlaijdlaijldiajdlaijdlaiwaodÃ¶awdÃ¶aÃ¶d', 'Benny'),
(51, 'HEY YO YEAH HOHO', '2014-05-14 14:03:15', 14, 'This is a study in nigga language.', 'Korven'),
(52, 'Trolololo', '2014-05-14 14:24:45', 12, 'Hej ho jag heter glen yey wow such name very fin hihihoho hahaha !! OLOLO__OO Hejjejj jlollll kadjwao kekeke laaa', 'Benny');

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `summaries`
--
ALTER TABLE `summaries`
  ADD CONSTRAINT `summaries_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
