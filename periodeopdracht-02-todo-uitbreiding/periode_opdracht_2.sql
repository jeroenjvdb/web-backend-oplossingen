-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 14 jan 2015 om 14:35
-- Serverversie: 5.6.20
-- PHP-versie: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `periode_opdracht_2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `done` tinyint(1) NOT NULL,
  `is_archived` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Gegevens worden geëxporteerd voor tabel `items`
--

INSERT INTO `items` (`id`, `user_id`, `name`, `done`, `is_archived`, `created_at`, `updated_at`) VALUES
(1, 1, 'eten', 0, 0, '2015-01-12 07:55:03', '2015-01-12 08:11:17'),
(2, 2, 'lalala', 0, 1, '2015-01-12 08:18:35', '2015-01-12 09:55:54'),
(3, 2, 'toriko zien', 0, 1, '2015-01-12 08:26:32', '2015-01-12 08:26:41'),
(4, 2, 'check', 1, 1, '2015-01-12 09:56:32', '2015-01-12 10:00:51'),
(5, 2, 'check2', 0, 0, '2015-01-12 09:58:12', '2015-01-12 11:12:31'),
(6, 2, 'check3', 0, 0, '2015-01-12 09:58:55', '2015-01-12 11:12:52'),
(7, 8, 'aankleden', 1, 0, '2015-01-12 11:14:28', '2015-01-12 11:17:34'),
(8, 8, 'roken', 1, 1, '2015-01-12 11:14:39', '2015-01-12 12:11:47'),
(9, 8, 'deo', 1, 0, '2015-01-12 11:14:50', '2015-01-12 11:17:19'),
(10, 8, 'matras weg', 1, 0, '2015-01-12 11:15:04', '2015-01-12 11:17:09'),
(11, 9, 'kamer opruimen', 1, 1, '2015-01-12 12:13:50', '2015-01-12 12:15:35'),
(12, 9, 'tv kijken', 0, 0, '2015-01-12 12:15:57', '2015-01-12 12:15:57');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_01_11_163535_create_users_table', 1),
('2015_01_11_164205_create_items_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test@test.be', '$2y$10$HgaQNNrp/w1/dDTBD2Pf7uv00VGSO0KhP.SBvH7xML1iZ2pwl2572', 'DtZYRYj4v44Dpjhcx9lpNgGajNazZ3BW245FU0zqhVaPSNpI8nj7eNlfxHaV', '0000-00-00 00:00:00', '2015-01-12 08:17:52'),
(2, 'jeroen@hotmail.com', '$2y$10$EMN13AfMdr5BzJIpEZJ6NOw0M/RjuAnWISEcxiPDzQeS6lR8l1Bj.', '8ZXkqh6Sgwqa2qESn5serDGZwavwtPDJEOlaUrxcctDT3oP2uihdF1ZO0Twi', '2015-01-12 08:18:11', '2015-01-12 11:13:35'),
(3, 'jeroen.vandenbroeck@student.kdg.be', '$2y$10$/rkOZ//NqeyNEK9Y7HQPUeTwJm/Ltm0ERNHiTfdunso8vx3Zm/PYy', '6sJ9QWyvqvDHmhfbs60wpEeYIjN9xh6D0C5xRa6z4ktgt1cS0FhicSWIjJf1', '2015-01-12 10:23:42', '2015-01-12 10:24:27'),
(4, 'jeroen.vandenbroeck@student.kdg.be', '$2y$10$6qnICv2aZaQGf9p6Z4fOL.cXG3Yq1C1Z9IazWT3rYKQ/MXrlrAL7S', '', '2015-01-12 10:24:21', '2015-01-12 10:24:21'),
(5, 'jera', '$2y$10$NkjCiEWX1jlRO0nXO5M9QOYIIHao95z59Qbm2AkPV3ir3bIuUC6na', 'qNT9hWLBLobDth2Qz4KkFc5GIDt2OYRQBDBjStgNvVYimYc38BeXiMsjQ6yx', '2015-01-12 10:25:33', '2015-01-12 10:25:53'),
(6, 'jer', '$2y$10$40nqWoPERCfAPEfAMWu1dOFwWtC7x.CTCCmsmxS9kknpOXsvOKAX2', 'jLCyhytCQAqkZp1WO028uRUkNX7vqdCJCOAeETVMmJfKrTW7KTUQExIqdpRs', '2015-01-12 10:30:15', '2015-01-12 10:40:43'),
(7, 'jer', '$2y$10$a82KlzjhPzct63e.4LtCC.e.dffPdUte1tv3.DIC0Wp8cj7I3T0RO', '', '2015-01-12 10:34:50', '2015-01-12 10:34:50'),
(8, 'm.vdb@hotmail.com', '$2y$10$0zv7DWzLVOra7wptBDqbSeSenv2m0Y4XGj9WxJabe50t7r3UCvcz2', '9XtI0NLPvyV72kwUI8l9FcdnWYfuJEOUP5qxAiTVKEsdx0yEEBdS43odwzEs', '2015-01-12 11:14:09', '2015-01-12 12:11:51'),
(9, 'karen.verbeke@skynet.be', '$2y$10$EUWxHwWsSUudc0/NMWiUjupxmM96/FDNG2rqXqK1MeFCR12.JAaba', '0CohAaa3chPsx4Z2LuUTKdbq1plCTYukAp0vjSBXUZLRMe701wBaLXlWlyFb', '2015-01-12 12:13:30', '2015-01-12 12:16:08'),
(10, 'jeroen_vdb1@hotmail.com', '$2y$10$HPhN7OWoWPZucEEER.YoHePAoik8Ou8jo1TAXDJg53qv9ik6nqpuW', '', '2015-01-12 12:16:20', '2015-01-12 12:16:20');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `items`
--
ALTER TABLE `items`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
