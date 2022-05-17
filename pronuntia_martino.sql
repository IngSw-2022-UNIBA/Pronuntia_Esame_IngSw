DROP DATABASE IF EXISTS pronuntia;

CREATE DATABASE pronuntia;

USE pronuntia;

CREATE TABLE utenti (
  idUtente int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  email varchar(55) NOT NULL,
  password varchar(25) NOT NULL,
  tipoUtente int(11) NOT NULL
);

CREATE TABLE logopedisti (
  idUtente int(11) NOT NULL PRIMARY KEY,
  nome varchar(25) NOT NULL,
  cognome varchar(25) NOT NULL,
  foreign key(idUtente) REFERENCES utenti(idUtente)
);

CREATE TABLE caregiver (
  idUtente int(11) NOT NULL PRIMARY KEY,
  nome varchar(25) NOT NULL,
  cognome varchar(25) NOT NULL,
  foreign key(idUtente) REFERENCES utenti(idUtente)
);

CREATE TABLE bambini (
  idUtente int(11) NOT NULL PRIMARY KEY,
  nome varchar(25) NOT NULL,
  cognome varchar(25) NOT NULL,
  foreign key(idUtente) REFERENCES utenti(idUtente)
);

CREATE TABLE librerie_esercizi (
  idEsercizio int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  testo LONGTEXT NOT NULL
);

CREATE TABLE curato_da (
  data date NOT NULL,
  idLogopedista int(11) NOT NULL,
  idCaregiver int(11) NOT NULL,
  idBambino int(11) NOT NULL,
  PRIMARY KEY(idLogopedista, idCaregiver, idBambino),
  foreign key(idLogopedista) REFERENCES logopedisti(idUtente),
  foreign key(idCaregiver) REFERENCES caregiver(idUtente),
  foreign key(idBambino) REFERENCES bambini(idUtente)
);

CREATE TABLE batterie_di_es (
  idBatteria int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  nome varchar(25) NOT NULL,
  descrizione MEDIUMTEXT NOT NULL,
  categoria varchar(55) NOT NULL,
  idLogopedista int(11) NOT NULL,
  foreign key(idLogopedista) REFERENCES logopedisti(idUtente)
);

CREATE TABLE es_della_batteria(
  idBatteria int(11) NOT NULL,
  idEsercizio int(11) NOT NULL,
  PRIMARY KEY(idBatteria, idEsercizio),
  foreign key(idBatteria) REFERENCES batterie_di_es(idBatteria),
  foreign key(idEsercizio) REFERENCES librerie_esercizi(idEsercizio)
);

CREATE TABLE terapie_assegnate(
  idTerapia int(11) NOT NULL PRIMARY key AUTO_INCREMENT,
  idBatteria int(11) NOT NULL,
  idBambino int(11) NOT NULL,
  data date NOT NULL,
  foreign key(idBatteria) REFERENCES batterie_di_es(idBatteria),
  foreign key(idBambino) REFERENCES bambini(idUtente)
);