-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 16 nov. 2022 à 07:17
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
(7, 'kesitir', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'bisev@mailinator.com', 'Keiko Allen', 0, 1, '2022-11-09'),
(8, 'noriqyki', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'leme@mailinator.com', 'Fletcher Molina', 0, 1, '2022-11-18'),
(9, 'noriqyki', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'leme@mailinator.com', 'Fletcher Molina', 0, 1, NULL),
(10, 'noriqyki', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'leme@mailinator.com', 'Fletcher Molina', 0, 1, NULL),
(11, 'noriqyki', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'leme@mailinator.com', 'Fletcher Molina', 0, 1, NULL),
(12, 'noriqyki', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'leme@mailinator.com', 'Fletcher Molina', 0, 0, NULL),
(13, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', 0, 1, NULL),
(14, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', 0, 0, NULL),
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
(29, 'muqefup', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'hawelofy@mailinator.com', 'Tatyana Cherry', 0, 1, '2022-11-16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
