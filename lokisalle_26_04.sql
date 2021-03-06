-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.6.17-log - MySQL Community Server (GPL)
-- Serveur OS:                   Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Export de données de la table lokisalle.avis: ~0 rows (environ)
/*!40000 ALTER TABLE `avis` DISABLE KEYS */;
/*!40000 ALTER TABLE `avis` ENABLE KEYS */;

-- Export de données de la table lokisalle.commande: ~0 rows (environ)
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;

-- Export de données de la table lokisalle.detail_commande: ~0 rows (environ)
/*!40000 ALTER TABLE `detail_commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_commande` ENABLE KEYS */;

-- Export de données de la table lokisalle.membre: ~5 rows (environ)
/*!40000 ALTER TABLE `membre` DISABLE KEYS */;
INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES
	(9, 'yoyo', '$2y$10$qahiASjX0svyOrA2btsRXuTE4', 'Arres', 'Yoann', 'yoyo@yopmail.com', 'm', 'Paris', '75000', '10 rue de Rivoli', 0),
	(10, 'azer', '$2y$10$MN.LXNhqOWsMpz1yVYQrPe4o6', 'Arres', 'yoann', 'azer@azer.fr', 'm', 'Tazerzr', '564464', '10 rue de l&#39;ouest', 0),
	(21, 'yoannyo', '$2y$10$j5bafr9uWY7jLOi9bwEqyuWgnFsAJ8qhvawfeeKExSM54ZZG7XqI.', 'Arres', 'Yoann', 'yoyo2@yopmail.com', 'm', 'Caen', '75003', '193 bis avenu de lhotel de ville', 1),
	(23, 'yoannyo2', '$2y$10$4jtQjl3..q9xKvjjEYtv2esNBtqBaMEC.VuDeKgE7hxVCfkWKl54K', 'Arres', 'Yoann', 'yoyo3@yopmail.com', 'm', 'Caen', '75003', '193 bis avenu de lhotel de ville', 0),
	(24, 'sdfgsdfger', '$2y$10$mCuS/gdrIqZz8pNdUFSNgei3Jt9RJrK1rRQSv09Jsix7rER4p2/2m', 'Szerset', 'Tzeez', 'st@azer.fr', 'm', 'Toulouse', '75003', '10 rue de l&#39;hôtel de ville', 0),
	(25, 'dromadaire', '$2y$10$Sh4OBTB84xVeGj7bNoQ1T.8iJNOCZBtAl41s6q47h5TKSsYWJtQjG', 'Rambo', 'John', 'john@texas.us', 'm', 'Houston', '547545', '42 Bourbon street', 0),
	(27, 'dromadair', '$2y$10$MEHNt5i458fPiHaaHGCN3On9DLU6ZRo3bQDPoRfTLzu7DcJl/pJjW', 'Rambo', 'John', 'johny@texas.us', 'm', 'Houston', '547545', '42 Bourbon street', 0);
/*!40000 ALTER TABLE `membre` ENABLE KEYS */;

-- Export de données de la table lokisalle.newsletter: ~0 rows (environ)
/*!40000 ALTER TABLE `newsletter` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletter` ENABLE KEYS */;

-- Export de données de la table lokisalle.produit: ~0 rows (environ)
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;

-- Export de données de la table lokisalle.promotion: ~0 rows (environ)
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;

-- Export de données de la table lokisalle.salle: ~0 rows (environ)
/*!40000 ALTER TABLE `salle` DISABLE KEYS */;
/*!40000 ALTER TABLE `salle` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
