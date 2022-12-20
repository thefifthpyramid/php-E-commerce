-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 20 déc. 2022 à 07:38
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
  `parent` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `visibility` tinyint(4) NOT NULL DEFAULT 0,
  `allow_comment` tinyint(4) NOT NULL DEFAULT 0,
  `allow_ads` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent`, `sort`, `visibility`, `allow_comment`, `allow_ads`) VALUES
(107, 'Cars', 'Est id provident il', 0, 36, 1, 1, 0),
(108, 'Phone', 'Cell Phone', 0, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `comment_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `add_date` date NOT NULL,
  `country_made` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `product_cover` varchar(255) NOT NULL,
  `sub_images` text NOT NULL,
  `rating` smallint(6) NOT NULL,
  `approve` tinyint(4) NOT NULL DEFAULT 0,
  `cat_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `tags` text NOT NULL,
  `component` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `add_date`, `country_made`, `status`, `product_cover`, `sub_images`, `rating`, `approve`, `cat_id`, `member_id`, `tags`, `component`) VALUES
(47, 'Crossover', 'Consectetur volupta', '1000000', '2022-12-09', 'Aut id delectus eli', 1, '6297250__8027321___960x015.jpg', '0x019.jpg|0x029.jpg|400x05.jpg|960x015.jpg', 3, 1, 107, 1, '', 'new_arrivals'),
(48, 'Convertible', 'Pariatur Quae fuga', '478', '2022-12-09', 'Voluptatum molestiae', 1, '7307365__6963583___960x014.jpg', '960x03.jpg|960x04.jpg|960x013.jpg|960x014.jpg', 4, 1, 107, 1, '', 'best_sellers'),
(49, 'Colt Wooten', 'Corporis consectetur', '39', '2022-12-09', 'Voluptatem maxime om', 1, '7548951__2719086___960x020.jpg', '960x0.jpg|960x010.jpg|960x011.jpg|960x020.jpg', 3, 1, 107, 1, '', 'new_arrivals'),
(52, 'Kelsey Sandoval', 'Aut incididunt occae', '989', '2022-12-09', 'Nostrum aliquid eu e', 1, '9346879__7601476___960x0.jpg', '0x05.jpg|0x023.jpg|1.jpg|960x0.jpg', 5, 1, 107, 19, 'Qui enim tempore re', 'new_arrivals'),
(53, 'iPhone 14 Pro Max', 'Dolorum est a cum ne', '438', '2022-12-10', 'Sed accusantium quis', 2, '9941671__3224287___71QU1-kvp0L._AC_SX679_.jpg', '61fUC+17f8L._AC_SX679_.jpg|71QU1-kvp0L._AC_SX679_.jpg', 0, 1, 108, 32, 'Ut praesentium archi', 'new_arrivals'),
(54, 'Thor Good', 'Et accusantium exerc', '768', '2022-12-10', 'Est tempor beatae re', 2, '4596929__5059557___41D3TwTi76L._AC_.jpg', '41aQXQRXJ9L._AC_.jpg|41cN-CAGz3L._AC_.jpg|41D3TwTi76L._AC_.jpg', 0, 1, 108, 38, 'Labore dolorem persp', 'new_arrivals'),
(55, 'Sheila Wiggins', 'Architecto et cillum', '484', '2022-12-10', 'Molestias amet maio', 1, '6509601__3722264___41iLbanhcTL.jpg', '41froGV6kcL._AC_.jpg|41Gc0zjLPqL._AC_SY1000_.jpg|41iLbanhcTL.jpg', 0, 1, 108, 27, 'Asperiores lorem odi', 'new_arrivals'),
(56, 'Chandler Chen', 'Dolore eos omnis po', '943', '2022-12-10', 'Dolore et in labore ', 1, '9792651__1194507___41mY6R0MqKL._AC_SY580_.jpg', '41j1uYREGhL._SS400_.jpg|41lHHD6iD1L._AC_.jpg|41mY6R0MqKL._AC_SY580_.jpg', 0, 1, 108, 8, 'Corrupti fuga Reru', 'new_arrivals'),
(57, 'Constance Ball', 'Saepe voluptatem lab', '690', '2022-12-10', 'Blanditiis esse dign', 2, '5529486__5533968___41zBg7ng-LL._AC_SY780_.jpg', '41WadDQ1k3L._AC_SY1000_.jpg|41YNaNTqJoL._AC_.jpg|41zBg7ng-LL._AC_SY780_.jpg', 0, 1, 108, 39, 'In optio vel unde o', 'new_arrivals'),
(58, 'Pearl Battle', 'Voluptas consequatur', '524', '2022-12-10', 'Dignissimos aut eos ', 1, '3177504__8118166___61D84NtVgVL._AC_SR263263_QL70_.jpg', '41zfcuozuWL._AC_SR300300.jpg|51zTCZf4fzL._AC_SY1000_.jpg|61D84NtVgVL._AC_SR263263_QL70_.jpg', 0, 1, 108, 122, 'Amet aute maxime no', 'new_arrivals'),
(59, 'Judah Holt', 'Aliquam repudiandae ', '356', '2022-12-10', 'Iusto occaecat tempo', 4, '1847724__9733288___image6.jpeg', 'image4.jpeg|image5.jpeg|image6.jpeg', 0, 1, 108, 40, 'Autem hic deserunt m', 'new_arrivals'),
(60, 'Brooke Mcleod', 'Officia reprehenderi', '610', '2022-12-10', 'Tempora beatae amet', 2, '6221184__5895648___images34.jpg', 'images31.jpg|images32.jpg|images34.jpg', 0, 0, 108, 37, 'Similique sapiente i', 'new_arrivals'),
(61, 'Aimee Sexton', 'Reprehenderit id qui', '952', '2022-12-10', 'Ipsum ipsum dolor d', 2, '4665359__6327600___images6.jpg', 'images4.jpg|images5.jpg|images6.jpg', 0, 0, 108, 114, 'Voluptas sunt atque', 'best_sellers'),
(62, 'Jermaine Kim', 'Natus enim sapiente ', '403', '2022-12-10', 'Omnis nisi voluptas ', 3, '3099376__8470730___71u7mwY7FVL.jpg', '71QU1-kvp0L._AC_SX679_.jpg|71TT922jjL._AC_SL1500_.jpg|71u7mwY7FVL.jpg', 0, 1, 108, 102, 'Ut et temporibus exp', 'best_sellers'),
(63, 'Kalia Moran', 'In omnis qui debitis', '885', '2022-12-10', 'Repudiandae corrupti', 4, '5405786__7131019___81xvGbBFNhL._SX522_.jpg', '81spjQN-VL._AC_UL330_SR330330_.jpg|81UT07JsBqL._AC._SR360460.jpg|81xvGbBFNhL._SX522_.jpg', 0, 1, 108, 41, 'Aliquid deserunt ut ', 'best_sellers'),
(64, 'Driscoll Lee', 'Aut amet aut culpa', '5', '2022-12-11', 'Et ex aut qui eligen', 3, '7566691__1202923___image7.jpeg', 'image5.jpeg|image6.jpeg|image7.jpeg', 0, 1, 108, 42, 'Vel cum ab enim aute', 'first_banner'),
(65, 'Micah Lowe', 'Repudiandae molestia', '224', '2022-12-11', 'Quo neque sint quis', 0, '6751726__1987645___41Gc0zjLPqL._AC_SY1000_.jpg', '41fe1ZUBZ9L._AC_.jpg|41froGV6kcL._AC_.jpg|41Gc0zjLPqL._AC_SY1000_.jpg', 0, 1, 108, 33, 'Molestias repudianda', 'first_banner'),
(66, 'Teegan Manning', 'Sed molestias sint d', '196', '2022-12-11', 'Dolor nostrud alias ', 4, '4323803__8371734___61iutq6CRYL._AC_SS300_.jpg', '61fUC+17f8L._AC_SX679_.jpg|61hj2b6hVJL._AC_UL330_SR330330_.jpg|61iutq6CRYL._AC_SS300_.jpg', 0, 1, 108, 32, 'Ut est voluptate la', 'first_banner'),
(67, 'Abel Spence', 'Similique iste delen', '300', '2022-12-13', 'Porro in sunt ut vo', 4, '9225876__1926085___images6.jpg', 'image8.jpeg|image18.jpeg|image28.jpeg|images6.jpg', 0, 1, 108, 49, 'Et sit distinctio L', 'best_sellers'),
(68, 'Pearl Gilliam', 'At labore consequat', '716', '2022-12-13', 'Quis in vero laborio', 0, '6837958__1611863___Flagship_s21.jpg', 'Flagship_huaweip40.jpg|Flagship_iPhone12.jpg|Flagship_s21.jpg', 0, 1, 108, 123, 'Quidem assumenda qui', 'second_banner'),
(69, 'Arthur Nguyen', 'Odio irure molestias', '980', '2022-12-13', 'Iusto quo alias quia', 1, '9246522__5547443___61fUC+17f8L._AC_SX679_.jpg', '51ZHzpeK3UL._AC_SY580_.jpg|51zTCZf4fzL._AC_SY1000_.jpg|61D84NtVgVL._AC_SR263263_QL70_.jpg|61fUC+17f8L._AC_SX679_.jpg', 0, 1, 108, 102, 'Impedit eius aut de', 'second_banner');

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
  `avatar` varchar(255) NOT NULL,
  `groupID` int(11) NOT NULL DEFAULT 0,
  `Reg_Status` int(11) NOT NULL DEFAULT 0,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `email`, `fullName`, `avatar`, `groupID`, `Reg_Status`, `Date`) VALUES
(1, 'ahmed', '8cb2237d0679ca88db6464eac60da96345513964', 'admin@outlook.com', 'Ahmed Ali Mohammed', '96237__IMG_20220208_025857_304.jpg', 1, 0, '2022-11-18'),
(8, 'noriqyki', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'leme@mailinator.com', 'Fletcher Molina', '96237__IMG_20220208_025857_304.jpg', 0, 1, '2022-11-18'),
(13, 'vuhuxa', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'sanopeleza@mailinator.com', 'Sage Goodman', '96237__IMG_20220208_025857_304.jpg', 0, 1, NULL),
(14, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', '96237__IMG_20220208_025857_304.jpg', 0, 1, NULL),
(15, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', '', 0, 1, NULL),
(16, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', '', 0, 0, NULL),
(17, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', '', 0, 0, NULL),
(18, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', '', 0, 0, NULL),
(19, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jibif@mailinator.com', 'Aubrey Russell', '', 0, 0, NULL),
(20, 'ahmed', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'filuzawek@mailinator.com', 'Marny Marshall', '', 0, 0, NULL),
(21, 'hyhud', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'pevafus@mailinator.com', 'Xanthus Gordon', '', 0, 0, NULL),
(22, 'rysaqecozi', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'tosenaduwo@mailinator.com', 'Aurora Raymond', '', 0, 0, NULL),
(23, 'Ahmed Alii Klay', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'xibeqy@mailinator.com', 'Julie Baker', '', 0, 0, '2022-11-30'),
(24, 'Ahmed Mohammed', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'bytel@mailinator.com', 'Leah Farley', '', 0, 0, '2022-11-09'),
(25, 'zadatiha nor al deen', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'vyjos@mailinator.com', 'Cole Vega', '', 0, 1, '2022-11-09'),
(26, 'jyfem', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'nupy@mailinator.com', 'Ferdinand Conner', '', 0, 1, '2022-11-16'),
(27, 'dasize', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'sasuve@mailinator.com', 'Alfreda Byers', '', 0, 1, '2022-11-16'),
(28, 'tososedih', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'huqybujofo@mailinator.com', 'Abel Grant', '', 0, 1, '2022-11-16'),
(29, 'muqefup', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'hawelofy@mailinator.com', 'Tatyana Cherry', '', 0, 1, '2022-11-16'),
(30, 'dozuwi', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'newyqyxozo@mailinator.com', 'Kelly Morris', '', 0, 1, '2022-11-21'),
(31, 'nuzubo', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'mure@mailinator.com', 'Dominic Richards', '', 0, 1, '2022-11-21'),
(32, 'baqymu2', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'tomaqyhe@mailinator.com', 'Nissim Ferrell', '', 0, 1, '2022-11-21'),
(33, 'buwazyniwia', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'taovyqarygi@mailinator.com', 'Cora Long', '', 0, 1, '2022-11-21'),
(35, 'hefobybibu', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'tewatoj@mailinator.com', 'Phoebe Blackwell', '', 0, 1, '2022-11-21'),
(36, 'gunegisaci', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'wosud@mailinator.com', 'Hiram Kelley', '', 0, 1, '2022-11-21'),
(37, 'dalyfajifa', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'dihen@mailinator.com', 'Melodie Burks', '', 0, 1, '2022-11-21'),
(38, 'caxoramym', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'doce@mailinator.com', 'Belle Harrington', '', 0, 1, '2022-11-21'),
(39, 'dijikezon', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'sykanafaj@mailinator.com', 'Maya Hall', '', 0, 1, '2022-11-21'),
(40, 'tegywi', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'bunu@mailinator.com', 'Daniel Lewis', '', 0, 1, '2022-11-21'),
(41, 'decusuli', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'diqali@mailinator.com', 'Yoko Vasquez', '', 0, 1, '2022-11-21'),
(42, 'jaduryjon', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'welikoze@mailinator.com', 'Lacey Riggs', '', 0, 1, '2022-11-21'),
(43, 'doquqob', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'doduf@mailinator.com', 'Kyra Hebert', '', 0, 1, '2022-11-21'),
(44, 'xirehunaf', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jysofe@mailinator.com', 'Stuart Chase', '', 0, 1, '2022-11-21'),
(45, 'hisajox', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'hepo@mailinator.com', 'Nero Hutchinson', '', 0, 1, '2022-11-21'),
(46, 'ponehogub', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'pakepe@mailinator.com', 'Lavinia Albert', '', 0, 1, '2022-11-21'),
(47, 'cerahyb', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'qykimuj@mailinator.com', 'Emily Hardin', '', 0, 1, '2022-11-21'),
(48, 'gomulu', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'lewyk@mailinator.com', 'Zephr Dunn', '', 0, 1, '2022-11-21'),
(49, 'lyxecozyze', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'didemuguv@mailinator.com', 'Lisandra Bright', '', 0, 1, '2022-11-21'),
(50, 'juretic', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'lebosadaxi@mailinator.com', 'Chaim Rodriquez', '', 0, 1, '2022-11-21'),
(51, 'gutana', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'henoganyb@mailinator.com', 'Fulton Gould', '', 0, 0, '2022-11-21'),
(52, 'nuquw', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'kirab@mailinator.com', 'April Randall', '', 0, 0, '2022-11-21'),
(54, 'AHMED', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'tivuza@mailinator.com', 'Athena Buckner', '', 0, 1, '2022-11-21'),
(100, 'Ali Ahmed', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'kekibulyq@mailinator.com', 'Vaughan Jacobson', '', 0, 0, '2022-11-21'),
(102, 'klay2', '8cb2237d0679ca88db6464eac60da96345513964', 'AhmedAliKlay@outlook.com', 'Ahmed Ali Klay', '', 0, 1, '2022-11-30'),
(103, 'syhonabuc', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'zyxosonyj@mailinator.com', 'Dolan Blake', '', 0, 0, '2022-12-02'),
(104, 'wehybuze', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'qyqy@mailinator.com', 'Eliana Todd', '', 0, 0, '2022-12-02'),
(105, 'qupewore', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'vecoqowocy@mailinator.com', 'Nichole Ratliff', '', 0, 0, '2022-12-02'),
(106, 'becefusu', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'zeneg@mailinator.com', 'Wyoming Whitley', '', 0, 0, '2022-12-02'),
(107, 'pycofuliji', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'nekohis@mailinator.com', 'Alexander Hendrix', '', 0, 0, '2022-12-02'),
(108, 'zywexyz', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'noped@mailinator.com', 'Denise Hatfield', '', 0, 0, '2022-12-02'),
(109, 'zomuf', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'kisa@mailinator.com', 'Christine Romero', '', 0, 0, '2022-12-02'),
(111, 'alert(1)', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'kitovamuto@mailinator.com', 'alert(1)', '', 0, 0, '2022-12-02'),
(112, '?>alert(1);', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'kinejuhyc@mailinator.com', 'Amaya Daniel', '', 0, 0, '2022-12-02'),
(113, 'capygocur', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'hasogewoby@mailinator.com', 'Karen Fleming', '', 0, 0, '2022-12-02'),
(114, 'vecewucy', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'kyrizaly@mailinator.com', 'unKnown', '', 0, 0, '2022-12-03'),
(115, 'ahmed', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'dyfi@mailinator.com', 'unKnown', '', 0, 0, '2022-12-03'),
(116, 'sysasateg', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'joki@mailinator.com', 'unKnown', '', 0, 0, '2022-12-03'),
(117, 'xinare', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'fevemy@mailinator.com', 'Allen Weeks', '', 0, 0, '2022-12-08'),
(118, 'xydonoleb', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'genipy@mailinator.com', 'Harriet Boyle', '', 0, 0, '2022-12-08'),
(119, 'tiqohu', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'dupynyle@mailinator.com', 'Henry Horton', '96237__IMG_20220208_025857_304.jpg', 0, 0, '2022-12-08'),
(120, 'Mazen', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'zedo@mailinator.com', 'Julie Cantrell', '96237__IMG_20220208_025857_304.jpg', 0, 0, '2022-12-08'),
(121, 'Last User', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'vupigiwuju@mailinator.com', 'unKnown', '8941380__4929395___IMG_20220704_171314.jpg', 0, 0, '2022-12-08'),
(122, 'Kimo', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'jewu@mailinator.com', 'unKnown', '242700__7982981___IMG20220418123024.jpg', 0, 0, '2022-12-09'),
(123, 'Kimo2', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'luzeqesok@mailinator.com', 'unKnown', '5523223__1183703___IMG20220418123024.jpg', 0, 0, '2022-12-09'),
(124, 'pesuc', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'tovu@mailinator.com', 'unKnown', '683629__9214119___CamScanner 01-07-2022 19.52_3.jpg', 0, 0, '2022-12-09'),
(125, 'tojobunib', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'junubafe@mailinator.com', 'unKnown', '6052063__6719825___IMG_20211213_234709_811.jpg', 0, 0, '2022-12-09'),
(126, 'Good test', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'dysewaxis@mailinator.com', 'unKnown', '4304094__9851015___FB_IMG_16271136825688228.jpg', 0, 0, '2022-12-09');

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
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_comment` (`item_id`),
  ADD KEY `comment_user` (`user_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_comment` FOREIGN KEY (`item_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `member_1` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
