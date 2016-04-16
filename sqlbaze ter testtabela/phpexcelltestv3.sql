-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2016 at 03:54 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proizvajalci`
--

CREATE TABLE IF NOT EXISTS `proizvajalci` (
`id` int(11) NOT NULL,
  `ime` varchar(250) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ostalo`
--
ALTER TABLE `ostalo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proizvajalci`
--
ALTER TABLE `proizvajalci`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
