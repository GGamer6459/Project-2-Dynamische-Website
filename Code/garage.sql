CREATE DATABASE IF NOT EXISTS garage;
USE garage;

CREATE TABLE IF NOT EXISTS auto (
  autokenteken varchar(10) NOT NULL,
  automerk varchar(40) NOT NULL,
  autotype varchar(40) NOT NULL,
  autokmstand int(20) NOT NULL,
  klantid int(10) NOT NULL,
  PRIMARY KEY (autokenteken),
  KEY fk_klant_id (klantid)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS klant (
  klantid int(10) NOT NULL,
  klantnaam varchar(60) NOT NULL,
  klantadres varchar(60) NOT NULL,
  klantpostcode varchar(7) NOT NULL,
  klantplaats varchar(60) NOT NULL,
  PRIMARY KEY (klantid)
) ENGINE=InnoDB;

ALTER TABLE klant
  MODIFY klantid int(10) NOT NULL AUTO_INCREMENT;

ALTER TABLE auto
  ADD CONSTRAINT fk_klant_id FOREIGN KEY (klantid) REFERENCES klant (klantid);