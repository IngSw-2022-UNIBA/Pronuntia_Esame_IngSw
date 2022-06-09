-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 06, 2022 alle 17:44
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pronuntia`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `bambini`
--

DROP DATABASE IF EXISTS pronuntia ;
CREATE DATABASE pronuntia ;
USE pronuntia;

CREATE TABLE `bambini` (
  `idUtente` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL,
  `idLogopedista` int(11) DEFAULT NULL,
  `dataDiNascita` date DEFAULT NULL,
  `CF` varchar(25) DEFAULT NULL,
  `notePersonali` varchar(250) DEFAULT 'Qui appariranno i consigli del tuo logopedista'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `batterie`
--

CREATE TABLE `batterie` (
  `idBatteria` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `descrizione` mediumtext NOT NULL,
  `categoria` varchar(55) NOT NULL,
  `idLogopedista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `caregiver`
--

CREATE TABLE `caregiver` (
  `idUtente` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL,
  `idBambino` int(11) DEFAULT NULL,
  `CF` varchar(25) DEFAULT NULL,
  `dataDiNascita` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `esercizi`
--

CREATE TABLE `esercizi` (
  `idEsercizio` int(11) NOT NULL,
  `testo` longtext NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `esercizifatti`
--

CREATE TABLE `esercizifatti` (
  `idTerapia` int(11) NOT NULL,
  `idEsercizio` int(11) NOT NULL,
  `stato` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `es_della_batteria`
--

CREATE TABLE `es_della_batteria` (
  `idBatteria` int(11) NOT NULL,
  `idEsercizio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `logopedisti`
--

CREATE TABLE `logopedisti` (
  `idUtente` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL,
  `matricola` int(11) NOT NULL,
  `inizioServizio` date NOT NULL,
  `specializzazione` varchar(25) NOT NULL,
  `CF` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `pretest`
--

CREATE TABLE `pretest` (
  `idPretest` int(11) NOT NULL,
  `domanda1` mediumtext NOT NULL,
  `domanda2` mediumtext NOT NULL,
  `domanda3` mediumtext NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `idLogopedista` int(11) NOT NULL,
  `stato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `terapie_assegnate`
--

CREATE TABLE `terapie_assegnate` (
  `idTerapia` int(11) NOT NULL,
  `idBatteria` int(11) NOT NULL,
  `idBambino` int(11) NOT NULL,
  `data` date NOT NULL,
  `Diagnosi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `idUtente` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipoUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `bambini`
--
ALTER TABLE `bambini`
  ADD PRIMARY KEY (`idUtente`);

--
-- Indici per le tabelle `batterie`
--
ALTER TABLE `batterie`
  ADD PRIMARY KEY (`idBatteria`),
  ADD KEY `idLogopedista` (`idLogopedista`);

--
-- Indici per le tabelle `caregiver`
--
ALTER TABLE `caregiver`
  ADD PRIMARY KEY (`idUtente`),
  ADD UNIQUE KEY `CF` (`CF`);

--
-- Indici per le tabelle `esercizi`
--
ALTER TABLE `esercizi`
  ADD PRIMARY KEY (`idEsercizio`);

--
-- Indici per le tabelle `esercizifatti`
--
ALTER TABLE `esercizifatti`
  ADD PRIMARY KEY (`idTerapia`,`idEsercizio`) USING BTREE,
  ADD KEY `idEsercizio` (`idEsercizio`);

--
-- Indici per le tabelle `es_della_batteria`
--
ALTER TABLE `es_della_batteria`
  ADD PRIMARY KEY (`idBatteria`,`idEsercizio`),
  ADD KEY `idEsercizio` (`idEsercizio`);

--
-- Indici per le tabelle `logopedisti`
--
ALTER TABLE `logopedisti`
  ADD PRIMARY KEY (`idUtente`);

--
-- Indici per le tabelle `pretest`
--
ALTER TABLE `pretest`
  ADD PRIMARY KEY (`idPretest`),
  ADD KEY `idLogopedista` (`idLogopedista`);

--
-- Indici per le tabelle `terapie_assegnate`
--
ALTER TABLE `terapie_assegnate`
  ADD PRIMARY KEY (`idTerapia`),
  ADD KEY `idBatteria` (`idBatteria`),
  ADD KEY `idBambino` (`idBambino`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`idUtente`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `batterie`
--
ALTER TABLE `batterie`
  MODIFY `idBatteria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `esercizi`
--
ALTER TABLE `esercizi`
  MODIFY `idEsercizio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `pretest`
--
ALTER TABLE `pretest`
  MODIFY `idPretest` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `terapie_assegnate`
--
ALTER TABLE `terapie_assegnate`
  MODIFY `idTerapia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `idUtente` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `bambini`
--
ALTER TABLE `bambini`
  ADD CONSTRAINT `bambini_ibfk_1` FOREIGN KEY (`idUtente`) REFERENCES `utenti` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `batterie`
--
ALTER TABLE `batterie`
  ADD CONSTRAINT `batterie_ibfk_1` FOREIGN KEY (`idLogopedista`) REFERENCES `logopedisti` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `caregiver`
--
ALTER TABLE `caregiver`
  ADD CONSTRAINT `caregiver_ibfk_1` FOREIGN KEY (`idUtente`) REFERENCES `utenti` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `esercizifatti`
--
ALTER TABLE `esercizifatti`
  ADD CONSTRAINT `esercizifatti_ibfk_1` FOREIGN KEY (`idEsercizio`) REFERENCES `esercizi` (`idEsercizio`),
  ADD CONSTRAINT `esercizifatti_ibfk_2` FOREIGN KEY (`idTerapia`) REFERENCES `terapie_assegnate` (`idTerapia`);

--
-- Limiti per la tabella `es_della_batteria`
--
ALTER TABLE `es_della_batteria`
  ADD CONSTRAINT `es_della_batteria_ibfk_1` FOREIGN KEY (`idBatteria`) REFERENCES `batterie` (`idBatteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `es_della_batteria_ibfk_2` FOREIGN KEY (`idEsercizio`) REFERENCES `esercizi` (`idEsercizio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `logopedisti`
--
ALTER TABLE `logopedisti`
  ADD CONSTRAINT `logopedisti_ibfk_1` FOREIGN KEY (`idUtente`) REFERENCES `utenti` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `pretest`
--
ALTER TABLE `pretest`
  ADD CONSTRAINT `pretest_ibfk_1` FOREIGN KEY (`idLogopedista`) REFERENCES `logopedisti` (`idUtente`);

--
-- Limiti per la tabella `terapie_assegnate`
--
ALTER TABLE `terapie_assegnate`
  ADD CONSTRAINT `terapie_assegnate_ibfk_1` FOREIGN KEY (`idBatteria`) REFERENCES `batterie` (`idBatteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `terapie_assegnate_ibfk_2` FOREIGN KEY (`idBambino`) REFERENCES `bambini` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
