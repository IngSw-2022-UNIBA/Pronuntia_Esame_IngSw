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

--
-- Dump dei dati per la tabella `bambini`
--

INSERT INTO `bambini` (`idUtente`, `nome`, `cognome`, `idLogopedista`, `dataDiNascita`, `CF`, `notePersonali`) VALUES
(5, 'Martino', 'Pagano', 4, '2022-06-03', 'martinobambinocf', 'Qui appariranno i consigli del tuo logopedista'),
(6, 'Massimiliano', 'Murdaca', 4, '2012-06-19', 'massimilianobambinocf', 'Qui appariranno i consigli del tuo logopedista'),
(7, 'Francesco', 'Panza', NULL, '2009-06-03', 'francescobambinocf', 'Qui appariranno i consigli del tuo logopedista');

--
-- Dump dei dati per la tabella `batterie`
--

INSERT INTO `batterie` (`idBatteria`, `nome`, `descrizione`, `categoria`, `idLogopedista`) VALUES
(1, 'Batteria per vocali', 'Questa è una batteria per vocali', 'vocali', 4);

--
-- Dump dei dati per la tabella `caregiver`
--

INSERT INTO `caregiver` (`idUtente`, `nome`, `cognome`, `idBambino`, `CF`, `dataDiNascita`) VALUES
(8, 'Martino', 'Pagano', 6, 'martinocaregivercf', '1985-06-05'),
(9, 'Massimiliano', 'Murdaca', 5, 'massimilianocaregivercf', '1990-06-14');

--
-- Dump dei dati per la tabella `esercizi`
--

INSERT INTO `esercizi` (`idEsercizio`, `testo`, `link`) VALUES
(1, 'Gioca con le sillabe NA, NE, NI, NO, NU ', 'https://learningapps.org/view9413712'),
(2, 'K mediana, ripeti a voce le immagini', 'https://learningapps.org/watch?v=p8qaap7ba20'),
(3, 'Trova le coppie di lettere uguali', 'https://learningapps.org/watch?app=16782029'),
(4, 'Parole con la S, ripeti a voce le immagini', 'https://learningapps.org/watch?app=9534140'),
(5, 'Parole con GA GO GU, completa la parola', 'https://learningapps.org/view9867966'),
(6, 'GIOCA Con i suoni duri e dolci GA, GO, GU, GE, GI', 'https://learningapps.org/view9791071'),
(7, 'Gioca con le sillabe TA, TE, TI, TO, TU', 'https://learningapps.org/view9460741'),
(8, 'Gioca con le sillabe FA, FE, FI, FO, FU', 'https://learningapps.org/view9422119'),
(9, 'Gioca con le sillabe DA, DE, DI, DO, DU', 'https://learningapps.org/view9421193'),
(10, 'Gioca con le sillabe ZA, ZE, ZI, ZO, ZU', 'https://learningapps.org/view9416843'),
(11, 'Gioca con le sillabe PA, PE, PI, PO, PU', 'https://learningapps.org/view9414556'),
(12, 'Gioca con le sillabe NA, NE, NI, NO, NU', 'https://learningapps.org/view9413712'),
(13, 'Gioca con le sillabe LA, LE, LI, LO, LU', 'https://learningapps.org/view9411281'),
(14, 'Gioca con le sillabe BA, BE, BI, BO, BU', 'https://learningapps.org/view9403881'),
(15, 'Gioca con le sillabe RA, RE, RI, RO, RU', 'https://learningapps.org/view9403191'),
(16, 'Gioca con le sillabe SA, SE, SI, SO, SU', 'https://learningapps.org/view9402278'),
(17, 'Ripeti ad alta voce, e trova il nome', 'https://learningapps.org/view23737323'),
(18, 'Trova il nome corretto', 'https://learningapps.org/view17503413'),
(19, 'Trova il nome corretto', 'https://learningapps.org/view14057516'),
(20, 'Sequenza per attività di narrazione (Non voglio dormire)', 'https://learningapps.org/view13304120'),
(21, 'Sequenza per attività di narrazione (Festa di Compleanno)', 'https://learningapps.org/view13223436'),
(22, 'Sequenza per attività di narrazione (Gita al mare)', 'https://learningapps.org/view13379551'),
(23, 'A pesca con il papà-La comprensione del testo con le sequenze temporali', 'https://learningapps.org/view20936047'),
(24, 'Cappuccetto Rosso-Riordino in sequenze', 'https://learningapps.org/view11086771'),
(25, 'Memory Supereroi', 'https://learningapps.org/view13278812'),
(26, 'Memory metafonologia Scritta (SILLABA INIZIALE)', 'https://learningapps.org/view9918181'),
(27, 'Memory g mediana e iniziale', 'https://learningapps.org/view20874121'),
(28, 'Parole segmentate', 'https://learningapps.org/view11037700'),
(29, 'METAFONOLOGIA (Sillaba Iniziale)', 'https://learningapps.org/view12853537'),
(30, 'Discriminazione /t/ /k/: Uguali o Diversi?', 'https://learningapps.org/view9812830');

