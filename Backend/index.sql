CREATE DATABASE IF NOT EXISTS LEPONEYFRINGANT;--Creation de la base
USE LEPONEYFRINGANT;--utilisation de la base crée

CREATE USER IF NOT EXISTS poney@localhost IDENTIFIED BY 'fringant';--creation d'un utilisateur qui vas pouvoir avoir accés à la base
GRANT ALL ON LEPONEYFRINGANT.* TO poney@localhost;

CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pseudo VARCHAR(255) NOT NULL UNIQUE,
    prenom VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    numero INT NOT NULL UNIQUE,
    adresse VARCHAR(255)NOT NULL,
    cp INT NOT NULL,
    ville VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,

    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

