-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 fév. 2026 à 12:55
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `inscription`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE `communes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `communes`
--

INSERT INTO `communes` (`id`, `departement_id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 1, 'Banikoara', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(2, 1, 'Gogounou', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(3, 1, 'Kandi', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(4, 1, 'Karimama', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(5, 1, 'Malanville', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(6, 1, 'Ségbana', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(7, 2, 'Boukoumbé', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(8, 2, 'Cobly', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(9, 2, 'Kérou', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(10, 2, 'Kouandé', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(11, 2, 'Matéri', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(12, 2, 'Natitingou', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(13, 2, 'Péhunco', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(14, 2, 'Tanguiéta', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(15, 2, 'Toucountouna', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(16, 3, 'Abomey-Calavi', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(17, 3, 'Allada', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(18, 3, 'Kpomassè', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(19, 3, 'Ouidah', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(20, 3, 'Sô-Ava', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(21, 3, 'Toffo', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(22, 3, 'Tori-Bossito', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(23, 3, 'Zè', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(24, 4, 'Bembéréké', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(25, 4, 'Kalalé', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(26, 4, 'N\'Dali', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(27, 4, 'Nikki', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(28, 4, 'Parakou', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(29, 4, 'Pèrèrè', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(30, 4, 'Sinendé', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(31, 4, 'Tchaourou', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(32, 5, 'Bantè', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(33, 5, 'Dassa-Zoumè', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(34, 5, 'Glazoué', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(35, 5, 'Ouèssè', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(36, 5, 'Savalou', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(37, 5, 'Savè', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(38, 6, 'Aplahoué', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(39, 6, 'Djakotomey', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(40, 6, 'Dogbo', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(41, 6, 'Klouékanmè', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(42, 6, 'Lalo', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(43, 6, 'Toviklin', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(44, 7, 'Bassila', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(45, 7, 'Copargo', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(46, 7, 'Djougou', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(47, 7, 'Ouaké', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(48, 8, 'Cotonou', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(49, 9, 'Athiémé', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(50, 9, 'Bopa', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(51, 9, 'Comé', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(52, 9, 'Grand-Popo', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(53, 9, 'Houéyogbé', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(54, 9, 'Lokossa', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(55, 10, 'Adjarra', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(56, 10, 'Adjohoun', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(57, 10, 'Aguégués', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(58, 10, 'Akpro-Missérété', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(59, 10, 'Avrankou', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(60, 10, 'Bonou', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(61, 10, 'Dangbo', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(62, 10, 'Porto-Novo', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(63, 10, 'Sèmè-Kpodji', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(64, 11, 'Adja-Ouèrè', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(65, 11, 'Ifangni', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(66, 11, 'Kétou', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(67, 11, 'Pobè', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(68, 11, 'Sakété', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(69, 12, 'Abomey', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(70, 12, 'Agbangnizoun', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(71, 12, 'Bohicon', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(72, 12, 'Covè', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(73, 12, 'Djidja', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(74, 12, 'Ouinhi', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(75, 12, 'Zagnanado', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(76, 12, 'Za-Kpota', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(77, 12, 'Zogbodomey', '2026-02-13 10:11:37', '2026-02-13 10:11:37');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Alibori', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(2, 'Atacora', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(3, 'Atlantique', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(4, 'Borgou', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(5, 'Collines', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(6, 'Couffo', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(7, 'Donga', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(8, 'Littoral', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(9, 'Mono', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(10, 'Ouémé', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(11, 'Plateau', '2026-02-13 10:11:37', '2026-02-13 10:11:37'),
(12, 'Zou', '2026-02-13 10:11:37', '2026-02-13 10:11:37');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `departement_id` bigint(20) UNSIGNED NOT NULL,
  `commune_id` bigint(20) UNSIGNED NOT NULL,
  `specialite_id` bigint(20) UNSIGNED NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `statut` enum('en_attente','accepte','refuse') NOT NULL DEFAULT 'en_attente',
  `disponible` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(64) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_02_04_110950_create_roles_table', 1),
(5, '2026_02_04_111254_create_permissions_table', 1),
(6, '2026_02_04_111921_create_user_role_table', 1),
(7, '2026_02_04_112118_create_user_permission_table', 1),
(8, '2026_02_06_120320_create_departements_table', 1),
(9, '2026_02_06_120821_create_communes_table', 1),
(10, '2026_02_06_121515_create_specialites_table', 1),
(11, '2026_02_06_145656_create_parametres_table', 1),
(12, '2026_02_12_130204_create_inscriptions_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

CREATE TABLE `parametres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `meta_description` longtext DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone1` varchar(255) DEFAULT NULL,
  `phone2` varchar(255) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parametres`
--

INSERT INTO `parametres` (`id`, `website_name`, `website_url`, `meta_description`, `address`, `phone1`, `phone2`, `email1`, `email2`, `facebook`, `twitter`, `whatsapp`, `youtube`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'MAFLYT', 'https://www.maflyt.net', 'Akpro-missérété', NULL, '+2290146834697', '+2290143202044', 'maflyt26@gmail.com', 'maflyt26@gmail.com', NULL, NULL, NULL, 'https://www.youtube.com/watch?v=DKHs2zDl2cM', '1770981897_maflyt.jpg', '2026-02-13 10:24:57', '2026-02-13 10:52:22');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'administrateur', NULL, NULL),
(2, 'employer', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MEHJax73cVvsLQkbzvL2fjjy2W0zBBqEVjYMqTth', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidFYyNnpLcHdUTFc0dTJWSmdQclpSdkNOaFBJTG93WlBEOWlIWnpTbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb21tdW5lcy9ieS1kZXBhcnRlbWVudC8yIjtzOjU6InJvdXRlIjtzOjIyOiJjb21tdW5lcy5ieURlcGFydGVtZW50Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1770983647);

-- --------------------------------------------------------

--
-- Structure de la table `specialites`
--

CREATE TABLE `specialites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description_piece` longtext NOT NULL,
  `experience` longtext NOT NULL,
  `statut` enum('visible','invisible') NOT NULL DEFAULT 'visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `specialites`
--

INSERT INTO `specialites` (`id`, `nom`, `description_piece`, `experience`, `statut`, `created_at`, `updated_at`) VALUES
(1, 'Formateur', '<ol><li>Une <b>lettre de motivation </b>adressée au Directeur Général, avec en objet le libellé du poste&nbsp;</li><li><b>Un CV détaillé avec photo,&nbsp;</b>mettant en avant les expériences pertinentes</li><li>Une <b>photocopie de la pièce d\'identité ou CIP</b> valide</li><li>Les <b>copies des diplômes, attestations et certificats</b></li></ol>', '<ol><li>Avoir au moins au minimum BAC et qualification en informatique;</li><li>Avoir une parfaite maîtrise des logiciels basiques (Word-Excel-Power point et internet);</li><li>Disposer d\'au moins 03 an d\'expérience dans une fonction similaire;</li><li>Etre apte en communication orale et de travailler en equipe;</li><li>Etre formateur (serait un atout);</li><li>Jouir de ces facultés physiques et mentales, avoir au moins : <b>30 ans</b></li></ol>', 'visible', '2026-02-13 09:21:53', '2026-02-13 09:21:53'),
(2, 'Chauffeur', '<ol><li>Une <b>lettre de motivation</b> adressée au Directeur Général, avec en objet le libellé du poste</li><li><b>Un CV détaillé avec photo</b>, mettant en avant les expériences pertinentes</li><li>Une <b>photocopie de la pièce d\'identité ou CIP</b> valide</li><li>Les <b>copies des diplômes, attestations et certificat</b></li></ol>', '<ol><li>Avoir au minimum <b>BEPC</b>;</li><li>Permis de conduire<b> Catégorie B</b>;</li><li>Avoir une qualification en conduite;</li><li>Au moins <b>03 ans d\'expérience</b> ;</li><li>Jouir de ses facultés physiques et mentales;</li><li><b>Avoir au minimum 30 ans</b></li><li>Résider à<b> Porto-Novo ou environ est un atout</b></li></ol>', 'visible', '2026-02-13 09:31:22', '2026-02-13 10:09:58'),
(3, 'Maintenancier', '<ol><li>Une<b> lettre de motivation</b> adressée au Directeur Général, avec en objet le libellé du poste </li><li>Un <b>CV détaillé avec photo</b>, mettant en avant les expériences pertinentes</li><li><b>Une photocopie de la pièce d\'identité ou CIP</b> valide</li><li>Les <b>copies des diplômes, attestations et certificats</b></li></ol>', '<ol><li>Avoir au moins&nbsp; le niveau BAC et une qualification en maintenance ;</li><li>Avoir une parfaite maîtrise de la maintenance <b>préventive et curative</b></li><li>Disposer d\'au moins <b>03 ans d\'expériences à une fonction similaire;</b></li><li>Jouir de ses facultés physiques et mentales ,capable de travailler en équipe</li><li>Avoir au moins <b>25 ans</b></li></ol>', 'visible', '2026-02-13 10:39:05', '2026-02-13 10:51:40');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yémalin Théodore LOKO', 'maflyt26@gmail.com', NULL, '$2y$12$lJS0lt/3/D8KuHN7FR7BYOb0hwZWccsSr2n1Kv3KvYp5wO4Feps9K', NULL, '2026-02-13 08:51:47', '2026-02-13 08:51:47'),
(2, 'BONOU Hontonnou Germain', 'germainbonou604@gmail.com', NULL, '$2y$12$fiNT6Sb9.YfbUwvyTaO9NOHhGE/E5wOYfRezGGgZvmSqRRrt/hXIi', NULL, '2026-02-13 10:14:03', '2026-02-13 10:14:03');

-- --------------------------------------------------------

--
-- Structure de la table `user_permission`
--

CREATE TABLE `user_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(4, 2, 1, NULL, NULL),
(5, 2, 2, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Index pour la table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communes_departement_id_foreign` (`departement_id`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departements_nom_unique` (`nom`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inscriptions_email_unique` (`email`),
  ADD UNIQUE KEY `inscriptions_token_unique` (`token`),
  ADD KEY `inscriptions_departement_id_foreign` (`departement_id`),
  ADD KEY `inscriptions_commune_id_foreign` (`commune_id`),
  ADD KEY `inscriptions_specialite_id_foreign` (`specialite_id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parametres`
--
ALTER TABLE `parametres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `specialites`
--
ALTER TABLE `specialites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specialites_nom_unique` (`nom`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_permission_user_id_foreign` (`user_id`),
  ADD KEY `user_permission_permission_id_foreign` (`permission_id`);

--
-- Index pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_user_id_foreign` (`user_id`),
  ADD KEY `user_role_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `communes`
--
ALTER TABLE `communes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `parametres`
--
ALTER TABLE `parametres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `specialites`
--
ALTER TABLE `specialites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `communes`
--
ALTER TABLE `communes`
  ADD CONSTRAINT `communes_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_commune_id_foreign` FOREIGN KEY (`commune_id`) REFERENCES `communes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscriptions_departement_id_foreign` FOREIGN KEY (`departement_id`) REFERENCES `departements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inscriptions_specialite_id_foreign` FOREIGN KEY (`specialite_id`) REFERENCES `specialites` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_permission`
--
ALTER TABLE `user_permission`
  ADD CONSTRAINT `user_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_permission_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
