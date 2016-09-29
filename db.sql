-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.6.17 - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la base pour espace_membre
DROP DATABASE IF EXISTS `espace_membre`;
CREATE DATABASE IF NOT EXISTS `espace_membre` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `espace_membre`;


-- Export de la structure de table espace_membre. users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Export de données de la table espace_membre.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `pseudo`, `password`, `nom`, `prenom`, `sexe`) VALUES
	(1, 'tnh', 'ddc5f5e86d2f85e1b1ff763aff13ce0a', 'nguereza', 'tony', 'masculin'),
	(2, 'nano', '7a264280f095e4c793a66c7be19d776e', 'banabool', 'kitoko', 'masculin'),
	(3, 'mam', 'ab4f63f9ac65152575886860dde480a1', 'nnnnnnnnnn', 'nnnnnnnnnnn', 'masculin'),
	(4, 'Yaps', 'ab4f63f9ac65152575886860dde480a1', 'Yapele', 'PacÃ´me', 'masculin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
