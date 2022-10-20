-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Okt 20, 2022 kell 08:04 EL
-- Serveri versioon: 10.4.16-MariaDB
-- PHP versioon: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `tunniplaan`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `kassid`
--

CREATE TABLE `kassid`
(
    `id`        int(11)       NOT NULL,
    `kassinimi` varchar(50)   NOT NULL,
    `toon`      varchar(1500) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Andmete tõmmistamine tabelile `kassid`
--

INSERT INTO `kassid` (`id`, `kassinimi`, `toon`)
VALUES (1, 'Miisu', 'gray'),
       (2, 'Nurr',
        'repeating-linear-gradient(\r\n    135deg,\r\n    #D50000,\r\n    #D50000 20px,\r\n    #C51162 20px,\r\n    #C51162 40px,\r\n    #AA00FF 40px,\r\n    #AA00FF 60px,\r\n    #6200EA 60px,\r\n    #6200EA 80px,\r\n    #304FFE 80px,\r\n    #304FFE 100px,\r\n    #2962FF 100px,\r\n    #2962FF 120px,\r\n    #0091EA 120px,\r\n    #0091EA 140px,\r\n    #00B8D4 140px,\r\n    #00B8D4 160px,\r\n    #00BFA5 160px,\r\n    #00BFA5 180px,\r\n    #00C853 180px,\r\n    #00C853 200px,\r\n    #64DD17 200px,\r\n    #64DD17 220px,\r\n    #AEEA00 220px,\r\n    #AEEA00 240px,\r\n    #FFD600 240px,\r\n    #FFD600 260px,\r\n    #FFAB00 260px,\r\n    #FFAB00 280px,\r\n    #FF6D00 280px,\r\n    #FF6D00 300px,\r\n    #DD2C00 300px,\r\n    #DD2C00 320px\r\n  );');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `lehed`
--

CREATE TABLE `lehed`
(
    `id`       int(11) NOT NULL,
    `pealkiri` varchar(50) DEFAULT NULL,
    `sisu`     text        DEFAULT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

--
-- Andmete tõmmistamine tabelile `lehed`
--

INSERT INTO `lehed` (`id`, `pealkiri`, `sisu`)
VALUES (1, 'Ilmateade', 'Kuiv ilm.'),
       (2, 'Korvpall', 'Treening reedel kell 18'),
       (5, 'Matemaatika', 'Homme tunnikontroll'),
       (6, 'XSS', '<script>alert(\'hacked!\');</script>');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `kassid`
--
ALTER TABLE `kassid`
    ADD PRIMARY KEY (`id`);

--
-- Indeksid tabelile `lehed`
--
ALTER TABLE `lehed`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `kassid`
--
ALTER TABLE `kassid`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT tabelile `lehed`
--
ALTER TABLE `lehed`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
