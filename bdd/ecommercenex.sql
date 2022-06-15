-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 juin 2022 à 17:17
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
-- Base de données : `ecommercenex`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilite` int(11) NOT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_siret` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_entreprise` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat_compte` smallint(6) NOT NULL,
  `role` smallint(6) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp() COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220601092918', '2022-06-01 11:30:48', 143),
('DoctrineMigrations\\Version20220601131245', '2022-06-01 15:12:59', 50),
('DoctrineMigrations\\Version20220602071359', '2022-06-02 09:14:15', 251),
('DoctrineMigrations\\Version20220602124902', '2022-06-02 14:49:15', 89),
('DoctrineMigrations\\Version20220602131250', '2022-06-02 15:13:01', 261);

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_rep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordre_affichage` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`id`, `parent_id`, `libelle`, `image_rep`, `ordre_affichage`, `image`) VALUES
(37, NULL, 'Lavage', 'C:images', NULL, NULL),
(38, 37, 'Machines à laver', 'C:images', NULL, NULL),
(39, 37, 'laves linge', 'C:images', NULL, NULL),
(40, 37, 'seau', 'C:images', NULL, NULL),
(41, NULL, 'Table', 'C:images', NULL, NULL),
(42, 41, 'table de bureau', 'C:images', NULL, NULL),
(43, 41, 'table basse', 'C:images', NULL, NULL),
(44, 41, 'table à manger', 'C:images', NULL, NULL),
(45, 37, 'fberb', 'C:\\xampp\\tmp\\php9835.tmp', 5, NULL),
(46, 38, 'nouveau test', 'C:\\siteEcommerceApema\\ecommerceIndustry/public/uploads/bunny-62a7469e18adc.jpg', 4, NULL),
(47, 38, 'Trancheur', 'C:\\siteEcommerceApema\\ecommerceIndustry/architectural-design-architecture-building-417352-1024x685-62a74ad077a59.jpg', 87, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `famille_id` int(11) NOT NULL,
  `taxe_id` int(11) DEFAULT NULL,
  `reference` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix_reference` int(11) DEFAULT NULL,
  `ordre_affichage` int(11) DEFAULT NULL,
  `image_rep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `famille_id`, `taxe_id`, `reference`, `libelle`, `description`, `prix_reference`, `ordre_affichage`, `image_rep`) VALUES
(1, 44, NULL, 'Voluptas.', 'Consequatur.', 'Sapiente ut ea dolor. Ab pariatur neque repudiandae. Quisquam quae inventore consequuntur ut rem aspernatur quo. Officiis natus nesciunt voluptas dignissimos odit delectus aut.', 9070, NULL, ''),
(2, 41, NULL, 'Ut velit.', 'Placeat.', 'Eum quia quod eveniet laborum natus et. Eligendi dignissimos culpa explicabo autem voluptas. Officia voluptas tempora tenetur nemo odit. Eos non quibusdam ipsum libero.', 462, NULL, ''),
(3, 39, NULL, 'Illum.', 'Ipsam ratione.', 'Impedit qui incidunt ea quia dolore dolorem est. Ut cupiditate ea ipsum dicta. Numquam minus voluptatum neque sit aut et et. Fuga in molestias dolores qui accusantium tempore officiis.', 8702, NULL, ''),
(4, 38, NULL, 'Quia.', 'Vero enim.', 'Esse et quia praesentium perferendis facere soluta commodi. Incidunt qui eaque ut. Non consequatur quia dolorem ducimus iste. Neque et est quia. Culpa exercitationem dolorem sapiente.', 5661, NULL, ''),
(5, 41, NULL, 'Saepe vel.', 'Et dolor earum.', 'Id distinctio odio sequi rerum. Ea voluptas rerum et sed. Sequi ipsam et neque eum.', 14902, NULL, ''),
(6, 41, NULL, 'Ipsam et.', 'Molestiae.', 'Minima nisi et et. Earum assumenda eum quia neque qui omnis voluptas et. Deserunt porro non maiores ut est et beatae.', 5467, NULL, ''),
(7, 41, NULL, 'Voluptas.', 'Ex cum omnis.', 'Et quisquam odit unde aut et dolorem voluptatem reiciendis. Facilis et ratione et. Omnis optio dolore facilis dolor.', 4855, NULL, ''),
(8, 40, NULL, 'Aut.', 'Voluptatem.', 'Nostrum possimus amet quisquam consequuntur odio eum ab. Mollitia in totam voluptatibus doloribus. Consequatur eveniet provident sunt omnis sed modi. Illo dicta nobis illo sunt.', 2753, NULL, ''),
(9, 39, NULL, 'Officia.', 'Expedita vel.', 'Saepe ut consectetur est error. Ipsam nihil sed quis.', 2931, NULL, ''),
(10, 44, NULL, 'Quod.', 'Sequi quo aut.', 'Quam qui molestiae dicta nisi. Non id ducimus eligendi reiciendis.', 12288, NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `taxe`
--

CREATE TABLE `taxe` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taux_taxe` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `taxe`
--

INSERT INTO `taxe` (`id`, `libelle`, `taux_taxe`) VALUES
(3, 'TVA', 20);

-- --------------------------------------------------------

--
-- Structure de la table `type_caracteristique`
--

CREATE TABLE `type_caracteristique` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valeur_est_unique` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_complete` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2473F213727ACA70` (`parent_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_29A5EC2797A77B84` (`famille_id`),
  ADD KEY `IDX_29A5EC271AB947A4` (`taxe_id`);

--
-- Index pour la table `taxe`
--
ALTER TABLE `taxe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_caracteristique`
--
ALTER TABLE `type_caracteristique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `taxe`
--
ALTER TABLE `taxe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `type_caracteristique`
--
ALTER TABLE `type_caracteristique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `famille`
--
ALTER TABLE `famille`
  ADD CONSTRAINT `FK_2473F213727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `famille` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_29A5EC271AB947A4` FOREIGN KEY (`taxe_id`) REFERENCES `taxe` (`id`),
  ADD CONSTRAINT `FK_29A5EC2797A77B84` FOREIGN KEY (`famille_id`) REFERENCES `famille` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
