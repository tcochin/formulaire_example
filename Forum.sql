CREATE TABLE `connection` (
  `email` varchar(255) PRIMARY KEY,
  `pseudo` varchar(255),
  `mdp` varchar(255)
);

CREATE TABLE `message` (
  `id_message` int PRIMARY KEY,
  `id_utlisateur` varchar(255),
  `date` varchar(255),
  `text` varchar(1000)
);

CREATE TABLE `destinataire` (
  `id_msg` int PRIMARY KEY,
  `id_destinataire` varchar(255)
);

ALTER TABLE `connection` ADD FOREIGN KEY (`email`) REFERENCES `message` (`id_utlisateur`);

ALTER TABLE `message` ADD FOREIGN KEY (`id_message`) REFERENCES `destinataire` (`id_msg`);

ALTER TABLE `connection` ADD FOREIGN KEY (`email`) REFERENCES `destinataire` (`id_destinataire`);
