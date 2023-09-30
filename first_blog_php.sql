-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230411.22ac8c9bec
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Sam. 30 Sep. 2023 à 12:37
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `first_blog_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `idComment` int(11) NOT NULL,
  `contentComment` text NOT NULL,
  `validateComment` tinyint(1) NOT NULL DEFAULT 0,
  `dateLastUpdateComment` datetime NOT NULL DEFAULT current_timestamp(),
  `postComment` int(11) NOT NULL,
  `userComment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`idComment`, `contentComment`, `validateComment`, `dateLastUpdateComment`, `postComment`, `userComment`) VALUES
(98, 'bonne article', 1, '2023-09-21 15:17:43', 97, 32),
(99, 'c\'est utile', 1, '2023-09-21 15:23:57', 97, 32),
(100, 'tres bonne article123', 1, '2023-09-27 20:15:09', 97, 41),
(101, 'DDGHJKLOIUYTGFGAZE123', 1, '2023-09-28 00:57:16', 104, 41),
(102, '1256', 1, '2023-09-28 00:57:38', 104, 41),
(103, '1256', 0, '2023-09-28 00:59:01', 104, 41),
(104, 'aaaaaa', 0, '2023-09-30 09:38:18', 104, 41);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `idPost` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `dateLastUpdatePost` datetime NOT NULL DEFAULT current_timestamp(),
  `userPost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`idPost`, `title`, `chapo`, `content`, `auteur`, `dateLastUpdatePost`, `userPost`) VALUES
(93, 'Coronavirus (COVID-19)', 'Chiffres clés, interviews d\'experts, questions-réponses, outils de prévention... tout savoir sur le coronavirus (SARS-CoV-2), COVID-19, son évolution en France et dans le Monde, et l’action de Santé publique France.', 'Depuis l’émergence du COVID-19 il y a plus de trois ans, la surveillance épidémiologique de Santé publique France repose sur un dispositif multi-sources qui a permis de produire de manière réactive de nombreux indicateurs de suivi de l’épidémie. A partir du 1er juillet 2023, plusieurs systèmes d’information évoluent. Ces changements interviennent dans un contexte épidémique favorable, marqué par une très faible circulation virale en France hexagonale et en Outre-mer. \r\nDepuis le 30 juin, la COVID-19 est ajoutée à la liste des maladies à déclaration obligatoire.\r\n\r\nLa mission de Santé publique France\r\nLes équipes de Santé publique France, au siège comme en région, se sont organisées pour surveiller et répondre à la crise engendrée par la propagation de la COVID-19 en France. Cette organisation s’est adaptée en fonction de l’évolution de la situation. \r\nDans cette crise sanitaire mondiale, notre rôle est de mettre en place le système de surveillance le plus adapté, de développer des outils d’information et de prévention pour les professionnels de santé, la population et les publics les plus vulnérables, et d’animer la Réserve sanitaire pour répondre aux besoins de professionnels de santé sur tout le territoire. \r\nParce que notre action est avant tout au service de la population et que notre volonté est d’informer en continu et en toute transparence, les indicateurs produits pour suivre l’évolution de l’épidémie de COVID-19 sont accessibles depuis l’observatoire cartographique Géodes et publiés, chaque semaine, dans les points épidémiologiques nationaux et régionaux disponibles sur le site internet. Productions scientifiques, veille documentaire et état des connaissances, résultats des enquêtes en population et chez les professionnels de santé, outils d’information (affiches, spots vidéo et audio), ressources pour les professionnels… sont mis à disposition de tous.', 'Santé publique', '2023-09-21 14:11:06', 32),
(94, 'Opération reprise en main au ministère ukrainien de la Défense', 'Six vice-ministres ukrainiens de la Défense ont été limogés lundi. Un grand nettoyage qui intervient deux semaines après l\'arrivée du nouveau ministre de la Défense. Une bataille menée dans l\'un des ministères les plus stratégiques, et dont la corruption ', 'Limogeage en série au très stratégique ministère de la Défense. Au total, six vice-ministres de la Défense ont été remerciés, lundi 18 septembre, par le nouveau patron des lieux, Roustem Oumerov, a indiqué Oleh Nemtchinov, le secrétaire général du gouvernement ukrainien, sur Telegram. La très médiatique Hanna Maliar, qui occupait l\'un des postes de vice-ministre depuis 2021, n\'a pas échappé à ce sort.\r\n\r\nAucune raison officielle n\'a été donnée pour justifier cette décision, mais \"une complète réforme du ministère est en cours\", a affirmé le média Oukraïnska Pravda en s\'appuyant sur une source anonyme au gouvernement.\r\n\r\nNettoyer les écuries d\'Oleksiï Reznikov\r\nCette précision suggère que les limogeages feraient partie de l\'effort de Roustem Oumerov de nettoyer les écuries d\'Oleksiï Reznikov, son prédécesseur englué dans une série de scandales de corruption.\r\n\r\nLe ministère de la Défense traîne en effet une sulfureuse réputation de nid à corrompus, et Oleksiï Reznikov était surtout accusé de ne pas avoir suffisamment sévi pour mettre un terme à ces pratiques.\r\n\r\nRoustem Oumerov, un fidèle du président Volodymyr Zelensky nommé à ce poste début septembre, chercherait ainsi à se démarquer d\'emblée.\r\n\r\nUne justification de ce grand nettoyage qui ne convainc que modérément Ryhor Nizhnikau, spécialiste de la politique ukrainienne à l\'Institut finlandais des affaires internationales : \"Une partie des vice-ministres avait été nommée récemment avec pour feuille de route de lutter contre la corruption\", souligne-t-il.\r\n\r\nD\'autres, comme Hanna Maliar, n\'ont jamais été sérieusement accusés de piocher dans la caisse, alors même qu\'ils occupent des postes médiatiquement très exposés et que leurs moindres faits et gestes sont scrutés. \"Hanna Maliar représentait le visage public du ministère et avait même été pressentie pour succéder à Oleksiï Reznikov\", souligne Ryhor Nizhnikau. ', 'Sébastian Seibt', '2023-09-21 14:25:17', 32),
(95, 'programmation', 'Le jeu vidéo «Prince of Persia» cache une histoire de famille', 'Dans «Replay», son premier roman graphique réalisé en solo, le créateur de jeux vidéo Jordan Mechner retrace une histoire qui relie des aquarelles d\'Hitler, l\'Apple II, l\'exil de son grand-père autrichien en 1938 et le célèbre jeu vidéo.', 'Vincent Brunner', '2023-09-21 14:26:46', 32),
(96, 'le guide ultime de la programmation informatique', 'Dans le siècle précédent, on considérait comme illettrés, les personnes qui ne savaient ni lire, ni écrire. Aujourd’hui, dans le monde numérique où nous vivons, il est admis que les illettrés de ce siècle sont ceux qui ne savent pas programmer. Pourquoi ?', 'Qu’est-ce que la programmation informatique ?\r\nCommençons par les bases. Qu’entend t’on par programmation informatique ? De manière générale, la programmation informatique est l’une des étapes du cycle de vie de l’obtention d’un logiciel. De façon plus précise, c’est l’écriture de ce qu’on appelle le code source d’un programme. Le programme informatique lui-même étant l’ensemble d’instructions machine qui permettent de résoudre un problème ou une tâche spécifique. C’est l’ensemble de ces instructions qu’on qualifie de « code source », et c’est leur écriture qui représente ce qu’on entend par programmation informatique.\r\nDonc lorsqu’on parle de programmation informatique, on fait référence à l’activité d’écriture d’instructions qui vont être interprétées par une machine pour exécuter une tâche ou pour résoudre un problème précis.\r\n\r\nL’activité de programmation informatique fait elle-même partie d’un cycle de vie plus global dans le développement du logiciel. Il y’a d’autres activités en amont comme le recueil de besoin, la spécification fonctionnelle, et d’autres activités en aval comme la validation fonctionnelle, et les tests unitaires. C’est l’ensemble des étape du cycle de vie de l’obtention du programme qu’on qualifie d’ingénierie logicielle (ou de développement informatique).\r\n\r\nPour écrire un programme informatique (ou logiciel), on utilise un langage informatique. Nous allons revenir plus bas sur les langages informatiques…\r\n\r\nMais, pourquoi est-il nécessaire de développer des programmes informatiques ?\r\n\r\nEn fait, vous devez comprendre que tout appareil électronique, c’est-à-dire tout appareil capable de convertir le courant électrique en signal numérique a besoin d’un logiciel (autrement dit d’un programme informatique) pour fonctionner. Dit simplement, le logiciel est une façon à l’être humain de communiquer à l’appareil l’action qu’il veut que celui-ci exécute, et surtout la façon dont il veut que cette action soit effectuée. C’est au développeur de programmer la façon dont l’action en question sera effectuée grâce à un langage informatique.\r\n\r\nEn réalité, chaque bouton sur un appareil électronique comme un ordinateur, une machine à laver, un téléphone, déclenche un programme informatique qui dit à l’appareil la tâche qu’il doit effectuer et de quelle manière il doit l’effectuer. Donc quand on parle de programmation informatique, ne voyez pas forcément les gros logiciels de type Microsoft ou Oracle. Toute action que vous pouvez programmer et qui est déclenché à la suite d’un événement (comme un clic sur un bouton, un double-clic, une diction, etc.) est un programme informatique.\r\n', 'Ammar Khaoula', '2023-09-21 14:29:17', 32),
(97, 'Festival de Cannes 2023', 'La Palme d\'Or du Festival de Cannes \"Anatomie d\'une chute\" en lice pour représenter la France aux Oscars', 'La Palme d\'or Anatomie d\'une chute, La Passion de Dodin Bouffant ou Sur les chemins noirs sont parmi les cinq films en lice pour représenter la France aux Oscars 2024, a annoncé mercredi le Centre national de la cinématographie (CNC).\r\n\r\nLe choix entre ces films afin de savoir lequel d\'entre eux représentera la France au prestigieux prix doit être fait à l\'issue d\'une commission entre producteurs, vendeurs internationaux et les distributeurs américains de chaque film présélectionné, qui doit se tenir le 21 septembre. Cette année ce sont une réalisatrice – la lauréate de la Palme d\'or 2023, Justine Triet – et quatre réalisateurs qui sont en lice.\r\n\r\nDes films présentés à Cannes\r\nQuatre de ces films (Anatomie d\'une chute de Justine Triet, Goutte d\'or de Clément Cogitore, La Passion de Dodin Bouffant – prix de la mise en scène – de Tran Anh Hung et Le Règne animal de Thomas Cailley) ont été présentés au Festival de Cannes. Le cinquième film de la sélection est Sur les chemins noirs de Denis Imbert, avec Jean Dujardin. Il a dépassé le million de spectateurs au box-office.\r\n\r\nL\'an dernier, le film Saint-Omer, doublement primé à la Mostra de Venise et réalisé par Alice Diop avait été choisi pour représenter la France aux Oscars. Le dernier film français à avoir remporté l\'Oscar du meilleur film international était Indochine de Régis Wargnier, en 1993. Titane de Julia Ducournau, représentant tricolore en 2022, n\'avait pas été présélectionné par l\'Académie des Oscars.', 'franceinfo', '2023-09-21 14:31:12', 32),
(104, 'test', '', '', 'ammar', '2023-09-27 16:36:03', 32);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mp` varchar(255) NOT NULL,
  `catchphrase` varchar(255) NOT NULL,
  `dateLastUpdate` datetime NOT NULL DEFAULT current_timestamp(),
  `validate` tinyint(1) NOT NULL DEFAULT 0,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `firstName`, `lastName`, `photo`, `email`, `mp`, `catchphrase`, `dateLastUpdate`, `validate`, `isAdmin`) VALUES
