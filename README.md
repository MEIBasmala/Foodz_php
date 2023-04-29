# Foodz_php
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 28 avr. 2023 à 19:24
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `foodz_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `c_email` varchar(100) NOT NULL,
  `r_email` varchar(100) NOT NULL,
  `rate` int(1) NOT NULL,
  `review` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `c_email` varchar(100) NOT NULL,
  `c_pwd` varchar(50) NOT NULL,
  `c_username` varchar(50) NOT NULL,
   `phone_num ` INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dish`
--
CREATE TABLE `dish` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_price` double NOT NULL,
  `r_email` varchar(100) NOT NULL,
  `d_photo` varchar(50) NOT NULL,
  `d_category` varchar(50) NOT NULL,
  `d_components` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favourite_restaurants`
--

CREATE TABLE `favourite_restaurants` (
  `c_email` varchar(100) NOT NULL,
  `r_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `last_visited_restaurants`
--

CREATE TABLE `last_visited_restaurants` (
  `c_email` varchar(100) NOT NULL,
  `r_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `date _time` timestamp NOT NULL DEFAULT current_timestamp(),
  `o_id` int(11) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `d_id` int(11) NOT NULL,
  `delivery` tinyint(1) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `owner`
--

CREATE TABLE `owner` (
  `r_email` varchar(100) NOT NULL,
  `o_pwd` varchar(50) NOT NULL,
  `o_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `r_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `c_email` varchar(100) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `nb_guests` int(4) NOT NULL,
  `r_date` date NOT NULL DEFAULT current_timestamp(),
  `r_time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `r_email` varchar(100) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `fb` varchar(50) DEFAULT NULL,
  `insta` varchar(50) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `latitude` float,
  `longtitude` float,
  `location` varchar(50) NOT NULL,
  `o_email` varchar(100) NOT NULL,
  `avg_price` double NOT NULL,
  `cuisine` varchar(50) DEFAULT NULL,
  `delivery` tinyint(1) NOT NULL,
  'restau_img' BLOB 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_email`,`r_email`),
  ADD KEY `fk_comment_r_email` (`r_email`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_email`);

--
-- Index pour la table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `fk_restaurant_id` (`r_email`);

--
-- Index pour la table `favourite_restaurants`
--
ALTER TABLE `favourite_restaurants`
  ADD PRIMARY KEY (`c_email`,`r_email`),
  ADD KEY `fk_favourite_restaurants_r_email` (`r_email`);

--
-- Index pour la table `last_visited_restaurants`
--
ALTER TABLE `last_visited_restaurants`
  ADD PRIMARY KEY (`c_email`,`r_email`),
  ADD KEY `fk_last_visited_restaurants_r_email` (`r_email`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `fk_orders_c_email` (`c_email`),
  ADD KEY `fk_orders_d_id` (`d_id`);

--
-- Index pour la table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`o_email`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `fk_photos_r_email` (`r_email`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`date_time`,`c_email`,`r_email`),
  ADD KEY `fk_reservation_c_email` (`c_email`),
  ADD KEY `fk_reservation_r_email` (`r_email`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`r_email`),
  ADD KEY `fk_owner_id` (`o_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dish`
--
ALTER TABLE `dish`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_c_email` FOREIGN KEY (`c_email`) REFERENCES `customer` (`c_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comment_r_email` FOREIGN KEY (`r_email`) REFERENCES `restaurant` (`r_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `dish`
--
ALTER TABLE `dish`
  ADD CONSTRAINT `fk_restaurant_id` FOREIGN KEY (`r_email`) REFERENCES `restaurant` (`r_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `favourite_restaurants`
--
ALTER TABLE `favourite_restaurants`
  ADD CONSTRAINT `fk_favourite_restaurants_c_email` FOREIGN KEY (`c_email`) REFERENCES `customer` (`c_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_favourite_restaurants_r_email` FOREIGN KEY (`r_email`) REFERENCES `restaurant` (`r_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `last_visited_restaurants`
--
ALTER TABLE `last_visited_restaurants`
  ADD CONSTRAINT `fk_last_visited_restaurants_c_email` FOREIGN KEY (`c_email`) REFERENCES `customer` (`c_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_last_visited_restaurants_r_email` FOREIGN KEY (`r_email`) REFERENCES `restaurant` (`r_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_c_email` FOREIGN KEY (`c_email`) REFERENCES `customer` (`c_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_d_id` FOREIGN KEY (`d_id`) REFERENCES `dish` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `fk_photos_r_email` FOREIGN KEY (`r_email`) REFERENCES `restaurant` (`r_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_c_email` FOREIGN KEY (`c_email`) REFERENCES `customer` (`c_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservation_r_email` FOREIGN KEY (`r_email`) REFERENCES `restaurant` (`r_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `fk_owner_id` FOREIGN KEY (`o_email`) REFERENCES `owner` (`o_email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
