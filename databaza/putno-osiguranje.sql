-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 05:43 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putno-osiguranje`
--

-- --------------------------------------------------------

--
-- Table structure for table `dodatna_lica_na_polisi`
--

CREATE TABLE `dodatna_lica_na_polisi` (
  `id` int(11) NOT NULL,
  `nosilac_osiguranja_id` int(11) NOT NULL,
  `dodatno_ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dodatno_prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dodatno_broj_telefona` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dodatno_broj_pasosa` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nosilac_osiguranja`
--

CREATE TABLE `nosilac_osiguranja` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datum_rodjenja` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `broj_pasosa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datum_putovanja` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datum_isteka_putnog_osiguranja` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `broj_dana` int(11) NOT NULL,
  `individualno_grupno` tinyint(4) NOT NULL DEFAULT 0,
  `poslato` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dodatna_lica_na_polisi`
--
ALTER TABLE `dodatna_lica_na_polisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nosilac_osiguranja_id` (`nosilac_osiguranja_id`);

--
-- Indexes for table `nosilac_osiguranja`
--
ALTER TABLE `nosilac_osiguranja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dodatna_lica_na_polisi`
--
ALTER TABLE `dodatna_lica_na_polisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nosilac_osiguranja`
--
ALTER TABLE `nosilac_osiguranja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
