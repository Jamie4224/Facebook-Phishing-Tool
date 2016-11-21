-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 12 nov 2016 om 14:18
-- Serverversie: 10.1.13-MariaDB
-- PHP-versie: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fbphish`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fbphish_data`
--

CREATE TABLE `fbphish_data` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `record_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(510) NOT NULL,
  `email_confirm` varchar(510) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday_day` int(30) NOT NULL,
  `birthday_month` int(30) NOT NULL,
  `birthday_year` int(30) NOT NULL,
  `sex` int(30) NOT NULL,
  `locale` varchar(30) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `meta_user_ip` varchar(255) NOT NULL,
  `missing` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `fbphish_data`
--
ALTER TABLE `fbphish_data`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `fbphish_data`
--
ALTER TABLE `fbphish_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
