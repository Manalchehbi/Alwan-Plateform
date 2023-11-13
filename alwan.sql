-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 01 sep. 2022 à 17:51
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
-- Base de données : `alwan`
--

-- --------------------------------------------------------

--
-- Structure de la table `academic_levels`
--

DROP TABLE IF EXISTS `academic_levels`;
CREATE TABLE IF NOT EXISTS `academic_levels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `academic_levels`
--

INSERT INTO `academic_levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'cp1', NULL, NULL),
(2, 'cp2', NULL, NULL),
(3, 'level one', NULL, NULL),
(4, 'level two', NULL, NULL),
(5, 'level three', NULL, NULL),
(6, 'level four', NULL, NULL),
(7, 'level five', NULL, NULL),
(8, 'level six', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `certifs`
--

DROP TABLE IF EXISTS `certifs`;
CREATE TABLE IF NOT EXISTS `certifs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'C', '2022-08-08 10:11:33', '2022-08-09 10:29:59'),
(2, 'k', '2022-08-08 10:11:47', '2022-08-09 10:30:11'),
(3, 'm', '2022-08-08 11:22:58', '2022-08-08 11:22:58'),
(4, 'd', '2022-08-08 17:01:52', '2022-08-08 17:01:52');

-- --------------------------------------------------------

--
-- Structure de la table `difficulty_levels`
--

DROP TABLE IF EXISTS `difficulty_levels`;
CREATE TABLE IF NOT EXISTS `difficulty_levels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `difficulty_levels`
--

INSERT INTO `difficulty_levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'everyone', NULL, NULL),
(4, 'junior', NULL, NULL),
(5, 'Average', NULL, NULL),
(6, 'Perfect', NULL, NULL),
(7, 'advanced', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `exercises`
--

DROP TABLE IF EXISTS `exercises`;
CREATE TABLE IF NOT EXISTS `exercises` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `story_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `homeworks`
--

DROP TABLE IF EXISTS `homeworks`;
CREATE TABLE IF NOT EXISTS `homeworks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archive` tinyint(1) NOT NULL,
  `classe_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `exercise_id` int(10) UNSIGNED NOT NULL,
  `stories_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `homeworks_classe_id_foreign` (`classe_id`),
  KEY `homeworks_teacher_id_foreign` (`teacher_id`),
  KEY `homeworks_exercise_id_foreign` (`exercise_id`),
  KEY `homeworks_stories_id_foreign` (`stories_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_06_27_150114_create_academic_level_table', 1),
(5, '2022_06_27_150257_create_certifs_table', 1),
(6, '2022_06_27_150323_create_classes_table', 1),
(7, '2022_06_27_150407_create_difficulty_level_table', 1),
(8, '2022_06_27_150503_create_exercises_table', 1),
(9, '2022_06_27_150540_create_homeworks_table', 1),
(10, '2022_06_27_150605_create_schools_table', 1),
(11, '2022_06_27_150632_create_specialities_table', 1),
(12, '2022_06_27_150651_create_stories_table', 1),
(13, '2022_06_27_150712_create_students_table', 1),
(14, '2022_06_27_150733_create_teachers_table', 1),
(15, '2022_06_27_150819_create_useful_resources_table', 1),
(16, '2022_06_27_150856_create_work_papers_table', 1),
(17, '2022_06_27_165814_create_types_table', 1),
(18, '2022_06_27_180132_create_teacher_student_table', 1),
(19, '2022_07_19_120151_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'student', 'web', '2022-07-19 12:42:38', '2022-07-19 12:42:38'),
(2, 'admin', 'web', '2022-07-19 12:42:51', '2022-07-19 12:42:51'),
(3, 'teacher', 'web', '2022-07-19 12:43:14', '2022-07-19 12:43:14'),
(4, 'school', 'web', '2022-07-19 12:43:30', '2022-07-19 12:43:30');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` mediumblob NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `schools`
--

INSERT INTO `schools` (`id`, `name`, `logo`, `adresse`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'bsm', 0x313635393935353234382e504e47, 'rue benssouda', '0673459668', 'bsm@gmail.com', '2022-08-08 10:40:48', '2022-08-08 10:40:48'),
(2, 'devstter', 0x313636303034383033342e504e47, 'bensoouda', '0673459669', 'devsster@gmail.com', '2022-08-08 11:15:09', '2022-08-09 12:27:14');

-- --------------------------------------------------------

--
-- Structure de la table `specialities`
--

DROP TABLE IF EXISTS `specialities`;
CREATE TABLE IF NOT EXISTS `specialities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `specialities`
--

INSERT INTO `specialities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'anglais', NULL, NULL),
(2, 'arabe', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `stories`
--

DROP TABLE IF EXISTS `stories`;
CREATE TABLE IF NOT EXISTS `stories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `academic_level_id` int(10) UNSIGNED NOT NULL,
  `difficulty_level_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stories_type_id_foreign` (`type_id`),
  KEY `stories_academic_level_id_foreign` (`academic_level_id`),
  KEY `stories_difficulty_level_id_foreign` (`difficulty_level_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stories`
--

INSERT INTO `stories` (`id`, `name`, `description`, `path`, `picture`, `type_id`, `academic_level_id`, `difficulty_level_id`, `created_at`, `updated_at`) VALUES
(3, 'Life Skills', 'bsm school', 'image/stories', '1661958336.jpeg', 1, 1, 1, '2022-08-31 15:05:36', '2022-08-31 15:05:36'),
(4, 'Mathematics', 'ggggg', 'image/stories', '1661958378.jpeg', 2, 2, 2, '2022-08-31 15:06:18', '2022-08-31 15:06:18'),
(5, 'Sciences and Nature', 'bsm school', 'image/stories', '1661958407.jpeg', 2, 2, 2, '2022-08-31 15:06:47', '2022-08-31 15:06:47'),
(6, 'Educational Cards', 'ggggg', 'image/stories', '1661958442.jpeg', 2, 2, 2, '2022-08-31 15:07:22', '2022-08-31 15:07:22'),
(7, 'School Stories', 'ssssssssss', 'image/stories', '1661958469.jpeg', 2, 2, 2, '2022-08-31 15:07:49', '2022-08-31 15:07:49'),
(8, 'Funny Stories', 'ggggg', 'image/stories', '1661958495.jpeg', 1, 2, 1, '2022-08-31 15:08:15', '2022-08-31 15:08:15'),
(9, 'Life Skills', 'ggggg', 'image/stories', '1661958529.jpg', 2, 2, 2, '2022-08-31 15:08:49', '2022-08-31 15:08:49'),
(10, 'Educational Cards', 'bsm school', 'image/stories', '1661958583.jpeg', 2, 1, 2, '2022-08-31 15:09:43', '2022-08-31 15:09:43'),
(11, 'Funny Stories', 'ssssssssss', 'image/stories', '1661958609.jpeg', 2, 1, 2, '2022-08-31 15:10:09', '2022-08-31 15:10:09');

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` mediumblob NOT NULL,
  `parentsName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentsMobileNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classe_id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_classe_id_foreign` (`classe_id`),
  KEY `students_school_id_foreign` (`school_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`id`, `user_id`, `last_name`, `first_name`, `date_naissance`, `phone`, `email`, `avatar`, `parentsName`, `parentsMobileNumber`, `gender`, `classe_id`, `school_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'manal', 'manal', '2012-05-24', '0673459668', 'manal@gmail.com', 0x313635393935373839372e504e47, 'hamid', '0650745899', NULL, 2, 1, '2022-08-08 11:24:57', '2022-08-31 13:24:38'),
(3, 3, 'oussama', 'oussama', '2022-08-15', '0390390390', 'oussama@gmail.com', 0x313636303933383833302e706e67, 'oussama', '099999999', NULL, 1, 2, '2022-08-09 19:16:44', '2022-08-19 18:53:50'),
(7, 0, 'khadija', 'khadija', '2022-08-09', '09999999', 'khadija@gmail.com', '', 'khadija', '67676767', 'Female', 2, 1, '2022-08-16 11:49:28', '2022-08-23 11:49:28');

-- --------------------------------------------------------

--
-- Structure de la table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality_id` int(10) UNSIGNED NOT NULL,
  `classe_id` int(10) UNSIGNED NOT NULL,
  `school_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_speciality_id_foreign` (`speciality_id`),
  KEY `teachers_classe_id_foreign` (`classe_id`),
  KEY `teachers_school_id_foreign` (`school_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `last_name`, `first_name`, `adresse`, `email`, `password`, `picture`, `phone`, `gender`, `speciality_id`, `classe_id`, `school_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'bennouna', 'khadija', 'chefchaouni', 'bsm@gmail.com', '', '1659958249.PNG', '0673459668', 'Male', 2, 1, 1, '2022-08-08 11:30:49', '2022-08-08 11:30:49'),
(2, 4, 'bennouna', 'khadijaa', 'sale sale', 'teacher@gmail.com', '', '1661957887.PNG', '07277227', 'Female', 2, 2, 2, NULL, '2022-08-31 14:58:07');

-- --------------------------------------------------------

--
-- Structure de la table `teacher_classe`
--

DROP TABLE IF EXISTS `teacher_classe`;
CREATE TABLE IF NOT EXISTS `teacher_classe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `teacher_classe`
--

INSERT INTO `teacher_classe` (`id`, `teacher_id`, `classe_id`) VALUES
(1, 2, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `teacher_student`
--

DROP TABLE IF EXISTS `teacher_student`;
CREATE TABLE IF NOT EXISTS `teacher_student` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teacher_student`
--

INSERT INTO `teacher_student` (`id`, `teacher_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'science and nature', NULL, NULL),
(2, 'mathematic', NULL, NULL),
(3, 'Life Skills', NULL, NULL),
(4, 'Funny Stories', NULL, NULL),
(5, 'School Stories', NULL, NULL),
(6, 'Educational Cards', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `useful_resources`
--

DROP TABLE IF EXISTS `useful_resources`;
CREATE TABLE IF NOT EXISTS `useful_resources` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `useful_resources`
--

INSERT INTO `useful_resources` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/watch?v=zBAkp-xFbrc', '2022-09-01 16:18:42', '2022-09-01 16:18:42'),
(2, 'https://www.youtube.com/watch?v=zBAkp-xFbrc', '2022-09-01 16:18:47', '2022-09-01 16:18:47'),
(3, 'https://www.youtube.com/watch?v=zBAkp-xFbrc', '2022-09-01 16:18:53', '2022-09-01 16:18:53'),
(4, 'https://www.youtube.com/watch?v=zBAkp-xFbrc', '2022-09-01 16:18:57', '2022-09-01 16:18:57'),
(5, 'https://www.youtube.com/watch?v=zBAkp-xFbrc', '2022-09-01 16:19:02', '2022-09-01 16:19:02'),
(6, 'https://www.youtube.com/watch?v=zBAkp-xFbrc', '2022-09-01 16:19:07', '2022-09-01 16:19:07'),
(7, 'https://www.youtube.com/watch?v=zBAkp-xFbrc', '2022-09-01 16:19:12', '2022-09-01 16:19:12'),
(8, 'https://www.youtube.com/watch?v=zBAkp-xFbrc', '2022-09-01 16:19:16', '2022-09-01 16:19:16'),
(9, 'https://www.youtube.com/watch?v=zBAkp-xFbrc', '2022-09-01 16:19:21', '2022-09-01 16:19:21'),
(10, 'https://www.youtube.com/watch?v=zBAkp-xFbrc', '2022-09-01 16:19:25', '2022-09-01 16:19:25');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 3, 'admin', 'admin@gmail.com', NULL, '$2y$10$TTxvDDiPKP4z57COh86.U.6CH1XrolLZ7XhWgdXMyBsGcep1Xm7um', NULL, '2022-07-19 12:57:21', '2022-07-19 12:57:21'),
(4, 3, 'teacher', 'teacher@gmail.com', '2022-08-16 10:37:18', '$2y$10$TTxvDDiPKP4z57COh86.U.6CH1XrolLZ7XhWgdXMyBsGcep1Xm7um', NULL, '2022-08-16 10:37:18', '2022-08-16 10:37:18'),
(3, 1, 'student', 'student@gmail.com', '2022-08-17 12:55:55', '$2y$10$TTxvDDiPKP4z57COh86.U.6CH1XrolLZ7XhWgdXMyBsGcep1Xm7um', NULL, '2022-08-17 12:55:55', '2022-08-16 12:55:55');

-- --------------------------------------------------------

--
-- Structure de la table `work_papers`
--

DROP TABLE IF EXISTS `work_papers`;
CREATE TABLE IF NOT EXISTS `work_papers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `work_papers`
--

INSERT INTO `work_papers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1659952827.pdf', '2022-08-08 10:00:27', '2022-08-08 10:00:27'),
(2, '1659958307.pdf', '2022-08-08 11:31:47', '2022-08-08 11:31:47'),
(3, '1659978274.pdf', '2022-08-08 17:04:34', '2022-08-08 17:04:34');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
