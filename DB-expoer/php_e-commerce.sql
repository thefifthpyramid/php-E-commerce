-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 25 nov. 2022 à 05:16
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_e-commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `sort` int(11) NOT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT 0,
  `allow_comment` tinyint(4) NOT NULL DEFAULT 0,
  `allow_ads` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `sort`, `visibility`, `allow_comment`, `allow_ads`) VALUES
(2, 'Jayme Harrell', 'Sit excepteur aliqu', 34, 0, 0, 0),
(3, 'Ariel Cantu', 'Debitis porro do mol', 49, 0, 0, 0),
(4, 'TaShya Barrera', 'At est consectetur', 32, 0, 1, 0),
(5, 'Levi Bridges', 'Officiis eiusmod mod', 73, 1, 0, 1),
(6, 'Akeem Molina', 'Elit corporis culpa', 89, 1, 0, 0),
(7, 'Hoyt Reid', 'Et eu incidunt est ', 28, 0, 1, 0),
(8, 'Rigel Parsons', 'Consectetur aut ut a', 40, 0, 0, 1),
(9, 'Ali Weber', 'Ullam optio quia co', 55, 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `add_date` date NOT NULL,
  `country_made` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` smallint(6) NOT NULL,
  `approve` tinyint(4) NOT NULL DEFAULT 0,
  `cat_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `add_date`, `country_made`, `status`, `image`, `rating`, `approve`, `cat_id`, `member_id`) VALUES
(2, 'Carla Bailey', 'Ullam aliqua In ven', '212', '2022-11-24', 'In eius dolorem expe', 4, 'imsge', 1, 0, 9, 49),
(3, 'Justin Hamilton', 'Duis reprehenderit f', '291', '2022-11-24', 'Qui id illo maxime ', 1, 'imsge', 2, 0, 9, 54),
(4, 'Felix Mcguire', 'Esse labore ipsam ei', '16', '2022-11-24', 'Cum ut exercitatione', 2, 'imsge', 0, 0, 8, 20),
(6, 'Kuame Garza', 'Quae cupidatat sed e', '559', '2022-11-24', 'Eum ex asperiores es', 2, 'imsge', 4, 0, 6, 42),
(7, 'Helen Meyers', 'Veniam id ad in vol', '233', '2022-11-24', 'Minus irure tempor i', 0, 'imsge', 0, 0, 5, 51),
(8, 'Mira Kirby', 'Fugiat minima atque', '236', '2022-11-24', 'Ex non autem asperio', 2, 'imsge', 3, 0, 9, 36),
(9, 'Justina Daugherty', 'Consectetur quibusda', '591', '2022-11-24', 'Dolorem veniam volu', 2, 'imsge', 1, 0, 4, 41),
(10, 'Noelle Ramirez', 'Incidunt ipsa omni', '130', '2022-11-24', 'Quaerat ea in sit am', 2, 'imsge', 5, 0, 4, 47);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `groupID` int(11) NOT NULL DEFAULT 0,
  `Reg_Status` int(11) NOT NULL DEFAULT 0,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `email`, `fullName`, `groupID`, `Reg_Status`, `Date`) VALUES
