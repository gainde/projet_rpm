-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2016 at 08:07 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bysol958_rpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rue` varchar(50) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `numero` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `adresse`
--

INSERT INTO `adresse` (`id`, `rue`, `code_postal`, `ville`, `province`, `pays`, `numero`) VALUES
(8, 'saint real', 'h3m2y8', 'Montreal', 'quebec', 'canada', '11786');

-- --------------------------------------------------------

--
-- Table structure for table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_service` int(11) NOT NULL,
  `titre` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(260) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_service` (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `domaine`
--

INSERT INTO `domaine` (`id`, `id_service`, `titre`, `description`) VALUES
(8, 3, 'Analyste Financier', NULL),
(19, 35, 'ss test 1dd', '<p>ssdf</p>'),
(20, 35, 'sous tests 2', '<p>sss</p>'),
(26, 1, 'GÃ©nie Civil', '<p>G&eacute;nie Civil</p>'),
(27, 1, 'GÃ©nie Logiciel', '<p>G&eacute;nie Logiciel</p>'),
(28, 1, 'GÃ©nie Informatique', '<p>G&eacute;nie Informatique</p>'),
(29, 1, 'GÃ©nie MÃ©canique', '<p>G&eacute;nie M&eacute;canique</p>'),
(30, 1, 'GÃ©nie Ã‰lectrique', '<p>G&eacute;nie &Eacute;lectrique</p>'),
(31, 2, 'MÃ©decin', '<p>M&eacute;decin</p>'),
(32, 2, 'Infirmier', '<p>Infirmier</p>');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_projet` int(11) NOT NULL,
  `date_debut` int(11) NOT NULL,
  `date_fin` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_projet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pourquoi`
--

CREATE TABLE IF NOT EXISTS `pourquoi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pourquoi`
--

INSERT INTO `pourquoi` (`id`, `titre`, `description`, `contenu`) VALUES
(4, 'Pourquoi devenir membre', 'Devenir membre est devenir mouride', '<p>Le RPM s&rsquo;est donn&eacute; comme cr&eacute;do de travailler &agrave; la r&eacute;alisation des projets de Khadimou Rassoul. Donc &ecirc;tre membre vous donne le privil&egrave;ge de contribuer aux diff&eacute;rents projets dans les secteurs tels que la sant&eacute;, l&rsquo;&eacute;ducation, l&rsquo;assainissement, l&rsquo;environnement,â€¯laâ€¯construction, l&rsquo;&eacute;nergie, les TIC, l&rsquo;ing&eacute;nierie etc.</p>\r\n<p>Il vous donne aussi la possibilit&eacute; d&rsquo;apporter votre contribution &agrave; l&rsquo;&oelig;uvre deâ€¯Serigne Touba.</p>\r\n<p>Il est important de se rappeler que Serigne Touba Que Dieu l&rsquo;agr&eacute;e ne s&rsquo;est pas rabaiss&eacute; pour obtenir la place qu&rsquo;il occupe. Nous aussi nous devons tenir notre rang. Comme vous le savez, Serigne Touba disait dans <strong>Matlaboul fawsayni</strong> &laquo;Seigneur des mondes faites que la ville de Touba soit un lieu de d&eacute;vouement au Cr&eacute;ateur, de fid&eacute;lit&eacute; au culte musulman, de savoir (&hellip;)&raquo;.Cheikh Ahmadou Bamba nous fait savoir qu&rsquo;Allah a exauc&eacute; tous ses v&oelig;ux qui y ont &eacute;t&eacute; exprim&eacute;s. Cela veut dire apporter sa contribution n&rsquo;est rien d&rsquo;autre que de participer &agrave; des v&oelig;ux d&eacute;j&agrave; accomplis.</p>\r\n<p>Le RPM se serviraâ€¯de ce recueil <strong>Matlaboul fawzayni</strong> comme guide de projets et compte sur l&rsquo;approbation du khalife g&eacute;n&eacute;ral dans ses d&eacute;marches.</p>\r\n<p>En tant que Mouride, nous n&rsquo;avons personne de sup&eacute;rieur, digne de notre confianceâ€¯autre que Serigne Touba en qui nous pla&ccedil;ons notre espoir. Nous talib&eacute;, devons faire don de nos valeurs et de nos acquis, afin de m&eacute;riter le titre de talib&eacute; de Cheikhoul Khadim, qui a d&eacute;j&agrave; tout fait pour nous, nous humains, nous africains, nous s&eacute;n&eacute;galais, nous Mouride.</p>\r\n<p><strong>Que Serigne Touba, notre v&eacute;n&eacute;r&eacute; guide accepte notre acte d&rsquo;all&eacute;geance, nous assiste en notre for int&eacute;rieur dans nos actes de tous les jours et dans ce projet qui a pour but d&rsquo;&oelig;uvrer pour Serigne Touba. </strong></p>'),
(5, 'Pourquoi devenir membre', 'Devenir membre est devenir mouride', '<p>Le RPM s&rsquo;est donn&eacute; comme cr&eacute;do de travailler &agrave; la r&eacute;alisation des projets de Khadimou Rassoul. Donc &ecirc;tre membre vous donne le privil&egrave;ge de contribuer aux diff&eacute;rents projets dans les secteurs tels que la sant&eacute;, l&rsquo;&eacute;ducation, l&rsquo;assainissement, l&rsquo;environnement,â€¯laâ€¯construction, l&rsquo;&eacute;nergie, les TIC, l&rsquo;ing&eacute;nierie etc.</p>\r\n<p>Il vous donne aussi la possibilit&eacute; d&rsquo;apporter votre contribution &agrave; l&rsquo;&oelig;uvre deâ€¯Serigne Touba.</p>\r\n<p>Il est important de se rappeler que Serigne Touba Que Dieu l&rsquo;agr&eacute;e ne s&rsquo;est pas rabaiss&eacute; pour obtenir la place qu&rsquo;il occupe. Nous aussi nous devons tenir notre rang. Comme vous le savez, Serigne Touba disait dans <strong>Matlaboul fawsayni</strong> &laquo;Seigneur des mondes faites que la ville de Touba soit un lieu de d&eacute;vouement au Cr&eacute;ateur, de fid&eacute;lit&eacute; au culte musulman, de savoir (&hellip;)&raquo;.Cheikh Ahmadou Bamba nous fait savoir qu&rsquo;Allah a exauc&eacute; tous ses v&oelig;ux qui y ont &eacute;t&eacute; exprim&eacute;s. Cela veut dire apporter sa contribution n&rsquo;est rien d&rsquo;autre que de participer &agrave; des v&oelig;ux d&eacute;j&agrave; accomplis.</p>\r\n<p>Le RPM se serviraâ€¯de ce recueil <strong>Matlaboul fawzayni</strong> comme guide de projets et compte sur l&rsquo;approbation du khalife g&eacute;n&eacute;ral dans ses d&eacute;marches.</p>\r\n<p>En tant que Mouride, nous n&rsquo;avons personne de sup&eacute;rieur, digne de notre confianceâ€¯autre que Serigne Touba en qui nous pla&ccedil;ons notre espoir. Nous talib&eacute;, devons faire don de nos valeurs et de nos acquis, afin de m&eacute;riter le titre de talib&eacute; de Cheikhoul Khadim, qui a d&eacute;j&agrave; tout fait pour nous, nous humains, nous africains, nous s&eacute;n&eacute;galais, nous Mouride.</p>\r\n<p><strong>Que Serigne Touba, notre v&eacute;n&eacute;r&eacute; guide accepte notre acte d&rsquo;all&eacute;geance, nous assiste en notre for int&eacute;rieur dans nos actes de tous les jours et dans ce projet qui a pour but d&rsquo;&oelig;uvrer pour Serigne Touba. </strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_fin` date DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `url` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `projet`
--

