-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 27, 2019 at 11:11 AM
-- Server version: 5.6.43
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camagru`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentary`
--

CREATE TABLE `commentary` (
  `id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentary`
--

INSERT INTO `commentary` (`id`, `content`, `id_user`, `id_publication`) VALUES
(1, 'Voici le premier commentaire', 4, 17),
(2, 'saktlu', 6, 17),
(3, 'Salut', 6, 17),
(19, 'trop frais', 9, 65),
(20, 'trop trop frais', 13, 65),
(23, 'Salut', 29, 67),
(24, 'fsfsdf', 29, 67),
(25, 'fsfsdf', 29, 67),
(26, 'Salut ?', 29, 67),
(27, 'sadad', 29, 67),
(28, 'sadad', 29, 67),
(29, 'test', 29, 67),
(30, 'adsasd', 29, 67),
(31, 'sfsd', 29, 67),
(32, 'sdffd', 29, 67),
(33, 'sdffd', 29, 67),
(34, 'sdffd', 29, 67),
(35, 'sdffd', 29, 67),
(36, 'sdffd', 29, 67),
(37, 'sdffd', 29, 67),
(38, 'Salut ?', 9, 67),
(39, 'Oui bah voila', 29, 67),
(40, 'Oui bah voila', 29, 67),
(41, 'Et la ?sdfsdlfsdf', 9, 67),
(42, 'Et la ?sdfsdlfsdf', 9, 67),
(43, 'Et la ?sdfsdlfsdf', 9, 67),
(44, 'Et la ?sdfsdlfsdf', 9, 67),
(45, 'Et la ?sdfsdlfsdf', 9, 67),
(46, 'Et la ?sdfsdlfsdf', 9, 67),
(47, 'Et la ?sdfsdlfsdf', 9, 67),
(48, 'asdasd', 9, 67),
(49, 'sfzcsdf', 9, 67),
(50, 'Salut tu recois un mail la pd ?', 29, 67),
(51, 'Salut les michtos', 29, 66),
(52, 'Salut les michtos qui fonctionne', 29, 66),
(53, 'Salut les michtos qui va envoyer un mail et ui', 29, 66),
(54, 'bite', 9, 41),
(55, 'youlou', 9, 67),
(56, 'efwf', 9, 67),
(57, 'Salut ca va ?', 9, 33);

-- --------------------------------------------------------

--
-- Table structure for table `opinion`
--

CREATE TABLE `opinion` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opinion`
--

INSERT INTO `opinion` (`id`, `id_user`, `id_publication`) VALUES
(17, 11, 17),
(21, 11, 16),
(24, 50, 17),
(27, 26, 17),
(33, 13, 65),
(34, 29, 67),
(35, 29, 66);

-- --------------------------------------------------------

--
-- Table structure for table `publi`
--

CREATE TABLE `publi` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `publi`
--

INSERT INTO `publi` (`id`, `description`, `image`) VALUES
(1, 'yolo', 'ui'),
(2, 'erttetr', 'erter'),
(3, 'sfd', 'sfdsf'),
(4, 'terry', 'ui');

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `id` int(11) NOT NULL,
  `image` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL,
  `nb_like` int(11) NOT NULL,
  `nb_commentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`id`, `image`, `description`, `id_user`, `nb_like`, `nb_commentaire`) VALUES
