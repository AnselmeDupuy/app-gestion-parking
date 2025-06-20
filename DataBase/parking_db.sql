-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 20 juin 2025 à 16:57
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parking_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `license_plate` varchar(40) NOT NULL,
  `car_name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`id`, `user_id`, `license_plate`, `car_name`) VALUES
(1, 1, '00-AAA-01', 'A1'),
(2, 14, '000-ZZZ-01', 'AAA'),
(3, 14, 'b', 'a'),
(7, 1, 'aaaa', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `groupName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `groups`
--

INSERT INTO `groups` (`id`, `groupName`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `action_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `client_ip` varchar(40) NOT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action`, `action_details`, `client_ip`, `user_agent`, `created_at`) VALUES
(1, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-12 20:03:52'),
(2, 1, 'delete_user', 'Failed to delete user ID: 14 by admin: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-12 20:03:56'),
(3, 1, 'delete_user', 'Failed to delete user ID: 13 by admin: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-12 20:03:58'),
(4, 1, 'delete_user', 'Failed to delete user ID: 1 by admin: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-12 20:03:59'),
(5, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-12 20:04:14'),
(6, 1, 'delete_user', 'Failed to delete user ID: 14 by admin: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-12 20:04:14'),
(7, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-12 20:04:15'),
(8, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-12 20:04:32'),
(9, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-12 20:04:40'),
(10, 1, 'add_reservation', 'User ID: 1 reserved place: 31 from 2025-06-13 00:00 to 2025-06-13 02:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-12 20:12:47'),
(11, 1, 'add_reservation', 'User ID: 1 reserved place: 32 from 2025-06-13 01:45 to 2025-06-13 17:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-12 20:12:57'),
(12, 1, 'add_reservation', 'User ID: 1 reserved place: 1 from 2025-06-14 00:00 to 2025-06-14 01:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-13 21:10:30'),
(13, 1, 'add_reservation', 'User ID: 1 reserved place: 31 from 2025-06-14 00:00 to 2025-06-14 01:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-13 21:10:37'),
(14, 1, 'add_reservation', 'User ID: 1 reserved place: 36 from 2025-06-15 00:00 to 2025-06-15 18:30', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-13 21:10:44'),
(15, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:139.0) Gecko/20100101 Firefox/139.0', '2025-06-14 12:12:07'),
(16, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:12:37'),
(17, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:12:38'),
(18, 1, 'activate/deActivate', 'user 13 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:12:38'),
(19, 1, 'activate/deActivate', 'user 13 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:12:39'),
(20, 1, 'activate/deActivate', 'user 1 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:12:39'),
(21, 1, 'activate/deActivate', 'user 1 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:12:39'),
(22, 1, 'delete_user', 'Failed to delete user ID: 14 by admin: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:12:40'),
(23, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:18:23'),
(24, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:18:24'),
(25, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:18:25'),
(26, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:18:25'),
(27, 1, 'activate/deActivate', 'user 13 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:18:26'),
(28, 1, 'activate/deActivate', 'user 13 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:18:27'),
(29, 1, 'add_reservation', 'User ID: 1 reserved place: 31 from 2025-06-15 00:00 to 2025-06-15 18:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:23:39'),
(30, 1, 'add_reservation', 'User ID: 1 reserved place: 32 from 2025-06-15 00:00 to 2025-06-15 01:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:23:46'),
(31, 1, 'add_reservation', 'User ID: 1 reserved place: 33 from 2025-06-15 00:00 to 2025-06-15 02:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 19:23:52'),
(32, 1, 'activate/deActivate', 'user 1 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 20:49:25'),
(33, 1, 'activate/deActivate', 'user 1 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 20:49:25'),
(34, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 20:49:31'),
(35, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 20:49:31'),
(36, 1, 'add_reservation', 'User ID: 1 reserved place: 31 from 2025-06-15 00:00 to 2025-06-15 02:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 20:55:24'),
(37, 1, 'add_reservation', 'User ID: 1 reserved place: 32 from 2025-06-15 00:00 to 2025-06-15 02:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 20:55:30'),
(38, 1, 'add_reservation', 'User ID: 1 reserved place: 31 from 2025-06-15 00:00 to 2025-06-15 03:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 20:57:44'),
(39, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 20:58:24'),
(40, 1, 'add_reservation', 'User ID: 1 reserved place: 31 from 2025-06-14 22:30 to 2025-06-14 23:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 20:58:57'),
(41, 1, 'add_reservation', 'User ID: 1 reserved place: 31 from 2025-06-15 00:00 to 2025-06-15 01:30', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:05:51'),
(42, 1, 'add_reservation', 'User ID: 1 reserved place: 32 from 2025-06-15 00:00 to 2025-06-15 02:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:05:57'),
(43, 1, 'add_reservation', ' 2025-06-14 00:00 or 02:45  in the past for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:06:02'),
(44, 1, 'add_reservation', 'User ID: 1 reserved place: 33 from 2025-06-15 00:00 to 2025-06-15 02:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:06:04'),
(45, 1, 'cancel Order', 'user 1 canceled reservation: 14', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:10:30'),
(46, 1, 'cancel Order', 'user 1 canceled reservation: 13', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:12:32'),
(47, 1, 'cancel Order', 'user 1 canceled reservation: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:12:42'),
(48, 1, 'cancel Order', 'user 1 canceled reservation: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:12:43'),
(49, 1, 'cancel Order', 'user 1 canceled reservation: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:12:44'),
(50, 1, 'add_reservation', 'User ID: 1 reserved place: 31 from 2025-06-15 00:00 to 2025-06-15 03:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:12:59'),
(51, 1, 'cancel Order', 'user 1 canceled reservation: 16', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:13:04'),
(52, 1, 'add_reservation', 'User ID: 1 reserved place: 31 from 2025-06-15 00:00 to 2025-06-15 02:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:13:14'),
(53, 1, 'add_reservation', 'User ID: 1 reserved place: 32 from 2025-06-15 00:00 to 2025-06-15 03:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:13:19'),
(54, 1, 'add_reservation', 'User ID: 1 reserved place: 33 from 2025-06-15 00:00 to 2025-06-15 15:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:13:26'),
(55, 1, 'cancel Order', 'user 1 canceled reservation: 19', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:13:37'),
(56, 1, 'cancel Order', 'user 1 canceled reservation: 18', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:13:51'),
(57, 1, 'cancel Order', 'user 1 canceled reservation: 17', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:15:37'),
(58, 1, 'cancel Order', 'user 1 canceled reservation: 17', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:15:39'),
(59, 1, 'cancel Order', 'user 1 canceled reservation: 17', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:15:40'),
(60, 1, 'add_reservation', 'User ID: 1 reserved place: 1 from 2025-06-15 00:00 to 2025-06-15 01:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:18:19'),
(61, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:18:26'),
(62, 1, 'add_reservation', 'User ID: 1 reserved place: 36 from 2025-06-15 12:45 to 2025-06-15 19:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:18:30'),
(63, 1, 'add_reservation', 'User ID: 1 reserved place: 31 from 2025-06-15 00:00 to 2025-06-15 17:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:18:39'),
(64, 1, 'cancel Order', 'user 1 canceled reservation: 21', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:18:50'),
(65, 1, 'cancel Order', 'user 1 canceled reservation: 20', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:18:56'),
(66, 1, 'add_reservation', 'User ID: 1 reserved place: 1 from 2025-06-15 00:00 to 2025-06-15 13:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:41:18'),
(67, 1, 'cancel Order', 'user 1 canceled reservation: 23', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-14 21:46:55'),
(68, 1, 'cancel Order', 'user 1 canceled reservation: 22', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:14:34'),
(69, 1, 'add_reservation', 'User ID: 1 reserved place: 31 from 2025-06-16 00:00 to 2025-06-16 02:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:15:12'),
(70, 1, 'add_reservation', 'User ID: 1 reserved place: 32 from 2025-06-16 00:00 to 2025-06-16 02:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:22:04'),
(71, 1, 'add_reservation', 'User ID: 1 reserved place: 33 from 2025-06-16 00:00 to 2025-06-16 02:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:22:09'),
(72, 1, 'cancel Order', 'user  confirmed reservation: 26', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:23:49'),
(73, 1, 'cancel Order', 'user  confirmed reservation: 25', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:24:14'),
(74, 1, 'add_reservation', 'User ID: 1 reserved place: 32 from 2025-06-16 00:00 to 2025-06-16 02:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:25:23'),
(75, 1, 'Confirm Order', 'user  confirmed reservation: 27', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:29:35'),
(76, 1, 'add_reservation', 'User ID: 1 reserved place: 36 from 2025-06-16 00:00 to 2025-06-16 02:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:31:06'),
(77, 1, 'Confirm Order', 'user  confirmed reservation: 28', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:33:41'),
(78, 1, 'Confirm Order', 'user  confirmed reservation: 24', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:34:06'),
(79, 1, 'add_reservation', 'User ID: 1 reserved place: 36 from 2025-06-16 00:00 to 2025-06-16 02:30', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:34:15'),
(80, 1, 'add_reservation', 'User ID: 1 reserved place: 37 from 2025-06-16 00:00 to 2025-06-16 04:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:34:18'),
(81, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:34:23'),
(82, 1, 'add_reservation', 'User ID: 1 reserved place: 1 from 2025-06-16 00:00 to 2025-06-16 02:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:34:27'),
(83, 1, 'add_reservation', 'User ID: 1 reserved place: 31 from 2025-06-16 00:00 to 2025-06-16 03:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:34:32'),
(84, 1, 'Confirm Order', 'user  confirmed reservation: 32', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:36:07'),
(85, 1, 'Confirm Order', 'user  confirmed reservation: 31', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:37:29'),
(86, 1, 'Confirm Order', 'user  confirmed reservation: 30', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:38:53'),
(87, 1, 'Confirm Order', 'user 1 confirmed reservation: 29', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:39:38'),
(88, 1, 'add_reservation', 'User ID: 1 reserved place: 36 from 2025-06-16 00:00 to 2025-06-16 03:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-15 12:40:18'),
(89, 1, 'Logout', 'admin@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 11:52:01'),
(90, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 11:52:09'),
(91, 1, 'Logout', 'admin@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:00:44'),
(92, 14, 'login', 'Login successful user@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:00:53'),
(93, 14, 'add_reservation', 'User ID: 14 reserved place: 16 from 2025-06-18 00:00 to 2025-06-18 03:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:01:34'),
(94, 14, 'add_reservation', 'User ID: 14 reserved place: 11 from 2025-06-18 00:00 to 2025-06-18 16:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:01:42'),
(95, 14, 'add_reservation', 'User ID: 14 reserved place: 1 from 2025-06-19 00:00 to 2025-06-19 14:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:01:50'),
(96, 14, 'Confirm Order', 'user 14 confirmed reservation: 35', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:04:05'),
(97, 14, 'Logout', 'user@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:07:45'),
(98, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:07:53'),
(99, 1, 'add_reservation', 'User ID: 1 reserved place: 36 from 2025-06-18 00:00 to 2025-06-18 02:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:16:22'),
(100, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:16:36'),
(101, 1, 'add_reservation', 'User ID: 1 reserved place: 37 from 2025-06-18 00:00 to 2025-06-18 02:15', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:17:07'),
(102, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:34:56'),
(103, 1, 'add_reservation', ' 2025-06-17 00:00 or 03:00  in the past for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:35:01'),
(104, 1, 'add_reservation', 'User ID: 1 reserved place: 38 from 2025-06-18 00:00 to 2025-06-18 03:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:35:05'),
(105, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:35:21'),
(106, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:35:33'),
(107, 1, 'add_reservation', 'User ID: 1 reserved place: 36 from 2025-06-17 16:00 to 2025-06-17 23:30', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:35:42'),
(108, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:53:10'),
(109, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:56:17'),
(110, 1, 'add_reservation', 'User ID: 1 reserved place: 39 from 2025-06-18 00:00 to 2025-06-18 02:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:56:24'),
(111, 1, 'add_reservation', ' 2025-06-17 00:00 or 03:30  in the past for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:58:24'),
(112, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 12:58:30'),
(113, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 13:16:49'),
(114, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 13:20:19'),
(115, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 13:20:19'),
(116, 1, 'add_reservation', ' 2025-06-17 00:00 or 00:00  in the past for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 13:22:06'),
(117, 1, 'add_reservation', 'User ID: 1 reserved place: 37 from 2025-06-17 18:00 to 2025-06-18 00:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 13:22:14'),
(118, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 13:50:51'),
(119, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 13:50:51'),
(120, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 13:51:07'),
(121, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 13:51:07'),
(122, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 13:51:11'),
(123, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 13:51:11'),
(124, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:12:03'),
(125, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:12:03'),
(126, 1, 'add_reservation', 'User ID: 1 reserved place: 40 from 2025-06-18 00:00 to 2025-06-19 00:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:12:09'),
(127, 1, 'add_reservation', 'User ID: 1 reserved place: 41 from 2025-06-18 00:00 to 2025-07-19 00:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:12:42'),
(128, 1, 'add_reservation', 'User ID: 1 reserved place: 42 from 2025-06-18 00:00 to 2025-06-19 10:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:13:06'),
(129, 1, 'add_reservation', 'User ID: 1 reserved place: 36 from 2025-06-20 00:00 to 2025-06-21 00:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:14:22'),
(130, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:14:37'),
(131, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:14:37'),
(132, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:15:13'),
(133, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:15:13'),
(134, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:16:51'),
(135, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:17:13'),
(136, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:17:21'),
(137, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:17:28'),
(138, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:17:54'),
(139, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:18:18'),
(140, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:18:20'),
(141, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:18:36'),
(142, 1, 'add_reservation', 'User ID: 1 reserved place: 43 from 2025-06-18 00:00 to 2025-06-19 03:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:24:30'),
(143, 1, 'add_reservation', 'starting date is after ending date for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:24:33'),
(144, 1, 'add_reservation', 'starting date is after ending date for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:29:59'),
(145, 1, 'add_reservation', 'starting date is after ending date for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:34:35'),
(146, 1, 'add_reservation', 'starting date is after ending date for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:39:36'),
(147, 1, 'add_reservation', 'starting date is after ending date for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:41:43'),
(148, 1, 'add_reservation', ' 2025-06-17 00:00 or 00:00  in the past for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:41:49'),
(149, 1, 'add_reservation', 'starting date is after ending date for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:41:56'),
(150, 1, 'add_reservation', 'starting date is after ending date for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:42:05'),
(151, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:43:06'),
(152, 1, 'add_reservation', ' 2025-06-17 00:00 or 17:45  in the past for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:43:10'),
(153, 1, 'add_reservation', 'starting date is after ending date for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:43:14'),
(154, 1, 'add_reservation', 'User ID: 1 reserved place: 44 from 2025-06-18 00:00 to 2025-06-18 17:45', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:43:20'),
(155, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:48:23'),
(156, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:48:32'),
(157, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:48:52'),
(158, 1, 'add_reservation', ' 2025-06-17 00:00 or 03:30  in the past for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:48:59'),
(159, 1, 'add_reservation', 'User ID: 1 reserved place: 45 from 2025-06-18 00:00 to 2025-06-18 03:30', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:49:03'),
(160, 1, 'add_reservation', 'User ID: 1 reserved place: 46 from 2025-06-18 00:00 to 2025-06-18 16:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:49:21'),
(161, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:53:41'),
(162, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:53:43'),
(163, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:54:53'),
(164, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:55:39'),
(165, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:56:07'),
(166, 1, 'add_reservation', 'User ID: 1 reserved place: 38 from 2025-06-17 22:15 to 2025-06-17 23:30', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:56:22'),
(167, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:56:27'),
(168, 1, 'add_reservation', 'User ID: 1 reserved place: 47 from 2025-06-17 21:15 to 2025-06-18 23:30', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:56:35'),
(169, 1, 'cancel Order', 'user 1 canceled reservation: 33', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 14:58:22'),
(170, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 15:08:46'),
(171, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 15:11:48'),
(172, 1, 'add_reservation', ' 2025-06-17 00:00 or 14:30  in the past for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 15:11:52'),
(173, 1, 'add_reservation', 'User ID: 1 reserved place: 48 from 2025-06-18 00:00 to 2025-06-18 14:30', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 15:11:56'),
(174, 1, 'Confirm Order', 'user 1 confirmed reservation: 41', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 16:34:30'),
(175, 1, 'Confirm Order', 'user 1 confirmed reservation: 52', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 16:40:35'),
(176, 1, 'Confirm Order', 'user 1 confirmed reservation: 44', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 16:41:49'),
(177, 1, 'add_reservation', 'start time is after end time for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 19:35:03'),
(178, 1, 'add_reservation', ' 2025-06-17 00:00 or 01:00  in the past for user ID: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 19:36:33'),
(179, 1, 'add_reservation', 'User ID: 1 reserved place: 39 from 2025-06-18 00:00 to 2028-06-20 01:00', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 19:36:37'),
(180, 1, 'cancel Order', 'user 1 canceled reservation: 54', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-17 19:37:04'),
(181, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 11:55:17'),
(182, 1, 'activate/deActivate', 'user 14 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 11:55:17'),
(183, 1, 'delete_user', 'Failed to delete user ID: 14 by admin: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 11:55:18'),
(184, 1, 'Logout', 'admin@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 12:33:58'),
(185, 14, 'login', 'Login successful user@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 12:34:04'),
(186, 14, 'Logout', 'user@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 12:34:31'),
(187, 14, 'login', 'Login successful user@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 12:34:37'),
(188, 14, 'Logout', 'user@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 12:35:01'),
(189, 14, 'login', 'Login successful user@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 12:35:06'),
(190, 14, 'Logout', 'user@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 12:41:53'),
(191, 14, 'login', 'Login successful user@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 12:42:00'),
(192, 14, 'Logout', 'user@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 12:45:02'),
(193, 14, 'login', 'Login successful user@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 12:45:08'),
(194, 14, 'Logout', 'user@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:01:55'),
(195, 14, 'login', 'Login successful user@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:02:01'),
(196, 14, 'Logout', 'user@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:03:00'),
(197, 14, 'login', 'Login successful user@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:03:14'),
(198, 14, 'Logout', 'user@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:03:19'),
(199, NULL, 'Logout', ' disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:16:20'),
(200, 14, 'login', 'Login successful user@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:16:33'),
(201, 14, 'cancel Order', 'user 14 canceled reservation: 34', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:17:03'),
(202, 14, 'Logout', 'user@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:17:05'),
(203, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:17:11'),
(204, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:17:55'),
(205, 1, 'Logout', 'admin@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:17:56'),
(206, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:18:01'),
(207, 1, 'Logout', 'admin@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:18:24'),
(208, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:18:29'),
(209, 1, 'Logout', 'admin@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:20:51'),
(210, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:22:56'),
(211, 1, 'Logout', 'admin@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:28:07'),
(212, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:28:15'),
(213, 1, 'Logout', 'admin@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:28:21'),
(214, 14, 'login', 'Login successful user@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 14:28:28'),
(215, 14, 'Logout', 'user@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 16:03:00'),
(216, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-18 16:03:10'),
(217, 1, 'Logout', 'admin@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 00:57:52'),
(218, NULL, 'login', 'Login attempt failed, invalid password admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 00:57:57'),
(219, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 00:58:02'),
(220, 1, 'activate/deActivate', 'user 1 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 00:59:20');
INSERT INTO `logs` (`id`, `user_id`, `action`, `action_details`, `client_ip`, `user_agent`, `created_at`) VALUES
(221, 1, 'activate/deActivate', 'user 1 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 00:59:20'),
(222, 1, 'Logout', 'admin@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', '2025-06-20 01:00:22'),
(223, NULL, 'login', 'Login attempt failed, invalid password admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:00:32'),
(224, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:00:39'),
(225, 1, 'Logout', 'admin@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:03:46'),
(226, NULL, 'login', 'Login attempt failed, missing input', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:03:51'),
(227, NULL, 'login', 'Login attempt failed, invalid password admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:04:01'),
(228, NULL, 'login', 'Login attempt failed, missing input', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:04:19'),
(229, NULL, 'login', 'Login attempt failed, invalid user', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:04:27'),
(230, NULL, 'login', 'Login attempt failed, missing input', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:04:30'),
(231, NULL, 'inscription Form', 'Le mot de passe et sa confirmation sont différents', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:05:32'),
(232, NULL, 'inscription Form', 'Invalid phone number', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:06:01'),
(233, NULL, 'inscription Form', 'testUser@mdp.comUser created successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:09:59'),
(234, NULL, 'login', 'Login attempt failed, missing input', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:10:19'),
(235, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:10:24'),
(236, 1, 'activate/deActivate', 'user 15 status changed by admin : 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 01:10:32'),
(237, 1, 'Logout', 'admin@mail.com disconnected from the site', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 18:33:53'),
(238, 1, 'login', 'Login successful admin@mail.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 18:34:01'),
(239, 1, 'delete_user', 'Failed to delete user ID: 15 by admin: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 18:34:06'),
(240, 1, 'delete_user', 'Failed to delete user ID: 15 by admin: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 18:34:15'),
(241, 1, 'delete_user', 'Failed to delete user ID: 15 by admin: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 18:54:21'),
(242, 1, 'delete_user', 'Failed to delete user ID: 15 by admin: 1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', '2025-06-20 18:55:54');

-- --------------------------------------------------------

--
-- Structure de la table `parkings`
--

DROP TABLE IF EXISTS `parkings`;
CREATE TABLE IF NOT EXISTS `parkings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `place_number` int NOT NULL,
  `type` enum('basic','handicapped','electric') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('free','premium') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'free',
  PRIMARY KEY (`id`),
  UNIQUE KEY `place_number` (`place_number`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `parkings`
--

INSERT INTO `parkings` (`id`, `place_number`, `type`, `status`) VALUES
(1, 1, 'handicapped', 'free'),
(2, 2, 'handicapped', 'free'),
(3, 3, 'handicapped', 'free'),
(4, 4, 'handicapped', 'free'),
(5, 5, 'handicapped', 'free'),
(6, 6, 'handicapped', 'free'),
(7, 7, 'handicapped', 'free'),
(8, 8, 'handicapped', 'free'),
(9, 9, 'handicapped', 'free'),
(10, 10, 'handicapped', 'free'),
(11, 11, 'electric', 'free'),
(12, 12, 'electric', 'free'),
(13, 13, 'electric', 'free'),
(14, 14, 'electric', 'free'),
(15, 15, 'electric', 'free'),
(16, 16, 'basic', 'free'),
(17, 17, 'basic', 'free'),
(18, 18, 'basic', 'free'),
(19, 19, 'basic', 'free'),
(20, 20, 'basic', 'free'),
(21, 21, 'basic', 'free'),
(22, 22, 'basic', 'free'),
(23, 23, 'basic', 'free'),
(24, 24, 'basic', 'free'),
(25, 25, 'basic', 'free'),
(26, 26, 'basic', 'free'),
(27, 27, 'basic', 'free'),
(28, 28, 'basic', 'free'),
(29, 29, 'basic', 'free'),
(30, 30, 'basic', 'free'),
(31, 31, 'electric', 'premium'),
(32, 32, 'electric', 'premium'),
(33, 33, 'electric', 'premium'),
(34, 34, 'electric', 'premium'),
(35, 35, 'electric', 'premium'),
(36, 36, 'basic', 'premium'),
(37, 37, 'basic', 'premium'),
(38, 38, 'basic', 'premium'),
(39, 39, 'basic', 'premium'),
(40, 40, 'basic', 'premium'),
(41, 41, 'basic', 'premium'),
(42, 42, 'basic', 'premium'),
(43, 43, 'basic', 'premium'),
(44, 44, 'basic', 'premium'),
(45, 45, 'basic', 'premium'),
(46, 46, 'basic', 'premium'),
(47, 47, 'basic', 'premium'),
(48, 48, 'basic', 'premium'),
(49, 49, 'basic', 'premium'),
(50, 50, 'basic', 'premium');

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reservation_id` int NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `status` enum('failed','validated') NOT NULL,
  `paid_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `reservation_id` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pricing`
--

DROP TABLE IF EXISTS `pricing`;
CREATE TABLE IF NOT EXISTS `pricing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` enum('day','night','week-end','special') NOT NULL,
  `price` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pricing`
--

INSERT INTO `pricing` (`id`, `time`, `price`) VALUES
(1, 'day', 1.00),
(2, 'night', 0.70),
(3, 'week-end', 2.00),
(4, 'special', 0.70);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `parking_id` int NOT NULL,
  `car_id` int NOT NULL,
  `status` enum('waiting','canceled','confirmed','expired') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `parking_id` (`parking_id`),
  KEY `car_id` (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `parking_id`, `car_id`, `status`, `created_at`, `start_time`, `end_time`) VALUES
(1, 1, 31, 1, 'canceled', '2025-06-12 20:12:47', '2025-06-13 00:00:00', '2025-06-13 02:45:00'),
(2, 1, 32, 1, 'canceled', '2025-06-12 20:12:57', '2025-06-13 01:45:00', '2025-06-13 17:15:00'),
(3, 1, 1, 1, 'confirmed', '2025-06-13 21:10:30', '2025-06-14 00:00:00', '2025-06-14 01:15:00'),
(4, 1, 31, 1, 'canceled', '2025-06-13 21:10:37', '2025-06-14 00:00:00', '2025-06-14 01:45:00'),
(5, 1, 36, 1, 'canceled', '2025-06-13 21:10:44', '2025-06-15 00:00:00', '2025-06-15 18:30:00'),
(6, 1, 31, 1, 'canceled', '2025-06-14 19:23:39', '2025-06-15 00:00:00', '2025-06-15 18:00:00'),
(7, 1, 32, 1, 'canceled', '2025-06-14 19:23:46', '2025-06-15 00:00:00', '2025-06-15 01:45:00'),
(8, 1, 33, 1, 'canceled', '2025-06-14 19:23:52', '2025-06-15 00:00:00', '2025-06-15 02:00:00'),
(9, 1, 31, 1, 'canceled', '2025-06-14 20:55:24', '2025-06-15 00:00:00', '2025-06-15 02:00:00'),
(10, 1, 32, 1, 'canceled', '2025-06-14 20:55:30', '2025-06-15 00:00:00', '2025-06-15 02:15:00'),
(11, 1, 31, 1, 'canceled', '2025-06-14 20:57:44', '2025-06-15 00:00:00', '2025-06-15 03:15:00'),
(12, 1, 31, 1, 'canceled', '2025-06-14 20:58:57', '2025-06-14 22:30:00', '2025-06-14 23:15:00'),
(13, 1, 31, 1, 'canceled', '2025-06-14 21:05:51', '2025-06-15 00:00:00', '2025-06-15 01:30:00'),
(14, 1, 32, 1, 'canceled', '2025-06-14 21:05:57', '2025-06-15 00:00:00', '2025-06-15 02:45:00'),
(15, 1, 33, 1, 'canceled', '2025-06-14 21:06:04', '2025-06-15 00:00:00', '2025-06-15 02:45:00'),
(16, 1, 31, 1, 'canceled', '2025-06-14 21:12:59', '2025-06-15 00:00:00', '2025-06-15 03:15:00'),
(17, 1, 31, 1, 'canceled', '2025-06-14 21:13:14', '2025-06-15 00:00:00', '2025-06-15 02:15:00'),
(18, 1, 32, 1, 'canceled', '2025-06-14 21:13:19', '2025-06-15 00:00:00', '2025-06-15 03:15:00'),
(19, 1, 33, 1, 'canceled', '2025-06-14 21:13:26', '2025-06-15 00:00:00', '2025-06-15 15:45:00'),
(20, 1, 1, 1, 'canceled', '2025-06-14 21:18:19', '2025-06-15 00:00:00', '2025-06-15 01:45:00'),
(21, 1, 36, 1, 'canceled', '2025-06-14 21:18:30', '2025-06-15 12:45:00', '2025-06-15 19:15:00'),
(22, 1, 31, 1, 'canceled', '2025-06-14 21:18:39', '2025-06-15 00:00:00', '2025-06-15 17:45:00'),
(23, 1, 1, 1, 'canceled', '2025-06-14 21:41:18', '2025-06-15 00:00:00', '2025-06-15 13:15:00'),
(24, 1, 31, 1, 'confirmed', '2025-06-15 12:15:12', '2025-06-16 00:00:00', '2025-06-16 02:00:00'),
(25, 1, 32, 1, 'confirmed', '2025-06-15 12:22:04', '2025-06-16 00:00:00', '2025-06-16 02:00:00'),
(26, 1, 33, 1, 'confirmed', '2025-06-15 12:22:09', '2025-06-16 00:00:00', '2025-06-16 02:45:00'),
(27, 1, 32, 1, 'confirmed', '2025-06-15 12:25:23', '2025-06-16 00:00:00', '2025-06-16 02:45:00'),
(28, 1, 36, 1, 'confirmed', '2025-06-15 12:31:06', '2025-06-16 00:00:00', '2025-06-16 02:00:00'),
(29, 1, 36, 1, 'confirmed', '2025-06-15 12:34:15', '2025-06-16 00:00:00', '2025-06-16 02:30:00'),
(30, 1, 37, 1, 'confirmed', '2025-06-15 12:34:18', '2025-06-16 00:00:00', '2025-06-16 04:00:00'),
(31, 1, 1, 1, 'confirmed', '2025-06-15 12:34:27', '2025-06-16 00:00:00', '2025-06-16 02:45:00'),
(32, 1, 31, 1, 'confirmed', '2025-06-15 12:34:32', '2025-06-16 00:00:00', '2025-06-16 03:00:00'),
(33, 1, 36, 1, 'canceled', '2025-06-15 12:40:18', '2025-06-16 00:00:00', '2025-06-16 03:15:00'),
(34, 14, 16, 2, 'canceled', '2025-06-17 12:01:34', '2025-06-18 00:00:00', '2025-06-18 03:45:00'),
(35, 14, 11, 3, 'confirmed', '2025-06-17 12:01:42', '2025-06-18 00:00:00', '2025-06-18 16:00:00'),
(36, 14, 1, 2, 'waiting', '2025-06-17 12:01:50', '2025-06-19 00:00:00', '2025-06-19 14:15:00'),
(37, 1, 36, 1, 'waiting', '2025-06-17 12:16:22', '2025-06-18 00:00:00', '2025-06-18 02:15:00'),
(38, 1, 37, 1, 'waiting', '2025-06-17 12:17:07', '2025-06-18 00:00:00', '2025-06-18 02:15:00'),
(39, 1, 38, 1, 'waiting', '2025-06-17 12:35:05', '2025-06-18 00:00:00', '2025-06-18 03:00:00'),
(40, 1, 36, 1, 'waiting', '2025-06-17 12:35:42', '2025-06-17 16:00:00', '2025-06-17 23:30:00'),
(41, 1, 39, 1, 'confirmed', '2025-06-17 12:56:24', '2025-06-18 00:00:00', '2025-06-18 02:45:00'),
(42, 1, 37, 1, 'waiting', '2025-06-17 13:22:14', '2025-06-17 18:00:00', '2025-06-18 00:00:00'),
(43, 1, 40, 1, 'waiting', '2025-06-17 14:12:09', '2025-06-18 00:00:00', '2025-06-19 00:00:00'),
(44, 1, 41, 1, 'confirmed', '2025-06-17 14:12:42', '2025-06-18 00:00:00', '2025-07-19 00:00:00'),
(45, 1, 42, 1, 'waiting', '2025-06-17 14:13:06', '2025-06-18 00:00:00', '2025-06-19 10:00:00'),
(46, 1, 36, 1, 'expired', '2025-06-17 14:14:22', '2025-06-20 00:00:00', '2025-06-21 00:00:00'),
(47, 1, 43, 1, 'waiting', '2025-06-17 14:24:30', '2025-06-18 00:00:00', '2025-06-19 03:45:00'),
(48, 1, 44, 1, 'waiting', '2025-06-17 14:43:20', '2025-06-18 00:00:00', '2025-06-18 17:45:00'),
(49, 1, 45, 1, 'waiting', '2025-06-17 14:49:03', '2025-06-18 00:00:00', '2025-06-18 03:30:00'),
(50, 1, 46, 1, 'waiting', '2025-06-17 14:49:21', '2025-06-18 00:00:00', '2025-06-18 16:00:00'),
(51, 1, 38, 1, 'waiting', '2025-06-17 14:56:22', '2025-06-17 22:15:00', '2025-06-17 23:30:00'),
(52, 1, 47, 1, 'confirmed', '2025-06-17 14:56:35', '2025-06-17 21:15:00', '2025-06-18 23:30:00'),
(53, 1, 48, 1, 'waiting', '2025-06-17 15:11:56', '2025-06-18 00:00:00', '2025-06-18 14:30:00'),
(54, 1, 39, 1, 'canceled', '2025-06-17 19:36:37', '2025-06-18 00:00:00', '2028-06-20 01:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `group_id` int NOT NULL,
  `surName` varchar(100) NOT NULL,
  `subbed` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `email`, `phone`, `password`, `is_active`, `created_at`, `group_id`, `surName`, `subbed`) VALUES
(1, 'admin', 'admin@mail.com', '0102030102', '$2y$10$tuF.XFIeGkbqfy254zcdLuF7S.WKga5F0WvAmBpqGZZ/Uwqbd.xeC', 1, '2025-05-04 23:39:31', 2, 'adminName', 1),
(13, 'admin2', 'admin2@mail.com', '0102030102', '$2y$10$b4KB0xgtg3FG2PLGkc7sZ.yy0Mkc2VQA2Nrn6q6pKokWm9iDO7AvG', 1, '2025-06-01 16:06:30', 2, 'X', 0),
(14, 'user', 'user@mail.com', '0102112211', '$2y$10$.y8NyJBULLvmBIjrdOgvyeMezrAwW4X7KwVuv0zm3.186mnYQUOQS', 1, '2025-06-09 18:24:31', 1, 'X', 0),
(15, 'A', 'testUser@mdp.com', '0102010201', '$2y$10$fs2oIeMLGkCAEg49hUmuUevDLBWCxI9UeA5K84lz2wM.SiUUb1l9.', 0, '2025-06-20 01:09:59', 1, 'B', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Contraintes pour la table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`parking_id`) REFERENCES `parkings` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
