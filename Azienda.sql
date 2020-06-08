-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Giu 07, 2020 alle 19:40
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Azienda`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Attrezzatura`
--

CREATE TABLE `Attrezzatura` (
  `CodiceAttrezzatura` int(11) NOT NULL,
  `NomeAttrezzatura` varchar(64) NOT NULL,
  `Descrizione` varchar(256) NOT NULL,
  `AnnoProduzione` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Attrezzatura`
--

INSERT INTO `Attrezzatura` (`CodiceAttrezzatura`, `NomeAttrezzatura`, `Descrizione`, `AnnoProduzione`) VALUES
(1, 'Hub', 'Netgear', 2015),
(2, 'Switch', 'Netgear', 2007),
(3, 'Laptop', 'Apple', 2018),
(4, 'Telefono', 'Apple', 2009),
(5, 'Server', 'Windows', 2000),
(6, 'Tastiera', 'Logitech', 2020),
(7, 'Mouse', 'Corsair', 1999),
(8, 'Monitor', 'LG', 2016),
(9, 'Tablet', 'Samsung', 2009),
(10, 'Router', 'Netgear', 2005);

-- --------------------------------------------------------

--
-- Struttura della tabella `Dotazione`
--

CREATE TABLE `Dotazione` (
  `CodiceFiliale` int(11) NOT NULL,
  `CodiceAttrezzatura` int(11) NOT NULL,
  `Quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Dotazione`
--

INSERT INTO `Dotazione` (`CodiceFiliale`, `CodiceAttrezzatura`, `Quantità`) VALUES
(3, 1, 4),
(2, 3, 89),
(9, 8, 34),
(8, 6, 78),
(5, 4, 56),
(7, 5, 8),
(10, 7, 100),
(6, 10, 9),
(4, 3, 42),
(1, 6, 77);

-- --------------------------------------------------------

--
-- Struttura della tabella `Filiale`
--

CREATE TABLE `Filiale` (
  `CodiceFiliale` int(11) NOT NULL,
  `Città` char(2) NOT NULL,
  `CAP` int(5) NOT NULL,
  `Via` varchar(64) NOT NULL,
  `Civico` int(5) NOT NULL,
  `Telefono` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Filiale`
--

INSERT INTO `Filiale` (`CodiceFiliale`, `Città`, `CAP`, `Via`, `Civico`, `Telefono`) VALUES
(1, 'VR', 37026, 'dei Pini', 45, '0456707899'),
(2, 'MI', 20089, 'Mazzini', 32, '0265846754'),
(3, 'TO', 10121, 'Enrico Fermi', 89, '0118946735'),
(4, 'NA', 80100, 'Brombeis', 124, '0816578356'),
(5, 'RN', 47921, 'della Pace', 5, '0541784562'),
(6, 'VR', 37100, 'Cappello', 56, '0456704097'),
(7, 'VR', 37026, 'dei peschi', 67, '0456785648'),
(8, 'RO', 100, 'dei Martiri', 71, '0674665783'),
(9, 'TA', 74121, 'dei Sassi', 234, '0997846548'),
(10, 'PU', 6121, 'Mameli', 3, '0757850926');

-- --------------------------------------------------------

--
-- Struttura della tabella `Utente`
--

CREATE TABLE `Utente` (
  `Id` int(11) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `Utente`
--

INSERT INTO `Utente` (`Id`, `Username`, `email`, `Password`) VALUES
(2, 'leonardocorrizzato', 'leonardocorrizzato@gmail.com', '1234'),
(3, 'admin', 'admin@admin.it', 'admin');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Attrezzatura`
--
ALTER TABLE `Attrezzatura`
  ADD PRIMARY KEY (`CodiceAttrezzatura`);

--
-- Indici per le tabelle `Dotazione`
--
ALTER TABLE `Dotazione`
  ADD KEY `Dotazione_ibfk_1` (`CodiceAttrezzatura`),
  ADD KEY `Dotazione_ibfk_2` (`CodiceFiliale`);

--
-- Indici per le tabelle `Filiale`
--
ALTER TABLE `Filiale`
  ADD PRIMARY KEY (`CodiceFiliale`);

--
-- Indici per le tabelle `Utente`
--
ALTER TABLE `Utente`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Attrezzatura`
--
ALTER TABLE `Attrezzatura`
  MODIFY `CodiceAttrezzatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `Filiale`
--
ALTER TABLE `Filiale`
  MODIFY `CodiceFiliale` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT per la tabella `Utente`
--
ALTER TABLE `Utente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Dotazione`
--
ALTER TABLE `Dotazione`
  ADD CONSTRAINT `Dotazione_ibfk_1` FOREIGN KEY (`CodiceAttrezzatura`) REFERENCES `Attrezzatura` (`CodiceAttrezzatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Dotazione_ibfk_2` FOREIGN KEY (`CodiceFiliale`) REFERENCES `Filiale` (`CodiceFiliale`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--Parte aggiunta a mano credo si debba togliere per una corretta importazione del DML e DDL su phpMyAdmin.

-- Query del punto numero 4 dell' elaborato.

--Prima Query mostra una tabella con la correlazione di attrezzature informatiche associate alle filiali presentando i campi
--del codice identificativo della filiale, la città, il nome dell’attrezzatura, la sua descrizione, l’anno di produzione e la quantità.

SELECT F.CodiceFiliale, F.Citta, A.NomeAttrezzatura, A.Descrizione, A.AnnoProduzione, D.Quantita FROM Dotazione AS D
LEFT JOIN Filiale AS F ON D.CodiceFiliale = F.CodiceFiliale LEFT JOIN Attrezzatura AS A ON D.CodiceAttrezzatura = A.CodiceAttrezzatura

--Seconda Query mostra una tabella con la correlazione di attrezzature informatiche associate alle filiali che risiedono
--nella città di Verona(VR) presentando i campi del codice identificativo della filiale, la città, il nome dell’attrezzatura, la sua descrizione, l’anno di produzione e la quantità.

SELECT F.CodiceFiliale, F.Citta, A.NomeAttrezzatura, A.Descrizione, A.AnnoProduzione, D.Quantita FROM Dotazione AS D
JOIN Filiale AS F ON D.CodiceFiliale = F.CodiceFiliale AND F.Citta = 'VR' JOIN Attrezzatura AS A ON D.CodiceAttrezzatura = A.CodiceAttrezzatura
