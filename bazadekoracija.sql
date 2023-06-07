-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 08:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazadekoracija`
--

-- --------------------------------------------------------

--
-- Table structure for table `dekoracija`
--

CREATE TABLE `dekoracija` (
  `imePrezime` varchar(255) NOT NULL,
  `broj` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tip` varchar(255) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `datum` varchar(30) NOT NULL,
  `zahtevi` varchar(255) NOT NULL,
  `ID_dek` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dekoracija`
--

INSERT INTO `dekoracija` (`imePrezime`, `broj`, `email`, `tip`, `paket`, `datum`, `zahtevi`, `ID_dek`) VALUES
('korisnik', '12938381', 'korisnik@gmail.com', 'svadba', 'premium', '2023-03-31', 'Poruka opis', 34);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnika` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sifra` varchar(255) NOT NULL,
  `privilegija` int(32) NOT NULL DEFAULT 33
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnika`, `ime`, `email`, `sifra`, `privilegija`) VALUES
(1, 'administrator', 'admin@admin.rs', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 11),
(9, 'menadzer', 'menadzer@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 22),
(24, 'korisnik', 'korisnik@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 33);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `paketID` int(32) NOT NULL,
  `naziv` varchar(32) NOT NULL,
  `opisPaketa` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`paketID`, `naziv`, `opisPaketa`) VALUES
(3, 'exclusive', 'Neograničen izbor. Za velike prostore. Jedinstvena dekoracija, one-of-a-kind. Naša preporuka ako želite dekoraciju godine'),
(2, 'premium', 'Najprodavaniji paket!\r\nZa prostor koji ne ograničava dekoraciju. Cveće, baloni, pozadine za slikanje... Raskošna dekoracija'),
(1, 'standard', 'Najjeftiniji paket aranžman.Perfektno za manje prostore. Jednostavna dekoracija sa jednom temom. Ograničen izbor.');

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

CREATE TABLE `poruke` (
  `ime` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `naslov` varchar(30) NOT NULL,
  `poruka` varchar(300) NOT NULL,
  `IdPoruke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poruke`
--

INSERT INTO `poruke` (`ime`, `email`, `tel`, `naslov`, `poruka`, `IdPoruke`) VALUES
('Ime', 'email@email.com', '06235123', 'Naslov', 'Poruka', 4),
('ime', 'mail@mail.com', '1231412', 'Naslov', 'Poruka', 5),
('asdasd', 'asdas@msam.com', 'asd', 'asdas', 'asdasd', 6);

-- --------------------------------------------------------

--
-- Table structure for table `rola`
--

CREATE TABLE `rola` (
  `ID_Role` int(32) NOT NULL,
  `privilegija` varchar(32) NOT NULL,
  `datum` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rola`
--

INSERT INTO `rola` (`ID_Role`, `privilegija`, `datum`) VALUES
(11, 'admin', '20.01.2023'),
(22, 'menadzer', '20.01.2023'),
(33, 'korisnik', '20.01.2023');

-- --------------------------------------------------------

--
-- Table structure for table `tip`
--

CREATE TABLE `tip` (
  `tipID` int(32) NOT NULL,
  `tipDekoracije` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tip`
--

INSERT INTO `tip` (`tipID`, `tipDekoracije`) VALUES
(333, 'ostalo'),
(222, 'rodjendan'),
(111, 'svadba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dekoracija`
--
ALTER TABLE `dekoracija`
  ADD PRIMARY KEY (`ID_dek`),
  ADD KEY `email` (`email`) USING BTREE,
  ADD KEY `paket` (`paket`),
  ADD KEY `tip` (`tip`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnika`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `privilegija` (`privilegija`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`naziv`);

--
-- Indexes for table `poruke`
--
ALTER TABLE `poruke`
  ADD PRIMARY KEY (`IdPoruke`);

--
-- Indexes for table `rola`
--
ALTER TABLE `rola`
  ADD PRIMARY KEY (`ID_Role`);

--
-- Indexes for table `tip`
--
ALTER TABLE `tip`
  ADD PRIMARY KEY (`tipDekoracije`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dekoracija`
--
ALTER TABLE `dekoracija`
  MODIFY `ID_dek` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `poruke`
--
ALTER TABLE `poruke`
  MODIFY `IdPoruke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dekoracija`
--
ALTER TABLE `dekoracija`
  ADD CONSTRAINT `dekoracija_ibfk_1` FOREIGN KEY (`email`) REFERENCES `korisnik` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dekoracija_ibfk_4` FOREIGN KEY (`paket`) REFERENCES `paket` (`naziv`),
  ADD CONSTRAINT `dekoracija_ibfk_5` FOREIGN KEY (`tip`) REFERENCES `tip` (`tipDekoracije`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`privilegija`) REFERENCES `rola` (`ID_Role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