(32, 'khaoula', 'Ammar', 'images/mee1.png', 'admin@gmail.com', '$2y$10$so/.r0dRCF42RYUhxtEvaOR32ddcP3edkXwMY1Bf0eZb1U.tKIijO', 'Ammar Khaoula, le développeuse qu’il vous faut !) )', '2023-08-16 21:36:29', 1, 1),
(41, 'Khaoula', 'Ben Hadj Ali ep Ammar', '', 'ilyes@gmail.com', '$2y$10$7GPeqE8jWPgwf2WpAQVUMutSy.kDxBU3aj0CWrrz4vSczH/3HADHG', '', '2023-08-17 19:16:07', 1, 0),
(68, 'iyed', 'bha', '', 'iyed@gmail.com', '$2y$10$HNzYD3MqWCghwrNM3IHLvucjJhO7bpCCKMacrIJkbewgME9V3sIXG', '', '2023-09-27 16:58:57', 1, 0),
(69, 'Oumar', 'Ammar', '', 'omar160590@hotmail.fr', '$2y$10$ra2V95XE8OQHOE6xaCWkBOCyCcSiSN6fV13N82Fpay3xg9WMPk.tK', '', '2023-09-27 20:45:32', 0, 0),
(70, 'takoua', 'said', '', 'takoua@gmail.com', '$2y$10$ocLypD8TrQfKPpQQPuQiB.NRErnSy4c6pZ18awDO.5Pe7fQgUXuoG', '', '2023-09-30 10:42:18', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `id_Post` (`postComment`),
  ADD KEY `id_user` (`userComment`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `id_user` (`userPost`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`postComment`) REFERENCES `posts` (`idPost`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`userComment`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userPost`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
