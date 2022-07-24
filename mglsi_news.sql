-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 23 juil. 2022 à 17:27
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mglsi_news`
--

-- --------------------------------------------------------

--
-- Structure de la table `Article`
--

CREATE TABLE Article (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text DEFAULT NULL,
  `dateCreation` datetime DEFAULT current_timestamp(),
  `dateModification` datetime DEFAULT current_timestamp(),
  `categorie` int(11) DEFAULT NULL
) 

--
-- Déchargement des données de la table `Article`
--

INSERT INTO Article (id, titre, contenu, dateCreation, dateModification, categorie) VALUES
(1, 'Première victoire du Sénégal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-07-20 23:24:38', '2022-07-20 23:24:38', 1),
(2, 'Election en Mauritanie', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-07-20 23:24:38', '2022-07-20 23:24:38', 4),
(3, 'Début de la CAN', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-07-20 23:24:38', '2022-07-20 23:24:38', 1),
(4, 'Pétrole au Sénégal', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-07-20 23:24:38', '2022-07-20 23:24:38', 4),
(5, 'Inauguration d\'un ENO à l\'UVS', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-07-20 23:24:38', '2022-07-20 23:24:38', 3),
(6, 'Don de sang: campus social', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-07-20 23:24:39', '2022-07-20 23:24:39', 2),
(7, 'Notre réponse à la Covid-19', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-07-20 23:24:39', '2022-07-20 23:24:39', 2),
(8, 'Salon du Polytechnicien', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-07-20 23:24:39', '2022-07-20 23:24:39', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE Categorie (
  id int(11) NOT NULL,
  libelle varchar(20) DEFAULT NULL
)

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO Categorie (id, libelle) VALUES
(1, 'Sport'),
(2, 'Santé'),
(3, 'Education'),
(4, 'Politique');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE Users (
    id int NOT NULL primary key,
    nom varchar(50) NOT NULL,
    prenom varchar(50) NOT NULL,
    login varchar(50) NOT NULL,
    password varchar(50) NOT NULL
    
) --ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Article`
--
ALTER TABLE Article
  ADD PRIMARY KEY (id),
  ADD KEY fk_categorie_article (categorie);

--
-- Index pour la table `Categorie`
--
ALTER TABLE Categorie
  ADD PRIMARY KEY (id);

--
-- Index pour la table `Utilisateurs`
--
-- ALTER TABLE `Users`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Article`
--
ALTER TABLE Article
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE Categorie,
  MODIFY id int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Users`
--
-- ALTER TABLE `Utilisateurs`
--   MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Article`
--
ALTER TABLE Article
  ADD CONSTRAINT `fk_categorie_article` FOREIGN KEY (`categorie`) REFERENCES `Categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
