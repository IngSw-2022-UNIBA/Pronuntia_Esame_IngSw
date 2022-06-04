-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 04, 2022 alle 12:13
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

--
-- Dump dei dati per la tabella `bambini`
--

USE pronuntia;

INSERT INTO `bambini` (`idUtente`, `nome`, `cognome`, `idLogopedista`, `dataDiNascita`, `CF`, `notePersonali`) VALUES
(1, 'martino', 'briccchino', 0, '2022-06-07', 'mrdmsnd03e223efdfds', ''),
(2, 'bambinetto1', 'biricchino', 1, '2022-06-01', 'erwrewwr', ''),
(10, 'franco', 'losa', 1, '2022-06-08', 'adsdadasdadas', ''),
(15, 'martino', 'rana', 1, '2004-04-26', 'mrdmsnd03e223e', 'dislessico e autistico'),
(16, 'mas', 'pag', 1, '2022-06-05', 'asdfghjkl', NULL),
(17, 'mart', 'sssin', NULL, '2022-06-22', 'mrdaffe223e', 'Qui appariranno i consigli del tuo logopedista');

--
-- Dump dei dati per la tabella `batterie`
--

INSERT INTO `batterie` (`idBatteria`, `nome`, `descrizione`, `categoria`, `idLogopedista`) VALUES
(1, 'batteria dislessici', 'esercizi pensati per chi non sa pronunciare la s', 'dislessici', 1),
(2, 'batteria autistici', 'questa è la descrizione', 'autistici', 7),
(3, 'infami', 'esercizi per gli infami', 'nani', 1);

--
-- Dump dei dati per la tabella `caregiver`
--

INSERT INTO `caregiver` (`idUtente`, `nome`, `cognome`, `idBambino`, `CF`, `dataDiNascita`) VALUES
(3, 'Mamma', 'Pancina', 15, 'asdads', '2022-06-14'),
(5, 'Mammina', 'arrabbiata', 2, NULL, NULL),
(8, 'papa', 'nervoso', 2, NULL, NULL),
(9, 'Mammone', 'panzona', 10, NULL, NULL),
(13, 'Martino', 'Pagano', 10, NULL, NULL);

--
-- Dump dei dati per la tabella `esercizi`
--

INSERT INTO `esercizi` (`idEsercizio`, `testo`, `link`) VALUES
(1, 'eseguilo', 'https://learningapps.org/watch?v=p8qaap7ba20'),
(2, 'fallo!', 'https://learningapps.org/watch?app=16782029'),
(3, 'vai!', 'https://learningapps.org/watch?app=9534140');

--
-- Dump dei dati per la tabella `esercizifatti`
--

INSERT INTO `esercizifatti` (`idTerapia`, `idEsercizio`, `stato`) VALUES
(1, 1, 1),
(1, 2, 0),
(1, 3, 1),
(2, 1, 1),
(2, 3, 1);

--
-- Dump dei dati per la tabella `es_della_batteria`
--

INSERT INTO `es_della_batteria` (`idBatteria`, `idEsercizio`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 2),
(2, 3);

--
-- Dump dei dati per la tabella `logopedisti`
--

INSERT INTO `logopedisti` (`idUtente`, `nome`, `cognome`, `matricola`, `inizioServizio`, `specializzazione`, `CF`) VALUES
(1, 'mario', 'rossi', 111, '2022-06-24', 'spec.1', 'dfgdf'),
(6, 'luca', 'giurato', 222, '2022-06-02', 'spec.2', 'qwerty'),
(7, 'fra', 'panza', 333, '2022-06-22', 'spec.3', 'zcvbnbm');

--
-- Dump dei dati per la tabella `pretest`
--

INSERT INTO `pretest` (`idPretest`, `domanda1`, `domanda2`, `domanda3`, `telefono`, `idLogopedista`, `stato`) VALUES
(3, 'si, molte purtroppo', 'si, quando legge soprattutto', 'no, di 10 mesi', '39444842251', 1, 0);

--
-- Dump dei dati per la tabella `terapie_assegnate`
--

INSERT INTO `terapie_assegnate` (`idTerapia`, `idBatteria`, `idBambino`, `data`, `Diagnosi`) VALUES
(1, 1, 2, '2022-05-24', 'questa è la diagnosi!'),
(2, 1, 2, '2020-02-20', 'prova prova prova');

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
(8, 'ccc@ccc.it', 'cccc', 6),
(9, 'm@c.it', 'cccc', 6),
(10, 'm@b.it', 'bbbbbb', 5),
(12, 'martino@c.it', 'ccccc', 3),
(13, 'mm@c.it', 'cccc', 6),
(15, 'test@b.it', 'bbbb', 5),
(16, 'massii@b.it', 'bbbb', 5),
(17, 'massiiiii@b.it', 'bbbb', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