INSERT INTO `projet` (`id`, `titre`, `description`, `contenu`, `date_creation`, `date_fin`, `last_update`, `url`, `image`, `statut`) VALUES
(1, 'Projet test', '<p>Projet test en cours</p>', '<p>que du bababallalal</p>', '2016-05-03 04:00:00', '2016-05-03', '2016-01-23 05:31:08', 'oussou.jpg', 'senegal', 0),
(2, 'test  projet', '<p>ccdd</p>', '<p>dssddf</p>', '2016-03-02 05:00:00', '2016-03-25', '2016-03-19 23:55:08', '', '//placehold.it/100', 0),
(3, 'test  projet 2', '<p>ddgg</p>', '<p>dddff</p>', '2016-03-01 05:00:00', '2016-03-15', '2016-03-20 13:15:02', '', '', -1),
(4, 'dssdd', '<p>vdfggs</p>', '<p>fffffggg</p>', '2016-05-05 04:00:00', '2016-05-18', '2016-05-14 13:32:23', '', 'sdda', 0),
(5, 'fffavc', '<p>aaaaaaaa</p>', '<p>aaaaaa</p>', '2016-05-03 04:00:00', '2016-05-20', '2016-05-14 13:36:46', '', 'aa', -1),
(6, 'essai', '<p>ddff</p>', '<p>ffff</p>', '2016-05-02 04:00:00', '2016-05-05', '2016-05-21 06:25:22', 'images.jpg', 'tes', 1),
(7, 'ddtes', '<p>ddd</p>', '<p>cccvcc</p>', '2016-05-10 04:00:00', '2016-05-03', '2016-05-21 15:08:54', '', 'cde', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projets`
--

CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_fin` date DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(260) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titre` (`titre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `titre`, `description`) VALUES
(1, 'IngÃ©nierie', '<p>Ing&eacute;nieur</p>'),
(2, 'SantÃ©', '<p>Sant&eacute;</p>'),
(3, 'Finance', NULL),
(4, 'Social', NULL),
(5, 'Agriculture', NULL),
(6, 'Communication', NULL),
(7, 'Divers', NULL),
(35, 'service tÃ©stscc', '<p>ssffdd</p>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `adresse` int(5) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `profession` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `username`, `password`, `telephone`, `adresse`, `date_naissance`, `profession`, `email`, `is_admin`, `is_active`, `is_verified`, `date_creation`, `last_update`) VALUES
(1, 'thimbo', 'moussa', 'test', 'test123', '5142099999', 8, NULL, 'programmeur', 'moussa@adress.ca', 0, 0, 0, '2015-11-11 23:16:37', '2015-11-11 23:16:37');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `domaine`
--
ALTER TABLE `domaine`
  ADD CONSTRAINT `domaine_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