(1, 'ahmed', '8cb2237d0679ca88db6464eac60da96345513964', 'admin@outlook.com', 'Ahmed Ali Mohammed', 1, 1, '2022-11-18'),
(8, 'noriqyki', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'leme@mailinator.com', 'Fletcher Molina', 0, 1, '2022-11-18'),
(11, 'Mohammed', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'Mohamed@mailinator.com', 'Fletcher Molina', 0, 1, NULL),
(13, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', 0, 1, NULL),
(14, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', 0, 1, NULL),
(15, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', 0, 0, NULL),
(16, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', 0, 0, NULL),
(17, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', 0, 0, NULL),
(18, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', 0, 0, NULL),
(19, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', 0, 0, NULL),
(20, 'diwiha', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'filuzawek@mailinator.com', 'Marny Marshall', 0, 0, NULL),
(21, 'ridig', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'pevafus@mailinator.com', 'Xanthus Gordon', 0, 0, NULL),
(22, 'rysaqecozi', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'tosenaduwo@mailinator.com', 'Aurora Raymond', 0, 0, NULL),
(23, 'Ahmed Alii Klay', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'xibeqy@mailinator.com', 'Julie Baker', 0, 0, '2022-11-30'),
(24, 'Ahmed Mohammed', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'bytel@mailinator.com', 'Leah Farley', 0, 0, '2022-11-09'),
(25, 'zadatiha nor al deen', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'vyjos@mailinator.com', 'Cole Vega', 0, 1, '2022-11-09'),
(26, 'jyfem', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'nupy@mailinator.com', 'Ferdinand Conner', 0, 1, '2022-11-16'),
(27, 'dasize', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'sasuve@mailinator.com', 'Alfreda Byers', 0, 1, '2022-11-16'),
(28, 'tososedih', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'huqybujofo@mailinator.com', 'Abel Grant', 0, 1, '2022-11-16'),
(29, 'muqefup', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'hawelofy@mailinator.com', 'Tatyana Cherry', 0, 1, '2022-11-16'),
(30, 'dozuwi', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'newyqyxozo@mailinator.com', 'Kelly Morris', 0, 1, '2022-11-21'),
(31, 'nuzubo', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'mure@mailinator.com', 'Dominic Richards', 0, 1, '2022-11-21'),
(32, 'baqymu2', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'tomaqyhe@mailinator.com', 'Nissim Ferrell', 0, 1, '2022-11-21'),
(33, 'buwazyniwia', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'taovyqarygi@mailinator.com', 'Cora Long', 0, 1, '2022-11-21'),
(34, 'bilozo', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'kuhi@mailinator.com', 'Cara Ruiz', 0, 1, '2022-11-21'),
(35, 'hefobybibu', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'tewatoj@mailinator.com', 'Phoebe Blackwell', 0, 1, '2022-11-21'),
(36, 'gunegisaci', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'wosud@mailinator.com', 'Hiram Kelley', 0, 1, '2022-11-21'),
(37, 'dalyfajifa', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'dihen@mailinator.com', 'Melodie Burks', 0, 1, '2022-11-21'),
(38, 'caxoramym', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'doce@mailinator.com', 'Belle Harrington', 0, 1, '2022-11-21'),
(39, 'dijikezon', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'sykanafaj@mailinator.com', 'Maya Hall', 0, 1, '2022-11-21'),
(40, 'tegywi', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'bunu@mailinator.com', 'Daniel Lewis', 0, 1, '2022-11-21'),
(41, 'decusuli', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'diqali@mailinator.com', 'Yoko Vasquez', 0, 1, '2022-11-21'),
(42, 'jaduryjon', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'welikoze@mailinator.com', 'Lacey Riggs', 0, 1, '2022-11-21'),
(43, 'doquqob', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'doduf@mailinator.com', 'Kyra Hebert', 0, 1, '2022-11-21'),
(44, 'xirehunaf', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jysofe@mailinator.com', 'Stuart Chase', 0, 1, '2022-11-21'),
(45, 'hisajox', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'hepo@mailinator.com', 'Nero Hutchinson', 0, 1, '2022-11-21'),
(46, 'ponehogub', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'pakepe@mailinator.com', 'Lavinia Albert', 0, 1, '2022-11-21'),
(47, 'cerahyb', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'qykimuj@mailinator.com', 'Emily Hardin', 0, 1, '2022-11-21'),
(48, 'gomulu', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'lewyk@mailinator.com', 'Zephr Dunn', 0, 1, '2022-11-21'),
(49, 'lyxecozyze', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'didemuguv@mailinator.com', 'Lisandra Bright', 0, 1, '2022-11-21'),
(50, 'juretic', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'lebosadaxi@mailinator.com', 'Chaim Rodriquez', 0, 1, '2022-11-21'),
(51, 'gutana', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'henoganyb@mailinator.com', 'Fulton Gould', 0, 0, '2022-11-21'),
(52, 'nuquw', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'kirab@mailinator.com', 'April Randall', 0, 0, '2022-11-21'),
(54, 'AHMED', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'tivuza@mailinator.com', 'Athena Buckner', 0, 1, '2022-11-21'),
(100, 'Ali Ahmed', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'kekibulyq@mailinator.com', 'Vaughan Jacobson', 0, 0, '2022-11-21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_1` (`member_id`),
  ADD KEY `cat_1` (`cat_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `member_1` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
