-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 30, 2019 at 10:01 AM
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
(57, 'Salut ca va ?', 9, 33),
(59, 'Salut', 9, 341),
(68, 'Yo', 9, 347);

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
(35, 29, 66),
(39, 9, 351),
(42, 9, 347),
(43, 9, 343),
(44, 9, 342),
(45, 9, 345),
(47, 9, 355),
(49, 9, 356);

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
(228, 'montage.png', 'dsdsdad', 9, 0, 0),
(229, 'montage.png', 'Halo', 9, 0, 0),
(230, 'montage.png', 'Halo', 9, 0, 0),
(231, 'montage.png', 'Halo', 9, 0, 0),
(232, 'montage.png', 'Halo', 9, 0, 0),
(233, 'montage.png', 'Halo', 9, 0, 0),
(234, 'montage.png', 'Halo', 9, 0, 0),
(235, '/Users/tefourge/http/MyWebSite/assets/images/635f2', 'Halo', 9, 0, 0),
(236, '80f78549e182992778ac4f7d9c5ab2c9.png', 'Halo', 9, 0, 0),
(237, 'be6aa36ab25cdce9111945ae4de7ef1b.png', 'Cat', 9, 0, 0),
(238, 'f33367e0bcb7266ccb29c5e7d11210ca.png', 'dsdsd', 9, 0, 0),
(239, 'b11904d00001e56ab75f0c1a31a54dd9.png', 'dasdad', 9, 0, 0),
(240, 'aee55d53c14123d8a6097bae6efa7346.png', 'gn', 9, 0, 0),
(241, 'e87aa5bd89f41eb686b7055c102c48aa.png', 'dsaas', 9, 0, 0),
(242, 'd67a15a41ea5884d9ec0a8a527de20b1.png', 'sfsf', 9, 0, 0),
(243, '15b45163c9b77147cb429aa2dd1c9bb4.png', 'sfdfs', 9, 0, 0),
(244, 'd1249bf9d22b65358023b3d173ee4631.png', 'asdasd', 9, 0, 0),
(245, 'e63a9157a69e028b835a688cfdacbe0e.png', 'sdfsf', 9, 0, 0),
(246, 'e6b5c5978ceb1320dc31ef6f9b69d210.png', 'dsfsdf', 9, 0, 0),
(247, 'f9614a1b6621d0650af819c49864a1a3.png', 'asdad', 9, 0, 0),
(248, 'b9077c04b40838dd1db08cd49ba55ee5.png', 'sdsadasd', 9, 0, 0),
(249, 'bf12d772357732baa5fba2e0bdf3660b.png', 'gggr', 9, 0, 0),
(250, '708f0cdec57dbf8f78f228ca9da05806.png', 'Test ?', 9, 0, 0),
(251, 'ebbac8cc599450bc437d8ce539dc900c.png', 'cscscs', 9, 0, 0),
(252, '15a7d0e732cc984ebeb9953b7089aa76.png', 'aureole', 9, 0, 0),
(253, '13a2796b3a2c933b1983fef3e80a8180.png', 'chat', 9, 0, 0),
(254, '5102d4c074aeabb6f3e74213f244223c.png', 'sfdsdf', 9, 0, 0),
(255, '8036baf14726c86a430405ea2105f27c.png', 'asdasd', 9, 0, 0),
(256, '9104346ab6849a59b5cd5e0a7feb2962.png', 'dvdfv', 9, 0, 0),
(257, '25a2c4882ee0e83cfa5e0bb209eda0f8.png', 'neige', 9, 0, 0),
(258, 'da33028c6210b9098fab4f149d42ee59.png', 'das', 9, 0, 0),
(259, '6d650e73979ec77249ea5e7c7bd0afbe.png', 'adad', 9, 0, 0),
(260, 'fd137f483769467d7fa5c05b32153ef5.png', 'dad', 9, 0, 0),
(261, '7dd56a7cbe5b60ae4d7edc3a2ad15210.png', 'adads', 9, 0, 0),
(262, 'f67d0f6c250d886e2f68e062dae7fbe9.png', 'asdasdads', 9, 0, 0),
(263, '339540b0c28f99a4fb7e5d7c295f3bba.png', 'sdfsdf', 9, 0, 0),
(264, '36fe865827dc1d7d1f189dd12f110908.png', 'asd', 9, 0, 0),
(265, 'f9f59a48377be8e5e6acb5bdfaccd111.png', 'sadasd', 9, 0, 0),
(266, '276afec4f249c5acafd45ee9953d02b5.png', 'asdasd', 9, 0, 0),
(267, '72feb5905677e3880c732cc8783bf31b.png', 'sdfsdf', 9, 0, 0),
(268, 'b43386e93e93742e61ed47c0eeaa4a5a.png', 'sdfsdf', 9, 0, 0),
(269, '641f4769a0a86e12722cc27232d32c3a.png', 'sdfsf', 9, 0, 0),
(270, '2ad3110c157547aeb34d6e55b310bc02.png', 'sdf', 9, 0, 0),
(271, '33ba6e461805b9a1e5902c3c9ff79851.png', 'dsfsf', 9, 0, 0),
(272, '0d81de4c97e07c72a7565f267f4aff4f.png', 'sdfsdf', 9, 0, 0),
(273, '1ba9c9ac2dbb4fa612261084553d81b9.png', 'sdsd', 9, 0, 0),
(274, 'd2e7aa31a9ab1059f9665243c8525767.png', 'sdfsdf', 9, 0, 0),
(275, 'a4d09cc8d249254322fd1d0f085ac52b.png', 'sdfsdfsf', 9, 0, 0),
(276, '6f873a53371dd7d2bd3fa612ebdb28ff.png', 'asdasdads', 9, 0, 0),
(277, 'a97d64e77f2b69b63d77a3c3f52bfbce.png', 'sdfsfd', 9, 0, 0),
(278, '44e793798974c425d884435438829844.png', 'sdfsdf', 9, 0, 0),
(279, 'f75fb10a41ffbdd4607ed9eb85598bcf.png', 'vsddv', 9, 0, 0),
(280, '13c2c561e3ddf6deba78eee3a3a6a026.png', 'sffsdf', 9, 0, 0),
(281, '41957216db21cdbc94b9f0d1637177d3.png', 'asdads', 9, 0, 0),
(282, '40333e83b3e182e8ac668939e3587189.png', 'daSSAD', 9, 0, 0),
(283, 'pika.jpg', 'Salut', 9, 0, 0),
(284, '0701c942f8fd3cee10c0c1f8abcf041a.png', 'asdasd', 9, 0, 0),
(285, '2b55c92714365da720d0c2d35828ec55.png', 'sdasdasd', 9, 0, 0),
(286, 'ca6e2f0617d1ee38b98384af53b92e83.png', 'scasasc', 9, 0, 0),
(287, 'df026cc791c32eb8a44b2540aff7aca4.png', 'scasasc', 9, 0, 0),
(288, 'pika.jpg', 'asdasd', 9, 0, 0),
(289, 'pika.jpg', 'sdfsdfd', 9, 0, 0),
(290, 'img.png', 'Png donné', 9, 0, 0),
(291, '0d81de4c97e07c72a7565f267f4aff4f.png', 'asdada', 9, 0, 0),
(292, '0d81de4c97e07c72a7565f267f4aff4f.png', 'sfdsdffs', 9, 0, 0),
(293, 'pika.jpg', 'asdadasda', 9, 0, 0),
(294, 'pika.jpg', 'asdasd', 9, 0, 0),
(295, 'pika.jpg', 'Bon format ou pas ?', 9, 0, 0),
(296, 'pika.jpg', 'adsasdad', 9, 0, 0),
(297, 'pika.jpg', 'dscsds fsdf', 9, 0, 0),
(298, 'pika.jpg', 'From download and nothing selected', 9, 0, 0),
(299, 'pika.jpg', 'From images and nothing selected', 9, 0, 0),
(300, 'illu.jpg', 'sdfsfsdfsf', 9, 0, 0),
(301, 'bd2470726658eb4eca4a0350dd09e25e.', 'sdfsfsdfsf', 9, 0, 0),
(302, 'illu.jpg', 'sdfsfsdfsf', 9, 0, 0),
(303, 'img.png', 'PNG ?', 9, 0, 0),
(304, 'pika.jpg', 'sdfsfsdf', 9, 0, 0),
(305, 'img.png', 'sdfsdfsf', 9, 0, 0),
(306, 'img.png', 'sdfsdfsf', 9, 0, 0),
(307, 'd9b0fae8f3d0814b44d2ff94a943cdf1.', 'sdfsdfsf', 9, 0, 0),
(308, 'img.png', 'sdfsdfsf', 9, 0, 0),
(309, 'img.png', 'sdfsdfsf', 9, 0, 0),
(310, 'pika.jpg', 'Renommage', 9, 0, 0),
(311, 'img.png', 'Renommage PNG ?', 9, 0, 0),
(312, '674fcf282af82860ac0db31429815661.png', 'Renommage PNG ?', 9, 0, 0),
(313, '13e4b08b3b42456d700768d479723f59.png', 'Renommage PNG qui fonctionne ?', 9, 0, 0),
(314, '2069d85d7f10c27b1be2fb7d62739a24.jpg', 'Renommage variables', 9, 0, 0),
(315, '471b4154e9fca19624d4b4db196278a4.png', 'Renommage variables PNG', 9, 0, 0),
(316, '6b29d90f828beaf0c8dc59772cdccb3f.jpg', 'Salut je veux l\'extension', 9, 0, 0),
(317, 'e571e8a8e512963ac21d7622e3022d8e.jpg', 'Salut ca fonctionne ou pas alors ?', 9, 0, 0),
(318, '03fbd49f7604787952f0030b3347397a.png', 'Yo', 9, 0, 0),
(319, '9bba3167989481dd143f75b52644d3ed.png', 'Ange', 9, 0, 0),
(320, '444508f6f9692dfca897ea9f6f1e79a8.png', 'Salut', 9, 0, 0),
(321, '22aa19aa31ce0703697c7a3fc9673d93.jpg', 'sdfsdfsfdsf', 9, 0, 0),
(322, '825c6888b1f8e9a7ea5766c2df00e589.png', 'Chat', 9, 0, 0),
(323, 'cd5cecfa543d567491bd8512619e0dea.jpg', 'Resize ?', 9, 0, 0),
(324, '9bd4a1f39501777308079e20c00293d5.jpg', 'Resize ?', 9, 0, 0),
(325, 'c18d2a32cdb0a8614d8b5961334185ce.jpg', 'efsdfsd', 9, 0, 0),
(326, 'e5afa076cdbfa2b2c2c57c488473b750.jpg', 'asdasd', 9, 0, 0),
(327, '506fc13c40acff0ad9f1abb1c620916c.jpg', 'Resize ?', 9, 0, 0),
(328, '0aebe31db2c35efe158e05bcf0b5def7.jpg', 'Resize ?', 9, 0, 0),
(329, '50f152dbd66dfa6dac0a115d11a828a4.jpg', 'Resize ?', 9, 0, 0),
(330, '559fd42a3e8806491b76446fb4626a8c.jpg', 'Resize ?', 9, 0, 0),
(331, '01aeecd62a00814db92bf60989c46e88.jpg', 'Resize ?', 9, 0, 0),
(332, '63b3e546f725b64f93590f84a7630f8b.jpg', 'dsadasd', 9, 0, 0),
(333, '0074ea3760fdc6f40b3722f287a9cef7.jpg', 'sdsdsd', 9, 0, 0),
(334, '6133c589c2545bd7ad571b330deffdc9.jpg', 'Ahri', 9, 0, 0),
(335, '2f4e3be7b75ed31297afafb26c0dc6a5.jpg', 'Ahri', 9, 0, 0),
(336, '98903f1b2d8737c9f23e97db43b4bb7e.png', 'dads', 9, 0, 0),
(337, 'b8c8c92b3e0aa694baa351405cb87060.jpg', 'aasdasd', 9, 0, 0),
(338, '6c8719a3a67d6781d35c19882aa29ff3.jpg', 'Alors ca resize ?', 9, 0, 0),
(339, 'a398d2233884434919b4d5139651f465.png', 'sfsfsdf', 9, 0, 0),
(340, '12e015ef55230d954525438f83239923.png', 'sfdsdf', 9, 0, 0),
(341, '0ef19b88879c613244c379ec0848fc1f.jpg', 'asddas', 9, 0, 0),
(342, 'fa38e58d7a4244ead1d2a4dcf14a037b.jpg', 'asddas', 9, 0, 0),
(343, '8d1df631641438477814e501701e7057.jpg', 'fssdf', 9, 0, 0),
(344, '72046afe561ccc2412dcc4f86a00ddbf.jpg', 'adsasdas', 9, 0, 0),
(345, '2147a756329503fae1de631ade866227.jpg', 'adssad', 9, 0, 0),
(346, '51022a3c4979bb3dfe61274f0c9cd242.png', 'asdasd', 9, 0, 0),
(347, 'db8afee990e3aeb38a522d6699948a39.png', 'acasc', 9, 0, 0),
(348, '1c7e4e9cb526c2a87b92fa1acb20d86a.png', 'sfdsdfsdfsdf', 9, 0, 0),
(351, '1fbeb02533ef3ef09b447e687d203fa5.png', 'egdgsg', 9, 0, 0),
(354, '6e34262c790d1f9bb8126b4af0d2e487.png', 'Salut', 9, 0, 0),
(355, '27a0e58ecdf31cc95b22a196e66f2372.jpg', 'Eh ui', 9, 0, 0),
(356, 'fd9df488def9dcd2206d5d667b02fbe6.jpg', 'Salut c\'est moi', 9, 0, 0);

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
(9, 'zokoy', 'tfourgeux42@gmail.com', 'dd0f151b03bb5c53e5981c109f5e5535dd75d68a57a1f4e45fe13da1a552f7b512cd00b0f5e4ad6164b318d6246d235d0490d454706179adf6f5ddbfc0cb7931', '7ea96f4a9b396617fd8de846cebac03c', 1, '', 1),
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
(57, 'usidowfhw', 'tefourge@student.42.fr', '474cfecaf9f7306a87fe1c8b107626e046cc2b208f6682cc00ffbbd455dc2f5e18bdefc860705f274399e8a3d4da1a64e59336d4ac8a6ac3bfe2cc7e483d612f', '', 1, 'dd8603cf704b6e425a5f7a3c41a198b1', 0),
(58, 'salutoui', 'tefourge@student.42.fr', 'dd0f151b03bb5c53e5981c109f5e5535dd75d68a57a1f4e45fe13da1a552f7b512cd00b0f5e4ad6164b318d6246d235d0490d454706179adf6f5ddbfc0cb7931', '', 1, '87df03f15de8dc7e1b79f442f16fd335', 1),
(59, 'sdsadadad', 'tefourge@student.42.fr', 'dd0f151b03bb5c53e5981c109f5e5535dd75d68a57a1f4e45fe13da1a552f7b512cd00b0f5e4ad6164b318d6246d235d0490d454706179adf6f5ddbfc0cb7931', '', 1, 'a97e4acd7fee4608f8c4715aa4a556c2', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `opinion`
--
ALTER TABLE `opinion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

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
