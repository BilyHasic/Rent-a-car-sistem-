-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 07:45 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `auta`
--

CREATE TABLE `auta` (
  `ID` int(11) NOT NULL,
  `imeAuta` varchar(250) NOT NULL,
  `modelAuta` varchar(250) NOT NULL,
  `brojVrata` varchar(250) NOT NULL,
  `brojSjedista` varchar(250) NOT NULL,
  `klima` varchar(250) NOT NULL,
  `gorivo` varchar(250) NOT NULL,
  `transmisija` varchar(250) NOT NULL,
  `slika` varchar(250) NOT NULL,
  `cijena` int(11) NOT NULL,
  `stanje` varchar(250) NOT NULL DEFAULT 'Na stanju'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auta`
--

INSERT INTO `auta` (`ID`, `imeAuta`, `modelAuta`, `brojVrata`, `brojSjedista`, `klima`, `gorivo`, `transmisija`, `slika`, `cijena`, `stanje`) VALUES
(135, 'Audi', 'A6', '5', '5', 'DA', 'Dizel', 'Manuelni', 'slike_auta/audi_a6_slika1.jpg', 150, 'Na stanju'),
(136, 'Mercedes', 'ML', '5', '5', 'DA', 'Benzin', 'Automatik', 'slike_auta/mercedes_ml_slika3.jpg', 120, 'Na stanju'),
(137, 'Audi', 'Q7', '5', '5', 'DA', 'Dizel', 'Automatik', 'slike_auta/audi_q7_slika2.jpg', 180, 'Na stanju'),
(138, 'Mercedes', 'E', '5', '5', 'DA', 'Benzin', 'Manuelni', 'slike_auta/mercedes_e_slika4.jpg', 130, 'Na stanju'),
(139, 'VW', 'Golf 6', '5', '5', 'DA', 'Dizel', 'Manuelni', 'slike_auta/golf_6_slika5.jpeg', 100, 'Na stanju'),
(140, 'VW', 'Passat B7', '5', '5', 'DA', 'Benzin', 'Manuelni', 'slike_auta/passat_b7_slika6.jpg', 100, 'Na stanju'),
(141, 'Volvo', 'XC 60', '5', '5', 'DA', 'Dizel', 'Automatik', 'slike_auta/volvo_xc60_slika7.jpg', 150, 'Na stanju'),
(142, 'BMW', 'X8', '5', '5', 'DA', 'Benzin', 'Automatik', 'slike_auta/bmw_x8_slika8.jpeg', 200, 'Na stanju'),
(143, 'BMW', 'M5', '5', '5', 'DA', 'Dizel', 'Manuelni', 'slike_auta/bmw_m5_slika9.jpg', 110, 'Na stanju'),
(144, 'Porsche', 'Panamera', '2', '2', 'DA', 'Benzin', 'Automatik', 'slike_auta/porsche_panamera_slika10.jpg', 250, 'Na stanju'),
(146, 'Lamburghini', 'Aventador', '2', '2', 'DA', 'Benzin', 'Automatik', 'slike_auta/lamburghini_aventador_slika12.jpg', 300, 'Na stanju'),
(147, 'Bugatti', 'Rompe', '2', '2', 'DA', 'Dizel', 'Automatik', 'slike_auta/bugatti_rompe_slika13.jpg', 450, 'Na stanju'),
(148, 'Alfa Romeo', 'Gulia', '5', '5', 'DA', 'Benzin', 'Manuelni', 'slike_auta/alfaRomeo_gulia_slika14.jpg', 120, 'Na stanju'),
(182, 'Porsche', 'Cayenne', '5', '5', 'DA', 'Dizel', 'Automatik', 'slike_auta/porsche-cayenne-slika15.jpg', 400, 'Na stanju'),
(183, 'Lada', 'Niva', '5', '5', 'DA', 'Dizel', 'Manuelni', 'slike_auta/lada_niva.jpg', 5, 'Na stanju'),
(184, 'Toyota', 'RAV4', '5', '5', 'DA', 'Benzine', 'Manuelni', 'slike_auta/2019-toyota-rav4.jpg', 130, 'Na stanju');

-- --------------------------------------------------------

--
-- Table structure for table `passwordreset`
--

CREATE TABLE `passwordreset` (
  `ID` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passwordreset`
--

INSERT INTO `passwordreset` (`ID`, `email`, `code`) VALUES
(52, 'hasicd@gmail.com', '160116b7d9c5cc'),
(53, 'hasicd@gmail.com', '160116d3c55263'),
(54, 'ilham.hasic@gmail.com', '16011edc40dc0b');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `ID` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `ime_auta` varchar(250) NOT NULL,
  `model_auta` varchar(250) NOT NULL,
  `vrijeme_preuzimanja` varchar(250) NOT NULL,
  `vrijeme_vracanja` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Na cekanju'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`ID`, `email`, `ime_auta`, `model_auta`, `vrijeme_preuzimanja`, `vrijeme_vracanja`, `status`) VALUES
(202, 'ilham.hasic@gmail.com', 'VW', 'Golf 6', '2021-01-28', '2021-01-31', 'REZERVISANO'),
(203, 'hasicd@gmail.com', 'BMW', 'X8', '2021-01-29', '2021-01-31', 'Na cekanju'),
(204, 'hasicd@gmail.com', 'VW', 'Golf 6', '2021-01-28', '2021-01-31', 'REZERVISANO');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `ime_i_prezime` varchar(250) NOT NULL,
  `adresa` varchar(250) NOT NULL,
  `broj_telefona` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `sifra` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `ime_i_prezime`, `adresa`, `broj_telefona`, `email`, `sifra`, `role`) VALUES
(86, 'Bilal Hasić', 'Loznik 67', '123456789', 'bilal.hasic@gmail.com', '$2y$10$MpRMOVfEnw3etJz9OuhD5.m7f2OyYm5jEZGcGHEFcj2jkZSSHGXim', 'admin'),
(87, 'Edin Hasić', 'Loznik 67', '987654321', 'hasicd@gmail.com', '$2y$10$ZaXZjZhnXIytuoj50JQT..sFVlmlJ9luHzPcQI9JgxmuCwXc7vfS.', 'user'),
(91, 'Ilham Hasić', 'Loznik 67', '987456321', 'ilham.hasic@gmail.com', '$2y$10$iv4qlf9HynmrVq17wkDqROOComOXRarlSRRRMFhfy5xv1th5063fa', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auta`
--
ALTER TABLE `auta`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `passwordreset`
--
ALTER TABLE `passwordreset`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auta`
--
ALTER TABLE `auta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `passwordreset`
--
ALTER TABLE `passwordreset`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
