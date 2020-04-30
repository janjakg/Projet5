-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 avr. 2020 à 20:09
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet5`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `signalled` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalled`) VALUES
(50, 91, 'Adèle', 'C\'est quoi cette chaudasse???', '2020-04-06 19:45:08', 1),
(62, 83, 'samir', 'ce son sonne trop à l\'ancienne, perso je préfère la drill', '2020-04-07 10:57:11', 1),
(61, 83, 'Jack', 'le son sonne comme dans les 90\'s', '2020-04-07 10:56:01', 0),
(66, 108, 'samir', 'gang gang!!! Je kiffe', '2020-04-15 12:31:28', 0),
(67, 108, 'az', 'j\'aime pas ce mec', '2020-04-15 12:31:54', 1),
(65, 108, 'Adèle', 'Trop gangsta pour moi, je passe!!!', '2020-04-15 12:30:48', 0),
(44, 94, 'Jack', 'Lourd!!!', '2020-04-06 19:38:26', 0),
(43, 94, 'Jack', 'Trop naze', '2020-04-06 19:38:09', 0),
(42, 94, 'babacar', 'C\'est quoi ça??', '2020-04-06 19:37:51', 1),
(41, 94, 'Adèle', 'J\'aime pas du tout', '2020-04-06 19:37:11', 0),
(39, 94, 'emilie', 'Ça rappe fort!!!', '2020-04-06 19:35:56', 0),
(40, 94, 'samir', 'On dirait un enfant de chœur mais ça rappe dur', '2020-04-06 19:36:55', 0),
(38, 94, 'samir', 'C\'est un bon celui là', '2020-04-06 19:35:13', 0),
(51, 91, 'Jack', 'Ça passe bien ce son', '2020-04-06 19:45:28', 0),
(52, 90, 'emilie', 'cool', '2020-04-06 19:45:42', 0),
(53, 90, 'Jack', 'J\'aime pas cette meuf', '2020-04-06 19:46:04', 1),
(54, 89, 'samir', 'Cool', '2020-04-06 19:46:23', 0),
(55, 89, 'jj', 'trop devocoder , c\'est nul!!!', '2020-04-06 19:47:03', 1),
(56, 89, 'samir', 'Chill', '2020-04-06 19:47:18', 0),
(57, 88, 'Jack', 'Grime!!!', '2020-04-06 19:47:37', 0),
(63, 83, 'jean-max', 'Trop cool ça me rappelle le rap comme je l\'aimais au début', '2020-04-07 10:57:47', 0),
(64, 94, 'samir', 'je préfère 4 quarters', '2020-04-09 10:35:29', 0),
(68, 113, 'Jack', 'très cool', '2020-04-22 12:28:33', 1),
(69, 117, 'Jack', 'nul', '2020-04-23 15:01:15', 1),
(70, 131, 'Jack', 'Pas mal cet album', '2020-04-24 15:16:39', 0),
(71, 131, 'Adèle', 'c\'était mieux avant', '2020-04-24 15:16:53', 1),
(72, 136, 'Jack', 'Il commence a y avoir de la concurrence à NY, c\'est bien ça', '2020-04-24 17:11:59', 0),
(73, 136, 'samir', 'trop répétitif à mon gout', '2020-04-24 17:12:19', 0),
(74, 136, 'az', 'c\'est pas ouf', '2020-04-24 17:12:34', 0),
(75, 136, 'Marcus', 'C\'est nul', '2020-04-24 17:12:52', 1);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `pseudo`, `email`, `password`) VALUES
(1, 'jack', 'nint@gmail.com', '$2y$10$qfkys4HYPZqvDHd8fqEQ4esMf0b181jfPIMDpNoLftF1qxcqA6X.e');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `albumName` varchar(255) NOT NULL,
  `imageAlbum` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `artist`, `title`, `albumName`, `imageAlbum`, `creation_date`) VALUES
