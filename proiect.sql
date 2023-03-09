-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2023 at 08:13 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiect`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenti`
--

CREATE TABLE `agenti` (
  `IdAgent` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `Parola` varchar(20) NOT NULL,
  `Telefon` varchar(10) NOT NULL,
  `Email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenti`
--

INSERT INTO `agenti` (`IdAgent`, `Nume`, `Prenume`, `Parola`, `Telefon`, `Email`) VALUES
(1, 'Constantin', 'Elena', 'agent1', '0723138799', 'c_elena@yahoo.com'),
(2, 'Dragomir', 'Alexandru', 'agent2', '0742157223', 'alexdrg@gmail.com'),
(3, 'Neagu', 'Mihai', 'agent3', '0733195127', 'mihai_neagu@yahoo.com'),
(4, 'Stoica', 'Iuliana', 'agent4', '0743169210', 'iuliana1986@gmail.com'),
(5, 'Zamfir', 'Adrian', 'agent5', '0729169710', 'adrian@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `biciclete`
--

CREATE TABLE `biciclete` (
  `IdBicicleta` int(11) NOT NULL,
  `IdProducator` int(11) NOT NULL,
  `IdLocatie` int(11) NOT NULL,
  `Model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biciclete`
--

INSERT INTO `biciclete` (`IdBicicleta`, `IdProducator`, `IdLocatie`, `Model`) VALUES
(1, 1, 1, 'Clasic'),
(2, 1, 1, 'Suprem'),
(3, 2, 2, 'REVOX2'),
(4, 2, 3, 'REVOX3'),
(5, 2, 2, 'REVOX4');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `IdClient` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `Parola` varchar(20) NOT NULL,
  `Telefon` varchar(10) NOT NULL,
  `Email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`IdClient`, `Nume`, `Prenume`, `Parola`, `Telefon`, `Email`) VALUES
(1, 'Boboc', 'Talida', 'parola_schimbata', '0757507996', 'taly01232@yahoo.com'),
(2, 'Pavel', 'Ion', 'parola2', '0731219711', 'pavel.ion@yahoo.com'),
(3, 'Alexe', 'Ioana', 'parola3', '0731219711', 'ioana2001@gmail.com'),
(4, 'Ionescu', 'Ionut', 'parola4', '0745519923', 'ionescuionut@yahoo.com'),
(5, 'Zaharia', 'Nicoleta', 'parola5', '0756178234', 'nicoletazz@yahoo.com'),
(9, 'Toma', 'Flavius', 'parola7', '0745123456', 'flavius_t@yahoo.com'),
(11, 'Pop', 'Andrei', 'parola8', '0724156897', 'andreipop@gmail.com'),
(12, 'Lazarovici', 'Raluca', 'parola9', '0733129675', 'raluca1987@yahoo.com'),
(13, 'Untaru', 'Maria', '1234', '0729921924', 'maria234untaru@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contracte`
--

CREATE TABLE `contracte` (
  `IdContract` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `IdAgent` int(11) NOT NULL,
  `IdBicicleta` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Durata` int(4) NOT NULL,
  `Pret` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contracte`
--

INSERT INTO `contracte` (`IdContract`, `IdClient`, `IdAgent`, `IdBicicleta`, `Data`, `Durata`, `Pret`) VALUES
(1, 1, 2, 1, '2022-11-18', 3, '25'),
(2, 5, 1, 2, '2022-11-23', 6, '50'),
(3, 3, 3, 3, '2021-10-08', 2, '10'),
(4, 12, 1, 5, '2022-11-26', 6, '25'),
(5, 9, 3, 2, '2022-11-22', 4, '20'),
(6, 2, 1, 4, '2022-11-02', 4, '25'),
(7, 13, 2, 5, '2022-07-14', 4, '20'),
(8, 9, 3, 5, '2022-08-19', 5, '30'),
(9, 11, 3, 1, '2023-01-04', 2, '10'),
(10, 1, 4, 2, '2022-08-23', 4, '20');

-- --------------------------------------------------------

--
-- Table structure for table `locatii`
--

CREATE TABLE `locatii` (
  `IdLocatie` int(11) NOT NULL,
  `Oras` varchar(50) NOT NULL,
  `Judet` varchar(50) DEFAULT NULL,
  `Strada` varchar(50) DEFAULT NULL,
  `Numar` int(4) DEFAULT NULL,
  `Telefon` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locatii`
--

INSERT INTO `locatii` (`IdLocatie`, `Oras`, `Judet`, `Strada`, `Numar`, `Telefon`, `Email`) VALUES
(1, 'Bucuresti', 'Bucuresti', 'Franceza', 62, '0721123411', 'locatia1@yahoo.com'),
(2, 'Bucuresti', 'Bucuresti', 'Tineretului', 3, '0213275778', 'locatia2@yahoo.com'),
(3, 'Bucuresti', 'Bucuresti', 'Victoriei', 224, '0213275778', 'locatia3@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `producatori`
--

CREATE TABLE `producatori` (
  `IdProducator` int(11) NOT NULL,
  `Denumire` varchar(50) NOT NULL,
  `Tara` varchar(50) NOT NULL,
  `Oras` varchar(50) NOT NULL,
  `Judet` varchar(50) DEFAULT NULL,
  `Strada` varchar(50) DEFAULT NULL,
  `Numar` int(4) DEFAULT NULL,
  `Telefon` varchar(10) NOT NULL,
  `Email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producatori`
--

INSERT INTO `producatori` (`IdProducator`, `Denumire`, `Tara`, `Oras`, `Judet`, `Strada`, `Numar`, `Telefon`, `Email`) VALUES
(1, 'Pegas', 'Romania', 'Zarnesti', 'Brasov', 'Uzinei', 1, '0268220854', 'uzina_tohan@gmail.com'),
(2, 'Bergamont', 'Romania', 'Iasi', 'Iasi', 'Gavriil Musicescu', 5, '0213188192', 'bergamontsrl@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenti`
--
ALTER TABLE `agenti`
  ADD PRIMARY KEY (`IdAgent`);

--
-- Indexes for table `biciclete`
--
ALTER TABLE `biciclete`
  ADD PRIMARY KEY (`IdBicicleta`),
  ADD KEY `FK_biciclete_locatie` (`IdLocatie`),
  ADD KEY `FK_biciclete_producator` (`IdProducator`);

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`IdClient`);

--
-- Indexes for table `contracte`
--
ALTER TABLE `contracte`
  ADD PRIMARY KEY (`IdContract`),
  ADD KEY `FK_contracte_agent` (`IdAgent`),
  ADD KEY `FK_contracte_client` (`IdClient`),
  ADD KEY `FK_contracte_bicicleta` (`IdBicicleta`);

--
-- Indexes for table `locatii`
--
ALTER TABLE `locatii`
  ADD PRIMARY KEY (`IdLocatie`);

--
-- Indexes for table `producatori`
--
ALTER TABLE `producatori`
  ADD PRIMARY KEY (`IdProducator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenti`
--
ALTER TABLE `agenti`
  MODIFY `IdAgent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `biciclete`
--
ALTER TABLE `biciclete`
  MODIFY `IdBicicleta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `IdClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contracte`
--
ALTER TABLE `contracte`
  MODIFY `IdContract` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `locatii`
--
ALTER TABLE `locatii`
  MODIFY `IdLocatie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `producatori`
--
ALTER TABLE `producatori`
  MODIFY `IdProducator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biciclete`
--
ALTER TABLE `biciclete`
  ADD CONSTRAINT `FK_biciclete_locatie` FOREIGN KEY (`IdLocatie`) REFERENCES `locatii` (`IdLocatie`),
  ADD CONSTRAINT `FK_biciclete_producator` FOREIGN KEY (`IdProducator`) REFERENCES `producatori` (`IdProducator`);

--
-- Constraints for table `contracte`
--
ALTER TABLE `contracte`
  ADD CONSTRAINT `FK_contracte_agent` FOREIGN KEY (`IdAgent`) REFERENCES `agenti` (`IdAgent`),
  ADD CONSTRAINT `FK_contracte_bicicleta` FOREIGN KEY (`IdBicicleta`) REFERENCES `biciclete` (`IdBicicleta`),
  ADD CONSTRAINT `FK_contracte_client` FOREIGN KEY (`IdClient`) REFERENCES `clienti` (`IdClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
