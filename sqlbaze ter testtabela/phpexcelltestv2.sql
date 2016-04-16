-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2016 at 03:16 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpexcelltest`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE IF NOT EXISTS `kategorije` (
`id` int(11) NOT NULL,
  `ime` varchar(250) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id`, `ime`) VALUES
(42, 'izpušna cev'),
(44, 'velika cev');

-- --------------------------------------------------------

--
-- Table structure for table `ostalo`
--

CREATE TABLE IF NOT EXISTS `ostalo` (
`id` int(11) NOT NULL,
  `cena` varchar(250) COLLATE utf8_slovenian_ci NOT NULL,
  `sifra` varchar(250) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(250) COLLATE utf8_slovenian_ci NOT NULL,
  `k_ime` varchar(250) COLLATE utf8_slovenian_ci NOT NULL,
  `p_ime` varchar(250) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `ostalo`
--

INSERT INTO `ostalo` (`id`, `cena`, `sifra`, `ime`, `k_ime`, `p_ime`) VALUES
(21, '1000$', '0cd4e4d964ea8fddb48dc2cd3a1e72db', '4', 'izpušna cev', 'mercedes'),
(22, '1500$', 'a2fd4ae8f0c82a10b207f5ff9a0e4052', '3', 'izpušna cev', 'avdi'),
(23, '1000$', 'b644725c71e83b50304a636d1891ee21', '2', 'velika cev', 'mercedes'),
(24, '1500$', '0c106818f28a1236db407e7e3894c6a8', '1', 'velika cev', 'avdi'),
(25, 'nevem', 'nevem', 'aaaa', '2313', '213214');

-- --------------------------------------------------------

--
-- Table structure for table `proizvajalci`
--

CREATE TABLE IF NOT EXISTS `proizvajalci` (
`id` int(11) NOT NULL,
  `ime` varchar(250) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `proizvajalci`
--

INSERT INTO `proizvajalci` (`id`, `ime`) VALUES
(43, 'avdi'),
(42, 'mercedes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ime` (`ime`);

--
-- Indexes for table `ostalo`
--
ALTER TABLE `ostalo`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `sifra` (`sifra`);

--
-- Indexes for table `proizvajalci`
--
ALTER TABLE `proizvajalci`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ime` (`ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `ostalo`
--
ALTER TABLE `ostalo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `proizvajalci`
--
ALTER TABLE `proizvajalci`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
