-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 19 jan. 2022 à 08:05
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `commentaire` longtext NOT NULL,
  `auteur` varchar(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alt` text NOT NULL,
  `source` varchar(255) NOT NULL,
  `titre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE IF NOT EXISTS `cv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `fichier` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `chapo` longtext NOT NULL,
  `contenu` longtext NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `content_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `titre`, `chapo`, `contenu`, `auteur`, `date`, `content_id`) VALUES
(1, 'Devenir développeur PHP', 'Aussi connu sous le nom de développeur informatique, développeur web ou programmeur, le développeur PHP s’inscrit dans les métiers d’avenir.<br> Il intervient directement dans le processus de création des sites internet et du développement web. La visibilité sur internet est indispensable pour espérer réussir et devenir une entreprise pérenne', '<h3>Description du métier</h3> <br> Objectifs:<br> Le but principal du développeur PHP est de créer ou d’améliorer des sites internet en les rendant plus dynamiques et responsives.<br> Pour cela, il utilise le langage de programmation PHP. En fonction de son projet, il utilisera le PHP sans frameworks, avec framework ou avec framework en open source (Symfony, Zend…).<br>Son intervention a pour ambition d’améliorer l’UX ou l’expérience utilisateur en facilitant l’usage du site internet. Il apporte des solutions techniques comme un changement sur l’interface ou l’ajout de fonctionnalités.<br>Missions :<br> Avant d’apporter des améliorations aux pages web, il doit comprendre les objectifs de l’entreprise et les besoins du client en consultant le cahier des charges. Grâce à son expertise, il peut participer à la réflexion des directives. Après une première analyse, il proposera des solutions innovantes et des développements nécessaires. Il pourra aussi bien s’occuper du front que du back office du site internet. Il utilisera le CMS (Content Management System, en français Système de Gestion de Contenu) ainsi que MYSQL et DevOps pour favoriser et améliorer la gestion de contenu.<br> Les méthodes agiles, plébiscitées par les grandes entreprises, sont d’autres techniques que le développeur PHP peut utiliser. Après la mise en route du site, il intervient également dans sa maintenance. Il s’occupe du suivi du site et agit en cas de bug ou de mise à jour à réaliser. Il travaillera étroitement avec le chef de projet ou le directeur technique du projet afin d’être en raccord avec les attentes de l’entreprise. <br>Le développeur doit aussi travailler avec les rédacteurs web, le chargé de la communication ainsi que les graphistes et les intégrateurs web afin de rendre possible les amélioration à mettre en place. Ce sont eux qui travaillent sur la partie visible (frontend) que les utilisateurs voient en premier. Il fait partie intégrante de l’équipe informatique.<br>Où travailler ? Le développeur peut être salarié dans une agence digitale, une agence de communication digitale ou une agence web. Il a la possibilité d\'avoir le statut d\'autoentrepreneur et ainsi proposer ses propres services. Les compétences requises Outre les compétences techniques et la maîtrise des langages de programmation et des outils web, le métier de développeur inclut d’autres qualités : Avoir un sens du relationnel : c’est un travail en équipe que le développeur effectue. Il ne peut pas être seul sur un projet de transformation. Ainsi, il doit pouvoir travailler en équipe, c’est-à-dire, être patient, faire des compromis et écouter l’autre. <br>Goût du challenge : son travail intervient dans le cadre d’une amélioration et dans l’attente de meilleurs résultats. Il doit pouvoir être prêt à relever des défis ou des exigences de la part du client ou de son entreprise.<br>Savoir s’adapter : les objectifs vont être différents, notamment si le développeur travaille en agence ou en freelance. Les clients ont tous des objectifs qui diffèrent ainsi il doit pouvoir s’adapter aussi bien aux objectifs qu’à l’environnement de travail', 'Mickael', '2022-01-18 16:46:02', NULL),
(2, 'Les 5 conseils pour améliorer votre logique en programmation', 'La logique dans la programmation est une clé essentielle pour être un bon développeur. Peut-être que, selon votre quotidien, si vous utiliserez ou non plus d’algorithmes. Si vous êtes un concepteur de sites Web, vous ne ferez probablement pas face à des algorithmes complexes, mais si vous êtes un développeur front-end, peut-être un peu plus et si vous êtes un développeur back-end, c’est beaucoup plus.', '1. Diviser pour régner\\r\\nLes 5 conseils pour améliorer votre logique en programmation\\r\\nDiviser les problèmes complexes en des problèmes plus simples, dans le monde de programmation, les programmeurs sont confrontés à des problèmes complexes dans leur travail quotidien. Il est très important que les programmeurs obtiennent d’abord une image visuelle du problème. La visualisation est possible uniquement lorsque le programmeur a bien compris la complexité. Une fois la visualisation terminée, le programmeur peut utiliser des outils graphiques pour obtenir une image réelle. Alternativement, des notes simples avec des diagrammes. Ensuite, il devient important que les diagrammes soient divisés en modules plus simples ou en problèmes de base. Une fois cette étape terminée, la construction logique est modulaire et facilement réalisable.\\r\\n\\r\\n2. Regardez le code des autres\\r\\nLes 5 conseils pour améliorer votre logique en programmation\\r\\nSi vous travaillez avec d’autres programmeurs, essayer de pratiquer la revu de code et comprendre comment ils écrivent sa logique. Cet exercice aide à faire correspondre vos capacités de réflexion logique avec la pensée logique avec les autres. Utilisez le refactoring dans certains IDE pour comprendre le flux de code. Utilisez un débogueur pour déboguer le code, voir les valeurs transmises, voir où les conditions échouent et vérifier comment contrôler les flux. Si vous ne comprenez pas le code, cela signifie que le code est mal écrit. Une fois que vous commencez à comprendre le code des autres, vous pouvez réfléchir à la manière d’améliorer ces codes, ce qui est encore un autre exercice pour améliorer vos capacités de réflexion logique. Il est préférable de commencer par un projet open-source par exemple sur Github.\\r\\n\\r\\n3. Pratiquez Pratiquez, Pratiquez ….\\r\\nLes 5 conseils pour améliorer votre logique en programmation\\r\\nLe point le plus important est la pratique. Un algorithme n’est rien d’autre qu’un ensemble ordonné et fini d’opérations que nous réalisons dans le seul but de trouver une solution à un problème. Donc, essayez de pratiquer des problèmes simples pour obtenir une meilleure logique.\\r\\n\\r\\n4. Apprendre à résoudre des algorithmes\\r\\nLes 5 conseils pour améliorer votre logique en programmation\\r\\nApprendre les algorithmiques vous donnera une meilleur vison pour concentrer vos problèmes. Lorsque vous essayez de résoudre n’importe quel type de problème, comprenez d’abord le problème, analysez les solutions et méthodes possibles qui pourraient être utilisées pour les résoudre, trouvez les éléments les plus pertinent du problème et résoudre le problème. Vous pouvez jouer à des jeux comme les échecs et pratiquer des mathématiques.\\r\\n\\r\\n5. Commencer à programmer\\r\\nLes 5 conseils pour améliorer votre logique en programmation\\r\\nFinalement, commencer à programmer avec le langage de programmation que vous aimez.  Pour devenir un bon programmeur, vous devez faire face aux erreurs sur votre console. Résoudre des énigmes de programmation courantes comme le palindrome, inversez une chaîne, triez, convertissez des nombres en chaînes et bien plus encore.\'', 'WayToLearnX', '2022-01-18 16:51:38', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `resume` longtext NOT NULL,
  `lien` varchar(255) NOT NULL,
  `content_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `titre`, `resume`, `lien`, `content_id`) VALUES
(1, 'Blog développé en PHP.', 'Ce blog est l\'un des projets de ma formation \"Développeur d\'applications PHP/Symfony\"', 'Vous êtes sur le projet en question ! Bonne navigation', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
