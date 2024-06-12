-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: iun. 12, 2024 la 05:49 PM
-- Versiune server: 8.2.0
-- Versiune PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `internships`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `oferte`
--

DROP TABLE IF EXISTS `oferte`;
CREATE TABLE IF NOT EXISTS `oferte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nume_firma` varchar(255) NOT NULL,
  `domeniu` varchar(255) NOT NULL,
  `salariu` decimal(10,2) NOT NULL,
  `perioada` int NOT NULL,
  `descriere` text NOT NULL,
  `email_contact` varchar(255) NOT NULL,
  `telefon_contact` varchar(15) NOT NULL,
  `poza` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
