-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 21, 2022 alle 12:57
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
DROP DATABASE IF EXISTS pronuntia;

CREATE DATABASE pronuntia;

USE pronuntia;

--
-- Struttura della tabella `logopedisti`
--

CREATE TABLE `logopedisti` (
  `idUtente` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle `logopedisti`
--
ALTER TABLE `logopedisti`
  ADD PRIMARY KEY (`idUtente`);

--
-- Dump dei dati per la tabella `logopedisti`
--

INSERT INTO `logopedisti` (`idUtente`, `nome`, `cognome`) VALUES
(1, 'mario', 'rossi');

-- --------------------------------------------------------

CREATE TABLE `bambini` (
  `idUtente` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL,
  'idLogopedista' int(11) NOT NULL,
  'dataInizio' date NOT NULL,
  FOREIGN KEY (`idLogopedista`) REFERENCES `logopedisti` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `bambini`
--

INSERT INTO `bambini` (`idUtente`, `nome`, `cognome`) VALUES
(2, 'bambinetto1', 'biricchino');

-- --------------------------------------------------------

--
-- Struttura della tabella `batterie_di_es`
--

CREATE TABLE `batterie_di_es` (
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
  'idBambino' int(11) NOT NULL,
  FOREIGN KEY (`idBambino`) REFERENCES `bambini` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `caregiver`
--

INSERT INTO `caregiver` (`idUtente`, `nome`, `cognome`) VALUES
(3, 'Mamma', 'Pancina');

-- --------------------------------------------------------

--
-- Struttura della tabella `curato_da`
--

CREATE TABLE `curato_da` (
  `data` date NOT NULL,
  `idLogopedista` int(11) NOT NULL,
  `idCaregiver` int(11) NOT NULL,
  `idBambino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `curato_da`
--

INSERT INTO `curato_da` (`data`, `idLogopedista`, `idCaregiver`, `idBambino`) VALUES
('2022-06-06', 1, 3, 2);

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
-- Struttura della tabella `librerie_esercizi`
--

CREATE TABLE `librerie_esercizi` (
  `idEsercizio` int(11) NOT NULL,
  `testo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------



--
-- Struttura della tabella `terapie_assegnate`
--

CREATE TABLE `terapie_assegnate` (
  `idTerapia` int(11) NOT NULL,
  `idBatteria` int(11) NOT NULL,
  `idBambino` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `idUtente` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(25) NOT NULL,
  `tipoUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`idUtente`, `email`, `password`, `tipoUtente`) VALUES
(1, 'a@a.it', 'aaaa', 4),
(2, 'b@b.it', 'bbbb', 5),
(3, 'c@c.it', 'cccc', 6);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `bambini`
--
ALTER TABLE `bambini`
  ADD PRIMARY KEY (`idUtente`);

--
-- Indici per le tabelle `batterie_di_es`
--
ALTER TABLE `batterie_di_es`
  ADD PRIMARY KEY (`idBatteria`),
  ADD KEY `idLogopedista` (`idLogopedista`);

--
-- Indici per le tabelle `caregiver`
--
ALTER TABLE `caregiver`
  ADD PRIMARY KEY (`idUtente`);

--
-- Indici per le tabelle `curato_da`
--
ALTER TABLE `curato_da`
  ADD PRIMARY KEY (`idLogopedista`,`idCaregiver`,`idBambino`),
  ADD KEY `curato_da_ibfk_2` (`idCaregiver`),
  ADD KEY `curato_da_ibfk_3` (`idBambino`);

--
-- Indici per le tabelle `es_della_batteria`
--
ALTER TABLE `es_della_batteria`
  ADD PRIMARY KEY (`idBatteria`,`idEsercizio`),
  ADD KEY `idEsercizio` (`idEsercizio`);

--
-- Indici per le tabelle `librerie_esercizi`
--
ALTER TABLE `librerie_esercizi`
  ADD PRIMARY KEY (`idEsercizio`);



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
  ADD PRIMARY KEY (`idUtente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `batterie_di_es`
--
ALTER TABLE `batterie_di_es`
  MODIFY `idBatteria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `librerie_esercizi`
--
ALTER TABLE `librerie_esercizi`
  MODIFY `idEsercizio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `terapie_assegnate`
--
ALTER TABLE `terapie_assegnate`
  MODIFY `idTerapia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `idUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `bambini`
--
ALTER TABLE `bambini`
  ADD CONSTRAINT `bambini_ibfk_1` FOREIGN KEY (`idUtente`) REFERENCES `utenti` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `batterie_di_es`
--
ALTER TABLE `batterie_di_es`
  ADD CONSTRAINT `batterie_di_es_ibfk_1` FOREIGN KEY (`idLogopedista`) REFERENCES `logopedisti` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `caregiver`
--
ALTER TABLE `caregiver`
  ADD CONSTRAINT `caregiver_ibfk_1` FOREIGN KEY (`idUtente`) REFERENCES `utenti` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `curato_da`
--
ALTER TABLE `curato_da`
  ADD CONSTRAINT `curato_da_ibfk_1` FOREIGN KEY (`idLogopedista`) REFERENCES `logopedisti` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curato_da_ibfk_2` FOREIGN KEY (`idCaregiver`) REFERENCES `caregiver` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curato_da_ibfk_3` FOREIGN KEY (`idBambino`) REFERENCES `bambini` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `es_della_batteria`
--
ALTER TABLE `es_della_batteria`
  ADD CONSTRAINT `es_della_batteria_ibfk_1` FOREIGN KEY (`idBatteria`) REFERENCES `batterie_di_es` (`idBatteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `es_della_batteria_ibfk_2` FOREIGN KEY (`idEsercizio`) REFERENCES `librerie_esercizi` (`idEsercizio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `logopedisti`
--
ALTER TABLE `logopedisti`
  ADD CONSTRAINT `logopedisti_ibfk_1` FOREIGN KEY (`idUtente`) REFERENCES `utenti` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `terapie_assegnate`
--
ALTER TABLE `terapie_assegnate`
  ADD CONSTRAINT `terapie_assegnate_ibfk_1` FOREIGN KEY (`idBatteria`) REFERENCES `batterie_di_es` (`idBatteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `terapie_assegnate_ibfk_2` FOREIGN KEY (`idBambino`) REFERENCES `bambini` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
