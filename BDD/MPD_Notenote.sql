CREATE DATABASE `ku_notenote`;
USE `ku_notenote`;

CREATE TABLE `etudiant`(
  `id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `ref_classe` int(11) NOT NULL,
  PRIMARY KEY (`id_etudiant`)
);

CREATE TABLE `professeur`(
   `id_professeur` int(11) NOT NULL AUTO_INCREMENT,
   `nom` varchar(30) NOT NULL,
   `prenom` varchar(30) NOT NULL,
   `mail` varchar(30) NOT NULL,
   `mdp` varchar(30) NOT NULL,
   PRIMARY KEY (`id_professeur`)
);

CREATE TABLE `direction`(
   `id_direction` int(11) NOT NULL AUTO_INCREMENT,
   `nom` varchar(30) NOT NULL,
   `prenom` varchar(30) NOT NULL,
   `mail` varchar(30) NOT NULL,
   `mdp` varchar(30) NOT NULL,
    PRIMARY KEY (`id_direction`)
);

CREATE TABLE `cours`(
   `id_cours` int(11) NOT NULL AUTO_INCREMENT,
   `date` date NOT NULL,
   `heure_debut` time NOT NULL,
   `heure_fin` time NOT NULL,
   `ref_classe` int(11) NOT NULL,
   `ref_matiere` int(11) NOT NULL,
   PRIMARY KEY (`id_cours`)
);

CREATE TABLE `dirige`(
    `ref_professeur` int(11) NOT NULL,
    `ref_cours` int(11) NOT NULL,
    PRIMARY KEY (`ref_cours`,`ref_professeur`)
);

CREATE TABLE `matiere`(
     `id_matiere` int(11) NOT NULL,
     `nom` varchar(30) NOT NULL,
     PRIMARY KEY (`id_matiere`)
);

CREATE TABLE `classe`(
      `id_classe` int(11) NOT NULL,
      `nom` varchar(30) NOT NULL,
      PRIMARY KEY (`id_classe`)
);

CREATE TABLE `devoir`(
    `id_devoir` int(11) NOT NULL AUTO_INCREMENT,
    `description` varchar(30) NOT NULL,
    `ref_professeur` int(11) NOT NULL,
    `ref_classe` int(11) NOT NULL,
    `ref_matiere` int(11) NOT NULL,
    PRIMARY KEY (`id_devoir`)
);

ALTER TABLE `dirige`
    ADD CONSTRAINT `fk_dirige_professeur` FOREIGN KEY (`ref_professeur`) REFERENCES `professeur` (`id_professeur`),
    ADD CONSTRAINT `fk_dirige_cours` FOREIGN KEY (`ref_cours`) REFERENCES `cours` (`id_cours`);

ALTER TABLE `cours`
    ADD CONSTRAINT `fk_cours_matiere` FOREIGN KEY (`ref_matiere`) REFERENCES `matiere` (`id_matiere`),
    ADD CONSTRAINT `fk_cours_classe` FOREIGN KEY (`ref_classe`) REFERENCES `classe` (`id_classe`);

ALTER TABLE `devoir`
    ADD CONSTRAINT `fk_devoir_classe` FOREIGN KEY (`ref_classe`) REFERENCES `classe` (`id_classe`),
    ADD CONSTRAINT `fk_devoir_professeur` FOREIGN KEY (`ref_professeur`) REFERENCES `professeur` (`id_professeur`),
    ADD CONSTRAINT `fk_devoir_matiere` FOREIGN KEY (`ref_matiere`) REFERENCES `matiere` (`id_matiere`);

CREATE USER 'ku_notenote_user'@'%' IDENTIFIED WITH mysql_native_password AS '***';
GRANT USAGE ON *.* TO 'ku_notenote_user'@'%'
    REQUIRE NONE WITH
    MAX_QUERIES_PER_HOUR 0
    MAX_CONNECTIONS_PER_HOUR 0
    MAX_UPDATES_PER_HOUR 0
    MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `ku_notenote`.* TO 'ku_notenote_user'@'%';