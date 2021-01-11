CREATE DATABASE IF NOT EXISTS LEPONEYFRINGANT;
USE LEPONEYFRINGANT;

CREATE USER IF NOT EXISTS 'poney'@'localhost' IDENTIFIED BY 'fringant';
GRANT ALL PRIVILEGES ON *.* TO 'poney'@'localhost';

CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT ,
    pseudo VARCHAR(255) NOT NULL UNIQUE,
    prenom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO utilisateurs(pseudo, prenom, email, password) VALUES ('Aespace','Aymeric','aymeric@locahost.com','Goodenought');