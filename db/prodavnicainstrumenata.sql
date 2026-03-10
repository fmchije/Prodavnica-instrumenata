-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2016 at 05:34 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prodavnicainstrumenata`
--

-- --------------------------------------------------------

--
-- Table structure for table `grupaproizvoda`
--

CREATE TABLE IF NOT EXISTS `grupaproizvoda` (
  `SifraGrupeProizvoda` int(11) NOT NULL AUTO_INCREMENT,
  `NazivGrupeProizvoda` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SifraGrupeProizvoda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `grupaproizvoda`
--

INSERT INTO `grupaproizvoda` (`SifraGrupeProizvoda`, `NazivGrupeProizvoda`) VALUES
(1, 'GItare'),
(3, 'Bubnjevi');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE IF NOT EXISTS `proizvod` (
  `SifraProizvoda` int(11) NOT NULL AUTO_INCREMENT,
  `SifraGrupeProizvoda` int(11) NOT NULL,
  `Cena` int(15) NOT NULL,
  `NazivProizvoda` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SifraProizvoda`),
  UNIQUE KEY `SifraProizvoda` (`SifraProizvoda`),
  UNIQUE KEY `SifraProizvoda_2` (`SifraProizvoda`),
  KEY `SifraGrupeProizvoda` (`SifraGrupeProizvoda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=74 ;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`SifraProizvoda`, `SifraGrupeProizvoda`, `Cena`, `NazivProizvoda`) VALUES
(40, 3, 202380, 'Fender American Vintage 64 Telecaster'),
(41, 1, 295205, 'EVH Wolfgang USA Vintage White'),
(42, 1, 246000, 'GIBSON Les Paul Standard Premium'),
(43, 3, 257520, 'Fender GE Smith Telecaster Maple Fretboard'),
(44, 1, 48290, 'JACKSON DK27 CBL JKSN DINKY'),
(45, 1, 239500, 'Fender Eric Clapton Stratocaster Maple Fretboard'),
(46, 1, 229400, 'Fender American Deluxe Stratocaster Left Handed'),
(47, 1, 104690, 'Jackson SL2 Pro Series Soloist'),
(48, 1, 30260, 'Squier By Fender Affinity Series Tele'),
(49, 1, 142680, 'GIBSON SG 61 Reissue Faded Worn Cherry Chrome '),
(50, 1, 307510, 'YAMAHA SG1820LTD HONEY BURST'),
(51, 1, 70590, 'Epiphone Les Paul Custom PRO Ebony Gold '),
(52, 1, 58390, 'Fender Modern Player Telecaster Plus'),
(53, 1, 62855, 'CHARVEL Desolation Skatecaster SK-1'),
(54, 1, 83230, 'IBANEZ RG870QMZ RDT Premium'),
(55, 1, 74204, 'Epiphone Casino Nat Ch Hdwe'),
(56, 1, 177642, 'ESP M II/R EMG BK W/C'),
(57, 1, 86400, 'Steinberger Synapse SS 2F Custom'),
(58, 3, 182800, 'SONOR ASC 11 Stage 2 Set WM Ebony Stripes 13078'),
(59, 3, 169950, 'Sonor SEF 11 Stage 2 Set WM'),
(60, 3, 202913, 'YAMAHA NY2T4AAMS OAK CUSTOM SHELL SET AMBER SUNBUR'),
(61, 3, 123185, 'Mapex Meridian Maple MP5245 TZ'),
(62, 3, 100560, 'Yamaha SCB2FS5 Stage Custom '),
(63, 3, 55046, 'MAPEX Horizon HX5045T BL '),
(64, 3, 101945, 'MAPEX Meridian Maple MP5245 RO'),
(65, 3, 109735, 'Tama Silverstar VP62R Dark Mocha Fade '),
(66, 3, 120000, 'Tama Imperial Star IP52KH5 Black '),
(67, 3, 127480, 'Tama Superstar SL52HXZB5'),
(68, 3, 83880, 'Gretsch Drums CC1-E824-COS '),
(69, 3, 44400, 'CB Drums CB5LB-WR '),
(70, 3, 35746, 'Alesis DM Lite Kit Elektronski Bubnjevi'),
(71, 3, 92720, 'Roland TD-4KP Elektronski bubnjevi'),
(72, 3, 61364, 'Yamaha DTX400K Elektronski bubnjevi');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `proizvod_ibfk_1` FOREIGN KEY (`SifraGrupeProizvoda`) REFERENCES `grupaproizvoda` (`SifraGrupeProizvoda`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
