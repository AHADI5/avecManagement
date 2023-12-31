CREATE DATABASE IF NOT EXISTS avec_Db;
CREATE TABLE  avec (
    id_avec INT AUTO_INCREMENT NOT NULL ,
    date_debut DATETIME NOT NULL,
    date_fin DATETIME NOT NULL,
    solde FLOAT NOT NULL ,
    part_value FLOAT NOT NULL , 
    taux_interet FLOAT NOT NULL,
    social_value FLOAT NOT NULL ,

    PRIMARY KEY (id_avec)
) ;

CREATE TABLE IF NOT EXISTS membre(
    id_membre INT AUTO_INCREMENT NOT NULL ,
    nom VARCHAR(255) NOT NULL ,
    postnom VARCHAR(255) NOT NULL,
    adresse VARCHAR(255) NOT NULL ,
    telephone VARCHAR(255) NOT NULL ,

    PRIMARY KEY(id_membre)
);

CREATE TABLE IF NOT EXISTS avec_member (
    id_item INT NOT NULL AUTO_INCREMENT ,
    id_membre INT NOT NULL , 
    id_avec INT NOT  NULL , 
    PRIMARY KEY (id_item),
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre),
    FOREIGN KEY (id_avec) REFERENCES avec(id_avec)
);



CREATE TABLE IF NOT EXISTS credits (
    id_credit INT NOT NULL AUTO_INCREMENT ,
    date_credit DATETIME NOT NULL ,
    deadline DATETIME NOT NULL ,
    id_membre INT NOT NULL ,
    id_avec INT NOT NULL ,
    montant FLOAT NOT NULL ,
    PRIMARY KEY (id_credit) ,
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre),
    FOREIGN KEY (id_avec) REFERENCES avec(id_avec)
);

CREATE TABLE remboursements(
    id_remb INT NOT NULL AUTO_INCREMENT,
    id_membre INT NOT NULL ,
    id_credit INT NOT NULL ,
    id_avec INT NOT NULL ,
    date_remb DATETIME ,
    montant FLOAT NOT NULL ,
    PRIMARY KEY(id_remb),
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre),
    FOREIGN KEY (id_avec) REFERENCES avec(id_avec),
    FOREIGN KEY (id_credit) REFERENCES credits(id_credit)
);

CREATE TABLE social (
    id_social INT NOT NULL AUTO_INCREMENT,
    id_membre INT NOT NULL,
    id_avec INT NOT NULL,
    date_social DATETIME NOT NULL,
    montant DOUBLE NOT NULL,
    PRIMARY KEY(id_social),
    FOREIGN KEY (id_membre) REFERENCES membre(id_membre),
    FOREIGN KEY (id_avec) REFERENCES avec(id_avec)
);

CREATE TABLE epargnes (
	id_epargnes INT NOT NULL AUTO_INCREMENT,
	id_membre INT NOT NULL,
   id_avec INT NOT NULL,
   date DATETIME NOT NULL,
   montant DOUBLE NOT NULL,
   PRIMARY KEY(id_epargnes),
   FOREIGN KEY (id_membre) REFERENCES membre(id_membre),
   FOREIGN KEY (id_avec) REFERENCES avec(id_avec)
   );

ALTER TABLE epargnes ADD COLUMN date DATETIME NOT NULL;
ALTER TABLE epargnes ADD COLUMN parts INT NOT NULL;
ALTER TABLE credits ADD COLUMN credit_status BOOLEAN NOT NULL ;