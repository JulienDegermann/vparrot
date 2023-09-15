-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 28 août 2023 à 12:49
-- Version du serveur : 8.0.33
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parrot`
--

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

CREATE TABLE `address` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `street_number` int NOT NULL,
  `street_name` varchar(100) NOT NULL,
  `zip_code` int NOT NULL,
  `city` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `name`, `street_number`, `street_name`, `zip_code`, `city`) VALUES
(1, 'Garage Vincent Parrot', 239, 'rue des Fontaines', 31300, 'Toulouse');

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(100) NOT NULL,
  `year` int NOT NULL,
  `price` int NOT NULL,
  `mileage` int NOT NULL,
  `energy` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `year`, `price`, `mileage`, `energy`) VALUES
(33, 'Peugeot', '308', 2019, 14000, 45000, 'essence'),
(34, 'Citroen', 'C4', 2012, 4000, 200000, 'diesel'),
(35, 'Citroen', '2CV', 1948, 10000, 50000, 'essence');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `note` int NOT NULL,
  `comment` varchar(255) NOT NULL,
  `is_checked` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `note`, `comment`, `is_checked`) VALUES
(50, 86, 5, 'Très bon rapport qualité prix des services.', 1),
(51, 87, 2, 'Trop peu d\'annonces pour les occasions…', 1),
(52, 88, 4, 'Content de la voiture achetée il y a 6 mois, révisés et sans surprise. les délais un peu longs enlèvent une étoile', 1),
(53, 89, 1, 'ARNAK ! garaj a fuir a toux prit ! tro chaire et pa onet', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int NOT NULL,
  `phone` char(10) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `address_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `opening_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`id`, `phone`, `email`, `address_id`, `service_id`, `opening_id`) VALUES
(1, '0581234567', 'vincent.parrot@example.com', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `file_name` varchar(159) NOT NULL,
  `is_main` tinyint(1) NOT NULL,
  `car_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `file_name`, `is_main`, `car_id`) VALUES
(19, '64ec93a9e47cc-308.jpeg', 1, 33),
(20, '64ec941fb61fc-c4.jpeg', 1, 34),
(21, '64ec94a1187bc-2cv.jpeg', 1, 35);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` text NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `title`, `content`, `user_id`) VALUES
(43, NULL, 'Je souhaite un devis pour la courroie de distribution de ma Citroen C3, avec un contrôle général du véhicule.\r\nMerci', 90),
(44, 'Citroen 2CV 10000€', 'Je suis un grand fan de la CV et souhaite avoir plus d\'info sur son état intérieur/extérieur.\r\nmerci', 91);

-- --------------------------------------------------------

--
-- Structure de la table `openings`
--

CREATE TABLE `openings` (
  `id` int NOT NULL,
  `day` varchar(10) NOT NULL,
  `am_opening` time NOT NULL,
  `am_closure` time NOT NULL,
  `pm_opening` time NOT NULL,
  `pm_closure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `openings`
--

INSERT INTO `openings` (`id`, `day`, `am_opening`, `am_closure`, `pm_opening`, `pm_closure`) VALUES
(1, 'lundi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(2, 'mardi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(3, 'mercredi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(4, 'jeudi', '08:00:00', '12:00:00', '14:00:00', '18:00:00'),
(5, 'vendredi', '09:00:00', '12:00:00', '14:00:00', '18:00:00'),
(6, 'samedi', '09:00:00', '12:00:00', '14:00:00', '17:00:00'),
(7, 'dimanche', '06:00:00', '06:00:00', '06:00:00', '06:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `title`, `content`) VALUES
(1, 'Réparations', '[\"Moteur\", \"Embrayage et boite de vitesse\", \"Carrosserie\", \"Diagnotic\", \"Pièces neuves ou d\'occasion\"]'),
(2, 'Véhicules d\'occasion', '[\"Véhicules particuliers & utilitaires\", \"Véhicules révisés\", \"Garantie jusque 12 mois\"]'),
(3, 'Entretien', '[\"Pneus\", \"Révision\", \"Freins\", \"Vidange\", \"Climatisation\"]');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` char(64) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `tel` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `tel`) VALUES
(72, 'Vincent', 'Parrot', 'vincent.parrot@example.com', '$2y$10$QoBo8EVbW3lvBuJhpa.6x.04/XWiEXJQuImz8V0XO952KCSt.COSW', 'admin', NULL),
(73, 'Admin', '', 'admin@example.com', '$2y$10$BZtHJJzlphklCb4Az2DUROIt31h7pczyY7WJx.fpTjOwJnDzl2BOy', 'admin', NULL),
(86, 'San', 'Goku', NULL, NULL, 'client', NULL),
(87, 'San', 'Gohan', NULL, NULL, 'client', NULL),
(88, 'San', 'Goten', NULL, NULL, 'client', NULL),
(89, 'Jacky', 'Michel', NULL, NULL, 'client', NULL),
(90, 'Harry', 'Potter', 'harry@potter.poud', NULL, 'client', '0934934934'),
(91, 'Jean', 'Collectionne', 'jean@collectionne.rich', NULL, 'client', '0836656565');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `opening_id` (`opening_id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `openings`
--
ALTER TABLE `openings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `address`
--
ALTER TABLE `address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `openings`
--
ALTER TABLE `openings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`),
  ADD CONSTRAINT `company_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `company_ibfk_3` FOREIGN KEY (`opening_id`) REFERENCES `openings` (`id`);

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
