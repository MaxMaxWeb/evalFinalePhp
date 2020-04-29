SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ass_veh_con`;
CREATE TABLE `ass_veh_con` (
  `ass_id` int NOT NULL AUTO_INCREMENT,
  `ass_vehicule` int NOT NULL,
  `ass_conducteur` int NOT NULL,
  PRIMARY KEY (`ass_id`),
  KEY `ass_vehicule` (`ass_vehicule`),
  KEY `ass_conducteur` (`ass_conducteur`),
  CONSTRAINT `ass_veh_con_ibfk_1` FOREIGN KEY (`ass_vehicule`) REFERENCES `vehicule` (`veh_id`) ON DELETE CASCADE,
  CONSTRAINT `ass_veh_con_ibfk_2` FOREIGN KEY (`ass_conducteur`) REFERENCES `conducteur` (`con_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `ass_veh_con` (`ass_id`, `ass_vehicule`, `ass_conducteur`) VALUES
(1,	1,	1),
(2,	5,	2),
(3,	5,	2);

DROP TABLE IF EXISTS `conducteur`;
CREATE TABLE `conducteur` (
  `con_id` int NOT NULL AUTO_INCREMENT,
  `con_prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `con_nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `conducteur` (`con_id`, `con_prenom`, `con_nom`) VALUES
(1,	'Jean',	'Martin'),
(2,	'Marc',	'Léo'),
(3,	'Marc',	'Leo');

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE `vehicule` (
  `veh_id` int NOT NULL AUTO_INCREMENT,
  `veh_marque` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `veh_modele` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `veh_couleur` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `veh_immatriculation` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`veh_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `vehicule` (`veh_id`, `veh_marque`, `veh_modele`, `veh_couleur`, `veh_immatriculation`) VALUES
(1,	'Renault',	'Clio',	'rouge',	'777-BBB-999'),
(2,	'BMW',	'33',	'rouge',	'77777777'),
(3,	'Peugeot',	'408',	'verte',	'888-TTT-222'),
(4,	'Peugeot',	'408',	'verte',	'888-TTT-222'),
(5,	'Peugeot',	'408',	'verte',	'888-TTT-222'),
(6,	'Peugeot',	'408',	'verte',	'888-TTT-222');