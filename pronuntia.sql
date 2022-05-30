-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 29, 2022 alle 20:54
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

CREATE TABLE `bambini` (
  `idUtente` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL,
  `idLogopedista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `bambini`
--

INSERT INTO `bambini` (`idUtente`, `nome`, `cognome`, `idLogopedista`) VALUES
(2, 'bambinetto1', 'biricchino', 1),
(4, 'martino', 'briccchino', 1);

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

--
-- Dump dei dati per la tabella `batterie`
--

INSERT INTO `batterie` (`idBatteria`, `nome`, `descrizione`, `categoria`, `idLogopedista`) VALUES
(1, 'batteria dislessici', 'esercizi pensati per chi non sa pronunciare la s', 'dislessici', 1),
(2, 'batteria autistici', 'questa è la descrizione', 'autistici', 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `caregiver`
--

CREATE TABLE `caregiver` (
  `idUtente` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL,
  `idBambino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `caregiver`
--

INSERT INTO `caregiver` (`idUtente`, `nome`, `cognome`, `idBambino`) VALUES
(3, 'Mamma', 'Pancina', 0),
(5, 'Mammina', 'arrabbiata', 2),
(8, 'papa', 'nervoso', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `esercizi`
--

CREATE TABLE `esercizi` (
  `idEsercizio` int(11) NOT NULL,
  `testo` longtext NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `esercizi`
--

INSERT INTO `esercizi` (`idEsercizio`, `testo`, `link`) VALUES
(1, 'eseguilo', 'https://learningapps.org/watch?v=p8qaap7ba20'),
(2, 'fallo!', 'https://learningapps.org/watch?app=16782029'),
(3, 'vai!', 'https://learningapps.org/watch?app=9534140');

-- --------------------------------------------------------

--
-- Struttura della tabella `esercizifatti`
--

CREATE TABLE `esercizifatti` (
  `idTerapia` int(11) NOT NULL,
  `idEsercizio` int(11) NOT NULL,
  `stato` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `esercizifatti`
--

INSERT INTO `esercizifatti` (`idTerapia`, `idEsercizio`, `stato`) VALUES
(1, 1, 1),
(1, 2, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `es_della_batteria`
--

CREATE TABLE `es_della_batteria` (
  `idBatteria` int(11) NOT NULL,
  `idEsercizio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `es_della_batteria`
--

INSERT INTO `es_della_batteria` (`idBatteria`, `idEsercizio`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `logopedisti`
--

CREATE TABLE `logopedisti` (
  `idUtente` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `logopedisti`
--

INSERT INTO `logopedisti` (`idUtente`, `nome`, `cognome`) VALUES
(1, 'mario', 'rossi'),
(6, 'luca', 'giurato'),
(7, 'fra', 'panza');

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

--
-- Dump dei dati per la tabella `terapie_assegnate`
--

INSERT INTO `terapie_assegnate` (`idTerapia`, `idBatteria`, `idBambino`, `data`, `Diagnosi`) VALUES
(1, 1, 2, '2022-05-24', 'questa è la diagnosi!'),
(2, 1, 2, '2020-02-20', 'prova prova prova');

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
(3, 'c@c.it', 'cccc', 6),
(4, 'bb@bb.it', 'bbbb', 5),
(5, 'cc@cc.it', 'cccc', 6),
(6, 'aa@aa.it', 'aaaa', 4),
(7, 'aaa@aaa.it', 'aaaa', 4),
(8, 'ccc@ccc.it', 'cccc', 6);

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
  ADD PRIMARY KEY (`idUtente`);

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
-- AUTO_INCREMENT per la tabella `batterie`
--
ALTER TABLE `batterie`
  MODIFY `idBatteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `esercizi`
--
ALTER TABLE `esercizi`
  MODIFY `idEsercizio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `terapie_assegnate`
--
ALTER TABLE `terapie_assegnate`
  MODIFY `idTerapia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `idUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Limiti per la tabella `terapie_assegnate`
--
ALTER TABLE `terapie_assegnate`
  ADD CONSTRAINT `terapie_assegnate_ibfk_1` FOREIGN KEY (`idBatteria`) REFERENCES `batterie` (`idBatteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `terapie_assegnate_ibfk_2` FOREIGN KEY (`idBambino`) REFERENCES `bambini` (`idUtente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