(91, 'Doja Cat  ', 'Say So  ', '117680872  ', 'https://e-cdns-images.dzcdn.net/images/cover/1e0d4359a328f8b0ea3563e8623a09aa/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:30:36'),
(90, 'Young M.A  ', 'BIG  ', '101521622  ', 'https://e-cdns-images.dzcdn.net/images/cover/141798ea351fac481917c1f790cad24b/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:29:56'),
(89, 'Lil Tjay  ', 'Goat  ', '113975572  ', 'https://e-cdns-images.dzcdn.net/images/cover/9d24425b2948d0ccc3343ddb18d51f0b/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:29:21'),
(88, 'Stormzy  ', 'Vossi Bop  ', '94824902  ', 'https://e-cdns-images.dzcdn.net/images/cover/19888c8a72650011acdaf6c28dfab5f6/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:28:31'),
(86, 'Bryson Tiller  ', 'Don\'t  ', '11233456  ', 'https://cdns-images.dzcdn.net/images/cover/f82c7de8ad8e3884943a9ba0f144c58c/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:25:57'),
(87, 'Dave  ', 'Screwface Capital  ', '89270912  ', 'https://e-cdns-images.dzcdn.net/images/cover/f447bf9aa81c3937299a68dc577978aa/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:28:03'),
(85, 'Quality Control  ', 'Intro  ', '107155462  ', 'https://e-cdns-images.dzcdn.net/images/cover/903f125745550559e134066d41e5734f/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:25:14'),
(84, 'Fabolous  ', 'Cold Summer  ', '120282482  ', 'https://cdns-images.dzcdn.net/images/cover/f3ef33f9a6c56267bda19528e5bd2226/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:24:13'),
(83, 'Gang Starr  ', 'Family and Loyalty  ', '109676512  ', 'https://cdns-images.dzcdn.net/images/cover/45b4d5190edad3cfb03a8d69237dfe77/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:23:47'),
(82, 'DaBaby  ', 'BOP  ', '112139492  ', 'https://e-cdns-images.dzcdn.net/images/cover/0978a699405138804e444566fbe703b7/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:22:41'),
(81, 'Wizkid  ', 'Joro  ', '102141302  ', 'https://e-cdns-images.dzcdn.net/images/cover/b1eb19b96a5e2985053b8bef3138498f/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:21:42'),
(80, 'Burna Boy  ', 'On The Low  ', '78627812  ', 'https://e-cdns-images.dzcdn.net/images/cover/a1e6cb98c676109a0aa413718ad9d57d/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:21:20'),
(79, 'Drake', 'Drake War Freestyle  ', '126049852  ', 'https://e-cdns-images.dzcdn.net/images/cover/6810dcb8ac199b24e8a653e3b99d99e8/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:20:52'),
(77, 'Sheff G  ', '8th Block  ', '110741452  ', 'https://cdns-images.dzcdn.net/images/cover/243f795209d1065271de831269cef645/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:18:47'),
(78, 'Fivio Foreign  ', 'Richer Than Ever  ', '126627812  ', 'https://e-cdns-images.dzcdn.net/images/cover/2b2da95f82aac5981ac7d5c6df7d24ae/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:19:47'),
(76, '22Gz  ', 'Suburban, Pt. 2  ', '120598032  ', 'https://cdns-images.dzcdn.net/images/cover/8bc2aefa4ebcadef0dde6bf262f41bf4/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:18:20'),
(73, 'Wiz Khalifa  ', 'Contact (feat. Tyga)  ', '137671372  ', 'https://e-cdns-images.dzcdn.net/images/cover/024616a424f6cc26165d827fba09c583/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:16:22'),
(113, 'Snoh Aalegra  ', 'I Want You Around  ', '103717962', 'https://e-cdns-images.dzcdn.net/images/cover/92a62e70793f155e98286fdfcad27c25/250x250-000000-80-0-0.jpg  ', '2020-04-22 12:26:45'),
(75, 'Drake', 'When to Say When/ Chicago Freestyle  ', '135868332  ', 'https://e-cdns-images.dzcdn.net/images/cover/b917dac7688ee4088d67ef0cc6d81bb4/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:17:54'),
(72, 'Ninho  ', 'Zipette  ', '135291072  ', 'https://cdns-images.dzcdn.net/images/cover/b351f0e935c9c3901f8d893b92ab952a/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:15:59'),
(71, 'Pop Smoke  ', 'Dior  ', '104484092  ', 'https://cdns-images.dzcdn.net/images/cover/bbc13e336fae42e7731c69a2faa8ebe0/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:14:43'),
(70, 'Rich The Kid  ', 'Plug Walk  ', '68962771  ', 'https://e-cdns-images.dzcdn.net/images/cover/fb6a2c8481da58f90224a2f88f222e89/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:14:20'),
(69, 'Rohff  ', 'Solo  ', '137876582  ', 'https://cdns-images.dzcdn.net/images/cover/6abd50fb2a53b3659f23ae712f586f19/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:13:58'),
(110, 'Lefa  ', 'T\'y arrivais pas  ', '113440482', 'https://e-cdns-images.dzcdn.net/images/cover/84da55eabd9f8be0dc862c17dec0e390/250x250-000000-80-0-0.jpg  ', '2020-04-16 11:30:40'),
(66, 'MaxThaDemon  ', '4 Quarters  ', '105018232  ', 'https://cdns-images.dzcdn.net/images/cover/e400f7e4d0defa341daf9833d08aa3ee/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:13:14'),
(112, 'H.E.R.  ', 'Feel A Way  ', '108612682', 'https://e-cdns-images.dzcdn.net/images/cover/b0b84cef7af7bfa2499cda1c3fff0028/250x250-000000-80-0-0.jpg  ', '2020-04-22 12:18:18'),
(94, 'MaxThaDemon  ', 'Stars  ', '134686862  ', 'https://e-cdns-images.dzcdn.net/images/cover/2087ddf4255c49d08c903b0874a38ed0/250x250-000000-80-0-0.jpg  ', '2020-04-06 19:33:54'),
(106, 'L\'uzine  ', 'Feuille blanche  ', '138991562', 'https://cdns-images.dzcdn.net/images/cover/bd75fc63d2b9fbde2d5f3c34d97f544e/250x250-000000-80-0-0.jpg  ', '2020-04-14 11:17:45'),
(108, '22Gz  ', 'U-Turn  ', '140471642', 'https://cdns-images.dzcdn.net/images/cover/c52ee9cf4918a1e8a6a58c7eb72751d5/250x250-000000-80-0-0.jpg  ', '2020-04-14 21:40:36'),
(105, 'S.Pri Noir  ', 'T\'as capté  ', '140283672', 'https://e-cdns-images.dzcdn.net/images/cover/011f099541d34d41bedcb735d3f26992/250x250-000000-80-0-0.jpg  ', '2020-04-14 11:09:35'),
(114, 'Jorja Smith  ', 'On My Mind (Jorja Smith X Preditah)  ', '45607871', 'https://cdns-images.dzcdn.net/images/cover/8e9941b4c729440efad4b793b9d80012/250x250-000000-80-0-0.jpg  ', '2020-04-22 12:34:33'),
(115, 'Jorja Smith  ', 'Teenage Fantasy  ', '82220222', 'https://cdns-images.dzcdn.net/images/cover/af9b45d64ca6c4098df18b264fd74213/250x250-000000-80-0-0.jpg  ', '2020-04-22 12:38:48'),
(116, 'Summer Walker  ', 'I\'ll Kill You  ', '113016222', 'https://e-cdns-images.dzcdn.net/images/cover/b63fec3a3108a1a346cc27a51af6c840/250x250-000000-80-0-0.jpg  ', '2020-04-23 10:30:18'),
(117, 'dvsn  ', 'No Good  ', '141929342', 'https://cdns-images.dzcdn.net/images/cover/09f44546194e3d7e1968435da1540467/250x250-000000-80-0-0.jpg  ', '2020-04-23 11:39:08'),
(120, 'Kehlani  ', 'Toxic  ', '135592042', 'https://cdns-images.dzcdn.net/images/cover/1cd19ba6a321f8cd8c925e9879dd9a84/250x250-000000-80-0-0.jpg  ', '2020-04-24 11:33:55'),
(124, 'Kelly Rowland  ', 'COFFEE  ', '139753882', 'https://e-cdns-images.dzcdn.net/images/cover/9cd7cb2c534902c97a90b64dbc419157/250x250-000000-80-0-0.jpg  ', '2020-04-24 11:54:21'),
(126, 'Kaash Paige  ', 'Love Songs (Bonus)  ', '118371782', 'https://e-cdns-images.dzcdn.net/images/cover/54a5b050d0f44233680852c8828240d5/250x250-000000-80-0-0.jpg  ', '2020-04-24 11:55:55'),
(127, 'Knucks  ', 'Home  ', '99221402', 'https://e-cdns-images.dzcdn.net/images/cover/8fa7cc8afaae960708faa60c6cd6f103/250x250-000000-80-0-0.jpg  ', '2020-04-24 11:58:29'),
(128, 'Giggs  ', 'Dark Was The Case  ', '118376602', 'https://e-cdns-images.dzcdn.net/images/cover/367fe7c1984697142232a26abeb88506/250x250-000000-80-0-0.jpg  ', '2020-04-24 11:59:57'),
(129, 'Headie One  ', 'Back to Basics  ', '102490272', 'https://e-cdns-images.dzcdn.net/images/cover/af8e8cd86797809656e36a049034bed9/250x250-000000-80-0-0.jpg  ', '2020-04-24 12:01:53'),
(131, 'Roddy Ricch  ', 'The Box  ', '121836132', 'https://cdns-images.dzcdn.net/images/cover/4cecb47ae25837b9dd022004b5cacbdc/250x250-000000-80-0-0.jpg  ', '2020-04-24 12:05:23'),
(136, 'Fivio Foreign  ', 'Ambition  ', '143191252', 'https://e-cdns-images.dzcdn.net/images/cover/e40dba931f2b4e562fa3b6b2175263b6/250x250-000000-80-0-0.jpg  ', '2020-04-24 17:08:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
