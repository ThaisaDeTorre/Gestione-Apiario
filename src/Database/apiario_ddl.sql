/* 
 * Creazione struttura database per gestione apiario.
 * author: Thaisa De Torre
 *
 * modifiche:
 * - aggiunte colonne in tbl meteo 
 *	(temperature_max, temperature_min, humidity, wind)
 */
 
-- DATABASE APIARY --
DROP SCHEMA IF EXISTS apiary;
CREATE SCHEMA IF NOT EXISTS apiary;
use apiary;


-- UTENTI
DROP TABLE IF EXISTS apiary.user;
CREATE TABLE user (
	id INT AUTO_INCREMENT NOT NULL,
	username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	PRIMARY KEY(id)
);

-- ARNIE --
DROP TABLE IF EXISTS apiary.beehive;
CREATE TABLE beehive (
    id INT AUTO_INCREMENT NOT NULL,
    name varchar(255) NOT NULL,
	queen_bee_birth YEAR NOT NULL,
	diary TEXT DEFAULT '',
	user_id INT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (user_id) REFERENCES user(id)	
);


-- TRATTAMENTO --
DROP TABLE IF EXISTS apiary.treatment;
CREATE TABLE treatment (
	id INT AUTO_INCREMENT NOT NULL,
	date DATE,
	duration INT,
	beehive_id INT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (beehive_id) REFERENCES beehive(id)
);

-- METEO --
DROP TABLE IF EXISTS apiary.weather;
CREATE TABLE weather (
	date DATE NOT NULL,
	temperature_min DECIMAL(2,1),
	temperature_max DECIMAL(2,1),
	humidity INT,
	wind DECIMAL(2,1),
	PRIMARY KEY(date),
	FOREIGN KEY (beehive_id) REFERENCES beehive(id)
);

-- EVENTO (calendario) --
DROP TABLE IF EXISTS apiary.event;
CREATE TABLE event (
	id INT AUTO_INCREMENT NOT NULL,
	name VARCHAR(255) NOT NULL,
	date_start DATE,
	date_end DATE,
	type VARCHAR(255),
	description VARCHAR(255),
	PRIMARY KEY(id),
	FOREIGN KEY (beehive_id) REFERENCES beehive(id)
);