--
-- Dump dei dati per la tabella `es_della_batteria`
--

INSERT INTO `es_della_batteria` (`idBatteria`, `idEsercizio`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 30);

--
-- Dump dei dati per la tabella `logopedisti`
--

INSERT INTO `logopedisti` (`idUtente`, `nome`, `cognome`, `matricola`, `inizioServizio`, `specializzazione`, `CF`) VALUES
(1, 'Martino', 'Pagano', 1234, '2015-06-01', 'Disturbi lingua', 'martinologopedistacf'),
(2, 'Massimiliano', 'Murdaca', 2345, '2017-06-01', 'Disturbo dell\'attenzione', 'massimilianologopedistacf'),
(3, 'Giuseppe', 'Mele', 3456, '2019-06-05', 'Disturbi visivi', 'giuseppelogopedistacf'),
(4, 'Francesco', 'Panza', 4567, '2021-06-01', 'Disturbi cognitivo', 'francescologopedistacf');

--
-- Dump dei dati per la tabella `terapie_assegnate`
--

INSERT INTO `terapie_assegnate` (`idTerapia`, `idBatteria`, `idBambino`, `data`, `Diagnosi`) VALUES
(1, 1, 5, '2020-02-20', 'Questa è la diagnosi della problematica');

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`idUtente`, `email`, `password`, `tipoUtente`) VALUES
(1, 'martino@logopedista.it', '$2y$13$ufH.LN8LsXAgOj0I8zpb7OrTlUJYN7Fpy2YQWzduMLoOYjX206SPe', 4),
(2, 'massimiliano@logopedista.it', '$2y$13$HhGMvmlO1j1F4Ze/xvCroeVeOl8HAl94h6bjI6fivk28mcdoijvt2', 4),
(3, 'giuseppe@logopedista.it', '$2y$13$VxKcninxOVa684ezXc3C0.DVzsj9WaNEUPPhu/AT6naPKPpmAPNsG', 4),
(4, 'francesco@logopedista.it', '$2y$13$CU.Asu1jvL2Y1gteiRyHh.Fk7nOWlB0flKMz/RIjjQpJt6MgVi5N6', 4),
(5, 'martino@bambino.it', '$2y$13$1Ob94Tf7R/ICd/Ne/aFHiuOWOaM..J6ol/SPUCwAm/xJtLl/Bgneq', 5),
(6, 'massimiliano@bambino.it', '$2y$13$97mn7maLMy1NuEz.1XUbNepT6LoaptHy.160ACrmcI4dEidbbK2US', 5),
(7, 'francesco@bambino.it', '$2y$13$n7ct2wNrntYAssLAwctalOIM/dp9tpwKf7wesu2t3.P9.ci5xuHTS', 5),
(8, 'martino@caregiver.it', '$2y$13$TtBWyFfwiCILDQqv356FUuhNOv715KqeWvUD8YvgKO2gn4GtwxhQ2', 6),
(9, 'massimiliano@caregiver.it', '$2y$13$48bjchrFYy6rSAXqUIpo9O6Kh9.e3/bPNhLQnC4X5j8qksxcfW/I.', 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