(16, 'ahri.jpg', 'Voila c\'est arche je mets une photo parce que je suis trop famous', 6, 0, 0),
(17, 'illu.jpg', 'Eeeeeeh salut a tous les amis c\'est', 10, 0, 0),
(29, 'illu.jpg', 'ehui', 9, 0, 0),
(30, 'illu.jpg', 'rththbtd', 9, 0, 0),
(31, 'illu.jpg', 'lol', 9, 0, 0),
(32, 'illu.jpg', 'sdsaf', 9, 0, 0),
(33, 'illu.jpg', 'dfdfvdvsdfsdf', 7, 0, 0),
(34, 'illu.jpg', 'dfdfvdv', 9, 0, 0),
(35, 'illu.jpg', 'oui', 9, 0, 0),
(36, 'illu.jpg', 'bahnon', 9, 0, 0),
(37, 'illu.jpg', 'rutrtu', 9, 0, 0),
(38, 'illu.jpg', 'xsdvsdva3412', 9, 0, 0),
(39, 'illu.jpg', 'salut', 9, 0, 0),
(40, 'illu.jpg', 'xsdvsdv', 9, 0, 0),
(41, 'illu.jpg', 'ydfvdv', 9, 0, 0),
(42, 'illu.jpg', 'terry', 9, 0, 0),
(43, 'illu.jpg', 'xsdvsdv', 9, 0, 0),
(44, 'illu.jpg', 'ziph', 9, 0, 0),
(45, 'illu.jpg', 'gthrtj', 9, 0, 0),
(46, 'illu.jpg', 'yolo', 9, 0, 0),
(55, 'ahri.jpg', 'ahri ou pikachu ?', 9, 0, 0),
(56, 'pika.jpg', 'sfsdsdf', 9, 0, 0),
(57, 'img.png', 'Testtest', 9, 0, 0),
(61, '512906c2c420aaa42fde4aaebfec4b2e.png', 'ewdwf', 9, 0, 0),
(65, '1088c906f223a6782516db98eab3a320.png', 'Les bg', 9, 0, 0),
(66, 'c33a4c7c594f9b9bd774525882ea64ec.png', 'Les autres bg', 9, 0, 0),
(67, '5199088da9f747639d9c1f7fa3a98d7b.png', 'Quel bg', 9, 0, 0),
(70, '285be461ebac592bb35f4c1247d36fb2.png', 'yrtshhgj', 9, 0, 0),
(71, 'd4865d1c04f4c12b5585a5bb476c1ea2.png', 'xvds', 9, 0, 0),
(72, 'Resource id #6', 'Salut ?', 9, 0, 0),
(73, 'Resource id #6', 'Yo 2e', 9, 0, 0),
(74, 'Resource id #5', '3e', 9, 0, 0),
(75, '1', 'rhtrh', 9, 0, 0),
(76, 'montage.png', '5', 9, 0, 0),
(77, 'montage.png', 'dsdsdad', 9, 0, 0),
(78, 'montage.png', 'dsdsdad', 9, 0, 0),
(79, 'montage.png', 'dsdsdad', 9, 0, 0),
(80, 'montage.png', 'dsdsdad', 9, 0, 0),
(81, 'montage.png', 'dsdsdad', 9, 0, 0),
(82, 'montage.png', 'dsdsdad', 9, 0, 0),
(83, 'montage.png', 'dsdsdad', 9, 0, 0),
(84, 'montage.png', 'dsdsdad', 9, 0, 0),
(85, 'montage.png', 'dsdsdad', 9, 0, 0),
(86, 'montage.png', 'dsdsdad', 9, 0, 0),
(87, 'montage.png', 'dsdsdad', 9, 0, 0),
(88, 'montage.png', 'dsdsdad', 9, 0, 0),
(89, 'montage.png', 'dsdsdad', 9, 0, 0),
(90, 'montage.png', 'dsdsdad', 9, 0, 0),
(91, 'montage.png', 'dsdsdad', 9, 0, 0),
(92, 'montage.png', 'dsdsdad', 9, 0, 0),
(93, 'montage.png', 'dsdsdad', 9, 0, 0),
(94, 'montage.png', 'dsdsdad', 9, 0, 0),
(95, 'montage.png', 'dsdsdad', 9, 0, 0),
(96, 'montage.png', 'dsdsdad', 9, 0, 0),
(97, 'montage.png', 'dsdsdad', 9, 0, 0),
(98, 'montage.png', 'dsdsdad', 9, 0, 0),
(99, 'montage.png', 'dsdsdad', 9, 0, 0),
(100, 'montage.png', 'dsdsdad', 9, 0, 0),
(101, 'montage.png', 'dsdsdad', 9, 0, 0),
(102, 'montage.png', 'dsdsdad', 9, 0, 0),
(103, 'montage.png', 'dsdsdad', 9, 0, 0),
(104, 'montage.png', 'dsdsdad', 9, 0, 0),
(105, 'montage.png', 'dsdsdad', 9, 0, 0),
(106, 'montage.png', 'dsdsdad', 9, 0, 0),
(107, 'montage.png', 'dsdsdad', 9, 0, 0),
(108, 'montage.png', 'dsdsdad', 9, 0, 0),
(109, 'montage.png', 'dsdsdad', 9, 0, 0),
(110, 'montage.png', 'dsdsdad', 9, 0, 0),
(111, 'montage.png', 'dsdsdad', 9, 0, 0),
(112, 'montage.png', 'dsdsdad', 9, 0, 0),
(113, 'montage.png', 'dsdsdad', 9, 0, 0),
(114, 'montage.png', 'dsdsdad', 9, 0, 0),
(115, 'montage.png', 'dsdsdad', 9, 0, 0),
(116, 'montage.png', 'dsdsdad', 9, 0, 0),
(117, 'montage.png', 'dsdsdad', 9, 0, 0),
(118, 'montage.png', 'dsdsdad', 9, 0, 0),
(119, 'montage.png', 'dsdsdad', 9, 0, 0),
(120, 'montage.png', 'dsdsdad', 9, 0, 0),
(121, 'montage.png', 'dsdsdad', 9, 0, 0),
(122, 'montage.png', 'dsdsdad', 9, 0, 0),
(123, 'montage.png', 'dsdsdad', 9, 0, 0),
(124, 'montage.png', 'dsdsdad', 9, 0, 0),
(125, 'montage.png', 'dsdsdad', 9, 0, 0),
(126, 'montage.png', 'dsdsdad', 9, 0, 0),
(127, 'montage.png', 'dsdsdad', 9, 0, 0),
(128, 'montage.png', 'dsdsdad', 9, 0, 0),
(129, 'montage.png', 'dsdsdad', 9, 0, 0),
(130, 'montage.png', 'dsdsdad', 9, 0, 0),
(131, 'montage.png', 'dsdsdad', 9, 0, 0),
(132, 'montage.png', 'dsdsdad', 9, 0, 0),
(133, 'montage.png', 'dsdsdad', 9, 0, 0),
(134, 'montage.png', 'dsdsdad', 9, 0, 0),
(135, 'montage.png', 'dsdsdad', 9, 0, 0),
(136, 'montage.png', 'dsdsdad', 9, 0, 0),
(137, 'montage.png', 'dsdsdad', 9, 0, 0),
(138, 'montage.png', 'dsdsdad', 9, 0, 0),
(139, 'montage.png', 'dsdsdad', 9, 0, 0),
(140, 'montage.png', 'dsdsdad', 9, 0, 0),
(141, 'montage.png', 'dsdsdad', 9, 0, 0),
(142, 'montage.png', 'dsdsdad', 9, 0, 0),
(143, 'montage.png', 'dsdsdad', 9, 0, 0),
(144, 'montage.png', 'dsdsdad', 9, 0, 0),
(145, 'montage.png', 'dsdsdad', 9, 0, 0),
(146, 'montage.png', 'dsdsdad', 9, 0, 0),
(147, 'montage.png', 'dsdsdad', 9, 0, 0),
(148, 'montage.png', 'dsdsdad', 9, 0, 0),
(149, 'montage.png', 'dsdsdad', 9, 0, 0),
(150, 'montage.png', 'dsdsdad', 9, 0, 0),
(151, 'montage.png', 'dsdsdad', 9, 0, 0),
(152, 'montage.png', 'dsdsdad', 9, 0, 0),
(153, 'montage.png', 'dsdsdad', 9, 0, 0),
(154, 'montage.png', 'dsdsdad', 9, 0, 0),
(155, 'montage.png', 'dsdsdad', 9, 0, 0),
(156, 'montage.png', 'dsdsdad', 9, 0, 0),
(157, 'montage.png', 'dsdsdad', 9, 0, 0),
(158, 'montage.png', 'dsdsdad', 9, 0, 0),
(159, 'montage.png', 'dsdsdad', 9, 0, 0),
(160, 'montage.png', 'dsdsdad', 9, 0, 0),
(161, 'montage.png', 'dsdsdad', 9, 0, 0),
(162, 'montage.png', 'dsdsdad', 9, 0, 0),
(163, 'montage.png', 'dsdsdad', 9, 0, 0),
(164, 'montage.png', 'dsdsdad', 9, 0, 0),
(165, 'montage.png', 'dsdsdad', 9, 0, 0),
(166, 'montage.png', 'dsdsdad', 9, 0, 0),
(167, 'montage.png', 'dsdsdad', 9, 0, 0),
(168, 'montage.png', 'dsdsdad', 9, 0, 0),
(169, 'montage.png', 'dsdsdad', 9, 0, 0),
(170, 'montage.png', 'dsdsdad', 9, 0, 0),
(171, 'montage.png', 'dsdsdad', 9, 0, 0),
(172, 'montage.png', 'dsdsdad', 9, 0, 0),
(173, 'montage.png', 'dsdsdad', 9, 0, 0),
(174, 'montage.png', 'dsdsdad', 9, 0, 0),
(175, 'montage.png', 'dsdsdad', 9, 0, 0),
(176, 'montage.png', 'dsdsdad', 9, 0, 0),
(177, 'montage.png', 'dsdsdad', 9, 0, 0),
(178, 'montage.png', 'dsdsdad', 9, 0, 0),
(179, 'montage.png', 'dsdsdad', 9, 0, 0),
(180, 'montage.png', 'dsdsdad', 9, 0, 0),
(181, 'montage.png', 'dsdsdad', 9, 0, 0),
(182, 'montage.png', 'dsdsdad', 9, 0, 0),
(183, 'montage.png', 'dsdsdad', 9, 0, 0),
(184, 'montage.png', 'dsdsdad', 9, 0, 0),
(185, 'montage.png', 'dsdsdad', 9, 0, 0),
(186, 'montage.png', 'dsdsdad', 9, 0, 0),
(187, 'montage.png', 'dsdsdad', 9, 0, 0),
(188, 'montage.png', 'dsdsdad', 9, 0, 0),
(189, 'montage.png', 'dsdsdad', 9, 0, 0),
(190, 'montage.png', 'dsdsdad', 9, 0, 0),
(191, 'montage.png', 'dsdsdad', 9, 0, 0),
(192, 'montage.png', 'dsdsdad', 9, 0, 0),
(193, 'montage.png', 'dsdsdad', 9, 0, 0),
(194, 'montage.png', 'dsdsdad', 9, 0, 0),
(195, 'montage.png', 'dsdsdad', 9, 0, 0),
(196, 'montage.png', 'dsdsdad', 9, 0, 0),
(197, 'montage.png', 'dsdsdad', 9, 0, 0),
(198, 'montage.png', 'dsdsdad', 9, 0, 0),
(199, 'montage.png', 'dsdsdad', 9, 0, 0),
(200, 'montage.png', 'dsdsdad', 9, 0, 0),
(201, 'montage.png', 'dsdsdad', 9, 0, 0),
(202, 'montage.png', 'dsdsdad', 9, 0, 0),
(203, 'montage.png', 'dsdsdad', 9, 0, 0),
(204, 'montage.png', 'dsdsdad', 9, 0, 0),
(205, 'montage.png', 'dsdsdad', 9, 0, 0),
(206, 'montage.png', 'dsdsdad', 9, 0, 0),
(207, 'montage.png', 'dsdsdad', 9, 0, 0),
(208, 'montage.png', 'dsdsdad', 9, 0, 0),
(209, 'montage.png', 'dsdsdad', 9, 0, 0),
(210, 'montage.png', 'dsdsdad', 9, 0, 0),
(211, 'montage.png', 'dsdsdad', 9, 0, 0),
(212, 'montage.png', 'dsdsdad', 9, 0, 0),
(213, 'montage.png', 'dsdsdad', 9, 0, 0),
(214, 'montage.png', 'dsdsdad', 9, 0, 0),
(215, 'montage.png', 'dsdsdad', 9, 0, 0),
(216, 'montage.png', 'dsdsdad', 9, 0, 0),
(217, 'montage.png', 'dsdsdad', 9, 0, 0),
(218, 'montage.png', 'dsdsdad', 9, 0, 0),
(219, 'montage.png', 'dsdsdad', 9, 0, 0),
(220, 'montage.png', 'dsdsdad', 9, 0, 0),
(221, 'montage.png', 'dsdsdad', 9, 0, 0),
(222, 'montage.png', 'dsdsdad', 9, 0, 0),
(223, 'montage.png', 'dsdsdad', 9, 0, 0),
(224, 'montage.png', 'dsdsdad', 9, 0, 0),
(225, 'montage.png', 'dsdsdad', 9, 0, 0),
(226, 'montage.png', 'dsdsdad', 9, 0, 0),
(227, 'montage.png', 'dsdsdad', 9, 0, 0),
(228, 'montage.png', 'dsdsdad', 9, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `reset` varchar(255) CHARACTER SET utf8 NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `reset`, `newsletter`, `token`, `valid`) VALUES
(3, 'thyrse', 'terry.fourgeux@gmail', '65960016432992748a13a1bcd21f592759de4c0551505e9dcb72641487e1057134fbf9ac871b563d37b625ce45a12c5d6907197fdbf8eb47506318b75adfee48', '', 1, '', 1),
(4, 'Terry', 'terry.fourgeux@gmail', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '', 1),
(5, 'yo', 'tfourgeux42@gmail.co', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '', 1),
(6, 'hihihihihihi', 'tefourge@student.42', 'a1e1b5aa9f66a10f2ad331cbaec6a497f1a07d5221fe9975e6c8656ee53405acd9f0cb75d62e7a020eee71f3ff58b644128f03eaf96dcb0b61e1939ff5f819cc', '', 1, '', 1),
(7, 'Yolo', 'tefourge@student.42.fr', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', 'dfgdsdgh', 1, '', 1),
(8, 'tt', 'terry.fourgeux@gmail', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '', 1),
(9, 'zokoy', 'tfourgeux42@gmail.com', 'caf00c4ee8f3fce3c48393d402ae7ccd3dfc388d4bd382175acb16a5d9884a46de78f0c9c794eb79b0f67c339f0e0d19467b928ac3fcdbb66ebaf71a17ee2e5d', '', 1, '', 1),
(10, 'thyrsef', '', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '', 1),
(11, 'yooo', 'tefourge@student.42.fr', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '', 1),
(12, 'dududu', 'tefourge@student.42.', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '', 1),
(13, 'youuu', 'tefourge@student.42.fr', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '', 1),
(16, 'dsfsdfsdf', 'tefourge@student.42.fr', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '', 1),
(26, 'terruuuu', 'tefourge@student.', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '', 1),
(27, 'kdblidruie', 'tefourge@student.42.fr', '8b5a08dfff0475162fa40f5d6f6d0ebe8cdd87b99507142f1a08ecc761a209c17eee78e67b60b1e8ad1a7352ebefeea35f3005414f2de90e50b4e9390be6dd9a', '', 1, '', 1),
(28, 'ziphlot', 'tefourge@student.42.fr', '0e628a628676c957256b0192c7a88d12b2152088d2ac11bd4ba25240098e2a645f52c35785e597d2d8b90602376f2f6ac145f8afb26783e13a84b5c3361ee616', '', 1, '', 1),
(29, 'Ziphlotonn', 'tefourge@student.42.fr', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '', 1),
(45, 'dbfghfb', 'sfterry.fourgeux@gmail.com', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, 'f4dbb90db2555574a1d970b7ab30dc22', 1),
(46, 'Ziphlotegd', 'tefourge@student.42.fr', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '42cb7c6bf5692858dc0eeeed94556247', 1),
(47, 'cxvxcvxv', 'terry.fourgeux@gmail.com', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, 'd3e62f6b00922e9504181d75bf43852f', 1),
(48, 'Ziphlotsdf', 'terry.fourgeux@gmail.com', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '8f7c51980bb123bcc4be46b6783b36f9', 1),
(49, 'kjtfgcvf', 'terry.fourgeux@gmail.com', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, 'bdf3651147037b4acf6e5e0a1662fb46', 1),
(50, 'gdfgsdgsgd', 'tfourgeux42@gmail.com', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, 'f0717d7cc3bdf6d4ad9705dbb7ce64fa', 1),
(51, 'vxcvxcvx', 'tefourge@student.42.fr', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, 'd303d3a2ecea8eb7dd581b3fadbb0d9f', 0),
(52, 'sdvsdcascv', 'tefourge@student.42.fr', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '017f26e4aee36131f7ebb8dfcab32775', 0),
(53, 'arche', 'terry.fourgeux@gmail.com', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, 'd791c79f799ecd07a27b99ba63937716', 0),
(54, 'Abel', 'tefourge@student.42.fr', '6884df4a07b1b0c36742cc6e100a0233afacced227b8d72a274e03e8701ff2cb9c857fdf33a112f88ef61add9941f8d8911ab77663944986edf91c235c2fcce8', '', 1, '68339ad0061685a97e76b56a636c915e', 1),
(55, 'youpih', 'tefourge@student.42.fr', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 0, 'f4b3c6ce02563d55d59fcfe6a522255f', 1),
(56, 'youuuhu', 'tefourge@student.42.fr', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, '8afad9e92f39ab498fcdb7dd07f6b80d', 1),
(57, 'usidowfhw', 'tefourge@student.42.fr', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, 'dd8603cf704b6e425a5f7a3c41a198b1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_publication` (`id_publication`);

--
-- Indexes for table `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_publication` (`id_publication`);

--
-- Indexes for table `publi`
--
ALTER TABLE `publi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentary`
--
ALTER TABLE `commentary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `publi`
--
ALTER TABLE `publi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentary`
--
ALTER TABLE `commentary`
  ADD CONSTRAINT `commentary_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentary_ibfk_2` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `opinion_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `opinion_ibfk_2` FOREIGN KEY (`id_publication`) REFERENCES `publication` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publication_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
